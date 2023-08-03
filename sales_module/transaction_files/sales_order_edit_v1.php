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
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="sm_breadcrumb"> Sale Module Edit</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="transaction_files_breadcrumb"> Transaction Files</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="add_sale_orer_breadcrumb">Add Sale Order</button></li>
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
                                        <!-- <button type="button" class="btn btn-info btn-sm mt-2 702a1b_1" id="view_party"><i class="fa fa-eye"></i> View Party Detail</button> -->
                                </div>
                                <div class="col-sm-2 text-right p-2">
                                        <button type="button" class="btn btn-info btn-sm mt-2 702a1b_1" id="view_party"><i class="fa fa-eye"></i> View Party Detail</button>
                                </div>
                            </div>
                              <div class="row">
                                <div style="border  :2px solid #c2c7cb; padding-top:8px" class="col-lg-6">
                                    <div class="row">
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
                                        <div class="col-md-4 form-group">
                                            <!-- <label for="">Party :<span style="color:red">*</span></label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                                </div>
                                                <input maxlength="30" type="text" name="party" id="party" class="form-control form-control-sm" placeholder="Select Party" readonly>
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
                                    </div>
                                </div>
                                <div style="border  :2px solid #c2c7cb; padding-top:8px" class="col-lg-6">
                                    <div class="row">
                                        <div class="col-sm-2 form-group">
                                            <label>Sale Co:</label> 
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <!-- <label for="">Sale Code :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input title="Sale Code" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="sale_code" id="sale_code" class="form-control form-control-sm" placeholder="Sale Code" readonly >
                                            </div>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <label>Document:</label> 
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <!-- <label for="">Document Number :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="doc_no" id="doc_no" class="form-control form-control-sm" placeholder="Voucher No" readonly>
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
                                                <input type="date" name="voucher_date" id="voucher_date" class="form-control form-control-sm" value="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <label>CO Ref:</label> 
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <!-- <label for="">CO Ref :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="company_ref" id="company_ref" class="form-control form-control-sm" placeholder="Reference No" >
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
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="v_no" id="v_no" class="form-control form-control-sm" placeholder="Cash/Bank Ser#" >
                                            </div>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <label>Narration:</label> 
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
                                <!-- <form id="d" name="order_detail"> -->
                                    <div class="row">
                                        <div class="col-md-6"></div>
                                        <div class="col-md-2 form-group">
                                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" name="disc_m" id="disc_m" title="Disc Rate/Amt" class="form-control form-control-sm" placeholder="Disc Rate/Amt" readonly >
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" name="frt_m" id="frt_m" title="Frt Rate/Amt" class="form-control form-control-sm" placeholder="Frt Rate/Amt" readonly>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" name="excl_m" id="excl_m" title="Excl Rate/Amt" class="form-control form-control-sm" placeholder="Excl Rate/Amt" readonly>
                                        </div>
                                    </div>
                                  <table id="example1" class="table table-bordered table-striped table-responsive-lg">
                                      <thead>
                                          <tr>
                                              <th>Item Code</th>
                                              <th>Name</th>
                                              <th>Type</th>
                                              <th>Quantity</th>
                                              <th>Rate</th>
                                              <th>Amount</th>
                                              <th>Disc</th>
                                              <th>Frt</th>
                                              <th>Excl</th>
                                              <th>Action</th>
                                          </tr>
                                      </thead>
                                      <tbody id="d_items">
                                        <tr id="main_tr">
                                            <td style="width:12%"><select name="" id = "acc_desc" class="form-control js-example-basic-single acc_desc"></select></td>
                                            <td style="width: 13%;"><textarea rows="1"   name="" id = "detail" class="form-control form-control-sm detail" readonly></textarea></td>
                                            <td style="width:9%" ><select style="font-size:9px;" name="" id = "type" class="form-control form-control-sm type"><option value="0" readonly="readonly" selected>Type</option><option value="N">N</option><option value="F">F</option><option value="S">S</option><option value="T">T</option></select></td>
                                            <td style="width: 8%;"><input  style="text-align:right; padding:0 1px 0 0" type="number"  name="" id="quantity" class="form-control form-control-sm quantity"></td>
                                            <td style="width: 9%;"><input  style="text-align:right; padding:0 1px 0 0"  pattern="[a-zA-Z0-9 ,._-]{1,}" value="0" type="text"  name="" id = "rate" class="form-control form-control-sm rate"></td>
                                            <td style="width: 10%;"><input  style="text-align:right; padding:0 1px 0 0"  pattern="[a-zA-Z0-9 ,._-]{1,}" value="0" type="text" tabindex="-1"  name="" id = "amount" class="form-control form-control-sm amount" readonly></td>
                                            <td style="width: 10%;"><input  style="text-align:right; padding:0 1px 0 0"  pattern="[a-zA-Z0-9 ,._-]{1,}" value="0.00" type="text" tabindex="-1"  name="" id = "disc" class="form-control form-control-sm disc" readonly></td>
                                            <td style="width: 10%;"><input  style="text-align:right; padding:0 1px 0 0"  pattern="[a-zA-Z0-9 ,._-]{1,}" value="0.00" type="text" tabindex="-1"  name="" id = "frt" class="form-control form-control-sm frt" readonly></td>
                                            <td style="width: 10%;"><input  style="text-align:right; padding:0 1px 0 0"  pattern="[a-zA-Z0-9 ,._-]{1,}" value="0.00" type="text" tabindex="-1"  name="" id = "excl" class="form-control form-control-sm excl" readonly></td>
                                            <td ><button type = "button" class="btn btn-sm btn-primary add"><i class="fa fa-plus"></i></button></td>
                                        </tr>
                                      </tbody>
                                          <tr id="last_tr">
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <!-- <td></td> -->
                                              <td style="text-align:right;">Total:</td>
                                              <td style="font-weight:bold" name="total" id="total"><b>0</b></td>
                                              <td style="font-weight:bold" name="disc_t" id="disc_t"><b>0</b></td>
                                              <td style="font-weight:bold" name="frt_t" id="frt_t"><b>0</b></td>
                                              <td style="font-weight:bold" name="excl_t" id="excl_t"><b>0</b></td>
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


<!-- view order detail for editing  -->
<div class="modal fade bd-example-modal-xl" id="EditItemModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Item Order Detail</h5>
        <button type="button" class="close" aria-label="Close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      
      <form method = "post" id = "item_edit">
        <div class="modal-body container" style="border:1px solid black">
          <div class="row">
            <div class="col-md-4 form-group">
                <label for="">Item Code :<span style="color:red">*</span></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                    </div>
                    <select class="form-control form-control-sm  js-example-basic-single" id="item_code_e" name="item_code_e">
                    </select>
                </div>
            </div>
            <div class="col-md-4 form-group">
                <label for="inputCompanyName">Item Name :</label><span style="color:red;">*</span>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pen"></i></span>
                    </div>
                    <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="item_name" id="item_name" class="form-control form-control-sm" placeholder="Item Name" readonly >
                </div>
            </div>
            <div class="col-md-4 form-group">
                <label for="">Type :</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                    </div>
                    <select class="form-control form-control-sm" id="type_e" name="type_e">
                      <option value="0" selected>Select Type</option>
                      <option value="N">N</option>
                      <option value="F">F</option>
                      <option value="S">S</option>
                      <option value="T">T</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4 form-group">
                <label for="inputCompanyName">Quantity :</label><span style="color:red;">*</span>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pen"></i></span>
                    </div>
                    <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="quantity_e" id="quantity_e" class="form-control form-control-sm" placeholder="Quantity" >
                </div>
            </div>
            <div class="col-sm-4 form-group">
                <label for="inputCompanyName">Rate :</label><span style="color:red;">*</span>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pen"></i></span>
                    </div>
                    <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="rate_e" id="rate_e" class="form-control form-control-sm" placeholder="Rate" >
                </div>
            </div>
            <div class="col-sm-4 form-group">
                <label for="inputCompanyName">Amount :</label><span style="color:red;">*</span>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pen"></i></span>
                    </div>
                    <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="amount_e" id="amount_e" class="form-control form-control-sm" placeholder="Amount" readonly>
                </div>
            </div>
            <div class="col-sm-4 form-group">
                <label for="inputCompanyName">Disc Rate/Amt :</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pen"></i></span>
                    </div>
                    <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="disc_m_e" id="disc_m_e" class="form-control form-control-sm" placeholder="Disc Rate" >
                </div>
            </div>
            <div class="col-sm-4 form-group">
                <label for="inputCompanyName">Frt Rate/Amt :</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pen"></i></span>
                    </div>
                    <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="frt_m_e" id="frt_m_e" class="form-control form-control-sm" placeholder="Frt Rate" >
                </div>
            </div>
            <div class="col-sm-4 form-group">
                <label for="inputCompanyName">Excl Rate/Amt :</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pen"></i></span>
                    </div>
                    <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="excl_m_e" id="excl_m_e" class="form-control form-control-sm" placeholder="Excl Rate" readonly>
                </div>
            </div>
            <div class="col-sm-4 form-group">
                <label for="inputCompanyName">Disc :</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pen"></i></span>
                    </div>
                    <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="disc_e" id="disc_e" class="form-control form-control-sm" placeholder="Disc Rate" readonly>
                </div>
            </div>
            <div class="col-sm-4 form-group">
                <label for="inputCompanyName">Frt :</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pen"></i></span>
                    </div>
                    <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="frt_e" id="frt_e" class="form-control form-control-sm" placeholder="Frt Rate"  readonly>
                </div>
            </div>
            <div class="col-sm-4 form-group">
                <label for="inputCompanyName">Excl :</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pen"></i></span>
                    </div>
                    <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="excl_e" id="excl_e" class="form-control form-control-sm" placeholder="Excl Rate" readonly >
                </div>
            </div>
          </div>
          <button type="button" id="edit_item_order" class="btn btn-primary toastrDefaultSuccess">Submit</button>
        </div>
      </form>
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
<?php

include '../../includes/security.php';
?>
<script>
$(document).ready(function(){
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
        $('#disc_m').attr('readonly',false);
        $('#frt_m').attr('readonly',false);
        // $('#excl_m').attr('readonly',false);
        var previous_amounts=sessionStorage.getItem('previous_amount');
        // console.log(previous_amounts);
        if(previous_amounts == ""){
            previous_amount=0;
        }else{
            previous_amount = previous_amounts.replaceAll(',','');
        }
        var total=$('#total').html();
        // console.log("total");
        if(total == '' || total == '0' || total=='0.00'){
            minuss=0;
        }else{
            minus_t = total.replaceAll(',','');
            minuss= parseFloat(minus_t) - parseFloat(previous_amount);
        }
        // console.log(minuss);
        var button_id = $(this).attr("id");
        if(button_id =='rate'){
            rate_id='';
        }else{
        var rateid = button_id.split("e");
        rate_id=rateid[1];
        }
        var quantity=$('#quantity'+rate_id).val();
        var rate=$('#rate'+rate_id).val();
        if(rate == "" || rate == '0.00' || rate == '0'){
            rate=0;
        }else{
            if (rate.indexOf(',') > -1) { 
            pre_rate = rate.replaceAll(',','');
            var rate=new Intl.NumberFormat(
            'en-US', { style: 'currency', 
                currency: 'USD',
            currencyDisplay: 'narrowSymbol'}).format(pre_rate);
            var rate=rate.replace(/[$]/g,'');
            var  show_rate=rate;
            // console.log(show_rate);
            $('#rate'+rate_id).val(show_rate);
            var amts=parseFloat(quantity) * parseFloat(pre_rate);
            }else{
            if(quantity == "" || quantity == '0.00' || quantity == '0'){
                quantity=0;
            }
            var rates=new Intl.NumberFormat(
            'en-US', { style: 'currency', 
                currency: 'USD',
            currencyDisplay: 'narrowSymbol'}).format(rate);
            var rates=rates.replace(/[$]/g,'');
            var  show_rate=rates;
            // console.log(show_rate);
            $('#rate'+rate_id).val(show_rate);
            var amts=parseFloat(quantity) * parseFloat(rate);
            console.log(quantity);
            }
            var org_amt=new Intl.NumberFormat(
            'en-US', { style: 'currency', 
            currency: 'USD',
            currencyDisplay: 'narrowSymbol'}).format(amts);
            var org_amt=org_amt.replace(/[$]/g,'');
            $('#amount'+rate_id).val(org_amt);
            var amount=$('#amount'+rate_id).val();
            if (amount.indexOf(',') > -1) { 
            // num = amount.replaceAll(',','');
            // pre_amount = num;
            myStr_amt = amount.replace(/[^\d\,\.]/g, '');  
            let commaNotations_amt = /^\d+(\.\d{3})?\,\d{2}$/.test(myStr_amt);
            pre_amount = commaNotations_amt ?
            Math.round(parseFloat(amount.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
            Math.round(parseFloat(amount.replace(/[^\d\.]/g, '')));
            pre_amount = amount.replaceAll(',','');
            var amount=new Intl.NumberFormat(
            'en-US', { style: 'currency', 
                currency: 'USD',
            currencyDisplay: 'narrowSymbol'}).format(pre_amount);
            var amount=amount.replace(/[$]/g,'');
            var  show_amount=amount;
            var fnf=parseFloat(minuss) +parseFloat(pre_amount);
            console.log(fnf);
            }else{
            var amounts=new Intl.NumberFormat(
            'en-US', { style: 'currency', 
                currency: 'USD',
            currencyDisplay: 'narrowSymbol'}).format(amount);
            var amunt=amounts.replace(/[$]/g,'');
            var show_amount=amunt;
            var fnf=parseFloat(minuss) +parseFloat(amount);
            }
            var total=new Intl.NumberFormat(
            'en-US', { style: 'currency', 
            currency: 'USD',
            currencyDisplay: 'narrowSymbol'}).format(fnf);
            var total=total.replace(/[$]/g,'');
            $('#total').html(total);
            // $('#amount'+rate_id).val(show_amount);
        }

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
    $("#order_form").on('change','#disc_m',function(){
        // var count_main = $('#example1 tr').length;
        // row=count_main - 1;
        var disc_m=$('#disc_m').val();
        var disc_fnf=new Intl.NumberFormat(
        'en-US', { style: 'currency', 
            currency: 'USD',
        currencyDisplay: 'narrowSymbol'}).format(disc_m);
        disc_fnf=disc_fnf.replace(/[$]/g,'');
        $('#disc_m').val(disc_fnf);

        var gross_amount=$('#amount').val();
        gross_amount = gross_amount.replaceAll(',','');
        var amts=parseFloat(gross_amount) * parseFloat(disc_m) /100;
        // console.log(amts);
        var disc_amt=new Intl.NumberFormat(
        'en-US', { style: 'currency', 
            currency: 'USD',
        currencyDisplay: 'narrowSymbol'}).format(amts);
        disc_amt=disc_amt.replace(/[$]/g,'');
        $('#main_tr #disc').val(disc_amt);
        $('#disc_m').css('text-align','right');
        $('#disc_m').css('padding','0 1px 0 0');
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
    });
    $("#order_form").on('change','.quantity',function(){
        var previous_amounts=sessionStorage.getItem('previous_amount');
        if(previous_amounts == ""){
            previous_amount=0;
        }else{
            previous_amount = previous_amounts.replaceAll(',','');
        }
        var total=$('#total').text();
        if(total == '' || total == '0' || total=='0.00'){
            minuss=0;
        }else{
            minus_t = total.replaceAll(',','');
            minuss= parseFloat(minus_t) - parseFloat(previous_amount);
            // console.log(minuss);
        }
        // console.log(minuss);
        var button_id = $(this).attr("id");
        if(button_id =='quantity'){
            quantity_id='';
        }else{
        var quantityid = button_id.split("y");
        quantity_id=quantityid[1];
        }
        var quantity=$('#quantity'+quantity_id).val();
        var rate=$('#rate'+quantity_id).val();
        if(rate == ""){
            // console.log("if");
            $('#amount').val('');
            $('#rate').val('');
            // $('#total').text('');
        }else{
            if (rate.indexOf(',') > -1) { 
                pre_rate = rate.replaceAll(',','');
                var rate=new Intl.NumberFormat(
                'en-US', { style: 'currency', 
                    currency: 'USD',
                currencyDisplay: 'narrowSymbol'}).format(pre_rate);
                var rate=rate.replace(/[$]/g,'');
                var  show_rate=rate;
                // console.log(show_rate);
                $('#rate'+quantity_id).val(show_rate);
                var amts=parseFloat(quantity) * parseFloat(pre_rate);
            }else{
                var rates=new Intl.NumberFormat(
                'en-US', { style: 'currency', 
                    currency: 'USD',
                currencyDisplay: 'narrowSymbol'}).format(rate);
                var rates=rates.replace(/[$]/g,'');
                var  show_rate=rates;
                // console.log(show_rate);
                $('#rate'+quantity_id).val(show_rate);
                var amts=parseFloat(quantity) * parseFloat(rate);
            }
            var org_amt=new Intl.NumberFormat(
            'en-US', { style: 'currency', 
            currency: 'USD',
            currencyDisplay: 'narrowSymbol'}).format(amts);
            var org_amt=org_amt.replace(/[$]/g,'');
            $('#amount'+quantity_id).val(org_amt);
            var amount=$('#amount'+quantity_id).val();
            // console.log(org_amt);
            if (amount.indexOf(',') > -1) { 
            pre_amount = amount.replaceAll(',','');
            var amount=new Intl.NumberFormat(
            'en-US', { style: 'currency', 
                currency: 'USD',
            currencyDisplay: 'narrowSymbol'}).format(pre_amount);
            var amount=amount.replace(/[$]/g,'');
            var  show_amount=amount;
            var fnf=parseFloat(minuss) +parseFloat(pre_amount);
            }else{
                var amounts=new Intl.NumberFormat(
                'en-US', { style: 'currency', 
                    currency: 'USD',
                currencyDisplay: 'narrowSymbol'}).format(amount);
                var amunt=amounts.replace(/[$]/g,'');
                var show_amount=amunt;
                var fnf=parseFloat(minuss) +parseFloat(amount);
            }
            // console.log(fnf);
            var total=new Intl.NumberFormat(
            'en-US', { style: 'currency', 
            currency: 'USD',
            currencyDisplay: 'narrowSymbol'}).format(fnf);
            var total=total.replace(/[$]/g,'');
            // console.log(total);
            $('#total').html(total);
            // $('#amount'+quantity_id).val(show_amount);
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
          sale_code: {
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
$("#order_form").on('change','#voucher_date',function(){
  var date = new Date($('#voucher_date').val());
  var year = date.getFullYear();
  // $('#year').val(year);
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
        // $('#ViewItemModal').modal('show');
    }
});
$(document).ready(function(){
    var co_code=<?php echo $_GET['co_code'] ?>;
    var div_code=<?php echo $_GET['div_code'] ?>;
    var party_code=<?php echo $_GET['party_code'] ?>;
    var salesman_code=<?php echo $_GET['salesman_code'] ?>;
    var po_catg="<?php echo $_GET['po_catg'] ?>";
    var doc_year=<?php echo $_GET['doc_year'] ?>;
    var doc_no=<?php echo $_GET['doc_no'] ?>;
    $('#doc_no').val(doc_no);
    $('#company_code').val(co_code);
    $('#division').val(div_code);
    $('#party').val(party_code);
    $('#purchase_mode').val(po_catg);
    $('#salesman').val(salesman_code);
    $("#purchase_mode").attr({disabled:'readonly'});
    // $('#purchase_mode').enable(false);
    // $('#purchase_mode').attr('disabled','readonly');
  $.ajax({
    url: 'api/sales_module/transaction_files/sales_order_api.php',
      type : "post",
      data : {action:'edit',doc_no:doc_no,co_code:co_code,doc_year:doc_year,div_code:div_code,party_code:party_code,salesman_code:salesman_code,po_catg:po_catg},
      success: function(response)
      {
        console.log(response);
        $('#doc_date').val(response.doc_date);
        // $('#year').val(response.doc_year);
        $('#narration').val(response.remarks);
        $('#company_ref').val(response.refnum2);
        $('#party_ref').val(response.party_ref);
        $('#v_no').val(response.refnum);
        $('#narration').val(response.remarks);
        $('#sale_code').val(response.order_key);
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
        var account_code=$('#acc_desc').find(':selected').val();
        var detail=$('#acc_desc').find(':selected').attr("data-name");
        $('#select2-acc_desc-container').html(account_code);
        $('#detail').val(detail);

        $.ajax({
            url: 'api/sales_module/transaction_files/sales_order_api.php',
            type: 'POST',
            data: {action: 'edit_table',co_code:co_code,doc_no:doc_no,party_code:party_code,
              div_code:div_code,po_catg:po_catg},
            dataType: "json",
            success: function(data){
                console.log(data);
                var total_amount=0;
                var total_disc=0;
                var total_frt=0;
                var total_excl=0;
                var j=1;
                var k=0;
                var l=0;
                if(data.length >= 1){
                    for(var i=1;i<=data.length;i++){
                      $('#d_items tr:last').before('<tr id="tr'+i+'"><td><select name="acc_desc[]" id = "acc_desc'+i+'" class="form-control js-example-basic-single acc_desc"></td><td><textarea  rows="1" name="detail[]" id = "detail'+i+'" class="form-control form-control-sm detail" readonly></textarea></td><td ><select style="font-size:9px !important;" name="type[]" id = "type'+i+'" class="form-control form-control-sm type"><option value="0" readonly="readonly" selected>Type</option><option value="N">N</option><option value="F">F</option><option value="S">S</option><option value="T">T</option></select></td><td><input type="number" name="quantity[]" id = "quantity'+i+'" class="form-control form-control-sm quantity" readonly></td><td><input type="text" name="rate[]" id = "rate'+i+'"  class="form-control form-control-sm rate" readonly></td><td><input type="text" name="amount[]" id = "amount'+i+'" onchange="total()" class="form-control form-control-sm total" readonly></td><td><input type="text" name="disc[]" id = "disc'+i+'" class="form-control form-control-sm disc" readonly></td><td><input type="text" name="frt[]" id = "frt'+i+'" class="form-control form-control-sm frt" readonly></td><td><input  type="text" name="excl[]" id = "excl'+i+'" class="form-control form-control-sm excl" readonly></td><td><button type = "button" id="'+i+'" class="btn btn-sm btn-danger remove"><b>X<b></button>&nbsp;<button type = "button" id="edit'+i+'" class="btn btn-sm btn-info btn_edit"><i class="fa fa-refresh"></i></button></td></tr>');          
                        
                        // ACCOUNT code dropdown
                        $.ajax({
                            url: 'api/sales_module/transaction_files/sales_order_api.php',
                            type: 'POST',
                            data: {action: 'item_code',company_code:co_code},
                            dataType: "json",
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
                                j++;
                                l++;
                            },
                            error: function(error){
                                console.log(error);
                                alert("Contact IT Department");
                            }
                        });
                        var rate=data[k].rate;
                        var rates=new Intl.NumberFormat(
                          'en-US', { style: 'currency', 
                            currency: 'USD',
                          currencyDisplay: 'narrowSymbol'}).format(rate);
                        var rates=rates.replace(/[$]/g,''); 
                        $('#rate'+i).val(rates);
                        $('#rate'+i+'').css('text-align','right ');
                        $('#rate'+i+'').css('padding','0 1px 0 0');
                        $('#quantity'+i).val(data[k].qty);
                        $('#quantity'+i+'').css('text-align','right ');
                        $('#quantity'+i+'').css('padding','0 1px 0 0');
                        $('#type'+i).val(data[k].item_type);
                        var amount=data[k].amt;
                        // amounts=amounts.toLocaleString()+'.00';
                        var amounts=new Intl.NumberFormat(
                          'en-US', { style: 'currency', 
                            currency: 'USD',
                          currencyDisplay: 'narrowSymbol'}).format(amount);
                        var amounts=amounts.replace(/[$]/g,''); 
                        total_amount = parseFloat(total_amount) + parseFloat(amount);
                        // total_amounts=total_amount.toLocaleString()+'.00';
                        var amounts_t=new Intl.NumberFormat(
                          'en-US', { style: 'currency', 
                            currency: 'USD',
                          currencyDisplay: 'narrowSymbol'}).format(total_amount);
                        var amounts_t=amounts_t.replace(/[$]/g,''); 
                        $('#total').text(amounts_t);
                        // $('#debit').val(total_amount);
                        var disc_amt=data[k].disc_amt;
                        var disc_amounts=new Intl.NumberFormat(
                          'en-US', { style: 'currency', 
                            currency: 'USD',
                            currencyDisplay: 'narrowSymbol'}).format(disc_amt);
                        var disc_amount=disc_amounts.replace(/[$]/g,''); 
                        total_disc = parseFloat(total_disc) + parseFloat(disc_amt);
                        // console.log(total_disc);
                        var dist_t=new Intl.NumberFormat(
                          'en-US', { style: 'currency', 
                            currency: 'USD',
                          currencyDisplay: 'narrowSymbol'}).format(total_disc);
                        var dist_t=dist_t.replace(/[$]/g,''); 
                        $('#disc'+i).val(disc_amount);
                        $('#disc'+i+'').css('text-align','right ');
                        $('#disc'+i+'').css('padding','0 1px 0 0');
                        $('#disc_t').text(dist_t);
                        var frt_amt=data[k].frt_amt;
                        var frt_amounts=new Intl.NumberFormat(
                          'en-US', { style: 'currency', 
                            currency: 'USD',
                            currencyDisplay: 'narrowSymbol'}).format(frt_amt);
                        var frt_amount=frt_amounts.replace(/[$]/g,''); 
                        total_frt = parseFloat(total_frt) + parseFloat(frt_amt);
                        var frt_t=new Intl.NumberFormat(
                          'en-US', { style: 'currency', 
                            currency: 'USD',
                          currencyDisplay: 'narrowSymbol'}).format(total_frt);
                        var frt_t=frt_t.replace(/[$]/g,''); 
                        $('#frt'+i).val(frt_amount);
                        $('#frt'+i+'').css('text-align','right ');
                        $('#frt'+i+'').css('padding','0 1px 0 0');
                        $('#frt_t').text(frt_t);
                        var excl_amt=data[k].excl_amt;
                        var excl_amounts=new Intl.NumberFormat(
                          'en-US', { style: 'currency', 
                            currency: 'USD',
                            currencyDisplay: 'narrowSymbol'}).format(excl_amt);
                        var excl_amount=excl_amounts.replace(/[$]/g,''); 
                        total_excl = parseFloat(total_excl) + parseFloat(excl_amt);
                        var excl_t=new Intl.NumberFormat(
                          'en-US', { style: 'currency', 
                            currency: 'USD',
                          currencyDisplay: 'narrowSymbol'}).format(total_excl);
                        var excl_t=excl_t.replace(/[$]/g,''); 
                        $('#excl'+i).val(excl_amount);
                        $('#excl'+i+'').css('text-align','right ');
                        $('#excl'+i+'').css('padding','0 1px 0 0');
                        $('#excl_t').text(excl_t);
                        $('#amount'+i).val(amounts);
                        $('#amount'+i+'').css('text-align','right ');
                        $('#amount'+i+'').css('padding','0 1px 0 0');
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
    var button_id= $(this).attr('id');
    var id = button_id.split("l");
    id=id[1];
    if(id != ''){
      var item_code=$('#acc_desc'+id).val();
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
                  var trade_prices=data.trade_price;
                  var trade_price=new Intl.NumberFormat(
                  'en-US', { style: 'currency', 
                      currency: 'USD',
                  currencyDisplay: 'narrowSymbol'}).format(trade_prices);
                  var trade_price=trade_price.replace(/[$]/g,'');
                  $('#tp_rate').html(trade_price);
                  var trade_prices_2=data.tp_rate2;
                  var trade_price_2=new Intl.NumberFormat(
                    'en-US', { style: 'currency', 
                      currency: 'USD',
                      currencyDisplay: 'narrowSymbol'}).format(trade_prices_2);
                  var tp_rate2=trade_price_2.replace(/[$]/g,'');
                  $('#tp_rate2').html(tp_rate2);
                  var tax_rates=data.tax_rate;
                  var tax_rate=new Intl.NumberFormat(
                    'en-US', { style: 'currency', 
                      currency: 'USD',
                      currencyDisplay: 'narrowSymbol'}).format(tax_rates);
                  var tax_rate=tax_rate.replace(/[$]/g,'');
                  $('#gst_per').html(tax_rate);
                  var add_rates=data.add_rate;
                  var add_rate=new Intl.NumberFormat(
                    'en-US', { style: 'currency', 
                      currency: 'USD',
                      currencyDisplay: 'narrowSymbol'}).format(add_rates);
                  var add_rate=add_rate.replace(/[$]/g,'');
                  $('#add_per').html(add_rate);
              },
              error: function(error){
                  console.log(error);
                  alert("Contact IT Department");
              }
          });
          $('#ViewItemModal').modal('show');
      }
    }
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
      $('#view_item').css('display','');
      $('#view_item').fadeIn("slow");
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
      var quantity = $("#quantity").val();
      var rates = $("#rate").val();
      var disc_total = $("#disc_t").text();
      disc_total_e = disc_total.replaceAll(',','');
      var disc = $("#disc").val()==''?'0.00':$("#disc").val();
      disc_e = disc.replaceAll(',','');
      var disc_fnf=parseFloat(disc_e) +parseFloat(disc_total_e);
      var disc_fnf=new Intl.NumberFormat(
            'en-US', { style: 'currency', 
            currency: 'USD',
            currencyDisplay: 'narrowSymbol'}).format(disc_fnf);
      var disc_fnf=disc_fnf.replace(/[$]/g,'');
      $('#disc_t').html(disc_fnf);
            

      var frt_total = $("#frt_t").text();
      frt_total_e = frt_total.replaceAll(',','');
      var frt = $("#frt").val()==''?'0.00':$("#frt").val();
      frt_e = frt.replaceAll(',','');
      var frt_fnf=parseFloat(frt_e) +parseFloat(frt_total_e);
      var frt_fnf=new Intl.NumberFormat(
            'en-US', { style: 'currency', 
            currency: 'USD',
            currencyDisplay: 'narrowSymbol'}).format(frt_fnf);
      var frt_fnf=frt_fnf.replace(/[$]/g,'');
      $('#frt_t').html(frt_fnf);

      var excl = $("#excl").val()==''?'0.00':$("#excl").val();
      var excl_total = $("#excl_t").text();
      excl_total_e = excl_total.replaceAll(',','');
      excl_e = excl.replaceAll(',','');
      var excl_fnf=parseFloat(excl_e) +parseFloat(excl_total_e);
      var excl_fnf=new Intl.NumberFormat(
            'en-US', { style: 'currency', 
            currency: 'USD',
            currencyDisplay: 'narrowSymbol'}).format(excl_fnf);
      var excl_fnf=excl_fnf.replace(/[$]/g,'');
      $('#excl_t').html(excl_fnf);

      myStr_r = rates.replace(/[^\d\,\.]/g, '');  
      let commaNotation_rate = /^\d+(\.\d{3})?\,\d{2}$/.test(myStr_r);
      rate = commaNotation_rate ?
      Math.round(parseFloat(rates.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
      Math.round(parseFloat(rates.replace(/[^\d\.]/g, '')));
      var amounts = $("#amount").val();
      myStr = amounts.replace(/[^\d\,\.]/g, '');  
      let commaNotation = /^\d+(\.\d{3})?\,\d{2}$/.test(myStr);
      amount = commaNotation ?
      Math.round(parseFloat(amounts.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
      Math.round(parseFloat(amounts.replace(/[^\d\.]/g, '')));
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
          $("#disc").val('');
          $("#frt").val('');
          $("#excl").val('');
          $("#rate").val('');
          $("#frt_m").val('');
          $("#excl_m").val('');
          $("#disc_m").val('');
          //   $("#type").val('');
          $('#d_items tr:last').before('<tr id="tr'+i+'"><td><select name="acc_desc[]" id = "acc_desc'+i+'" class="form-control js-example-basic-single acc_desc" ></td><td><textarea  rows="1" name="detail[]" id = "detail'+i+'" class="form-control form-control-sm detail" readonly></textarea></td><td ><select style="font-size:9px !important;" name="type[]" id = "type'+i+'" class="form-control form-control-sm type"><option value="0" readonly="readonly" selected>Type</option><option value="N">N</option><option value="F">F</option><option value="S">S</option><option value="T">T</option></select></td><td><input type="number" name="quantity[]" id = "quantity'+i+'" class="form-control form-control-sm quantity"></td><td><input type="text" name="rate[]" id = "rate'+i+'"  class="form-control form-control-sm rate"></td><td><input type="text" name="amount[]" id = "amount'+i+'" onchange="total()" class="form-control form-control-sm total" readonly></td><td><input value='+disc+' type="text" name="disc[]" id = "disc'+i+'" class="form-control form-control-sm disc" readonly></td><td><input value='+frt+' type="text" name="frt[]" id = "frt'+i+'" class="form-control form-control-sm frt" readonly></td><td><input value='+excl+' type="text" name="excl[]" id = "excl'+i+'" class="form-control form-control-sm excl" readonly></td><td><button type = "button" id="'+i+'" class="btn btn-sm btn-danger remove"><b>X<b></button>&nbsp;<button type = "button" id="edit'+i+'" class="btn btn-sm btn-info btn_edit"><i class="fa fa-refresh"></i></button></td></tr>');          
          $('#type').prop("selectedIndex", 0).val();

          // Item code dropdown
          $.ajax({
              url: 'api/sales_module/transaction_files/sales_order_api.php',
              type: 'POST',
              data: {action: 'item_code',company_code:company_code},
              dataType: "json",
              success: function(response){
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
          // item code loop dropdown
          $.ajax({
              url: 'api/sales_module/transaction_files/sales_order_api.php',
              type: 'POST',
              data: {action: 'item_code',company_code:company_code},
              dataType: "json",
              success: function(response){
                  $('#acc_desc'+i).html('');
                  $('#acc_desc'+i).addClass('js-example-basic-single');
                  $('.js-example-basic-single').select2();
                  $('#acc_desc'+i).append('<option value="" selected disabled>Select Item</option>');
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
          $("#order_form").on('change','#acc_desc',function(){
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
          $('#disc'+i+'').css('text-align','right');
          $('#disc'+i+'').css('padding','0 1px 0 0');
          $('#frt'+i+'').css('text-align','right');
          $('#frt'+i+'').css('padding','0 1px 0 0');
          $('#excl'+i+'').css('text-align','right');
          $('#excl'+i+'').css('padding','0 1px 0 0');
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
    if ($("#order_form").valid()) {
        var rowCount = $("#example1 tr").length;
        if(rowCount > 3){
            // var item_code=$('#acc_desc').val();
            var quantity=$('#quantity').val();
            var rate=$('#rate').val();
            var amount=$('#amount').val();
            if(quantity == '' && rate == '' || rate=='0' && amount == '0' || amount=='0.00'){
                e.preventDefault();
                var formData = new FormData(this); 
                var total=$('#total').text();
                var purchase_mode=$('#purchase_mode').val();
                formData.append('purchase_mode',purchase_mode);
                // var acc_desc=$('#acc_desc').val();
                // formData.append('acc_desc',acc_desc);
                formData.append('debit',total);
                // var company_code=$('#company_code').val();
                // formData.append('company_code',company_code);
                formData.append('action','update');
                $.ajax({
                    url: 'api/sales_module/transaction_files/sales_order_api.php',
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
                                $.get('sales_module/transaction_files/sales_order_list.php',function(data,status){
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
$("#transaction_files_breadcrumb").on("click", function () {
    $.get('sales_module/transaction_files/tansaction_files.php', function(data,status){
        $("#content").html(data);
    });
});
$("#add_sale_orer_breadcrumb").on("click", function () {
    $.get('sales_module/transaction_files/sales_order.php', function(data,status){
        $("#content").html(data);
    });
});
</script>
<?php include '../../includes/loader.php'?>