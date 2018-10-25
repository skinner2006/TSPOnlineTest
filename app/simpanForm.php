<?php 
include_once("../library/cekLogin.php");
include_once("../library/koneksi.php");

$tgllapor 	= $_POST['tgl_laporan'];
$nama 		= $_POST['nama_pelapor'];
$bagian		= $_POST['bagian'];
$perangkat  = $_POST['id_perangkat'];
$kerusakan  = $_POST['kerusakan'];

	$strSQL="insert into trs_perangkat SET 
				 tgl_laporan  	  ='".$tgllapor."',
				 nama_pelapor 	  ='".$nama."',
				 bagian		  	  ='".$bagian."',
				 id_perangkat 	  ='".$perangkat."',
				 detail_kerusakan ='".$kerusakan."',
				 status			  ='1'";
	$tambahData = mysql_query($strSQL);
	
?>