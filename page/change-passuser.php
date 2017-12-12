<?php
if(isset($_POST["submit"])){
    $us         = mysql_real_escape_string(strip_tags($_POST["username"]));
    $passlama   = mysql_real_escape_string(strip_tags(md5($_POST["passlama"])));
    $passbaru   = mysql_real_escape_string(strip_tags(md5($_POST["passbaru"])));
    $kode       = mysql_real_escape_string(strip_tags($_POST["kode"]));

    mysql_query("UPDATE user_login set password = '$passbaru' WHERE kodelogin = '$kode' ");

    header("location:index.php?listuser&suksesgantipass");
}

$idA = (int)mysql_real_escape_string(trim($_GET["change-passuser"]));
$sqluser = mysql_query("SELECT * FROM user_login WHERE kodelogin='$idA'") or die (mysql_error());
$rowpass = mysql_fetch_array($sqluser);

?>
<!-- Pick Day -->
<link rel="stylesheet" href="assets/pickday/css/pikaday.css" />
<script>
 function isNumberKeyTgl(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
     //    if (charCode > 31 && (charCode < 47 || charCode > 57))
            return false;

         return true;
      }
</script>
<div id="wrapper">
        <!-- /. NAV SIDE  -->
       <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2 style="margin: 0;">Form ubah password</h2>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
       <!-- content -->
                <div class="row">
                    <form role="form"  action="" method="post" enctype="multipart/form-data" id="validate">

                    <div class="col-lg-12">
                            <input type="hidden" name="kode" value="<?php echo $rowpass["kodelogin"];?>" />

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3"> <label>Username</label></div>
                                    <div class="col-md-5">
                                        <input type="text" disabled="" class="form-control" value="<?php echo $rowpass["username"]; ?>" />
                                        <input type="hidden" name="username" class="form-control" value="<?php echo $rowA["username"]; ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3"><label>Password Baru</label></div>
                                    <div class="col-md-5">
                                        <input class="form-control" id="passbaru" name="passbaru" type="password" data-rule-required="true"  data-msg-required="untuk keamanan password baru wajib di isi"  />
                                    </div>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-8">
                                        <button type="submit" name="submit" class="btn btn-large btn-success">Simpan</button>
                                        <a href="index.php?listuser" class="btn btn-large btn-warning">Kembali</a>
                                    </div>
                                </div>
                    </div>
                </form>
            </div>
        </div>
       </div>
    </div>
<script type="text/javascript" src="assets/validasi/jquery.validate.min.js"></script>
<script type="text/javascript">
$('#validate').validate({
      rules: {
        field: {
          required: true,
          date: true
        }
      }
    });
</script>
