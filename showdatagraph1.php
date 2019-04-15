<html>
<head>
 <!-- <meta http-equiv="refresh" content="12" /> -->
<link rel="stylesheet" href="w3.css">

</head>
<body>

	
  
<?php 
$host = "localhost:4433"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "datalogger"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM datalog ORDER BY id DESC LIMIT 50"; //works as query
$result = mysqli_query($con, $sql) or die(mysqli_error($con));
$n1=mysqli_num_rows($result)+1;
echo "<table class=\"w3-table-all w3-centered w3-hoverable w3-card-4\" border=\"1\">";
echo "<tr class=\"w3-turquoise\"><th>SR NO.</th><th>TIMESTAMP</th><th>TEMPERATURE</th><th>HUMIDITY</th><th>AIR QUALITY</th><th>SOIL MOISTURE</th><th>OBJECT DISTANCE(cm)</th><th>MOTION DETECTION</th></tr>";
$tempArray=array();
$humArray=array();
while ($row = mysqli_fetch_array($result)) {
    $n1 = $n1 - 1;
    $n2 = $row['timestamp'];
    $n3 = $row['Temperature'];
	$n4 = $row['Humidity'];
	$n5 = $row['AirQuality'];
	$n6 = $row['SoilMoisture'];
	$n7 = $row['ObjectDistance'];
	$n8 = $row['Motion'];
	if($n8==1){
		$toBeDisplayed="YES";
	}
	else{
		$toBeDisplayed="NO";
	}
	
	$time=strtotime($n2);
	//echo $time.'<br>';
	//echo $n2.'<br>';
	array_push($tempArray,array("x" => $time*1000-12600000, "y" => $n3));
	array_push($humArray,array("x" => $time*1000-12600000, "y" => $n4));
	//12600000 kahase aaya idk BUT aaya.
	//*1000 coz milliseconds
    echo "<tr><td>" . $n1 . "</td><td>". $n2 . "</td><td>". $n3 . "</td><td>". $n4 . "</td><td>". $n5 . "</td><td>". $n6 . "</td><td>". $n7 . "</td><td>". $toBeDisplayed . "</td></tr>" ;
	echo "";
 
 }?> 
 <script>
window.onload = function () {
 
var chartTemperature = new CanvasJS.Chart("chartTemperature", {
	 zoomEnabled: true,
	title: {
		text: "Temperature Vs Time"
	},
	axisX: {
		title: "Time",
		suffix: " "
	},
	axisY: {
		title: "Temperature",
		suffix: " °C"
	},
	data: [{
		type: "line",
		//type=area for area
		markerSize: 0,
		xValueType: "dateTime",
		xValueFormatString: "",
		yValueFormatString: "#,##0.0 °C",
		dataPoints: <?php echo json_encode($tempArray, JSON_NUMERIC_CHECK); ?>
	}]
});
chartTemperature.render();

var chartHumidity = new CanvasJS.Chart("chartHumidity", {
	 zoomEnabled: true,
	title: {
		text: "Humidity Vs Time"
	},
	axisX: {
		title: "Time",
		suffix: " "
	},
	axisY: {
		title: "Humidity",
		suffix: ""
	},
	data: [{
		type: "line",
		//type=area for area
		markerSize: 0,
		xValueType: "dateTime",
		xValueFormatString: "",
		yValueFormatString: "#,##0.0",
		dataPoints: <?php echo json_encode($humArray, JSON_NUMERIC_CHECK); ?>
	}]
});
chartHumidity.render();
 
}
</script>
</head>
<body>
<div id="chartTemperature" style="height: 370px; width: 100%;"></div>
<div id="chartHumidity" style="height: 370px; width: 100%;"></div>
<script src="canvasjs.min.js"></script>
</body>
</html>            
