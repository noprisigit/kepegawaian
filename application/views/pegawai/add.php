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
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="message" data-title="Data Pegawai" data-message="<?= $this->session->flashdata('message'); ?>"></div>
                            
                            <div class="card card-primary">
                                <!-- /.card-header -->
                                <!-- form start -->
                                <?= form_open_multipart('pegawai/add'); ?>
                                <form action="<?= base_url('pegawai/add'); ?>" method="post"role="form">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nip">NIP</label>
                                                    <input type="text" class="form-control" name="nip_pegawai" id="nip_pegawai" placeholder="NIP" required>
                                                    <?= form_error('nip_pegawai', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama">Nama Pegawai</label>
                                                    <input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai" placeholder="Nama Pegawai" required>
                                                    <?= form_error('nama_pegawai', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="tempat_lahir">Tempat Lahir</label>
                                                            <input type="text" class="form-control" name="tmpt_lahir_pegawai" id="tmpt_lahir_pegawai" placeholder="Tempat Lahir" required>
                                                            <?= form_error('tmpt_lahir_pegawai', '<small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                                            <input type="text" class="form-control datepicker" name="tgl_lahir_pegawai" id="tgl_lahir_pegawai" placeholder="Tanggal Lahir" required>
                                                            <?= form_error('tgl_lahir_pegawai', '<small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                                            <select name="jns_kelamin_pegawai" id="jns_kelamin_pegawai" class="form-control" required>
                                                                <option selected disabled>Jenis Kelamin</option>
                                                                <option value="L">Laki-Laki</option>
                                                                <option value="P">Perempuan</option>
                                                            </select>
                                                            <?= form_error('jns_kelamin_pegawai', '<small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="status_pernikahan">Status Pernikahan</label>
                                                            <select name="status_pernikahan_pegawai" id="status_pernikahan_pegawai" class="form-control" required>
                                                                <option selected disabled>Status Pernikahan</option>
                                                                <option value="Menikah">Menikah</option>
                                                                <option value="Lajang">Lajang</option>
                                                            </select>
                                                            <?= form_error('status_pernikahan_pegawai', '<small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="no_handphone">No. Handphone</label>
                                                    <input type="text" class="form-control" name="no_hp_pegawai" id="no_hp_pegawai" placeholder="No. Handphone" required> 
                                                    <?= form_error('no_hp_pegawai', '<small class="text-danger">', '</small>'); ?>
                                                </div>  
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="jabatan">Jabatan</label>
                                                    <select name="jabatan_pegawai" id="jabatan_pegawai" class="form-control" required>
                                                        <option selected disabled>Jabatan</option>
                                                        <?php foreach($jabatan as $jbtn) : ?>
                                                        <option value="<?= $jbtn['id_jabatan'] ?>"><?= $jbtn['nama_jabatan']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <?= form_error('jabatan_pegawai', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" name="email_pegawai" id="email_pegawai" placeholder="Email" required>
                                                    <?= form_error('email_pegawai', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="tanggal_masuk">Tanggal Masuk</label>
                                                            <input type="text" class="form-control datepicker" name="tgl_masuk_pegawai" id="tgl_masuk_pegawai" placeholder="Tanggal Masuk" required>
                                                            <?= form_error('tgl_masuk_pegawai', '<small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="status">Status</label>
                                                            <select name="status_pegawai" id="status_pegawai" class="form-control" required>
                                                                <option selected disabled>Status</option>
                                                                <option value="Aktif">Aktif</option>
                                                                <option value="Tidak Aktif">Tidak Aktif</option>
                                                            </select>
                                                            <?= form_error('status_pegawai', '<small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="agama">Agama</label>
                                                            <select name="agama_pegawai" id="agama_pegawai" class="form-control" required>
                                                                <option selected disabled>Agama</option>
                                                                <option value="Islam">Islam</option>
                                                                <option value="Kristen Protestan">Kristen Protestan</option>
                                                                <option value="Kristen Katolik">Kristen Katolik</option>
                                                                <option value="Hindu">Hindu</option>
                                                                <option value="Buddha">Buddha</option>
                                                                <option value="Konghucu">Konghucu</option>
                                                            </select>
                                                            <?= form_error('agama_pegawai', '<small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                    </div>  
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                                                            <select name="pend_terakhir_pegawai" id="pend_terakhir_pegawai" class="form-control" required>
                                                                <option selected disabled>Pendidikan Terakhir</option>
                                                                <option value="S2">S2</option>
                                                                <option value="S1">S1</option>
                                                                <option value="D3">D3</option>
                                                                <option value="SMA">SMA</option>
                                                            </select>
                                                            <?= form_error('pend_terakhir_pegawai', '<small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                    </div>  
                                                </div>
                                                <div class="form-group">
                                                    <label for="foto">Foto</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="foto_pegawai" id="foto_pegawai" accept=".jpg,.jpeg,.png" required>
                                                        <label class="custom-file-label" for="customFile">Upload Foto</label>
                                                        <?= form_error('foto_pegawai', '<small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="alamat">Alamat</label>
                                                    <textarea class="form-control" name="alamat_pegawai" id="alamat_pegawai" rows="3" required></textarea>
                                                    <?= form_error('alamat_pegawai', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col d-flex justify-content-start">
                                                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
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

      