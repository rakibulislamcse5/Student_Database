@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-body">
        @if(!$message == '')
            <div class="alert alert-danger" role="alert">
                {{ $message }}.
            </div>
        @endif
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
        <h5>Student Details</h5>
        <table class="table">
            <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Roll</th>
                <th scope="col">Registration</th>
                <th scope="col">Session</th>
                <th scope="col">Shift</th>
                <th scope="col">Trade</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Address</th>
                <th scope="col">Deleted BY</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($user as $key => $value)
            <tr>
                <th scope="row">{{ $value->id;}}</th>
                <td>
                    <div class="td-image">
                        <img src="{{ $value->image;}}" class="menu-img online">
                    </div>
                </td>
                <td>{{ $value->name;}}</td>
                <td>{{ $value->roll_no;}}</td>
                <td>{{ $value->registration_no;}}</td>
                <td>{{ $value->session;}}</td>
                <td>
                @if ($value->sift_group == 0 )
                    First Shift
                @else
                    Second Shift
                @endif</td>
                @if(!$value->trade_id == Null or !$value->trade_id == '')
                    <td>{{ $value->Trade->trade_name;}}</td>
                @else
                    <td>No Trade Selected</td>
                @endif
                <td>{{ $value->phone_number;}}</td>
                <td>{{ $value->address;}}</td>
                <td>{{ $value->DeletedBy->name;}}</td>
                <td> <a href="{{ url('Dashboard/restoreStudent') }}/{{ $value->id;}}"> Restore Back </a> </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{ $user->links(); }}
    </div>
    <div class="card-arrow">
        <div class="card-arrow-top-left"></div>
        <div class="card-arrow-top-right"></div>
        <div class="card-arrow-bottom-left"></div>
        <div class="card-arrow-bottom-right"></div>
    </div>
</div>
        
@endsection
