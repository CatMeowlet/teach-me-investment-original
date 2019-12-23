<?php
	//CONNECT DB - link
$link = mysqli_connect("localhost","root","","capstone");

	//QUERY
$query = "SELECT id,title,content
FROM lessons ";

$stmt = $link->prepare($query);	
$stmt->execute();
//$result = $stmt->fetchAll();
//grab a result set
$resultSet = $stmt->get_result();

//pull all results as an associative array
//result type will be index by text instead of index number
$result = $resultSet->fetch_all(MYSQLI_ASSOC);
?>