<?php

if(isset($_POST["submit"])){
        
        $a    = mysql_real_escape_string(strip_tags($_POST["koderealisasi"]));
        $j    = mysql_real_escape_string(strip_tags($_POST["nospk"]));
        $k    = mysql_real_escape_string(strip_tags($_POST["nopo"]));
        $b    = mysql_real_escape_string(strip_tags($_POST["nilaikontrak"]));
        $c    = mysql_real_escape_string(strip_tags($_POST["namavendor"]));
        $d    = tglformataction($_POST["tglkontrak"]);
        $e      = mysql_real_escape_string(strip_tags($_POST["randomid"]));
        
         mysql_query("UPDATE realisasi SET nospk='$j', nopo='$k', nilaikontrak='$b', namavendor='$c', tglkontrak='$d' 
         WHERE randomid='$e'");
         header("location:index.php?realisasi-ao&suksesedit");

    }
$idA = mysql_real_escape_string(trim($_GET["update-realisasi-ao"]));
$sqlA= mysql_query("SELECT 
((volumejasa*hrgsatuanjasa)+(volumematerial*hrgsatuanmaterial)) 'rab',
realisasi.*,
newdetailanggaran.*
FROM newdetailanggaran
INNER JOIN realisasi ON newdetailanggaran.randomid = realisasi.randomid
WHERE newdetailanggaran.randomid = '$idA' AND newdetailanggaran.status = '9'") or die (mysql_error());
if(mysql_num_rows($sqlA)==0);
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
      <link rel="stylesheet" href="assets/pickday/css/pikaday.css" />
    <div id="wrapper">
        <!-- /. NAV SIDE  -->
       <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Ubah Data Realisasi AO</h2>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
       <!-- content -->
       <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Form Update Realisasi AO
            </div>
            <div class="panel-body">
                            <div class="row">
                                <form id="validate-me-plz" name="form1" enctype="multipart/form-data" role="form" action="" method="post">
                                <input type="hidden" name="koderealisasi" value="<?php echo $idA; ?>" />
                                    <div class="col-lg-6">
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4"><label>Nilai Anggaran</label></div>
                                                <div class="col-md-7">
                                                    <input class="form-control" name="nilaianggaran" id="nilaianggaran" onkeyup="budget();" type="text" data-rule-required="true" disabled="" value="<?php  echo "Rp ".number_format("$rowA[rab]"); ?>" data-msg-required="Mohon masukkan nilai anggaran." placeholder="masukkan nilai anggaran" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4"><label>Nomor SPK</label></div>
                                                <div class="col-md-7">
                                                    <input class="form-control" name="nospk" type="text" required="nospk" data-rule-required="true" value="<?php echo $rowA["nospk"]; ?>" data-msg-required="Mohon masukkan nomor SPK." placeholder="masukkan nomor SPK" />
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4"><label>Nomor PO</label></div>
                                                <div class="col-md-7">
                                                    <input class="form-control" name="nopo" type="text" required="nopo" data-rule-required="true" value="<?php echo $rowA["nopo"]; ?>" data-msg-required="Mohon masukkan nomor PO." placeholder="masukkan nomor PO" />
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4"><label>Nilai Kontrak</label></div>
                                                <div class="col-md-7">
                                                    <input class="form-control" name="nilaikontrak" type="text" id="nilaikontrak" onkeyup="kontrak();" required="nilaikontrak" onKeyPress="return isNumberKey(event)" data-rule-required="true" value="<?php echo $rowA["nilaikontrak"]; ?>" data-msg-required="Mohon masukkan nilai kontrak." placeholder="masukkan nilai kontrak" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4"><label>Nama Vendor</label></div>
                                                <div class="col-md-7">
                                                    <input class="form-control" name="namavendor" type="text" data-rule-required="true" required="namavendor" value="<?php echo $rowA["namavendor"]; ?>" data-msg-required="Mohon masukkan nama vendor." placeholder="masukkan nama vendor" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4"><label>Tanggal Kontrak</label></div>
                                                <div class="col-md-7">
                                                    <input  type="text" onKeyPress="return isNumberKeyTgl(event)" required="tglkontrak" class="form-control" id="datepicker" name="tglkontrak" value="<?php if($rowA["tglkontrak"]=="0000-00-00"){}else{ echo format_tgl($rowA["tglkontrak"]); } ?>" data-rule-required="true" data-rule-date="true" data-msg-date="format yang benar dd/mm/yyyy" data-msg-required="mohon masukkan data tanggal kontrak." placeholder="masukkan tanggal kontrak" />
                                                </div>
                                            </div>
                                        </div>
                                        <!--
                                         <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4"><label>Upload File</label></div>
                                                <div class="col-md-7">
                                                <img src="<?php echo $rowA["fileToUpload"] == "" ? "images/foto/no-images.png" : "foto/".$rowA["fileToUpload"] ?>" width="88" class="img-responsive img-rounded" />
                                                <br />
                                                <input type="file" name="uploadfile" id="uploadfile"/>
                                                <input type="hidden" name="uploadfile1" id="uploadfile1"/>
                                             </div>
                                            </div>
                                        </div>
                                        -->
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-9">
                                                <div class="col-md-8">
                                                    <input class="form-control" name="randomid" type="hidden"  data-rule-required="true" value="<?php echo $rowA["randomid"]; ?>" />
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-5">
                                <button type="submit" name="submit" class="btn btn-large btn-success">Simpan</button>
                                <a href="index.php?realisasi-ao" class="btn btn-large btn-warning">Kembali</a>
                            </div>
                            <div class="col-md-1"></div>
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
                    </div>
                    </form>
                </div>
            </div>
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