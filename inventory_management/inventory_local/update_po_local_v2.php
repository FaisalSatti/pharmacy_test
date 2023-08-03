<?php
session_start();
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-lg-6">
                    <h1>Purchase Order - Local</h1>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                        <li class="breadcrumb-item active"><button class="btn btn-sm" id="il_breadcrumb"> Inventory
                                Local</button></li>
                        <li class="breadcrumb-item"><button class="btn btn-sm" id="po_list_breadcrumb"> PO List</button>
                        </li>
                        <li class="breadcrumb-item"><button class="btn btn-sm" id="update_po_local_breadcrumb" disabled> Update
                                PO Local</button></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row" style="margin-top:-23px;">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body" style="padding:7px">
                            <div class="container">
                                <form method="post" id="order_form">
                                    <?php include '../../display_message/display_message.php' ?>
                                    <div id="posted_error" class="alert alert-danger alert-dismissible" style="display: none;">
                                        <button type="button" class="close" aria-hidden="true">×</button>
                                        <span class="vd_alert-icon"><i class="fa fa-exclamation-triangle vd_red"></i></span><strong> Note ! </strong>
                                        <!-- This Voucher is already Posted !!! -->
                                        <span id="posted_error_msg"></span> ,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="no_edit"><b> *** You can't edit this ***</b></span>
                                    </div>
                                    <div class="row" style="border:1px solid gray;padding:20px;; border-radius:5px;box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.2), 0 20px 20px 0 rgba(0, 0, 0, 0.19);">
                                        <div class="col-lg-1 col-md-2 form-group">
                                            <label>Doc#:</label>
                                        </div>

                                        <input maxlength="30" type="hidden" name="post" id="post" class="form-control form-control-sm" placeholder="Voucher No">
                                        <div class="col-lg-2 col-md-4 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" style="background-color:#ccd4e1;font-weight:bold;" name="doc_no" id="doc_no" class="form-control form-control-sm" placeholder="DOC #" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-md-2 form-group">
                                            <label>Date:</label>
                                        </div>
                                        <div class="col-lg-2 col-md-4 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input type="date" name="doc_date" id="voucher_date" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-md-2 form-group">
                                            <label>Year:</label>
                                        </div>
                                        <div class="col-lg-2 col-md-4 form-group">
                                            <!-- <label for=""> Date :</label><span style="color:red;">*</span> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input type="text" name="doc_year" id="year" tabindex="-1" style="background-color:#ccd4e1;font-weight:bold;" class="form-control form-control-sm" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-md-2 form-group">
                                            <label>Order Key:</label>
                                        </div>
                                        <div class="col-lg-2 col-md-4 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input  maxlength="30" type="text" style="background-color:#ccd4e1;font-weight:bold;" name="order_key" id="order_key" tabindex="-1" class="form-control form-control-sm" placeholder="Order Key" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-md-2 form-group">
                                            <label>Company:</label>
                                        </div>
                                        <div class="col-lg-2  col-md-4 form-group">
                                            <!-- <label for="">Company Code :<span style="color:red">*</span></label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                                </div>
                                                <input maxlength="30" type="text" name="company_code" id="company_code" style="background-color:#ccd4e1;font-weight:bold;" class="form-control form-control-sm" placeholder="Select Company" readonly tabindex="-1">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 form-group">
                                            <!-- <label for="inputCompanyName">Company Name :</label><span style="color:red;">*</span> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input  maxlength="30" type="text" style="background-color:#ccd4e1;font-weight:bold;" name="company_name" id="company_name" class="form-control form-control-sm" placeholder="Company Name" readonly tabindex="-1">
                                            </div>
                                        </div>

                                        <div class="col-lg-1 col-md-2 form-group">
                                            <label>CORef:</label>
                                        </div>
                                        <div class="col-lg-2 col-md-4 form-group">
                                            <!-- <label for="">CO Ref :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input  maxlength="30" type="text" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px" name="company_ref" id="company_ref" class="form-control form-control-sm" placeholder="Company Ref">
                                            </div>
                                        </div>

                                        <div class="col-lg-1 col-md-2 form-group">
                                            <label>PrtyRef</label>
                                        </div>
                                        <div class="col-lg-2 col-md-4 form-group">
                                            <!-- <label for="">Party Ref :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input  maxlength="30" type="text" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px" name="party_ref" id="party_ref" class="form-control form-control-sm" placeholder="Party Ref">
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-md-2 form-group">
                                            <label>D_Date</label>
                                        </div>
                                        <div class="col-lg-2 col-md-4 form-group">
                                            <!-- <label for=""> Date :</label><span style="color:red;">*</span> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input type="date" name="dlvry_date" id="dlvry_date" class="form-control form-control-sm" value="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-md-2 form-group">
                                            <label>POCloseY/N:</label>
                                        </div>
                                        <!-- <div class="col-md-2"></div> -->
                                        <div class="col-lg-2 col-md-4 form-group">
                                            <!-- <label for="">PO Catg L/I :<span style="color:red">*</span></label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-list-alt"></i></span>
                                                </div>
                                                <input pattern="[Y,y,N,n]" maxlength="1" type="text" name="po_close" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px" id="Y_N" class="form-control form-control-sm" value="N" placeholder="Y / N">
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-md-2 form-group">
                                            <label>Voucher#</label>
                                        </div>
                                        <div class="col-lg-5 col-md-4 form-group">
                                            <!-- <label for="">Voucher# :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input maxlength="30" type="text" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px" name="v_no" id="v_no" class="form-control form-control-sm" placeholder="Voucher No">
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-md-2 form-group">
                                            <label>PartyCo</label>
                                        </div>
                                        <div class="col-lg-2 col-md-4 form-group">
                                            <!-- <label for="">Party :<span style="color:red">*</span></label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                                </div>
                                                <input maxlength="30" type="text" name="party" id="party" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px" class="form-control form-control-sm" placeholder="Select Party" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 form-group">
                                            <!-- <label for="">Party :<span style="color:red">*</span></label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                                </div>
                                                <input type="text" name="name_p" id="name_p" style="background-color:#ccd4e1;font-weight:bold;" class="form-control form-control-sm" placeholder="Party Name" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-md-2 form-group">
                                            <label>CRDAYS:</label>
                                        </div>
                                        <div class="col-lg-5 col-md-4  form-group">
                                            <!-- <label for="">CO Ref :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px" name="cr_days" id="cr_days" class="form-control form-control-sm" placeholder="CR DAYS">
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-md-2 form-group">
                                            <label>Narration:</label>
                                        </div>
                                        <div class="col-lg-11 col-md-10 form-group">
                                            <!-- <label for="">Narration :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <textarea rows="1" name="narration" id="narration" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px" class="form-control form-control-sm" placeholder="Narration"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 form-group text-center">
                                            <span id="msg3" style="color: red;font-size: 13px;"></span>
                                        </div>
                                        <!-- </div> -->
                                        <!-- </div> -->
                                    </div>
                                    <br>
                                    <div class="row justify-content-center">
                                        <div class="col-lg-12">
                                            <div style="height:30px;" class="loading">
                                                <span style="text-align:center; font-weight:bold;">Order Details</span>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>Item Code</th>
                                                    <th>Name</th>
                                                    <th>Product</th>
                                                    <th>Item Detail</th>
                                                    <th>Quantity</th>
                                                    <th>Rate</th>
                                                    <th>Amount</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="d_items">
                                                <tr id="main_tr" class="tr">
                                                    <td style="width:8%"><input style="width:83px;height:35px;background-color:#b7edea;" name="" id="acc_desc" placeholder="Item Code" class="acc_desc" type="text" readonly></td>
                                                    <td style="width: 13%;"><textarea style="height:35px;background-color:#ccd4e1 " rows="1" name="" id="detail" placeholder="Item Name" class="detail" readonly tabindex="-1"></textarea></td>
                                                    <td><select name="" id="acc_descr" class="js-example-basic-single acc_descr"></select></td>
                                                    <td><textarea style="width:100%;height:35px;font-size:12px"  type="text" placeholder="Item Detail" name="" id="item_detail" class=""></textarea>
                                                    </td>
                                                    <td style="width: 8%;"><input style="text-align:right; padding:0 2px 0 0;width:83px;height:35px" type="text" name="" id="quantity" class="quantity" min="0" placeholder="0" oninput="this.value = 
                                                        !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null">
                                                    </td>
                                                    <td style="width: 10%;"><input style="text-align:right; padding:0 2px 0 0;width:100px;height:35px" pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" name="" id="rate" placeholder="0.00" class="rate" min="0" oninput="this.value = 
                                                        !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"></td>
                                                    <td style="width: 10%;"><input style="text-align:right; padding:0 2px 0 0;width:100px;height:35px;background-color:#ccd4e1" pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" tabindex="-1" placeholder="0.00" name="" id="amount" class="amount" readonly></td>
                                                    <td style="display:none;">
                                                        <textarea style="width:100%;height:35px;background-color:#ccd4e1;font-size:14px"  type="text" name="hidden_product_name" id="hidden_product_name" class="" readonly></textarea>
                                                    </td>
                                                    <td style="display: none;">
                                                        <textarea style="width:100%;height:35px;background-color:#ccd4e1;font-size:14px"  type="text" name="" id="hidden_division_i" class="division_i" readonly></textarea>
                                                    </td>
                                                    <td style="display: none;">
                                                        <textarea style="width:100%;height:35px;background-color:#ccd4e1;font-size:14px"  tabindex="-1" type="text" name="" id="hidden_gen_i" class="gen_i" readonly></textarea>
                                                    </td>
                                                    <td style="display: none;">
                                                        <textarea style="width:100%;height:35px;background-color:#ccd4e1;font-size:14px"  tabindex="-1" type="text" name="" id="hidden_um_i" class="" readonly></textarea>
                                                    </td>
                                                    <td><button type="button" class="btn btn-sm btn-primary add"><i class="fa fa-plus"></i></button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tr id="last_tr">
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td style="font-weight:bold;text-align:right;" name="total_q" id="total_q"><b>0</b></td>
                                                <td style="text-align:right;"></td>
                                                <td style="font-weight:bold;text-align:right;" name="total" id="total"><b>0</b></td>
                                                <td></td>
                                            </tr>
                                        </table>
                                        <div class="row">
                                            <div class="col-md-1">
                                                <label>Div </lable>
                                            </div>
                                            <div class="col-md-2">
                                                <textarea style="width:100%;height:35px;background-color:#ccd4e1 ;font-size:14px" pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" name="" id="division_i" placeholder="Division Name" class="division_i" readonly tabindex="-1"></textarea>
                                            </div>
                                            <div class="col-md-6">
                                                <textarea style="width:100%;height:35px;background-color:#ccd4e1;font-size:14px" pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" name="product_name" placeholder="Product Name" id="product_name" class="" readonly tabindex="-1"></textarea>
                                            </div>
                                            <div class="col-md-3"></div>
                                            <div class="col-md-1">
                                                <label>Gen</lable>
                                            </div>
                                            <div class="col-md-2">
                                                <textarea style="width:100%;height:35px;background-color:#ccd4e1;font-size:14px" pattern="[a-zA-Z0-9 ,._-]{1,}" tabindex="-1" type="text" name="" id="gen_i" class="gen_i" placeholder="Generic Name" readonly></textarea>
                                            </div>
                                            <div class="col-md-1">
                                                <label>Sales Tax</lable>
                                            </div>
                                            <div class="col-md-2">
                                                <td><select name="saletax_code" id="saletax_code" class="js-example-basic-single saletax_code"></select></td>
                                            </div>
                                            <div class="col-md-2">
                                                <input style="width:100%;height:35px;background-color:#ccd4e1;" type="text" name="" id="saletax_name" placeholder="Account Name" class="saletax_name" readonly tabindex="-1"></td>
                                            </div>
                                            <div class="col-md-2">
                                                <input style="width:100%;height:35px;text-align:right;" type="text" name="saletax_value" placeholder="Add Salex Tax %" id="saletax_value" class="saletax_value"> </td>
                                            </div>
                                            <div class="col-md-2">
                                                <input style="width:100%;height:35px;background-color:#ccd4e1;text-align:right;" type="text" name="saletax_amount" placeholder="Sales Tax Amount" id="saletax_amount" class="saletax_amount" readonly tabindex="-1"> </td>
                                            </div>
                                            <div class="col-md-1">
                                                <label>Um</lable>
                                            </div>
                                            <div class="col-md-2">
                                                <textarea style="width:100%;height:35px;background-color:#ccd4e1;font-size:14px" pattern="[a-zA-Z0-9 ,._-]{1,}" tabindex="-1" type="text" name="" id="um_i" placeholder="UM Name" class="" readonly></textarea>
                                            </div>
                                            <div class="col-md-1">
                                                <label>Add Tax</lable>
                                            </div>
                                            <div class="col-md-2">
                                                <td><select name="addtax_code" id="addtax_code" class="js-example-basic-single addtax_code"></select></td>
                                            </div>
                                            <div class="col-md-2">
                                                <input style="width:100%;height:35px;background-color:#ccd4e1;" type="text" name="" id="addtax_name" placeholder="Account Name" class="addtax_name" readonly tabindex="-1"></td>
                                            </div>
                                            <div class="col-md-2">
                                                <input style="width:100%;height:35px;text-align:right;" name="addtax_value" placeholder="Add Tax %" id="addtax_value" class="addtax_value"> </td>
                                            </div>
                                            <div class="col-md-2">
                                                <input style="width:100%;height:35px;text-align:right;background-color:#ccd4e1;" type="text" name="addtax_amount" placeholder="Sales Tax Amount" id="addtax_amount" class="addtax_amount" readonly tabindex="-1"> </td>
                                            </div>
                                            <div class="col-md-8"></div>
                                            <div class="col-md-2">
                                                <label>Net Amount</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input style="width:100%;height:35px;background-color:#ccd4e1;text-align:right;" type="text" name="net_amount" id="net_amount" class="net_amount" placeholder="Net Amount" readonly tabindex="-1"></td>
                                            </div>
                                        </div>
                                        <!-- </form> -->
                                        <div style="text-align: center;">
                                            <span id="msg" style="color: red;font-size: 13px;"></span>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-10"></div>
                                            <div class="col-sm-1 text-right">
                                                <a id="report" type="button" value="Submit" class="btn btn-info toastrDefaultSuccess"><i style="font-size:20px" class="fa fa-file"></i></a>
                                            </div>
                                            <div class="col-sm-1 text-right">
                                                <button id="submit" type="submit" value="Submit" class="btn btn-primary toastrDefaultSuccess"><i style="font-size:20px" class="fa fa-plus"></i></button>
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
<style>
    body {
        zoom: 85%;
    }

    #item_table tr td:last-child {
        display: none;
    }

    select {
        width: 82% !important;
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

    .select2-hidden-accessible {
        border: 1px solid black !important;
    }

    .select2-selection {
        background-color: #b7edea !important;
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
        font-weight: 600;
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
        font-size: 15px;
    }

    .select2-container {
        width: 80% !important;
    }

    .amount::placeholder {
        text-align: right !important;
    }

    @media only screen and (max-width: 768px) {
        .select2-container {
            width: 100% !important;
        }
    }

    /* @media only screen and (min-width: 350px) and (max-width: 754px) {
.select2-container {
width: 85% !important;
}
}
@media screen and (min-width: 766px) and (max-width:994px) {
.select2-container {
width: 72% !important;
}
} */
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
        background-color: #b7edea;
    }

    #division {
        background-color: #61BDB6;
    }

    #company_code {
        background-color: #ccd4e1;
    }

    td input {
        font-size: 12px !important;
    }

    .select2-selection__rendered,
    .select2-results {
        font-size: 12px !important;
    }

    .form-control:read-only {
        background-color: #ccd4e1;
    }

    .form-control:focus {
        -moz-box-shadow: 0 0 8px rgba(82, 168, 236, .6);
        box-shadow: 0 0 10px orangered !important;
    }

    .form-group {
        margin-bottom: 4px !important;
    }

    input:focus,
    select:focus,
    textarea:focus,
    .select2-selection:focus {
        -moz-box-shadow: 0 0 8px rgba(82, 168, 236, .6);
        box-shadow: 0 0 8px orangered !important;
    }

    .modal-backdrop {
        zoom: 112%;
    }
</style>
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
<!-- Item code form -->
<div class="modal fade" id="ItemCodeModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Item</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table style="width:100%;display:table;" class="table-responsive" id="item_table">
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Pur Mod</th>
                            <th>Div Name</th>
                            <th>Gen Name</th>
                            <th>Item</th>
                            <th>Co Code</th>
                            <th>Div Code</th>
                            <th style="display:none;">UM Name</th>
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
                        <div class="col-lg-12">
                            <table class=" table table-bordered table-hover table-sm">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Name:</h3>
                                    </div>
                                    <div class="col-lg-9">
                                        <p id="name" class="card-title" style=" font-weight:bold;"></p>
                                    </div>
                                    <div class="col-lg-3">
                                        <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Address:</h3>
                                    </div>
                                    <div class="col-lg-9">
                                        <p id="address" class="card-title" style=" font-weight:bold;"></p>
                                    </div>
                                    <div class="col-lg-3">
                                        <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Phone#:</h3>
                                    </div>
                                    <div class="col-lg-9">
                                        <p id="phone" class="card-title" style=" font-weight:bold;"></p>
                                    </div>
                                    <div class="col-lg-3">
                                        <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">GST#:</h3>
                                    </div>
                                    <div class="col-lg-9">
                                        <p id="gst" class="card-title" style=" font-weight:bold;"></p>
                                    </div>
                                    <div class="col-lg-3">
                                        <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">NTN#:</h3>
                                    </div>
                                    <div class="col-lg-9">
                                        <p id="ntn" class="card-title" style=" font-weight:bold;"></p>
                                    </div>
                                    <div class="col-lg-3">
                                        <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Division:</h3>
                                    </div>
                                    <div class="col-lg-9">
                                        <p id="division_p" class="card-title" style=" font-weight:bold;"></p>
                                    </div>
                                    <div class="col-lg-3">
                                        <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">City:</h3>
                                    </div>
                                    <div class="col-lg-9">
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
<div class="col-lg-4">
    <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">TP Rate:</h3>
</div>
<div class="col-lg-8">
    <p id="tp_rate" class="card-title" style=" font-weight:bold;"></p>
</div>
<div class="col-lg-4">
    <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">TP Rate 2:</h3>
</div>
<div class="col-lg-8">
    <p id="tp_rate2" class="card-title" style=" font-weight:bold;"></p>
</div>
<div class="col-lg-4">
    <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">GST %:</h3>
</div>
<div class="col-lg-8">
    <p id="gst_per" class="card-title" style=" font-weight:bold;"></p>
</div>
<div class="col-lg-8">
    <p id="add_per" class="card-title" style=" font-weight:bold;"></p>
</div>
<!-- </div>
</table>
</div>
</div>
</div>
</form>
</div>
</div>
</div> -->
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
                            <th>Address</th>
                            <th>Party Code</th>
                            <th>CRDays</th>
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

        $('#voucher_date').focus();
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
            // $('#disc_m').attr('readonly',false);
            // $('#frt_m').attr('readonly',false);
            // $('#excl_m').attr('readonly',false);
            var previous_amounts = sessionStorage.getItem('previous_amount');
            // var previous_discs=sessionStorage.getItem('previous_disc');
            // var previous_frts=sessionStorage.getItem('previous_frt');
            // console.log(previous_amounts);
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
                // $('#excl'+rate_id).val('');
                $('#total').html(minuss);
                // $('#excl_t').html(minuss);

            } else {
                if (rate == "" || rate == '0' || rate == '0.00') {
                    // console.log("if");
                    $('#amount' + rate_id).val('');
                    // $('#excl'+rate_id).val('');
                    $('#total').html(minuss);
                    pre_rate = 0;
                    amts = 0;
                    // $('#excl_t').html(minuss);
                    // $('#total').text('');
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
                    // console.log(show_rate);
                    $('#rate' + rate_id).val(show_rate);
                    // $('#excl_m'+rate_id).attr('readonly',false);
                    // $('#disc_m'+rate_id).attr('readonly',false);
                    // $('#frt_m'+rate_id).attr('readonly',false);
                }
                var amts = parseFloat(quantity) * parseFloat(pre_rate);
                // console.log(amts)
                var org_amt = new Intl.NumberFormat(
                    'en-US', {
                        style: 'currency',
                        currency: 'USD',
                        currencyDisplay: 'narrowSymbol'
                    }).format(amts);
                var org_amt = org_amt.replace(/[$]/g, '');
                $('#amount' + rate_id).val(org_amt);
                // $('#excl'+rate_id).val(org_amt);
                var amount = $('#amount' + rate_id).val();
                // console.log(org_amt);
                // if (amount.indexOf(',') > -1) {
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
        $("#order_form").on('focus', '.quantity', function() {
            var button_id = $(this).attr("id");
            if (button_id == 'quantity') {
                var p_quantity_id = '';
            } else {
                var p_amountid = button_id.split("y");
                var p_quantity_id = p_amountid[1];
            }
            var previous_amount = $('#amount' + p_quantity_id).val();
            sessionStorage.setItem("previous_amount", previous_amount);
            var previous_quantity = $('#quantity' + p_quantity_id).val();
            sessionStorage.setItem("previous_qty", previous_quantity);
            var previous_tq = $('#total_q').text();
            sessionStorage.setItem("previous_tq", previous_tq);
        });
        $("#order_form").on('change', '.quantity', function() {
            var previous_amounts = sessionStorage.getItem('previous_amount');
            var previous_qtys = sessionStorage.getItem('previous_qty');
            var previous_tq = sessionStorage.getItem('previous_tq');
            // console.log(previous_amounts);
            if (previous_tq == "") {
                previous_tq = 0;
            } else {
                previous_tq = previous_tq.replaceAll(',', '');
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
            // var total_q=$('#total_q').val();
            // if(total_q == '' || total_q == '0' || total_q=='0.00'){
            //     minus_t_q=0;
            // }else{
            //     minus_t_q = total_q.replaceAll(',','');
            // }
            minuss_q = parseFloat(previous_tq) - parseFloat(previous_qty);
            console.log(previous_tq);
            console.log(previous_qty);
            console.log(minuss_q);
            var total = $('#total').text();
            if (total == '' || total == '0' || total == '0.00') {
                minuss = 0;
            } else {
                minus_t = total.replaceAll(',', '');
                minuss = parseFloat(minus_t) - parseFloat(previous_amount);
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
            if (button_id == 'quantity') {
                quantity_id = '';
            } else {
                var quantityid = button_id.split("y");
                quantity_id = quantityid[1];
            }
            var quantity = $('#quantity' + quantity_id).val();
            // var quantity1 = new Intl.NumberFormat(
            //             'en-US', {
            //             style: 'currency',
            //             currency: 'USD',
            //             currencyDisplay: 'narrowSymbol'
            //         }).format(quantity);
            //         var quantity1 = quantity1.replace(/[$]/g, '');
            $('#quantity' + quantity_id).val(quantity);
            var rate = $('#rate' + quantity_id).val();
            if (quantity == '' || quantity == '0' || quantity == '0.00') {
                quantity = 0;
                $('#amount' + quantity_id).val('');
                // $('#excl'+quantity_id).val('');
                $('#total').html(minuss);
                // $('#excl_t').html(minuss);

            } else {
                if (rate == "" || rate == '0' || rate == '0.00') {
                    // console.log("if");
                    $('#amount' + quantity_id).val('');
                    // $('#excl'+quantity_id).val('');
                    $('#total').html(minuss);
                    pre_rate = 0;
                    amts = 0;
                    // $('#excl_t').html(minuss);
                    // $('#total').text('');
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
                    // console.log(show_rate);
                    $('#rate' + quantity_id).val(show_rate);
                    // $('#excl_m'+quantity_id).attr('readonly',false);
                    // $('#disc_m'+quantity_id).attr('readonly',false);
                    // $('#frt_m'+quantity_id).attr('readonly',false);
                }
                var amts = parseFloat(quantity) * parseFloat(pre_rate);
                // console.log(amts)
                var org_amt = new Intl.NumberFormat(
                    'en-US', {
                        style: 'currency',
                        currency: 'USD',
                        currencyDisplay: 'narrowSymbol'
                    }).format(amts);
                var org_amt = org_amt.replace(/[$]/g, '');
                $('#amount' + quantity_id).val(org_amt);
                // $('#excl'+quantity_id).val(org_amt);
                var amount = $('#amount' + quantity_id).val();
                // console.log(org_amt);
                // if (amount.indexOf(',') > -1) {
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
                // console.log(total);
                $('#total').html(total);
                // $('#excl_t').html(total);
                // $('#amount'+quantity_id).val(show_amount);
            }
            console.log(quantity);
            // console.log(minuss_q);
            var t_qty = parseInt(quantity) + parseInt(minuss_q);
            var finalformat = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(t_qty);
            var formatted1 = finalformat.replace(/[$]/g, '');
            $('#total_q').text(formatted1);

            // $('#disc_t').html(minuss_d);
            // $('#frt_t').html(minuss_f);
            // $('#disc_m'+rate_id).val('');
            // $('#frt_m'+rate_id).val('');
            // $('#excl_m'+rate_id).val('');
            // $('#disc'+rate_id).val('');
            // $('#frt'+rate_id).val('');


        });
        $("#order_form").on('change', '.rate', function() {
            console.log("ddsada");
            //NO1---
            var total = $('#total').html();
            if (total == '') {
                input1 = 0;
            } else {
                input1 = total.replaceAll(',', '');
            }
            //
            var format = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(input1);
            var formatted = format.replace(/[$]/g, '');
            $("#total").val(formatted);

            // NO2
            var sale = $('#saletax_value').val();
            if (sale == '') {
                input2 = 0;
            } else {
                input2 = sale.replaceAll(',', '');
            }
            var format2 = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(input2);
            var formatted2 = format2.replace(/[$]/g, '');
            $("#saletax_value").val(formatted2);

            var calc = parseFloat(input1) * parseFloat(input2) / 100;
            var add = $('#addtax_amount').val();
            if (add == '') {
                add = 0;
            } else {
                add = add.replaceAll(',', '');
            }
            var format3 = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(calc);
            var formatted3 = format3.replace(/[$]/g, '');
            $("#saletax_amount").val(formatted3);



            // NO 3
            var calc2 = parseFloat(input1) + parseFloat(calc) + parseFloat(add);
            // console.log(calc2);
            // $('#net_amount').val(calc2);
            // NO 4
            var format4 = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(calc2);
            var formatted4 = format4.replace(/[$]/g, '');
            $("#net_amount").val(formatted4);

            var total = $('#total').html();
            if (total == '') {
                input3 = 0;
            } else {
                input3 = total.replaceAll(',', '');
            }
            // NO 5
            var format5 = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(input3);
            var formatted5 = format5.replace(/[$]/g, '');
            $("#total").val(formatted5);
            //
            var add = $('#addtax_value').val();
            if (add == '') {
                input4 = 0;
            } else {
                input4 = add.replaceAll(',', '');
            }
            // NO 6
            var format6 = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(input4);
            var formatted6 = format6.replace(/[$]/g, '');
            $("#addtax_value").val(formatted6);
            //
            var calc = parseFloat(input3) * parseFloat(input4) / 100;
            var sale = $('#saletax_amount').val();
            if (sale == '') {
                sale = 0;
            } else {
                sale = sale.replaceAll(',', '');
            }
            // NO 7
            var format7 = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(calc);
            var formatted7 = format7.replace(/[$]/g, '');
            $("#addtax_amount").val(formatted7);
            //
            var calc2 = parseFloat(input3) + parseFloat(calc) + parseFloat(sale);
            var format8 = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(calc2);
            var formatted8 = format8.replace(/[$]/g, '');
            $("#net_amount").val(formatted8);

        });
        $("#order_form").on('change', '.quantity', function() {
            //NO1
            var total = $('#total').html();
            if (total == '') {
                input1 = 0;
            } else {
                input1 = total.replaceAll(',', '');
            }
            //
            var format = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(input1);
            var formatted = format.replace(/[$]/g, '');
            $("#total").val(formatted);

            // NO2
            var sale = $('#saletax_value').val();
            if (sale == '') {
                input2 = 0;
            } else {
                input2 = sale.replaceAll(',', '');
            }
            var format2 = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(input2);
            var formatted2 = format2.replace(/[$]/g, '');
            $("#saletax_value").val(formatted2);

            var calc = parseFloat(input1) * parseFloat(input2) / 100;
            var add = $('#addtax_amount').val();
            if (add == '') {
                add = 0;
            } else {
                add = add.replaceAll(',', '');
            }
            var format3 = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(calc);
            var formatted3 = format3.replace(/[$]/g, '');
            $("#saletax_amount").val(formatted3);



            // NO 3
            var calc2 = parseFloat(input1) + parseFloat(calc) + parseFloat(add);
            // console.log(calc2);
            // $('#net_amount').val(calc2);
            // NO 4
            var format4 = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(calc2);
            var formatted4 = format4.replace(/[$]/g, '');
            $("#net_amount").val(formatted4);

            var total = $('#total').html();
            if (total == '') {
                input3 = 0;
            } else {
                input3 = total.replaceAll(',', '');
            }
            // NO 5
            var format5 = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(input3);
            var formatted5 = format5.replace(/[$]/g, '');
            $("#total").val(formatted5);
            //
            var add = $('#addtax_value').val();
            if (add == '') {
                input4 = 0;
            } else {
                input4 = add.replaceAll(',', '');
            }
            // NO 6
            var format6 = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(input4);
            var formatted6 = format6.replace(/[$]/g, '');
            $("#addtax_value").val(formatted6);
            //
            var calc = parseFloat(input3) * parseFloat(input4) / 100;
            var sale = $('#saletax_amount').val();
            if (sale == '') {
                sale = 0;
            } else {
                sale = sale.replaceAll(',', '');
            }
            // NO 7
            var format7 = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(calc);
            var formatted7 = format7.replace(/[$]/g, '');
            $("#addtax_amount").val(formatted7);
            //
            var calc2 = parseFloat(input3) + parseFloat(calc) + parseFloat(sale);
            var format8 = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(calc2);
            var formatted8 = format8.replace(/[$]/g, '');
            $("#net_amount").val(formatted8);

        });
        // SALES TAX CALC
        $("#order_form").on('change', '#saletax_value', function() {
            //NO1
            var total = $('#total').html();
            if (total == '') {
                input1 = 0;
            } else {
                input1 = total.replaceAll(',', '');
            }
            //
            var format = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(input1);
            var formatted = format.replace(/[$]/g, '');
            $("#total").val(formatted);

            // NO2
            var sale = $('#saletax_value').val();
            if (sale == '') {
                input2 = 0;
            } else {
                input2 = sale.replaceAll(',', '');
            }
            var format2 = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(input2);
            var formatted2 = format2.replace(/[$]/g, '');
            $("#saletax_value").val(formatted2);

            var calc = parseFloat(input1) * parseFloat(input2) / 100;
            var add = $('#addtax_amount').val();
            if (add == '') {
                add = 0;
            } else {
                add = add.replaceAll(',', '');
            }
            var format3 = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(calc);
            var formatted3 = format3.replace(/[$]/g, '');
            $("#saletax_amount").val(formatted3);



            // NO 3
            var calc2 = parseFloat(input1) + parseFloat(calc) + parseFloat(add);
            // console.log(calc2);
            // $('#net_amount').val(calc2);
            // NO 4
            var format4 = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(calc2);
            var formatted4 = format4.replace(/[$]/g, '');
            $("#net_amount").val(formatted4);


        })
        // ADD TAX CALC
        $("#order_form").on('change', '#addtax_value', function() {
            var total = $('#total').html();
            if (total == '') {
                input3 = 0;
            } else {
                input3 = total.replaceAll(',', '');
            }
            // NO 5
            var format5 = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(input3);
            var formatted5 = format5.replace(/[$]/g, '');
            $("#total").val(formatted5);
            //
            var add = $('#addtax_value').val();
            if (add == '') {
                input4 = 0;
            } else {
                input4 = add.replaceAll(',', '');
            }
            // NO 6
            var format6 = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(input4);
            var formatted6 = format6.replace(/[$]/g, '');
            $("#addtax_value").val(formatted6);
            //
            var calc = parseFloat(input3) * parseFloat(input4) / 100;
            var sale = $('#saletax_amount').val();
            if (sale == '') {
                sale = 0;
            } else {
                sale = sale.replaceAll(',', '');
            }
            // NO 7
            var format7 = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(calc);
            var formatted7 = format7.replace(/[$]/g, '');
            $("#addtax_amount").val(formatted7);
            //
            var calc2 = parseFloat(input3) + parseFloat(calc) + parseFloat(sale);
            var format8 = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(calc2);
            var formatted8 = format8.replace(/[$]/g, '');
            $("#net_amount").val(formatted8);

        })
    });
    //


    $('#voucher_date').on('keyup', function(e) {
        if (e.which == 9) {
            $('#company_ref').focus();
        }
    });

    $('#view_party').click(function() {
        var party_code = $('#party').val();
        if (party_code != '') {
            // document no dropdown
            $.ajax({
                url: 'api/sales_module/transaction_files/sales_order_api.php',
                type: 'POST',
                data: {
                    action: 'party_detail',
                    party_code: party_code
                },
                dataType: "json",
                success: function(data) {
                    // console.log(data);
                    $('#name').html(data.party_name);
                    $('#address').html(data.address);
                    $('#phone').html(data.phone_nos);
                    $('#gst').html(data.gst);
                    $('#ntn').html(data.ntn);
                    $('#division_p').html(data.division_name);
                    $('#city_p').html(data.city_name);
                },
                error: function(error) {
                    // console.log(error);
                    alert("Contact IT Department");
                }
            });
            $('#ViewPartyModal').modal('show');
        }
    });
    $('#view_item').click(function() {
        var item_code = $('#acc_desc').val();
        if (item_code != '') {
            // document no dropdown
            $.ajax({
                url: 'api/Inventory_management/inventory_locals/po_local_api.php',
                type: 'POST',
                data: {
                    action: 'item_detail',
                    item_code: item_code
                },
                dataType: "json",
                success: function(data) {
                    // console.log(data);
                    $('#division_i').html(data.division_name);
                    $('#gen_i').html(data.gen_name);
                    $('#um_i').html(data.unit_name);
                    $('#tp_rate').html(data.trade_price);
                    $('#tp_rate2').html(data.tp_rate2);
                    $('#gst_per').html(data.tax_rate);
                    $('#add_per').html(data.add_rate);
                },
                error: function(error) {
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
            $('#ViewItemModal').modal('show');
        }
    });
    //select company code
    $('#order_form').on('focus', '#party', function() {
        var company_code = $('#company_code').val();
        if (company_code != '') {
            $('#party_table').dataTable().fnDestroy();
            table = $('#party_table').DataTable({
                dom: 'Bfrtip',
                orderCellsTop: true,
                fixedHeader: true,

                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print',
                ]
            });
            // Setup - add a text input to each footer cell
            // $('#party_table thead tr').clone(true).appendTo( '#party_table thead' );
            $('#party_table thead tr:eq(1) th').each(function(i) {
                var title = $(this).text();
                $(this).html('<input type="text" class="form-control" placeholder="Search ' + title +
                    '" />');
                $('input', this).on('keyup change', function() {
                    if (table.column(i).search() !== this.value) {
                        table
                            .column(i)
                            .search(this.value)
                            .draw();
                    }
                });
            });
            // party code dropdown
            $.ajax({
                url: 'api/Inventory_management/inventory_locals/po_local_api.php',
                type: 'POST',
                data: {
                    action: 'supp_code',
                    company_code: company_code
                },
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    table.clear().draw();
                    // append data in datatable
                    var sno = '0';
                    for (var i = 0; i < response.length; i++) {
                        sno++;
                        table.row.add([sno, response[i].PARTY_NAME, response[i].ADDRESS, response[i]
                            .SUPP_DIV, response[i].CRDAYS
                        ]);

                    }
                    table.draw();
                },
                error: function(error) {
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
            $('#PartyFormModel').modal('show');

        }
    });
    //get value of company in fields
    $('#party_table').on('click', '.even', function() {
        var party_name = $(this).closest('tr').children('td:nth-child(2)').text();
        var party_code = $(this).closest('tr').children('td:nth-child(4)').text();
        if (party_code != '') {
            $('#party').val(party_code);
            $('#name_p').val(party_name);
        }
        $('#PartyFormModel').modal('hide');
        $('#cr_days').focus();
    });
    $('#party_table').on('click', '.odd', function() {
        var party_name = $(this).closest('tr').children('td:nth-child(2)').text();
        var party_code = $(this).closest('tr').children('td:nth-child(4)').text();
        if (party_code != '') {
            $('#party').val(party_code);
            $('#name_p').val(party_name);
        }
        $('#PartyFormModel').modal('hide');
        $('#cr_days').focus();
    });
    //select company code
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
        // Setup - add a text input to each footer cell
        // $('#company_table thead tr').clone(true).appendTo( '#company_table thead' );
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

        // company code dropdown
        $.ajax({
            url: 'api/setup/chart_of_account/control_account_api.php',
            type: 'POST',
            data: {
                action: 'company_code'
            },
            dataType: "json",
            success: function(response) {
                // console.log(response);
                table.clear().draw();
                // append data in datatable
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
        // $('#CompanyFormModel').modal('show');
    });
    //select company code
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
        // Setup - add a text input to each footer cell
        // $('#salesman_table thead tr').clone(true).appendTo( '#salesman_table thead' );
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


        // salesman code dropdown
        $.ajax({
            url: 'api/setup/party_api.php',
            type: 'POST',
            data: {
                action: 'salesman_code'
            },
            dataType: "json",
            success: function(response) {
                // console.log(response);
                table.clear().draw();
                // append data in datatable
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
        // // saletax code dropdown
        var company_code = $('#company_code').val();
        $.ajax({
            url: 'api/Inventory_management/inventory_locals/po_local_api.php',
            type: 'POST',
            data: {
                action: 'sale_tax',
                company_code: company_code
            },
            dataType: "json",
            success: function(response) {
                $('#saletax_code').html('');
                $('#saletax_code').append(
                    '<option value="" selected disabled>Select Account</option>');
                $.each(response, function(key, value) {
                    $('#saletax_code').append('<option data-name="' + value["DESCR"] + '"  data-code=' + value["ACCOUNT_CODE"] + ' value=' + value["ACCOUNT_CODE"] + '>' + value["ACCOUNT_CODE"] + ' - ' + value["DESCR"] + '</option>');
                });
            },
            error: function(error) {
                console.log(error);
                alert("Contact IT Department");
            }
        });
        $('#order_form').on('change', '#saletax_code', function() {
            var saletax_code = $('#saletax_code').find(':selected').val();
            var saletax_name = $('#saletax_code').find(':selected').attr("data-name");
            $('#select2-saletax_code-container').html(saletax_code);
            $('#saletax_name').val(saletax_name);
        });
        // Addtax dropdowm
        $.ajax({
            url: 'api/Inventory_management/inventory_locals/po_local_api.php',
            type: 'POST',
            data: {
                action: 'add_tax',
                company_code: company_code
            },
            dataType: "json",
            success: function(response) {
                $('#addtax_code').html('');
                $('#addtax_code').append(
                    '<option value="" selected disabled>Select Account</option>');
                $.each(response, function(key, value) {
                    $('#addtax_code').append('<option data-name="' + value["DESCR"] + '"  data-code=' + value["ACCOUNT_CODE"] + ' value=' + value["ACCOUNT_CODE"] + '>' + value["ACCOUNT_CODE"] + ' - ' + value["DESCR"] + '</option>');
                });
            },
            error: function(error) {
                console.log(error);
                alert("Contact IT Department");
            }
        });

        $('#order_form').on('change', '#addtax_code', function() {
            var addtax_code = $('#addtax_code').find(':selected').val();
            var addtax_name = $('#addtax_code').find(':selected').attr("data-name");
            $('#select2-addtax_code-container').html(addtax_code);
            $('#addtax_name').val(addtax_name);
        });

        //get value of company in fields
        $('#company_table').on('click', '.even', function() {
            var company_name = $(this).closest('tr').children('td:nth-child(2)').text();
            var company_code = $(this).closest('tr').children('td:nth-child(3)').text();
            // console.log(company_code);
            $('#company_code').val(company_code);
            $('#company_name').val(company_name);
            $("#ajax-loader").show();
            var rowCount = $("#example1 tr").length;
            if (rowCount == 3) {
                $('#acc_desc').val('');
                $('#detail').val('');
                //   $('#type').val('');
                $('#memo').val('');
                $('#amount').val('');
                $('#total').val('');
                $('#debit').val('');
                $('#quantity').val('');
                $('#rate').val('');
                $('#type').val('');
                $('#quantity').val('');
                $('#rate').val('');
                $('#amount').val('');
                $('#division_i').val('');
                $('#gen_i').val('');
                $('#um_i').val('');
                $('#net_amount').val('');
                $("#company_ref").focus();
                // $('#view_item').fadeIn("slow");
            } else {
                for (var a = 2; a < rowCount - 1; a++) {
                    var d = a - 1;
                    $('#tr' + d + '').remove();
                    $('#total').text('0');
                }
            }
            // ACCOUNT code dropdown
            $.ajax({
                url: 'api/sales_module/transaction_files/sales_order_api.php',
                type: 'POST',
                data: {
                    action: 'item_code',
                    company_code: company_code
                },
                dataType: "json",
                success: function(response) {
                    $("#ajax-loader").hide();
                    // console.log(response);
                    $('#acc_desc').html('');
                    $('#acc_desc').append(
                        '<option value="" selected disabled>Select Item</option>');
                    $.each(response, function(key, value) {
                        $('#acc_desc').append('<option data-name="' + value[
                                "item_descr"] + '"  data-code=' + value[
                                "item_div"] + ' value=' + value["item_div"] + '>' +
                            value["item_div"] + ' - ' + value["item_descr"] +
                            '</option>');
                    });
                },
                error: function(error) {
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
            $('#CompanyFormModel').modal('hide');
            $('#item_table').dataTable().fnDestroy();
            table = $('#item_table').DataTable({
                dom: 'Bfrtip',
                orderCellsTop: true,
                fixedHeader: true,

                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print',
                ]
            });
            // Setup - add a text input to each footer cell
            // $('#item_table thead tr').clone(true).appendTo( '#item_table thead' );
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


            // salesman code dropdown
            $.ajax({
                url: 'api/Inventory_management/inventory_locals/po_local_api.php',
                type: 'POST',
                data: {
                    action: 'item_detail',
                    company_code: company_code
                },
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    table.clear().draw();
                    // append data in datatable
                    var sno = '0';
                    for (var i = 0; i < response.length; i++) {
                        sno++;
                        table.row.add([response[i].item_descr, response[i].pur_mode, response[i].div_name, response[i].gen_name, response[i].item_div, response[i].co_code, response[i].div_code, response[i].unit_name]);
                    }
                    table.draw();
                },
                error: function(error) {
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
            // $('#CompanyFormModel').modal('show');
        });

        $('#company_table').on('click', '.odd', function() {
            var company_name = $(this).closest('tr').children('td:nth-child(2)').text();
            var company_code = $(this).closest('tr').children('td:nth-child(3)').text();
            // console.log(company_code);
            $('#company_code').val(company_code);
            $('#company_name').val(company_name);
            $("#ajax-loader").show();
            var rowCount = $("#example1 tr").length;
            if (rowCount == 3) {
                $('#acc_desc').val('');
                $('#detail').val('');
                //   $('#type').val('');
                $('#memo').val('');
                $('#amount').val('');
                $('#total').val('');
                $('#debit').val('');
                $('#quantity').val('');
                $('#rate').val('');
                $('#type').val('');
                $('#quantity').val('');
                $('#rate').val('');
                $('#amount').val('');
                $('#division_i').val('');
                $('#gen_i').val('');
                $('#um_i').val('');
                $('#net_amount').val('');
                $("#company_ref").focus();
                // $('#view_item').fadeIn("slow");
            } else {
                for (var a = 2; a < rowCount - 1; a++) {
                    var d = a - 1;
                    $('#tr' + d + '').remove();
                    $('#total').text('0');
                }
            }
            // ACCOUNT code dropdown
            $.ajax({
                url: 'api/sales_module/transaction_files/sales_order_api.php',
                type: 'POST',
                data: {
                    action: 'item_code',
                    company_code: company_code
                },
                dataType: "json",
                success: function(response) {
                    $("#ajax-loader").hide();
                    // console.log(response);
                    $('#acc_desc').html('');
                    $('#acc_desc').append(
                        '<option value="" selected disabled>Select Item</option>');
                    $.each(response, function(key, value) {
                        $('#acc_desc').append('<option data-name="' + value[
                                "item_descr"] + '"  data-code=' + value[
                                "item_div"] + ' value=' + value["item_div"] + '>' +
                            value["item_div"] + ' - ' + value["item_descr"] +
                            '</option>');
                    });
                },
                error: function(error) {
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
            $('#CompanyFormModel').modal('hide');
            $('#item_table').dataTable().fnDestroy();
            table = $('#item_table').DataTable({
                dom: 'Bfrtip',
                orderCellsTop: true,
                fixedHeader: true,

                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print',
                ]
            });
            // Setup - add a text input to each footer cell
            // $('#item_table thead tr').clone(true).appendTo( '#item_table thead' );
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


            // salesman code dropdown
            $.ajax({
                url: 'api/Inventory_management/inventory_locals/po_local_api.php',
                type: 'POST',
                data: {
                    action: 'item_detail',
                    company_code: company_code
                },
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    table.clear().draw();
                    // append data in datatable
                    var sno = '0';
                    for (var i = 0; i < response.length; i++) {
                        sno++;
                        table.row.add([response[i].item_descr, response[i].pur_mode, response[i].div_name, response[i].gen_name, response[i].item_div, response[i].co_code, response[i].div_code, response[i].unit_name]);
                    }
                    table.draw();
                },
                error: function(error) {
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
        });
        //get value of company in fields
        $('#salesman_table').on('click', '.even', function() {
            var salesman_name = $(this).closest('tr').children('td:nth-child(2)').text();
            var salesman_code = $(this).closest('tr').children('td:nth-child(3)').text();
            // console.log(salesman_code);
            $('#salesman').val(salesman_code);
            $('#salesman_name').val(salesman_name);
            $('#SalesmanFormModel').modal('hide');
            // $('#salesmanFormModel').modal('show');
        });
        $('#salesman_table').on('click', '.odd', function() {
            var salesman_name = $(this).closest('tr').children('td:nth-child(2)').text();
            var salesman_code = $(this).closest('tr').children('td:nth-child(3)').text();
            // console.log(salesman_code);
            $('#salesman').val(salesman_code);
            $('#salesman_name').val(salesman_name);
            $('#SalesmanFormModel').modal('hide');
            // $('#salesmanFormModel').modal('show');
        });
        //select division code
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
                // Setup - add a text input to each footer cell
                // $('#division_table thead tr').clone(true).appendTo( '#division_table thead' );
                $('#division_table thead tr:eq(1) th').each(function(i) {
                    var title = $(this).text();
                    $(this).html('<input type="text" class="form-control" placeholder="Search ' +
                        title + '" />');
                    $('input', this).on('keyup change', function() {
                        if (table.column(i).search() !== this.value) {
                            table
                                .column(i)
                                .search(this.value)
                                .draw();
                        }
                    });
                });
                // division code dropdown
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
                        // append data in datatable
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

        $('#order_form').on('focus', '.acc_desc', function() {
            var button_id = $(this).attr("id");
            var button_id = button_id.split("sc");
            var id = button_id[1];
            sessionStorage.setItem("row_id", id);
            //////////////////

            $('#ItemCodeModel').modal('show');
        });

        //get value of division in fields
        $('#item_table').on('click', '.odd', function() {
            var item_name = $(this).closest('tr').children('td:nth-child(1)').text();
            var div_name = $(this).closest('tr').children('td:nth-child(3)').text();
            var item_code = $(this).closest('tr').children('td:nth-child(5)').text();
            var gen_name = $(this).closest('tr').children('td:nth-child(4)').text();
            var um_name = $(this).closest('tr').children('td:nth-child(8)').text();
            var id = sessionStorage.getItem("row_id");

            $('#detail' + id).val(item_name);
            $('#acc_desc' + id).val(item_code);
            $('#division_i' + id).val(div_name);
            $('#gen_i' + id).val(gen_name);
            $('#um_i' + id).val(um_name);
            $('#hidden_division_i' + id).val(div_name);
            $('#hidden_gen_i' + id).val(gen_name);
            $('#hidden_um_i' + id).val(um_name);

            // // product code dropdown
            $.ajax({
                url: 'api/Inventory_management/inventory_locals/po_local_api.php',
                type: 'POST',
                data: {
                    action: 'product_detail'
                },
                dataType: "json",
                success: function(response) {
                    $('#acc_descr' + id).html('');
                    $('#acc_descr' + id).append(
                        '<option value="" selected disabled>Select Account</option>');
                    $.each(response, function(key, value) {
                        $('#acc_descr' + id).append('<option data-name="' + value["product_name"] + '"  data-code=' + value["product_code"] + ' value=' + value["product_code"] + '>' + value["product_code"] + ' - ' + value["product_name"] + '</option>');
                    });
                },
                error: function(error) {
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
            $('#ItemCodeModel').modal('hide');
            $('#acc_descr' + id).focus();
        });
        setTimeout(function() {
            $('#order_form').on('change', '.acc_descr', function() {
                var button_id = $(this).attr("id");
                var button_id = button_id.split("cr");
                var id = button_id[1];
                var product_code = $('#acc_descr' + id).find(':selected').val();
                var product_name = $('#acc_descr' + id).find(':selected').attr("data-name");
                $('#select2-acc_descr' + id + '-container').html(product_code);
                $('#product_name').val(product_name);
                $('#hidden_product_name' + id).val(product_name);
            });
        }, 1000);
        // // saletax code dropdown
        var company_code = $('#company_code').val();
        $.ajax({
            url: 'api/Inventory_management/inventory_locals/po_local_api.php',
            type: 'POST',
            data: {
                action: 'sale_tax',
                company_code: company_code
            },
            dataType: "json",
            success: function(response) {
                $('#saletax_code').html('');
                $('#saletax_code').append(
                    '<option value="" selected disabled>Select Account</option>');
                $.each(response, function(key, value) {
                    $('#saletax_code').append('<option data-name="' + value["DESCR"] + '"  data-code=' + value["ACCOUNT_CODE"] + ' value=' + value["ACCOUNT_CODE"] + '>' + value["ACCOUNT_CODE"] + ' - ' + value["DESCR"] + '</option>');
                });
            },
            error: function(error) {
                console.log(error);
                alert("Contact IT Department");
            }
        });
        $('#order_form').on('change', '#saletax_code', function() {
            var saletax_code = $('#saletax_code').find(':selected').val();
            var saletax_name = $('#saletax_code').find(':selected').attr("data-name");
            $('#select2-saletax_code-container').html(saletax_code);
            $('#saletax_name').val(saletax_name);
        });
        // Addtax dropdowm
        $.ajax({
            url: 'api/Inventory_management/inventory_locals/po_local_api.php',
            type: 'POST',
            data: {
                action: 'add_tax',
                company_code: company_code
            },
            dataType: "json",
            success: function(response) {
                $('#addtax_code').html('');
                $('#addtax_code').append(
                    '<option value="" selected disabled>Select Account</option>');
                $.each(response, function(key, value) {
                    $('#addtax_code').append('<option data-name="' + value["DESCR"] + '"  data-code=' + value["ACCOUNT_CODE"] + ' value=' + value["ACCOUNT_CODE"] + '>' + value["ACCOUNT_CODE"] + ' - ' + value["DESCR"] + '</option>');
                });
            },
            error: function(error) {
                console.log(error);
                alert("Contact IT Department");
            }
        });
    });

    $('#order_form').on('change', '#addtax_code', function() {
        var addtax_code = $('#addtax_code').find(':selected').val();
        var addtax_name = $('#addtax_code').find(':selected').attr("data-name");
        $('#select2-addtax_code-container').html(addtax_code);
        $('#addtax_name').val(addtax_name);
    });
    //get value of division in fields
    $('#item_table').on('click', '.even', function() {
        var item_name = $(this).closest('tr').children('td:nth-child(1)').text();
        var item_code = $(this).closest('tr').children('td:nth-child(5)').text();
        var gen_name = $(this).closest('tr').children('td:nth-child(4)').text();
        var id = sessionStorage.getItem("row_id");
        $('#detail' + id).val(item_name);
        $('#acc_desc' + id).val(item_code);
        //   $("#ajax-loader").hide();  
        // // product code dropdown
        $.ajax({
            url: 'api/Inventory_management/inventory_locals/po_local_api.php',
            type: 'POST',
            data: {
                action: 'product_detail'
            },
            dataType: "json",
            success: function(response) {
                $('#acc_descr' + id).html('');
                $('#acc_descr' + id).append(
                    '<option value="" selected disabled>Select Account</option>');
                $.each(response, function(key, value) {
                    $('#acc_descr' + id).append('<option data-name="' + value["product_name"] + '"  data-code=' + value["product_code"] + ' value=' + value["product_code"] + '>' + value["product_code"] + ' - ' + value["product_name"] + '</option>');
                });
            },
            error: function(error) {
                console.log(error);
                alert("Contact IT Department");
            }
        });
        $('#ItemCodeModel').modal('hide');
        $('#acc_descr' + id).focus();
    });
    setTimeout(function() {
        $('#order_form').on('change', '.acc_descr', function() {
            var button_id = $(this).attr("id");
            var button_id = button_id.split("cr");
            var id = button_id[1];
            var product_code = $('#acc_descr' + id).find(':selected').val();
            var product_name = $('#acc_descr' + id).find(':selected').attr("data-name");
            $('#select2-acc_descr' + id + '-container').html(product_code);
            $('#product_name').val(product_name);
            $('#hidden_product_name' + id).val(product_name);
        });
    }, 1000);
    $('#ItemCodeModel').modal('hide');
    $('#purchase_mode').change(function() {
        var company_code = $("#company_code").val();
        var division_code = $("#division").val();
        var purchase_mode = $("#purchase_mode").val();
        if (division_code != '' && company_code != '') {
            // document no dropdown
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
                    // console.log(data);
                    doc_no = data.doc_no;
                    $('#doc_no').val(doc_no);
                    var doc_no = $('#doc_no').val();
                    if (doc_no != '' && division_code != '' && company_code != '' &&
                        purchase_mode != '') {
                        var sale_code = company_code + '-' + division_code + '-' +
                            purchase_mode + '-' + doc_no;
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
    // on chAnge account code
    $("#order_form").on('change', '#acc_descr', function() {

    });

    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
    //validation
    $(function() {
        $.validator.setDefaults({
            submitHandler: function() {
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
                // doc_no: {
                //     required: true,
                // },
                sale_code: {
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
        console.log(year);
        $('#year').val(year);
    });

    $('#example1').ready(function() {
        var company_code = $('#company_code').val();
    });
    $('#example1').ready(function() {


        $('.add').click(function() {
            var rowCounts = $("#example1 tr").length;
            console.log(rowCounts);
            var i = rowCounts - 2;
            // console.log(i);
            var total_amount = 0;
            var company_code = $('#company_code').val();
            var acc_desc = $('#acc_desc').val();
            var detail = $("#detail").val();
            var product = $("#acc_descr").val();
            console.log(product);
            var item_detail = $("#item_detail").val();
            var type = $("#type").val();
            var quantity = $("#quantity").val();
            var rates = $("#rate").val();
            rate = rates.replaceAll(',', '');
            var amounts = $("#amount").val();
            amount = amounts.replaceAll(',', '');
            var division_i = $("#hidden_division_i").val();
            var gen_i = $("#hidden_gen_i").val();
            var um_i = $("#hidden_um_i").val();
            var h_product_name = $('#hidden_product_name').val();
            if (acc_desc == null) {
                $('#msg').text("Account can't be the null.");
            } else if (quantity == "") {
                $('#msg').text("Quantity can't be the null.");
            } else if (rate == "") {
                $('#msg').text("Rate can't be the null.");
            } else if (amount <= 0) {
                $('#msg').text("Amount can't be the null.");
            } else {
                // i++;
                $('#msg').text("");
                // values empty
                $("#amount").val('0');
                $('#acc_desc').val('');
                $("#detail").val('');
                $("#acc_descr").val('');
                $("#product_name").val('');
                $("#item_detail").val('');
                $("#quantity").val('');
                $("#division_i").val('');
                $("#gen_i").val('');
                $("#um_i").val('');
                $("#hidden_division_i").val('');
                $("#hidden_gen_i").val('');
                $("#hidden_um_i").val('');
                $('#hidden_product_name').val('');
                $("#rate").val('');
                $('#d_items tr:last').before('<tr id="tr' + i + '" class="tr"><td style="width:8%"><input style="width:83px;height:35px;background-color:#b7edea" name="acc_desc[]" id="acc_desc' +
                    i + '"class="form-control acc_desc" type="text" readonly></td><td style="width: 13%;"><textarea style="height:35px;background-color:#ccd4e1" name="deatil[]" id = "detail' +
                    i + '"class="form-control detail" readonly tabindex="-1"></textarea></td><td><select name="acc_descr[]" id = "acc_descr' +
                    i + '"class="form-control js-example-basic-single acc_descr"></select></td><td ><textarea style="width:100%;height:35px;font-size:12px"  type="text"  name="item_detail[]" id ="item_detail' +
                    i + '" class=""></textarea></td><td style="width: 8%;"><input style="text-align:right; padding:0 2px 0 0;width:83px;height:35px" type="text"  name="quantity[]" id="quantity' +
                    i + '" class="quantity"></td><td style="width: 10%;"><input  style="text-align:right; padding:0 2px 0 0;width:100px;height:35px"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="rate[]" id = "rate' +
                    i + '" class="rate"></td><td style="width: 10%;"><input  style="text-align:right; padding:0 2px 0 0;width:100px;height:35px;background-color:#ccd4e1"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text" tabindex="-1"  name="amount[]" id = "amount' +
                    i + '" class="amount" readonly></td><td style="display:none;"><textarea style="width:100%;height:35px;background-color:#ccd4e1;font-size:14px" type="text" name="" id="hidden_division_i' +
                    i + '" class="division_i" readonly></textarea></td><td style="display:none;"><textarea style="width:100%;height:35px;background-color:#ccd4e1;font-size:14px" tabindex="-1" type="text" name="" id="hidden_gen_i' +
                    i + '" class="gen_i" readonly></textarea></td><td style="display:none;"><textarea style="width:100%;height:35px;background-color:#ccd4e1;font-size:14px" tabindex="-1" type="text" name="" id="hidden_um_i' +
                    i + '" class="" readonly></textarea></td><td style="display:none;"><textarea style="width:100%;height:35px;background-color:#ccd4e1;font-size:14px" type="text" name="product_name" id="hidden_product_name' +
                    i + '" class="" readonly></textarea></td><td><button type = "button" id="' +
                    i + '" class="btn btn-sm btn-danger remove"><b>X<b></button></td></tr>');
                // ACCOUNT code dropdown
                $.ajax({
                    url: 'api/Inventory_management/inventory_locals/po_local_api.php',
                    type: 'POST',
                    data: {
                        action: 'product_detail',
                    },
                    dataType: "json",
                    success: function(response) {
                        $('#acc_descr' + i).html('');
                        $('#acc_descr' + i).addClass('js-example-basic-single');
                        $('.js-example-basic-single').select2();
                        $('#acc_descr' + i).append('<option value="" selected disabled>Select Account</option>');
                        // var j=1;
                        $.each(response, function(key, value) {
                            $('#acc_descr' + i).append('<option data-name="' + value[
                                "product_name"] + '"  data-code=' + value["product_code"] + ' value=' + value["product_code"] + '>' + value["product_code"] + ' - ' + value["product_name"] + '</option>');
                            // if (value["product_code"] == acc_descr) {
                            //     acc_descr = value["product_code"];
                            //     $('#acc_descr' + i + ' option[value=' + acc_descr + ']')
                            //         .prop("selected", true);
                            // }
                            // $('#acc_desc').append('<option data-name='+value["DESCR"]+'  data-code='+value["ACCOUNT_CODE"]+' value='+value["ACCOUNT_CODE"]+'>'+value["ACCOUNT_CODE"]+' - '+value["DESCR"]+'</option>');

                        });
                        $('#acc_descr' + i + '').val(product);

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
                        var product_code = $('#acc_descr' + j).find(':selected').val();
                        var product_name = $('#acc_descr' + j).find(':selected').attr("data-name");
                        $('#select2-acc_descr' + j + '-container').html(product_code);
                        $('#product_name').val(product_name);
                    }
                    $('#product_name').val('');
                }, 1000);

                // console.log(type);
                $('#acc_desc' + i + '').val(acc_desc);
                $('#detail' + i + '').val(detail);
                $('#item_detail' + i + '').val(item_detail);
                $('#quantity' + i + '').val(quantity);
                $('#rate' + i + '').val(rates);
                $('#amount' + i + '').val(amounts);
                $('#hidden_division_i' + i + '').val(division_i);
                $('#hidden_gen_i' + i + '').val(gen_i);
                $('#hidden_um_i' + i + '').val(um_i);
                $('#hidden_product_name' + i + '').val(h_product_name);
                //   $('#disc'+i+'').css('text-align','right');
                //   $('#disc'+i+'').css('padding','0 1px 0 0');
                //   $('#frt'+i+'').css('text-align','right');
                //   $('#frt'+i+'').css('padding','0 1px 0 0');
                //   $('#excl'+i+'').css('text-align','right');
                //   $('#excl'+i+'').css('padding','0 1px 0 0');
                $('#quantity' + i + '').css('text-align', 'right');
                $('#quantity' + i + '').css('padding', '0 1px 0 0');
                $('#rate' + i + '').css('text-align', 'right ');
                $('#rate' + i + '').css('padding', '0 1px 0 0');
                $('#amount' + i + '').css('text-align', 'right ');
                $('#amount' + i + '').css('padding', '0 1px 0 0');

            }
        });
        $('#example1').on('click', '.tr', function() {
            // alert();
            var button_id = $(this).attr("id");
            if (button_id == 'main_tr') {
                var item_code = $('#acc_desc').val();
                // console.log(item_code);
                if (item_code == '') {
                    $('#division_i').val('');
                    $('#gen_i').val('');
                    $('#um_i').val('');
                    $('#product_name').val('');
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
                            // console.log(response);
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
                var div_i = $('#hidden_division_i' + id + '').val();
                var gen_i = $('#hidden_gen_i' + id + '').val();
                var um_i = $('#hidden_um_i' + id + '').val();
                var h_product_name = $('#hidden_product_name' + id + '').val();
                $('#division_i').val(div_i);
                $('#gen_i').val(gen_i);
                $('#um_i').val(um_i);
                $('#product_name').val(h_product_name);
            }

        });
        $('#example1').on('click', '.remove', function() {
            var button_id = $(this).attr("id");
            var remove_amount = $('#amount' + button_id + '').val();
            var quan = $('#quantity' + button_id + '').val();
            remove_amount = remove_amount.replaceAll(',', '');
            // disc_rm = disc_rm.replaceAll(',', '');
            // frt_rm = frt_rm.replaceAll(',', '');
            // excl_rm = excl_rm.replaceAll(',', '');
            $('#tr' + button_id + '').remove();
            //   $('#um').val('');
            var current_amount = $('#total').text();
            var total_q = $('#total_q').text();
            var total_q_c = total_q.replaceAll(',', '');
            current_amount = current_amount.replaceAll(',', '');
            // current_disc = current_disc.replaceAll(',', '');
            // current_frt = current_frt.replaceAll(',', '');
            // current_excl = current_excl.replaceAll(',', '');
            //total amount
            var total_amount = parseFloat(current_amount) - parseFloat(remove_amount);
            if (isNaN(total_amount)) {
                total_amount = '0';
            } else {
                //
                var total_amount = new Intl.NumberFormat(
                    'en-US', {
                        style: 'currency',
                        currency: 'USD',
                        currencyDisplay: 'narrowSymbol'
                    }).format(total_amount);
                var formatted = total_amount.replace(/[$]/g, '');
                //
            }
            $('#total').text(formatted);

            //total_disc

            // console.log(total_q, quan);

            var total_e = parseFloat(total_q_c) - parseFloat(quan);
            console.log(total_e);
            if (isNaN(total_e)) {
                formatted2 = '0';
            } else {
                //
                var total_e = new Intl.NumberFormat(
                    'en-US', {
                        style: 'currency',
                        currency: 'USD',
                        currencyDisplay: 'narrowSymbol'
                    }).format(total_e);
                var formatted2 = total_e.replace(/[$]/g, '');
                //
            }
            $('#total_q').text(formatted2);

            var net_amount = $('#net_amount').val();
            if (net_amount == '') {
                net_amount_r = 0;
            } else {
                net_amount_r = net_amount.replaceAll(',', '');
            }
            var format_n = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(net_amount_r);
            var formatted_n = format_n.replace(/[$]/g, '');
            $("#net_amount").val(formatted_n);
            var calc = parseFloat(net_amount_r) - parseFloat(remove_amount);
            var format_r = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(calc);
            var formatted_r = format_r.replace(/[$]/g, '');
            $("#net_amount").val(formatted_r);
            ///////////////////////////////////////////////////
            var total = $('#total').html();
            if (total == '') {
                input1 = 0;
            } else {
                input1 = total.replaceAll(',', '');
            }
            //
            var format = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(input1);
            var formatted = format.replace(/[$]/g, '');
            $("#total").val(formatted);

            // NO2
            var sale = $('#saletax_value').val();
            if (sale == '') {
                input2 = 0;
            } else {
                input2 = sale.replaceAll(',', '');
            }
            var format2 = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(input2);
            var formatted2 = format2.replace(/[$]/g, '');
            $("#saletax_value").val(formatted2);

            var calc = parseFloat(input1) * parseFloat(input2) / 100;
            var add = $('#addtax_amount').val();
            if (add == '') {
                add = 0;
            } else {
                add = add.replaceAll(',', '');
            }
            var format3 = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(calc);
            var formatted3 = format3.replace(/[$]/g, '');
            $("#saletax_amount").val(formatted3);



            // NO 3
            var calc2 = parseFloat(input1) + parseFloat(calc) + parseFloat(add);
            // console.log(calc2);
            // $('#net_amount').val(calc2);
            // NO 4
            var format4 = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(calc2);
            var formatted4 = format4.replace(/[$]/g, '');
            $("#net_amount").val(formatted4);

            var total = $('#total').html();
            if (total == '') {
                input3 = 0;
            } else {
                input3 = total.replaceAll(',', '');
            }
            // NO 5
            var format5 = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(input3);
            var formatted5 = format5.replace(/[$]/g, '');
            $("#total").val(formatted5);
            //
            var add = $('#addtax_value').val();
            if (add == '') {
                input4 = 0;
            } else {
                input4 = add.replaceAll(',', '');
            }
            // NO 6
            var format6 = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(input4);
            var formatted6 = format6.replace(/[$]/g, '');
            $("#addtax_value").val(formatted6);
            //
            var calc = parseFloat(input3) * parseFloat(input4) / 100;
            var sale = $('#saletax_amount').val();
            if (sale == '') {
                sale = 0;
            } else {
                sale = sale.replaceAll(',', '');
            }
            // NO 7
            var format7 = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(calc);
            var formatted7 = format7.replace(/[$]/g, '');
            $("#addtax_amount").val(formatted7);
            //
            var calc2 = parseFloat(input3) + parseFloat(calc) + parseFloat(sale);
            var format8 = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(calc2);
            var formatted8 = format8.replace(/[$]/g, '');
            $("#net_amount").val(formatted8);
            ///////////////////////////////////////////////////

        });
    });

    ////
    $(document).ready(function() {
        var co_code = <?php echo $_GET['co_code'] ?>;
        var doc_year = "<?php echo $_GET['doc_year'] ?>";
        var doc_no = <?php echo $_GET['doc_no'] ?>;
        var doc_type = "<?php echo $_GET['doc_type'] ?>";
        var order_key = "<?php echo $_GET['order_key'] ?>";
        $('#doc_no').val(doc_no);
        $('#company_code').val(co_code);
        $('#voucher_date').val(doc_year);
        $('#order_key').val(order_key);
        $('#doc_type').val(doc_type);

        $.ajax({
            url: 'api/Inventory_management/inventory_locals/po_local_api.php',
            type: "post",
            data: {
                action: 'edit',
                doc_no: doc_no,
                co_code: co_code,
                doc_year: doc_year,
                doc_type: doc_type,
                order_key: order_key
            },
            success: function(response) {
                console.log(response);
                $('#year').val(response.DOC_YEAR);
                var saletax_codes = response.STAX_CODE;
                var addtax_codes = response.ADDTAX_CODE;
                $('#voucher_date').val(response.DOC_DATE);
                $('#company_name').val(response.co_name);
                $('#company_ref').val(response.REFNUM2);
                $('#party_ref').val(response.PARTY_REF);
                $('#dlvry_date').val(response.DLVRY_DATE);
                $('#Y_N').val(response.PO_CLOSE);
                $('#v_no').val(response.REFNUM);
                $('#party').val(response.PARTY_CODE);
                $('#name_p').val(response.party_name);
                $('#cr_days').val(response.CRDAYS);
                $('#narration').val(response.REMARKS);
                $('#saletax_value').val(response.STAX_RATE);
                $('#addtax_value').val(response.ADDTAX_RATE);
                $('#saletax_amount').val(response.STAX_AMT);
                $('#addtax_amount').val(response.ADDTAX_AMT);

                $('#post').val(response.POST);

                var net_data = response.TOTAL_NET_AMT;

                var net_data = new Intl.NumberFormat(
                    'en-US', {
                        style: 'currency',
                        currency: 'USD',
                        currencyDisplay: 'narrowSymbol'
                    }).format(net_data);
                var net_data = net_data.replace(/[$]/g, '');
                $('#net_amount').val(net_data);

                //
                $('#item_table').dataTable().fnDestroy();
                table = $('#item_table').DataTable({
                    dom: 'Bfrtip',
                    orderCellsTop: true,
                    fixedHeader: true,

                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print',
                    ]
                });
                // Setup - add a text input to each footer cell
                // $('#item_table thead tr').clone(true).appendTo( '#item_table thead' );
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
                    url: 'api/Inventory_management/inventory_locals/po_local_api.php',
                    type: 'POST',
                    data: {
                        action: 'item_detail',
                        company_code: co_code
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        table.clear().draw();
                        // append data in datatable
                        var sno = '0';
                        for (var i = 0; i < response.length; i++) {
                            sno++;
                            table.row.add([response[i].item_descr, response[i].pur_mode, response[i].div_name, response[i].gen_name, response[i].item_div, response[i].co_code, response[i].div_code, response[i].unit_name]);
                        }
                        table.draw();
                    },
                    error: function(error) {
                        console.log(error);
                        alert("Contact IT Department");
                    }
                });
                //get value of company in fields
                $('#salesman_table').on('click', '.even', function() {
                    var salesman_name = $(this).closest('tr').children('td:nth-child(2)').text();
                    var salesman_code = $(this).closest('tr').children('td:nth-child(3)').text();
                    // console.log(salesman_code);
                    $('#salesman').val(salesman_code);
                    $('#salesman_name').val(salesman_name);
                    $('#SalesmanFormModel').modal('hide');
                    // $('#salesmanFormModel').modal('show');
                });
                $('#salesman_table').on('click', '.odd', function() {
                    var salesman_name = $(this).closest('tr').children('td:nth-child(2)').text();
                    var salesman_code = $(this).closest('tr').children('td:nth-child(3)').text();
                    // console.log(salesman_code);
                    $('#salesman').val(salesman_code);
                    $('#salesman_name').val(salesman_name);
                    $('#SalesmanFormModel').modal('hide');
                    // $('#salesmanFormModel').modal('show');
                });
                // // SALETAX TAX EDIT
                $.ajax({
                    url: 'api/Inventory_management/inventory_locals/po_local_api.php',
                    type: 'POST',
                    data: {
                        action: 'sale_tax',
                        company_code: co_code
                    },
                    dataType: "json",
                    success: function(response) {
                        $('#saletax_code').html('');
                        $('#saletax_code').append(
                            '<option value="" selected disabled>Select Account</option>');
                        $.each(response, function(key, value) {
                            $('#saletax_code').append('<option data-name="' + value["DESCR"] + '"  data-code=' + value["ACCOUNT_CODE"] + ' value=' + value["ACCOUNT_CODE"] + '>' + value["ACCOUNT_CODE"] + ' - ' + value["DESCR"] + '</option>');
                            // if(value["data-code"]== saletax_codes){
                            //     saletax_code = value["data-code"];
                            //     $('#saletax_code'+' option[value='+saletax_code+']').prop("selected", true);
                            // }
                        });
                        $('#saletax_code').val(saletax_codes);
                    },
                    error: function(error) {
                        console.log(error);
                        alert("Contact IT Department");
                    }
                });
                setTimeout(function() {
                    var stax = $('#saletax_code').val();
                    console.log(stax);
                    var rowCounts = $("#example1 tr").length;
                    row = rowCounts - 3;
                    // if(saletax_code != null){
                    for (var j = 1; j <= row; j++) {
                        var saletax_code = $('#saletax_code').find(':selected').val();
                        var saletax_name = $('#saletax_code').find(':selected').attr("data-name");
                        $('#select2-saletax_code-container').html(saletax_code);
                        $('#saletax_name').val(saletax_name);
                    }
                    // }
                }, 1000);

                //ADD TAX EDIT
                $.ajax({
                    url: 'api/Inventory_management/inventory_locals/po_local_api.php',
                    type: 'POST',
                    data: {
                        action: 'add_tax',
                        company_code: co_code
                    },
                    dataType: "json",
                    success: function(response) {
                        $('#addtax_code').html('');
                        $('#addtax_code').append(
                            '<option value="" selected disabled>Select Account</option>');
                        $.each(response, function(key, value) {
                            $('#addtax_code').append('<option data-name="' + value["DESCR"] + '"  data-code=' + value["ACCOUNT_CODE"] + ' value=' + value["ACCOUNT_CODE"] + '>' + value["ACCOUNT_CODE"] + ' - ' + value["DESCR"] + '</option>');
                        });
                        $('#addtax_code').val(addtax_codes);
                    },
                    error: function(error) {
                        console.log(error);
                        alert("Contact IT Department");
                    }
                });
                setTimeout(function() {
                    var addtax = $('#addtax_code').val();
                    var rowCounts = $("#example1 tr").length;
                    row = rowCounts - 3;
                    if (addtax != null) {
                        for (var j = 1; j <= row; j++) {
                            var addtax_code = $('#addtax_code').find(':selected').val();
                            var addtax_name = $('#addtax_code').find(':selected').attr("data-name");
                            $('#select2-addtax_code-container').html(addtax_code);
                            $('#addtax_name').val(addtax_name);
                        }
                    }
                }, 1000);

                //
                $.ajax({
                    url: 'api/Inventory_management/inventory_locals/po_local_api.php',
                    type: 'POST',
                    data: {
                        action: 'edit_table',
                        doc_no: doc_no,
                        co_code: co_code,
                        doc_year: doc_year,
                        doc_type: doc_type,
                        order_key: order_key
                    },
                    dataType: "json",
                    success: function(data) {
                        console.log(data.length);
                        var total_amount = 0;
                        var total_quantity = 0;
                        var j = 1;
                        var k = 0;
                        var l = 0;
                        var m = 0;
                        if (data.length >= 1) {
                            for (var i = 1; i <= data.length; i++) {
                                $('#d_items tr:last').before('<tr id="tr' + i + '" class="tr"><td style="width:8%"><input style="width:83px;height:35px;background-color:#b7edea" name="acc_desc[]" id="acc_desc' +
                                    i + '"class="form-control acc_desc" type="text" readonly></td><td style="width: 13%;"><textarea style="height:35px;background-color:#ccd4e1" name="deatil[]" id = "detail' +
                                    i + '"class="form-control detail" readonly tabindex="-1"></textarea></td><td><select name="acc_descr[]" id = "acc_descr' +
                                    i + '"class="form-control js-example-basic-single acc_descr"></select></td><td><textarea style="width:100%;height:35px;font-size:12px" type="text"  name="item_detail[]" id ="item_detail' +
                                    i + '" class=""></textarea></td><td style="width: 8%;"><input style="text-align:right; padding:0 2px 0 0;width:83px;height:35px" type="text"  name="quantity[]" id="quantity' +
                                    i + '" class="quantity"></td><td style="width: 10%;"><input  style="text-align:right; padding:0 2px 0 0;width:100px;height:35px"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="rate[]" id = "rate' +
                                    i + '" class="rate"></td><td style="width: 10%;"><input  style="text-align:right; padding:0 2px 0 0;width:100px;height:35px;background-color:#ccd4e1"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text" tabindex="-1"  name="amount[]" id = "amount' +
                                    i + '" class="amount" readonly></td><td style="display:none;"><textarea style="width:100%;height:35px;background-color:#ccd4e1;font-size:14px"  type="text" name="" id="hidden_division_i' +
                                    i + '" class="division_i" readonly></textarea></td><td style="display:none;"><textarea style="width:100%;height:35px;background-color:#ccd4e1;font-size:14px"  tabindex="-1" type="text" name="" id="hidden_gen_i' +
                                    i + '" class="gen_i" readonly></textarea></td><td style="display:none;"><textarea style="width:100%;height:35px;background-color:#ccd4e1;font-size:14px"  tabindex="-1" type="text" name="" id="hidden_um_i' +
                                    i + '" class="" readonly></textarea></td><td style="display:none;"><textarea style="width:100%;height:35px;background-color:#ccd4e1;font-size:14px"  type="text" name="product_name" id="hidden_product_name' +
                                    i + '" class="" readonly></textarea></td><td><button type = "button" id="' +
                                    i + '" class="btn btn-sm btn-danger remove"><b>X<b></button></td></tr>');
                                // $('#type').prop("selectedIndex", 0).val();
                                var product_codes = data[l].PRODUCT_CODE;
                                // ACCOUNT code dropdown
                                $.ajax({
                                    url: 'api/Inventory_management/inventory_locals/po_local_api.php',
                                    type: 'POST',
                                    data: {
                                        action: 'product_detail'
                                    },
                                    dataType: "json",
                                    async: false,
                                    success: function(response121) {
                                        // console.log(i);
                                        $('#acc_descr' + i).html('');
                                        $('#acc_descr' + i).addClass('js-example-basic-single');
                                        $('.js-example-basic-single').select2();
                                        $('#acc_descr' + i).append('<option value="" selected disabled>Select Account</option>');
                                        // var j=1;
                                        $.each(response121, function(key, value) {
                                            // console.log(l);
                                            // console.log(product_codes);
                                            $('#acc_descr' + i).append('<option data-name="' + value["product_name"] + '"  data-code=' + value["product_code"] + ' value=' + value["product_code"] + '>' + value["product_code"] + ' - ' + value["product_name"] + '</option>');
                                            if (value["product_code"] == product_codes) {
                                                acc_descr = value["product_code"];
                                                $('#acc_descr' + i + ' option[value=' + acc_descr + ']').prop("selected", true);
                                            }
                                            // $('#acc_descr').append('<option data-name='+value["DESCR"]+'  data-code='+value["ACCOUNT_CODE"]+' value='+value["ACCOUNT_CODE"]+'>'+value["ACCOUNT_CODE"]+' - '+value["DESCR"]+'</option>');

                                        });
                                        //   $('#acc_descr'+i+' option[value='+data[l].PRODUCT_CODE+']').prop("selected", true);
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
                                        var product_code = $('#acc_descr' + j).find(':selected').val();
                                        var product_name = $('#acc_descr' + j).find(':selected').attr("data-name");
                                        $('#select2-acc_descr' + j + '-container').html(product_code);
                                        $('#product_name').val(product_name);
                                    }
                                    $('#product_name').val('');
                                }, 1000);
                                var rate = data[k].RATE;
                                var rates = new Intl.NumberFormat(
                                    'en-US', {
                                        style: 'currency',
                                        currency: 'USD',
                                        currencyDisplay: 'narrowSymbol'
                                    }).format(rate);
                                var rates = rates.replace(/[$]/g, '');
                                $('#rate' + i).val(rates);
                                $('#rate' + i + '').css('text-align', 'right ');
                                $('#rate' + i + '').css('padding', '0 1px 0 0');
                                $('#quantity' + i).val(data[k].QTY);
                                $('#quantity' + i + '').css('text-align', 'right ');
                                $('#quantity' + i + '').css('padding', '0 1px 0 0');
                                // $('#type'+i).val(data[k].item_type);
                                var total_quantity = parseFloat((parseInt(data[k].QTY) + parseInt(total_quantity)));
                                var finalformat = new Intl.NumberFormat(
                                    'en-US', {
                                        style: 'currency',
                                        currency: 'USD',
                                        currencyDisplay: 'narrowSymbol'
                                    }).format(total_quantity);
                                var formatted1 = finalformat.replace(/[$]/g, '');
                                $('#total_q').text(formatted1);

                                var amount = data[k].AMT;
                                // amounts=amounts.toLocaleString()+'.00';
                                var amounts = new Intl.NumberFormat(
                                    'en-US', {
                                        style: 'currency',
                                        currency: 'USD',
                                        currencyDisplay: 'narrowSymbol'
                                    }).format(amount);
                                var amounts = amounts.replace(/[$]/g, '');
                                total_amount = parseFloat(total_amount) + parseFloat(amount);
                                // total_amounts=total_amount.toLocaleString()+'.00';
                                var amounts_t = new Intl.NumberFormat(
                                    'en-US', {
                                        style: 'currency',
                                        currency: 'USD',
                                        currencyDisplay: 'narrowSymbol'
                                    }).format(total_amount);
                                var amounts_t = amounts_t.replace(/[$]/g, '');
                                $('#total').text(amounts_t);
                                $('#amount' + i).val(amounts);
                                $('#amount' + i + '').css('text-align', 'right ');
                                $('#amount' + i + '').css('padding', '0 1px 0 0');

                                var item_code = data[k].ITEM_CODE;
                                $('#acc_desc' + i).val(item_code);
                                var item_name = data[k].item_descr;
                                $('#detail' + i).val(item_name);
                                var acc_descr = data[k].PRODUCT_CODE;
                                $('#acc_descr' + i).val(acc_descr);
                                var gen_name = data[k].gen_name;
                                $('#hidden_gen_i' + i).val(gen_name);
                                var item_detail = data[k].ITEM_DETAIL;
                                $('#item_detail' + i).val(item_detail);
                                // console.log( $('#hidden_gen_i' + i).val());
                                var div_name = data[k].div_name;
                                $('#hidden_division_i' + i).val(div_name);
                                var unit_name = data[k].unit_name;
                                $('#hidden_um_i' + i).val(unit_name);
                                var product_name = data[k].product_name;
                                $('#hidden_product_name' + i).val(product_name);
                                k++;
                            }
                            l++
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
    ////
    $("#order_form").on('click', '#report', function() {
        var co_code = $("#company_code").val();
        var doc_no = $("#doc_no").val();
        var doc_year = $("#year").val();
        var order_key = $("#order_key").val();
        // ?action=payment_invoice_generate&tr_no="+response.data[0].TRNO
        $("#ajax-loader").hide();
        let invoice_url = "invoicereports/inventory_local/po_local_report.php?action=print&co_code=" + co_code + "&doc_no=" + doc_no + "&doc_year=" + doc_year + "&order_key=" + order_key;
        window.open(invoice_url, '_blank');
    });
    //Submit
    $("#order_form").on("submit", function(e) {
        var post = $('#post').val();
        var voucher_no = $('#doc_no').val();
        if (post == 'Y') {
            // alert("Not Applicable");
            $("#posted_error").show();
            $("#posted_error_msg").html("Voucher Number '<b>" + voucher_no + "</b>' has been already posted ");

            $("#submit").attr('disabled', 'disabled');
        } else {

            if ($("#order_form").valid()) {
                var rowCount = $("#example1 tr").length;
                if (rowCount > 3) {
                    // var item_code=$('#acc_desc').val();
                    var quantity = $('#quantity').val();
                    var rate = $('#rate').val();
                    var amount = $('#amount').val();
                    var saletax_code = $('#saletax_code').val();
                    var addtax_code = $('#addtax_code').val();
                    if (quantity == '' && rate == '' || rate == '0' && amount == '0' || amount == '0.00') {
                        e.preventDefault();
                        var formData = new FormData(this);
                        // var total=$('#total').val();
                        // var purchase_mode=$('#purchase_mode').val();
                        // formData.append('purchase_mode',purchase_mode);
                        // // var acc_desc=$('#acc_desc').val();
                        // // formData.append('acc_desc',acc_desc);
                        // formData.append('debit',total);
                        // // var company_code=$('#company_code').val();
                        // // formData.append('company_code',company_code);


                        // var voucher_date=$('#voucher_date').val();
                        // formData.append('voucher_date',voucher_date);

                        // doc_no:doc_no,doc_type:doc_type,doc_year:doc_year,co_code:co_code,do_key_ref:do_key



                        formData.append('action', 'update');
                        formData.append('saletax_code', saletax_code);
                        formData.append('addtax_code', addtax_code);
                        $.ajax({
                            url: 'api/Inventory_management/inventory_locals/po_local_api.php',
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
                                            // $.get('sales_module/transaction_files/sales_order_list.php',function(data,status){
                                            $.get('inventory_management/inventory_local/po_local_list_v2.php', function(data, status) {

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
    // breadcrumbs
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
        $.get('inventory_management/inventory_local/po_local_list_v2.php', function(data, status) {
            $("#content").html(data);
        });
    });
    $("#update_po_local_breadcrumb").on("click", function() {
        $.get('inventory_management/inventory_local/update_po_local_v2.php', function(data, status) {
            $("#content").html(data);
        });
    });
</script>
<?php include '../../includes/loader.php' ?>