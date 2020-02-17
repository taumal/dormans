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
                    <li class="breadcrumb-item">Details</li>
                    <li class="breadcrumb-item active">{{ $advance->user->name }}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

    <div class="row">
        <div class="col-md-12 card-columns">
            <div class="card border-secondary">
                <div class="card-body text-center">
                    <p class="card-text">
                        <strong>Name:</strong>
                        {{ $advance->user->name }}
                    </p>
                </div>
            </div>
            <div class="card border-secondary">
                <div class="card-body text-center">
                    <p class="card-text">
                        <strong>Email:</strong>
                        {{ $advance->user->email }}
                    </p>
                </div>
            </div>
            <div class="card border-secondary">
                <div class="card-body text-center">
                    <p class="card-text">
                        <strong>Deposit Date:</strong>
                        {{ $advance->deposit_date }}
                    </p>
                </div>
            </div>
            <div class="card border-secondary">
                <div class="card-body text-center">
                    <p class="card-text">
                        <strong>Payable Amount:</strong>
                        {{ $advance->payable_amount }}
                    </p>
                </div>
            </div>
            <div class="card border-secondary">
                <div class="card-body text-center">
                    <p class="card-text">
                        <strong>Deposit:</strong>
                        {{ $advance->deposit_amount }}
                    </p>
                </div>
            </div>
            <div class="card border-secondary">
                <div class="card-body text-center">
                    <p class="card-text text-danger">
                        <strong>Due:</strong>
                        {{ $advance->due_amount }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
