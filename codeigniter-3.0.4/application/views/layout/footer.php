            <!-- /.main section -->
            </section>
        <!-- /.content wrapper-->
        </div>
     
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
              <b>Version</b> 1.0
            </div>
            <strong>Copyright &copy; 2018 Marsel Sampe Asang</strong> All rights reserved.
        </footer>

    <!-- /.main wrapper-->       
    </div>

    <!-- JS DEPENDENCIES -->
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url('assets/adminlte-2.4.5/dependencies/jquery-ui/jquery-ui.min.js') ?>"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>

    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url('assets/adminlte-2.4.5/dependencies/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <!-- DataTables -->
    <script src="<?= base_url('assets/adminlte-2.4.5/dependencies/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('assets/adminlte-2.4.5/dependencies/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
    <!-- daterangepicker -->
    <script src="<?= base_url('assets/adminlte-2.4.5/dependencies/moment/min/moment.min.js') ?>"></script>
    <script src="<?= base_url('assets/adminlte-2.4.5/dependencies/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
    <!-- datepicker -->
    <script src="<?= base_url('assets/adminlte-2.4.5/dependencies/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>"></script>
    <!-- Select2 -->
    <script src="<?= base_url('assets/adminlte-2.4.5/dependencies/select2/dist/js/select2.full.min.js') ?>"></script>
    <!-- Slimscroll -->
    <script src="<?= base_url('assets/adminlte-2.4.5/dependencies/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
    <!-- FastClick -->
    <script src="<?= base_url('assets/adminlte-2.4.5/dependencies/fastclick/lib/fastclick.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/adminlte-2.4.5/core/js/adminlte.min.js') ?>"></script>

    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2();
        });
    </script>
  </body>
</html>