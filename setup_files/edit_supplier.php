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
.select2-selection{
background-color: #b7edea !important  
}
input:focus,select:focus,textarea:focus,.select2-selection:focus, .add:focus, #submit:focus, .remove:focus{
-moz-box-shadow: 0 0 8px rgba(82,168,236,.6);
box-shadow: 0 0 8px orangered !important;
border: 3px solid black!important;
}
h2 {
color: black;
font-size: 34px;
position: relative;
text-transform: uppercase;
/* -webkit-text-stroke: 0.3vw #f7f7fe; */
font-weight:600;
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
font-weight:600;
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
.select2-container{
width: 73% !important;
font-size: 11px !important;
}
.form-group{margin-bottom:5px !important}
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
          <h1>Supplier  Information Edit</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
            <li class="breadcrumb-item active"><button class="btn btn-sm" id="setup_breadcrumb">Setup</button></li>
            <li class="breadcrumb-item"><button class="btn btn-sm" id="party_setup_breadcrumb">Supplier Setup</button></li>
            <li class="breadcrumb-item"><button class="btn btn-sm" id="edit_party_breadcrumb" disabled>Edit Supplier</button></li>
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
                <form method="post" id="supplier_form">
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
                      <input class="form-control form-control-sm" style="background-color:#ccd4e1;font-weight:bold;" id="company_code" name="company_code" readonly>                                  
                    </div>
                  </div>

                  <div class="col-lg-1 col-md-2 form-group">
                  <label for="">Co.Name:</label>
                  </div>
                  <div class="col-lg-2 col-md-4 form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-user"></i></span>
                      </div>
                      <input maxlength="30" type="text" name="company_name" id="company_name" style="background-color:#ccd4e1;font-weight:bold;" class="form-control form-control-sm" placeholder="Company Name" readonly tabindex="-1" >
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
                      <input maxlength="30" type="text" name="party_name" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" id="party_name" class="form-control form-control-sm" placeholder="Party Name"  >
                    </div>
                  </div>

                  <div class="col-lg-1 col-md-2 form-group">
                    <label for="">PAccCode:</label>
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
                  <label for="">Address:<span style="color:red">*</span></label>
                  </div>
                  <div class="col-lg-8 col-md-4 form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-address-card"></i></span>
                      </div>
                      <textarea rows="1" name="address" id="address" class="form-control form-control-sm" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" placeholder="Address" ></textarea>
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
                      <input maxlength="30" type="text" name="person" id="person" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" class="form-control form-control-sm" placeholder="Person Name"  >
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
                      <input type="email" id="email" name="email" class="form-control form-control-sm" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Enter Valid Email Address">
                    </div>
                  </div>

                  <div class="col-lg-1 col-md-2 form-group">
                    <label for="">CNIC&nbsp;No:<span style="color:red">*</span></label>
                  </div>
                  <div class="col-lg-2 col-md-4 form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-id-card"></i></span>
                      </div>
                      <input type="text" name = "cnic_no" id="cnic_no" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" placeholder="xxxxx-xxxxxxx-x" value="" class="form-control form-control-sm" data-inputmask="&quot;mask&quot;: &quot;99999-9999999-9&quot;" data-mask="" inputmode="text">
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
                    <label for="">NTN No:</label>
                  </div>
                  <div class="col-lg-2 col-md-4 form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                      </div>
                      <input maxlength="30" type="number" name="ntn_no" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" id="ntn_no" class="form-control form-control-sm" placeholder="NTN Number 1-9" >
                    </div>
                  </div>

                  <div class="col-lg-1 col-md-2 form-group">
                    <label for="">Acc.&nbsp;Code:<span style="color:red">*</span></label>
                  </div>
                  <div class="col-lg-2 col-md-4 form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-user"></i></span>
                      </div>
                      <select class="form-control form-control-sm  js-example-basic-single"  id="account_code" name="account_code">
                      </select>                                   
                    </div>
                  </div>

                  <div class="col-lg-1 col-md-2 form-group">
                    <label for="">Acc.&nbsp;Name:</label>
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
                    <label for="">Opening Debit :</label>
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
                    <label for="">Opening Credit :</label>
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
                    <label for="">Open Debit 2018 :</label>
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
                    <label for="">Opening Credit 2018:</label>
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
    $('#party_code').focus();
      $("#supplier_form").on('change','#credit',function(){
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

      $("#supplier_form").on('change','#debit',function(){
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
      $("#supplier_form").on('change','#credit_18',function(){
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
      $("#supplier_form").on('change','#debit_18',function(){
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
      $("#supplier_form").on('change','#entries_credit',function(){
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
      $("#supplier_form").on('change','#entries_debit',function(){
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
      $("#supplier_form").on('change','#closing_credit',function(){
        var credit=$('#closing_credit').val();
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
          $('#closing_credit').val(credit);
        }
      });
      $("#supplier_form").on('change','#closing_debit',function(){
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
    var company_code = <?php echo $_GET['company_code'] ?>;
    var party_code = <?php echo $_GET['party_code'] ?>;
    // $('#control_code').val(control_code);
    $('#party_code').val(party_code);
    $('#company_code').val(company_code);
    // console.log(company_code);
    // $('#division').select2();
    // $('#division').select2();
    $('.js-example-basic-single').select2();
    $("#ajax-loader").show();
    // company code dropdown
    $.ajax({
      url: 'api/setup/supplier_api.php',
        type: 'POST',
        data: {action: 'company_code',company_code:company_code},
        dataType: "json",
        success: function(response){
            // console.log(response);
            $('#company_name').val(response.co_name); 
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });  
    $("#supplier_form").on('change','#account_code',function(){
          var account_name=$('#account_code').find(':selected').attr("data-name");
          var account_code=$('#account_code').find(':selected').attr("data-code");
          $('#select2-account_code-container').html(account_code);
          $('#account_name').val(account_name); 
    });
      
    $("#ajax-loader").show();
    var COMPANY_CODE = <?php echo $_GET['company_code'] ?>;
    var P_CODE = <?php echo $_GET['party_code'] ?>;
    $.ajax({
          url : 'api/setup/supplier_api.php',
          type : "post",
          data:{action:'EDIT',COMPANY_CODE:COMPANY_CODE,P_CODE:P_CODE},
      dataType: "json",
          success: function(response)
          {
              console.log(response);
              // $('#company_code').val(response.co_code);
              $('#party_code').val(response.PARTY_CODE);
              $('#party_name').val(response.PARTY_NAME);
              $('#address').val(response.ADDRESS);
              $('#person').val(response.CONTACT_NAME);
              $('#contact_no').val(response.PHONE_NOS);
              $('#email').val(response.E_MAIL);
              $('#gst_no').val(response.GST);
              $('#ntn_no').val(response.NTN);
              $('#cnic_no').val(response.NIC_NBR);
              $('#party_account').val(response.SUPP_DIVISION);
              $('#debit_18').val(response.OPEN_DEBIT_2018);
              $('#credit_18').val(response.OPEN_CREDIT_2018);
            
            
              // account code dropdown
              $.ajax({
                  url: 'api/setup/supplier_api.php',
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
                      $('#account_code').val(response.GL_CODE);
                      setTimeout(function(){
                        var account_name=$('#account_code').find(':selected').attr("data-name");
                        var account_codes=$('#account_code').find(':selected').attr("data-code");
                        $('#select2-account_code-container').html(account_codes);
                        $('#account_name').val(account_name); 
                      },1000);
                    },
                  error: function(error){
                      console.log(error);
                      alert("Contact IT Department");
                  }
              });
                $("#ajax-loader").hide();
              //add commas and dot in amount
              var debit=new Intl.NumberFormat(
              'en-US', { style: 'currency', 
                currency: 'USD',
              currencyDisplay: 'narrowSymbol'}).format(response.OPEN_DEBIT);
              var debit=debit.replace(/[$]/g,'');
              $('#debit').val(debit);
              var credit=new Intl.NumberFormat(
              'en-US', { style: 'currency', 
                currency: 'USD',
              currencyDisplay: 'narrowSymbol'}).format(response.OPEN_CREDIT);
              var credit=credit.replace(/[$]/g,''); 
              $('#credit').val(credit);

              var debit_18=new Intl.NumberFormat(
              'en-US', { style: 'currency', 
                currency: 'USD',
              currencyDisplay: 'narrowSymbol'}).format(response.OPEN_DEBIT_2018);
              var debit_18=debit_18.replace(/[$]/g,'');
              $('#debit_18').val(debit_18);
              var credit_18=new Intl.NumberFormat(
              'en-US', { style: 'currency', 
                currency: 'USD',
              currencyDisplay: 'narrowSymbol'}).format(response.OPEN_CREDIT_2018);
              var credit_18=credit_18.replace(/[$]/g,''); 
              $('#credit_18').val(credit_18);
              
              var entries_debit=new Intl.NumberFormat(
              'en-US', { style: 'currency', 
                currency: 'USD',
              currencyDisplay: 'narrowSymbol'}).format(response.TRS_DEBIT);
              var entries_debit=entries_debit.replace(/[$]/g,'');
              $('#entries_debit').val(entries_debit);
              var entries_credit=new Intl.NumberFormat(
              'en-US', { style: 'currency', 
                currency: 'USD',
              currencyDisplay: 'narrowSymbol'}).format(response.TRS_CREDIT);
              var entries_credit=entries_credit.replace(/[$]/g,''); 
              $('#entries_credit').val(entries_credit);;
          
          },
          error: function(e) 
          {
            console.log(e);
            alert("Contact IT Department");
          }
    });
      
    //update
    $("#supplier_form").on("submit", function (e) {  
      if ($("#supplier_form").valid())
      { 
        $("#ajax-loader").show();
        e.preventDefault();
        var formData = new FormData(this);
        var company_code= $('#company_code').val();
        var party_code= $('#party_code').val();
        formData.append('company_code',company_code);
        formData.append('party_code',party_code);
        formData.append('action','update');
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
                          $.get('setup_files/supplier_setup.php',function(data,status){
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
  $("#party_setup_breadcrumb").on("click", function () {
      $.get('setup_files/supplier_setup.php', function(data,status){
          $("#content").html(data);
      });
  });
  $("#edit_party_breadcrumb").on("click", function () {
      $.get('setup_files/edit_supplier.php', function(data,status){
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