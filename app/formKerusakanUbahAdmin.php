<?php

include_once("../library/koneksi.php");
	$strSQL="SELECT p.tgl_laporan,
				p.tgl_mulai_service,
				t.nama_teknisi as teknisi,
				p.nama_pelapor as pelapor,
				p.bagian as id_bagian,
				p.id_teknisi,
				b.nama_bagian as bagian,
				p.id_perangkat,
				mp.nama_perangkat as perangkat,
				p.detail_kerusakan,
				p.`status`,
				p.progres,
				p.status,
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
								<label class="control-label">Tgl Laporan :</label>
							</div>
							<div class="col-md-3" style="text-align: left; height:20px;">
								<input placeholder="yyyy-mm-dd" class="form-control datepicker" type="text" name="tgllapor" id= "tgllapor" required value= <?php echo $perangkat['tgl_laporan'];?> disabled>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="row">
							<div class="col-md-2" style="text-align:right;">
								<label class="control-label" >Tgl Mulai Service :</label>
							</div>
							<div class="col-md-3" style="text-align: left; height:20px;">
								<input placeholder="yyyy-mm-dd" class="form-control datepicker" type="text" name="tglservice" id= "tglservice" required value= <?php echo $perangkat['tgl_mulai_service'];?>>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="row">
							<div class="col-md-2" style="text-align:right;">
								<label class="control-label">Teknisi :</label>
							</div>
							<div class="col-md-3" style="text-align: left;">
								<select id = "teknisi" name ="teknisi" class="form-control">
									<option>- Pilih Teknisi -</option>
									<?php 
									
										$sql =  mysql_query("SELECT * from mst_teknisi");
													while($rs = mysql_fetch_array($sql)){
														if (!empty($_GET['teknisi'])){
															if ($_GET['teknisi'] == $rs['id']){
																$selected = 'selected="selected"';
															}else{
																$selected = '';
															}	
														}
														echo "<option value='$rs[id]'.' '. $selected>$rs[nama_teknisi]</option>";
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
								<label class="control-label">Nama Pelapor :</label>
							</div>
							<div class="col-md-4" style="text-align: left;">
								<input type="text" required name="nama" id="nama" class="form-control" value=<?php echo $perangkat['pelapor'];?> disabled>
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
								<select id = "bagian" name ="bagian" class="form-control" disabled>
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
								<select id = "perangkat" name ="perangkat" class="form-control" disabled>
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
								<label class="control-label" >Detail Kerusakan :</label>
							</div>
							<div class="col-md-4" style="text-align: left;">
							<textarea disabled class="form-control" rows="4" name="kerusakan" id ="kerusakan" align="left"><?php echo $perangkat['detail_kerusakan'];?></textarea>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="row">
							<div class="col-md-2" style="text-align:right;">
								<label class="control-label" >Progres Service :</label>
							</div>
							<div class="col-md-4" style="text-align: left;">
							<textarea class="form-control" rows="4" name="progress" id ="progress" align="left"><?php echo $perangkat['progres'];?></textarea>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="row">
							<div class="col-md-2" style="text-align:right;">
								<label class="control-label" >Status :</label>
							</div>
							<div class="container col-md-6" style="text-align: left;">
								<label class="radio-inline">
								  <input type="radio" name="optradio" <?php if($perangkat['status']=='1'){echo "checked";}?> value="1">Belum diservice
								</label>
								<label class="radio-inline">
								  <input type="radio" name="optradio"  <?php if($perangkat['status']=='2'){echo "checked";}?> value="2">Sedang diservice
								</label>
								<label class="radio-inline">
								  <input type="radio" name="optradio"  <?php if($perangkat['status']=='3'){echo "checked";}?> value="3">Selesai
								</label>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="row">
							<div class="col-md-2" style="text-align:right;">
								<label class="control-label" >Tgl Selesai :</label>
							</div>
							<div class="col-md-3" style="text-align: left; height:20px;">
								<input placeholder="yyyy-mm-dd" class="form-control datepicker" type="text" name="tglselesai" id= "tglselesai" required value= <?php echo $perangkat['tgl_selesai'];?>>
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
	$("#loadAdmin").load("filterDataAdmin.php");	
	$("#contentAdmin").load("tampilPerangkatAdmin.php?awal=&akhir=");
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
		var tglservice 	= $('#tglservice').val();
		var progress	= $('#progress').val();
		var status 		= $('input[name="optradio"]:checked').val();
		var selesai		= $('#tglselesai').val();
		var teknisi		= $('#teknisi').val();
		var id			= $('#hdnId').val();
				
		$.ajax({
					url			:'ubahFormAdmin.php',
					type		:'POST',
					datatype	:'html',
					data		: {'tgl_service'	: tglservice,
								   'progres'		: progress,
								   'status'			: status,
								   'tgl_selesai'	: selesai,
								   'teknisi'		: teknisi,
								   'id'				: id},
					success:function(msg){
						$("#loadAdmin").load("filterData.php");	
						$("#contentAdmin").load("tampilPerangkatAdmin.php?awal=&akhir=");
					},
					error: function(msg){
						alert(msg);
					}
				});
	});
		
});



</script>