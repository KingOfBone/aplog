<?php
$data_kontrol = mysql_fetch_array(mysql_query("select * from kontrol"));
$status_anggaran =  $data_kontrol["tahun"];
    
$sql = mysql_query("SELECT
newdetailanggaran.kodedetail,
newdetailanggaran.volumejasa,
newdetailanggaran.volumematerial,
newdetailanggaran.hrgsatuanjasa,
newdetailanggaran.hrgsatuanmaterial,
newdetailanggaran.alasan,
newdetailanggaran.status,
newdetailanggaran.tglapprove,
newdetailanggaran.randomid,
headeranggaran.*,
disburst.kodedisburst,
disburst.jan,
disburst.feb,
disburst.mar,
disburst.apr,
disburst.mei,
disburst.jun,
disburst.jul,
disburst.agu,
disburst.sep,
disburst.okt,
disburst.nov,
disburst.des,
disburst.randomid
FROM newdetailanggaran
INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid 
INNER JOIN satuan ON headeranggaran.kodesatuan = satuan.kodesatuan
INNER JOIN disburst ON newdetailanggaran.randomid = disburst.randomid
WHERE headeranggaran.kodebidang = '$_SESSION[kodebidang]' AND newdetailanggaran.status = '3' 
AND newdetailanggaran.approvemapp='1' AND newdetailanggaran.approveassman='1' 
AND year(headeranggaran.tartglmulai) = $data_kontrol[tahun]
");
?>

<div id="wrapper">
        <!-- /. NAV SIDE  -->
       <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Penetapan Usulan Anggaran</h2>
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
                             Tabel Penetapan Usulan Anggaran
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <br />
                                <table class="table table-striped table-bordered table-hover" id="datatabel1">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="2%">No</th>
                                            <th class="text-center" width="8%">Uraian Kegiatan</th>
                                            <th class="text-center" width="4%">No. Usulan</th>
                                            <th class="text-center" width="4%">Jenis Anggaran</th>
                                        <!--
                                            <th class="text-center" width="2%">Vol. Jasa</th>
                                            <th class="text-center" width="2%">Vol. Material</th>
                                            <th class="text-center" width="5%">Hrg Satuan Jasa </th>
                                            <th class="text-center" width="5%">Hrg Satuan Meterial </th>
                                        -->
                                            <th class="text-center" width="3%">Unit APP</th> 
                                        <!--
                                            <th class="text-center" width="3%">Status</th> 
                                        -->
                                            <th class="text-center" width="4%">Jml. Biaya Jasa</th> 
                                            <th class="text-center" width="4%">Jml. Biaya Material</th>
                    						<th class="text-center" width="3%">Aksi</th>
                               			</tr>
                                    </thead>
                                    <tbody>
                                    <?php
                            				$no=1;
                                            while($row=mysql_fetch_array($sql))
                            				{
                                            $sqlB = mysql_query("SELECT newdetailanggaran.*, headeranggaran.* 
                                            FROM newdetailanggaran 
                                            INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid 
                                            WHERE newdetailanggaran.randomid = '$row[randomid]' ORDER BY newdetailanggaran.status DESC")or die (mysql_error());
                                            
                                            $rowB=mysql_fetch_array($sqlB)
                            				?>
                            					<tr>
                                                    <td class="text-center"><?php echo $no; ?></td>
                                                    <td><?php echo $row['uraiankegiatan'];?></td>
                                                    <td><?php echo $row['nousulan'];?></td>
                                                    <td class="text-center"><?php echo $row['jenis'];?></td>
                                                <!--
                                                    <td class="text-center">
                                                        U: <?php echo $row['volumejasa']; ?>
                                                        <br />
                                                        P: <?php 
                                                        $penetapan = mysql_fetch_array(mysql_query("SELECT * FROM newdetailanggaran
                                                        WHERE status = '4' AND randomid = '".$row['randomid']."'"));
                                                        echo $penetapan['volumejasa']; ?>
                                                    </td>
                                                    <td class="text-center">
                                                        U: <?php echo $row['volumematerial']; ?>
                                                        <br />
                                                        P: <?php 
                                                        $penetapan = mysql_fetch_array(mysql_query("SELECT * FROM newdetailanggaran
                                                        WHERE status = '4' AND randomid = '".$row['randomid']."'"));
                                                        echo $penetapan['volumematerial']; ?>
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
                                                        U: <?php echo "Rp ".number_format($row['hrgsatuanmaterial']); ?>
                                                        <br />
                                                        P: <?php 
                                                        $penetapan = mysql_fetch_array(mysql_query("SELECT * FROM newdetailanggaran
                                                        WHERE status = '4' AND randomid = '".$row['randomid']."'"));
                                                        echo "Rp ".number_format( $penetapan['hrgsatuanmaterial']); ?>
                                                    </td>
                                                -->
                                                    <td>
                                                        <?php 
                                                            if ($row['kodebidang'] == '1') {echo "APP Bogor";}
                                                            else if ($row['kodebidang'] == '2') {echo "APP Bandung";}
                                                            else if ($row['kodebidang'] == '3') {echo "APP Karawang";}
                                                            else if ($row['kodebidang'] == '4') {echo "APP Cirebon";}
                                                            else if ($row['kodebidang'] == '5') {echo "APP Purwokerto";}
                                                            else if ($row['kodebidang'] == '6') {echo "APP Salatiga";}
                                                            else if ($row['kodebidang'] == '7') {echo "APP Semarang";}
                                                            else if ($row['kodebidang'] == '99') {echo "Kantor Induk";}
                                                        ?>
                                                    </td>
                                                    <!--
                                                    <td class="text-center">
                                                    <?php if ($rowB['status'] == '1') {echo "Approve";}
                                                    if ($rowB['status'] == '2') {echo "Reject";}
                                                    if ($rowB['status'] == '3') {echo "Terevaluasi";}
                                                    else if ($rowB['status'] == '4') {echo "Penetapan";}
                                                    ?>
                                                  </td> 
                                                  -->
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
                                                    <td class="text-center">
                                                    
                                                        <?php if ($row['status'] == '3') {?>
                                                            <a title="detail" href="#" class="detail" data-id="<?php echo $row["kodedetail"]; ?>" role="button" data-toggle="modal">
                                                            <i class="glyphicon glyphicon-zoom-in fa-2x"></i></a>   
                                                        <?php } else if ($rowB['status'] == '4') {?>
                                                            <a title="detail" href="#" class="detailtetapan" data-id="<?php echo $row["kodedetail"]; ?>" role="button" data-toggle="modal">
                                                            <i class="glyphicon glyphicon-zoom-in fa-2x"></i></a>
                                                        <?php } else{echo "";}?>
                                                        
                                                        <?php 
                                                                if ($row['status'] == '3' AND $rowB['status'] == '3') { ?>
                                                                <a title="penetapan" href="index.php?penetapan-ai=<?php echo $row["kodedetail"]?>"
                                                                type="button"><i class="fa fa-sticky-note fa-2x"></i></a>
                                                        <?php } ?>
                                                        <?php if ($rowB['status'] == '4') { ?>
                                                        <a title="update" href="index.php?update-penetapan=<?php echo $row["randomid"]?>" type="button"><i class="fa fa-pencil-square-o fa-2x"></i></a>
                                                        <?php } ?>
                                                        <!--
                                                        <?php $delete = mysql_query("SELECT * FROM newdetailanggaran WHERE status = '4' AND randomid = '".$row['randomid']."'");
                                                        $rowC = mysql_fetch_array($delete);?>
                                                         <a title="delete" href="#" id="delblm-penetapan-ai=<?php echo $rowC["kodedetail"]?>" class="delete">
                                                            <i class="fa fa-trash-o fa-2x"></i>
                                                         </a>
                                                         -->
                                                    </td>
                            					</tr>
                            				<?php $no++; } ?>
                                    </tbody>
                                    
                                </table>
                                    <strong>U : Usulan</strong><br />
                                    <strong>P : Penetapan</strong><br />
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
      $('#datatabel1').dataTable( {
        "paging":   true,
        "ordering": false,
        "bInfo": false,
        "dom": '<"pull-left"f><"pull-right"l>tip'
      } );
    } );

    </script>
