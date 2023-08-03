<?php
session_start();
?>
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 >NET SALE</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="report_breadcrumb"> Reports</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="stock_company_breadcrumb"> NET SALE </button></li>
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
                          <form method = "post" id = "type_datewise_posting_form"  >
                            <div class="row">
                                <div class="col-md-6 col-sm-12 form-group">
                                    <label for="">Company Code :<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                        </div>
                                        <select class="form-control form-control-sm js-example-basic-single" id="company_code" name="company_code">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label for="inputCompanyName">Company Name :</label><span style="color:red;">*</span>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                        </div>
                                        <input tabindex="-1" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="company_name" id="company_name" class="form-control form-control-sm" placeholder="Company Name" readonly >
                                    </div>
                                </div>
                                
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label for="inputCompanyName">Category:</label><span style="color:red;">*</span>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                        </div>
                                        <select name="catg" id="catg" class="form-control form-control-sm">
                                                                                <option value="ALL">ALL</option>
                                                                                <option value="Target">TARGET</option>
                                                                                <option value="Non-Target">NON-TARGET</option>                          
                                                                                </select> </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label for="inputCompanyName">Mode:</label><span style="color:red;">*</span>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                        </div>
                                        <select name="mode" id="mode" class="form-control form-control-sm">
                                                                                <option value="ALL">ALL</option>
                                                                                <option value="local">LOCAL</option>
                                                                                <option value="import">IMPORT</option>                          
                                                                                </select> </div>
                                </div>
                                
                                <div class="col-md-6 col-sm-12 form-group">
                                    <label for="">Division Code :<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                        </div>
                                        <select class="form-control form-control-sm js-example-basic-single division_code" id="division_code" name="division_code">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label for="inputCompanyName">Division Name :</label><span style="color:red;">*</span>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                        </div>
                                        <input tabindex="-1" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="division_name" id="division_name" class="form-control form-control-sm" placeholder="Division Name" readonly >
                                    </div>
                                </div>
                              
                                <div class="col-md-6 col-sm-12 form-group">
                                    <label for="">From Date :<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                        </div>
                                        <input type="date" class="form-control form-control-sm" id="from_date" name="from_date" value="2019-07-01">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 form-group">
                                    <label for="">To Date :</label><span style="color:red;">*</span>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                        </div>
                                        <input type="date" class="form-control form-control-sm" id="to_date" name="to_date">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6 col-sm-12 form-group text-center">
                                <span id="msg1" style="color: red;font-size: 13px;"></span>
                              </div>
                            </div>
                            <button type="button" id="type_datewise_post" class="btn btn-primary toastrDefaultSuccess">REPORT</button>
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

<style>
select{
width:82% !important;
}
.input-group-prepend{
/* border-right:2px solid black !important */
}
/* .select2-selection{
background-color: #ccd4e1 !important  
} */
input:focus,select:focus,textarea:focus,.select2-selection:focus{
-moz-box-shadow: 0 0 8px rgba(82,168,236,.6);
box-shadow: 0 0 8px orangered !important;}


input:focus,select:focus,textarea:focus,.select2-selection:focus{
-moz-box-shadow: 0 0 8px rgba(82,168,236,.6);
box-shadow: 0 0 8px orangered !important;}


.form-control:focus{
-moz-box-shadow: 0 0 8px rgba(82,168,236,.6);
box-shadow: 0 0 8px orangered !important;
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
/* @media only screen and (min-width: 250px) and (max-width: 350px) {
.select2-container{
width:100% !important;
}
}
@media only screen and (min-width: 350px) and (max-width: 754px) {
.select2-container{
width:100% !important;
}
} */
@media only screen and (min-width: 250px) and (max-width: 350px) {
.select2-container{
width:78% !important;
}
select{
width:78% !important;
}
}
@media only screen and (min-width: 350px) and (max-width: 500px) {
.select2-container{
width:81% !important;
}
select{
width:81% !important;
}
}
@media only screen and (min-width: 500px) and (max-width: 764px) {
.select2-container{
width:90% !important;
}
select{
width:90% !important;
}
}
@media screen and (min-width: 764px) and (max-width:997px) {
.select2-container{
width:80% !important;
} 
select{
width:80% !important;
} 
}
@media screen and (min-width: 998px) and (max-width:1024px) {
.select2-container{
width:80% !important;
} 
select{
width:80% !important;
} 
}
@media screen and (min-width: 1024px) and (max-width:1440px) {
.select2-container{
width:81% !important;
} 
select{
width:81% !important;
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
  <!-- Additional Css -->

  
  <?php

include '../../includes/security.php';
?>



<script> 
  $(document).ready(function(){
    $('#company_code').focus();
   
});

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
          var division_name=$('.division_code').find(':selected').attr("data-name");
          var division_code=$('.division_code').find(':selected').attr("data-code");
          $('#select2-division_code-container').html(division_code);
          $('#division_name').val(division_name);
      });
   
    //breadcumb 
    
          
// $("#type_datewise_posting_form").on("click","#type_datewise_post", function (e) {
//   if ($("#type_datewise_posting_form").valid()) { 
//     var company_code=$('#company_code').val();
//     var type=$('#type').val();
//     var from_date=$('#from_date').val();
//     var to_date=$('#to_date').val();
//     window.location.href = "post.php?company_code="+company_code+"&type="+type+"&from_date="+from_date+"&to_date="+to_date;
//   }
// });  
// $("#type_datewise_posting_form").on('click','#type_datewise_post',function(){
//     var company_code=$('#company_code').val();
//     var division_code=$('#division_code').val();
//     var type=$('#type').val();
//     var from_date=$('#from_date').val();
//     var to_date=$('#to_date').val();
//     $.get('invoicereports/audit_report.php?company_code='+company_code+'&division_code='+division_code+'&from_date='+from_date+'&to_date='+to_date+'&type='+type, function(data,status){
//         $("#content").html(data);
//         window.open(invoice_url, '_blank');
//     });
    
// });
  
$("#type_datewise_posting_form").on('click','#type_datewise_post',function(){
    var company_code=$('#company_code').val();
    var company_name=$('#company_name').val();
    var division_code=$('#division_code').val();
    var division_name=$('#division_name').val();
    var catg=$('#catg').val();
    var mode=$('#mode').val();
    var from_date=$('#from_date').val();
    var to_date=$('#to_date').val();
        // ?action=payment_invoice_generate&tr_no="+response.data[0].TRNO
        let invoice_url = "invoicereports/net_sale_report.php?action=print&company_code="+company_code+"&division_name="+division_name+"&company_name="+company_name+"&division_code="+division_code+"&catg="+catg+"&mode="+mode+"&from_date="+from_date+"&to_date="+to_date;
        window.open(invoice_url, '_blank');
      });
          
          
        
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


      $("#stock_company_breadcrumb").on("click", function () {
        $.get('sales_module/reports/net_sale.php', function(data,status){
          $("#content").html(data);
        });
      });
</script>
