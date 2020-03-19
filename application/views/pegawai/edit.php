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
                                <?= form_open_multipart('pegawai/edit'); ?>
                                    <input type="hidden" name="id_pegawai" id="id_pegawai" value="<?= $pegawai['id_pegawai']; ?>">
                                    <div class="card-body">
                                        <img src="<?= base_url(); ?>assets/dist/img/profile/<?= $pegawai['foto_pegawai']; ?>" width="150px" height="150px" alt="Foto Pegawai" class="img-thumbnail">

                                        <div class="row mt-2">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="foto">Foto</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="foto_pegawai" id="foto_pegawai" accept=".jpg,.jpeg,.png">
                                                        <label class="custom-file-label" for="customFile">Upload Foto</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nip">NIP</label>
                                                    <input type="text" class="form-control" name="nip_pegawai" id="nip_pegawai" value="<?= $pegawai['nip_pegawai']; ?>">
                                                    <?= form_error('nip_pegawai', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama">Nama Pegawai</label>
                                                    <input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai" value="<?= $pegawai['nama_pegawai']; ?>">
                                                    <?= form_error('nama_pegawai', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="tempat_lahir">Tempat Lahir</label>
                                                            <input type="text" class="form-control" name="tmpt_lahir_pegawai" id="tmpt_lahir_pegawai" value="<?= $pegawai['tmpt_lahir_pegawai']; ?>">
                                                            <?= form_error('tmpt_lahir_pegawai', '<small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                                            <input type="text" class="form-control datepicker" name="tgl_lahir_pegawai" id="tgl_lahir_pegawai" value="<?= $pegawai['tgl_lahir_pegawai']; ?>">
                                                            <?= form_error('tgl_lahir_pegawai', '<small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                                            <select name="jns_kelamin_pegawai" id="edt_jns_kelamin_pegawai" value="<?= $pegawai['jns_kelamin_pegawai']; ?>" class="form-control">
                                                                <option disabled>Jenis Kelamin</option>
                                                            </select>
                                                            <?= form_error('jns_kelamin_pegawai', '<small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="status_pernikahan">Status Pernikahan</label>
                                                            <select name="status_pernikahan_pegawai" id="edt_status_pernikahan_pegawai" value="<?= $pegawai['status_pernikahan_pegawai'] ?>" class="form-control">
                                                                <option disabled>Status Pernikahan</option>
                                                            </select>
                                                            <?= form_error('status_pernikahan_pegawai', '<small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="no_handphone">No. Handphone</label>
                                                    <input type="text" class="form-control" name="no_hp_pegawai" id="no_hp_pegawai" value="<?= $pegawai['no_hp_pegawai']; ?>"> 
                                                    <?= form_error('no_hp_pegawai', '<small class="text-danger">', '</small>'); ?>
                                                </div>  
                                                <div class="form-group">
                                                    <label for="jabatan">Jabatan</label>
                                                    <select name="jabatan_pegawai" id="jabatan_pegawai" class="form-control">
                                                        <option selected disabled>Jabatan</option>
                                                        <?php 
                                                            foreach($jabatan as $jbtn) : 
                                                                if ($jbtn['id_jabatan'] == $pegawai['id_jabatan_pegawai']) :
                                                        ?>
                                                                <option value="<?= $jbtn['id_jabatan'] ?>" selected><?= $jbtn['nama_jabatan']; ?></option>
                                                            <?php else : ?>
                                                                <option value="<?= $jbtn['id_jabatan'] ?>"><?= $jbtn['nama_jabatan']; ?></option>
                                                        <?php
                                                                endif; 
                                                            endforeach; 
                                                        ?>
                                                    </select>
                                                    <?= form_error('jabatan_pegawai', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" name="email_pegawai" id="email_pegawai" value="<?= $pegawai['email_pegawai']; ?>">
                                                    <?= form_error('email_pegawai', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="tanggal_masuk">Tanggal Masuk</label>
                                                            <input type="text" class="form-control datepicker" name="tgl_masuk_pegawai" id="tgl_masuk_pegawai" value="<?= $pegawai['tgl_masuk_pegawai']; ?>">
                                                            <?= form_error('tgl_masuk_pegawai', '<small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="status">Status</label>
                                                            <select name="status_pegawai" id="edt_status_pegawai" class="form-control" value="<?= $pegawai['status_pegawai']; ?>">
                                                                <option disabled>Status</option>
                                                            </select>
                                                            <?= form_error('status_pegawai', '<small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="agama">Agama</label>
                                                            <select name="agama_pegawai" id="edt_agama_pegawai" class="form-control" value="<?= $pegawai['agama_pegawai']; ?>">
                                                                
                                                            </select>
                                                            <?= form_error('agama_pegawai', '<small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                    </div>  
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                                                            <select name="pend_terakhir_pegawai" id="edt_pend_terakhir_pegawai" class="form-control" value="<?= $pegawai['pend_terakhir_pegawai']; ?>">
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
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="alamat">Alamat</label>
                                                    <textarea class="form-control" name="alamat_pegawai" id="alamat_pegawai" rows="3"><?= $pegawai['alamat_pegawai']; ?></textarea>
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

      