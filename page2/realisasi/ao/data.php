<?php
$data_kontrol = mysql_fetch_array(mysql_query("select * from kontrol"));
$status_anggaran =  $data_kontrol["status"];

$sql = mysql_query("SELECT
    ((volumejasa*hrgsatuanjasa)+(volumematerial*hrgsatuanmaterial)) 'rab',
    headeranggaran.*,
    newdetailanggaran.*,
    realisasi.*,
    newdetailanggaran.randomid
    FROM
    newdetailanggaran 
    LEFT JOIN realisasi ON newdetailanggaran.randomid = realisasi.randomid
    INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid
    WHERE headeranggaran.kodebidang = '$_SESSION[kodebidang]' AND 
    newdetailanggaran.status IN ('7','8') AND newdetailanggaran.approvemapp='1' 
    AND newdetailanggaran.approveassman='1' AND newdetailanggaran.tglapprove != ''
    AND headeranggaran.jenis = 'AO' AND year(headeranggaran.tartglmulai) = $data_kontrol[tahun]
");


?>

<div id="wrapper">
        <!-- /. NAV SIDE  -->
       <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Realisasi AO</h2>
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
                <!-- 
                <div class="col-md-2">
                    <a href="index.php?tambah-realisasi-ai" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-plus"></i>Input Realisasi</a>
                    <br /><br />
                </div>
                -->
           </div>
           <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Tabel Realisasi AO
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <br />
                                <table class="table table-striped table-bordered table-hover" id="datatabel1">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="2%">No</th>
                                            <th class="text-center" width="10%">Uraian Kegiatan</th>
                                            <th class="text-center" width="5%">No. Purchase Request</th>
                                            <th class="text-center" width="6%">Nilai Anggaran</th>
                                            <!--
                                            <th class="text-center" width="8%">Nomor Kontrak</th>
                                            -->
                                            <th class="text-center" width="4%">Nomor SPK</th>
                                            <th class="text-center" width="5%">Nomor PO</th>
                                            <th class="text-center" width="7%">Nilai Kontrak</th>
                                            <th class="text-center" width="6%">Vendor</th>
                                            <th class="text-center" width="5%">Tanggal Kontrak</th>
                                            <th class="text-center" width="1%">Aksi</th>
                               			</tr>
                                    </thead>
                                    <tbody>
                                    <?php

                            				$no=1;
                                            
                            				while($rowA=mysql_fetch_array($sql)) {
                                            //$row=mysql_fetch_array($sqlA) 
                            				    
                            				?>
                            					<tr>
                                                    <td class="text-center"><?php echo $no; ?></td>
                                                    <td><?php echo $rowA['uraiankegiatan'];?></td>
                                                    <td class="text-center"><?php echo $rowA['nopr'];?></td>
                                                    <td>
                                                        RAB : <?php  echo "Rp ".number_format("$rowA[rab]"); ?>
                                                    </td>
                                                    <!--
                                                    <td class="text-center"><?php echo $rowA['nokontrak'];?></td>
                                                    -->
                                                    <td class="text-center"><?php echo $rowA['nospk'];?></td>
                                                    <td class="text-center"><?php echo $rowA['nopo'];?></td>
                                                    <?php $sqlD = mysql_query ("SELECT * FROM realisasi where realisasi.randomid = '$rowA[randomid]'");?>
                                                    <td>
                                                        <?php 
                                                        $kontrak = mysql_fetch_array(mysql_query("SELECT * FROM realisasi
                                                        WHERE status = '9' AND randomid = '".$rowA['randomid']."'"));
                                                        echo "Rp ".number_format($kontrak['nilaikontrak']); ?>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                        $vendor = mysql_fetch_array(mysql_query("SELECT * FROM realisasi
                                                        WHERE status = '9' AND randomid = '".$rowA['randomid']."'"));
                                                        echo $vendor['namavendor']; ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php 
                                                        $tgl = mysql_fetch_array(mysql_query("SELECT * FROM realisasi
                                                        WHERE status = '9' AND randomid = '".$rowA['randomid']."'"));
                                                        echo $tgl['tglkontrak']; ?>
                                                    </td>
                                                    <!--
                                                    <td><?php echo $rowA['nilaikontrak'];?></td> 
                                                    <td><?php echo $rowA['namavendor'];?></td>
                                                    <td><?php echo tglindonesia($rowA['tglkontrak']);?></td>
                                                    -->
                                                    
                                                    <td class="text-center">
                                                         <?php 
                                                                $sqlA = mysql_query("SELECT * FROM realisasi WHERE randomid = '".$rowA['randomid']."' ORDER BY nilaikontrak");
                                                                $rowB = mysql_fetch_array($sqlA); 
                                                                if ($rowB['nilaikontrak'] == "") { 
                                                                
                                                         ?>
                                                         <a title="tambah" href="index.php?tambah-realisasi-ao=<?php echo $rowA["randomid"]?>" type="button"><i class="fa fa-plus fa-2x"></i></a>
                                                         <?php } ?>
                                                         <?php if ($rowB['nilaikontrak'] > "0") { ?>
                                                         <a title="update" href="index.php?update-realisasi-ao=<?php echo $rowA["randomid"]?>" type="button"><i class="fa fa-pencil-square-o fa-2x"></i></a>
                                                         <?php } ?>
                                                         <!--
                                                             <?php $delete1 = mysql_query("SELECT * FROM realisasi WHERE status = '9' AND randomid = '".$rowA['randomid']."'");
                                                             $rowC = mysql_fetch_array($delete1);?>
                                                             <?php $delete2 = mysql_query("SELECT * FROM newdetailanggaran WHERE status = '9' AND randomid = '".$rowA['randomid']."'");
                                                             $rowD = mysql_fetch_array($delete2);?>
                                                             <a title="delete" href="#" id="delete-realisasi-ai=<?php echo $rowC["koderealisasi"]?>&delete-ang=<?php echo $rowD["kodedetail"]?>" class="delete"><i class="fa fa-trash-o fa-2x"></i></a>
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