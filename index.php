<!DOCTYPE html>

<html lang="en"> 

<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>TSP | Login Page</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
  
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/login.css" />
   
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body >
<?php
//error_reporting(0);
session_start();
include_once("library/koneksi.php");

if(@$_POST["login"]){ //jika tombol Login diklik

	$user = $_POST["user"];
	$pass = md5($_POST["pass"]);
	
	if($user!="" && $pass!=""){
		//include_once("library/koneksi.php");
		$em   = mysql_query("select * from user where password = '$pass' AND user_name = '$user'");
		$data = mysql_fetch_assoc($em);
		
		if($data["user_name"] == $user && $data["password"] == $pass){
			echo "<div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					Data Telah Ditemukan!!.
                  </div>"; 
				  
			$_SESSION["user"] = $data["user_name"];
			$_SESSION["pass"] = $data["password"];
			$_SESSION["nama"] = $data["nama"];
			$_SESSION["role"] = $data["role"];
			
			echo '<script type="text/javascript">window.location.href="app/indexAdmin.php";</script>';
					
		}else{
			echo "<center><div class='alert alert-warning alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Data Tidak Ditemukan!!</b>
                  </div><center>";
		}
	}
}
?>
   <!-- PAGE CONTENT --> 
    <div class="container">
		<div class="tab-content">
			<div id="login" class="tab-pane active">
				<form action="" method="post" class="form-signin">
					<p class="text-muted text-center btn-block btn btn-primary btn-rect">
						Masukan Username dan Password
					</p>
					<input type="text" autofocus required name="user" placeholder="Username" class="form-control" />
					<input type="password" required name="pass" placeholder="Password" class="form-control" />
					<input type="submit" name="login" value="Login" class="btn btn-info"/>
					<input type="reset" name="reset" value="Reset" class="btn btn-danger"/>
				</form>
			</div>
		</div>


	</div>
	      
      <!-- PAGE LEVEL SCRIPTS -->
      <script src="js/jquery-2.0.3.min.js"></script>
      <script src="js/bootstrap.js"></script>
      <!--END PAGE LEVEL SCRIPTS -->

</body>
    <!-- END BODY -->
</html>
