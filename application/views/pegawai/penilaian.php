      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"><?= $subtitle; ?></h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#"><?= $title; ?></a></li>
                                <li class="breadcrumb-item active"><?= $subtitle; ?></li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <div class="message" data-title="Penilaian Pegawai" data-message="<?= $this->session->flashdata('message'); ?>"></div>
                    <!-- <a href="<?= base_url('pegawai/add_penilaian'); ?>" class="btn btn-success">Tambah Data Gaji</a> -->
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Pegawai</th>
                                                <th>Administrasi Pengajaran</th>
                                                <th>Kedisplinan</th>
                                                <th>Personality / Assessment</th>
                                                <th>Character Building</th>
                                                <th>Total</th>
                                                <th>Grade</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no = 1;
                                                foreach($penilaian as $item) : 
                                                    $administrasi = $item['program_tahunan'] + $item['program_semester'] + $item['rpp'] + $item['program_ulangan'] + $item['program_analisis_penilaian'] + $item['program_remedial'] + $item['buku_penunjang_lain'];
                                                    $kedisiplinan = $item['kehadiran'] + $item['rapat_mingguan'] + $item['taklim_mingguan'] + $item['rapat_yayasan'] + $item['penyambutan_siswa'];
                                                    $personality = $item['inisiatif'] + $item['tanggung_jawab'] + $item['ketelitian_kerapihan'] + $item['kerja_sama'] + $item['penyelesaian_tugas'] + $item['kemampuan_mengajar'];
                                                    $karakter = $item['integritas'] + $item['client_personality'];
                                                    $total = $administrasi + $kedisiplinan + $personality + $karakter;
                                                    if ($total >= 90 && $total <=100) {
                                                        $grade = "A";
                                                    } elseif ($total >= 80 && $total <= 89) {
                                                        $grade = "B";
                                                    } elseif ($total >= 70 && $total <= 79) {
                                                        $grade = "C";
                                                    } elseif ($total >= 60 && $total <= 69) {
                                                        $grade = "D";
                                                    } else {
                                                        $grade = "E";
                                                    }
                                            ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $item['nama_pegawai']; ?></td>
                                                <td class="text-center"><?= $administrasi; ?></td>
                                                <td class="text-center"><?= $kedisiplinan; ?></td>
                                                <td class="text-center"><?= $personality; ?></td>
                                                <td class="text-center"><?= $karakter; ?></td>
                                                <td class="text-center"><?= $total; ?></td>
                                                <td class="text-center"><?= $grade; ?></td>
                                            </tr>
                                            <?php
                                                $no++;
                                                endforeach;
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
                <!--/. container-fluid -->
            </section>
            <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      