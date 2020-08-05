		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
					<div class="container">
						<div class="row mb-2">
							<div class="col-sm-6">
									<h1 class="m-0 text-dark"><?= $subtitle; ?></h1>
										<!-- <small class="float-left">Text Muted</small> -->
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

			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12 col-sm-12">
							<div class="card card-primary card-outline card-tabs">
								<div class="card-header p-0 pt-1 border-bottom-0">
									<ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true"><i class="fas fa-user text-primary"></i> Profile</a>
										</li>
										<!-- <li class="nav-item">
											<a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">Messages</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">Settings</a>
										</li> -->
									</ul>
								</div>
								<div class="card-body">
									<div class="tab-content" id="custom-tabs-three-tabContent">
										<div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
											<div class="row">
												<div class="col-md-3">
													<img src="<?= base_url(); ?>assets/dist/img/profile/<?= $pegawai['foto_pegawai']; ?>" width="150" alt="Foto Pegawai" class="img-thumbnail d-flex mx-auto img-fluid">
													<button class="btn btn-info text-white text-bold btn-block mt-3"><?= $pegawai['nip_pegawai'] ?></button>
												</div>
												<div class="col-md-9">
													<div class="row">
														<div class="col-md-6">
															<h4>Biodata Pegawai</h4>
														</div>
														<div class="col-md-6">
															<a href="<?= base_url('users/update-data-diri') ?>" class="btn btn-primary float-right"><i class="fas fa-user"></i> Perbaharui Data Diri</a>
														</div>
													</div>
													<table class="table mt-3">
														<tr>
															<td class="text-right text-bold" width="30%">Nama</td>
															<td><?= $pegawai['nama_pegawai'] ?></td>
														</tr>
														<tr>
															<td class="text-right text-bold">NIP</td>
															<td><?= $pegawai['nip_pegawai'] ?></td>
														</tr>
														<tr>
															<td class="text-right text-bold">Jenis Kelamin</td>
															<?php if ($pegawai['jns_kelamin_pegawai'] === NULL) : ?>
																<td class="text-danger">Data belum ada</td>
															<?php else : ?>
																<td><?= $pegawai['jns_kelamin_pegawai'] == "L" ? '<i class="fas fa-mars"></i>' : '<i class="fas fa-venus"></i>' ?> <?= $pegawai['jns_kelamin_pegawai'] == "L" ? "Laki-Laki" : "Perempuan" ?></td>
															<?php endif; ?>
														</tr>
														<tr>
															<td class="text-right text-bold">Tempat Tanggal Lahir</td>
															<?php 
																$b_date = date_create($pegawai['tgl_lahir_pegawai']);
															?>
															<?php if ($pegawai['tmpt_lahir_pegawai'] === NULL) : ?>
																<td class="text-danger">Data belum ada</td>
															<?php else : ?>
																<td><?= $pegawai['tmpt_lahir_pegawai'] ?>, <?= date_format($b_date, "d-m-Y") ?></td>
															<?php endif; ?>
														</tr>
														<?php
															$b_day = new DateTime($pegawai['tgl_lahir_pegawai']);
															$today = new DateTime(date('Y-m-d'));
															$diff = $today->diff($b_day);
														?>
														<tr>
															<td class="text-right text-bold">Umur</td>
															<?php if ($pegawai['tgl_lahir_pegawai'] === NULL) : ?>
																<td class="text-danger">Data belum ada</td>
															<?php else : ?>
																<td><?= $diff->y ?> tahun <?= $diff->m ?> bulan <?= $diff->d ?> hari</td>
															<?php endif; ?>
														</tr>
														<tr>
															<td class="text-right text-bold">Agama</td>
															<?php if ($pegawai['agama_pegawai'] === NULL) : ?>
																<td class="text-danger">Data belum ada</td>
															<?php else : ?>
																<td><?= $pegawai['agama_pegawai'] ?></td>
															<?php endif; ?>
														</tr>
														<tr>
															<td class="text-right text-bold">Status Pernikahan</td>
															<?php if ($pegawai['status_pernikahan_pegawai'] === NULL) : ?>
																<td class="text-danger">Data belum ada</td>
															<?php else : ?>
																<td><?= $pegawai['status_pernikahan_pegawai'] ?></td>
															<?php endif; ?>
														</tr>
														<tr>
															<td class="text-right text-bold">No. Telp</td>
															<?php if ($pegawai['no_hp_pegawai'] === NULL) : ?>
																<td class="text-danger">Data belum ada</td>
															<?php else : ?>
																<td><?= $pegawai['no_hp_pegawai'] ?></td>
															<?php endif; ?>
														</tr>
														<tr>
															<td class="text-right text-bold">Email</td>
															<?php if ($pegawai['email_pegawai'] === NULL) : ?>
																<td class="text-danger">Data belum ada</td>
															<?php else : ?>
																<td><?= $pegawai['email_pegawai'] ?></td>
															<?php endif; ?>
														</tr>
														<tr>
															<td class="text-right text-bold">Alamat</td>
															<?php if ($pegawai['alamat_pegawai'] === NULL) : ?>
																<td class="text-danger">Data belum ada</td>
															<?php else : ?>
																<td><?= $pegawai['alamat_pegawai'] ?></td>
															<?php endif; ?>
														</tr>
														<!-- <tr>
															<td class="text-right text-bold">Status Kepegawaian</td>
															<?php if ($pegawai['status_pernikahan_pegawai'] === NULL) : ?>
																<td class="text-danger">Data belum ada</td>
															<?php else : ?>
																<td><?= $pegawai['status_pernikahan_pegawai'] ?></td>
															<?php endif; ?>
															<td><?= $pegawai['status_pegawai'] ?></td>
														</tr> -->
													</table>
												</div>
											</div>
										</div>
										<div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
											Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer
											vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio
											volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare
											magna.
										</div>
										<div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
											Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique.
											Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse
											platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- <a href="<?= base_url('users/update-data-diri') ?>" class="btn btn-info">Update Data Diri</a>
					<div class="row mt-3">
						<div class="col-md-12">
							<div class="message" data-title="Data Pegawai" data-message="<?= $this->session->flashdata('message'); ?>"></div>
							
							<div class="card card-primary">
								<input type="hidden" name="id_pegawai" id="id_pegawai" value="<?= $pegawai['id_pegawai']; ?>">
								<div class="card-body">
									<img src="<?= base_url(); ?>assets/dist/img/profile/<?= $pegawai['foto_pegawai']; ?>" width="150px" height="150px" alt="Foto Pegawai" class="img-thumbnail">

									<div class="row mt-2">
											<div class="col-md-6">
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
																<input type="text" class="form-control" name="tmpt_lahir_pegawai" id="tmpt_lahir_pegawai" value="<?= $pegawai['tmpt_lahir_pegawai']; ?>" readonly>
															</div>
													</div>
													<div class="col-6">
															<div class="form-group">
																<label for="tanggal_lahir">Tanggal Lahir</label>
																<input type="text" class="form-control" name="tgl_lahir_pegawai" id="tgl_lahir_pegawai" value="<?= $pegawai['tgl_lahir_pegawai']; ?>" readonly>
															</div>
													</div>
												</div>
												<div class="form-group">
													<label for="jenis_kelamin">Jenis Kelamin</label>
													<input type="text" class="form-control" value="<?= ($pegawai['jns_kelamin_pegawai'] == "L") ? 'Laki-Laki' : 'Perempuan'; ?>" readonly>
												</div>
												<div class="form-group">
													<label for="status_pernikahan">Status Pernikahan</label>
													<input type="text" class="form-control" value="<?= $pegawai['status_pernikahan_pegawai']; ?>" readonly>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="no_handphone">No. Handphone</label>
													<input type="text" class="form-control" name="no_hp_pegawai" id="no_hp_pegawai" value="<?= $pegawai['no_hp_pegawai']; ?>" readonly> 
												</div>  
												<div class="form-group">
													<label for="jabatan">Jabatan</label>
													<input type="text" class="form-control" name="no_hp_pegawai" id="no_hp_pegawai" value="<?= $pegawai['nama_jabatan']; ?>" readonly> 
												</div>
												<div class="form-group">
													<label for="email">Email</label>
													<input type="email" class="form-control" name="email_pegawai" id="email_pegawai" value="<?= $pegawai['email_pegawai']; ?>" readonly>
												</div>
												
												<div class="row">
													<div class="col-6">
															<div class="form-group">
																<label for="tanggal_masuk">Tanggal Masuk</label>
																<input type="text" class="form-control" name="tgl_masuk_pegawai" id="tgl_masuk_pegawai" value="<?= $pegawai['tgl_masuk_pegawai']; ?>" readonly>
															</div>
													</div>
													<div class="col-6">
															<div class="form-group">
																<label for="status">Status</label>
																<input type="text" class="form-control" value="<?= $pegawai['status_pegawai']; ?>" readonly>
															</div>
													</div>
												</div>
												<div class="row">
													<div class="col-6">
															<div class="form-group">
																<label for="agama">Agama</label>
																<input type="text" class="form-control" value="<?= $pegawai['agama_pegawai']; ?>" readonly>
															</div>
													</div>  
													<div class="col-6">
															<div class="form-group">
																<label for="pendidikan_terakhir">Pendidikan Terakhir</label>
																<input type="text" class="form-control" value="<?= $pegawai['pend_terakhir_pegawai']; ?>" readonly>
															</div>
													</div>  
												</div>
											</div>
									</div>
									<div class="row">
											<div class="col">
												<div class="form-group">
													<label for="alamat">Alamat</label>
													<textarea class="form-control" name="alamat_pegawai" id="alamat_pegawai" rows="3" readonly><?= $pegawai['alamat_pegawai']; ?></textarea>
												</div>
											</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> -->
			</section>
		</div>