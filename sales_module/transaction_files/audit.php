<?php
session_start();
?>
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 >Audit List</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="tf_breadcrumb"> Transaction Files</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="audit_list_breadcrumb"> Audit List</button></li>
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
                          <form method = "post" id = "type_datewise_posting_form">
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
                                    <label for="">Type :<span style="color:red">*</span></label>
                                </div>
                                <div class="col-lg-10 col-md-4 form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                        </div>
                                        <input style="text-transform: uppercase" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="type" id="type" class="form-control form-control-sm" placeholder="Type L/P">
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
                                
                            <button type="button" id="type_datewise_post" class="btn btn-primary w-100">DC LIST</button>
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
  

    $(function () {
      $.validator.setDefaults({
        submitHandler: function () {
          // alert( "Form successful submitted!" );
        }
      });
      $('#type_datewise_posting_form').validate({
        rules: {
            company_code: {
            required: true,
          },
          type: {
            required: true,
          },
          from_date: {
            required: true,
          },
          to_date: {
            required: true,
          },
          division_code: {
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
     
    
        $('.js-example-basic-single').select2();
      // company code dropdown
      $.ajax({
        url: 'api/financial_management/account_vouchers/post_api.php',
          type: 'POST',
          data: {action: 'company_code'},
          dataType: "json",
          success: function(response){
              // $("#ajax-loader").show();
               console.log(response);
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
      $.ajax({
        url: 'api/financial_management/account_vouchers/post_api.php',
          type: 'POST',
          data: {action: 'division_code'},
          dataType: "json",
          success: function(response){
              // $("#ajax-loader").show();
               console.log(response);
              $('#division_code').html('');
              $('#division_code').append('<option value="" selected disabled>Select division</option>');
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
      $("#type_datewise_posting_form").on('change','#company_code',function(){
          $('#company_name').val('');
          var company_name=$('.js-example-basic-single').find(':selected').attr("data-name");
          var company_code=$('.js-example-basic-single').find(':selected').attr("data-code");
          $('#select2-company_code-container').html(company_code);
          $('#company_name').val(company_name);
      });
      $("#type_datewise_posting_form").on('change','#division_code',function(){
          $('#division_name').val('');
          var division_name=$('#division_code').find(':selected').attr("data-name");
          var division_code=$('#division_code').find(':selected').attr("data-code");
          $('#select2-division_code-container').html(division_code);
          $('#division_name').val(division_name);
      });
      
      // breadcrumbs
      $('#dashboard_breadcrumb').click(function(){
          $.get('dashboard_main/dashboard_main.php',function(data,status){
              $('#content').html(data);
          });
      });
      $("#tf_breadcrumb").on("click", function () {
          $.get('sales_module/transaction_files/transaction_files.php', function(data,status){
              $("#content").html(data);
          });
      });
      $("#audit_list_breadcrumb").on("click", function () {
          $.get('sales_module/transaction_files/audit.php', function(data,status){
              $("#content").html(data);
          });
      });
         
$("#type_datewise_posting_form").on('click','#type_datewise_post',function(){
    if ($("#type_datewise_posting_form").valid()) {
      var company_code=$('#company_code').val();
      var division_code=$('#division_code').val();
      var type=$('#type').val();
      var from_date=$('#from_date').val();
      var to_date=$('#to_date').val();
      // ?action=payment_invoice_generate&tr_no="+response.data[0].TRNO
      let invoice_url = "invoicereports/audit_report.php?action=print&company_code="+company_code+"&division_code="+division_code+"&from_date="+from_date+"&to_date="+to_date+"&type="+type;
      window.open(invoice_url, '_blank');
    }
});
        
          
        

</script>
</body>

</html>