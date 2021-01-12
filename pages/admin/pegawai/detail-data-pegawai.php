<?php
	if (isset($_GET['id_peg'])) {
	$id_peg = $_GET['id_peg'];
	}
	include "../../config/koneksi.php";
	$query   =mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$id_peg'");
	$data    =mysql_fetch_array($query);
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
	<li><a href="index.php?page=form-view-data-pegawai" title="back" class="btn btn-sm btn-white m-b-10"><i class="fa fa-step-backward"></i> &nbsp;Back</a></li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Profile <small>Pegawai <i class="fa fa-angle-right"></i> <?=$data['nama']?> <i class="fa fa-lock"></i> NIP/NRP : <?=$data['nip']?></small></h1>
<!-- end page-header -->
<!-- begin row -->
<div class="row">
	<div class="col-md-12">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#profile" data-toggle="tab"><span class="visible-xs">Profile</span><span class="hidden-xs"><i class="ion-ios-person fa-lg text-primary"></i> Profile</span></a></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane fade active in" id="profile">
				<!-- begin profile-container -->
				<div class="profile-container">
                <!-- begin profile-section -->
					<div class="profile-section">
						<!-- begin profile-left -->
						<div class="profile-left">
							<!-- begin profile-image -->
							<div class="profile-image">
								<a href="index.php?page=form-ganti-foto&id_peg=<?=$id_peg?>" title="ganti foto">
									<?php
										if (empty($data['foto']))
										echo "<img src='../../assets/img/foto/no-foto.png' width='160' height='200' /><i class='fa fa-user hide'></i>";
										else
										echo "<img src='../../assets/img/foto/$data[foto]' width='160' height='200' /><i class='fa fa-user hide'></i>";
									?>
								</a>
							</div>
							<!-- end profile-image -->
						</div>
						<!-- end profile-left -->
						<!-- begin profile-right -->
						<div class="profile-right">
							<!-- begin profile-info -->
							<div class="profile-info">
								<!-- begin table -->
								<div class="table-responsive">
									<table class="table table-profile">
										<thead>
											<tr>
												<th><h5><span class="label label-inverse pull-right"> # Biodata Pegawai </span></h5></th>
												<th>
													<h4><?=$data['nama']?> <small><?=$data['pangkat']?></small></h4>
												</th>
											</tr>
										</thead>
										<tbody>
											<tr class="highlight">
												<td class="field">NIP/NRP</td>
												<td><?=$data['nip']?></td>
											</tr>
											<tr class="divider">
												<td colspan="2"></td>
											</tr>
											<tr>
												<td class="field">Golongan</td>
												<td><?php
													$selGol	=mysql_query("SELECT * FROM tb_gol WHERE id_gol='$data[gol]'");
													$gol	=mysql_fetch_array($selGol);
													echo $gol['gol'];
													?>
												</td>
											</tr>
											<tr>
												<td class="field">Jabatan</td>
												<td><?=$data['jab']?></td>
											</tr>
											<tr>
												<td class="field">Satuan Kerja</td>
												<td><?php
													$selSat	=mysql_query("SELECT * FROM tb_satker WHERE id_satker='$data[satker]'");
													$sat	=mysql_fetch_array($selSat);
													echo $sat['satker'];
													?>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<!-- end table -->
							</div>
							<!-- end profile-info -->
						</div>
						<hr />
						<!-- end profile-right -->
					</div>
					<!-- end profile-section -->
				</div>
				<!-- end profile-container -->
			</div>
		</div>
	</div>
</div>
<script> // 500 = 0,5 s
	$(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 500);});
	setTimeout(function(){$(".pesan").fadeOut('slow');}, 7000);
</script>