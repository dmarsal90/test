<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profiles;
use Illuminate\Support\Facades\DB;

class FriendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profiles = Profiles::all();
        $numberOfProfiles = $profiles->count();

        foreach ($profiles as $profile) {
            $numberOfFriends = rand(0, $numberOfProfiles);

            for ($i = 0; $i <= $numberOfFriends; $i++) {
                $friendId = rand(1, $numberOfProfiles);

                if ($profile->id !== $friendId) {

                    if (!DB::table('friends')->where('profile_id', $profile->id)->where('friend_id', $friendId)->count()) {
                        DB::table('friends')->insert([
                            'profile_id' => $profile->id,
                            'friend_id' => $friendId
                        ]);
                    }

                    if (!DB::table('friends')->where('profile_id', $friendId)->where('friend_id', $profile->id)->count()) {
                        DB::table('friends')->insert([
                            'profile_id' => $friendId,
                            'friend_id' => $profile->id
                        ]);
                    }
                }
            }
        }
    }
}
