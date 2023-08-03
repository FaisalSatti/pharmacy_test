<?php
session_start();
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h1>GRN - Local Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                        <li class="breadcrumb-item active"><button class="btn btn-sm" id="il_breadcrumb"> Inventory Local</button></li>
                        <li class="breadcrumb-item"><button class="btn btn-sm" id="po_list_breadcrumb"> GRN List</button></li>
                        <li class="breadcrumb-item"><button class="btn btn-sm" disabled id="add_po_local_breadcrumb">Edit GRN Local</button></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid" style="margin-top: -20px;">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <form method="post" id="order_form">
                                    <?php include '../../display_message/display_message.php' ?>
                                    <div id="posted_error" class="alert alert-danger alert-dismissible" style="display: none;">
                                        <button type="button" class="close" aria-hidden="true">×</button>
                                        <span class="vd_alert-icon"><i class="fa fa-exclamation-triangle vd_red"></i></span><strong> Note ! </strong>
                                        <!-- This Voucher is already Posted !!! -->
                                        <span id="posted_error_msg"></span> ,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="no_edit"><b> *** You can't edit this ***</b></span>
                                    </div>
                                    <div class="row pt-2" style="border: 1px solid gray; border-radius: 5px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.29);">
                                        <div class="col-lg-12 col-md-12 form-group">
                                            <span class="po_msg"><i class="fas fa-exclamation-circle"></i> Please Select Company First</span>
                                            <span class="po_msg_po_name"><i class="fas fa-exclamation-circle"></i> Please Select PO No.</span>
                                        </div>
                                        <div class="col-lg-1 col-md-2 form-group">
                                            <label>Doc#:</label>
                                        </div>
                                        <div class="col-lg-2 col-md-4 form-group">
                                            <!-- <label for="">Document Number :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" style="background-color: #ccd4e1;font-weight:bold;" type="text" name="doc_no" tabindex="-1" id="doc_no" class="form-control form-control-sm" placeholder="Document No" readonly>
                                            </div>
                                        </div>
                                        <!-- order key -->
                                        <div class="col-lg-1 col-md-2 form-group">
                                            <label>OrderKey#:</label>
                                        </div>
                                        <div class="col-lg-2 col-md-4 form-group">
                                            <!-- <label for="">Document Number :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" style="background-color: #ccd4e1;font-weight:bold;" type="text" name="order_key" id="order_key" class="form-control form-control-sm" placeholder="Order Key" readonly>
                                            </div>
                                        </div>
                                        <!-- <div style="width: 5.295rem;" class="form-group"> -->
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
                                                <input type="date" name="voucher_date" id="voucher_date" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px" class="form-control form-control-sm">
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
                                                <input type="number" tabindex="-1" readonly name="year" id="year" style="background-color: #ccd4e1;font-weight:bold;" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                        <!-- company -->
                                        <div class="col-lg-1 col-sm-2 form-group">
                                            <label>Company:</label>
                                        </div>
                                        <div class="col-lg-2 col-md-4 form-group">
                                            <!-- <label for="">Company Code :<span style="color:red">*</span></label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                                </div>
                                                <input maxlength="30" type="text" name="company_code" tabindex="-1" id="company_code" style="background-color: #ccd4e1;font-weight:bold;" class="form-control form-control-sm" placeholder="Select Company" readonly>
                                            </div>
                                        </div>
                                        <!-- company name -->
                                        <div class="col-lg-3 col-md-6 form-group">
                                            <!-- <label for="inputCompanyName">Company Name :</label><span style="color:red;">*</span> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <!-- <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="company_name" id="company_name" class="form-control form-control-sm" placeholder="Company Name" readonly > -->
                                                <textarea pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" style="background-color: #ccd4e1;font-weight:bold;" name="company_name" id="company_name" class="form-control form-control-sm" tabindex="-1" placeholder="Company Name" readonly rows="1"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-1 col-md-2">
                                            <label>PO&nbsp;No.</label>
                                        </div>
                                        <!-- <div  style="width: 20rem;" class="col-md-4 form-group"> -->
                                        <div class="col-lg-2 col-md-4 form-group">
                                            <!-- <label for="">Sale Code :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input title="Sale Code" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" style="background-color: #ccd4e1;font-weight:bold;" type="text" name="po_name" id="po_name" class="form-control form-control-sm" placeholder="PO. Number" tabindex="-1" readonly>
                                            </div>
                                        </div>
                                        <!-- date -->
                                        <div class="col-lg-1 col-md-2 form-group">
                                            <label>PO. Date:</label>
                                        </div>
                                        <div class="col-lg-2 col-md-4 form-group">
                                            <!-- <label for=""> Date :</label><span style="color:red;">*</span> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input type="date" readonly tabindex="-1" name="po_date" id="po_date" style="background-color: #ccd4e1;font-weight:bold;" class="form-control form-control-sm" value="">
                                            </div>
                                        </div>
                                        <!-- Party co -->
                                        <div class="col-lg-1 col-md-2 form-group">
                                            <label>Party#</label>
                                        </div>
                                        <div class="col-lg-2 col-md-4 form-group">
                                            <!-- <label for="">Party :<span style="color:red">*</span></label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                                </div>
                                                <input maxlength="30" type="text" tabindex="-1" style="background-color: #ccd4e1;font-weight:bold;" name="select_party" id="select_party" class="form-control form-control-sm" placeholder="Select Party" readonly>
                                            </div>
                                        </div>
                                        <!-- Party -->
                                        <div class="col-lg-3 col-md-6 form-group">
                                            <!-- <label for="">Party :<span style="color:red">*</span></label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                                </div>
                                                <input type="text" name="party_name" tabindex="-1" style="background-color: #ccd4e1;font-weight:bold;" id="party_name" class="form-control form-control-sm" placeholder="Party Name" readonly>
                                            </div>
                                        </div>
                                        <!-- Address -->
                                        <div class="col-lg-1 col-md-2 form-group">
                                            <label>Address:</label>
                                        </div>
                                        <div class="col-lg-5 col-md-4 form-group">
                                            <!-- <label for="">CO Ref :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <textarea rows="1" pattern="[a-zA-Z0-9 ,._-]{1,}" style="background-color: #ccd4e1;font-weight:bold;" tabindex="-1" maxlength="30" name="address_p" id="address_p" class="form-control form-control-sm" placeholder="Address" readonly></textarea>
                                            </div>
                                        </div>
                                        <!-- CR DAYS HIDDEN -->
                                        <div class="col-lg-1 col-md-2 form-group" style="display: none;">
                                            <label>Address:</label>
                                        </div>
                                        <div class="col-lg-5 col-md-4 form-group" style="display: none;">
                                            <!-- <label for="">CO Ref :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <textarea rows="1" pattern="[a-zA-Z0-9 ,._-]{1,}" tabindex="-1" name="crdays" id="crdays" class="form-control form-control-sm" placeholder="Address" readonly></textarea>
                                            </div>
                                        </div>
                                        <!-- party ref -->
                                        <div class="col-lg-1 col-sm-2 form-group">
                                            <label>Party Ref:</label>
                                        </div>
                                        <div class="col-lg-2 col-sm-4 form-group">
                                            <!-- <label for="">Voucher# :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" tabindex="-1" style="background-color: #ccd4e1;font-weight:bold;" maxlength="30" type="text" name="party_ref" id="party_ref" class="form-control form-control-sm" placeholder="Party Ref." readonly>
                                            </div>
                                        </div>
                                        <!-- Phone -->
                                        <div class="col-lg-1 col-md-2 form-group">
                                            <label>DC&nbsp;Ref:</label>
                                        </div>
                                        <div class="col-lg-2 col-md-4 form-group">
                                            <!-- <label for="">CO Ref :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" style="background-color: #ccd4e1;font-weight:bold;" type="text" name="dc_ref" id="dc_ref" class="form-control form-control-sm" placeholder="DC REF." readonly tabindex="-1">
                                            </div>
                                        </div>
                                        <!-- Address -->
                                        <!-- city -->
                                        <div class="col-lg-1 col-md-2 form-group">
                                            <label>Voucher:</label>
                                        </div>
                                        <div class="col-lg-2 col-md-4 form-group">
                                            <!-- <label for="">CO Ref :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px" type="text" name="voucher" id="voucher" class="form-control form-control-sm" placeholder="Voucher">
                                            </div>
                                        </div>
                                        <!-- </div> -->
                                        <!-- </div> -->
                                        <!-- <div style="padding-top:8px;" class="col-lg-6"> -->
                                        <!-- <div class="row"> -->
                                        <!-- CO Ref -->
                                        <div class="col-lg-1 col-md-2 form-group">
                                            <label>Order&nbsp;Ref:</label>
                                        </div>
                                        <div class="col-lg-2 col-md-4 form-group">
                                            <!-- <label for="">CO Ref :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px" type="text" name="order_ref" id="order_ref" class="form-control form-control-sm" placeholder="Order Reference">
                                            </div>
                                        </div>
                                        <!-- division -->
                                        <!-- Narration -->
                                        <div class="col-lg-1 col-md-2 form-group">
                                            <label>Narration:</label>
                                        </div>
                                        <div class="col-lg-11 col-md-4 form-group">
                                            <!-- <label for="">Narration :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <textarea rows="1" name="narration" id="narration" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px" class="form-control form-control-sm" placeholder="Narration"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 form-group text-center">
                                            <span id="msg3" style="color: red;font-size: 13px;"></span>
                                        </div>
                                        <!-- </div> -->
                                        <!-- </div> -->
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
                                        <center><span class="calc_msg"><i class="fas fa-exclamation-circle"></i> Rej_Qty can't be greater than Qty_Rcvd</span></center>
                                        <center><span class="bal_msg"><i class="fas fa-exclamation-circle"></i>Quantity can't be greater than Balance</span></center>
                                        <table id="example1" class="table table-bordered table-responsive" style="border: 1px solid gray; border-radius: 5px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.29); width: 100%; margin-bottom:5px;">
                                            <thead>
                                                <tr>
                                                    <th>Item</th>
                                                    <th>Item Name</th>
                                                    <th>Product</th>
                                                    <th>Item Detail</th>
                                                    <th>Qty_Rcvd</th>
                                                    <th>Rej_Qty</th>
                                                    <th>Ok_Qty</th>
                                                    <th>Loc</th>
                                                    <th>Batch No</th>
                                                    <th>Expiry Dt</th>
                                                    <th style="display: none;">div</th>
                                                    <th style="display: none;">gen</th>
                                                    <th style="display: none;">um</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="d_items">
                                                <tr id="main_tr" class="tr">
                                                    <td style="width:8%"><input style="width:83px;height:32px; background-color: #b7edea;" name="" id="acc_desc" class="acc_desc" type="text" readonly></td>
                                                    <td style="width: 1%;"><textarea style="height:32px;background-color:#ccd4e1; width:130px" rows="1" name="" id="detail" tabindex="-1" class="detail" readonly></textarea></td>
                                                    <!-- <td style="width: 8%;"><input  style="text-align:right; padding:0 2px 0 0;width: 110px;;height:32px" type="text"  name="" id="product" class="product"></td> -->
                                                    <td style="width: 8%;">
                                                        <textarea style=" padding:0 2px 0 0;width: 110px;;height:32px; background-color: #ccd4e1;" tabindex="-1" type="text" name="" id="product" class="product"></textarea>
                                                    </td>
                                                    <td style="width: 12%;">
                                                        <textarea style=" padding:0 2px 0 0;width: 100%;;height:32px; background-color: #ccd4e1;width: 150px;" tabindex="-1" type="text" name="" id="item_detail" class="item_detail"></textarea>
                                                    </td>
                                                    <td style="width: 2%;"><input style="padding:0 2px 0 0;width:90px;height:32px;text-align:right; " type="text" name="" id="quantity" class="quantity calculation ccc" min="0" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"></td>
                                                    <td style="width: 2%;"><input style="text-align:right; padding:0 2px 0 0;width:90px;height:32px" pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" name="" id="rate" class="rate calculation" min="0" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"></td>
                                                    <td style="width: 2%;"><input style="text-align:right; background-color: #ccd4e1; padding:0 2px 0 0;width:90px;height:32px" tabindex="-1" readonly pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" name="" id="ok_qty" tabindex="-1" class="ok_qty" min="0" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"></td>
                                                    <!-- <td style="width: 10%;"><input  style="text-align:right; padding:0 2px 0 0;width:50px;height:32px;background-color:#b7edea"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text" tabindex="-1"  name="" id = "amount" class="amount" readonly></td> -->
                                                    <td style="width: 2%;"><select name="" style="background-color: #b7edea;" id="loc" class="js-example-basic-single loc"></select></td>
                                                    <td style="width: 10%;"><textarea style="width:100px;height:32px;font-size:12px" pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" name="batch_no" id="gen_i" class="gen_i"></textarea></td>
                                                    <td style="width: 10%;"><input style="width:100px;height:32px;font-size:12px" pattern="[a-zA-Z0-9 ,._-]{1,}" type="date" name="exp_date" id="um_i" class="um_i"></td>
                                                    <td style="width: 10%;display: none;"><input style="width:100px;height:32px;font-size:12px; display: none;" pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" name="hidden_div" id="hidden_div" class="hidden_div"></td>
                                                    <td style="width: 10%;display: none;"><input style="width:100px;height:32px;font-size:12px; display: none;" pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" name="hidden_gen" id="hidden_gen" class="hidden_gen"></td>
                                                    <td style="width: 10%;display: none;"><input style="width:100px;height:32px;font-size:12px; display: none;" pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" name="hidden_um" id="hidden_um" class="hidden_um"></td>
                                                    <td style="width: 10%;display: none;"><input style="width:100px;height:32px;font-size:12px; display: none;" pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" name="hidden_t_bal" id="hidden_t_bal" class="hidden_t_bal"></td>
                                                    <td><button type="button" style="height: 25px;" class="btn btn-sm btn-primary add"><i class="fa fa-plus"></i></button></td>
                                                </tr>
                                            </tbody>
                                            <tr id="last_tr">
                                                <td><input type="text" class="form-control form-control-sm" style="width: 60px; display: none;"></td>
                                                <td><input type="text" id="rate" class="form-control form-control-sm" style="width: 120px;display: none;"></td>
                                                <td><input hidden type="text" id="amount" class="form-control form-control-sm" style="width: 120px;"></td>
                                                <td class="text-right align-middle"><span><b>Order Bal Qty</b></span></td>
                                                <!-- <td><input type="text" id="total_q" readonly disabled class="form-control form-control-sm" style="width:100%;text-align:right; background-color: #ccd4e1;"></td> -->
                                                <td><input type="text" id="total_balance" placeholder="Balance" tabindex="-1" readonly class="form-control form-control-sm" style="width:100%;text-align:right; background-color: #ccd4e1;"></td>
                                                <td><input type="text" id="total" readonly tabindex="-1" placeholder="Total Reject" class="form-control form-control-sm total_rej_qty" style="width:100%;text-align:right; background-color: #ccd4e1;"></td>
                                                <td></td>
                                                <td colspan="3"><input type="text" id="loc_name" placeholder="Location Name" tabindex="-1" readonly class="form-control form-control-sm" style="width:100%; background-color: #ccd4e1;"></td>
                                                <!-- <td style="text-align:right;">Total:</td> -->
                                                <!-- <td style="font-weight:bold" name="total_q" id="total_q"><b>0</b></td> -->
                                                <!-- <td style="font-weight:bold" name="total" id="total"><b>0</b></td> -->
                                                <!-- <td></td> -->
                                                <!-- <td></td> -->
                                                <!-- <td></td> -->
                                                <!-- <td></td> -->
                                            </tr>
                                        </table>
                                        <!-- <br> -->
                                        <div class="row">
                                            <div class="col-md-6 mt-3">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <div class="row">
                                                                <!-- <div class="col-md-3"><label>Add : Sales Tax</label></div> -->
                                                                <!-- <div class="col-sm-3 m-1"><input style="background-color: #c1c1c1; height: 25px;" type="text"  name="" id="lot_code" class="form-control form-control-sm" readonly></div> -->
                                                                <div class="col-md-12 m-1"><input style="background-color: #ccd4e1;height: 30px;" type="text" tabindex="-1" name="" id="div_code_div" class="form-control div_code_div" readonly placeholder="div"></div>
                                                                <div class="col-md-12 m-1"><input style="background-color: #ccd4e1;height: 30px;" tabindex="-1" placeholder="Gen" type="text" name="" id="gen_name" class="form-control gen_name" readonly></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-md-6 mt-3">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <div class="row">
                                                                <!-- <div class="col-md-3"><label>Add : Sales Tax</label></div> -->
                                                                <!-- <div class="col-sm-3 m-1"><input style="background-color: #ccd4e1; height: 25px;" type="text"  name="" id="lot_code" class="form-control form-control-sm" readonly></div> -->
                                                                <div class="col-md-12 m-1"><input style="background-color: #ccd4e1;height: 30px;" tabindex="-1" type="text" name="" id="um_name" placeholder="UM" class="form-control um_name" readonly></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
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
                                        <div class="col-md-9"></div>
                                        <div class="col-sm-2 text-right">
                                            <a id="report" type="button" value="Submit" class="btn btn-info toastrDefaultSuccess">GRN[CO]&nbsp;&nbsp;<i style="font-size:20px" class="fa fa-file"></i></a>
                                        </div>
                                        <div class="col-sm-1 text-right">
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
</div>
<style>
    body {
        zoom: 95%;
        overflow-x: hidden !important;
    }
    select {
        width: 82% !important;
    }
    #btn-back-to-top {
        position: fixed;
        bottom: 20px;
        right: 20px;
    }
    .select2-container--default .select2-selection--single {
        height: 32px;
        width: 70px;
        line-height: 2px;
        vertical-align: middle !important;
        font-size: 1.2em;
        border-radius: 0px;
        padding-top: -10px;
        background-color: #b7edea !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        margin-top: -7px;
        background-color: #b7edea;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        color: #fff;
        font-size: 1.3em;
        padding: 4px 12px;
        height: 30px;
        position: absolute;
        top: 0px;
        right: 0px;
    }
    #item_table_item tr td:last-child {
        display: none;
    }
    #item_table_item tr td:nth-child(13) {
        display: none;
    }
    #item_table_item tr td:nth-child(12) {
        display: none;
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
    .select2-hidden-accessible {
        border: 1px solid black !important;
    }
    .select2-selection {
        background-color: #ccd4e1 !important
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
    .po_msg {
        font-size: 15px;
        color: red;
        display: none;
        margin: 5px auto;
        text-align: center;
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
        margin: 5px auto;
        text-align: center;
    }
    .bal_msg {
        font-size: 15px;
        color: red;
        display: none;
        margin: 5px auto;
        text-align: center;
    }
    .po_msg_po_name {
        font-size: 15px;
        color: red;
        display: none;
        margin: 5px auto;
        text-align: center;
    }
    .qty_msg {
        font-size: 15px;
        color: red;
        display: none;
        margin: 5px auto;
        text-align: center;
    }
    .form-control:focus {
        -moz-box-shadow: 0 0 8px rgba(82, 168, 236, .6);
        box-shadow: 0 0 8px orangered !important;
    }
    input:focus {
        -moz-box-shadow: 0 0 8px rgba(82, 168, 236, .6);
        box-shadow: 0 0 8px orangered !important;
    }
    textarea:focus {
        -moz-box-shadow: 0 0 8px rgba(82, 168, 236, .6);
        box-shadow: 0 0 8px orangered !important;
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
    .select2-container {
        width: 80% !important;
    }
    .amount::placeholder {
        text-align: right !important
    }
    @media only screen and (min-width: 250px) and (max-width: 350px) {
        .select2-container {
            width: 78% !important;
        }
    }
    @media only screen and (min-width: 350px) and (max-width: 754px) {
        .select2-container {
            width: 85% !important;
        }
    }
    @media screen and (min-width: 766px) and (max-width:994px) {
        .select2-container {
            width: 72% !important;
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
<input maxlength="30" type="hidden" name="post" id="post" class="form-control form-control-sm" placeholder="Voucher No">
<!-- company  form -->
<div class="modal fade" id="CompanyFormModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
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
<div class="modal fade" id="ItemCodeModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Item</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table style="display: table; width: 100%;" class="table-responsive" id="item_table_item">
                    <thead>
                        <tr>
                            <th>Item Code</th>
                            <th>Item</th>
                            <th>Qty</th>
                            <th>Rate</th>
                            <th>Amt</th>
                            <th>Disc Rate</th>
                            <th>Disc Amt</th>
                            <th>Net Amt</th>
                            <th>Item Detail</th>
                            <th>Order Bal</th>
                            <th>Product Code</th>
                            <th style="display: none;">Div Code</th>
                            <th style="display: none;">Gen Name</th>
                            <th style="display: none;">UM Name</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- division  form -->
<div class="modal fade" id="DivisionFormModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
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
                            <th>Party Name</th>
                            <th>Refnum</th>
                            <th>Doc Date</th>
                            <th>Order Key</th>
                            <th>Total Net Amount</th>
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
            var previous_rate = $('#rate' + p_rate_id).val();
            sessionStorage.setItem("previous_rate", previous_rate);
        });
        $("#order_form").on('change', '.rate', function() {
            var previous_rates = sessionStorage.getItem('previous_rate');
            if (previous_rates == "") {
                previous_rate = 0;
            } else {
                previous_rate = previous_rates.replaceAll(',', '');
            }
            var total = $('#total').val();
            if (total == '' || total == '0' || total == '0.00') {
                minuss = 0;
            } else {
                minus_t = total.replaceAll(',', '');
                minuss = parseFloat(minus_t) - parseFloat(previous_rate);
            }
            var button_id = $(this).attr("id");
            if (button_id == 'rate') {
                rate_id = '';
            } else {
                var rateid = button_id.split("e");
                rate_id = rateid[1];
            }
            var rate = $('#rate' + rate_id).val();
            if (rate == '' || rate == '0' || rate == '0.00') {
                rates = 0;
            } else {
                rates = rate.replaceAll(',', '');
            }
            var quantity = $('#quantity' + rate_id).val();
            if (quantity == '' || quantity == '0' || quantity == '0.00') {
                quantitys = 0;
            } else {
                quantitys = quantity.replaceAll(',', '');
            }
            if (parseInt(rates) > parseInt(quantitys)) {
                $('#ok_qty' + rate_id).val(0);
                $('#rate' + rate_id).val(0);
                $('#rate' + rate_id).focus();
                $('.calc_msg').css('display', 'block');
                $('#rate' + rate_id).css('background', 'pink');
                var total = $('#total').val();
                if (total == '' || total == '0' || total == '0.00') {
                    minuss = 0;
                } else {
                    minus_t = total.replaceAll(',', '');
                    minuss = parseFloat(minus_t) - parseFloat(previous_rate);
                }
                var total_r = new Intl.NumberFormat(
                    'en-US', {
                        style: 'currency',
                        currency: 'USD',
                        currencyDisplay: 'narrowSymbol'
                    }).format(minuss);
                var total_r = total_r.replace(/[$]/g, '');
                $('#total').val(total_r);
            } else {
                $('.calc_msg').css('display', 'none');
                $('#rate' + rate_id).css('background', 'transparent');
                var org_rate = new Intl.NumberFormat(
                    'en-US', {
                        style: 'currency',
                        currency: 'USD',
                        currencyDisplay: 'narrowSymbol'
                    }).format(rate);
                var org_rate = org_rate.replace(/[$]/g, '');
                $('#rate' + rate_id).val(org_rate);
                console.log("2");
                console.log(minuss);
                var total = parseFloat(rates) + parseFloat(minuss);
                console.log(total);
                var total_r = new Intl.NumberFormat(
                    'en-US', {
                        style: 'currency',
                        currency: 'USD',
                        currencyDisplay: 'narrowSymbol'
                    }).format(total);
                var total_r = total_r.replace(/[$]/g, '');
                $('#total').val(total_r);
                if (quantity == '' || quantity == '0' || quantity == '0.00') {
                    quantitys = 0;
                } else {
                    quantitys = quantity.replaceAll(',', '');
                }
                var qty = parseFloat(quantitys) - parseFloat(rates);
                var total_qty = new Intl.NumberFormat(
                    'en-US', {
                        style: 'currency',
                        currency: 'USD',
                        currencyDisplay: 'narrowSymbol'
                    }).format(qty);
                var total_qty = total_qty.replace(/[$]/g, '');
                $('#ok_qty' + rate_id).val(total_qty);
            }
        });
        $("#order_form").on('focus', '.quantity', function() {
            var button_id = $(this).attr("id");
            if (button_id == 'quantity') {
                var p_quantity_id = '';
            } else {
                var p_amountid = button_id.split("ty");
                var p_quantity_id = p_amountid[1];
            }
            var previous_quantity = $('#quantity' + p_quantity_id).val();
            sessionStorage.setItem("previous_quantity", previous_quantity);
            var previous_rate = $('#rate' + p_quantity_id).val();
            sessionStorage.setItem("previous_rate", previous_rate);
        });
        $("#order_form").on('change', '.quantity', function() {
            var previous_quantitys = sessionStorage.getItem('previous_quantity');
            var previous_rates = sessionStorage.getItem('previous_rate');
            if (previous_quantitys == "") {
                previous_quantity = 0;
            } else {
                previous_quantity = previous_quantitys.replaceAll(',', '');
            }
            if (previous_rates == "") {
                previous_rate = 0;
            } else {
                previous_rate = previous_rates.replaceAll(',', '');
            }
            var total = $('#total').val();
            if (total == '' || total == '0' || total == '0.00') {
                minuss = 0;
            } else {
                minus_t = total.replaceAll(',', '');
                minuss = parseFloat(minus_t) - parseFloat(previous_rate);
            }
            var button_id = $(this).attr("id");
            if (button_id == 'quantity') {
                quantity_id = '';
            } else {
                var quantityid = button_id.split("ty");
                quantity_id = quantityid[1];
            }
            var quantity = $('#quantity' + quantity_id).val();
            if (quantity == '' || quantity == '0' || quantity == '0.00') {
                quantitys = 0;
            } else {
                quantitys = quantity.replaceAll(',', '');
            }
            var rate = $('#rate' + quantity_id).val();
            if (rate == '' || rate == '0' || rate == '0.00') {
                rates = 0;
            } else {
                rates = rate.replaceAll(',', '');
            }
            if (parseInt(rates) > parseInt(quantitys)) {
                $('#ok_qty' + quantity_id).val(0);
                $('#rate' + quantity_id).val(0);
                $('#rate' + quantity_id).focus();
                $('.calc_msg').css('display', 'block');
                $('#rate' + quantity_id).css('background', 'pink');
            } else {
                $('.calc_msg').css('display', 'none');
                $('#rate' + quantity_id).css('background', 'transparent');
                var org_qty = new Intl.NumberFormat(
                    'en-US', {
                        style: 'currency',
                        currency: 'USD',
                        currencyDisplay: 'narrowSymbol'
                    }).format(quantity);
                var org_qty = org_qty.replace(/[$]/g, '');
                $('#quantity' + quantity_id).val(org_qty);
                var total = parseFloat(quantitys) + parseFloat(minuss);
                var total_r = new Intl.NumberFormat(
                    'en-US', {
                        style: 'currency',
                        currency: 'USD',
                        currencyDisplay: 'narrowSymbol'
                    }).format(total);
                var total_r = total_r.replace(/[$]/g, '');
                $('#total_q').val(total_r);
                var rate = $('#rate' + quantity_id).val();
                if (rate == '' || rate == '0' || rate == '0.00') {
                    rates = 0;
                } else {
                    rates = rate.replaceAll(',', '');
                }
                var qty = parseFloat(quantitys) - parseFloat(rates);
                var total_qty = new Intl.NumberFormat(
                    'en-US', {
                        style: 'currency',
                        currency: 'USD',
                        currencyDisplay: 'narrowSymbol'
                    }).format(qty);
                var total_qty = total_qty.replace(/[$]/g, '');
                $('#ok_qty' + quantity_id).val(total_qty);
            }
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
    });
    $('#voucher_date').on('keyup', function(e) {
        if (e.which == 9) {
            $('#voucher').focus();
        }
    });
    $('#view_party').click(function() {
        var party_code = $('#party').val();
        if (party_code != '') {
            $.ajax({
                url: 'api/sales_module/transaction_files/sales_order_api.php',
                type: 'POST',
                data: {
                    action: 'party_detail',
                    party_code: party_code
                },
                dataType: "json",
                success: function(data) {
                    $('#name').html(data.party_name);
                    $('#address').html(data.address);
                    $('#phone').html(data.phone_nos);
                    $('#gst').html(data.gst);
                    $('#ntn').html(data.ntn);
                    $('#division_p').html(data.division_name);
                    $('#city_p').html(data.city_name);
                },
                error: function(error) {
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
            $('#ViewPartyModal').modal('show');
        }
    });
    $('#order_form').on('focus', '#po_name', function() {
        var company_code = $('#company_code').val();
        if (company_code != '') {
            $('.po_msg').css('display', 'none');
            $('#party_table').dataTable().fnDestroy();
            table = $('#party_table').DataTable({
                dom: 'Bfrtip',
                orderCellsTop: true,
                fixedHeader: true,
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print',
                ]
            });
            $('#party_table thead tr:eq(1) th').each(function(i) {
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
                url: 'api/Inventory_management/inventory_locals/grn_local_api.php',
                type: 'POST',
                data: {
                    action: 'po_num',
                    company_code: company_code
                },
                dataType: "json",
                success: function(response) {
                    table.clear().draw();
                    var sno = '0';
                    for (var i = 0; i < response.length; i++) {
                        sno++;
                        table.row.add([response[i].PARTY_NAME, response[i].refnum, response[i].doc_date, response[i].order_key, response[i].total_net_amt]);
                    }
                    table.draw();
                },
                error: function(error) {
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
        } else {
            $('.po_msg').css('display', 'block');
        }
    });
    $('#party_table').on('click', '.even', function() {
        var po_no = $(this).closest('tr').children('td:nth-child(4)').text();
        {
            $.ajax({
                url: 'api/Inventory_management/inventory_locals/grn_local_api.php',
                type: 'POST',
                data: {
                    action: 'po_detail',
                    po_no: po_no
                },
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $('#po_name').val(response.order_key);
                    $('#select_party').val(response.party_code);
                    $('#party_name').val(response.PARTY_NAME);
                    $('#po_date').val(response.doc_date);
                    $('#dc_ref').val(response.refnum);
                    $('#address_p').val(response.address);
                    $('#party_ref').val(response.PARTY_REF);
                    $("#narration").focus();
                },
                error: function(error) {
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
        }
        $('#PartyFormModel').modal('hide');
    });
    $('#party_table').on('click', '.odd', function() {
        var party_code = $(this).closest('tr').children('td:nth-child(3)').text();
        var po_no = $(this).closest('tr').children('td:nth-child(4)').text();
        {
            $.ajax({
                url: 'api/Inventory_management/inventory_locals/grn_local_api.php',
                type: 'POST',
                data: {
                    action: 'po_detail',
                    po_no: po_no
                },
                dataType: "json",
                success: function(response) {
                    $('#po_name').val(response.order_key);
                    $('#select_party').val(response.party_code);
                    $('#party_name').val(response.PARTY_NAME);
                    $('#po_date').val(response.doc_date);
                    $('#dc_ref').val(response.refnum);
                    $('#address_p').val(response.address);
                    $('#party_ref').val(response.PARTY_REF);
                    $('#crdays').val(response.CRDAYS);
                    $("#narration").focus();
                },
                error: function(error) {
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
        }
        $('#PartyFormModel').modal('hide');
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
    });
    $('#order_form').on('click', '#salesman', function() {
        $('#salesman_table').dataTable().fnDestroy();
        table = $('#salesman_table').DataTable({
            dom: 'Bfrtip',
            orderCellsTop: true,
            fixedHeader: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print',
            ]
        });
        $('#salesman_table thead tr:eq(1) th').each(function(i) {
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
                action: 'salesman_code'
            },
            dataType: "json",
            success: function(response) {
                table.clear().draw();
                var sno = '0';
                for (var i = 0; i < response.length; i++) {
                    sno++;
                    table.row.add([sno, response[i].sman_name, response[i].sman_code]);
                }
                table.draw();
            },
            error: function(error) {
                console.log(error);
                alert("Contact IT Department");
            }
        });
        $('#SalesmanFormModel').modal('show');
    });
    $(document).ready(function() {
        $('#order_form').on('click', '#acc_desc', function() {
            var company_code = $('#company_code').val();
            var po_name = $('#po_name').val();
            if (company_code == '') {
                $('.po_msg').css('display', 'block');
            } else if (po_name == '') {
                $('.po_msg_po_name').css('display', 'block');
            } else if (po_name != '') {
                $('.po_msg_po_name').css('display', 'none');
            }
        });
        $('#company_table').on('click', '.even', function() {
            var company_name = $(this).closest('tr').children('td:nth-child(2)').text();
            var company_code = $(this).closest('tr').children('td:nth-child(3)').text();
            $('#company_code').val(company_code);
            $('#company_name').val(company_name);
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
            $('#po_name').val('');
            $('#po_date').val('');
            $('#select_party').val('');
            $('#party_name').val('');
            $('#address_p').val('');
            $('#dc_ref').val('');
            $('#total_balance').val('');
            $('#loc_name').val('');
            $('#view_item').css('display', 'none');
            for (var a = 2; a < rowCount - 1; a++) {
                var d = a - 1;
                alert(d)
                $('#tr' + d + '').remove();
                $('#total').val('0');
            }
            $('#CompanyFormModel').modal('hide');
            $("#po_name").focus();
        });
        $('#order_form').on('focus', '.acc_desc', function() {
            var button_id = $(this).attr("id");
            var button_id = button_id.split("sc");
            var id = button_id[1];
            var company_code = $('#company_code').val();
            var order_key = $('#po_name').val();
            var doc_date = $('#po_date').val();
            sessionStorage.setItem("row_id", id);
            $('#ItemCodeModel').modal('show');
            $('#item_table_item').dataTable().fnDestroy();
            table = $('#item_table_item').DataTable({
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
                url: 'api/Inventory_management/inventory_locals/grn_local_api.php',
                type: 'POST',
                data: {
                    action: 'item_detail',
                    order_key: order_key,
                    doc_date: doc_date
                },
                dataType: "json",
                success: function(response) {
                    table.clear().draw();
                    var sno = '0';
                    for (var i = 0; i < response.length; i++) {
                        sno++;
                        table.row.add([response[i].item_code, response[i].item_type, response[i].qty, response[i].rate, response[i].amt, response[i].disc_rate, response[i].disc_amt, response[i].net_amt, response[i].item_detail, response[i].order_bal_qty, response[i].product_code, response[i].div_code, response[i].gen_name, response[i].unit_name]);
                    }
                    table.draw();
                },
                error: function(error) {
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
            $.ajax({
                url: 'api/Inventory_management/inventory_locals/grn_local_api.php',
                type: 'POST',
                data: {
                    action: 'location_detail'
                },
                dataType: "json",
                async: false,
                success: function(response) {
                    $('#loc').html('');
                    $('#loc').addClass('js-example-basic-single');
                    $('.js-example-basic-single').select2();
                    $('#loc').append(
                        '<option value="" selected disabled>Select Location</option>');
                    $.each(response, function(key, value) {
                        $('#loc').append('<option data-name="' + value["loc_name"] + '"  data-code=' + value["loc_code"] + ' value=' + value["loc_code"] + '>' + value["loc_code"] + ' - ' + value["loc_name"] + '</option>');
                    });
                },
                error: function(error) {
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
        });
        $('#item_table_item').on('click', '.odd', function() {
            var item_code = $(this).closest('tr').children('td:nth-child(1)').text();
            var item_name = $(this).closest('tr').children('td:nth-child(2)').text();
            var product_code = $(this).closest('tr').children('td:nth-child(11)').text();
            var item_detail = $(this).closest('tr').children('td:nth-child(9)').text();
            var total_balance = $(this).closest('tr').children('td:nth-child(10)').text();
            var div_code_div = $(this).closest('tr').children('td:nth-child(12)').text();
            var gen_name = $(this).closest('tr').children('td:nth-child(13)').text();
            var um_name = $(this).closest('tr').children('td:nth-child(14)').text();
            var id = sessionStorage.getItem("row_id");
            $('#acc_desc' + id).val(item_code);
            $('#detail' + id).val(item_name);
            $('#product' + id).val(product_code);
            $('#item_detail' + id).val(item_detail);
            $('#total_balance').val(total_balance);
            $('#hidden_t_bal').val(total_balance);
            $('#div_code_div' + id).val(div_code_div);
            $('#gen_name' + id).val(gen_name);
            $('#um_name' + id).val(um_name);
            $('#hidden_div' + id).val(div_code_div);
            $('#hidden_gen' + id).val(gen_name);
            $('#hidden_um' + id).val(um_name);
            $("#ajax-loader").hide();
            $('#loc' + id).val('');
            $('#loc_name').val('');
            var button_id = $(this).attr("id");
            var rate = $('#rate' + button_id + '').val();
            var total = $('#total').val();
            var total_rr = total.replaceAll(',', '');
            var total_r = total_rr - rate;
            $('#ItemCodeModel').modal('hide');
            $("#quantity" + id).focus();
            $('#order_form').on('change', '#loc', function() {
                var loc_code = $('#loc').find(':selected').val();
                var loc_name = $('#loc').find(':selected').attr("data-name");
                $('#select2-loc-container').html(loc_code);
                $('#loc_name').val(loc_name);
            });
        });
        $('#item_table_item').on('click', '.even', function() {
            var item_code = $(this).closest('tr').children('td:nth-child(1)').text();
            var item_name = $(this).closest('tr').children('td:nth-child(2)').text();
            var product_code = $(this).closest('tr').children('td:nth-child(11)').text();
            var item_detail = $(this).closest('tr').children('td:nth-child(9)').text();
            var total_balance = $(this).closest('tr').children('td:nth-child(10)').text();
            var div_code_div = $(this).closest('tr').children('td:nth-child(12)').text();
            var gen_name = $(this).closest('tr').children('td:nth-child(13)').text();
            var um_name = $(this).closest('tr').children('td:nth-child(14)').text();
            var id = sessionStorage.getItem("row_id");
            $('#acc_desc' + id).val(item_code);
            $('#detail' + id).val(item_name);
            $('#product' + id).val(product_code);
            $('#item_detail' + id).val(item_detail);
            $('#total_balance').val(total_balance);
            $('#hidden_t_bal').val(total_balance);
            $('#div_code_div' + id).val(div_code_div);
            $('#gen_name' + id).val(gen_name);
            $('#um_name' + id).val(um_name);
            $('#hidden_div' + id).val(div_code_div);
            $('#hidden_gen' + id).val(gen_name);
            $('#hidden_um' + id).val(um_name);
            $("#ajax-loader").hide();
            $('#loc' + id).val('');
            $('#loc_name').val('');
            var button_id = $(this).attr("id");
            var rate = $('#rate' + button_id + '').val();
            var total = $('#total').val();
            var total_rr = total.replaceAll(',', '');
            var total_r = total_rr - rate;
            $('#ItemCodeModel').modal('hide');
            $("#quantity" + id).focus();
            $('#order_form').on('change', '#loc', function() {
                var loc_code = $('#loc').find(':selected').val();
                var loc_name = $('#loc').find(':selected').attr("data-name");
                $('#select2-loc-container').html(loc_code);
                $('#loc_name').val(loc_name);
            });
        });
        $('#company_table').on('click', '.odd', function() {
            var company_name = $(this).closest('tr').children('td:nth-child(2)').text();
            var company_code = $(this).closest('tr').children('td:nth-child(3)').text();
            $('#company_code').val(company_code);
            $('#company_name').val(company_name);
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
            $('#po_name').val('');
            $('#po_date').val('');
            $('#select_party').val('');
            $('#party_name').val('');
            $('#address_p').val('');
            $('#dc_ref').val('');
            $('#total_balance').val('');
            $('#loc_name').val('');
            $('#view_item').css('display', 'none');
            for (var a = 2; a < rowCount - 1; a++) {
                var d = a - 1;
                alert(d)
                $('#tr' + d + '').remove();
                $('#total').val('0');
            }
            $('#CompanyFormModel').modal('hide');
            $("#po_name").focus();
        });
        $('#party_table').on('click', '.odd', function() {
            var company_name = $(this).closest('tr').children('td:nth-child(2)').text();
            var company_code = $(this).closest('tr').children('td:nth-child(3)').text();
            var order_key = $(this).closest('tr').children('td:nth-child(4)').text();
            var doc_date = $(this).closest('tr').children('td:nth-child(3)').text();
            $('#PartyFormModel').modal('hide');
            $('#CompanyFormModel').modal('hide');
        });
        $('#salesman_table').on('click', '.even', function() {
            var salesman_name = $(this).closest('tr').children('td:nth-child(2)').text();
            var salesman_code = $(this).closest('tr').children('td:nth-child(3)').text();
            $('#salesman').val(salesman_code);
            $('#salesman_name').val(salesman_name);
            $('#SalesmanFormModel').modal('hide');
        });
        $('#salesman_table').on('click', '.odd', function() {
            var salesman_name = $(this).closest('tr').children('td:nth-child(2)').text();
            var salesman_code = $(this).closest('tr').children('td:nth-child(3)').text();
            $('#salesman').val(salesman_code);
            $('#salesman_name').val(salesman_name);
            $('#SalesmanFormModel').modal('hide');
        });
        $('#order_form').on('click', '#division', function() {
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
        });
        $('#purchase_mode').change(function() {
            var company_code = $("#company_code").val();
            var division_code = $("#division").val();
            var purchase_mode = $("#purchase_mode").val();
            if (division_code != '' && company_code != '') {
                $.ajax({
                    url: 'api/sales_module/transaction_files/sales_order_api.php',
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
                sale_code: {
                    required: true,
                },
                purchase_mode: {
                    required: true,
                },
                ok_qty: {
                    required: true,
                },
                ok_qty: {
                    required: true,
                },
                ok_qty: {
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
    });
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
        $('#example1').ready(function() {
            var i = 0;
            var total_amount = 0;
            $('.add').click(function() {
                var rowCount = $("#example1 tr").length;
                i = rowCount - 2;
                var company_code = $('#company_code').val();
                var company_code = $('#company_code').val();
                i++;
                var acc_desc = $('#acc_desc').val();
                var detail = $("#detail").val();
                var product = $("#product").val();
                var ok_qty = $("#ok_qty").val();
                var item_detail = $("#item_detail").val();
                var loc_code = $("#loc").val();
                var type = $("#type").val();
                var quantity = $("#quantity").val();
                var rates = $("#rate").val();
                rate = rates.replaceAll(',', '');
                var amounts = $("#amount").val();
                var division_i = $("#division_i").val();
                var gen_i = $("#gen_i").val();
                var um_i = $("#um_i").val();
                var hidden_div = $("#hidden_div").val();
                var hidden_gen = $("#hidden_gen").val();
                var hidden_um = $("#hidden_um").val();
                var hidden_t_bal = $("#hidden_t_bal").val();
                var ok_qty = $("#ok_qty").val();
                if (acc_desc == "") {
                    $('#msg').text("Item can't be the null.");
                } else if (quantity == "") {
                    $('#msg').text("Qty_Rcvd can't be the null.");
                } else if (ok_qty == "") {
                    $('#msg').text("Ok Qty have unsolved errror");
                } else if (gen_i == "") {
                    $('#msg').text("Enter Batch No.");
                } else if (um_i == "") {
                    $('#msg').text("Enter Expiry Date.");
                } else {
                    $('#msg').text("");
                    $("#acc_desc").val('');
                    $("#amount").val('0');
                    $("#loc").val('');
                    $("#detail").val('');
                    $("#product").val('');
                    $("#ok_qty").val('');
                    $("#item_detail").val('');
                    $("#quantity").val('');
                    $("#division_i").val('');
                    $("#gen_i").val('');
                    $("#um_i").val('');
                    $("#hidden_div").val('');
                    $("#hidden_gen").val('');
                    $("#hidden_um").val('');
                    $("#hidden_t_bal").val('');
                    $("#loc_name").val('');
                    $("#rate").val('');
                    $('#d_items tr:last').before('<tr id="tr' + i + '" class="tr"><td style="width:8%"><input style="width:83px;height:32px; background-color: #b7edea;" tabindex="-1" name="acc_desc[]" id = "acc_desc' + i + '" class="acc_desc" type="text" readonly></td><td><textarea style="height:32px;background-color:#ccd4e1;" name="detail[]" id = "detail' + i + '" class="form-control form-control-sm detail" readonly></textarea></td><td><textarea style=" padding:0 2px 0 0;width: 110px;;height:32px; background-color: #ccd4e1;" name="product[]" id = "product' + i + '" class="form-control form-control-sm product" readonly></textarea></td><td><textarea style=" padding:0 2px 0 0;width: 100%;;height:32px; background-color: #ccd4e1;" type="text" name="item_detail[]" id = "item_detail' + i + '" readonly class="form-control form-control-sm item_detail"></textarea></td><td><input  style="padding:0 2px 0 0;width:90px;height:32px;text-align:right; " type="text" name="quantity[]" id = "quantity' + i + '"  class="form-control form-control-sm quantity"></td><td><input style="text-align:right; padding:0 2px 0 0;width:90px;height:32px"  pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" name="rate[]" id = "rate' + i + '" class="form-control form-control-sm rate" ></td><td><input style="text-align:right; background-color: #ccd4e1; padding:0 2px 0 0;width:90px;height:32px" type="text" name="ok_qty[]" id = "ok_qty' + i + '" class="form-control form-control-sm ok_qty" readonly></td><td><select name="loc[]" id = "loc' + i + '" class="js-example-basic-single loc" style="background-color: #61bdb6;"></select></td><td><textarea  style="width:100px;height:32px;font-size:12px"  pattern="[a-zA-Z0-9 ,._-]{1,}" tabindex="-1"  type="text" name="gen_i[]" id = "gen_i' + i + '" class="form-control form-control-sm gen_i"></textarea></td><td style="width: 10%;display: none;"><input style="width:100px;height:32px;font-size:12px; display: none;"  pattern="[a-zA-Z0-9 ,._-]{1,}" type="text"  name="hidden_div[]" id = "hidden_div' + i + '" class="hidden_div"></td><td style="width: 10%;display: none;"><input style="width:100px;height:32px;font-size:12px; display: none;"  pattern="[a-zA-Z0-9 ,._-]{1,}" type="text"  name="hidden_gen[]" id = "hidden_gen' + i + '" class="hidden_gen"></td><td style="width: 10%; display: none;"><input style="width:100px;height:32px;font-size:12px; display: none;"  pattern="[a-zA-Z0-9 ,._-]{1,}" type="text"  name="hidden_um[]" id = "hidden_um' + i + '" class="hidden_um"></td><td><input style="width:100px;height:32px;font-size:12px" pattern="[a-zA-Z0-9 ,._-]{1,}" type="date" name="um_i[]" id = "um_i' + i + '" class="form-control form-control-sm um_i"></td><td style="width: 10%;display: none;"><input style="width:100px;height:32px;font-size:12px; display: none;"  pattern="[a-zA-Z0-9 ,._-]{1,}" type="text"  name="hidden_t_bal[]" id = "hidden_t_bal' + i + '" class="hidden_t_bal"></td><td><button type = "button" id="' + i + '" class="btn btn-sm btn-danger remove"><b>X<b></button></td></tr>');
                    $('#type').prop("selectedIndex", 0).val();
                    $.ajax({
                        url: 'api/Inventory_management/inventory_locals/grn_local_api.php',
                        type: 'POST',
                        data: {
                            action: 'location_detail'
                        },
                        dataType: "json",
                        async: false,
                        success: function(response) {
                            $('#loc' + i).html('');
                            $('#loc' + i).addClass('js-example-basic-single');
                            $('.js-example-basic-single').select2();
                            $('#loc' + i).append(
                                '<option value="" selected disabled>Select Location</option>');
                            $.each(response, function(key, value) {
                                $('#loc' + i).append('<option data-name="' + value["loc_name"] + '"  data-code=' + value["loc_code"] + ' value=' + value["loc_code"] + '>' + value["loc_code"] + ' - ' + value["loc_name"] + '</option>');
                            });
                            $('#loc' + i + '').val(loc_code);
                        },
                        error: function(error) {
                            console.log(error);
                            alert("Contact IT Department");
                        }
                    });
                    setTimeout(function() {
                        var rowCounts = $("#example1 tr").length;
                        row = rowCounts - 3;
                        for (var j = 1; j <= row; j++) {
                            var loc_code = $('#loc' + j).find(':selected').val();
                            var loc_name = $('#loc' + j).find(':selected').attr("data-name");
                            $('#select2-loc' + j + '-container').html(loc_code);
                            $('#loc_name').val(loc_name);
                        }
                    }, 100);
                    $('#acc_desc' + i + '').val(acc_desc);
                    $('#detail' + i + '').val(detail);
                    $('#quantity' + i + '').val(quantity);
                    $('#rate' + i + '').val(rates);
                    $('#gen_i' + i + '').val(gen_i);
                    $('#um_i' + i + '').val(um_i);
                    $('#amount' + i + '').val(amounts);
                    $('#product' + i + '').val(product);
                    $('#ok_qty' + i + '').val(ok_qty);
                    $('#item_detail' + i + '').val(item_detail);
                    $('#hidden_div' + i + '').val(hidden_div);
                    $('#hidden_gen' + i + '').val(hidden_gen);
                    $('#hidden_um' + i + '').val(hidden_um);
                    $('#hidden_t_bal' + i + '').val(hidden_t_bal);
                    $('#quantity' + i + '').css('text-align', 'right');
                    $('#quantity' + i + '').css('padding', '0 1px 0 0');
                    $('#rate' + i + '').css('text-align', 'right ');
                    $('#rate' + i + '').css('padding', '0 1px 0 0');
                    $('#amount' + i + '').css('text-align', 'right ');
                    $('#amount' + i + '').css('padding', '0 1px 0 0');
                    var um_name = $('#um_name').val('');
                    var div_code_div = $('#div_code_div').val('');
                    var gen_name = $('#gen_name').val('');
                    var loc_name = $('#loc_name' + i).val('');
                }
            });
            $('#example1').on('click', '.tr', function() {
                var button_id = $(this).attr("id");
                if (button_id == 'main_tr') {
                    var item_code = $('#acc_desc').val();
                    if (item_code == '') {
                        $('#div_code_div').val('');
                        $('#gen_name').val('');
                        $('#um_name').val('');
                        $('#total_balance').val('');
                        $('#loc_name').val('');
                    } else {
                        var order_key = $('#po_name').val();
                        var doc_date = $('#po_date').val();
                        $.ajax({
                            url: 'api/Inventory_management/inventory_locals/grn_local_api.php',
                            type: 'POST',
                            data: {
                                action: 'item_detail_tr',
                                item_code: item_code,
                                order_key: order_key,
                                doc_date: doc_date
                            },
                            dataType: "json",
                            success: function(response) {
                                console.log(response);
                                $('#div_code_div').val(response.div_name);
                                $('#gen_name').val(response.gen_name);
                                $('#um_name').val(response.unit_name);
                                $('#total_balance').val(response.order_bal_qty);
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
                    var div_code_div = $('#hidden_div' + id + '').val();
                    var gen_name = $('#hidden_gen' + id + '').val();
                    var um_name = $('#hidden_um' + id + '').val();
                    var order_bal_qty = $('#hidden_t_bal' + id + '').val();
                    $('#div_code_div').val(div_code_div);
                    $('#gen_name').val(gen_name);
                    $('#um_name').val(um_name);
                    var qty = $('#quantity' + id).val();
                    var tot_qty = parseFloat(qty) + parseFloat(order_bal_qty);
                    $('#total_balance').val(tot_qty);
                    var loc_code = $('#loc' + id).val();
                    if (loc_code != null) {
                        $.ajax({
                            url: 'api/Inventory_management/inventory_locals/grn_local_api.php',
                            type: 'POST',
                            data: {
                                action: 'lc',
                                loc_code: loc_code
                            },
                            dataType: "json",
                            success: function(response) {
                                console.log(response);
                                $('#loc_name').val(response.loc_name);
                            },
                            error: function(error) {
                                console.log(error);
                                alert("Contact IT Department");
                            }
                        });
                    }
                }
            });
            $('#example1').on('click', '.remove', function() {
                var button_id = $(this).attr("id");
                var remove_amount = $('#amount' + button_id + '').val();
                var disc_rm = $('#disc' + button_id + '').val();
                var quan = $('#quantity' + button_id + '').val();
                var total_q = $('#total_q').val();
                var rate = $('#rate' + button_id + '').val();
                var total = $('#total').val();
                var frt_rm = $('#frt' + button_id + '').val();
                var excl_rm = $('#excl' + button_id + '').val();
                $('#tr' + button_id + '').remove();
                var current_amount = $('#total').text();
                var current_disc = $('#disc_t').text();
                var current_frt = $('#frt_t').text();
                var current_excl = $('#excl_t').text();
                current_amount = current_amount.replaceAll(',', '');
                var total_amount = parseFloat(current_amount) - parseFloat(remove_amount);
                if (isNaN(total_amount)) {
                    total_amount = '0';
                } else {
                    total_amount = total_amount.toLocaleString();
                }
                $('#total').text(total_amount);
                var total_disc = parseFloat(current_disc) - parseFloat(disc_rm);
                if (isNaN(total_disc)) {
                    total_disc = '0';
                } else {
                    total_disc = total_disc.toLocaleString();
                }
                $('#disc_t').text(total_disc);
                var total_frt = parseFloat(current_frt) - parseFloat(frt_rm);
                if (isNaN(total_frt)) {
                    total_frt = '0';
                } else {
                    total_frt = total_frt.toLocaleString();
                }
                $('#frt_t').text(total_frt);
                var total_excl = parseFloat(current_excl) - parseFloat(excl_rm);
                if (isNaN(total_excl)) {
                    total_excl = '0';
                } else {
                    total_excl = total_excl.toLocaleString();
                }
                $('#excl_t').text(total_excl);
                var total_rr = total.replaceAll(',', '');
                var rate_rr = rate.replaceAll(',', '');
                var total_r = total_rr - rate_rr;
                if (isNaN(total_e)) {
                    formatted2 = '0';
                } else {
                    var total_e = new Intl.NumberFormat(
                        'en-US', {
                            style: 'currency',
                            currency: 'USD',
                            currencyDisplay: 'narrowSymbol'
                        }).format(total_e);
                    var formatted2 = total_e.replace(/[$]/g, '');
                }
                if (isNaN(total_r)) {
                    formatted_s = '0';
                } else {
                    var total_r = new Intl.NumberFormat(
                        'en-US', {
                            style: 'currency',
                            currency: 'USD',
                            currencyDisplay: 'narrowSymbol'
                        }).format(total_r);
                    var formatted_s = total_r.replace(/[$]/g, '');
                }
                $('#total_q').val(formatted2);
                $('#total').val(formatted_s);
            });
        });
        $("#order_form").on("submit", function(e) {
            var post = $('#post').val();
            var voucher_no = $('#doc_no').val();
            if (post == 'Y') {
                $("#posted_error").show();
                $("#posted_error_msg").html("Voucher Number '<b>" + voucher_no + "</b>' has been already posted ");
                $("#submit").attr('disabled', 'disabled');
            } else {
                if ($("#order_form").valid()) {
                    var rowCount = $("#example1 tr").length;
                    if (rowCount > 3) {
                        var quantity = $('#quantity').val();
                        var rej_qty = $('#rate').val();
                        var ok_qty = $('#ok_qty').val();
                        if (quantity == '' && rej_qty == '' || rej_qty == '0' && ok_qty == '0' || ok_qty == '0.00') {
                            e.preventDefault();
                            var formData = new FormData(this);
                            formData.append('action', 'update');
                            $.ajax({
                                url: 'api/Inventory_management/inventory_locals/grn_local_api.php',
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
                                        success: function(response) {
                                            if (status == 0) {
                                                $("#msg").html(message);
                                            } else {
                                                $.get('inventory_management/inventory_local/grn_local_list.php', function(data, status) {
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
            }
        });
    });
    $(document).ready(function() {
        var doc_no = <?php echo $_GET['doc_no'] ?>;
        var doc_type = "<?php echo $_GET['doc_type'] ?>";
        var doc_year = "<?php echo $_GET['doc_year'] ?>";
        var co_code = <?php echo $_GET['co_code'] ?>;
        var do_key = "<?php echo $_GET['do_key'] ?>";
        $('#doc_no').val(doc_no);
        $('#doc_type').val(doc_type);
        $('#year').val(doc_year);
        $('#company_code').val(co_code);
        $('#do_key').val(do_key);
        $.ajax({
            url: 'api/Inventory_management/inventory_locals/grn_local_api.php',
            type: "post",
            data: {
                action: 'edit',
                doc_no: doc_no,
                doc_type: doc_type,
                doc_year: doc_year,
                co_code: co_code,
                do_key: do_key
            },
            success: function(response) {
                console.log(response);
                $('#voucher_date').val(response.DOC_DATE);
                $('#year').val(response.DOC_YEAR);
                $('#po_name').val(response.PO_NO);
                $('#order_key').val(response.DO_KEY);
                $('#po_date').val(response.PO_DATE);
                $('#select_party').val(response.PARTY_CODE);
                $('#party_ref').val(response.PARTY_REF);
                $('#dc_ref').val(response.ORDER_PARTY_REF);
                $('#voucher').val(response.REFNUM2);
                $('#order_ref').val(response.ORDER_REFNUM);
                $('#narration').val(response.REMARKS);
                $('#company_name').val(response.co_name);
                $('#party_name').val(response.party_name);
                $('#address_p').val(response.address);
                $('#post').val(response.POST);
                var account_code = $('#acc_desc').find(':selected').val();
                var detail = $('#acc_desc').find(':selected').attr("data-name");
                $('#select2-acc_desc-container').html(account_code);
                $('#detail').val(detail);
                $.ajax({
                    url: 'api/Inventory_management/inventory_locals/grn_local_api.php',
                    type: 'POST',
                    data: {
                        action: 'edit_table',
                        doc_no: doc_no,
                        doc_type: doc_type,
                        doc_year: doc_year,
                        co_code: co_code,
                        do_key_ref: do_key
                    },
                    dataType: "json",
                    success: function(data) {
                        var total_amount = 0;
                        var total_quantity = 0;
                        var rej_qty = 0;
                        var j = 1;
                        var k = 0;
                        var l = 0;
                        if (data.length >= 1) {
                            for (var i = 1; i <= data.length; i++) {
                                $('#d_items tr:last').before('<tr id="tr' + i + '" class="tr"><td style="width:8%"><input style="width:83px;height:32px; background-color: #b7edea;" name="acc_desc[]" id = "acc_desc' + i + '" class="acc_desc" type="text" readonly></td><td><textarea style="height:32px;background-color:#ccd4e1;" name="detail[]" id = "detail' + i + '" class="form-control form-control-sm detail" readonly></textarea></td><td><textarea style=" padding:0 2px 0 0;width: 110px;;height:32px; background-color: #ccd4e1;" name="product[]" id = "product' + i + '" class="form-control form-control-sm product" readonly></textarea></td><td><textarea style=" padding:0 2px 0 0;width: 100%;;height:32px; background-color: #ccd4e1;" type="text" name="item_detail[]" id = "item_detail' + i + '" readonly class="form-control form-control-sm item_detail"></textarea></td><td><input  style="padding:0 2px 0 0;width:90px;height:32px;text-align:right; " type="text" name="quantity[]" id = "quantity' + i + '"  class="form-control form-control-sm quantity"></td><td><input style="text-align:right; padding:0 2px 0 0;width:90px;height:32px"  pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" name="rate[]" id = "rate' + i + '" class="form-control form-control-sm rate" ></td><td><input style="text-align:right; background-color: #ccd4e1; padding:0 2px 0 0;width:90px;height:32px" type="text" name="ok_qty[]" id = "ok_qty' + i + '" class="form-control form-control-sm ok_qty" readonly></td><td><select name="loc[]" id = "loc' + i + '" class="js-example-basic-single loc" style="background-color: #61bdb6;"></select></td><td><textarea  style="width:100px;height:32px;font-size:12px"  pattern="[a-zA-Z0-9 ,._-]{1,}" tabindex="-1"  type="text" name="gen_i[]" id = "gen_i' + i + '" class="form-control form-control-sm gen_i"></textarea></td><td style="width: 10%;display: none;"><input style="width:100px;height:32px;font-size:12px; display: none;"  pattern="[a-zA-Z0-9 ,._-]{1,}" type="text"  name="hidden_div[]" id = "hidden_div' + i + '" class="hidden_div"></td><td style="width: 10%;display: none;"><input style="width:100px;height:32px;font-size:12px; display: none;"  pattern="[a-zA-Z0-9 ,._-]{1,}" type="text"  name="hidden_gen[]" id = "hidden_gen' + i + '" class="hidden_gen"></td><td style="width: 10%; display: none;"><input style="width:100px;height:32px;font-size:12px; display: none;"  pattern="[a-zA-Z0-9 ,._-]{1,}" type="text"  name="hidden_um[]" id = "hidden_um' + i + '" class="hidden_um"></td><td><input style="width:100px;height:32px;font-size:12px" pattern="[a-zA-Z0-9 ,._-]{1,}" type="date" name="um_i[]" id = "um_i' + i + '" class="form-control form-control-sm um_i"></td><td style="width: 10%;display: none;"><input style="width:100px;height:32px;font-size:12px; display: none;"  pattern="[a-zA-Z0-9 ,._-]{1,}" type="text"  name="hidden_t_bal[]" id = "hidden_t_bal' + i + '" class="hidden_t_bal"></td><td><button type = "button" id="' + i + '" class="btn btn-sm btn-danger remove"><b>X<b></button></td></tr>');
                                var item_code = data[k].ITEM_CODE;
                                $('#acc_desc' + i).val(item_code);
                                var div_name = data[k].div_name;
                                $('#hidden_div' + i).val(div_name);
                                var gen_name = data[k].gen_name;
                                $('#hidden_gen' + i).val(gen_name);
                                var unit_name = data[k].unit_name;
                                $('#hidden_t_bal' + i).val(unit_name);
                                var order_bal_qty = data[k].order_bal_qty;
                                $('#hidden_t_bal' + i).val(order_bal_qty);
                                var item_type = data[k].ITEM_TYPE;
                                $('#detail' + i).val(item_type);
                                var product_code = data[k].PRODUCT_CODE;
                                $('#product' + i).val(product_code);
                                var item_detail = data[k].ITEM_DETAIL;
                                $('#item_detail' + i).val(item_detail);
                                var quantity = data[k].QTY;
                                var quantity_formatted = new Intl.NumberFormat(
                                    'en-US', {
                                        style: 'currency',
                                        currency: 'USD',
                                        currencyDisplay: 'narrowSymbol'
                                    }).format(quantity);
                                var quantity_formatted = quantity_formatted.replace(/[$]/g, '');
                                $('#quantity' + i).val(quantity_formatted);
                                var rate = data[k].REJ_QTY;
                                var rate_formatted = new Intl.NumberFormat(
                                    'en-US', {
                                        style: 'currency',
                                        currency: 'USD',
                                        currencyDisplay: 'narrowSymbol'
                                    }).format(rate);
                                var rate_formatted = rate_formatted.replace(/[$]/g, '');
                                $('#rate' + i).val(rate_formatted);
                                var ok_qty = data[k].OK_QTY;
                                var ok_qty_formatted = new Intl.NumberFormat(
                                    'en-US', {
                                        style: 'currency',
                                        currency: 'USD',
                                        currencyDisplay: 'narrowSymbol'
                                    }).format(ok_qty);
                                var ok_qty_formatted = ok_qty_formatted.replace(/[$]/g, '');
                                $('#ok_qty' + i).val(ok_qty_formatted);
                                var batch_no = data[k].BATCH_NO;
                                $('#gen_i' + i).val(batch_no);
                                var exp_date = data[k].EXPIRY_DATE;
                                $('#um_i' + i).val(exp_date);
                                var total_quantity = parseFloat(data[k].QTY) + parseFloat(total_quantity);
                                var total_quantity_formatted = new Intl.NumberFormat(
                                    'en-US', {
                                        style: 'currency',
                                        currency: 'USD',
                                        currencyDisplay: 'narrowSymbol'
                                    }).format(total_quantity);
                                var total_quantity_formatted = total_quantity_formatted.replace(/[$]/g, '');
                                $('#total_q').val(total_quantity_formatted);
                                var rej_qty = parseFloat(data[k].REJ_QTY) + parseFloat(rej_qty);
                                var rej_qty_formatted = new Intl.NumberFormat(
                                    'en-US', {
                                        style: 'currency',
                                        currency: 'USD',
                                        currencyDisplay: 'narrowSymbol'
                                    }).format(rej_qty);
                                var rej_qty_formatted = rej_qty_formatted.replace(/[$]/g, '');
                                $('#total').val(rej_qty_formatted);
                                $.ajax({
                                    url: 'api/Inventory_management/inventory_locals/grn_local_api.php',
                                    type: 'POST',
                                    data: {
                                        action: 'location_detail'
                                    },
                                    dataType: "json",
                                    success: function(response11) {
                                        $('#loc' + j).html('');
                                        $('#loc' + j).addClass('js-example-basic-single');
                                        $('.js-example-basic-single').select2();
                                        $('#loc' + j).append('<option value="" selected disabled>Select Account</option>');
                                        $.each(response11, function(key, value) {
                                            $('#loc' + j).append('<option data-name="' + value["loc_name"] + '"  data-code=' + value["loc_code"] + ' value=' + value["loc_code"] + '>' + value["loc_code"] + ' - ' + value["loc_name"] + '</option>');
                                            if (value["loc_code"] == data[l].LOC_CODE) {
                                                loc = value["loc_code"];
                                                $('#loc' + j + ' option[value=' + loc + ']').prop("selected", true);
                                            }
                                        });
                                        j++;
                                        l++;
                                    },
                                    error: function(error) {
                                        console.log(error);
                                        alert("Contact IT Department");
                                    }
                                });
                                k++;
                            }
                        }
                    },
                    error: function(error) {
                        console.log(error);
                        alert("Contact IT Department");
                    }
                });
            },
            error: function(e) {
                console.log(e);
                alert("Contact IT Department");
            }
        });
    });
    $("#order_form").on('click', '#report', function() {
        var co_code = $("#company_code").val();
        var doc_no = $("#doc_no").val();
        var doc_year = $("#year").val();
        var order_key = $("#order_key").val();
        $("#ajax-loader").hide();
        let invoice_url = "invoicereports/inventory_local/grn_report.php?action=print&co_code=" + co_code + "&doc_no=" + doc_no + "&doc_year=" + doc_year + "&order_key=" + order_key;
        window.open(invoice_url, '_blank');
    });
    $('#dashboard_breadcrumb').click(function() {
        $.get('dashboard_main/dashboard_main.php', function(data, status) {
            $('#content').html(data);
        });
    });
    $("#il_breadcrumb").on("click", function() {
        $.get('inventory_management/inventory_local/inventory_local.php', function(data, status) {
            $("#content").html(data);
        });
    });
    $("#po_list_breadcrumb").on("click", function() {
        $.get('inventory_management/inventory_local/grn_local_list.php', function(data, status) {
            $("#content").html(data);
        });
    });
    $("#add_po_local_breadcrumb").on("click", function() {
        $.get('inventory_management/inventory_local/add_grn_local_edit.php', function(data, status) {
            $("#content").html(data);
        });
    });
</script>
<?php include '../../includes/loader.php' ?>