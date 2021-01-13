<?php
	session_start();
	$_SESSION['prePage']=1;
	?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<style>
	@import url(registration.css);
</style>
<script>

	var id_name=document.getElementsByName("id_name");
	var logname=document.getElementsByName("pName");
	var password=document.getElementsByName("password");
	var div_Member=document.getElementsByName("div_Member");
	var phone=document.getElementsByName("phone");

	

	function btnNullExcption(){
	
		var form = document.createElement("form");
		form.setAttribute("charset","UTF-8");
		form.setAttribute("method","Post");
		form.setAttribute("action","insertToDB.php");
		if (id_name[0].value==""){
			alert("ID는 필수로 입력해야 합니다!");
		}
		else if(password[0].value==""){
			alert("비밀번호는 필수로 입력해야 합니다!");
		}
		else if(phone[0].value==""){
			alert("전화번호는 필수로 입력해야 합니다!");
		}
		else if(logname[0].value==""){
			alert("이름은 필수로 입력해야 합니다!");
		}
		else{
		var field = document.createElement("input");
		field.setAttribute("type","hidden");
		field.setAttribute("name","name");
		field.setAttribute("value",logname[0].value);
		form.appendChild(field);
	
		field = document.createElement("input");
		field.setAttribute("type","hidden");
		field.setAttribute("name","phone");
		field.setAttribute("value",phone[0].value);
		form.appendChild(field);
	
		field = document.createElement("input");
		field.setAttribute("type","hidden");
		field.setAttribute("name","id_name");
		field.setAttribute("value",id_name[0].value);
		form.appendChild(field);
	
		field = document.createElement("input");
		field.setAttribute("type","hidden");
		field.setAttribute("name","password");
		field.setAttribute("value",password[0].value);
		form.appendChild(field);
		
		field = document.createElement("input");
		field.setAttribute("type","hidden");
		field.setAttribute("name","div_Member");
		field.setAttribute("value",div_Member[0].value);
		form.appendChild(field);
		
		var url ="insertToDBbc.php"

		var title = "testpop"

		var status = "toolbar=no,directories=no,scrollbars=no,resizable=no,status=no,menubar=no,width=1240, height=1200, top=0,left=20"

		//window.open("", title,status);

		form.target = title;
		document.body.appendChild(form);

 
		form.submit();
		}
		
	}
</script>

</head>	

<body>
	<h1>회원가입</h1>
	<hr>
		<label>이름 &nbsp;&nbsp; <input type="text" size="15" name="pName"></label><br><br>
		<label>전화번호 &nbsp;&nbsp;<input type="phone" placeholder="예)010-1234-5678" size="15" name="phone"></label><br><br>
		<label>아이디 &nbsp;&nbsp;<input type="text" size="15" name="id_name"></label><br><br>
		<label>비밀번호 &nbsp;&nbsp;<input type="password" size="15" name="password"></label><br><br>
		<label>사용자 구분 &nbsp;&nbsp;<input type="text" size="1" name="div_Member"></label><br><br>
		<input onclick="btnNullExcption()" type="submit" id="btn" value="확인">

</body>
</html>