<?php
session_start();
header("Content-Type: application/json");
include '../../auth/db.php';
if(isset($_POST['action']) && $_POST['action'] == 'view'){
    $query = "SELECT A.*,B.co_name FROM act_chart A INNER JOIN company B ON A.co_code=B.co_code
    WHERE A.sub_level1 !='0000' AND A.sub_level2 !='000' ";
    //   PRINT_R($query);
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
    while($show = mysqli_fetch_assoc($result)){
        $return_data[] = $show;
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
  // print_r($_POST);
  // DIE();
    $company_code=$_POST['company_code'];
    $company_name=$_POST['company_name'];
    $control_code=$_POST['control_code'];
    $account_name=$_POST['account_name'];
    $sub_control_code=$_POST['sub_control_code'];
    $sub_account_name=$_POST['sub_account_name'];
    $subsidiary_code=$_POST['subsidiary_code'];
    $subsidiary_name=$_POST['subsidiary_name'];
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
    $account_code=$control_code.$sub_control_code.$subsidiary_code;
    $check_q="SELECT * FROM act_chart where co_code='$company_code' AND control_code='$control_code' AND sub_level1='$sub_control_code' AND sub_level2='$subsidiary_code'";   
    $check_r = $conn->query($check_q);
    $count = mysqli_num_rows($check_r);
    if($count > 0){
        $return_data = array(
            "status" => 0,
            "message" => "Subsidiary Account already exist"
        );
    }else{
        $query = "insert into act_chart(co_code,control_code,sub_level1,sub_level2,open_debit,open_credit,descr,account_code) value ('$company_code','$control_code','$sub_control_code','$subsidiary_code','$debit','$credit','$subsidiary_name','$account_code')";
        $result = $conn->query($query);
        // PRINT_R($query);
        if($result){
        $return_data = array(
            "status" => 1,
            "message" => "Subsidiary Account has been Inserted"
        );
        }else{
            $return_data = array(
            "status" => 0,
            "message" => "Subsidiary Account has not been Inserted"
            );
        }
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'edit'){
    // print_r($_POST);die();
    // print_r("jfsksk");
    $control_code=$_POST['control_code'];
    $company_code=$_POST['company_code'];
    $level1=$_POST['level1'];
    // $level2_name=$_POST['level2_name'];
    // $control_name=$_POST['control_name'];
    $level2=$_POST['level2'];
   
    $query = "SELECT * ,(SELECT descr FROM act_chart WHERE co_code='$company_code'
     AND control_code='$control_code' AND sub_level1='0000' AND sub_level2='000') AS DES, 
     (SELECT DESCR FROM act_chart WHERE co_code='$company_code'
     AND control_code='$control_code' AND sub_level1 = '$level1' AND sub_level2='000') AS SUB_NAME FROM act_chart 
    WHERE control_code='$control_code' 
    AND sub_level1='$level1' AND sub_level2='$level2' 
    AND co_code='$company_code' AND control_code='$control_code'";
    // PRINT_R($query); DIE();
    $result = $conn->query($query);
    // $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    $return_data = $show;
  }else if(isset($_POST['action']) && $_POST['action'] == 'update'){
      // print_r($_POST); die();
    $company_code=$_POST['company_code_e'];
    $company_name=$_POST['company_name_e'];
    $control_code=$_POST['control_code_e'];
    $sub_control_code=$_POST['sub_control_code_e'];
    $subsidiary_code=$_POST['subsidiary_code_e'];
    $subsidiary_name=$_POST['subsidiary_name_e'];
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
    $query="UPDATE act_chart set open_debit='$debit', open_credit='$credit', descr='$subsidiary_name'
            WHERE co_code='$company_code' AND control_code='$control_code' AND sub_level1='$sub_control_code' AND sub_level2='$subsidiary_code'";    
          //  print_r($query);die();
    $result = $conn->query($query);
    if($result){
        $return_data = array(
            "status" => 1,
            "message" => "Subsidiary Account has been updated"
        );
    }else{
        $return_data = array(
        "status" => 0,
        "message" => "Subsidiary Account has not been updated"
        );
    }
  }elseif(isset($_POST['action']) && $_POST['action'] == 'check_subsidiary_code'){
    $subsidiary_code=$_POST['subsidiary_code'];
    $query = "SELECT sub_level2 FROM act_chart WHERE sub_level2='$subsidiary_code'";
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    if (empty($show['sub_level2'])) {
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
}elseif(isset($_POST['action']) && $_POST['action'] == 'sub_control_code'){
//   print_r("jfsksk");
    $control_code=$_POST['control_code'];
    $company_code=$_POST['company_code'];

    $query = "SELECT * FROM act_chart WHERE co_code = $company_code AND control_code='$control_code'";
    // PRINT_R($query); die(); 
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
        If($show['sub_level1'] == "0000" || $show['sub_level2'] != "000"){
            continue;
          }
          $return_data[] = $show;

      }
}elseif(isset($_POST['action']) && $_POST['action'] == 'subsidiary_code'){
    
    $code2 = $_POST['code2'];
    $control_code1 = $_POST['control_code1'];
    $sub_control_code = $_POST['sub_control_code'];
    
    $query = "select * from act_chart WHERE co_code = '$code2' AND  control_code = '$control_code1' AND sub_level1 = '$sub_control_code'";
    $result = $conn->query($query);
    $output4 = mysqli_num_rows($result);
         
      $return_data = $output4;
    
          
    }else{
    $return_data = array(
        "status" => 0,
        "message" => "Action Not Matched"
    );
}

print(json_encode($return_data, JSON_PRETTY_PRINT));

?>
