<?php
include '../../includes/console_log.php';
	//DEFINE
$title = $_POST['input_title'];
$content = $_POST['textarea_content'];
$mode = $_POST['input_mode'];
$id = $_POST['input_id'];
	//CONNECT DB - link
$link = mysqli_connect("localhost","root","","capstone");

	//SQL QUERY
switch ($mode) {
	case 'BEGINNER':
	$query =
	"UPDATE lessons_b SET title='$title', content='$content' WHERE id='$id'  AND mode = '$mode' ";
	break;
	case 'INTERMEDIATE':
	$query =
	"UPDATE lessons_i SET title='$title', content='$content' WHERE id='$id'  AND  mode = '$mode' ";
	break;
	case 'ADVANCE':
	$query =
	"UPDATE lessons_a SET title='$title', content='$content' WHERE id='$id'  AND  mode = '$mode' ";
	break;
}

$res = mysqli_query($link , $query);

console_log($query);
if($res){
	header("location: ../page/content-edit.php?status=successful");
}else
	header("location: ../page/content-edit.php?status=fail");

?>