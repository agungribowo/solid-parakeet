
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">



<?php
  $kode_biro = $_REQUEST['id_biro'];
if( empty( $_SESSION['id'] ) ){

 if($_SESSION['level']=="")
  header('Location: ./');
  die();
} else {
	if( isset( $_REQUEST['aksi'] )){
		$aksi = $_REQUEST['aksi'];
		switch($aksi){
			case 'baru':
				include '../../aksi/sysadmin/unit/subdit_add.php';
				break;
			// case 'edit':
			// 	include 'transaksi_edit.php';
			// 	break;
			case 'hapus':
				include '../../aksi/sysadmin/unit/unit_hapus.php';
				break;
			// case 'cetak':
			// 	include 'cetak_nota.php';
			// 	break;
		}
	} else {

     // $no_agenda = isset($_GET['kode_agenda']) ?  $_GET['kode_agenda'] : '';

 $sql1 = mysqli_query($koneksi, "SELECT running_text.*
        FROM running_text WHERE id_text='1'
        ");
 $row1 = mysqli_fetch_array($sql1);


echo '




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h3>Data Subdit</h3>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>
 <marquee scrolldelay="100" style="color:red">'.$row1['text_data'].'  </marquee>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
               Input Data
              </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                 <th width="5%">No</th>
                   <th>Subdit</th>
                   <th>Subdit</th>

                  <th>Tool</th>
                </tr>
                </thead>
                <tbody>';

      //skrip untuk menampilkan data dari database
      $sql = mysqli_query($koneksi, "SELECT * FROM subdit where id_biro = '$kode_biro'");
      if(mysqli_num_rows($sql) > 0){
        $no = 0;

         while($row = mysqli_fetch_array($sql)){
          $no++;
        echo '


                <tr>
                <td>'.$no.'</td>

              <td>'.$row['subdit'].'</td>
                <td>'.$row['nama_subdit'].'</td>



                  <td>
                  <a href="?hlm=unit&aksi=hapus&submit=yes&id_unit='.$row['id_unit'].'" onclick="return confirm("hapus")" type="button" class="btn btn-danger" >Hapus</button></td>
                </tr>
';
        }
      } else {
         echo '<td colspan="8"><center><p class="add">Tidak ada data untuk ditampilkan.  </p></center></td></tr>';
      }
      echo '
                </tbody>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>


';
	}
}
?>


    <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data</h4>
              </div>
              <div class="modal-body">
                <form role="form"  action="./admin.php?hlm=subdit&aksi=baru" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Kode Direktorat</label>
                  <input type="text" class="form-control" name="kode_direktorat" placeholder="Kode" value="<?php echo "$kode_biro"; ?>" readonly="readonly">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Subdit</label>
                  <input type="text" class="form-control" name="subdit" >
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">KaSubdit</label>
<br>
                  <select  class="form-control chosen-select   "   name="nama_subdit" required="required" >

                 <option value=""  >--- Pilih data---</option>
                   <?php
              $q = mysqli_query($koneksi, "SELECT pegawai_bnpt.*
              FROM pegawai_bnpt");
              while($data = mysqli_fetch_array($q)){
              echo '<option style="color: blue; width:1000px "  class="'.$data['nip'].'" value="'.$data['nama_pegawai'].'">'.$data['nama_pegawai'].'  ( '.$data['nip'].'/ '.$data['jabatan'].' )</option>';
              }

              ?>

              </select>
                </div>



              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               <!--  <button type="button" class="btn btn-primary">Save changes</button> -->
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
