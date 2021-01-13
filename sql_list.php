<!DOCTYPE  html>
<html>
	<head>
		<style>@import url(main.css);</style>
		<title></title>
		<style type="text/css">
			#pop{
				width:300px;
				height:400px;
				background:#3d3d3d;
				color:#fff;
				position:absolute; top:10px; left:100px; text_align:center:
				border:2px solid #000;
			}
		</style>
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#pop').hide();
				$('#close').click(function(){
					$('#pop').hide();
				});
				$('#open').click(function(){
					$('#pop').show();
				});
			});
			
			function mvBack(){
				location.href = "main.php";
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
	session_start();	
	$_SESSION['prePage']=2;

	if(!isset($_SESSION["id"]))
	{
		echo "잘못된 접근입니다.";
		exit();
	}
	else
		echo $_SESSION["id"];
	
	?>
	<button>홈으로</button><button onclick = mvBack();>메인화면으로</button><button>데이터분석</button><button id="open">값 추가</button><button onclick = reload();>새로고침</button>
	<form method="post" action="newFile.php">
		<input type="submit" name="logout" value="로그아웃"/>
	</form>
	
	</header>
	<form method="post" >
		<select name="table">
			<option value="1">메뉴 정보</option>
			<option value="2">앉은 시간</option>
			<option value="3">테이블 정보</option>
		</select>
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
		$option =0;
		$option = isset($_POST['table']) ? $_POST['table'] : false;
		$_SESSION["option"] = $option-1;
		$conn = mysqli_connect("localhost", "root", "948672" , "db1");
		
		
		$sql_wp = 'SELECT * FROM workplace WHERE mem_no=
			(SELECT no FROM member WHERE id="'.$_SESSION["id"].'")';
		$result_wp = mysqli_query($conn, $sql_wp);
		if (mysqli_num_rows($result_wp) > 0) {
			while($row = mysqli_fetch_array($result_wp)){
				$_SESSION["wp"]=$row["no"];
			}
		}
		else{
			echo '값을 참조하지 못했습니다';
		}
		
		$rowNum=0;
		$tableName = "";
		$enttArr = array(
			array("메뉴 번호","사업장 번호","메뉴 이름","원가","단가"),
			array("테이블 번호","사업장 번호","앉은 시각","일어난 시각"),
			array("테이블 번호","앉았는지 여부","사업장 번호")
		);
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
			
			default:
			echo "테이블을 선택해주세요";
			break;
		}
		$_SESSION["tableName"] = $tableName;
		$i=0;
		$sql = "SELECT * FROM ".$tableName;
		if($option==0)
		{
			exit();
		}
		$result = mysqli_query($conn, $sql);
		echo '<table width=600 border=1>
		<tr>';
		for($i=0; $i<count($enttArr[$option-1]); $i++)
		{
			echo '<td>'.$enttArr[$option-1][$i].'</td>';
		}
		echo '</tr>';
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_array($result)){
				echo '<tr>';
				for($j=0; $j<count($row)/2; $j++){
					echo '<td>'.$row[$j].'</td> ';
				}	
				echo '<td><button>변경</button></td><td><button>삭제</button></td></tr>';	
				};
		}else{
			echo "</table>테이블에 데이터가 없습니다.";
		}
		
		$_SESSION["enttArr"]=$enttArr;
		
		
		
		
		//-----------------------------------------------------------------
		/*function searchOutput(){
			$search = isset($_POST['search']) ? $_POST['search'] : false;
			$searchQuery = isset($_POST['searchQuery']) ? $_POST['searchQuery']:false;
			$menu = array(
						array("no","workplace_no","name","cost","unit_price"),
						array("table_no","workplace_no","sit","up"),
						array("no","sit_IO","workplace_no")
					);
					
			echo '<table width=600 border=1>
			<tr>';
			for($i=0; $i<count($enttArr[$option-1]); $i++)
			{
				echo '<td>'.$enttArr[$option-1][$i].'</td>';
			}
			echo '</tr>';
			//if(isset($searchQuery)&&isset($searchQuery))
			//{
				$ssql = "SELECT * from ".$tableName." WHERE ".$menu[$option-1][$search-1]."=".$searchQuery;
				echo $ssql;
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
			//}
		}
		if(array_key_exists('schCommit',$_POST))
		{
			searchOutput();
		}*/
		//---------------------------------------------------------------------------------
		
		
		
		
		echo '<div id="pop">
			<form method="post" action="insertToDB.php">';
		for($i=0; $i<count($enttArr[$option-1]); $i++){
			if(!($enttArr[$option-1][$i]==$enttArr[0][1]||$enttArr[$option-1][$i]==$enttArr[1][1]))
			{
				echo '<label>'.$enttArr[$_SESSION["option"]][$i].'&nbsp;&nbsp; <input type="text" size="15" name="attribute[]"></label><br><br>';
			}
			else
			{
				echo '<label>'.$enttArr[$option-1][$i].'&nbsp;&nbsp; <input type=hidden size="15" name="attribute[]"></label><br><br>';
			}
		}
		echo'<input type="submit" id="btn" value="확인"></form>
			<div id="close" style="width:100px; margin:auto;">close</div>
			</div>';
		
		
		mysqli_close($conn);
	?>
	<div id="menu" style="position : fixed; bottom:3%;">
		<form method="post" action="sibal.php">
			<select name="search">
			<?php
				for($i=0; $i<count($enttArr[$option-1]); $i++){
					echo '<option vaule='.$i.'>'.$enttArr[$option-1][$i].'</option>';
				}
			?>
			<input type="text" name="searchQuery"></input>
			</select>
			<input type="submit" name="schCommit" value="검색"/>
		</form>
		
	</div>

		
	</body>
</html>