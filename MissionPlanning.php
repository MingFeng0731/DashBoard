<?php
$link = mysqli_connect('localhost','root','');

$sql = 'CREATE DATABASE IF NOT EXISTS googlemap';
$result = mysqli_query($link,$sql);

mysqli_select_db($link,'googlemap');
$sql = 'CREATE TABLE IF NOT EXISTS Mission(No int AUTO_INCREMENT ,Date datetime not null,Latitude decimal(9,6) not null,Longitude decimal(9,6) not null, PRIMARY KEY(No))';
$result = mysqli_query($link,$sql);
$err='';

if(isset($_POST['send']))
{
	if(empty($_POST['locationText']))
	{
		$err = '請執行任務';
	}
	else{
		$Point = $_POST['locationText'];
		if(!empty($_POST['locationText']))
		{
			$every = explode(",",$Point);
			$Latitudebefore = $every;
			$Longitudebefore = $every;
			$num1=count($every);
			$num2=($num1/2)-1;
			for($i = 1 ; $i <= $num1; $i+=2)
			{
				unset($Latitudebefore[$i]);
			};
			for($x = 0 ; $x <= $num1; $x+=2)
			{
				unset($Longitudebefore[$x]);
			};
			$Latitude = array_values($Latitudebefore);
			$Longitude = array_values($Longitudebefore);
			for($a = 0 ; $a <= $num2 ; $a++)
			{
				
				$sql="insert into Mission(Date,Latitude,Longitude) values(NOW(),'$Latitude[$a]','$Longitude[$a]')";
				if($result = mysqli_query($link,$sql))
				{
					$err = "座標('$Point')新增成功";
				}
			}
		}
	}
}

print <<<___html___
<html lang="en-US">
<head>

<meta charset="UTF-8">
<title>使用Google Map API獲取經緯度</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<!-- Analytics by WP-Statistics v12.6.12 - https://wp-statistics.com/ -->
<style type="text/css">.entry-content {font-family: Helvetica Neue; font-size:14px; font-weight: normal; color:#6B6B6B;}</style><!--[if lt IE 9]>
<![endif]-->
<meta name="applicable-device" content="pc,mobile">
<meta name="keywords" content="c,c++,java,python,leetcode,algorithm,reading,life,moods,machine-learning,data-mining">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
</head>

<body class="post-template-default single single-post postid-3882 single-format-standard">

<div id="page" class="hfeed site">
<div id="content" class="site-content container">
	<div id="primary" class="content-area col-sm-12  pull-left">
		<main id="main" class="site-main">

		
			


	<header class="entry-header page-header">	
		<h1 class="entry-title ">使用Google Map API獲取經緯度<br>並進行任務規劃</h1>
	<!-- .entry-meta -->
	</header><!-- .entry-header -->
<ul>
<li>滑鼠左鍵點擊在地圖上新增標記，並顯示經緯度訊息</li>
<li>滑鼠右鍵可以取消不要的地圖標記</li>
<li>選擇完所需的標記位置後，點選OK離開地圖，並顯示所選之座標於下欄</li>
</ul>
<p>請點擊下方按鈕開始<br />
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCeP8_Gh03IJJc-mM5UdIq1hVwD1KqJTkk"type="text/javascript"></script><br />
<form action="MissionPlanning.php" method="post" class="form">
<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#google_maps_api">任務規劃</button></p>
<p>	<textarea class="form-control" name="locationText" id="locationText" rows="2" style="width:500px"></textarea></p>
<p> <input type="submit" class="btn btn-primary" name="send" value='任務執行'></p>
<p> $err


<div class="modal fade" id="google_maps_api" tabindex="-1" role="dialog"aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close"data-dismiss="modal" aria-hidden="true">&times;</button></p>
<div class="modal-title" id="myModalLabel">選取您所需的地點進行標記</div>
</div>
<div class="modal-body">
<div id="map_canvas" style="width: 100%; height: 450px"></div>
</div>
<div class="modal-footer"><button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">OK</button></div>
</div></div>
</div>
<p>
</form>









<script>
var googleMap = {
    map: null,
    markers: {},
    currentId: 0,
    uniqueId: function () {
        return ++this.currentId;
    },
    infowindow: new google.maps.InfoWindow({
        size: new google.maps.Size(150, 100)
    }),
    initialize: function () {
        if (this.map) return null;
        var myOptions = {
            zoom: 8,
            center: new google.maps.LatLng(23.73316, 120.81964),
            mapTypeControl: true,
            mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
            navigationControl: true,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        this.map = new google.maps.Map(document.getElementById("map_canvas"),
            myOptions);
        google.maps.event.addListener(this.map, 'click', function () {
            googleMap.infowindow.close();
        });
        google.maps.event.addListener(this.map, 'click', function (event) {
            var Latitude = event.latLng.lat().toFixed(6);
            var longitude = event.latLng.lng().toFixed(6);
            googleMap.addMarker(event.latLng, "name", "<b>Location</b><br />" +Latitude +","+ longitude,
                Latitude +","+ longitude);
        });
		poly = new google.maps.Polyline({  
		strokeColor: '#FF0000',  
		strokeOpacity: 1.0,  
		strokeWeight: 3  
		});  
		poly.setMap(googleMap.map); 
		google.maps.event.addListener(this.map, 'click', function (event) {
			var path = poly.getPath();
			path.push(event.latLng);
		});
		
		
		//map.addListener('click', addLatLng);  
        //google.maps.event.addListener(this.map, 'click', function (event) {
        //    console.log("Latitude: " + event.latLng.lat() + " " + ", longitude: " + event.latLng.lng());
        //});
    },
	
    addMarker: function (Gpoint, name, contentString, geo) {
        var id = this.uniqueId(); // get new id
        marker = new google.maps.Marker({
            id: id,
            position: Gpoint,
            geo : geo,
            map: googleMap.map,
            draggable: true,
            animation: google.maps.Animation.DROP
        });
        google.maps.event.addListener(marker, 'click', function () {
            googleMap.infowindow.setPosition(this.position);
            googleMap.infowindow.setContent(contentString);
            googleMap.infowindow.open(googleMap.map, marker);
        });
        google.maps.event.trigger(marker, 'click');
        googleMap.map.panTo(Gpoint);
        this.markers[id] = marker;
        google.maps.event.addListener(marker, "rightclick", function (point) {
            googleMap.delMarker(this.id)
        });
        //var res = '';
        //for (i in googleMap.markers){
        //   res += googleMap.markers[i].geo + ',';
        //}
        //res = res.substring(0,res.length-1)
        //console.log(res);
    },
    delMarker: function (id) {
        this.markers[id].setMap(null);
        delete  this.markers[id];
    },
	removeLine: function () {
        poly.setMap(null);
      }
};
</script>
<script>
		jQuery(document).ready(function($) {
			$("#google_maps_api").on("shown.bs.modal", function () {
				googleMap.initialize();
			   // googleMap.maps.event.trigger(map, "resize");
			}).on('hide.bs.modal', function () { //关闭模态框
				var res = '';
				for (var i in googleMap.markers)
					res += ''+ googleMap.markers[i].geo + ',';
				res = res.substring(0,res.length-1);
				$("#locationText").val(res);
			});
		});
</script></p>
</body>
</html>
___html___;
?>