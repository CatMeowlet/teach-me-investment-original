<?php

function console_log( $data ){
	echo '<script>';
	echo 'console.log('. json_encode( $data ) .')';
	echo '</script>';
}

function console_log_multiple($data1, $data2){
	$data = 'Data: 1 = '.$data1.' Data: 2 = '.$data2;
	echo '<script>';
	echo 'console.log('. json_encode( $data ) .')';
	echo '</script>';
}


function console_log_multiple_custom($title1,$data1,$title2,$data2){
	$data = $title1.' = '.$data1.' | '.$title2.' = '.$data2;
	echo '<script>';
	echo 'console.log('. json_encode( $data ) .')';
	echo '</script>';
}
?>