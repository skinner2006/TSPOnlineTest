<?php 
error_reporting(0); ?>
<!--<div class="panel panel-default">-->
	<div class='panel-heading'>
		Status Server
	</div>
	<div class='panel-body'>
		<?php 
			$fp = fsockopen("www.google.com", 80, $errno, $errstr, 30);
			if (!$fp) {
				
				echo "<center><div class='alert alert-warning alert-dismissable'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<b>Tidak ada koneksi internet!!!</b>
						</div><center>";
						
				return false;
			} else {
				
				$sumber = 'https://server-status-tsp.firebaseapp.com/status';
				$konten = file_get_contents($sumber);
				$data   = json_decode($konten, true);		
			}
		?>
		<table class="table">
			<tr>
			   <th>Id</th>
			   <th>Alias</th>
			   <th>Location</th>
			   <th>uptime</th>
			   <th>status</th>
			</tr>
			  <?php   
			   for($a=0; $a < count($data); $a++)
			   {
				print "<tr>";
				print "<td>".$data[$a]['id']."</td>";
				print "<td>".$data[$a]['alias']."</td>";
				print "<td>".$data[$a]['location']."</td>";
				print "<td>".$data[$a]['uptime']."</td>";
				print "<td>".$data[$a]['status']."</td>";
				print "</tr>";
			   }
			  ?>
		 </table>
		
	</div>
<!--</div>-->
