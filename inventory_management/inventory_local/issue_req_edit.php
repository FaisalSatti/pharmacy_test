<?php
session_start();
?>
<div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Edit Issue Requisition</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="il_breadcrumb"> Inventory Local</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="issue_req_list_breadcrumb"> Issue Requisition List</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="edit_issue_req_local_breadcrumb" disabled>Edit Issue Requisition</button></li>
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
                              <div class="row" style="border:1px solid gray;padding:20px;; border-radius:5px;box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.2), 0 20px 20px 0 rgba(0, 0, 0, 0.19);">
                                <div class="col-lg-12">
                                <style>
body{
form:90%;
} 
.select2-container--default .select2-selection--single{
  width:100% !important
}  
/* select{
width:82% !important;
} */
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
input:focus,select:focus,textarea:focus,.select2-selection:focus{
-moz-box-shadow: 0 0 8px rgba(82,168,236,.6);
box-shadow: 0 0 8px orangered !important;}
input,select,textarea,.select2-selection{
border:1px solid black !important;
}
.input-group-prepend{
/* border-right:2px solid black !important */
}
.select2-hidden-accessible{
border:1px solid black !important;

}
.form-control:focus{
-moz-box-shadow: 0 0 8px rgba(82,168,236,.6);
box-shadow: 0 0 8px orangered !important;
}
input:focus{
-moz-box-shadow: 0 0 8px rgba(82,168,236,.6);
box-shadow: 0 0 8px orangered !important;
}
textarea:focus{
-moz-box-shadow: 0 0 8px rgba(82,168,236,.6);
box-shadow: 0 0 8px orangered !important;
}
.select2-selection{
background-color: #b7edea!important  
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
/* border: 1px solid #dddddd; */
text-align: left;
font-size:15px
}
/* tr:nth-child(even) {
background-color: #dddddd;
} */
/* .select2-container{
width:76% !important;
} */
.amount::placeholder { 
text-align:right !important
}
@media only screen and (min-width: 250px) and (max-width: 350px) {
.select2-container{
width:80% !important;
}
}
@media only screen and (min-width: 350px) and (max-width: 754px) {
.select2-container{
width:85% !important;
}
}
@media screen and (min-width: 766px) and (max-width:994px) {
.select2-container{
/* width:72% !important; */
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
}
.form-group{
margin-bottom:4px !important
}
.modal-backdrop{
display:none;
}
</style>
                                    <div class="row" >
                                        <div class="col-md-2 col-lg-1 form-group">
                                            <label>Doc#:</label> 
                                        </div>
                                        <div class="col-md-4 col-lg-2 form-group">
                                            <!-- <label for="">Document Number :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input tabindex="-1"  style="background-color: #ccd4e1;font-weight:bold;" type="text" name="doc_no" id="doc_no" class="form-control form-control-sm" placeholder="Document No" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-lg-1 form-group">
                                          
                                            <label for="">OrderKey:</label>
                                            </div>
                                        <div class="col-md-4 col-lg-2 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input tabindex="-1" type="text" style="background-color: #ccd4e1;font-weight:bold;" name="order_key" id="order_key" class="form-control form-control-sm" placeholder="ORDER KEY " readonly>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-2 col-lg-1 form-group">
                                            <label>Date:</label> 
                                        </div>
                                        <div class="col-md-4 col-lg-2 form-group">
                                            <!-- <label for=""> Date :</label><span style="color:red;">*</span> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input type="date" name="voucher_date" id="voucher_date" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px"  class="form-control form-control-sm">
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-lg-1 form-group">
                                            <label>Year:</label> 
                                        </div>
                                        <div class="col-md-4 col-lg-2 form-group">
                                            <!-- <label for=""> Date :</label><span style="color:red;">*</span> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input tabindex="-1" type="text" name="voucher_year" style="background-color: #ccd4e1;font-weight:bold;" id="year" readonly class="form-control form-control-sm">
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-lg-1 form-group">
                                            <label>Company:</label> 
                                        </div>
                                        <div class="col-md-4 col-lg-2 form-group">
                                            <!-- <label for="">Company Code :<span style="color:red">*</span></label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                                </div>
                                                <input tabindex="-1" maxlength="30" type="text" style="background-color: #ccd4e1;font-weight:bold;" name="company_code" id="company_code" class="form-control form-control-sm" placeholder="Select Company" readonly>
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-3 form-group">
                                            <!-- <label for="inputCompanyName">Company Name :</label><span style="color:red;">*</span> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input tabindex="-1"  style="background-color: #ccd4e1;font-weight:bold;" type="text" name="company_name" id="company_name" class="form-control form-control-sm" placeholder="Company Name" readonly >
                                            </div>
                                        </div>
                                      
                                        <div class="col-md-2 col-lg-1 form-group">
                                            <label>PO Cat:</label> 
                                        </div>
                                        <div class="col-md-4 col-lg-2 form-group">
                                            <!-- <label for="">PO Catg L/I :<span style="color:red">*</span></label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-list-alt"></i></span>
                                                </div>
                                                                         
                                                <input tabindex="-1"  tabindex="-1" style="background-color: #ccd4e1;font-weight:bold;" type="text" name="po_cat" id="po_cat" class="form-control form-control-sm" placeholder="PURCHASE MODE" readonly >
                                           
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-lg-1 form-group">
                                                 <label>DEPT Ref:</label> 
                                             </div>
                                            <div class="col-md-4 col-lg-2 form-group">
                                            <!-- <label for="">Party Ref :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input  type="text" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px" name="dept_ref" id="dept_ref" class="form-control form-control-sm" placeholder="dept_ref " >
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-lg-1 form-group">
                                            <label> Dept# : </label> 
                                        </div>
                                        <div class="col-md-4 col-lg-2  form-group">
                                            <!-- <label for="">Name :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input tabindex="-1"  style="background-color: #ccd4e1;font-weight:bold;" type="text" name="dept_code" id="dept_code" class="form-control form-control-sm" placeholder="dept_code" readonly >
                                            </div>
                                           
                                        </div>
                                         
                                        <div class="col-md-6 col-lg-3 form-group">
                                            <!-- <label for="">Name :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <textarea tabindex="-1" rows="1" name="dept_name" style="background-color: #ccd4e1;font-weight:bold;" id="dept_name" class="form-control form-control-sm" placeholder="Name" readonly></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-lg-1 form-group">
                                            <label>Division:</label> 
                                        </div>
                                        <div class="col-md-4 col-lg-2 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input tabindex="-1" maxlength="30" type="text" style="background-color: #ccd4e1;font-weight:bold;" name="div_code" id="div_code" class="form-control form-control-sm" placeholder="Title Name" readonly>
                                            </div>
                                        </div>       
                                        <div class="col-md-6 col-lg-3 form-group">
                                            <!-- <label for="">Division Name :</label><span style="color:red;">*</span> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input tabindex="-1"  type="text" name="division_name" style="background-color: #ccd4e1;font-weight:bold;" id="division_name" class="form-control form-control-sm" placeholder="Title Name" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-lg-1 form-group">
                                            <label> Remarks :</label> 
                                        </div>
                                        <div class="col-md-10 col-lg-11  form-group">
                                            <!-- <label for="">Narration :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <textarea rows="1" name="narration" id="narration" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px" class="form-control form-control-sm" placeholder="Remarks" ></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-3 form-group text-center">
                                            <span id="msg3" style="color: red;font-size: 13px;"></span>
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
                                    <br>
                              </div>  
                              <div class="card-body" >
                                  <table id="example1" class="table table-bordered table-striped table-responsive" style="border:1px solid gray;padding:20px;; border-radius:5px;box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.2), 0 20px 20px 0 rgba(0, 0, 0, 0.19);">
                                      <thead>
                                          <tr>
                                              <th>Item Code</th>
                                              <th>Name</th>
                                              
                                              <th>Quantity</th>
                                              <th>Rate</th>
                                              <th>Amount</th>
                                              <th>Div</th>
                                              <th>Gen</th>
                                              <th>UM</th>
                                              <th>Action</th>
                                          </tr>
                                      </thead>
                                      <tbody id="d_items">
                                        <tr id="main_tr">
                                            <td style="width:12%"><select name="" id = "acc_desc" class="js-example-basic-single acc_desc"></select></td>
                                            <td style="width: 13%;"><textarea tabindex="-1" style="height:35px;background-color:#ccd4e1 " rows="1"   name="" id = "detail" placeholder="Item Name" class="detail" readonly></textarea></td>
                                            <td style="width: 8%;"><input  style="text-align:right; padding:0 2px 0 0;width:83px;height:35px" type="number"  name="" id="quantity" placeholder="0" class="quantity"></td>
                                            <td style="width: 10%;"><input  style="text-align:right; padding:0 2px 0 0;width:100px;height:35px"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text" placeholder="0.00" name="" id = "rate" class="rate"></td>
                                            <td style="width: 10%;"><input  tabindex="-1" style="text-align:right; padding:0 2px 0 0;width:100px;height:35px;background-color:#ccd4e1;" placeholder="0.00" pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text" tabindex="-1"  name="" id = "amount" class="amount" readonly></td>
                                            <td style="width: 10%;"><textarea tabindex="-1"  style="width:100px;height:35px;background-color:#ccd4e1;font-size:12px" placeholder="Division name"  type="text"  name="" id = "division_i" class="division_i" readonly></textarea></td>
                                            <td style="width: 10%;"><textarea tabindex="-1"  style="width:100px;height:35px;background-color:#ccd4e1;font-size:12px" placeholder="Generic Name"   tabindex="-1"  type="text"   name="" id = "gen_i" class="gen_i" readonly></textarea></td>
                                            <td style="width: 10%;"><textarea tabindex="-1"  style="width:100px;height:35px;background-color:#ccd4e1;font-size:12px" placeholder="UM Name"  type="text"  name="" id = "um_i" class="um_i" readonly></textarea></td>
                                            <td ><button type = "button" class="btn btn-sm btn-primary add"><i class="fa fa-plus"></i></button></td>
                                        </tr>
                                      </tbody>  
                                      <tr id="last_tr">
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td style="text-align:right;">Total:</td>
                                              <td style="font-weight:bold; text-align: right;" name="total" id="total"><b>0</b></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                          </tr>
                                    </table>

                                  <!-- <table  class="table table-bordered" style="border: 1px solid gray; border-radius: 5px; box-shadow: 0 2px 8px 0 rgba(0, 0, 0, 0), 0 6px 20px 0 rgba(0, 0, 0, 0.29);"> -->
                              <!-- <td><div class="col-sm-12">Lot Code</div></td>
                                          <td><div class=""><input style="text-align:right; padding:0 13px 0 0" type="text"  name="" id="lot_code" class="form-control form-control-sm lot_code" readonly></div></td>
                                          <td colspan = '3'><input style="text-align:right; padding:0 13px 0 0" type="text"  name="" id="lot_name" class="form-control form-control-sm lot_name" readonly></td>
                                          <td style="text-align:right">Cost Rate</td>
                                          <td><input style="text-align:right; padding:0 13px 0 0" type="text"  name="cost_rate" id="cost_rate" class=" col-sm-12 form-control form-control-sm cost_rate" readonly></td>
                                          <td ></td>
                                          <td ></td>
                                          <td>Add - Cartage</td>
                                          <td><input style="text-align:right; padding:0 13px 0 0" type="text"  name="add_cartage" id="add_cartage" class="form-control form-control-sm add_cartage"></td>
                                          <td ></td>
                                        </tr>
                                        <tr>
                                          <td colspan = "5"></td>
                                          <td style="text-align:right">Cost Amount</td>
                                          <td><input style="text-align:right; padding:0 13px 0 0" type="text"  name="cost_amount" id="cost_amount" class="form-control form-control-sm cost_amount" readonly></td>
                                          <td ></td>
                                          <td ></td>
                                          <td>Less - Discount</td>
                                          <td><input style="text-align:right; padding:0 13px 0 0" type="text"  name="less_discount" id="less_discount" class="form-control form-control-sm less_discount"></td>
                                          <td ></td>
                                        </tr>
                                        <tr>
                                          <td colspan = "9"></td>
                                          <td>Net Amount</td>
                                          <td><input style="text-align:right; padding:0 13px 0 0" type="text"  name="net_amount" id="net_amount" class="form-control form-control-sm net_amount" readonly></td>
                                          <td ></td>
                                        </tr> -->
                              <!-- </table> -->
                                <!-- </form> -->
                                      <div style="text-align: center;">
                                          <span id="msg" style="color: red;font-size: 13px;"></span>
                                      </div>
                                      <br>
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
<!-- <div class="modal fade" id="divFormModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select division</h5>
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
</div> -->

<!-- division  form -->
<div class="modal fade" id="DivisionFormModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Division</h5>
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
  
$(document).ready(function(){
  $("#voucher_date").focus();
  $.ajax({
          url: 'api/setup/issue_req_api.php',
          type: 'POST',
          data: {action: 'div_code'},
          dataType: "json",
          success: function(response){
              // $("#ajax-loader").show();
              // console.log(response);
              $('#div_code').html('');
              $('#div_code').append('<option value="" selected disabled>Select Company</option>');
              $.each(response, function(key, value){
                  $('#div_code').append('<option data-name="'+value["DIV_NAME"]+'"  data-code='+value["DIV_CODE"]+' value='+value["DIV_CODE"]+'>'+value["DIV_CODE"]+' - '+value["DIV_NAME"]+'</option>');
              });
          },
          error: function(error){
              console.log(error);
              alert("Contact IT Department");
          }
    });
    $.ajax({
          url: 'api/setup/issue_req_api.php',
          type: 'POST',
          data: {action: 'dept_code'},
          dataType: "json",
          success: function(response){
              // $("#ajax-loader").show();
              // console.log(response);
              $('#dept_code').html('');
              $('#dept_code').append('<option value="" selected disabled>Select Company</option>');
              $.each(response, function(key, value){
                  $('#dept_code').append('<option data-name="'+value["DEPT_NAME"]+'"  data-code='+value["DEPT_CODE"]+' value='+value["DEPT_CODE"]+'>'+value["DEPT_CODE"]+' - '+value["DEPT_NAME"]+'</option>');
              });
          },
          error: function(error){
              console.log(error);
              alert("Contact IT Department");
          }
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

$('#voucher_date').on( 'keyup', function( e ) {
    if( e.which == 9 ) {
        $('#dept_ref').focus();
    }
} );


$(document).ready(function(){
    $('.js-example-basic-single').select2();
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
                $('#name').html(data.party_name);
                $('#address').html(data.address);
                $('#phone').html(data.phone_nos);
                $('#gst').html(data.gst);
                $('#ntn').html(data.ntn);
                $('#division_p').html(data.division_name);
                $('#city_p').html(data.city_name);
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        });
        $('#ViewPartyModal').modal('show');
    }
});
$('#view_item').click(function(){
    var item_code=$('#acc_desc').val();
    if(item_code !=''){
        // document no dropdown
        $.ajax({
            url: 'api/sales_module/transaction_files/sales_order_api.php',
            type: 'POST',
            data: {action: 'item_detail',item_code:item_code},
            dataType: "json",
            success: function(data){
                // console.log(data);
                $('#division_i').html(data.division_name);
                $('#gen_i').html(data.gen_name);
                $('#um_i').html(data.unit_name);
                $('#tp_rate').html(data.trade_price);
                $('#tp_rate2').html(data.tp_rate2);
                $('#gst_per').html(data.tax_rate);
                $('#add_per').html(data.add_rate);
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        });
        $('#ViewItemModal').modal('show');
    }
});

$(document).ready(function(){
  $('.js-example-basic-single').select2();
  var finalrowcount = 0
    var DOC_NO=<?php echo $_GET['DOC_NO'] ?>;
    var CO_CODE=<?php echo $_GET['CO_CODE'] ?>;
    var DOC_TYPE="<?php echo $_GET['DOC_TYPE'] ?>";
    var DOC_DATE="<?php echo $_GET['DOC_DATE'] ?>";
    var DOC_YEAR="<?php echo $_GET['DOC_YEAR'] ?>";
    var PO_CATG="<?php echo $_GET['PO_CATG'] ?>";
    $('#doc_no').val(DOC_NO);
    $('#company_code').val(CO_CODE);
    $('#voucher_date').val(DOC_DATE);
    $.ajax({
      url: 'api/setup/issue_req_api.php',
      type: 'POST',
      data:{action:'mst_data',CO_CODE:CO_CODE,DOC_NO:DOC_NO,DOC_TYPE:DOC_TYPE,DOC_DATE:DOC_DATE,DOC_YEAR:DOC_YEAR,PO_CATG:PO_CATG},
      dataType: "json",
      success: function(data){
        console.log(data);
        
          $('#company_name').val(data.company_name);
          $('#order_key').val(data.ORDER_KEY);
          $('#year').val(data.DOC_YEAR);
          $('#po_cat').val(data.PO_CATG);
          $('#dept_ref').val(data.REFNUM);
          $('#dept_code').val(data.DEPT_CODE);
          $('#dept_name').val(data.dept_name);
          $('#div_code').val(data.DIV_CODE);
          $('#division_name').val(data.division_name);
          $('#narration').val(data.REMARKS);
          $('#division_name').val(data.division);
          var company_code = data.CO_CODE;
          
            var company_code=data.CO_CODE;
            var DOC_DATE=data.DOC_DATE;
            var DOC_YEAR=data.DOC_YEAR;
            var DOC_TYPE=data.DOC_TYPE;
            var DOC_NO=data.DOC_NO;
            var ORDER_KEY=data.ORDER_KEY;
          $.ajax({
            url: 'api/setup/issue_req_api.php',
                type: 'POST',
                data: {action: 'calculations2',company_code:company_code,DOC_DATE:DOC_DATE,DOC_YEAR:DOC_YEAR,DOC_TYPE:DOC_TYPE,DOC_NO:DOC_NO,ORDER_KEY:ORDER_KEY},
                dataType: "json",
                async:false,
                success: function(data){
                  // var test = data.length;
                    
                    console.log(data);
                    var total_amount=0;
                    var total_q=0;
                    var j=1;
                    var k=0;
                    if(data.length >= 1){
                            for(var i=1;i<=data.length;i++){
                              finalrowcount = i;
                        // var PO_NO=data[fd].PO_NO;
                        // var GRN_KEY=data[fd].GRN_KEY;
                        // var ITEM_CODE=data[fd].ITEM_CODE;
                        // var ITEM_NAME=data[fd].ITEM_DESCR;
                        // var PRODUCT_CODE=data[fd].PRODUCT_CODE;
                        // var ITEM_DETAIL=data[fd].ITEM_DETAIL;
                        // var QTY=data[fd].QTY;
                        // var RATE=data[fd].RATE;
                        // // // console.log(AMT);
                        // var AMT=data[fd].AMT;
                        // var BILLED=data[fd].BILLED;
                    
                        $('#d_items tr:last').before('<tr id="tr'+i+'"><td style="width:12%"><select name="acc_desc[]" id = "acc_desc'+i+'" class="js-example-basic-single acc_desc"></select></td><td style="width: 13%;"><textarea style="height:35px;background-color:#ccd4e1 " rows="1"  tabindex="-1" name="detail[]" id = "detail'+i+'" class="detail" readonly></textarea></td>  <td style="width: 8%;"><input  style="text-align:right; padding:0 2px 0 0;width:83px;height:35px" type="number"  name="quantity[]" id="quantity'+i+'" class="quantity"></td> <td style="width: 10%;"><input  style="text-align:right; padding:0 2px 0 0;width:100px;height:35px"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="rate[]" id = "rate'+i+'" class="rate"></td><td style="width: 10%;"><input  style="text-align:right; padding:0 2px 0 0;width:100px;height:35px;background-color:#ccd4e1"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text" tabindex="-1"  name="amount[]" id = "amount'+i+'" class="amount" readonly></td><td style="width: 10%;"><textarea  style="width:100px;height:35px;background-color:#ccd4e1;font-size:12px"   type="text"  tabindex="-1" name="division_i[]" id = "division_i'+i+'" class="division_i" readonly></textarea></td><td style="width: 10%;"><textarea  style="width:100px;height:35px;background-color:#ccd4e1;font-size:12px"   tabindex="-1"  type="text" tabindex="-1"  name="gen_i[]" id = "gen_i'+i+'" class="gen_i" readonly></textarea></td>  <td style="width: 10%;"><textarea  style="width:100px;height:35px;background-color:#ccd4e1;font-size:12px"   type="text" tabindex="-1" name="um_i[]" id = "um_i'+i+'" class="um_i" readonly></textarea></td> <td ><button type = "button" id="'+i+'" class="btn btn-sm btn-danger remove"><b>X<b></button></td></tr>');
                      
                            $.ajax({
                              url: 'api/setup/issue_req_api.php',
                              type: 'POST',
                              data: {action: 'item_code',company_code:company_code},
                              dataType: "json",
                              success: function(response){
                                  $("#ajax-loader").hide();
                                  // console.log(response);
                                  $('#acc_desc'+j).addClass('js-example-basic-single');
                                  $('.js-example-basic-single').select2();
                                  $('#acc_desc'+j).append('<option value="" selected disabled>Select Account</option>');
                                  $.each(response, function(key, value){
                                       $('#acc_desc'+j).append('<option data-name="'+value["item_descr"]+'"  data-code='+value["item_div"]+' value='+value["item_div"]+'>'+value["item_div"]+' - '+value["item_descr"]+'</option>');
                                     });
                                  $('#acc_desc'+j).val(data[k].ITEM_CODE);
                                    var ITEM_CODE=$('#acc_desc'+j).find(':selected').val();
                                    var detail=$('#acc_desc'+j).find(':selected').attr("data-name");
                                    $('#select2-acc_desc'+j+'-container').html(ITEM_CODE);
                                    $('#detail'+j).val(detail);
                                    $('#quantity'+j).val(data[k].QTY);
                                    var rate = data[k].RATE;
                                    var finalformatrates = new Intl.NumberFormat(
                                      'en-US', {
                                      style: 'currency',
                                      currency: 'USD',
                                      currencyDisplay: 'narrowSymbol'
                                      }).format(rate);

                                   rate = finalformatrates.replace(/[$]/g, '');


                                    $('#rate'+j).val(rate);
                                    var amt = data[k].AMT;
                                    var finalformatamts = new Intl.NumberFormat(
                                    'en-US', {
                                    style: 'currency',
                                    currency: 'USD',
                                    currencyDisplay: 'narrowSymbol'
                                    }).format(amt);

                                  amt = finalformatamts.replace(/[$]/g, '');


                                    $('#amount'+j).val(amt);
                                    $('#division_i'+j).val(data[k].div_name);
                                    $('#gen_i'+j).val(data[k].gen_name);
                                    $('#um_i'+j).val(data[k].unit_name);
                                    var amt1=data[k].AMT;
                                    total_amount=parseFloat(total_amount)+parseFloat(amt1);
                                    var formattotal_amount = new Intl.NumberFormat(
                                    'en-US', {
                                    style: 'currency',
                                    currency: 'USD',
                                    currencyDisplay: 'narrowSymbol'
                                    }).format(total_amount);

                                  var total_amount2 = formattotal_amount.replace(/[$]/g, '');


                                    $('#total').text(total_amount2);

                                    var quant=data[k].QTY;
                                    total_q=parseFloat(total_q)+parseFloat(quant);
                                    var finalformattotal_q = new Intl.NumberFormat(
                                    'en-US', {
                                    style: 'currency',
                                    currency: 'USD',
                                    currencyDisplay: 'narrowSymbol'
                                    }).format(total_q);

                                    total_q = finalformattotal_q.replace(/[$]/g, '');
                                    $('#total_q').text(total_q);

                            //         // quantity
                            // var total_quantity=parseFloat(data[k].QTY)+parseFloat(total_quantity);
                            // console.log(total_quantity);
                            // var total_quantity_formatted=new Intl.NumberFormat(
                            //     'en-US', { style: 'currency', 
                            //         currency: 'USD',
                            //         currencyDisplay: 'narrowSymbol'}).format(total_quantity);
                            // var total_quantity_formatted=total_quantity_formatted.replace(/[$]/g,'');   

                            // $('#total_q').text(total_quantity_formatted);


                                    k++;
                                    j=j+1;
                              },
                              
                              error: function(error){
                                  console.log(error);
                                  alert("Contact IT Department");
                              }
                             
                            });



                            

                          }
                        // $('#orderno'+i).val(PO_NO);
                        // $('#grnno'+i).val(GRN_KEY);
                        // $('#item_code'+i).val(ITEM_CODE);
                        // $('#item_name'+i).val(ITEM_NAME);
                        // $('#product'+i).val(PRODUCT_CODE);
                        // $('#item_dtl'+i).val(ITEM_DETAIL);
                        // $('#quantity'+i).val(QTY);
                        // $('#rate'+i).val(RATE);
                        // $('#amt'+i).val(AMT);
                        // $('#billed'+i).val(BILLED);
                        
                       
                        // Total = Total + parseFloat(AMT);
                        // // console.log(Total);
                        // var finalformat = new Intl.NumberFormat(
                        //     'en-US', {
                        //     style: 'currency',
                        //     currency: 'USD',
                        //     currencyDisplay: 'narrowSymbol'
                        //     }).format(Total);
                        // var formatted1 = finalformat.replace(/[$]/g, '');
                        // $('#total').html(formatted1);
                        
                        // $('#total').html(Total);

                    }
                
                },
                error: function(error){
                    console.log(error);
                    alert("Contact IT Department");
                }
          });
        }
    });
                      setTimeout(function (){
                                  // var dept_name=$('#dept_code').find(':selected').attr("data-name");
                                  // var dept_code=$('#dept_code').find(':selected').attr("data-code");
                                  // // console.log($('#select2-charge_code-container'));
                                  // $('#select2-dept_code-container').html(dept_code);
                                  // $('#dept_name').val(dept_name);
                                  // var div_name=$('#div_code').find(':selected').attr("data-name");
                                  // var div_code=$('#div_code').find(':selected').attr("data-code");
                                  // // console.log($('#select2-charge_code-container'));
                                  // $('#select2-div_code-container').html(div_code);
                                  // $('#division_name').val(div_name);
                                // var frt_code=$('#frt_code').find(':selected').attr("data-code");
                                // var FRT_NAME=$('#frt_code').find(':selected').attr("data-name");
                                // $('#select2-frt_code-container').html(frt_code);
                                // $('#frt_name').val(FRT_NAME);
                                // var disc_code=$('#disc_code').find(':selected').val();
                                // var DISC_NAME=$('#disc_code').find(':selected').attr("data-name");
                                // console.log(disc_code);
                                // $('#select2-disc_code-container').html(disc_code);
                                // $('#disc_name').val(DISC_NAME);
                                
                                // var dept1=$('#dept1').find(':selected').val();
                                // var dept_name=$('#dept1').find(':selected').attr("data-name");
                                // $('#select2-dept1-container').html(dept2);
                                // $('#dept_amt1').val(dept_name);
                               
                                // var dept2=$('#dept2').find(':selected').val();
                                // var dept_name=$('#dept2').find(':selected').attr("data-name");
                                // $('#select2-dept2-container').html(dept2);
                                // $('#dept_amt2').val(dept_name);
                               
                                // var dept3=$('#dept3').find(':selected').val();
                                // var dept_name=$('#dept3').find(':selected').attr("data-name");
                                // $('#select2-dept3-container').html(dept3);
                                // $('#dept_amt3').val(dept_name);
                                
                    }, 1000); 
                    $('.add').click(function(){
    var i = finalrowcount;
    var total_amount = 0;
    var company_code=$('#company_code').val();
      i++;
      var acc_desc = $('#acc_desc').val();
      var detail = $("#detail").val();
      var type = $("#type").val();
      var quantity = $("#quantity").val();
      var rates = $("#rate").val();
      rate = rates.replaceAll(',','');
      var amounts = $("#amount").val();
      amount = amounts.replaceAll(',','');
      var division_i = $("#division_i").val();
      var gen_i = $("#gen_i").val();
      var um_i = $("#um_i").val();
      if(acc_desc == null){
          $('#msg').text("Account can't be the null.");
      }else if(quantity == ""){
          $('#msg').text("Quantity can't be the null.");
      }else if(rate == ""){
          $('#msg').text("Rate can't be the null.");
      }else if(amount <= 0){
          $('#msg').text("Amount can't be the null.");
      }else{
          $('#msg').text("");
          
          // values empty
          $("#amount").val('0');
          $("#detail").val('');
          $("#quantity").val('');
          $("#division_i").val('');
          $("#gen_i").val('');
          $("#um_i").val('');
          $("#rate").val('');
          $('#d_items tr:last').before('<tr id="tr'+i+'"><td style="width:12%"><select name="acc_desc[]" id = "acc_desc'+i+'" class="js-example-basic-single acc_desc"></select></td><td style="width: 13%;"><textarea style="height:35px;background-color:#ccd4e1 " rows="1"   name="detail[]" id = "detail'+i+'" class="detail" readonly></textarea></td>  <td style="width: 8%;"><input  style="text-align:right; padding:0 2px 0 0;width:83px;height:35px" type="number"  name="quantity[]" id="quantity'+i+'" class="quantity"></td> <td style="width: 10%;"><input  style="text-align:right; padding:0 2px 0 0;width:100px;height:35px"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="rate[]" id = "rate'+i+'" class="rate"></td><td style="width: 10%;"><input  style="text-align:right; padding:0 2px 0 0;width:100px;height:35px;background-color:#b7edea"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text" tabindex="-1"  name="amount[]" id = "amount'+i+'" class="amount" readonly></td><td style="width: 10%;"><textarea  style="width:100px;height:35px;background-color:#ccd4e1;font-size:12px"   type="text"  name="division_i[]" id = "division_i'+i+'" class="division_i" readonly></textarea></td><td style="width: 10%;"><textarea  style="width:100px;height:35px;background-color:#ccd4e1;font-size:12px"   tabindex="-1"  type="text"   name="gen_i[]" id = "gen_i'+i+'" class="gen_i" readonly></textarea></td>  <td style="width: 10%;"><textarea  style="width:100px;height:35px;background-color:#ccd4e1;font-size:12px"   type="text"  name="um_i[]" id = "um_i'+i+'" class="um_i" readonly></textarea></td> <td ><button type = "button" id="'+i+'" class="btn btn-sm btn-danger remove"><b>X<b></button></td></tr>');
                      

        //   $('#d_items tr:last').before('<tr id="tr'+i+'"><td><select name="acc_desc[]" id = "acc_desc'+i+'" class="form-control js-example-basic-single acc_desc" ></td><td><input name="detail[]" id = "detail'+i+'" class="form-control form-control-sm detail" readonly></td><td ><select style="font-size:12px;" name="type[]" id = "type'+i+'" class="form-control form-control-sm type"><option val="" readonly="readonly" selected></option><option val="N">N</option><option val="F">F</option><option val="S">S</option><option val="T">T</option></select></td><td><input type="number" name="quantity[]" id = "quantity'+i+'" class="form-control form-control-sm quantity"></td><td><input type="text" name="rate[]" id = "rate'+i+'"  class="form-control form-control-sm rate"></td><td><input type="text" name="amount[]" id = "amount'+i+'" onchange="total()" class="form-control form-control-sm total" readonly></td><td><button type = "button" id="'+i+'" class="btn btn-sm btn-danger remove"><b>X<b></button></td></tr>');          
          // Item code dropdown
          $.ajax({
              url: 'api/sales_module/transaction_files/sales_order_api.php',
              type: 'POST',
              data: {action: 'item_code',company_code:company_code},
              dataType: "json",
              success: function(response){
                  $('#acc_desc').html('');
                  $('#acc_desc').append('<option value="" selected disabled>Select Account</option>');
                  $.each(response, function(key, value){ 
                    $('#acc_desc').append('<option data-name="'+value["item_descr"]+'"  data-code='+value["item_div"]+' value='+value["item_div"]+'>'+value["item_div"]+' - '+value["item_descr"]+'</option>');
                  });
              },
              error: function(error){
                  console.log(error);
                  alert("Contact IT Department");
              }
          });  
                // ACCOUNT code dropdown
                $.ajax({
                    url: 'api/sales_module/transaction_files/sales_order_api.php',
                    type: 'POST',
                    data: {action: 'item_code',company_code:company_code},
                    dataType: "json",
                    success: function(response){
                        $('#acc_desc'+i).html('');
                        $('#acc_desc'+i).addClass('js-example-basic-single');
                        $('.js-example-basic-single').select2();
                        $('#acc_desc'+i).append('<option value="" selected disabled>Select Account</option>');
                        // var j=1;
                        $.each(response, function(key, value){
                            $('#acc_desc'+i).append('<option data-name="'+value["item_descr"]+'"  data-code='+value["item_div"]+' value='+value["item_div"]+'>'+value["item_div"]+' - '+value["item_descr"]+'</option>');
                            if(value["item_div"]== acc_desc){
                              acc_desc= value["item_div"];
                              $('#acc_desc'+i+' option[value='+acc_desc+']').prop("selected", true);
                            }
                            // $('#acc_desc').append('<option data-name='+value["DESCR"]+'  data-code='+value["ACCOUNT_CODE"]+' value='+value["ACCOUNT_CODE"]+'>'+value["ACCOUNT_CODE"]+' - '+value["DESCR"]+'</option>');
                            
                            
                          });
                    },
                    error: function(error){
                        console.log(error);
                        alert("Contact IT Department");
                    }
                });
                //on chAnge account code
                $("#transaction_form").on('change','#acc_desc',function(){
                    var account_code=$('#acc_desc').find(':selected').val();
                    var detail=$('#acc_desc').find(':selected').attr("data-name");
                    $('#select2-acc_desc-container').html(account_code);
                    $('#detail').val(detail);
                    $('#view_item').css('display','');
                    $('#view_item').fadeIn("slow");
                });
                // console.log(type);
                if(type=='' || type=='0'){
                  $('#type'+i+'').prop("selectedIndex", 0).val();
                }else{
                  $('#type'+i+'').val(type);
                }
              $('#detail'+i+'').val(detail);
              $('#quantity'+i+'').val(quantity);
              $('#rate'+i+'').val(rates);
              $('#amount'+i+'').val(amounts);
              $('#division_i'+i+'').val(division_i);
              $('#gen_i'+i+'').val(gen_i);
              $('#um_i'+i+'').val(um_i);
              
            //   $('#disc'+i+'').css('text-align','right');
            //   $('#disc'+i+'').css('padding','0 1px 0 0');
            //   $('#frt'+i+'').css('text-align','right');
            //   $('#frt'+i+'').css('padding','0 1px 0 0');
            //   $('#excl'+i+'').css('text-align','right');
            //   $('#excl'+i+'').css('padding','0 1px 0 0');
              $('#quantity'+i+'').css('text-align','right');
              $('#quantity'+i+'').css('padding','0 1px 0 0');
              $('#rate'+i+'').css('text-align','right ');
              $('#rate'+i+'').css('padding','0 1px 0 0');
              $('#amount'+i+'').css('text-align','right ');
              $('#amount'+i+'').css('padding','0 1px 0 0');
              
      }  
  });
    

});
$(document).ready(function(){
  var company_code=$('#company_code').val();
  $.ajax({
      url: 'api/setup/issue_req_api.php',
      type: 'POST',
      data: {action: 'item_code',company_code:company_code},
      dataType: "json",
      success: function(response){
          $("#ajax-loader").hide();
          // console.log(response);
          $('#acc_desc').addClass('js-example-basic-single');
          $('.js-example-basic-single').select2();
          $('#acc_desc').append('<option value="" selected disabled>Select Account</option>');
          $.each(response, function(key, value){
                $('#acc_desc').append('<option data-name="'+value["item_descr"]+'"  data-code='+value["item_div"]+' value='+value["item_div"]+'>'+value["item_div"]+' - '+value["item_descr"]+'</option>');
              });
         
      },
      
      error: function(error){
          console.log(error);
          alert("Contact IT Department");
      }
      
    });


});
$("#order_form").on("submit", function (e) {
    if ($("#order_form").valid()) {
        var rowCount = $("#example1 tr").length;
        if(rowCount > 3){
            e.preventDefault();
          
          var formData = new FormData(this);
         
          formData.append('action','update');
          $.ajax({
            url: 'api/setup/issue_req_api.php',
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
                          $.get('inventory_management/inventory_local/issue_requisition.php',function(data,status){
                           
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
//select company code
$('#order_form').on('click','#party',function(){
    var company_code=$('#company_code').val();
    if(company_code != ''){
        $('#party_table').dataTable().fnDestroy();
        table = $('#party_table').DataTable({
            dom: 'Bfrtip',
            orderCellsTop: true,
            fixedHeader: true,
            
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print',
            ]
        });
        // Setup - add a text input to each footer cell
        // $('#party_table thead tr').clone(true).appendTo( '#party_table thead' );
        $('#party_table thead tr:eq(1) th').each( function (i) {
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
        // party code dropdown
        $.ajax({
            url: 'api/sales_module/transaction_files/sales_order_api.php',
            type: 'POST',
            data: {action: 'party_code',company_code:company_code},
            dataType: "json",
            success: function(response){
                // console.log(response);
            table.clear().draw();
            // append data in datatable
            var sno='0';
            for (var i = 0; i < response.length; i++) {
                sno++;
                table.row.add([sno,response[i].party_name,response[i].party_div,response[i].div_name,response[i].zone_name,response[i].city_name]);
           
            }
            table.draw();
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        });  
        $('#PartyFormModel').modal('show');
        
    }
});
//get value of company in fields
$('#party_table').on('click','.even',function(){
    // var party_name=$(this).closest('tr').children('td:nth-child(2)').text();
    var party_code=$(this).closest('tr').children('td:nth-child(3)').text();
    $('#party').val(party_code);
    if(party_code !=''){
        // document no dropdown
        $.ajax({
            url: 'api/sales_module/transaction_files/sales_order_api.php',
            type: 'POST',
            data: {action: 'party_detail',party_code:party_code},
            dataType: "json",
            success: function(data){
                console.log(data);
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
$('#party_table').on('click','.odd',function(){
    // var party_name=$(this).closest('tr').children('td:nth-child(2)').text();
    var party_code=$(this).closest('tr').children('td:nth-child(3)').text();
    $('#party').val(party_code);
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
// $('#order_form').on('click','#company_code',function(){
//       $('#company_table').dataTable().fnDestroy();
//       table = $('#company_table').DataTable({
//            dom: 'Bfrtip',
//            orderCellsTop: true,
//            fixedHeader: true,
           
//            buttons: [
//                'copy', 'csv', 'excel', 'pdf', 'print',
//            ]
//         });
//         // Setup - add a text input to each footer cell
//         // $('#company_table thead tr').clone(true).appendTo( '#company_table thead' );
//         $('#company_table thead tr:eq(1) th').each( function (i) {
//             var title = $(this).text();
//             $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );
//             $( 'input', this ).on( 'keyup change', function () {
//                 if ( table.column(i).search() !== this.value ) {
//                     table
//                         .column(i)
//                         .search( this.value )
//                         .draw();
//                 }
//             });
//         });
    
//     // company code dropdown
//     $.ajax({
//       url: 'api/setup/chart_of_account/control_account_api.php',
//         type: 'POST',
//         data: {action: 'company_code'},
//         dataType: "json",
//         success: function(response){
//             // console.log(response);
//         table.clear().draw();
//         // append data in datatable
//         var sno='0';
//         for (var i = 0; i < response.length; i++) {
//             sno++;
//             table.row.add([sno,response[i].co_name,response[i].co_code]);
//         }
//         table.draw();
//         },
//         error: function(error){
//             console.log(error);
//             alert("Contact IT Department");
//         }
//     });  
//   $('#CompanyFormModel').modal('show');
// });
// $('#order_form').on('click','#division',function(){
//       $('#company_table').dataTable().fnDestroy();
//       table = $('#company_table').DataTable({
//            dom: 'Bfrtip',
//            orderCellsTop: true,
//            fixedHeader: true,
           
//            buttons: [
//                'copy', 'csv', 'excel', 'pdf', 'print',
//            ]
//         });
//         // Setup - add a text input to each footer cell
//         // $('#company_table thead tr').clone(true).appendTo( '#company_table thead' );
//         $('#company_table thead tr:eq(1) th').each( function (i) {
//             var title = $(this).text();
//             $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );
//             $( 'input', this ).on( 'keyup change', function () {
//                 if ( table.column(i).search() !== this.value ) {
//                     table
//                         .column(i)
//                         .search( this.value )
//                         .draw();
//                 }
//             });
//         });
    
//     // company code dropdown
//     $.ajax({
//       url: 'api/setup/issue_req_api.php',
//         type: 'POST',
//         data: {action: 'div_code'},
//         dataType: "json",
//         success: function(response){
//             console.log(response);
//         table.clear().draw();
//         // append data in datatable
//         var sno='0';
//         for (var i = 0; i < response.length; i++) {
//             sno++;
//             table.row.add([sno,response[i].DIV_CODE,response[i].DIV_NAME]);
//         }
//         table.draw();
//         },
//         error: function(error){
//             console.log(error);
//             alert("Contact IT Department");
//         }
//     });  
//   $('#divFormModel').modal('show');
// });
//select company code
$('#order_form').on('click','#salesman',function(){
      $('#salesman_table').dataTable().fnDestroy();
      table = $('#salesman_table').DataTable({
           dom: 'Bfrtip',
           orderCellsTop: true,
           fixedHeader: true,
           
           buttons: [
               'copy', 'csv', 'excel', 'pdf', 'print',
           ]
        });
        // Setup - add a text input to each footer cell
        // $('#salesman_table thead tr').clone(true).appendTo( '#salesman_table thead' );
        $('#salesman_table thead tr:eq(1) th').each( function (i) {
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
    
    // salesman code dropdown
    $.ajax({
      url: 'api/setup/party_api.php',
        type: 'POST',
        data: {action: 'salesman_code'},
        dataType: "json",
        success: function(response){
            // console.log(response);
        table.clear().draw();
        // append data in datatable
        var sno='0';
        for (var i = 0; i < response.length; i++) {
            sno++;
            table.row.add([sno,response[i].sman_name,response[i].sman_code]);
        }
        table.draw();
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });  
  $('#SalesmanFormModel').modal('show');
});
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
          $('#view_item').css('display','none');
          // $('#view_item').fadeIn("slow");
        }else{
          for(var a=2;a<rowCount -1;a++){
            var d=a-1;
            $('#tr'+d+'').remove(); 
            $('#total').text('0');
          }
        }
        // ACCOUNT code dropdown
        $.ajax({
            url: 'api/setup/issue_req_api.php',
            type: 'POST',
            data: {action: 'item_code',company_code:company_code},
            dataType: "json",
            success: function(response){
                $("#ajax-loader").hide();
                // console.log(response);
                $('#acc_desc').html('');
                $('#acc_desc').append('<option value="" selected disabled>Select Item</option>');
                $.each(response, function(key, value){
                    $('#acc_desc').append('<option data-name="'+value["item_descr"]+'"  data-code='+value["item_div"]+' value='+value["item_div"]+'>'+value["item_div"]+' - '+value["item_descr"]+'</option>');
                });
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        }); 
        $('#CompanyFormModel').modal('hide');
        // $('#CompanyFormModel').modal('show');
    });
        
    $('#company_table').on('click','.odd',function(){
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
          $('#view_item').css('display','none');
          // $('#view_item').fadeIn("slow");
        }else{
          for(var a=2;a<rowCount -1;a++){
            var d=a-1;
            $('#tr'+d+'').remove(); 
            $('#total').text('0');
          }
        }
        // ACCOUNT code dropdown
        $.ajax({
            url: 'api/setup/issue_req_api.php',
            type: 'POST',
            data: {action: 'item_code',company_code:company_code},
            dataType: "json",
            success: function(response){
                $("#ajax-loader").hide();
                // console.log(response);
                $('#acc_desc').html('');
                $('#acc_desc').append('<option value="" selected disabled>Select Item</option>');
                $.each(response, function(key, value){
                    $('#acc_desc').append('<option data-name="'+value["item_descr"]+'"  data-code='+value["item_div"]+' value='+value["item_div"]+'>'+value["item_div"]+' - '+value["item_descr"]+'</option>');
                });
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        }); 
        $('#CompanyFormModel').modal('hide');
    });
    $("#order_form").on('change','#dept_code',function(){
        var dept_name=$('#dept_code').find(':selected').attr("data-name");
        var dept_code=$('#dept_code').find(':selected').attr("data-code");
        $('#select2-dept_code-container').html(dept_code);
        $('#dept_name').val(dept_name);
      });
    $("#order_form").on('change','#div_code',function(){
        var div_name=$('#div_code').find(':selected').attr("data-name");
        var div_code=$('#div_code').find(':selected').attr("data-code");
        $('#select2-div_code-container').html(div_code);
        $('#division_name').val(div_name);
      });
    //get value of company in fields
    $('#salesman_table').on('click','.even',function(){
        var salesman_name=$(this).closest('tr').children('td:nth-child(2)').text();
        var salesman_code=$(this).closest('tr').children('td:nth-child(3)').text();
        // console.log(salesman_code);
        $('#salesman').val(salesman_code);
        $('#salesman_name').val(salesman_name);
        $('#SalesmanFormModel').modal('hide');
    // $('#salesmanFormModel').modal('show');
    });
    $('#salesman_table').on('click','.odd',function(){
        var salesman_name=$(this).closest('tr').children('td:nth-child(2)').text();
        var salesman_code=$(this).closest('tr').children('td:nth-child(3)').text();
        // console.log(salesman_code);
        $('#salesman').val(salesman_code);
        $('#salesman_name').val(salesman_name);
        $('#SalesmanFormModel').modal('hide');
    // $('#salesmanFormModel').modal('show');
    });
    //select division code
   
      //get value of division in fields
    $('#division_table').on('click','.odd',function(){
      var division_name=$(this).closest('tr').children('td:nth-child(2)').text();
      var division_code=$(this).closest('tr').children('td:nth-child(3)').text();
      $('#division').val(division_code);
      $('#division_name').val(division_name);
      var company_code=$("#company_code").val();
      var purchase_mode=$("#purchase_mode").val();
      $("#msg1").html('');
      $('#DivisionFormModel').modal('hide');
    });
    $('#division_table').on('click','.even',function(){
      var division_name=$(this).closest('tr').children('td:nth-child(2)').text();
      var division_code=$(this).closest('tr').children('td:nth-child(3)').text();
      $('#division').val(division_code);
      $('#division_name').val(division_name);var company_code=$("#company_code").val();
      $("#msg1").html('');
      var company_code=$("#company_code").val();
      var purchase_mode=$("#purchase_mode").val();
      $("#msg1").html('');
        //   $("#ajax-loader").hide();   
      $('#DivisionFormModel').modal('hide');
    });
    $('#purchase_mode').change(function(){
      var company_code=$("#company_code").val();
      var division_code=$("#division").val();
      var purchase_mode=$("#purchase_mode").val();
      if(division_code != '' && company_code != '' ){
        // document no dropdown
        $.ajax({
            url: 'api/sales_module/transaction_files/sales_order_api.php',
            type: 'POST',
            data: {action: 'document_no',company_code:company_code,division_code:division_code,purchase_mode:purchase_mode},
            dataType: "json",
            success: function(data){
                // console.log(data);
                doc_no=data.doc_no;
                $('#doc_no').val(doc_no);
                var doc_no = $('#doc_no').val();
                if(doc_no != '' && division_code != '' && company_code != '' && purchase_mode !=''){
                    var sale_code=company_code+'-'+division_code+'-'+purchase_mode+'-'+doc_no;
                    $('#sale_code').val(sale_code);
                } 
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        });
      } 
    });
});
    

$(document).ready(function(){
    $('.js-example-basic-single').select2();
});
//validation
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
          po_cat: {
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
$("#order_form").on('change','#voucher_date',function(){
  var date = new Date($('#voucher_date').val());
  var year = date.getFullYear();
  $('#year').val(year);
  });
    
$('#example1').ready(function(){
  var company_code=$('#company_code').val();
  //on chAnge company code
  // $("#order_form").on('change','#acc_desc',function(){
  //     var account_code=$('#acc_desc').find(':selected').val();
  //     // console.log(account_code);
  //     var detail=$('#acc_desc').find(':selected').attr("data-name");
  //     // console.log(detail);
  //     $('#select2-acc_desc-container').html(account_code);
  //     $('#detail').val(detail);
  //     $('#view_item').css('display','');
  //     $('#view_item').fadeIn("slow");
  // });
  //on chAnge account code
  $("#order_form").on('change','.acc_desc',function(){
      var target = event.target || event.srcElement;
      var id = target.id;
      var id = id.split("-");
      id=id[1];
      var id = id.split("acc_desc");
      id=id[1];
      var account_code=$('#acc_desc'+id).find(':selected').val();
      // console.log(account_code);
      var detail=$('#acc_desc'+id).find(':selected').attr("data-name");
      // console.log(detail);
      $('#select2-acc_desc'+id+'-container').html(account_code);
      $('#detail'+id).val(detail);
        $.ajax({
          url: 'api/setup/issue_req_api.php',
            type: 'POST',
            data: {action: 'item_detail',item_code:account_code},
            dataType: "json",
            success: function(data){
                // console.log(data);
                $('#division_i'+id).val(data.div_name);
                $('#gen_i'+id).val(data.gen_name);
                $('#um_i'+id).val(data.unit_name);
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        });
  });
  
});
$('#example1').ready(function(){

      // $('.add').click(function(){
      //   var i = rowCount-1;
      //   var total_amount = 0;
      //   var company_code=$('#company_code').val();
      //     i++;
      //     var acc_desc = $('#acc_desc').val();
      //     var detail = $("#detail").val();
      //     var type = $("#type").val();
      //     var quantity = $("#quantity").val();
      //     var rates = $("#rate").val();
      //     rate = rates.replaceAll(',','');
      //     var amounts = $("#amount").val();
      //     amount = amounts.replaceAll(',','');
      //     var division_i = $("#division_i").val();
      //     var gen_i = $("#gen_i").val();
      //     var um_i = $("#um_i").val();
      //     if(acc_desc == null){
      //         $('#msg').text("Account can't be the null.");
      //     }else if(quantity == ""){
      //         $('#msg').text("Quantity can't be the null.");
      //     }else if(rate == ""){
      //         $('#msg').text("Rate can't be the null.");
      //     }else if(amount <= 0){
      //         $('#msg').text("Amount can't be the null.");
      //     }else{
      //         $('#msg').text("");
              
      //         // values empty
      //         $("#amount").val('0');
      //         $("#detail").val('');
      //         $("#quantity").val('');
      //         $("#division_i").val('');
      //         $("#gen_i").val('');
      //         $("#um_i").val('');
      //         $("#rate").val('');
      //         $('#d_items tr:last').before('<tr id="tr'+i+'"><td style="width:12%"><select name="acc_desc[]" id = "acc_desc'+i+'" class="js-example-basic-single acc_desc"></select></td><td style="width: 13%;"><textarea style="height:35px;background-color:#ccd4e1 " rows="1"   name="detail[]" id = "detail'+i+'" class="detail" readonly></textarea></td>  <td style="width: 8%;"><input  style="text-align:right; padding:0 2px 0 0;width:83px;height:35px" type="number"  name="quantity[]" id="quantity'+i+'" class="quantity"></td> <td style="width: 10%;"><input  style="text-align:right; padding:0 2px 0 0;width:100px;height:35px"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="rate[]" id = "rate'+i+'" class="rate"></td><td style="width: 10%;"><input  style="text-align:right; padding:0 2px 0 0;width:100px;height:35px;background-color:#b7edea"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text" tabindex="-1"  name="amount[]" id = "amount'+i+'" class="amount" readonly></td><td style="width: 10%;"><textarea  style="width:100px;height:35px;background-color:#ccd4e1;font-size:12px"  pattern="[a-zA-Z0-9 ,._-]{1,}" type="text"  name="division_i[]" id = "division_i'+i+'" class="division_i" readonly></textarea></td><td style="width: 10%;"><textarea  style="width:100px;height:35px;background-color:#ccd4e1;font-size:12px"  pattern="[a-zA-Z0-9 ,._-]{1,}" tabindex="-1"  type="text"   name="gen_i[]" id = "gen_i'+i+'" class="gen_i" readonly></textarea></td>  <td style="width: 10%;"><textarea  style="width:100px;height:35px;background-color:#ccd4e1;font-size:12px"  pattern="[a-zA-Z0-9 ,._-]{1,}" type="text"  name="um_i[]" id = "um_i'+i+'" class="um_i" readonly></textarea></td> <td ><button type = "button" id="'+i+'" class="btn btn-sm btn-danger remove"><b>X<b></button></td></tr>');
                          

      //       //   $('#d_items tr:last').before('<tr id="tr'+i+'"><td><select name="acc_desc[]" id = "acc_desc'+i+'" class="form-control js-example-basic-single acc_desc" ></td><td><input name="detail[]" id = "detail'+i+'" class="form-control form-control-sm detail" readonly></td><td ><select style="font-size:12px;" name="type[]" id = "type'+i+'" class="form-control form-control-sm type"><option val="" readonly="readonly" selected></option><option val="N">N</option><option val="F">F</option><option val="S">S</option><option val="T">T</option></select></td><td><input type="number" name="quantity[]" id = "quantity'+i+'" class="form-control form-control-sm quantity"></td><td><input type="text" name="rate[]" id = "rate'+i+'"  class="form-control form-control-sm rate"></td><td><input type="text" name="amount[]" id = "amount'+i+'" onchange="total()" class="form-control form-control-sm total" readonly></td><td><button type = "button" id="'+i+'" class="btn btn-sm btn-danger remove"><b>X<b></button></td></tr>');          
      //         // Item code dropdown
      //         $.ajax({
      //             url: 'api/sales_module/transaction_files/sales_order_api.php',
      //             type: 'POST',
      //             data: {action: 'item_code',company_code:company_code},
      //             dataType: "json",
      //             success: function(response){
      //                 $('#acc_desc').html('');
      //                 $('#acc_desc').append('<option value="" selected disabled>Select Account</option>');
      //                 $.each(response, function(key, value){ 
      //                   $('#acc_desc').append('<option data-name="'+value["item_descr"]+'"  data-code='+value["item_div"]+' value='+value["item_div"]+'>'+value["item_div"]+' - '+value["item_descr"]+'</option>');
      //                 });
      //             },
      //             error: function(error){
      //                 console.log(error);
      //                 alert("Contact IT Department");
      //             }
      //         });  
      //               // ACCOUNT code dropdown
      //               $.ajax({
      //                   url: 'api/sales_module/transaction_files/sales_order_api.php',
      //                   type: 'POST',
      //                   data: {action: 'item_code',company_code:company_code},
      //                   dataType: "json",
      //                   success: function(response){
      //                       $('#acc_desc'+i).html('');
      //                       $('#acc_desc'+i).addClass('js-example-basic-single');
      //                       $('.js-example-basic-single').select2();
      //                       $('#acc_desc'+i).append('<option value="" selected disabled>Select Account</option>');
      //                       // var j=1;
      //                       $.each(response, function(key, value){
      //                           $('#acc_desc'+i).append('<option data-name="'+value["item_descr"]+'"  data-code='+value["item_div"]+' value='+value["item_div"]+'>'+value["item_div"]+' - '+value["item_descr"]+'</option>');
      //                           if(value["item_div"]== acc_desc){
      //                             acc_desc= value["item_div"];
      //                             $('#acc_desc'+i+' option[value='+acc_desc+']').prop("selected", true);
      //                           }
      //                           // $('#acc_desc').append('<option data-name='+value["DESCR"]+'  data-code='+value["ACCOUNT_CODE"]+' value='+value["ACCOUNT_CODE"]+'>'+value["ACCOUNT_CODE"]+' - '+value["DESCR"]+'</option>');
                                
                                
      //                         });
      //                   },
      //                   error: function(error){
      //                       console.log(error);
      //                       alert("Contact IT Department");
      //                   }
      //               });
      //               //on chAnge account code
      //               $("#transaction_form").on('change','#acc_desc',function(){
      //                   var account_code=$('#acc_desc').find(':selected').val();
      //                   var detail=$('#acc_desc').find(':selected').attr("data-name");
      //                   $('#select2-acc_desc-container').html(account_code);
      //                   $('#detail').val(detail);
      //                   $('#view_item').css('display','');
      //                   $('#view_item').fadeIn("slow");
      //               });
      //               // console.log(type);
      //               if(type=='' || type=='0'){
      //                 $('#type'+i+'').prop("selectedIndex", 0).val();
      //               }else{
      //                 $('#type'+i+'').val(type);
      //               }
      //             $('#detail'+i+'').val(detail);
      //             $('#quantity'+i+'').val(quantity);
      //             $('#rate'+i+'').val(rates);
      //             $('#amount'+i+'').val(amounts);
      //             $('#division_i'+i+'').val(division_i);
      //             $('#gen_i'+i+'').val(gen_i);
      //             $('#um_i'+i+'').val(um_i);
                  
      //           //   $('#disc'+i+'').css('text-align','right');
      //           //   $('#disc'+i+'').css('padding','0 1px 0 0');
      //           //   $('#frt'+i+'').css('text-align','right');
      //           //   $('#frt'+i+'').css('padding','0 1px 0 0');
      //           //   $('#excl'+i+'').css('text-align','right');
      //           //   $('#excl'+i+'').css('padding','0 1px 0 0');
      //             $('#quantity'+i+'').css('text-align','right');
      //             $('#quantity'+i+'').css('padding','0 1px 0 0');
      //             $('#rate'+i+'').css('text-align','right ');
      //             $('#rate'+i+'').css('padding','0 1px 0 0');
      //             $('#amount'+i+'').css('text-align','right ');
      //             $('#amount'+i+'').css('padding','0 1px 0 0');
                  
      //     }  
      // });
     
  $('#example1').on('click','.remove', function(){
                    var button_id = $(this).attr("id");
                    var remove_amount = $('#amount'+button_id+'').val();
                    var remove_quantity = $('#quantity'+button_id+'').val();


                    // var disc_rm = $('#disc'+button_id+'').val();
                    // var frt_rm = $('#frt'+button_id+'').val();
                    // var excl_rm = $('#excl'+button_id+'').val();
                    remove_amount = remove_amount.replaceAll(',','');
                    remove_quantity = remove_quantity.replaceAll(',','');
                    // disc_rm = disc_rm.replaceAll(',','');
                    // frt_rm = frt_rm.replaceAll(',','');
                    // excl_rm = excl_rm.replaceAll(',','');
                    $('#tr'+button_id+'').remove();
                    //   $('#um').val('');
                    var current_amount = $('#total').text();
                    var current_quantity = $('#total_q').text();
                    // var current_disc = $('#disc_t').text();
                    // var current_frt = $('#frt_t').text();
                    // var current_excl = $('#excl_t').text();
                    current_amount = current_amount.replaceAll(',','');
                    current_quantity = current_quantity.replaceAll(',','');
                    // current_disc = current_disc.replaceAll(',','');
                    // current_frt = current_frt.replaceAll(',','');
                    // current_excl = current_excl.replaceAll(',','');
                    //total amount
                    var total_amount = parseFloat(current_amount) - parseFloat(remove_amount);
                    if(isNaN(total_amount)){
                        total_amount='0';
                    }else{
                        // total_amount= total_amount.;
                        var total_amount_f = new Intl.NumberFormat(
                          'en-US', {
                          style: 'currency',
                          currency: 'USD',
                          currencyDisplay: 'narrowSymbol'
                          }).format(total_amount);
                                      }
                    var total_amount_fs = total_amount_f.replace(/[$]/g, '');
                    $('#total').text(total_amount_fs);

                    
                    var add_amount_calc = parseFloat($('#add_amount_calc').val());
                    // alert(typeof add_amount_calc);
                    var less_freight_calc = parseFloat($('#less_freight_calc').val());
                    var less_disc_calc = parseFloat($('#less_disc_calc').val());

                    // $('#final_total_calc').val(total_amount+add_amount_calc+less_freight_calc+less_disc_calc);
                    $('#final_total_calc').val(parseFloat(total_amount)+parseFloat(add_amount_calc)+parseFloat(less_freight_calc)+parseFloat(less_disc_calc));



                    var total_quantity = parseFloat(current_quantity) - parseFloat(remove_quantity);
                    if(isNaN(total_quantity)){
                        total_quantity='0';
                    }else{
                        total_quantity=total_quantity.toLocaleString();
                    }
                    $('#total_q').text(total_quantity);

                    
});
});
      



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
$("#issue_req_list_breadcrumb").on("click", function () {
    $.get('inventory_management/inventory_local/issue_requisition.php', function(data,status){
        $("#content").html(data);
    });
});
$("#add_issue_req_local_breadcrumb").on("click", function () {
    $.get('inventory_management/inventory_local/add_issue_requisition.php', function(data,status){
        $("#content").html(data);
    });
});
</script>
<?php include '../../includes/loader.php'?>