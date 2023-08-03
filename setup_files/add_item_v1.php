<?php
session_start();
?>
<style>
select{
      width:82% !important;
      /* border: 1px solid #d9dbde */
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
        margin-top: 1%;
        padding-bottom: 1%;
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
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap");




h2 {
  color: black;
  font-size: 34px;
  position: relative;
  text-transform: uppercase;
  /* -webkit-text-stroke: 0.3vw #f7f7fe; */
  font-weight:600
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
  background-color: #007bff;
  color: #ffffff;
  text-align: left;
  font-weight: bold;
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
  border-bottom: 2px solid #009879;
}

.content-table tbody tr.active-row {
  font-weight: bold;
  color: #009879;
}


</style>
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Item Information</h1>
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
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <form method="post" id="item_form">
                                <?php include '../display_message/display_message.php'?>
                                <span id="msg" style="color: red;font-size: 13px;"></span>
                                <!-- <input type="hidden" name="form_no" id="form_no" value=""> -->
                                <div class="row">
                                    <div class="col-sm-3 form-group">
                                        <label for="">Company Code :<span style="color:red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                            </div>
                                            <select class="form-control form-control-sm  js-example-basic-single" id="company_code" name="company_code">
                                            </select>                                   
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Company Name :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <input maxlength="30" type="text" name="company_name" id="company_name" class="form-control form-control-sm" placeholder="Company Name" readonly >
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Division :<span style="color:red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                            </div>
                                            <select class="form-control form-control-sm  js-example-basic-single" id="division" name="division">
                                            </select>                                   
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Division Name :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <input maxlength="30" type="text" name="division_name" id="division_name" class="form-control form-control-sm" placeholder="Division Name" readonly >
                                        </div>
                                    </div>
                                    <!-- <div class="col-sm-3 form-group">
                                        <label for="">Control Code :<span style="color:red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                            </div>
                                            <select name="control_code" class="form-control form-control-sm" id="control_code" >
                                                <option value="610">610</option>
                                                <option value="650">650</option>
                                            </select>                                
                                        </div>
                                    </div> -->
                                    <div class="col-sm-3 form-group">
                                        <label for="">Item Code :<span style="color:red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                            </div> 
                                            <input maxlength="3" min="1" max="999" type="number" name="item_code" id="item_code" class="form-control form-control-sm" placeholder="Item Code" >
                                            <p  id="msg1" style="display:none;padding-top:80px;color: red;font-size: 13px;"></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Item Name :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <input maxlength="30" type="text" name="item_name" id="item_name" class="form-control form-control-sm" placeholder="Item Name"  >
                                        </div>
                                    </div>
                                    <!-- <div class="col-sm-3 form-group">
                                        <label for="">Party Account Code :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                            </div>
                                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="15" type="number" name="party_account" id="party_account" class="form-control form-control-sm" placeholder="Party Account" readonly >
                                        </div>
                                    </div> -->
                                    <div class="col-sm-3 form-group">
                                        <label for="">Sale Name :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <input maxlength="30" type="text" name="sale_name" id="sale_name" class="form-control form-control-sm" placeholder="Sale Name"  >
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Sale Name2 :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <input maxlength="30" type="text" name="sale_name2" id="sale_name2" class="form-control form-control-sm" placeholder="Sale Name 2"  >
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Item Detail :<span style="color:red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                            </div>
                                            <textarea rows="1" name="item_detail" id="item_detail" class="form-control form-control-sm" placeholder="Item Detail" ></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="">Item Codes :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                            </div>
                                            <input style="text-align:center;" pattern="[0-9 ,-]{1,}"  tabindex="-1" maxlength="30" type="text" name="item_codes" id="item_codes" class="form-control form-control-sm" placeholder="Item Codes" readonly > 
                                        </div>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="">Item Pur Code :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                            </div>
                                            <input style="text-align:right;" pattern="[0-9]{1,}"  tabindex="-1" maxlength="30" type="text" name="item_pur_code" id="item_pur_code" class="form-control form-control-sm" placeholder="Item Purchase Code" readonly> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="">Item Sale Code :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                            </div>
                                            <input style="text-align:right;" pattern="[0-9]{1,}"  tabindex="-1" maxlength="30" type="text" name="item_sale_code" id="item_sale_code" class="form-control form-control-sm" placeholder="Item Sale Code" readonly> 
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Generic Code :<span style="color:red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <select class="form-control form-control-sm  js-example-basic-single" id="generic_code" name="generic_code">
                                            </select>                                   
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Generic Name :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <input maxlength="30" type="text" name="generic_name" id="generic_name" class="form-control form-control-sm" placeholder="Generic Name" readonly >
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Product Code :<span style="color:red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <select class="form-control form-control-sm  js-example-basic-single" id="product_code" name="product_code">
                                            </select>                                   
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Product Name :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <input maxlength="30" type="text" name="product_name" id="product_name" class="form-control form-control-sm" placeholder="Product Name" readonly >
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">U/M Code :<span style="color:red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <select class="form-control form-control-sm  js-example-basic-single" id="um_code" name="um_code">
                                            </select>                                   
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">U/M Name :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <input maxlength="30" type="text" name="um_name" id="um_name" class="form-control form-control-sm" placeholder="U/M Name" readonly >
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Purchase Gl Code :<span style="color:red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <select class="form-control form-control-sm  js-example-basic-single" id="pur_gl_code" name="pur_gl_code">
                                            </select>                                   
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Purchase Gl Name :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <input maxlength="30" type="text" name="pur_gl_name" id="pur_gl_name" class="form-control form-control-sm" placeholder="Purchase GL Name" readonly >
                                        </div>
                                    </div>
                                    <div class="col-sm-1 form-group"></div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Sale Gl Name :<span style="color:red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <select class="form-control form-control-sm  js-example-basic-single" id="sale_gl_code" name="sale_gl_code">
                                            </select>                                   
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Sale Gl Name :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <input maxlength="30" type="text" name="sale_gl_name" id="sale_gl_name" class="form-control form-control-sm" placeholder="Sale GL Name" readonly >
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Purchase Mode :<span style="color:red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                            </div>
                                            <select name="purchase_mode" class="form-control form-control-sm" id="purchase_mode" >
                                                <option value="IMPORT">IMPORT</option>
                                                <option value="LOCAL">LOCAL</option>
                                            </select>                                
                                        </div>
                                    </div>
                                    <div class="col-sm-1 form-group"></div>
                                </div>
                                <a href="#down" ><button style="background:#4b545c" type="button" class="btn btn-floating btn-lg"  id="btn-back-to-top">
                                    <i style="color:white" class="fas fa-arrow-down"></i>
                                </button></a><br><br>
                                <div class=" text-center"><h2 data-text="More Details..">More Details...</h2></div>

                                <div class="row" id="down">
                                    <div class="col-sm-3 form-group">
                                        <label for="">Packing :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <input maxlength="30" type="text" name="packing" id="packing" class="form-control form-control-sm" placeholder="Packing" readonly >
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Brand :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <input maxlength="30" type="text" name="brand" id="brand" class="form-control form-control-sm" placeholder="Packing" readonly >
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Origin :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <input maxlength="30" type="text" name="origin" id="origin" class="form-control form-control-sm" placeholder="Origin" readonly >
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">HS Code :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <input maxlength="30" type="text" name="hs_code" id="hs_code" class="form-control form-control-sm" placeholder="HS Code" readonly >
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Target/Non-Target :<span style="color:red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                            </div>
                                            <select name="purchase_mode" class="form-control form-control-sm" id="purchase_mode" >
                                                <option value="TARGET">TARGET</option>
                                                <option value="NON_TARGET">NON_TARGET</option>
                                            </select>                                
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Target Qty:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                            </div>
                                            <input maxlength="30" type="number" name="target_qty" id="target_qty" class="form-control form-control-sm" placeholder="Target Quantity" >
                                        </div>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="">Trade Price :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                            </div>
                                            <input style="text-align:right;" pattern="[a-zA-Z0-9 ,._-]{1,}"  tabindex="-1" maxlength="30" type="text" name="trade_price" id="trade_price" class="form-control form-control-sm" placeholder="Trade Price 1" > 
                                        </div>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="">Trade Price 2 :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                            </div>
                                            <input style="text-align:right;" pattern="[a-zA-Z0-9 ,._-]{1,}" tabindex="-1" maxlength="30" type="text" name="trade_price2" id="trade_price2" class="form-control form-control-sm" placeholder="Trade Price 2" > 
                                        </div>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="">Discount Rate :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                            </div>
                                            <input style="text-align:right;" pattern="[a-zA-Z0-9 ,._-]{1,}" tabindex="-1" maxlength="30" type="text" name="discount_rate" id="discount_rate" class="form-control form-control-sm" placeholder="Discount Rate" > 
                                        </div>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="">GST Rate % :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                            </div>
                                            <input style="text-align:right;" pattern="[a-zA-Z0-9 ,._-]{1,}" tabindex="-1" maxlength="30" type="text" name="gst_rate" id="gst_rate" class="form-control form-control-sm" placeholder="GST Rate" > 
                                        </div>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="">Add Rate % :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                            </div>
                                            <input style="text-align:right;" pattern="[a-zA-Z0-9 ,._-]{1,}" tabindex="-1" maxlength="30" type="text" name="add_rate" id="add_rate" class="form-control form-control-sm" placeholder="Add Rate" > 
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Min Level :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                            </div>
                                            <input maxlength="30" type="number" name="min_level" id="min_level" class="form-control form-control-sm" placeholder="Min Level" >
                                        </div>
                                    </div>
                                    <div class="col-sm-4 form-group"></div>
                                    <div class="col-sm-4 form-group text-center">
                                        <label for="" class="text-center">Max Level :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                            </div>
                                            <input maxlength="30" type="number" name="max_level" id="max_level" class="form-control form-control-sm" placeholder="Max Level" >
                                        </div>
                                    </div>
                                    <div class="col-sm-4 form-group"></div>
                                    <div class="col-sm-2 form-group"></div>
                                    <div class="col-sm-8 form-group">
                                        <table id="example1" class="content-table table-responsive-lg">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Quantity</th>
                                                    <th>Rate</th>
                                                    <th>Value</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr id="main_tr active-row">
                                                    <td>Opening</td>
                                                    <td ><input  style="text-align:right; padding:0 13px 0 0" type="number"  name="" id="quantity1" class="form-control form-control-sm quantity"></td>
                                                    <td ><input  style="text-align:right; padding:0 13px 0 0"  pattern="[0-9 ,._-]{1,}" type="text"  name="" id = "rate1" class="form-control form-control-sm rate"></td>
                                                    <td ><input  style="text-align:right; padding:0 13px 0 0"  pattern="[0-9 ,._-]{1,}" type="text"  name="" id = "amount1" class="form-control form-control-sm amount" readonly></td>
                                                </tr>
                                                <tr id="main_tr active-row">
                                                    <td>Purchase</td>
                                                    <td ><input  style="text-align:right; padding:0 13px 0 0" type="number"  name="" id="quantity2" class="form-control form-control-sm quantity"></td>
                                                    <td ><input  style="text-align:right; padding:0 13px 0 0"  pattern="[0-9 ,._-]{1,}" type="text"  name="" id = "rate2" class="form-control form-control-sm rate"></td>
                                                    <td ><input  style="text-align:right; padding:0 13px 0 0"  pattern="[0-9 ,._-]{1,}" type="text"  name="" id = "amount2" class="form-control form-control-sm amount" readonly></td>
                                                </tr>
                                                <tr id="main_tr active-row">
                                                    <td>Closing</td>
                                                    <td ><input  style="text-align:right; padding:0 13px 0 0" type="number"  name="" id="quantity3" class="form-control form-control-sm quantity"></td>
                                                    <td ><input  style="text-align:right; padding:0 13px 0 0"  pattern="[0-9 ,._-]{1,}" type="text"  name="" id = "rate3" class="form-control form-control-sm rate"></td>
                                                    <td ><input  style="text-align:right; padding:0 13px 0 0"  pattern="[0-9 ,._-]{1,}" type="text"  name="" id = "amount3" class="form-control form-control-sm amount" readonly></td>
                                                </tr>
                                                <tr id="main_tr active-row">
                                                    <td>Last Pur Rate</td>
                                                    <td ><input  style="text-align:right; padding:0 13px 0 0" type="text"  pattern="[0-9 ,._-]{1,}"  name="" id="last_pur_rate" class="form-control form-control-sm last_pur_rate"></td>
                                                    <td style="text-align:right" >Cost Sales</td>
                                                    <td ><input  style="text-align:right; padding:0 13px 0 0"  pattern="[0-9 ,._-]{1,}" type="text"  name="" id = "total" class="form-control form-control-sm total" readonly></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- <div class="col-sm-2 form-group"></div> -->
                                </div>
                                <div class="text-right">
                                    <input type="submit" id="add" class="btn btn-primary" >
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
      control_code: {
        required: true,
      },
      division_code: {
        required: true,
      },
      address: {
        required: true,
      },
      bill_name: {
        required: true,
      },
      bill_address: {
        required: true,
      },
      person: {
        required: true,
      },
      contact_no: {
        required: true,
      },
      email: {
        required: true,
      },
      cnic_no: {
        required: true,
      },
      gst_no: {
        required: true,
      },
      ntn_no: {
        required: true,
      },
      zone_code: {
        required: true,
      },
      city_code: {
        required: true,
      },
      salesman_code: {
        required: true,
      },
      account_code: {
        required: true,
      },
      druglic_no: {
        required: true,
      },
      druglic_date: {
        required: true,
      },
      druglic_name: {
        required: true,
      },
      cus_type: {
        required: true,
      },
      debit: {
        required: true,
      },
      credit: {
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
    $('.js-example-basic-single').select2();
    // company code dropdown
    $.ajax({
      url: 'api/setup/chart_of_account/control_account_api.php',
        type: 'POST',
        data: {action: 'company_code'},
        dataType: "json",
        success: function(response){
            console.log(response);
            $('#company_code').select2();
            $('#company_code').html('');
            $('#company_code').append('<option value="" selected disabled>Select Company</option>');
            $.each(response, function(key, value){
                $('#company_code').append('<option data-name="'+value["co_name"]+'"  data-code="'+value["co_code"]+'" value="'+value["co_code"]+'">'+value["co_code"]+' - '+value["co_name"]+'</option>');
            });
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });  
    // division code dropdown
    $.ajax({
        url: 'api/setup/party_api.php',
        type: 'POST',
        data: {action: 'division_code'},
        dataType: "json",
        success: function(data){
            // console.log(data);
            $('#division').html('');
            $('#division').append('<option value="" selected disabled>Select Division</option>');
            $.each(data, function(key, value){
                $('#division').append('<option data-name="'+value["division_name"]+'"  data-code="'+value["division_code"]+'" value="'+value["division_code"]+'">'+value["division_code"]+' - '+value["division_name"]+'</option>');
            });
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    }); 
    // generic code dropdown
    $.ajax({
        url: 'api/setup/item_api.php',
        type: 'POST',
        data: {action: 'generic_code'},
        dataType: "json",
        success: function(data){
            // console.log(data);
            $('#generic_code').html('');
            $('#generic_code').append('<option value="" selected disabled>Select Generic</option>');
            $.each(data, function(key, value){
                $('#generic_code').append('<option data-name="'+value["gen_name"]+'"  data-code="'+value["gen_code"]+'" value="'+value["gen_code"]+'">'+value["gen_code"]+' - '+value["gen_name"]+'</option>');
            });
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    }); 
    // product code dropdown
    $.ajax({
        url: 'api/setup/item_api.php',
        type: 'POST',
        data: {action: 'product_code'},
        dataType: "json",
        success: function(data){
            // console.log(data);
            $('#product_code').html('');
            $('#product_code').append('<option value="" selected disabled>Select Product</option>');
            $.each(data, function(key, value){
                $('#product_code').append('<option data-name="'+value["product_name"]+'"  data-code="'+value["product_code"]+'" value="'+value["product_code"]+'">'+value["product_code"]+' - '+value["product_name"]+'</option>');
            });
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
    // purchase account_code code dropdown
    $.ajax({
        url: 'api/setup/item_api.php',
        type: 'POST',
        data: {action: 'pur_account_code'},
        dataType: "json",
        success: function(data){
            // console.log(data);
            $('#pur_gl_code').html('');
            $('#pur_gl_code').append('<option value="" selected disabled>Select Account</option>');
            $.each(data, function(key, value){
                $('#pur_gl_code').append('<option data-name="'+value["descr"]+'"  data-code="'+value["account_code"]+'" value="'+value["account_code"]+'">'+value["account_code"]+' - '+value["descr"]+'</option>');
            });
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
    // sale account_code code dropdown
    $.ajax({
        url: 'api/setup/item_api.php',
        type: 'POST',
        data: {action: 'sale_account_code'},
        dataType: "json",
        success: function(data){
            // console.log(data);
            $('#sale_gl_code').html('');
            $('#sale_gl_code').append('<option value="" selected disabled>Select Account</option>');
            $.each(data, function(key, value){
                $('#sale_gl_code').append('<option data-name="'+value["descr"]+'"  data-code="'+value["account_code"]+'" value="'+value["account_code"]+'">'+value["account_code"]+' - '+value["descr"]+'</option>');
            });
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
    // um code dropdown
    $.ajax({
        url: 'api/setup/item_api.php',
        type: 'POST',
        data: {action: 'um_code'},
        dataType: "json",
        success: function(data){
            // console.log(data);
            $('#um_code').html('');
            $('#um_code').append('<option value="" selected disabled>Select UM</option>');
            $.each(data, function(key, value){
                $('#um_code').append('<option data-name="'+value["unit_name"]+'"  data-code="'+value["unit_code"]+'" value="'+value["unit_code"]+'">'+value["unit_code"]+' - '+value["unit_name"]+'</option>');
            });
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
    
    $("#ajax-loader").hide();
    $("#item_form").on('change','#um_code',function(){
          var um_name=$('#um_code').find(':selected').attr("data-name");
          var um_code=$('#um_code').find(':selected').attr("data-code");
          $('#select2-um_code-container').html(um_code);
          $('#um_name').val(um_name); 
    });
    $("#item_form").on('change','#pur_gl_code',function(){
          var pur_gl_name=$('#pur_gl_code').find(':selected').attr("data-name");
          var pur_gl_code=$('#pur_gl_code').find(':selected').attr("data-code");
          $('#select2-pur_gl_code-container').html(pur_gl_code);
          $('#pur_gl_name').val(pur_gl_name); 
    });
    $("#item_form").on('change','#sale_gl_code',function(){
          var sale_gl_name=$('#sale_gl_code').find(':selected').attr("data-name");
          var sale_gl_code=$('#sale_gl_code').find(':selected').attr("data-code");
          $('#select2-sale_gl_code-container').html(sale_gl_code);
          $('#sale_gl_name').val(sale_gl_name); 
    });
    $("#item_form").on('change','#product_code',function(){
          var product_name=$('#product_code').find(':selected').attr("data-name");
          var product_code=$('#product_code').find(':selected').attr("data-code");
          $('#select2-product_code-container').html(product_code);
          $('#product_name').val(product_name); 
    });
    $("#item_form").on('change','#generic_code',function(){
          var generic_name=$('#generic_code').find(':selected').attr("data-name");
          var generic_code=$('#generic_code').find(':selected').attr("data-code");
          $('#select2-generic_code-container').html(generic_code);
          $('#generic_name').val(generic_name); 
    });
    $("#item_form").on('change','#company_code',function(){
          var company_name=$('#company_code').find(':selected').attr("data-name");
          var company_code=$('#company_code').find(':selected').attr("data-code");
          $('#select2-company_code-container').html(company_code);
          $('#company_name').val(company_name); 
    });
    // on change control code
    $("#item_form").on('change','#division',function(){
          var division_name=$('#division').find(':selected').attr("data-name");
          console.log(division_name);
          var division_code=$('#division').find(':selected').attr("data-code");
          $('#select2-division-container').html(division_code);
          $('#division_name').val(division_name);
    });
    
    $("#item_code").change(function(){
        // $("#ajax-loader").show();
        var item_code = $("#item_code").val();
        // console.log(party_code);
        var division_code=$("#division").val();
        var company_code=$("#company_code").val();
        // console.log(division_code);
        
        $("#msg1").html('');
        $.ajax({
          url: 'api/setup/item_api.php',
          type: 'POST',
          data: {action:'check_item_code',item_code:item_code,company_code:company_code,division_code:division_code},
          success: function (response) {
            $("#ajax-loader").hide();
            // console.log(response);
            if(response.status == "0"){
              $("#item_code").css("background-color", "pink");
            //   $("#msg1").css('display','');
              $("#msg1").text(response.message);
              $("#item_code").attr('placeholder',item_code);
              $("#item_code").val("");
            }else{
              $("#item_code").css("background-color", "");
              $("#msg1").text("");
            }
          },
          error: function(e) 
          {
            console.log(e);
            alert("Contact IT Department");
          }   
        
        })
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
    });
});

      //update
      $("#item_form").on("submit", function (e) {  
        if ($("#item_form").valid())
        { 
          // $("#ajax-loader").show();
          e.preventDefault();
          var formData = new FormData(this);
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
    $.get('setup_files/party_setup.php', function(data,status){
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