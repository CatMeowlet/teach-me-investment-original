<?php
	//CONNECT DB - link
$link = mysqli_connect("localhost","root","","capstone");

include('../controller/check-session-info.php');



$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$location = $_POST['location'];
$new_password = hash('sha256',$_POST['new_password']);
$old_password = hash('sha256',$_POST['old_password']);

$query = "UPDATE users SET
u_fname = ?,
u_lname = ?,
u_address = ?,
u_email = ?,
u_pass = ?
WHERE u_id=? AND u_name=? ";

$result = checkPass($old_password,$link,$user_id, $user_check);

console_log($result);

if($result){
	$stmt = $link->prepare($query);
	$stmt->bind_param("sssssis",$first_name,$last_name,$location,$email,$new_password,$user_id,$user_check);
	//EXECUTE
	$isSuccess = $stmt->execute();
}
console_log($user_id);

console_log($user_check);

console_log($isSuccess);

if($isSuccess){
	header("location: ../page/profile.php?update=success");
}else
	header("location: ../page/profile.php?update=failed");
function checkPass($old_password, $link,$user_id,$user_check){
   	//QUERY
	$query1 = "SELECT u_pass
	FROM users
	WHERE u_id=? AND u_name=? LIMIT 1";
	//PREPARE
	$stmt = $link->prepare($query1);
	$stmt->bind_param("is",$user_id,$user_check);
	//EXECUTE
	$stmt->execute();
	//BIND
	$stmt->bind_result($u_pass);
	//STORE RESULT
    $stmt->store_result();
	$stmt->fetch();

	if($u_pass == $old_password){
		return true;
	}else
		return false;

   }//end of funct

   ?>