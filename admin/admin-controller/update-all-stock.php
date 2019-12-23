<?php
	// to get unlimited php script execution time
ini_set('max_execution_time', 0);

	include_once '../../includes/stock-list.php'; //get $stock array;
	//include_once '../../includes/stock-list-back.php'; //get $stock array;
	include_once '../../includes/console_log.php';
	include_once '../../includes/simple_html_dom.php';
	require 'funct_update_stock.php';	// this is where the function


	$count = 0;
	$total = sizeof($stock);
	console_log($total);
	console_log('starting = '.$count);

	foreach($stock as $stockSymbol){

		//return array(stock name, stock week low, stock week high)
		$array1 = getStockData1($stockSymbol);
		//return the rest data
		$array2 = getStockData2($stockSymbol);

		//check first date before update
		//	if res = null then not exist
		//	res = 1 then exist and skip
		$res = checkDateStock($stockSymbol,$array2);
		if(isset($res)){
			$isExist = 'true';
			$count++;
		}else
			$isExist = 'false';

		console_log('Duplicate = '.$isExist);

		if($res == null){
			//update
			$data = updateStock($array1,$array2,$stockSymbol);
			if($data){
				$count++;
			}
		}else{
			$data = 3;
		}
		console_log('isUpdate? = '.$data);
		/*
			DATA STATE
			0 or NULL === failed/skip
			1		  === success
			3		  === skip

		*/
		console_log_multiple_custom('current = '.$stockSymbol,$count,'state',$data);

		$percent = intval($count/$total * 100)."%";

		echo '<script>
		parent.document.getElementById("information").innerHTML="<div style=\"text-align:center; font-weight:bold\">'.$percent.' ('.$count.'/'.$total.') '.'stock is being update.</div>";</script>';

		//output buffer
		ob_flush();
		flush();
	}//end of foreach
	echo '<script>parent.document.getElementById("information").innerHTML="<div style=\"text-align:center; font-weight:bold\">Process completed</div>"</script>';

	console_log('end = '.$count.' resetting to 0');
	//reset
	$count = 0;

	?>