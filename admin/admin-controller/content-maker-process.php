<?php
	//DEFINE
$title = $_POST['input_title'];
$content = $_POST['textarea_content'];
$mode = $_POST['input_mode'];

	//CONNECT DB - link
$link = mysqli_connect("localhost","root","","capstone");

	//SQL QUERY
switch ($mode) {
	case 'BEGINNER':
	$query =
	"INSERT INTO lessons_b (title, content, mode)
	VALUES (?,?,?)";
	break;
	case 'INTERMEDIATE':
	$query =
	"INSERT INTO lessons_i (title, content, mode)
	VALUES (?,?,?)";
	break;
	case 'ADVANCE':
	$query =
	"INSERT INTO lessons_a (title, content, mode)
	VALUES (?,?,?)";
	break;
}

	//PROTECT MYSQL INJECTION
$stmt = $link->prepare($query);
	//BIND PARAM
$stmt->bind_param("sss", $title, $content, $mode);
	//EXECUTE PREPARED STATEMENT
$stmt->execute();
    //CLOSE STATEMENT AND CONNECTION
$stmt->close();
    //CLOSE DB CONNECTION
mysqli_close($link);


$url = "http://localhost/capstone/admin/page/index.php";
header( "refresh:2; url=$url" );
echo "confirm. redirecting to admin/page/content-maker.php";
?>