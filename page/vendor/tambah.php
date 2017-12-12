<?php
if (isset($_POST["submit"])){

        $var_nmr	     = $_POST["nmrkontrak"];
		$var_judul	     = $_POST["judulkontrak"];
		$var_tglawal	 = tglformataction($_POST["tglawalkontrak"]);
		$var_tglakhir	 = tglformataction($_POST["tglakhirkontrak"]);
        $var_nominal     = $_POST["nominalkontrak"];
        $var_status      = $_POST["status"];

$statement = $db->prepare("INSERT INTO kontrak(nmrkontrak,judulkontrak,tglawalkontrak,tglakhirkontrak,nominalkontrak,status)
		  VALUES(:nmrkontrak,:judulkontrak,:tglawalkontrak,:tglakhirkontrak,:nominalkontrak,:aktif)");

	$statement->execute(array(
	    "nmrkontrak" => $var_nmr,
	    "judulkontrak" => $var_judul,
	    "tglawalkontrak" => $var_tglawal,
	    "tglakhirkontrak" => $var_tglakhir,
	    "nominalkontrak" => $var_nominal,
	    "aktif" => $var_status
	));
    
	$insertid = $db->lastInsertId();
		if ($insertid)
		header("location: index.php?kontrak");
	else
	   echo "record insertion failed";
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
                        <h2>Tambah Data Kontrak</h2>
                    </div>
                </div>
<!-- /. content  -->
                <hr />
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Form Tambah Data Kontrak
                    </div> 
                    <table class="table table-striped text-center" >
                        <form method="post">
                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6"><br />
                                            <div class="col-md-4"><label>Nomor Kontrak</label></div>
                                            <div class="col-md-6">
                                                <input type="text" name='nmrkontrak' required="nmrkontrak" class="form-control" data-msg-required="Mohon masukkan nomor kontrak" placeholder="Masukkan nomor kontrak"/>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                            <div class="col-md-4"><label>Nama Pekerjaan</label></div>
                                            <div class="col-md-6">
                                                <textarea name="judulkontrak" cols="15" rows="3" required="judulkontrak" class="form-control"  data-msg-required="Mohon masukkan nama pekerjaan" placeholder="Masukkan nama pekerjaan"></textarea>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                            <div class="col-md-4"><label>Tanggal Mulai Kontrak</label></div>
                                            <div class="col-md-6">
                                                <input  type="text" required="tglawalkontrak"   onKeyPress="return isNumberKeyTgl(event)" class="form-control" id="datepicker" name="tglawalkontrak" placeholder="Masukkan tanggal awal kontrak"/>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                            <div class="col-md-4"><label>Tanggal Akhir Kontrak</label></div>
                                            <div class="col-md-6">
                                                <input  type="text" required="tglakhirkontrak"   onKeyPress="return isNumberKeyTgl(event)" class="form-control" id="datepicker2" name="tglakhirkontrak" placeholder="Masukkan tanggal akhir kontrak"/>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                            <div class="col-md-4"><label>Nominal Kontrak</label></div>
                                            <div class="col-md-6">
                                                <input type="text" name='nominalkontrak' required="nominalkontrak"  class="form-control"  data-msg-required="Mohon masukkan nominal kontrak" placeholder="Masukkan nominal kontrak"/>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                            <div class="col-md-6">
                                                <input type="hidden" name='status' value="aktif" class="form-control" />
                                            </div>
                                    </div>
                                </div>
                            </div>
                            
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
//style upload
$('#input01').filestyle();

function checkextension() {
  var file = document.querySelector("#uploadkko");
  
  if ( /\.(xls)$/i.test(file.files[0].name) === false ) {
    if ( /\.(xlsx)$/i.test(file.files[0].name) === false ) {
        if ( /\.(doc)$/i.test(file.files[0].name) === false ) {
            if ( /\.(docx)$/i.test(file.files[0].name) === false ) {
            $('#myModal').modal('show') 
            eraseText1() 
                }
            }
        }
    }  
}
function eraseText() {
    document.getElementById("uploadkko").value = "";
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