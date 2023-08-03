<?php
session_start();
include("../auth/db.php");
header("Content-Type: application/json");
$company_id = $_SESSION['company_id'];
$project_id = $_SESSION['project']['PROJECT_ID'];
$user_id = $_SESSION['data']['ID'];
$current_date = date('j:M:y');

if(isset($_POST['action']) && $_POST['action'] == 'change_password'){
    if(isset($_POST['curr_pass']) && isset($_POST['new_pass']) && isset($_POST['re_new_pass']) && !(empty($_POST['curr_pass']) || empty($_POST['new_pass']) || empty($_POST['re_new_pass']))){
    
        if($_POST['new_pass'] == $_POST['re_new_pass']){
            $curr_pass = md5($_POST['curr_pass']);
            $new_pass = md5($_POST['new_pass']);
            $re_new_pass = $_POST['re_new_pass'];
            $query = "SELECT PASSWORD FROM COD_USER_LOGIN WHERE ID = '$user_id'";
            $result = oci_parse($c, $query);
            oci_execute($result);
            $row = oci_fetch_assoc($result);
            if ($row['PASSWORD'] == $curr_pass) {

                    $update="UPDATE COD_USER_LOGIN SET PASSWORD = '$new_pass' WHERE ID = '$user_id'";
                    $compiled = oci_parse($c, $update);
                    if(oci_execute($compiled)){
                        $return_data = array(
                            "status" => 1,
                            "message" => "Password Has Been Changed!"
                        );
                    }
                    else
                    {
                        $return_data = array(
                        "status" => 0,
                        "message" => "Password Has Not Been Changed!"
                        );
                    }	
                    oci_free_statement($compiled);
                    oci_close($c);

            }else{
                $return_data = array(
                    "status" => 0,
                    "message" => "Your Old Password Incorrect!"
                );
            }
        }else{
            $return_data = array(
                "status" => 0,
                "message" => "Password Not Matched!"
            );
        }
    }else{
        $return_data = array(
            "status" => 0,
            "message" => "All Fields Are Required!"
        );
    }
}else{
    $return_data = array(
        "status" => 0,
        "message" => "All Fields Are Required!"
    );
}
echo json_encode($return_data);
?>