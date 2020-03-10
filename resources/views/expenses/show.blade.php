@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Expense</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('expenses.index')}}">Expense</a></li>
                        <li class="breadcrumb-item">Details</li>
                        <li class="breadcrumb-item active">{{ date("F", strtotime($expense->current_month)) }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Current Date</span>
                                    <span class="info-box-number text-center text-muted mb-0">{{ $expense->current_month.", ".$expense->year }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-warning">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center ">Due Date</span>
                                    <span class="info-box-number text-center mb-0">{{ date('j F, Y', strtotime($expense->due_date)) }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">House Rent</span>
                                    <span class="info-box-number text-center text-muted mb-0">৳{{ $expense->seat_rent }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Electric Bill</span>
                                    <span class="info-box-number text-center text-muted mb-0">৳{{ $expense->electric_bill }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Gas Bill</span>
                                    <span class="info-box-number text-center text-muted mb-0">৳{{ $expense->gas_bill }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Water Bill</span>
                                    <span class="info-box-number text-center text-muted mb-0">৳{{ $expense->water_bill }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Internet Bill</span>
                                    <span class="info-box-number text-center text-muted mb-0">৳{{ $expense->net_bill }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Bua Bill</span>
                                    <span class="info-box-number text-center text-muted mb-0">৳{{ $expense->bua_bill }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Care Taker</span>
                                    <span class="info-box-number text-center text-muted mb-0">৳{{ $expense->care_taker ? $expense->care_taker : 0 }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Extra Utility</span>
                                    <span class="info-box-number text-center text-muted mb-0">৳{{ $expense->extra_utility ? $expense->extra_utility : 0 }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12">
                            <div class="info-box bg-info">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center">Total</span>
                                    <span class="info-box-number text-center mb-0">৳{{ $expense->total_bill ? $expense->total_bill : 0 }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
