<script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>

<!--<script>
	$(document).ready(function(){
		$("#search").keyup(function(){
			var txt = $("#search").val();
			$.post("component/searchQuery.inc.php", {"searchText": txt}, function(result){
				// $("span").html(result);
				 // var x = result[0]->getElement("title");
				$("span").html();
			});
		});
	});
</script>-->

<div class="col-md-12">
	<div class="form-group label-floating">
		<label class="control-label">Search bar</label>
		<input id="search" type="text" class="form-control" onkeyup="myFunction()">
	</div>
</div>
<!--<div>
	<p>Suggestions: <span></span></p>
</div>-->