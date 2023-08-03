<?php
session_start();
header("Content-Type: application/json");
include '../auth/db.php';
if(isset($_POST['action']) && $_POST['action'] == 'view'){
  // print_r("jfsksk");
    $query = "SELECT * FROM division";
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
    // PRINT_R($count);
    while($show = mysqli_fetch_assoc($result)){
      $return_data[] = $show;
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
    // print_r("jfsksk");
    $division_code=$_POST['division_code'];
    $division_name=$_POST['division_name'];
    $sub_code=$_POST['sub_code'];
    $query = "insert into division(div_code,div_name,subdiv_code) value ('$division_code','$division_name','$sub_code')";
    $result = $conn->query($query);
    // PRINT_R($query); die();
    if($result){
      $return_data = array(
        "status" => 1,
        "message" => "Division has been Inserted"
    );
    }else{
        $return_data = array(
        "status" => 0,
        "message" => "Division has not been Inserted"
        );
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'edit'){
  // print_r("jfsksk");
  $division_code=$_POST['division_code'];
    $query = "SELECT * FROM division WHERE div_code='$division_code'";
    // PRINT_R($query);
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    $return_data = $show;
    // print_r($return_data); die();
}elseif(isset($_POST['action']) && $_POST['action'] == 'check_division_code'){
    // print_r("jfsksk");
    $inputCode=$_POST['inputCode'];
    $query = "SELECT div_code FROM division WHERE div_code='$inputCode'";
    // PRINT_R($query);
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    // $co_code=$show['CO_CODE'];
    // print_r($co_code); die();
    if (empty($show['div_code'])) {
      $return_data = array(
        "status" => 1,
        "message" => "You Enter a new code"
      );
    }else{
        $return_data = array(
          "status" => 0,
          "message" => "This Code is already registered "
        );
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'check_division_name'){
  // print_r("jfsksk");
  $Description=$_POST['inputDescriptionName'];
    $query = "SELECT div_name FROM division WHERE div_name='$Description'";
    // PRINT_R($query);
    $result = $conn->query($query);
    // $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    // $co_code=$show['CO_CODE'];
    // print_r($co_code); die();
    if (empty($show['div_name'])) {
      $return_data = array(
        "status" => 1,
        "message" => "You Enter a new name"
      );
    }else{
        $return_data = array(
          "status" => 0,
          "message" => "This Name is already registered "
        );
    }
}else if(isset($_POST['action']) && $_POST['action'] == 'update'){
  $division_code_h=$_POST['division_code_h'];
  $division_code=$_POST['division_code'];
  $division_name=$_POST['division_name'];
  $sub_code=$_POST['sub_code'];

  $query="UPDATE division set div_name = '$division_name' , subdiv_code='$sub_code' , div_code='$division_code' where div_code='$division_code_h'";    
                    //  print_r($query);die();
  $result = $conn->query($query);
  if($result){
      $return_data = array(
          "status" => 1,
          "message" => "Division has been updated"
      );
  }else{
      $return_data = array(
      "status" => 0,
      "message" => "Divsion has not been updated"
      );
  }
}elseif(isset($_POST['action']) && $_POST['action'] == 'company_code'){
  // print_r("jfsksk");
    $query = "SELECT * FROM company";
    // PRINT_R($query);
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}else{
    $return_data = array(
        "status" => 0,
        "message" => "Action Not Matched"
    );
}

print(json_encode($return_data, JSON_PRETTY_PRINT));   
?>