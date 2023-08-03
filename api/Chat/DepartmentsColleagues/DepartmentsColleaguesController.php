<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once '../../Sales/BaseController.php';
require_once '../../Sales/ControllerMethodsInterface.php';

class DepartmentsColleaguesController extends BaseController implements ControllerMethodsInterface
{
    private $conn,$company_id,$project_id,$user;
    private $json_array = array();

    public function __construct($conn, $company_id , $project_id, $user)
    {
        # code...
        $this->conn = $conn;
        $this->company_id = $company_id;
        $this->project_id = $project_id;
        $this->user = $user;
    }

    public function index()
    {
        # code...
            // Current Session User Id
            $user_id = $this->user['ID'];

            $query = "SELECT d.name,ul.namename, ul.id, f.friend_id
            FROM  COD_USERS_DEPARTMENTS UD
            LEFT JOIN cod_departments d ON ud.ud_departmentid = d.id
            LEFT JOIN cod_user_login UL ON ul.id = ud.ud_userid
            LEFT JOIN cod_followers F ON f.friend_id = ud.ud_userid
            WHERE ul.id != '$user_id' ORDER BY ul.id ASC";
            print_r($query);
            $result = oci_parse($this->conn, $query);
           
            if(oci_execute($result)){

                while($row = oci_fetch_assoc($result)){
                    $json_array[] = $row;
                }

                $return_data = $json_array;

            }else{

                $return_data = 0;
            }
        return  (empty($return_data)) ? $this->sendError("Not Found!",401) : $this->sendResponse($return_data,"success");
    }

    public function show($id)
    {
        # code...
    }

    public function store($request)
    {
        # code...
        // Current Session User Id
        $user_id = $this->user['ID'];

        $query = "INSERT INTO cod_followers (friend_id,user_id) values ('".$request['colleague_id']."','$user_id')";
        $run = oci_parse($this->conn, $query);

        if(oci_execute($run)){
            $return_data = 1;
        }

        oci_free_statement($run);
        oci_close($this->conn);

        return (empty($return_data)) ? $this->sendError("Data Not Inserted !",500) : $this->sendResponse($return_data,"Follower Add Succesfully");
    }

    public function update($request = [] , $id)
    {
        # code...
    }

    public function delete($id)
    {
        # code...
        // Current Session User Id
        $user_id = $this->user['ID'];

        $query = "DELETE FROM cod_followers WHERE friend_id = '$id' AND user_id = '$user_id'";

        $run = oci_parse($this->conn, $query);

        if(oci_execute($run)){
            $return_data = 1;
        }

        oci_free_statement($run);
        oci_close($this->conn);

        return (empty($return_data)) ? $this->sendError("Data Not Inserted !",500) : $this->sendResponse($return_data,"UnFollow Succesfully");
    }
}
