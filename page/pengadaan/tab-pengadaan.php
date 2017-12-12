<?php

$query = $db->prepare("SELECT * FROM pengadaan WHERE kodepengadaanheader = :pengadaan");
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
                    <a title="tambah pengadaan" href="index.php?tambah-pengadaan=<?php echo $rowuser["kodeheaderpengadaan"];?>" type="submit" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-plus"></i>Tambah Penyerapan</a>
                    <br /><br />
                </div>
                <?php
                      $sql="SELECT kontrak.*, pengadaanheader.* FROM kontrak 
                      INNER JOIN pengadaanheader ON kontrak.nmrkontrak = pengadaanheader.nmrkontrak
                      WHERE kontrak.status = 'aktif' ORDER BY kodekontrak DESC";
                      $stmt=$db->query($sql);
                      while($row=$stmt->fetch(PDO::FETCH_OBJ)){ ?>
           <div class="col-lg-6">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="col-md-4"><label>Nama Pekerjaan</label></div>
                            <div class="col-md-7">
                                <textarea class="form-control" disabled="" rows="3" cols="5" type="text" value="<?php  ?>" ><?php echo $row["judulkontrak"] ;?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="col-md-4"><label>Nilai Kontrak</label></div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" disabled="" id="kontrak" onkeyup="onkontrak();" value="<?php echo "Rp ". number_format($row["nilaikontrak"]); ?>" />
                            </div>
                        </div>
                    </div>
                </div>
           </div>
           <?php } ?>
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
                                      $sqlA="SELECT kontrak.*, pengadaanheader.* FROM kontrak 
                                      INNER JOIN pengadaanheader ON kontrak.nmrkontrak = pengadaanheader.nmrkontrak
                                      WHERE kontrak.status = 'aktif' ORDER BY kodekontrak DESC";
                                      $stmtA=$db->query($sqlA);
                                      while($rowA=$stmtA->fetch(PDO::FETCH_OBJ)) {
                                     ?>
                            					<tr>
                                                    <td class="text-center"><?php echo $no; ?></td>
                                                    <td><?php echo $rowA->nmrpengadaan; ?></td>
                                                    <td><?php echo $rowA->judulpengadaan; ?></td>
                                                    <td><?php echo $rowA->satuan; ?></td>
                                                    <td><?php echo $rowA->harga; ?></td>
                                                    <td><?php echo tglindonesia( $rowA->tglpengadaan); ?></td>  
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