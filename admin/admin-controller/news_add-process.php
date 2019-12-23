<?php
date_default_timezone_set("Asia/Manila");
if(!empty($_FILES["image"]["name"])){
	$title = $_POST['input_title'];
	$content = $_POST['textarea_content'];
	$date = date("Y-m-d H:i:sa");
	$filePath = "/img/post-image/".$_FILES["image"]["name"];

	//CONNECT DB - link
	$link = mysqli_connect("localhost","root","","capstone");

	//SQL QUERY
	$query = "INSERT INTO post (post_title, post_content, post_date,post_image) VALUES(?,?,?,?)";
	//PROTECT MYSQL INJECTION
	$stmt = $link->prepare($query);
	//BIND PARAM
	$stmt->bind_param("ssss", $title, $content, $date,$filePath);
	//EXECUTE PREPARED STATEMENT
	$res = $stmt->execute();
    //CLOSE STATEMENT AND CONNECTION
	$stmt->close();
    //CLOSE DB CONNECTION
	mysqli_close($link);

	if($res){
		move_uploaded_file($_FILES["image"]["tmp_name"], "../../img/post-image/" . $_FILES["image"]["name"]);

		$url = "http://localhost/capstone/admin/page/news-add.php?status=success";
		header( "refresh:2; url=$url" );
	}else
	$url = "http://localhost/capstone/admin/page/news-add.php?status=failed";
	header( "refresh:2; url=$url" );
}

?>