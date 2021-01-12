<?php
ob_start();
session_start();
if(!isset($_SESSION['id_user'])){
    die("<b>Oops!</b> Access Failed.
		<p>Sistem Logout. Anda harus melakukan Login kembali.</p>
		<button type='button' onclick=location.href='../../'>Back</button>");
}
if($_SESSION['hak_akses']!="Superadmin"){
    die("<b>Oops!</b> Access Failed.
		<p>Anda Bukan Superadmin.</p>
		<button type='button' onclick=location.href='../../'>Back</button>");
}
	include "../../config/koneksi.php";
	$tampilUsr	=mysql_query("SELECT * FROM tb_user WHERE id_user='$_SESSION[id_user]'");
	$usr		=mysql_fetch_array($tampilUsr);
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Aplikasi Sistem Informasi Perjalanan Dinas | Siap Jaldis 1.0</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="keywords" />
	<meta content="Raja Putra Media" name="author" />
	<link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon" />	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="../../assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
	<link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="../../assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="../../assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet" />
	<link href="../../assets/css/animate.min.css" rel="stylesheet" />
	<link href="../../assets/css/style.min.css" rel="stylesheet" />
	<link href="../../assets/css/style-responsive.min.css" rel="stylesheet" />
	<link href="../../assets/css/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="../../assets/plugins/jquery-jvectormap/jquery-jvectormap.css" rel="stylesheet" />
	<link href="../../assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
	<link href="../../assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" />
	<link href="../../assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" />
	<link href="../../assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" rel="stylesheet" />
	
	<link href="../../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
	<link href="../../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet" />
	<link href="../../assets/plugins/ionRangeSlider/css/ion.rangeSlider.css" rel="stylesheet" />
	<link href="../../assets/plugins/ionRangeSlider/css/ion.rangeSlider.skinNice.css" rel="stylesheet" />
	<link href="../../assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
	<link href="../../assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" />
	<link href="../../assets/plugins/password-indicator/css/password-indicator.css" rel="stylesheet" />
	<link href="../../assets/plugins/bootstrap-combobox/css/bootstrap-combobox.css" rel="stylesheet" />
	<link href="../../assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
	<link href="../../assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" />
	<link href="../../assets/plugins/jquery-tag-it/css/jquery.tagit.css" rel="stylesheet" />
    <link href="../../assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
    <link href="../../assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />
    <link href="../../assets/plugins/bootstrap-eonasdan-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <link href="../../assets/plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css" rel="stylesheet" />
    <link href="../../assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.css" rel="stylesheet" />
    <link href="../../assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker-fontawesome.css" rel="stylesheet" />
    <link href="../../assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker-glyphicons.css" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="../../assets/plugins/jquery/jquery-2.1.4.min.js"></script>
	<script src="../../assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		<div id="header" class="header navbar navbar-default navbar-fixed-top">
			<!-- begin container-fluid -->
			<div class="container-fluid">
				<!-- begin mobile sidebar expand / collapse button -->
				<div class="navbar-header">
					<a href="./" class="navbar-brand"><span class="navbar-logo"><i class="fa fa-plane"></i></span> &nbsp;<b>Siap Jaldis BNPT</b></a>
					<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- end mobile sidebar expand / collapse button -->
				<!-- begin navbar-collapse -->
                <div class="collapse navbar-collapse pull-left" id="top-navbar">
                    <ul class="nav navbar-nav">
						<li><a href="javascript:;" data-click="sidebar-minify"><i class="ion-navicon-round m-r-5 f-s-20 pull-left text-inverse"></i></a></li>
					</ul>
                </div>
				<!-- end navbar-collapse -->	
				<!-- begin header navigation right -->
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown navbar-user">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<span class="user-image online">
								<?php
									if (empty($usr['avatar']))													
										echo "<img src='../../assets/img/no-avatar.jpg' alt='' />";
										else
										echo "<img src='../../assets/img/$usr[avatar]' alt='' />";
								?>
							</span>
							<span class="hidden-xs"><span class="text-warning">Welcome , </span><?=$usr['nama_user']?></span> <span class="text-warning"><i class="fa fa-caret-down"></i></span>
						</a>
						<ul class="dropdown-menu animated fadeInLeft">
							<li class="arrow"></li>
							<li><a href="index.php?page=form-ganti-password&id_user=<?=$_SESSION['id_user']?>"><i class="ion-ios-locked"></i> &nbsp;Change Password</a></li>
							<li class="divider"></li>
							<li><a href="../../restric/logout.php"><i class="ion-power"></i> &nbsp;Log Out</a></li>
						</ul>
					</li>
				</ul>
				<!-- end header navigation right -->
			</div>
			<!-- end container-fluid -->
		</div>
		<!-- end #header -->
		<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<div class="image">
							<a href="javascript:;">
								<?php
									if (empty($usr['avatar']))													
										echo "<img src='../../assets/img/no-avatar.jpg' alt='' />";
										else
										echo "<img src='../../assets/img/$usr[avatar]' alt='' />";
								?>
							</a>
						</div>
						<div class="info">
							<?=$usr['nama_user']?>
							<small><?=$usr['hak_akses']?></small>
						</div>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav">
					<li class="nav-header">Navigation <i class="fa fa-paper-plane m-l-5"></i></li>
					<li><a href="./"><i class="ion-ios-pulse-strong bg-blue"></i><span>Dashboard</span> <span class="badge bg-primary pull-right">HOME</span></a></li>
					<li class="has-sub">
						<a href="javascript:;"><b class="caret pull-right"></b><i class="ion-ios-gear bg-pink"></i><span>Master Setup</span></a>
						<ul class="sub-menu">
							<li><a href="index.php?page=form-view-setup-instansi"><i class="menu-icon fa fa-caret-right"></i> &nbsp;Kementerian/Lembaga</a></li>
							<li><a href="index.php?page=form-view-data-satker"><i class="menu-icon fa fa-caret-right"></i> &nbsp;Unit Kerja</a></li>
							<li><a href="index.php?page=form-view-setup-logo"><i class="menu-icon fa fa-caret-right"></i> &nbsp;Logo</a></li>
						</ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;"><b class="caret pull-right"></b><i class="ion-ios-gear bg-pink"></i><span>Master Data</span></a>
						<ul class="sub-menu">
							<li><a href="index.php?page=form-view-data-gol"><i class="menu-icon fa fa-caret-right"></i> &nbsp;Golongan</a></li>
							<li><a href="index.php?page=form-view-data-tujuan"><i class="menu-icon fa fa-caret-right"></i> &nbsp;Kota Tujuan</a></li>
							<li><a href="index.php?page=form-view-data-transport"><i class="menu-icon fa fa-caret-right"></i> &nbsp;Jenis Transportasi</a></li>
							<!-- <li><a href="index.php?page=form-view-data-ta"><i class="menu-icon fa fa-caret-right"></i> &nbsp;Tahun Anggaran</a></li> -->
						</ul>
					</li>
					<li><a href="index.php?page=form-view-data-pegawai"><i class="ion-ios-personadd bg-red"></i><span>Data Pegawai</span></a></li>
					<li><a href="index.php?page=form-view-data-user"><i class="ion-ios-personadd bg-purple"></i><span>Management User</span></a></li>
					<!-- begin sidebar minify button -->

					<li><a href="index.php?page=form-view-data-spd"><i class="ion-ios-paper bg-info"></i><span>SPD</span> <span class="badge bg-danger pull-right">CREATE</span></a></li>
					<li><a href="index.php?page=form-view-nominatif"><i class="ion-filing bg-grey"></i><span>Daftar Nominatif</span></a></li>
					<li><a href="index.php?page=form-view-data-rincian"><i class="ion-filing bg-warning"></i><span>Daftar Rincian</span></a></li>
					<li><a href="index.php?page=form-view-data-riil"><i class="ion-filing bg-danger"></i><span>Daftar Riil</span></a></li>
					<li><a href="index.php?page=form-view-data-kwitansi"><i class="fa fa-money bg-success"></i><span>Daftar Kwitansi</span></a></li>
					<li class="has-sub">
						<a href="javascript:;"><b class="caret pull-right"></b><i class="ion-printer"></i><span>Report</span></a>
						<ul class="sub-menu">
							<li><a href="index.php?page=report-spd"><i class="menu-icon fa fa-caret-right"></i> &nbsp;SPD</a></li>
							<li class="has-sub"><a href="javascript:;"><b class="caret pull-right"></b><i class="menu-icon fa fa-caret-right"></i> &nbsp;Anggaran</a>
								<ul class="sub-menu">
								<?php $menuta	=mysql_query("SELECT DISTINCT(tahun) as `tahun` FROM tb_ta ORDER BY id_ta");
									while($mta	=mysql_fetch_array($menuta)){
								?>
									<li><a href="index.php?page=report-anggaran&id_ta=<?=$mta['tahun']?>"><i class="menu-icon fa fa-caret-right"></i> &nbsp;<?php echo $mta['tahun']?></a></li>
								<?php
									}
								?>
								</ul>
							</li>
						</ul>
					</li>

					
						<li><a href="index.php?page=backup-data"><i class="ion-ios-cloud bg-blue"></i><span>Backup Database</span></a></li>
					<li><a href="javascript:;" class="sidebar-minify-btn grey" data-click="sidebar-minify"><i class="ion-ios-arrow-left"></i> <span>Collapse</span></a></li>
			        <!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		<!-- begin #content -->
		<div id="content" class="content">
			<?php
				$page = (isset($_GET['page']))? $_GET['page'] : "main";
				switch ($page) {
					case 'form-view-setup-instansi': include "../../pages/superadmin/setup/instansi/form-view-setup-instansi.php"; break;
					case 'form-setup-instansi': include "../../pages/superadmin/setup/instansi/form-setup-instansi.php"; break;
					case 'setup-instansi': include "../../pages/superadmin/setup/instansi/setup-instansi.php"; break;
					
					case 'form-view-data-user': include "../../pages/superadmin/user/form-view-data-user.php"; break;
					case 'form-master-data-user': include "../../pages/superadmin/user/form-master-data-user.php"; break;
					case 'master-data-user': include "../../pages/superadmin/user/master-data-user.php"; break;
					case 'form-edit-data-user': include "../../pages/superadmin/user/form-edit-data-user.php"; break;
					case 'edit-data-user': include "../../pages/superadmin/user/edit-data-user.php"; break;
					case 'delete-data-user': include "../../pages/superadmin/user/delete-data-user.php"; break;
					case 'reset-password': include "../../pages/superadmin/user/reset-password.php"; break;
					
					case 'form-view-data-satker': include "../../pages/superadmin/satker/form-view-data-satker.php"; break;
					case 'master-satker': include "../../pages/superadmin/satker/master-satker.php"; break;
					case 'edit-satker': include "../../pages/superadmin/satker/edit-satker.php"; break;
					case 'delete-satker': include "../../pages/superadmin/satker/delete-satker.php"; break;

					case 'form-view-data-gol': include "../../pages/superadmin/master/gol/form-view-data-gol.php"; break;
					case 'master-gol': include "../../pages/superadmin/master/gol/master-gol.php"; break;
					case 'edit-gol': include "../../pages/superadmin/master/gol/edit-gol.php"; break;
					case 'delete-gol': include "../../pages/superadmin/master/gol/delete-gol.php"; break;
					
					case 'form-view-data-tujuan': include "../../pages/superadmin/master/tujuan/form-view-data-tujuan.php"; break;
					case 'master-tujuan': include "../../pages/superadmin/master/tujuan/master-tujuan.php"; break;
					case 'edit-tujuan': include "../../pages/superadmin/master/tujuan/edit-tujuan.php"; break;
					case 'delete-tujuan': include "../../pages/superadmin/master/tujuan/delete-tujuan.php"; break;
					
					case 'form-view-data-transport': include "../../pages/superadmin/master/transport/form-view-data-transport.php"; break;
					case 'master-transport': include "../../pages/superadmin/master/transport/master-transport.php"; break;
					case 'edit-transport': include "../../pages/superadmin/master/transport/edit-transport.php"; break;
					case 'delete-transport': include "../../pages/superadmin/master/transport/delete-transport.php"; break;
				
					case 'form-view-data-kelengkapan': include "../../pages/superadmin/master/kelengkapan/form-view-data-kelengkapan.php"; break;
					case 'master-kelengkapan': include "../../pages/superadmin/master/kelengkapan/master-kelengkapan.php"; break;
					case 'edit-kelengkapan': include "../../pages/superadmin/master/kelengkapan/edit-kelengkapan.php"; break;
					case 'delete-kelengkapan': include "../../pages/superadmin/master/kelengkapan/delete-kelengkapan.php"; break;
				

					case 'form-view-data-pegawai': include "../../pages/superadmin/pegawai/form-view-data-pegawai.php"; break;
					case 'master-data-pegawai': include "../../pages/superadmin/pegawai/master-data-pegawai.php"; break;
					case 'form-edit-data-pegawai': include "../../pages/superadmin/pegawai/form-edit-data-pegawai.php"; break;
					case 'edit-data-pegawai': include "../../pages/superadmin/pegawai/edit-data-pegawai.php"; break;
					case 'delete-data-pegawai': include "../../pages/superadmin/pegawai/delete-data-pegawai.php"; break;			
					case 'detail-data-pegawai': include "../../pages/superadmin/pegawai/detail-data-pegawai.php"; break;			
					case 'form-ganti-foto': include "../../pages/superadmin/pegawai/form-ganti-foto.php"; break;			
					case 'ganti-foto': include "../../pages/superadmin/pegawai/ganti-foto.php"; break;	
					
					case 'form-view-setup-logo': include "../../pages/superadmin/setup/logo/form-view-setup-logo.php"; break;
					case 'form-ganti-logo-app': include "../../pages/superadmin/setup/logo/form-ganti-logo-app.php"; break;
					case 'ganti-logo-app': include "../../pages/superadmin/setup/logo/ganti-logo-app.php"; break;
					case 'form-ganti-logo-print': include "../../pages/superadmin/setup/logo/form-ganti-logo-print.php"; break;
					case 'ganti-logo-print': include "../../pages/superadmin/setup/logo/ganti-logo-print.php"; break;


					case 'form-view-data-spd': include "../../pages/superadmin/spd/form-view-data-spd.php"; break;
					case 'form-master-data-spd': include "../../pages/superadmin/spd/form-master-data-spd.php"; break;
					case 'master-data-spd': include "../../pages/superadmin/spd/master-data-spd.php"; break;
					case 'form-edit-data-spd': include "../../pages/superadmin/spd/form-edit-data-spd.php"; break;
					case 'edit-data-spd': include "../../pages/superadmin/spd/edit-data-spd.php"; break;
					case 'delete-data-spd': include "../../pages/superadmin/spd/delete-data-spd.php"; break;			
					case 'detail-data-spd': include "../../pages/superadmin/spd/detail-data-spd.php"; break;
					case 'form-edit-pengikut': include "../../pages/superadmin/spd/form-edit-pengikut.php"; break;
					case 'edit-pengikut': include "../../pages/superadmin/spd/edit-pengikut.php"; break;
					case 'form-edit-lengkap': include "../../pages/superadmin/spd/form-edit-lengkap.php"; break;
					case 'edit-lengkap': include "../../pages/superadmin/spd/edit-lengkap.php"; break;
					
					case 'form-view-nominatif': include "../../pages/superadmin/nominatif/form-view-nominatif.php"; break;
					
					case 'form-view-data-rincian': include "../../pages/superadmin/rincian/form-view-data-rincian.php"; break;
					case 'form-master-data-rincian': include "../../pages/superadmin/rincian/form-master-data-rincian.php"; break;
					case 'master-data-rincian': include "../../pages/superadmin/rincian/master-data-rincian.php"; break;
					case 'form-edit-data-rincian': include "../../pages/superadmin/rincian/form-edit-data-rincian.php"; break;
					case 'edit-data-rincian': include "../../pages/superadmin/rincian/edit-data-rincian.php"; break;
					case 'detail-data-rincian': include "../../pages/superadmin/rincian/detail-data-rincian.php"; break;
					//ln//
					case 'form-master-data-rincian-ln': include "../../pages/superadmin/rincian/form-master-data-rincian-ln.php"; break;
					case 'master-data-rincian-ln': include "../../pages/superadmin/rincian/master-data-rincian-ln.php"; break;
					case 'form-edit-data-rincian-ln': include "../../pages/superadmin/rincian/form-edit-data-rincian-ln.php"; break;
					case 'edit-data-rincian-ln': include "../../pages/superadmin/rincian/edit-data-rincian-ln.php"; break;
					case 'detail-data-rincian-ln': include "../../pages/superadmin/rincian/detail-data-rincian-ln.php"; break;
					
					case 'form-view-data-riil': include "../../pages/superadmin/riil/form-view-data-riil.php"; break;
					case 'form-master-data-riil': include "../../pages/superadmin/riil/form-master-data-riil.php"; break;
					case 'master-data-riil': include "../../pages/superadmin/riil/master-data-riil.php"; break;
					case 'form-edit-data-riil': include "../../pages/superadmin/riil/form-edit-data-riil.php"; break;
					case 'edit-data-riil': include "../../pages/superadmin/riil/edit-data-riil.php"; break;
					case 'detail-data-riil': include "../../pages/superadmin/riil/detail-data-riil.php"; break;
					//ln//
					case 'form-master-data-riil-ln': include "../../pages/superadmin/riil/form-master-data-riil-ln.php"; break;
					case 'master-data-riil-ln': include "../../pages/superadmin/riil/master-data-riil-ln.php"; break;
					case 'form-edit-data-riil-ln': include "../../pages/superadmin/riil/form-edit-data-riil-ln.php"; break;
					case 'edit-data-riil-ln': include "../../pages/superadmin/riil/edit-data-riil-ln.php"; break;
					case 'detail-data-riil-ln': include "../../pages/superadmin/riil/detail-data-riil-ln.php"; break;
					
					case 'form-view-data-kwitansi': include "../../pages/superadmin/kwitansi/form-view-data-kwitansi.php"; break;
					case 'create-kwitansi-2': include "../../pages/superadmin/kwitansi/create-kwitansi-2.php"; break;
					case 'create-kwitansi-1': include "../../pages/superadmin/kwitansi/create-kwitansi-1.php"; break;
					
					case 'report-spd': include "../../pages/superadmin/report/report-spd.php"; break;
					case 'report-spd-bydate': include "../../pages/superadmin/report/report-spd-bydate.php"; break;
					case 'report-anggaran': include "../../pages/superadmin/report/report-anggaran.php"; break;
					case 'report-anggaran-bypeg': include "../../pages/superadmin/report/report-anggaran-bypeg.php"; break;
					

					case 'backup-data': include "../../pages/superadmin/backup/backup-data.php"; break;
					
					case 'form-ganti-password': include "../../pages/superadmin/form-ganti-password.php"; break;
					case 'ganti-password': include "../../pages/superadmin/ganti-password.php"; break;
					
					default : include '../../pages/superadmin/dashboard.php';	
				}
			?>
		</div>
		<!-- end #content -->
		<!-- begin #footer -->
		<div id="footer" class="footer">
		    &copy; 2019. <a href="https://bnpt.go.id" target="_blank">Badan Nasional Penanggulangan Terorisme</a> 
		</div>
		<!-- end #footer -->
        <!-- begin theme-panel -->
        <div class="theme-panel">
            <a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="ion-ios-cog"></i></a>
            <div class="theme-panel-content">
                <h5 class="m-t-0">Color Theme</h5>
                <ul class="theme-list clearfix">
                    <li class="active"><a href="javascript:;" class="bg-blue" data-theme="default" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Default">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-purple" data-theme="purple" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Purple">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-green" data-theme="green" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Green">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-orange" data-theme="orange" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Orange">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-red" data-theme="red" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Red">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-black" data-theme="black" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Black">&nbsp;</a></li>
                </ul>
                <div class="divider"></div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Header Styling</div>
                    <div class="col-md-7">
                        <select name="header-styling" class="form-control input-sm">
                            <option value="1">default</option>
                            <option value="2">inverse</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label">Header</div>
                    <div class="col-md-7">
                        <select name="header-fixed" class="form-control input-sm">
                            <option value="1">fixed</option>
                            <option value="2">default</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Sidebar Styling</div>
                    <div class="col-md-7">
                        <select name="sidebar-styling" class="form-control input-sm">
                            <option value="1">default</option>
                            <option value="2">grid</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label">Sidebar</div>
                    <div class="col-md-7">
                        <select name="sidebar-fixed" class="form-control input-sm">
                            <option value="1">fixed</option>
                            <option value="2">default</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Sidebar Gradient</div>
                    <div class="col-md-7">
                        <select name="content-gradient" class="form-control input-sm">
                            <option value="1">disabled</option>
                            <option value="2">enabled</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-12">
						<hr />
                    </div>
                </div>
            </div>
        </div>
        <!-- end theme-panel -->
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-primary btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="../../assets/plugins/jquery/jquery-1.9.1.min.js"></script>
	<script src="../../assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<script src="../../assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="../../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<!-- <script src="../../assets/plugins/jquery-cookie/jquery.cookie.js"></script> -->
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<!-- <script src="../../assets/plugins/gritter/js/jquery.gritter.js"></script> -->
	<!-- <script src="../../assets/plugins/flot/jquery.flot.min.js"></script>
	<script src="../../assets/plugins/flot/jquery.flot.time.min.js"></script>
	<script src="../../assets/plugins/flot/jquery.flot.resize.min.js"></script>
	<script src="../../assets/plugins/flot/jquery.flot.pie.min.js"></script> -->
	<!-- <script src="../../assets/plugins/sparkline/jquery.sparkline.js"></script> -->
	<!-- <script src="../../assets/plugins/jquery-jvectormap/jquery-jvectormap.min.js"></script>
	<script src="../../assets/plugins/jquery-jvectormap/jquery-jvectormap-world-mill-en.js"></script> -->
	<script src="../../assets/plugins/DataTables/media/js/jquery.dataTables.js"></script>
	<script src="../../assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
	<script src="../../assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
	<script src="../../assets/js/table-manage-responsive.demo.min.js"></script>
	<script src="//cdn.rawgit.com/ashl1/datatables-rowsgroup/v1.0.0/dataTables.rowsGroup.js"></script>

	
	<script src="../../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="../../assets/plugins/ionRangeSlider/js/ion-rangeSlider/ion.rangeSlider.min.js"></script>
	<script src="../../assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
	<script src="../../assets/plugins/masked-input/masked-input.min.js"></script>
	<script src="../../assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
	<script src="../../assets/plugins/password-indicator/js/password-indicator.js"></script>
	<script src="../../assets/plugins/bootstrap-combobox/js/bootstrap-combobox.js"></script>
	<script src="../../assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
	<script src="../../assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
	<script src="../../assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.js"></script>
	<script src="../../assets/plugins/jquery-tag-it/js/tag-it.min.js"></script>
    <script src="../../assets/plugins/bootstrap-daterangepicker/moment.js"></script>
    <script src="../../assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="../../assets/plugins/select2/dist/js/select2.min.js"></script>
    <script src="../../assets/plugins/bootstrap-eonasdan-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <script src="../../assets/plugins/bootstrap-show-password/bootstrap-show-password.js"></script> 
    <script src="../../assets/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js"></script>
    <script src="../../assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.js"></script>
    <script src="../../assets/plugins/clipboard/clipboard.min.js"></script>
	<script src="../../assets/js/form-plugins.demo.min.js"></script>
	<script src="../../assets/js/dashboard.min.js"></script>
	<script src="../../assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
			TableManageResponsive.init();
			FormPlugins.init();

			$("select").select2();

			$("select").on("select2:select", function (evt) {
			var element = evt.params.data.element;
			var $element = $(element);

			$element.detach();
			$(this).append($element);
			$(this).trigger("change");
			});	
		});
	</script>
</body>
</html>