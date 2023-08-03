<?php
session_start();
?>
<style>
    
    .select2-container{
      width:82% !important;
      /* border: 1px solid #d9dbde */
    }
    #update_data:focus {
  background-color: black;
}
  #insert:focus {
  background-color: black;
}
.select2-selection{
background-color: #b7edea !important;
}
input:focus,select:focus,textarea:focus,.select2-selection:focus, .add:focus, #submit:focus, .remove:focus{
-moz-box-shadow: 0 0 8px rgba(82,168,236,.6);
box-shadow: 0 0 8px #398ad7 !important;
border: 3px solid black;}
</style>
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Control Account</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="setup_breadcrumb">Setup</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="chart_accounts_breadcrumb">Chart Of Account</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="control_account_breadcrumb">Control Account</button></li>
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
                <div class="card-header">
                    <?php include '../../display_message/display_message.php'?>
                  <div class="row">
                    <div class="col-sm-10">
                      <!-- <h3 class="card-title">Language Records</h3> -->
                    </div>
                    <div class="col-sm-2 text-right">
                            <button type="button" class="btn btn-info btn-sm mt-2 702a1b_1" id="add_button"><i class="fa fa-plus"></i></button>
                    </div>
                  </div> 
                  
                </div>
                <!-- /.card-header -->
                <div id="record-content"></div>
                <div class="card-body" >
                  <table id="example1" class=" table table-bordered table-striped table-responsive-lg ">
                    <thead>
                    <tr>
                      <th>SNO</th>
                      <th>Company Code</th>
                      <th>Company Name</th>
                      <th>Control Code</th>
                      <th>Control Name</th>
                      <th>Opening Debit</th>
                      <th>Opening Credit</th> 
                      <th>Action</th>              
                    </tr>
                    </thead>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
<!-- ./wrapper -->

<!-- insert  form -->
<div class="modal fade" id="InsertFormModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Control Account</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method = "post" id = "control_account_form">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <label for="">Company Code :<span style="color:red">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                </div>
                                <select class="form-control form-control-sm  js-example-basic-single" id="company_code" name="company_code">
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="inputCompanyName">Company Name :</label><span style="color:red;">*</span>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                </div>
                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" style="background-color:#ccd4e1;font-weight:bold;" name="company_name" tabindex="-1" id="company_name" class="form-control form-control-sm" placeholder="Company Name" readonly >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group text-center">
                        <span id="msg1" style="color: red;font-size: 13px;"></span>
                        </div>
                        <div class="col-sm-6 form-group text-center">
                        <span id="msg2" style="color: red;font-size: 13px;"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="control_code">Control Code :<span style="color:red">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-sort"></i></span>
                                </div>

                                <input type="number" pattern="[a-zA-Z0-9 ,._-]{1,}" name="control_code" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" id="control_code" class="form-control form-control-sm" placeholder="Control Code" >                
                            </div>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="inputCompanyName">Account Name :</label><span style="color:red;">*</span>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                </div>
                                <input  maxlength="30" type="text" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" name="account_name" id="account_name" class="form-control form-control-sm" placeholder="Account Name" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group text-center">
                        <span id="msg3" style="color: red;font-size: 13px;"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="debit">Opening Debit :</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                </div>
                                <input style="text-align:right;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" name="debit" id="debit" class="form-control form-control-sm" placeholder="Opening Debit" > 
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="credit">Opening Credit :</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                </div>
                                <input style="text-align:right;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" pattern="[a-zA-Z0-9 ,._-]{1,}" type="text" name="credit" id="credit" class="form-control form-control-sm" placeholder="Opening Credit" > 
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary toastrDefaultSuccess" style="float: right;">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
  <!-- Edit  form -->
  <div class="modal fade" id="EditFormModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
      role="dialog">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Control Account</h5>
                  <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">
                <form method = "post" id = "EditForm">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="control_code">Company Code :<span style="color:red">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-sort"></i></span>
                                </div>
                                <input type="number" name="company_code_e" id="company_code_e" style="background-color:#ccd4e1;font-weight:bold;" tabindex="-1" class="form-control form-control-sm" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="inputCompanyName">Company Name :</label><span style="color:red;">*</span>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                </div>
                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" style="background-color:#ccd4e1;font-weight:bold;" tabindex="-1"  name="company_name_e" id="company_name_e" class="form-control form-control-sm" placeholder="Company Name" readonly >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group text-center">
                        <span id="msg1" style="color: red;font-size: 13px;"></span>
                        </div>
                        <div class="col-sm-6 form-group text-center">
                        <span id="msg2" style="color: red;font-size: 13px;"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="control_code">Control Code :<span style="color:red">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-sort"></i></span>
                                </div>
                                <input type="number" name="control_code_e" id="control_code_e" style="background-color:#ccd4e1;font-weight:bold;" tabindex="-1"  class="form-control form-control-sm" placeholder="Control Code"  readonly>
                            </div>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="inputCompanyName">Account Name :</label><span style="color:red;">*</span>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                </div>
                                <input maxlength="30" type="text" name="account_name_e" id="account_name_e" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" class="form-control form-control-sm" placeholder="Account Name" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group text-center">
                        <span id="msg3" style="color: red;font-size: 13px;"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="debit">Opening Debit :</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                </div>
                                <input style="text-align:right;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="debit_e" id="debit_e" class="form-control form-control-sm" placeholder="Opening Debit" > 
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="credit">Opening Credit :</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                </div>
                                <input style="text-align:right;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="credit_e" id="credit_e" class="form-control form-control-sm" placeholder="Opening Credit" > 
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
                      <button type="submit" id="update_data" class="btn btn-primary toastrDefaultSuccess"><i class=" fa fa-refresh"></i></button>
                    </div>
                </form>
              </div>
          </div>
      </div>
  </div>

<div class="modal-backdrop fade show" id="backdrop" style="display: none;"></div>
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
    $('#control_account_form').validate({
    rules: {
        company_code: {
        required: true,
        },
        company_name: {
        required: true,
        },
        control_code: {
        required: true,
        },
        account_name: {
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
$(function () {
    $.validator.setDefaults({
    submitHandler: function () {
        // alert( "Form successful submitted!" );
    }
    });
    $('#control_account_form').validate({
    rules: {
        company_code: {
        required: true,
        },
        company_name: {
        required: true,
        },
        control_code: {
        required: true,
        },
        account_name: {
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

$(document).ready(function(){
      $("#control_account_form").on('change','#credit',function(){
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
      $("#control_account_form").on('change','#debit',function(){
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
});
$(document).ready(function(){
    $("#ajax-loader").show();
    let table = $('#example1').DataTable({
        dom: 'Bfrtip',
        orderCellsTop: true,
        fixedHeader: true,
        
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print',
        ]
    });
    // Setup - add a text input to each footer cell
    $('#example1 thead tr').clone(true).appendTo( '#example1 thead' );
    $('#example1 thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        });
    });
    
    $.ajax({
        url: 'api/setup/chart_of_account/control_account_api.php',
        type:'POST',
        data: {action:'view'},
        success: function(data) {
          $("#ajax-loader").hide();
        // console.log(data);
        // Empty datatable previouse records
        table.clear().draw();
        // append data in datatable
        var sno='0';
            for (var i = 0; i < data.length; i++) {
              console.log(data);
                sno++;
                var debits=data[i].open_debit;
                var debit=new Intl.NumberFormat(
                'en-US', { style: 'currency', 
                  currency: 'USD',
                currencyDisplay: 'narrowSymbol'}).format(debits);
                var debit=debit.replace(/[$]/g,'');
                var credits=data[i].open_credit;
                var credit=new Intl.NumberFormat(
                'en-US', { style: 'currency', 
                  currency: 'USD',
                currencyDisplay: 'narrowSymbol'}).format(credits);
                var credit=credit.replace(/[$]/g,'');
                btn_edit = '<button class="btn btn-sm btn-select 702a1b_2" data-code="'+data[i].co_code+'" data-company="'+data[i].co_name+'"  data-id="'+data[i].control_code+'" data-level1="'+data[i].sub_level1+'" data-level2="'+data[i].sub_level2+'" ><i class="far fa-edit text-info fa-fw"></i></button>';
                // btn_dlt = '<button class="btn btn-sm btn-delete" data-id="'+data[i].ID+'"><i class="far fa-trash-alt text-danger fa-fw"></i></button>';
                btn = btn_edit; 
                table.row.add([sno,data[i].co_code,data[i].co_name,data[i].control_code,data[i].descr,debit,credit,btn]);
            } 
        table.draw();
        },
        error: function(e){
            console.log(e);
            alert("Contact IT Department");
        }
    
    });
   
});

$(document).ready(function() {
    $('.js-example-basic-single').select2();
    // company code dropdown
    $.ajax({
      url: 'api/setup/chart_of_account/control_account_api.php',
        type: 'POST',
        data: {action: 'company_code'},
        dataType: "json",
        success: function(response){
            // console.log(response);
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
    $("#control_account_form").on('change','#company_code',function(){
      // console.log("djdmd");
          var company_name=$('.js-example-basic-single').find(':selected').attr("data-name");
          var company_code=$('.js-example-basic-single').find(':selected').attr("data-code");
          $('#select2-company_code-container').html(company_code);
          $('#company_name').val(company_name);
    });
    
    $("#control_code").change(function(){
      var company_code = $("#company_code").val();
      console.log(company_code);
      if(company_code != null){
        $("#msg3").html('');
        var control_code = $('#control_code').val();
        $.ajax({
        url: 'api/setup/chart_of_account/control_account_api.php',
          type: 'POST',
          data: {action:'check_control_code',control_code:control_code , company_code:company_code},
          success: function (response) {
            console.log(response);
            if(response.status == "0"){
              $("#control_code").css("background-color", "pink");
              $("#msg3").text(response.message);
              $("#control_code").attr('placeholder',control_code);
              $("#control_code").val('');
              document.getElementById('control_code').focus();
            }else{
              $("#control_code").css("background-color", "");
              $("#msg3").text("");
            }
          },
          error: function(e) 
          {
            console.log(e);
            alert("Contact IT Department");
          }   
        
        });
      }else{
        $("#msg1").html('Select Company First');
        var control_code = $("#control_code").val($("#control_code option:first").val());
      }
    });
});

//function for insert open model
//add
$('#add_button').click(function(){
  $('#InsertFormModel').modal('show');
  setTimeout(function (){
  $('#select2-company_code-container').focus();
}, 500);
    // $("#control_account_form").on('click','#insert',function(){  
    $("#control_account_form").on("submit", function (e) {  
      if ($("#control_account_form").valid()) {
        //   $("#ajax-loader").show(); 
          e.preventDefault();
          var formData = new FormData(this);
          formData.append('action','insert');
          $.ajax({
              url: 'api/setup/chart_of_account/control_account_api.php',
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
                  if(status == 0){
                    $("#msg").html(message);
                  }else{
                    $("#msg").html('');
                    $.ajax({
                        url: "api/message_session/message_session.php",
                        type: 'POST',
                        data: {message:message,status:status},
                        success: function (response) {
                          $.get('setup_files/chart_of_account/control_account.php',function(data,status){
                              $('#content').html(data);
                              $('#InsertFormModel').modal('hide');
                              $('#InsertFormModel input').trigger("reset");
                              $(".modal-backdrop").remove();
                              $('body').removeClass('modal-open');
                          });
                        },
                        error: function(e) 
                        {
                          console.log(e);
                          alert("Contact IT Department");
                        }
                    });
                  }
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
//edit
  $("#example1").on('click','.btn-select',function(){
    var company_code = $(this).attr("data-code");
    var control_code = $(this).attr("data-id");
    var level1 = $(this).attr("data-level1");
    var level2 = $(this).attr("data-level2");
    var company_name = $(this).attr("data-company");
    $("#EditForm").on('change','#credit_e',function(){
        var credit=$('#credit_e').val();
        if(credit==''){
          credit=0;
        }else{
          credit = credit.replaceAll(',','');
          var credit=new Intl.NumberFormat(
          'en-US', { style: 'currency', 
            currency: 'USD',
          currencyDisplay: 'narrowSymbol'}).format(credit);
          var credit=credit.replace(/[$]/g,'');
          $('#credit_e').val(credit);
        }
    });
    $("#EditForm").on('change','#debit_e',function(){
        var debit=$('#debit_e').val();
        if(debit==''){
          credit=0;
        }else{
          debit = debit.replaceAll(',','');
          var debit=new Intl.NumberFormat(
          'en-US', { style: 'currency', 
            currency: 'USD',
          currencyDisplay: 'narrowSymbol'}).format(debit);
          var debit=debit.replace(/[$]/g,'');
          $('#debit_e').val(debit);
        }
    });
    $.ajax({
        url : 'api/setup/chart_of_account/control_account_api.php',
        type : "post",
        data : {action:'edit',company_code:company_code,control_code:control_code,level1:level1,level2:level2},
        success: function(response)
        {
            console.log(response);
            $('#company_code_e').val(response.co_code);
            $('#company_name_e').val(company_name);
            $('#control_code_e').val(response.control_code);
            $('#account_name_e').val(response.descr);
              var debit=new Intl.NumberFormat(
              'en-US', { style: 'currency', 
                currency: 'USD',
              currencyDisplay: 'narrowSymbol'}).format(response.open_debit);
              var debit=debit.replace(/[$]/g,'');
              $('#debit_e').val(debit);
              var credit=new Intl.NumberFormat(
              'en-US', { style: 'currency', 
                currency: 'USD',
              currencyDisplay: 'narrowSymbol'}).format(response.open_credit);
              var credit=credit.replace(/[$]/g,'');
              $('#credit_e').val(credit);
              $('#EditFormModel').modal('show');
        
            $('#EditFormModel').modal('show');

            setTimeout(function (){
  $('#account_name_e').focus();
}, 500);
        },
        error: function(e) 
        {
          console.log(e);
          alert("Contact IT Department");
        }
  	});
      //update
      $("#EditForm").on("submit", function (e) {  
        if ($("#EditForm").valid())
        { 
          e.preventDefault();
          var formData = new FormData(this);
          formData.append('action','update');
          $.ajax({
                  url: 'api/setup/chart_of_account/control_account_api.php',
                  type:'POST',
                  data: formData,
                  contentType: false,
                  cache: false,
                  processData:false,
                  success: function(response)
                  {
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
                            $.get('setup_files/chart_of_account/control_account.php',function(data,status){
                              $('#content').html(data);
                              $('#EditFormModel').modal('hide');
                              $('#EditFormModel input').trigger("reset");
                              $(".modal-backdrop").remove();
                              $('body').removeClass('modal-open');
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
$("#chart_accounts_breadcrumb").on("click", function () {
    $.get('setup_files/chart_of_account/chart_of_account.php', function(data,status){
        $("#content").html(data);
    });
});
$("#control_account_breadcrumb").on("click", function () {
    $.get('setup_files/chart_of_account/control_account.php', function(data,status){
        $("#content").html(data);
    });
});

</script>
<?php include '../../includes/loader.php'?>