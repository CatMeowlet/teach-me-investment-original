<?php
$page = 'stocks';
include 'includes/isAdmin-header.php';
require '../../includes/stock-list.php';
include_once '../../includes/console_log.php';

if(isset($_GET['status'])){
    $status = $_GET['status'];
}else{
    $status = "";
}

?>
<div class="container mt-5">
    <div class="row justify-content-around">
        <!-- LEFT CONTENT -->
        <div class="col-md-4">
            <div class="card card-body">
                <h2 class="h1-responsive font-weight-bold text-center my-5">Update All</h2>
                <p class="note note-warning"><strong>Note primary:</strong>
                    Don't click or do anything that may interrupt the update process, to avoid
                any missing data or duplication of data.</p>
                <div class="row justify-content-center mt-5">
                    <div class="col-md-8">
                        <button type="button" id="button1" class="btn btn-primary btn-block">UPDATE ALL</button>
                    </div>
                </div>
                <div class="row justify-content-center mt-4">
                  <h3 class="font-weight-bold mb-3"><strong>Progress:</strong></h3>
              </div>
              <div class="row justify-content-center">
                <br>
                <div id="information"></div>
            </div>
            <div class="row justify-content-center">
                <iframe id="loadarea" style="display:none;"></iframe><br />
            </div>
        </div>
    </div>
    <div class="col-md-8 ">
        <div class="card card-body">
            <p class="note note-warning"><strong>Note primary:</strong>
                Don't click or do anything that may interrupt the update process, to avoid
            any missing data or duplication of data.</p>
        </div>
    </div>
</div>
</div>

<script>
    $("#button1").click(function() {
        document.getElementById('loadarea').src = '../admin-controller/update-all-stock.php';
    });
</script>
<?php
include 'includes/admin_footer.php';
?>
