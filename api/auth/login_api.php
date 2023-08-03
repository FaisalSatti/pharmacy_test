<?php
session_start();
include("db.php");
header("Content-Type: application/json");
$json_array = array();

if(isset($_POST['action']) && $_POST['action'] == 'login'){
  if(isset($_POST['username']) && isset($_POST['password']) && !(empty($_POST['username']) || empty($_POST['password']))){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT a.*
    FROM user a  
    WHERE user_name = '$username' AND password = '$password'";
    
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    // $run = oci_parse($c, $query);
    // oci_execute($run);
    // $row = oci_fetch_assoc($run);

    // print_r($row);die();

    if ($count > 0) {
          $_SESSION['data']=$show;
          $role = $show['role'];
          $id =  $show['user_id'];
          // $_SESSION['company_id']=$_POST['company'];
          if($role != 'Admin'){
            $sql = "Select * from permissions where user_id = '$id'";
            $result = mysqli_query($conn , $sql);
            while($show = mysqli_fetch_assoc($result)){
              $_SESSION['permissions'] = $show['permissions'];
              
            }
          }
       
          $return_data = array(
            "status" => 1,
            "message" => "you are logged in successfully."
          );
    }else {
        $return_data = array(
          "status" => 0,
          "message" => "Incorrect username or Password"
        );
    }
    
  }else{
    $return_data = array(
      "status" => 0,
      "message" => "All Fields Are Required"
    );
  }
}else{
  $return_data = array(
    "status" => 0,
    "message" => "Action Not Matched"
  );
}


print(json_encode($return_data, JSON_PRETTY_PRINT));

?>