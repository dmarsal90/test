<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index(Request $request)
    {

        $profiles = Profile::all();
        return json_encode($profiles);
    }

    public function store(Request $request)
    {
        $profile = new Profile();
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
        $profile = Profile::findOrFail($request->id);
        return json_encode($profile);
    }

    public function update(Request $request)
    {
        $profile = Profile::findOrFail($request->id);
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
        $profile = Profile::destroy($request->id);
        return $profile;
    }

    public function getFriends(Request $request)
    {

        $friends = Profile::findOrFail($request->id);

        $result = DB::table('profile')->select('id')->where('profile_id', '=', $friends);
        return json_encode($result);
    }
}
