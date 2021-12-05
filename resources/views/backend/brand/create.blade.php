@extends('layouts.backend.app')
@section('title','Create Brand')
@push('styles')

@endpush

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>{{ __('Create brand') }}</h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('brand.index') }}"><i class="fa fa-user"></i> Brand</a></li>
        <li class="active">Create</li>
      </ol>
    </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{ __('Create a new brand') }}</h3>
            </div>
            <!-- /.box-header -->
            <form action="{{ route('brand.add') }}" method="POST">
              @csrf
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                          <div class="form-group">
                            <label for="inputbrandName"> {{ __('Brand name') }}</label>
                            <input type="text" name="brand_name" class="form-control" id="inputbrandName" placeholder="Enter a new brand name">
                            @error('brand_name')
                              <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="brand_discription"> {{ __('Brand discription') }}</label>
                            <textarea name="brand_discription" id="" cols="30" rows="6" class="form-control" id="brand_discription" placeholder="Enter brand details"></textarea>
                            @error('brand_discription')
                              <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                    </div>
                  </div>
                </div>
                <div class="box-footer">
                <a href="{{ route('brand.index') }}" type="button" class="btn btn-default btn-sm">{{ __('Back') }}</a>
                <button type="submit" class="btn btn-primary btn-sm pull-right">{{ __('Create brand') }}</button>
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

@endpush