<html>
<head>
 <meta http-equiv="refresh" content="5" /> 
<link rel="stylesheet" href="w3.css">

</head>
<body>

	
  
<?php 
$host = "localhost"; /* Host name */
$user = "id8999302_ecgcloud"; /* User */
$password = "ecgcloud"; /* Password */
$dbname = "id8999302_ecgcloud"; /* Database name */


$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM datalog ORDER BY id DESC LIMIT 50"; //works as query
$result = mysqli_query($con, $sql) or die(mysqli_error($con));
$n1=mysqli_num_rows($result)+1;
echo "<table class=\"w3-table-all w3-centered w3-hoverable w3-card-4\" border=\"1\">";
echo "<tr class=\"w3-turquoise\"><th>SR NO.</th><th>TIMESTAMP</th><th>ECG Value</th></tr>";
$ecgArray=array();
while ($row = mysqli_fetch_array($result)) {
    $n1 = $n1 - 1;
    $n2 = $row['timestamp'];
    $n3 = $row['ECGvalue'];
	$time=strtotime($n2);
	//echo $time.'<br>';
	//echo $n2.'<br>';
	array_push($ecgArray,array("x" => $time*1000-12600000, "y" => $n3));
	//12600000 kahase aaya idk BUT aaya.
	//*1000 coz milliseconds
    echo "<tr><td>" . $n1 . "</td><td>". $n2 . "</td><td>". $n3 . "</td></tr>" ;
	echo "";
 
 }?> 
 <script>
window.onload = function () {
 
var chartTemperature = new CanvasJS.Chart("chartTemperature", {
	 zoomEnabled: true,
	title: {
		text: "ECG Graph"
	},
	axisX: {
		title: "Time",
		suffix: " "
	},
	axisY: {
		title: "Signal",
		suffix: " "
	},
	data: [{
		type: "spline",
		//type=area for area
		markerSize: 0,
		xValueType: "dateTime",
		xValueFormatString: "",
		yValueFormatString: "#,##0.0 ",
		dataPoints: <?php echo json_encode($ecgArray, JSON_NUMERIC_CHECK); ?>
	}]
});
chartTemperature.render();
 
}
</script>
</head>
<body>
<div id="chartTemperature" style="height: 370px; width: 100%;"></div>
<script src="canvasjs.min.js"></script>
</body>
</html>            
