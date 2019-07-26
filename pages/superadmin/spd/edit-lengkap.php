<div class="row">
<?php
	if (isset($_GET['id_spd'])) {
	$id_spd= $_GET['id_spd'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "../../config/koneksi.php";
	$query	= mysql_query("SELECT * FROM tb_spd WHERE id_spd='$id_spd'");
	$hasil	= mysql_fetch_array ($query);
	$id_satker = $_SESSION['id_satker'];
	
	if ($_POST['edit'] == "edit") {
		$kelengkapan		= implode(',', $_POST['kelengkapan']);
	
		if (empty($_POST['kelengkapan'])) {
			$_SESSION['pesan'] = "Oops! Please fill all column ...";
			header("location:index.php?page=form-edit-lengkap&id_spd=$id_spd");
		}
		
		else{
		$update= mysql_query ("UPDATE tb_spd SET kelengkapan='$kelengkapan' WHERE id_spd='$id_spd'");
		if($update){
				$_SESSION['pesan'] = "Good! Edit kelengkapan SPD success ...";
				header("location:index.php?page=detail-data-spd&id_spd=$id_spd");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>