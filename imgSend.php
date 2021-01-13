<html>
	<head></head>
	<body>
		<?php
		//$db_conn = mysqli_connect("localhost", "testdbadm", "testdbadm", "testdb");

		$file=$_FILES['image'];
		$upload_directory = 'img/';
		$ext_str = "jpg,jpeg,png,bmp";
		$allowed_extensions = explode(',',$ext_str);
		
		$max_file_size = 5242880;
		$ext = substr($file['name'],strrpos($file['name'],'.')+1);
		
		if(!in_array($ext, $allowed_extensions)){
			echo "업로드 할 수 없는 확장자 입니다.";
		}
		
		if($file['size']>=$max_file_size){
			echo "5mb 까지만 업로드 가능합니다.";
		}
		move_uploaded_file($file['tmp_name'],$upload_directory.$file['name']);
		?>
	</body>
</html>

