<?php
/*	$url = "http://localhost/capstone/page/login.php";

 	header( "refresh:5; url=$url" );
 	echo "redirecting";
 	*/
 	?>
 	<!DOCTYPE html>
 	<html>
 	<head>
 		<title></title>
 		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">


 	</head>
 	<body>
 		<table id="dtBasicExample" class="table table-striped table-bordered table-sm"  style=width="100%">
 			<thead>
 				<tr>
 					<th class="th-sm">Name

 					</th>
 					<th class="th-sm">Position

 					</th>
 					<th class="th-sm">Office

 					</th>
 					<th class="th-sm">Age

 					</th>
 					<th class="th-sm">Start date

 					</th>
 					<th class="th-sm">Salary

 					</th>
 				</tr>
 			</thead>
 			<tbody>
 				<tr>
 					<td>Tiger Nixon</td>
 					<td>System Architect</td>
 					<td>Edinburgh</td>
 					<td>61</td>
 					<td>2011/04/25</td>
 					<td>$320,800</td>
 				</tr>
 				<tr>
 					<td>Garrett Winters</td>
 					<td>Accountant</td>
 					<td>Tokyo</td>
 					<td>63</td>
 					<td>2011/07/25</td>
 					<td>$170,750</td>
 				</tr>
 				<tr>
 					<td>Ashton Cox</td>
 					<td>Junior Technical Author</td>
 					<td>San Francisco</td>
 					<td>66</td>
 					<td>2009/01/12</td>
 					<td>$86,000</td>
 				</tr>
 				<tr>
 					<td>Cedric Kelly</td>
 					<td>Senior Javascript Developer</td>
 					<td>Edinburgh</td>
 					<td>22</td>
 					<td>2012/03/29</td>
 					<td>$433,060</td>
 				</tr>
 				<tr>
 					<td>Airi Satou</td>
 					<td>Accountant</td>
 					<td>Tokyo</td>
 					<td>33</td>
 					<td>2008/11/28</td>
 					<td>$162,700</td>
 				</tr>
 				<tr>
 					<td>Brielle Williamson</td>
 					<td>Integration Specialist</td>
 					<td>New York</td>
 					<td>61</td>
 					<td>2012/12/02</td>
 					<td>$372,000</td>
 				</tr>
 				<tr>
 					<td>Herrod Chandler</td>
 					<td>Sales Assistant</td>
 					<td>San Francisco</td>
 					<td>59</td>
 					<td>2012/08/06</td>
 					<td>$137,500</td>
 				</tr>
 				<tr>
 					<td>Rhona Davidson</td>
 					<td>Integration Specialist</td>
 					<td>Tokyo</td>
 					<td>55</td>
 					<td>2010/10/14</td>
 					<td>$327,900</td>
 				</tr>

 			</tbody>
 		</table>
 		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
 		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
 		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

 		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
 		<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
 		<script >
 			$(document).ready(function () {
 				$('#dtBasicExample').DataTable();
 			});
 		</script>
 	</body>
 	</html>

