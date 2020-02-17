<?php

namespace App\Http\Controllers;

use App\Districts;
use App\Divisions;
use App\User;

class ShowProfile extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $user = User::findOrFail($id);
        $division = Divisions::findOrFail($user->division_id);
        $district = Districts::findOrFail($user->district_id);
        return view('users.profile', compact('user', 'division', 'district'));
    }
}
