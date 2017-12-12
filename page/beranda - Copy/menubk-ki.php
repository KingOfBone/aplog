<?php function menuBKKI(){ ?>
<?php 
$data_kontrol = mysql_fetch_array(mysql_query("select * from kontrol"));
$status_anggaran =  $data_kontrol["status"];
?>
<ul>
        <li><a class="text-right closeclick" href="#">close &times;</a></li>
        <li>
            <div class="imgprofile text-center">
                <?php
                    $sqluserImg = mysql_query("SELECT * FROM master.login WHERE nama ='$_SESSION[level]'") or die (mysql_error());
                    $rowImg = mysql_fetch_array($sqluserImg);
                ?>

                <img src="<?php echo $rowImg["images"] == "" ? "images/no-images.png" : "images/".$rowImg["images"] ?>" class="img-circle img-responsive center-block"  />
                <br /><strong><?php echo $_SESSION["nama"];?></strong>
                <a href="#" class="logoutK"><i class="fa fa-power-off"></i> Log out</a>
            </div>
        </li>
        <li>
            <a href="index.php?dashboard"><i class="fa fa-dashboard fa-2x"></i> Beranda</a>
        </li>
        
        <li>
            <a href="#"><i class="fa fa-folder fa-2x"></i> Usulan Anggaran<span class=""></span></a>
                <ul>
                    <li><a href="#" class="back">Main Menu</a></li>
                        <li class="nav-label">Usulan Anggaran</li>
                        <li>
                            <a href="index.php?ai"><i class="fa fa-folder fa-2x"></i> Rutin</a>
                        </li>
                        <li>
                            <a href="index.php?ao"><i class="fa fa-folder fa-2x"></i> Non Rutin</a>
                        </li>
                </ul>
        </li>
        <li>
            <a href="#"><i class="fa fa-book fa-2x"></i> RAB<span class=""></span></a>
                <ul>
                    <li><a href="#" class="back">Main Menu</a></li>
                        <li class="nav-label">RAB</li>
                        <li>
                            <a href="index.php?rab-ai"><i class="fa fa-book fa-2x"></i> AI</a>
                        </li>
                        <li>
                            <a href="index.php?rab-ao"><i class="fa fa-book fa-2x"></i> AO</a>
                        </li>
                </ul>
        </li>
        <li>
            <a href="#"><i class="fa fa-map-o fa-2x"></i> Realisasi Anggaran</a>
            <ul>
                    <li><a href="#" class="back">Main Menu</a></li>
                    <li class="nav-label">Realisasi</li>
                    <li>
                        <a href="index.php?realisasi"><i class="fa fa-map-o fa-2x"></i> AI</a>
                    </li>
                    <li>
                        <a href="index.php?realisasi-ao"><i class="fa fa-map-o fa-2x"></i> AO</a>
                    </li>
            </ul>
        </li>
        <li>
            <a href="#"><i class="fa fa-tags fa-2x"></i> Penyerapan Anggaran</a>
            <ul>
                    <li><a href="#" class="back">Main Menu</a></li>
                    <li class="nav-label">Penyerapan</li>
                    <li>
                        <a href="index.php?penyerapan"><i class="fa fa-map-o fa-2x"></i> AI</a>
                    </li>
                    <li>
                        <a href="index.php?penyerapan-ao"><i class="fa fa-map-o fa-2x"></i> AO</a>
                    </li>
            </ul>
        </li>
        <li>
            <a href="index.php?petunjuk"><i class="fa fa-question fa-2x"></i>   Petunjuk Penggunaan</a>
        </li>
        <li>
            <a href="#"><i class="fa fa-file-text fa-2x" aria-hidden="true"></i> Laporan<span class=""></span></a>
                <ul >
                    <li><a href="#" class="back">Main Menu</a></li>
                        <li class="nav-label"> Laporan Anggaran</li>
                        <li>
                            <li>
                            <a href="index.php?lap-ai"><i class="fa fa-file-text fa-2x"></i>  Usulan Rutin</a>
                            </li>
                            <li>
                            <a href="index.php?lap-ao"><i class="fa fa-file-text fa-2x"></i>  Usulan Non Rutin</a>
                            </li>
                        </li>
                        <li class="nav-label"> Laporan Realisasi</li>
                        <li>
                            <li>
                                <a href="index.php?lap-realisasi-ai"><i class="fa fa-file-text fa-2x"></i>  AI</a>
                            </li>
                            <li>
                                <a href="index.php?lap-realisasi-ao"><i class="fa fa-file-text fa-2x"></i>  AO</a>
                            </li>
                        </li>
                        <li class="nav-label"> Laporan Penyerapan</li>
                        <li>
                            <li>
                                <a href="index.php?lap-serapan-ai"><i class="fa fa-file-text fa-2x"></i>  AI</a>
                            </li>
                            <li>
                                <a href="index.php?lap-serapan-ao"><i class="fa fa-file-text fa-2x"></i>  AO</a>
                            </li>
                         </li>
                </ul>
        </li>
        <!--
        <li>
            <a href="#"><i class="fa fa-database fa-2x" aria-hidden="true"></i> Data Master<span class=""></span></a>
                <ul >
                    <li><a href="#" class="back">Main Menu</a></li>
                    <li class="nav-label">Data Master</li>
                    <li>
                        <a href="index.php?fungsi"><i class="fa fa-database fa-2x"></i> Fungsi</a>
                    </li>
                    <li>
                        <a href="index.php?pos-anggaran"><i class="fa fa-database fa-2x"></i> Pos Anggaran</a>
                    </li>
                    <li>
                        <a href="index.php?satuan"><i class="fa fa-database fa-2x"></i> Satuan</a>
                    </li>
                </ul>
        </li>
    <li>
            <a href="#"><i class="fa fa-users fa-2x" aria-hidden="true"></i> Daftar Users<span class=""></span></a>
                <ul >
                    <li><a href="#" class="back">Main Menu</a></li>
                    <li class="nav-label">Daftar Users</li>
                    <li>
                        <a href="index.php?listuser"><i class="fa fa-users fa-2x"></i> Users</a>
                    </li>
                </ul>
        </li>
         -->
    </ul>
    <br><br><br>
        <li>
            <a  href="../portal/index.php?dashboard"><i class="fa fa-home fa-2x"></i> Kembali ke PORTAL</a>
        </li>
<?php } ?>
