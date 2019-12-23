<?php
$page = 'company';
    //contain condition for checking user type
require 'includes/isAdmin-header.php';
?>
<!-- START CONTENT  -->
<div class="container mt-5 ">
    <div class="row justify-content-center">

    </div>
</div>

<div class="container mt-4">
 <!-- <form id="formaction" name="formaction" action="../admin-controller/content-maker-process.php" method="POST">
            <form action="../admin-controller/update-company-process.php" enctype="multipart/form-data" method="POST">
            -->
            <div class="card card-body p-5">
                <form action="../admin-controller/update-company-process.php" enctype="multipart/form-data" method="POST">
                    <div class="form-row mt-5">

                        <h1><i class="fas  fa-building prefix mr-2"></i><strong>&nbsp Company Information</strong></h1>
                    </div>
                    <div class="form-row mt-3">
                        <div class="col form-group col-md-5 ml-5">
                            <i class="fas fa-chevron-circle-down"></i> <label for="input_company">Company</label>
                            <input type="text" id="input_company" name="input_company" class="form-control-plaintext form-control-lg mt-2" placeholder="Company Symbol ex. TEL " required>
                        </div>
                        <div class="col form-group col-md-5 ml-5">
                            <i class="fas fa-chevron-circle-down"></i> <label for="input_incorp_date">Incorporate Date</label>
                            <input type="text" id="input_incorp_date" name="input_incorp_date" class="form-control-plaintext form-control-lg mt-2" placeholder="Incorporate Date ex. Jun 11, 1946 " required>
                        </div>
                    </div>
                    <div class="form-row mt-5">
                        <h2><i class="fas fa-shield-alt"></i><strong>&nbsp Security Information</strong></h2>
                    </div>
                    <div class="form-row">
                        <div class="col form-group col-md-5 mt-4 ml-5">
                            <i class="fas fa-chevron-circle-down"></i> <label for="input_sector">Sector</label>
                            <input type="text" id="input_sector" name="input_sector" class="form-control-plaintext form-control-lg mt-2" placeholder="Sector ex. Services" required>
                        </div>
                        <div class="col form-group col-md-5 mt-4 ml-5">
                            <i class="fas fa-chevron-circle-down"></i> <label for="input_subsector">Sub Sector</label>
                            <input type="text" id="input_subsector" name="input_subsector" class="form-control-plaintext form-control-lg mt-2" placeholder="Sub Sector ex.  Telecommunications" required>
                        </div>
                    </div>
                    <!--line-->
                    <hr>
                    <!--line-->
                    <div class="form-row">
                     <div class="col form-group">
                        <div class="form-group shadow-textarea">
                            <i class="fas fa-pencil-alt prefix mr-2"></i>
                            <label for="textarea_content">Company Description</label>
                            <textarea class="form-control z-depth-1" id="textarea_content" name="textarea_content"  rows="30" placeholder="Write something here..." required></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                 <div class="col form-group">
                    <div class="form-group">
                        <i class="fas fa-image prefix mr-2"></i>
                        <label for="image">Upload Company Logo</label>
                        <br/>
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="file" name="image" id="image"/>
                    </div>
                </div>
            </div>
            <div class="form-row justify-content-end">
                <div class="col form-group col-md-1 ">
                 <button type="reset" id="btnClear" class="btn btn-danger btn-rounded  btn-lg btn-block"><i class="fas fa-undo"></i></button>
             </div>
             <div class="col form-group col-md-2 ">
                 <button type="submit" name="submitCompany" id="submitCompany"
                 class="btn btn-rounded btn-success  btn-lg btn-block" >Update Description</button>
             </div>

         </div>
     </form>
 </div>
</div>
<?php
include 'includes/admin_footer.php';
?>
