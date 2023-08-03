<?php
session_start();
?>
<div class="content-wrapper">
       <section class="content-header" style="margin-top: -10px;">
        <div class="container-fluid">
          <div class="row mb-1">
            <div class="col-sm-6">
              <h1>BILL - Local</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="il_breadcrumb"> Inventory Local</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="po_list_breadcrumb"> BILL  List</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="add_po_local_breadcrumb">Add BILL Local</button></li>
              </ol>
            </div>   
          </div>
        </div>
      </section>

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
                                            <div class="col-lg-12 col-md-12 form-group">
                                            <span class="po_msg"><i class="fas fa-exclamation-circle"></i> Please Select Company First</span> 
                                        </div>
                                    <div class="col-md-2 col-lg-1 col-sm-12 form-group">
                                        <label>Doc#:</label> 
                                    </div>
                                    <div class="col-md-4 col-lg-5 col-sm-12 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                            </div>
                                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" style="background-color: #ccd4e1;font-weight:bold;" name="doc_no" id="doc_no" class="form-control form-control-sm" placeholder="Voucher No" readonly>
                                        </div>
                                    </div>
                                        <div class="col-md-2 col-lg-1 col-sm-12 form-group">
                                        <label>Date:</label> 
                                    </div>
                                    <div class="col-md-4 col-lg-2 col-sm-12 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                            </div>
                                            <input type="date" name="voucher_date" id="voucher_date" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px" class="form-control form-control-sm" value="<?php echo date('Y-m-d'); ?>">
                                        </div>
                                    </div>
                                        <div class="col-md-2 col-lg-1 col-sm-12 form-group">
                                        <label>Year:</label> 
                                    </div>
                                    <div class="col-md-4 col-lg-2 col-sm-12 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                            </div>
                                            <input type="text" name="Year" id="Year" style="background-color: #ccd4e1;font-weight:bold;" class="form-control form-control-sm" value="<?php echo date("Y"); ?>" readonly tabindex="-1">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-lg-1 col-sm-12 form-group">
                                        <label>Company:</label> 
                                    </div>
                                    <div class="col-md-4 col-lg-2 col-sm-12 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                            </div>
                                            <input maxlength="30" type="text" name="company_code" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px" id="company_code" class="form-control form-control-sm" placeholder="Select Company" readonly>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 col-sm-12 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                            </div>
                                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" style="background-color: #ccd4e1;font-weight:bold;" name="company_name" id="company_name" class="form-control form-control-sm" placeholder="Company Name" readonly tabindex="-1">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-lg-1 col-sm-12 form-group">
                                        <label>PO:</label> 
                                    </div>
                                    <div class="col-md-4 col-lg-2 col-sm-12 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                            </div>
                                            <input maxlength="30" type="text" name="po" id="po" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px;background-color:#b7edea;" class="form-control form-control-sm" placeholder="Select PO" readonly>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-lg-1 col-sm-12 form-group">
                                        <label>Date:</label> 
                                    </div>
                                    <div class="col-md-4 col-lg-2 col-sm-12 form-group">
                                        <!-- <label for="">Company Code :<span style="color:red">*</span></label> -->
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                            </div>
                                            <input maxlength="30" type="text" name="po_date" style="background-color: #ccd4e1;font-weight:bold;" id="po_date" class="form-control form-control-sm" placeholder="PO DATE" readonly tabindex="-1">
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2 col-lg-1 col-sm-12 form-group">
                                        <label>OrderRef#:</label> 
                                    </div>
                                    <div class="col-md-4 col-lg-2 col-sm-12 form-group">
                                        <!-- <label for="">CO Ref :</label> -->
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                            </div>
                                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px" name="OrderRef" id="OrderRef" class="form-control form-control-sm" placeholder="Reference No" >
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-lg-1 col-sm-12 form-group">
                                        <label>PartyRef#</label> 
                                    </div>
                                    <div class="col-md-4 col-lg-2 col-sm-12 form-group">
                                        <!-- <label for="">CO Ref :</label> -->
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                            </div>
                                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px" name="PartyRef" id="PartyRef" class="form-control form-control-sm" placeholder="Reference No" >
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 col-sm-12 form-group">
                                        <!-- <label for="inputCompanyName">Company Name :</label><span style="color:red;">*</span> -->
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                            </div>
                                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" style="background-color: #ccd4e1;font-weight:bold;" name="" id="" tabindex="-1" class="form-control form-control-sm" placeholder="" readonly >
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-lg-1 col-sm-12 form-group">
                                        <label>Voucher#:</label> 
                                    </div>
                                    <div class="col-md-4 col-lg-2 col-sm-12 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                            </div>
                                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px" name="v_no" id="v_no" class="form-control form-control-sm" placeholder="Cash/Bank Ser#" >
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <!-- CO Ref -->
                                    
                                    
                                        <!-- Party co -->
                                        <div class="col-md-2 col-lg-1 col-sm-12 form-group">
                                        <label>Party Co:</label> 
                                    </div>
                                    <div class="col-md-4 col-lg-3 col-sm-12 form-group">
                                        <!-- <label for="">Party :<span style="color:red">*</span></label> -->
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                            </div>
                                            <input maxlength="30" type="text" name="party" style="background-color: #ccd4e1;font-weight:bold;" id="party" class="form-control form-control-sm" placeholder="Select Party" readonly tabindex="-1">
                                        </div>
                                    </div>

                                    <!-- Party -->
                                    <div class="col-md-2 col-lg-1 col-sm-12 form-group">
                                        <label>Party:</label> 
                                    </div>
                                    <div class="col-md-4 col-lg-3 col-sm-12 form-group">
                                        <!-- <label for="">Party :<span style="color:red">*</span></label> -->
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                            </div>
                                            <input type="text" name="name_p" tabindex="-1" style="background-color: #ccd4e1;font-weight:bold;" id="name_p" class="form-control form-control-sm" placeholder="Party Name" readonly tabindex="-1">
                                        </div>
                                    </div>
                                    <!-- Address -->
                                    <div class="col-md-2 col-lg-1 col-sm-12 form-group">
                                        <label>Address:</label> 
                                    </div>
                                    <div class="col-md-4 col-lg-3 col-sm-12 form-group">
                                        <!-- <label for="">CO Ref :</label> -->
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                            </div>
                                            <textarea rows="1" tabindex="-1" pattern="[a-zA-Z0-9 ,._-]{1,}" style="background-color: #ccd4e1;font-weight:bold;" maxlength="30" name="address_p" id="address_p" class="form-control form-control-sm" placeholder="Address" readonly tabindex="-1"></textarea>
                                        </div>
                                    </div>
                                    

                                    
                                        <!-- Narration -->
                                        <div class="col-md-2 col-lg-2 col-sm-12 form-group">
                                        <label>Remarks:</label> 
                                    </div>
                                    <div class="col-md-10 col-lg-10 col-sm-12 form-group">
                                        <!-- <label for="">Narration :</label> -->
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                            </div>
                                            <textarea rows="1" name="narration" id="narration" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px" class="form-control form-control-sm" placeholder="Narration" ></textarea>
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
                                <table id="example1" class="table-bordered table table-responsive-sm table-responsive-lg" style="border: 1px solid gray; border-radius: 5px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.29); width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>order#</th>
                                            <th>GRN#</th>
                                            <th>ItemCode</th>
                                            <th>Name</th>
                                            <th>Product</th>
                                            <th>Item Detail</th>
                                            <th>Quantity</th>
                                            <th>Rate</th>
                                            <th>Amount</th>
                                            <th>Billed</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody id="d_items">
                                    <tr id="main_tr">
                                        <!-- <td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:70px;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="" id = "orderno" class="orderno"></td>
                                        <td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:70px;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="" id = "grnno" class="grnno"></td>
                                        <td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:100px;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="" id = "item_code" class="item_code"></td>
                                        <td ><textarea rows="1"  style="text-align:right; padding:0 2px 0 0;height:35px;width:160px;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="" id = "item_name" class="item_name"></textarea></td>
                                        <td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:100px;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="" id = "product" class="product"></td>
                                        <td ><textarea rows="1" style="text-align:right; padding:0 2px 0 0;height:35px;width:100px;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="" id = "item_dtl" class="item_dtl"></textarea></td>
                                        <td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:60px;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="" id = "quantity" class="quantity"></td>
                                        <td style="width: 8%;"><input  style="text-align:right; padding:0 2px 0 0;width:83px;height:35px" type="number"  name="" id="rate" class="rate"></td>
                                        <td style="width: 10%;"><input  style="text-align:right; padding:0 2px 0 0;width:100px;height:35px"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="" id = "amt" class="amt"></td>
                                        <td ><textarea  style="height:35px;background-color:#ccd4e1;font-size:12px;width:100px;"  pattern="[a-zA-Z0-9 ,._-]{1,}" tabindex="-1"  type="text"   name="" id = "billed" class="billed" readonly></textarea></td> -->
                                    </tr>
                                    </tbody>
                                        <tr id="last_tr">
                                            <td></td>
                                            <td></td>
                                            <td style="font-weight:bold" name="total_q" id="total_q"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align:right;">Total:</td>
                                            <td style="font-weight:bold; text-align: right;" name="total" id="total"><b>0</b></td>
                                            <td></td>
                                        </tr>
                                </table>
                                <style>

body{
zoom: 76%;
overflow-x: hidden !important; /*Hide vertical scrollbar*/
}
select{
width:82% !important;
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
.textarea:focus{
-moz-box-shadow: 0 0 8px rgba(82,168,236,.6);
box-shadow: 0 0 8px orangered !important;
}
.select2-selection{
background-color: #b7edea!important  
}
.select2-selection:focus{
-moz-box-shadow: 0 0 8px rgba(82,168,236,.6);
box-shadow: 0 0 8px orangered !important;
}
#btn-back-to-top { 
position: fixed;
bottom: 20px;
right: 20px;
}
input,select,textarea,.select2-selection{
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
.select2-container{
width:80% !important;
}
.amount::placeholder { 
text-align:right !important
}
@media only screen and (min-width: 250px) and (max-width: 350px) {
.select2-container{
width:78% !important;
}
}
@media only screen and (min-width: 350px) and (max-width: 754px) {
.select2-container{
width:85% !important;
}
}
@media screen and (min-width: 766px) and (max-width:994px) {
.select2-container{
width:72% !important;
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
background-color:#b7edea;
}
#party{
background-color:#ccd4e1;
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
.modal-backdrop {
background-color: transparent;
}
.po_msg{
font-size: 15px;
color: red;
display: none;
margin: 5px auto;
text-align: center;
}
#po_table tr td:nth-child(8) {
display: none;
}
#po_table tr td:nth-child(9) {
display: none;
}
#po_table tr td:nth-child(10) {
display: none;
}
#po_table tr td:nth-child(11) {
display: none;
}
</style>
                                <!-- <br> -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="down_table">
                                            <tr>
                                                <td>
                                                    <!-- <div class="col-md-12 form-group"></div> -->
                                                    <div class="row">
                                                        <div class="col-md-1"><label>Lot Code</label></div>
                                                        <div class="col-sm-2"><input  tabindex="-1" style="background-color: #ccd4e1;" type="text"  name="lot_code" id="lot_code" placeholder="Lot Code" class="form-control" readonly></div>
                                                        <div class="col-sm-3"><input  tabindex="-1" style="background-color: #ccd4e1;" type="text"  name="lot_name" placeholder="Lot Name" id="lot_name" class="form-control  lot_name" readonly></div>
                                                        <div class="col-sm-1"><label>ADD STAX RATE<!--<label>Cost Rate</label>--></label></div>
                                                        <div class="col-sm-2"><input   tabindex="-1" style="background-color: #ccd4e1;" type="text"  name="stax_rate1" placeholder="Add Stax Tax" id="stax_rate1" class="form-control  cost_rate" readonly></div>
                                                        <div class="col-sm-1"><label>STAX AMT<!--<label>Cost Rate</label>--></label></div>
                                                        <div class="col-sm-2"><input  tabindex="-1" style="background-color: #ccd4e1;" type="text"  name="stax_amt1" id="stax_amt1" placeholder="Add Stax Amount" class="form-control  cost_rate" readonly></div>
                                                        
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-1"><label>AddTax Co</label></div>
                                                        <div class="col-sm-2"><input  tabindex="-1" style="background-color: #ccd4e1;" type="text"  name="add_tax" id="add_tax" placeholder="Add Tax" class="form-control" readonly></div>
                                                        <div class="col-sm-3"><input  tabindex="-1" style="background-color: #ccd4e1;" type="text"  name="add_tax_name" placeholder="Tax Name" id="add_tax_name" class="form-control  lot_name" readonly></div>
                                                        <div class="col-sm-1"><label>ADD STAX RATE<!--<label>Cost Rate</label>--></label></div>
                                                        <div class="col-sm-2"><input  tabindex="-1" style="background-color: #ccd4e1;" type="text" placeholder="Add Stax Rate" name="stax_rate2" id="stax_rate2" class="form-control  cost_rate" readonly></div>
                                                        <div class="col-sm-1"><label>ADD AMT<!--<label>Cost Rate</label>--></label></div>
                                                        <div class="col-sm-2"><input  tabindex="-1" style="background-color: #ccd4e1;" type="text" placeholder="Add Stax Amount" name="stax_amt2" id="stax_amt2" class="form-control  cost_rate" readonly></div>
                                                        
                                                    </div>
                                                    
                                                <div style="border:2px solid #937272; padding: 10px;" class="font-weight-bold">
                                                    <div class="row" >
                                                        <div class="col-lg-1 col-md-2"><label>Charge Co</label></div>
                                                        <div class="col-lg-2 col-md-4"><select class="form-control js-example-basic-single  form-control-sm" id="charge_code" name="charge_code" style=""></select></div>                                          
                                                        <div class="col-lg-3 col-md-6"><input  tabindex="-1" style="background-color: #ccd4e1;" type="text"  name="charge_name" placeholder="Charge NameF" id="charge_name" class="form-control form-control-sm mb-sm-2 charge_name" readonly></div>                                          
                                                        <div class="col-lg-1 col-md-2 form-group">
                                                        <label>Dpt:</label> 
                                                        </div>
                                                        <div class="col-lg-1 col-md-2 form-group">
                                                        <select class="form-control js-example-basic-single  form-control-sm dept1" id="dept1" name="dept1" style=""></select>
                                                        </div>
                                                        <div class="col-lg-2 col-md-4 form-group">
                                                            <input  tabindex="-1" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="dept_amt1" id="dept_amt1" class="form-control form-control-sm dept_amt1" placeholder="dpt name" readonly tabindex="-1">
                                                        </div>
                                                        <div class="col-lg-2 col-md-4 form-group">
                                                            <textarea rows="1" pattern="[a-zA-Z0-9 ,._-]{1,}" name="add1" id="add1" style="text-align: right;" class="form-control form-control-sm" placeholder="ADD" ></textarea>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    <div class="col-md-12 form-group"></div>
                                                    <div class="row">
                                                        <div class="col-lg-1 col-md-2"><label>Frt Code</label></div>
                                                        <div class="col-lg-2 col-md-4">  <select class="form-control js-example-basic-single  form-control-sm frt_code" id="frt_code" name="frt_code" style=""></select></div>                                          
                                                        <div class="col-lg-3 col-md-6"><input  tabindex="-1" style="background-color: #ccd4e1;" type="text"  name="frt_name" id="frt_name" placeholder="Freight Name" class="form-control form-control-sm mb-sm-2 frt_name" readonly></div>
                                                        <div class="col-lg-1 col-md-2 form-group">
                                                            <label>Dpt:</label> 
                                                        </div>
                                                        <div class="col-lg-1 col-md-2 form-group">
                                                        <select class="form-control js-example-basic-single  form-control-sm" id="dept2" name="dept2" style=""></select>
                                                        </div>
                                                        <div class="col-lg-2 col-md-4 form-group">
                                                            <input  tabindex="-1" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="dept_amt2" id="dept_amt2" class="form-control form-control-sm mb-sm-2" placeholder="dpt name" readonly tabindex="-1">
                                                        </div>
                                                        <div class="col-lg-2 col-md-4 form-group">
                                                            <textarea rows="1" pattern="[a-zA-Z0-9 ,._-]{1,}" name="less1" id="less1" class="form-control form-control-sm" style="text-align: right;" placeholder="LESS" ></textarea>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-12 form-group"></div>
                                                    <div class="row">
                                                        <div class="col-lg-1 col-md-2"><label>Disc Code</label></div>
                                                        <div class="col-lg-2 col-md-4">  <select class="form-control js-example-basic-single  form-control-sm disc_code" id="disc_code" name="disc_code" style=""></select></div>                                          
                                                        <div class="col-lg-3 col-md-6"><input  tabindex="-1" style="background-color: #ccd4e1;" type="text"  name="disc_name" id="disc_name" placeholder="Discount Name" class="form-control form-control-sm mb-sm-2  disc_name" readonly></div>
                                                        <div class="col-lg-1 col-md-2 form-group">
                                                            <label>Dpt:</label> 
                                                        </div>
                                                        <div class="col-lg-1 col-md-2 form-group">
                                                        <select class="form-control js-example-basic-single  form-control-sm" id="dept3" name="dept3" style=""></select>
                                                        </div>
                                                        <div class="col-lg-2 col-md-4 form-group">
                                                            <input  tabindex="-1" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="dept_amt3" id="dept_amt3" class="form-control form-control-sm" placeholder="dpt name" readonly tabindex="-1">
                                                        </div>
                                                        <div class="col-lg-2 col-md-4 form-group">
                                                            <textarea rows="1" pattern="[a-zA-Z0-9 ,._-]{1,}" name="less2" id="less2" class="form-control form-control-sm" style="text-align: right;" placeholder="LESS" ></textarea>
                                                        </div>
                                                        <div class="col-md-10 form-group">
                                                            
                                                        </div>
                                                        <div class="col-md-2 form-group">
                                                            <textarea  tabindex="-1" rows="1" pattern="[a-zA-Z0-9 ,._-]{1,}" name="total2" id="total2" class="form-control form-control-sm" style="text-align: right;" placeholder="TOTAL" readonly></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <!-- <div class="col-md-6">
                                        <table>
                                            <tr>
                                                <td>
                                                    <div class="row" style="margin-top:10px">
                                                        <div class="col-md-12 form-group"></div>
                                                        <div class="col-md-1 form-group"></div>
                                                    </div>
                                                </td>
                                            </tr>    
                                        </table>
                                    </div> -->
                                                   </div>
                                </div>
                                <!-- masla -->
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

<div class="modal fade" id="poFormModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select PO</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
              <table class="table" style="width:100%" id="po_table">
              <thead>
                  <tr>
                    <th>Sno</th>
                    <th>PARTY NAME</th>
                    <th>REFNUM </th>
                    <th>DOC DATE </th>
                    <th>ORDER KEY</th>
                    <th>TOTAL NET AMT</th>
                    <th>Party Code</th>
                    <th style="display:none;">Co Code</th>
                    <th style="display:none;">Doc Year</th>
                    <th style="display:none;">Doc Type</th>
                    <th style="display:none;">Doc no</th>
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
    $('#voucher_date').focus();
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
        $('#company_code').focus();
    }
} );


//get value of company in fields

//select company code
$('#order_form').on('click','#company_code',function(){
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
        url: 'api/Inventory_management/inventory_locals/bill_local_api.php',
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

//select company code
//select company code
$('#order_form').on('focus','#po',function(){
  var company_code=$('#company_code').val();
    // console.log(company_code);
    if(company_code != ''){
        $('.po_msg').css('display','none');
        $('#po_table').dataTable().fnDestroy();
      table = $('#po_table').DataTable({
           dom: 'Bfrtip',
           orderCellsTop: true,
           fixedHeader: true,
           
           buttons: [
               'copy', 'csv', 'excel', 'pdf', 'print',
           ]
        });
        // Setup - add a text input to each footer cell
        // $('#company_table thead tr').clone(true).appendTo( '#company_table thead' );
        $('#po_table thead tr:eq(1) th').each( function (i) {
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
        url: 'api/Inventory_management/inventory_locals/bill_local_api.php',
        type: 'POST',
        data: {action: 'po_code'},
        dataType: "json",
        success: function(response){
            // console.log(response);
        table.clear().draw();
        // append data in datatable
        var sno='0';
        for (var i = 0; i < response.length; i++) {
            sno++;
            table.row.add([sno,response[i].PARTY_NAME,response[i].refnum,response[i].doc_date,response[i].do_key,response[i].total_net_amt,response[i].party_code,response[i].co_code,response[i].doc_year,response[i].doc_type,response[i].doc_no]);
        }
        table.draw();
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });  
  $('#poFormModel').modal('show');
    }else{
      $('.po_msg').css('display','block');
    }
     
});
// $('#po_table').on('click','.odd',function(){
//     // var party_name=$(this).closest('tr').children('td:nth-child(2)').text();
//     var party_code=$(this).closest('tr').children('td:nth-child(7)').text();
//     var order_key=$(this).closest('tr').children('td:nth-child(5)').text();
//     var doc_date=$(this).closest('tr').children('td:nth-child(4)').text();
//     $('#po').val(order_key);
//     $('#po_date').val(doc_date);
//     $('#party').val(party_code);
//     if(party_code !=''){
//         // document no dropdown
//         $.ajax({
//             url: 'api/setup/bill_local_api.php',
//             type: 'POST',
//             data: {action: 'party_detail',party_code:party_code},
//             dataType: "json",
//             success: function(data){
//                 // console.log(data);
//                 $('#party').val(data.party_code);
//                 $('#name_p').val(data.party_name);
//                 $('#address_p').val(data.address);
                
//             },
//             error: function(error){
//                 console.log(error);
//                 alert("Contact IT Department");
//             }
//         });
//     }
//     $('#poFormModel').modal('hide');
//     // document no dropdown
    
//     var co_code=$(this).closest('tr').children('td:nth-child(8)').text();
//     var doc_year=$(this).closest('tr').children('td:nth-child(9)').text();
//     var doc_type=$(this).closest('tr').children('td:nth-child(10)').text();
//     var doc_no=$(this).closest('tr').children('td:nth-child(11)').text();
//     var order_key=$(this).closest('tr').children('td:nth-child(5)').text();
//      $.ajax({
//         url: 'api/setup/bill_local_api.php',
//             type: 'POST',
//             data: {action: 'calculations1',co_code:co_code,doc_year:doc_year,doc_type:doc_type,doc_no:doc_no,order_key:order_key},
//             dataType: "json",
//             success: function(data){
//                $("#example1").css("display", "");
//                 console.log(data);
//                 var fd=0;
//                 for(var i=1;i<=data.length;i++){
//                     var ITEM_CODE=data[fd].ITEM_CODE;
//                     var ITEM_DESCR=data[fd].item_descr;
//                     var PRODUCT_CODE=data[fd].PRODUCT_CODE;
//                     var ITEM_DETAIL=data[fd].ITEM_DETAIL;
//                     var QTY=data[fd].QTY;
//                     var RATE=data[fd].RATE;
//                     var AMT=data[fd].TOTAL_NET_AMT;
//                     var BILLED=data[fd].BILLED;
//                     var DO_KEY_REF=data[fd].DO_KEY_REF;
//                     console.log(DO_KEY_REF);
                   
//                     $('#d_items tr:last').before('<tr id="tr'+i+'"><td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:70px;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="" id = "orderno'+i+'" class="orderno" readonly></td><td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:70px;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="" id="grnno'+i+'" class="grnno" readonly></td><td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:70px;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="item_code" id = "item_code'+i+'" class="item_code" readonly></td><td><textarea rows="1"  style="text-align:right; padding:0 2px 0 0;height:35px;width:160px;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="" id = "item_name'+i+'" class="item_name" readonly></textarea></td><td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:100px;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="" id = "product'+i+'" class="product" readonly></td> <td ><textarea rows="1" style="text-align:right; padding:0 2px 0 0;height:35px;width:100px;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="" id = "item_dtl'+i+'" class="item_dtl" readonly></textarea></td>     <td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:60px;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="" id = "quantity'+i+'" class="quantity" readonly></td>  <td style="width: 8%;"><input  style="text-align:right; padding:0 2px 0 0;width:83px;height:35px" type="number"  name="" id="rate'+i+'" class="rate" readonly></td>  <td style="width: 10%;"><input  style="text-align:right; padding:0 2px 0 0;width:100px;height:35px"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="" id = "amt'+i+'" class="amt" readonly></td> <td ><textarea  style="height:35px;background-color:#ccd4e1;font-size:12px;width:100px;"  pattern="[a-zA-Z0-9 ,._-]{1,}" tabindex="-1"  type="text"   name="" id = "billed'+i+'" class="billed" readonly></textarea></td></tr>');
//                     $('#item_code'+i).val(ITEM_CODE);
//                     $('#item_name'+i).val(ITEM_DESCR);
//                     $('#product'+i).val(PRODUCT_CODE);
//                     $('#item_dtl'+i).val(ITEM_DETAIL);
//                     $('#quantity'+i).val(QTY);
//                     $('#rate'+i).val(RATE);
//                     $('#amt'+i).val(AMT);
//                     $('#billed'+i).val(BILLED);
//                     $('#orderno'+i).val(party_code);
//                     $('#grnno'+i).val(DO_KEY_REF);
                    
                 
//                         fd=fd+1;
//                 }
//             },
//             error: function(error){
//                 console.log(error);
//                 alert("Contact IT Department");
//             }
//     });
    
// });
$('#po_table').on('click','.even',function(){
    // var party_name=$(this).closest('tr').children('td:nth-child(2)').text();
    var party_code=$(this).closest('tr').children('td:nth-child(7)').text();
    var order_key=$(this).closest('tr').children('td:nth-child(5)').text();
    var doc_date=$(this).closest('tr').children('td:nth-child(4)').text();
    $('#po').val(order_key);
    $('#po_date').val(doc_date);
    $('#party').val(party_code);
    if(party_code !=''){
        // document no dropdown
        $.ajax({
            url: 'api/Inventory_management/inventory_locals/bill_local_api.php',
            type: 'POST',
            data: {action: 'party_detail',party_code:party_code},
            dataType: "json",
            success: function(data){
                // console.log(data);
                $('#party').val(data.SUPP_DIV);
                $('#name_p').val(data.PARTY_NAME);
                $('#address_p').val(data.ADDRESS);
                
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        });
    }
    $('#poFormModel').modal('hide');
    $('#po').focus();
    // document no dropdown
  
    var co_code=$(this).closest('tr').children('td:nth-child(8)').text();
    var doc_year=$(this).closest('tr').children('td:nth-child(9)').text();
    var doc_type=$(this).closest('tr').children('td:nth-child(10)').text();
    var doc_no=$(this).closest('tr').children('td:nth-child(11)').text();
    var order_key=$(this).closest('tr').children('td:nth-child(5)').text();
     $.ajax({
        url: 'api/Inventory_management/inventory_locals/bill_local_api.php',
            type: 'POST',
            data: {action: 'calculations1',co_code:co_code,doc_year:doc_year,doc_type:doc_type,doc_no:doc_no,order_key:order_key},
            dataType: "json",
            success: function(data){
               $("#example1").css("display", "");
                console.log(data);
                var fd=0;
                var Total = 0;
                var rowCount = $("#example1 tr").length;
                console.log(data.length);
                for(var a=2;a<rowCount -1;a++){
                    var d=a-1;
                    // console.log(a);
                    // console.log(d);
                    $('#tr'+d+'').remove(); 
                    $('#total').text('0');
                    $('#debit').val('');
                }
                
                for(var i=1;i<=data.length;i++){
                    var ITEM_CODE=data[fd].ITEM_CODE;
                    var ITEM_DESCR=data[fd].item_descr;
                    var PRODUCT_CODE=data[fd].PRODUCT_CODE;
                    var ITEM_DETAIL=data[fd].ITEM_DETAIL;
                    var QTY=data[fd].QTY;
                    
                    var RATE=data[fd].rate;
                    var rate1 = new Intl.NumberFormat(
                        'en-US', {
                        style: 'currency',
                        currency: 'USD',
                        currencyDisplay: 'narrowSymbol'
                        }).format(RATE);

                    var rate2 = rate1.replace(/[$]/g, '');



                    var AMT=parseFloat(QTY)*parseFloat(RATE);
                    
                    var BILLED=data[fd].BILLED;
                    var DO_KEY_REF=data[fd].DO_KEY_REF;
                    var PO_NO=data[fd].PO_NO;
                    
                   
                    $('#d_items tr:last').before('<tr id="tr'+i+'"><td ><input tabindex="-1" style="text-align:right; padding:0 2px 0 0;height:35px;width:70px;background-color:#ccd4e1;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="orderno[]" id = "orderno'+i+'" class="orderno" readonly></td><td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:70px;background-color:#ccd4e1;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="grnno[]" tabindex="-1" id="grnno'+i+'" class="grnno" readonly></td><td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:70px;background-color:#ccd4e1;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="item_code[]" tabindex="-1" id = "item_code'+i+'" class="item_code" readonly></td><td><textarea rows="1"  style="text-align:right; padding:0 2px 0 0;height:35px;width:160px;background-color:#ccd4e1;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="item_name[]" tabindex="-1" id = "item_name'+i+'" class="item_name" readonly></textarea></td><td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:100px;background-color:#ccd4e1;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="product[]" tabindex="-1" id = "product'+i+'" class="product" readonly></td> <td ><textarea rows="1" style="text-align:right; padding:0 2px 0 0;height:35px;width:100px;background-color:#ccd4e1;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="item_dtl[]" tabindex="-1" id = "item_dtl'+i+'" class="item_dtl" readonly></textarea></td>     <td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:60px;background-color:#ccd4e1;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="quantity[]" tabindex="-1" id = "quantity'+i+'" class="quantity" readonly></td>  <td style="width: 8%;"><input  style="text-align:right; padding:0 2px 0 0;width:83px;height:35px;background-color:#ccd4e1;" type="number"  name="rate[]" tabindex="-1" id="rate'+i+'" class="rate" readonly></td>  <td style="width: 10%;"><input  style="text-align:right; padding:0 2px 0 0;width:100px;height:35px;background-color:#ccd4e1;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="amt[]" tabindex="-1" id = "amt'+i+'" class="amt" readonly></td> <td><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:70px;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="billed[]"  id = "billed'+i+'" class="billed" value="Y" placeholder="Y / N" maxlength="1" ></td></tr>');
                    $('#item_code'+i).val(ITEM_CODE);
                    $('#item_name'+i).val(ITEM_DESCR);
                    $('#product'+i).val(PRODUCT_CODE);
                    $('#item_dtl'+i).val(ITEM_DETAIL);
                    $('#quantity'+i).val(QTY);
                    $('#rate'+i).val(rate2);
                    $('#amt'+i).val(AMT);
                    $('#billed'+i).val('Y');
                    $('#orderno'+i).val(PO_NO);
                    $('#grnno'+i).val(DO_KEY_REF);
                    
                    
                    fd=fd+1;
                    Total = Total + parseFloat(AMT);
                    var finalformat = new Intl.NumberFormat(
                        'en-US', {
                        style: 'currency',
                        currency: 'USD',
                        currencyDisplay: 'narrowSymbol'
                        }).format(Total);
                    var formatted1 = finalformat.replace(/[$]/g, '');
                    $('#total').html(formatted1);
                    $('#total2').val(formatted1);
                    
                    // $('#total').html(Total);

                }
            
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        });
        $("#OrderRef").focus();
});
$('#po_table').on('click','.odd',function(){
    // var party_name=$(this).closest('tr').children('td:nth-child(2)').text();
    var party_code=$(this).closest('tr').children('td:nth-child(7)').text();
    var order_key=$(this).closest('tr').children('td:nth-child(5)').text();
    var doc_date=$(this).closest('tr').children('td:nth-child(4)').text();
    $('#po').val(order_key);
    $('#po_date').val(doc_date);
    $('#party').val(party_code);
    if(party_code !=''){
        // document no dropdown
        $.ajax({
            url: 'api/Inventory_management/inventory_locals/bill_local_api.php',
            type: 'POST',
            data: {action: 'party_detail',party_code:party_code},
            dataType: "json",
            success: function(data){
                // console.log(data);
                $('#party').val(data.SUPP_DIV);
                $('#name_p').val(data.PARTY_NAME);
                $('#address_p').val(data.ADDRESS);
                
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        });
    }
    $('#poFormModel').modal('hide');
    $('#po').focus();
    // document no dropdown
  
    var co_code=$(this).closest('tr').children('td:nth-child(8)').text();
    var doc_year=$(this).closest('tr').children('td:nth-child(9)').text();
    var doc_type=$(this).closest('tr').children('td:nth-child(10)').text();
    var doc_no=$(this).closest('tr').children('td:nth-child(11)').text();
    var order_key=$(this).closest('tr').children('td:nth-child(5)').text();
     $.ajax({
        url: 'api/Inventory_management/inventory_locals/bill_local_api.php',
            type: 'POST',
            data: {action: 'calculations1',co_code:co_code,doc_year:doc_year,doc_type:doc_type,doc_no:doc_no,order_key:order_key},
            dataType: "json",
            success: function(data){
               $("#example1").css("display", "");
                console.log(data);
                var fd=0;
                var Total = 0;
                var rowCount = $("#example1 tr").length;
                console.log(data.length);
                for(var a=2;a<rowCount -1;a++){
                    var d=a-1;
                    // console.log(a);
                    // console.log(d);
                    $('#tr'+d+'').remove(); 
                    $('#total').text('0');
                    $('#debit').val('');
                }
                
                for(var i=1;i<=data.length;i++){
                  var ITEM_CODE=data[fd].ITEM_CODE;
                    var ITEM_DESCR=data[fd].item_descr;
                    var PRODUCT_CODE=data[fd].PRODUCT_CODE;
                    var ITEM_DETAIL=data[fd].ITEM_DETAIL;
                    var QTY=data[fd].QTY;
                    
                    var RATE=data[fd].rate;
                    var cal=data[fd].rate;
                    var rate1 = new Intl.NumberFormat(
                        'en-US', {
                        style: 'currency',
                        currency: 'USD',
                        currencyDisplay: 'narrowSymbol'
                        }).format(RATE);

                        RATE = rate1.replace(/[$]/g, '');



                    var AMT=parseFloat(QTY)*parseFloat(cal);
                    var cal2=parseFloat(QTY)*parseFloat(cal);
                    var AMT1 = new Intl.NumberFormat(
                        'en-US', {
                        style: 'currency',
                        currency: 'USD',
                        currencyDisplay: 'narrowSymbol'
                        }).format(AMT);

                        AMT = AMT1.replace(/[$]/g, '');
                    var BILLED=data[fd].BILLED;
                    var DO_KEY_REF=data[fd].DO_KEY_REF;
                    var PO_NO=data[fd].PO_NO;
                    
                   
                    $('#d_items tr:last').before('<tr id="tr'+i+'"><td ><input tabindex="-1" style="text-align:right; padding:0 2px 0 0;height:35px;width:70px;background-color:#ccd4e1;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="orderno[]" id = "orderno'+i+'" class="orderno" readonly></td><td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:70px;background-color:#ccd4e1;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="grnno[]" tabindex="-1" id="grnno'+i+'" class="grnno" readonly></td><td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:70px;background-color:#ccd4e1;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="item_code[]" tabindex="-1" id = "item_code'+i+'" class="item_code" readonly></td><td><textarea rows="1"  style="text-align:right; padding:0 2px 0 0;height:35px;width:160px;background-color:#ccd4e1;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="item_name[]" tabindex="-1" id = "item_name'+i+'" class="item_name" readonly></textarea></td><td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:100px;background-color:#ccd4e1;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="product[]" tabindex="-1" id = "product'+i+'" class="product" readonly></td> <td ><textarea rows="1" style="text-align:right; padding:0 2px 0 0;height:35px;width:100px;background-color:#ccd4e1;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="item_dtl[]" tabindex="-1" id = "item_dtl'+i+'" class="item_dtl" readonly></textarea></td>     <td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:60px;background-color:#ccd4e1;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="quantity[]" tabindex="-1" id = "quantity'+i+'" class="quantity" readonly></td>  <td style="width: 8%;"><input  style="text-align:right; padding:0 2px 0 0;width:83px;height:35px;background-color:#ccd4e1;" type="text"  name="rate[]" tabindex="-1" id="rate'+i+'" class="rate" readonly></td>  <td style="width: 10%;"><input  style="text-align:right; padding:0 2px 0 0;width:100px;height:35px;background-color:#ccd4e1;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="amt[]" tabindex="-1" id = "amt'+i+'" class="amt" readonly></td> <td><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:70px;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="billed[]"  id = "billed'+i+'" class="billed" value="Y" placeholder="Y / N" maxlength="1" ></td></tr>');
                    $('#item_code'+i).val(ITEM_CODE);
                    $('#item_name'+i).val(ITEM_DESCR);
                    $('#product'+i).val(PRODUCT_CODE);
                    $('#item_dtl'+i).val(ITEM_DETAIL);
                    $('#quantity'+i).val(QTY);
                    $('#rate'+i).val(RATE);
                    $('#amt'+i).val(AMT);
                    $('#billed'+i).val('Y');
                    $('#orderno'+i).val(PO_NO);
                    $('#grnno'+i).val(DO_KEY_REF);
                    
                    
                    fd=fd+1;
                    Total = Total + parseFloat(cal2);
                    var finalformat = new Intl.NumberFormat(
                        'en-US', {
                        style: 'currency',
                        currency: 'USD',
                        currencyDisplay: 'narrowSymbol'
                        }).format(Total);
                    var formatted1 = finalformat.replace(/[$]/g, '');
                    $('#total').html(formatted1);
                    $('#total2').val(formatted1);
                    // $('#total').html(Total);

                }
            
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        });
        $("#OrderRef").focus();
});

$('#down_table').on('change','#add1',function(){

var amt1 = $('#total').html();
amt1=amt1.replaceAll(',','');  
var add1 = $('#add1').val();
// console.log(add1);
if(add1 ==''){
    add1=0;
}else{
    add1=add1.replaceAll(',','');  
}
var less1 = $('#less1').val();
if(less1 ==''){
    less1=0;
}else{
    less1=less1.replaceAll(',','');  
}
var less2 = $('#less2').val();
if(less2 ==''){
    less2=0;
}else{
    less2=less2.replaceAll(',','');  
}

var final = parseFloat(amt1) + parseFloat(add1) -parseFloat(less1) - parseFloat(less2);
var finalformat = new Intl.NumberFormat(
                'en-US', {
                style: 'currency',
                currency: 'USD',
                currencyDisplay: 'narrowSymbol'
                }).format(final);
            var formatted1 = finalformat.replace(/[$]/g, '');
$('#total2').val(formatted1);
var finalformat2 = new Intl.NumberFormat(
                'en-US', {
                style: 'currency',
                currency: 'USD',
                currencyDisplay: 'narrowSymbol'
                }).format(add1);
            var formatted12 = finalformat2.replace(/[$]/g, '');
$('#add1').val(formatted12);

});
$('#down_table').on('change','#less1',function(){

var amt1 = $('#total').html();
amt1=amt1.replaceAll(',','');  
var less1 = $('#less1').val();
if(less1 ==''){
    less1=0;
}else{
    less1=less1.replaceAll(',','');  
}
var add1 = $('#add1').val();
if(add1 ==''){
    add1=0;
}else{
    add1=add1.replaceAll(',','');  
}
var less2 = $('#less2').val();
if(less2 ==''){
    less2=0;
}else{
    less2=less2.replaceAll(',','');  
}

var final = parseFloat(amt1) + parseFloat(add1) -parseFloat(less1) - parseFloat(less2);
var finalformat = new Intl.NumberFormat(
                'en-US', {
                style: 'currency',
                currency: 'USD',
                currencyDisplay: 'narrowSymbol'
                }).format(final);
            var formatted1 = finalformat.replace(/[$]/g, '');
$('#total2').val(formatted1);
var finalformat2 = new Intl.NumberFormat(
                'en-US', {
                style: 'currency',
                currency: 'USD',
                currencyDisplay: 'narrowSymbol'
                }).format(less1);
            var formatted12 = finalformat2.replace(/[$]/g, '');
$('#less1').val(formatted12);

});
$('#down_table').on('change','#less2',function(){

var amt1 = $('#total').html();
amt1=amt1.replaceAll(',','');  
var less2 = $('#less2').val();
if(less2 ==''){
    less2=0;
}else{
    less2=less2.replaceAll(',','');  
}
var add1 = $('#add1').val();
if(add1 ==''){
    add1=0;
}else{
    add1=add1.replaceAll(',','');  
}
var less1 = $('#less1').val();
if(less1 ==''){
    less1=0;
}else{
    less1=less1.replaceAll(',','');  
}

var final = parseFloat(amt1) + parseFloat(add1) -parseFloat(less1) - parseFloat(less2);
var finalformat = new Intl.NumberFormat(
                'en-US', {
                style: 'currency',
                currency: 'USD',
                currencyDisplay: 'narrowSymbol'
                }).format(final);
            var formatted1 = finalformat.replace(/[$]/g, '');
$('#total2').val(formatted1);
var finalformat2 = new Intl.NumberFormat(
                'en-US', {
                style: 'currency',
                currency: 'USD',
                currencyDisplay: 'narrowSymbol'
                }).format(less2);
            var formatted12 = finalformat2.replace(/[$]/g, '');
$('#less2').val(formatted12);

});

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
        url: 'api/Inventory_management/inventory_locals/bill_local_api.php',
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
      $('.po_msg').css('display','none');
        var company_name=$(this).closest('tr').children('td:nth-child(2)').text();
        var company_code=$(this).closest('tr').children('td:nth-child(3)').text();
        // console.log(company_code);
        $('#company_code').val(company_code);
        $('#company_name').val(company_name);
        
      
        // ACCOUNT code dropdown
        $.ajax({
            url: 'api/Inventory_management/inventory_locals/bill_local_api.php',
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
        $('#company_name').focus();
        // $('#CompanyFormModel').modal('show');
    });
    $('#company_table').on('click','.odd',function(){
      $('.po_msg').css('display','none');
        var company_name=$(this).closest('tr').children('td:nth-child(2)').text();
        var company_code=$(this).closest('tr').children('td:nth-child(3)').text();
        // console.log(company_code);
        $('#company_code').val(company_code);
        $('#company_name').val(company_name);
      
        // ACCOUNT code dropdown
        $.ajax({
            url: 'api/Inventory_management/inventory_locals/bill_local_api.php',
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
        $('.po_msg').css('display','none');
        var company_name=$(this).closest('tr').children('td:nth-child(2)').text();
        var company_code=$(this).closest('tr').children('td:nth-child(3)').text();
        console.log(company_code);
        $('#company_code').val(company_code);
        $('#company_name').val(company_name);
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
        $("#po").val('');
        $("#po_date").val('');
        $("#party").val('');
        $("#name_p").val('');
        $("#address_p").val('');
        $("#add1").val('');
        $("#less1").val('');
        $("#less2").val('');
        $("#total2").val('');
        // ACCOUNT code dropdown
        
        $.ajax({
            url: 'api/Inventory_management/inventory_locals/bill_local_api.php',
            type: 'POST',
            data: {action: 'charge_code',company_code:company_code},
            dataType: "json",
            success: function(response){
                $("#ajax-loader").hide();
                // console.log(response);
                $('#charge_code').html('');
                $('#charge_code').append('<option value="" selected disabled>Select charge code</option>');
                $.each(response, function(key, value){
                    $('#charge_code').append('<option data-name="'+value["DESCR"]+'"  data-code='+value["ACCOUNT_CODE"]+' value='+value["ACCOUNT_CODE"]+'>'+value["ACCOUNT_CODE"]+' - '+value["DESCR"]+'</option>');
                });
                
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        }); 
        $.ajax({
            url: 'api/Inventory_management/inventory_locals/bill_local_api.php',
            type: 'POST',
            data: {action: 'charge_code',company_code:company_code},
            dataType: "json",
            success: function(response){
                $("#ajax-loader").hide();
                // console.log(response);
                $('#frt_code').html('');
                $('#frt_code').append('<option value="" selected disabled>Select frt code</option>');
                $.each(response, function(key, value){
                    $('#frt_code').append('<option data-name="'+value["DESCR"]+'"  data-code='+value["ACCOUNT_CODE"]+' value='+value["ACCOUNT_CODE"]+'>'+value["ACCOUNT_CODE"]+' - '+value["DESCR"]+'</option>');
                });
                
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        }); 
        $.ajax({
            url: 'api/Inventory_management/inventory_locals/bill_local_api.php',
            type: 'POST',
            data: {action: 'charge_code',company_code:company_code},
            dataType: "json",
            success: function(response){
                $("#ajax-loader").hide();
                // console.log(response);
                $('#disc_code').html('');
                $('#disc_code').append('<option value="" selected disabled>Select disc code</option>');
                $.each(response, function(key, value){
                    $('#disc_code').append('<option data-name="'+value["DESCR"]+'"  data-code='+value["ACCOUNT_CODE"]+' value='+value["ACCOUNT_CODE"]+'>'+value["ACCOUNT_CODE"]+' - '+value["DESCR"]+'</option>');
                });
                
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        }); 
        $('#CompanyFormModel').modal('hide');
        $('#po').focus();

    });
    $('#company_table').on('click','.even',function(){
        $('.po_msg').css('display','none');
        var company_name=$(this).closest('tr').children('td:nth-child(2)').text();
        var company_code=$(this).closest('tr').children('td:nth-child(3)').text();
        console.log(company_code);
        $('#company_code').val(company_code);
        $('#company_name').val(company_name);
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
        $("#po").val('');
        $("#po_date").val('');
        $("#party").val('');
        $("#name_p").val('');
        $("#address_p").val('');
        $("#add1").val('');
        $("#less1").val('');
        $("#less2").val('');
        $("#total2").val('');
        // ACCOUNT code dropdown
        
        $.ajax({
            url: 'api/Inventory_management/inventory_locals/bill_local_api.php',
            type: 'POST',
            data: {action: 'charge_code',company_code:company_code},
            dataType: "json",
            success: function(response){
                $("#ajax-loader").hide();
                // console.log(response);
                $('#charge_code').html('');
                $('#charge_code').append('<option value="" selected disabled>Select charge code</option>');
                $.each(response, function(key, value){
                    $('#charge_code').append('<option data-name="'+value["DESCR"]+'"  data-code='+value["ACCOUNT_CODE"]+' value='+value["ACCOUNT_CODE"]+'>'+value["ACCOUNT_CODE"]+' - '+value["DESCR"]+'</option>');
                });
                
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        }); 
        $.ajax({
            url: 'api/Inventory_management/inventory_locals/bill_local_api.php',
            type: 'POST',
            data: {action: 'charge_code',company_code:company_code},
            dataType: "json",
            success: function(response){
                $("#ajax-loader").hide();
                // console.log(response);
                $('#frt_code').html('');
                $('#frt_code').append('<option value="" selected disabled>Select frt code</option>');
                $.each(response, function(key, value){
                    $('#frt_code').append('<option data-name="'+value["DESCR"]+'"  data-code='+value["ACCOUNT_CODE"]+' value='+value["ACCOUNT_CODE"]+'>'+value["ACCOUNT_CODE"]+' - '+value["DESCR"]+'</option>');
                });
                
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        }); 
        $.ajax({
            url: 'api/Inventory_management/inventory_locals/bill_local_api.php',
            type: 'POST',
            data: {action: 'charge_code',company_code:company_code},
            dataType: "json",
            success: function(response){
                $("#ajax-loader").hide();
                // console.log(response);
                $('#disc_code').html('');
                $('#disc_code').append('<option value="" selected disabled>disc code</option>');
                $.each(response, function(key, value){
                    $('#disc_code').append('<option data-name="'+value["DESCR"]+'"  data-code='+value["ACCOUNT_CODE"]+' value='+value["ACCOUNT_CODE"]+'>'+value["ACCOUNT_CODE"]+' - '+value["DESCR"]+'</option>');
                });
                
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        }); 
        $('#CompanyFormModel').modal('hide');
        $('#po').focus();
    });
    $("#down_table").on('change','#charge_code',function(){
         $('#select2-dept1-container').val('');
         $('#dept_amt1').val('');
          var charge_name=$('.js-example-basic-single').find(':selected').attr("data-name");
          var charge_code=$('.js-example-basic-single').find(':selected').attr("data-code");
          $('#select2-charge_code-container').html(charge_code);
          $('#charge_name').val(charge_name);
          $.ajax({
            url: 'api/Inventory_management/inventory_locals/bill_local_api.php',
            type: 'POST',
            data: {action: 'dept1',charge_code:charge_code},
            dataType: "json",
            success: function(response){
                console.log(response);
                // if(response == null){
                //     $('#dept1').val('');
                //     $('#dept_amt1').val('');
                // }else{
                    // $('#dept1').val(response.dept_name);
                    // $('#dept_amt1').val(response.dept_code);
                    $('#dept1').html('');
                    $('#dept1').append('<option value="" selected disabled>Select dept</option>');
                    $.each(response, function(key, value){
                        $('#dept1').append('<option data-name="'+value["dept_name"]+'"  data-code='+value["dept_code"]+' value='+value["dept_code"]+'>'+value["dept_code"]+' - '+value["dept_name"]+'</option>');
                    });
                  
                //     $('#dept1').html('');
                //     $('#dept1').append('<option value="" selected disabled>Select Item</option>');
                //     $.each(response, function(key, value){
                //     $('#dept1').append('<option data-name="'+value["DESCR"]+'"  data-code='+value["ACCOUNT_CODE"]+' value='+value["ACCOUNT_CODE"]+'>'+value["ACCOUNT_CODE"]+' - '+value["DESCR"]+'</option>');
                // });
                    
                // }
               
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        });
          
             
    });
    $("#down_table").on('change','#dept1',function(){
                var dept_code = $('#dept1').find(':selected').val();
                var dept_name = $('#dept1').find(':selected').attr("data-name");
                $('#select2-dept1-container').html(dept_code);
                $('#dept_amt1').val(dept_name);
        // $('#select2-dept1-container').val('');
                    // var dept_name1=$('.js-example-basic-single').find(':selected').attr("data-name");
                    // var dept_code1=$('.js-example-basic-single').find(':selected').attr("data-code");
                    // $('#select2-dept1-container').html(dept_code1);
                    // $('#dept_amt1').val(dept_name1);
        // $('#select2-dept1-container').val('');
        //   var dept_code=$('#dept1').find(':selected').attr("data-code");
        //   var dept_name=$('#dept_amt1').find(':selected').attr("data-name");
        //   $('#select2-dept1-container').html(dept_code);
        //   $('#dept_amt1').val(dept_name);
    });
    $("#down_table").on('change','#dept2',function(){
                var dept_code = $('#dept2').find(':selected').val();
                var dept_name = $('#dept2').find(':selected').attr("data-name");
                $('#select2-dept2-container').html(dept_code);
                $('#dept_amt2').val(dept_name);
        // $('#select2-dept1-container').val('');
                    // var dept_name1=$('.js-example-basic-single').find(':selected').attr("data-name");
                    // var dept_code1=$('.js-example-basic-single').find(':selected').attr("data-code");
                    // $('#select2-dept1-container').html(dept_code1);
                    // $('#dept_amt1').val(dept_name1);
        // $('#select2-dept1-container').val('');
        //   var dept_code=$('#dept1').find(':selected').attr("data-code");
        //   var dept_name=$('#dept_amt1').find(':selected').attr("data-name");
        //   $('#select2-dept1-container').html(dept_code);
        //   $('#dept_amt1').val(dept_name);
    });
    $("#down_table").on('change','#dept3',function(){
                var dept_code = $('#dept3').find(':selected').val();
                var dept_name = $('#dept3').find(':selected').attr("data-name");
                $('#select2-dept3-container').html(dept_code);
                $('#dept_amt3').val(dept_name);
        // $('#select2-dept1-container').val('');
                    // var dept_name1=$('.js-example-basic-single').find(':selected').attr("data-name");
                    // var dept_code1=$('.js-example-basic-single').find(':selected').attr("data-code");
                    // $('#select2-dept1-container').html(dept_code1);
                    // $('#dept_amt1').val(dept_name1);
        // $('#select2-dept1-container').val('');
        //   var dept_code=$('#dept1').find(':selected').attr("data-code");
        //   var dept_name=$('#dept_amt1').find(':selected').attr("data-name");
        //   $('#select2-dept1-container').html(dept_code);
        //   $('#dept_amt1').val(dept_name);
    });
   
    //   $("#down_table").on('change','#dept2',function(){
    //     $('#select2-dept2-container').val('');
    //                 var dept_name2=$('.js-example-basic-single').find(':selected').attr("data-name");
    //                 var dept_name2=$('.js-example-basic-single').find(':selected').attr("data-code");
    //                 $('#select2-dept2-container').html(dept_name2);
    //                 $('#dept_amt2').val(dept_name2);
    
    //     });
    //   $("#down_table").on('change','#dept3',function(){
    //     $('#select2-dept3-container').val('');
    //                 var dept_name3=$('.js-example-basic-single').find(':selected').attr("data-name");
    //                 var dept_code3=$('.js-example-basic-single').find(':selected').attr("data-code");
    //                 $('#select2-dept3-container').html(dept_code3);
    //                 $('#dept_amt3').val(dept_name3);
    
    //     });
        $("#down_table").on('change','#frt_code',function(){
         $('#select2-frt_code-container').val('');
         $('#select2-dept2-container').val('');
         $('#dept_amt2').val('');
          var frt_name=$('.frt_code').find(':selected').attr("data-name");
          var frt_code=$('.frt_code').find(':selected').attr("data-code");
          $('#select2-frt_code-container').html(frt_code);
          $('#frt_name').val(frt_name);
          $.ajax({
            url: 'api/Inventory_management/inventory_locals/bill_local_api.php',
            type: 'POST',
            data: {action: 'dept2',frt_code:frt_code},
            dataType: "json",
            success: function(response){
                console.log(response);
                if(response == null){
                    $('#dept2').val('');
                    $('#dept_amt2').val('');
                }else{
                    $('#dept2').html('');
                    $('#dept2').append('<option value="" selected disabled>Select dept</option>');
                    $.each(response, function(key, value){
                        $('#dept2').append('<option data-name="'+value["dept_name"]+'"  data-code='+value["dept_code"]+' value='+value["dept_code"]+'>'+value["dept_code"]+' - '+value["dept_name"]+'</option>');
                    });
                    
                }
               
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        });
          
             
      });
    $("#down_table").on('change','#disc_code',function(){
         $('#select2-disc_code-container').val('');
         $('#select2-dept3-container').val('');
         $('#dept_amt3').val('');
          var disc_name=$('.disc_code').find(':selected').attr("data-name");
          var disc_code=$('.disc_code').find(':selected').attr("data-code");
          $('#select2-disc_code-container').html(disc_code);
          $('#disc_name').val(disc_name);
          $.ajax({
            url: 'api/Inventory_management/inventory_locals/bill_local_api.php',
            type: 'POST',
            data: {action: 'dept3',disc_code:disc_code},
            dataType: "json",
            success: function(response){
                console.log(response);
                if(response == null){
                    $('#dept3').val('');
                    $('#dept_amt3').val('');
                }else{
                    $('#dept3').html('');
                    $('#dept3').append('<option value="" selected disabled>Select dept</option>');
                    $.each(response, function(key, value){
                        $('#dept3').append('<option data-name="'+value["dept_name"]+'"  data-code='+value["dept_code"]+' value='+value["dept_code"]+'>'+value["dept_code"]+' - '+value["dept_name"]+'</option>');
                    });
                    
                }
               
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        });
          
             
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
    $('#order_form').on('click','#division',function(){
      var company_code=$('#company_code').val();
        if(company_code==''){
          $('#msg1').html("select company first");
        }else{
          $('#division_table').dataTable().fnDestroy();
          table = $('#division_table').DataTable({
              dom: 'Bfrtip',
              orderCellsTop: true,
              fixedHeader: true,
              
              buttons: [
                  'copy', 'csv', 'excel', 'pdf', 'print',
              ]
          });
          // Setup - add a text input to each footer cell
          // $('#division_table thead tr').clone(true).appendTo( '#division_table thead' );
          $('#division_table thead tr:eq(1) th').each( function (i) {
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
            // division code dropdown
            $.ajax({
                url: 'api/Inventory_management/inventory_locals/bill_local_api.php',
                type: 'POST',
                data: {action: 'division_code'},
                dataType: "json",
                success: function(data){
                  console.log(data);
                  table.clear().draw();
                  // append data in datatable
                  var sno='0';
                  for (var i = 0; i < data.length; i++) {
                      sno++;
                      table.row.add([sno,data[i].division_name,data[i].division_code]);
                  }
                  table.draw();
                },
                error: function(error){
                    console.log(error);
                    alert("Contact IT Department");
                }
            }); 
          $('#DivisionFormModel').modal('show');
        }
    });
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
            url: 'api/Inventory_management/inventory_locals/bill_local_api.php',
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
                po: {
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
});
//validation

$("#order_form").on('change','#voucher_date',function(){
  var date = new Date($('#voucher_date').val());
  var year = date.getFullYear();
  $('#year').val(year);
  });
    
$('#example1').ready(function(){
  var company_code=$('#company_code').val();
  //on chAnge company code
  $("#order_form").on('change','#acc_desc',function(){
      var account_code=$('#acc_desc').find(':selected').val();
      // console.log(account_code);
      var detail=$('#acc_desc').find(':selected').attr("data-name");
      // console.log(detail);
      $('#select2-acc_desc-container').html(account_code);
      $('#detail').val(detail);
      $('#view_item').css('display','');
      $('#view_item').fadeIn("slow");
  });
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
            url: 'api/Inventory_management/inventory_locals/bill_local_api.php',
            type: 'POST',
            data: {action: 'item_detail',item_code:account_code},
            dataType: "json",
            success: function(data){
                // console.log(data);
                $('#division_i').val(data.division_name);
                $('#gen_i').val(data.gen_name);
                $('#um_i').val(data.unit_name);
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        });
  });
  
});
$('#example1').ready(function(){
  var i = 0;
  var total_amount = 0;
  $('.add').click(function(){
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
          $('#d_items tr:last').before('<tr id="tr'+i+'"><td><select name="acc_desc[]" id = "acc_desc'+i+'" class="form-control js-example-basic-single acc_desc" ></td><td><input name="detail[]" id = "detail'+i+'" class="form-control form-control-sm detail" readonly></td><td ><select style="font-size:9px !important;" name="type[]" id = "type'+i+'" class="form-control form-control-sm type"><option value="0" readonly="readonly" selected>Type</option><option value="N">N</option><option value="F">F</option><option value="S">S</option><option value="T">T</option></select></td><td><input type="number" name="quantity[]" id = "quantity'+i+'" class="form-control form-control-sm quantity"></td><td><input type="text" name="rate[]" id = "rate'+i+'"  class="form-control form-control-sm rate"></td><td><input type="text" name="amount[]" id = "amount'+i+'" onchange="total()" class="form-control form-control-sm total" readonly></td><td><input value='+division_i+' type="text" name="division_i[]" id = "division_i'+i+'" class="form-control form-control-sm division_i" readonly></td><td><input value='+gen_i+' type="text" name="gen_i[]" id = "gen_i'+i+'" class="form-control form-control-sm gen_i" readonly></td><td><input value='+um_i+' type="text" name="um_i[]" id = "um_i'+i+'" class="form-control form-control-sm um_i" readonly></td><td><button type = "button" id="'+i+'" class="btn btn-sm btn-danger remove"><b>X<b></button></td></tr>');          
          $('#type').prop("selectedIndex", 0).val();

        //   $('#d_items tr:last').before('<tr id="tr'+i+'"><td><select name="acc_desc[]" id = "acc_desc'+i+'" class="form-control js-example-basic-single acc_desc" ></td><td><input name="detail[]" id = "detail'+i+'" class="form-control form-control-sm detail" readonly></td><td ><select style="font-size:12px;" name="type[]" id = "type'+i+'" class="form-control form-control-sm type"><option val="" readonly="readonly" selected></option><option val="N">N</option><option val="F">F</option><option val="S">S</option><option val="T">T</option></select></td><td><input type="number" name="quantity[]" id = "quantity'+i+'" class="form-control form-control-sm quantity"></td><td><input type="text" name="rate[]" id = "rate'+i+'"  class="form-control form-control-sm rate"></td><td><input type="text" name="amount[]" id = "amount'+i+'" onchange="total()" class="form-control form-control-sm total" readonly></td><td><button type = "button" id="'+i+'" class="btn btn-sm btn-danger remove"><b>X<b></button></td></tr>');          
          // Item code dropdown
          $.ajax({
            url: 'api/Inventory_management/inventory_locals/bill_local_api.php',
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
                    url: 'api/Inventory_management/inventory_locals/bill_local_api.php',
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
     
  $('#example1').on('click','.remove', function(){
      var button_id = $(this).attr("id");
      var remove_amount = $('#amount'+button_id+'').val();
      var disc_rm = $('#disc'+button_id+'').val();
      var frt_rm = $('#frt'+button_id+'').val();
      var excl_rm = $('#excl'+button_id+'').val();
      remove_amount = remove_amount.replaceAll(',','');
      disc_rm = disc_rm.replaceAll(',','');
      frt_rm = frt_rm.replaceAll(',','');
      excl_rm = excl_rm.replaceAll(',','');
      $('#tr'+button_id+'').remove();
      //   $('#um').val('');
      var current_amount = $('#total').text();
      var current_disc = $('#disc_t').text();
      var current_frt = $('#frt_t').text();
      var current_excl = $('#excl_t').text();
      current_amount = current_amount.replaceAll(',','');
      current_disc = current_disc.replaceAll(',','');
      current_frt = current_frt.replaceAll(',','');
      current_excl = current_excl.replaceAll(',','');
      //total amount
      var total_amount = parseFloat(current_amount) - parseFloat(remove_amount);
      if(isNaN(total_amount)){
        total_amount='0';
      }else{
        total_amount=total_amount.toLocaleString();
      }
      $('#total').text(total_amount);

      //total_disc
      var total_disc = parseFloat(current_disc) - parseFloat(disc_rm);
      if(isNaN(total_disc)){
        total_disc='0';
      }else{
        total_disc=total_disc.toLocaleString();
      }
      $('#disc_t').text(total_disc);

      //total_frt
      var total_frt = parseFloat(current_frt) - parseFloat(frt_rm);
      if(isNaN(total_frt)){
        total_frt='0';
      }else{
        total_frt=total_frt.toLocaleString();
      }
      $('#frt_t').text(total_frt);
      
      //total_excl
      var total_excl = parseFloat(current_excl) - parseFloat(excl_rm);
      if(isNaN(total_excl)){
        total_excl='0';
      }else{
        total_excl=total_excl.toLocaleString();
      }
      $('#excl_t').text(total_excl);
  });
});
$("#order_form").on("submit", function (e) {
    // if ($("#order_form").valid()) {
        var rowCount = $("#example1 tr").length;
        if(rowCount > 2){
          
            e.preventDefault();
          var formData = new FormData(this);
          var charge_code=$('#charge_code').val();
          var frt_code=$('#frt_code').val();
          var disc_code=$('#disc_code').val();
          formData.append('charge_code',charge_code); 
          formData.append('frt_code',frt_code); 
          formData.append('disc_code',disc_code); 
          var dept1=$('#dept1').val();
          var dept2=$('#dept2').val();
          var dept3=$('#dept3').val();
          formData.append('dept1',dept1); 
          formData.append('dept2',dept2); 
          formData.append('dept3',dept3); 
          
          var total=$('#total').text();
          formData.append('total',total);
          formData.append('action','insert');
          $.ajax({
            url: 'api/Inventory_management/inventory_locals/bill_local_api.php',
              type: 'POST',
              data: formData,
              contentType: false,
              cache: false,
              processData:false,
              
              success: function(response)
              {
                console.log(response);
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
                            $.get('inventory_management/inventory_local/add_bill_local.php',function(data,status){
                            
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
    // }
    
});
$('#company_code').keyup(function(){
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
        url: 'api/Inventory_management/inventory_locals/bill_local_api.php',
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
// $('#po').keyup(function(){
//     if(company_code != ''){
//         $('.po_msg').css('display','none');
//         $('#po_table').dataTable().fnDestroy();
//       table = $('#po_table').DataTable({
//            dom: 'Bfrtip',
//            orderCellsTop: true,
//            fixedHeader: true,
           
//            buttons: [
//                'copy', 'csv', 'excel', 'pdf', 'print',
//            ]
//         });
//         // Setup - add a text input to each footer cell
//         // $('#company_table thead tr').clone(true).appendTo( '#company_table thead' );
//         $('#po_table thead tr:eq(1) th').each( function (i) {
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
//         url: 'api/setup/bill_local_api.php',
//         type: 'POST',
//         data: {action: 'po_code'},
//         dataType: "json",
//         success: function(response){
//             // console.log(response);
//         table.clear().draw();
//         // append data in datatable
//         var sno='0';
//         for (var i = 0; i < response.length; i++) {
//             sno++;
//             table.row.add([sno,response[i].PARTY_NAME,response[i].refnum,response[i].doc_date,response[i].po_no,response[i].total_net_amt,response[i].party_code,response[i].co_code,response[i].doc_year,response[i].doc_type,response[i].doc_no]);
//         }
//         table.draw();
//         },
//         error: function(error){
//             console.log(error);
//             alert("Contact IT Department");
//         }
//     });  
//   $('#poFormModel').modal('show');
//     }else{
//       $('.po_msg').css('display','block');
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
    $.get('inventory_management/inventory_local/bill_local.php', function(data,status){
        $("#content").html(data);
    });
});
$("#add_po_local_breadcrumb").on("click", function () {
    $.get('inventory_management/inventory_local/add_bill_local.php', function(data,status){
        $("#content").html(data);
    });
});
</script>
<?php include '../../includes/loader.php'?>