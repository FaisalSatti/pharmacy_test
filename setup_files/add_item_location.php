<?php
session_start();
?>
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Item / Warehouse</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="setup_breadcrumb">Setup</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="item_location_setup_breadcrumb">Item Location</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="add_item_loc_breadcrumb">Add Item Location</button></li>
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
                                <div class="row"  style="margin-top:-14px;border-radius:4px;border  :2px solid #1e293b; padding-top:8px;box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
                        <div class="col-sm-1 form-group">
                                      <label for="">CoCode:<span style="color:red">*</span></label>
                                      </div>
                                      <div class="col-sm-2 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                            </div>
                                            <select class="form-control form-control-sm  js-example-basic-single" id="company_code" name="company_code">
                                            </select>                                   
                                        </div>
                                    </div>
                                    <div class="col-sm-1 form-group">
                                      <label for="">CoName:</label>
                                      </div>
                                      <div class="col-sm-2 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <input maxlength="30" type="text" name="company_name" style="background-color:#ccd4e1;font-weight:bold;" id="company_name" class="form-control form-control-sm" placeholder="Company Name" readonly tabindex="-1" >
                                        </div>
                                    </div>
                                    <div class="col-sm-1 form-group">
                                      <label for="">ItemCode:<span style="color:red">*</span></label>
                                      </div>
                                      <div class="col-sm-2 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                            </div>
                                            <select class="form-control form-control-sm  js-example-basic-single" id="item_code" name="item_code">
                                            </select>                                   
                                        </div>
                                    </div>
                                    <div class="col-sm-1 form-group">
                                      <label for="">ItemName:</label>
                                      </div>
                                      <div class="col-sm-2 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <input maxlength="30" type="text" name="item_name" style="background-color:#ccd4e1;font-weight:bold;" id="item_name" class="form-control form-control-sm" placeholder="Item Name" readonly tabindex="-1" >
                                        </div>
                                    </div>
                                    <div class="col-sm-1 form-group">
                                      <label for="">locCode:<span style="color:red">*</span></label>
                                      </div>
                                      <div class="col-sm-2 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                            </div>
                                            <select class="form-control form-control-sm  js-example-basic-single" id="location_code" name="location_code">
                                            </select>                                   
                                        </div>
                                    </div>
                                    <div class="col-sm-1form-group">
                                      <label for="">LocName:</label>
                                      </div>
                                      <div class="col-sm-2 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <input maxlength="30" type="text" style="background-color:#ccd4e1;font-weight:bold;" name="location_name" id="location_name" class="form-control form-control-sm" placeholder="Location Name" readonly tabindex="-1" >
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-1 form-group">
                                      <label for="">Opening:</label>
                                      </div>
                                      <div class="col-md-2 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                            </div>
                                            <input style="text-align:right;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" pattern="[0-9 ,._-]{1,}" maxlength="30" type="text" name="openning" id="openning" class="form-control form-control-sm" placeholder="Opening" > 
                                        </div>
                                    </div>
                                    <div class="col-md-1 form-group">
                                      <label for="">Receipts:</label>
                                      </div>
                                      <div class="col-md-2 form-group">
                                        <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                          </div>
                                          <input style="text-align:right;background-color:#ccd4e1;font-weight:bold;" pattern="[0-9 ,._-]{1,}"  tabindex="-1" maxlength="30" type="text" name="receipts" id="receipts" class="form-control form-control-sm" placeholder="Receipts" readonly tabindex="-1"> 
                                        </div>
                                      </div>
                                      <div class="col-md-2 form-group"></div>
                                    <div class="col-md-1 form-group">
                                      <label for="">Issues:</label>
                                      </div>
                                      <div class="col-md-2 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                            </div>
                                            <input style="text-align:right;background-color:#ccd4e1;font-weight:bold;" pattern="[0-9 ,._-]{1,}"  tabindex="-1" maxlength="30" type="text" name="Issues" id="Issues" class="form-control form-control-sm" placeholder="Issues" readOnly tabindex="-1"> 
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-1 form-group">
                                      <label for="">Balance:</label>
                                      </div>
                                      <div class="col-md-2 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                            </div>
                                            <input style="text-align:right;background-color:#ccd4e1;font-weight:bold;" pattern="[0-9 ,._-]{1,}"  tabindex="-1" maxlength="30" type="text" name="Balance" id="Balance" class="form-control form-control-sm" placeholder="Balance" readOnly tabindex="-1" > 
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group"></div>
                                    <div class="text-right">
                                    <input type="submit" id="add" class="btn btn-primary" style="width:1040px;">
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
<style>

select{
width:82% !important;
}
#btn-back-to-top {
position: fixed;
bottom: 20px;
right: 20px;
/* display: none; */
}
#update_data:focus {
  background-color: black;
}
  #insert:focus {
  background-color: black;
}
input:focus,select:focus,textarea:focus,.select2-selection:focus, .add:focus, #submit:focus, .remove:focus{
-moz-box-shadow: 0 0 8px rgba(82,168,236,.6);
box-shadow: 0 0 8px orangered !important;
border: 3px solid black !important;}
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
.select2-selection--single{
  background:#b7edea !important;
}
</style>
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
            url: 'api/setup/item_location_api.php',
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
                       $.get('setup_files/add_item_location.php',function(data,status){
                         $('#content').html(data);
                       });
                     }
                     else{
                      //  $("#msg").html(message);
                       $.get('setup_files/add_item_location.php',function(data,status){
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
$("#item_location_setup_breadcrumb").on("click", function () {
    $.get('setup_files/item_location_setup.php', function(data,status){
        $("#content").html(data);
    });
});
$("#add_item_loc_breadcrumb").on("click", function () {
    $.get('setup_files/add_item_location.php', function(data,status){
        $("#content").html(data);
    });
});
</script>
<?php include '../includes/loader.php'?>