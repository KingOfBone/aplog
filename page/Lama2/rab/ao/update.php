<?php

if(isset($_POST["submit"])){
        
        $h      = mysql_real_escape_string(strip_tags($_POST["volumejasa"]));
        $i      = mysql_real_escape_string(strip_tags($_POST["volumematerial"]));
        $j      = mysql_real_escape_string(strip_tags($_POST["hrgsatuanjasa"]));
        $k      = mysql_real_escape_string(strip_tags($_POST["hrgsatuanmaterial"]));
        $aa     = mysql_real_escape_string(strip_tags($_POST["randomid"]));
        $n      = mysql_real_escape_string(strip_tags($_POST["jan"]));
        $o      = mysql_real_escape_string(strip_tags($_POST["feb"]));
        $p      = mysql_real_escape_string(strip_tags($_POST["mar"]));
        $q      = mysql_real_escape_string(strip_tags($_POST["apr"]));
        $r      = mysql_real_escape_string(strip_tags($_POST["mei"]));
        $s      = mysql_real_escape_string(strip_tags($_POST["jun"]));
        $t      = mysql_real_escape_string(strip_tags($_POST["jul"]));
        $u      = mysql_real_escape_string(strip_tags($_POST["agu"]));
        $v      = mysql_real_escape_string(strip_tags($_POST["sep"]));
        $w      = mysql_real_escape_string(strip_tags($_POST["okt"]));
        $x      = mysql_real_escape_string(strip_tags($_POST["nov"]));
        $y      = mysql_real_escape_string(strip_tags($_POST["des"]));
        $z      = mysql_real_escape_string(strip_tags($_POST["nopr"]));
        $ac      = mysql_real_escape_string(strip_tags($_POST["randomid"]));
        $ab      = mysql_real_escape_string(strip_tags($_POST["status"]));
        $ad      = mysql_real_escape_string(strip_tags($_POST["nmrwbs"]));
        
        mysql_query ("UPDATE newdetailanggaran SET volumejasa='$h', volumematerial='$i', hrgsatuanjasa='$j', 
        hrgsatuanmaterial='$k' WHERE randomid='$aa' AND status='$ab'");
        
        mysql_query ("UPDATE disburst SET jan='$n', feb='$o', mar='$p', apr='$q', mei='$r', jun='$s', jul='$t', agu='$u', 
        sep='$v', okt='$w', nov='$x', des='$y' WHERE randomid='$ac'");
        
        mysql_query ("UPDATE headeranggaran set nopr='$z', nmrwbs='$ad' where randomid='$aa'");
        
        mysql_query ("UPDATE wbs set nmrwbs='$ad' where randomid='$ac'");
        header("location:index.php?rab-ao&suksesedit");
        
        
}
$idA = mysql_real_escape_string(trim($_GET["update-rab-ao"]));
$idB = mysql_real_escape_string(trim($_GET["status"]));
$sqlA= mysql_query("SELECT 
newdetailanggaran.*, 
headeranggaran.*,
disburst.*,
wbs.*
FROM newdetailanggaran
INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid 
INNER JOIN satuan ON headeranggaran.kodesatuan = satuan.kodesatuan 
INNER JOIN disburst ON newdetailanggaran.randomid = disburst.randomid 
INNER JOIN wbs ON newdetailanggaran.randomid = wbs.randomid 
WHERE newdetailanggaran.randomid = '$idA' AND newdetailanggaran.status = '5'") or die (mysql_error());
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
                    <h2>Ubah RAB AO</h2>
                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <!-- content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Ubah RAB AO
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form id="validate-me-plz" name="form1" enctype="multipart/form-data" role="form" action="" method="post">
                                <input type="hidden" name="kodedetail" value="<?php echo $idA; ?>" />
                                <input type="hidden" name="status" value="<?php echo $idB; ?>" />
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-10">
                                                <div class="col-md-4"><label>No. Usulan</label></div>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="nousulan" disabled="" type="text" data-rule-required="true" value="<?php echo $rowA["nousulan"]; ?>"/>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <!--
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-10">
                                                <div class="col-md-4"> <label>Pos Anggaran (WBS)</label></div>
                                                <div class="col-md-8">
                                                    <?php $sqlA = mysql_query("SELECT * FROM wbs") or die (mysql_error()); ?>
                                                    <select name="nmrwbs" id="nmrwbs" disabled="" class="form-control"  data-msg-required="Mohon masukkan nmr WBS.">
                                                        <option value="">- Pilih -</option>
                                                        <?php while ($data = mysql_fetch_array($sqlA)) { ?>
                                                        <option value="<?php echo $data["nmrwbs"] ; ?>" <?php if ($rowA['nmrwbs']==$data['nmrwbs']){ ?>selected="selected"<?php } ?>><?php echo $data["nmrwbs"]; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    </div>
                                            </div>
                                            </div>
                                        </div>
                                        
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
                                            <div class="col-md-10">
                                                <div class="col-md-4"><label>No. WBS</label></div>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="nmrwbs" type="text" required="nmrwbs" data-rule-required="true" value="<?php echo $rowA["nmrwbs"]; ?>" data-msg-required="Mohon masukkan No. WBS." placeholder="masukkan No.WBS"/>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-10">
                                                <div class="col-md-4"><label>No. Purchase Request</label></div>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="nopr" type="text" required="nopr" data-rule-required="true" value="<?php echo $rowA["nopr"]; ?>" data-msg-required="Mohon masukkan No. PR." placeholder="masukkan No.PR"/>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-10">
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
                                            <div class="col-md-10">
                                                <div class="col-md-4"><label>Uraian Kegiatan</label></div>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" id="uraiankegiatan"  name="uraiankegiatan" disabled="" rows="5" cols="22" type="text" value="<?php  ?>" placeholder="masukkan uraian kegiatan" data-rule-required="true" data-msg-required="Mohon masukkan uraian kegiatan"><?php echo $rowA["uraiankegiatan"] ;?></textarea>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-lg-6">
                                        
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-10">
                                                <div class="col-md-4"><label>Volume Jasa (RAB)</label></div>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="volumejasa" type="text" id="volumejasa"  onkeyup="usulan();" required="volumejasa" onKeyPress="return isNumberKey(event)" data-rule-required="true" value="<?php echo $rowA["volumejasa"]; ?>" data-msg-required="Mohon masukkan volume jasa (RAB)" placeholder="masukkan volume jasa (RAB)" />
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-10">
                                                <div class="col-md-4"><label>Volume Material (RAB)</label></div>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="volumematerial" type="text" id="volumematerial"  onkeyup="usulan();" required="volumematerial" onKeyPress="return isNumberKey(event)" data-rule-required="true" value="<?php echo $rowA["volumematerial"]; ?>" data-msg-required="Mohon masukkan volume material (RAB)" placeholder="masukkan volume material (RAB)" />
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-10">
                                                <div class="col-md-4"><label>Harga Satuan Jasa (RAB)</label></div>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="hrgsatuanjasa" type="text" id="hrgsatuanjasa"  onkeyup="usulan();" required="hrgsatuanjasa" onKeyPress="return isNumberKey(event)" data-rule-required="true" value="<?php echo $rowA["hrgsatuanjasa"]; ?>" data-msg-required="Mohon masukkan harga satuan jasa (RAB)" placeholder="masukkan harga satuan jasa (RAB)" />
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-10">
                                                <div class="col-md-4"><label>Harga Satuan Material (RAB)</label></div>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="hrgsatuanmaterial" type="text" id="hrgsatuanmaterial"  onkeyup="usulan();" required="hrgsatuanmaterial"  onKeyPress="return isNumberKey(event)" data-rule-required="true" value="<?php echo $rowA["hrgsatuanmaterial"]; ?>" data-msg-required="Mohon masukkan harga satuan material (RAB)" placeholder="masukkan harga satuan material (RAB)" />
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-10">
                                                            <div class="col-md-4"><label>Total Usulan</label></div>
                                                            <div class="col-md-8">
                                                                <input type="text"   name='totalusulan' disabled="" class="form-control"  id="totalusulan" onKeyPress="return isNumberKey(event)" />
                                                            </div>
                                                </div>
                                            </div>
                                      </div>
                              
                                      <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-10">
                                                            <div class="col-md-4"><label>Total Disburst</label></div>
                                                            <div class="col-md-8">
                                                                <input type="text"   name='totaldisburst' disabled="" class="form-control"  id="totaldisburst" onKeyPress="return isNumberKey(event)" />
                                                            </div>
                                                </div>
                                            </div>
                                      </div>
                                      <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-10">
                                                <div class="col-md-4"><label>Mitigasi</label></div>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="mitigasi" type="text" id="mitigasi" disabled="" data-rule-required="true" value="<?php echo $rowA["mitigasi"]; ?>" data-msg-required="Mohon masukkan mitigasi" placeholder="masukkan mitigasi" />
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
                                    <div class="col-md-8">
                                            <h3>Disburst Anggaran</h3> <br />
                                        </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-3"><label>Januari</label></div>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text"  value="<?php echo $rowA["jan"]; ?>" required="required" data-format=" 0,0[.]00" name='jan' id="jan" onkeyup="disburst();" onKeyPress="return isNumberKey(event)" /></div>
                                                    </div>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-3"><label>Februari</label></div>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text"  value="<?php echo $rowA["feb"]; ?>"  required="required" data-format=" 0,0[.]00" name='feb' id="feb" onkeyup="disburst();" onKeyPress="return isNumberKey(event)" /></div>
                                                    </div>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-3"><label>Maret</label></div>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text"  value="<?php echo $rowA["mar"]; ?>"  required="required" data-format=" 0,0[.]00" name='mar' id="mar" onkeyup="disburst();" onKeyPress="return isNumberKey(event)" /></div>
                                                    </div>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-3"><label>April</label></div>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text"  value="<?php echo $rowA["apr"]; ?>"  required="required" data-format=" 0,0[.]00" name='apr' id="apr" onkeyup="disburst();" onKeyPress="return isNumberKey(event)" /></div>
                                                    </div>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-3"><label>Mei</label></div>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text"  value="<?php echo $rowA["mei"]; ?>"  required="required" data-format=" 0,0[.]00" name='mei' id="mei" onkeyup="disburst();" onKeyPress="return isNumberKey(event)" /></div>
                                                    </div>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-3"><label>Juni</label></div>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text"  value="<?php echo $rowA["jun"]; ?>"  required="required" data-format=" 0,0[.]00" name='jun' id="jun" onkeyup="disburst();" onKeyPress="return isNumberKey(event)" /></div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-3"><label>July</label></div>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text"  value="<?php echo $rowA["jul"]; ?>"  required="required" data-format=" 0,0[.]00" name='jul' id="jul" onkeyup="disburst();" onKeyPress="return isNumberKey(event)" /></div>
                                                    </div>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-3"><label>Agustus</label></div>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text"  value="<?php echo $rowA["agu"]; ?>"  required="required" data-format=" 0,0[.]00" name='agu' id="agu" onkeyup="disburst();" onKeyPress="return isNumberKey(event)" /></div>
                                                    </div>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-3"><label>September</label></div>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text"  value="<?php echo $rowA["sep"]; ?>"  required="required" data-format=" 0,0[.]00" name='sep' id="sep" onkeyup="disburst();" onKeyPress="return isNumberKey(event)" /></div>
                                                    </div>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-3"><label>Oktober</label></div>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text"  value="<?php echo $rowA["okt"]; ?>"  required="required" data-format=" 0,0[.]00" name='okt' id="okt" onkeyup="disburst();" onKeyPress="return isNumberKey(event)" /></div>
                                                    </div>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-3"><label>November</label></div>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text"  value="<?php echo $rowA["nov"]; ?>"  required="required" data-format=" 0,0[.]00" name='nov' id="nov" onkeyup="disburst();" onKeyPress="return isNumberKey(event)" /></div>
                                                    </div>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-3"><label>Desember</label></div>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text"  value="<?php echo $rowA["des"]; ?>"  required="required" data-format=" 0,0[.]00" name='des' id="des" onkeyup="disburst();" onKeyPress="return isNumberKey(event)" /></div>
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
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                                <button type="submit" name="submit" class="btn btn-large btn-success">Simpan</button>
                                                <a href="index.php?rab-ao" class="btn btn-large btn-warning">Kembali</a>
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
    function disburst() {
      var jan = document.getElementById('jan').value;
      var feb = document.getElementById('feb').value;
      var mar = document.getElementById('mar').value;
      var apr = document.getElementById('apr').value;
      var mei = document.getElementById('mei').value;
      var jun = document.getElementById('jun').value;
      var jul = document.getElementById('jul').value;
      var agu = document.getElementById('agu').value;
      var sep = document.getElementById('sep').value;
      var okt = document.getElementById('okt').value;
      var nov = document.getElementById('nov').value;
      var des = document.getElementById('des').value;
      var result = parseInt(jan) + parseInt(feb) + parseInt(mar) + parseInt(apr) + parseInt(mei) + parseInt(jun) + parseInt(jul) + parseInt(agu) + parseInt(sep) + parseInt(okt) + parseInt(nov) + parseInt(des);
      
      document.getElementById('totaldisburst').value = result;     
}
function usulan() {
      var vjasa = document.getElementById('volumejasa').value;
      var vmat = document.getElementById('volumematerial').value;
      var hrgjas = document.getElementById('hrgsatuanjasa').value;
      var hrgmat = document.getElementById('hrgsatuanmaterial').value;
      var result = (parseInt(vjasa)*parseInt(hrgjas))+(parseInt(vmat)*parseInt(hrgmat));
      
      document.getElementById('totalusulan').value = result;     
}

$(document).ready(function() {
   $('input').change(function(e) {
        var dis = parseInt($('#totaldisburst').val());
        var usul = parseInt($('#totalusulan').val());
        $(':button[type="submit"]').prop('disabled', false);
        
        if(dis > usul){
            $('#myBanding').modal('show');
            $(':button[type="submit"]').prop('disabled', true);
        }
   }); 
});
</script>
    <div class="modal fade " id="myBanding">
      <div class="modal-dialog">
        <div class="modal-content " style="margin-top:100px; border-radius: 0px;">
          <div class="modal-header bg-warning">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" style="text-align:center; ">Total disburst tidak sama dengan total usulan</h4>
          </div>

          <div class="modal-footer bg-warning" style="margin:0px; border-top:0px; ">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>