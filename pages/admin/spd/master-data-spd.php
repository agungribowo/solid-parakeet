<div class="row">
<?php
	include "../../config/koneksi.php";
	
	if (isset($_GET['id_spd'])) {
		$id_spd = $_GET['id_spd'];
	}
	else {
		die ("Error. No ID Selected! ");	
	}
	
	if(!isset($_SESSION['id_user'])){
		die("<b>Oops!</b> Access Failed.
			<p>Sistem Logout. Anda harus melakukan Login kembali.</p>
			<button type='button' onclick=location.href='../../'>Back</button>");
	}
	
	if ($_POST['save'] == "save") {
	$pejabat		=$_POST['pejabat'];
	$tingkat_biaya	=$_POST['tingkat_biaya'];
	$transport		=$_POST['transport'];
	$pengikut		= implode(',', $_POST['pengikut']);
	// $kelengkapan	= implode(',', $_POST['kelengkapan']);
	// $ket			=$_POST['ket'];	
	$keperluan		=$_POST['keperluan'];	
	$nomor			=$_POST['nomor'];	
	// $ppk			=$_POST['ppk'];
	$no_ppk			=$_POST['no_ppk'];	
	$tgl			=$_POST['tgl'];	
	$pegawai		=$_POST['pegawai'];	
	$asal			=$_POST['asal'];	
	$tujuan			=$_POST['tujuan'];	
	$tgl_berangkat	=$_POST['tgl_berangkat'];	
	$tgl_kembali	=$_POST['tgl_kembali'];	
	$no_sprin		=$_POST['no_sprin'];	
	$tgl_sprin		=$_POST['tgl_sprin'];	
	$satker			=$_SESSION['id_satker'];	
	$ta				=$_POST['ta'];	
	$ma				=$_POST['ma'];	
	$id_user 		=$_SESSION['id_user'];
	$jenis_pengeluaran	=$_POST['jenis_pengeluaran'];
	$id_satker = $_SESSION['id_satker'];
	
	if(empty($_POST['pengikut'])){
		$semua_peg		="$pegawai";
	}
	else{
		$semua_peg		="$pegawai".","."$pengikut";
	}
	
	$semua_pengikut =explode(',', $pengikut);
	
	// list($ynom,$mnom)	=explode ("-",$tgl);
	// $nomer	="SPD-"."$nomor"."/PPK."."$no_ppk"."/"."$mnom"."/$ynom";
	
	// $cekno	=mysql_num_rows (mysql_query("SELECT nomor FROM tb_spd WHERE nomor='$nomer'"));
	//
	// $kunci	=mysql_num_rows (mysql_query("SELECT pegawai, tgl_berangkat, tgl_kembali FROM tb_spd WHERE pegawai='$_POST[pegawai]' AND tgl_berangkat <='$tgl_berangkat' AND tgl_kembali >='$tgl_berangkat'"));
	//
	if (strlen($pengikut)>0) {
		$daftarpegawai = '('.$pegawai.','.$pengikut.')';
	  } else $daftarpegawai = '('.$pegawai.')';

	$aqr = "SELECT A.id_nominatif FROM tb_nominatif A INNER JOIN tb_spd B ON B.id_spd=A.id_spd WHERE A.pegawai IN $daftarpegawai AND B.tgl BETWEEN $tgl_berangkat AND $tgl_kembali";
	$qrycek = mysql_num_rows(mysql_query($aqr));
	

		if (empty($_POST['pejabat']) || empty($_POST['keperluan']) || empty($_POST['nomor']) || empty($_POST['pegawai']) || empty($_POST['tujuan']) || empty($_POST['jenis_pengeluaran'])) {
			$_SESSION['pesan'] = "Oops! Please fill all column ...";
			header("location:index.php?page=form-master-data-spd");
		}
		// else if($cekno > 0) {
		// 	$_SESSION['pesan'] = "Oops! Duplikat data ...";
		// 	header("location:index.php?page=form-master-data-spd");
		// }
		
		else if($qrycek > 0) {
			$_SESSION['pesan'] = "Oops! Pegawai dan/atau pengikut masih dalam perjalan dinas ...";
			header("location:index.php?page=form-master-data-spd");
		}
		
		else if(in_array($pegawai, $semua_pengikut)){
			$_SESSION['pesan'] = "Oops! Duplikat daftar nominatif pegawai ...";
			header("location:index.php?page=form-master-data-spd");
		}
		
		else{
		$qry   = mysql_query("SELECT nomor FROM tb_spd WHERE id_satker = '$id_satker' ORDER BY nomor desc LIMIT 1");
		$data  = mysql_fetch_array($qry);
		list($x,$y)	=explode ("/",$data['nomor']);
		list($x1,$x2)	=explode ("-",$x);
		list($y1,$y2)	=explode (".",$y);
		$x3 = (int)$x2 + 1;
		$x4 = str_pad($x3, 3, '0', STR_PAD_LEFT); 

		list($ynom,$mnom)	=explode ("-",$tgl);
		$nomer	="SPD-"."$nomor"."/PPK."."$no_ppk"."/"."$mnom"."/$ynom";

		$insert =mysql_query("INSERT INTO tb_spd (id_spd, id_user, id_satker, pejabat, tingkat_biaya, transport, pengikut, keperluan, nomor, tgl, pegawai, asal, tujuan, tgl_berangkat, tgl_kembali, no_sprin, tgl_sprin, satker, ta, ma, jenis_pengeluaran, semua_peg)
		VALUES ('$id_spd', '$id_user', '$id_satker', '$pejabat', '$tingkat_biaya', '$transport', '$pengikut', '$keperluan', '$nomer', '$tgl', '$pegawai', '$asal', '$tujuan', '$tgl_berangkat', '$tgl_kembali', '$no_sprin', '$tgl_sprin', '$satker', '$ta', '$ma', '$jenis_pengeluaran', '$semua_peg')");
			
			$nom	=explode(',', $semua_peg);
			foreach ($nom as $listpeg) {
				$values="($id_spd, '$listpeg', '$satker', '$id_user')";
				$insertnom	=mysql_query("INSERT INTO tb_nominatif (id_spd, pegawai, id_satker, id_user) VALUES ".$values);
			}
													
			if($insert){
				$_SESSION['pesan'] = "Good! Insert data SPD success ..."  ;
				header("location:index.php?page=form-view-data-spd");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>