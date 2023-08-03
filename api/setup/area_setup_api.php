<?php
session_start();
header("Content-Type: application/json");
include '../auth/db.php';
if(isset($_POST['action']) && $_POST['action'] == 'view'){
  // print_r("jfsksk");
    $query = "SELECT * FROM `area`";
    // PRINT_R($query);
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
    // print_r("jfsksk");
    $area_code=$_POST['area_code'];
    $area_name=$_POST['area_name'];
    $query = "insert into area(area_code,area_name) value ('$area_code','$area_name')";
    $result = $conn->query($query);
    // PRINT_R($query); die();
    if($result){
      $return_data = array(
        "status" => 1,
        "message" => "Area has been Inserted"
    );
    }else{
        $return_data = array(
        "status" => 0,
        "message" => "Area has not been Inserted"
        );
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'edit'){
  // print_r("jfsksk");
  $area_code=$_POST['area_code'];
    $query = "SELECT * FROM area WHERE area_code='$area_code'";
    // PRINT_R($query);
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    $return_data = $show;
}elseif(isset($_POST['action']) && $_POST['action'] == 'check_area_code'){
    // print_r("jfsksk");
    $areaCode=$_POST['inputareaCode'];
    $query = "SELECT * FROM area WHERE area_code='$areaCode'";
    // PRINT_R($query);
    // die();
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    // $co_code=$show['CO_CODE'];
    // print_r($co_code); die();
    if (empty($show['area_code'])) {
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
    $query = "SELECT area_name FROM area WHERE area_name='$description'";
    // PRINT_R($query);
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    // $co_code=$show['CO_CODE'];
    // print_r($co_code); die();
    if (empty($show['area_name'])) {
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
  $area_code=$_POST['area_code'];
  $description=$_POST['description'];
  
  $query="UPDATE area set  area_name = '$description' WHERE area_code='$area_code'";    
  $result = $conn->query($query);
  if($result){
      $return_data = array(
          "status" => 1,
          "message" => "Area has been updated"
      );
  }else{
      $return_data = array(
      "status" => 0,
      "message" => "Area has not been updated"
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



