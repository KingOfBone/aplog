<?php
$no = 0;

$sqlth = mysql_fetch_array(mysql_query("SELECT * from headeranggaran ORDER BY 'date'"));
$d = DATE('Y', strtotime($sqlth['tartglmulai']));

if(isset($_POST['kode'])) {
// deklarasikan variabel
	$kode      = $_POST['kode'];
	$status    = $_POST['status'];
    $alasan    = $_POST['alasan'];
    
    mysql_query("UPDATE newdetailanggaran SET status='$status', tglapprove=now(), alasan='$alasan', approvemapp='1' WHERE kodedetail = '$kode'");
	header("location: index.php?monitor-rab-ai");
}
?>
<body>
<form name="bulk_action_form" action="form-app-rab.php" method="post" onSubmit="return delete_confirm();"/>
<div id="wrapper">
        <!-- /. NAV SIDE  -->
       <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Approval RAB AI</h2>
                        <hr />
                    </div>
                </div>
                <!-- /. ROW  -->
           <div class="row">
                <div class="col-md-10">
                    <?php if(isset($_GET["sukseshapus"])){?>
                                     <div class="alert alert-success">Data berhasil di hapus...
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
           </div>
           <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Tabel Approval RAB AI
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="datatabel1">
                                <!--
                                <div class="col-md-12 text-center">
                                    <span><strong>&nbsp;Tahun Anggaran : <?php echo $d; ?> </strong></span> 
                                </div>  
                                -->
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="1%">No</th>
                                            <th class="text-center" width="4%">Uraian Kegiatan</th>
                                            <th class="text-center" width="3%">No. Usulan</th>
                                            <th class="text-center" width="3%">No. WBS</th>
                                        <!--
                                            <th class="text-center" width="1%">Vol. Jasa</th>
                                            <th class="text-center" width="1%">Vol. Material</th>
                                            <th class="text-center" width="3%">Harga Satuan Jasa</th>
                                            <th class="text-center" width="4%">Harga Satuan Meterial</th>
                                        -->
                                            <th class="text-center" width="2%">Jml. Biaya Jasa</th>
                                            <th class="text-center" width="3%">Jml. Biaya Material</th>
                                            
                                            <th class="text-center" width="2%">Status</th>
                                            
                    						<th class="text-center" width="1%">Aksi</th>
                               			</tr>
                                    </thead>
                                    <tbody>
                                    <?php	
                                        $data_kontrol = mysql_fetch_array(mysql_query("select * from kontrol"));
                                        $status_anggaran =  $data_kontrol["status"];

                                        $sqlangg = mysql_query("SELECT 
                                            newdetailanggaran.*, 
                                            headeranggaran.*
                                            FROM newdetailanggaran
                                            INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid
                                            WHERE headeranggaran.kodebidang = '$_SESSION[kodebidang]' AND status IN ('5','6','7','8')
                                            AND headeranggaran.jenis = 'AI' AND year(headeranggaran.tartglmulai) = $data_kontrol[tahun]
                                            ");
                                        
                                                $num = mysql_num_rows($sqlangg);
                                                while($permintaan = mysql_fetch_array($sqlangg)) {
                                                $no++;
                                    ?>
                                        <tr>
                                                    <td class="text-center"><?php echo $no; ?></td>
                                                    <td ><?php echo $permintaan['uraiankegiatan'];?></td>
                                                    <td class="text-center"><?php echo $permintaan['nousulan'];?></td>
                                                    <td class="text-center"><?php echo $permintaan['nmrwbs'];?></td>
                                                <!--
                                                    <td class="text-center"><?php echo $permintaan['volumejasa'];?></td>
                                                    <td class="text-center"><?php echo $permintaan['volumematerial'];?></td>
                                                    <td class="text-right"><?php echo "Rp ".number_format($permintaan['hrgsatuanjasa']);?></td>
                                                    <td class="text-right"><?php echo "Rp ".number_format($permintaan['hrgsatuanmaterial']);?></td>
                                                -->
                                                    <td class="text-right">
                                                        <?php $b = $permintaan['volumejasa']*$permintaan['hrgsatuanjasa'];
                                                        echo "Rp ". number_format($b); ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php $a = $permintaan['volumematerial']*$permintaan['hrgsatuanmaterial'];
                                                        echo "Rp ". number_format($a); ?>
                                                    </td>
                                                    <?php
                                                    $sqlstatus = mysql_fetch_array(mysql_query ("SELECT
                                                            headeranggaran.*,
                                                            newdetailanggaran.*,
                                                            newdetailanggaran.randomid
                                                            FROM newdetailanggaran 
                                                            INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid
                                                            WHERE headeranggaran.kodebidang = '$_SESSION[kodebidang]' AND newdetailanggaran.status IN('5','6','7','8')
                                                            AND newdetailanggaran.randomid = '".$permintaan['randomid']."' AND headeranggaran.jenis = 'AI'
                                                            ORDER BY newdetailanggaran.status DESC")); 
                                                            {
                                                    ?>
                                                    <td class="text-center">
                                                        <?php   
                                                                if ($sqlstatus['status'] == '5') {echo "RAB";}
                                                                else if ($sqlstatus['status'] == '6') {echo "Reject RAB";}
                                                                else if ($sqlstatus['status'] == '7') {echo "Approve RAB";}
                                                                else if ($sqlstatus['status'] == '8') {echo "Terevaluasi RAB";}
                                                        ?>
                                                    </td>
                                                    <?php } ?>
                                                    <td class="text-center">
                                                           <?php if ($permintaan['status'] == '5' OR $permintaan['status'] == '7' OR $permintaan['status'] == '8') {?>
                                                               <a title="detail" href="#" class="detail" data-id="<?php echo $permintaan['kodedetail']; ?>" role="button" data-toggle="modal fade">
                                                                   <i class="fa fa-search-plus" aria-hidden="true"></i>
                                                               </a>
                                                            <?php } ?>
                                                           
                                                        <?php if ($permintaan['status'] == '5' OR $permintaan['status'] == '8') { ?>
                                                           <a title="approve" href="#" class="approve" id="<?php echo $permintaan['kodedetail']; ?>" 
                                                               role="button" data-toggle="modal"><i class="fa fa-sign-in fa-2x"></i></a>
                                                        <?php } ?>
                                                        <!--
                                                        <?php $del1 = mysql_query("SELECT * FROM newdetailanggaran WHERE status IN ('6','7') AND randomid = '".$permintaan['randomid']."'");
                                                              $rowC = mysql_fetch_array($del1);?>
                                                        <a title="delete" href="#" id="del-apprab-ai=<?php echo $rowC["kodedetail"]?>" class="delete"><i class="fa fa-trash-o fa-2x"></i></a>
                                                        -->
                                                    </td>
                            					</tr>
                            				<?php }  ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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
      $('#datatabel1').dataTable( {
        "paging":   true,
        "ordering": false,
        "bInfo": false,
        "dom": '<"pull-left"f><"pull-right"l>tip'
      } );
    } );

    </script>
</form>
<script type="text/javascript">
$(".close-alert").fadeTo(3000, 500).slideUp(2000, function(){
    $(".close-alert").alert('close');
});
</script>
<!-- DATA TABLE SCRIPTS --> 
<script src="assets/datatables/jquery.dataTables.js"></script>
<script src="assets/datatables/dataTables.bootstrap.js"></script>
<script>
 $(document).on('click','.detail',function(e){
    e.preventDefault();
    $("#detail").modal('show');
    $.post('page/request/detail-rab-ai.php',
    {id:$(this).attr('data-id')},
    function(html){
    $(".modal-body").html(html);
    }   
    );
 });
 $(document).on('click','.approve',function(e){
    e.preventDefault();
    $("#approve").modal('show');
    $.post('page/request/form-app-rab.php',
    {id:$(this).attr('id')},
    function(html){
    $(".modal-body").html(html).show();
    }   
    );
 });

 $(function() {
    //twitter bootstrap script
    var status = $('input:text[name=status]').val();
    $("#simpan-approve").click(function(){
        $.ajax({
                type: "POST",
                url: "page/request/form-app-rab.php",
                data: $('form#form_approve').serialize(),
                success: function(msg){
                    $("#approve").modal('hide');
                    alert("Data Berhasil Di Ubah");
                      location.reload();
                },
                error: function(){
                    alert("failure");
                }
       });
    });
});
</script>
</body>
<div id="detail" class="modal fade">
  <div class="modal-dialog ">
    <div class="modal-content wrap-dialog" style="border-radius: 0;">
      <!-- dialog body -->
       <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-center">Detail Usulan RAB AI</h4>
       </div>
      <div class="modal-body"></div>
      <!-- dialog buttons -->
      <div class="modal-footer">
      <button class="btn btn-default"data-dismiss="modal" aria-hidden="true">Tutup</button>
    </div>
  </div>
</div>
</div>
<div id="approve" class="modal fade">
  <div class="modal-dialog ">
    <div class="modal-content wrap-dialog" style="border-radius: 0;">
      <!-- dialog body -->
       <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-center">Approval RAB AI</h4>
       </div>
      <div class="modal-body" style="overflow: hidden;"></div>
      <!-- dialog buttons 
      <div class="modal-footer">
		<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Batal</button>
	</div>-->
  </div>
</div>
</div>