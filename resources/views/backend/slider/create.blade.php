@extends('layouts.backend.app')
@section('title','Create Slider')
@push('styles')

@endpush

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>{{ __('Create slider') }}</h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('slider.index') }}"><i class="fa fa-user"></i> slider</a></li>
        <li class="active">Create</li>
      </ol>
    </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{ __('Create a new slider') }}</h3>
            </div>
            <!-- /.box-header -->
            <form action="{{ route('slider.add') }}" method="POST"  enctype="multipart/form-data">
              @csrf
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                          <div class="form-group">
                            <label for="sliderTitle"> {{ __('Slider Title') }}</label>
                            <input type="text" name="slider_title" class="form-control" id="sliderTitle" placeholder="Enter slider title">
                            @error('slider_title')
                              <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="btn_title"> {{ __('Button Title') }}</label>
                            <input type="text" name="btn_title" class="form-control" id="sliderTitle" placeholder="Enter slider title">
                            @error('btn_title')
                              <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="btn_link"> {{ __('Button Link') }}</label>
                            <input type="text" name="btn_link" class="form-control" id="sliderTitle" placeholder="Enter slider title">
                            @error('btn_link')
                              <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="slider_discription"> {{ __('Slider discription') }}</label>
                            <textarea name="slider_discription" id="" cols="30" rows="6" class="form-control" id="slider_discription" placeholder="Enter slider details"></textarea>
                            @error('slider_discription')
                              <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                          <div class="form-group">
                          <label for="sliderImage"> {{ __('Image') }}</label>
                          <input type="file" name="image" id="inputImage" accept="iamge/*" class="upload" onchange="readURL(this);">
                          <img class="img-fulid" id="image" src="" alt="Upload slider image">
                          </div>
                          <div class="checkbox">
                          <label>
                          <input type="checkbox" name="status" value="1">
                          This product will be publish?
                          </label>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="box-footer">
                <a href="{{ route('slider.index') }}" type="button" class="btn btn-default btn-sm">{{ __('Back') }}</a>
                <button type="submit" class="btn btn-primary btn-sm pull-right">{{ __('Add slider') }}</button>
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