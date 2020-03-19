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
                    <a href="<?= base_url('users/update-data-diri') ?>" class="btn btn-info">Update Data Diri</a>
                    <div class="row mt-3">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="message" data-title="Data Pegawai" data-message="<?= $this->session->flashdata('message'); ?>"></div>
                            
                            <div class="card card-primary">
                                <!-- /.card-header -->
                                <!-- form start -->
                                <input type="hidden" name="id_pegawai" id="id_pegawai" value="<?= $pegawai['id_pegawai']; ?>">
                                <div class="card-body">
                                    <img src="<?= base_url(); ?>assets/dist/img/profile/<?= $pegawai['foto_pegawai']; ?>" width="150px" height="150px" alt="Foto Pegawai" class="img-thumbnail">

                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nip">NIP</label>
                                                <input type="text" class="form-control" name="nip_pegawai" id="nip_pegawai" value="<?= $pegawai['nip_pegawai']; ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">Nama Pegawai</label>
                                                <input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai" value="<?= $pegawai['nama_pegawai']; ?>" readonly>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="tempat_lahir">Tempat Lahir</label>
                                                        <input type="text" class="form-control" name="tmpt_lahir_pegawai" id="tmpt_lahir_pegawai" value="<?= $pegawai['tmpt_lahir_pegawai']; ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                                        <input type="text" class="form-control" name="tgl_lahir_pegawai" id="tgl_lahir_pegawai" value="<?= $pegawai['tgl_lahir_pegawai']; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                                <input type="text" class="form-control" value="<?= ($pegawai['jns_kelamin_pegawai'] == "L") ? 'Laki-Laki' : 'Perempuan'; ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="status_pernikahan">Status Pernikahan</label>
                                                <input type="text" class="form-control" value="<?= $pegawai['status_pernikahan_pegawai']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="no_handphone">No. Handphone</label>
                                                <input type="text" class="form-control" name="no_hp_pegawai" id="no_hp_pegawai" value="<?= $pegawai['no_hp_pegawai']; ?>" readonly> 
                                            </div>  
                                            <div class="form-group">
                                                <label for="jabatan">Jabatan</label>
                                                <input type="text" class="form-control" name="no_hp_pegawai" id="no_hp_pegawai" value="<?= $pegawai['nama_jabatan']; ?>" readonly> 
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" name="email_pegawai" id="email_pegawai" value="<?= $pegawai['email_pegawai']; ?>" readonly>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="tanggal_masuk">Tanggal Masuk</label>
                                                        <input type="text" class="form-control" name="tgl_masuk_pegawai" id="tgl_masuk_pegawai" value="<?= $pegawai['tgl_masuk_pegawai']; ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="status">Status</label>
                                                        <input type="text" class="form-control" value="<?= $pegawai['status_pegawai']; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="agama">Agama</label>
                                                        <input type="text" class="form-control" value="<?= $pegawai['agama_pegawai']; ?>" readonly>
                                                    </div>
                                                </div>  
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                                                        <input type="text" class="form-control" value="<?= $pegawai['pend_terakhir_pegawai']; ?>" readonly>
                                                    </div>
                                                </div>  
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <textarea class="form-control" name="alamat_pegawai" id="alamat_pegawai" rows="3" readonly><?= $pegawai['alamat_pegawai']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
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

      