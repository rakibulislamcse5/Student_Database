@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
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
            <h4> Add New Student </h4>
            
            <form action="{{ url('Dashboard/StudentAddAction') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-label" for="name">User Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter User Name">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="name">User Roll</label>
                            <input name="roll" class="form-control" id="name" placeholder="Enter User Roll">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="name">User Registration</label>
                            <input type="text" name="registration" class="form-control" id="name" placeholder="Enter User Registration">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Shift <span class="text-danger">*</span></label>
                            <select name="shift" class="form-select form-select-lg bg-white bg-opacity-5">
                                <option value="0">First Shift</option>
                                <option value="1">Second Shift</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="name">User Email</label>
                            <input type="email" name="email" class="form-control" id="name" placeholder="Enter User Email">
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Select Trade <span class="text-danger">*</span></label>
                            <select name="trade" class="form-select form-select-lg bg-white bg-opacity-5">
                                @foreach ($trade as $item => $value)
                                    <option value="{{ $value->id;}}">{{ $value->trade_name;}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-label" for="name">User Password</label>
                            <input type="text" name="password" class="form-control" id="name" placeholder="Enter User Password">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="name">Confirm Password</label>
                            <input type="text" name="confirm_pass" class="form-control" id="name" placeholder="Enter User Password">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="name">Address</label>
                            <input type="text" name="address" class="form-control" id="name" placeholder="Enter User Address">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="name">Phone Number</label>
                            <input type="text" name="phone" class="form-control" id="name" placeholder="Enter User Phone Number">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="name">Session</label>
                            <input type="text" name="session" class="form-control" id="name" placeholder="Enter User Session">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Gender <span class="text-danger">*</span></label>
                            <select name="gender" class="form-select form-select-lg bg-white bg-opacity-5">
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-sm-10 offset-sm-1">
                        <input type="submit" class="btn btn-outline-theme btn-lg d-block w-100 fw-500 mb-3" value="Add Student">
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
