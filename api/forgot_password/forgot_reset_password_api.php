<?php
session_start();
include("../auth/db.php");
header("Content-Type: application/json");
$json_array = array();
$confirm = '0';

if(isset($_POST['email']) && isset($_POST['token']) && isset($_POST['password']) && isset($_POST['confirm_password']) && !(empty($_POST['email']) || empty($_POST['token']) || empty($_POST['password']) || empty($_POST['confirm_password']))){
    if($_POST['password'] == $_POST['confirm_password']){

        $email = $_POST['email'];
        $token = $_POST['token'];
        $password = md5($_POST['password']);
        $confirm_password = $_POST['confirm_password'];
        
        $query = "SELECT EMAIL,TOKEN FROM COD_AGENT_USERS WHERE EMAIL = '$email' AND TOKEN = '$token'";
        $result = oci_parse($c, $query);
        oci_execute($result);
        $row = oci_fetch_assoc($result);

        if ($row > 0) {

                $update="UPDATE COD_AGENT_USERS SET PASSWORD = '$password' WHERE EMAIL = '$email' AND  TOKEN = '$token'";

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
                "message" => "Something Error!"
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
	
echo json_encode($return_data);
?>