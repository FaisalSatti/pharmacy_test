<?php
session_start();
?>
<style>
/* select{
      width:80% !important; */
      /* border: 1px solid #d9dbde */
    /* } */
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
    .select2-selection{
background-color: #b7edea !important;
}
    label{font-size:14px}
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap");

    input:focus,select:focus,textarea:focus,.select2-selection:focus, .add:focus, #submit:focus, .remove:focus{
-moz-box-shadow: 0 0 8px rgba(82,168,236,.6);
box-shadow: 0 0 8px orangered !important;
border: 3px solid black;}


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
    .input-group{
        margin: auto;
    }
    .form-group{
        margin-bottom: 10px;
    }
    .select2-container{
        font-size:12px !important
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Item Batch No</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="setup_breadcrumb">Setup</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="item_batch_list_setup_breadcrumb">Item Batch No List</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="add_item_batch_breadcrumb">Add Item Batch No</button></li>
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
                            <form method="post" id="item_location_form">
                                <?php include '../display_message/display_message.php'?>
                                <span id="msg text-center" style="color: red;font-size: 13px;"></span>
                                <input type="hidden" name="form_no" id="form_no" value="">
                                <div class="row"  style="border:1px solid gray;padding:20px;border-radius:5px;box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.2), 0 20px 20px 0 rgba(0, 0, 0, 0.19);">
                                    <div class="col-lg-1 col-md-2 col-sm-12 form-group">
                                            <label for="">CoCode:<span style="color:red">*</span></label>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-12 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                            </div>
                                            <select class="form-control form-control-sm  js-example-basic-single" id="company_code" name="company_code"></select>                                   
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <textarea rows="1" type="text" name="company_name" id="company_name" style="background-color:#ccd4e1;font-weight:bold;" class="form-control form-control-sm" placeholder="Company Name" readonly tabindex="-1" ></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-md-2 col-sm-12 form-group">
                                        <label for="">ItemCode:<span style="color:red">*</span></label>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-12 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                            </div>
                                            <select class="form-control form-control-sm  js-example-basic-single" id="item_code" name="item_code"></select>                                   
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <textarea rows="1" type="text" name="item_name" id="item_name" class="form-control form-control-sm" style="background-color:#ccd4e1;font-weight:bold;" placeholder="Item Name" readonly tabindex="-1" ></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-1 col-md-2 col-sm-12 form-group">
                                    <label for="">LocCode:<span style="color:red">*</span></label>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-12 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                            </div>
                                            <select class="form-control form-control-sm  js-example-basic-single" id="location_code" name="location_code"></select>                                   
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <textarea rows="1" type="text" name="location_name" id="location_name" style="background-color:#ccd4e1;font-weight:bold;" class="form-control form-control-sm" placeholder="Location Name" readonly tabindex="-1" ></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-md-2 col-sm-12 form-group">
                                        <label for="">BatchNo:</label>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-12 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                            </div>
                                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" name="batch_no" id="batch_no" class="form-control form-control-sm" placeholder="Batch No" >
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-md-2 col-sm-12 form-group">
                                        <label for="">ExpDate</label><span style="color:red;">*</span>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-12 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                            </div>
                                            <input type="date" name="expiry_date" id="expiry_date" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" class="form-control form-control-sm" >
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-md-2 col-sm-12 form-group">
                                    <label for="">GD No :</label>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-12 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                            </div>
                                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" name="gd_no" id="gd_no" class="form-control form-control-sm" placeholder="GD No" >
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-md-2 col-sm-12 form-group">
                                        <label for="">GD Date:</label><span style="color:red;">*</span>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-12 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                            </div>
                                            <input type="date" name="gd_date" id="gd_date" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" class="form-control form-control-sm" >
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-md-2 col-sm-12 form-group">
                                    <label for="">ItemHscode:</label>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-12 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                            </div>
                                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" name="item_hs" id="item_hs" class="form-control form-control-sm" placeholder="Item HScode" >
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-md-2 col-sm-12 form-group">
                                    <label for="">StaxRate:</label>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-12 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                            </div>
                                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" name="stax" id="stax" class="form-control form-control-sm" placeholder="Stax Rate" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row"  style="border:1px solid gray;padding:20px;border-radius:5px;box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.2), 0 20px 20px 0 rgba(0, 0, 0, 0.19);">
                                    <div class="col-lg-1 form-group">
                                        <label for="">Opening:</label>
                                    </div>
                                    <div class="col-lg-5 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                            </div>
                                            <input style="text-align:right;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" pattern="[0-9 ,._-]{1,}" maxlength="30" type="text" name="openning"  id="openning" class="form-control form-control-sm" placeholder="Opening" > 
                                        </div>
                                    </div>
                                    <div class="col-lg-1 form-group">
                                        <label for="">Adjust&nbsp;Qty:</label>
                                    </div>
                                    <div class="col-lg-5 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                            </div>
                                            <input style="text-align:right;background-color:#ccd4e1;" pattern="[0-9 ,._-]{1,}" readonly tabindex="-1"  maxlength="30" type="number" name="adjust_qty" id="adjust_qty" class="form-control form-control-sm" placeholder="Adjust Qty" > 
                                        </div>
                                    </div>
                                    <div class="col-lg-1 form-group">
                                        <label for="">Receipts:</label>
                                    </div>
                                    <div class="col-lg-5 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                            </div>
                                            <input style="text-align:right;background-color:#ccd4e1;" pattern="[0-9 ,._-]{1,}"  tabindex="-1" maxlength="30" type="text" name="receipts" id="receipts" class="form-control form-control-sm" placeholder="Receipts" readOnly tabindex="-1"> 
                                        </div>
                                    </div>
                                    <div class="col-lg-6"></div>
                                    <div class="col-lg-1 form-group">
                                        <label for="">Issues:</label>
                                    </div>
                                    <div class="col-lg-5 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                            </div>
                                            <input style="text-align:right;background-color:#ccd4e1;" pattern="[0-9 ,._-]{1,}"  tabindex="-1" maxlength="30" type="text" name="Issues" id="Issues" class="form-control form-control-sm" placeholder="Issues" readOnly tabindex="-1"> 
                                        </div>
                                    </div>
                                    <div class="col-lg-6"></div>
                                    <div class="col-lg-1 form-group">
                                        <label for="">Balance:</label>
                                    </div>
                                    <div class="col-lg-5 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                            </div>
                                            <input style="text-align:right;background-color:#ccd4e1;" pattern="[0-9 ,._-]{1,}"  tabindex="-1" maxlength="30" type="text" name="Balance" id="Balance" class="form-control form-control-sm" placeholder="Balance" readOnly tabindex="-1" > 
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right p-2">
                                    <input type="submit" id="add" class="btn btn-primary" >
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- /.content -->
<!-- ./wrapper -->


<div class="modal-backdrop fade show" id="backdrop" style="display: none;"></div>

<?php

include '../includes/security.php';
?>

<script>

$(document).ready(function(){
    $('#company_code').focus();
  $("#item_location_form").on('change','#openning',function(){
    var openning=$('#openning').val();
    if(openning==''){
      openning=0;
    }else{
      openning = openning.replaceAll(',','');
      var openning=new Intl.NumberFormat(
        'en-US', { style: 'currency', 
        currency: 'USD',
        currencyDisplay: 'narrowSymbol'}).format(openning);
        var openning=openning.replace(/[$]/g,'');
      $('#openning').val(openning);
      $('#Balance').val(openning);
    }
  });
  
  $(function () {
    $.validator.setDefaults({
      submitHandler: function () {
        // alert( "Form successful submitted!" );
      }
    });
    $('#item_location_form').validate({
      rules: {
          company_code: {
          required: true,
        },
        item_code: {
          required: true,
        },
        location_code: {
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

});

$(document).ready(function() {
    $("#ajax-loader").show();
    $(".js-example-basic-single").select2();
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

    $("#ajax-loader").hide();

 

    $("#item_location_form").on('change','#company_code',function(){
          var company_name=$('#company_code').find(':selected').attr("data-name");
          var company_code=$('#company_code').find(':selected').attr("data-code");
          $('#select2-company_code-container').html(company_code);
          $('#company_name').val(company_name);
          // item code dropdown
          $.ajax({
              url: 'api/setup/item_location_api.php',
              type: 'POST',
              data: {action: 'item_code', company_code:company_code},
              dataType: "json",
              success: function(data){
                  console.log(data);
                  $('#item_code').html('');
                  $('#item_code').append('<option value="" selected disabled>Select item</option>');
                  $.each(data, function(key, value){
                      $('#item_code').append('<option data-name="'+value["item_name_sale"]+'"  data-code="'+value["item_div"]+'" value="'+value["item_div"]+'">'+value["item_div"]+' - '+value["item_name_sale"]+'</option>');
                  });
              },
              error: function(error){
                  console.log(error);
                  alert("Contact IT Department");
              }
          });
          
          $("#item_location_form").on('change','#item_code',function(){
                var item_name=$('#item_code').find(':selected').attr("data-name");
                var item_code=$('#item_code').find(':selected').attr("data-code");
                $('#select2-item_code-container').html(item_code);
                $('#item_name').val(item_name); 
          });  
         
    });    
     
    // on change location code    
    $.ajax({
        url: 'api/setup/item_location_api.php',
        type: 'POST',
        data: {action: 'location_code'},
        dataType: "json",
        success: function(data){
            // console.log(data);
            $('#location_code').html('');
            $('#location_code').append('<option value="" selected disabled>Select Loc</option>');
            $.each(data, function(key, value){
                $('#location_code').append('<option data-name="'+value["loc_name"]+'"  data-code="'+value["loc_code"]+'" value="'+value["loc_code"]+'">'+value["loc_code"]+' - '+value["loc_name"]+'</option>');
            });
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });

    $("#item_location_form").on('change','#location_code',function(){
          var location_name=$('#location_code').find(':selected').attr("data-name");
          var location_code=$('#location_code').find(':selected').attr("data-code");
          $('#select2-location_code-container').html(location_code);
          $('#location_name').val(location_name); 
    }); 

    
});

//insert
$("#item_location_form").on("submit", function (e) {  
  if ($("#item_location_form").valid())
  { 
    // $("#ajax-loader").show();
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('action','insert');
    $.ajax({
            url: 'api/setup/item_batchno_api.php',
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
                     if(status == 1){
                      //  $("#msg").html(message);
                       $.get('setup_files/add_item_batchno.php',function(data,status){
                         $('#content').html(data);
                       });
                     }
                     else{
                      //  $("#msg").html(message);
                       $.get('setup_files/add_item_batchno.php',function(data,status){
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
$("#item_batch_list_setup_breadcrumb").on("click", function () {
    $.get('setup_files/item_batchno.php', function(data,status){
        $("#content").html(data);
    });
});
$("#add_item_batch_breadcrumb   ").on("click", function () {
    $.get('setup_files/add_item_batchno.php', function(data,status){
        $("#content").html(data);
    });
});
</script>
<?php include '../includes/loader.php'?>