<?php
session_start();
header("Content-Type: application/json");
include '../../auth/db.php';
if(isset($_POST['action']) && $_POST['action'] == 'item_code'){
  // print_r("jfsksk");
  $company_code=$_POST['company_code'];
  $query = "SELECT * FROM items  WHERE co_code='$company_code'";
  // PRINT_R($query); DIE();  
  $result = $conn->query($query);
  $count = mysqli_num_rows($result);
  $return_data=[];
  while($show = mysqli_fetch_assoc($result)){
      $return_data[] = $show;
  }
}elseif (isset($_POST['action']) && $_POST['action'] == 'item_detail') {
    // print_r("jfsksk");
    $company_code = $_POST['company_code'];
    $query = "SELECT a.item_descr,a.pur_mode,a.item_div,a.co_code,a.div_code,b.div_name,c.gen_name,d.unit_name from items a 
    left join division b on a.div_code=b.div_code
    left join gen_name c on a.gen_code=c.gen_code
    left join unit	d on a.um_code=d.unit_code
    WHERE a.co_code='$company_code'";
    // PRINT_R($query); DIE();  
    $result = $conn->query($query);
    $return_data = [];
    while ($show = mysqli_fetch_assoc($result)) {
        $return_data[] = $show;
    }
}else {
    $return_data = array(
        "status" => 0,
        "message" => "Action Not Matched"
    );
}
print(json_encode($return_data, JSON_PRETTY_PRINT));

?>