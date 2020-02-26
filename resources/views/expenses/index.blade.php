@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Expenses Month Wise</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/expenses')}}">Expense</a></li>
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
                            <th>Billing Date</th>
                            <th>House Rent</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($expenses as $expense)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $expense->billing_date }}</td>
                                <td>{{ $expense->seat_rent }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('advances.show', $expense->id) }}">Show</a>
                                    @can('expense-edit')
                                    <a class="btn btn-primary" href="{{ route('advances.edit', $expense->id) }}">Edit</a>
                                    @endcan
                                    @can('expense-delete')
                                    {!! Form::open(['method' => 'DELETE','route' => ['advances.destroy', $expense->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    {!! $expenses->links() !!}
@endsection
