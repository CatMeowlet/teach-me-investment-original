<?php
	//SESSION START
	session_start();
	//destory data from session
	if(session_destroy()){
		//redirect to login page
		$url = "http://localhost/capstone/page/login.php";
 		header( "refresh:1 ; url=$url" );
 		echo "redirecting";
	}
 ?>