<?php
session_start();
?>
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 >Stock Position Company</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="report_breadcrumb"> Reports</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="stock_company_breadcrumb"> Stock Position Company</button></li>
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
                          <form method = "post" id = "stock_form">
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
                                        <input style="background-color:#ccd4e1;font-weight:bold;" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="company_name" id="company_name" class="form-control form-control-sm" placeholder="Company Name" readonly >
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 form-group">
                                    <label for="">Division:<span style="color:red">*</span></label>
                                </div>
                                <div class="col-lg-4 col-md-4 form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                        </div>
                                        <select class="form-control form-control-sm js-example-basic-single" id="division_code" name="division_code">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                        </div>
                                        <input style="background-color:#ccd4e1;font-weight:bold;" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="division_name" id="division_name" class="form-control form-control-sm" placeholder="Division Name" readonly >
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 form-group">
                                    <label for="">From Gen Code :<span style="color:red">*</span></label>
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
                                        <input style="background-color:#ccd4e1;font-weight:bold;" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="Account_name" id="Account_name" class="form-control form-control-sm" placeholder="Account Name" readonly >
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 form-group">
                                    <label for="">To Gen Code :<span style="color:red">*</span></label>
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
                                    <label for="">Item :<span style="color:red">*</span></label>
                                </div>
                                <div class="col-lg-4 col-md-4 form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                        </div>
                                        <select class="form-control form-control-sm js-example-basic-single" id="item_code" name="item_code">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                        </div>
                                        <input style="background-color:#ccd4e1;font-weight:bold;" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="item_name" id="item_name" class="form-control form-control-sm" placeholder="Item Name" readonly >
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 form-group">
                                    <label for="">Mode :<span style="color:red">*</span></label>
                                </div>
                                <div class="col-lg-10 col-md-4 form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-list-alt"></i></span>
                                        </div>
                                        <select title="purchase mode" name="purchase_mode" class="form-control form-control-sm" id="purchase_mode" >
                                            <option value="" disabled>Select Purchase Mode</option>
                                            <option value="IMPORT">IMPORT</option>
                                            <option value="LOCAL">LOCAL</option>
                                        </select>                                
                                    </div>
                                </div>
                                <!-- <div class="col-lg-6 col-md-6"></div> -->
                                <div class="col-lg-2 col-md-2 form-group">
                                    <label for="">Product :<span style="color:red">*</span></label>
                                </div>
                                <div class="col-lg-4 col-md-4 form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                        </div>
                                        <select class="form-control form-control-sm js-example-basic-single" id="product_code" name="product_code">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                        </div>
                                        <input style="background-color:#ccd4e1;font-weight:bold;" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="product_name" id="product_name" class="form-control form-control-sm" placeholder="Product Name" readonly >
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
                                
                            <button type="button" id="stock_pos" class="btn btn-primary w-100">Stock Position</button>
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
    $('#online_ledger').css('pointer-events','');
    $('#online_ledger').find($(".far")).removeClass('fa-spin fa-refresh').addClass('fa-circle');
    $('.js-example-basic-single').select2();
    $('#company_code').focus();
});

  
//validation
$(function () {
      $.validator.setDefaults({
        submitHandler: function () {
          // alert( "Form successful submitted!" );
        }
      });
      $('#stock_form').validate({
        rules: {
            company_code: {
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
      // item code dropdown
      $.ajax({
          url: 'api/financial_management/MIS/online_ledger_api.php',
          type: 'POST',
          data: {action: 'item'},
          dataType: "json",
          success: function(response){
              // $("#ajax-loader").show();
              // console.log(response);
              $('#item_code').html('');
              $('#item_code').append('<option value="" selected disabled>Select item</option>');
              $.each(response, function(key, value){
                  $('#item_code').append('<option data-name="'+value["item_name"]+'"  data-code='+value["item"]+' value='+value["item"]+'>'+value["item"]+' - '+value["item_name"]+'</option>');
              });
          },
          error: function(error){
              console.log(error);
              alert("Contact IT Department");
          }
      });
      // product code dropdown
      $.ajax({
          url: 'api/financial_management/MIS/online_ledger_api.php',
          type: 'POST',
          data: {action: 'product'},
          dataType: "json",
          success: function(response){
              // $("#ajax-loader").show();
              // console.log(response);
              $('#product_code').html('');
              $('#product_code').append('<option value="" selected disabled>Select Product</option>');
              $.each(response, function(key, value){
                  $('#product_code').append('<option data-name="'+value["product_name"]+'"  data-code='+value["product_code"]+' value='+value["product_code"]+'>'+value["product_code"]+' - '+value["product_name"]+'</option>');
              });
          },
          error: function(error){
              console.log(error);
              alert("Contact IT Department");
          }
      });
      // company code dropdown
      $.ajax({
          url: 'api/financial_management/MIS/online_ledger_api.php',
          type: 'POST',
          data: {action: 'division'},
          dataType: "json",
          success: function(response){
              // $("#ajax-loader").show();
              // console.log(response);
              $('#division_code').html('');
              $('#division_code').append('<option value="" selected disabled>Select Division</option>');
              $.each(response, function(key, value){
                  $('#division_code').append('<option data-name="'+value["div_name"]+'"  data-code='+value["div_code"]+' value='+value["div_code"]+'>'+value["div_code"]+' - '+value["div_name"]+'</option>');
              });
          },
          error: function(error){
              console.log(error);
              alert("Contact IT Department");
          }
      });
      
      //on chAnge company code
      $("#stock_form").on('change','#company_code',function(){
          $("#ajax-loader").show();
          var company_name=$('#company_code').find(':selected').attr("data-name");
          var company_code=$('#company_code').find(':selected').attr("data-code");
          $('#select2-company_code-container').html(company_code);
          $('#company_name').val(company_name);
          
             // From Code and to code drop down
             $.ajax({
                url: 'api/financial_management/MIS/online_ledger_api.php',
                type: 'POST',
                data: {action: 'gen'},
                dataType: "json",
                success: function(response){
                    $("#ajax-loader").hide();
                    console.log(response);
                    $('#From_code').html('');
                    $('#From_code').append('<option value="" selected disabled>Select Account Code</option>');
                    $.each(response, function(key, value){
                        $('#From_code').append('<option data-name="'+value["gen_name"]+'"  data-code='+value["gen_code"]+' value='+value["gen_code"]+'>'+value["gen_code"]+' - '+value["gen_name"]+'</option>');
                    });
                    $('#To_code').html('');
                    $('#To_code').append('<option value="" selected disabled>Select Account Code</option>');
                    $.each(response, function(key, value){
                        $('#To_code').append('<option data-name="'+value["gen_name"]+'"  data-code='+value["gen_code"]+' value='+value["gen_code"]+'>'+value["gen_code"]+' - '+value["gen_name"]+'</option>');
                    });
                },
                error: function(error){
                    console.log(error);
                    alert("Contact IT Department");
                }
            });    
      });
      
      //on chAnge  div code
      $("#stock_form").on('change','#division_code',function(){
          var div_code=$('#division_code').find(':selected').val();
          // console.log(div_code);
          var detail=$('#division_code').find(':selected').attr("data-name");
          // console.log(detail);
          $('#select2-division_code-container').html(div_code);
          $('#division_name').val(detail);
      });
      //on chAnge from gen code
      $("#stock_form").on('change','#From_code',function(){
          var bank_detail=$('#From_code').find(':selected').attr("data-name");
          // console.log(bank_detail);
          var bank_code=$('#From_code').find(':selected').attr("data-code");
          // console.log(detail);
          $('#select2-From_code-container').html(bank_code);
          $('#Account_name').val(bank_detail);
      });
      
      //on chAnge to gencode code
      $("#stock_form").on('change','#To_code',function(){
          var account_code=$('#To_code').find(':selected').val();
          // console.log(account_code);
          var detail=$('#To_code').find(':selected').attr("data-name");
          // console.log(detail);
          $('#select2-To_code-container').html(account_code);
          $('#Account_name1').val(detail);
      });
      //on chAnge item code
      $("#stock_form").on('change','#item_code',function(){
          var item_detail=$('#item_code').find(':selected').attr("data-name");
          // console.log(item_detail);
          var item_code=$('#item_code').find(':selected').attr("data-code");
          // console.log(detail);
          $('#select2-item_code-container').html(item_code);
          $('#item_name').val(item_detail);
      });
      //on chAnge product code
      $("#stock_form").on('change','#product_code',function(){
          var product_detail=$('#product_code').find(':selected').attr("data-name");
          // console.log(product_detail);
          var product_code=$('#product_code').find(':selected').attr("data-code");
          // console.log(detail);
          $('#select2-product_code-container').html(product_code);
          $('#product_name').val(product_detail);
      });

});
      
$("#stock_pos").on("click", function (e) {
    if ($("#stock_form").valid()) {
        var company_code=$('#company_code').val();
        var division_code=$('#division_code').val();
        var division_name=$('#division_name').val();
        var From_code=$('#From_code').val();
        var To_code=$('#To_code').val();
        var item_code=$('#item_code').val();
        var purchase_mode=$('#purchase_mode').val();
        var product_code=$('#product_code').val();
        var from_date=$('#from_date').val();
        var to_date=$('#to_date').val();
        let invoice_url = "invoicereports/SALES_mis_reports/stock_position_company.php?company_code="+company_code+"&from_code="+From_code+"&to_code="+To_code+"&from_date="+from_date+"&to_date="+to_date+"&item_code="+item_code+"&purchase_mode="+purchase_mode+"&product_code="+product_code+"&division_code="+division_code+"&division_name="+division_name;
        window.open(invoice_url, '_blank');
    }
});




// breadcrumbs
$('#dashboard_breadcrumb').click(function(){
    $.get('dashboard_main/dashboard_main.php',function(data,status){
        $('#content').html(data);
    });
});
$("#report_breadcrumb").on("click", function () {
    $.get('sales_module/reports/reports.php', function(data,status){
        $("#content").html(data);
    });
});
$("#online_ledger_breadcrumb").on("click", function () {
    $.get('financial_management/MIS/online_ledger.php', function(data,status){
        $("#content").html(data);
    });
});
</script>
<?php include '../../includes/loader.php'?>