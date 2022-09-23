<?php

namespace App\Models\Rv;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    private static $current;

    public function clubmemberships()
    {
        return $this->hasMany(ClubMembership::class);
    }

    public function canteenpermanences()
    {
        return $this->hasMany(CanteenPermanence::class);
    }

    public function canteenteams()
    {
        return $this->hasMany(CanteenTeam::class);
    }

    public static function current()
    {
        $year = date("Y");
        if (self::$current == null  || self::$current->year != $year )
        {
            self::$current = Season::where('year', $year)->firstOrFail();
        }
        return self::$current;
    }    
}
