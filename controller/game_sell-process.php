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


	//check if user portfolio has the stock
	$query_check = 'SELECT gp_owned_symbol,gp_owned_qty FROM game_portfolio WHERE user_id ='."'".$userID."'".'AND gp_owned_symbol='."'".$tick."'" ;
	$checkRes = mysqli_query($link,$query_check);
	$checkRow = mysqli_fetch_assoc($checkRes);
	$owned_qty = $checkRow['gp_owned_qty'];

	//check user queue if specific stock qty total is same with portfolio
	$query_gq_stock_qty_total = 'SELECT SUM(gq_stock_qty) AS qty_sum
	FROM game_queue_stocks
	WHERE user_id ='."'".$userID."'"
	.'AND gq_action ='."'".$action."'"
	.'AND gq_stock_symbol ='."'".$tick."'"
	.'AND gq_status ='."'".$status."'";


	$query_gq_stock_qty_total_res = mysqli_query($link, $query_gq_stock_qty_total);
	$rowRes = mysqli_fetch_assoc($query_gq_stock_qty_total_res);
	$sumQty = $rowRes['qty_sum'];

	// if user has the stock
	if($checkRes->num_rows != 0){
		// if user owned qty is greater than inputted qty to trade
		if($owned_qty >= $qtyOfShare){
			// if user sum quantity of the specific stock is null(did not exist yet)
			// else if user has the stock and quantity in trades AND if sum of quantity in trades plus inpyutted qty is less than owned qty
			//
			if($sumQty == null){
				doInsertSell($link,$userID,$action,$tick,$pricePerShare,$qtyOfShare,$expectedValue,$status,$datePlaced);
			}else if(($sumQty+$qtyOfShare) <= $owned_qty){
				doInsertSell($link,$userID,$action,$tick,$pricePerShare,$qtyOfShare,$expectedValue,$status,$datePlaced);
			}else
			header("location: http://localhost/capstone/page/virtual-game/index.php?quantityExceeded=true");
		}else
		header("location: http://localhost/capstone/page/virtual-game/index.php?insufficientQuantity=true");
	}else
	header("location: http://localhost/capstone/page/virtual-game/index.php?missingStock=true");
}
function doInsertSell($link,$userID,$action,$tick,$pricePerShare,$qtyOfShare,$expectedValue,$status,$datePlaced){
	$query = "INSERT INTO game_queue_stocks (user_id,gq_action,gq_stock_symbol, gq_stock_bid_price, gq_stock_qty, gq_expected_total, gq_status,gq_date_placed) VALUES (?,?,?,?,?,?,?,?) ";
	$stmt = $link->prepare($query);
	$stmt->bind_param("isssssss",$userID,$action,$tick,$pricePerShare,$qtyOfShare,$expectedValue,$status,$datePlaced);
	$result = $stmt->execute();

	if($result){
		header("location: http://localhost/capstone/page/virtual-game/index.php?tradePlace=true");
	}else
	header("location: http://localhost/capstone/page/virtual-game/index.php?tradePlace=false");
}

?>