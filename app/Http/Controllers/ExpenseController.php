<?php

namespace App\Http\Controllers;

use App\Expenses;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ExpenseController extends Controller
{
    /**
     * ExpenseController constructor.
     */
    public function __construct()
    {
        $this->middleware('permission:expense-list|expense-create|expense-edit|expense-delete', ['only' => ['index','show']]);
        $this->middleware('permission:expense-create', ['only' => ['create','store']]);
        $this->middleware('permission:expense-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:expense-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $expenses = Expenses::latest()->paginate(10);
        return view('expenses.index',compact('expenses'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('expenses.create');
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
            'billing_date' => 'required|date',
            'due_date' => 'sometimes|required|date|gte:billing_date',
        ]);

        $input = $request->all();
        $date = Carbon::parse($request->billing_date);
        $input['total_bill'] = $input['seat_rent'] + $input['net_bill'] + $input['electric_bill'] + $input['water_bill']
            + $input['gas_bill'] + $input['bua_bill'] + $input['care_taker'] + $input['extra_utility'];
        $input['current_month'] = $date->format('F');
        $input['year'] = $date->format('Y');

        Expenses::create($input);

        return redirect()->route('expenses.index')
            ->with('success','Expenses created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Expenses $expense
     * @return Response
     * @internal param int $id
     */
    public function show(Expenses $expense)
    {
        return view('expenses.show',compact('expense'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Expenses $expense
     * @return Response
     * @internal param int $id
     */
    public function edit(Expenses $expense)
    {
        return view('expenses.edit',compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Expenses $expense
     * @return Response
     * @internal param int $id
     */
    public function update(Request $request, Expenses $expense)
    {
        request()->validate([
            'billing_date' => 'required|date',
            'due_date' => 'sometimes|required|date|gte:billing_date',
        ]);

        $input = $request->all();
        $cur_month = date('F', strtotime($request->billing_date));
        $cur_year = date('Y', strtotime($request->billing_date));
        $input['total_bill'] = $input['seat_rent'] + $input['net_bill'] + $input['electric_bill'] + $input['water_bill']
            + $input['gas_bill'] + $input['bua_bill'] + $input['care_taker'] + $input['extra_utility'];
        $input['current_month'] = $cur_month;
        $input['year'] = $cur_year;
        $input['id'] = $expense->id;

        $expense->update($input);

        return redirect()->route('expenses.index')
            ->with('success','Expenses updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Expenses $expense
     * @return Response
     * @throws Exception
     * @internal param int $id
     */
    public function destroy(Expenses $expense)
    {
        $expense->delete();

        return redirect()->route('expenses.index')
            ->with('success','Expenses deleted successfully');
    }
}
