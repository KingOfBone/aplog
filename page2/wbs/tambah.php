<?php
        
    if(isset($_POST["submit"]))
    {
        
        $a      = mysql_real_escape_string(strip_tags($_POST["nmrwbs"]));
        $b      = mysql_real_escape_string(strip_tags($_POST["namawbs"]));
        $c      = tglformataction($_POST["tglwbs"]);
        $d      = mysql_real_escape_string(strip_tags($_POST["jeniswbs"]));
        
        mysql_query ("INSERT INTO wbs (kodewbs, nmrwbs, namawbs, tglwbs, jeniswbs, randomid) VALUES (null,'$a','$b','$c','$d','')");
        
        header("location:index.php?data-wbs&suksestambah");
        
    }
?>

<script type="text/javascript">
    function isNumberKeyTgl(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode
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

<link rel="stylesheet" href="assets/pickday/css/pikaday.css" />
<link rel="stylesheet" href="assets/css/style.css" />
<div id="wrapper">
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper" >
        <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Tambah Data WBS</h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <!--<?php if($_SESSION["sessionsim"] == 1){?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-warning">Data Gagal di tambah, saldo tidak cukup...
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                        </div>
                    </div>
                </div>
                <?php } ?> -->
                <!-- /. content  -->
                <hr />
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Form Tambah Data WBS
                    </div> 
                    <table class="table table-striped text-center" >
                    <form id="validate-me-plz" name="form1" enctype="multipart/form-data" role="form" action="" method="post">
                        
                        <div class="col-lg-6">
                        
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-10"> </br>
                                                <div class="col-md-4"><label>Nomor WBS</label></div>
                                                <div class="col-md-8">
                                                    <input type="text" required="nmrwbs"  name='nmrwbs' class="form-control"  data-msg-required="Mohon masukkan nomor WBS" placeholder="masukkan nomor WBS" />
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <!--
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-10">
                                                <div class="col-md-4"><label>Nama WBS</label></div>
                                                <div class="col-md-8">
                                                    <input type="text"   name='namawbs' class="form-control"  data-msg-required="Mohon masukkan nama WBS" placeholder="masukkan nama WBS" />
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-10">
                                                    <div class="col-md-4"><label>Tanggal WBS</label></div>
                                                    <div class="col-md-8">
                                                        <input  type="text" required="tglwbs" onKeyPress="return isNumberKeyTgl(event)" class="form-control" id="datepicker" name="tglwbs" placeholder="masukkan tanggal penambahan WBS" />
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                                  <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-10">
                                                    <div class="col-md-4"><label>Jenis WBS</label></div>
                                                    <div class="col-md-8">
                                                        <select name="jeniswbs" id="jeniswbs" class="form-control"  data-msg-required="Mohon masukkan jenis WBS.">
                                                            <option>- Pilih -</option>
                                                            <option>Rutin (AO)</option>
                                                            <option>Non Rutin (AI)</option>
                                                        </select>
                                                    </div>
                                        </div>
                                    </div>
                                  </div> 
                                  <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8"><br />
                                            <button type="submit" name="submit" class="btn btn-large btn-success">Simpan</button>
                                            <a href="index.php?data-wbs" class="btn btn-large btn-warning">Kembali</a>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                    </form>
                </table>
            </div>
        </div> 
    </div>  
</div>
<script src="assets/pickday/moment.js"></script>
<script src="assets/pickday/pikaday.js"></script>
<script>
    var picker = new Pikaday({
        field: document.getElementById('datepicker'),
        firstDay: 1,
        minDate: new Date(1960, 0, 1),
        maxDate: new Date(2020, 12, 31),
        yearRange: [1960, 2020],
        format: 'DD/MM/YYYY'
    });
</script>
<script type="text/javascript" src="assets/validasi/jquery.validate.min.js"></script>
<script type="text/javascript">
$('#input01').filestyle();
  $('#validasi').validate({
      rules: {
        field: {
          required: true,
          date: true
        }
      }
    });
</script>