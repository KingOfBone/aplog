<?php
$idA = mysql_real_escape_string(trim($_GET["tambah-penyerapan-ao"]));
$sqlA= mysql_query("SELECT 
headeranggaran.*,
newdetailanggaran.randomid,
newdetailanggaran.kodedetail,
realisasi.nokontrak,
pembayaran.*
from newdetailanggaran
inner join pembayaran on newdetailanggaran.randomid = pembayaran.randomid != ''
inner join headeranggaran on newdetailanggaran.randomid = headeranggaran.randomid
inner join realisasi on newdetailanggaran.randomid = realisasi.randomid
where newdetailanggaran.status = '9' and newdetailanggaran.randomid =  '$idA'");

$sqlB= mysql_query("SELECT *,(SELECT uraiankegiatan from headeranggaran b where a.randomid=b.randomid) 
as uraiankegiatan FROM realisasi a where randomid = '$idA'");
//if(mysql_num_rows($sqlA)==0);
$rowB = mysql_fetch_array($sqlB);
?>

<div id="wrapper">
        <!-- /. NAV SIDE  -->
       <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Input Penyerapan AO</h2>
                        <hr />
                    </div>
                </div>
                <!-- /. ROW  -->
           <div class="row">
                <div class="col-md-10">
                    <?php if(isset($_GET["sukseshapus"])){?>
                                     <div class="alert alert-success">Data Berhasil Di Hapus...
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                                     </div>
                                     <?php }else if(isset($_GET["suksesedit"])){ ?>
                                     <div class="alert alert-success">Data Berhasil Di Ubah...
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                                     </div>
                                     <?php }else if(isset($_GET["suksesbalaskomen"])){ ?>
                                     <div class="alert alert-success">Komentar Berhasil Di balas...
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                                     </div>
                                     <?php }else if(isset($_GET["suksestambah"])){?>
                                     <div class="alert alert-success" id="alertupload">Data  berhasil Ditambah,
                                     <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                                     </div>
                                    <?php } ?>
                </div>
                <?php $query1 = mysql_fetch_array(mysql_query("SELECT SUM(jmlpym) as totalpenyerapan FROM `pembayaran` WHERE randomid = '$idA'"));?>
                <?php if ($query1["totalpenyerapan"] < $rowB["nilaikontrak"]) { ?>
                <div class="col-md-2">
                    <a href="index.php?form-penyerapan-ao=<?php echo $idA;?>" type="submit" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-plus"></i>Tambah Penyerapan</a>
                    <br /><br />
                </div>
                <?php } ?>
           <div class="col-lg-6">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="col-md-4"><label>Nama Pekerjaan</label></div>
                            <div class="col-md-7">
                                <textarea class="form-control" disabled="" rows="3" cols="5" type="text" value="<?php  ?>" ><?php echo $rowB["uraiankegiatan"] ;?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="col-md-4"><label>Terkontrak</label></div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" disabled="" id="kontrak" onkeyup="onkontrak();" value="<?php echo "Rp ". number_format($rowB["nilaikontrak"]); ?>" />
                            </div>
                        </div>
                    </div>
                </div>
                <?php $query1 = mysql_fetch_array(mysql_query("SELECT SUM(jmlpym) as totalpenyerapan FROM `pembayaran` WHERE randomid = '$idA'"));?>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="col-md-4"><label>Total Penyerapan</label></div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" disabled="" id="serapan" onkeyup="onserapan();" value="<?php echo "Rp ". number_format ($query1["totalpenyerapan"]) ?>" />
                            </div>
                        </div>
                    </div>
                </div>
           </div>
           <!--
           <div class="col-lg-6">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-9">
                        <div class="col-md-4"><label>Kontrak</label></div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" disabled="" id="totalkontrak" onkeyup="totalkontrak();" value="<?php echo "Rp ". number_format($rowB["nilaikontrak"]); ?>" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-9">
                        <div class="col-md-4"><label>Serapan</label></div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" disabled="" id="totalserapan" onkeyup="totalserapan();" value="<?php echo "Rp ". number_format ($query1["totalpenyerapan"]) ?>" />
                            </div>
                        </div>
                    </div>
                </div>
           </div>
           -->
           </div>
           <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Tabel Input Penyerapan AO
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <br />
                                <table class="table table-striped table-bordered table-hover" id="datatabel">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="2%">No</th>
                                            <th class="text-center" width="6%">No. MIGO</th>
                                            <th class="text-center" width="8%">Jumlah Penyerapan</th>
                                            <th class="text-center" width="8%">Tahap</th>
                                            <th class="text-center" width="8%">Tanggal Penyerapan</th>
                                            <th class="text-center" width="3%">Aksi</th>
                               			</tr>
                                    </thead>
                                    <tbody>
                                    <?php
                            				$no=1;
                            				while($rowA=mysql_fetch_array($sqlA)) 
                                            {    
                            				?>
                            					<tr>
                                                    <td class="text-center"><?php echo $no; ?></td>
                                                    <td class="text-center"><?php echo $rowA["nomigo"];?></td>
                                                    <td><?php echo "Rp ".number_format ($rowA["jmlpym"]);?></td>
                                                    <td class="text-center"><?php echo $rowA["tahap"];?></td>
                                                    <td class="text-center"><?php echo tglindonesia ($rowA["tglpym"]);?></td>   
                                                    <td class="text-center">
                                                    <!--<a title="edit" href="index.php?update-penyerapan-ao=<?php echo $rowA["kodepym"]?>&<?php echo $rowA["randomid"]?>" type="button"><i class="fa fa-pencil-square-o fa-2x"></i></a>-->
                                                         <?php $delete = mysql_query("SELECT * FROM pembayaran WHERE kodepym = '".$rowA['kodepym']."'");
                                                         $rowC = mysql_fetch_array($delete);?>
                                                         <a title="delete" href="#" id="delete-penyerapan-ao=<?php echo $rowC["kodepym"]?>" class="delete">
                                                            <i class="fa fa-trash-o fa-2x"></i>
                                                         </a>
                                                    </td>
                            					</tr>
                            				<?php $no++; } ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                    <!--End Advanced Tables -->
                </div>
            </div>

        </div>
       </div>
    </div>
<!-- confirm dell -->
<script src="assets/confirmdell/js/script.js"></script>
<!-- DATA TABLE SCRIPTS -->
    <script src="assets/datatables/jquery.dataTables.js"></script>
    <script src="assets/datatables/dataTables.bootstrap.js"></script>
    <script>
    $(document).ready( function () {
      $('#datatabel').dataTable( {
        "paging":   true,
        "ordering": false,
        "bInfo": false,
        "dom": '<"pull-left"f><"pull-right"l>tip'
      } );
    } );

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
    function onserapan() {
      var nserapan = document.getElementById('serapan').value;
      var result = parseInt(nserapan);
      
      document.getElementById('totalserapan').value = result;     
}
    function onkontrak() {
      var nkontrak = document.getElementById('kontrak').value;
      var result = parseInt(nkontrak);
      
      document.getElementById('totalkontrak').value = result;     
}

$(document).ready(function() {
   $('input').change(function(e) {
        var kon = parseInt($('#totalkontrak').val());
        var ser = parseInt($('#totalserapan').val());
        $(':button[type="submit"]').prop('disabled', false);
        
        if(ser > kon){
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
            <h4 class="modal-title" style="text-align:center; ">Nilai penyerapan melebihi Nilai kontrak</h4>
          </div>

          <div class="modal-footer bg-warning" style="margin:0px; border-top:0px; ">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>
    
                                                                            