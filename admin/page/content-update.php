<?php
$page = 'content-maker';
    //contain condition for checking user type
require 'includes/isAdmin-header.php';


if(isset($_GET['id'], $_GET['mode'])){
    $mode = $_GET['mode'];
    $id = $_GET['id'];

    switch ($mode) {
        case 'BEGINNER':
        $query = "SELECT * FROM lessons_b WHERE id = '$id' ";
        break;
        case 'INTERMEDIATE':
        $query = "SELECT * FROM lessons_i WHERE id = '$id' ";
        break;
        case 'ADVANCE':
        $query = "SELECT * FROM lessons_a WHERE id = '$id' ";
        break;
    }

    $link = mysqli_connect("localhost","root","","capstone");

    $res = mysqli_query($link,$query);
    while($row = mysqli_fetch_assoc($res)){
        $title = $row['title'];
        $content = $row['content'];
        $mode = $row['mode'];
    }
}
?>
<!-- START CONTENT  -->

<div class="container mt-4">

    <form id="formaction" name="formaction" action="../admin-controller/content-update-process.php" method="POST">
        <div class="row justify-content-center">
            <div class="col">
                <!-- Medium input -->
                <div class="md-form form-lg ">
                    <i class="fas fa-quote-left prefix mr-2"></i>
                    <label for="input_title">TITLE:</label>
                    <br>
                    <input type="text" id="input_title" name="input_title" class="form-control-plaintext form-control-lg mt-2" value="<?=$title?>" placeholder="Write something here...">
                    <input type="hidden" id="input_id" name="input_id" value="<?=$id?>">
                </div>
                <!--line-->
            </div>
            <div class="col">
                <!-- Medium input -->
                <div class="md-form form-lg ">
                    <i class="fas fa-quote-left prefix mr-2"></i>
                    <label for="input_title">MODE:</label>
                    <br>
                    <input type="text" id="input_mode" name="input_mode" class="form-control-plaintext form-control-lg mt-2" value="<?=$mode?>" readonly placeholder="Write something here...">
                </div>
            </div>

            <!--line-->
        </div>


    <hr>
    <!--line-->
    <div class="form-group shadow-textarea">
        <i class="fas fa-pencil-alt prefix mr-2"></i>
        <label for="textarea_content">Content</label>
        <textarea class="form-control z-depth-1" id="textarea_content" name="textarea_content"  rows="30" placeholder="Write something here..."><?=$content?></textarea>
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
