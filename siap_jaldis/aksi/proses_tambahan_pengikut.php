<?php
//include('dbconnected.php');
include('../koneksi.php');

$pegawai = $_GET['pegawai'];
$tgl_berangkat = $_GET['tgl_berangkat'];
$tgl_kembali = $_GET['tgl_kembali'];


//query update
$query = mysqli_query($koneksi,"INSERT INTO `pengikut` (`pegawai`, `berangkat_ikut`, `kembali_ikut`, `id_jaldis`) VALUES ( '$pegawai','$tgl_berangkat', '$tgl_kembali', 'SPD-1059/PPK.3/11/2019')");

if ($query) {
 # credirect ke page index
 header("location:../pages/spd"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

//mysql_close($host);
?>