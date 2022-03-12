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
        <h5>Teacher Details</h5>
        <table class="table">
            <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Added BY</th>
                <th scope="col">Deleted BY</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($trade as $item => $value)
            <tr>
                <th scope="row">{{ $value->id;}}</th>
                <td>{{ $value->trade_name;}}</td>
                <td>{{ $value->AddedBy->name;}}</td>
                <td>{{ $value->DeletedBy->name;}}</td>
                <td> <a href="{{ url('Dashboard/restoreTrade'); }}/{{ $value->id;}}"> Restore Back </a> </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{ $trade->links(); }}
    </div>
    <div class="card-arrow">
        <div class="card-arrow-top-left"></div>
        <div class="card-arrow-top-right"></div>
        <div class="card-arrow-bottom-left"></div>
        <div class="card-arrow-bottom-right"></div>
    </div>
</div>
        
@endsection
