<html>
	<head><head>
	<body>
		<form id='gopage' method='post' action="submitReview.php"> 
			<input type="hidden" name="id_name" value="<?php echo $_POST["id_name"]?>"/>
			<input type="hidden" name="targetWpNo" value="<?php echo $_POST["wp_no"]?>"/>
		</form> 

	</body>
</html>

<?php
	$conn = mysqli_connect("localhost", "root", "948672" , "db1");
	session_start();
	
	$targetName=$_POST['wp_name'];
	
	$sql="SELECT * FROM workplace WHERE name='".$_POST['wp_name']."'";
	$result=mysqli_query($conn, $sql);
	$row=mysqli_fetch_array($result);
	mysqli_close($conn);
	echo "<html>
	<head><head>
	<body>
		<form id='gopage' method='post' action='submitReview.php'> 
			<input type='hidden' name='id_name' value='".$_POST["id_name"]."' /> 
			<input type='hidden' name='targetWpNo' value='" .$_POST["wp_no"]."' /> 
		</form> 

	</body>
	</html>";
	//$_SESSION["targetWp"]=$_POST["wp_no"];
	//echo $sql;
	echo "<script>document.getElementById('gopage').submit(); </script>";
?>
