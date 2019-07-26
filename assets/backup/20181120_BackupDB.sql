DROP TABLE tb_gol;

CREATE TABLE `tb_gol` (
  `id_gol` int(11) NOT NULL,
  `kode_gol` int(1) NOT NULL,
  `gol` varchar(5) NOT NULL,
  PRIMARY KEY (`id_gol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_gol VALUES("1","1","I/D");
INSERT INTO tb_gol VALUES("2","1","I/E");
INSERT INTO tb_gol VALUES("3","2","II/A");
INSERT INTO tb_gol VALUES("4","2","II/B");
INSERT INTO tb_gol VALUES("5","2","II/C");
INSERT INTO tb_gol VALUES("6","3","III/A");
INSERT INTO tb_gol VALUES("7","3","III/B");
INSERT INTO tb_gol VALUES("8","3","III/C");
INSERT INTO tb_gol VALUES("9","3","III/D");
INSERT INTO tb_gol VALUES("11","4","IV/A");
INSERT INTO tb_gol VALUES("12","4","IV/B");



DROP TABLE tb_kelengkapan;

CREATE TABLE `tb_kelengkapan` (
  `id_kelengkapan` int(11) NOT NULL,
  `uraian` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kelengkapan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_kelengkapan VALUES("1","Surat Pemanggilan / ST dari Dirjen atau Instansi terkait");
INSERT INTO tb_kelengkapan VALUES("2","Surat Perintah Tugas dari Kepala");
INSERT INTO tb_kelengkapan VALUES("3","Surat Perjalanan Dinas");
INSERT INTO tb_kelengkapan VALUES("4","Tiket Pesawat / Bis / Kereta api");
INSERT INTO tb_kelengkapan VALUES("5","Boarding Pas");
INSERT INTO tb_kelengkapan VALUES("6","Bukti Pembayaran Penginapan / Hotel");
INSERT INTO tb_kelengkapan VALUES("7","Laporan Pelaksanaan Tugas");
INSERT INTO tb_kelengkapan VALUES("8","Daftar Agenda");



DROP TABLE tb_kwitansi;

CREATE TABLE `tb_kwitansi` (
  `id_kwitansi` int(11) NOT NULL,
  `id_spd` int(11) NOT NULL,
  `id_peg` int(11) NOT NULL,
  `id_rincian` int(11) NOT NULL,
  `jumlah` double NOT NULL,
  `ta` int(11) NOT NULL,
  `jns_tuj` varchar(16) NOT NULL,
  PRIMARY KEY (`id_kwitansi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_kwitansi VALUES("1","3","9","0","760000","1","Dalam Kota");
INSERT INTO tb_kwitansi VALUES("2","4","2","0","380000","1","Dalam Kota");
INSERT INTO tb_kwitansi VALUES("3","2","3","3","135149160","1","Luar Negeri");
INSERT INTO tb_kwitansi VALUES("4","1","6","2","2700000","1","Dalam Negeri");
INSERT INTO tb_kwitansi VALUES("5","4","7","0","425000","1","Dalam Kota");
INSERT INTO tb_kwitansi VALUES("6","1","4","4","5260000","1","Dalam Negeri");
INSERT INTO tb_kwitansi VALUES("7","1","7","1","3810000","1","Dalam Negeri");
INSERT INTO tb_kwitansi VALUES("8","3","8","7","5260000","1","Dalam Negeri");
INSERT INTO tb_kwitansi VALUES("9","3","9","8","5260000","1","Dalam Negeri");
INSERT INTO tb_kwitansi VALUES("10","3","10","6","5260000","1","Dalam Negeri");



DROP TABLE tb_logo;

CREATE TABLE `tb_logo` (
  `id_logo` int(11) NOT NULL,
  `logo1` varchar(255) NOT NULL,
  `logo2` varchar(255) NOT NULL,
  PRIMARY KEY (`id_logo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_logo VALUES("1","20181120-150856-APP.jpg","20181120-151821-PRINT.png");



DROP TABLE tb_nominatif;

CREATE TABLE `tb_nominatif` (
  `id_spd` int(11) NOT NULL,
  `pegawai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_nominatif VALUES("5","8");
INSERT INTO tb_nominatif VALUES("5","10");
INSERT INTO tb_nominatif VALUES("5","6");
INSERT INTO tb_nominatif VALUES("4","7");
INSERT INTO tb_nominatif VALUES("4","2");
INSERT INTO tb_nominatif VALUES("3","2");
INSERT INTO tb_nominatif VALUES("3","10");
INSERT INTO tb_nominatif VALUES("3","8");
INSERT INTO tb_nominatif VALUES("3","9");
INSERT INTO tb_nominatif VALUES("1","7");
INSERT INTO tb_nominatif VALUES("1","6");
INSERT INTO tb_nominatif VALUES("1","4");
INSERT INTO tb_nominatif VALUES("2","3");
INSERT INTO tb_nominatif VALUES("6","9");
INSERT INTO tb_nominatif VALUES("6","10");
INSERT INTO tb_nominatif VALUES("6","1");
INSERT INTO tb_nominatif VALUES("7","6");
INSERT INTO tb_nominatif VALUES("7","4");
INSERT INTO tb_nominatif VALUES("7","10");
INSERT INTO tb_nominatif VALUES("7","1");
INSERT INTO tb_nominatif VALUES("7","12");
INSERT INTO tb_nominatif VALUES("8","6");
INSERT INTO tb_nominatif VALUES("8","7");
INSERT INTO tb_nominatif VALUES("8","3");
INSERT INTO tb_nominatif VALUES("8","11");



DROP TABLE tb_pegawai;

CREATE TABLE `tb_pegawai` (
  `id_peg` int(11) NOT NULL,
  `nip_val` varchar(4) NOT NULL,
  `nip` varchar(64) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `pangkat` varchar(64) NOT NULL,
  `gol` int(11) NOT NULL,
  `jab` varchar(64) NOT NULL,
  `satker` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id_peg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_pegawai VALUES("1","NRP","8105141201","Aulia Akbar Tina","PENGATUIR","5","STAFF","1","");
INSERT INTO tb_pegawai VALUES("2","NRP","8105141202","Joko Hasibuan, SH","PEMBINA","11","PPK","1","");
INSERT INTO tb_pegawai VALUES("3","NRP","8105141203","Rajasa Putra Pertama","PENGATUIR","5","STAFF","1","");
INSERT INTO tb_pegawai VALUES("4","NRP","7501018707","Aimudin Kusuma, Msc","PEMBINA","11","KPA","1","");
INSERT INTO tb_pegawai VALUES("5","NRP","6608033909","Burhanudin Harahap H","PEMBINA","11","BENDAHARA","1","");
INSERT INTO tb_pegawai VALUES("6","NRP","8105141205","Rahman Sutarya Putra","PENATA","9","KOORDINATOR","1","");
INSERT INTO tb_pegawai VALUES("7","NRP","2434018701","Nababan Sirait A","PENATA","9","KOORDINATOR","1","");
INSERT INTO tb_pegawai VALUES("8","NRP","1121018708","Shinta Anjani K","PENATA","9","KOORDINATOR","1","");
INSERT INTO tb_pegawai VALUES("9","NRP","5121018705","Sulastri Satya F","PENATA","9","KOORDINATOR","1","");
INSERT INTO tb_pegawai VALUES("10","NIP","2011018701","Andrian Adi","SUKWAN","1","-","1","");
INSERT INTO tb_pegawai VALUES("11","NIP","2011018702","Ratnasari KM","SUKWAN","2","-","1","");
INSERT INTO tb_pegawai VALUES("12","NIP","2011018703","Burhan QA","HONORER","2","STAFF","1","");



DROP TABLE tb_riil;

CREATE TABLE `tb_riil` (
  `id_riil` int(11) NOT NULL,
  `id_spd` int(11) NOT NULL,
  `id_peg` int(11) NOT NULL,
  `id_rincian` int(11) NOT NULL,
  `uraian_harian` text NOT NULL,
  `uraian_taxi_berangkat` text NOT NULL,
  `uraian_taxi_kembali` text NOT NULL,
  `uraian_pasport` text NOT NULL,
  `uraian_reprentasi` text NOT NULL,
  `jml_lain` double NOT NULL,
  `uraian_lain` text NOT NULL,
  PRIMARY KEY (`id_riil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_riil VALUES("1","2","3","3","Uang harian : Biaya penginapan,uang makan, uang saku dan angkutan setempat selama kegiatan di Kuala Lumpur","","","Uang Peng. Pasport/Exit Permit","Uang Representasi","550001","Jalan");
INSERT INTO tb_riil VALUES("2","1","6","2","Harian","Uang Taxi Cilacap PP","Uang Taxi Bandung PP","","","250000","Jalan");
INSERT INTO tb_riil VALUES("3","1","4","4","Uang Harian","Uang Taxi Cilacap PP","Uang Taxi Bandung PP","","","0","-");
INSERT INTO tb_riil VALUES("4","1","7","1","Uang Harian","Uang Taxi Cilacap PP","Uang Taxi Bandung PP","","","0","-");
INSERT INTO tb_riil VALUES("5","3","8","7","Uang Harian\n","Uang Taxi Cilacap PP","Uang Taxi Sidoarjo PP","","","0","-");
INSERT INTO tb_riil VALUES("6","3","10","6","Uang Harian","Uang Taxi Cilacap PP","Uang Taxi Sidoarjo PP","","","0","-");
INSERT INTO tb_riil VALUES("7","3","9","8","Uang Harian","Uang Taxi Cilacap PP","Uang Taxi Sidoarjo PP","","","0","");
INSERT INTO tb_riil VALUES("8","3","2","5","Uang Harian","Uang Taxi Cilacap PP","Uang Taxi Sidoarjo PP","","","0","-");



DROP TABLE tb_rincian;

CREATE TABLE `tb_rincian` (
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
  `total` double NOT NULL,
  PRIMARY KEY (`id_rincian`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_rincian VALUES("1","1","7","3","350000","-","1","750000","-","1","750000","-","2","55000","-","2","75000","-","4","250000","-","-","0","0","-","0","0","","0","0","","3810000");
INSERT INTO tb_rincian VALUES("2","1","6","3","350000","-","1","750000","-","1","750000","-","2","55000","-","2","75000","-","3","400000","-","Makan dan Jalan","3","150000","-","0","0","","0","0","","4460000");
INSERT INTO tb_rincian VALUES("3","2","3","0","0","","1","110000000","-","0","0","","0","0","","0","0","","4","5522790","-","Jalan","3","545000","-","1","373000","-","1","1050000","-","135149160");
INSERT INTO tb_rincian VALUES("4","1","4","1","2500000","-","1","750000","-","1","750000","-","2","55000","-","2","75000","-","4","250000","-","-","0","0","-","0","0","","0","0","","5260000");
INSERT INTO tb_rincian VALUES("5","3","2","1","2500000","-","1","750000","-","1","750000","-","2","55000","-","2","75000","-","4","250000","-","-","0","0","","0","0","","0","0","","5260000");
INSERT INTO tb_rincian VALUES("6","3","10","1","2500000","-","1","750000","-","1","750000","-","2","55000","-","2","75000","-","4","250000","-","-","0","0","","0","0","","0","0","","5260000");
INSERT INTO tb_rincian VALUES("7","3","8","1","2500000","-","1","750000","-","1","750000","-","2","55000","-","2","75000","-","4","250000","-","-","0","0","","0","0","","0","0","","5260000");
INSERT INTO tb_rincian VALUES("8","3","9","1","2500000","-","1","750000","-","1","750000","-","2","55000","-","2","75000","-","4","250000","-","-","0","0","","0","0","","0","0","","5260000");
INSERT INTO tb_rincian VALUES("9","5","6","1","3200000","-","1","850000","-","1","950000","-","2","95000","-","2","105000","-","4","350000","-","Jalan dan Makan","1","550000","-","0","0","","0","0","","7350000");
INSERT INTO tb_rincian VALUES("10","5","10","1","3200000","-","1","850000","-","1","950000","-","2","95000","-","2","105000","-","4","350000","-","Jalan dan Makan","1","550000","-","0","0","","0","0","","7350000");
INSERT INTO tb_rincian VALUES("11","5","8","1","3200000","-","1","850000","-","1","950000","-","2","95000","-","2","105000","-","4","350000","-","Jalan dan Makan","1","550000","-","0","0","","0","0","","7350000");



DROP TABLE tb_satker;

CREATE TABLE `tb_satker` (
  `id_satker` int(11) NOT NULL,
  `satker` varchar(255) NOT NULL,
  PRIMARY KEY (`id_satker`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_satker VALUES("1","DIRJEN BINA MARGA");



DROP TABLE tb_setup;

CREATE TABLE `tb_setup` (
  `id_setup` int(11) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  PRIMARY KEY (`id_setup`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_setup VALUES("1","Dinas Pekerjaan Umum dan Penataan Ruang","Daerah Cilacap","Jl. Raya Pesanggrahan 20, Kesugihan, Cilacap 53274");



DROP TABLE tb_spd;

CREATE TABLE `tb_spd` (
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
  `semua_peg` varchar(255) NOT NULL,
  PRIMARY KEY (`id_spd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_spd VALUES("1","SPD/DN2018-X/28-01","2018-10-01","7","Mengikuti pertemuan teknis bidang pengamanan (security and evacuation plan) dengan Meeting Team Secretariat dan melakukan observasi pelaksanaan SM 2018","Cilacap","7","2018-10-08","2018-10-11","SPRN201","2018-09-30","1","1","MA2018","Perjalanan Dinas","1,2","Kurnia KM","Rutin","1","6,4","Ket","7,6,4");
INSERT INTO tb_spd VALUES("2","SPD/LN2018-IX/20-01","2018-08-27","3","Mengikuti pertemuan teknis bidang pengamanan (security and evacuation plan) dengan Meeting Team Secretariat dan melakukan observasi pelaksanaan SM 2018","Cilacap","19","2018-10-01","2018-10-08","SPRN201","2018-09-02","1","1","MA2018","Perjalanan Dinas","1,2,3,5","Kurnia KM","Rutin","3","","Keterangan","3");
INSERT INTO tb_spd VALUES("3","SPD-DK/2018/XI/02-01","2018-11-01","2","Anggota Perwakilan Wilayah IV Pelatihan K3LH Pratama","Cilacap","5","2018-10-30","2018-10-31","S-01","2018-10-01","1","1","MA2018","Dinas","1","SEKRETARIS DAERAH","Rutin","1","10,8,9","-","2,10,8,9");
INSERT INTO tb_spd VALUES("4","SPD-DK2018/11-901","2018-11-06","7","Rapat Bualanan Ke XI","Cilacap","25","2018-11-06","2018-11-06","11","2018-11-05","1","1","m1","Dinas","1","BUPATI","Rutin","1","2","-","7,2");
INSERT INTO tb_spd VALUES("5","SPD-DN/2018/X/01-01","2018-10-28","8","Mengikuti Peserta Pengawalan Latihan Keamanan JHY XI","Cilacap","16","2018-11-05","2018-11-08","1234-SP","2018-10-28","1","1","MA2018-1","Jalan Dinas","1,2,3,4","KASUBAG UMUM","Rutin","1","10,6","-","8,10,6");
INSERT INTO tb_spd VALUES("6","SPD-DN2018/XI/16-RAP-01","2018-11-20","9","Menghadiri Rapat Evaluasi Laporan Kerja 2018 Semester I Bidang Pekerjaan Umum Jalan Provinsi Ring 1 di Jakarta","Cilacap","8","2018-11-05","2018-11-08","REF2018-01","2018-09-30","1","1","MA2018-II","Jalan Dinas","1,2,3","KASUBBAG PU","Rutin","1","10,1","-","9,10,1");
INSERT INTO tb_spd VALUES("7","SPD-DK2018/11-902","2018-12-04","6","Menghadiri Rapat Bulanan XII di Kanwil III","Cilacap","25","2018-12-10","2018-12-12","REF2018-02","2018-11-20","1","1","MA2018-I","Jalan Dinas","1,2,3","KASUBBAG TR","Rutin","1","4,10,1,12","-","6,4,10,1,12");
INSERT INTO tb_spd VALUES("8","SPD-DN2018/XI/16-RAP-02","2019-01-02","6","Menghadiri Rapat Evaluasi Laporan Kerja 2018 Semester II Bidang Pekerjaan Umum Jalan Provinsi Ring 1 di Jakarta","Cilacap","8","2019-01-30","2019-02-06","REF2019-01","2018-12-08","1","2","MA2019/A","Jalan Dinas","1,2,3,4,5,6,7,8","KASUBBAG PU","Rutin","3","7,3,11","-","6,7,3,11");



DROP TABLE tb_ta;

CREATE TABLE `tb_ta` (
  `id_ta` int(11) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `pagu_ln` double NOT NULL,
  `pagu_dn` double NOT NULL,
  `pagu_dk` double NOT NULL,
  PRIMARY KEY (`id_ta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_ta VALUES("1","2018","756000000","1025000000","21000000");
INSERT INTO tb_ta VALUES("2","2019","825000000","1100000000","25000000");



DROP TABLE tb_transport;

CREATE TABLE `tb_transport` (
  `id_transport` int(11) NOT NULL,
  `transport` varchar(32) NOT NULL,
  PRIMARY KEY (`id_transport`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_transport VALUES("1","Darat");
INSERT INTO tb_transport VALUES("2","Laut");
INSERT INTO tb_transport VALUES("3","Udara");



DROP TABLE tb_ttdkwitansi;

CREATE TABLE `tb_ttdkwitansi` (
  `id_ttdkwitansi` int(11) NOT NULL,
  `teks1` text NOT NULL,
  `id_peg1` int(11) NOT NULL,
  `teks2` text NOT NULL,
  `id_peg2` int(11) NOT NULL,
  PRIMARY KEY (`id_ttdkwitansi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_ttdkwitansi VALUES("1","a.n. KUASA PENGGUNA ANGGARAN<br />\nPEJABAT PEMBUAT KOMITMEN","4","BENDAHARA PENGELUARAN SATKER","5");



DROP TABLE tb_ttdnominatif;

CREATE TABLE `tb_ttdnominatif` (
  `id_ttdnominatif` int(11) NOT NULL,
  `teks1` text NOT NULL,
  `id_peg1` int(11) NOT NULL,
  `teks2` text NOT NULL,
  `id_peg2` int(11) NOT NULL,
  PRIMARY KEY (`id_ttdnominatif`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_ttdnominatif VALUES("1","a.n. KUASA PENGGUNA ANGGARAN<br />\nPEJABAT PEMBUAT KOMITMEN","4","BENDAHARA KEU SATKER","5");



DROP TABLE tb_ttdriil;

CREATE TABLE `tb_ttdriil` (
  `id_ttdriil` int(11) NOT NULL,
  `teks` text NOT NULL,
  `id_peg` int(11) NOT NULL,
  PRIMARY KEY (`id_ttdriil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_ttdriil VALUES("1","a.n. KUASA PENGGUNA ANGGARAN<br />\nPEJABAT PEMBUAT KOMITMEN","4");



DROP TABLE tb_ttdrincian;

CREATE TABLE `tb_ttdrincian` (
  `id_ttdrincian` int(11) NOT NULL,
  `teks1` text NOT NULL,
  `id_peg1` int(11) NOT NULL,
  `teks2` text NOT NULL,
  `id_peg2` int(11) NOT NULL,
  PRIMARY KEY (`id_ttdrincian`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_ttdrincian VALUES("1","BENDAHARA KEU SATKER","5","a.n. KUASA PENGGUNA ANGGARAN<br />\nPEJABAT PEMBUAT KOMITMEN","4");



DROP TABLE tb_ttdspd;

CREATE TABLE `tb_ttdspd` (
  `id_ttdspd` int(11) NOT NULL,
  `teks` text NOT NULL,
  `id_peg` int(11) NOT NULL,
  PRIMARY KEY (`id_ttdspd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_ttdspd VALUES("1","a.n. KUASA PENGGUNA ANGGARAN<br />\nPEJABAT PEMBUAT KOMITMEN ","4");



DROP TABLE tb_ttdspd2;

CREATE TABLE `tb_ttdspd2` (
  `id_ttdspd2` int(11) NOT NULL,
  `teks1` text NOT NULL,
  `id_peg1` int(11) NOT NULL,
  `teks2` text NOT NULL,
  `id_peg2` int(11) NOT NULL,
  PRIMARY KEY (`id_ttdspd2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_ttdspd2 VALUES("1","a.n. KUASA PENGGUNA ANGGARAN<br />\nPEJABAT PEMBUAT KOMITMEN","4","a.n. KUASA PENGGUNA ANGGARAN<br />\nPEJABAT PEMBUAT KOMITMEN","4");



DROP TABLE tb_tujuan;

CREATE TABLE `tb_tujuan` (
  `id_tujuan` int(11) NOT NULL,
  `tujuan` varchar(64) NOT NULL,
  `jenis` varchar(64) NOT NULL,
  `harian` double NOT NULL,
  `inap` double NOT NULL,
  `transport` double NOT NULL,
  `lain` double NOT NULL,
  PRIMARY KEY (`id_tujuan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_tujuan VALUES("1","Denpasar","Dalam Negeri","380000","550000","700000","0");
INSERT INTO tb_tujuan VALUES("2","Kuta","Dalam Negeri","380000","750000","2500000","325000");
INSERT INTO tb_tujuan VALUES("3","Surabaya","Dalam Negeri","380000","700000","1500000","0");
INSERT INTO tb_tujuan VALUES("4","Makassar","Dalam Negeri","380000","750000","2500000","250000");
INSERT INTO tb_tujuan VALUES("5","Sidoarjo","Dalam Negeri","380000","700000","1500000","0");
INSERT INTO tb_tujuan VALUES("6","Semarang","Dalam Negeri","380000","750000","2500000","0");
INSERT INTO tb_tujuan VALUES("7","Bandung","Dalam Negeri","380000","750000","2500000","0");
INSERT INTO tb_tujuan VALUES("8","Jakarta","Dalam Negeri","380000","1250000","4500000","0");
INSERT INTO tb_tujuan VALUES("9","Medan","Dalam Negeri","380000","1250000","4500000","250000");
INSERT INTO tb_tujuan VALUES("10","Jambi","Dalam Negeri","380000","700000","4500000","250000");
INSERT INTO tb_tujuan VALUES("11","Samarinda","Dalam Negeri","380000","1250000","2500000","250000");
INSERT INTO tb_tujuan VALUES("12","Pontianak","Dalam Negeri","380000","700000","2500000","250000");
INSERT INTO tb_tujuan VALUES("13","Jayapura","Dalam Negeri","380000","2250000","5500000","250000");
INSERT INTO tb_tujuan VALUES("14","Manokwari","Dalam Negeri","380000","1250000","5500000","250000");
INSERT INTO tb_tujuan VALUES("15","Fakfak","Dalam Negeri","380000","700000","5500000","250000");
INSERT INTO tb_tujuan VALUES("16","Tangerang","Dalam Negeri","380000","1250000","2500000","0");
INSERT INTO tb_tujuan VALUES("17","Lombok","Dalam Negeri","380000","700000","1500000","0");
INSERT INTO tb_tujuan VALUES("18","Ambon","Dalam Negeri","380000","1250000","4500000","250000");
INSERT INTO tb_tujuan VALUES("19","Kuala Lumpur","Luar Negeri","1380000","4250000","7500000","600000");
INSERT INTO tb_tujuan VALUES("20","Manila","Luar Negeri","1380000","4250000","7500000","250000");
INSERT INTO tb_tujuan VALUES("21","Tokyo","Luar Negeri","2250000","5000000","7500000","600000");
INSERT INTO tb_tujuan VALUES("22","Bangkok","Luar Negeri","2250000","5000000","7500000","600000");
INSERT INTO tb_tujuan VALUES("23","Cilacap","Dalam Kota","380000","0","0","0");
INSERT INTO tb_tujuan VALUES("24","New Delhi","Luar Negeri","550000","2500000","4000000","600000");
INSERT INTO tb_tujuan VALUES("25","Banyumas","Dalam Kota","425000","0","0","0");



DROP TABLE tb_user;

CREATE TABLE `tb_user` (
  `id_user` varchar(32) NOT NULL,
  `nama_user` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hak_akses` varchar(16) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_user VALUES("admin","Satya Nugraha Adi","202cb962ac59075b964b07152d234b70","Admin","");
INSERT INTO tb_user VALUES("astuti","Ida Ayu Astuti","202cb962ac59075b964b07152d234b70","Admin","avatar3.png");
INSERT INTO tb_user VALUES("natasya","Natasya Sari","202cb962ac59075b964b07152d234b70","Admin","avatar3.png");
INSERT INTO tb_user VALUES("superadmin","Aryasatya Home","202cb962ac59075b964b07152d234b70","Superadmin","");



