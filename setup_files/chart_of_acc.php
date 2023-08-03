<?php
session_start();
?>
<style>
    .select2-container{
      width:85% !important;
      /* border: 1px solid #d9dbde */
    }
</style>
<div class="content-wrapper">
        <!-- Content Header (Page header) --> 
        <section class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1>Chart of Account Reports</h1>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                    <li class="breadcrumb-item active"><button class="btn btn-sm" id="setups_breadcrumb">Setups</button></li>
                    <li class="breadcrumb-item active"><button class="btn btn-sm" id="account_breadcrumb">Account Report</button></li>
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
                        <div class="card-body button">
                            <div class="row 702a1">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header" style="background-color:#3f4a56;color:white">
                                            <h3 class="card-title">Account Reports</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-3 no-padding 702a1a">
                                                    <button class="btn" id="control_account"> <i class="fa fa-building"></i>Control Accounts</button>
                                                </div>
                                                <div class="col-sm-3 no-padding 702a1b">
                                                    <button class="btn" id="sub_control_account"> <i class="fa fa-list-alt"></i> Sub Control Accounts</button>
                                                </div>
                                                <div class="col-sm-3 no-padding 702a1c">
                                                    <button class="btn" id="subsidiary_account"> <i class="fas fa-dolly"></i> Subsidiary Accounts</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                            </div> 
                            <!-- /.row -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
<div class="modal fade" id="InsertFormModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Sales Man</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method = "post" id = "audit_report_form"  action = "">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 form-group">
                            <label for="">Company Code :<span style="color:red">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                </div>
                                <select class="form-control js-example-basic-single" id="company_code" name="company_code">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <label for="inputCompanyName">Company Name :</label><span style="color:red;">*</span>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                </div>
                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="company_name" id="company_name" class="form-control form-control-sm" placeholder="Company Name" readonly >
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <label for="">From Code :<span style="color:red">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                </div>
                                <select class="form-control js-example-basic-single" id="From_code" name="From_code">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <label for="inputCompanyName">Account Name :</label><span style="color:red;">*</span>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                </div>
                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="Account_name" id="Account_name" class="form-control form-control-sm" placeholder="Account Name" readonly >
                            </div>
                        </div>
                    
                        <div class="col-md-6 col-sm-12 form-group">
                            <label for="">To Code :<span style="color:red">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                </div>
                                <select class="form-control js-example-basic-single" id="To_code" name="To_code">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <label for="inputCompanyName">Account Name :</label><span style="color:red;">*</span>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                </div>
                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="Account_name1" id="Account_name1" class="form-control form-control-sm" placeholder="Company Name" readonly >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-6 form-group text-center">
                        <span id="msg1" style="color: red;font-size: 13px;"></span>
                    </div>
                    </div>
                    <button type="button" class="btn btn-primary" id="add">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="SubFormModel2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">sub control</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method = "post" id = "sub_form"  action = "">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 form-group">
                            <label for="">Company Code :<span style="color:red">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                </div>
                                <select class="form-control js-example-basic-single" id="company_code2" name="company_code2">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <label for="inputCompanyName">Company Name :</label><span style="color:red;">*</span>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                </div>
                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="company_name2" id="company_name2" class="form-control form-control-sm" placeholder="Company Name" readonly >
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <label for="">From Code :<span style="color:red">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                </div>
                                <select class="form-control js-example-basic-single" id="From_code2" name="From_code2">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <label for="inputCompanyName">Account Name :</label><span style="color:red;">*</span>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                </div>
                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="Account_name2" id="Account_name2" class="form-control form-control-sm" placeholder="Account Name" readonly >
                            </div>
                        </div>
                    
                        <div class="col-md-6 col-sm-12 form-group">
                            <label for="">To Code :<span style="color:red">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                </div>
                                <select class="form-control js-example-basic-single" id="To_code2" name="To_code2">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <label for="inputCompanyName">Account Name :</label><span style="color:red;">*</span>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                </div>
                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="Account_name12" id="Account_name12" class="form-control form-control-sm" placeholder="Company Name" readonly >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-6 form-group text-center">
                        <span id="msg1" style="color: red;font-size: 13px;"></span>
                    </div>
                    </div>
                    <button type="button" class="btn btn-primary" id="add2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="SubFormModel3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">sub control</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method = "post" id = "sub_form3"  action = "">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 form-group">
                            <label for="">Company Code :<span style="color:red">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                </div>
                                <select class="form-control js-example-basic-single" id="company_code3" name="company_code3">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <label for="inputCompanyName">Company Name :</label><span style="color:red;">*</span>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                </div>
                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="company_name" id="company_name3" class="form-control form-control-sm" placeholder="Company Name" readonly >
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <label for="">From Code :<span style="color:red">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                </div>
                                <select class="form-control js-example-basic-single" id="From_code3" name="From_code3">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <label for="inputCompanyName">Account Name :</label><span style="color:red;">*</span>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                </div>
                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="Account_nam3" id="Account_name3" class="form-control form-control-sm" placeholder="Account Name" readonly >
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <label for="">To Code :<span style="color:red">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                </div>
                                <select class="form-control js-example-basic-single" id="To_code3" name="To_code3">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <label for="inputCompanyName">Account Name :</label><span style="color:red;">*</span>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                </div>
                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="Account_name3" id="Account_name13" class="form-control form-control-sm" placeholder="Company Name" readonly >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-6 form-group text-center">
                        <span id="msg1" style="color: red;font-size: 13px;"></span>
                    </div>
                    </div>
                    <button type="button" class="btn btn-primary" id="add3">Submit</button>
            </form>
            </div>
        </div>
    </div>
</div>

<?php

include '../includes/security.php';
?>

<script>
// Function for control module
$(document).ready(function() {
    $('.js-example-basic-single').select2();
    $('#control_account').click(function(){
  $('#InsertFormModel').modal('show');
  $.ajax({
          url: 'api/charts_of_account/control_account_api.php',
          type: 'POST',
          data: {action: 'company_code'},
          dataType: "json",
          success: function(response){
              // $("#ajax-loader").show();
            //   console.log(response);
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
    });
        
      $("#audit_report_form").on('change','#company_code',function(){
          $('#company_name').val('');
          var company_name=$('.js-example-basic-single').find(':selected').attr("data-name");
          var company_code=$('.js-example-basic-single').find(':selected').attr("data-code");
          $('#select2-company_code-container').html(company_code);
          $('#company_name').val(company_name);
     
      
           // From Code and to code drop down
           $.ajax({
          url: 'api/charts_of_account/control_account_api.php',
          type: 'POST',
          data: {action: 'controlCode',company_code:company_code},
          dataType: "json",
          success: function(response){
              // $("#ajax-loader").show();
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

    
      
      //on chAnge from code
      $("#audit_report_form").on('change','#From_code',function(){
        
          $('#Account_name').val('');
          var from_name=$('#From_code').find(':selected').attr("data-name");
          var from_code=$('#From_code').find(':selected').attr("data-code");
          $('#select2-From_code-container').html(from_code);
          $('#Account_name').val(from_name);
      });

           
      
      //on chAnge to code
      $("#audit_report_form").on('change','#To_code',function(){
          $('#Account_name1').val('');
          var company_name=$('#To_code').find(':selected').attr("data-name");
          var company_code=$('#To_code').find(':selected').attr("data-code");
          $('#select2-To_code-container').html(company_code);
          $('#Account_name1').val(company_name);
      });

    // breadcrumbs
    $('#dashboard_breadcrumb').click(function(){
        $.get('dashboard_main/dashboard_main.php',function(data,status){
            $('#content').html(data);
        });
    });
    $("#setups_breadcrumb").on("click", function () {
        $.get('setup_files/setup_file.php', function(data,status){
            $("#content").html(data);
        });
    });
    $("#account_breadcrumb").on("click", function () {
        $.get('setup_files/chart_of_acc.php', function(data,status){
            $("#content").html(data);
        });
    });
    });
        $('#sub_control_account').click(function(){
            $('#SubFormModel2').modal('show');
            $.ajax({
                url: 'api/charts_of_account/control_account_api.php',
                type: 'POST',
                data: {action: 'company_code'},
                dataType: "json",
                success: function(response){
                    // $("#ajax-loader").show();
                    //   console.log(response);
                    $('#company_code2').html('');
                    $('#company_code2').append('<option value="" selected disabled>Select Company</option>');
                    $.each(response, function(key, value){
                        $('#company_code2').append('<option data-name="'+value["co_name"]+'"  data-code='+value["co_code"]+' value='+value["co_code"]+'>'+value["co_code"]+' - '+value["co_name"]+'</option>');
                    });
                },
                error: function(error){
                    console.log(error);
                    alert("Contact IT Department");
                }
            
            });

        });
     
        $("#sub_form").on('change','#company_code2',function(){
          $('#company_name2').val('');
          var company_name=$('.js-example-basic-single').find(':selected').attr("data-name");
          var company_code=$('.js-example-basic-single').find(':selected').attr("data-code");
          $('#select2-company_code2-container').html(company_code);
          $('#company_name2').val(company_name);
            // From Code and to code drop down
            $.ajax({
                url: 'api/charts_of_account/control_account_api.php',
                type: 'POST',
                data: {action: 'controlCode',company_code:company_code},
                dataType: "json",
                success: function(response){
                    // $("#ajax-loader").show();
                    // console.log(response);
                    $('#From_code2').html('');
                    $('#From_code2').append('<option value="" selected disabled>Select Account Code</option>');
                    $.each(response, function(key, value){
                        $('#From_code2').append('<option data-name="'+value["DESCR"]+'"  data-code='+value["ACCOUNT_CODE"]+' value='+value["ACCOUNT_CODE"]+'>'+value["ACCOUNT_CODE"]+' - '+value["DESCR"]+'</option>');
                    });
                    $('#To_code2').html('');
                    $('#To_code2').append('<option value="" selected disabled>Select Account Code</option>');
                    $.each(response, function(key, value){
                        $('#To_code2').append('<option data-name="'+value["DESCR"]+'"  data-code='+value["ACCOUNT_CODE"]+' value='+value["ACCOUNT_CODE"]+'>'+value["ACCOUNT_CODE"]+' - '+value["DESCR"]+'</option>');
                    });
                },
                error: function(error){
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
                    //on chAnge from code
                $("#sub_form").on('change','#From_code2',function(){
                    
                    $('#Account_name2').val('');
                    var from_name=$('#From_code2').find(':selected').attr("data-name");
                    var from_code=$('#From_code2').find(':selected').attr("data-code");
                    $('#select2-From_code2-container').html(from_code);
                    $('#Account_name2').val(from_name);
                });

                    
                
                //on chAnge to code
                $("#sub_form").on('change','#To_code2',function(){
                    $('#Account_name12').val('');
                    var company_name=$('#To_code2').find(':selected').attr("data-name");
                    var company_code=$('#To_code2').find(':selected').attr("data-code");
                    $('#select2-To_code-container').html(company_code);
                    $('#Account_name12').val(company_name);
                });


});
$('#subsidiary_account').click(function(){
            $('#SubFormModel3').modal('show');
            $.ajax({
                url: 'api/charts_of_account/control_account_api.php',
                type: 'POST',
                data: {action: 'company_code'},
                dataType: "json",
                success: function(response){
                    // $("#ajax-loader").show();
                    //   console.log(response);
                    $('#company_code3').html('');
                    $('#company_code3').append('<option value="" selected disabled>Select Company</option>');
                    $.each(response, function(key, value){
                        $('#company_code3').append('<option data-name="'+value["co_name"]+'"  data-code='+value["co_code"]+' value='+value["co_code"]+'>'+value["co_code"]+' - '+value["co_name"]+'</option>');
                    });
                },
                error: function(error){
                    console.log(error);
                    alert("Contact IT Department");
                }
            
            });

});
$("#sub_form3").on('change','#company_code3',function(){
          $('#company_name3').val('');
          var company_name=$('.js-example-basic-single').find(':selected').attr("data-name");
          var company_code=$('.js-example-basic-single').find(':selected').attr("data-code");
          $('#select2-company_code3-container').html(company_code);
          $('#company_name3').val(company_name);
     
      
           // From Code and to code drop down
           $.ajax({
          url: 'api/charts_of_account/control_account_api.php',
          type: 'POST',
          data: {action: 'controlCode',company_code:company_code},
          dataType: "json",
          success: function(response){
              // $("#ajax-loader").show();
              // console.log(response);
              $('#From_code3').html('');
              $('#From_code3').append('<option value="" selected disabled>Select Account Code</option>');
              $.each(response, function(key, value){
                  $('#From_code3').append('<option data-name="'+value["DESCR"]+'"  data-code='+value["ACCOUNT_CODE"]+' value='+value["ACCOUNT_CODE"]+'>'+value["ACCOUNT_CODE"]+' - '+value["DESCR"]+'</option>');
              });
              $('#To_code3').html('');
              $('#To_code3').append('<option value="" selected disabled>Select Account Code</option>');
              $.each(response, function(key, value){
                  $('#To_code3').append('<option data-name="'+value["DESCR"]+'"  data-code='+value["ACCOUNT_CODE"]+' value='+value["ACCOUNT_CODE"]+'>'+value["ACCOUNT_CODE"]+' - '+value["DESCR"]+'</option>');
              });
          },
          error: function(error){
              console.log(error);
              alert("Contact IT Department");
          }
      });
    


     
    });
        //on chAnge from code
        $("#sub_form3").on('change','#From_code3',function(){
                    
                    $('#Account_name2').val('');
                    var from_name=$('#From_code3').find(':selected').attr("data-name");
                    var from_code=$('#From_code3').find(':selected').attr("data-code");
                    $('#select2-From_code3-container').html(from_code);
                    $('#Account_name3').val(from_name);
                });

                    
                
                //on chAnge to code
                $("#sub_form3").on('change','#To_code3',function(){
                    $('#Account_name13').val('');
                    var company_name=$('#To_code3').find(':selected').attr("data-name");
                    var company_code=$('#To_code3').find(':selected').attr("data-code");
                    $('#select2-To_code3-container').html(company_code);
                    $('#Account_name13').val(company_name);
                });

$('#add').click(function(){
    var company_code = $('#company_code').val();
    var company_name = $('#company_name').val();
    var from_code = $('#From_code').val();
    var account_name = $('#Account_name').val();
    var to_code = $('#To_code').val();
    var account_name1 = $('#Account_name1').val();

    $.get('setup_files/control_report.php?company_code='+company_code+'&company_name='+company_name+'&from_code='+from_code+'&account_name='+account_name+'&to_code='+to_code+'&account_name1='+account_name1, function(data,status){
        $("#content").html(data);
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
        $('body').css('overflow','');

    });
});
$('#add2').click(function(){
    var company_code = $('#company_code2').val();
    var company_name = $('#company_name2').val();
    var from_code = $('#From_code2').val();
    var account_name = $('#Account_name2').val();
    var to_code = $('#To_code2').val();
    var account_name1 = $('#Account_name12').val();

    $.get('setup_files/sub_control_report.php?company_code='+company_code+'&company_name='+company_name+'&from_code='+from_code+'&account_name='+account_name+'&to_code='+to_code+'&account_name1='+account_name1, function(data,status){
        $("#content").html(data);
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
        $('body').css('overflow','');

    });
});
$('#add3').click(function(){
    var company_code = $('#company_code3').val();
    var company_name = $('#company_name3').val();
    var from_code = $('#From_code3').val();
    var account_name = $('#Account_name3').val();
    var to_code = $('#To_code3').val();
    var account_name1 = $('#Account_name13').val();

    $.get('setup_files/subsidary_report.php?company_code='+company_code+'&company_name='+company_name+'&from_code='+from_code+'&account_name='+account_name+'&to_code='+to_code+'&account_name1='+account_name1, function(data,status){
        $("#content").html(data);
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
        $('body').css('overflow','');

    });
});



</script>
