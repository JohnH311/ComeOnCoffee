
	<script>
			function reload()
			{
				location.reload();
			}
	</script>
	<?php 

	$conn = mysqli_connect("localhost", "root", "948672" , "db1");	
	session_start();
	
	$_SESSION['prePage']=3;
	include('./multi_login_session.php');
	
	if(!isset($_SESSION["id"]))
	{
		echo "<script> alert('잘못된 접근입니다.'); location.href='login.html';</script>";
		exit();
	}

	else{
		echo "환영합니다. ".$_SESSION['id']."님<br/>";
		
	}
	?>
	<form method="post" action="newFile.php">
		<input type="submit" name="logout" value="로그아웃"/>
	</form><br/>
	<button id="refresh" onclick = reload();></button>