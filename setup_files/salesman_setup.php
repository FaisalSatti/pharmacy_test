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
              <h1>Sales Man Setup</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="setup_breadcrumb">Setup</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="cs_breadcrumb">Sales Man Setup</button></li>
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
                      <th>Code</th>
                      <th>Name</th>
                      <th>Address /Area</th>
                      <th>Nic No</th>
                      <th>Phone No</th>
                      <th>Join Date</th>
                      <th>Date Left</th>
                      <th>Status</th>
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
                <h5 class="modal-title" id="exampleModalLabel">Add Sales Man</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method = "post" id = "salesman_form">
                    <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="inputCode">Code :</label><span style="color:red;">*</span>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                            </div>
                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" min="0" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" maxlength="30" type="number" name="Code" id="Code" class="form-control form-control-sm" placeholder="Code" > 
                        </div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="inputName">Name :</label><span style="color:red;">*</span>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen"></i></span>
                            </div>
                            <input  style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" maxlength="30" type="text" name="Name" id="Name" class="form-control form-control-sm" placeholder="Name" >
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
                        <label for="inputaddress">Address:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-sort"></i></span>
                            </div>
                            <input maxlength="50" type="text" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" name="address" id="address" class="form-control form-control-sm" placeholder="Address" >
                        </div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="inputNicNbr">Nic Nbr:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-sort"></i></span>
                            </div>
                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" type="text" name="nicNumber" id="nicNumber" class="form-control form-control-sm" placeholder="Nic No." >
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-6 form-group text-center">
                        <span id="msg3" style="color: red;font-size: 13px;"></span>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-6 form-group">
                        <label for="inputPhoneNo">Phone No :</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen"></i></span>
                            </div>
                            <input maxlength="30" type="text" name="phoneNo" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" id="phoneNo" data-inputmask="'mask': ['9999-999-9999', '+99-999-999-9999']"  inputmode="text" class="form-control form-control-sm" placeholder="Phone No" >
                        </div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="inputjoinDate">Join Date:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            </div>
                            <input type = "date"  name="joinDate" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" id="joinDate" class="form-control form-control-sm" placeholder="Join Date" >
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-6 form-group">
                        <label for="inputdateLeft">Date Left:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen"></i></span>
                            </div>
                            <input type = "date"  name="dateLeft" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" id="dateLeft" class="form-control form-control-sm" placeholder="Date Left" >
                        </div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="inputstatus">Status:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            </div>
                            <select class="form-control form-control-sm" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" name="status" id="status">
                              <option></option>
                              <option value = "Active">Active</option>
                              <option value = "Left">Left</option>
                            </select>
                          
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
                <form id="EditForm">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="inputCode">Code :</label><span style="color:red;">*</span>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                            </div>
                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" min="0" maxlength="30" style="background-color:#ccd4e1;font-weight:bold;" type="number" name="Code_e" tabindex="-1" id="Code-e" class="form-control form-control-sm" placeholder="Code" readOnly> 
                        </div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="inputName">Name :</label><span style="color:red;">*</span>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen"></i></span>
                            </div>
                            <input  maxlength="30" type="text" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" name="Name_e" id="Name-e" class="form-control form-control-sm" placeholder="Name" >
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
                        <label for="inputaddress">Address:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-sort"></i></span>
                            </div>
                            <input maxlength="50" type="text" name="address_e" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" id="address-e" class="form-control form-control-sm" placeholder="Address" >
                        </div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="inputNicNbr">Nic Nbr:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-sort"></i></span>
                            </div>
                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" name="nicNumber_e" id="nicNumber-e" class="form-control form-control-sm" placeholder="Nic No." >
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-6 form-group text-center">
                        <span id="msg3" style="color: red;font-size: 13px;"></span>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-6 form-group">
                        <label for="inputPhoneNo">Phone No :</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen"></i></span>
                            </div>
                            <input maxlength="30" type="text" name="phoneNo_e" id="phoneNo-e" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" data-inputmask="'mask': ['9999-999-9999', '+99-999-999-9999']" inputmode="text" class="form-control form-control-sm" placeholder="Phone No" >
                        </div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="inputjoinDate">Join Date:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            </div>
                            <input type = "date"  name="joinDate_e" id="joinDate-e" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" class="form-control form-control-sm" placeholder="Join Date" >
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-6 form-group">
                        <label for="inputdateLeft">Date Left:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen"></i></span>
                            </div>
                            <input type = "date"  name="dateLeft_e" id="dateLeft-e" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" class="form-control form-control-sm" placeholder="Date Left" >
                        </div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="inputstatus">Status:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            </div>
                            <select class="form-control form-control-sm" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" name="status_e" id="status-e">
                              <option></option>
                              <option value = "Active">Active</option>
                              <option value = "Left">Left</option>
                            </select>
                          
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i></button>
                      <button type="button" id="update_data" class="btn btn-primary toastrDefaultSuccess"><i class="fa fa-plus"></i></button>
                    </div>
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
  $('#salesman_form').validate({
    rules: {
      Code: {
        required: true,
      },
      Name: {
        required: true,
      }
     
    },
    messages: {
        Name: {
        required: "Please enter a Sales Man name",
      },
      Code: {
        required: "Please enter a  code",
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
        Code_e: {
        required: true,
      },
        Name_e: {
        required: true,
      }
    },
    messages: {
        Name_e: {
        required: "Please enter a Sales Man name",
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
        url: 'api/setup/salesman_setup_api.php',
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
            
            btn_edit = '<button class="btn btn-sm btn-select 702a1b_2" data-id="'+data[i].sman_code+'" ><i class="far fa-edit text-info fa-fw"></i></button>';
            // btn_dlt = '<button class="btn btn-sm btn-delete" data-id="'+data[i].ID+'"><i class="far fa-trash-alt text-danger fa-fw"></i></button>';
            btn = btn_edit; 
            table.row.add([sno,data[i].sman_code,data[i].sman_name,data[i].sman_add,data[i].phone_no,data[i].nic_no,data[i].doj,data[i].dor,data[i].status,btn]);
        }
        table.draw();
        },
        error: function(e){
            console.log(e);
            alert("Contact IT Department");
        }
    
    });
    
    $("#Code").keyup(function(){
        $("#msg1").html('');
        var Code = $("#Code").val();
        $.ajax({
          url: 'api/setup/salesman_setup_api.php',
          type: 'POST',
          data: {action:'check_code',inputCode:Code},
          success: function (response) {
            console.log(response);
            if(response.status == "0"){
              $("#Code").css("background-color", "pink");
              $("#msg1").text(response.message);
              $("#Code").attr('placeholder',CompanyCode);
              $("#Code").val("");
            }else{
              $("#Code").css("background-color", "");
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
        // $("#Name").keyup(function(){
        //     $("#msg2").html('');
        //     var Name = $("#CompanyName").val();
        //     $.ajax({
        //     url: 'api/setup/company_setup_api.php',
        //     type: 'POST',
        //     data: {action:'check_company_name',inputCompanyName:CompanyName},
        //     success: function (response) {
        //         console.log(response);
        //         if(response.status == "0"){
        //         $("#CompanyName").css("background-color", "pink");
        //         $("#msg2").text(response.message);
        //         $("#CompanyName").attr('placeholder',CompanyName);
        //         $("#CompanyName").val("");
        //         }else{
        //         console.log("kdfjkd");
        //         $("#CompanyName").css("background-color", "");
        //         $("#msg2").text("");
        //         }
        //     },
        //     error: function(e) 
        //     {
        //         console.log(e);
        //         alert("Contact IT Department");
        //     }   
            
        //     })
        // });
});

//function for insert open model
//add
$('#add_button').click(function(){
  $('#InsertFormModel').modal('show');
  setTimeout(function (){
  $('#Code').focus();
}, 500);
    $("#salesman_form").on('click','#insert',function(){    
      if ($("#salesman_form").valid()) {
            $("#ajax-loader").show();
          var salesman_code = $('#Code').val();
          var salesman_name = $('#Name').val();
          var address = $('#address').val();
          var nic_no = $('#nicNumber').val();
          var phone_no = $('#phoneNo').val();
          var join_date = $('#joinDate').val();
          var date_left = $('#dateLeft').val();
          var status = $('#status').val();
          $.ajax({
              url: 'api/setup/salesman_setup_api.php',
              type:'POST',
              data :  {action:'insert',salesman_code:salesman_code,salesman_name:salesman_name,
                address:address,nic_no:nic_no,phone_no:phone_no,join_date:join_date,date_left:date_left,status:status},
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
                          $.get('setup_files/salesman_setup.php',function(data,status){
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
    var code = $(this).attr("data-id");
    
    $.ajax({
        url : 'api/setup/salesman_setup_api.php',
        type : "post",
        data : {action:'edit',code:code},
        success: function(response)
        {console.log(response);
            $('#Code-e').val(response.sman_code);
            $('#Name-e').val(response.sman_name);
            $('#address-e').val(response.sman_add);
            $('#nicNumber-e').val(response.nic_no);
            $('#phoneNo-e').val(response.phone_no);
            $('#joinDate-e').val(response.doj);
            $('#dateLeft-e').val(response.dor);
            $('#status-e').val(response.status);
            $('#EditFormModel').modal('show');

            setTimeout(function (){
  $('#Name-e').focus();
}, 500);
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
          var salesman_code = $('#Code-e').val();
          var salesman_name = $('#Name-e').val();
          var address = $('#address-e').val();
          var nic_no = $('#nicNumber-e').val();
          var phone_no = $('#phoneNo-e').val();
          var join_date = $('#joinDate-e').val();
          var date_left = $('#dateLeft-e').val();
          var status = $('#status-e').val();
          $.ajax({
                  url: 'api/setup/salesman_setup_api.php',
                  type:'POST',
                  data :  {action:'update',salesman_code:salesman_code,salesman_name:salesman_name,
                address:address,nic_no:nic_no,phone_no:phone_no,join_date:join_date,date_left:date_left,status:status},
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
                            $.get('setup_files/salesman_setup.php',function(data,status){
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
    $.get('setup_files/salesman_setup.php', function(data,status){
        $("#content").html(data);
    });
});

</script>
<?php include '../includes/loader.php'?>