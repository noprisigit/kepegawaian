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
            <div class="col-md-4">
               <div class="card card-primary card-outline">
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
            <div class="col-md-8">
               <div class="card card-primary card-outline">
                  <div class="card-header">
                     <h4 class="card-title"><i class="fas fa-clipboard-list"></i> Rekapitulasi Absensi</h4>
                  </div>
                  <div class="card-body">
                     <table class="table table-bordered">
                        <thead>   
                           <tr>
                              <th class="text-center" style="vertical-align: middle">#</th>
                              <th class="text-center" style="vertical-align: middle">Tanggal Absensi</th>
                              <th class="text-center" style="vertical-align: middle">Status</th>
                              <th class="text-center" style="vertical-align: middle">Keterangan</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php if (empty($data_absensi)) : ?>
                              <tr>
                                 <td class="text-center" colspan="4">Data belum ada</td>
                              </tr>
                           <?php else : ?>
                              <?php
                                 $no = 1; 
                                 foreach ($data_absensi as $dp) : 
                                    $new_date = date_create($dp['tgl_absensi']);
                              ?>
                              <tr>
                                 <td class="text-center"><?= $no; ?></td>
                                 <td><?= date_format($new_date, "d-m-Y H:i:s") ?></td>
                                 <td><?= $dp['status_absensi']; ?></td>
                                 <td><?= $dp['keterangan_absensi']; ?></td>
                              </tr>
                              <?php 
                                 $no++;
                                 endforeach; 
                              ?>
                           <?php endif; ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>      