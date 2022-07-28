@extends('admin.admin_layouts.main')
@section('admin-section')

<div class="row">
    <div class="card card-plain col-lg-12">
      <div class="card-header">
        <h4 class="font-weight-bolder">Add Flavours</h4>
        <p class="mb-0">Rich your shop with different type of Iced goods</p>
      </div>
      <div class="card-body">
        <form role="form" action={{url('/save_flavour')}} method="post" enctype="multipart/form-data">
          @csrf

          <div class="input-group input-group-outline mb-3">
            <input type="text" class="form-control" name="flavour_name" placeholder="Flavour Name">
          </div>

          <div class="input-group input-group-outline mb-3">
            <input type="text" class="form-control" name="flavour_price" placeholder="Flavour Price">
          </div>

          <div class="input-group input-group-outline mb-3">
            <input type="text" class="form-control" name="flavour_type" placeholder="Flavour Type">
          </div>


            <div class="input-group input-group-outline mb-3">
              <select id="selectError3" class="input-group input-group-outline mb-3" name="category_id">
                <option>Select category...</option>
                    <?php
                        $all_publish_category =DB::table('category')->where('category_status','on')->get();
                        foreach ($all_publish_category as $category) {
                        ?>

                            <option class="input-group input-group-outline mb-3"
                                    value="{{$category->category_id}}">{{$category->category_name}}
                            </option>

                    <?php }  ?>
              </select>
            </div>


          <div class="input-group input-group-outline mb-3">

            <input type="file" class="form-control" name="flavour_image">
          </div>

          <div class="control-group">
              <input type="checkbox" name="flavour_status">
              <label class="control-label"> Flavour Status</label>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Done</button>
          </div>
        </form>
      </div>

    </div>
  </div>

@endsection
