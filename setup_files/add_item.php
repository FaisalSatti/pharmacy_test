<?php
session_start();
?>
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header"style="margin-top:-10px">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1  style="font-size:18px;">Item Information</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="setup_breadcrumb">Setup</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="party_setup_breadcrumb">Item List</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="add_item_breadcrumb">Add Item</button></li>
              </ol>
            </div>   
          </div>
        </div><!-- /.container-fluid -->
      </section>

     
      <!-- Main content -->
      <section class="content" style="margin-top:-25px;">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px">
                        <div class="container-fluid" style="background-color: ssssssssss;">
                            <form method="post" id="item_form" style="background-color: ssssssssss;">
                                <?php include '../display_message/display_message.php'?>
                                <span id="msg text-center" style="color: red;font-size: 17px;"></span>
                                <!-- <input type="hidden" name="form_no" id="form_no" value=""> -->
                                <div class="row" style="padding: 20px 0px 0px 0px; border:4px solid #1e293b; padding-top:8px; box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px; margin-top: -15px;padding-top: 15px; margin-bottom: -15px;">

                                <style>
body{
zoom: 95%;
}
::-webkit-scrollbar {
display: none;
}
  /* body{
    zoom:80% */
    /* overflow:hidden; */
  /* } */
.form-group{
margin-top:-10px;
}
select{
width:70% !important;
}
input:focus,select:focus,textarea:focus,.select2-selection:focus, .add:focus, #submit:focus, .remove:focus{
-moz-box-shadow: 0 0 8px rgba(82,168,236,.6);
box-shadow: 0 0 8px orangered !important;
border: 3px solid black!important;}
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
/* -webkit-text-stroke: 0.3vw #f7f7fe; */
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
0%,
10%,
100% {
width: 0;
}

70%,
90% {
width: 100%;
}
}
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
-webkit-appearance: none !important;
margin: 0!important;
}
/* Firefox */
input[type=number] {
-moz-appearance: textfield !important;
}

.content-table {
border-collapse: collapse;
margin: 25px 0;
font-size: 0.9em;
min-width: 400px;
border-radius: 5px 5px 0 0;
overflow: hidden;
box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.content-table thead tr {
background-color: rgb(75, 84, 92);
color: #ffffff;
text-align: left;
font-weight: bold;
padding: 4px 15px;
}

.content-table th,
.content-table td {
padding: 12px 15px;
}

.content-table tbody tr {
border-bottom: 1px solid #dddddd;
}

.content-table tbody tr:nth-of-type(even) {
background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
/* border-bottom: 2px solid #009879; */
}

.content-table tbody tr.active-row {
font-weight: bold;
color: #009879;
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
}
td {
    padding: 8px 15px !important;
}
</style>
                                
                                            <div class="col-sm-1 form-group">
                                              <label>Company:</label> 
                                            </div>
                                            <div class="col-sm-2 form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                                    </div>
                                                    <input maxlength="30" type="text" name="company_code" style="background-color: #b7edea;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" id="company_code" class="form-control form-control-sm" placeholder="Company Code" readonly >

                                                    <!-- <select class="form-control form-control-sm  js-example-basic-single" id="company_code" name="company_code">
                                                    </select>                                    -->
                                                </div>
                                            </div>
                                            <div class="col-sm-3 form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-user"></i></span>
                                                    </div>
                                                    <input maxlength="30" type="text" name="company_name" id="company_name" style="background-color: #ccd4e1;font-weight:bold;" class="form-control form-control-sm" placeholder="Company Name" readonly >
                                                </div>
                                            </div>
                                            <div class="col-sm-1 form-group">
                                              <label>Division:</label> 
                                            </div>
                                            <div class="col-sm-2 form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                                    </div>
                                                    <input maxlength="30" type="text" name="division" id="division" style="background-color: #b7edea;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" class="form-control form-control-sm" placeholder="Division Code" readonly >
                                                    <!-- <select class="form-control form-control-sm  js-example-basic-single" id="division" name="division">
                                                    </select>                                    -->
                                                </div>
                                            </div>
                                            <div class="col-sm-3 form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-user"></i></span>
                                                    </div>
                                                    <input maxlength="30" type="text" name="division_name" id="division_name" style="background-color: #ccd4e1;font-weight:bold;" class="form-control form-control-sm" placeholder="Division Name" readonly >
                                                </div>
                                            </div>
                                            <div class="col-sm-1 form-group">
                                              <label>Product:</label> 
                                            </div>
                                            <div class="col-sm-2 form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-sort-numeric-asc"></i></span>
                                                    </div>
                                                    <input maxlength="30" type="text" name="product_code" id="product_code" style="background-color: #b7edea;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" class="form-control form-control-sm" placeholder="Product Code" readonly >
                                                    </select>                                   
                                                </div>
                                            </div>
                                            <div class="col-sm-3 form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-user"></i></span>
                                                    </div>
                                                    <input maxlength="30" type="text" name="product_name" id="product_name" style="background-color: #ccd4e1;font-weight:bold;" class="form-control form-control-sm" placeholder="Product Name" readonly >
                                                </div>
                                            </div>
                                            <div class="col-sm-1 form-group">
                                              <label>Generic:</label> 
                                            </div>
                                            <div class="col-sm-2 form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-sort-numeric-asc"></i></span>
                                                    </div>
                                                    <input maxlength="30" type="text" name="generic_code" id="generic_code" style="background-color: #b7edea;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" class="form-control form-control-sm" placeholder="Generic Code" readonly >
                                                    </select>                                   
                                                </div>
                                            </div>
                                            <div class="col-sm-3 form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-user"></i></span>
                                                    </div>
                                                    <input maxlength="30" type="text" name="generic_name" id="generic_name" style="background-color: #ccd4e1;font-weight:bold;" class="form-control form-control-sm" placeholder="Generic Name" readonly >
                                                </div>
                                            </div>
                                            <div class="col-sm-1 form-group">
                                              <label>UM:</label> 
                                            </div>
                                            <div class="col-sm-2 form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-sort-numeric-asc"></i></span>
                                                    </div>
                                                    <input maxlength="30" type="text" name="um_code" id="um_code" class="form-control form-control-sm" style="background-color: #b7edea;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" placeholder="UM Code" readonly >
                                                    </select>                                   
                                                </div>
                                            </div>
                                            <div class="col-sm-3 form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-user"></i></span>
                                                    </div>
                                                    <input maxlength="30" type="text" name="um_name" id="um_name" class="form-control form-control-sm" style="background-color: #b7edea;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" placeholder="U/M Name" readonly >
                                                </div>
                                            </div>
                                            <div class="col-sm-1 form-group">
                                              <label>Pur GL:</label> 
                                            </div>
                                            <div class="col-sm-2 form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-sort-numeric-asc"></i></span>
                                                    </div>
                                                    <input maxlength="30" type="text" name="pur_gl_code" id="pur_gl_code" style="background-color: #b7edea;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" class="form-control form-control-sm" placeholder="Pur GL Code" readonly >
                                                    </select>                                   
                                                </div>
                                            </div>
                                            <div class="col-sm-3 form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-user"></i></span>
                                                    </div>
                                                    <input maxlength="30" type="text" name="pur_gl_name" id="pur_gl_name" style="background-color: #ccd4e1;font-weight:bold;" class="form-control form-control-sm" placeholder="Purchase GL Name" readonly >
                                                </div>
                                            </div>
                                            <div class="col-sm-1 form-group">
                                              <label>Sale GL:</label> 
                                            </div>
                                            <div class="col-sm-2 form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-sort-numeric-asc"></i></span>
                                                    </div>
                                                    <input maxlength="30" type="text" name="sale_gl_code" id="sale_gl_code" style="background-color: #b7edea;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" class="form-control form-control-sm" placeholder="Sale GL Code" readonly >
                                                    </select>                                   
                                                </div>
                                            </div>
                                            <div class="col-sm-3 form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-user"></i></span>
                                                    </div>
                                                    <input maxlength="30" type="text" name="sale_gl_name" id="sale_gl_name" style="background-color: #ccd4e1;font-weight:bold;" class="form-control form-control-sm" placeholder="Sale GL Name" readonly tabindex="-1" >
                                                </div>
                                            </div>
                                        
                                              <div class="col-sm-3 form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                                    </div> 
                                                    <input maxlength="3" min="1" max="999" title="item_code" type="number" name="item_code" style="background-color: #ccd4e1;font-weight:bold;" id="item_code" class="form-control form-control-sm" placeholder="Item Code" readonly tabindex="-1">
                                                    <p  id="msg1" style="display:none;padding-top:80px;color: red;font-size: 13px;"></p>
                                                </div>
                                              </div>
                                            <div class="col-sm-3 form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-user"></i></span>
                                                    </div>
                                                    <input maxlength="30" type="text" name="item_name" title="item name" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" id="item_name"  class="form-control form-control-sm" placeholder="Item Name"  >
                                                </div>
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                                    </div>
                                                    <input style="text-align:center;background-color: #ccd4e1;font-weight:bold;" pattern="[0-9 ,-]{1,}" title="item codes"  tabindex="-1" maxlength="30" type="text" name="item_codes" id="item_codes" class="form-control form-control-sm" placeholder="Item Codes" readonly > 
                                                </div>
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                                    </div>
                                                    <input style="text-align:right;background-color: #ccd4e1;font-weight:bold;" pattern="[0-9]{1,}"  tabindex="-1" maxlength="30" type="text" title="item purchase code" name="item_pur_code" id="item_pur_code" class="form-control form-control-sm" placeholder="Item Purchase Code" readonly> 
                                                </div>
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                                    </div>
                                                    <input style="text-align:right;background-color: #ccd4e1;font-weight:bold;" pattern="[0-9]{1,}"  tabindex="-1" maxlength="30" title="item sale code" type="text" name="item_sale_code" id="item_sale_code" class="form-control form-control-sm" placeholder="Item Sale Code" readonly> 
                                                </div>
                                            </div>
                                            <div class="col-sm-3 form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-user"></i></span>
                                                    </div>
                                                    <input maxlength="30" type="text" name="sale_name" id="sale_name" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" title="sale name" class="form-control form-control-sm" placeholder="Sale Name"  >
                                                </div>
                                            </div>
                                            
                                          
                                            <div class="col-sm-3 form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-user"></i></span>
                                                    </div>
                                                    <input maxlength="30" title="sale name 2" type="text" name="sale_name2" id="sale_name2" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" class="form-control form-control-sm" placeholder="Sale Name 2"  >
                                                </div>
                                            </div>
                                            <div class="col-sm-3 form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                                    </div>
                                                    <textarea rows="1" title="title detail" name="item_detail" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" id="item_detail" class="form-control form-control-sm" placeholder="Item Detail" ></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-2 form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-list-alt"></i></span>
                                                    </div>
                                                    <select title="purchase mode" name="purchase_mode" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" class="form-control form-control-sm" id="purchase_mode" >
                                                        <option value="" disabled>Select Purchase Mode</option>
                                                        <option value="IMPORT">IMPORT</option>
                                                        <option value="LOCAL">LOCAL</option>
                                                    </select>                                
                                                </div>
                                            </div>
                                      



                                            <div class="col-sm-2 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                            </div>
                                            <select name="item_category" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" class="form-control form-control-sm" id="item_category" >
                                                <option value="" disabled>Select Item Category</option>
                                                <option value="TARGET">TARGET</option>
                                                <option value="NON_TARGET">NON_TARGET</option>
                                            </select>                                
                                        </div>
                                    </div>
                                    <div class="col-sm-2 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                            </div>
                                            <input maxlength="30" type="number" name="target_qty" id="target_qty" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" class="form-control form-control-sm" placeholder="Target Quantity" >
                                        </div>
                                    </div>
                                        
                                    
                          
                                    <div class="col-sm-2 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <input maxlength="30" type="text" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" name="packing" id="packing" class="form-control form-control-sm" placeholder="Packing"  >
                                        </div>
                                    </div>
                                    <div class="col-sm-2 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <input maxlength="30" type="text" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" name="brand" id="brand" class="form-control form-control-sm" placeholder="Brand"  >
                                        </div>
                                    </div>
                                    <div class="col-sm-2 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <input maxlength="30" type="text" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" name="origin" id="origin" class="form-control form-control-sm" placeholder="Origin"  >
                                        </div>
                                    </div>
                                    <div class="col-sm-2 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <input maxlength="30" type="text" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" name="hs_code" id="hs_code" class="form-control form-control-sm" placeholder="HS Code"  >
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                            </div>
                                            <input style="text-align:right;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" pattern="[a-zA-Z0-9 ,._-]{1,}"  maxlength="30" type="text" name="trade_price" id="trade_price" class="form-control form-control-sm" placeholder="Trade Price 1" > 
                                        </div>
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                            </div>
                                            <input style="text-align:right;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="trade_price2" id="trade_price2" class="form-control form-control-sm" placeholder="Trade Price 2" > 
                                        </div>
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                            </div>
                                            <input style="text-align:right;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="discount_rate" id="discount_rate" class="form-control form-control-sm" placeholder="Discount Rate" > 
                                        </div>
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                            </div>
                                            <input style="text-align:right;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="gst_rate" id="gst_rate" class="form-control form-control-sm" placeholder="GST Rate" > 
                                        </div>
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                            </div>
                                            <input style="text-align:right;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="add_rate" id="add_rate" class="form-control form-control-sm" placeholder="Add Rate" > 
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                            </div>
                                            <input maxlength="30" type="number" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" name="min_level" id="min_level" class="form-control form-control-sm" placeholder="Min Level" >
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-3 form-group text-center">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                            </div>
                                            <input maxlength="30" type="number" name="max_level" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" id="max_level" class="form-control form-control-sm" placeholder="Max Level" >
                                        </div>
                                    </div>
                                  </div>
                                  <br>
                                  <div class="row" style="padding: 20px 0px 0px 0px; border:4px solid #1e293b; padding-top:8px; box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px; ">
                                    <div class="col-sm-2 form-group"></div>
                                    <div class="col-sm-9 form-group" style="margin-top:-30px; margin-bottom: -20px; ">
                                        <table id="example1" class="content-table table-responsive-lg">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Quantity</th>
                                                    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Rate</th>
                                                    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Value</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr id="main_tr active-row">
                                                    <td>Opening</td>
                                                    <td ><input  style="text-align:right; padding:0 13px 0 0;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" type="number"  name="" id="quantity1" class="form-control form-control-sm quantity"></td>
                                                    <td ><input  style="text-align:right; padding:0 13px 0 0;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px"  pattern="[0-9 ,._-]{1,}" type="text"  name="" id = "rate1" class="form-control form-control-sm rate"></td>
                                                    <td ><input  style="text-align:right; padding:0 13px 0 0; background-color: #ccd4e1;"  pattern="[0-9 ,._-]{1,}" type="text" name="" id = "amount1" class="form-control form-control-sm amount" tabindex="-1" readonly></td>
                                                </tr>
                                                <tr id="main_tr active-row">
                                                    <td>Purchase</td>
                                                    <td ><input  style="text-align:right; padding:0 13px 0 0;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" type="number"  name="" id="quantity2" class="form-control form-control-sm quantity"></td>
                                                    <td ><input  style="text-align:right; padding:0 13px 0 0;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px"  pattern="[0-9 ,._-]{1,}" type="text"  name="" id = "rate2" class="form-control form-control-sm rate"></td>
                                                    <td ><input  style="text-align:right; padding:0 13px 0 0; background-color: #ccd4e1;"  pattern="[0-9 ,._-]{1,}" type="text" name="" id = "amount2" class="form-control form-control-sm amount" tabindex="-1" readonly></td>
                                                </tr>
                                                <tr id="main_tr active-row">
                                                    <td>Closing</td>
                                                    <td ><input  style="text-align:right; padding:0 13px 0 0;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" type="number"  name="" id="quantity3" class="form-control form-control-sm quantity"></td>
                                                    <td ><input  style="text-align:right; padding:0 13px 0 0;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px"  pattern="[0-9 ,._-]{1,}" type="text"  name="" id = "rate3" class="form-control form-control-sm rate"></td>
                                                    <td ><input  style="text-align:right; padding:0 13px 0 0; background-color: #ccd4e1;"  pattern="[0-9 ,._-]{1,}" type="text" name="" id = "amount3" class="form-control form-control-sm amount" tabindex="-1" readonly></td>
                                                </tr>
                                                <tr id="main_tr active-row">
                                                    <td>Last Pur Rate</td>
                                                    <td ><input  style="text-align:right; padding:0 13px 0 0;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" type="text"  pattern="[0-9 ,._-]{1,}"  name="" id="last_pur_rate" class="form-control form-control-sm last_pur_rate"></td>
                                                    <td style="text-align:right" >Cost Sales</td>
                                                    <td ><input  style="text-align:right; padding:0 13px 0 0; background-color: #ccd4e1;"  pattern="[0-9 ,._-]{1,}" type="text" name="" id = "total" class="form-control form-control-sm total" tabindex="-1" readonly></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- <div class="col-sm-2 form-group"></div> -->
                                </div>
                                
                                <div class="text-center" style="margin-top: 10px" >
                                  <button type="submit" class="btn btn-primary btn-sm col-md-12" id="add_all">Submit <br></button>
                                   
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
    <div class="modal-dialog modal-lg" role="document">
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
<!-- product  form -->
<div class="modal fade" id="ProductFormModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Product</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
              <table class="table" id="product_table">
                <thead>
                  <tr>
                    <th>Sno</th>
                    <th>Product Name</th>
                    <th>Product Code</th>
                  </tr>
                </thead>
              </table>
            </div>
        </div>
    </div>
</div>
<!-- GENERIC  form -->
<div class="modal fade" id="GenericFormModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Generic</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
              <table class="table" id="generic_table">
                <thead>
                  <tr>
                    <th>Sno</th>
                    <th>Generic Name</th>
                    <th>Generic Code</th>
                  </tr>
                </thead>
              </table>
            </div>
        </div>
    </div>
</div>
<!-- UM  form -->
<div class="modal fade" id="umFormModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select UM</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
              <table class="table" id="um_table">
                <thead>
                  <tr>
                    <th>Sno</th>
                    <th>UM Name</th>
                    <th>UM Code</th>
                  </tr>
                </thead>
              </table>
            </div>
        </div>
    </div>
</div>
<!-- Pur GL  form -->
<div class="modal fade" id="PurGLFormModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Purchase GL</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
              <table class="table" id="pur_gl_table">
                <thead>
                  <tr>
                    <th>Sno</th>
                    <th>Purchase GL Name</th>
                    <th>Purchase GL Code</th>
                  </tr>
                </thead>
              </table>
            </div>
        </div>
    </div>
</div>
<!-- Sale GL  form -->
<div class="modal fade" id="SaleGLFormModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Sale GL</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
              <table class="table" id="sale_gl_table">
                <thead>
                  <tr>
                    <th>Sno</th>
                    <th>Sale GL Name</th>
                    <th>Sale GL Code</th>
                  </tr>
                </thead>
              </table>
            </div>
        </div>
    </div>
</div>
<!-- <div class="modal-backdrop fade show" id="backdrop" style="display: none;"></div> -->

<?php

include '../includes/security.php';
?>

<script>
  //select company code
$('#item_form').on('focus','#company_code',function(){
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
            console.log(response);
        table.clear().draw();
        // append data in datatable
        var sno='0';
        for (var i = 0; i < response.length; i++) {
            sno++;
            table.row.add([sno,response[i].co_name,response[i].co_code]);
        }
        table.draw();
            // $('#company_table .tr').html('');
            // $.each(response, function(key, value){
            //   $('#company_table').append('<tr class="hover-item tr" id='+key+' style="cursor:pointer"><td>'+value["co_name"]+'</td><td>'+value["co_code"]+'</td></tr>'); 
            // });
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });  
  $('#CompanyFormModel').modal('show');
});
  //get value of company in fields
$('#company_table').on('click','.even',function(){
  var company_name=$(this).closest('tr').children('td:nth-child(2)').text();
  var company_code=$(this).closest('tr').children('td:nth-child(3)').text();
  console.log(company_code);
  $('#company_code').val(company_code);
  $('#company_name').val(company_name);
  $('#CompanyFormModel').modal('hide');
  $('#division').focus();
  // $('#CompanyFormModel').modal('show');
});
$('#company_table').on('click','.odd',function(){
  var company_name=$(this).closest('tr').children('td:nth-child(2)').text();
  var company_code=$(this).closest('tr').children('td:nth-child(3)').text();
  console.log(company_code);
  $('#company_code').val(company_code);
  $('#company_name').val(company_name);
  $('#CompanyFormModel').modal('hide');
  $('#division').focus()
  // $('#CompanyFormModel').modal('show');
});

//select division code
$('#item_form').on('focus','#division',function(){
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
            url: 'api/setup/party_api.php',
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
                  table.row.add([sno,data[i].div_name,data[i].div_code]);
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
        console.log(company_code);
        // console.log(division_code);
        $("#msg1").html('');
        $.ajax({
          url: 'api/setup/item_api.php',
          type: 'POST',
          data: {action:'check_item_code',company_code:company_code,division_code:division_code},
          success: function (response) {
            $("#ajax-loader").hide();
            console.log(response);
            // if(response.status == "0"){
              $("#item_code").val(response);
            //   $("#msg1").css('display','');
            //   $("#msg1").text(response.message);
            //   $("#item_code").attr('placeholder',item_code);
            //   $("#item_code").val("");
            // }else{
            //   $("#item_code").css("background-color", "");
            //   $("#msg1").text("");
            // }
          var item_code = response;
          if(item_code != null || division_code != null || company_code != null){
              var item_con_code=division_code+'-'+item_code;
              $('#item_codes').val(item_con_code);
              if(item_code.length== 3){
                  item_code=item_code;
              }else if(item_code.length== 2){
                  item_code='0'+item_code;
                  // console.log(item_code);
              }else{
                  item_code='00'+item_code;
              }
              if(division_code.length == 3){
                  division_code='0'+division_code;
              }else if(division_code.length == 2){
                  division_code='00'+division_code;
              }else if(division_code.length == 1){
                  division_code='000'+division_code;
              }
              var purchase_account='888'+division_code+item_code;
              $('#item_pur_code').val(purchase_account);
              var sale_account='858'+division_code+item_code;
              $('#item_sale_code').val(sale_account);
          }
        
          },
          error: function(e) 
          {
            console.log(e);
            alert("Contact IT Department");
          }   
        
        });
        
  $('#DivisionFormModel').modal('hide');
  $('#product_code').focus();
  // $('#CompanyFormModel').modal('show');
});
$('#division_table').on('click','.even',function(){
  var division_name=$(this).closest('tr').children('td:nth-child(2)').text();
  var division_code=$(this).closest('tr').children('td:nth-child(3)').text();
  $('#division').val(division_code);
  $('#division_name').val(division_name);var company_code=$("#company_code").val();
        console.log(company_code);
        // console.log(division_code);
        $("#msg1").html('');
        $.ajax({
          url: 'api/setup/item_api.php',
          type: 'POST',
          data: {action:'check_item_code',company_code:company_code,division_code:division_code},
          success: function (response) {
            $("#ajax-loader").hide();
            console.log(response);
            // if(response.status == "0"){
              $("#item_code").val(response);
            //   $("#msg1").css('display','');
            //   $("#msg1").text(response.message);
            //   $("#item_code").attr('placeholder',item_code);
            //   $("#item_code").val("");
            // }else{
            //   $("#item_code").css("background-color", "");
            //   $("#msg1").text("");
            // }
          var item_code = response;
          if(item_code != null || division_code != null || company_code != null){
              var item_con_code=division_code+'-'+item_code;
              $('#item_codes').val(item_con_code);
              if(item_code.length== 3){
                  item_code=item_code;
              }else if(item_code.length== 2){
                  item_code='0'+item_code;
                  // console.log(item_code);
              }else{
                  item_code='00'+item_code;
              }
              if(division_code.length == 3){
                  division_code='0'+division_code;
              }else if(division_code.length == 2){
                  division_code='00'+division_code;
              }else if(division_code.length == 1){
                  division_code='000'+division_code;
              }
              var purchase_account='888'+division_code+item_code;
              $('#item_pur_code').val(purchase_account);
              var sale_account='858'+division_code+item_code;
              $('#item_sale_code').val(sale_account);
          }
        
          },
          error: function(e) 
          {
            console.log(e);
            alert("Contact IT Department");
          }   
        
        }); 
  $('#DivisionFormModel').modal('hide');
  $('#product_code').focus();
  // $('#CompanyFormModel').modal('show');
});

//select product code
$('#item_form').on('focus','#product_code',function(){
    $('#product_table').dataTable().fnDestroy();
    table = $('#product_table').DataTable({
        dom: 'Bfrtip',
        orderCellsTop: true,
        fixedHeader: true,
        
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print',
        ]
    });
    // Setup - add a text input to each footer cell
    // $('#product_table thead tr').clone(true).appendTo( '#product_table thead' );
    $('#product_table thead tr:eq(1) th').each( function (i) {
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
    
    // product code dropdown
    $.ajax({
        url: 'api/setup/item_api.php',
        type: 'POST',
        data: {action: 'product_code'},
        dataType: "json",
        success: function(data){
          table.clear().draw();
          // append data in datatable
          var sno='0';
          for (var i = 0; i < data.length; i++) {
              sno++;
              table.row.add([sno,data[i].product_name,data[i].product_code]);
          }
          table.draw();
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
    $('#ProductFormModel').modal('show');
});
  //get value of division in fields
$('#product_table').on('click','.odd',function(){
  var product_name=$(this).closest('tr').children('td:nth-child(2)').text();
  var product_code=$(this).closest('tr').children('td:nth-child(3)').text();
  $('#product_code').val(product_code);
  $('#product_name').val(product_name);
  $('#ProductFormModel').modal('hide');
  $('#generic_code').focus();
  // $('#CompanyFormModel').modal('show');
});
$('#product_table').on('click','.even',function(){
  var product_name=$(this).closest('tr').children('td:nth-child(2)').text();
  var product_code=$(this).closest('tr').children('td:nth-child(3)').text();
  $('#product_code').val(product_code);
  $('#product_name').val(product_name); 
  $('#ProductFormModel').modal('hide');
  $('#generic_code').focus();
  // $('#CompanyFormModel').modal('show');
});


//select generic code
$('#item_form').on('focus','#generic_code',function(){
  // var company_code=$('#company_code').val();
      $('#generic_table').dataTable().fnDestroy();
      table = $('#generic_table').DataTable({
          dom: 'Bfrtip',
          orderCellsTop: true,
          fixedHeader: true,
          
          buttons: [
              'copy', 'csv', 'excel', 'pdf', 'print',
          ]
      });
      // Setup - add a text input to each footer cell
      // $('#generic_table thead tr').clone(true).appendTo( '#generic_table thead' );
      $('#generic_table thead tr:eq(1) th').each( function (i) {
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
            url: 'api/setup/item_api.php',
            type: 'POST',
            data: {action: 'generic_code'},
            dataType: "json",
            success: function(data){
              console.log(data);
              table.clear().draw();
              // append data in datatable
              var sno='0';
              for (var i = 0; i < data.length; i++) {
                  sno++;
                  table.row.add([sno,data[i].gen_name,data[i].gen_code]);
              }
              table.draw();
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        }); 
      $('#GenericFormModel').modal('show');
});

  //get value of generic in fields
$('#generic_table').on('click','.odd',function(){
  var generic_name=$(this).closest('tr').children('td:nth-child(2)').text();
  var generic_code=$(this).closest('tr').children('td:nth-child(3)').text();
  $('#generic_code').val(generic_code);
  $('#generic_name').val(generic_name);
  $('#GenericFormModel').modal('hide');
  $('#um_code').focus();
  // $('#CompanyFormModel').modal('show');
});
$('#generic_table').on('click','.even',function(){
  var generic_name=$(this).closest('tr').children('td:nth-child(2)').text();
  var generic_code=$(this).closest('tr').children('td:nth-child(3)').text();
  $('#generic_code').val(generic_code);
  $('#generic_name').val(generic_name); 
  $('#GenericFormModel').modal('hide');
  $('#um_code').focus();
  // $('#CompanyFormModel').modal('show');
});

//select um code
$('#item_form').on('focus','#um_code',function(){
  // var company_code=$('#company_code').val();
      $('#um_table').dataTable().fnDestroy();
      table = $('#um_table').DataTable({
          dom: 'Bfrtip',
          orderCellsTop: true,
          fixedHeader: true,
          
          buttons: [
              'copy', 'csv', 'excel', 'pdf', 'print',
          ]
      });
      // Setup - add a text input to each footer cell
      // $('#um_table thead tr').clone(true).appendTo( '#um_table thead' );
      $('#um_table thead tr:eq(1) th').each( function (i) {
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
            url: 'api/setup/item_api.php',
            type: 'POST',
            data: {action: 'um_code'},
            dataType: "json",
            success: function(data){
              console.log(data);
              table.clear().draw();
              // append data in datatable
              var sno='0';
              for (var i = 0; i < data.length; i++) {
                  sno++;
                  table.row.add([sno,data[i].unit_name,data[i].unit_code]);
              }
              table.draw();
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        }); 
      $('#umFormModel').modal('show');
});

  //get value of generic in fields
  $('#um_table').on('click','.odd',function(){
  var um_name=$(this).closest('tr').children('td:nth-child(2)').text();
  var um_code=$(this).closest('tr').children('td:nth-child(3)').text();
  $('#um_code').val(um_code);
  $('#um_name').val(um_name);
  $('#umFormModel').modal('hide');
  $('#pur_gl_code').focus();
  // $('#CompanyFormModel').modal('show');
});
$('#um_table').on('click','.even',function(){
  var um_name=$(this).closest('tr').children('td:nth-child(2)').text();
  var um_code=$(this).closest('tr').children('td:nth-child(3)').text();
  $('#um_code').val(um_code);
  $('#um_name').val(um_name); 
  $('#umFormModel').modal('hide');
  $('#pur_gl_code').focus();
  // $('#CompanyFormModel').modal('show');
});
//select purchase GL code
$('#item_form').on('focus','#pur_gl_code',function(){
  // var company_code=$('#company_code').val();
      $('#pur_gl_table').dataTable().fnDestroy();
      table = $('#pur_gl_table').DataTable({
          dom: 'Bfrtip',
          orderCellsTop: true,
          fixedHeader: true,
          
          buttons: [
              'copy', 'csv', 'excel', 'pdf', 'print',
          ]
      });
      // Setup - add a text input to each footer cell
      // $('#pur_gl_table thead tr').clone(true).appendTo( '#pur_gl_table thead' );
      $('#pur_gl_table thead tr:eq(1) th').each( function (i) {
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
            url: 'api/setup/item_api.php',
            type: 'POST',
            data: {action: 'pur_account_code'},
            dataType: "json",
            success: function(data){
              console.log(data);
              table.clear().draw();
              // append data in datatable
              var sno='0';
              for (var i = 0; i < data.length; i++) {
                  sno++;
                  table.row.add([sno,data[i].descr,data[i].account_code]);
              }
              table.draw();
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        }); 
      $('#PurGLFormModel').modal('show');
});

  //get value of generic in fields
$('#pur_gl_table').on('click','.odd',function(){
  var pur_gl_name=$(this).closest('tr').children('td:nth-child(2)').text();
  var pur_gl_code=$(this).closest('tr').children('td:nth-child(3)').text();
  $('#pur_gl_code').val(pur_gl_code);
  $('#pur_gl_name').val(pur_gl_name);
  $('#PurGLFormModel').modal('hide');
  $('#sale_gl_code').focus();
  // $('#CompanyFormModel').modal('show');
});
$('#pur_gl_table').on('click','.even',function(){
  var pur_gl_name=$(this).closest('tr').children('td:nth-child(2)').text();
  var pur_gl_code=$(this).closest('tr').children('td:nth-child(3)').text();
  $('#pur_gl_code').val(pur_gl_code);
  $('#pur_gl_name').val(pur_gl_name); 
  $('#PurGLFormModel').modal('hide');
  $('#sale_gl_code').focus();
  // $('#CompanyFormModel').modal('show');
});


//select sale GL code
$('#item_form').on('focus','#sale_gl_code',function(){
  // var company_code=$('#company_code').val();
      $('#sale_gl_table').dataTable().fnDestroy();
      table = $('#sale_gl_table').DataTable({
          dom: 'Bfrtip',
          orderCellsTop: true,
          fixedHeader: true,
          
          buttons: [
              'copy', 'csv', 'excel', 'pdf', 'print',
          ]
      });
      // Setup - add a text input to each footer cell
      // $('#sale_gl_table thead tr').clone(true).appendTo( '#sale_gl_table thead' );
      $('#sale_gl_table thead tr:eq(1) th').each( function (i) {
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
            url: 'api/setup/item_api.php',
            type: 'POST',
            data: {action: 'sale_account_code'},
            dataType: "json",
            success: function(data){
              console.log(data);
              table.clear().draw();
              // append data in datatable
              var sno='0';
              for (var i = 0; i < data.length; i++) {
                  sno++;
                  table.row.add([sno,data[i].descr,data[i].account_code]);
              }
              table.draw();
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        }); 
      $('#SaleGLFormModel').modal('show');
});

  //get value of generic in fields
$('#sale_gl_table').on('click','.odd',function(){
  var sale_gl_name=$(this).closest('tr').children('td:nth-child(2)').text();
  var sale_gl_code=$(this).closest('tr').children('td:nth-child(3)').text();
  $('#sale_gl_code').val(sale_gl_code);
  $('#sale_gl_name').val(sale_gl_name);
  $('#SaleGLFormModel').modal('hide');
  $('#item_name').focus();
  // $('#CompanyFormModel').modal('show');
});
$('#sale_gl_table').on('click','.even',function(){
  var sale_gl_name=$(this).closest('tr').children('td:nth-child(2)').text();
  var sale_gl_code=$(this).closest('tr').children('td:nth-child(3)').text();
  $('#sale_gl_code').val(sale_gl_code);
  $('#sale_gl_name').val(sale_gl_name); 
  $('#SaleGLFormModel').modal('hide');
  $('#item_name').focus();
  // $('#CompanyFormModel').modal('show');
});
$(document).ready(function(){
  $('#company_code').focus();
      $("#item_form").on('change','#credit',function(){
        var credit=$('#credit').val();
        if(credit==''){
          credit=0;
        }else{
          // myStr_min = credit.replace(/[^\d\,\.]/g, '');  
          // let commaNotations_min = /^\d+(\.\d{3})?\,\d{2}$/.test(myStr_min);
          // credit = commaNotations_min ?
          // Math.round(parseFloat(credit.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
          // Math.round(parseFloat(credit.replace(/[^\d\.]/g, ''))); 
          credit = credit.replaceAll(',','');
          var credit=new Intl.NumberFormat(
          'en-US', { style: 'currency', 
            currency: 'USD',
            currencyDisplay: 'narrowSymbol'}).format(credit);
            var credit=credit.replace(/[$]/g,'');
              console.log(credit);
          $('#credit').val(credit);
        }
      });
      $("#item_form").on('change','#debit',function(){
        var debit=$('#debit').val();
        if(debit==''){
          debit=0;
        }else{
          // myStr_deb = debit.replace(/[^\d\,\.]/g, '');  
          // let commaNotations_deb = /^\d+(\.\d{3})?\,\d{2}$/.test(myStr_deb);
          // debit = commaNotations_deb ?
          // Math.round(parseFloat(debit.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
          // Math.round(parseFloat(debit.replace(/[^\d\.]/g, '')));
          debit = debit.replaceAll(',','');
          var debit=new Intl.NumberFormat(
          'en-US', { style: 'currency', 
            currency: 'USD',
          currencyDisplay: 'narrowSymbol'}).format(debit);
          var debit=debit.replace(/[$]/g,'');
          $('#debit').val(debit);
        }
      });
      $("#item_form").on('change','#credit_18',function(){
        var credit=$('#credit_18').val();
        if(credit==''){
          credit=0;
        }else{
          // myStr_min = credit.replace(/[^\d\,\.]/g, '');  
          // let commaNotations_min = /^\d+(\.\d{3})?\,\d{2}$/.test(myStr_min);
          // credit = commaNotations_min ?
          // Math.round(parseFloat(credit.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
          // Math.round(parseFloat(credit.replace(/[^\d\.]/g, ''))); 
          credit = credit.replaceAll(',','');
          var credit=new Intl.NumberFormat(
          'en-US', { style: 'currency', 
            currency: 'USD',
            currencyDisplay: 'narrowSymbol'}).format(credit);
            var credit=credit.replace(/[$]/g,'');
              console.log(credit);
          $('#credit_18').val(credit);
        }
      });
      $("#item_form").on('change','#debit_18',function(){
        var debit=$('#debit_18').val();
        if(debit==''){
          debit=0;
        }else{
          // myStr_deb = debit.replace(/[^\d\,\.]/g, '');  
          // let commaNotations_deb = /^\d+(\.\d{3})?\,\d{2}$/.test(myStr_deb);
          // debit = commaNotations_deb ?
          // Math.round(parseFloat(debit.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
          // Math.round(parseFloat(debit.replace(/[^\d\.]/g, '')));
          debit = debit.replaceAll(',','');
          var debit=new Intl.NumberFormat(
          'en-US', { style: 'currency', 
            currency: 'USD',
          currencyDisplay: 'narrowSymbol'}).format(debit);
          var debit=debit.replace(/[$]/g,'');
          $('#debit_18').val(debit);
        }
      });
      $("#item_form").on('change','#entries_credit',function(){
        var credit=$('#entries_credit').val();
        if(credit==''){
          credit=0;
        }else{
          // myStr_min = credit.replace(/[^\d\,\.]/g, '');  
          // let commaNotations_min = /^\d+(\.\d{3})?\,\d{2}$/.test(myStr_min);
          // credit = commaNotations_min ?
          // Math.round(parseFloat(credit.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
          // Math.round(parseFloat(credit.replace(/[^\d\.]/g, ''))); 
          credit = credit.replaceAll(',','');
          var credit=new Intl.NumberFormat(
          'en-US', { style: 'currency', 
            currency: 'USD',
            currencyDisplay: 'narrowSymbol'}).format(credit);
            var credit=credit.replace(/[$]/g,'');
              console.log(credit);
          $('#entries_credit').val(credit);
        }
      });
      $("#item_form").on('change','#entries_debit',function(){
        var debit=$('#entries_debit').val();
        if(debit==''){
          debit=0;
        }else{
          // myStr_deb = debit.replace(/[^\d\,\.]/g, '');  
          // let commaNotations_deb = /^\d+(\.\d{3})?\,\d{2}$/.test(myStr_deb);
          // debit = commaNotations_deb ?
          // Math.round(parseFloat(debit.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
          // Math.round(parseFloat(debit.replace(/[^\d\.]/g, '')));
          debit = debit.replaceAll(',','');
          var debit=new Intl.NumberFormat(
          'en-US', { style: 'currency', 
            currency: 'USD',
          currencyDisplay: 'narrowSymbol'}).format(debit);
          var debit=debit.replace(/[$]/g,'');
          $('#entries_debit').val(debit);
        }
      });
      $("#item_form").on('change','#closing_credit',function(){
        var credit=$('#credit').val();
        if(credit==''){
          credit=0;
        }else{
          // myStr_min = credit.replace(/[^\d\,\.]/g, '');  
          // let commaNotations_min = /^\d+(\.\d{3})?\,\d{2}$/.test(myStr_min);
          // credit = commaNotations_min ?
          // Math.round(parseFloat(credit.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
          // Math.round(parseFloat(credit.replace(/[^\d\.]/g, ''))); 
          credit = credit.replaceAll(',','');
          var credit=new Intl.NumberFormat(
          'en-US', { style: 'currency', 
            currency: 'USD',
            currencyDisplay: 'narrowSymbol'}).format(credit);
            var credit=credit.replace(/[$]/g,'');
              console.log(credit);
          $('#closing_credit').val(credit);
        }
      });
      $("#item_form").on('change','#closing_debit',function(){
        var debit=$('#closing_debit').val();
        if(debit==''){
          debit=0;
        }else{
          // myStr_deb = debit.replace(/[^\d\,\.]/g, '');  
          // let commaNotations_deb = /^\d+(\.\d{3})?\,\d{2}$/.test(myStr_deb);
          // debit = commaNotations_deb ?
          // Math.round(parseFloat(debit.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
          // Math.round(parseFloat(debit.replace(/[^\d\.]/g, '')));
          debit = debit.replaceAll(',','');
          var debit=new Intl.NumberFormat(
          'en-US', { style: 'currency', 
            currency: 'USD',
          currencyDisplay: 'narrowSymbol'}).format(debit);
          var debit=debit.replace(/[$]/g,'');
          $('#closing_debit').val(debit);
        }
      });
      $("#example1").on('change','#last_pur_rate',function(){
        var debit=$('#last_pur_rate').val();
        if(debit==''){
          debit=0;
        }else{
          // myStr_deb = debit.replace(/[^\d\,\.]/g, '');  
          // let commaNotations_deb = /^\d+(\.\d{3})?\,\d{2}$/.test(myStr_deb);
          // debit = commaNotations_deb ?
          // Math.round(parseFloat(debit.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
          // Math.round(parseFloat(debit.replace(/[^\d\.]/g, '')));
          debit = debit.replaceAll(',','');
          var debit=new Intl.NumberFormat(
          'en-US', { style: 'currency', 
            currency: 'USD',
          currencyDisplay: 'narrowSymbol'}).format(debit);
          var debit=debit.replace(/[$]/g,'');
          $('#last_pur_rate').val(debit);
        }
      });
});

$(document).ready(function(){
      $("#item_form").on('focus','.rate',function(){
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
      $("#item_form").on('change','.rate',function(){
        var previous_amounts=sessionStorage.getItem('previous_amount');
        // console.log(previous_amounts);
        if(previous_amounts == ""){
          previous_amount=0;
        }else{
          // myStr_pre = previous_amounts.replace(/[^\d\,\.]/g, '');  
          // let commaNotations_pre = /^\d+(\.\d{3})?\,\d{2}$/.test(myStr_pre);
          // previous_amount = commaNotations_pre ?
          // Math.round(parseFloat(previous_amounts.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
          // Math.round(parseFloat(previous_amounts.replace(/[^\d\.]/g, '')));
          previous_amount = previous_amounts.replaceAll(',','');
        }
        var total=$('#total').val();
        console.log("total");
        if(total == '' || total == '0' || total=='0.00'){
          minuss=0;
        }else{
          // console.log("no");
          // myStr_min = total.replace(/[^\d\,\.]/g, '');  
          // let commaNotations_min = /^\d+(\.\d{3})?\,\d{2}$/.test(myStr_min);
          // minus_t = commaNotations_min ?
          // Math.round(parseFloat(total.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
          // Math.round(parseFloat(total.replace(/[^\d\.]/g, '')));
          minus_t = total.replaceAll(',','');
          
          // var minus_t = total.split(",");
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
            // myStr_amt = rate.replace(/[^\d\,\.]/g, '');  
            // let commaNotations_amt = /^\d+(\.\d{3})?\,\d{2}$/.test(myStr_amt);
            // pre_rate = commaNotations_amt ?
            // Math.round(parseFloat(rate.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
            // Math.round(parseFloat(rate.replace(/[^\d\.]/g, '')));
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
            // console.log(amount);
            // console.log(pre_amount);
            // console.log("minus");
            // console.log(minuss);
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
          $('#total').val(total);
          // $('#amount'+rate_id).val(show_amount);
        }

      });
       
      $("#item_form").on('focus','.quantity',function(){
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
      $("#item_form").on('change','.quantity',function(){
        var previous_amounts=sessionStorage.getItem('previous_amount');
        // console.log(previous_amounts);
        if(previous_amounts == ""){
          previous_amount=0;
        }else{
          // myStr_pre = previous_amounts.replace(/[^\d\,\.]/g, '');  
          // let commaNotations_pre = /^\d+(\.\d{3})?\,\d{2}$/.test(myStr_pre);
          // previous_amount = commaNotations_pre ?
          // Math.round(parseFloat(previous_amounts.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
          // Math.round(parseFloat(previous_amounts.replace(/[^\d\.]/g, '')));
          previous_amount = previous_amounts.replaceAll(',','');
        }
        var total=$('#total').val();
        if(total == '' || total == '0' || total=='0.00'){
          minuss=0;
        }else{
          // myStr_min = total.replace(/[^\d\,\.]/g, '');  
          // let commaNotations_min = /^\d+(\.\d{3})?\,\d{2}$/.test(myStr_min);
          // minus_t = commaNotations_min ?
          // Math.round(parseFloat(total.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
          // Math.round(parseFloat(total.replace(/[^\d\.]/g, '')));
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
          // console.log("1");
          if (rate.indexOf(',') > -1) { 
          // console.log("2");
            // myStr_amt = rate.replace(/[^\d\,\.]/g, '');  
            // let commaNotations_amt = /^\d+(\.\d{3})?\,\d{2}$/.test(myStr_amt);
            // pre_rate = commaNotations_amt ?
            // Math.round(parseFloat(rate.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
            // Math.round(parseFloat(rate.replace(/[^\d\.]/g, '')));
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
          console.log(org_amt);
          if (amount.indexOf(',') > -1) { 
            // myStr_amt = amount.replace(/[^\d\,\.]/g, '');  
            // let commaNotations_amt = /^\d+(\.\d{3})?\,\d{2}$/.test(myStr_amt);
            // pre_amount = commaNotations_amt ?
            // Math.round(parseFloat(amount.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
            // Math.round(parseFloat(amount.replace(/[^\d\.]/g, '')));
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
          var total=new Intl.NumberFormat(
          'en-US', { style: 'currency', 
            currency: 'USD',
          currencyDisplay: 'narrowSymbol'}).format(fnf);
          var total=total.replace(/[$]/g,'');
          $('#total').val(total);
          // $('#amount'+quantity_id).val(show_amount);
        }
        

      });
});
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      // alert( "Form successful submitted!" );
    }
  });
  $('#item_form').validate({
    rules: {
        company_code: {
        required: true,
      },
      division: {
        required: true,
      },
      product_code: {
        required: true,
      },
      item_code: {
        required: true,
      },
      item_name: {
        required: true,
      },
      item_codes: {
        required: true,
      },
      item_pur_code: {
        required: true,
      },
      item_sale_code: {
        required: true,
      },
      generic_code: {
        required: true,
      },
      um_code: {
        required: true,
      },
      pur_gl_code: {
        required: true,
      },
      sale_gl_code: {
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


$(document).ready(function() {
    $("#ajax-loader").show();
    $("#ajax-loader").hide();
    
    
    $("#division").change(function(){
        // $("#ajax-loader").show();
        // console.log("HI");
        var division_code=$("#division").val();
        var company_code=$("#company_code").val();
        console.log(company_code);
        // console.log(division_code);
        
          $("#msg1").html('');
          $.ajax({
            url: 'api/setup/item_api.php',
            type: 'POST',
            data: {action:'check_item_code',company_code:company_code,division_code:division_code},
            success: function (response) {
              $("#ajax-loader").hide();
              console.log(response);
              // if(response.status == "0"){
                $("#item_code").val(response);
              //   $("#msg1").css('display','');
              //   $("#msg1").text(response.message);
              //   $("#item_code").attr('placeholder',item_code);
              //   $("#item_code").val("");
              // }else{
              //   $("#item_code").css("background-color", "");
              //   $("#msg1").text("");
              // }
            var item_code = response;
            if(item_code != null || division_code != null || company_code != null){
                var item_con_code=division_code+'-'+item_code;
                $('#item_codes').val(item_con_code);
                if(item_code.length== 3){
                    item_code=item_code;
                }else if(item_code.length== 2){
                    item_code='0'+item_code;
                    // console.log(item_code);
                }else{
                    item_code='00'+item_code;
                }
                if(division_code.length == 3){
                    division_code='0'+division_code;
                }else if(division_code.length == 2){
                    division_code='00'+division_code;
                }else if(division_code.length == 1){
                    division_code='000'+division_code;
                }
                var purchase_account='888'+division_code+item_code;
                $('#item_pur_code').val(purchase_account);
                var sale_account='858'+division_code+item_code;
                $('#item_sale_code').val(sale_account);
            }
          
            },
            error: function(e) 
            {
              console.log(e);
              alert("Contact IT Department");
            }   
          
          });
        
        
    });
});

      //update
      $("#item_form").on('click','#add_lmt', function (e) {  
        if ($("#item_form").valid())
        { 
            // if (confirm("Do you want to Add the limited information?\nNote: If you want to add further information click on scroll button")){
                // $("#ajax-loader").show();
                e.preventDefault();
                // var formData = new FormData(this);
                // formData.append('action','insert_limited');

                var company_code=$('#company_code').val();
                var division=$('#division').val();
                var product_code=$('#product_code').val();
                var generic_code=$('#generic_code').val();
                var um_code=$('#um_code').val();
                var pur_gl_code=$('#pur_gl_code').val();
                var sale_gl_code=$('#sale_gl_code').val();
                
                var item_code=$('#item_code').val();
                var item_name=$('#item_name').val();
                var item_codes=$('#item_codes').val();
                var item_pur_code=$('#item_pur_code').val();
                var item_sale_code=$('#item_sale_code').val();
                var sale_name=$('#sale_name').val();
                var sale_name2=$('#sale_name2').val();
                var item_detail=$('#item_detail').val();
                var purchase_mode=$('#purchase_mode').val();

                var packing=$('#packing').val()??'';
                var brand=$('#brand').val()??'';
                var origin=$('#origin').val()??'';
                var hs_code=$('#hs_code').val()??'';
                var item_category=$('#item_category').val()??'';
                var target_qty=$('#target_qty').val()??'';
                var trade_price=$('#trade_price').val()??'';
                var trade_price2=$('#trade_price2').val()??'';
                var discount_rate=$('#discount_rate').val()??'';
                var gst_rate=$('#gst_rate').val()??'';
                var add_rate=$('#add_rate').val()??'';
                var min_level=$('#min_level').val()??'';
                var max_level=$('#max_level').val()??'';

                var quantity1=$('#quantity1').val()??'';
                var quantity2=$('#quantity2').val()??'';
                var quantity3=$('#quantity3').val()??'';
                var rate1=$('#rate1').val()??'';
                var rate2=$('#rate2').val()??'';
                var rate3=$('#rate3').val()??'';
                var amount1=$('#amount1').val()??'';
                var amount2=$('#amount2').val()??'';
                var amount3=$('#amount3').val()??'';
                var last_pur_rate=$('#last_pur_rate').val()??'';
                var total=$('#total').val()??'';
                console.log("hi");
                $.ajax({
                        url: 'api/setup/item_api.php',
                        type:'POST',
                        data: {action:'insert_limited',company_code:company_code,division:division,product_code:product_code,
                            generic_code:generic_code,um_code:um_code,pur_gl_code:pur_gl_code,sale_gl_code:sale_gl_code,
                            sale_gl_code:sale_gl_code,item_code:item_code,item_name:item_name,item_codes:item_codes,
                            item_pur_code:item_pur_code,item_sale_code:item_sale_code,sale_name:sale_name,
                            sale_name2:sale_name2,item_detail:item_detail,purchase_mode:purchase_mode,packing:packing,
                            brand:brand,origin:origin,hs_code:hs_code,item_category:item_category,target_qty:target_qty,
                            trade_price:trade_price,trade_price2:trade_price2,discount_rate:discount_rate,gst_rate:gst_rate,
                            add_rate:add_rate,min_level:min_level,max_level:max_level,quantity1:quantity1,quantity2:quantity2,
                            quantity3:quantity3,rate1:rate1,rate2:rate2,rate3:rate3,amount1:amount1,amount2:amount2,amount3:amount3,
                            last_pur_rate:last_pur_rate,total:total
                        },
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
                                    $.get('setup_files/add_item.php',function(data,status){
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
            // }
        }
      });
      //update
      $("#item_form").on('submit', function (e) {  
        if ($("#item_form").valid())
        { 
            // if (confirm("Do you want to Add the limited information?\nNote: If you want to add further information click on scroll button")){
                // $("#ajax-loader").show();
                e.preventDefault();
                var formData = new FormData(this);
                
                var quantity1=$('#quantity1').val()??'';
                var quantity2=$('#quantity2').val()??'';
                var quantity3=$('#quantity3').val()??'';
                var rate1=$('#rate1').val()??'';
                var rate2=$('#rate2').val()??'';
                var rate3=$('#rate3').val()??'';
                var amount1=$('#amount1').val()??'';
                var amount2=$('#amount2').val()??'';
                var amount3=$('#amount3').val()??'';
                var last_pur_rate=$('#last_pur_rate').val()??'';
                var total=$('#total').val()??'';
                formData.append('quantity1',quantity1)??'';
                formData.append('quantity2',quantity2)??'';
                formData.append('quantity3',quantity3)??'';
                formData.append('rate1',rate1)??'';
                formData.append('rate2',rate2)??'';
                formData.append('rate3',rate3)??'';
                formData.append('amount1',amount1)??'';
                formData.append('amount2',amount2)??'';
                formData.append('amount3',amount3)??'';
                formData.append('last_pur_rate',last_pur_rate)??'';
                formData.append('total',total)??'';
                formData.append('action','insert');
                $.ajax({
                        url: 'api/setup/item_api.php',
                        type:'POST',
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
                                    $.get('setup_files/add_item.php',function(data,status){
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
            // }
        }
      });

// breadcrumbs
$('#dashboard_breadcrumb').click(function(){
    $.get('dashboard_main/dashboard_main.php',function(data,status){
        $('#content').html(data);
    });
});
$("#setup_breadcrumb").on("click", function () {
    $.get('setup_files/setup_file.php', function(data,status){
        $("#content").html(data);
    });
});
$("#party_setup_breadcrumb").on("click", function () {
    $.get('setup_files/item_list.php', function(data,status){
        $("#content").html(data);
    });
});
$("#add_item_breadcrumb").on("click", function () {
    $.get('setup_files/add_item.php', function(data,status){
        $("#content").html(data);
    });
});
    //scroll button
    var $window = $(window),
        $document = $(document),
        button = $('#btn-back-to-top');

    button.css({
        opacity: 1
    });
    $window.on('scroll', function () {
        if (($window.scrollTop() + $window.height()) == $document.height()) {
            button.stop(true).animate({
                opacity:-1
            }, 250);
        } else {
            button.stop(true).animate({
                opacity: 1
            }, 250);
        }
    });
</script>
<?php include '../includes/loader.php'?>