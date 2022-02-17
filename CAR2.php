<?php
	//PHP連接數據庫 
	header("content-type:text/json;charset=utf-8");
	//鏈接數據庫
   
	$con = mysqli_connect("localhost", "root", ""); 
	if (!$con) 
	{
     
		die('Could not connect database: ' ); 
	} 
 
	//選擇數據庫
	$db_selected = mysqli_select_db($con, "fqdatabase");
	if (!$db_selected) 
	{
     
	 	die ("Can\'t use yxz : " );
	} 
 
	//執行MySQL查詢-設置UTF8格式
	// mysqli_query("SET NAMES utf8"); 
	// mysqli_query()
	//查詢學生信息
	$sql = "SELECT * FROM car2";
	$result = mysqli_query($con,$sql); 
 
	//定義變量json存儲值
	$data="";
	$array= array();
	class emp{
		public $id; 
	    public $lat;
	    public $lng;
        public $power;
        public $water;
        public $speed;
        public $datetime;

	}
	while ($row = mysqli_fetch_array($result))
	{
     
		list($id,$lat,$lng,$power,$water,$speed,$datetime) = $row;   
  	

		$em = new emp();
		$em->id = $id;
		$em->lat = $lat;
		$em->lng = $lng;
		$em->power = $power;
        $em->water = $water;
        $em->speed = $speed;
        $em->datetime = $datetime;
 
		//數組賦值
		$array[] = $em;
	}
 
	$data = json_encode($array);
	echo $data;

?>
