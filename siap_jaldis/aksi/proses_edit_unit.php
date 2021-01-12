<?php
//include('dbconnected.php');
include('../koneksi.php');


$id = $_GET['id_unit'];
$unit_kerja = $_GET['unit_kerja'];
$kpa = $_GET['kpa'];
$ppk = $_GET['ppk'];
$bendahara = $_GET['bendahara'];

//query update
$query = mysqli_query($koneksi,"UPDATE unit SET unit_kerja='$unit_kerja' , kpa='$kpa', ppk='$ppk', bendahara='$bendahara' WHERE id_unit='$id' ");

if ($query) {
 # credirect ke page index
 header("location:../pages/unit_kerja"); 
}
else{
 echo "ERROR, data gagal diupdate". mysql_error();
}

//mysql_close($host);
?>