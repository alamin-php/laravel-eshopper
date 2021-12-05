@extends('layouts.backend.app')
@section('title','Brand')
@push('styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>{{ __('Brand') }}</h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">brand</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">All brands list</h3>
             <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                <tr>
                  <th>Brand Name</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Options</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($brands as $brand)
                  <tr>
                    <td>{{ $brand->brand_name }}</td>
                    <td>{{ $brand->brand_discription }}</td>
                    <td>
                      @if($brand->brand_status == 1)
                       <span class="label label-success">Published</span>
                       @else
                       <span class="label label-danger">Unpublish</span>
                      @endif</td>
                    <td>
                      <a href="{{ route('brand.brand_approval', $brand->id) }}"
                      @if($brand->brand_status == true)
                      class="btn btn-danger btn-sm"
                      @else
                      class="btn btn-success btn-sm"
                      @endif
                      >
                      @if($brand->brand_status == true)
                        <i class="fa fa-thumbs-down"></i>
                        @else
                        <i class="fa fa-thumbs-up"></i>
                      @endif
                      </a>

                      <a href="{{ route('brand.edit', $brand->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                      <a href="{{ route('brand.delete', $brand->id) }}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                  @endforeach
                
                </tbody>
                <tfoot>
                <tr>
                <th>Brand Name</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Options</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
@push('scripts')
  <!-- DataTables -->
  <script src="{{ asset('backend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
  <script>
    $(function () {
      $('#example1').DataTable()
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      })
    })
  </script>
@endpush