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

if(message) {
    Swal.fire({
        title: title,
        text: 'Berhasil ' + message,
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

// Edit Jenis Kelamin Pegawai
const jnskelamin = $('#edt_jns_kelamin_pegawai').attr('value');
if (jnskelamin == 'L') {
    $('#edt_jns_kelamin_pegawai').append('<option selected value="' + jnskelamin + '">Laki-Laki</option>');
    $('#edt_jns_kelamin_pegawai').append('<option value="P">Perempuan</option>');
} else {
    $('#edt_jns_kelamin_pegawai').append('<option value="L">Laki-Laki</option>');
    $('#edt_jns_kelamin_pegawai').append('<option value="' + jnskelamin + '" selected>Perempuan</option>');
}

const statuspernikahan = $('#edt_status_pernikahan_pegawai').attr('value');
if (statuspernikahan == 'Menikah') {
    $('#edt_status_pernikahan_pegawai').append('<option selected value="' + statuspernikahan + '">' + statuspernikahan + '</option>');
    $('#edt_status_pernikahan_pegawai').append('<option value="Lajang">Lajang</option>');
} else {
    $('#edt_status_pernikahan_pegawai').append('<option selected value="Menikah">Menikah</option>');
    $('#edt_status_pernikahan_pegawai').append('<option value="' + statuspernikahan + '">' + statuspernikahan + '</option>');
}

const status = $('#edt_status_pegawai').attr('value');
if (status == 'Aktif') {
    $('#edt_status_pegawai').append('<option value="' + status + '" selected>' + status + '</option>');
    $('#edt_status_pegawai').append('<option value="Tidak Aktif">Tidak Aktif</option>');
} else {
    $('#edt_status_pegawai').append('<option value="Aktif">Aktif</option>');   
    $('#edt_status_pegawai').append('<option value="Tidak Aktif" selected>Tidak Aktif</option>');
}

const agama = $('#edt_agama_pegawai').attr('value');
switch (agama) {
    case "Islam" :
        $('#edt_agama_pegawai').append('<option value="Islam" selected>Islam</option>');
        $('#edt_agama_pegawai').append('<option value="Kristen Protestan">Kristen Protestan</option>');
        $('#edt_agama_pegawai').append('<option value="Kristen Katolik">Kristen Katolik</option>');
        $('#edt_agama_pegawai').append('<option value="Hindu">Hindu</option>');
        $('#edt_agama_pegawai').append('<option value="Buddha">Buddha</option>');
        $('#edt_agama_pegawai').append('<option value="Konghucu">Kunghucu</option>');
        break;
    case "Kristen Protestan" :
        $('#edt_agama_pegawai').append('<option value="Islam">Islam</option>');
        $('#edt_agama_pegawai').append('<option value="Kristen Protestan" selected>Kristen Protestan</option>');
        $('#edt_agama_pegawai').append('<option value="Kristen Katolik">Kristen Katolik</option>');
        $('#edt_agama_pegawai').append('<option value="Hindu">Hindu</option>');
        $('#edt_agama_pegawai').append('<option value="Buddha">Buddha</option>');
        $('#edt_agama_pegawai').append('<option value="Konghucu">Kunghucu</option>');
        break;
    case "Kristen Katolik" :
        $('#edt_agama_pegawai').append('<option value="Islam">Islam</option>');
        $('#edt_agama_pegawai').append('<option value="Kristen Protestan">Kristen Protestan</option>');
        $('#edt_agama_pegawai').append('<option value="Kristen Katolik" selected>Kristen Katolik</option>');
        $('#edt_agama_pegawai').append('<option value="Hindu">Hindu</option>');
        $('#edt_agama_pegawai').append('<option value="Buddha">Buddha</option>');
        $('#edt_agama_pegawai').append('<option value="Konghucu">Kunghucu</option>');
        break;
    case "Hindu" :
        $('#edt_agama_pegawai').append('<option value="Islam">Islam</option>');
        $('#edt_agama_pegawai').append('<option value="Kristen Protestan">Kristen Protestan</option>');
        $('#edt_agama_pegawai').append('<option value="Kristen Katolik">Kristen Katolik</option>');
        $('#edt_agama_pegawai').append('<option value="Hindu" selected>Hindu</option>');
        $('#edt_agama_pegawai').append('<option value="Buddha">Buddha</option>');
        $('#edt_agama_pegawai').append('<option value="Konghucu">Kunghucu</option>');
        break;
    case "Buddha" :
        $('#edt_agama_pegawai').append('<option value="Islam">Islam</option>');
        $('#edt_agama_pegawai').append('<option value="Kristen Protestan">Kristen Protestan</option>');
        $('#edt_agama_pegawai').append('<option value="Kristen Katolik">Kristen Katolik</option>');
        $('#edt_agama_pegawai').append('<option value="Hindu">Hindu</option>');
        $('#edt_agama_pegawai').append('<option value="Buddha" selected>Buddha</option>');
        $('#edt_agama_pegawai').append('<option value="Konghucu">Kunghucu</option>');
        break ;
    case "Konghucu" :
        $('#edt_agama_pegawai').append('<option value="Islam">Islam</option>');
        $('#edt_agama_pegawai').append('<option value="Kristen Protestan">Kristen Protestan</option>');
        $('#edt_agama_pegawai').append('<option value="Kristen Katolik">Kristen Katolik</option>');
        $('#edt_agama_pegawai').append('<option value="Hindu">Hindu</option>');
        $('#edt_agama_pegawai').append('<option value="Buddha">Buddha</option>');
        $('#edt_agama_pegawai').append('<option value="Konghucu" selected>Kunghucu</option>');
        break;
    default :
        $('#edt_agama_pegawai').append('<option selected disabled>Agama</option');
        break;
}

const pendterakhir = $('#edt_pend_terakhir_pegawai').attr('value');
switch (pendterakhir) {
    case "S2" :
        $('#edt_pend_terakhir_pegawai').append('<option value="S2" selected>S2</option>');
        $('#edt_pend_terakhir_pegawai').append('<option value="S1">S1</option>');
        $('#edt_pend_terakhir_pegawai').append('<option value="D3">D3</option>');
        $('#edt_pend_terakhir_pegawai').append('<option value="SMA">SMA</option>');
        break;
    case "S1" :
        $('#edt_pend_terakhir_pegawai').append('<option value="S2">S2</option>');
        $('#edt_pend_terakhir_pegawai').append('<option value="S1" selected>S1</option>');
        $('#edt_pend_terakhir_pegawai').append('<option value="D3">D3</option>');
        $('#edt_pend_terakhir_pegawai').append('<option value="SMA">SMA</option>');
        break;
    case "D3" :
        $('#edt_pend_terakhir_pegawai').append('<option value="S2">S2</option>');
        $('#edt_pend_terakhir_pegawai').append('<option value="S1">S1</option>');
        $('#edt_pend_terakhir_pegawai').append('<option value="D3" selected>D3</option>');
        $('#edt_pend_terakhir_pegawai').append('<option value="SMA">SMA</option>');
        break;
    case "SMA" :
        $('#edt_pend_terakhir_pegawai').append('<option value="S2">S2</option>');
        $('#edt_pend_terakhir_pegawai').append('<option value="S1">S1</option>');
        $('#edt_pend_terakhir_pegawai').append('<option value="D3">D3</option>');
        $('#edt_pend_terakhir_pegawai').append('<option value="SMA" selected>SMA</option>');
        break;
    default :
        $('#edt_pend_terakhir_pegawai').append('<option selected disables>Pendidikan Terakhir</option>');
        break;
}

$('.delete-jabatan').on('click', function(e) {
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

$('.edit-jabatan').on('click', function() {
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