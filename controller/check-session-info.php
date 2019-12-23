<?php
	include_once($_SERVER['DOCUMENT_ROOT'].'/capstone/includes/console_log.php');
	//CONNECT DB - link
	$link = mysqli_connect("localhost","root","","capstone");

	//SESSION START
	session_start();

	//SESSION CHECK
	if(isset($_SESSION['user_session'],$_SESSION['userType_session'], $_SESSION['userID_session'])){
	$user_id = $_SESSION['userID_session'];
	$user_check = $_SESSION['user_session'];
	$user_type = $_SESSION['userType_session'];
	//QUERY
	$query = "SELECT u_fname, u_lname, u_address, u_gender, u_email, u_country
				FROM users
				WHERE u_name = ? AND u_type = ?";
	//PREPARE
	$stmt = $link->prepare($query);
	$stmt->bind_param("si",$user_check,$user_type);
	//EXECUTE
	$stmt->execute();
	//BIND
	$stmt->bind_result($u_fname, $u_lname, $u_address, $u_gender,$u_email,$u_country);
	//STORE RESULT
    $stmt->store_result();
    //FETCH RESULT
    $stmt->fetch();
	}


 ?>
