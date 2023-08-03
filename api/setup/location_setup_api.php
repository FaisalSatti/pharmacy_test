<?php
session_start();
header("Content-Type: application/json");
include '../auth/db.php';
if(isset($_POST['action']) && $_POST['action'] == 'view'){
  // print_r("jfsksk");
    $query = "SELECT * FROM `location`";
    // PRINT_R($query);
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
    // print_r("jfsksk");
    $location_name=$_POST['location_name'];
    $location_code=$_POST['location_code'];
    $address=$_POST['address'];
    $phone_no=$_POST['phone_no'];
    $query = "insert into location(loc_code,loc_name,loc_add,phone_no) value ('$location_code','$location_name','$address','$phone_no')";
    $result = $conn->query($query);
    // PRINT_R($query); die();
    if($result){
      $return_data = array(
        "status" => 1,
        "message" => "Location has been Inserted"
    );
    }else{
        $return_data = array(
        "status" => 0,
        "message" => "Location has not been Inserted"
        );
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'edit'){
  // print_r("jfsksk");
  $location_code=$_POST['location_code'];
    $query = "SELECT * FROM `location` WHERE loc_code='$location_code'";
    // PRINT_R($query);
    // die();
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    $return_data = $show;
}elseif(isset($_POST['action']) && $_POST['action'] == 'check_location_code'){
    // print_r("jfsksk");
    $location_code=$_POST['inputlocationCode'];
    $query = "SELECT loc_code FROM `location` WHERE loc_code='$location_code'";
    // PRINT_R($query);
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    // $co_code=$show['CO_CODE'];
    // print_r($co_code); die();
    if (empty($show['loc_code'])) {
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
}else if(isset($_POST['action']) && $_POST['action'] == 'update'){
  $location_code=$_POST['location_code'];
  $location_name=$_POST['location_name'];
  $address=$_POST['address'];
  $phone_no=$_POST['phone_no'];
  
  $query="UPDATE `location` set  loc_name = '$location_name' , loc_add='$address', phone_no='$phone_no'
                     WHERE loc_code='$location_code'";    
                    //  print_r($query);die();
  $result = $conn->query($query);
  if($result){
      $return_data = array(
          "status" => 1,
          "message" => "Location has been updated"
      );
  }else{
      $return_data = array(
      "status" => 0,
      "message" => "Locaton has not been updated"
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
          $query = "insert into unit(code,unit_name)value ('$unit_code[$i]','$unit_description[$i]')";
     
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



