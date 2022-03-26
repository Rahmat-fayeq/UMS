 <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="asset_admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="asset_admin/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="asset_admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="asset_admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="asset_admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="asset_admin/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="asset_admin/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="asset_admin/dist/js/demo.js"></script>
<!-- page script -->
<!-- bValidator  -->
<script type="text/javascript" src="bValidator/jquery.bvalidator.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
