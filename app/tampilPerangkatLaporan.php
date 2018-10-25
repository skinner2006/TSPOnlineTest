 <?php
 include_once("../library/koneksi.php");
 
 if (empty($_GET["awal"]) || empty($_GET["akhir"])){
	 $tglawal 		= "";
	 $tglakhir		= "";
 }else{
	 $tglawal 		= $_REQUEST['awal'];
	 $tglakhir		= $_REQUEST['akhir'];
 }
 
?>
 
<div class="panel-heading">
		Laporan Kerusakan Perangkat &nbsp
		<a class="btn btn-success"  style="cursor:pointer" onclick="downloadExcel(<?php echo $tglawal.",". $tglakhir;?>)">	 Export Data ke Excel</a>
		<input  type="hidden" id="awal" name="awal" value=<?php echo $tglawal ;?>>
		<input  type="hidden"  id="akhir" name="akhir" value=<?php echo $tglakhir ;?>>
</div>
<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>NO</th>
			<th>Tgl Laporan</th>
			<th>Pelapor</th>
			<th>Bagian</th>
			<th>Nama Perangkat</th>
			<th>Teknisi</th>
			<!--<th>Detail Kerusakan</th>-->
			<th>Status</th>
			<th>Tgl Selesai</th>
		</tr>
	</thead>
		<?php
		if($tglawal == "" || $tglakhir == ""){
			$strSql ="SELECT P.id,
							 p.tgl_laporan,	
							 P.id_perangkat,
							 p.bagian as id_bagian,
							 p.id_teknisi,
							 t.nama_teknisi as teknisi,
							 p.nama_pelapor as pelapor,
							 b.nama_bagian as bagian,
							 mp.nama_perangkat as perangkat,
							 p.detail_kerusakan,
							 p.progres,
							 p.`status`
						FROM trs_perangkat p 
						LEFT JOIN mst_teknisi t on p.id_teknisi = t.id
						LEFT JOIN mst_bagian b on p.bagian = b.id
						LEFT JOIN mst_perangkat mp on p.id_perangkat = mp.id
						ORDER BY status DESC";
			
		}else{
			$strSql ="SELECT P.id,
							 p.tgl_laporan,	
							 P.id_perangkat,
							 p.bagian as id_bagian,
							 p.id_teknisi,
							 t.nama_teknisi as teknisi,
							 p.nama_pelapor as pelapor,
							 b.nama_bagian as bagian,
							 mp.nama_perangkat as perangkat,
							 p.detail_kerusakan,
							 p.progres,
							 p.`status`
						FROM trs_perangkat p 
						LEFT JOIN mst_teknisi t on p.id_teknisi = t.id
						LEFT JOIN mst_bagian b on p.bagian = b.id
						LEFT JOIN mst_perangkat mp on p.id_perangkat = mp.id
						WHERE p.tgl_laporan 
						BETWEEN '$tglawal' 
						AND '$tglakhir' 
						ORDER BY status DESC";
		}
		$strQry = mysql_query($strSql, $server)  or die ("Query siswa salah : ".mysql_error());
		$nomor  = 0;	
		while ($perangkat = mysql_fetch_array($strQry)) {
		$nomor++;
		?>
		<tbody>	
			<tr id="row-<?php echo $perangkat['id'];?>"> 
				<td><?php echo $nomor;?></td>
				<td><?php echo $perangkat['tgl_laporan'];?></td>
				<td><?php echo $perangkat['pelapor'];?></td>
				<td><?php echo $perangkat['bagian'];?></td>
				<td><?php echo $perangkat['perangkat'];?></td>
				<td><?php echo $perangkat['teknisi'];?></td>
				<td><?php 
						if($perangkat['status'] == '1'){
							echo "<span style='color:red'>Belum dikerjakan</span>";
						}elseif($perangkat['status'] == '2'){
							echo "<span style='color:orange'>Masih dikerjakan</span>";
						}else{
							echo "<span style='color:green'>Selesai</span>";
						}
					?>
				</td>
				<td>
				<div class="btn-group">						
					<a style="cursor:pointer;" class="btn btn-small small-box" onclick="cetak(<?php echo $perangkat['id'];?>)"><i class="icon-print"></i>Cetak</a>
				</div>
				</td>
			</tr>
		</tbody>
	<?php }?>
</table>


<script src="../js/jquery-2.0.3.min.js"></script>
<script src="../js/bootstrap-datepicker.js"></script>

<script type="text/javascript">

function downloadExcel(awal,akhir){
	var awal  = document.getElementById('awal').value;
	var akhir = document.getElementById('akhir').value;
	window.open("exportsExcel.php?awal=" + awal + "&akhir=" + akhir);
}

function cetak(id){
	$("#loadAdmin").load("laporan.php?id=" + id);
	$("#contentAdmin").html("");
}

</script>
 
	
	
 
