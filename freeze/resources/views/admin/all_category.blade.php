@extends('admin.admin_layouts.main')
@section('admin-section')

<div class="container-fluid-left py-4">
    <div class="row">
        <div class="col-12">
          <a href="{{url('add_category')}}">
            <h6 class="text-capitalize ps-3">Add Category</h6>
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
              <h6 class="text-white text-capitalize ps-3">Authors table</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category Image</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Category Id</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Category Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Category Description</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                @foreach ($all_category_info as $category)
                <tbody>
                  <tr>
                    <td><img src="{{url($category->category_image)}}" style="height: 80px; width:80px;"></td>
                    <td>{{$category->category_id}}</td>
                    <td>{{$category->category_name}}</td>
                    <td>{{$category->category_description}}</td>
                    <td class="align-middle">

                        @if($category->category_status == 'on')
                            <a class="btn btn-success" href="{{url('/inactive_category', $category->category_id)}}">
                                <span class="label label-success">Active</span>
                            </a>
                        @else
                            <a class="btn btn-danger" href="{{url('/active_category', $category->category_id)}}">
                                <span class="label label-danger">Inactive</span>
                            </a>
                        @endif

                    </td>

                    <td class="center">
                        <a class="btn btn-danger" id = "delete" href="{{url('/delete_category', $category->category_id)}}">
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
