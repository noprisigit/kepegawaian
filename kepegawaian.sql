-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Mar 2020 pada 13.57
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kepegawaian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `status_absensi` varchar(50) NOT NULL,
  `keterangan_absensi` varchar(100) NOT NULL,
  `tgl_absensi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `id_pegawai`, `status_absensi`, `keterangan_absensi`, `tgl_absensi`) VALUES
(2, 3, 'Izin', 'Dinas keluar kota', '2020-03-02 16:44:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `administrasi_pengajaran`
--

CREATE TABLE `administrasi_pengajaran` (
  `id` int(11) NOT NULL,
  `program_tahunan` int(1) NOT NULL,
  `program_semester` int(1) NOT NULL,
  `rpp` int(1) NOT NULL,
  `program_ulangan` int(1) NOT NULL,
  `program_analisis_penilaian` int(1) NOT NULL,
  `program_remedial` int(1) NOT NULL,
  `buku_penunjang_lain` int(1) NOT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` int(11) NOT NULL,
  `gaji_pokok` int(11) NOT NULL,
  `tunjangan` int(11) NOT NULL,
  `lain_lain` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Kepala Sekolah'),
(2, 'Wakil Kepala Sekolah'),
(3, 'Guru Kelas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karakter`
--

CREATE TABLE `karakter` (
  `id` int(11) NOT NULL,
  `integritas` int(1) NOT NULL,
  `client_personality` int(1) NOT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kedisiplinan`
--

CREATE TABLE `kedisiplinan` (
  `id` int(11) NOT NULL,
  `kehadiran` int(1) NOT NULL,
  `rapat_mingguan` int(1) NOT NULL,
  `taklim_mingguan` int(1) NOT NULL,
  `rapat_yayasan` int(1) NOT NULL,
  `penyambutan_siswa` int(1) NOT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_dokumen`
--

CREATE TABLE `master_dokumen` (
  `id_dokumen` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nip_pegawai` varchar(20) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `tmpt_lahir_pegawai` varchar(75) NOT NULL,
  `tgl_lahir_pegawai` date NOT NULL,
  `jns_kelamin_pegawai` enum('L','P') NOT NULL,
  `status_pernikahan_pegawai` enum('Menikah','Lajang','DLL') NOT NULL,
  `agama_pegawai` enum('Islam','Kristen Protestan','Kristen Katolik','Hindu','Buddha','Konghucu') NOT NULL,
  `alamat_pegawai` varchar(250) NOT NULL,
  `id_jabatan_pegawai` int(11) NOT NULL,
  `email_pegawai` varchar(100) NOT NULL,
  `no_hp_pegawai` varchar(20) NOT NULL,
  `tgl_masuk_pegawai` date NOT NULL,
  `status_pegawai` enum('Aktif','Tidak Aktif') NOT NULL,
  `pend_terakhir_pegawai` enum('S2','S1','D3','SMA','DLL') NOT NULL,
  `foto_pegawai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `id_user`, `nip_pegawai`, `nama_pegawai`, `tmpt_lahir_pegawai`, `tgl_lahir_pegawai`, `jns_kelamin_pegawai`, `status_pernikahan_pegawai`, `agama_pegawai`, `alamat_pegawai`, `id_jabatan_pegawai`, `email_pegawai`, `no_hp_pegawai`, `tgl_masuk_pegawai`, `status_pegawai`, `pend_terakhir_pegawai`, `foto_pegawai`) VALUES
(3, 4, '1903051911980001', 'Sigit Prasetyo N', 'Semarang', '2020-03-18', 'L', 'Menikah', 'Islam', 'Jalan Panjang', 1, 'noprisigit@gmail.com', '0896-6200-6624', '2020-03-19', 'Aktif', 'S2', 'dummy-profile-image-png-2.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personality`
--

CREATE TABLE `personality` (
  `id` int(11) NOT NULL,
  `inisiatif` int(1) NOT NULL,
  `tanggung_jawab` int(1) NOT NULL,
  `ketelitian_kerapihan` int(1) NOT NULL,
  `kerja_sama` int(1) NOT NULL,
  `penyelesaian_tugas` int(1) NOT NULL,
  `kemampuan_mengajar` int(1) NOT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `status_access` enum('admin','pegawai') NOT NULL,
  `status_account` int(1) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `status_access`, `status_account`, `date_created`, `date_updated`) VALUES
(1, 'Antony Balda', 'admin@gmail.com', '$2y$10$R6s4txyEZF74ORWFiVI5F.FGbNwU8sxCuE6ear1vfVqDkJYNifQKK', 'admin', 1, '0000-00-00 00:00:00', '2020-03-19 11:58:26'),
(4, 'Sigit Prasetyo Noprianto', 'noprisigit@gmail.com', '$2y$10$CrdcJCA9TbVPKz2.wThau.1BvguV04AeJtleHAYZc/mBuUlRnAAX6', 'pegawai', 1, '2020-03-19 12:38:12', '2020-03-19 12:38:12');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indeks untuk tabel `administrasi_pengajaran`
--
ALTER TABLE `administrasi_pengajaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `administrasi_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`),
  ADD KEY `gaji_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `karakter`
--
ALTER TABLE `karakter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `karakter_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `kedisiplinan`
--
ALTER TABLE `kedisiplinan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kedisplinan_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `master_dokumen`
--
ALTER TABLE `master_dokumen`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `pegawai_jabatan` (`id_jabatan_pegawai`);

--
-- Indeks untuk tabel `personality`
--
ALTER TABLE `personality`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personality_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `administrasi_pengajaran`
--
ALTER TABLE `administrasi_pengajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `karakter`
--
ALTER TABLE `karakter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kedisiplinan`
--
ALTER TABLE `kedisiplinan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_dokumen`
--
ALTER TABLE `master_dokumen`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `personality`
--
ALTER TABLE `personality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `administrasi_pengajaran`
--
ALTER TABLE `administrasi_pengajaran`
  ADD CONSTRAINT `administrasi_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD CONSTRAINT `gaji_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

--
-- Ketidakleluasaan untuk tabel `karakter`
--
ALTER TABLE `karakter`
  ADD CONSTRAINT `karakter_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `kedisiplinan`
--
ALTER TABLE `kedisiplinan`
  ADD CONSTRAINT `kedisplinan_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_jabatan` FOREIGN KEY (`id_jabatan_pegawai`) REFERENCES `jabatan` (`id_jabatan`);

--
-- Ketidakleluasaan untuk tabel `personality`
--
ALTER TABLE `personality`
  ADD CONSTRAINT `personality_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
