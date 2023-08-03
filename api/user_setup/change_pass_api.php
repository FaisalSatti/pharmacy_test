<?php
session_start();
include("../connection.php");
header("Content-Type: application/json");
$user_id =  $_SESSION['ID'];

if(isset($_POST['action']) && $_POST['action'] == 'change_password'){
        if($_POST['new_pass'] == $_POST['re_new_pass']){
            $curr_pass = $_POST['curr_pass'];
            $new_pass = $_POST['new_pass'];
            $re_new_pass = $_POST['re_new_pass'];
            $query = "select password from user where ID = '$user_id' and role='admin'";
            // print_r($query);
            // die();
            $result = $conn->query($query);
            $show = mysqli_fetch_assoc($result);
            if ($show['password'] == $curr_pass) {

                    $update="update user SET password = '$new_pass' WHERE ID = '$user_id'";
                    $result = $conn->query($update);
                    if($result){
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

            }else{
                $return_data = array(
                    "status" => 0,
                    "message" => "Your Old Password is Incorrect!"
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