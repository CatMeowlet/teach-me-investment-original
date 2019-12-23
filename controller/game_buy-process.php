<?php
include('../controller/check-session-info.php');
	//CONNECT DB - link
$link = mysqli_connect("localhost","root","","capstone");

date_default_timezone_set("Asia/Manila");

if(isset($_POST['submitOrder'])){

	$userID  = $_SESSION['userID_session'];
	$action = $_POST['transactionRadio'];
	$tick = $_POST['order_tick'];
	$pricePerShare = $_POST['order_price'];
	$qtyOfShare = $_POST['order_qty'];
	$expectedValue = $_POST['order_value'];
	$status = 'QUEUED';
	$datePlaced = date("Y-m-d H:i:s");

	//check user cash balance
	$query_gq_total = 'SELECT SUM(gq_expected_total) AS value_sum FROM game_queue_stocks
	 WHERE user_id ='."'".$userID."'"
	 .'AND gq_action ='."'".$action."'"
	 .'AND gq_status ='."'".$status."'";
	$query_gq_total_result = mysqli_query($link, $query_gq_total);
	$rowRes = mysqli_fetch_assoc($query_gq_total_result);
	$sum = $rowRes['value_sum'];


	$query_check_user_cash = 'SELECT gl_cash FROM game_lobby
	WHERE user_id ='."'".$userID."'";

	$game_lobby_user_result = mysqli_query($link, $query_check_user_cash);
	$row = mysqli_fetch_assoc($game_lobby_user_result);
	$curr_gl_cash = $row['gl_cash'];

	if($sum == null){
		doInsert($userID,$action,$tick,$pricePerShare,$qtyOfShare,$expectedValue,$status,$datePlaced);
	}else if(($sum+$expectedValue) < $curr_gl_cash){
		doInsert($userID,$action,$tick,$pricePerShare,$qtyOfShare,$expectedValue,$status,$datePlaced);

	}else{
		header("location: http://localhost/capstone/page/virtual-game/index.php?insufficientBalance=true");
		mysqli_close();
	}
/*
	$query = "INSERT INTO game_queue_stocks (user_id,gq_action,gq_stock_symbol, gq_stock_bid_price, gq_stock_qty,gq_expected_total gq_status,gq_date_placed) VALUES (?,?,?,?,?,?,?,?) ";

	$stmt = $link->prepare($query);
	$stmt->bind_param("isssssss",$userID,$action,$tick,$pricePerShare,$qtyOfShare,$expectedValue,$status,$datePlaced);
	$result = $stmt->execute();

	if($result){
		header("location: http://localhost/capstone/page/virtual-game/index.php?orderPlace=true");
	}else
	header("location: http://localhost/capstone/page/virtual-game/index.php?orderPlace=false");*/

}

function doInsert($userID,$action,$tick,$pricePerShare,$qtyOfShare,$expectedValue,$status,$datePlaced){
	$conn = mysqli_connect("localhost","root","","capstone");


	$query = 'INSERT INTO game_queue_stocks (user_id,gq_action,gq_stock_symbol, gq_stock_bid_price, gq_stock_qty,gq_expected_total,gq_status,gq_date_placed) VALUES ('."'".$userID."'".','."'".$action."'".','."'".$tick."'".','."'".$pricePerShare."'".','."'".$qtyOfShare."'".','."'".$expectedValue."'".','."'".$status."'".','."'".$datePlaced."'".')';

	$result = mysqli_query($conn,$query);
	console_log($result);
	if($result){
		header("location: http://localhost/capstone/page/virtual-game/index.php?orderPlace=true");
		mysqli_close();
	}else{
		header("location: http://localhost/capstone/page/virtual-game/index.php?orderPlace=false");
		mysqli_close();

	}
	/**$query = "INSERT INTO game_queue_stocks (user_id,gq_action,gq_stock_symbol, gq_stock_bid_price, gq_stock_qty,gq_expected_total,gq_status,gq_date_placed) VALUES (?,?,?,?,?,?,?,?) ";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("isssssss",$userID,$action,$tick,$pricePerShare,$qtyOfShare,$expectedValue,$status,$datePlaced);
	$result = $stmt->execute();

	console_log($result);
	if($result){
		header("location: http://localhost/capstone/page/virtual-game/index.php?orderPlace=true");
	}
		//header("location: http://localhost/capstone/page/virtual-game/index.php?orderPlace=false");
		*/
}

?>