<?php
session_start();
if(!isset($_SESSION['data'])){
    header('location:../../index.php');die();
}
include("../auth/db.php");
header("Content-Type: application/json");
$company_id = $_SESSION['company_id'];
$project_id = $_SESSION['project']['PROJECT_ID'];
$current_date = date('j:M:y');
$user_id = $_SESSION['data']['ID'];

if(isset($_POST['action']) && $_POST['action'] == 'landproviders_view'){
    $view_q = "SELECT DISTINCT A.AG_ID,CUS_NAME,CONTACT_NO,PERM_ADD FROM INVESTEMENT_CONTRACT_MASTER A
    INNER JOIN COD_CUSTOMER_MASTER B ON A.AG_ID = B.CUS_ID
    WHERE A.DEAL_TYPE = 'D' AND A.PROJECT_ID = '$project_id'";
    $view_r = oci_parse($c, $view_q);
    oci_execute($view_r);
    $return_data=[];
    while ($view_row = oci_fetch_assoc($view_r)){
        $return_data[] = $view_row;
    }   
}else if(isset($_POST['action']) && $_POST['action'] == 'landproviders_stats'){
    $view_q = "SELECT COUNT(DISTINCT AG_ID) AS TOTAL_DEALER FROM INVESTEMENT_CONTRACT_MASTER WHERE DEAL_TYPE = 'D' AND PROJECT_ID = '$project_id'";
    $view_r = oci_parse($c, $view_q);
    oci_execute($view_r);
    $return_data=[];
    while ($view_row = oci_fetch_assoc($view_r)){
        $return_data[] = $view_row;
    }   
}else if(isset($_POST['action']) && $_POST['action'] == 'landproviders_view'){
    $view_q = "SELECT DISTINCT A.AG_ID,CUS_NAME,CONTACT_NO,PERM_ADD FROM INVESTEMENT_CONTRACT_MASTER A
    INNER JOIN COD_CUSTOMER_MASTER B ON A.AG_ID = B.CUS_ID
    WHERE A.DEAL_TYPE = 'D' AND A.PROJECT_ID = '$project_id'";
    $view_r = oci_parse($c, $view_q);
    oci_execute($view_r);
    $return_data=[];
    while ($view_row = oci_fetch_assoc($view_r)){
        $return_data[] = $view_row;
    }   
}else{
    $return_data = array(
      "status" => 0,
      "message" => "Action Not Matched"
    );
}

print(json_encode($return_data, JSON_PRETTY_PRINT));

?> 