<?php
session_start();
include("db.php");
header("Content-Type: application/json");
$json_array = array();

if(isset($_POST['action']) && $_POST['action'] == 'view'){
    // $query = "SELECT * FROM COD_COMPANY_DE";
    $query = "SELECT * FROM COMP_INFO";
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_array($run)){
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