@extends('layouts.backend.app')
@section('title','Create Category')
@push('styles')

@endpush

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>{{ __('Create Category') }}</h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('category.index') }}"><i class="fa fa-user"></i> Category</a></li>
        <li class="active">Create</li>
      </ol>
    </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{ __('Create a new category') }}</h3>
            </div>
            <!-- /.box-header -->
            <form action="{{ route('category.add') }}" method="POST">
              @csrf
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                          <div class="form-group">
                            <label for="inputcategoryName"> {{ __('Category name') }}</label>
                            <input type="text" name="category_name" class="form-control" id="inputcategoryName" placeholder="Enter a new category name">
                            @error('category_name')
                              <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="category_discription"> {{ __('Category discription') }}</label>
                            <textarea name="category_discription" id="" cols="30" rows="6" class="form-control" id="category_discription" placeholder="Enter category details"></textarea>
                            @error('category_discription')
                              <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                    </div>
                  </div>
                </div>
                <div class="box-footer">
                <a href="{{ route('category.index') }}" type="button" class="btn btn-default btn-sm">{{ __('Back') }}</a>
                <button type="submit" class="btn btn-primary btn-sm pull-right">{{ __('Create Category') }}</button>
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