<?php
session_start();
include("db.php");
header("Content-Type: application/json");
$json_array = array();
$user_id = $_SESSION['data']['ID'];

if(isset($_POST['action']) && $_POST['action'] == 'view'){
    $query = "SELECT PS.PROJECT_ID,PS.PARTICULARS FROM COD_USER_PROJECT UP INNER JOIN PRJ_PROJECT_SETUP PS ON PS.PROJECT_ID = UP.PROJECT_ID WHERE UP.USER_ID = '$user_id'";
    
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }
    oci_free_statement($run);
    oci_close($c);
}else{
    $return_data = array(
        "status" => 0,
        "message" => "Action Not Matched"
    );
}

print(json_encode($return_data, JSON_PRETTY_PRINT));

?>