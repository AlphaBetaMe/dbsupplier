@extends('layouts.sample')
@section('title', 'Edit Coupon')
@section('content')
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Coupon</h4>
                  <form action="{{route('promos.update', $promos->id)}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Coupon Code</label>
                            <input type="text" name="code" value="{{$promos->code}}" class="form-control" readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Value</label>
                            <input type="text" name="value" value="{{$promos->value}}" class="form-control">
                          </div>
                        </div>
                      </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    {{-- <button class="btn btn-light">Cancel</button> --}}
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- main-panel ends -->
@endsection