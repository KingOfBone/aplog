<?php
    $a = "abcdefghijklmnopqrstuvwxyz";
	$b = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$c = "1234567890";
	$d = $a."".$b."".$c;
	$number = substr((str_shuffle($d)), 0, 10);
    
    if(isset($_POST["submit"]))
    {
        $j      = mysql_real_escape_string(strip_tags($_POST["nospk"]));
        $i      = mysql_real_escape_string(strip_tags($_POST["nopo"]));
        $a      = mysql_real_escape_string(strip_tags($_POST["nilaikontrak"]));
        $b      = mysql_real_escape_string(strip_tags($_POST["namavendor"])); 
        $c      = tglformataction($_POST["tglkontrak"]);
        $e      = mysql_real_escape_string(strip_tags($_POST["randomid"]));
        $o      = mysql_real_escape_string(strip_tags($_POST["hrgsatuanmaterial"]));
        $p      = mysql_real_escape_string(strip_tags($_POST["volumematerial"]));
        $q      = mysql_real_escape_string(strip_tags($_POST["hrgsatuanjasa"]));
        $r      = mysql_real_escape_string(strip_tags($_POST["volumejasa"]));
        $s      = mysql_real_escape_string(strip_tags($_POST["randomid"]));
        
        mysql_query("INSERT INTO realisasi (koderealisasi, nospk, nopo, nilaikontrak, namavendor, tglkontrak, randomid,
        status, kodeapp) VALUES (null,'$j','$i','$a','$b','$c','$e','9','$_SESSION[kodeapp]')");
        
        mysql_query ("INSERT INTO newdetailanggaran (kodedetail, hrgsatuanmaterial, volumematerial, hrgsatuanjasa, 
        volumejasa, randomid, status) VALUES (null,'$o','$p','$q','$r','$s','9')");
        header("location:index.php?realisasi&suksestambah");
       
    }
$idA = mysql_real_escape_string(trim($_GET["tambah-realisasi-ai"]));
$sqlA= mysql_query("SELECT 
((volumejasa*hrgsatuanjasa)+(volumematerial*hrgsatuanmaterial)) 'rab',
newdetailanggaran.*, 
headeranggaran.*
FROM newdetailanggaran
INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid 
WHERE status IN ('5','7','8') AND newdetailanggaran.randomid = '$idA'") or die (mysql_error());
if(mysql_num_rows($sqlA)==0);
$rowA = mysql_fetch_array($sqlA);
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
                        <h2>Tambah Realisasi AI</h2>
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
                        Form Tambah Realisasi AI
                    </div> 
                    <table class="table table-striped text-center" >
                    <form id="validate-me-plz" name="form1" enctype="multipart/form-data" role="form" action="" method="post">
                    <input type="hidden" name="kodedetail" value="<?php echo $idA; ?>" />
                    
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6"> <br />
                                                                    <div class="col-md-4"><label>Uraian Kegiatan</label></div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" disabled=""  name='uraiankegiatan'  value="<?php echo $rowA['uraiankegiatan'];?>"class="form-control"  data-msg-required="Mohon masukkan uraian kegiatan" placeholder="masukkan uraian kegiatan" />
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                    <div class="col-md-4"><label>Nilai Anggaran</label></div>
                                                                    <div class="col-md-8">
                                                                        <input type="text"   name='nilaianggaran' id="nilaianggaran" onkeyup="budget();" class="form-control" disabled="" value="<?php  echo "Rp ".number_format("$rowA[rab]"); ?>" />
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                    <div class="col-md-4"><label>Nomor SPK</label></div>
                                                                    <div class="col-md-8">
                                                                        <input type="text"   name='nospk' class="form-control" required="nospk"  data-msg-required="Mohon masukkan nomor SPK" placeholder="masukkan nomor SPK" />
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                    <div class="col-md-4"><label>Nomor PO</label></div>
                                                                    <div class="col-md-8">
                                                                        <input type="text"   name='nopo' class="form-control" required="nopo"  data-msg-required="Mohon masukkan nomor PO" placeholder="masukkan nomor PO" />
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                    
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                    <div class="col-md-4"><label>Nilai Kontrak</label></div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" name='nilaikontrak' id="nilaikontrak" value="0" onkeyup="kontrak();" required="nilaikontrak" class="form-control" onKeyPress="return isNumberKey(event)" data-msg-required="Mohon masukkan nilai kontrak" />
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                    <div class="col-md-4"><label>Nama Vendor</label></div>
                                                                    <div class="col-md-8">
                                                                        <input type="text"   name='namavendor' class="form-control" required="namavendor"  data-msg-required="Mohon masukkan nama vendor" placeholder="masukkan nama vendor" />
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                                    <div class="col-md-4"><label>Tanggal Kontrak</label></div>
                                                                    <div class="col-md-8">
                                                                        <input  type="text" onKeyPress="return isNumberKeyTgl(event)" class="form-control" required="tglkontrak" id="datepicker" name="tglkontrak" placeholder="masukkan tanggal kontrak" />
                                                                    </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                        <div class="col-md-8">
                                                        <button type="submit" name="submit" class="btn btn-large btn-success">Simpan</button>
                                                        <a href="index.php?realisasi" class="btn btn-large btn-warning">Kembali</a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                            <div class="col-md-8">
                                                                                <input type="hidden"   name='totalkontrak' id="totalkontrak" disabled="" class="form-control" onKeyPress="return isNumberKey(event)" />
                                                                            </div>
                                                                </div>
                                                            </div>
                                                  </div>
                                                  
                                                  <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                            <div class="col-md-8">
                                                                                <input type="hidden"   name='totalanggaran' id="totalanggaran" disabled="" onkeyup="budget();" value="<?php  echo "$rowA[rab]"; ?>" class="form-control" onKeyPress="return isNumberKey(event)" />
                                                                            </div>
                                                                </div>
                                                            </div>
                                                  </div>
                                                
                                                <div class="form-group">
                                                    <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-8">
                                                            <input class="form-control" name="volumejasa" type="hidden"  data-rule-required="true" value="<?php echo $rowA["volumejasa"]; ?>" data-msg-required="Mohon masukkan volume jasa." placeholder="masukkan volume jasa" />
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                
                                                <div class="form-group">
                                                    <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-8">
                                                            <input class="form-control" name="volumematerial" type="hidden"  data-rule-required="true" value="<?php echo $rowA["volumematerial"]; ?>" data-msg-required="Mohon masukkan volume material." placeholder="masukkan voluem material" />
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                       
                                                <div class="form-group">
                                                    <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-8">
                                                            <input class="form-control" name="hrgsatuanmaterial" type="hidden"  data-rule-required="true" value="<?php echo $rowA["hrgsatuanmaterial"]; ?>" data-msg-required="Mohon masukkan harga satuan material." placeholder="masukkan harga satuan material" />
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-8">
                                                            <input class="form-control" name="hrgsatuanjasa" type="hidden"  data-rule-required="true" value="<?php echo $rowA["hrgsatuanjasa"]; ?>" data-msg-required="Mohon masukkan harga satuan jasa." placeholder="masukkan harga satuan jasa" />
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-8">
                                                            <input class="form-control" name="status" hidden="" type="hidden"  data-rule-required="true" value="<?php echo $rowA["status"]; ?>" data-msg-required="Mohon masukkan status." placeholder="masukkan status" />
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
    function budget() {
      var anggaran = document.getElementById('nilaianggaran').value;
      var result = parseInt(anggaran);
      
      document.getElementById('totalanggaran').value = result;     
}
    function kontrak() {
      var contract = document.getElementById('nilaikontrak').value;
      var result = parseInt(contract);
      
      document.getElementById('totalkontrak').value = result;     
}

$(document).ready(function() {
   $('input').change(function(e) {
        var kon = parseInt($('#totalkontrak').val());
        var ang = parseInt($('#totalanggaran').val());
        $(':button[type="submit"]').prop('disabled', false);
        
        if(kon > ang){
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
            <h4 class="modal-title" style="text-align:center; ">Nilai kontrak melebihi Nilai anggaran</h4>
          </div>

          <div class="modal-footer bg-warning" style="margin:0px; border-top:0px; ">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>