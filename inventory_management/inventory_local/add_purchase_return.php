<?php
session_start();
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="margin-bottom: -10px;">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h3> Purchase Return </h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                        <li class="breadcrumb-item active"><button class="btn btn-sm" id="il_breadcrumb"> Inventory Local</button></li>
                        <li class="breadcrumb-item"><button class="btn btn-sm" id="po_list_breadcrumb"> Purchase Return</button></li>
                        <li class="breadcrumb-item"><button class="btn btn-sm" id="add_po_local_breadcrumb">Add Purchase Return</button></li>
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
                                <form method="post" id="order_form">
                                    <?php include '../../display_message/display_message.php' ?>
                                    <div class="" id="master_div" style="border: 1px solid gray; border-radius: 5px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.29);">
                                        <div style="padding: 15px 15px 0px 15px;" class="row">
                                            <!-- doc -->
                                            <div class="col-lg-1 col-md-2 form-group">
                                                <label>Doc#:</label>
                                            </div>
                                            <div class="col-lg-2 col-md-4 form-group">
                                                <!-- <label for="">Document Number :</label> -->
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                    </div>
                                                    <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" style="background-color:#ccd4e1;font-weight:bold;" name="doc_no" tabindex="-1" id="doc_no" class="form-control form-control-sm" placeholder="Voucher No" readonly>
                                                </div>
                                            </div>
                                            <!-- order key -->
                                            <!-- <div style="width: 5.295rem;" class="form-group"> -->
                                            <div class="form-group col-lg-1 col-md-2">
                                                <label>OrderKey:</label>
                                            </div>
                                            <!-- <div  style="width: 20rem;" class="col-md-4 form-group"> -->
                                            <div class="col-lg-2 col-md-4 form-group">
                                                <!-- <label for="">Sale Code :</label> -->
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                    </div>
                                                    <input title="Sale Code" style="background-color:#ccd4e1;font-weight:bold;" tabindex="-1" type="text" name="sale_code" id="sale_code" class="form-control form-control-sm" placeholder="Sale Code" readonly>
                                                </div>
                                            </div>
                                            <!-- date -->
                                            <div class="col-lg-1 col-md-2 form-group">
                                                <label>Date:</label>
                                            </div>
                                            <div class="col-lg-2 col-md-4 form-group">
                                                <!-- <label for=""> Date :</label><span style="color:red;">*</span> -->
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                    </div>
                                                    <input type="date" name="voucher_date" id="voucher_date" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px;" class="form-control form-control-sm" value="<?php echo date('Y-m-d'); ?>">
                                                </div>
                                            </div>
                                            <!-- date -->
                                            <div class="col-lg-1 col-md-2 form-group">
                                                <label>Year:</label>
                                            </div>
                                            <div class="col-lg-2 col-md-4 form-group">
                                                <!-- <label for=""> Date :</label><span style="color:red;">*</span> -->
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                    </div>
                                                    <input type="text" tabindex="-1" name="year" id="year" class="form-control form-control-sm" style="background-color:#ccd4e1;font-weight:bold;" min="1900" max="2099" step="1" value="<?php echo date("Y"); ?>" readonly>
                                                </div>
                                            </div>
                                            <!-- company -->
                                            <div class="col-lg-1 col-md-2 form-group">
                                                <label>Company:</label>
                                            </div>
                                            <div class="col-lg-2 col-md-4 form-group">
                                                <!-- <label for="">Company Code :<span style="color:red">*</span></label> -->
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                                    </div>
                                                    <input type="text" name="company_code" id="company_code" style="background-color:#b7edea;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px;" class="form-control form-control-sm" placeholder="Select Company" readonly>
                                                </div>
                                            </div>
                                            <!-- company name -->
                                            <div class="col-lg-3 col-md-6 form-group">
                                                <!-- <label for="inputCompanyName">Company Name :</label><span style="color:red;">*</span> -->
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                    </div>
                                                    <input type="text" style="background-color:#ccd4e1;font-weight:bold;" name="company_name" id="company_name" class="form-control form-control-sm" placeholder="Company Name" readonly tabindex="-1">
                                                </div>
                                            </div>
                                            <!-- CO Ref -->
                                            <div class="col-lg-1 col-md-2 form-group">
                                                <label>CO Ref:</label>
                                            </div>
                                            <div class="col-lg-2 col-md-4 form-group">
                                                <!-- <label for="">CO Ref :</label> -->
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                    </div>
                                                    <input type="text" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px;" name="company_ref" id="company_ref" class="form-control form-control-sm" placeholder="Reference No">
                                                </div>
                                            </div>
                                            <!-- voucher number -->
                                            <div class="col-lg-1 col-md-2 form-group">
                                                <label>Voucher#:</label>
                                            </div>
                                            <div class="col-lg-2 col-md-4 form-group">
                                                <!-- <label for="">Voucher# :</label> -->
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                    </div>
                                                    <input  style="background-color: #ccd4e1;font-weight:bold;;" maxlength="30" type="text" name="v_no" tabindex="-1" id="v_no" class="form-control form-control-sm" placeholder="Voucher no#" readonly>
                                                </div>
                                            </div>
                                            <!-- Party co -->
                                            <div class="col-lg-1 col-md-2 form-group">
                                                <label>Party Co:</label>
                                            </div>
                                            <div class="col-lg-2 col-md-4 form-group">
                                                <!-- <label for="">Party :<span style="color:red">*</span></label> -->
                                                <div class="d-flex">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                                    </div>
                                                    <select style="color: #999; background-color: #b7edea;width: 100%;" name="party" id="party" class="js-example-basic-single party form-control-sm">
                                                        <option value="" style="background-color: #b7edea;" selected disabled>Select Party</option>
                                                    </select>
                                                    <!-- <input maxlength="30" type="text" name="party" id="party" class="form-control form-control-sm" placeholder="Select Party" readonly> -->
                                                </div>
                                            </div>
                                            <!-- Party -->
                                            <div class="col-lg-3 col-md-4 form-group" style="display: none;">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                                    </div>
                                                    <input type="text" style="display: none; background-color: #ccd4e1;font-weight:bold;;" name="name_p_g" id="name_p_g" class="form-control form-control-sm" placeholder="Party Name" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                                    </div>
                                                    <input type="text" name="name_p" id="name_p" title="Select Party for Party Name" style="background-color:#ccd4e1;font-weight:bold;" tabindex="-1" class="form-control form-control-sm" placeholder="Party Name" readonly>
                                                </div>
                                            </div>
                                            <!-- Party Ref -->
                                            <div class="col-lg-1 col-md-2 form-group">
                                                <label>Party Ref:</label>
                                            </div>
                                            <div class="col-lg-5 col-md-4 form-group">
                                                <!-- <label for="">Party Ref :</label> -->
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                    </div>
                                                    <input  type="text" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px;" name="party_ref" id="party_ref" class="form-control form-control-sm" placeholder="Party Ref">
                                                </div>
                                            </div>
                                            <!-- PO Cat -->
                                            <div class="col-lg-1 col-md-2 form-group">
                                                <label>PO Cat:</label>
                                            </div>
                                            <div class="col-lg-2 col-md-4 form-group">
                                                <!-- <label for="">PO Catg L/I :<span style="color:red">*</span></label> -->
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-list-alt"></i></span>
                                                    </div>
                                                    <!-- <select style="width:73% !important" title="purchase mode" name="purchase_mode" class="form-control form-control-sm" id="purchase_mode" >
                                                    <option value="L">L</option>
                                                </select>                                 -->
                                                    <input maxlength="30" type="text" name="division" style="background-color:#ccd4e1;font-weight:bold;" tabindex="-1" value="L" id="division" value="99" class="form-control form-control-sm" placeholder="Select Division" readonly>
                                                </div>
                                            </div>
                                            <!-- division -->
                                            <div class="col-lg-1 col-md-2 form-group">
                                                <label>Division:</label>
                                            </div>
                                            <div class="col-lg-2 col-md-4 form-group">
                                                <!-- <label for="">Division :<span style="color:red">*</span></label> -->
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                                    </div>
                                                    <input type="text" name="division" style="background-color:#ccd4e1;font-weight:bold;" tabindex="-1" id="division" value="99" class="form-control form-control-sm" placeholder="Select Division" readonly>
                                                </div>
                                            </div>
                                            <!-- Narration -->
                                            <div class="col-lg-1 col-md-2 form-group">
                                                <label>Narration:</label>
                                            </div>
                                            <div class="col-lg-5 col-md-4 form-group">
                                                <!-- <label for="">Narration :</label> -->
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                    </div>
                                                    <textarea rows="1" name="narration" id="narration" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px;" class="form-control form-control-sm" placeholder="Narration"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6 form-group text-center">
                                                <span id="msg3" style="color: red;font-size: 13px;"></span>
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
                                    <div class="card-ody">
                                        <br>
                                        <span class="calc_msg"><i class="fas fa-exclamation-circle"></i> Quantity can't be greater than Bal</span>
                                        <center><span class="bal_msg"><i class="fas fa-exclamation-circle"></i>Quantity can't be greater than Balance</span></center>
                                        <table id="example1" class="table table-bordered table-responsive" style="border: 1px solid gray; border-radius: 5px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.29); width: 100%; margin-bottom:5px;">
                                            <thead>
                                                <tr>
                                                    <td style="text-align: center;">Gen</td>
                                                    <td><input type="text" style="height: 25px; background-color: #ccd4e1;" tabindex="-1" id="gen_name" placeholder="Generic Name" readonly class="form-control form-control-sm"></td>
                                                    <td style="text-align: center;">UM</td>
                                                    <td><input type="text" style="height: 25px; background-color: #ccd4e1;" tabindex="-1" id="um_name" placeholder="UM Name" readonly class="form-control form-control-sm"></td>
                                                    <td style="text-align: center;">LOC BAL</td>
                                                    <td><input type="text" style="height: 25px; background-color: #ccd4e1;" tabindex="-1" id="loc_bal" placeholder="Local Bal" readonly class="form-control form-control-sm"></td>
                                                    <td style="text-align: center;"></td>
                                                    <td><input type="text" style="height: 25px; background-color: #ccd4e1;" tabindex="-1" id="total_balance" placeholder="Total Bal" readonly class="form-control form-control-sm"></td>
                                                </tr>
                                                <tr>
                                                    <th>ItemCode</th>
                                                    <th>Name</th>
                                                    <th>Type</th>
                                                    <th>LOC</th>
                                                    <th>GRN Ref</th>
                                                    <th>Batch#</th>
                                                    <th>Expiry Dt</th>
                                                    <th>Qty</th>
                                                    <th>Rate</th>
                                                    <th>Amount</th>
                                                    <th style="display: none;">gen_name</th>
                                                    <th style="display: none;">um_name</th>
                                                    <th style="display: none;">total_balance</th>
                                                    <th style="display: none;">div_name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="d_items">
                                                <tr id="main_tr" class="tr">
                                                    <!-- <td style="width:12%;"><select name="" id = "acc_desc" class="js-example-basic-single acc_desc"></select></td> -->
                                                    <td style="width: 8%;"><input style="padding:0 2px 0 0;width:83px;height:35px;background-color:#b7edea;" type="text" placeholder="Item Code" name="" id="acc_desc" class="acc_desc form-control-sm" readonly></td>
                                                    <td style="width: 13%;"><textarea style="height:35px;background-color:#ccd4e1; " rows="1" tabindex="-1" name="" id="detail" placeholder="Item Name" class="detail" readonly></textarea></td>
                                                    <td><select style="font-size:11px;width:75px !important;height:35px" name="" id="type" class="type">
                                                            <option value="0" readonly="readonly" selected>Type</option>
                                                            <option value="N">N</option>
                                                            <option value="F">F</option>
                                                            <option value="S">S</option>
                                                            <option value="T">T</option>
                                                        </select></td>
                                                    <td style="width: 10%;"><textarea style="width:100px;height:35px;background-color:#b7edea;font-size:12px" placeholder="Location"  type="text" name="" id="loc_i" class="loc_i" readonly></textarea></td>
                                                    <td style="width: 10%;"><textarea style="width:100px;height:35px;font-size:12px"  placeholder="Generic Ref" tabindex="-1" type="text" name="" id="grnref_i" class="grnref_i"></textarea></td>
                                                    <td style="width: 10%;"><textarea style="width:100px;height:35px;background-color:#ccd4e1;font-size:12px" placeholder="Batch No" tabindex="-1"  type="text" name="" id="batch_i" class="batch_i" readonly></textarea></td>
                                                    <td style="width: 10%;"><textarea style="width:100px;height:35px;background-color:#ccd4e1;font-size:12px" tabindex="-1" placeholder="Expiry Date"  type="text" name="" id="expirydt_i" class="expirydt_i" readonly></textarea></td>
                                                    <td style="width: 8%;"><input style="text-align:right; padding:0 2px 0 0;width:83px;height:35px" type="text" placeholder="0" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" name="" id="quantity" class="quantity ccc"></td>
                                                    <td style="width: 10%;"><input style="text-align:right; padding:0 2px 0 0;width:100px;height:35px" placeholder="0.00" oninput="this.value=this.value.replace(/[^0-9.,]/g,'');" type="text" name="" id="rate" class="rate calc_kar"></td>
                                                    <td style="width: 10%;"><input style="text-align:right; padding:0 2px 0 0;width:100px;height:35px;background-color:#ccd4e1;" placeholder="0.00" pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" tabindex="-1" name="" id="amount" class="amount" readonly></td>
                                                    <!-- hidden fields -->
                                                    <!-- hidden fields -->
                                                    <td style="width: 10%;display: none; "><input style="display: none;  text-align:right; padding:0 2px 0 0;width:100px;height:35px;background-color:#ccd4e1;" type="text" tabindex="-1" name="" id="gen_name_hidden" class="gen_name" readonly></td>
                                                    <td style="width: 10%;display: none; "><input style="display: none;  text-align:right; padding:0 2px 0 0;width:100px;height:35px;background-color:#ccd4e1;" type="text" tabindex="-1" name="" id="um_name_hidden" class="um_name" readonly></td>
                                                    <td style="width: 10%;display: none; "><input style="display: none;  text-align:right; padding:0 2px 0 0;width:100px;height:35px;background-color:#ccd4e1;" type="text" tabindex="-1" name="" id="total_balance_hidden" class="total_balance" readonly></td>
                                                    <td style="width: 10%;display: none; "><input style="display: none;  text-align:right; padding:0 2px 0 0;width:100px;height:35px;background-color:#ccd4e1;" type="text" tabindex="-1" name="" id="div_name_hidden" class="div_name" readonly></td>
                                                    <td><button type="button" class="btn btn-sm btn-primary add"><i class="fa fa-plus"></i></button></td>
                                                </tr>
                                            </tbody>
                                            <tr id="last_tr">
                                                <td style="text-align: center;">Div</td>
                                                <td><input type="text" style="height: 25px; background-color:#ccd4e1;" tabindex="-1" id="div_name" placeholder="Division Name" readonly class="form-control form-control-sm"></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td style="text-align:right;">Total:</td>
                                                <td style="font-weight:bold; text-align: right;" name="total_q" id="total_q"><b>0</b></td>
                                                <td></td>
                                                <td style="font-weight:bold; text-align: right;" name="total" id="total"><b>0</b></td>
                                            </tr>
                                        </table>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6" style="border:2px solid #937272">
                                                <div class="row" style="padding-top:10px">
                                                    <div class="col-md-2 form-group">
                                                        <label>Add:Others:</label>
                                                    </div>
                                                    <div class="col-md-5 form-group">
                                                        <select name="add_others_code" id="add_others_code" class="form-control form-control-sm js-example-basic-single"></select>
                                                    </div>
                                                    <div class="col-md-5 form-group">
                                                        <input  type="text" name="add_others_desc" id="add_others_desc" class="form-control form-control-sm" placeholder="Account Desc" style="background-color: #ccd4e1;font-weight:bold;" readonly tabindex="-1">
                                                    </div>
                                                    <div class="col-sm-2 form-group">
                                                        <label>Less:Freight:</label>
                                                    </div>
                                                    <div class="col-md-5 form-group">
                                                        <select name="add_freight_code" id="add_freight_code" class="form-control form-control-sm js-example-basic-single"></select>
                                                    </div>
                                                    <div class="col-md-5 form-group">
                                                        <input  type="text" name="add_freight_desc" id="add_freight_desc" class="form-control form-control-sm" placeholder="Freight Desc" style="background-color: #ccd4e1;font-weight:bold;" readonly tabindex="-1">
                                                    </div>
                                                    <div class="col-sm-2 form-group">
                                                        <label>Less:Disc:</label>
                                                    </div>
                                                    <div class="col-md-5 form-group">
                                                        <select name="add_disc_code" id="add_disc_code" class="form-control form-control-sm js-example-basic-single"></select>
                                                    </div>
                                                    <div class="col-md-5 form-group">
                                                        <input  type="text" name="add_disc_desc" id="add_disc_desc" class="form-control form-control-sm" placeholder="Less Desc" style="background-color: #ccd4e1;font-weight:bold;" readonly tabindex="-1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6" style="border:2px solid #937272">
                                                <div class="row" style="padding-top:10px">
                                                    <div class="col-md-1 form-group">
                                                        <label>Dpt:</label>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <select name="dpt_1_code" id="dpt_1_code" class="form-control form-control-sm js-example-basic-single"></select>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <textarea rows="1"  name="dpt_1_desc" id="dpt_1_desc" class="form-control form-control-sm" placeholder="Dept Name" style="background-color: #ccd4e1;font-weight:bold;" readonly tabindex="-1"></textarea>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input pattern="[0-9 ,.]{1,}" maxlength="30" type="text" name="add_amount_calc" id="add_amount_calc" class="form-control form-control-sm text-right" placeholder="Amt">
                                                    </div>
                                                    <div class="col-md-1 form-group">
                                                        <label>Dpt:</label>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <select name="dpt_2_code" id="dpt_2_code" class="form-control form-control-sm js-example-basic-single"></select>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <textarea rows="1"  name="dpt_2_desc" id="dpt_2_desc" class="form-control form-control-sm" placeholder="Dept Name" style="background-color: #ccd4e1;font-weight:bold;" readonly tabindex="-1"></textarea>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input pattern="[0-9 ,.]{1,}" maxlength="30" type="text" name="less_freight_calc" id="less_freight_calc" class="form-control form-control-sm text-right" placeholder="Amt">
                                                    </div>
                                                    <div class="col-md-1 form-group">
                                                        <label>Dpt:</label>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <select name="dpt_3_code" id="dpt_3_code" class="form-control form-control-sm js-example-basic-single"></select>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <textarea rows="1"  name="dpt_3_desc" id="dpt_3_desc" class="form-control form-control-sm" placeholder="Dept Name" style="background-color: #ccd4e1;font-weight:bold;" readonly tabindex="-1"></textarea>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input pattern="[0-9 ,.]{1,}" maxlength="30" type="text" name="less_disc_calc" id="less_disc_calc" class="form-control form-control-sm text-right" placeholder="Amt">
                                                    </div>
                                                    <div class="col-md-1 form-group"></div>
                                                    <div class="col-md-3 form-group"></div>
                                                    <div class="col-md-4 form-group"></div>
                                                    <div class="col-md-4 form-group">
                                                        <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="final_total_calc" id="final_total_calc" class="form-control form-control-sm text-right" placeholder="Total Amt" style="background-color: #ccd4e1;font-weight:bold;" readonly tabindex="-1">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-12 text-right">
                                                <button id="submit" type="submit" value="Submit" class="btn btn-primary toastrDefaultSuccess"><i style="font-size:20px" class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                        </table>
                                        <!-- masla -->
                                    </div>
                                    <!-- </form> -->
                                    <div style="text-align: center;">
                                        <span id="msg" style="color: red;font-size: 13px;"></span>
                                    </div>
                                    <div class="row">
                                        <!-- <div class="col-sm-12 text-right">
                                          <button id="submit" type="submit" value="Submit" class="btn btn-primary toastrDefaultSuccess"><i style="font-size:20px" class="fa fa-plus"></i></button>
                                      </div> -->
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
<style>
    body {
        zoom: 85%;
    }
    input:focus,
    select:focus,
    textarea:focus,
    .select2-selection:focus,
    .add:focus,
    #submit:focus,
    .remove:focus {
        -moz-box-shadow: 0 0 8px rgba(82, 168, 236, .6);
        box-shadow: 0 0 8px orangered !important;
        border: 3px solid black;
    }
    select {
        width: 82% !important;
    }
    .mb-minus {
        margin-bottom: -10px;
    }
    .modal-backdrop.show {
        opacity: .5;
    }
    .modal-backdrop {
        height: 100%;
        width: 100%;
    }
    .calc_msg {
        font-size: 15px;
        color: red;
        display: none;
        padding-left: 65%;
        text-align: center;
    }
    .bal_msg {
        font-size: 15px;
        color: red;
        display: none;
        margin: 5px auto;
        text-align: center;
    }
    input,
    select,
    textarea,
    .select2-selection {
        border: 1px solid black !important;
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
    input,
    select,
    textarea,
    .select2-selection {
        border: 1px solid black !important;
    }
    .input-group-prepend {}
    .select2-hidden-accessible {
        border: 1px solid black !important;
    }
    .select2-selection {
        background-color: #b7edea !important
    }
    h2 {
        color: black;
        font-size: 34px;
        position: relative;
        text-transform: uppercase;
        font-weight: 600;
        margin-top: -58px;
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
        font-weight: 600
    }
    .form-control:focus {
        -moz-box-shadow: 0 0 8px rgba(82, 168, 236, .6);
        box-shadow: 0 0 8px orangered !important;
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
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none !important;
        margin: 0 !important;
    }
    input[type=number] {
        -moz-appearance: textfield !important;
    }
    input:focus,
    select:focus,
    textarea:focus,
    .select2-selection:focus {
        -moz-box-shadow: 0 0 8px rgba(82, 168, 236, .6);
        box-shadow: 0 0 8px orangered !important;
    }
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }
    td,
    th {
        text-align: left;
        font-size: 15px
    }
    tr:nth-child(even) {}
    .select2-container {
        width: 80% !important;
    }
    .amount::placeholder {
        text-align: right !important
    }
    @media only screen and (max-width: 768px) {
        .select2-container {
            width: 100% !important;
        }
    }
    td .select2-container {
        width: 100% !important;
    }
    .table td,
    .table th {
        padding: 0.15rem !important;
    }
    .table th {
        text-align: center !important;
    }
    .hover-item,
    .even,
    .odd {
        background-color: #FFF;
        cursor: pointer;
    }
    .hover-item,
    .odd:hover {
        background-color: gray;
        color: white
    }
    .even:hover {
        background-color: gray;
        color: white
    }
    #salesman {
        background-color: #afafaf85;
    }
    #party {
        background-color: #afafaf85;
    }
    #division {
        background-color: #afafaf85;
    }
    #company_code {
        background-color: #afafaf85;
    }
    td input {
        font-size: 12px !important;
    }
    .select2-selection__rendered,
    .select2-results {
        font-size: 12px !important;
    }
    .form-group {
        margin-bottom: 4px !important
    }
</style>
<!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- company modal form -->
<div class="modal fade" style="background-color: transparent;" id="CompanyFormModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
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
<!-- item modal  form -->
<div class="modal fade" style="background-color: transparent;" id="ItemCodeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Item</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table" id="item_table">
                    <thead>
                        <tr>
                            <th>Sno</th>
                            <th>Item Name</th>
                            <th>Purchase Mode</th>
                            <th>Div Name</th>
                            <th>Gen Name</th>
                            <th>Item Code</th>
                            <th>Co Code</th>
                            <th>Div Code</th>
                            <th>UM Name</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- item modal  form add -->
<div class="modal fade" style="background-color: transparent;" id="ItemCodeModalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Company</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table" id="item_table_add">
                    <thead>
                        <tr>
                            <th>Sno</th>
                            <th>Item Name</th>
                            <th>Purchase Mode</th>
                            <th>Div Name</th>
                            <th>Gen Name</th>
                            <th>Item Code</th>
                            <th>Co Code</th>
                            <th>Div Code</th>
                            <th>UM Name</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- LOC modal  form -->
<div class="modal fade" style="background-color: transparent;" id="LocCodeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Location</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table" id="loc_table">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Item Name</th>
                            <th>HS Code</th>
                            <th>Txrate</th>
                            <th>Od_Tax</th>
                            <th>G D</th>
                            <th>Gd Date</th>
                            <th>Batch No</th>
                            <th>Expiry Date</th>
                            <th>Loc</th>
                            <th>Loc Name</th>
                            <th>Co</th>
                            <th>Bal</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- LOC modal  form add -->
<div class="modal fade" style="background-color: transparent;" id="LocCodeModalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Company</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table" id="loc_table_add">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Item Name</th>
                            <th>HS Code</th>
                            <th>Txrate</th>
                            <th>Od_Tax</th>
                            <th>G D</th>
                            <th>Gd Date</th>
                            <th>Batch No</th>
                            <th>Expiry Date</th>
                            <th>Loc</th>
                            <th>Loc Name</th>
                            <th>Co</th>
                            <th>Bal</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- company  form -->
<div class="modal fade" id="SalesmanFormModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
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
<div class="modal fade" id="PartyFormModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
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
    $(document).ready(function() {
        $("#voucher_date").focus();
        $("#order_form").on('focus', '.rate', function() {
            var button_id = $(this).attr("id");
            if (button_id == 'rate') {
                var p_rate_id = '';
            } else {
                var p_amountid = button_id.split("e");
                var p_rate_id = p_amountid[1];
            }
            var previous_amount = $('#amount' + p_rate_id).val();
            sessionStorage.setItem("previous_amount", previous_amount);
        });
        $("#order_form").on('change', '.rate', function() {
            var previous_amounts = sessionStorage.getItem('previous_amount');
            if (previous_amounts == "") {
                previous_amount = 0;
            } else {
                previous_amount = previous_amounts.replaceAll(',', '');
            }
            var total = $('#total').text();
            console.log(total);
            if (total == '' || total == '0' || total == '0.00') {
                minuss = 0;
            } else {
                minus_t = total.replaceAll(',', '');
                minuss = parseFloat(minus_t) - parseFloat(previous_amount);
            }
            var button_id = $(this).attr("id");
            if (button_id == 'rate') {
                rate_id = '';
            } else {
                var rateid = button_id.split("e");
                rate_id = rateid[1];
            }
            var quantity = $('#quantity' + rate_id).val();
            var rate = $('#rate' + rate_id).val();
            if (quantity == '' || quantity == '0' || quantity == '0.00') {
                quantity = 0;
                $('#amount' + rate_id).val('');
                $('#total').html(minuss);
            } else {
                if (rate == "" || rate == '0' || rate == '0.00') {
                    $('#amount' + rate_id).val('');
                    $('#total').html(minuss);
                    pre_rate = 0;
                    amts = 0;
                } else {
                    pre_rate = rate.replaceAll(',', '');
                    var rate = new Intl.NumberFormat(
                        'en-US', {
                            style: 'currency',
                            currency: 'USD',
                            currencyDisplay: 'narrowSymbol'
                        }).format(pre_rate);
                    var rate = rate.replace(/[$]/g, '');
                    var show_rate = rate;
                    $('#rate' + rate_id).val(show_rate);
                }
                var amts = parseFloat(quantity) * parseFloat(pre_rate);
                var org_amt = new Intl.NumberFormat(
                    'en-US', {
                        style: 'currency',
                        currency: 'USD',
                        currencyDisplay: 'narrowSymbol'
                    }).format(amts);
                var org_amt = org_amt.replace(/[$]/g, '');
                $('#amount' + rate_id).val(org_amt);
                var amount = $('#amount' + rate_id).val();
                if (amount == '' || amount == '0' || amount == '0.00') {
                    pre_amount = 0;
                } else {
                    pre_amount = amount.replaceAll(',', '');
                    var amount = new Intl.NumberFormat(
                        'en-US', {
                            style: 'currency',
                            currency: 'USD',
                            currencyDisplay: 'narrowSymbol'
                        }).format(pre_amount);
                    var amount = amount.replace(/[$]/g, '');
                    var show_amount = amount;
                }
                var fnf = parseFloat(minuss) + parseFloat(pre_amount);
                var total = new Intl.NumberFormat(
                    'en-US', {
                        style: 'currency',
                        currency: 'USD',
                        currencyDisplay: 'narrowSymbol'
                    }).format(fnf);
                var total = total.replace(/[$]/g, '');
                $('#total').html(total);
            }
        });
        $("#order_form").on('change', '#frt_m', function() {
            var frt_m = $('#frt_m').val();
            var frt_m_fnf = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(frt_m);
            frt_m_fnf = frt_m_fnf.replace(/[$]/g, '');
            $('#frt_m').val(frt_m_fnf);
            var qty = $('#quantity').val();
            var amts = parseFloat(qty) * parseFloat(frt_m);
            var frt_amt = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(amts);
            frt_amt = frt_amt.replace(/[$]/g, '');
            if (frt_amt == '' || isNaN(frt_amt)) {
                frt_amt == '';
            }
            $('#main_tr #frt').val(frt_amt);
            var rate = $('#rate').val();
            rate = rate.replaceAll(',', '');
            var excl = parseFloat(rate) - parseFloat(frt_m);
            var excl_m_fnf = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(excl);
            excl_m_fnf = excl_m_fnf.replace(/[$]/g, '');
            $('#frt_m').val(frt_m_fnf);
            $('#frt_m').css('text-align', 'right');
            $('#frt_m').css('padding', '0 1px 0 0');
            if (excl_m_fnf == '' || isNaN(excl_m_fnf)) {
                excl_m_fnf == '';
            }
            $('#excl_m').val(excl_m_fnf);
            $('#excl_m').css('text-align', 'right');
            $('#excl_m').css('padding', '0 1px 0 0');
            var amount = $('#amount').val();
            excl_amount = amount.replaceAll(',', '');
            var excl = parseFloat(excl_amount) - parseFloat(frt_amt);
            var excl_fnf = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(excl);
            excl_fnf = excl_fnf.replace(/[$]/g, '');
            $('#main_tr #excl').val(excl_fnf);
        });
        $("#order_form").on('focus', '.disc_m', function() {
            var button_id = $(this).attr("id");
            if (button_id == 'quantity') {
                var p_disc_id = '';
            } else {
                var p_amountid = button_id.split("y");
                var p_disc_id = p_amountid[1];
            }
            var previous_excl = $('#excl' + p_disc_id).val();
            sessionStorage.setItem("previous_excl", previous_excl);
            var previous_disc = $('#disc' + p_disc_id).val();
            sessionStorage.setItem("previous_disc", previous_disc);
            var previous_frt = $('#frt' + p_disc_id).val();
            sessionStorage.setItem("previous_frt", previous_frt);
        });
        $("#order_form").on('change', '.disc_m', function() {
            var previous_excls = sessionStorage.getItem('previous_excl');
            var previous_discs = sessionStorage.getItem('previous_disc');
            var previous_frts = sessionStorage.getItem('previous_frt');
            if (previous_discs == "") {
                previous_disc = 0;
            } else {
                previous_disc = previous_discs.replaceAll(',', '');
            }
            var disc_t = $('#disc_t').html();
            if (disc_t == '' || disc_t == '0' || disc_t == '0.00') {
                minuss_dt = 0;
            } else {
                minus_td = disc_t.replaceAll(',', '');
                minuss_dt = parseFloat(minus_td) - parseFloat(previous_disc);
            }
            var button_id = $(this).attr("id");
            if (button_id == 'disc_m') {
                disc_id = '';
            } else {
                var discid = button_id.split("_m");
                disc_id = discid[1];
            }
            var disc = $('#disc' + disc_id).val();
            var disc_m = $('#disc_m').val();
            if (disc_m == '' || disc_m == '0' || disc_m == '0.00') {
                $('#disc_t').html(minuss_dt);
                var disc_fnf = 0;
                var disc_cal_fnf = '0';
            } else {
                var amount = $('#amount' + disc_id).val();
                amount = amount.replaceAll(',', '');
                disc_m = disc_m.replaceAll(',', '');
                disc_cal = (parseFloat(disc_m) * parseFloat(amount)) / 100;
                var disc_cal_fnf = new Intl.NumberFormat(
                    'en-US', {
                        style: 'currency',
                        currency: 'USD',
                        currencyDisplay: 'narrowSymbol'
                    }).format(disc_cal);
                disc_cal_fnf = disc_cal_fnf.replace(/[$]/g, '');
                var disc_fnf = new Intl.NumberFormat(
                    'en-US', {
                        style: 'currency',
                        currency: 'USD',
                        currencyDisplay: 'narrowSymbol'
                    }).format(disc_m);
                disc_fnf = disc_fnf.replace(/[$]/g, '');
            }
            $('#disc_m' + disc_id).val(disc_fnf);
            $('#disc' + disc_id).val(disc_cal_fnf);
            $('#disc_m' + disc_id).css('text-align', 'right');
            $('#disc_m' + disc_id).css('padding', '0 1px 0 0');
            $('#disc' + disc_id).css('text-align', 'right');
            $('#disc' + disc_id).css('padding', '0 1px 0 0');
            var disc_t = $('#disc_t').html();
            if (dis_t == '' || dist == '0' || dis_t == '0.00') {
                dis_tot = 0;
            } else {}
        });
        $("#order_form").on('focus', '.quantity', function() {
            var button_id = $(this).attr("id");
            if (button_id == 'quantity') {
                var p_quantity_id = '';
            } else {
                var p_amountid = button_id.split("y");
                var p_quantity_id = p_amountid[1];
            }
            var pichla_hisab = $('#pichla_hisab').val();
            var previous_amount = $('#amount' + p_quantity_id).val();
            var previous_quantity = $('#quantity' + p_quantity_id).val();
            var previous_tq = $('#total_q').text();
            var previous_tq = $('#total_q').text();
            sessionStorage.setItem("previous_amount", previous_amount);
            sessionStorage.setItem("previous_qty", previous_quantity);
            sessionStorage.setItem("previous_tq", previous_tq);
        });
        $("#order_form").on('change', '.quantity', function() {
            var previous_amounts = sessionStorage.getItem('previous_amount');
            var previous_qtys = sessionStorage.getItem('previous_qty');
            var previous_tq = sessionStorage.getItem('previous_tq');
            if (previous_tq == "") {
                previous_tq = 0;
            }
            if (previous_amounts == "") {
                previous_amount = 0;
            } else {
                previous_amount = previous_amounts.replaceAll(',', '');
            }
            if (previous_qtys == "") {
                previous_qty = 0;
            } else {
                previous_qty = previous_qtys.replaceAll(',', '');
            }
            minuss_q = parseFloat(previous_tq) - parseFloat(previous_qty);
            var total = $('#total').text();
            if (total == '' || total == '0' || total == '0.00') {
                minuss = 0;
            } else {
                minus_t = total.replaceAll(',', '');
                minuss = parseFloat(minus_t) - parseFloat(previous_amount);
            }
            var button_id = $(this).attr("id");
            if (button_id == 'quantity') {
                quantity_id = '';
            } else {
                var quantityid = button_id.split("y");
                quantity_id = quantityid[1];
            }
            var quantity = $('#quantity' + quantity_id).val();
            var rate = $('#rate' + quantity_id).val();
            if (quantity == '' || quantity == '0' || quantity == '0.00') {
                quantity = 0;
                $('#amount' + quantity_id).val('');
                $('#total').html(minuss);
            } else {
                if (rate == "" || rate == '0' || rate == '0.00') {
                    $('#amount' + quantity_id).val('');
                    console.log(minuss_q);
                    $('#total_q').text(minuss_q);
                    pre_rate = 0;
                    amts = 0;
                } else {
                    pre_rate = rate.replaceAll(',', '');
                    var rate = new Intl.NumberFormat(
                        'en-US', {
                            style: 'currency',
                            currency: 'USD',
                            currencyDisplay: 'narrowSymbol'
                        }).format(pre_rate);
                    var rate = rate.replace(/[$]/g, '');
                    var show_rate = rate;
                    $('#rate' + quantity_id).val(show_rate);
                }
                var amts = parseFloat(quantity) * parseFloat(pre_rate);
                var org_amt = new Intl.NumberFormat(
                    'en-US', {
                        style: 'currency',
                        currency: 'USD',
                        currencyDisplay: 'narrowSymbol'
                    }).format(amts);
                var org_amt = org_amt.replace(/[$]/g, '');
                $('#amount' + quantity_id).val(org_amt);
                var amount = $('#amount' + quantity_id).val();
                if (amount == '' || amount == '0' || amount == '0.00') {
                    pre_amount = 0;
                } else {
                    pre_amount = amount.replaceAll(',', '');
                    var amount = new Intl.NumberFormat(
                        'en-US', {
                            style: 'currency',
                            currency: 'USD',
                            currencyDisplay: 'narrowSymbol'
                        }).format(pre_amount);
                    var amount = amount.replace(/[$]/g, '');
                    var show_amount = amount;
                }
                var fnf = parseFloat(minuss) + parseFloat(pre_amount);
                var total = new Intl.NumberFormat(
                    'en-US', {
                        style: 'currency',
                        currency: 'USD',
                        currencyDisplay: 'narrowSymbol'
                    }).format(fnf);
                var total = total.replace(/[$]/g, '');
                $('#total').html(total);
            }
            var t_qty = parseInt(quantity) + parseInt(minuss_q);
            $('#total_q').text(t_qty);
            var quantity = $('#quantity' + quantity_id).val();
            var total_balance = $('#total_balance').val();
            if (quantity == '' || quantity == '0' || quantity == '0.00') {
                quantitys = 0;
            } else {
                quantitys = quantity.replaceAll(',', '');
            }
            if (parseInt(total_balance) < parseInt(quantitys)) {
                var zero = 0;
                $('#ok_qty' + quantity_id).val(0);
                $('#quantity' + quantity_id).focus();
                $('#quantity' + quantity_id).val('');
                $('.bal_msg').css('display', 'block');
                $('#quantity' + quantity_id).css('background', 'pink');
                var total_qty = new Intl.NumberFormat(
                    'en-US', {
                        style: 'currency',
                        currency: 'USD',
                        currencyDisplay: 'narrowSymbol'
                    }).format(quantity);
                var total_qty = total_qty.replace(/[$]/g, '');
            } else {
                $('.bal_msg').css('display', 'none');
                $('#quantity' + quantity_id).css('background', 'transparent');
            }
            $('#order_form').on('change', '.calc_kar', function() {
                var amt1 = $('#total').html();
                amt1 = amt1.replaceAll(',', '');
                var add1 = $('#add_amount_calc').val();
                if (add1 == '') {
                    add1 = 0;
                } else {
                    add1 = add1.replaceAll(',', '');
                }
                var less1 = $('#less_freight_calc').val();
                if (less1 == '') {
                    less1 = 0;
                } else {
                    less1 = less1.replaceAll(',', '');
                }
                var less2 = $('#less_disc_calc').val();
                if (less2 == '') {
                    less2 = 0;
                } else {
                    less2 = less2.replaceAll(',', '');
                }
                var final = parseFloat(amt1) + parseFloat(add1) - parseFloat(less1) - parseFloat(less2);
                var finalformat = new Intl.NumberFormat(
                    'en-US', {
                        style: 'currency',
                        currency: 'USD',
                        currencyDisplay: 'narrowSymbol'
                    }).format(final);
                var formatted1 = finalformat.replace(/[$]/g, '');
                $('#final_total_calc').val(formatted1);
                var finalformat2 = new Intl.NumberFormat(
                    'en-US', {
                        style: 'currency',
                        currency: 'USD',
                        currencyDisplay: 'narrowSymbol'
                    }).format(add1);
                var formatted12 = finalformat2.replace(/[$]/g, '');
                $('#add_amount_calc').val(formatted12);
            });
        });
    });
    $('#voucher_date').on('keyup', function(e) {
        if (e.which == 9) {
            $('#company_code').focus();
        }
    });
    $('#order_form').on('focus', '#company_code', function() {
        $('#company_table').dataTable().fnDestroy();
        table = $('#company_table').DataTable({
            dom: 'Bfrtip',
            orderCellsTop: true,
            fixedHeader: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print',
            ]
        });
        $('#company_table thead tr:eq(1) th').each(function(i) {
            var title = $(this).text();
            $(this).html('<input type="text" class="form-control" placeholder="Search ' + title + '" />');
            $('input', this).on('keyup change', function() {
                if (table.column(i).search() !== this.value) {
                    table
                        .column(i)
                        .search(this.value)
                        .draw();
                }
            });
        });
        $.ajax({
            url: 'api/setup/chart_of_account/control_account_api.php',
            type: 'POST',
            data: {
                action: 'company_code'
            },
            dataType: "json",
            success: function(response) {
                table.clear().draw();
                var sno = '0';
                for (var i = 0; i < response.length; i++) {
                    sno++;
                    table.row.add([sno, response[i].co_name, response[i].co_code]);
                }
                table.draw();
            },
            error: function(error) {
                console.log(error);
                alert("Contact IT Department");
            }
        });
        $('#CompanyFormModel').modal('show');
    });
    $('#order_form').on('focus', '#acc_desc', function() {
        var company_code = $('#company_code').val();
        $('#item_table').dataTable().fnDestroy();
        table = $('#item_table').DataTable({
            dom: 'Bfrtip',
            orderCellsTop: true,
            fixedHeader: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print',
            ]
        });
        $('#item_table thead tr:eq(1) th').each(function(i) {
            var title = $(this).text();
            $(this).html('<input type="text" class="form-control" placeholder="Search ' + title + '" />');
            $('input', this).on('keyup change', function() {
                if (table.column(i).search() !== this.value) {
                    table
                        .column(i)
                        .search(this.value)
                        .draw();
                }
            });
        });
        $.ajax({
            url: 'api/Inventory_management/inventory_locals/purchase_return_api.php',
            type: 'POST',
            data: {
                action: 'item_code',
                company_code: company_code
            },
            dataType: "json",
            success: function(response) {
                table.clear().draw();
                var sno = '0';
                for (var i = 0; i < response.length; i++) {
                    sno++;
                    table.row.add([sno, response[i].item_name, response[i].pur_mode, response[i].div_name, response[i].gen_name, response[i].item, response[i].co_code, response[i].div_code, response[i].um_name]);
                }
                table.draw();
            },
            error: function(error) {
                console.log(error);
                alert("Contact IT Department");
            }
        });
        $('#ItemCodeModal').modal('show');
    });
    $('#order_form').on('focus', '#loc_i', function() {
        var company_code = $('#company_code').val();
        var item_code = $('#acc_desc').val();
        $('#loc_table').dataTable().fnDestroy();
        table = $('#loc_table').DataTable({
            dom: 'Bfrtip',
            orderCellsTop: true,
            fixedHeader: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print',
            ]
        });
        $('#loc_table thead tr:eq(1) th').each(function(i) {
            var title = $(this).text();
            $(this).html('<input type="text" class="form-control" placeholder="Search ' + title + '" />');
            $('input', this).on('keyup change', function() {
                if (table.column(i).search() !== this.value) {
                    table
                        .column(i)
                        .search(this.value)
                        .draw();
                }
            });
        });
        $.ajax({
            url: 'api/Inventory_management/inventory_locals/purchase_return_api.php',
            type: 'POST',
            data: {
                action: 'loc_code',
                company_code: company_code,
                item_code: item_code
            },
            dataType: "json",
            success: function(response) {
                table.clear().draw();
                var sno = '0';
                for (var i = 0; i < response.length; i++) {
                    sno++;
                    table.row.add([response[i].ITEM_CODE, response[i].item_name, response[i].ITEM_HSCODE, response[i].ITEM_TAXRATE, "-", response[i].G_D, response[i].GD_DATE, response[i].BATCH_NO, response[i].EXPIRY_DATE, response[i].LOC_CODE, response[i].loc_name, response[i].CO_CODE, response[i].BAL_STOCK]);
                }
                table.draw();
            },
            error: function(error) {
                console.log(error);
                alert("Contact IT Department");
            }
        });
        $('#LocCodeModal').modal('show');
    });
    $('#company_table').on('click', '.even', function() {
        var company_name = $(this).closest('tr').children('td:nth-child(2)').text();
        var company_code = $(this).closest('tr').children('td:nth-child(3)').text();
        $('#company_code').val(company_code);
        $('#company_name').val(company_name);
        $("#ajax-loader").show();
        var rowCount = $("#example1 tr").length;
        $('#company_ref').val('');
        $('#v_no').val('');
        $('#name_p').val('');
        $('#party_ref').val('');
        $('#narration').val('');
        $('#gen_name').val('');
        $('#um_name').val('');
        $('#div_name').val('');
        $('#pichla_hisab').val('');
        $('#total_q').text('0');
        $('#add_others_desc').val('');
        $('#add_freight_desc').val('');
        $('#add_disc_desc').val('');
        $('#dpt_1_desc').val('');
        $('#dpt_2_desc').val('');
        $('#dpt_3_desc').val('');
        $('#add_amount_calc').val('');
        $('#less_freight_calc').val('');
        $('#less_disc_calc').val('');
        $('#final_total_calc').val('');
        $('#dpt_1_code').val('');
        $('#dpt_2_code').val('');
        $('#dpt_3_code').val('');
        $('#view_item').css('display', 'none');
        for (var a = 2; a < rowCount - 1; a++) {
            var d = a - 1;
            $('#tr' + d + '').remove();
            $('#total').text('0');
        }
        $.ajax({
            url: 'api/Inventory_management/inventory_locals/purchase_return_api.php',
            type: 'POST',
            data: {
                action: 'item_code',
                company_code: company_code
            },
            dataType: "json",
            success: function(response) {
                $("#ajax-loader").hide();
                $('#acc_desc').html('');
                $('#acc_desc').append('<option value="" selected disabled>Select Item</option>');
                $.each(response, function(key, value) {
                    $('#acc_desc').append('<option data-name="' + value["item_descr"] + '"  data-code=' + value["item_div"] + ' value=' + value["item_div"] + '>' + value["item_div"] + ' - ' + value["item_descr"] + '</option>');
                });
            },
            error: function(error) {
                console.log(error);
                alert("Contact IT Department");
            }
        });
        $.ajax({
            url: 'api/Inventory_management/inventory_locals/purchase_return_api.php',
            type: 'POST',
            data: {
                action: 'party_code',
                company_code: company_code
            },
            dataType: "json",
            success: function(response) {
                $("#ajax-loader").hide();
                $('#party').html('');
                $('#party').append('<option value="" selected disabled>Select Party</option>');
                $.each(response, function(key, value) {
                    $('#party').append('<option data-name="' + value["DESCR"] + '"  data-code=' + value["ACCOUNT_CODE"] + ' value=' + value["ACCOUNT_CODE"] + '>' + value["ACCOUNT_CODE"] + ' - ' + value["DESCR"] + '</option>');
                });
            },
            error: function(error) {
                console.log(error);
                alert("Contact IT Department");
            }
        });
        $.ajax({
            url: 'api/Inventory_management/inventory_locals/purchase_return_api.php',
            type: 'POST',
            data: {
                action: 'discounts_code',
                company_code: company_code
            },
            dataType: "json",
            success: function(response) {
                $("#ajax-loader").hide();
                $('#add_others_code').html('');
                $('#add_others_code').append('<option value="" selected disabled>Select Account</option>');
                $.each(response, function(key, value) {
                    $('#add_others_code').append('<option data-name="' + value["DESCR"] + '"  data-code=' + value["ACCOUNT_CODE"] + ' value=' + value["ACCOUNT_CODE"] + '>' + value["ACCOUNT_CODE"] + ' - ' + value["DESCR"] + '</option>');
                });
            },
            error: function(error) {
                console.log(error);
                alert("Contact IT Department");
            }
        });
        $("#order_form").on('change', '#add_others_code', function() {
            var account_code = $('#add_others_code').find(':selected').val();
            var account_name = $('#add_others_code').find(':selected').attr("data-name");
            $('#select2-add_others_code-container').html(account_code);
            $('#add_others_desc').val(account_name);
            $('#view_item').css('display', '');
            $('#view_item').fadeIn("slow");
        });
        $.ajax({
            url: 'api/Inventory_management/inventory_locals/purchase_return_api.php',
            type: 'POST',
            data: {
                action: 'discounts_code',
                company_code: company_code
            },
            dataType: "json",
            success: function(response) {
                $("#ajax-loader").hide();
                $('#add_freight_code').html('');
                $('#add_freight_code').append('<option value="" selected disabled>Select Account</option>');
                $.each(response, function(key, value) {
                    $('#add_freight_code').append('<option data-name="' + value["DESCR"] + '"  data-code=' + value["ACCOUNT_CODE"] + ' value=' + value["ACCOUNT_CODE"] + '>' + value["ACCOUNT_CODE"] + ' - ' + value["DESCR"] + '</option>');
                });
            },
            error: function(error) {
                console.log(error);
                alert("Contact IT Department");
            }
        });
        $("#order_form").on('change', '#add_freight_code', function() {
            var account_code = $('#add_freight_code').find(':selected').val();
            var account_name = $('#add_freight_code').find(':selected').attr("data-name");
            $('#select2-add_freight_code-container').html(account_code);
            $('#add_freight_desc').val(account_name);
            $('#view_item').css('display', '');
            $('#view_item').fadeIn("slow");
        });
        $.ajax({
            url: 'api/Inventory_management/inventory_locals/purchase_return_api.php',
            type: 'POST',
            data: {
                action: 'discounts_code',
                company_code: company_code
            },
            dataType: "json",
            success: function(response) {
                $("#ajax-loader").hide();
                $('#add_disc_code').html('');
                $('#add_disc_code').append('<option value="" selected disabled>Select Account</option>');
                $.each(response, function(key, value) {
                    $('#add_disc_code').append('<option data-name="' + value["DESCR"] + '"  data-code=' + value["ACCOUNT_CODE"] + ' value=' + value["ACCOUNT_CODE"] + '>' + value["ACCOUNT_CODE"] + ' - ' + value["DESCR"] + '</option>');
                });
            },
            error: function(error) {
                console.log(error);
                alert("Contact IT Department");
            }
        });
        $("#order_form").on('change', '#add_disc_code', function() {
            var account_code = $('#add_disc_code').find(':selected').val();
            var account_name = $('#add_disc_code').find(':selected').attr("data-name");
            $('#select2-add_disc_code-container').html(account_code);
            $('#add_disc_desc').val(account_name);
            $('#view_item').css('display', '');
            $('#view_item').fadeIn("slow");
        });
        $('#CompanyFormModel').modal('hide');
        $("#company_ref").focus();
    });
    $('#company_table').on('click', '.odd', function() {
        var company_name = $(this).closest('tr').children('td:nth-child(2)').text();
        var company_code = $(this).closest('tr').children('td:nth-child(3)').text();
        $('#company_code').val(company_code);
        $('#company_name').val(company_name);
        $("#ajax-loader").show();
        var rowCount = $("#example1 tr").length;
        $('#acc_desc').val('');
        $('#detail').val('');
        $('#memo').val('');
        $('#amount').val('');
        $('#total').val('');
        $('#debit').val('');
        $('#company_ref').val('');
        $('#v_no').val('');
        $('#name_p').val('');
        $('#party_ref').val('');
        $('#narration').val('');
        $('#gen_name').val('');
        $('#um_name').val('');
        $('#div_name').val('');
        $('#pichla_hisab').val('');
        $('#total_q').text('0');
        $('#quantity').text('0');
        $('#rate').text('0');
        $('#add_others_desc').val('');
        $('#add_freight_desc').val('');
        $('#add_disc_desc').val('');
        $('#dpt_1_desc').val('');
        $('#dpt_2_desc').val('');
        $('#dpt_3_desc').val('');
        $('#add_amount_calc').val('');
        $('#less_freight_calc').val('');
        $('#less_disc_calc').val('');
        $('#final_total_calc').val('');
        $('#dpt_1_code').val('');
        $('#dpt_2_code').val('');
        $('#dpt_3_code').val('');
        $('#view_item').css('display', 'none');
        for (var a = 2; a < rowCount - 1; a++) {
            var d = a - 1;
            $('#tr' + d + '').remove();
            $('#total').text('0');
        }
        $.ajax({
            url: 'api/Inventory_management/inventory_locals/purchase_return_api.php',
            type: 'POST',
            data: {
                action: 'item_code',
                company_code: company_code
            },
            dataType: "json",
            success: function(response) {
                $("#ajax-loader").hide();
                $('#acc_desc').html('');
                $('#acc_desc').append('<option value="" selected disabled>Select Item</option>');
                $.each(response, function(key, value) {
                    $('#acc_desc').append('<option data-name="' + value["item_descr"] + '"  data-code=' + value["item_div"] + ' value=' + value["item_div"] + '>' + value["item_div"] + ' - ' + value["item_descr"] + '</option>');
                });
            },
            error: function(error) {
                console.log(error);
                alert("Contact IT Department");
            }
        });
        $.ajax({
            url: 'api/Inventory_management/inventory_locals/purchase_return_api.php',
            type: 'POST',
            data: {
                action: 'party_code',
                company_code: company_code
            },
            dataType: "json",
            success: function(response) {
                $("#ajax-loader").hide();
                $('#party').html('');
                $('#party').append('<option value="" selected disabled>Select Party</option>');
                $.each(response, function(key, value) {
                    $('#party').append('<option data-name="' + value["DESCR"] + '"  data-code=' + value["ACCOUNT_CODE"] + ' value=' + value["ACCOUNT_CODE"] + '>' + value["ACCOUNT_CODE"] + ' - ' + value["DESCR"] + '</option>');
                });
            },
            error: function(error) {
                console.log(error);
                alert("Contact IT Department");
            }
        });
        $.ajax({
            url: 'api/Inventory_management/inventory_locals/purchase_return_api.php',
            type: 'POST',
            data: {
                action: 'discounts_code',
                company_code: company_code
            },
            dataType: "json",
            success: function(response) {
                $("#ajax-loader").hide();
                $('#add_others_code').html('');
                $('#add_others_code').append('<option value="" selected disabled>Select Account</option>');
                $.each(response, function(key, value) {
                    $('#add_others_code').append('<option data-name="' + value["DESCR"] + '"  data-code=' + value["ACCOUNT_CODE"] + ' value=' + value["ACCOUNT_CODE"] + '>' + value["ACCOUNT_CODE"] + ' - ' + value["DESCR"] + '</option>');
                });
            },
            error: function(error) {
                console.log(error);
                alert("Contact IT Department");
            }
        });
        $("#order_form").on('change', '#add_others_code', function() {
            var account_code = $('#add_others_code').find(':selected').val();
            var account_name = $('#add_others_code').find(':selected').attr("data-name");
            $('#select2-add_others_code-container').html(account_code);
            $('#add_others_desc').val(account_name);
            $('#view_item').css('display', '');
            $('#view_item').fadeIn("slow");
        });
        $.ajax({
            url: 'api/Inventory_management/inventory_locals/purchase_return_api.php',
            type: 'POST',
            data: {
                action: 'discounts_code',
                company_code: company_code
            },
            dataType: "json",
            success: function(response) {
                $("#ajax-loader").hide();
                $('#add_freight_code').html('');
                $('#add_freight_code').append('<option value="" selected disabled>Select Account</option>');
                $.each(response, function(key, value) {
                    $('#add_freight_code').append('<option data-name="' + value["DESCR"] + '"  data-code=' + value["ACCOUNT_CODE"] + ' value=' + value["ACCOUNT_CODE"] + '>' + value["ACCOUNT_CODE"] + ' - ' + value["DESCR"] + '</option>');
                });
            },
            error: function(error) {
                console.log(error);
                alert("Contact IT Department");
            }
        });
        $("#order_form").on('change', '#add_freight_code', function() {
            var account_code = $('#add_freight_code').find(':selected').val();
            var account_name = $('#add_freight_code').find(':selected').attr("data-name");
            $('#select2-add_freight_code-container').html(account_code);
            $('#add_freight_desc').val(account_name);
            $('#view_item').css('display', '');
            $('#view_item').fadeIn("slow");
        });
        $.ajax({
            url: 'api/Inventory_management/inventory_locals/purchase_return_api.php',
            type: 'POST',
            data: {
                action: 'discounts_code',
                company_code: company_code
            },
            dataType: "json",
            success: function(response) {
                $("#ajax-loader").hide();
                $('#add_disc_code').html('');
                $('#add_disc_code').append('<option value="" selected disabled>Select Account</option>');
                $.each(response, function(key, value) {
                    $('#add_disc_code').append('<option data-name="' + value["DESCR"] + '"  data-code=' + value["ACCOUNT_CODE"] + ' value=' + value["ACCOUNT_CODE"] + '>' + value["ACCOUNT_CODE"] + ' - ' + value["DESCR"] + '</option>');
                });
            },
            error: function(error) {
                console.log(error);
                alert("Contact IT Department");
            }
        });
        $("#order_form").on('change', '#add_disc_code', function() {
            var account_code = $('#add_disc_code').find(':selected').val();
            var account_name = $('#add_disc_code').find(':selected').attr("data-name");
            $('#select2-add_disc_code-container').html(account_code);
            $('#add_disc_desc').val(account_name);
            $('#view_item').css('display', '');
            $('#view_item').fadeIn("slow");
        });
        $('#CompanyFormModel').modal('hide');
        $("#company_ref").focus();
    });
    $(document).ready(function() {
        $('#company_table').on('click', '.even', function() {
            var company_name = $(this).closest('tr').children('td:nth-child(2)').text();
            var company_code = $(this).closest('tr').children('td:nth-child(3)').text();
            $('#company_code').val(company_code);
            $('#company_name').val(company_name);
            $("#ajax-loader").show();
            var rowCount = $("#example1 tr").length;
            if (rowCount == 3) {
                $('#acc_desc').val('');
                $('#detail').val('');
                $('#memo').val('');
                $('#amount').val('');
                $('#total').val('');
                $('#debit').val('');
                $('#company_ref').val('');
                $('#v_no').val('');
                $('#name_p').val('');
                $('#party_ref').val('');
                $('#narration').val('');
                $('#gen_name').val('');
                $('#um_name').val('');
                $('#div_name').val('');
                $('#pichla_hisab').val('');
                $('#total_q').text('');
                $('#add_others_desc').val('');
                $('#add_freight_desc').val('');
                $('#add_disc_desc').val('');
                $('#dpt_1_desc').val('');
                $('#dpt_2_desc').val('');
                $('#dpt_3_desc').val('');
                $('#add_amount_calc').val('');
                $('#less_freight_calc').val('');
                $('#less_disc_calc').val('');
                $('#final_total_calc').val('');
                $('#dpt_1_code').val('');
                $('#dpt_2_code').val('');
                $('#dpt_3_code').val('');
                $('#view_item').css('display', 'none');
            } else {
                for (var a = 2; a < rowCount - 1; a++) {
                    var d = a - 1;
                    $('#tr' + d + '').remove();
                    $('#total').text('0');
                }
            }
            $.ajax({
                url: 'api/Inventory_management/inventory_locals/purchase_return_api.php',
                type: 'POST',
                data: {
                    action: 'item_code',
                    company_code: company_code
                },
                dataType: "json",
                success: function(response) {
                    $("#ajax-loader").hide();
                    $('#acc_desc').html('');
                    $('#acc_desc').append('<option value="" selected disabled>Select Item</option>');
                    $.each(response, function(key, value) {
                        $('#acc_desc').append('<option data-name="' + value["item_descr"] + '"  data-code=' + value["item_div"] + ' value=' + value["item_div"] + '>' + value["item_div"] + ' - ' + value["item_descr"] + '</option>');
                    });
                },
                error: function(error) {
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
            $.ajax({
                url: 'api/Inventory_management/inventory_locals/purchase_return_api.php',
                type: 'POST',
                data: {
                    action: 'party_code',
                    company_code: company_code
                },
                dataType: "json",
                success: function(response) {
                    $("#ajax-loader").hide();
                    $('#party').html('');
                    $('#party').append('<option value="" selected disabled>Select Party</option>');
                    $.each(response, function(key, value) {
                        $('#party').append('<option data-name="' + value["DESCR"] + '"  data-code=' + value["ACCOUNT_CODE"] + ' value=' + value["ACCOUNT_CODE"] + '>' + value["ACCOUNT_CODE"] + ' - ' + value["DESCR"] + '</option>');
                    });
                },
                error: function(error) {
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
            $.ajax({
                url: 'api/Inventory_management/inventory_locals/purchase_return_api.php',
                type: 'POST',
                data: {
                    action: 'discounts_code',
                    company_code: company_code
                },
                dataType: "json",
                success: function(response) {
                    $("#ajax-loader").hide();
                    $('#add_others_code').html('');
                    $('#add_others_code').append('<option value="" selected disabled>Select Account</option>');
                    $.each(response, function(key, value) {
                        $('#add_others_code').append('<option data-name="' + value["DESCR"] + '"  data-code=' + value["ACCOUNT_CODE"] + ' value=' + value["ACCOUNT_CODE"] + '>' + value["ACCOUNT_CODE"] + ' - ' + value["DESCR"] + '</option>');
                    });
                },
                error: function(error) {
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
            $("#order_form").on('change', '#add_others_code', function() {
                var account_code = $('#add_others_code').find(':selected').val();
                var account_name = $('#add_others_code').find(':selected').attr("data-name");
                $('#select2-add_others_code-container').html(account_code);
                $('#add_others_desc').val(account_name);
                $('#view_item').css('display', '');
                $('#view_item').fadeIn("slow");
            });
            $.ajax({
                url: 'api/Inventory_management/inventory_locals/purchase_return_api.php',
                type: 'POST',
                data: {
                    action: 'discounts_code',
                    company_code: company_code
                },
                dataType: "json",
                success: function(response) {
                    $("#ajax-loader").hide();
                    $('#add_freight_code').html('');
                    $('#add_freight_code').append('<option value="" selected disabled>Select Account</option>');
                    $.each(response, function(key, value) {
                        $('#add_freight_code').append('<option data-name="' + value["DESCR"] + '"  data-code=' + value["ACCOUNT_CODE"] + ' value=' + value["ACCOUNT_CODE"] + '>' + value["ACCOUNT_CODE"] + ' - ' + value["DESCR"] + '</option>');
                    });
                },
                error: function(error) {
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
            $("#order_form").on('change', '#add_freight_code', function() {
                var account_code = $('#add_freight_code').find(':selected').val();
                var account_name = $('#add_freight_code').find(':selected').attr("data-name");
                $('#select2-add_freight_code-container').html(account_code);
                $('#add_freight_desc').val(account_name);
                $('#view_item').css('display', '');
                $('#view_item').fadeIn("slow");
            });
            $.ajax({
                url: 'api/Inventory_management/inventory_locals/purchase_return_api.php',
                type: 'POST',
                data: {
                    action: 'discounts_code',
                    company_code: company_code
                },
                dataType: "json",
                success: function(response) {
                    $("#ajax-loader").hide();
                    $('#add_disc_code').html('');
                    $('#add_disc_code').append('<option value="" selected disabled>Select Account</option>');
                    $.each(response, function(key, value) {
                        $('#add_disc_code').append('<option data-name="' + value["DESCR"] + '"  data-code=' + value["ACCOUNT_CODE"] + ' value=' + value["ACCOUNT_CODE"] + '>' + value["ACCOUNT_CODE"] + ' - ' + value["DESCR"] + '</option>');
                    });
                },
                error: function(error) {
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
            $("#order_form").on('change', '#add_disc_code', function() {
                var account_code = $('#add_disc_code').find(':selected').val();
                var account_name = $('#add_disc_code').find(':selected').attr("data-name");
                $('#select2-add_disc_code-container').html(account_code);
                $('#add_disc_desc').val(account_name);
                $('#view_item').css('display', '');
                $('#view_item').fadeIn("slow");
            });
            $('#CompanyFormModel').modal('hide');
            $("#company_ref").focus();
        });
        $('#company_table').on('click', '.odd', function() {
            var company_name = $(this).closest('tr').children('td:nth-child(2)').text();
            var company_code = $(this).closest('tr').children('td:nth-child(3)').text();
            $('#company_code').val(company_code);
            $('#company_name').val(company_name);
            $("#ajax-loader").show();
            var rowCount = $("#example1 tr").length;
            if (rowCount == 3) {
                $('#acc_desc').val('');
                $('#detail').val('');
                $('#memo').val('');
                $('#amount').val('');
                $('#total').val('');
                $('#debit').val('');
                $('#company_ref').val('');
                $('#v_no').val('');
                $('#name_p').val('');
                $('#party_ref').val('');
                $('#narration').val('');
                $('#gen_name').val('');
                $('#um_name').val('');
                $('#div_name').val('');
                $('#pichla_hisab').val('');
                $('#total_q').text('');
                $('#add_others_desc').val('');
                $('#add_freight_desc').val('');
                $('#add_disc_desc').val('');
                $('#dpt_1_desc').val('');
                $('#dpt_2_desc').val('');
                $('#dpt_3_desc').val('');
                $('#add_amount_calc').val('');
                $('#less_freight_calc').val('');
                $('#less_disc_calc').val('');
                $('#final_total_calc').val('');
                $('#dpt_1_code').val('');
                $('#dpt_2_code').val('');
                $('#dpt_3_code').val('');
                $('#view_item').css('display', 'none');
            } else {
                for (var a = 2; a < rowCount - 1; a++) {
                    var d = a - 1;
                    $('#tr' + d + '').remove();
                    $('#total').text('0');
                }
            }
            $.ajax({
                url: 'api/Inventory_management/inventory_locals/purchase_return_api.php',
                type: 'POST',
                data: {
                    action: 'item_code',
                    company_code: company_code
                },
                dataType: "json",
                success: function(response) {
                    $("#ajax-loader").hide();
                    $('#acc_desc').html('');
                    $('#acc_desc').append('<option value="" selected disabled>Select Item</option>');
                    $.each(response, function(key, value) {
                        $('#acc_desc').append('<option data-name="' + value["item_descr"] + '"  data-code=' + value["item_div"] + ' value=' + value["item_div"] + '>' + value["item_div"] + ' - ' + value["item_descr"] + '</option>');
                    });
                },
                error: function(error) {
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
            $.ajax({
                url: 'api/Inventory_management/inventory_locals/purchase_return_api.php',
                type: 'POST',
                data: {
                    action: 'party_code',
                    company_code: company_code
                },
                dataType: "json",
                success: function(response) {
                    $("#ajax-loader").hide();
                    $('#party').html('');
                    $('#party').append('<option value="" selected disabled>Select Party</option>');
                    $.each(response, function(key, value) {
                        $('#party').append('<option data-name="' + value["DESCR"] + '"  data-code=' + value["ACCOUNT_CODE"] + ' value=' + value["ACCOUNT_CODE"] + '>' + value["ACCOUNT_CODE"] + ' - ' + value["DESCR"] + '</option>');
                    });
                },
                error: function(error) {
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
            $.ajax({
                url: 'api/Inventory_management/inventory_locals/purchase_return_api.php',
                type: 'POST',
                data: {
                    action: 'discounts_code',
                    company_code: company_code
                },
                dataType: "json",
                success: function(response) {
                    $("#ajax-loader").hide();
                    $('#add_others_code').html('');
                    $('#add_others_code').append('<option value="" selected disabled>Select Account</option>');
                    $.each(response, function(key, value) {
                        $('#add_others_code').append('<option data-name="' + value["DESCR"] + '"  data-code=' + value["ACCOUNT_CODE"] + ' value=' + value["ACCOUNT_CODE"] + '>' + value["ACCOUNT_CODE"] + ' - ' + value["DESCR"] + '</option>');
                    });
                },
                error: function(error) {
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
            $("#order_form").on('change', '#add_others_code', function() {
                var account_code = $('#add_others_code').find(':selected').val();
                var account_name = $('#add_others_code').find(':selected').attr("data-name");
                $('#select2-add_others_code-container').html(account_code);
                $('#add_others_desc').val(account_name);
                $('#view_item').css('display', '');
                $('#view_item').fadeIn("slow");
            });
            $.ajax({
                url: 'api/Inventory_management/inventory_locals/purchase_return_api.php',
                type: 'POST',
                data: {
                    action: 'discounts_code',
                    company_code: company_code
                },
                dataType: "json",
                success: function(response) {
                    $("#ajax-loader").hide();
                    $('#add_freight_code').html('');
                    $('#add_freight_code').append('<option value="" selected disabled>Select Account</option>');
                    $.each(response, function(key, value) {
                        $('#add_freight_code').append('<option data-name="' + value["DESCR"] + '"  data-code=' + value["ACCOUNT_CODE"] + ' value=' + value["ACCOUNT_CODE"] + '>' + value["ACCOUNT_CODE"] + ' - ' + value["DESCR"] + '</option>');
                    });
                },
                error: function(error) {
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
            $("#order_form").on('change', '#add_freight_code', function() {
                var account_code = $('#add_freight_code').find(':selected').val();
                var account_name = $('#add_freight_code').find(':selected').attr("data-name");
                $('#select2-add_freight_code-container').html(account_code);
                $('#add_freight_desc').val(account_name);
                $('#view_item').css('display', '');
                $('#view_item').fadeIn("slow");
            });
            $.ajax({
                url: 'api/Inventory_management/inventory_locals/purchase_return_api.php',
                type: 'POST',
                data: {
                    action: 'discounts_code',
                    company_code: company_code
                },
                dataType: "json",
                success: function(response) {
                    $("#ajax-loader").hide();
                    $('#add_disc_code').html('');
                    $('#add_disc_code').append('<option value="" selected disabled>Select Account</option>');
                    $.each(response, function(key, value) {
                        $('#add_disc_code').append('<option data-name="' + value["DESCR"] + '"  data-code=' + value["ACCOUNT_CODE"] + ' value=' + value["ACCOUNT_CODE"] + '>' + value["ACCOUNT_CODE"] + ' - ' + value["DESCR"] + '</option>');
                    });
                },
                error: function(error) {
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
            $("#order_form").on('change', '#add_disc_code', function() {
                var account_code = $('#add_disc_code').find(':selected').val();
                var account_name = $('#add_disc_code').find(':selected').attr("data-name");
                $('#select2-add_disc_code-container').html(account_code);
                $('#add_disc_desc').val(account_name);
                $('#view_item').css('display', '');
                $('#view_item').fadeIn("slow");
            });
            $('#CompanyFormModel').modal('hide');
            $("#company_ref").focus();
        });
        $('#order_form').on('focus', '#division', function() {
            var company_code = $('#company_code').val();
            if (company_code == '') {
                $('#msg1').html("select company first");
            } else {
                $('#division_table').dataTable().fnDestroy();
                table = $('#division_table').DataTable({
                    dom: 'Bfrtip',
                    orderCellsTop: true,
                    fixedHeader: true,
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print',
                    ]
                });
                $('#division_table thead tr:eq(1) th').each(function(i) {
                    var title = $(this).text();
                    $(this).html('<input type="text" class="form-control" placeholder="Search ' + title + '" />');
                    $('input', this).on('keyup change', function() {
                        if (table.column(i).search() !== this.value) {
                            table
                                .column(i)
                                .search(this.value)
                                .draw();
                        }
                    });
                });
                $.ajax({
                    url: 'api/setup/party_api.php',
                    type: 'POST',
                    data: {
                        action: 'division_code'
                    },
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        table.clear().draw();
                        var sno = '0';
                        for (var i = 0; i < data.length; i++) {
                            sno++;
                            table.row.add([sno, data[i].div_name, data[i].div_code]);
                        }
                        table.draw();
                    },
                    error: function(error) {
                        console.log(error);
                        alert("Contact IT Department");
                    }
                });
                $('#DivisionFormModel').modal('show');
            }
        });
        $('#division_table').on('click', '.odd', function() {
            var division_name = $(this).closest('tr').children('td:nth-child(2)').text();
            var division_code = $(this).closest('tr').children('td:nth-child(3)').text();
            $('#division').val(division_code);
            $('#division_name').val(division_name);
            var company_code = $("#company_code").val();
            var purchase_mode = $("#purchase_mode").val();
            $("#msg1").html('');
            $('#DivisionFormModel').modal('hide');
            $("#narration").focus();
        });
        $('#division_table').on('click', '.even', function() {
            var division_name = $(this).closest('tr').children('td:nth-child(2)').text();
            var division_code = $(this).closest('tr').children('td:nth-child(3)').text();
            $('#division').val(division_code);
            $('#division_name').val(division_name);
            var company_code = $("#company_code").val();
            $("#msg1").html('');
            var company_code = $("#company_code").val();
            var purchase_mode = $("#purchase_mode").val();
            $("#msg1").html('');
            $('#DivisionFormModel').modal('hide');
            $("#narration").focus();
        });
        $('#purchase_mode').change(function() {
            var company_code = $("#company_code").val();
            var division_code = $("#division").val();
            var purchase_mode = $("#purchase_mode").val();
            if (division_code != '' && company_code != '') {
                $.ajax({
                    url: 'api/Inventory_management/inventory_locals/purchase_return_api.php',
                    type: 'POST',
                    data: {
                        action: 'document_no',
                        company_code: company_code,
                        division_code: division_code,
                        purchase_mode: purchase_mode
                    },
                    dataType: "json",
                    success: function(data) {
                        doc_no = data.doc_no;
                        $('#doc_no').val(doc_no);
                        var doc_no = $('#doc_no').val();
                        if (doc_no != '' && division_code != '' && company_code != '' && purchase_mode != '') {
                            var sale_code = company_code + '-' + division_code + '-' + purchase_mode + '-' + doc_no;
                            $('#sale_code').val(sale_code);
                        }
                    },
                    error: function(error) {
                        console.log(error);
                        alert("Contact IT Department");
                    }
                });
            }
        });
    });
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
    $(function() {
        $.validator.setDefaults({
            submitHandler: function() {}
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
                party: {
                    required: true,
                },
                name_p: {
                    required: true,
                },
                purchase_mode: {
                    required: true,
                }
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
    $("#order_form").on('change', '#voucher_date', function() {
        var date = new Date($('#voucher_date').val());
        var year = date.getFullYear();
        $('#year').val(year);
    });
    $('#example1').ready(function() {
        var company_code = $('#company_code').val();
        $("#order_form").on('change', '#acc_desc', function() {
            var account_code = $('#acc_desc').find(':selected').val();
            var detail = $('#acc_desc').find(':selected').attr("data-name");
            $('#select2-acc_desc-container').html(account_code);
            $('#detail').val(detail);
            $('#view_item').css('display', '');
            $('#view_item').fadeIn("slow");
        });
        $("#order_form").on('change', '.acc_desc', function() {
            var target = event.target || event.srcElement;
            var id = target.id;
            var id = id.split("-");
            id = id[1];
            var id = id.split("acc_desc");
            id = id[1];
            if ($('#amount' + id).val() != '') {
                var deduct = $('#amount' + id).val()
            } else {
                var deduct = '0';
            }
            var total = $('#total').text();
            console.log(total);
            console.log(deduct);
            var final_total = parseFloat(total) - parseFloat(deduct);
            console.log(final_total);
            $('#total').html(final_total);
            var account_code = $('#acc_desc' + id).find(':selected').val();
            var detail = $('#acc_desc' + id).find(':selected').attr("data-name");
            $('#select2-acc_desc' + id + '-container').html(account_code);
            $('#detail' + id).val(detail);
            $.ajax({
                url: 'api/Inventory_management/inventory_locals/purchase_return_api.php',
                type: 'POST',
                data: {
                    action: 'item_detail',
                    item_code: account_code
                },
                dataType: "json",
                success: function(data) {
                    $('#division_i').val(data.division_name);
                    $('#gen_i').val(data.gen_name);
                    $('#um_i').val(data.unit_name);
                },
                error: function(error) {
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
        });
    });
    $('#example1').ready(function() {
        var company_code = $('#company_code').val();
        $("#order_form").on('change', '#party', function() {
            var party_code = $('#party').find(':selected').val();
            var party_name = $('#party').find(':selected').attr("data-name");
            $('#select2-party-container').html(party_code);
            $('#name_p').val(party_name);
            $('#view_item').css('display', '');
            $('#view_item').fadeIn("slow");
        });
    });
    $('#example1').ready(function() {
        var i = 0;
        var f = 1;
        var total_amount = 0;
        $('.add').click(function() {
            var company_code = $('#company_code').val();
            i++;
            var acc_desc = $('#acc_desc').val();
            var detail = $("#detail").val();
            var type = $("#type").val();
            var loc_i = $("#loc_i").val();
            var grnref_i = $("#grnref_i").val();
            var batch_i = $("#batch_i").val();
            var expirydt_i = $("#expirydt_i").val();
            var quantity = $("#quantity").val();
            var rates = $("#rate").val();
            rate = rates.replaceAll(',', '');
            var amounts = $("#amount").val();
            amount = amounts.replaceAll(',', '');
            var division_i = $("#division_i").val();
            var gen_i = $("#gen_i").val();
            var um_i = $("#um_i").val();
            var div_name_ = $("#div_name_").val();
            var gen_name = $("#gen_name").val();
            var um_name = $("#um_name").val();
            var total_balance = $("#total_balance").val();
            var div_name = $("#div_name").val();
            var gen_name_hidden = $("#gen_name_hidden").val();
            var um_name_hidden = $("#um_name_hidden").val();
            var total_balance_hidden = $("#total_balance_hidden").val();
            var div_name_hidden = $("#div_name_hidden").val();
            if (acc_desc == "") {
                $('#msg').text("Item can't be the null.");
            } else if (loc_i == "") {
                $('#msg').text("Location can't be the null.");
            } else if (grnref_i == "") {
                $('#msg').text("GRN REF can't be the null.");
            } else if (quantity == "") {
                $('#msg').text("Quantity can't be the null.");
            } else if (rate == "") {
                $('#msg').text("Rate can't be the null.");
            } else if (amount <= 0) {
                $('#msg').text("Amount can't be the null.");
            } else {
                $('#msg').text("");
                $("#amount").val('0');
                $("#acc_desc").val('');
                $("#detail").val('');
                $("#grnref_i").val('');
                $("#batch_i").val('');
                $("#expirydt_i").val('');
                $("#loc_i").val('');
                $("#quantity").val('');
                $("#division_i").val('');
                $("#gen_i").val('');
                $("#um_i").val('');
                $("#rate").val('');
                $("#gen_name").val('');
                $("#um_name").val('');
                $("#total_balance").val('');
                $("#div_name").val('');
                $("#gen_name_hidden").val('');
                $("#um_name_hidden").val('');
                $("#total_balance_hidden").val('');
                $("#div_name_hidden").val('');
                $('#d_items tr:last').before('<tr id="tr' + i + '" class="tr"><td style="width: 8%;"><input style="padding:0 2px 0 0;width:83px;height:35px;background-color:#b7edea;" type="text"  name="acc_desc[]" id="acc_desc' + i + '" class="acc_desc form-control-sm" readonly></td><td style="width: 13%;"><textarea style="height:35px;background-color:#ccd4e1;" rows="1" type="text" name="detail[]" id = "detail' + i + '" class="form-control form-control-sm detail"readonly></textarea></td><td><select style="font-size:11px;width:75px !important;height:35px" name="type[]" id = "type' + i + '" class="form-control form-control-sm type"><option value="0" readonly="readonly" selected>Type</option><option value="N">N</option><option value="F">F</option><option value="S">S</option><option value="T">T</option></select></td><td style="width: 10%;"><textarea  style="width:100px;height:35px;background-color:#b7edea;font-size:12px"   type="text"  name="loc_i[]" id = "loc_i' + i + '" class="loc_i" readonly></textarea></td><td style="width: 10%;"><textarea style="width:100px;height:35px;font-size:12px"   tabindex="-1"  type="text"  name="grnref_i[]" id = "grnref_i' + i + '" class="grnref_i"></textarea></td><td style="width: 10%;"><textarea  style="width:100px;height:35px;background-color:#ccd4e1;font-size:12px"   type="text"  name="batch_i[]" id = "batch_i' + i + '" class="batch_i" readonly></textarea></td><td style="width: 10%;"><textarea  style="width:100px;height:35px;background-color:#ccd4e1;font-size:12px"   type="text"  name="expirydt_i[]" id = "expirydt_i' + i + '" class="expirydt_i" readonly></textarea></td><td style="width: 8%;"><input style="text-align:right; padding:0 2px 0 0;width:83px;height:35px" type="text"  name="quantity[]" id="quantity' + i + '" class="quantity calc_kar"></td><td style="width: 10%;"><input  style="text-align:right; padding:0 2px 0 0;width:100px;height:35px"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="rate[]" id = "rate' + i + '" class="rate calc_kar"></td><td style="width: 10%;"><input style="text-align:right; padding:0 2px 0 0;width:100px;height:35px;background-color:#b7edea"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text" tabindex="-1"  name="amount[]" id = "amount' + i + '" class="amount" readonly></td><td style="display: none; width: 10%;"><input  style="display: none; text-align:right; padding:0 2px 0 0;width:100px;height:35px;background-color:#c1c1c1"    type="text" tabindex="-1"  name="gen_name[]" id = "gen_name_hidden' + i + '" class="gen_name" readonly></td><td style="display: none; width: 10%;"><input  style="display: none; text-align:right; padding:0 2px 0 0;width:100px;height:35px;background-color:#c1c1c1"    type="text" tabindex="-1"  name="um_name[]" id = "um_name_hidden' + i + '" class="um_name" readonly></td><td style="display: none; width: 10%;"><input  style="display: none; text-align:right; padding:0 2px 0 0;width:100px;height:35px;background-color:#c1c1c1"    type="text" tabindex="-1"  name="total_balance[]" id = "total_balance_hidden' + i + '" class="total_balance" readonly></td><td style="display: none; width: 10%;"><input  style="display: none; text-align:right; padding:0 2px 0 0;width:100px;height:35px;background-color:#c1c1c1"    type="text" tabindex="-1"  name="div_name[]" id = "div_name_hidden' + i + '" class="div_name" readonly></td><td><button type = "button" id="' + i + '" class="btn btn-sm btn-danger remove"><b>X<b></button></td></tr>');
                $('#type').prop("selectedIndex", 0).val();
                $('#order_form').on('focus', '#acc_desc' + f, function() {
                    var target = event.target || event.srcElement;
                    var id = target.id;
                    var id = id.split("acc_desc");
                    id = id[1];
                    var company_code = $('#company_code').val();
                    $('#item_table_add').dataTable().fnDestroy();
                    table = $('#item_table_add').DataTable({
                        dom: 'Bfrtip',
                        orderCellsTop: true,
                        fixedHeader: true,
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print',
                        ]
                    });
                    $('#item_table_add thead tr:eq(1) th').each(function(i) {
                        var title = $(this).text();
                        $(this).html('<input type="text" class="form-control" placeholder="Search ' + title + '" />');
                        $('input', this).on('keyup change', function() {
                            if (table.column(i).search() !== this.value) {
                                table
                                    .column(i)
                                    .search(this.value)
                                    .draw();
                            }
                        });
                    });
                    $.ajax({
                        url: 'api/Inventory_management/inventory_locals/purchase_return_api.php',
                        type: 'POST',
                        data: {
                            action: 'item_code',
                            company_code: company_code
                        },
                        dataType: "json",
                        success: function(response) {
                            table.clear().draw();
                            var sno = '0';
                            for (var i = 0; i < response.length; i++) {
                                sno++;
                                table.row.add([sno, response[i].item_name, response[i].pur_mode, response[i].div_name, response[i].gen_name, response[i].item, response[i].co_code, response[i].div_code, response[i].um_name]);
                            }
                            table.draw();
                            $('#item_table_add').on('click', '.even', function() {
                                var target = event.target || event.srcElement;
                                console.log(id);
                                if ($('#amount' + id).val() != '') {
                                    var deduct = $('#amount' + id).val()
                                    deduct = deduct.replaceAll(',', '');
                                } else {
                                    var deduct = '0';
                                }
                                var total = $('#total').text();
                                total = total.replaceAll(',', '');
                                var final_total = parseFloat(total) - parseFloat(deduct);
                                var final_total_formatted = new Intl.NumberFormat(
                                    'en-US', {
                                        style: 'currency',
                                        currency: 'USD',
                                        currencyDisplay: 'narrowSymbol'
                                    }).format(final_total);
                                var final_total_formatted = final_total_formatted.replace(/[$]/g, '');
                                $('#total').html(final_total_formatted);
                                if ($('#quantity' + id).val() != '') {
                                    var deduct_q = $('#quantity' + id).val()
                                } else {
                                    var deduct_q = '0';
                                }
                                var total_q = $('#total_q').text();
                                var final_total_q = parseFloat(total_q) - parseFloat(deduct_q);
                                var final_total_q_formatted = new Intl.NumberFormat(
                                    'en-US', {
                                        style: 'currency',
                                        currency: 'USD',
                                        currencyDisplay: 'narrowSymbol'
                                    }).format(final_total_q);
                                var final_total_q_formatted = final_total_q_formatted.replace(/[$]/g, '');
                                $('#total_q').html(final_total_q_formatted);
                                $('#quantity' + id).val('0');
                                $('#rate' + id).val('0');
                                $('#amount' + id).val('0');
                                $('#batch_i' + id).val('');
                                $('#expirydt_i' + id).val('');
                                $('#gen_name').val('');
                                $('#um_name').val('');
                                $('#div_name').val('');
                                $('#grnref_i' + id).val('');
                                $('#add_amount_calc').val('0.00');
                                $('#less_freight_calc').val('0.00');
                                $('#less_disc_calc').val('0.00');
                                $('#final_total_calc').val(final_total_formatted);
                                var item_code = $(this).closest('tr').children('td:nth-child(6)').text();
                                var item_name = $(this).closest('tr').children('td:nth-child(2)').text();
                                var div_name = $(this).closest('tr').children('td:nth-child(4)').text();
                                var gen_name = $(this).closest('tr').children('td:nth-child(5)').text();
                                var um_name = $(this).closest('tr').children('td:nth-child(9)').text();
                                $('#acc_desc' + id).val(item_code);
                                $('#detail' + id).val(item_name);
                                $('#div_name' + id).val(div_name);
                                $('#gen_name' + id).val(gen_name);
                                $('#um_name' + id).val(um_name);
                                $('#ItemCodeModalAdd').modal('hide');
                                $("#type" + id).focus();
                            });
                            $('#item_table_add').on('click', '.odd', function() {
                                var target = event.target || event.srcElement;
                                console.log(id);
                                if ($('#amount' + id).val() != '') {
                                    var deduct = $('#amount' + id).val()
                                    deduct = deduct.replaceAll(',', '');
                                } else {
                                    var deduct = '0';
                                }
                                var total = $('#total').text();
                                total = total.replaceAll(',', '');
                                var final_total = parseFloat(total) - parseFloat(deduct);
                                var final_total_formatted = new Intl.NumberFormat(
                                    'en-US', {
                                        style: 'currency',
                                        currency: 'USD',
                                        currencyDisplay: 'narrowSymbol'
                                    }).format(final_total);
                                var final_total_formatted = final_total_formatted.replace(/[$]/g, '');
                                $('#total').html(final_total_formatted);
                                if ($('#quantity' + id).val() != '') {
                                    var deduct_q = $('#quantity' + id).val()
                                } else {
                                    var deduct_q = '0';
                                }
                                var total_q = $('#total_q').text();
                                var final_total_q = parseFloat(total_q) - parseFloat(deduct_q);
                                var final_total_q_formatted = new Intl.NumberFormat(
                                    'en-US', {
                                        style: 'currency',
                                        currency: 'USD',
                                        currencyDisplay: 'narrowSymbol'
                                    }).format(final_total_q);
                                var final_total_q_formatted = final_total_q_formatted.replace(/[$]/g, '');
                                $('#total_q').html(final_total_q_formatted);
                                $('#quantity' + id).val('0');
                                $('#rate' + id).val('0');
                                $('#amount' + id).val('0');
                                $('#batch_i' + id).val('');
                                $('#expirydt_i' + id).val('');
                                $('#gen_name').val('');
                                $('#um_name').val('');
                                $('#div_name').val('');
                                $('#grnref_i' + id).val('');
                                $('#add_amount_calc').val('0.00');
                                $('#less_freight_calc').val('0.00');
                                $('#less_disc_calc').val('0.00');
                                $('#final_total_calc').val(final_total_formatted);
                                var item_code = $(this).closest('tr').children('td:nth-child(6)').text();
                                var item_name = $(this).closest('tr').children('td:nth-child(2)').text();
                                var div_name = $(this).closest('tr').children('td:nth-child(4)').text();
                                var gen_name = $(this).closest('tr').children('td:nth-child(5)').text();
                                var um_name = $(this).closest('tr').children('td:nth-child(9)').text();
                                $('#acc_desc' + id).val(item_code);
                                $('#detail' + id).val(item_name);
                                $('#div_name' + id).val(div_name);
                                $('#gen_name' + id).val(gen_name);
                                $('#um_name' + id).val(um_name);
                                $('#ItemCodeModalAdd').modal('hide');
                                $("#type" + id).focus();
                            });
                        },
                        error: function(error) {
                            console.log(error);
                            alert("Contact IT Department");
                        }
                    });
                    $('#ItemCodeModalAdd').modal('show');
                });
                $('#order_form').on('focus', '#loc_i' + i, function() {
                    var target = event.target || event.srcElement;
                    var id = target.id;
                    var id = id.split("loc_i");
                    id = id[1];
                    var company_code = $('#company_code').val();
                    var item_code = $('#acc_desc' + id).val();
                    console.log(company_code);
                    console.log(item_code);
                    $('#loc_table_add').dataTable().fnDestroy();
                    table = $('#loc_table_add').DataTable({
                        dom: 'Bfrtip',
                        orderCellsTop: true,
                        fixedHeader: true,
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print',
                        ]
                    });
                    $('#loc_table_add thead tr:eq(1) th').each(function(i) {
                        var title = $(this).text();
                        $(this).html('<input type="text" class="form-control" placeholder="Search ' + title + '" />');
                        $('input', this).on('keyup change', function() {
                            if (table.column(i).search() !== this.value) {
                                table
                                    .column(i)
                                    .search(this.value)
                                    .draw();
                            }
                        });
                    });
                    $.ajax({
                        url: 'api/Inventory_management/inventory_locals/purchase_return_api.php',
                        type: 'POST',
                        data: {
                            action: 'loc_code',
                            company_code: company_code,
                            item_code: item_code
                        },
                        dataType: "json",
                        success: function(response) {
                            table.clear().draw();
                            var sno = '0';
                            for (var i = 0; i < response.length; i++) {
                                sno++;
                                table.row.add([response[i].ITEM_CODE, response[i].item_name, response[i].ITEM_HSCODE, response[i].ITEM_TAXRATE, "-", response[i].G_D, response[i].GD_DATE, response[i].BATCH_NO, response[i].EXPIRY_DATE, response[i].LOC_CODE, response[i].loc_name, response[i].CO_CODE, response[i].BAL_STOCK]);
                            }
                            table.draw();
                            $('#loc_table_add').on('click', '.even', function() {
                                var batch_no = $(this).closest('tr').children('td:nth-child(8)').text();
                                var expiry_date = $(this).closest('tr').children('td:nth-child(9)').text();
                                var loc = $(this).closest('tr').children('td:nth-child(10)').text();
                                var bal = $(this).closest('tr').children('td:nth-child(12)').text();
                                $('#batch_i' + id).val(batch_no);
                                $('#expirydt_i' + id).val(expiry_date);
                                $('#loc_i' + id).val(loc);
                                $('#pichla_hisab' + id).val(bal);
                                $('#total_balance' + id).val(bal);
                                $('#LocCodeModalAdd').modal('hide');
                                $("#grnref_i").focus();
                            });
                            $('#loc_table_add').on('click', '.odd', function() {
                                var batch_no = $(this).closest('tr').children('td:nth-child(8)').text();
                                var expiry_date = $(this).closest('tr').children('td:nth-child(9)').text();
                                var loc = $(this).closest('tr').children('td:nth-child(10)').text();
                                var bal = $(this).closest('tr').children('td:nth-child(12)').text();
                                alert(bal)
                                $('#batch_i' + id).val(batch_no);
                                $('#expirydt_i' + id).val(expiry_date);
                                $('#loc_i' + id).val(loc);
                                $('#pichla_hisab' + id).val(bal);
                                $('#total_balance' + id).val(bal);
                                $('#LocCodeModalAdd').modal('hide');
                                $("#grnref_i").focus();
                            });
                        },
                        error: function(error) {
                            console.log(error);
                            alert("Contact IT Department");
                        }
                    });
                    $('#LocCodeModalAdd').modal('show');
                });
                f++;
                console.log(type);
                if (type == '' || type == '0') {
                    $('#type' + i + '').prop("selectedIndex", 0).val();
                } else {
                    $('#type' + i + '').val(type);
                }
                $('#acc_desc' + i + '').val(acc_desc);
                $('#detail' + i + '').val(detail);
                $('#loc_i' + i + '').val(loc_i);
                $('#grnref_i' + i + '').val(grnref_i);
                $('#batch_i' + i + '').val(batch_i);
                $('#expirydt_i' + i + '').val(expirydt_i);
                $('#quantity' + i + '').val(quantity);
                $('#rate' + i + '').val(rates);
                $('#amount' + i + '').val(amounts);
                $('#gen_name_hidden' + i + '').val(gen_name_hidden);
                $('#um_name_hidden' + i + '').val(um_name_hidden);
                $('#total_balance_hidden' + i + '').val(total_balance_hidden);
                $('#div_name_hidden' + i + '').val(div_name_hidden);
                $('#quantity' + i + '').css('text-align', 'right');
                $('#quantity' + i + '').css('padding', '0 1px 0 0');
                $('#rate' + i + '').css('text-align', 'right ');
                $('#rate' + i + '').css('padding', '0 1px 0 0');
                $('#amount' + i + '').css('text-align', 'right ');
                $('#amount' + i + '').css('padding', '0 1px 0 0');
            }
            $('#example1').on('click', '.tr', function() {
                var button_id = $(this).attr("id");
                if (button_id == 'main_tr') {
                    var item_code = $('#acc_desc').val();
                    if (item_code == '') {
                        $('#gen_name').val('');
                        $('#um_name').val('');
                        $('#total_balance').val('');
                        $('#div_name').val('');
                    } else {
                        var product_code = $('#acc_descr').val();
                        if (product_code == null) {
                            product_code = 0;
                        }
                        $.ajax({
                            url: 'api/Inventory_management/inventory_locals/po_local_api.php',
                            type: 'POST',
                            data: {
                                action: 'item_detail_tr',
                                product_code: product_code,
                                item_code: item_code
                            },
                            dataType: "json",
                            success: function(response) {
                                $('#division_i').val(response.div_name);
                                $('#gen_i').val(response.gen_name);
                                $('#um_i').val(response.unit_name);
                                $('#product_name').val(response.product_name);
                            },
                            error: function(error) {
                                console.log(error);
                                alert("Contact IT Department");
                            }
                        });
                    }
                } else {
                    var button_id = button_id.split("tr");
                    var id = button_id[1];
                    var gen_name = $('#gen_name_hidden' + id + '').val();
                    var um_name = $('#um_name_hidden' + id + '').val();
                    var total_balance = $('#total_balance_hidden' + id + '').val();
                    var div_name = $('#div_name_hidden' + id + '').val();
                    $('#gen_name').val(gen_name);
                    $('#um_name').val(um_name);
                    $('#total_balance').val(total_balance);
                    $('#div_name').val(div_name);
                }
            });
        });
        $('#example1').on('click', '.remove', function() {
            var button_id = $(this).attr("id");
            var remove_amount = $('#amount' + button_id + '').val();
            var remove_quantity = $('#quantity' + button_id + '').val();
            remove_amount = remove_amount.replaceAll(',', '');
            remove_quantity = remove_quantity.replaceAll(',', '');
            $('#tr' + button_id + '').remove();
            var current_amount = $('#total').text();
            var current_quantity = $('#total_q').text();
            current_amount = current_amount.replaceAll(',', '');
            current_quantity = current_quantity.replaceAll(',', '');
            var total_amount = parseFloat(current_amount) - parseFloat(remove_amount);
            if (isNaN(total_amount)) {
                total_amount = '0';
            } else {
                total_amount = total_amount;
            }
            var total_amount_formatted = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(total_amount);
            var total_amount_formatted = total_amount_formatted.replace(/[$]/g, '');
            $('#add_amount_calc').val('0.00');
            $('#less_freight_calc').val('0.00');
            $('#less_disc_calc').val('0.00');
            $('#final_total_calc').val(total_amount_formatted);
            $('#total').text(total_amount_formatted);
            var total_quantity = parseFloat(current_quantity) - parseFloat(remove_quantity);
            if (isNaN(total_quantity)) {
                total_quantity = '0';
            } else {
                total_quantity = total_quantity.toLocaleString();
            }
            $('#total_q').text(total_quantity);
        });
    });
    $(document).ready(function() {
        $('#item_table').on('click', '.even', function() {
            var item_code = $(this).closest('tr').children('td:nth-child(6)').text();
            var item_name = $(this).closest('tr').children('td:nth-child(2)').text();
            var div_name = $(this).closest('tr').children('td:nth-child(4)').text();
            var gen_name = $(this).closest('tr').children('td:nth-child(5)').text();
            var um_name = $(this).closest('tr').children('td:nth-child(9)').text();
            $('#acc_desc').val(item_code);
            $('#detail').val(item_name);
            $('#div_name').val(div_name);
            $('#div_name_hidden').val(div_name);
            $('#gen_name').val(gen_name);
            $('#gen_name_hidden').val(gen_name);
            $('#um_name').val(um_name);
            $('#um_name_hidden').val(um_name);
            $('#ItemCodeModal').modal('hide');
            $("#type").focus();
        });
        $('#item_table').on('click', '.odd', function() {
            var item_code = $(this).closest('tr').children('td:nth-child(6)').text();
            var item_name = $(this).closest('tr').children('td:nth-child(2)').text();
            var div_name = $(this).closest('tr').children('td:nth-child(4)').text();
            var gen_name = $(this).closest('tr').children('td:nth-child(5)').text();
            var um_name = $(this).closest('tr').children('td:nth-child(9)').text();
            $('#acc_desc').val(item_code);
            $('#detail').val(item_name);
            $('#div_name').val(div_name);
            $('#div_name_hidden').val(div_name);
            $('#gen_name').val(gen_name);
            $('#gen_name_hidden').val(gen_name);
            $('#um_name').val(um_name);
            $('#um_name_hidden').val(um_name);
            $('#ItemCodeModal').modal('hide');
            $("#type").focus();
        });
    });
    $(document).ready(function() {
        $('#loc_table').on('click', '.even', function() {
            var batch_no = $(this).closest('tr').children('td:nth-child(8)').text();
            var expiry_date = $(this).closest('tr').children('td:nth-child(9)').text();
            var loc = $(this).closest('tr').children('td:nth-child(10)').text();
            var bal = $(this).closest('tr').children('td:nth-child(13)').text();
            $('#batch_i').val(batch_no);
            $('#expirydt_i').val(expiry_date);
            $('#loc_i').val(loc);
            $('#total_balance').val(bal);
            $('#total_balance_hidden').val(bal);
            $('#LocCodeModal').modal('hide');
            $("#grnref_i").focus();
        });
        $('#loc_table').on('click', '.odd', function() {
            var batch_no = $(this).closest('tr').children('td:nth-child(8)').text();
            var expiry_date = $(this).closest('tr').children('td:nth-child(9)').text();
            var loc = $(this).closest('tr').children('td:nth-child(10)').text();
            var bal = $(this).closest('tr').children('td:nth-child(13)').text();
            $('#batch_i').val(batch_no);
            $('#expirydt_i').val(expiry_date);
            $('#loc_i').val(loc);
            $('#total_balance').val(bal);
            $('#total_balance_hidden').val(bal);
            $('#LocCodeModal').modal('hide');
            $("#grnref_i").focus();
        });
    });
    $("#order_form").on("submit", function(e) {
        if ($("#order_form").valid()) {
            var rowCount = $("#example1 tr").length;
            if (rowCount > 3) {
                var quantity = $('#quantity').val();
                var rate = $('#rate').val();
                var amount = $('#amount').val();
                if (quantity == '' && rate == '' && amount == '0' || amount == '0.00') {
                    e.preventDefault();
                    var formData = new FormData(this);
                    var total = $('#total').text();
                    formData.append('debit', total);
                    var company_code = $('#company_code').val();
                    formData.append('company_code', company_code);
                    formData.append('action', 'insert');
                    $.ajax({
                        url: 'api/Inventory_management/inventory_locals/purchase_return_api.php',
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(response) {
                            console.log(response);
                            $("#ajax-loader").hide();
                            var message = response.message
                            var status = response.status
                            $.ajax({
                                url: "api/message_session/message_session.php",
                                type: 'POST',
                                data: {
                                    message: message,
                                    status: status
                                },
                                success: function(data1) {
                                    if (status == 0) {
                                        $("#msg").html(message);
                                    } else {
                                        $.get('inventory_management/inventory_local/add_purchase_return.php', function(data, status) {
                                            $('#content').html(data);
                                        });
                                    }
                                },
                                error: function(e) {
                                    console.log(e);
                                    alert("Contact IT Department");
                                }
                            });
                        },
                        error: function(e) {
                            console.log(e);
                            alert("Contact IT Department");
                        }
                    });
                } else {
                    $("#msg").html("Click on Add Row otherwise the last Row will not be count");
                }
            } else {
                $("#msg").html("Click on Insert Row");
            }
        }
    });
    $("#order_form").on('change', '#add_others_code', function() {
        var target = event.target || event.srcElement;
        var id = target.id;
        var id = id.split("-");
        id = id[1];
        var id = id.split("add_others_code");
        id = id[1];
        $('#dpt_1_desc').val('');
        var account_code = $('#add_others_code' + id).find(':selected').val();
        var detail = $('#add_others_code' + id).find(':selected').attr("data-name");
        $('#select2-add_others_code' + id + '-container').html(account_code);
        $('#add_others_desc' + id).val(detail);
        $.ajax({
            url: 'api/Inventory_management/inventory_locals/purchase_return_api.php',
            type: 'POST',
            data: {
                action: 'account_detail',
                account_code: account_code
            },
            dataType: "json",
            success: function(data) {},
            error: function(error) {
                console.log(error);
                alert("Contact IT Department");
            }
        });
        $.ajax({
            url: 'api/Inventory_management/inventory_locals/purchase_return_api.php',
            type: 'POST',
            data: {
                action: 'account_detail',
                account_code: account_code
            },
            dataType: "json",
            success: function(response1) {
                $("#ajax-loader").hide();
                console.log(response1);
                $('#dpt_1_code').html('');
                $('#dpt_1_code').append('<option value="" selected disabled>Select Dpt Code</option>');
                $.each(response1, function(key, value) {
                    $('#dpt_1_code').append('<option data-name="' + value["DEPT_NAME"] + '" data-code=' + value["DEPT_CODE"] + ' value=' + value["DEPT_CODE"] + '>' + value["DEPT_CODE"] + ' - ' + value["DEPT_NAME"] + '</option>');
                });
            },
            error: function(error) {
                console.log(error);
                alert("Contact IT Department");
            }
        });
    });
    $("#order_form").on('change', '#add_freight_code', function() {
        var target = event.target || event.srcElement;
        var id = target.id;
        var id = id.split("-");
        id = id[1];
        var id = id.split("add_freight_code");
        id = id[1];
        $('#dpt_2_desc').val('');
        var account_code = $('#add_freight_code' + id).find(':selected').val();
        var detail = $('#add_freight_code' + id).find(':selected').attr("data-name");
        $('#select2-add_freight_code' + id + '-container').html(account_code);
        $('#add_freight_desc' + id).val(detail);
        $.ajax({
            url: 'api/Inventory_management/inventory_locals/purchase_return_api.php',
            type: 'POST',
            data: {
                action: 'account_detail',
                account_code: account_code
            },
            dataType: "json",
            success: function(data) {},
            error: function(error) {
                console.log(error);
                alert("Contact IT Department");
            }
        });
        $.ajax({
            url: 'api/Inventory_management/inventory_locals/purchase_return_api.php',
            type: 'POST',
            data: {
                action: 'account_detail',
                account_code: account_code
            },
            dataType: "json",
            success: function(response1) {
                $("#ajax-loader").hide();
                console.log(response1);
                $('#dpt_2_code').html('');
                $('#dpt_2_code').append('<option value="" selected disabled>Select Dpt Code</option>');
                $.each(response1, function(key, value) {
                    $('#dpt_2_code').append('<option data-name="' + value["DEPT_NAME"] + '" data-code=' + value["DEPT_CODE"] + ' value=' + value["DEPT_CODE"] + '>' + value["DEPT_CODE"] + ' - ' + value["DEPT_NAME"] + '</option>');
                });
            },
            error: function(error) {
                console.log(error);
                alert("Contact IT Department");
            }
        });
    });
    $("#order_form").on('change', '#add_disc_code', function() {
        var target = event.target || event.srcElement;
        var id = target.id;
        var id = id.split("-");
        id = id[1];
        var id = id.split("add_disc_code");
        id = id[1];
        $('#dpt_3_desc').val('');
        var account_code = $('#add_disc_code' + id).find(':selected').val();
        var detail = $('#add_disc_code' + id).find(':selected').attr("data-name");
        $('#select2-add_disc_code' + id + '-container').html(account_code);
        $('#add_disc_desc' + id).val(detail);
        $.ajax({
            url: 'api/Inventory_management/inventory_locals/purchase_return_api.php',
            type: 'POST',
            data: {
                action: 'account_detail',
                account_code: account_code
            },
            dataType: "json",
            success: function(data) {},
            error: function(error) {
                console.log(error);
                alert("Contact IT Department");
            }
        });
        $.ajax({
            url: 'api/Inventory_management/inventory_locals/purchase_return_api.php',
            type: 'POST',
            data: {
                action: 'account_detail',
                account_code: account_code
            },
            dataType: "json",
            success: function(response1) {
                $("#ajax-loader").hide();
                console.log(response1);
                $('#dpt_3_code').html('');
                $('#dpt_3_code').append('<option value="" selected disabled>Select Dpt Code</option>');
                $.each(response1, function(key, value) {
                    $('#dpt_3_code').append('<option data-name="' + value["DEPT_NAME"] + '" data-code=' + value["DEPT_CODE"] + ' value=' + value["DEPT_CODE"] + '>' + value["DEPT_CODE"] + ' - ' + value["DEPT_NAME"] + '</option>');
                });
            },
            error: function(error) {
                console.log(error);
                alert("Contact IT Department");
            }
        });
    });
    $('#order_form').on('change', '#add_amount_calc', function() {
        var amt1 = $('#total').html();
        amt1 = amt1.replaceAll(',', '');
        var add1 = $('#add_amount_calc').val();
        if (add1 == '') {
            add1 = 0;
        } else {
            add1 = add1.replaceAll(',', '');
        }
        var less1 = $('#less_freight_calc').val();
        if (less1 == '') {
            less1 = 0;
        } else {
            less1 = less1.replaceAll(',', '');
        }
        var less2 = $('#less_disc_calc').val();
        if (less2 == '') {
            less2 = 0;
        } else {
            less2 = less2.replaceAll(',', '');
        }
        var final = parseFloat(amt1) + parseFloat(add1) - parseFloat(less1) - parseFloat(less2);
        var finalformat = new Intl.NumberFormat(
            'en-US', {
                style: 'currency',
                currency: 'USD',
                currencyDisplay: 'narrowSymbol'
            }).format(final);
        var formatted1 = finalformat.replace(/[$]/g, '');
        $('#final_total_calc').val(formatted1);
        var finalformat2 = new Intl.NumberFormat(
            'en-US', {
                style: 'currency',
                currency: 'USD',
                currencyDisplay: 'narrowSymbol'
            }).format(add1);
        var formatted12 = finalformat2.replace(/[$]/g, '');
        $('#add_amount_calc').val(formatted12);
    });
    $('#order_form').on('change', '#less_freight_calc', function() {
        var amt1 = $('#total').html();
        amt1 = amt1.replaceAll(',', '');
        var less1 = $('#less_freight_calc').val();
        if (less1 == '') {
            less1 = 0;
        } else {
            less1 = less1.replaceAll(',', '');
        }
        var add1 = $('#add_amount_calc').val();
        if (add1 == '') {
            add1 = 0;
        } else {
            add1 = add1.replaceAll(',', '');
        }
        var less2 = $('#less_disc_calc').val();
        if (less2 == '') {
            less2 = 0;
        } else {
            less2 = less2.replaceAll(',', '');
        }
        var final = parseFloat(amt1) + parseFloat(add1) - parseFloat(less1) - parseFloat(less2);
        var finalformat = new Intl.NumberFormat(
            'en-US', {
                style: 'currency',
                currency: 'USD',
                currencyDisplay: 'narrowSymbol'
            }).format(final);
        var formatted1 = finalformat.replace(/[$]/g, '');
        $('#final_total_calc').val(formatted1);
        var finalformat2 = new Intl.NumberFormat(
            'en-US', {
                style: 'currency',
                currency: 'USD',
                currencyDisplay: 'narrowSymbol'
            }).format(less1);
        var formatted12 = finalformat2.replace(/[$]/g, '');
        $('#less_freight_calc').val(formatted12);
        $("#less_disc_calc").focus();
    });
    $('#order_form').on('change', '#less_disc_calc', function() {
        var amt1 = $('#total').html();
        amt1 = amt1.replaceAll(',', '');
        var less2 = $('#less_disc_calc').val();
        if (less2 == '') {
            less2 = 0;
        } else {
            less2 = less2.replaceAll(',', '');
        }
        var add1 = $('#add_amount_calc').val();
        if (add1 == '') {
            add1 = 0;
        } else {
            add1 = add1.replaceAll(',', '');
        }
        var less1 = $('#less_freight_calc').val();
        if (less1 == '') {
            less1 = 0;
        } else {
            less1 = less1.replaceAll(',', '');
        }
        var final = parseFloat(amt1) + parseFloat(add1) - parseFloat(less1) - parseFloat(less2);
        var finalformat = new Intl.NumberFormat(
            'en-US', {
                style: 'currency',
                currency: 'USD',
                currencyDisplay: 'narrowSymbol'
            }).format(final);
        var formatted1 = finalformat.replace(/[$]/g, '');
        $('#final_total_calc').val(formatted1);
        var finalformat2 = new Intl.NumberFormat(
            'en-US', {
                style: 'currency',
                currency: 'USD',
                currencyDisplay: 'narrowSymbol'
            }).format(less2);
        var formatted12 = finalformat2.replace(/[$]/g, '');
        $('#less_disc_calc').val(formatted12);
    });
    $("#order_form").on('change', '#dpt_1_code', function() {
        var account_code = $('#dpt_1_code').find(':selected').val();
        var account_name = $('#dpt_1_code').find(':selected').attr("data-name");
        $('#select2-dpt_1_code-container').html(account_code);
        $('#dpt_1_desc').val(account_name);
        $('#view_item').css('display', '');
        $('#view_item').fadeIn("slow");
    });
    $("#order_form").on('change', '#dpt_2_code', function() {
        var account_code = $('#dpt_2_code').find(':selected').val();
        var account_name = $('#dpt_2_code').find(':selected').attr("data-name");
        $('#select2-dpt_2_code-container').html(account_code);
        $('#dpt_2_desc').val(account_name);
        $('#view_item').css('display', '');
        $('#view_item').fadeIn("slow");
    });
    $("#order_form").on('change', '#dpt_3_code', function() {
        var account_code = $('#dpt_3_code').find(':selected').val();
        var account_name = $('#dpt_3_code').find(':selected').attr("data-name");
        $('#select2-dpt_3_code-container').html(account_code);
        $('#dpt_3_desc').val(account_name);
        $('#view_item').css('display', '');
        $('#view_item').fadeIn("slow");
    });
    $('#dashboard_breadcrumb').click(function() {
        $.get('dashboard_main/dashboard_main.php', function(data, status) {
            $('#content').html(data);
        });
    });
    $("#il_breadcrumb").on("click", function() {
        $.get('inventory_management/inventory_local/inventory-local.php', function(data, status) {
            $("#content").html(data);
        });
    });
    $("#po_list_breadcrumb").on("click", function() {
        $.get('inventory_management/inventory_local/purchase_return.php', function(data, status) {
            $("#content").html(data);
        });
    });
    $("#add_po_local_breadcrumb").on("click", function() {
        $.get('inventory_management/inventory_local/add_purchase_return.php', function(data, status) {
            $("#content").html(data);
        });
    });
</script>
<?php include '../../includes/loader.php' ?>