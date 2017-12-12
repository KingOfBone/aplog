<?php

if(isset($_POST["submit"])){
        
        $i      = mysql_real_escape_string(strip_tags($_POST["volumejasa"]));
        $j      = mysql_real_escape_string(strip_tags($_POST["volumematerial"]));
        $k      = mysql_real_escape_string(strip_tags($_POST["hrgsatuanjasa"]));
        $l      = mysql_real_escape_string(strip_tags($_POST["hrgsatuanmaterial"]));
        $m      = mysql_real_escape_string(strip_tags($_POST["randomid"]));
        $n      = mysql_real_escape_string(strip_tags($_POST["jenis"]));
        
        mysql_query ("UPDATE headeranggaran SET jenis='$n' where randomid='$m'");
        
        mysql_query ("UPDATE newdetailanggaran SET volumejasa='$i', volumematerial='$j', hrgsatuanjasa='$k',
        hrgsatuanmaterial='$l' WHERE randomid='$m' AND status='4'");
        header("location:index.php?data-penetapan-ai&suksesedit");
}
$idA = mysql_real_escape_string(trim($_GET["update-penetapan"]));
$sqlA= mysql_query("SELECT 
newdetailanggaran.*, 
headeranggaran.*
FROM newdetailanggaran
INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid 
INNER JOIN satuan ON headeranggaran.kodesatuan = satuan.kodesatuan WHERE status = '4' 
AND newdetailanggaran.randomid = '$idA'") or die (mysql_error());
if(mysql_num_rows($sqlA)==0);
$rowA = mysql_fetch_array($sqlA); 
?>
 <script type="text/javascript">
    function isNumberKeyTgl(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
    //     if (charCode > 31 && (charCode < 47 || charCode > 57))
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
<div id="wrapper">
                <!-- /. NAV SIDE  -->
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Ubah Penetapan Anggaran</h2>
                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <!-- content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Ubah Penetapan Anggaran
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form id="validate-me-plz" name="form1" enctype="multipart/form-data" role="form" action="" method="post">
                                <input type="hidden" name="randomid" value="<?php echo $idA; ?>" />
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-10">
                                                <div class="col-md-4"><label>No. Usulan</label></div>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="nousulan" type="text" disabled="" data-rule-required="true" value="<?php echo $rowA["nousulan"]; ?>" data-msg-required="Mohon masukkan no. usulan." placeholder="masukkan no. usulan" />
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
                                                    <select name="kode_posanggaran" id="kode_posanggaran" class="form-control"  data-msg-required="Mohon masukkan kode pos anggaran.">
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
                                                    <select name="kodefungsi" id="kodefungsi" class="form-control"  data-msg-required="Mohon masukkan kode fungsi.">
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
                                            <div class="col-md-10">
                                                <div class="col-md-4"> <label>Satuan</label></div>
                                                <div class="col-md-8">
                                                    <?php $sqlA = mysql_query("SELECT * FROM satuan") or die (mysql_error()); ?>
                                                    <select name="kodesatuan" id="kodesatuan" class="form-control"  disabled="" data-msg-required="Mohon masukkan kode satuan.">
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
                                            <div class="col-md-10">
                                                <div class="col-md-4"> <label>Jenis Anggaran</label></div>
                                                <div class="col-md-8">
                                                    <select name="jenis" id="jenis" class="form-control"  data-msg-required="Mohon masukkan jenis anggaran.">
                                                        <option value="<?php echo $rowA["jenis"] ; ?>" <?php if ($rowA['jenis']==$rowA['jenis']){ ?>selected="selected"<?php } ?>><?php echo $rowA["jenis"]; ?></option>
                                                        <option>- Pilih -</option>
                                                        <option>AO</option>
                                                        <option>AI</option>
                                                        </select>
                                                    </div>
                                            </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-10">
                                                <div class="col-md-4"><label>Uraian Kegiatan</label></div>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" id="uraiankegiatan"  name="uraiankegiatan" rows="5" cols="22" disabled="" type="text" value="<?php  ?>" placeholder="masukkan uraian kegiatan" data-rule-required="true" data-msg-required="Mohon masukkan uraian kegiatan"><?php echo $rowA["uraiankegiatan"] ;?></textarea>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-10">
                                                <div class="col-md-4"><label>Tanggal Usulan</label></div>
                                                <div class="col-md-8">
                                                    <input  type="text" onKeyPress="return isNumberKeyTgl(event)" class="form-control" id="datepicker" name="tartglmulai" disabled="" value="<?php if($rowA["tartglmulai"]=="0000-00-00"){}else{ echo format_tgl($rowA["tartglmulai"]); } ?>" data-rule-required="true" data-rule-date="true" data-msg-date="format yang benar dd/mm/yyyy" data-msg-required="mohon masukkan data tanggal usulan." placeholder="masukkan tanggal usulan" /></div>
                                            </div>
                                            </div>
                                        </div>
                                        <!--
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <div class="col-md-4"><label>Bulan Mulai</label></div>
                                                        <div class="col-md-8">
                                                            <select name="blnmulai" id="bln mulai" class="form-control"  data-msg-required="Mohon masukkan bulan mulai.">
                                                                    <option value="<?php echo $rowA["blnmulai"] ; ?>" <?php if ($rowA['blnmulai']==$rowA['blnmulai']){ ?>selected="selected"<?php } ?>><?php echo $rowA["blnmulai"]; ?></option>
                                                                    <option>- Pilih -</option>
                                                                    <option>Januari</option>
                                                                    <option>Februari</option>
                                                                    <option>Maret</option>
                                                                    <option>April</option>
                                                                    <option>Mei</option>
                                                                    <option>Juni</option>
                                                                    <option>July</option>
                                                                    <option>Agustus</option>
                                                                    <option>September</option>
                                                                    <option>Oktober</option>
                                                                    <option>November</option>
                                                                    <option>Desember</option>
                                                                </select>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        -->
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-10">
                                                <div class="col-md-4"><label>Prioritas</label></div>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="prioritas" type="text" data-rule-required="true" disabled="" value="<?php echo $rowA["prioritas"]; ?>" data-msg-required="Mohon masukkan prioritas." placeholder="masukkan prioritas" />
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-lg-6">
                                    <?php if ($rowA['jenis'] == 'AO') {?>
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-10">
                                                <div class="col-md-4"><label>Mitigasi</label></div>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="mitigasi" type="text" disabled="" value="<?php echo $rowA["mitigasi"]; ?>"  placeholder="masukkan mitigasi" />
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-10">
                                                <div class="col-md-4"><label>Volume Jasa (Penetapan)</label></div>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="volumejasa" type="text" required="volumejasa" onKeyPress="return isNumberKey(event)" data-rule-required="true" value="<?php echo $rowA["volumejasa"]; ?>" data-msg-required="Mohon masukkan volume jasa (Penetapan)." placeholder="masukkan volume jasa (Penetapan)" />
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-10">
                                                <div class="col-md-4"><label>Volume Material (Penetapan)</label></div>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="volumematerial" type="text" required="volumematerial" onKeyPress="return isNumberKey(event)" data-rule-required="true" value="<?php echo $rowA["volumematerial"]; ?>" data-msg-required="Mohon masukkan volume material (Penetapan)" placeholder="masukkan volume material (Penetapan)" />
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-10">
                                                <div class="col-md-4"><label>Harga Satuan Jasa (Penetapan)</label></div>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="hrgsatuanjasa" type="text" required="hrgsatuanjasa" onKeyPress="return isNumberKey(event)" data-rule-required="true" value="<?php echo $rowA["hrgsatuanjasa"]; ?>" data-msg-required="Mohon masukkan harga satuan jasa (Penetapan)" placeholder="masukkan harga satuan jasa (Penetapan)" />
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-10">
                                                <div class="col-md-4"><label>Harga Satuan Material (Penetapan)</label></div>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="hrgsatuanmaterial" type="text" required="hrgsatuanmaterial" onKeyPress="return isNumberKey(event)" data-rule-required="true" value="<?php echo $rowA["hrgsatuanmaterial"]; ?>" data-msg-required="Mohon masukkan harga satuan material (Penetapan)" placeholder="masukkan harga satuan material (Penetapan)" />
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
                                    </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="col-md-8">
                                                        <button type="submit" name="submit" class="btn btn-large btn-success">Simpan</button>
                                                        <a href="index.php?data-penetapan-ai" class="btn btn-large btn-warning">Kembali</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
<script type="text/javascript" src="assets/validasi/jquery.validate.min.js"></script>
<script type="text/javascript">
$('#fileToUpload').filestyle();
 $('#fileToUpload').change(function(){
      var file = $('#fileToUpload').val();
      var exts = ['jpg','jpeg'];
      if ( file ) {
        var get_ext = file.split('.');
        get_ext = get_ext.reverse();
        if ( $.inArray ( get_ext[0].toLowerCase(), exts ) > -1 ){
          return true;
        } else {
          alert('Hanya boleh jpg ');
          $('#fileToUpload').filestyle('clear');
        }
      }

    });

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
            required: ""
                }
            }

    });
</script>
