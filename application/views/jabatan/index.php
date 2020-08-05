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
      <div class="container">
         <div class="message" data-title="Data Jabatan" data-message="<?= $this->session->flashdata('message'); ?>"></div>
         <button class="btn btn-success" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus-square mr-2"></i>Tambah Jabatan</button>
         <button class="btn btn-primary float-right" data-toggle="modal" data-target="#modalTambahDataJabatan"><i class="fas fa-plus-square mr-2"></i>Tambah Data Jabatan</button>
         <div class="row mt-3">
            <div class="col-md-4">
               <div class="card card-primary card-outline">
                  <div class="card-body p-0">
                     <table class="table table-striped">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Nama Jabatan</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                              $no = 1;
                              foreach ($list_jabatan as $jabatan) :
                           ?>
                           <tr>
                              <td><?= $no; ?></td>
                              <td><?= $jabatan['nama_jabatan'] ?></td>
                              <td>
                                 <a href="#" class="badge badge-info edit-jabatan" data-toggle="modal" data-target="#modal-edit" data-id="<?= $jabatan['id_jabatan']; ?>" data-nama="<?= $jabatan['nama_jabatan']; ?>">Edit</a>
                                 <a href="<?= base_url('jabatan/delete/') . $jabatan['id_jabatan']; ?>" class="badge badge-danger delete-jabatan">Hapus</a>
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
            <div class="col-md-8">
               <div class="card card-primary card-outline">
                  <div class="card-body">
                     <table class="table table-bordered">
                        <thead class="bg-info">
                           <tr>
                              <th class="text-center">#</th>
                              <th class="text-center">Nama Pegawai</th>
                              <th class="text-center">Jabatan</th>
                              <th class="text-center">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php if (empty($list_pegawai)) : ?>
                              <tr>
                                 <td colspan="4" class="text-bold text-center">Data belum ada</td>
                              </tr>
                           <?php else : ?>
                              <?php
                                 $no = 1;
                                 foreach ($list_pegawai as $pegawai) : 
                              ?>
                              <tr>
                                 <td class="text-center"><?= $no; ?></td>
                                 <td><?= $pegawai['nama_pegawai']; ?></td>
                                 <td><?= $pegawai['nama_jabatan'] === NULL ? '<span class="text-danger">Data belum ada</span>' : $pegawai['nama_jabatan']; ?></td>
                                 <td class="text-center">
                                    <button class="btn btn-info btnDetailMasterJabatan" data-nip="<?= $pegawai['nip_pegawai'] ?>" data-nama="<?= $pegawai['nama_pegawai'] ?>" data-jabatan="<?= $pegawai['nama_jabatan']; ?>" data-nomor_sk="<?= $pegawai['nomor_sk'] ?>" data-tanggal_sk="<?= $pegawai['tanggal_sk'] ?>" data-foto="<?= $pegawai['foto_pegawai'] ?>" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fas fa-eye"></i></button>
                                    <!-- <a href="" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-trash-alt"></i></a> -->
                                    <button class="btn btn-warning text-white btnEditMasterJabatan" data-toggle="tooltip" data-placement="top" title="Perbaharui" data-id="<?= $pegawai['id_pegawai'] ?>" data-nip="<?= $pegawai['nip_pegawai'] ?>" data-nama="<?= $pegawai['nama_pegawai'] ?>" data-jabatan="<?= $pegawai['id_jabatan'] ?>"><i class="fas fa-pencil-alt"></i></button>
                                 </td>
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

         <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title">Tambah Jabatan</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <form action="<?= base_url('jabatan/add'); ?>" method="post">
                           <div class="form-group">
                              <input type="text" class="form-control" name="nama_jabatan" id="nama_jabatan" placeholder="Nama Jabatan" required> 
                           </div>
                     
                  </div>
                  <div class="modal-footer justify-content-between">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Save changes</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>

         <div class="modal fade" id="modal-edit">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title">Edit Jabatan</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <form action="<?= base_url('jabatan/edit'); ?>" method="post">
                        <input type="hidden" name="id_jabatan" class="id_jabatan">
                        <div class="form-group">
                           <input type="text" class="form-control nama_jabatan" name="nama_jabatan" id="edt_nama_jabatan" required> 
                        </div>
                     
                  </div>
                  <div class="modal-footer justify-content-between">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Update</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>

         <div class="modal fade" id="modalTambahDataJabatan">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title">Master Data Jabatan</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <form class="form-horizontal" id="formTambahDataJabatan" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                           <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Pegawai</label>
                              <div class="col-sm-9">
                                 <select class="form-control select2bs4" name="nama_pegawai" id="nama_pegawai">
                                    <option selected disabled>...</option>
                                    <?php foreach ($pegawais as $pegawai) : ?>
                                       <option value="<?= $pegawai['id_pegawai']; ?>"><?= $pegawai['nama_pegawai'] ?> - <?= $pegawai['nip_pegawai'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Jabatan</label>
                              <div class="col-sm-9">
                                 <select class="form-control select2bs4" name="jabatan_pegawai" id="jabatan_pegawai">
                                    <option selected disabled>...</option>
                                    <?php foreach ($list_jabatan as $jabatan) : ?>
                                       <option value="<?= $jabatan['id_jabatan']; ?>"><?= $jabatan['nama_jabatan'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Nomor dan Tanggal SK</label>
                              <div class="col-sm-5">
                                 <input type="text" class="form-control" name="nomor_sk" id="nomor_sk" placeholder="Nomor SK">
                              </div>
                              <div class="col-sm-4">
                                 <input type="date" class="form-control" name="tanggal_sk" id="tanggal_sk">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">File SK Jabatan</label>
                              <div class="col-sm-9">
                                 <input type="file" class="form-control" name="file_sk" id="file_sk" accept=".pdf, .doc, .zip">
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="offset-sm-3 col-sm-9">
                                 <button type="submit" class="btn btn-info"><i class="fas fa-save mr-2"></i>Simpan</button>
                                 <button type="button" class="btn btn-default float-right" data-dismiss="modal"><i class="fas fa-undo-alt mr-2"></i>Batal</button>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
                  <!-- <div class="modal-footer justify-content-between">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Save changes</button>
                     </form>
                  </div> -->
               </div>
            </div>
         </div>
         <div class="modal fade" id="modalEditDataJabatan">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title">Master Data Jabatan</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <form class="form-horizontal" id="formMasterDataJabatan" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_pegawai" id="edt_id_pegawai">
                        <div class="card-body">
                           <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Pegawai</label>
                              <div class="col-sm-9">
                                 <input type="text" name="nama_pegawai" id="edt_nama_pegawai" class="form-control" placeholder="Nama Pegawai" readonly>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Jabatan</label>
                              <div class="col-sm-9">
                                 <select class="form-control select2bs4" name="jabatan_pegawai" id="edt_jabatan_pegawai">
                                    <option selected disabled>...</option>
                                    <?php foreach ($list_jabatan as $jabatan) : ?>
                                       <option value="<?= $jabatan['id_jabatan']; ?>"><?= $jabatan['nama_jabatan'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Nomor dan Tanggal SK</label>
                              <div class="col-sm-5">
                                 <input type="text" class="form-control" name="nomor_sk" id="edt_nomor_sk" placeholder="Nomor SK">
                              </div>
                              <div class="col-sm-4">
                                 <input type="date" class="form-control" name="tanggal_sk" id="edt_tanggal_sk">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">File SK Jabatan</label>
                              <div class="col-sm-9">
                                 <input type="file" class="form-control" name="file_sk" id="edt_file_sk" accept=".pdf, .doc, .zip">
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="offset-sm-3 col-sm-9">
                                 <button type="submit" class="btn btn-info"><i class="fas fa-save mr-2"></i>Simpan</button>
                                 <button type="button" class="btn btn-default float-right" data-dismiss="modal"><i class="fas fa-undo-alt mr-2"></i>Batal</button>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
                  <!-- <div class="modal-footer justify-content-between">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Save changes</button>
                     </form>
                  </div> -->
               </div>
            </div>
         </div>
         <div class="modal fade" id="modalDetailMasterJabatan">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title">Detail Master Data Jabatan</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <div class="row">
                        <div class="col-md-4">
                           <img class="img-thumbnail img-fluid d-flex mx-auto" width="200" id="det-foto" alt="Foto Pegawai">
                        </div>
                        <div class="col-md-8">
                           <table class="table">
                              <tr>
                                 <td class="text-bold" width="30%">NIP</td>
                                 <td id="det_nip">1290389323</td>
                              </tr>
                              <tr>
                                 <td class="text-bold">Nama</td>
                                 <td id="det_nama">1290389323</td>
                              </tr>
                              <tr>
                                 <td class="text-bold">Jabatan</td>
                                 <td id="det_jabatan">1290389323</td>
                              </tr>
                              <tr>
                                 <td class="text-bold">Nomor SK</td>
                                 <td id="det_nomor_sk">1290389323</td>
                              </tr>
                              <tr>
                                 <td class="text-bold">Tanggal SK</td>
                                 <td id="det_tanggal_sk">1290389323</td>
                              </tr>
                           </table>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer justify-content-end">
                     <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-undo-alt mr-2"></i>Tutup</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>      