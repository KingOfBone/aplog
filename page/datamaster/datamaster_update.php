

<?php
	$id = $get_value;
	
	if(strtolower($nama_table) == 'material')
		$kolom = [
			[
				"kodematerial"=>["label"=>"Kode Material", "name"=>"kodematerial", "tipe"=>"hidden", "value"=>$id], 
				"nama"=>["label"=>"Nama", "name"=>"nama", "tipe"=>"varchar"],
				"jenis"=>["label"=>"Jenis", "name"=>"jenis", "tipe"=>"varchar"],
				"kategori"=>["label"=>"Kategori", "name"=>"kategori", "tipe"=>"varchar"],
				"jumlah"=>["label"=>"jumlah", "name"=>"jumlah", "tipe"=>"int"],
				"updateby"=>["label"=>"updateby", "name"=>"updateby", "tipe"=>"hidden", "value"=>$kodelogin],
				"tglupdate"=>["label"=>"tglupdate", "name"=>"tglupdate", "tipe"=>"hidden", "value"=>"now()"]
			]
		];
	else if(strtolower($nama_table) == 'vendor')
		$kolom = [
			[
				"kodevendor"=>["label"=>"Kode Vendor", "name"=>"kodevendor", "tipe"=>"hidden", "value"=>$id], 
				"nama"=>["label"=>"Nama", "name"=>"nama", "tipe"=>"varchar"],
				"kategori"=>["label"=>"Kategori", "name"=>"kategori", "tipe"=>"varchar"],
				"updateby"=>["label"=>"updateby", "name"=>"updateby", "tipe"=>"hidden", "value"=>$kodelogin],
				"tglupdate"=>["label"=>"tglupdate", "name"=>"tglupdate", "tipe"=>"hidden", "value"=>"now()"]
			]
		];
	
	
	
	$peka = strtolower($nama_table) == "material" ? 'kodematerial' : '';
	$peka = strtolower($nama_table) == "vendor" ? 'kodevendor' : $peka;
	
	
	
	
	if(isset($_POST["submit"])) {
		unset($_POST["submit"]);
		
		$post = $_POST;
		
		
		foreach($post as $key=>$pos) {				
			$post[$key] = $pos;
			$post[$key] = "$post[$key]";
		}
		
		
		
		
		$set = count($post) > 0 ? implode(', ', array_map(
			function ($v, $k) {				
				if(is_array($v)){
					return $k.'[]='.implode('&'.$k.'[]=', $v);
				}else{
					if($v != 'now()')
						return $k."=:$k";
					else
						return $k."=".$v."";					
				}
			}, 
			$post, 
			array_keys($post)
		)) : false;
		
		var_dump($post);
		
		
		$sql = "update $nama_table set $set where $peka = :$peka";
		$sql = $db->prepare($sql);
		$sql->execute(
			$post
		);
		
		header("location:?datamaster-lihat-$nama_table&&pesan=berhasil");
		die();
	}
	
	$sql = "select * from $nama_table where $peka = $id";
	$sql = $db->query($sql);
	$row = $sql->fetch(PDO::FETCH_ASSOC);
?>
 <script type="text/javascript">
    function isNumberKeyTgl(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
    //     if (charCode > 31 && (charCode < 47 || charCode > 57))
            return false;

         return true;
      }
      function isNumberKey(evt) {
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
                        <h2>Ubah <?php echo ucwords_kolom_table($nama_table); ?></h2>
                    </div>
                </div>
				<!-- /. ROW  -->
	<hr />
	
	<?php if(!empty($_GET["pesan"]) && $_GET["pesan"] == 'berhasil'){?>
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-success">Data berhasil ubah
					<button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
				</div>
			</div>
		</div>
	<?php } ?>
	
	
	
	<!-- content -->
	<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Form Ubah <?php echo ucwords_kolom_table($nama_table); ?>
            </div>
            <div class="panel-body">
                <div class="row">
					<form id="validate-me-plz" name="form1" enctype="multipart/form-data" role="form" action="" method="post">
						
						<?php
							$i_gambar_dinamis = 1;
							
							$array_keys = array_keys($kolom);
							
							foreach($array_keys as $karke=>$arke) {
						?>
								<div class='col-lg-6'>
									<?php 
										foreach($kolom[$arke] as $key=>$kol) { 
									?>
										<div class="form-group">
											<div class="row">
												<?php
													if($kol['tipe'] != 'hidden') { 
												?>												
												<div class="col-md-4">
													<label><?php echo $kol['label']; ?></label>
												</div>
												<?php
													}
												?>
												<div class="col-md-5">
													<?php 
														if($kol['tipe'] == 'hidden') { 
													?>
															<input type="hidden" name="<?php echo $kol['name'] ?>" value="<?php echo $kol['value'] ?>"  />
													
													<?php 
														}
														else if($kol['tipe'] == 'enum') {
															
															echo "<select name='$kol[name]' class='form-control'>";
															foreach($kol['value'] as $val) {
																if(strtolower($nama_table) == 'parameter')
																	$selected = $row['jenis'] == $val ? "selected" : "";
													?>
																<option value='<?php echo $val; ?>' <?php echo $selected; ?> ><?php echo $val; ?></option>													
													<?php
															}
															echo "</select>";
												
														}
														else if($kol['tipe'] == 'int' || $kol['tipe'] == 'varchar') { 
															$attr = $kol['tipe'] == 'int' ? "onKeyPress=\"return isNumberKey(event)\"" : "";
													?>
															<input type="text" <?php echo $attr; ?>  class="form-control" name="<?php echo $kol['name'] ?>" value='<?php echo $row[$kol['name']]?>' data-rule-required="true" data-msg-required="Tidak boleh kosong" />
													<?php 
														}
													?>													
												</div>
											</div>
										</div>
									<?php 
										}
										
										$carkey = count($array_keys);
										if($karke == ($carkey-1)) {
											
									?>
											<div class="form-group">
												<div class="row">
													<div class="col-md-12">
														<button type="submit" name="submit" id="submit" value="submit" class="btn btn-large btn-success">Simpan</button>
														<a href="?datamaster-lihat-<?php echo $nama_table; ?>" class="btn btn-large btn-warning">Kembali</a>
													</div>
												</div>
											</div>
									<?php
										}
									?>
								</div>
						<?php } ?>
						
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
        field: document.getElementByClass('datepicker'),
        firstDay: 1,
        minDate: new Date(1960, 0, 1),
        maxDate: new Date(2500, 12, 31),
        yearRange: [1960, 2500],
        format: 'DD/MM/YYYY'
    });
</script>
<script>
    var picker = new Pikaday({
        field: document.getElementById('datepicker2'),
        firstDay: 1,
        minDate: new Date(1960, 0, 1),
        maxDate: new Date(2500, 12, 31),
        yearRange: [1960, 2500],
        format: 'DD/MM/YYYY'
    });
</script>

<script type="text/javascript" src="assets/validasi/jquery.validate.min.js"></script>
<script type="text/javascript">
$('#fileToUpload').filestyle();
 $('#fileToUpload').change(function(){
      var file = $('#fileToUpload').val();
      var exts = ['jpg','jpeg'];
      if ( file ) {
        var get_ext = file.split('.');
        get_ext = get_ext.reverse();
        if ( $.inArray ( get_ext[0].toLowerCase(), exts ) > -1 ){
          return true;
        } else {
          alert('Hanya boleh jpg ');
          $('#fileToUpload').filestyle('clear');
        }
      }

    });

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
            required: "Mohon masukkan data alamat"
                }
            }

    });
</script>
