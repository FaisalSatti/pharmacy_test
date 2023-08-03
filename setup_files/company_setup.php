<?php
session_start();
?>
<style>
  #update_data:focus {
  background-color: black;
}
  #insert:focus {
  background-color: black;
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
              <h1>Company</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="setup_breadcrumb">Setup</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="cs_breadcrumb">Company Setup</button></li>
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
                    <?php include '../display_message/display_message.php'?>
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
                      <th>Address</th>
                      <th>NTN No</th>
                      <th>Str Reg</th>
                      <th>Actions</th>               
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Company</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method = "post" id = "company_form">
                    <div class="row">
                    <div class="col-md-2 form-group">
                      <label for="inputCompanyCode">Code :</label><span style="color:red;">*</span>
                      </div>
                      <div class="col-md-10 form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                            </div>
                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" min="0" maxlength="30" type="number" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" name="CompanyCode" id="CompanyCode" class="form-control form-control-sm" placeholder="Company Code" > <br>
                              
                          </div>
                          <span id="msg1" style="color: red;font-size: 13px;"></span>
                    
                   
                        </div>
                        
                        
                        
                        <div class="col-sm-2 form-group">
                          <label for="inputCompanyName">Name :</label><span style="color:red;">*</span>
                        </div>
                        <div class="col-sm-10 form-group">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-pen"></i></span>
                            </div>
                            <input  maxlength="30" type="text" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" name="CompanyName" id="CompanyName" class="form-control form-control-sm" placeholder="Company Name" >
                          </div>
                          <span id="msg2" style="color: red;font-size: 13px;"></span>
                    </div>
                    <div class="col-sm-2 form-group">
                      <label for="inputAddress">Address :</label>
                      </div>
                      <div class="col-sm-10 form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            </div>
                            <textarea rows="1" name="Address" id="inputAddress" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" class="form-control form-control-sm" placeholder="Address" ></textarea>
                        </div>
                    </div>
                    <div class="col-sm-2 form-group">
                      <label for="inputAddress">Phone No:</label>
                      </div>
                      <div class="col-sm-10 form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            </div>
                            <textarea rows="1" name="phone" id="phone" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" class="form-control form-control-sm" placeholder="phone no" ></textarea>
                        </div>
                    </div>
                    </div>
                  
                  
                    
                    <div class="row">
                    
                    <div class="col-sm-2 form-group">
                      <label for="inputSTRegNbrr">ST Reg Nbrr :</label>
                      </div>
                      <div class="col-sm-10 form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-sort"></i></span>
                            </div>
                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" name="StRegNbrr" id="StRegNbrr" class="form-control form-control-sm" placeholder="ST Reg No." >
                        </div>
                        <span id="msg3" style="color: red;font-size: 13px;"></span>
                    </div>
                    <div class="col-sm-2 form-group">
                      <label for="inputNTNNumber">NTN Number :</label>
                      </div>
                      <div class="col-sm-10 form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-sort"></i></span>
                            </div>
                            <input maxlength="30" type="text" name="NtnNumber" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" id="NtnNumber" class="form-control form-control-sm" placeholder="NTN Number 1-9" >
                        </div>
                    </div>
                    </div>
                    
                     
                  
                    <div class="row">
                    
                    
                    <div class="col-sm-2 form-group">
                      <label for="">ID:</label><span style="color:red;">*</span>
                      </div>
                      <div class="col-sm-10 form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen"></i></span>
                            </div>
                            <input maxlength="2" type="text" name="company_abr" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" id="company_abr" class="form-control form-control-sm" placeholder="Company Abbreviation" >
                        </div>
                    </div>
                    </div>
                    <button type="submit" id="insert" class="btn btn-primary toastrDefaultSuccess" style="float: right;">Submit</button>
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
                  <h5 class="modal-title" id="exampleModalLabel">Edit Company</h5>
                  <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">
              <form method = "post" id = "EditForm">
                    <div class="row">
                    <div class="col-md-2 form-group">
                      <label for="co_code">Code :</label><span style="color:red;">*</span>
                      </div>
                      <div class="col-md-10 form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                            </div>
                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" min="0" style="background-color:#ccd4e1; font-weight:bold;" readonly maxlength="30" type="number" tabindex="-1" name="co_code" id="co_code" class="form-control form-control-sm" placeholder="Company Code" > <br>
                              
                          </div>
                          <span id="msg1" style="color: red;font-size: 13px;"></span>
                    
                   
                        </div>
                     
                        
                        
                        <div class="col-sm-2 form-group">
                          <label for="co_name">Name :</label><span style="color:red;">*</span>
                        </div>
                        <div class="col-sm-10 form-group">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-pen"></i></span>
                            </div>
                            <input  maxlength="30" type="text" name="co_name" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" id="co_name" class="form-control form-control-sm" placeholder="Company Name" >
                          </div>
                          <span id="msg2" style="color: red;font-size: 13px;"></span>
                    </div>
                    <div class="col-sm-2 form-group">
                      <label for="inputAddress">Address :</label>
                      </div>
                      <div class="col-sm-10 form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            </div>
                            <textarea rows="1" name="address" id="address" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" class="form-control form-control-sm" placeholder="Address" ></textarea>
                        </div>
                    </div>
                    <div class="col-sm-2 form-group">
                      <label for="inputAddress">Phone No:</label>
                      </div>
                      <div class="col-sm-10 form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            </div>
                            <textarea rows="1" name="phone2" id="phone2" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" class="form-control form-control-sm" placeholder="phone no" ></textarea>
                        </div>
                    </div>
                    </div>
                  
                  
                    
                    <div class="row">
                    
                    <div class="col-sm-2 form-group">
                      <label for="inputSTRegNbrr">ST Reg Nbrr :</label>
                      </div>
                      <div class="col-sm-10 form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-sort"></i></span>
                            </div>
                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" name="stregno" id="stregno" class="form-control form-control-sm" placeholder="ST Reg No." >
                        </div>
                        <span id="msg3" style="color: red;font-size: 13px;"></span>
                    </div>
                    <div class="col-sm-2 form-group">
                      <label for="inputNTNNumber">NTN Number :</label>
                      </div>
                      <div class="col-sm-10 form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-sort"></i></span>
                            </div>
                            <input maxlength="30" type="text" name="ntn_number" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" id="ntn_number" class="form-control form-control-sm" placeholder="NTN Number 1-9" >
                        </div>
                    </div>
                    </div>
                    
                     
                  
                    <div class="row">
                    
                    
                    <div class="col-sm-2 form-group">
                      <label for="">ID:</label><span style="color:red;">*</span>
                      </div>
                      <div class="col-sm-10 form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen"></i></span>
                            </div>
                            <input maxlength="2" type="text" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" name="company_abr_e" id="company_abr_e" class="form-control form-control-sm" placeholder="Company Abbreviation" >
                        </div>
                    </div>
                    </div>
                    <button type="submit" id="update_data" class="btn btn-primary toastrDefaultSuccess" style="float: right;">Submit</button>
                </form>
              </div>
          </div>
      </div>
  </div>

<div class="modal-backdrop fade show" id="backdrop" style="display: none;"></div>

<?php

include '../includes/security.php';
?>

<script>


$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      // alert( "Form successful submitted!" );
    }
  });
  $('#company_form').validate({
    rules: {
        CompanyCode: {
        required: true,
      },
      CompanyName: {
        required: true,
      },
      NtnNumber: {
        required: true,
      },
      StRegNbrr: {
        required: true,
      }
     
    },
    messages: {
        CompanyName: {
        required: "Please enter a company name",
      },
      CompanyCode: {
        required: "Please enter a company code",
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
  $('#EditForm').validate({
    rules: {
        company_code: {
        required: true,
      },
        company_name: {
        required: true,
      },
        ntn_number: {
        required: true,
      },
        stregno: {
        required: true,
      }
    },
    messages: {
        company_name: {
        required: "Please enter a company name",
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
        url: 'api/setup/company_setup_api.php',
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
            sno++;
            
            btn_edit = '<button class="btn btn-sm btn-select 702a1b_2" data-id="'+data[i].co_code+'" ><i class="far fa-edit text-info fa-fw"></i></button>';
            // btn_dlt = '<button class="btn btn-sm btn-delete" data-id="'+data[i].ID+'"><i class="far fa-trash-alt text-danger fa-fw"></i></button>';
            btn = btn_edit; 
            table.row.add([sno,data[i].co_code,data[i].co_name,data[i].co_add,data[i].ntn_no,data[i].st_no,btn]);
        }
        table.draw();
        },
        error: function(e){
            console.log(e);
            alert("Contact IT Department");
        }
    
    });
    
    $("#CompanyCode").change(function(){
        $("#msg1").html('');
        var CompanyCode = $("#CompanyCode").val();
        $.ajax({
          url: 'api/setup/company_setup_api.php',
          type: 'POST',
          data: {action:'check_company_code',inputCompanyCode:CompanyCode},
          success: function (response) {
            console.log(response);
            if(response.status == "0"){
              $("#CompanyCode").css("background-color", "pink");
              $("#msg1").text(response.message);
              $("#CompanyCode").attr('placeholder',CompanyCode);
              $("#CompanyCode").val("");
            }else{
              $("#CompanyCode").css("background-color", "");
              $("#msg1").text("");
            }
          },
          error: function(e) 
          {
            console.log(e);
            alert("Contact IT Department");
          }   
        
        })
      });
        $("#CompanyName").change(function(){
            $("#msg2").html('');
            var CompanyName = $("#CompanyName").val();
            $.ajax({
            url: 'api/setup/company_setup_api.php',
            type: 'POST',
            data: {action:'check_company_name',inputCompanyName:CompanyName},
            success: function (response) {
                console.log(response);
                if(response.status == "0"){
                $("#CompanyName").css("background-color", "pink");
                $("#msg2").text(response.message);
                $("#CompanyName").attr('placeholder',CompanyName);
                $("#CompanyName").val("");
                }else{
                console.log("kdfjkd");
                $("#CompanyName").css("background-color", "");
                $("#msg2").text("");
                }
            },
            error: function(e) 
            {
                console.log(e);
                alert("Contact IT Department");
            }   
            
            })
        });
});

//function for insert open model
//add
$('#add_button').click(function(){
  $('#InsertFormModel').modal('show');
  setTimeout(function (){
  $('#CompanyCode').focus();
}, 500);
    $("#company_form").on('click','#insert',function(){    
      if ($("#company_form").valid()) {
            $("#ajax-loader").show();
          var company_name = $('#CompanyName').val();
          var company_code = $('#CompanyCode').val();
          var ntn_no = $('#NtnNumber').val();
          var st_reg = $('#StRegNbrr').val();
          var company_abr = $('#company_abr').val();
          var input_add = $('#inputAddress').val();
          var phone = $('#phone').val();
          $.ajax({
              url: 'api/setup/company_setup_api.php',
              type:'POST',
              data :  {action:'insert',company_name:company_name,company_code:company_code,
                ntn_no:ntn_no,st_reg:st_reg,company_abr:company_abr,input_add:input_add,phone:phone},
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
                          $.get('setup_files/company_setup.php',function(data,status){
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
    var company_code = $(this).attr("data-id");
    
    $.ajax({
        url : 'api/setup/company_setup_api.php',
        type : "post",
        data : {action:'edit',company_code:company_code},
        success: function(response)
        {console.log(response);
            $('#co_code').val(response.co_code);
            $('#co_name').val(response.co_name);
            $('#address').val(response.co_add);
            $('#ntn_number').val(response.ntn_no);
            $('#stregno').val(response.st_no);
            $('#company_abr_e').val(response.co_abr);
            $('#phone2').val(response.phone_no);
        
            $('#EditFormModel').modal('show');
            setTimeout(function (){
  $('#co_name').focus();
}, 500);
//             $('#Company_Code').va
// $('#Company_Name').va
// $('#address').val(re
// $('#ntn_number').val
// $('#stregno').val(re
// $('#company_abr_e').
// $('#phone2').val(resp



        },
        error: function(e) 
        {
          console.log(e);
          alert("Contact IT Department");
        }
  	});
    //update
      $("#EditForm").on('click','#update_data',function(){
        if ($("#EditForm").valid())
        { 
          var company_name = $('#co_name').val();
          var company_code = $('#co_code').val();
          var ntn_no = $('#ntn_number').val();
          var st_reg = $('#stregno').val();
          var company_abr = $('#company_abr_e').val();
          var input_add = $('#address').val();
          var phone = $('#phone2').val();
          $.ajax({
                  url: 'api/setup/company_setup_api.php',
                  type:'POST',
                  data :  {action:'update',company_name:company_name,company_code:company_code, ntn_no:ntn_no,st_reg:st_reg, company_abr:company_abr,input_add:input_add,phone:phone},
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
                            $.get('setup_files/company_setup.php',function(data,status){
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
$("#cs_breadcrumb").on("click", function () {
    $.get('setup_files/company_setup.php', function(data,status){
        $("#content").html(data);
    });
});

</script>
<?php include '../includes/loader.php'?>