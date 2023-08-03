<?php
session_start();
?>
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header" style="margin-top: -10px;">
        <div class="container-fluid">
          <div class="row mb-1">
            <div class="col-sm-6">
              <h1>Good Issue Notes</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="il_breadcrumb"> Inventory Local</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="gin_list_breadcrumb"> Good Issue Notes List</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="add_gin_local_breadcrumb" disabled>Edit Good Issue Notes</button></li>
              </ol>
            </div>   
          </div>
        </div>
      </section>

     
      <!-- Main content -->
      </section>

<br>
 <!-- Main content -->
<section class="content">
 <div class="container-fluid">
     <div class="row" style="margin-top:-23px">
         <div class="col-12">
             <div class="card">
               <div class="card-body" style="padding:7px">
                   <div class="container">
                     <form method = "post" id = "order_form">
                       <?php include '../../display_message/display_message.php'?>
                           <div class="row" style="border: 1px solid gray; border-radius: 5px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.29);">
                               <div  class="col-lg-12">
                               <style>
body{
form:90%;
} 
.select2-container--default .select2-selection--single{
width:100% !important
}  
input:focus,select:focus,textarea:focus,.select2-selection:focus, .add:focus, #submit:focus, .remove:focus{
-moz-box-shadow: 0 0 8px rgba(82,168,236,.6);
box-shadow: 0 0 8px orangered !important;
border: 3px solid black;}
.bal_msg{
  display:none;
  color:red;
}
/* select{
width:82% !important;
} */
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
.form-control:focus{
-moz-box-shadow: 0 0 8px rgba(82,168,236,.6);
box-shadow: 0 0 8px orangered !important;
}
input:focus, .select2-container:focus, .select:focus{
-moz-box-shadow: 0 0 8px rgba(82,168,236,.6);
box-shadow: 0 0 8px orangered !important;
}
textarea:focus{
-moz-box-shadow: 0 0 8px rgba(82,168,236,.6);
box-shadow: 0 0 8px orangered !important;
}
input,select,textarea,.select2-selection{
border:1px solid black !important;
}
input:focus,select:focus,textarea:focus,.select2-selection:focus{
-moz-box-shadow: 0 0 8px rgba(82,168,236,.6);
box-shadow: 0 0 8px orangered !important;}
.input-group-prepend{
/* border-right:2px solid black !important */
}
.select2-hidden-accessible{
border:1px solid black !important;

}
.select2-selection{
background-color: #b7edea !important  
}
h2 {
color: black;
font-size: 34px;
position: relative;
text-transform: uppercase;
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
0%,10%,100% {
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
/* border: 1px solid #dddddd; */
text-align: left;
font-size:15px
}
/* tr:nth-child(even) {
background-color: #dddddd;
} */
/* .select2-container{
width:76% !important;
} */
.amount::placeholder { 
text-align:right !important
}
@media only screen and (min-width: 250px) and (max-width: 350px) {
.select2-container{
width:80% !important;
}
}
@media only screen and (min-width: 350px) and (max-width: 754px) {
.select2-container{
width:85% !important;
}
}
@media screen and (min-width: 766px) and (max-width:994px) {
.select2-container{
/* width:72% !important; */
} 
}
td .select2-container{
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
color:white
}#salesman{
background-color:#afafaf85;
}
#party{
background-color:#afafaf85;
}
td input{
font-size:12px !important;
}.select2-selection__rendered,.select2-results{
font-size:12px !important;
}
.form-group{
margin-bottom:4px !important
}
.modal-backdrop{
display:none;
}
</style>
                                   <div class="row" style="border-radius:4px;border  :2px solid #1e293b; padding-top:8px;box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
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
                                           <input type="text" name="doc_no" style="background-color: #ccd4e1;font-weight:bold;" tabindex="-1" id="doc_no" class="form-control form-control-sm" placeholder="Voucher No" readonly>
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
                                    <div class="col-md-2 col-lg-1 form-group">
                                            <label>Do Key:</label> 
                                        </div>
                                        <div class="col-md-4 col-lg-2 form-group">
                                            <!-- <label for=""> Date :</label><span style="color:red;">*</span> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input type="text" name="do_key" id="do_key" style="background-color: #ccd4e1;font-weight:bold;" class="form-control form-control-sm" readonly tabindex="-1">
                                            </div>
                                        </div>
                                   <div class="col-md-2 col-lg-1 form-group">
                                            <label>Year:</label> 
                                        </div>
                                        <div class="col-md-4 col-lg-2 form-group">
                                            <!-- <label for=""> Date :</label><span style="color:red;">*</span> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input type="text" name="year" id="year" tabindex="-1" class="form-control form-control-sm" style="background-color: #ccd4e1;font-weight:bold;">
                                            </div>
                                        </div>
                                   <div class="col-md-2 col-lg-1 form-group">
                                       <label>Company:</label> 
                                   </div>
                                   <div class="col-md-4 col-lg-2 form-group">
                                       <!-- <label for="">Company Code :<span style="color:red">*</span></label> -->
                                       <div class="input-group">
                                           <div class="input-group-prepend">
                                               <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                           </div>
                                           <input maxlength="30" tabindex="-1" type="text" name="company_code" style="background-color: #ccd4e1;font-weight:bold;" id="company_code" class="form-control form-control-sm" placeholder="Select Company" readonly>
                                           
                                       </div>
                                   </div>
                                   <!-- company name -->
                                   <div class="col-md-6 col-lg-3 form-group">
                                       <!-- <label for="inputCompanyName">Company Name :</label><span style="color:red;">*</span> -->
                                       <div class="input-group">
                                           <div class="input-group-prepend">
                                               <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                           </div>
                                           <input tabindex="-1"  type="text" name="company_name" style="background-color: #ccd4e1;font-weight:bold;" id="company_name" class="form-control form-control-sm" placeholder="Company Name" readonly >
                                       </div>
                                   </div>
                                   <div class="col-md-2 col-lg-1 form-group">
                                       <label>PO NO:</label> 
                                   </div>
                                   <div class="col-md-4 col-lg-2 form-group">
                                       <!-- <label for="">Company Code :<span style="color:red">*</span></label> -->
                                       <div class="input-group">
                                           <div class="input-group-prepend">
                                               <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                           </div>
                                           <input tabindex="-1"  maxlength="30" type="text" name="po_no" style="background-color: #ccd4e1;font-weight:bold;" id="po_no" class="form-control form-control-sm" placeholder="Select PO" readonly>
                                           
                                       </div>
                                   </div>
                                   <div class="col-md-2 col-lg-1 form-group">
                                       <label>PO Cat:</label> 
                                   </div>
                                   <div class="col-md-4 col-lg-2 form-group">
                                       <!-- <label for="">PO Catg L/I :<span style="color:red">*</span></label> -->
                                       <div class="input-group">
                                           <div class="input-group-prepend">
                                               <span class="input-group-text"><i class="fas fa-list-alt"></i></span>
                                           </div>
                                           <!-- <select style="width:73% !important" title="purchase mode" name="purchase_mode" class="form-control form-control-sm" id="purchase_mode" >
                                               <option value="">Select PO</option>
                                               <option value="I">I</option>
                                               <option value="L">L</option>
                                           </select>                                 -->
                                           <input tabindex="-1"  tabindex="-1" type="text" name="purchase_mode" style="background-color: #ccd4e1;font-weight:bold;" id="purchase_mode" class="form-control form-control-sm" placeholder="purchase mode " readonly >
                                           
                                       </div>
                                   </div>
                                   <div class="col-md-2 col-lg-1 form-group">
                                       <label>Division:</label> 
                                   </div>
                                   <div class="col-md-4 col-lg-2 form-group">
                                       <!-- <label for="">Division :<span style="color:red">*</span></label> -->
                                       <div class="input-group">
                                           <div class="input-group-prepend">
                                               <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                           </div>
                                           <input tabindex="-1"  pattern="[a-zA-Z0-9 ,._-]{1,}" tabindex="-1"  maxlength="30" type="text" name="div" style="background-color: #ccd4e1;font-weight:bold;" id="div" class="form-control form-control-sm" placeholder="Division Name" readonly >
                                                         
                                       </div>
                                   </div>
                                  
                                   <div class="col-md-6 col-lg-3 form-group">
                                       <!-- <label for="">Division :<span style="color:red">*</span></label> -->
                                       <div class="input-group">
                                           <div class="input-group-prepend">
                                               <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                           </div>
                                           <input tabindex="-1"  tabindex="-1"  type="text" name="div_name" style="background-color: #ccd4e1;font-weight:bold;" id="div_name" class="form-control form-control-sm" placeholder="Division Name" readonly >
                                                     
                                       </div>
                                   </div>
                                   <div class="col-md-2 col-lg-1 form-group">
                                       <label>OrderRef#:</label> 
                                   </div>
                                   <div class="col-md-4 col-lg-2 form-group">
                                       <!-- <label for="">CO Ref :</label> -->
                                       <div class="input-group">
                                           <div class="input-group-prepend">
                                               <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                           </div>
                                           <input  type="text" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px;" name="OrderRef" id="OrderRef" class="form-control form-control-sm" placeholder=" Order Reference " >
                                       </div>
                                   </div>
                                   <div class="col-md-2 col-lg-1 form-group">
                                       <label>DC Ref#</label> 
                                   </div>
                                   <div class="col-md-4 col-lg-2 form-group">
                                       <!-- <label for="">CO Ref :</label> -->
                                       <div class="input-group">
                                           <div class="input-group-prepend">
                                               <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                           </div>
                                           <input  type="text" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px;" name="PartyRef" id="PartyRef" class="form-control form-control-sm" placeholder="DC Reference" >
                                       </div>
                                   </div>
                                   
                                   <div class="col-md-2 col-lg-1 form-group">
                                       <label>DEPT#:</label> 
                                   </div>
                                   <div class="col-md-4 col-lg-2 form-group">
                                       <div class="input-group">
                                           <div class="input-group-prepend">
                                               <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                           </div>
                                           <input tabindex="-1"  tabindex="-1" style="background-color: #ccd4e1;font-weight:bold;"  readonly maxlength="30" type="text" name="v_no" id="v_no" class="form-control form-control-sm" placeholder="DEPT NO" >
                                       </div>
                                   </div>
                                   <div class="col-md-6 col-lg-3 form-group">
                                       <!-- <label for="">Party :<span style="color:red">*</span></label> -->
                                       <div class="input-group">
                                           <div class="input-group-prepend">
                                               <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                           </div>
                                           <input tabindex="-1"  type="text" tabindex="-1" name="name_p" id="name_p" style="background-color: #ccd4e1;font-weight:bold;" class="form-control form-control-sm" tabindex="-1" placeholder="DEPT Name" readonly>
                                       </div>
                                   </div>
                                  
                                   <!-- Address -->
                                   

                                 
                                    <!-- Narration -->
                                    <div class="col-md-1 col-lg-1 form-group">
                                       <label>Remarks:</label> 
                                   </div>
                                   <div class="col-md-5 col-lg-5  form-group">
                                       <!-- <label for="">Narration :</label> -->
                                       <div class="input-group">
                                           <div class="input-group-prepend">
                                               <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                           </div>
                                           <textarea rows="1" name="narration" id="narration" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px;" class="form-control form-control-sm" placeholder="Narration" ></textarea>
                                       </div>
                                   </div>


                                   
                                   </div>
                               </div>                              
                           </div>
                         <br>
                           <div class="row justify-content-center">
                               <div class="col-sm-12">
                                   <div style="height:20px" class="loading">
                                     <span style="text-align:center;font-weight:bold;">Order Details</span>
                                   </div><br>
                               </div>
                           </div>
                         <div class="card">
                           <br>
                           <center><span class="bal_msg"><i class="fas fa-exclamation-circle"></i>Quantity can't be greater than Balance</span></center>
                                 <table id="example1" class="table table-bordered table-responsive" style="border: 1px solid gray; border-radius: 5px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.29); width: 100%;">
                                 <thead>
                                     <tr>
                                           <th>Item  Code</th>
                                         <th>Name</th>
                                         <th>Loc</th>
                                         <th>Quantity</th>
                                         <th>Rate</th>
                                         <th>Amount</th> 
                                         <th>Batch No</th>
                                         <th>Expiry Dt</th>
                                         <th>Action</th>
                                     </tr>
                                 </thead>
                                 <tbody id="d_items">
                                   <tr id="main_tr" class="tr">
                                       <td ><select name="" id = "order" class="js-example-basic-single order" style="width:75px;"></select></td>
                                       <td ><textarea style="height:35px;background-color:#c1c1c1;width:200px;background-color:#ccd4e1;"tabindex="-1" rows="1"   name="" id = "item_name" placeholder="Item Name" class="item_name" readonly></textarea></td>
                                       <td ><input  style="text-align:rigdht; padding:0 2px 0 0;height:35px;width:75px;background-color:#ccd4e1;" readonly tabindex="-1" type="number" placeholder="Location" name="" id="loc" class="loc" readonly></td>
                                       <td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:105px;" type="number"  name="" id="quantity" placeholder="0" class="quantity"></td>
                                       <td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:105px;" type="text"  name="" id="rate" placeholder="0.00" class="rate"></td>
                                       <td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:150px;background-color:#ccd4e1;" placeholder="0.00" readonly tabindex="-1" pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="" id = "amount" class="amount"></td>
                                       <td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;background-color:#ccd4e1;width:130px;" placeholder="Batch No." tabindex="-1"   type="text" tabindex="-1"  name="" id = "batch_no" class="batch_no" readonly></td>
                                       <td ><textarea  style="height:35px;background-color:#ccd4e1;font-size:12px;width:140px;" tabindex="-1"  type="text" placeholder="Expiry Date" name="" id = "expiry" class="expiry" readonly></textarea></td>
                                       <td ><button type = "button" class="btn btn-sm btn-primary add"><i class="fa fa-plus"></i></button></td>
                                       <td ><textarea  style="display:none;"  pattern="[a-zA-Z0-9 ,._-]{1,}" type="text"  name="" id = "balance" class="balance" readonly></textarea></td>
                                   </tr>
                                 </tbody>
                                     <tr id="last_tr">
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td style="text-align:right;">Total:</td>
                                         <td style="font-weight:bold; text-align: right;" name="total" id="total"><b>0</b></td>
                                         <td></td>
                                       
                                         <td></td>
                                         <td></td>
                                     </tr>
                             </table>
                             <!-- <br> -->

                             <div class="row">
                                       <div class="col-md-6">
                                           <table>
                                               <tr>
                                                   <td>
                                                       <!-- <div class="col-md-12 form-group"></div> -->
                                                       <div class="row">
                                                         
                                                           <div class="col-sm-12"><input style="background-color: #ccd4e1;" tabindex="-1" type="text"  placeholder="Lot Code" name="" id="lot_code" class="form-control" readonly></div>
                                                           <div class="col-md-12 form-group"></div>
                                                           <div class="col-sm-12"><input style="background-color: #ccd4e1;" tabindex="-1" type="text" placeholder="Lot Code 2"  name="" id="lot_code2" class="form-control" readonly></div>
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
                                        <div class="col-md-10"></div>
                                        <div class="col-sm-1 text-right">
                                            <a id="report" type="button" value="Submit"
                                                class="btn btn-info toastrDefaultSuccess"><i
                                                    style="font-size:20px" class="fa fa-file"></i></a>
                                        </div>
                                        <div class="col-sm-1 text-right">
                                            <button id="submit" type="submit" value="Submit"
                                                class="btn btn-primary toastrDefaultSuccess"><i
                                                    style="font-size:20px" class="fa fa-plus"></i></button>
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
<div class="modal fade" id="poFormModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
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
              <table class="table" id="po_table">
                <thead>
                  <tr>
                    <th>DEPT NAME</th>
                    <th>REFNUM </th>
                    <th>DOC DATE</th>
                    <th>ORDER KEY</th>
                  </tr>
                </thead>
              </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
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
<div class="modal fade" id="PartyFormModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
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
$(document).ready(function(){
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
    });
    $("#order_form").on('change','.rate',function(){

        // $('#disc_m').attr('readonly',false);
        // $('#frt_m').attr('readonly',false);
        // $('#excl_m').attr('readonly',false);
        var previous_amounts=sessionStorage.getItem('previous_amount');
        // var previous_discs=sessionStorage.getItem('previous_disc');
        // var previous_frts=sessionStorage.getItem('previous_frt');
        // console.log(previous_amounts);
        if(previous_amounts == ""){
            previous_amount=0;
        }else{
            previous_amount = previous_amounts.replaceAll(',','');
        }
        var total=$('#total').text();
        console.log(total);
        if(total == '' || total == '0' || total=='0.00'){
            minuss=0;
        }else{
            minus_t = total.replaceAll(',','');
            minuss= parseFloat(minus_t) - parseFloat(previous_amount);
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
        if(button_id =='rate'){
            rate_id='';
        }else{
        var rateid = button_id.split("e");
        rate_id=rateid[1];
        }
        var quantity=$('#quantity'+rate_id).val();
        var rate=$('#rate'+rate_id).val();
        if(quantity=='' || quantity=='0' || quantity=='0.00'){
            quantity=0;
            $('#amount'+rate_id).val('');
            // $('#excl'+rate_id).val('');
            $('#total').html(minuss);
            // $('#excl_t').html(minuss);
            
        }else{
            if(rate == "" || rate=='0' || rate=='0.00'){
                // console.log("if");
                $('#amount'+rate_id).val('');
                // $('#excl'+rate_id).val('');
                $('#total').html(minuss);
                pre_rate=0;
                amts=0;
                // $('#excl_t').html(minuss);
                // $('#total').text('');
            }else{
                    pre_rate = rate.replaceAll(',','');
                    var rate=new Intl.NumberFormat(
                    'en-US', { style: 'currency', 
                        currency: 'USD',
                    currencyDisplay: 'narrowSymbol'}).format(pre_rate);
                    var rate=rate.replace(/[$]/g,'');
                    var  show_rate=rate;
                    // console.log(show_rate);
                    $('#rate'+rate_id).val(show_rate);
                    // $('#excl_m'+rate_id).attr('readonly',false);
                    // $('#disc_m'+rate_id).attr('readonly',false);
                    // $('#frt_m'+rate_id).attr('readonly',false);
            }
                var amts=parseFloat(quantity) * parseFloat(pre_rate);
                // console.log(amts)
                var org_amt=new Intl.NumberFormat(
                'en-US', { style: 'currency', 
                currency: 'USD',
                currencyDisplay: 'narrowSymbol'}).format(amts);
                var org_amt=org_amt.replace(/[$]/g,'');
                $('#amount'+rate_id).val(org_amt);
                // $('#excl'+rate_id).val(org_amt);
                var amount=$('#amount'+rate_id).val();
                // console.log(org_amt);
                // if (amount.indexOf(',') > -1) {
                if(amount=='' || amount=='0' || amount=='0.00') {
                    pre_amount=0;
                }else{
                    pre_amount = amount.replaceAll(',','');
                    var amount=new Intl.NumberFormat(
                    'en-US', { style: 'currency', 
                        currency: 'USD',
                    currencyDisplay: 'narrowSymbol'}).format(pre_amount);
                    var amount=amount.replace(/[$]/g,'');
                    var  show_amount=amount;
                }
                var fnf=parseFloat(minuss) +parseFloat(pre_amount);
                var total=new Intl.NumberFormat(
                'en-US', { style: 'currency', 
                currency: 'USD',
                currencyDisplay: 'narrowSymbol'}).format(fnf);
                var total=total.replace(/[$]/g,'');
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
   
    $("#order_form").on('focus','.quantity',function(){
        var button_id = $(this).attr("id");
        if(button_id =='quantity'){
        var p_quantity_id='';
        }else{
        var p_amountid = button_id.split("y");
        var p_quantity_id=p_amountid[1];
        }
        var previous_amount= $('#amount'+p_quantity_id).val();
        sessionStorage.setItem("previous_amount", previous_amount);
        var previous_quantity= $('#quantity'+p_quantity_id).val();
        sessionStorage.setItem("previous_qty", previous_quantity);
        var previous_tq= $('#total_q').text();
        sessionStorage.setItem("previous_tq", previous_tq);
    });
    $("#order_form").on('change','.quantity',function(){
       
       var previous_amounts=sessionStorage.getItem('previous_amount');
       var previous_qtys=sessionStorage.getItem('previous_qty');
       var previous_tq=sessionStorage.getItem('previous_tq');
       // console.log(previous_amounts);
       if(previous_tq == ""){
           previous_tq=0;
       }
       if(previous_amounts == ""){
           previous_amount=0;
       }else{
           previous_amount = previous_amounts.replaceAll(',','');
       }
       if(previous_qtys == ""){
           previous_qty=0;
       }else{
           previous_qty = previous_qtys.replaceAll(',','');
       }
       // var total_q=$('#total_q').val();
       // if(total_q == '' || total_q == '0' || total_q=='0.00'){
       //     minus_t_q=0;
       // }else{
       //     minus_t_q = total_q.replaceAll(',','');
       // }
       minuss_q= parseFloat(previous_tq) - parseFloat(previous_qty);
       console.log(previous_tq);
       console.log(previous_qty);
       console.log(minuss_q);
       var total=$('#total').text();
       if(total == '' || total == '0' || total=='0.00'){
           minuss=0;
       }else{
           minus_t = total.replaceAll(',','');
           minuss= parseFloat(minus_t) - parseFloat(previous_amount);
           // console.log(minuss);
       }

       var button_id = $(this).attr("id");
       if(button_id =='quantity'){
           quantity_id='';
       }else{
       var quantityid = button_id.split("y");
       quantity_id=quantityid[1];
       }
       var quantity=$('#quantity'+quantity_id).val();
       var rate=$('#rate'+quantity_id).val();
       if(quantity=='' || quantity=='0' || quantity=='0.00'){
           quantity=0;
           $('#amount'+quantity_id).val('');
           // $('#excl'+quantity_id).val('');
           $('#total').html(minuss);
           // $('#excl_t').html(minuss);
           
       }else{
           if(rate == "" || rate=='0' || rate=='0.00'){
               // console.log("if");
               $('#amount'+quantity_id).val('');
               // $('#excl'+quantity_id).val('');
               $('#total').html(minuss);
               pre_rate=0;
               amts=0;
               // $('#excl_t').html(minuss);
               // $('#total').text('');
           }else{
                   pre_rate = rate.replaceAll(',','');
                   var rate=new Intl.NumberFormat(
                   'en-US', { style: 'currency', 
                       currency: 'USD',
                   currencyDisplay: 'narrowSymbol'}).format(pre_rate);
                   var rate=rate.replace(/[$]/g,'');
                   var  show_rate=rate;
                   // console.log(show_rate);
                   $('#rate'+quantity_id).val(show_rate);
                   // $('#excl_m'+quantity_id).attr('readonly',false);
                   // $('#disc_m'+quantity_id).attr('readonly',false);
                   // $('#frt_m'+quantity_id).attr('readonly',false);
           }
           
           var quantity=$('#quantity'+quantity_id).val();

           var total_balance=$('#balance'+quantity_id).val();

           if(quantity=='' || quantity=='0' || quantity=='0.00'){
             quantity=0;
           }else{
             quantity = quantity.replaceAll(',','');
           }
           console.log(total_balance);
           console.log(quantity);
           if(parseInt(total_balance) < parseInt(quantity)){
               // alert("yes")
               // var zero = 0;
               var amtcheck = $('#amount'+quantity_id).val();
               var totalcheck = $('#total').text();
               amtcheck=amtcheck.replaceAll(',','');
               totalcheck=totalcheck.replaceAll(',','');
               console.log(totalcheck);
               console.log(amtcheck);
               var final_check = parseInt(totalcheck) - parseInt(amtcheck);
               console.log(final_check);
               var finalformatfinal_check = new Intl.NumberFormat(
                 'en-US', {
                 style: 'currency',
                 currency: 'USD',
                 currencyDisplay: 'narrowSymbol'
                 }).format(final_check);

              final_check = finalformatfinal_check.replace(/[$]/g, '');
               $('#total').text(final_check);
               $('#amount'+quantity_id).val(0);
               $('#quantity'+quantity_id).focus();
               $('#quantity'+quantity_id).val('');
               $('.bal_msg').css('display','block');
               
               $('#quantity'+quantity_id).css('background','pink');
               
               var total_qty=new Intl.NumberFormat(
               'en-US', { style: 'currency', 
                   currency: 'USD',
                   currencyDisplay: 'narrowSymbol'}).format(quantity);
                   var total_qty=total_qty.replace(/[$]/g,'');
           }else{
               // alert("no")
               $('.bal_msg').css('display','none');

               $('#quantity'+quantity_id).css('background','transparent');

               var amts=parseFloat(quantity) * parseFloat(pre_rate);
               // console.log(amts)
               var org_amt=new Intl.NumberFormat(
               'en-US', { style: 'currency', 
               currency: 'USD',
               currencyDisplay: 'narrowSymbol'}).format(amts);
               var org_amt=org_amt.replace(/[$]/g,'');
               $('#amount'+quantity_id).val(org_amt);
               // $('#excl'+quantity_id).val(org_amt);
               var amount=$('#amount'+quantity_id).val();
               // console.log(org_amt);
               // if (amount.indexOf(',') > -1) {
               if(amount=='' || amount=='0' || amount=='0.00') {
                   pre_amount=0;
               }else{
                   pre_amount = amount.replaceAll(',','');
                   var amount=new Intl.NumberFormat(
                   'en-US', { style: 'currency', 
                       currency: 'USD',
                   currencyDisplay: 'narrowSymbol'}).format(pre_amount);
                   var amount=amount.replace(/[$]/g,'');
                   var  show_amount=amount;
               }
               var fnf=parseFloat(minuss) +parseFloat(pre_amount);
               var total=new Intl.NumberFormat(
               'en-US', { style: 'currency', 
               currency: 'USD',
               currencyDisplay: 'narrowSymbol'}).format(fnf);
               var total=total.replace(/[$]/g,'');
               // console.log(total);
               $('#total').html(total);
               // $('#excl_t').html(total);
               // $('#amount'+quantity_id).val(show_amount);
               
           }

               
       }
       console.log(quantity);
       // console.log(minuss_q);
       var t_qty=parseInt(quantity)+parseInt(minuss_q);
       $('#total_q').text(t_qty);
       total_amount=fnf;
       
       // $('#disc_t').html(minuss_d);
       // $('#frt_t').html(minuss_f);
       // $('#disc_m'+rate_id).val('');
       // $('#frt_m'+rate_id).val('');
       // $('#excl_m'+rate_id).val('');
       // $('#disc'+rate_id).val('');
       // $('#frt'+rate_id).val('');


   });
});

$('#voucher_date').on( 'keyup', function( e ) {
    if( e.which == 9 ) {
        $('#OrderRef').focus();
    }
} );


$('#view_party').click(function(){
    var party_code=$('#party').val();
    if(party_code !=''){
        // document no dropdown
        $.ajax({
            url: 'api/sales_module/transaction_files/sales_order_api.php',
            type: 'POST',
            data: {action: 'party_detail',party_code:party_code},
            dataType: "json",
            success: function(data){
                // console.log(data);
                $('#name_p').val(data.party_name);
                $('#address_p').val(data.address);
                $('#phone_p').val(data.phone_nos);
                $('#gst_p').val(data.gst);
                $('#ntn_p').val(data.ntn);
                $('#division_p').val(data.division_name);
                $('#city_p').val(data.city_name);
                $('#cr_days').val(data.crdays);
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        });
    }
    $('#PartyFormModel').modal('hide');
});
//select company code
// $('#order_form').on('click','#company_code',function(){
//       $('#company_table').dataTable().fnDestroy();
//       table = $('#company_table').DataTable({
//            dom: 'Bfrtip',
//            orderCellsTop: true,
//            fixedHeader: true,
           
//            buttons: [
//                'copy', 'csv', 'excel', 'pdf', 'print',
//            ]
//         });
//         // Setup - add a text input to each footer cell
//         // $('#company_table thead tr').clone(true).appendTo( '#company_table thead' );
//         $('#company_table thead tr:eq(1) th').each( function (i) {
//             var title = $(this).text();
//             $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );
//             $( 'input', this ).on( 'keyup change', function () {
//                 if ( table.column(i).search() !== this.value ) {
//                     table
//                         .column(i)
//                         .search( this.value )
//                         .draw();
//                 }
//             });
//         });
    
//     // company code dropdown
//     $.ajax({
//       url: 'api/setup/chart_of_account/control_account_api.php',
//         type: 'POST',
//         data: {action: 'company_code'},
//         dataType: "json",
//         success: function(response){
//             // console.log(response);
//         table.clear().draw();
//         // append data in datatable
//         var sno='0';
//         for (var i = 0; i < response.length; i++) {
//             sno++;
//             table.row.add([sno,response[i].co_name,response[i].co_code]);
//         }
//         table.draw();
//         },
//         error: function(error){
//             console.log(error);
//             alert("Contact IT Department");
//         }
//     });  
//   $('#CompanyFormModel').modal('show');
// });
// $('#order_form').on('click','#po_no',function(){
//       $('#po_table').dataTable().fnDestroy();
//       table = $('#po_table').DataTable({
//            dom: 'Bfrtip',
//            orderCellsTop: true,
//            fixedHeader: true,
           
//            buttons: [
//                'copy', 'csv', 'excel', 'pdf', 'print',
//            ]
//         });
//         // Setup - add a text input to each footer cell
//         // $('#company_table thead tr').clone(true).appendTo( '#company_table thead' );
//         $('#po_table thead tr:eq(1) th').each( function (i) {
//             var title = $(this).text();
//             $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );
//             $( 'input', this ).on( 'keyup change', function () {
//                 if ( table.column(i).search() !== this.value ) {
//                     table
//                         .column(i)
//                         .search( this.value )
//                         .draw();
//                 }
//             });
//         });
    
//     // company code dropdown
//     $.ajax({
//       url: 'api/setup/gin_api.php',
//         type: 'POST',
//         data: {action: 'po_table'},
//         dataType: "json",
//         success: function(response){
//             console.log(response);
//         table.clear().draw();
//         // append data in datatable
//         var sno='0';
//         for (var i = 0; i < response.length; i++) {
//             sno++;
//             table.row.add([response[i].dept_name,response[i].REFNUM,response[i].DOC_DATE,response[i].ORDER_KEY]);
//         }
//         table.draw();
//         },
//         error: function(error){
//             console.log(error);
//             alert("Contact IT Department");
//         }
//     });  
//   $('#poFormModel').modal('show');
  
// });
// $('#po_table').on('click','.even',function(){
//     // var party_name=$(this).closest('tr').children('td:nth-child(2)').text();
//     var dept_name=$(this).closest('tr').children('td:nth-child(1)').text();
//     var order_key=$(this).closest('tr').children('td:nth-child(4)').text();
//     // console.log(order_key);
//     $('#po_no').val(order_key);
//     $('#name_p').val(dept_name);
//     $.ajax({
//       url: 'api/setup/gin_api.php',
//         type: 'POST',
//         data: {action: 'dept_code_for_po',dept_name:dept_name},
//         dataType: "json",
//         success: function(response){
//             console.log(response);
//             var dept_code= response.dept_code
//             $('#v_no').val(dept_code);
//         },
//             error: function(error){
//                 console.log(error);
//                 alert("Contact IT Department");
//             }
//     }); 
//     $.ajax({
//       url: 'api/setup/gin_api.php',
//             type: 'POST',
//             data: {action: 'divisioncode'},
//             dataType: "json",
//             success: function(response){
//                 $("#ajax-loader").hide();
//                 // console.log(response);
//                 $('#div').html('');
//                 $('#div').append('<option value="" selected disabled>Select Item</option>');
//                 $.each(response, function(key, value){
//                     $('#div').append('<option data-name="'+value["div_name"]+'"  data-code='+value["div_code"]+' value='+value["div_code"]+'>'+value["div_code"]+' - '+value["div_name"]+'</option>');
//                 });
//             },
//             error: function(error){
//                 console.log(error);
//                 alert("Contact IT Department");
//             }
//     }); 
//     $.ajax({
//       url: 'api/setup/gin_api.php',
//             type: 'POST',
//             data: {action: 'itemdetails',order_key:order_key},
//             dataType: "json",
//             success: function(response){
//                 $("#ajax-loader").hide();
//                 console.log(response);
//                 $('#order').html('');
//                 $('#order').append('<option value="" selected disabled>Select Item</option>');
//                 $.each(response, function(key, value){
//                     $('#order').append('<option data-name="'+value["item_descr"]+'"  data-code='+value["ITEM_CODE"]+' value='+value["ITEM_CODE"]+'>'+value["ITEM_CODE"]+' - '+value["item_descr"]+'</option>');
//                 });
//             },
//             error: function(error){
//                 console.log(error);
//                 alert("Contact IT Department");
//             }
//     }); 
    
//     // $('#party').val(party_code);
//     // if(party_code !=''){
//     //     // document no dropdown
//     //     $.ajax({
//     //         url: 'api/setup/bill_local_api.php',
//     //         type: 'POST',
//     //         data: {action: 'party_detail',party_code:party_code},
//     //         dataType: "json",
//     //         success: function(data){
//     //             // console.log(data);
//     //             $('#party').val(data.party_code);
//     //             $('#name_p').val(data.party_name);
//     //             $('#address_p').val(data.address);
                
//     //         },
//     //         error: function(error){
//     //             console.log(error);
//     //             alert("Contact IT Department");
//     //         }
//     //     });
//     // }
//     // $('#poFormModel').modal('hide');
//     // // document no dropdown
  
//     // var co_code=$(this).closest('tr').children('td:nth-child(8)').text();
//     // var doc_year=$(this).closest('tr').children('td:nth-child(9)').text();
//     // var doc_type=$(this).closest('tr').children('td:nth-child(10)').text();
//     // var doc_no=$(this).closest('tr').children('td:nth-child(11)').text();
//     // var order_key=$(this).closest('tr').children('td:nth-child(5)').text();
//     //  $.ajax({
//     //     url: 'api/setup/bill_local_api.php',
//     //         type: 'POST',
//     //         data: {action: 'calculations1',co_code:co_code,doc_year:doc_year,doc_type:doc_type,doc_no:doc_no,order_key:order_key},
//     //         dataType: "json",
//     //         success: function(data){
//     //            $("#example1").css("display", "");
//     //             console.log(data);
//     //             var fd=0;
//     //             var Total = 0;
//     //             var rowCount = $("#example1 tr").length;
//     //             console.log(rowCount);
//     //             for(var a=2;a<rowCount -1;a++){
//     //                 var d=a-1;
//     //                 console.log(a);
//     //                 console.log(d);
//     //                 $('#tr'+d+'').remove(); 
//     //                 $('#total').text('0');
//     //                 $('#debit').val('');
//     //             }
                
//     //             for(var i=1;i<=data.length;i++){
//     //                 var ITEM_CODE=data[fd].ITEM_CODE;
//     //                 var ITEM_DESCR=data[fd].item_descr;
//     //                 var PRODUCT_CODE=data[fd].PRODUCT_CODE;
//     //                 var ITEM_DETAIL=data[fd].ITEM_DETAIL;
//     //                 var QTY=data[fd].QTY;
//     //                 var RATE=data[fd].RATE;
//     //                 var AMT=data[fd].TOTAL_NET_AMT;
//     //                 var BILLED=data[fd].BILLED;
//     //                 var DO_KEY_REF=data[fd].DO_KEY_REF;
//     //                 console.log(DO_KEY_REF);
                   
//     //                 $('#d_items tr:last').before('<tr id="tr'+i+'"><td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:70px;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="orderno[]" id = "orderno'+i+'" class="orderno" readonly></td><td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:70px;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="grnno[]" id="grnno'+i+'" class="grnno" readonly></td><td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:70px;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="item_code[]" id = "item_code'+i+'" class="item_code" readonly></td><td><textarea rows="1"  style="text-align:right; padding:0 2px 0 0;height:35px;width:160px;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="item_name[]" id = "item_name'+i+'" class="item_name" readonly></textarea></td><td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:100px;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="product[]" id = "product'+i+'" class="product" readonly></td> <td ><textarea rows="1" style="text-align:right; padding:0 2px 0 0;height:35px;width:100px;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="item_dtl[]" id = "item_dtl'+i+'" class="item_dtl" readonly></textarea></td>     <td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:60px;"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="quantity[]" id = "quantity'+i+'" class="quantity" readonly></td>  <td style="width: 8%;"><input  style="text-align:right; padding:0 2px 0 0;width:83px;height:35px" type="number"  name="rate[]" id="rate'+i+'" class="rate" readonly></td>  <td style="width: 10%;"><input  style="text-align:right; padding:0 2px 0 0;width:100px;height:35px"  pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="amt[]" id = "amt'+i+'" class="amt" readonly></td> <td ><textarea  style="height:35px;background-color:#ccd4e1;font-size:12px;width:100px;"  pattern="[a-zA-Z0-9 ,._-]{1,}" tabindex="-1"  type="text"   name="billed[]" id = "billed'+i+'" class="billed" readonly></textarea></td></tr>');
//     //                 $('#item_code'+i).val(ITEM_CODE);
//     //                 $('#item_name'+i).val(ITEM_DESCR);
//     //                 $('#product'+i).val(PRODUCT_CODE);
//     //                 $('#item_dtl'+i).val(ITEM_DETAIL);
//     //                 $('#quantity'+i).val(QTY);
//     //                 $('#rate'+i).val(RATE);
//     //                 $('#amt'+i).val(AMT);
//     //                 $('#billed'+i).val(BILLED);
//     //                 $('#orderno'+i).val(party_code);
//     //                 $('#grnno'+i).val(DO_KEY_REF);
                    
                    
//     //                 fd=fd+1;
//     //                 Total = Total + parseFloat(AMT);
//     //                 var finalformat = new Intl.NumberFormat(
//     //                     'en-US', {
//     //                     style: 'currency',
//     //                     currency: 'USD',
//     //                     currencyDisplay: 'narrowSymbol'
//     //                     }).format(Total);
//     //                 var formatted1 = finalformat.replace(/[$]/g, '');
//     //                 $('#total').html(formatted1);
                    
//     //                 // $('#total').html(Total);

//     //             }
            
//     //         },
//     //         error: function(error){
//     //             console.log(error);
//     //             alert("Contact IT Department");
//     //         }
//     //     });
    
//     $('#poFormModel').modal('hide');
// });
$("#order_form").on('change','#order',function(){
      var account_code=$('#order').find(':selected').attr("data-code");
      console.log(account_code);
      var detail=$('#order').find(':selected').attr("data-name");
      // console.log(detail);
      $('#select2-order-container').html(account_code);
      $('#item_name').val(detail);

});
$("#order_form").on('change','#div',function(){
        var dept_name=$('#div').find(':selected').attr("data-name");
        var dept_code=$('#div').find(':selected').attr("data-code");
        $('#select2-div-container').html(dept_code);
});
$("#order_form").on('change','.order',function(){
      var total_amount=$('#total').text();  
      total_amount=total_amount.replaceAll(',','');  



      total_amount = parseFloat(total_amount);
      var target = event.target || event.srcElement;
      var id = target.id;
      var id = id.split("-");
      id=id[1];
      var id = id.split("order");
      id=id[1];
      
      var amountdeduct=$("#amount"+id).val();
      if(amountdeduct==''){
        amountdeduct=0;
      }
      console.log(amountdeduct);
      console.log(total_amount);
      total_amount=parseFloat(total_amount) - parseFloat(amountdeduct);
      var account_code=$('#order'+id).find(':selected').val();
      // console.log(account_code);
      var detail=$('#order'+id).find(':selected').attr("data-name");
      // console.log(detail);
      $('#select2-order'+id+'-container').html(account_code);
      $('#item_name'+id).val(detail);
     var order_key =$('#po_no').val();
    console.log(account_code);
        $.ajax({
          url: 'api/setup/gin_api.php',
            type: 'POST',
            data: {action: 'itemthings',item_code:account_code,order_key:order_key},
            dataType: "json",
            success: function(data){
                console.log(data);
                $('#quantity'+id).val(data.QTY);
                $('#balance'+id).val(data.QTY);
                var rate = data.RATE;
                var finalformatrate = new Intl.NumberFormat(
                  'en-US', {
                  style: 'currency',
                  currency: 'USD',
                  currencyDisplay: 'narrowSymbol'
                  }).format(rate);

                rate = finalformatrate.replace(/[$]/g, '');
                $('#rate'+id).val(rate);
                var amt = data.AMT;
                var amt2 = data.AMT;
                var finalformatamt = new Intl.NumberFormat(
                'en-US', {
                style: 'currency',
                currency: 'USD',
                currencyDisplay: 'narrowSymbol'
                }).format(amt);

                amt = finalformatamt.replace(/[$]/g, '');
                $('#amount'+id).val(amt);
                $('#expiry'+id).val(data.EXPIRY_DATE);
                $('#batch_no'+id).val(data.BATCH_NO);
                $('#loc'+id).val(data.LOC_CODE);
               var amt = $('#amount'+id).val();
               console.log(total_amount);
              //  total_amount=total_amount.replaceAll(',' , '');
                total_amount = parseFloat(total_amount) + parseFloat(amt2);
                var totalfinal = total_amount;
                var finalformatamttotal_amount = new Intl.NumberFormat(
                'en-US', {
                style: 'currency',
                currency: 'USD',
                currencyDisplay: 'narrowSymbol'
                }).format(totalfinal);

                totalfinal = finalformatamttotal_amount.replace(/[$]/g, '');
                $('#total').text(totalfinal);
                // console.log(total_amount);
                
                
                
                $.ajax({
                  url: 'api/setup/gin_api.php',
                    type: 'POST',
                    data: {action: 'itemdivgen',item_code:account_code},
                    dataType: "json",
                    success: function(data){
                        $('#lot_code').val(data.div_name)
                        $('#lot_code2').val(data.gen_name)
                    },
                    error: function(error){
                        console.log(error);
                        alert("Contact IT Department");
                    }
                });




            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        });
  });
//select company code
$('#order_form').on('click','#salesman',function(){
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
        $('#salesman_table thead tr:eq(1) th').each( function (i) {
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
    
    // salesman code dropdown
    $.ajax({
      url: 'api/setup/gin_api.php',
        type: 'POST',
        data: {action: 'salesman_code'},
        dataType: "json",
        success: function(response){
            // console.log(response);
        table.clear().draw();
        // append data in datatable
        var sno='0';
        for (var i = 0; i < response.length; i++) {
            sno++;
            table.row.add([sno,response[i].sman_name,response[i].sman_code]);
        }
        table.draw();
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });  
  $('#SalesmanFormModel').modal('show');
});
$(document).ready(function(){
  $("#voucher_date").focus();
    
    //get value of company in fields
    // $('#company_table').on('click','.even',function(){
    //     var company_name=$(this).closest('tr').children('td:nth-child(2)').text();
    //     var company_code=$(this).closest('tr').children('td:nth-child(3)').text();
    //     // console.log(company_code);
    //     $('#company_code').val(company_code);
    //     $('#company_name').val(company_name);
    //     $("#ajax-loader").show();
    //     var rowCount = $("#example1 tr").length;
    //     if(rowCount == 3){
    //       $('#acc_desc').val('');
    //       $('#detail').val('');
    //     //   $('#type').val('');
    //       $('#memo').val('');
    //       $('#amount').val('');
    //       $('#total').val('');
    //       $('#debit').val('');
    //       $('#view_item').css('display','none');
    //       // $('#view_item').fadeIn("slow");
    //     }else{
    //       for(var a=2;a<rowCount -1;a++){
    //         var d=a-1;
    //         $('#tr'+d+'').remove(); 
    //         $('#total').text('0');
    //       }
    //     }
    //     // ACCOUNT code dropdown
    //     $.ajax({
    //       url: 'api/setup/gin_api.php',
    //         type: 'POST',
    //         data: {action: 'item_code',company_code:company_code},
    //         dataType: "json",
    //         success: function(response){
    //             $("#ajax-loader").hide();
    //             // console.log(response);
    //             $('#acc_desc').html('');
    //             $('#acc_desc').append('<option value="" selected disabled>Select Item</option>');
    //             $.each(response, function(key, value){
    //                 $('#acc_desc').append('<option data-name="'+value["item_descr"]+'"  data-code='+value["item_div"]+' value='+value["item_div"]+'>'+value["item_div"]+' - '+value["item_descr"]+'</option>');
    //             });
    //         },
    //         error: function(error){
    //             console.log(error);
    //             alert("Contact IT Department");
    //         }
    //     }); 
    //     $('#CompanyFormModel').modal('hide');
    //     // $('#CompanyFormModel').modal('show');
    // });
        
    // $('#company_table').on('click','.odd',function(){
    //     var company_name=$(this).closest('tr').children('td:nth-child(2)').text();
    //     var company_code=$(this).closest('tr').children('td:nth-child(3)').text();
    //     // console.log(company_code);
    //     $('#company_code').val(company_code);
    //     $('#company_name').val(company_name);
    //     $("#ajax-loader").show();
    //     var rowCount = $("#example1 tr").length;
    //     if(rowCount == 3){
    //       $('#acc_desc').val('');
    //       $('#detail').val('');
    //     //   $('#type').val('');
    //       $('#memo').val('');
    //       $('#amount').val('');
    //       $('#total').val('');
    //       $('#debit').val('');
    //       $('#view_item').css('display','none');
    //       // $('#view_item').fadeIn("slow");
    //     }else{
    //       for(var a=2;a<rowCount -1;a++){
    //         var d=a-1;
    //         $('#tr'+d+'').remove(); 
    //         $('#total').text('0');
    //       }
    //     }
    //     // ACCOUNT code dropdown
    //     $.ajax({
    //       url: 'api/setup/gin_api.php',
    //         type: 'POST',
    //         data: {action: 'item_code',company_code:company_code},
    //         dataType: "json",
    //         success: function(response){
    //             $("#ajax-loader").hide();
    //             // console.log(response);
    //             $('#acc_desc').html('');
    //             $('#acc_desc').append('<option value="" selected disabled>Select Item</option>');
    //             $.each(response, function(key, value){
    //                 $('#acc_desc').append('<option data-name="'+value["item_descr"]+'"  data-code='+value["item_div"]+' value='+value["item_div"]+'>'+value["item_div"]+' - '+value["item_descr"]+'</option>');
    //             });
    //         },
    //         error: function(error){
    //             console.log(error);
    //             alert("Contact IT Department");
    //         }
    //     }); 
    //     $('#CompanyFormModel').modal('hide');
    // });
    //get value of company in fields
    $('#salesman_table').on('click','.even',function(){
        var salesman_name=$(this).closest('tr').children('td:nth-child(2)').text();
        var salesman_code=$(this).closest('tr').children('td:nth-child(3)').text();
        // console.log(salesman_code);
        $('#salesman').val(salesman_code);
        $('#salesman_name').val(salesman_name);
        $('#SalesmanFormModel').modal('hide');
    // $('#salesmanFormModel').modal('show');
    });
    $('#salesman_table').on('click','.odd',function(){
        var salesman_name=$(this).closest('tr').children('td:nth-child(2)').text();
        var salesman_code=$(this).closest('tr').children('td:nth-child(3)').text();
        // console.log(salesman_code);
        $('#salesman').val(salesman_code);
        $('#salesman_name').val(salesman_name);
        $('#SalesmanFormModel').modal('hide');
    // $('#salesmanFormModel').modal('show');
    });
    //select division code
    $('#order_form').on('click','#division',function(){
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
              url: 'api/setup/gin_api.php',
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
                      table.row.add([sno,data[i].division_name,data[i].division_code]);
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
      var purchase_mode=$("#purchase_mode").val();
      $("#msg1").html('');
      $('#DivisionFormModel').modal('hide');
    });
    $('#division_table').on('click','.even',function(){
      var division_name=$(this).closest('tr').children('td:nth-child(2)').text();
      var division_code=$(this).closest('tr').children('td:nth-child(3)').text();
      $('#division').val(division_code);
      $('#division_name').val(division_name);var company_code=$("#company_code").val();
      $("#msg1").html('');
      var company_code=$("#company_code").val();
      var purchase_mode=$("#purchase_mode").val();
      $("#msg1").html('');
        //   $("#ajax-loader").hide();   
      $('#DivisionFormModel').modal('hide');
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
          div: {
            required: true,
          },
          purchase_mode: {
            required: true,
          },
          po_no:{
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
$("#order_form").on('change','#voucher_date',function(){
  var date = new Date($('#voucher_date').val());
  var year = date.getFullYear();
  $('#year').val(year);
  });
    
// $('#example1').ready(function(){
//   var company_code=$('#company_code').val();
//   //on chAnge company code
//   $("#order_form").on('change','#order',function(){
//       var account_code=$('#order').find(':selected').val();
//       // console.log(account_code);
//       var detail=$('#order').find(':selected').attr("data-name");
//       // console.log(detail);
//       $('#select2-order-container').html(account_code);
//       $('#item_name').val(detail);
//       $('#view_item').css('display','');
//       $('#view_item').fadeIn("slow");
//   });
//   //on chAnge account code
//   $("#order_form").on('change','.acc_desc',function(){
//       var target = event.target || event.srcElement;
//       var id = target.id;
//       var id = id.split("-");
//       id=id[1];
//       var id = id.split("acc_desc");
//       id=id[1];
//       var account_code=$('#acc_desc'+id).find(':selected').val();
//       // console.log(account_code);
//       var detail=$('#acc_desc'+id).find(':selected').attr("data-name");
//       // console.log(detail);
//       $('#select2-acc_desc'+id+'-container').html(account_code);
//       $('#detail'+id).val(detail);
//         $.ajax({
//           url: 'api/setup/gin_api.php',
//             type: 'POST',
//             data: {action: 'item_detail',item_code:account_code},
//             dataType: "json",
//             success: function(data){
//                 // console.log(data);
//                 $('#division_i'+i+'').val(data.division_name);
//                 $('#gen_i'+i+'').val(data.gen_name);
//                 $('#um_i'+i+'').val(data.unit_name);
//             },
//             error: function(error){
//                 console.log(error);
//                 alert("Contact IT Department");
//             }
//         });
//   });
  
// });
$('#example1').ready(function(){
  var rowCount = $("#example1 tr").length;
  console.log(rowCount);
  var i = rowCount-1;
  var total_amount = 0;
  $('.add').click(function(){
    var order_key=$('#po_no').val();
    var order=$('#order').val();
    console.log(order);
      i++;
      var item_name = $('#item_name').val();
      var loc = $("#loc").val();
      var quantity = $("#quantity").val();
      var rate = $("#rate").val();
      var balance = $("#balance").val();
      var amount = $("#amount").val();
      var batch_no = $("#batch_no").val();
      var expiry = $("#expiry").val();
      
      if(order == null){
          $('#msg').text("item code can't be the null.");
      }else{
          $('#msg').text("");
          
          // values empty
          $("#item_name").val('');
          $("#select2-order-container").html('');
          $("#loc").val('');
          $("#quantity").val('');
          $("#rate").val('');
          $("#balance").val('');
          $("#amount").val('');
          $("#batch_no").val('');
          $("#expiry").val('');
          $('#d_items tr:last').before('<tr id="tr'+i+'" class="tr"> <td ><select name="order[]" id = "order'+i+'" class="js-example-basic-single order" style="width:75px;"></select></td> <td ><textarea style="height:35px;background-color:#ccd4e1;width:200px;" rows="1"   name="item_name[]" id = "item_name'+i+'" class="item_name" readonly></textarea></td> <td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:75px;background-color:#ccd4e1;" type="number"  name="loc[]" id="loc'+i+'" class="loc"></td><td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:105px;" type="number"  name="quantity[]" id="quantity'+i+'" class="quantity"></td>   <td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:105px;background-color:#ccd4e1;" type="text"  name="rate[]" id="rate'+i+'" class="rate" readonly> <td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:150px;background-color:#ccd4e1;" readonly tabindex="-1" pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="amount[]" id = "amount'+i+'" class="amount"></td></td>  <td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;background-color:#ccd4e1;width:130px;"    type="text" tabindex="-1"  name="batch_no[]" id = "batch_no'+i+'" class="batch_no" readonly></td><td ><textarea  style="height:35px;background-color:#ccd4e1;font-size:12px;width:140px;"   type="text"  name="expiry[]" id = "expiry'+i+'" class="expiry" tabindex="-1" readonly></textarea></td><td><button type = "button" id="'+i+'" class="btn btn-sm btn-danger remove"><b>X<b></button></td> <td ><textarea  style="display:none" pattern="[a-zA-Z0-9 ,._-]{1,}" type="text"  name="balance[]" id = "balance'+i+'" class="balance'+i+'" readonly></textarea></td></tr>');          
            $.ajax({
            url: 'api/setup/gin_api.php',
              type: 'POST',
              data: {action: 'itemdetails',order_key:order_key},
              dataType: "json",
              success: function(response){
                console.log(response);
                  $('#order').html('');
                  $('#order').append('<option value="" selected disabled>Select Account</option>');
                  $.each(response, function(key, value){ 
                    $('#order').append('<option data-name="'+value["item_descr"]+'"  data-code='+value["ITEM_CODE"]+' value='+value["ITEM_CODE"]+'>'+value["ITEM_CODE"]+' - '+value["item_descr"]+'</option>');
                  });
              },
              error: function(error){
                  console.log(error);
                  alert("Contact IT Department");
              }
          });  
            $.ajax({
              url: 'api/setup/gin_api.php',
                    type: 'POST',
                    data: {action: 'itemdetails',order_key:order_key},
                    dataType: "json",
                    success: function(response){
                        $("#ajax-loader").hide();
                        // console.log(response);

                        $('#order'+i+'').html('');
                        $('#order'+i+'').select2();
                        $('#order'+i+'').append('<option value="" selected disabled>Select Item</option>');
                        $.each(response, function(key, value){
                            $('#order'+i+'').append('<option data-name="'+value["item_descr"]+'"  data-code='+value["ITEM_CODE"]+' value='+value["ITEM_CODE"]+'>'+value["ITEM_CODE"]+' - '+value["item_descr"]+'</option>');
                            if(value["ITEM_CODE"]== order){
                              order= value["ITEM_CODE"];
                              $('#order'+i+' option[value='+order+']').prop("selected", true);
                              $('#loc'+i+'').val(loc);
                              $('#item_name'+i+'').val(item_name);
                              $('#quantity'+i+'').val(quantity);
                              $('#balance'+i+'').val(balance);
                              $('#rate'+i+'').val(rate);
                              $('#amount'+i+'').val(amount);
                              $('#batch_no'+i+'').val(batch_no);
                              $('#expiry'+i+'').val(expiry);
                              // total_amount = parseFloat(total_amount) + parseFloat(amount);
           
                              // console.log(total_amount);
                            }
                          });
                       
                    },
                    error: function(error){
                        console.log(error);
                        alert("Contact IT Department");
                    }
            }); 

           
                                           
                                           
                                            
                                         
                                            
                                          
                                            
                                            
                                           
           
              
      }  
  });
     
  $('#example1').on('click','.remove', function(){
      var button_id = $(this).attr("id");
      var remove_amount = $('#amount'+button_id+'').val();
      remove_amount=remove_amount.replaceAll(',','');
      
      $('#tr'+button_id+'').remove();
      var current_amount = $('#total').text();
      current_amount=current_amount.replaceAll(',','');

      //total amount
      var total_amount = parseFloat(current_amount) - parseFloat(remove_amount);
      if(isNaN(total_amount)){
        total_amount='0';
      }else{
        var totalval = new Intl.NumberFormat(
        'en-US', {
        style: 'currency',
        currency: 'USD',
        currencyDisplay: 'narrowSymbol'
        }).format(total_amount);

    var formatted1 = totalval.replace(/[$]/g, '');


        $('#total').text(formatted1);
        $('#lot_code').val('');
        $('#lot_code2').val('');
      }
      

    
  });
});
$(document).ready(function(){
  $('.js-example-basic-single').select2();
    var DOC_NO=<?php echo $_GET['DOC_NO'] ?>;
    var CO_CODE=<?php echo $_GET['CO_CODE'] ?>;
    var company_code=<?php echo $_GET['CO_CODE'] ?>;
    var DOC_TYPE="<?php echo $_GET['DOC_TYPE'] ?>";
    var DOC_DATE="<?php echo $_GET['DOC_DATE'] ?>";
    var DOC_YEAR="<?php echo $_GET['DOC_YEAR'] ?>";
    var PO_CATG="<?php echo $_GET['PO_CATG'] ?>";
    $('#doc_no').val(DOC_NO);
    $('#company_code').val(CO_CODE);
    $('#voucher_date').val(DOC_DATE);
    $('#year').val(DOC_YEAR);
    $('#purchase_mode').val(PO_CATG);
    $.ajax({
      url: 'api/setup/gin_api.php',
            type: 'POST',
            data: {action: 'divisioncode'},
            dataType: "json",
            success: function(response){
                $("#ajax-loader").hide();
                // console.log(response);
                $('#div').html('');
                $('#div').append('<option value="" selected disabled>Select Item</option>');
                $.each(response, function(key, value){
                    $('#div').append('<option data-name="'+value["div_name"]+'"  data-code='+value["div_code"]+' value='+value["div_code"]+'>'+value["div_code"]+' - '+value["div_name"]+'</option>');
                });
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
    }); 
    $.ajax({
        url: 'api/setup/gin_api.php',
        type: 'POST',
        data:{action:'mst_data',CO_CODE:CO_CODE,DOC_NO:DOC_NO,DOC_TYPE:DOC_TYPE,DOC_YEAR:DOC_YEAR,PO_CATG:PO_CATG},
        async:false,
        dataType: "json",
        success: function(data){
          console.log(data);
          $('#company_name').val(data.company_name);
          $('#po_no').val(data.PO_NO);
          $('#div').val(data.DIV_CODE);
          $('#div_name').val(data.div_name);
          $('#OrderRef').val(data.ORDER_REFNUM);
          $('#PartyRef').val(data.ORDER_PARTY_REF);
          $('#name_p').val(data.dept_name);
          $('#v_no').val(data.DEPT_CODE);
          $('#narration').val(data.REMARKS);
          $('#do_key').val(data.DO_KEY);
          
        //   $('#order_key').val(data.ORDER_KEY);
        //   $('#year').val(data.DOC_YEAR);
        //   $('#po_cat').val(data.PO_CATG);
        //   $('#dept_ref').val(data.REFNUM);
        //   $('#dept_code').val(data.DEPT_CODE);
        //   $('#dept_name').val(data.dept_name);
        //   $('#div_code').val(data.DIV_CODE);
        //   $('#division_name').val(data.division_name);
        //   $('#narration').val(data.REMARKS);
          var company_code = data.CO_CODE;
           
            var company_code=data.CO_CODE;
            var DOC_DATE=data.DOC_DATE;
            var DOC_TYPE=data.DOC_TYPE;
            var DOC_NO=data.DOC_NO;
            var ORDER_KEY=data.ORDER_KEY;
        },
        error: function(e) 
        {
        console.log(e);
        alert("Contact IT Department");
        }
    });
    var order_key = $('#po_no').val();
    $.ajax({
          url: 'api/setup/gin_api.php',
            type: 'POST',
            data: {action: 'itemdetails',order_key:order_key},
            dataType: "json",
            success: function(response){
                $("#ajax-loader").hide();
                // console.log(response);
                $('#order').html('');
                $('#order').append('<option value="" selected disabled>Select Item</option>');
                $.each(response, function(key, value){
                    $('#order').append('<option data-name="'+value["item_descr"]+'"  data-code='+value["ITEM_CODE"]+' value='+value["ITEM_CODE"]+'>'+value["ITEM_CODE"]+' - '+value["item_descr"]+'</option>');
                });
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
    }); 
    $.ajax({
            url: 'api/setup/gin_api.php',
                type: 'POST',
                data: {action: 'calculations2',company_code:company_code,DOC_YEAR:DOC_YEAR,DOC_TYPE:DOC_TYPE,DOC_NO:DOC_NO},
                dataType: "json",
                async:false,
                success: function(data){
                  // var test = data.length;
                    
                    console.log(data);
                    var total_amount=0;
                    var j=1;
                    var k=0;
                    if(data.length >= 1){
                            for(var i=1;i<=data.length;i++){
                        // var PO_NO=data[fd].PO_NO;
                        // var GRN_KEY=data[fd].GRN_KEY;
                        // var ITEM_CODE=data[fd].ITEM_CODE;
                        // var ITEM_NAME=data[fd].ITEM_DESCR;
                        // var PRODUCT_CODE=data[fd].PRODUCT_CODE;
                        // var ITEM_DETAIL=data[fd].ITEM_DETAIL;
                        // var QTY=data[fd].QTY;
                        // var RATE=data[fd].RATE;
                        // // // console.log(AMT);
                        // var AMT=data[fd].AMT;
                        // var BILLED=data[fd].BILLED;
                    
                        $('#d_items tr:last').before('<tr id="tr'+i+'" class="tr"> <td ><select name="order[]" id = "order'+i+'" class="js-example-basic-single order" style="width:75px;"></select></td> <td ><textarea style="height:35px;background-color:#ccd4e1;width:200px;" rows="1" tabindex="-1"  name="item_name[]" id = "item_name'+i+'" class="item_name" readonly></textarea></td> <td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:75px;background-color:#ccd4e1;" tabindex="-1" type="number"  name="loc[]" id="loc'+i+'" class="loc"></td><td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:105px;" type="number"  name="quantity[]" id="quantity'+i+'" class="quantity"></td>   <td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:105px;background-color:#ccd4e1;" readonly tabindex="-1" type="text"  name="rate[]" id="rate'+i+'" class="rate" readonly> <td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;width:150px;background-color:#ccd4e1;" readonly tabindex="-1" pattern="[a-zA-Z0-9 ,._-]{1,}"  type="text"  name="amount[]" id = "amount'+i+'" class="amount"></td></td>  <td ><input  style="text-align:right; padding:0 2px 0 0;height:35px;background-color:#ccd4e1;width:130px;"    type="text" tabindex="-1"  name="batch_no[]" id = "batch_no'+i+'" class="batch_no" readonly></td><td ><textarea  style="height:35px;background-color:#ccd4e1;font-size:12px;width:140px;"   type="text"  name="expiry[]" id = "expiry'+i+'" class="expiry" tabindex="-1" readonly></textarea></td><td><button type = "button" id="'+i+'" class="btn btn-sm btn-danger remove"><b>X<b></button></td> <td ><textarea  style="display:none" pattern="[a-zA-Z0-9 ,._-]{1,}" type="text"  name="balance[]" id = "balance'+i+'" class="balance'+i+'" readonly></textarea></td></tr>');          
                           var order_key = $('#po_no').val();
                           console.log(order_key);
                        $.ajax({
                              url: 'api/setup/gin_api.php',
                              type: 'POST',
                              data: {action: 'itemdetails',order_key:order_key},
                              dataType: "json",
                              success: function(response){
                                  $("#ajax-loader").hide();
                                  // console.log(response);
                                  $('#order'+j).addClass('js-example-basic-single');
                                  $('.js-example-basic-single').select2();
                                  $('#order'+j).append('<option value="" selected disabled>Select Account</option>');
                                  $.each(response, function(key, value){
                                       $('#order'+j).append('<option data-name="'+value["item_descr"]+'"  data-code='+value["ITEM_CODE"]+' value='+value["ITEM_CODE"]+'>'+value["ITEM_CODE"]+' - '+value["item_descr"]+'</option>');
                                     });
                                  $('#order'+j).val(data[k].ITEM_CODE);
                                    var ITEM_CODE=$('#order'+j).find(':selected').val();
                                    var detail=$('#order'+j).find(':selected').attr("data-name");
                                    $('#select2-order'+j+'-container').html(ITEM_CODE);
                                    $('#item_name'+j).val(detail);
                                    $('#loc'+j).val(data[k].LOC_CODE);
                                    $('#quantity'+j).val(data[k].QTY);
                                    $('#balance'+j).val(data[k].balstock);
                                    var rate = data[k].RATE;
                                    var finalformatrate = new Intl.NumberFormat(
                                      'en-US', {
                                      style: 'currency',
                                      currency: 'USD',
                                      currencyDisplay: 'narrowSymbol'
                                      }).format(rate);

                                  var formattedrate = finalformatrate.replace(/[$]/g, '');
                                    $('#rate'+j).val(formattedrate);
                                    var amt = data[k].AMT;
                                    var finalformatamt = new Intl.NumberFormat(
                                      'en-US', {
                                      style: 'currency',
                                      currency: 'USD',
                                      currencyDisplay: 'narrowSymbol'
                                      }).format(amt);

                                  var formattedamt = finalformatamt.replace(/[$]/g, '');
                                    $('#amount'+j).val(formattedamt);
                                    $('#batch_no'+j).val(data[k].BATCH_NO);
                                    $('#expiry'+j).val(data[k].EXPIRY_DATE);
                                    var amt2=data[k].AMT;
                                    total_amount=parseFloat(total_amount)+parseFloat(amt2);
                                    var finalformattotal = new Intl.NumberFormat(
                                      'en-US', {
                                      style: 'currency',
                                      currency: 'USD',
                                      currencyDisplay: 'narrowSymbol'
                                      }).format(total_amount);

                                  var formattedtotal = finalformattotal.replace(/[$]/g, '');
                                    $('#total').text(formattedtotal);
                                    k=k+1;
                                    j=j+1;
                              },
                              
                              error: function(error){
                                  console.log(error);
                                  alert("Contact IT Department");
                              }
                             
                            });



                            

                          }
                        // $('#orderno'+i).val(PO_NO);
                        // $('#grnno'+i).val(GRN_KEY);
                        // $('#item_code'+i).val(ITEM_CODE);
                        // $('#item_name'+i).val(ITEM_NAME);
                        // $('#product'+i).val(PRODUCT_CODE);
                        // $('#item_dtl'+i).val(ITEM_DETAIL);
                        // $('#quantity'+i).val(QTY);
                        // $('#rate'+i).val(RATE);
                        // $('#amt'+i).val(AMT);
                        // $('#billed'+i).val(BILLED);
                        
                       
                        // Total = Total + parseFloat(AMT);
                        // // console.log(Total);
                        // var finalformat = new Intl.NumberFormat(
                        //     'en-US', {
                        //     style: 'currency',
                        //     currency: 'USD',
                        //     currencyDisplay: 'narrowSymbol'
                        //     }).format(Total);
                        // var formatted1 = finalformat.replace(/[$]/g, '');
                        // $('#total').html(formatted1);
                        
                        // $('#total').html(Total);

                    }
                
                },
                error: function(error){
                    console.log(error);
                    alert("Contact IT Department");
                }
    });

});
$('#example1').on('click','.tr',function(){
            var button_id = $(this).attr("id");
            if(button_id == 'main_tr')
            {
                var item_code = $('#order').val();
                console.log(item_code);
                if(item_code == null) {
                    $('#lot_code').val('');
                    $('#lot_code2').val('');
                    // console.log('avvvvv')
                  
                }
                else { 
                // var order_key = $('#po_name').val();
                // var doc_date = $('#po_date').val();
                var account_code=$('#order').find(':selected').val();
                  $.ajax({
                    url: 'api/setup/gin_api.php',
                      type: 'POST',
                      data: {action: 'itemdivgen',item_code:account_code},
                      dataType: "json",
                      success: function(data){
                          $('#lot_code').val(data.div_name)
                          $('#lot_code2').val(data.gen_name)
                      },
                      error: function(error){
                          console.log(error);
                          alert("Contact IT Department");
                      }
                  });
                }
            }else{
                var button_id = button_id.split("tr");
                var id = button_id[1];
                console.log(id)
                var account_code=$('#order'+id).find(':selected').val();
                console.log(account_code);
                if(account_code != null){
                  $.ajax({
                      url: 'api/setup/gin_api.php',
                        type: 'POST',
                        data: {action: 'itemdivgen',item_code:account_code},
                        dataType: "json",
                        success: function(data){
                            $('#lot_code').val(data.div_name)
                            $('#lot_code2').val(data.gen_name)
                        },
                        error: function(error){
                            console.log(error);
                            alert("Contact IT Department");
                        }
                    });
                }
            }
                
});
$("#order_form").on('click','#report',function(){
    var co_code = $("#company_code").val();
    var doc_no = $("#doc_no").val();
    var doc_year = $("#year").val();
    var do_key = $("#do_key").val();
        // ?action=payment_invoice_generate&tr_no="+response.data[0].TRNO
        $("#ajax-loader").hide();
        let invoice_url = "invoicereports/issue_note_report.php?action=print&co_code="+co_code+"&doc_no="+doc_no+"&doc_year="+doc_year+"&do_key="+do_key;
        window.open(invoice_url, '_blank');
});
$("#order_form").on("submit", function (e) {
    if ($("#order_form").valid()) {
        var rowCount = $("#example1 tr").length;
        if(rowCount > 3){
            e.preventDefault();
            var formData = new FormData(this);
            var total=$('#total').text();
          formData.append('total',total);
          formData.append('action','update');
          $.ajax({
            url: 'api/setup/gin_api.php',
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
                          $.get('inventory_management/inventory_local/gin.php',function(data,status){
                           
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
$("#il_breadcrumb").on("click", function () {
    $.get('inventory_management/inventory_local/inventory_local.php', function(data,status){
        $("#content").html(data);
    });
});
$("#gin_list_breadcrumb").on("click", function () {
    $.get('inventory_management/inventory_local/gin.php', function(data,status){
        $("#content").html(data);
    });
});
$("#add_gin_local_breadcrumb").on("click", function () {
    $.get('inventory_management/inventory_local/add_gin.php', function(data,status){
        $("#content").html(data);
    });
});
</script>
<?php include '../../includes/loader.php'?>