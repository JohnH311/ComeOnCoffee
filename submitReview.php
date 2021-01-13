<html>
	<head>
		<style>@import url(main4.css);
				</style>
	</head>
	<body>
		<header>
			<?php include ("./header_session.php");?>
		</header>

		<?php
			echo $_POST["targetWpNo"];
			$sqlId = "SELECT * 
				FROM member
				WHERE id = '".$_SESSION["id"]."'";
			$result = mysqli_query($conn,$sqlId);
			$row = mysqli_fetch_array($result);
			$mem_no = $row["no"];
			
			$sqlNumber = "SELECT * FROM score";
			$resultNum = mysqli_query($conn, $sqlNumber);
			if (mysqli_num_rows($result) > 0) {
				while($sc_row = mysqli_fetch_array($resultNum)){
					$number = $sc_row["no"]+1;
				}
			}
			
			$sqlINSERT = "INSERT INTO score values('".$number."' , '".$_POST["targetWpNo"]."' , '".$mem_no."' , ";
			//$_SESSION["submitQuery"] = $sqlINSERT;
			//$insert = $result = mysqli_query($conn, $sqlINSERT);
		?>
		<form method=POST style="text-align:center;" action="submitSent.php" enctype="multipart/form-data"> <!---->
			<input type='file' name='image' accept="image/*">
			<textarea rows="5" cols="20" name="comment" placeholder="여기에 한줄평을 입력해주세요." style="width:80%;height:35%; font-size:4em; word-break:break-all;"></textarea><br/>
			<span style="font-size:4em;">평점평균: <input type=text name="score" style ="width:10%;height:10%; font-size:1em;"></span>
			<button href="selectstore.php">돌아가기</button><input type=submit name="submit" value=확인>
			<input type="hidden" name="submitQuery" value="<?php echo $sqlINSERT;?>" /> 
			<input type="hidden" name="id_name" value="<?php echo $_POST["id_name"];?>" /> 
			<input type="hidden" name="targetWpNo" value="<?php echo $_POST["targetWpNo"];?>" /> 
		</form>
	</body>

</html>