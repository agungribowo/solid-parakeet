<?php
	include "config/koneksi.php";
	$query	=mysql_query("SELECT * FROM tb_logo WHERE id_logo='1'");
	$data	=mysql_fetch_array($query);
?>
<div class="login bg-blue animated fadeInDown">
	<!-- begin brand -->
	<div class="login-header">
		<div class="brand">
			<span class="logo"><i class="fa fa-bus text-warning"></i></span> SIPerDis
			<small>Sistem Informasi Perjalanan Dinas</small>
		</div>
		<div class="icon">
			<ul class="chats">
				<li class="right">
					<span class="image">
						<?php
							if (empty($data['logo1']))													
							echo "<img src='assets/img/default.png' alt='' />";
							else
							echo "<img src='assets/img/$data[logo1]' alt='' />";
						?>
					</span>
				</li>
			</ul>
		</div>
	</div>
	<!-- end brand -->
	<div class="login-content">
		<form action="index.php?page=login&op=in" method="POST"class="margin-bottom-0">
			<div class="form-group m-b-20 has-feedback">
				<input type="text" name="id_user" class="form-control input-lg no-border" placeholder="Username" required /><span class="fa fa-user form-control-feedback"></span>
			</div>
			<div class="form-group m-b-20 has-feedback">
				<input type="password" name="password" maxlength="255" class="form-control input-lg no-border" placeholder="Password" required /><span class="fa fa-lock form-control-feedback"></span>
			</div>
			<div class="checkbox m-b-20">
				<label>
					<h5><input type="checkbox"/><span class="label">Remember Me</span></h5>
				</label>
			</div>
			<div class="login-buttons">
				<button type="submit" class="btn btn-warning btn-block btn-lg"><i class="fa fa-key"></i> &nbsp;Login</button>
			</div>
		</form>
	</div>
</div>
<?php
	if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
	echo "<br /><div class='pesan alert alert-warning col-sm-8 col-sm-offset-2'>
			 <span class='close' data-dismiss='alert'>x</span> <i class='fa fa-info fa-2x pull-left'></i> ".$_SESSION['pesan']."
		</div>";
	}
	$_SESSION['pesan'] ="";
?>
<script> // 500 = 0,5 s
	$(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 500);});
	setTimeout(function(){$(".pesan").fadeOut('slow');}, 7000);
</script>