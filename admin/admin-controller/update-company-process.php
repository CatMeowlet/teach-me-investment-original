<?php
include_once '../../includes/console_log.php';

//CONNECT DB - link
$link = mysqli_connect("localhost","root","","capstone");


if(isset($_POST['submitCompany']) && !empty($_FILES["image"]["name"]) ){
	$symbol = $_POST['input_company'];
	$companySector = $_POST['input_sector'];
	$companySubSector = $_POST['input_subsector'];
	$companyDescription = $_POST['textarea_content'];
	$companyIncorporateDate = $_POST['input_incorp_date'];
	$filePath = "/img/company-logo/".$_FILES["image"]["name"];

	//SQL QUERY
	$query = "UPDATE company SET company_description = ?, company_sector = ?, company_subsector = ?, company_incorporate_date = ?, company_logo = ?  WHERE securitySymbol = ? ";

	//PROTECT MYSQL INJECTION
	$stmt = $link->prepare($query);
	//BIND PARAM
	$stmt->bind_param("ssssss", $companyDescription, $companySector, $companySubSector,$companyIncorporateDate, $filePath,$symbol);
	//EXECUTE PREPARED STATEMENT
	$res = $stmt->execute();

	if($res){
		move_uploaded_file($_FILES["image"]["tmp_name"], "../../img/company-logo/" . $_FILES["image"]["name"]);
		$url = 'http://localhost/capstone/admin/page/company.php?status=success';
		header("refresh:1 ; url=$url ");
	}else{
		$url = 'http://localhost/capstone/admin/page/company.php?status=failed';
		header("refresh:1 ; url=$url ");
	}
/*

	$imgContent = mysqli_real_escape_string ($link,file_get_contents($_FILES['image']['tmp_name']));

		//SQL QUERY
	$query = "UPDATE company SET company_description = ?, company_sector = ?, company_subsector = ?, company_incorporate_date = ?  WHERE securitySymbol = ? ";

	$image_query = "UPDATE company SET company_logo = "."'".$imgContent."'"."
	 where securitySymbol = "."'".$symbol."'";
		//PROTECT MYSQL INJECTION
	$stmt = $link->prepare($query);
		//BIND PARAM
	$stmt->bind_param("sssss", $companyDescription, $companySector, $companySubSector,$companyIncorporateDate, $symbol);
		//EXECUTE PREPARED STATEMENT
	$res = $stmt->execute();
	console_log($res);
	if($res){
		$res2 = mysqli_query($link,$image_query);
	}


	if($res2){
		$url = 'http://localhost/capstone/admin/page/company.php?status=success';
		//header("refresh:1; url=$url ");
	}else{
		$url = 'http://localhost/capstone/admin/page/company.php?status=failed';
		//header("refresh:1; url=$url ");
	}*/

}

?>