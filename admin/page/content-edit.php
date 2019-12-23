<?php
$page = 'content-maker';
    //contain condition for checking user type
require 'includes/isAdmin-header.php';

$query_b = "SELECT * FROM lessons_b";
$query_i = "SELECT * FROM lessons_i";
$query_a = "SELECT * FROM lessons_a";

$link = mysqli_connect("localhost","root","","capstone");

$res_b = mysqli_query($link,$query_b);
$res_i = mysqli_query($link,$query_i);
$res_a = mysqli_query($link,$query_a);
?>
<!-- START CONTENT  -->
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col col-md-4">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th class="text-center" colspan="3"><label class="custom ">BEGINNER</label></th>
                    </tr>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">TITLE</th>
                        <th class="text-center">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($row = mysqli_fetch_assoc($res_b)) {
                            echo '<tr>
                                <td class="text-center">'.$row['id'].'</td>
                                <td class="text-center">'.$row['title'].'</td>
                                <td class="text-center"><a class="btn  btn-light btn-lg active" aria-pressed="true" href="content-update.php?id='.$row['id'].'&mode='.$row['mode'].'"><i class="fas fa-edit"></i></a></td>
                                </tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col col-md-4">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th class="text-center" colspan="3"><label class="custom ">INTERMEDIATE</label></th>
                    </tr>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">TITLE</th>
                        <th class="text-center">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($row = mysqli_fetch_assoc($res_i)) {
                            echo '<tr>
                                <td class="text-center">'.$row['id'].'</td>
                                <td class="text-center">'.$row['title'].'</td>
                                <td class="text-center"><a class="btn  btn-light btn-lg active" aria-pressed="true" href="content-update.php?id='.$row['id'].'&mode='.$row['mode'].'"><i class="fas fa-edit"></i></a></td>
                                </tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col col-md-4">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th class="text-center" colspan="3"><label class="custom ">ADVANCE</label></th>
                    </tr>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">TITLE</th>
                        <th class="text-center">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($row = mysqli_fetch_assoc($res_a)) {
                            echo '<tr>
                                <td class="text-center">'.$row['id'].'</td>
                                <td class="text-center">'.$row['title'].'</td>
                                <td class="text-center"><a class="btn  btn-light btn-lg active" aria-pressed="true" href="content-update.php?id='.$row['id'].'&mode='.$row['mode'].'"><i class="fas fa-edit"></i></a></td>
                                </tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--END OF CONTENT-->
<?php
include 'includes/admin_footer.php';
?>
