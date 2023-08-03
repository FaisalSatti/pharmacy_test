<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include("../../auth/db.php");
$company_id = $_SESSION['company_id'];
$project_id = $_SESSION['project']['PROJECT_ID'];
$user = $_SESSION['data'];

require_once './DepartmentsColleaguesController.php';
require_once '../../Sales/BaseController.php';

switch (isset($_POST['action'])) {
    case ($_POST['action'] == 'index'):
        # code...
            $departmentColleagues = new DepartmentsColleaguesController($c, $company_id, $project_id, $user);
            $result = $departmentColleagues->index();
            print_r($result);
        break;
    
    case ($_POST['action'] == 'store'):
        # code...
            $departmentColleagues = new DepartmentsColleaguesController($c, $company_id, $project_id, $user);
            $result = $departmentColleagues->store($_POST);
            print_r($result);
        break;
    
    case ($_POST['action'] == 'delete'):
        # code...
            $departmentColleagues = new DepartmentsColleaguesController($c, $company_id, $project_id, $user);
            $result = $departmentColleagues->delete($_POST['colleague_id']);
            print_r($result);
        break;

    default:
        # code...
        $response = new BaseController();
        $result = $response->sendError("Action Not Matched!");
        print_r($result);
        break;
}

