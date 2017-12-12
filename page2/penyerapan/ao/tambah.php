<?php
    $a = "abcdefghijklmnopqrstuvwxyz";
	$b = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$c = "1234567890";
	$d = $a."".$b."".$c;
	$number = substr((str_shuffle($d)), 0, 10);
    
    if(isset($_POST["submit"]))
    {
        
        $a      = tglformataction($_POST["tglpym"]);
        $b      = mysql_real_escape_string(strip_tags($_POST["jmlpym"]));
        $c      = mysql_real_escape_string(strip_tags($_POST["tahap"]));
        $d      = tglformataction($_POST["tglinput"]);
        $e      = mysql_real_escape_string(strip_tags($_POST["randomid"]));
        $f      = mysql_real_escape_string(strip_tags($_POST["nomigo"]));
        
        
        mysql_query("INSERT INTO pembayaran (kodepym, nomigo, tglpym, jmlpym, tahap, tglinput, randomid, kodebidang) VALUES 
        (null,'$f','$a','$b','$c','$d','$e','$_SESSION[kodebidang]')");
        header("location:index.php?tambah-penyerapan-ao=$e");
    
    }
$idA = mysql_real_escape_string(trim($_GET["form-penyerapan-ao"]));
$sqlA= mysql_query("SELECT 
newdetailanggaran.*, 
headeranggaran.*,
realisasi.*
FROM newdetailanggaran
INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid 
INNER JOIN realisasi ON newdetailanggaran.randomid = realisasi.randomid 
WHERE newdetailanggaran.status = '9' AND newdetailanggaran.randomid = '$idA'") or die (mysql_error());
if(mysql_num_rows($sqlA)==0);
$rowA = mysql_fetch_array($sqlA);

$sqlB= mysql_query("SELECT *,(SELECT uraiankegiatan from headeranggaran b where a.randomid=b.randomid) 
as uraiankegiatan FROM realisasi a where randomid = '$idA'");
$rowB = mysql_fetch_array($sqlB);
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
                        <h2>Tambah Penyerapan AO</h2>
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
                        Form Tambah Penyerapan AO
                    </div> 
                    <table class="table table-striped text-center" >
                    <form id="validate-me-plz" name="form1" enctype="multipart/form-data" role="form" action="" method="post">
                    <input type="hidden" name="kodedetail" value="<?php echo $idA; ?>" />
                        
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6"> <br />
                                                                    <div class="col-md-4"><label>Uraian Kegiatan</label></div>
                                                                    <div class="col-md-8">
                                                                        <textarea class="form-control" id="uraiankegiatan"  disabled="" name="uraiankegiatan" rows="5" cols="22" type="text" value="<?php  ?>" placeholder="masukkan uraian kegiatan" data-rule-required="true" data-msg-required="Mohon masukkan uraian kegiatan"><?php echo $rowA["uraiankegiatan"] ;?></textarea>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                    <div class="col-md-4"><label>Nomor SPK</label></div>
                                                                    <div class="col-md-8">
                                                                        <input type="text"   disabled="" name='nospk' class="form-control"  value="<?php echo $rowA["nospk"]?>" />
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="col-md-4"><label>Nilai Kontrak</label></div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" disabled="" id="kontrak" onkeyup="onkontrak();" value="<?php echo "Rp ". number_format($rowB["nilaikontrak"]); ?>" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php $query1 = mysql_fetch_array(mysql_query("SELECT SUM(jmlpym) as totalpenyerapan FROM `pembayaran` WHERE randomid = '$idA'"));?>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="col-md-4"><label>Penyerapan saat ini</label></div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" disabled=""  value="<?php echo "Rp ". number_format( $query1["totalpenyerapan"]); ?>" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                    <div class="col-md-4"><label>Nomor MIGO</label></div>
                                                                    <div class="col-md-8">
                                                                        <input type="text"  name='nomigo' class="form-control"  required="nomigo" data-msg-required="Mohon masukkan nomor MIGO" placeholder="masukkan nomor MIGO"/>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                        <div class="col-md-4"><label>Tgl Pembayaran</label></div>
                                                                        <div class="col-md-8">
                                                                            <input  type="text" onKeyPress="return isNumberKeyTgl(event)" required="tglpym" class="form-control" id="datepicker2" name="tglpym" placeholder="masukkan tanggal pembayaran" />
                                                                        </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                    <div class="col-md-4"><label>Jumlah Pembayaran</label></div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" name='jmlpym' id="jmlpym" value="0" onkeyup="pembayaran();" required="jmlpym" class="form-control" onKeyPress="return isNumberKey(event)" data-msg-required="Mohon masukkan jumlah pembayaran" placeholder="masukkan jumlah pembayaran" />
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                        <div class="col-md-4"><label>Tahap</label></div>
                                                                        <div class="col-md-8">
                                                                            <input type="text"   name='tahap' class="form-control" required="tahap" onKeyPress="return isNumberKey(event)" data-msg-required="Mohon masukkan tahap" placeholder="masukkan tahap" />
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                        <div class="col-md-4"><label>Tgl Input Penyerapan</label></div>
                                                                        <div class="col-md-8">
                                                                            <input  type="disabled" onKeyPress="return isNumberKeyTgl(event)" required="tglinput" class="form-control" id="datepicker" name="tglinput" placeholder="masukkan tanggal penyerapan" />
                                                                        </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="col-md-4">
                                                                    <button type="submit" name="submit" class="btn btn-large btn-success">Simpan</button>
                                                                    <a href="index.php?penyerapan-ao" class="btn btn-large btn-warning">Kembali</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                    <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="col-md-8">
                                                                    <input type="hidden" class="form-control" disabled="" id="totalkontrak" value="<?php echo ($rowB["nilaikontrak"])-($query1["totalpenyerapan"]); ?>" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="col-md-8">
                                                                    <input type="hidden" hidden="" class="form-control" disabled="" id="totalserapan" value="<?php echo $query1["totalpenyerapan"] ?>" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                        <div class="col-md-9">
                                                            <div class="col-md-8">
                                                                <input class="form-control" name="randomid" type="hidden"  data-rule-required="true" value="<?php echo $rowA["randomid"]; ?>" />
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
<script>
    var picker = new Pikaday({
        field: document.getElementById('datepicker2'),
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
<script>
    function onkontrak() {
      var nkontrak = document.getElementById('kontrak').value;
      var result = parseInt(nkontrak);
      
      document.getElementById('totalkontrak').value = result;     
}
function pembayaran() {
      var pym = document.getElementById('jmlpym').value;
      var result = parseInt(pym);
      
      document.getElementById('totalserapan').value = result;     
}

$(document).ready(function() {
   $('input').change(function(e) {
        var kon = parseInt($('#totalkontrak').val());
        var ser = parseInt($('#totalserapan').val());
        $(':button[type="submit"]').prop('disabled', false);
        
        if(ser > kon){
            $('#myBanding').modal('show');
            $(':button[type="submit"]').prop('disabled', true);
        }
   }); 
});
</script>
    <div class="modal fade " id="myBanding">
      <div class="modal-dialog">
        <div class="modal-content " style="margin-top:100px; border-radius: 0px;">
          <div class="modal-header bg-warning">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" style="text-align:center; ">Nilai penyerapan melebihi Nilai kontrak</h4>
          </div>

          <div class="modal-footer bg-warning" style="margin:0px; border-top:0px; ">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>  