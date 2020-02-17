<?php

namespace App\Http\Controllers;

use App\Districts;
use App\Divisions;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = User::where('is_deleted', false)->count();
        return view('home')->with('data', $data);
    }

    public function getDivisions()
    {
        $divisions = Divisions::orderBy('name','ASC')->paginate(10);
        return view('divisions.index',compact('divisions'))
            ->with('i', (request()->input('page', 1) - 1) * 10);;
    }

    public function getDistricts()
    {
        $districts = Districts::with('division')->orderBy('name','ASC')->paginate(10);
        return view('districts.index',compact('districts'))
            ->with('i', (request()->input('page', 1) - 1) * 10);;
    }
}
