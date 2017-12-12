<?php
session_start();
// panggil file koneksi.php
require_once ('../../config/koneksi.php');

// tangkap variabel
$kode_approve_ang = $_POST['id'];

if(isset($_POST['kode'])) {
// deklarasikan variabel
	$kode      = $_POST['kode'];
	$status    = $_POST['status'];
    $alasan    = $_POST['alasan'];
}
?>
<form  method="post" id="form_approve" action="">
<input type="hidden" name="kode" value="<?php echo $kode_approve_ang; ?>"/>
<div class="row">
    <div class="col-md-6">
        <div class="control-group"><br />
    		<label class="control-label" for="status">Status: </label>
    	</div>
    </div> 
    <div class="col-md-6">
	<div class="control-group">
		<label class="control-label" for="status"></label>
		<div class="controls" style="width: 64%;">
			<select class="form-control" name="status" id="status">
                <option>--Pilih--</option>
				<option value="6">Reject</option>
				<option value="7">Approve</option>
			</select> <br />
		</div>
	</div>
    </div> 
    <div class="col-md-6">
        <div class="control-group">
    		<label class="control-label" for="alasan">Alasan: </label>
     	</div>
    </div>
    <div class="col-md-6">
	<div class="control-group">
		<label class="control-label" for="alasan"></label>
            <textarea id="alasan" name="alasan" cols="25" rows="5"
            placeholder="Masukan alasan"> </textarea>
    </div>
    <br />
    </div>
    
    <div class="col-md-6"></div>
	<div class="control-group">
        &nbsp;&nbsp;&nbsp;&nbsp;
        <button id="simpan-approve" type="submit" name="simpan-approve" class="btn btn-success" >Simpan</button>
    </div>
 </div>
</form>