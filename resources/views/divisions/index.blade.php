@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Divisions</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                        <li class="breadcrumb-item">Division</li>
                        <li class="breadcrumb-item active">List</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Name(English)</th>
                            <th>Name(Bengali)</th>
                            <th>Web Link</th>
                            <th width="80px">Action</th>
                        </tr>
                        @foreach ($divisions as $key => $division)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $division->name }}</td>
                                <td>{{ $division->bn_name }}</td>
                                <td>{{ $division->url }}</td>
                                <td>
                                    <a class="btn btn-link" href="{{ url('http://'.$division->url) }}" target="_blank"><i class="fas fa-external-link-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    {!! $divisions->render() !!}
@endsection
