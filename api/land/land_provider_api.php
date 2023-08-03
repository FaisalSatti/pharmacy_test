<?php
session_start();
include("../auth/db.php");
header("Content-Type: application/json");  
$company_id = $_SESSION['company_id'];
$project_id = $_SESSION['project']['PROJECT_ID'];
$user_id = $_SESSION['data']['ID'];
$current_date = date('j:M:y');

if(isset($_POST['action']) && $_POST['action'] == 'view_contract_details'){
  if(isset($_POST['id']) && !(empty($_POST['id']))){
      $id = $_POST['id'];
      $query = "SELECT A.CONTRACT_ID,A.QUANTITY,B.DESCRIPTION,B.TYPE_DESC
      FROM INVESTEMENT_CONTRACT_DTL_TYPE A
      INNER JOIN B_UNIT_TYPES B ON A.ASSET_TYPE_ID = B.TYPE_ID
      WHERE A.CONTRACT_ID = '$id'";
      
      $run = oci_parse($c, $query);
      oci_execute($run);
      
      $data1 = '';
      while($row=oci_fetch_array($run))
      {
        $qty = $row['QUANTITY']; 
        $desc = $row['DESCRIPTION']; 
        $t_desc = $row['TYPE_DESC']; 
            
        $data1 .= '
        <tr>
            <td style="vertical-align: middle;">'.$qty.'</td>
            <td style="vertical-align: middle;">'.$desc.'</td>
            <td style="vertical-align: middle;">'.$t_desc.'</td>
        </tr>';
      }
 
      $return_data = array(
        "data1" => $data1,
      );

      oci_free_statement($run);
      oci_close($c);

  }else{
      $return_data = array(
        "status" => 0,
        "message" => "All Fields Are Required"
      );
  }

}elseif(isset($_POST['action']) && $_POST['action'] == 'view'){
  $query = "SELECT DISTINCT A.AG_ID,B.CUS_NAME,B.CNIC_NO,B.PERM_ADD,B.ACTION_TYPE,B.ACTION_ON,B.ACTION_BY,C.NAMENAME
  FROM INVESTEMENT_CONTRACT_MASTER A 
  INNER JOIN COD_CUSTOMER_MASTER B ON B.CUS_ID = A.AG_ID
  LEFT JOIN COD_USER_LOGIN C ON C.ID = B.ACTION_BY
  WHERE DEAL_TYPE='L'";
//   print_r($query);
  $run = oci_parse($c, $query);
  oci_execute($run);
  $return_data=[];
  while ($row = oci_fetch_assoc($run)){
      $return_data[] = $row;
  }

  oci_free_statement($run);
  oci_close($c);

}elseif(isset($_POST['action']) && $_POST['action'] == 'view_this'){
    if(isset($_POST['id']) && !(empty($_POST['id']))){
        $id = $_POST['id'];
        $query = "SELECT * FROM COD_CUSTOMER_MASTER WHERE CUS_ID = '$id'";
        // print_r($query); die();
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $row = oci_fetch_assoc($run);
            $return_data = $row;
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Data not found"
            );
        }

        oci_free_statement($run);
        oci_close($c);
    }else{
        $return_data = array(
          "status" => 0,
          "message" => "All Fields Are Required"
        );
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'view_with_ag_id'){
  if(isset($_POST['id']) && !(empty($_POST['id']))){
    $id = $_POST['id'];
    $query = "SELECT * FROM INVESTEMENT_CONTRACT_MASTER WHERE AG_ID = '$id'";
//   print_r($query);
  $run = oci_parse($c, $query);
  oci_execute($run);
  $return_data=[];
  while ($row = oci_fetch_assoc($run)){
      $return_data[] = $row;
  }

  oci_free_statement($run);
  oci_close($c);
}else{
    $return_data = array(
      "status" => 0,
      "message" => "All Fields Are Required"
    );
}

}elseif(isset($_POST['action']) && $_POST['action'] == 'view_tran_files_with_contract_id'){ 
  if(isset($_POST['id']) && !(empty($_POST['id']))){
    $id = $_POST['id'];
    // print_r($_POST['id']); die();
    $query = "SELECT A.CONTRACT_ID,B.DEAL_SEQ_NO DEAL_NO,A.CONTRACT_SEQ_NO DEAL_SEQ_NO,A.REGISTRATION_FORM_NO,allote_desc(B.AG_ID) DEALER_NAME,allote_desc(A.ALLOTTE) NAME,item_desc(A.ASSET_CODE) UNIT,b_unit_types_desc(C.ASSET_TYPE_ID) TYPE,BLOCK_dESC(C.BLOCK_ID) BLOCK,
    STREET_DESC(C.STREET_ID) STREET,
    (SELECT MAX(G.REQ_DATE)a
    FROM B_UNIT_ALLOTEE_TRNS_REQ G
    WHERE G.SALE_ID = A.SALE_ID) TRANSFER_DATE,
    'D-'||b.DEAL_SEQ_NO||' '||b.DEAL_FLAG||'/'||(select sum(h.quantity) from investement_contract_dtl_type h where h.contract_id = b.contract_id
     and h.asset_type_id = c.asset_type_id)||'-'||a.CONTRACT_SEQ_NO||'/'||substr(d.nick_name,1,length(d.nick_name)-2)||'R' intimation_no
    FROM B_UNIT_BOOKING_MASTER A,INVESTEMENT_CONTRACT_MASTER  B,INV_MATERIAL_MASTER C,b_unit_types d
    WHERE A.PROJECT_ID = 4
    AND A.CONTRACT_ID = B.CONTRACT_ID
    AND A.ASSET_CODE = C.MATERIAL_CODE
    AND A.ALLOTTE != B.AG_ID
    AND A.CONTRACT_ID = '$id'
    ---and b.deal_seq_no in (2,3)
    and c.asset_type_id = d.type_id
    ORDER BY B.CONTRACT_ID";
  // print_r($query);
  $run = oci_parse($c, $query);
  oci_execute($run);
  $return_data=[];
  while ($row = oci_fetch_assoc($run)){
      $return_data[] = $row;
  }

  oci_free_statement($run);
  oci_close($c);
}else{
    $return_data = array(
      "status" => 0,
      "message" => "All Fields Are Required"
    );
}

}elseif(isset($_POST['action']) && $_POST['action'] == 'view_non_tran_files_with_contract_id'){ 
  if(isset($_POST['id']) && !(empty($_POST['id']))){
    $id = $_POST['id'];
    // print_r($_POST['id']); die();
    $query = "SELECT A.CONTRACT_ID,B.DEAL_SEQ_NO DEAL_NO,A.CONTRACT_SEQ_NO DEAL_SEQ_NO,A.ALLOTTE,allote_desc(A.ALLOTTE) NAME,item_Desc(A.ASSET_CODE) UNIT,b_unit_types_desc(C.ASSET_TYPE_ID) TYPE,BLOCK_dESC(C.BLOCK_ID) BLOCK,
    STREET_DESC(C.STREET_ID) STREET,
    
    'D-'||b.DEAL_SEQ_NO||' '||b.DEAL_FLAG||'/'||(select sum(h.quantity) from investement_contract_dtl_type h where h.contract_id = b.contract_id
     and h.asset_type_id = c.asset_type_id)||'-'||a.CONTRACT_SEQ_NO||'/'||substr(d.nick_name,1,length(d.nick_name)-2)||'R' intimation_no
    FROM B_UNIT_BOOKING_MASTER A,INVESTEMENT_CONTRACT_MASTER  B,INV_MATERIAL_MASTER C,b_unit_types d
    WHERE A.PROJECT_ID = 4
    AND A.CONTRACT_ID = B.CONTRACT_ID
    AND A.ASSET_CODE = C.MATERIAL_CODE
    AND A.ALLOTTE = B.AG_ID
    AND A.CONTRACT_ID = '$id'
    and c.asset_type_id = d.type_id
    ---and b.deal_seq_no in (2,3)
    ORDER BY B.CONTRACT_ID";
  // print_r($query);
  $run = oci_parse($c, $query);
  oci_execute($run);
  $return_data=[];
  while ($row = oci_fetch_assoc($run)){
      $return_data[] = $row;
  }

  oci_free_statement($run);
  oci_close($c);
}else{
    $return_data = array(
      "status" => 0,
      "message" => "All Fields Are Required"
    );
}

}else{
    $return_data = array(
      "status" => 0,
      "message" => "Action Not Matched"
    );
}
print(json_encode($return_data, JSON_PRETTY_PRINT));

?>