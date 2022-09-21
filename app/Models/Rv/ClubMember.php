<?php

namespace App\Models\Rv;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laratrust\Traits\LaratrustUserTrait;

class ClubMember extends User
{
    use LaratrustUserTrait;
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
