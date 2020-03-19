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
        $('.select2').select2();
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Initialize Select2 Elements
        // $('.select2bs4').select2({
        //     theme: 'bootstrap4'
        // })
        $('.data-table').DataTable();
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
                { "width": "100px", "targets": 7 },
            ]
        });
    
        $('#ed_nama_pegawai').on('change', function () {
            var nama_pegawai = $(this).val();
            

            $.ajax({
                url: "<?= base_url('pegawai/get_user_by_name'); ?>",
                type: "post",
                data: { nama_user : nama_pegawai },
                dataType: "json",
                success: function (res) {
                    console.log(res);
                    $('#add_id_user').attr('value', res['id']);
                }
            });
        });

        $('#filter_date').on('click', function() {
            var tgl = $('#tgl').val();
            var bln = $('#bln').val();
            var thn = $('#thn').val();
            console.log("tanggal : "+tgl);
            console.log("bulan : "+bln);
            console.log("tahun : "+thn);

            if (tgl == null || bln == null || thn == null) {
                alert('Pilih bulan, tanggal, dan tahun');
            } else {
                $('#card_rekap_tanggal').css('display', 'block');
                $('#hasil_rekap_tanggal').empty();
                $.ajax({
                    url: "<?= base_url('absensi/get_by_date'); ?>",
                    type: "POST",
                    data: { tanggal : tgl, bulan: bln, tahun: thn },
                    dataType: "json",
                    success: function (res) {
                        console.log(res);
                        if (res.length > 0) {
                            for (var i = 0; i < res.length; i++) {
                                $('#hasil_rekap_tanggal').append(`
                                    <tr>
                                        <td class="text-center">` + (i+1) + `</td>
                                        <td>` + res[i]['nama_pegawai'] + `</td>
                                        <td class="text-center">` + res[i]['status_absensi'] + `</td>
                                        <td class="text-center">` + res[i]['keterangan_absensi'] + `</td>
                                        <td class="text-center">` + res[i]['tgl_absensi'] + `</td>
                                    </tr>
                                `);
                            }
                        } else {
                            $('#hasil_rekap_tanggal').append(`
                                <tr>
                                    <td colspan="5" class="text-center">Data Tidak Ditemukan</td>
                                </tr>
                            `);
                        }
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            }
        });

        $('#filter_name').on('click', function () {
            var nama = $('#filter_nama_pegawai').val();
            console.log(nama);

            if (nama == null) {
                alert('Pilih nama pegawai terlebih dahulu');
            } else {
                $('#card_rekap_nama').css('display', 'block');
                $('#hasil_rekap_nama').empty();
                $.ajax({
                    url: "<?= base_url('absensi/get-by-name'); ?>",
                    type: "POST",
                    data: { id_pegawai : nama },
                    dataType: "json",
                    success: function (res) {
                        if (res.length > 0) {
                            for (var i = 0; i < res.length; i++) {
                                $('#hasil_rekap_nama').append(`
                                    <tr>
                                        <td class="text-center">` + (i+1) + `</td>
                                        <td>` + res[i]['nama_pegawai'] + `</td>
                                        <td class="text-center">` + res[i]['status_absensi'] + `</td>
                                        <td class="text-center">` + res[i]['keterangan_absensi'] + `</td>
                                        <td class="text-center">` + res[i]['tgl_absensi'] + `</td>
                                    </tr>
                                `);
                            }
                        } else {
                            $('#hasil_rekap_nama').append(`
                                <tr>
                                    <td colspan="5" class="text-center">Data Tidak Ditemukan</td>
                                </tr>
                            `);
                        }
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            }
        });
    </script>
    
</body>

</html>