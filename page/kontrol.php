<?php
$data_th    = mysql_fetch_array(mysql_query("SELECT * FROM kontrol"));
?>
<script>
$(document).ready(function() {
$(".iconpre").hide();

    $('#simpan').click(function(){
        $(".iconpre").show(4000);
    });
});
</script>
<script>
    $(document).ready(function(){
       if ($("#status").val() == 'revisi'){
            $("#rev_div").show();
       }else{
            $("#rev_div").hide();
       }
       $("#status").on('change', function() {
            if ($(this).val() == 'revisi'){
                $("#rev_div").slideToggle();
            }else {
                $("#rev_div").slideUp();
            }
        });  
    });
   $(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
    
});
</script>
<div class="iconpre"></div>
<div>
<form id="validate-me-plz" name="formadmin" enctype="multipart/form-data" method="post" action="">
<div class="col-md-6">
    
    <input type="hidden" name="kode" value="<?php echo $data_th["status"]?>" />
    <br />
<strong><h2 align="left">FORM KONTROL ANGGARAN</h2></strong>
<hr />
        <div class="row">
            <div class="form-group">
                <div class="col-md-4"><strong>Tahun </strong></div>
                <div class="col-md-4">
                    <select name="tahun" class="form-control" required>
                        <option></option>
                            <?php
                            $thn_skrg = date("Y")-1;
                            $thn_kedpn= date("Y")+3;
                            for($thn_skrg; $thn_kedpn>=$thn_skrg; $thn_skrg++){
                            ?>
                            <option value="<?php echo $thn_skrg ;?>" <?php if($data_th["tahun"]==$thn_skrg){?> selected="" <?php } ?>><?php echo $thn_skrg ;?></option>
                            <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <br />
        <div class="row">
            <div class="form-group">
                <div class="col-md-4"><strong>Status Anggaran </strong></div>
                <div class="col-md-4">
                    <select id="status" name="status" class="form-control" required>
                        <option></option>
                        <option value="usulan" <?php if($data_th["status"]=="usulan"){?> selected="" <?php } ?>>Usulan</option>
                        <option value="pagu indikasi" <?php if($data_th["status"]=="pagu indikasi"){?> selected="" <?php } ?>>Pagu Indikasi</option>
                        <option value="penetapan" <?php if($data_th["status"]=="penetapan"){?> selected="" <?php } ?>>Penetapan</option>
                        <option value="revisi" <?php if($data_th["status"]=="revisi"){?> selected="" <?php } ?>>revisi</option>
                    </select>
                </div>
            </div>
        </div>
        <br />
        <div class="row">
            <div class="form-group">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                   <button name="simpan" id="simpan" class="btn btn-sm btn-primary" onclick = "if (! confirm('Yakin ingin mengubah status anggaran?')) return false;">Simpan</button>
                </div>
            </div>
        </div>
        <br />
</div>
<?php 
$sql_th = mysql_query("SELECT * FROM kontrol");
$row_th = mysql_fetch_array($sql_th);
?>
<div class="col-md-6">
<br />
<br />
<br />
<br />
<br />
    <table>
        <tr>
            <th class="text-left text-danger" style="font-size: 25px;" width='40%'>Status Anggaran</th>
            <td style="font-size: 20px;" width='5%'>:</td>
            <th class="text-left text-danger" style="font-size: 25px;" width='40%'><?php echo strtoupper($row_th["status"]);?></th>
        </tr>
        <tr>
            <th class="text-left text-danger" style="font-size: 25px;">Tahun</th>
            <td style="font-size: 20px;">:</td>
            <th class="text-left text-danger" style="font-size: 25px;"><?php echo strtoupper($row_th["tahun"]);?></th>
        </tr>
    </table>
    <br />
   <div class="row">
            <div class="form-group">
                <div class="col-md-8">
                     <?php if(isset($_GET["suksestambah"])){ ?>
                    <div class="alert alert-success close-alert" id="alertupload">Status Anggaran Berhasil di ubah,  
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                    </div>
                    <?php } ?>
                    
               </div>
            </div>
        </div>
</div>
</div>
</form>

<script>
$(".close-alert").fadeTo(3000, 500).slideUp(2000, function(){ $("#close-alert").alert('close'); });

  var checkbox = $(".checkbox").val();
  function cek_div(){
       if(checkbox.unchecked == true){
        alert("hay");
          checkbox.prop('checked', false);
           
             }
       
        };

$(document).ready(function(){
    $("#filter").keyup(function(){
 
        // Retrieve the input field text and reset the count to zero
        var filter = $(this).val(), count = 0;
 
        // Loop through the comment list
        $("nav ul li").each(function(){
 
            // If the list item does not contain the text phrase fade it out
            if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                $(this).fadeOut();
 
            // Show the list item if the phrase matches and increase the count by 1
            } else {
                $(this).show();
                count++;
            }
        });
 
        // Update the count
        var numberItems = count;
        $("#filter-count").text("Divisi yang ditampilkan = "+count);
    });
});
</script>
<?php
if(isset($_POST["simpan"])){
      
    $status = mysql_escape_string($_POST["status"]);
    $tahun  = mysql_escape_string($_POST["tahun"]);
    $kode  = mysql_escape_string($_POST["kode"]);
    //input dan update tahapan
        
        mysql_query("UPDATE kontrol SET status='$status', tahun='$tahun' where kode='1'");
        
        header("location:index.php?kontrol&suksestambah");
        }
?>