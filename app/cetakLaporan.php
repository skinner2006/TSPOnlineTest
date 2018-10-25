<?php
session_start();
include_once("../library/koneksi.php");					
?>
<html>
	<head>
		<link href="../css/bootstrap.css" rel="stylesheet">
		<style type="text/css">		body {
				padding-top: 20px;
				padding-bottom: 40px;
				font-size: 1em;
			}
		</style>
	</head>
	<body>
<div class="panel panel-primary">
		<div class="panel-heading">
			<h5>DETAIL LAPORAN KERUSAKAN</h5>
		</div>
		<hr>
		<?php
			if($_GET["id"]){
				$dataSql  = "SELECT p.id,
									p.tgl_laporan,
									p.tgl_mulai_service,
									t.nama_teknisi as teknisi,
									p.nama_pelapor as pelapor,
									b.nama_bagian as bagian,
									mp.nama_perangkat as perangkat,
									p.detail_kerusakan,
									p.`status`,
									p.progres,
									p.tgl_selesai
								FROM trs_perangkat p 
								LEFT JOIN mst_teknisi t on p.id_teknisi = t.id
								LEFT JOIN mst_bagian b on p.bagian = b.id
								LEFT JOIN mst_perangkat mp on p.id_perangkat = mp.id
								WHERE p.id='".$_REQUEST['id']."'";
				$dataQry  = mysql_query($dataSql, $server)  or die ("Query slah : ".mysql_error());
				$data 	  = mysql_fetch_array($dataQry);
			}
		?>
		<div class="body">
			<table>
				<tr>
					<td colspan="3">
						<label class="control-label" style="text-decoration:underline;"> DETAIL DATA </label>
					</td>
				</tr>
				<tr>
					<td><label class="control-label">Tgl Laporan</label></td>
					<td>:</td>
					<td><?php echo $data['tgl_laporan'];?></td>
				</tr>		
				<tr>
					<td><label class="control-label">Nama Pelapor</label></td>
					<td>:</td>
					<td><?php echo $data['pelapor'];?></td>
				</tr>			
				<tr>
					<td><label class="control-label">Bagian</label></td>
					<td>:</td>
					<td><?php echo $data['bagian'];?></td>
				</tr>	
				<tr>
					<td><label class="control-label">Perangkat</label></td>
					<td>:</td>
					<td><?php echo $data['perangkat'];?></td>
				</tr>	
				<tr>
					<td><label class="control-label">Teknisi</label></td>
					<td>:</td>
					<td><?php echo $data['teknisi'];?></td>
				</tr>	
				<tr>
					<td><label class="control-label">Detail Kerusakan</label></td>
					<td>:</td>
					<td><?php echo $data['detail_kerusakan'];?></td>
				</tr>	
				<tr>
					<td><label class="control-label">Progres</label></td>
					<td>:</td>
					<td><?php echo $data['progres'];?></td>
				</tr>	
				<tr>
					<td><label class="control-label">status</label></td>
					<td>:</td>
					<td>
						<?php
							if($data['status'] == '1'){
								echo "<span style='color:red'>Belum dikerjakan</span>";
							}elseif($data['status'] == '2'){
								echo "<span style='color:orange'>Masih dikerjakan</span>";
							}else{
								echo "<span style='color:green'>Selesai</span>";
							}
						?>
				</tr>	
				<tr>
					<td><label class="control-label">Tgl Selesai</label></td>
					<td>:</td>
					<td><?php echo $data['tgl_selesai'];?></td>
				</tr>																												
			</table>
			<p align='center'>
				<a href="cetakLaporan.php" class="btn btn-primary" onClick="window.print();return false"> <i class='icon-print'></i>Print </a>
			</p>
		</div>
</div>
</body>
</html>