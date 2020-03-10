@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Month Wise Expense Entry</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('expenses.create')}}">Expense</a></li>
                        <li class="breadcrumb-item active">Entry</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            {!! Form::open(array('route' => 'expenses.store','method'=>'POST')) !!}
            <div class="card card-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Billing Date:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    {!! Form::date('billing_date', null, array('placeholder' => 'Billing Date','class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Due Date:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    {!! Form::date('due_date', null, array('placeholder' => 'Due Date','class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>House Rent:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            ৳
                                        </span>
                                    </div>
                                    {!! Form::text('seat_rent', null, array('placeholder' => 'House Rent','class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Electric Bill:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            ৳
                                        </span>
                                    </div>
                                    {!! Form::text('electric_bill', null, array('placeholder' => 'Electric Bill','class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Gas Bill:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            ৳
                                        </span>
                                    </div>
                                    {!! Form::text('gas_bill', null, array('placeholder' => 'Gas Bill','class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Water Bill:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            ৳
                                        </span>
                                    </div>
                                    {!! Form::text('water_bill', null, array('placeholder' => 'Water Bill','class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Net Bill:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            ৳
                                        </span>
                                    </div>
                                    {!! Form::text('net_bill', null, array('placeholder' => 'Internet Bill','class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Bua Bill:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            ৳
                                        </span>
                                    </div>
                                    {!! Form::text('bua_bill', null, array('placeholder' => 'Bua Bill','class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Care Taker:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            ৳
                                        </span>
                                    </div>
                                    {!! Form::text('care_taker', null, array('placeholder' => 'Care Taker Allowance','class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Extra Utility:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            ৳
                                        </span>
                                    </div>
                                    {!! Form::text('extra_utility', null, array('placeholder' => 'Extra Utility','class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
