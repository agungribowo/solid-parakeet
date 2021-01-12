<?php
	include "../../config/koneksi.php";
	if ($_POST['search'] == "search") {
		$nomor	=$_POST['nomor'];
		
		$query	=mysql_query("SELECT * FROM tb_spd WHERE nomor LIKE '%$nomor%'");
	}
?>
<!-- begin page-header -->
<h1 class="page-header">Result <small>Direct Search</small></h1>
<!-- end page-header -->
<div class="profile-container">
	<!-- begin profile-section -->
	<div class="profile-section">
		<div class="panel-body">
			<table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
				<thead>
					<tr>
						<th width="4%">No</th>
						<th>Nomor SPD</th>
						<th>Tgl SPD</th>
						<th>Pegawai</th>
						<th>Tujuan</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no=0;
						while($data	=mysql_fetch_array($query)){
						$no++
					?>
					<tr>
						<td><?=$no?></td>
						<td><a href="index.php?page=detail-data-spd&id_spd=<?=$data['id_spd']?>" title="detail"><?php echo $data['nomor'];?></a></td>
						<td><?php echo $data['tgl']?></td>
						<td><?php
							$selPeg	=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$data[pegawai]'");
							$peg	=mysql_fetch_array($selPeg);
							echo $peg['nama'];
							?>
						</td>
						<td><?php
							$selTuj	=mysql_query("SELECT * FROM tb_tujuan WHERE id_tujuan='$data[tujuan]'");
							$tuj	=mysql_fetch_array($selTuj);
							echo $tuj['tujuan'];
							?>
						</td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
	<!-- end profile-section -->
</div>