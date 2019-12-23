<?php
	//CONNECT DB - link
	$conn1 = mysqli_connect("localhost","root","","capstone");

	$userID  = $_SESSION['userID_session'];
	$status = 'PENDING';
	$action = 'SELL';

	/*$query = "SELECT * FROM game_queue_stocks WHERE gq_status ="."'".$status."'". " AND user_id ="."'".$userID."'";
	$viewTradeRes = mysqli_query($link, $query);*/

	$viewPortfolio_query = "SELECT * FROM game_portfolio WHERE user_id = ?";

	$stmt_view_port =  $conn1->prepare($viewPortfolio_query);
	$stmt_view_port->bind_param('i',$userID);
	$stmt_view_port->execute();
	$viewPortRes = $stmt_view_port->get_result();

?>