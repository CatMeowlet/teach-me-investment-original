<?php
	//CONNECT DB - link
	$conn = mysqli_connect("localhost","root","","capstone");

	$userID  = $_SESSION['userID_session'];
	$status = 'CONFIRMED';
	/*$query = "SELECT * FROM game_queue_stocks WHERE gq_status ="."'".$status."'". " AND user_id ="."'".$userID."'";
	$viewTradeRes = mysqli_query($link, $query);*/

	$viewHistory_query = "SELECT * FROM game_queue_stocks WHERE gq_status = ? AND user_id = ? ";

	$stmt_view =  $conn->prepare($viewHistory_query);
	$stmt_view->bind_param('si',$status,$userID);
	$stmt_view->execute();
	$viewHistoryRes = $stmt_view->get_result();

?>