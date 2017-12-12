<?php
$data_kontrol = mysql_fetch_array(mysql_query("select * from kontrol"));
$status_anggaran =  $data_kontrol["status"];
$sql = mysql_query("SELECT
    headeranggaran.*,
    newdetailanggaran.*,
    realisasi.*,
    newdetailanggaran.randomid
    FROM
    newdetailanggaran 
    LEFT JOIN realisasi ON newdetailanggaran.randomid = realisasi.randomid
    INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid
    WHERE headeranggaran.kodeapp = '$_SESSION[kodeapp]' AND headeranggaran.jenis = 'AI' AND newdetailanggaran.status = '4'
    AND year(headeranggaran.tartglmulai) = $data_kontrol[tahun]
    ") or die (mysql_error());
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
                                <table class="table table-striped table-bordered table-hover" id="datatabel1">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="1%">No</th>
                                            <th class="text-center" width="8%">Uraian Kegiatan</th>
                                            <th class="text-center" width="5%">Nomor Usulan</th>
                                            <th class="text-center" width="5%">Nomor WBS</th>
                                            <!--
                                            <th class="text-center" width="1%">Nomor PRK</th>
                                            <th class="text-center" width="2%">Vol. Jasa </th>
                                            <th class="text-center" width="2%">Vol. Material </th>
                                            <th class="text-center" width="3%">Hrg. Satuan Meterial </th>
                                            <th class="text-center" width="3%">Hrg. Satuan Jasa </th>
                                            -->
                                            <th class="text-center" width="4%">Jml. Biaya Jasa</th> 
                                            <th class="text-center" width="4%">Jml. Biaya Material</th>
                                            <!--
                                            <th class="text-center" width="3%">Unit APP</th> 
                                            
                                            <th width="3%">Status</th> 
                                            -->
                    						<th class="text-center" width="1%">Aksi</th>
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
                                                    <td><?php echo $row['nousulan'];?></td>
                                                    <td><?php echo $row['nmrwbs'];?></td>
                                                    <!--
                                                    <td><?php echo $row['noprk'];?></td>
                                                    <td>
                                                        U : <?php echo $row['volumejasa']; ?>
                                                        <br />
                                                        
                                                        P : <?php 
                                                        $penetapan = mysql_fetch_array(mysql_query("SELECT * FROM newdetailanggaran
                                                        WHERE status = '4' AND randomid = '".$row['randomid']."'"));
                                                        echo $penetapan['volumejasa']; ?>
                                                        <br />
                                                        
                                                        R : <?php
                                                        $rab = mysql_fetch_array(mysql_query("SELECT * FROM newdetailanggaran
                                                        WHERE status IN ('5','6','7','8') AND randomid = '".$row['randomid']."'"));
                                                        echo $rab['volumejasa']; ?>
                                                    </td>
                                                    
                                                    <td>
                                                        U : <?php echo $row['volumematerial']; ?>
                                                        <br />
                                                        
                                                        P : <?php 
                                                        $penetapan = mysql_fetch_array(mysql_query("SELECT * FROM newdetailanggaran
                                                        WHERE status = '4' AND randomid = '".$row['randomid']."'"));
                                                        echo $penetapan['volumematerial']; ?>
                                                        <br />
                                                        
                                                        R : <?php
                                                        $rab = mysql_fetch_array(mysql_query("SELECT * FROM newdetailanggaran
                                                        WHERE status IN ('5','6','7','8') AND randomid = '".$row['randomid']."'"));
                                                        echo $rab['volumematerial']; ?>
                                                    </td>
                                                    <td>
                                                        U : <?php echo "Rp ".number_format($row['hrgsatuanmaterial'],0,'','.'); ?>
                                                        <br />
                                                        
                                                        P : <?php 
                                                        $penetapan = mysql_fetch_array(mysql_query("SELECT * FROM newdetailanggaran
                                                        WHERE status = '4' AND randomid = '".$row['randomid']."'"));
                                                        echo "Rp ".number_format( $penetapan['hrgsatuanmaterial'],0,'','.'); ?>
                                                        <br />
                                                        
                                                        R : <?php
                                                        $rab = mysql_fetch_array(mysql_query("SELECT * FROM newdetailanggaran
                                                        WHERE status IN ('5','6','7','8') AND randomid = '".$row['randomid']."'"));
                                                        echo "Rp ".number_format( $rab['hrgsatuanmaterial'],0,'','.'); ?>
                                                    </td>
                                                    <td>
                                                        U : <?php echo "Rp ".number_format($row['hrgsatuanjasa'],0,'','.'); ?>
                                                        <br />
                                                        
                                                        P : <?php 
                                                        $penetapan = mysql_fetch_array(mysql_query("SELECT * FROM newdetailanggaran
                                                        WHERE status = '4' AND randomid = '".$row['randomid']."'"));
                                                        echo "Rp ".number_format( $penetapan['hrgsatuanjasa'],0,'','.'); ?>
                                                        <br />
                                                            
                                                        R : <?php
                                                        $rab = mysql_fetch_array(mysql_query("SELECT * FROM newdetailanggaran
                                                        WHERE status IN ('5','6','7','8') AND randomid = '".$row['randomid']."'"));
                                                        echo "Rp ".number_format( $rab['hrgsatuanmaterial'],0,'','.'); ?>
                                                    </td>
                                                    -->
                                                    <td>
                                                        U : <?php
                                                        $usulan = mysql_fetch_array(mysql_query("SELECT * FROM newdetailanggaran
                                                        WHERE status = '3' AND randomid = '".$row['randomid']."'"));
                                                        $a = $usulan['volumejasa']*$usulan['hrgsatuanjasa'];
                                                        echo "Rp ". number_format($a); ?>
                                                        <br />
                                                        P : <?php 
                                                        $penetapan = mysql_fetch_array(mysql_query("SELECT * FROM newdetailanggaran
                                                        WHERE status = '4' AND randomid = '".$row['randomid']."'"));
                                                        $b = $penetapan['volumejasa']*$penetapan['hrgsatuanjasa'];
                                                        echo "Rp ". number_format($b); ?>
                                                        <br />
                                                        R : <?php 
                                                        $rab = mysql_fetch_array(mysql_query("SELECT * FROM newdetailanggaran
                                                        WHERE status IN ('5','6','7','8') AND randomid = '".$row['randomid']."'"));
                                                        $c = $rab['volumejasa']*$rab['hrgsatuanjasa'];
                                                        echo "Rp ". number_format($c); ?>
                                                    </td>
                                                    
                                                    <td>
                                                        U : <?php
                                                        $usulan = mysql_fetch_array(mysql_query("SELECT * FROM newdetailanggaran
                                                        WHERE status = '3' AND randomid = '".$row['randomid']."'"));
                                                        $d = $usulan['volumematerial']*$usulan['hrgsatuanmaterial'];
                                                        echo "Rp ". number_format($d); ?>
                                                        <br />
                                                        P : <?php 
                                                        $penetapan = mysql_fetch_array(mysql_query("SELECT * FROM newdetailanggaran
                                                        WHERE status = '4' AND randomid = '".$row['randomid']."'"));
                                                        $e = $penetapan['volumematerial']*$penetapan['hrgsatuanmaterial'];
                                                        echo "Rp ". number_format($e); ?>
                                                        <br />
                                                        R : <?php 
                                                        $rab = mysql_fetch_array(mysql_query("SELECT * FROM newdetailanggaran
                                                        WHERE status IN ('5','6','7','8') AND randomid = '".$row['randomid']."'"));
                                                        $f = $rab['volumematerial']*$rab['hrgsatuanmaterial'];
                                                        echo "Rp ". number_format($f); ?>
                                                    </td>
                                                    <!--
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
                                                    
                                                    <td>
                                                    <?php if ($row['status'] == '4') {echo "Penetapan";}
                                                    else if ($row['status'] == '5') {echo "RAB";}
                                                    else if ($row['status'] == '6') {echo "Approve(RAB)";}
                                                    else if ($row['status'] == '7') {echo "Reject (RAB)";}
                                                    
                                                    ?></td> -->
                                                    <td class="text-center">
                                                         <a title="detail" href="#" class="detail" data-id="<?php echo $row["randomid"]; ?>" role="button" data-toggle="modal">
                                                            <i class="glyphicon glyphicon-zoom-in fa-2x"></i>
                                                         </a>
                                                         <!--
                                                         <?php 
                                                                $sqlA = mysql_query("SELECT * FROM newdetailanggaran WHERE randomid = '".$row['randomid']."' ORDER BY status DESC");
                                                                $rowA = mysql_fetch_array($sqlA);
                                                         if ($rowA['status'] == '4') {?>
                                                         <a title="tambah" href="index.php?tambah-rab-ai=<?php echo $row["randomid"]?>" type="button"><i class="fa fa-plus fa-2x"></i></a>
                                                         <?php } ?>
                                                         <a title="update" href="index.php?update-rab-ai=<?php echo $row["randomid"]?>&status=5" type="button"><i class="fa fa-pencil-square-o fa-2x"></i></a>
                                                         
                                                         <?php $delete = mysql_query("SELECT * FROM newdetailanggaran WHERE status = '5' AND randomid = '".$row['randomid']."'");
                                                         $rowC = mysql_fetch_array($delete);?>
                                                         <a title="delete" href="#" id="delete-rab-ai=<?php echo $rowC["kodedetail"]?>" class="delete">
                                                            <i class="fa fa-trash-o fa-2x"></i>
                                                         </a>
                                                         -->
                                                    </td>
                            					</tr>
                            				<?php $no++; } ?>
                                    </tbody>
                                </table>
                                <strong> U : Usulan</strong><br />
                                <strong> P : Penetapan</strong><br />
                                <strong> R : RAB</strong><br />
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
    $.post('page/rab/ai/detail-rabai.php',
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
            <h4 class="modal-title text-center">Detail Usulan AI</h4>
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
