@extends('admin.admin_layouts.main')
@section('admin-section')

<div class="row">
    <div class="card card-plain col-lg-12">
      <div class="card-header">
        <h4 class="font-weight-bolder">Add Toppings</h4>
        <p class="mb-0">Enhance your desserts with crunchy bites.</p>
      </div>
      <div class="card-body">
        <form role="form" action={{url('/save_topping')}} method="post" enctype="multipart/form-data">
          @csrf

          <div class="input-group input-group-outline mb-3">
            <input type="text" class="form-control" name="topping_name" placeholder="Topping Name">
          </div>

          <div class="input-group input-group-outline mb-3">
            <input type="text" class="form-control" name="topping_price" placeholder="Topping Price">
          </div>

          <div class="input-group input-group-outline mb-3">
            <input type="text" class="form-control" name="topping_type" placeholder="Topping Type">
          </div>


          <div class="input-group input-group-outline mb-3">

            <input type="file" class="form-control" name="topping_image">
          </div>

          <div class="control-group">
              <input type="checkbox" name="topping_status">
              <label class="control-label"> Topping Status</label>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Done</button>
          </div>
        </form>
      </div>

    </div>
  </div>

@endsection
