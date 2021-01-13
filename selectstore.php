<html>
	<head>
		<style>@import url(main4.css);
				@import url(review1.css);
		</style>
	</head>
	<body>
		<header>
			<?php
				include ("./header_session.php");
				echo $_POST["Do"]." ".$_POST["SiGunGu"]." ".$_POST["UpMyunDong"];
				
			?>			
			<form  style = display:inline; method=POST action="info.php">
				<input type=submit name="gotoinfo" value="지역변경"/>
				<input type="hidden" name="id_name" value="<?php echo $_POST["id_name"]?>" /> 
			</form>
		</header>
		</br>
		<section>
			<?php
				$avgQurey = "SELECT workplace_no, AVG(score) FROM score GROUP BY workplace_no";
				$avgResult = mysqli_query($conn,$avgQurey);
				if(mysqli_num_rows($avgResult)>0){
					while($avgRow=mysqli_fetch_array($avgResult)){
						$updateAvgQuery = "UPDATE workplace SET score='".$avgRow[1]."' WHERE no=".$avgRow[0];
						$updateAvgResult = mysqli_query($conn, $updateAvgQuery);
					}
				}
				
				$sql="SELECT * FROM workplace where state LIKE '".$_POST["Do"]."%' AND state LIKE '%".$_POST["SiGunGu"]."%' AND state LIKE '%".$_POST["UpMyunDong"]."%'";
				$result = mysqli_query($conn,$sql);
				if(mysqli_num_rows($result)>0){
					while($row = mysqli_fetch_array($result)){

						echo "<fieldset style = border-style:none;><form id=store method=POST action='review.php'><image>
							<input id='rowname' style = 'border-style:none; font-size:100%;' type = text name = 'rowname' value = '".$row["name"]." 'readonly><br/>
							<span>평점평균 ".$row["score"]."</span><br/>
							<input type=submit value='최근리뷰'/>
							<input type='hidden' name='id_name' value='".$_POST["id_name"]."' />
							<input type='hidden' name='wp_no' value='".$row["no"]."' />
							<input type='hidden' name='wp_name' value='".$row["name"]."' />
							</form></fieldset>";
						//echo "<br/>";
					}
				}
			?>
		</section>
	</body>
</html>