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
                    <a href="<?= base_url('export/export-pdf'); ?>" class="btn btn-primary">Export to PDF</a>
                    <a href="" class="btn btn-success">Export to Excel</a>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="message" data-title="Data Pegawai" data-message="<?= $this->session->flashdata('message'); ?>"></div>
                            <div class="card">
                                <!-- <div class="card-header">
                                    <h3 class="card-title">DataTable with default features</h3>
                                </div> -->
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="data-pegawai" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIP</th>
                                                <th>Nama</th>
                                                <th>TTL</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Email</th>
                                                <th>No Handphone</th>
                                                <th>Tanggal Masuk</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            <?php 
                                                foreach($list_pegawai as $pegawai) : 

                                                $tgl_lahir_pegawai = date_create($pegawai['tgl_lahir_pegawai']);
                                                $tgl_lahir_pegawai = date_format($tgl_lahir_pegawai, 'd/m/Y');

                                                $tgl_masuk_pegawai = date_create($pegawai['tgl_masuk_pegawai']);
                                                $tgl_masuk_pegawai = date_format($tgl_masuk_pegawai, 'd/m/Y');

                                            ?>
                                            <tr>
                                                <td class="text-center"><?= $no; ?></td>
                                                <td><?= $pegawai['nip_pegawai']; ?></td>
                                                <td><?= $pegawai['nama_pegawai']; ?></td>
                                                <td><?= $pegawai['tmpt_lahir_pegawai']; ?>, <?= $tgl_lahir_pegawai; ?></td>
                                                <?php if($pegawai['jns_kelamin_pegawai'] == 'L') : ?>
                                                    <td class="text-center">Laki-Laki</td>
                                                <?php else : ?>
                                                    <td class="text-center">Perempuan</td>
                                                <?php endif; ?>
                                                <td><?= $pegawai['email_pegawai']; ?></td>
                                                <td><?= $pegawai['no_hp_pegawai']; ?></td>
                                                <td class="text-center"><?= $tgl_masuk_pegawai; ?></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <!-- <a href="#" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View"><i class="fas fa-eye"></i></a> -->
                                                        <a href="<?= base_url('pegawai/add_penilaian/'.$pegawai['id_pegawai']); ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Penilaian"><i class="fas fa-clipboard-list"></i></a>
                                                        <a href="<?= base_url('pegawai/edit/'.$pegawai['id_pegawai']); ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
                                                        <a href="<?= base_url('pegawai/delete/') . $pegawai['id_pegawai']; ?>" class="btn btn-danger delete-pegawai" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $no++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>NIP</th>
                                                <th>Nama</th>
                                                <th>TTL</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Email</th>
                                                <th>No Handphone</th>
                                                <th>Tanggal Masuk</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
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

      