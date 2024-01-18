@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content" bis_skin_checked="1">
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Category</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Category Edit Page</li>
            </ol>
        </nav>
    </div>
</div>
<div class="col-lg-12" bis_skin_checked="1">
    <div class="card" bis_skin_checked="1">
        <div class="card-body" bis_skin_checked="1">

            <form action="{{route('category.update',$catSlug->categories_slug)}}" method="post" enctype="multipart/form-data">
               @csrf

                <div class="row mb-3" bis_skin_checked="1">
                <div class="col-sm-3" bis_skin_checked="1">
                    <h6 class="mb-0">Name</h6>
                </div>
                <div class="col-sm-9 text-secondary" bis_skin_checked="1">
                    <input type="text" name="category_name" class="form-control" value="{{$catSlug->categories_name}}">
                </div>
            </div>

            <div class="row mb-3" bis_skin_checked="1">
                <div class="col-sm-3" bis_skin_checked="1">
                    <h6 class="mb-0">Photo</h6>
                </div>
                <div class="col-sm-9 text-secondary" bis_skin_checked="1">
                    <input type="file" name="category_image" id="image" class="form-control">
                </div>
            </div>
            <div class="row mb-3" bis_skin_checked="1">
                <div class="col-sm-3" bis_skin_checked="1">
                    <h6 class="mb-0"></h6>
                </div>
                <div class="col-sm-9 text-secondary" bis_skin_checked="1">
                <img id="showImage" src="{{asset('frontend_upload/categories/'.$catSlug->categories_image)}}" width="120" height="120" alt="Category Image">
                </div>
            </div>
            <div class="row" bis_skin_checked="1">
                <div class="col-sm-3" bis_skin_checked="1"></div>
                <div class="col-sm-9 text-secondary" bis_skin_checked="1">
                    <input type="submit" class="btn btn-primary px-4" value="Add Brand">
                </div>
            </div>
            </form>

        </div>
    </div>

</div>
</div>
@endsection
