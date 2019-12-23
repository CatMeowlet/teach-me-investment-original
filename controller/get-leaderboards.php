<?php
include_once('../../includes/console_log.php');
$link = mysqli_connect("localhost","root","","capstone");

//get user id
$query = "SELECT user_id , SUM(gp_stock_total_cost) as market_value FROM `game_portfolio` GROUP BY user_id ORDER BY market_value DESC";
$res = mysqli_query($link ,$query);


?>