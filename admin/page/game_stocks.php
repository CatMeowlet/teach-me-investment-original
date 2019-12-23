<?php
$page = 'stocks';
include 'includes/isAdmin-header.php';

$link = mysqli_connect("localhost", "root", "", "capstone");

$query = "SELECT game_stocks_starting_value FROM admin_settings";

$res = mysqli_query($link, $query);

while ($row = mysqli_fetch_assoc($res)) {
    $starting =  $row['game_stocks_starting_value'];
}
?>
<div class="container">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <form method="post" action="../admin-controller/change_starting_value-process.php">

                <div class="card card-body " style="width: 600px;">
                    <h2 class="h1-responsive font-weight-bold text-center my-5">Game Stock</h2>
                    <div class="row justify-content-center mt-5 p-5">
                        <div class="col">
                            <div class="form-group">
                                <label for="starting_value">Starting Value:</label>
                                <input type="text" readonly="true" class="form-control" id="starting_value" name="starting_value" value="<?= $starting ?>">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="change_value">Change Starting Value</label>
                                <input type="text" class="form-control" id="change_value" name="change_value">
                            </div>
                        </div>
                    </div> <!-- form-group end.// -->
                    <div class="row justify-content-center ">
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Change Starting Initial</button>
                        </div> <!-- form-group// -->
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
</div>
<?php
include 'includes/admin_footer.php';
?>