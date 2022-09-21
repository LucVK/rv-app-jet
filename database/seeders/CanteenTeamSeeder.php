<?php

namespace Database\Seeders;

use App\Models\Rv\Department;
use App\Models\Rv\Season;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CanteenTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $afdelingIds = Department::all(['id'])->toArray();

        foreach (Season::all() as $jaargang) {
            echo 'Seeding jaargang: ' . $jaargang->year . PHP_EOL;

            foreach (Department::pluck('id')->toArray() as $key => $value) {

                $algemeen = 'Algemeen-' . $value . '-' . $jaargang->id;
                DB::table('canteen_teams')->insert([
                    'department_id' => $value,
                    'season_id' => $jaargang->id,
                    'name' => $algemeen,
                    'slug' => Str::slug($algemeen),
                    'isglobal' => true,
                ]);


                $aantalPloegen = random_int(4, 10);
                echo 'Seeding afdeling: ' . $value . ' aantal plogen: ' . $aantalPloegen . PHP_EOL;

                for ($i = 0; $i < $aantalPloegen - 1; $i++) {
                    $teamname = fake()->unique()->city(32);
                    DB::table('canteen_teams')->insert([
                        'department_id' => $value,
                        'season_id' => $jaargang->id,
                        'name' => $teamname,
                        'slug' => Str::slug($teamname),
                    ]);
                }
            }
        }
    }
}
