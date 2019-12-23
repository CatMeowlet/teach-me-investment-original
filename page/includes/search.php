<?php
	//CONNECT DB - link
	$connect = mysqli_connect("localhost","root","","capstone");
	$request = mysqli_real_escape_string($connect,$_POST["query"]);
	$query = "SELECT securitySymbol FROM company WHERE securitySymbol LIKE '%".$request."%' ";

	$result = mysqli_query($connect,$query);
	$data = array();
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$data[] = $row["securitySymbol"];
		}
		echo json_encode($data);
	}

?>