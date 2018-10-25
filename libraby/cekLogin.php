<?php
//session_start();
if($_SESSION["user"]=="" && $_SESSION["pass"]==""){
	header("Location:../index.php");
}
?>