<?php
session_start();
header("Content-Type: application/json");
include '../auth/db.php';
if(isset($_POST['action']) && $_POST['action'] == 'view'){
  // print_r("jfsksk");
    $query = "SELECT * FROM party";
    // PRINT_R($query);
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}
elseif(isset($_POST['action']) && $_POST['action'] == 'company_code'){
  // print_r("jfsksk");
  $company_code=$_POST['company_code'];
    $query = "SELECT * FROM company where co_code='$company_code' ";
    // PRINT_R($query);
    $result = $conn->query($query);
    // $count = mysqli_num_rows($result);
    $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}else if(isset($_POST['action']) && $_POST['action'] == 'update'){

  // print_r($_POST); die();
  $company_code=$_POST['company_code'];
  $control_code=$_POST['control_code'];
  $division=$_POST['division'];
  $party_code=$_POST['party_code'];
  $party_name=$_POST['party_name'];
  $address=$_POST['address'];
  $bill_name=$_POST['bill_name'];
  $bill_address=$_POST['bill_address'];
  $person=$_POST['person'];
  $contact_no=$_POST['contact_no'];
  $email=$_POST['email'];
  $cnic_no=$_POST['cnic_no'];
  $gst_no=$_POST['gst_no'];
  $ntn_no=$_POST['ntn_no'];
  $zone_code=$_POST['zone_code'];
  $city_code=$_POST['city_code'];
  $salesman_code=$_POST['salesman_code'];
  $account_code=$_POST['account_code'];
  $account_name=$_POST['account_name'];
  $druglic_no=$_POST['druglic_no']==''?'0':$_POST['druglic_no'];
  $druglic_date=$_POST['druglic_date'];
  $druglic_name=$_POST['druglic_name'];
  $cus_type=$_POST['cus_type'];
  $cr_days=$_POST['cr_days']==''?'0':$_POST['cr_days'];
  $days_check=$_POST['days_check'];
  $cr_limits=$_POST['cr_limits']==''?'0':$_POST['cr_limits'];
  $limit_check=$_POST['limit_check'];
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
  $limit_utilized=$_POST['limit_utilized']==''?'0':$_POST['limit_utilized'];
  // $entries_debit=$_POST['entries_debit']==''?'0.00':$_POST['entries_debit'];
  // $entries_credit=$_POST['entries_credit']==''?'0.00':$_POST['entries_credit'];
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


  $limit_balance=$_POST['limit_balance']==''?'0.00':$_POST['limit_balance'];
  $limit_balances = str_replace( ',', '', $limit_balance );
  if( is_numeric( $limit_balances ) ) {
    $limit_balance = $limit_balances;
  }


  $closing_debit=$_POST['closing_debit']==''?'0.00':$_POST['closing_debit'];
  $closing_debits = str_replace( ',', '', $closing_debit );
  if( is_numeric( $closing_debits ) ) {
    $closing_debit = $closing_debits;
  }


  $closing_credit=$_POST['closing_credit']==''?'0.00':$_POST['closing_credit'];
  $closing_credits = str_replace( ',', '', $closing_credit );
  if( is_numeric( $closing_credits ) ) {
    $closing_credit = $closing_credits;
  }

  
  // $limit_balance=$_POST['limit_balance'];
  // $closing_debit=$_POST['closing_debit'];
  // $closing_credit=$_POST['closing_credit'];
  $party_account=$_POST['party_account'];

  $query="UPDATE party set  co_code = '$company_code' , div_code='$division' , party_code='$party_code',
          party_name = '$party_name' , bill_name='$bill_name' , bill_add='$bill_address',
          address = '$address' , contact_name='$person' , phone_nos='$contact_no',
          e_mail = '$email' , gst='$gst_no' , ntn='$ntn_no',
          crdays = '$cr_days' , crlimit='$cr_limits' , open_debit='$debit',
          open_credit = '$credit' , trs_debit='$entries_credit' , trs_credit='$entries_credit',
          nic_nbr = '$cnic_no' , zone_code='$zone_code' , city_code='$city_code',
          salesman_code = '$salesman_code' , gl_code='$account_code' , party_div='$party_account',
          druglic_no = '$druglic_no' , druglic_date='$druglic_date' , druglic_name='$druglic_name',
          open_debit_2018 = '$debit_18' , open_credit_2018='$credit_18' , crdays_yn='$days_check',
          crlimit_yn = '$limit_check' , party_control='$control_code' , co1_code='$party_account',
          cust_type = '$cus_type' , gl_name='$account_name' , limit_used='$limit_utilized' , used = '$limit_balance' , party_division2 = '$closing_debit' , entry_user = '$closing_credit'

          WHERE co_code='$company_code' and div_code='$division' AND party_code='$party_code' 
          AND party_control='$control_code'";   
                    //  print_r($query);die();
  $result = $conn->query($query);
  if($result){
      $return_data = array(
          "status" => 1,
          "message" => "Party has been updated"
      );
  }else{
      $return_data = array(
      "status" => 0,
      "message" => "Party has not been updated"
      );
  }
}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
    // print_r("jfsksk");
    $company_code=$_POST['company_code'];
    $control_code=$_POST['control_code'];
    $division=$_POST['division'];
    $party_code=$_POST['party_code'];
    $party_name=$_POST['party_name'];
    $address=$_POST['address'];
    $bill_name=$_POST['bill_name'];
    $bill_address=$_POST['bill_address'];
    $person=$_POST['person'];
    $contact_no=$_POST['contact_no'];
    $email=$_POST['email'];
    $cnic_no=$_POST['cnic_no'];
    $gst_no=$_POST['gst_no'];
    $ntn_no=$_POST['ntn_no'];
    $zone_code=$_POST['zone_code'];
    $city_code=$_POST['city_code'];
    $salesman_code=$_POST['salesman_code'];
    $account_code=$_POST['account_code'];
    $account_name=$_POST['account_name'];
    $druglic_no=$_POST['druglic_no']==''?'0':$_POST['druglic_no'];
    $druglic_date=$_POST['druglic_date'];
    $druglic_name=$_POST['druglic_name'];
    $cus_type=$_POST['cus_type'];
    $cr_days=$_POST['cr_days']==''?'0':$_POST['cr_days'];
    $days_check=$_POST['days_check'];
    $cr_limits=$_POST['cr_limits']==''?'0':$_POST['cr_limits'];
    $limit_check=$_POST['limit_check'];
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
    $limit_utilized=$_POST['limit_utilized']==''?'0':$_POST['limit_utilized'];
    // $entries_debit=$_POST['entries_debit']==''?'0.00':$_POST['entries_debit'];
    // $entries_credit=$_POST['entries_credit']==''?'0.00':$_POST['entries_credit'];
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


    $limit_balance=$_POST['limit_balance']==''?'0.00':$_POST['limit_balance'];
    $limit_balances = str_replace( ',', '', $limit_balance );
    if( is_numeric( $limit_balances ) ) {
      $limit_balance = $limit_balances;
    }


    $closing_debit=$_POST['closing_debit']==''?'0.00':$_POST['closing_debit'];
    $closing_debits = str_replace( ',', '', $closing_debit );
    if( is_numeric( $closing_debits ) ) {
      $closing_debit = $closing_debits;
    }


    $closing_credit=$_POST['closing_credit']==''?'0.00':$_POST['closing_credit'];
    $closing_credits = str_replace( ',', '', $closing_credit );
    if( is_numeric( $closing_credits ) ) {
      $closing_credit = $closing_credits;
    }





    $party_account=$_POST['party_account'];
    $query = "insert into party(co_code,div_code,party_code,party_name,bill_name,bill_add,address,
    contact_name,phone_nos,e_mail,gst,ntn,crdays,crlimit,open_debit,open_credit,trs_debit,trs_credit,
    nic_nbr,zone_code,city_code,salesman_code,gl_code,party_div,druglic_no,druglic_date,druglic_name,open_debit_2018,
    open_credit_2018,crdays_yn,crlimit_yn,party_control,co1_code,cust_type,gl_name,limit_used     ,used, party_division2, entry_user) 
    
    value 
    ('$company_code','$division','$party_code','$party_name','$bill_name','$bill_address','$address',
    '$person','$contact_no','$email','$gst_no','$ntn_no','$cr_days','$cr_limits','$debit','$credit',
    '$entries_debit','$entries_credit','$cnic_no','$zone_code','$city_code','$salesman_code','$account_code',
    '$party_account','$druglic_no','$druglic_date','$druglic_name','$debit_18','$credit_18','$days_check',
    '$limit_check','$control_code','$party_account','$cus_type','$account_name','$limit_utilized'     ,'$limit_balance', '$closing_debit', '$closing_credit')";


    $result = $conn->query($query);
    // PRINT_R($query); die();
    if($result){
      $return_data = array(
        "status" => 1,
        "message" => "Party Account has been Inserted"
    );
    }else{
        $return_data = array(
        "status" => 0,
        "message" => "Party Account has not been Inserted"
        );
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'edit'){
  // print_r("jfsksk");
  $party_code=$_POST['party_code'];
  $control_code=$_POST['control_code'];
  $division_code=$_POST['division_code'];
  $company_code=$_POST['company_code'];
    $query = "SELECT P.*, C.co_name, D.div_name FROM party P join company C on P.co_code = C.co_code JOIN division D on P.div_code = D.div_code WHERE P.div_code='$division_code' AND P.co_code='$company_code' 
    AND P.party_code='$party_code' AND P.party_control='$control_code' ";
    // PRINT_R($query);die();
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    $return_data = $show;
}elseif(isset($_POST['action']) && $_POST['action'] == 'check_party_code'){
    // print_r("jfsksk");
    $control_code=$_POST['control_code'];
    $company_code=$_POST['company_code'];
    $party_code=$_POST['party_code'];
    $division_code=$_POST['division_code'];

    // $query = "SELECT party_code FROM party WHERE party_control='$control_code' AND 
    // co_code = '$company_code' AND party_code='$party_code' AND div_code='$division_code'";

$query="SELECT (case when MAX(party_code) is null then 1 else MAX(party_code)+1 end) party_code 
FROM party  WHERE party_control='$control_code' AND 
    co_code = '$company_code' AND div_code='$division_code' ";


    // PRINT_R($query); die();
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    // $co_code=$show['CO_CODE'];
    // print_r($co_code); die();
    // if (empty($show['party_code'])) {
    //   $return_data = array(
    //     "status" => 1,
    //     "message" => "You Enter a new code"
    //   );
    // }else{
    //     $return_data = array(
    //       "status" => 0,
    //       "message" => "This Code is already registered "
    //     );
    // }
    $return_data = $show;
}elseif(isset($_POST['action']) && $_POST['action'] == 'division_code'){
    //   print_r($_POST); die();
    $query = "SELECT * FROM division";
    // PRINT_R($query);die();
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}elseif(isset($_POST['action']) && $_POST['action'] == 'salesman_code'){
    //   print_r($_POST); die();
    $query = "SELECT * FROM salesman";
    // PRINT_R($query);die();
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}elseif(isset($_POST['action']) && $_POST['action'] == 'zone_code'){
    //   print_r($_POST); die();
        $query = "SELECT * FROM zone";
        // PRINT_R($query);die();
        $result = $conn->query($query);
        $count = mysqli_num_rows($result);
        $return_data=[];
          while($show = mysqli_fetch_assoc($result)){
              $return_data[] = $show;
          }
}elseif(isset($_POST['action']) && $_POST['action'] == 'city_code'){
    //   print_r($_POST); die();
        $query = "SELECT * FROM city";
        // PRINT_R($query);die();
        $result = $conn->query($query);
        $count = mysqli_num_rows($result);
        $return_data=[];
          while($show = mysqli_fetch_assoc($result)){
              $return_data[] = $show;
          }
}elseif(isset($_POST['action']) && $_POST['action'] == 'account_code'){
    //   print_r($_POST); die();
        $query = "SELECT * FROM act_chart where control_code='601' and sub_level1 !='0000' and sub_level2 !='000'";
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



