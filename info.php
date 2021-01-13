<html>
	<head>
		<style>@import url(main4.css);</style>
	</head>
	<body>
		<header>
			<?php include ("./header_session.php");?>
		</header>
		<section>
			<form method="post" action="selectstore.php">
				<select name="Do">
					<option value="0" selected hidden>도, 광역시</option>
					<option value="서울특별시">서울특별시</option>
					<option value="인천광역시">인천광역시</option>
					<option value="경기도">경기도</option>
					<option value="부산광역시">부산광역시</option>
					<option value="대구광역시">대구광역시</option>
					<option value="울산광역시">울산광역시</option>
					<option value="경상북도">경상북도</option>
					<option value="경상남도">경상남도</option>
					<option value="대전광역시">대전광역시</option>
					<option value="세종특별시">세종특별시</option>
					<option value="충청북도">충청북도</option>
					<option value="충청남도">충청남도</option>
					<option value="광주광역시">광주광역시</option>
					<option value="전라북도">전라북도</option>
					<option value="전라남도">전라남도</option>
					<option value="강원도">강원도</option>
					<option value="제주도">제주도</option>
				</select>
				<input name = "SiGunGu" type="text" placeholder="시,군,구" size=9/>
				<input name = "UpMyunDong" type="text" placeholder="읍,면,동" size=9/>
				<input type = "submit" id= "schCommit" value=" "/>
				<input type="hidden" name="id_name" value="<?php echo $_POST["id_name"]?>"/>
 			</form>
			<br/>
			<br/>
		

			<!-- * 카카오맵 - 지도퍼가기 -->
			<!-- 1. 지도 노드 -->
			<div style="margin: auto;" id="daumRoughmapContainer1606399192204" class="root_daum_roughmap root_daum_roughmap_landing"></div>

			<!--
				2. 설치 스크립트
				* 지도 퍼가기 서비스를 2개 이상 넣을 경우, 설치 스크립트는 하나만 삽입합니다.
			-->
			<script charset="UTF-8" class="daum_roughmap_loader_script" src="https://ssl.daumcdn.net/dmaps/map_js_init/roughmapLoader.js"></script>

			<!-- 3. 실행 스크립트 -->
			<script charset="UTF-8">
				new daum.roughmap.Lander({
					"timestamp" : "1606399192204",
					"key" : "235yf",
					"mapWidth" : "800",
					"mapHeight" : "1200"
				}).render();
			</script>
		</section>
	</body>
	
</html>
