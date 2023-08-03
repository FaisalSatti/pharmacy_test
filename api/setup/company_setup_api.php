<?php
session_start();
header("Content-Type: application/json");
include '../auth/db.php'; 
if(isset($_POST['action']) && $_POST['action'] == 'view'){
  // print_r("jfsksk");
    $query = "SELECT * FROM company";
    // PRINT_R($query);
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}

 

elseif(isset($_POST['action']) && $_POST['action'] == 'company_id') {

  
  $fetchquery = "select * from company";
  $fetchqueryconnect = mysqli_query($conn, $fetchquery);
  $return_data = [];
  while ($show = mysqli_fetch_assoc($fetchqueryconnect)) {
      $return_data[] = $show;
  }
  // print_r($return_data); die();
}

elseif(isset($_POST['action']) && $_POST['action'] == 'division_id') {

  
  $fetchquery = "select * from division";
  $fetchqueryconnect = mysqli_query($conn, $fetchquery);
  $return_data = [];
  while ($show = mysqli_fetch_assoc($fetchqueryconnect)) {
      $return_data[] = $show;
  }
  // print_r($return_data); die();
}




elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
    // print_r("jfsksk");
    $company_code=$_POST['company_code'];
    $company_name=$_POST['company_name'];
    $ntn_no=$_POST['ntn_no'];
    $st_reg=$_POST['st_reg'];
    $company_abr=$_POST['company_abr'];
    $input_add=$_POST['input_add'];
    $phone=$_POST['phone'];
    $query = "insert into company(co_abr,co_code,co_name,co_add,ntn_no,st_no,phone_no) value ('$company_abr','$company_code','$company_name','$input_add','$ntn_no','$st_reg','$phone')";
    $result = $conn->query($query);
    // PRINT_R($query); die();
    if($result){
      $return_data = array(
        "status" => 1,
        "message" => "Company has been Inserted"
    );
    }else{
        $return_data = array(
        "status" => 0,
        "message" => "Company has not been Inserted"
        );
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'edit'){
  // print_r("jfsksk");
  $company_code=$_POST['company_code'];
    $query = "SELECT * FROM company WHERE co_code='$company_code'";
    // PRINT_R($query);
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    $return_data = $show;
}elseif(isset($_POST['action']) && $_POST['action'] == 'check_company_code'){
    // print_r("jfsksk");
    $company_code=$_POST['inputCompanyCode'];
    $query = "SELECT co_code FROM company WHERE co_code='$company_code'";
    // PRINT_R($query);
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    // $co_code=$show['CO_CODE'];
    // print_r($co_code); die();
    if (empty($show['co_code'])) {
      $return_data = array(
        "status" => 1,
        "message" => "You Enter a new code"
      );
    }else{
        $return_data = array(
          "status" => 0,
          "message" => "already registered"
        );
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'check_company_name'){
  // print_r("jfsksk");
  $company_name=$_POST['inputCompanyName'];
    $query = "SELECT co_name FROM company WHERE co_name='$company_name'";
    // PRINT_R($query);
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    // $co_code=$show['CO_CODE'];
    // print_r($co_code); die();
    if (empty($show['co_name'])) {
      $return_data = array(
        "status" => 1,
        "message" => "You Enter a new name"
      );
    }else{
        $return_data = array(
          "status" => 0,
          "message" => "already registered "
        );
    }
}else if(isset($_POST['action']) && $_POST['action'] == 'update'){
  // print_r($_POST);die();
  $company_code=$_POST['company_code'];
  $company_name=$_POST['company_name'];
  $company_address=$_POST['input_add'];
  $ntn_no=$_POST['ntn_no'];
  $st_reg=$_POST['st_reg'];
  $phone=$_POST['phone'];
  $company_abr=$_POST['company_abr'];
  $query="UPDATE company set co_abr='$company_abr', co_name = '$company_name', phone_no = '$phone' , st_no='$st_reg', co_add='$company_address', ntn_no='$ntn_no'
                     WHERE co_code='$company_code'";    
                     
  $result = $conn->query($query);
  if($result){
      $return_data = array(
          "status" => 1,
          "message" => "Company has been updated"
      );
  }else{
      $return_data = array(
      "status" => 0,
      "message" => "Company has not been updated"
      );
  }
}
elseif (isset($_POST['action']) && $_POST['action'] == 'party_code') {
  $query = "SELECT * FROM `party`";
  $result = $conn->query($query);
  $count = mysqli_num_rows($result);
  $return_data = [];
  while ($show = mysqli_fetch_assoc($result)) {
    $return_data[] = $show;
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



