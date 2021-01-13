<html>
	<head><head>
	<body>
		<form id='gopage' method='post' action="sql_list_3.php"> 
			<input type="hidden" name="id_name" value="<?php echo $_POST["id_name"]?>" /> 
		</form> 

	</body>
</html>
<?php
	
	session_start();
	$s=mysqli_connect("localhost","root","948672","db1") or die("접속실패");	
	
	include ("./tableInfo.php");
	/*$enttArr = array(
			array("no","workplace_no","name","cost","unit_price"),
			array("table_no","workplace_no","sit","up"),
			array("no","sit_IO","workplace_no"),
			array("stn","time","menu","count","up","tp")
	);*/
	$option = $_POST["option"]-1;
	$tableName = $_POST["tableName"];
	$attribute = array();
	$attribute = $_POST['attribute'];
	
	if($tableName=="menu"){
		$attribute[1] = $_POST["wp"];
	}
	else if($tableName=="sit_time")
	{
		$attribute[1] = $_POST["wp"];
	}
	else if($tableName=="table_resrv")
	{
		$attribute[2] = $_POST["wp"];
	}
	else if($tableName=="sales")
	{
		$attribute[0] = $_POST["wp"];
	}

	
	
	$updateQuary = 'UPDATE '.$tableName.' SET ';
	
	for($i=0; $i<count($attribute); $i++){
		if($i<count($attribute)-1)
			$updateQuary = $updateQuary.$enttArr[$option][$i].'="'.$attribute[$i].'", ';
		else
			$updateQuary = $updateQuary.$enttArr[$option][$i].'="'.$attribute[$i].'"';
	}
	
	$updateQuary = $updateQuary.' WHERE ';
	$row=array();
	$row=$_SESSION['row'];
	
	for($i=0; $i<count($row); $i++){
		
		if($i<count($row)-1)
			$updateQuary = $updateQuary.$enttArr[$option][$i].'="'.$row[$i].'" AND ';
		else
			$updateQuary = $updateQuary.$enttArr[$option][$i].'="'.$row[$i];
		
	}
	$updateQuary = $updateQuary.'"';
	echo $updateQuary;
	$ins=mysqli_query($s, $updateQuary);
	echo "<script>document.getElementById('gopage').submit();</script>";
?>