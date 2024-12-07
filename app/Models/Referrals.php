<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Referrals extends Model
{
    use HasFactory;

    public function referral_detail()
    {
        return $this->hasOne(User::class, 'id', 'fk_users_referral');
    }
}
