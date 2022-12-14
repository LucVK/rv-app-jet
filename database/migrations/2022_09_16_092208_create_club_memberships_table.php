<?php

use App\Models\Rv\CanteenTeam;
use App\Models\Rv\ClubMember;
use App\Models\Rv\Department;
use App\Models\Rv\Season;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_memberships', function (Blueprint $table) {
            $table->id();

            // $table->foreignIdFor(ClubMember::class)->constrained();
            $table->foreignIdFor(ClubMember::class); //->constrained();
            $table->foreignIdFor(Season::class)->constrained();
            $table->foreignIdFor(Department::class); //->constrained();
            $table->foreignIdFor(CanteenTeam::class)->constrained();

            $table->string('marking')->nullable();
            
            $table->unique(['club_member_id', 'season_id', 'department_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('club_memberships');
    }
};
