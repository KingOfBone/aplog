
<div id="wrapper">
        <!-- /. NAV SIDE  -->
       <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Data Pengadaan</h2>
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
           </div>
           <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Tabel Data Pengadaan
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="datatabel1">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="1%">No</th>
                                            <th class="text-center" width="10%">Nama Pekerjaan</th>
                                            <th class="text-center" width="4%">Tgl Mulai Kontrak</th>
                                            <th class="text-center" width="4%">Nilai Kontrak</th>
                                            <th class="text-center" width="4%">Nama Pengadaan</th>
                    						<th class="text-center" width="2%">Aksi</th>
                               			</tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $no=1;
                                        $sql="SELECT kontrak.*, pengadaanheader.* FROM kontrak 
                                              INNER JOIN pengadaanheader ON kontrak.nmrkontrak = pengadaanheader.nmrkontrak
                                              WHERE kontrak.status = 'aktif' ORDER BY kodekontrak DESC";
                                        $stmt=$db->query($sql);
                                        while($row=$stmt->fetch(PDO::FETCH_OBJ)){
                                    ?>
                    					<tr>
                                            <td class="text-center"><?php echo $no; ?></td>
                                            <td><?php echo $row->judulkontrak; ?></td>
                                            <td><?php echo tglindonesia( $row->tglawalkontrak); ?></td>
                                            <td><?php echo "Rp ".number_format( $row->nominalkontrak); ?></td>
                                            <td><?php 
                                                    $qrypengadaan = "SELECT * FROM pengadaanheader WHERE kodepengadaanheader = '".$row->kodepengadaanheader."'";
                                                    $pengadaan=$db->query($qrypengadaan);
                                                    
                                                ?>
											
                                            Pengadaan :&nbsp; 
                                            <?php
                                            while($rowB=$pengadaan->fetch(PDO::FETCH_OBJ)) { ?>
                                             -<?php echo $rowB->judulpengadaan; ?><br /> </td>
                                             <?php } ?>
                                            <td class="text-center">
                                                <a title="tambah pengadaan" href="index.php?lihat-pengadaan=<?php echo $row->kodepengadaanheader; ?>"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a>
                                                <!--
                                                <a title="update pengadaan" href="index.php?update-pengadaan=<?php echo $row->kodepengadaanheader; ?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
                                                <a title="delete pengadaan" href="index.php?delete-pengadaan=<?php echo $row->kodepengadaanheader; ?>"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a>
                                                -->
                                            </td>
                    					</tr>
                      				<?php $no++; }?>
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
    $.post('page/kontrak/detail.php',
    {id:$(this).attr('data-id')},
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
            <h4 class="modal-title text-center">Detail Usulan Kontrak</h4>
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
      $('#datatabel1').dataTable( {
        "paging":   true,
        "ordering": false,
        "bInfo": false,
        "dom": '<"pull-left"f><"pull-right"l>tip'
      } );
    } );
</script>