<?php
$page = 'content-maker';
    //contain condition for checking user type
require 'includes/isAdmin-header.php';

?>
<!-- START CONTENT  -->

<div class="container mt-4">

    <form id="formaction" name="formaction" action="../admin-controller/content-maker-process.php" method="POST">
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
            <div class="col">
                <!-- Medium input -->
                <div class="form-group">
                  <label for="input_mode">Mode:</label>
                  <select class="form-control" id="input_mode" name="input_mode">
                    <option value="BEGINNER">BEGINNER</option>
                    <option value="INTERMEDIATE">INTERMEDIATE</option>
                    <option value="ADVANCE">ADVANCE</option>
                </select>
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

    <button type="button" onClick="submitform()" id="btnSubmit" class="btn btn-outline-success btn-rounded waves-effect btn-lg">Submit</button>
    <button type="reset" id="btnClear" class="btn btn-outline-danger btn-rounded waves-effect btn-lg">Clear</button>
</form>
</div>

<script type="text/javascript">

    function submitform() {
        document.forms["formaction"].submit();
    }
</script>
<!--END OF CONTENT-->
<?php
include 'includes/admin_footer.php';
?>
