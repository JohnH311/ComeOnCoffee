<html>
	<head>
		<title></title>
		<script type="text/javascript">
		function formSubmit(f){
			var extArray = new Array('jpg','jpeg','png','bmp');
			var path = document.getElementById("upfile").value;
			if(path == ""){
				alert("파일을 선택해 주세요.");
				return false;
			}
			
			var pos = path.indexOf(".");
			if(pos <0){
				alert("확장자가 없는 파일입니다.");
				return false;
			}
			
			var ext = path.slice(path.indexOf(".")+1).toLowerCase();
			var checkExt = false;
			for(var 1=0; i<extArray.length;i++){
				if(ext == extArray[i]){
					checkExt = true;
					break;
				}
			}
			
			if(checkExt == false){
				alert("업로드 할 수 없는 파일 확장자 입니다.");
				return false;
			}
			
			return true;
		}
		</script>
	</head>
	<body>
		<form name="uploadForm" id="uploadForm" action="imgSend.php" 
		enctype="multipart/form-data" method = "POST" onsubmit="return formSubmit(this);">
		
		<input type='file' name='image'>
		<input type='submit' value='이미지 전송 '>
		</form>
	<body>
</html>