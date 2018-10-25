<?php
error_reporting(0);
session_start();
include("../library/variabel.php");
if($_SESSION["user"]!="" && $_SESSION["pass"]!=""){
?>

<!DOCTYPE html>

<html lang="en"> 

<!-- BEGIN HEAD-->
<head>
    <meta charset="UTF-8" />
    <title>TSP Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
  
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/theme.css" />
    <link rel="stylesheet" href="../css/MoneAdmin.css" />
    <link rel="stylesheet" href="../css/font-awesome.css" />
	<link rel="stylesheet" href="../css/datepicker.css" />
    <!--END GLOBAL STYLES -->
</head>

<body class="padTop53">
	<div id="wrap">
		<!-- HEADER SECTION -->
			<?php include_once("menu_atas.php");?>
        <!-- END HEADER SECTION -->
		
		<!-- MENU SECTION -->
			<?php include_once("menu_admin.php");?>
        <!--END MENU SECTION -->
		
		<!--PAGE CONTENT -->
        <!--END PAGE CONTENT -->
	   
	</div>
	
	<!-- FOOTER -->
		 <?php include_once("footer.php");?>
    <!--END FOOTER -->
	
    <!-- GLOBAL SCRIPTS -->
		<script src="../js/jquery-2.0.3.min.js"></script>
		<script src="../js/bootstrap-datepicker.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->
</body>

<?php
}else{
	header("Location:../index.php");
}
?>