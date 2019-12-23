<?php
include 'check-session-info.php';
if(isset($_GET['history_id'])){
	$id = $_GET['history_id'];
	$uid = $_SESSION['userID_session'];
	$action = 'REMOVED';
	$link = mysqli_connect("localhost","root","","capstone");

	$query = "UPDATE game_queue_stocks SET gq_status ='$action' WHERE history_id='$id' AND user_id='$uid' ";

	$res = mysqli_query($link,$query);

	if($res){
		header('location: ../page/virtual-game/index.php?remove=success');
	}else
		header('location: ../page/virtual-game/index.php?remove=failed');
}
?>