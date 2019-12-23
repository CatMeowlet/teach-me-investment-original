<?php
	//ADMIN CONTROLLER
   	include $_SERVER['DOCUMENT_ROOT'].'/capstone/controller/check-session-info.php';
	//include('../controller/check-session-info.php');

	if(isset($_SESSION['userType_session'])){
		$sessionType = $_SESSION['userType_session'];

		//check session type if not admin then redirect to normal page
		//if admin then show page
		if($sessionType == 2 && $sessionType !== null){
			include  $_SERVER['DOCUMENT_ROOT'].'/capstone/page/includes/header.php';
		}else{
		$url = "../page/login.php";
 		header( "refresh:1; url=$url" );
 		echo "redirecting";
		}
	}

?>