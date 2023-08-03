<?php
session_start();
header("Content-Type: application/json");
include '../../auth/db.php';

if(isset($_POST['action']) && $_POST['action'] == 'account'){
  // print_r("jfsksk");
    $company_code=$_POST['company_code'];
    $query = "SELECT substr(descr,1,60) AS DESCR,account_code AS ACCOUNT_CODE
    from ACT_LC_VIEW2
    where substr(account_code,8,3) = '000' and substr(account_code,4,4) = '0000'
    and co_code = '$company_code'
    order by descr";
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



