<?php
if(isset($_POST['submit'])){
    $initial = $_POST['change_value'];

    $query = "UPDATE admin_settings SET game_stocks_starting_value = '$initial'";

    $link = mysqli_connect("localhost", "root", "", "capstone");

    $res = mysqli_query($link,$query);

    if($res){

		$url = "http://localhost/capstone/admin/page/game_stocks.php?status=success";
		header( "refresh:2; url=$url" );
    }else{
        $url = "http://localhost/capstone/admin/page/game_stocks.php?status=failed";
        header( "refresh:2; url=$url" );
    }
}
