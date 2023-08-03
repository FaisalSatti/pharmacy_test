<?php
session_start();
header("Content-Type: application/json");
include '../../auth/db.php';
if(isset($_POST['action']) && $_POST['action'] == 'insert'){
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
              FROM acttran_mst  WHERE co_code = '$company_code' AND doc_year = '$year' AND voucher_type = 'CP'";
    $select_r = $conn->query($select_q);
    $show = mysqli_fetch_assoc($select_r);
    $voucher_no=$show['voucher_no'];
    $master_q = "insert into acttran_mst(co_code,doc_year,voucher_type,voucher_no,voucher_date,bank_cash_code,naration,ref_no,sn_no,payee   , voucher_source, chq_no    ,post)value ('$company_code','$year','CP','$voucher_no','$voucher_date','$bank','$narration','$reference_no','$bank_ser_no','$monthwise_ser_no','$monthwise_ser_no2','$monthwise_ser_no3'   ,'N')";
    
    $master_r = $conn->query($master_q);
    if($master_r){
        $amounts=0;
        for($i=0;$i< count($_POST['acc_desc']); $i++){
            $acc_desc = $_POST['acc_desc'][$i];
            $detail = $_POST['detail'][$i];
            $pymt_type = $_POST['type'][$i]==''?'':$_POST['type'][$i];
            $depart_desc = $_POST['depart_desc'][$i]=='0'?'':$_POST['depart_desc'][$i];
            $vehicle_code = $_POST['vehicle_code'][$i]=='0'?'':$_POST['vehicle_code'][$i];
            $amount = $_POST['amount'][$i];
            // $amount=intval(preg_replace('/[^\d.]/', '', $amount));
            $amounts = str_replace( ',', '', $amount );
            if( is_numeric( $amounts ) ) {
              $amount = $amounts;
            }
            $memo_desc = $_POST['memo'][$i];
            $detail_q = "insert into acttran_dtl(co_code,doc_year,voucher_type,voucher_no,voucher_date,account_code,debit,amount,dept_code,vehicle_code,remarks,pymt_type)value ('$company_code','$year','CP','$voucher_no','$voucher_date','$acc_desc','$amount','$amount','$depart_desc','$vehicle_code','$memo_desc','$pymt_type')"; 
            // print_r($detail_q);
            $detail_r = $conn->query($detail_q);
        }
        if($detail_r){
            $detail_auto_q = "insert into acttran_dtl(co_code,doc_year,voucher_type,voucher_no,voucher_date,account_code,credit,amount,auto)value ('$company_code','$year','CP','$voucher_no','$voucher_date','$bank','$debit','$debit','Y')";
            // print_r($detail_auto_q);
            $detail_auto_r = $conn->query($detail_auto_q);
            if($detail_auto_r){
              $return_data = array(
                  "status" => 1,
                  // "voucher_no" => $voucher_no,
                  "message" => "Cash Payment has been Inserted having Voucher No:".$voucher_no 
              );
            }else{
                $return_data = array(
                "status" => 0,
                "message" => "Cash Payment has not been Inserted"
                );
            }
        }
        // die();
    }
    
}elseif(isset($_POST['action']) && $_POST['action'] == 'edit'){
  // print_r("jfsksk");
  $co_code=$_POST['co_code'];
  $voucher_year=$_POST['voucher_year'];
  $voucher_type=$_POST['voucher_type'];
  $voucher_no=$_POST['voucher_no'];
    $query = "SELECT * FROM acttran_mst WHERE co_code='$co_code' AND doc_year='$voucher_year' 
              AND voucher_no='$voucher_no' AND voucher_type='$voucher_type' ";
    // PRINT_R($query);
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

              WHERE co_code = '$company_code' AND voucher_type = 'CP' AND voucher_no='$voucher_no'";
  // print_r($upd_mst_q); die();
  $upd_mst_r = $conn->query($upd_mst_q);
  if($upd_mst_r){
    $del_dtl_q="DELETE FROM acttran_dtl  WHERE co_code = '$company_code' AND voucher_type = 'CP' AND voucher_no='$voucher_no'";
    // print_r($del_dtl_q); die();
    $del_dtl_r = $conn->query($del_dtl_q);
    if($del_dtl_r){
        for($i=0;$i< count($_POST['acc_desc']); $i++){
          $acc_desc = $_POST['acc_desc'][$i];
          $detail = $_POST['detail'][$i];
          $pymt_type = $_POST['type'][$i]==''?'':$_POST['type'][$i];
          $depart_desc = $_POST['depart_desc'][$i]=='0'?'':$_POST['depart_desc'][$i];
          $vehicle_code = $_POST['vehicle_code'][$i]=='0'?'':$_POST['vehicle_code'][$i];
          $amount = $_POST['amount'][$i];
          // $amount=intval(preg_replace('/[^\d.]/', '', $amount));
          $amounts = str_replace( ',', '', $amount );
          if( is_numeric( $amounts ) ) {
            $amount = $amounts;
          }
          $memo_desc = $_POST['memo'][$i];
          $detail_q = "insert into acttran_dtl(co_code,doc_year,voucher_type,voucher_no,voucher_date,account_code,credit,amount,dept_code,vehicle_code,remarks,pymt_type)value ('$company_code','$year','CP','$voucher_no','$voucher_date','$acc_desc','$amount','$amount','$depart_desc','$vehicle_code','$memo_desc','$pymt_type')"; 
          $detail_r = $conn->query($detail_q);
        }
          if($detail_r){
            $detail_auto_q = "insert into acttran_dtl(co_code,doc_year,voucher_type,voucher_no,voucher_date,account_code,debit,amount,auto)value ('$company_code','$year','CP','$voucher_no','$voucher_date','$bank','$debit','$debit','Y')";
            $detail_auto_r = $conn->query($detail_auto_q);
              if($detail_auto_r){
                $return_data = array(
                    "status" => 1,
                  //   "voucher_no" => $voucher_no,
                    "message" => "Cash Payment has been Updated having Voucher No:".$voucher_no 
                );
              }else{
                $return_data = array(
                "status" => 0,
                "message" => "Cash Payment has not been Updated"
                );
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
              AND voucher_no='$voucher_no' AND voucher_type='$voucher_type' order by auto desc  ";
    // PRINT_R($query); die();
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
    while($show = mysqli_fetch_assoc($result)){
        $return_data[] = $show;
    }
}

print(json_encode($return_data, JSON_PRETTY_PRINT));

?>



