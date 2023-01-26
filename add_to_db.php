<!-- 將註冊資料加入 user 資料表 -->

<script type='text/javascript'>
        function sw(){
            swal("Good job!", "您已成功註冊!", "success");
        }        
</script>
<?php

	include ('package.php');
	$ps = $_POST["password"];
	echo $ps;
	echo "<br>";
	$pi = $_POST["id_number"];
	echo $pi;
	echo "<br>";
	$pr = $_POST["realname"];
	echo $pr;
	echo "<br>";
	$pu = $_POST["username"];
	echo $pu;	
	echo "<br>";
	$pp = $_POST["phone_number"];
	echo $pp;
	echo "<br>";
	$pe = $_POST["email"];
	echo $pe;
	
	
	$link = mysqli_connect("localhost", "tobio", "u/3g0 zo vm/6", "tobio");
    $link -> set_charset("UTF8"); // 設定語系避免亂碼

    if (!$link) {
    	die("Connection failed: " . mysqli_connect_error());
	}
	else{

	    
	    $sql = "INSERT INTO `user`(password, id_number, real_name, user_name, phone_number, email) 
	    						VALUES('$ps','$pi','$pr','$pu','$pp','$pe')";
	    
	    echo '<br>';
	    if ($link->query($sql) === TRUE) {
		  	echo "註冊成功!!";
		  	echo "<script type='text/javascript'>sw();</script>";
		  	// 2 seconds later, jump to index.php
		  	header("refresh:2;url= index.php"); 
				//確保重定向後，後續代碼不會被執行 
			exit;
		} else {
		  	echo "Error: " . $sql . "<br>" . $link->error;
		}

		$link->close();
	}
?>
