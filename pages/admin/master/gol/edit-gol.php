<div class="row">
<?php
	if (isset($_GET['id_gol'])) {
	$id_gol = $_GET['id_gol'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "../../config/koneksi.php";
	$query	= mysql_query("SELECT * FROM tb_gol WHERE id_gol='$id_gol'");
	$hasil	= mysql_fetch_array ($query);
		$notnm	=$hasil['gol'];
				
	if ($_POST['edit'] == "edit") {
	$kode_gol	=$_POST['kode_gol'];
	$gol		=$_POST['gol'];
	
	$ceknm	=mysql_num_rows (mysql_query("SELECT gol FROM tb_gol WHERE gol='$_POST[gol]' AND gol!='$notnm'"));
		
		if (empty($_POST['kode_gol']) || empty($_POST['gol'])) {
			$_SESSION['pesan'] = "Oops! Please fill all column ...";
			header("location:index.php?page=form-view-data-gol");
		}
		else if($ceknm > 0) {
			$_SESSION['pesan'] = "Oops! Duplikat data ...";
			header("location:index.php?page=form-view-data-gol");
		}
		
		else{
		$update= mysql_query ("UPDATE tb_gol SET kode_gol='$kode_gol', gol='$gol' WHERE id_gol='$id_gol'");
			if($update){
				$_SESSION['pesan'] = "Good! Edit master golongan success ...";
				header("location:index.php?page=form-view-data-gol");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>