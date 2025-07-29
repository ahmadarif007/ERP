<!-- jQuery -->
<script src="{{ asset('erp_dashboard/bower_components/jquery/dist/jquery.min.js') }}"></script>

<!-- jQuery UI -->
<script src="{{ asset('erp_dashboard/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button); // Bootstrap ও UI টুলটিপ conflict fix
</script>

<!-- Bootstrap 3 -->
<script src="{{ asset('erp_dashboard/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- Sparkline -->
<script src="{{asset('erp_dashboard')}}/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
{{-- ======================================================================================== --}}

<!-- Morris.js charts -->
<script src="{{ asset('erp_dashboard/bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('erp_dashboard/bower_components/morris.js/morris.min.js') }}"></script>

<!-- jvectormap -->
<script src="{{ asset('erp_dashboard/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('erp_dashboard/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

<!-- jQuery Knob Chart -->
<script src="{{ asset('erp_dashboard/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>

<!-- daterangepicker -->
<script src="{{ asset('erp_dashboard/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('erp_dashboard/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

<!-- datepicker -->
<script src="{{ asset('erp_dashboard/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

<!-- WYSIHTML5 -->
<script src="{{ asset('erp_dashboard/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>

<!-- Slimscroll -->
<script src="{{ asset('erp_dashboard/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>

<!-- FastClick -->
<script src="{{ asset('erp_dashboard/bower_components/fastclick/lib/fastclick.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('erp_dashboard/dist/js/adminlte.min.js') }}"></script>

<!-- AdminLTE Dashboard -->
<script src="{{ asset('erp_dashboard/dist/js/pages/dashboard.js') }}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('erp_dashboard/dist/js/demo.js') }}"></script>

<!-- DataTables -->
<script src="{{ asset('erp_dashboard/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>


{{-- <!-- jQuery 3 -->
<script src="{{asset('erp_dashboard')}}/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('erp_dashboard')}}/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<!-- Bootstrap 3.3.7 -->
<script src="{{asset('erp_dashboard')}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="{{asset('erp_dashboard')}}/bower_components/raphael/raphael.min.js"></script>
<script src="{{asset('erp_dashboard')}}/bower_components/morris.js/morris.min.js"></script>

<!-- Sparkline -->
<script src="{{asset('erp_dashboard')}}/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>

<!-- jvectormap -->
<script src="{{asset('erp_dashboard')}}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{asset('erp_dashboard')}}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('erp_dashboard')}}/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('erp_dashboard')}}/bower_components/moment/min/moment.min.js"></script>
<script src="{{asset('erp_dashboard')}}/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="{{asset('erp_dashboard')}}/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('erp_dashboard')}}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="{{asset('erp_dashboard')}}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="{{asset('erp_dashboard')}}/bower_components/fastclick/lib/fastclick.js"></script>
<!-- DataTables -->
<script src="{{asset('erp_dashboard')}}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('erp_dashboard')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('erp_dashboard')}}/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('erp_dashboard')}}/dist/js/demo.js"></script> --}}


{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

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