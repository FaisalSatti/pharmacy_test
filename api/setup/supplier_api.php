<?php
session_start();
header("Content-Type: application/json");
include '../auth/db.php';
if(isset($_POST['action']) && $_POST['action'] == 'view'){
  // print_r("jfsksk");
    $query = "SELECT * FROM supp";
    // PRINT_R($query);
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}else if(isset($_POST['action']) && $_POST['action'] == 'update'){
    $company_code=$_POST['company_code'];
    $party_code=$_POST['party_code'];
    $party_name=$_POST['party_name'];
    $address=$_POST['address'];
    $person=$_POST['person'];
    $contact_no=$_POST['contact_no'];
    $email=$_POST['email'];
    $cnic_no=$_POST['cnic_no'];
    $gst_no=$_POST['gst_no'];
    $ntn_no=$_POST['ntn_no'];
    $account_code=$_POST['account_code'];
    $account_name=$_POST['account_name'];
    $debit=$_POST['debit']==''?'0.00':$_POST['debit'];
    $debits = str_replace( ',', '', $debit );
    if( is_numeric( $debits ) ) {
      $debit = $debits;
    }
    $credit=$_POST['credit']==''?'0.00':$_POST['credit'];
    $credits = str_replace( ',', '', $credit );
    if( is_numeric( $credits ) ) {
      $credit = $credits;
    }
    $debit_18=$_POST['debit_18']==''?'0.00':$_POST['debit_18'];
    $debits_18 = str_replace( ',', '', $debit_18 );
    if( is_numeric( $debits_18 ) ) {
      $debit_18 = $debits_18;
    }
    $credit_18=$_POST['credit_18']==''?'0.00':$_POST['credit_18'];
    $credits_18 = str_replace( ',', '', $credit_18 );
    if( is_numeric( $credits_18 ) ) {
      $credit_18 = $credits_18;
    }
    $entries_debit=$_POST['entries_debit']==''?'0.00':$_POST['entries_debit'];
    $entries_debits = str_replace( ',', '', $entries_debit );
    if( is_numeric( $entries_debits ) ) {
      $entries_debit = $entries_debits;
    }
    $entries_credit=$_POST['entries_credit']==''?'0.00':$_POST['entries_credit'];
    $entries_credits = str_replace( ',', '', $entries_credit );
    if( is_numeric( $entries_credits ) ) {
      $entries_credit = $entries_credits;
    }
    $party_account=$_POST['party_account'];

  $query="UPDATE supp set co_code = '$company_code', party_code='$party_code',
          party_name = '$party_name' , `address` = '$address' , contact_name='$person' , phone_nos='$contact_no',
e_mail = '$email' , gst='$gst_no' , ntn='$ntn_no' , open_debit='$debit',
          open_credit = '$credit' , trs_debit='$entries_credit' , trs_credit='$entries_credit',
          nic_nbr = '$cnic_no' , gl_code='$account_code' , supp_div='$party_account',
          open_debit_2018 = '$debit_18' , open_credit_2018='$credit_18' 
          WHERE co_code='$company_code' AND party_code='$party_code'";   
                    //  print_r($query);die();
  $result = $conn->query($query);
  if($result){
      $return_data = array(
          "status" => 1,
          "message" => "Supplier has been updated"
      );
  }else{
      $return_data = array(
      "status" => 0,
      "message" => "Supplier has not been updated"
      );
  }
}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
    // print_r("jfsksk");
    $company_code=$_POST['company_code'];
    $party_code=$_POST['party_code'];
    $party_name=$_POST['party_name'];
    $address=$_POST['address'];
    $person=$_POST['person'];
    $contact_no=$_POST['contact_no'];
    $email=$_POST['email'];
    $cnic_no=$_POST['cnic_no'];
    $gst_no=$_POST['gst_no'];
    $ntn_no=$_POST['ntn_no'];
    $account_code=$_POST['account_code'];
    $account_name=$_POST['account_name'];
    $debit=$_POST['debit']==''?'0.00':$_POST['debit'];
    $debits = str_replace( ',', '', $debit );
    if( is_numeric( $debits ) ) {
      $debit = $debits;
    }
    $credit=$_POST['credit']==''?'0.00':$_POST['credit'];
    $credits = str_replace( ',', '', $credit );
    if( is_numeric( $credits ) ) {
      $credit = $credits;
    }
    $debit_18=$_POST['debit_18']==''?'0.00':$_POST['debit_18'];
    $debits_18 = str_replace( ',', '', $debit_18 );
    if( is_numeric( $debits_18 ) ) {
      $debit_18 = $debits_18;
    }
    $credit_18=$_POST['credit_18']==''?'0.00':$_POST['credit_18'];
    $credits_18 = str_replace( ',', '', $credit_18 );
    if( is_numeric( $credits_18 ) ) {
      $credit_18 = $credits_18;
    }
    $entries_debit=$_POST['entries_debit']==''?'0.00':$_POST['entries_debit'];
    $entries_debits = str_replace( ',', '', $entries_debit );
    if( is_numeric( $entries_debits ) ) {
      $entries_debit = $entries_debits;
    }
    $entries_credit=$_POST['entries_credit']==''?'0.00':$_POST['entries_credit'];
    $entries_credits = str_replace( ',', '', $entries_credit );
    if( is_numeric( $entries_credits ) ) {
      $entries_credit = $entries_credits;
    }
    $party_account=$_POST['party_account'];
    $query = "insert into supp(co_code,party_code,party_name,address,
    contact_name,phone_nos,e_mail,gst,ntn,open_debit,open_credit,trs_debit,trs_credit,
    nic_nbr,gl_code,supp_div,open_debit_2018,
    open_credit_2018) value 
    ('$company_code','$party_code','$party_name','$address',
    '$person','$contact_no','$email','$gst_no','$ntn_no','$debit','$credit',
    '$entries_debit','$entries_credit','$cnic_no','$account_code',
    '$party_account','$debit_18','$credit_18')";
    $result = $conn->query($query);
    // PRINT_R($query); die();
    if($result){
      $return_data = array(
        "status" => 1,
        "message" => "Supplier Account has been Inserted"
    );
    }else{
        $return_data = array(
        "status" => 0,
        "message" => "Supplier Account has not been Inserted"
        );
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'EDIT'){
  // print_r($_POST);die();
  $P_CODE=$_POST['P_CODE'];
  $COMPANY_CODE=$_POST['COMPANY_CODE'];
    $query = "SELECT * FROM supp WHERE co_code='$COMPANY_CODE' 
    AND party_code='$P_CODE'";
    // PRINT_R($query);
    // die();
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    $return_data = $show;
}elseif(isset($_POST['action']) && $_POST['action'] == 'company_code'){
  // print_r($_POST);die();
  $COMPANY_CODE=$_POST['company_code'];
    $query = "SELECT co_name FROM company WHERE co_code='$COMPANY_CODE' ";
    // PRINT_R($query);
    // die();
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    $return_data = $show;
}elseif(isset($_POST['action']) && $_POST['action'] == 'check_supplier_code'){
    // print_r("jfsksk");
    $company_code=$_POST['company_code'];
    $party_code=$_POST['party_code'];

    $query = "SELECT party_code FROM supp WHERE co_code = '$company_code' AND party_code='$party_code'";
    // PRINT_R($query); die();
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    // $co_code=$show['CO_CODE'];
    // print_r($co_code); die();
    if (empty($show['party_code'])) {
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
}elseif(isset($_POST['action']) && $_POST['action'] == 'account_code'){
    //   print_r($_POST); die();
        $query = "SELECT * FROM act_chart where control_code='301' and sub_level1 != '0000' and sub_level2 !='000'";
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



