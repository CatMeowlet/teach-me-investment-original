<?php
	function checkConnectionState($url){
    $connection = @fsockopen($url, 80);
    if($connection){
        return true;
    }else
        return false;
	}//end of function
?>