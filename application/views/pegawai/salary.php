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
                    <div class="message" data-title="Data Gaji" data-message="<?= $this->session->flashdata('message'); ?>"></div>
                    <a href="<?= base_url('pegawai/add_salary'); ?>" class="btn btn-success">Tambah Data Gaji</a>
                    <div class="row mt-3">
                        <div class="col-md-9">
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Pegawai</th>
                                                <th>Gaji Pokok</th>
                                                <th>Tunjangan</th>
                                                <th>Lain-Lain</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no = 1;
                                                foreach($list_gaji as $item) : 
                                            ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $item['nama_pegawai']; ?></td>
                                                <td><?= $item['gaji_pokok']; ?></td>
                                                <td><?= $item['tunjangan']; ?></td>
                                                <td><?= $item['lain_lain']; ?></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <!-- <a href="#" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View"><i class="fas fa-eye"></i></a> -->
                                                        <a href="<?= base_url('pegawai/edit_salary/') . $item['id_gaji']; ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
                                                        <a href="<?= base_url('pegawai/delete_salary/') . $item['id_gaji']; ?>" class="btn btn-danger delete-salary" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></a>
                                                    </div>
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
                        </div>
                    </div>
                    
                    
                </div>
                <!--/. container-fluid -->
            </section>
            <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      