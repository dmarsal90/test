<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Profiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SplQueue;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profiles::all();
        return json_encode($profiles);
    }

    public function store(Request $request)
    {
        $profile = new Profiles();
        $profile->img = $request->img;
        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->phone = $request->phone;
        $profile->address = $request->address;
        $profile->city = $request->city;
        $profile->state = $request->state;
        $profile->zipcode = $request->zipcode;
        $profile->available = $request->available;

        $profile->save();
    }

    public function show(Request $request)
    {
        $profile = Profiles::findOrFail($request->id);
        return json_encode($profile);
    }

    public function update(Request $request)
    {
        $profile = Profiles::findOrFail($request->id);
        $profile->img = $request->img;
        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->phone = $request->phone;
        $profile->address = $request->address;
        $profile->city = $request->city;
        $profile->state = $request->state;
        $profile->zipcode = $request->zipcode;
        $profile->available = $request->available;

        $profile->save();
    }

    public function delete(Request $request)
    {
        $profile = Profiles::destroy($request->id);
        return $profile;
    }

    public function getFriends(Profiles $profile)
    {

        // $prof = Profiles::findOrFail($profile->id);

        $result = DB::table('friends')
            ->select('first_name')
            ->join('profiles', 'friends.friend_id', '=', 'profiles.id')
            ->where('profile_id', '=', $profile->id)->get();

        return json_encode($result->pluck('first_name'));
    }

    public function getShortestPath( Profile $profile1, Profile $profile2)
    {
        $friends = DB::table('friends')->get();

        $queue = new SplQueue();
        # Enqueue the path
        $queue->enqueue([$profile1]);
        $visited = [$profile1];

        while ($queue->count() > 0) {
            $path = $queue->dequeue();

            # Get the last node on the path
            # so we can check if we're at the end
            $node = $path[sizeof($path) - 1];

            if ($node === $profile2) {
                return $path;
            }

            foreach ($friends[$node] as $neighbour) {
                if (!in_array($neighbour, $visited)) {
                    $visited[] = $neighbour;

                    # Build new path appending the neighbour then and enqueue it
                    $new_path = $path;
                    $new_path[] = $neighbour;

                    $queue->enqueue($new_path);
                }
            };
        }

        return false;
    }
}
