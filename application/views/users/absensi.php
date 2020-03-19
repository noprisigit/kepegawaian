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
                    <?php if ($absensi['total'] == 1) : ?>
                    <div class="alert alert-info">
                        <h5><i class="icon fas fa-info"></i> Pemberitahuan!</h5>
                        Anda telah melakukan absensi hari ini.
                    </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <form action="<?= base_url('users/absensi'); ?>" method="post">
                                        <div class="form-group">
                                            <label for="">Tanggal</label>
                                            <?php date_default_timezone_set('asia/jakarta') ?>
                                            <input type="text" class="form-control" value="<?= date('d M Y'); ?>" readonly placeholder="Tanggal">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <select name="status_absensi" id="" class="form-control">
                                                <option selected disabled>- Status -</option>
                                                <option value="Hadir">Hadir</option>
                                                <option value="Izin">Izin</option>
                                                <option value="Sakit">Sakit</option>
                                            </select>
                                            <?= form_error('status_absensi', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Keterangan</label>
                                            <input type="text" class="form-control" name="keterangan_absensi" placeholder="Keterangan">
                                            <?= form_error('keterangan_absensi', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <?php if ($absensi['total'] < 1) : ?>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <?php endif; ?>
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

      