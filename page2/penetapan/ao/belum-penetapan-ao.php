<?php
$sql = mysql_query("SELECT 
newdetailanggaran.*, 
headeranggaran.*
FROM newdetailanggaran
INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid 
INNER JOIN satuan ON headeranggaran.kodesatuan = satuan.kodesatuan
WHERE jenis = 'AO' AND status = '3'")
or die (mysql_error());
?>

<div id="wrapper">
        <!-- /. NAV SIDE  -->
       <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Penetapan Anggaran Operasi</h2>
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
                             Tabel Penetapan Anggaran Operasi
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <br />
                                <table class="table table-striped table-bordered table-hover" id="datatabel1">
                                    <thead>
                                        <tr>
                                            <th width="2%">No</th>
                                            <th width="6%">Uraian Kegiatan</th>
                                            <th width="2%">No. PRK</th>
                                            <th width="2%">Vol. Jasa</th>
                                            <th width="2%">Vol. Material</th>
                                            <th width="5%">Hrg Satuan Meterial </th>
                                            <th width="5%">Hrg Satuan Jasa </th>
                                            <th width="5%">Jml. Biaya Material</th>
                                            <th width="4%">Jml. Biaya Jasa</th> 
                                            <th width="4%">Unit APP</th> 
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
                                                    <td align="left">
                                                        U: <?php echo $row['volumejasa']; ?>
                                                        <br />
                                                        P: <?php 
                                                        $penetapan = mysql_fetch_array(mysql_query("SELECT * FROM newdetailanggaran
                                                        WHERE status = '4' AND randomid = '".$row['randomid']."'"));
                                                        echo $penetapan['volumejasa']; ?>
                                                    </td>
                                                    <td align="left">
                                                        U: <?php echo $row['volumematerial']; ?>
                                                        <br />
                                                        P: <?php 
                                                        $penetapan = mysql_fetch_array(mysql_query("SELECT * FROM newdetailanggaran
                                                        WHERE status = '4' AND randomid = '".$row['randomid']."'"));
                                                        echo $penetapan['volumematerial']; ?>
                                                    </td>
                                                    <td align="left">
                                                        U: <?php echo "Rp ".number_format($row['hrgsatuanmaterial']); ?>
                                                        <br />
                                                        P: <?php 
                                                        $penetapan = mysql_fetch_array(mysql_query("SELECT * FROM newdetailanggaran
                                                        WHERE status = '4' AND randomid = '".$row['randomid']."'"));
                                                        echo "Rp ".number_format( $penetapan['hrgsatuanmaterial']); ?>
                                                    </td>
                                                    
                                                    <td align="left">
                                                        U: <?php echo "Rp ".number_format($row['hrgsatuanjasa']); ?>
                                                        <br />
                                                        P: <?php 
                                                        $penetapan = mysql_fetch_array(mysql_query("SELECT * FROM newdetailanggaran
                                                        WHERE status = '4' AND randomid = '".$row['randomid']."'"));
                                                        echo "Rp ".number_format( $penetapan['hrgsatuanjasa']); ?>
                                                    </td>
                                                    
                                                    <td align="left">
                                                        U: <?php $a = $row['volumematerial']*$row['hrgsatuanmaterial'];
                                                        echo "Rp ". number_format($a); ?>
                                                        <br />
                                                        P: <?php 
                                                        $penetapan = mysql_fetch_array(mysql_query("SELECT * FROM newdetailanggaran
                                                        WHERE status = '4' AND randomid = '".$row['randomid']."'"));
                                                        $b = $penetapan['volumematerial']*$penetapan['hrgsatuanmaterial'];
                                                        echo "Rp ". number_format($b);?>
                                                    </td>
                                                    
                                                    <td align="left">
                                                        U: <?php $c = $row['volumejasa']*$row['hrgsatuanjasa'];
                                                        echo "Rp ". number_format($c); ?>
                                                        <br />
                                                        P: <?php 
                                                        $penetapan = mysql_fetch_array(mysql_query("SELECT * FROM newdetailanggaran
                                                        WHERE status = '4' AND randomid = '".$row['randomid']."'"));
                                                        $d = $penetapan['volumejasa']*$penetapan['hrgsatuanjasa'];
                                                        echo "Rp ". number_format($d); ?>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                            if ($row['kodeapp'] == '1') {echo "APP Bogor";}
                                                            else if ($row['kodeapp'] == '2') {echo "APP Bandung";}
                                                            else if ($row['kodeapp'] == '3') {echo "APP Karawang";}
                                                            else if ($row['kodeapp'] == '4') {echo "APP Cirebon";}
                                                            else if ($row['kodeapp'] == '5') {echo "APP Purwokerto";}
                                                            else if ($row['kodeapp'] == '6') {echo "APP Salatiga";}
                                                            else if ($row['kodeapp'] == '7') {echo "APP Semarang";}
                                                            else if ($row['kodeapp'] == '99') {echo "Kantor Induk";}
                                                        ?>
                                                    </td>
                                                    
                                                <!--     
                                                    <td>
                                                    <?php if ($row['status'] == '3') {echo "Terevaluasi";}
                                                    else if ($row['status'] == '4') {echo "Penetapan";}
                                                    ?></td> 
                                                 -->
                                                    <td class="center">
                                                    
                                                        <?php if ($row['status'] == '3') {?>
                                                            <a title="detail" href="#" class="detail" data-id="<?php echo $row["kodedetail"]; ?>" role="button" data-toggle="modal">
                                                            <i class="glyphicon glyphicon-zoom-in fa-2x"></i></a>   
                                                        <?php } else if ($row['status'] == '4') {?>
                                                            <a title="detail" href="#" class="detailtetapan" data-id="<?php echo $row["kodedetail"]; ?>" role="button" data-toggle="modal">
                                                            <i class="glyphicon glyphicon-zoom-in fa-2x"></i></a>
                                                        <?php } else{echo "";}?>
                                                        
                                                        <?php 
                                                            $sqlA = mysql_query("SELECT * FROM newdetailanggaran WHERE randomid = '".$row['randomid']."' ORDER BY status DESC");
                                                            $rowA = mysql_fetch_array($sqlA);
                                                                if ($rowA['status'] == '3') { ?>
                                                                <a title="penetapan" href="index.php?penetapan-ao=<?php echo $row["kodedetail"]?>"
                                                                type="button"><i class="fa fa-thumbs-o-up fa-2x"></i></a>
                                                        <?php } ?>
                                                        <?php $delete = mysql_query("SELECT * FROM newdetailanggaran WHERE status = '4' AND randomid = '".$row['randomid']."'");
                                                        $rowC = mysql_fetch_array($delete);?>
                                                         <a title="delete" href="#" id="delblm-penetapan-ao=<?php echo $rowC["kodedetail"]?>" class="delete">
                                                            <i class="fa fa-trash-o fa-2x"></i>
                                                         </a>
                                                    </td>
                            					</tr>
                            				<?php $no++; } ?>
                                    </tbody>
                                    
                                </table>
                                    <strong>U : Usulan</strong><br />
                                    <strong>P : Penetapan</strong><br />
                                    <strong>R : RAB</strong><br />
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
    $.post('page/penetapan/ao/detail-penetapan-ao.php',
    {id:$(this).attr('data-id')},
    function(html){
    $(".modal-body").html(html);
    }
    );
 });
 $(document).on('click','.detailtetapan',function(e){
    e.preventDefault();
    $("#myModal1").modal('show');
    $.post('page/penetapan/ao/fix-detail-tetapan-ao.php',
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
            <h4 class="modal-title text-center">Detail Penetapan AO</h4>
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
