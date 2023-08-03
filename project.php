<?php 
ob_start();
ob_clean();
session_start();
if(isset($_SESSION['project'])){
  header('location:dashboard.php');die();
}
if(!isset($_SESSION['data'])){
  header('location:index.php');die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PHARMACY | ERP</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<style>
body{
  background-image: url(docs/assets/img/login_bg.jpg);
  background-repeat:no-repeat;
  background-size:cover;
}
.fa-check-circle{
  color:green;
}
.fa-times-circle{
  color:red;
}
.fa{
  display:none;
}
</style>
<body class="hold-transition login-page">
<div class="login-box text-center" style="margin-top:-50px">
  <div class="login-logo container">
  <img src="docs/assets/img/logo.png" alt="logo" style="max-width: -webkit-fill-available;">
      <h4 class="login-box-msg text-white">ERP SYSTEM</h4>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">select any one project</p>
      <!-- id="loginForm" action=""  method="get" accept-charset="utf-8" -->
      <form>
        <?php include 'display_message/display_message.php'?>
        <h6><small id="password_error" class="text-danger font-weight-bold" ></small></h6>
        <div class="input-group mb-3 ">
            <select class="form-control form-control-sm" name = "project" id="project">
            </select>
        </div>
      </form>
      <div class="row">
        <div class="col-sm-8">
        </div>
        <div class="col-sm-4">
          <input type="submit" name="submit" class="btn btn-primary btn-block  SweetAlert2 Examples" name="button_action" id="button_action" value="Submit">
        </div>
      </div>
      <br>
      <p class="mb-1 text-center">
        Go To Login Page  <a href="logout.php">Click Here</a>
      </p>
      
      <p class="mb-1 text-center">
      <span id="message" style="color:red"></span>
      </p>
      
    </div>
    
    <!-- /.login-card-body -->
  </div>
  <!-- <div class="text-center mt-2">
  <img src="docs/assets/img/ccodez_logo.png" height="50" alt="ccodez_logo" />
  </div> -->
  <div class="text-center mt-2 text-white">
    <p style="font-size:12px">Design and Developed By <a href="https://ccodez.com.pk" target="_blank">CCODEZ.COM</a></p>
  </div>
</div>
<!-- /.login-box -->
<div id="toastsContainerTopRight" class="toasts-top-right fixed"></div>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<!--Form Events-->
<script type="text/javascript">
  
$(document).ready(function(){
    $("#button_action").on("click", function(){
      let project = $("#project").val();
      // console.log(project);
      $.ajax({
        url: 'api/auth/login_api.php',
        type: 'POST',
        data: {action:'login_project',project_id:project},
        success: function(response){
            if(response.status == 1){
              window.location.assign('dashboard.php');
            }else{
              var message = response.message
              var status = response.status
              $.ajax({
                url: "api/message_session/message_session.php",
                type: 'POST',
                data: {message:message,status:status},
                success: function (response) {
                  location.reload();
                },
                error: function(e) 
                {
                  console.log(e);
                  alert("Contact IT Department");
                }   
              });
            }  
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
      });
    });

    //get projects
    $.ajax({
        url: "api/auth/get_project_api.php",
        type: 'POST',
        data: {action:'view'},
        success: function (response) {
        console.log(response);
            for (var i=0; i<response.length; i++) {
                $('#project').append($('<option>', { 
                    value : response[i].PROJECT_ID,
                    text: response[i].PARTICULARS
                }));
            }
        },
        error: function(e) 
        {
        console.log(e);
        alert("Contact IT Department");
        }   
    });
});


</script>
</body>
</html>
