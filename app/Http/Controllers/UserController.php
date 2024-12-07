<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Referrals;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index() {
        $users = User::orderBy('bonus_balance', 'DESC')->get();
        return view('list.users', compact('users'));
    }

    public function create() {
        return view('form.users');
    }

    public function store(Request $request)
    {

        $updateTableReferral = false;

        // check if there is referral code
        if (isset($request->referral_code)) {
            $referralCodeExisted = User::where('referral_code', $request->referral_code)->first();

            if ($referralCodeExisted) {
                $referralCodeExisted->bonus_balance += 25;
                $referralCodeExisted->save();

                $updateTableReferral = true;

            } else {
                // dd($request->all());
                
                $name       = $request->name;
                $email      = $request->email;
                $password   = $request->password;

                return redirect('/users/create')->withInput($request->only('name', 'email', 'password'))->with('error', 'Referral code inserted is not exist, please check again');
            }
        }
        
        $ReferralCode = $this->generateReferralCode();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        // Add the generated referral code to the validated data
        // $validatedData['referral_code'] = $ReferralCode;

        // Hash the password
        $validatedData['password'] = bcrypt($validatedData['password']); 

        $newUser = User::create($validatedData); 

        // update the referral_code
        User::where('id', $newUser->id)->update(['referral_code' => $ReferralCode]);

        // create data referral if exist
        if ($updateTableReferral) {
            $referrals = new Referrals();
            $referrals->fk_users = $referralCodeExisted->id;
            $referrals->fk_users_referral = $newUser->id;
            $referrals->save();
        }        

        return redirect('/users')->with('success', 'User created successfully!');
    }

    public function generateReferralCode() {
        do {
            $code = Str::random(10);
            $exists = User::where('referral_code', $code)->exists();
        } while ($exists);
    
        return $code;
    }    

}
