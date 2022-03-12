@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            @if(!$message == '')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}.
                </div>
            @endif
            <h4> Add New Trade </h4>
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
            <form action="{{ url('Dashboard/TradeAddAction') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label" for="name">Trade Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter Trade Name">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Status <span class="text-danger">*</span></label>
                                <select name="status" class="form-select form-select-lg bg-white bg-opacity-5">
                                    <option value="0">Running</option>
                                    <option value="1">Not Aviable</option>
                                </select>
                            </div>
                    </div>
                    <div class="col-md-6">
                        <table class="table">
                            <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Trade Name</th>
                                <th scope="col">Created Date</th>
                                <th scope="col">Last Updated</th>
                                <th scope="col">Trade Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($trade as $item => $value)
                            <tr>
                                <th scope="row">{{ $value->id;}}</th>
                                <td>{{ $value->trade_name;}}</td>
                                <td>{{ $value->created_at;}}</td>
                                <td>{{ $value->updated_at;}}</td>
                                <td>
                                    @if ($value->trade_status == 0)
                                        <span class="badge bg-success">Running</span>
                                    @else
                                        <span class="badge bg-danger">Not aviable</span>
                                    @endif
                                </td>
                                <td> <a href="{{ url('Dashboard/UpdateTrade/') }}/{{ $value->id;}}"> Update </a> | <a href="{{ url('Dashboard/TradeDeleteAction/') }}/{{ $value->id;}}"> Delete </a> </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $trade->links(); }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-sm-10 offset-sm-1">
                        <input type="submit" class="btn btn-outline-theme btn-lg d-block w-100 fw-500 mb-3" value="Add Trade">
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
