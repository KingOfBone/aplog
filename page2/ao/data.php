<?php
$sql = mysql_query("SELECT 
newdetailanggaran.*, 
headeranggaran.*
FROM newdetailanggaran
INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid 
INNER JOIN satuan ON headeranggaran.kodesatuan = satuan.kodesatuan
WHERE headeranggaran.kodeapp = '$_SESSION[kodeapp]' AND status IN ('0','1','2','3') 
AND headeranggaran.jenis = 'AO'
") or die (mysql_error());
?>

<div id="wrapper">
        <!-- /. NAV SIDE  -->
       <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Usulan Anggaran Operasi</h2>
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
                    <a href="index.php?tambah-ao" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-plus"></i>Tambah Data</a>
                    <br /><br />
                </div>
           </div>
           <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Tabel Usulan Anggaran Operasi
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="datatabel1">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="2%">No</th>
                                            <th class="text-center" width="6%">Uraian Kegiatan</th>
                                            <th class="text-center" width="2%">Nomor PRK</th>
                                            <th class="text-center" width="1%">Vol. Jasa</th>
                                            <th class="text-center" width="1%">Vol. Material</th>
                                            <th class="text-center" width="3%">Hrg. Satuan Meterial</th>
                                            <th class="text-center" width="2%">Hrg. Satuan Jasa</th>
                                            <th class="text-center" width="3%">Jml. Biaya Material</th>
                                            <th class="text-center" width="2%">Jml. Biaya Jasa</th>
                                            <th class="text-center" width="1%">Status</th>
                    						<th class="text-center" width="2%">Aksi</th>
                               			</tr>
                                    </thead>
                                    <tbody>
                                    <?php
                            				$no=1;
                                            while($row=mysql_fetch_array($sql))
                            				{
                            				?>
                            					<tr>
                                                    <td class="text-center"><?php echo $no; ?></td>
                                                    <td><?php echo $row['uraiankegiatan'];?></td>
                                                    <td><?php echo $row['noprk'];?></td>
                                                    <td class="text-center"><?php echo $row['volumejasa'];?></td>
                                                    <td class="text-center"><?php echo $row['volumematerial'];?></td>
                                                     <td><?php echo "Rp ".number_format($row['hrgsatuanmaterial']);?></td>
                                                    <td><?php echo "Rp ".number_format($row['hrgsatuanjasa']);?></td>
                                                    <td>
                                                        <?php $a = $row['volumematerial']*$row['hrgsatuanmaterial'];
                                                        echo "Rp ". number_format($a); ?>
                                                    </td>
                                                    <td>
                                                        <?php $b = $row['volumejasa']*$row['hrgsatuanjasa'];
                                                        echo "Rp ". number_format($b); ?>
                                                    </td>
                                                    <td class="text-center">
                                                    <?php if ($row['status'] == '0') {echo "Usulan";}
                                                    else if ($row['status'] == '1') {echo "Approve";}
                                                    else if ($row['status'] == '2') {echo "Reject";}
                                                    else if ($row['status'] == '3') {echo "Terevaluasi";}
                                                    ?></td>
                                                    <td class="center">
                                                         <a title="detail" href="#" class="detail" data-id="<?php echo $row["kodedetail"]; ?>" role="button" data-toggle="modal">
                                                            <i class="glyphicon glyphicon-zoom-in fa-2x"></i>
                                                         </a>
                                                         <a title="update" href="index.php?update-ao=<?php echo $row["randomid"]?>" type="button"><i class="fa fa-pencil-square-o fa-2x"></i></a>
                                                         
                                                         <a title="delete" href="#" id="delete-ao=<?php echo $row["kodedetail"]?>&delete-ango=<?php echo $row["kodeanggaran"]?>" class="delete">
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
    $.post('page/ao/detail.php',
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
            <h4 class="modal-title text-center">Detail Usulan AO</h4>
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
