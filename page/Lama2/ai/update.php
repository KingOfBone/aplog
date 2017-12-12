<?php

if(isset($_POST["submit"])){
        
        $a      = mysql_real_escape_string(strip_tags($_POST["nousulan"]));
        $b      = mysql_real_escape_string(strip_tags($_POST["kodesatuan"]));
        $c      = mysql_real_escape_string(strip_tags($_POST["uraiankegiatan"]));
        $aa     = tglformataction($_POST["tartglmulai"]);
        $e      = mysql_real_escape_string(strip_tags($_POST["prioritas"]));
        $f      = mysql_real_escape_string(strip_tags($_POST["volumejasa"]));
        $g      = mysql_real_escape_string(strip_tags($_POST["volumematerial"]));
        $h      = mysql_real_escape_string(strip_tags($_POST["hrgsatuanjasa"]));
        $i      = mysql_real_escape_string(strip_tags($_POST["hrgsatuanmaterial"]));
        $j      = mysql_real_escape_string(strip_tags($_POST["mitigasi"]));
        $k      = mysql_real_escape_string(strip_tags($_POST["jan"]));
        $l      = mysql_real_escape_string(strip_tags($_POST["feb"]));
        $m      = mysql_real_escape_string(strip_tags($_POST["mar"]));
        $n      = mysql_real_escape_string(strip_tags($_POST["apr"]));
        $o      = mysql_real_escape_string(strip_tags($_POST["mei"]));
        $p      = mysql_real_escape_string(strip_tags($_POST["jun"]));
        $q      = mysql_real_escape_string(strip_tags($_POST["jul"]));
        $r      = mysql_real_escape_string(strip_tags($_POST["agu"]));
        $s      = mysql_real_escape_string(strip_tags($_POST["sep"]));
        $t      = mysql_real_escape_string(strip_tags($_POST["okt"]));
        $u      = mysql_real_escape_string(strip_tags($_POST["nov"]));
        $v      = mysql_real_escape_string(strip_tags($_POST["des"]));
        $w      = mysql_real_escape_string(strip_tags($_POST["randomid"]));
        
        $filerks  = $_FILES["fileuploadkko"]["name"];
        $filerks1 = $_POST["fileuploadkko1"];

        if($filerks == "" || $filerks == null || empty($filerks)){
        $newfilerks = $filerks1;
        }else{
        $filerks  = $_FILES["fileuploadkko"]["name"];
        $newfilerks     = time() . '_' . rand(100, 999) . '.' . end(explode(".",$filerks));
        $file_tmp_rks = $_FILES["fileuploadkko"]["tmp_name"];
        copy($file_tmp_rks,"foto/".$newfilerks);
        copy($file_tmp_rks,"fotoki/".$newfilerks);
        
        }
        $filerks2  = $_FILES["fileuploadkkf"]["name"];
        $filerks3 = $_POST["fileuploadkkf1"];

        if($filerks2 == "" || $filerks2 == null || empty($filerks2)){
        $newfilerks2 = $filerks3;
        }else{
        $filerks2  = $_FILES["fileuploadkkf"]["name"];
        $newfilerks2     = time() . '_' . rand(100, 999) . '.' . end(explode(".",$filerks2));
        $file_tmp_rks1 = $_FILES["fileuploadkkf"]["tmp_name"];
        copy($file_tmp_rks1,"foto/".$newfilerks2);
        copy($file_tmp_rks1,"fotoki/".$newfilerks2);
        }
        
        mysql_query ("UPDATE headeranggaran SET nousulan='$a', kodesatuan='$b', uraiankegiatan='$c', tartglmulai='$aa', 
        prioritas='$e', kko='$newfilerks', kkf='$newfilerks2', mitigasi='$j' WHERE randomid='$w'");
        
        mysql_query ("UPDATE newdetailanggaran SET  volumejasa='$f', volumematerial='$g', hrgsatuanjasa='$h', 
        hrgsatuanmaterial='$i' WHERE randomid='$w'");
        
        mysql_query ("UPDATE disburst SET jan='$k', feb='$l', mar='$m', apr='$n', mei='$o', jun='$p', jul='$q', 
        agu='$r', sep='$s', okt='$t', nov='$u', des='$v' WHERE randomid='$w'");
        header("location:index.php?ai&suksesedit");
}
$idA = mysql_real_escape_string(trim($_GET["update-ai"]));
$sqlA= mysql_query("SELECT 
newdetailanggaran.*, 
headeranggaran.*,
disburst.*
FROM newdetailanggaran
INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid 
INNER JOIN satuan ON headeranggaran.kodesatuan = satuan.kodesatuan 
INNER JOIN disburst ON newdetailanggaran.randomid = disburst.randomid 
WHERE newdetailanggaran.randomid = '$idA'") or die (mysql_error());
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
                    <h2>Ubah Usulan Anggaran</h2>
                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <!-- content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Ubah Usulan Anggaran
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
                                                    <input class="form-control" name="nousulan" type="text" required="nousulan" data-rule-required="true" value="<?php echo $rowA["nousulan"]; ?>" data-msg-required="Mohon masukkan no. usulan." placeholder="masukkan no. usulan" />
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
                                                    <select name="kodesatuan" id="kodesatuan" class="form-control"  data-msg-required="Mohon masukkan kode satuan.">
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
                                                    <textarea class="form-control" id="uraiankegiatan"  name="uraiankegiatan" required="uraiankegiatan" rows="5" cols="22" type="text" value="<?php  ?>" placeholder="masukkan uraian kegiatan" data-rule-required="true" data-msg-required="Mohon masukkan uraian kegiatan"><?php echo $rowA["uraiankegiatan"] ;?></textarea>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-10">
                                                <div class="col-md-4"><label>Perkiraan tgl mulai</label></div>
                                                <div class="col-md-8">
                                                    <input  type="text" onKeyPress="return isNumberKeyTgl(event)" required="tartglmulai" class="form-control" id="datepicker" name="tartglmulai" value="<?php if($rowA["tartglmulai"]=="0000-00-00"){}else{ echo format_tgl($rowA["tartglmulai"]); } ?>" data-rule-required="true" data-rule-date="true" data-msg-date="format yang benar dd/mm/yyyy" data-msg-required="mohon masukkan data tanggal usulan." placeholder="masukkan tanggal usulan" /></div>
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
                                                    <input class="form-control" name="prioritas" type="text" data-rule-required="true" value="<?php echo $rowA["prioritas"]; ?>" data-msg-required="Mohon masukkan prioritas." placeholder="masukkan prioritas" />
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-10">
                                                <div class="col-md-4"><label>Volume Jasa</label></div>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="volumejasa" type="text" id="volumejasa"  onkeyup="usulan();" required="volumejasa" onKeyPress="return isNumberKey(event)" data-rule-required="true" value="<?php echo $rowA["volumejasa"]; ?>" data-msg-required="Mohon masukkan volume jasa." placeholder="masukkan volume jasa" />
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-10">
                                                <div class="col-md-4"><label>Volume Material</label></div>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="volumematerial" type="text" id="volumematerial"  onkeyup="usulan();" required="volumematerial" onKeyPress="return isNumberKey(event)" data-rule-required="true" value="<?php echo $rowA["volumematerial"]; ?>" data-msg-required="Mohon masukkan volume material." placeholder="masukkan volume material" />
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-10">
                                                <div class="col-md-4"><label>Harga Satuan Jasa</label></div>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="hrgsatuanjasa" type="text" id="hrgsatuanjasa" onkeyup="usulan();" required="hrgsatuanjasa" onKeyPress="return isNumberKey(event)" data-rule-required="true" value="<?php echo $rowA["hrgsatuanjasa"]; ?>" data-msg-required="Mohon masukkan harga satuan jasa." placeholder="masukkan harga satuan jasa" />
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-10">
                                                <div class="col-md-4"><label>Harga Satuan Material</label></div>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="hrgsatuanmaterial" type="text" id="hrgsatuanmaterial"  onkeyup="usulan();" required="hrgsatuanmaterial" onKeyPress="return isNumberKey(event)" data-rule-required="true" value="<?php echo $rowA["hrgsatuanmaterial"]; ?>" data-msg-required="Mohon masukkan harga satuan material." placeholder="masukkan harga satuan material" />
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
                                                            <div class="col-md-4"><label>Total Disburse</label></div>
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
                                                    <input class="form-control" name="mitigasi" type="text" data-rule-required="true" value="<?php echo $rowA["mitigasi"]; ?>" data-msg-required="Mohon masukkan mitigasi." placeholder="masukkan mitigasi" />
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-10">
                                                <div class="col-md-4"><label>KKO</label></div>
                                                <div class="col-md-8">
                                                    <input type="file" name="fileuploadkko" id="fileuploadkko" onchange="checkextension()"/>
                                                    <input type="hidden" name="fileuploadkko1" id="fileuploadkko1"  value="<?php echo $rowA["kko"] ?>"/>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <div class="col-md-4"><label>KKF</label></div>
                                                    <div class="col-md-8">
                                                        <input type="file" name="fileuploadkkf" id="fileuploadkkf" onchange="checkextension2()"/>
                                                        <input type="hidden" name="fileuploadkkf1" id="fileuploadkkf1" value="<?php echo $rowA["kkf"] ?>"/>
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
                                            <h3>Disburse Anggaran</h3> <br />
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
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="col-md-8">
                                                        <button type="submit" name="submit" class="btn btn-large btn-success">Simpan</button>
                                                        <a href="index.php?ai" class="btn btn-large btn-warning">Kembali</a>
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
$('#input01').filestyle();
  $('#validasi').validate({
      rules: {
        field: {
          required: true,
          date: true
        }
      }
    });
</script>
<script>
//style upload
$('#input01').filestyle();

function checkextension() {
  var file = document.querySelector("#fileuploadkko");
  
  if ( /\.(docx)$/i.test(file.files[0].name) === false ) { 
    //alert("maaf file harus .pdf!");
    if ( /\.(xlsx)$/i.test(file.files[0].name) === false ) { 
            $('#myModal').modal('show') 
            eraseText() 
        }
    
    }
}
function checkextension2() {
  var file = document.querySelector("#fileuploadkkf");
  
  if ( /\.(doc)$/i.test(file.files[0].name) === false ) { 
    //alert("maaf file harus .pdf!");
    if ( /\.(xls)$/i.test(file.files[0].name) === false ) { 
    if ( /\.(xlsx)$/i.test(file.files[0].name) === false ) { 
            }
        }
    
    }
}
function eraseText2() {
    document.getElementById("fileuploadkkf").value = "";
}
function eraseText() {
    document.getElementById("fileuploadkko").value = "";
}
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
<!-- Modal Popup upload-->
    <div class="modal fade " id="myModal">
      <div class="modal-dialog">
        <div class="modal-content " style="margin-top:100px; border-radius: 0px;">
          <div class="modal-header bg-warning">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" style="text-align:center; ">File upload hanya .xls & .doc</h4>
          </div>

          <div class="modal-footer bg-warning" style="margin:0px; border-top:0px; ">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>
    
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