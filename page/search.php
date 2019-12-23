<?php
$page = "home";

require 'includes/isGuest-header.php';

//check if there is a user log
if (!isset($_SESSION['userType_session'])) {
    header('location: http://localhost/capstone/page/login.php');
}
?>

<!-- Page Content -->
<div class="container">



    <div class="row" style="margin-top: 4%">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <!-- Blog Post -->
            <?php
            if ($_POST['searchtitle'] != '') {
                $st = $_SESSION['searchtitle'] = $_POST['searchtitle'];
            }
            $st;


            if (isset($_GET['pageno'])) {
                $pageno = $_GET['pageno'];
            } else {
                $pageno = 1;
            }
            $no_of_records_per_page = 8;
            $offset = ($pageno - 1) * $no_of_records_per_page;

            $con = mysqli_connect("localhost", "root", "", "capstone");

            $total_pages_sql = "SELECT COUNT(*) FROM post";
            $result = mysqli_query($con, $total_pages_sql);
            $total_rows = mysqli_fetch_array($result)[0];
            $total_pages = ceil($total_rows / $no_of_records_per_page);


            $query = mysqli_query($con, "select * from post where post_title like '%$st%' order by post.post_id desc  LIMIT $offset, $no_of_records_per_page");
            $rowcount = mysqli_num_rows($query);
            if ($rowcount == 0) {
                echo "No record found";
            } else {
                while ($row = mysqli_fetch_array($query)) {
                    ?>

                    <div class="card mb-4">
                        <img class="card-img-top" src="../<?php echo htmlentities($row['post_image']); ?>" alt="<?php echo htmlentities($row['posttitle']); ?>">
                        <div class="card-body">
                            <h2 class="card-title"><?php echo htmlentities($row['post_title']); ?></h2>
                            <a href="news-details.php?nid=<?php echo htmlentities($row['post_id']) ?>" class="btn btn-primary">Read More &rarr;</a>
                        </div>
                        <div class="card-footer text-muted">
                            Posted on <?php echo htmlentities($row['post_date']); ?>

                        </div>
                    </div>
                <?php } ?>




                <!-- Pagination -->


                <ul class="pagination justify-content-center mb-4">
                    <li class="page-item"><a href="?pageno=1" class="page-link">First</a></li>
                    <li class="<?php if ($pageno <= 1) {
                                        echo 'disabled';
                                    } ?> page-item">
                        <a href="<?php if ($pageno <= 1) {
                                            echo '#';
                                        } else {
                                            echo "?pageno=" . ($pageno - 1);
                                        } ?>" class="page-link">Prev</a>
                    </li>
                    <li class="<?php if ($pageno >= $total_pages) {
                                        echo 'disabled';
                                    } ?> page-item">
                        <a href="<?php if ($pageno >= $total_pages) {
                                            echo '#';
                                        } else {
                                            echo "?pageno=" . ($pageno + 1);
                                        } ?> " class="page-link">Next</a>
                    </li>
                    <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
                </ul>
            <?php } ?>
        </div>

        <!-- Sidebar Widgets Column -->
        <?php include('includes/sidebar.php'); ?>
    </div>
    <!-- /.row -->

</div>
<?php
require 'includes/footer.php';
?>