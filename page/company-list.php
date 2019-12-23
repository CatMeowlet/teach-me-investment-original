<?php
$page = "companyList";
require 'includes/isGuest-header.php';
include '../controller/company-list-process.php';
include_once '../includes/console_log.php';
?>
<br/><br/>
<div class="container">
	<div class="row justify-content-center">
		<div class="table-responsive">
			<table class="table table-striped table-bordered" id="company_data" width="100%">
				<thead>
					<tr>
						<th class="text-right">#</th>
						<th class="text-center">Company</th>
						<th class="text-center">Company Symbol</th>
					</tr>
				</thead>
				<tbody>
					<?php
					while($row = mysqli_fetch_array($result)){
						echo '
						<tr>
						<td class="text-right">'.$row["company_id"].'</td>
						<td class="text-center"><a href="company.php?company_symbol='.$row["securitySymbol"].'">'.$row["companyName"].'</td>
						<td class="text-center"><a href="company.php?company_symbol='.$row["securitySymbol"].'">'.$row["securitySymbol"].'</td>
						</tr>
						';
					}//end of while
					?>
				</tbody>
				<tfoot>
					<tr>
						<th class="text-right">	</th>
						<th class="text-center">Company</th>
						<th class="text-center">Company Symbol</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
<?php
require 'includes/footer.php';
?>
<script>
	$(document).ready(function(){
		$('#company_data').DataTable({
			lengthMenu:[[15,25,50,100,-1], [15,25,50,100,"All"]]
		});
	});
</script>