<?php

namespace App\Models\Rv;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubMember extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function clubmemberships()
    {
        return $this->hasMany(ClubMembership::class);
    }
}
