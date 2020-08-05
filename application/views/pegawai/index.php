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
         <a href="<?= base_url('export/export-pdf'); ?>" class="btn btn-primary">Export to PDF</a>
         <a href="<?= base_url('export/export-excel'); ?>" class="btn btn-success">Export to Excel</a>
         <div class="row mt-2">
            <div class="col-md-12">
               <div class="message" data-title="Data Pegawai" data-message="<?= $this->session->flashdata('message'); ?>"></div>
               <div class="card card-primary card-outline">
                  <div class="card-body">
                     <table id="data-pegawai" class="table table-bordered table-striped" width="100%">
                        <thead>
                           <tr class="text-center">
                              <th>No</th>
                              <th>Avatar</th>
                              <th>NIP</th>
                              <th>Nama</th>
                              <th>TTL</th>
                              <th>Jenis Kelamin</th>
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
                              <td class="text-center"><img src="<?= base_url('assets/dist/img/profile/') . $pegawai['foto_pegawai'] ?>" class="img-thumbnail" width="98" alt="foto-pegawai"></td>
                              <td><?= $pegawai['nip_pegawai']; ?></td>
                              <td><?= $pegawai['nama_pegawai']; ?></td>
                              <?php if ($pegawai['tmpt_lahir_pegawai'] == "" && $pegawai['tgl_lahir_pegawai'] == "") : ?>
                                 <td class="text-center text-danger">Data belum ada</td>
                              <?php else : ?>
                                 <td><?= $pegawai['tmpt_lahir_pegawai']; ?>, <?= $tgl_lahir_pegawai; ?></td>
                              <?php endif; ?>
                              <?php if ($pegawai['jns_kelamin_pegawai'] == "") : ?>
                                 <td class="text-center text-danger">Data belum ada</td>
                              <?php else : ?>
                                 <?php if($pegawai['jns_kelamin_pegawai'] == 'L') : ?>
                                    <td class="text-center">Laki-Laki</td>
                                 <?php else : ?>
                                    <td class="text-center">Perempuan</td>
                                 <?php endif; ?>
                              <?php endif; ?>
                              <td class="text-center">
                                 <a href="<?= base_url('pegawai/detail-pegawai/') . $pegawai['id_pegawai'] ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fas fa-folder-open"></i></a>
                                 <a href="<?= base_url('pegawai/add_penilaian/'. $pegawai['id_pegawai']); ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Penilaian"><i class="fas fa-clipboard-list"></i></a>
                                 <a href="<?= base_url('pegawai/edit/'.$pegawai['id_pegawai']); ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                 <a href="<?= base_url('pegawai/delete/') . $pegawai['id_pegawai']; ?>" class="btn btn-danger delete-pegawai" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></a>
                              </td>
                           </tr>
                           <?php $no++; ?>
                           <?php endforeach; ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>      