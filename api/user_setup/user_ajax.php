<?php
session_start();
header("Content-Type: application/json");
include '../auth/db.php';
if(isset($_POST['action']) && $_POST['action'] == 'view'){
  // print_r("jfsksk");
    $query = "SELECT * FROM user";
    // PRINT_R($query);
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
    // print_r("jfsksk");
    $user_name=$_POST['user_name'];
    $password=$_POST['password'];
    $role=$_POST['role'];
    $query = "insert into user(user_name,password,role) value ('$user_name','$password','$role')";
    $result = $conn->query($query);
    // PRINT_R($query);
    if($result){
      $return_data = array(
        "status" => 1,
        "message" => "User has been Inserted"
    );
    }else{
        $return_data = array(
        "status" => 0,
        "message" => "User has not been Inserted"
        );
    }
}
elseif(isset($_POST['action']) && $_POST['action'] == 'permission'){
  // print_r($_POST);die();
  // print_r("jfsksk");
  $user_id=$_POST['user_name'];

  $permissions = $_POST['permissions'];
  $permissions_final = implode(",",$permissions);

  $query = "SELECT * FROM `permissions` WHERE user_id ='$user_id'";
  $result = $conn->query($query);
  $num = mysqli_num_rows($result);
  if($num == 0){
    $query = "insert into permissions(user_id,permissions) value ('$user_id','$permissions_final')";
  }else{
    $query="UPDATE permissions set permissions = '$permissions_final'
    WHERE user_id='$user_id'";    
  }
  $result = $conn->query($query);
  // PRINT_R($query);
  if($result){
    $return_data = array(
      "status" => 1,
      "message" => "permissions has been Inserted"
  );
  }else{
      $return_data = array(
      "status" => 0,
      "message" => "permissions has not been Inserted"
      );
  }
}elseif(isset($_POST['action']) && $_POST['action'] == 'rights'){
  // print_r("jfsksk");
  $user_id=$_POST['userid'];
    $query = "SELECT * FROM `permissions` WHERE user_id ='$user_id'";
    // PRINT_R($query);
    // die();
    $result = $conn->query($query);
    
    if($result){
      $show = mysqli_fetch_assoc($result);
      $return_data = $show;
  }else{
      $return_data = array(
      "status" => 0,
      "message" => "User record has not been updated"
      );
  }
    
}elseif(isset($_POST['action']) && $_POST['action'] == 'edit'){
  // print_r("jfsksk");
  $user_id=$_POST['user_id'];
    $query = "SELECT * FROM user WHERE user_id='$user_id'";
    // PRINT_R($query);
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    $return_data = $show;
// }elseif(isset($_POST['action']) && $_POST['action'] == 'check_company_code'){
//     // print_r("jfsksk");
//     $company_code=$_POST['inputCompanyCode'];
//     $query = "SELECT CO_CODE FROM COMPANY WHERE CO_CODE='$company_code'";
//     // PRINT_R($query);
//     $result = $conn->query($query);
//     $count = mysqli_num_rows($result);
//     $show = mysqli_fetch_assoc($result);
//     // $co_code=$show['CO_CODE'];
//     // print_r($co_code); die();
//     if (empty($show['CO_CODE'])) {
//       $return_data = array(
//         "status" => 1,
//         "message" => "You Enter a new code"
//       );
//     }else{
//         $return_data = array(
//           "status" => 0,
//           "message" => "This Code is already registered "
//         );
//     }
// }
}elseif(isset($_POST['action']) && $_POST['action'] == 'username'){
  // print_r("jfsksk");
  
    $query = "SELECT * FROM user WHERE role !='Admin'";
    // PRINT_R($query);
    $result = $conn->query($query);
    $return_data=[];
    while($show = mysqli_fetch_assoc($result)){
        $return_data[] = $show;
    }

}else if(isset($_POST['action']) && $_POST['action'] == 'update'){
  $user_id = $_POST['user_id'];
  $user_name=$_POST['user_name'];
  $password=$_POST['password'];
  $role=$_POST['role'];
  
  $query="UPDATE user set user_name = '$user_name' , password ='$password', role ='$role'
                     WHERE user_id='$user_id'";    
                    //  print_r($query);die();
  $result = $conn->query($query);
  if($result){
      $return_data = array(
          "status" => 1,
          "message" => "User record has been updated"
      );
  }else{
      $return_data = array(
      "status" => 0,
      "message" => "User record has not been updated"
      );
  }
}elseif(isset($_POST['action']) && $_POST['action'] == 'company_code'){
  // print_r("jfsksk");
    $query = "SELECT * FROM COMPANY";
    // PRINT_R($query);
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}elseif(isset($_POST['action']) && $_POST['action'] == 'unit'){
  // print_r("jfsksk");
  $unit_code = $_POST['Code'];
  $unit_description= $_POST['description'];

  $query = "DELETE FROM unit";
  $result = $conn->query($query);
  if($result){
    
      for($i=0; $i<(count($unit_code)); $i++){
          if($unit_code[$i]=="" || $unit_description[$i]==""){
            continue;
          }
          $query = "insert into unit(CODE,UNIT_NAME)value ('$unit_code[$i]','$unit_description[$i]')";
     
          $result1 = $conn->query($query);
        
        }
        if($result1){
          $return_data = array(
            "status" => 1,
            "message" => "Unit Measurement has been Updated"
        );
        }else{
            $return_data = array(
            "status" => 0,
            "message" => "Unit Measurement has not been updated"
            );
        }

  }


}else{
    $return_data = array(
        "status" => 0,
        "message" => "Action Not Matched"
    );
}

print(json_encode($return_data, JSON_PRETTY_PRINT));   
?>



