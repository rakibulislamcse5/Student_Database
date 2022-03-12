@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4> Add New Student </h4>
            @if(session('danger'))
                <div class="alert alert-danger" role="alert">
                    {{ session('danger') }}.
                </div>
            @endif
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}.
                </div>
            @endif
            <form action="{{ url('Dashboard/StudentUpdateAction/') }}/{{ $update->id; }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-label" for="name">User Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ $update->name; }}">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="name">User Roll</label>
                            <input name="roll" class="form-control" id="name" value="{{ $update->roll_no; }}">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="name">User Registration</label>
                            <input type="text" name="registration" class="form-control" id="name" value="{{ $update->registration_no; }}">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Shift <span class="text-danger">*</span></label>
                            <select name="shift" class="form-select form-select-lg bg-white bg-opacity-5">
                                @if ($update->shift_group == 0)
                                    <option value="0" selected="selected">Day</option>
                                    <option value="1">Night</option>
                                @else
                                    <option value="0">Day</option>
                                    <option value="1" selected="selected">Night</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="name">User Email</label>
                            <input type="email" name="email" class="form-control" id="name" value="{{ $update->email; }}">
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Select Trade <span class="text-danger">*</span></label>
                            <select name="trade" class="form-select form-select-lg bg-white bg-opacity-5">
                                @foreach ($trade as $item => $value)
                                    @if ($value->id == $update->trade_id)
                                        <option value="{{ $value->id;}}" selected="selected">{{ $value->trade_name;}}</option>
                                    @else
                                        <option value="{{ $value->id;}}">{{ $value->trade_name;}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-label" for="name">Address</label>
                            <input type="text" name="address" class="form-control" id="name" value="{{ $update->address; }}">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="name">Phone Number</label>
                            <input type="text" name="phone" class="form-control" id="name" value="{{ $update->phone_number; }}">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="name">Session</label>
                            <input type="text" name="session" class="form-control" id="name" value="{{ $update->session; }}">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Gender <span class="text-danger">*</span></label>
                            <select name="gender" class="form-select form-select-lg bg-white bg-opacity-5">
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            @if( $update->session == '')
                                <img src="/images/student/no_image.png" class="rounded_image">
                            @else
                                <img src="{{ $update->image; }}" class="rounded_image">
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="defaultFile">Upload Your profile picture</label>
                            <input type="file" class="form-control" id="defaultFile" name="photo" />
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-sm-10 offset-sm-1">
                        <input type="submit" class="btn btn-outline-theme btn-lg d-block w-100 fw-500 mb-3" value="Update Student">
                    </div>
                </div>
            </form>
            <hr/>
            <form action="{{ url('Dashboard/changePass/'.$update->id) }}" method="post">
                @csrf
                <div class="form-group mb-3">
                    <label class="form-label" for="name">New Password</label>
                    <input type="text" name="password" class="form-control" id="name" placeholder="Enter New Password">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="name">Confirm Password</label>
                    <input type="text" name="confirm_password" class="form-control" id="name" placeholder="Confirm Password">
                </div>
                <div class="mb-3 row">
                    <div class="col-sm-10 offset-sm-1">
                        <input type="submit" class="btn btn-outline-theme btn-lg d-block w-100 fw-500 mb-3" value="Update Password">
                    </div>
                </div>
            </form>

        </div>
        <div class="card-arrow">
            <div class="card-arrow-top-left"></div>
            <div class="card-arrow-top-right"></div>
            <div class="card-arrow-bottom-left"></div>
            <div class="card-arrow-bottom-right"></div>
        </div>
    </div>
        
@endsection

