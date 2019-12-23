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

<div class="container-fluid">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <h1 class="h1-responsive">UPDATE ONLY ONE</h1>
        </div>
        <div class="row justify-content-center">
            <form method="post" action="../admin-controller/update-one-stock.php">
                <div class="form-row">
                    <div class="form-group col-ml-6">
                        <label for="StockSymbol">Stock :</label>
                    </div>
                    <div class="form-group col-ml-6">
                        <select id="StockSymbol" name="StockSymbolOption" class="form-control">
                            <?php
                            //foreach
                            foreach($stock as $element) { //start of foreach
                                ?>
                            <!-- INSIDE OF FOREACH -->
                            <option value="<?= $element ?>" title="<?= $element ?>">
                                <?= $element ?>
                            </option>
                            <?php
                            }//end of foreach
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block" name="btn_update_one"> UPDATE</button>
                </div> <!-- form-group// -->
            </form>
        </div>
        <div class="row justify-content-center">
            <div class="col-ml-6">
                <?php
                if( $status === 'success'){
                    echo '<div class="alert alert-success" role="alert">
                    Update Success!</div>';
                }else if( $status === 'failed'){
                 echo '<div class="alert alert-danger" role="alert">
                 Update Failed!</div>';
             }
             ?>
                <div class="col-ml-6">
                </div>
            </div>
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <h1 class="h1-responsive">UPDATE ALL</h1>
                </div>
                <div class="row justify-content-center mt-5">
                    <div class="col-md-4">
                        <blockquote class="blockquote bq-warning">
                            <p class="bq-title">Warning notification</p>
                            <p>Don't click or do anything that may interrupt the update process, to avoid
                                any missing data or duplication of data.
                            </p>
                        </blockquote>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-2">
                        <button type="button" id="button1" class="btn btn-primary btn-block">UPDATE ALL</button>
                    </div>
                </div>
                <div class="row justify-content-center mt-3">
                    <h3>Progress:</h3>
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
        <script>
            $("#button1").click(function() {
                document.getElementById('loadarea').src = '../admin-controller/update-all-stock.php';
            });

        </script>

        <!--
<div class="container mt-5">
    <div class="col-md-10">
    </div>
    <div class="col-md-4 text-right">
        <div class="btn-group-vertical">
            <button type="sumbit" formaction="../admin-controller/update-one-stock.php" class="btn btn-primary btn-lg mt-2" name="btn_update_one">Update</button>
            <button type="button" id="button1" class="btn btn-primary btn-lg mt-2">Update All</button>
        </div>
    </div>
    <div class="row justify-content-center">
        <h1>Update All Progress:</h1>
    </div>
    <div class="row justify-content-center">
        <br>
        <div id="information"></div>
    </div>
</div>
</div>
<iframe id="loadarea" style="display:none;"></iframe><br />
<script>
    $("#button1").click(function() {
        document.getElementById('loadarea').src = '../admin-controller/update-all-stock.php';
    });
    $("#button2").click(function() {
        document.getElementById('loadarea').src = '';
    });
</script>

-->
 <?php
include 'includes/admin_footer.php';
?>
