@extends('admin.admin_layouts.main')
@section('admin-section')

<div class="row">
    <div class="card card-plain col-lg-12">
      <div class="card-header">
        <h4 class="font-weight-bolder">Add Category</h4>
        <p class="mb-0">Rich your shop with different type of Iced goods</p>
      </div>
      <div class="card-body">
        <form role="form" action={{url('/save_category')}} method="post" enctype="multipart/form-data">
          @csrf

          <div class="input-group input-group-outline mb-3">
            <input type="text" class="form-control" name="category_name" placeholder="Category Name">
          </div>

          <div class="input-group input-group-outline mb-3">
            <textarea class="form-control" name="category_description" placeholder="Category Description" rows="3"></textarea>
          </div>

          <div class="input-group input-group-outline mb-3">

            <input type="file" class="form-control" name="category_image">
          </div>

          <div class="control-group">
              <input type="checkbox" name="category_status">
              <label class="control-label"> Category Status</label>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Done</button>
          </div>
        </form>
      </div>

    </div>
  </div>

@endsection
