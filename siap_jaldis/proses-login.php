<?php
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'koneksi.php';
 

// menangkap data yang dikirim dari form
$email =mysqli_real_escape_string($koneksi,$_POST['email']);
$pass =mysqli_real_escape_string($koneksi, $_POST['pass']);
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from admin where email='$email' and pass='".md5($pass)."'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek > 0){
$sesi = mysqli_query($koneksi,"select * from admin where email='$email' and pass='".md5($pass)."'");
$sesi = mysqli_fetch_assoc($sesi);
	$_SESSION['id'] = $sesi['id_admin'];
	$_SESSION['nama'] = $sesi['nama'];
	$_SESSION['unit_satker'] = $sesi['unit_satker'];
	$_SESSION['status'] = "login";
	header("location:pages/");
}else{
	

?>

<script type="text/javascript" language="javascript">
						alert("Unregistered user or wrong password");
					</script>

					<?php 
					// header("location:login.php?pesan=gagal");
						echo "<meta http-equiv='refresh' content='0; url=login?pesan=gagal'>";
}

					?>