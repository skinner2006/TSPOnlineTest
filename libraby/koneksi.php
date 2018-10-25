<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
    $server = mysql_connect("localhost","root","");
    $db     = mysql_select_db("tspdb");

    if(!$server){
        echo "Maaf, Gagal tersambung dengan server !";
    }
    if(!$db){
        echo "Maaf, Gagal tersambung dengan database !";
    }
?>
