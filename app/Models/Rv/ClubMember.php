<?php

namespace App\Models\Rv;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubMember extends User
{
    use HasFactory;

    protected $with = ['profile'];

    protected $table = 'users';

    public function clubmemberships()
    {
        return $this->hasMany(ClubMembership::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
