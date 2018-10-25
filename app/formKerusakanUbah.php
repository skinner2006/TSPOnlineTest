<?php
include_once("../library/koneksi.php");
	$strSQL="SELECT p.tgl_laporan,
				t.nama_teknisi as teknisi,
				p.nama_pelapor as pelapor,
				p.bagian as id_bagian,
				b.nama_bagian as bagian,
				p.id_perangkat,
				mp.nama_perangkat as perangkat,
				p.detail_kerusakan,
				p.`status`,
				p.tgl_selesai
			FROM trs_perangkat p 
			LEFT JOIN mst_teknisi t on p.id_teknisi = t.id
			LEFT JOIN mst_bagian b on p.bagian = b.id
			LEFT JOIN mst_perangkat mp on p.id_perangkat = mp.id
			WHERE p.id='".$_REQUEST['id']."'";	
						
				$strQry  	= mysql_query($strSQL, $server)  or die ("Query salah : ".mysql_error());
				$perangkat 	= mysql_fetch_array($strQry);
?>


	<div class="panel-heading">
		<h4>Form Laporan Kerusakan</h4>
		<input type="hidden" id="hdnId" name="hdnId" value=<?php echo $_REQUEST['id'];?>>
	</div>
		<div class="panel-body">
			<table class="table table-striped table-hover">
				<tr>
					<td>
						<div class="row">
							<div class="col-md-2" style="text-align:right;">
								<label class="control-label">Tanggal Laporan :</label>
							</div>
							<div class="col-md-3" style="text-align: left; height:20px;">
								<input placeholder="yyyy-mm-dd" class="form-control datepicker" type="text" name="tgllapor" id= "tgllapor" required value= <?php echo $perangkat['tgl_laporan'];?>>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="row">
							<div class="col-md-2" style="text-align:right;">
								<label class="control-label">Nama Pelapor :</label>
							</div>
							<div class="col-md-4" style="text-align: left;">
								<input type="text" required name="nama" id="nama" class="form-control" value=<?php echo $perangkat['pelapor'];?>>
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
							<div class="col-md-3" style="text-align: left;">
								<select id = "bagian" name ="bagian" class="form-control">
									<option>- Pilih Bagian -</option>
									<?php 
									$sql =  mysql_query("SELECT * from mst_bagian");
													while($rs = mysql_fetch_array($sql)){
														
													 if ($_GET['bagian'] == $rs['id']){
															$selected = 'selected="selected"';
														}else{
															$selected = '';
														}	
														
													echo "<option value='$rs[id]'.' '. $selected>$rs[nama_bagian]</option>";
												}
									?>		
								</select>
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
							<div class="col-md-3" style="text-align: left;">
								<select id = "perangkat" name ="perangkat" class="form-control">
									<option>- Pilih Perangkat -</option>
										<?php 
											$sql =  mysql_query("SELECT * from mst_perangkat");
													while($rs = mysql_fetch_array($sql)){
														
														 if ($_GET['perangkat'] == $rs['id']){
															$selected = 'selected="selected"';
														}else{
															$selected = '';
														}	
														
														echo "<option value='$rs[id]'.' '. $selected>$rs[nama_perangkat]</option>";
													}
										?>		
								</select>							
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
							<textarea class="form-control" rows="4" name="kerusakan" id ="kerusakan" align="left"><?php echo $perangkat['detail_kerusakan'];?></textarea>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-group">
							<div class="col-sm-13 col-sm-offset-2">
								<input id="ubah" name="ubah" value="Ubah" class="btn btn-primary">&nbsp 
								<a style="cursor:pointer;" onclick="kembali();" class="btn btn-primary">Batal</a>
								
							</div>
						</div>		
					</td>
				</tr>
			</table>
	</div>


<!--<script src="../js/jquery-2.0.3.min.js"></script>
<script src="../js/bootstrap-datepicker.js"></script>-->
<script src="../asets/datepicker/js/bootstrap-datepicker.min.js"></script> 

<script type="text/javascript">

function kembali() {
	$("#load").load("filterData.php");	
	$("#tampilkan").load("tampilPerangkat.php?awal=&akhir=");
}


$(document).ready(function(){
	$('.datepicker').datepicker({
				autoclose		: true,
				format			: "yyyy-mm-dd",
				todayHighlight	: true,
				todayBtn		: true,
				todayHighlight	: true, 
		});
		
	$('#ubah').click(function(){
	
		var tgllapor 	= $('#tgllapor').val();
		var nama 		= $('#nama').val();
		var bagian 		= $('#bagian option:selected').val();
		var perangkat 	= $('#perangkat option:selected').val();
		var kerusakan 	= $('#kerusakan').val();
		var id			= $('#hdnId').val();
		
		$.ajax({
					url			:'ubahForm.php',
					type		:'POST',
					datatype	:'html',
					data		: {'tgl_laporan'	: tgllapor,
								   'nama_pelapor'	: nama,
								   'bagian'			: bagian,
								   'id_perangkat'   : perangkat,
								   'kerusakan'		: kerusakan,
								   'id'				: id},
					success:function(msg){
						//alert(msg);
						//alert("Data Berhasil diubah!!");
						$("#load").load("filterData.php");	
						$("#tampilkan").load("tampilPerangkat.php?awal=&akhir=");
					},
					error: function(msg){
						alert(msg);
					}
				});
	});
		
});



</script>