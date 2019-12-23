<?php error_reporting(0);
require '../includes/isGuest-header.php';
//check if there is a user log
if(!isset($_SESSION['userType_session'])){
    header('location: http://localhost/capstone/page/login.php');
}

?>



<div class="container p-5 mt-3">
    <form action="result_i.php" method="post" id="quiz">

        <ol>
            <li class="shadow-none p-3 mb-5 bg-light rounded">
                <h4 >What is the purpose of the DJIA?</h4>
                <div>
                    <input type="radio" name="question-1-answers" id="question-1-answers-A" value="A" />
                    <label for="question-1-answers-A">A) It is a company that invests in the stock market. </label>
                </div>
                <div>
                    <input type="radio" name="question-1-answers" id="question-1-answers-B" value="B" />
                    <label for="question-1-answers-B">B) It is an index of the 500 leading stocks in each industry traded in all markets.</label>
                </div>
                <div>
                    <input type="radio" name="question-1-answers" id="question-1-answers-C" value="C" />
                    <label for="question-1-answers-C">C) It is an index that gives general information about the performance of each stock.

                    </label>
                </div>
                <div>
                    <input type="radio" name="question-1-answers" id="question-1-answers-C" value="C" />
                    <label for="question-1-answers-C">D) All of the above.

                    </label>
                </div>

            </li>

            <li class="shadow-none p-3 mb-5 bg-light rounded">
                <h4>Two of the founders of DJIA were</h4>
                <div>
                    <input type="radio" name="question-2-answers" id="question-2-answers-A" value="A" />
                    <label for="question-2-answers-A">A) Edward Jones and Charles Dow </label>
                </div>
                <div>
                    <input type="radio" name="question-2-answers" id="question-2-answers-B" value="B" />
                    <label for="question-2-answers-B">B) Alexander Hamilton and Charles Bernstegen</label>
                </div>
                <div>
                    <input type="radio" name="question-2-answers" id="question-2-answers-C" value="C" />
                    <label for="question-1-answers-C">C) J.P. Morgan and Chales Dow

                    </label>
                </div>
                <div>
                    <input type="radio" name="question-2-answers" id="question-2-answers-D" value="D" />
                    <label for="question-2-answers-D">D) Bill Gates and Charles Dow
                    </label>
                </div>
                <div>
                    <input type="radio" name="question-2-answers" id="question-2-answers-E" value="E" />
                    <label for="question-2-answers-E">E) Alexander Hamiltion and Charles Dow
                    </label>
                </div>
            </li>

            <li class="shadow-none p-3 mb-5 bg-light rounded">
                <h4>Name one company on the DJIA today.</h4>
                <div>
                    <input type="radio" name="question-3-answers" id="question-3-answers-A" value="A" />
                    <label for="question-3-answers-A">A) AT&T </label>
                </div>
                <div>
                    <input type="radio" name="question-3-answers" id="question-3-answers-B" value="B" />
                    <label for="question-3-answers-B">B) Woolworths</label>
                </div>
                <div>
                    <input type="radio" name="question-3-answers" id="question-3-answers-C" value="C" />
                    <label for="question-3-answers-C">C) Sears & Roebuck

                    </label>
                </div>
                <div>
                    <input type="radio" name="question-3-answers" id="question-3-answers-D" value="D" />
                    <label for="question-3-answers-D">D) U.S Steel
                    </label>
                </div>
                <div>
                    <input type="radio" name="question-3-answers" id="question-3-answers-E" value="E" />
                    <label for="question-3-answers-E">E) Disney
                    </label>
                </div>
            </li>

            <li class="shadow-none p-3 mb-5 bg-light rounded">
                <h4>Name one company listed on the DJIA in 1929.</h4>
                <div>
                    <input type="radio" name="question-4-answers" id="question-4-answers-A" value="A" />
                    <label for="question-4-answers-A">A) Microsoft </label>
                </div>
                <div>
                    <input type="radio" name="question-4-answers" id="question-4-answers-B" value="B" />
                    <label for="question-4-answers-B">B) United Airlines (UAL)</label>
                </div>
                <div>
                    <input type="radio" name="question-4-answers" id="question-4-answers-C" value="C" />
                    <label for="question-4-answers-C">C) International Harvester

                    </label>
                </div>
                <div>
                    <input type="radio" name="question-4-answers" id="question-4-answers-D" value="D" />
                    <label for="question-4-answers-D">D) Disney
                    </label>
                </div>
                <div>
                    <input type="radio" name="question-4-answers" id="question-4-answers-E" value="E" />
                    <label for="question-4-answers-E">E) Intel
                    </label>
                </div>
            </li>


            <li class="shadow-none p-3 mb-5 bg-light rounded">
                <h4>In which year did a stock market crash have no effect on the overall economy?</h4>
                <div>
                    <input type="radio" name="question-5-answers" id="question-5-answers-A" value="A" />
                    <label for="question-5-answers-A">A) 2008 </label>
                </div>
                <div>
                    <input type="radio" name="question-5-answers" id="question-5-answers-B" value="B" />
                    <label for="question-5-answers-B">B) 1987</label>
                </div>
                <div>
                    <input type="radio" name="question-5-answers" id="question-5-answers-C" value="C" />
                    <label for="question-5-answers-C">C) 1929</label>
                </div>
                <div>
                    <input type="radio" name="question-5-answers" id="question-5-answers-D" value="D" />
                    <label for="question-5-answers-D">D) 2001</label>
                </div>
                <div>
                    <input type="radio" name="question-5-answers" id="question-5-answers-E" value="E" />
                    <label for="question-5-answers-E">E) 1945


                    </label>
                </div>
            </li>

            <li class="shadow-none p-3 mb-5 bg-light rounded">
                <h4>What is a stock?</h4>
                <div>
                    <input type="radio" name="question-6-answers" id="question-6-answers-A" value="A" />
                    <label for="question-6-answers-A">A) An IOU of a corporation. </label>
                </div>
                <div>
                    <input type="radio" name="question-6-answers" id="question-6-answers-B" value="B" />
                    <label for="question-6-answers-B">B) A piece of ownership in a corporation.</label>
                </div>
                <div>
                    <input type="radio" name="question-6-answers" id="question-6-answers-C" value="C" />
                    <label for="question-6-answers-C">C) Total ownership of a corporation.</label>
                </div>
                <div>
                    <input type="radio" name="question-6-answers" id="question-6-answers-D" value="D" />
                    <label for="question-6-answers-D">D) A retirement investment.</label>
                </div>
                <div>
                    <input type="radio" name="question-6-answers" id="question-6-answers-E" value="E" />
                    <label for="question-6-answers-E">E) None of the above


                    </label>
                </div>
            </li>


            <li class="shadow-none p-3 mb-5 bg-light rounded">
                <h4>When you purchase a stock for $10.00 and then sell it one month later at $20.00 you are</h4>
                <div>
                    <input type="radio" name="question-7-answers" id="question-7-answers-A" value="A" />
                    <label for="question-7-answers-A">A) Buying low and selling high </label>
                </div>
                <div>
                    <input type="radio" name="question-7-answers" id="question-7-answers-B" value="B" />
                    <label for="question-7-answers-B">B) Buying high and selling low</label>
                </div>
                <div>
                    <input type="radio" name="question-7-answers" id="question-7-answers-C" value="C" />
                    <label for="question-7-answers-C">C) Short selling low and short covering high</label>
                </div>
                <div>
                    <input type="radio" name="question-7-answers" id="question-7-answers-D" value="D" />
                    <label for="question-7-answers-D">D) Short selling high and short covering low</label>
                </div>
                <div>
                    <input type="radio" name="question-7-answers" id="question-7-answers-E" value="E" />
                    <label for="question-7-answers-E">E) Gaining dividends


                    </label>
                </div>
            </li>

            <li class="shadow-none p-3 mb-5 bg-light rounded">
                <h4>When you recieve corporate profits from your ownership of stock you are</h4>
                <div>
                    <input type="radio" name="question-8-answers" id="question-8-answers-A" value="A" />
                    <label for="question-8-answers-A">A) Buying low and selling high </label>
                </div>
                <div>
                    <input type="radio" name="question-8-answers" id="question-8-answers-B" value="B" />
                    <label for="question-8-answers-B">B) Buying high and selling low</label>
                </div>
                <div>
                    <input type="radio" name="question-8-answers" id="question-8-answers-C" value="C" />
                    <label for="question-8-answers-C">C) Short selling low and short covering high</label>
                </div>
                <div>
                    <input type="radio" name="question-8-answers" id="question-8-answers-D" value="D" />
                    <label for="question-8-answers-D">D) Short selling high and short covering low</label>
                </div>
                <div>
                    <input type="radio" name="question-8-answers" id="question-8-answers-E" value="E" />
                    <label for="question-8-answers-E">E) Gaining dividends


                    </label>
                </div>
            </li>

            <li class="shadow-none p-3 mb-5 bg-light rounded">
                <h4>What type of stocks would you want to short sell?</h4>
                <div>
                    <input type="radio" name="question-9-answers" id="question-9-answers-A" value="A" />
                    <label for="question-9-answers-A">A) Stock with the potential to gain value in the future </label>
                </div>
                <div>
                    <input type="radio" name="question-9-answers" id="question-9-answers-B" value="B" />
                    <label for="question-9-answers-B">B) Stock with high corporate profits</label>
                </div>
                <div>
                    <input type="radio" name="question-9-answers" id="question-9-answers-C" value="C" />
                    <label for="question-9-answers-C">C) Stock that may be experiencing lost value in the future</label>
                </div>
                <div>
                    <input type="radio" name="question-9-answers" id="question-9-answers-D" value="D" />
                    <label for="question-9-answers-D">D) Stock that will keep a constant value</label>
                </div>
                <div>
                    <input type="radio" name="question-9-answers" id="question-9-answers-E" value="E" />
                    <label for="question-9-answers-E">E) Never, it's too risky


                    </label>
                </div>
            </li>

            <li class="shadow-none p-3 mb-5 bg-light rounded">
                <h4>What professions are associated with financial markets?</h4>
                <div>
                    <input type="radio" name="question-10-answers" id="question-10-answers-A" value="A" />
                    <label for="question-10-answers-A">A) Stock broker </label>
                </div>
                <div>
                    <input type="radio" name="question-10-answers" id="question-10-answers-B" value="B" />
                    <label for="question-10-answers-B">B) All of the options listed</label>
                </div>
                <div>
                    <input type="radio" name="question-10-answers" id="question-10-answers-C" value="C" />
                    <label for="question-10-answers-C">C) Investment banker</label>
                </div>
                <div>
                    <input type="radio" name="question-10-answers" id="question-10-answers-D" value="D" />
                    <label for="question-10-answers-D">D) Commodities broker</label>
                </div>
                <div>
                    <input type="radio" name="question-10-answers" id="question-10-answers-E" value="E" />
                    <label for="question-10-answers-E">E) Bond dealer

                    </label>
                </div>
            </li>


        </ol>

        <center><input  class="btn btn-primary btn-lg" type="submit" value="Submit" name='submitAnswer'class="submitbtn" /></center>

    </form>
</div>
<?php
require '../includes/footer.php'
?>