<?php
session_start();
header("Content-Type: application/json");
include '../../auth/db.php';

if(isset($_POST['action']) && $_POST['action'] == 'account'){
  // print_r("jfsksk");
    $company_code=$_POST['company_code'];
    $query = "SELECT substr(descr,1,60) AS DESCR,account_code AS ACCOUNT_CODE
    from ACT_LC_VIEW2
    where substr(account_code,8,3) <> '000'
    and co_code = '$company_code'
    order by descr";
    // PRINT_R($query); DIE();  
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
    while($show = mysqli_fetch_assoc($result)){
        $return_data[] = $show;
    }
}else if(isset($_POST['action']) && $_POST['action'] == 'division'){
    // print_r("jfsksk");
      $query = "SELECT * from division";
      // PRINT_R($query); DIE();  
      $result = $conn->query($query);
      $count = mysqli_num_rows($result);
      $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}else if(isset($_POST['action']) && $_POST['action'] == 'gen'){
    // print_r("jfsksk");
      $query = "SELECT gen_code,gen_name from gen_name order by gen_name";
      // PRINT_R($query); DIE();  
      $result = $conn->query($query);
      $count = mysqli_num_rows($result);
      $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}else if(isset($_POST['action']) && $_POST['action'] == 'item'){
    // print_r("jfsksk");
      $query = "SELECT item_name,item,item_cat,pur_mode,um_name from item_detail_um order by gen_name";
      // PRINT_R($query); DIE();  
      $result = $conn->query($query);
      $count = mysqli_num_rows($result);
      $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}else if(isset($_POST['action']) && $_POST['action'] == 'party_code'){
    // print_r("jfsksk");
      $query = "SELECT * from party";
    //   PRINT_R($query); DIE();  
      $result = $conn->query($query);
      $count = mysqli_num_rows($result);
      $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}else if(isset($_POST['action']) && $_POST['action'] == 'party_code_sale_mis'){
    $company_code=$_POST['company_code'];
    $query = "SELECT substr(descr,1,60) as party_name,account_code as party_code
    from act_lc_view2
    where substr(account_code,8,3) <> '000'
    and co_code = '$company_code'
    order by descr";
    //   PRINT_R($query); DIE();  
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
    while($show = mysqli_fetch_assoc($result)){
        $return_data[] = $show;
    }
}else if(isset($_POST['action']) && $_POST['action'] == 'items'){
    // print_r("jfsksk");
    $company_code=$_POST['company_code'];
      $query = "SELECT item_div,item_descr from items where co_code='$company_code'";
      $result = $conn->query($query);
      $count = mysqli_num_rows($result);
      $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }   //   PRINT_R($query); DIE();  
}else if(isset($_POST['action']) && $_POST['action'] == 'product'){
    // print_r("jfsksk");
      $query = "SELECT product_name,product_code from product order by product_name";
      // PRINT_R($query); DIE();  
      $result = $conn->query($query);
      $count = mysqli_num_rows($result);
      $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}else if(isset($_POST['action']) && $_POST['action'] == 'location'){
    // print_r("jfsksk");
      $query = "SELECT loc_name,loc_code from location";
      // PRINT_R($query); DIE();  
      $result = $conn->query($query);
      $count = mysqli_num_rows($result);
      $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}
else if(isset($_POST['action']) && $_POST['action'] == 'batch_no'){
    // print_r("jfsksk");
      $query = "SELECT A.co_code,A.loc_code,A.item_code,A.batch_no,A.expiry_date,B.co_name,C.item_descr,D.loc_name from item_batch_no A
      JOIN company B ON A.co_code=B.co_code
      JOIN items C on A.item_code=C.item_div 
      JOIN location D on A.loc_code=D.loc_code ";
    //   PRINT_R($query); DIE();  
      $result = $conn->query($query);
      $count = mysqli_num_rows($result);
      $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}else if(isset($_POST['action']) && $_POST['action'] == 'zone'){
    // print_r("jfsksk");
      $query = "SELECT * from zone";
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



