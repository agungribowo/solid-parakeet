-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2019 at 08:17 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

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
  `id_rincian` int(11) NOT NULL,
  `jumlah` double NOT NULL,
  `ta` int(11) NOT NULL,
  `jns_tuj` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kwitansi`
--

INSERT INTO `tb_kwitansi` (`id_kwitansi`, `id_spd`, `id_peg`, `id_rincian`, `jumlah`, `ta`, `jns_tuj`) VALUES
(1, 3, 9, 0, 760000, 1, 'Dalam Kota'),
(2, 4, 2, 0, 380000, 1, 'Dalam Kota'),
(3, 2, 3, 3, 135149160, 1, 'Luar Negeri'),
(4, 1, 6, 2, 2700000, 1, 'Dalam Negeri'),
(5, 4, 7, 0, 425000, 1, 'Dalam Kota'),
(6, 1, 4, 4, 5260000, 1, 'Dalam Negeri'),
(7, 1, 7, 1, 3810000, 1, 'Dalam Negeri'),
(8, 3, 8, 7, 5260000, 1, 'Dalam Negeri'),
(9, 3, 9, 8, 5260000, 1, 'Dalam Negeri'),
(10, 3, 10, 6, 5260000, 1, 'Dalam Negeri');

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
(1, '20181120-150856-APP.jpg', '20181120-151821-PRINT.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nominatif`
--

CREATE TABLE IF NOT EXISTS `tb_nominatif` (
  `id_spd` int(11) NOT NULL,
  `pegawai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nominatif`
--

INSERT INTO `tb_nominatif` (`id_spd`, `pegawai`) VALUES
(9, '8'),
(9, '10'),
(9, '12'),
(8, '2'),
(8, '7'),
(8, '3'),
(8, '11'),
(7, '6'),
(7, '4'),
(7, '10'),
(7, '1'),
(7, '12'),
(6, '9'),
(6, '10'),
(6, '1'),
(5, '8'),
(5, '10'),
(5, '6'),
(4, '7'),
(4, '2'),
(3, '2'),
(3, '10'),
(3, '8'),
(3, '9'),
(2, '3'),
(1, '7'),
(1, '6'),
(1, '4'),
(10, '3'),
(11, '5'),
(11, '9');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE IF NOT EXISTS `tb_pegawai` (
  `id_peg` int(11) NOT NULL,
  `nip_val` varchar(4) NOT NULL,
  `nip` varchar(64) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `pangkat` varchar(64) NOT NULL,
  `gol` int(11) NOT NULL,
  `jab` varchar(64) NOT NULL,
  `satker` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_peg`, `nip_val`, `nip`, `nama`, `pangkat`, `gol`, `jab`, `satker`, `foto`) VALUES
(1, 'NRP', '8105141201', 'Aulia Akbar Tina', 'PENGATUIR', 5, 'STAFF', 1, ''),
(2, 'NRP', '8105141202', 'Joko Hasibuan, SH', 'PEMBINA', 11, 'PPK', 1, ''),
(3, 'NRP', '8105141203', 'Rajasa Putra Pertama', 'PENGATUIR', 5, 'STAFF', 1, ''),
(4, 'NRP', '7501018707', 'Aimudin Kusuma, Msc', 'PEMBINA', 11, 'KPA', 1, ''),
(5, 'NRP', '6608033909', 'Burhanudin Harahap H', 'PEMBINA', 11, 'BENDAHARA', 1, ''),
(6, 'NRP', '8105141205', 'Rahman Sutarya Putra', 'PENATA', 9, 'KOORDINATOR', 1, ''),
(7, 'NRP', '2434018701', 'Nababan Sirait A', 'PENATA', 9, 'KOORDINATOR', 1, ''),
(8, 'NRP', '1121018708', 'Shinta Anjani K', 'PENATA', 9, 'KOORDINATOR', 1, ''),
(9, 'NRP', '5121018705', 'Sulastri Satya F', 'PENATA', 9, 'KOORDINATOR', 1, ''),
(10, 'NIP', '2011018701', 'Andrian Adi', 'SUKWAN', 1, '-', 1, ''),
(11, 'NIP', '2011018702', 'Ratnasari KM', 'SUKWAN', 2, '-', 1, ''),
(12, 'NIP', '2011018703', 'Burhan QA', 'HONORER', 2, 'STAFF', 1, '');

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
  `uraian_lain` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_riil`
--

INSERT INTO `tb_riil` (`id_riil`, `id_spd`, `id_peg`, `id_rincian`, `uraian_harian`, `uraian_harian1`, `uraian_inap`, `uraian_taxi_berangkat`, `uraian_taxi_kembali`, `uraian_pasport`, `uraian_reprentasi`, `jml_lain`, `uraian_lain`) VALUES
(1, 2, 3, 3, '', '', 'Uang harian : Biaya penginapan,uang makan, uang saku dan angkutan setempat selama kegiatan di Kuala Lumpur', '', '', 'Uang Peng. Pasport/Exit Permit', 'Uang Representasi', 550001, 'Jalan'),
(2, 1, 6, 2, '', '', 'Harian', 'Uang Taxi Cilacap PP', 'Uang Taxi Bandung PP', '', '', 250000, 'Jalan'),
(3, 1, 4, 4, '', '', 'Uang Harian', 'Uang Taxi Cilacap PP', 'Uang Taxi Bandung PP', '', '', 0, '-'),
(4, 1, 7, 1, '', '', 'Uang Harian', 'Uang Taxi Cilacap PP', 'Uang Taxi Bandung PP', '', '', 0, '-'),
(5, 3, 8, 7, '', '', 'Uang Harian\r\n', 'Uang Taxi Cilacap PP', 'Uang Taxi Sidoarjo PP', '', '', 0, '-'),
(6, 3, 10, 6, '', '', 'Uang Harian', 'Uang Taxi Cilacap PP', 'Uang Taxi Sidoarjo PP', '', '', 0, '-'),
(7, 3, 9, 8, '', '', 'Uang Harian', 'Uang Taxi Cilacap PP', 'Uang Taxi Sidoarjo PP', '', '', 0, ''),
(8, 3, 2, 5, '', '', 'Uang Harian', 'Uang Taxi Cilacap PP', 'Uang Taxi Sidoarjo PP', '', '', 0, '-'),
(9, 5, 8, 11, '', '', 'Uang penginapan hotel di JKT', 'Pakai grab taxi CLP', 'Taksi Tangerang', '', '', 150000, 'Fee tamu'),
(10, 10, 3, 14, 'Uang Harian 100% di Tokyo', 'Uang Harian 30%', '', '', '', '', 'Reprentasi', 350000, 'Fee');

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
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rincian`
--

INSERT INTO `tb_rincian` (`id_rincian`, `id_spd`, `id_peg`, `jml_inap`, `nilai_inap`, `ket_inap`, `jml_berangkat`, `nilai_berangkat`, `ket_berangkat`, `jml_kembali`, `nilai_kembali`, `ket_kembali`, `jml_taxi_berangkat`, `nilai_taxi_berangkat`, `ket_taxi_berangkat`, `jml_taxi_kembali`, `nilai_taxi_kembali`, `ket_taxi_kembali`, `jml_harian`, `nilai_harian`, `ket_harian`, `jml_harian1`, `nilai_harian1`, `ket_harian1`, `jml_saku`, `nilai_saku`, `ket_saku`, `uraian_lain`, `jml_lain`, `nilai_lain`, `ket_lain`, `jml_pasport`, `nilai_pasport`, `ket_pasport`, `jml_reprentasi`, `nilai_reprentasi`, `ket_reprentasi`, `uang_muka`, `total`) VALUES
(1, 1, 7, 3, 350000, '-', 1, 750000, '-', 1, 750000, '-', 2, 55000, '-', 2, 75000, '-', 4, 250000, '-', 0, 0, '', 0, 0, '', '-', 0, 0, '-', 0, 0, '', 0, 0, '', 0, 3810000),
(2, 1, 6, 3, 350000, '-', 1, 750000, '-', 1, 750000, '-', 2, 55000, '-', 2, 75000, '-', 3, 400000, '-', 0, 0, '', 0, 0, '', 'Makan dan Jalan', 3, 150000, '-', 0, 0, '', 0, 0, '', 0, 4460000),
(3, 2, 3, 0, 0, '', 1, 110000000, '-', 0, 0, '', 0, 0, '', 0, 0, '', 4, 5522790, '-', 0, 0, '', 0, 0, '', 'Jalan', 3, 545000, '-', 1, 373000, '-', 1, 1050000, '-', 0, 135149160),
(4, 1, 4, 1, 2500000, '-', 1, 750000, '-', 1, 750000, '-', 2, 55000, '-', 2, 75000, '-', 4, 250000, '-', 0, 0, '', 0, 0, '', '-', 0, 0, '-', 0, 0, '', 0, 0, '', 0, 5260000),
(5, 3, 2, 1, 2500000, '-', 1, 750000, '-', 1, 750000, '-', 2, 55000, '-', 2, 75000, '-', 4, 250000, '-', 0, 0, '', 0, 0, '', '-', 0, 0, '', 0, 0, '', 0, 0, '', 0, 5260000),
(6, 3, 10, 1, 2500000, '-', 1, 750000, '-', 1, 750000, '-', 2, 55000, '-', 2, 75000, '-', 4, 250000, '-', 0, 0, '', 0, 0, '', '-', 0, 0, '', 0, 0, '', 0, 0, '', 0, 5260000),
(7, 3, 8, 1, 2500000, '-', 1, 750000, '-', 1, 750000, '-', 2, 55000, '-', 2, 75000, '-', 4, 250000, '-', 0, 0, '', 0, 0, '', '-', 0, 0, '', 0, 0, '', 0, 0, '', 0, 5260000),
(8, 3, 9, 1, 2500000, '-', 1, 750000, '-', 1, 750000, '-', 2, 55000, '-', 2, 75000, '-', 4, 250000, '-', 0, 0, '', 0, 0, '', '-', 0, 0, '', 0, 0, '', 0, 0, '', 0, 5260000),
(9, 5, 6, 1, 3200000, '-', 1, 850000, '-', 1, 950000, '-', 2, 95000, '-', 2, 105000, '-', 4, 350000, '-', 0, 0, '', 0, 0, '', 'Jalan dan Makan', 1, 550000, '-', 0, 0, '', 0, 0, '', 0, 7350000),
(10, 5, 10, 1, 3200000, '-', 1, 850000, '-', 1, 950000, '-', 2, 95000, '-', 2, 105000, '-', 4, 350000, '-', 0, 0, '', 0, 0, '', 'Jalan dan Makan', 1, 550000, '-', 0, 0, '', 0, 0, '', 0, 7350000),
(11, 5, 8, 1, 3200000, '-', 1, 850000, '-', 1, 950000, '-', 2, 95000, '-', 2, 105000, '-', 4, 350000, '-', 0, 0, '', 2, 75000, '2 Kali', 'Jalan dan Makan', 1, 550000, '-', 0, 0, '', 0, 0, '', 0, 7500000),
(12, 6, 9, 4, 750000, 'Hotel', 1, 450000, '-', 1, 375000, '-', 2, 25000, 'Grab', 2, 21000, 'Grab', 4, 380000, '-', 0, 0, '', 2, 150000, '-', 'Fee Tamu', 1, 50000, '-', 0, 0, '', 0, 0, '', 0, 5787000),
(13, 6, 10, 4, 453000, 'Hotel kelas A', 1, 359000, '-', 1, 290000, '-', 1, 100000, '-', 1, 75000, '-', 3, 325000, '-', 0, 0, '', 2, 150000, '-', 'Voucher', 1, 250000, '-', 0, 0, '', 0, 0, '', 500000, 4161000),
(14, 10, 3, 0, 0, '', 1, 14500000, '-', 0, 0, '', 0, 0, '', 0, 0, '', 7, 500000, '-', 7, 150000, 'Harian 30%', 0, 0, '', 'Uang Saku Rapat', 4, 350000, '-', 1, 7500000, '-', 1, 1500000, '-', 2750000, 21950000),
(15, 11, 5, 0, 0, '', 1, 8500000, '-', 0, 0, '', 0, 0, '', 0, 0, '', 6, 600000, '-', 6, 180000, 'Harian 30%', 0, 0, '', 'Fee Cargo', 1, 350000, '-', 0, 0, '', 1, 1750000, '-', 3250000, 15280000),
(16, 11, 9, 0, 0, '', 1, 8500000, '-', 0, 0, '', 0, 0, '', 0, 0, '', 6, 600000, '-', 6, 180000, '-', 0, 0, '', 'Cargo', 1, 550000, '-', 0, 0, '', 1, 2000000, '-', 3500000, 15730000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_satker`
--

CREATE TABLE IF NOT EXISTS `tb_satker` (
  `id_satker` int(11) NOT NULL,
  `satker` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_satker`
--

INSERT INTO `tb_satker` (`id_satker`, `satker`) VALUES
(1, 'DIRJEN BINA MARGA');

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
(1, 'Dinas Pekerjaan Umum dan Penataan Ruang', 'Daerah Cilacap', 'Jl. Raya Pesanggrahan 20, Cilacap 53274');

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
  `no_sprin` varchar(64) NOT NULL,
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
  `semua_peg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_spd`
--

INSERT INTO `tb_spd` (`id_spd`, `nomor`, `tgl`, `pegawai`, `keperluan`, `asal`, `tujuan`, `tgl_berangkat`, `tgl_kembali`, `no_sprin`, `tgl_sprin`, `satker`, `ta`, `ma`, `jenis_pengeluaran`, `kelengkapan`, `pejabat`, `tingkat_biaya`, `transport`, `pengikut`, `ket`, `semua_peg`) VALUES
(1, 'SPD-019/PPK.1/10/2018', '2018-10-01', 7, 'Mengikuti pertemuan teknis bidang pengamanan (security and evacuation plan) dengan Meeting Team Secretariat dan melakukan observasi pelaksanaan SM 2018', 'Cilacap', 7, '2018-10-08', '2018-10-11', 'SPRN201', '2018-09-30', 1, 1, 'MA2018', 'Perjalanan Dinas', '1,2', 'Kurnia KM', 'Rutin', 1, '6,4', 'Ket', '7,6,4'),
(2, 'SPD-004/PPK.1/08/2018', '2018-08-27', 3, 'Mengikuti pertemuan teknis bidang pengamanan (security and evacuation plan) dengan Meeting Team Secretariat dan melakukan observasi pelaksanaan SM 2018', 'Cilacap', 19, '2018-10-01', '2018-10-08', 'SPRN201', '2018-09-02', 1, 1, 'MA2018', 'Perjalanan Dinas', '1,2,3,5', 'Kurnia KM', 'Rutin', 3, '', 'Keterangan', '3'),
(3, 'SPD-003/PPK.2/11/2018', '2018-11-01', 2, 'Anggota Perwakilan Wilayah IV Pelatihan K3LH Pratama', 'Cilacap', 5, '2018-10-30', '2018-10-31', 'S-01', '2018-10-01', 1, 1, 'MA2018', 'Dinas', '1', 'SEKRETARIS DAERAH', 'Rutin', 1, '10,8,9', '-', '2,10,8,9'),
(4, 'SPD-005/PPK.3/11/2018', '2018-11-06', 7, 'Rapat Bualanan Ke XI', 'Cilacap', 25, '2018-11-06', '2018-11-06', '11', '2018-11-05', 1, 1, 'm1', 'Dinas', '1', 'BUPATI', 'Rutin', 1, '2', '-', '7,2'),
(5, 'SPD-001/PPK.6/10/2018', '2018-10-28', 8, 'Mengikuti Peserta Pengawalan Latihan Keamanan JHY XI', 'Cilacap', 16, '2018-11-05', '2018-11-08', '1234-SP', '2018-10-28', 1, 1, 'MA2018-1', 'Jalan Dinas', '1,2,3,4', 'KASUBAG UMUM', 'Rutin', 1, '10,6', '-', '8,10,6'),
(6, 'SPD-002/PPK.5/11/2018', '2018-11-20', 9, 'Menghadiri Rapat Evaluasi Laporan Kerja 2018 Semester I Bidang Pekerjaan Umum Jalan Provinsi Ring 1 di Jakarta', 'Cilacap', 8, '2018-11-05', '2018-11-08', 'REF2018-01', '2018-09-30', 1, 1, 'MA2018-II', 'Jalan Dinas', '1,2,3', 'KASUBBAG PU', 'Rutin', 1, '10,1', '-', '9,10,1'),
(7, 'SPD-001/PPK.2/12/2018', '2018-12-04', 6, 'Menghadiri Rapat Bulanan XII di Kanwil III', 'Cilacap', 25, '2018-12-10', '2018-12-12', 'REF2018-02', '2018-11-20', 1, 1, 'MA2018-I', 'Jalan Dinas', '1,2,3', 'KASUBBAG TR', 'Rutin', 1, '4,10,1,12', '-', '6,4,10,1,12'),
(8, 'SPD-001/PPK.1/05/2019', '2019-05-01', 2, 'Menghadiri Rapat Evaluasi Laporan Kerja 2018 Semester II Bidang Pekerjaan Umum Jalan Provinsi Ring 1 di Jakarta', 'Cilacap', 8, '2019-05-27', '2019-05-31', 'REF2019-01', '2019-05-21', 1, 2, 'MA2019/A', 'Jalan Dinas', '1,2,3,4,5,6,7,8', 'KASUBBAG PU', 'Rutin', 3, '7,3,11', '-', '2,7,3,11'),
(9, 'SPD-002/PPK.4/05/2019', '2019-05-01', 8, 'Menindaklanjuti Hasil Keputusan Pansus No. 13B Tahun 2019 Tentang Jaminan Pendidikan Moral dan Sosial', 'Cilacap', 7, '2019-06-03', '2019-06-06', '092019', '2019-04-30', 1, 2, 'MA2019', 'Jaldis', '3,4', 'KASUBBAG', 'Rutin', 1, '10,12', '-', '8,10,12'),
(10, 'SPD-007/PPK.5/05/2019', '2019-05-08', 3, 'Rapat Anggota PKPL IV Tahun 2019 dalam Pertemuan Pengurus ke 4', 'Cilacap', 21, '2019-06-02', '2019-06-10', 'LN2019', '2019-04-30', 1, 2, 'MALN09', 'JALDIS', '1,3,4', 'KABAG', 'Rutin', 3, '', '-', '3'),
(11, 'SPD-003/PPK.3/04/2019', '2019-04-28', 5, 'Konverensi Asia Pasific XII Perwakilan di Filipina', 'Cilacap', 20, '2019-05-20', '2019-05-26', 'LN201901', '2019-04-07', 1, 2, 'MALN18', 'JALDIS', '1,2,3', 'KASUBBAG', 'Rutin', 3, '9', '-', '5,9');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ta`
--

CREATE TABLE IF NOT EXISTS `tb_ta` (
  `id_ta` int(11) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `pagu_ln` double NOT NULL,
  `pagu_dn` double NOT NULL,
  `pagu_dk` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ta`
--

INSERT INTO `tb_ta` (`id_ta`, `tahun`, `pagu_ln`, `pagu_dn`, `pagu_dk`) VALUES
(1, '2018', 756000000, 1025000000, 21000000),
(2, '2019', 825000000, 1100000000, 25000000);

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
  `id_peg2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ttdkwitansi`
--

INSERT INTO `tb_ttdkwitansi` (`id_ttdkwitansi`, `teks1`, `id_peg1`, `teks2`, `id_peg2`) VALUES
(1, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 4, 'BENDAHARA PENGELUARAN SATKER', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ttdnominatif`
--

CREATE TABLE IF NOT EXISTS `tb_ttdnominatif` (
  `id_ttdnominatif` int(11) NOT NULL,
  `teks1` text NOT NULL,
  `id_peg1` int(11) NOT NULL,
  `teks2` text NOT NULL,
  `id_peg2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ttdnominatif`
--

INSERT INTO `tb_ttdnominatif` (`id_ttdnominatif`, `teks1`, `id_peg1`, `teks2`, `id_peg2`) VALUES
(1, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 4, 'BENDAHARA KEU SATKER', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ttdriil`
--

CREATE TABLE IF NOT EXISTS `tb_ttdriil` (
  `id_ttdriil` int(11) NOT NULL,
  `teks` text NOT NULL,
  `id_peg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ttdriil`
--

INSERT INTO `tb_ttdriil` (`id_ttdriil`, `teks`, `id_peg`) VALUES
(1, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ttdrincian`
--

CREATE TABLE IF NOT EXISTS `tb_ttdrincian` (
  `id_ttdrincian` int(11) NOT NULL,
  `teks1` text NOT NULL,
  `id_peg1` int(11) NOT NULL,
  `teks2` text NOT NULL,
  `id_peg2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ttdrincian`
--

INSERT INTO `tb_ttdrincian` (`id_ttdrincian`, `teks1`, `id_peg1`, `teks2`, `id_peg2`) VALUES
(1, 'BENDAHARA KEU SATKER', 5, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ttdspd`
--

CREATE TABLE IF NOT EXISTS `tb_ttdspd` (
  `id_ttdspd` int(11) NOT NULL,
  `teks` text NOT NULL,
  `id_peg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ttdspd`
--

INSERT INTO `tb_ttdspd` (`id_ttdspd`, `teks`, `id_peg`) VALUES
(1, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN ', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ttdspd2`
--

CREATE TABLE IF NOT EXISTS `tb_ttdspd2` (
  `id_ttdspd2` int(11) NOT NULL,
  `teks1` text NOT NULL,
  `id_peg1` int(11) NOT NULL,
  `teks2` text NOT NULL,
  `id_peg2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ttdspd2`
--

INSERT INTO `tb_ttdspd2` (`id_ttdspd2`, `teks1`, `id_peg1`, `teks2`, `id_peg2`) VALUES
(1, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 4, 'a.n. KUASA PENGGUNA ANGGARAN<br />\r\nPEJABAT PEMBUAT KOMITMEN', 4);

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
  `nama_user` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hak_akses` varchar(16) NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `password`, `hak_akses`, `avatar`) VALUES
('admin', 'Satya Nugraha Adi', '202cb962ac59075b964b07152d234b70', 'Admin', ''),
('astuti', 'Ida Ayu Astuti', '202cb962ac59075b964b07152d234b70', 'Admin', 'avatar3.png'),
('natasya', 'Natasya Sari', '202cb962ac59075b964b07152d234b70', 'Admin', 'avatar3.png'),
('superadmin', 'Raja Putra Media', '202cb962ac59075b964b07152d234b70', 'Superadmin', '');

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
 ADD PRIMARY KEY (`id_ta`);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
