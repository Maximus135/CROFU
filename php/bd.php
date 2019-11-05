<?php

	$username = "";
	$passwordbd = "";
	$hostname = "localhost";
	$bdname = "Customers";
	$db = mysqli_connect($hostname,$username,$passwordbd);
    mysqli_select_db($db,"Customers");
?>