<?php
session_start();
?>
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Item Information Edit</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="setup_breadcrumb">Item</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="item_setup_breadcrumb">Item Setup</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="edit_item_breadcrumb" disabled>Edit Item</button></li>
              </ol>
            </div>   
          </div>
        </div><!-- /.container-fluid -->
      </section>

     
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid" style="margin-top: -20px ;">
          <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px">
                        <div class="container-fluid">
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
input:focus,select:focus,textarea:focus,.select2-selection:focus, .add:focus, #submit:focus, .remove:focus{
-moz-box-shadow: 0 0 8px rgba(82,168,236,.6);
box-shadow: 0 0 8px orangered !important;
border: 3px solid black!important;}
select{
width:70% !important;
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
                                                    <input maxlength="30" type="text" name="company_code" style="background-color: #ccd4e1;font-weight:bold;" id="company_code" class="form-control form-control-sm" placeholder="Company Code" tabindex="-1" readonly >

                                                    <!-- <select class="form-control form-control-sm  js-example-basic-single" id="company_code" name="company_code">
                                                    </select>                                    -->
                                                </div>
                                            </div>
                                            <div class="col-sm-3 form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-user"></i></span>
                                                    </div>
                                                    <input maxlength="30" type="text" name="company_name" id="company_name" style="background-color: #ccd4e1;font-weight:bold;" class="form-control form-control-sm" placeholder="Company Name" tabindex="-1" readonly >
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
                                                    <input maxlength="30" type="text" name="division" id="division" style="background-color: #ccd4e1;font-weight:bold;" class="form-control form-control-sm" placeholder="Division Code" tabindex="-1" readonly >
                                                    <!-- <select class="form-control form-control-sm  js-example-basic-single" id="division" name="division">
                                                    </select>                                    -->
                                                </div>
                                            </div>
                                            <div class="col-sm-3 form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-user"></i></span>
                                                    </div>
                                                    <input maxlength="30" type="text" name="division_name" id="division_name" style="background-color: #ccd4e1;font-weight:bold;" class="form-control form-control-sm" placeholder="Division Name" tabindex="-1" readonly >
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
                                                    <input maxlength="30" type="text" name="product_code" id="product_code" style="background-color: #ccd4e1;font-weight:bold;" class="form-control form-control-sm" placeholder="Product Code" tabindex="-1" readonly >
                                                    </select>                                   
                                                </div>
                                            </div>
                                            <div class="col-sm-3 form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-user"></i></span>
                                                    </div>
                                                    <input maxlength="30" type="text" name="product_name" id="product_name" style="background-color: #ccd4e1;font-weight:bold;" class="form-control form-control-sm" placeholder="Product Name" tabindex="-1" readonly >
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
                                                    <input maxlength="30" type="text" name="generic_code" id="generic_code" style="background-color: #ccd4e1;font-weight:bold;" class="form-control form-control-sm" placeholder="Generic Code" tabindex="-1" readonly >
                                                    </select>                                   
                                                </div>
                                            </div>
                                            <div class="col-sm-3 form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-user"></i></span>
                                                    </div>
                                                    <input maxlength="30" type="text" name="generic_name" id="generic_name" style="background-color: #ccd4e1;font-weight:bold;" class="form-control form-control-sm" placeholder="Generic Name" tabindex="-1" readonly >
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
                                                    <input maxlength="30" type="text" name="um_code" id="um_code" class="form-control form-control-sm" style="background-color: #ccd4e1;font-weight:bold;" placeholder="UM Code" tabindex="-1" readonly >
                                                    </select>                                   
                                                </div>
                                            </div>
                                            <div class="col-sm-3 form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-user"></i></span>
                                                    </div>
                                                    <input maxlength="30" type="text" name="um_name" id="um_name" class="form-control form-control-sm" style="background-color: #ccd4e1;font-weight:bold;" placeholder="U/M Name" tabindex="-1" readonly >
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
                                                    <input maxlength="30" type="text" name="pur_gl_code" id="pur_gl_code" style="background-color: #ccd4e1;font-weight:bold;" class="form-control form-control-sm" placeholder="Pur GL Code" tabindex="-1" readonly >
                                                    </select>                                   
                                                </div>
                                            </div>
                                            <div class="col-sm-3 form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-user"></i></span>
                                                    </div>
                                                    <input maxlength="30" type="text" name="pur_gl_name" id="pur_gl_name" style="background-color: #ccd4e1;font-weight:bold;" class="form-control form-control-sm" placeholder="Purchase GL Name" tabindex="-1" readonly >
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
                                                    <input maxlength="30" type="text" name="sale_gl_code" id="sale_gl_code" style="background-color: #ccd4e1;font-weight:bold;" class="form-control form-control-sm" placeholder="Sale GL Code" tabindex="-1" readonly >
                                                    </select>                                   
                                                </div>
                                            </div>
                                            <div class="col-sm-3 form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-user"></i></span>
                                                    </div>
                                                    <input maxlength="30" type="text" name="sale_gl_name" id="sale_gl_name" style="background-color: #ccd4e1;font-weight:bold;" class="form-control form-control-sm" placeholder="Sale GL Name" tabindex="-1" readonly >
                                                </div>
                                            </div>
                                        
                                              <div class="col-sm-3 form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                                    </div> 
                                                    <input maxlength="3" min="1" max="999" title="item_code" type="number" name="item_code" style="background-color: #ccd4e1;font-weight:bold;" id="item_code" class="form-control form-control-sm" placeholder="Item Code" tabindex="-1" readonly>
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
                                                    <input maxlength="30" title="sale name 2" type="text" name="sale_name2" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" id="sale_name2" class="form-control form-control-sm" placeholder="Sale Name 2"  >
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
                                            <input maxlength="30" type="number" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" name="target_qty" id="target_qty" class="form-control form-control-sm" placeholder="Target Quantity" >
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
                                            <input maxlength="30" type="number" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" name="max_level" id="max_level" class="form-control form-control-sm" placeholder="Max Level" >
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


<div class="modal-backdrop fade show" id="backdrop" style="display: none;"></div>

<?php

include '../includes/security.php';
?>


<script>

$(document).ready(function(){
  $('#item_name').focus();
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
    
    var company_code = <?php echo $_GET['company_code'] ?>;
    var item_code = <?php echo $_GET['item_code'] ?>;
    var division_code = <?php echo $_GET['division_code'] ?>;
    var generic_code = <?php echo $_GET['generic_code'] ?>;
    var um_code = <?php echo $_GET['um_code'] ?>;
    var product_code = <?php echo $_GET['product_code'] ?>;
    var gl_code = <?php echo $_GET['gl_code'] ?>;
    var gl_code_sale = <?php echo $_GET['gl_code_sale'] ?>;


    $('#company_code').val(company_code);
    $('#item_code').val(item_code);
    $('#division_code').val(division_code);
    $('#product_code').val(product_code);
    // $('#division').select2();
    // $('#division').select2();
    $('.js-example-basic-single').select2();
    // $("#ajax-loader").show();
    // company code dropdown
    // $.ajax({
    //   url: 'api/setup/chart_of_account/control_account_api.php',
    //     type: 'POST',
    //     data: {action: 'company_code'},
    //     dataType: "json",
    //     success: function(response){
    //         console.log(response);
    //         $('#company_code').select2();
    //         $('#company_code').html('');
    //         $('#company_code').append('<option value="" selected disabled>Select Company</option>');
    //         $.each(response, function(key, value){
    //             $('#company_code').append('<option data-name="'+value["co_name"]+'"  data-code="'+value["co_code"]+'" value="'+value["co_code"]+'">'+value["co_code"]+' - '+value["co_name"]+'</option>');
    //         });
            $('#company_code').val(company_code);
    //         var company_name=$('#company_code').find(':selected').attr("data-name");
    //         var company_codes=$('#company_code').find(':selected').attr("data-code");
    //         $('#select2-company_code-container').html(company_codes);
    //         $('#company_name').val(company_name); 
    //     },
    //     error: function(error){
    //         console.log(error);
    //         alert("Contact IT Department");
    //     }
    // });  
    // division code dropdown
    // $.ajax({
    //     url: 'api/setup/party_api.php',
    //     type: 'POST',
    //     data: {action: 'division_code'},
    //     dataType: "json",
    //     success: function(data){
    //         // console.log(data);
    //         $('#division').html('');
    //         $('#division').append('<option value="" selected disabled>Select Division</option>');
    //         $.each(data, function(key, value){
    //             $('#division').append('<option data-name="'+value["division_name"]+'"  data-code="'+value["division_code"]+'" value="'+value["division_code"]+'">'+value["division_code"]+' - '+value["division_name"]+'</option>');
    //         });
            $('#division').val(division_code);
    //         var division_name=$('#division').find(':selected').attr("data-name");
    //         var division_codes=$('#division').find(':selected').attr("data-code");
    //         $('#select2-division-container').html(division_codes);
    //         $('#division_name').val(division_name);
    //     },
    //     error: function(error){
    //         console.log(error);
    //         alert("Contact IT Department");
    //     }
    // });   
    // product code dropdown
    // $.ajax({
    //     url: 'api/setup/item_api.php',
    //     type: 'POST',
    //     data: {action: 'product_code'},
    //     dataType: "json",
    //     success: function(data){
    //         // console.log(data);
    //         $('#product_code').html('');
    //         $('#product_code').append('<option value="" selected disabled>Select product</option>');
    //         $.each(data, function(key, value){
    //             $('#product_code').append('<option data-name="'+value["product_name"]+'"  data-code="'+value["product_code"]+'" value="'+value["product_code"]+'">'+value["product_code"]+' - '+value["product_name"]+'</option>');
    //         });
            $('#product_code').val(product_code);
    //         var product_name=$('#product_code').find(':selected').attr("data-name");
    //         var product_codes=$('#product_code').find(':selected').attr("data-code");
    //         $('#select2-product-container').html(product_codes);
    //         $('#product_name').val(product_name);
    //     },
    //     error: function(error){
    //         console.log(error);
    //         alert("Contact IT Department");
    //     }
    // }); 
    // $("#ajax-loader").hide();
    // $("#item_form").on('change','#sale_gl_code',function(){
    //       var sale_gl_name=$('#sale_gl_code').find(':selected').attr("data-name");
    //       var sale_gl_code=$('#sale_gl_code').find(':selected').attr("data-code");
    //       $('#select2-sale_gl_code-container').html(sale_gl_code);
    //       $('#sale_gl_name').val(sale_gl_name); 
    // });
    // $("#item_form").on('change','#pur_gl_code',function(){
    //       var pur_gl_name=$('#pur_gl_code').find(':selected').attr("data-name");
    //       var pur_gl_code=$('#pur_gl_code').find(':selected').attr("data-code");
    //       $('#select2-pur_gl_code-container').html(pur_gl_code);
    //       $('#pur_gl_name').val(pur_gl_name); 
    // });
    // $("#item_form").on('change','#um_code',function(){
    //       var um_name=$('#um_code').find(':selected').attr("data-name");
    //       var um_code=$('#um_code').find(':selected').attr("data-code");
    //       $('#select2-um_code-container').html(um_code);
    //       $('#um_name').val(um_name); 
    // });
    // $("#item_form").on('change','#generic_code',function(){
    //       var generic_name=$('#generic_code').find(':selected').attr("data-name");
    //       var generic_code=$('#generic_code').find(':selected').attr("data-code");
    //       $('#select2-generic_code-container').html(generic_code);
    //       $('#generic_name').val(generic_name); 
    // });
    // $("#ajax-loader").show();
    $.ajax({
          url : 'api/setup/item_api.php',
          type : "post",
          data : {action:'edit',company_code:company_code,product_code:product_code,division_code:division_code,item_code:item_code},
          success: function(response)
          {
              console.log(response);
              $('#company_name').val(response.co_name);
              $('#division_name').val(response.div_name);
              $('#product_name').val(response.product_name);
              $('#generic_name').val(response.gen_name);
              $('#um_name').val(response.unit_name);
              $('#pur_gl_name').val(response.descr);
              $('#sale_gl_name').val(response.descr);


              $('#item_name').val(response.item_name_pur);
              $('#item_codes').val(response.item_div);
              $('#item_pur_code').val(response.item_pcode);
              $('#item_sale_code').val(response.item_scode);
              $('#sale_name').val(response.item_name_sale);
              $('#sale_name2').val(response.item_name_sale2);
              $('#item_detail').val(response.item_descr);
              $('#purchase_mode').val(response.pur_mode);
              $('#packing').val(response.packing);
              $('#brand').val(response.brand);
              $('#origin').val(response.origin);
              $('#hs_code').val(response.hscode);
              $('#item_category').val(response.item_cat);
              $('#target_qty').val(response.target_qty);
              $('#trade_price').val(response.trade_price);
              $('#trade_price2').val(response.tp_rate2);
              $('#discount_rate').val(response.disc_slab);
              $('#gst_rate').val(response.tax_rate);
              $('#add_rate').val(response.add_rate);
              $('#min_level').val(response.min_level);
              $('#max_level').val(response.max_level);
              $('#quantity1').val(response.open_qty);
              $('#quantity2').val(response.close_qty);
              $('#quantity3').val(response.pur_qty);
                //   $('#ntn_number').val(response.co1_code);
              // generic code dropdown
              // $.ajax({
              //     url: 'api/setup/item_api.php',
              //     type: 'POST',
              //     data: {action: 'generic_code'},
              //     dataType: "json",
              //     success: function(data){
              //         // console.log(data);
              //         $('#generic_code').html('');
              //         $('#generic_code').append('<option value="" selected disabled>Select Generic</option>');
              //         $.each(data, function(key, value){
              //             $('#generic_code').append('<option data-name="'+value["gen_name"]+'"  data-code="'+value["gen_code"]+'" value="'+value["gen_code"]+'">'+value["gen_code"]+' - '+value["gen_name"]+'</option>');
              //         });
                      $('#generic_code').val(response.gen_code);
              //         var gen_name=$('#generic_code').find(':selected').attr("data-name");
              //         var gen_codes=$('#generic_code').find(':selected').attr("data-code");
              //         $('#select2-generic_code-container').text(gen_codes);
              //         $('#generic_name').val(gen_name); 
                      
              //     },
              //     error: function(error){
              //         console.log(error);
              //         alert("Contact IT Department");
              //     }
              // }); 
              // um code dropdown
              // $.ajax({
              //     url: 'api/setup/item_api.php',
              //     type: 'POST',
              //     data: {action: 'um_code'},
              //     dataType: "json",
              //     success: function(data1){
              //         // console.log(data);
              //         $('#um_code').html('');
              //         $('#um_code').append('<option value="" selected disabled>Select UM</option>');
              //         $.each(data1, function(key, value){
              //             $('#um_code').append('<option data-name="'+value["unit_name"]+'"  data-code="'+value["unit_code"]+'" value="'+value["unit_code"]+'">'+value["unit_code"]+' - '+value["unit_name"]+'</option>');
              //         });
                      $('#um_code').val(response.um_code);
              //         var um_name=$('#um_code').find(':selected').attr("data-name");
              //         var um_codes=$('#um_code').find(':selected').attr("data-code");
              //         $('#select2-um_code-container').html(um_codes);
              //         $('#um_name').val(um_name); 
              //       },
              //     error: function(error){
              //         console.log(error);
              //         alert("Contact IT Department");
              //     }
              // });
              // // purchase account code dropdown
              // $.ajax({
              //     url: 'api/setup/item_api.php',
              //     type: 'POST',
              //     data: {action: 'pur_account_code'},
              //     dataType: "json",
              //     success: function(data){
              //         // console.log(data);
              //         $('#pur_gl_code').html('');
              //         $('#pur_gl_code').append('<option value="" selected disabled>Select Salesman</option>');
              //         $.each(data, function(key, value){
              //             $('#pur_gl_code').append('<option data-name="'+value["descr"]+'"  data-code="'+value["account_code"]+'" value="'+value["account_code"]+'">'+value["account_code"]+' - '+value["descr"]+'</option>');
              //         });
                      $('#pur_gl_code').val(response.gl_code);
              //         var salesman_name=$('#pur_gl_code').find(':selected').attr("data-name");
              //         var pur_gl_codes=$('#pur_gl_code').find(':selected').attr("data-code");
              //         $('#select2-pur_gl_code-container').html(pur_gl_codes);
              //         $('#pur_gl_name').val(salesman_name); 
                      
              //     },
              //     error: function(error){
              //         console.log(error);
              //         alert("Contact IT Department");
              //     }
              // });
              // // sale account code dropdown
              // $.ajax({
              //     url: 'api/setup/item_api.php',
              //     type: 'POST',
              //     data: {action: 'sale_account_code'},
              //     dataType: "json",
              //     success: function(data){
              //         // console.log(data);
              //         $('#sale_gl_code').html('');
              //         $('#sale_gl_code').append('<option value="" selected disabled>Select Account</option>');
              //         $.each(data, function(key, value){
              //             $('#sale_gl_code').append('<option data-name="'+value["descr"]+'"  data-code="'+value["account_code"]+'" value="'+value["account_code"]+'">'+value["account_code"]+' - '+value["descr"]+'</option>');
              //         });
                      $('#sale_gl_code').val(response.gl_code_sale);
              //         var sale_gl_name=$('#sale_gl_code').find(':selected').attr("data-name");
              //         var sale_gl_codes=$('#sale_gl_code').find(':selected').attr("data-code");
              //         $('#select2-sale_gl_code-container').html(sale_gl_codes);
              //         $('#sale_gl_name').val(sale_gl_name); 
              //       },
              //     error: function(error){
              //         console.log(error);
              //         alert("Contact IT Department");
              //     }
              // });
                $("#ajax-loader").hide();
              //add commas and dot in amount
              var rate1=new Intl.NumberFormat(
              'en-US', { style: 'currency', 
                currency: 'USD',
              currencyDisplay: 'narrowSymbol'}).format(response.open_rate);
              var rate1=rate1.replace(/[$]/g,'');
              $('#rate1').val(rate1);
              var rate2=new Intl.NumberFormat(
              'en-US', { style: 'currency', 
                currency: 'USD',
              currencyDisplay: 'narrowSymbol'}).format(response.close_rate);
              var rate2=rate2.replace(/[$]/g,''); 
              $('#rate2').val(rate2);

              var rate3=new Intl.NumberFormat(
              'en-US', { style: 'currency', 
                currency: 'USD',
              currencyDisplay: 'narrowSymbol'}).format(response.pur_rate);
              var rate3=rate3.replace(/[$]/g,'');
              $('#rate3').val(rate3);
              var amount1=new Intl.NumberFormat(
              'en-US', { style: 'currency', 
                currency: 'USD',
              currencyDisplay: 'narrowSymbol'}).format(response.open_val);
              var amount1=amount1.replace(/[$]/g,''); 
              $('#amount1').val(amount1);
              var amount2=new Intl.NumberFormat(
              'en-US', { style: 'currency', 
                currency: 'USD',
              currencyDisplay: 'narrowSymbol'}).format(response.close_val);
              var amount2=amount2.replace(/[$]/g,''); 
              $('#amount2').val(amount2);
              var amount3=new Intl.NumberFormat(
              'en-US', { style: 'currency', 
                currency: 'USD',
              currencyDisplay: 'narrowSymbol'}).format(response.pur_val);
              var amount3=amount3.replace(/[$]/g,''); 
              $('#amount3').val(amount3);
              
              var last_pur_rate=new Intl.NumberFormat(
              'en-US', { style: 'currency', 
                currency: 'USD',
              currencyDisplay: 'narrowSymbol'}).format(response.lp_rate);
              var last_pur_rate=last_pur_rate.replace(/[$]/g,'');
              $('#last_pur_rate').val(last_pur_rate);
              var total=new Intl.NumberFormat(
              'en-US', { style: 'currency', 
                currency: 'USD',
              currencyDisplay: 'narrowSymbol'}).format(response.cost_sales);
              var total=total.replace(/[$]/g,''); 
              $('#total').val(total);
          
          },
          error: function(e) 
          {
            console.log(e);
            alert("Contact IT Department");
          }
    });
    //update
    $("#item_form").on("submit", function (e) {  
      if ($("#item_form").valid())
      { 
        // $("#ajax-loader").show();
        e.preventDefault();
        var formData = new FormData(this);
       var company_code= $('#company_code').val();
       var division_code= $('#division').val();
       var product_code= $('#product_code').val();
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
        formData.append('company_code',company_code);
        // formData.append('control_code',control_code);
        formData.append('division',division_code);
        formData.append('product_code',product_code);
        formData.append('action','update');
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
                          $.get('setup_files/item_list.php',function(data,status){
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
      }
    });
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
$("#item_setup_breadcrumb").on("click", function () {
    $.get('setup_files/item_list.php', function(data,status){
        $("#content").html(data);
    });
});
$("#edit_item_breadcrumb").on("click", function () {
    $.get('setup_files/edit_item.php', function(data,status){
        $("#content").html(data);
    });
});
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