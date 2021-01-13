<html>
<head>
	<style>@import url(main1.css);</style>
	<title></title>
	<script>
		function clickManage(){
			location.href = 'sql_list_3.php';
		}
		function clickInfo(){
			location.href = 'info.php';
		}
	</script>
</head>
<body>
<header>
	<?php //include 'multi_login.php';?>
	<?php
	$conn = mysqli_connect("localhost", "root", "948672" , "db1");	
	session_start();	
	
	if($_SESSION['id']){
		$sql = "SELECT * FROM member WHERE id='".$_SESSION["id"]."'";
		$result=mysqli_query($conn, $sql);
		$recode = mysqli_fetch_array($result);
		mysqli_close($conn);
		
		
		$ip=$recode['connIp'];
		//$_SESSION['ip']='1321';
		echo "접속 ip:".$ip." 세션 아이피:".$_SESSION['ip'];
		if($ip!=$_SESSION['ip']){
			unset($_SESSION['ip']);
			unset($_SESSION['id']);
			echo "<script>alert('다른곳에서 로그인되었습니다.'); location.href='login.html';</script>";
			exit();
		}
		
	}
	
	$_SESSION['prePage']=3;

	if(!isset($_SESSION["id"]))
	{
		echo "잘못된 접근입니다.";
		exit();
	}

	else
		echo "환영합니다. ".$_SESSION["id"]."님<br/>";
	?>
	<form method="post" action="newFile.php">
		<input type="submit" name="logout" value="로그아웃"/>
	</form><br/>
</header>
<section>
	<br/>
	<button id=info Onclick="clickInfo()">가게 정보</button> <button id=manage Onclick="clickManage()">매출 관리</button><br/>
	<button id=tmp>임시 버튼</button> <button id=QA Onclick="clickQA"()>개발자 문의</button>
</section>
	
</body>
</html>
