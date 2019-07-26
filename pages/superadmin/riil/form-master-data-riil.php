<?php
if (isset($_GET['id_spd']) AND ($_GET['id_peg']) AND ($_GET['id_rincian'])) {
	$id_spd = $_GET['id_spd'];
	$id_peg = $_GET['id_peg'];
	$id_rincian = $_GET['id_rincian'];
	
	include "../../config/koneksi.php";
	$query   =mysql_query("SELECT * FROM tb_spd WHERE id_spd='$id_spd'");
	$data    =mysql_fetch_array($query);
	
	$selPeg	=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$id_peg'");
	$peg	=mysql_fetch_array($selPeg);
	
	$selTuj	=mysql_query("SELECT * FROM tb_tujuan WHERE id_tujuan='$data[tujuan]'");
	$tuj	=mysql_fetch_array($selTuj);
	
	$selRin	=mysql_query("SELECT * FROM tb_rincian WHERE id_rincian='$id_rincian'");
	$rin	=mysql_fetch_array($selRin);
	$inap	=$rin['jml_inap']*$rin['nilai_inap'];
	$taxi_berangkat	=$rin['jml_taxi_berangkat']*$rin['nilai_taxi_berangkat'];
	$taxi_kembali	=$rin['jml_taxi_kembali']*$rin['nilai_taxi_kembali'];
	}
	else {
		die ("Error. No ID Selected!");	
	}
?>
<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
	<li>
		<?php
			if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
				echo "<span class='pesan'><div class='btn btn-sm btn-inverse m-b-10'><i class='fa fa-bell text-warning'></i>&nbsp; ".$_SESSION['pesan']." &nbsp; &nbsp; &nbsp;</div></span>";
			}
			$_SESSION['pesan'] ="";
		?>
	</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Data <small>Pengeluaran Riil <i class="fa fa-angle-right"></i> No SPD : <span class="text-primary"><?=$data['nomor']?></span>&nbsp; Pegawai : <span class="text-primary"><?=$peg['nama']?></span></small></h1>
<!-- end page-header -->
<?php
	include "../../config/koneksi.php";
	function kdauto($tabel, $inisial){
		$struktur   = mysql_query("SELECT * FROM $tabel");
		$field      = mysql_field_name($struktur,0);
		$panjang    = mysql_field_len($struktur,0);
		$qry  = mysql_query("SELECT max(".$field.") FROM ".$tabel);
		$row  = mysql_fetch_array($qry);
		if ($row[0]=="") {
		$angka=0;
		}
		else {
		$angka= substr($row[0], strlen($inisial));
		}
		$angka++;
		$angka      =strval($angka);
		$tmp  ="";
		for($i=1; $i<=($panjang-strlen($inisial)-strlen($angka)); $i++) {
		$tmp=$tmp."0";
		}
		return $inisial.$tmp.$angka;
		}
	$id_riil	=kdauto("tb_riil","");
?>
<div class="row">
	<!-- begin col-12 -->
    <div class="col-md-12">
		<!-- begin panel -->
		<div class="panel panel-inverse" data-sortable-id="form-stuff-1">
			<div class="panel-heading">
				<div class="panel-heading-btn">
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
				</div>
				<h4 class="panel-title">Form master data pengeluaran riil SPD</h4>
			</div>
			<div class="panel-body">
				<form action="index.php?page=master-data-riil&id_riil=<?=$id_riil?>&id_spd=<?=$id_spd?>&id_peg=<?=$id_peg?>&id_rincian=<?=$id_rincian?>" class="form-horizontal" method="POST" enctype="multipart/form-data" >
					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-2">
							<label>Jumlah</label>
						</div>
						<div class="col-md-6">
							<label>Uraian</label>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Biaya 1</label>
						<div class="col-md-2">
							<input type="number" name="jml1" value="<?=$inap;?>" class="form-control"/>
						</div>
						<div class="col-md-6">
							<textarea type="text" name="uraian1" class="form-control">Penginapan</textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Boaya 2</label>
						<div class="col-md-2">
							<input type="number" name="jml2" value="<?=$taxi_berangkat;?>" class="form-control"/>
						</div>
						<div class="col-md-6">
							<textarea type="text" name="uraian2" class="form-control">Taxi <?=$data['asal']?> PP</textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Biaya 3</label>
						<div class="col-md-2">
							<input type="number" name="jml3" value="<?=$taxi_kembali;?>" class="form-control"/>
						</div>
						<div class="col-md-6">
							<textarea type="text" name="uraian3" class="form-control">Taxi <?=$tuj['tujuan']?> PP</textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Lain-lain</label>
						<div class="col-md-2">
							<input type="number" name="jml4" maxlength="11" class="form-control"/>
						</div>
						<div class="col-md-6">
							<textarea type="text" name="uraian4" maxlength="255" class="form-control"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-5 control-label"></label>
						<div class="col-md-6">
							<button type="submit" name="save" value="save" class="btn btn-primary"><i class="fa fa-floppy-o"></i> &nbsp;Save</button>&nbsp;
							<a type="button" class="btn btn-default active" href="index.php?page=form-view-data-rincian"><i class="ion-arrow-return-left"></i>&nbsp;Cancel</a>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- end panel -->
	</div>
	<!-- end col-6 -->
</div>
<!-- end row -->
<script> // 500 = 0,5 s
	$(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 500);});
	setTimeout(function(){$(".pesan").fadeOut('slow');}, 7000);
</script>