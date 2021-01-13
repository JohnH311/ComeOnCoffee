<?php	
	if(isset($_POST['id_name'])){
		$sql = "SELECT * FROM member WHERE id='".$_POST['id_name']."'";
	}
	else{
		//$sql = "SELECT * FROM member WHERE id='".$_SESSION['id_name']."'";
	}
		$result=mysqli_query($conn, $sql);
		$recode = mysqli_fetch_array($result);
		$ip=$recode['connIp'];
		
		
		if($ip=='-1'){
			$logQuery = "UPDATE member SET connIp='".$_SERVER['REMOTE_ADDR']."' where id='".$_POST['id_name']."'";
			mysqli_query($conn,$logQuery);
			mysqli_close($conn);
		}
		else if($ip!=$_SESSION['ip']){
			unset($_SESSION['ip']);
			unset($_POST['id_name']);
			echo "<script>alert('다른곳에서 로그인되었습니다.');</script>"; //location.href='login.html';;
			mysqli_close($conn);
			//exit();
		}
		

	
?>