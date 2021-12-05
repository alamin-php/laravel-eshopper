<aside class="main-sidebar">

<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">

  <!-- Sidebar user panel (optional) -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p>{{Auth::user()->name}}</p>
      <!-- Status -->
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>

  <!-- search form (Optional) -->
  <form action="#" method="get" class="sidebar-form">
    <div class="input-group">
      <input type="text" name="q" class="form-control" placeholder="Search...">
      <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
    </div>
  </form>
  <!-- /.search form -->

  <!-- Sidebar Menu -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">HEADER</li>
    <!-- Optionally, you can add icons to the links -->
    <li class="{{ request()->is('admin') ? 'active' : '' }}"><a href="#"><i class="fa fa-th"></i> <span>Dashboard</span></a></li>
    <li class="{{ request()->is('dashboard/category') ? 'active' : '' }}"><a href="{{ route('category.index') }}"><i class="fa fa-th"></i> <span>All Categories</span></a></li>
    <li class="{{ request()->is('dashboard/category/create') ? 'active' : '' }}"><a href="{{ route('category.create') }}"><i class="fa fa-th"></i> <span>Add Category</span></a></li>
    <li class="{{ request()->is('dashboard/brand') ? 'active' : '' }}"><a href="{{ route('brand.index') }}"><i class="fa fa-th"></i> <span>All Brands</span></a></li>
    <li class="{{ request()->is('dashboard/brand/create') ? 'active' : '' }}"><a href="{{ route('brand.create') }}"><i class="fa fa-th"></i> <span>Add Brand</span></a></li>
    <li class="{{ request()->is('dashboard') ? 'active' : '' }}"><a href="#"><i class="fa fa-th"></i> <span>All Products</span></a></li>
    <li class="{{ request()->is('dashboard') ? 'active' : '' }}"><a href="#"><i class="fa fa-th"></i> <span>Add Product</span></a></li>
    <li class="{{ request()->is('dashboard') ? 'active' : '' }}"><a href="#"><i class="fa fa-th"></i> <span>Slider</span></a></li>
    <li class="{{ request()->is('dashboard') ? 'active' : '' }}"><a href="#"><i class="fa fa-th"></i> <span>Social Link</span></a></li>
    <li class="{{ request()->is('dashboard') ? 'active' : '' }}"><a href="#"><i class="fa fa-th"></i> <span>Shop Name</span></a></li>
    <li class="{{ request()->is('dashboard') ? 'active' : '' }}"><a href="#"><i class="fa fa-th"></i> <span>Delivery Mans</span></a></li>
  </ul>
  <!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->
</aside>