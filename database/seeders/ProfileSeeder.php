<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{

    public function random(){
        $profilesTotal= rand(1, 10);
        return $profilesTotal;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($profilesTotal, $friendsTotal)
    {
     

    }
}
