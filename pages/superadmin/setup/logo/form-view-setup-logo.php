<?php	
	include "../../config/koneksi.php";
	$query	=mysql_query("SELECT * FROM tb_logo WHERE id_logo='1'");
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
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Setup <small>Logo &nbsp;</small></h1>
<!-- end page-header -->
<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
		<div class="tab-content">
			<!-- begin table -->
			<div class="table-responsive">
				<table class="table table-profile">
					<thead>
						<tr>
							<th><h5><span class="label label-inverse pull-right"> # Logo </span></h5></th>
							<th>
								<h4>Aplikasi</h4>
							</th>
						</tr>
					</thead>
					<tbody>
						<tr class="highlight">
							<td class="field"></td>
							<td><?php
									if (empty($data['logo1']))													
										echo "<img src='../../assets/img/default.png' width='100' height='100' alt='' />";
										else
										echo "<img src='../../assets/img/$data[logo1]' width='100' height='100' alt='' />";
								?>
							</td>
							<td align="right"><a href="index.php?page=form-ganti-logo-app&id_logo=<?=$data['id_logo']?>" title="ganti logo" class="btn btn-sm btn-primary m-b-10"><i class="fa fa-gear"></i> &nbsp;Ganti Logo</a></td>
						</tr>
					</tbody>
				</table>
				<table class="table table-profile">
					<thead>
						<tr>
							<th><h5><span class="label label-inverse pull-right"> # Logo </span></h5></th>
							<th>
								<h4>Print Dokumen</h4>
							</th>
						</tr>
					</thead>
					<tbody>
						<tr class="highlight">
							<td class="field"></td>
							<td><?php
									if (empty($data['logo2']))													
										echo "<img src='../../assets/img/default.png' width='100' height='100' alt='' />";
										else
										echo "<img src='../../assets/img/$data[logo2]' width='100' height='100' alt='' />";
								?>
							</td>
							<td align="right"><a href="index.php?page=form-ganti-logo-print&id_logo=<?=$data['id_logo']?>" title="ganti logo" class="btn btn-sm btn-primary m-b-10"><i class="fa fa-gear"></i> &nbsp;Ganti Logo</a></td>
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