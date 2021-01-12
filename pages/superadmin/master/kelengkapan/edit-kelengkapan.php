<div class="row">
<?php
	if (isset($_GET['id_kelengkapan'])) {
	$id_kelengkapan = $_GET['id_kelengkapan'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "../../config/koneksi.php";
	$query	= mysql_query("SELECT * FROM tb_kelengkapan WHERE id_kelengkapan='$id_kelengkapan'");
	$hasil	= mysql_fetch_array ($query);
		$notnm	=$hasil['uraian'];
				
	if ($_POST['edit'] == "edit") {
	$uraian	=$_POST['uraian'];
	
	$ceknm	=mysql_num_rows (mysql_query("SELECT uraian FROM tb_kelengkapan WHERE uraian='$_POST[uraian]' AND uraian!='$notnm'"));
		
		if (empty($_POST['uraian'])) {
			$_SESSION['pesan'] = "Oops! Please fill all column ...";
			header("location:index.php?page=form-view-data-kelengkapan");
		}
		else if($ceknm > 0) {
			$_SESSION['pesan'] = "Oops! Duplikat data ...";
			header("location:index.php?page=form-view-data-kelengkapan");
		}
		
		else{
		$update= mysql_query ("UPDATE tb_kelengkapan SET uraian='$uraian' WHERE id_kelengkapan='$id_kelengkapan'");
			if($update){
				$_SESSION['pesan'] = "Good! Edit master kelengkapan success ...";
				header("location:index.php?page=form-view-data-kelengkapan");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>