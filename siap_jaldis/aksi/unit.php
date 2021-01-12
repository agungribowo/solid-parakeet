<?php
//include('dbconnected.php');
include('../koneksi.php');

$unit_kerja = $_GET['unit_kerja'];
$kpa = $_GET['kpa'];
$ppk = $_GET['ppk'];
$bendahara = $_GET['bendahara'];


//query update
$query = mysqli_query($koneksi,"INSERT INTO `unit` (`id_unit`, `unit_kerja`, `kpa`, `ppk`, `bendahara`) VALUES (null, '$unit_kerja', '$kpa', '$ppk', '$bendahara')");

if ($query) {
 # credirect ke page index
 header("location:../pages/unit_kerja"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

//mysql_close($host);
?>