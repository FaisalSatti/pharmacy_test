<?php
session_start();
header("Content-Type: application/json");
include '../../auth/db.php';
if(isset($_POST['action']) && $_POST['action'] == 'account'){
    $company_code=$_POST['company_code'];
    $query = "SELECT substr(descr,1,60) AS DESCR,account_code AS ACCOUNT_CODE
    from ACT_LC_VIEW2
    where substr(account_code,8,3) <> '000'
    and co_code = '$company_code'
    order by descr";
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
    while($show = mysqli_fetch_assoc($result)){
        $return_data[] = $show;
    }
}
else if(isset($_POST['action']) && $_POST['action'] == 'division'){
      $query = "SELECT * from division";
      $result = $conn->query($query);
      $count = mysqli_num_rows($result);
      $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}
else if(isset($_POST['action']) && $_POST['action'] == 'zone'){
      $query = "SELECT * from zone";
      $result = $conn->query($query);
      $count = mysqli_num_rows($result);
      $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}
else if(isset($_POST['action']) && $_POST['action'] == 'gen'){
      $query = "SELECT account_code,descr from act_chart order by account_code";
      $result = $conn->query($query);
      $count = mysqli_num_rows($result);
      $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}else if(isset($_POST['action']) && $_POST['action'] == 'item'){
      $query = "SELECT item_name,item,item_cat,pur_mode,um_name from item_detail_um order by gen_name";
      $result = $conn->query($query);
      $count = mysqli_num_rows($result);
      $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}else if(isset($_POST['action']) && $_POST['action'] == 'items'){
    $company_code=$_POST['company_code'];
      $query = "SELECT item_div,item_descr from items where co_code='$company_code'";
      $result = $conn->query($query);
      $count = mysqli_num_rows($result);
      $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }   
}else if(isset($_POST['action']) && $_POST['action'] == 'product'){
      $query = "SELECT product_name,product_code from product order by product_name";
      $result = $conn->query($query);
      $count = mysqli_num_rows($result);
      $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}else if(isset($_POST['action']) && $_POST['action'] == 'location'){
      $query = "SELECT loc_name,loc_code from location";
      $result = $conn->query($query);
      $count = mysqli_num_rows($result);
      $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}
else if(isset($_POST['action']) && $_POST['action'] == 'batch_no'){
      $query = "SELECT A.co_code,A.loc_code,A.item_code,A.batch_no,A.expiry_date,B.co_name,C.item_descr,D.loc_name from item_batch_no A
      JOIN company B ON A.co_code=B.co_code
      JOIN items C on A.item_code=C.item_div 
      JOIN location D on A.loc_code=D.loc_code ";
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
