<?php
//include('dbconnected.php');
include('../koneksi.php');

$id = $_GET['id_unit'];

//query update
$query = mysqli_query($koneksi,"DELETE FROM `unit` WHERE id_unit = '$id'");

if ($query) {
 # credirect ke page index
 header("location:../pages/unit_kerja"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

//mysql_close($host);
?>