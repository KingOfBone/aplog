<?php
ob_start();
session_start();
date_default_timezone_set("Asia/Jakarta");
include "../config/koneksi.php";

if( ! isset($_SESSION["level"])) header("location:login.php?noakses");

if(isset($_GET["delete-ai"])){
    $idD = mysql_real_escape_string(trim($_GET["delete-ai"]));
    $idE = mysql_real_escape_string(trim($_GET["delete-ang"]));
    $idF = mysql_real_escape_string(trim($_GET["del-burst"]));
    
    mysql_query("DELETE FROM headeranggaran WHERE kodeanggaran ='$idE'") or die(mysql_error());
    mysql_query("DELETE FROM newdetailanggaran WHERE kodedetail ='$idD'") or die(mysql_error());
    mysql_query("DELETE FROM disburst WHERE kodedisburst ='$idF'") or die(mysql_error());
    header("location:../index.php?ai&sukseshapus");
}
/*
else if(isset($_GET["delete-ao"])){
    $idD = mysql_real_escape_string(trim($_GET["delete-ao"]));
    $idE = mysql_real_escape_string(trim($_GET["delete-ango"]));
    
    mysql_query("DELETE FROM headeranggaran WHERE kodeanggaran ='$idE'") or die(mysql_error());
    mysql_query("DELETE FROM newdetailanggaran WHERE kodedetail ='$idD'") or die(mysql_error());
    header("location:../index.php?ao&sukseshapus");
}
*/
else if(isset($_GET["delete-approve-ai"])){
    $idD = mysql_real_escape_string(trim($_GET["delete-approve-ai"]));
    
    mysql_query("DELETE FROM newdetailanggaran WHERE kodedetail ='$idD'") or die(mysql_error());
    header("location:../index.php?monitor-approve&sukseshapus");
}
/*
else if(isset($_GET["delete-approve-ao"])){
    $idD = mysql_real_escape_string(trim($_GET["delete-approve-ao"]));
    
    mysql_query("DELETE FROM newdetailanggaran WHERE kodedetail ='$idD'") or die(mysql_error());
    header("location:../index.php?monitor-approve-ao&sukseshapus");
}
*/
else if(isset($_GET["delete-evaluasi-ai"])){
    $idD = mysql_real_escape_string(trim($_GET["delete-evaluasi-ai"]));
    
    mysql_query("DELETE FROM newdetailanggaran WHERE kodedetail ='$idD'") or die(mysql_error());
    header("location:../index.php?monitor-evaluasi-ai&sukseshapus");
}
/*
else if(isset($_GET["delete-evaluasi-ao"])){
    $idD = mysql_real_escape_string(trim($_GET["delete-evaluasi-ao"]));
    
    mysql_query("DELETE FROM newdetailanggaran WHERE kodedetail ='$idD'") or die(mysql_error());
    header("location:../index.php?monitor-evaluasi-ai&sukseshapus");
}
*/
else if(isset($_GET["delblm-penetapan-ai"])){
    $idD = mysql_real_escape_string(trim($_GET["delblm-penetapan-ai"]));
    
    mysql_query("DELETE FROM newdetailanggaran WHERE kodedetail ='$idD'") or die(mysql_error());
    header("location:../index.php?belum-penetapan-ai&sukseshapus");
}
/*
else if(isset($_GET["delblm-penetapan-ao"])){
    $idD = mysql_real_escape_string(trim($_GET["delblm-penetapan-ao"]));
    
    mysql_query("DELETE FROM newdetailanggaran WHERE kodedetail ='$idD'") or die(mysql_error());
    header("location:../index.php?belum-penetapan-ao&sukseshapus");
}
*/
else if(isset($_GET["delete-wbs"])){
    $idD = mysql_real_escape_string(trim($_GET["delete-wbs"]));
    
    mysql_query("DELETE FROM wbs WHERE kodewbs ='$idD'") or die(mysql_error());
    header("location:../index.php?data-wbs&sukseshapus");
}
else if(isset($_GET["delete-rab-ai"])){
    $idD = mysql_real_escape_string(trim($_GET["delete-rab-ai"]));
    
    mysql_query("DELETE FROM newdetailanggaran WHERE kodedetail ='$idD'") or die(mysql_error());
    header("location:../index.php?rab-ai&sukseshapus");
}
else if(isset($_GET["delete-rab-ao"])){
    $idD = mysql_real_escape_string(trim($_GET["delete-rab-ao"]));
    
    mysql_query("DELETE FROM newdetailanggaran WHERE kodedetail ='$idD'") or die(mysql_error());
    header("location:../index.php?rab-ao&sukseshapus");
}
else if(isset($_GET["del-apprab-ai"])){
    $idD = mysql_real_escape_string(trim($_GET["del-apprab-ai"]));
    
    mysql_query("DELETE FROM newdetailanggaran WHERE kodedetail ='$idD'") or die(mysql_error());
    header("location:../index.php?monitor-rab-ai&sukseshapus");
}
else if(isset($_GET["del-apprab-ao"])){
    $idD = mysql_real_escape_string(trim($_GET["del-apprab-ao"]));
    
    mysql_query("DELETE FROM newdetailanggaran WHERE kodedetail ='$idD'") or die(mysql_error());
    header("location:../index.php?monitor-rab-ao&sukseshapus");
}
else if(isset($_GET["del-eva-rabai"])){
    $idD = mysql_real_escape_string(trim($_GET["del-eva-rabai"]));
    
    mysql_query("DELETE FROM newdetailanggaran WHERE kodedetail ='$idD'") or die(mysql_error());
    header("location:../index.php?monitor-eva-rabai&sukseshapus");
}
else if(isset($_GET["del-eva-rabao"])){
    $idD = mysql_real_escape_string(trim($_GET["del-eva-rabao"]));
    
    mysql_query("DELETE FROM newdetailanggaran WHERE kodedetail ='$idD'") or die(mysql_error());
    header("location:../index.php?monitor-eva-rabao&sukseshapus");
}
else if(isset($_GET["delete-realisasi-ai"])){
    $idD = mysql_real_escape_string(trim($_GET["delete-realisasi-ai"]));
    $idE = mysql_real_escape_string(trim($_GET["delete-ang"]));

    mysql_query("DELETE FROM realisasi WHERE koderealisasi ='$idD'") or die(mysql_error());
    mysql_query("DELETE FROM newdetailanggaran WHERE kodedetail ='$idE'") or die(mysql_error());
    header("location:../index.php?realisasi&sukseshapus");
}
else if(isset($_GET["delete-realisasi-ao"])){
    $idD = mysql_real_escape_string(trim($_GET["delete-realisasi-ao"]));
    $idE = mysql_real_escape_string(trim($_GET["delete-ango"]));

    mysql_query("DELETE FROM realisasi WHERE koderealisasi ='$idD'") or die(mysql_error());
    mysql_query("DELETE FROM newdetailanggaran WHERE kodedetail ='$idE'") or die(mysql_error());
    header("location:../index.php?realisasi&sukseshapus");
}
else if(isset($_GET["delete-penyerapan-ai"])){
    $idD = mysql_real_escape_string(trim($_GET["delete-penyerapan-ai"]));

    mysql_query("DELETE FROM pembayaran WHERE kodepym ='$idD'") or die(mysql_error());
    header("location:../index.php?penyerapan&sukseshapus");
}
else if(isset($_GET["delete-penyerapan-ao"])){
    $idD = mysql_real_escape_string(trim($_GET["delete-penyerapan-ao"]));

    mysql_query("DELETE FROM pembayaran WHERE kodepym ='$idD'") or die(mysql_error());
    header("location:../index.php?penyerapan-ao&sukseshapus");
}
else if(isset($_GET["delete-fungsi"])){
    $idD = mysql_real_escape_string(trim($_GET["delete-fungsi"]));

    mysql_query("DELETE FROM fungsi WHERE kodefungsi ='$idD'") or die(mysql_error());
    header("location:../index.php?fungsi&sukseshapus");
}
else if(isset($_GET["delete-pos-anggaran"])){
    $idD = mysql_real_escape_string(trim($_GET["delete-pos-anggaran"]));

    mysql_query("DELETE FROM pos_anggaran WHERE kode_posanggaran ='$idD'") or die(mysql_error());
    header("location:../index.php?pos-anggaran&sukseshapus");
}
else if(isset($_GET["delete-satuan"])){
    $idD = mysql_real_escape_string(trim($_GET["delete-satuan"]));

    mysql_query("DELETE FROM satuan WHERE kodesatuan ='$idD'") or die(mysql_error());
    header("location:../index.php?satuan&sukseshapus");
}
else if(isset($_GET["delete-listuser"])){
    $idD = mysql_real_escape_string(trim($_GET["delete-listuser"]));

    mysql_query("DELETE FROM user_login WHERE kodelogin ='$idD'") or die(mysql_error());
    header("location:../index.php?listuser&sukseshapus");
}