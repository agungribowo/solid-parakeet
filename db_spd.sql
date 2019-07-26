-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 15, 2019 at 06:17 AM
-- Server version: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spd`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_gol`
--

CREATE TABLE IF NOT EXISTS `tb_gol` (
  `id_gol` int(11) NOT NULL,
  `kode_gol` int(1) NOT NULL,
  `gol` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gol`
--

INSERT INTO `tb_gol` (`id_gol`, `kode_gol`, `gol`) VALUES
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
(12, 4, 'IV/B');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelengkapan`
--

CREATE TABLE IF NOT EXISTS `tb_kelengkapan` (
  `id_kelengkapan` int(11) NOT NULL,
  `uraian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelengkapan`
--

INSERT INTO `tb_kelengkapan` (`id_kelengkapan`, `uraian`) VALUES
(1, 'Surat Pemanggilan / ST dari Dirjen atau Instansi terkait'),
(2, 'Surat Perintah Tugas dari Kepala'),
(3, 'Surat Perjalanan Dinas'),
(4, 'Tiket Pesawat / Bis / Kereta api'),
(5, 'Boarding Pas'),
(6, 'Bukti Pembayaran Penginapan / Hotel'),
(7, 'Laporan Pelaksanaan Tugas'),
(8, 'Daftar Agenda');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kwitansi`
--

CREATE TABLE IF NOT EXISTS `tb_kwitansi` (
  `id_kwitansi` int(11) NOT NULL,
  `id_spd` int(11) NOT NULL,
  `id_peg` int(11) NOT NULL,
  `id_satker` int(11) NOT NULL,
  `id_rincian` int(11) NOT NULL,
  `jumlah` double NOT NULL,
  `ta` int(11) NOT NULL,
  `jns_tuj` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kwitansi`
--

INSERT INTO `tb_kwitansi` (`id_kwitansi`, `id_spd`, `id_peg`, `id_satker`, `id_rincian`, `jumlah`, `ta`, `jns_tuj`) VALUES
(1, 3, 9, 0, 0, 760000, 1, 'Dalam Kota'),
(2, 4, 2, 0, 0, 380000, 1, 'Dalam Kota'),
(3, 2, 3, 0, 3, 135149160, 1, 'Luar Negeri'),
(4, 1, 6, 0, 2, 2700000, 1, 'Dalam Negeri'),
(5, 4, 7, 0, 0, 425000, 1, 'Dalam Kota'),
(6, 1, 4, 0, 4, 5260000, 1, 'Dalam Negeri'),
(7, 1, 7, 0, 1, 3810000, 1, 'Dalam Negeri'),
(8, 3, 8, 0, 7, 5260000, 1, 'Dalam Negeri'),
(9, 3, 9, 0, 8, 5260000, 1, 'Dalam Negeri'),
(10, 3, 10, 0, 6, 5260000, 1, 'Dalam Negeri');

-- --------------------------------------------------------

--
-- Table structure for table `tb_logo`
--

CREATE TABLE IF NOT EXISTS `tb_logo` (
  `id_logo` int(11) NOT NULL,
  `logo1` varchar(255) NOT NULL,
  `logo2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_logo`
--

INSERT INTO `tb_logo` (`id_logo`, `logo1`, `logo2`) VALUES
(1, '', '20181120-150856-APP.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nominatif`
--

CREATE TABLE IF NOT EXISTS `tb_nominatif` (
  `id_spd` int(11) NOT NULL,
  `pegawai` varchar(255) NOT NULL,
  `id_satker` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nominatif`
--

INSERT INTO `tb_nominatif` (`id_spd`, `pegawai`, `id_satker`) VALUES
(9, '8', 13),
(9, '10', 13),
(9, '12', 13),
(8, '2', 13),
(8, '7', 13),
(8, '3', 13),
(8, '11', 13),
(7, '6', 13),
(7, '4', 13),
(7, '10', 13),
(7, '1', 13),
(7, '12', 13),
(6, '9', 13),
(6, '10', 13),
(6, '1', 13),
(5, '8', 0),
(5, '10', 0),
(5, '6', 0),
(4, '7', 0),
(4, '2', 0),
(3, '2', 0),
(3, '10', 0),
(3, '8', 0),
(3, '9', 0),
(2, '3', 0),
(10, '3', 13),
(1, '7', 0),
(1, '6', 0),
(1, '4', 0),
(11, '5', NULL),
(11, '293', NULL),
(11, '220', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE IF NOT EXISTS `tb_pegawai` (
  `id_peg` int(11) NOT NULL,
  `nip_val` varchar(64) NOT NULL,
  `nip` varchar(64) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `pangkat` varchar(64) NOT NULL,
  `gol` int(11) NOT NULL,
  `jab` varchar(64) NOT NULL,
  `satker` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=366 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_peg`, `nip_val`, `nip`, `nama`, `pangkat`, `gol`, `jab`, `satker`, `foto`) VALUES
(2, '62050797', '62050797', 'Drs. Suhardi Alius, M.H.', 'Komjen Pol', 4, 'Kepala BNPT', 0, 'avatar.png'),
(3, '507801', '507801', 'Dr. Asep Adang Supriyadi, S.T., M.M.', 'Marsda TNI', 4, 'Sekretaris Utama', 0, 'avatar.png'),
(4, '30851', '30851', 'Hendri Paruhuman Lubis', 'Mayjen TNI', 4, 'Deputi Pencegahan, Perlindungan dan Deradikalisasi', 0, 'avatar.png'),
(5, '63040908', '63040908', 'Drs. Budiono Sandi, S.H., M.Hum.', 'Irjen Pol', 4, 'Deputi Penindakan dan Pembinaan Kemampuan', 0, 'avatar.png'),
(6, '195908121981021004', '195908121981021004', 'Dr. Amrizal, M.M.', 'Pembina Utama Madya ', 4, 'Inspektur', 0, 'avatar.png'),
(7, '32296', '32296', 'Dadang Hendrayudha', 'Brigjen TNI', 4, 'Kepala Biro Umum', 0, 'avatar.png'),
(8, '196705011989031001', '196705011989031001', 'Bangbang Surono, Ak., M.M.', 'Pembina Utama Muda  ', 4, 'Kepala Biro Perencanaan, Hukum dan Humas', 0, 'avatar.png'),
(9, '196609241991031002', '196609241991031002', 'Prof. Dr. Irfan Idris, M.A.', 'Pembina Utama Madya ', 4, 'Direktur Deradikalisasi', 0, 'avatar.png'),
(10, '620710016', '620710016', 'Ir. Hamli M.E.', 'Brigjen Pol', 4, 'Direktur Pencegahan', 0, 'avatar.png'),
(11, '68020211', '68020211', 'Drs. Torik Triyono, M.Si.', 'Brigjen Pol', 4, 'Direktur Penindakan', 0, 'avatar.png'),
(12, '67060234', '67060234', 'Drs. Imam Margono', 'Brigjen Pol', 4, 'Direktur Pembinaan Kemampuan', 0, 'avatar.png'),
(13, '67050527', '67050527', 'Eddy Hartono, S.I.K., M.H.', 'Brigjen Pol', 4, 'Direktur Penegakan Hukum', 0, 'avatar.png'),
(14, '63100746', '63100746', 'Drs. H. Herwan Chaidir', 'Brigjen Pol', 4, 'Direktur Perlindungan', 0, 'avatar.png'),
(15, '197205261997031005', '197205261997031005', 'Andhika Chrisnayudhanto', 'Pembina Utama Muda  ', 4, 'Direktur Kerjasama Regional dan Multilateral', 0, 'avatar.png'),
(16, '8716/P', '8716/P', 'Yuniar Ludfi', 'Brigjen TNI (Mar)', 4, 'Direktur Perangkat Hukum  Internasional', 0, 'avatar.png'),
(17, '67060540', '67060540', 'Drs. Kris Erlangga Aji Widjaya', 'Brigjen Pol', 4, 'Direktur Kerjasama Bilateral', 0, 'avatar.png'),
(18, '11938/P', '11938/P', 'Agus Purwanto', 'Kolonel Laut (T)', 4, 'Kabag Data dan Pelaporan', 0, 'avatar.png'),
(19, '196811081989031001', '196811081989031001', 'Syaiful Rachman, Ak.', 'Pembina ', 4, 'Kabag Keuangan', 0, 'avatar.png'),
(20, '197306231994031001', '197306231994031001', 'Ahmad Zainal Arifin, S.ST., Ak.', 'Penata Tk. I  ', 3, 'Kabag Perencanaan', 0, 'avatar.png'),
(21, '196804281996032001', '196804281996032001', 'Suniah Setiyawati, S.Kom., M.M.', 'Pembina Tk. I  ', 4, 'Kabag Kepegawaian dan  Organisasi', 0, 'avatar.png'),
(22, '196604131987031001', '196604131987031001', 'Rachmat Surawibawa, S.Sos.', 'Pembina Tk. I  ', 4, 'Kabag Tata Usaha dan Rumah Tangga', 0, 'avatar.png'),
(23, '1900024511166', '1900024511166', 'Roedy Widodo', 'Kolonel (Czi)', 4, 'Kasubdit Pemulihan Korban Aksi Terorisme', 0, 'avatar.png'),
(24, '196212311985032003', '196212311985032003', 'Dra. Hj. Andi Intang Dulung, M.HI.', 'Pembina Tk. I  ', 4, 'Kasubdit Pemberdayaan Masyarakat', 0, 'avatar.png'),
(25, '196402251987031001', '196402251987031001', 'Moch. Chairil Anwar, S.H.', 'Pembina', 4, 'Kasubdit Pengawasan', 0, 'avatar.png'),
(26, '13410/P', '13410/P', 'Wahyu Herawan', 'Kolonel Laut (T)', 4, 'Kasubdit Pam Obvit dan Transportasi', 0, 'avatar.png'),
(27, '519802', '519802', 'Drs. Sudjatmiko', 'Kolonel (Pas)', 4, 'Kasubdit Kontra Propaganda', 0, 'avatar.png'),
(28, '519795', '519795', 'Drs. Solihuddin Nasution', 'Kolonel (Sus)', 4, 'Kasubdit Bina Masyarakat', 0, 'avatar.png'),
(29, '11930093111170', '11930093111170', 'Sigit Karyadi, S.H.', 'Kolonel (Cpl)', 4, 'Kasubdit Bina Dalam Lembaga Pemasyarakatan', 0, 'avatar.png'),
(30, '74090558', '74090558', 'Alexander Sabar, S.IK.', 'Kombes Pol', 4, 'Kasubdit Intelijen', 0, 'avatar.png'),
(31, '31172', '31172', 'Darmanto', 'Kolonel (Inf)', 4, 'Kasubdit Kesiapsiagaan dan Penanganan Krisis', 0, 'avatar.png'),
(32, '65010649', '65010649', 'Suprianto, S.H.', 'Kombes Pol', 4, 'Kasubdit Pelatihan', 0, 'avatar.png'),
(33, '196710131993031001', '196710131993031001', 'M. Syafwan Zuraidi, S.H.', 'Penata Tk. I', 4, 'Kasubdit Pengembangan Sistem Operasi', 0, 'avatar.png'),
(34, '197402181994031001', '197402181994031001', 'Suroyo, S.H., M.Hum.', 'Jaksa Madya', 4, 'Kasubdit Perlindungan Aparat Penegak Hukum', 0, 'avatar.png'),
(35, '197608242000031001', '197608242000031001', 'Dionnisius Elvan Swasono, S.Sos., M.Si.', 'Pembina', 4, 'Kasubdit Kerjasama Regional', 0, 'avatar.png'),
(36, '197407042000031001', '197407042000031001', 'Tolhah Ubaidi, S.I.P., M.P.P.', 'Pembina', 4, 'Kasubdit Amerika dan Eropa', 0, 'avatar.png'),
(37, '12013/P', '12013/P', 'Andy Prasetyo', 'Kolonel (Mar)', 4, 'Kasubdit Bina Dalam Lembaga Pemasyarakatan Khusus Teroris', 0, 'avatar.png'),
(38, '11930080160271', '11930080160271', 'Kurniawan, S.E.', 'Letkol (Inf)', 4, 'Kasubdit Kerjasama Multilateral', 0, 'avatar.png'),
(39, '197411172000031001', '197411172000031001', 'Maulana Syahid, S.E., MPP.', 'Pembina', 4, 'Kasubdit Konvensi dan Resolusi Internasional', 0, 'avatar.png'),
(40, '63121110', '63121110', 'Drs. Suyoko Djunaedi, M.M.', 'AKBP', 4, 'Kasubdit Perlindungan WNI dan Kepentingan Nasional di Luar Neger', 0, 'avatar.png'),
(41, '197606202001122001', '197606202001122001', 'Pudiastuti Citra Adi, S.H., M.H.', 'Jaksa Madya', 4, 'Kabag Hukum dan Hubungan Masyarakat', 0, 'avatar.png'),
(42, '70050365', '70050365', 'Zamri, S.Kom.', 'Kombes Pol', 4, 'Kasubdit Teknologi Informasi', 0, 'avatar.png'),
(43, '74090552', '74090552', 'Hando Wibowo, S.IK., M.Si.', 'Kombes Pol', 4, 'Kasubdit Hubungan Antar Lembaga Aparat Penegak Hukum', 0, 'avatar.png'),
(44, '72110541', '72110541', 'Slamet Riyadi, S.IK., M.Si.', 'Kombes Pol', 4, 'Kasubdit Analisis dan Evaluasi Penegakan Hukum', 0, 'avatar.png'),
(45, '32798', '32798', 'Rahmad Suhendro', 'Letkol (Czi)', 4, 'Kasubdit Pengamanan Lingkungan', 0, 'avatar.png'),
(46, '12723/P', '12723/P', 'Edy Cahyanto', 'Kolonel (Mar)', 4, 'Kasubdit Penggunaan Kekuatan ', 0, 'avatar.png'),
(47, '516352', '516352', 'Fanfan Infansyah ', 'Kolonel (Sus)', 4, 'Kasubdit Kerjasama Asia Pasifik', 0, 'avatar.png'),
(48, '197705242002121001', '197705242002121001', 'Iwan Dwi Susanto, S.E., M.Ak.', 'Penata Tk. I', 4, 'Kasubbag Akutansi dan Verifikasi ', 0, 'avatar.png'),
(49, '198308142008031001', '198308142008031001', 'M. Unggul Abdul Fatah, S.T.P., M.M.', 'Penata  ', 3, 'Kasubbag Penyusunan Anggaran', 0, 'avatar.png'),
(50, '198412182014032001', '198412182014032001', 'Dewi Anggraini Rubiyanti, S.Hum.', 'Penata Muda Tk. I', 3, 'Kasubbag Kepegawaian', 0, 'avatar.png'),
(51, '197312201999032001', '197312201999032001', 'Weti Deswiyati, S.Sos., M.Si.', 'Pembina', 4, 'Kasubbag Organisasi dan Tata Laksana', 0, 'avatar.png'),
(52, '197711282006041001', '197711282006041001', 'Moch. Andriansyah, S.T., M.M.', 'Penata Tk. I', 3, 'Kasubbag Rumah Tangga, dan Perlengkapan', 0, 'avatar.png'),
(53, '197209051993021001', '197209051993021001', 'Edi Setiawan, Ak.', 'Penata Tk. I', 3, 'Kasubbag Administrasi Keuangan', 0, 'avatar.png'),
(54, '197309122009031001', '197309122009031001', 'Amir Mahmud, S.T.', 'Penata Tk. I', 3, 'Kasubbag Data', 0, 'avatar.png'),
(55, '196707141988031001', '196707141988031001', 'Eddy Purwanto, S.Pd.', 'Penata Tk. I', 3, 'Kasubbag Pelaporan', 0, 'avatar.png'),
(56, '520796', '520796', 'Muhamad Djuhaimi Al Anshori', 'Letkol Adm.', 3, 'Kasubbag Penyusunan Program', 0, 'avatar.png'),
(57, '197503232006042000', '197503232006042000', 'Suprih Sriwinarti, S.IP.', 'Penata Tk. I', 3, 'Kasubbag Tata Usaha Deputi III', 0, 'avatar.png'),
(58, '84051746', '84051746', 'Irvan Reza, S.H., S.I.K', 'Kom Pol', 3, 'Kasi Pengolahan Data', 0, 'avatar.png'),
(59, '196805171996031000', '196805171996031000', 'Supargiyanto, S.Sos.', 'Penata  ', 3, 'Kasubbag Tata Usaha Deputi II', 0, 'avatar.png'),
(60, '197904282002121000', '197904282002121000', 'Ahadi Wijayanto, S.E.', 'Pembina', 4, 'Kasubbag Tata Usaha Deputi I', 0, 'avatar.png'),
(61, '11050003330967', '11050003330967', 'Drs. Aripuddin, M.Si.', 'Letkol (Inf)', 3, 'Kasubbag Tata Usaha Inspektorat', 0, 'avatar.png'),
(62, '196404131988031001', '196404131988031001', 'Dwito Relawanto, S.E., M.M.', 'Penata Tk. I', 3, 'Kasubbag Tata Usaha Sestama', 0, 'avatar.png'),
(63, '198509142008121001', '198509142008121001', 'Rikhi Benindo Maghaz, S.H.', 'Jaksa Pratama', 3, 'Kasubbag Tata Usaha Kepala', 0, 'avatar.png'),
(64, '198306162009121001', '198306162009121001', 'Tatu Aditya, S.H., M.H.', 'Jaksa Pratama', 3, 'Kasubbag Hukum', 0, 'avatar.png'),
(65, '198301242008121001', '198301242008121001', 'Muhammad Lutfi, S.IP., M.Si.', 'Penata', 3, 'Kasi Pemulihan Korban', 0, 'avatar.png'),
(66, '198112212001121001', '198112212001121001', 'Helmi Najih, A.Md. IP, S.H., M.H.', 'Penata', 3, 'Kasi Bina Narapidana ', 0, 'avatar.png'),
(67, '198112162001121001', '198112162001121001', 'Arifin Akhmad, AMd. IP, S.H.', 'Penata', 3, 'Kasi Identifikasi Dalam Masyarakat ', 0, 'avatar.png'),
(68, '197610282009121003', '197610282009121003', 'Andri Taufik H S, S.Sos., M.Ag.', 'Penata Muda Tk. I', 3, 'Kasi Materi Pembinaan', 0, 'avatar.png'),
(69, '197904112005011007', '197904112005011007', 'Rahmat Sori Simbolon, S.H., M.H.', 'Jaksa Muda', 3, 'Kasi Analisis dan Identifikasi', 0, 'avatar.png'),
(70, '198403122014031001', '198403122014031001', 'Bukhori, S.Kom. ', 'Penata Muda Tk. I', 3, 'Kasubbag Tata Usaha, Protokol, dan Pengamanan', 0, 'avatar.png'),
(71, '196511101989031003', '196511101989031003', 'Ragil Priyadi, S.H., M.H.', 'Penata Tk. I', 3, 'Kasi Litigasi dan Advokasi', 0, 'avatar.png'),
(72, '80031111', '80031111', 'I Nyoman Sarjana, SIK., M.A.P', 'Kom Pol', 3, 'Kasi Hubungan Antar Lembaga Daerah', 0, 'avatar.png'),
(73, '198708232014031001', '198708232014031001', 'Donnie Alimurfie, S.E., M.E.', 'Penata', 3, 'Kasi Pengumpulan Data', 0, 'avatar.png'),
(74, '197607202006042001', '197607202006042001', 'Yuline Pramasari, S.E., M.MTr', 'Penata Tk. I', 3, 'Kasi Pengamanan Transportasi', 0, 'avatar.png'),
(75, '198303022002121003', '198303022002121003', 'Eri Suprayitno, S.E.', 'Penata ', 3, 'Kasi Media Literasi', 0, 'avatar.png'),
(76, '198307202014031001', '198307202014031001', 'Faizal Yan Aulia, S.Fil., M.Sc.', 'Penata', 3, 'Kasi Pengawasan Barang', 0, 'avatar.png'),
(77, '197508252002121008', '197508252002121008', 'Muriansyah Herman, S.Sos., M.Si.', 'Penata Tk. I', 4, 'Kasi Pengamanan Lingkungan Pemerintah', 0, 'avatar.png'),
(78, '196908041993011001', '196908041993011001', 'Puput Agus Setiawan, S.E., M.M., M.H.', 'Penata Tk. I', 3, 'Kasi Penelitian dan Evaluasi', 0, 'avatar.png'),
(79, '197407122003122001', '197407122003122001', 'Djuliawati, S.E., M.M.', 'Penata', 3, 'Kasi Evaluasi Dan Laporan', 0, 'avatar.png'),
(80, '520262', '520262', 'Teguh Ari Wibowo', 'Letkol (Sus)', 3, 'Kasi Perencanaan Latihan', 0, 'avatar.png'),
(81, '12317/P', '12317/P', 'Setyo Pranowo, S.H., M.M.', 'Letkol Laut (KH)', 3, 'Kasi Partisipasi Masyarakat', 0, 'avatar.png'),
(82, '198505142010121001', '198505142010121001', 'Ahmad Fauzi, S.Pd., M.Pd., M.H.', 'Penata Muda Tk. I', 3, 'Kasi Identifikasi Narapidana', 0, 'avatar.png'),
(83, '11990041751277', '11990041751277', 'Indra Gunawan', 'Letkol (Inf)', 3, 'Kasi Kesiapsiagaan', 0, 'avatar.png'),
(84, '528673', '528673', 'R. Tjandra Sulistyono', 'Letkol (Sus)', 3, 'Kasi Lembaga Non Pemerintah Subdit Kerjasama Regional', 0, 'avatar.png'),
(85, '71040697', '71040697', 'Zulkifli, S.Ag.', 'Kom Pol', 3, 'Kasi Pengamanan Objek Vital', 0, 'avatar.png'),
(86, '198811062014031002', '198811062014031002', 'Mario Humberto, S.Sos., M.H.', 'Penata Muda Tk. I', 3, 'Kasi Pengamanan Lingkungan Umum', 0, 'avatar.png'),
(87, '196404271986031001', '196404271986031001', 'Nurturyanto, S.E.', 'Penata Tk. I', 3, 'Kasi Pemulihan Sarana & Prasarana', 0, 'avatar.png'),
(88, '11960056051174', '11960056051174', 'Hendro Wicaksono, S.H.', 'Letkol (Cpl)', 3, 'Kasi Bina Dalam Masyarakat', 0, 'avatar.png'),
(89, '65120037', '65120037', 'Astuti Idris, S.Sos.', 'AKBP', 3, 'Kasi Operasi Intelijen', 0, 'avatar.png'),
(90, '198805132014032001', '198805132014032001', 'Leebarty Taskarina, S.Sos., M.Krim.', 'Penata Muda Tk. I', 3, 'Kasi Analisis Intelijen', 0, 'avatar.png'),
(91, '521858', '521858', 'Komang Dony A.W.', 'Letkol (Pas)', 3, 'Kasi Pengendalian Krisis', 0, 'avatar.png'),
(92, '11930070001268', '11930070001268', 'Luki Triandono', 'Letkol (Inf)', 3, 'Kasi Pelaksanaan Latihan', 0, 'avatar.png'),
(93, '198611102014031002', '198611102014031002', 'Gemilang Parhadiyan, S.T., M.M.S.I.', 'Penata  ', 3, 'Kasi Pengelolaan Sistem Informasi', 0, 'avatar.png'),
(94, '532423', '532423', 'Ilham Permana', 'Mayor (Lek)', 3, 'Kasi Pemberdayaan Kemampuan', 0, 'avatar.png'),
(95, '63100119', '63100119', 'H. Dalih Somawi, S.H., M.Hum.', 'AKBP', 3, 'Kasi Pengamanan Aparat Penegak Hukum', 0, 'avatar.png'),
(96, '199009212014031001', '199009212014031001', 'Septian Ageng Kurniadi, S.H.', 'Penata Muda Tk. I', 3, 'Kasi Hubungan Antar Lembaga Pusat', 0, 'avatar.png'),
(97, '197811132014032001', '197811132014032001', 'Irene Dukamoro, S.S.', 'Penata Muda Tk. I', 3, 'Kasi Kerjasama Asia Pasifik', 0, 'avatar.png'),
(98, '524462', '524462', 'Harianto, S.Pd., M.Pd', 'Letkol Sus', 3, 'Kasi Kerjasama Afrika dan Timur Tengah', 0, 'avatar.png'),
(99, '11010023740177', '11010023740177', 'Yaenurendra H.A.P, S.T., MMgt. Stud', 'Letkol (Czi)', 3, 'Kasi Kerjasama Amerika', 0, 'avatar.png'),
(100, '69050155', '69050155', 'Zainal Ahzab, A.Md.', 'Kom Pol', 3, 'Kasi Kerjasama Eropa', 0, 'avatar.png'),
(101, '197910012014032001', '197910012014032001', 'Danny Dwi Wulandri, S.I.P.', 'Penata Muda Tk. I', 3, 'Kasi Lembaga Pemerintah Subdit Kerjasama Regional', 0, 'avatar.png'),
(102, '198601102014032001', '198601102014032001', 'Anita Sofiana, S.Pd.', 'Penata Muda Tk. I', 3, 'Kasi Lembaga Pemerintah Subdit Kerjasama Multilateral', 0, 'avatar.png'),
(103, '198902032014032001', '198902032014032001', 'Sasyabella Febriani, S.Sos.', 'Penata Muda Tk. I', 3, 'Kasi Resolusi Badan-Badan Internasional', 0, 'avatar.png'),
(104, '198705012014031001', '198705012014031001', 'Muhammad Randy Ramadhan, S.IP.', 'Penata Muda Tk. I', 3, 'Kasi Perlindungan WNI', 0, 'avatar.png'),
(105, '198508092014031001', '198508092014031001', 'Nanda Fajar Aditya, S.Sos.', 'Penata Muda Tk. I', 3, 'Kasi Perlindungan Kepentingan Nasional di Luar Negeri', 0, 'avatar.png'),
(106, '196601061987031001', '196601061987031001', 'Ade Hermana, S.E., M.M.', 'Pembina', 4, ' Auditor Madya', 0, 'avatar.png'),
(107, '196908021995031001', '196908021995031001', 'Isheri, S.Sos., M.T.', 'Pembina Tk. I  ', 4, 'Analis Kelembagaan', 0, 'avatar.png'),
(108, '197908232014031001', '197908232014031001', 'Purwo Hadi Wibowo, S.E.', 'Penata Muda', 3, 'Auditor Ahli Pertama', 0, 'avatar.png'),
(109, '198506132014031001', '198506132014031001', 'Aristio Yudhanto, S.IKom.', 'Penata Muda', 3, 'Analis Kerjasama', 0, 'avatar.png'),
(110, '198901162014031000', '198901162014031000', 'Anwar Suhartono, S.E.', 'Penata Muda', 3, 'Auditor Ahli Pertama', 0, 'avatar.png'),
(111, '198505302014031001', '198505302014031001', 'Chandra Kurniawan Nababan, S.E.', 'Penata Muda', 3, 'Auditor Ahli Pertama', 0, 'avatar.png'),
(112, '198001212014031001', '198001212014031001', 'Defri Ardinald, S.Sos.', 'Penata Muda', 3, 'Analis Kerjasama', 0, 'avatar.png'),
(113, '198205162014031002', '198205162014031002', 'Rizky Adianhar, S.Sos.', 'Penata Muda', 3, 'Analis Kerjasama', 0, 'avatar.png'),
(114, '198207252014031001', '198207252014031001', 'Yacobus Tri Raharjo, S.E.', 'Penata Muda', 3, 'Analis Pengawasan', 0, 'avatar.png'),
(115, '198210032014031001', '198210032014031001', 'Dimas Andianto, S.T.', 'Penata Muda', 3, 'Analis Pengamanan Objek Vital', 0, 'avatar.png'),
(116, '198309082014032002', '198309082014032002', 'Artha Medita, S.Sos.', 'Penata Muda', 3, 'Analis Kerjasama', 0, 'avatar.png'),
(117, '198509242014032002', '198509242014032002', 'Zainida, S.Psi.', 'Penata Muda', 3, 'Analis Pengamanan Objek Vital', 0, 'avatar.png'),
(118, '198603012014032001', '198603012014032001', 'Ajeng Asih Lianasari, S.S.', 'Penata Muda', 3, 'Analis Kerjasama', 0, 'avatar.png'),
(119, '198606272014032001', '198606272014032001', 'Mellysa Padma Paramita, S.H.', 'Penata Muda', 3, 'Auditor', 0, 'avatar.png'),
(120, '198706072014031001', '198706072014031001', 'Khaerul Ikhsan, S.Kom.', 'Penata Muda', 3, 'Analis Pengamanan Objek Vital', 13, 'avatar.png'),
(121, '198707042014032001', '198707042014032001', 'Yani Yuliani, S.E.', 'Penata Muda', 3, 'Auditor', 13, 'avatar.png'),
(122, '198712252014031003', '198712252014031003', 'Kautsar Noorsito, S.IP.', 'Penata Muda', 3, 'Analis Kerjasama', 13, 'avatar.png'),
(123, '198903182014032001', '198903182014032001', 'Rizky Nikita Anggraeni, S.A.P.', 'Penata Muda', 3, 'Analis Data Intelijen', 13, 'avatar.png'),
(124, '198911262014032002', '198911262014032002', 'Dian Eko Rini, S.Pd.', 'Penata Muda', 3, 'Analis Pengembangan Sistem Informasi', 13, 'avatar.png'),
(125, '199011122014031002', '199011122014031002', 'Artdeansyah Utama Dilaga, S.E.', 'Penata Muda', 3, 'Analis Pengembangan Sistem Informasi', 13, 'avatar.png'),
(126, '198608292014071001', '198608292014071001', 'Alhen Egho Saiba, S.T.', 'Penata Muda', 3, 'Analis Data Intelijen', 13, 'avatar.png'),
(127, '198012302015031001', '198012302015031001', 'Teuku Fauzansyah, S.S.', 'Penata Muda', 3, 'Analis Kerjasama Luar Negeri             ', 13, 'avatar.png'),
(128, '198104082015031001', '198104082015031001', 'Anwar Shadat, S.T.', 'Penata Muda', 3, 'Analis Pengembangan Jaringan', 13, 'avatar.png'),
(129, '198109072015031003', '198109072015031003', 'Andityas Pranowo, S.Sos.I.', 'Penata Muda', 3, 'Analis Pelayanan Publik                                 ', 13, 'avatar.png'),
(130, '198208212015031001', '198208212015031001', 'Trigus Sinduwarno, S.T.', 'Penata Muda', 3, 'Analis Pengembangan Jaringan', 13, 'avatar.png'),
(131, '198402272015031001', '198402272015031001', 'Djati Utoyo Utomo, S.Sos.', 'Penata Muda', 3, 'Analis Kerjasama Luar Negeri ', 13, 'avatar.png'),
(132, '198404302015031002', '198404302015031002', 'Rezky Mediansyah, S.T.', 'Penata Muda', 3, 'Analis Pengembangan Jaringan', 13, 'avatar.png'),
(133, '198507262015031002', '198507262015031002', 'Haris Munandar, S.E.', 'Penata Muda', 3, 'Pemeriksa Intelijen                                ', 13, 'avatar.png'),
(134, '198512022015031001', '198512022015031001', 'Igor Tanjung Pambuko, S.S.', 'Penata Muda', 3, 'Pemeriksa Intelijen                                ', 13, 'avatar.png'),
(135, '198705032015032002', '198705032015032002', 'Maira Himadhani, S.T.', 'Penata Muda Tk. I', 3, 'Analis Pelayanan Publik                                 ', 13, 'avatar.png'),
(136, '198803022015031003', '198803022015031003', 'Mohammad Nuhwana Saputra, S.E.', 'Penata Muda', 3, 'Pemeriksa Intelijen                                ', 13, 'avatar.png'),
(137, '198809202015051001', '198809202015051001', 'Salmon Saa, S.IP.', 'Penata Muda', 3, 'Analis Potensi Konflik', 13, 'avatar.png'),
(138, '198908052015032000', '198908052015032000', 'Masdhalifa, S.H.', 'Penata Muda', 3, 'Analis Hubungan Kelembagaan', 13, 'avatar.png'),
(139, '198909032015032002', '198909032015032002', 'Nilam Ayuningtyas, S.Psi.', 'Penata Muda', 3, 'Analis Hubungan Kelembagaan', 13, 'avatar.png'),
(140, '198409222015031001', '198409222015031001', 'Muhammad Resha Aniskurli, S.E.', 'Penata Muda', 3, 'Analis Barang dan Jasa                                 ', 13, 'avatar.png'),
(141, '199007172015032002', '199007172015032002', 'Diannitha Phobe Yuliane Pertiwi, S.Psi.', 'Penata Muda', 3, 'Analis Hubungan Kelembagaan', 13, 'avatar.png'),
(142, '199101022015032001', '199101022015032001', 'Hani Astirini Diyandra Putri, S.Sos., M.Si.', 'Penata Muda Tk. I', 3, 'Analis Kerjasama Luar Negeri             ', 13, 'avatar.png'),
(143, '199104192015032000', '199104192015032000', 'Alfrida Heanity Panjaitan, S.A.B.', 'Penata Muda', 3, 'Analis Barang dan Jasa                                 ', 13, 'avatar.png'),
(144, '197610302002121000', '197610302002121000', 'Ahmad Riyadi', 'Penata Muda', 3, 'Pengadminstrasi Umum', 13, 'avatar.png'),
(145, '1987111920180000', '1987111920180000', 'Dr. Pika Novriani Lubis', 'Penata Muda Tk. I', 3, 'Dokter Ahli Pertama', 13, 'avatar.png'),
(146, '1990020820180000', '1990020820180000', 'Drg. Pebrina Dwi Arianti', 'Penata Muda Tk. I', 3, 'Dokter Gigi Ahli Pertama', 13, 'avatar.png'),
(147, '198303142018011000', '198303142018011000', 'Cahyo Anggoro, S.E.', 'Penata Muda', 3, 'Penyusun Program dan Kegiatan', 13, 'avatar.png'),
(148, '198310262018011000', '198310262018011000', 'Arrendra Ockiarawan, S.S.', 'Penata Muda', 3, 'Analis Kerjasama', 13, 'avatar.png'),
(149, '198401222018011000', '198401222018011000', 'Ari Prabawa, S.H.', 'Penata Muda', 3, 'Analis Advokasi', 13, 'avatar.png'),
(150, '198508052018011000', '198508052018011000', 'Ricki Gushendrio, S.T.', 'Penata Muda', 3, 'Analis Data dan Informasi', 13, 'avatar.png'),
(151, '1986021020180000', '1986021020180000', 'Siti Masyitoh, S.E.As', 'Penata Muda', 3, 'Pranata Kearsipan', 13, 'avatar.png'),
(152, '198612122018011000', '198612122018011000', 'Amar Maruf, S.Pd.', 'Penata Muda', 3, 'Analis Kerjasama Pelatihan', 13, 'avatar.png'),
(153, '198701202018011000', '198701202018011000', 'Nurul Huda Shufi Prabowo, S.I.Kom.', 'Penata Muda', 3, 'Analis Kerjasama', 13, 'avatar.png'),
(154, '198702132018011000', '198702132018011000', 'Eldi Bisma Putra Mahendra', 'Penata Muda', 3, 'Analis Data dan Informasi', 13, 'avatar.png'),
(155, '1987062920180000', '1987062920180000', 'Sonya Christi Yunika, S.H.', 'Penata Muda', 3, 'Penyusun Program dan Kegiatan', 13, 'avatar.png'),
(156, '1987082420180001', '1987082420180001', 'Mega Agustina, S.T.', 'Penata Muda', 3, 'Analis Data dan Informasi', 13, 'avatar.png'),
(157, '1988042018011000', '1988042018011000', 'I Putu Eka Dimi Aprilianta, S.T.', 'Penata Muda', 3, 'Analis Data dan Informasi', 13, 'avatar.png'),
(158, '1988060420180000', '1988060420180000', 'Cindy Yunita, S.T. ', 'Penata Muda', 3, 'Analis Data dan Informasi', 13, 'avatar.png'),
(159, '198809252018011000', '198809252018011000', 'Imana Hardy, S.IP.', 'Penata Muda', 3, 'Analis Kerjasama', 13, 'avatar.png'),
(160, '1988102320180000', '1988102320180000', 'Nurul Farida, S.Pd.', 'Penata Muda', 3, 'Analis Pemberdayaan', 13, 'avatar.png'),
(161, '19890200180001', '19890200180001', 'Siti Syofiah, S.Kom.', 'Penata Muda', 3, 'Analis Data dan Informasi', 13, 'avatar.png'),
(162, '198905142018011000', '198905142018011000', 'Maharadhika Adetya Putra', 'Penata Muda', 3, 'Penyusun Program dan Kegiatan', 13, 'avatar.png'),
(163, '198908102018011000', '198908102018011000', 'Bagus Hanni Pradana, S.Hum.', 'Penata Muda', 3, 'Analis Kerjasama', 13, 'avatar.png'),
(164, '198909262018011000', '198909262018011000', 'Septiyono Zafarudin, S.IP.', 'Penata Muda', 3, 'Analis Kerjasama', 13, 'avatar.png'),
(165, '1990050018011000', '1990050018011000', 'Aditya Wisnu Wardana, S.S.', 'Penata Muda', 3, 'Analis Kerjasama', 13, 'avatar.png'),
(166, '199007042018011000', '199007042018011000', 'Ogie Prasetyo, S.I.A.', 'Penata Muda', 3, 'Penyusun Program dan Kegiatan', 13, 'avatar.png'),
(167, '199010082018011000', '199010082018011000', 'Putra Jody Susetyo, S.I.A.', 'Penata Muda', 3, 'Pranata Kearsipan', 13, 'avatar.png'),
(168, '19901030180002', '19901030180002', 'Mardiyah Az Zahra, S.T.', 'Penata Muda', 3, 'Analis Data dan Informasi', 13, 'avatar.png'),
(169, '199102222018011000', '199102222018011000', 'Paul Haposan S Lumbangaol', 'Penata Muda', 3, 'Analis Advokasi', 13, 'avatar.png'),
(170, '199103132018011000', '199103132018011000', 'Pandu Wahyu Pratama, S.Pd.', 'Penata Muda', 3, 'Analis Resosialisasi dan Rehabilitasi', 13, 'avatar.png'),
(171, '199109152018011000', '199109152018011000', 'Richo Wisnu Anggoro, S.Kom.', 'Penata Muda', 3, 'Analis Data dan Informasi', 13, 'avatar.png'),
(172, '199110262018011000', '199110262018011000', 'Muhammad Reza Palevi, S.Sos.', 'Penata Muda', 3, 'Analis Produk Hukum', 13, 'avatar.png'),
(173, '1991111020180000', '1991111020180000', 'Uum Humairoh, S,Sos.', 'Penata Muda', 3, 'Penyusun Program dan Kegiatan', 13, 'avatar.png'),
(174, '199201082018011000', '199201082018011000', 'Kunto Hedy Nugroho, S.Sos.', 'Penata Muda', 3, 'Analis Data Intelijen', 13, 'avatar.png'),
(175, '1992021020180000', '1992021020180000', 'Masitha Nisa Noorrahma', 'Penata Muda', 3, 'Analis Penyidikan', 13, 'avatar.png'),
(176, '1992030320180000', '1992030320180000', 'Nurul Indah Ristyani, S.Sos.', 'Penata Muda', 3, 'Analis Data Intelijen', 13, 'avatar.png'),
(177, '199204272018011002', '199204272018011002', 'Ardi Putra Prasetya, S.Sos.', 'Penata Muda', 3, 'Analis Pemasyarakatan', 13, 'avatar.png'),
(178, '1992070320180000', '1992070320180000', 'Ayu Permata Yuliana, S.Sos.', 'Penata Muda', 3, 'Analis Data dan Informasi', 13, 'avatar.png'),
(179, '199208302018011000', '199208302018011000', 'Muhammad Arif Ibrahim, S.IP.', 'Penata Muda', 3, 'Analis Kerjasama', 13, 'avatar.png'),
(180, '1992120220180000', '1992120220180000', 'Larasati Ayu Srie Dewanti, S.Pd.', 'Penata Muda', 3, 'Penyuluh Narapidana', 13, 'avatar.png'),
(181, '199212072018011000', '199212072018011000', 'Ardian Fauzi Rahman, S.Sos.', 'Penata Muda', 3, 'Pranata Kearsipan', 13, 'avatar.png'),
(182, '1992121520180000', '1992121520180000', 'Mirza Dwiky Hermastuti, S.IP.', 'Penata Muda', 3, 'Penyusun Program dan Kegiatan', 13, 'avatar.png'),
(183, '19930730180001', '19930730180001', 'Sri Lestari, S.Pd.', 'Penata Muda', 3, 'Penyuluh Narapidana', 13, 'avatar.png'),
(184, '199308202018011000', '199308202018011000', 'Ariesta Aditya Timur, S.Kom.', 'Penata Muda', 3, 'Analis Data dan Informasi', 13, 'avatar.png'),
(185, '1993090220180000', '1993090220180000', 'Putri Susilawati, S.I.Kom.', 'Penata Muda', 3, 'Pranata Hubungan Masyarakat', 13, 'avatar.png'),
(186, '199310082018011000', '199310082018011000', 'Paudeno Palega, S.M.', 'Penata Muda', 3, 'Analis Bidang Pengawasan', 13, 'avatar.png'),
(187, '1993101820180000', '1993101820180000', 'Mustika Oktaviani, S.Hum.', 'Penata Muda', 3, 'Pranata Kearsipan', 13, 'avatar.png'),
(188, '1994021820180000', '1994021820180000', 'Afifah Rahmawati, S.A.P.', 'Penata Muda', 3, 'Penyusun Program dan Kegiatan', 13, 'avatar.png'),
(189, '1994040920180000', '1994040920180000', 'Udyahitani Secundaputeri, S.I.Kom.', 'Penata Muda', 3, 'Penyusun Program dan Kegiatan', 13, 'avatar.png'),
(190, '199405102018011000', '199405102018011000', 'Dwi Luthfan Prakoso, S.Sos.', 'Penata Muda', 3, 'Analis Kerjasama', 13, 'avatar.png'),
(191, '199406022018011000', '199406022018011000', 'Ikram Alifkhan Islami, S.T.', 'Penata Muda', 3, 'Analis Data dan Informasi', 13, 'avatar.png'),
(192, '1994081820180000', '1994081820180000', 'Safira Insani, S.Sos.', 'Penata Muda', 3, 'Penyusun Program dan Kegiatan', 13, 'avatar.png'),
(193, '1994090220180000', '1994090220180000', 'Septiani Kusherawanti, S.Sos.', 'Penata Muda', 3, 'Analis Kerjasama', 13, 'avatar.png'),
(194, '''199410032018011000', '''199410032018011000', 'Sigih Sinaga, S.T.', 'Penata Muda', 3, 'Analis Data dan Informasi', 13, 'avatar.png'),
(195, '1994102620180000', '1994102620180000', 'Hasna Khairiani Mulyana, S.Sos.', 'Penata Muda', 3, 'Analis Data dan Informasi', 13, 'avatar.png'),
(196, '199410292018011000', '199410292018011000', 'Muhammad Syauqi Khudzaifi, S.Si.', 'Penata Muda', 3, 'Analis Data dan Informasi', 13, 'avatar.png'),
(197, '199412262014011000', '199412262014011000', 'Yogie Indra Kurniawan, S.H.', 'Penata Muda', 3, 'Analis Produk Hukum', 13, 'avatar.png'),
(198, '199503182018011000', '199503182018011000', 'Puja Sumantri, S.S.', 'Penata Muda', 3, 'Analis Kerjasama', 13, 'avatar.png'),
(199, '19951010180001', '19951010180001', 'Hana Abshari, S.Si.', 'Penata Muda', 3, 'Analis Data dan Informasi', 13, 'avatar.png'),
(200, '199511172018011000', '199511172018011000', 'Muhammad Dwibagus Lisandro, S.Sos.', 'Penata Muda', 3, 'Analis Kerjasama', 13, 'avatar.png'),
(201, '198601282018011000', '198601282018011000', 'Tri Jananto', 'Pengatur', 2, 'Pengelola Database SPM', 13, 'avatar.png'),
(202, '1987092018011000', '1987092018011000', 'Depri Hadianto, A.Md.', 'Pengatur', 2, 'Teknisi Pemeliharaan Sarana dan Prasarana', 13, 'avatar.png'),
(203, '199002262018011001', '199002262018011001', 'Adi Rahmatullah, A.Md. Kep', 'Pengatur', 2, 'Perawat Terampil', 13, 'avatar.png'),
(204, '199306142018011000', '199306142018011000', 'Henri Prasetya, A.Md.', 'Pengatur', 2, 'Perawat Terampil', 13, 'avatar.png'),
(205, '197909042008101000', '197909042008101000', 'Addy Kusnadi', 'Pengatur', 2, 'Protokol', 13, 'avatar.png'),
(206, '199405102019022005', '199405102019022005', 'Afina Muthi Tsanya', 'Penata Muda Tk. I', 3, 'Apoteker Ahli Pertama ', 13, 'avatar.png'),
(207, '199605232019021003', '199605232019021003', 'Irfanditya Wisnu Wardana', 'Penata Muda', 3, 'Analis Data Intelejen ', 13, 'avatar.png'),
(208, '199007282019022003', '199007282019022003', 'Putri Wuning Muhareni', 'Penata Muda', 3, 'Analis Data Intelejen  ', 13, 'avatar.png'),
(209, '199403102019021003', '199403102019021003', 'Fikrul Hanif', 'Penata Muda', 3, 'Analis Data Intelejen  ', 13, 'avatar.png'),
(210, '199310052019021006', '199310052019021006', 'Ayudha Agung Satrya Putra', 'Penata Muda', 3, 'Analis Bahasa dan Sastra ', 13, 'avatar.png'),
(211, '199407062019022001', '199407062019022001', 'Hayuning Nuswantari', 'Penata Muda', 3, 'Analis Pengamanan Objek Vital ', 13, 'avatar.png'),
(212, '199505182019022008', '199505182019022008', 'Mei Maria Yosepin Simbolon', 'Penata Muda', 3, 'Analis Permasyarakatan ', 13, 'avatar.png'),
(213, '198506252019021003', '198506252019021003', 'Angga Reynaldo', 'Penata Muda', 3, 'Analis Monitoring, Evaluasi dan Pelaporan ', 13, 'avatar.png'),
(214, '199412032019022007', '199412032019022007', 'Hanifatul Handayani', 'Penata Muda', 3, 'Analis Monitoring, Evaluasi dan Pelaporan ', 13, 'avatar.png'),
(215, '199104202019021002', '199104202019021002', 'Resha Arieshandy', 'Penata Muda', 3, 'Analis Monitoring, Evaluasi dan Pelaporan ', 13, 'avatar.png'),
(216, '199105152019021004', '199105152019021004', 'Fajar Rohman Aziz', 'Penata Muda', 3, 'Analis Monitoring, Evaluasi dan Pelaporan ', 13, 'avatar.png'),
(217, '1995042019021003', '1995042019021003', 'Alif Nurryansyah Firdaus', 'Penata Muda', 3, 'Penata Laporan Keuangan ', 13, 'avatar.png'),
(218, '199409192019022002', '199409192019022002', 'Raudhatul Mutiah', 'Penata Muda', 3, 'Penata Laporan Keuangan ', 13, 'avatar.png'),
(219, '198707152019021001', '198707152019021001', 'Gading Pramudika', 'Penata Muda', 3, 'Penata Laporan Keuangan ', 13, 'avatar.png'),
(220, '1994041019021001', '1994041019021001', 'Ade Lingga Saputra Dalimunthe', 'Penata Muda', 3, 'Penata Laporan Keuangan ', 13, 'avatar.png'),
(221, '199502282019022007', '199502282019022007', 'Nur Aisyah', 'Penata Muda', 3, 'Auditor Ahli Pertama', 13, 'avatar.png'),
(222, '199412192019022002', '199412192019022002', 'Luna Putri Tiara Rossa', 'Penata Muda', 3, 'Penata Laporan Keuangan ', 13, 'avatar.png'),
(223, '198908172019022004', '198908172019022004', 'Siti Huriah Azmi', 'Penata Muda', 3, 'Auditor Ahli Pertama', 13, 'avatar.png'),
(224, '199308042019022005', '199308042019022005', 'Fadia Naufa Nasution', 'Penata Muda', 3, 'Auditor Ahli Pertama', 13, 'avatar.png'),
(225, '198807222019021002', '198807222019021002', 'Mohammad Muiz Fathurrohman', 'Penata Muda', 3, 'Analis Kerjasama Luar Negeri', 13, 'avatar.png'),
(226, '199412192019021005', '199412192019021005', 'Bayu Pradinta', 'Penata Muda', 3, 'Analis Data dan Informasi ', 13, 'avatar.png'),
(227, '199607222019021001', '199607222019021001', 'Yovi Roinaldo Tampubolon', 'Penata Muda', 3, 'Analis Data dan Informasi ', 13, 'avatar.png'),
(228, '199103202019021004', '199103202019021004', 'Ramdhan Wijaya Umbara', 'Penata Muda', 3, 'Analis Data dan Informasi ', 13, 'avatar.png'),
(229, '199210102019021011', '199210102019021011', 'Luthfillah Ardiansyah', 'Penata Muda', 3, 'Analis Data dan Informasi ', 13, 'avatar.png'),
(230, '199310272019021003', '199310272019021003', 'Heri Setiawan Suhandi', 'Penata Muda', 3, 'Analis Sumber Daya Aparatur ', 13, 'avatar.png'),
(231, '1994060019022003', '1994060019022003', 'Juanita Manifesti', 'Penata Muda', 3, 'Analis Perencanaan', 13, 'avatar.png'),
(232, '199606032019021001', '199606032019021001', 'Muhammad Afif Imaduddin', 'Penata Muda', 3, 'Analis Hukum ', 13, 'avatar.png'),
(233, '199403032019021003', '199403032019021003', 'Yahya Nuur Hidayat', 'Penata Muda', 3, 'Analis Laporan Keuangan', 13, 'avatar.png'),
(234, '199109152019021003', '199109152019021003', 'Gunar Dito ', 'Penata Muda', 3, 'Analis Kebijakan Ahli Pertama ', 13, 'avatar.png'),
(235, '198608172019021003', '198608172019021003', 'Argi Agusta', 'Penata Muda', 3, 'Analis Kebijakan Ahli Pertama ', 13, 'avatar.png'),
(236, '199412302019022004', '199412302019022004', 'Mutiara Islamiyati', 'Penata Muda', 3, 'Analis Kebijakan Ahli Pertama ', 13, 'avatar.png'),
(237, '199210152019022002', '199210152019022002', 'Sayyidati Oktia Padma Firdausi', 'Penata Muda', 3, 'Perawat Ahli Pertama ', 13, 'avatar.png'),
(238, '199605042019021004', '199605042019021004', 'Raditya Ndaru Aji', 'Pengatur', 2, 'Perawat Gigi Terampil ', 13, 'avatar.png'),
(239, '199608082019022004', '199608082019022004', 'Vania Nabilla Aditiarini', 'Penata Muda', 3, 'Analis Bidang Pengawasan ', 13, 'avatar.png'),
(240, '199602052019022004', '199602052019022004', 'Trissa Diva Rusniko', 'Penata Muda', 3, 'Analis Bidang Pengawasan ', 13, 'avatar.png'),
(241, '199009172019022003', '199009172019022003', 'Deby Septana Suryanto', 'Penata Muda', 3, 'Analis Bidang Pengawasan ', 13, 'avatar.png'),
(242, '199203082019021004', '199203082019021004', 'Muhamad Yusuf Ramdhan', 'Penata Muda', 3, 'Analis Data Intelijen ', 13, 'avatar.png'),
(243, '198910272019022003', '198910272019022003', 'Rina Maulidah', 'Penata Muda', 3, 'Analis Data Intelijen', 13, 'avatar.png'),
(244, '199611062019021001', '199611062019021001', 'Fe Fikran Alfurqon', 'Penata Muda', 3, 'Analis Data Intelijen ', 13, 'avatar.png'),
(245, '199111092019022002', '199111092019022002', 'Shinta Tiur Novita', 'Penata Muda', 3, 'Analis Data Intelijen', 13, 'avatar.png'),
(246, '199209162019021001', '199209162019021001', 'Fahmi Sidiq', 'Penata Muda', 3, 'Penyuluh Narapidana ', 13, 'avatar.png'),
(247, '199105232019021003', '199105232019021003', 'Muhamad Affin Bahtiar', 'Penata Muda', 3, 'Penyuluh Narapidana', 13, 'avatar.png'),
(248, '199205182019022007', '199205182019022007', 'Nurani Ruhendri Putri', 'Penata Muda', 3, 'Penyuluh Narapidana ', 13, 'avatar.png'),
(249, '199112242019022002', '199112242019022002', 'Natalia Aga Prasetyarini', 'Penata Muda', 3, 'Penyuluh Narapidana ', 13, 'avatar.png'),
(250, '199306072019022005', '199306072019022005', 'Anindya Fathy Andarlita', 'Penata Muda', 3, 'Penyuluh Narapidana ', 13, 'avatar.png'),
(251, '199503172019022003', '199503172019022003', 'Adila Rahmayanti', 'Penata Muda', 3, 'Penyuluh Narapidana ', 13, 'avatar.png'),
(252, '199212222019022008', '199212222019022008', 'Arini Sabila Hidayatika', 'Penata Muda', 3, 'Penyuluh Narapidana ', 13, 'avatar.png'),
(253, '199012072019022005', '199012072019022005', 'Siti Pranawaningrum', 'Penata Muda', 3, 'Penyuluh Narapidana ', 13, 'avatar.png'),
(254, '199404062019021004', '199404062019021004', 'Ahmadulloh', 'Penata Muda', 3, 'Analis Perencanaa, Evaluasi dan Pelaporan ', 13, 'avatar.png'),
(255, '1990022019021002', '1990022019021002', 'Rizki Montheza', 'Penata Muda', 3, 'Penyusun Bahan Kerjasama Pelatihan ', 13, 'avatar.png'),
(256, '199105042019021002', '199105042019021002', 'Ridwan Nur Matien', 'Penata Muda', 3, 'Penyusun Bahan Kerjasama Pelatihan ', 13, 'avatar.png'),
(257, '199607232019022002', '199607232019022002', 'Romayta Ayu Firdaus', 'Penata Muda', 3, 'Analis Resosialisasi dan Rehabilitasi ', 13, 'avatar.png'),
(258, '199412222019021004', '199412222019021004', 'Deky Mulyana', 'Pengatur', 2, 'Pengelola Sistem dan Jaringan ', 13, 'avatar.png'),
(259, '199001252019021002', '199001252019021002', 'Puji Akbar', 'Penata Muda', 3, 'Penyusun Program, Anggaran dan Pelaporan ', 13, 'avatar.png'),
(260, '199604122019022005', '199604122019022005', 'Anisa Istiqomah', 'Penata Muda', 3, 'Penyusun Program, Anggaran dan Pelaporan', 13, 'avatar.png'),
(261, '199606152019021001', '199606152019021001', 'Erdo Dwi Putra', 'Penata Muda', 3, 'Penyusun Program, Anggaran dan Pelaporan', 13, 'avatar.png'),
(262, '199211092019022003', '199211092019022003', 'Dini Hariyani', 'Penata Muda', 3, 'Penyusun Program, Anggaran dan Pelaporan ', 13, 'avatar.png'),
(263, '1991013019021002', '1991013019021002', 'Febriawan Wira Putra', 'Penata Muda', 3, 'Penyusun Program, Anggaran dan Pelaporan ', 13, 'avatar.png'),
(264, '199404252019021003', '199404252019021003', 'Aqil Zaenulmillah', 'Penata Muda', 3, 'Pengelola Warga Binaan Pemasyarakatan ', 13, 'avatar.png'),
(265, '199511242019021002', '199511242019021002', 'Rangga Ardan Rahim', 'Penata Muda', 3, 'Analis Pemasyarakatan ', 13, 'avatar.png'),
(266, '198712232019021003', '198712232019021003', 'Rikki Rosadi', 'Penata Muda', 3, 'Analis Pemasyarakatan ', 13, 'avatar.png'),
(267, '199705022019022003', '199705022019022003', 'Dewi Mustika Sari', 'Pengatur', 2, 'Pranata Komputer Terampil ', 13, 'avatar.png'),
(268, '199608062019022004', '199608062019022004', 'Gusniar', 'Pengatur', 2, 'Pranata Komputer Terampil ', 13, 'avatar.png'),
(269, '199302252019021002', '199302252019021002', 'Atmo Gayuh Laksono Setiawan', 'Pengatur', 2, 'Pranata Komputer Terampil ', 13, 'avatar.png'),
(270, '199603032019022005', '199603032019022005', 'Yohana Putri Lusita', 'Penata Muda', 3, 'Penyusun Rencana Kehumasan dan Perpustakaan ', 13, 'avatar.png'),
(271, '199704302019021001', '199704302019021001', 'Rachmat Fajri Adi Nugraha', 'Penata Muda', 3, 'Analis Pemasyarakatan ', 13, 'avatar.png'),
(272, '1993070019021003', '1993070019021003', 'Iffan Al Hafiz', 'Penata Muda', 3, 'Analis pengaman Lingkungan', 13, 'avatar.png'),
(273, '1995030019021002', '1995030019021002', 'Gilang Faiz Pangestu', 'Penata Muda', 3, 'Perancang Peraturan Peraturan Perundang-Undang Ahli Pertama ', 13, 'avatar.png'),
(274, '199610202019022003', '199610202019022003', 'Nindya Dwi Eridanny', 'Pengatur', 2, 'Pranata Komputer Terampil ', 13, 'avatar.png'),
(275, '199507132019022004', '199507132019022004', 'R. Tinon Hastho Ririh', 'Penata Muda', 3, 'Analis Monitoring, Evaluasi dan Pelaporan ', 13, 'avatar.png'),
(276, '198810242019021004', '198810242019021004', 'Henry Togar', 'Penata Muda', 3, 'Analis Monitoring, Evaluasi dan Pelaporan ', 13, 'avatar.png'),
(277, '198906202019021003', '198906202019021003', 'Dwi Rahmawanto', 'Penata Muda', 3, 'Analis Monitoring, Evaluasi dan Pelaporan ', 13, 'avatar.png'),
(278, '198909162019021001', '198909162019021001', 'Fachmi Rochman', 'Penata Muda', 3, 'Analis Monitoring, Evaluasi dan Pelaporan ', 13, 'avatar.png'),
(279, '199302272019021002', '199302272019021002', 'Handhika Saputra', 'Penata Muda', 3, 'Pengelola Warga Binaan Pemasyarakatan', 13, 'avatar.png'),
(280, '199204192019022003', '199204192019022003', 'Hany Widhyastri', 'Penata Muda', 3, 'Pengelola Warga Binaan Pemasyarakatan ', 13, 'avatar.png'),
(281, '199405172019022003', '199405172019022003', 'Tuti Hasanah', 'Penata Muda', 3, 'Analis Bahasa dan Sastra ', 13, 'avatar.png'),
(282, '199406172019022006', '199406172019022006', 'Sri Wahyuningsih', 'Penata Muda', 3, 'Analis Kerjasama Luar Negeri ', 13, 'avatar.png'),
(283, '199211302019021003', '199211302019021003', 'Ardianda Aryo Prakoso', 'Penata Muda', 3, 'Analis Data dan Informasi ', 13, 'avatar.png'),
(284, '199506072019031002', '199506072019031002', 'Indra Awal Priyanto S. Kom', 'Penata Muda', 3, 'Analis Data dan Informasi', 13, 'avatar.png'),
(285, '199211052019032003', '199211052019032003', 'Chelsea Amelia Purba S.I.A', 'Penata Muda', 3, 'Penyusun Program, Anggaran Dan Pelaporan', 13, 'avatar.png'),
(286, '200001082018122003', '200001082018122003', 'Ayudyah Fitriani Hidayat', 'Pengatur', 2, 'Pengadminstrasi Keuangan', 13, 'avatar.png'),
(287, '199810132018122001', '199810132018122001', 'Nia Nurul Mahmudah', 'Pengatur', 2, 'Pengadminstrasi Keuangan', 13, 'avatar.png'),
(288, '200002292018122001', '200002292018122001', 'Veny Febri Putri Purba', 'Pengatur', 2, 'Pengadminstrasi Keuangan', 13, 'avatar.png'),
(289, '199910292018122004', '199910292018122004', 'Maria Aurelia Patricia', 'Pengatur', 2, 'Pengadminstrasi Keuangan', 13, 'avatar.png'),
(290, '199910082018121003', '199910082018121003', 'Muhammad Farhan Azhar', 'Pengatur', 2, 'Pengadminstrasi Keuangan', 13, 'avatar.png'),
(291, '199707152018121001', '199707152018121001', 'Maurice Mario Putra Saragih', 'Pengatur', 2, 'Pengelola Keuangan', 13, 'avatar.png'),
(292, '199701292018122002', '199701292018122002', 'Ni Luh Gede Cyntia Cahyani', 'Pengatur', 2, 'Pengelola Keuangan', 13, 'avatar.png'),
(293, '199611032018121002', '199611032018121002', 'Achmad Sarifudin', 'Pengatur', 2, 'Pengelola Laporan Keuangan', 13, 'avatar.png'),
(294, '199607152018121001', '199607152018121001', 'Dian Satriyono', 'Pengatur', 2, 'Pengelola Laporan Keuangan', 13, 'avatar.png'),
(295, '199705082018122004', '199705082018122004', 'Karera Meyda', 'Pengatur', 2, 'Verifikator Keuangan', 13, 'avatar.png'),
(296, '199709032018121003', '199709032018121003', 'Binsar Sinaga', 'Pengatur', 2, 'Verifikator Keuangan', 13, 'avatar.png'),
(297, '199802102018121002', '199802102018121002', 'Kian Falenza Fyqra', 'Pengatur', 2, 'Verifikator Keuangan', 13, 'avatar.png'),
(298, '199704162018122001', '199704162018122001', 'Siti Nur Arofah', 'Pengatur', 2, 'Verifikator Keuangan', 13, 'avatar.png'),
(299, '199711182018122003', '199711182018122003', 'Aulia Amani Wahdah', 'Pengatur', 2, 'Verifikator Keuangan', 13, 'avatar.png'),
(300, '199703142018121001', '199703142018121001', 'Teguh Darmawanto', 'Pengatur', 2, 'Verifikator Keuangan', 13, 'avatar.png'),
(301, '198102022017010000000', '198102022017010000000', 'Agus Sutono', 'PTT', 2, 'Koordinator Pamdal / UKD', 13, 'avatar.png'),
(302, '197005132017010000000', '197005132017010000000', 'Rudy', 'PTT', 2, 'Staf TU dan Rumga', 13, 'avatar.png'),
(303, '197704192017010000000', '197704192017010000000', 'Irwan Y', 'PTT', 2, 'Pamdal / UKD', 13, 'avatar.png'),
(304, '198501022017010000000', '198501022017010000000', 'Fadli Sunarto', 'PTT', 2, 'Pamdal / UKD', 13, 'avatar.png'),
(305, '1985051017010310000', '1985051017010310000', 'Syafriadi', 'PTT', 2, 'Pamdal / UKD', 13, 'avatar.png'),
(306, '198802062017010000000', '198802062017010000000', 'Budi Wibowo', 'PTT', 2, 'Pengemudi Inspektur', 13, 'avatar.png'),
(307, '198708082017010000000', '198708082017010000000', 'Dede Sulaeman', 'PTT', 2, 'Pengemudi Operasional', 13, 'avatar.png'),
(308, '197708142017010000000', '197708142017010000000', 'Muryadi', 'PTT', 2, 'Pengemudi Operasional', 13, 'avatar.png'),
(309, '197309252017010000000', '197309252017010000000', 'Tirto', 'PTT', 2, 'Pengemudi Operasional', 13, 'avatar.png'),
(310, '198808172017010000000', '198808172017010000000', 'Agus Budiono', 'PTT', 2, 'Pengemudi Operasional', 13, 'avatar.png'),
(311, '199111142017010000000', '199111142017010000000', 'Aditya Adzhar', 'PTT', 2, 'Pramubakti', 13, 'avatar.png'),
(312, '1981048017010310000', '1981048017010310000', 'Muhammad Masturo', 'PTT', 2, 'Pramubakti', 13, 'avatar.png'),
(313, '199103092017010000000', '199103092017010000000', 'Erwin Jaelani', 'PTT', 2, 'Pramubakti', 13, 'avatar.png'),
(314, '197709122017010000000', '197709122017010000000', 'Eko Sulistiyono', 'PTT', 2, 'Staf TU Deputi II', 13, 'avatar.png'),
(315, '195807252017010000000', '195807252017010000000', 'Husen Kuntum', 'PTT', 2, 'Pramubakti', 13, 'avatar.png'),
(316, '199602262017010000000', '199602262017010000000', 'Sadam Febrian', 'PTT', 2, 'Staff TU Deputi III', 13, 'avatar.png'),
(317, '197605052017010000000', '197605052017010000000', 'Abdul Hamid Majid, S.P', 'PTT', 2, 'Staf Khusus Kepala BNPT', 13, 'avatar.png'),
(318, '1979031017010310000', '1979031017010310000', 'Ary Firansyah', 'PTT', 2, 'Staf Biro Perencanaan, Hukum dan Humas', 13, 'avatar.png'),
(319, '199311102017010000000', '199311102017010000000', 'Denni Ristyawan', 'PTT', 2, 'Staf TU Deputi I', 13, 'avatar.png'),
(320, '198605072017010000000', '198605072017010000000', 'Wisnu Saputro', 'PTT', 2, 'Staf Biro Perencanaan, Hukum dan Humas', 13, 'avatar.png'),
(321, '1986100017010310000', '1986100017010310000', 'Dudih Rahmat Nurdiansyah', 'PTT', 2, 'Staf Biro Perencanaan, Hukum dan Humas', 13, 'avatar.png'),
(322, '199012142017010000000', '199012142017010000000', 'Eri Destria', 'PTT', 2, 'Staf TU Sestama', 13, 'avatar.png'),
(323, '198706272017010000000', '198706272017010000000', 'Trio Prakarsa', 'PTT', 2, 'Staf Kepegawaian ', 13, 'avatar.png'),
(324, '198609032017010000000', '198609032017010000000', 'Deni', 'PTT', 2, 'Staf Kepegawaian ', 13, 'avatar.png'),
(325, '199101032017010000000', '199101032017010000000', 'Budi Kurniawan', 'PTT', 2, 'Staf Kepegawaian ', 13, 'avatar.png'),
(326, '199010182017010000000', '199010182017010000000', 'Melisa Suvia Arfiyanti', 'PTT', 2, 'Staf Kepegawaian ', 13, 'avatar.png'),
(327, '198205242017010000000', '198205242017010000000', 'Mayosi Swantika', 'PTT', 2, 'Staf Keuangan', 13, 'avatar.png'),
(328, '199003052017010000000', '199003052017010000000', 'Devia Elita Sari', 'PTT', 2, 'Staf Inspektorat', 13, 'avatar.png'),
(329, '197810072017010000000', '197810072017010000000', 'Adiyono', 'PTT', 2, 'Staf Dit. Bilateral', 13, 'avatar.png'),
(330, '1981072017010310000', '1981072017010310000', 'Yudha Hartanto', 'PTT', 2, 'Staf Dit. PHI', 13, 'avatar.png'),
(331, '198512262017010000000', '198512262017010000000', 'Gusti Muhammad Permadi', 'PTT', 2, 'Staf Keuangan', 13, 'avatar.png'),
(332, '199101062017010000000', '199101062017010000000', 'Mirza Wahyudi', 'PTT', 2, 'Perawat Poliklinik', 13, 'avatar.png'),
(333, '198302272017010000000', '198302272017010000000', 'Rudi Hartono', 'PTT', 2, 'Staf Protokol Bandara', 13, 'avatar.png'),
(334, '198605162017010000000', '198605162017010000000', 'Armana AF', 'PTT', 2, 'Staf TU dan Rumga', 13, 'avatar.png'),
(335, '199504022017010000000', '199504022017010000000', 'Ega Pratama', 'PTT', 2, 'Staf TU dan Rumga', 13, 'avatar.png'),
(336, '199502232017010000000', '199502232017010000000', 'Gama Ramdani R', 'PTT', 2, 'Staf TU dan Rumga', 13, 'avatar.png'),
(337, '198904302017010000000', '198904302017010000000', 'Rahmad Hariyadi', 'PTT', 2, 'Staf TU dan Rumga', 13, 'avatar.png'),
(338, '199112052017010000000', '199112052017010000000', 'Dani Ardinanta Barmintoro', 'PTT', 2, 'Staf TU dan Rumga', 13, 'avatar.png'),
(339, '196412042017010000000', '196412042017010000000', 'Riyan Rakasiwi', 'PTT', 2, 'Staf TU dan Rumga', 13, 'avatar.png'),
(340, '197909142017010000000', '197909142017010000000', 'Teguh Machyudien', 'PTT', 2, 'Staf TU dan Rumga', 13, 'avatar.png'),
(341, '197710052017010000000', '197710052017010000000', 'Judo Prasetyo Buwono', 'PTT', 2, 'Staf TU dan Rumga', 13, 'avatar.png'),
(342, '198307172017010000000', '198307172017010000000', 'Mohammad Alfan', 'PTT', 2, 'Staf Dit. Deradikalisasi', 13, 'avatar.png'),
(343, '198807102017010000000', '198807102017010000000', 'Rusdiansyah Batubara', 'PTT', 2, 'Staf Dit. Pencegahan', 13, 'avatar.png'),
(344, '198207292017010000000', '198207292017010000000', 'Rose Rosida', 'PTT', 2, 'Staf TU Deputi I', 13, 'avatar.png'),
(345, '198412032017010000000', '198412032017010000000', 'Roy Karno', 'PTT', 2, 'Staf Dit. Pencegahan', 13, 'avatar.png'),
(346, '197103202017010000000', '197103202017010000000', 'Andry Martyano', 'PTT', 2, 'Staf Dit. Perlindungan ', 13, 'avatar.png'),
(347, '198511042017010000000', '198511042017010000000', 'Adi Prasetyo', 'PTT', 2, 'Staf Dit. Pencegahan', 13, 'avatar.png'),
(348, '198908272017010000000', '198908272017010000000', 'Andi Ulul Azmi', 'PTT', 2, 'Staf Dit. Pencegahan', 13, 'avatar.png'),
(349, '198009022017010000000', '198009022017010000000', 'Khayun Alwy', 'PTT', 2, 'Staf Dit. Binpuan', 13, 'avatar.png'),
(350, '199003122017010000000', '199003122017010000000', 'Maliki Ramadhan Fachrudin', 'PTT', 2, 'Staf Dit. Binpuan', 13, 'avatar.png'),
(351, '1990010017010310000', '1990010017010310000', 'Hariyadi Fratama', 'PTT', 2, 'Staf TU Deputi II ', 13, 'avatar.png'),
(352, '198209022017010000000', '198209022017010000000', 'Indah Mora Virgana ', 'PTT', 2, 'Staf Dit. Penindakan', 13, 'avatar.png'),
(353, '198612262017010000000', '198612262017010000000', 'Andre Sucipto', 'PTT', 2, 'Staf Dit. Penegakkan Hukum', 13, 'avatar.png'),
(354, '198009032017010000000', '198009032017010000000', 'Roni Sunandar', 'PTT', 2, 'Staf Dit. Binpuan', 13, 'avatar.png'),
(355, '198604022017010000000', '198604022017010000000', 'Raimon Andri Ticoalu', 'PTT', 2, 'Staf Biro Perencanaan, Hukum dan Humas', 13, 'avatar.png'),
(356, '198112032017010000000', '198112032017010000000', 'Suherlan', 'PTT', 2, 'Staf TU Deputi III', 13, 'avatar.png'),
(357, '197404022017010000000', '197404022017010000000', 'Dyah Ekowati', 'PTT', 2, 'Staf TU Deputi III ', 13, 'avatar.png'),
(358, '199605102017010000000', '199605102017010000000', 'M. Faris Naufal', 'PTT', 2, 'Staf TU Deputi III ', 13, 'avatar.png'),
(359, '199108052017010000000', '199108052017010000000', 'Firas Agyati Gumilar', 'PTT', 2, 'Staf TU Karoum', 13, 'avatar.png'),
(360, '198604222017010000000', '198604222017010000000', 'Vita Afrilia', 'PTT', 2, 'Staf TU Kepala', 13, 'avatar.png'),
(361, '199105162017010000000', '199105162017010000000', 'Yogi Sumarna', 'PTT', 2, 'Staf TU Kepala', 13, 'avatar.png'),
(362, '1977060017010310000', '1977060017010310000', 'Anugrah Wanto Wibowo', 'PTT', 2, 'Staf TU Kepala', 13, 'avatar.png'),
(363, '198512132017010000000', '198512132017010000000', 'Monica Natalia Cesaria', 'PTT', 2, 'Dokter Poliklinik', 13, 'avatar.png'),
(364, '198608022017010000000', '198608022017010000000', 'M. Risal Efendi', 'PTT', 2, 'Perawat', 13, 'avatar.png'),
(365, '199704022017010000000', '199704022017010000000', 'Tabah Hegar Pamungkas', 'PTT', 2, 'Staf Keuangan', 13, 'avatar.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_riil`
--

CREATE TABLE IF NOT EXISTS `tb_riil` (
  `id_riil` int(11) NOT NULL,
  `id_spd` int(11) NOT NULL,
  `id_peg` int(11) NOT NULL,
  `id_rincian` int(11) NOT NULL,
  `uraian_harian` text NOT NULL,
  `uraian_harian1` text NOT NULL,
  `uraian_inap` text NOT NULL,
  `uraian_taxi_berangkat` text NOT NULL,
  `uraian_taxi_kembali` text NOT NULL,
  `uraian_pasport` text NOT NULL,
  `uraian_reprentasi` text NOT NULL,
  `jml_lain` double NOT NULL,
  `uraian_lain` text NOT NULL,
  `id_satker` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_riil`
--

INSERT INTO `tb_riil` (`id_riil`, `id_spd`, `id_peg`, `id_rincian`, `uraian_harian`, `uraian_harian1`, `uraian_inap`, `uraian_taxi_berangkat`, `uraian_taxi_kembali`, `uraian_pasport`, `uraian_reprentasi`, `jml_lain`, `uraian_lain`, `id_satker`) VALUES
(1, 2, 3, 3, '', '', 'Uang harian : Biaya penginapan,uang makan, uang saku dan angkutan setempat selama kegiatan di Kuala Lumpur', '', '', 'Uang Peng. Pasport/Exit Permit', 'Uang Representasi', 550001, 'Jalan', 0),
(2, 1, 6, 2, '', '', 'Harian', 'Uang Taxi Cilacap PP', 'Uang Taxi Bandung PP', '', '', 250000, 'Jalan', 0),
(3, 1, 4, 4, '', '', 'Uang Harian', 'Uang Taxi Cilacap PP', 'Uang Taxi Bandung PP', '', '', 0, '-', 0),
(4, 1, 7, 1, '', '', 'Uang Harian', 'Uang Taxi Cilacap PP', 'Uang Taxi Bandung PP', '', '', 0, '-', 0),
(5, 3, 8, 7, '', '', 'Uang Harian\r\n', 'Uang Taxi Cilacap PP', 'Uang Taxi Sidoarjo PP', '', '', 0, '-', 0),
(6, 3, 10, 6, '', '', 'Uang Harian', 'Uang Taxi Cilacap PP', 'Uang Taxi Sidoarjo PP', '', '', 0, '-', 0),
(7, 3, 9, 8, '', '', 'Uang Harian', 'Uang Taxi Cilacap PP', 'Uang Taxi Sidoarjo PP', '', '', 0, '', 0),
(8, 3, 2, 5, '', '', 'Uang Harian', 'Uang Taxi Cilacap PP', 'Uang Taxi Sidoarjo PP', '', '', 0, '-', 0),
(9, 5, 8, 11, '', '', 'Uang penginapan hotel di JKT', 'Pakai grab taxi CLP', 'Taksi Tangerang', '', '', 150000, 'Fee tamu', 0),
(10, 10, 3, 14, 'Uang Harian 100% di Tokyo', 'Uang Harian 30%', '', '', '', '', 'Reprentasi', 350000, 'Fee', 13);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rincian`
--

CREATE TABLE IF NOT EXISTS `tb_rincian` (
  `id_rincian` int(11) NOT NULL,
  `id_spd` int(11) NOT NULL,
  `id_peg` int(11) NOT NULL,
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
  `id_satker` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rincian`
--

INSERT INTO `tb_rincian` (`id_rincian`, `id_spd`, `id_peg`, `jml_inap`, `nilai_inap`, `ket_inap`, `jml_berangkat`, `nilai_berangkat`, `ket_berangkat`, `jml_kembali`, `nilai_kembali`, `ket_kembali`, `jml_taxi_berangkat`, `nilai_taxi_berangkat`, `ket_taxi_berangkat`, `jml_taxi_kembali`, `nilai_taxi_kembali`, `ket_taxi_kembali`, `jml_harian`, `nilai_harian`, `ket_harian`, `jml_harian1`, `nilai_harian1`, `ket_harian1`, `jml_saku`, `nilai_saku`, `ket_saku`, `uraian_lain`, `jml_lain`, `nilai_lain`, `ket_lain`, `jml_pasport`, `nilai_pasport`, `ket_pasport`, `jml_reprentasi`, `nilai_reprentasi`, `ket_reprentasi`, `uang_muka`, `total`, `id_satker`) VALUES
(1, 1, 7, 3, 350000, '-', 1, 750000, '-', 1, 750000, '-', 2, 55000, '-', 2, 75000, '-', 4, 250000, '-', 0, 0, '', 0, 0, '', '-', 0, 0, '-', 0, 0, '', 0, 0, '', 0, 3810000, 0),
(2, 1, 6, 3, 350000, '-', 1, 750000, '-', 1, 750000, '-', 2, 55000, '-', 2, 75000, '-', 3, 400000, '-', 0, 0, '', 0, 0, '', 'Makan dan Jalan', 3, 150000, '-', 0, 0, '', 0, 0, '', 0, 4460000, 0),
(3, 2, 3, 0, 0, '', 1, 110000000, '-', 0, 0, '', 0, 0, '', 0, 0, '', 4, 5522790, '-', 0, 0, '', 0, 0, '', 'Jalan', 3, 545000, '-', 1, 373000, '-', 1, 1050000, '-', 0, 135149160, 0),
(4, 1, 4, 1, 2500000, '-', 1, 750000, '-', 1, 750000, '-', 2, 55000, '-', 2, 75000, '-', 4, 250000, '-', 0, 0, '', 0, 0, '', '-', 0, 0, '-', 0, 0, '', 0, 0, '', 0, 5260000, 0),
(5, 3, 2, 1, 2500000, '-', 1, 750000, '-', 1, 750000, '-', 2, 55000, '-', 2, 75000, '-', 4, 250000, '-', 0, 0, '', 0, 0, '', '-', 0, 0, '', 0, 0, '', 0, 0, '', 0, 5260000, 0),
(6, 3, 10, 1, 2500000, '-', 1, 750000, '-', 1, 750000, '-', 2, 55000, '-', 2, 75000, '-', 4, 250000, '-', 0, 0, '', 0, 0, '', '-', 0, 0, '', 0, 0, '', 0, 0, '', 0, 5260000, 0),
(7, 3, 8, 1, 2500000, '-', 1, 750000, '-', 1, 750000, '-', 2, 55000, '-', 2, 75000, '-', 4, 250000, '-', 0, 0, '', 0, 0, '', '-', 0, 0, '', 0, 0, '', 0, 0, '', 0, 5260000, 0),
(8, 3, 9, 1, 2500000, '-', 1, 750000, '-', 1, 750000, '-', 2, 55000, '-', 2, 75000, '-', 4, 250000, '-', 0, 0, '', 0, 0, '', '-', 0, 0, '', 0, 0, '', 0, 0, '', 0, 5260000, 0),
(9, 5, 6, 1, 3200000, '-', 1, 850000, '-', 1, 950000, '-', 2, 95000, '-', 2, 105000, '-', 4, 350000, '-', 0, 0, '', 0, 0, '', 'Jalan dan Makan', 1, 550000, '-', 0, 0, '', 0, 0, '', 0, 7350000, 0),
(10, 5, 10, 1, 3200000, '-', 1, 850000, '-', 1, 950000, '-', 2, 95000, '-', 2, 105000, '-', 4, 350000, '-', 0, 0, '', 0, 0, '', 'Jalan dan Makan', 1, 550000, '-', 0, 0, '', 0, 0, '', 0, 7350000, 0),
(11, 5, 8, 1, 3200000, '-', 1, 850000, '-', 1, 950000, '-', 2, 95000, '-', 2, 105000, '-', 4, 350000, '-', 0, 0, '', 2, 75000, '2 Kali', 'Jalan dan Makan', 1, 550000, '-', 0, 0, '', 0, 0, '', 0, 7500000, 0),
(12, 6, 9, 4, 750000, 'Hotel', 1, 450000, '-', 1, 375000, '-', 2, 25000, 'Grab', 2, 21000, 'Grab', 4, 380000, '-', 0, 0, '', 2, 150000, '-', 'Fee Tamu', 1, 50000, '-', 0, 0, '', 0, 0, '', 0, 5787000, 13),
(13, 6, 10, 4, 453000, 'Hotel kelas A', 1, 359000, '-', 1, 290000, '-', 1, 100000, '-', 1, 75000, '-', 3, 325000, '-', 0, 0, '', 2, 150000, '-', 'Voucher', 1, 250000, '-', 0, 0, '', 0, 0, '', 500000, 4161000, 13),
(14, 10, 3, 0, 0, '', 1, 14500000, '-', 0, 0, '', 0, 0, '', 0, 0, '', 7, 500000, '-', 7, 150000, 'Harian 30%', 0, 0, '', 'Uang Saku Rapat', 4, 350000, '-', 1, 7500000, '-', 1, 1500000, '-', 2750000, 21950000, 13),
(15, 11, 5, 0, 0, '', 1, 8500000, '-', 0, 0, '', 0, 0, '', 0, 0, '', 6, 600000, '-', 6, 180000, 'Harian 30%', 0, 0, '', 'Fee Cargo', 1, 350000, '-', 0, 0, '', 1, 1750000, '-', 3250000, 15280000, 0),
(16, 11, 9, 0, 0, '', 1, 8500000, '-', 0, 0, '', 0, 0, '', 0, 0, '', 6, 600000, '-', 6, 180000, '-', 0, 0, '', 'Cargo', 1, 550000, '-', 0, 0, '', 1, 2000000, '-', 3500000, 15730000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_satker`
--

CREATE TABLE IF NOT EXISTS `tb_satker` (
  `id_satker` int(11) NOT NULL,
  `satker` varchar(255) NOT NULL,
  `id_kpa` int(11) DEFAULT NULL,
  `id_ppk` int(11) DEFAULT NULL,
  `id_bendahara` int(11) DEFAULT NULL,
  `no_ppk` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_satker`
--

INSERT INTO `tb_satker` (`id_satker`, `satker`, `id_kpa`, `id_ppk`, `id_bendahara`, `no_ppk`) VALUES
(0, 'Subdit Pengawasan Dalam', 3, 66, 5, '1'),
(13, 'Subdit Pengawasan Luar', 4, 12, 5, '2');

--
-- Triggers `tb_satker`
--
DELIMITER $$
CREATE TRIGGER `tb_satker_after_insert` AFTER INSERT ON `tb_satker`
 FOR EACH ROW BEGIN
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
PEJABAT PEMBUAT KOMITMEN', NEW.id_ppk, 'BENDAHARA PENGELUARAN SATKER', NEW.id_bendahara, NEW.id_satker);

DELETE FROM tb_ttdspd where id_satker = NEW.id_satker;
INSERT INTO tb_ttdspd (`teks`, `id_peg`, `id_satker`) 
    VALUES ('a.n. KUASA PENGGUNA ANGGARAN<br />
PEJABAT PEMBUAT KOMITMEN', NEW.id_ppk, NEW.id_satker);

INSERT INTO tb_ta (`tahun`, `pagu_ln`, `pagu_dn`, `pagu_dk`, `id_satker`) VALUES (YEAR(CURDATE()), '0', '0', '0', NEW.id_satker);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tb_satker_after_update` AFTER UPDATE ON `tb_satker`
 FOR EACH ROW BEGIN

 
UPDATE tb_ttdkwitansi A SET A.id_peg1 = NEW.id_ppk, A.id_peg2= NEW.id_bendahara WHERE A.id_satker = NEW.id_satker;
UPDATE tb_ttdnominatif A SET A.id_peg1 = NEW.id_ppk, A.id_peg2= NEW.id_bendahara WHERE A.id_satker = NEW.id_satker;
UPDATE tb_ttdrincian A SET A.id_peg1 = NEW.id_ppk, A.id_peg2= NEW.id_bendahara WHERE A.id_satker = NEW.id_satker;
UPDATE tb_ttdspd2 A SET A.id_peg1 = NEW.id_ppk, A.id_peg2= NEW.id_bendahara WHERE A.id_satker = NEW.id_satker;

UPDATE tb_ttdriil A SET A.id_peg = NEW.id_ppk WHERE A.id_satker = NEW.id_satker;
UPDATE tb_ttdspd A SET A.id_peg = NEW.id_ppk WHERE A.id_satker = NEW.id_satker;


END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_setup`
--

CREATE TABLE IF NOT EXISTS `tb_setup` (
  `id_setup` int(11) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_setup`
--

INSERT INTO `tb_setup` (`id_setup`, `instansi`, `kota`, `alamat`) VALUES
(1, 'Dinas Pekerjaan Umum dan Penataan Ruang', 'Jakarta Pusat', 'Jl. Raya Pesanggrahan 20, Cilacap 53274');

-- --------------------------------------------------------

--
-- Table structure for table `tb_spd`
--

CREATE TABLE IF NOT EXISTS `tb_spd` (
  `id_spd` int(11) NOT NULL,
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
  `id_satker` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_spd`
--

INSERT INTO `tb_spd` (`id_spd`, `nomor`, `tgl`, `pegawai`, `keperluan`, `asal`, `tujuan`, `tgl_berangkat`, `tgl_kembali`, `no_sprin`, `tgl_sprin`, `satker`, `ta`, `ma`, `jenis_pengeluaran`, `kelengkapan`, `pejabat`, `tingkat_biaya`, `transport`, `pengikut`, `ket`, `semua_peg`, `id_satker`) VALUES
(1, 'SPD-019/PPK.1/10/2018', '2018-10-01', 7, 'Mengikuti pertemuan teknis bidang pengamanan (security and evacuation plan) dengan Meeting Team Secretariat dan melakukan observasi pelaksanaan SM 2018', 'Cilacap', 7, '2018-10-08', '2018-10-11', 'SPRN201', '2018-09-30', 0, 1, 'MA2018', 'Perjalanan Dinasd', '1,2', 'Kurnia KM', 'Rutin', 1, '6,4', 'Ket', '7,6,4', 0),
(2, 'SPD-004/PPK.1/08/2018', '2018-08-27', 3, 'Mengikuti pertemuan teknis bidang pengamanan (security and evacuation plan) dengan Meeting Team Secretariat dan melakukan observasi pelaksanaan SM 2018', 'Cilacap', 19, '2018-10-01', '2018-10-08', 'SPRN201', '2018-09-02', 1, 1, 'MA2018', 'Perjalanan Dinas', '1,2,3,5', 'Kurnia KM', 'Rutin', 3, '', 'Keterangan', '3', 0),
(3, 'SPD-003/PPK.2/11/2018', '2018-11-01', 2, 'Anggota Perwakilan Wilayah IV Pelatihan K3LH Pratama', 'Cilacap', 5, '2018-10-30', '2018-10-31', 'S-01', '2018-10-01', 1, 1, 'MA2018', 'Dinas', '1', 'SEKRETARIS DAERAH', 'Rutin', 1, '10,8,9', '-', '2,10,8,9', 0),
(4, 'SPD-005/PPK.3/11/2018', '2018-11-06', 7, 'Rapat Bualanan Ke XI', 'Cilacap', 25, '2018-11-06', '2018-11-06', '11', '2018-11-05', 1, 1, 'm1', 'Dinas', '1', 'BUPATI', 'Rutin', 1, '2', '-', '7,2', 0),
(5, 'SPD-001/PPK.6/10/2018', '2018-10-28', 8, 'Mengikuti Peserta Pengawalan Latihan Keamanan JHY XI', 'Cilacap', 16, '2018-11-05', '2018-11-08', '1234-SP', '2018-10-28', 1, 1, 'MA2018-1', 'Jalan Dinas', '1,2,3,4', 'KASUBAG UMUM', 'Rutin', 1, '10,6', '-', '8,10,6', 0),
(6, 'SPD-002/PPK.5/11/2018', '2018-11-20', 9, 'Menghadiri Rapat Evaluasi Laporan Kerja 2018 Semester I Bidang Pekerjaan Umum Jalan Provinsi Ring 1 di Jakarta', 'Cilacap', 8, '2018-11-05', '2018-11-08', 'REF2018-01', '2018-09-30', 1, 1, 'MA2018-II', 'Jalan Dinas', '1,2,3', 'KASUBBAG PU', 'Rutin', 1, '10,1', '-', '9,10,1', 13),
(7, 'SPD-001/PPK.2/12/2018', '2018-12-04', 6, 'Menghadiri Rapat Bulanan XII di Kanwil III', 'Cilacap', 25, '2018-12-10', '2018-12-12', 'REF2018-02', '2018-11-20', 1, 1, 'MA2018-I', 'Jalan Dinas', '1,2,3', 'KASUBBAG TR', 'Rutin', 1, '4,10,1,12', '-', '6,4,10,1,12', 13),
(8, 'SPD-001/PPK.1/05/2019', '2019-05-01', 2, 'Menghadiri Rapat Evaluasi Laporan Kerja 2018 Semester II Bidang Pekerjaan Umum Jalan Provinsi Ring 1 di Jakarta', 'Cilacap', 8, '2019-05-27', '2019-05-31', 'REF2019-01', '2019-05-21', 1, 2, 'MA2019/A', 'Jalan Dinas', '1,2,3,4,5,6,7,8', 'KASUBBAG PU', 'Rutin', 3, '7,3,11', '-', '2,7,3,11', 13),
(9, 'SPD-002/PPK.4/05/2019', '2019-05-01', 8, 'Menindaklanjuti Hasil Keputusan Pansus No. 13B Tahun 2019 Tentang Jaminan Pendidikan Moral dan Sosial', 'Cilacap', 7, '2019-06-03', '2019-06-06', '092019', '2019-04-30', 1, 2, 'MA2019', 'Jaldis', '3,4', 'KASUBBAG', 'Rutin', 1, '10,12', '-', '8,10,12', 13),
(10, 'SPD-007/PPK.5/05/2019', '2019-05-08', 3, 'Rapat Anggota PKPL IV Tahun 2019 dalam Pertemuan Pengurus ke 4', 'Cilacap', 21, '2019-06-02', '2019-06-10', 'LN2019', '2019-04-30', 1, 2, 'MALN09', 'JALDIS', '1,3,4', 'KABAG', 'Rutin', 3, '', '-', '3', 13),
(11, 'SPD-003/PPK.3/04/2019', '2019-04-28', 5, 'Konverensi Asia Pasific XII Perwakilan di Filipina', 'Cilacap', 20, '2019-05-20', '2019-05-26', 'LN201901', '2019-04-07', 0, 2, 'MALN18', 'JALDI', '1,2,3', 'KASUBBAG', 'Rutin', 3, '293,220', '-', '5,293,220', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ta`
--

CREATE TABLE IF NOT EXISTS `tb_ta` (
  `id_ta` int(11) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `pagu_ln` double NOT NULL,
  `pagu_dn` double NOT NULL,
  `pagu_dk` double NOT NULL,
  `id_satker` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ta`
--

INSERT INTO `tb_ta` (`id_ta`, `tahun`, `pagu_ln`, `pagu_dn`, `pagu_dk`, `id_satker`) VALUES
(1, '2018', 756000000, 1025000000, 21000000, 0),
(2, '2019', 825000000, 1100000000, 25000000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transport`
--

CREATE TABLE IF NOT EXISTS `tb_transport` (
  `id_transport` int(11) NOT NULL,
  `transport` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transport`
--

INSERT INTO `tb_transport` (`id_transport`, `transport`) VALUES
(1, 'Darat'),
(2, 'Laut'),
(3, 'Udara');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ttdkwitansi`
--

CREATE TABLE IF NOT EXISTS `tb_ttdkwitansi` (
  `id_ttdkwitansi` int(11) NOT NULL,
  `teks1` text NOT NULL,
  `id_peg1` int(11) NOT NULL,
  `teks2` text NOT NULL,
  `id_peg2` int(11) NOT NULL,
  `id_satker` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ttdkwitansi`
--

INSERT INTO `tb_ttdkwitansi` (`id_ttdkwitansi`, `teks1`, `id_peg1`, `teks2`, `id_peg2`, `id_satker`) VALUES
(1, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 66, 'BENDAHARA PENGELUARAN SATKER', 5, 0),
(12, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 12, 'BENDAHARA PENGELUARAN SATKER', 5, 13),
(13, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 12, 'BENDAHARA PENGELUARAN SATKER', 5, 14);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ttdnominatif`
--

CREATE TABLE IF NOT EXISTS `tb_ttdnominatif` (
  `id_ttdnominatif` int(11) NOT NULL,
  `teks1` text NOT NULL,
  `id_peg1` int(11) NOT NULL,
  `teks2` text NOT NULL,
  `id_peg2` int(11) NOT NULL,
  `id_satker` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ttdnominatif`
--

INSERT INTO `tb_ttdnominatif` (`id_ttdnominatif`, `teks1`, `id_peg1`, `teks2`, `id_peg2`, `id_satker`) VALUES
(1, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 66, 'BENDAHARA PENGELUARAN SATKER', 5, 0),
(2, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 12, 'BENDAHARA PENGELUARAN SATKER', 5, 13),
(3, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 12, 'BENDAHARA PENGELUARAN SATKER', 5, 14);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ttdriil`
--

CREATE TABLE IF NOT EXISTS `tb_ttdriil` (
  `id_ttdriil` int(11) NOT NULL,
  `teks` text NOT NULL,
  `id_peg` int(11) NOT NULL,
  `id_satker` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ttdriil`
--

INSERT INTO `tb_ttdriil` (`id_ttdriil`, `teks`, `id_peg`, `id_satker`) VALUES
(1, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 66, 0),
(2, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 12, 13),
(3, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 12, 14);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ttdrincian`
--

CREATE TABLE IF NOT EXISTS `tb_ttdrincian` (
  `id_ttdrincian` int(11) NOT NULL,
  `teks1` text NOT NULL,
  `id_peg1` int(11) NOT NULL,
  `teks2` text NOT NULL,
  `id_peg2` int(11) NOT NULL,
  `id_satker` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ttdrincian`
--

INSERT INTO `tb_ttdrincian` (`id_ttdrincian`, `teks1`, `id_peg1`, `teks2`, `id_peg2`, `id_satker`) VALUES
(1, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 66, 'BENDAHARA PENGELUARAN SATKER', 5, 0),
(2, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 12, 'BENDAHARA PENGELUARAN SATKER', 5, 13),
(3, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 12, 'BENDAHARA PENGELUARAN SATKER', 5, 14);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ttdspd`
--

CREATE TABLE IF NOT EXISTS `tb_ttdspd` (
  `id_ttdspd` int(11) NOT NULL,
  `teks` text NOT NULL,
  `id_peg` int(11) NOT NULL,
  `id_satker` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ttdspd`
--

INSERT INTO `tb_ttdspd` (`id_ttdspd`, `teks`, `id_peg`, `id_satker`) VALUES
(1, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 66, 0),
(2, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 12, 13),
(3, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 12, 14);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ttdspd2`
--

CREATE TABLE IF NOT EXISTS `tb_ttdspd2` (
  `id_ttdspd2` int(11) NOT NULL,
  `teks1` text NOT NULL,
  `id_peg1` int(11) NOT NULL,
  `teks2` text NOT NULL,
  `id_peg2` int(11) NOT NULL,
  `id_satker` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ttdspd2`
--

INSERT INTO `tb_ttdspd2` (`id_ttdspd2`, `teks1`, `id_peg1`, `teks2`, `id_peg2`, `id_satker`) VALUES
(1, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 66, 'BENDAHARA PENGELUARAN SATKER', 5, 0),
(2, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 12, 'BENDAHARA PENGELUARAN SATKER', 5, 13),
(3, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 12, 'BENDAHARA PENGELUARAN SATKER', 5, 14);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tujuan`
--

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
  `lain` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tujuan`
--

INSERT INTO `tb_tujuan` (`id_tujuan`, `tujuan`, `jenis`, `harian`, `saku`, `inap`, `meeting`, `taksi`, `transport`, `lain`) VALUES
(1, 'Denpasar', 'Dalam Negeri', 380000, 450000, 550000, 250000, 200000, 700000, 100000),
(2, 'Kuta', 'Dalam Negeri', 380000, 450000, 750000, 250000, 150000, 2500000, 125000),
(3, 'Surabaya', 'Dalam Negeri', 380000, 0, 700000, 0, 0, 1500000, 0),
(4, 'Makassar', 'Dalam Negeri', 380000, 0, 750000, 0, 0, 2500000, 250000),
(5, 'Sidoarjo', 'Dalam Negeri', 380000, 0, 700000, 0, 0, 1500000, 0),
(6, 'Semarang', 'Dalam Negeri', 380000, 0, 750000, 0, 0, 2500000, 0),
(7, 'Bandung', 'Dalam Negeri', 380000, 200000, 750000, 150000, 75000, 2500000, 250000),
(8, 'Jakarta', 'Dalam Negeri', 380000, 0, 1250000, 0, 0, 4500000, 0),
(9, 'Medan', 'Dalam Negeri', 380000, 0, 1250000, 0, 0, 4500000, 250000),
(10, 'Jambi', 'Dalam Negeri', 380000, 0, 700000, 0, 0, 4500000, 250000),
(11, 'Samarinda', 'Dalam Negeri', 380000, 0, 1250000, 0, 0, 2500000, 250000),
(12, 'Pontianak', 'Dalam Negeri', 380000, 0, 700000, 0, 0, 2500000, 250000),
(13, 'Jayapura', 'Dalam Negeri', 380000, 0, 2250000, 0, 0, 5500000, 250000),
(14, 'Manokwari', 'Dalam Negeri', 380000, 0, 1250000, 0, 0, 5500000, 250000),
(15, 'Fakfak', 'Dalam Negeri', 380000, 0, 700000, 0, 0, 5500000, 250000),
(16, 'Tangerang', 'Dalam Negeri', 380000, 0, 1250000, 0, 0, 2500000, 0),
(17, 'Lombok', 'Dalam Negeri', 380000, 0, 700000, 0, 0, 1500000, 0),
(18, 'Ambon', 'Dalam Negeri', 380000, 0, 1250000, 0, 0, 4500000, 250000),
(19, 'Kuala Lumpur', 'Luar Negeri', 1380000, 0, 4250000, 0, 0, 7500000, 600000),
(20, 'Manila', 'Luar Negeri', 1080000, 0, 0, 0, 0, 7500000, 0),
(21, 'Tokyo', 'Luar Negeri', 2250000, 0, 0, 0, 0, 7500000, 0),
(22, 'Bangkok', 'Luar Negeri', 2250000, 0, 5000000, 0, 0, 7500000, 600000),
(23, 'Cilacap', 'Dalam Kota', 380000, 0, 0, 0, 0, 0, 0),
(24, 'New Delhi', 'Luar Negeri', 550000, 0, 2500000, 0, 0, 4000000, 600000),
(25, 'Banyumas', 'Dalam Kota', 425000, 0, 0, 0, 0, 0, 0),
(26, 'Serang', 'Dalam Negeri', 380000, 250000, 750000, 250000, 150000, 1750000, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` varchar(32) NOT NULL,
  `id_satker` int(11) NOT NULL,
  `nama_user` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hak_akses` varchar(16) NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `id_satker`, `nama_user`, `password`, `hak_akses`, `avatar`) VALUES
('admin', 0, 'Satya Nugraha Adi', '202cb962ac59075b964b07152d234b70', 'Admin', ''),
('astuti', 0, 'Ida Ayu Astuti', '202cb962ac59075b964b07152d234b70', 'Admin', ''),
('natasya', 13, 'Natasya Sari', '202cb962ac59075b964b07152d234b70', 'Admin', 'avatar3.png'),
('superadmin', 0, 'Edi Setiawan', '202cb962ac59075b964b07152d234b70', 'Superadmin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_gol`
--
ALTER TABLE `tb_gol`
  ADD PRIMARY KEY (`id_gol`);

--
-- Indexes for table `tb_kelengkapan`
--
ALTER TABLE `tb_kelengkapan`
  ADD PRIMARY KEY (`id_kelengkapan`);

--
-- Indexes for table `tb_kwitansi`
--
ALTER TABLE `tb_kwitansi`
  ADD PRIMARY KEY (`id_kwitansi`);

--
-- Indexes for table `tb_logo`
--
ALTER TABLE `tb_logo`
  ADD PRIMARY KEY (`id_logo`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id_peg`);

--
-- Indexes for table `tb_riil`
--
ALTER TABLE `tb_riil`
  ADD PRIMARY KEY (`id_riil`);

--
-- Indexes for table `tb_rincian`
--
ALTER TABLE `tb_rincian`
  ADD PRIMARY KEY (`id_rincian`);

--
-- Indexes for table `tb_satker`
--
ALTER TABLE `tb_satker`
  ADD PRIMARY KEY (`id_satker`);

--
-- Indexes for table `tb_setup`
--
ALTER TABLE `tb_setup`
  ADD PRIMARY KEY (`id_setup`);

--
-- Indexes for table `tb_spd`
--
ALTER TABLE `tb_spd`
  ADD PRIMARY KEY (`id_spd`);

--
-- Indexes for table `tb_ta`
--
ALTER TABLE `tb_ta`
  ADD PRIMARY KEY (`id_ta`),
  ADD KEY `FK_tb_ta_tb_satker` (`id_satker`);

--
-- Indexes for table `tb_transport`
--
ALTER TABLE `tb_transport`
  ADD PRIMARY KEY (`id_transport`);

--
-- Indexes for table `tb_ttdkwitansi`
--
ALTER TABLE `tb_ttdkwitansi`
  ADD PRIMARY KEY (`id_ttdkwitansi`);

--
-- Indexes for table `tb_ttdnominatif`
--
ALTER TABLE `tb_ttdnominatif`
  ADD PRIMARY KEY (`id_ttdnominatif`);

--
-- Indexes for table `tb_ttdriil`
--
ALTER TABLE `tb_ttdriil`
  ADD PRIMARY KEY (`id_ttdriil`);

--
-- Indexes for table `tb_ttdrincian`
--
ALTER TABLE `tb_ttdrincian`
  ADD PRIMARY KEY (`id_ttdrincian`);

--
-- Indexes for table `tb_ttdspd`
--
ALTER TABLE `tb_ttdspd`
  ADD PRIMARY KEY (`id_ttdspd`);

--
-- Indexes for table `tb_ttdspd2`
--
ALTER TABLE `tb_ttdspd2`
  ADD PRIMARY KEY (`id_ttdspd2`);

--
-- Indexes for table `tb_tujuan`
--
ALTER TABLE `tb_tujuan`
  ADD PRIMARY KEY (`id_tujuan`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id_peg` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=366;
--
-- AUTO_INCREMENT for table `tb_satker`
--
ALTER TABLE `tb_satker`
  MODIFY `id_satker` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tb_spd`
--
ALTER TABLE `tb_spd`
  MODIFY `id_spd` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_ta`
--
ALTER TABLE `tb_ta`
  MODIFY `id_ta` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_ttdkwitansi`
--
ALTER TABLE `tb_ttdkwitansi`
  MODIFY `id_ttdkwitansi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tb_ttdnominatif`
--
ALTER TABLE `tb_ttdnominatif`
  MODIFY `id_ttdnominatif` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_ttdriil`
--
ALTER TABLE `tb_ttdriil`
  MODIFY `id_ttdriil` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_ttdrincian`
--
ALTER TABLE `tb_ttdrincian`
  MODIFY `id_ttdrincian` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_ttdspd`
--
ALTER TABLE `tb_ttdspd`
  MODIFY `id_ttdspd` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_ttdspd2`
--
ALTER TABLE `tb_ttdspd2`
  MODIFY `id_ttdspd2` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_ta`
--
ALTER TABLE `tb_ta`
  ADD CONSTRAINT `FK_tb_ta_tb_satker` FOREIGN KEY (`id_satker`) REFERENCES `tb_satker` (`id_satker`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
