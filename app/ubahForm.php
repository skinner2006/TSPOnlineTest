<?php 
include_once("../library/koneksi.php");

$id			= $_POST['id'];
$tgllapor 	= $_POST['tgl_laporan'];
$nama 		= $_POST['nama_pelapor'];
$bagian		= $_POST['bagian'];
$perangkat  = $_POST['id_perangkat'];
$kerusakan  = $_POST['kerusakan'];
	
$strSQL = "Update trs_perangkat set 
				tgl_laporan  	  ='".$tgllapor."',
				nama_pelapor 	  ='".$nama."',
				bagian		  	  ='".$bagian."',
				id_perangkat 	  ='".$perangkat."',
				detail_kerusakan ='".$kerusakan."',
				status			  ='1'
		   where id='".$id."'";
		   
$ubahData = mysql_query($strSQL);

?>