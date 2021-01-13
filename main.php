<html>
<head>
	<style>@import url(main4.css);</style>
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
	<?php include ('./header_session.php');?>
</header>
<section id="main">
	<br/>
	<form action="info.php" method=POST>
		<input type="hidden" name="id_name" value="<?php echo $_POST["id_name"]; ?>">
		<input type="submit" id="info" value="가게 정보"/>
	</form>
	<form action="sql_list_3.php" method=POST>
		<input type="hidden" name="id_name" value="<?php echo $_POST["id_name"]; ?>">
		<input type="submit" id="manage" value="매출 관리" action="info.php" method=POST/>
	</form>
	<br/>
	<form action="data_anal.php" method=POST>
		<input type="submit" id="tmp" value="데이터 분석" action="" method=POST/>
	</form>
	<form>
		<input type="submit" id="QA" value="개발자 문의" action="" method=POST/>
	</form>
	 
</section>
	
</body>
</html>
