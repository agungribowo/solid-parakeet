<div class="row">
<?php
	if (isset($_GET['id_transport'])) {
	$id_transport = $_GET['id_transport'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "../../config/koneksi.php";
	$query	= mysql_query("SELECT * FROM tb_transport WHERE id_transport='$id_transport'");
	$hasil	= mysql_fetch_array ($query);
		$notnm	=$hasil['transport'];
				
	if ($_POST['edit'] == "edit") {
	$transport	=$_POST['transport'];
	
	$ceknm	=mysql_num_rows (mysql_query("SELECT transport FROM tb_transport WHERE transport='$_POST[transport]' AND transport!='$notnm'"));
		
		if (empty($_POST['transport'])) {
			$_SESSION['pesan'] = "Oops! Please fill all column ...";
			header("location:index.php?page=form-view-data-transport");
		}
		else if($ceknm > 0) {
			$_SESSION['pesan'] = "Oops! Duplikat data ...";
			header("location:index.php?page=form-view-data-transport");
		}
		
		else{
		$update= mysql_query ("UPDATE tb_transport SET transport='$transport' WHERE id_transport='$id_transport'");
			if($update){
				$_SESSION['pesan'] = "Good! Edit master jenis transportasi success ...";
				header("location:index.php?page=form-view-data-transport");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>