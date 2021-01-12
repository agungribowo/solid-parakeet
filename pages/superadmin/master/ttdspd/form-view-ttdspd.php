<?php	
	include "../../config/koneksi.php";
	$query	=mysql_query("SELECT * FROM tb_ttdspd WHERE id_ttdspd='1'");
	$data	=mysql_fetch_array($query);	
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
	<li><a href="index.php?page=form-setup-ttdspd&id_ttdspd=<?=$data['id_ttdspd']?>" title="setup" class="btn btn-sm btn-primary m-b-10"><i class="fa fa-gear"></i> &nbsp;Setup</a></li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Setup <small>Penandatangan Lembar SPD 1&nbsp;</small></h1>
<!-- end page-header -->
<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
		<div class="tab-content">
			<!-- begin table -->
			<div class="table-responsive">
				<table class="table table-profile">
					<thead>
						<tr>
							<th><h5><span class="label label-inverse pull-right"> # Tanda Tangan </span></h5></th>
							<th>
								<h4>Lembar SPD 1</h4>
							</th>
						</tr>
					</thead>
					<tbody>
						<tr class="highlight">
							<td class="field">Teks Header</td>
							<td><?=$data['teks']?></td>
						</tr>
						<tr class="divider">
							<td colspan="2"></td>
						</tr>
						<tr>
							<td class="field">Pegawai</td>
							<td><?php
								$selpeg	=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$data[id_peg]'");
								$peg	=mysql_fetch_array($selpeg);
								echo $peg['nama']
								?>
							</td>
						</tr>
						<tr>
							<td class="field"></td>
							<td><?=$peg['pangkat']?></td>
						</tr>
						<tr>
							<td class="field"></td>
							<td>NIP/NRP <?=$peg['nip']?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<!-- end table -->
		</div>
	</div>
</div>
<script> // 500 = 0,5 s
	$(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 500);});
	setTimeout(function(){$(".pesan").fadeOut('slow');}, 7000);
</script>