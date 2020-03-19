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
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-9">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <!-- form start -->
                                <form role="form" method="post" action="<?= base_url('pegawai/simpan_penilaian'); ?>">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Pegawai</label>
                                            <input type="hidden" name="id_pegawai" value="<?= $pegawai['id_pegawai'] ?>">
                                            <input type="text" class="form-control" value="<?= $pegawai['nama_pegawai']; ?>" disabled>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="form-group mb-2">
                                                    <label for="exampleInputEmail1">Administrasi Pengajaran</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1" value="Program Tahunan" disabled>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <input type="text" class="form-control" id="exampleInputEmail1" value="Program Semester" disabled>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <input type="text" class="form-control" id="exampleInputEmail1" value="RPP" disabled>                                                
                                                </div>
                                                <div class="form-group mb-2">
                                                    <input type="text" class="form-control" id="exampleInputEmail1" value="Program Ulangan" disabled>                                                
                                                </div>
                                                <div class="form-group mb-2">
                                                    <input type="text" class="form-control" id="exampleInputEmail1" value="Program Analisis Penilaian" disabled>                                                
                                                </div>
                                                <div class="form-group mb-2">
                                                    <input type="text" class="form-control" id="exampleInputEmail1" value="Program Remedial" disabled>                                                
                                                </div>
                                                <div class="form-group mb-2">
                                                    <input type="text" class="form-control" id="exampleInputEmail1" value="Dan Buku Penunjang Lainnya" disabled>                                                
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="exampleInputEmail1">Kedisiplinan</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1" value="Kehadiran" disabled>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <input type="text" class="form-control" id="exampleInputEmail1" value="Mengikuti Rapat Mingguan" disabled>                                                
                                                </div>
                                                <div class="form-group mb-2">
                                                    <input type="text" class="form-control" id="exampleInputEmail1" value="Mengikuti Taklim Mingguan" disabled>                                                
                                                </div>
                                                <div class="form-group mb-2">
                                                    <input type="text" class="form-control" id="exampleInputEmail1" value="Mengikuti Rapat Yayasan" disabled>                                                
                                                </div>
                                                <div class="form-group mb-2">
                                                    <input type="text" class="form-control" id="exampleInputEmail1" value="Wellcome Student" disabled>                                                
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="exampleInputEmail1">Personality / Assessment</label>
                                                    <input type="text" class="form-control mb-2" id="exampleInputEmail1" value="Inisiatif / Kreatif" disabled>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <input type="text" class="form-control mb-2" id="exampleInputEmail1" value="Tanggung Jawab" disabled>                                                
                                                </div>
                                                <div class="form-group mb-2">
                                                    <input type="text" class="form-control mb-2" id="exampleInputEmail1" value="Ketelitian dan Kerapihan" disabled>                                                
                                                </div>
                                                <div class="form-group mb-2">
                                                    <input type="text" class="form-control mb-2" id="exampleInputEmail1" value="Dapat Bekerja Sama" disabled>                                                
                                                </div>
                                                <div class="form-group mb-2">
                                                    <input type="text" class="form-control mb-2" id="exampleInputEmail1" value="Dapat Menyelesaikan Tugas" disabled>                                                
                                                </div>
                                                <div class="form-group mb-2">
                                                    <input type="text" class="form-control mb-2" id="exampleInputEmail1" value="Kemampuan Mengajar" disabled>                                                
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="exampleInputEmail1">Character Building</label>
                                                    <input type="text" class="form-control mb-2" id="exampleInputEmail1" value="Integritas" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control mb-2" id="exampleInputEmail1" value="Client Personality" disabled>                                                
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group mb-2">
                                                    <label for="exampleInputEmail1">Nilai</label>
                                                    <select class="form-control" name="program_tahunan" required>
                                                        <option selected disabled></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <select class="form-control" name="program_semester" required>
                                                        <option selected disabled></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <select class="form-control" name="rpp" required>
                                                        <option selected disabled></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <select class="form-control" name="program_ulangan" required>
                                                        <option selected disabled></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <select class="form-control" name="program_analisis_penilaian" required>
                                                        <option selected disabled></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <select class="form-control" name="program_remedial" required>
                                                        <option selected disabled></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <select class="form-control" name="buku_penunjang_lain" required>
                                                        <option selected disabled></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                
                                                <div class="form-group mb-2">
                                                    <label for="exampleInputEmail1">Nilai</label>
                                                    <select class="form-control mb-2" name="kehadiran" required>
                                                        <option selected disabled></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <select class="form-control" name="rapat_mingguan" required>
                                                        <option selected disabled></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <select class="form-control" name="taklim_mingguan" required>
                                                        <option selected disabled></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <select class="form-control" name="rapat_yayasan" required>
                                                        <option selected disabled></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <select class="form-control" name="penyambutan_siswa" required>
                                                        <option selected disabled></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                    
                                                <div class="form-group mb-2">
                                                    <label for="exampleInputEmail1">Nilai</label>
                                                    <select class="form-control" name="inisiatif" required>
                                                        <option selected disabled></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <select class="form-control" name="tanggung_jawab" required>
                                                        <option selected disabled></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <select class="form-control" name="ketelitian_kerapihan" required>
                                                        <option selected disabled></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <select class="form-control" name="kerja_sama" required>
                                                        <option selected disabled></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <select class="form-control" name="penyelesaian_tugas" required>
                                                        <option selected disabled></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <select class="form-control" name="kemampuan_mengajar" required>
                                                        <option selected disabled></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
            
                                                <div class="form-group mb-2">
                                                    <label for="exampleInputEmail1">Nilai</label>
                                                    <select class="form-control" name="integritas" required>
                                                        <option selected disabled></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <select class="form-control" name="client_personality" required>
                                                        <option selected disabled></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>                                                    
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>    
                </div>
                <!--/. container-fluid -->
            </section>
            <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      