<div class="row">
<?php
	if (isset($_GET['id_logo'])) {
	$id_logo = $_GET['id_logo'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "../../config/koneksi.php";
	$query	= mysql_query("SELECT * FROM tb_logo WHERE id_logo='$id_logo'");
	$hasil	= mysql_fetch_array ($query);
				
	if ($_POST['edit'] == "edit") {
		$logo		=$_FILES['logo']['name'];
		$size		=$_FILES['logo']['size'];
		
		$foto_ext	= array('jpg', 'jpeg', 'png');
		$max_size	= 500000;
		$ext 		= strtolower(end(explode('.', $_FILES['logo']['name'])));
		$ok_ext		= in_array($ext, $foto_ext);
		
		$datename	=date('Ymd');
		$timename	=date('His');
		$new_name	="$datename"."-"."$timename"."-"."APP".".$ext";
	
		if (empty($_FILES['logo']['name'])) {
			$_SESSION['pesan'] = "Oops! Please fill all column ...";
			header("location:index.php?page=form-ganti-logo-app&id_logo=$id_logo");
		}
		
		else if (!($ok_ext)){
			$_SESSION['pesan'] = "Oops! File extensions not available ...";
			header("location:index.php?page=form-ganti-logo-app&id_logo=$id_logo");
		}
		
		else if ($size > $max_size){
			$_SESSION['pesan'] = "Oops! File is too large. MAX 500 KB ...";
			header("location:index.php?page=form-ganti-logo-app&id_logo=$id_logo");
		}
		
		else{
		$update= mysql_query ("UPDATE tb_logo SET logo1='$new_name' WHERE id_logo='$id_logo'");
		if($update){
				$_SESSION['pesan'] = "Good! ganti logo aplikasi success ...";
				header("location:index.php?page=form-view-setup-logo");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
			if (strlen($logo)>0) {
				if (is_uploaded_file($_FILES['logo']['tmp_name'])) {
					move_uploaded_file ($_FILES['logo']['tmp_name'], "../../assets/img/".$new_name);
				}
			}
		}
	}
?>
</div>