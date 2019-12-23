<?php
include '../includes/console_log.php';
if(isset($_GET['id'], $_GET['tick'])){
	$id = $_GET['id'];
	$tick = $_GET['tick'];

	$link = mysqli_connect("localhost","root","","capstone");

	$query = "DELETE FROM game_watchlist WHERE user_id = '$id' AND gw_symbol = '$tick'  ";

	$res = mysqli_query($link,$query);

	if($res){
		header('location: ../page/virtual-game/watchlist.php?remove=success');
	}else
	header('location: ../page/virtual-game/watchlist.php?remove=failed');

}
?>