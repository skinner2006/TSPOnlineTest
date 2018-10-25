<?php 
include("../library/koneksi.php");	
?>	
<?php
	$strSQL="SELECT p.tgl_laporan,
					t.nama_teknisi as teknisi,
					p.nama_pelapor as pelapor,
   				    b.nama_bagian as bagian,
					mp.nama_perangkat as perangkat,
					p.detail_kerusakan,
					p.`status`,
					p.tgl_selesai
				FROM trs_perangkat p 
				LEFT JOIN mst_teknisi t on p.id_teknisi = t.id
				LEFT JOIN mst_bagian b on p.bagian = b.id
				LEFT JOIN mst_perangkat mp on p.id_perangkat = mp.id
				WHERE p.id='".$_REQUEST['id']."'";
				
			$strQry  	= mysql_query($strSQL, $server)  or die ("Query siswa salah : ".mysql_error());
			$perangkat 	= mysql_fetch_array($strQry);
		?>

	<div class="panel-heading">
		Daftar Kerusakan Perangkat IT
	</div>	
		<table class="table table-striped table-hover">
	    		<tr>
	    			<td>
					<div class="row">
						<div class="col-md-2" style="text-align:right;">
							<label class="control-label">Tanggal Laporan :</label>
						</div>
						<div class="col-md-4" style="text-align: left;">
							<label class="control-label"><?php echo $perangkat['tgl_laporan'];?></label>
						</div>
					</div>
					</td>
				</tr>
				<!--<tr>
					<td>
						<div class="row">
							<div class="col-md-2" style="text-align:right;">
								<label class="control-label">Teknisi :</label>
							</div>
							<div class="col-md-4" style="text-align: left;">
								<label class="control-label"><?php echo $perangkat['teknisi'];?></label>
							</div>
						</div>
					</td>
				</tr>-->
				<tr>
					<td>
						<div class="row">
							<div class="col-md-2" style="text-align:right;">
								<label class="control-label">Nama Pelapor :</label>
							</div>
							<div class="col-md-4" style="text-align: left;">
								<label class="control-label"><?php echo $perangkat['pelapor'];?></label>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="row">
							<div class="col-md-2" style="text-align:right;">
								<label class="control-label">Perangkat :</label>
							</div>
							<div class="col-md-4" style="text-align: left;">
								<label class="control-label"><?php echo $perangkat['perangkat'];?></label>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="row">
							<div class="col-md-2" style="text-align:right;">
								<label class="control-label">Bagian :</label>
							</div>
							<div class="col-md-4" style="text-align: left;">
								<label class="control-label"><?php echo $perangkat['bagian'];?></label>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="row">
							<div class="col-md-2" style="text-align:right;">
								<label class="control-label">Status :</label>
							</div>
							<div class="col-md-4" style="text-align: left;">
								<label class="control-label">
									<?php 
										if($perangkat['status'] == '1'){
											echo "<span style='color:red'>Belum dikerjakan</span>";
										}elseif($perangkat['status'] == '2'){
											echo "<span style='color:orange'>Masih dikerjakan</span>";
										}else{
											echo "<span style='color:green'>Selesai</span>";
										}
									?>
								</label>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="row">
							<div class="col-md-2" style="text-align:right;">
								<label class="control-label">Detail Kerusakan :</label>
							</div>
							<div class="col-md-4" style="text-align: left;">
								<label class="control-label"><?php echo $perangkat['detail_kerusakan'];?></label>
							</div>
						</div>
					</td>
				</tr>
				<!--<tr>
					<td>
						<div class="row">
							<div class="col-md-2" style="text-align:right;">
								<label class="control-label">Tanggal Selesai :</label>
							</div>
							<div class="col-md-4" style="text-align: left;">
								<label class="control-label"><?php echo $perangkat['tgl_selesai'];?></label>
							</div>
						</div>
					</td>
				</tr>-->
				<tr>
					<td>
						<div class="form-group">
							<div class="col-md-2">
								<input id="kembali" name="kembali" value="Kembali" class="btn btn-primary">
							</div>
						</div>		
					</td>
				</tr>
			</table>


<script src="../js/jquery-2.0.3.min.js"></script>
<script src="../js/bootstrap-datepicker.js"></script>

<script type="text/javascript">

$(document).ready(function(){
	
	  $('#kembali').click(function(){
		 $("#load").load("filterData.php");
		 
	  });
	
});

</script>


