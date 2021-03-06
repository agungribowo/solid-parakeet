<?php
if (isset($_GET['id_spd']) AND ($_GET['id_peg'])) {
	$id_spd = $_GET['id_spd'];
	$id_peg = $_GET['id_peg'];
	
	include "../../config/koneksi.php";
	$query   =mysql_query("SELECT * FROM tb_spd WHERE id_spd='$id_spd'");
	$data    =mysql_fetch_array($query);
	
	$selPeg	=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$id_peg'");
	$peg	=mysql_fetch_array($selPeg);
	
	$selTuj	=mysql_query("SELECT * FROM tb_tujuan WHERE id_tujuan='$data[tujuan]'");
	$tuj	=mysql_fetch_array($selTuj);
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
<h1 class="page-header">Data <small>Rincian <i class="fa fa-angle-right"></i> No SPD : <span class="text-primary"><?=$data['nomor']?></span>&nbsp; Pegawai : <span class="text-primary"><?=$peg['nama']?></span></small></h1>
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
	$id_rincian	=kdauto("tb_rincian","");
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
				<h4 class="panel-title">Form master data rincian biaya SPD</h4>
			</div>
			<div class="panel-body">
				<form action="index.php?page=master-data-rincian-ln&id_rincian=<?=$id_rincian?>&id_spd=<?=$id_spd?>&id_peg=<?=$id_peg?>" class="form-horizontal" method="POST" enctype="multipart/form-data" >
					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-2">
							<label>Jumlah Satuan</label>
						</div>
						<div class="col-md-3">
							<label>Nilai Satuan</label>
						</div>
						<div class="col-md-3">
							<label>Keterangan</label>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Uang Harian 100% di <?=$tuj['tujuan']?></label>
						<div class="col-md-2">
							<input type="number" name="jml_harian" maxlength="1" class="form-control" />
						</div>
						<div class="col-md-3">
							<input type="number" name="nilai_harian" maxlength="11" class="form-control" />
						</div>
						<div class="col-md-3">
							<input type="text" name="ket_harian" maxlength="255" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Uang Harian 40% di <?=$tuj['tujuan']?></label>
						<div class="col-md-2">
							<input type="number" name="jml_harian1" maxlength="1" class="form-control" />
						</div>
						<div class="col-md-3">
							<input type="number" name="nilai_harian1" maxlength="11" class="form-control" />
						</div>
						<div class="col-md-3">
							<input type="text" name="ket_harian1" maxlength="255" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Uang Harian 30% di <?=$tuj['tujuan']?></label>
						<div class="col-md-2">
							<input type="number" name="jml_harian2" maxlength="1" class="form-control" />
						</div>
						<div class="col-md-3">
							<input type="number" name="nilai_harian2" maxlength="11" class="form-control" />
						</div>
						<div class="col-md-3">
							<input type="text" name="ket_harian2" maxlength="255" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Transportasi PP <?=$data['asal']?> - <?=$tuj['tujuan']?></label>
						<div class="col-md-2">
							<input type="number" name="jml_berangkat" maxlength="1" class="form-control" />
						</div>
						<div class="col-md-3">
							<input type="number" name="nilai_berangkat" maxlength="11" class="form-control" />
						</div>
						<div class="col-md-3">
							<input type="text" name="ket_berangkat" maxlength="255" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Uang Reprentasi</label>
						<div class="col-md-2">
							<input type="number" name="jml_reprentasi" maxlength="1" class="form-control" />
						</div>
						<div class="col-md-3">
							<input type="number" name="nilai_reprentasi" maxlength="11" class="form-control" />
						</div>
						<div class="col-md-3">
							<input type="text" name="ket_reprentasi" maxlength="255" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Lain-lain</label>
						<div class="col-md-8">
							<input type="text" name="uraian_lain" maxlength="255" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-2">
							<input type="number" name="jml_lain" maxlength="1" class="form-control" />
						</div>
						<div class="col-md-3">
							<input type="number" name="nilai_lain" maxlength="11" class="form-control" />
						</div>
						<div class="col-md-3">
							<input type="text" name="ket_lain" maxlength="255" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Uang Muka</label>
						<div class="col-md-8">
							<input type="number" name="uang_muka" maxlength="11" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-8">
							<button type="submit" name="save" value="save" class="btn btn-primary"><i class="fa fa-floppy-o"></i> &nbsp;Save</button>&nbsp;
							<a type="button" class="btn btn-default active" href="index.php?page=form-view-nominatif"><i class="ion-arrow-return-left"></i>&nbsp;Cancel</a>
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