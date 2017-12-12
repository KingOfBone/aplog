<?php
$data_kontrol = mysql_fetch_array(mysql_query("select * from kontrol"));
$status_anggaran =  $data_kontrol["status"];
$sql = mysql_query("SELECT 
headeranggaran.tartglmulai,
wbs.*
FROM wbs
INNER JOIN headeranggaran on wbs.randomid = headeranggaran.randomid
where year(headeranggaran.tartglmulai) = $data_kontrol[tahun]") or die (mysql_error());
?>

<div id="wrapper">
        <!-- /. NAV SIDE  -->
       <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Input Data WBS</h2>
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
                    <a href="index.php?tambah-wbs" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-plus"></i>Tambah Data</a>
                    <br /><br />
                </div>
           </div>
           <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Tabel Data WBS
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="datatabel1">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="2%">No</th>
                                            <th class="text-center" width="6%">Nomor WBS</th>
                                            <!--
                                            <th class="text-center" width="8%">Nama WBS</th>
                                            -->
                                            <th class="text-center" width="7%">Tanggal Penambahan WBS</th>
                                            <th class="text-center" width="6%">Jenis WBS</th>
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
                                                    <td class="text-center"><?php echo $row['nmrwbs'];?></td>
                                                    <!--
                                                    <td><?php echo $row['namawbs'];?></td>
                                                    -->
                                                    <td class="text-center"><?php echo tglindonesia($row['tglwbs']);?></td>
                                                    <td class="text-center"><?php echo $row['jeniswbs'];?></td>
                                                    <td class="text-center">
                                                        <a title="delete" href="#" id="delete-wbs=<?php echo $row["kodewbs"]?>" class="delete"><i class="fa fa-trash-o fa-2x"></i></a>
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