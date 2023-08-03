<?php
header("Content-Type: application/json");
include("../api/auth/db.php");

if (isset($_POST['action']) && $_POST['action'] == 'company_id') {
    // $company_id = $_POST["company_id"];
    // $company_name = $_POST["company_name"];
    
    $query = "SELECT * FROM `code`";
    $result = mysqli_query($con, $query);
    // print_r($result);die();
    $return_data = [];
    while ($show = mysqli_fetch_assoc($result)) {
        $return_data[] = $show;
    }
    // print_r($return_data); die();
}
print(json_encode($return_data, JSON_PRETTY_PRINT));