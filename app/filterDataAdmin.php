 
	<div class="panel-heading" id="judul">
		Daftar Kerusakan Perangkat IT
	</div>
	<div class="table-responsive" >
		<div class="form-group">
			<table width="100%" border="0" cellpadding="10px" cellspacing="10px">
				<tr>
	    			<td>
						<div class="row">
							<div class="col-md-2" style="text-align:right;">
								<label class="control-label">Tanggal Awal  :</label>
							</div>
							<div class="col-md-3" style="text-align: left;">
								<input placeholder="yyyy-mm-dd" class="form-control datepicker" type="text" name="awal" id= "awal">
							</div>
						</div>
					</td>
				</tr>
				<tr>
	    			<td>
						<div class="row">
							<div class="col-md-2" style="text-align:right;">
								<label class="control-label">Tanggal Akhir  :</label>
							</div>
							<div class="col-md-3" style="text-align: left;">
								<input placeholder="yyyy-mm-dd" class="form-control datepicker" type="text" name="akhir" id= "akhir">
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="3">
						<div class="form-group">
						<div class="col-sm-13 col-sm-offset-2">
							&nbsp <button id="tampil" name="tampil" type="button" class="btn btn-primary">Tampil</button>			
						</div>
					</div>		
					</td>
				</tr>
			</table>
		</div>
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
			
		$('#tampil').click(function(){
		  var awal  = $("#awal" ).val();
		  var akhir = $("#akhir" ).val();
		  
		  $("#contentAdmin").load("tampilPerangkatAdmin.php?awal=" + awal + "&akhir=" + akhir);	
		});	
			
});
</script>
