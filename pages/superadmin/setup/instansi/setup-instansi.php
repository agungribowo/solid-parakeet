<div class="row">
<?php
	if (isset($_GET['id_setup'])) {
	$id_setup = $_GET['id_setup'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "../../config/koneksi.php";
	$setup	= mysql_query("SELECT * FROM tb_setup WHERE id_setup='$id_setup'");
	$hasil	= mysql_fetch_array ($setup);
				
	if ($_POST['setup'] == "setup") {
	$instansi	=$_POST['instansi'];
	$kota		=$_POST['kota'];
	// $alamat		=$_POST['alamat'];
	
		if (empty($_POST['instansi'])  || empty($_POST['kota'])) {
			$_SESSION['pesan'] = "Oops! Please fill all column ...";
			header("location:index.php?page=form-setup-instansi&id_setup=$id_setup");
		}
		else{
		$update= mysql_query ("UPDATE tb_setup SET instansi='$instansi', kota='$kota'  WHERE id_setup='$id_setup'");
			if($update){
				$_SESSION['pesan'] = "Good! setup Kementerian/Lembaga success ...";
				header("location:index.php?page=form-view-setup-instansi");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>