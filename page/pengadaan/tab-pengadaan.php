<?php
$varadd       = $_GET["lihat-pengadaan"];
$query = $db->prepare("SELECT * FROM pengadaanheader WHERE kodepengadaanheader = :pengadaan");
    $query->bindParam(":pengadaan", $get_value);
    $query->execute();
	$rowuser = $query->fetch();
    
?>

<div id="wrapper">
        <!-- /. NAV SIDE  -->
       <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Input Data Pengadaan</h2>
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
                    <a title="tambah pengadaan" href="index.php?tambah-pengadaan=<?php echo $rowuser["kodepengadaanheader"];?>" type="submit" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-plus"></i>Tambah Pengadaan</a>
                    <br /><br />
                </div>
                <?php
				
				
                      $sql="SELECT kontrak.*, pengadaanheader.* FROM kontrak 
                      INNER JOIN pengadaanheader ON kontrak.nmrkontrak = pengadaanheader.nmrkontrak
                      WHERE kontrak.status = 'aktif'";
					  $query = $db->prepare($sql);
					  $query->execute();
					  $row = $query->fetch();
					  
                      /*$stmt=$db->query($sql);
                      while($row=$stmt->fetch(PDO::FETCH_OBJ)){ */?>
           <div class="row" style="margin-bottom: 10px;">
		   <div class="col-md-6">
                <table class="table">
                <tr>
                        <th>No Kontrak</th>
                        <th>:</th>
                        <td><?php echo $row["nmrkontrak"]; ?></td>
                 </tr>
				 
				 <tr>
                        <th>Uraian Kontrak</th>
                        <th>:</th>
                        <td><?php echo $row["judulkontrak"]; ?></td>
                 </tr>
				 
				  <tr>
                        <th>Nilai Kontrak</th>
                        <th>:</th>
                        <td><?php echo "Rp ". number_format($row["nominalkontrak"]); ?></td>
                 </tr>
				 </table>
            </div>
           </div>
          
          
           <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Tabel Input Data Pengadaan
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <br />
                                <table class="table table-striped table-bordered table-hover" id="datatabel">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="2%">No</th>
                                            <th class="text-center" width="6%">No. Pengadaan</th>
                                            <th class="text-center" width="8%">Nama Barang</th>
                                            <th class="text-center" width="8%">Jumlah Pengadaan</th>
                                            <th class="text-center" width="8%">Harga</th>
                                            <th class="text-center" width="8%">Tanggal Pengadaan</th>
                                            <th class="text-center" width="3%">Aksi</th>
                               			</tr>
                                    </thead>
                                    <tbody>
                                    <?php
									
									$no=0;
                                      $sqlA="SELECT kontrak.*, pengadaanheader.* FROM kontrak 
                                      INNER JOIN pengadaanheader ON kontrak.nmrkontrak = pengadaanheader.nmrkontrak
                                      WHERE kontrak.status = 'aktif' ORDER BY kodekontrak DESC";
                                      $queryA = $db->prepare($sqlA);
                					  $queryA->execute();
                					  $rowA = $queryA->fetch();
                                      while($rowA=$queryA->fetch(PDO::FETCH_OBJ)) {
									  $no++;
                                     ?>
                            					<tr>
                                                    <td class="text-center"><?php echo $no; ?></td>
                                                    <td><?php echo $rowA->nmrpengadaan; ?></td>
                                                    <td><?php echo $rowA->judulpengadaan; ?></td>
                                                    <td><?php echo $rowA->satuan; ?></td>
                                                    <td><?php echo $rowA->harga; ?></td>
                                                    <td><?php echo tglindonesia($rowA->tglpengadaan); ?></td>  
                                                    <td class="text-center">
                                                        <a title="update pengadaan" href="index.php?update-pengadaan=<?php echo $rowA->kodeheaderpengadaan; ?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
                                                        <a title='Hapus pengadaan' href="#" id="mau_delete=<?php echo "$qs,$peka,". $rowA->$peka .",$qs"; ?>" class="delete"><i class="fa fa-trash-o fa-2x"></i></a>
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