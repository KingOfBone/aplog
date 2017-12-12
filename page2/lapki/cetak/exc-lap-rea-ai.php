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
    header("Content-disposition: attachment; filename=laporan_realisasi_AI.xls");
    
    //$key     = $_GET['keycetak1'] ? $_GET['keycetak1'] : $_GET['keycetak1'];
    //$key2     = $_GET['keycetak2'] ? $_GET['keycetak2'] : $_GET['keycetak2'];

    //if (! $key=="" && !$key2==""){ $q = " headeranggaran.tartglmulai >= '$key' and date_sub(headeranggaran.tartglmulai, INTERVAL 1 day) <= '$key2'";  }

    $data_kontrol = mysql_fetch_array(mysql_query("select * from kontrol"));
    $status_anggaran =  $data_kontrol["status"];
    
    $sql=mysql_query("SELECT
        ((volumejasa*hrgsatuanjasa)+(volumematerial*hrgsatuanmaterial)) 'rab',
        headeranggaran.*,
        newdetailanggaran.*,
        realisasi.*
        FROM
        newdetailanggaran
        INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid 
        INNER JOIN realisasi ON newdetailanggaran.randomid = realisasi.randomid  
        WHERE headeranggaran.jenis = 'AI' AND newdetailanggaran.status = '9'
        AND year(headeranggaran.tartglmulai) = $data_kontrol[tahun]
    ") or die (mysql_error());
?>

<h2>Laporan Realisasi AI</h2>
<br /><br />
<h3>History Realisasi AI</h3>
<table border="1" >
    <thead>
        <tr>
            <th class="text-center" width="2%">No</th>
            <th class="text-center" width="10%">Nama Kegiatan</th>
            <th class="text-center" width="5%">Nilai Anggaran</th>
            <!--
            <th class="text-center" width="4%">Vol. Jasa (RAB)</th>
            <th class="text-center" width="4%">Vol. Material (RAB)</th>
            <th class="text-center" width="8%">Hrg. Satuan Jasa (RAB)</th>
            <th class="text-center" width="8%">Hrg. Satuan Material (RAB)</th>
            -->
            <th class="text-center" width="4%">No. PO </th>
            <th class="text-center" width="4%">Nilai Kontrak </th>
            <th class="text-center" width="8%">Nama Vendor </th>
            <th class="text-center" width="5%">Tanggal Kontrak </th>
            <th class="text-center" width="6%">Unit APP </th>
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
            <td><?php  echo "Rp ".number_format("$row[rab]"); ?></td>
            <!--
            <td class="text-center"><?php echo $row['volumejasa'];?></td>
            <td class="text-center"><?php echo $row['volumematerial'];?></td>
            <td><?php echo "Rp ".number_format ($row['hrgsatuanjasa']);?></td>
            <td><?php echo "Rp ".number_format ($row['hrgsatuanmaterial']);?></td>
            -->
            <td><?php echo $row['nopo'];?></td>
            <td><?php echo "Rp ".number_format ($row['nilaikontrak']);?></td>
            <td><?php echo $row['namavendor'];?></td>
            <td><?php echo tglindonesia($row['tglkontrak']);?></td>
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
        </tr>
        <?php $no++; } } else { ?>
        <tr><td colspan="9" class="text-center"><i>Tabel realisasi AI kosong</i></td></tr>
        <?php } ?>
    </tbody>
</table>
<?php ob_end_flush(); ?>