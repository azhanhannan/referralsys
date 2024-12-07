<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Referrals;

class ReferralController extends Controller
{
    public function referrals($id) {

        $user       = User::find($id);
        $referrals  = Referrals::where('fk_users', $id)->get();

        return view('list.referrals', compact('user', 'referrals'));
    }
}
