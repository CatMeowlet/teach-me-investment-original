<?php
include '../includes/console_log.php';
if(isset($_POST['submitSearch'])){
	$tick = $_POST['searchStockSymbol'];
	console_log($tick);
	//redirect

	header('location: ../page/company.php?company_symbol='.$tick.'');
}
?>