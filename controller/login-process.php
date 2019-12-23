<?php
	//start session
	session_start();

	//define user and pass
	$username = $_POST['user'];
	$password = hash('sha256',$_POST['pass']);

	//CONNECT DB - link
	$link = mysqli_connect("localhost","root","","capstone");

	//SQL QUERY
	$query = "SELECT u_id, u_name, u_pass, u_type
					FROM users
					WHERE
					u_name =? and u_pass =? LIMIT 1";

	//PROTECT MYSQL INJECTION
	$stmt = $link->prepare($query);
	//ss <- string string
	$stmt->bind_param("ss", $username, $password);
	//EXECUTE PREPARED STATEMENT
	$stmt->execute();
	 //BIND RESULT VARIABLES
    $stmt->bind_result($u_id, $u_name, $u_pass, $u_type);
    //STORE RESULT
    $stmt->store_result();
    //FETCH RESULT
    $stmt->fetch();

    //VERIFY
    if($u_name == $username && $u_pass == $password){

    	//BIND SESSION USER AND USER TYPE
    	//REGARDLESS OF WHAT TYPE OF USER
        $_SESSION['userID_session'] = $u_id;
    	$_SESSION['user_session'] = $u_name;
    	$_SESSION['userType_session'] = $u_type;

    	if($u_type == 1 ){
    		//REDIRECT TO WEBMASTER
    		header('location: http://'. $_SERVER['HTTP_HOST'].'/capstone/admin/page/news-add.php');
    	}elseif ($u_type == 2) {
    		//REDIRECT TO HOME BASIC
    		//header("location:  home/index.php");
    		header('location: http://'. $_SERVER['HTTP_HOST'].'/capstone/page/home.php');
    	}
    }else{
    		//header("location:  home/index.php");
    		header('location: http://'. $_SERVER['HTTP_HOST'].'/capstone/page/login.php');
    	echo "error";
    }

    //CLOSE STATEMENT AND CONNECTION
    $stmt->close();
    //CLOSE DB CONNECTION
    mysqli_close($link);
?><!--END OF PHP-->