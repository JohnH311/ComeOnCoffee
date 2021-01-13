<html>
	<head><head>
	<body>
		<form id='gopage' method='post' action="info.php"> 
			<input type="hidden" name="id_name" value="<?php echo $_POST["id_name"]?>" /> 
			<input type="hidden" name="targetWpNo" value="<?php echo $_POST["targetWpNo"]?>" /> 
		</form> 
	</body>
</html>
<?php
		$conn=mysqli_connect("localhost", "root", "948672" , "db1");
		session_start();
		
		$file=$_FILES['image'];
		$upload_directory = 'img/';
		$ext_str = "jpg,jpeg,png,bmp";
		$allowed_extensions = explode(',',$ext_str);
		
		$max_file_size = 5242880;
		$ext = substr($file['name'],strrpos($file['name'],'.')+1);
		
		if(!in_array($ext, $allowed_extensions)){
			echo "업로드 할 수 없는 확장자 입니다.";
			exit();
		}
		
		if($file['size']>=$max_file_size){
			echo "5mb 까지만 업로드 가능합니다.";
			exit();
		}
		move_uploaded_file($file['tmp_name'],$upload_directory.$file['name']);
		$sqlINSERT = $_POST["submitQuery"]."'".$_POST["score"]."' , '".$_POST["comment"]."','".$file['name']."')";
		//echo $sqlINSERT;
		$insert = mysqli_query($conn, $sqlINSERT);
		echo "<script>document.getElementById('gopage').submit(); </script>";
?>
