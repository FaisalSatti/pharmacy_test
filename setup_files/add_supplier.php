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
.select2-container{
width: 73% !important;
font-size: 11px !important;
}
label{
font-size:14px !important
}
.input-group-prepend{
/* border-right:2px solid black !important */
}
.select2-selection{
background-color: #b7edea !important;
}
.select2-hidden-accessible{
border:1px solid black !important;
}
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap");
input:focus,select:focus,textarea:focus,.select2-selection:focus, .add:focus, #submit:focus, .remove:focus{
-moz-box-shadow: 0 0 8px rgba(82,168,236,.6);
box-shadow: 0 0 8px orangered !important;
border: 3px solid black!important;
}
.form-group{margin-bottom:5px !important;
}
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
.form-button{
margin-bottom: 10px !important;
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
</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Supplier  Information</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
            <li class="breadcrumb-item active"><button class="btn btn-sm" id="setup_breadcrumb">Setup</button></li>
            <li class="breadcrumb-item"><button class="btn btn-sm" id="party_setup_breadcrumb">Supplier  Setup</button></li>
            <li class="breadcrumb-item"><button class="btn btn-sm" id="add_party_breadcrumb">Add Supplier</button></li>
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
                <form method="post" id="party_form">
                  <?php include '../display_message/display_message.php'?>
                  <span id="msg" style="color: red;font-size: 13px;"></span>
                  <input type="hidden" name="form_no" id="form_no" value="">
                  <div class="row" style="border:1px solid gray;padding:20px;border-radius:5px;box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.2), 0 20px 20px 0 rgba(0, 0, 0, 0.19);">

                    <div class="col-lg-1 col-md-2 form-group">
                      <label for="">Co.Code:<span style="color:red">*</span></label>
                    </div>
                    <div class="col-lg-2 col-md-4 form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                        </div>
                        <select class="form-control form-control-sm  js-example-basic-single" id="company_code" name="company_code"></select>                                   
                      </div>
                    </div>

                    <div class="col-lg-1 col-md-2 form-group">
                      <label for="">Co.Name :</label>
                    </div>
                    <div class="col-lg-2 col-md-4 form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-user"></i></span>
                        </div>
                        <input maxlength="30" type="text" name="company_name" style="background-color:#ccd4e1;font-weight:bold;" id="company_name" class="form-control form-control-sm" placeholder="Company Name" readonly tabindex="-1" >
                      </div>
                    </div>

                    <div class="col-lg-1 col-md-2 form-group">
                      <label for="">PartyCode:<span style="color:red">*</span></label>
                    </div>
                    <div class="col-lg-2 col-md-4 form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                        </div> 
                        <input maxlength="3" min="1" max="999" type="number" name="party_code" id="party_code" class="form-control form-control-sm" placeholder="Party Code" >
                        <p  id="msg1" style="display:none;padding-top:80px;color: red;font-size: 13px;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px"></p>
                      </div>
                    </div>

                    <div class="col-lg-1 col-md-2 form-group">
                      <label for="">PartyName:</label>
                    </div>
                    <div class="col-lg-2 col-md-4 form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-user"></i></span>
                        </div>
                        <input maxlength="30" type="text" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" name="party_name" id="party_name" class="form-control form-control-sm" placeholder="Party Name"  >
                      </div>
                    </div>

                    <div class="col-lg-1 col-md-2 form-group">
                      <label for="">Acc. Code:</label>
                    </div>
                    <div class="col-lg-2 col-md-4 form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                        </div>
                        <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="15" type="number" style="background-color:#ccd4e1;font-weight:bold;" name="party_account" id="party_account" class="form-control form-control-sm" placeholder="Party Account" readonly tabindex="-1" >
                      </div>  
                    </div>

                    <div class="col-lg-1 col-md-2 form-group">
                      <label for="">Address :<span style="color:red">*</span></label>
                    </div>
                    <div class="col-lg-8 col-md-4 form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-address-card"></i></span>
                        </div>
                        <textarea rows="1" name="address" id="address" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" class="form-control form-control-sm" placeholder="Address" ></textarea>
                      </div>
                    </div>

                    <div class="col-lg-1 col-md-2 form-group">
                    <label for="">Person :</label>
                    </div>
                    <div class="col-lg-2 col-md-4 form-group">
                      <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="far fa-user"></i></span>
                              </div>
                              <input maxlength="30" type="text" name="person" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" id="person" class="form-control form-control-sm" placeholder="Person Name"  >
                        </div>
                    </div>

                    <div class="col-lg-1 col-md-2 form-group">
                    <label for=""> PhoneNo:<span style="color:red">*</span></label>
                    </div>
                    <div class="col-lg-2 col-md-4 form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="text" name = "contact_no" id="contact_no" placeholder="xxxx-xxx-xxxx" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" value="" class="form-control form-control-sm" data-inputmask="'mask': ['9999-999-9999', '+99-999-999-9999']" data-mask="" inputmode="text">
                      </div>
                    </div>

                    <div class="col-lg-1 col-md-2 form-group">
                    <label for="">Email :<span style="color:red">*</span></label>
                    </div>
                    <div class="col-lg-2 col-md-4 form-group">
                      <div class="input-group">
                          <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-envelope"></i></span>
                          </div>
                          <input type="email" id="email" name="email" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" class="form-control form-control-sm" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Enter Valid Email Address">
                      </div>
                    </div>

                    <div class="col-lg-1 col-md-2 form-group">
                    <label for="">CNIC No :<span style="color:red">*</span></label>
                    </div>
                    <div class="col-lg-2 col-md-4 form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-id-card"></i></span>
                        </div>
                        <input type="text" name = "cnic_no" id="cnic_no" placeholder="xxxxx-xxxxxxx-x" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" value="" class="form-control form-control-sm" data-inputmask="&quot;mask&quot;: &quot;99999-9999999-9&quot;" data-mask="" inputmode="text">
                      </div>
                    </div>

                    
                    <div class="col-lg-1 col-md-2 form-group">
                      <label for="">GST #:</label>
                    </div>
                    <div class="col-lg-2 col-md-4 form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                        </div>
                        <input maxlength="30" type="number" name="gst_no" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" id="gst_no" class="form-control form-control-sm" placeholder="GST" >
                      </div>
                    </div>
                    
                    <div class="col-lg-1 col-md-2 form-group">
                    <label for="">NTN No :</label>
                    </div>
                    <div class="col-lg-2 col-md-4 form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                        </div>
                        <input maxlength="30" type="number" name="ntn_no" id="ntn_no" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px"   class="form-control form-control-sm" placeholder="NTN Number 1-9" >
                      </div>
                    </div>

                    <div class="col-lg-1 col-md-2 form-group">
                      <label for="">Acc.Code:<span style="color:red">*</span></label>
                    </div>
                    <div class="col-lg-2 col-md-4 form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-user"></i></span>
                        </div>
                        <select class="form-control form-control-sm  js-example-basic-single" id="account_code" name="account_code">
                        </select>                                   
                        </div>
                    </div>

                    <div class="col-lg-1 col-md-2 form-group">
                      <label for="">Acc. Name:</label>
                    </div>
                    <div class="col-lg-2 col-md-4 form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-user"></i></span>
                        </div>
                        <input maxlength="30" type="text" name="account_name" id="account_name" style="background-color:#ccd4e1;font-weight:bold;" class="form-control form-control-sm" placeholder="Account Name" readonly tabindex="-1" >
                      </div>
                    </div>

                  </div>
                  <div class="row" style="border:1px solid gray;padding:20px;border-radius:5px;box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.2), 0 20px 20px 0 rgba(0, 0, 0, 0.19);">

                    <div class="col-lg-2 col-md-2 form-group">
                    <label for="">Opening Debit:</label>
                    </div>
                    <div class="col-lg-4 col-md-4 form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                        </div>
                        <input style="text-align:right;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" pattern="[0-9 ,._-]{1,}"  maxlength="30" type="text" name="debit" id="debit" class="form-control form-control-sm" placeholder="Opening Debit" > 
                      </div>
                    </div>

                    <div class="col-lg-2 col-md-2 form-group">
                      <label for="">Opening&nbsp;Credit:</label>
                    </div>
                    <div class="col-lg-4 col-md-4 form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                        </div>
                        <input style="text-align:right;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" pattern="[0-9 ,._-]{1,}" maxlength="30" type="text" name="credit" id="credit" class="form-control form-control-sm" placeholder="Opening Credit" > 
                      </div>
                    </div>

                    <div class="col-lg-2 col-md-2 form-group">
                      <label for="">Entries Debit :</label>
                    </div>
                    <div class="col-lg-4 col-md-4 form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                        </div>
                        <input style="text-align:right;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" pattern="[0-9 ,._-]{1,}"  maxlength="30" type="text" name="entries_debit" id="entries_debit" class="form-control form-control-sm" placeholder="Entries Debit" > 
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-2 form-group">
                      <label for="">Entries Credit:</label>
                    </div>
                    <div class="col-lg-4 col-md-4 form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                        </div>
                        <input style="text-align:right;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" pattern="[0-9 ,._-]{1,}" maxlength="30" type="text" name="entries_credit" id="entries_credit" class="form-control form-control-sm" placeholder="Entries Credit" > 
                      </div>
                    </div>

                    <div class="col-lg-2 col-md-2 form-group">
                    <label for="">Closing Debit :</label>
                    </div>
                    <div class="col-lg-4 col-md-4 form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                        </div>
                        <input style="text-align:right;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" pattern="[0-9 ,._-]{1,}"  maxlength="30" type="text" name="closing_debit" id="closing_debit" class="form-control form-control-sm" placeholder="Closing Debit" > 
                      </div>
                    </div>

                    <div class="col-lg-2 col-md-2 form-group">
                      <label for="">Closing Credit:</label>
                    </div>
                    <div class="col-lg-4 col-md-4 form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                        </div>
                        <input style="text-align:right;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" pattern="[0-9 ,._-]{1,}" maxlength="30" type="text" name="closing_credit" id="closing_credit" class="form-control form-control-sm" placeholder="Closing Credit" > 
                      </div>
                    </div>

                    <div class="col-lg-2 col-md-2 form-group">
                      <label for="">OpenDebit
                        2018 :</label>
                    </div>
                    <div class="col-lg-4 col-md-4 form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                        </div>
                        <input style="text-align:right;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" pattern="[0-9 ,._-]{1,}"  maxlength="30" type="text" name="debit_18" id="debit_18" class="form-control form-control-sm" placeholder="Opening Debit 2018" > 
                      </div>
                    </div>  

                    <div class="col-lg-2 col-md-2 form-group">
                    <label for="">Opening Credit&nbsp;2018:</label>
                    </div>
                    <div class="col-lg-4 col-md-4 form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                        </div>
                        <input style="text-align:right;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" pattern="[0-9 ,._-]{1,}" maxlength="30" type="text" name="credit_18" id="credit_18" class="form-control form-control-sm" placeholder="Opening Credit 2018" > 
                      </div>
                    </div>
                    
                  </div>
                  <br>
                  <div class="col-lg-12 form-group">
                    <div class="text-right">
                      <input type="submit" id="add" class="btn btn-primary " >
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

<div class="modal-backdrop fade show" id="backdrop" style="display: none;"></div>

<?php

include '../includes/security.php';
?>

<script>

$(document).ready(function(){
  $('#company_code').focus();

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
      party_code: {
        required: true,
      },
      account_code: {
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

    // account code dropdown
    $.ajax({
        url: 'api/setup/supplier_api.php',
        type: 'POST',
        data: {action: 'account_code'},
        dataType: "json",
        success: function(data){
            // console.log(data);
            $('#account_code').select2();
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

    $("#ajax-loader").hide();

    $("#party_form").on('change','#account_code',function(){
          var account_name=$('#account_code').find(':selected').attr("data-name");
          var account_code=$('#account_code').find(':selected').attr("data-code");
          $('#select2-account_code-container').html(account_code);
          $('#account_name').val(account_name); 
    });
 

    $("#party_form").on('change','#company_code',function(){
          var company_name=$('#company_code').find(':selected').attr("data-name");
          var company_code=$('#company_code').find(':selected').attr("data-code");
          $('#select2-company_code-container').html(company_code);
          $('#company_name').val(company_name); 
    });
    // on change control code
    
    $("#party_code").change(function(){
        $("#ajax-loader").show();
        var party_code = $("#party_code").val();
        var company_code=$("#company_code").val();
        // console.log(division_code);
        
        $("#msg1").html('');
        $.ajax({
          url: 'api/setup/supplier_api.php',
          type: 'POST',
          data: {action:'check_supplier_code',party_code:party_code,company_code:company_code},
          success: function (response) {
            $("#ajax-loader").hide();
            // console.log(response);
            if(response.status == "0"){
              $("#party_code").css("background-color", "pink");
            //   $("#msg1").css('display','');
              $("#msg1").text(response.message);
              $("#party_code").attr('placeholder',party_code);
              $("#party_code").val("");
            }else{
              $("#party_code").css("background-color", "");
              $("#msg1").text("");
            }
          },
          error: function(e) 
          {
            console.log(e);
            alert("Contact IT Department");
          }   
        
        });
        if(party_code != null){
            if(party_code.length== 3)
                party_code=party_code;
            else if(party_code.length== 2)
                party_code=0+party_code;
            else
                party_code=00+party_code;
            var party_account=3150001+party_code;
            $('#party_account').val(party_account);
        }
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
                  url: 'api/setup/supplier_api.php',
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
                            $.get('setup_files/add_supplier.php',function(data,status){
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
    $.get('setup_files/supplier_setup.php', function(data,status){
        $("#content").html(data);
    });
});
$("#add_party_breadcrumb").on("click", function () {
    $.get('setup_files/add_supplier.php', function(data,status){
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