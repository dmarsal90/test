<?php

namespace App\Http\Controllers;

use App\Models\Profiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $prof = Profiles::findOrFail($profile->id);
        $result = DB::table('profile')->select('friends_id')->where('id', '=', $prof);

        return json_encode($result);
    }
}
