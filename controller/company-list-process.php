<?php
	//CONNECT DB - link
$link = mysqli_connect("localhost","root","","capstone");

	//QUERY
$query = "SELECT * FROM company ORDER BY company_id ASC";
$result = mysqli_query($link, $query);
?>