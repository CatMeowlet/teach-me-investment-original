function checkAction() {

	/*var radio = document.getElementsByName('transactionRadio');
	var actionform = document.getElementById("newOrderForm");

	if(radio['0'].checked){
		var action = 'buy';
		actionform.action = '../../controller/game_buy-process.php';
	}else if(radio['1'].checked){
		var action = 'sell';
		actionform.action = '../../controller/game_sell-process.php';
	}*/


	computeValue();

}

function checkInput() {
	var stockList = ["AC", "AEV", "AGI", "ALI", "ABG", "AP", "BDO", "BPI", "DMC", "FGEN", "GLO", "GTCAP", "ICT", "JFC", "JGS", "LTG", "MBT", "MEG", "MER",
		"MPI", "PCOR", "PGOLD", "RLC", "RRHI", "SCC", "SECB", "SM", "SMC", "SMPH", "TEL", "URC"
	];

	var tick = document.getElementById('order_tick').value;
	var radio = document.getElementsByName('transactionRadio');
	var actionform = document.getElementById("newOrderForm");

	if (radio['0'].checked) {
		var action = 'B';
	} else if (radio['1'].checked) {
		var action = 'S';
	}

	if (stockList.includes(tick)) {
		var calcVal = computeValue();

		switch (action) {
			case 'B':
				return isLessThanBalance(calcVal);
				break;

			case 'S':
				actionform.action = '../../controller/game_sell-process.php';
				return true;
				break;
		}

	} else {
		return false;
	}
}

function computeValue() {
	var radio = document.getElementsByName('transactionRadio');
	var qty = parseFloat(document.getElementById('order_qty').value);
	var price = parseFloat(document.getElementById('order_price').value);
	var orderValue = document.getElementById('order_value');

	if (radio['0'].checked) {
		var action = 'B';
	} else if (radio['1'].checked) {
		var action = 'S';
	}

	switch (action) {
		case 'B':
			var gross = qty * price;
			var comm = 0.0025 * gross;
			var vat = 0.12 * comm;
			var sccp = gross * 0.0001;
			var transactionFee = 0.00005 * gross;

			var n = gross + comm + vat + sccp + transactionFee;
			var total = n.toFixed(2);

			orderValue.value = total;

			return parseFloat(total);

			break;

		case 'S':
			var gross = qty * price;
			var comm = 0.0025 * gross;
			var vat = 0.12 * comm;
			var sccp = gross * 0.0001;
			var transactionFee = 0.00005 * gross;
			var salesTax = gross * 0.005;

			var n = gross - comm - vat - sccp - transactionFee - salesTax;
			var total = n.toFixed(2);

			orderValue.value = total;
			return parseFloat(total);
			break;
	}
}

function isLessThanBalance(calcVal) {
	var cash = document.getElementById('cash').value;
	var radio = document.getElementsByName('transactionRadio');
	var actionform = document.getElementById("newOrderForm");

	if (radio['0'].checked) {
		var action = 'B';
	} else if (radio['1'].checked) {
		var action = 'S';
	}
	if (calcVal > cash) {
		actionform.value = "#";
		return false;
	} else {
		switch (action) {
			case 'B':
				actionform.action = '../../controller/game_buy-process.php';
				return true;
				break;
		}
	}
}

function redirectMe(clicked_id) {
	var url = "http://localhost/capstone/controller/remove_order.php?history_id=";
	var value = url.concat(clicked_id);

	window.location = value;
}

/*
function checkStockExist(){
	var stockList = ["AC","AEV","AGI","ALI","ABG","AP","BDO","BPI","DMC","FGEN","GLO","GTCAP","ICT","JFC","JGS","LTG","MBT","MEG","MER",
	"MPI","PCOR","PGOLD","RLC","RRHI","SCC","SECB","SM","SMC","SMPH","TEL","URC"];

	var tick = document.getElementById('order_tick').value;
	var isExist = document.getElementById('stockExist').innerHTML;
	if(stockList.includes(tick)){
		isExist = "Valid";
	}else{
		isExist = "Invalid";
	}


}*/