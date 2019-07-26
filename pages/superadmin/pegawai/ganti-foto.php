<div class="row">
<?php
	if (isset($_GET['id_peg'])) {
	$id_peg = $_GET['id_peg'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "../../config/koneksi.php";
	$tampilPeg	= mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$id_peg'");
	$hasil	= mysql_fetch_array ($tampilPeg);
				
	if ($_POST['edit'] == "edit") {
		$foto		=$_FILES['foto']['name'];
		$size		=$_FILES['foto']['size'];
		
		$foto_ext	= array('jpg', 'jpeg', 'png');
		$max_size	= 1000000;
		$ext 		= strtolower(end(explode('.', $_FILES['foto']['name'])));
		$ok_ext		= in_array($ext, $foto_ext);
		
		$datename	=date('Ymd');
		$timename	=date('His');
		$idname		=intval($id_peg);
		$new_name	="$datename"."-"."$timename"."-"."$idname".".$ext";
	
		if (empty($_FILES['foto']['name'])) {
			$_SESSION['pesan'] = "Oops! Please fill all column ...";
			header("location:index.php?page=form-ganti-foto&id_peg=$id_peg");
		}
		
		else if (!($ok_ext)){
			$_SESSION['pesan'] = "Oops! File extensions not available ...";
			header("location:index.php?page=form-ganti-foto&id_peg=$id_peg");
		}
		
		else if ($size > $max_size){
			$_SESSION['pesan'] = "Oops! File is too large ...";
			header("location:index.php?page=form-ganti-foto&id_peg=$id_peg");
		}
		
		else{
		$update= mysql_query ("UPDATE tb_pegawai SET foto='$new_name' WHERE id_peg='$id_peg'");
		if($update){
				$_SESSION['pesan'] = "Good! ganti foto $hasil[nip] success ...";
				header("location:index.php?page=detail-data-pegawai&id_peg=$id_peg");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
			if (strlen($foto)>0) {
				if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
					move_uploaded_file ($_FILES['foto']['tmp_name'], "../../assets/img/foto/".$new_name);
				}
			}
		}
	}
?>
</div>