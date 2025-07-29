<!DOCTYPE html>
<html>
  @include('admin.includes.head')
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      @include('admin.includes.header')
      <!-- Left side column. contains the logo and sidebar -->
      @include('admin.includes.leftSidebar')

      <!-- Content Wrapper. Contains page content -->

      <!-- Content Header (Page header) -->
      <div class="content-wrapper">
        @yield('content', 'Default content')
      </div>
      <!-- /.content-wrapper -->

      <!-- /footer -->
        @include('admin.includes.footer')
      <!-- /footer -->

      <!-- Control Sidebar -->
      @include('admin.includes.sidebar')
      <!-- /.control-sidebar -->

      <!-- Add the sidebar's background. This div must be placed
          immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    @include('admin.includes.js')
  </body>
</html>
