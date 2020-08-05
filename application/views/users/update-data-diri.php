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
         <div class="row">
            <div class="col-md-12">
               <div class="message" data-title="Data Diri" data-message="<?= $this->session->flashdata('message'); ?>"></div>
               
               <div class="card card-primary">
                  <form id="formUpdateDataDiri" method="post" enctype="multipart/form-data">
                     <input type="hidden" name="id_pegawai" id="id_pegawai" value="<?= $pegawai['id_pegawai']; ?>">
                     <div class="card-body">
                        <div class="row mt-2">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="foto">Foto</label>
                                 <input type="file" class="form-control" name="foto_pegawai" id="foto_pegawai" accept=".jpg,.jpeg,.png">
                              </div>
                              <div class="form-group">
                                 <label for="nip">NIP</label>
                                 <input type="text" class="form-control" name="nip_pegawai" id="nip_pegawai" value="<?= $pegawai['nip_pegawai']; ?>" readonly>
                              </div>
                              <div class="form-group">
                                 <label for="nama">Nama Pegawai</label>
                                 <input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai" value="<?= $pegawai['nama_pegawai']; ?>" readonly>
                              </div>
                              <div class="row">
                                 <div class="col-6">
                                    <div class="form-group">
                                       <label for="tempat_lahir">Tempat Lahir</label>
                                       <input type="text" class="form-control" name="tmpt_lahir_pegawai" id="tmpt_lahir_pegawai" value="<?= $pegawai['tmpt_lahir_pegawai']; ?>" placeholder="ex. Jakarta">
                                    </div>
                                 </div>
                                 <div class="col-6">
                                    <div class="form-group">
                                       <label for="tanggal_lahir">Tanggal Lahir</label>
                                       <input type="date" class="form-control" name="tgl_lahir_pegawai" id="tgl_lahir_pegawai" value="<?= $pegawai['tgl_lahir_pegawai']; ?>">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="row">
                                 <div class="col-6">
                                    <div class="form-group">
                                       <label for="jenis_kelamin">Jenis Kelamin</label>
                                       <select name="jns_kelamin_pegawai" id="jns_kelamin_pegawai" class="form-control">
                                          <option selected disabled>Jenis Kelamin</option>
                                          <?php if ($pegawai['jns_kelamin_pegawai'] === NULL) : ?>
                                             <option value="L">Laki-Laki</option>
                                             <option value="P">Perempuan</option>
                                          <?php else : ?>
                                             <?php if ($pegawai['jns_kelamin_pegawai'] === "L") : ?>
                                                <option value="L" selected>Laki-Laki</option>
                                                <option value="P">Perempuan</option>
                                             <?php else : ?>
                                                <option value="L">Laki-Laki</option>
                                                <option value="P" selected>Perempuan</option>
                                             <?php endif; ?>
                                          <?php endif; ?>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-6">
                                    <div class="form-group">
                                       <label for="status_pernikahan">Status Pernikahan</label>
                                       <select name="status_pernikahan_pegawai" id="status_pernikahan_pegawai" class="form-control">
                                          <option selected disabled>Status Pernikahan</option>
                                          <?php if ($pegawai['status_pernikahan_pegawai'] === NULL) : ?>
                                             <option value="Kawin">Kawin</option>
                                             <option value="Belum Kawin">Belum Kawin</option>
                                          <?php else : ?>
                                             <?php if ($pegawai['status_pernikahan_pegawai'] === "Kawin") : ?>
                                                <option value="Kawin" selected>Kawin</option>
                                                <option value="Belum Kawin">Belum Kawin</option>
                                             <?php else : ?>
                                                <option value="Kawin">Kawin</option>
                                                <option value="Belum Kawin" selected>Belum Kawin</option>
                                             <?php endif; ?>
                                          <?php endif; ?>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="no_handphone">No. Handphone</label>
                                 <input type="text" class="form-control" name="no_hp_pegawai" id="no_hp_pegawai" value="<?= $pegawai['no_hp_pegawai']; ?>" placeholder="ex. 0812xxxx"> 
                              </div> 
                              <div class="form-group">
                                 <label for="email">Email</label>
                                 <input type="email" class="form-control" name="email_pegawai" id="email_pegawai" value="<?= $pegawai['email_pegawai']; ?>" placeholder="ex. pegawai@gmail.com">
                              </div>                          
                              <div class="row">
                                 <div class="col-6">
                                    <div class="form-group">
                                       <label for="agama">Agama</label>
                                       <select name="agama_pegawai" id="agama_pegawai" class="form-control">
                                          <option selected disabled>Agama</option>
                                          <?php if ($pegawai['agama_pegawai'] === NULL) : ?>
                                             <option value="Islam">Islam</option>
                                             <option value="Kristen Katolik">Kristen Katolik</option>
                                             <option value="Kristen Protestan">Kristen Protestan</option>
                                             <option value="Hindu">Hindu</option>
                                             <option value="Buddha">Buddha</option>
                                             <option value="Konghucu">Konghucu</option>
                                          <?php else : ?>
                                             <?php if ($pegawai['agama_pegawai'] === "Islam") : ?>
                                                <option value="Islam" selected>Islam</option>
                                                <option value="Kristen Katolik">Kristen Katolik</option>
                                                <option value="Kristen Protestan">Kristen Protestan</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Buddha">Buddha</option>
                                                <option value="Konghucu">Konghucu</option>
                                             <?php elseif ($pegawai['agama_pegawai'] === "Kristen Katolik") : ?>
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen Katolik" selected>Kristen Katolik</option>
                                                <option value="Kristen Protestan">Kristen Protestan</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Buddha">Buddha</option>
                                                <option value="Konghucu">Konghucu</option>
                                             <?php elseif ($pegawai['agama_pegawai'] === "Kristen Protestan") : ?>
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen Katolik">Kristen Katolik</option>
                                                <option value="Kristen Protestan" selected>Kristen Protestan</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Buddha">Buddha</option>
                                                <option value="Konghucu">Konghucu</option>
                                             <?php elseif ($pegawai['agama_pegawai'] === "Hindu") : ?>
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen Katolik">Kristen Katolik</option>
                                                <option value="Kristen Protestan">Kristen Protestan</option>
                                                <option value="Hindu" selected>Hindu</option>
                                                <option value="Buddha">Buddha</option>
                                                <option value="Konghucu">Konghucu</option>
                                             <?php elseif ($pegawai['agama_pegawai'] === "Buddha") : ?>
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen Katolik">Kristen Katolik</option>
                                                <option value="Kristen Protestan">Kristen Protestan</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Buddha" selected>Buddha</option>
                                                <option value="Konghucu">Konghucu</option>
                                             <?php else : ?>
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen Katolik">Kristen Katolik</option>
                                                <option value="Kristen Protestan">Kristen Protestan</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Buddha">Buddha</option>
                                                <option value="Konghucu" selected>Konghucu</option>
                                             <?php endif; ?>
                                          <?php endif; ?>
                                       </select>
                                    </div>
                                 </div>  
                                 <div class="col-6">
                                    <div class="form-group">
                                       <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                                       <select name="pend_terakhir_pegawai" id="pend_terakhir_pegawai" class="form-control">
                                          <option selected disabled>Pendidikan Terakhir</option>
                                          <?php if ($pegawai['pend_terakhir_pegawai'] === NULL) : ?>
                                             <option value="SMA">SMA</option>
                                             <option value="D3">D3</option>
                                             <option value="S1">S1</option>
                                             <option value="S2">S2</option>
                                          <?php else : ?>
                                             <?php if ($pegawai['pend_terakhir_pegawai'] === "SMA") : ?>
                                                <option value="SMA" selected>SMA</option>
                                                <option value="D3">D3</option>
                                                <option value="S1">S1</option>
                                                <option value="S2">S2</option>
                                             <?php elseif ($pegawai['pend_terakhir_pegawai'] === "D3") : ?>
                                                <option value="SMA">SMA</option>
                                                <option value="D3" selected>D3</option>
                                                <option value="S1">S1</option>
                                                <option value="S2">S2</option>
                                             <?php elseif ($pegawai['pend_terakhir_pegawai'] === "S1") : ?>
                                                <option value="SMA">SMA</option>
                                                <option value="D3">D3</option>
                                                <option value="S1" selected>S1</option>
                                                <option value="S2">S2</option>
                                             <?php else : ?>
                                                <option value="SMA">SMA</option>
                                                <option value="D3">D3</option>
                                                <option value="S1">S1</option>
                                                <option value="S2" selected>S2</option>
                                             <?php endif; ?>
                                          <?php endif; ?>
                                       </select>
                                    </div>
                                 </div>  
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col">
                              <div class="form-group">
                                 <label for="alamat">Alamat</label>
                                 <textarea class="form-control" name="alamat_pegawai" id="alamat_pegawai" rows="3" placeholder="ex. Jalan Teuku Umar"><?= $pegawai['alamat_pegawai']; ?></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col d-flex justify-content-end">
                              <a href="javascript:history.go(-1)" class="btn btn-secondary mr-3">Batal</a>
                              <button type="submit" class="btn btn-primary pull-right">Perbaharui</button>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>