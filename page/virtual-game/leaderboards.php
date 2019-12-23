<?php
$page = "leaderboards";
include('../includes/isGuest-header.php');
include('../../controller/get-leaderboards.php');

?>
<div class="container">
	<div class="container mt-5">
		<div class="row justify-content-center">
			<table class="table table-dark">
				<thead>
					<tr>
						<th class="text-center" colspan="10"><label class="custom ">LEADERBOARDS</label></th>
					</tr>
					<tr>
						<th class="text-center">User #</th>
						<th class="text-center">Market Value</th>
						<th class="text-center">Rank</th>
					</tr>
				</thead>
				<tbody>
					<?php
					//rank start to 0 
					$rank = 0;
					while ($row = mysqli_fetch_assoc($res)) {
						//rank will begin at 1
						$rank++;
						if ($rank == 1) {
							echo '<tr>
							<td class="text-center"><label class="custom-large color-gold">' . $row['user_id'] . '</label></td>
							<td class="text-center"><label class="custom-large color-gold">' . $row['market_value'] . '</label></td>
							<td class="text-center"><label class="custom-large color-gold">' . $rank . '</label></td>
							</tr>';
						} else if ($rank == 2) {
							echo '<tr>
							<td class="text-center"><label class="custom-medium color-silver">' . $row['user_id'] . '</label></td>
							<td class="text-center"><label class="custom-medium color-silver">' . $row['market_value'] . '</label></td>
							<td class="text-center"><label class="custom-medium color-silver">' . $rank . '</label></td>
							</tr>';
						} else if ($rank == 3) {
							echo '<tr>
							<td class="text-center"><label class="custom-small color-bronze">' . $row['user_id'] . '</label></td>
							<td class="text-center"><label class="custom-small color-bronze">' . $row['market_value'] . '</label></td>
							<td class="text-center"><label class="custom-small color-bronze">' . $rank . '</label></td>
							</tr>';
						} else {
							echo '<tr>
							<td class="text-center"><h5>' . $row['user_id'] . '</h5></td>
							<td class="text-center"><h5>' . $row['market_value'] . '</h5></td>
							<td class="text-center"><h5>' . $rank . '</h5></td>
							</tr>';
						}
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