<?php
session_start();
header("Content-Type: application/json");
include '../auth/db.php';
if(isset($_POST['action']) && $_POST['action'] == 'view'){
  // print_r("jfsksk");
    $query = "SELECT * FROM `unit`";
    // PRINT_R($query);
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
    // print_r("jfsksk");
    $unit_code=$_POST['unit_code'];
    $unit_name=$_POST['unit_name'];
    $query = "insert into unit(unit_code,unit_name) value ('$unit_code','$unit_name')";
    $result = $conn->query($query);
    // PRINT_R($query); die();
    if($result){
      $return_data = array(
        "status" => 1,
        "message" => "Unit has been Inserted"
    );
    }else{
        $return_data = array(
        "status" => 0,
        "message" => "Unit has not been Inserted"
        );
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'edit'){
  // print_r("jfsksk");
  $unit_code=$_POST['unit_code'];
    $query = "SELECT * FROM unit	WHERE unit_code='$unit_code'";
    // PRINT_R($query);
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    $return_data = $show;
}elseif(isset($_POST['action']) && $_POST['action'] == 'check_unit_code'){
    // print_r("jfsksk");
    $unitCode=$_POST['inputunitCode'];
    $query = "SELECT * FROM unit	WHERE unit_code='$unitCode'";
    // PRINT_R($query);
    // die();
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    // $co_code=$show['CO_CODE'];
    // print_r($co_code); die();
    if (empty($show['unit_code'])) {
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
}elseif(isset($_POST['action']) && $_POST['action'] == 'check_description'){
  // print_r("jfsksk");
  $description=$_POST['inputdescription'];
    $query = "SELECT unit_name FROM unit	WHERE unit_name='$description'";
    // PRINT_R($query);
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    // $co_code=$show['CO_CODE'];
    // print_r($co_code); die();
    if (empty($show['unit_name'])) {
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
  $unit_code=$_POST['unit_code'];
  $description=$_POST['description'];
  
  $query="UPDATE unit	set  unit_name = '$description' WHERE unit_code='$unit_code'";    
  $result = $conn->query($query);
  if($result){
      $return_data = array(
          "status" => 1,
          "message" => "Unit has been updated"
      );
  }else{
      $return_data = array(
      "status" => 0,
      "message" => "Unit has not been updated"
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



