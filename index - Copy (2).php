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
	include    "page/beranda/kumpulan_menu.php";
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
			
			$qs = strtolower(array_keys($_GET)[0]);
			$menu = explode('-', $qs)[0];
			$aksi = !empty(explode('-', $qs)[1]) ? explode('-', $qs)[1] : null;
			$get_value = !empty($_GET[$menu]) ? $_GET[$menu] : null; 
			//echo "get_value=$get_value";
			
			if(in_array($menu, $daftar_menu)) {				
				if($menu == 'dashboard') {
					$filename = "page/dashboard/dashboard.php";
				}
				else {
					if($menu != 'laporan_unit') {
						if(strpos($menu, 'lihat') !== false && isset($get_value))
							$filename = "page/$menu/".$menu."_lihat_detail.php";				
						if(strpos($menu, 'tambah') !== false && isset($get_value))
							$filename = "page/$menu/".$menu."_tambah.php";				
						/* else if(strpos($menu, 'lihat') !== false && isset($_GET["idp"]))
							$filename = "page/$menu/".$menu."_lihat.php";				
						 */else 
							$filename = "page/$menu/".$menu."_$aksi.php";
					}
					else
						$filename = "page/laporan/".$menu."_$aksi.php";					
				}
				
				if(file_exists($filename)) {
					include "$filename";
				}
				else
					include "page/notfound.php";
			}
			else
				include "page/notfound.php";
			
			echo "filename=$filename";
        ?>        
    </div>
    <!-- /. WRAPPER  -->
		<!-- menu -->
        <div class="menu">
          <nav class="nav-main">
            <div class="nav-container">

                <?php
					$nama = strtolower($_SESSION["nama"]);
					$jenisuser = strtolower($_SESSION["jenisuser"]);
					
					menu_sa($nama);
					
					if($jenisuser=="mbren") {					
						menu_data_master();
						menu_laporan();
					}
                ?>
				
				<br><br><br>
				<li>
					<a  href="../portal/index.php?dashboard"><i class="fa fa-home fa-2x"></i> Kembali ke PORTAL</a>
				</li>

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
