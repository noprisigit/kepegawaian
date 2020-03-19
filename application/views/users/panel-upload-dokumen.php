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
                    <div class="message" data-title="Absensi Pegawai" data-message="<?= $this->session->flashdata('message'); ?>"></div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <?= form_open_multipart('users/upload'); ?>
                                        <div class="form-group">
                                            <label for="customFile">Select File</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="file" required>
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                            <?= form_error('file', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Keterangan File</label>
                                            <input type="text" class="form-control" name="keterangan_file" placeholder="Keterangan">
                                            <?= form_error('keterangan_file', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!--/. container-fluid -->
            </section>
            <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      