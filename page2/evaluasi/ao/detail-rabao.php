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
WHERE status = '6' AND newdetailanggaran.kodedetail = '$detail'");

$rowDetail     = mysql_fetch_array($sqldetail);

$sql = mysql_query("SELECT 
newdetailanggaran.*, 
headeranggaran.*
FROM newdetailanggaran
INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid
WHERE status = '3' AND newdetailanggaran.randomid = '$rowDetail[randomid]'");

$sqlA = mysql_query("SELECT 
newdetailanggaran.*, 
headeranggaran.*
FROM newdetailanggaran
INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid
WHERE status = '4' AND newdetailanggaran.randomid = '$rowDetail[randomid]'");

$sqlB = mysql_query("SELECT 
newdetailanggaran.*, 
headeranggaran.*
FROM newdetailanggaran
INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid
WHERE status = '6' AND newdetailanggaran.randomid = '$rowDetail[randomid]'");
?>
<div class="row">
    
    <!-- <div class="col-md-3">
        <img src="<?php echo $rowDetail["images"] == "" ? "images/no-images.png" : "".$rowDetail["images"] ?>" width="188" height="272" class="img-responsive img-rounded center-block" />
        <p class="text-center"><?php echo $rowDetail["images"]; ?></p>
    </div> -->
    <div class="col-md-9">
    <!--
            <div class="row">
              <div class="col-md-5"><label>Kode Anggaran</label></div>
              <div class="col-md-1"> : </div>
              <div class="col-md-2"><?php echo $rowDetail["kodeanggaran"]; ?></div>
            </div>
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
    -->
          <div class="row">
            <div class="col-md-5"><label>No. Usulan</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["nousulan"]; ?></div>
          </div>
          
          <div class="row">
            <div class="col-md-5"><label>No. Purchase Request (PR)</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["nopr"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>No. WBS</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["nmrwbs"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Tanggal Usulan</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php if($rowDetail["tartglmulai"]=="0000-00-00"){ }else{  echo tglindonesia($rowDetail["tartglmulai"]); } ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Uraian Kegiatan</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["uraiankegiatan"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Jenis Anggaran</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["jenis"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Prioritas</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["prioritas"]; ?></div>
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
    </div>
</div>
<div class="panel-body">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="datatabel">
            <thead>
                <tr>
                  <th class="text-center" width="1%">Vol. Jasa </th>
                  <th class="text-center" width="1%">Vol. Material </th>
                  <th class="text-center" width="1%">Harga Satuan Jasa </th>
                  <th class="text-center" width="1%">Harga Satuan Meterial </th>
                  <th class="text-center"width="1%">Status</th>
                </tr>
            </thead>
            <tbody>
            <?php
                                            while($row=mysql_fetch_array($sql))
                            				{
                            				?>
                            					<tr>
                                                    <td class="text-center"><?php echo $row['volumejasa'];?></td>
                                                    <td class="text-center"><?php echo $row['volumematerial'];?></td>
                                                    <td><?php echo "Rp ".number_format($row['hrgsatuanjasa'],0,'','.'); ?></td>
                                                    <td><?php echo "Rp ".number_format($row['hrgsatuanmaterial'],0,'','.'); ?></td>
                                                    <!--
                                                    <td>
                                                        <?php $a = $row['volumematerial']*$row['hrgsatuanmaterial'];
                                                        echo "Rp ". number_format($a); ?>
                                                    </td>
                                                    <td>
                                                        <?php $b = $row['volumejasa']*$row['hrgsatuanjasa'];
                                                        echo "Rp ". number_format($b); ?>
                                                    </td>
                                                    -->
                                                    <td>
                                                    <?php if ($row['status'] == '2') {echo "Reject";}
                                                    else if ($row['status'] == '3') {echo "Terevaluasi";}
                                                    ?></td>
                                                </tr>
        <?php } ?>
                           
        <?php
                                            while($row=mysql_fetch_array($sqlA))
                            				{
                            				?>
                            					<tr>
                                                    <td class="text-center"><?php echo $row['volumejasa'];?></td>
                                                    <td class="text-center"><?php echo $row['volumematerial'];?></td>
                                                    <td><?php echo "Rp ".number_format($row['hrgsatuanjasa'],0,'','.'); ?></td>
                                                    <td><?php echo "Rp ".number_format($row['hrgsatuanmaterial'],0,'','.'); ?></td>
                                                    <!--
                                                    <td>
                                                        <?php $a = $row['volumematerial']*$row['hrgsatuanmaterial'];
                                                        echo "Rp ". number_format($a); ?>
                                                    </td>
                                                    <td>
                                                        <?php $b = $row['volumejasa']*$row['hrgsatuanjasa'];
                                                        echo "Rp ". number_format($b); ?>
                                                    </td>
                                                    -->
                                                    <td>
                                                    <?php if ($row['status'] == '3') {echo "Terevaluasi";}
                                                    else if ($row['status'] == '4') {echo "Penetapan";}
                                                    ?></td>
                                                </tr>
        <?php } ?>
        
        <?php
                                            while($row=mysql_fetch_array($sqlB))
                            				{
                            				?>
                            					<tr>
                                                    <td class="text-center"><?php echo $no;?></td>
                                                    <td class="text-center"><?php echo $row['volumejasa'];?></td>
                                                    <td class="text-center"><?php echo $row['volumematerial'];?></td>
                                                    <td><?php echo "Rp ".number_format($row['hrgsatuanjasa'],0,'','.'); ?></td>
                                                    <td><?php echo "Rp ".number_format($row['hrgsatuanmaterial'],0,'','.'); ?></td>
                                                    <!--
                                                    <td>
                                                        <?php $a = $row['volumematerial']*$row['hrgsatuanmaterial'];
                                                        echo "Rp ". number_format($a); ?>
                                                    </td>
                                                    <td>
                                                        <?php $b = $row['volumejasa']*$row['hrgsatuanjasa'];
                                                        echo "Rp ". number_format($b); ?>
                                                    </td>
                                                    -->
                                                    <td>
                                                    <?php if ($row['status'] == '6') {echo "Approve (RAB)";}
                                                    else if ($row['status'] == '8') {echo "Tervaluasi (RAB)";}
                                                    ?></td>
                                                </tr>
        <?php } ?>
                                    </tbody>
        </table>
    </div>
</div>