<?php
//include('dbconnected.php');
include('../koneksi.php');

$golongan = $_GET['golongan'];


//query update
$query = mysqli_query($koneksi,"INSERT INTO `golongan` (`nama_golongan`) VALUES ( '$golongan')");

if ($query) {
 # credirect ke page index
 header("location:../pages/golongan"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

//mysql_close($host);
?>