<?php

namespace Database\Seeders;

use App\Models\Rv\CanteenTeam;
use App\Models\Rv\ClubMember;
use App\Models\Rv\Department;
use App\Models\Rv\Season;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClubMembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $afdelingIds = Department::all(['id'])->toArray();
        $clublidIds = ClubMember::all(['id'])->toArray();

        foreach (Season::all() as $jaargang) {
            echo 'Seeding jaargang: ' . $jaargang->year . PHP_EOL;

            $clublidIdsSelected = array_rand($clublidIds, rand(1200, 1500));
            echo 'Aantal lidmaatschappen: ' . count($clublidIdsSelected) . PHP_EOL;

            foreach ($clublidIdsSelected as $clublidId) {

                $afdelingId =  $afdelingIds[array_rand($afdelingIds)]['id'];

                // $tapploeg = Tapploeg::where('isglobaal', true)
                //     ->whereRelation('afdeling', 'id', $afdelingId)
                //     ->whereRelation('jaargang', 'id', $jaargang->id)
                //     ->first();

                $tapploegen = CanteenTeam::
                    whereRelation('department', 'id', $afdelingId)
                    ->whereRelation('season', 'id', $jaargang->id)
                    ->get();

                $tapploeg = $tapploegen[rand(0, count($tapploegen)-1)];


                DB::table('club_memberships')->insert([
                    'department_id' => $afdelingId,
                    'club_member_id' => $clublidIds[$clublidId]['id'],
                    'season_id' => $jaargang->id,
                    'canteen_team_id' => $tapploeg->id,
                ]);
            }
        }
    }
}
