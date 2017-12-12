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
    header("Content-disposition: attachment; filename=laporan_penyerapan_AO.xls");
    
    //$key     = $_GET['keycetak1'] ? $_GET['keycetak1'] : $_GET['keycetak1'];
    //$key2     = $_GET['keycetak2'] ? $_GET['keycetak2'] : $_GET['keycetak2'];

    //if (! $key=="" && !$key2==""){ $q = " headeranggaran.tartglmulai >= '$key' and date_sub(headeranggaran.tartglmulai, INTERVAL 1 day) <= '$key2'";  }

    $data_kontrol = mysql_fetch_array(mysql_query("select * from kontrol"));
    $status_anggaran =  $data_kontrol["tahun"];
    
    $sql=mysql_query("SELECT
        headeranggaran.*,
        realisasi.*,
        pembayaran.*
        FROM
        newdetailanggaran
        INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid 
        INNER JOIN pembayaran ON newdetailanggaran.randomid = pembayaran.randomid 
        INNER JOIN realisasi ON newdetailanggaran.randomid = realisasi.randomid 
        WHERE headeranggaran.kodebidang = '$_SESSION[kodebidang]' AND newdetailanggaran.status = '9'
        AND headeranggaran.jenis = 'AO' AND year(headeranggaran.tartglmulai) = $data_kontrol[tahun]
    ") or die (mysql_error());
?>

<h2>Laporan Penyerapan AO</h2>
<br /><br />
<h3>History Penyerapan AO</h3>
<table border="1" >
    <thead>
        <tr>
            <th class="text-center" width="2%">No</th>
            <th class="text-center" width="10%">Nama Kegiatan</th>
            <th class="text-center" width="6%">Nilai Kontrak </th>
            <th class="text-center" width="6%">Nomor MIGO </th>
            <!--
            <th class="text-center" width="4%">Vol. Jasa (RAB)</th>
            <th class="text-center" width="4%">Vol. Material (RAB)</th>
            <th class="text-center" width="8%">Hrg. Satuan Jasa (RAB)</th>
            <th class="text-center" width="8%">Hrg. Satuan Material (RAB)</th>
            -->
            <th class="text-center" width="6%">Tanggal Pembayaran </th>
            <th class="text-center" width="6%">Tahap</th>
            <th class="text-center" width="6%">Jumlah Pembayaran</th>
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
            <td><?php echo $row['uraiankegiatan'];?></td>
            <td><?php echo "Rp ".number_format ($row['nilaikontrak']);?></td>
            <td><?php echo $row['nomigo'];?></td>
            <!--
            <td><?php echo $row['volumejasa'];?></td>
            <td><?php echo $row['volumematerial'];?></td>
            <td><?php echo "Rp ".number_format($row['hrgsatuanjasa']);?></td>
            <td><?php echo "Rp ".number_format($row['hrgsatuanmaterial']);?></td>
            -->
            <td><?php echo tglindonesia($row['tglpym']);?></td>
            <td><?php echo $row['tahap'];?></td>
            <td><?php echo "Rp ".number_format($row['jmlpym']);?></td>
        </tr>
        <?php $no++; } } else { ?>
        <tr><td colspan="9" class="text-center"><i>Tabel penyerapan AO kosong</i></td></tr>
        <?php } ?>
    </tbody>
</table>
<?php ob_end_flush(); ?>
