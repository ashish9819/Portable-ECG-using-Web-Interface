<?php

$host = "localhost:4433"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "datalogger"; /* Database name */

if(isset($_GET["password"]) && $_GET["password"]=="sheldon"){
$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}

$tValue=$_GET["temperaturevalue"];
$hValue=$_GET["humidityvalue"];
$hour=$_GET["hour"];
$min=$_GET["min"];
$sec=$_GET["sec"];
$day=$_GET["day"];
$month=$_GET["month"];
$year=$_GET["year"];
$air=$_GET["air"];
$distance=$_GET["distance"];
$soil=$_GET["soil"];
$motion=$_GET["motion"];
//$timestamp = strtotime();
//echo $timestamp;
$mytime=date('Y-m-d H:i:s', mktime($hour,$min,$sec,$month,$day,$year) );
$query="INSERT INTO `datalog` (`id`, `timestamp`, `Temperature`,`Humidity`,`AirQuality`,`SoilMoisture`,`ObjectDistance`,`Motion`) VALUES (NULL, '$mytime', '$tValue','$hValue','$air','$soil','$distance','$motion')";
	if (mysqli_query($con, $query)) {
    echo 'Data Logged';
	} 
	else {
    echo "Error: " . $query . "<br>" . mysqli_error($con);
	}
}
else{
    echo "INCORRECT PASSWORD! Data not logged.";
}
?>