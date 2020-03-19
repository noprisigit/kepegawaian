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
                <a href="<?= base_url('users/upload'); ?>" class="btn btn-info">Upload Dokumen</a>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="message" data-title="Dokumen" data-message="<?= $this->session->flashdata('message'); ?>"></div>
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
                                            <th class="text-center">Nama File</th>
                                            <th class="text-center">Keterangan</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            foreach ($dokumen as $item) :
                                        ?>
                                        <tr>
                                            <td class="text-center"><?= $no; ?></td>
                                            <td><?= $item['nama_file']; ?></td>
                                            <td class="text-center"><?= $item['keterangan']; ?></td>
                                            <td class="text-center">
                                                
                                                    <a href="<?= base_url('users/download?file=') . $item['nama_file']; ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Download"><i class="fas fa-download"></i></a>
                                                <a href="<?= base_url('users/update-dokumen/') . $item['id_dokumen']; ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Update Dokumen"><i class="fas fa-upload"></i></a>
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

<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('users/edit-user'); ?>" method="post">
                    <input type="hidden" name="id_user">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Status Akses</label>
                        <select name="status_akses" class="form-control"></select>
                    </div>
                    <div class="form-group">
                        <label for="">Status Akun</label>
                        <select name="status_akun" class="form-control"></select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

    