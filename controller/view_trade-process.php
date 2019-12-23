<?php
	//CONNECT DB - link
	$conn = mysqli_connect("localhost","root","","capstone");

	$userID  = $_SESSION['userID_session'];
	$status = 'QUEUED';
	$action = 'SELL';

	/*$query = "SELECT * FROM game_queue_stocks WHERE gq_status ="."'".$status."'". " AND user_id ="."'".$userID."'";
	$viewTradeRes = mysqli_query($link, $query);*/

	$viewTrade_query = "SELECT * FROM game_queue_stocks WHERE gq_status = ? AND user_id = ? AND gq_action = ? ";

	$stmt_view =  $conn->prepare($viewTrade_query);
	$stmt_view->bind_param('sis',$status,$userID,$action);
	$stmt_view->execute();
	$viewTradeRes = $stmt_view->get_result();

?>