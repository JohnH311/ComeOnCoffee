<!DOCTYPE  html>
<html>
	<head>
		<style>@import url(main4.css);</style>
		<title></title>
		<script>
			function mvBack(){
				location.href = "sql_list_3.php";
			}
			
			function reload()
			{
				location.reload();
			}
		</script>
	</head>
	<body>
	<header>
	<?php
		include ("./header_session.php");
	
	?>
	
	</header>

<?php

$option=$_POST["option"]-1;
$conn = mysqli_connect("localhost", "root", "948672" , "db1");
		$search = isset($_POST['search']) ? $_POST['search'] : false;
		$searchIdx;
		$searchQuery = isset($_POST['searchQuery']) ? $_POST['searchQuery']:false;
		
		include ("./tableInfo.php");
/*$menu = array(
			array("no","workplace_no","name","cost","unit_price"),
			array("table_no","workplace_no","sit","up"),
			array("no","sit_IO","workplace_no")
		);
				
$enttArr = array(
			array("메뉴 번호","사업장 번호","메뉴 이름","원가","단가"),
			array("테이블 번호","사업장 번호","앉은 시각","일어난 시각"),
			array("테이블 번호","앉았는지 여부","사업장 번호")
		);*/
		
		for($i=0; $i<count($enttArr[$option]); $i++){
			if($search==$enttKor[$option][$i])
			{
				$searchIdx=$i;
			}
				
		}
		echo '<table width=600 border=1>
		<tr>';
		for($i=0; $i<count($enttKor[$option]); $i++)
		{
			echo '<td>'.$enttKor[$option][$i].'</td>';
		}
		echo '</tr>';
		if($searchQuery!=NULL)
		{
			$ssql = "SELECT * from ".$_SESSION["tableName"]." WHERE ".$enttArr[$option][$searchIdx]." LIKE '%".$searchQuery."%'";
			$result = mysqli_query($conn, $ssql);
			
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_array($result)){
					echo '<tr>';
					for($j=0; $j<count($row)/2; $j++){
						echo '<td>'.$row[$j].'</td>';
					}	
					echo '</tr>';	
					};
			}else{
				echo "</table>테이블에 데이터가 없습니다.";
			}
		}
		
		
		mysqli_close($conn);
?>