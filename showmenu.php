<html>
	<head>
		<style>@import url("main4.css")</style>
	</head>
	<body>
		<header>
			<?php include ('./header_session.php');?>
		</header>
		<section>
			
		<form style =  display:inline; method=POST action="review.php">
			<input class="tab" type="submit" value="리뷰"/>
			<input type="hidden" name="id_name" value="<?php echo $_POST["id_name"];?>" /> 
			<input type="hidden" name="wp_no" value="<?php echo $_POST["wp_no"];?>" /> 
		</form>
		<input class="tabclick" type="submit" value="메뉴"></input>
		<form style =  display:inline; method=POST action="showTable.php">
			<input class="tab" type="submit" value="자리 확인"/>
			<input type="hidden" name="id_name" value="<?php echo $_POST["id_name"];?>" /> 
			<input type="hidden" name="wp_no" value="<?php echo $_POST["wp_no"];?>" /> 
		</form>
		<br/>
		<p>
		<?php 	$wpNamesql="SELECT * FROM workplace where no=".$_SESSION["wp_no"];
				$wpNameresult = mysqli_query($conn,$wpNamesql);
				$wpNamerow = mysqli_fetch_array($wpNameresult);
				echo $wpNamerow["name"];?> 의 메뉴</p>
		<?php
				$wpShowSql="SELECT * FROM menu where workplace_no=".$_SESSION["wp_no"];
				$wpShowResult = mysqli_query($conn, $wpShowSql);
				if(mysqli_num_rows($wpShowResult)>0)
				{
					while($wpShowRow = mysqli_fetch_array($wpShowResult))
					{
						echo "메뉴 이름 : ".$wpShowRow["name"]." 가격 : ".$wpShowRow["unit_price"]."<br/>";
					}
				}
				
		?>
	</body>
</html>