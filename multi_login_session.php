<?php	

		$sql = "SELECT * FROM member WHERE id='".$_SESSION['id']."'";


		$result=mysqli_query($conn, $sql);
		$recode = mysqli_fetch_array($result);
		$ip=$recode['connIp'];
		
		
		if($ip=='-1'){
			$logQuery = "UPDATE member SET connIp='".$_SERVER['REMOTE_ADDR']."' where id='".$_SESSION['id']."'";
			mysqli_query($conn,$logQuery);
			mysqli_close($conn);
		}
		else if($ip!=$_SESSION['ip']){
			unset($_SESSION['ip']);
			unset($_SESSION['id']);
			echo "<script>alert('다른곳에서 로그인되었습니다.');location.href='login.html'</script>";
			mysqli_close($conn);
			exit();
		}
		

	
?>