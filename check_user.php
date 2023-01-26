<!-- 在index.php檢查使用者帳密是否正確 -->
<?php
	if (isset($_POST['check_user'])) {
		$username_login = $_POST['user_name'];
		$password_login = $_POST['password'];
		$welcome = $_POST['welcome'];
		$check_user = 0;

		// 回傳user table data
      	include('user_database.php'); // return $pick_all_result
      	while($rowr = mysqli_fetch_array($pick_all_result)){
        	if ($rowr['user_name'] == $username_login && $rowr['password'] == $password_login){
          		$check_user = 1;
        	}
      	}
      	// 如果正確則記錄此登入使用者
      	if($check_user){
      		include('loginid.php');
      		// jump to home.php
      		header("refresh:0.5;url= home.php"); 
      	}
      	else
      		echo "帳號或密碼錯誤~";
	}
?>