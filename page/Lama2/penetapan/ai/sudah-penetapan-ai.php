<?php
$sql = mysql_query("SELECT 
newdetailanggaran.*, 
headeranggaran.*
FROM newdetailanggaran
INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid 
INNER JOIN fungsi ON headeranggaran.kodefungsi = fungsi.kodefungsi
INNER JOIN pos_anggaran ON headeranggaran.kode_posanggaran = pos_anggaran.kode_posanggaran
INNER JOIN satuan ON headeranggaran.kodesatuan = satuan.kodesatuan
WHERE jenis = 'AI' AND status = '4'")
or die (mysql_error());
?>

<div id="wrapper">
        <!-- /. NAV SIDE  -->
       <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Rekap Penetapan AI</h2>
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
                             Tabel Rekap Penetapan AI
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <br />
                                <table class="table table-striped table-bordered table-hover" id="datatabel">
                                    <thead>
                                        <tr>
                                            <th width="2%">No</th>
                                            <th width="6%">Uraian Kegiatan</th>
                                            <th width="3%">No. PRK</th>
                                            <th width="4%">Vol. Jasa</th>
                                            <th width="4%">Vol. Material</th>
                                            <th width="6%">Hrg Satuan Meterial </th>
                                            <th width="6%">Hrg Satuan Jasa </th>
                                            <th width="4%">Jml. Biaya Material</th>
                                            <th width="3%">Jml. Biaya Jasa</th> 
                                            <!--
                                            <th width="2%">Status</th> 
                                            -->
                    						<th width="1%">Aksi</th>
                               			</tr>
                                    </thead>
                                    <tbody>
                                    <?php
                            				$no=1;
                                            while($row=mysql_fetch_array($sql))
                            				{
                            				?>
                            					<tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $row['uraiankegiatan'];?></td>
                                                    <td><?php echo $row['noprk'];?></td>
                                                    <!--
                                                    <td><?php echo $row['volumejasa'];?></td>
                                                    <td><?php echo $row['volumematerial'];?></td>
                                                    -->
                                                    <td align="left">
                                                        U : <?php 
                                                        $penetapan = mysql_fetch_array(mysql_query("SELECT * FROM newdetailanggaran
                                                        WHERE status = '3' AND randomid = '".$row['randomid']."'"));
                                                        echo "Rp ".number_format( $penetapan['volumejasa'],0,'','.'); ?>
                                                        <br />
                                                        P : <?php echo "Rp ".number_format($row['volumejasa'],0,'','.'); ?>
                                                    </td>
                                                    <td align="left">
                                                        U : <?php 
                                                        $penetapan = mysql_fetch_array(mysql_query("SELECT * FROM newdetailanggaran
                                                        WHERE status = '3' AND randomid = '".$row['randomid']."'"));
                                                        echo "Rp ".number_format( $penetapan['volumematerial'],0,'','.'); ?>
                                                        <br />
                                                        P : <?php echo "Rp ".number_format($row['volumematerial'],0,'','.'); ?>
                                                    </td>
                                                    <td align="left">
                                                        U : <?php 
                                                        $penetapan = mysql_fetch_array(mysql_query("SELECT * FROM newdetailanggaran
                                                        WHERE status = '3' AND randomid = '".$row['randomid']."'"));
                                                        echo "Rp ".number_format( $penetapan['hrgsatuanmaterial'],0,'','.'); ?>
                                                        <br />
                                                        P : <?php echo "Rp ".number_format($row['hrgsatuanmaterial'],0,'','.'); ?>
                                                    </td>
                                                    <td align="left">
                                                        U : <?php 
                                                        $penetapan = mysql_fetch_array(mysql_query("SELECT * FROM newdetailanggaran
                                                        WHERE status = '3' AND randomid = '".$row['randomid']."'"));
                                                        echo "Rp ".number_format( $penetapan['hrgsatuanjasa'],0,'','.'); ?>
                                                        <br />
                                                        P : <?php echo "Rp ".number_format($row['hrgsatuanjasa'],0,'','.'); ?>
                                                    </td>
                                                    <td align="left">
                                                        U: <?php 
                                                        $penetapan = mysql_fetch_array(mysql_query("SELECT * FROM newdetailanggaran
                                                        WHERE status = '3' AND randomid = '".$row['randomid']."'"));
                                                        echo "Rp ".$penetapan['volumematerial']*$penetapan['hrgsatuanmaterial']; ?>
                                                        <br />
                                                        P: <?php echo "Rp ".$row['volumematerial']*$row['hrgsatuanmaterial']; ?>
                                                    </td>
                                                    
                                                    <td align="left">
                                                        U: <?php 
                                                        $penetapan = mysql_fetch_array(mysql_query("SELECT * FROM newdetailanggaran
                                                        WHERE status = '3' AND randomid = '".$row['randomid']."'"));
                                                        echo "Rp ".$penetapan['volumejasa']*$penetapan['hrgsatuanjasa']; ?>
                                                        <br />
                                                        P: <?php echo "Rp ".$row['volumejasa']*$row['hrgsatuanjasa']; ?>
                                                    </td>
                                                    <!--        
                                                    <td>
                                                        <?php if ($row['status'] == '3') {echo "";}
                                                        else if ($row['status'] == '4') {echo "Penetapan";}
                                                        ?>
                                                    </td>
                                                    --> 
                                                    <td class="center">
                                                    
                                                        <?php if ($row['status'] == '3') {?>
                                                            <a href="#" class="detail" data-id="<?php echo $row["kodedetail"]; ?>" role="button" data-toggle="modal">
                                                            <i class="glyphicon glyphicon-zoom-in fa-2x"></i></a>   
                                                        <?php } else if ($row['status'] == '4') {?>
                                                            <a href="#" class="detailtetapan" data-id="<?php echo $row["kodedetail"]; ?>" role="button" data-toggle="modal">
                                                            <i class="glyphicon glyphicon-zoom-in fa-2x"></i></a>
                                                        <?php } else{echo "";}?>
                                                        
                                                        <?php if ($row['status'] == '3') {?>
                                                            <a href="index.php?penetapan-ai=<?php echo $row["kodedetail"]?>"
                                                            type="button"><i class="fa fa-thumbs-o-up fa-2x"></i></a>
                                                        <?php } else{echo "";}?>
                                                        <!--
                                                         <a href="#" id="delsdh-penetapan-ai=<?php echo $row["kodedetail"]?>" class="delete">
                                                            <i class="fa fa-trash-o fa-2x"></i>
                                                         </a>
                                                         -->
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
    $.post('page/penetapan/ai/detail-penetapan-ai.php',
    {id:$(this).attr('data-id')},
    function(html){
    $(".modal-body").html(html);
    }
    );
 });
 $(document).on('click','.detailtetapan',function(e){
    e.preventDefault();
    $("#myModal1").modal('show');
    $.post('page/penetapan/ai/fix-detail-tetapan-ai.php',
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
            <h4 class="modal-title text-center">Detail Penetapan AI</h4>
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