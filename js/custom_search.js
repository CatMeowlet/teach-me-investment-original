		$(document).ready(function(){
			$('#searchStockSymbol').typeahead({
				source: function(query, result){
					$.ajax({
						url:"http://localhost/capstone/page/includes/search.php",
						method: "POST",
						data: {query:query},
						dataType: "json",
						success: function(data){
							result($.map(data,function(item){
								return item;
							}));
						}
					})
				}
			});
		});