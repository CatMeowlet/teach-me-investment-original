<?php 
	//QUERY USER INFO
	include('../../controller/check-session-info.php');
	if(isset($_SESSION['userType_session'])){
		$sessionType = $_SESSION['userType_session'];
		//check session type if not admin then redirect to normal page
		//if admin then show page
		if($sessionType == 1 || $sessionType !== null){
			include 'includes/admin_header.php';
		}else{
			$url = "../../page/home.php";
 			header( "refresh:1; url=$url" ); 
 			echo "redirecting";
		}
	}else{
			$url = "../../page/login.php";
 			header( "refresh:1; url=$url" ); 
 			echo "redirecting";
		}
?>