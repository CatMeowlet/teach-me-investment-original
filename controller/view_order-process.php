<?php
	//CONNECT DB - link
	$link = mysqli_connect("localhost","root","","capstone");

	$userID  = $_SESSION['userID_session'];
	$status = 'QUEUED';
	$action = 'BUY';

	/*$query = "SELECT * FROM game_queue_stocks WHERE gq_status ="."'".$status."'". " AND user_id ="."'".$userID."'";
	$viewTradeRes = mysqli_query($link, $query);*/

	$viewOrder_query = "SELECT * FROM game_queue_stocks WHERE gq_status = ? AND user_id = ? AND gq_action = ? ";

	$stmt_view =  $link->prepare($viewOrder_query);
	$stmt_view->bind_param('sis',$status,$userID,$action);
	$stmt_view->execute();
	$viewOrderResult = $stmt_view->get_result();

?>