@extends('layouts.sample')
@section('title', 'Create Payment Methods')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">View Bookings</h4>
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" value="{{$orders->fname}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" value="{{$orders->lname}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" value="{{$orders->email}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Contact Number</label>
                            <input type="text" class="form-control" value="{{$orders->phone}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" value="{{$orders->address1}}, {{$orders->address2}}, {{$orders->city}}, {{$orders->state}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Zip Code</label>
                            <input type="text" class="form-control" value="{{$orders->pincode}}" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Bookings Table</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders->orderitems as $order)
                                    <tr>
                                        <td>{{$order->products->name}}</td>
                                        <td>{{$order->prod_qty}}</td>
                                        <td>{{$order->price}}</td>
                                        <td>
                                            <img src="{{asset('assets/uploads/services/'.$order->products->image)}}" alt="Product Image" width="50px">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-8">
                                <p>Date: {{$orders->dateofevent}}</p>
                            </div>
                            <div class="col-md-4">
                                <p>Time: {{$orders->timeofevent}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <strong>Payment Mode: </strong><span class="badge badge-info">{{$orders->payment_method}}</span>
                                <h3 class="mt-3"><b>Grand Total: &#8369 {{number_format($orders->total_price,2)}}</b></h3>
                            </div>
                            <div class="col">
                                <strong>Proof of Payment</strong>
                                <img src="{{asset('assets/uploads/paymentimage/'.$orders->image)}}" width="300px" id="myImg">
                            </div>
                        </div>
                        <hr>
                        <div class="mt-3">
                            <label>Order Status</label>
                            <form action="{{url('update-OrderStatus/'.$orders->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <select class="form-control text-dark" aria-label="Default select" name="status">
                                    <option value="Ordered Placed">Book Placed</option>
                                    <option value="Verified">Verified</option>
                                    <option value="Done">Done</option>
                                    <option value="Cancelled">Cancelled</option>
                                </select>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>
<!-- main-panel ends -->

<script>
    $(function() {
       $('.pop').on('click', function() {
           $('.imagepreview').attr('src', $(this).find('img').attr('src'));
           $('#imagemodal').modal('show');   
       });		
});
</script>

<script>
    var modal = document.getElementById("myModal");
    var img = document.getElementById("myImg");
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function(){
     modal.style.display = "block";
     modalImg.src = this.src;
     captionText.innerHTML = this.alt;
    }
    
    var span = document.getElementsByClassName("close")[0];
    span.onclick = function() { 
     modal.style.display = "none";
    }
</script>
@endsection

