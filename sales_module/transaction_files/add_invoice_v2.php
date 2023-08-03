<?php
session_start();
?>
<style>
select{width:82% !important;}
#btn-back-to-top {position: fixed;bottom: 20px;right: 20px;}
.form-group{margin-bottom:4px !important}
html {scroll-behavior: smooth;}
#down {margin-top: -1%;padding-top: -1%;} 
input,select,textarea,.select2-selection{border:1px solid black !important;}
.select2-hidden-accessible{border:1px solid black !important;}
.select2-selection{
background-color: #ccd4e1 !important  
}@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap");
h2 {color: black;font-size: 34px;position: relative;text-transform: uppercase;font-weight:600;margin-top: -58px;}
h2::before {
top: 0;
left: 0;
width: 0;
height: 100%;color: #007bff;overflow: hidden;position: absolute;content: attr(data-text);border-right: 2px solid #37b9f1;-webkit-text-stroke: 0vw #f7f7fe;animation: animate 6s linear infinite;font-weight:600
}
@keyframes animate { 0%,10%,100% {width: 0;}70%,90% {width: 100%;}}
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
.select2{
width:74% !important;
}
.amount::placeholder { 
text-align:right !important
}
@media only screen and (min-width: 250px) and (max-width: 350px) {
    .select2-container{width:78% !important;  }
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
td select{
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
color:white;
}#salesman{
    background-color:#afafaf85;
}
#party{
    background-color:#afafaf85;
}
#division{
    background-color:#afafaf85;
}
#company_code{
    background-color:#afafaf85;
}
#main_tr td input{
    font-size:12px !important;
    height:35px;
    border-radius:5%;width:80px;
}.select2-selection__rendered,.select2-results{
    font-size:12px !important;
}
.card-body{ padding:5px !important;}
</style>

<div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Invoice</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="sm_breadcrumb"> Sale Module</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="transaction_files_breadcrumb"> Transaction Files</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="add_invoice_breadcrumb">Add Invoice</button></li>
              </ol>
            </div>   
          </div>
        </div><!-- /.container-fluid -->
      </section>

     
      <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
          <div class="row" style="margin-top:-23px !important">
              <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        <div class="container">
                          <form method = "post" id = "order_form">
                            <?php include '../../display_message/display_message.php'?>
                            <!-- <div class="row">
                                <div class="col-sm-8"> -->
                                <!-- <h3 class="card-title">Language Records</h3> -->
                                <!-- </div> -->
                                <!-- <div class="col-sm-2 text-right p-2">
                                        <button style="display:none" type="button" class="btn btn-info btn-sm mt-2 702a1b_1" id="view_party"><i class="fa fa-eye"></i> View Party Detail</button>
                                </div>
                                <div class="col-sm-2 text-right p-2">
                                        <button style="display:none" type="button" class="btn btn-info btn-sm mt-2 702a1b_1" id="view_item"><i class="fa fa-eye"></i> View Item Detail</button>
                                </div> -->
                            <!-- </div> -->
                              <div class="row">
                                <div style="border  :4px solid #937272;border-left:3px solid #937272; padding-top:8px" class="col-lg-3" data-aos="fade-up" data-aos-duration="3000">
                                    <div class="row">
                                        <div class="col-sm-2 form-group">
                                            <label>Doc#:</label> 
                                        </div>
                                        <div class="col-md-10 form-group">
                                            <!-- <label for="">Document Number :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="doc_no" id="doc_no" class="form-control form-control-sm" placeholder="Document No" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <label>Date:</label> 
                                        </div>
                                        <div class="col-md-10 form-group">
                                            <!-- <label for=""> Date :</label><span style="color:red;">*</span> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input type="date" name="voucher_date" id="voucher_date" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <label>Ref#</label> 
                                        </div>
                                        <div class="col-md-10 form-group">
                                            <!-- <label for="">CO Ref :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="ref_no" id="ref_no" class="form-control form-control-sm" placeholder="Order No" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label>CATG/DIV:</label> 
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                                </div>
                                                <select class="form-control js-example-basic-single  form-control-sm" id="catg_div" name="catg_div">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label>Ship Md:</label> 
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <!-- <label for="">PO Catg L/I :<span style="color:red">*</span></label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-list-alt"></i></span>
                                                </div>
                                                <select style="width:72% !important" title="purchase mode" name="ship_mode" class="form-control form-control-sm" id="ship_mode" >
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
                                        <div class="col-sm-4 form-group">
                                            <label>Voucher#:</label> 
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <!-- <label for="">Voucher# :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="v_no" id="v_no" class="form-control form-control-sm" placeholder="Voucher No" >
                                            </div>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <label>Ship#:</label> 
                                        </div>
                                        <div class="col-md-10 form-group">
                                            <!-- <label for="">Ship# :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="ship_no" id="ship_no" class="form-control form-control-sm" placeholder="Ship #" >
                                            </div>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <label>Ex:</label> 
                                        </div>
                                        <div class="col-md-10 form-group">
                                            <!-- <label for="">Voucher# :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="ex" id="ex" class="form-control form-control-sm" placeholder="Ex" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label>Due Date:</label> 
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <!-- <label for=""> Date :</label><span style="color:red;">*</span> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input type="date" name="due_date" id="due_date" class="form-control form-control-sm" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label>Remarks:</label> 
                                        </div>
                                        <div class="col-md-8  form-group">
                                            <!-- <label for="">Narration :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <textarea rows="1" name="narration" id="narration" class="form-control form-control-sm" placeholder="Narration" ></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="border  :4px solid #937272; padding-top:8px;border-left:3px solid #937272;" class="col-lg-3" data-aos="fade-up" data-aos-duration="2000">
                                    <div class="row">
                                        <div class="col-sm-2 form-group">
                                            <label>DC#:</label> 
                                        </div>
                                        <div class="col-md-10 form-group">
                                            <!-- <label for="">Sale Code :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input title="Sale Code" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="order_key" id="order_key" class="form-control form-control-sm" placeholder="Order No" readonly >
                                            </div>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label>Company:</label> 
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <!-- <label for="">Company Code :<span style="color:red">*</span></label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                                </div>
                                                <input maxlength="30" type="text" name="company_code" id="company_code" class="form-control form-control-sm" placeholder="Select Company" readonly>
                                                
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label>Name:</label> 
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <!-- <label for="inputCompanyName">Company Name :</label><span style="color:red;">*</span> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="company_name" id="company_name" class="form-control form-control-sm" placeholder="Company Name" readonly >
                                            </div>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label>Division:</label> 
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <!-- <label for="">Division :<span style="color:red">*</span></label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                                </div>
                                                <input maxlength="30" type="text" name="division" id="division" class="form-control form-control-sm" placeholder="Select Division" readonly>
                                                
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label>Name:</label> 
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <!-- <label for="">Division Name :</label><span style="color:red;">*</span> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input maxlength="30" type="text" name="division_name" id="division_name" class="form-control form-control-sm" placeholder="Title Name" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label>Salesman:</label> 
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <!-- <label for="">Division :<span style="color:red">*</span></label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                                </div>
                                                <input maxlength="30" type="text" name="salesman" id="salesman" class="form-control form-control-sm" placeholder="Select Salesman" readonly>
                                                
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label>Name:</label> 
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <!-- <label for="">Division Name :</label><span style="color:red;">*</span> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input maxlength="30" type="text" name="salesman_name" id="salesman_name" class="form-control form-control-sm" placeholder="Salesman Name" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label>Date:</label> 
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <!-- <label for=""> Date :</label><span style="color:red;">*</span> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input type="date" name="po_date" id="po_date" class="form-control form-control-sm" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label>PO Cat:</label> 
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <!-- <label for=""> Date :</label><span style="color:red;">*</span> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input maxlength="1" type="text" name="purchase_mode" id="purchase_mode" class="form-control form-control-sm" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label>Order Ref</label> 
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <!-- <label for="">CO Ref :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="order_ref" id="order_ref" class="form-control form-control-sm" placeholder="Order No" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="border  :4px solid #937272; padding-top:8px;border-left:3px solid #937272;" class="col-lg-6" data-aos="fade-up" data-aos-duration="3000">
                                    <div class="row">
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
                                            <label>Name:</label> 
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <!-- <label for="">CO Ref :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <textarea rows="1" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" name="name" id="name" class="form-control form-control-sm" placeholder="Party Name" readonly></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <label>S/Man:</label> 
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <!-- <label for="">CO Ref :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="salesman_code" id="salesman_code" class="form-control form-control-sm" placeholder="SMan Code" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <label>Name:</label> 
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <!-- <label for="">CO Ref :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="salesman_name_p" id="salesman_name_p" class="form-control form-control-sm" placeholder="SMan Name" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <label>Address:</label> 
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <!-- <label for="">CO Ref :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <textarea rows="1" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" name="address" id="address" class="form-control form-control-sm" placeholder="Address" readonly></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <label>City:</label> 
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <!-- <label for="">CO Ref :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <textarea rows="1" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" name="city_p" id="city_p" class="form-control form-control-sm" placeholder="City" readonly></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <label>Zone:</label> 
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <!-- <label for="">CO Ref :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="zone_p" id="zone_p" class="form-control form-control-sm" placeholder="Zone No" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <label>Phone#:</label> 
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <!-- <label for="">CO Ref :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="phone" id="phone" class="form-control form-control-sm" placeholder="Phone No" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <label>Division:</label> 
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <!-- <label for="">CO Ref :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="division_p" id="division_p" class="form-control form-control-sm" placeholder="Division No" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <label>Balance:</label> 
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <!-- <label for="">CO Ref :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="balance_p" id="balance_p" class="form-control form-control-sm" placeholder="Balance" readonly>
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
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="party_ref" id="party_ref" class="form-control form-control-sm" placeholder="Reference No" readonly>
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
                                <div class="card-body" >
                                    <table id="example1" class="table table-bordered table-striped table-responsive">
                                        <thead>
                                            <tr>
                                                <th>Item Code</th>
                                                <th>Name</th>
                                                <th>DC Qty</th>
                                                <th>Invoice Qty</th>
                                                <th>Bal Qty</th>
                                                <th>Quantity</th>
                                                <th>Rate</th>
                                                <th>Amount</th>
                                                <th>Dis Rate%</th>
                                                <th>Dis Amount</th>
                                                <th>Frt Rate%</th>
                                                <th>Frt Amount</th>
                                                <th>Excl Rate%</th>
                                                <th>Excl Amount</th>
                                                <th>Stx Rate%</th>
                                                <th>Stx Amount</th>
                                                <th>Add%</th>
                                                <th>Add Amount</th>
                                                <th>Net Amount</th>
                                                <th >Loc</th>
                                                <th>Batch No</th>
                                                <th>Expiry Dt</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="d_items">
                                            <tr id="main_tr">
                                                <td style="width:70px"><select name="" id = "acc_desc" class="js-example-basic-single acc_desc"></select></td>
                                                <td style="width: 12%;"><textarea rows="1"   name="" id = "detail" class="detail" readonly></textarea></td>
                                                <td style="width: 30px;"><input  style="text-align:right; padding:0 1px 0 0;width:80px !important;background-color:#ccd4e1" type="number"  name="" id="dc_qty" class="dc_qty" readonly></td>
                                                <td style="width: 30px;"><input  style="text-align:right; padding:0 1px 0 0;width:80px !important;background-color:#ccd4e1" type="number"  name="" id="inv_qty" class="inv_qty" readonly></td>
                                                <td style="width: 30px;"><input  style="text-align:right; padding:0 1px 0 0;width:80px !important;background-color:#ccd4e1" type="number"  name="" id="bal_qty" class="bal_qty" readonly></td>
                                                <td style="width: 30px;"><input  style="text-align:right; padding:0 1px 0 0" type="number"  name="" id="quantity" class="quantity"></td>
                                                <td style="width: 70px;"><input  style="text-align:right; padding:0 1px 0 0;width:100px !important;"  pattern="[a-zA-Z0-9 ,._-]{1,}" type="text"  name="" id = "rate" class="rate"></td>
                                                <td style="width: 70px;"><input  style="text-align:right; padding:0 1px 0 0;width:100px !important;background-color:#b7edea;"  pattern="[a-zA-Z0-9 ,._-]{1,}" value="0" type="text"  name="" id = "amount" class="amount" readonly></td>
                                                <td style="width: 70px;"><input  style="text-align:right; padding:0 1px 0 0"  pattern="[a-zA-Z0-9 ,._-]{1,}" value="0" type="text"  name="" id = "disc" class="disc" ></td>
                                                <td style="width: 70px;"><input  style="text-align:right; padding:0 1px 0 0;width:100px !important;background-color:#b7edea;"  pattern="[a-zA-Z0-9 ,._-]{1,}" value="0" type="text"  name="" id = "disc_e" class="disc_e" readonly></td>
                                                <td style="width: 70px;"><input  style="text-align:right; padding:0 1px 0 0"  pattern="[a-zA-Z0-9 ,._-]{1,}" value="0" type="text"  name="" id = "frt" class="frt" ></td>
                                                <td style="width: 70px;"><input  style="text-align:right; padding:0 1px 0 0;width:100px !important;background-color:#b7edea"  pattern="[a-zA-Z0-9 ,._-]{1,}" value="0" type="text"  name="" id = "frt_e" class="frt_e" readonly></td>
                                                <td style="width: 70px;"><input  style="text-align:right; padding:0 1px 0 0"  pattern="[a-zA-Z0-9 ,._-]{1,}" value="0" type="text"  name="" id = "excl" class="excl" ></td>
                                                <td style="width: 50px;"><input  style="text-align:right; padding:0 1px 0 0;width:100px !important;background-color:#b7edea"  pattern="[a-zA-Z0-9 ,._-]{1,}" value="0" type="text"  name="" id = "excl_e" class="excl_e" readonly></td>
                                                <td style="width: 50px;"><input  style="text-align:right; padding:0 1px 0 0"  pattern="[a-zA-Z0-9 ,._-]{1,}" value="0" type="text"  name="" id = "stax_amt" class="stax_amt" ></td>
                                                <td style="width: 50px;"><input  style="text-align:right; padding:0 1px 0 0;width:100px !important;background-color:#b7edea"  pattern="[a-zA-Z0-9 ,._-]{1,}" value="0" type="text"  name="" id = "stax_amt_e" class="stax_amt_e" readonly></td>
                                                <td style="width: 50px;"><input  style="text-align:right; padding:0 1px 0 0"  pattern="[a-zA-Z0-9 ,._-]{1,}" value="0" type="text"  name="" id = "add_amt" class="add_amt" ></td>
                                                <td style="width: 50px;"><input  style="text-align:right; padding:0 1px 0 0;width:100px !important;background-color:#b7edea"  pattern="[a-zA-Z0-9 ,._-]{1,}" value="0" type="text"  name="" id = "add_amt_e" class="add_amt_e" readonly></td>
                                                <td style="width: 50px;"><input  style="text-align:right; padding:0 1px 0 0;width:110px !important;background-color:#b7edea"  pattern="[a-zA-Z0-9 ,._-]{1,}" value="0" type="text"  name="" id = "net_amt" class="net_amt" readonly></td>
                                                <td style="width: 50px;"><input style="background-color:#ccd4e1;" type="text" name="" id = "loc" class="loc"></td>
                                                <td style="width: 50px;"><textarea style="background-color:#ccd4e1;" rows="1"   name="" id = "batch_no" class="batch_no" readonly></textarea></td>
                                                <td style="width: 50px;"><input style="background-color:#ccd4e1;width:91px" type="date" tabindex="-1"  name="" id = "expiry_dt" class="expiry_dt" readonly></td>
                                                <td ><button type = "button" id="adding" class="btn btn-sm btn-primary add"><i class="fa fa-plus"></i></button></td>
                                                <td style="display:none"><input data-disc="" data-frt="" data-excl="" data-disc-final="" data-frt-final="" data-excl-final=""  type="text"  name="extra" class="extra" id = "extra" class="form-control form-control-sm extra" readonly></td>
                                            </tr>
                                        </tbody>
                                            <tr id="last_tr">
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td style="text-align:right;">Total:</td>
                                                <td style="font-weight:bold" name="q_total" id="q_total"><b>0</b></td>
                                                <td></td>
                                                <!-- <td style="font-weight:bold" name="a_total" id="a_total"><b>0</b></td> -->
                                                <td></td>
                                                <!-- <td style="font-weight:bold" name="d_total" id="d_total"><b>0</b></td> -->
                                                <td></td>
                                                <!-- <td style="font-weight:bold" name="f_total" id="f_total"><b>0</b></td> -->
                                                <td></td>
                                                <!-- <td style="font-weight:bold" name="e_total" id="e_total"><b>0</b></td> -->
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td style="text-align:right;">Total:</td>
                                                <td style="font-weight:bold" name="n_total" id="n_total"><b>0</b></td>
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
                                <div class="row" style="background-color:#463535">
                                <marquee direction="left"><b style="font-size:25px; color:white">For adding extra tax and charges scroll down.</b></marquee>
                                    <!-- <div class="col-md-4"></div> -->
                                    <div class="col-md-12 text-center">
                                        <div class="cont container">
                                            <div class="arrow bounce"><i class="arr fa fa-angle-down fa-5x" aria-hidden="true"></i></div>
                                            </div>
                                            <div class="below"></div>
                                    </div>
                                    <!-- <div class="col-md-4"></div> -->

                                </div>
                                <div class="row">
                                    <div class="col-md-6" style="border:2px solid #937272">
                                        <div class="row" style="padding-top:10px">
                                            <div class="col-md-2 form-group">
                                                <label>I Tax:</label> 
                                            </div>
                                            <div class="col-md-5 form-group">
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="i_tax_per" id="i_tax_per" class="form-control form-control-sm" placeholder="Income Tax" >
                                            </div>
                                            <div class="col-md-5 form-group">
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="i_tax_amt" id="i_tax_amt" class="form-control form-control-sm" placeholder="ITax Amt" readonly>
                                            </div>
                                            <div class="col-md-2 form-group">
                                                <label>Add:Others:</label> 
                                            </div>
                                            <div class="col-md-5 form-group">
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="other_code" id="other_code" class="form-control form-control-sm" placeholder="Select Account" readonly>
                                            </div>
                                            <div class="col-md-5 form-group">
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="other_name" id="other_name" class="form-control form-control-sm" placeholder="Account Desc" readonly>
                                            </div>
                                            <div class="col-sm-2 form-group">
                                                <label>Less:Freight:</label> 
                                            </div>
                                            <div class="col-md-5 form-group">
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="freight_code" id="freight_code" class="form-control form-control-sm" placeholder="Freight Code" readonly>
                                            </div>
                                            <div class="col-md-5 form-group">
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="freight_name" id="freight_name" class="form-control form-control-sm" placeholder="Freight Desc" readonly>
                                            </div>
                                            <div class="col-sm-2 form-group">
                                                <label>Less:Disc:</label> 
                                            </div>
                                            <div class="col-md-5 form-group">
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="less_code" id="less_code" class="form-control form-control-sm" placeholder="Less Code" readonly>
                                            </div>
                                            <div class="col-md-5 form-group">
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="less_name" id="less_name" class="form-control form-control-sm" placeholder="Less Desc" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="border:2px solid #937272">
                                        <div class="row" style="padding-top:10px">
                                            <div class="col-md-1 form-group">
                                                <label>Dpt:</label> 
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="dept1" id="dept1" class="form-control form-control-sm" placeholder="Depart" readonly>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="dept_amt" id="dept_amt" class="form-control form-control-sm" placeholder="Amt" readonly>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <textarea rows="1" pattern="[a-zA-Z0-9 ,._-]{1,}" name="dept_name" id="dept_name" class="form-control form-control-sm" placeholder="Dept Name" readonly></textarea>
                                            </div>
                                            <div class="col-md-1 form-group">
                                                <label>Dpt:</label> 
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="dept1" id="dept1" class="form-control form-control-sm" placeholder="Depart" readonly>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="dept_amt" id="dept_amt" class="form-control form-control-sm" placeholder="Amt" readonly>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <textarea rows="1" pattern="[a-zA-Z0-9 ,._-]{1,}" name="dept_name" id="dept_name" class="form-control form-control-sm" placeholder="Dept Name" readonly></textarea>
                                            </div>
                                            <div class="col-md-1 form-group">
                                                <label>Dpt:</label> 
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="dept1" id="dept1" class="form-control form-control-sm" placeholder="Depart" readonly>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="dept_amt" id="dept_amt" class="form-control form-control-sm" placeholder="Amt" readonly>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <textarea rows="1" pattern="[a-zA-Z0-9 ,._-]{1,}" name="dept_name" id="dept_name" class="form-control form-control-sm" placeholder="Dept Name" readonly></textarea>
                                            </div>
                                            <div class="col-md-1 form-group"></div>
                                            <div class="col-md-3 form-group"></div>
                                            <div class="col-md-4 form-group"></div>
                                            <div class="col-md-4 form-group">   
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="total_dept_amt" id="total_dept_amt" class="form-control form-control-sm" placeholder="Total Amt" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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
                    <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="item_code_e" id="item_code_e" class="form-control form-control-sm" placeholder="Item Code" readonly >
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
                <label for="inputCompanyName">Quantity :</label><span style="color:red;">*</span>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pen"></i></span>
                    </div>
                    <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="quantity_e" id="quantity_e" class="form-control form-control-sm" placeholder="Quantity" readonly>
                </div>
            </div>
            <div class="col-sm-4 form-group">
                <label for="inputCompanyName">Rate :</label><span style="color:red;">*</span>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pen"></i></span>
                    </div>
                    <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="rate_e" id="rate_e" class="form-control form-control-sm" placeholder="Rate" readonly>
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
                    <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="disc" id="disc" class="form-control form-control-sm" placeholder="Disc Rate" >
                </div>
            </div>
            <div class="col-sm-4 form-group">
                <label for="inputCompanyName">Frt Rate/Amt :</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pen"></i></span>
                    </div>
                    <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="frt" id="frt" class="form-control form-control-sm" placeholder="Frt Rate" >
                </div>
            </div>
            <div class="col-sm-4 form-group">
                <label for="inputCompanyName">Excl Rate/Amt :</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pen"></i></span>
                    </div>
                    <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="excl" id="excl" class="form-control form-control-sm" placeholder="Excl Rate" readonly>
                </div>
            </div>
            <div class="col-sm-4 form-group">
                <label for="inputCompanyName">Stax% Amt :</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pen"></i></span>
                    </div>
                    <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="stax_amt_m_e" id="stax_amt_m_e" class="form-control form-control-sm" placeholder="Stax% Amt" >
                </div>
            </div>
            <div class="col-sm-4 form-group">
                <label for="inputCompanyName">Add% Amt :</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pen"></i></span>
                    </div>
                    <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="add_amt_m_e" id="add_amt_m_e" class="form-control form-control-sm" placeholder="Add% Amt" >
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
            <div class="col-sm-4 form-group">
                <label for="inputCompanyName">Stax Amt :</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pen"></i></span>
                    </div>
                    <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="stax_amt_e" id="stax_amt_e" class="form-control form-control-sm" placeholder="Stax Final Amt" readonly>
                </div>
            </div>
            <div class="col-sm-4 form-group">
                <label for="">Add Amt :</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pen"></i></span>
                    </div>
                    <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="add_amt_e" id="add_amt_e" class="form-control form-control-sm" placeholder="Add Final Amt" readonly>
                </div>
            </div>
            <div class="col-sm-4 form-group">
                <label for="">Net Amt :</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pen"></i></span>
                    </div>
                    <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="net_amt" id="net_amt" class="form-control form-control-sm" placeholder="Net Amt" readonly>
                </div>
            </div>
          </div>
          <button type="button" id="edit_item_order" class="btn btn-primary toastrDefaultSuccess">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- party  form -->
<div class="modal fade" id="OrderFormModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Order</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
              <table class="table table-responsive-lg" id="order_table">
                <thead>
                  <tr>
                    <th>Doc#</th>
                    <th>Party Name</th>
                    <th>Refnum</th>
                    <th>Doc Date</th>
                    <th>Do Key</th>
                    <th>Total Net Amt</th>
                    <th>Qty</th>
                    <th>Receipt Qty</th>
                    <th>Order Bal</th>
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
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">City:</h3>
                    </div>
                    <div class="col-md-9">
                      <p id="city_p" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                    <div class="col-md-3">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Zone:</h3>
                    </div>
                    <div class="col-md-9">
                      <p id="zone_p" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                    <div class="col-md-3">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Phone#:</h3>
                    </div>
                    <div class="col-md-9">
                      <p id="phone" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                    <div class="col-md-3">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Division:</h3>
                    </div>
                    <div class="col-md-9">
                      <p id="division_p" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                    <div class="col-md-3">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">S/Man Code:</h3>
                    </div>
                    <div class="col-md-9">
                      <p id="salesman_code" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                    <div class="col-md-3">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">S/Man Name:</h3>
                    </div>
                    <div class="col-md-9">
                      <p id="salesman_name_p" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                    <div class="col-md-3">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Balance:</h3>
                    </div>
                    <div class="col-md-9">
                      <p id="balance_p" class="card-title" style=" font-weight:bold;"></p>
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
  <div class="modal-dialog modal-lg">
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
              <!-- <table class=" table table-bordered table-hover table-sm">     -->
                  <div class="row">
                    <div class="col-lg-6"  style="background-color:#bbb3b3">
                        <div class="row">
                            <div class="col-md-4" style="border-bottom:2px solid black">
                            <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Item Code:</h3>
                            </div>
                            <div class="col-md-8" style="border-bottom:2px solid black">
                            <p id="code_i" class="card-title" style=" font-weight:bold;"></p>
                            </div>
                            <div class="col-md-4" style="border-bottom:2px solid black">
                            <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Item Name:</h3>
                            </div>
                            <div class="col-md-8" style="border-bottom:2px solid black">
                            <p id="name_i" class="card-title" style=" font-weight:bold;"></p>
                            </div>
                            <div class="col-md-4" style="border-bottom:2px solid black">
                            <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Division Name:</h3>
                            </div>
                            <div class="col-md-8" style="border-bottom:2px solid black">
                            <p id="name_d" class="card-title" style=" font-weight:bold;"></p>
                            </div>
                            <div class="col-md-4" style="border-bottom:2px solid black">
                            <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Gen Name:</h3>
                            </div>
                            <div class="col-md-8" style="border-bottom:2px solid black">
                            <p id="name_g" class="card-title" style=" font-weight:bold;"></p>
                            </div>
                            <div class="col-md-4" style="border-bottom:2px solid black">
                            <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Loc:</h3>
                            </div>
                            <div class="col-md-8" style="border-bottom:2px solid black">
                            <p id="loc_i" class="card-title" style=" font-weight:bold;"></p>
                            </div>
                            <div class="col-md-4" style="border-bottom:2px solid black">
                            <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Batch#:</h3>
                            </div>
                            <div class="col-md-8" style="border-bottom:2px solid black">
                            <p id="batch_no_i" class="card-title" style=" font-weight:bold;"></p>
                            </div>
                            <div class="col-md-4" style="border-bottom:2px solid black">
                            <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Expiry Date:</h3>
                            </div>
                            <div class="col-md-8" style="border-bottom:2px solid black">
                            <p id="exp_date_i" class="card-title" style=" font-weight:bold;"></p>
                            </div>
                            <div class="col-md-4" style="border-bottom:2px solid black">
                            <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">GD Number:</h3>
                            </div>
                            <div class="col-md-8" style="border-bottom:2px solid black">
                            <p id="gd_no_i" class="card-title" style=" font-weight:bold;"></p>
                            </div>
                            <div class="col-md-4" style="border-bottom:2px solid black">
                            <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">GD Date:</h3>
                            </div>
                            <div class="col-md-8" style="border-bottom:2px solid black">
                            <p id="add_e_i" class="card-title" style=" font-weight:bold;"></p>
                            </div>
                            <div class="col-md-4" style="border-bottom:2px solid black">
                            <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Item HSCode:</h3>
                            </div>
                            <div class="col-md-8" style="border-bottom:2px solid black">
                            <p id="item_hs_i" class="card-title" style=" font-weight:bold;"></p>
                            </div>
                            <div class="col-md-4" style="border-bottom:2px solid black">
                            <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Tax Rate:</h3>
                            </div>
                            <div class="col-md-8" style="border-bottom:2px solid black">
                            <p id="tax_r_i" class="card-title" style=" font-weight:bold;"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6"  style="background-color:#6e4e37">
                        <div class="row">
                            <!-- <div class="col-md-2">
                            <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Order:</h3>
                            </div>
                            <div class="col-md-4">
                            <p id="order_i" class="card-title" style=" font-weight:bold;"></p>
                            </div> -->
                            <div class="col-md-4" style="border-bottom:2px solid black">
                                <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">DC Quantity:</h3>
                            </div>
                            <div class="col-md-8" style="border-bottom:2px solid black">
                                <p id="dc_qty_i" class="card-title" style=" font-weight:bold;"></p>
                            </div>
                            <div class="col-md-4" style="border-bottom:2px solid black">
                                <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Balance Qty:</h3>
                            </div>
                            <div class="col-md-8" style="border-bottom:2px solid black">
                                <p id="bal_qty_i" class="card-title" style=" font-weight:bold;"></p>
                            </div>
                            <div class="col-md-4" style="border-bottom:2px solid black">
                                <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Quantity:</h3>
                            </div>
                            <div class="col-md-8" style="border-bottom:2px solid black">
                                <p id="quantity_i" class="card-title" style=" font-weight:bold;"></p>
                            </div>
                            <div class="col-md-4" style="border-bottom:2px solid black">
                                <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Rate:</h3>
                            </div>
                            <div class="col-md-8" style="border-bottom:2px solid black">
                                <p id="rate_i" class="card-title" style=" font-weight:bold;"></p>
                            </div>
                            <div class="col-md-4" style="border-bottom:2px solid black">
                                <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Amount:</h3>
                            </div>
                            <div class="col-md-8" style="border-bottom:2px solid black">
                                <p id="amount_i" class="card-title" style=" font-weight:bold;"></p>
                            </div>
                            <div class="col-md-4" style="border-bottom:2px solid black">
                                <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Disc %:</h3>
                            </div>
                            <div class="col-md-8" style="border-bottom:2px solid black">
                                <p id="disc_i" class="card-title" style=" font-weight:bold;"></p>
                            </div>
                            <div class="col-md-4" style="border-bottom:2px solid black">
                                <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Disc Amount:</h3>
                            </div>
                            <div class="col-md-8" style="border-bottom:2px solid black">
                                <p id="disc_e_i" class="card-title" style=" font-weight:bold;"></p>
                            </div>
                            <div class="col-md-4" style="border-bottom:2px solid black">
                                <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Frt %:</h3>
                            </div>
                            <div class="col-md-8" style="border-bottom:2px solid black">
                                <p id="frt_i" class="card-title" style=" font-weight:bold;"></p>
                            </div>
                            <div class="col-md-4" style="border-bottom:2px solid black">
                                <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Frt Amount:</h3>
                            </div>
                            <div class="col-md-8" style="border-bottom:2px solid black">
                                <p id="frt_e_i" class="card-title" style=" font-weight:bold;"></p>
                            </div>
                            <div class="col-md-4" style="border-bottom:2px solid black">
                                <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Excl Rate:</h3>
                            </div>
                            <div class="col-md-8" style="border-bottom:2px solid black">
                                <p id="excl_i" class="card-title" style=" font-weight:bold;"></p>
                            </div>
                            <div class="col-md-4" style="border-bottom:2px solid black">
                                <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Excl Amount:</h3>
                            </div>
                            <div class="col-md-8" style="border-bottom:2px solid black">
                                <p id="excl_e_i" class="card-title" style=" font-weight:bold;"></p>
                            </div>
                            <div class="col-md-4" style="border-bottom:2px solid black">
                                <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Stax %:</h3>
                            </div>
                            <div class="col-md-8" style="border-bottom:2px solid black">
                                <p id="stax_per_i" class="card-title" style=" font-weight:bold;"></p>
                            </div>
                            <div class="col-md-4" style="border-bottom:2px solid black">
                                <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Stax Amount:</h3>
                            </div>
                            <div class="col-md-8" style="border-bottom:2px solid black">
                                <p id="stax_e_i" class="card-title" style=" font-weight:bold;"></p>
                            </div>
                            <div class="col-md-4" style="border-bottom:2px solid black">
                                <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Add %:</h3>
                            </div>
                            <div class="col-md-8" style="border-bottom:2px solid black">
                                <p id="add_per_i" class="card-title" style=" font-weight:bold;"></p>
                            </div>
                            <div class="col-md-4" style="border-bottom:2px solid black">
                                <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Add Amount:</h3>
                            </div>
                            <div class="col-md-8" style="border-bottom:2px solid black">
                                <p id="add_e_i" class="card-title" style=" font-weight:bold;"></p>
                            </div>
                            <div class="col-md-4" style="border-bottom:2px solid black">
                                <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Net Amount:</h3>
                            </div>
                            <div class="col-md-8" style="border-bottom:2px solid black">
                                <p id="net_amount_i" class="card-title" style=" font-weight:bold;"></p>
                            </div>
                        </div>
                    </div>
                  </div>
              <!-- </table> -->
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
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> 
<script>
  AOS.init();
</script>

<script>
$(window).scroll(function(){
    $(".arrow").css("opacity", 1 - $(window).scrollTop() / 3000); 
  //250 is fade pixels
  });
</script>
<script>
$("#item_edit").on("click","#edit_item_order", function () {
    var disc=$('#disc').val(); 
    $("#extra").attr("data-disc", disc);
    var frt=$('#frt').val(); 
    $("#extra").attr("data-frt", frt);
    var excl=$('#excl').val(); 
    $("#extra").attr("data-excl", excl);
    var disc_e=$('#disc_e').val(); 
    $("#extra").attr("data-disc-final", disc_e);
    var frt_e=$('#frt_e').val(); 
    $("#extra").attr("data-frt-final", frt_e);
    var excl_e=$('#excl_e').val(); 
    $("#extra").attr("data-excl-final", excl_e);
    $('#EditItemModal').modal('hide');
});


$(document).ready(function(){i_tax_per
    $("#order_form").on('change','#i_tax_per',function(){
        var net_amt=$('#n_total').text();
        if(net_amt=='' || net_amt=='0' || net_amt=='0.00'){
            net_amt=0;
        }else{
            net_amt = net_amt.replaceAll(',','');
        }
        var i_tax_per=$('#i_tax_per').val();
        var amt=parseFloat(net_amt)*parseFloat(i_tax_per)/100;
        var total_amountt=new Intl.NumberFormat(
        'en-US', { style: 'currency', 
        currency: 'USD',
        currencyDisplay: 'narrowSymbol'}).format(amt);
        var total_amountt=total_amountt.replace(/[$]/g,'');
        $('#i_tax_amt').val(total_amountt);
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
        var previous_disc_amount= $('#disc_e'+p_rate_id).val();
        sessionStorage.setItem("previous_disc_amount", previous_disc_amount);
        var previous_net= $('#net_amt'+p_rate_id).val();
        sessionStorage.setItem("previous_net", previous_net);
    });
    $("#order_form").on('change','.rate',function(){
        var previous_amounts=sessionStorage.getItem('previous_amount');
        // console.log(previous_amounts);
        if(previous_amounts == ""){
            previous_amount=0;
        }else{
            previous_amount = previous_amounts.replaceAll(',','');
        }
        var total=$('#a_total').text();
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
        $('#disc'+rateid).val('');
        $('#disc_e'+rateid).val('');
        $('#frt'+rateid).val('');
        $('#frt_e'+rateid).val('');
        $('#excl'+rateid).val('');
        $('#excl_e'+rateid).val('');
        $('#excl'+rateid).val('');
        $('#excl_e'+rateid).val('');
        $('#stax_amt'+rateid).val('');
        $('#stax_amt_e'+rateid).val('');
        $('#add_amt'+rateid).val('');
        $('#add_amt_e'+rateid).val('');
        var quantity=$('#quantity'+rate_id).val();
        var rate=$('#rate'+rate_id).val();
        if(quantity == "" || quantity == '0.00' || quantity == '0'){
            quantity=0;
        }
        if(rate == "" || rate == '0.00' || rate == '0'){
            rate=0;
            amts=0;
            $('#amount'+rate_id).val(amts);
            $('#net_amt'+rate_id).val('');
        }else{
            pre_rate = rate.replaceAll(',','');
            var rate=new Intl.NumberFormat(
            'en-US', { style: 'currency', 
                currency: 'USD',
            currencyDisplay: 'narrowSymbol'}).format(pre_rate);
            var rate=rate.replace(/[$]/g,'');
            var  show_rate=rate;
            $('#rate'+rate_id).val(show_rate);
            var amts=parseFloat(quantity) * parseFloat(pre_rate);
            var org_amt=new Intl.NumberFormat(
            'en-US', { style: 'currency', 
            currency: 'USD',
            currencyDisplay: 'narrowSymbol'}).format(amts);
            var org_amt=org_amt.replace(/[$]/g,'');
            $('#amount'+rate_id).val(org_amt);
            $('#net_amt'+rate_id).val(org_amt);
        }
        var amount=$('#amount'+rate_id).val();
        if(amount == "" || amount == '0.00' || amount == '0'){
            pre_amount=0;
        }else{
            pre_amount = amount.replaceAll(',','');
        }
        var fnf=parseFloat(minuss) +parseFloat(pre_amount);
        var total=new Intl.NumberFormat(
        'en-US', { style: 'currency', 
        currency: 'USD',
        currencyDisplay: 'narrowSymbol'}).format(fnf);
        var total=total.replace(/[$]/g,'');
        $('#a_total').html(total);
        var disc=$('#disc'+rate_id).val();
        if(disc == "" || disc == '0.00' || disc == '0'){
            discount_amount=0;
        }else{
            discount_amt = disc.replaceAll(',','');
            discount_amt=parseFloat(pre_amount*disc/100);
            var discount_amt_ttl=new Intl.NumberFormat(
            'en-US', { style: 'currency', 
            currency: 'USD',
            currencyDisplay: 'narrowSymbol'}).format(discount_amt);
            var discount_amount=discount_amt_ttl.replace(/[$]/g,'');
        }
        var previous_nets=sessionStorage.getItem('previous_net');
        // console.log(previous_nets);
        if(previous_nets == ""){
            previous_net=0;
        }else{
            previous_net = previous_nets.replaceAll(',','');
        }
        $('#disc_e').val(discount_amount);
        var n_total=$('#n_total').text();
        if(n_total == '' || n_total == '0' || n_total=='0.00'){
            minuss_n=0;
        }else{
            minus_t_n = n_total.replaceAll(',','');
            minuss_n= parseFloat(minus_t_n) - parseFloat(previous_net);
            console.log(minuss_n);
        }
        var amount_net=$('#net_amt'+quantity_id).val();
        if(amount_net == '' || amount_net == '0' || amount_net=='0.00'){
            net_rc=0;
        }else{
            net_rc = amount_net.replaceAll(',','');
        }
        var net=new Intl.NumberFormat(
        'en-US', { style: 'currency', 
            currency: 'USD',
        currencyDisplay: 'narrowSymbol'}).format(net_rc);
        var net_amt=net.replace(/[$]/g,'');
        var fnf_net=parseFloat(minuss_n) +parseFloat(net_rc);
        var total=new Intl.NumberFormat(
        'en-US', { style: 'currency', 
        currency: 'USD',
        currencyDisplay: 'narrowSymbol'}).format(fnf_net);
        var total=total.replace(/[$]/g,'');
        // console.log(total);
        $('#n_total').html(total);
        

    });
    $("#order_form").on('focus','.quantity',function(){
        var button_id = $(this).attr("id");
        if(button_id =='quantity'){
        var p_quantity_id='';
        }else{
        var p_amountid = button_id.split("y");
        var p_quantity_id=p_amountid[1];
        }
        var previous_amount= $('#quantity'+p_quantity_id).val();
        sessionStorage.setItem("previous_amount", previous_amount);
        var previous_net= $('#net_amt'+p_quantity_id).val();
        sessionStorage.setItem("previous_net", previous_net);
    });
    $("#order_form").on('change','.quantity',function(){
        var previous_amounts=sessionStorage.getItem('previous_amount');
        // console.log(previous_amounts);
        if(previous_amounts == ""){
            previous_amount=0;
        }else{
            previous_amount = previous_amounts.replaceAll(',','');
        }
        var total=$('#q_total').text();
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
        var dc_qty=$('#dc_qty'+quantity_id).val();
        if(parseInt(quantity) > parseInt(dc_qty)){
            $('#msg').html("quantity is greater than then available quantity");
            $('#quantity'+quantity_id).val('');
        }else{
            $('#msg').html("");
            $('#inv_qty'+quantity_id).val(quantity);
            var rate=$('#rate'+quantity_id).val();
            if(quantity=='' || quantity=='0' || quantity=='0.00'){
                $('#rate'+quantity_id).val('');
                $('#amount'+quantity_id).val('');
                $('#disc'+quantity_id).val('');
                $('#disc_e'+quantity_id).val('');
                $('#frt'+quantity_id).val('');
                $('#frt_e'+quantity_id).val('');
                $('#excl'+quantity_id).val('');
                $('#excl_e'+quantity_id).val('');
                $('#stax_amt'+quantity_id).val('');
                $('#stax_amt_e'+quantity_id).val('');
                $('#add_amt'+quantity_id).val('');
                $('#add_amt_e'+quantity_id).val('');
                $('#net_amt'+quantity_id).val('');
                pre_quantity=0;
            }
            else{

                if(rate == "" || rate=="0" || rate=="0.00"){
                    $('#amount').val('');
                    $('#rate').val('');
                    $('#net_amt').val('');
                    pre_rate=0;
                }else{
                        pre_rate = rate.replaceAll(',','');
                        var rate=new Intl.NumberFormat(
                        'en-US', { style: 'currency', 
                            currency: 'USD',
                        currencyDisplay: 'narrowSymbol'}).format(pre_rate);
                        var rate=rate.replace(/[$]/g,'');
                }
                
                pre_quantity = quantity.replaceAll(',','');
                var quantity=new Intl.NumberFormat(
                'en-US', { style: 'currency', 
                    currency: 'USD',
                currencyDisplay: 'narrowSymbol'}).format(pre_quantity);
                var quantity=quantity.replace(/[$]/g,'');
                // console.log(show_rate);
                $('#rate'+quantity_id).val(rate);
                var amts=parseFloat(pre_quantity) * parseFloat(pre_rate);
                var org_amt=new Intl.NumberFormat(
                'en-US', { style: 'currency', 
                currency: 'USD',
                currencyDisplay: 'narrowSymbol'}).format(amts);
                var org_amt=org_amt.replace(/[$]/g,'');
                $('#amount'+quantity_id).val(org_amt);
                $('#net_amt'+quantity_id).val(org_amt);
                var amount=$('#amount'+quantity_id).val();
                var previous_nets=sessionStorage.getItem('previous_net');
                // console.log(previous_nets);
                if(previous_nets == ""){
                    previous_net=0;
                }else{
                    previous_net = previous_nets.replaceAll(',','');
                }
                var n_total=$('#n_total').text();
                if(n_total == '' || n_total == '0' || n_total=='0.00'){
                    minuss_n=0;
                }else{
                    minus_t_n = n_total.replaceAll(',','');
                    minuss_n= parseFloat(minus_t_n) - parseFloat(previous_net);
                    // console.log(minuss_n);
                }
                var amount_net=$('#net_amt'+quantity_id).val();
                if(amount_net == '' || amount_net == '0' || amount_net=='0.00'){
                    net_rc=0;
                }else{
                    net_rc = amount_net.replaceAll(',','');
                }
                var net=new Intl.NumberFormat(
                'en-US', { style: 'currency', 
                    currency: 'USD',
                currencyDisplay: 'narrowSymbol'}).format(net_rc);
                var net_amt=net.replace(/[$]/g,'');
                var fnf_net=parseFloat(minuss_n) +parseFloat(net_rc);
                var total=new Intl.NumberFormat(
                'en-US', { style: 'currency', 
                currency: 'USD',
                currencyDisplay: 'narrowSymbol'}).format(fnf_net);
                var total=total.replace(/[$]/g,'');
                // console.log(total);
                $('#n_total').html(total);
                // $('#amount'+quantity_id).val(show_amount);
                
            }
            var total_q=parseInt(minuss)+parseInt(pre_quantity);
            $('#q_total').text(total_q);
            
        }
    });
    $("#order_form").on('focus','.stax_amt',function(){
        var button_id = $(this).attr("id");
        if(button_id =='stax_amt'){
        var p_stx_id='';
        }else{
        var p_amountid = button_id.split("mt");
        var p_stx_id=p_amountid[1];
        }
        var previous_stx_amount= $('#stax_amt_e'+p_stx_id).val();
        sessionStorage.setItem("previous_stx_amount", previous_stx_amount);
        var previous_net= $('#net_amt'+p_stx_id).val();
        sessionStorage.setItem("previous_net", previous_net);
    });
    $("#order_form").on('change','.stax_amt',function(){
        var previous_staxs=sessionStorage.getItem('previous_stx_amount');
        var previous_nets=sessionStorage.getItem('previous_net');
        // console.log(previous_staxs);
        if(previous_staxs == ""){
            previous_stax=0;
        }else{
            previous_stax = previous_staxs.replaceAll(',','');
        }
        if(previous_nets == ""){
            previous_net=0;
        }else{
            previous_net = previous_nets.replaceAll(',','');
        }
        var deduct_net=parseFloat(previous_net)-parseFloat(previous_stax);
        var n_total=$('#n_total').text();
        // console.log(n_total);
        if(n_total == '' || n_total == '0' || n_total=='0.00'){
            minuss=0;
        }else{
            minus_t = n_total.replaceAll(',','');
            minuss= parseFloat(minus_t) - parseFloat(previous_stax);
        }
        // console.log(minuss);
        var button_id = $(this).attr("id");
        if(button_id =='stax_amt'){
            stax_id='';
        }else{
            var staxid = button_id.split("mt");
            stax_id=staxid[1];
        }
        var stax_amt=$('#stax_amt'+stax_id).val();
        // console.log(stax_amt);
        var net_amts=$('#net_amt'+stax_id).val();
        net_amt = net_amts.replaceAll(',','');
        // console.log(net_amt);
        var final_stx_amts=parseFloat(stax_amt)*parseFloat(deduct_net)/100;
        console.log(final_stx_amts);
        var final_stx_amt=new Intl.NumberFormat(
        'en-US', { style: 'currency', 
            currency: 'USD',
        currencyDisplay: 'narrowSymbol'}).format(final_stx_amts);
        var final_stx_amt=final_stx_amt.replace(/[$]/g,'');
        // console.log(show_rate);
        $('#stax_amt_e'+stax_id).val(final_stx_amt);
        
        var total_net=parseFloat(minuss)+parseFloat(final_stx_amts);
        var final_net_amt=new Intl.NumberFormat(
        'en-US', { style: 'currency', 
            currency: 'USD',
        currencyDisplay: 'narrowSymbol'}).format(total_net);
        var final_net_amt=final_net_amt.replace(/[$]/g,'');
        $('#n_total').html(final_net_amt);
        console.log(final_stx_amt);
        var new_net=parseFloat(deduct_net)+parseFloat(final_stx_amts);
        var final_net_row=new Intl.NumberFormat(
        'en-US', { style: 'currency', 
            currency: 'USD',
        currencyDisplay: 'narrowSymbol'}).format(new_net);
        var final_net_row=final_net_row.replace(/[$]/g,'');
        $('#net_amt'+stax_id).val(final_net_row);

    });
    $("#order_form").on('focus','.add_amt',function(){
        var button_id = $(this).attr("id");
        if(button_id =='add_amt'){
        var p_add_id='';
        }else{
        var p_amountid = button_id.split("mt");
        var p_add_id=p_amountid[1];
        }
        var previous_add_amount= $('#add_amt_e'+p_add_id).val();
        sessionStorage.setItem("previous_add_amount", previous_add_amount);
        var previous_net= $('#net_amt'+p_add_id).val();
        sessionStorage.setItem("previous_net", previous_net);
    });
    $("#order_form").on('change','.add_amt',function(){
        var previous_adds=sessionStorage.getItem('previous_add_amount');
        var previous_nets=sessionStorage.getItem('previous_net');
        // console.log(previous_amounts);
        if(previous_adds == ""){
            previous_add=0;
        }else{
            previous_add = previous_adds.replaceAll(',','');
        }
        if(previous_nets == ""){
            previous_net=0;
        }else{
            previous_net = previous_nets.replaceAll(',','');
        }
        var deduct_net=parseFloat(previous_net)-parseFloat(previous_add);
        var n_total=$('#n_total').text();
        if(n_total == '' || n_total == '0' || n_total=='0.00'){
            minuss=0;
        }else{
            minus_t = n_total.replaceAll(',','');
            minuss= parseFloat(minus_t) - parseFloat(previous_add);
        }
        // console.log(minuss);
        var button_id = $(this).attr("id");
        if(button_id =='add_amt'){
            add_id='';
        }else{
            var addid = button_id.split("mt");
            add_id=addid[1];
        }
        var add_amt=$('#add_amt'+add_id).val();
        var net_amt=$('#net_amt'+add_id).val();
        var final_add_amts=parseFloat(add_amt)*parseFloat(deduct_net)/100;
        var final_add_amt=new Intl.NumberFormat(
        'en-US', { style: 'currency', 
            currency: 'USD',
        currencyDisplay: 'narrowSymbol'}).format(final_add_amts);
        var final_add_amt=final_add_amt.replace(/[$]/g,'');
        // console.log(show_rate);
        $('#add_amt_e'+add_id).val(final_add_amt);
        var total_net=parseFloat(minuss)+parseFloat(final_add_amts);
        var final_net_amt=new Intl.NumberFormat(
        'en-US', { style: 'currency', 
            currency: 'USD',
        currencyDisplay: 'narrowSymbol'}).format(total_net);
        var final_net_amt=final_net_amt.replace(/[$]/g,'');
        $('#n_total').html(final_net_amt);

        var new_net=parseFloat(deduct_net)+parseFloat(final_add_amts);
        var final_net_row=new Intl.NumberFormat(
        'en-US', { style: 'currency', 
            currency: 'USD',
        currencyDisplay: 'narrowSymbol'}).format(new_net);
        var final_net_row=final_net_row.replace(/[$]/g,'');
        $('#net_amt'+stax_id).val(final_net_row);
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
              url: 'api/sales_module/transaction_files/sales_order_api.php',
              type: 'POST',
              data: {action: 'item_detail',item_code:item_code},
              dataType: "json",
              success: function(data){
                var code_i=$('#acc_desc'+id).val();
                var name_i=$('#detail'+id).val();
                // var name_g=$('#name_g').val();
                // var name_d=$('#name_d').val();
                // var order_i=$('#order_i').val();
                var dc_qty_i=$('#dc_qty'+id).val();
                var bal_qty_i=$('#inv_qty'+id).val();
                var quantity_i=$('#quantity'+id).val();
                var rate_i=$('#rate'+id).val();
                var amount_i=$('#amount'+id).val();
                var disc_i=$('#disc'+id).val();
                var disc_e_i=$('#disc_e'+id).val();
                var frt_i=$('#frt'+id).val();
                var frt_e_i=$('#frt_e'+id).val();
                var excl_i=$('#excl'+id).val();
                var excl_e_i=$('#excl_e'+id).val();
                var stax_per_i=$('#stax_amt'+id).val();
                var stax_e_i=$('#stax_amt_e'+id).val();
                var add_per_i=$('#add_amt'+id).val();
                var add_e_i=$('#add_amt_e'+id).val();
                var net_amount_i=$('#net_amt'+id).val();
                var loc_i=$('#loc'+id).val();
                var batch_no_i=$('#batch_no'+id).val();
                var exp_date_i=$('#expiry_dt'+id).val();
                var gd_no_i=$('#gd_no_i').val();
                var item_hs_i=$('#item_hs_i').val();
                var tax_r_i=$('#tax_r_i').val();
                  $('#code_i').html(code_i);
                  $('#name_i').html(name_i);
                  $('#dc_qty_i').html(dc_qty_i);
                  $('#bal_qty_i').html(bal_qty_i);
                  $('#quantity_i').html(quantity_i);
                  $('#rate_i').html(rate_i);
                  $('#amount_i').html(amount_i);
                  $('#disc_i').html(disc_i);
                  $('#disc_e_i').html(disc_e_i);
                  $('#frt_i').html(frt_i);
                  $('#frt_e_i').html(frt_e_i);
                  $('#excl_i').html(excl_i);
                  $('#excl_e_i').html(excl_e_i);
                  $('#stax_per_i').html(stax_per_i);
                  $('#stax_e_i').html(stax_e_i);
                  $('#add_per_i').html(add_per_i);
                  $('#add_e_i').html(add_e_i);
                  $('#net_amount_i').html(net_amount_i);
                  $('#loc_i').html(loc_i);
                  $('#batch_no_i').html(batch_no_i);
                  $('#exp_date_i').html(exp_date_i);
                  $('#gd_no_i').html(gd_no_i);
                  $('#item_hs_i').html(item_hs_i);
                  $('#tax_r_i').html(tax_r_i);
                  $('#division_i').html(data.division_name);
                  $('#gen_i').html(data.gen_name);
                  $('#gd_no_i').html(data.gd_no);
                  $('#gd_date_i').html(data.gd_date);
                  $('#item_hs_i').html(data.hscode);
                  $('#tax_r_i').html(data.tax_rate);
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
//select order key
$('#order_form').on('click','#order_key',function(){
        $('#order_table').dataTable().fnDestroy();
        table = $('#order_table').DataTable({
            dom: 'Bfrtip',
            orderCellsTop: true,
            fixedHeader: true,
            
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print',
            ]
        });
        // Setup - add a text input to each footer cell
        // $('#order_table thead tr').clone(true).appendTo( '#order_table thead' );
        $('#order_table thead tr:eq(1) th').each( function (i) {
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
        // order code dropdown
        $.ajax({
            url: 'api/sales_module/transaction_files/invoice_api.php',
            type: 'POST',
            data: {action: 'order_code'},
            dataType: "json",
            success: function(response){
                console.log(response);
            table.clear().draw();
            // append data in datatable
            for (var i = 0; i < response.length; i++) {
                var refnum=response[i].refnum==''?'-':response[i].refnum;
                table.row.add([response[i].doc_no,response[i].party_name,refnum,response[i].doc_date,response[i].order_key,response[i].excl_amt,response[i].qty,response[i].receipt_qty,'-',response[i].div_code,response[i].doc_year]);
           
            }
            table.draw();
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        });  
        $('#OrderFormModel').modal('show');
        
    
});
//get value of all fields
$('#order_table').on('click','.even',function(){
    var doc_no=$(this).closest('tr').children('td:nth-child(1)').text();
    var party_name=$(this).closest('tr').children('td:nth-child(2)').text();
    var ref_num=$(this).closest('tr').children('td:nth-child(3)').text();
    var doc_date=$(this).closest('tr').children('td:nth-child(4)').text();
    var order_key=$(this).closest('tr').children('td:nth-child(5)').text();
    var total_net_amt=$(this).closest('tr').children('td:nth-child(6)').text();
    var qty=$(this).closest('tr').children('td:nth-child(7)').text();
    var receipt_qty=$(this).closest('tr').children('td:nth-child(8)').text();
    var order_bal=$(this  ).closest('tr').children('td:nth-child(9)').text();
    // var div_code=$(this).closest('tr').children('td:nth-child(10)').text();
    // var doc_year=$(this).closest('tr').children('td:nth-child(11)').text();
    $.ajax({
        url: 'api/sales_module/transaction_files/invoice_api.php',
        type: 'POST',
        data: {action: 'get_detail',doc_no:doc_no,party_name:party_name,ref_num:ref_num,doc_date:doc_date,
          order_key:order_key,total_net_amt:total_net_amt,qty:qty,receipt_qty:receipt_qty,order_bal:order_bal},
        dataType: "json",
        async: false,
        success: function(response){
          // console.log(response);
          $('#order_key').val(response.detail.order_key);
          $('#doc_no').val(response.detail.doc_no);
          $('#company_code').val(response.detail.co_code);
          $('#company_name').val(response.detail.co_name);
          $('#division').val(response.detail.div_code);
          $('#division_name').val(response.detail.division_name);
          $('#party').val(response.party_code);
          $('#purchase_mode').val(response.detail.po_catg);
          $('#salesman').val(response.sman_code);
          $('#salesman_name').val(response.sman_name);
          $('#po_date').val(response.detail.doc_date);
          $('#party_ref').val(response.party_ref);
          $('#v_no').val(response.v_no);
          var party_code=$('#party').val();
            if(party_code !=''){
              // document no dropdown
              $.ajax({
                  url: 'api/sales_module/transaction_files/sales_order_api.php',
                  type: 'POST',
                  data: {action: 'party_detail',party_code:party_code},
                  dataType: "json",
                  success: function(data){
                      console.log(data);
                      $('#name').val(data.party_name);
                      $('#address').val(data.address);
                      $('#city_p').val(data.city_name);
                      $('#zone_p').val(data.zone_name);
                      $('#phone').val(data.phone_nos);
                      $('#division_p').val(data.division_name);
                      $('#salesman_code').val(data.salesman_code);
                      $('#salesman_name_p').val(data.sman_name);
                      $('#balance_p').val(data.balance);
                  },
                  error: function(error){
                      console.log(error);
                      alert("Contact IT Department");
                  }
              });
            }
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });  
    $('#OrderFormModel').modal('hide'); 
    var company_code=$('#company_code').val();
    // Item code dropdown
    $.ajax({
      url: 'api/sales_module/transaction_files/invoice_api.php',
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
});
$('#order_table').on('click','.odd',function(){
        $("#ajax-loader").show();
    var doc_no=$(this).closest('tr').children('td:nth-child(1)').text();
    var party_name=$(this).closest('tr').children('td:nth-child(2)').text();
    var ref_num=$(this).closest('tr').children('td:nth-child(3)').text();
    var doc_date=$(this).closest('tr').children('td:nth-child(4)').text();
    var order_key=$(this).closest('tr').children('td:nth-child(5)').text();
    var total_net_amt=$(this).closest('tr').children('td:nth-child(6)').text();
    var qty=$(this).closest('tr').children('td:nth-child(7)').text();
    var receipt_qty=$(this).closest('tr').children('td:nth-child(8)').text();
    var order_bal=$(this  ).closest('tr').children('td:nth-child(9)').text();
    // var div_code=$(this).closest('tr').children('td:nth-child(10)').text();
    // var doc_year=$(this).closest('tr').children('td:nth-child(11)').text();
    $.ajax({
        url: 'api/sales_module/transaction_files/invoice_api.php',
        type: 'POST',
        data: {action: 'get_detail',doc_no:doc_no,party_name:party_name,ref_num:ref_num,doc_date:doc_date,
          order_key:order_key,total_net_amt:total_net_amt,qty:qty,receipt_qty:receipt_qty,order_bal:order_bal},
        dataType: "json",
        async: false,
        success: function(response){
          // console.log(response.detail.co_code);
          $('#order_key').val(response.detail.order_key);
          // $('#doc_no').val(response.detail.doc_no);
          $('#company_code').val(response.detail.co_code);
          $('#company_name').val(response.detail.co_name);
          $('#division').val(response.detail.div_code);
          $('#division_name').val(response.detail.division_name);
          $('#party').val(response.party_code);
          $('#purchase_mode').val(response.detail.po_catg);
          $('#salesman').val(response.sman_code);
          $('#salesman_name').val(response.sman_name);
          $('#po_date').val(response.detail.doc_date);
          $('#party_ref').val(response.party_ref);
          $('#v_no').val(response.v_no);
          var party_code=$('#party').val();
          if(party_code !=''){
              // document no dropdown
              $.ajax({
                  url: 'api/sales_module/transaction_files/sales_order_api.php',
                  type: 'POST',
                  data: {action: 'party_detail',party_code:party_code},
                  dataType: "json",
                  success: function(data){
                      console.log(data);
                      $('#name').val(data.party_name);
                      $('#address').val(data.address);
                      $('#city_p').val(data.city_name);
                      $('#zone_p').val(data.zone_name);
                      $('#phone').val(data.phone_nos);
                      $('#division_p').val(data.division_name);
                      $('#salesman_code').val(data.salesman_code);
                      $('#salesman_name_p').val(data.sman_name);
                      $('#balance_p').val(data.balance);
                  },
                  error: function(error){
                      console.log(error);
                      alert("Contact IT Department");
                  }
              });
            }
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    }); 
    $('#OrderFormModel').modal('hide');
    var company_code=$('#company_code').val();
     $('#view_party').css('display','');
     $('#view_party').fadeIn("slow");
    // console.log(company_code);
    // var division=$('#division').val();
    // var party_code=$('#party').val();
    // Item code dropdown
    $.ajax({
      url: 'api/sales_module/transaction_files/invoice_api.php',
      type: 'POST',
      data: {action: 'item_code',company_code:company_code},
      dataType: "json",
      success: function(data){
        console.log(data);
        $("#ajax-loader").hide();
          $('#acc_desc').html('');
          $('#acc_desc').append('<option value="" selected disabled>Select Account</option>');
          $.each(data, function(key, value){ 
            $('#acc_desc').append('<option data-name="'+value["item_descr"]+'"  data-code='+value["item_div"]+' value='+value["item_div"]+'>'+value["item_div"]+' - '+value["item_descr"]+'</option>');
          });
      },
      error: function(error){
          console.log(error);
          alert("Contact IT Department");
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
      var company_code=$('#company_code').val();
      var order_key=$('#order_key').val();
      $.ajax({
        url: 'api/sales_module/transaction_files/invoice_api.php',
        type: 'POST',
        data: {action: 'quantity_detail',item_code:account_code,company_code:company_code,order_key:order_key},
        dataType: "json",
        success: function(data){
            var dc_qty=parseFloat(data.receipt_qty);
            var order_qty=data.qty;
            var total_qty=parseFloat(parseFloat(order_qty)-dc_qty);
            $('#dc_qty').val(dc_qty);
            $('#bal_qty').val(total_qty);
            
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
      }); 
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
      var company_code=$('#company_code').val();
      var order_key=$('#order_key').val();
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
      $.ajax({
        url: 'api/sales_module/transaction_files/invoice_api.php',
        type: 'POST',
        data: {action: 'quantity_detail',item_code:account_code,company_code:company_code,order_key:order_key},
        dataType: "json",
        success: function(data){
            var dc_qty=parseFloat(data.receipt_qty);
            var order_qty=data.qty;
            var total_qty=parseFloat(parseFloat(order_qty)-dc_qty);
            $('#dc_qty').val(dc_qty);
            $('#bal_qty').val(total_qty);
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
    $("#example1").on('focus','.disc',function(){
        var button_id = $(this).attr("id");
        if(button_id =='disc'){
        var p_disc_id='';
        }else{
        var p_amountid = button_id.split("c");
        var p_disc_id=p_amountid[1];
        }
        var previous_net= $('#net_amt'+p_disc_id).val();
        sessionStorage.setItem("previous_net", previous_net);
    });
    $("#example1").on('change','.disc',function(){
        var button_id = $(this).attr("id");
        if(button_id =='disc'){
        var disc_id='';
        }else{
        var disc_ids = button_id.split("c");
        var disc_id=disc_ids[1];
        }
        var disc_m_e=$('#disc'+disc_id).val();
        if(disc_m_e =='' || isNaN(disc_m_e)){
            disc_m_e=0;
        }
        var disc_fnf=new Intl.NumberFormat(
        'en-US', { style: 'currency', 
            currency: 'USD',
        currencyDisplay: 'narrowSymbol'}).format(disc_m_e);
        disc_fnf=disc_fnf.replace(/[$]/g,'');
        $('#disc'+disc_id).val(disc_fnf);
        $('#frt'+disc_id).val('');
        $('#frt_e'+disc_id).val('');
        $('#excl'+disc_id).val('');
        $('#excl_e'+disc_id).val('');
        var gross_amount=$('#amount'+disc_id).val();
        // console.log(gross_amount);
        if(gross_amount==''){
            gross_amount=0;
        }else{
            gross_amount = gross_amount.replaceAll(',','');
            console.log(gross_amount);
        }
        var amts=parseFloat(gross_amount) * parseFloat(disc_m_e) /100;
        var net_amts=parseFloat(gross_amount) - parseFloat(amts);
        var net_amt=new Intl.NumberFormat(
        'en-US', { style: 'currency', 
            currency: 'USD',
        currencyDisplay: 'narrowSymbol'}).format(net_amts);
        net_amt=net_amt.replace(/[$]/g,'');
        // console.log(amts);
        var disc_amt=new Intl.NumberFormat(
        'en-US', { style: 'currency', 
            currency: 'USD',
        currencyDisplay: 'narrowSymbol'}).format(amts);
        disc_amt=disc_amt.replace(/[$]/g,'');
        $('#disc_e'+disc_id).val(disc_amt);
        $('#net_amt'+disc_id).val(net_amt);
        $('#disc'+disc_id).css('text-align','right');
        $('#disc'+disc_id).css('padding','0 1px 0 0');
        var previous_nets=sessionStorage.getItem('previous_net');
        // console.log(previous_nets);
        if(previous_nets == ""){
            previous_net=0;
        }else{
            previous_net = previous_nets.replaceAll(',','');
        }
        var n_total=$('#n_total').text();
        if(n_total == '' || n_total == '0' || n_total=='0.00'){
            minuss_n=0;
        }else{
            minus_t_n = n_total.replaceAll(',','');
            minuss_n= parseFloat(minus_t_n) - parseFloat(previous_net);
            // console.log(minuss_n);
        }
        var amount_net=$('#net_amt'+disc_id).val();
        if(amount_net == '' || amount_net == '0' || amount_net=='0.00'){
            net_rc=0;
        }else{
            net_rc = amount_net.replaceAll(',','');
        }
        var net=new Intl.NumberFormat(
        'en-US', { style: 'currency', 
            currency: 'USD',
        currencyDisplay: 'narrowSymbol'}).format(net_rc);
        var net_amt=net.replace(/[$]/g,'');
        var fnf_net=parseFloat(minuss_n) +parseFloat(net_rc);
        var total=new Intl.NumberFormat(
        'en-US', { style: 'currency', 
        currency: 'USD',
        currencyDisplay: 'narrowSymbol'}).format(fnf_net);
        var total=total.replace(/[$]/g,'');
        // console.log(total);
        $('#n_total').html(total);
    });
    $("#example1").on('focus','.frt',function(){
        var button_id = $(this).attr("id");
        if(button_id =='frt'){
        var p_frt_id='';
        }else{
        var p_amountid = button_id.split("t");
        var p_frt_id=p_amountid[1];
        }
        var previous_net= $('#net_amt'+p_frt_id).val();
        sessionStorage.setItem("previous_net", previous_net);
    });
    $("#example1").on('change','.frt',function(){
        var button_id = $(this).attr("id");
        if(button_id =='frt'){
        var frt_id='';
        }else{
        var frt_ids = button_id.split("t");
        var frt_id=frt_ids[1];
        }
        var frt_m_e=$('#frt'+frt_id).val();
        if(frt_m_e =='' || isNaN(frt_m_e)){
            frt_m_e=0;
        }
        // console.log(frt_m_e);
        var frt_m_e_fnf=new Intl.NumberFormat(
            'en-US', { style: 'currency', 
            currency: 'USD',
            currencyDisplay: 'narrowSymbol'}).format(frt_m_e);
        frt_m_e_fnf=frt_m_e_fnf.replace(/[$]/g,'');
        $('#frt'+frt_id).val(frt_m_e_fnf);
        var qty=$('#quantity'+frt_id).val();
        if(qty=='' || qty=='0' || qty=='0.00'){
            qty=0;
        }
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
        $('#frt_e'+frt_id).val(frt_amt);

        var rate=$('#rate'+frt_id).val();
        if(rate == '' || rate=='0' || rate=='0.00'){
            rate==0;
        }else{
            rate = rate.replaceAll(',','');
        }
        var excl=parseFloat(rate) - parseFloat(frt_m_e);
        console.log(excl);
        var excl_m_fnf=new Intl.NumberFormat(
        'en-US', { style: 'currency', 
            currency: 'USD',
        currencyDisplay: 'narrowSymbol'}).format(excl);
        excl_m_fnf=excl_m_fnf.replace(/[$]/g,'');
        $('#frt'+frt_id).val(frt_m_e_fnf);
        $('#frt'+frt_id).css('text-align','right');
        $('#frt'+frt_id).css('padding','0 1px 0 0');
        if(excl_m_fnf == '' || isNaN(excl_m_fnf)){
            excl_m_fnf=='';
        }
        console.log(excl_m_fnf);
        $('#excl'+frt_id).val(excl_m_fnf);
        $('#excl'+frt_id).css('text-align','right');
        $('#excl'+frt_id).css('padding','0 1px 0 0');
        var amount=$('#net_amt'+frt_id).val();
        if(amount=='' || amount=='0' || amount=='0.00'){
            excl_amount=0;
        }else{
            excl_amount = amount.replaceAll(',','');
        }
        
        var excl=parseFloat(excl_amount) - parseFloat(frt_amt);
        var excl_fnf=new Intl.NumberFormat(
        'en-US', { style: 'currency', 
            currency: 'USD',
        currencyDisplay: 'narrowSymbol'}).format(excl);
        excl_fnf=excl_fnf.replace(/[$]/g,'');
        $('#excl_e'+frt_id).val(excl_fnf);
        $('#net_amt'+frt_id).val(excl_fnf);
                var previous_nets=sessionStorage.getItem('previous_net');
                // console.log(previous_nets);
                if(previous_nets == ""){
                    previous_net=0;
                }else{
                    previous_net = previous_nets.replaceAll(',','');
                }
                var n_total=$('#n_total').text();
                if(n_total == '' || n_total == '0' || n_total=='0.00'){
                    minuss_n=0;
                }else{
                    minus_t_n = n_total.replaceAll(',','');
                    minuss_n= parseFloat(minus_t_n) - parseFloat(previous_net);
                    // console.log(minuss_n);
                }
                var amount_net=$('#net_amt'+frt_id).val();
                if(amount_net == '' || amount_net == '0' || amount_net=='0.00'){
                    net_rc=0;
                }else{
                    net_rc = amount_net.replaceAll(',','');
                }
                var net=new Intl.NumberFormat(
                'en-US', { style: 'currency', 
                    currency: 'USD',
                currencyDisplay: 'narrowSymbol'}).format(net_rc);
                var net_amt=net.replace(/[$]/g,'');
                var fnf_net=parseFloat(minuss_n) +parseFloat(net_rc);
                var total=new Intl.NumberFormat(
                'en-US', { style: 'currency', 
                currency: 'USD',
                currencyDisplay: 'narrowSymbol'}).format(fnf_net);
                var total=total.replace(/[$]/g,'');
                // console.log(total);
                $('#n_total').html(total);
    });
});
$('#example1').ready(function(){
  var i = 0;
  var total_amount = 0;
  $('.add').click(function(){
    if(confirm("Are you sure you want to add this row?")){  
      var company_code=$('#company_code').val();
      i++;
      var acc_desc = $('#acc_desc').val();
      var detail = $("#detail").val();
      var loc = $("#loc").val();
      var quantitys = $("#quantity").val();
      quantity = quantitys.replaceAll(',','');
      var batch_no = $("#batch_no").text();
      var expiry_dt = $("#expiry_dt").val();
    //   var gd_no = $("#gd_no").val();
    //   var gd_dt = $("#gd_dt").val();
      var excl_total = $("#excl_t").text();
      var item_hscode = $("#item_hscode").val();
      var item_code_e = $("#item_code_e").val();
      var item_name = $("#item_name").val();
      var dc_qty = $("#dc_qty").val();
      var inv_qty = $("#inv_qty").val();
      var bal_qty = $("#bal_qty").val();
      var quantity = $("#quantity").val();
      var rate = $("#rate").val();
      var amounts = $("#amount").val();
      amount = amounts.replaceAll(',','');
      var disc = $("#disc").val();
      var disc_amount= $("#disc_e").val();
      var frt = $("#frt").val();
      var frt_amount = $("#frt_e").val();
      var excl = $("#excl").val();
      var excl_amount = $("#excl_e").val();
      var stax = $("#stax_amt").val();
      var stax_amount = $("#stax_amt_e").val();
      var add = $("#add").val();
      var add_amount = $("#add_amt_e").val();
      var net_amt = $("#net_amt").val();
      var loc = $("#loc").val();
      var batch_no = $("#batch_no").val();
      var expiry_dt = $("#expiry_dt").val();
      if(acc_desc == null){
          $('#msg').text("Account can't be the null.");
      }else if(quantity == ""){
          $('#msg').text("Quantity can't be the null.");
      }else if(parseInt(quantity) > parseInt(dc_qty)){
          $('#msg').text("Only "+dc_qty+" quantity are available");
      }else if(rate == "" || rate ==''){
          $('#msg').text("Rate can't be the null.");
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
          $("#rate").val('');
          $("#extra").attr("data-disc","0");
          $("#extra").attr("data-frt","0");
          $("#extra").attr("data-excl","0");
          $("#extra").attr("data-disc-final","0");
          $("#extra").attr("data-frt-final","0");
          $("#extra").attr("data-excl-final","0");
          $("#dc_qty").val('');
          $("#inv_qty").val('');
          $("#bal_qty").val('');
          $("#disc").val('');
          $("#disc_e").val('');
          $("#frt").val('');
          $("#frt_e").val('');
          $("#excl").val('');
          $("#excl_e").val('');
          $("#stax_amt").val('');
          $("#stax_amt_e").val('');
          $("#add").val('');
          $("#add_amt_e").val('');
          $("#net_amt").val('');
          $("#loc").val('');
          $("#batch_no").val('');
          $("#expiry_dt").val('');
          $('#d_items tr:last').before('<tr id="tr'+i+'"><td><select name="acc_desc[]" id = "acc_desc'+i+'" class=" js-example-basic-single acc_desc" ></td><td><textarea rows="1" style="width:179px !important;font-size:12px !important" name="detail[]" id = "detail'+i+'" class=" detail" readonly></textarea></td><td><input style="text-align:right; padding:0 1px 0 0;width:80px !important;background-color:#ccd4e1;font-size:12px !important" type="text" name="dc_qty[]" id = "dc_qty'+i+'" class=" dc_qty"></td><td><input  style="text-align:right; padding:0 1px 0 0;width:80px !important;background-color:#ccd4e1;font-size:12px !important" type="text" name="inv_qty[]" id = "inv_qty'+i+'" class=" inv_qty"></td><td><input  style="text-align:right; padding:0 1px 0 0;width:80px !important;background-color:#ccd4e1;font-size:12px !important" type="text" name="bal_qty[]" id = "bal_qty'+i+'" class=" bal_qty"></td><td><input  style="text-align:right; padding:0 1px 0 0;width:80px !important;font-size:12px !important" type="text" name="quantity[]" id = "quantity'+i+'" class=" quantity"></td><td><input  style="text-align:right; padding:0 1px 0 0;width:100px !important;font-size:12px !important" type="text" name="rate[]" id = "rate'+i+'"  class=" rate"></td><td><input  style="text-align:right; padding:0 1px 0 0;width:100px !important;background-color:#b7edea;font-size:12px !important" type="text" name="amount[]" id = "amount'+i+'" class=" amount" readonly></td><td><input  style="text-align:right; padding:0 1px 0 0;width:80px !important;font-size:12px !important" type="text" name="disc[]" id = "disc'+i+'" class=" disc" readonly></td><td><input style="text-align:right; padding:0 1px 0 0;width:100px !important;background-color:#b7edea;font-size:12px !important;" type="text" name="disc_e[]" id = "disc_e'+i+'" class=" disc_e" readonly></td><td><input style="text-align:right; padding:0 1px 0 0;width:80px !important;font-size:12px !important" type="text" name="frt[]" id = "frt'+i+'" class=" frt" readonly></td><td><input style="text-align:right; padding:0 1px 0 0;width:100px !important;background-color:#b7edea;font-size:12px !important" type="text" name="frt_e[]" id = "frt_e'+i+'" class=" frt_e" readonly></td><td><input style="text-align:right; padding:0 1px 0 0:width:80px !important;font-size:12px" type="text" name="excl[]" id = "excl'+i+'" class=" excl" readonly></td><td><input style="text-align:right; padding:0 1px 0 0;width:100px !important;background-color:#b7edea;font-size:12px !important" type="text" name="excl_e[]" id = "excl_e'+i+'" class=" excl_e" readonly></td><td><input style="text-align:right; padding:0 1px 0 0;width:80px !important;font-size:12px !important" type="text" name="stax_amt[]" id = "stax_amt'+i+'" class=" stax_amt" readonly></td><td><input style="text-align:right; padding:0 1px 0 0;width:100px !important;background-color:#b7edea;font-size:12px !important;" type="text" name="stax_amt_e[]" id = "stax_amt_e'+i+'" class=" stax_amt_e" readonly></td><td><input style="text-align:right; padding:0 1px 0 0;width:80px !important;font-size:12px !important" type="text" name="add_amt[]" id = "add_amt'+i+'" class=" add_amt" readonly></td><td><input style="text-align:right; padding:0 1px 0 0;width:100px !important;background-color:#b7edea;font-size:12px !important" type="text" name="add_amt_e[]" id = "add_amt_e'+i+'" class=" add_amt_e" readonly></td><td><input style="text-align:right; padding:0 1px 0 0;width:110px !important;background-color:#b7edea;font-size:12px !important" type="text" name="net_amt[]" id = "net_amt'+i+'" class=" net_amt" readonly></td><td><input style="background-color:#ccd4e1;font-size:12px !important" name="loc[]" id = "loc'+i+'" class="form-control loc" ></td><td><textarea style="width:158px !important;background-color:#ccd4e1;font-size:12px !important" rows="1" type="text" name="batch_no[]" id = "batch_no'+i+'"  class=" batch_no"></textarea></td><td><input style="width:91px !important;background-color:#ccd4e1;font-size:12px !important" type="date" name="expiry_dt[]" id = "expiry_dt'+i+'" class=" expiry_dt" readonly></td><td><button type = "button" id="'+i+'" class="btn btn-sm btn-danger remove"><b>X<b></button></td></tr>');          
          //   $('#d_items tr:last').before('<tr id="tr'+i+'"><td><select name="acc_desc[]" id = "acc_desc'+i+'" class="form-control js-example-basic-single acc_desc" ></td><td><input name="detail[]" id = "detail'+i+'" class="form-control form-control-sm detail" readonly></td><td ><select style="font-size:12px;" name="type[]" id = "type'+i+'" class="form-control form-control-sm type"><option val="" readonly="readonly" selected></option><option val="N">N</option><option val="F">F</option><option val="S">S</option><option val="T">T</option></select></td><td><input type="number" name="quantity[]" id = "quantity'+i+'" class="form-control form-control-sm quantity"></td><td><input type="text" name="rate[]" id = "rate'+i+'"  class="form-control form-control-sm rate"></td><td><input type="text" name="amount[]" id = "amount'+i+'" onchange="total()" class="form-control form-control-sm total" readonly></td><td><button type = "button" id="'+i+'" class="btn btn-sm btn-danger remove"><b>X<b></button></td></tr>');          
          // Item code dropdown
          $.ajax({
              url: 'api/sales_module/transaction_files/invoice_api.php',
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
              url: 'api/sales_module/transaction_files/invoice_api.php',
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
          });
        

              $('#detail'+i+'').val(detail);
              $('#dc_qty'+i+'').val(dc_qty);
              $('#inv_qty'+i+'').val(inv_qty);
              $('#bal_qty'+i+'').val(bal_qty);
              $('#quantity'+i+'').val(quantitys);
              $('#rate'+i+'').val(rate);
              $('#amount'+i+'').val(amounts);
              $('#disc'+i+'').val(disc);
              $('#disc_e'+i+'').val(disc_amount);
              $('#frt'+i+'').val(frt);
              $('#frt_e'+i+'').val(frt_amount);
              $('#excl'+i+'').val(excl);
              $('#excl_e'+i+'').val(excl_amount);
              $('#stax_amt'+i+'').val(stax);
              $('#stax_amt_e'+i+'').val(stax_amount);
              $('#add_amt'+i+'').val(add);
              $('#add_amt_e'+i+'').val(add_amount);
              $('#net_amt'+i+'').val(net_amt);
              $('#loc'+i+'').val(loc);
            //   $('#gd_no'+i+'').val(gd_no);expiry_dt
            //   $('#gd_dt'+i+'').val(gd_dt);
              $('#expiry_dt'+i+'').val(expiry_dt);
              $('#batch_no'+i+'').val(batch_no);
            //   $('#item_hscode'+i+'').val(item_hscode);
              $('#quantity'+i+'').css('text-align','right');
              $('#quantity'+i+'').css('padding','0 1px 0 0');
              $('#rate'+i+'').css('text-align','right');
              $('#rate'+i+'').css('padding','0 13px 0 0');
              $('#amount'+i+'').css('text-align','right');
              $('#amount'+i+'').css('padding','0 13px 0 0');      
      }  
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
            if(quantity == '' || quantity=='0.00'){
                e.preventDefault();
                var formData = new FormData(this); 
                var total=$('#total').text();
                formData.append('debit',total);
                var company_code=$('#company_code').val();
                formData.append('company_code',company_code);
                formData.append('action','insert');
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
                                $.get('sales_module/transaction_files/add_delivery_challan.php',function(data,status){
                                
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
    $.get('sales_module/transaction_files/sales_order_list.php', function(data,status){
        $("#content").html(data);
    });
});
$("#add_invoice_breadcrumb").on("click", function () {
    $.get('sales_module/transaction_files/add_invoice.php', function(data,status){
        $("#content").html(data);
    });
});
</script>
<?php include '../../includes/loader.php'?>