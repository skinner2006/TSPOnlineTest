<?php
		include_once("../library/koneksi.php");
		$del = "DELETE FROM trs_perangkat WHERE id='".$_POST["id"]."'";
		$delDb = mysql_query($del,$server) or die("Error hapus data ".mysql_error());
?>