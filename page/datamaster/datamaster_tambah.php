
<?php

	//$nama_table = explode('-', $qs)[2];
	
	if(strtolower($nama_table) == 'material')
		$kolom = [
			[
				"nama"=>["label"=>"Nama", "name"=>"nama", "tipe"=>"varchar"],
				"jenis"=>["label"=>"Jenis", "name"=>"jenis", "tipe"=>"varchar"],
				"kategori"=>["label"=>"Kategori", "name"=>"kategori", "tipe"=>"varchar"],
				"jumlah"=>["label"=>"jumlah", "name"=>"jumlah", "tipe"=>"int"],
				"status"=>["label"=>"status", "name"=>"status", "tipe"=>"hidden", "value"=>"aktif"],
				"insertby"=>["label"=>"insertby", "name"=>"insertby", "tipe"=>"hidden", "value"=>$kodelogin],
				"tglinsert"=>["label"=>"tglinsert", "name"=>"tglinsert", "tipe"=>"hidden", "value"=>"now()"]
			]
		];
	else if(strtolower($nama_table) == 'vendor')
		$kolom = [
			[
				"nama"=>["label"=>"Nama", "name"=>"nama", "tipe"=>"varchar"],
				"kategori"=>["label"=>"Kategori", "name"=>"kategori", "tipe"=>"varchar"],
				"status"=>["label"=>"status", "name"=>"status", "tipe"=>"hidden", "value"=>"aktif"],
				"insertby"=>["label"=>"insertby", "name"=>"insertby", "tipe"=>"hidden", "value"=>$kodelogin],
				"tglinsert"=>["label"=>"tglinsert", "name"=>"tglinsert", "tipe"=>"hidden", "value"=>"now()"]
			]
		];
	
	
		
	
	if(isset($_POST["submit"])) {
		unset($_POST["submit"]);
		
		$post = $_POST;
		
		foreach($post as $key=>$pos) {				
			$post[$key] = $pos;
			$post[$key] = "$post[$key]";
		}
		
		$data = count($post) > 0 ? implode(', ', array_map(
			function ($v, $k) {				
				if(is_array($v)){
					return $k.'[]='.implode('&'.$k.'[]=', $v);
				}else{
					if($v != 'now()')
						return ":$k";
					else
						return "$v";					
				}
			}, 
			$post, 
			array_keys($post)
		)) : false;
		
		$kolomnyah = array_keys($post);	
		
		$data = str_replace("'0'", "null", $data);
		
		$kolomnyah = implode(', ', $kolomnyah);
		unset($post['tglinsert']);
		
		$sql = "insert into $nama_table ($kolomnyah) values($data)";
		$sql = $db->prepare($sql);
		$sql->execute(
			$post
		);
		
		header("location:?datamaster-lihat-$nama_table&&pesan=berhasil");
		die();
	}
?>


<link rel="stylesheet" href="script/dhtmlwindow.css" type="text/css" />
<script type="text/javascript" src="script/dhtmlwindow_fol.js"></script>
<link rel="stylesheet" href="librari/stylesuggest.css" type="text/css" />

<!-- Pick Day -->
<link rel="stylesheet" href="assets/pickday/css/pikaday.css" />
<script type="text/javascript" src="page/gangguan/triger.js"></script>

<div id="wrapper">
    <!-- /. NAV SIDE  -->
   <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Tambah <?php echo ucwords_kolom_table($nama_table); ?> </h2>
                </div>
            </div>
			<!-- /. ROW  -->
			<hr />
			
			
			<?php if(!empty($_GET["pesan"]) && $_GET["pesan"] == 'berhasil'){?>
				<div class="row">
					<div class="col-md-12">
						<div class="alert alert-success">Data berhasil ditambah
							<button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
						</div>
					</div>
				</div>
            <?php } ?>
			
			
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
														if($kol['tipe'] == 'enum') {
															
															echo "<select name='$kol[name]' class='form-control'>";
															foreach($kol['value'] as $val) {
													?>
																<option value='<?php echo $val; ?>'><?php echo $val; ?></option>";													
													<?php
															}
															echo "</select>";
												
														}
														else if($kol['tipe'] == 'int' || $kol['tipe'] == 'varchar') { 
													?>
															<input type="text" class="form-control" name="<?php echo $kol['name'] ?>" data-rule-required="true" data-msg-required="Tidak boleh kosong" />
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
														<a href="?<?php echo $nama_table_kecil; ?>_lihat=<?php echo $nama_table; ?>" class="btn btn-large btn-warning">Kembali</a>
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
	</div>
</div>

<!--datepicker pikaday-->
<script src="assets/datetimepicker-master/build/jquery.datetimepicker.full.js"></script>
<script>
    $('.mulai').datetimepicker({
		dayOfWeekStart : 1,
		lang:'en',
		disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
		startDate:	'2017/01/05'
	});

	$('#normal1').datetimepicker({
	dayOfWeekStart : 1,
	lang:'en',
	disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
	startDate:	'2017/01/05'
	});
</script>
