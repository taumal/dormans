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
                            <th>Division</th>
                            <th>Web Link</th>
                            <th width="80px">Action</th>
                        </tr>
                        @foreach ($districts as $key => $district)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $district->name }}</td>
                                <td>{{ $district->bn_name }}</td>
                                <td>{{ $district->division->name }}</td>
                                <td>{{ $district->url }}</td>
                                <td>
                                    <a class="btn btn-link" href="{{ url('http://'.$district->url) }}" target="_blank"><i class="fas fa-external-link-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    {!! $districts->render() !!}
@endsection
