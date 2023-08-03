<?php
session_start();
include("../auth/db.php");
header("Content-Type: application/json");
$company_id = $_SESSION['company_id'];
$project_id = $_SESSION['project']['PROJECT_ID'];
$user_id = $_SESSION['data']['ID'];
date_default_timezone_set("Asia/Karachi");
$current_date = date('j:M:y');
$bg_clr=['bg-info','bg-warning','bg-danger','bg-success','bg-secondary','bg-primary','bg-purple','bg-olive','bg-teal','bg-fuchsia','bg-maroon','bg-primary'];
$fa_icons=['fa fa-user-tie','fa fa-building','fa fa-users','fa fa-user','fa fa-user','fa fa-folder-open','fa fa-university','far fa-object-ungroup','far fa-road','far fa-home','far fa-home','far fa-user'];

if(isset($_POST['action']) && $_POST['action'] == 'stats'){
    $query="SELECT COUNT(*) STATS_COUNT,'EMPLOYEES' AS STATS_NAME FROM COD_EMPLOYEES WHERE DEL_FLG = '0' AND PROJECT_ID = '$project_id' AND COMPANY_ID = '$company_id'
            UNION ALL
            SELECT COUNT(*) STATS_COUNT,'DEPARTMENTS' AS STATS_NAME FROM COD_DEPARTMENTS WHERE DEL_FLG = '0' AND PROJECT_ID = '$project_id' AND COMPANY_ID = '$company_id'
            UNION ALL
            SELECT COUNT(*) STATS_COUNT,'CUSTOMERS' AS STATS_NAME FROM COD_CUSTOMER_MASTER WHERE DEL_FLG = '0' AND PROJECT_ID = '$project_id' AND COMPANY_ID = '$company_id'
            UNION ALL
            SELECT COUNT(DISTINCT A.AG_ID),'LAND PROVIDER'
            AS STATS_NAME FROM INVESTEMENT_CONTRACT_MASTER A 
            INNER JOIN COD_CUSTOMER_MASTER B ON B.CUS_ID = A.AG_ID
            WHERE DEAL_TYPE='L'
            UNION ALL
            SELECT COUNT(*) STATS_COUNT,'DEALER'
            AS STATS_NAME FROM INVESTEMENT_CONTRACT_MASTER A 
            INNER JOIN COD_CUSTOMER_MASTER B ON B.CUS_ID = A.AG_ID
            WHERE DEAL_TYPE='D'
            UNION ALL
            SELECT COUNT(*) STATS_COUNT,'OPEN FILES' AS STATS_NAME FROM COD_FORM_REG WHERE REG_TYPE = 'OR'
            UNION ALL
            SELECT COUNT(*) STATS_COUNT,'BANKS' AS STATS_NAME FROM BANKS_SETUP WHERE PROJECT_ID = '$project_id' AND COMPANY_ID = '$company_id'
            UNION ALL
            SELECT COUNT(*) STATS_COUNT,'BLOCKS' AS STATS_NAME FROM B_UNIT_BLOCKS WHERE DELETE_FLG = '0' AND COMPANY_ID = '$company_id' AND PROJECT_ID = '$project_id'
            UNION ALL
            SELECT COUNT(*) STATS_COUNT,'STREETS' AS STATS_NAME FROM STREET_SETUP WHERE DELETE_FLG = '0' AND COMPANY_ID = '$company_id' AND PROJECT_ID = '$project_id'
            UNION ALL
            SELECT COUNT(*) STATS_COUNT,'ALL PLOTS' AS STATS_NAME FROM INV_MATERIAL_MASTER A
            INNER JOIN B_UNIT_TYPES B ON A.ASSET_TYPE_ID = B.TYPE_ID
            WHERE A.DELETE_FLG = '0' AND B.PROJECT_ID = '$project_id' AND B.COMPANY_ID = '$company_id' AND A.BLOCK_ID != '1'
            UNION ALL
            SELECT COUNT(*) STATS_COUNT,'SOLD PLOTS' AS STATS_NAME FROM INV_MATERIAL_MASTER A
            INNER JOIN B_UNIT_TYPES B ON A.ASSET_TYPE_ID = B.TYPE_ID
            INNER JOIN B_UNIT_BOOKING_MASTER C ON A.MATERIAL_CODE = C.ASSET_CODE
            WHERE A.DELETE_FLG = '0' AND B.PROJECT_ID = '$project_id' AND B.COMPANY_ID = '$company_id' AND A.BLOCK_ID != '1'
            UNION ALL SELECT COUNT(AG_ID) STATS_COUNT,'VENDORS' AS STATS_NAME FROM SET_SUPPLIER_MASTER WHERE DELETE_FLG = '0'";
    $run = oci_parse($c, $query);
    oci_execute($run);
    $cards='';
    $i = '0';
    // $bg_clr = '';
    while ($row = oci_fetch_assoc($run)){
      $bg_colour = $bg_clr[$i];
      $fa_icon = $fa_icons[$i];
      $cards .= '<div class="col-lg-4 col-md-6 col-sm-12">
        <div class="small-box '.$bg_colour.'">
          <div class="inner">
            <h3>'.$row["STATS_COUNT"].'</h3>
            <p>'.$row["STATS_NAME"].'</p>
            </div>
            <div class="icon">
            <i class="'.$fa_icon.'"></i>
            </div>
            </div>
            </div>';
      $i++;
    }
    $return_data[] = $cards;
}elseif(isset($_POST['action']) && $_POST['action'] == 'image_employee'){
  // print_r($_POST);
  $query = "SELECT IMAGE FROM COD_EMPLOYEES WHERE ID = '$user_id'"; 
  $run = oci_parse($c, $query);
  oci_execute($run);
  $row=oci_fetch_assoc($run);
  //print_r($row); die();
  $return_data = $row;  
}else if(isset($_POST['action']) && $_POST['action'] == 'inv_progress'){
    $query1="SELECT COUNT(B.TYPE_DESC) AS PLOT_COUNT,B.TYPE_DESC,'ALL' AS DIFF
            FROM INV_MATERIAL_MASTER A 
            INNER JOIN B_UNIT_TYPES B ON A.ASSET_TYPE_ID = B.TYPE_ID
            WHERE A.DELETE_FLG = '0' 
            AND B.PROJECT_ID = '$project_id'
            AND B.COMPANY_ID = '$company_id'
            AND A.BLOCK_ID != '1'
            GROUP BY B.TYPE_DESC";
            
    $query2="SELECT COUNT(B.TYPE_DESC) AS PLOT_COUNT,B.TYPE_DESC,'SOLD'
            FROM INV_MATERIAL_MASTER A 
            INNER JOIN B_UNIT_TYPES B ON A.ASSET_TYPE_ID = B.TYPE_ID
            INNER JOIN B_UNIT_BOOKING_MASTER C ON A.MATERIAL_CODE = C.ASSET_CODE
            WHERE A.DELETE_FLG = '0' 
            AND B.PROJECT_ID = '$project_id'
            AND B.COMPANY_ID = '$company_id'
            AND A.BLOCK_ID != '1'
            GROUP BY B.TYPE_DESC";
    $run2 = oci_parse($c, $query2);
    oci_execute($run2);
    $data2=[];
    while ($row2 = oci_fetch_array($run2)){
        $data2[] = $row2;
    }
    // PRINT_R($data2);DIE();
    $run1 = oci_parse($c, $query1);
    oci_execute($run1);
    $return_data=[];
    $sold_count = '0';
    $i=0;
    while ($row1 = oci_fetch_assoc($run1)){
        $type_desc = $row1['TYPE_DESC'];
        $sold_count = '0';
        $all_count = $row1['PLOT_COUNT'];
        $per = '0';
        $bg_colour = $bg_clr[$i];

        foreach($data2 as $data22){
            if($data22['TYPE_DESC'] == $row1["TYPE_DESC"]){
                  $type_desc = $data22['TYPE_DESC'];
                  $sold_count = $data22['PLOT_COUNT'];
                  $all_count = $row1['PLOT_COUNT'];
                  $per = ($sold_count/$all_count)*100;
                  continue;
            }
        }
        $return_data[] = '<div class="progress-group">
        '.$type_desc.'
        <span class="float-right"><b>'.$sold_count.'</b>/'.$all_count.'</span>
        <div class="progress progress-sm">
          <div class="progress-bar '.$bg_colour.'" style="width: '.round($per).'%"></div>
        </div>
      </div>';
      $i++;
    }
}else if(isset($_POST['action']) && $_POST['action'] == 'fiscal_stats_card'){
  $query="SELECT CONCAT(CONCAT((FROM_DATE),' TO '),TO_DATE) AS STATS_DATES,'OPEN FISCAL YEAR' AS STATS_NAME FROM COD_FISCAL_YEAR WHERE ACTIVE = 'Y' AND COMPANY_ID = '$company_id' AND PROJECT_ID = '$project_id' AND ROWNUM = '1'
          UNION ALL
          SELECT CONCAT(CONCAT((FROM_DATE),' TO '),TO_DATE) AS STATS_DATES,'OPEN LOCK DATE' AS STATS_NAME FROM COD_DATE_LOCK WHERE ACTIVE = 'Y' AND COMPANY_ID = '$company_id' AND PROJECT_ID = '$project_id'";
  $run = oci_parse($c, $query);
  oci_execute($run);
  $cards1='';
  $i = '0';
  // $bg_clr = '';
  while ($row = oci_fetch_assoc($run)){
    $cards1 .= '<div class="col-lg-6 col-md-6 col-sm-12">
      <div class="small-box bg-danger">
        <div class="inner">
          <h5>'.$row["STATS_DATES"].'</h5>
          <p>'.$row["STATS_NAME"].'</p>
          </div>
          <div class="icon">
          <i class="far fa-calendar"></i>
          </div>
          </div>
          </div>';
    $i++;
  }
  $return_data[] = $cards1;
}else{
    $return_data = array(
      "status" => 0,
      "message" => "Action Not Matched"
    );
}

print(json_encode($return_data, JSON_PRETTY_PRINT));

?>