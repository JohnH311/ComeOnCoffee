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
	include ("./tableInfo.php");
	/*$enttArr = array(
			array("no","workplace_no","name","cost","unit_price"),
			array("table_no","workplace_no","sit","up"),
			array("no","sit_IO","workplace_no"),
			array("workplace_no","time","menu","count","up","tp")
	);*/
	$s=mysqli_connect("localhost","root","948672","db1") or die("접속실패");
	$option = $_POST["option"]-1;
	$tableName = $_POST["tableName"];
	$row = $_POST ["row"];
	echo "삭제 창입니다.</br>";
	$deleteQuary = 'DELETE FROM '.$tableName.' WHERE ';
	
	for($i=0; $i<count($row); $i++){
		
		if($i<count($row)-1)
			$deleteQuary = $deleteQuary.$enttArr[$option][$i].'="'.$row[$i].'" AND ';
		else
			$deleteQuary = $deleteQuary.$enttArr[$option][$i].'="'.$row[$i];
		
	}
	$deleteQuary = $deleteQuary.'"';
	echo $deleteQuary;
	$ins=mysqli_query($s, $deleteQuary);
	echo "<script>document.getElementById('gopage').submit();</script>";

?>