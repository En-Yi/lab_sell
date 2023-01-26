<!-- 寄信主要檔案 -->

<a href="home.php">回首頁</a>

<?php

	date_default_timezone_set('Etc/GMT-8');
	$date = date('Y/m/d H:i:s');

	//設定time out
	set_time_limit(120);
	//echo !extension_loaded('openssl')?"Not Available":"Available";

	require_once("./PHPMailer-5.2.9/PHPMailerAutoload.php"); //記得引入檔案 
	$mail = new PHPMailer;

	//$mail->SMTPDebug = 3; // 開啟偵錯模式

	$mail->isSMTP(); // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
	$mail->SMTPAuth = true; // Enable SMTP authentication

	$mail->Username = 'feixiongxiao1222@gmail.com 
	'; // SMTP username // 預設用此信箱寄信給得標者


	$mail->Password = 'tobio1222'; // SMTP password
	$mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587; // TCP port to connect to

	$mail->setFrom('feixiongxiao1222@gmail.com', 'NE 拍賣'); //寄件的Gmail
	// $mail->addAddress('ptgsdace210744@gmail.com', '陳NE'); // 收件的信箱




	$link = mysqli_connect("localhost", "tobio", "u/3g0 zo vm/6", "tobio");
	$link -> set_charset("UTF8"); // 設定語系避免亂碼

    if (!$link) {
    	die("Connection failed: " . mysqli_connect_error());
	}
	else{
		// 選擇寄信給 截止日期已到的商品 之所有得標者

		$send_mail = "SELECT bid.mid, MAX(bid.price), bid.buyer_id, merchandise.mid, merchandise.mname, merchandise.end_date, merchandise.send_mail, merchandise.present_price, user.uid, user.real_name, user.email FROM bid, merchandise, user WHERE bid.mid = merchandise.mid AND bid.buyer_id = user.uid GROUP by bid.mid";
		$result_send_mail = mysqli_query($link, $send_mail);

		while ($row = mysqli_fetch_array($result_send_mail)) {

			$mname = $row[4];
			$end_date = $row[5];
			$send_mail = $row[6];
			$present_price = $row[7];
			$real_name = $row[9];
			$objective_mail_address = $row[10];
			$mail->addAddress($objective_mail_address, $real_name);
			$mail->isHTML(true); // Set email format to HTML

			// 寄信內容	
				
			if(strtotime($date) > strtotime($end_date) && $send_mail != '1'){
				$mail->Subject = 'NE 拍賣--得標通知';
				$mail->Body = '恭喜您!!'.$real_name.' 以 '.$present_price.' 元得標 '.$mname.'!!';
				$mail->AltBody = 'This is the 中文 body in plain text for non-HTML mail clients';

				if(!$mail->send()) {
				 	echo 'Message could not be sent.';
	 				echo 'Mailer Error: ' . $mail->ErrorInfo;
				} else {
	 				echo 'Message has been sent';
	 				$have_sent = "UPDATE merchandise SET `send_mail` = '1' WHERE '$date' > end_date";
	 				mysqli_query($link, $have_sent);

				}
			}
		}

	}
?> 




