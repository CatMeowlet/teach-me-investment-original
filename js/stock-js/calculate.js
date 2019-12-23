       function isNumberKey(evt) {
       	var charCode = (evt.which) ? evt.which : evt.keyCode;
       	if (charCode != 46 && charCode > 31 &&
       		(charCode < 48 || charCode > 57))
       		return false;

       	return true;
       }

       function upperCaseF(a) {
       	setTimeout(function () {
       		a.value = a.value.toUpperCase();
       	}, 1);
       }

       function onCopyQty() {
       	var order_qty = document.getElementById('order_qty').value;

       	var sell_qty = document.getElementById('sell_qty');

       	sell_qty.value = order_qty;
       }

       function onCopyStock() {
       	var order_tick = document.getElementById('order_tick').value;

       	var sell_tick = document.getElementById('sell_tick');

       	sell_tick.value = order_tick;
       }

       function computeBuy() {
       	var qty = document.getElementById('order_qty').value;
       	var price = document.getElementById('order_price').value;

       	var buyGross = document.getElementById('order_buyGross');
       	var buyComm = document.getElementById('order_buyComm');
       	var vat = document.getElementById('order_vat');
       	var sccp = document.getElementById('order_sccp');
       	var transactionFee = document.getElementById('order_transaction');
       	var totalCharge = document.getElementById('order_total');

       	buyGross.value = parseFloat(price * qty, 10).toFixed(2);
       	buyComm.value = parseFloat(0.0025 * buyGross.value, 10).toFixed(2);
       	vat.value = parseFloat(0.12 * buyComm.value, 10).toFixed(2);
       	sccp.value = parseFloat(buyGross.value * 0.0001, 10).toFixed(2);
       	transactionFee.value = parseFloat(0.00005 * buyGross.value).toFixed(2);

       	var result = parseFloat(buyGross.value, 10) + parseFloat(buyComm.value, 10) +
       		parseFloat(vat.value, 10) + parseFloat(sccp.value, 10) + parseFloat(transactionFee.value, 10);

       	var r = result.toFixed(2);
       	totalCharge.value = r;

       }

       function computeSell() {
       	var qty = parseFloat(document.getElementById('sell_qty').value);
       	var price = parseFloat(document.getElementById('sell_price').value);

       	var buyGross = document.getElementById('sell_buyGross');
       	var buyComm = document.getElementById('sell_buyComm');
       	var vat = document.getElementById('sell_vat');
       	var sccp = document.getElementById('sell_sccp');
       	var transactionFee = document.getElementById('sell_transaction');
       	var salesTax = document.getElementById('sales_tax');
       	var totalCharge = document.getElementById('sell_total');

       	buyGross.value = parseFloat(price * qty, 10).toFixed(2);
       	buyComm.value = parseFloat(0.0025 * buyGross.value, 10).toFixed(2);
       	vat.value = parseFloat(0.12 * buyComm.value, 10).toFixed(2);
       	sccp.value = parseFloat(buyGross.value * 0.0001, 10).toFixed(2);
       	transactionFee.value = parseFloat(0.00005 * buyGross.value).toFixed(2);
       	salesTax.value = parseFloat(buyGross.value * 0.005).toFixed(2);
       	var result = parseFloat(buyGross.value, 10) - parseFloat(buyComm.value, 10) -
       		parseFloat(vat.value, 10) - parseFloat(sccp.value, 10) - parseFloat(transactionFee.value, 10) - parseFloat(salesTax.value, 10);

       	var r = result.toFixed(2);
       	totalCharge.value = r;

       }