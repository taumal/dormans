@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Advances</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/advances')}}">Advance</a></li>
                    <li class="breadcrumb-item active">List</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Payable</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($advances as $key => $advance)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $advance->user->name }}</td>
                            <td>{{ $advance->user->email }}</td>
                            <td>{{ $advance->payable_amount }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('advances.show', $advance->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('advances.edit', $advance->id) }}">Edit</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['advances.destroy', $advance->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

{!! $advances->render() !!}
@endsection
