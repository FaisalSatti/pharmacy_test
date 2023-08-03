<?php
session_start();
?>
<style>
  #update_data:focus {
  background-color: black;
}
  #insert:focus {
  background-color: black;
}
input:focus,select:focus,textarea:focus,.select2-selection:focus, .add:focus, #submit:focus, .remove:focus{
-moz-box-shadow: 0 0 8px rgba(82,168,236,.6);
box-shadow: 0 0 8px #398ad7 !important;
border: 3px solid black;}


</style>

<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>User permissions</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="setup_breadcrumb">User Setup</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="cs_breadcrumb">User Permissions</button></li>
              </ol>
            </div>   
          </div>
        </div><!-- /.container-fluid -->
      </section>
      
      <div style="width:800px;line-height:0.7rem" class="card container p-2">
      <?php include '../display_message/display_message.php'?>
        <div style="height:40px" class="card-header p-2">
          <div class="card-title">
            <h3>User Rights:</h3>
          </div>
        </div>
        <div class="card-body">
          <form method="post" id="user_form">
    
    
            <div style="text-align: center;">
              <span id="msg" style="color: red;font-size: 13px;"></span>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-4 form-group">
                <label for="">User ID : </label>
                <span style="color: red">*</span>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  <select class="form-control  js-example-basic-single" id="user_name" name="user_name">
                  </select>
                </div>
              </div>
              <div class="col-sm-8 form-group">
                <label for="">User Name : </label>
                <span style="color: red">*</span>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                  </div>
                  <input readonly type="text" class="form-control" name="role_description" id="role_description"
                    placeholder="Role Description">
                </div>
              </div>
              <!-- <div class="col-sm-4 form-group">
                                    <label for="">Current Status : </label>
                                    <span style="color: red">*</span>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <select name="status" id="status" class="form-control">
                                            <option value="0" selected="" disabled="">Select Status</option>
                                            <option value="Active">Active</option>
                                            <option value="Deactive">Disable</option>
                                        </select>
                                    </div>
                                </div> -->
            </div>
            <div>
              <div class="card-body">
                <h4>User will have rights of : <span style="color: red">*</span></h4>
                <div class="row">
                  <div class="col-5 col-sm-3">
                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
                      aria-orientation="vertical" style="background-color:#f4f6f9;">
                      <!-- <a class="nav-link active" id="vert-tabs-dashboard-tab" data-toggle="pill" href="#vert-tabs-dashboard" role="tab" aria-controls="vert-tabs-dashboard" aria-selected="true">Dashboard</a>
                                        <a class="nav-link" id="vert-tabs-colleagues-tab" data-toggle="pill" href="#vert-tabs-colleagues" role="tab" aria-controls="vert-tabs-colleagues" aria-selected="false">Colleagues</a> -->
                      <a class="nav-link" id="vert-tabs-hrm-tab" data-toggle="pill" href="#vert-tabs-hrm" role="tab"
                        aria-controls="vert-tabs-hrm" aria-selected="false">Setup Files</a>
                      <a class="nav-link" id="vert-tabs-operation-tab" data-toggle="pill" href="#vert-tabs-operation"
                        role="tab" aria-controls="vert-tabs-operation" aria-selected="false">Financial Management</a>
                      <a class="nav-link" id="vert-tabs-finance-tab" data-toggle="pill" href="#vert-tabs-finance" role="tab" aria-controls="vert-tabs-finance" aria-selected="false">Sales Module</a>
                                         <a class="nav-link" id="vert-tabs-inventory-tab" data-toggle="pill" href="#vert-tabs-inventory" role="tab" aria-controls="vert-tabs-inventory" aria-selected="false">Inventory Module</a>
                                        <!--<a class="nav-link" id="vert-tabs-fixed-assets-tab" data-toggle="pill" href="#vert-tabs-fixed-assets" role="tab" aria-controls="vert-tabs-fixed-assets" aria-selected="false">Fixed Assets</a>
                                        <a class="nav-link" id="vert-tabs-setup-tab" data-toggle="pill" href="#vert-tabs-setup" role="tab" aria-controls="vert-tabs-setup" aria-selected="false">Setup</a> -->
                    </div>
                  </div>
                  <div class="col-7 col-sm-9">
                    <div class="tab-content" id="vert-tabs-tabContent">
    
                      <!-- <div class="tab-pane form-group fade show active" id="vert-tabs-dashboard" role="tabpanel" aria-labelledby="vert-tabs-dashboard-tab">
                                            <input type='checkbox' value='100' name='sec_a[]'> Dashboard</input>
                                          </div> -->
                      <!-- <div class="tab-pane form-group fade" id="vert-tabs-colleagues" role="tabpanel" aria-labelledby="vert-tabs-colleagues-tab">
                                            <input type='checkbox' value='200' name='sec_a[]'> Colleagues</input>
                                          </div> -->
                      <div class="tab-pane form-group fade" id="vert-tabs-hrm" role="tabpanel"
                        aria-labelledby="vert-tabs-hrm-tab">
                        <div class='row'>
                          <div class='col-md-12'>
                            <ul style='list-style: decimal;'>
                              <li>
                                <input type='checkbox' class='101 check' value='101' name='permissions[]'> <label>Company</label></input>
                              </li> 
                              <li>
                                <input type='checkbox' class='102 check' value='102' name='permissions[]'> <label>Zone</label></input>
                              </li>
                              <li>
                                <input type='checkbox' class='103 check' value='103' name='permissions[]'> <label>City</label></input>
                              </li>         
                              <li>
                                <input type='checkbox' class='104 check' value='104' name='permissions[]'> <label>Area</label></input>
                              </li>  
                              <li>
                                <input type='checkbox' class='105 check' value='105' name='permissions[]'> <label>Salesman</label></input>
                              </li>  
                              <li>
                                <input type='checkbox' class='106 check' value='106' name='permissions[]'> <label>Division</label></input>
                              </li>  
                              <li>
                                <input type='checkbox' class='107 check' value='107' name='permissions[]'> <label>Chart Of Accounts</label></input>
                              </li>  
                              <li>
                                <input type='checkbox' class='108 check' value='108' name='permissions[]'> <label>Customers</label></input>
                              </li>  
                              <li>
                                <input type='checkbox' class='109 check' value='109' name='permissions[]'> <label>Suppliers</label></input>
                              </li>  
                              <li>
                                <input type='checkbox' class='110 check' value='110' name='permissions[]'> <label>Items</label></input>
                              </li>  
                              <li>
                                <input type='checkbox' class='111 check' value='111' name='permissions[]'> <label>Unit</label></input>
                              </li>  
                              <li>
                                <input type='checkbox' class='112 check' value='112' name='permissions[]'> <label>Product</label></input>
                              </li>  
                              <li>
                                <input type='checkbox' class='113 check' value='113' name='permissions[]'> <label>Generic Names</label></input>
                              </li>  
                              <li>
                                <input type='checkbox' class='114 check' value='114' name='permissions[]'> <label>Department</label></input>
                              </li>  
                              <li>
                                <input type='checkbox' class='115 check' value='115' name='permissions[]'> <label>Location</label></input>
                              </li>  
                              <li>
                                <input type='checkbox' class='116 check' value='116' name='permissions[]'> <label>Vehicle</label></input>
                              </li>  
                              <li>
                                <input type='checkbox' class='117 check' value='117' name='permissions[]'> <label>Item Location</label></input>
                              </li>  
                              <li>
                                <input type='checkbox' class='118 check' value='118' name='permissions[]'> <label>Item Batch No</label></input>
                              </li>  
                              <li>
                                <input type='checkbox' class='119 check' value='119' name='permissions[]'> <label>City Report</label></input>
                              </li>  
                              <li>
                                <input type='checkbox' class='120 check' value='120' name='permissions[]'> <label>Area Report</label></input>
                              </li>  
                              <li>
                                <input type='checkbox' class='121 check' value='121' name='permissions[]'> <label>Chart Of Accounts List</label></input>
                              </li>  
                              <li>
                                <input type='checkbox' class='122 check' value='122' name='permissions[]'> <label>Party List By Code</label></input>
                              </li>  
                              <li>
                                <input type='checkbox' class='123 check' value='123' name='permissions[]'> <label>Party List By Division</label></input>
                              </li>  
                              <li>
                                <input type='checkbox' class='124 check' value='124' name='permissions[]'> <label>Agent Report</label></input>
                              </li>  
                              <li>
                                <input type='checkbox' class='125 check' value='125' name='permissions[]'> <label>Item list</label></input>
                              </li>  
                          
    
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane form-group fade" id="vert-tabs-operation" role="tabpanel"
                        aria-labelledby="vert-tabs-operation-tab">
                        <div class='row'>
                          <div class='col-md-12'>
                            <ul style='list-style: decimal;'>
                              <li>
                                <input type='checkbox' class='201 check' value='201' name='permissions[]'> <label>Accounting Vouchers</label></input>
                                <ul>
                                  <li><input type='checkbox' class='201a check' value='201a' name='permissions[]'> <label>Cash Receipt</label></input></li>
                                  <li>
                                    <input type='checkbox' class='201b check' value='201b' name='permissions[]'> <label>Cash Payment</label></input>
                                  </li>
                                  <li>
                                    <input type='checkbox' class='201c check' value='201c' name='permissions[]'>
                                    <label>Bank Receipt</label></input>
                                  </li>
                                  <li>
                                    <input type='checkbox' class='201d check' value='201d' name='permissions[]'>
                                    <label>Bank Payment</label></input>
                                  </li>
                                  <li>
                                    <input type='checkbox' class='201e check' value='201e' name='permissions[]'>
                                    <label>Journal Voucher</label></input>
                                  </li>
                                  <li>
                                    <input type='checkbox' class='201f check' value='201f' name='permissions[]'>
                                    <label>Voucher list</label></input>
                                  </li>
                                </ul>
                              </li>
                              <li>
                                <input type='checkbox' class='202 check' value='202' name='permissions[]'> <label>Process</label></input>
                                <ul>
                                  <li><input type='checkbox' class='202a check' value='202a' name='permissions[]'> <label>Post</label></input></li>
                                  <li>
                                    <input type='checkbox' class='202b check' value='202b' name='permissions[]'> <label>Un Post</label></input>
                                  </li>
                                </ul>
                              </li>
                              <li>
                                <input type='checkbox' class='203 check' value='203' name='permissions[]'> <label>MIS</label></input>
                                <ul>
                                  <li><input type='checkbox' class='203a check' value='203a' name='permissions[]'> <label>Online Ledger</label></input></li>
                                  <li>
                                    <input type='checkbox' class='203b check' value='203b' name='permissions[]'> <label>Trial Balanace</label></input>
                                  </li>
                                  <li>
                                    <input type='checkbox' class='203c check' value='203c' name='permissions[]'> <label>Profit & Loss</label></input>
                                  </li>
                                  <li>
                                    <input type='checkbox' class='203d check' value='203d' name='permissions[]'> <label>Balance Sheet</label></input>
                                  </li>
                                </ul>
                              </li>
                             
                              <!-- <li>
                                <input type='checkbox' class='208 check' value='208' name='transaction[]'>
                                <label>Transactions</label></input>
                                <ul>
                                <li >
                                    <input type='checkbox' class='208a check' value='208a' name='transaction[]'> <label>Order Soda</label></input>
                                  </li>
                                  <li class = "pt-2" ><input type='checkbox' class='208b check' value='208b' name='transaction[]'>Do Vouchers</input>
                                    <ul>
                                      <li class = "pt-2"><input type='checkbox' class='208b1 check' value='208b1' name='transaction[]'>Delivery Orders</input>
                                      <li class = "pt-2"><input type='checkbox' class='208b2 check' value='208b2' name='transaction[]'>DO Verify</input>
                                      <li class = "pt-2"><input type='checkbox' class='208b3 check' value='208b3' name='transaction[]'>Pending Dos</input>
                                      <li class = "pt-2"><input type='checkbox' class='208b4 check' value='208b4' name='transaction[]'>Pending Orders</input>
                                    </ul>
                                  </li>
                                  <li class = "pt-2">
                                    <input type='checkbox' class='208c check' value='208c' name='transaction[]'>
                                    <label>Local Purchase</label></input>
                                  </li>
                                  <li>
                                    <input type='checkbox' class='208d check' value='208d' name='transaction[]'>
                                    <label>Duty Paid Voucher</label></input>
                                  </li>
                                  <li>
                                    <input type='checkbox' class='208e check' value='208e' name='transaction[]'>
                                    <label>Sales Tax Invoice</label></input>
                                  </li>
                                  <li>
                                    <input type='checkbox' class='208f check' value='208f' name='transaction[]'>
                                    <label>Transfers</label></input>
                                  </li>
    
                                  <li>
                                    <input type='checkbox' class='208g check' value='208g' name='transaction[]'>
                                    <label>Transaction List</label></input>
                                  </li>
    
                                  <li>
                                    <input type='checkbox' class='208h check' value='208h' name='transaction[]'>
                                    <label>Order List</label></input>
                                  </li>
    
                                </ul>
                              </li> -->
    
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane form-group fade" id="vert-tabs-finance" role="tabpanel"
                        aria-labelledby="vert-tabs-finance-tab">
                        <div class='row'>
                          <div class='col-md-12'>
                            <ul style='list-style: decimal;'>
                              <li>
                                <input type='checkbox' class='301 check' value='301' name='permissions[]'> <label>Transaction Files</label></input>
                                <ul>
                                  <li><input type='checkbox' class='301a check' value='301a' name='permissions[]'> <label>Sale order</label></input></li>
                                  <li>
                                    <input type='checkbox' class='301b check' value='301b' name='permissions[]'> <label>Delivery Challan</label></input>
                                  </li>
                                  <li>
                                    <input type='checkbox' class='301c check' value='301c' name='permissions[]'>
                                    <label>Invoice Stax</label></input>
                                  </li>
                                  <li>
                                    <input type='checkbox' class='301d check' value='301d' name='permissions[]'>
                                    <label>Return Note</label></input>
                                  </li>
                                  <li>
                                    <input type='checkbox' class='301e check' value='301e' name='permissions[]'>
                                    <label>Credit Notes</label></input>
                                  </li>
                                  <li>
                                    <input type='checkbox' class='301f check' value='301f' name='permissions[]'>
                                    <label>Audit List</label></input>
                                  </li>
                                </ul>
                              </li>
                              <li>
                                <input type='checkbox' class='302 check' value='302' name='permissions[]'> <label>Reports</label></input>
                                <ul>
                                  <li><input type='checkbox' class='302a check' value='302a' name='permissions[]'> <label>Stock Position By Company</label></input></li>
                                  <li>
                                    <input type='checkbox' class='302b check' value='302b' name='permissions[]'> <label>Stock Position By Loc/Item</label></input>
                                  </li>
                                  <li>
                                    <input type='checkbox' class='302c check' value='302c' name='permissions[]'> <label>Net Sales Report</label></input>
                                  </li>
                                  <li>
                                    <input type='checkbox' class='302d check' value='302d' name='permissions[]'> <label>Net Sales Report By Item</label></input>
                                  </li>
                                  <li>
                                    <input type='checkbox' class='302e check' value='302e' name='permissions[]'> <label>Net Sales Report By Party</label></input>
                                  </li>
                                  <li>
                                    <input type='checkbox' class='302f check' value='302f' name='permissions[]'> <label>Daily Sales Collection</label></input>
                                  </li>
                                  <li>
                                    <input type='checkbox' class='302g check' value='302g' name='permissions[]'> <label>Pending Order</label></input>
                                  </li>
                                  <li>
                                    <input type='checkbox' class='302h check' value='302h' name='permissions[]'> <label>Debtor Summary</label></input>
                                  </li>
                                  <li>
                                    <input type='checkbox' class='302i check' value='302i' name='permissions[]'> <label>Stock leddger By Company</label></input>
                                  </li>
                                  <li>
                                    <input type='checkbox' class='302j check' value='302j' name='permissions[]'> <label>Stock Ledger By Loc / Item</label></input>
                                  </li>
                                  <li>
                                    <input type='checkbox' class='302k check' value='302k' name='permissions[]'> <label>Stock Ledger By Batch No</label></input>
                                  </li>
                                </ul>
                              </li>
                              <li>
                                <input type='checkbox' class='303 check' value='303' name='permissions[]'> <label>Process</label></input>
                                <ul>
                                  <li><input type='checkbox' class='303a check' value='303a' name='permissions[]'> <label>Post</label></input></li>
                                  <li>
                                    <input type='checkbox' class='303b check' value='303b' name='permissions[]'> <label>Un Post</label></input>
                                  </li>
                                </ul>
                              </li>
                             
                              <!-- <li>
                                <input type='checkbox' class='208 check' value='208' name='transaction[]'>
                                <label>Transactions</label></input>
                                <ul>
                                <li >
                                    <input type='checkbox' class='208a check' value='208a' name='transaction[]'> <label>Order Soda</label></input>
                                  </li>
                                  <li class = "pt-2" ><input type='checkbox' class='208b check' value='208b' name='transaction[]'>Do Vouchers</input>
                                    <ul>
                                      <li class = "pt-2"><input type='checkbox' class='208b1 check' value='208b1' name='transaction[]'>Delivery Orders</input>
                                      <li class = "pt-2"><input type='checkbox' class='208b2 check' value='208b2' name='transaction[]'>DO Verify</input>
                                      <li class = "pt-2"><input type='checkbox' class='208b3 check' value='208b3' name='transaction[]'>Pending Dos</input>
                                      <li class = "pt-2"><input type='checkbox' class='208b4 check' value='208b4' name='transaction[]'>Pending Orders</input>
                                    </ul>
                                  </li>
                                  <li class = "pt-2">
                                    <input type='checkbox' class='208c check' value='208c' name='transaction[]'>
                                    <label>Local Purchase</label></input>
                                  </li>
                                  <li>
                                    <input type='checkbox' class='208d check' value='208d' name='transaction[]'>
                                    <label>Duty Paid Voucher</label></input>
                                  </li>
                                  <li>
                                    <input type='checkbox' class='208e check' value='208e' name='transaction[]'>
                                    <label>Sales Tax Invoice</label></input>
                                  </li>
                                  <li>
                                    <input type='checkbox' class='208f check' value='208f' name='transaction[]'>
                                    <label>Transfers</label></input>
                                  </li>
    
                                  <li>
                                    <input type='checkbox' class='208g check' value='208g' name='transaction[]'>
                                    <label>Transaction List</label></input>
                                  </li>
    
                                  <li>
                                    <input type='checkbox' class='208h check' value='208h' name='transaction[]'>
                                    <label>Order List</label></input>
                                  </li>
    
                                </ul>
                              </li> -->
    
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane form-group fade" id="vert-tabs-inventory" role="tabpanel"
                        aria-labelledby="vert-tabs-inventory-tab">
                        <div class='row'>
                          <div class='col-md-12'>
                            <ul style='list-style: decimal;'>
                              <li>
                                <input type='checkbox' class='401 check' value='401' name='permissions[]'> <label>Inventory Local</label></input>
                                <ul>
                                  <li><input type='checkbox' class='401a check' value='401a' name='permissions[]'> <label>PO Local V2</label></input></li>
                                  <li>
                                    <input type='checkbox' class='401b check' value='401b' name='permissions[]'> <label>GRN local</label></input>
                                  </li>
                                  <li>
                                    <input type='checkbox' class='401c check' value='401c' name='permissions[]'>
                                    <label>Bill Local</label></input>
                                  </li>
                                  <li>
                                    <input type='checkbox' class='401d check' value='401d' name='permissions[]'>
                                    <label>Purchase Return</label></input>
                                  </li>
                                  <li>
                                    <input type='checkbox' class='401e check' value='401e' name='permissions[]'>
                                    <label>Service Voucher</label></input>
                                  </li>
                                  <li>
                                    <input type='checkbox' class='401f check' value='401f' name='permissions[]'>
                                    <label>Debit Voucher</label></input>
                                  </li>
                                  <li>
                                    <input type='checkbox' class='401g check' value='401g' name='permissions[]'>
                                    <label>Issue Requisition</label></input>
                                  </li>
                                  <li>
                                    <input type='checkbox' class='401h check' value='401h' name='permissions[]'>
                                    <label>Good Issue Notes</label></input>
                                  </li>
                                  <li>
                                    <input type='checkbox' class='401i check' value='401i' name='permissions[]'>
                                    <label>Issue Loan To Party</label></input>
                                  </li>
                                  <li>
                                    <input type='checkbox' class='401j check' value='401j' name='permissions[]'>
                                    <label>Issue Return From Party</label></input>
                                  </li>
                                  <li>
                                    <input type='checkbox' class='401k check' value='401k' name='permissions[]'>
                                    <label>Transfer</label></input>
                                  </li>
                                  <li>
                                    <input type='checkbox' class='401l check' value='401l' name='permissions[]'>
                                    <label>Transfer By Division</label></input>
                                  </li>
                                  <li>
                                    <input type='checkbox' class='401m check' value='401m' name='permissions[]'>
                                    <label>Production</label></input>
                                  </li>
                                </ul>
                              </li>
                              <li>
                                <input type='checkbox' class='402 check' value='402' name='permissions[]'> <label>Process</label></input>
                                <ul>
                                  <li><input type='checkbox' class='402a check' value='402a' name='permissions[]'> <label>Post</label></input></li>
                                  <li>
                                    <input type='checkbox' class='402b check' value='402b' name='permissions[]'> <label>Un Post</label></input>
                                  </li>
                                  
                                </ul>
                              </li>
                              <li>
                                <input type='checkbox' class='403 check' value='403' name='permissions[]'> <label>Mis Report</label></input>
                                <ul>
                                  <li><input type='checkbox' class='403a check' value='403a' name='permissions[]'> <label>Purchase Activity By Item</label></input></li>
                                  <li>
                                    <input type='checkbox' class='403b check' value='403b' name='permissions[]'> <label>Purchase Activity By Party</label></input>
                                  </li>
                                </ul>
                              </li>
                             
                              <!-- <li>
                                <input type='checkbox' class='208 check' value='208' name='transaction[]'>
                                <label>Transactions</label></input>
                                <ul>
                                <li >
                                    <input type='checkbox' class='208a check' value='208a' name='transaction[]'> <label>Order Soda</label></input>
                                  </li>
                                  <li class = "pt-2" ><input type='checkbox' class='208b check' value='208b' name='transaction[]'>Do Vouchers</input>
                                    <ul>
                                      <li class = "pt-2"><input type='checkbox' class='208b1 check' value='208b1' name='transaction[]'>Delivery Orders</input>
                                      <li class = "pt-2"><input type='checkbox' class='208b2 check' value='208b2' name='transaction[]'>DO Verify</input>
                                      <li class = "pt-2"><input type='checkbox' class='208b3 check' value='208b3' name='transaction[]'>Pending Dos</input>
                                      <li class = "pt-2"><input type='checkbox' class='208b4 check' value='208b4' name='transaction[]'>Pending Orders</input>
                                    </ul>
                                  </li>
                                  <li class = "pt-2">
                                    <input type='checkbox' class='208c check' value='208c' name='transaction[]'>
                                    <label>Local Purchase</label></input>
                                  </li>
                                  <li>
                                    <input type='checkbox' class='208d check' value='208d' name='transaction[]'>
                                    <label>Duty Paid Voucher</label></input>
                                  </li>
                                  <li>
                                    <input type='checkbox' class='208e check' value='208e' name='transaction[]'>
                                    <label>Sales Tax Invoice</label></input>
                                  </li>
                                  <li>
                                    <input type='checkbox' class='208f check' value='208f' name='transaction[]'>
                                    <label>Transfers</label></input>
                                  </li>
    
                                  <li>
                                    <input type='checkbox' class='208g check' value='208g' name='transaction[]'>
                                    <label>Transaction List</label></input>
                                  </li>
    
                                  <li>
                                    <input type='checkbox' class='208h check' value='208h' name='transaction[]'>
                                    <label>Order List</label></input>
                                  </li>
    
                                </ul>
                              </li> -->
    
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 text-right">
                <button type="submit" class="btn btn-info mt-2 btn-sm" id="insert-btn">
                  <i class="fa fa-plus"></i>
                </button>
              </div>
            </div>
          </form>
          <div style="text-align: center;">
            <span id="msg" style="color: red;font-size: 13px;"></span>
          </div>
        </div>
      </div>

<script>


$(function () {
      $.validator.setDefaults({
        submitHandler: function () {
          // alert( "Form successful submitted!" );
        }
      });
      $('#user_form').validate({
        rules: {
          user_name: {
            required: true,
          },
          // password: {
          //   required: true,
          // }
          // role: {
          //   required: true,
          // }
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
    var company;
    $(document).ready(function () {

      $('.js-example-basic-single').select2();
      // user name drop down
      $.ajax({
        url: 'api/user_setup/user_ajax.php',
        type: 'POST',
        data: { action: 'username' },
        dataType: "json",
        success: function (response) {
          // console.log(response);
          $('#user_name').html('');
          $('#user_name').append('<option selected disabled>Select User</option>');
          $.each(response, function (key, value) {
            $('#user_name').append('<option value = "' + value["user_id"] + '"  data-name="' + value["user_name"] + '"  data-code="' + value["user_id"] + '">' + value["user_id"] + ' - ' + value["user_name"] + '</option>');
          });
        },
        error: function (error) {
          console.log(error);
          alert("Contact IT Department");
        }
      });
      // On change user name 
      $("#user_form").on('change', '#user_name', function () {
        // console.log("djdmd");
        var userName = $('.js-example-basic-single').find(':selected').attr("data-name");
        var userId = $('.js-example-basic-single').find(':selected').attr("data-code");
        $('#select2-user_name-container').html(userId);
        $('#role_description').val(userName);
        var rights1 = document.getElementsByClassName("check");
        $.each(rights1, function (key, value) {
        //   console.log(value);
          $(value).prop('checked', false);
        });
        $.ajax({
          url: 'api/user_setup/user_ajax.php',
          type: 'POST',
          data: { action: 'rights', userid: userId },
          dataType: "json",
          success: function (response) {
            console.log(response);
            if (response.status != 0) {

              var section1 = response.permissions.split(",");
              
              if (section1 != '') {
                $.each(section1, function (key, value) {
                console.log(value);
                $('.'+value).prop('checked','checked');
                  // document.querySelector('.'+value+'').checked = true;
                });
              }

            }

          },
          error: function (error) {
            console.log(error);
            alert("Contact IT Department");
          }
        });

      });



    });
    $("#user_form").on("submit", function (e) {
      if ($("#user_form").valid()) {
        var formData = new FormData(this);
        formData.append('action', 'permission');
        $.ajax({
          url: 'api/user_setup/user_ajax.php',
          type: 'POST',
          data: formData,
          contentType: false,
          cache: false,
          processData: false,
          success: function (response) {
                  var message = response.message
                  var status = response.status
                  if(status == 0){
                    $("#msg").html(message);
                  }else{
                    $("#msg").html('');
                    $.ajax({
                        url: "api/message_session/message_session.php",
                        type: 'POST',
                        data: {message:message,status:status},
                        success: function (response) {
                          $.get('user_setup/user_permissions.php',function(data,status){
                              $('#content').html(data);
                          });
                        },
                        error: function(e) 
                        {
                          console.log(e);
                          alert("Contact IT Department");
                        }
                    });
                  }
          },
          error: function (e) {
            console.log(e);
            alert("Contact IT Department");
          }
        });
      } else {
        console.log("noooooooo");
      }
    });
  

// breadcrumbs
$('#dashboard_breadcrumb').click(function(){
    $.get('dashboard_main/dashboard_main.php',function(data,status){
        $('#content').html(data);
    });
});
$("#setup_breadcrumb").on("click", function () {
    $.get('user_setup/user_setup.php', function(data,status){
        $("#content").html(data);
    });
});
$("#cs_breadcrumb").on("click", function () {
  $.get('user_setup/user_permissions.php', function(data,status){
            $("#content").html(data);
    });
});

</script>
<?php include '../includes/loader.php'?>