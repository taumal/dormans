<?php

namespace App\Http\Controllers;

use App\Advance;
use App\Transactions;
use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use TransactionHelpers;

class AdvanceController extends Controller
{
    /**
     * AdvanceController constructor.
     */
    public function __construct()
    {
        $this->middleware('permission:advance-list|advance-create|advance-edit|advance-delete', ['only' => ['index','show']]);
        $this->middleware('permission:advance-create', ['only' => ['create','store']]);
        $this->middleware('permission:advance-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:advance-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $advances = Advance::with('user')->paginate(10);
        return view('advance.index',compact('advances'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $users = User::where('is_deleted', false)->orderBy('name','ASC')->get();
        return view('advance.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'user_id'           => 'required',
            'deposit_date'      => 'nullable|date',
            'payable_amount'    => 'required|integer',
            'deposit_amount'    => 'required|integer',
            'due_amount'        => 'required|integer',
        ]);

        $input                  = $request->all();
        $input['due_amount']    = $input['payable_amount'] - $input['deposit_amount'];

        $advance                = Advance::create($input);
        $reference              = "advance#".$advance->id;

        TransactionHelpers::setTransaction($input, $reference);

        return redirect()->route('advances.index')
            ->with('success','Advance saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Advance $advance
     * @return Response
     */
    public function show(Advance $advance)
    {
//        $advance = Advance::find($id);
        return view('advance.show',compact('advance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Advance $advance
     * @return Response
     */
    public function edit(Advance $advance)
    {
        $users = User::where('is_deleted', false)->orderBy('name','ASC')->get();
        return view('advance.edit',compact('advance', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Advance $advance
     * @return Response
     */
    public function update(Request $request, Advance $advance)
    {
        request()->validate([
            'user_id'           => 'required',
            'deposit_date'      => 'nullable|date',
            'payable_amount'    => 'required|integer',
            'deposit_amount'    => 'required|integer',
            'due_amount'        => 'required|integer',
        ]);

        $input                  = $request->all();
        $input['due_amount']    = $input['payable_amount'] - $input['deposit_amount'];
        $advance->update($input);

        TransactionHelpers::setTransaction($input, 'advance#'.$advance->id);

        return redirect()->route('advances.index')
            ->with('success','Advance updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Advance $advance
     * @return void
     * @throws Exception
     */
    public function destroy(Advance $advance)
    {
        $advance->delete();

        return redirect()->route('advances.index')
            ->with('success','Advance deleted successfully');
    }
}
