<html>
	<head></head>
	<body>
	
	<?php	
		session_start();
		$conn = mysqli_connect("localhost", "root", "948672" , "db1");
		$logQuery = "UPDATE member SET connIp='-1' where id='".$_SESSION['id']."'";
		mysqli_query($conn,$logQuery);
		
		if(isset($_SESSION['id']))
			unset($_SESSION['id']);
		if(isset($_SESSION['wp']))
			unset($_SESSION['wp']);
		

		
		echo '<script>location.href = "login.html"</script>';
		mysqli_close($conn);
	?>
	</body>
</html>

