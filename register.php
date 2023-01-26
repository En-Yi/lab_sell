<?php
	include('package.php'); //載入套件
	include('css_template.php'); //css 模板
?>

<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
<html>
	<title>NE Chen 的拍賣網站 -- 註冊</title>
	<!-- Logo Area -->
		<div class="logo-area text-center">
			<div class="container h-100">
				<div class="row h-100 align-items-center">
					<div class="col-12">
						<a href="#" class="original-logo"><img src="img/core-img/logo.png" alt=""></a>
					</div>
				</div>
			</div>
		</div>
	
        
	<body onload="showalert()">
		

	<div class="site-main">
		<div class="container site-main-inner">
			<div class="content">
				<br>
				<h3>Welcome to NE's auction !!</h3>

				<form action="index.php">
					<input class="btn subscribe-btn" data-toggle="modal" type = "submit" value="回登入頁面" ><br><br>
				</form>
			
				<form action="add_to_db.php" method="post">
				<div>
					<label for="realname">真實姓名</label>
					<input type="text" id="realname" name="realname"><br>
					<label for="email">信箱</label>
					<input type="text" id="email" name="email"><br>
					<label for="id_number">身分證字號</label>
					<input type="text" id="id_number" name="id_number"><br>
					<label for="username">帳戶名稱</label>
					<input type="text" id="username" name="username"><br>
					<label for="phone_number">電話</label>
					<input type="text" name="phone_number"><br>
					<label for="password">密碼</label>
					<input type="password" id="pass" name="password">
					<input type="checkbox" onclick="showps()">顯示密碼
				</div>
				<br>
				<br>
	
				<script>
					document.getElementById("reg").addEventListener("click",function(){
						swal("Good job!", "您已成功註冊!", "success");
					});
				</script>

				<script type='text/javascript'>
					function foo() {
						var user_choice = window.confirm('你真的確定要註冊了嗎?');
						if(user_choice==true) {
						// window.location='your url';  // you can also use element.submit() if your input type='submit' 
						swal("Good job!", "您已成功註冊!", "success");
						} else { return false;	}
					}
				</script>
				<input class="btn subscribe-btn" data-toggle="modal" onClick="foo()" type = "submit" value="確認註冊" >

				</form>

			</div>
		</div>
	</div>


	</body>

	<!-- jQuery (Necessary for All JavaScript Plugins) -->
	<script src="js/jquery/jquery-2.2.4.min.js"></script>
	<!-- Popper js -->
	<script src="js/popper.min.js"></script>
	<!-- Bootstrap js -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Plugins js -->
	<script src="js/plugins.js"></script>
	<!-- Active js -->
	<script src="js/active.js"></script>

</html>

