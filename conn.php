<?php

$databaseHost = 'localhost';
$databaseUser = 'mohammed';
$databasePassword = 'mohammed';
$databaseName = 'wkbm_finance';

$con = mysqli_connect($databaseHost, $databaseUser , $databasePassword , $databaseName);
if ( mysqli_connect_error() ) {
	
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
} else {
	//echo "Connection gelukt";
}



