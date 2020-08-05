   <div class="content-wrapper">
      <div class="content-header">
         <div class="container-fluid">
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
               </div>
         </div>
      </div>

      <section class="content">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-12">
                  <div class="message-baru" data-message="<?= $this->session->flashdata('message'); ?>"></div>
                  <div class="card card-primary card-outline">
                     <div class="card-body">
                        <table id="data-users-pegawai" class="table table-bordered">
                           <thead class="bg-info">
                              <tr>
                                 <th class="text-center">#</th>
                                 <th class="text-center">Nama</th>
                                 <th class="text-center">Username</th>
                                 <th class="text-center">Status Akses</th>
                                 <th class="text-center">Status Akun</th>
                                 <th class="text-center">Tanggal Diperbaharui</th>
                                 <th class="text-center">Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                                 $no = 1; 
                                 foreach ($users_pegawai as $user) : 
                                    $tgl_ubah = date_create($user['date_updated']);
                              ?>
                                 <tr>
                                    <td class="text-center"><?= $no ?></td>
                                    <td><?= $user['nama'] ?></td>
                                    <td><?= $user['username'] ?></td>
                                    <td class="text-center"><?= $user['status_access'] ?></td>
                                    <td class="text-center"><?= $user['status_account'] == 0 ? '<span class="badge badge-danger">tidak aktif</span>' : '<span class="badge badge-success">aktif</span>' ?></td>
                                    <td class="text-center"><?= date_format($tgl_ubah, "d-m-Y H:i:s") ?></td>
                                    <td class="text-center">
                                       <?php if ($user['status_account'] == 0) : ?>
                                          <a href="<?= base_url('users/verify/') . $user['id']; ?>" class="btn btn-success btn-sm"><i class="fas fa-check-square mr-2"></i>Aktifkan</a>
                                       <?php else : ?>
                                          <a href="<?= base_url('auth/reset-password/') . $user['id'] ?>" class="btn btn-warning btnResetPassword" data-username="<?= $user['username']; ?>" data-toggle="tooltip" data-placement="top" title="Reset Password"><i class="fas fa-sync-alt"></i></a>
                                          <a href="<?= base_url('users/block-user/') . $user['id']; ?>" data-username="<?= $user['username']; ?>" class="btn btn-danger btnBlockUser" data-toggle="tooltip" data-placement="top" title="Matikan Akun"><i class="fas fa-ban"></i></a>
                                       <?php endif; ?>
                                    </td>
                                 </tr>
                              <?php 
                                 $no++; 
                                 endforeach; 
                              ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>

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
   </div>
</div>

    