<?php
    ob_start();
	session_start();
    
    include "../../../config/koneksi.php";
    include "../../../config/utility.php";

    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    header("Cache-control: private");
    header("Content-Type: application/vnd.ms-excel; name='excel'");
    header("Content-disposition: attachment; filename=laporan_usulan_AO.xls");
    
    //$key     = $_GET['keycetak1'] ? $_GET['keycetak1'] : $_GET['keycetak1'];
    //$key2     = $_GET['keycetak2'] ? $_GET['keycetak2'] : $_GET['keycetak2'];

    //if (! $key=="" && !$key2==""){ $q = " headeranggaran.tartglmulai >= '$key' and date_sub(headeranggaran.tartglmulai, INTERVAL 1 day) <= '$key2'";  }

    $data_kontrol = mysql_fetch_array(mysql_query("select * from kontrol"));
    $status_anggaran =  $data_kontrol["tahun"];
    
    $sql=mysql_query("SELECT
                                    headeranggaran.*,
                                    newdetailanggaran.*
                                    FROM
                                    newdetailanggaran
                                    INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid 
                                    WHERE headeranggaran.kodebidang = '$_SESSION[kodebidang]' AND status IN ('0','1','2','3') 
                                    AND headeranggaran.jenis = 'AO' AND year(headeranggaran.tartglmulai) = $data_kontrol[tahun]
    ") or die (mysql_error());
?>

<h2>Laporan Usulan AO</h2>
<br /><br />
<h3>History Usulan AO</h3>
<table border="1" >
    <thead>
        <tr>
            <th class="text-center" width="2%">No</th>
                            <th class="text-center" width="10%">Nama Kegiatan</th>
                            <th class="text-center" width="4%">No. Usulan</th>
                            <th class="text-center" width="9%">Perkiraan Tanggal Mulai</th>
                            <th class="text-center" width="8%">No. Purchase Request (PR)</th>
                            <th class="text-center" width="3%">Jasa</th>
                            <th class="text-center" width="3%">Material</th>
                            <th class="text-center" width="8%">Hrg. Satuan Jasa</th>
                            <th class="text-center" width="8%">Hrg. Satuan Material</th>
                            <th class="text-center" width="8%">Jml. Biaya Jasa</th> 
                            <th class="text-center" width="8%">Jml. Biaya Material</th>
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
            <td class="text-center"><?php echo $no; ?></td>
            <td><?php echo $row['uraiankegiatan'];?></td>
            <td><?php echo $row['nousulan'];?></td>
            <td><?php echo tglindonesia($row['tartglmulai']);?></td>
            <td><?php echo $row['nopr'];?></td>
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
        </tr>
        <?php $no++; } } else { ?>
        <tr><td colspan="9" class="text-center"><i>Tabel data AO kosong</i></td></tr>
        <?php } ?>
    </tbody>
</table>
<?php ob_end_flush(); ?>