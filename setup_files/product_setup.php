<?php
session_start();
?>
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Product Setup</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="setup_breadcrumb">Setup</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="cs_breadcrumb">Product Setup</button></li>
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
                      <th>Description</th>
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
<!-- insert  form -->
<div class="modal fade" id="InsertFormModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Product Details</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method = "post" id = "product_form">
                    <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="inputproductCode">Code :</label><span style="color:red;">*</span>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                            </div>
                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" min="0" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" maxlength="30" type="number" name="productCode" id="productCode" class="form-control form-control-sm" placeholder="Product Code" > 
                        </div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="inputdescription">Description:</label><span style="color:red;">*</span>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen"></i></span>
                            </div>
                            <input  maxlength="30" type="text" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" name="description" id="description" class="form-control form-control-sm" placeholder="Description" >
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
                  <h5 class="modal-title" id="exampleModalLabel">Edit Product Details</h5>
                  <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">
                <form id="EditForm">
                  <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="inputproductCode">Code :</label><span style="color:red;">*</span>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                            </div>
                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" min="0" maxlength="30" type="number" style="background-color:#ccd4e1;font-weight:bold;" tabindex="-1" name="productCode_e" id="productCode_e" class="form-control form-control-sm" placeholder="Product Code" readonly> 
                        </div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="inputdescription">Description:</label><span style="color:red;">*</span>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen"></i></span>
                            </div>
                            <input maxlength="30" type="text" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" name="description_e" id="description_e" class="form-control form-control-sm" placeholder="Description" >
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
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i></button>
                        <button type="button" id="update_data" class="btn btn-primary toastrDefaultSuccess" style="float:right;"><i class="fa fa-plus"></i></button>
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
  $('#product_form').validate({
    rules: {
      productCode: {
        required: true,
      },
      description: {
        required: true,
      }
      
     
    },
    messages: {
      productCode: {
        required: "Please enter a Product code",
      },
      description: {
        required: "Please enter a description",
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
      productCode_e: {
        required: true,
      },
      description_e: {
        required: true,
      }
    
    },
    messages: {
      description_e: {
        required: "Please enter a description",
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
        url: 'api/setup/product_setup_api.php',
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
            
            btn_edit = '<button class="btn btn-sm btn-select 702a1b_2" data-id="'+data[i].product_code+'" ><i class="far fa-edit text-info fa-fw"></i></button>';
            // btn_dlt = '<button class="btn btn-sm btn-delete" data-id="'+data[i].ID+'"><i class="far fa-trash-alt text-danger fa-fw"></i></button>';
            btn = btn_edit; 
            table.row.add([sno,data[i].product_code,data[i].product_name,btn]);
        }
        table.draw();
        },
        error: function(e){
            console.log(e);
            alert("Contact IT Department");
        }
    
    });
    
    $("#productCode").keyup(function(){
        $("#msg1").html('');
        var productCode = $("#productCode").val();
        $.ajax({
          url: 'api/setup/product_setup_api.php',
          type: 'POST',
          data: {action:'check_product_code',inputproductCode:productCode},
          success: function (response) {
            console.log(response);
            if(response.status == "0"){
              $("#productCode").css("background-color", "pink");
              $("#msg1").text(response.message);
              $("#productCode").attr('placeholder',cityCode);
              $("#productCode").val("");
            }else{
              $("#productCode").css("background-color", "");
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
        $("#description").keyup(function(){
            $("#msg2").html('');
            var description = $("#description").val();
            $.ajax({
            url: 'api/setup/product_setup_api.php',
            type: 'POST',
            data: {action:'check_description',inputdescription:description},
            success: function (response) {
                console.log(response);
                if(response.status == "0"){
                $("#description").css("background-color", "pink");
                $("#msg2").text(response.message);
                $("#description").attr('placeholder',description);
                $("#description").val("");
                }else{
                console.log("kdfjkd");
                $("#description").css("background-color", "");
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
  $('#productCode').focus();
}, 500);
    $("#product_form").on('click','#insert',function(){    
      if ($("#product_form").valid()) {
            $("#ajax-loader").show();
          var product_code = $('#productCode').val();
          var product_name = $('#description').val();
          
          $.ajax({
              url: 'api/setup/product_setup_api.php',
              type:'POST',
              data :  {action:'insert',product_code:product_code,product_name:product_name},
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
                          $.get('setup_files/product_setup.php',function(data,status){
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
    var product_code = $(this).attr("data-id");
    
    $.ajax({
        url : 'api/setup/product_setup_api.php',
        type : "post",
        data : {action:'edit',product_code:product_code},
        success: function(response)
        {console.log(response);
            $('#productCode_e').val(response.product_code);
            $('#description_e').val(response.product_name);
        
            $('#EditFormModel').modal('show');
            setTimeout(function (){
  $('#description_e').focus();
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
          var product_code = $('#productCode_e').val();
          var description = $('#description_e').val();
          
          $.ajax({
                  url: 'api/setup/product_setup_api.php',
                  type:'POST',
                  data :  {action:'update',product_code:product_code,description:description},
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
                            $.get('setup_files/product_setup.php',function(data,status){
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
    $.get('setup_files/product_setup.php', function(data,status){
        $("#content").html(data);
    });
});

</script>
<?php include '../includes/loader.php'?>