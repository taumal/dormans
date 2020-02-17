@extends('layouts.app')

@section('content')

        <!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Create New User</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/users/create')}}">User</a></li>
                    <li class="breadcrumb-item active">Create</li>
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
        {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
        <div class="card card-primary">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Name:</label>
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <!-- text input -->
                        <div class="form-group">
                            <label>NID Number:</label>
                            {!! Form::text('nid', null, array('placeholder' => 'NID','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Email:</label>
                            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Password:</label>
                            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Address</label>
                            {!! Form::textarea('address', null, array('placeholder' => 'Address', 'rows' => 1, 'class' => 'form-control')) !!}
                            {{--<textarea class="form-control" rows="1" name="ad"></textarea>--}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Confirm Password:</label>
                            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password', 'class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>District</label>
                            <select class="form-control" name="district_id">
                                <option value="0">Please Select</option>
                                @foreach ($districts as $district)
                                    <option value="{{ $district['id'] }}">{{ $district['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Division</label>
                            <select class="form-control" name="division_id">
                                <option value="0">Please Select</option>
                                @foreach ($divisions as $division)
                                    <option value="{{ $division['id'] }}">{{ $division['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Occupation:</label>
                            {!! Form::text('occupation', null, array('placeholder' => 'Occupation','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Organization:</label>
                            {!! Form::text('organization', null, array('placeholder' => 'Organization','class' => 'form-control')) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Phone:</label>
                            {!! Form::text('phone', null, array('placeholder' => 'Phone','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>Seat Taken:</label>
                            {!! Form::number('seat_taken', null, array('placeholder' => 'Seat Taken','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Arrival Date:</label>
                            {!! Form::date('arrival_date', null, array('placeholder' => 'Arrival Date','class' => 'form-control')) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Role: </label>
                            @foreach ( $roles as $i => $role )
                                <div class="icheck-wetasphalt">
                                    {!! Form::checkbox( 'roles[]', $role, null, ['class' => 'form-check-input', 'id' => $role] ) !!}
                                    {!! Form::label($role,  $role, array('class' => 'form-check-label')) !!}
                                </div>
                            @endforeach
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
