$(document).ready(function() {

	// Date Picker Format
	$('.datepicker').datepicker({
		changeYear: true,
		changeMonth: true,
		yearRange: '1945:2020',
	});
	
	// Input Label for Upload
	$('.custom-file-input').on('change', function () {
		let filename = $(this).val().split('\\').pop();
		$(this).next('.custom-file-label').addClass('selected').html(filename);
	});
	
	// Sweet Alert2
	const message = $('.message').data('message');
	const title = $('.message').data('title');
	
	if (message) {
		Swal.fire({
			title: title,
			text: 'Berhasil ' + message,
			type: 'success'
		})
	}

	const message_baru = $('.message-baru').data('message');
	
	if (message_baru) {
		Swal.fire({
			title: "Good Job!",
			html: message_baru,
			type: 'success'
		})
	}
	
	// Delete Pegawai
	$('.delete-pegawai').on('click', function (e) {
		e.preventDefault();
		const href = $(this).attr('href');
	
		Swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if (result.value) {
				document.location.href = href;
			}
		});
	});
		
	
	$('.delete-jabatan').on('click', function (e) {
		e.preventDefault();
		const href = $(this).attr('href');
	
		Swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if (result.value) {
				document.location.href = href;
			}
		});
	});
	
	$('.edit-jabatan').on('click', function () {
		const id = $(this).data('id');
		const nama = $(this).data('nama');
	
		$('.modal-body .id_jabatan').attr('value', id);
		$('.modal-body .nama_jabatan').attr('value', nama);
	});
	
	$('.delete-salary').on('click', function (e) {
		e.preventDefault();
		const href = $(this).attr('href');
	
		Swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if (result.value) {
				document.location.href = href;
			}
		});
	});
	
	$('.btn-edit-user').on('click', function () {
		var status_akses = $(this).data('status_akses');
		var status_akun = $(this).data('status_akun');
	
		$('.modal-body input[name="id_user"]').attr('value', $(this).data('id_user'));
		$('.modal-body input[name="nama"]').attr('value', $(this).data('nama'));
		$('.modal-body input[name="email"]').attr('value', $(this).data('email'));
	
		if (status_akses == 'admin') {
			$('.modal-body select[name="status_akses"]').append('<option value="admin" selected>admin</option>');
			$('.modal-body select[name="status_akses"]').append('<option value="pegawai">pegawai</option>');
		} else {
			$('.modal-body select[name="status_akses"]').append('<option value="admin">admin</option>');
			$('.modal-body select[name="status_akses"]').append('<option value="pegawai" selected>pegawai</option>');
		}
	
		if (status_akun == 0) {
			$('.modal-body select[name="status_akun"]').append('<option value="0" selected>Tidak Aktif</option>');
			$('.modal-body select[name="status_akun"]').append('<option value="1">Aktif</option>');
		} else {
			$('.modal-body select[name="status_akun"]').append('<option value="0">Tidak Aktif</option>');
			$('.modal-body select[name="status_akun"]').append('<option value="1" selected>Aktif</option>');
		}
	});
	
	$('select[name="status_absensi"]').on('change', function () {
		var value = $(this).val();
	
		if (value == 'Hadir') {
			$('input[name="keterangan_absensi"]').attr('value', 'Hadir');
			$('input[name="keterangan_absensi"]').attr('readonly', 'true');
		} else {
			$('input[name="keterangan_absensi"]').removeAttr('value');
			$('input[name="keterangan_absensi"]').removeAttr('readonly');
		}
	});
	
	$('.btn-delete-dokumen').on('click', function (e) {
		e.preventDefault();
		const href = $(this).attr('href');
	
		Swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if (result.value) {
				document.location.href = href;
			}
		});
	});
	
	$('#filter').on('change', function () {
		var value = $(this).val();
	
		$('#base_tanggal').css('display', 'none');
		$('#base_nama').css('display', 'none');
		$('#card_rekap_tanggal').css('display', 'none');
		$('#card_rekap_nama').css('display', 'none');
		$('#tgl').val('');
		$('#bln').val('');
		$('#thn').val('');
	
		if (value == 1) {
			$('#base_tanggal').css('display', 'block');
		} else if (value == 2) {
			$('#base_nama').css('display', 'block');
		}
	});

	$('#formUpdateDataDiri').submit(function(e) {
		const tempat_lahir = $('#tmpt_lahir_pegawai').val();
		const tgl_lahir = $('#tgl_lahir_pegawai').val();
		const jns_kelamin = $('#jns_kelamin_pegawai').val();
		const status_nikah = $('#status_pernikahan_pegawai').val();
		const no_hp = $('#no_hp_pegawai').val();
		const email = $('#email_pegawai').val();
		const agama = $('#agama_pegawai').val();
		const pend_terakhir = $('#pend_terakhir_pegawai').val();
		const alamat = $('#alamat_pegawai').val();

		if (tempat_lahir === null || tempat_lahir === "") {
			e.preventDefault();
			toastr.error('Tempat lahir harus diisi');
			return false;
		}
		if (tgl_lahir === null || tgl_lahir === "") {
			e.preventDefault();
			toastr.error('Tanggal lahir harus dipilih');
			return false;
		}
		if (jns_kelamin === null || jns_kelamin === "") {
			e.preventDefault();
			toastr.error('Jenis kelamin harus dipilih');
			return false;
		}
		if (status_nikah === null || status_nikah === "") {
			e.preventDefault();
			toastr.error('Status pernikahan harus dipilih');
			return false;
		}
		if (no_hp === null || no_hp === "") {
			e.preventDefault();
			toastr.error('No handphone harus diisi');
			return false;
		}
		if (email === null || email === "") {
			e.preventDefault();
			toastr.error('Email harus diisi');
			return false;
		}
		if (agama === null || agama === "") {
			e.preventDefault();
			toastr.error('Agama harus dipilih');
			return false;
		}
		if (pend_terakhir === null || pend_terakhir === "") {
			e.preventDefault();
			toastr.error('Pendidikan terakhir harus diisi');
			return false;
		}
		if (alamat === null || alamat === "") {
			e.preventDefault();
			toastr.error('Alamat harus diisi');
			return false;
		}

		$.ajax({
			url: 'edit-biodata',
			type: 'post',
			data: new FormData(this),
			dataType: 'json',
			contentType: false,
			cache: false,
			processData: false,
			success: function(res) {
				if (res.status === false) {
					e.prevendDefault();
					toastr.error(res.msg);
				} else {
					Swal.fire(
						'Good job!',
						'Data diri telah diperbaharui',
						'success'
					).then((result) => {
						if (result.value) {
							window.location.href = "data-diri";
						}
					});
				}
			}
		});
		return false;
	});

	$('#formMasterDataJabatan').submit(function(e) {
		const pegawai = $('#edt_nama_pegawai').val();
		const jabatan = $('#edt_jabatan_pegawai').val();
		const nomor_sk = $('#edt_nomor_sk').val();
		const tgl_sk = $('#edt_tgl_sk').val();
		const file_sk = $('#edt_file_sk').val();

		if (pegawai === "" || pegawai === null) {
			e.preventDefault();
			toastr.error('Kolom pegawai harus diisi');
			return false;
		}
		if (jabatan === "" || jabatan === null) {
			e.preventDefault();
			toastr.error('Kolom jabatan harus diisi');
			return false;
		}
		if (nomor_sk === "") {
			e.preventDefault();
			toastr.error('Kolom nomor SK harus diisi');
			return false;
		}
		if (tgl_sk === "") {
			e.preventDefault();
			toastr.error('Kolom tanggal SK harus diisi');
			return false;
		}
		if (file_sk === "") {
			e.preventDefault();
			toastr.error('Kolom file SK jabatan harus diisi');
			return false;
		}

		$.ajax({
			url: 'jabatan/store-jabatan-pegawai',
			type: 'post',
			data: new FormData(this),
			dataType: 'json',
			contentType: false,
			cache: false,
			processData: false,
			success: function(res) {
				if (res.status === false) {
					e.prevendDefault();
					toastr.error(res.msg);
				} else {
					$('#modalEditDataJabatan').modal('hide');
					Swal.fire(
						'Good job!',
						'Jabatan pegawai telah diperbaharui',
						'success'
					).then((result) => {
						if (result.value) {
							window.location.href = "jabatan";
						}
					});
				}
			}
		});
		return false;
	});

	$('#formTambahDataJabatan').submit(function(e) {
		const pegawai = $('#nama_pegawai').val();
		const jabatan = $('#jabatan_pegawai').val();
		const nomor_sk = $('#nomor_sk').val();
		const tgl_sk = $('#tgl_sk').val();
		const file_sk = $('#file_sk').val();

		if (pegawai === "" || pegawai === null) {
			e.preventDefault();
			toastr.error('Kolom pegawai harus diisi');
			return false;
		}
		if (jabatan === "" || jabatan === null) {
			e.preventDefault();
			toastr.error('Kolom jabatan harus diisi');
			return false;
		}
		if (nomor_sk === "") {
			e.preventDefault();
			toastr.error('Kolom nomor SK harus diisi');
			return false;
		}
		if (tgl_sk === "") {
			e.preventDefault();
			toastr.error('Kolom tanggal SK harus diisi');
			return false;
		}
		if (file_sk === "") {
			e.preventDefault();
			toastr.error('Kolom file SK jabatan harus diisi');
			return false;
		}

		$.ajax({
			url: 'jabatan/tambah-jabatan-pegawai',
			type: 'post',
			data: new FormData(this),
			dataType: 'json',
			contentType: false,
			cache: false,
			processData: false,
			success: function(res) {
				if (res.status === false) {
					e.prevendDefault();
					toastr.error(res.msg);
				} else {
					$('#modalTambahDataJabatan').modal('hide');
					Swal.fire(
						'Good job!',
						'Jabatan pegawai telah diperbaharui',
						'success'
					).then((result) => {
						if (result.value) {
							window.location.href = "jabatan";
						}
					});
				}
			}
		});
		return false;
	});

	$('.btnDetailMasterJabatan').on('click', function() {
		const nip = $(this).data('nip');
		const nama = $(this).data('nama');
		const jabatan = $(this).data('jabatan');
		const nomor_sk = $(this).data('nomor_sk');
		const tanggal_sk = $(this).data('tanggal_sk');
		const foto = $(this).data('foto');

		let isi_jabatan;
		let isi_nomor_sk;
		let isi_tanggal_sk;

		if (jabatan === null || jabatan === "") {
			isi_jabatan = '<span class="text-danger">Data belum ada</span>';
		} else {
			isi_jabatan = jabatan
		}
		if (nomor_sk === null || nomor_sk === "") {
			isi_nomor_sk = '<span class="text-danger">Data belum ada</span>';
		} else {
			isi_nomor_sk = nomor_sk
		}
		if (tanggal_sk === null || tanggal_sk === "") {
			isi_tanggal_sk = '<span class="text-danger">Data belum ada</span>';
		} else {
			const tmp = tanggal_sk.split("-")
			isi_tanggal_sk = tmp[2] + "-" + tmp[1] + "-" + tmp[0]
		}

		$('#modalDetailMasterJabatan').modal('show');
		$('#modalDetailMasterJabatan #det-foto').attr('src', 'assets/dist/img/profile/' + foto);
		$('#modalDetailMasterJabatan #det_nip').html(nip);
		$('#modalDetailMasterJabatan #det_nama').html(nama);
		$('#modalDetailMasterJabatan #det_jabatan').html(isi_jabatan);
		$('#modalDetailMasterJabatan #det_nomor_sk').html(isi_nomor_sk);
		$('#modalDetailMasterJabatan #det_tanggal_sk').html(isi_tanggal_sk);
	});

	$('.btnEditMasterJabatan').on('click', function() {
		const id = $(this).data('id');
		const nip = $(this).data('nip');
		const nama = $(this).data('nama');
		const jabatan = $(this).data('jabatan');
		// alert(jabatan);

		$('#modalEditDataJabatan').modal('show');
		$('#modalEditDataJabatan #edt_id_pegawai').val(id);
		$('#modalEditDataJabatan #edt_nama_pegawai').val(nama + " - " + nip);
		$.ajax({
			url: "jabatan/get-list-jabatan",
			type: "get",
			data: { id_pegawai: id },
			dataType: "json",
			success: function(res) {
				let list_jabatan = res.data;
				$('#edt_jabatan_pegawai').empty();
				$('#edt_jabatan_pegawai').append('<option selected disabled>...</option>');

				for (let i = 0; i < res.data.length; i++) {
					if (res.data_jabatan.id_jabatan === res.data[i].id_jabatan) {
						$('#edt_jabatan_pegawai').append(`<option value="`+ res.data[i].id_jabatan +`" selected>`+ res.data[i].nama_jabatan +`</option>`);
					} else {
						$('#edt_jabatan_pegawai').append(`<option value="`+ res.data[i].id_jabatan +`">`+ res.data[i].nama_jabatan +`</option>`);
					}
				}
			}
		});
		return false;
	});

	$('.btnResetPassword').on('click', function(e) {
		e.preventDefault();
		const href = $(this).attr('href');
		const username = $(this).data('username');

		Swal.fire({
			title: 'Are you sure?',
			html: "Password <strong><u>" + username + "</u></strong> akan diubah menjadi <strong><u>123</u></strong>",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, reset!'
		}).then((result) => {
			if (result.value) {
				document.location.href = href;
			}
		});
	});

	$('.btnBlockUser').on('click', function(e) {
		e.preventDefault();
		const href = $(this).attr('href');
		const username = $(this).data('username');

		Swal.fire({
			title: 'Are you sure?',
			html: "Username <strong><u>" + username + "</u></strong> akan <strong><u>dinonaktifkan</u></strong>",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, do it!'
		}).then((result) => {
			if (result.value) {
				document.location.href = href;
			}
		});
	});

	$('.btnEditUser').on('click', function() {
		$('#modal-edit').modal('show');

		$('#modal-edit #id_user').val($(this).data('id'));
		$('#modal-edit #username').val($(this).data('username'));
	});

	$('#formUpdateDataUser').submit(function(e) {
		const id = $('#id_user').val();
		const nama = $('#nama').val();
		const username = $('#username').val();
		const pass = $('#password').val();
		const conf_pass = $('#confirm_password').val();

		if (nama === "") {
			e.preventDefault();
			toastr.error('Kolom nama harus diisi');
			return false;
		}
		if (username === "") {
			e.preventDefault();
			toastr.error('Kolom username harus diisi');
			return false;
		}
		if (pass === "") {
			e.preventDefault();
			toastr.error('Kolom password harus diisi');
			return false;
		}
		if (conf_pass === "") {
			e.preventDefault();
			toastr.error('Kolom konfirmasi password harus diisi');
			return false;
		}

		if (pass !== conf_pass) {
			e.preventDefault();
			toastr.error('Password dan konfirmasi password harus sama');
			return false;
		}

		$.ajax({
			url: 'users/edit-user',
			type: 'post',
			data: { id: id, nama: nama, pass: pass },
			dataType: 'json',
			success: function(res) {
				if (res.status) {
					$('#modal-edit').hide();
					Swal.fire(
						'Good job!',
						'Data user telah diperbaharui',
						'success'
					).then((result) => {
						if (result.value) {
							window.location.href = "users";
						}
					});
				}
			}
		});
		return false;
	});

	$('#formTambahDataUser').submit(function(e) {
		const nama = $('#add_nama').val();
		const username = $('#add_username').val();
		const pass = $('#add_password').val();
		const conf_pass = $('#add_confirm_password').val();

		if (nama === "") {
			e.preventDefault();
			toastr.error('Kolom nama harus diisi');
			return false;
		}
		if (username === "") {
			e.preventDefault();
			toastr.error('Kolom username harus diisi');
			return false;
		}
		if (pass === "") {
			e.preventDefault();
			toastr.error('Kolom password harus diisi');
			return false;
		}
		if (conf_pass === "") {
			e.preventDefault();
			toastr.error('Kolom konfirmasi password harus diisi');
			return false;
		}

		if (pass !== conf_pass) {
			e.preventDefault();
			toastr.error('Password dan konfirmasi password harus sama');
			return false;
		}

		$.ajax({
			url: 'users/store-user',
			type: 'post',
			data: { username: username, nama: nama, pass: pass },
			dataType: 'json',
			success: function(res) {
				if (res.status) {
					$('#modalTambahUser').hide();
					Swal.fire(
						'Good job!',
						'Data user telah ditambah',
						'success'
					).then((result) => {
						if (result.value) {
							window.location.href = "users";
						}
					});
				}
			}
		});
		return false;
	});

	$('#formUpdateDataPegawai').submit(function(e) {
		const tempat_lahir = $('#tmpt_lahir_pegawai').val();
		const tgl_lahir = $('#tgl_lahir_pegawai').val();
		const jns_kelamin = $('#jns_kelamin_pegawai').val();
		const status_nikah = $('#status_pernikahan_pegawai').val();
		const no_hp = $('#no_hp_pegawai').val();
		const email = $('#email_pegawai').val();
		const agama = $('#agama_pegawai').val();
		const pend_terakhir = $('#pend_terakhir_pegawai').val();
		const alamat = $('#alamat_pegawai').val();

		if (tempat_lahir === null || tempat_lahir === "") {
			e.preventDefault();
			toastr.error('Tempat lahir harus diisi');
			return false;
		}
		if (tgl_lahir === null || tgl_lahir === "") {
			e.preventDefault();
			toastr.error('Tanggal lahir harus dipilih');
			return false;
		}
		if (jns_kelamin === null || jns_kelamin === "") {
			e.preventDefault();
			toastr.error('Jenis kelamin harus dipilih');
			return false;
		}
		if (status_nikah === null || status_nikah === "") {
			e.preventDefault();
			toastr.error('Status pernikahan harus dipilih');
			return false;
		}
		if (no_hp === null || no_hp === "") {
			e.preventDefault();
			toastr.error('No handphone harus diisi');
			return false;
		}
		if (email === null || email === "") {
			e.preventDefault();
			toastr.error('Email harus diisi');
			return false;
		}
		if (agama === null || agama === "") {
			e.preventDefault();
			toastr.error('Agama harus dipilih');
			return false;
		}
		if (pend_terakhir === null || pend_terakhir === "") {
			e.preventDefault();
			toastr.error('Pendidikan terakhir harus diisi');
			return false;
		}
		if (alamat === null || alamat === "") {
			e.preventDefault();
			toastr.error('Alamat harus diisi');
			return false;
		}

		$.ajax({
			url: '../edit-data-pegawai',
			type: 'post',
			data: new FormData(this),
			dataType: 'json',
			contentType: false,
			cache: false,
			processData: false,
			success: function(res) {
				if (res.status === false) {
					e.prevendDefault();
					toastr.error(res.msg);
				} else {
					Swal.fire(
						'Good job!',
						'Data diri telah diperbaharui',
						'success'
					).then((result) => {
						if (result.value) {
							window.location.href = "../../pegawai";
						}
					});
				}
			}
		});
		return false;
	});
});
