<?php 
// ob_start();
// ob_clean();
session_start();
// if(isset($_SESSION['data'])){
//   header('location:project.php');die();
// }
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
  /* background-image: url(dist/img/index_back.jfif); */
  /* background: url(dist/img/pharmacy_back.jpg) ; */

  /* background:linear-gradient(0deg, rgba(255, 0, 150, 0.3), rgba(255, 0, 150, 0.3)), url(dist/img/pharmacy_back.jpg); */

  background: linear-gradient(0deg, rgb(0 0 0 / 32%), rgb(42 42 42 / 70%)), url(dist/img/pharmacy_back.jpg);


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
<div class="login-box text-center" style="margin-top:-40px">
  <div class="login-logo container">
  <img src="docs/assets/img/main_logo.png" height="130px" alt="logo" style="max-width: -webkit-fill-available;">
      <h4 class="login-box-msg text-white mt-3" style="text-shadow: 2px 2px 5px black; font-size: 27px;">PHARMACY ERP SYSTEM</h4>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body" style="box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
-webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75); border-radius: 10px;">
      <p class="login-box-msg">Sign in to start your session</p>
      <!-- id="loginForm" action=""  method="get" accept-charset="utf-8" -->

          
      <div class="alert alert-success fade show" id="success" role="alert" style="display: none;">
      
        <strong> You're Successfully Logged In &nbsp; <i class="fas fa-spinner"></i></strong>
      </div>

      <form id="login_form">

        <div id="failure">
          <?php include 'display_message/display_message.php'?>
        </div>
      
      
      
      <h6><small id="email_error" class="text-danger font-weight-bold" ></small></h6>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="username"  name="username" placeholder="Enter Username">
          <div class="input-group-append">
            <div class="input-group-text" id="append_e">
              <span class="fa fa-times-circle mr-2 e_times"></span>
              <span class="fa fa-check-circle mr-2 e_check"></span>
              <span class="fas fa-envelope"></span>
            </div>
          </div>

        </div>
        <h6><small id="password_error" class="text-danger font-weight-bold" ></small></h6>
        <div class="input-group mb-3 ">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text" id="eye">
              <span class="fas fa-eye"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- <div class="col-sm-8 form-group">
          </div> -->
          <div class="col-sm-12">
            <!-- <input class="btn btn-primary btn-block  SweetAlert2 Examples" name="button_action" id="button_action" value="Sign in"> -->
            <button type="submit" class="btn btn-primary  w-100" id="button_action">Sign in</button>
          </div>
        </div>
      </form>
      <br>
      <p class="mb-1 text-center">
        <!-- Forgot Your Password?   <a href="forgot_password.php">Click Here!</a> -->
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
    <p style="font-size:12px">Designed and Developed By <a href="https://techempireltd.com" target="_blank" style="color:black">Tech Empire</a></p>
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

document.getElementById("eye").addEventListener("click", function(e){
  var pwd = document.getElementById("password");
  if(pwd.getAttribute("type")=="password"){
    pwd.setAttribute("type","text");
  } else {
    pwd.setAttribute("type","password");
  }
});

// //email validation
// var mailformat = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
// var email = document.querySelector('#email');
// email.addEventListener('keyup', function(){
//   var e_times = document.querySelector('.e_times');
//   var e_check = document.querySelector('.e_check');
//   if(email.value.match(mailformat)){
//     email.style.border = '1px solid green';
//     document.getElementById("append_e").style.border = "1px solid green";
//     e_times.style.display = 'none';
//     e_check.style.display = 'block';
//     return false;
//   }
//   else{
//     email.style.border = '1px solid red';
//     document.getElementById("append_e").style.border = "1px solid red";
//     e_times.style.display = 'block';
//     e_check.style.display = 'none';
//   }

// })

//   //password validation
// var password = document.querySelector('#password');
// password.addEventListener('keyup', function(){
//   var p_times = document.querySelector('.p_times');
//   var p_check = document.querySelector('.p_check');
//   if(password.value.length < 6){
//     password.style.border = '1px solid red';
//     document.getElementById("append_p").style.border = "1px solid red";
//     p_times.style.display = 'block';
//     p_check.style.display = 'none';
//     return false;
//   }
//   else{
//     password.style.border = '1px solid green';
//     document.getElementById("append_p").style.border = "1px solid green";
//     p_times.style.display = 'none';
//     p_check.style.display = 'block';
//   }
// });
</script>
<script type="text/javascript">
  
$('#login_form').ready(function(e){
  $("#login_form").on('submit',(function(e) {
    
    document.getElementById("failure").style.display = 'none';

    
      e.preventDefault();
      var formData = new FormData(this);
      formData.append('action','login');
      $.ajax({
        url: 'api/auth/login_api.php',
        type: 'POST',
        data: formData,
        contentType: false,
        cache: false,
        processData:false,
        success: function(response){
        var message = response.message;
        var status = response.status;
        


        if(status=='1'){
          document.getElementById("login_form").style.display = 'none';
          document.getElementById("success").style.display = 'block';
         setTimeout(() => {
          window.location.href='dashboard.php';
         }, 1000);
        }
        else
        {
          $.ajax({
            url: "api/message_session/message_session.php",
            type: 'POST',
            data: {message:message,status:status},
            success: function (data) {
              if(status!='1'){
                location.reload("index.php");
                // window.location.assign("index.php");
              }
                
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
  }));
});


</script>
</body>
</html>
