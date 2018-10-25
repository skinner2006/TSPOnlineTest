<?php 
include('../library/cekLogin.php');
?>
<div id="left">
    <ul id="menu" class="collapse">
	<?php
		if ($_SESSION["role"] =='3'){
			
			echo "<li class='panel active'><a href='indexAdmin.php'><i class='icon-home'></i> Dashboard</a></li>";
			echo "<li><a href=# id='status' name='status'><i class='icon-paper-clip'> </i> Status Kerusakan</a></li>";
			echo "<li><a href=# id='laporan' name='laporan'><i class='icon-paper-clip'></i> Laporan Kerusakan</a></li>";
			
		}elseif($_SESSION["role"] =='2'){
			
			echo "<li class='panel active'><a href='indexAdmin.php'><i class='icon-home'></i> Dashboard</a></li>";
			echo "<li><a href=# id='rusak' name='rusak'><i class='icon-paper-clip'> </i> Form Kerusakan</a></li>";
			
		}else{
			echo "<li class='panel active'><a href='indexAdmin.php'><i class='icon-home'></i> Dashboard</a></li>";
			echo "<li><a href=# id='status' name='status'><i class='icon-paper-clip'> </i> Status Kerusakan</a></li>";
			echo "<li><a href=# id='laporan' name='laporan'><i class='icon-paper-clip'></i> Laporan Kerusakan</a></li>";
			//echo "<li><a href='?menu=user><i class='icon-user'></i> Daftar User</a></li>"
		}
	?>
    </ul>
</div>
		
<div id="content">
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
			<?php 
				if($_SESSION["role"] =='1' || $_SESSION["role"] =='3'){
					echo "<h4>TSP Administrator</h4>";
				}else{
					
					echo "<h4>TSP Karyawan</h4>";
				}
			?>	
            </div>
        </div>
		<hr/>
		<!--BLOCK SECTION -->
		<div class="row">
			<div class="col-lg-12">
				<?php
					if(isset($_GET["menu"])){
						include_once("load.php");
					}else{
						if($_SESSION["role"] =='1' || $_SESSION["role"] =='3'){
							echo "<div class='col-lg-12'>";
							include_once("dashboardAdmin.php");	
							echo "</div>";
						}else{
							echo "<div class='col-lg-12' id='dashboard' name='dashboard'>";
								include_once("dashboardKaryawan.php");	
							echo "</div>";
						}
							
					}
				?>
			</div>
		</div>
        <!--END BLOCK SECTION -->
        <hr />
    </div>
</div>

<!-- script -->
<!--<script src="../js/jquery-2.0.3.min.js"></script>
<script src="../js/bootstrap-datepicker.js"></script>-->

<script type="text/javascript">

$(document).ready(function(){
    
	$("#rusak").click(function(){
		$("#load").load("formKerusakan.php");	
	});	
	
	$("#status").click(function(){
		$("#loadAdmin").load("filterDataAdmin.php");	
		$("#contentAdmin").html("");	
	});
	
	$("#laporan").click(function(){
		$("#loadAdmin").load("filterDataLaporan.php");	
		$("#contentAdmin").html("");
	});
	
});

</script>

<!-- end script -->


