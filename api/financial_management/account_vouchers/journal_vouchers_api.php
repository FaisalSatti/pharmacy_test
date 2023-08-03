<?php
session_start();
header("Content-Type: application/json");
include '../../auth/db.php';
if(isset($_POST['action']) && $_POST['action'] == 'insert'){
    // print_r($_POST); die();
    //   print_r(($_POST['acc_desc'][0])); die();
    $voucher_date=$_POST['voucher_date'];
    $year=$_POST['year'];
    $company_code=$_POST['company_code'];
    $company_name=$_POST['company_name'];
    $narration=$_POST['narration'];
    $ref_no=$_POST['reference_no'];
    $debit=$_POST['debit'];
    $credit=$_POST['credit'];
    $acc_desc=$_POST['acc_desc'];
    $memo_desc=$_POST['memo'];
    $monthwise_ser_no=$_POST['monthwise_ser_no'];
    $payee=$_POST['payee'];
    $mvoucher_no=$_POST['mvoucher_no'];
    $select_q="SELECT (case when MAX(voucher_no) is null then 1 else MAX(voucher_no)+1 end) voucher_no 
              FROM acttran_mst  WHERE co_code = '$company_code' AND doc_year = '$year' AND voucher_type = 'JV'";
    $select_r = $conn->query($select_q);
    $show = mysqli_fetch_assoc($select_r);
    $voucher_no=$show['voucher_no'];
    $master_q = "insert into acttran_mst(ref_no,co_code,doc_year,voucher_type,voucher_no,voucher_date,naration,sn_no,payee,post)value ('$ref_no','$company_code','$year','JV','$voucher_no','$voucher_date','$narration','$monthwise_ser_no','$payee','N')";
    $master_r = $conn->query($master_q);
    // print_r(count($_POST['acc_desc']));
    if($master_r){
        for($i=0;$i< count($_POST['acc_desc']); $i++){
            $acc_desc = $_POST['acc_desc'][$i];
            $detail = $_POST['detail'][$i];
            $depart_desc = $_POST['depart_desc'][$i]==''?'0':$_POST['depart_desc'][$i];
            $vehicle_code = $_POST['vehicle_code'][$i]==''?'0':$_POST['vehicle_code'][$i];
            $credit=$_POST['credit'][$i];
            $credits = str_replace( ',', '', $credit );
            if( is_numeric( $credits ) ) {
              $credit = $credits;
            }
            $debit=$_POST['debit'][$i];
            $debits = str_replace( ',', '', $debit );
            if( is_numeric( $debits ) ) {
              $debit = $debits;
            }
            if($credit == "" || $credit== '0' || $credit== '0.00' ){
                $detail_q = "insert into acttran_dtl(co_code,doc_year,voucher_type,voucher_no,voucher_date,account_code,debit,amount,remarks,dept_code,vehicle_code,credit)value ('$company_code','$year','JV','$voucher_no','$voucher_date','$acc_desc','$debit','$debit','$memo_desc[$i]','$depart_desc','$vehicle_code','0.00')";
            }else{                
                $detail_q = "insert into acttran_dtl(co_code,doc_year,voucher_type,voucher_no,voucher_date,account_code,credit,amount,remarks,dept_code,vehicle_code,debit)value ('$company_code','$year','JV','$voucher_no','$voucher_date','$acc_desc','$credit','$credit','$memo_desc[$i]','$depart_desc','$vehicle_code','0.00')";
            }
            $detail_r = $conn->query($detail_q);
            if($detail_r){
                $return_data = array(
                    "status" => 1,
                    "voucher_no" => $voucher_no,
                    "message" => "Journal Voucher has been Inserted having Voucher No:".$voucher_no
                );
            }else{
                $return_data = array(
                "status" => 0,
                "message" => "Journal Voucher has not been Inserted"
                );
            }
        }
      
    }
    
}elseif(isset($_POST['action']) && $_POST['action'] == 'update'){
    //   print_r($_POST);
    //     die();
    $voucher_date=$_POST['voucher_date'];
    $year=$_POST['year'];
    $company_code=$_POST['company_code'];
    $company_name=$_POST['company_name'];
    $narration=$_POST['narration'];
    $ref_no=$_POST['reference_no'];
    $debit=$_POST['debit'];
    $credit=$_POST['credit'];
    $acc_desc=$_POST['acc_desc'];
    $memo_desc=$_POST['memo'];
    $monthwise_ser_no=$_POST['monthwise_ser_no'];
    $payee=$_POST['payee'];
    $mvoucher_no=$_POST['mvoucher_no'];
    $voucher_no=$_POST['voucher_no'];
  $upd_mst_q="UPDATE acttran_mst SET voucher_date='$voucher_date', doc_year='$year' ,
              naration='$narration',ref_no='$ref_no'
              WHERE co_code = '$company_code' AND voucher_type = 'JV' AND voucher_no='$voucher_no'";
  // print_r($upd_mst_q); die();
  $upd_mst_r = $conn->query($upd_mst_q);
  if($upd_mst_r){
    $del_dtl_q="DELETE FROM acttran_dtl  WHERE co_code = '$company_code' AND voucher_type = 'JV' AND voucher_no='$voucher_no'";
    // print_r($del_dtl_q); die();
    $del_dtl_r = $conn->query($del_dtl_q);
    if($del_dtl_r){
      for($i=0;$i< count($_POST['acc_desc']); $i++){
        $acc_desc = $_POST['acc_desc'][$i];
        $detail = $_POST['detail'][$i];
        $depart_desc = $_POST['depart_desc'][$i]==''?'0':$_POST['depart_desc'][$i];
        $vehicle_code = $_POST['vehicle_code'][$i]==''?'0':$_POST['vehicle_code'][$i];
        $credit=$_POST['credit'][$i];
        $credits = str_replace( ',', '', $credit );
        if( is_numeric( $credits ) ) {
          $credit = $credits;
        }
        $debit=$_POST['debit'][$i];
        $debits = str_replace( ',', '', $debit );
        if( is_numeric( $debits ) ) {
          $debit = $debits;
        }
        if($credit == "" || $credit== '0' || $credit== '0.00' ){
            $detail_q = "insert into acttran_dtl(co_code,doc_year,voucher_type,voucher_no,voucher_date,account_code,debit,amount,remarks,dept_code,vehicle_code,credit)value ('$company_code','$year','JV','$voucher_no','$voucher_date','$acc_desc','$debit','$debit','$memo_desc[$i]','$depart_desc','$vehicle_code','0.00')";
        }else{                
            $detail_q = "insert into acttran_dtl(co_code,doc_year,voucher_type,voucher_no,voucher_date,account_code,credit,amount,remarks,dept_code,vehicle_code,debit)value ('$company_code','$year','JV','$voucher_no','$voucher_date','$acc_desc','$credit','$credit','$memo_desc[$i]','$depart_desc','$vehicle_code','0.00')";
        }
        $detail_r = $conn->query($detail_q);
        if($detail_r){
            $return_data = array(
                "status" => 1,
                "voucher_no" => $voucher_no,
                "message" => "Journal Voucher has been Updated having Voucher No:".$voucher_no
            );
        }else{
            $return_data = array(
            "status" => 0,
            "message" => "Journal Voucher has not been Updated"
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
    $query = "SELECT * FROM acttran_dtl WHERE CO_CODE='$co_code' AND DOC_YEAR='$voucher_year' 
              AND VOUCHER_NO='$voucher_no' AND VOUCHER_TYPE='$voucher_type' ORDER BY DEBIT ASC   ";
    // PRINT_R($query);die();
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



