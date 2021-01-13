<html>
	<head><head>
	<body>
		<form id='gopage' method='post' action="main.php"> 
			<input type="hidden" name="id_name" value="<?php echo $_POST["id_name"]?>" /> 
		</form> 

	</body>
</html>

<?php
	session_start();
	
	$conn = mysqli_connect('localhost', 'root', '948672', 'db1');
	
	
	$sql = "SELECT * FROM member";
	$result = mysqli_query($conn,$sql);
	$id_name = $_POST['id_name'];
	$password =isset($_POST['password']) ? $_POST['password'] : false;
	
	
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_array($result)){
			if(($row['id']==$id_name)&&password_verify($password,$row['pw']))
			{
				echo'로그인 성공';
				$_SESSION["ip"] = $_SERVER["REMOTE_ADDR"];
				$_SESSION["id"] = $id_name;
				echo "<script>
					document.getElementById('gopage').submit(); 
					</script>";
				break;
			} 
			
		};echo "<script>location.href='loginfail.html'</script>";
		echo'로그인 실패';
	}else{
		echo "</table>테이블에 데이터가 없습니다.";
	}
	mysqli_close($conn);
?>