<?php
session_start();
?>
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 >Trial Balance - Sub-Control Account</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="tb_breadcrumb"> Trial Balance</button></li>
                <!-- <li class="breadcrumb-item"><button class="btn btn-sm" id="mis_breadcrumb"> MIS</button></li> -->
                <li class="breadcrumb-item"><button class="btn btn-sm" id="control_tb_breadcrumb">TB SubControl</button></li>
              </ol>
            </div>   
          </div>
        </div><!-- /.container-fluid -->
      </section>

     
      <!-- Main content -->
  <section class="content" style="margin-top:30px;width:100%;">
      <div class="container-fluid">
          <div class="row">
              <div class="col-12">
                  <div class="card" style="border:1px solid gray;padding:20px;border-radius:5px;box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.2), 0 20px 20px 0 rgba(0, 0, 0, 0.19);">
                    <div class="card-body">
                        <div class="container">
                          <form method = "post" id = "subcontrol_form">
                            <?php include '../../display_message/display_message.php'?>
                              <div class="row"  style="margin-top:-14px;border-radius:4px;border  :2px solid #1e293b; padding-top:8px;box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
                                <div class="col-lg-2 col-md-2 form-group">
                                    <label for="">Company:<span style="color:red">*</span></label>
                                </div>
                                <div class="col-lg-4 col-md-4 form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                        </div>
                                        <select class="form-control form-control-sm js-example-basic-single" id="company_code" name="company_code">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                        </div>
                                        <input style="background-color:#ccd4e1;font-weight:bold;"  type="text" name="company_name" id="company_name" class="form-control form-control-sm" placeholder="Company Name" readonly >
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 form-group">
                                    <label for="">From Code :<span style="color:red">*</span></label>
                                </div>
                                <div class="col-lg-4 col-md-4 form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                        </div>
                                        <select class="form-control form-control-sm js-example-basic-single" id="From_code" name="From_code">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                        </div>
                                        <input style="background-color:#ccd4e1;font-weight:bold;"  type="text" name="Account_name" id="Account_name" class="form-control form-control-sm" placeholder="Account Name" readonly >
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 form-group">
                                    <label for="">To Code :<span style="color:red">*</span></label>
                                </div>
                                <div class="col-lg-4 col-md-4 form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                        </div>
                                        <select class="form-control form-control-sm js-example-basic-single" id="To_code" name="To_code">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                        </div>
                                        <input style="background-color:#ccd4e1;font-weight:bold;" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="Account_name1" id="Account_name1" class="form-control form-control-sm" placeholder="Account Name" readonly >
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 form-group">
                                    <label for="">From Date :</label><span style="color:red;">*</span>
                                </div>
                                <div class="col-lg-4 col-md-4 form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                        </div>
                                        <input type="date" name="from_date" id="from_date" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 form-group">
                                    <label for="">To Date :</label><span style="color:red;">*</span>
                                </div>
                                <div class="col-lg-4 col-md-4 form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                        </div>
                                        <input type="date" name="to_date" id="to_date" class="form-control form-control-sm">
                                    </div>
                                </div>
                                
                            <button type="button" id="subcontrol_tb" class="btn btn-primary w-100 m-2">Trial Balance</button>
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
    .input-group-prepend{
    /* border-right:2px solid black !important */
    }
    input:focus,select:focus,textarea:focus,.select2-selection:focus{
    -moz-box-shadow: 0 0 8px rgba(82,168,236,.6);
    box-shadow: 0 0 8px orangered !important;}


    .form-control:focus{
    -moz-box-shadow: 0 0 8px rgba(82,168,236,.6);
    box-shadow: 0 0 8px orangered !important;
    }
    .select2-selection{
    background-color: #ccd4e1 !important  
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
    width:80% !important;
    /* border: 1px solid #d9dbde */
    }
    @media only screen and (min-width: 250px) and (max-width: 350px) {
    .select2-container{
    width:78% !important;
    }
    }
    @media only screen and (min-width: 350px) and (max-width: 754px) {
    .select2-container{
    width:85% !important;
    }
    }
    @media screen and (min-width: 766px) and (max-width:994px) {
    .select2-container{
    width:72% !important;
    } 
    }
    .select2-container *:focus {
    outline: none !important;
    border: 2px solid black !important
    }
    .select2-selection--single{
    background:#b7edea !important;
    }
</style>

<?php

include '../../includes/security.php';
?>

<script>
$(document).ready(function(){
    $('#control').css('pointer-events','');
    $('#control').find($(".far")).removeClass('fa-spin fa-refresh').addClass('fa-list');
    $('.js-example-basic-single').select2();
});

  
//validation
$(function () {
      $.validator.setDefaults({
        submitHandler: function () {
          // alert( "Form successful submitted!" );
        }
      });
      $('#subcontrol_form').validate({
        rules: {
            company_code: {
            required: true,
          },
          From_code: {
            required: true,
          },
          To_code: {
            required: true,
          },
          from_date: {
            required: true,
          },
          to_date: {
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
      
      //on chAnge company code
      $("#subcontrol_form").on('change','#company_code',function(){
          $("#ajax-loader").show();
          var company_name=$('#company_code').find(':selected').attr("data-name");
          var company_code=$('#company_code').find(':selected').attr("data-code");
          $('#select2-company_code-container').html(company_code);
          $('#company_name').val(company_name);
          
             // From Code and to code drop down
             $.ajax({
                url: 'api/financial_management/MIS/tb_subcontrol_api.php',
                type: 'POST',
                data: {action: 'account',company_code:company_code},
                dataType: "json",
                success: function(response){
                    $("#ajax-loader").hide();
                    // console.log(response);
                    $('#From_code').html('');
                    $('#From_code').append('<option value="" selected disabled>Select Account Code</option>');
                    $.each(response, function(key, value){
                        $('#From_code').append('<option data-name="'+value["DESCR"]+'"  data-code='+value["ACCOUNT_CODE"]+' value='+value["ACCOUNT_CODE"]+'>'+value["ACCOUNT_CODE"]+' - '+value["DESCR"]+'</option>');
                    });
                    $('#To_code').html('');
                    $('#To_code').append('<option value="" selected disabled>Select Account Code</option>');
                    $.each(response, function(key, value){
                        $('#To_code').append('<option data-name="'+value["DESCR"]+'"  data-code='+value["ACCOUNT_CODE"]+' value='+value["ACCOUNT_CODE"]+'>'+value["ACCOUNT_CODE"]+' - '+value["DESCR"]+'</option>');
                    });
                },
                error: function(error){
                    console.log(error);
                    alert("Contact IT Department");
                }
            });    
      });
      
      //on chAnge company code
      $("#subcontrol_form").on('change','#From_code',function(){
          var bank_detail=$('#From_code').find(':selected').attr("data-name");
          // console.log(bank_detail);
          var bank_code=$('#From_code').find(':selected').attr("data-code");
          // console.log(detail);
          $('#select2-From_code-container').html(bank_code);
          $('#Account_name').val(bank_detail);
      });
      
      //on chAnge company code
      $("#subcontrol_form").on('change','#To_code',function(){
          var account_code=$('#To_code').find(':selected').val();
          // console.log(account_code);
          var detail=$('#To_code').find(':selected').attr("data-name");
          // console.log(detail);
          $('#select2-To_code-container').html(account_code);
          $('#Account_name1').val(detail);
      });

});
      
$("#subcontrol_tb").on("click", function (e) {
    if ($("#subcontrol_form").valid()) {
        var company_code=$('#company_code').val();
        var From_code=$('#From_code').val();
        var To_code=$('#To_code').val();
        var from_date=$('#from_date').val();
        var to_date=$('#to_date').val();
        let invoice_url = "invoicereports/Financial_mis_reports/tb_sub_control_report.php?company_code="+company_code+"&from_code="+From_code+"&to_code="+To_code+"&from_date="+from_date+"&to_date="+to_date;
        window.open(invoice_url, '_blank');
    }
});




// breadcrumbs
$('#dashboard_breadcrumb').click(function(){
    $.get('dashboard_main/dashboard_main.php',function(data,status){
        $('#content').html(data);
    });
});
$("#tb_breadcrumb").on("click", function () {
    $.get('financial_management/trial_balance/trial_balance.php', function(data,status){
        $("#content").html(data);
    });
});
$("#control_tb_breadcrumb").on("click", function () {
    $.get('financial_management/trial_balance/tb_subcontrol.php', function(data,status){
        $("#content").html(data);
    });
});
</script>
<?php include '../../includes/loader.php'?>