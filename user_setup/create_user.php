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
              <h1>Create user</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="setup_breadcrumb">User Setup</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="cs_breadcrumb">Create user</button></li>
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
                      <th>User Id</th>
                      <th>User Name</th>
                      <th>Role</th>
                      <th>Password</th> 
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method = "post" id = "user_form">
                    <div class="row">
                        <div class="col-sm-2 form-group">
                          <label for="inputUserName">User Name :</label><span style="color:red;">*</span>
                        </div>
                        <div class="col-sm-10 form-group">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-pen"></i></span>
                            </div>
                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" name="user_name" id="user_name" class="form-control form-control-sm" placeholder="User Name" >
                          </div>
                          <span id="msg2" style="color: red;font-size: 13px;"></span>
                    </div>
                    <div class="col-sm-2 form-group">
                      <label for="inputRole">Role:</label>
                      </div>
                      <div class="col-sm-10 form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            </div>
                            <select style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" required name="role" id="role" class="form-control form-control-sm" placeholder="Role">
                    <option value="">Select</option>
                    <option value = "Admin">Admin</option>
                    <option value = "User">User</option>
                  </select>
                        </div>
                    </div>
                    <div class="col-sm-2 form-group">
                      <label for="inputAddress">Password:</label>
                      </div>
                      <div class="col-sm-10 form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            </div>
                            <input  style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" maxlength="30" type="password" name="password" id="password" class="form-control form-control-sm" placeholder="Password" >
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
                  <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                  <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">
              <form method = "post" id = "EditForm">
                <input type="hidden" name="user_id_e"  id="user_id_e">
              <div class="row">
                        <div class="col-sm-2 form-group">
                          <label for="inputUserName">User Name :</label><span style="color:red;">*</span>
                        </div>
                        <div class="col-sm-10 form-group">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-pen"></i></span>
                            </div>
                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" name="user_name_e" id="user_name_e" class="form-control form-control-sm" placeholder="User Name" >
                          </div>
                          <span id="msg2" style="color: red;font-size: 13px;"></span>
                    </div>
                    <div class="col-sm-2 form-group">
                      <label for="inputRole">Role:</label>
                      </div>
                      <div class="col-sm-10 form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            </div>
                            <select style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" required name="role_e" id="role_e" class="form-control form-control-sm" placeholder="Role">
                    <option value="">Select</option>
                    <option value = "Admin">Admin</option>
                    <option value = "User">User</option>
                  </select>
                        </div>
                    </div>
                    <div class="col-sm-2 form-group">
                      <label for="inputAddress">Password:</label>
                      </div>
                      <div class="col-sm-10 form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            </div>
                            <input  style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid black;border-radius:4px" maxlength="30" type="text" name="password_e" id="password_e" class="form-control form-control-sm" placeholder="Password" >
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

<script>


$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      // alert( "Form successful submitted!" );
    }
  });
  $('#user_form').validate({
    rules: {
          user_name: {
            required: true,
          },
          password: {
            required: true,
          }
          // role: {
          //   required: true,
          // }
        },
    messages: {
      user_name: {
        required: "Please enter a user name",
      },
      password: {
        required: "Please enter a password",
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
      user_name_e: {
            required: true,
          },
          password_e: {
            required: true,
          }
          // role: {
          //   required: true,
          // }
        },
    messages: {
        company_name_e: {
        required: "Please enter a company name",
      },
      password_e: {
        required: "Please enter a password",
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
        url: 'api/user_setup/user_ajax.php',
        type:'POST',
        data: {action:'view'},
        success: function(data) {
          $("#ajax-loader").hide();
                console.log(data);
                // Empty datatable previouse records
                table.clear().draw();
                // append data in datatable
                var sno='0';
                for (var i = 0; i < data.length; i++) {
                  sno++; 
                  
                    btn_edit = '<button class="btn btn-sm btn-select 702a1b_2" data-id="'+data[i].user_id+'" ><i class="far fa-edit text-info fa-fw"></i></button>';
                  btn_dlt = '<button class="btn btn-sm btn-delete" data-id="'+data[i].user_id+'"><i class="far fa-trash-alt text-danger fa-fw"></i></button>';
                  btn = btn_edit+btn_dlt;
                  // btn1 = btn_dlt; 
                  table.row.add([sno,data[i].user_id,data[i].user_name,data[i].role,data[i].password,btn]);
                }
                table.draw();
              },
        error: function(e){
            console.log(e);
            alert("Contact IT Department");
        }
    
    });
    
});

//function for insert open model
//add
$('#add_button').click(function(){
  $('#InsertFormModel').modal('show');
});

$("#user_form").on('click','#insert',function(){    
      if ($("#user_form").valid()) {
            $("#ajax-loader").show();
            var user_name = $('#user_name').val();
          var password = $('#password').val();
          var role = $('#role').val();
          $.ajax({
              url: 'api/user_setup/user_ajax.php',
              type:'POST',
              data :  {action:'insert',user_name:user_name,password:password,role:role},
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
                          $.get('user_setup/create_user.php',function(data,status){
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
//edit
  $("#example1").on('click','.btn-select',function(){
    var user_id = $(this).attr("data-id");
    $.ajax({
        url : 'api/user_setup/user_ajax.php',
        type : "post",
        data : {action:'edit',user_id:user_id},
        success: function(response)
        {
          console.log(response);
          $('#user_id_e').val(user_id);
            $('#user_name_e').val(response.user_name);
            $('#password_e').val(response.password);
            $('#role_e').val(response.role);
            $('#EditFormModel').modal('show');
          },
          error: function(e) 
          {
            console.log(e);
            alert("Contact IT Department");
          }
            
  	});
    
  });
  //update
    $("#EditForm").on('click','#update_data',function(){
      if ($("#EditForm").valid())
      { 
        var user_id = $('#user_id_e').val();
        var user_name = $('#user_name_e').val();
          var password = $('#password_e').val();
          var role = $('#role_e').val();
        $.ajax({
                url: 'api/user_setup/user_ajax.php',
                type:'POST',
                data :  {action:'update',user_id:user_id,user_name:user_name,password:password,role:role},
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
                          $.get('user_setup/create_user.php',function(data,status){
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
  

// breadcrumbs
$('#dashboard_breadcrumb').click(function(){
    $.get('dashboard_main/dashboard_main.php',function(data,status){
        $('#content').html(data);
    });
});
$("#setup_breadcrumb").on("click", function () {
    $.get('user_setup/user_setup.php', function(data,status){
        $("#content").html(data);
    });
});
$("#cs_breadcrumb").on("click", function () {
    $.get('user_setup/create_user.php', function(data,status){
        $("#content").html(data);
    });
});

</script>
<?php include '../includes/loader.php'?>