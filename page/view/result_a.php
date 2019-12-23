<?php
$page = "guide";

require '../includes/isGuest-header.php';
//check if there is a user log
//check if there is a user log
if(!isset($_SESSION['userType_session'])){
    header('location: http://localhost/capstone/page/login.php');
}

?>

<div class="container p-5 mt-3">
    <div class="container text-center">
        <div  class="row justify-content-center">


            <h1>Result</h1>


        </div>

    </div>
    <div class="row justify-content-center">


      <?php
      $totalCorrect = 0;

      if(isset($_POST['submitAnswer'])){
        if(!empty($_POST['question-1-answers'])) {
            $answer1=$_POST['question-1-answers'];
            if($answer1 == "C"){
                $totalCorrect++;
            }
        }

        if(isset($_POST['submitAnswer'])){
            if(!empty($_POST['question-2-answers'])) {
                $answer1=$_POST['question-2-answers'];
                if($answer1 == "A"){
                    $totalCorrect++;
                }
            }

            if(isset($_POST['submitAnswer'])){
                if(!empty($_POST['question-3-answers'])) {
                    $answer1=$_POST['question-3-answers'];
                    if($answer1 == "B"){
                        $totalCorrect++;
                    }
                }
                if(isset($_POST['submitAnswer'])){
                    if(!empty($_POST['question-4-answers'])) {
                        $answer1=$_POST['question-4-answers'];
                        if($answer1 == "A"){
                            $totalCorrect++;
                        }
                    }
                    if(isset($_POST['submitAnswer'])){
                        if(!empty($_POST['question-5-answers'])) {
                            $answer1=$_POST['question-5-answers'];
                            if($answer1 == "A"){
                                $totalCorrect++;
                            }
                        }
                        if(isset($_POST['submitAnswer'])){
                            if(!empty($_POST['question-6-answers'])) {
                                $answer1=$_POST['question-6-answers'];
                                if($answer1 == "B"){
                                    $totalCorrect++;
                                }
                            }




                            $answer7  = $_POST['question-7-answers'];


                            if(!empty($_POST['question-8-answers'])) {
                                $answer1=$_POST['question-8-answers'];
                                if($answer1 == "A"){
                                    $totalCorrect++;
                                }
                            }
                            if(!empty($_POST['question-9-answers'])) {
                                $answer1=$_POST['question-9-answers'];
                                if($answer1 == "A"){
                                    $totalCorrect++;
                                }
                            }
                            if(!empty($_POST['question-10-answers'])) {
                                $answer1=$_POST['question-10-answers'];
                                if($answer1 == "A"){
                                    $totalCorrect++;
                                }
                            }

                            $answer11 = $_POST['question-11-answers'];
                            $answer115 = $_POST['question-115-answers'];

                            if(!empty($_POST['question-12-answers'])) {
                                $answer1=$_POST['question-12-answers'];
                                if($answer1 == "C"){
                                    $totalCorrect++;
                                }
                            }
                            if(!empty($_POST['question-13-answers'])) {
                                $answer1=$_POST['question-13-answers'];
                                if($answer1 == "C"){
                                    $totalCorrect++;
                                }
                            }
                            if(!empty($_POST['question-14-answers'])) {
                                $answer1=$_POST['question-14-answers'];
                                if($answer1 == "C"){
                                    $totalCorrect++;
                                }
                            }


                            $answer15 = $_POST['question-15-answers'];
                            $answer155 = $_POST['question-155-answers'];







                            if ($answer7  == "Growth Stocks") { $totalCorrect++; }

                            if ($answer11 == "lowest price to sell") { $totalCorrect++; }
                            if ($answer115 == "highest price to buy") { $totalCorrect++; }

                            if ($answer15 == "stock     ") { $totalCorrect++; }
                            if ($answer155 == "brokers") { $totalCorrect++; }

                //validation
                            echo "<div id='results'>$totalCorrect / 15 correct</div>";
                        }
                    }
                }
            }
        }
    }

    ?>
</div>
<div class="row justify-content-center mt-5">
    <a href='quiz_a.php' class='btn btn-primary btn-lg active' role='button' style='font-size: 15px' aria-pressed='true' >RETAKE THE QUIZ?</a>
</div>
</div>
<?php
require '../includes/footer.php'
?>