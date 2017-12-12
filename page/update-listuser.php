<?php
if(isset($_POST["submit"])){
    
    $kode   = mysql_real_escape_string(strip_tags($_POST["kodelogin"]));
    $a     = mysql_real_escape_string(strip_tags($_POST["nama"]));
    $b     = mysql_real_escape_string(strip_tags($_POST["email"]));
    $c     = mysql_real_escape_string(strip_tags($_POST["username"]));
    $e     = mysql_real_escape_string(strip_tags($_POST["level"]));
    $g     = mysql_real_escape_string(strip_tags($_POST["jabatan"]));

        mysql_query("UPDATE user_login set nama='$a', email='$b', username= '$c', level='$e',
        jabatan='$g' WHERE kodelogin = '$kode' ");

     header("location:index.php?listuser&suksesedit");
    }

$idA = (int)mysql_real_escape_string(trim($_GET["update-listuser"]));
$sqlA = mysql_query("SELECT * FROM user_login WHERE kodelogin = '$idA'") or die (mysql_error());
if(mysql_num_rows($sqlA)==0) header("location:index.php?listuser");
$rowA = mysql_fetch_array($sqlA);

?>
 <script type="text/javascript">
    function isNumberKeyTgl(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
    //     if (charCode > 31 && (charCode < 47 || charCode > 57))
            return false;

         return true;
      }
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 47 || charCode > 57))
            return false;

         return true;
      }
      </script>
<script type="text/javascript" src="assets/js/bootstrap-filestyle.js"></script>
    <div id="wrapper">
        <!-- /. NAV SIDE  -->
       <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Ubah Users</h2>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
                 <!-- <?php if($_SESSION["sessionsim"] == 1){?>
                 <div class="row">
                     <div class="col-md-12">
                        <div class="alert alert-warning">Data Gagal di tambah, saldo tidak cukup...
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                        </div>
                     </div>
                </div>
                 <?php } ?> -->
       <!-- content -->
       <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Form Ubah User
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                    <!-- id="validate-me-plz" -->
                        <form id="validate-me-plz" name="form1" role="form" action="" method="post">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3"><label>Kode Login</label></div>
                                    <div class="col-md-5">
                                        <input type="text" disabled="" class="form-control" value="<?php echo $rowA["kodelogin"]; ?>" />
                                        <input type="hidden" name="kodelogin" class="form-control" value="<?php echo $rowA["kodelogin"]; ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3"><label>Nama</label></div>
                                    <div class="col-md-5">
                                        <input value="<?php echo $rowA["nama"] ?>" class="form-control" name="nama"  placeholder="masukkan nama" data-rule-required="true" data-msg-required="Mohon masukkan nama"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3"><label>Email</label></div>
                                    <div class="col-md-5">
                                        <input value="<?php echo $rowA["email"] ?>" class="form-control" id="email" name="email" type="text" placeholder="masukkan email" data-rule-required="true" data-msg-required="Mohon masukkan email"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3"><label>Username</label></div>
                                    <div class="col-md-5">
                                        <input value="<?php echo $rowA["username"] ?>" class="form-control" name="username"  placeholder="masukkan username" data-rule-required="true" data-msg-required="Mohon masukkan username"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3"><label>Level</label></div>
                                    <div class="col-md-3">
                                        <select name="level" class="form-control" data-rule-required="true" data-msg-required="Mohon masukkan level">
                                            <option value="">- Pilih -</option>
                                            <option <?php if($rowA["level"]=="sa"){?> selected="" <?php }?> value="sa">Admin</option>
                                            <option <?php if($rowA["level"]=="us"){?> selected="" <?php }?> value="us">User</option>
                                            <option <?php if($rowA["level"]=="ma"){?> selected="" <?php }?> value="ma">Manager</option>
                                            <option <?php if($rowA["level"]=="ass"){?> selected="" <?php }?> value="ass">Assman</option>
                                            <option <?php if($rowA["level"]=="ki"){?> selected="" <?php }?> value="ki">Kantor induk</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3"><label>Jabatan</label></div>
                                    <div class="col-md-5">
                                        <input value="<?php echo $rowA["jabatan"] ?>" class="form-control" name="jabatan"  placeholder="masukkan jabatan" data-rule-required="true" data-msg-required="Mohon masukkan jabatan"/>
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

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
<script type="text/javascript" src="assets/validasi/jquery.validate.min.js"></script>
<script type="text/javascript">
$('#validate-me-plz').validate({
      rules: {
        field: {
          required: true,
          date: true
        },
        alamat: {
                required: true
                }
        },
        messages: {
            alamat: {
            required: "Mohon masukkan data alamat"
                }
            }

    });
</script>
