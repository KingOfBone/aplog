<?php ob_start(); ?>
<?php

	session_start();

include "../../../config/koneksi.php";
include "../../../config/utility.php";

if ($_GET['act']=='excel') {

	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
	header("Cache-control: private");
	header("Content-Type: application/vnd.ms-excel; name='excel'");
	header("Content-disposition: attachment; filename=laporan_penyerapan_AO.xls");

}
else
{
echo '
<script>

	window.print();

</script>';
}

?>
<style type="text/css" media="print">
    @page 
    {
        size:  auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */
    }

    html
    {
        background-color: #FFFFFF; 
        margin: 0px;  /* this affects the margin on the html before sending to printer */
    }

    body
    {
      
        margin: 10mm 15mm 10mm 15mm; /* margin you want for the content */
    }
</style>
<style type="text/css">

.style4 {font-family: Arial !important; font-size:18px !important;}
.style9 {font-family: Arial !important; font-size:12px !important; background-color:#99bbff !important; font-weight:bold !important; text-align:center !important; vertical-align: middle !important; width:auto !important; }
.style1 {font-family: Arial !important; font-size:12px !important;}
.style2 {font-family: Arial !important; font-size:12px !important; text-align: center !important; background-color: #ffd9b3 !important;}

</style>
<title>Laporan Penyerapan AO</title>
<body>
    <table width="98%"  border="0">
        <tr>
            <td>
                <fieldset>
                     <center>
						<legend class="style4">
							<b>History Penyerapan AO
							<?php
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
                                    WHERE headeranggaran.kodeapp = '$_SESSION[kodeapp]' AND newdetailanggaran.status = '9'
                                    AND headeranggaran.jenis = 'AO' AND year(headeranggaran.tartglmulai) = $data_kontrol[tahun]
                                    ") or die (mysql_error()); 
                            ?> 
                                </legend></center>
                    <br>

                    <table width="100%" border="1" cellpadding="1" cellspacing="0"  bordercolordark="#000000"  bordercolorlight="#FFFFFF">
                        <tr class="style9">
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
                        <?php
                            if(mysql_num_rows($sql) > 0){
                                $no=1;
                                while($row=mysql_fetch_array($sql))
                            {
                        ?>
                                <tr class="style1">
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
                    </table>
                </fieldset>
                <br>
            </td>
        </tr>
    </table>
</body>
<?php ob_flush();  ?>
