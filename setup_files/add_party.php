<?php
session_start();
?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    <h1 style="margin-top:-10px;font-size:16px" >Customer Information</h1>
                    </div>
                    <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right" style="margin-top:-15px;font-size:16px" >
                        <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                        <li class="breadcrumb-item active"><button class="btn btn-sm" id="setup_breadcrumb">Setup</button></li>
                        <li class="breadcrumb-item"><button class="btn btn-sm" id="party_setup_breadcrumb">Customer Setup</button></li>
                        <li class="breadcrumb-item"><button class="btn btn-sm" id="add_party_breadcrumb">Add Customer</button></li>
                    </ol>
                    </div>   
                </div>
            </div>
        </section>

        
        <!-- Main content -->
        <section class="content" style="margin-top:-30px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px">
                            <div class="card-body" style="">
                                <div class="container">
                                    <form method="post" id="party_form" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px">
                                        <?php include '../display_message/display_message.php'?>
                                        <div class="row" style="margin-top:-18px">
                                            <span id="msg" style="color: red;font-size: 13px;"></span>
                                            <input type="hidden" name="form_no" id="form_no" value=""> 
                                            <div class="col-lg-12"  style="border:4px solid #1e293b; padding-top:8px; box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px"  >
                                                <div class="row">
                                                    <div class="col-md-1 form-group">
                                                        <label for="">Co Code:<span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-2">    
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                                            </div>
                                                            <select class="form-control  form-control-sm   js-example-basic-single change" id="company_code" name="company_code">
                                                            </select>                                   
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-1 form-group">  
                                                        <label for="">Co Name:</label>
                                                    </div>
                                                    <div class="col-sm-2 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                                            </div>
                                                            <input  type="text" name="company_name" id="company_name" style="background-color:#ccd4e1;font-weight:bold;" tabindex="-1" class="form-control form-control-sm" placeholder="Company Name" readonly >
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-1 form-group">  
                                                        <label for="">Division:<span style="color:red">*</span></label>
                                                    </div>    
                                                    <div class="col-sm-2 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                                            </div>
                                                            <select class="form-control form-control-sm  js-example-basic-single" id="division" name="division">
                                                            </select>                                   
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 form-group">  
                                                        <label for="">Name:</label>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                                            </div>
                                                            <input  type="text" name="division_name" style="background-color:#ccd4e1;font-weight:bold;" id="division_name" class="form-control form-control-sm" placeholder="Division Name" tabindex="-1" readonly >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 form-group">  
                                                        <label for="">Control:<span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                                            </div>
                                                            <select name="control_code" class="form-control form-control-sm" id="control_code" >
                                                                <option value="610">610</option>
                                                                <option value="650">650</option>
                                                            </select>                                
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-1 form-group">  
                                                        <label for="">Party:<span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-sm-2 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                                            </div> 
                                                            <input maxlength="3" min="1" max="999" style="border-radius:4px; background-color:#ccd4e1;font-weight:bold;" type="number" name="party_code" id="party_code" readonly class="form-control form-control-sm" placeholder="Party Code" tabindex="-1" >
                                                            <p  id="msg1" style="display:none;padding-top:80px;color: red;font-size: 13px;"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 form-group">  
                                                        <label for="">Name:</label>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                                            </div>
                                                            <input  type="text" name="party_name" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" id="party_name" class="form-control form-control-sm" placeholder="Party Name"  >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 form-group">  
                                                        <label for="">A/c Code :</label>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                                            </div>
                                                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="15" type="number" name="party_account" style="background-color:#ccd4e1;font-weight:bold;" id="party_account" class="form-control form-control-sm" placeholder="Party Account" tabindex="-1" readonly >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 form-group">  
                                                        <label for="">Address:<span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-sm-2 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                                            </div>
                                                            <textarea rows="1" name="address" id="address" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" class="form-control form-control-sm" placeholder="Address" ></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 form-group">  
                                                        <label for="">Billing:</label>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                                            </div>
                                                            <input  type="text" name="bill_name" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" id="bill_name" class="form-control form-control-sm" placeholder="Billing Name"  >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 form-group">  
                                                        <label for="">Address:<span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                                            </div>
                                                            <textarea rows="1" name="bill_address" id="bill_address" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" class="form-control form-control-sm" placeholder="Billing Address" ></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-1 form-group">  
                                                        <label for="">Person:</label>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                                            </div>
                                                            <input type="text" name="person" id="person" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" class="form-control form-control-sm" placeholder="Person Name"  >
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-1 form-group">  
                                                        <label for=""> PhoneNo:<span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                            </div>
                                                            <input type="text" name = "contact_no" id="contact_no" placeholder="xxxx-xxx-xxxx" value="" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" class="form-control form-control-sm" data-inputmask="'mask': ['9999-999-9999', '+99-999-999-9999']" data-mask="" inputmode="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-1 form-group">  
                                                        <label for="">Email:<span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-5 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="far fa-envelope"></i></span>
                                                            </div>
                                                            <input type="email" id="email" name="email" class="form-control form-control-sm" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Enter Valid Email Address">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-1 form-group">  
                                                        <label for="">CNIC:<span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-2 orm-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="far fa-id-card"></i></span>
                                                            </div>
                                                            <input type="text" name = "cnic_no" id="cnic_no" placeholder="xxxxx-xxxxxxx-x" value="" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" class="form-control form-control-sm" data-inputmask="&quot;mask&quot;: &quot;99999-9999999-9&quot;" data-mask="" inputmode="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-1 form-group">  
                                                        <label for="">GST #:</label>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                                            </div>
                                                            <input maxlength="30" type="number" name="gst_no" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" id="gst_no" class="form-control form-control-sm" placeholder="GST" >
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-1 form-group">  
                                                        <label for="">NTN No:</label>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                                            </div>
                                                            <input maxlength="30" type="text" name="ntn_no" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" id="ntn_no" class="form-control form-control-sm" placeholder="NTN Number 1-9" >
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-1 form-group">  
                                                        <label for="">Zone:<span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                                            </div>
                                                            <select class="form-control form-control-sm  js-example-basic-single" id="zone_code" name="zone_code">
                                                            </select>                                   
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-1 form-group">  
                                                        <label for="">Name:</label>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                                            </div>
                                                            <textarea  type="text" name="zone_name" id="zone_name" style="background-color:#ccd4e1;font-weight:bold;" class="form-control form-control-sm" placeholder="Zone Name" rows="1" tabindex="-1" readonly ></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-1 form-group">  
                                                        <label for="">City:<span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                                            </div>
                                                            <select class="form-control form-control-sm  js-example-basic-single" id="city_code" name="city_code">
                                                            </select>                                   
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-1 form-group">  
                                                        <label for="">Name:</label>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                                            </div>
                                                            <textarea rows="1"  type="text" name="city_name" style="background-color:#ccd4e1;font-weight:bold;" id="city_name" class="form-control form-control-sm" placeholder="City Name" tabindex="-1" readonly ></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2 form-group"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 pl-3 pt-2"  style="border:4px solid #1e293b; margin-top:4px;border-right:4px solid #1e293b; box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px">
                                                <div class="row">
                                                    <div class="col-md-1"> 
                                                        <label for="">Salesman:<span style="color:red">*</span></label>
                                                    </div>  
                                                    <div class="col-sm-2 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                                            </div>
                                                            <select class="form-control form-control-sm  js-example-basic-single" id="salesman_code" name="salesman_code">
                                                            </select>                                   
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1"> 
                                                        <label for="">Name:</label>
                                                    </div>
                                                    <div class="col-sm-2 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                                            </div>
                                                            <input  type="text" name="salesman_name" style="background-color:#ccd4e1;font-weight:bold;" id="salesman_name" class="form-control form-control-sm" placeholder="Salesman Name" tabindex="-1" readonly >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1"> 
                                                        <label for="">Account:<span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-sm-2 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                                            </div>
                                                            <select class="form-control form-control-sm  js-example-basic-single" id="account_code" name="account_code">
                                                            </select>                                   
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1"> 
                                                        <label for="">Name:</label>
                                                    </div>
                                                    <div class="col-sm-2 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                                            </div>
                                                            <input  type="text" name="account_name" id="account_name" style="background-color:#ccd4e1;font-weight:bold;" class="form-control form-control-sm" placeholder="Account Name" tabindex="-1" readonly >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label for="">Druglic#:</label>
                                                    </div>
                                                    <div class="col-sm-2 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                                            </div>
                                                            <input maxlength="30" type="number" name="druglic_no" id="druglic_no"style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" class="form-control form-control-sm" placeholder="Druglic No" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label for="">Date:</label><span style="color:red;">*</span>
                                                    </div>
                                                    <div class="col-sm-2 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                            </div>
                                                            <input type="date" name="druglic_date" id="druglic_date" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" class="form-control form-control-sm" value="<?php echo date('Y-m-d'); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label for="">Name:</label>
                                                    </div>
                                                    <div class="col-sm-2 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                                            </div>
                                                            <input  type="text" name="druglic_name" id="druglic_name" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" class="form-control form-control-sm" placeholder="Druglic Name" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label for="">Customer:<span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-sm-2 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                                            </div>
                                                            <select name="cus_type" class="form-control form-control-sm" id="cus_type" >
                                                                <option value="Distb">Distb</option>
                                                                <option value="RT">RT</option>
                                                                <option value="Manf">Manf</option>
                                                                <option value="Importer">Importer</option>
                                                                <option value="End Consumer">End Consumer</option>
                                                            </select>                                
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label for="">Cr Days:</label>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                                            </div>
                                                            <input  type="number" name="cr_days" id="cr_days" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" class="form-control form-control-sm" placeholder="CR Days" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label for="">Y/N:</label><span style="color:red;">*</span>
                                                    </div>
                                                    <div class="col-sm-2 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="far fa-file-check"></i></span>
                                                            </div>
                                                            <select name="days_check" id="days_check" class="form-control form-control-sm">
                                                            <option value="Y">Yes</option>
                                                            <option value="N">No</option>                          
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1"> 
                                                        <label for="">Cr Limit:</label>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                                            </div>
                                                            <input  type="number" name="cr_limits" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" id="cr_limits" class="form-control form-control-sm" placeholder="CR Limit" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label for="">Y/N:</label><span style="color:red;">*</span>
                                                    </div>
                                                    <div class="col-sm-2 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="far fa-file-check"></i></span>
                                                            </div>
                                                            <select name="limit_check" id="limit_check" class="form-control form-control-sm">
                                                            <option value="Y">Yes</option>
                                                            <option value="N">No</option>                          
                                                            </select>
                                                        </div>
                                                    </div> 
                                                    <div style="border:4px solid #1e293b;margin:4px 4px 4px -4px;" class="col-lg-12 pt-1">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <label for="">Open Dr:</label>
                                                            </div>
                                                            <div class="col-md-2 form-group">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                                                    </div>
                                                                    <input style="text-align:right;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" pattern="[a-zA-Z0-9 ,._-]{1,}"  maxlength="30" type="text" name="debit" id="debit" class="form-control form-control-sm" placeholder="Opening Debit" > 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label for="">Open Cr:</label>
                                                            </div>
                                                            <div class="col-md-2 form-group">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                                                    </div>
                                                                    <input style="text-align:right;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="credit" id="credit" class="form-control form-control-sm" placeholder="Opening Credit" > 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label for="">Open Dr 2018:</label>
                                                            </div>
                                                            <div class="col-md-2 form-group">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                                                    </div>
                                                                    <input style="text-align:right;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" pattern="[a-zA-Z0-9 ,._-]{1,}"  maxlength="30" type="text" name="debit_18" id="debit_18" class="form-control form-control-sm" placeholder="Opening Debit 2018" > 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label for="">Opening Cr 2018:</label>
                                                            </div>
                                                            <div class="col-md-2 form-group">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                                                    </div>
                                                                    <input style="text-align:right;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="credit_18" id="credit_18" class="form-control form-control-sm" placeholder="Opening Credit 2018" > 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label for="">Limit Utilised:</label>
                                                            </div>
                                                            <div class="col-md-2 form-group">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                                                    </div>
                                                                    <input style="text-align:right;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="limit_utilized" id="limit_utilized" class="form-control form-control-sm" placeholder="Limit Utilized" > 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label for="">Entries Debit:</label>
                                                            </div>
                                                            <div class="col-md-2 form-group">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                                                    </div>
                                                                    <input style="text-align:right;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" pattern="[a-zA-Z0-9 ,._-]{1,}"  maxlength="30" type="text" name="entries_debit" id="entries_debit" class="form-control form-control-sm" placeholder="Entries Debit" > 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <label for="">Enter Cr:</label>
                                                            </div>
                                                            <div class="col-md-2 form-group">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                                                    </div>
                                                                    <input style="text-align:right;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="entries_credit" id="entries_credit" class="form-control form-control-sm" placeholder="Entries Credit" > 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <label for="">Limit Bal:</label>
                                                            </div>
                                                            <div class="col-md-2 form-group">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                                                    </div>
                                                                    <input style="text-align:right;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="limit_balance" id="limit_balance" class="form-control form-control-sm" placeholder="Limit Balance" > 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <label for="">Close Dr:</label>
                                                            </div>
                                                            <div class="col-md-2 form-group">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                                                    </div>
                                                                    <input style="text-align:right;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" pattern="[a-zA-Z0-9 ,._-]{1,}"  maxlength="30" type="text" name="closing_debit" id="closing_debit" class="form-control form-control-sm" placeholder="Closing Debit" > 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <label for="">Close Cr:</label>
                                                            </div>
                                                            <div class="col-md-2 form-group">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                                                    </div>
                                                                    <input style="text-align:right;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="closing_credit" id="closing_credit" class="form-control form-control-sm" placeholder="Closing Credit" > 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button Type="submit" class="btn btn-primary " id="add" style="width:100%; color:#fff;">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
      <!-- /.content -->
</div>
<style>
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
    .select2-container{
        width:74% !important;
    }
    .form-group{
        margin-bottom:4px !important
    }

    /* input[type="text"], textarea{

        background-image: linear-gradient(to left,#8F00F8,#8F00F8);


    } */
    .select2-selection , select {
        background-image: linear-gradient(to left,#b7edea,#b7edea);  
    } 
    select{

    }
    input:focus,select:focus,textarea:focus,.select2-selection:focus, .add:focus, #submit:focus, .remove:focus{
-moz-box-shadow: 0 0 8px rgba(82,168,236,.6);
box-shadow: 0 0 8px orangered !important;
border: 3px solid black!important;}
    input ::placeholder{
        color: red !important;
        opacity: 100;
    }
    input , select , textarea{
        color:#fff;
    }

</style>
<!-- ./wrapper -->


<div class="modal-backdrop fade show" id="backdrop" style="display: none;"></div>

<?php

include '../includes/security.php';
?>

<script>
// $(function(){
//   $("#pushsidebar").click(function(){
//      $('.select2-container').css("width", '80%');
//   });
// });
$(document).ready(function(){
    $('#company_code').focus();
    $('#company_code').select2('focus');
      $("#party_form").on('change','#credit',function(){
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
      $("#party_form").on('change','#debit',function(){
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
      $("#party_form").on('change','#credit_18',function(){
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
      $("#party_form").on('change','#debit_18',function(){
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
      $("#party_form").on('change','#entries_credit',function(){
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
      $("#party_form").on('change','#entries_debit',function(){
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
      $("#party_form").on('change','#closing_credit',function(){
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
      $("#party_form").on('change','#closing_debit',function(){
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



      $("#party_form").on('change','#limit_utilized',function(){
        var limit_utilized=$('#limit_utilized').val();
        if(limit_utilized==''){
          limit_utilized=0;
        }else{
          limit_utilized = limit_utilized.replaceAll(',','');
          var limit_utilized=new Intl.NumberFormat(
          'en-US', { style: 'currency', 
            currency: 'USD',
          currencyDisplay: 'narrowSymbol'}).format(limit_utilized);
          var limit_utilized=limit_utilized.replace(/[$]/g,'');
          $('#limit_utilized').val(limit_utilized);
        }
      });



      $("#party_form").on('change','#limit_balance',function(){
        var limit_balance=$('#limit_balance').val();
        if(limit_balance==''){
          limit_balance=0;
        }else{
          limit_balance = limit_balance.replaceAll(',','');
          var limit_balance=new Intl.NumberFormat(
          'en-US', { style: 'currency', 
            currency: 'USD',
          currencyDisplay: 'narrowSymbol'}).format(limit_balance);
          var limit_balance=limit_balance.replace(/[$]/g,'');
          $('#limit_balance').val(limit_balance);
        }
      });





});

$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      // alert( "Form successful submitted!" );
    }
  });
  $('#party_form').validate({
    rules: {
        company_code: {
        required: true,
      },
      control_code: {
        required: true,
      },
      division: {
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
      cus_type: {
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
    // $("#ajax-loader").show();
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
            console.log(data);
            $('#division').html('');
            $('#division').append('<option value="" selected disabled>Select Division</option>');
            $.each(data, function(key, value){
                $('#division').append('<option data-name="'+value["div_name"]+'"  data-code="'+value["div_code"]+'" value="'+value["div_code"]+'">'+value["div_code"]+' - '+value["div_name"]+'</option>');
            });
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    }); 
    // zone code dropdown
    $.ajax({
        url: 'api/setup/party_api.php',
        type: 'POST',
        data: {action: 'zone_code'},
        dataType: "json",
        success: function(data){
            // console.log(data);
            $('#zone_code').html('');
            $('#zone_code').append('<option value="" selected disabled>Select Zone</option>');
            $.each(data, function(key, value){
                $('#zone_code').append('<option data-name="'+value["zone_name"]+'"  data-code="'+value["zone_code"]+'" value="'+value["zone_code"]+'">'+value["zone_code"]+' - '+value["zone_name"]+'</option>');
            });
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    }); 
    // city code dropdown
    $.ajax({
        url: 'api/setup/party_api.php',
        type: 'POST',
        data: {action: 'city_code'},
        dataType: "json",
        success: function(data){
            // console.log(data);
            $('#city_code').html('');
            $('#city_code').append('<option value="" selected disabled>Select City</option>');
            $.each(data, function(key, value){
                $('#city_code').append('<option data-name="'+value["city_name"]+'"  data-code="'+value["city_code"]+'" value="'+value["city_code"]+'">'+value["city_code"]+' - '+value["city_name"]+'</option>');
            });
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
    // account code dropdown
    $.ajax({
        url: 'api/setup/party_api.php',
        type: 'POST',
        data: {action: 'account_code'},
        dataType: "json",
        success: function(data){
            // console.log(data);
            $('#account_code').html('');
            $('#account_code').append('<option value="" selected disabled>Select Account</option>');
            $.each(data, function(key, value){
                $('#account_code').append('<option data-name="'+value["descr"]+'"  data-code="'+value["account_code"]+'" value="'+value["account_code"]+'">'+value["account_code"]+' - '+value["descr"]+'</option>');
            });
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
    // salesman code dropdown
    $.ajax({
        url: 'api/setup/party_api.php',
        type: 'POST',
        data: {action: 'salesman_code'},
        dataType: "json",
        success: function(data){
            // console.log(data);
            $('#salesman_code').html('');
            $('#salesman_code').append('<option value="" selected disabled>Select Salesman</option>');
            $.each(data, function(key, value){
                $('#salesman_code').append('<option data-name="'+value["sman_name"]+'"  data-code="'+value["sman_code"]+'" value="'+value["sman_code"]+'">'+value["sman_code"]+' - '+value["sman_name"]+'</option>');
            });
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
    
    $("#ajax-loader").hide();
    $("#party_form").on('change','#salesman_code',function(){
          var salesman_name=$('#salesman_code').find(':selected').attr("data-name");
          var salesman_code=$('#salesman_code').find(':selected').attr("data-code");
          $('#select2-salesman_code-container').html(salesman_code);
          $('#salesman_name').val(salesman_name); 
    });
    $("#party_form").on('change','#account_code',function(){
          var account_name=$('#account_code').find(':selected').attr("data-name");
          var account_code=$('#account_code').find(':selected').attr("data-code");
          $('#select2-account_code-container').html(account_code);
          $('#account_name').val(account_name); 
    });
    $("#party_form").on('change','#city_code',function(){
          var city_name=$('#city_code').find(':selected').attr("data-name");
          var city_code=$('#city_code').find(':selected').attr("data-code");
          $('#select2-city_code-container').html(city_code);
          $('#city_name').val(city_name); 
    });
    $("#party_form").on('change','#zone_code',function(){
          var zone_name=$('#zone_code').find(':selected').attr("data-name");
          var zone_code=$('#zone_code').find(':selected').attr("data-code");
          $('#select2-zone_code-container').html(zone_code);
          $('#zone_name').val(zone_name); 
    });
    $("#party_form").on('change','#company_code',function(){
          var company_name=$('#company_code').find(':selected').attr("data-name");
          var company_code=$('#company_code').find(':selected').attr("data-code");
          $('#select2-company_code-container').html(company_code);
          $('#company_name').val(company_name); 
    });
    // on change control code
    $("#party_form").on('change','#division',function(){
          var division_name=$('#division').find(':selected').attr("data-name");
          console.log(division_name);
          var division_code=$('#division').find(':selected').attr("data-code");
          $('#select2-division-container').html(division_code);
          $('#division_name').val(division_name);
    });
    
    // $("#party_code").change(function(){
    //     $("#ajax-loader").show();
    //     var party_code = $("#party_code").val();
    //     var control_code = $("#control_code").val();
    //     // console.log(party_code);
    //     var division_code=$("#division").val();
    //     var company_code=$("#company_code").val();
    //     // console.log(division_code);
        
    //     $("#msg1").html('');
    //     $.ajax({
    //       url: 'api/setup/party_api.php',
    //       type: 'POST',
    //       data: {action:'check_party_code',party_code:party_code,control_code:control_code,company_code:company_code,division_code:division_code},
    //       success: function (response) {
    //         $("#ajax-loader").hide();
    //         // console.log(response);
    //         if(response.status == "0"){
    //           $("#party_code").css("background-color", "pink");
    //         //   $("#msg1").css('display','');
    //           $("#msg1").text(response.message);
    //           $("#party_code").attr('placeholder',party_code);
    //           $("#party_code").val("");
    //         }else{
    //           $("#party_code").css("background-color", "");
    //           $("#msg1").text("");
    //         }
    //       },
    //       error: function(e) 
    //       {
    //         console.log(e);
    //         alert("Contact IT Department");
    //       }   
        
    //     })
    //     if(party_code != null || division_code != null || control_code != null){
    //         if(party_code.length== 3){
    //             party_code=party_code;
    //         }else if(party_code.length== 2){
    //             party_code=0+party_code;
    //             // console.log(party_code);
    //         }
    //         else if(party_code.length== 1)
    //         {
    //             party_code='00'+party_code;
    //         }
    //         else{
    //             // party_code=0+0+party_code;
    //         }
    //         if(division_code.length == 3){
    //             division_code='0'+division_code;
    //         }else if(division_code.length == 2){
    //             division_code='00'+division_code;
    //         }else if(division_code.length == 1){
    //             division_code='000'+division_code;
    //         }
    //         var party_account=control_code+division_code+party_code;
    //         $('#party_account').val(party_account);
    //     }
    // });

    $("#division").change(function(){
        // alert('sahi hy');
        $("#ajax-loader").show();
        var party_code = $("#party_code").val();
        var control_code = $("#control_code").val();
        // console.log(party_code);
        var division_code=$("#division").val();
        var company_code=$("#company_code").val();
        // console.log(division_code);
        
        $("#msg1").html('');
        $.ajax({
          url: 'api/setup/party_api.php',
          type: 'POST',
          data: {action:'check_party_code',party_code:party_code,control_code:control_code,company_code:company_code,division_code:division_code},
          success: function (response) {
            $("#ajax-loader").hide();
            console.log(response);
            // if(response.status == "0"){
            //   $("#party_code").css("background-color", "pink");
            $('#party_code').val(response.party_code);
            // //   $("#msg1").css('display','');
            //   $("#msg1").text(response.message);
            //   $("#party_code").attr('placeholder',party_code);
            //   $("#party_code").val("");
            // }else{
            // //   $("#party_code").css("background-color", "transap");
            //   $("#msg1").text("");
            // }
          
        var party_code = response.party_code;
        // alert(party_code);
        if(party_code != null || division_code != null || control_code != null){
            if(party_code.length== 3){
                party_code=party_code;
            }else if(party_code.length== 2){
                party_code=0+party_code;
                // console.log(party_code);
            }
            else if(party_code.length== 1)
            {
                party_code='00'+party_code;
            }
            else{
                // party_code=0+0+party_code;
            }
            if(division_code.length == 3){
                division_code='0'+division_code;
            }else if(division_code.length == 2){
                division_code='00'+division_code;
            }else if(division_code.length == 1){
                division_code='000'+division_code;
            }
            var party_account=control_code+division_code+party_code;
            $('#party_account').val(party_account);
        }
        },
          error: function(e) 
          {
            console.log(e);
            alert("Contact IT Department");
          }   
        
        });
    });

    $("#control_code").change(function(){
        // alert('sahi hy');
        $("#ajax-loader").show();
        var party_code = $("#party_code").val();
        var control_code = $("#control_code").val();
        // console.log(party_code);
        var division_code=$("#division").val();
        var company_code=$("#company_code").val();
        // console.log(division_code);
        
        $("#msg1").html('');
        $.ajax({
          url: 'api/setup/party_api.php',
          type: 'POST',
          data: {action:'check_party_code',party_code:party_code,control_code:control_code,company_code:company_code,division_code:division_code},
          success: function (response) {
            $("#ajax-loader").hide();
            console.log(response);
            // if(response.status == "0"){
            //   $("#party_code").css("background-color", "pink");
            $('#party_code').val(response.party_code);
            // //   $("#msg1").css('display','');
            //   $("#msg1").text(response.message);
            //   $("#party_code").attr('placeholder',party_code);
            //   $("#party_code").val("");
            // }else{
            // //   $("#party_code").css("background-color", "transap");
            //   $("#msg1").text("");
            // }
          
        var party_code = response.party_code;
        // alert(party_code);
        if(party_code != null || division_code != null || control_code != null){
            if(party_code.length== 3){
                party_code=party_code;
            }else if(party_code.length== 2){
                party_code=0+party_code;
                // console.log(party_code);
            }
            else if(party_code.length== 1)
            {
                party_code='00'+party_code;
            }
            else{
                // party_code=0+0+party_code;
            }
            if(division_code.length == 3){
                division_code='0'+division_code;
            }else if(division_code.length == 2){
                division_code='00'+division_code;
            }else if(division_code.length == 1){
                division_code='000'+division_code;
            }
            var party_account=control_code+division_code+party_code;
            $('#party_account').val(party_account);
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
      $("#party_form").on("submit", function (e) {  
        if ($("#party_form").valid())
        { 
          $("#ajax-loader").show();
          e.preventDefault();
          var formData = new FormData(this);
          formData.append('action','insert');
          $.ajax({
                  url: 'api/setup/party_api.php',
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
                            if(status == 1){
                                //  $("#msg").html(message);
                                $.get('setup_files/add_party.php',function(data,status){
                                    $('#content').html(data);
                                });
                            }
                            else{
                                //  $("#msg").html(message);
                                $.get('setup_files/add_party.php',function(data,status){
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
$("#add_party_breadcrumb").on("click", function () {
    $.get('setup_files/add_party.php', function(data,status){
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