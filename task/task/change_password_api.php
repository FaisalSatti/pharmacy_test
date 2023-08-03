<?php
session_start();
include("../auth/db.php");
header("Content-Type: application/json");
$json_array = array();
$confirm = '0';

if(isset($_POST['curr_pass']) && isset($_POST['new_pass']) && isset($_POST['re_new_pass']) && !(empty($_POST['curr_pass']) || empty($_POST['new_pass']) || empty($_POST['re_new_pass']))){
    
    if($_POST['new_pass'] == $_POST['re_new_pass']){
        $curr_pass = $_POST['curr_pass'];
        $new_pass = $_POST['new_pass'];
        $re_new_pass = $_POST['re_new_pass'];
        $name = $_SESSION['data']['NAMENAME'];
        
        $query = "SELECT PASSWORD FROM COD_USER_LOGIN WHERE NAMENAME = '$name'";
        $result = oci_parse($c, $query);
        oci_execute($result);
        $row = oci_fetch_assoc($result);
        if ($row['PASSWORD'] == $curr_pass) {

                $update="UPDATE COD_USER_LOGIN SET PASSWORD = '$new_pass' WHERE NAMENAME = '$name'";
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
	
echo json_encode($return_data);
?>