<!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer text-center">
            <strong>Copyright &copy; 2020 S. All rights reserved.
            <!-- <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.0.3-pre
            </div> -->
        </footer>
    </div>
   <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>plugins/jquery-ui/jquery-ui.js"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="<?= base_url('assets/'); ?>plugins/datatables/jquery.dataTables.js"></script>
    <script src="<?= base_url('assets/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <!-- Select2 -->
    <script src="<?= base_url('assets/'); ?>plugins/select2/js/select2.full.min.js"></script>
    <!-- Sweet Alert2 -->
    <script src="<?= base_url('assets/'); ?>plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url('assets/'); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/'); ?>dist/js/adminlte.js"></script>
    <!-- Script JS -->
    <script src="<?= base_url('assets/'); ?>dist/js/script.js"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="<?= base_url('assets/'); ?>dist/js/demo.js"></script>
    <script>
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        // $('.select2bs4').select2({
        //     theme: 'bootstrap4'
        // })
        $("#data-pegawai").DataTable({
            scrollX: true,
            scrollCollapse: true,
            autoWidth: true,  
            paging: true,       
            columnDefs: [       
                { "width": "150px", "targets": [2] },
                { "width": "120px", "targets": [3] },
                { "width": "100px", "targets": [4] },
                { "width": "110px", "targets": [6] },
                { "width": "110px", "targets": [7] },
            ]
        });
        $("#data-users").DataTable({
            scrollX: true,
            scrollCollapse: true,
            autoWidth: true,  
            paging: true,       
            columnDefs: [       
                { "width": "10px", "targets": 0 },
                { "width": "150px", "targets": [1,2] },
                { "width": "90px", "targets": [3,4] },
                { "width": "150px", "targets": [5, 6] },
            ]
        });
    
        
    </script>
    
</body>

</html>