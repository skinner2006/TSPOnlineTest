<?php
//session_start();
include_once("../library/koneksi.php");	
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=Laporan-export.xls");
 
if (empty($_GET["awal"]) || empty($_GET["akhir"])){
	 $tglawal 		= "";
	 $tglakhir		= "";
 }else{
	 $tglawal 		= $_REQUEST['awal'];
	 $tglakhir		= $_REQUEST['akhir'];

	
}

?>

<table border="1">
<thead>
	<tr>
		<th>No</th>
		<th>Tgl Laporan</th>
		<th>Tgl Mulai Service</th>
		<th>Teknisi</th>
		<th>Nama Pelapor</th>
		<th>Bagian</th>
		<th>Perangkat</th>
		<th>Status</th>
		<th>Detail Kerusakan</th>
		<th>Progres</th>
		<th>Tgl Selesai</th>
	</tr>
	</thead>
	
<?php	
	if($tglawal == "" || $tglakhir == ""){
		$strSql ="SELECT P.id,
							 p.tgl_laporan,	
							 p.tgl_mulai_service,
							 P.id_perangkat,
							 mp.nama_perangkat as perangkat,
							 p.id_teknisi,
							 t.nama_teknisi as teknisi,
							 p.bagian as id_bagian,
							 b.nama_bagian,
							 p.nama_pelapor as pelapor,
							 p.detail_kerusakan,
							 p.`status`,
							 p.progres,
							 p.tgl_selesai
						FROM trs_perangkat p 
						LEFT JOIN mst_teknisi t on p.id_teknisi = t.id
						LEFT JOIN mst_bagian b on p.bagian = b.id
						LEFT JOIN mst_perangkat mp on p.id_perangkat = mp.id
						ORDER BY status DESC";
	}else{
		
		$strSql ="SELECT P.id,
							 p.tgl_laporan,	
							 p.tgl_mulai_service,
							 P.id_perangkat,
							 mp.nama_perangkat as perangkat,
							 p.id_teknisi,
							 t.nama_teknisi as teknisi,
							 p.bagian as id_bagian,
							 b.nama_bagian,
							 p.nama_pelapor as pelapor,
							 p.detail_kerusakan,
							 p.`status`,
							 p.progres,
							 p.tgl_selesai
						FROM trs_perangkat p 
						LEFT JOIN mst_teknisi t on p.id_teknisi = t.id
						LEFT JOIN mst_bagian b on p.bagian = b.id
						LEFT JOIN mst_perangkat mp on p.id_perangkat = mp.id
						WHERE p.tgl_laporan 
						BETWEEN '$tglawal' 
						AND '$tglakhir' 
						ORDER BY status DESC";
	}
		$sql = mysql_query($strSql);
		$no = 1;
		while($data = mysql_fetch_assoc($sql)){
			echo '
			<tr>
				<td>'.$no.'</td>
				<td>'.$data['tgl_laporan'].'</td>
				<td>'.$data['tgl_mulai_service'].'</td>
				<td>'.$data['teknisi'].'</td>
				<td>'.$data['pelapor'].'</td>
				<td>'.$data['nama_bagian'].'</td>
				<td>'.$data['perangkat'].'</td>
				<td>'.$data['status'].'</td>
				<td>'.$data['detail_kerusakan'].'</td>
				<td>'.$data['progres'].'</td>
				<td>'.$data['tgl_selesai'].'</td>
			</tr>
			';
			$no++;
		}
	?>
</table>
