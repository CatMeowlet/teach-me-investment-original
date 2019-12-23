<?php
include 'console_log.php';
include 'get_sell-process.php';
include 'get_buy-process.php';
date_default_timezone_set("Asia/Manila");
		//check db connection
$link = new mysqli("localhost","root","","capstone");

if($link->connect_error){
	die("Connection with db failed: " . $link->connect_error);
	echo 'Connection with db is offline..';
	sleep(30);
}else{
	foreach ($sell_res as $key_sell => $value_sell) {
		foreach ($buy_res as $key_buy => $value_buy) {
			if($value_sell['gq_stock_symbol'] == $value_buy['gq_stock_symbol'] && $value_sell['gq_stock_qty'] == $value_buy['gq_stock_qty']){
				console_log($value_sell['gq_stock_symbol']."==".$value_buy['gq_stock_symbol']);
				if($value_sell['gq_stock_bid_price'] <= $value_buy['gq_stock_bid_price']){

					$sellerID = $value_sell['user_id'];
					$seller_historyID = $value_sell['history_id'];
					$seller_tick = $value_sell['gq_stock_symbol'];
					$seller_qty = $value_sell['gq_stock_qty'];
					$seller_bid_price = $value_sell['gq_stock_bid_price'];
					$seller_bid_price_total = $value_sell['gq_expected_total'];

					$buyerID = $value_buy['user_id'];
					$buyer_historyID = $value_buy['history_id'];
					$buyer_tick = $value_buy['gq_stock_symbol'];
					$buyer_qty  = $value_buy['gq_stock_qty'];
					$buyer_bid_price = $value_buy['gq_stock_bid_price'];
					$buyer_bid_price_total = $value_buy['gq_expected_total'];

					process($sellerID,$seller_historyID,$seller_tick,$seller_qty,$seller_bid_price,$seller_bid_price_total ,$buyerID,$buyer_historyID,$buyer_tick,$buyer_qty,$buyer_bid_price,$buyer_bid_price_total);
				}
			}
		}
	}
}



//funct
function process($sellerID,$seller_historyID,$seller_tick,$seller_qty,$seller_bid_price,$seller_bid_price_total ,$buyerID,$buyer_historyID,$buyer_tick,$buyer_qty,$buyer_bid_price,$buyer_bid_price_total){

	$link = mysqli_connect("localhost","root","","capstone");

	$query_gl_user_seller = "SELECT * FROM game_lobby WHERE user_id = '$sellerID'";
	$query_gl_user_buyer = "SELECT * FROM game_lobby WHERE user_id = '$buyerID'";

	//get all info
	$result_gl_user_seller = mysqli_query($link, $query_gl_user_seller);
	$result_gl_user_buyer = mysqli_query($link, $query_gl_user_buyer);
	//seller
	if($result_gl_user_seller){
		$rowS =  mysqli_fetch_row($result_gl_user_seller);
		$gl_uid_seller = $rowS['1'];
		$gl_cash_seller = $rowS['7'];
		$gl_buying_power_seller = $rowS['8'];
	}
	//buyer
	if($result_gl_user_buyer){
		$rowB = mysqli_fetch_row($result_gl_user_buyer);
		$gl_uid_buyer = $rowB['1'];
		$gl_cash_buyer = $rowB['7'];
		$gl_buying_power_buyer = $rowB['8'];

	}

	// recalculate
	$recomputeBuy = computeBuyer($gl_cash_buyer, $buyer_qty,$seller_bid_price);
	$recomputeBuy_resultOnly =  computeBuyer_resultOnly($gl_cash_buyer,$buyer_qty, $seller_bid_price);

	$recomputedSell = computeSeller($gl_cash_seller, $seller_qty, $seller_bid_price);
	$recomputedSell_resultOnly =  computeSeller_resultOnly($gl_cash_seller, $seller_qty, $seller_bid_price);

	console_log_multiple($recomputeBuy, $recomputedSell);
	// update game lobby
	if(updateGameLobby($gl_uid_buyer, $recomputeBuy)){
		if(updateGameLobby($gl_uid_seller, $recomputedSell)){
			console_log('Game Lobby finish');

		    // update portfolio
		    // buyer
			if(updateGamePortfolioBuyer($buyerID, $seller_tick,$seller_qty,$seller_bid_price, $recomputeBuy_resultOnly)){
				if(updateGamePortfolioSeller($sellerID, $seller_tick,$seller_qty,$seller_bid_price, $recomputedSell_resultOnly)){
					console_log('Game Port finish');

		            //final
				    // update game queue to confirm
					/**
					 *  updateGameQueue(main,main history,matched with);
					 */
					if(updateGameQueue($buyerID,$buyer_historyID, $seller_historyID)){
						if(updateGameQueue( $sellerID,$seller_historyID,$buyer_historyID)){
							console_log('finished');
						}//game queue
					}//game queue
		        }//game port
		    }//game port
		}//game lobby
	}//game lobby
}//end of process


function computeSeller($gl_cash_seller,$seller_qty,$seller_bid_price){
	$bid_price = floatval($seller_bid_price);

	$gross = $seller_qty * $bid_price;
	$commission =  0.0025 * $gross;
	$vat =  0.12 * $commission;
	$sccp = $gross * 0.0001;
	$transactionFee = 0.00005 * $gross;
	$salesTax = $gross * 0.005;

	$result = $gross - $commission - $vat - $sccp - $transactionFee - $salesTax ;

	$total = $gl_cash_seller + $result;
	console_log($gl_cash_seller."-".$result."=".$total);
	return $total;
}
function computeSeller_resultOnly($gl_cash_seller,$seller_qty,$seller_bid_price){
	$bid_price = floatval($seller_bid_price);

	$gross = $seller_qty * $bid_price;
	$commission =  0.0025 * $gross;
	$vat =  0.12 * $commission;
	$sccp = $gross * 0.0001;
	$transactionFee = 0.00005 * $gross;
	$salesTax = $gross * 0.005;

	$result = $gross - $commission - $vat - $sccp - $transactionFee - $salesTax ;

	return $result;
}

function computeBuyer($gl_cash_buyer,$buyer_qty, $seller_bid_price){

	$bid_price = floatval($seller_bid_price);
	$gross = $buyer_qty * $bid_price;
	$commission = 0.0025 * $gross;
	$vat = 0.12  * $commission;
	$sccp =  $gross * 0.0001;
	$transactionFee =  0.00005 * $gross;

	$result =  $gross + $commission + $vat + $sccp + $transactionFee;

	$total = $gl_cash_buyer - $result;
	console_log($gl_cash_buyer."-".$result."=".$total);
	return $total;
}
function computeBuyer_resultOnly($gl_cash_buyer,$buyer_qty, $seller_bid_price){
	$bid_price = floatval($seller_bid_price);
	$gross = $buyer_qty * $bid_price;
	$commission = 0.0025 * $gross;
	$vat = 0.12  * $commission;
	$sccp =  $gross * 0.0001;
	$transactionFee =  0.00005 * $gross;

	$result =  $gross + $commission + $vat + $sccp + $transactionFee;
	return $result;
}

function updateGameLobby($gl_uid, $recompute){
	$link = mysqli_connect("localhost", "root", "", "capstone");

	$query_update = "UPDATE game_lobby SET gl_cash = '$recompute' , gl_buying_power = '$recompute' WHERE user_id = '$gl_uid'";
	console_log($query_update);
	$ret = mysqli_query($link , $query_update);

	return $ret;
}
function updateGamePortfolioBuyer($gp_uid, $tick,$qty, $bid_price, $recompute){
	$link = mysqli_connect("localhost", "root", "", "capstone");
	$query_check_port = "SELECT * FROM game_portfolio WHERE user_id = '$gp_uid' AND gp_owned_symbol = '$tick' ";
	$ret = mysqli_query($link , $query_check_port);

	console_log($query_check_port);
	console_log($ret);
	if($ret){
		$row = mysqli_fetch_assoc($ret);
		$gp_owned_qty = $row['gp_owned_qty'];
		$gp_stock_bought_last = $row['gp_stock_bought_last'];
	}

	if($ret->num_rows == 0){
		//insert if not exist
		$query_insert = "INSERT INTO game_portfolio ( user_id, gp_owned_symbol, gp_owned_qty, gp_stock_bought_last, gp_stock_total_cost) VALUES ('$gp_uid','$tick','$qty','$bid_price', '$recompute')";
		$result = mysqli_query($link, $query_insert);
		console_log($query_insert);
		console_log($result);

	}else if($ret->num_rows > 0 ){

		$totalQty = $gp_owned_qty + $qty;

		$query_update = "UPDATE game_portfolio SET gp_owned_qty = '$totalQty', gp_stock_bought_last ='$bid_price', gp_stock_total_cost = '$recompute' WHERE user_id = '$gp_uid' AND gp_owned_symbol = '$tick' ";

		$result = mysqli_query($link, $query_update);
		console_log($query_update);
		console_log($result);
	}else{
		$return = false;
	}

	return $result;
}
function updateGamePortfolioSeller($gp_uid, $tick,$qty, $bid_price, $recompute){
	$link = mysqli_connect("localhost", "root", "", "capstone");
	$query_check_port = "SELECT * FROM game_portfolio WHERE user_id = '$gp_uid' AND gp_owned_symbol = '$tick' ";
	$ret = mysqli_query($link , $query_check_port);

	console_log($query_check_port);
	console_log($ret);
	if($ret){
		$row = mysqli_fetch_assoc($ret);
		$gp_owned_qty = $row['gp_owned_qty'];
		$gp_stock_bought_last = $row['gp_stock_bought_last'];
	}

	if($ret->num_rows == 0){
		//insert if not exist
		$query_insert = "INSERT INTO game_portfolio ( user_id, gp_owned_symbol, gp_owned_qty, gp_stock_bought_last, gp_stock_total_cost) VALUES ('$gp_uid','$tick','$qty','$bid_price', '$recompute')";
		$result = mysqli_query($link, $query_insert);
		console_log($query_insert);
		console_log($result);

	}else if($ret->num_rows > 0 ){

		$totalQty = $gp_owned_qty - $qty;

		$query_update = "UPDATE game_portfolio SET gp_owned_qty = '$totalQty', gp_stock_bought_last ='$bid_price', gp_stock_total_cost = '$recompute' WHERE user_id = '$gp_uid' AND gp_owned_symbol = '$tick' ";

		$result = mysqli_query($link, $query_update);
		console_log($query_update);
		console_log($result);
	}else{
		$return = false;
	}

	return $result;
}

function updateGameQueue($main,$main_history, $matched_with_historyID){
	$link = mysqli_connect("localhost", "root", "", "capstone");
	$date = date("Y-m-d H:i:sa");

	$query_update = "UPDATE game_queue_stocks SET gq_status = 'CONFIRMED', match_with_historyID	 ='$matched_with_historyID',gq_date_confirmed ='$date' WHERE user_id = '$main' AND history_id= '$main_history'";

	$result = mysqli_query($link, $query_update);
	console_log($query_update);
	console_log($result);
	return $result;
}
