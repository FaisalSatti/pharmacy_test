<?php
session_start();
header("Content-Type: application/json");
include '../../auth/db.php';
if(isset($_POST['action']) && $_POST['action'] == 'view'){
  // print_r("jfsksk");
    $query = "SELECT A.*,B.co_name FROM act_chart A INNER JOIN company B ON A.co_code=B.co_code
    WHERE A.SUB_LEVEL1 !='0000' AND A.SUB_LEVEL2='000' ";
    // PRINT_R($query);
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
    $company_code=$_POST['company_code'];
    $company_name=$_POST['company_name'];
    $control_code=$_POST['control_code'];
    $account_name=$_POST['account_name'];
    $sub_control_code=$_POST['sub_control_code'];
    $sub_control_name=$_POST['sub_control_name'];
    $debit=$_POST['debit']==''?'0':$_POST['debit'];
    $debits = str_replace( ',', '', $debit );
    if( is_numeric( $debits ) ) {
      $debit = $debits;
    }
    $credit=$_POST['credit']==''?'0':$_POST['credit'];
    $credits = str_replace( ',', '', $credit );
    if( is_numeric( $credits ) ) {
      $credit = $credits;
    }
    $account_code=$control_code.$sub_control_code.'000';
    $check_q="SELECT * FROM act_chart where co_code='$company_code' AND control_code='$control_code' AND sub_level1='$sub_control_code' AND sub_level2='000'";   
    $check_r = $conn->query($check_q);
    $count = mysqli_num_rows($check_r);
    if($count > 0){
        $return_data = array(
            "status" => 0,
            "message" => "Sub Control Account already exist"
        );
    }else{
        $query = "insert into act_chart(co_code,control_code,sub_level1,sub_level2,open_debit,open_credit,descr,account_code) value ('$company_code','$control_code','$sub_control_code','000','$debit','$credit','$sub_control_name','$account_code')";
        $result = $conn->query($query);
        // PRINT_R($query);
        if($result){
        $return_data = array(
            "status" => 1,
            "message" => "Sub Control Account has been Inserted"
        );
        }else{
            $return_data = array(
            "status" => 0,
            "message" => "Sub Control Account has not been Inserted"
            );
        }
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'edit'){
    // print_r($_POST);die();
  $control_code=$_POST['control_code'];
  $company_code=$_POST['company_code'];
  $level1=$_POST['level1'];
  // $level1_name=$_POST['level1_name'];
  // $control_name=$_POST['control_name'];
  $level2=$_POST['level2'];
  $query = "SELECT * ,(SELECT descr FROM act_chart WHERE co_code='$company_code'
   AND control_code='$control_code' AND sub_level1='0000' AND sub_level2='000') AS DES FROM act_chart 
  WHERE control_code='$control_code' 
  AND sub_level1='$level1' AND sub_level2='$level2' 
  AND co_code='$company_code' AND control_code='$control_code'";
  // PRINT_R($query); DIE();
  $result = $conn->query($query);
  $count = mysqli_num_rows($result);
  $show = mysqli_fetch_assoc($result);
  $return_data = $show;
}else if(isset($_POST['action']) && $_POST['action'] == 'update'){
    // print_r($_POST);die();
  $company_code=$_POST['company_code_e'];
  $company_name=$_POST['company_name_e'];
  $control_code=$_POST['control_code_e'];
  $sub_control_code=$_POST['sub_control_code_e'];
  $sub_control_name=$_POST['sub_control_name_e'];
  $debit=$_POST['debit_e']==''?'0':$_POST['debit_e'];
  $debits = str_replace( ',', '', $debit );
  if( is_numeric( $debits ) ) {
    $debit = $debits;
  }
  $credit=$_POST['credit_e']==''?'0':$_POST['credit_e'];
  $credits = str_replace( ',', '', $credit );
  if( is_numeric( $credits ) ) {
    $credit = $credits;
  }
  $query="UPDATE act_chart set open_debit='$debit', open_credit='$credit', descr='$sub_control_name'
          WHERE co_code='$company_code' AND control_code='$control_code' AND sub_level1='$sub_control_code' AND sub_level2='000'";    
        //  print_r($query);die();
  $result = $conn->query($query);
  if($result){
      $return_data = array(
          "status" => 1,
          "message" => "Sub Control Account has been updated"
      );
  }else{
      $return_data = array(
      "status" => 0,
      "message" => "Sub Control Account has not been updated"
      );
  }
}elseif(isset($_POST['action']) && $_POST['action'] == 'check_sub_control_code'){
    $sub_control_code=$_POST['sub_control_code'];
    $companycode = $_POST['company_code'];
    $controlcode = $_POST['control_code'];
    $query = "select * from act_chart WHERE co_code = '$companycode' AND control_code = '$controlcode' AND sub_level1 = '$sub_control_code' ";
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    if (empty($show['sub_level1'])) {
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
}elseif(isset($_POST['action']) && $_POST['action'] == 'control_code'){
  // print_r("jfsksk");
    $company_code=$_POST['company_code'];
    $query = "SELECT control_code,descr FROM act_chart WHERE co_code='$company_code' AND sub_level1 = '0000' AND sub_level2 = '000'";
    // PRINT_R($query); die(); 
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
