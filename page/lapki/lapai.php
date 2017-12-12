<?php
    if(isset($_POST["cari"])){
        $key     = (tglformataction($_POST['tglAwal'])) ? tglformataction($_POST['tglAwal']) : tglformataction($_GET['tglAwal']);
        $key2     = (tglformataction($_POST['tglAkhir'])) ? tglformataction($_POST['tglAkhir']) : tglformataction($_GET['tglAkhir']);

        if (! $key=="" && !$key2==""){ $q = " headeranggaran.tartglmulai >= '$key' and date_sub(headeranggaran.tartglmulai, INTERVAL 1 day) <= '$key2'";  }

        $data_kontrol = mysql_fetch_array(mysql_query("select * from kontrol"));
        $status_anggaran =  $data_kontrol["tahun"];

        $sql=mysql_query("SELECT
        headeranggaran.*,
        newdetailanggaran.*,
        newdetailanggaran.randomid
        FROM newdetailanggaran 
        INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid
        WHERE headeranggaran.jenis = 'AI' AND newdetailanggaran.status = '3'
        AND year(headeranggaran.tartglmulai) = $data_kontrol[tahun] AND headeranggaran.tartglmulai between '$key' AND '$key2'
        ") or die (mysql_error());
    }
?>

<!-- autocomplete-->
<link rel="stylesheet" href="assets/pickday/css/pikaday.css" />
<link rel="stylesheet" href="assets/Actextbox/jquery-ui.css">
<script src="assets/Actextbox/jquery-ui.js"></script>
<script>
    $(function() {
        $( "#skills" ).autocomplete({
            source: 'assets/Actextbox/search.php'
        });
    });
</script>

<div id="wrapper">
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Laporan Usulan AI</h2>
                    <hr />
                </div>
            </div>
            <form method="POST" action="" id="validate-cari">
                <div class="row">
                    <div class="col-md-2"><p style="padding: 0;" class="">Periode </p></div>
                    <div class="col-md-2">
                        <input  type="text" onKeyPress="return isNumberKeyTgl(event)" value="<?php  echo $_POST["tglAwal"];?>" class="form-control" id="datepicker" name="tglAwal" data-rule-required="true" data-rule-date="true" data-msg-date="format yang benar dd/mm/yyyy" data-msg-required="mohon masukkan data Tanggal." placeholder="masukkan Tanggal" />
                    </div>
                    <div class="col-md-2"><p style="padding: 0;" class="">S / D </p></div>
                    <div class="col-md-2">
                        <input  type="text" onKeyPress="return isNumberKeyTgl(event)" value="<?php  echo $_POST["tglAkhir"];?>" class="form-control" id="datepicker2" name="tglAkhir" data-rule-required="true" data-rule-date="true" data-msg-date="format yang benar dd/mm/yyyy" data-msg-required="mohon masukkan data Tanggal." placeholder="masukkan Tanggal" />
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary" type="submit" name="cari">Cari</button>
                    </div>
                    <div class="col-md-2">
                        <?php if(isset($_POST["cari"])){ ?>
                            <a href="page/lapki/cetak/exc-lap-ai.php?act=excel&tglawal=<?php echo $_POST["tglAwal"]; ?>&tglakhir=<?php echo $_POST["tglAkhir"]; ?>"><img src="images/excel.png" /></a> &nbsp;
                            <a href="page/lapki/cetak/act-ai.php?act=print&tglawal=<?php echo $_POST["tglAwal"]; ?>&tglakhir=<?php echo $_POST["tglAkhir"]; ?>" target="_blank"><img src="images/print.png" title="cetak dokumen" /></a>
                        <?php } ?>
                    </div>
                    <!-- <div class="col-md-1">
                        <?php if(isset($_POST["cari"])){ ?>
                            <a target="_blank" href="page/lap/cetak/cetak-lap-ai.php?keycetak1=<?php echo $key; ?>&keycetak2=<?php echo $key2; ?>"><img class="img-responsive" src="images/excel.png" /></a>
                        <?php } ?>
                    </div> -->
                </div>
            </form>
            <br /><br />

            <?php if(isset($_POST["cari"])) { ?>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">Tabel data usulan AI</div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="datatabel">
                                        <thead>
                                            <tr>
                                                <th class="text-center" width="2%">No</th>
                                                <th class="text-center" width="10%">Nama Kegiatan</th>
                                                <th class="text-center" width="4%">No. Usulan</th>
                                                <th class="text-center" width="9%">Perkiraan Tanggal Mulai</th>
                                                <th class="text-center" width="8%">No. Purchase Request (PR)</th>
                                                <th class="text-center" width="4%">Jasa</th>
                                                <th class="text-center" width="4%">Material</th>
                                                <th class="text-center" width="8%">Hrg. Satuan Jasa</th>
                                                <th class="text-center" width="8%">Hrg. Satuan Material</th>
                                                <th class="text-center" width="8%">Jml. Biaya Jasa</th> 
                                                <th class="text-center" width="8%">Jml. Biaya Material</th>
                                                <th class="text-center" width="6%">Unit APP</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                if(mysql_num_rows($sql)>0){
                                                    $no=1;
                                                    while($row=mysql_fetch_array($sql)){
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
                                                            <td>
                                                                <?php 
                                                                    if ($row['kodeapp'] == '1') {echo "APP Bogor";}
                                                                    else if ($row['kodeapp'] == '2') {echo "APP Bandung";}
                                                                    else if ($row['kodeapp'] == '3') {echo "APP Karawang";}
                                                                    else if ($row['kodeapp'] == '4') {echo "APP Cirebon";}
                                                                    else if ($row['kodeapp'] == '5') {echo "APP Purwokerto";}
                                                                    else if ($row['kodeapp'] == '6') {echo "APP Salatiga";}
                                                                    else if ($row['kodeapp'] == '7') {echo "APP Semarang";}
                                                                    else if ($row['kodeapp'] == '99') {echo "Kantor Induk";}
                                                                ?>
                                                            </td>
                                                        </tr>
                                                    <?php $no++; } } else { ?>
                                                    <?php } ?>
                                        </tbody>
                                    </table>
                                    <strong> U : Usulan</strong><br />
                                    <strong> P : Penetapan</strong><br />
                                    <strong> R : RAB</strong><br />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<script src="assets/pickday/moment.js"></script>
<script src="assets/pickday/pikaday.js"></script>
<script>
    var picker = new Pikaday({
        field: document.getElementById('datepicker'),
        firstDay: 1,
        minDate: new Date(1960, 0, 1),
        maxDate: new Date(2020, 12, 31),
        yearRange: [1960, 2020],
        format: 'DD/MM/YYYY'
    });
</script>
<script>
    var picker = new Pikaday({
        field: document.getElementById('datepicker2'),
        firstDay: 1,
        minDate: new Date(1960, 0, 1),
        maxDate: new Date(2020, 12, 31),
        yearRange: [1960, 2020],
        format: 'DD/MM/YYYY'
    });
</script>

<script type="text/javascript" src="assets/validasi/jquery.validate.min.js"></script>
<script type="text/javascript">
    $('#validate-cari').validate({
        rules: {
            field: {
                required: true,
            date: true
            }
        }
    });
    jQuery.validator.methods["date"] = function (value, element) { return true; }
</script>

<script src="assets/confirmdell/js/script.js"></script>
<script src="assets/datatables/jquery.dataTables.js"></script>
<script src="assets/datatables/dataTables.bootstrap.js"></script>
<script>
    $(document).ready( function () {
        $('#datatabel').dataTable( {
            "paging":   true,
            "ordering": false,
            "bInfo": false,
            "dom": '<"pull-left"f><"pull-right"l>tip'
        });
    });
</script>
