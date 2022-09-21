<?php

namespace App\Models\Rv;

use App\Models\Scopes\Rv\DepartmentScope;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Team
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new DepartmentScope());
    }

    public function groups()
    {
        return $this->hasMany(Team::class,'team_id'); // Team::where('team_id', $this->id)->get();
    }


    

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
}
