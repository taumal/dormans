<?php

namespace App\Http\Controllers;

use App\Districts;
use App\Divisions;
use App\Expenses;
use App\User;
use Carbon\Carbon;
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
        $date = Carbon::now();
        $expense = Expenses::select('total_bill', 'current_month', 'due_date')
            ->where([
                ['current_month', '=',  $date->format('F')],
                ['year', '=',  $date->format('Y')],
            ])->first();
//        echo $expense.' | '.$date->format('F');
        return view('home')->with('data', $data)->with('expense', $expense);
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
