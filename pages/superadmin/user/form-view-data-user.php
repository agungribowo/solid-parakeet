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
	<li><a href="index.php?page=form-master-data-user" class="btn btn-sm btn-primary m-b-10"><i class="fa fa-plus-circle"></i> &nbsp;Add User</a></li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Data <small>User&nbsp;</small></h1>
<!-- end page-header -->
<?php
	include "../../config/koneksi.php";
	$tampilUsr	=mysql_query("SELECT * FROM tb_user WHERE hak_akses!='Superadmin' ORDER BY hak_akses");
?>
<!-- begin row -->
<div class="row">
	<!-- begin col-12 -->
    <div class="col-md-12">
		<!-- begin panel -->
		<div class="panel panel-inverse">
			<div class="panel-heading">
				<div class="panel-heading-btn">
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
				</div>
				<h4 class="panel-title">Results <span class="text-info"><?php echo mysql_num_rows($tampilUsr);?></span> rows for "Data User"</h4>
			</div>
			<div class="panel-body">
				<table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
					<thead>
						<tr>
							<th width="5%">No #</th>
							<th><i class="fa fa-lock"></i> Username</th>
							<th>Nama</th>
							<th>Unit Kerja</th>
							<th>Hak Akses</th>
							<th>Avatar</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no=0;
							while($usr		=mysql_fetch_array($tampilUsr)){
							$no++;
						?>
						<tr>
							<td class="center"><?=$no?></td>
							<td><?php echo $usr['id_user']?></td>
							<td><?php echo $usr['nama_user']?></td>
							<td><?php
								$selSat	=mysql_query("SELECT satker FROM tb_satker WHERE id_satker='$usr[id_satker]'");
								$sat	=mysql_fetch_array($selSat);
								echo $sat['satker'];
								?>
							</td>
							<td><?php echo $usr['hak_akses']?></td>
							<td><?php echo $usr['avatar']?></td>
							<td class="text-center">
								<a type="button" class="btn btn-warning btn-icon btn-sm" data-toggle="modal" data-target="#Reset<?php echo $usr['id_user']?>" title="reset password"><i class="ion-ios-loop-strong fa-lg"></i></a>
								<a type="button" class="btn btn-info btn-icon btn-sm" href="index.php?page=form-edit-data-user&id_user=<?=$usr['id_user']?>" title="edit"><i class="fa fa-pencil fa-lg"></i></a>
								<a type="button" class="btn btn-danger btn-icon btn-sm" data-toggle="modal" data-target="#Del<?php echo $usr['id_user']?>" title="delete"><i class="fa fa-trash-o fa-lg"></i></a>
							</td>
						</tr>
						<!-- #modal-dialog -->
						<div id="Reset<?php echo $usr['id_user']?>" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title"><span class="label label-inverse"> # Reset Password</span> &nbsp; Password <u><?php echo $usr['id_user']?></u> will be reset to <u>123</u></h5>
									</div>
									<div class="modal-body" align="center">
										<a href="index.php?page=reset-password&id_user=<?=$usr['id_user']?>" class="btn btn-warning">&nbsp; &nbsp;YES&nbsp; &nbsp;</a>
									</div>
									<div class="modal-footer">
										<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</a>
									</div>
								</div>
							</div>
						</div>
						<!-- #modal-dialog -->
						<div id="Del<?php echo $usr['id_user']?>" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title"><span class="label label-inverse"> # Delete</span> &nbsp; Are you sure you want to delete User <u><?php echo $usr['id_user']?></u> from Database?</h5>
									</div>
									<div class="modal-body" align="center">
										<a href="index.php?page=delete-data-user&id_user=<?=$usr['id_user']?>" class="btn btn-danger">&nbsp; &nbsp;YES&nbsp; &nbsp;</a>
									</div>
									<div class="modal-footer">
										<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</a>
									</div>
								</div>
							</div>
						</div>
						<?php
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
		<!-- end panel -->
	</div>
    <!-- end col-10 -->
</div>
<!-- end row -->
<script> // 500 = 0,5 s
	$(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 500);});
	setTimeout(function(){$(".pesan").fadeOut('slow');}, 7000);
</script>