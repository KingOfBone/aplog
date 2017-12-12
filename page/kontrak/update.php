<?php
$varadd       = $_GET["update-kontrak"];
$query = $db->prepare("SELECT * FROM kontrak WHERE kodekontrak = :kontrak");
    $query->bindParam(":kontrak", $varadd);
    $query->execute();
	$rowuser = $query->fetch();
    
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
                    <h2>Ubah Data Kontrak</h2>
                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <!-- content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Ubah Data Kontrak
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form id="validate-me-plz" name="form1" enctype="multipart/form-data" role="form" action="" method="post">
                                <input type="hidden" name="kodekontrak" value="<?php echo $rowuser["kodekontrak"]; ?>" />
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-10"><br />
                                                        <div class="col-md-4"><label>Nomor Kontrak</label></div>
                                                        <div class="col-md-8">
                                                            <input type="text" name='nmrkontrak' required="nmrkontrak" value="<?php echo $rowuser["nmrkontrak"]; ?>" class="form-control" data-msg-required="Mohon masukkan nomor kontrak" placeholder="Masukkan nomor kontrak"/>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-10">
                                                        <div class="col-md-4"><label>Nama Pekerjaan</label></div>
                                                        <div class="col-md-8">
                                                            <textarea class="form-control" id="judulkontrak"  name="judulkontrak" required="judulkontrak" rows="5" cols="22" type="text" value="<?php  ?>" placeholder="Mohon masukkan nama pekerjaan" data-rule-required="true" data-msg-required="Masukkan nama pekerjaan"><?php echo $rowuser["judulkontrak"];?></textarea>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-10">
                                                        <div class="col-md-4"><label>Tanggal Mulai Kontrak</label></div>
                                                        <div class="col-md-8">
                                                            <input  type="text" required="tglawalkontrak" value="<?php if($rowuser["tglawalkontrak"]=="0000-00-00"){}else{ echo format_tgl($rowuser["tglawalkontrak"]); } ?>"  onKeyPress="return isNumberKeyTgl(event)" class="form-control" id="datepicker" name="tglawalkontrak" placeholder="Masukkan tanggal mulai kontrak"/>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-10">
                                                        <div class="col-md-4"><label>Tanggal Akhir Kontrak</label></div>
                                                        <div class="col-md-8">
                                                            <input  type="text" required="tglakhirkontrak" value="<?php if($rowuser["tglakhirkontrak"]=="0000-00-00"){}else{ echo format_tgl($rowuser["tglakhirkontrak"]); } ?>"  onKeyPress="return isNumberKeyTgl(event)" class="form-control" id="datepicker2" name="tglakhirkontrak" placeholder="Masukkan tanggal akhir kontrak"/>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-10">
                                                        <div class="col-md-4"><label>Nominal Kontrak</label></div>
                                                        <div class="col-md-8">
                                                            <input type="text" name='nominalkontrak' required="nominalkontrak" value="<?php echo $rowuser["nominalkontrak"]; ?>"  class="form-control"  data-msg-required="Mohon masukkan nominal kontrak" placeholder="Masukkan nominal kontrak"/>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br />
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="col-md-8">
                                                        <button type="submit" name="submit" class="btn btn-large btn-success">Simpan</button>
                                                        <a href="index.php?kontrak" class="btn btn-large btn-warning">Kembali</a>
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
//style upload
$('#input01').filestyle();

function checkextension() {
  var file = document.querySelector("#fileuploadkko");
  
  if ( /\.(docx)$/i.test(file.files[0].name) === false ) { 
    //alert("maaf file harus .pdf!");
    if ( /\.(xlsx)$/i.test(file.files[0].name) === false ) { 
            $('#myModal').modal('show') 
            eraseText() 
        }
    
    }
}
function eraseText() {
    document.getElementById("fileuploadkko").value = "";
}
</script>
<!-- Modal Popup upload-->
    <div class="modal fade " id="myModal">
      <div class="modal-dialog">
        <div class="modal-content " style="margin-top:100px; border-radius: 0px;">
          <div class="modal-header bg-warning">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" style="text-align:center; ">File upload hanya .xls & .doc</h4>
          </div>

          <div class="modal-footer bg-warning" style="margin:0px; border-top:0px; ">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>
<?php

if (isset($_POST["submit"])){

$kodekontrak         = $_POST['kodekontrak'];
$nmrkontrak          = $_POST['nmrkontrak'];
$judulkontrak        = $_POST['judulkontrak'];
$tglawalkontrak	     = tglformataction($_POST["tglawalkontrak"]);
$tglakhirkontrak	 = tglformataction($_POST["tglakhirkontrak"]);
$nominalkontrak      = $_POST["nominalkontrak"];

$statement = $db->prepare("UPDATE kontrak SET nmrkontrak=:nmrkontrak, judulkontrak=:judulkontrak, tglawalkontrak=:tglawalkontrak, 
tglakhirkontrak=:tglakhirkontrak, nominalkontrak=:nominalkontrak  WHERE kodekontrak=:kodekontrak");

$statement->execute(array(
		    "nmrkontrak" 		    => $nmrkontrak,
		    "judulkontrak" 	        => $judulkontrak,
		    "tglawalkontrak" 	        => $tglawalkontrak,
		    "tglakhirkontrak" 	        => $tglakhirkontrak,
			"nominalkontrak"		=> $nominalkontrak,
			"kodekontrak"		    => $kodekontrak
		));
		$count = $statement->rowCount();

		if($count =='0'){
		    echo "Failed !";
		}
		else{
		   header("location:index.php?kontrak&suksestambah");
		}

}
        
?>