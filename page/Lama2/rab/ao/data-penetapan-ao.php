<?php
$data_kontrol = mysql_fetch_array(mysql_query("select * from kontrol"));
$status_anggaran =  $data_kontrol["status"];

$sql = mysql_query("SELECT
    headeranggaran.*,
    newdetailanggaran.*,
    newdetailanggaran.randomid
    FROM newdetailanggaran 
    INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid
    WHERE headeranggaran.kodeapp = '$_SESSION[kodeapp]' 
    AND headeranggaran.jenis = 'AO' AND newdetailanggaran.status ='4'
    AND year(headeranggaran.tartglmulai) = $data_kontrol[tahun]
    ") or die (mysql_error());
?>
<div id="wrapper">
        <!-- /. NAV SIDE  -->
       <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Input RAB AO</h2>
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
                             Tabel RAB AO
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="datatabel1">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="1%">No</th>
                                            <th class="text-center" width="6%">Uraian Kegiatan</th>
                                            <th class="text-center" width="4%">Perkiraan Tanggal Mulai</th>
                                            <th class="text-center" width="1%">No. Usulan</th>
                                            <th class="text-center" width="2%">No. WBS</th>
                                            <!--
                                            <th class="text-center" width="2%">Vol. Jasa </th>
                                            <th class="text-center" width="2%">Vol. Material </th>
                                            <th class="text-center" width="3%">Hrg. Satuan Jasa </th>
                                            <th class="text-center" width="3%">Hrg. Satuan Meterial </th>
                                            -->
                                            <th class="text-center" width="2%">No. Purchase Request</th>
                                            <th class="text-center" width="3%">Jml. Biaya Jasa</th> 
                                            <th class="text-center" width="3%">Jml. Biaya Material</th>
                                            
                                            <th class="text-center" width="3%">Status</th> 
                                            
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
                                                    <td class="text-center"><?php echo tglindonesia($row['tartglmulai']);?></td>
                                                    <td class="text-center"><?php echo $row['nousulan'];?></td>
                                                    <td class="text-center"><?php echo $row['nmrwbs'];?></td>
                                                    <!--
                                                    <td class="text-center">
                                                        U : <?php
                                                        $usulan = mysql_fetch_array(mysql_query("SELECT * FROM newdetailanggaran
                                                        WHERE status = '3' AND randomid = '".$row['randomid']."'"));
                                                        echo $usulan['volumejasa']; ?>
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
                                                    <td class="text-center">
                                                        U : <?php
                                                        $usulan = mysql_fetch_array(mysql_query("SELECT * FROM newdetailanggaran
                                                        WHERE status = '3' AND randomid = '".$row['randomid']."'"));
                                                        echo $usulan['volumematerial']; ?>
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
                                                        U : <?php
                                                        $usulan = mysql_fetch_array(mysql_query("SELECT * FROM newdetailanggaran
                                                        WHERE status = '3' AND randomid = '".$row['randomid']."'"));
                                                        echo "Rp ".number_format( $usulan['hrgsatuanjasa']); ?>
                                                        <br />
                                                        P : <?php 
                                                        $penetapan = mysql_fetch_array(mysql_query("SELECT * FROM newdetailanggaran
                                                        WHERE status = '4' AND randomid = '".$row['randomid']."'"));
                                                        echo "Rp ".number_format( $penetapan['hrgsatuanjasa']); ?>
                                                        <br />
                                                        R : <?php 
                                                        $rab = mysql_fetch_array(mysql_query("SELECT * FROM newdetailanggaran
                                                        WHERE status IN ('5','6','7','8') AND randomid = '".$row['randomid']."'"));
                                                        echo "Rp ".number_format( $rab['hrgsatuanjasa']); ?>
                                                    </td>
                                                    <td>
                                                        U : <?php
                                                        $usulan = mysql_fetch_array(mysql_query("SELECT * FROM newdetailanggaran
                                                        WHERE status = '3' AND randomid = '".$row['randomid']."'"));
                                                        echo "Rp ".number_format( $usulan['hrgsatuanmaterial']); ?>
                                                        <br />
                                                        P : <?php 
                                                        $penetapan = mysql_fetch_array(mysql_query("SELECT * FROM newdetailanggaran
                                                        WHERE status = '4' AND randomid = '".$row['randomid']."'"));
                                                        echo "Rp ".number_format( $penetapan['hrgsatuanmaterial']); ?>
                                                        <br />
                                                        R : <?php 
                                                        $rab = mysql_fetch_array(mysql_query("SELECT * FROM newdetailanggaran
                                                        WHERE status IN ('5','6','7','8') AND randomid = '".$row['randomid']."'"));
                                                        echo "Rp ".number_format( $rab['hrgsatuanmaterial']); ?>
                                                    </td>
                                                    -->
                                                    <td class="text-center"><?php echo $row['nopr'];?></td>
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
                                                    <?php 
                                                    $sqlstatus = mysql_fetch_array(mysql_query ("SELECT
                                                            headeranggaran.*,
                                                            newdetailanggaran.*,
                                                            newdetailanggaran.randomid
                                                            FROM newdetailanggaran 
                                                            INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid
                                                            WHERE headeranggaran.kodeapp = '$_SESSION[kodeapp]' AND newdetailanggaran.status IN('4','5','6','7')
                                                            AND newdetailanggaran.randomid = '".$row['randomid']."' AND headeranggaran.jenis = 'AO'
                                                            ORDER BY newdetailanggaran.status DESC")); 
                                                            {
                                                    ?>
                                                    <td class="text-center">
                                                        <?php 
                                                            if ($sqlstatus['status'] == '4') {echo "Penetapan";}
                                                            else if ($sqlstatus['status'] == '5') {echo "RAB";}
                                                            else if ($sqlstatus['status'] == '7') {echo "Approve(RAB)";}
                                                            else if ($sqlstatus['status'] == '6') {echo "Reject (RAB)";}
                                                        ?>
                                                    </td>
                                                    <?php } ?>
                                                    <td class="text-center">
                                                         <a title="detail" href="#" class="detail" data-id="<?php echo $row["randomid"]; ?>" role="button" data-toggle="modal">
                                                            <i class="glyphicon glyphicon-zoom-in fa-2x"></i>
                                                         </a>
                                                         <?php if ($status_anggaran == "pagu indikasi") {
                                                                if ($f == "") { ?>
                                                         
                                                         <a title="tambah" href="index.php?tambah-rab-ao=<?php echo $row["randomid"]?>" type="button"><i class="fa fa-plus fa-2x"></i></a>
                                                        <?php } ?>
                                                        <?php
                                                            $sql3 = mysql_fetch_array(mysql_query ("SELECT
                                                            headeranggaran.*,
                                                            newdetailanggaran.*,
                                                            newdetailanggaran.randomid
                                                            FROM newdetailanggaran 
                                                            INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid
                                                            WHERE headeranggaran.kodeapp = '$_SESSION[kodeapp]' AND newdetailanggaran.status = '5'
                                                            AND newdetailanggaran.randomid = '".$row['randomid']."' AND headeranggaran.jenis = 'AO'")); {
                                                        ?>
                                                         <a title="update" href="index.php?update-rab-ao=<?php echo $sql3["randomid"]?>&status=5" type="button"><i class="fa fa-pencil-square-o fa-2x"></i></a>
                                                         <?php }} ?>
                                                         <?php 
                                                         if ($status_anggaran == "revisi") {
                                                            $sql2 = mysql_query ("SELECT
                                                            headeranggaran.*,
                                                            newdetailanggaran.*,
                                                            newdetailanggaran.randomid
                                                            FROM newdetailanggaran 
                                                            INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid
                                                            WHERE headeranggaran.kodeapp = '$_SESSION[kodeapp]' AND newdetailanggaran.status = '9' 
                                                            AND newdetailanggaran.randomid = '".$row['randomid']."' AND headeranggaran.jenis = 'AO'");
                                                            if (mysql_num_rows($sql2) < 1) {
                                                         ?>
                                                         <a title="update" href="index.php?update-rab-ao=<?php echo $row["randomid"]?>&status=5" type="button"><i class="fa fa-pencil-square-o fa-2x"></i></a>
                                                         <?php }} ?>
                                                         <!--
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
    $.post('page/rab/ao/detail-rabao.php',
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
            <h4 class="modal-title text-center">Detail Usulan RAB AO</h4>
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