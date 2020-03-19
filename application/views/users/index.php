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
                        <div class="col-md-12">
                            <div class="message" data-title="Data Pegawai" data-message="<?= $this->session->flashdata('message'); ?>"></div>
                            <div class="card">
                                <!-- <div class="card-header">
                                    <h3 class="card-title">DataTable with default features</h3>
                                </div> -->
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="data-users" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Nama</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Status Akses</th>
                                                <th class="text-center">Status Akun</th>
                                                <th class="text-center">Date Created</th>
                                                <th class="text-center">Date Updated</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no = 1;
                                                foreach ($users as $item) :
                                            ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $item['nama']; ?></td>
                                                <td><?= $item['email']; ?></td>
                                                <td class="text-center"><?= $item['status_access']; ?></td>
                                                <?php if ($item['status_account'] == 0) : ?>
                                                    <td class="text-center text-danger">Not Active</td>
                                                <?php else : ?>
                                                    <td class="text-center text-success">Active</td>
                                                <?php endif; ?>
                                                <td class="text-center"><?= $item['date_created']; ?></td>
                                                <td class="text-center"><?= $item['date_updated']; ?></td>
                                                <td>
                                                    <?php if ($item['status_account'] == 0) : ?>
                                                        <a href="<?= base_url('users/verify/') . $item['email']; ?>" class="btn btn-primary btn-sm">Verifikasi</a>
                                                    <?php else : ?>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-info"><i class="fas fa-align-left"></i></button>
                                                            <button type="button" class="btn btn-info"><i class="fas fa-align-center"></i></button>
                                                            <button type="button" class="btn btn-info"><i class="fas fa-align-right"></i></button>
                                                        </div>
                                                    <?php endif ?>
                                                </td>
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
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
                <!--/. container-fluid -->
            </section>
            <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      