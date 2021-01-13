<html>
	<head>
		<style>@import url("main4.css")</style>
	</head>
	<body>
		<header>
			<?php include ('./header_session.php');?>
		</header>
		<section>
			<input class="tabclick" type="submit" value="리뷰"></input>
			<form style =  display:inline; method=POST action="showMenu.php">
				<input class="tab" type="submit" value="메뉴"/>
				<input type="hidden" name="id_name" value="<?php echo $_POST["id_name"];?>" /> 
				<input type="hidden" name="wp_no" value="<?php echo $_POST["wp_no"];?>" /> 
			</form>
			<form style =  display:inline; method=POST action="showtable.php">
				<input class="tab" type="submit" value="자리 확인"/>
				<input type="hidden" name="id_name" value="<?php echo $_POST["id_name"];?>" /> 
				<input type="hidden" name="wp_no" value="<?php echo $_POST["wp_no"];?>" /> 
			</form>
			<br/>
			<form method=POST action="Wpsend.php">
				<input type="submit" value="리뷰 작성"/>
				<input type="hidden" name="id_name" value="<?php echo $_POST["id_name"];?>" /> 
				<input type="hidden" name="wp_no" value="<?php echo $_POST["wp_no"];?>" /> 
				<input type="hidden" name="wp_name" value="<?php echo $_POST["wp_name"];?>" /> 
			</form>
			<?php
				$_SESSION['wp_no'] = $_POST["wp_no"];
				$sql = "SELECT member.name,score.score,score.comment,score.img 
				FROM score,member 
				WHERE workplace_no = (SELECT no FROM workplace WHERE no = '".$_SESSION["wp_no"]."') AND member.no=score.mem_no";
				$result = mysqli_query($conn,$sql);
				
				
				//$_SESSION['wpName'] = $_POST["rowname"];
				
				if(mysqli_num_rows($result)>0){
					while($row=mysqli_fetch_array($result)){
						echo "<br/><div><fieldset id='reviewIdx'>";
						if($row["img"]!="")
						{
							echo "<img src='img/".$row["img"]."'>";
						}
						else
						{
							echo "<img src='img/noneimg.png'>";
						}
						
						echo "".$row["name"]."</br>".$row["score"]."<br/>".$row["comment"]."";
						echo "</fieldset></div><br/>";
					}
				}
			?>
		</section>
	<body>
</html>