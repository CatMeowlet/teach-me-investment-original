<?php
$page = "company";
require 'includes/isGuest-header.php';
include '../includes/nbbc.php';
include_once '../includes/console_log.php';
date_default_timezone_set("Asia/Manila");
/*
include_once '../includes/chart/class/pData.class.php';
include_once '../includes/chart/class/pDraw.class.php';
include_once '../includes/chart/class/pImage.class.php';
include_once '../includes/chart/class/pStock.class.php';

*/


//check if there is a user log
if (!isset($_SESSION['userType_session'])) {
	header('location: http://localhost/capstone/page/login.php');
}
//check company symbol

if (isset($_GET['company_symbol'])) {
	$bbcode = new bbcode();

	$tick = $_GET['company_symbol'];
	$companyQuery = 'SELECT * FROM company WHERE securitySymbol = ?';

	$stmt = $link->prepare($companyQuery);
	$stmt->bind_param("s", $tick);
	$stmt->execute();
	$stmt->bind_result($companyID, $tick, $companyName, $companyDescription, $companySector, $companySubSector, $companyIncorpDate, $companyLogo);
	$stmt->fetch();

	if ($companyDescription == null) {
		$companyDescription = 'Nothing to show yet...';
	}
	if ($companySector == null) {
		$companySector = 'Nothing to show yet...';
	}
	if ($companySubSector  == null) {
		$companySubSector = 'Nothing to show yet...';
	}
	$stmt->close();
}
if (isset($_GET['company_symbol'])) {
	$stocksQuery = 'SELECT * FROM stocks WHERE securitySymbol = ' . "'" . $tick . "'" . ' ORDER BY stockUpdateDate DESC';
	$result2 = mysqli_query($link, $stocksQuery);
	console_log($stocksQuery);

	//get latest
	if ($result2) {
		$row = mysqli_fetch_assoc($result2);
		$latestPrice = $row['latestPrice'];
		$previousClose = $row['previousClose'];
		$openPrice =  $row['openPrice'];
		$lastPrice = $row['lastPrice'];
		$highPrice = $row['highPrice'];
		$lowPrice = $row['lowPrice'];
		$weekHigh = $row['weekHigh'];
		$weekLow = $row['weekLow'];
		$date = $row['stockUpdateDate'];
	}
	while ($row  = mysqli_fetch_assoc($result2)) {
		$dateCreate = date_create($row['stockUpdateDate']);
		if ($dateCreate != null) {
			$formated_date = date_format($dateCreate, 'Y-d-m');
			$dateMili = strtotime($formated_date) * 1000;

			console_log($formated_date);
			$previousClose = str_replace(",","",$row['previousClose']);
			$openPrice = str_replace(",","",$row['openPrice']);
			console_log($dateMili);
			$lastPrice = str_replace(",","",$row['lastPrice']);
			$highPrice = str_replace(",","",$row['highPrice']);
			$lowPrice = str_replace(",","",$row['lowPrice']);
			$dataPoints[] = array(
				"x" => $dateMili,
				"y" => array(
					floatval($openPrice), floatval($previousClose),floatval($lowPrice) ,floatval($highPrice)
				)
			);
		}
	}

	console_log($dataPoints);
}
?>
<script>
	window.onload = function() {

		var chart = new CanvasJS.Chart("chartContainer", {
			title: {
				text: "Company Chart Data"
			},
			subtitles: [{
				text: "Currency in PHP"
			}],
			axisX: {
				valueFormatString: "DD MMM",
				labelAngle: -50
			},
			axisY: {
				includeZero: false,
				suffix: " ₱"
			},
			data: [{
				type: "candlestick",
				xValueType: "dateTime",
				yValueFormatString: "#,##0.0 ₱",
				xValueFormatString: "DD MMM",
				dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
			}]
		});
		chart.render();
	}
</script>


<div class="container mt-5">
	<div class="card">
		<!--Card image-->
		<div class="view p-5">
			<img src="http://localhost/capstone<?= $companyLogo ?>" class="card-img-top img-fluid z-depth-2 p-5" alt="photo">
			<a href="#">
				<div class="mask rgba-white-slight"></div>
			</a>
		</div>
		<div class="card-body p-5">
			<div class="row justify-content-center">
				<h1 class="display-3"><strong><?= $companyName ?></strong></h1>
			</div>
			<div class="row justify-content-start">
				<blockquote class="blockquote bq-primary m-4">
					<p class="bq-title">Company Information:</p>
					<p><?php
						//nl2br($companyDescription)
						echo $bbcode->Parse($companyDescription);
						?></p>
				</blockquote>

				<blockquote class="blockquote bq-primary m-4">
					<p class="bq-title">Company Description:</p>
					<dl class="row p-3	">
						<dt class="col-sm-3">Incorporate Date</dt>
						<dd class="col-sm-9"><?= $bbcode->Parse($companyIncorpDate); ?></dd>

						<dt class="col-sm-3">Sector :</dt>
						<dd class="col-sm-9"><?= $bbcode->Parse($companySector); ?></dd>

						<dt class="col-sm-3">Sub-Sector :</dt>
						<dd class="col-sm-9"><?= $bbcode->Parse($companySubSector); ?></dd>
					</dl>
				</blockquote>
			</div>
			<div class="row justify-content-start p-5">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th colspan="4" class="text-center bg-green"><label class="custom color-white">Company Data</label></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="1" class="text-center bg-grey"><label class="custom">Last Traded Price:</label></td>
								<td colspan="1" class="text-center "><label class="custom"><?= $lastPrice ?></label></td>
								<td colspan="1" class="text-center bg-grey"><label class="custom">High Price:</label></td>
								<td colspan="1" class="text-center "><label class="custom"><?= $highPrice ?></label></td>
							</tr>
							<tr>
								<td colspan="1" class="text-center bg-grey"><label class="custom">Open Price:</label></td>
								<td colspan="1" class="text-center "><label class="custom"><?= $openPrice ?></label></td>
								<td colspan="1" class="text-center bg-grey"><label class="custom">Low Price:</label></td>
								<td colspan="1" class="text-center "><label class="custom"><?= $lowPrice ?></label></td>
							</tr>
							<tr>
								<td colspan="1" class="text-center bg-grey"><label class="custom">Previous Close:</label></td>
								<td colspan="1" class="text-center "><label class="custom"><?= $previousClose ?></label></td>
								<td colspan="1" class="text-center bg-grey"><label class="custom">52 week HIGH - LOW</label></td>
								<td colspan="1" class="text-center "><label class="custom"><?= $weekHigh . ' - ' . $weekLow ?></label></td>
							</tr>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="4" class="text-right"><?= 'As of: ' . $date ?></td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>


			<div class="row justify-content-center mt-5 p-5">
				<!--
					CHART HERE 
				-->
				<div id="chartContainer" style="height: 370px; width: 100%;"></div>
			</div>
		</div>
	</div>
</div>
<?php
require 'includes/footer.php';
?>