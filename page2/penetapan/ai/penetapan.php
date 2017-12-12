<?php
    
    $a = "abcdefghijklmnopqrstuvwxyz";
	$b = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$c = "1234567890";
	$d = $a."".$b."".$c;
	$number = substr((str_shuffle($d)), 0, 10);
    
    if(isset($_POST["submit"]))
    {
        $i      = mysql_real_escape_string(strip_tags($_POST["volumejasa"]));
        $j      = mysql_real_escape_string(strip_tags($_POST["volumematerial"]));
        $k      = mysql_real_escape_string(strip_tags($_POST["hrgsatuanjasa"]));
        $l      = mysql_real_escape_string(strip_tags($_POST["hrgsatuanmaterial"]));
        $m      = mysql_real_escape_string(strip_tags($_POST["randomid"]));
        $n      = mysql_real_escape_string(strip_tags($_POST["jenis"]));
        
        
        mysql_query ("INSERT INTO newdetailanggaran (kodedetail, volumejasa, volumematerial, 
        hrgsatuanjasa, hrgsatuanmaterial, randomid, status) VALUES (null,'$i','$j','$k','$l','$m','4')");
        
        mysql_query ("UPDATE headeranggaran SET jenis='$n' where randomid='$m'");
        header("location:index.php?data-penetapan-ai&suksestambah");
        
        
}
$idA = (int)mysql_real_escape_string(trim($_GET["penetapan-ai"]));
$sqlA= mysql_query("SELECT 
newdetailanggaran.*, 
headeranggaran.*
FROM newdetailanggaran
INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid 
INNER JOIN satuan ON headeranggaran.kodesatuan = satuan.kodesatuan WHERE status = '3' 
AND kodedetail = '$idA'") or die (mysql_error());
if(mysql_num_rows($sqlA)==0);
$rowA = mysql_fetch_array($sqlA);
?>

<script type="text/javascript">
    function isNumberKeyTgl(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode
        return false;
        return true;
    }
    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 47 || charCode > 57))
        return false;
        return true;
    }
</script>

<script type="text/javascript" src="assets/js/bootstrap-filestyle.js"></script>

<link rel="stylesheet" href="assets/pickday/css/pikaday.css" />
<link rel="stylesheet" href="assets/css/style.css" />
<div id="wrapper">
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper" >
        <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Tambah Penetapan</h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <!--<?php if($_SESSION["sessionsim"] == 1){?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-warning">Data Gagal di tambah, saldo tidak cukup...
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                        </div>
                    </div>
                </div>
                <?php } ?> -->
                <!-- /. content  -->
                <hr />
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Form Tambah Penetapan
                    </div> 
                    <table class="table table-striped text-center" >
                    <form id="validate-me-plz" name="form1" enctype="multipart/form-data" role="form" action="" method="post">
                                <input type="hidden" name="kodedetail" value="<?php echo $idA; ?>" />
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-9"> <br />
                                                <div class="col-md-4"><label>No. Usulan</label></div>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="nousulan" type="text" disabled="" data-rule-required="true" value="<?php echo $rowA["nousulan"]; ?>" data-msg-required="Mohon masukkan nomor usulan." placeholder="masukkan nomor usulan" />
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <!--
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="col-md-4"> <label>Pos Anggaran (WBS)</label></div>
                                                    <div class="col-md-8">
                                                        <?php $sqlA = mysql_query("SELECT * FROM wbs") or die (mysql_error()); ?>
                                                        <select name="kodewbs" id="kodewbs" class="form-control"  data-msg-required="Mohon masukkan kode pos anggaran.">
                                                            <option value="">- Pilih -</option>
                                                            <?php while ($data = mysql_fetch_array($sqlA)) { ?>
                                                            <option value="<?php echo $data["kodewbs"] ; ?>" <?php if ($rowA['kodewbs']==$data['kodewbs']){ ?>selected="selected"<?php } ?>><?php echo $data["namawbs"]; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        -->
                                        <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-9">
                                                        <div class="col-md-4"><label>Jenis Angaran</label></div>
                                                        <div class="col-md-8">
                                                            <select name="jenis" id="jenis" class="form-control"  data-rule-required="true" data-msg-required="Mohon masukkan jenis anggaran.">
                                                                <option value="">- Pilih -</option>
                                                                <option value="AO">AO</option>
                                                                <option value="AI">AI</option>
                                                            </select>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-9">
                                                <div class="col-md-4"> <label>Pos Anggaran</label></div>
                                                <div class="col-md-8">
                                                    <?php $sqlA = mysql_query("SELECT * FROM pos_anggaran") or die (mysql_error()); ?>
                                                    <select name="kode_posanggaran" id="kode_posanggaran" disabled="" class="form-control"  data-msg-required="Mohon masukkan kode pos anggaran.">
                                                        <option value="">- Pilih -</option>
                                                        <?php while ($data = mysql_fetch_array($sqlA)) { ?>
                                                        <option value="<?php echo $data["kode_posanggaran"] ; ?>" <?php if ($rowA['kode_posanggaran']==$data['kode_posanggaran']){ ?>selected="selected"<?php } ?>><?php echo $data["posanggaran"]; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-9">
                                                <div class="col-md-4"> <label>Fungsi</label></div>
                                                <div class="col-md-8">
                                                    <?php $sqlA = mysql_query("SELECT * FROM fungsi") or die (mysql_error()); ?>
                                                    <select name="kodefungsi" id="kodefungsi" disabled="" class="form-control"  data-msg-required="Mohon masukkan kode fungsi.">
                                                        <option value="">- Pilih -</option>
                                                        <?php while ($data = mysql_fetch_array($sqlA)) { ?>
                                                        <option value="<?php echo $data["kodefungsi"] ; ?>" <?php if ($rowA['kodefungsi']==$data['kodefungsi']){ ?>selected="selected"<?php } ?>><?php echo $data["fungsi"]; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    </div>
                                            </div>
                                            </div>
                                        </div>
                                        -->
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="col-md-4"> <label>Satuan</label></div>
                                                        <div class="col-md-8">
                                                            <?php $sqlA = mysql_query("SELECT * FROM satuan") or die (mysql_error()); ?>
                                                            <select name="kodesatuan" id="kodesatuan" disabled="" class="form-control"  data-msg-required="Mohon masukkan kode satuan.">
                                                                <option value="">- Pilih -</option>
                                                                <?php while ($data = mysql_fetch_array($sqlA)) { ?>
                                                                <option value="<?php echo $data["kodesatuan"] ; ?>" <?php if ($rowA['kodesatuan']==$data['kodesatuan']){ ?>selected="selected"<?php } ?>><?php echo $data["namasatuan"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="col-md-4"><label>Uraian Kegiatan</label></div>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control" id="uraiankegiatan"  name="uraiankegiatan" disabled="" rows="5" cols="22" type="text" value="<?php  ?>" placeholder="masukkan uraian kegiatan" data-rule-required="true" data-msg-required="Mohon masukkan uraian kegiatan"><?php echo $rowA["uraiankegiatan"] ;?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <!--
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-9">
                                                <div class="col-md-4"><label>Durasi</label></div>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="durasi" type="text" disabled="" data-rule-required="true" value="<?php echo $rowA["durasi"]; ?>" data-msg-required="Mohon masukkan durasi." placeholder="masukkan durasi" />
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="col-md-4"><label>Bulan Mulai</label></div>
                                                    <div class="col-md-8">
                                                        <select name="blnmulai" id="blnmulai" class="form-control"  disabled="" data-msg-required="Mohon masukkan bulan mulai.">
                                                            <option value="<?php echo $rowA["blnmulai"] ; ?>" <?php if ($rowA['blnmulai']==$rowA['blnmulai']){ ?>selected="selected"<?php } ?>><?php echo $rowA["blnmulai"]; ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        -->
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-9"> 
                                                <div class="col-md-4"><label>Prioritas</label></div>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="prioritas" type="text" disabled="" data-rule-required="true" value="<?php echo $rowA["prioritas"]; ?>" data-msg-required="Mohon masukkan prioritas." placeholder="masukkan prioritas" />
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-9"> <br />
                                                <div class="col-md-4"><label>Mitigasi</label></div>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="mitigasi" type="text" disabled="" data-rule-required="true" value="<?php echo $rowA["mitigasi"]; ?>" data-msg-required="Mohon masukkan mitigasi." placeholder="masukkan mitigasi" />
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-lg-6">
                                
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-9"><br />
                                                <div class="col-md-4"><label>Volume Jasa</label></div>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="volumejasa" type="text" disabled="" data-rule-required="true" value="<?php echo $rowA["volumejasa"]; ?>" data-msg-required="Mohon masukkan volume jasa." placeholder="masukkan volume jasa" />
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-9">
                                                <div class="col-md-4"><label>Volume Material</label></div>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="volumematerial" type="text" disabled="" data-rule-required="true" value="<?php echo $rowA["volumematerial"]; ?>" data-msg-required="Mohon masukkan volume material." placeholder="masukkan volume material" />
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-9">
                                                <div class="col-md-4"><label>Hrg. Satuan Jasa</label></div>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="hrgsatuanjasa" type="text"  disabled="" data-rule-required="true" value="<?php echo $rowA["hrgsatuanjasa"]; ?>" data-msg-required="Mohon masukkan harga satuan jasa." placeholder="masukkan harga satuan jasa" />
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-9">
                                                <div class="col-md-4"><label>Hrg. Satuan Material</label></div>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="hrgsatuanmaterial" type="text"  disabled="" data-rule-required="true" value="<?php echo $rowA["hrgsatuanmaterial"]; ?>" data-msg-required="Mohon masukkan harga satuan material." placeholder="masukkan harga satuan material" />
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-9">
                                                <div class="col-md-4"><label>Volume Jasa Sesudah</label></div>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="volumejasa" type="text" required="volumejasa"  data-rule-required="true"  data-msg-required="Mohon masukkan volume jasa sesudah." placeholder="masukkan volume jasa sesudah" />
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="col-md-4"><label>Volume Material Sesudah</label></div>
                                                    <div class="col-md-8">
                                                        <input class="form-control" name="volumematerial" type="text" required="volumematerial"  data-rule-required="true"  data-msg-required="Mohon masukkan volume material sesudah." placeholder="masukkan volume material sesudah" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-9">
                                                <div class="col-md-4"><label>Hrg.Satuan Jasa Sesudah</label></div>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="hrgsatuanjasa" type="text" required="hrgsatuanjasa" onKeyPress="return isNumberKey(event)" data-rule-required="true"  data-msg-required="Mohon masukkan hrg satuan jasa sesudah." placeholder="masukkan hrg satuan jasa sesudah" />
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-9">
                                                <div class="col-md-4"><label>Hrg.Satuan Material Sesudah</label></div>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="hrgsatuanmaterial" onKeyPress="return isNumberKey(event)" type="text" required="hrgsatuanmaterial"  data-rule-required="true"  data-msg-required="Mohon masukkan hrg satuan material sesudah." placeholder="masukkan hrg satuan material sesudah" />
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                </div>
                                        <div class="form-group">
                                            <div class="col-lg-6"></div>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <button type="submit" name="submit" class="btn btn-large btn-success">Simpan</button>
                                                <a href="index.php?data-penetapan-ai" class="btn btn-large btn-warning">Kembali</a>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-9">
                                                <div class="col-md-8">
                                                    <input type="hidden" onKeyPress="return isNumberKeyTgl(event)" class="form-control" id="datepicker" name="tartglmulai" value="<?php if($rowA["tartglmulai"]=="0000-00-00"){}else{ echo format_tgl($rowA["tartglmulai"]); } ?>" data-rule-required="true" data-rule-date="true" data-msg-date="format yang benar dd/mm/yyyy" data-msg-required="mohon masukkan data Target tanggal mulai." placeholder="masukkan Target tanggal mulai" /></div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-9">
                                                <div class="col-md-8">
                                                    <input class="form-control" name="status" type="hidden" data-rule-required="true" value="<?php echo $rowA["status"]; ?>" data-msg-required="Mohon masukkan status." placeholder="masukkan status" />
                                                </div>
                                            </div>
                                            </div>
                                        </div>  
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-9">
                                                <div class="col-md-8">
                                                    <input class="form-control" name="randomid" type="hidden"  data-rule-required="true" value="<?php echo $rowA["randomid"]; ?>" />
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                    </form>
                </table>
            </div>
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

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="assets/validasi/jquery.validate.min.js"></script>
<script type="text/javascript">
    $('#validate-me-plz').validate({
        rules: {
            field: {
                required: true,
                date: true
            },
            alamat: {
                required: true
            }
        },
        messages: {
            alamat: {
                required: "Mohon masukkan data AI"
            }
        }
    });

    $('#fileToUpload').filestyle();
    $('#fileToUpload').change(function(){
        var file = $('#fileToUpload').val();
        var exts = ['jpg','jpeg'];
        if ( file ) {
            var get_ext = file.split('.');
            get_ext = get_ext.reverse();
            if ( $.inArray ( get_ext[0].toLowerCase(), exts ) > -1 ){
                return true;
            }
            else
            {
                alert('Hanya boleh jpg ');
                $('#fileToUpload').filestyle('clear');
            }
        }
    });
</script>
