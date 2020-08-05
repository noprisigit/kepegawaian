<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-6">
                  <h1 class="m-0 text-dark"><?= $subtitle; ?></h1>
               </div>
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
                     <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalTambahUser"><i class="fas fa-plus-square mr-2"></i>Tambah User</button>
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
                              foreach ($users as $user) : 
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
                                       <button class="btn btn-info btnEditUser" data-id="<?= $user['id'] ?>" data-username="<?= $user['username'] ?>" data-toggle="tooltip" data-placement="top" title="Perbaharui"><i class="fas fa-pencil-alt"></i></button>
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

<div class="modal fade" id="modalTambahUser">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Tambah User</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form class="form-horizontal" id="formTambahDataUser" method="post">
               <div class="card-body">
                  <div class="form-group row">
                     <label for="password-baru" class="col-sm-4 col-form-label">Username</label>
                     <div class="col-sm-8">
                        <input type="text" class="form-control" name="username" id="add_username" placeholder="Username">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="password-baru" class="col-sm-4 col-form-label">Nama</label>
                     <div class="col-sm-8">
                        <input type="text" class="form-control" name="nama" id="add_nama" placeholder="Nama">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="conf-password-baru" class="col-sm-4 col-form-label">Password Baru</label>
                     <div class="col-sm-8">
                        <input type="password" class="form-control" name="password" id="add_password" placeholder="Password">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="conf-password-baru" class="col-sm-4 col-form-label">Konfirmasi Password Baru</label>
                     <div class="col-sm-8">
                        <input type="password" class="form-control" name="confirm_password" id="add_confirm_password" placeholder="Konfirmasi Password">
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="offset-sm-4 col-sm-8">
                        <button type="submit" class="btn btn-info"><i class="fas fa-save mr-2"></i>Simpan</button>
                        <button class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-undo-alt mr-2"></i>Batal</a>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="modal-edit">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Perbaharui Data User</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form class="form-horizontal" id="formUpdateDataUser" method="post">
               <div class="card-body">
                  <input type="hidden" name="id_user" id="id_user">
                  <div class="form-group row">
                     <label for="password-baru" class="col-sm-4 col-form-label">Username</label>
                     <div class="col-sm-8">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username Baru" readonly>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="password-baru" class="col-sm-4 col-form-label">Nama</label>
                     <div class="col-sm-8">
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="conf-password-baru" class="col-sm-4 col-form-label">Password Baru</label>
                     <div class="col-sm-8">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password Baru">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="conf-password-baru" class="col-sm-4 col-form-label">Konfirmasi Password Baru</label>
                     <div class="col-sm-8">
                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Konfirmasi Password Baru">
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="offset-sm-4 col-sm-8">
                        <button type="submit" class="btn btn-info"><i class="fas fa-edit mr-2"></i>Perbaharui</button>
                        <button class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-undo-alt mr-2"></i>Batal</a>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

    