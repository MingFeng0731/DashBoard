<?php
$link = mysqli_connect('localhost','root','');

mysqli_select_db($link,'FQDatabase');
$err01='';$err02='';$err11='';$err12='';$err21='';$err22='';$err31='';$err32='';$err41='';$err42='';
$err51='';$err52='';$err61='';$err62='';$err71='';$err72='';$err81='';$err82='';$err91='';$err92='';
$err101='';$err102='';$err111='';$err112='';$err121='';$err122='';$err131='';$err132='';$err141='';$err142='';


if(isset($_POST['send']))
{
	$sql2 = "SELECT * FROM Car2 ORDER BY id DESC LIMIT 15";
	$result2 = mysqli_query($link,$sql2);
    $i=0;
    $list_arr=array();
    while($list=mysqli_fetch_array($result2)){  //判斷是否還有資料沒有取完，如果取完，則停止while迴圈。
    $list_arr[$i]=$list;
    $i++;
    }
	$err01 = $list_arr[0][1];
	$err02 = $list_arr[0][2];
	$err11 = $list_arr[1][1];
	$err12 = $list_arr[1][2];
	$err21 = $list_arr[2][1];
	$err22 = $list_arr[2][2];
	$err31 = $list_arr[3][1];
	$err32 = $list_arr[3][2];
	$err41 = $list_arr[4][1];
	$err42 = $list_arr[4][2];
	$err51 = $list_arr[5][1];
	$err52 = $list_arr[5][2];
	$err61 = $list_arr[6][1];
	$err62 = $list_arr[6][2];
	$err71 = $list_arr[7][1];
	$err72 = $list_arr[7][2];
	$err81 = $list_arr[8][1];
	$err82 = $list_arr[8][2];
	$err91 = $list_arr[9][1];
	$err92 = $list_arr[9][2];
	$err101 = $list_arr[10][1];
	$err102 = $list_arr[10][2];
	$err111 = $list_arr[11][1];
	$err112 = $list_arr[11][2];
	$err121 = $list_arr[12][1];
	$err122 = $list_arr[12][2];
	$err131 = $list_arr[13][1];
	$err132 = $list_arr[13][2];
	$err141 = $list_arr[14][1];
	$err142 = $list_arr[14][2];
}
print <<< ___html___
<head>
<title>Car2 Data</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Play:700,400' type='text/css'>
<script type="text/javascript" src="http://iop.io/js/vendor/d3.v3.min.js"></script>
<script type="text/javascript" src="http://iop.io/js/vendor/polymer/PointerEvents/pointerevents.js"></script>
<script type="text/javascript" src="http://iop.io/js/vendor/polymer/PointerGestures/pointergestures.js"></script>
<script type="text/javascript" src="http://iop.io/js/iopctrl.js"></script>
</head>

<body>
<style>
    html, body{
        width: 100%;
        height: 100%;
		background-color: #272727;
    }
    #map{
		position:absolute;
		left:1%;
		top:1%;
        width: 60%;
        height: 70%;
		border:#7B7B7B 5px solid;
    }
	#but1{
		position: absolute;
		left:1%;
		top:85%;
	}
	#but2{
		position: absolute;
		left:1%;
		top:75%;
	}
	.power{
		position: absolute;
		right:1%;
		top:1%;
	}
	.water{
		position: absolute;
		right:1%;
		top:36%;
	}
</style>
<div id="map"></div>


<div id="but1" align="left">
<form action="car2_data.php" method="post" class="form">
<input type="submit" class="btn btn-primary" name="send" value='TimeSearch'>
</form>
</div>

<div id="but2" align="left">
<form action="DashBoard.php" method="post" class="form">
<input type="submit" class="btn btn-primary" name="send" value='DashBoard'>
</form>
</div>
//<script>
//window.setInterval("reloadIFrame1();", 5000);
//function reloadIFrame1() {
// 	var frameHolder=document.getElementById('power');
//	frameHolder.src="http://134.208.2.149/test_power.html"
//}
</script>	
<iframe id="power" class="power"
             noresize="noresize"
             style="position: absolute; background-color: #272727; width: 35%; height:40%;"
             src="http://134.208.2.149:80/power_data2.html"
             frameborder="0">
</iframe>
//<script>
//window.setInterval("reloadIFrame2();", 5000);
//function reloadIFrame2() {
//	var frameHolder=document.getElementById('water');
//   	frameHolder.src="http://134.208.2.149/test_water.html"
//}
//</script>
<iframe id="water" class="water"
             noresize="noresize"
             style="position: absolute; background-color: #272727; width: 35%; height:40%;"
             src="http://134.208.2.149:80/water_data2.html"
             frameborder="0">
</iframe>
<script>
    var map;
	var markers = [];
	var position = [
    {label:'0', lat: $err01, lng: $err02},
	{label:'1', lat: $err11, lng: $err12},
	{label:'2', lat: $err21, lng: $err22},
	{label:'3', lat: $err31, lng: $err32},
	{label:'4', lat: $err41, lng: $err42},
	{label:'5', lat: $err51, lng: $err52},
	{label:'6', lat: $err61, lng: $err62},
	{label:'7', lat: $err71, lng: $err72},
	{label:'8', lat: $err81, lng: $err82},
	{label:'9', lat: $err91, lng: $err92},
	{label:'', lat: $err101, lng: $err102},
	{label:'', lat: $err111, lng: $err112},
	{label:'', lat: $err121, lng: $err122},
	{label:'', lat: $err131, lng: $err132},
	{label:'', lat: $err141, lng: $err142}
	];
	
    function initMap(){
		map = new google.maps.Map(document.getElementById('map'), {
		center: {lat:23.895339 , lng: 121.5395832},
		zoom: 15,
		});

    	for (var i = 0; i < position.length-5; i++) {
			addMarker(i);
		}
	
		function addMarker(e) {
			markers[e] = new google.maps.Marker({
				position: {
					lat: position[e].lat,
					lng: position[e].lng,
				},
				map: map,
				label: position[e].label,	
			});	
    	}
		for (var i = position.length-5; i < position.length; i++) {
			addPattenMarker(i);
		}

		function addPattenMarker(e) {
			markers[e] = new google.maps.Marker({
				position: {
					lat: position[e].lat,
					lng: position[e].lng,
				},
				icon: {
					path: google.maps.SymbolPath.BACKWARD_CLOSED_ARROW,
				},
				map: map,
				label: position[e].label,	
			});	
    	}
		var points = [
			{lat: $err01, lng: $err02},
			{lat: $err11, lng: $err12},
			{lat: $err21, lng: $err22},
			{lat: $err31, lng: $err32},
			{lat: $err41, lng: $err42},
			{lat: $err51, lng: $err52},
			{lat: $err61, lng: $err62},
			{lat: $err71, lng: $err72},
			{lat: $err81, lng: $err82},
			{lat: $err91, lng: $err92}
		]
		var pattenpoints = [
			{lat: $err91, lng: $err92},
			{lat: $err101, lng: $err102},
			{lat: $err111, lng: $err112},
			{lat: $err121, lng: $err122},
			{lat: $err131, lng: $err132},
			{lat: $err141, lng: $err142}
		]
		var lineSymbol = {
			path: 'M 0,-1 0 , 1',
			strokeOpacity : 1,
			scale : 4
		}
		var polyline = new google.maps.Polyline({
			path: points,
			strokeColor: '#FF0000',
			strokeOpacity: 1.0,
			strokeWeight: 2
		});
		polyline.setMap(map);
		var polyline = new google.maps.Polyline({
			path: pattenpoints,
			strokeColor: '#007500',
			strokeOpacity: 0,
			icons:[{
				icon: lineSymbol,
				offset:'0',
				repeat:'20px'
			}],
		});
		polyline.setMap(map);
	}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCeP8_Gh03IJJc-mM5UdIq1hVwD1KqJTkk&callback=initMap"async defer></script><br />
</body>
___html___;
?>