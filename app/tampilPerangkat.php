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
</div>
<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>NO</th>
			<th>Tgl Laporan</th>
			<th>Pelapor</th>
			<th>Nama Perangkat</th>
			<th>Teknisi</th>
			<th>Status</th>
		</tr>
	</thead>
		<?php
		if($tglawal == "" || $tglakhir == ""){
			$strSql ="SELECT P.id,
							 p.tgl_laporan,	
							 P.id_perangkat,
							 p.bagian as id_bagian,
							 t.nama_teknisi as teknisi,
							 p.nama_pelapor as pelapor,
							 b.nama_bagian as bagian,
							 mp.id as id_perangkat,
							 mp.nama_perangkat as perangkat,
							 p.detail_kerusakan,
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
							 t.nama_teknisi as teknisi,
							 p.nama_pelapor as pelapor,
							 b.nama_bagian as bagian,
							 mp.nama_perangkat as perangkat,
							 p.detail_kerusakan,
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
				<td style="display:none"><?php echo $perangkat['id'];?></td>
				<td><?php echo $perangkat['tgl_laporan'];?></td>
				<td><?php echo $perangkat['pelapor'];?></td>
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
					<a style="cursor:pointer;"  onclick="deatilRecord(<?php echo $perangkat['id']; ?>);" class="btn btn-small small-box"><i class="icon-ok-circle"></i>Lihat Detail</a>
					<a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
					<?php if($perangkat['status']=='1'){?>
						<ul class="dropdown-menu">
							<li>
							
								<a style="cursor:pointer;" onclick="deleteRecord(<?php echo $perangkat['id']; ?>);"><i class="icon-trash"></i> Hapus Data</a>
								
							</li>
							<li>
						
								<a style="cursor:pointer;" onclick="editRecord(<?php echo $perangkat['id'].",".$perangkat['id_bagian'].",".$perangkat['id_perangkat']?>);"><i class="icon-pencil"></i> Edit Data</a>
						
							</li>
						</ul>
					<?php  } ?>
				</div>
				</td>
			</tr>
		</tbody>
					<?php }?>
</table>

<script src="../js/jquery-2.0.3.min.js"></script>
<script src="../js/bootstrap-datepicker.js"></script>

<script type="text/javascript">

function deleteRecord(id) {
	if(confirm("Apakah anda yakin menghapus data ini?")) {
			$.ajax({
				url  : "perangkat_Hapus.php",
				type : "POST",
				data : 'id=' + id,
				success: function(data){
				 $("#row-"+id).remove();
				}
			});
	}
}

function deatilRecord(id) {
	$("#load").load("detail_laporan.php?id=" + id);
}

function editRecord(id,bagian,perangkat) {
	$("#load").load("formKerusakanUbah.php?id=" + id + "&bagian=" + bagian + "&perangkat=" + perangkat);
}

/*$(document).ready(function(){
	 $('#detail').click(function(){
		 
		 
		 var table = document.getElementById("tablePerangkat");
		 alert("test");
		 var id    = table.rows[index];
		 console.log(id.id);
		$("#load").load("detail_laporan&id=" + id);
		 	 
	 });
	
});*/

</script>

	
	
 
