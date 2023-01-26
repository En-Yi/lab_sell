<!-- 取得目前登入者的id跟名稱 -->
<?php
	$link = mysqli_connect("localhost", "tobio", "u/3g0 zo vm/6", "tobio");
    $link -> set_charset("UTF8"); // 設定語系避免亂碼

    if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
	$get_user = "SELECT * FROM `user_login` ";
	// $user_result = mysqli_query($link, $get_user);
	$uid = mysqli_fetch_array(mysqli_query($link, $get_user))['uid'];
	$username_login = mysqli_fetch_array(mysqli_query($link, $get_user))['user_name'];
	$welcome = mysqli_fetch_array(mysqli_query($link, $get_user))['welcome'];
}
?>
