<?php
$sql = mysql_query("SELECT
user_login.*
FROM
user_login ORDER BY user_login.kodelogin ASC ") or die (mysql_error());
?>

<link rel="stylesheet" type="text/css" href="assets/paging/stylepaging.css" />
    <div id="wrapper">
        <!-- /. NAV SIDE  -->
       <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Data User</h2>
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
                                     <div class="alert alert-success" id="alertupload">Data berhasil Ditambah,
                                     <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                                     </div>
                                    <?php }else if(isset($_GET["suksesgantipass"])){?>
                                    <div class="alert alert-success" id="alertupload">Password berhasil Diubah,
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                                    </div>
                                   <?php } ?>
                </div>
                <div class="col-md-2">
                    <a href="index.php?tambah-listuser" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-plus"></i>Tambah Data</a>
                    <br /><br />
                </div>
           </div>

           <div class="row">
                <div class="col-md-12">


                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Tabel Data User
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">

                                <br />
                                <table class="table table-striped table-bordered table-hover" id="datatabel">
                                    <thead>

                                        <tr>
                                            <th width="2%">No</th>
                                            <th width="13%" >Nama</th>
                  						    <th width="17%" >Email</th>
                                            <th width="15%" >Username</th>
                                            <th width="15%" >Level</th>
                                            <th width="15%" >Jabatan</th>
                                            <th width="10%" >Aksi</th>
                       					</tr>

                                    </thead>
                                    <tbody>
                                    <?php
                                    if(mysql_num_rows($sql) > 0){
                                    $no=1;
                                    while($row=mysql_fetch_array($sql))
                    				{
                    				    ?>
                            					<tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $row['nama'];?></td>
                                                    <td><?php echo $row['email'];?></td>
                                                    <td><?php echo $row['username'];?></td>
                            						<td><?php if($row['level']=="sa"){ echo "Admin"; };?>
                                                        <?php if($row['level']=="us"){ echo "User"; };?>
                                                        <?php if($row['level']=="ma"){ echo "Manager"; };?>
                                                        <?php if($row['level']=="ass"){ echo "Assman"; };?>
                                                        <?php if($row['level']=="ki"){ echo "kantor induk"; };?>
                                                    </td>
                                                    <td><?php echo $row['jabatan'];?></td>
                            						<td class="text-center">
                                                        <a href="index.php?update-listuser=<?php echo $row["kodelogin"]?>"  type="button"><i class="fa fa-pencil-square-o fa-2x"></i></a>
                                                        <a href="index.php?change-passuser=<?php echo $row["kodelogin"]?>"  type="button"><i class="fa fa-lock fa-2x"></i></a>
                                                        <a href="#" id="delete-listuser=<?php echo $row["kodelogin"]?>" class="delete"><i class="fa fa-trash-o fa-2x"></i></a>

                                                    </td>
                            					</tr>
                            				<?php $no++; } } else { ?>
                                                <tr><td colspan="9" class="text-center"><i>Tabel data users kosong</i></td></tr>
                                            <?php } ?>

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
