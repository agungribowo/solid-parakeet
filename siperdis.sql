-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.25 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table db_spd.tb_gol
CREATE TABLE IF NOT EXISTS `tb_gol` (
  `id_gol` int(11) NOT NULL,
  `kode_gol` int(1) NOT NULL,
  `gol` varchar(5) NOT NULL,
  PRIMARY KEY (`id_gol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_spd.tb_gol: ~14 rows (approximately)
DELETE FROM `tb_gol`;
/*!40000 ALTER TABLE `tb_gol` DISABLE KEYS */;
INSERT INTO `tb_gol` (`id_gol`, `kode_gol`, `gol`) VALUES
	(0, 5, '-'),
	(1, 1, 'I/D'),
	(2, 1, 'I/E'),
	(3, 2, 'II/A'),
	(4, 2, 'II/B'),
	(5, 2, 'II/C'),
	(6, 3, 'III/A'),
	(7, 3, 'III/B'),
	(8, 3, 'III/C'),
	(9, 3, 'III/D'),
	(11, 4, 'IV/A'),
	(12, 4, 'IV/B'),
	(13, 4, 'IV/C'),
	(14, 4, 'IV/D'),
	(15, 4, 'IV/E');
/*!40000 ALTER TABLE `tb_gol` ENABLE KEYS */;

-- Dumping structure for table db_spd.tb_kelengkapan
CREATE TABLE IF NOT EXISTS `tb_kelengkapan` (
  `id_kelengkapan` int(11) NOT NULL,
  `uraian` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kelengkapan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_spd.tb_kelengkapan: ~8 rows (approximately)
DELETE FROM `tb_kelengkapan`;
/*!40000 ALTER TABLE `tb_kelengkapan` DISABLE KEYS */;
INSERT INTO `tb_kelengkapan` (`id_kelengkapan`, `uraian`) VALUES
	(1, 'Surat Pemanggilan / ST dari Dirjen atau Instansi terkait'),
	(2, 'Surat Perintah Tugas dari Kepala'),
	(3, 'Surat Perjalanan Dinas'),
	(4, 'Tiket Pesawat / Bis / Kereta api'),
	(5, 'Boarding Pas'),
	(6, 'Bukti Pembayaran Penginapan / Hotel'),
	(7, 'Laporan Pelaksanaan Tugas'),
	(8, 'Daftar Agenda');
/*!40000 ALTER TABLE `tb_kelengkapan` ENABLE KEYS */;

-- Dumping structure for table db_spd.tb_kwitansi
CREATE TABLE IF NOT EXISTS `tb_kwitansi` (
  `id_kwitansi` int(11) NOT NULL,
  `id_spd` int(11) NOT NULL,
  `id_peg` int(11) NOT NULL,
  `id_satker` int(11) NOT NULL,
  `id_rincian` int(11) NOT NULL,
  `id_user` varchar(50) NOT NULL DEFAULT '',
  `jumlah` double NOT NULL,
  `ta` int(11) NOT NULL,
  `jns_tuj` varchar(16) NOT NULL,
  PRIMARY KEY (`id_kwitansi`),
  KEY `FK_tb_kwitansi_tb_spd` (`id_spd`),
  CONSTRAINT `FK_tb_kwitansi_tb_spd` FOREIGN KEY (`id_spd`) REFERENCES `tb_spd` (`id_spd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_spd.tb_kwitansi: ~0 rows (approximately)
DELETE FROM `tb_kwitansi`;
/*!40000 ALTER TABLE `tb_kwitansi` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_kwitansi` ENABLE KEYS */;

-- Dumping structure for table db_spd.tb_logo
CREATE TABLE IF NOT EXISTS `tb_logo` (
  `id_logo` int(11) NOT NULL,
  `logo1` varchar(255) NOT NULL,
  `logo2` varchar(255) NOT NULL,
  PRIMARY KEY (`id_logo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_spd.tb_logo: ~1 rows (approximately)
DELETE FROM `tb_logo`;
/*!40000 ALTER TABLE `tb_logo` DISABLE KEYS */;
INSERT INTO `tb_logo` (`id_logo`, `logo1`, `logo2`) VALUES
	(1, '20190830-111641-APP.jpg', '20190715-171742-PRINT.jpg');
/*!40000 ALTER TABLE `tb_logo` ENABLE KEYS */;

-- Dumping structure for table db_spd.tb_nominatif
CREATE TABLE IF NOT EXISTS `tb_nominatif` (
  `id_nominatif` int(11) NOT NULL AUTO_INCREMENT,
  `id_spd` int(11) NOT NULL,
  `pegawai` varchar(255) NOT NULL,
  `id_satker` int(11) DEFAULT NULL,
  `id_user` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_nominatif`),
  KEY `FK_tb_nominatif_tb_spd` (`id_spd`),
  CONSTRAINT `FK_tb_nominatif_tb_spd` FOREIGN KEY (`id_spd`) REFERENCES `tb_spd` (`id_spd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=920 DEFAULT CHARSET=latin1;

-- Dumping data for table db_spd.tb_nominatif: ~8 rows (approximately)
DELETE FROM `tb_nominatif`;
/*!40000 ALTER TABLE `tb_nominatif` DISABLE KEYS */;
INSERT INTO `tb_nominatif` (`id_nominatif`, `id_spd`, `pegawai`, `id_satker`, `id_user`) VALUES
	(912, 1, '70', 4, 'keu1'),
	(913, 2, '262', 1, 'kontra1'),
	(914, 3, '338', 2, 'ti1'),
	(915, 4, '399', 3, 'amerop1'),
	(916, 5, '130', 4, 'inspek1'),
	(917, 5, '131', 4, 'inspek1'),
	(918, 6, '140', 4, 'inspek1'),
	(919, 6, '142', 4, 'inspek1');
/*!40000 ALTER TABLE `tb_nominatif` ENABLE KEYS */;

-- Dumping structure for table db_spd.tb_pegawai
CREATE TABLE IF NOT EXISTS `tb_pegawai` (
  `id_peg` int(11) NOT NULL AUTO_INCREMENT,
  `nip_val` varchar(64) NOT NULL,
  `nip` varchar(64) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `pangkat` varchar(64) NOT NULL,
  `gol` int(11) NOT NULL,
  `jab` varchar(64) NOT NULL,
  `satker` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id_peg`)
) ENGINE=InnoDB AUTO_INCREMENT=497 DEFAULT CHARSET=latin1;

-- Dumping data for table db_spd.tb_pegawai: ~494 rows (approximately)
DELETE FROM `tb_pegawai`;
/*!40000 ALTER TABLE `tb_pegawai` DISABLE KEYS */;
INSERT INTO `tb_pegawai` (`id_peg`, `nip_val`, `nip`, `nama`, `pangkat`, `gol`, `jab`, `satker`, `foto`) VALUES
	(3, 'NIP', '11938/P', 'Agus Purwanto', 'Kolonel Laut (T)', 0, 'Kabag Data dan Pelaporan', 4, 'avatar.jpg'),
	(4, 'NIP', '196707141988031001', 'Eddy Purwanto, S.Pd.', 'Penata Tk. I', 9, 'Kasubbag Pelaporan', 4, 'avatar.jpg'),
	(5, 'NIP', '198903182014032001', 'Rizky Nikita Anggraeni, S.A.P.', 'Penata Muda Tk. I', 7, 'Analis Data Intelijen', 4, 'avatar.jpg'),
	(6, 'NIP', '198507262015031002', 'Haris Munandar, S.E.', 'Penata Muda Tk. I', 7, 'Pemeriksa Intelijen                                ', 4, 'avatar.jpg'),
	(7, 'NIP', '198508052018011001', 'Ricki Gushendrio, S.T.', 'Penata Muda', 6, 'Analis Data dan Informasi', 4, 'avatar.jpg'),
	(8, 'NIP', '197903112017010311001', 'Ary Firansyah', 'PTT', 0, 'Staf Biro Perencanaan, Hukum dan Humas', 4, 'avatar.jpg'),
	(9, 'NIP', '198604022017010311068', 'Raimon Andri Ticoalu', 'PTT', 0, 'Staf Biro Perencanaan, Hukum dan Humas', 4, 'avatar.jpg'),
	(10, 'NIP', '12/SP-12/PPK-2/BNPT/01/2019', 'Emely Kurmilawati', '-', 0, 'Konsultan Individu Sinergisitas Bidang PMK', 4, 'avatar.jpg'),
	(11, 'NIP', '09/SP-09/PPK-2/BNPT/01/2019', 'Dani Subagja ', '-', 0, 'Konsultan Individu', 4, 'avatar.jpg'),
	(12, 'NIP', '14/SP-14/PPK-2/BNPT/01/2019', 'Syahied Aryo Laksono', '-', 0, 'Konsultan Individu Sinergisitas Bidang Polhukam', 4, 'avatar.jpg'),
	(13, 'NIP', '15/SP-15/PPK-2/BNPT/01/2019', 'Laily Hikmawati', '-', 0, 'Konsultan Individu Sinergisitas Bidang Kemaritiman', 4, 'avatar.jpg'),
	(14, 'NIP', '16/SP-16/PPK-2/BNPT/01/2019', 'Gandes Rasyida', '-', 0, 'Konsultan Individu Pengadministrasi Sinergisitas Antar K/L', 4, 'avatar.jpg'),
	(15, 'NIP', '17/SP-17/PPK-2/BNPT/01/2019', 'Widi Budjia', '-', 0, 'Konsultan Individu Pengadministrasi Sinergitas Antar K/L', 4, 'avatar.jpg'),
	(16, 'NIP', '18/SP-18/PPK-2/BNPT/01/2019', 'Sarah Tifanny Delizza', '-', 0, 'Konsultan Individu Pengadministrasi Sinergitas Antar K/L', 4, 'avatar.jpg'),
	(17, 'NIP', '19/SP-19/PPK-2/BNPT/01/2019', 'Rizka Egiawidanti', '-', 0, 'Konsultan Individu Pengolah Bahan Informasi dan Publikasi Sinerg', 4, 'avatar.jpg'),
	(18, 'NIP', '20/SP-20/PPK-2/BNPT/01/201', 'Robi Hermawan Suryana', '-', 0, 'Konsultan Individu Pengolah Bahan Informasi dan Publikasi Sinerg', 4, 'avatar.jpg'),
	(19, 'NIP', '21/SP-21/PPK-2/BNPT/01/2019', 'Rizky Abdul Azis', '-', 0, 'Konsultan Individu Pengolah Bahan Informasi dan Publikasi Sinerg', 4, 'avatar.jpg'),
	(20, 'NIP', '22/SP-22/PPK-2/BNPT/01/2019', 'Eko Wibowo', '-', 0, 'Satpam Sinergitas', 4, 'avatar.jpg'),
	(21, 'NIP', '23/SP-23/PPK-2/BNPT/01/2019', 'Anggi Supratama', '-', 0, 'Pramubakti Sinergitas', 4, 'avatar.jpg'),
	(22, 'NIP', '02/JKI-17/PPK IV/04/2019', 'Filza Alyani', '-', 0, '-', 4, 'avatar.jpg'),
	(23, 'NIP', '02/JKI-18/PPK IV/04/2019', 'Wiend Sakti M', '-', 0, '-', 4, 'avatar.jpg'),
	(24, 'NIP', '07/SP-07/PPK-2/BNPT/01/2019', 'M. Yulianto', '-', 0, '-', 4, 'avatar.jpg'),
	(25, 'NIP', '10/SP-10/PPK-2/BNPT/01/2019', 'Dinda Previanti, S.Sos', '-', 0, 'Konsultan Individu Pengelola Media Center dan Kemitraan Media', 4, 'avatar.jpg'),
	(26, 'NIP', '04/SP-04/PPK-2/BNPT/01/2019', 'Heleconia de Hanna Swastika, S.I.P', '-', 0, 'Konsultan Individu Pengelola Media Center dan Kemitraan Media', 4, 'avatar.jpg'),
	(27, 'NIP', '05/SP-05/PPK-2/BNPT/01/2019', 'Dona Putri Metri, S.Hum.', '-', 0, 'Konsultan Individu Pengelola Terjemahan dan Kerja Sama', 4, 'avatar.jpg'),
	(28, 'NIP', '11/SP-11/PPK-2/BNPT/01/2019', 'Wisnu Muswanto, S.E., M.M.', '-', 0, 'Konsultan Individu Analis Kerja Sama', 4, 'avatar.jpg'),
	(29, 'NIP', '08/SP-08/PPK-2/BNPT/01/2019', 'Muhammad Jaelani, S.H.', '-', 0, 'Konsultan Individu Analis Peraturan Perundang-Undangan dan Ranca', 4, 'avatar.jpg'),
	(30, 'NIP', '03/SP-03/PPK-2/BNPT/01/2019', 'Masita Dwi Mandini Manessa', '-', 0, 'Konsultan Individu Analis Peraturan Administrasi', 4, 'avatar.jpg'),
	(31, 'NIP', '3174041008770000', 'Kumpul Trimorejo', '-', 0, 'BKO TNI Sinergitas', 4, 'avatar.jpg'),
	(32, 'NIP', '3174042711750000', 'Prayitno', '-', 0, 'BKO TNI Sinergitas', 4, 'avatar.jpg'),
	(33, 'NIP', '529715', 'TH. Anang Riyadi', '-', 0, 'BKO TNI Sinergitas', 4, 'avatar.jpg'),
	(34, 'NIP', '2112008681090,00', 'Moh. Imam Afandi', '-', 0, 'BKO TNI Sinergitas', 4, 'avatar.jpg'),
	(35, 'NIP', '197606202001122001', 'Pudiastuti Citra Adi, S.H., M.H.', 'Pembina', 0, 'Kabag Hukum dan Hubungan Masyarakat', 4, 'avatar.jpg'),
	(36, 'NIP', '198306162009121001', 'Tatu Aditya, S.H., M.H.', 'Penata Tk.I', 0, 'Kasubbag Hukum', 4, 'avatar.jpg'),
	(37, 'NIP', '198309082014032002', 'Artha Medita, S.Sos.', 'Penata Muda Tk. I', 0, 'Analis Kerjasama', 4, 'avatar.jpg'),
	(38, 'NIP', '198409222015031001', 'Muhammad Resha Aniskurli, S.E.', 'Penata Muda Tk. I', 0, 'Analis Barang dan Jasa                                 ', 4, 'avatar.jpg'),
	(39, 'NIP', '199005012018011001', 'Aditya Wisnu Wardana, S.S.', 'Penata Muda', 0, 'Analis Kerjasama', 4, 'avatar.jpg'),
	(40, 'NIP', '199309022018012001', 'Putri Susilawati, S.I.Kom.', 'Penata Muda', 0, 'Pranata Hubungan Masyarakat', 4, 'avatar.jpg'),
	(41, 'NIP', '199412262018011001', 'Yogie Indra Kurniawan, S.H.', 'Penata Muda', 0, 'Analis Produk Hukum', 4, 'avatar.jpg'),
	(42, 'NIP', '199606032019021001', 'Muhammad Afif Imaduddin', 'Penata Muda', 0, 'Analis Hukum ', 4, 'avatar.jpg'),
	(43, 'NIP', '199404062019021004', 'Ahmadulloh', 'Penata Muda', 0, 'Analis Perencanaa, Evaluasi dan Pelaporan ', 4, 'avatar.jpg'),
	(44, 'NIP', '199603032019022005', 'Yohana Putri Lusita', 'Penata Muda', 0, 'Penyusun Rencana Kehumasan dan Perpustakaan ', 4, 'avatar.jpg'),
	(45, 'NIP', '1995030019021002', 'Gilang Faiz Pangestu', 'Penata Muda', 0, 'Perancang Peraturan Peraturan Perundang-Undang Ahli Pertama ', 4, 'avatar.jpg'),
	(46, 'NIP', '06/SP-06/PPK-2/BNPT/01/2019', 'Salman Akbar Matonang', '-', 0, 'Tenaga Administrasi Hukum dan Hubungan Masyarakat', 4, 'avatar.jpg'),
	(47, 'NIP', '196804281996032001', 'Suniah Setiyawati, S.Kom., M.M.', 'Pembina Tk. I  ', 0, 'Kabag Kepegawaian dan  Organisasi', 4, 'avatar.jpg'),
	(48, 'NIP', '198412182014032001', 'Dewi Anggraini Rubiyanti, S.Hum.', 'Penata Muda Tk. I', 0, 'Kasubbag Kepegawaian', 4, 'avatar.jpg'),
	(49, 'NIP', '197312201999032001', 'Weti Deswiyati, S.Sos., M.Si.', 'Pembina', 0, 'Kasubbag Organisasi dan Tata Laksana', 4, 'avatar.jpg'),
	(50, 'NIP', '196908021995031001', 'Isheri, S.Sos., M.T.', 'Pembina Tk. I  ', 0, 'Analis Kelembagaan', 4, 'avatar.jpg'),
	(51, 'NIP', '199310272019021003', 'Heri Setiawan Suhandi', 'Penata Muda', 0, 'Analis Sumber Daya Aparatur ', 4, 'avatar.jpg'),
	(52, 'NIP', '199707152018121001', 'Maurice Mario Putra Saragih', 'CPNS Pengatur', 0, 'Pengelola Keuangan', 4, 'avatar.jpg'),
	(53, 'NIP', '198706272017010311042', 'Trio Prakarsa', 'PTT', 0, 'Staf Kepegawaian ', 4, 'avatar.jpg'),
	(54, 'NIP', '198609032017010311049', 'Deni', 'PTT', 0, 'Staf Kepegawaian ', 4, 'avatar.jpg'),
	(55, 'NIP', '199101032017010311058', 'Budi Kurniawan', 'PTT', 0, 'Staf Kepegawaian ', 4, 'avatar.jpg'),
	(56, 'NIP', '199010182017010321072', 'Melisa Suvia Arfiyanti', 'PTT', 0, 'Staf Kepegawaian ', 4, 'avatar.jpg'),
	(57, 'NIP', '196811081989031001', 'Syaiful Rachman, Ak.', 'Pembina ', 12, 'Kabag Keuangan', 4, 'avatar.jpg'),
	(58, 'NIP', '197705242002121001', 'Iwan Dwi Susanto, S.E., M.Ak.', 'Pembina', 11, 'Kasubbag Akutansi dan Verifikasi ', 4, 'avatar.jpg'),
	(59, 'NIP', '197209051993021001', 'Edi Setiawan, Ak.', 'Penata Tk. I', 9, 'Kasubbag Administrasi Keuangan', 4, 'avatar.jpg'),
	(60, 'NIP', '198707042014032001', 'Yani Yuliani, S.E.', 'Penata Muda', 7, 'Auditor', 4, 'avatar.jpg'),
	(61, 'NIP', '199011122014031002', 'Artdeansyah Utama Dilaga, S.E.', 'Penata Muda', 7, 'Analis Pengembangan Sistem Informasi', 4, 'avatar.jpg'),
	(62, 'NIP', '198104082015031001', 'Anwar Shadat, S.T.', 'Penata Muda Tk.I', 7, 'Analis Pengembangan Jaringan', 4, 'avatar.jpg'),
	(63, 'NIP', '198601282018011002', 'Tri Jananto', 'Pengatur', 5, 'Pengelola Database SPM', 4, 'avatar.jpg'),
	(64, 'NIP', '199412192019022002', 'Luna Putri Tiara Rossa', 'Penata Muda', 6, 'Penata Laporan Keuangan ', 4, 'avatar.jpg'),
	(65, 'NIP', '199403032019021003', 'Yahya Nuur Hidayat', 'Penata Muda', 6, 'Analis Laporan Keuangan', 4, 'avatar.jpg'),
	(66, 'NIP', '200001082018122003', 'Ayudyah Fitriani Hidayat', 'CPNS Pengatur Muda', 3, 'Pengadminstrasi Keuangan', 4, 'avatar.jpg'),
	(67, 'NIP', '199810132018122001', 'Nia Nurul Mahmudah', 'CPNS Pengatur Muda', 3, 'Pengadminstrasi Keuangan', 4, 'avatar.jpg'),
	(68, 'NIP', '200002292018122001', 'Veny Febri Putri Purba', 'CPNS Pengatur Muda', 3, 'Pengadminstrasi Keuangan', 4, 'avatar.jpg'),
	(69, 'NIP', '199910292018122004', 'Maria Aurelia Patricia', 'CPNS Pengatur Muda', 3, 'Pengadminstrasi Keuangan', 4, 'avatar.jpg'),
	(70, 'NIP', '199910082018121003', 'Muhammad Farhan Azhar', 'CPNS Pengatur Muda', 3, 'Pengadminstrasi Keuangan', 4, 'avatar.jpg'),
	(71, 'NIP', '198205242017010311002', 'Mayosi Swantika', 'PTT', 0, 'Staf Keuangan', 4, 'avatar.jpg'),
	(72, 'NIP', '198512262017010311060', 'Gusti Muhammad Permadi', 'PTT', 0, 'Staf Keuangan', 4, 'avatar.jpg'),
	(73, 'NIP', '199704022017010311087', 'Tabah Hegar Pamungkas', 'PTT', 0, 'Staf Keuangan', 4, 'avatar.jpg'),
	(74, 'NIP', '197306231994031001', 'Ahmad Zainal Arifin, S.ST., Ak.', 'Penata Tk. I  ', 9, 'Kabag Perencanaan', 4, 'avatar.jpg'),
	(75, 'NIP', '198308142008031001', 'M. Unggul Abdul Fatah, S.T.P., M.M.', 'Penata  ', 9, 'Kasubbag Penyusunan Anggaran', 4, 'avatar.jpg'),
	(76, 'NIP', '197309122009031001', 'Amir Mahmud, S.T.', 'Penata Tk. I', 9, 'Kasubbag Data', 4, 'avatar.jpg'),
	(77, 'NIP', '520796', 'Muhamad Djuhaimi Al Anshori', 'Letkol Adm.', 0, 'Kasubbag Penyusunan Program', 4, 'avatar.jpg'),
	(78, 'NIP', '198706292018012001', 'Sonya Christi Yunika, S.H.', 'Penata Muda', 6, 'Penyusun Program dan Kegiatan', 4, 'avatar.jpg'),
	(79, 'NIP', '199406012019022003', 'Juanita Manifesti', 'Penata Muda', 6, 'Analis Perencanaan', 4, 'avatar.jpg'),
	(80, 'NIP', '199711182018122003', 'Aulia Amani Wahdah', 'CPNS Pengatur', 5, 'Verifikator Keuangan', 4, 'avatar.jpg'),
	(81, 'NIP', '19860507201201111055', 'Wisnu Saputro', 'PTT', 0, 'Staf Biro Perencanaan, Hukum dan Humas', 4, 'avatar.jpg'),
	(82, 'NIP', '198610012017010311064', 'Dudih Rahmat Nurdiansyah', 'PTT', 0, 'Staf Biro Perencanaan, Hukum dan Humas', 4, 'avatar.jpg'),
	(83, 'NIP', '24/SP-24/PPK-2/BNPT/01/2019', 'Ayu Intan N., S.Psi.', '-', 0, 'Tenaga Administrasi Hukum dan Hubungan Masyarakat', 4, 'avatar.jpg'),
	(84, 'NIP', '196604131987031001', 'Rachmat Surawibawa, S.Sos.', 'Pembina Tk. I  ', 12, 'Kabag Tata Usaha dan Rumah Tangga', 4, 'avatar.jpg'),
	(85, 'NIP', '197711282006041001', 'Moch. Andriansyah, S.T., M.M.', 'Penata Tk. I', 9, 'Kasubbag Rumah Tangga, dan Perlengkapan', 4, 'avatar.jpg'),
	(86, 'NIP', '198403122014031001', 'Bukhori, S.Kom. ', 'Penata Muda Tk. I', 7, 'Kasubbag Tata Usaha, Protokol, dan Pengamanan', 4, 'avatar.jpg'),
	(87, 'NIP', '198506132014031001', 'Aristio Yudhanto, S.IKom.', 'Penata Muda Tk. I', 7, 'Analis Kerjasama', 4, 'avatar.jpg'),
	(88, 'NIP', '198208212015031001', 'Trigus Sinduwarno, S.T.', 'Penata Muda Tk. I', 7, 'Analis Pengembangan Jaringan', 4, 'avatar.jpg'),
	(89, 'NIP', '198711192018012000', 'dr. Pika Novriani Lubis', 'Penata Muda Tk. I', 7, 'Dokter Ahli Pertama', 4, 'avatar.jpg'),
	(90, 'NIP', '199002082018012000', 'Drg. Pebrina Dwi Arianti', 'Penata Muda Tk. I', 7, 'Dokter Gigi Ahli Pertama', 4, 'avatar.jpg'),
	(91, 'NIP', '199010082018011001', 'Putra Jody Susetyo, S.I.A.', 'Penata Muda', 6, 'Pranata Kearsipan', 4, 'avatar.jpg'),
	(92, 'NIP', '199212072018011002', 'Ardian Fauzi Rahman, S.Sos.', 'Penata Muda', 6, 'Pranata Kearsipan', 4, 'avatar.jpg'),
	(93, 'NIP', '199410032018011001', 'Sigih Sinaga, S.T.', 'Penata Muda', 6, 'Analis Data dan Informasi', 4, 'avatar.jpg'),
	(94, 'NIP', '198709212018011001', 'Depri Hadianto', 'Pengatur', 5, 'Teknisi Pemeliharaan Sarana dan Prasarana', 4, 'avatar.jpg'),
	(95, 'NIP', '199002262018011001', 'Adi Rahmatullah, A.Md. Kep', 'Pengatur', 5, 'Perawat Terampil', 4, 'avatar.jpg'),
	(96, 'NIP', '199306142018011001', 'Henri Prasetya, A.Md.', 'Pengatur', 5, 'Perawat Terampil', 4, 'avatar.jpg'),
	(97, 'NIP', '197909042008101001', 'Addy Kusnadi', 'Pengatur', 5, 'Protokol', 4, 'avatar.jpg'),
	(98, 'NIP', '199405102019022005', 'Afina Muthi Tsanya', 'Penata Muda Tk. I', 9, 'Apoteker Ahli Pertama ', 4, 'avatar.jpg'),
	(99, 'NIP', '199210152019022002', 'Sayyidati Oktia Padma Firdausi', 'Penata Muda', 6, 'Perawat Ahli Pertama ', 4, 'avatar.jpg'),
	(100, 'NIP', '199605042019021004', 'Raditya Ndaru Aji', 'Pengatur', 5, 'Perawat Gigi Terampil ', 4, 'avatar.jpg'),
	(101, 'NIP', '199705022019022003', 'Dewi Mustika Sari', 'Pengatur', 5, 'Pranata Komputer Terampil ', 4, 'avatar.jpg'),
	(102, 'NIP', '198102022017010310076', 'Agus Sutono', 'PTT', 0, 'Koordinator Pamdal / UKD', 4, 'avatar.jpg'),
	(103, 'NIP', '197005132017010310029', 'Rudy', 'PTT', 0, 'Staf TU dan Rumga', 4, 'avatar.jpg'),
	(104, 'NIP', '197704192017010310014', 'Irwan Y', 'PTT', 0, 'Pamdal / UKD', 4, 'avatar.jpg'),
	(105, 'NIP', '198501022017010310033', 'Fadli Sunarto', 'PTT', 0, 'Pamdal / UKD', 4, 'avatar.jpg'),
	(106, 'NIP', '198505112017010310071', 'Syafriadi', 'PTT', 0, 'Pamdal / UKD', 4, 'avatar.jpg'),
	(107, 'NIP', '198802062017010310041', 'Budi Wibowo', 'PTT', 0, 'Pengemudi Inspektur', 4, 'avatar.jpg'),
	(108, 'NIP', '198708082017010310022', 'Dede Sulaeman', 'PTT', 0, 'Pengemudi Operasional', 4, 'avatar.jpg'),
	(109, 'NIP', '197708142017010310030', 'Muryadi', 'PTT', 0, 'Pengemudi Operasional', 4, 'avatar.jpg'),
	(110, 'NIP', '197309252017010310037', 'Tirto', 'PTT', 0, 'Pengemudi Operasional', 4, 'avatar.jpg'),
	(111, 'NIP', '198808172017010310063', 'Agus Budiono', 'PTT', 0, 'Pengemudi Operasional', 4, 'avatar.jpg'),
	(112, 'NIP', '199111142017010310009', 'Aditya Adzhar', 'PTT', 0, 'Pramubakti', 4, 'avatar.jpg'),
	(113, 'NIP', '198104812017010310012', 'Muhammad Masturo', 'PTT', 0, 'Pramubakti', 4, 'avatar.jpg'),
	(114, 'NIP', '199103092017010310013', 'Erwin Jaelani', 'PTT', 0, 'Pramubakti', 4, 'avatar.jpg'),
	(115, 'NIP', '195807252017010310036', 'Husein Kuntum', 'PTT', 0, 'Pramubakti', 4, 'avatar.jpg'),
	(116, 'NIP', '199101062017010311004', 'Mirza Wahyudi', 'PTT', 0, 'Perawat Poliklinik', 4, 'avatar.jpg'),
	(117, 'NIP', '198302272017010311074', 'Rudi Hartono', 'PTT', 0, 'Staf Protokol Bandara', 4, 'avatar.jpg'),
	(118, 'NIP', '198605162017010311017', 'Armana AF', 'PTT', 0, 'Staf TU dan Rumga', 4, 'avatar.jpg'),
	(119, 'NIP', '199504022017010311010', 'Ega Pratama', 'PTT', 0, 'Staf TU dan Rumga', 4, 'avatar.jpg'),
	(120, 'NIP', '199502232017010311011', 'Gama Ramdani R', 'PTT', 0, 'Staf TU dan Rumga', 4, 'avatar.jpg'),
	(121, 'NIP', '198904302017010311050', 'Rahmad Hariyadi', 'PTT', 0, 'Staf TU dan Rumga', 4, 'avatar.jpg'),
	(122, 'NIP', '199112052017010311062', 'Dani Ardinanta Barmintoro', 'PTT', 0, 'Staf TU dan Rumga', 4, 'avatar.jpg'),
	(123, 'NIP', '196412042017010311077', 'Riyan Rakasiwi', 'PTT', 0, 'Staf TU dan Rumga', 4, 'avatar.jpg'),
	(124, 'NIP', '197909142017010311082', 'Teguh Machyudien', 'PTT', 0, 'Staf TU dan Rumga', 4, 'avatar.jpg'),
	(125, 'NIP', '197710052017010311084', 'Judo Prasetyo Buwono', 'PTT', 0, 'Staf TU dan Rumga', 4, 'avatar.jpg'),
	(126, 'NIP', '198512132017010321086', 'Monica Natalia Cesaria', 'PTT', 0, 'Dokter Poliklinik', 4, 'avatar.jpg'),
	(127, 'NIP', '198608022017010311087', 'M. Risal Efendi', 'PTT', 0, 'Staf Perawat Poliklinik', 4, 'avatar.jpg'),
	(128, 'NIP', '195908121981021004', 'Dr. Amrizal, M.M.', 'Pembina Utama Madya ', 14, 'Inspektur', 4, 'avatar.jpg'),
	(129, 'NIP', '11050003330967', 'Drs. Aripuddin, M.Si.', 'Letkol (Inf)', 0, 'Kasubbag Tata Usaha Inspektorat', 4, 'avatar.jpg'),
	(130, 'NIP', '196601061987031001', 'Ade Hermana, S.E., M.M.', 'Pembina Tk. I', 12, ' Auditor Madya', 4, 'avatar.jpg'),
	(131, 'NIP', '197908232014031001', 'Purwo Hadi Wibowo, S.E.', 'Penata Muda Tk. I', 7, 'Auditor Ahli Pertama', 4, 'avatar.jpg'),
	(132, 'NIP', '198901162014031002', 'Anwar Suhartono, S.E.', 'Penata Muda Tk.I', 7, 'Auditor Ahli Pertama', 4, 'avatar.jpg'),
	(133, 'NIP', '198505302014031001', 'Chandra Kurniawan Nababan, S.E.', 'Penata Muda', 7, 'Auditor Ahli Pertama', 4, 'avatar.jpg'),
	(134, 'NIP', '198803022015031003', 'Mohammad Nuhwana Saputra, S.E.', 'Penata Muda', 7, 'Pemeriksa Intelijen                                ', 4, 'avatar.jpg'),
	(135, 'NIP', '198909032015032002', 'Nilam Ayuningtyas, S.Psi.', 'Penata Muda Tk. I', 7, 'Analis Hubungan Kelembagaan', 4, 'avatar.jpg'),
	(136, 'NIP', '199408182018012001', 'Safira Insani, S.Sos.', 'Penata Muda', 6, 'Penyusun Program dan Kegiatan', 4, 'avatar.jpg'),
	(137, 'NIP', '199502282019022007', 'Nur Aisyah', 'Penata Muda', 6, 'Auditor Ahli Pertama', 4, 'avatar.jpg'),
	(138, 'NIP', '198908172019022004', 'Siti Huriah Azmi', 'Penata Muda', 6, 'Auditor Ahli Pertama', 4, 'avatar.jpg'),
	(139, 'NIP', '199308042019022005', 'Fadia Naufa Nasution', 'Penata Muda', 6, 'Auditor Ahli Pertama', 4, 'avatar.jpg'),
	(140, 'NIP', '199704162018122001', 'Siti Nur Arofah', 'CPNS Pengatur', 5, 'Verifikator Keuangan', 4, 'avatar.jpg'),
	(141, 'NIP', '199703142018121001', 'Teguh Darmawanto', 'CPNS Pengatur', 5, 'Verifikator Keuangan', 4, 'avatar.jpg'),
	(142, 'NIP', '199003052017010321054', 'Devia Elita Sari', 'PTT', 0, 'Staf Inspektorat', 4, 'avatar.jpg'),
	(143, 'NRP', '62050797', 'Drs. Suhardi Alius, M.H.', 'Komjen Pol', 15, 'Kepala BNPT', 1, 'avatar.jpg'),
	(144, 'NIP', '198509142008121001', 'Rikhi Benindo Maghaz, S.H.', 'Jaksa Pratama', 9, 'Kasubbag Tata Usaha Kepala', 4, 'avatar.jpg'),
	(145, 'NIP', '199203032018012001', 'Nurul Indah Ristyani, S.Sos.', 'Penata Muda', 6, 'Analis Data Intelijen', 4, 'avatar.jpg'),
	(146, 'NIP', '197605052017010312067', 'Abdul Hamid Majid, S.P', 'PTT', 0, 'Staf Khusus Kepala BNPT', 4, 'avatar.jpg'),
	(147, 'NIP', '198604222017010321035', 'Vita Afrilia', 'PTT', 0, 'Staf TU Kepala', 4, 'avatar.jpg'),
	(148, 'NIP', '199105162017010311006', 'Yogi Sumarna', 'PTT', 0, 'Staf TU Kepala', 4, 'avatar.jpg'),
	(149, 'NIP', '197706012017010311024', 'Anugrah Wanto Wibowo', 'PTT', 0, 'Staf TU Kepala', 4, 'avatar.jpg'),
	(150, 'NIP', '507801', 'Dr. A. Adang Supriyadi ', 'Marsda TNI', 0, 'Sekretaris Utama', 4, 'avatar.jpg'),
	(151, 'NRP', '32296', 'Dadang Hendrayudha', 'Brigjen TNI', 13, 'Kepala Biro Umum', 1, 'avatar.jpg'),
	(152, 'NIP', '196705011989031001', 'Bangbang Surono, Ak., M.M.', 'Pembina Utama Muda  ', 13, 'Kepala Biro Perencanaan, Hukum dan Humas', 4, 'avatar.jpg'),
	(153, 'NIP', '196404131988031001', 'Dwito Relawanto, S.E., M.M.', 'Penata Tk. I', 9, 'Kasubbag Tata Usaha Sestama', 4, 'avatar.jpg'),
	(154, 'NIP', '199012142017010311007', 'Eri Destria', 'PTT', 0, 'Staf TU Sestama', 4, 'avatar.jpg'),
	(155, 'NIP', '199108052017010321080', 'Firas Agyati Gumilar', 'PTT', 0, 'Staf TU Karoum', 4, 'avatar.jpg'),
	(156, 'NIP', '02/SP-02/PPK-2/BNPT/01/2019', 'Ari Setiyanto', '-', 0, 'TA Sestama', 4, 'avatar.jpg'),
	(157, 'NIP', '11930093111170', 'Sigit Karyadi, S.H.', 'Kolonel (Cpl)', 0, 'Kasubdit Bina Dalam Lembaga Pemasyarakatan', 1, 'avatar.jpg'),
	(158, 'NIP', '198112212001121001', 'Helmi Najih, A.Md. IP, S.H., M.H.', 'Penata', 8, 'Kasi Bina Narapidana ', 1, 'avatar.jpg'),
	(159, 'NIP', '198505142010121001', 'Ahmad Fauzi, S.Pd., M.Pd., M.H.', 'Penata Muda Tk. I', 7, 'Kasi Identifikasi Narapidana', 1, 'avatar.jpg'),
	(160, 'NIP', '198001212014031001', 'Defri Ardinald, S.Sos.', 'Penata Muda Tk. I', 7, 'Analis Kerjasama', 1, 'avatar.jpg'),
	(161, 'NIP', '198303142018011001', 'Cahyo Anggoro, S.E.', 'Penata Muda', 6, 'Penyusun Program dan Kegiatan', 1, 'avatar.jpg'),
	(162, 'NIP', '199103132018011001', 'Pandu Wahyu Pratama, S.Pd.', 'Penata Muda', 6, 'Analis Resosialisasi dan Rehabilitasi', 1, 'avatar.jpg'),
	(163, 'NIP', '199505182019022008', 'Mei Maria Yosepin Simbolon', 'Penata Muda', 6, 'Penyuluh Narapidana', 1, 'avatar.jpg'),
	(164, 'NIP', '199404120019021001', 'Ade Lingga Saputra Dalimunthe', 'Penata Muda', 6, 'Penata Laporan Keuangan ', 1, 'avatar.jpg'),
	(165, 'NIP', '198608172019021003', 'Argi Agusta', 'Penata Muda', 6, 'Analis Kebijakan Ahli Pertama ', 1, 'avatar.jpg'),
	(166, 'NIP', '199205182019022007', 'Nurani Ruhendri Putri', 'Penata Muda', 6, 'Penyuluh Narapidana ', 1, 'avatar.jpg'),
	(167, 'NIP', '199112242019022002', 'Natalia Aga Prasetyarini', 'Penata Muda', 6, 'Penyuluh Narapidana ', 1, 'avatar.jpg'),
	(168, 'NIP', '199306072019022005', 'Anindya Fathy Andarlita', 'Penata Muda', 6, 'Penyuluh Narapidana ', 1, 'avatar.jpg'),
	(169, 'NIP', '199607232019022002', 'Romayta Ayu Firdaus', 'Penata Muda', 6, 'Analis Resosialisasi dan Rehabilitasi ', 1, 'avatar.jpg'),
	(170, 'NIP', '199001252019021002', 'Puji Akbar', 'Penata Muda', 6, 'Penyusun Program, Anggaran dan Pelaporan ', 1, 'avatar.jpg'),
	(171, 'NIP', '198712232019021003', 'Rikki Rosadi', 'Penata Muda', 6, 'Analis Pemasyarakatan ', 1, 'avatar.jpg'),
	(172, 'NIP', '199507132019022004', 'R. Tinon Hastho Ririh', 'Penata Muda', 6, 'Analis Monitoring, Evaluasi dan Pelaporan ', 1, 'avatar.jpg'),
	(173, 'NIP', '198307172017010311018', 'Mohammad Alfan', 'PTT', 0, 'Staf Dit. Deradikalisasi', 1, 'avatar.jpg'),
	(174, 'NIP', '12013/P', 'Andy Prasetyo', 'Kolonel (Mar)', 0, 'Kasubdit Bina Lembaga Pemasyarakatan Khusus Teroris', 1, 'avatar.jpg'),
	(175, 'NIP', '197610282009121003', 'Andri Taufik H S, S.Sos., M.Ag.', 'Penata', 8, 'Kasi Materi Pembinaan', 1, 'avatar.jpg'),
	(176, 'NIP', '199212022018012003', 'Larasati Ayu Srie Dewanti, S.Pd.', 'Penata Muda', 6, 'Penyuluh Narapidana', 1, 'avatar.jpg'),
	(177, 'NIP', '199307312018012001', 'Sri Lestari, S.Pd.', 'Penata Muda', 6, 'Penyuluh Narapidana', 1, 'avatar.jpg'),
	(178, 'NIP', '199607222019021001', 'Yovi Roinaldo Tampubolon', 'Penata Muda', 6, 'Analis Data dan Informasi ', 1, 'avatar.jpg'),
	(179, 'NIP', '199109152019021003', 'Gunar Dito ', 'Penata Muda', 6, 'Analis Kebijakan Ahli Pertama ', 1, 'avatar.jpg'),
	(180, 'NIP', '199503172019022003', 'Adila Rahmayanti', 'Penata Muda', 6, 'Penyuluh Narapidana ', 1, 'avatar.jpg'),
	(181, 'NIP', '199212222019022008', 'Arini Sabila Hidayatika', 'Penata Muda', 6, 'Penyuluh Narapidana ', 1, 'avatar.jpg'),
	(182, 'NIP', '199511242019021002', 'Rangga Ardan Rahim', 'Penata Muda', 6, 'Analis Pemasyarakatan ', 1, 'avatar.jpg'),
	(183, 'NIP', '199704302019021001', 'Rachmat Fajri Adi Nugraha', 'Penata Muda', 6, 'Analis Pemasyarakatan ', 1, 'avatar.jpg'),
	(184, 'NIP', '199302272019021002', 'Handhika Saputra', 'Penata Muda', 6, 'Pengelola Warga Binaan Pemasyarakatan', 1, 'avatar.jpg'),
	(185, 'NIP', '519795', 'Drs. Solihuddin Nasution', 'Kolonel (Sus)', 0, 'Kasubdit Bina Masyarakat', 1, 'avatar.jpg'),
	(186, 'NIP', '198112162001121001', 'Arifin Akhmad, AMd. IP, S.H.', 'Penata', 8, 'Kasi Identifikasi Dalam Masyarakat ', 1, 'avatar.jpg'),
	(187, 'NIP', '11960056051174', 'Hendro Wicaksono, S.H.', 'Letkol (Cpl)', 0, 'Kasi Bina Dalam Masyarakat', 1, 'avatar.jpg'),
	(188, 'NIP', '198603012014032001', 'Ajeng Asih Lianasari, S.S.', 'Penata Muda Tk. I', 7, 'Analis Kerjasama', 1, 'avatar.jpg'),
	(189, 'NIP', '197610302002121001', 'Ahmad Riyadi', 'Penata Muda', 6, 'Pengadminstrasi Umum', 1, 'avatar.jpg'),
	(190, 'NIP', '199204272018011002', 'Ardi Putra Prasetya, S.Sos.', 'Penata Muda', 6, 'Analis Pemasyarakatan', 1, 'avatar.jpg'),
	(191, 'NIP', '198910272019022003', 'Rina Maulidah', 'Penata Muda', 6, 'Analis Data Intelijen', 1, 'avatar.jpg'),
	(192, 'NIP', '199105232019021003', 'Muhamad Affin Bahtiar', 'Penata Muda', 6, 'Penyuluh Narapidana', 1, 'avatar.jpg'),
	(193, 'NIP', '199404252019021003', 'Aqil Zaenulmillah', 'Penata Muda', 6, 'Pengelola Warga Binaan Pemasyarakatan ', 1, 'avatar.jpg'),
	(194, 'NIP', '198810242019021004', 'Henry Togar Manurung', 'Penata Muda', 6, 'Analis Monitoring, Evaluasi dan Pelaporan ', 1, 'avatar.jpg'),
	(195, 'NIP', '199204192019022003', 'Hany Widhyastri', 'Penata Muda', 6, 'Pengelola Warga Binaan Pemasyarakatan ', 1, 'avatar.jpg'),
	(196, 'NIP', '519802', 'Drs. Sudjatmiko', 'Kolonel (Pas)', 0, 'Kasubdit Kontra Propaganda', 1, 'avatar.jpg'),
	(197, 'NIP', '198303022002121003', 'Eri Suprayitno, S.E.', 'Penata ', 8, 'Kasi Media Literasi', 1, 'avatar.jpg'),
	(198, 'NIP', '198205162014031002', 'Rizky Adianhar, S.Sos.', 'Penata Muda', 7, 'Analis Kerjasama', 1, 'avatar.jpg'),
	(199, 'NIP', '198705032015032002', 'Maira Himadhani, S.T.', 'Penata Muda Tk. I', 7, 'Analis Pelayanan Publik                                 ', 1, 'avatar.jpg'),
	(200, 'NIP', '199605232019021003', 'Irfanditya Wisnu Wardana', 'Penata Muda', 6, 'Analis Data Intelejen ', 1, 'avatar.jpg'),
	(201, 'NIP', '199210102019021011', 'Luthfillah Ardiansyah', 'Penata Muda', 6, 'Analis Data dan Informasi ', 1, 'avatar.jpg'),
	(202, 'NIP', '199610202019022003', 'Nindya Dwi Eridanny', 'Pengatur', 5, 'Pranata Komputer Terampil ', 1, 'avatar.jpg'),
	(203, 'NIP', '199506072019031002', 'Indra Awal Priyanto S. Kom', 'Penata Muda', 6, 'Analis Data dan Informasi', 1, 'avatar.jpg'),
	(204, 'NIP', 'DE.1-PL.01.08/27/2018', 'Ika Kartika Mamonto, SE', '-', 0, 'Anggota Keuangan Kontra Propaganda', 1, 'avatar.jpg'),
	(205, 'NIP', 'DE.1-PL.01.08/28/2018', 'Sasra Bouty, SE', '-', 0, 'Anggota Keuangan Kontra Propaganda', 1, 'avatar.jpg'),
	(206, 'NIP', '196212311985032003', 'Dra. Hj. Andi Intang Dulung, M.HI.', 'Pembina Tk. I  ', 12, 'Kasubdit Pemberdayaan Masyarakat', 1, 'avatar.jpg'),
	(207, 'NIP', '196908041993011001', 'Puput Agus Setiawan, S.E., M.M., M.H.', 'Penata Tk. I', 9, 'Kasi Penelitian dan Evaluasi', 1, 'avatar.jpg'),
	(208, 'NIP', '12317/P', 'Setyo Pranowo, S.H., M.M.', 'Letkol Laut (KH)', 0, 'Kasi Partisipasi Masyarakat', 1, 'avatar.jpg'),
	(209, 'NIP', '198012302015031001', 'Teuku Fauzansyah, S.S.', 'Penata Muda Tk. I', 7, 'Analis Kerjasama Luar Negeri             ', 1, 'avatar.jpg'),
	(210, 'NIP', '198810232018012002', 'Nurul Farida, S.Pd.', 'Penata Muda', 6, 'Analis Pemberdayaan', 1, 'avatar.jpg'),
	(211, 'NIP', '199412032019022007', 'Hanifatul Handayani', 'Penata Muda', 6, 'Analis Monitoring, Evaluasi dan Pelaporan ', 1, 'avatar.jpg'),
	(212, 'NIP', '198707152019021001', 'Gading Pramudika', 'Penata Muda', 6, 'Penata Laporan Keuangan ', 1, 'avatar.jpg'),
	(213, 'NIP', '198807102017010311021', 'Rusdiansyah Batubara', 'PTT', 0, 'Staf Dit. Pencegahan', 1, 'avatar.jpg'),
	(214, 'NIP', '198412032017010311005', 'Roy Karno', 'PTT', 0, 'Staf Dit. Pencegahan', 1, 'avatar.jpg'),
	(215, 'NIP', '198511042017010311052', 'Adi Prasetyo', 'PTT', 0, 'Staf Dit. Pencegahan', 1, 'avatar.jpg'),
	(216, 'NIP', '198908272017010321059', 'Andi Ulul Azmi', 'PTT', 0, 'Staf Dit. Pencegahan', 1, 'avatar.jpg'),
	(217, 'NRP', '1900024511166', 'Roedy Widodo', 'Kolonel (Czi)', 12, 'Kasubdit Pemulihan Korban Aksi Terorisme', 1, 'avatar.jpg'),
	(218, 'NIP', '198301242008121001', 'Muhammad Lutfi, S.IP., M.Si.', 'Penata', 8, 'Kasi Pemulihan Korban', 1, 'avatar.jpg'),
	(219, 'NIP', '196404271986031001', 'Nurturyanto, S.E.', 'Penata Tk. I', 9, 'Kasi Pemulihan Sarana & Prasarana', 1, 'avatar.jpg'),
	(220, 'NIP', '198401222018011001', 'Ari Prabawa, S.H.', 'Penata Muda', 6, 'Analis Advokasi', 1, 'avatar.jpg'),
	(221, 'NIP', '199207032018012002', 'Ayu Permata Yuliana, S.Sos.', 'Penata Muda', 6, 'Analis Data dan Informasi', 1, 'avatar.jpg'),
	(222, 'NIP', '199409192019022002', 'Raudhatul Mutiah', 'Penata Muda', 6, 'Penata Laporan Keuangan ', 1, 'avatar.jpg'),
	(223, 'NIP', '32798', 'Rahmad Suhendro', 'Letkol (Czi)', 0, 'Kasubdit Pengamanan Lingkungan', 1, 'avatar.jpg'),
	(224, 'NIP', '197508252002121008', 'Muriansyah Herman, S.Sos., M.Si.', 'Pembina', 11, 'Kasi Pengamanan Lingkungan Pemerintah', 1, 'avatar.jpg'),
	(225, 'NIP', '198811062014031002', 'Mario Humberto, S.Sos., M.H.', 'Penata Muda Tk. I', 8, 'Kasi Pengamanan Lingkungan Umum', 1, 'avatar.jpg'),
	(226, 'NIP', '198608292014071001', 'Alhen Egho Saiba, S.T.', 'Penata Muda Tk. I', 7, 'Analis Data Intelijen', 1, 'avatar.jpg'),
	(227, 'NIP', '198109072015031003', 'Andityas Pranowo, S.Sos.I.', 'Penata Muda Tk. I', 7, 'Analis Pelayanan Publik                                 ', 1, 'avatar.jpg'),
	(228, 'NIP', '19920830 201801 1 001', 'Muhammad Arief Ibrahim, S.IP.', 'Penata Muda', 6, 'Analis Kerjasama', 1, 'avatar.jpg'),
	(229, 'NIP', '199410292018011003', 'Muhammad Syauqi Khudzaifi, S.Si.', 'Penata Muda', 6, 'Analis Data dan Informasi', 1, 'avatar.jpg'),
	(230, 'NIP', '199504212019021003', 'Alif Nurryansyah Firdaus', 'Penata Muda', 6, 'Penata Laporan Keuangan ', 1, 'avatar.jpg'),
	(231, 'NIP', '1993070019021003', 'Iffan Al Hafiz', 'Penata Muda', 6, 'Analis pengaman Lingkungan', 1, 'avatar.jpg'),
	(232, 'NIP', '13410/P', 'Wahyu Herawan', 'Kolonel Laut (T)', 0, 'Kasubdit Pam Obvit dan Transportasi', 1, 'avatar.jpg'),
	(233, 'NIP', '197607202006042001', 'Yuline Pramasari, S.E., M.MTr', 'Penata Tk. I', 9, 'Kasi Pengamanan Transportasi', 1, 'avatar.jpg'),
	(234, 'NIP', '71040697', 'Zulkifli, S.Ag.', 'Kom Pol', 0, 'Kasi Pengamanan Objek Vital', 1, 'avatar.jpg'),
	(235, 'NIP', '198909262018011001', 'Septiyono Zafarudin, S.IP.', 'Penata Muda', 6, 'Analis Kerjasama', 1, 'avatar.jpg'),
	(236, 'NIP', '199109152018011002', 'Richo Wisnu Anggoro, S.Kom.', 'Penata Muda', 6, 'Analis Data dan Informasi', 1, 'avatar.jpg'),
	(237, 'NIP', '199407062019022001', 'Hayuning Nuswantari', 'Penata Muda', 6, 'Analis Pengamanan Objek Vital ', 1, 'avatar.jpg'),
	(238, 'NIP', '199604122019022005', 'Anisa Istiqomah', 'Penata Muda', 6, 'Penyusun Program, Anggaran dan Pelaporan', 1, 'avatar.jpg'),
	(239, 'NIP', '196402251987031001', 'Moch. Chairil Anwar, S.H.', 'Pembina Tk. I', 12, 'Kasubdit Pengawasan', 1, 'avatar.jpg'),
	(240, 'NIP', '198307202014031001', 'Faizal Yan Aulia, S.Fil., M.Sc.', 'Penata', 8, 'Kasi Pengawasan Barang', 1, 'avatar.jpg'),
	(241, 'NIP', '198207252014031001', 'Yacobus Tri Raharjo, S.E.', 'Penata Muda Tk. I', 7, 'Analis Pengawasan', 1, 'avatar.jpg'),
	(242, 'NIP', '199310082018011003', 'Paudeno Palega, S.M.', 'Penata Muda', 6, 'Analis Bidang Pengawasan', 1, 'avatar.jpg'),
	(243, 'NIP', '199410262018012002', 'Hasna Khairiani Mulyana, S.Sos.', 'Penata Muda', 6, 'Analis Data dan Informasi', 1, 'avatar.jpg'),
	(244, 'NIP', '199007282019022003', 'Putri Wuning Muhareni', 'Penata Muda', 6, 'Analis Data Intelejen  ', 1, 'avatar.jpg'),
	(245, 'NIP', '199403102019021003', 'Fikrul Hanif', 'Penata Muda', 6, 'Analis Data Intelejen  ', 1, 'avatar.jpg'),
	(246, 'NIP', '199412302019022004', 'Mutiara Islamiyati', 'Penata Muda', 6, 'Analis Kebijakan Ahli Pertama ', 1, 'avatar.jpg'),
	(247, 'NIP', '199608082019022004', 'Vania Nabilla Aditiarini', 'Penata Muda', 6, 'Analis Bidang Pengawasan ', 1, 'avatar.jpg'),
	(248, 'NIP', '199602052019022004', 'Trissa Diva Rusniko', 'Penata Muda', 6, 'Analis Bidang Pengawasan ', 1, 'avatar.jpg'),
	(249, 'NIP', '199009172019022003', 'Deby Septana Suryanto', 'Penata Muda', 6, 'Analis Bidang Pengawasan ', 1, 'avatar.jpg'),
	(250, 'NIP', '199211052019032003', 'Chelsea Amelia Purba S.I.A', 'Penata Muda', 6, 'Penyusun Program, Anggaran Dan Pelaporan', 1, 'avatar.jpg'),
	(251, 'NIP', '30851', 'Hendri Paruhuman Lubis', 'Mayjen TNI', 0, '1', 1, 'avatar.jpg'),
	(252, 'NIP', '196609241991031002', 'Prof. Dr. Irfan Idris, M.A.', 'Pembina Utama Madya ', 13, 'Direktur Deradikalisasi', 1, 'avatar.jpg'),
	(253, 'NRP', '620710016', 'Ir. Hamli M.E.', 'Brigjen Pol', 13, 'Direktur Pencegahan', 1, 'avatar.jpg'),
	(254, 'NRP', '63100746', 'Drs. H. Herwan Chaidir', 'Brigjen Pol', 13, 'Direktur Perlindungan', 1, 'avatar.jpg'),
	(255, 'NIP', '197904282002121000', 'Ahadi Wijayanto, S.E.', 'Pembina', 11, 'Kasubbag Tata Usaha Deputi I', 1, 'avatar.jpg'),
	(256, 'NIP', '198606272014032001', 'Mellysa Padma Paramita, S.H.', 'Penata Muda Tk. I', 7, 'Auditor', 1, 'avatar.jpg'),
	(257, 'NIP', '199007172015032002', 'Diannitha Phobe Yuliane Pertiwi, S.Psi.', 'Penata Muda Tk. I', 7, 'Analis Hubungan Kelembagaan', 1, 'avatar.jpg'),
	(258, 'NIP', '198702132018011001', 'Eldi Bisma Putra Mahendra', 'Penata Muda', 6, 'Analis Data dan Informasi', 1, 'avatar.jpg'),
	(259, 'NIP', '199010312018012002', 'Mardiyah Az Zahra, S.T.', 'Penata Muda', 6, 'Analis Data dan Informasi', 1, 'avatar.jpg'),
	(260, 'NIP', '199310182018012001', 'Mustika Oktaviani, S.Hum.', 'Penata Muda', 6, 'Pranata Kearsipan', 1, 'avatar.jpg'),
	(261, 'NIP', '199705082018122004', 'Karera Meyda', 'CPNS Pengatur', 5, 'Verifikator Keuangan', 1, 'avatar.jpg'),
	(262, 'NIP', '199802102018121002', 'Kian Falenza Fyqra', 'CPNS Pengatur', 5, 'Verifikator Keuangan', 1, 'avatar.jpg'),
	(263, 'NIP', '199311102017010311020', 'Denni Ristyawan', 'PTT', 0, 'Staf TU Deputi I', 1, 'avatar.jpg'),
	(264, 'NIP', '198207292017010321046', 'Rose Rosida', 'PTT', 0, 'Staf TU Deputi I', 1, 'avatar.jpg'),
	(265, 'NIP', '197103202017010311016', 'Andry Martyano', 'PTT', 0, 'Staf Dit. Perlindungan ', 1, 'avatar.jpg'),
	(266, 'NIP', 'DE.1-PL.01.08/29/2018', 'Rizky Putri Marsyarita, S.Pd', '-', 0, 'Satgas', 1, 'avatar.jpg'),
	(267, 'NIP', 'DE.1-PL.01.08/03/2019', 'Ruslan Setiawan', '-', 0, 'Satgas', 1, 'avatar.jpg'),
	(268, 'NIP', '31970364070877', 'Mimi Suhaemi', '-', 0, 'BKO TNI ', 1, 'avatar.jpg'),
	(269, 'NIP', '31960800000776', 'Tukadi', '-', 0, 'BKO TNI ', 1, 'avatar.jpg'),
	(270, 'NIP', 'DE.1-PL.01.08/01/2018', 'Siti Hajar, S.Pd', '-', 0, 'Anggota Administrasi Kepala Bidang Pencegahan', 1, 'avatar.jpg'),
	(271, 'NRP', '63040908', 'Drs. Budiono Sandi, S.H., M.Hum.', 'Irjen Pol', 14, 'Deputi Bidang Pencegahan, Perlindungan dan Deradikalisasi', 1, 'avatar.jpg'),
	(272, 'NRP', '68020211', 'Drs. Torik Triyono, M.Si.', 'Brigjen Pol', 13, 'Direktur Penindakan', 1, 'avatar.jpg'),
	(273, 'NRP', '67060234', 'Drs. Imam Margono', 'Brigjen Pol', 13, 'Direktur Pembinaan Kemampuan', 1, 'avatar.jpg'),
	(274, 'NRP', '67050527', 'Eddy Hartono, S.I.K., M.H.', 'Brigjen Pol', 13, 'Direktur Penegakan Hukum', 1, 'avatar.jpg'),
	(275, 'NIP', '196805171996031000', 'Supargiyanto, S.Sos.', 'Penata  ', 8, 'Kasubbag Tata Usaha Deputi II', 2, 'avatar.jpg'),
	(276, 'NIP', '198706072014031001', 'Khaerul Ikhsan, S.Kom.', 'Penata Muda Tk. I', 7, 'Analis Pengamanan Objek Vital', 2, 'avatar.jpg'),
	(277, 'NIP', '198906202019021003', 'Dwi Rahmawanto', 'Penata Muda', 6, 'Analis Monitoring, Evaluasi dan Pelaporan ', 2, 'avatar.jpg'),
	(278, 'NIP', '197709122017010310028', 'Eko Sulistiyono', 'PTT', 0, 'Staf TU Deputi II', 2, 'avatar.jpg'),
	(279, 'NIP', '199001012017010311023', 'Hariyadi Fratama', 'PTT', 0, 'Staf TU Deputi II ', 2, 'avatar.jpg'),
	(280, 'NIP', '31172', 'Darmanto', 'Kolonel (Inf)', 0, 'Kasubdit Kesiapsiagaan dan Penanganan Krisis', 2, 'avatar.jpg'),
	(281, 'NIP', '11990041751277', 'Indra Gunawan', 'Letkol (Inf)', 0, 'Kasi Kesiapsiagaan', 2, 'avatar.jpg'),
	(282, 'NIP', '521858', 'Komang Dony A.W.', 'Letkol (Pas)', 0, 'Kasi Pengendalian Krisis', 2, 'avatar.jpg'),
	(283, 'NIP', '198701202018011002', 'Nurul Huda Shufi Prabowo, S.I.Kom.', 'Penata Muda', 6, 'Analis Kerjasama', 2, 'avatar.jpg'),
	(284, 'NIP', '199402182018012001', 'Afifah Rahmawati, S.A.P.', 'Penata Muda', 6, 'Penyusun Program dan Kegiatan', 2, 'avatar.jpg'),
	(285, 'NIP', '199209162019021001', 'Fahmi Sidiq', 'Penata Muda', 6, 'Penyuluh Narapidana ', 2, 'avatar.jpg'),
	(286, 'NIP', '199012072019022005', 'Siti Pranawaningrum', 'Penata Muda', 6, 'Penyuluh Narapidana ', 2, 'avatar.jpg'),
	(287, 'NRP', '74090558', 'Alexander Sabar, S.IK.', 'Kombes Pol', 12, 'Kasubdit Intelijen', 1, 'avatar.jpg'),
	(288, 'NIP', '84051746', 'Irvan Reza, S.H., S.I.K', 'Kom Pol', 0, 'Kasi Pengolahan Data', 2, 'avatar.jpg'),
	(289, 'NIP', '198708232014031001', 'Donnie Alimurfie, S.E., M.E.', 'Penata', 7, 'Kasi Pengumpulan Data', 2, 'avatar.jpg'),
	(290, 'NRP', '65120037', 'Astuti Idris, S.Sos.', 'AKBP', 9, 'Kasi Operasi Intelijen', 1, 'avatar.jpg'),
	(291, 'NIP', '198805132014032001', 'Leebarty Taskarina, S.Sos., M.Krim.', 'Penata Muda Tk. I', 7, 'Kasi Analisis Intelijen', 2, 'avatar.jpg'),
	(292, 'NIP', '198404302015031002', 'Rezky Mediansyah, S.T.', 'Penata Muda', 7, 'Analis Pengembangan Jaringan', 2, 'avatar.jpg'),
	(293, 'NIP', '199201082018011001', 'Kunto Hedy Nugroho, S.Sos.', 'Penata Muda', 6, 'Analis Data Intelijen', 2, 'avatar.jpg'),
	(294, 'NIP', '199202102018012001', 'Masitha Nisa Noorrahma', 'Penata Muda', 6, 'Analis Penyidikan', 2, 'avatar.jpg'),
	(295, 'NIP', '198209022017010321034', 'Indah Mora Virgana ', 'PTT', 0, 'Staf Dit. Penindakan', 2, 'avatar.jpg'),
	(296, 'NRP', '70050365', 'Zamri, S.Kom.', 'Kombes Pol', 12, 'Kasubdit Teknologi Informasi', 1, 'avatar.jpg'),
	(297, 'NIP', '199308202018011001', 'Ariesta Aditya Timur, S.Kom.', 'Penata Muda', 6, 'Analis Data dan Informasi', 2, 'avatar.jpg'),
	(298, 'NIP', '199510112018012002', 'Hana Abshari, S.Si.', 'Penata Muda', 6, 'Analis Data dan Informasi', 2, 'avatar.jpg'),
	(299, 'NIP', '199412192019021005', 'Bayu Pradinta', 'Penata Muda', 6, 'Analis Data dan Informasi ', 2, 'avatar.jpg'),
	(300, 'NIP', '199103202019021004', 'Ramdhan Wijaya Umbara', 'Penata Muda', 6, 'Analis Data dan Informasi ', 2, 'avatar.jpg'),
	(301, 'NIP', '199203082019021004', 'Muhamad Yusuf Ramdhan', 'Penata Muda', 6, 'Analis Data Intelijen ', 2, 'avatar.jpg'),
	(302, 'NIP', '199412222019021004', 'Deky Mulyana', 'Pengatur', 5, 'Pengelola Sistem dan Jaringan ', 2, 'avatar.jpg'),
	(303, 'NIP', '199608062019022004', 'Gusniar', 'Pengatur', 5, 'Pranata Komputer Terampil ', 2, 'avatar.jpg'),
	(304, 'NIP', '199302252019021002', 'Atmo Gayuh Laksono Setiawan', 'Pengatur', 5, 'Pranata Komputer Terampil ', 2, 'avatar.jpg'),
	(305, 'NIP', '199211302019021003', 'Ardianda Aryo Prakoso', 'Penata Muda', 6, 'Analis Data dan Informasi ', 2, 'avatar.jpg'),
	(306, 'NRP', '65010649', 'Suprianto, S.H.', 'Kombes Pol', 12, 'Kasubdit Pelatihan', 1, 'avatar.jpg'),
	(307, 'NIP', '520262', 'Teguh Ari Wibowo', 'Letkol (Sus)', 0, 'Kasi Perencanaan Latihan', 2, 'avatar.jpg'),
	(308, 'NIP', '11930070001268', 'Luki Triandono', 'Letkol (Inf)', 0, 'Kasi Pelaksanaan Latihan', 2, 'avatar.jpg'),
	(309, 'NIP', '198210032014031001', 'Dimas Andianto, S.T.', 'Penata Muda', 7, 'Analis Pengamanan Objek Vital', 2, 'avatar.jpg'),
	(310, 'NIP', '198809202015051001', 'Salmon Saa, S.IP.', 'Penata Muda', 6, 'Analis Potensi Konflik', 2, 'avatar.jpg'),
	(311, 'NIP', '198908052015032002', 'Masdhalifa, S.H.', 'Penata Muda Tk. I', 7, 'Analis Hubungan Kelembagaan', 2, 'avatar.jpg'),
	(312, 'NIP', '198612122018011001', 'Amar Maruf, S.Pd.', 'Penata Muda', 6, 'Analis Kerjasama Pelatihan', 2, 'avatar.jpg'),
	(313, 'NIP', '199002202019021002', 'Rizki Montheza', 'Penata Muda', 6, 'Penyusun Bahan Kerjasama Pelatihan ', 2, 'avatar.jpg'),
	(314, 'NIP', '199105042019021002', 'Ridwan Nur Matien', 'Penata Muda', 6, 'Penyusun Bahan Kerjasama Pelatihan ', 2, 'avatar.jpg'),
	(315, 'NIP', '196710131993031001', 'M. Syafwan Zuraidi, S.H.', 'Penata Tk. I', 9, 'Kasubdit Pengembangan Sistem Operasi', 2, 'avatar.jpg'),
	(316, 'NIP', '198611102014031002', 'Gemilang Parhadiyan, S.T., M.M.S.I.', 'Penata  ', 8, 'Kasi Pengelolaan Sistem Informasi', 2, 'avatar.jpg'),
	(317, 'NIP', '198310262018011001', 'Arrendra Ockiarawan, S.S.', 'Penata Muda', 6, 'Analis Kerjasama', 2, 'avatar.jpg'),
	(318, 'NIP', '198806042018012001', 'Cindy Yunita, S.T. ', 'Penata Muda', 6, 'Analis Data dan Informasi', 2, 'avatar.jpg'),
	(319, 'NIP', '199007042018011002', 'Ogie Prasetyo, S.I.A.', 'Penata Muda', 6, 'Penyusun Program dan Kegiatan', 2, 'avatar.jpg'),
	(320, 'NIP', '199405102018011001', 'Dwi Luthfan Prakoso, S.Sos.', 'Penata Muda', 6, 'Analis Kerjasama', 2, 'avatar.jpg'),
	(321, 'NIP', '199104202019021002', 'Resha Arieshandy', 'Penata Muda', 6, 'Analis Monitoring, Evaluasi dan Pelaporan ', 2, 'avatar.jpg'),
	(322, 'NIP', '12723/P', 'Edy Cahyanto', 'Kolonel (Mar)', 0, 'Kasubdit Penggunaan Kekuatan ', 2, 'avatar.jpg'),
	(323, 'NIP', '532423', 'Ilham Permana', 'Mayor (Lek)', 0, 'Kasi Pemberdayaan Kemampuan', 2, 'avatar.jpg'),
	(324, 'NIP', '198506252019021003', 'Angga Reynaldo', 'Penata Muda', 6, 'Analis Monitoring, Evaluasi dan Pelaporan ', 2, 'avatar.jpg'),
	(325, 'NIP', '199105152019021004', 'Fajar Rohman Aziz', 'Penata Muda', 6, 'Analis Monitoring, Evaluasi dan Pelaporan ', 2, 'avatar.jpg'),
	(326, 'NIP', '198009022017010311003', 'Khayun Alwy', 'PTT', 0, 'Staf Dit. Binpuan', 2, 'avatar.jpg'),
	(327, 'NIP', '199003122017010311019', 'Maliki Ramadhan Fachrudin', 'PTT', 0, 'Staf Dit. Binpuan', 2, 'avatar.jpg'),
	(328, 'NIP', '198009032017010311061', 'Rony Sunandar', 'PTT', 0, 'Staf Dit. Binpuan', 2, 'avatar.jpg'),
	(329, 'NRP', '72110541', 'Slamet Riyadi, S.IK., M.Si.', 'Kombes Pol', 12, 'Kasubdit Analisis dan Evaluasi Penegakan Hukum', 1, 'avatar.jpg'),
	(330, 'NIP', '197407122003122001', 'Djuliawati, S.E., M.M.', 'Penata Muda Tk. I', 7, 'Kasi Evaluasi Dan Laporan', 2, 'avatar.jpg'),
	(331, 'NIP', '199102222018011001', 'Paul Haposan S Lumbangaol', 'Penata Muda', 6, 'Analis Advokasi', 2, 'avatar.jpg'),
	(332, 'NIP', '199110262018011002', 'Muhammad Reza Palevi, S.Sos.', 'Penata Muda', 6, 'Analis Produk Hukum', 2, 'avatar.jpg'),
	(333, 'NIP', '199511172018011001', 'Muhammad Dwibagus Lisandro, S.Sos.', 'Penata Muda', 6, 'Analis Kerjasama', 2, 'avatar.jpg'),
	(334, 'NIP', '199606152019021001', 'Erdo Dwi Putra', 'Penata Muda', 6, 'Penyusun Program, Anggaran dan Pelaporan', 2, 'avatar.jpg'),
	(335, 'NIP', '199211092019022003', 'Dini Hariyani', 'Penata Muda', 6, 'Penyusun Program, Anggaran dan Pelaporan ', 2, 'avatar.jpg'),
	(336, 'NIP', '199101302019021002', 'Febriawan Wira Putra', 'Penata Muda', 6, 'Penyusun Program, Anggaran dan Pelaporan ', 2, 'avatar.jpg'),
	(337, 'NIP', '199701292018122002', 'Ni Luh Gede Cyntia Cahyani', 'CPNS Pengatur', 5, 'Pengelola Keuangan', 2, 'avatar.jpg'),
	(338, 'NIP', '199709032018121003', 'Binsar Sinaga', 'CPNS Pengatur', 5, 'Verifikator Keuangan', 2, 'avatar.jpg'),
	(339, 'NRP', '74090552', 'Hando Wibowo, S.IK., M.Si.', 'Kombes Pol', 12, 'Kasubdit Hubungan Antar Lembaga Aparat Penegak Hukum', 1, 'avatar.jpg'),
	(340, 'NIP', '80031111', 'I Nyoman Sarjana, SIK., M.A.P', 'Kom Pol', 0, 'Kasi Hubungan Antar Lembaga Daerah', 2, 'avatar.jpg'),
	(341, 'NIP', '199009212014031001', 'Septian Ageng Kurniadi, S.H.', 'Penata Muda Tk. I', 7, 'Kasi Hubungan Antar Lembaga Pusat', 2, 'avatar.jpg'),
	(342, 'NIP', '198911262014032002', 'Dian Eko Rini, S.Pd.', 'Penata Muda Tk. I', 7, 'Analis Pengembangan Sistem Informasi', 2, 'avatar.jpg'),
	(343, 'NIP', '198905142018011001', 'Maharadhika Adetya Putra', 'Penata Muda', 6, 'Penyusun Program dan Kegiatan', 2, 'avatar.jpg'),
	(344, 'NIP', '199409022018012002', 'Septiani Kusherawanti, S.Sos.', 'Penata Muda', 6, 'Analis Kerjasama', 2, 'avatar.jpg'),
	(345, 'NIP', 'DE.1-PL.01.08/22/2019', 'Maulana Abdul Sidiq', '-', 0, 'PTT', 2, 'avatar.jpg'),
	(346, 'NIP', '197402181994031001', 'Suroyo, S.H., M.Hum.', 'Pembina', 11, 'Kasubdit Perlindungan Aparat Penegak Hukum', 2, 'avatar.jpg'),
	(347, 'NIP', '197904112005011007', 'Rahmat Sori Simbolon, S.H., M.H.', 'Penata Tk.I', 9, 'Kasi Analisis dan Identifikasi', 2, 'avatar.jpg'),
	(348, 'NIP', '196511101989031003', 'Ragil Priyadi, S.H., M.H.', 'Penata', 9, 'Kasi Litigasi dan Advokasi', 2, 'avatar.jpg'),
	(349, 'NRP', '63100119', 'H. Dalih Somawi, S.H., M.Hum.', 'AKBP', 9, 'Kasi Pengamanan Aparat Penegak Hukum', 1, 'avatar.jpg'),
	(350, 'NIP', '198509242014032002', 'Zainida, S.Psi.', 'Penata Muda', 7, 'Analis Pengamanan Objek Vital', 2, 'avatar.jpg'),
	(351, 'NIP', '198708242018012001', 'Mega Agustina, S.T.', 'Penata Muda', 6, 'Analis Data dan Informasi', 2, 'avatar.jpg'),
	(352, 'NIP', '199406022018011002', 'Ikram Alifkhan Islami, S.T.', 'Penata Muda', 6, 'Analis Data dan Informasi', 2, 'avatar.jpg'),
	(353, 'NIP', '198612262017010311039', 'Andre Sucipto', 'PTT', 0, 'Staf Dit. Penegakkan Hukum', 2, 'avatar.jpg'),
	(354, 'NIP', '197407042000031001', 'Tolhah Ubaidi, S.IP., MPP.', 'Pembina', 11, 'Kasubdit Amerika dan Eropa', 3, 'avatar.jpg'),
	(355, 'NIP', '11010023740177', 'Yaenurendra H.A.P, S.T., MMgt. Stud', 'Letkol (Czi)', 0, 'Kasi Kerjasama Amerika', 3, 'avatar.jpg'),
	(356, 'NIP', '69050155', 'Zainal Ahzab, A.Md.', 'Kom Pol', 0, 'Kasi Kerjasama Eropa', 3, 'avatar.jpg'),
	(357, 'NIP', '198402272015031001', 'Djati Utoyo Utomo, S.Sos.', 'Penata Muda Tk. I', 7, 'Analis Kerjasama Luar Negeri ', 3, 'avatar.jpg'),
	(358, 'NIP', '199111102018012001', 'Uum Humairoh, S,Sos.', 'Penata Muda', 6, 'Penyusun Program dan Kegiatan', 3, 'avatar.jpg'),
	(359, 'NIP', '199310052019021006', 'Ayudha Agung Satrya Putra', 'Penata Muda', 6, 'Analis Bahasa dan Sastra ', 3, 'avatar.jpg'),
	(360, 'NIP', '198807222019021002', 'Mohammad Muiz Fathurrohman', 'Penata Muda', 6, 'Analis Kerjasama Luar Negeri', 3, 'avatar.jpg'),
	(361, 'NIP', '199611062019021001', 'Fe Fikran Alfurqon', 'Penata Muda', 6, 'Analis Data Intelijen ', 3, 'avatar.jpg'),
	(362, 'NIP', '197810072017010311056', 'Adiyono', 'PTT', 0, 'Staf Dit. Bilateral', 3, 'avatar.jpg'),
	(363, 'NIP', '516352', 'Fanfan Infansyah ', 'Kolonel (Sus)', 0, 'Kasubdit Kerjasama Asia Pasifik', 3, 'avatar.jpg'),
	(364, 'NIP', '197811132014032001', 'Irene Dukamoro, S.S.', 'Penata Muda Tk. I', 7, 'Kasi Kerjasama Asia Pasifik', 3, 'avatar.jpg'),
	(365, 'NIP', '524462', 'Harianto, S.Pd., M.Pd', 'Letkol Sus', 0, 'Kasi Kerjasama Afrika dan Timur Tengah', 3, 'avatar.jpg'),
	(366, 'NIP', '198908102018011001', 'Bagus Hanni Pradana, S.Hum.', 'Penata Muda', 6, 'Analis Kerjasama', 3, 'avatar.jpg'),
	(367, 'NIP', '199406172019022006', 'Sri Wahyuningsih', 'Penata Muda', 6, 'Analis Kerjasama Luar Negeri ', 3, 'avatar.jpg'),
	(368, 'NIP', '11930080160271', 'Kurniawan, S.E.', 'Letkol (Inf)', 0, 'Kasubdit Kerjasama Multilateral', 3, 'avatar.jpg'),
	(369, 'NIP', '198601102014032001', 'Anita Sofiana, S.Pd.', 'Penata Muda Tk. I', 7, 'Kasi Lembaga Pemerintah Subdit Kerjasama Multilateral', 3, 'avatar.jpg'),
	(370, 'NIP', '198512022015031001', 'Igor Tanjung Pambuko, S.S.', 'Penata Muda Tk. I', 7, 'Pemeriksa Intelijen                                ', 3, 'avatar.jpg'),
	(371, 'NIP', '199104192015032001', 'Alfrida Heanity Panjaitan, S.A.B.', 'Penata Muda', 6, 'Analis Barang dan Jasa                                 ', 3, 'avatar.jpg'),
	(372, 'NIP', '198804212018011002', 'I Putu Eka Dimi Aprilianta, S.T.', 'Penata Muda', 6, 'Analis Data dan Informasi', 3, 'avatar.jpg'),
	(373, 'NIP', '199405172019022003', 'Tuti Hasanah', 'Penata Muda', 6, 'Analis Bahasa dan Sastra ', 3, 'avatar.jpg'),
	(374, 'NIP', '199605102017010311081', 'M. Faris Naufal', 'PTT', 0, 'Staf Dit Kerjasama RM', 3, 'avatar.jpg'),
	(375, 'NIP', '197608242000031001', 'Dionnisius Elvan Swasono, S.Sos., M.Si.', 'Pembina', 11, 'Kasubdit Kerjasama Regional', 3, 'avatar.jpg'),
	(376, 'NIP', '528673', 'R. Tjandra Sulistyono', 'Letkol (Sus)', 0, 'Kasi Lembaga Non Pemerintah Subdit Kerjasama Regional', 3, 'avatar.jpg'),
	(377, 'NIP', '197910012014032001', 'Danny Dwi Wulandri, S.I.P.', 'Penata Muda Tk. I', 7, 'Kasi Lembaga Pemerintah Subdit Kerjasama Regional', 3, 'avatar.jpg'),
	(378, 'NIP', '198712252014031003', 'Kautsar Noorsito, S.IP.', 'Penata Muda Tk. I', 7, 'Analis Kerjasama', 3, 'avatar.jpg'),
	(379, 'NIP', '198809252018011001', 'Imana Hardy, S.IP.', 'Penata Muda', 6, 'Analis Kerjasama', 3, 'avatar.jpg'),
	(380, 'NIP', '199212152018012001', 'Mirza Dwiky Hermastuti, S.IP.', 'Penata Muda', 6, 'Penyusun Program dan Kegiatan', 3, 'avatar.jpg'),
	(381, 'NIP', '197411172000031001', 'Maulana Syahid, S.E., MPP.', 'Pembina', 11, 'Kasubdit Konvensi dan Resolusi Internasional', 3, 'avatar.jpg'),
	(382, 'NIP', '198902032014032001', 'Sasyabella Febriani, S.Sos.', 'Penata Muda Tk. I', 7, 'Kasi Resolusi Badan-Badan Internasional', 3, 'avatar.jpg'),
	(383, 'NIP', '199101022015032001', 'Hani Astirini Diyandra Putri, S.Sos., M.Si.', 'Penata Muda Tk. I', 7, 'Analis Kerjasama Luar Negeri             ', 3, 'avatar.jpg'),
	(384, 'NIP', '198902012018012001', 'Siti Syofiah, S.Kom.', 'Penata Muda', 6, 'Analis Data dan Informasi', 3, 'avatar.jpg'),
	(385, 'NIP', '199404092018012001', 'Udyahitani Secundaputeri, S.I.Kom.', 'Penata Muda', 6, 'Penyusun Program dan Kegiatan', 3, 'avatar.jpg'),
	(386, 'NRP', '72080765', 'Huntal Tambunan, S.Pd.', 'AKBP', 9, 'Kasi Konvensi Internasional', 1, 'avatar.jpg'),
	(387, 'NRP', '63121110', 'Drs. Suyoko Djunaedi, M.M.', 'AKBP', 9, 'Kasubdit Perlindungan WNI dan Kepentingan Nasional di Luar Neger', 1, 'avatar.jpg'),
	(388, 'NIP', '198705012014031001', 'Muhammad Randy Ramadhan, S.IP.', 'Penata Muda Tk. I', 7, 'Kasi Perlindungan WNI', 3, 'avatar.jpg'),
	(389, 'NIP', '198508092014031001', 'Nanda Fajar Aditya, S.Sos.', 'Penata Muda Tk. I', 7, 'Kasi Perlindungan Kepentingan Nasional di Luar Negeri', 3, 'avatar.jpg'),
	(390, 'NIP', '199503182018011001', 'Puja Sumantri, S.S.', 'Penata Muda', 6, 'Analis Kerjasama', 3, 'avatar.jpg'),
	(391, 'NIP', '199111092019022002', 'Shinta Tiur Novita', 'Penata Muda', 6, 'Analis Data Intelijen', 3, 'avatar.jpg'),
	(392, 'NIP', '198909162019021001', 'Fachmi Rochman', 'Penata Muda', 6, 'Analis Monitoring, Evaluasi dan Pelaporan ', 3, 'avatar.jpg'),
	(393, 'NIP', '198107212017010311057', 'Yudha Hartanto', 'PTT', 0, 'Staf Dit. PHI', 3, 'avatar.jpg'),
	(394, 'NIP', '197205261997031005', 'Andhika Chrisnayudhanto', 'Pembina Utama Muda  ', 13, 'Deputi Kerjasama Internasional', 3, 'avatar.jpg'),
	(395, 'NRP', '8716/P', 'Yuniar Ludfi', 'Brigjen TNI (Mar)', 13, 'Direktur Perangkat Hukum  Internasional', 1, 'avatar.jpg'),
	(396, 'NRP', '67060540', 'Drs. Kris Erlangga Aji Widjaya', 'Brigjen Pol', 13, 'Direktur Kerjasama Bilateral', 1, 'avatar.jpg'),
	(397, 'NIP', '197503232006042000', 'Suprih Sriwinarti, S.IP.', 'Penata Tk. I', 9, 'Kasubbag Tata Usaha Deputi III', 3, 'avatar.jpg'),
	(398, 'NIP', '198602102018012001', 'Siti Masyitoh, S.E.As', 'Penata Muda', 6, 'Pranata Kearsipan', 3, 'avatar.jpg'),
	(399, 'NIP', '199611032018121002', 'Achmad Sarifudin', 'CPNS Pengatur', 5, 'Pengelola Laporan Keuangan', 3, 'avatar.jpg'),
	(400, 'NIP', '199607152018121001', 'Dian Satriyono', 'CPNS Pengatur', 5, 'Pengelola Laporan Keuangan', 3, 'avatar.jpg'),
	(401, 'NIP', '199602262017010310040', 'Sadam Febrian', 'PTT', 0, 'Staff TU Deputi III', 3, 'avatar.jpg'),
	(402, 'NIP', '198112032017010311048', 'Suherlan', 'PTT', 0, 'Staf TU Deputi III', 3, 'avatar.jpg'),
	(403, 'NIP', '197404022017010321032', 'Dyah Ekowati', 'PTT', 0, 'Staf TU Deputi III ', 3, 'avatar.jpg'),
	(404, 'NIP', 'DE.1-PL.01.08/03/2018', 'Abdul Malik, M.Ag', '-', 0, 'Koordinator Divisi Penulisan dan Redaktur Pelaksana Pusat Media ', 1, 'avatar.jpg'),
	(405, 'NIP', 'DE.1-PL.01.08/04/2018', 'Novrika, SH', '-', 0, 'Koordinator Divisi Monitoring dan Analisa dan Wakil Redaktur Pel', 1, 'avatar.jpg'),
	(406, 'NIP', 'DE.1-PL.01.08/06/2018', 'Dr. M. Suaib Tahir', '-', 0, 'Anggota Divisi Penulisan', 1, 'avatar.jpg'),
	(407, 'NIP', 'DE.1-PL.01.08/07/2018', 'Budi Hartawan, S.Thi', '-', 0, 'Anggota Divisi Monitoring dan Analisa', 1, 'avatar.jpg'),
	(408, 'NIP', 'DE.1-PL.01.08/08/2018', 'Agus Sulaiman', '-', 0, 'Koordinator Divisi Media Rilis', 1, 'avatar.jpg'),
	(409, 'NIP', 'DE.1-PL.01.08/08/2018', 'Noor Irawan, SE', '-', 0, 'Anggota Divisi Media Rilis', 1, 'avatar.jpg'),
	(410, 'NIP', 'DE.1-PL.01.08/11/2018', 'Rahmat Hidayat, S.Sos', '-', 0, 'Koordinator Divisi Produksi Multimedia', 1, 'avatar.jpg'),
	(411, 'NIP', 'DE.1-PL.01.08/12/2018', 'Ari Wibowo, S. Ds', '-', 0, 'Anggota Divisi Produksi Multimedia', 1, 'avatar.jpg'),
	(412, 'NIP', 'DE.1-PL.01.08/13/2018', 'Clara Alferina Yuwono', '-', 0, 'Anggota Divisi Produksi Multimedia', 1, 'avatar.jpg'),
	(413, 'NIP', 'DE.1-PL.01.08/14/2018', 'Sefiana Putri Tingginehe, S.Sos', '-', 0, 'Anggota Divisi Produksi Multimedia', 1, 'avatar.jpg'),
	(414, 'NIP', 'DE.1-PL.01.08/15/2018', 'Rina Nur Aufa Arifin', '-', 0, 'Anggota Divisi Produksi Multimedia', 1, 'avatar.jpg'),
	(415, 'NIP', 'DE.1-PL.01.08/05/2019', 'Mila Darmayati', '-', 0, 'Anggota Divisi Produksi Multimedia', 1, 'avatar.jpg'),
	(416, 'NIP', 'DE.1-PL.01.08/30/2019', 'Ananda Al Ghivari M.', '-', 0, 'Anggota Divisi Produksi Multimedia', 1, 'avatar.jpg'),
	(417, 'NIP', 'DE.1-PL.01.08/17/2018', 'Muhammad Rizky', '-', 0, 'Koordinator Divisi Teknologi Informasi dan Media Sosial', 1, 'avatar.jpg'),
	(418, 'NIP', 'DE.1-PL.01.08/18/2018', 'Marsen Ades', '-', 0, 'Anggota Divisi Teknologi Informasi dan Media Sosial', 1, 'avatar.jpg'),
	(419, 'NIP', 'DE.1-PL.01.08/19/2018', 'Jenny Hana Sharon, S.Ikom', '-', 0, 'Anggota Divisi Teknologi Informasi dan Media Sosial', 1, 'avatar.jpg'),
	(420, 'NIP', 'DE.1-PL.01.08/21/2018', 'Rifki Fernanda ', '-', 0, 'Anggota Divisi Teknologi Informasi dan Media Sosial', 1, 'avatar.jpg'),
	(421, 'NIP', 'DE.1-PL.01.08/31/2019', 'Diamantin Rohadatul Aisy', '-', 0, 'Anggota Divisi Teknologi Informasi dan Media Sosial', 1, 'avatar.jpg'),
	(422, 'NIP', 'DE.1-PL.01.08/22/2018', 'Daniel Saroha,S. Ds', '-', 0, 'Koordinator Divisi Publikasi Cetak', 1, 'avatar.jpg'),
	(423, 'NIP', 'DE.1-PL.01.08/23/2018', 'Abdullah Al Mahdi', '-', 0, 'Anggota Divisi Publikasi Cetak', 1, 'avatar.jpg'),
	(424, 'NIP', 'DE.1-PL.01.08/24/2018', 'Nadine Christy', '-', 0, 'Anggota Divisi Publikasi Cetak', 1, 'avatar.jpg'),
	(425, 'NIP', 'DE.1-PL.01.08/13/2019', 'Servius Tumengkol', '-', 0, 'Anggota Operasional', 1, 'avatar.jpg'),
	(426, 'NIP', 'DE.1-PL.01.08/03/2019', 'Maulana Abdul Sidiq', '-', 0, 'Anggota Operasional', 1, 'avatar.jpg'),
	(427, 'NIP', 'DE.1-PL.01.08/33/2018', 'Muslimin Hafid, S. Kom', '-', 0, 'Anggota Divisi Pengkajian dan Penelitian', 1, 'avatar.jpg'),
	(428, 'NIP', 'DE.1-PL.01.08/02/2018', 'Muhammad Alfian', '-', 0, 'Anggota Divisi Pengkajian dan Penelitian', 1, 'avatar.jpg'),
	(429, 'NIP', 'DE.1-PL.01.08/04/2019', 'Andi Subhan Maggalatung', '-', 0, 'Anggota Divisi Pengkajian dan Penelitian', 1, 'avatar.jpg'),
	(430, 'NIP', 'DE.1-PL.01.08/31/2018', 'Andi Noor Fitrah Syarifin, S.Hi', '-', 0, 'Anggota Divisi Agama, Sosial dan Budaya', 1, 'avatar.jpg'),
	(431, 'NIP', 'DE.1-PL.01.08/35/2018', 'R. Indra Darmawan, S.Ak', '-', 0, 'Anggota Divisi Agama, Sosial dan Budaya', 1, 'avatar.jpg'),
	(432, 'NIP', 'DE.1-PL.01.08/42/2018', 'Muhammad Aras Prabowo', '-', 0, 'Anggota Bagian Keuangan Pemberdayaan Masyarakat', 1, 'avatar.jpg'),
	(433, 'NIP', 'DE.1-PL.01.08/36/2018', 'Firman Yoga Lesmana', '-', 0, 'Anggota Divisi Media Massa, Hukum dan Hubungan Masyarakat', 1, 'avatar.jpg'),
	(434, 'NIP', 'DE.1-PL.01.08/38/2018', 'Fachrudin', '-', 0, 'Anggota Divisi Pemuda dan Pendidikan', 1, 'avatar.jpg'),
	(435, 'NIP', 'DE.1-PL.01.08/34/2018', 'Herisyal Natsir Putra', '-', 0, 'Anggota Divisi Pemuda dan Pendidikan', 1, 'avatar.jpg'),
	(436, 'NIP', 'DE.1-PL.01.08/45/2018', 'Omardiano, SE', '-', 0, 'Anggota Divisi Perempuan dan Anak', 1, 'avatar.jpg'),
	(437, 'NIP', 'DE.1-PL.01.08/40/2018', 'Ida Isnani, S. Psi', '-', 0, 'Anggota Divisi Perempuan dan Anak', 1, 'avatar.jpg'),
	(438, 'NIP', 'DE.1-PL.01.08/39/2018', 'Etri Merdekawati, SE', '-', 0, 'Anggota Bagian Administrasi Pemberdayaan Masyarakat', 1, 'avatar.jpg'),
	(439, 'NIP', 'DE.1-PL.01.08/14/2019', 'Fauzhan', '-', 0, 'Anggota Bagian Administrasi Pemberdayaan Masyarakat', 1, 'avatar.jpg'),
	(440, 'NIP', 'DE.1-PL.01.08/43/2018', 'Samsul Hadi', '-', 0, 'Anggota Operator Forum Koordinasi Pencegahan Terorisme Center', 1, 'avatar.jpg'),
	(441, 'NIP', 'DE.1-PL.01.08/44/2018', 'Hafid Asad, S. Kom', '-', 0, 'Anggota Operator Forum Koordinasi Pencegahan Terorisme Center', 1, 'avatar.jpg'),
	(442, 'NIP', 'DE.1-PL.01.08/08/2019', 'Ivan Williandy, S.T.', '-', 0, 'Anggota Bagian Administrasi Pengamanan Objek Vital', 1, 'avatar.jpg'),
	(443, 'NIP', 'DE.1-PL.01.08/48/2018', 'Budi Sukarno, SE', '-', 0, 'Anggota Bagian Administrasi Pengamanan Transportasi', 1, 'avatar.jpg'),
	(444, 'NIP', 'DE.1-PL.01.08/49/2018', 'Abdul Rosyid, S.E.', '-', 0, 'Anggota Bagian Keuangan Pengamanan Transportasi', 1, 'avatar.jpg'),
	(445, 'NIP', 'DE.1-PL.01.08/50/2018', 'Aditya Ashabul Fiqhi, S.Sos', '-', 0, 'Anggota Keuangan Pengamanan Lingkungan Umum', 1, 'avatar.jpg'),
	(446, 'NIP', 'DE.1-PL.01.08/51/2018', 'Tri Indah Widya Ningsih, S.Psi', '-', 0, 'Anggota Administrasi Pengamanan Lingkungan Pemerintah', 1, 'avatar.jpg'),
	(447, 'NIP', 'DE.1-PL.01.08/55/2018', 'Totok Alqomar, SE', '-', 0, 'Anggota Bagian Keuangan Bina Dalam Masyarakat', 1, 'avatar.jpg'),
	(448, 'NIP', 'DE.1-PL.01.08/56/2018', 'Iwan Suhardiman, SE', '-', 0, 'Anggota Bagian Keuangan Bina Dalam Masyarakat', 1, 'avatar.jpg'),
	(449, 'NIP', 'DE.1-PL.01.08/88/2018', 'Ismail Fajar', '-', 0, 'Anggota Bagian Keuangan Bina Dalam Masyarakat', 1, 'avatar.jpg'),
	(450, 'NIP', 'DE.1-PL.01.08/30/2018', 'Muhammad Fahrur Rozi Nasution', '-', 0, 'Anggota Bagian Administrasi Bina Dalam Masyarakat', 1, 'avatar.jpg'),
	(451, 'NIP', 'DE.1-PL.01.08/57/2018', 'Agung Dwi Purnomo, S.T', '-', 0, 'Anggota Bagian Administrasi Bina Dalam Masyarakat', 1, 'avatar.jpg'),
	(452, 'NIP', 'DE.1-PL.01.08/15/2019', 'Rahmat Hidayat', '-', 0, 'Anggota Bagian Administrasi Bina Dalam Masyarakat', 1, 'avatar.jpg'),
	(453, 'NIP', 'DE.1-PL.01.08/64/2018', 'Aysha Rizki Ramadhyas, S.Sos', '-', 0, 'Anggota Divisi Pembinaan Agama, Wawasan Kebangsaan, dan Kewiraus', 1, 'avatar.jpg'),
	(454, 'NIP', 'DE.1-PL.01.08/67/2018', 'Chairunisya Harahap, S.Psi.', '-', 0, 'Anggota Divisi Pembinaan Agama, Wawasan Kebangsaan, dan Kewiraus', 1, 'avatar.jpg'),
	(455, 'NIP', 'DE.1-PL.01.08/63/2018', 'Saifudin Zuhri, S. Psi', '-', 0, 'Anggota Divisi Pembinaan Agama, Wawasan Kebangsaan, dan Kewiraus', 1, 'avatar.jpg'),
	(456, 'NIP', 'DE.1-PL.01.08/69/2018', 'Ridwan Amin, S.Sos.', '-', 0, 'Anggota Divisi Pembinaan Agama, Wawasan Kebangsaan, dan Kewiraus', 1, 'avatar.jpg'),
	(457, 'NIP', 'DE.1-PL.01.08/59/2018', 'Candima Setyasa, S.ST.', '-', 0, 'Anggota Bagian Administrasi Bina Masyarakat', 1, 'avatar.jpg'),
	(458, 'NIP', 'DE.1-PL.01.08/58/2018', 'Lintang Suproboningrum, S.IP., M.Si', '-', 0, 'Anggota Bagian Administrasi Bina Masyarakat', 1, 'avatar.jpg'),
	(459, 'NIP', 'DE.1-PL.01.08/65/2018', 'Muhammad Rizky Nur Kamrullah, S.Sos., M.Si', '-', 0, 'Anggota Divisi Pembinaan Agama, Wawasan Kebangsaan, dan Kewiraus', 1, 'avatar.jpg'),
	(460, 'NIP', 'DE.1-PL.01.08/10/2019', 'Lukman Hakim, S.H.', '-', 0, 'Koordinator Bagian Administrasi Bina Dalam Lembaga Pemasyarakata', 1, 'avatar.jpg'),
	(461, 'NIP', 'DE.1-PL.01.08/70/2018', 'Cornela Yosida Heatubun, S.E.', '-', 0, 'Anggota Bagian Administrasi Bina Dalam Lembaga Pemasyarakatan', 1, 'avatar.jpg'),
	(462, 'NIP', 'DE.1-PL.01.08/71/2018', 'Isnaeni Sangaji, S.S.', '-', 0, 'Anggota Divisi Rehabilitasi', 1, 'avatar.jpg'),
	(463, 'NIP', 'DE.1-PL.01.08/73/2018', 'Dewi Indri Rianti', '-', 0, 'Anggota Divisi Reintegrasi', 1, 'avatar.jpg'),
	(464, 'NIP', 'DE.1-PL.01.08/72/2018', 'Heru Yoga Gumelar, S.Pd', '-', 0, 'Anggota Divisi Reedukasi', 1, 'avatar.jpg'),
	(465, 'NIP', 'DE.1-PL.01.08/75/2018', 'Tutur Ahsanil Mustofa, M.Hum', '-', 0, 'Anggota Divisi Wawasan Keagamaan', 1, 'avatar.jpg'),
	(466, 'NIP', 'DE.1-PL.01.08/15/2019', 'Didin Syayidin', '-', 0, 'Anggota Divisi Wawasan Keagamaan', 1, 'avatar.jpg'),
	(467, 'NIP', 'DE.1-PL.01.08/77/2018', 'Indra Gunawan', '-', 0, 'Anggota Bagian Administrasi Bina Dalam Lembaga Pemasyarakatan Kh', 1, 'avatar.jpg'),
	(468, 'NIP', 'DE.1-PL.01.08/78/2018', 'Fades Setia Budi', '-', 0, 'Anggota Bagian Administrasi Bina Dalam Lembaga Pemasyarakatan Kh', 1, 'avatar.jpg'),
	(469, 'NIP', 'DE.1-PL.01.08/79/2018', 'Ditya Fajar Kurniawan', '-', 0, 'Anggota Bagian Administrasi Bina Dalam Lembaga Pemasyarakatan Kh', 1, 'avatar.jpg'),
	(470, 'NIP', 'DE.1-PL.01.08/80/2018', 'Agus Nawawi', '-', 0, 'Anggota Program Keagamaan', 1, 'avatar.jpg'),
	(471, 'NIP', 'DE.1-PL.01.08/81/2018', 'Bara Lintar Sangga Buana', '-', 0, 'Anggota Program Kewirausahaan', 1, 'avatar.jpg'),
	(472, 'NIP', 'DE.1-PL.01.08/82/2018', 'Moch. Arief Irvanto', '-', 0, 'Anggota Program Wawasan Kebangsaan', 1, 'avatar.jpg'),
	(473, 'NIP', 'DE.1-PL.01.08/83/2018', 'Devi Irma Wardani', '-', 0, 'Anggota Program Psikologi', 1, 'avatar.jpg'),
	(474, 'NIP', 'DE.1-PL.01.08/84/2018', 'Amalia Imroatul Azizah', '-', 0, 'Anggota Bagian Keuangan Bina Dalam Lembaga Pemasyarakatan Khusus', 1, 'avatar.jpg'),
	(475, 'NIP', 'DE.1-PL.01.08/85/2018', 'Auliana Farida', '-', 0, 'Anggota Bagian Keuangan Bina Dalam Lembaga Pemasyarakatan Khusus', 1, 'avatar.jpg'),
	(476, 'NIP', 'DE.1-PL.01.08/61/2018', 'Tommy Youdy Pioh', '-', 0, 'Anggota Bagian Administrasi Bina Dalam Masyarakat', 1, 'avatar.jpg'),
	(477, 'NIP', '584460', 'Jumadi ', '-', 0, 'BKO TNI ', 1, 'avatar.jpg'),
	(478, 'NIP', '21950020230574', 'Guntur Tantroman', '-', 0, 'BKO TNI ', 1, 'avatar.jpg'),
	(479, 'NIP', '19762/P', 'M. Sudeddy', '-', 0, 'BKO TNI ', 1, 'avatar.jpg'),
	(480, 'NIP', '3930411401070', 'Bambang Sutikno', '-', 0, 'BKO TNI ', 1, 'avatar.jpg'),
	(481, 'NIP', '21050282250484', 'Apriyanto', '-', 0, 'BKO TNI ', 1, 'avatar.jpg'),
	(482, 'NIP', '21040295050582', 'Yudi Nuryanto', '-', 0, 'BKO TNI ', 1, 'avatar.jpg'),
	(483, 'NIP', ' 532494', 'Yuda Satria', '-', 0, 'BKO TNI ', 1, 'avatar.jpg'),
	(484, 'NIP', '31970330650576', 'Darmadi ', '-', 0, 'BKO TNI ', 1, 'avatar.jpg'),
	(485, 'NIP', '31960398400575', 'Harmaji', '-', 0, 'BKO TNI ', 1, 'avatar.jpg'),
	(486, 'NIP', '31970333050876', 'Nurwahyudi', '-', 0, 'BKO TNI ', 1, 'avatar.jpg'),
	(487, 'NIP', '21120011241192', 'Budi Suryanto', '-', 0, 'BKO TNI ', 1, 'avatar.jpg'),
	(488, 'NIP', '31960324150675', 'Halipah Sangali', '-', 0, 'BKO TNI ', 1, 'avatar.jpg'),
	(489, 'NIP', '31980402591077', 'Anton Susilo', '-', 0, 'BKO TNI ', 1, 'avatar.jpg'),
	(490, 'NIP', '31990004761278', 'Sanusi, S.Kom', '-', 0, 'BKO TNI ', 1, 'avatar.jpg'),
	(491, 'NIP', '31980414480379', 'Mustopa Fahmi, S.Kom', '-', 0, 'BKO TNI ', 1, 'avatar.jpg'),
	(492, 'NIP', '31960413820576', 'Supriyadi', '-', 0, 'BKO TNI ', 1, 'avatar.jpg'),
	(493, 'NIP', '88892', 'Herianto', '-', 0, 'BKO TNI ', 1, 'avatar.jpg'),
	(494, 'NIP', '103481', 'Sujari', '-', 0, 'BKO TNI ', 1, 'avatar.jpg'),
	(495, 'NIP', '532903', 'Heralko', '-', 0, 'BKO TNI ', 1, 'avatar.jpg'),
	(496, 'NIP', '536994', 'Sunarno', '-', 0, 'BKO TNI ', 1, 'avatar.jpg');
/*!40000 ALTER TABLE `tb_pegawai` ENABLE KEYS */;

-- Dumping structure for table db_spd.tb_riil
CREATE TABLE IF NOT EXISTS `tb_riil` (
  `id_riil` int(11) NOT NULL,
  `id_spd` int(11) NOT NULL,
  `id_peg` int(11) NOT NULL,
  `id_rincian` int(11) NOT NULL,
  `id_satker` int(11) DEFAULT NULL,
  `id_user` varchar(100) NOT NULL DEFAULT '0',
  `uraian1` text NOT NULL,
  `uraian2` text NOT NULL,
  `uraian3` text NOT NULL,
  `uraian4` text NOT NULL,
  `jml1` double DEFAULT NULL,
  `jml2` double DEFAULT NULL,
  `jml3` double DEFAULT NULL,
  `jml4` double DEFAULT NULL,
  PRIMARY KEY (`id_riil`),
  KEY `FK_tb_riil_tb_spd` (`id_spd`),
  CONSTRAINT `FK_tb_riil_tb_spd` FOREIGN KEY (`id_spd`) REFERENCES `tb_spd` (`id_spd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_spd.tb_riil: ~0 rows (approximately)
DELETE FROM `tb_riil`;
/*!40000 ALTER TABLE `tb_riil` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_riil` ENABLE KEYS */;

-- Dumping structure for table db_spd.tb_rincian
CREATE TABLE IF NOT EXISTS `tb_rincian` (
  `id_rincian` int(11) NOT NULL,
  `id_spd` int(11) NOT NULL,
  `id_peg` int(11) NOT NULL,
  `id_user` varchar(50) NOT NULL DEFAULT '',
  `jml_inap` int(11) NOT NULL,
  `nilai_inap` double NOT NULL,
  `ket_inap` varchar(255) NOT NULL,
  `jml_berangkat` int(11) NOT NULL,
  `nilai_berangkat` double NOT NULL,
  `ket_berangkat` varchar(255) NOT NULL,
  `jml_kembali` int(11) NOT NULL,
  `nilai_kembali` double NOT NULL,
  `ket_kembali` varchar(255) NOT NULL,
  `jml_taxi_berangkat` int(11) NOT NULL,
  `nilai_taxi_berangkat` double NOT NULL,
  `ket_taxi_berangkat` varchar(255) NOT NULL,
  `jml_taxi_kembali` int(11) NOT NULL,
  `nilai_taxi_kembali` double NOT NULL,
  `ket_taxi_kembali` varchar(255) NOT NULL,
  `jml_harian` int(11) NOT NULL,
  `nilai_harian` double NOT NULL,
  `ket_harian` varchar(255) NOT NULL,
  `jml_harian1` int(11) NOT NULL,
  `nilai_harian1` double NOT NULL,
  `ket_harian1` varchar(255) NOT NULL,
  `jml_saku` int(11) NOT NULL,
  `nilai_saku` double NOT NULL,
  `ket_saku` varchar(255) NOT NULL,
  `jml_saku2` int(11) NOT NULL DEFAULT '0',
  `nilai_saku2` double NOT NULL DEFAULT '0',
  `ket_saku2` varchar(50) NOT NULL DEFAULT '0',
  `nilai_saku3` int(11) NOT NULL DEFAULT '0',
  `jml_saku3` double NOT NULL DEFAULT '0',
  `ket_saku3` varchar(50) NOT NULL DEFAULT '0',
  `uraian_lain` varchar(255) NOT NULL,
  `jml_lain` int(11) NOT NULL,
  `nilai_lain` double NOT NULL,
  `ket_lain` varchar(255) NOT NULL,
  `jml_pasport` int(11) NOT NULL,
  `nilai_pasport` double NOT NULL,
  `ket_pasport` varchar(255) NOT NULL,
  `jml_reprentasi` int(11) NOT NULL,
  `nilai_reprentasi` double NOT NULL,
  `ket_reprentasi` varchar(255) NOT NULL,
  `uang_muka` double NOT NULL,
  `total` double NOT NULL,
  `id_satker` int(11) DEFAULT NULL,
  `jml_harian2` double DEFAULT NULL,
  `nilai_harian2` double DEFAULT NULL,
  `ket_harian2` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_rincian`),
  KEY `FK_tb_rincian_tb_spd` (`id_spd`),
  CONSTRAINT `FK_tb_rincian_tb_spd` FOREIGN KEY (`id_spd`) REFERENCES `tb_spd` (`id_spd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_spd.tb_rincian: ~0 rows (approximately)
DELETE FROM `tb_rincian`;
/*!40000 ALTER TABLE `tb_rincian` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_rincian` ENABLE KEYS */;

-- Dumping structure for table db_spd.tb_satker
CREATE TABLE IF NOT EXISTS `tb_satker` (
  `id_satker` int(11) NOT NULL AUTO_INCREMENT,
  `satker` varchar(255) NOT NULL,
  `id_kpa` int(11) DEFAULT NULL,
  `id_ppk` int(11) DEFAULT NULL,
  `id_bendahara` int(11) DEFAULT NULL,
  `no_ppk` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_satker`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table db_spd.tb_satker: ~5 rows (approximately)
DELETE FROM `tb_satker`;
/*!40000 ALTER TABLE `tb_satker` DISABLE KEYS */;
INSERT INTO `tb_satker` (`id_satker`, `satker`, `id_kpa`, `id_ppk`, `id_bendahara`, `no_ppk`) VALUES
	(1, 'Deputi Bidang Pencegahan, Perlindungan, dan Deradikalisasi', 150, 217, 60, '1'),
	(2, 'Deputi Bidang Penindakan dan Pembinaan Kemampuan', 150, 339, 60, '2'),
	(3, 'Deputi Bidang Kerjasama Internasional', 150, 354, 60, '3'),
	(4, 'Sekretariat Utama', 150, 74, 60, '4');
/*!40000 ALTER TABLE `tb_satker` ENABLE KEYS */;

-- Dumping structure for table db_spd.tb_setup
CREATE TABLE IF NOT EXISTS `tb_setup` (
  `id_setup` int(11) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  PRIMARY KEY (`id_setup`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_spd.tb_setup: ~1 rows (approximately)
DELETE FROM `tb_setup`;
/*!40000 ALTER TABLE `tb_setup` DISABLE KEYS */;
INSERT INTO `tb_setup` (`id_setup`, `instansi`, `kota`, `alamat`) VALUES
	(1, 'BADAN NASIONAL PENANGGULANGAN TERORISME', 'REPUBLIK INDONESIA', '');
/*!40000 ALTER TABLE `tb_setup` ENABLE KEYS */;

-- Dumping structure for table db_spd.tb_spd
CREATE TABLE IF NOT EXISTS `tb_spd` (
  `id_spd` int(11) NOT NULL AUTO_INCREMENT,
  `nomor` varchar(64) NOT NULL,
  `tgl` date NOT NULL,
  `pegawai` int(11) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `asal` varchar(64) NOT NULL,
  `tujuan` int(11) NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `no_sprin` varchar(256) NOT NULL,
  `tgl_sprin` date NOT NULL,
  `satker` int(11) NOT NULL,
  `ta` int(11) NOT NULL,
  `ma` varchar(64) NOT NULL,
  `jenis_pengeluaran` varchar(64) NOT NULL,
  `kelengkapan` varchar(128) NOT NULL,
  `pejabat` varchar(128) NOT NULL,
  `tingkat_biaya` varchar(64) NOT NULL,
  `transport` int(11) NOT NULL,
  `pengikut` varchar(128) NOT NULL,
  `ket` varchar(255) NOT NULL,
  `semua_peg` varchar(255) NOT NULL,
  `id_satker` int(11) NOT NULL,
  `id_user` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_spd`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table db_spd.tb_spd: ~6 rows (approximately)
DELETE FROM `tb_spd`;
/*!40000 ALTER TABLE `tb_spd` DISABLE KEYS */;
INSERT INTO `tb_spd` (`id_spd`, `nomor`, `tgl`, `pegawai`, `keperluan`, `asal`, `tujuan`, `tgl_berangkat`, `tgl_kembali`, `no_sprin`, `tgl_sprin`, `satker`, `ta`, `ma`, `jenis_pengeluaran`, `kelengkapan`, `pejabat`, `tingkat_biaya`, `transport`, `pengikut`, `ket`, `semua_peg`, `id_satker`, `id_user`) VALUES
	(1, 'SPD-999/PPK.4/09/2019', '2019-09-30', 70, 'Pendampingan', 'Bogor', 8, '2019-09-30', '2019-09-30', 'SP-212/SU.00/2019', '2019-09-30', 4, 65, '5099.955.052.524111', 'Dalam Negeri', '', 'SEKRETARIS UTAMA BNPT', 'C', 1, '', '', '70', 4, 'keu1'),
	(2, 'SPD-999/PPK.1/09/2019', '2019-09-30', 262, 'Pendampingan', 'Bogor', 8, '2019-09-30', '2019-09-30', 'SP-313', '2019-09-30', 1, 62, '5096.005.052.524111', 'Dalam Negeri', '', 'SEKRETARIS UTAMA BNPT', 'C', 1, '', '', '262', 1, 'kontra1'),
	(3, 'SPD-999/PPK.2/09/2019', '2019-09-30', 338, 'Pengawasan', 'Bogor', 8, '2019-09-30', '2019-09-30', 'SP-414', '2019-09-30', 2, 63, '5098.052.524111', 'Dalam Negeri', '', 'SEKRETARIS UTAMA BNPT', 'C', 1, '', '', '338', 2, 'ti1'),
	(4, 'SPD-999/PPK.3/09/2019', '2019-09-30', 399, 'Forum', 'Jakarta', 46, '2019-09-30', '2019-09-30', 'SP-717', '2019-09-30', 3, 64, '5098.052.524219', 'Luar Negeri', '', 'KEPALA BNPT', 'C', 1, '', '', '399', 3, 'amerop1'),
	(5, 'SPD-1001/PPK.4/10/2019', '2019-10-01', 130, 'Melaksanakan Pemantauan Kegiatan Rembuk Aparatur Kelurahan dan Desa tentang Literasi Informasi melalui FKPT DKI Jakarta di Jakarta Selatan', 'Bogor', 8, '2019-10-02', '2019-10-04', 'PW.01.01.00/..../2019', '2019-10-01', 4, 65, '5729.965.052.524111', 'Dalam Negeri', '', 'SEKRETARIS UTAMA BNPT', 'C', 1, '131', '', '130,131', 4, 'inspek1'),
	(6, 'SPD-1000/PPK.4/09/2019', '2019-09-30', 140, 'MELAKSANAKAN PEMANTAUAN KEGIATAN MONITORING DAN EVALUASI SOP PENANGANAN AKSI TEROR DI SATUAN PENDIDIKAN KERJASAMA/ SEKOLAH INTERNASIONAL DI BANDUNG, JAWA BARAT', 'Bogor', 7, '2019-10-02', '2019-10-04', 'PW.01.01.00/........./2019', '2019-09-30', 4, 65, '5729.965.052.524111', 'DALAM NEGERI', '', 'SEKRETARIS UTAMA', 'D', 1, '142', '', '140,142', 4, 'inspek1');
/*!40000 ALTER TABLE `tb_spd` ENABLE KEYS */;

-- Dumping structure for table db_spd.tb_ta
CREATE TABLE IF NOT EXISTS `tb_ta` (
  `id_ta` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` varchar(4) NOT NULL,
  `pagu_ln` double NOT NULL,
  `pagu_dn` double NOT NULL,
  `pagu_dk` double NOT NULL,
  `id_satker` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ta`),
  KEY `FK_tb_ta_tb_satker` (`id_satker`),
  CONSTRAINT `FK_tb_ta_tb_satker` FOREIGN KEY (`id_satker`) REFERENCES `tb_satker` (`id_satker`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

-- Dumping data for table db_spd.tb_ta: ~4 rows (approximately)
DELETE FROM `tb_ta`;
/*!40000 ALTER TABLE `tb_ta` DISABLE KEYS */;
INSERT INTO `tb_ta` (`id_ta`, `tahun`, `pagu_ln`, `pagu_dn`, `pagu_dk`, `id_satker`) VALUES
	(62, '2019', 1000000000, 1000000000, 1000000000, 1),
	(63, '2019', 1000000000, 1000000000, 1000000000, 2),
	(64, '2019', 1000000000, 1000000000, 1000000000, 3),
	(65, '2019', 1000000000, 1000000000, 1000000000, 4);
/*!40000 ALTER TABLE `tb_ta` ENABLE KEYS */;

-- Dumping structure for table db_spd.tb_transport
CREATE TABLE IF NOT EXISTS `tb_transport` (
  `id_transport` int(11) NOT NULL,
  `transport` varchar(32) NOT NULL,
  PRIMARY KEY (`id_transport`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_spd.tb_transport: ~3 rows (approximately)
DELETE FROM `tb_transport`;
/*!40000 ALTER TABLE `tb_transport` DISABLE KEYS */;
INSERT INTO `tb_transport` (`id_transport`, `transport`) VALUES
	(1, 'Darat'),
	(2, 'Laut'),
	(3, 'Udara');
/*!40000 ALTER TABLE `tb_transport` ENABLE KEYS */;

-- Dumping structure for table db_spd.tb_ttdkwitansi
CREATE TABLE IF NOT EXISTS `tb_ttdkwitansi` (
  `id_ttdkwitansi` int(11) NOT NULL AUTO_INCREMENT,
  `teks1` text NOT NULL,
  `id_peg1` int(11) NOT NULL,
  `teks2` text NOT NULL,
  `id_peg2` int(11) NOT NULL,
  `id_satker` int(11) NOT NULL,
  PRIMARY KEY (`id_ttdkwitansi`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

-- Dumping data for table db_spd.tb_ttdkwitansi: ~5 rows (approximately)
DELETE FROM `tb_ttdkwitansi`;
/*!40000 ALTER TABLE `tb_ttdkwitansi` DISABLE KEYS */;
INSERT INTO `tb_ttdkwitansi` (`id_ttdkwitansi`, `teks1`, `id_peg1`, `teks2`, `id_peg2`, `id_satker`) VALUES
	(73, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 217, 'BENDAHARA PENGELUARAN SATKER', 60, 1),
	(74, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 339, 'BENDAHARA PENGELUARAN SATKER', 60, 2),
	(75, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 354, 'BENDAHARA PENGELUARAN SATKER', 60, 3),
	(76, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 74, 'BENDAHARA PENGELUARAN SATKER', 60, 4),
	(77, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 74, 'BENDAHARA PENGELUARAN SATKER', 60, 5);
/*!40000 ALTER TABLE `tb_ttdkwitansi` ENABLE KEYS */;

-- Dumping structure for table db_spd.tb_ttdnominatif
CREATE TABLE IF NOT EXISTS `tb_ttdnominatif` (
  `id_ttdnominatif` int(11) NOT NULL AUTO_INCREMENT,
  `teks1` text NOT NULL,
  `id_peg1` int(11) NOT NULL,
  `teks2` text NOT NULL,
  `id_peg2` int(11) NOT NULL,
  `id_satker` int(11) NOT NULL,
  PRIMARY KEY (`id_ttdnominatif`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

-- Dumping data for table db_spd.tb_ttdnominatif: ~5 rows (approximately)
DELETE FROM `tb_ttdnominatif`;
/*!40000 ALTER TABLE `tb_ttdnominatif` DISABLE KEYS */;
INSERT INTO `tb_ttdnominatif` (`id_ttdnominatif`, `teks1`, `id_peg1`, `teks2`, `id_peg2`, `id_satker`) VALUES
	(63, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 217, 'BENDAHARA PENGELUARAN SATKER', 60, 1),
	(64, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 339, 'BENDAHARA PENGELUARAN SATKER', 60, 2),
	(65, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 354, 'BENDAHARA PENGELUARAN SATKER', 60, 3),
	(66, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 74, 'BENDAHARA PENGELUARAN SATKER', 60, 4),
	(67, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 74, 'BENDAHARA PENGELUARAN SATKER', 60, 5);
/*!40000 ALTER TABLE `tb_ttdnominatif` ENABLE KEYS */;

-- Dumping structure for table db_spd.tb_ttdriil
CREATE TABLE IF NOT EXISTS `tb_ttdriil` (
  `id_ttdriil` int(11) NOT NULL AUTO_INCREMENT,
  `teks` text NOT NULL,
  `id_peg` int(11) NOT NULL,
  `id_satker` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ttdriil`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

-- Dumping data for table db_spd.tb_ttdriil: ~5 rows (approximately)
DELETE FROM `tb_ttdriil`;
/*!40000 ALTER TABLE `tb_ttdriil` DISABLE KEYS */;
INSERT INTO `tb_ttdriil` (`id_ttdriil`, `teks`, `id_peg`, `id_satker`) VALUES
	(63, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 217, 1),
	(64, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 339, 2),
	(65, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 354, 3),
	(66, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 74, 4),
	(67, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 74, 5);
/*!40000 ALTER TABLE `tb_ttdriil` ENABLE KEYS */;

-- Dumping structure for table db_spd.tb_ttdrincian
CREATE TABLE IF NOT EXISTS `tb_ttdrincian` (
  `id_ttdrincian` int(11) NOT NULL AUTO_INCREMENT,
  `teks1` text NOT NULL,
  `id_peg1` int(11) NOT NULL,
  `teks2` text NOT NULL,
  `id_peg2` int(11) NOT NULL,
  `id_satker` int(11) NOT NULL,
  PRIMARY KEY (`id_ttdrincian`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

-- Dumping data for table db_spd.tb_ttdrincian: ~5 rows (approximately)
DELETE FROM `tb_ttdrincian`;
/*!40000 ALTER TABLE `tb_ttdrincian` DISABLE KEYS */;
INSERT INTO `tb_ttdrincian` (`id_ttdrincian`, `teks1`, `id_peg1`, `teks2`, `id_peg2`, `id_satker`) VALUES
	(63, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 217, 'BENDAHARA PENGELUARAN SATKER', 60, 1),
	(64, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 339, 'BENDAHARA PENGELUARAN SATKER', 60, 2),
	(65, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 354, 'BENDAHARA PENGELUARAN SATKER', 60, 3),
	(66, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 74, 'BENDAHARA PENGELUARAN SATKER', 60, 4),
	(67, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 74, 'BENDAHARA PENGELUARAN SATKER', 60, 5);
/*!40000 ALTER TABLE `tb_ttdrincian` ENABLE KEYS */;

-- Dumping structure for table db_spd.tb_ttdspd
CREATE TABLE IF NOT EXISTS `tb_ttdspd` (
  `id_ttdspd` int(11) NOT NULL AUTO_INCREMENT,
  `teks` text NOT NULL,
  `id_peg` int(11) NOT NULL,
  `id_satker` int(11) NOT NULL,
  PRIMARY KEY (`id_ttdspd`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

-- Dumping data for table db_spd.tb_ttdspd: ~5 rows (approximately)
DELETE FROM `tb_ttdspd`;
/*!40000 ALTER TABLE `tb_ttdspd` DISABLE KEYS */;
INSERT INTO `tb_ttdspd` (`id_ttdspd`, `teks`, `id_peg`, `id_satker`) VALUES
	(63, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 217, 1),
	(64, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 339, 2),
	(65, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 354, 3),
	(66, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 74, 4),
	(67, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 74, 5);
/*!40000 ALTER TABLE `tb_ttdspd` ENABLE KEYS */;

-- Dumping structure for table db_spd.tb_ttdspd2
CREATE TABLE IF NOT EXISTS `tb_ttdspd2` (
  `id_ttdspd2` int(11) NOT NULL AUTO_INCREMENT,
  `teks1` text NOT NULL,
  `id_peg1` int(11) NOT NULL,
  `teks2` text NOT NULL,
  `id_peg2` int(11) NOT NULL,
  `id_satker` int(11) NOT NULL,
  PRIMARY KEY (`id_ttdspd2`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

-- Dumping data for table db_spd.tb_ttdspd2: ~5 rows (approximately)
DELETE FROM `tb_ttdspd2`;
/*!40000 ALTER TABLE `tb_ttdspd2` DISABLE KEYS */;
INSERT INTO `tb_ttdspd2` (`id_ttdspd2`, `teks1`, `id_peg1`, `teks2`, `id_peg2`, `id_satker`) VALUES
	(63, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 217, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 217, 1),
	(64, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 339, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 339, 2),
	(65, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 354, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 354, 3),
	(66, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 74, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 74, 4),
	(67, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 74, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 74, 5);
/*!40000 ALTER TABLE `tb_ttdspd2` ENABLE KEYS */;

-- Dumping structure for table db_spd.tb_tujuan
CREATE TABLE IF NOT EXISTS `tb_tujuan` (
  `id_tujuan` int(11) NOT NULL,
  `tujuan` varchar(64) NOT NULL,
  `jenis` varchar(64) NOT NULL,
  `harian` double NOT NULL,
  `saku` double NOT NULL,
  `inap` double NOT NULL,
  `meeting` double NOT NULL,
  `taksi` double NOT NULL,
  `transport` double NOT NULL,
  `lain` double NOT NULL,
  PRIMARY KEY (`id_tujuan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_spd.tb_tujuan: ~53 rows (approximately)
DELETE FROM `tb_tujuan`;
/*!40000 ALTER TABLE `tb_tujuan` DISABLE KEYS */;
INSERT INTO `tb_tujuan` (`id_tujuan`, `tujuan`, `jenis`, `harian`, `saku`, `inap`, `meeting`, `taksi`, `transport`, `lain`) VALUES
	(1, 'Denpasar', 'Dalam Negeri', 480000, 450000, 910000, 160000, 159000, 3262000, 0),
	(3, 'Surabaya', 'Dalam Negeri', 410000, 140000, 664000, 1352000, 194000, 2674000, 0),
	(4, 'Makassar', 'Dalam Negeri', 430000, 150000, 665000, 1127000, 145000, 3829000, 0),
	(6, 'Semarang', 'Dalam Negeri', 370000, 130000, 486000, 675000, 75000, 2182000, 0),
	(7, 'Bandung', 'Dalam Negeri', 430000, 150000, 570000, 822000, 166000, 500000, 0),
	(8, 'Jakarta', 'Dalam Negeri', 530000, 180000, 610000, 1197000, 650000, 4500000, 550000),
	(9, 'Medan', 'Dalam Negeri', 370000, 130000, 530000, 746000, 232000, 3808000, 0),
	(10, 'Jambi', 'Dalam Negeri', 370000, 130000, 520000, 840000, 147000, 2460000, 0),
	(11, 'Samarinda', 'Dalam Negeri', 430000, 150000, 804000, 750000, 450000, 2995000, 0),
	(12, 'Pontianak', 'Dalam Negeri', 380000, 130000, 538000, 664000, 135000, 2781000, 0),
	(13, 'Jayapura', 'Dalam Negeri', 580000, 160000, 829000, 990000, 431000, 8193000, 0),
	(17, 'Lombok', 'Dalam Negeri', 440000, 150000, 580000, 764000, 231000, 3230000, 0),
	(18, 'Ambon', 'Dalam Negeri', 380000, 120000, 667000, 724000, 240000, 7081000, 0),
	(19, 'Malaysia', 'Luar Negeri', 1380000, 0, 4250000, 0, 0, 7500000, 600000),
	(20, 'Filipina', 'Luar Negeri', 1080000, 0, 0, 0, 0, 7500000, 0),
	(21, 'Jepang', 'Luar Negeri', 2250000, 0, 0, 0, 0, 7500000, 0),
	(22, 'Thailand', 'Luar Negeri', 2250000, 0, 5000000, 0, 0, 7500000, 600000),
	(23, 'Cilacap', 'Dalam Kota', 430000, 150000, 570000, 822000, 166000, 500000, 0),
	(24, 'India', 'Luar Negeri', 550000, 0, 2500000, 0, 0, 4000000, 600000),
	(26, 'Serang', 'Dalam Negeri', 370000, 120000, 718000, 837000, 446000, 500000, 0),
	(27, 'Semarang - Solo', 'Dalam Negeri', 370000, 130000, 486000, 675000, 75000, 2182000, 0),
	(28, 'Palu', 'Dalam Negeri', 360000, 130000, 951000, 738000, 0, 0, 0),
	(29, 'Pakanbaru', 'Dalam Negeri', 380000, 150000, 650000, 600000, 150000, 2800000, 0),
	(30, 'Aceh', 'Dalam Negeri', 0, 0, 0, 0, 0, 0, 0),
	(31, 'Palangkaraya', 'Dalam Negeri', 0, 0, 0, 0, 0, 0, 0),
	(32, 'Manado', 'Dalam Negeri', 0, 0, 0, 0, 0, 0, 0),
	(33, 'Ternate', 'Dalam Negeri', 0, 0, 0, 0, 0, 0, 0),
	(34, 'Gorontalo', 'Dalam Negeri', 0, 0, 0, 0, 0, 0, 0),
	(35, 'Yogyakarta', 'Dalam Negeri', 0, 0, 0, 0, 0, 0, 0),
	(36, 'Kendari', 'Dalam Negeri', 0, 0, 0, 0, 0, 0, 0),
	(37, 'Manokwari', 'Dalam Negeri', 0, 0, 0, 0, 0, 0, 0),
	(38, 'Bandar Lampung', 'Dalam Negeri', 0, 0, 0, 0, 0, 0, 0),
	(39, 'Kupang', 'Dalam Negeri', 0, 0, 0, 0, 0, 0, 0),
	(40, 'Solo', 'Dalam Negeri', 0, 0, 0, 0, 0, 0, 0),
	(41, 'Malang', 'Dalam Negeri', 0, 0, 0, 0, 0, 0, 0),
	(42, 'Cirebon', 'Dalam Negeri', 0, 0, 0, 0, 0, 0, 0),
	(43, 'Banjarmasin', 'Dalam Negeri', 0, 0, 0, 0, 0, 0, 0),
	(44, 'Uni Emirat Arab', 'Luar Negeri', 0, 0, 0, 0, 0, 0, 0),
	(45, 'Singapura', 'Luar Negeri', 0, 0, 0, 0, 0, 0, 0),
	(46, 'Amerika Serikat', 'Luar Negeri', 0, 0, 0, 0, 0, 0, 0),
	(47, 'Kanada', 'Luar Negeri', 0, 0, 0, 0, 0, 0, 0),
	(48, 'Belanda', 'Luar Negeri', 0, 0, 0, 0, 0, 0, 0),
	(49, 'Jerman', 'Luar Negeri', 0, 0, 0, 0, 0, 0, 0),
	(50, 'Perancis', 'Luar Negeri', 0, 0, 0, 0, 0, 0, 0),
	(51, 'Inggris', 'Luar Negeri', 0, 0, 0, 0, 0, 0, 0),
	(52, 'Rusia', 'Luar Negeri', 0, 0, 0, 0, 0, 0, 0),
	(53, 'Mesir', 'Luar Negeri', 0, 0, 0, 0, 0, 0, 0),
	(54, 'Tiongkok', 'Luar Negeri', 0, 0, 0, 0, 0, 0, 0),
	(55, 'Myanmar', 'Luar Negeri', 0, 0, 0, 0, 0, 0, 0),
	(56, 'Vietnam', 'Luar Negeri', 0, 0, 0, 0, 0, 0, 0),
	(57, 'Brunei Darussalam', 'Luar Negeri', 0, 0, 0, 0, 0, 0, 0),
	(58, 'Bogor', 'Dalam Kota', 150000, 0, 0, 0, 150000, 0, 0),
	(59, 'Palembang', 'Dalam Negeri', 380000, 180000, 650000, 550000, 345000, 1500000, 0),
	(60, 'Batam', 'Dalam Negeri', 380000, 250000, 750000, 750000, 300000, 2000000, 0),
	(61, 'Bengkulu', 'Dalam Negeri', 380000, 300000, 750000, 800000, 350000, 1800000, 0),
	(62, 'Pangkalpinang', 'Dalam Negeri', 380000, 300000, 700000, 800000, 345000, 1500000, 0),
	(63, 'Padang', 'Dalam Negeri', 380000, 250000, 700000, 800000, 345000, 2500000, 0),
	(64, 'Tanjungpinang', 'Dalam Negeri', 380000, 250000, 750000, 800000, 345000, 2500000, 0),
	(65, 'Brazil', 'Luar Negeri', 15000000, 0, 0, 0, 0, 0, 0);
/*!40000 ALTER TABLE `tb_tujuan` ENABLE KEYS */;

-- Dumping structure for table db_spd.tb_user
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` varchar(32) NOT NULL,
  `id_satker` int(11) NOT NULL,
  `nama_user` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hak_akses` varchar(16) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_spd.tb_user: ~59 rows (approximately)
DELETE FROM `tb_user`;
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
INSERT INTO `tb_user` (`id_user`, `id_satker`, `nama_user`, `password`, `hak_akses`, `avatar`) VALUES
	('amerop1', 3, 'amerop1', 'b609e33f3928e2cdfbfb8bc502fbf8e2', 'Admin', ''),
	('amerop2', 3, 'amerop2', 'b9703ebfc5f375a1f03332d0907d6ecc', 'Admin', ''),
	('anev1', 2, 'anev1', '39aff8bae50f92cb1c79afb05177fc36', 'Admin', ''),
	('anev2', 2, 'anev2', 'e52521738ee1440c2596780ffa782326', 'Admin', ''),
	('aspasaf1', 3, 'aspasaf1', '366c6596cd064c4ca05099a7b6cbb8aa', 'Admin', ''),
	('aspasaf2', 3, 'aspasaf2', '5f067d80c409afece392f4aa430f8de8', 'Admin', ''),
	('binlapsus1', 1, 'binlapsus1', '65019b630b365b1ad93ef1c809b9b974', 'Admin', ''),
	('binlapsus2', 1, 'binlapsus2', '37b1705f5a41b02be8a1ee6677693696', 'Admin', ''),
	('binmas1', 1, 'binmas1', 'd0c17d1235f8e0d29df0d532b816ac4c', 'Admin', ''),
	('binmas2', 1, 'binmas2', '0e2faaadf691861d26852797f02d7e9b', 'Admin', ''),
	('dalpas1', 1, 'dalpas1', '58d6a839383292362ad6bd9f10afc11a', 'Admin', ''),
	('dalpas2', 1, 'dalpas2', 'a4336599bcf34f9d95aa3f6c6cf8cecb', 'Admin', ''),
	('dapel1', 4, 'dapel1', '60216cd447acf3e058ce544d073285da', 'Admin', ''),
	('dapel2', 4, 'dapel2', '6f0de323e577feb2aaa258f3de9a182f', 'Admin', ''),
	('gunkuat1', 2, 'gunkuat1', '1cf5ff546ddcabc720ceb86f32effb67', 'Admin', ''),
	('gunkuat2', 2, 'gunkuat2', 'f1f74a5cb1bb9267e39d8a3e8c903163', 'Admin', ''),
	('hubal1', 2, 'hubal1', 'cb00c60e9e385cb77b1040d645319a36', 'Admin', ''),
	('hubal2', 2, 'hubal2', '77f4425d06902d382751e0f82180d177', 'Admin', ''),
	('humas1', 4, 'humas1', '466d5509d2c838e8134d5a8fc76e2012', 'Admin', ''),
	('humas2', 4, 'humas2', 'b182ff84acb590050e63c5c4b528c284', 'Admin', ''),
	('inspek1', 4, 'inspek1', 'e82f7387a5f5ab19d758869f9db05899', 'Admin', ''),
	('inspek2', 4, 'inspek2', '981d03e3345a79535007882d21dbd56c', 'Admin', ''),
	('intel1', 2, 'intel1', '71352efa0205387452f474db71bac1b6', 'Admin', ''),
	('intel2', 2, 'intel2', 'fd4e090300e37948fa8232a5118d4496', 'Admin', ''),
	('kepeg1', 4, 'kepeg1', '1d10d87459a9940a4ab4c1e54c7c7a62', 'Admin', ''),
	('kepeg2', 4, 'kepeg2', 'c4ef62c15fac841210e8134d9d0923d5', 'Admin', ''),
	('keu1', 4, 'keu1', '5770e45fbf5e96d5d67459b8b985a816', 'Admin', ''),
	('keu2', 4, 'keu2', 'e26749bc7b1869f52c4d8f6cfb6d269b', 'Admin', ''),
	('kontra1', 1, 'kontra1', 'f26358a8a15032d8bbf2e01d9954210a', 'Admin', ''),
	('kontra2', 1, 'kontra2', 'dabd2e81cde1693502ba0e9d0b4e4704', 'Admin', ''),
	('konvensi1', 3, 'konvensi1', '1db1911c1f6365574608b8959d88e7c5', 'Admin', ''),
	('konvensi2', 3, 'konvensi2', '790c5259673504053db96bd6c97b06ed', 'Admin', ''),
	('korban1', 1, 'korban1', '57bbfe6fddce8ee96f248b0341de4e72', 'Admin', ''),
	('korban2', 1, 'korban2', '2d4a8632b60ad1817a158f4d4a8fd897', 'Admin', ''),
	('latih1', 2, 'latih1', 'c8a2e98ec4c936127d5dd8851012cb73', 'Admin', ''),
	('latih2', 2, 'latih2', 'dfb568330e20dc21f278d5f3d9314910', 'Admin', ''),
	('linkum1', 2, 'linkum1', '7cbef744cca52db28f08cf94d69cf47d', 'Admin', ''),
	('linkum2', 2, 'linkum2', 'b50ffdaac4365056fdb88f6eb611e8c5', 'Admin', ''),
	('multi1', 3, 'multi1', '95497fe25ed35dbd8075a48858a1ecdd', 'Admin', ''),
	('multi2', 3, 'multi2', '5bc6ed268ab6488270e496d3183a1a27', 'Admin', ''),
	('obvit1', 1, 'obvit1', '84c2adadac8d630cf59d8546b3083f0e', 'Admin', ''),
	('obvit2', 1, 'obvit2', '1d21bddecc58df09081caa9835a53e72', 'Admin', ''),
	('pamling1', 1, 'pamling1', '8ec47a1a974c567df1cc5f7c5aa2eff9', 'Admin', ''),
	('pamling2', 1, 'pamling2', '39ca682151cdb91321d30ff24250a674', 'Admin', ''),
	('pemkat1', 1, 'pemkat1', '386fb5ff82ab73f60ac66f4231f1743d', 'Admin', ''),
	('pemkat2', 1, 'pemkat2', '68c372da7039b874f1f9fbd6917f7fd2', 'Admin', ''),
	('pengawasan1', 1, 'pengawasan1', '5845f6918771a2d1251089559568d980', 'Admin', ''),
	('pengawasan2', 1, 'pengawasan2', '1cf0a34734a38764c372d3cd905811eb', 'Admin', ''),
	('pwni1', 3, 'pwni1', 'f4339e153adf2f529872ae11e82e9278', 'Admin', ''),
	('pwni2', 3, 'pwni2', '419e84668b9be0992ee2582398d13c67', 'Admin', ''),
	('regional1', 3, 'regional1', 'deab73b953f7e13e35f9fc5a95e70ef7', 'Admin', ''),
	('regional2', 3, 'regional2', '51c09e1234507262efdf756c5a1ad60a', 'Admin', ''),
	('ren1', 4, 'ren1', '553a6b235f34942cb94875bba4e01017', 'Admin', ''),
	('ren2', 4, 'ren2', 'f6228df5fc4fc6683b1e9612311866d7', 'Admin', ''),
	('rumga1', 4, 'rumga1', '610bb17e7e7e01deca286ba285a5ab61', 'Admin', ''),
	('rumga2', 4, 'rumga2', 'f3575c6d1825b57bba6d9fd94aa357f6', 'Admin', ''),
	('siaga1', 2, 'siaga1', '6b8f1c6f0692e5d70bc518e6e5e05fa9', 'Admin', ''),
	('siaga2', 2, 'siaga2', '56149e43a2e909a6d307b8ed67cabac4', 'Admin', ''),
	('sisop1', 2, 'sisop1', '8c450b4a8740b77bf3c2e48b4bb74534', 'Admin', ''),
	('sisop2', 2, 'sisop2', '1e4fb4b87286f6fe1180912281ff4054', 'Admin', ''),
	('superadmin', 4, 'Edi Setiawan', '629ab14fab772d78a58eea752bdfc0dc', 'Superadmin', ''),
	('ti1', 2, 'ti1', 'c7cac60d751e5a8bab5a6b9890da731d', 'Admin', ''),
	('ti2', 2, 'ti2', '1c3a26dcbd4fab5da9c8d0a0baa399ab', 'Admin', '');
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;

-- Dumping structure for trigger db_spd.tb_satker_after_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `tb_satker_after_insert` AFTER INSERT ON `tb_satker` FOR EACH ROW BEGIN
DELETE FROM tb_ttdkwitansi where id_satker = NEW.id_satker;
INSERT INTO tb_ttdkwitansi (`teks1`, `id_peg1`, `teks2`, `id_peg2`, `id_satker`) 
    VALUES ('a.n. KUASA PENGGUNA ANGGARAN<br />
PEJABAT PEMBUAT KOMITMEN', NEW.id_ppk, 'BENDAHARA PENGELUARAN SATKER', NEW.id_bendahara, NEW.id_satker);

DELETE FROM tb_ttdnominatif where id_satker = NEW.id_satker;
INSERT INTO tb_ttdnominatif (`teks1`, `id_peg1`, `teks2`, `id_peg2`, `id_satker`) 
    VALUES ('a.n. KUASA PENGGUNA ANGGARAN<br />
PEJABAT PEMBUAT KOMITMEN', NEW.id_ppk, 'BENDAHARA PENGELUARAN SATKER', NEW.id_bendahara, NEW.id_satker);

DELETE FROM tb_ttdriil where id_satker = NEW.id_satker;
INSERT INTO tb_ttdriil (`teks`, `id_peg`, `id_satker`) 
    VALUES ('a.n. KUASA PENGGUNA ANGGARAN<br />
PEJABAT PEMBUAT KOMITMEN', NEW.id_ppk, NEW.id_satker);

DELETE FROM tb_ttdrincian where id_satker = NEW.id_satker;
INSERT INTO tb_ttdrincian (`teks1`, `id_peg1`, `teks2`, `id_peg2`, `id_satker`) 
    VALUES ('a.n. KUASA PENGGUNA ANGGARAN<br />
PEJABAT PEMBUAT KOMITMEN', NEW.id_ppk, 'BENDAHARA PENGELUARAN SATKER', NEW.id_bendahara, NEW.id_satker);

DELETE FROM tb_ttdspd2 where id_satker = NEW.id_satker;
INSERT INTO tb_ttdspd2 (`teks1`, `id_peg1`, `teks2`, `id_peg2`, `id_satker`) 
    VALUES ('a.n. KUASA PENGGUNA ANGGARAN<br />
PEJABAT PEMBUAT KOMITMEN', NEW.id_ppk, 'a.n. KUASA PENGGUNA ANGGARAN<br />
PEJABAT PEMBUAT KOMITMEN', NEW.id_ppk, NEW.id_satker);

DELETE FROM tb_ttdspd where id_satker = NEW.id_satker;
INSERT INTO tb_ttdspd (`teks`, `id_peg`, `id_satker`) 
    VALUES ('a.n. KUASA PENGGUNA ANGGARAN<br />
PEJABAT PEMBUAT KOMITMEN', NEW.id_ppk, NEW.id_satker);

INSERT INTO tb_ta (`tahun`, `pagu_ln`, `pagu_dn`, `pagu_dk`, `id_satker`) VALUES (YEAR(CURDATE()), '0', '0', '0', NEW.id_satker);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_spd.tb_satker_after_update
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `tb_satker_after_update` AFTER UPDATE ON `tb_satker` FOR EACH ROW BEGIN

 
UPDATE tb_ttdkwitansi A SET A.id_peg1 = NEW.id_ppk, A.id_peg2= NEW.id_bendahara WHERE A.id_satker = NEW.id_satker;
UPDATE tb_ttdnominatif A SET A.id_peg1 = NEW.id_ppk, A.id_peg2= NEW.id_bendahara WHERE A.id_satker = NEW.id_satker;
UPDATE tb_ttdrincian A SET A.id_peg1 = NEW.id_ppk, A.id_peg2= NEW.id_bendahara WHERE A.id_satker = NEW.id_satker;
UPDATE tb_ttdspd2 A SET A.id_peg1 = NEW.id_ppk, A.id_peg2= NEW.id_ppk WHERE A.id_satker = NEW.id_satker;

UPDATE tb_ttdriil A SET A.id_peg = NEW.id_ppk WHERE A.id_satker = NEW.id_satker;
UPDATE tb_ttdspd A SET A.id_peg = NEW.id_ppk WHERE A.id_satker = NEW.id_satker;


END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
