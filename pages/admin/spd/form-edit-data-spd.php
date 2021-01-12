<?php
	if (isset($_GET['id_spd'])) {
	$id_spd = $_GET['id_spd'];
	
	include "../../config/koneksi.php";
	$id_satker = $_SESSION['id_satker'];

	$query   =mysql_query("SELECT * FROM tb_spd WHERE id_spd='$id_spd' and id_satker='$id_satker'");
	$data    =mysql_fetch_array($query);
	list($x,$y)	=explode ("/",$data['nomor']);
	list($x1,$x2)	=explode ("-",$x);
	list($y1,$y2)	=explode (".",$y);
	
	}
	else {
		die ("Error. No ID Selected!");	
	}

	$id_satker = $_SESSION['id_satker'];
	$qry2 = mysql_query("SELECT id_satker, no_ppk, id_ppk FROM tb_satker WHERE id_satker = '$id_satker'");        
	$satker		=mysql_fetch_array($qry2);
	$id_ppk = $satker['id_ppk'];

	$qry3 = mysql_query("SELECT * FROM tb_pegawai WHERE id_peg = '$id_ppk'");        
	$ppk		=mysql_fetch_array($qry3);	
	
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
<h1 class="page-header">Data<small> SPD <i class="fa fa-angle-right"></i> Edit <i class="fa fa-key"></i> No_<?=$data['nomor']?></small></h1>
<!-- begin row -->
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
				<h4 class="panel-title">Form edit surat perjalanan dinas</h4>
			</div>
			<div class="panel-body">
				<form action="index.php?page=edit-data-spd&id_spd=<?=$id_spd?>" class="form-horizontal" method="POST" enctype="multipart/form-data" >
					<div class="col-md-4">
						<div class="form-group">
							<label>Pejabat Pemberi Perintah</label>
							<input type="text" name="pejabat" maxlength="128" value="<?=$data['pejabat']?>" class="form-control" />
						</div>
						<div class="form-group">
							<label>Tingkat Biaya Perjalanan Dinas</label>
							<input type="text" name="tingkat_biaya" maxlength="64" value="<?=$data['tingkat_biaya']?>" class="form-control" />
						</div>
						<div class="form-group">
							<label>Jenis Transportasi</label>
							<?php
								$transport = mysql_query("SELECT * FROM tb_transport ORDER BY transport");        
								echo '<select name="transport" class="default-select2 form-control">';    
								// echo '<option value="'.$data['transport'].'">...</option>';    
									while ($tra = mysql_fetch_array($transport)) {    

										if ($tra['id_transport'] == $data['transport'])
										echo '<option selected value="'.$tra['id_transport'].'">'.$tra['transport'].'</option>';  
										else 	echo '<option value="'.$tra['id_transport'].'">'.$tra['transport'].'</option>';   

									echo '<option value="'.$tra['id_transport'].'">'.$tra['transport'].'</option>';    
									}    
								echo '</select>';
							?>
						</div>

						<div class="form-group">
							<label>Keperluan</label>
							<textarea name="keperluan" maxlength="255" class="form-control"><?=$data['keperluan']?></textarea>
						</div>
					</div>
					<div class="col-md-1"></div>
					<div class="col-md-7">
						<div class="form-group">
							<label class="col-md-4 control-label">Nomor SPD</label>
							<div class="col-md-3">
								<input type="text" name="nomor" readonly maxlength="4" class="form-control" value="<?=$x2?>" />
							</div>
							<label class="col-md-2 control-label">PPK</label>
							<div class="col-md-3">
								<input type="text" name="ppk" readonly maxlength="2" class="form-control" value="<?=$y2?>" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Nama PPK</label>
							<div class="col-md-8">
							<input type="text" name="nama_ppk" readonly maxlength="4" class="form-control" value="<?=$ppk['nama']?>" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Tanggal</label>
							<div class="col-md-8">
								<div class="input-group date" id="datepicker-disabled-past1" data-date-format="yyyy-mm-dd">
									<input type="text" name="tgl" value="<?=$data['tgl']?>" class="form-control" />
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Pegawai</label>
							<div class="col-md-8">
								<?php
									$pegawai = mysql_query("SELECT * FROM tb_pegawai ORDER BY nama ASC");        
									echo '<select  name="pegawai" class="default-select2 form-control">';    
									// echo '<option value="'.$data['pegawai'].'">...</option>';    
										while ($peg = mysql_fetch_array($pegawai)) {    

											if ($peg['id_peg'] == $data['pegawai'])
											echo '<option selected value="'.$peg['id_peg'].'">'.$peg['nama'].' - '.$peg['nip'].'</option>';  
											else 	echo '<option value="'.$peg['id_peg'].'">'.$peg['nama'].' - '.$peg['nip'].'</option>';   
											
										// echo '<option value="'.$peg['id_peg'].'">'.$peg['nama'].' _ '.$peg['nip'].'</option>';    
										}    
									echo '</select>';
								?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Asal</label>
							<div class="col-md-8">
								<input type="text" name="asal" maxlength="24" value="<?=$data['asal']?>" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Tujuan</label>
							<div class="col-md-8">
								<?php
									$tujuan = mysql_query("SELECT * FROM tb_tujuan ORDER BY tujuan");        
									echo '<select name="tujuan" class="default-select2 form-control">';    
									echo '<option value="'.$data['tujuan'].'">...</option>';    
										while ($tuj = mysql_fetch_array($tujuan)) {    

											if ($tuj['id_tujuan'] == $data['tujuan'])
											echo '<option selected value="'.$tuj['id_tujuan'].'">'.$tuj['tujuan'].'</option>';  
											else 	echo '<option value="'.$tuj['id_tujuan'].'">'.$tuj['tujuan'].'</option>';   

										// echo '<option value="'.$tuj['id_tujuan'].'">'.$tuj['tujuan'].'</option>';    
										}    
									echo '</select>';
								?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Tanggal Berangkat</label>
							<div class="col-md-8">
								<div class="input-group date" id="datepicker-disabled-past2" data-date-format="yyyy-mm-dd">
									<input type="text" name="tgl_berangkat" value="<?=$data['tgl_berangkat']?>" class="form-control" />
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Tanggal Kembali</label>
							<div class="col-md-8">
								<div class="input-group date" id="datepicker-disabled-past3" data-date-format="yyyy-mm-dd">
									<input type="text" name="tgl_kembali" value="<?=$data['tgl_kembali']?>" class="form-control" />
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">No. Referensi</label>
							<div class="col-md-8">
								<input type="text" name="no_sprin" maxlength="256" value="<?=$data['no_sprin']?>" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Tgl No. Referensi</label>
							<div class="col-md-8">
								<div class="input-group date" id="datepicker-disabled-past4" data-date-format="yyyy-mm-dd">
									<input type="text" name="tgl_sprin" value="<?=$data['tgl_sprin']?>" class="form-control" />
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Satuan Kerja</label>
							<div class="col-md-8">
								<?php
									$satker = mysql_query("SELECT * FROM tb_satker");        
									echo '<select disabled name="satker" class="default-select2 form-control" style="width:100%">';    
										while ($sat = mysql_fetch_array($satker)) {    

											if ($sat['id_satker'] == $id_satker)
											echo '<option selected value="'.$sat['id_satker'].'">'.$sat['satker'].'</option>';  
											else 	echo '<option value="'.$sat['id_satker'].'">'.$sat['satker'].'</option>';   

										// echo '<option value="'.$sat['id_satker'].'">'.$sat['satker'].'</option>';    
										}    
									echo '</select>';
								?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Tahun Anggaran</label>
							<div class="col-md-8">
								<?php
									$tahuna = mysql_query("SELECT * FROM tb_ta where id_satker=$id_satker");        
									echo '<select name="ta" class="default-select2 form-control" style="width:100%">';    
									// echo '<option value="'.$data['ta'].'">...</option>';    
										while ($ta = mysql_fetch_array($tahuna)) {    
											if ($ta['id_ta'] == $data['tahun'])
											echo '<option selected value="'.$ta['id_ta'].'">'.$ta['tahun'].'</option>';  
											else 	echo '<option value="'.$ta['id_ta'].'">'.$ta['tahun'].'</option>';   

										// echo '<option value="'.$ta['id_ta'].'">'.$ta['tahun'].'</option>';    
										}    
									echo '</select>';
								?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Mata Anggaran</label>
							<div class="col-md-8">
								<input type="text" name="ma" maxlength="64" value="<?=$data['ma']?>" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Jenis Pengeluaran</label>
							<div class="col-md-8">
								<input type="text" name="jenis_pengeluaran" maxlength="64" value="<?=$data['jenis_pengeluaran']?>" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label"></label>
							<div class="col-md-8">
								<button type="submit" name="edit" value="edit" class="btn btn-primary"><i class="fa fa-edit"></i> &nbsp;Edit</button>&nbsp;
								<a type="button" class="btn btn-default active" href="index.php?page=form-view-data-spd"><i class="ion-arrow-return-left"></i>&nbsp;Cancel</a>
							</div>
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