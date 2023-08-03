<?php
session_start();
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="margin-bottom: -10px;">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h3> Edit Issues [Loan to Party] </h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                        <li class="breadcrumb-item active"><button class="btn btn-sm" id="il_breadcrumb"> Inventory Local</button></li>
                        <li class="breadcrumb-item"><button class="btn btn-sm" id="po_list_breadcrumb"> Issues [Loan to Party]</button></li>
                        <li class="breadcrumb-item"><button class="btn btn-sm" disabled id="add_po_local_breadcrumb">Edit Issues [Loan to Party]</button></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row" style="margin-top:-23px">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body" style="padding:7px">
                            <div class="container">
                                <form method="post" id="order_form">
                                    <?php include '../../display_message/display_message.php' ?>
                                    <input type="hidden" name="post" id="post">
                                    <br>
                                    <div class="row" style="border: 1px solid gray; border-radius: 5px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.29); width: 100%; margin-bottom:5px;padding: 8px;">
                                        <!-- doc -->
                                        <div class="col-md-2 col-lg-1 form-group">
                                            <label>Doc#:</label>
                                        </div>
                                        <div class="col-md-4 col-lg-2 form-group">
                                            <!-- <label for="">Document Number :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="doc_no" style="background-color: #ccd4e1;font-weight:bold;" tabindex="-1" id="doc_no" class="form-control form-control-sm" placeholder="Doc No" readonly>
                                            </div>
                                        </div>
                                        <!-- order key -->
                                        <!-- <div style="width: 5.295rem;" class="form-group"> -->
                                        <div class="form-group col-md-2 col-lg-1">
                                            <label>OrderKey:</label>
                                        </div>
                                        <!-- <div  style="width: 20rem;" class="col-lg-4 form-group"> -->
                                        <div class="col-md-4 col-lg-2 form-group">
                                            <!-- <label for="">Sale Code :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input title="Sale Code" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" style="background-color: #ccd4e1;font-weight:bold;" tabindex="-1" name="sale_code" id="sale_code" class="form-control form-control-sm" placeholder="Sale Code" readonly>
                                            </div>
                                        </div>
                                        <!-- date -->
                                        <div class="col-md-2 col-lg-1 form-group">
                                            <label>Date:</label>
                                        </div>
                                        <div class="col-md-4 col-lg-2 form-group">
                                            <!-- <label for=""> Date :</label><span style="color:red;">*</span> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input type="date" name="voucher_date" id="voucher_date" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px;" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                        <!-- year -->
                                        <div class="col-md-2 col-lg-1 form-group">
                                            <label>Year:</label>
                                        </div>
                                        <div class="col-md-4 col-lg-2 form-group">
                                            <!-- <label for=""> Date :</label><span style="color:red;">*</span> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input type="number" name="year" id="year" class="form-control form-control-sm" min="1900" style="background-color: #ccd4e1;font-weight:bold;" tabindex="-1" max="2099" step="1" readonly>
                                            </div>
                                        </div>
                                        <!-- company -->
                                        <div class="col-md-2 col-lg-1 form-group">
                                            <label>Company:</label>
                                        </div>
                                        <div class="col-md-4 col-lg-2 form-group">
                                            <!-- <label for="">Company Code :<span style="color:red">*</span></label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                                </div>
                                                <input maxlength="30" type="text" name="company_code" id="company_code" style="background-color: #ccd4e1;font-weight:bold;" tabindex="-1" class="form-control form-control-sm" placeholder="Select Company" readonly>
                                            </div>
                                        </div>
                                        <!-- company name -->
                                        <div class="col-md-6 col-lg-3 form-group">
                                            <!-- <label for="inputCompanyName">Company Name :</label><span style="color:red;">*</span> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" style="background-color: #ccd4e1;font-weight:bold;" tabindex="-1" name="company_name" id="company_name" class="form-control form-control-sm" placeholder="Company Name" readonly>
                                            </div>
                                        </div>
                                        <!-- CO Ref -->
                                        <div class="col-md-2 col-lg-1 form-group">
                                            <label>CO Ref:</label>
                                        </div>
                                        <div class="col-md-4 col-lg-2 form-group">
                                            <!-- <label for="">CO Ref :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px;" name="company_ref" id="company_ref" class="form-control form-control-sm" placeholder="Reference No">
                                            </div>
                                        </div>
                                        <!-- voucher number -->
                                        <div class="col-md-2 col-lg-1 form-group">
                                            <label>Voucher#:</label>
                                        </div>
                                        <div class="col-md-4 col-lg-2 form-group">
                                            <!-- <label for="">Voucher# :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="v_no" tabindex="-1" style="background-color: #ccd4e1;font-weight:bold;" id="v_no" class="form-control form-control-sm" placeholder="Cash/Bank Ser#" readonly>
                                            </div>
                                        </div>
                                        <!-- Party co -->
                                        <div class="col-md-2 col-lg-1 form-group">
                                            <label>Party Co:</label>
                                        </div>
                                        <div class="col-md-4 col-lg-2 form-group">
                                            <!-- <label for="">Party :<span style="color:red">*</span></label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                                </div>
                                                <input maxlength="30" type="text" name="party" style="background-color:  #ccd4e1;font-weight:bold;" tabindex="-1" id="party" class="form-control form-control-sm" placeholder="Select Party" readonly>
                                            </div>
                                        </div>
                                        <!-- Party -->
                                        <div class="col-md-6 col-lg-3 form-group">
                                            <!-- <label for="">Party :<span style="color:red">*</span></label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                                </div>
                                                <input type="text" name="name_p" id="name_p" style="background-color: #ccd4e1;font-weight:bold;" tabindex="-1" class="form-control form-control-sm" placeholder="Party Name" readonly>
                                            </div>
                                        </div>
                                        <!-- PO Cat -->
                                        <div class="col-md-2 col-lg-1 form-group">
                                            <label>PO Cat:</label>
                                        </div>
                                        <div class="col-md-4 col-lg-2 form-group">
                                            <!-- <label for="">PO Catg L/I :<span style="color:red">*</span></label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-list-alt"></i></span>
                                                </div>
                                                <select style="width:73% !important;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px;" title="purchase mode" name="purchase_mode" class="form-control form-control-sm" id="purchase_mode">
                                                    <option value="">Select PO</option>
                                                    <option value="I">I</option>
                                                    <option value="L">L</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Party Ref -->
                                        <div class="col-md-2 col-lg-1 form-group">
                                            <label>Dept Ref:</label>
                                        </div>
                                        <div class="col-md-4 col-lg-2 form-group">
                                            <!-- <label for="">Party Ref :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px;" name="party_ref" id="party_ref" class="form-control form-control-sm" placeholder="Dept Ref">
                                            </div>
                                        </div>
                                        <!-- division -->
                                        <div class="col-md-2 col-lg-1 form-group">
                                            <label>Division:</label>
                                        </div>
                                        <div class="col-md-4 col-lg-2 form-group">
                                            <!-- <label for="">Division :<span style="color:red">*</span></label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                                </div>
                                                <input maxlength="30" type="text" name="division" style="background-color:  #ccd4e1;font-weight:bold;" tabindex="-1" id="division" class="form-control form-control-sm" placeholder="Select Division" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3 form-group">
                                            <!-- <label for="">Division Name :</label><span style="color:red;">*</span> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input maxlength="30" type="text" name="division_name" id="division_name" tabindex="-1" style="background-color: #ccd4e1;font-weight:bold;" class="form-control form-control-sm" placeholder="Division Name" readonly>
                                            </div>
                                        </div>
                                        <!-- Narration -->
                                        <div class="col-md-2 col-lg-1 form-group">
                                            <label>Narration:</label>
                                        </div>
                                        <div class="col-md-10 col-lg-5  form-group">
                                            <!-- <label for="">Narration :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <textarea rows="1" name="narration" id="narration" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px;" class="form-control form-control-sm" placeholder="Narration"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 form-group text-center">
                                            <span id="msg3" style="color: red;font-size: 13px;"></span>
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
                                    <div class="card-body">
                                        <br>
                                        <center><span class="bal_msg"><i class="fas fa-exclamation-circle"></i>Quantity can't be greater than Balance</span></center>
                                        <table id="example1" class="table table-bordered table-responsive" style="border: 1px solid gray; border-radius: 5px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.29); width: 100%; margin-bottom:5px;">
                                            <thead>
                                                <tr>
                                                    <td style="text-align: center;"></td>
                                                    <td style="text-align: center;">LOC BAL</td>
                                                    <td><input type="text" style="height:25px;background-color:#ccd4e1;" tabindex="-1" readonly class="form-control form-control-sm"></td>
                                                </tr>
                                                <tr>
                                                    <th>ItemCode</th>
                                                    <th>Name</th>
                                                    <th>LOC</th>
                                                    <th>Qty</th>
                                                    <th>Rate</th>
                                                    <th>Amount</th>
                                                    <th>Batch#</th>
                                                    <th>Expiry Dt</th>
                                                    <th style="display: none;">gen_name_hidden</th>
                                                    <th style="display: none;">um_name_hidden</th>
                                                    <th style="display: none;">div_name_hidden</th>
                                                    <th style="display: none;">total_balance_hidden</th>
                                                    <th style="display: none;">total_balance_hidden</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="d_items">
                                                <tr id="main_tr" class="tr">
                                                    <!-- <td style="width:12%;"><select name="" id = "acc_desc" class="js-example-basic-single acc_desc"></select></td> -->
                                                    <td style="width: 8%;"><input style="text-align:right; padding:0 2px 0 0;width:100px;height:35px;background-color: #b7edea" pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" name="" id="acc_desc" class="" readonly></td>
                                                    <td style="width: 20%;"><textarea style="height:35px;background-color:#ccd4e1; width: 150px; " rows="1" name="" id="detail" class="detail" readonly></textarea></td>
                                                    <!-- <td ><select style="font-size:11px;width:75px !important;height:35px" name="" id = "type" class="type"><option value="0" readonly="readonly" selected>Type</option><option value="N">N</option><option value="F">F</option><option value="S">S</option><option value="T">T</option></select></td> -->
                                                    <td style="width: 8%;"><textarea style="width:100px;height:35px;background-color:#b7edea;font-size:12px" pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" name="" id="loc_i" class="" readonly></textarea></td>
                                                    <!-- <td style="width: 10%;"><textarea  style="width:100px;height:35px;background-color:transparent;font-size:12px"  pattern="[a-zA-Z0-9 ,._-]{1,}" tabindex="-1"  type="text"   name="" id = "grnref_i" class="grnref_i"></textarea></td> -->
                                                    <td style="width: 12%;"><input style="text-align:right; padding:0 2px 0 0;width:150px;height:35px" type="number" name="" id="quantity" class="quantity"></td>
                                                    <td style="width: 12%;"><input style="text-align:right; padding:0 2px 0 0;width:150px;height:35px" pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" name="" id="rate" class="rate"></td>
                                                    <td style="width: 12%;"><input style="text-align:right; padding:0 2px 0 0;width:150px;height:35px;background-color:#ccd4e1" pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" tabindex="-1" name="" id="amount" class="amount" readonly></td>
                                                    <td style="width: 10%;"><textarea style="width:100px;height:35px;font-size:12px; background-color:#ccd4e1" pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" tabindex="-1" name="" id="batch_i" class="batch_i" readonly></textarea></td>
                                                    <td style="width: 10%;"><input style="width:100px;height:35px;font-size:12px; background-color:#ccd4e1" pattern="[a-zA-Z0-9 ,._-]{1,}" type="date" tabindex="-1" name="" id="expirydt_i" class="expirydt_i" readonly></td>
                                                    <td style="display: none; width: 10%;"><input style="display: none; width:100px;height:35px;font-size:12px; background-color:#ccd4e1" pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" tabindex="-1" name="" id="gen_name_hidden" class="gen_name_hidden" readonly></td>
                                                    <td style="display: none; width: 10%;"><input style="display: none; width:100px;height:35px;font-size:12px; background-color:#ccd4e1" pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" tabindex="-1" name="" id="um_name_hidden" class="um_name_hidden" readonly></td>
                                                    <td style="display: none; width: 10%;"><input style="display: none; width:100px;height:35px;font-size:12px; background-color:#ccd4e1" pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" tabindex="-1" name="" id="div_name_hidden" class="div_name_hidden" readonly></td>
                                                    <td style="display: none; width: 10%;"><input style="display: none; width:100px;height:35px;font-size:12px; background-color:#ccd4e1" pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" tabindex="-1" name="" id="total_balance_hidden" class="total_balance_hidden" readonly></td>
                                                    <td style="display: none; width: 10%;"><input style="display: none; width:100px;height:35px;font-size:12px; background-color:#ccd4e1" pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" tabindex="-1" name="" id="location_hidden" class="location_hidden" readonly></td>
                                                    <td><button type="button" class="btn btn-sm btn-primary add"><i class="fa fa-plus"></i></button></td>
                                                </tr>
                                            </tbody>
                                            <tr id="last_tr">
                                                <td style="text-align: center;"></td>
                                                <td colspan="2"><input type="text" style="height: 25px;background-color:#ccd4e1;" id="loc_name_" tabindex="-1" class="form-control form-control-sm" placeholder="Location Name" readonly></td>
                                                <!-- <td style="text-align:right;">Total:</td> -->
                                                <td colspan="1"><input type="text" style="height: 25px;background-color:#ccd4e1;" id="previous_balance" tabindex="-1" placeholder="prevoius balance" class="form-control form-control-sm text-right" readonly></td>
                                                <!-- <td style="font-weight:bold" name="total_q" id="total_q"><b>0</b></td> -->
                                                <td></td>
                                                <td style="font-weight:bold; text-align: right;" name="total" id="total"><b>0</b></td>
                                            </tr>
                                        </table>
                                        <!-- <br> -->
                                        <div class="row">
                                            <div class="col-md-12 mt-3">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <div class="row">
                                                                <div class="col-md-1 text-center mt-2"><label>Div</label></div>
                                                                <!-- <div class="col-sm-5 mt-1"><input style="background-color: #ccd4e1; height: 25px;" type="text"  name="" id="div_code_bottom" class="form-control form-control-sm" readonly></div> -->
                                                                <div class="col-md-12 col-lg-5 mt-1"><input style="background-color: #ccd4e1; height: 25px;" type="text" tabindex="-1" name="" id="div_name_bottom" class="form-control form-control-sm" readonly></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-1 text-center mt-1"><label>UM</label></div>
                                                                <div class="col-md-12 col-lg-5 mt-1"><input style="background-color: #ccd4e1; height: 25px;" type="text" tabindex="-1" name="" id="um_name_bottom" class="form-control form-control-sm" readonly></div>
                                                                <div class="col-md-1 text-center mt-1"><label>Gen</label></div>
                                                                <div class="col-md-12 col-lg-5 mt-1"><input style="background-color: #ccd4e1; height: 25px;" type="text" tabindex="-1" name="" id="gen_name_bottom" class="form-control form-control-sm" readonly></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- </form> -->
                                    <div style="text-align: center;">
                                        <span id="msg" style="color: red;font-size: 13px;"></span>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9"></div>
                                        <div class="col-sm-2 text-right">
                                            <a id="report" type="button" value="Submit" class="btn btn-info toastrDefaultSuccess">PRINT UM &nbsp;<i style="font-size:20px" class="fa fa-file"></i></a>
                                        </div>
                                        <div class="col-sm-1 text-right">
                                            <button id="submit" type="submit" value="Submit" class="btn btn-primary toastrDefaultSuccess"><i style="font-size:20px" class="fa fa-plus"></i></button>
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
                    <span aria-hidden="true">*</span>
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
                    <span aria-hidden="true">*</span>
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
<!-- location  form -->
<div class="modal fade" style="background-color: transparent;" id="locationFormModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Location</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table" id="location_table">
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
<!-- location_add  form -->
<div class="modal fade" id="location_addFormModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Location</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table" id="location_add_table">
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
<!-- ass_desc  form -->
<div class="modal fade" id="ass_descFormModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Item</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table" id="ass_desc_table">
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
<!-- ass_desc add form -->
<div class="modal fade" id="ass_descFormModelAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Item</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table" id="ass_desc_table_add">
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
<style>
    body {
        zoom: 95%;
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
    #btn-back-to-top {
        position: fixed;
        bottom: 20px;
        right: 20px;
    }
    html {
        scroll-behavior: smooth;
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
    .bal_msg {
        font-size: 15px;
        color: red;
        display: none;
        margin: 5px auto;
        text-align: center;
    }
    .form-control:focus,
    input:focus,
    select:focus,
    textarea:focus {
        -moz-box-shadow: 0 0 8px rgba(82, 168, 236, .6);
        box-shadow: 0 0 8px orangered !important;
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
            } else {
            }
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
            console.log(previous_tq);
            console.log(previous_qty);
            console.log(minuss_q);
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
            var total_balance = $('#previous_balance').val();
            if (parseInt(total_balance) < parseInt(quantity)) {
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
            if (quantity == '' || quantity == '0' || quantity == '0.00') {
                quantity = 0;
                $('#amount' + quantity_id).val('');
                $('#total').html(minuss);
            } else {
                if (rate == "" || rate == '0' || rate == '0.00') {
                    $('#amount' + quantity_id).val('');
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
            console.log(quantity);
            var t_qty = parseInt(quantity) + parseInt(minuss_q);
            $('#total_q').text(t_qty);
        });
    });
    $('#voucher_date').on('keyup', function(e) {
        if (e.which == 9) {
            $('#company_ref').focus();
        }
    });
    $('#view_party').click(function() {
        var party_code = $('#party').val();
        if (party_code != '') {
            $.ajax({
                url: 'api/Inventory_management/inventory_locals/issues_loan_to_party_api.php',
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
                url: 'api/Inventory_management/inventory_locals/issues_loan_to_party_api.php',
                type: 'POST',
                data: {
                    action: 'party_code',
                    company_code: company_code
                },
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    table.clear().draw();
                    var sno = '0';
                    for (var i = 0; i < response.length; i++) {
                        sno++;
                        table.row.add([sno, response[i].party_name, response[i].party_div, response[i].div_name, response[i].zone_name, response[i].city_name]);
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
    $('#party_table').on('click', '.even', function() {
        var party_code = $(this).closest('tr').children('td:nth-child(3)').text();
        $('#party').val(party_code);
        if (party_code != '') {
            $.ajax({
                url: 'api/Inventory_management/inventory_locals/issues_loan_to_party_api.php',
                type: 'POST',
                data: {
                    action: 'party_detail',
                    party_code: party_code
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    $('#name_p').val(data.party_name);
                    $('#address_p').val(data.address);
                    $('#phone_p').val(data.phone_nos);
                    $('#gst_p').val(data.gst);
                    $('#ntn_p').val(data.ntn);
                    $('#division_p').val(data.division_name);
                    $('#city_p').val(data.city_name);
                    $('#cr_days').val(data.crdays);
                },
                error: function(error) {
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
        }
        $('#PartyFormModel').modal('hide');
        $("#purchase_mode").focus();
    });
    $('#party_table').on('click', '.odd', function() {
        var party_code = $(this).closest('tr').children('td:nth-child(3)').text();
        $('#party').val(party_code);
        if (party_code != '') {
            $.ajax({
                url: 'api/Inventory_management/inventory_locals/issues_loan_to_party_api.php',
                type: 'POST',
                data: {
                    action: 'party_detail',
                    party_code: party_code
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    $('#name_p').val(data.party_name);
                    $('#address_p').val(data.address);
                    $('#phone_p').val(data.phone_nos);
                    $('#gst_p').val(data.gst);
                    $('#ntn_p').val(data.ntn);
                    $('#division_p').val(data.division_name);
                    $('#city_p').val(data.city_name);
                    $('#cr_days').val(data.crdays);
                },
                error: function(error) {
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
        }
        $('#PartyFormModel').modal('hide');
        $("#purchase_mode").focus();
    });
    $('#order_form').on('focus', '#division', function() {
        var company_code = $('#company_code').val();
        if (company_code != '') {
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
                url: 'api/Inventory_management/inventory_locals/issues_loan_to_party_api.php',
                type: 'POST',
                data: {
                    action: 'division_code',
                    company_code: company_code
                },
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    table.clear().draw();
                    var sno = '0';
                    for (var i = 0; i < response.length; i++) {
                        sno++;
                        table.row.add([sno, response[i].div_code, response[i].div_name]);
                    }
                    table.draw();
                },
                error: function(error) {
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
            $('#divisionFormModel').modal('show');
        }
    });
    $('#division_table').on('click', '.even', function() {
        var division_code = $(this).closest('tr').children('td:nth-child(2)').text();
        var division_name = $(this).closest('tr').children('td:nth-child(3)').text();
        $('#division').val(division_code);
        $('#division_name').val(division_name);
        $("#ajax-loader").hide();
        var rowCount = $("#example1 tr").length;
        if (rowCount == 3) {
            $('#acc_desc').val('');
            $('#detail').val('');
            $('#memo').val('');
            $('#amount').val('');
            $('#total').val('');
            $('#debit').val('');
            $('#view_item').css('display', 'none');
        } else {
            for (var a = 2; a < rowCount - 1; a++) {
                var d = a - 1;
                $('#tr' + d + '').remove();
                $('#total').text('0');
            }
        }
        $('#divisionFormModel').modal('hide');
        $("#narration").focus();
    });
    $('#division_table').on('click', '.odd', function() {
        var division_code = $(this).closest('tr').children('td:nth-child(2)').text();
        var division_name = $(this).closest('tr').children('td:nth-child(3)').text();
        $('#division').val(division_code);
        $('#division_name').val(division_name);
        $("#ajax-loader").hide();
        var rowCount = $("#example1 tr").length;
        if (rowCount == 3) {
            $('#acc_desc').val('');
            $('#detail').val('');
            $('#memo').val('');
            $('#amount').val('');
            $('#total').val('');
            $('#debit').val('');
            $('#view_item').css('display', 'none');
        } else {
            for (var a = 2; a < rowCount - 1; a++) {
                var d = a - 1;
                $('#tr' + d + '').remove();
                $('#total').text('0');
            }
        }
        $('#divisionFormModel').modal('hide');
        $("#narration").focus();
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
            url: 'api/Inventory_management/inventory_locals/issues_loan_to_party_api.php',
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
    $(document).ready(function() {
        $('#company_table').on('click', '.even', function() {
            var company_name = $(this).closest('tr').children('td:nth-child(2)').text();
            var company_code = $(this).closest('tr').children('td:nth-child(3)').text();
            $('#company_code').val(company_code);
            $('#company_name').val(company_name);
            $("#ajax-loader").hide();
            var rowCount = $("#example1 tr").length;
            if (rowCount == 3) {
                $('#acc_desc').val('');
                $('#detail').val('');
                $('#memo').val('');
                $('#amount').val('');
                $('#total').val('');
                $('#debit').val('');
                $('#view_item').css('display', 'none');
            } else {
                for (var a = 2; a < rowCount - 1; a++) {
                    var d = a - 1;
                    $('#tr' + d + '').remove();
                    $('#total').text('0');
                }
            }
            $('#CompanyFormModel').modal('hide');
            $("#company_ref").focus();
        });
        $('#company_table').on('click', '.odd', function() {
            var company_name = $(this).closest('tr').children('td:nth-child(2)').text();
            var company_code = $(this).closest('tr').children('td:nth-child(3)').text();
            $('#company_code').val(company_code);
            $('#company_name').val(company_name);
            $("#ajax-loader").hide();
            var rowCount = $("#example1 tr").length;
            if (rowCount == 3) {
                $('#acc_desc').val('');
                $('#detail').val('');
                $('#memo').val('');
                $('#amount').val('');
                $('#total').val('');
                $('#debit').val('');
                $('#view_item').css('display', 'none');
            } else {
                for (var a = 2; a < rowCount - 1; a++) {
                    var d = a - 1;
                    $('#tr' + d + '').remove();
                    $('#total').text('0');
                }
            }
            $('#CompanyFormModel').modal('hide');
            $("#company_ref").focus();
        });
        $('#order_form').on('focus', '#loc_i', function() {
            var company_code = $('#company_code').val();
            var item_code = $('#acc_desc').val();
            $('#location_table').dataTable().fnDestroy();
            table = $('#location_table').DataTable({
                dom: 'Bfrtip',
                orderCellsTop: true,
                fixedHeader: true,
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print',
                ]
            });
            $('#location_table thead tr:eq(1) th').each(function(i) {
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
                url: 'api/Inventory_management/inventory_locals/issues_loan_to_party_api.php',
                type: 'POST',
                data: {
                    action: 'location_detail',
                    company_code: company_code,
                    item_code: item_code
                },
                dataType: "json",
                success: function(response) {
                    console.log(response);
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
            $('#locationFormModel').modal('show');
        });
        $('#location_table').on('click', '.even', function() {
            var loc_code = $(this).closest('tr').children('td:nth-child(10)').text();
            var loc_name = $(this).closest('tr').children('td:nth-child(11)').text();
            var batch_no = $(this).closest('tr').children('td:nth-child(8)').text();
            var expiry_date = $(this).closest('tr').children('td:nth-child(9)').text();
            var bal = $(this).closest('tr').children('td:nth-child(13)').text();
            $('#loc_i').val(loc_code);
            $('#loc_name_').val(loc_name);
            $('#batch_i').val(batch_no);
            $('#expirydt_i').val(expiry_date);
            $('#previous_balance').val(bal);
            $('#total_balance_hidden').val(bal);
            $('#location_hidden').val(loc_name);
            $('#locationFormModel').modal('hide');
            $("#quantity").focus();
        });
        $('#location_table').on('click', '.odd', function() {
            var loc_code = $(this).closest('tr').children('td:nth-child(10)').text();
            var loc_name = $(this).closest('tr').children('td:nth-child(11)').text();
            var batch_no = $(this).closest('tr').children('td:nth-child(8)').text();
            var expiry_date = $(this).closest('tr').children('td:nth-child(9)').text();
            var bal = $(this).closest('tr').children('td:nth-child(13)').text();
            $('#loc_i').val(loc_code);
            $('#loc_name_').val(loc_name);
            $('#batch_i').val(batch_no);
            $('#expirydt_i').val(expiry_date);
            $('#previous_balance').val(bal);
            $('#total_balance_hidden').val(bal);
            $('#location_hidden').val(loc_name);
            $('#locationFormModel').modal('hide');
            $("#quantity").focus();
        });
        $('#order_form').on('focus', '#acc_desc', function() {
            var company_code = $('#company_code').val();
            $('#ass_desc_table').dataTable().fnDestroy();
            table = $('#ass_desc_table').DataTable({
                dom: 'Bfrtip',
                orderCellsTop: true,
                fixedHeader: true,
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print',
                ]
            });
            $('#ass_desc_table thead tr:eq(1) th').each(function(i) {
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
                url: 'api/Inventory_management/inventory_locals/issues_loan_to_party_api.php',
                type: 'POST',
                data: {
                    action: 'item_code',
                    company_code: company_code
                },
                dataType: "json",
                success: function(response) {
                    console.log(response);
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
            $('#ass_descFormModel').modal('show');
        });
        $('#ass_desc_table').on('click', '.even', function() {
            var item_code = $(this).closest('tr').children('td:nth-child(6)').text();
            var item_name = $(this).closest('tr').children('td:nth-child(2)').text();
            var div_name = $(this).closest('tr').children('td:nth-child(4)').text();
            var gen_name = $(this).closest('tr').children('td:nth-child(5)').text();
            var um_name = $(this).closest('tr').children('td:nth-child(9)').text();
            var div_code = $(this).closest('tr').children('td:nth-child(8)').text();
            $('#acc_desc').val(item_code);
            $('#detail').val(item_name);
            $('#div_name').val(div_name);
            $('#div_name_hidden').val(div_name);
            $('#gen_name').val(gen_name);
            $('#gen_name_hidden').val(gen_name);
            $('#um_name').val(um_name);
            $('#um_name_hidden').val(um_name);
            $('#div_code_bottom').val(div_code);
            $('#div_name_bottom').val(div_name);
            $('#um_name_bottom').val(um_name);
            $('#gen_name_bottom').val(gen_name);
            $('#ass_descFormModel').modal('hide');
            $("#loc_i").focus();
        });
        $('#ass_desc_table').on('click', '.odd', function() {
            var item_code = $(this).closest('tr').children('td:nth-child(6)').text();
            var item_name = $(this).closest('tr').children('td:nth-child(2)').text();
            var div_name = $(this).closest('tr').children('td:nth-child(4)').text();
            var gen_name = $(this).closest('tr').children('td:nth-child(5)').text();
            var um_name = $(this).closest('tr').children('td:nth-child(9)').text();
            var div_code = $(this).closest('tr').children('td:nth-child(8)').text();
            $('#acc_desc').val(item_code);
            $('#detail').val(item_name);
            $('#div_name').val(div_name);
            $('#div_name_hidden').val(div_name);
            $('#gen_name').val(gen_name);
            $('#gen_name_hidden').val(gen_name);
            $('#um_name').val(um_name);
            $('#um_name_hidden').val(um_name);
            $('#div_code_bottom').val(div_code);
            $('#div_name_bottom').val(div_name);
            $('#um_name_bottom').val(um_name);
            $('#gen_name_bottom').val(gen_name);
            $('#ass_descFormModel').modal('hide');
            $("#loc_i").focus();
        });
        $('#purchase_mode').change(function() {
            var company_code = $("#company_code").val();
            var division_code = $("#division").val();
            var purchase_mode = $("#purchase_mode").val();
            if (division_code != '' && company_code != '') {
                $.ajax({
                    url: 'api/Inventory_management/inventory_locals/issues_loan_to_party_api.php',
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
            submitHandler: function() {
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
        $("#order_form").on('change', '.acc_desc', function() {
            var target = event.target || event.srcElement;
            var id = target.id;
            var id = id.split("-");
            id = id[1];
            var id = id.split("acc_desc");
            id = id[1];
            var account_code = $('#acc_desc' + id).find(':selected').val();
            var company_code = $('#company_code').val();
            var detail = $('#acc_desc' + id).find(':selected').attr("data-name");
            $('#select2-acc_desc' + id + '-container').html(account_code);
            $('#detail' + id).val(detail);
            $.ajax({
                url: 'api/Inventory_management/inventory_locals/issues_loan_to_party_api.php',
                type: 'POST',
                data: {
                    action: 'item_detail',
                    item_code: account_code,
                    company_code: company_code
                },
                dataType: "json",
                success: function(data) {
                    $('#div_code_bottom').val(data.div_code);
                    $('#div_name_bottom').val(data.div_name);
                    $('#um_name_bottom').val(data.um_name);
                    $('#gen_name_bottom').val(data.gen_name);
                },
                error: function(error) {
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
        });
    });
    $('#example1').ready(function() {
        var i = 0;
        var total_amount = 0;
        $('.add').click(function() {
            var rowCount = $("#example1 tr").length;
            i = rowCount - 2;
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
            var previous_balance = $("#previous_balance").val();
            var previous_location = $("#previous_location").val();
            var div_code_bottom = $("#div_code_bottom").val();
            var div_code_bottom = $("#div_code_bottom").val();
            var div_name_bottom = $("#div_name_bottom").val();
            var um_name_bottom = $("#um_name_bottom").val();
            var gen_name_bottom = $("#gen_name_bottom").val();
            var gen_name_hidden = $("#gen_name_hidden").val();
            var um_name_hidden = $("#um_name_hidden").val();
            var div_name_hidden = $("#div_name_hidden").val();
            var total_balance_hidden = $("#total_balance_hidden").val();
            var location_hidden = $("#location_hidden").val();
            if (acc_desc == null) {
                $('#msg').text("Account can't be the null.");
            } else if (quantity == "") {
                $('#msg').text("Quantity can't be the null.");
            } else if (rate == "") {
                $('#msg').text("Rate can't be the null.");
            } else if (amount <= 0) {
                $('#msg').text("Amount can't be the null.");
            } else {
                $('#msg').text("");
                $("#acc_desc").val('');
                $("#amount").val('');
                $("#detail").val('');
                $("#loc_i").val('');
                $("#loc_name_").val('');
                $("#grnref_i").val('');
                $("#batch_i").val('');
                $("#expirydt_i").val('');
                $("#quantity").val('');
                $("#division_i").val('');
                $("#gen_i").val('');
                $("#um_i").val('');
                $("#previous_balance").val('');
                $("#previous_location").val('');
                $("#div_code_bottom").val('');
                $("#div_name_bottom").val('');
                $("#um_name_bottom").val('');
                $("#gen_name_bottom").val('');
                $("#gen_name_hidden").val('');
                $("#um_name_hidden").val('');
                $("#div_name_hidden").val('');
                $("#total_balance_hidden").val('');
                $("#location_hidden").val('');
                $("#rate").val('');
                $('#d_items tr:last').before('<tr id="tr' + i + '" class="tr"><td style="width: 8%;"><input  style="text-align:right; padding:0 2px 0 0;width:100px;height:35px;background-color: #b7edea"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="acc_desc[]" id = "acc_desc' + i + '" class="acc_desc" readonly></td><td style="width: 20%;"><textarea style="height:35px;background-color:#ccd4e1; width: 100%; " rows="1"   name="detail[]" id = "detail' + i + '" class="detail" readonly></textarea></td><td style="width: 8%;"><textarea  style="width:100px;height:35px;background-color:#b7edea;font-size:12px"  pattern="[a-zA-Z0-9 ,._-]{1,}" type="text"  name="loc_i[]" id = "loc_i' + i + '" class="loc_i" readonly></textarea></td><td style="width: 12%;"><input  style="text-align:right; padding:0 2px 0 0;width:100%;height:35px" type="number"  name="quantity[]" id="quantity' + i + '" class="quantity"></td><td style="width: 12%;"><input  style="text-align:right; padding:0 2px 0 0;width:100%;height:35px"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="rate[]" id = "rate' + i + '" class="rate"></td><td style="width: 12%;"><input  style="text-align:right; padding:0 2px 0 0;width:100%;height:35px;background-color:#ccd4e1"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text" tabindex="-1"  name="amount[]" id = "amount' + i + '" class="amount" readonly></td><td style="width: 10%;"><textarea  style="width:100px;height:35px;font-size:12px; background-color:#ccd4e1"  pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" tabindex="-1" name="batch_i[]" id = "batch_i' + i + '" class="batch_i" readonly></textarea></td><td style="width: 10%;"><input style="width:100px;height:35px;font-size:12px; background-color:#ccd4e1"  pattern="[a-zA-Z0-9 ,._-]{1,}" type="date" tabindex="-1" name="expirydt_i[]" id = "expirydt_i' + i + '" class="expirydt_i" readonly></td><td style="display:none; width: 10%;"><input style="display:none; width:100px;height:35px;font-size:12px; background-color:#ccd4e1"  pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" tabindex="-1" name="gen_name_hidden[]" id = "gen_name_hidden' + i + '" class="gen_name_hidden" readonly></td><td style="display:none; width: 10%;"><input style="display:none; width:100px;height:35px;font-size:12px; background-color:#ccd4e1"  pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" tabindex="-1" name="um_name_hidden[]" id = "um_name_hidden' + i + '" class="um_name_hidden" readonly></td><td style="display:none; width: 10%;"><input style="display:none; width:100px;height:35px;font-size:12px; background-color:#ccd4e1"  pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" tabindex="-1" name="div_name_hidden[]" id = "div_name_hidden' + i + '" class="div_name_hidden" readonly></td><td style="display:none; width: 10%;"><input style="display:none; width:100px;height:35px;font-size:12px; background-color:#ccd4e1"  pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" tabindex="-1" name="total_balance_hidden[]" id = "total_balance_hidden' + i + '" class="total_balance_hidden" readonly></td><td style="display:none; width: 10%;"><input style="display:none; width:100px;height:35px;font-size:12px; background-color:#ccd4e1"  pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" tabindex="-1" name="location_hidden[]" id = "location_hidden' + i + '" class="location_hidden" readonly></td><td><button type = "button" id="' + i + '" class="btn btn-sm btn-danger remove"><b>X<b></button></td></tr>');
                $('#type').prop("selectedIndex", 0).val();
                if (type == '' || type == '0') {
                    $('#type' + i + '').prop("selectedIndex", 0).val();
                } else {
                    $('#type' + i + '').val(type);
                }
                $('#acc_desc' + i + '').val(acc_desc);
                $('#detail' + i + '').val(detail);
                $('#loc_i' + i + '').val(loc_i);
                $('#grnref_i' + i + '').val(grnref_i);
                console.log(batch_i);
                $('#batch_i' + i + '').text(batch_i);
                $('#expirydt_i' + i + '').val(expirydt_i);
                $('#quantity' + i + '').val(quantity);
                $('#rate' + i + '').val(rates);
                $('#amount' + i + '').val(amounts);
                $('#gen_name_hidden' + i + '').val(gen_name_hidden);
                $('#um_name_hidden' + i + '').val(um_name_hidden);
                $('#div_name_hidden' + i + '').val(div_name_hidden);
                $('#total_balance_hidden' + i + '').val(total_balance_hidden);
                $('#location_hidden' + i + '').val(location_hidden);
                $('#quantity' + i + '').css('padding', '0 1px 0 0');
                $('#rate' + i + '').css('text-align', 'right ');
                $('#rate' + i + '').css('padding', '0 1px 0 0');
                $('#amount' + i + '').css('text-align', 'right ');
                $('#amount' + i + '').css('padding', '0 1px 0 0');
            }
        });
        $('#example1').on('click', '.tr', function() {
            var button_id = $(this).attr("id");
            var id = button_id.split("tr");
            id = id[1];
            if (button_id != "main_tr") {
                var item_code = $('#acc_desc' + id).val();
                console.log(item_code);
                if (item_code == undefined) {
                    $('#div_name_bottom').val('');
                    $('#gen_name_bottom').val('');
                    $('#um_name_bottom').val('');
                    $('#total_balance').val('');
                    $('#loc_name_').val('');
                } else {
                    var order_key = $('#sale_code').val();
                    var doc_date = $('#voucher_date').val();
                    $.ajax({
                        url: 'api/Inventory_management/inventory_locals/issues_loan_to_party_api.php',
                        type: 'POST',
                        data: {
                            action: 'item_detail_tr',
                            order_key: order_key,
                            doc_date: doc_date,
                            item_code: item_code,
                        },
                        dataType: "json",
                        success: function(response) {
                            console.log(response);
                            if (response == null) {
                            } else {
                                $('#div_name_bottom').val(response.div_name);
                                $('#gen_name_bottom').val(response.gen_name);
                                $('#um_name_bottom').val(response.unit_name);
                                $('#previous_balance').val(parseFloat(response.BAL_STOCK) + parseFloat(response.qty));
                                $('#loc_name_').val(response.loc_name);
                            }
                        },
                        error: function(error) {
                            console.log(error);
                            alert("Contact IT Department");
                        }
                    });
                }
                var button_id = button_id.split("tr");
                var id = button_id[1];
                var gen_name = $('#gen_name_hidden' + id + '').val();
                var um_name = $('#um_name_hidden' + id + '').val();
                var total_balance = $('#total_balance_hidden' + id + '').val();
                var div_name = $('#div_name_hidden' + id + '').val();
                $('#gen_name_bottom').val(gen_name);
                $('#um_name_bottom').val(um_name);
                $('#previous_balance').val(total_balance);
                $('#div_name_bottom').val(div_name);
            } else {
                var button_id = button_id.split("tr");
                var id = button_id[1];
                var div_code_div = $('#hidden_div' + id + '').val();
                var gen_name = $('#hidden_gen' + id + '').val();
                var um_name = $('#hidden_um' + id + '').val();
                var order_bal_qty = $('#hidden_t_bal' + id + '').val();
                console.log(order_bal_qty);
                var loc_name_ = $('#loc_name_').val();
                $('#div_name_bottom').val(div_code_div);
                $('#gen_name_bottom').val(gen_name);
                $('#um_name_bottom').val(um_name);
                $('#previous_balance').val(order_bal_qty);
                $('#loc_name_').val('');
                var loc_code = $('#loc' + id).val();
            }
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
            $('#total').text(total_amount_formatted);
            var add_amount_calc = parseFloat($('#add_amount_calc').val());
            var less_freight_calc = parseFloat($('#less_freight_calc').val());
            var less_disc_calc = parseFloat($('#less_disc_calc').val());
            $('#final_total_calc').val(parseFloat(total_amount) + parseFloat(add_amount_calc) + parseFloat(less_freight_calc) + parseFloat(less_disc_calc));
            var total_quantity = parseFloat(current_quantity) - parseFloat(remove_quantity);
            if (isNaN(total_quantity)) {
                total_quantity = '0';
            } else {
                total_quantity = total_quantity;
            }
            var total_quantity_formatted = new Intl.NumberFormat(
                'en-US', {
                    style: 'currency',
                    currency: 'USD',
                    currencyDisplay: 'narrowSymbol'
                }).format(total_quantity);
            var total_quantity_formatted = total_quantity_formatted.replace(/[$]/g, '');
            $('#total_q').text(total_quantity_formatted);
        });
    });
    $("#order_form").on("submit", function(e) {
        var post = $('#post').val();
        var doc_no = $('#doc_no').val();
        if (post == 'Y') {
            $("#posted_error").show();
            $("#posted_error_msg").html("Voucher Number '<b>" + doc_no + "</b>' has been posted ");
        } else {
            if ($("#order_form").valid()) {
                var rowCount = $("#example1 tr").length;
                if (rowCount > 3) {
                    var quantity = $('#quantity').val();
                    var rate = $('#rate').val();
                    var amount = $('#amount').val();
                    if (quantity == '' && rate == '' && amount == '' || amount == '0' || amount == '0.00') {
                        e.preventDefault();
                        var formData = new FormData(this);
                        var total = $('#total').text();
                        formData.append('debit', total);
                        var company_code = $('#company_code').val();
                        formData.append('company_code', company_code);
                        formData.append('action', 'update');
                        $.ajax({
                            url: 'api/Inventory_management/inventory_locals/issues_loan_to_party_api.php',
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
                                            $.get('inventory_management/inventory_local/issues_loan_to_party.php', function(data, status) {
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
            url: 'api/Inventory_management/inventory_locals/issues_loan_to_party_api.php',
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
                $('#sale_code').val(response.DO_KEY);
                $('#division').val(response.DIV_CODE);
                $('#purchase_mode').val(response.PO_CATG);
                $('#po_name').val(response.PO_NO);
                $('#po_date').val(response.PO_DATE);
                $('#select2-party-container').html(response.PARTY_CODE);
                $('#name_p').val(response.party_name);
                $('#party_ref').val(response.PARTY_REF);
                $('#narration').val(response.REMARKS);
                $('#company_name').val(response.co_name);
                $('#party_name').val(response.party_name);
                $('#address_p').val(response.address);
                $('#company_ref').val(response.REFNUM);
                $('#party').val(response.PARTY_CODE);
                $('#division_name').val(response.div_name);
                $('#post').val(response.POST);
                $.ajax({
                    url: 'api/Inventory_management/inventory_locals/issues_loan_to_party_api.php',
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
                        console.log(data);
                        var total_amount = 0;
                        var total_quantity = 0;
                        var rej_qty = 0;
                        var j = 1;
                        var k = 0;
                        var l = 0;
                        if (data.length >= 1) {
                            for (var i = 1; i <= data.length; i++) {
                                $('#d_items tr:last').before('<tr id="tr' + i + '" class="tr"><td style="width: 8%;"><input  style="text-align:right; padding:0 2px 0 0;width:100px;height:35px;background-color: #b7edea"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="acc_desc[]" id = "acc_desc' + i + '" class="acc_desc" readonly></td><td style="width: 20%;"><textarea style="height:35px;background-color:#ccd4e1; width: 100%; " rows="1"   name="detail[]" id = "detail' + i + '" class="detail" readonly></textarea></td><td style="width: 8%;"><textarea  style="width:100px;height:35px;background-color:#b7edea;font-size:12px"  pattern="[a-zA-Z0-9 ,._-]{1,}" type="text"  name="loc_i[]" id = "loc_i' + i + '" class="loc_i" readonly></textarea></td><td style="width: 12%;"><input  style="text-align:right; padding:0 2px 0 0;width:100%;height:35px" type="number"  name="quantity[]" id="quantity' + i + '" class="quantity"></td><td style="width: 12%;"><input  style="text-align:right; padding:0 2px 0 0;width:100%;height:35px"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="rate[]" id = "rate' + i + '" class="rate"></td><td style="width: 12%;"><input  style="text-align:right; padding:0 2px 0 0;width:100%;height:35px;background-color:#ccd4e1"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text" tabindex="-1"  name="amount[]" id = "amount' + i + '" class="amount" readonly></td><td style="width: 10%;"><textarea  style="width:100px;height:35px;font-size:12px; background-color:#ccd4e1"  pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" tabindex="-1" name="batch_i[]" id = "batch_i' + i + '" class="batch_i" readonly></textarea></td><td style="width: 10%;"><input style="width:100px;height:35px;font-size:12px; background-color:#ccd4e1"  pattern="[a-zA-Z0-9 ,._-]{1,}" type="date" tabindex="-1" name="expirydt_i[]" id = "expirydt_i' + i + '" class="expirydt_i" readonly></td><td style="display:none; width: 10%;"><input style="display:none; width:100px;height:35px;font-size:12px; background-color:#ccd4e1"  pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" tabindex="-1" name="gen_name_hidden[]" id = "gen_name_hidden' + i + '" class="gen_name_hidden" readonly></td><td style="display:none; width: 10%;"><input style="display:none; width:100px;height:35px;font-size:12px; background-color:#ccd4e1"  pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" tabindex="-1" name="um_name_hidden[]" id = "um_name_hidden' + i + '" class="um_name_hidden" readonly></td><td style="display:none; width: 10%;"><input style="display:none; width:100px;height:35px;font-size:12px; background-color:#ccd4e1"  pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" tabindex="-1" name="div_name_hidden[]" id = "div_name_hidden' + i + '" class="div_name_hidden" readonly></td><td style="display:none; width: 10%;"><input style="display:none; width:100px;height:35px;font-size:12px; background-color:#ccd4e1"  pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" tabindex="-1" name="total_balance_hidden[]" id = "total_balance_hidden' + i + '" class="total_balance_hidden" readonly></td><td style="display:none; width: 10%;"><input style="display:none; width:100px;height:35px;font-size:12px; background-color:#ccd4e1"  pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" tabindex="-1" name="location_hidden[]" id = "location_hidden' + i + '" class="location_hidden" readonly></td><td><button type = "button" id="' + i + '" class="btn btn-sm btn-danger remove"><b>X<b></button></td></tr>');
                                $('#type').prop("selectedIndex", 0).val();
                                var item_code = data[k].ITEM_CODE;
                                $('#acc_desc' + i).val(item_code);
                                var item_name = data[k].item_name_sale;
                                $('#detail' + i).val(item_name);
                                var type = data[k].ITEM_TYPE;
                                $('#type' + i).val(type);
                                var product_code = data[k].PRODUCT_CODE;
                                $('#product' + i).val(product_code);
                                var loc_i = data[k].LOC_CODE;
                                $('#loc_i' + i).val(loc_i);
                                var grn_ref_i = data[k].GRN_REF;
                                $('#grnref_i' + i).val(grn_ref_i);
                                var batch_i = data[k].BATCH_NO;
                                $('#batch_i' + i).val(batch_i);
                                var expirydt_i = data[k].EXPIRY_DATE;
                                $('#expirydt_i' + i).val(expirydt_i);
                                var quantity = data[k].QTY;
                                $('#quantity' + i).val(quantity);
                                var rate = data[k].RATE;
                                var rate_formatted = new Intl.NumberFormat(
                                    'en-US', {
                                        style: 'currency',
                                        currency: 'USD',
                                        currencyDisplay: 'narrowSymbol'
                                    }).format(rate);
                                var rate_formatted = rate_formatted.replace(/[$]/g, '');
                                $('#amount' + i).val(rate_formatted);
                                $('#rate' + i).val(rate_formatted);
                                var ok_qty = data[k].AMT;
                                var ok_qty_formatted = new Intl.NumberFormat(
                                    'en-US', {
                                        style: 'currency',
                                        currency: 'USD',
                                        currencyDisplay: 'narrowSymbol'
                                    }).format(ok_qty);
                                var ok_qty_formatted = ok_qty_formatted.replace(/[$]/g, '');
                                $('#amount' + i).val(ok_qty_formatted);
                                $('#amount' + i).val(ok_qty_formatted);
                                var rej_qty = parseFloat(data[k].AMT) + parseFloat(rej_qty);
                                var rej_qty_formatted = new Intl.NumberFormat(
                                    'en-US', {
                                        style: 'currency',
                                        currency: 'USD',
                                        currencyDisplay: 'narrowSymbol'
                                    }).format(rej_qty);
                                var rej_qty_formatted = rej_qty_formatted.replace(/[$]/g, '');
                                $('#total').text(rej_qty_formatted);
                                $('#final_total_calc').val(rej_qty_formatted);
                                k++;
                            }
                            $('#order_form').on('focus', '.acc_desc', function() {
                                var target = event.target || event.srcElement;
                                var id = target.id;
                                var id = id.split("acc_desc");
                                id = id[1];
                                console.log(id);
                                var company_code = $('#company_code').val();
                                $('#ass_desc_table_add').dataTable().fnDestroy();
                                table = $('#ass_desc_table_add').DataTable({
                                    dom: 'Bfrtip',
                                    orderCellsTop: true,
                                    fixedHeader: true,
                                    buttons: [
                                        'copy', 'csv', 'excel', 'pdf', 'print',
                                    ]
                                });
                                $('#ass_desc_table_add thead tr:eq(1) th').each(function(i) {
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
                                    url: 'api/Inventory_management/inventory_locals/issues_loan_to_party_api.php',
                                    type: 'POST',
                                    data: {
                                        action: 'item_code',
                                        company_code: company_code
                                    },
                                    dataType: "json",
                                    success: function(response) {
                                        console.log(response);
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
                                $('#ass_descFormModelAdd').modal('show');
                                $('#ass_desc_table_add').on('click', '.even', function() {
                                    $('#detail' + id).val('');
                                    $('#detail' + i).val('');
                                    var item_code = $(this).closest('tr').children('td:nth-child(6)').text();
                                    var item_name = $(this).closest('tr').children('td:nth-child(2)').text();
                                    var div_code = $(this).closest('tr').children('td:nth-child(4)').text();
                                    var div_name = $(this).closest('tr').children('td:nth-child(5)').text();
                                    var gen_name = $(this).closest('tr').children('td:nth-child(6)').text();
                                    var um_name = $(this).closest('tr').children('td:nth-child(7)').text();
                                    $('#acc_desc' + id).val(item_code);
                                    $('#detail' + id).val(item_name);
                                    $('#ass_descFormModelAdd').modal('hide');
                                    $('#loc_i' + id).focus();
                                });
                                $('#ass_desc_table_add').on('click', '.odd', function() {
                                    $('#detail' + id).val('');
                                    $('#detail' + i).val('');
                                    var item_code = $(this).closest('tr').children('td:nth-child(6)').text();
                                    var item_name = $(this).closest('tr').children('td:nth-child(2)').text();
                                    var div_code = $(this).closest('tr').children('td:nth-child(4)').text();
                                    var div_name = $(this).closest('tr').children('td:nth-child(5)').text();
                                    var gen_name = $(this).closest('tr').children('td:nth-child(6)').text();
                                    var um_name = $(this).closest('tr').children('td:nth-child(7)').text();
                                    $('#acc_desc' + id).val(item_code);
                                    $('#detail' + id).val(item_name);
                                    $('#ass_descFormModelAdd').modal('hide');
                                    $('#loc_i' + id).focus();
                                });
                            });
                            $('#order_form').on('focus', '.loc_i', function() {
                                var button_id = $(this).attr("id");
                                var id = button_id.split("loc_i");
                                id = id[1];
                                var company_code = $('#company_code').val();
                                var item_code = $('#acc_desc' + id).val();
                                $('#location_add_table').dataTable().fnDestroy();
                                table = $('#location_add_table').DataTable({
                                    dom: 'Bfrtip',
                                    orderCellsTop: true,
                                    fixedHeader: true,
                                    buttons: [
                                        'copy', 'csv', 'excel', 'pdf', 'print',
                                    ]
                                });
                                $('#location_add_table thead tr:eq(1) th').each(function(i) {
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
                                    url: 'api/Inventory_management/inventory_locals/issues_loan_to_party_api.php',
                                    type: 'POST',
                                    data: {
                                        action: 'location_detail',
                                        company_code: company_code,
                                        item_code: item_code
                                    },
                                    dataType: "json",
                                    success: function(response) {
                                        console.log(response);
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
                                $('#location_addFormModel').modal('show');
                                $('#location_add_table').on('click', '.even',
                                    function() {
                                        var loc_code = $(this).closest('tr').children('td:nth-child(10)').text();
                                        var loc_name = $(this).closest('tr').children('td:nth-child(11)').text();
                                        $('.loc_i' + id).val(loc_code);
                                        $('#loc_name_').val(loc_name);
                                        $('#location_addFormModel').modal(
                                            'hide');
                                        $('#quantity' + id).focus();
                                    });
                                $('#location_add_table').on('click', '.odd',
                                    function() {
                                        var loc_code = $(this).closest('tr').children('td:nth-child(10)').text();
                                        var loc_name = $(this).closest('tr').children('td:nth-child(11)').text();
                                        $('.loc_i' + id).val(loc_code);
                                        $('#loc_name_').val(loc_name);
                                        $('#location_addFormModel').modal(
                                            'hide');
                                        $('#quantity' + id).focus();
                                    });
                            });
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
        var order_key = $("#sale_code").val();
        var co_name = $("#company_name").val();
        $("#ajax-loader").hide();
        let invoice_url = "invoicereports/issue_loan_to_party_report.php?action=print&co_code=" + co_code + "&doc_no=" + doc_no + "&doc_year=" + doc_year + "&order_key=" + order_key + "&company_name=" + co_name;
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
        $.get('inventory_management/inventory_local/issues_loan_to_party.php', function(data, status) {
            $("#content").html(data);
        });
    });
    $("#add_po_local_breadcrumb").on("click", function() {
        $.get('inventory_management/inventory_local/add_issues_loan_to_party.php', function(data, status) {
            $("#content").html(data);
        });
    });
</script>
<?php include '../../includes/loader.php' ?>