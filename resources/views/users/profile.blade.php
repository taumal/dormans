@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/users')}}">User</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/user/'.$user->id) }}">Profile</a></li>
                        <li class="breadcrumb-item active">{{ $user->name }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                             src="{{ asset('images/no-image.gif') }}"
                             alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center">{{ $user->name }}</h3>
                    <p class="text-muted text-center">{{ $user->occupation }}</p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">About Me</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <strong><i class="fas fa-business-time mr-1"></i> Profession</strong>

                    <p class="text-muted">
                        {{ $user->occupation }},<br>{{ $user->organization }}
                    </p>

                    <hr>

                    <strong><i class="fas fa-id-card mr-1"></i> Contact</strong>

                    <p class="text-muted">
                        <b>Mobile: </b> {{ $user->phone }}<br>
                        <b>Email: </b> {{ $user->email }}
                    </p>

                    <hr>

                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location From</strong>

                    <p class="text-muted">{{ $district->name }}, {{ $division->name }}</p>

                    <hr>

                    <strong><i class="fas fa-city mr-1"></i> Address</strong>

                    <p class="text-muted">{{ $user->address }}</p>

                    <hr>

                    <strong><i class="fas fa-pencil-alt mr-1"></i> Boarding Info</strong>

                    <p class="text-muted">
                        <b>Member since: </b> {{ date('F, Y', strtotime($user->arrival_date)) }}<br>
                        <b>Seat taken: </b> {{ $user->seat_taken }}
                    </p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Timeline</a></li>
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="timeline">
                            <div class="timeline timeline-inverse">
                                <!-- timeline time label -->
                                <div class="time-label">
                                    <span class="bg-danger">
                                        10 Feb. 2014
                                    </span>
                                </div>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-envelope bg-primary"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                        <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                        <div class="timeline-body">
                                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                            quora plaxo ideeli hulu weebly balihoo...
                                        </div>
                                        <div class="timeline-footer">
                                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-user bg-info"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                                        <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                                        </h3>
                                    </div>
                                </div>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-comments bg-warning"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                                        <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                                        <div class="timeline-body">
                                            Take me to your leader!
                                            Switzerland is small and neutral!
                                            We are more like Germany, ambitious and misunderstood!
                                        </div>
                                        <div class="timeline-footer">
                                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- END timeline item -->
                                <!-- timeline time label -->
                                <div class="time-label">
                                    <span class="bg-success">
                                        3 Jan. 2014
                                    </span>
                                </div>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-camera bg-purple"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                                        <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                        <div class="timeline-body">
                                            <img src="http://placehold.it/150x100" alt="...">
                                            <img src="http://placehold.it/150x100" alt="...">
                                            <img src="http://placehold.it/150x100" alt="...">
                                            <img src="http://placehold.it/150x100" alt="...">
                                        </div>
                                    </div>
                                </div>
                                <!-- END timeline item -->
                                <div>
                                    <i class="far fa-clock bg-gray"></i>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="settings">
                            <form class="form-horizontal" method="post" action="{{ route('change.password') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="inputName2" class="col-sm-3 col-form-label">Current Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="current_password" placeholder="Current Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-3 col-form-label">New Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="new_password" placeholder="New Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputSkills" class="col-sm-3 col-form-label">Confirm Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-3 col-sm-9">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
@endsection
