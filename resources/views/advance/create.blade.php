@extends('layouts.app')

@section('content')

        <!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Advance Entry</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/advances/create')}}">Advance</a></li>
                    <li class="breadcrumb-item active">Entry</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


@if (count($errors) > 0)
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
        {!! Form::open(array('route' => 'advances.store','method'=>'POST')) !!}
        <div class="card card-primary">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Boarder:</label>
                            <select class="form-control @error('user_id') is-invalid @enderror" name="user_id">
                                <option value="">Please Select</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user['id'] }}">{{ $user['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Payable:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        ৳
                                    </span>
                                </div>
                                {!! Form::text('payable_amount', null, array('placeholder' => 'Payable Amount','class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Deposit Date:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                {!! Form::date('deposit_date', null, array('placeholder' => 'Deposit Date','class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Deposit:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        ৳
                                    </span>
                                </div>
                                {!! Form::text('deposit_amount', null, array('placeholder' => 'Deposit Amount','class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Due:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        ৳
                                    </span>
                                </div>
                                {!! Form::text('due_amount', null, array('placeholder' => 'Due Amount','class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Comments:</label>
                            {!! Form::textarea('comments', null, array('placeholder' => 'comments', 'rows' => 2, 'class' => 'form-control')) !!}
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
