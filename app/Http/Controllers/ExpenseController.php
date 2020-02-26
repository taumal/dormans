<?php

namespace App\Http\Controllers;

use App\Expenses;
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

        $request['seat_rent'] = $request->house_rent;

        Expenses::create($request->all());

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
            'name' => 'required',
            'detail' => 'required',
        ]);

        $expense->update($request->all());

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
