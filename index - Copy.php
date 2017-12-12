<?php
    ob_start();
	session_start();
	/* session_destroy();
	die(); */
	

    date_default_timezone_set("Asia/Jakarta");
	
	//echo $_SESSION["kodelogin"]; die();
	if( ! isset($_SESSION["kodelogin"])) {
		header("location:login.php");
		die();
	}
	
	include    "page/beranda/headadmin.php";
    include    "page/beranda/menuAdmin.php";
    include    "page/beranda/menuUser.php";
    include    "page/beranda/menuMAPP.php";
    include    "page/beranda/menuAssmen.php";
    include    "page/beranda/menuKI.php";
    include    "page/beranda/menubk-ki.php";
    include     "config/koneksi.php";
    include     "config/utility.php";
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php echo headadmin(); ?>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
<script type="text/javascript" >
$(document).ready(function()
{
$("#notificationLink").click(function()
{
$("#notificationContainer").fadeToggle(300);
$("#notification_count").fadeOut("slow");
return false;
});

//Document Click
$(document).click(function()
{
$("#notificationContainer").hide();
});
//Popup Click
$("#notificationContainer").click(function()
{
return false
});

});

$( "" ).click(function( eventObject ) {
    var elem = $( this );
    if ( elem.attr( "href" ).match( /evil/ ) ) {
        eventObject.preventDefault();
        elem.addClass( "evil" );
    }
});

</script>
<div class="main">
  <header class="header-main">
  <br /><br />
    <nav class="navbar navbar-default navbar-cls-top navbar-fixed-top" role="navigation" style="margin-bottom: 0">

    <div class="page-wrapper">
            <div class="navbar-header">
                <button class="button-nav-toggle navbar-toggle"  >
                <span class="icon">&#9776;</span> Menu</button>
                <a href="index.php?dashboard">
                    <img class="img-responsive" src="images/logomonarki.png" />
                </a>
            </div>

       <!--
        <div style="color: white; padding: 12px 11px 5px; float: right;font-size: 16px;">
        <strong style="padding: 2px 0;"><?php echo $_SESSION["level"];?></strong> &nbsp;
        <a href="#" class="btn btn-danger square-btn-adjust logoutK"><i class="fa fa-power-off"></i></a>
        <button class="button-nav-toggle hdbtn"><span class="icon">&#9776;</span></button>
        </div>
     -->

     <ul class="nav navbar-top-links navbar-right">

             <li class="dropdown">
                    <a  title="Panel Pengaturan Akun" class="dropdown-toggle putih" data-toggle="dropdown" href="#">
                        <strong style="padding: 2px 0;">
                         Admin Kantor Induk
                        </strong> &nbsp;
                    </a>
                    <!--
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="index.php?password"><i class="fa fa-cogs"></i> Ganti Password</a>
                        </li>
                        <li>
                            <a href="#" class="logoutK"><i class="fa fa-power-off"></i> Log out</a>
                        </li>
                    </ul>
                    -->
                    <!-- /.dropdown-user -->
                </li>
             <li class="dropdown">
                <button title="Tombol Menu" class="button-nav-toggle hdbtn" style="float: none;"><span class="icon">&#9776;</span></button>
             </li>
     </ul>


 </div>
 </nav>

  </header>

    <div id="wrapper">
		<?php
            $daftar_menu = [
				'dashboard', 'merk', 'datamaster', 'apar', 
				'apar_unit', 'pengisian', 'pemeliharaan', 
				'pemakaian', 'laporan', 'laporan_unit'
			];
			
			$menu = strtolower(array_keys($_GET)[0]);
			
			if(in_array($menu, $daftar_menu)) {
				
				if($menu == 'dashboard') {
					$filename = "page/dashboard/dashboard.php";
				}
				else {
					if($menu != 'laporan_unit') {
						if($aksinyah == 'lihat' && isset($_GET["id"]))
							$filename = "page/$menu/".$menu."_lihat_detail.php";				
						else if($aksinyah == 'lihat' && isset($_GET["idp"]))
							$filename = "page/$menu/".$menu."_lihat.php";				
						else 
							$filename = "page/$menu/".$menu."_$aksinyah.php";
					}
					else
						$filename = "page/laporan/".$menu."_$aksinyah.php";					
				}
				
				if(file_exists($filename)) {
					include "$filename";
				}
				else
					include "page/notfound.php";
			}
			else
				include "page/notfound.php";
			
			
			
			if(isset($_GET["dashboard"])){ include "page/dashboard/index.php";}
            //dashboardKI
            else if (isset($_GET["dashboard-KI"])){include "page/dashboard/kiindex.php";}
            //data master
            else if (isset($_GET["fungsi"])){include "page/fungsi/data.php";}
            else if (isset($_GET["tambah-fungsi"])){include "page/fungsi/tambah.php";}
            else if (isset($_GET["update-fungsi"])){include "page/fungsi/update.php";}
            else if (isset($_GET["pos-anggaran"])){include "page/posanggaran/data.php";}
            else if (isset($_GET["tambah-pos-anggaran"])){include "page/posanggaran/tambah.php";}
            else if (isset($_GET["update-pos-anggaran"])){include "page/posanggaran/update.php";}
            else if (isset($_GET["satuan"])){include "page/satuan/data.php";}
            else if (isset($_GET["tambah-satuan"])){include "page/satuan/tambah.php";}
            else if (isset($_GET["update-satuan"])){include "page/satuan/update.php";}
            //proses usulan anggaran
            else if (isset($_GET["ai"])){include "page/ai/data.php";}
            else if (isset($_GET["tambah-ai"])){include "page/ai/tambah.php";}
            else if (isset($_GET["update-ai"])){include "page/ai/update.php";}
            else if (isset($_GET["ao"])){include "page/ao/data.php";}
            else if (isset($_GET["tambah-ao"])){include "page/ao/tambah.php";}
            else if (isset($_GET["update-ao"])){include "page/ao/update.php";}
            //proses approve mapp
            else if (isset($_GET["monitor-approve"])) require_once("page/request/pro-approve.php");
            else if (isset($_GET["form-monitorapprove"])) require_once("page/request/pro-approve-form.php");
            else if (isset($_GET["monitor-approve-ao"])) require_once("page/request/pro-approve-ao.php");
            else if (isset($_GET["form-monitorapprove-ao"])) require_once("page/request/pro-approve-form-ao.php");
            //proses evaluasi assman
            else if (isset($_GET["monitor-evaluasi-ai"])){include "page/evaluasi/ai/pro-updated-ai.php";}
            else if (isset($_GET["form-monitorevaluasi-ai"])) require_once("page/evaluasi/ai/pro-updated-form-ai.php");
            else if (isset($_GET["detail-evaluasi-ai"])) require_once("page/evaluasi/ai/detail-ai.php");
            else if (isset($_GET["monitor-evaluasi-ao"])){include "page/evaluasi/ao/pro-updated-ao.php";}
            else if (isset($_GET["form-monitorevaluasi-ao"])) require_once("page/evaluasi/ao/pro-updated-form-ao.php");
            else if (isset($_GET["detail-evaluasi-ao"])) require_once("page/evaluasi/ao/detail-ao.php");
            //proses penetapan KI
            else if (isset($_GET["data-penetapan-ai"])){include "page/penetapan/ai/belum-penetapan-ai.php";}
            else if (isset($_GET["penetapan-ai"])){include "page/penetapan/ai/penetapan.php";}
            else if (isset($_GET["update-penetapan"])){include "page/penetapan/ai/update-penetapan.php";}
            else if (isset($_GET["data-penetapan-ao"])){include "page/penetapan/ao/belum-penetapan-ao.php";}
            else if (isset($_GET["penetapan-ao"])){include "page/penetapan/ao/penetapan-ao.php";}
            //data WBS
            else if (isset($_GET["data-wbs"])){include "page/wbs/data.php";}
            else if (isset($_GET["tambah-wbs"])){include "page/wbs/tambah.php";}
            //kontrol
            else if (isset($_GET["kontrol"])){include "page/kontrol.php";}
            //rekap penetapan usulan
            else if (isset($_GET["rekap-usul-ai"])){include "page/rekap/ai/rekap-tetapan-ai.php";}
            else if (isset($_GET["rekap-usul-ao"])){include "page/rekap/ao/rekap-tetapan-ao.php";}
            //input RAB user
            else if (isset($_GET["rab-ai"])){include "page/rab/ai/data-penetapan.php";}
            else if (isset($_GET["tambah-rab-ai"])){include "page/rab/ai/tambah.php";}
            else if (isset($_GET["update-rab-ai"])){include "page/rab/ai/update.php";}
            else if (isset($_GET["rab-ao"])){include "page/rab/ao/data-penetapan-ao.php";}
            else if (isset($_GET["tambah-rab-ao"])){include "page/rab/ao/tambah.php";}
            else if (isset($_GET["update-rab-ao"])){include "page/rab/ao/update.php";}
            //approve RAB mapp
            else if (isset($_GET["monitor-rab-ai"])) require_once("page/request/pro-approve-rab.php");
            else if (isset($_GET["approve-rab"])) require_once("page/request/form-app-rab.php");
            else if (isset($_GET["monitor-rab-ao"])) require_once("page/request/pro-approve-rab-ao.php");
            else if (isset($_GET["approve-rabao"])) require_once("page/request/form-app-rabao.php");
            //evaluasi RAB assman
            else if (isset($_GET["monitor-eva-rabai"])){include "page/evaluasi/ai/pro-eva-rabai.php";}
            else if (isset($_GET["form-moneva-rabai"])) require_once("page/evaluasi/ai/form-eva-rabai.php");
            else if (isset($_GET["detail-eva-rabai"])) require_once("page/evaluasi/ai/detail-eva-rabai.php");
            else if (isset($_GET["monitor-eva-rabao"])){include "page/evaluasi/ao/pro-eva-rabao.php";}
            else if (isset($_GET["form-moneva-rabao"])) require_once("page/evaluasi/ao/form-eva-rabao.php");
            else if (isset($_GET["detail-eva-rabao"])) require_once("page/evaluasi/ao/detail-eva-rabao.php");
            //rekapan anggaran
            else if (isset($_GET["data-rekap-ai"])){include "page/rekap/ai/rekap-ai.php";}
            else if (isset($_GET["data-rekap-ao"])){include "page/rekap/ao/rekap-ao.php";}
            //input realisasi user
            else if (isset($_GET["realisasi"])){include "page/realisasi/ai/data.php";}
            else if (isset($_GET["tambah-realisasi-ai"])){include "page/realisasi/ai/tambah.php";}
            else if (isset($_GET["update-realisasi-ai"])){include "page/realisasi/ai/update.php";}
            else if (isset($_GET["realisasi-ao"])){include "page/realisasi/ao/data.php";}
            else if (isset($_GET["tambah-realisasi-ao"])){include "page/realisasi/ao/tambah.php";}
            else if (isset($_GET["update-realisasi-ao"])){include "page/realisasi/ao/update.php";}
            //input penyerapan user
            else if (isset($_GET["penyerapan"])){include "page/penyerapan/ai/data.php";}
            else if (isset($_GET["tambah-penyerapan-ai"])){include "page/penyerapan/ai/tab-serapan-ai.php";}
            else if (isset($_GET["form-penyerapan-ai"])){include "page/penyerapan/ai/tambah.php";}
            else if (isset($_GET["update-penyerapan-ai"])){include "page/penyerapan/ai/update.php";}
            else if (isset($_GET["penyerapan-ao"])){include "page/penyerapan/ao/data.php";}
            else if (isset($_GET["tambah-penyerapan-ao"])){include "page/penyerapan/ao/tab-serapan-ao.php";}
            else if (isset($_GET["form-penyerapan-ao"])){include "page/penyerapan/ao/tambah.php";}
            else if (isset($_GET["update-penyerapan-ao"])){include "page/penyerapan/ao/update.php";}
            //laporan usulan
            else if (isset($_GET["lap-ai"])){include "page/lap/lapai.php";}
            else if (isset($_GET["lap-ao"])){include "page/lap/lapao.php";}
            //laporan realisasi
            else if (isset($_GET["lap-realisasi-ai"])){include "page/lap/lap-rea-ai.php";}
            else if (isset($_GET["lap-realisasi-ao"])){include "page/lap/lap-rea-ao.php";}
            //laporan penyerapan
            else if (isset($_GET["lap-serapan-ai"])){include "page/lap/lap-ser-ai.php";}
            else if (isset($_GET["lap-serapan-ao"])){include "page/lap/lap-ser-ao.php";}
            //laporan KI
            else if (isset($_GET["report-ai"])){include "page/lapki/lapai.php";}
            else if (isset($_GET["report-ao"])){include "page/lapki/lapao.php";}
            else if (isset($_GET["report-realisasi-ai"])){include "page/lapki/lap-rea-ai.php";}
            else if (isset($_GET["report-realisasi-ao"])){include "page/lapki/lap-rea-ao.php";}
            else if (isset($_GET["report-serapan-ai"])){include "page/lapki/lap-ser-ai.php";}
            else if (isset($_GET["report-serapan-ao"])){include "page/lapki/lap-ser-ao.php";}
            //frame kko & kkf
            else if (isset($_GET["fr"])){include "foto/fr.php";}
			
			else if (isset($_GET["petunjuk"])){include "page/petunjuk.php";}
            
            else{include "page/notfound.php";}
        ?>
          <?php /* PAGE WRAPPER */ ?>
    </div>
     <!-- /. WRAPPER  -->
  <!-- menu -->
        <div class="menu">
          <nav class="nav-main">
            <div class="nav-container">

                <?php
                $jenisuser = 'mm';
                $level = 'mm';
                
                $_SESSION['nama']='mm';
                if($jenisuser=="mm")
                {
                    echo menumapp();
                    echo menuAssmen();
                    echo menuUs();
                }
                ?>

            </div>
          </nav>
        </div>
</div>

    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- konfirmasi -->
    <script src="assets/js/custom.js"></script>
    <!-- confirm -->

    <script src="assets/confirmdell/jquery.confirm/jquery.confirm.js"></script>
    <script src="assets/confirmdell/js/script2.js"></script>

</body>
</html>
<?php ob_end_flush(); ?>
