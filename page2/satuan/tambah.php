<?php
if(isset($_POST["submit"])){
    $a     = mysql_real_escape_string(strip_tags($_POST["namasatuan"]));
     mysql_query("INSERT INTO satuan (kodesatuan,namasatuan) VALUES (null,'$a')");
     header("location:index.php?satuan&suksestambah");

    $idA = (int)mysql_real_escape_string(trim($_GET["update-satuan"]));
    $sqlA = mysql_query("SELECT * FROM satuan WHERE kodesatuan = '$idA'") or die (mysql_error());
    if(mysql_num_rows($sqlA)==0) header("location:index.php?satuan");
    $rowA = mysql_fetch_array($sqlA);
    } ?>
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
                        <h2>Tambah Satuan</h2>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
                 <!--
                 <div class="row">
                     <div class="col-md-12">
                        <div class="alert alert-warning">Data Gagal di tambah
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                        </div>
                     </div>
                </div>-->
                 
       <!-- content -->
       <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Form Tambah Satuan
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form id="validate-me-plz" name="form1" role="form" action="" method="post">
                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3"><label>Satuan</label></div>
                                    <div class="col-md-5">
                                        <input class="form-control" id="namasatuan"  name="namasatuan" type="text" placeholder="masukkan data satuan" data-rule-required="true" data-msg-required="Mohon masukkan data di kolom satuan"/>
                                    </div>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-8">
                                        <button type="submit" name="submit" class="btn btn-large btn-success">Simpan</button>
                                        <a href="index.php?satuan" class="btn btn-large btn-warning">Kembali</a>
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
            required: "Mohon masukkan data satuan"
                }
            }

    });
</script>
