<?php
session_start();
header("Content-Type: application/json");
include '../auth/db.php';
if(isset($_POST['action']) && $_POST['action'] == 'view'){
  // print_r("jfsksk");
    $query = "SELECT A.*,B.CO_NAME FROM act_chart A INNER JOIN company B ON A.CO_CODE=B.CO_CODE
    WHERE A.SUB_LEVEL1='0000' AND A.SUB_LEVEL2='000' ";
    // PRINT_R($query);
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}elseif(isset($_POST['action']) && $_POST['action'] == 'edit'){
  // print_r("jfsksk");
  $control_code=$_POST['control_code'];
  $level1=$_POST['level1'];
  $level2=$_POST['level2'];
  $company_code=$_POST['company_code'];

    $query = "SELECT * FROM act_chart WHERE CO_CODE ='$company_code' AND CONTROL_CODE='$control_code' AND SUB_LEVEL1='0000' AND SUB_LEVEL2='000'";
    // PRINT_R($query);
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    $return_data = $show;
}else if(isset($_POST['action']) && $_POST['action'] == 'update'){
  $company_code=$_POST['company_code'];
  $company_name=$_POST['company_name'];
  $control_code=$_POST['control_code'];
  $account_name=$_POST['account_name'];
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
  $query="UPDATE act_chart set OPEN_DEBIT='$debit', OPEN_CREDIT='$credit', DESCR='$account_name'
                     WHERE CO_CODE='$company_code' AND CONTROL_CODE='$control_code' AND SUB_LEVEL1='0000' AND SUB_LEVEL2='000'";    
                    //  print_r($query);die();
  $result = $conn->query($query);
  if($result){
      $return_data = array(
          "status" => 1,
          "message" => "Control Account has been updated"
      );
  }else{
      $return_data = array(
      "status" => 0,
      "message" => "Control Account has not been updated"
      );
  }
}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
    $company_code=$_POST['company_code'];
    $company_name=$_POST['company_name'];
    $control_code=$_POST['control_code'];
    $account_name=$_POST['account_name'];
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
    $account_code=$control_code.'0000'.'000';
    $check_q="SELECT * FROM act_chart where CO_CODE='$company_code' AND CONTROL_CODE='$control_code' AND SUB_LEVEL1='0000' AND SUB_LEVEL2='000'";   
    $check_r = $conn->query($check_q);
    $count = mysqli_num_rows($check_r);
    if($count > 0){
        $return_data = array(
            "status" => 0,
            "message" => "Control Account already exist"
        );
    }else{
        $query = "insert into act_chart(CO_CODE,CONTROL_CODE,SUB_LEVEL1,SUB_LEVEL2,OPEN_DEBIT,OPEN_CREDIT,DESCR,ACCOUNT_CODE) value ('$company_code','$control_code','0000','000','$debit','$credit','$account_name','$account_code')";
        // PRINT_R($query); die();
        $result = $conn->query($query);
        if($result){
        $return_data = array(
            "status" => 1,
            "message" => "Control Account has been Inserted"
        );
        }else{
            $return_data = array(
            "status" => 0,
            "message" => "Control Account has not been Inserted"
            );
        }
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'check_control_code'){
    // print_r("jfsksk");
    // print_r($_POST);DIE();
    $control_code=$_POST['control_code'];
    $company_code=$_POST['company_code'];

    $query = "SELECT CONTROL_CODE FROM act_chart WHERE CONTROL_CODE='$control_code' AND CO_CODE = $company_code";
    // PRINT_R($query);die();
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    // $co_code=$show['CO_CODE'];
    // print_r($co_code); die();
    if (empty($show['CONTROL_CODE'])) {
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
}elseif(isset($_POST['action']) && $_POST['action'] == 'company_code'){
  // print_r("jfsksk");
    $query = "SELECT * FROM company";
    // PRINT_R($query);
    $result = $conn->query($query);
    // $count = mysqli_num_rows($result);
    $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}elseif(isset($_POST['action']) && $_POST['action'] == 'po_code'){
  // print_r("jfsksk");
  $query = "SELECT PARTY_NAME,REFNUM,DOC_DATE,ORDER_KEY,TOTAL_NET_AMT
  FROM PO_MST_LOCAL_UM_MST_VIEW
  WHERE NVL(BAL_QTY,0) > 0
  ORDER BY PARTY_NAME";
    // PRINT_R($query);
    $result = $conn->query($query);
    // $count = mysqli_num_rows($result);
    $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}elseif(isset($_POST['action']) && $_POST['action'] == 'from_code'){
    $company_code=$_POST['company_code'];
    
      $query = "SELECT * FROM ACT_LC_VIEW2 WHERE CO_CODE = '$company_code' AND SUB_LEVEL1 <> '0000' AND SUB_LEVEL2 <> '000' ORDER BY ACCOUNT_CODE ASC";
      // PRINT_R($query);
      $result = $conn->query($query);
      $count = mysqli_num_rows($result);
      $return_data=[];
        while($show = mysqli_fetch_assoc($result)){
            $return_data[] = $show;
        }
  }elseif(isset($_POST['action']) && $_POST['action'] == 'sub_code'){
    $company_code=$_POST['company_code'];
    
      $query = "SELECT * FROM ACT_LC_VIEW2 WHERE CO_CODE = '$company_code' AND SUB_LEVEL1 <> '0000' AND SUB_LEVEL2 = '000' ORDER BY ACCOUNT_CODE ASC";
      // PRINT_R($query);
      $result = $conn->query($query);
      $count = mysqli_num_rows($result);
      $return_data=[];
        while($show = mysqli_fetch_assoc($result)){
            $return_data[] = $show;
        }
  }elseif(isset($_POST['action']) && $_POST['action'] == 'controlCode'){
    $company_code=$_POST['company_code'];
    
      $query = "SELECT * FROM ACT_LC_VIEW2 WHERE CO_CODE = '$company_code' AND SUB_LEVEL1 = '0000' AND SUB_LEVEL2 = '000' ORDER BY ACCOUNT_CODE ASC";
    //   PRINT_R($query);
      $result = $conn->query($query);
    //   $count = mysqli_num_rows($result);
      $return_data=[];
        while($show = mysqli_fetch_assoc($result)){
            $return_data[] = $show;
        }
  }elseif(isset($_POST['action']) && $_POST['action'] == 'from_code1'){
    $company_code=$_POST['company_code'];
    
      $query = "SELECT * FROM ACT_LC_VIEW2 WHERE CO_CODE = '$company_code' AND SUB_LEVEL1 <> '0000' AND SUB_LEVEL2 = '000' ORDER BY ACCOUNT_CODE ASC";
      // PRINT_R($query);
      $result = $conn->query($query);
      $count = mysqli_num_rows($result);
      $return_data=[];
        while($show = mysqli_fetch_assoc($result)){
            $return_data[] = $show;
        }
  }elseif(isset($_POST['action']) && $_POST['action'] == 'from_code2'){
    $company_code=$_POST['company_code'];
    
      $query = "SELECT * FROM ACT_LC_VIEW2 WHERE CO_CODE = '$company_code' AND SUB_LEVEL1 = '0000' AND SUB_LEVEL2 = '000' ORDER BY ACCOUNT_CODE ASC";
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



