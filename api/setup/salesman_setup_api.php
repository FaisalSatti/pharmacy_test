<?php
session_start();
header("Content-Type: application/json");
include '../auth/db.php';
if(isset($_POST['action']) && $_POST['action'] == 'view'){
  // print_r("jfsksk");
    $query = "SELECT * FROM salesman";
    // PRINT_R($query);
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
    // print_r("jfsksk");
    $salesman_code=$_POST['salesman_code'];
    $salesman_name=$_POST['salesman_name'];
    $address=$_POST['address'];
    $nic_no=$_POST['nic_no'];
    $phone_no=$_POST['phone_no'];
    $join_date=$_POST['join_date'];
    $date_left=$_POST['date_left'];
    $status=$_POST['status'];

    $query = "insert into salesman(sman_code,sman_name,sman_add,phone_no,nic_no,doj,dor,status) value ('$salesman_code','$salesman_name','$address','$phone_no','$nic_no','$join_date','$date_left','$status')";
    $result = $conn->query($query);
    // PRINT_R($query); die();
    if($result){
      $return_data = array(
        "status" => 1,
        "message" => "Salesman has been Inserted"
    );
    }else{
        $return_data = array(
        "status" => 0,
        "message" => "Salesman has not been Inserted"
        );
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'edit'){
  // print_r("jfsksk");
  $code=$_POST['code'];
    $query = "SELECT * FROM salesman WHERE sman_code='$code'";
    // PRINT_R($query);
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    $return_data = $show;
}elseif(isset($_POST['action']) && $_POST['action'] == 'check_code'){
    // print_r("jfsksk");
    $code=$_POST['inputCode'];
    $query = "SELECT sman_code FROM salesman WHERE sman_code='$code'";
    // PRINT_R($query);
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    // $co_code=$show['CO_CODE'];
    // print_r($co_code); die();
    if (empty($show['sman_code'])) {
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
}
// elseif(isset($_POST['action']) && $_POST['action'] == 'check_company_name'){
//   // print_r("jfsksk");
//   $company_name=$_POST['inputCompanyName'];
//     $query = "SELECT co_name FROM company WHERE co_name='$company_name'";
//     // PRINT_R($query);
//     $result = $conn->query($query);
//     $count = mysqli_num_rows($result);
//     $show = mysqli_fetch_assoc($result);
//     // $co_code=$show['CO_CODE'];
//     // print_r($co_code); die();
//     if (empty($show['co_name'])) {
//       $return_data = array(
//         "status" => 1,
//         "message" => "You Enter a new name"
//       );
//     }else{
//         $return_data = array(
//           "status" => 0,
//           "message" => "This Name is already registered "
//         );
//     }
// }
else if(isset($_POST['action']) && $_POST['action'] == 'update'){
  $salesman_code=$_POST['salesman_code'];
  $salesman_name=$_POST['salesman_name'];
  $address=$_POST['address'];
  $nic_no=$_POST['nic_no'];
  $phone_no=$_POST['phone_no'];
  $join_date=$_POST['join_date'];
  $date_left=$_POST['date_left'];
  $status=$_POST['status'];
  $query="UPDATE salesman set sman_name ='$salesman_name', sman_add = '$address' , phone_no ='$phone_no', nic_no ='$nic_no', doj='$join_date',dor='$date_left', `status` ='$status' WHERE sman_code='$salesman_code'";    
                    //  print_r($query);die();
  $result = $conn->query($query);
  if($result){
      $return_data = array(
          "status" => 1,
          "message" => "Sales Man has been updated"
      );
  }else{
      $return_data = array(
      "status" => 0,
      "message" => "Sales Man has not been updated"
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



