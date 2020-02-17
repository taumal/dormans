@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ $role->name }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/roles')}}">Roles</a></li>
                        <li class="breadcrumb-item">Details</li>
                        <li class="breadcrumb-item active">{{ $role->name }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="row">
        <div class="col-md-12 card-columns">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fab fa-delicious"></i>
                        Permissions
                    </h3>
                </div>
                <div class="card-body">
                    @if(!empty($rolePermissions))
                        <div class="callout callout-success">
                            @foreach($rolePermissions as $v)
                                <dl class="dl-horizontal">
                                    <dt>
                                        {{ ucwords(str_replace("-", " ", $v->name)) }}
                                    </dt>
                                </dl>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
