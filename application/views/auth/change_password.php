<div class="content-wrapper">
   <div class="content-header">
      <div class="container">
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

   <!-- Main content -->
   <section class="content">
      <div class="container-fluid ">
         <div class="card card-outline card-primary">
            <div class="row justify-content-center">
               <div class="col-md-10">      
                  <form class="form-horizontal" method="post" action="<?= base_url('auth/change_password'); ?>">
                     <input type="hidden" name="username" value="<?= $this->session->userdata('username') ?>">
                     <div class="card-body">
                        <div class="form-group row">
                           <label for="password-baru" class="col-sm-3 col-form-label">Password Baru</label>
                           <div class="col-sm-9">
                              <input type="password" class="form-control" name="password" placeholder="Password Baru">
                              <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="conf-password-baru" class="col-sm-3 col-form-label">Konfirmasi Password Baru</label>
                           <div class="col-sm-9">
                              <input type="password" class="form-control" name="confirm_password" placeholder="Konfirmasi Password Baru">
                              <?= form_error('confirm_password', '<small class="text-danger">', '</small>'); ?>
                           </div>
                        </div>
                        <div class="form-group row">
                           <div class="offset-sm-3 col-sm-9">
                              <button type="submit" class="btn btn-primary"><i class="fa fa-key mr-2"></i>Ubah Password</button>
                              <a href="javascript:history.go(-1)" class="btn btn-secondary"><i class="ion-arrow-return-left mr-2"></i>Batal</a>
                              <?= $this->session->flashdata('message'); ?>
                           </div>
                        </div>
                     </div>
                     <!-- <div class="card-footer">
                           <button type="submit" class="btn btn-info">Sign in</button>
                           <button type="submit" class="btn btn-default float-right">Cancel</button>
                     </div> -->
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>