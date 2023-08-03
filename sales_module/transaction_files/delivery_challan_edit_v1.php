<?php
session_start();
?>
<style>
select{
width:82% !important;
}
#btn-back-to-top {
position: fixed;
bottom: 20px;
right: 20px;
/* display: none; */
}
html {
scroll-behavior: smooth;
}
#down {
margin-top: -1%;
padding-top: -1%;
} 
input,select,textarea,.select2-selection{
border:1px solid black !important;
}
.input-group-prepend{
/* border-right:2px solid black !important */
}
.select2-hidden-accessible{
border:1px solid black !important;

}
.select2-selection{
background-color: #ccd4e1 !important  
}
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap");
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
border: 1px solid #dddddd;
text-align: left;
font-size:15px
}
tr:nth-child(even) {
background-color: #dddddd;
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
}.hover-item,.odd:hover {
	background-color: gray;
  color:white
}.even:hover{
	background-color: gray;
  color:white
}#salesman{
    background-color:#afafaf85;
}#party{
    background-color:#afafaf85;
}#division{
    background-color:#afafaf85;
}#company_code{
    background-color:#afafaf85;
}td input{
    font-size:12px !important;
}.select2-selection__rendered,.select2-results{
    font-size:12px !important;
}
</style>
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Sale Order</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="tf_breadcrumb"> Transaction Files</button></li>
                  <li class="breadcrumb-item active"><button class="btn btn-sm" id="smd_breadcrumb"> Delivery Challan Edit</button></li>
                <li class="breadcrumb-item">Edit Delivery Challan</li>
              </ol>
            </div>   
          </div>
        </div><!-- /.container-fluid -->
      </section>

     
      <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-12">
                  <div class="card">
                    <div style="padding:0 !important;" class="card-body">
                        <div class="container">
                          <form method = "post" id = "order_form">
                            <?php include '../../display_message/display_message.php'?>
                            <div class="row">
                                <div class="col-sm-8">
                                <!-- <h3 class="card-title">Language Records</h3> -->
                                </div>
                                <div class="col-sm-2 text-right p-2">
                                        <button style="display:none" type="button" class="btn btn-info btn-sm mt-2 702a1b_1" id="view_party"><i class="fa fa-eye"></i> View Party Detail</button>
                                </div>
                                <div class="col-sm-2 text-right p-2">
                                        <button style="display:none" type="button" class="btn btn-info btn-sm mt-2 702a1b_1" id="view_item"><i class="fa fa-eye"></i> View Item Detail</button>
                                </div>
                            </div>
                              <div class="row">
                                <div style="border  :2px solid #c2c7cb; padding-top:8px" class="col-lg-6">
                                    <div class="row">
                                        <div class="col-sm-2 form-group">
                                            <label>DC Detail:</label> 
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <!-- <label for="">Sale Code :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input title="Sale Code" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="order_key" id="order_key" class="form-control form-control-sm" placeholder="Order No" readonly >
                                            </div>
                                        </div>
                                        <div class="col-sm-1 form-group">
                                            <label>Doc#:</label> 
                                        </div>
                                        <div class="col-md-5 form-group">
                                            <!-- <label for="">Document Number :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="doc_no" id="doc_no" class="form-control form-control-sm" placeholder="Document No" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <label>Company:</label> 
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <!-- <label for="">Company Code :<span style="color:red">*</span></label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                                </div>
                                                <input maxlength="30" type="text" name="company_code" id="company_code" class="form-control form-control-sm" placeholder="Select Company" readonly>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <!-- <label for="inputCompanyName">Company Name :</label><span style="color:red;">*</span> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="company_name" id="company_name" class="form-control form-control-sm" placeholder="Company Name" readonly >
                                            </div>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <label>Division:</label> 
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <!-- <label for="">Division :<span style="color:red">*</span></label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                                </div>
                                                <input maxlength="30" type="text" name="division" id="division" class="form-control form-control-sm" placeholder="Select Division" readonly>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <!-- <label for="">Division Name :</label><span style="color:red;">*</span> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input maxlength="30" type="text" name="division_name" id="division_name" class="form-control form-control-sm" placeholder="Title Name" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <label>Party:</label> 
                                        </div>
                                        <div class="col-md-10 form-group">
                                            <!-- <label for="">Party :<span style="color:red">*</span></label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                                </div>
                                                <input maxlength="30" type="text" name="party" id="party" class="form-control form-control-sm" placeholder="Select Party" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <label>Salesman:</label> 
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <!-- <label for="">Division :<span style="color:red">*</span></label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                                </div>
                                                <input maxlength="30" type="text" name="salesman" id="salesman" class="form-control form-control-sm" placeholder="Select Salesman" readonly>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <!-- <label for="">Division Name :</label><span style="color:red;">*</span> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input maxlength="30" type="text" name="salesman_name" id="salesman_name" class="form-control form-control-sm" placeholder="Salesman Name" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <label>Date:</label> 
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <!-- <label for=""> Date :</label><span style="color:red;">*</span> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input type="date" name="po_date" id="po_date" class="form-control form-control-sm" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <label>PO Cat:</label> 
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <!-- <label for="">PO Catg L/I :<span style="color:red">*</span></label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-list-alt"></i></span>
                                                </div>
                                                <select style="width:73% !important" title="purchase mode" name="purchase_mode" class="form-control form-control-sm" id="purchase_mode" >
                                                    <option value="">Select PO</option>
                                                    <option value="I">I</option>
                                                    <option value="L">L</option>
                                                </select>                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="border  :2px solid #c2c7cb; padding-top:8px" class="col-lg-6">
                                    <div class="row">
                                        <div class="col-sm-2 form-group">
                                            <label>Date:</label> 
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <!-- <label for=""> Date :</label><span style="color:red;">*</span> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input type="date" name="voucher_date" id="voucher_date" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <label>Order Ref</label> 
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <!-- <label for="">CO Ref :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="order_ref" id="order_ref" class="form-control form-control-sm" placeholder="Order No" >
                                            </div>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <label>Party Ref:</label> 
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <!-- <label for="">Party Ref :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="party_ref" id="party_ref" class="form-control form-control-sm" placeholder="Reference No" >
                                            </div>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <label>Voucher#:</label> 
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <!-- <label for="">Voucher# :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="v_no" id="v_no" class="form-control form-control-sm" placeholder="Voucher No" >
                                            </div>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <label>Ship Mode:</label> 
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <!-- <label for="">PO Catg L/I :<span style="color:red">*</span></label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-list-alt"></i></span>
                                                </div>
                                                <select style="width:73% !important" title="purchase mode" name="ship_mode" class="form-control form-control-sm" id="ship_mode" >
                                                    <option value="">Select Ship Mode</option>
                                                    <option value="By_Air">By Air</option>
                                                    <option value="Hand_Deliver">Hand Deliver</option>
                                                    <option value="Leopards">Leopards O/N</option>
                                                    <option value="e2e">e2e O/L</option>
                                                    <option value="Daewoo">Daewoo</option>
                                                    <option value="G_T_C">G.T.C</option>
                                                    <option value="Others">Others</option>
                                                    <option value="TCS">TCS</option>
                                                </select>                                
                                            </div>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <label>Ship#:</label> 
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <!-- <label for="">Ship# :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="ship_no" id="ship_no" class="form-control form-control-sm" placeholder="Ship #" >
                                            </div>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <label>Remarks:</label> 
                                        </div>
                                        <div class="col-md-10  form-group">
                                            <!-- <label for="">Narration :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <textarea rows="1" name="narration" id="narration" class="form-control form-control-sm" placeholder="Narration" ></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 form-group text-center">
                                            <span id="msg3" style="color: red;font-size: 13px;"></span>
                                        </div>
                                    </div>
                                </div>
                              </div>
                                <div class="row justify-content-center">
                                    <div class="col-sm-12">
                                        <div style="height:50px" class="loading">
                                          <span style="text-align:center;font-weight:bold;">Order Details</span>
                                        </div>
                                    </div>
                                </div>
                              <div class="card-body">
                                  <table id="example1" class="table table-bordered table-striped table-responsive-lg">
                                      <thead>
                                          <tr>
                                              <th style="width:10% !important">Item Code</th>
                                              <th style="width: 12% !important;">Name</th>
                                              <th style="width:10% !important">Type</th>
                                              <th style="width:10% !important">Loc</th>
                                              <th style="width: 8% !important;">Quantity</th>
                                              <th style="width: 10% !important;">Batch No</th>
                                              <th style="width: 7% !important;">Expiry Dt</th>
                                              <th style="width: 10% !important;">GD No</th>
                                              <th style="width: 7% !important;">GD Dt</th>
                                              <th style="width: 10% !important;">Item HScode</th>
                                              <th style="width: 10% !important;">Tax Rate</th>
                                              <th>Action</th>
                                          </tr>
                                      </thead>
                                      <tbody id="d_items">
                                        <tr id="main_tr">
                                            <td style="width:10%"><select name="" id = "acc_desc" class="form-control js-example-basic-single acc_desc"></select></td>
                                            <td style="width: 12%;"><textarea rows="1"   name="" id = "detail" class="form-control form-control-sm detail" readonly></textarea></td>
                                            <td style="width:10%" ><select style="font-size:9px;" name="" id = "type" class="form-control form-control-sm type"><option value="0" readonly="readonly" selected>Type</option><option value="N">N</option><option value="F">F</option><option value="S">S</option><option value="T">T</option></select></td>
                                            <td style="width:10%"><select name="" id = "loc" class="form-control js-example-basic-single loc"></select></td>
                                            <td style="width: 8%;"><input  style="text-align:right; padding:0 1px 0 0" type="text"  name="" id="quantity" class="form-control form-control-sm quantity"></td>
                                            <td style="width: 10%;"><textarea rows="1"   name="" id = "batch_no" class="form-control form-control-sm batch_no" readonly></textarea></td>
                                            <td style="width: 7%;"><input type="date" tabindex="-1"  name="" id = "expiry_dt" class="form-control form-control-sm expiry_dt" readonly></td>
                                            <td style="width: 10%;"><textarea rows="1"   name="" id = "gd_no" class="form-control form-control-sm gd_no" readonly></textarea></td>
                                            <td style="width: 7%;"><input type="date" tabindex="-1"  name="" id = "gd_dt" class="form-control form-control-sm gd_dt" readonly></td>
                                            <td style="width: 10%;"><input  type="text" tabindex="-1"  name="" id = "item_hscode" class="form-control form-control-sm item_hscode" readonly></td>
                                            <td style="width: 10%;"><input type="text" tabindex="-1"  name="" id = "tax_rate" class="form-control form-control-sm tax_rate" readonly></td>
                                            <td ><button type = "button" class="btn btn-sm btn-primary add"><i class="fa fa-plus"></i></button></td>
                                        </tr>
                                      </tbody>
                                          <tr id="last_tr">
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <!-- <td></td> -->
                                              <!-- <td></td> -->
                                              <td style="text-align:right;">Total:</td>
                                              <td style="font-weight:bold" name="total" id="total"><b>0</b></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                          </tr>
                                  </table>
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
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Order:</h3>
                    </div>
                    <div class="col-md-8">
                      <p id="order" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                    <div class="col-md-4">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">DC Quantity:</h3>
                    </div>
                    <div class="col-md-8">
                      <p id="dc_qty" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                    <div class="col-md-4">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Balance Quantity:</h3>
                    </div>
                    <div class="col-md-8">
                      <p id="bal_qty" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                    <div class="col-md-4">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">GD Number:</h3>
                    </div>
                    <div class="col-md-8">
                      <p id="gd_no" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                    <div class="col-md-4">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">GD Date:</h3>
                    </div>
                    <div class="col-md-8">
                      <p id="gd_date" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                    <div class="col-md-4">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Item HSCode:</h3>
                    </div>
                    <div class="col-md-8">
                      <p id="item_hs" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                    <div class="col-md-4">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Tax Rate:</h3>
                    </div>
                    <div class="col-md-8">
                      <p id="tax_r" class="card-title" style=" font-weight:bold;"></p>
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
<?php

include '../../includes/security.php';
?>
<script>
$(document).ready(function(){
    $("#order_form").on('focus','.quantity',function(){
        var button_id = $(this).attr("id");
        if(button_id =='quantity'){
        var p_qty_id='';
        }else{
        var p_totalid = button_id.split("y");
        var p_qty_id=p_totalid[1];
        }
        var previous_qty= $('#quantity'+p_qty_id).val();
        sessionStorage.setItem("previous_qty", previous_qty);
    });
    $("#order_form").on('change','.quantity',function(){
        var previous_qtys=sessionStorage.getItem('previous_qty');
        if(previous_qtys == ""){
          previous_qtys=0;
        }else{
          previous_qtys = previous_qtys.replaceAll(',','');
        }
        // console.log(previous_qtys);
        var total=$('#total').text();
        if(total == '' || total == '0' || total=='0.00'){
            minuss=0;
        }else{
          minuss = total.replaceAll(',','');
        }
        var minus=parseFloat(minuss) - parseFloat(previous_qtys);
        // console.log(minus);
        var button_id = $(this).attr("id");
        if(button_id =='quantity'){
            quantity_id='';
        }else{
        var quantityid = button_id.split("y");
        quantity_id=quantityid[1];
        }
        var quantity=$('#quantity'+quantity_id).val();
        if (quantity.indexOf(',') > -1) { 
        pre_quantity = quantity.replaceAll(',','');
        }else{
          pre_quantity = quantity;
        }
        var final_qty=parseFloat(minus) + parseFloat(pre_quantity);
        var final_qty=new Intl.NumberFormat(
            'en-US', { style: 'currency', 
            currency: 'USD',
            currencyDisplay: 'narrowSymbol'}).format(final_qty);
        var final_qty=final_qty.replace(/[$]/g,'');
        $('#total').text(final_qty);

        var quantity=new Intl.NumberFormat(
            'en-US', { style: 'currency', 
            currency: 'USD',
            currencyDisplay: 'narrowSymbol'}).format(pre_quantity);
        var quantity=quantity.replace(/[$]/g,'');
        var  show_quantity=quantity;
        $('#quantity'+quantity_id).val(show_quantity);

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
          division: {
            required: true,
          },
          party: {
            required: true,
          },
          salesman: {
            required: true,
          },
          doc_no: {
            required: true,
          },
          po_code: {
            required: true,
          },
          purchase_mode: {
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
    
$('#view_party').click(function(){
    var party_code=$('#party').val();
    // console.log(party_code);
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

$(document).ready(function(){
    var co_code=<?php echo $_GET['co_code'] ?>;
    var div_code=<?php echo $_GET['div_code'] ?>;
    var party_code=<?php echo $_GET['party_code'] ?>;
    // console.log(party_code);
    var salesman_code=<?php echo $_GET['salesman_code'] ?>;
    var po_catg="<?php echo $_GET['po_catg'] ?>";
    var doc_year=<?php echo $_GET['doc_year'] ?>;
    var doc_no=<?php echo $_GET['doc_no'] ?>;
    var po_no="<?php echo $_GET['po_no'] ?>";
    $('#order_key').val(po_no);
    $('#doc_no').val(doc_no);
    $('#company_code').val(co_code);
    $('#division').val(div_code);
    $('#party').val(party_code);
    $('#purchase_mode').val(po_catg);
    $('#salesman').val(salesman_code);
    $("#purchase_mode").attr({disabled:'readonly !important'});
    // $('#purchase_mode').enable(false);
    // $('#purchase_mode').attr('disabled','readonly');
  $.ajax({
    url: 'api/sales_module/transaction_files/delivery_challan_api.php',
      type : "post",
      data : {action:'edit',doc_no:doc_no,co_code:co_code,doc_year:doc_year,div_code:div_code,party_code:party_code,salesman_code:salesman_code,po_catg:po_catg},
      success: function(response)
      {
        console.log(response);
        $('#voucher_date').val(response.doc_date);
        $('#ship_mode').val(response.ship_mode);
        $('#ship_no').val(response.ship_no);
        $('#narration').val(response.remarks);
        $('#order_ref').val(response.order_refnum);
        $('#party_ref').val(response.order_party_ref);
        $('#v_no').val(response.refnum2);
        $('#narration').val(response.remarks);
        $('#po_date').val(response.po_date);
        $('#company_name').val(response.co_name);
        $('#division_name').val(response.division_name);
        $('#party_name').val(response.party_name);
        $('#salesman_name').val(response.sman_name);
    
        // ACCOUNT code dropdown
        $.ajax({
            url: 'api/sales_module/transaction_files/sales_order_api.php',
            type: 'POST',
            data: {action: 'item_code',company_code:co_code},
            dataType: "json",
            success: function(data){
                $("#ajax-loader").hide();
                // console.log(data);
                $('#acc_desc').html('');
                $('#acc_desc').append('<option value="" selected disabled>Select Item</option>');
                $.each(data, function(key, value){
                    $('#acc_desc').append('<option data-name="'+value["item_descr"]+'"  data-code='+value["item_div"]+' value='+value["item_div"]+'>'+value["item_div"]+' - '+value["item_descr"]+'</option>');
                });
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        });  
        var account_code=$('#acc_desc').find(':selected').val();
        var detail=$('#acc_desc').find(':selected').attr("data-name");
        $('#select2-acc_desc-container').html(account_code);
        $('#detail').val(detail);

        $.ajax({
            url: 'api/sales_module/transaction_files/delivery_challan_api.php',
            type: 'POST',
            data: {action: 'edit_table',co_code:co_code,doc_no:doc_no,party_code:party_code,
              div_code:div_code,po_catg:po_catg,doc_year:doc_year},
            dataType: "json",
            success: function(data){
                // console.log(data);
                var total_quantity=0;
                var j=1;
                var k=0;
                var l=0;
                var m=0;
                var n=1;
                if(data.length >= 1){
                    for(var i=1;i<=data.length;i++){
                        $('#d_items tr:last').before('<tr id="tr'+i+'"><td><select name="acc_desc[]" id = "acc_desc'+i+'" class="form-control js-example-basic-single acc_desc" ></td><td><input name="detail[]" id = "detail'+i+'" class="form-control form-control-sm detail" readonly></td><td ><select style="font-size:9px !important;" name="type[]" id = "type'+i+'" class="form-control form-control-sm type"><option value="0" readonly="readonly" selected>Type</option><option value="N">N</option><option value="F">F</option><option value="S">S</option><option value="T">T</option></select></td><td><select name="loc[]" id = "loc'+i+'" class="form-control js-example-basic-single loc" ></td><td><input type="text" name="quantity[]" id = "quantity'+i+'" class="form-control form-control-sm quantity"></td><td><textarea rows="1" type="text" name="batch_no[]" id = "batch_no'+i+'"  class="form-control form-control-sm batch_no"></textarea></td><td><input type="date" name="expiry_dt[]" id = "expiry_dt'+i+'" class="form-control form-control-sm expiry_dt" readonly></td><td><textarea value='+gd_no+' rows="1" name="gd_no[]" id = "gd_no'+i+'" class="form-control form-control-sm gd_no" readonly></textarea></td><td><input type="date" name="gd_dt[]" id = "gd_dt'+i+'" class="form-control form-control-sm gd_dt" readonly></td><td><input value='+item_hscode+' type="text" name="item_hscode[]" id = "item_hscode'+i+'" class="form-control form-control-sm item_hscode" readonly></td><td><input value='+tax_rate+' type="text" name="tax_rate[]" id = "tax_rate'+i+'" class="form-control form-control-sm tax_rate" readonly></td><td><button type = "button" id="'+i+'" class="btn btn-sm btn-danger remove"><b>X<b></button></td></tr>');          
                        
                        // ACCOUNT code dropdown
                        $.ajax({
                            url: 'api/sales_module/transaction_files/sales_order_api.php',
                            type: 'POST',
                            data: {action: 'item_code',company_code:co_code},
                            dataType: "json",
                            // async:false,
                            success: function(data1){
                                // $("#ajax-loader").show();
                                console.log(data1);
                                $('#acc_desc'+j).html('');
                                $('#acc_desc'+j).addClass('js-example-basic-single');
                                $('.js-example-basic-single').select2();
                                $('#acc_desc'+j).append('<option value="" selected disabled>Select Item</option>');
                                
                                $.each(data1, function(key, value){
                                  $('#acc_desc'+j).append('<option data-name="'+value["item_descr"]+'"  data-code='+value["item_div"]+' value='+value["item_div"]+'>'+value["item_div"]+' - '+value["item_descr"]+'</option>');
                                  $('#acc_desc'+j).val(data[l].item_code);
                                });
                                // console.log(j);
                                var account_code=$('#acc_desc'+j).find(':selected').val();
                                var detail=$('#acc_desc'+j).find(':selected').attr("data-name");
                                $('#select2-acc_desc'+j+'-container').html(account_code);
                                $('#detail'+j).val(detail);
                                l++;
                                j++;
                                // Location code dropdown
                                $.ajax({
                                    url: 'api/sales_module/transaction_files/delivery_challan_api.php',
                                    type: 'POST',
                                    data: {action: 'location_code',item_code:account_code},
                                    dataType: "json",
                                    success: function(response){
                                        // console.log(data[1].loc_code);
                                        $("#ajax-loader").hide();
                                        $('#loc'+n).html('');
                                        $('#loc'+n).append('<option value="0" selected  readonly="readonly">Select Account</option>');
                                        $.each(response, function(key, value){ 
                                            $('#loc'+n).append('<option data-name="'+value["loc_name"]+'"  data-code='+value["loc_code"]+' value='+value["loc_code"]+'>'+value["loc_code"]+' - '+value["loc_name"]+'</option>');
                                            $('#loc'+n).val(data[m].loc_code);
                                        });
                                        m++;
                                        n++;
                                    },
                                    error: function(error){
                                        console.log(error);
                                        alert("Contact IT Department");
                                    }
                                }); 
                                        
                            },
                            error: function(error){
                                console.log(error);
                                alert("Contact IT Department");
                            }
                        }); 
                        // var hscode=data[k].item_hscode==''?'':data[k].item_hscode;
                        $('#item_hscode'+i).val(data[k].item_hscode);
                        // var tax_rate=data[k].stax_rate==''?'0':data[k].stax_rate;
                        $('#tax_rate'+i).val(data[k].stax_rate);
                        var qty=data[k].qty;
                        var qtys=new Intl.NumberFormat(
                          'en-US', { style: 'currency', 
                            currency: 'USD',
                          currencyDisplay: 'narrowSymbol'}).format(qty);
                        var qtys=qtys.replace(/[$]/g,''); 
                        $('#quantity'+i).val(qtys);
                        $('#quantity'+i+'').css('text-align','right ');
                        $('#quantity'+i+'').css('padding','0 1px 0 0');
                        $('#type'+i).val(data[k].item_type);
                        total_quantity = parseFloat(total_quantity) + parseFloat(qty);
                        var total_quantity_com=new Intl.NumberFormat(
                          'en-US', { style: 'currency', 
                            currency: 'USD',
                          currencyDisplay: 'narrowSymbol'}).format(total_quantity);
                        var total_quantity_com=total_quantity_com.replace(/[$]/g,''); 
                        $('#total').text(total_quantity_com);
                        k++;

                }
              }

            },
            error: function(error){
                console.log(error);
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
});
 
$('#example1').on('click','.detail',function(){
    $('#msg').html('');
    var button_id= $(this).attr('id');
    var id = button_id.split("l");
    id=id[1];
    // if(id != ''){
      var item_code=$('#acc_desc'+id).val();
      if(item_code =='' || item_code == null){
       $('#msg').html("select the item to get details.")
      }
      else{
        $('#msg').html('');
        var qty=$('#quantity'+id).val();
          // document no dropdown
          $.ajax({
              url: 'api/sales_module/transaction_files/delivery_challan_api.php',
              type: 'POST',
              data: {action: 'item_detail',item_code:item_code},
              dataType: "json",
              success: function(data){
                  console.log(data.bal_qty);
                  $('#division_i').html(data.division_name);
                  $('#gen_i').html(data.gen_name);
                  $('#gd_no').html(data.gd_no);
                  $('#order').html(qty);
                  $('#dc_qty').html(qty);
                  $('#bal_qty').html(data.bal_qty==null?'0':data.bal_qty);
                  $('#gd_date').html(data.gd_date);
                  $('#item_hs').html(data.hscode);
                  $('#tax_r').html(data.tax_rate);
          $('#ViewItemModal').modal('show');
              },
              error: function(error){
                  console.log(error);
                  alert("Contact IT Department");
              }
          });
      }
    // }
});   
// EditItemModal   

$('#example1').on('click','.btn_edit',function(){
      var company_code=$('#company_code').val();
      var button_id = $(this).attr("id");
      var id = button_id.split("t");
      id=id[1];
      var acc_desc=$('#acc_desc'+id).val();
      var detail=$('#detail'+id).val();
      var type=$('#type'+id).val();
      var quantity=$('#quantity'+id).val();
      var rate=$('#rate'+id).val();
      var amounts=$('#amount'+id).val();
      var disc_e=$('#disc'+id).val();
      var frt_e=$('#frt'+id).val();
      var excl_e=$('#excl'+id).val();
      rates = rate.replaceAll(',','');
      disc = disc_e.replaceAll(',','');
      frt = frt_e.replaceAll(',','');
      excl = excl_e.replaceAll(',','');
      // console.log(amount);
      amount = amounts.replaceAll(',','');
      var disc_m_e=disc > 0 ?disc*100/amount:'0';
      var discs_m_e=new Intl.NumberFormat(
      'en-US', { style: 'currency', 
          currency: 'USD',
      currencyDisplay: 'narrowSymbol'}).format(disc_m_e);
      var discs_m_e=discs_m_e.replace(/[$]/g,'');
      var frt_m_e=frt > 0?frt/quantity:'0';
      var frts_m_e=new Intl.NumberFormat(
      'en-US', { style: 'currency', 
          currency: 'USD',
      currencyDisplay: 'narrowSymbol'}).format(frt_m_e);
      var frts_m_e=frts_m_e.replace(/[$]/g,'');
      var excl_m_e=frt_m_e > 0?rates-frt_m_e:'0';
      var excls_m_e=new Intl.NumberFormat(
      'en-US', { style: 'currency', 
          currency: 'USD',
      currencyDisplay: 'narrowSymbol'}).format(excl_m_e);
      var excls_m_e=excls_m_e.replace(/[$]/g,'');
      if(frt_m_e == '0' || frt_m_e == '0.00' || frt_m_e == ''){
        $('#excl_m_e').val('0.00');
        $('#excl_e').val('0.00');
      }else{
        $('#excl_m_e').val(excls_m_e);
        $('#excl_e').val(excl_e);
      }
      // ACCOUNT code dropdown
      $.ajax({
          url: 'api/sales_module/transaction_files/sales_order_api.php',
          type: 'POST',
          data: {action: 'item_code',company_code:company_code},
          dataType: "json",
          success: function(response){
              $("#ajax-loader").hide();
              // console.log(response);
              $('#item_code_e').html('');
              $('#item_code_e').append('<option value="" selected disabled>Select Item</option>');
              $.each(response, function(key, value){
                  $('#item_code_e').append('<option data-name="'+value["item_descr"]+'"  data-code='+value["item_div"]+' value='+value["item_div"]+'>'+value["item_div"]+' - '+value["item_descr"]+'</option>');
              });
              $('#item_code_e').val(acc_desc);
          },
          error: function(error){
              console.log(error);
              alert("Contact IT Department");
          }
      }); 
      $("#item_edit").on('change','#item_code_e',function(){
          var account_code=$('#item_code_e').find(':selected').val();
          // console.log(account_code);
          var details=$('#item_code_e').find(':selected').attr("data-name");
          // console.log(detail);
          $('#select2-item_code_e-container').html(account_code);
          $('#item_name').val(details);
      }); 
      $('#item_name').val(detail);
      $('#type_e').val(type);
      $('#quantity_e').val(quantity);
      $('#rate_e').val(rate);
      $('#amount_e').val(amounts);
      $('#disc_m_e').val(discs_m_e);
      $('#frt_m_e').val(frts_m_e);
      $('#disc_e').val(disc_e);
      $('#frt_e').val(frt_e);
      //css
      $('#disc_m_e').css('text-align','right');
      $('#disc_m_e').css('padding','0 1px 0 0');
      $('#frt_m_e').css('text-align','right');
      $('#frt_m_e').css('padding','0 1px 0 0');
      $('#excl_m_e').css('text-align','right');
      $('#excl_m_e').css('padding','0 1px 0 0');
      $('#disc_e').css('text-align','right');
      $('#disc_e').css('padding','0 1px 0 0');
      $('#frt_e').css('text-align','right');
      $('#frt_e').css('padding','0 1px 0 0');
      $('#excl_e').css('text-align','right');
      $('#excl_e').css('padding','0 1px 0 0');
      $('#amount_e').css('text-align','right');
      $('#amount_e').css('padding','0 1px 0 0');
      $('#rate_e').css('text-align','right');
      $('#rate_e').css('padding','0 1px 0 0');
      $('#quantity_e').css('text-align','right');
      $('#quantity_e').css('padding','0 1px 0 0');
      $('#EditItemModal').modal('show');
      //change quantity
      $("#item_edit").on('change','#quantity_e',function(){
        var total=$('#total').html();
        var disc_t=$('#disc_t').html();
        var frt_t=$('#frt_t').html();
        var excl_t=$('#excl_t').html();
        var quantity=$('#quantity_e').val();
        quantity_e = quantity.replaceAll(',','');
        if(quantity_e == '' || isNaN(quantity_e)){
          quantity_e=0;
        }
        var rate=$('#rate_e').val();
        rate_e = rate.replaceAll(',','');
        if(rate_e == '' || isNaN(rate_e)){
          rate_e=0;
        }
        var amount_e=parseFloat(rate_e) * parseFloat(quantity_e);
        var amount_e=new Intl.NumberFormat(
            'en-US', { style: 'currency', 
            currency: 'USD',
            currencyDisplay: 'narrowSymbol'}).format(amount_e);
        amount_e=amount_e.replace(/[$]/g,'');
        $('#amount_e').val(amount_e);
        $('#disc_m_e').val('0.00');
        $('#frt_m_e').val('0.00');
        $('#excl_m_e').val('0.00');
        $('#disc_e').val('0.00');
        $('#frt_e').val('0.00');
        $('#excl_e').val(amount_e);
      });
      //change rate
      $("#item_edit").on('change','#rate_e',function(){
        var total=$('#total').html();
        var disc_t=$('#disc_t').html();
        var frt_t=$('#frt_t').html();
        var excl_t=$('#excl_t').html();
        var quantity=$('#quantity_e').val();
        quantity_e = quantity.replaceAll(',','');
        if(quantity_e == '' || isNaN(quantity_e)){
          quantity_e=0;
        }
        var rate=$('#rate_e').val();
        rate_e = rate.replaceAll(',','');
        if(rate_e == '' || isNaN(rate_e)){
          rate_e=0;
        }
        var amount_e=parseFloat(rate_e) * parseFloat(quantity_e);
        var amount_e=new Intl.NumberFormat(
            'en-US', { style: 'currency', 
            currency: 'USD',
            currencyDisplay: 'narrowSymbol'}).format(amount_e);
        amount_e=amount_e.replace(/[$]/g,'');
        $('#amount_e').val(amount_e);
        var rates_e=new Intl.NumberFormat(
            'en-US', { style: 'currency', 
            currency: 'USD',
            currencyDisplay: 'narrowSymbol'}).format(rate);
        rates_e=rates_e.replace(/[$]/g,'');
        $('#rate_e').val(rates_e);
        $('#disc_m_e').val('0.00');
        $('#frt_m_e').val('0.00');
        $('#excl_m_e').val('0.00');
        $('#disc_e').val('0.00');
        $('#frt_e').val('0.00');
        $('#excl_e').val(amount_e);
      });
      $("#item_edit").on('change','#frt_m_e',function(){
        var frt_m_e=$('#frt_m_e').val();
        // console.log(frt_m_e);
          var frt_m_e_fnf=new Intl.NumberFormat(
              'en-US', { style: 'currency', 
              currency: 'USD',
              currencyDisplay: 'narrowSymbol'}).format(frt_m_e);
          frt_m_e_fnf=frt_m_e_fnf.replace(/[$]/g,'');
          $('#frt_m_e').val(frt_m_e_fnf);
          var qty=$('#quantity_e').val();
          // gross_amount = gross_amount.replaceAll(',','');
          var amts=parseFloat(qty) * parseFloat(frt_m_e);
          var frt_amt=new Intl.NumberFormat(
          'en-US', { style: 'currency', 
              currency: 'USD',
          currencyDisplay: 'narrowSymbol'}).format(amts);
          frt_amt=frt_amt.replace(/[$]/g,'');
          if(frt_amt == '' || isNaN(frt_amt)){
            frt_amt=='';
          }
          $('#frt_e').val(frt_amt);
  
          var rate=$('#rate_e').val();
          rate = rate.replaceAll(',','');
          var excl=parseFloat(rate) - parseFloat(frt_m_e);
          var excl_m_fnf=new Intl.NumberFormat(
          'en-US', { style: 'currency', 
              currency: 'USD',
          currencyDisplay: 'narrowSymbol'}).format(excl);
          excl_m_fnf=excl_m_fnf.replace(/[$]/g,'');
          $('#frt_m_e').val(frt_m_e_fnf);
          $('#frt_m_e').css('text-align','right');
          $('#frt_m_e').css('padding','0 1px 0 0');
          if(excl_m_fnf == '' || isNaN(excl_m_fnf)){
            excl_m_fnf=='';
          }
          $('#excl_m_e').val(excl_m_fnf);
          $('#excl_m_e').css('text-align','right');
          $('#excl_m_e').css('padding','0 1px 0 0');
          var amount=$('#amount_e').val();
          excl_amount = amount.replaceAll(',','');
          var excl=parseFloat(excl_amount) - parseFloat(frt_amt);
          var excl_fnf=new Intl.NumberFormat(
          'en-US', { style: 'currency', 
              currency: 'USD',
          currencyDisplay: 'narrowSymbol'}).format(excl);
          excl_fnf=excl_fnf.replace(/[$]/g,'');
          $('#excl_e').val(excl_fnf);
      });
      $("#item_edit").on('change','#disc_m_e',function(){
          // var count_main = $('#example1 tr').length;
          // row=count_main - 1;
          var disc_m_e=$('#disc_m_e').val();
          var disc_fnf=new Intl.NumberFormat(
          'en-US', { style: 'currency', 
              currency: 'USD',
          currencyDisplay: 'narrowSymbol'}).format(disc_m_e);
          disc_fnf=disc_fnf.replace(/[$]/g,'');
          $('#disc_m_e').val(disc_fnf);
  
          var gross_amount=$('#amount_e').val();
          gross_amount = gross_amount.replaceAll(',','');
          var amts=parseFloat(gross_amount) * parseFloat(disc_m_e) /100;
          // console.log(amts);
          var disc_amt=new Intl.NumberFormat(
          'en-US', { style: 'currency', 
              currency: 'USD',
          currencyDisplay: 'narrowSymbol'}).format(amts);
          disc_amt=disc_amt.replace(/[$]/g,'');
          $('#disc_e').val(disc_amt);
          $('#disc_m_e').css('text-align','right');
          $('#disc_m_e').css('padding','0 1px 0 0');
      });
      //edit form submit
      $('#item_edit').on('click','#edit_item_order',function(){
        var item_code_e=$('#item_code_e').val();
        var item_name=$('#item_name').val();
        var type_e=$('#type_e').val();
        var quantity_e=$('#quantity_e').val();
        var rate_e=$('#rate_e').val();
        var amount_e=$('#amount_e').val();
        var disc_e=$('#disc_e').val();
        var frt_e=$('#frt_e').val();
        console.log(frt_e);
        var excl_e=$('#excl_e').val();

        //find total amount,disc_amount,frt_amount & excl_amount
        var total_amount=$('#total').text();
        total_amount = total_amount.replaceAll(',','');
        var total_disc=$('#disc_t').text();
        total_disc = total_disc.replaceAll(',','');
        var total_frt=$('#frt_t').text();
        total_frt = total_frt.replaceAll(',','');
        var total_excl=$('#excl_t').text();
        total_excl = total_excl.replaceAll(',','');
        this_amount = amount_e.replaceAll(',','');
        this_disc = disc_e.replaceAll(',','');
        this_frt = frt_e.replaceAll(',','');
        this_excl = excl_e.replaceAll(',','');

        //find total_amount
        var previous_amount=$('#amount'+id).val();
        previous_amount = previous_amount.replaceAll(',','');
        // console.log(previous_amount);
        // console.log(total_amount);
        var fnf_total=parseFloat(total_amount) - parseFloat(previous_amount);
        // console.log(this_amount);
        fnf_total=parseFloat(fnf_total) + parseFloat(this_amount);
        var fnf_totals=new Intl.NumberFormat(
              'en-US', { style: 'currency', 
              currency: 'USD',
              currencyDisplay: 'narrowSymbol'}).format(fnf_total);
        var fnf_totals=fnf_totals.replace(/[$]/g,'');
        $('#total').html(fnf_totals);
        //find disc_amount
        var previous_disc=$('#disc'+id).val();
        previous_disc = previous_disc.replaceAll(',','');
        var fnf_disc_total=parseFloat(total_disc) - parseFloat(previous_disc);
        fnf_disc_total=parseFloat(fnf_disc_total) + parseFloat(this_disc);
        var fnf_disc_totals=new Intl.NumberFormat(
              'en-US', { style: 'currency', 
              currency: 'USD',
              currencyDisplay: 'narrowSymbol'}).format(fnf_disc_total);
        var fnf_disc_totals=fnf_disc_totals.replace(/[$]/g,'');
        $('#disc_t').html(fnf_disc_totals);
        //find frt_amount
        var previous_frt=$('#frt'+id).val();
        previous_frt = previous_frt.replaceAll(',','');
        var fnf_frt_total=parseFloat(total_frt) - parseFloat(previous_frt);
        fnf_frt_total=parseFloat(fnf_frt_total) + parseFloat(this_frt);
        var fnf_frt_totals=new Intl.NumberFormat(
              'en-US', { style: 'currency', 
              currency: 'USD',
              currencyDisplay: 'narrowSymbol'}).format(fnf_frt_total);
        var fnf_frt_totals=fnf_frt_totals.replace(/[$]/g,'');
        $('#frt_t').html(fnf_frt_totals);
        //find excl_amount
        var previous_excl=$('#excl'+id).val();
        previous_excl = previous_excl.replaceAll(',','');
        var fnf_excl_total=parseFloat(total_excl) - parseFloat(previous_excl);
        fnf_excl_total=parseFloat(fnf_excl_total) + parseFloat(this_excl);
        var fnf_excl_totals=new Intl.NumberFormat(
              'en-US', { style: 'currency', 
              currency: 'USD',
              currencyDisplay: 'narrowSymbol'}).format(fnf_excl_total);
        var fnf_excl_totals=fnf_excl_totals.replace(/[$]/g,'');
        $('#excl_t').html(fnf_excl_totals);





        $('#acc_desc'+id).val(item_code_e);
        $('#detail'+id).val(item_name);
        $('#type'+id).val(type_e);
        $('#quantity'+id).val(quantity_e);
        $('#rate'+id).val(rate_e);
        $('#amount'+id).val(amount_e);
        $('#disc'+id).val(disc_e);
        $('#frt'+id).val(frt_e);
        $('#excl'+id).val(excl_e);
        $('#EditItemModal').modal('hide');
      });
});  
$('#example1').ready(function(){
  //on chAnge account code
  $("#order_form").on('change','#acc_desc',function(){
        $("#ajax-loader").show();
      var account_code=$('#acc_desc').find(':selected').val();
      // console.log(account_code);
      var detail=$('#acc_desc').find(':selected').attr("data-name");
      // console.log(detail);
      $('#select2-acc_desc-container').html(account_code);
      $('#detail').val(detail);
  });
  //on chAnge account code
  $("#order_form").on('change','.acc_desc',function(){
        $("#ajax-loader").show();
      var target = event.target || event.srcElement;
      var id = target.id;
      var id = id.split("-");
      id=id[1];
      var id = id.split("acc_desc");
      id=id[1];
      var account_code=$('#acc_desc'+id).find(':selected').val();
      var detail=$('#acc_desc'+id).find(':selected').attr("data-name");
      $('#select2-acc_desc'+id+'-container').html(account_code);
      $('#detail'+id).val(detail);
      $.ajax({
        url: 'api/sales_module/transaction_files/delivery_challan_api.php',
        type: 'POST',
        data: {action: 'location_code',item_code:account_code},
        dataType: "json",
        success: function(response){
        $("#ajax-loader").hide();
            $('#loc'+id).html('');
            $('#loc'+id).append('<option value="0" selected readonly="readonly">Select Account</option>');
            $.each(response, function(key, value){ 
              $('#loc'+id).append('<option data-name="'+value["loc_name"]+'"  data-code='+value["loc_code"]+' value='+value["loc_code"]+'>'+value["loc_code"]+' - '+value["loc_name"]+'</option>');
            });
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
      }); 
  });
  //on chAnge account code
  $("#order_form").on('change','.loc',function(){
      var target = event.target || event.srcElement;
      var id = target.id;
      var id = id.split("-");
      id=id[1];
      var id = id.split("loc");
      id=id[1];
      var loc_code=$('#loc'+id).find(':selected').val();
      $('#select2-loc'+id+'-container').html(loc_code);
  });
});

$('#example1').ready(function(){
  var i = 0;
  var total_amount = 0;
  $('.add').click(function(){
      var rowCount = $("#example1 tr").length;
      var company_code=$('#company_code').val();
        i=rowCount-2;
      var acc_desc = $('#acc_desc').val();
      var detail = $("#detail").val();
      var type = $("#type").val();
      var loc = $("#loc").val();
      var quantitys = $("#quantity").val();
      quantity = quantitys.replaceAll(',','');
      var batch_no = $("#batch_no").text();
      var expiry_dt = $("#expiry_dt").val();
      var gd_no = $("#gd_no").val();
      var gd_dt = $("#gd_dt").val();
      var excl_total = $("#excl_t").text();
      var item_hscode = $("#item_hscode").val();
      var tax_rate = $("#tax_rate").val();
      if(acc_desc == null){
          $('#msg').text("Account can't be the null.");
      }else if(quantity == ""){
          $('#msg').text("Quantity can't be the null.");
      }else{
          $('#msg').text("");
          
          // values empty
          $("#amount").val('0');
          $("#detail").val('');
          $("#quantity").val('');
          $("#loc").val('');
          $("#quantity").val('');
          $("#batch_no").val('');
          $("#expirt_dt").val('');
          $("#gd_no").val('');
          $("#gd_dt").val('');
          $("#item_hscode").val('');
          $("#tax_rate").val('');
          //   $("#type").val('');
          $('#d_items tr:last').before('<tr id="tr'+i+'"><td><select name="acc_desc[]" id = "acc_desc'+i+'" class="form-control js-example-basic-single acc_desc" ></td><td><input name="detail[]" id = "detail'+i+'" class="form-control form-control-sm detail" readonly></td><td ><select style="font-size:9px !important;" name="type[]" id = "type'+i+'" class="form-control form-control-sm type"><option value="0" readonly="readonly" selected>Type</option><option value="N">N</option><option value="F">F</option><option value="S">S</option><option value="T">T</option></select></td><td><select name="loc[]" id = "loc'+i+'" class="form-control js-example-basic-single loc" ></td><td><input type="text" name="quantity[]" id = "quantity'+i+'" class="form-control form-control-sm quantity"></td><td><textarea rows="1" type="text" name="batch_no[]" id = "batch_no'+i+'"  class="form-control form-control-sm batch_no"></textarea></td><td><input type="date" name="expiry_dt[]" id = "expiry_dt'+i+'" class="form-control form-control-sm expiry_dt" readonly></td><td><textarea value='+gd_no+' rows="1" name="gd_no[]" id = "gd_no'+i+'" class="form-control form-control-sm gd_no" readonly></textarea></td><td><input type="date" name="gd_dt[]" id = "gd_dt'+i+'" class="form-control form-control-sm gd_dt" readonly></td><td><input value='+item_hscode+' type="text" name="item_hscode[]" id = "item_hscode'+i+'" class="form-control form-control-sm item_hscode" readonly></td><td><input value='+tax_rate+' type="text" name="tax_rate[]" id = "tax_rate'+i+'" class="form-control form-control-sm tax_rate" readonly></td><td><button type = "button" id="'+i+'" class="btn btn-sm btn-danger remove"><b>X<b></button></td></tr>');          
          $('#type').prop("selectedIndex", 0).val();

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
                $.ajax({
                  url: 'api/sales_module/transaction_files/delivery_challan_api.php',
                  type: 'POST',
                  data: {action: 'location_code',item_code:acc_desc},
                  dataType: "json",
                  success: function(response){
                  $("#ajax-loader").hide();
                      $('#loc'+i).html('');
                      $('#loc'+i).append('<option value="0" selected  readonly="readonly">Select Account</option>');
                      $.each(response, function(key, value){ 
                        $('#loc'+i).append('<option data-name="'+value["loc_name"]+'"  data-code='+value["loc_code"]+' value='+value["loc_code"]+'>'+value["loc_code"]+' - '+value["loc_name"]+'</option>');
                        if(value["loc_code"]== loc){
                          loc= value["loc_code"];
                          $('#loc'+i+' option[value='+loc+']').prop("selected", true);
                        }
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
                });
                // console.log(type);
                if(type=='' || type=='0'){
                  $('#type'+i+'').prop("selectedIndex", 0).val();
                }else{
                  $('#type'+i+'').val(type);
                }
              $('#detail'+i+'').val(detail);
              $('#quantity'+i+'').val(quantitys);
              $('#gd_no'+i+'').val(gd_no);expiry_dt
              $('#gd_dt'+i+'').val(gd_dt);
              $('#expiry_dt'+i+'').val(expiry_dt);
              $('#batch_no'+i+'').val(batch_no);
              $('#item_hscode'+i+'').val(item_hscode);
              $('#tax_rate'+i+'').val(tax_rate);
              $('#quantity'+i+'').css('text-align','right');
              $('#quantity'+i+'').css('padding','0 1px 0 0');
              
      }  
  });
     
   
  $('#example1').on('click','.remove', function(){
      var button_id = $(this).attr("id");
      var remove_quantity = $('#quantity'+button_id+'').val();
      remove_quantity = remove_quantity.replaceAll(',','');
      $('#tr'+button_id+'').remove();
      //   $('#um').val('');
      var current_t_qty = $('#total').text();
      current_t_qty = current_t_qty.replaceAll(',','');
      //total amount
      var total_qty = parseFloat(current_t_qty) - parseFloat(remove_quantity);
      if(isNaN(total_qty)){
        total_qty='0';
      }else{
        var total_qty=new Intl.NumberFormat(
            'en-US', { style: 'currency', 
            currency: 'USD',
            currencyDisplay: 'narrowSymbol'}).format(total_qty);
        var total_qty=total_qty.replace(/[$]/g,'');
      }
      $('#total').text(total_qty);

  });
});
      
$("#order_form").on("submit", function (e) {
    if ($("#order_form").valid()) {
        var rowCount = $("#example1 tr").length;
        if(rowCount > 3){
            // var item_code=$('#acc_desc').val();
            var quantity=$('#quantity').val();
            if(quantity == '' || quantity=='0.00' || quantity == '0'){
                e.preventDefault();
                var formData = new FormData(this); 
                var total=$('#total').text();
                formData.append('debit',total);
                var company_code=$('#company_code').val();
                formData.append('company_code',company_code);
                var purchase_mode=$('#purchase_mode').val();
                formData.append('purchase_mode',purchase_mode);
                formData.append('action','update');
                $.ajax({
                    url: 'api/sales_module/transaction_files/delivery_challan_api.php',
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
                                $.get('sales_module/transaction_files/delivery_challan_list.php',function(data,status){
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
                $("#msg").html("Click on Add Row otherwise the last Row will not be count");
            }
        }else{
            $("#msg").html("Click on Insert Row");
        }
    }
});




// breadcrumbs
$('#dashboard_breadcrumb').click(function(){
    $.get('dashboard_main/dashboard_main.php',function(data,status){
        $('#content').html(data);
    });
});
$("#tf_breadcrumb").on("click", function () {
    $.get('sales_module/transaction_files/tansaction_files.php', function(data,status){
        $("#content").html(data);
    });
});
</script>
<?php include '../../includes/loader.php'?>