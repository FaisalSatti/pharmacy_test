<?php
session_start();
header("Content-Type: application/json");
include '../../auth/db.php';

if(isset($_POST['action']) && $_POST['action'] == 'view'){
  // print_r("jfsksk");
    $query = "SELECT * FROM acttran_mst";
    // PRINT_R($query);
    $result = $conn->query($query);
    $count = mysqli_num_rows($result); 
    $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}
else if(isset($_POST['action']) && $_POST['action'] == 'insert'){
    // print_r($_POST); die();
    $voucher_date=$_POST['voucher_date'];
    $reference_no=$_POST['reference_no'];
    $year=$_POST['year'];
    $company_code=$_POST['company_code'];
    $company_name=$_POST['company_name'];
    $bank=$_POST['bank'];
    $title=$_POST['title'];
    $bank_ser_no=$_POST['bank_ser_no'];
    $monthwise_ser_no=$_POST['monthwise_ser_no'];
    $narration=$_POST['narration'];
    $debit=$_POST['debit'];

    $monthwise_ser_no2=$_POST['monthwise_ser_no2'];
    $monthwise_ser_no3=$_POST['monthwise_ser_no3'];
    // $debit=intval(preg_replace('/[^\d.]/', '', $debit));
    $debits = str_replace( ',', '', $debit );
    if( is_numeric( $debits ) ) {
      $debit = $debits;
    }
    $select_q="SELECT (case when MAX(voucher_no) is null then 1 else MAX(voucher_no)+1 end) voucher_no 
              FROM acttran_mst  WHERE co_code = '$company_code' AND doc_year = '$year' AND voucher_type = 'CR'";
    $select_r = $conn->query($select_q);
    $show = mysqli_fetch_assoc($select_r);
    $voucher_no=$show['voucher_no'];
    $master_q = "insert into acttran_mst(co_code,doc_year,voucher_type,voucher_no,voucher_date,bank_cash_code,naration,ref_no,sn_no,payee,voucher_source, chq_no    ,post)value ('$company_code','$year','CR','$voucher_no','$voucher_date','$bank','$narration','$reference_no','$bank_ser_no','$monthwise_ser_no','$monthwise_ser_no2','$monthwise_ser_no3'   ,'N')";
    
    $master_r = $conn->query($master_q);
    if($master_r){
      $detail_auto_q = "insert into acttran_dtl(co_code,doc_year,voucher_type,voucher_no,voucher_date,account_code,debit,amount,auto)value ('$company_code','$year','CR','$voucher_no','$voucher_date','$bank','$debit','$debit','Y')";
      $detail_auto_r = $conn->query($detail_auto_q);
      if($detail_auto_r){
        $amounts=0;
        for($i=0;$i< count($_POST['acc_desc']); $i++){
            $acc_desc = $_POST['acc_desc'][$i];
            $detail = $_POST['detail'][$i];
            $depart_desc = $_POST['depart_desc'][$i]=='0'?'':$_POST['depart_desc'][$i];
            $vehicle_code = $_POST['vehicle_code'][$i]=='0'?'':$_POST['vehicle_code'][$i];
            $amount = $_POST['amount'][$i];
            // $amount=intval(preg_replace('/[^\d.]/', '', $amount));
            $amounts = str_replace( ',', '', $amount );
            if( is_numeric( $amounts ) ) {
              $amount = $amounts;
            }
            $memo_desc = $_POST['memo'][$i];
            $detail_q = "insert into acttran_dtl(co_code,doc_year,voucher_type,voucher_no,voucher_date,account_code,credit,amount,dept_code,vehicle_code,remarks)value ('$company_code','$year','CR','$voucher_no','$voucher_date','$acc_desc','$amount','$amount','$depart_desc','$vehicle_code','$memo_desc')"; 
            $detail_r = $conn->query($detail_q);
            if($detail_r){
              $return_data = array(
                  "status" => 1,
                  // "voucher_no" => $voucher_no,
                  "message" => "Cash Receipt has been Inserted having Voucher No:".$voucher_no 
              );
            }else{
              $return_data = array(
              "status" => 0,
              "message" => "Cash Receipt has not been Inserted"
              );
          }
        }
      }
    }
    
}
elseif(isset($_POST['action']) && $_POST['action'] == 'edit'){
  // print_r("jfsksk");
  $co_code=$_POST['co_code'];
  $voucher_year=$_POST['voucher_year'];
  $voucher_type=$_POST['voucher_type'];
  $voucher_no=$_POST['voucher_no'];
    $query = "SELECT * FROM acttran_mst WHERE co_code='$co_code' AND doc_year='$voucher_year' 
              AND voucher_no='$voucher_no' AND voucher_type='$voucher_type' ";
    // PRINT_R($query); die();
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    $return_data = $show;
}elseif(isset($_POST['action']) && $_POST['action'] == 'update'){
  // print_r($_POST);
  //   die();
    $voucher_date=$_POST['voucher_date'];
    $reference_no=$_POST['reference_no'];
    $year=$_POST['year'];
    $company_code=$_POST['company_code'];
    $company_name=$_POST['company_name'];
    $bank=$_POST['bank'];
    $title=$_POST['title'];
    $bank_ser_no=$_POST['bank_ser_no'];
    $monthwise_ser_no=$_POST['monthwise_ser_no'];
    $narration=$_POST['narration'];
    $debit=$_POST['debit'];
    
    $monthwise_ser_no2=$_POST['monthwise_ser_no2'];
    $monthwise_ser_no3=$_POST['monthwise_ser_no3'];
  // $debit=intval(preg_replace('/[^\d.]/', '', $debit));
  $debits = str_replace( ',', '', $debit );
  if( is_numeric( $debits ) ) {
    $debit = $debits;
  }
  $voucher_no=$_POST['voucher_no'];
  $upd_mst_q="UPDATE acttran_mst SET voucher_date='$voucher_date', doc_year='$year' , bank_cash_code='$bank',
              naration='$narration',sn_no='$bank_ser_no' ,payee='$monthwise_ser_no', 

              voucher_source = '$monthwise_ser_no2', chq_no = '$monthwise_ser_no3'


              
              WHERE co_code = '$company_code' AND voucher_type = 'CR' AND voucher_no='$voucher_no'";
  // print_r($upd_mst_q); die();
  $upd_mst_r = $conn->query($upd_mst_q);
  if($upd_mst_r){
    $del_dtl_q="DELETE FROM acttran_dtl  WHERE co_code = '$company_code' AND voucher_type = 'CR' AND voucher_no='$voucher_no'";
    // print_r($del_dtl_q); die();
    $del_dtl_r = $conn->query($del_dtl_q);
    if($del_dtl_r){
      $detail_auto_q = "insert into acttran_dtl(co_code,doc_year,voucher_type,voucher_no,voucher_date,account_code,debit,amount,auto)value ('$company_code','$year','CR','$voucher_no','$voucher_date','$bank','$debit','$debit','Y')";
      $detail_auto_r = $conn->query($detail_auto_q);
      if($detail_auto_r){
        $amounts=0;
        for($i=0;$i< count($_POST['acc_desc']); $i++){
            $acc_desc = $_POST['acc_desc'][$i];
            $detail = $_POST['detail'][$i];
            $depart_desc = $_POST['depart_desc'][$i]=='0'?'':$_POST['depart_desc'][$i];
            $vehicle_code = $_POST['vehicle_code'][$i]=='0'?'':$_POST['vehicle_code'][$i];
            $amount = $_POST['amount'][$i];
            // $amount=intval(preg_replace('/[^\d.]/', '', $amount));
            $amounts = str_replace( ',', '', $amount );
            if( is_numeric( $amounts ) ) {
              $amount = $amounts;
            }
            $memo_desc = $_POST['memo'][$i];
            $detail_q = "insert into acttran_dtl(co_code,doc_year,voucher_type,voucher_no,voucher_date,account_code,credit,amount,dept_code,vehicle_code,remarks)value ('$company_code','$year','CR','$voucher_no','$voucher_date','$acc_desc','$amount','$amount','$depart_desc','$vehicle_code','$memo_desc')"; 
            $detail_r = $conn->query($detail_q);
            if($detail_r){
              $return_data = array(
                  "status" => 1,
                  "voucher_no" => $voucher_no,
                  "message" => "Cash Receipt has been Updated having Voucher No:".$voucher_no 
              );
            }else{
              $return_data = array(
              "status" => 0,
              "message" => "Cash Receipt has not been Updated"
              );
            }
        }
      }
    }
  } 
}elseif(isset($_POST['action']) && $_POST['action'] == 'edit_table'){
  // print_r("jfsksk");
  $co_code=$_POST['co_code'];
  $voucher_year=$_POST['voucher_year'];
  $voucher_type=$_POST['voucher_type'];
  $voucher_no=$_POST['voucher_no'];
    $query = "SELECT * FROM acttran_dtl WHERE co_code='$co_code' AND doc_year='$voucher_year' 
              AND voucher_no='$voucher_no' AND voucher_type='$voucher_type' ";
    // PRINT_R($query); die();
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
    while($show = mysqli_fetch_assoc($result)){
        $return_data[] = $show;
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'check_control_code'){
    // print_r("jfsksk");
    $control_code=$_POST['control_code'];
    $query = "SELECT control_code FROM act_chart WHERE control_code='$control_code'";
    // PRINT_R($query);
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    // $co_code=$show['CO_CODE'];
    // print_r($co_code); die();
    if (empty($show['control_code'])) {
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
}elseif(isset($_POST['action']) && $_POST['action'] == 'cash_accounts'){
  // print_r("jfsksk");
    $company_code=$_POST['company_code'];
    $query = "SELECT account_code,descr FROM act_chart WHERE control_code='701' AND co_code='$company_code' AND sub_level2 !='000'";
    // PRINT_R($query); DIE();  
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}elseif(isset($_POST['action']) && $_POST['action'] == 'vehicle_code'){
  // print_r("jfsksk");
    $query = "SELECT vehicle_code FROM vehicle";
    // PRINT_R($query); DIE();  
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}elseif(isset($_POST['action']) && $_POST['action'] == 'department_code'){
  // print_r("jfsksk");
    $query = "SELECT dept_code,dept_name FROM dept_store";
    // PRINT_R($query); DIE();  
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}elseif(isset($_POST['action']) && $_POST['action'] == 'account_code'){
    // print_r("jfsksk");
      $company_code=$_POST['company_code'];
      $query = "SELECT account_code,descr FROM ACT_LC_VIEW2 WHERE co_code='$company_code' 
      and sub_level1!='0000' AND sub_level2!='000'";
      // PRINT_R($query); DIE();  
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



