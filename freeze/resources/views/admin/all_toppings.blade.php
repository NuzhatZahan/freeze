@extends('admin.admin_layouts.main')
@section('admin-section')

<div class="container-fluid-left py-4">
    <div class="row">
        <div class="col-12">
          <a href="{{url('add_topping')}}">
            <h6 class="text-capitalize ps-3">Add Toppings</h6>
          </a>
        </div>
    </div>
</div>
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">Toppings table</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Topping Image</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Topping Id</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Topping Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Topping Type</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Topping Price</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                @foreach ($all_topping_info as $topping)
                <tbody>
                  <tr>
                    <td><img src="{{url($topping->topping_image)}}" style="height: 80px; width:80px;"></td>
                    <td>{{$topping->topping_id}}</td>
                    <td>{{$topping->topping_name}}</td>
                    <td>{{$topping->topping_type}}</td>
                    <td>{{$topping->topping_price}}</td>
                    <td class="align-middle">

                        @if($topping->topping_status == 'on')
                            <a class="btn btn-success" href="{{url('/inactive_topping', $topping->topping_id)}}">
                                <span class="label label-success">Active</span>
                            </a>
                        @else
                            <a class="btn btn-danger" href="{{url('/active_topping', $topping->topping_id)}}">
                                <span class="label label-danger">Inactive</span>
                            </a>
                        @endif

                    </td>

                    <td class="center">
                        <a class="btn btn-danger" id = "delete" href="{{url('/delete_topping', $topping->topping_id)}}">
                            <span class="label label-success">Delete</span>
                        </a>
                    </td>
                  </tr>

                </tbody>
                @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
