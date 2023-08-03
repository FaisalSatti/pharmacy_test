<?php
session_start();
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="margin-top: -10px;">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h1>Stock Transfer</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                        <li class="breadcrumb-item active"><button class="btn btn-sm" id="il_breadcrumb"> Inventory Local</button></li>
                        <li class="breadcrumb-item"><button class="btn btn-sm" id="po_list_breadcrumb"> Transfer List</button></li>
                        <li class="breadcrumb-item"><button class="btn btn-sm" id="add_po_local_breadcrumb">Add Transfer</button></li>
                    </ol>
                </div>   
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row" style="margin-top:-23px">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body" style="padding:7px">
                            <div class="container">
                                <form method = "post" id = "order_form">
                                    <?php include '../../display_message/display_message.php'?>
                                    <div class="row" style="border: 1px solid gray; border-radius: 5px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.29);">
                                        <div  class="col-lg-12">
                                            <div class="row" style="border-radius:4px;border  :2px solid #1e293b; padding-top:8px;box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
                                                <!-- doc -->
                                                <div class="col-lg-1 col-md-2 col-sm-12 form-group">
                                                    <label>Doc#:</label> 
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-12 form-group">
                                                    <!-- <label for="">Document Number :</label> -->
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                        </div>
                                                        <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" style="background-color:#ccd4e1;font-weight:bold;" name="doc_no" id="doc_no" tabindex="-1" class="form-control form-control-sm" placeholder="DOCUMENT NO" readonly>
                                                    </div>
                                                </div>
                                                <!-- date -->
                                                <div class="col-lg-1 col-md-2 col-sm-12 form-group">
                                                    <label>Date:</label> 
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-12 form-group">
                                                    <!-- <label for=""> Date :</label><span style="color:red;">*</span> -->
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                        </div>
                                                        <input type="date" name="voucher_date" id="voucher_date" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px;" class="form-control form-control-sm" value="<?php echo date('Y-m-d'); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-1 col-md-2 col-sm-12 form-group">
                                                    <label>Year:</label> 
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-12 form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                        </div>
                                                        <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" style="background-color:#ccd4e1;font-weight:bold;" name="year" id="year" class="form-control form-control-sm" value="<?php echo date("Y");
                                                        ?>" placeholder="year" readonly tabindex="-1" >
                                                    </div>
                                                </div>
                                                <div class="col-lg-1 col-md-2 col-sm-12 form-group">
                                                    <label>Company:</label> 
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-12 form-group">
                                                    <!-- <label for="">Company Code :<span style="color:red">*</span></label> -->
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                                        </div>
                                                        <input maxlength="30" type="text" name="company_code" id="company_code" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px;background-color:#b7edea;" class="form-control form-control-sm" placeholder="COMPANY CODE" readonly>
                                                        
                                                    </div>
                                                </div>
                                                <!-- company name -->
                                                <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                                    <!-- <label for="inputCompanyName">Company Name :</label><span style="color:red;">*</span> -->
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                        </div>
                                                        <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" style="background-color:#ccd4e1;font-weight:bold;" name="company_name" tabindex="-1" id="company_name" class="form-control form-control-sm" placeholder="COMPANY NAME" readonly >
                                                    </div>
                                                </div>
                                                <div class="col-lg-1 col-md-2 col-sm-12 form-group">
                                                    <label>POCat:</label> 
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-12 form-group">
                                                    <!-- <label for="">PO Catg L/I :<span style="color:red">*</span></label> -->
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-list-alt"></i></span>
                                                        </div>
                                                        <select style="width:73% !important;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px;" title="purchase mode" name="purchase_mode" class="form-control form-control-sm" id="purchase_mode" >
                                                            <option value="">Select PO</option>
                                                            <option value="I">I</option>
                                                            <option value="L">L</option>
                                                        </select>                                
                                                    </div>
                                                </div>
                                                <div class="col-lg-1 col-md-2 col-sm-12 form-group">
                                                    <label>Divcode:</label> 
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-12 form-group">
                                                    <!-- <label for="">Company Code :<span style="color:red">*</span></label> -->
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                                        </div>
                                                        <select class="form-control js-example-basic-single form-control-sm" style="background-color:#b7edea;" id="div" name="division" style="" placeholder="DIVISION CODE"></select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-1 col-md-2 col-sm-12 form-group">
                                                    <label>DivName:</label> 
                                                </div>
                                                <div class="col-lg-3 col-md-4 form-group">
                                                    <!-- <label for="">Division :<span style="color:red">*</span></label> -->
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                                        </div>
                                                        <input maxlength="30" tabindex="-1" type="text" name="div_name" style="background-color:#ccd4e1;font-weight:bold;" id="division_name" class="form-control form-control-sm" placeholder="DIVISION NAME" readonly>
                                                        
                                                    </div>
                                                </div>
                                            
                                                <div class="col-lg-1 col-md-2 col-sm-12 form-group">
                                                    <label>DEPTREF:</label> 
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-12 form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                        </div>
                                                        <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text"  name="v_no" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px;" id="v_no" class="form-control form-control-sm" placeholder="DEPARTMENT REFERENCE" >
                                                    </div>
                                                </div>
                                            
                                                <div class="col-lg-1 col-md-2 col-sm-12 form-group">
                                                    <label>FromLoc:</label> 
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-12 form-group">
                                                    <!-- <label for="">Company Code :<span style="color:red">*</span></label> -->
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                                        </div>
                                                        <select class="form-control js-example-basic-single  form-control-sm"  id="from_loc" name="from_loc" style="" placeholder="FROM LOCATION"></select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-1 col-md-2 col-sm-12 form-group">
                                                    <label>LocName:</label> 
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-12 form-group">
                                                    <!-- <label for="">Company Code :<span style="color:red">*</span></label> -->
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                                        </div>
                                                        <input maxlength="30" tabindex="-1" type="text" name="from_loc_name" style="background-color:#ccd4e1;font-weight:bold;" id="from_loc_name" class="form-control form-control-sm" placeholder="FROM LOCATION NAME " readonly>
                                                        
                                                    </div>
                                                </div>
                                            
                                                <div class="col-lg-1 col-md-2 col-sm-12 form-group">
                                                    <label>ToLoc:</label> 
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-12 form-group">
                                                    <!-- <label for="">Company Code :<span style="color:red">*</span></label> -->
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                                        </div>
                                                        <select class="form-control js-example-basic-single  form-control-sm" id="to_loc" name="to_loc" style="" placeholder="TO LOCATION"></select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-1 col-md-2 col-sm-12 form-group">
                                                    <label>LocName:</label> 
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-12 form-group">
                                                    <!-- <label for="">Company Code :<span style="color:red">*</span></label> -->
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                                        </div>
                                                        <input maxlength="30" tabindex="-1"  type="text" name="to_loc_name" style="background-color:#ccd4e1;font-weight:bold;" id="to_loc_name" class="form-control form-control-sm" placeholder="TO LOCATION NAME" readonly>
                                                        
                                                    </div>
                                                </div>
                                            
                                                
                                            
                                                <!-- Narration -->
                                                <div class="col-lg-1 col-md-2 col-sm-12 form-group">
                                                    <label>Remarks:</label> 
                                                </div>
                                                <div class="col-lg-7 col-md-4 col-sm-12 form-group">
                                                    <!-- <label for="">Narration :</label> -->
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                        </div>
                                                        <textarea rows="1" name="narration" id="narration" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px;" class="form-control form-control-sm" placeholder="NARRATION" ></textarea>
                                                    </div>
                                                </div>
    
                                            </div>
                                        </div>                              
                                    </div>
                                    <br>
                                    <div class="row justify-content-center">
                                        <div class="col-sm-12">
                                            <div style="height:20px" class="loading">
                                                <span style="text-align:center;font-weight:bold;">Order Details</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <br>
                                        <table id="example1" class="table table-bordered table-responsive" style="border: 1px solid gray; border-radius: 5px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.29); width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>ItemCode</th>
                                                    <th>Name</th>
                                                    <th>Quantity</th>
                                                    <th>Rate</th>
                                                    <th>Amount</th>
                                                    <th>Batch No</th>
                                                    <th>Expiry Dt</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="d_items">
                                                <tr id="main_tr" class="tr">
                                                    <td ><select name="" id = "order" class="js-example-basic-single order" style="width:75px;"></select></td>
                                                    <td ><textarea tabindex="-1" style="height:35px;background-color:#ccd4e1;width:240px;" rows="1"   name="" id = "item_name" class="item_name" readonly></textarea></td>
                                                    <td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:135px;" type="number"  name="" id="quantity" class="quantity"></td>
                                                    <td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:135px;" type="text"  name="" id="rate" class="rate"></td>
                                                    <td ><input  tabindex="-1"  style="text-align:right; padding:0 2px 0 0;height:35px;width:150px;background-color:#ccd4e1;"  readonly pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="" id = "amount" class="amount text-right"></td>
                                                    <td ><input  tabindex="-1" style="text-align:right; padding:0 2px 0 0;height:35px;background-color:#ccd4e1;width:130px;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text" tabindex="-1"  name="" id = "batch_no" class="batch_no" readonly></td>
                                                    <td ><textarea  tabindex="-1" style="height:35px;background-color:#ccd4e1;font-size:12px;width:140px;"  pattern="[a-zA-Z0-9 ,._-]{1,}" type="text"  name="" id = "expiry" class="expiry" readonly></textarea></td>
                                                    <td ><button type = "button" class="btn btn-sm btn-primary add"><i class="fa fa-plus"></i></button></td>
                                                </tr>
                                            </tbody>
                                            <tr id="last_tr">
                                                <td></td>
                                                <td></td>
                                                
                                                <td></td>
                                                <td style="text-align:right;">Total:</td>
                                                <td style="font-weight:bold;text-align: right;" name="total" id="total"><b>0</b></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </table>
                                        <!-- <br> -->

                                        <div class="row">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <!-- <div class="col-md-12 form-group"></div> -->
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-2 col-sm-12 form-group">
                                                                <label>DIV:</label> 
                                                            </div>
                                                            <div class="col-lg-5 col-md-4 col-sm-12 form-group"><input tabindex="-1" style="background-color: #ccd4e1;" type="text"  name="item_div" id="item_div" class="form-control" placeholder="DIVISION" readonly></div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12 form-group"><input tabindex="-1" style="background-color: #ccd4e1;" type="text"  name="div_code" id="div_code" class="form-control" readonly></div>
                                                            
                                                            <div class="col-lg-1 col-md-2 col-sm-12 form-group">
                                                                <label>GEN:</label> 
                                                            </div>
                                                            <div class="col-lg-5 col-md-4 col-sm-12 form-group"><input tabindex="-1" style="background-color: #ccd4e1;" type="text"  name="gen" id="gen" class="form-control" placeholder="GEN" readonly></div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12 form-group"><input  tabindex="-1" style="background-color: #ccd4e1;" type="text"  name="gen_code" id="gen_code" class="form-control" readonly></div>
                                                        
                                                            <div class="col-lg-1 col-md-2 col-sm-12 form-group">
                                                                <label>UM:</label> 
                                                            </div>
                                                            <div class="col-lg-5 col-md-4 col-sm-12"><input  tabindex="-1" style="background-color: #ccd4e1;" type="text"  name="um" id="um" class="form-control" placeholder="UM"  readonly></div>
                                                        
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    <!-- masla -->
                                    </div>
                                    <!-- </form> -->
                                    <div style="text-align: center;">
                                        <span id="msg" style="color: red;font-size: 13px;"></span>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 text-right">
                                            <button id="submit" type="submit" value="Submit" class="btn btn-primary toastrDefaultSuccess"><i style="font-size:20px" class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>   
    <!-- /.content -->
</div>
<style>
body{
zoom: 86%;
}
.select2-container{
width:76% !important;
}
input:focus,select:focus,textarea:focus,.select2-selection:focus, .add:focus, #submit:focus, .remove:focus{
-moz-box-shadow: 0 0 8px rgba(82,168,236,.6);
box-shadow: 0 0 8px orangered !important;
border: 3px solid black;}
.modal-backdrop {
   background-color: transparent;
}
select{
width:82% !important;
}
#btn-back-to-top { 
position: fixed;
bottom: 20px;
right: 20px;
}
html {
scroll-behavior: smooth;
}
#down {
margin-top: -1%;
padding-top: -1%;
} 
.form-control:focus{
-moz-box-shadow: 0 0 8px rgba(82,168,236,.6);
box-shadow: 0 0 8px orangered !important;
}
input:focus, .select2-container:focus, .select:focus{
-moz-box-shadow: 0 0 8px rgba(82,168,236,.6);
box-shadow: 0 0 8px orangered !important;
}
textarea:focus{
-moz-box-shadow: 0 0 8px rgba(82,168,236,.6);
box-shadow: 0 0 8px orangered !important;
}
input,select,textarea,.select2-selection{
border:1px solid black !important;
}
input:focus,select:focus,textarea:focus,.select2-selection:focus{
-moz-box-shadow: 0 0 8px rgba(82,168,236,.6);
box-shadow: 0 0 8px orangered !important;}
input,select,textarea,.select2-selection{
border:1px solid black !important;
}
.select2-hidden-accessible{
border:1px solid black !important;
}
.select2-selection{
background-color: #b7edea !important  
}
h2 {
color: black;
font-size: 34px;
position: relative;
text-transform: uppercase;
font-weight:600;margin-top: -58px;
}
h2::before {
top: 0;
left: 0;
width: 0;
height: 100%;
color: #007bff;
overflow: hidden;
position: absolute;
content: attr(data-text);
border-right: 2px solid #37b9f1;
-webkit-text-stroke: 0vw #f7f7fe;
animation: animate 6s linear infinite;
font-weight:600
}
@keyframes animate {
0%,10%,100% {
width: 0;
}
70%,
90% {
width: 100%;
}
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
-webkit-appearance: none !important;
margin: 0!important;
}
input[type=number] {
-moz-appearance: textfield !important;
}
table {
font-family: arial, sans-serif;
border-collapse: collapse;
width: 100%;
}
td,th {
text-align: left;
font-size:15px
}
tr:nth-child(even) {
/* background-color: #dddddd; */
}
.select2-container{
width:76% !important;
}
.amount::placeholder { 
text-align:right !important
}
@media only screen and (min-width: 250px) and (max-width: 350px) {
.select2-container{
width:83% !important;
}
}
@media only screen and (min-width: 350px) and (max-width: 500px) {
.select2-container{
width:87% !important;
}
}
@media only screen and (min-width: 500px) and (max-width: 764px) {
.select2-container{
width:90% !important;
}
}
@media screen and (min-width: 764px) and (max-width:997px) {
.select2-container{
width:80% !important;
} 
}
@media screen and (min-width: 998px) and (max-width:1024px) {
.select2-container{
width:80% !important;
} 
}
@media screen and (min-width: 1024px) and (max-width:1440px) {
.select2-container{
width:81% !important;
} 
}
td .select2-container{
width:100% !important;
}
.table td, .table th {
padding:0.15rem !important;
}
.table th{
text-align:center !important;
}
.hover-item,.even,.odd {
background-color: #FFF;
cursor:pointer;
}
.hover-item,.odd:hover {
background-color: gray;
color:white
}
.even:hover{
background-color: gray;
color:white
}#salesman{
background-color:#afafaf85;
}
#party{
background-color:#afafaf85;
}
#division{
background-color:#b7edea;
}
#company_code{
background-color:#b7edea;
}
td input{
font-size:12px !important;
}.select2-selection__rendered,.select2-results{
font-size:12px !important;
}.form-group{margin-bottom:4px !important}  
</style>
<!-- ./wrapper -->

<!-- company  form -->
<div class="modal fade" id="CompanyFormModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Company</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
              <table class="table" id="company_table">
                <thead>
                  <tr>
                    <th>Sno</th>
                    <th>Company Name</th>
                    <th>Company Code</th>
                  </tr>
                </thead>
              </table>
            </div>
        </div>
    </div>
</div>

<!-- division  form -->
<div class="modal fade" id="DivisionFormModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="div_modal">Select Division</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
              <table class="table" id="division_table">
                <thead>
                  <tr>
                    <th>Sno</th>
                    <th>Division Name</th>
                    <th>Division Code</th>
                  </tr>
                </thead>
              </table>
            </div>
        </div>
    </div>
</div>

<!-- company  form -->
<div class="modal fade" id="SalesmanFormModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Company</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
              <table class="table" id="salesman_table">
                <thead>
                  <tr>
                    <th>Sno</th>
                    <th>Salesman Name</th>
                    <th>Salesman Code</th>
                  </tr>
                </thead>
              </table>
            </div>
        </div>
    </div>
</div>
<!-- view party detail -->
<div class="modal fade bd-example-modal-xl" id="ViewPartyModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Party Detail</h5>
        <button type="button" class="close" aria-label="Close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="" id="view_partys">
        <div class="modal-body container" style="border:1px solid black">
          <div class="row">
            <div class="col-sm-12">
              <table class=" table table-bordered table-hover table-sm">    
                  <div class="row">
                    <div class="col-md-3">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Name:</h3>
                    </div>
                    <div class="col-md-9">
                      <p id="name" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                    <div class="col-md-3">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Address:</h3>
                    </div>
                    <div class="col-md-9">
                      <p id="address" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                    <div class="col-md-3">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Phone#:</h3>
                    </div>
                    <div class="col-md-9">
                      <p id="phone" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                    <div class="col-md-3">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">GST#:</h3>
                    </div>
                    <div class="col-md-9">
                      <p id="gst" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                    <div class="col-md-3">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">NTN#:</h3>
                    </div>
                    <div class="col-md-9">
                      <p id="ntn" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                    <div class="col-md-3">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Division:</h3>
                    </div>
                    <div class="col-md-9">
                      <p id="division_p" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                    <div class="col-md-3">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">City:</h3>
                    </div>
                    <div class="col-md-9">
                      <p id="city_p" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                  </div>
              </table>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- view item detail -->
<div class="modal fade bd-example-modal-xl" id="ViewItemModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Item Detail</h5>
        <button type="button" class="close" aria-label="Close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="" id="view_items">
        <div class="modal-body container" style="border:1px solid black">
          <div class="row">
            <div class="col-sm-12">
              <table class=" table table-bordered table-hover table-sm">    
                  <div class="row">
                    <div class="col-md-4">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Division Name:</h3>
                    </div>
                    <div class="col-md-8">
                      <p id="division_i" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                    <div class="col-md-4">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Gen Name:</h3>
                    </div>
                    <div class="col-md-8">
                      <p id="gen_i" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                    <div class="col-md-4">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">UM Name:</h3>
                    </div>
                    <div class="col-md-8">
                      <p id="um_i" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                    <div class="col-md-4">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">TP Rate:</h3>
                    </div>
                    <div class="col-md-8">
                      <p id="tp_rate" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                    <div class="col-md-4">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">TP Rate 2:</h3>
                    </div>
                    <div class="col-md-8">
                      <p id="tp_rate2" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                    <div class="col-md-4">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">GST %:</h3>
                    </div>
                    <div class="col-md-8">
                      <p id="gst_per" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                    <div class="col-md-4">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Add %:</h3>
                    </div>
                    <div class="col-md-8">
                      <p id="add_per" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                  </div>
              </table>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- party  form -->
<div class="modal fade" id="PartyFormModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Party</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
              <table class="table" id="party_table">
                <thead>
                  <tr>
                    <th>Sno</th>
                    <th>Party Name</th>
                    <th>Party Code</th>
                    <th>Div Name</th>
                    <th>Zone Name</th>
                    <th>City Name</th>
                  </tr>
                </thead>
              </table>
            </div>
        </div>
    </div>
</div>
<?php

include '../../includes/security.php';
?>

<script>
  

  $('#voucher_date').on( 'keyup', function( e ) {
    if( e.which == 9 ) {
        $('#company_code').focus();
    }
} );


$(function () {
      $.validator.setDefaults({
        submitHandler: function () {
          // alert( "Form successful submitted!" );
        }
      });
      $('#order_form').validate({
        rules: {
          company_code: {
            required: true,
          },
          purchase_mode: {
            required: true,
          },
          division: {
            required: true,
          },
          from_loc:{
            required: true,
          },
          to_loc:{
            required: true,
          }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
});
$(document).ready(function(){

    $("#voucher_date").focus();
    $("#order_form").on('change', '#voucher_date', function () {
        var date = new Date($('#voucher_date').val());
        var year = date.getFullYear();
        console.log(year);
        $('#year').val(year);
    });
    $("#order_form").on('focus','.rate',function(){
        var button_id = $(this).attr("id");
        if(button_id =='rate'){
        var p_rate_id='';
        }else{
        var p_amountid = button_id.split("e");
        var p_rate_id=p_amountid[1];
        }
        var previous_amount= $('#amount'+p_rate_id).val();
        sessionStorage.setItem("previous_amount", previous_amount);
    });
    $("#order_form").on('change','.rate',function(){
        // $('#disc_m').attr('readonly',false);
        // $('#frt_m').attr('readonly',false);
        // $('#excl_m').attr('readonly',false);
        var previous_amounts=sessionStorage.getItem('previous_amount');
        // var previous_discs=sessionStorage.getItem('previous_disc');
        // var previous_frts=sessionStorage.getItem('previous_frt');
        // console.log(previous_amounts);
        if(previous_amounts == ""){
            previous_amount=0;
        }else{
            previous_amount = previous_amounts.replaceAll(',','');
        }
        var total=$('#total').text();
        console.log(total);
        if(total == '' || total == '0' || total=='0.00'){
            minuss=0;
        }else{
            minus_t = total.replaceAll(',','');
            minuss= parseFloat(minus_t) - parseFloat(previous_amount);
        }
        // if(previous_discs == ""){
        //     previous_disc=0;
        // }else{
        //     previous_disc = previous_discs.replaceAll(',','');
        // }
        // var total_d=$('#disc_t').val();
        // if(total_d == '' || total_d == '0' || total_d=='0.00'){
        //     minuss_d=0;
        // }else{
        //     minus_t_d = total_d.replaceAll(',','');
        //     minuss_d= parseFloat(minus_t_d) - parseFloat(previous_disc);
        //     // console.log(minuss);
        // }

        // if(previous_frts == ""){
        //     previous_frt=0;
        // }else{
        //     previous_frt = previous_frts.replaceAll(',','');
        // }
        // var total_f=$('#frt_t').val();
        // if(total_f == '' || total_f == '0' || total_f=='0.00'){
        //     minuss_f=0;
        // }else{
        //     minus_t_f = total_f.replaceAll(',','');
        //     minuss_f= parseFloat(minus_t_f) - parseFloat(previous_frt);
        //     // console.log(minuss);
        // }


        var button_id = $(this).attr("id");
        if(button_id =='rate'){
            rate_id='';
        }else{
        var rateid = button_id.split("e");
        rate_id=rateid[1];
        }
        var quantity=$('#quantity'+rate_id).val();
        var rate=$('#rate'+rate_id).val();
        if(quantity=='' || quantity=='0' || quantity=='0.00'){
            quantity=0;
            $('#amount'+rate_id).val('');
            // $('#excl'+rate_id).val('');
            $('#total').html(minuss);
            // $('#excl_t').html(minuss);
            
        }else{
            if(rate == "" || rate=='0' || rate=='0.00'){
                // console.log("if");
                $('#amount'+rate_id).val('');
                // $('#excl'+rate_id).val('');
                $('#total').html(minuss);
                pre_rate=0;
                amts=0;
                // $('#excl_t').html(minuss);
                // $('#total').text('');
            }else{
                    pre_rate = rate.replaceAll(',','');
                    var rate=new Intl.NumberFormat(
                    'en-US', { style: 'currency', 
                        currency: 'USD',
                    currencyDisplay: 'narrowSymbol'}).format(pre_rate);
                    var rate=rate.replace(/[$]/g,'');
                    var  show_rate=rate;
                    // console.log(show_rate);
                    $('#rate'+rate_id).val(show_rate);
                    // $('#excl_m'+rate_id).attr('readonly',false);
                    // $('#disc_m'+rate_id).attr('readonly',false);
                    // $('#frt_m'+rate_id).attr('readonly',false);
            }
                var amts=parseFloat(quantity) * parseFloat(pre_rate);
                // console.log(amts)
                var org_amt=new Intl.NumberFormat(
                'en-US', { style: 'currency', 
                currency: 'USD',
                currencyDisplay: 'narrowSymbol'}).format(amts);
                var org_amt=org_amt.replace(/[$]/g,'');
                $('#amount'+rate_id).val(org_amt);
                // $('#excl'+rate_id).val(org_amt);
                var amount=$('#amount'+rate_id).val();
                // console.log(org_amt);
                // if (amount.indexOf(',') > -1) {
                if(amount=='' || amount=='0' || amount=='0.00') {
                    pre_amount=0;
                }else{
                    pre_amount = amount.replaceAll(',','');
                    var amount=new Intl.NumberFormat(
                    'en-US', { style: 'currency', 
                        currency: 'USD',
                    currencyDisplay: 'narrowSymbol'}).format(pre_amount);
                    var amount=amount.replace(/[$]/g,'');
                    var  show_amount=amount;
                }
                var fnf=parseFloat(minuss) +parseFloat(pre_amount);
                var total=new Intl.NumberFormat(
                'en-US', { style: 'currency', 
                currency: 'USD',
                currencyDisplay: 'narrowSymbol'}).format(fnf);
                var total=total.replace(/[$]/g,'');
                // console.log(total);
                $('#total').html(total);
                // $('#excl_t').html(total);
                // $('#amount'+rate_id).val(show_amount);
        }
            // $('#disc_t').html(minuss_d);
            // $('#frt_t').html(minuss_f);
            // $('#disc_m'+rate_id).val('');
            // $('#frt_m'+rate_id).val('');
            // $('#excl_m'+rate_id).val('');
            // $('#disc'+rate_id).val('');
            // $('#frt'+rate_id).val('');
            // $('#excl'+rate_id).val('');
        

    });
    $("#order_form").on('change','#frt_m',function(){
        // var count_main = $('#example1 tr').length;
        // row=count_main - 1;
        var frt_m=$('#frt_m').val();
        var frt_m_fnf=new Intl.NumberFormat(
        'en-US', { style: 'currency', 
            currency: 'USD',
        currencyDisplay: 'narrowSymbol'}).format(frt_m);
        frt_m_fnf=frt_m_fnf.replace(/[$]/g,'');
        $('#frt_m').val(frt_m_fnf);

        var qty=$('#quantity').val();
        // gross_amount = gross_amount.replaceAll(',','');
        var amts=parseFloat(qty) * parseFloat(frt_m);
        // console.log(amts);
        var frt_amt=new Intl.NumberFormat(
        'en-US', { style: 'currency', 
            currency: 'USD',
        currencyDisplay: 'narrowSymbol'}).format(amts);
        frt_amt=frt_amt.replace(/[$]/g,'');
        if(frt_amt == '' || isNaN(frt_amt)){
          frt_amt=='';
        }
        $('#main_tr #frt').val(frt_amt);

        var rate=$('#rate').val();
        rate = rate.replaceAll(',','');
        var excl=parseFloat(rate) - parseFloat(frt_m);
        var excl_m_fnf=new Intl.NumberFormat(
        'en-US', { style: 'currency', 
            currency: 'USD',
        currencyDisplay: 'narrowSymbol'}).format(excl);
        excl_m_fnf=excl_m_fnf.replace(/[$]/g,'');
        $('#frt_m').val(frt_m_fnf);
        $('#frt_m').css('text-align','right');
        $('#frt_m').css('padding','0 1px 0 0');
        if(excl_m_fnf == '' || isNaN(excl_m_fnf)){
          excl_m_fnf=='';
        }
        $('#excl_m').val(excl_m_fnf);
        $('#excl_m').css('text-align','right');
        $('#excl_m').css('padding','0 1px 0 0');
        var amount=$('#amount').val();
        excl_amount = amount.replaceAll(',','');
        var excl=parseFloat(excl_amount) - parseFloat(frt_amt);
        var excl_fnf=new Intl.NumberFormat(
        'en-US', { style: 'currency', 
            currency: 'USD',
        currencyDisplay: 'narrowSymbol'}).format(excl);
        excl_fnf=excl_fnf.replace(/[$]/g,'');
        $('#main_tr #excl').val(excl_fnf);
    });
    $("#order_form").on('focus','.disc_m',function(){
        var button_id = $(this).attr("id");
        if(button_id =='quantity'){
        var p_disc_id='';
        }else{
        var p_amountid = button_id.split("y");
        var p_disc_id=p_amountid[1];
        }
        var previous_excl= $('#excl'+p_disc_id).val();
        sessionStorage.setItem("previous_excl", previous_excl);
        var previous_disc= $('#disc'+p_disc_id).val();
        sessionStorage.setItem("previous_disc", previous_disc);
        var previous_frt= $('#frt'+p_disc_id).val();
        sessionStorage.setItem("previous_frt", previous_frt);
    });
    $("#order_form").on('change','.disc_m',function(){
        var previous_excls=sessionStorage.getItem('previous_excl');
        var previous_discs=sessionStorage.getItem('previous_disc');
        var previous_frts=sessionStorage.getItem('previous_frt');
        // console.log(previous_amounts);
        if(previous_discs == ""){
            previous_disc=0;
        }else{
            previous_disc = previous_discs.replaceAll(',','');
        }
        var disc_t=$('#disc_t').html();
        if(disc_t == '' || disc_t == '0' || disc_t=='0.00'){
            minuss_dt=0;
        }else{
            minus_td = disc_t.replaceAll(',','');
            minuss_dt= parseFloat(minus_td) - parseFloat(previous_disc);
            // console.log(minuss);
        }
        
        var button_id = $(this).attr("id");
        if(button_id =='disc_m'){
            disc_id='';
        }else{
        var discid = button_id.split("_m");
        disc_id=discid[1];
        }
        var disc=$('#disc'+disc_id).val();
        // var count_main = $('#example1 tr').length;
        // row=count_main - 1;
        var disc_m=$('#disc_m').val();
        if(disc_m=='' || disc_m=='0' || disc_m=='0.00'){
            $('#disc_t').html(minuss_dt);
            var disc_fnf=0;
            var disc_cal_fnf='0';
        }else{
            var amount=$('#amount'+disc_id).val();
            amount = amount.replaceAll(',','');
            disc_m = disc_m.replaceAll(',','');
            disc_cal=(parseFloat(disc_m)*parseFloat(amount))/100;
            var disc_cal_fnf=new Intl.NumberFormat(
            'en-US', { style: 'currency', 
                currency: 'USD',
            currencyDisplay: 'narrowSymbol'}).format(disc_cal);
            disc_cal_fnf=disc_cal_fnf.replace(/[$]/g,'');
            var disc_fnf=new Intl.NumberFormat(
            'en-US', { style: 'currency', 
                currency: 'USD',
            currencyDisplay: 'narrowSymbol'}).format(disc_m);
            disc_fnf=disc_fnf.replace(/[$]/g,'');

        }
        $('#disc_m'+disc_id).val(disc_fnf);
        $('#disc'+disc_id).val(disc_cal_fnf);
        $('#disc_m'+disc_id).css('text-align','right');
        $('#disc_m'+disc_id).css('padding','0 1px 0 0');
        $('#disc'+disc_id).css('text-align','right');
        $('#disc'+disc_id).css('padding','0 1px 0 0');

        var disc_t=$('#disc_t').html();
        if(dis_t=='' || dist=='0' || dis_t=='0.00'){
            dis_tot=0;
        }else{

        }
        // var  gross_amount=$('#amount').val();
        // gross_amount = gross_amount.replaceAll(',','');
        // var amts=parseFloat(gross_amount) * parseFloat(disc_m) /100;
        // // console.log(amts);
        // var disc_amt=new Intl.NumberFormat(
        // 'en-US', { style: 'currency', 
        //     currency: 'USD',
        // currencyDisplay: 'narrowSymbol'}).format(amts);
        // disc_amt=disc_amt.replace(/[$]/g,'');
        // $('#main_tr #disc').val(disc_amt);
    });
    $("#order_form").on('focus','.quantity',function(){
        var button_id = $(this).attr("id");
        if(button_id =='quantity'){
        var p_quantity_id='';
        }else{
        var p_amountid = button_id.split("y");
        var p_quantity_id=p_amountid[1];
        }
        var previous_amount= $('#amount'+p_quantity_id).val();
        sessionStorage.setItem("previous_amount", previous_amount);
        var previous_quantity= $('#quantity'+p_quantity_id).val();
        sessionStorage.setItem("previous_qty", previous_quantity);
        var previous_tq= $('#total_q').text();
        sessionStorage.setItem("previous_tq", previous_tq);
    });
    $("#order_form").on('change','.quantity',function(){
        var previous_amounts=sessionStorage.getItem('previous_amount');
        var previous_qtys=sessionStorage.getItem('previous_qty');
        var previous_tq=sessionStorage.getItem('previous_tq');
        // console.log(previous_amounts);
        if(previous_tq == ""){
            previous_tq=0;
        }
        if(previous_amounts == ""){
            previous_amount=0;
        }else{
            previous_amount = previous_amounts.replaceAll(',','');
        }
        if(previous_qtys == ""){
            previous_qty=0;
        }else{
            previous_qty = previous_qtys.replaceAll(',','');
        }
        // var total_q=$('#total_q').val();
        // if(total_q == '' || total_q == '0' || total_q=='0.00'){
        //     minus_t_q=0;
        // }else{
        //     minus_t_q = total_q.replaceAll(',','');
        // }
        minuss_q= parseFloat(previous_tq) - parseFloat(previous_qty);
        console.log(previous_tq);
        console.log(previous_qty);
        console.log(minuss_q);
        var total=$('#total').text();
        if(total == '' || total == '0' || total=='0.00'){
            minuss=0;
        }else{
            minus_t = total.replaceAll(',','');
            minuss= parseFloat(minus_t) - parseFloat(previous_amount);
            // console.log(minuss);
        }
        // console.log(minuss);
        
        // if(previous_discs == ""){
        //     previous_disc=0;
        // }else{
        //     previous_disc = previous_discs.replaceAll(',','');
        // }
        // var total_d=$('#disc_t').val();
        // if(total_d == '' || total_d == '0' || total_d=='0.00'){
        //     minuss_d=0;
        // }else{
        //     minus_t_d = total_d.replaceAll(',','');
        //     minuss_d= parseFloat(minus_t_d) - parseFloat(previous_disc);
        //     // console.log(minuss);
        // }

        // if(previous_frts == ""){
        //     previous_frt=0;
        // }else{
        //     previous_frt = previous_frts.replaceAll(',','');
        // }
        // var total_f=$('#frt_t').val();
        // if(total_f == '' || total_f == '0' || total_f=='0.00'){
        //     minuss_f=0;
        // }else{
        //     minus_t_f = total_f.replaceAll(',','');
        //     minuss_f= parseFloat(minus_t_f) - parseFloat(previous_frt);
        //     // console.log(minuss);
        // }



        var button_id = $(this).attr("id");
        if(button_id =='quantity'){
            quantity_id='';
        }else{
        var quantityid = button_id.split("y");
        quantity_id=quantityid[1];
        }
        var quantity=$('#quantity'+quantity_id).val();
        var rate=$('#rate'+quantity_id).val();
        if(quantity=='' || quantity=='0' || quantity=='0.00'){
            quantity=0;
            $('#amount'+quantity_id).val('');
            // $('#excl'+quantity_id).val('');
            $('#total').html(minuss);
            // $('#excl_t').html(minuss);
            
        }else{
            if(rate == "" || rate=='0' || rate=='0.00'){
                // console.log("if");
                $('#amount'+quantity_id).val('');
                // $('#excl'+quantity_id).val('');
                $('#total').html(minuss);
                pre_rate=0;
                amts=0;
                // $('#excl_t').html(minuss);
                // $('#total').text('');
            }else{
                    pre_rate = rate.replaceAll(',','');
                    var rate=new Intl.NumberFormat(
                    'en-US', { style: 'currency', 
                        currency: 'USD',
                    currencyDisplay: 'narrowSymbol'}).format(pre_rate);
                    var rate=rate.replace(/[$]/g,'');
                    var  show_rate=rate;
                    // console.log(show_rate);
                    $('#rate'+quantity_id).val(show_rate);
                    // $('#excl_m'+quantity_id).attr('readonly',false);
                    // $('#disc_m'+quantity_id).attr('readonly',false);
                    // $('#frt_m'+quantity_id).attr('readonly',false);
            }
                var amts=parseFloat(quantity) * parseFloat(pre_rate);
                // console.log(amts)
                var org_amt=new Intl.NumberFormat(
                'en-US', { style: 'currency', 
                currency: 'USD',
                currencyDisplay: 'narrowSymbol'}).format(amts);
                var org_amt=org_amt.replace(/[$]/g,'');
                $('#amount'+quantity_id).val(org_amt);
                // $('#excl'+quantity_id).val(org_amt);
                var amount=$('#amount'+quantity_id).val();
                // console.log(org_amt);
                // if (amount.indexOf(',') > -1) {
                if(amount=='' || amount=='0' || amount=='0.00') {
                    pre_amount=0;
                }else{
                    pre_amount = amount.replaceAll(',','');
                    var amount=new Intl.NumberFormat(
                    'en-US', { style: 'currency', 
                        currency: 'USD',
                    currencyDisplay: 'narrowSymbol'}).format(pre_amount);
                    var amount=amount.replace(/[$]/g,'');
                    var  show_amount=amount;
                }
                var fnf=parseFloat(minuss) +parseFloat(pre_amount);
                var total=new Intl.NumberFormat(
                'en-US', { style: 'currency', 
                currency: 'USD',
                currencyDisplay: 'narrowSymbol'}).format(fnf);
                var total=total.replace(/[$]/g,'');
                // console.log(total);
                $('#total').html(total);
                // $('#excl_t').html(total);
                // $('#amount'+quantity_id).val(show_amount);
        }
        console.log(quantity);
        // console.log(minuss_q);
        var t_qty=parseInt(quantity)+parseInt(minuss_q);
        $('#total_q').text(t_qty);
        
        // $('#disc_t').html(minuss_d);
        // $('#frt_t').html(minuss_f);
        // $('#disc_m'+rate_id).val('');
        // $('#frt_m'+rate_id).val('');
        // $('#excl_m'+rate_id).val('');
        // $('#disc'+rate_id).val('');
        // $('#frt'+rate_id).val('');


    });
});
$('#view_party').click(function(){
    var party_code=$('#party').val();
    if(party_code !=''){
        // document no dropdown
        $.ajax({
            url: 'api/sales_module/transaction_files/sales_order_api.php',
            type: 'POST',
            data: {action: 'party_detail',party_code:party_code},
            dataType: "json",
            success: function(data){
                // console.log(data);
                $('#name_p').val(data.party_name);
                $('#address_p').val(data.address);
                $('#phone_p').val(data.phone_nos);
                $('#gst_p').val(data.gst);
                $('#ntn_p').val(data.ntn);
                $('#division_p').val(data.division_name);
                $('#city_p').val(data.city_name);
                $('#cr_days').val(data.crdays);
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        });
    }
    $('#PartyFormModel').modal('hide');
});
//select company code
$('#order_form').on('focus','#company_code',function(){
      $('#company_table').dataTable().fnDestroy();
      table = $('#company_table').DataTable({
           dom: 'Bfrtip',
           orderCellsTop: true,
           fixedHeader: true,
           
           buttons: [
               'copy', 'csv', 'excel', 'pdf', 'print',
           ]
        });
        // Setup - add a text input to each footer cell
        // $('#company_table thead tr').clone(true).appendTo( '#company_table thead' );
        $('#company_table thead tr:eq(1) th').each( function (i) {
            var title = $(this).text();
            $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );
            $( 'input', this ).on( 'keyup change', function () {
                if ( table.column(i).search() !== this.value ) {
                    table
                        .column(i)
                        .search( this.value )
                        .draw();
                }
            });
        });
    
    // company code dropdown
    $.ajax({
      url: 'api/setup/chart_of_account/control_account_api.php',
        type: 'POST',
        data: {action: 'company_code'},
        dataType: "json",
        success: function(response){
            // console.log(response);
        table.clear().draw();
        // append data in datatable
        var sno='0';
        for (var i = 0; i < response.length; i++) {
            sno++;
            table.row.add([sno,response[i].co_name,response[i].co_code]);
        }
        table.draw();
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });  
  $('#CompanyFormModel').modal('show');
});
//select div code

$(document).ready(function(){
    
    //get value of company in fields
    $('#company_table').on('click','.even',function(){
        var company_name=$(this).closest('tr').children('td:nth-child(2)').text();
        var company_code=$(this).closest('tr').children('td:nth-child(3)').text();
        // console.log(company_code);
        $('#company_code').val(company_code);
        $('#company_name').val(company_name);
        $("#ajax-loader").show();
        var rowCount = $("#example1 tr").length;
        if(rowCount == 3){
          $('#acc_desc').val('');
          $('#detail').val('');
        //   $('#type').val('');
          $('#memo').val('');
          $('#amount').val('');
          $('#total').val('');
          $('#debit').val('');
          $('#item_div').val('');
                        $('#gen').val('');
                        $('#um').val('');
          $('#from_loc_name').val('');
                        $('#to_loc_name').val('');
                        $('#division_name').val('');
          $('#view_item').css('display','none');
          // $('#view_item').fadeIn("slow");
        }else{
          for(var a=2;a<rowCount -1;a++){
            var d=a-1;
            $('#tr'+d+'').remove(); 
            $('#total').text('0');
            $('#item_div').val('');
                        $('#gen').val('');
                        $('#um').val('');
                        $('#from_loc_name').val('');
                        $('#to_loc_name').val('');
                        $('#division_name').val('');
          }
        }
        $('#CompanyFormModel').modal('hide');
        // $('#CompanyFormModel').modal('show');
        $.ajax({
            url: 'api/setup/gin_api.php',
            type: 'POST',
            data: {action: 'divisioncode'},
            dataType: "json",
            success: function(response){
                $("#ajax-loader").hide();
                console.log(response);
                $('#div').html('');
                $('#div').append('<option value="" selected disabled>Select Division</option>');
                $.each(response, function(key, value){
                    $('#div').append('<option data-name="'+value["div_name"]+'"  data-code='+value["div_code"]+' value='+value["div_code"]+'>'+value["div_code"]+' - '+value["div_name"]+'</option>');
                });
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        }); 
        $.ajax({
            url: 'api/setup/gin_api.php',
            type: 'POST',
            data: {action: 'from_loc'},
            dataType: "json",
            success: function(response){
                $("#ajax-loader").hide();
                console.log(response);
                $('#from_loc').html('');
                $('#from_loc').append('<option value="" selected disabled>Select From Loc</option>');
                $.each(response, function(key, value){
                    $('#from_loc').append('<option data-name="'+value["loc_name"]+'"  data-code='+value["loc_code"]+' value='+value["loc_code"]+'>'+value["loc_code"]+' - '+value["loc_name"]+'</option>');
                });
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        }); 
        $.ajax({
            url: 'api/setup/gin_api.php',
            type: 'POST',
            data: {action: 'from_loc'},
            dataType: "json",
            success: function(response){
                $("#ajax-loader").hide();
                console.log(response);
                $('#to_loc').html('');
                $('#to_loc').append('<option value="" selected disabled>Select To Loc</option>');
                $.each(response, function(key, value){
                    $('#to_loc').append('<option data-name="'+value["loc_name"]+'"  data-code='+value["loc_code"]+' value='+value["loc_code"]+'>'+value["loc_code"]+' - '+value["loc_name"]+'</option>');
                });
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        }); 
          $("#purchase_mode").focus();
    });
    $('#company_table').on('click','.odd',function(){
        var company_name=$(this).closest('tr').children('td:nth-child(2)').text();
        var company_code=$(this).closest('tr').children('td:nth-child(3)').text();
        var from_loc=$('#from_loc').val();
        // console.log(company_code);
        $('#company_code').val(company_code);
        $('#company_name').val(company_name);
        $("#ajax-loader").show();
        var rowCount = $("#example1 tr").length;
        if(rowCount == 3){
          $('#acc_desc').val('');
          $('#detail').val('');
        //   $('#type').val('');
          $('#memo').val('');
          $('#amount').val('');
          $('#total').val('');
          $('#debit').val('');
          $('#item_div').val('');
                        $('#gen').val('');
                        $('#um').val('');
          $('#from_loc_name').val('');
                        $('#to_loc_name').val('');
                        $('#division_name').val('');
          $('#view_item').css('display','none');
          // $('#view_item').fadeIn("slow");
        }else{
          for(var a=2;a<rowCount -1;a++){
            var d=a-1;
            $('#tr'+d+'').remove(); 
            $('#total').text('0');
            $('#item_div').val('');
                        $('#gen').val('');
                        $('#um').val('');
                        $('#from_loc_name').val('');
                        $('#to_loc_name').val('');
                        $('#division_name').val('');
          }
        } 
        $('#CompanyFormModel').modal('hide');
        // $('#CompanyFormModel').modal('show');
        $.ajax({
            url: 'api/setup/gin_api.php',
            type: 'POST',
            data: {action: 'divisioncode'},
            dataType: "json",
            success: function(response){
                $("#ajax-loader").hide();
                console.log(response);
                $('#div').html('');
                $('#div').append('<option value="" selected disabled>Select Division</option>');
                $.each(response, function(key, value){
                    $('#div').append('<option data-name="'+value["div_name"]+'"  data-code='+value["div_code"]+' value='+value["div_code"]+'>'+value["div_code"]+' - '+value["div_name"]+'</option>');
                });
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        }); 
        $.ajax({
            url: 'api/setup/gin_api.php',
            type: 'POST',
            data: {action: 'from_loc'},
            dataType: "json",
            success: function(response){
                $("#ajax-loader").hide();
                console.log(response);
                $('#from_loc').html('');
                $('#from_loc').append('<option value="" selected disabled>Select From Loc</option>');
                $.each(response, function(key, value){
                    $('#from_loc').append('<option data-name="'+value["loc_name"]+'"  data-code='+value["loc_code"]+' value='+value["loc_code"]+'>'+value["loc_code"]+' - '+value["loc_name"]+'</option>');
                });
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        }); 
        $.ajax({
            url: 'api/setup/gin_api.php',
            type: 'POST',
            data: {action: 'from_loc'},
            dataType: "json",
            success: function(response){
                $("#ajax-loader").hide();
                console.log(response);
                $('#to_loc').html('');
                $('#to_loc').append('<option value="" selected disabled>Select To Loc</option>');
                $.each(response, function(key, value){
                    $('#to_loc').append('<option data-name="'+value["loc_name"]+'"  data-code='+value["loc_code"]+' value='+value["loc_code"]+'>'+value["loc_code"]+' - '+value["loc_name"]+'</option>');
                });
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        }); 
          $("#purchase_mode").focus();
    });
    $("#order_form").on('change','#div',function(){
        var dept_name=$('#div').find(':selected').attr("data-name");
        var dept_code=$('#div').find(':selected').attr("data-code");
        console.log(dept_name);
        $('#select2-div-container').html(dept_code);
        $('#division_name').val(dept_name);
    });
    $("#order_form").on('change','#from_loc',function(){
        var dept_name=$('#from_loc').find(':selected').attr("data-name");
        var dept_code=$('#from_loc').find(':selected').attr("data-code");
        console.log(dept_code);
        $('#select2-from_loc-container').html(dept_code);
        $('#from_loc_name').val(dept_name);
        var co_code=$('#company_code').val();
        // ACCOUNT code dropdown
        $.ajax({
            url: 'api/setup/tr_api.php',
            type: 'POST',
            data: {action: 'item_code',company_code:co_code,from_loc:dept_code},
            dataType: "json",
            success: function(response){
                $("#ajax-loader").hide();
                console.log(response);
                $('#order').html('');
                $('#order').append('<option value="" selected disabled>Select Item</option>');
                $.each(response, function(key, value){
                    $('#order').append('<option data-batch="'+value["BATCH_NO"]+'" data-expiry="'+value["EXPIRY_DATE"]+'" data-name="'+value["item_descr"]+'"  data-code='+value["ITEM_CODE"]+' value='+value["ITEM_CODE"]+'>'+value["ITEM_CODE"]+' - '+value["item_descr"]+'</option>');
                });
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        });
    });
    $("#order_form").on('change','#to_loc',function(){
        var dept_name=$('#to_loc').find(':selected').attr("data-name");
        var dept_code=$('#to_loc').find(':selected').attr("data-code");
        console.log(dept_name);
        $('#select2-to_loc-container').html(dept_code);
        $('#to_loc_name').val(dept_name);
    });
    $("#order_form").on('change','#order',function(){
      var account_code=$('#order').find(':selected').attr("data-code");
      console.log(account_code);
      var detail=$('#order').find(':selected').attr("data-name");
      // console.log(detail);
      $('#select2-order-container').html(account_code);
      $('#item_name').val(detail);
    });
    var total_amount=0;
        $("#order_form").on('change','.order',function(){
              var target = event.target || event.srcElement;
              var id = target.id;
              var id = id.split("-");
              id=id[1];
              var id = id.split("order");
              id=id[1];
              if($('#amount'+id).val() != ''){
                var deduct = $('#amount'+id).val()
              }else{
               var deduct = '0';
              }
             
             var total = $('#total').text();
             total=total.replaceAll(',','');  
             deduct=deduct.replaceAll(',','');  
              console.log(total);
             console.log(deduct);
             
              var final_total = parseFloat(total) - parseFloat(deduct);
              var finalformat = new Intl.NumberFormat(
                'en-US', {
                style: 'currency',
                currency: 'USD',
                currencyDisplay: 'narrowSymbol'
                }).format(final_total);


            var formatted1 = finalformat.replace(/[$]/g, '');
              console.log(final_total);
              $('#total').html(formatted1);
             
            
              $('#quantity'+id).val('')
              $('#rate'+id).val('')
              $('#amount'+id).val('')
              // var amountdeduct=$("#amount"+id).val();
              // if(amountdeduct==''){
              //   amountdeduct=0;
              // }
              // console.log(amountdeduct);
              // console.log(total_amount);
              // total_amount=parseFloat(total_amount) - parseFloat(amountdeduct);
              var account_code=$('#order'+id).find(':selected').val();
              // console.log(account_code);
              var batch=$('#order'+id).find(':selected').attr("data-batch");
              var expiry=$('#order'+id).find(':selected').attr("data-expiry");
              var account_code=$('#order'+id).find(':selected').val();
              var detail=$('#order'+id).find(':selected').attr("data-name");
              // console.log(detail);
              $('#select2-order'+id+'-container').html(account_code);
              $('#item_name'+id).val(detail);
              // $('#total').text(total_amount);
              $.ajax({
                  url: 'api/setup/tr_api.php',
                    type: 'POST',
                    data: {action: 'item_values',item_code:account_code},
                    dataType: "json",
                    success: function(data){
                        console.log(data);
                        $('#item_div').val('');
                        $('#gen').val('');
                        $('#um').val('');
                        $('#item_div').val(data.div_name);
                        $('#gen').val(data.gen_name);
                        $('#um').val(data.unit_name);
                    },
                    error: function(error){
                        console.log(error);
                        alert("Contact IT Department");
                    }
              });
              var item_code = $('#order'+id).val();
            //   $.ajax({
            //     url: 'api/setup/tr_api.php',
            //         type: 'POST',
            //         data: {action: 'batch',item_code},
            //         dataType: "json",
            //         success: function(data){
            //             console.log(data);
                        $("#batch_no"+id).val(batch)
                        $("#expiry"+id).val(expiry)
                        
            //         },
            //         error: function(error){
            //             console.log(error);
            //             alert("Contact IT Department");
            //         }
            //   });
        });
});
    

$(document).ready(function(){
    $('.js-example-basic-single').select2();
});
$('#example1').ready(function(){
    $('#item_div').val('');
                        $('#gen').val('');
                        $('#um').val('');
  var i = 0;
  var total_amount = 0;
  $('.add').click(function(){
    var company_code = $('#company_code').val();
    var order_key=$('#po_no').val();
    var order=$('#order').val();
    console.log(order);
      i++;
      var item_name = $('#item_name').val();
      var loc = $("#loc").val();
      var from_loc = $("#from_loc").val();
      var quantity = $("#quantity").val();
      var rate = $("#rate").val();
      var amount = $("#amount").val();
      var batch_no = $("#batch_no").val();
      var expiry = $("#expiry").val();
      
      if(order == null){
          $('#msg').text("item code can't be the null.");
      }else{
          $('#msg').text("");
          
          // values empty
          $("#item_name").val('');
          $("#select2-order-container").html('');
          $("#quantity").val('');
          $("#rate").val('');
          $("#amount").val('');
          $("#batch_no").val('');
          $("#expiry").val('');
          $('#d_items tr:last').before('<tr id="tr'+i+'" class="tr"> <td ><select name="order[]" id = "order'+i+'" class="js-example-basic-single order" style="width:75px;"></select></td> <td ><textarea style="height:35px;background-color:#ccd4e1;width:240px;" rows="1"  tabindex="-1"  name="item_name[]" id = "item_name'+i+'" class="item_name" readonly></textarea></td><td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:135px;" type="number"  name="quantity[]" id="quantity'+i+'" class="quantity"></td>   <td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:135px;" type="text"  name="rate[]" id="rate'+i+'" class="rate"> <td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:150px;background-color:#ccd4e1;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  readonly type="text"  name="amount[]" tabindex="-1" id = "amount'+i+'" class="amount"></td></td>  <td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;background-color:#ccd4e1;width:130px;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text" tabindex="-1"  name="batch_no[]" tabindex="-1" id = "batch_no'+i+'" class="batch_no" readonly></td><td ><textarea  style="height:35px;background-color:#ccd4e1;font-size:12px;width:140px;"  pattern="[a-zA-Z0-9 ,._-]{1,}" type="text"  name="expiry[]" tabindex="-1"  id = "expiry'+i+'" class="expiry" readonly></textarea></td><td><button type = "button" id="'+i+'" class="btn btn-sm btn-danger remove"><b>X<b></button></td></tr>');       
          $.ajax({
            url: 'api/setup/tr_api.php',
            type: 'POST',
            data: {action: 'item_code',from_loc:from_loc,company_code:company_code},
            dataType: "json",
            success: function(response){
                $("#ajax-loader").hide();
                console.log(response);
                $('#order').html('');
                $('#order').append('<option value="" selected disabled>Select Item</option>');
                $.each(response, function(key, value){
                    $('#order').append('<option data-batch="'+value["BATCH_NO"]+'" data-expiry="'+value["EXPIRY_DATE"]+'" data-name="'+value["item_descr"]+'"  data-code='+value["ITEM_CODE"]+' value='+value["ITEM_CODE"]+'>'+value["ITEM_CODE"]+' - '+value["item_descr"]+'</option>');
                });
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
          }); 
            $.ajax({
              url: 'api/setup/tr_api.php',
                    type: 'POST',
                    data: {action: 'item_code',from_loc:from_loc,company_code:company_code},
                    dataType: "json",
                    success: function(response){
                        $("#ajax-loader").hide();
                        // console.log(response);

                        $('#order'+i+'').html('');
                        $('#order'+i+'').select2();
                        $('#order'+i+'').append('<option value="" selected disabled>Select Item</option>');
                        $.each(response, function(key, value){
                            $('#order'+i).append('<option data-batch="'+value["BATCH_NO"]+'" data-expiry="'+value["EXPIRY_DATE"]+'" data-name="'+value["item_descr"]+'"  data-code='+value["ITEM_CODE"]+' value='+value["ITEM_CODE"]+'>'+value["ITEM_CODE"]+' - '+value["item_descr"]+'</option>');
                            if(value["ITEM_CODE"]== order){
                              order= value["ITEM_CODE"];
                              $('#order'+i+' option[value='+order+']').prop("selected", true);
                              $('#item_name'+i+'').val(item_name);
                              $('#quantity'+i+'').val(quantity);
                              $('#rate'+i+'').val(rate);
                              $('#amount'+i+'').val(amount);
                              $('#batch_no'+i+'').val(batch_no);
                              $('#expiry'+i+'').val(expiry);
                              // total_amount = parseFloat(total_amount) + parseFloat(amount);
           
                              // console.log(total_amount);
                            }
                          });
                       
                    },
                    error: function(error){
                        console.log(error);
                        alert("Contact IT Department");
                    }
            }); 

           
                                           
                                           
                                            
                                         
                                            
                                          
                                            
                                            
                                           
           
              
      }  
  });
     
  $('#example1').on('click','.remove', function(){
    $('#item_div').val('');
                        $('#gen').val('');
                        $('#um').val('');
      var button_id = $(this).attr("id");
      var remove_amount = $('#amount'+button_id+'').val();
      remove_amount=remove_amount.replaceAll(',',''); 
      $('#tr'+button_id+'').remove();
      var current_amount = $('#total').text();
      current_amount=current_amount.replaceAll(',',''); 
      //total amount
      var total_amount = parseFloat(current_amount) - parseFloat(remove_amount);
      if(isNaN(total_amount)){
        total_amount='0';
      }else{
        

var finalformat = new Intl.NumberFormat(
        'en-US', {
        style: 'currency',
        currency: 'USD',
        currencyDisplay: 'narrowSymbol'
        }).format(total_amount);

    var formatted1 = finalformat.replace(/[$]/g, '');
        $('#total').text(formatted1);
      }
      

    
  });
});
$('#example1').on('click','.tr',function(){
            var button_id = $(this).attr("id");
            if(button_id == 'main_tr')
            {
                var item_code = $('#order').val();
                console.log(item_code);
                if(item_code == null) {
                    $('#item_div').val('');
                    $('#gen').val('');
                    $('#um').val('');
                    // console.log('avvvvv')
                  
                }
                else { 
                // var order_key = $('#po_name').val();
                // var doc_date = $('#po_date').val();
                var account_code=$('#order').find(':selected').val();
                $.ajax({
                url: 'api/setup/production_api.php',
                    type: 'POST',
                    data: {action: 'item_values',item_code:account_code},
                    dataType: "json",
                    success: function(data){
                        console.log(data);
                        $('#item_div').val('');
                        $('#gen').val('');
                        $('#um').val('');
                        $('#item_div').val(data.div_name);
                        $('#gen').val(data.gen_name);
                        $('#um').val(data.unit_name);
                    },
                    error: function(error){
                        console.log(error);
                        alert("Contact IT Department");
                    }
                  });
                }
            }else{
                var button_id = button_id.split("tr");
                var id = button_id[1];
                console.log(id)
                var account_code=$('#order'+id).find(':selected').val();
                console.log(account_code);
                if(account_code != null){
                  $.ajax({
                  url: 'api/setup/production_api.php',
                    type: 'POST',
                    data: {action: 'item_values',item_code:account_code},
                    dataType: "json",
                    success: function(data){
                        console.log(data);
                        $('#item_div').val('');
                        $('#gen').val('');
                        $('#um').val('');
                        $('#item_div').val(data.div_name);
                        $('#gen').val(data.gen_name);
                        $('#um').val(data.unit_name);
                    },
                    error: function(error){
                        console.log(error);
                        alert("Contact IT Department");
                    }
                });
                }
            }
                
}); 
$("#order_form").on("submit", function (e) {
    if ($("#order_form").valid()) {
        var rowCount = $("#example1 tr").length;
        if(rowCount > 3){
            e.preventDefault();
            var formData = new FormData(this);
            var total=$('#total').text();
          formData.append('total',total);
          formData.append('action','insert');
          $.ajax({
            url: 'api/setup/tr_api.php',
              type: 'POST',
              data: formData,
              contentType: false,
              cache: false,
              processData:false,
              
              success: function(response)
              {
                  $("#ajax-loader").hide();
                  var message = response.message
                  var status = response.status
                  $.ajax({
                      url: "api/message_session/message_session.php",
                      type: 'POST',
                      data: {message:message,status:status},
                      success: function (response) {
                      if(status == 0){
                          $("#msg").html(message);
                      }else{
                          $.get('inventory_management/inventory_local/transfer.php',function(data,status){
                           
                            $('#content').html(data);
                          });
                      }
                      },
                      error: function(e) 
                      {
                      console.log(e);
                      alert("Contact IT Department");
                      }
                  });
              },
              error: function(e) 
              {
                  console.log(e);
                  alert("Contact IT Department");
              } 
          });
            }else{
                $("#msg").html("Click on Insert Row");
            }
        }
});
//validation
// $(function () {
//       $.validator.setDefaults({
//         submitHandler: function () {
//           // alert( "Form successful submitted!" );
//         }
//       });
//       $('#order_form').validate({
//         rules: {
//             company_code: {
//             required: true,
//           },
//           division: {
//             required: true,
//           },
//           party: {
//             required: true,
//           },
//           salesman: {
//             required: true,
//           },
//           doc_no: {
//             required: true,
//           },
//           sale_code: {
//             required: true,
//           },
//           purchase_mode: {
//             required: true,
//           }
//         },
//         errorElement: 'span',
//         errorPlacement: function (error, element) {
//           error.addClass('invalid-feedback');
//           element.closest('.form-group').append(error);
//         },
//         highlight: function (element, errorClass, validClass) {
//           $(element).addClass('is-invalid');
//         },
//         unhighlight: function (element, errorClass, validClass) {
//           $(element).removeClass('is-invalid');
//         }
//       });
// });
// $("#order_form").on('change','#voucher_date',function(){
//   var date = new Date($('#voucher_date').val());
//   var year = date.getFullYear();
//   $('#year').val(year);
//   });
    
// $('#example1').ready(function(){
//   var company_code=$('#company_code').val();
//   //on chAnge company code
//   $("#order_form").on('change','#acc_desc',function(){
//       var account_code=$('#acc_desc').find(':selected').val();
//       // console.log(account_code);
//       var detail=$('#acc_desc').find(':selected').attr("data-name");
//       // console.log(detail);
//       $('#select2-acc_desc-container').html(account_code);
//       $('#detail').val(detail);
//       $('#view_item').css('display','');
//       $('#view_item').fadeIn("slow");
//   });
//   //on chAnge account code
//   $("#order_form").on('change','.acc_desc',function(){
//       var target = event.target || event.srcElement;
//       var id = target.id;
//       var id = id.split("-");
//       id=id[1];
//       var id = id.split("acc_desc");
//       id=id[1];
//       var account_code=$('#acc_desc'+id).find(':selected').val();
//       // console.log(account_code);
//       var detail=$('#acc_desc'+id).find(':selected').attr("data-name");
//       // console.log(detail);
//       $('#select2-acc_desc'+id+'-container').html(account_code);
//       $('#detail'+id).val(detail);
//         $.ajax({
//             url: 'api/sales_module/transaction_files/sales_order_api.php',
//             type: 'POST',
//             data: {action: 'item_detail',item_code:account_code},
//             dataType: "json",
//             success: function(data){
//                 // console.log(data);
//                 $('#division_i').val(data.division_name);
//                 $('#gen_i').val(data.gen_name);
//                 $('#um_i').val(data.unit_name);
//             },
//             error: function(error){
//                 console.log(error);
//                 alert("Contact IT Department");
//             }
//         });
//   });
  
// });
// $('#example1').ready(function(){
//   var i = 0;
//   var total_amount = 0;
//   $('.add').click(function(){
//     var company_code=$('#company_code').val();
//       i++;
//       var acc_desc = $('#acc_desc').val();
//       var detail = $("#detail").val();
//       var type = $("#type").val();
//       var quantity = $("#quantity").val();
//       var rates = $("#rate").val();
//       rate = rates.replaceAll(',','');
//       var amounts = $("#amount").val();
//       amount = amounts.replaceAll(',','');
//       var division_i = $("#division_i").val();
//       var gen_i = $("#gen_i").val();
//       var um_i = $("#um_i").val();
//       if(acc_desc == null){
//           $('#msg').text("Account can't be the null.");
//       }else if(quantity == ""){
//           $('#msg').text("Quantity can't be the null.");
//       }else if(rate == ""){
//           $('#msg').text("Rate can't be the null.");
//       }else if(amount <= 0){
//           $('#msg').text("Amount can't be the null.");
//       }else{
//           $('#msg').text("");
          
//           // values empty
//           $("#amount").val('0');
//           $("#detail").val('');
//           $("#quantity").val('');
//           $("#division_i").val('');
//           $("#gen_i").val('');
//           $("#um_i").val('');
//           $("#rate").val('');
//           $('#d_items tr:last').before('<tr id="tr'+i+'"><td><select name="acc_desc[]" id = "acc_desc'+i+'" class="form-control js-example-basic-single acc_desc" ></td><td><input name="detail[]" id = "detail'+i+'" class="form-control form-control-sm detail" readonly></td><td ><select style="font-size:9px !important;" name="type[]" id = "type'+i+'" class="form-control form-control-sm type"><option value="0" readonly="readonly" selected>Type</option><option value="N">N</option><option value="F">F</option><option value="S">S</option><option value="T">T</option></select></td><td><input type="number" name="quantity[]" id = "quantity'+i+'" class="form-control form-control-sm quantity"></td><td><input type="text" name="rate[]" id = "rate'+i+'"  class="form-control form-control-sm rate"></td><td><input type="text" name="amount[]" id = "amount'+i+'" onchange="total()" class="form-control form-control-sm total" readonly></td><td><input value='+division_i+' type="text" name="division_i[]" id = "division_i'+i+'" class="form-control form-control-sm division_i" readonly></td><td><input value='+gen_i+' type="text" name="gen_i[]" id = "gen_i'+i+'" class="form-control form-control-sm gen_i" readonly></td><td><input value='+um_i+' type="text" name="um_i[]" id = "um_i'+i+'" class="form-control form-control-sm um_i" readonly></td><td><button type = "button" id="'+i+'" class="btn btn-sm btn-danger remove"><b>X<b></button></td></tr>');          
//           $('#type').prop("selectedIndex", 0).val();

//         //   $('#d_items tr:last').before('<tr id="tr'+i+'"><td><select name="acc_desc[]" id = "acc_desc'+i+'" class="form-control js-example-basic-single acc_desc" ></td><td><input name="detail[]" id = "detail'+i+'" class="form-control form-control-sm detail" readonly></td><td ><select style="font-size:12px;" name="type[]" id = "type'+i+'" class="form-control form-control-sm type"><option val="" readonly="readonly" selected></option><option val="N">N</option><option val="F">F</option><option val="S">S</option><option val="T">T</option></select></td><td><input type="number" name="quantity[]" id = "quantity'+i+'" class="form-control form-control-sm quantity"></td><td><input type="text" name="rate[]" id = "rate'+i+'"  class="form-control form-control-sm rate"></td><td><input type="text" name="amount[]" id = "amount'+i+'" onchange="total()" class="form-control form-control-sm total" readonly></td><td><button type = "button" id="'+i+'" class="btn btn-sm btn-danger remove"><b>X<b></button></td></tr>');          
//           // Item code dropdown
//           $.ajax({
//               url: 'api/sales_module/transaction_files/sales_order_api.php',
//               type: 'POST',
//               data: {action: 'item_code',company_code:company_code},
//               dataType: "json",
//               success: function(response){
//                   $('#acc_desc').html('');
//                   $('#acc_desc').append('<option value="" selected disabled>Select Account</option>');
//                   $.each(response, function(key, value){ 
//                     $('#acc_desc').append('<option data-name="'+value["item_descr"]+'"  data-code='+value["item_div"]+' value='+value["item_div"]+'>'+value["item_div"]+' - '+value["item_descr"]+'</option>');
//                   });
//               },
//               error: function(error){
//                   console.log(error);
//                   alert("Contact IT Department");
//               }
//           });  
//                 // ACCOUNT code dropdown
//                 $.ajax({
//                     url: 'api/sales_module/transaction_files/sales_order_api.php',
//                     type: 'POST',
//                     data: {action: 'item_code',company_code:company_code},
//                     dataType: "json",
//                     success: function(response){
//                         $('#acc_desc'+i).html('');
//                         $('#acc_desc'+i).addClass('js-example-basic-single');
//                         $('.js-example-basic-single').select2();
//                         $('#acc_desc'+i).append('<option value="" selected disabled>Select Account</option>');
//                         // var j=1;
//                         $.each(response, function(key, value){
//                             $('#acc_desc'+i).append('<option data-name="'+value["item_descr"]+'"  data-code='+value["item_div"]+' value='+value["item_div"]+'>'+value["item_div"]+' - '+value["item_descr"]+'</option>');
//                             if(value["item_div"]== acc_desc){
//                               acc_desc= value["item_div"];
//                               $('#acc_desc'+i+' option[value='+acc_desc+']').prop("selected", true);
//                             }
//                             // $('#acc_desc').append('<option data-name='+value["DESCR"]+'  data-code='+value["ACCOUNT_CODE"]+' value='+value["ACCOUNT_CODE"]+'>'+value["ACCOUNT_CODE"]+' - '+value["DESCR"]+'</option>');
                            
                            
//                           });
//                     },
//                     error: function(error){
//                         console.log(error);
//                         alert("Contact IT Department");
//                     }
//                 });
//                 //on chAnge account code
//                 $("#transaction_form").on('change','#acc_desc',function(){
//                     var account_code=$('#acc_desc').find(':selected').val();
//                     var detail=$('#acc_desc').find(':selected').attr("data-name");
//                     $('#select2-acc_desc-container').html(account_code);
//                     $('#detail').val(detail);
//                     $('#view_item').css('display','');
//                     $('#view_item').fadeIn("slow");
//                 });
//                 // console.log(type);
//                 if(type=='' || type=='0'){
//                   $('#type'+i+'').prop("selectedIndex", 0).val();
//                 }else{
//                   $('#type'+i+'').val(type);
//                 }
//               $('#detail'+i+'').val(detail);
//               $('#quantity'+i+'').val(quantity);
//               $('#rate'+i+'').val(rates);
//               $('#amount'+i+'').val(amounts);
//             //   $('#disc'+i+'').css('text-align','right');
//             //   $('#disc'+i+'').css('padding','0 1px 0 0');
//             //   $('#frt'+i+'').css('text-align','right');
//             //   $('#frt'+i+'').css('padding','0 1px 0 0');
//             //   $('#excl'+i+'').css('text-align','right');
//             //   $('#excl'+i+'').css('padding','0 1px 0 0');
//               $('#quantity'+i+'').css('text-align','right');
//               $('#quantity'+i+'').css('padding','0 1px 0 0');
//               $('#rate'+i+'').css('text-align','right ');
//               $('#rate'+i+'').css('padding','0 1px 0 0');
//               $('#amount'+i+'').css('text-align','right ');
//               $('#amount'+i+'').css('padding','0 1px 0 0');
              
//       }  
//   });
     
//   $('#example1').on('click','.remove', function(){
//       var button_id = $(this).attr("id");
//       var remove_amount = $('#amount'+button_id+'').val();
//       var disc_rm = $('#disc'+button_id+'').val();
//       var frt_rm = $('#frt'+button_id+'').val();
//       var excl_rm = $('#excl'+button_id+'').val();
//       remove_amount = remove_amount.replaceAll(',','');
//       disc_rm = disc_rm.replaceAll(',','');
//       frt_rm = frt_rm.replaceAll(',','');
//       excl_rm = excl_rm.replaceAll(',','');
//       $('#tr'+button_id+'').remove();
//       //   $('#um').val('');
//       var current_amount = $('#total').text();
//       var current_disc = $('#disc_t').text();
//       var current_frt = $('#frt_t').text();
//       var current_excl = $('#excl_t').text();
//       current_amount = current_amount.replaceAll(',','');
//       current_disc = current_disc.replaceAll(',','');
//       current_frt = current_frt.replaceAll(',','');
//       current_excl = current_excl.replaceAll(',','');
//       //total amount
//       var total_amount = parseFloat(current_amount) - parseFloat(remove_amount);
//       if(isNaN(total_amount)){
//         total_amount='0';
//       }else{
//         total_amount=total_amount.toLocaleString();
//       }
//       $('#total').text(total_amount);

//       //total_disc
//       var total_disc = parseFloat(current_disc) - parseFloat(disc_rm);
//       if(isNaN(total_disc)){
//         total_disc='0';
//       }else{
//         total_disc=total_disc.toLocaleString();
//       }
//       $('#disc_t').text(total_disc);

//       //total_frt
//       var total_frt = parseFloat(current_frt) - parseFloat(frt_rm);
//       if(isNaN(total_frt)){
//         total_frt='0';
//       }else{
//         total_frt=total_frt.toLocaleString();
//       }
//       $('#frt_t').text(total_frt);
      
//       //total_excl
//       var total_excl = parseFloat(current_excl) - parseFloat(excl_rm);
//       if(isNaN(total_excl)){
//         total_excl='0';
//       }else{
//         total_excl=total_excl.toLocaleString();
//       }
//       $('#excl_t').text(total_excl);
//   });
// });
      
// $("#order_form").on("submit", function (e) {
//     if ($("#order_form").valid()) {
//         var rowCount = $("#example1 tr").length;
//         if(rowCount > 3){
//             // var item_code=$('#acc_desc').val();
//             var quantity=$('#quantity').val();
//             var rate=$('#rate').val();
//             var amount=$('#amount').val();
//             if(quantity == '' && rate == '' && amount == '0' || amount=='0.00'){
//                 e.preventDefault();
//                 var formData = new FormData(this); 
//                 var total=$('#total').text();
//                 formData.append('debit',total);
//                 var company_code=$('#company_code').val();
//                 formData.append('company_code',company_code);
//                 formData.append('action','insert');
//                 $.ajax({
//                     url: 'api/sales_module/transaction_files/sales_order_api.php',
//                     type: 'POST',
//                     data: formData,
//                     contentType: false,
//                     cache: false,
//                     processData:false,
                    
//                     success: function(response)
//                     {
//                         $("#ajax-loader").hide();
//                         var message = response.message
//                         var status = response.status
//                         $.ajax({
//                             url: "api/message_session/message_session.php",
//                             type: 'POST',
//                             data: {message:message,status:status},
//                             success: function (response) {
//                             if(status == 0){
//                                 $("#msg").html(message);
//                             }else{
//                                 $.get('sales_module/transaction_files/add_sales_order.php',function(data,status){
                                
//                                     $('#content').html(data);
//                                 });
//                             }
//                             },
//                             error: function(e) 
//                             {
//                             console.log(e);
//                             alert("Contact IT Department");
//                             }
//                         });
//                     },
//                     error: function(e) 
//                     {
//                         console.log(e);
//                         alert("Contact IT Department");
//                     } 
//                 });
//             }else{
//                 $("#msg").html("Click on Add Row otherwise the last Row will not be count");
//             }
//         }else{
//             $("#msg").html("Click on Insert Row");
//         }
//     }
// });




// breadcrumbs
$('#dashboard_breadcrumb').click(function(){
    $.get('dashboard_main/dashboard_main.php',function(data,status){
        $('#content').html(data);
    });
});
$("#il_breadcrumb").on("click", function () {
    $.get('inventory_management/inventory_local/inventory_local.php', function(data,status){
        $("#content").html(data);
    });
});
$("#po_list_breadcrumb").on("click", function () {
    $.get('inventory_management/inventory_local/transfer_list.php', function(data,status){
        $("#content").html(data);
    });
});
$("#add_po_local_breadcrumb").on("click", function () {
    $.get('inventory_management/inventory_local/transfer.php', function(data,status){
        $("#content").html(data);
    });
});
</script>
<?php include '../../includes/loader.php'?>