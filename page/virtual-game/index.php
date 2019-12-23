<?php
$page = "virtual";
include('../includes/isGuest-header.php');

if (isset($_GET['action'], $_GET['tick'])) {
	$action = $_GET['action'];
	$symbol = $_GET['tick'];
} else {
	$action = '';
	$symbol = '';
}


if (!isset($_SESSION['userType_session'])) {
	header('location: http://localhost/capstone/page/login.php');
}

//get admin starting
$query_admin = "SELECT game_stocks_starting_value FROM admin_settings";
$result_admin = mysqli_query($link, $query_admin);
if ($result_admin) {
	$row = mysqli_fetch_assoc($result_admin);
	$gl_cash = $row['game_stocks_starting_value'];
	$gl_buying_power = $row['game_stocks_starting_value'];
} else {
	$gl_cash = '20000';
	$gl_buying_power = '20000';
}
//GLOBAL
//first time joined
$u_id = $_SESSION['userID_session'];
$date = date("Y-m-d");
$gameMode = 'BLUECHIPS';
$gameName  = 'STOCK SIMULATOR';
$gameStatus = 'ACTIVE';
$currency = 'PHP';


$check_user_query = 'SELECT user_id FROM game_lobby WHERE user_id = ' . "'" . $u_id . "'";
$isExist_result =  mysqli_query($link, $check_user_query);

if ($isExist_result->num_rows == 0) {
	$join_user_query = 'INSERT INTO game_lobby (user_id, joined_in_date, joined_game_mode, joined_game_name,current_status,gl_currency,gl_cash,gl_buying_power) VALUES (?,?,?,?,?,?,?,?) ';

	$stmt = $link->prepare($join_user_query);
	$stmt->bind_param("ssssssss", $u_id, $date, $gameMode, $gameName, $gameStatus, $currency, $gl_cash, $gl_buying_power);
	$res = $stmt->execute();
	//	if user is not joined in game then display
	//	first time message
	$displayMessage = 'myModal';
} else {
	//	if user is joined in game then don't display
	//	first time message
	$displayMessage = '#';
}
/*
	//initialize game lobby profile
	$check_user_exist_query = 'SELECT joined_history_id FROM game_lobby WHERE user_id = '."'".$u_id."'";
	$result = mysqli_query($link, $check_user_exist_query);
	if($result){
		$row = mysqli_fetch_row($result);
		$joined_id = $row['0'];
	}

	$check_profile_exist_query ='SELECT gl_joined_id,user_id FROM game_lobby_profile WHERE user_id = '."'".$u_id."'".' AND gl_joined_id = ' ."'".$joined_id."'";
	$result2 = mysqli_query($link, $check_profile_exist_query);
	if($result2->num_rows == 0){
		$ini_query = 'INSERT INTO game_lobby_profile (gl_joined_id, user_id, gp_cash, gp_buying_power) VALUES (?,?,?,?) ';

		$stmtINI = $link->prepare($join_user_query);
		$stmtINI->bind_param("sssss", $joined_id, $u_id, $cash, $buyingPower);
		$res = $stmtINI->execute();
	}*/


$get_user_query = 'SELECT * FROM game_lobby WHERE user_id = ' . "'" . $u_id . "'";
$result = mysqli_query($link, $get_user_query);
if ($result) {
	$row = mysqli_fetch_row($result);
	$gl_cash = $row['7'];
	$gl_buying_power = $row['8'];
}

?>
<!-- Central Modal Medium Success -->
<div class="modal fade" id="<?= $displayMessage ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-notify modal-info modal-dialog-centered p-5" role="document">
		<!--Content-->
		<div class="modal-content">
			<!--Header-->
			<div class="modal-header p-5">
				<h1 class="display-4 m-4 text-white">Welcome to Virtual Game</h1>
				<button type="button" class="btn btn-elegant btn-rounded btn-lg" data-dismiss="modal" aria-label="Close">
					<i class="fas fa-times  fa-2x"></i></span></button>
			</div>

			<!--Body-->
			<div class="modal-body p-5">
				<blockquote class="blockquote bq-primary">
					<p class="bq-title"><strong>Introduction</strong></p>
					<p>Welcome to Virtual Game...
						First thing remember that all data shown here do not represent the real-time data in the stock market, the data shown here is continually changing depending on the user interaction but does not affect the real world price data.
					</p>
				</blockquote>
				<blockquote class="blockquote bq-warning">
					<p class="bq-title"><strong>Rules</strong></p>
					<ul class="list-unstyled">
						<ul>
							<li>Must be logged in before you can play.</li>
							<li>No altering of data or any kind.</li>
							<li>No foul word or any kind.</li>
						</ul>

					</ul>
					<p class="bq-title"><strong>FAQ's</strong></p>
					<ul class="list-unstyled">
						<li> <i class="fas fa-question-circle"></i> Is real Money Involve ?
							<ul class="fa-ul">
								<li><i class="fas fa-angle-right"></i> No. This is strictly a simulation.</li>
							</ul>
						</li>
						<li> <i class="fas fa-question-circle"></i> All action here is the same with the real-world stock market ?
							<ul class="fa-ul">
								<li><i class="fas fa-angle-right"></i> Yes. All action is mimicked in the real world action</li>
							</ul>
						</li>
						<li> <i class="fas fa-question-circle"></i> Is the data shown here is the same with real-world stock data ?
							<ul class="fa-ul">
								<li><i class="fas fa-angle-right"></i> No. The first data used is base on the real stock data but afterwards will depend on the user's interaction.</li>
							</ul>
						</li>
					</ul>
				</blockquote>
			</div>

			<!--Footer-->
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-elegant btn-rounded btn-lg" data-dismiss="modal" aria-label="Close">
					<span>Get Started&nbsp &nbsp<i class="fas fa-play"></i></span>
				</button>
			</div>
		</div>
		<!--/.Content-->
	</div>
</div>
<!-- Central Modal Medium Success-->




<!-- CONTENT -->

<div class="container-fluid min-100 custom p-5">
	<div class="container-fluid">
		<div class="row justify-content-center ">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
				<nav>
					<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active" id="nav-newOrder-tab" data-toggle="tab" href="#nav-newOrder" role="tab" aria-controls="nav-newOrder" aria-selected="true">New Order</a>
						<a class="nav-item nav-link" id="nav-viewOrder-tab" data-toggle="tab" href="#nav-viewOrder" role="tab" aria-controls="nav-viewOrder" aria-selected="false">View Order</a>
						<a class="nav-item nav-link" id="nav-viewPortfolio-tab" data-toggle="tab" href="#nav-viewPortfolio" role="tab" aria-controls="nav-viewPortfolio" aria-selected="false">View Portfolio</a>
						<a class="nav-item nav-link" id="nav-viewTrades-tab" data-toggle="tab" href="#nav-viewTrades" role="tab" aria-controls="nav-viewTrades" aria-selected="false">View Trades</a>
						<a class="nav-item nav-link" id="nav-viewHistory-tab" data-toggle="tab" href="#nav-viewHistory" role="tab" aria-controls="nav-viewHistory" aria-selected="false">View History</a>
					</div>
				</nav>
				<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-newOrder" role="tabpanel" aria-labelledby="nav-newOrder-tab">
						<div class="container-fluid">
							<div class="row justify-content-center">
								<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
									<div class="table-responsive">
										<form id="newOrderForm" onsubmit="return checkInput()" method="post" action="#">
											<table class="table">
												<thead>
													<tr>
														<th colspan="3" class="text-center bg-red"><label class="custom color-white">ENTER QUEUED ORDER</label></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="text-center bg-grey"><label class="custom">TRANSACTION</label></td>
														<td class="text-center"><label class="custom color-green"><input type="radio" onclick="checkAction()" value="BUY" name="transactionRadio" <?php if ($action == 1) {
																																																		echo 'checked="true"';
																																																	} ?> required /> BUY</label></td>
														<td class="text-center"><label class="custom color-red"><input type="radio" onclick="checkAction()" value="SELL" name="transactionRadio" <?php if ($action == 2) {
																																																		echo 'checked="true"';
																																																	} ?> /> SELL</label></td>
													</tr>
													<tr>
														<td class="text-center bg-grey"><label class="custom">STOCK</label></td>
														<td colspan="2" class="text-center"><input class="custom" type="text" onkeydown="upperCaseF(this)" name="order_tick" id="order_tick" style="text-align:center;" required <?php if (isset($symbol)) {
																																																										echo 'value="' . $symbol . '"';
																																																									} ?> /></td>

													</tr>
													<tr>
														<td class="text-center bg-grey"><label class="custom">QTY</label></td>
														<td colspan="2" class="text-center"><input class="custom" type="text" id="order_qty" name="order_qty" onkeypress="return isNumberKey(event)" onkeyup="computeValue()" style="text-align:center;" placeholder="0" required /></td>
													</tr>
													<tr>
														<td class="text-center bg-grey"><label class="custom">PRICE</label></td>
														<td colspan="2" class="text-center"><input class="custom" type="text" id="order_price" name="order_price" onkeyup="computeValue()" onkeypress="return isNumberKey(event)" style="text-align:center;" placeholder="0" required /></td>
													</tr>
													<tr>
														<td class="text-center bg-grey"><label class="custom">VALUE</label></td>
														<td colspan="2" class="text-center"><input class="custom p-2 color-green" type="text" id="order_value" name="order_value" border="none" readonly="readonly" placeholder="0" style="text-align:right; border-style:none; background-color:#f5f5f5; height:26px" /></td>
													</tr>
													<tr>
														<td class="text-center bg-grey"></td>
														<td colspan="2" class="text-center"><input class="btn btn-primary btn-lg btn-rounded" type="submit" name="submitOrder" /></td>
													</tr>
												</tbody>
											</table>
											<div class="row justify-content-center p-5">
												<?php
												if (isset($_GET['missingStock'])) {
													if ($_GET['missingStock']) {
														echo "<p class='note note-danger'><strong>Error notification:</strong> You don't have the neccessary symbol to sell. Please check your Portfolio.
																</p>";
													}
												}
												if (isset($_GET['insufficientQuantity'])) {
													if ($_GET['insufficientQuantity']) {
														echo "<p class='note note-danger'><strong>Error notification:</strong> You don't have enough stock quantity. Please check your Portfolio.
																</p>";
													}
												}
												if (isset($_GET['insufficientBalance'])) {
													if ($_GET['insufficientBalance']) {
														echo "<p class='note note-danger'><strong>Error notification:</strong> You don't have the enough balance to cover the total expected charge. Please check your order.
																</p>";
													}
												}
												if (isset($_GET['tradePlace'])) {
													if ($_GET['tradePlace'] == 'true') {
														echo "<p class='note note-success'><strong>Note success:</strong> You have successfully placed your order.  <strong> View Order Tab  </strong>for <strong>Buy </strong> and <strong> View Trade Tab  </strong> for  <strong>Sell </strong> </p>";
													} else if ($_GET['tradePlace'] == 'false') {
														echo "<p class='note note-danger'><strong>Error notification:</strong> There's an error while placing your order. Please check all input if it's correct.</p>";
													}
												}
												?>
											</div>
										</form>
										<br />
										<hr />
										<br />
										<table class="table">
											<thead>
												<tr>
													<th colspan="3" class="text-center bg-grey"><label class="custom">BALANCE</label></th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td colspan="2" class="text-center bg-grey"><label class="custom">CASH</label></td>
													<td class="text-center"><input class="custom p-1 color-green" type="text" id="cash" name="cash" border="none" readonly="readonly" placeholder="0" value="<?= number_format($gl_cash, 2) ?>" style="text-align:right; border-style:none; background-color:#f5f5f5; height:26px" /> PHP</td>
												</tr>
												<tr>
													<td colspan="2" class="text-center bg-grey"><label class="custom">BUYING POWER</label></td>
													<td class="text-center"><input class="custom p-1 color-green" type="text" id="buyingPower" name="buyingPower" border="none" readonly="readonly" placeholder="0" value="<?= number_format($gl_buying_power, 2) ?>" style="text-align:right; border-style:none; background-color:#f5f5f5; height:26px" /> PHP</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="tab-pane fade" id="nav-viewOrder" role="tabpanel" aria-labelledby="nav-viewOrder-tab">

						<div class="container-fluid">
							<div class="row justify-content-center p-5 ">
								<div class="table-responsive">
									<table class="table">
										<thead class="table table-striped table-dark">
											<tr>
												<th colspan="1" class="text-center ">ACTION</th>
												<th colspan="1" class="text-center ">SYMBOL</th>
												<th colspan="1" class="text-center ">PRICE</th>
												<th colspan="1" class="text-center ">QTY</th>
												<th colspan="1" class="text-center ">TOTAL</th>
												<th colspan="1" class="text-center ">STATUS</th>
												<th colspan="1" class="text-center ">DATE PLACED</th>
												<th colspan="1" class="text-center ">DATE PLACED TIME</th>
												<th colspan="1" class="text-center ">EDIT</th>
											</tr>
										</thead>
										<tbody>
											<?php
											include_once '../../controller/view_order-process.php';
											while ($row = $viewOrderResult->fetch_array(MYSQLI_ASSOC)) {
												$date = date_create($row["gq_date_placed"]);
												$formated_date = date_format($date, 'Y-m-d');
												$formated_time =  date_format($date, 'H:i:s A');
												echo '
														<tr>
														<td class="text-center" colspan = "1"><label class="custom color-green">' . $row["gq_action"] . '</label></td>
														<td class="text-center" colspan = "1"><label class="custom">' . $row["gq_stock_symbol"] . '</label></td>
														<td class="text-center" colspan = "1"><label class="custom">' .  number_format($row["gq_stock_bid_price"], 2) . '</label></td>
														<td class="text-center" colspan = "1"><label class="custom">' . $row["gq_stock_qty"] . '</label></td>
														<td class="text-center" colspan = "1"><label class="custom">' .  number_format($row["gq_expected_total"], 2) . '</label></td>
														<td class="text-center" colspan = "1"><label class="custom">' . $row["gq_status"] . '</label></td>
														<td class="text-center" colspan = "1"><label class="custom">' . $formated_date . '</label></td>
														<td class="text-center" colspan = "1"><label class="custom">' . $formated_time . '</label></td>
														<td class="text-center" colspan = "1"><input type="hidden" name="' . $row['history_id'] . '"></input><button type="button"  id="' . $row['history_id'] . '"name="submit_order_edit" onclick="redirectMe(this.id)">Remove</button></td>
														</tr>
														';
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div><!-- END OF VIEW ORDER -->

					<div class="tab-pane fade" id="nav-viewPortfolio" role="tabpanel" aria-labelledby="nav-viewPortfolio-tab">
						<div class="container-fluid">
							<div class="row justify-content-center p-5 ">
								<div class="table-responsive">
									<table class="table" width="100%">
										<thead class="table table-striped table-dark">
											<tr>
												<th colspan="2" class="text-center ">ACTION</th>
												<th colspan="1" class="text-center ">SYMBOL</th>
												<th colspan="1" class="text-center ">BOUGHT LAST</th>
												<th colspan="1" class="text-center ">QTY</th>
												<th colspan="1" class="text-center ">TOTAL VALUE</th>
											</tr>
										</thead>
										<tbody>
											<?php

											include_once '../../controller/view_portfolio-process.php';

											while ($row = $viewPortRes->fetch_array(MYSQLI_ASSOC)) {
												echo '
														<tr>
														<td colspan="2" class="text-center">
														<a href="http://localhost/capstone/page/virtual-game/index.php?action=1&tick=' . $row["gp_owned_symbol"] . '" class="btn btn-success btn-rounded btn-lg " role="button" aria-pressed="true" style="width:30%;"><label class="custom color-black">BUY</label></a>
														|

														<a href="http://localhost/capstone/page/virtual-game/index.php?action=2&tick=' . $row["gp_owned_symbol"] . '" class="btn btn-danger btn-rounded btn-lg " role="button" aria-pressed="true" style="width:30%;"><label class="custom color-black">SELL</label></a>
														</td>

														<td colspan="1" class="text-center" ><label class="custom">' . $row["gp_owned_symbol"] . '</label></td>
														<td colspan="1" class="text-center" ><label class="custom color-green">' .  number_format($row["gp_stock_bought_last"], 2) . '</label></td>
														<td colspan="1" class="text-center" ><label class="custom">' . $row["gp_owned_qty"] . '</label></td>
														<td colspan="1" class="text-center" ><label class="custom color-green">' . number_format($row["gp_stock_total_cost"], 2)  . '</label></td>
														</tr>
														';
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div><!-- END OF PORTFOLIO -->

					<div class="tab-pane fade" id="nav-viewTrades" role="tabpanel" aria-labelledby="nav-viewTrades-tab">
						<div class="container-fluid">
							<div class="row justify-content-center p-5 ">
								<div class="table-responsive">
									<table class="table">
										<thead class="table table-striped table-dark">
											<tr>
												<th colspan="1" class="text-center ">ACTION</th>
												<th colspan="1" class="text-center ">SYMBOL</th>
												<th colspan="1" class="text-center ">PRICE</th>
												<th colspan="1" class="text-center ">QTY</th>
												<th colspan="1" class="text-center ">STATUS</th>
												<th colspan="1" class="text-center ">DATE PLACED</th>
												<th colspan="1" class="text-center ">DATE PLACED TIME</th>
											</tr>
										</thead>
										<tbody>
											<?php

											include_once '../../controller/view_trade-process.php';

											while ($row = $viewTradeRes->fetch_array(MYSQLI_ASSOC)) {
												$date = date_create($row["gq_date_placed"]);
												$formated_date = date_format($date, 'Y-m-d');
												$formated_time =  date_format($date, 'H:i:s A');
												echo '
														<tr>
														<td class="text-center" colspan = "1"><label class="custom color-red">' . $row["gq_action"] . '</label></td>
														<td class="text-center" colspan = "1"><label class="custom">' . $row["gq_stock_symbol"] . '</label></td>
														<td class="text-center" colspan = "1"><label class="custom">' .  number_format($row["gq_stock_bid_price"], 2) . '</label></td>
														<td class="text-center" colspan = "1"><label class="custom">' . $row["gq_stock_qty"] . '</label></td>
														<td class="text-center" colspan = "1"><label class="custom">' . $row["gq_status"] . '</label></td>
														<td class="text-center" colspan = "1"><label class="custom">' . $formated_date . '</label></td>
														<td class="text-center" colspan = "1"><label class="custom">' . $formated_time . '</label></td>
														</tr>
														';
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div><!-- END OF VIEW TRADE -->

					<div class="tab-pane fade" id="nav-viewHistory" role="tabpanel" aria-labelledby="nav-viewHistory-tab">
						<div class="container-fluid">
							<div class="row justify-content-center p-5 ">
								<div class="table-responsive">
									<table class="table">
										<thead class="table table-striped table-dark">
											<tr>
												<th colspan="1" class="text-center ">ACTION</th>
												<th colspan="1" class="text-center ">SYMBOL</th>
												<th colspan="1" class="text-center ">PRICE</th>
												<th colspan="1" class="text-center ">QTY</th>
												<th colspan="1" class="text-center ">STATUS</th>
												<th colspan="1" class="text-center ">DATE PLACED</th>
												<th colspan="1" class="text-center ">DATE PLACED TIME</th>
												<th colspan="1" class="text-center ">DATE CONFIRMED</th>
												<th colspan="1" class="text-center ">TIME CONFIRMED </th>
											</tr>
										</thead>
										<tbody>
											<?php

											include_once '../../controller/view_history-process.php';

											while ($row = $viewHistoryRes->fetch_array(MYSQLI_ASSOC)) {
												$date = date_create($row["gq_date_placed"]);
												$date_confirm = date_create($row['gq_date_confirmed']);
												$formated_date = date_format($date, 'Y-m-d');
												$formated_time =  date_format($date, 'H:i:s A');
												$formated_date_confirmed = date_format($date_confirm, 'Y-m-d');
												$formated_time_confirmed =  date_format($date_confirm, 'H:i:s A');
												if ($row['gq_action'] == 'SELL') {
													$text = 'color-red';
												} else
													$text = 'color-green';

												echo '
														<tr>
														<td class="text-center" colspan = "1"><label class="custom ' . $text . '">' . $row["gq_action"] . '</label></td>
														<td class="text-center" colspan = "1"><label class="custom">' . $row["gq_stock_symbol"] . '</label></td>
														<td class="text-center" colspan = "1"><label class="custom">' . number_format($row["gq_stock_bid_price"], 2) . '</label></td>
														<td class="text-center" colspan = "1"><label class="custom">' . $row["gq_stock_qty"] . '</label></td>
														<td class="text-center" colspan = "1"><label class="custom">' . $row["gq_status"] . '</label></td>
														<td class="text-center" colspan = "1"><label class="custom">' . $formated_date . '</label></td>
														<td class="text-center" colspan = "1"><label class="custom">' . $formated_time . '</label></td>
														<td class="text-center" colspan = "1"><label class="custom">' . $formated_date_confirmed . '</label></td>
														<td class="text-center" colspan = "1"><label class="custom">' . $formated_time_confirmed . '</label></td>
														</tr>
														';
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div><!-- END OF VIEW HISTORY -->
				</div>
			</div>

		</div>
	</div>
</div>
<!-- END OF CONTENT -->
<?php
require '../includes/footer.php';
?>