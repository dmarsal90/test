<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfileSeeder extends Seeder
{

    public function randomProfiles(){
        $profilesTotal= rand(1, 20);
        return $profilesTotal;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    //public function run($profilesTotal, $friendsTotal)
    public function run()
    {
        Profile::factory($this->randomProfiles())->create();

    }
}
