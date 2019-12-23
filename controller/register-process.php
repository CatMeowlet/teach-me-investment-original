<?php
	//DEFINE USER LOGIN
	$username = $_POST['user'];
	$password = hash('sha256',$_POST['pass']);

	$type = 2;
	//DEFINE USER INFO
	$firsname = $_POST['fname'];
	$lastname = $_POST['lname'];
	$address = $_POST['address']; //CITY
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$country = $_POST['countriesOption'];



	//CONNECT DB - link
	$link = mysqli_connect("localhost","root","","capstone");

	//SQL QUERY
	$query = "INSERT INTO users (u_name, u_pass, u_type, u_fname, u_lname, u_address,u_gender,u_email,u_country)
				VALUES (?,?,?,?,?,?,?,?,?)";

	//PROTECT MYSQL INJECTION
	$stmt = $link->prepare($query);
	//BIND PARAM
	$stmt->bind_param("ssissssss", $username, $password, $type, $firsname, $lastname, $address, $gender, $email, $country);
	//EXECUTE PREPARED STATEMENT
	$stmt->execute();
    //CLOSE STATEMENT AND CONNECTION
    $stmt->close();
    //CLOSE DB CONNECTION
    mysqli_close($link);


	$url = "http://localhost/capstone/page/login.php";
 	header( "refresh:2; url=$url" );
 	echo "redirecting";


