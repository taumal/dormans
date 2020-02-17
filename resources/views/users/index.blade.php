@extends('layouts.app')

@section('content')

        <!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">User List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/users')}}">User</a></li>
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
        <div class="card card-solid">
            <div class="card-body pb-0">
                <div class="row d-flex align-items-stretch">
                    @foreach ($data as $key => $user)
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                            <div class="card bg-light">
                                <div class="card-header text-muted border-bottom-0">
                                    @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $v)
                                            {{ $v }}
                                        @endforeach
                                    @endif
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="lead"><b>{{ $user->name }}</b></h2>
                                            <p class="text-muted text-sm"><b>About: </b> {{ $user->occupation }}, {{ $user->organization }} </p>
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: {{ $user->address }}</li>
                                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone: {{ $user->phone }}</li>
                                            </ul>
                                        </div>
                                        <div class="col-5 text-center">
                                            <img src="{{ asset('images/no-image.gif') }}" alt="" class="img-circle img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">
                                        <a class="btn btn-sm btn-info" href="{{ url('/user/'.$user->id) }}"><i class="fas fa-user"></i> View Profile</a>
                                        <a class="btn btn-sm btn-primary" href="{{ route('users.edit',$user->id) }}"><i class="fas fa-edit"></i>Edit</a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                        {!! Form::button('<i class="fas fa-trash-alt"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

    {!! $data->render() !!}
@endsection
