 <?php
session_start();
header("Content-Type: application/json");
include '../auth/db.php';
if(isset($_POST['action']) && $_POST['action'] == 'view'){
  // print_r("jfsksk");
    $query = "SELECT * FROM item_wh_um";
    // PRINT_R($query);
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}else if(isset($_POST['action']) && $_POST['action'] == 'update'){
  $company_code=$_POST['company_code'];
  $item_code=$_POST['item_code'];
  $loc_code=$_POST['location_code'];

  $opening=$_POST['openning']==''?'0.00':$_POST['openning'];
  $openning = str_replace( ',', '', $opening );
  if( is_numeric( $openning ) ) {
    $opening = $openning;
  }
  $receipts=$_POST['receipts']==''?'0.00':$_POST['receipts'];
  $receipts = str_replace( ',', '', $receipts );
  if( is_numeric( $receipts ) ) {
    $receipt = $receipts;
  }
  $Issues=$_POST['Issues']==''?'0.00':$_POST['Issues'];
  $Issues = str_replace( ',', '', $Issues );
  if( is_numeric( $Issues ) ) {
    $issue = $Issues;
  }
  $Balances=$_POST['Balance']==''?'0.00':$_POST['Balance'];
  $Balances = str_replace( ',', '', $Balances );
  if( is_numeric( $Balances ) ) {
    $balance = $Balances;
  }
  $query="UPDATE item_wh_um set open_stock = '$opening' , 	rcpt_stock='$receipt' , 
          iss_stock='$issue',bal_stock = '$balance' 
          WHERE co_code='$company_code' AND item_code='$item_code' AND loc_code='$loc_code'";   
                    //  print_r($query);die();
  $result = $conn->query($query);
  if($result){
      $return_data = array(
          "status" => 1,
          "message" => "Item location has been updated"
      );
  }else{
      $return_data = array(
      "status" => 0,
      "message" => "Item location has not been updated"
      );
  }
}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
    // print_r($_POST);die();
    $company_code=$_POST['company_code'];
    $item_code=$_POST['item_code'];
    $loc_code=$_POST['location_code'];

    $opening=$_POST['openning']==''?'0.00':$_POST['openning'];
    $openning = str_replace( ',', '', $opening );
    if( is_numeric( $openning ) ) {
      $opening = $openning;
    }
    $receipts=$_POST['receipts']==''?'0.00':$_POST['receipts'];
    $receipts = str_replace( ',', '', $receipts );
    if( is_numeric( $receipts ) ) {
      $receipt = $receipts;
    }
    $Issues=$_POST['Issues']==''?'0.00':$_POST['Issues'];
    $Issues = str_replace( ',', '', $Issues );
    if( is_numeric( $Issues ) ) {
      $issue = $Issues;
    }
    $Balances=$_POST['Balance']==''?'0.00':$_POST['Balance'];
    $Balances = str_replace( ',', '', $Balances );
    if( is_numeric( $Balances ) ) {
      $balance = $Balances;
    }
    $query = "SELECT * FROM item_wh_um where co_code = '$company_code' and item_code = '$item_code' and loc_code = '$loc_code'";
    $result = $conn->query($query);
    $num = mysqli_num_rows($result);
    // print_r("hi"); 
    if($num <= 0){
      // print_r($num);die();
      $query = "insert into item_wh_um(co_code,item_code,loc_code,open_stock,rcpt_stock,iss_stock,bal_stock) 
      value ('$company_code','$item_code','$loc_code','$opening','$receipt','$issue','$balance')";
      $result = $conn->query($query);
      // PRINT_R($query); die();
      if($result){
        $return_data = array(
          "status" => 1,
          "message" => "Item has been added to the locaton"
      );
      }else{
          $return_data = array(
          "status" => 0,
          "message" => "Item has not been added to the location"
          );
      }

    }else{
      $return_data = array(
        "status" => 0,
        "message" => "Record already exist"
        );
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'edit'){
  // print_r("jfsksk");
  $item_code=$_POST['item_code'];
  $company_code=$_POST['company_code'];
  $location_code=$_POST['location_code'];
    $query = "SELECT * FROM item_wh_um WHERE co_code='$company_code' 
    AND item_code='$item_code' AND loc_code='$location_code'";
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
}elseif(isset($_POST['action']) && $_POST['action'] == 'item_code'){
  $company_code = $_POST['company_code'];
    //   print_r($_POST); die();
        $query = "SELECT * FROM items where co_code = '$company_code'";
        // PRINT_R($query);die();
        $result = $conn->query($query);
        $count = mysqli_num_rows($result);
        $return_data=[];
          while($show = mysqli_fetch_assoc($result)){
              $return_data[] = $show;
          }
}elseif(isset($_POST['action']) && $_POST['action'] == 'location_code'){
    //   print_r($_POST); die();
        $query = "SELECT * FROM location ";
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



