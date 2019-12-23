<?php
$page = 'News';
		//contain condition for checking user type
require 'includes/isAdmin-header.php';
?>

<div class="container mt-5 ">

	<form id="formaction" name="formaction" action="../admin-controller/news_add-process.php" enctype="multipart/form-data" method="POST">
		<div class="row justify-content-center">
			<div class="col">
				<!-- Medium input -->
				<div class="md-form form-lg ">
					<i class="fas fa-quote-left prefix mr-2"></i>
					<label for="input_title">TITLE:</label>
					<br>
					<input type="text" id="input_title" name="input_title" class="form-control-plaintext form-control-lg mt-2" placeholder="Write something here...">
				</div>
				<!--line-->
			</div>
		</div>

		<hr>
		<!--line-->
		<div class="form-group shadow-textarea">
			<i class="fas fa-pencil-alt prefix mr-2"></i>
			<label for="textarea_content">Content</label>
			<textarea class="form-control z-depth-1" id="textarea_content" name="textarea_content"  rows="30" placeholder="Write something here..."></textarea>
		</div>
		<div class="col form-group mb-5">
			<div class="form-group">
				<i class="fas fa-image prefix mr-2"></i>
				<label for="image">Upload Image:</label>
				<br/>
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				<input type="file" name="image" id="image"/>
			</div>
		</div>

		<button type="button" onClick="submitform()" id="btnSubmit" class="btn btn-outline-success btn-rounded waves-effect btn-lg">Submit</button>
		<button type="reset" id="btnClear" class="btn btn-outline-danger btn-rounded waves-effect btn-lg">Clear</button>
	</form>

</div>
<script type="text/javascript">

	function submitform() {
		document.forms["formaction"].submit();
	}
</script>
</div>
<?php
include 'includes/admin_footer.php';
?>
