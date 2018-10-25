<?php 
include_once("../library/koneksi.php");
?>
	<div class="panel-heading">
		<h4>Form Laporan Kerusakan</h4>
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
								<input placeholder="yyyy-mm-dd" class="form-control datepicker" type="text" name="tgllapor" id= "tgllapor" required>
								
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
								<input type="text" required name="nama" id="nama" class="form-control" required />
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
												echo "<option value='$rs[id]'>$rs[nama_bagian]</option>";}
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
													echo "<option value='$rs[id]'>$rs[nama_perangkat]</option>";}
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
								<textarea class="form-control" rows="4" name="kerusakan" id ="kerusakan"></textarea>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-group">
							<div class="col-sm-13 col-sm-offset-2">
								&nbsp <input id="simpan" name="simpan" type="simpan" value="Simpan" class="btn btn-primary">
							</div>
						</div>		
					</td>
				</tr>
			</table>
	</div>

<script src="../asets/datepicker/js/bootstrap-datepicker.min.js"></script> 

<script type="text/javascript">

$(document).ready(function(){
	$('.datepicker').datepicker({
				autoclose		: true,
				format			: "yyyy-mm-dd",
				todayHighlight	: true,
				todayBtn		: true,
				todayHighlight	: true, 
		});
		
	$('#simpan').click(function(){
		//alert("test");
		var tgllaporan 	= $('#tgllapor').val();
		var nama 		= $('#nama').val();
		var bagian 		= $('#bagian option:selected').val();
		var perangkat 	= $('#perangkat option:selected').val();
		var kerusakan 	= $('#kerusakan').val();
		
		$.ajax({
					url			:'simpanForm.php',
					type		:'POST',
					datatype	:'html',
					data		: {'tgl_laporan'	: tgllaporan,
								   'nama_pelapor'	: nama,
								   'bagian'			: bagian,
								   'id_perangkat'   : perangkat,
								   'kerusakan'		: kerusakan},
					success:function(msg){
						
						$("#load").load("filterData.php?awal=''&akhir=''");	
						$("#tampilkan").load("tampilPerangkat.php?awal=&akhir=");	
						//window.location.href= "?menu=tampilPerangkatRefresh";
					},
					error: function(msg){
						alert(msg);
					}
				});
	});
		
});



</script>