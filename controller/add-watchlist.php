<?php
include '../includes/console_log.php';
session_start();
if(isset($_POST['submitAdd'])){
	$game_stocks = $_POST['game_stocks'];
	$id =  $_SESSION['userID_session'];

	$link = mysqli_connect("localhost","root","","capstone");
	$query = "SELECT * FROM game_stocks LEFT JOIN game_watchlist ON game_stocks.securitySymbol = game_watchlist.gw_symbol WHERE game_watchlist.user_id = '$id' AND game_watchlist.gw_symbol = '$game_stocks'";
	$res = mysqli_query($link,$query);
	$count = mysqli_num_rows($res);
	console_log($query);
	console_log($count);
	if($count == 0){
		$query_add = "INSERT INTO game_watchlist (user_id, gw_symbol) VALUES ('$id','$game_stocks');";
		$result = mysqli_query($link,$query_add);

		if($result){
			header('location: ../page/virtual-game/watchlist.php?add=success');
		}else
		header('location: ../page/virtual-game/watchlist.php?add=failed');
	}else
	header('location: ../page/virtual-game/watchlist.php?is_exist=true');
}
?>