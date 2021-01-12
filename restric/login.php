<div class="row">
<?php
	include "config/koneksi.php";
	$id_user		= $_POST['id_user'];
	$password		= md5($_POST['password']);
	$op 			= $_GET['op'];

	if($op=="in"){
		$sql = mysql_query("SELECT * FROM tb_user WHERE id_user='$id_user' AND password='$password'");
		if(mysql_num_rows($sql)==1){
			$qry = mysql_fetch_array($sql);
			$_SESSION['id_user']	= $qry['id_user'];
			$_SESSION['nama_user']	= $qry['nama_user'];
			$_SESSION['hak_akses']	= $qry['hak_akses'];
			$_SESSION['id_satker']	= $qry['id_satker'];
			
			
			if($qry['hak_akses']=="Superadmin"){
				$_SESSION['pesan'] = "Login Success!";
				header("location:pages/superadmin/");
			}

			else if($qry['hak_akses']=="Admin"){
				$_SESSION['pesan'] = "Login Success!";
				header("location:pages/admin/");
			}
		}
		else{
			$_SESSION['pesan'] = "Login Failed! Username & password tidak sesuai ...";
			header("location:./");
		}
	}
	else if($op=="out"){
		unset($_SESSION['id_user']);
		unset($_SESSION['id_satker']);
		unset($_SESSION['hak_akses']);
		header("location:./");
	}
?>
</div>