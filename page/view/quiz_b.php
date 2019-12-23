<?php error_reporting(0);
require '../includes/isGuest-header.php';
//check if there is a user log
if(!isset($_SESSION['userType_session'])){
    header('location: http://localhost/capstone/page/login.php');
}

?>



<div class="container p-5 mt-3">

    <form action="result_b.php" method="post" id="quiz">

        <ol >
            <li class="shadow-none p-3 mb-5 bg-light rounded">
                <h4>What is Stock Market?</h4>
                <div>
                    <input type="radio" name="question-1-answers" id="question-1-answers-A" value="A" />
                    <label for="question-1-answers-A">A) The Stock Market is a market where people bet on race horses to gain some money. </label>
                </div>
                <div>
                    <input type="radio" name="question-1-answers" id="question-1-answers-B" value="B" />
                    <label for="question-1-answers-B">B) The Stock Market is a market where people buy products which the merchants have a lot of stock</label>
                </div>
                <div>
                    <input type="radio" name="question-1-answers" id="question-1-answers-C" value="C" />
                    <label for="question-1-answers-C">C) The Stock Market is a market where people buy stocks which are shares of companies</label>
                </div>

            </li>
            <li class="shadow-none p-3 mb-5 bg-light rounded">
                <h4>What does the bear and the bull stand for?</h4>
                <div>
                    <input type="radio" name="question-2-answers" id="question-2-answers-A" value="A" />
                    <label for="question-2-answers-A">A) The bear means stocls are falling and the bull means stocks are going up.</label>
                </div>
                <div>
                    <input type="radio" name="question-2-answers" id="question-2-answers-B" value="B" />
                    <label for="question-2-answers-B">B) They are signs that the Stock market is opened and closed.</label>
                </div>
                <div>
                    <input type="radio" name="question-2-answers" id="question-2-answers-C" value="C" />
                    <label for="question-2-answers-C">C) The bear means stocks are rising and the bull means stocks are falling.</label>
                </div>

            </li>
            <li class="shadow-none p-3 mb-5 bg-light rounded">
                <h4>How many types of stocks ther are?</h4>
                <div>
                    <input type="radio" name="question-3-answers" id="question-3-answers-A" value="A" />
                    <label for="question-3-answers-A">A) 2</label>
                </div>
                <div>
                    <input type="radio" name="question-3-answers" id="question-3-answers-B" value="B" />
                    <label for="question-3-answers-B">B) 4</label>
                </div>
                <div>
                    <input type="radio" name="question-3-answers" id="question-3-answers-C" value="C" />
                    <label for="question-3-answers-C">C) 5</label>
                </div>
                <div>
                    <input type="radio" name="question-3-answers" id="question-3-answers-D" value="D" />
                    <label for="question-3-answers-D">D) 8</label>
                </div>
            </li>
            <li class="shadow-none p-3 mb-5 bg-light rounded">
                <h4>What factors affect stock market?</h4>
                <div>
                    <input type="radio" name="question-4-answers" id="question-4-answers-A" value="A" />
                    <label for="question-4-answers-A">A) Natural Disasters</label>
                </div>
                <div>
                    <input type="radio" name="question-4-answers" id="question-4-answers-B" value="B" />
                    <label for="question-4-answers-B">B) Inflation</label>
                </div>
                <div>
                    <input type="radio" name="question-4-answers" id="question-4-answers-C" value="C" />
                    <label for="question-4-answers-C">C) Labor Strike</label>
                </div>
                <div>
                    <input type="radio" name="question-4-answers" id="question-4-answers-D" value="D" />
                    <label for="question-4-answers-D">D) Terrorist attack</label>
                </div>
                <div>
                    <input type="radio" name="question-4-answers" id="question-4-answers-E" value="E" />
                    <label for="question-4-answers-E">E) Changes in oil price</label>
                </div>
                <div>
                    <input type="radio" name="question-4-answers" id="question-4-answers-F" value="F" />
                    <label for="question-4-answers-F">F) Internal reformation within one company</label>
                </div>
                <div>
                    <input type="radio" name="question-4-answers" id="question-4-answers-G" value="G" />
                    <label for="question-4-answers-G">G) Annual leave of CEO of a company</label>
                </div>
            </li>
            <li class="shadow-none p-3 mb-5 bg-light rounded">
                <h4>Which statement about blue chips stocks is correct?</h4>
                <div>
                    <input type="radio" name="question-5-answers" id="question-5-answers-A" value="A" />
                    <label for="question-5-answers-A">A) Earnings are used for reinvestment in order to maintain the growing trend of the stocks</label>
                </div>
                <div>
                    <input type="radio" name="question-5-answers" id="question-5-answers-B" value="B" />
                    <label for="question-5-answers-B">B) no dividends</label>
                </div>
                <div>
                    <input type="radio" name="question-5-answers" id="question-5-answers-C" value="C" />
                    <label for="question-5-answers-C">C) The Stocks are consistently profitable with a dividend payment</label>
                </div>

            </li>

            <li class="shadow-none p-3 mb-5 bg-light rounded">
                <h4>Penny stocks refer to low-priced stock investments.These stocks are usually traded in stock exchange?</h4>
                <div>
                    <input type="radio" name="question-6-answers" id="question-6-answers-A" value="A" />
                    <label for="question-6-answers-A">A) True</label>
                </div>
                <div>
                    <input type="radio" name="question-6-answers" id="question-6-answers-B" value="B" />
                    <label for="question-6-answers-B">B) False</label>
                </div>

            </li>







            <li class="shadow-none p-3 mb-5 bg-light rounded">

                <div>
                    <input type="text" name="question-7-answers" id="question-7-answers" /> equips with the potential of a superior level of earnings in the future.<br>The earning are used for reinvestmentin order to maintainthe growing trend of these stocks.<br>Therfore, growth stocks do not pay dividends.
                </div>
            </li>


            <li class="shadow-none p-3 mb-5 bg-light rounded">
                <h4>Value stocks are usually traded below the market price.They are considered having the low-term potential growth<br> beacause of long-term growth of company associated with the stocks.</h4>
                <div>
                    <input type="radio" name="question-8-answers" id="question-8-answers-A" value="A" />
                    <label for="question-8-answers-A">A) True</label>
                </div>
                <div>
                    <input type="radio" name="question-8-answers" id="question-8-answers-B" value="B" />
                    <label for="question-8-answers-B">B) False</label>
                </div>

            </li>

            <li class="shadow-none p-3 mb-5 bg-light rounded">
                <h4>An "illiquid market" is also called a thin market and is characterized by:</h4>
                <div>
                    <input type="radio" name="question-9-answers" id="question-9-answers-A" value="A" />
                    <label for="question-9-answers-A">A) The lack of buyers and sellers</label>
                </div>
                <div>
                    <input type="radio" name="question-9-answers" id="question-9-answers-B" value="B" />
                    <label for="question-9-answers-B">B) The lack of alternative investment venues</label>

                </div>
                <div>
                    <input type="radio" name="question-9-answers" id="question-9-answers-B" value="B" />
                    <label for="question-9-answers-C">C) The lack of stock traded </label>

                </div>

            </li>

            <li class="shadow-none p-3 mb-5 bg-light rounded">
                <h4>The breadth of the market shows</h4>
                <div>
                    <input type="radio" name="question-10-answers" id="question-10-answers-A" value="A" />
                    <label for="question-10-answers-A">A) The number of stocks traded out of the ones listed</label>
                </div>
                <div>
                    <input type="radio" name="question-10-answers" id="question-10-answers-B" value="B" />
                    <label for="question-10-answers-B">B) The volume of trades</label>

                </div>
                <div>
                    <input type="radio" name="question-10-answers" id="question-10-answers-B" value="B" />
                    <label for="question-10-answers-C">C) The difference between buying and selling </label>

                </div><br>

            </li>



            <li class="shadow-none p-3 mb-5 bg-light rounded">
                <div>
                    An "Ask" and "Bid" is the<input type="text" name="question-11-answers" id="question-11-answers" />price and <input type="text" name="question-115-answers" id="question-115-answers" />price.
                </div>
            </li>






            <li class="shadow-none p-3 mb-5 bg-light rounded">
                <h4>Book value refers to</h4>
                <div>
                    <input type="radio" name="question-12-answers" id="question-12-answers-A" value="A" />
                    <label for="question-12-answers-A">A) The vakue of the company excluding its tangible assets</label>
                </div>
                <div>
                    <input type="radio" name="question-12-answers" id="question-12-answers-B" value="B" />
                    <label for="question-12-answers-B">B) The value of company if all assets are liquidated or sold at prices shown on balance sheet</label>

                </div>
                <div>
                    <input type="radio" name="question-12-answers" id="question-12-answers-B" value="B" />
                    <label for="question-12-answers-C">C) Theoretical value of companyy if all assets are liquidated or sold at prices shown on balance sheet</label>

                </div>

            </li>

            <li class="shadow-none p-3 mb-5 bg-light rounded">
                <h4>An investment is well-hedged if </h4>
                <div>
                    <input type="radio" name="question-13-answers" id="question-13-answers-A" value="A" />
                    <label for="question-13-answers-A">A) An investor limits losses on a certain stock by establishing an opposite position in the same stock</label>
                </div>
                <div>
                    <input type="radio" name="question-13-answers" id="question-13-answers-B" value="B" />
                    <label for="question-13-answers-B">B) It is protected against losses</label>

                </div>
                <div>
                    <input type="radio" name="question-13-answers" id="question-13-answers-B" value="B" />
                    <label for="question-13-answers-C">C) Both A and B</label>

                </div>

            </li>

            <li class="shadow-none p-3 mb-5 bg-light rounded">
                <h4>What does "Short Selling" mean?  </h4>
                <div>
                    <input type="radio" name="question-14-answers" id="question-14-answers-A" value="A" />
                    <label for="question-14-answers-A">A) Selling securities that the investor has borrowed and prepared to buy back later at a lower price</label>
                </div>
                <div>
                    <input type="radio" name="question-14-answers" id="question-14-answers-B" value="B" />
                    <label for="question-14-answers-B">B) An trading strategy used to profit from a price decline</label>

                </div>
                <div>
                    <input type="radio" name="question-14-answers" id="question-14-answers-B" value="B" />
                    <label for="question-14-answers-C">C) Both A and B</label>

                </div>

            </li>

            <li class="shadow-none p-3 mb-5 bg-light rounded">
                <div>
                  The public usually buy stocks from<input type="text" name="question-15-answers" id="question-15-answers" /> <input type="text" name="question-155-answers" id="question-155-answers" />
              </div>
          </li>










      </ol>



      <center><input  class="btn btn-primary btn-lg" type="submit" value="Submit" name='submitAnswer'class="submitbtn" /></center>



  </form>

</div>
<?php
require '../includes/footer.php'
?>