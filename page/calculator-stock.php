<?php
$page = 'calculator';
require 'includes/header.php'
?>
<div class="container mt-4">
	<div class="row justify-content-center">

			<h1 class="display-3">TRADING CALCULATOR </h1>

	</div>
</div>
<div class="container mt-5">
	<div class="row justify-content-center pb-5">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
			<div class="table-responsive">
				<!--  column buy -->
				<table class="table" style="border-style:none; border-color:white;">
					<thead>
						<tr>
							<th colspan="3" class="text-center bg-green"><label class="custom color-white">BUY</label></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="text-center bg-grey"><label class="custom">STOCK</label></td>
							<td colspan="2" class="text-center"><input class="custom p-2" type="text" name="order_tick" id="order_tick" onkeyup="onCopyStock()"  onkeydown="upperCaseF(this)" style="text-align:right;"  required /></td>
						</tr>
						<tr>
							<td class="text-center bg-grey"><label class="custom">QTY</label></td>
							<td colspan="2" class="text-center"><input class="custom p-2" type="text" id="order_qty" name="order_qty" onkeyup="onCopyQty()" onkeypress="return isNumberKey(event)"  placeholder="0" style="text-align:right;"required /></td>
						</tr>
						<tr>
							<td class="text-center bg-grey"><label class="custom">PRICE</label></td>
							<td colspan="2" class="text-center"><input class="custom p-2" type="text" id="order_price"name="order_price" onkeyup="computeBuy()" onkeypress="return isNumberKey(event)" placeholder="0"  style="text-align:right;" required /></td>
						</tr>
						<tr>
							<td class="text-center bg-grey"><label class="custom">BUY GROSS</label></td>
							<td colspan="2" class="text-center"><input class="custom p-2" type="text" id="order_buyGross" name="order_buyGross"  border="none" readonly="readonly" placeholder="0"  style="text-align:right; border-style:none; background-color:#f5f5f5; height:26px"/></td>
						</tr>
						<tr>
							<td class="text-center bg-grey"><label class="custom">BUY COMM</label></td>
							<td colspan="2" class="text-center"><input class="custom p-2" type="text" id="order_buyComm" name="order_buyComm"  border="none" readonly="readonly" placeholder="0"  style="text-align:right; border-style:none; background-color:#f5f5f5; height:26px"/></td>
						</tr>
						<tr>
							<td class="text-center bg-grey"><label class="custom">VAT</label></td>
							<td colspan="2" class="text-center"><input class="custom p-2" type="text" id="order_vat" name="order_vat"  border="none" readonly="readonly" placeholder="0"  style="text-align:right; border-style:none; background-color:#f5f5f5; height:26px"/></td>
						</tr>
						<tr>
							<td class="text-center bg-grey"><label class="custom">SCCP</label></td>
							<td colspan="2" class="text-center"><input class="custom p-2" type="text" id="order_sccp" name="order_sccp"  border="none" readonly="readonly" placeholder="0"  style="text-align:right; border-style:none; background-color:#f5f5f5; height:26px"/></td>
						</tr>
						<tr>
							<td class="text-center bg-grey"><label class="custom">TRANSACTION FEE</label></td>
							<td colspan="2" class="text-center"><input class="custom p-2" type="text" id="order_transaction" name="order_transaction"  border="none" readonly="readonly" placeholder="0"  style="text-align:right; border-style:none; background-color:#f5f5f5; height:26px"/></td>
						</tr>
						<tr>
							<td class="text-center bg-grey"><label class="custom">&nbsp</label></td>
							<td colspan="2" class="text-center">&nbsp</td>
						</tr>

						<tr>
							<td class="text-center bg-grey"><label class="custom">TOTAL CHARGE</label></td>
							<td colspan="2" class="text-center"><input class="custom p-2" type="text" id="order_total" name="order_total"  border="none" readonly="readonly" placeholder="0"  style="text-align:right; border-style:none; background-color:#f5f5f5; height:26px"/></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div><!-- end of column buy -->



		<!-- column sell -->
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th colspan="3" class="text-center bg-red"><label class="custom color-white">SELL</label></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="text-center bg-grey"><label class="custom">STOCK</label></td>
							<td colspan="2" class="text-center"><input class="custom p-2" type="text" name="sell_tick" id="sell_tick" readonly ="true"
								onkeyup="onCopyStock()" style="text-align:right; border-style:none; background-color:#f5f5f5; height:26px" /></td>
							</tr>
							<tr>
								<td class="text-center bg-grey"><label class="custom">QTY</label></td>
								<td colspan="2" class="text-center"><input class="custom p-2" type="text" id="sell_qty" name="sell_qty" readonly ="true"
									onkeyup="onCopyQty()" onkeypress="return isNumberKey(event)"  placeholder="0" style="text-align:right; border-style:none; background-color:#f5f5f5; height:26px" /></td>
								</tr>
								<tr>
									<td class="text-center bg-grey"><label class="custom">PRICE</label></td>
									<td colspan="2" class="text-center"><input class="custom p-2" type="text" id="sell_price"name="order_price" onkeyup="computeSell()" onkeypress="return isNumberKey(event)" placeholder="0"  style="text-align:right;" required /></td>
								</tr>
								<tr>
									<td class="text-center bg-grey"><label class="custom">BUY GROSS</label></td>
									<td colspan="2" class="text-center"><input class="custom p-2" type="text" id="sell_buyGross" name="sell_buyGross"  border="none" readonly="readonly" placeholder="0"  style="text-align:right; border-style:none; background-color:#f5f5f5; height:26px"/></td>
								</tr>
								<tr>
									<td class="text-center bg-grey"><label class="custom">BUY COMM</label></td>
									<td colspan="2" class="text-center"><input class="custom p-2" type="text" id="sell_buyComm" name="sell_buyComm"  border="none" readonly="readonly" placeholder="0"  style="text-align:right; border-style:none; background-color:#f5f5f5; height:26px"/></td>
								</tr>
								<tr>
									<td class="text-center bg-grey"><label class="custom">VAT</label></td>
									<td colspan="2" class="text-center"><input class="custom p-2" type="text" id="sell_vat" name="sell_vat"  border="none" readonly="readonly" placeholder="0"  style="text-align:right; border-style:none; background-color:#f5f5f5; height:26px"/></td>
								</tr>
								<tr>
									<td class="text-center bg-grey"><label class="custom">SCCP</label></td>
									<td colspan="2" class="text-center"><input class="custom p-2" type="text" id="sell_sccp" name="sell_sccp"  border="none" readonly="readonly" placeholder="0"  style="text-align:right; border-style:none; background-color:#f5f5f5; height:26px"/></td>
								</tr>
								<tr>
									<td class="text-center bg-grey"><label class="custom">TRANSACTION FEE</label></td>
									<td colspan="2" class="text-center"><input class="custom p-2" type="text" id="sell_transaction" name="sell_transaction"  border="none" readonly="readonly" placeholder="0"  style="text-align:right; border-style:none; background-color:#f5f5f5; height:26px"/></td>
								</tr>
								<tr>
									<td class="text-center bg-grey"><label class="custom">SALES TAX</label></td>
									<td colspan="2" class="text-center"><input class="custom p-2" id="sales_tax" name="sales_tax" type="text" readonly="readonly" value="0"  style="text-align:right; border-style:none; background-color:#f5f5f5;height:26px;" /></td>
								</tr>

								<tr>
									<td class="text-center bg-grey"><label class="custom">TOTAL</label></td>
									<td colspan="2" class="text-center"><input class="custom p-2" type="text" id="sell_total" name="sell_total"  border="none" readonly="readonly" placeholder="0"  style="text-align:right; border-style:none; background-color:#f5f5f5; height:26px"/></td>
								</tr>


							</tbody>
						</table>
					</div>
				</div><!-- end of column sel -->



				<?php
				require 'includes/footer.php'
				?>