<?php
	
	//$nama_table = explode('-', $qs)[2];
	
	if(isset($_GET['input_delete']))
		delete($nama_table, $peka, $_GET['id']);
	
	
	$sql = "select *, $peka 'id' from $nama_table where status = 'aktif'";
	/* $sql = $db->query($sql);
	$data = $sql->fetch(); */
?>

<div id="wrapper">
        <!-- /. NAV SIDE  -->
       <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Data <?php echo ucwords_kolom_table($menu); ?></h2>
						<hr />
                    </div>
                </div>
                <!-- /. ROW  -->
           <div class="row">
                <div class="col-md-10">
                    <?php if(isset($_GET["sukseshapus"])){?>
						 <div class="alert alert-success">Data Berhasil Di Hapus...
							<button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
						 </div>
						 <?php }else if(isset($_GET["suksesedit"])){ ?>
						 <div class="alert alert-success">Data Berhasil Di Ubah...
							<button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
						 </div>
						 <?php }else if(isset($_GET["suksesbalaskomen"])){ ?>
						 <div class="alert alert-success">Komentar Berhasil Di balas...
							<button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
						 </div>
						 <?php }else if(isset($_GET["suksestambah"])){?>
						 <div class="alert alert-success" id="alertupload">Data  berhasil Ditambah,
						 <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
						 </div>
						<?php } ?>
                </div>
                <div class="col-md-2">
                    <?php
						$qs
					?>
					<a href="?datamaster-tambah-<?php echo $nama_table; ?>" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-plus"></i>Tambah Data</a>
                    <br /><br />
                </div>
           </div>
           <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Table <?php echo ucwords_kolom_table($menu); ?>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <br />
                                <table class="table table-striped table-bordered table-hover" id="datatabel">
                                    <thead>
                                        <tr>
                                            <th width="4%">No</th>
                                            <?php												
												$kolom = [
													'material'=>[
														"nama"=>["label"=>"Nama", "name"=>"nama", "tipe"=>"varchar"],
														"jenis"=>["label"=>"Jenis", "name"=>"jenis", "tipe"=>"varchar"],
														"kategori"=>["label"=>"Kategori", "name"=>"kategori", "tipe"=>"varchar"],
														"jumlah"=>["label"=>"Jumlah", "name"=>"jumlah", "tipe"=>"int"]
													],
													'vendor'=>[
														"nama"=>["label"=>"Nama", "name"=>"nama", "tipe"=>"varchar"],
														"kategori"=>["label"=>"Kategori", "name"=>"kategori", "tipe"=>"varchar"]
													]
												];
												
												
												foreach($kolom[$nama_table] as $b) {
													echo "<th>$b[label]</th>";
												}
											?>
                    						<th width="20%">Aksi</th>
                               			</tr>
                                    </thead>
                                    <tbody>
                                    <?php
										$no=1;
										foreach($db->query($sql) as $row) {
											
									?>
											<tr>
												<td><?php echo $no; ?></td>
												<?php
													foreach($kolom[$nama_table] as $kol) {
														echo "<td>".$row[strtolower($kol['name'])]."</td>";
													}
												?>
												
												<td class="center">
													<!--
													<a href="#" class="detail" data-id="<?php echo $row['id']; ?>" data-nama_table="<?php echo $menu; ?>" role="button" data-toggle="modal">
														<i class="glyphicon glyphicon-zoom-in fa-2x"></i>
													</a>
													-->
													<a title='Ubah' href="?datamaster-update-<?php echo $nama_table; ?>=<?php echo $row['id']; ?>" type="button"><i class="fa fa-pencil-square-o fa-2x"></i></a>
													<a title='Hapus' href="#" id="mau_delete=<?php echo "$qs,$peka,$row[id],$qs"; ?>" class="delete">
														<i class="fa fa-trash-o fa-2x"></i>
													</a>
												</td>
											</tr>
										<?php $no++; } ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                    <!--End Advanced Tables -->
                </div>
            </div>

        </div>
       </div>
    </div>
<script>
 $(document).on('click','.detail',function(e){
    e.preventDefault();
    $("#myModal1").modal('show');
    $.post('page/input/input_modal.php',
    {
		id:$(this).attr('data-id'), 
		nama_table:$(this).attr('data-nama_table')
	},
    function(html){
    $(".modal-body").html(html);
    }
    );
 });
</script>


<div id="myModal1" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content" style="border-radius: 0;">
      <!-- dialog body -->
       <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Detail Data Trafo</h4>
       </div>
      <div class="modal-body"></div>
      <!-- dialog buttons -->
      <div class="modal-footer">
      <button class="btn btn-default"data-dismiss="modal" aria-hidden="true">Tutup</button>
    </div>
  </div>
</div>
</div>
<!-- confirm dell -->
<script src="assets/confirmdell/js/script.js"></script>

<!-- DATA TABLE SCRIPTS -->
    <script src="assets/datatables/jquery.dataTables.js"></script>
    <script src="assets/datatables/dataTables.bootstrap.js"></script>
    <script>
    $(document).ready( function () {
      $('#datatabel').dataTable( {
        "paging":   true,
        "ordering": false,
        "bInfo": false,
        "dom": '<"pull-left"f><"pull-right"l>tip'
      } );
    } );

    </script>
