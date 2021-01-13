
<html>	
<head>
		<meta http-equiv="refresh" content="1">

		<style>@import url("main4.css");
		p{
			display:inline-block;
			position:absolute;
		}
		#sd{
			width:100px; 
			height:100px;
			border-radius:50%;
		}
		</style>
	</head>
	<body>
		<header>
			<?php
			
			include ('./header_session.php');
			?>
			
		</header>
		
		<form style =  display:inline; method=POST action="review.php">
			<input class="tab" type="submit" value="리뷰"/>
			<input type="hidden" name="id_name" value="<?php echo $_SESSION["id_name"];?>" /> 
			<input type="hidden" name="wp_no" value="<?php echo $_SESSION["wp_no"];?>" /> 
		</form>
		<form style =  display:inline; method=POST action="showMenu.php">
			<input class="tab" type="submit" value="메뉴"/>
			<input type="hidden" name="id_name" value="<?php echo $_SESSION["id_name"];?>" /> 
			<input type="hidden" name="wp_no" value="<?php echo $_SESSION["wp_no"];?>" /> 
		</form>

		<input class="tabclick" type="submit" value="자리 확인"></input>
		
		
		<?php
		if(isset($_POST["wp_no"])){
			$wp = $_POST["wp_no"];
			$_SESSION["wp_no"] = $_POST["wp_no"];
		}
		else{
			$wp = $_SESSION["wp_no"];
		}
			$tbSql = "SELECT * FROM table_resrv WHERE workplace_no=".$wp;
			$tbResult = mysqli_query($conn, $tbSql);
			
			if(mysqli_num_rows($tbResult)>0){
				while($row = mysqli_fetch_array($tbResult)){
					switch($row["sit_IO"])
					{
						case 0:
						$bcColor = "blue";
						break;
						case 1:
						$bcColor = "red";
					}

					echo "<p id='sd'; style=' left:".$row["xPos"]."px;  top:".$row["yPos"]."px; background-color:".$bcColor."'>".$row["no"]."</p>";
				}
			}
		?>
	</body>
<html>
