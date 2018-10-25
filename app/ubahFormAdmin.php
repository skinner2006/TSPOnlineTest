<?php 
include_once("../library/koneksi.php");

$id			 = $_POST['id'];
$tglservice	 = $_POST['tgl_service'];
$progres	 = $_POST['progres'];
$status		 = $_POST['status'];
$teknisi	 = $_POST['teknisi'];
$tglselesai  = $_POST['tgl_selesai'];
	
$strSQL = "Update trs_perangkat set 
				tgl_mulai_service  	  	='".$tglservice."',
				Progres		 	  	  	='".$progres."',
				tgl_selesai 	  	 	='".$tglselesai."',
				id_teknisi				='".$teknisi."',
				status			  		='".$status."'
				where id='".$id."'";
		   
$ubahData = mysql_query($strSQL);

?>