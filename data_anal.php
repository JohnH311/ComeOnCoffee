<?php
	
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="main4.css">
	</head>
	<body>
		<header>
		<?php
			include('./header_session.php');
		?>
		</header>
		<section>
			<h1>데이터 분석</h1>
			<form method="post" >
			<select name="wp">
			<?php
				$sql_wp = 'SELECT * FROM workplace WHERE mem_no=
				(SELECT no FROM member WHERE id="'.$_SESSION["id"].'")';
				$result_wp = mysqli_query($conn, $sql_wp);
				if (mysqli_num_rows($result_wp) > 0) {
					while($row = mysqli_fetch_array($result_wp)){
						echo "<option value='".$row["no"]."'>".$row["name"]."</option>";
					}
				}
				else{
					echo '값을 참조하지 못했습니다';
				}	
			?>
			</select>
			<br/><br/>
			<input type="submit" value="분석 결과 확인"/>
			</form>
			<br/>
			<?php
				if(isset($_POST["wp"]))
				{
					$sql_wname = 'SELECT name FROM workplace WHERE no='.$_POST["wp"];
					$result_wname = mysqli_query($conn, $sql_wname);
					$row = mysqli_fetch_array($result_wname);
					echo $row["name"]."의 데이터 분석결과입니다.";
					$sql_anal = 'SELECT * FROM result WHERE stn='.$_POST["wp"];
					echo "<br>";
					$result_anal = mysqli_query($conn, $sql_anal);
					$row = mysqli_fetch_array($result_anal);
					
					echo "<br>가장 많이 팔린 메뉴는 <strong style = 'color:red'>";
					if($row["larmen"]!="")
						echo $row["larmen"]."</strong> 입니다.<br>";
					else
						echo "없습니다.<br>";
					
					echo "<br>가장 적게 팔린 메뉴는 <strong style = 'color:red'>";
					if($row["lowmen"]!="")
						echo $row["lowmen"]."</strong> 입니다.<br>";
					else
						echo "없습니다.<br>";
					
					echo "<br>가장 많이 팔린 시간대는 <strong style = 'color:red'>";
					if($row["lartime"]!="")
						echo $row["lartime"]."</strong> 입니다.<br>";
					else
						echo "없습니다.<br>";
					
					echo "<br>가장 적게 팔린 시간대는 <strong style = 'color:red'>";
					if($row["lowtime"]!="")
						echo $row["lowtime"]."</strong> 입니다.<br>";
					else
						echo "없습니다.<br>";
					
				}
				
			?>
		</section>
	</body>
</html>