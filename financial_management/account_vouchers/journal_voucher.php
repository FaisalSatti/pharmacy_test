<?php
session_start();
?>
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Journal Voucher</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="fm_breadcrumb"> Financial Management</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="account_voucher_breadcrumb"> Account Voucher</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="add_journal_voucher_breadcrumb">Add Journal Voucher</button></li>
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
        <div class="card" style="box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;">
                    <div class="card-body">
              <div class="container">
                <form method = "post" id = "voucher_form">
                  <?php include '../../display_message/display_message.php'?>
                  <div class="row"  style="margin-top:-14px;border-radius:4px;border  :2px solid #1e293b; padding-top:8px;box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
                               <div class="col-lg-1 col-md-2 col-sm-12 form-group">
                      <label for="">V-No</label>
                  </div>
                      <div class="col-lg-2 col-md-4 col-sm-12 form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                            </div>
                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" style="background-color:#ccd4e1;font-weight:bold;" name="voucher_no" id="voucher_no" class="form-control form-control-sm" placeholder="Voucher No" readonly>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-2 col-sm-12 form-group">
                      <label for="">Date:</label><span style="color:red;">*</span>
                      </div>
                      <div class="col-lg-2 col-md-4 col-sm-12 form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen"></i></span>
                            </div>
                            <input type="date" name="voucher_date" id="voucher_date" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px" class="form-control form-control-sm" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-2 col-sm-12 form-group">
                      <label for="">Ref No:</label>
                      </div>
                      <div class="col-lg-2 col-md-4 col-sm-12 form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                            </div>
                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px" name="reference_no" id="reference_no" class="form-control form-control-sm" placeholder="Reference No" >
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-2 col-sm-12 form-group">
                      <label for="">Year:</label><span style="color:red;">*</span>
                      </div>
                      <div class="col-lg-2 col-md-4 col-sm-12 form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen"></i></span>
                            </div>
                            <input type="number" name="year" id="year" style="background-color:#ccd4e1;font-weight:bold;" class="form-control form-control-sm" min="1900" max="2099" step="1" value="<?php echo date("Y"); ?>" readonly tabindex="-1">
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-2 col-sm-12 form-group">
                      <label for="">CoCode:<span style="color:red">*</span></label>
                      </div>
                      <div class="col-lg-2 col-md-4 col-sm-12 form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                            </div>
                            <select class="form-control js-example-basic-single  form-control-sm" id="company_code" name="company_code">
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-2 col-sm-12 form-group">
                      <label for="inputCompanyName">CoName:</label><span style="color:red;">*</span>
                      </div>
                      <div class="col-lg-2 col-md-4 col-sm-12 form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen"></i></span>
                            </div>
                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" style="background-color:#ccd4e1;font-weight:bold;" name="company_name" id="company_name" class="form-control form-control-sm" placeholder="Company Name" readonly tabindex="-1">
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-2 col-sm-12 form-group">
                      <label for="">Monthwise#:</label>
                      </div>
                      <div class="col-lg-2 col-md-4 col-sm-12 form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                            </div>
                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px" name="monthwise_ser_no" id="monthwise_ser_no" class="form-control form-control-sm" placeholder="MonthWise Ser#" >
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-2 col-sm-12 form-group">
                      <label for="">Ser#:</label>
                      </div>
                      <div class="col-lg-2 col-md-4 col-sm-12 form-group">
                        <div class="input-group">
                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px" name="payee" id="payee" class="form-control form-control-sm" placeholder="Payee" >
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-2 col-sm-12 form-group">
                      <label for="">Ser#:</label>
                      </div>
                      <div class="col-lg-2 col-md-4 col-sm-12 form-group">
                        <div class="input-group">
                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px" name="mvoucher_no" id="mvoucher_no" class="form-control form-control-sm" placeholder="mVoucher # " >
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-2 col-sm-12 form-group">
                      <label for="">Narration:</label>
                      </div>
                      <div class="col-lg-8 col-md-4 col-sm-12 form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen"></i></span>
                            </div>
                            <textarea rows="1" name="narration" id="narration" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px" class="form-control form-control-sm" placeholder="Narration" ></textarea>
                        </div>
                    </div>
                  </div>
                    <div class="row justify-content-center">
                        <div class="col-sm-12">
                            <div style="height:50px" class="loading">
                              <span style="text-align:center;font-weight:bold;">Account Details</span>
                            </div>
                        </div>
                    </div>
                  <div class="card-body">
                    <form id="d" name="geek">
                    <table id="example1" class="table table-bordered table-striped table-responsive-lg" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">
                                    <thead>
                            <tr>
                                <th>Account Code</th>
                                <th>Account Description</th>
                                <th>Depart Code</th>
                                <th>Depart Name</th>
                                <th >Vehicle#</th>
                                <th>Memo</th>
                                <th>Debit</th>
                                <th>Credit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="d_items">
                          <tr id="main_tr">
                              <td ><select style="font-size:12px" name="" id = "acc_desc" class="form-control form-control-sm js-example-basic-single acc_desc"></select></td>
                              <td ><textarea style="font-size:12px;background-color:#ccd4e1;"  rows="1"  name="" id = "detail" class="form-control form-control-sm detail" readonly tabindex="-1"></textarea></td>
                              <td ><select style="font-size:12px;" name="" id = "depart_desc" class="form-control form-control-sm js-example-basic-single depart_desc"></select></td>
                              <td ><textarea style="font-size:12px;background-color:#ccd4e1;"  rows="1"  name="" id = "depart_detail" class="form-control form-control-sm depart_detail" readonly tabindex="-1"></textarea></td>
                              <td><select style="font-size:10px;" name="" id = "vehicle_code" class="form-control form-control-sm  vehicle_code"></select></td>
                              <td ><textarea style="font-size:12px"  rows="1"  name="" id = "memo" class="form-control form-control-sm memo"></textarea></td>
                              <td><input style="text-align:right; padding:0 13px 0 0"  pattern="[a-zA-Z0-9 ,._-]{1,}" type="text"  name="" id = "debit" class="form-control form-control-sm debit"></td>
                              <td><input style="text-align:right; padding:0 13px 0 0"  pattern="[a-zA-Z0-9 ,._-]{1,}" type="text"  name="" id = "credit" class="form-control form-control-sm credit"></td>
                              <td><button type = "button" class="btn btn-sm btn-primary add"><i class="fa fa-plus"></i></button></td>
                          </tr>
                        </tbody>
                        <tr id="last_tr">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td colspan="2" style="text-align:right;">Total</td>
                            <td style="font-weight:bold;text-align:right;" id = "debit_total">0</td>
                            <td style="font-weight:bold;text-align:right;" id = "credit_total">0</td>
                            <td colspan="2"></td>
                        </tr>
                      </table>
                    </form>
                    <div style="text-align: center;">
                        <span id="msg" style="color: red;font-size: 13px;"></span>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12 text-right">
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
                  
                    

      <!-- /.content -->
</div>
<!-- ./wrapper -->
<style>
body{
    form:90%;
  }
select{
width:82% !important;
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
margin-top: -1%;
padding-top: -1%;
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
.select2-selection{
background-color: #ccd4e1 !important  
}
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap");
h2 {
color: black;
font-size: 34px;
position: relative;
text-transform: uppercase;
/* -webkit-text-stroke: 0.3vw #f7f7fe; */
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
table {
font-family: arial, sans-serif;
border-collapse: collapse;
width: 100%;
}
td,th {
border: 1px solid #dddddd;
text-align: left;
font-size:15px
/* padding: 8px; */
}
tr:nth-child(even) {
background-color: #dddddd;
}
.select2-container{
width:70% !important;
/* border: 1px solid #d9dbde */
}
.amount::placeholder { 
text-align:right !important
}
@media only screen and (min-width: 250px) and (max-width: 350px) {
.select2-container{
width:82% !important;
}
}
@media only screen and (min-width:351px) and (max-width: 373px) {
.select2-container{
width:81% !important;
}
}
@media only screen and (min-width: 374px) and (max-width: 575px) {
.select2-container{
width:88% !important;
}
}
@media screen and (min-width: 576px) and (max-width:767px) {
.select2-container{
width:92% !important;
} 
}
@media screen and (min-width: 768px) and (max-width:991px) {
.select2-container{
width:78% !important;
} 
}
@media screen and (min-width: 992px) and (max-width:1077px) {
.select2-container{
width:65% !important;
} 
}
@media screen and (min-width: 1200px) and (max-width:1440px) {
.select2-container{
width:73% !important;
} 
}
td .select2-container{
width:100% !important;
/* border: 1px solid #d9dbde */
}
.table td, .table th {
padding:0.35rem !important;
}
.table th{
text-align:center !important;
}
.select2-container *:focus {
    outline: none !important;
    border: 2px solid black !important
}
input:focus,select:focus,textarea:focus,.select2-selection:focus{
-moz-box-shadow: 0 0 8px rgba(82,158,236,.6);
box-shadow: 0 0 8px orangered !important;}
.select2-selection--single{
  background:#b7edea !important;
}
</style>

<?php

include '../../includes/security.php';
?>


<script>
  $('#voucher_date').on( 'keyup', function( e ) {
    if( e.which == 9 ) {
        $('#reference_no').focus();
    }
} );
$(document).ready(function(){
  $('#voucher_date').focus();
  //debit change
  $("#voucher_form").on('focus','.debit',function(){
      var button_id = $(this).attr("id");
      if(button_id =='debit'){
        var p_debit_id='';
      }else{
        var p_debitid = button_id.split("t");
        var p_debit_id=p_debitid[1];
      }
      var previous_debit= $('#debit'+p_debit_id).val();
      sessionStorage.setItem("previous_debit", previous_debit);
  });
  $("#voucher_form").on('change','.debit',function(){
    var previous_debits=sessionStorage.getItem('previous_debit');
    if(previous_debits == ""){
        previous_debit=0;
    }else{
        previous_debit = previous_debits.replaceAll(',','');  
    }
    var total=$('#debit_total').text();
    console.log(total);
    if(total == '' || total == '0' || total=='0.00'){
        minuss=0;
    }else{
        minus_t = total.replaceAll(',','');  
        minuss= parseFloat(minus_t) - parseFloat(previous_debit);
    }
    // console.log(minuss);
    var button_id = $(this).attr("id");
    if(button_id =='debit'){
      debit_id='';
    }else{
    var debitid = button_id.split("t");
    debit_id=debitid[1];
    }
    var credit=$('#credit'+debit_id).val();
    var debit=$('#debit'+debit_id).val();
    // console.log(debit);
    if(credit !='0.00' && credit !='' && credit !='0'){
      $('#msg').html("Credit or Debit has to be null")
    }else{
        if(debit == '' || debit == '0' || debit=='0.00' || isNaN(debit)){
            $('#debit'+debit_id).val(0);
            debit=$('#debit'+debit_id).val();
            var fnf=parseFloat(minuss) +parseFloat(debit);
        }else{
            if (debit.indexOf(',') > -1) { 
                pre_debit = debit.replaceAll(',','');  
                var debit=new Intl.NumberFormat(
                'en-US', { style: 'currency', 
                currency: 'USD',
                currencyDisplay: 'narrowSymbol'}).format(pre_debit);
                var debit=debit.replace(/[$]/g,'');
                var  show_debit=debit;
                var fnf=parseFloat(minuss) +parseFloat(pre_debit);
            }else{
                var debits=new Intl.NumberFormat(
                'en-US', { style: 'currency', 
                currency: 'USD',
                currencyDisplay: 'narrowSymbol'}).format(debit);
                var amunt=debits.replace(/[$]/g,'');
                var show_debit=amunt;
                var fnf=parseFloat(minuss) +parseFloat(debit);
            }
        }
      var total=new Intl.NumberFormat(
      'en-US', { style: 'currency', 
        currency: 'USD',
      currencyDisplay: 'narrowSymbol'}).format(fnf);
      var total=total.replace(/[$]/g,'');
      $('#debit_total').text(total);
      $('#debit'+debit_id).val(show_debit);
    }
  }); 
  //credit change
  $("#voucher_form").on('focus','.credit',function(){
      var button_id = $(this).attr("id");
      if(button_id =='credit'){
        var p_credit_id='';
      }else{
        var p_creditid = button_id.split("t");
        var p_credit_id=p_creditid[1];
      }
      var previous_credit= $('#credit'+p_credit_id).val();
      sessionStorage.setItem("previous_credit", previous_credit);
  });
  $("#voucher_form").on('change','.credit',function(){
    var previous_credits=sessionStorage.getItem('previous_credit');
    if(previous_credits == ""){
      previous_credit=0;
    }else{
      previous_credit = previous_credits.replaceAll(',','');  
    }
    var total=$('#credit_total').text();
    if(total == '' || total == '0' || total=='0.00'){
      minuss=0;
    }else{
      minus_t = total.replaceAll(',','');  
      minuss= parseFloat(minus_t) - parseFloat(previous_credit);
    }
    var button_id = $(this).attr("id");
    if(button_id =='credit'){
      credit_id='';
    }else{
    var creditid = button_id.split("t");
    credit_id=creditid[1];
    }
    var credit=$('#credit'+credit_id).val();
    var debit=$('#debit'+credit_id).val();
    if(debit !='0.00' && debit !='' && debit !='0'){
      $('#msg').html("Credit or Debit has to be null");
    }else{
        if(credit == '' || credit == '0' || credit=='0.00' || isNaN(credit)){
            $('#credit'+credit_id).val(0);
            credit=$('#credit'+credit_id).val();
            var fnf=parseFloat(minuss) +parseFloat(credit);
        }else{
            if (credit.indexOf(',') > -1) { 
                pre_credit = credit.replaceAll(',','');
                var credit=new Intl.NumberFormat(
                'en-US', { style: 'currency', 
                currency: 'USD',
                currencyDisplay: 'narrowSymbol'}).format(pre_credit);
                var credit=credit.replace(/[$]/g,'');
                var  show_credit=credit;
                var fnf=parseFloat(minuss) +parseFloat(pre_credit);
            }else{
                var credits=new Intl.NumberFormat(
                'en-US', { style: 'currency', 
                currency: 'USD',
                currencyDisplay: 'narrowSymbol'}).format(credit);
                var amunt=credits.replace(/[$]/g,'');
                var show_credit=amunt;
                var fnf=parseFloat(minuss) +parseFloat(credit);
            }
        }
        console.log(total);
        var total=new Intl.NumberFormat(
        'en-US', { style: 'currency', 
            currency: 'USD',
        currencyDisplay: 'narrowSymbol'}).format(fnf);
        var total=total.replace(/[$]/g,'');
        $('#credit_total').text(total);
        $('#credit'+credit_id).val(show_credit);
    }
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
      $('#voucher_form').validate({
        rules: {
          voucher_date: {
            required: true,
          },
          year: {
            required: true,
          },
          company_code: {
            required: true,
          },
          company_name: {
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
$("#voucher_form").on('change','#voucher_date',function(){
  var date = new Date($('#voucher_date').val());
  var year = date.getFullYear();
  $('#year').val(year);
  });
    
$('#example1').ready(function(){
  
      // company code dropdown
      $.ajax({
          url: 'api/setup/chart_of_account/control_account_api.php',
          type: 'POST',
          data: {action: 'company_code'},
          dataType: "json",
          success: function(response){
              // $("#ajax-loader").show();
              // console.log(response);
              $('#company_code').html('');
              $('#company_code').append('<option value="" selected disabled>Select Company</option>');
              $.each(response, function(key, value){
                  $('#company_code').append('<option data-name="'+value["co_name"]+'"  data-code='+value["co_code"]+' value='+value["co_code"]+'>'+value["co_code"]+' - '+value["co_name"]+'</option>');
              });
          },
          error: function(error){
              console.log(error);
              alert("Contact IT Department");
          }
      });
      // department code dropdown
      $.ajax({
          url: 'api/financial_management/account_vouchers/cash_receipts_api.php',
          type: 'POST',
          data: {action: 'department_code'},
          dataType: "json",
          success: function(response){
              // $("#ajax-loader").show();
              // console.log(response);
              $('#depart_desc').html('');
              $('#depart_desc').append('<option value="0" selected readonly="readonly">Select Deprt</option>');
              $.each(response, function(key, value){
                  $('#depart_desc').append('<option data-name="'+value["dept_name"]+'"  data-code='+value["dept_code"]+' value='+value["dept_code"]+'>'+value["dept_code"]+' - '+value["dept_name"]+'</option>');
              });
          },
          error: function(error){
              console.log(error);
              alert("Contact IT Department");
          }
      });
      // Vehicle code dropdown
      $.ajax({
          url: 'api/financial_management/account_vouchers/cash_receipts_api.php',
          type: 'POST',
          data: {action: 'vehicle_code'},
          dataType: "json",
          success: function(response){
              // $("#ajax-loader").show();
              // console.log(response);
              $('#vehicle_code').html('');
              $('#vehicle_code').addClass('js-example-basic-single');
              $('.js-example-basic-single').select2();
              $('#vehicle_code').append('<option value="0" selected readonly="readonly">Select Veh#</option>');
              $.each(response, function(key, value){
                  $('#vehicle_code').append('<option value='+value["vehicle_code"]+'>'+value["vehicle_code"]+'</option>');
              });
          },
          error: function(error){
              console.log(error);
              alert("Contact IT Department");
          }
      });
      
      //on chAnge department code
      $("#voucher_form").on('change','#depart_desc',function(){
        var dept_name=$('#depart_desc').find(':selected').attr("data-name");
        var dept_desc=$('#depart_desc').find(':selected').attr("data-code");
        $('#select2-depart_desc-container').html(dept_desc);
        $('#depart_detail').val(dept_name);
      });
      //on chAnge company code
      $("#voucher_form").on('change','#company_code',function(){
          $("#ajax-loader").show();
          var rowCount = $("#example1 tr").length;
          console.log(rowCount);
          if(rowCount == 3){
            $('#acc_desc').val('');
            $('#detail').val('');
            $('#depart_desc').val('');
            $('#depart_detail').val('');
            $('#vehicle_code').val('');
            $('#memo').val('');
            $('#debit').val('');
            $('#credit').val('');
            $('#debit_total').text(0);
            $('#credit_total').text(0);
            $('#total').val('');
            $('#debit').val('');
          }else{
            for(var a=2;a<rowCount -1;a++){
              var d=a-1;
              $('#tr'+d+'').remove(); 
              $('#total').text('0');
              $('#debit').val('');
            }
          }
          $('#bank').val('');
          $('#select2-company_code-container').val('');
          $('#title').val('');
          var company_name=$('.js-example-basic-single').find(':selected').attr("data-name");
          var company_code=$('.js-example-basic-single').find(':selected').attr("data-code");
          $('#select2-company_code-container').html(company_code);
          $('#company_name').val(company_name);
          
          // cash account dropdown
          $.ajax({
              url: 'api/financial_management/account_vouchers/cash_receipts_api.php',
              type: 'POST',
              data: {action: 'cash_accounts',company_code:company_code},
              dataType: "json",
              success: function(response){
                  $("#ajax-loader").hide();
                  console.log(response);
                  $('#bank').html('');
                  $('#bank').append('<option value="" selected disabled>Select Control</option>');
                    $.each(response, function(key, value){
                        $('#bank').append('<option data-name="'+value["descr"]+'"  data-code='+value["account_code"]+' value='+value["account_code"]+'>'+value["account_code"]+' - '+value["descr"]+'</option>');
                    });
              },
              error: function(error){
                  console.log(error);
                  alert("Contact IT Department");
              }
          });
          // ACCOUNT code dropdown
          $.ajax({
              url: 'api/financial_management/account_vouchers/cash_receipts_api.php',
              type: 'POST',
              data: {action: 'account_code',company_code:company_code},
              dataType: "json",
              success: function(response){
                  // $("#ajax-loader").show();
                  // console.log(response);
                  $('#acc_desc').html('');
                  $('#acc_desc').append('<option value="" selected disabled>Select Account</option>');
                  $.each(response, function(key, value){
                      $('#acc_desc').append('<option data-name="'+value["descr"]+'"  data-code='+value["account_code"]+' value='+value["account_code"]+'>'+value["account_code"]+' - '+value["descr"]+'</option>');
                  });
              },
              error: function(error){
                  console.log(error);
                  alert("Contact IT Department");
              }
          });     
      });
      
      //on chAnge company code
      $("#voucher_form").on('change','#bank',function(){
          var bank_detail=$('#bank').find(':selected').attr("data-name");
          // console.log(bank_detail);
          var bank_code=$('#bank').find(':selected').attr("data-code");
          // console.log(detail);
          $('#select2-bank-container').html(bank_code);
          $('#title').val(bank_detail);
      });
      
      //on chAnge company code
      $("#voucher_form").on('change','#acc_desc',function(){
          var account_code=$('#acc_desc').find(':selected').val();
          // console.log(account_code);
          var detail=$('#acc_desc').find(':selected').attr("data-name");
          // console.log(detail);
          $('#select2-acc_desc-container').html(account_code);
          $('#detail').val(detail);
      });
        //on chAnge account code
        $("#voucher_form").on('change','.acc_desc',function(){
            var target = event.target || event.srcElement;
            var id = target.id;
            var id = id.split("-");
            id=id[1];
            var id = id.split("acc_desc");
            id=id[1];
            var account_code=$('#acc_desc'+id).find(':selected').val();
            // console.log(account_code);
            var detail=$('#acc_desc'+id).find(':selected').attr("data-name");
            // console.log(detail);
            $('#select2-acc_desc'+id+'-container').html(account_code);
            $('#detail'+id).val(detail);
        });
        //on chAnge depart code
        $("#voucher_form").on('change','.depart_desc',function(){
            var target = event.target || event.srcElement;
            var id = target.id;
            var id = id.split("-");
            id=id[1];
            var id = id.split("c");
            id=id[1];
            var depart_code=$('#depart_desc'+id).find(':selected').val();
            // console.log(depart_code);
            var depart_detail=$('#depart_desc'+id).find(':selected').attr("data-name");
            // console.log(depart_detail);
            $('#select2-depart_desc'+id+'-container').html(depart_code);
            $('#depart_detail'+id).val(depart_detail);
        });

});
$('#example1').ready(function(){
  var i = 0;
  var total_amount = 0;
  $('.add').click(function(){
    var company_code=$('#company_code').val();
    i++;
    // console.log(i);
    var acc_desc = $('#acc_desc').val();
    var detail = $("#detail").val();
    var depart_desc = $('#depart_desc').val();
    var depart_detail = $("#depart_detail").val();
    var vehicle_code = $("#vehicle_code").val();
    var memo = $("#memo").val();
    var debits = $("#debit").val();
    if(debits == ""){
      debit=0;
      // console.log();
    }else{
      myStr_d = debits.replace(/[^\d\,\.]/g, '');  
      let commaNotation = /^\d+(\.\d{3})?\,\d{2}$/.test(myStr_d);
      debit = commaNotation ?
      Math.round(parseFloat(debits.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
      Math.round(parseFloat(debits.replace(/[^\d\.]/g, '')));
    }
    var credits = $("#credit").val();
    if(credits == ""){
      credit=0;
      // console.log();
    }else{
      myStr_c = credits.replace(/[^\d\,\.]/g, '');  
      let commaNotations = /^\d+(\.\d{3})?\,\d{2}$/.test(myStr_c);
      credit = commaNotations ?
      Math.round(parseFloat(credits.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
      Math.round(parseFloat(credits.replace(/[^\d\.]/g, '')));
    }
    if(debit == '0' && credit == '0'){
        $('#msg').text("debit or credit cannot be the null.");
    }else if(memo == ""){
        $('#msg').text("memo cannot be the null.");
    }else if(acc_desc == null){
        $('#msg').text("account cannot be the null.");
    }else{
        if(debit != '0' && credit != '0'){
        $('#msg').text("debit or credit has to be the null.");
        }else{
            $('#msg').text("");
            
            // values empty
            $("#debit").val('');
            $("#credit").val('');
            $("#detail").val('');
            $("#memo").val('');
            $("#vehicle_code").val('');
            $("#depart_detail").val('');
    
            $('#d_items tr:last').before('<tr id="tr'+i+'"><td><select name="acc_desc[]" id = "acc_desc'+i+'" class="form-control js-example-basic-single acc_desc" ></td><td><textarea rows="1" name="detail[]" id = "detail'+i+'" style="background-color:#ccd4e1;" class="form-control form-control-sm detail" readonly tabindex="-1"></textarea></td><td><select name="depart_desc[]" id = "depart_desc'+i+'" class="form-control js-example-basic-single depart_desc" ></td><td><textarea rows="1" name="depart_detail[]" id = "depart_detail'+i+'" style="background-color:#ccd4e1;" class="form-control form-control-sm depart_detail" readonly tabindex="-1"></textarea></td><td><select name="vehicle_code[]" id="vehicle_code'+i+'" class="form-control js-example-basic-single vehicle_code"></td><td><textarea rows="1" name = "memo[]" id = "memo'+i+'" class = "form-control form-control-sm memo"></textarea></td><td><input type="text" name="debit[]" id = "debit'+i+'" class="form-control form-control-sm debit"></td><td><input type="text" name="credit[]" id = "credit'+i+'" class="form-control form-control-sm credit"></td><td><button type = "button" id="'+i+'" class="btn btn-sm btn-danger remove"><b>X<b></button></td></tr>');
            
            // ACCOUNT code dropdown
            $.ajax({
                url: 'api/financial_management/account_vouchers/cash_receipts_api.php',
                type: 'POST',
                data: {action: 'account_code',company_code:company_code},
                dataType: "json",
                success: function(data){
                    // $("#ajax-loader").show();
                    // console.log(data);
                    $('#acc_desc').html('');
                    $('#acc_desc').append('<option value="" selected disabled>Select Account</option>');
                    $.each(data, function(key, value){
                        $('#acc_desc').append('<option data-name="'+value["descr"]+'"  data-code='+value["account_code"]+' value='+value["account_code"]+'>'+value["account_code"]+' - '+value["descr"]+'</option>');
                        // console.log(value["DESCR"]);
                    });
                },
                error: function(error){
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
            // ACCOUNT code dropdown
            $.ajax({
                url: 'api/financial_management/account_vouchers/cash_receipts_api.php',
                type: 'POST',
                data: {action: 'account_code',company_code:company_code},
                dataType: "json",
                success: function(response){
                    // $("#ajax-loader").show();
                    // console.log(response);
                    $('#acc_desc'+i).html('');
                    $('#acc_desc'+i).addClass('js-example-basic-single');
                    $('.js-example-basic-single').select2();
                    $('#acc_desc'+i).append('<option value="" selected disabled>Select Account</option>');
                    // var j=1;
                    $.each(response, function(key, value){
                        $('#acc_desc'+i).append('<option data-name="'+value["descr"]+'"  data-code='+value["account_code"]+' value='+value["account_code"]+'>'+value["account_code"]+' - '+value["descr"]+'</option>');
                        if(value["account_code"]== acc_desc){
                            acc_desc= value["account_code"];
                            // console.log(acc_desc);
                            $('#acc_desc'+i+' option[value='+acc_desc+']').prop("selected", true);
                        } 
                    });
                },
                error: function(error){
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
            //on chAnge account code
            $("#voucher_form").on('change','#acc_desc',function(){
                var account_code=$('#acc_desc').find(':selected').val();
                // console.log(account_code);
                var detail=$('#acc_desc').find(':selected').attr("data-name");
                // console.log(detail);
                $('#select2-acc_desc-container').html(account_code);
                $('#detail').val(detail);
                // console.log(detail);
            });
            // department code dropdown
            $.ajax({
                url: 'api/financial_management/account_vouchers/cash_receipts_api.php',
                type: 'POST',
                data: {action: 'department_code'},
                dataType: "json",
                success: function(response){
                    // $("#ajax-loader").show();
                    // console.log(response);
                    $('#depart_desc').html('');
                    $('#depart_desc').append('<option value="0" selected readonly="readonly">Select Deprt</option>');
                    $.each(response, function(key, value){
                        $('#depart_desc').append('<option data-name="'+value["dept_name"]+'"  data-code='+value["dept_code"]+' value='+value["dept_code"]+'>'+value["dept_code"]+' - '+value["dept_name"]+'</option>');
                    });
                },
                error: function(error){
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
            // department code loop dropdown
            $.ajax({
                url: 'api/financial_management/account_vouchers/cash_receipts_api.php',
                type: 'POST',
                data: {action: 'department_code'},
                dataType: "json",
                success: function(response){
                    $('#depart_desc'+i).html('');
                    $('#depart_desc'+i).addClass('js-example-basic-single');
                    $('.js-example-basic-single').select2();
                    $('#depart_desc'+i).append('<option value="0" selected readonly="readonly">Select Account</option>');
                    // var j=1;
                    $.each(response, function(key, value){
                        $('#depart_desc'+i).append('<option data-name="'+value["dept_name"]+'"  data-code='+value["dept_code"]+' value='+value["dept_code"]+'>'+value["dept_code"]+' - '+value["dept_name"]+'</option>');
                        if(value["dept_code"]== depart_desc){
                        depart_desc= value["dept_code"];
                        // console.log(depart_desc);
                        $('#depart_desc'+i+' option[value='+depart_desc+']').prop("selected", true);
                        } 
                    });
                },
                error: function(error){
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
            //on chAnge department code
            $("#voucher_form").on('change','#depart_desc',function(){
                var dept_name=$('#depart_desc').find(':selected').attr("data-name");
                var dept_desc=$('#depart_desc').find(':selected').attr("data-code");
                $('#select2-depart_desc-container').html(dept_desc);
                $('#depart_detail').val(dept_name);
            });
            // Vehicle code dropdown
            $.ajax({
                url: 'api/financial_management/account_vouchers/cash_receipts_api.php',
                type: 'POST',
                data: {action: 'vehicle_code'},
                dataType: "json",
                success: function(response){
                    // $("#ajax-loader").show();
                    // console.log(response);
                    $('#vehicle_code').html('');
                    $('#vehicle_code').append('<option value="0" readonly="readonly">Select Veh#</option>');
                    $.each(response, function(key, value){
                        $('#vehicle_code').append('<option value='+value["vehicle_code"]+'>'+value["vehicle_code"]+'</option>');
                    });
                },
                error: function(error){
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
            // Vehicle code loop dropdown
            $.ajax({
                url: 'api/financial_management/account_vouchers/cash_receipts_api.php',
                type: 'POST',
                data: {action: 'vehicle_code'},
                dataType: "json",
                success: function(response){
                    $('#vehicle_code'+i).html('');
                    $('#vehicle_code'+i).addClass('js-example-basic-single');
                    $('.js-example-basic-single').select2();
                    $('#vehicle_code'+i).append('<option value="0" selected readonly="readonly">Select Veh#</option>');
                    // var j=1;
                    $.each(response, function(key, value){
                        $('#vehicle_code'+i).append('<option value='+value["vehicle_code"]+'>'+value["vehicle_code"]+'</option>');
                        if(value["vehicle_code"]== vehicle_code){
                        vehicle_code= value["vehicle_code"];
                        // console.log(vehicle_code);
                        $('#vehicle_code'+i+' option[value='+vehicle_code+']').prop("selected", true);
                        } 
                    });
                },
                error: function(error){
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
            $('#detail'+i+'').val(detail);
            $('#depart_detail'+i+'').val(depart_detail);
            $('#debit'+i+'').val(debits);
            $('#credit'+i+'').val(credits);
            $('#debit'+i+'').css('text-align','right ');
            $('#debit'+i+'').css('padding','0 13px 0 0');
            $('#credit'+i+'').css('text-align','right ');
            $('#credit'+i+'').css('padding','0 13px 0 0');
            $('#memo'+i+'').val(memo);
        }
        setTimeout(function (){
    var rowCounts = $("#example1 tr").length;
    row=rowCounts-3;
        for(var j=1;j<=row;j++){
        var acc_desc=$('#acc_desc'+j).find(':selected').val();
        var detail=$('#acc_desc'+j).find(':selected').attr("data-name");
        $('#select2-acc_desc'+j+'-container').html(acc_desc);
        $('#detail'+j).val(detail);


        var depart_desc=$('#depart_desc'+j).find(':selected').val();
        var depart_detail=$('#depart_desc'+j).find(':selected').attr("data-name");
        $('#select2-depart_desc'+j+'-container').html(depart_desc);
        $('#depart_detail'+j).val(depart_detail);
        
        } 

        var company_code=$('#company_code').find(':selected').val();
        var company_name=$('#company_code').find(':selected').attr("data-name");
        $('#select2-company_code'+'-container').html(company_code);
        $('#company_name').val(company_name);


        var bank=$('#bank').find(':selected').val();
        var title=$('#bank').find(':selected').attr("data-name");
        $('#select2-bank'+'-container').html(bank);
        $('#title').val(title);
  }, 1000);
    }
  });

        
        



  $('#example1').on('click','.remove', function(){
      var button_id = $(this).attr("id");
      var remove_debit_amount = $('#debit'+button_id+'').val();
      var remove_credit_amount = $('#credit'+button_id+'').val();
      $('#tr'+button_id+'').remove();
      if(remove_debit_amount == ''){
        remove_amount_d=0;
      }else{
        if (remove_debit_amount.indexOf(',') > -1) { 
          remove_amount_d = remove_debit_amount.replaceAll(',','');     
        }else{
          remove_amount_d=remove_debit_amount;
        }
        console.log(remove_amount_d);
      }
      if(remove_credit_amount == ''){
        remove_amount_c=0;
      }else{
        if (remove_credit_amount.indexOf(',') > -1) { 
          remove_amount_c = remove_credit_amount.replaceAll(',','');       
        }else{
          remove_amount_c=remove_credit_amount;
        }
      }

      var debit_current_amount = $('#debit_total').text();
      debit_current_amount = debit_current_amount.replaceAll(',','');  

      var credit_current_amount = $('#credit_total').text();
      credit_current_amount = credit_current_amount.replaceAll(',','');  

      var total_debit_amount = parseFloat(debit_current_amount) - parseFloat(remove_amount_d);
      if(isNaN(total_debit_amount)){
        total_debit_amount='0';
      }else{
        total_debit_amount=total_debit_amount.toLocaleString()+'.00';
      }
      $('#debit_total').text(total_debit_amount);
      var total_credit_amount = parseFloat(credit_current_amount) - parseFloat(remove_amount_c);
      if(isNaN(total_credit_amount)){
        total_credit_amount='0';
      }else{
        total_credit_amount=total_credit_amount.toLocaleString()+'.00';
      }
      $('#credit_total').text(total_credit_amount);
  });
});
      

$("#voucher_form").on("submit", function (e) {
      var debits = $('#debit_total').text();
      var credits = $('#credit_total').text();
      if ($("#voucher_form").valid()) {
        var rowCount = $("#example1 tr").length;
        if(rowCount > 3){
            if(debits == credits){
              e.preventDefault();
              var formData = new FormData(this); 
              formData.append('action','insert');
              $.ajax({
                url: 'api/financial_management/account_vouchers/journal_vouchers_api.php',
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
                            $.get('financial_management/account_vouchers/journal_voucher.php',function(data,status){
                             
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
            $("#msg").html("Debit must be equal to credit");
            }
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
$("#account_voucher_breadcrumb").on("click", function () {
    $.get('financial_management/account_vouchers/account_voucher.php', function(data,status){
        $("#content").html(data);
    });
});
$("#add_journal_voucher_breadcrumb").on("click", function () {
    $.get('financial_management/account_vouchers/journal_voucher.php', function(data,status){
        $("#content").html(data);
    });
});
</script>
<?php include '../../includes/loader.php'?>