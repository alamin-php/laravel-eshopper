@extends('layouts.backend.app')
@section('title','Create Product')
@push('styles')
  <link rel="stylesheet" href="{{ asset('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
@endpush

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>{{ __('Create product') }}</h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('product.index') }}"><i class="fa fa-user"></i> product</a></li>
        <li class="active">Create</li>
      </ol>
    </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{ __('Create a new product') }}</h3>
            </div>
            <!-- /.box-header -->
            <form action="{{ route('product.add') }}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-9">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="inputproductName"> {{ __('Product name') }}</label>
                            <input type="text" name="name" class="form-control" id="inputproductName" placeholder="Enter a new product name">
                            @error('name')
                              <span class="invalid-feedback text-danger" role="alert">
                              <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="inputproductName"> {{ __('Product category') }}</label>
                            <select name="cat_id" id="" class="form-control">
                            <option value="" disabled selected>==Choose One==</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="inputproductName"> {{ __('Product brand') }}</label>
                            <select name="brand_id" id="" class="form-control">
                            <option value="" disabled selected>==Choose One==</option>
                            @foreach($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                            @endforeach
                            </select>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="inputproductName"> {{ __('Product price') }}</label>
                            <input type="number" name="price" class="form-control" placeholder="Enter product price">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="inputproductName"> {{ __('Product size') }}</label>
                            <input type="text" name="size" class="form-control" placeholder="Enter product size">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="inputproductName"> {{ __('Product color') }}</label>
                            <input type="text" name="color" class="form-control" placeholder="Enter product color">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                            <label for="short_description"> {{ __('Short discription') }}</label>
                            <textarea class="textarea" name="short_description" placeholder="Enter product short description"
                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            @error('short_description')
                            <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="long_description"> {{ __('Long discription') }}</label>
                            <textarea class="textarea" name="long_description" placeholder="Enter product long description"
                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            @error('long_description')
                            <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                     <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                          <label for="inputproductName"> {{ __('Image') }}</label>
                          <input type="file" name="image" id="inputImage" accept="iamge/*" class="upload" onchange="readURL(this);">
                          </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                        <img class="img-fulid" id="image" src="" alt="Upload product image">
                        </div>
                     </div>
                     <div class="row">
                       <div class="col-md-12">
                        <div class="checkbox">
                          <label>
                          <input type="checkbox" name="status" value="1">
                          This product will be publish?
                          </label>
                        </div>
                       </div>
                     </div>
                    </div>
                  </div>
                <div class="box-footer">
                <a href="{{ route('product.index') }}" type="button" class="btn btn-default btn-sm">{{ __('Back') }}</a>
                <button type="submit" class="btn btn-primary btn-sm pull-right">{{ __('Create product') }}</button>
              </div>
              </form>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
@push('scripts')
<script src="{{ asset('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script>
  $(function () {
    $('.textarea').wysihtml5()
  })
</script>
<script type="text/javascript">
        function readURL(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function (e){
                    $('#image')
                        .attr('src', e.target.result)
                        .width(250)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush