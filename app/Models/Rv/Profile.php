<?php

namespace App\Models\Rv;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    public function clubmember()
    {
        return $this->belongsTo(ClubMember::class);
    }
}
