<?php
try {

    if (!file_exists('connection-pdo.php' ))
        throw new Exception();
    else
        require_once('connection-pdo.php' ); 
		
} catch (Exception $e) {

	$arr = array ('code'=>"0",'msg'=>"There were some problem in the Server! Try after some time!");

	echo json_encode($arr);

	exit();
	
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email,$v_code){
	require('PHPMailer/PHPMailer.php');
	require('PHPMailer/SMTP.php');
	require('PHPMailer/Exception.php');

	$mail = new PHPMailer(true);

	$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
	$host = $_SERVER['HTTP_HOST'];
	$scriptPath = dirname($_SERVER['PHP_SELF']);
	$verifyUrl = "$protocol://$host$scriptPath/verify.php?email=" . urlencode($email) . "&v_code=" . urlencode($v_code);

	try {
		$mail->isSMTP();
		$mail->Host       = 'smtp.gmail.com';
		$mail->SMTPAuth   = true;
		$mail->Username   = 'agravatprem00@gmail.com';
		$mail->Password   = 'kaly hfax tmmb viqs';
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
		$mail->Port       = 587;

		$mail->setFrom('agravatprem00@gmail.com',"Veggie Village");
		$mail->addAddress($email);

		//Content
		$mail->isHTML(true);
		$mail->Subject = 'Email Verification from Veggie Village';
		$mail->Body    = "Thanks for registration!
		Click the link to verify the email address
		<a href='$verifyUrl'>Verify</a>";

		$mail->send();
		return true;
	} catch (Exception $e) {
		return false;
	}
}

if (!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['password'])) {
	$arr = array ('code'=>"0",'msg'=>"Invalid POST variable keys! Refresh the page!");

	echo json_encode($arr);
	exit();
}

$regex_email = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
$regex_name = '/^[(A-Z)?(a-z)?(0-9)?\s*]+$/';

$regex_password = '/^[(A-Z)?(a-z)?(0-9)?!?@?#?-?_?%?]+$/';

if (!preg_match($regex_name, $_POST['name']) || !preg_match($regex_email, $_POST['email']) || !preg_match($regex_password, $_POST['password'])) {

	$arr = array ('code'=>"0",'msg'=>"Whoa! Invalid Inputs!");

	echo json_encode($arr);

	exit();

} else {

	date_default_timezone_set("Asia/Kolkata");

	$email = $_POST['email'];
	$name = $_POST['name'];
	$password = $_POST['password'];

	$timest = date("d:m:Y h:i:sa");


	$sql = "SELECT * FROM users WHERE email=?";

	$query  = $pdoconn->prepare($sql);
	$query->execute([$email]);
	$arr_login=$query->fetchAll(PDO::FETCH_ASSOC);
	$row = $query->rowCount();

	if ($row != 0) {
		$arr = array ('code'=>"0",'msg'=>"Duplicate entry found! Try registering with different email id!");

		echo json_encode($arr);

		exit();

	} else {
        $v_code = bin2hex(random_bytes(16));
		$sql = "INSERT INTO users(name,email,password,timestamp,verification_code,is_verified) VALUES(?,?,?,?,?,?)";
	    $query  = $pdoconn->prepare($sql);
	    if ($query->execute([$name, $email, $password, $timest, $v_code, "0"]) && sendMail($_POST['email'],$v_code)) {

	    	$arr = array ('code'=>"1",'msg'=>"Sign Up succeessfull! , please verify your email");

			echo json_encode($arr);
	    	
	    } else {
	    	$arr = array ('code'=>"0",'msg'=>"There were some problem in the server! Please try again after some time!");

			echo json_encode($arr);
	    }
	}

}