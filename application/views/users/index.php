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
                     <div class="message" data-title="Akun User" data-message="<?= $this->session->flashdata('message'); ?>"></div>
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
                                          <td class="text-center"><?= $no; ?></td>
                                          <td><?= $item['nama']; ?></td>
                                          <td><?= $item['username']; ?></td>
                                          <td class="text-center"><?= $item['status_access']; ?></td>
                                          <?php if ($item['status_account'] == 0) : ?>
                                             <td class="text-center text-danger">Not Active</td>
                                          <?php else : ?>
                                             <td class="text-center text-success">Active</td>
                                          <?php endif; ?>
                                          <td class="text-center"><?= $item['date_created']; ?></td>
                                          <td class="text-center"><?= $item['date_updated']; ?></td>
                                          <td class="text-center">
                                             <?php if ($item['status_account'] == 0) : ?>
                                                   <a href="<?= base_url('users/verify/') . $item['id']; ?>" class="btn btn-primary btn-sm">Verifikasi</a>
                                             <?php else : ?>
                                                   <div class="btn-group">
                                                      <!-- <button type="button" class="btn btn-info"><i class="fas fa-align-left"></i></button> -->
                                                      <span data-toggle="modal" data-target="#modal-edit">
                                                         <button type="button" class="btn btn-info btn-edit-user" data-toggle="tooltip" data-placement="top" title="Edit Account" data-id_user="<?= $item['id']; ?>" data-nama="<?= $item['nama'] ?>" data-email="<?= $item['username'] ?>" data-status_akses="<?= $item['status_access'] ?>" data-status_akun="<?= $item['status_account'] ?>"><i class="fas fa-user-edit"></i></button>
                                                      </span>
                                                      <a href="<?= base_url('users/block-user/') . $item['id']; ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Block Account"><i class="fas fa-ban"></i></a>
                                                      <a href="<?= base_url('users/delete-user/') . $item['id']; ?>" onclick="return confirm('Anda yakin ingin menghapus user ini?')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete Account"><i class="fas fa-trash"></i></a>
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

    