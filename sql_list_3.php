<!DOCTYPE  html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="main4.css">
		<title></title>
		<style type="text/css">
			#pop{
				width:auto;
				height:900px;
				background:#3d3d3d;
				color:#fff;
				position:absolute; top:10px; left:100px; text_align:center:
				border:2px solid #000;
			}
		</style>
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<script type="text/javascript">
			var tmp = 0;
			$(document).ready(function(){
				$('#pop').hide();
				$('#close').click(function(){
					$('#pop').hide();
				});
				$('#open').click(function(){
					$('#pop').show();
				});
			});
			
		</script>
		
	</head>
	<body>
	<header>
	<?php
		session_cache_limiter('no-cache,  must-revalidate'); 
		include ("./header_session.php");
	?>
	<button id="data"></button>
	<button id="open"></button>
	</div>

	</header>
	<form method="post" >
		<select name="table">
			<option value="1">메뉴 정보</option>
			<option value="2">앉은 시간</option>
			<option value="3">테이블 정보</option>
			<option value="4">매출 정보</option>
		</select>
		<select name="wp">
			<?php
				$sql_wp = 'SELECT * FROM workplace WHERE mem_no=
				(SELECT no FROM member WHERE id="'.$_POST["id_name"].'")';
				$result_wp = mysqli_query($conn, $sql_wp);
				if (mysqli_num_rows($result_wp) > 0) {
					while($row = mysqli_fetch_array($result_wp)){
						//$_SESSION["wp"]=$row["no"];
						echo "<option value='".$row["no"]."'>".$row["name"]."</option>";
						//$wp=$row["no"];
					}
				}
				else{
					echo '값을 참조하지 못했습니다';
				}	
			?>
		<input type="hidden" name="id_name" value="<?php echo $_POST["id_name"]; ?>" style="width:200%; height:auto;">
		<input type="submit" value="Submit the form"/>
	</form>
	<?php
		
		//header('Cache-Control:no cache');
		//session_cache_limiter('public');
		//session_start();
		/*$option = isset($_post['table']) ? $_POST['table'] : false;
		if ($option) {
			echo htmlentities($_POST['table'], ENT_QUOTES, "UTF-8");
		} else {
			echo "zz ";
			exit; 
		}*/
		$_SESSION['prePage']=2;

		$option = isset($_POST['table']) ? $_POST['table'] : false;
		//$_SESSION["option"] = $option-1;
		
		/*$sql_wp = 'SELECT * FROM workplace WHERE mem_no=
			(SELECT no FROM member WHERE id="'.$_POST["id_name"].'")';
		$result_wp = mysqli_query($conn, $sql_wp);
		if (mysqli_num_rows($result_wp) > 0) {
			while($row = mysqli_fetch_array($result_wp)){
				$_SESSION["wp"]=$row["no"];
				$wp=$row["no"];
			}
		}*/
		
		$wp=isset($_POST['wp']) ? $_POST['wp'] : false;

		
		$tableName = "";
		include ("./tableInfo.php");
		/*$enttKor = array(
			array("메뉴 번호","사업장 번호","메뉴 이름","원가","단가"),
			array("테이블 번호","사업장 번호","앉은 시각","일어난 시각"),
			array("테이블 번호","앉았는지 여부","사업장 번호"),
			array("매장번호","결제시각","메뉴","개수","단가","총합")
		);*/
		switch ($option)
		{
			case "1":
			$tableName = "menu";
			break;
			
			case "2":
			$tableName = "sit_time";
			break;
			
			case "3":
			$tableName = "table_resrv";
			break;
			
			case "4":
			$tableName = "sales";
			break;
			
			default:
			echo "테이블을 선택해주세요";
			break;
		}
		$_SESSION["tableName"] = $tableName;
		$i=0;
		$sql = "SELECT * FROM ".$tableName." WHERE workplace_no='".$wp."'";
		if($option==0)
		{
			exit();
		}
		$result = mysqli_query($conn, $sql);
		echo '<table width=600 border=1>
		<tr>';
		for($i=0; $i<count($enttKor[$option-1]); $i++)
		{
			echo '<td>'.$enttKor[$option-1][$i].'</td>';
		}
		echo '</tr>';
		if (mysqli_num_rows($result) > 0) {
			$k=0;
			while($row = mysqli_fetch_array($result)){
				echo '<tr><form method=POST >';
				if($tableName == "table_resrv")
				{
					for($j=0; $j<3; $j++){

						echo '<td> <input name="row[]" type=text size=7 value='.$row[$j].' readonly></td> ';
					}
				}
				else{
					for($j=0; $j<count($row)/2; $j++){

						echo '<td> <input name="row[]" type=text size=7 value='.$row[$j].' readonly></td> ';
					}	
				}

				echo '<td><button name = "openAlter" formaction=alter.php>변경</button></td>
					<td><button formaction=delete.php>삭제</button></td>
					<input type="hidden" value="'.$wp.'" name="wp" >
					<input type="hidden" value="'.$_POST['id_name'].'" name="id_name" >
					<input type="hidden" value="'.$tableName.'" name="tableName" >
					<input type="hidden" value="'.$option.'" name="option" >
					</form></tr>';
				};
		}else{
			echo "</table>테이블에 데이터가 없습니다.";
		}
		
		//$_SESSION["enttKor"]=$enttKor;
		
		
		
		
		
		echo '<div id="pop">값을 추가합니다.<br/>
			<form method="post" action="insertToDB.php">';
		for($i=0; $i<count($enttKor[$option-1]); $i++){
			if(!($enttKor[$option-1][$i]==$enttKor[0][1]||$enttKor[$option-1][$i]==$enttKor[1][1]
			||$enttKor[$option-1][$i]==$enttKor[3][0]))
			{
				echo '<label>'.$enttKor[$option-1][$i].'&nbsp;&nbsp; <input type="text" size="15" name="attribute[]"></label><br><br>';
			}
			else
			{
				echo '<label>'.$enttKor[$option-1][$i].'&nbsp;&nbsp; '.$wp.'<input type=hidden size="15" name="attribute[]"></label><br><br>';
			}
		}
		echo'<input type="hidden" value="'.$wp.'" name="wp" >
			<input type="hidden" value="'.$_POST['id_name'].'" name="id_name" >
			<input type="hidden" value="'.$tableName.'" name="tableName" >
			<input type="hidden" value="'.$option.'" name="option" >
			<input type="submit" id="btn" value="확인"></form>
			<div id="close" style="width:100px; ">close</div>
			</div>';

		
		
		mysqli_close($conn);
	?>

	<div id="menu">
		<form method="post" action="sibal.php">
			<select name="search">
			<?php
				for($i=0; $i<count($enttKor[$option-1]); $i++){
					echo '<option vaule='.$i.'>'.$enttKor[$option-1][$i].'</option>';
				}
			?>
			

			</select>			
			<input type="text" name="searchQuery"/>
			<!--input type="hidden" value="<?php $tableName ?>" name="tableName" -->
			<input type="hidden" value="<?php echo $_POST["id_name"] ?>" name="id_name" >
			<input type="hidden" value="<?php echo $option ?>" name="option" >
			<input id="schCommit" type="submit" name="schCommit" value=" "/>
		</form>
		
	</div>

		
	</body>
</html>