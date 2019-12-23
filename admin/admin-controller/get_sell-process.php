<?php
	//CONNECT DB - link
	$conn = mysqli_connect("localhost","root","","capstone");

	$status = 'QUEUED';
	$action = 'SELL';

	/*$query = "SELECT * FROM game_queue_stocks WHERE gq_status ="."'".$status."'". " AND user_id ="."'".$userID."'";
	$viewTradeRes = mysqli_query($link, $query);*/
    $query_get_sell_action = "SELECT * FROM game_queue_stocks WHERE gq_action = ? AND gq_status = ? ORDER BY gq_date_placed";

	$stmt_view =  $conn->prepare($query_get_sell_action);
	$stmt_view->bind_param('ss',$action,$status);
	$stmt_view->execute();
	$resultSell = $stmt_view->get_result();
	$sell_res = $resultSell->fetch_all(MYSQLI_ASSOC);

?>