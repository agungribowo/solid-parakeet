<?php
  include "config/koneksi.php";
  $query  =mysql_query("SELECT * FROM tb_logo WHERE id_logo='1'");
  $data =mysql_fetch_array($query);
?>
<div class="login bg-blue animated fadeInDown">
  <!-- begin brand -->
  <div class="login-header">
<div class="text-center">
                    <img src="siap_jaldis/img/bnpt.png" style="width: 40%"><br><br>
                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang di Siap Jaldis</h1>
                  </div>
                  <br>

  </div>
  <!-- end brand -->
  <div class="login-content">
    <form action="index.php?page=login&op=in" method="POST"class="margin-bottom-0">
      
<div class="form-group">
        <input type="text" name="id_user"  class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username..."/>
      </div>
      <div class="form-group m-b-20 has-feedback">
        <input type="password" name="password"class="form-control form-control-user" id="exampleInputPassword" placeholder="Password.." />
      </div>
      <div class="checkbox m-b-20">
        <label>
          <h5><input type="checkbox"/><span class="label">Remember Me</span></h5>
        </label>
      </div>
      <div class="login-buttons">
          <input type="submit" name="submit" class="btn btn-warning btn-block btn-lg" value="Masuk">
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