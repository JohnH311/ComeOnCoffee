<?php
	session_start();
	
	$conn = mysqli_connect('localhost', 'root', '948672', 'db1');
	
	
	$sql = "SELECT * FROM member";
	$result = mysqli_query($conn,$sql);
	$id_name = isset($_GET['id_name']) ? $_GET['id_name'] : false;
	$password =isset($_GET['password']) ? $_GET['password'] : false;
	
	$logQuery = "UPDATE member SET connIp='".$_SERVER['REMOTE_ADDR']."' where id='".$id_name."'";
	mysqli_query($conn,$logQuery);
	
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_array($result)){
			if(($row['id']==$id_name)&&password_verify($password,$row['pw']))
			{
				echo'로그인 성공';
				echo "<script>location.href='main.php'</script>";
				echo "<script>location.href='main.php'</script>";
				$_SESSION['ip'] = $_SERVER["REMOTE_ADDR"];
				$_SESSION["id"] = $id_name;
				break;
			} 
			
		};echo "<script>location.href='loginfail.html'</script>";
		echo'로그인 실패';
	}else{
		echo "</table>테이블에 데이터가 없습니다.";
	}
	mysqli_close($conn);
?>