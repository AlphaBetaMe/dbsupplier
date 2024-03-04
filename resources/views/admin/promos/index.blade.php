@extends('layouts.sample')
@section('title', 'Event Voucher')
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-title">Event Voucher</h4>
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add Voucher</button>
                        </div>
                    </div>
                    <div class="table-responsive text-center">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Code</th>
                                    <th>Value</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($promos as $key => $promo)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$promo->code}}</td>
                                    <td>{{$promo->value}}</td>
                                    <td>
                                        @if($promo->status == 'Available')
                                            <span class="badge badge-success">{{$promo->status}}</span>
                                        @else
                                            <span class="badge badge-warning text-light">{{$promo->status}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('promos.edit', $promo->id)}}" class="btn btn-success btn-sm">Edit</a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['promos.destroy', $promo->id],'style'=>'display:inline']) !!}
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

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add Voucher</h5>
          <button type="button" class="close" onclick="closeModal()" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <form action="{{route('promos.store')}}" method="Post">
              @csrf
            <div class="modal-body">
                <div class="form-group">
                  <div class="col-md-12">
                      <label>Type</label>
                      <select name="type" class="form-control text-dark">
                          <option>Select Type</option>
                          <option value="Fixed">Fixed</option>
                          <!-- <option value="Percent">Percent</option> -->
                      </select>
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-md-12">
                      {{-- <label for=""> This is for Fixed Amount</label> --}}
                      <label>Fixed Amount</label>
                      <input type ="text" name="value" class="form-control" value="0">
                  </div>
                  <!-- <div class="col">
                      <label for=""> This is for Percent(%)</label>
                      <input type ="text" name="percent_off" class="form-control" value=0>
                  </div> -->
              </div>
        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary text-light" data-bs-dismiss="modal">Close</button> --}}
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    function closeModal() {
        $('#staticBackdrop').modal('hide');
    }
</script>
@endsection
