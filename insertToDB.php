<html>
	<head><head>
	<body>
		<form id='gopage' method='post' action="sql_list_3.php"> 
			<input type="hidden" name="id_name" value="<?php echo $_POST["id_name"]?>" /> 
		</form> 

	</body>
</html>

<?php
error_reporting(E_ALL ^ E_DEPRECATED);

	session_start();
	$s=mysqli_connect("localhost","root","948672","db1") or die("접속실패");
	
	mysqli_query($s, "set session character_set_connection=utf8;");

	mysqli_query($s, "set session character_set_results=utf8;");

	mysqli_query($s, "set session character_set_client=utf8;");
	$attribute = array();
	
	if($_SESSION['prePage']==1)
	{
		$tableName = 'member';
		$attribute[1]=$_POST['name'];
		$attribute[2]=$_POST['gender'];
		$attribute[3]=$_POST['age'];
		$attribute[4]=$_POST['id_name'];
		$attribute[5]=password_hash($_POST['password'],PASSWORD_BCRYPT);
		$attribute[6]=$_POST['phone'];
		$attribute[7]=2;
		$attribute[8]=-1;
		
		$sql_phone = "SELECT phoneNum FROM member WHERE phoneNum='{$attribute[4]}'";
		$result_phone = mysqli_query($s, $sql_phone);
		$exist_phone = mysqli_num_rows($result_phone);
		
		if($exist_phone>0){
			echo"중복된 전화번호입니다.";
			mysqli_close($s);
			exit();	
		}
		
		$sql_id = "SELECT id FROM member WHERE id='{$attribute[3]}'";
		$result_id = mysqli_query($s, $sql_id);
		$exist_id = mysqli_num_rows($result_id);
	
		if($exist_id>0){
			echo"중복된 id입니다.";
			mysqli_close($s);
			exit();
		}
		
		$sql = "SELECT * FROM member";
		$result = mysqli_query($s, $sql);
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_array($result)){
				$attribute[0] = $row["no"]+1;
			}
		}
		
	}
	else if($_SESSION['prePage']==2)
	{
		$tableName = $_POST["tableName"];
		$attribute = $_POST["attribute"];

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
			$attribute[3] = -1;
			$attribute[4] = -1;
		}
		else if($tableName=="sales")
		{
			$attribute[0] = $_POST["wp"];
		}


		
	}
	
	$insertQuary = 'INSERT INTO '.$tableName.' VALUES ("';
	
	for($i=0; $i<count($attribute); $i++){
		
		if($i<count($attribute)-1)
			$insertQuary = $insertQuary.$attribute[$i].'","';
		else
			$insertQuary = $insertQuary.$attribute[$i];
		
	}
	$insertQuary = $insertQuary.'")';
	
	if($_SESSION['prePage']==1)
	{
		echo $insertQuary;
		echo"회원가입 성공";
		print"<a href='login.html'>메인화면으로</a>";
	}
	else if($_SESSION['prePage']==2)
	{
		//echo $insertQuary;
		echo "<script>document.getElementById('gopage').submit(); </script>";
	}
	//$ins=mysqli_query($s,'INSERT INTO member VALUES ("'.$name.'","'.$mail.'.","'.$phone.'","'.$id_name.'","'.$password.'","'.$RRN.'")');
	$ins=mysqli_query($s, $insertQuary);

	
	mysqli_close($s);
	
?>