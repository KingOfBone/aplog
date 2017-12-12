<?php
if(isset($_POST["submit"])){
    $a      = mysql_real_escape_string(strip_tags($_POST["posanggaran"]));
    $n      = mysql_real_escape_string(strip_tags($_POST["kode_posanggaran"]));
    mysql_query("UPDATE pos_anggaran SET posanggaran='$a' WHERE kode_posanggaran='$n'");
    header("location:index.php?pos-anggaran&suksesedit");

}
$idA = (int)mysql_real_escape_string(trim($_GET["update-pos-anggaran"]));
$sqlA = mysql_query("SELECT * FROM pos_anggaran WHERE kode_posanggaran = '$idA'") or die (mysql_error());
if(mysql_num_rows($sqlA)==0) header("location:index.php?pos-anggaran");
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
    <div id="wrapper">
        <!-- /. NAV SIDE  -->
       <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Ubah Pos Anggaran</h2>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
       <!-- content -->
       <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Form Tambah Pos Anggaran
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                    <!-- id="validate-me-plz" -->
                        <form  name="form1" role="form" action="" method="post">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3"><label>Kode Pos Anggaran</label></div>
                                    <div class="col-md-5">
                                        <input  class="form-control" readonly name="kode_posanggaran" value="<?php echo $rowA["kode_posanggaran"] ?>" placeholder="masukkan kode pos anggaran" data-rule-required="true" data-msg-required="Mohon masukkan data di kolom kode pos anggaran"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3"><label>Pos Anggaran</label></div>
                                    <div class="col-md-5">
                                        <input class="form-control" id="posanggaran" value="<?php echo $rowA["posanggaran"] ?>" name="posanggaran" type="text" placeholder="masukkan data pos anggaran" data-rule-required="true" data-msg-required="Mohon masukkan data di kolom pos anggaran"/>
                                    </div>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-8">
                                        <button type="submit" name="submit" class="btn btn-large btn-success">Simpan</button>
                                        <a href="index.php?pos-anggaran" class="btn btn-large btn-warning">Kembali</a>
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
            required: "Mohon masukkan data pos anggaran"
                }
            }

    });
</script>
