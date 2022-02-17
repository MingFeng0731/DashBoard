<?php

$link = mysqli_connect('localhost','root','');

mysqli_select_db($link,'FQDatabase');
$err1='';$err2='';$err3='';$err4='';$err5='';$err6='';$err7='';$err8='';$err9='';
$err10='';$err11='';$err12='';$err13='';$err14='';$err15='';
if(isset($_POST['send']))
{
	$sql1 = "SELECT * FROM Car1 ORDER BY id DESC LIMIT 1";
	$result1 = mysqli_query($link,$sql1);

	$sql2 = "SELECT * FROM Car2 ORDER BY id DESC LIMIT 1";
	$result2 = mysqli_query($link,$sql2);

	$sql3 = "SELECT * FROM Car3 ORDER BY id DESC LIMIT 1";
	$result3 = mysqli_query($link,$sql3);

	if(mysqli_num_rows($result1) > 0){  
		while($row = mysqli_fetch_assoc($result1)){  
			$err1 = " {$row['power']}";
			$err2 = " {$row['speed']}"; 
			$err3 = " {$row['water']}"; 
			$err10 = " {$row['lat']}";
			$err11 = " {$row['lng']}";
		} //end of while  
	}else{  
		echo "0 results";  
	}
	if(mysqli_num_rows($result2) > 0){  
		while($row = mysqli_fetch_assoc($result2)){  
			$err4 = " {$row['power']}";
			$err5 = " {$row['speed']}"; 
			$err6 = " {$row['water']}"; 
			$err12 = " {$row['lat']}";
			$err13 = " {$row['lng']}";
		} //end of while  
	}else{  
		echo "0 results";    
	}

	if(mysqli_num_rows($result3) > 0){  
		while($row = mysqli_fetch_assoc($result3)){  
			$err7 = " {$row['power']}";
			$err8 = " {$row['speed']}"; 
			$err9 = " {$row['water']}";
			$err14 = " {$row['lat']}";
			$err15 = " {$row['lng']}";
		} //end of while  
	}else{  
		echo "0 results";   
	}
}
print <<< ___html___
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Autonomous Vehicle Control Board</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="http://vjs.zencdn.net/5.4.6/video-js.min.css" rel="stylesheet">
<script src="http://vjs.zencdn.net/5.4.6/video.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Play:700,400' type='text/css'>
<script type="text/javascript" src="http://iop.io/js/vendor/d3.v3.min.js"></script>
<script type="text/javascript" src="http://iop.io/js/vendor/polymer/PointerEvents/pointerevents.js"></script>
<script type="text/javascript" src="http://iop.io/js/vendor/polymer/PointerGestures/pointergestures.js"></script>
<script type="text/javascript" src="http://iop.io/js/iopctrl.js"></script>
<script src="https://cdn.bootcdn.net/ajax/libs/flv.js/1.5.0/flv.min.js"></script>


<script>
  videojs.options.flash.swf = "VideoJS.swf";
</script>

</head>

<body>
<style>
html, body{
    width: 100%;
    height: 100%;
	background-color: #272727;
}
@media screen and (min-width:360px){
    #DIV_1{
		position: absolute;
		left : 0.5%;
		top : 1%;
		width: 100%;
		height:45%;
		border:#7B7B7B 5px solid;
	}
    #videoElement{
        position: absolute;
		width: 100%;
		height:100%;
    }

    #speedrange1{
		position: absolute;
		left : 3%;
		top : 163%;
		width: 15%;
		height:5%;
	}
    #speedrange2{
		position: absolute;
		left : 23%;
		top : 163%;
		width: 15%;
		height:5%;
	}
    #speedrange3{
		position: absolute;
		left : 43%;
		top : 163%;
		width: 15%;
		height:5%;
	}
	#DIV_2{
		position:absolute;
		top:139%;
		right:80%;
		width: 20%;
		height:30%;
		background-color:#272727;
		border:#7B7B7B 5px solid;
		font-size:110%;
		color:7B7B7B;
		font-weight:bold;
	}
	#DIV_3{
		position:absolute;
		top:139%;
		right:59%;
		width: 20%;
		height:30%;
		background-color:#272727;
		border:#7B7B7B 5px solid;
		font-size:110%;
		color:7B7B7B;
		font-weight:bold;
	}
	#DIV_4{
		position:absolute;
		top:139%;
		right:38%;
		width: 20%;
		height:30%;
		background-color:#272727;
		border:#7B7B7B 5px solid;
		font-size:110%;
		color:7B7B7B;
		font-weight:bold;
	}
    #map{
		position:absolute;
		left:0.5%;
		top:47%;
        width: 100%;
        height: 45%;
		border:#7B7B7B 5px solid;
    }
	#but1{
		position: absolute;
		right:0.5%;
		top:140%;
	}
    #but2{
        position: absolute;
        right:0.5%;
        top:145%;
    }
	#but3{
		position: absolute;
		right: 0.5%;
		top:150%;
	}
	#but4{
		position: absolute;
		right: 0.5%;
		top:155%;
	}
	#but5{
		position: absolute;
		right: 0.5%;
		top:160%;
	}
	#but6{
		position: absolute;
		right: 0.5%;
		top:165%;
	}
	#slam{
		position: absolute;
		left: 0.5%;
		top:93%;
		width: 100%;
		height:45%;
		border:#7B7B7B 5px solid;	
	}
	#power1{
		position:absolute;
		left:15%;
		top:10%;
		font-size:150%;
	}
	#power2{
		position:absolute;
		left:15%;
		top:10%;
		font-size:150%;
	}
	#power3{
		position:absolute;
		left:15%;
		top:10%;
		font-size:150%;
	}
	#speedicon1{
		position:absolute;
		left:15%;
		top:60%;
		font-size:150%;
	}
	#speedicon2{
		position:absolute;
		left:15%;
		top:60%;
		font-size:150%;
	}
	#speedicon3{
		position:absolute;
		left:15%;
		top:60%;
		font-size:150%;
	}
	#watericon1{
		position:absolute;
		left:15%;
		top:35%;
		font-size:150%;
	}
	#watericon2{
		position:absolute;
		left:15%;
		top:35%;
		font-size:150%;
	}
	#watericon3{
		position:absolute;
		left:15%;
		top:35%;
		font-size:150%;
	}	
	#powerword1{
		position:absolute;
		left:15%;
		top:20%;
		color:white;
		font-size:150%;"
	}
	#powerword2{
		position:absolute;
		left:15%;
		top:20%;
		color:white;
		font-size:150%;"
	}
	#powerword3{
		position:absolute;
		left:15%;
		top:20%;
		color:white;
		font-size:150%;
	}
	#speedword1{
		position:absolute;
		left:15%;
		top:70%;
		color:white;
		font-size:150%;
	}
	#speedword2{
		position:absolute;
		left:15%;
		top:70%;
		color:white;
		font-size:150%;
	}
	#speedword3{
		position:absolute;
		left:15%;
		top:70%;
		color:white;
		font-size:150%;
	}
	#waterword1{
		position:absolute;
		left:15%;
		top:45%;
		color:white;
		font-size:150%;
	}
	#waterword2{
		position:absolute;
		left:15%;
		top:45%;
		color:white;
		font-size:150%;
	}
	#waterword3{
		position:absolute;
		left:15%;
		top:45%;
		color:white;
		font-size:150%;
	}
	.unselectable {
        -moz-user-select: -moz-none;
        -khtml-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    /* css formats for the gauge */
    .gauge .domain {        /*外圓*/
        stroke-width: 2px;
        stroke: #fff;
    }
    .gauge .tick line {  /*粗線(大刻度)*/
        stroke: #fff;
        stroke-width: 3px;
    } 
    .gauge line {  /*小刻度*/
        stroke: #fff;
    }
    .gauge .arc, .gauge .cursor {  /*內圈顏色*/
        opacity: 0;
    }
    .gauge .major {  /*數字*/
        fill: #fff;
        font-size: 10px;
        font-family: 'Play', verdana, sans-serif;
        font-weight: normal;
    }
    .gauge .indicator {    /* 指針*/
        stroke: #EE3311;
        fill: #000;
        stroke-width: 2px;
    }
    /* css formats for the segment display */  
    .segdisplay .on {  /*數位數字 */
        fill: #00FFFF;
    }
    .segdisplay .off {  /*off的時候的顏色深淺 */
        fill: #00FFFF;
        opacity: 0.15;
    }
	.speed1{
		position:absolute;
		right: 2%;
		top: 0%;
		opacity:0;
		display: none;
	}
	.speed2{
		position:absolute;
		right: 2%;
		top: 25%;
		opacity:0;
		display: none;
	}
	.speed3{
		position:absolute;
		right: 2%;
		top: 50%;
		opacity:0;
		display: none;
	}
	.water1{
		position:absolute;
		right:12%;
		top:0%;
		opacity:0;
		display: none;
	}
	.water2{
		position:absolute;
		right:12%;
		top:25%;
		opacity:0;
		display: none;
	}
	.water3{
		position:absolute;
		right:12%;
		top:50%;
		opacity:0;
		display: none;
	}
	#allpower{
        position:absolute;
		left:1.5%; 
		top:94%; 
		width:98%; 
		height:43%;
		background-color: #272727;
	}
}
@media screen and (min-width:480px){
    #DIV_1{
		position: absolute;
		left : 0.5%;
		top : 1%;
		width: 100%;
		height:45%;
		border:#7B7B7B 5px solid;
	}
    #videoElement{
        position: absolute;
		width: 100%;
		height:100%;
    }

    #speedrange1{
		position: absolute;
		left : 3%;
		top : 163%;
		width: 15%;
		height:5%;
	}
    #speedrange2{
		position: absolute;
		left : 23%;
		top : 163%;
		width: 15%;
		height:5%;
	}
    #speedrange3{
		position: absolute;
		left : 43%;
		top : 163%;
		width: 15%;
		height:5%;
	}
	#DIV_2{
		position:absolute;
		top:139%;
		right:80%;
		width: 20%;
		height:30%;
		background-color:#272727;
		border:#7B7B7B 5px solid;
		font-size:110%;
		color:7B7B7B;
		font-weight:bold;
	}
	#DIV_3{
		position:absolute;
		top:139%;
		right:59%;
		width: 20%;
		height:30%;
		background-color:#272727;
		border:#7B7B7B 5px solid;
		font-size:110%;
		color:7B7B7B;
		font-weight:bold;
	}
	#DIV_4{
		position:absolute;
		top:139%;
		right:38%;
		width: 20%;
		height:30%;
		background-color:#272727;
		border:#7B7B7B 5px solid;
		font-size:110%;
		color:7B7B7B;
		font-weight:bold;
	}
    #map{
		position:absolute;
		left:0.5%;
		top:47%;
        width: 100%;
        height: 45%;
		border:#7B7B7B 5px solid;
    }
	#but1{
		position: absolute;
		right:0.5%;
		top:140%;
	}
    #but2{
        position: absolute;
        right:0.5%;
        top:145%;
    }
	#but3{
		position: absolute;
		right: 0.5%;
		top:150%;
	}
	#but4{
		position: absolute;
		right: 0.5%;
		top:155%;
	}
	#but5{
		position: absolute;
		right: 0.5%;
		top:160%;
	}
	#but6{
		position: absolute;
		right: 0.5%;
		top:165%;
	}
	#slam{
		position: absolute;
		left: 0.5%;
		top:93%;
		width: 100%;
		height:45%;
		border:#7B7B7B 5px solid;	
	}
	#power1{
		position:absolute;
		left:5%;
		top:10%;
		font-size:250%;
	}
	#power2{
		position:absolute;
		left:5%;
		top:10%;
		font-size:250%;
	}
	#power3{
		position:absolute;
		left:5%;
		top:10%;
		font-size:250%;
	}
	#speedicon1{
		position:absolute;
		left:5%;
		top:60%;
		font-size:250%;
	}
	#speedicon2{
		position:absolute;
		left:5%;
		top:60%;
		font-size:250%;
	}
	#speedicon3{
		position:absolute;
		left:5%;
		top:60%;
		font-size:250%;
	}
	#watericon1{
		position:absolute;
		left:5%;
		top:35%;
		font-size:250%;
	}
	#watericon2{
		position:absolute;
		left:5%;
		top:35%;
		font-size:250%;
	}
	#watericon3{
		position:absolute;
		left:5%;
		top:35%;
		font-size:250%;
	}	
	#powerword1{
		position:absolute;
		left:70%;
		top:10%;
		color:white;
		font-size:150%;"
	}
	#powerword2{
		position:absolute;
		left:70%;
		top:10%;
		color:white;
		font-size:150%;"
	}
	#powerword3{
		position:absolute;
		left:70%;
		top:10%;
		color:white;
		font-size:150%;
	}
	#speedword1{
		position:absolute;
		left:70%;
		top:60%;
		color:white;
		font-size:150%;
	}
	#speedword2{
		position:absolute;
		left:70%;
		top:60%;
		color:white;
		font-size:150%;
	}
	#speedword3{
		position:absolute;
		left:70%;
		top:60%;
		color:white;
		font-size:150%;
	}
	#waterword1{
		position:absolute;
		left:70%;
		top:35%;
		color:white;
		font-size:150%;
	}
	#waterword2{
		position:absolute;
		left:70%;
		top:35%;
		color:white;
		font-size:150%;
	}
	#waterword3{
		position:absolute;
		left:70%;
		top:35%;
		color:white;
		font-size:150%;
	}
	.unselectable {
        -moz-user-select: -moz-none;
        -khtml-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    /* css formats for the gauge */
    .gauge .domain {        /*外圓*/
        stroke-width: 2px;
        stroke: #fff;
    }
    .gauge .tick line {  /*粗線(大刻度)*/
        stroke: #fff;
        stroke-width: 3px;
    } 
    .gauge line {  /*小刻度*/
        stroke: #fff;
    }
    .gauge .arc, .gauge .cursor {  /*內圈顏色*/
        opacity: 0;
    }
    .gauge .major {  /*數字*/
        fill: #fff;
        font-size: 10px;
        font-family: 'Play', verdana, sans-serif;
        font-weight: normal;
    }
    .gauge .indicator {    /* 指針*/
        stroke: #EE3311;
        fill: #000;
        stroke-width: 2px;
    }
    /* css formats for the segment display */  
    .segdisplay .on {  /*數位數字 */
        fill: #00FFFF;
    }
    .segdisplay .off {  /*off的時候的顏色深淺 */
        fill: #00FFFF;
        opacity: 0.15;
    }
	.speed1{
		position:absolute;
		right: 2%;
		top: 0%;
		opacity:0;
		display: none;
	}
	.speed2{
		position:absolute;
		right: 2%;
		top: 25%;
		opacity:0;
		display: none;
	}
	.speed3{
		position:absolute;
		right: 2%;
		top: 50%;
		opacity:0;
		display: none;
	}
	.water1{
		position:absolute;
		right:12%;
		top:0%;
		opacity:0;
		display: none;
	}
	.water2{
		position:absolute;
		right:12%;
		top:25%;
		opacity:0;
		display: none;
	}
	.water3{
		position:absolute;
		right:12%;
		top:50%;
		opacity:0;
		display: none;
	}
	#allpower{
        position:absolute;
		left:1.5%; 
		top:94%; 
		width:98%; 
		height:43%;
		background-color: #272727;
	}
}
@media screen and (min-width:720px){
    #DIV_1{
		position: absolute;
		left : 0.5%;
		top : 1%;
		width: 78%;
		height:45%;
		border:#7B7B7B 5px solid;
	}
    #videoElement{
        position: absolute;
		width: 100%;
		height:100%;
    }

    #speedrange1{
		position: absolute;
		left : 82%;
		top : 25%;
		width: 15%;
		height:5%;
	}
    #speedrange2{
		position: absolute;
		left : 82%;
		top : 56%;
		width: 15%;
		height:5%;
	}
    #speedrange3{
		position: absolute;
		left : 82%;
		top : 87%;
		width: 15%;
		height:5%;
	}
	#DIV_2{
		position:absolute;
		top:1%;
		right:0.5%;
		width: 20%;
		height:30%;
		background-color:#272727;
		border:#7B7B7B 5px solid;
		font-size:110%;
		color:7B7B7B;
		font-weight:bold;
	}
	#DIV_3{
		position:absolute;
		top:32%;
		right:0.5%;
		width: 20%;
		height:30%;
		background-color:#272727;
		border:#7B7B7B 5px solid;
		font-size:110%;
		color:7B7B7B;
		font-weight:bold;
	}
	#DIV_4{
		position:absolute;
		top:63%;
		right:0.5%;
		width: 20%;
		height:30%;
		background-color:#272727;
		border:#7B7B7B 5px solid;
		font-size:110%;
		color:7B7B7B;
		font-weight:bold;
	}
    #map{
		position:absolute;
		left:0.5%;
		top:47%;
        width: 78%;
        height: 45%;
		border:#7B7B7B 5px solid;
    }
	#but1{
		position: absolute;
		right:3.5%;
		top:94%;
	}
    #but2{
        position: absolute;
        right:3.5%;
        top:100%;
    }
	#but3{
		position: absolute;
		right: 3.5%;
		top:106%;
	}
	#but4{
		position: absolute;
		right: 3.5%;
		top:112%;
	}
	#but5{
		position: absolute;
		right: 3.5%;
		top:118%;
	}
	#but6{
		position: absolute;
		right: 3.5%;
		top:124%;
	}
	#slam{
		position: absolute;
		left: 0.5%;
		top:93%;
		width: 78%;
		height:45%;
		border:#7B7B7B 5px solid;	
	}
	#power1{
		position:absolute;
		left:5%;
		top:10%;
		font-size:250%;
	}
	#power2{
		position:absolute;
		left:5%;
		top:10%;
		font-size:250%;
	}
	#power3{
		position:absolute;
		left:5%;
		top:10%;
		font-size:250%;
	}
	#speedicon1{
		position:absolute;
		left:5%;
		top:60%;
		font-size:250%;
	}
	#speedicon2{
		position:absolute;
		left:5%;
		top:60%;
		font-size:250%;
	}
	#speedicon3{
		position:absolute;
		left:5%;
		top:60%;
		font-size:250%;
	}
	#watericon1{
		position:absolute;
		left:5%;
		top:35%;
		font-size:250%;
	}
	#watericon2{
		position:absolute;
		left:5%;
		top:35%;
		font-size:250%;
	}
	#watericon3{
		position:absolute;
		left:5%;
		top:35%;
		font-size:250%;
	}	
	#powerword1{
		position:absolute;
		left:70%;
		top:10%;
		color:white;
		font-size:150%;"
	}
	#powerword2{
		position:absolute;
		left:70%;
		top:10%;
		color:white;
		font-size:150%;"
	}
	#powerword3{
		position:absolute;
		left:70%;
		top:10%;
		color:white;
		font-size:150%;
	}
	#speedword1{
		position:absolute;
		left:70%;
		top:60%;
		color:white;
		font-size:150%;
	}
	#speedword2{
		position:absolute;
		left:70%;
		top:60%;
		color:white;
		font-size:150%;
	}
	#speedword3{
		position:absolute;
		left:70%;
		top:60%;
		color:white;
		font-size:150%;
	}
	#waterword1{
		position:absolute;
		left:70%;
		top:35%;
		color:white;
		font-size:150%;
	}
	#waterword2{
		position:absolute;
		left:70%;
		top:35%;
		color:white;
		font-size:150%;
	}
	#waterword3{
		position:absolute;
		left:70%;
		top:35%;
		color:white;
		font-size:150%;
	}
	.unselectable {
        -moz-user-select: -moz-none;
        -khtml-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    /* css formats for the gauge */
    .gauge .domain {        /*外圓*/
        stroke-width: 2px;
        stroke: #fff;
    }
    .gauge .tick line {  /*粗線(大刻度)*/
        stroke: #fff;
        stroke-width: 3px;
    } 
    .gauge line {  /*小刻度*/
        stroke: #fff;
    }
    .gauge .arc, .gauge .cursor {  /*內圈顏色*/
        opacity: 0;
    }
    .gauge .major {  /*數字*/
        fill: #fff;
        font-size: 10px;
        font-family: 'Play', verdana, sans-serif;
        font-weight: normal;
    }
    .gauge .indicator {    /* 指針*/
        stroke: #EE3311;
        fill: #000;
        stroke-width: 2px;
    }
    /* css formats for the segment display */  
    .segdisplay .on {  /*數位數字 */
        fill: #00FFFF;
    }
    .segdisplay .off {  /*off的時候的顏色深淺 */
        fill: #00FFFF;
        opacity: 0.15;
    }
	.speed1{
		position:absolute;
		right: 2%;
		top: 0%;
		opacity:0;
		display: none;
	}
	.speed2{
		position:absolute;
		right: 2%;
		top: 25%;
		opacity:0;
		display: none;
	}
	.speed3{
		position:absolute;
		right: 2%;
		top: 50%;
		opacity:0;
		display: none;
	}
	.water1{
		position:absolute;
		right:12%;
		top:0%;
		opacity:0;
		display: none;
	}
	.water2{
		position:absolute;
		right:12%;
		top:25%;
		opacity:0;
		display: none;
	}
	.water3{
		position:absolute;
		right:12%;
		top:50%;
		opacity:0;
		display: none;
	}
	#allpower{
        position:absolute;
		left:1.5%; 
		top:94%; 
		width:76%; 
		height:43%;
		background-color: #272727;
	}
}
@media screen and (min-width:1080px){
    #DIV_1{
		position: absolute;
		left : 0.5%;
		top : 1%;
		width: 50%;
		height:45%;
		border:#7B7B7B 5px solid;
	}
    #videoElement{
        position: absolute;
		width: 100%;
		height:100%;
    }

    #speedrange1{
		position: absolute;
		left : 88.5%;
		top : 25%;
		width: 10%;
		height:5%;
	}
    #speedrange2{
		position: absolute;
		left : 88.5%;
		top : 56%;
		width: 10%;
		height:5%;
	}
    #speedrange3{
		position: absolute;
		left : 88.5%;
		top : 87%;
		width: 10%;
		height:5%;
	}
	#DIV_2{
		position:absolute;
		top:1%;
		right:0.5%;
		width: 12%;
		height:30%;
		background-color:#272727;
		border:#7B7B7B 5px solid;
		font-size:110%;
		color:7B7B7B;
		font-weight:bold;
	}
	#DIV_3{
		position:absolute;
		top:32%;
		right:0.5%;
		width: 12%;
		height:30%;
		background-color:#272727;
		border:#7B7B7B 5px solid;
		font-size:110%;
		color:7B7B7B;
		font-weight:bold;
	}
	#DIV_4{
		position:absolute;
		top:63%;
		right:0.5%;
		width: 12%;
		height:30%;
		background-color:#272727;
		border:#7B7B7B 5px solid;
		font-size:110%;
		color:7B7B7B;
		font-weight:bold;
	}
    #map{
		position:absolute;
		left:0.5%;
		top:47%;
        width: 50%;
        height: 45.5%;
		border:#7B7B7B 5px solid;
    }
	#but1{
		position: absolute;
		left:0.5%;
		top:94%;
	}
    #but2{
        position: absolute;
        left:11.5%;
        top:94%;
    }
	#but3{
		position: absolute;
		left:22.5%;
		top:94%;
	}
	#but4{
		position: absolute;
		left:33.5%;
		top:94%;
	}
	#but5{
		position: absolute;
		left:45%;
		top:94%;
	}
	#but6{
		position: absolute;
		left:57%;
		top:94%;
	}
	#slam{
		position: absolute;
		left: 51%;
		top:1%;
		width: 36%;
		height:91.5%;
		border:#7B7B7B 5px solid;	
	}
	#power1{
		position:absolute;
		left:5%;
		top:10%;
		font-size:350%;
	}
	#power2{
		position:absolute;
		left:5%;
		top:10%;
		font-size:350%;
	}
	#power3{
		position:absolute;
		left:5%;
		top:10%;
		font-size:350%;
	}
	#speedicon1{
		position:absolute;
		left:5%;
		top:60%;
		font-size:350%;
	}
	#speedicon2{
		position:absolute;
		left:5%;
		top:60%;
		font-size:350%;
	}
	#speedicon3{
		position:absolute;
		left:5%;
		top:60%;
		font-size:350%;
	}
	#watericon1{
		position:absolute;
		left:5%;
		top:35%;
		font-size:350%;
	}
	#watericon2{
		position:absolute;
		left:5%;
		top:35%;
		font-size:350%;
	}
	#watericon3{
		position:absolute;
		left:5%;
		top:35%;
		font-size:350%;
	}	
	#powerword1{
		position:absolute;
		left:70%;
		top:10%;
		color:white;
		font-size:200%;"
	}
	#powerword2{
		position:absolute;
		left:70%;
		top:10%;
		color:white;
		font-size:200%;"
	}
	#powerword3{
		position:absolute;
		left:70%;
		top:10%;
		color:white;
		font-size:200%;
	}
	#speedword1{
		position:absolute;
		left:70%;
		top:60%;
		color:white;
		font-size:200%;
	}
	#speedword2{
		position:absolute;
		left:70%;
		top:60%;
		color:white;
		font-size:200%;
	}
	#speedword3{
		position:absolute;
		left:70%;
		top:60%;
		color:white;
		font-size:200%;
	}
	#waterword1{
		position:absolute;
		left:70%;
		top:35%;
		color:white;
		font-size:200%;
	}
	#waterword2{
		position:absolute;
		left:70%;
		top:35%;
		color:white;
		font-size:200%;
	}
	#waterword3{
		position:absolute;
		left:70%;
		top:35%;
		color:white;
		font-size:200%;
	}
	.unselectable {
        -moz-user-select: -moz-none;
        -khtml-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    /* css formats for the gauge */
    .gauge .domain {        /*外圓*/
        stroke-width: 2px;
        stroke: #fff;
    }
    .gauge .tick line {  /*粗線(大刻度)*/
        stroke: #fff;
        stroke-width: 3px;
    } 
    .gauge line {  /*小刻度*/
        stroke: #fff;
    }
    .gauge .arc, .gauge .cursor {  /*內圈顏色*/
        opacity: 0;
    }
    .gauge .major {  /*數字*/
        fill: #fff;
        font-size: 10px;
        font-family: 'Play', verdana, sans-serif;
        font-weight: normal;
    }
    .gauge .indicator {    /* 指針*/
        stroke: #EE3311;
        fill: #000;
        stroke-width: 2px;
    }
    /* css formats for the segment display */  
    .segdisplay .on {  /*數位數字 */
        fill: #00FFFF;
    }
    .segdisplay .off {  /*off的時候的顏色深淺 */
        fill: #00FFFF;
        opacity: 0.15;
    }
	.speed1{
		position:absolute;
		right: 2%;
		top: 0%;
		opacity:0;
	}
	.speed2{
		position:absolute;
		right: 2%;
		top: 25%;
		opacity:0;
	}
	.speed3{
		position:absolute;
		right: 2%;
		top: 50%;
		opacity:0;
	}
	.water1{
		position:absolute;
		right:12%;
		top:0%;
		opacity:0;
	}
	.water2{
		position:absolute;
		right:12%;
		top:25%;
		opacity:0;
	}
	.water3{
		position:absolute;
		right:12%;
		top:50%;
		opacity:0;
	}
	#allpower{
        position:absolute;
		left:51.5%; 
		top:1.6%; 
		width:35%; 
		height:45%;
		background-color: #272727;
	}
}
@media screen and (min-width:1440px){ 
    #DIV_1{
		position: absolute;
		left : 0.5%;
		top : 1%;
		width: 50%;
		height:45%;
		border:#7B7B7B 5px solid;
	}
    #videoElement{
        position: absolute;
		width: 100%;
		height:100%;
    }

    #speedrange1{
		position: absolute;
		left:88.5%;
		top : 25%;
		width: 10%;
		height:5%;
	}
    #speedrange2{
		position: absolute;
		left:88.5%;
		top : 56%;
		width: 10%;
		height:5%;
	}
    #speedrange3{
		position: absolute;
		left:88.5%;
		top : 87%;
		width: 10%;
		height:5%;
	}
	#DIV_2{
		position:absolute;
		top:1%;
		right:0.5%;
		width: 12%;
		height:30%;
		background-color:#272727;
		border:#7B7B7B 5px solid;
		font-size:110%;
		color:7B7B7B;
		font-weight:bold;
	}
	#DIV_3{
		position:absolute;
		top:32%;
		right:0.5%;
		width: 12%;
		height:30%;
		background-color:#272727;
		border:#7B7B7B 5px solid;
		font-size:110%;
		color:7B7B7B;
		font-weight:bold;
	}
	#DIV_4{
		position:absolute;
		top:63%;
		right:0.5%;
		width: 12%;
		height:30%;
		background-color:#272727;
		border:#7B7B7B 5px solid;
		font-size:110%;
		color:7B7B7B;
		font-weight:bold;
	}
    #map{
		position:absolute;
		left:0.5%;
		top:47%;
        width: 50%;
        height: 45.5%;
		border:#7B7B7B 5px solid;
    }
	#but1{
		position: absolute;
		left:0.5%;
		top:94%;
	}
    #but2{
        position: absolute;
        left:10.5%;
        top:94%;
    }
	#but3{
		position: absolute;
		left:20.5%;
		top:94%;
	}
	#but4{
		position: absolute;
		left:31%;
		top:94%;
	}
	#but5{
		position: absolute;
		left:41%;
		top:94%;
	}
	#but6{
		position: absolute;
		left:51%;
		top:94%;
	}
	#slam{
		position: absolute;
		left: 51%;
		top:1%;
		width: 36%;
		height:91.5%;
		border:#7B7B7B 5px solid;	
	}
	#power1{
		position:absolute;
		left:5%;
		top:10%;
		font-size:350%;
	}
	#power2{
		position:absolute;
		left:5%;
		top:10%;
		font-size:350%;
	}
	#power3{
		position:absolute;
		left:5%;
		top:10%;
		font-size:350%;
	}
	#speedicon1{
		position:absolute;
		left:5%;
		top:60%;
		font-size:350%;
	}
	#speedicon2{
		position:absolute;
		left:5%;
		top:60%;
		font-size:350%;
	}
	#speedicon3{
		position:absolute;
		left:5%;
		top:60%;
		font-size:350%;
	}
	#watericon1{
		position:absolute;
		left:5%;
		top:35%;
		font-size:350%;
	}
	#watericon2{
		position:absolute;
		left:5%;
		top:35%;
		font-size:350%;
	}
	#watericon3{
		position:absolute;
		left:5%;
		top:35%;
		font-size:350%;
	}	
	#powerword1{
		position:absolute;
		left:70%;
		top:10%;
		color:white;
		font-size:200%;
	}
	#powerword2{
		position:absolute;
		left:70%;
		top:10%;
		color:white;
		font-size:200%;
	}
	#powerword3{
		position:absolute;
		left:70%;
		top:10%;
		color:white;
		font-size:200%;
	}
	#speedword1{
		position:absolute;
		left:70%;
		top:60%;
		color:white;
		font-size:200%;
	}
	#speedword2{
		position:absolute;
		left:70%;
		top:60%;
		color:white;
		font-size:200%;
	}
	#speedword3{
		position:absolute;
		left:70%;
		top:60%;
		color:white;
		font-size:200%;
	}
	#waterword1{
		position:absolute;
		left:70%;
		top:35%;
		color:white;
		font-size:200%;
	}
	#waterword2{
		position:absolute;
		left:70%;
		top:35%;
		color:white;
		font-size:200%;
	}
	#waterword3{
		position:absolute;
		left:70%;
		top:35%;
		color:white;
		font-size:200%;
	}
	.unselectable {
        -moz-user-select: -moz-none;
        -khtml-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    /* css formats for the gauge */
    .gauge .domain {        /*外圓*/
        stroke-width: 2px;
        stroke: #fff;
    }
    .gauge .tick line {  /*粗線(大刻度)*/
        stroke: #fff;
        stroke-width: 3px;
    } 
    .gauge line {  /*小刻度*/
        stroke: #fff;
    }
    .gauge .arc, .gauge .cursor {  /*內圈顏色*/
        opacity: 0;
    }
    .gauge .major {  /*數字*/
        fill: #fff;
        font-size: 10px;
        font-family: 'Play', verdana, sans-serif;
        font-weight: normal;
    }
    .gauge .indicator {    /* 指針*/
        stroke: #EE3311;
        fill: #000;
        stroke-width: 2px;
    }
    /* css formats for the segment display */  
    .segdisplay .on {  /*數位數字 */
        fill: #00FFFF;
    }
    .segdisplay .off {  /*off的時候的顏色深淺 */
        fill: #00FFFF;
        opacity: 0.15;
    }
	.speed1{
		position:absolute;
		right: 2%;
		top: 0%;
	}
	.speed2{
		position:absolute;
		right: 2%;
		top: 25%;
	}
	.speed3{
		position:absolute;
		right: 2%;
		top: 50%;
	}
	.water1{
		position:absolute;
		right:12%;
		top:0%;
	}
	.water2{
		position:absolute;
		right:12%;
		top:25%;
	}
	.water3{
		position:absolute;
		right:12%;
		top:50%;
	}
	#allpower{
        position:absolute;
		left:51.5%; 
		top:1.6%; 
		width:35%; 
		height:45%;
		background-color: #272727;
	}
}
@media screen and (min-width:1920px){ 
    #DIV_1{
		position: absolute;
		left : 0.5%;
		top : 1%;
		width: 50%;
		height:45%;
		border:#7B7B7B 5px solid;
	}
    #videoElement{
        position: absolute;
		width: 100%;
		height:100%;
    }

    #speedrange1{
		position: absolute;
		left:88.5%;
		top : 25%;
		width: 10%;
		height:5%;
	}
    #speedrange2{
		position: absolute;
		left:88.5%;
		top : 56%;
		width: 10%;
		height:5%;
	}
    #speedrange3{
		position: absolute;
		left:88.5%;
		top : 87%;
		width: 10%;
		height:5%;
	}
	#DIV_2{
		position:absolute;
		top:1%;
		right:0.5%;
		width: 12%;
		height:30%;
		background-color:#272727;
		border:#7B7B7B 5px solid;
		font-size:110%;
		color:7B7B7B;
		font-weight:bold;
	}
	#DIV_3{
		position:absolute;
		top:32%;
		right:0.5%;
		width: 12%;
		height:30%;
		background-color:#272727;
		border:#7B7B7B 5px solid;
		font-size:110%;
		color:7B7B7B;
		font-weight:bold;
	}
	#DIV_4{
		position:absolute;
		top:63%;
		right:0.5%;
		width: 12%;
		height:30%;
		background-color:#272727;
		border:#7B7B7B 5px solid;
		font-size:110%;
		color:7B7B7B;
		font-weight:bold;
	}
    #map{
		position:absolute;
		left:0.5%;
		top:47%;
        width: 50%;
        height: 45.5%;
		border:#7B7B7B 5px solid;
    }
	#but1{
		position: absolute;
		left:0.5%;
		top:94%;
	}
    #but2{
        position: absolute;
        left:10.5%;
        top:94%;
    }
	#but3{
		position: absolute;
		left:20.5%;
		top:94%;
	}
	#but4{
		position: absolute;
		left:31%;
		top:94%;
	}
	#but5{
		position: absolute;
		left:41%;
		top:94%;
	}
	#but6{
		position: absolute;
		left:51%;
		top:94%;
	}
	#slam{
		position: absolute;
		left: 51%;
		top:1%;
		width: 36%;
		height:91.5%;
		border:#7B7B7B 5px solid;	
	}
	#power1{
		position:absolute;
		left:5%;
		top:10%;
		font-size:350%;
	}
	#power2{
		position:absolute;
		left:5%;
		top:10%;
		font-size:350%;
	}
	#power3{
		position:absolute;
		left:5%;
		top:10%;
		font-size:350%;
	}
	#speedicon1{
		position:absolute;
		left:5%;
		top:60%;
		font-size:350%;
	}
	#speedicon2{
		position:absolute;
		left:5%;
		top:60%;
		font-size:350%;
	}
	#speedicon3{
		position:absolute;
		left:5%;
		top:60%;
		font-size:350%;
	}
	#watericon1{
		position:absolute;
		left:5%;
		top:35%;
		font-size:350%;
	}
	#watericon2{
		position:absolute;
		left:5%;
		top:35%;
		font-size:350%;
	}
	#watericon3{
		position:absolute;
		left:5%;
		top:35%;
		font-size:350%;
	}	
	#powerword1{
		position:absolute;
		left:70%;
		top:10%;
		color:white;
		font-size:200%;
	}
	#powerword2{
		position:absolute;
		left:70%;
		top:10%;
		color:white;
		font-size:200%;
	}
	#powerword3{
		position:absolute;
		left:70%;
		top:10%;
		color:white;
		font-size:200%;
	}
	#speedword1{
		position:absolute;
		left:70%;
		top:60%;
		color:white;
		font-size:200%;
	}
	#speedword2{
		position:absolute;
		left:70%;
		top:60%;
		color:white;
		font-size:200%;
	}
	#speedword3{
		position:absolute;
		left:70%;
		top:60%;
		color:white;
		font-size:200%;
	}
	#waterword1{
		position:absolute;
		left:70%;
		top:35%;
		color:white;
		font-size:200%;
	}
	#waterword2{
		position:absolute;
		left:70%;
		top:35%;
		color:white;
		font-size:200%;
	}
	#waterword3{
		position:absolute;
		left:70%;
		top:35%;
		color:white;
		font-size:200%;
	}
	.unselectable {
        -moz-user-select: -moz-none;
        -khtml-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    /* css formats for the gauge */
    .gauge .domain {        /*外圓*/
        stroke-width: 2px;
        stroke: #fff;
    }
    .gauge .tick line {  /*粗線(大刻度)*/
        stroke: #fff;
        stroke-width: 3px;
    } 
    .gauge line {  /*小刻度*/
        stroke: #fff;
    }
    .gauge .arc, .gauge .cursor {  /*內圈顏色*/
        opacity: 0;
    }
    .gauge .major {  /*數字*/
        fill: #fff;
        font-size: 10px;
        font-family: 'Play', verdana, sans-serif;
        font-weight: normal;
    }
    .gauge .indicator {    /* 指針*/
        stroke: #EE3311;
        fill: #000;
        stroke-width: 2px;
    }
    /* css formats for the segment display */  
    .segdisplay .on {  /*數位數字 */
        fill: #00FFFF;
    }
    .segdisplay .off {  /*off的時候的顏色深淺 */
        fill: #00FFFF;
        opacity: 0.15;
    }
	.speed1{
		position:absolute;
		right: 2%;
		top: 0%;
	}
	.speed2{
		position:absolute;
		right: 2%;
		top: 25%;
	}
	.speed3{
		position:absolute;
		right: 2%;
		top: 50%;
	}
	.water1{
		position:absolute;
		right:12%;
		top:0%;
	}
	.water2{
		position:absolute;
		right:12%;
		top:25%;
	}
	.water3{
		position:absolute;
		right:12%;
		top:50%;
	}
	#allpower{
        position:absolute;
		left:51.5%; 
		top:1.6%; 
		width:34.5%; 
		height:90%;
		background-color: #272727;
	}
} 
@media screen and (min-width:2560px){
    #DIV_1{
		position: absolute;
		left : 0.5%;
		top : 1%;
		width: 50%;
		height:45%;
		border:#7B7B7B 5px solid;
	}
    #videoElement{
        position: absolute;
		width: 100%;
		height:100%;
    }

    #speedrange1{
		position: absolute;
		left:88.5%;
		top : 25%;
		width: 10%;
		height:5%;
	}
    #speedrange2{
		position: absolute;
		left:88.5%;
		top : 56%;
		width: 10%;
		height:5%;
	}
    #speedrange3{
		position: absolute;
		left:88.5%;
		top : 87%;
		width: 10%;
		height:5%;
	}
	#DIV_2{
		position:absolute;
		top:1%;
		right:0.5%;
		width: 12%;
		height:30%;
		background-color:#272727;
		border:#7B7B7B 5px solid;
		font-size:110%;
		color:7B7B7B;
		font-weight:bold;
	}
	#DIV_3{
		position:absolute;
		top:32%;
		right:0.5%;
		width: 12%;
		height:30%;
		background-color:#272727;
		border:#7B7B7B 5px solid;
		font-size:110%;
		color:7B7B7B;
		font-weight:bold;
	}
	#DIV_4{
		position:absolute;
		top:63%;
		right:0.5%;
		width: 12%;
		height:30%;
		background-color:#272727;
		border:#7B7B7B 5px solid;
		font-size:110%;
		color:7B7B7B;
		font-weight:bold;
	}
    #map{
		position:absolute;
		left:0.5%;
		top:47%;
        width: 50%;
        height: 45.5%;
		border:#7B7B7B 5px solid;
    }
	#but1{
		position: absolute;
		left:0.5%;
		top:94%;
	}
    #but2{
        position: absolute;
        left:10.5%;
        top:94%;
    }
	#but3{
		position: absolute;
		left:20.5%;
		top:94%;
	}
	#but4{
		position: absolute;
		left:31%;
		top:94%;
	}
	#but5{
		position: absolute;
		left:41%;
		top:94%;
	}
	#but6{
		position: absolute;
		left:51%;
		top:94%;
	}
	#slam{
		position: absolute;
		left: 51%;
		top:1%;
		width: 36%;
		height:91.5%;
		border:#7B7B7B 5px solid;	
	}
	#power1{
		position:absolute;
		left:5%;
		top:10%;
		font-size:350%;
	}
	#power2{
		position:absolute;
		left:5%;
		top:10%;
		font-size:350%;
	}
	#power3{
		position:absolute;
		left:5%;
		top:10%;
		font-size:350%;
	}
	#speedicon1{
		position:absolute;
		left:5%;
		top:60%;
		font-size:350%;
	}
	#speedicon2{
		position:absolute;
		left:5%;
		top:60%;
		font-size:350%;
	}
	#speedicon3{
		position:absolute;
		left:5%;
		top:60%;
		font-size:350%;
	}
	#watericon1{
		position:absolute;
		left:5%;
		top:35%;
		font-size:350%;
	}
	#watericon2{
		position:absolute;
		left:5%;
		top:35%;
		font-size:350%;
	}
	#watericon3{
		position:absolute;
		left:5%;
		top:35%;
		font-size:350%;
	}	
	#powerword1{
		position:absolute;
		left:70%;
		top:10%;
		color:white;
		font-size:200%;
	}
	#powerword2{
		position:absolute;
		left:70%;
		top:10%;
		color:white;
		font-size:200%;
	}
	#powerword3{
		position:absolute;
		left:70%;
		top:10%;
		color:white;
		font-size:200%;
	}
	#speedword1{
		position:absolute;
		left:70%;
		top:60%;
		color:white;
		font-size:200%;
	}
	#speedword2{
		position:absolute;
		left:70%;
		top:60%;
		color:white;
		font-size:200%;
	}
	#speedword3{
		position:absolute;
		left:70%;
		top:60%;
		color:white;
		font-size:200%;
	}
	#waterword1{
		position:absolute;
		left:70%;
		top:35%;
		color:white;
		font-size:200%;
	}
	#waterword2{
		position:absolute;
		left:70%;
		top:35%;
		color:white;
		font-size:200%;
	}
	#waterword3{
		position:absolute;
		left:70%;
		top:35%;
		color:white;
		font-size:200%;
	}
	.unselectable {
        -moz-user-select: -moz-none;
        -khtml-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    /* css formats for the gauge */
    .gauge .domain {        /*外圓*/
        stroke-width: 2px;
        stroke: #fff;
    }
    .gauge .tick line {  /*粗線(大刻度)*/
        stroke: #fff;
        stroke-width: 3px;
    } 
    .gauge line {  /*小刻度*/
        stroke: #fff;
    }
    .gauge .arc, .gauge .cursor {  /*內圈顏色*/
        opacity: 0;
    }
    .gauge .major {  /*數字*/
        fill: #fff;
        font-size: 10px;
        font-family: 'Play', verdana, sans-serif;
        font-weight: normal;
    }
    .gauge .indicator {    /* 指針*/
        stroke: #EE3311;
        fill: #000;
        stroke-width: 2px;
    }
    /* css formats for the segment display */  
    .segdisplay .on {  /*數位數字 */
        fill: #00FFFF;
    }
    .segdisplay .off {  /*off的時候的顏色深淺 */
        fill: #00FFFF;
        opacity: 0.15;
    }
	.speed1{
		position:absolute;
		right: 2%;
		top: 0%;
	}
	.speed2{
		position:absolute;
		right: 2%;
		top: 25%;
	}
	.speed3{
		position:absolute;
		right: 2%;
		top: 50%;
	}
	.water1{
		position:absolute;
		right:12%;
		top:0%;
	}
	.water2{
		position:absolute;
		right:12%;
		top:25%;
	}
	.water3{
		position:absolute;
		right:12%;
		top:50%;
	}
	#allpower{
        position:absolute;
		left:51.5%; 
		top:1.6%; 
		width:35%; 
		height:45%;
		background-color: #272727;
	}
} 
@media screen and (min-width:3840px){
    #DIV_1{
		position: absolute;
		left : 1%;
		top : 1%;
		width: 45%;
		height:44%;
		border:#7B7B7B 5px solid;
	}
    #videoElement{
        position: absolute;
		width: 100%;
		height:100%;
    }

    #range_1{
		position: absolute;
		right : 1%;
		top : 25%;
		width: 15%;
		height:5%;
	}
    #range_2{
		position: absolute;
		right : 1%;
		top : 50%;
		width: 15%;
		height:5%;
	}
    #range_3{
		position: absolute;
		right : 1%;
		top : 75%;
		width: 15%;
		height:5%;
	}
	#DIV_2{
		position:absolute;
		top:5%;
		right:3%;
		width: 20%;
		height:17%;
		background-color:#272727;
		border:#7B7B7B 5px solid;
	}
	#DIV_3{
		position:absolute;
		top:30%;
		right:3%;
		width: 20%;
		height:17%;
		background-color:#272727;
		border:#7B7B7B 5px solid;
	}
	#DIV_4{
		position:absolute;
		top:55%;
		right:3%;
		width: 20%;
		height:17%;
		background-color:#272727;
		border:#7B7B7B 5px solid;
	}
    #map{
		position:absolute;
		left:1%;
		top:46%;
        width: 45%;
        height: 53%;
		border:#7B7B7B 5px solid;
    }
	#but1{
		position: absolute;
		left:90%;
		top:80%;
	}
    #but2{
        position: absolute;
        left:75%;
        top:80%;
    }
	#slam{
		position: absolute;
		left: 46.5%;
		top:1%;
		width: 27.5%;
		height:98%;
		border:#7B7B7B 5px solid;	
	}
	#speedicon1{
		position:absolute;
		right:73.5%;
		top:35%;
		font-size:115%;
	}
	#speedicon2{
		position:absolute;
		left:73.5%;
		top:35%;
		font-size:115%;
	}
	#speedicon3{
		position:absolute;
		left:73.5%;
		top:35%;
		font-size:115%;
	}
	#watericaon1{
		position:absolute;
		left:23.5%;
		top:35%;
		font-size:115%;
	}
	#watericaon2{
		position:absolute;
		left:23.5%;
		top:35%;
		font-size:115%;
	}
	#watericaon3{
		position:absolute;
		left:23.5%;
		top:35%;
		font-size:115%;
	}
	#power1 {
		position:absolute;
		left:95%;
		top:6%;
		font-size:100%;
	}
	#power2 {
		position:absolute;
		left:95%;
		top:31%;
		font-size:100%;
	}
	#power3 {
		position:absolute;
		left:95%;
		top:56%;
		font-size:100%;
	}
	#powerword1{
		position:absolute;
		right:3.9%;
		top:6%;
	}
	#powerword2{
		position:absolute;
		right:3.9%;
		top:31%;
	}
	#powerword3{
		position:absolute;
		right:3.9%;
		top:56%;
	}
	.unselectable {
        -moz-user-select: -moz-none;
        -khtml-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    /* css formats for the gauge */
    .gauge .domain {        /*外圓*/
        stroke-width: 2px;
        stroke: #fff;
    }
    .gauge .tick line {  /*粗線(大刻度)*/
        stroke: #fff;
        stroke-width: 3px;
    } 
    .gauge line {  /*小刻度*/
        stroke: #fff;
    }
    .gauge .arc, .gauge .cursor {  /*內圈顏色*/
        opacity: 0;
    }
    .gauge .major {  /*數字*/
        fill: #fff;
        font-size: 10px;
        font-family: 'Play', verdana, sans-serif;
        font-weight: normal;
    }
    .gauge .indicator {    /* 指針*/
        stroke: #EE3311;
        fill: #000;
        stroke-width: 2px;
    }
    /* css formats for the segment display */  
    .segdisplay .on {  /*數位數字 */
        fill: #00FFFF;
    }
    .segdisplay .off {  /*off的時候的顏色深淺 */
        fill: #00FFFF;
        opacity: 0.15;
    }
	.speed1{
		position:absolute;
		right: 2%;
		top: 0%;
	}
	.speed2{
		position:absolute;
		right: 2%;
		top: 25%;
	}
	.speed3{
		position:absolute;
		right: 2%;
		top: 50%;
	}
	.water1{
		position:absolute;
		right:12%;
		top:0%;
	}
	.water2{
		position:absolute;
		right:12%;
		top:25%;
	}
	.water3{
		position:absolute;
		right:12%;
		top:50%;
	}
    .allpower{
        position:absolute;
		right:50%;
		top:1%;
	}
} 
@media screen and (min-width:7680px){
    #DIV_1{
		position: absolute;
		left : 1%;
		top : 1%;
		width: 45%;
		height:44%;
		border:#7B7B7B 5px solid;
	}
    #videoElement{
        position: absolute;
		width: 100%;
		height:100%;
    }

    #range_1{
		position: absolute;
		right : 1%;
		top : 25%;
		width: 15%;
		height:5%;
	}
    #range_2{
		position: absolute;
		right : 1%;
		top : 50%;
		width: 15%;
		height:5%;
	}
    #range_3{
		position: absolute;
		right : 1%;
		top : 75%;
		width: 15%;
		height:5%;
	}
	#DIV_2{
		position:absolute;
		top:5%;
		right:3%;
		width: 20%;
		height:17%;
		background-color:#272727;
		border:#7B7B7B 5px solid;
	}
	#DIV_3{
		position:absolute;
		top:30%;
		right:3%;
		width: 20%;
		height:17%;
		background-color:#272727;
		border:#7B7B7B 5px solid;
	}
	#DIV_4{
		position:absolute;
		top:55%;
		right:3%;
		width: 20%;
		height:17%;
		background-color:#272727;
		border:#7B7B7B 5px solid;
	}
    #map{
		position:absolute;
		left:1%;
		top:46%;
        width: 45%;
        height: 53%;
		border:#7B7B7B 5px solid;
    }
	#but1{
		position: absolute;
		left:90%;
		top:80%;
	}
    #but2{
        position: absolute;
        left:75%;
        top:80%;
    }
	#slam{
		position: absolute;
		left: 46.5%;
		top:1%;
		width: 27.5%;
		height:98%;
		border:#7B7B7B 5px solid;	
	}
	#speedicon1{
		position:absolute;
		right:73.5%;
		top:35%;
		font-size:115%;
	}
	#speedicon2{
		position:absolute;
		left:73.5%;
		top:35%;
		font-size:115%;
	}
	#speedicon3{
		position:absolute;
		left:73.5%;
		top:35%;
		font-size:115%;
	}
	#watericaon1{
		position:absolute;
		left:23.5%;
		top:35%;
		font-size:115%;
	}
	#watericaon2{
		position:absolute;
		left:23.5%;
		top:35%;
		font-size:115%;
	}
	#watericaon3{
		position:absolute;
		left:23.5%;
		top:35%;
		font-size:115%;
	}
	#power1 {
		position:absolute;
		left:95%;
		top:6%;
		font-size:100%;
	}
	#power2 {
		position:absolute;
		left:95%;
		top:31%;
		font-size:100%;
	}
	#power3 {
		position:absolute;
		left:95%;
		top:56%;
		font-size:100%;
	}
	#powerword1{
		position:absolute;
		right:3.9%;
		top:6%;
	}
	#powerword2{
		position:absolute;
		right:3.9%;
		top:31%;
	}
	#powerword3{
		position:absolute;
		right:3.9%;
		top:56%;
	}
	.unselectable {
        -moz-user-select: -moz-none;
        -khtml-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    /* css formats for the gauge */
    .gauge .domain {        /*外圓*/
        stroke-width: 2px;
        stroke: #fff;
    }
    .gauge .tick line {  /*粗線(大刻度)*/
        stroke: #fff;
        stroke-width: 3px;
    } 
    .gauge line {  /*小刻度*/
        stroke: #fff;
    }
    .gauge .arc, .gauge .cursor {  /*內圈顏色*/
        opacity: 0;
    }
    .gauge .major {  /*數字*/
        fill: #fff;
        font-size: 10px;
        font-family: 'Play', verdana, sans-serif;
        font-weight: normal;
    }
    .gauge .indicator {    /* 指針*/
        stroke: #EE3311;
        fill: #000;
        stroke-width: 2px;
    }
    /* css formats for the segment display */  
    .segdisplay .on {  /*數位數字 */
        fill: #00FFFF;
    }
    .segdisplay .off {  /*off的時候的顏色深淺 */
        fill: #00FFFF;
        opacity: 0.15;
    }
	.speed1{
		position:absolute;
		right: 2%;
		top: 0%;
	}
	.speed2{
		position:absolute;
		right: 2%;
		top: 25%;
	}
	.speed3{
		position:absolute;
		right: 2%;
		top: 50%;
	}
	.water1{
		position:absolute;
		right:12%;
		top:0%;
	}
	.water2{
		position:absolute;
		right:12%;
		top:25%;
	}
	.water3{
		position:absolute;
		right:12%;
		top:50%;
	}
    .allpower{
        position:absolute;
		right:50%;
		top:1%;
	}
} 


</style>

<div id="DIV_1">
<video id="videoElement" controls autoplay></video>
</div>

<div id="slam"></div><!--<img src="http://111.70.1.84:3400/slam_graph" height:2%>-->

<div id="DIV_2">&nbsp Car1
	<div id="power1" class="fa fa-fw"></div>
	<text id="powerword1">$err1</text>
	<div id="speedicon1" class="fa fa-fw"></div>
	<text id="speedword1">$err2</text>
	<div id="watericon1" class="fa fa-fw"></div>
	<text id="waterword1">$err3</text>
</div>

  <input type="range" id="speedrange1" name="Speed1"
         min="0" max="100">
  <label>Speed</label>


<div id="DIV_3">&nbsp Car2
	<div id="power2" class="fa fa-fw"></div>
	<text id="powerword2">$err4</text>
	<div id="speedicon2" class="fa fa-fw"></div>
	<text id="speedword2">$err5</text>
	<div id="watericon2" class="fa fa-fw"></div>
	<text id="waterword2">$err6</text>
</div>

  <input type="range" id="speedrange2" name="Speed2"
         min="0" max="100">
  <label>Speed</label>


<div id="DIV_4">&nbsp Car3
	<div id="power3" class="fa fa-fw"></div>
	<text id="powerword3">$err7</text>
	<div id="speedicon3" class="fa fa-fw"></div>
	<text id="speedword3">$err8</text>
	<div id="watericon3" class="fa fa-fw"></div>
	<text id="waterword3">$err9</text>
</div>


  <input type="range" id="speedrange3" name="Speed3"
         min="0" max="100">
  <label>Speed</label>

<div id="map"></div>

<div class="speed1">
    <span id="speedometer1"></span>
</div>

<div class="speed2">
    <span id="speedometer2"></span>
</div>

<div class="speed3">
    <span id="speedometer3"></span>
</div>

<div class="water1">
    <span id="water1"></span>
</div>

<div class="water2" style:"padding-top：10px;">
    <span id="water2"></span>
</div>

<div class="water3">
    <span id="water3"></span>
</div>


<div id="but1" align="left">
<form action="car1_data.php" method="post" class="form">
<input type="submit" class="btn btn-primary" name="data1" value='  Car1 Data  '>
</form>
</div>
<div id="but2" align="left">
<form action="car2_data.php" method="post" class="form">
<input type="submit" class="btn btn-primary" name="data2" value='  Car2 Data  '>
</form>
</div>
<div id="but3" align="left">
<form action="car3_data.php" method="post" class="form">
<input type="submit" class="btn btn-primary" name="data3" value='  Car3 Data  '>
</form>
</div>

<div id="but4" align="left">
<form action="DashBoard.php" method="post" class="form">
<input type="submit" class="btn btn-primary" name="change" value=' Send  Value '>
</form>
</div>
<div id="but5" align="left">
<form action="DashBoard.php" method="post" class="form">
<input type="submit" class="btn btn-primary" name="send" value=' Check Value '>
</form>
</div>
<div id="but6" align="left">
<form action="MissionPlanning.php" method="post" class="form">
<input type="submit" class="btn btn-primary" name="sent" value='Mission Reset'>
</form>
</div>
<iframe id="allpower" class="power"
             noresize="noresize"
             src="http://134.208.2.149:80/CAR1.html"
			 scrolling="no"
			 target="_blank"
             frameborder="0">
</iframe>

<script>
    var map;
	var markers = [];
	var position = [
    {label:'CAR1', lat: $err10, lng: $err11,},
    {label:'CAR2', lat: $err12, lng: $err13},
    {label:'CAR3', lat: $err14, lng: $err15}
	];
	const uluru = { lat: 23.897890,  lng: 121.545456 };
	
    function initMap(){
		map = new google.maps.Map(document.getElementById('map'), {
		center: {lat: $err10, lng: $err11},
		zoom: 15,
	});

    for (var i = 0; i < position.length; i++) {
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
	const infowindow0 = new google.maps.InfoWindow({
		content: '<div style="width:500px; height:500px;"><iframe src="http://134.208.2.149/CAR1.html" style="width:480px; height:480px; border:1px;"></iframe></div>'
	  });
	const infowindow1 = new google.maps.InfoWindow({
		content: '<div style="width:500px; height:500px;"><iframe src="http://134.208.2.149/CAR2.html" style="width:480px; height:480px; border:1px;"></iframe></div>'
	});
	const infowindow2 = new google.maps.InfoWindow({
		content: '<div style="width:500px; height:500px;"><iframe src="http://134.208.2.149/CAR3.html" style="width:480px; height:480px; border:1px;"></iframe></div>'
	  });
	
	 
	  markers[0].addListener("click", () => {
		infowindow0.open({
		  anchor: markers[0],
		  map,
		  shouldFocus: false,
		});
	  });
	  markers[1].addListener("click", () => {
		infowindow1.open({
		  anchor: markers[1],
		  map,
		  shouldFocus: false,
		});
	  });
	  markers[2].addListener("click", () => {
		infowindow2.open({
		  anchor: markers[2],
		  map,
		  shouldFocus: false,
		});
	  });
	markers.addListener('click',function(){
    	if(markers.getAnimation()!==null){
			markers.setAnimation(null);
	  		infowindow.open(map, markers[0]);
    	}else{
			markers.setAnimation(google.maps.Animation.BOUNCE);
	  		infowindow.close();
    	}
  	});

  
  
  
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCeP8_Gh03IJJc-mM5UdIq1hVwD1KqJTkk&callback=initMap"async defer></script><br />

<script>
function chargebattery() {
    var a; var b; var c;
    a = document.getElementById("power1");
    b = document.getElementById("power2");
    c = document.getElementById("power3");
	d = document.getElementById("speedicon1");
	e = document.getElementById("speedicon2");
	f = document.getElementById("speedicon3");
	g = document.getElementById("watericon1");
	h = document.getElementById("watericon2");
	i = document.getElementById("watericon3");
    v=$err1;
	d.innerHTML="<font color=white>&#xf1b9";
	e.innerHTML="<font color=white>&#xf1b9";
	f.innerHTML="<font color=white>&#xf1b9";
	g.innerHTML="<font color=white>&#xf043";
	h.innerHTML="<font color=white>&#xf043";
	i.innerHTML="<font color=white>&#xf043";
    if( v<=100 && v>75){
   	    a.innerHTML="<font color=green>&#xf240";
    }
    else if ( v<=75 && v>50){
   	    a.innerHTML="<font color=green>&#xf241";
    }
    else if ( v<=50 && v>25){
   	    a.innerHTML="<font color=green>&#xf242";
    }
    else if (v<=25 && v>0 ){
        a.innerHTML="<font color=green>&#xf243";
        if( v<=10 && v>0 ){
            a.innerHTML="<font color=red>&#xf243";
        }
    }
    else if (v==0){
        a.innerHTML="<font color=red>&#xf244";
    }
    v=$err4;
    if( v<=100 && v>75){
        b.innerHTML="<font color=green>&#xf240";
    }
    else if ( v<=75 && v>50){
        b.innerHTML="<font color=green>&#xf241";
    }
    else if ( v<=50 && v>25){
        b.innerHTML="<font color=green>&#xf242";
    }
    else if (v<=25 && v>0 ){
        b.innerHTML="<font color=green>&#xf243";
        if( v<=10 && v>0 ){
            b.innerHTML="<font color=red>&#xf243";
        }
    }
    else if (v==0){
        b.innerHTML="<font color=red>&#xf244";
    }
    v=$err7;
    if( v<=100 && v>75){
        c.innerHTML="<font color=green>&#xf240";
    }
    else if ( v<=75 && v>50){
        c.innerHTML="<font color=green>&#xf241";
    }
    else if ( v<=50 && v>25){
        c.innerHTML="<font color=green>&#xf242";
    }
    else if (v<=25 && v>0 ){
        c.innerHTML="<font color=green>&#xf243";
        if( v<=10 && v>0 ){
            c.innerHTML="<font color=red>&#xf243";
        }
    }
    else if (v==0){
        c.innerHTML="<font color=red>&#xf244";
    }
}
chargebattery();
</script>

<script>
var svg = d3.select("#speedometer1")
                .append("svg:svg")
                .attr("width", 150)
                .attr("height", 150);

        var gauge = iopctrl.arcslider()
                .radius(35)
                .events(false)
                .indicator(iopctrl.defaultGaugeIndicator);
        gauge.axis().orient("in")
                .normalize(true)
                .ticks(5)
                .tickSubdivide(1)
                .tickSize(5, 4, )
                .tickPadding(1)
                .scale(d3.scale.linear()
                        .domain([0, 100])
                        .range([-3*Math.PI/4, 3*Math.PI/4]));

        var segDisplay = iopctrl.segdisplay()
                .width(20)
                .digitCount(3)
                .negative(false)
                .decimals(0);

        svg.append("g")
                .attr("class", "segdisplay")
                .attr("transform", "translate(80, 130)")
                .call(segDisplay);

        svg.append("g")
                .attr("class", "gauge")
                .call(gauge);

        segDisplay.value($err2);
        gauge.value($err2);
</script>

<script>
var svg = d3.select("#speedometer2")
                .append("svg:svg")
                .attr("width", 200)
                .attr("height", 200);

        var gauge = iopctrl.arcslider()
                .radius(70)
                .events(false)
                .indicator(iopctrl.defaultGaugeIndicator);
        gauge.axis().orient("in")
                .normalize(true)
                .ticks(10)
                .tickSubdivide(1)
                .tickSize(5, 4, 5)
                .tickPadding(1)
                .scale(d3.scale.linear()
                        .domain([0, 120])
                        .range([-3*Math.PI/4, 3*Math.PI/4]));

        var segDisplay = iopctrl.segdisplay()
                .width(40)
                .digitCount(3)
                .negative(false)
                .decimals(0);

        svg.append("g")
                .attr("class", "segdisplay")
                .attr("transform", "translate(100, 130)")
                .call(segDisplay);

        svg.append("g")
                .attr("class", "gauge")
                .call(gauge);

        segDisplay.value($err5);
        gauge.value($err5);
</script>

<script>
var svg = d3.select("#speedometer3")
                .append("svg:svg")
                .attr("width", 200)
                .attr("height", 200);

        var gauge = iopctrl.arcslider()
                .radius(70)
                .events(false)
                .indicator(iopctrl.defaultGaugeIndicator);
        gauge.axis().orient("in")
                .normalize(true)
                .ticks(10)
                .tickSubdivide(1)
                .tickSize(5, 4, 5)
                .tickPadding(1)
                .scale(d3.scale.linear()
                        .domain([0, 120])
                        .range([-3*Math.PI/4, 3*Math.PI/4]));

        var segDisplay = iopctrl.segdisplay()
                .width(40)
                .digitCount(3)
                .negative(false)
                .decimals(0);

        svg.append("g")
                .attr("class", "segdisplay")
                .attr("transform", "translate(100, 130)")
                .call(segDisplay);

        svg.append("g")
                .attr("class", "gauge")
                .call(gauge);

        segDisplay.value($err8);
        gauge.value($err8);
</script>

<script>
var svg = d3.select("#water1")
                .append("svg:svg")
                .attr("width", 200)
                .attr("height", 200);

        var gauge = iopctrl.arcslider()
                .radius(70)
                .events(false)
                .indicator(iopctrl.defaultGaugeIndicator);
        gauge.axis().orient("in")
                .normalize(true)
                .ticks(10)
                .tickSubdivide(1)
                .tickSize(5, 4, 5)
                .tickPadding(1)
                .scale(d3.scale.linear()
                        .domain([0, 100])
                        .range([-3*Math.PI/4, 3*Math.PI/4]));

        var segDisplay = iopctrl.segdisplay()
                .width(35)
                .digitCount(2)
                .negative(false)
                .decimals(0);

        svg.append("g")
                .attr("class", "segdisplay")
                .attr("transform", "translate(100, 130)")
                .call(segDisplay);

        svg.append("g")
                .attr("class", "gauge")
                .call(gauge);

        segDisplay.value($err3);
        gauge.value($err3);
</script>

<script>
var svg = d3.select("#water2")
                .append("svg:svg")
                .attr("width", 200)
                .attr("height", 200);

        var gauge = iopctrl.arcslider()
                .radius(70)
                .events(false)
                .indicator(iopctrl.defaultGaugeIndicator);
        gauge.axis().orient("in")
                .normalize(true)
                .ticks(10)
                .tickSubdivide(1)
                .tickSize(5, 4, 5)
                .tickPadding(1)
                .scale(d3.scale.linear()
                        .domain([0, 100])
                        .range([-3*Math.PI/4, 3*Math.PI/4]));

        var segDisplay = iopctrl.segdisplay()
                .width(35)
                .digitCount(2)
                .negative(false)
                .decimals(0);

        svg.append("g")
                .attr("class", "segdisplay")
                .attr("transform", "translate(100, 130)")
                .call(segDisplay);

        svg.append("g")
                .attr("class", "gauge")
                .call(gauge);

        segDisplay.value($err6);
        gauge.value($err6);
</script>

<script>
var svg = d3.select("#water3")
                .append("svg:svg")
                .attr("width", 200)
                .attr("height", 200);

        var gauge = iopctrl.arcslider()
                .radius(70)
                .events(false)
                .indicator(iopctrl.defaultGaugeIndicator);
        gauge.axis().orient("in")
                .normalize(true)
                .ticks(10)
                .tickSubdivide(1)
                .tickSize(5, 4, 5)
                .tickPadding(1)
                .scale(d3.scale.linear()
                        .domain([0, 100])
                        .range([-3*Math.PI/4, 3*Math.PI/4]));

        var segDisplay = iopctrl.segdisplay()
                .width(35)
                .digitCount(2)
                .negative(false)
                .decimals(0);

        svg.append("g")
                .attr("class", "segdisplay")
                .attr("transform", "translate(100, 130)")
                .call(segDisplay);

        svg.append("g")
                .attr("class", "gauge")
                .call(gauge);

        segDisplay.value($err9);
        gauge.value($err9);
</script>

<script>
    if (flvjs.isSupported()) {
        var videoElement = document.getElementById('videoElement');
        var flvPlayer = flvjs.createPlayer({
            type: 'flv',
            // 如果是直播流需要设置这个值为 true
            isLive:true,
            // 拉流示例地址，stream参数一定要和推流时所设置的流密钥一致，app是推流的uri
            url: 'http://134.208.2.166:86/live?port=2368&app=myapp&stream=mystream',
            duration: 0,
        });
        flvPlayer.attachMediaElement(videoElement);
        flvPlayer.load();
        flvPlayer.play();
        setInterval(() => {
            if (!flvPlayer.buffered.length) {
                return;
            }
            let end = flvPlayer.buffered.end(0);
            let diff = end - flvPlayer.currentTime;
            if (diff >= 1.5) {
                flvPlayer.currentTime = end - 0.1;
            }
        }, 3 * 10 * 1000);
    }
</script>

</body>
___html___;
?>