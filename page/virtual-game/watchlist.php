<?php
$page = "watchlist";
include('../includes/isGuest-header.php');

?>
<div class="container">
	<div class="container mt-5">
		<div class="row justify-content-center">
			<form method="post" action="../../controller/add-watchlist.php">

				<div class="card card-body " style="width: 600px;">
					<h2 class="h1-responsive font-weight-bold text-center my-5">Watch List</h2>
					<?php
					if (isset($_GET['is_exist'])) {
						echo " <p class='note note-danger'><strong>Alert:</strong>
						Already existed in your watchlist. please check again.</p>";
					}
					if (isset($_GET['remove'])) {
						if ($_GET['remove'] == 'success') {
							echo " <p class='note note-success'><strong>Alert:</strong>
							Remove was successful.</p>";
						} else
							echo " <p class='note note-warning'><strong>Alert:</strong>
						Remove was not successful.</p>";
					}
					?>
					<div class="row justify-content-center mt-5">
						<div class="form-group">

							<label>Stock List</label>
							<select id="inputState" name="game_stocks" class="form-control" style="width: 100px;">
								<?php
								$link = mysqli_connect("localhost", "root", "", "capstone");
								$query = "SELECT * FROM game_stocks";
								$res = mysqli_query($link, $query);

								while ($row = mysqli_fetch_assoc($res)) {
									?>
									<option value="<?= htmlentities($row['securitySymbol']); ?>" title="<?= htmlspecialchars($row['securitySymbol']) ?>"><?= htmlspecialchars($row['securitySymbol']) ?></option>
								<?php

								} //end of for each

								?>
							</select>
						</div>
					</div> <!-- form-group end.// -->
					<div class="row justify-content-center ">
						<div class="form-group">
							<button type="submit" name="submitAdd" class="btn btn-primary btn-block"> Add to Watchlist</button>
						</div> <!-- form-group// -->
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="row justify-content-center mt-5">
		<table class="table table-dark">
			<thead>
				<tr>
					<th class="text-center" colspan="10"><label class="custom ">Stock Watch List</label></th>
				</tr>
				<tr>
					<th class="text-center">#</th>
					<th class="text-center">Company</th>
					<th class="text-center">Latest</th>
					<th class="text-center">Previous Close</th>
					<th class="text-center">Open</th>
					<th class="text-center">Last</th>
					<th class="text-center">High - Low</th>
					<th class="text-center">52 week High - Low</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$id = $_SESSION['userID_session'];
				$query_selected = "SELECT * FROM game_stocks LEFT JOIN game_watchlist ON game_stocks.securitySymbol = game_watchlist.gw_symbol WHERE game_watchlist.user_id = '$id' ORDER BY game_stocks.stockUpdateDate DESC";
				$res_selected = mysqli_query($link, $query_selected);

				while ($row = mysqli_fetch_assoc($res_selected)) {
					echo '<tr>
								<td class="text-center">' . $row['history_id'] . '</td>
								<td class="text-center">' . $row['companyName'] . '</td>
								<td class="text-center">' . $row['latestPrice'] . '</td>
								<td class="text-center">' . $row['previousClose'] . '</td>
								<td class="text-center">' . $row['openPrice'] . '</td>
								<td class="text-center">' . $row['latestPrice'] . '</td>
								<td class="text-center">' . $row['highPrice'] . ' - ' . $row['lowPrice'] . '</td>
								<td class="text-center">' . $row['weekHigh'] . ' - ' . $row['weekLow'] . '</td>
								<td class="text-center"><a class="btn  btn-light btn-lg active" aria-pressed="true" href="../../controller/remove-watchlist.php?id=' . $id . '&tick=' . $row['securitySymbol'] . '"><i class="fas fa-times"></i></a></td>
								</tr>';
				}
				?>
			</tbody>
		</table>
	</div>
</div>
</div>
<?php
require '../includes/footer.php';
?>