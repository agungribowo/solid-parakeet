<?php
//include('dbconnected.php');
include('../koneksi.php');

$id = $_GET['id_golongan'];

//query update
$query = mysqli_query($koneksi,"DELETE FROM `golongan` WHERE id_golongan = '$id'");

if ($query) {
 # credirect ke page index
 header("location:../pages/golongan"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

//mysql_close($host);
?>