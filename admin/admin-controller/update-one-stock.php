<?php declare(strict_types=1);

	include_once '../../includes/console_log.php';
	include_once '../../includes/stock-list.php'; //get $stock array;
	include_once '../../includes/simple_html_dom.php';
	require 'funct_update_stock.php';	// this is where the function


	if(isset($_POST['btn_update_one'])){

		$stockSymbol = $_POST['StockSymbolOption'];
			//return array(stock name, stock week low, stock week high)
		$array1 = getStockData1($stockSymbol);
			//return the rest data
		$array2 = getStockData2($stockSymbol);

			//update
		$data = updateAllStock($array1,$array2,$stockSymbol);

		console_log($data);

		if($data){
			header('Location: http://localhost/capstone/admin/page/stocks.php?status=success');
			exit;
		}else{
			header('Location: http://localhost/capstone/admin/page/stocks.php?status=failed');
			exit;
		}

	}
	?>