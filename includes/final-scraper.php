<?php

    include 'simple_html_dom.php';

    //GLOBAL
    $SYMBOL ="";
    $URL = "https://quotes.wsj.com/PH/".$SYMBOL."/historical-prices";
    $URL2 = "https://www.investagrams.com/Stock/".$SYMBOL;


    /*
		GATHER NAME AND WEEK LOW - HIGH PRICES
		src = https://quotes.wsj.com/PH/$symbol/historical-prices;
    */
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://quotes.wsj.com/PH/AAA/historical-prices');
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($curl);
    curl_close($curl);

    //init
    $domResults = new simple_html_dom();
    $domResults->load($result);

    //COMPANY NAME
    foreach($domResults->find('span.companyName') as $e){
	   $companyName = $e->plaintext;
	  // echo "company name: <br>".$companyName."<br>";
    }
    //WEEK LOW - HIGH
     foreach($domResults->find('div.cr_data_field') as $e){
         foreach($e->find('span.data_data') as $a){
             $weekLowHigh = $a->plaintext;

         }
         echo "<br>".$weekLowHigh;
    }

  //  echo "Week Low - high: <br>".$weekLowHigh."<br>";


    /*
    	NEW CURL

		GATHER LASTEST OPEN PRICE,
				LASTEST LAST PRICE,
				LASTEST LOW,
				LASTEST HIGH,UPDATED DATE

		src = https://www.investagrams.com/Stock/TEL;
    */
	$curl2 = curl_init();
    curl_setopt($curl2, CURLOPT_URL, 'https://www.investagrams.com/Stock/AAA');
    curl_setopt($curl2, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
    $result2 = curl_exec($curl2);
    curl_close($curl2);

    //init
    $domResults2 = new simple_html_dom();
    $domResults2->load($result2);

     //LATEST PRICE
    foreach($domResults2->find('span#lblStockLatestLastPrice') as $e){
	   $latestPrice = $e->plaintext;
	   //echo "latest Price: <br>".$latestPrice."<br>";
    }
    //LATEST OPEN
    foreach($domResults2->find('span#lblStockLatestOpen') as $e){
	   $latestOpen = $e->plaintext;
	  // echo "Latest Open : <br>".$latestOpen."<br>";
    }
    //LATEST LAST
    foreach($domResults2->find('span#lblStockLatestLastPrice') as $e){
	   $latestLast = $e->plaintext;
	   //echo "Latest Last Price : <br>".$latestLast."<br>";
    }
    //PREVIOUS CLOSE
    foreach($domResults2->find('span#lblStockLatestClose') as $e){
       $previousClose = $e->plaintext;
      // echo "Previous Close : <br>".$previousClose."<br>";
    }
    //LATEST LOW
    foreach($domResults2->find('span#lblStockLatestLow') as $e){
	   $latestLow = $e->plaintext;
	  //echo "Latest Low : <br>".$latestLow."<br>";
    }
    //LATEST HIGH
    foreach($domResults2->find('span#lblStockLatestHigh') as $e){
	   $latestHigh = $e->plaintext;
	   //echo "Latest High : <br>".$latestHigh."<br>";
    }
    //UPDATED
    foreach($domResults2->find('span#lblPriceLastUpdateDate') as $e){
        $latestUpdate = $e->plaintext;
	  // echo "Last Update Date : <br>".$latestUpdate."<br>";
    }


    if($weekLowHigh == null || $weekLowHigh == ""){
        $weekLowHigh = '0.00 - 0.00';
    }
    //re organize
    // str_replace("target","into this","source string");
    //remove comma
    $stripped_comma = str_replace(",","",$weekLowHigh);
    echo "<br>".$stripped_comma;
    //reapply comma
 	//$reapply_comma = str_replace("-",",",$stripped_comma);
 	//remove space
 	$remove_space = str_replace(' ', '', $stripped_comma);

 	$temp = explode("-", $remove_space);
 	$weekLow = $temp[0];
 	$weekHigh = $temp[1];
    // echo "<pre>";
    // print_r($temp);

    $months = array("January"=>"01",
                    "February"=>"02",
                    'March'=>"03",
                    "April"=>"04",
                    "May"=>"05",
                    "June"=>"06",
                    "July"=>"07",
                    "August"=>"08",
                    "September"=>"09",
                    "October"=>"10",
                    "November"=>"11",
                    "December"=>"12");


    //sort date
    echo $latestUpdate."<br>";
    $sort = str_replace(",","+",$latestUpdate);
    $sort = str_replace(" ","+",$sort);
    $temp1 = explode("+", $sort);   //explode +
    $result = array_filter($temp1,'strlen'); //filter blank array
    $result = array_values($result);    //reindex
    //get numb for month
    foreach($months as $months => $value){
        if($months === $result[0]){
            //change string date to number date
            $result[0] = $value;
        }
    }
    //SORT THE NEW DATE
    $newSortedDate = $result[0]."-".$result[1]."-".$result[2]." ".$result[3]." ".$result[4];
/*    echo $newSortedDate;
    echo "<pre>";
    print_r($result);
*/


    //redefine
    $stocks_name = $companyName;
    $stocks_Price = $latestPrice;
    $stocks_openPrice = $latestOpen;
    $stock_lastPrice = $latestLast;
    $stock_previousClose = $previousClose;
    $stock_highPrice = $latestHigh;
    $stock_lowPrice	= $latestLow;
    $stock_weekLow = $weekLow;
    $stock_weekHigh = $weekHigh;
    $stock_updateDate = $newSortedDate;


    echo $stocks_name.",".
        $stocks_Price.",".
          $stocks_openPrice.",".
           $stock_lastPrice.",".
           $stock_previousClose.",".
            $stock_highPrice.",".
            $stock_lowPrice.",".
            $stock_weekLow.",".
            $stock_weekHigh.",".$stock_updateDate;
?>