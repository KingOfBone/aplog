<?php
if (isset($_POST["submit"])){

        $var_nmr	         = $_POST["nmrpengadaan"];
		$var_judul	         = $_POST["judulpengadaan"];
		$var_satuan	         = $_POST["satuan"];
		$var_harga	         = $_POST["harga"];
		$var_tglpengadaan	 = tglformataction($_POST["tglpengadaan"]);
        $var_status          = $_POST["status"];



$statement = $db->prepare("INSERT INTO pengadaanheader(nmrpengadaan, judulpengadaan, satuan, harga, tglpengadaan, status, insertby,
tglinsert)VALUES(:nmrpengadaan,:judulpengadaan,:satuan,:harga,:tglpengadaan,:aktif,:insertby,now())");

	$statement->execute(array(
	    "nmrpengadaan" => $var_nmr,
        "judulpengadaan" => $var_judul,
        "satuan" => $var_satuan,
        "harga" => $var_harga,
        "tglpengadaan" => $var_tglpengadaan,
	    "aktif" => $var_status,
	    "insertby" => $kodelogin
	));
    
	$insertid = $db->lastInsertId();
		if ($insertid)
		header("location: index.php?pengadaan");
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
                        <h2>Tambah Data Pengadaan</h2>
                    </div>
                </div>
<!-- /. content  -->
                <hr />
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Form Tambah Data Pengadaan
                    </div> 
                    <table class="table table-striped text-center" >
                        <form method="post">
                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6"><br />
                                            <div class="col-md-4"><label>Nomor Pengadaan</label></div>
                                            <div class="col-md-6">
                                                <input type="text" name='nmrpengadaan' required="nmrpengadaan" class="form-control" data-msg-required="Mohon masukkan nomor pengadaan" placeholder="Masukkan nomor pengadaan"/>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                            <div class="col-md-4"><label>Nama Barang</label></div>
                                            <div class="col-md-6">
                                                <textarea name="judulpengadaan" cols="15" rows="3" required="judulpengadaan" class="form-control"  data-msg-required="Mohon masukkan nama barang" placeholder="Masukkan nama barang"></textarea>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                            <div class="col-md-4"><label>Satuan Barang</label></div>
                                            <div class="col-md-6">
                                                <input type="text" name='satuan' required="satuan" onKeyPress="return isNumberKeyTgl(event)"  class="form-control"  data-msg-required="Mohon masukkan satuan barang" placeholder="Masukkan satuan barang"/>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                            <div class="col-md-4"><label>Harga Barang</label></div>
                                            <div class="col-md-6">
                                                <input type="text" name='harga' required="harga" onKeyPress="return isNumberKeyTgl(event)"  class="form-control"  data-msg-required="Mohon masukkan harga barang" placeholder="Masukkan harga barang"/>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                            <div class="col-md-4"><label>Tanggal Pengadaan</label></div>
                                            <div class="col-md-6">
                                                <input  type="text" required="tglpengadaan"   onKeyPress="return isNumberKeyTgl(event)" class="form-control" id="datepicker" name="tglpengadaan" placeholder="Masukkan tanggal pengadaan"/>
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
                                            <a href="index.php?pengadaan" class="btn btn-large btn-warning">Kembali</a>
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