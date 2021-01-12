<?php
//include('dbconnected.php');
include('../koneksi.php');


$id = $_GET['id_golongan'];
$golongan = $_GET['golongan'];

//query update
$query = mysqli_query($koneksi,"UPDATE golongan SET nama_golongan='$golongan'  WHERE id_golongan='$id' ");

if ($query) {
 # credirect ke page index
 header("location:../pages/golongan"); 
}
else{
 echo "ERROR, data gagal diupdate". mysql_error();
}

//mysql_close($host);
?>