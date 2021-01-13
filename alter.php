<html>
<head>
	<style>
		@import url(main4.css);
		#popAlter{
			width:auto;
			height:auto;
			background:#3d3d3d;
			color:#fff;
			position:absolute; top:10px; left:100px; text_align:center:
			border:2px solid #000;
		}
	</style>
</head>
<?php
	session_start();
	include ("./tableInfo.php");
	/*$enttArr = array(
			array("no","workplace_no","name","cost","unit_price"),
			array("table_no","workplace_no","sit","up"),
			array("no","sit_IO","workplace_no"),
			array("stn","time","menu","count","up","tp")
	);*/
	$s=mysqli_connect("localhost","root","948672","db1") or die("접속실패");
	$tableName = $_POST["tableName"];

	$option = $_POST["option"]-1;
	/*$enttKor = array(
			array("메뉴 번호","사업장 번호","메뉴 이름","원가","단가"),
			array("테이블 번호","사업장 번호","앉은 시각","일어난 시각"),
			array("테이블 번호","앉았는지 여부","사업장 번호"),
			array("매장번호","결제시각","메뉴","개수","단가","총합")
		);*/

	echo "변경 창입니다.</br>";

	echo '<div id="popAlter">값을 수정합니다.
		<form method="post" action="alterQuery.php">';
	for($i=0; $i<count($enttArr[$option]); $i++){
		if(!($enttArr[$option][$i]==$enttArr[0][1]||$enttArr[$option][$i]==$enttArr[1][1]||$enttArr[$option][$i]==$enttArr[3][0]))
		{
			echo '<label>'.$enttKor[$option][$i].'&nbsp;&nbsp; <input type="text" size="15" name="attribute[]" value = '.$_POST['row'][$i].'></label><br><br>';
		}
		else
		{
			echo '<label>'.$enttKor[$option][$i].'&nbsp;&nbsp; '.$_POST['row'][$i].' <input type=hidden size="15" name="attribute[]"></label><br><br>';
		}
	}
	echo'<input type="hidden" value="'.$_POST["id_name"].'" name="id_name" >
		<input type="hidden" value="'.$_POST["wp"].'" name="wp" >
		<input type="hidden" value="'.$tableName.'" name="tableName" >
		<input type="hidden" value="'.$_POST["option"].'" name="option" >
		<input type="submit" id="btn" value="확인">
		</form>
		</div>';
	if($_POST ["row"])
		$_SESSION['row'] = $_POST ["row"];
	
	
	
?>
</html>