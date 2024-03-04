@extends('layouts.sample')
@section('title', 'New Booking Lists')
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-title">Booking History</h4>
                            <a href="{{url('orders')}}" class="btn btn-primary text-light">New Bookings</a>
                        </div>
                        {{-- <p class="card-description">
                        Payment Details
                        </p> --}}
                        <form method="GET" id="liveSearchForm" class="d-flex align-items-center">
                            <input
                                type="text"
                                name="search"
                                value="{{ request()->get('search') }}"
                                class="form-control mr-2"
                                placeholder="Search..."
                                aria-label="Search"
                                aria-describedby="button-addon2"
                                id="searchInput">
                            <button class="btn btn-success" type="submit" id="button-addon2">Search</button>
                            <a href="{{route('orders.index')}}" class="btn btn-info ml-2">Refresh</a>
                        </form>
                    </div>
                    <div class="table-responsive text-center">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Customer/Client</th>    
                                    <th>Reference Number</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{date('d-m-y', strtotime($order->created_at))}}</td>
                                    <td>{{$order->fname}} {{$order->lname}}</td>
                                    <td>{{$order->trackingNumber}}</td>
                                    <td>{{$order->total_price}}</td>
                                    <td><span class="badge badge-success">{{$order->status}}</span></td>
                                    <td>
                                        <a href="{{url('admin/viewOrder/'.$order->id)}}" class="btn btn-primary btn-sm">View</a>
                                         {!! Form::open(['method' => 'DELETE','route' => ['orders.destroy', $order->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>
<!-- main-panel ends -->
@endsection
