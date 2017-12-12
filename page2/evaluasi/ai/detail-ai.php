<?php
include "../../../config/koneksi.php";
include "../../../config/utility.php";
session_start();

$detail     = $_POST['id'];

$sqldetail = mysql_query("SELECT 
newdetailanggaran.*, 
headeranggaran.*,
disburst.*
FROM newdetailanggaran
INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid 
INNER JOIN disburst ON newdetailanggaran.randomid = disburst.randomid 
WHERE status IN ('0','1','2','3') AND newdetailanggaran.kodedetail = '$detail'");

$rowDetail     = mysql_fetch_array($sqldetail);
?>
<div class="row">
    
    <!-- <div class="col-md-3">
        <img src="<?php echo $rowDetail["images"] == "" ? "images/no-images.png" : "".$rowDetail["images"] ?>" width="188" height="272" class="img-responsive img-rounded center-block" />
        <p class="text-center"><?php echo $rowDetail["images"]; ?></p>
    </div> -->
    <div class="col-md-9">
    <!--
           <div class="row">
            <div class="col-md-5"><label>Kode Pos Anggaran</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["kode_posanggaran"]; ?></div>
           </div>
          <div class="row">
            <div class="col-md-5"><label>Kode Fungsi</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["kodefungsi"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Nomor PRK</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["noprk"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Jenis</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["jenis"]; ?></div>
          </div>
    -->
          <div class="row">
            <div class="col-md-5"><label>No. Usulan</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["nousulan"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Uraian Kegiatan</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["uraiankegiatan"]; ?></div>
          </div>
    <!--
          <div class="row">
            <div class="col-md-5"><label>Durasi</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["durasi"]; ?></div>
          </div>
    -->
          <div class="row">
            <div class="col-md-5"><label>Perkiraan tgl mulai</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php if($rowDetail["tartglmulai"]=="0000-00-00"){ }else{  echo tglindonesia($rowDetail["tartglmulai"]); } ?></div>
          </div>
    <!--
          <div class="row">
            <div class="col-md-5"><label>Bulan Mulai</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["blnmulai"]; ?></div>
          </div>
    -->
          <div class="row">
            <div class="col-md-5"><label>Prioritas</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["prioritas"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Vol. Jasa</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["volumejasa"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Vol. Material</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["volumematerial"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Hrg. Satuan Jasa</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["hrgsatuanjasa"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Hrg. Satuan Material</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["hrgsatuanmaterial"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Mitigasi</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["mitigasi"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>KKO</label></div>
            <div class="col-md-1"> : </div>                             
            <div class="col-md-6"><a href="?fr=<?php echo $rowDetail['kko']; ?>" target="_blank"><?php echo $rowDetail['kko']; ?></a></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>KKF</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><a href="?fr=<?php echo $rowDetail['kkf']; ?>" target="_blank"><?php echo $rowDetail['kkf']; ?></a></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Disburst Januari</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["jan"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Disburst Februari</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["feb"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Disburst Maret</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["mar"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Disburst April</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["apr"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Disburst Mei</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["mei"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Disburst Juni</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["jun"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Disburst Juli</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["jul"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Disburst Agustus</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["agu"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Disburst September</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["sep"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Disburst Oktober</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["okt"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Disburst November</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["nov"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Disburst Desember</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["des"]; ?></div>
          </div>
    <!--
          <div class="row">
            <div class="col-md-5"><label>Status</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["status"]; ?></div>
          </div>
    -->
          <div class="row">
            <div class="col-md-5"><label>Alasan</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["alasan"]; ?></div>
          </div>
    
    </div>
</div>