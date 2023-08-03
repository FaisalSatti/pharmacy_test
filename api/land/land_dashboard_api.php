<?php
session_start();
include("../auth/db.php");
header("Content-Type: application/json");
$json_array = array();
$company_id = $_SESSION['company_id'];
$project_id = $_SESSION['project']['PROJECT_ID'];
$user_id = $_SESSION['data']['ID'];



if(isset($_POST['action']) && $_POST['action'] == 'showstats1'){
   
      
        $query  = "SELECT COUNT(DISTINCT AG_ID) AS COUNTS FROM INVESTEMENT_CONTRACT_MASTER 
                UNION 
                SELECT  COUNT(DISTINCT AG_ID) AS DEALER_COUNT FROM INVESTEMENT_CONTRACT_MASTER  WHERE DEAL_TYPE='D'
                UNION 
                SELECT  COUNT(DISTINCT AG_ID) AS LAND_PROVIDER_COUNT FROM INVESTEMENT_CONTRACT_MASTER  WHERE DEAL_TYPE='L'";
        
        $run = oci_parse($c, $query);
        oci_execute($run);
        $return_data=[];
        while ($row = oci_fetch_assoc($run)){
            $return_data[] = $row;
        }
        oci_free_statement($run);
        oci_close($c);

   
}elseif(isset($_POST['action']) && $_POST['action'] == 'view'){
    $query = "SELECT A.AG_ID,B.CUS_NAME,B.CNIC_NO,B.PERM_ADD,B.ACTION_TYPE,B.ACTION_ON,B.ACTION_BY,C.NAMENAME,MIN_SALE_ID,MAX_SALE_ID,(MAX_SALE_ID-MIN_SALE_ID)+1 AS TOTAL
    FROM INVESTEMENT_CONTRACT_MASTER A 
    INNER JOIN COD_CUSTOMER_MASTER B ON B.CUS_ID = A.AG_ID
    LEFT JOIN COD_USER_LOGIN C ON C.ID = B.ACTION_BY";
  //   print_r($query);
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }
  
    oci_free_statement($run);
    oci_close($c);
  
}elseif(isset($_POST['action']) && $_POST['action'] == 'showstats2'){
   
      
    $query  = "SELECT COUNT(*) AS COUNTS,4 as rowOrder FROM INVESTEMENT_CONTRACT_DTL_TYPE 
            UNION ALL 
            SELECT SUM(QUANTITY),5 as rowOrder FROM INVESTEMENT_CONTRACT_DTL_TYPE
            UNION ALL 
            SELECT SUM(QUANTITY) AS DEALER_COUNT
            ,1 as rowOrder FROM INVESTEMENT_CONTRACT_DTL_TYPE
            WHERE ASSET_TYPE_ID='6'
            UNION ALL
            SELECT SUM(QUANTITY) AS DEALER_COUNT,2 as rowOrder FROM INVESTEMENT_CONTRACT_DTL_TYPE WHERE ASSET_TYPE_ID='7'
            UNION ALL
            SELECT SUM(QUANTITY) AS DEALER_COUNT,3 as rowOrder FROM INVESTEMENT_CONTRACT_DTL_TYPE WHERE ASSET_TYPE_ID='8'
            order by rowOrder desc";
    
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }
    oci_free_statement($run);
    oci_close($c);


}elseif(isset($_POST['action']) && $_POST['action'] == 'showstats2'){
    $query  = "SELECT
    cod_inv_status.STATUS_ID AS ID,
    cod_inv_status.STATUS AS NAMED,
    COUNT(INV_MATERIAL_MASTER.status) AS Total
    FROM
        cod_inv_status
    LEFT JOIN INV_MATERIAL_MASTER ON cod_inv_status.STATUS_ID = INV_MATERIAL_MASTER.status
    WHERE   
    cod_inv_status.ACTIVE='Y'
        AND INV_MATERIAL_MASTER.PROJECT_ID ='$project_id' 
        AND INV_MATERIAL_MASTER.COMPANY_ID='$company_id'
        AND INV_MATERIAL_MASTER.DELETE_FLG='0'
    GROUP BY cod_inv_status.STATUS_ID,cod_inv_status.STATUS ORDER BY cod_inv_status.STATUS_ID ASC";
 
    //  print_r($query);
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }

    oci_free_statement($run);
    oci_close($c);


}elseif(isset($_POST['action']) && $_POST['action'] == 'showstats3_transfered'){
    $query  = "SELECT COUNT(A.CONTRACT_ID) AS TOTAL,'500 SQ-YD' AS NAME
    FROM B_UNIT_BOOKING_MASTER A,INVESTEMENT_CONTRACT_MASTER  B,INV_MATERIAL_MASTER C,b_unit_types d
    WHERE A.PROJECT_ID = 4
    AND A.CONTRACT_ID = B.CONTRACT_ID
    AND A.ASSET_CODE = C.MATERIAL_CODE
    AND A.ALLOTTE = B.AG_ID
    and c.asset_type_id = d.type_id
    AND d.type_desc='500-P'
            UNION ALL
            SELECT COUNT(A.CONTRACT_ID) AS TOTAL,'250 SQ-YD' AS NAME
FROM B_UNIT_BOOKING_MASTER A,INVESTEMENT_CONTRACT_MASTER  B,INV_MATERIAL_MASTER C,b_unit_types d
WHERE A.PROJECT_ID = 4
AND A.CONTRACT_ID = B.CONTRACT_ID
AND A.ASSET_CODE = C.MATERIAL_CODE
AND A.ALLOTTE = B.AG_ID
and c.asset_type_id = d.type_id
AND d.type_desc='250-P'
            UNION ALL
            SELECT COUNT(A.CONTRACT_ID) AS TOTAL,'125 SQ-YD' AS NAME
FROM B_UNIT_BOOKING_MASTER A,INVESTEMENT_CONTRACT_MASTER  B,INV_MATERIAL_MASTER C,b_unit_types d
WHERE A.PROJECT_ID = 4
AND A.CONTRACT_ID = B.CONTRACT_ID
AND A.ASSET_CODE = C.MATERIAL_CODE
AND A.ALLOTTE = B.AG_ID
and c.asset_type_id = d.type_id
AND d.type_desc='125-P'
            UNION ALL
            SELECT COUNT(A.CONTRACT_ID) AS TOTAL,'80 SQ-YD' AS NAME
FROM B_UNIT_BOOKING_MASTER A,INVESTEMENT_CONTRACT_MASTER  B,INV_MATERIAL_MASTER C,b_unit_types d
WHERE A.PROJECT_ID = 4
AND A.CONTRACT_ID = B.CONTRACT_ID
AND A.ASSET_CODE = C.MATERIAL_CODE
AND A.ALLOTTE = B.AG_ID
and c.asset_type_id = d.type_id
AND d.type_desc='80-P'";
 
    //  print_r($query);
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }

    oci_free_statement($run);
    oci_close($c);


}elseif(isset($_POST['action']) && $_POST['action'] == 'showstats4_pending'){
    $query  = "SELECT COUNT(A.CONTRACT_ID) AS TOTAL,'500 SQ-YD' AS NAME
            from  INVESTEMENT_CONTRACT_MASTER A,INVESTEMENT_CONTRACT_DTL_TYPE B,INV_MATERIAL_MASTER C,B_UNIT_TYPES D
            WHERE NVL(A.POSTED,'N')='Y'
            ---and a.deal_seq_no in (2,3)
            AND A.CONTRACT_ID = B.CONTRACT_ID
            AND c.asset_type_id = d.type_id
            AND D.type_desc='500-P'
    UNION ALL
    SELECT COUNT(A.CONTRACT_ID) AS TOTAL,'250 SQ-YD' AS NAME
            from  INVESTEMENT_CONTRACT_MASTER A,INVESTEMENT_CONTRACT_DTL_TYPE B,INV_MATERIAL_MASTER C,B_UNIT_TYPES D
            WHERE NVL(A.POSTED,'N')='Y'
            ---and a.deal_seq_no in (2,3)
            AND A.CONTRACT_ID = B.CONTRACT_ID
            AND c.asset_type_id = d.type_id
            AND D.type_desc='250-P'
    UNION ALL
    SELECT COUNT(A.CONTRACT_ID) AS TOTAL,'125 SQ-YD' AS NAME
            from  INVESTEMENT_CONTRACT_MASTER A,INVESTEMENT_CONTRACT_DTL_TYPE B,INV_MATERIAL_MASTER C,B_UNIT_TYPES D
            WHERE NVL(A.POSTED,'N')='Y'
            ---and a.deal_seq_no in (2,3)
            AND A.CONTRACT_ID = B.CONTRACT_ID
            AND c.asset_type_id = d.type_id
    AND D.type_desc='125-P'
    UNION ALL
    SELECT COUNT(A.CONTRACT_ID) AS TOTAL,'80 SQ-YD' AS NAME
            from  INVESTEMENT_CONTRACT_MASTER A,INVESTEMENT_CONTRACT_DTL_TYPE B,INV_MATERIAL_MASTER C,B_UNIT_TYPES D
            WHERE NVL(A.POSTED,'N')='Y'
            ---and a.deal_seq_no in (2,3)
            AND A.CONTRACT_ID = B.CONTRACT_ID
            AND c.asset_type_id = d.type_id
    AND D.type_desc='80-P'";
 
    //  print_r($query);
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }

    oci_free_statement($run);
    oci_close($c);


}elseif(isset($_POST['action']) && $_POST['action'] == 'getcatogorystats'){
   
      
    $query  = "SELECT
    B_UNIT_TYPES.TYPE_ID AS ID,
    B_UNIT_TYPES.TYPE_DESC AS NAMED,
    COUNT(INV_MATERIAL_MASTER.Asset_type_id) AS Total
    FROM
    B_UNIT_TYPES
    LEFT JOIN INV_MATERIAL_MASTER ON B_UNIT_TYPES.TYPE_ID = INV_MATERIAL_MASTER.Asset_type_id
    WHERE B_UNIT_TYPES.ACTIVE='Y'  
        AND INV_MATERIAL_MASTER.PROJECT_ID ='$project_id' 
        AND INV_MATERIAL_MASTER.COMPANY_ID='$company_id'
        AND INV_MATERIAL_MASTER.DELETE_FLG='0'
    GROUP BY B_UNIT_TYPES.TYPE_ID,B_UNIT_TYPES.TYPE_DESC ORDER BY B_UNIT_TYPES.TYPE_ID ASC";
 

    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }

    oci_free_statement($run);
    oci_close($c);


}elseif(isset($_POST['action']) && $_POST['action'] == 'gettypestats'){
    
       
    $query  = "SELECT
    cod_inv_asset_type.TYPE_ID AS ID,
    cod_inv_asset_type.DESCRIPTION AS NAMED,
    COUNT(INV_MATERIAL_MASTER.Asset_Nature) AS Total
    FROM
    cod_inv_asset_type
    LEFT JOIN INV_MATERIAL_MASTER ON cod_inv_asset_type.TYPE_ID = INV_MATERIAL_MASTER.Asset_Nature
    WHERE cod_inv_asset_type.ACTIVE='Y' 
    AND cod_inv_asset_type.PROJECT_ID ='$project_id' 
    AND cod_inv_asset_type.COMPANY_ID='$company_id'
    GROUP BY cod_inv_asset_type.TYPE_ID,cod_inv_asset_type.DESCRIPTION ORDER BY cod_inv_asset_type.TYPE_ID ASC";
 


    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }

    oci_free_statement($run);
    oci_close($c);

   


}elseif(isset($_POST['action']) && $_POST['action'] == 'getcatogorystatsdril'){
    if(isset($_POST['id']) && !(empty($_POST['id']))){
        $id = $_POST['id'];
       
    $query  = "SELECT
    B_UNIT_TYPES.TYPE_ID AS ID,
    B_UNIT_TYPES.TYPE_DESC AS NAMED,
    COUNT(INV_MATERIAL_MASTER.Asset_type_id) AS Total
    FROM
    B_UNIT_TYPES
    LEFT JOIN INV_MATERIAL_MASTER ON B_UNIT_TYPES.TYPE_ID = INV_MATERIAL_MASTER.Asset_type_id
    WHERE B_UNIT_TYPES.ACTIVE='Y' 
    AND INV_MATERIAL_MASTER.status ='$id'
    AND B_UNIT_TYPES.PROJECT_ID ='$project_id' 
    AND B_UNIT_TYPES.COMPANY_ID='$company_id'
    GROUP BY B_UNIT_TYPES.TYPE_ID,B_UNIT_TYPES.TYPE_DESC ORDER BY B_UNIT_TYPES.TYPE_ID ASC";
 


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
          "message" => "id Required"
        );
    }


}elseif(isset($_POST['action']) && $_POST['action'] == 'gettypestatsdril'){
    if(isset($_POST['id']) && !(empty($_POST['id']))){
        $id = $_POST['id'];
       
    $query  = "SELECT
    cod_inv_asset_type.TYPE_ID AS ID,
    cod_inv_asset_type.DESCRIPTION AS NAMED,
    COUNT(INV_MATERIAL_MASTER.Asset_Nature) AS Total
    FROM
    cod_inv_asset_type
    LEFT JOIN INV_MATERIAL_MASTER ON cod_inv_asset_type.TYPE_ID = INV_MATERIAL_MASTER.Asset_Nature
    WHERE cod_inv_asset_type.ACTIVE='Y' 
    AND INV_MATERIAL_MASTER.Asset_type_id ='$id'
    AND cod_inv_asset_type.PROJECT_ID ='$project_id' 
    AND cod_inv_asset_type.COMPANY_ID='$company_id'
    GROUP BY cod_inv_asset_type.TYPE_ID,cod_inv_asset_type.DESCRIPTION ORDER BY cod_inv_asset_type.TYPE_ID ASC";
 


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
          "message" => "id Required"
        );
    }


}elseif(isset($_POST['action']) && $_POST['action'] == 'drilstatusgraph'){
    if(isset($_POST['id']) && !(empty($_POST['id']))){
        $id = $_POST['id'];
        $query  = "SELECT
    cod_inv_status.STATUS_ID AS ID,
    cod_inv_status.STATUS AS NAMED,
    COUNT(INV_MATERIAL_MASTER.status) AS Total
    FROM
        cod_inv_status
    LEFT JOIN INV_MATERIAL_MASTER ON cod_inv_status.STATUS_ID = INV_MATERIAL_MASTER.status 
    WHERE INV_MATERIAL_MASTER.diversion = '$id'
        AND cod_inv_status.ACTIVE='Y'
        AND INV_MATERIAL_MASTER.PROJECT_ID ='$project_id' 
        AND INV_MATERIAL_MASTER.COMPANY_ID='$company_id'
        AND INV_MATERIAL_MASTER.DELETE_FLG='0'
    GROUP BY cod_inv_status.STATUS_ID,cod_inv_status.STATUS ORDER BY cod_inv_status.STATUS_ID ASC";
 print_r($query);

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
          "message" => "id Required"
        );
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'getdivisionname'){
    if(isset($_POST['id']) && !(empty($_POST['id']))){
        $id = $_POST['id'];
        $query  = "SELECT
        description
        FROM
        cod_inv_divisions
        WHERE ID = '$id'";
 

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
          "message" => "id Required"
        );
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'getstatusnname'){
    if(isset($_POST['id']) && !(empty($_POST['id']))){
        $id = $_POST['id'];
        $query  = "SELECT
        STATUS
        FROM
        cod_inv_status
        WHERE STATUS_ID = '$id'";
 

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
          "message" => "id Required"
        );
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'getcategorynname'){
    if(isset($_POST['id']) && !(empty($_POST['id']))){
        $id = $_POST['id'];
        $query  = "SELECT
        TYPE_DESC
        FROM
        B_UNIT_TYPES
        WHERE TYPE_ID = '$id'";
 

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
          "message" => "id Required"
        );
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'view'){
    $query = "  SELECT
    inv.MATERIAL_CODE AS Assetcode,
    inv.short_name AS AssetName,
    area.Description AS AreaName,
    block.description AS AssetBlock,
    street.STREET_DESCRIPTION AS AssetStreet,
    unitype.description AS Assetcategory,
    unitnature.description AS AssetNature,
    unitfloor.description AS AssetFloor,
    unitareatype.description AS AssetAreaType,
    inv.land_area AS AssetArea,
    inv.dimension AS Dimension,
    unitfeatures.description AS AssetFeatures,
    unitstaus.status AS AssetStatus,
    div.description AS Assetdivision
    
    
  FROM
    cod_inv_divisions div,
    INV_MATERIAL_MASTER inv,
    cod_inv_asset_area area,
    B_UNIT_BLOCKS block,
    STREET_SETUP street,
    B_UNIT_TYPES unitype,
    cod_inv_asset_type unitnature,
    cod_inv_loc_type unitfloor,
    cod_inv_land_area_type unitareatype,
    b_unit_category_master unitfeatures,
    cod_inv_status unitstaus
    
    
  WHERE 
 
        inv.PROJECT_ID ='$project_id' 
    AND 
        inv.COMPANY_ID='$company_id'
    AND 
        inv.DELETE_FLG='0'
    AND 
        inv.diversion=div.id 
    AND
        inv.AREA_ID=area.AREA_ID
    AND 
        inv.block_id=block.block_id
    AND 
        inv.street_id=street.street_id
    AND 
        inv.asset_type_id=unitype.TYPE_ID
    AND 
        inv.asset_nature=unitnature.TYPE_ID
    AND 
        inv.location_id=unitfloor.loc_type_id
    AND 
        inv.land_area_type_id=unitareatype.type_id
    AND 
        inv.cat_id=unitfeatures.cat_id
    AND 
        inv.status=unitstaus.status_id 
    ";
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }

    oci_free_statement($run);
    oci_close($c);

}elseif(isset($_POST['action']) && $_POST['action'] == 'inv_dashboard_view'){
    
    $query = "SELECT * FROM (SELECT
            inv.MATERIAL_CODE AS Assetcode,
            inv.short_name AS AssetName,
            area.Description AS AreaName,
            unitype.description AS Assetcategory,
            unitareatype.description AS AssetAreaType,
            unitfeatures.description AS AssetFeatures,
            unitstaus.status AS AssetStatus,
            div.description AS Assetdivision,
            login.NAMENAME AS Created_By,
            inv.ACTION_ON AS Created_On,
            inv.ACTION_TYPE AS Created_Type
        FROM
            cod_inv_divisions div,
            INV_MATERIAL_MASTER inv,
            cod_inv_asset_area area,
            B_UNIT_BLOCKS block,
            STREET_SETUP street,
            B_UNIT_TYPES unitype,
            cod_inv_asset_type unitnature,
            cod_inv_loc_type unitfloor,
            cod_inv_land_area_type unitareatype,
            b_unit_category_master unitfeatures,
            cod_inv_status unitstaus,
            cod_user_login login
            
            
        WHERE 
            inv.PROJECT_ID ='4' 
        AND 
            inv.COMPANY_ID='2'
        AND 
            inv.DELETE_FLG='0'
        AND 
            inv.diversion=div.id 
        AND
            inv.AREA_ID=area.AREA_ID
        AND 
            inv.block_id=block.block_id
        AND 
            inv.street_id=street.street_id
        AND 
            inv.asset_type_id=unitype.TYPE_ID
        AND 
            inv.asset_nature=unitnature.TYPE_ID
        AND 
            inv.location_id=unitfloor.loc_type_id
        AND 
            inv.land_area_type_id=unitareatype.type_id
        AND 
            inv.cat_id=unitfeatures.cat_id
        AND 
            inv.status=unitstaus.status_id
        AND 
            inv.ACTION_BY=login.ID 

        ORDER BY inv.ACTION_ON DESC
        )
        WHERE ROWNUM <= 15
    ";
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }

    oci_free_statement($run);
    oci_close($c);

}elseif(isset($_POST['action']) && $_POST['action'] == 'viewstatusdivdril'){
     if(isset($_POST['id']) && !(empty($_POST['id']))){
        $id = $_POST['id'];
        $query = "  SELECT
        inv.MATERIAL_CODE AS Assetcode,
        inv.short_name AS AssetName,
        area.Description AS AreaName,
        block.description AS AssetBlock,
        street.STREET_DESCRIPTION AS AssetStreet,
        unitype.description AS Assetcategory,
        unitnature.description AS AssetNature,
        unitfloor.description AS AssetFloor,
        unitareatype.description AS AssetAreaType,
        inv.land_area AS AssetArea,
        inv.dimension AS Dimension,
        unitfeatures.description AS AssetFeatures,
        unitstaus.status AS AssetStatus,
        div.description AS Assetdivision
        
        
      FROM
        cod_inv_divisions div,
        INV_MATERIAL_MASTER inv,
        cod_inv_asset_area area,
        B_UNIT_BLOCKS block,
        STREET_SETUP street,
        B_UNIT_TYPES unitype,
        cod_inv_asset_type unitnature,
        cod_inv_loc_type unitfloor,
        cod_inv_land_area_type unitareatype,
        b_unit_category_master unitfeatures,
        cod_inv_status unitstaus
        
        
      WHERE 
            inv.PROJECT_ID ='$project_id' 
        AND 
            inv.COMPANY_ID='$company_id'
        AND 
            inv.diversion='$id'
        AND 
            inv.DELETE_FLG='0'
        AND 
            inv.diversion=div.id 
        AND
            inv.AREA_ID=area.AREA_ID
        AND 
            inv.block_id=block.block_id
        AND 
            inv.street_id=street.street_id
        AND 
            inv.asset_type_id=unitype.TYPE_ID
        AND 
            inv.asset_nature=unitnature.TYPE_ID
        AND 
            inv.location_id=unitfloor.loc_type_id
        AND 
            inv.land_area_type_id=unitareatype.type_id
        AND 
            inv.cat_id=unitfeatures.cat_id
        AND 
            inv.status=unitstaus.status_id 
        ";
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
          "message" => "id Required"
        );
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'viewstatusgategory'){
    if(isset($_POST['id']) && !(empty($_POST['id']))){
       $id = $_POST['id'];
       $query = "  SELECT
       inv.MATERIAL_CODE AS Assetcode,
       inv.short_name AS AssetName,
       area.Description AS AreaName,
       block.description AS AssetBlock,
       street.STREET_DESCRIPTION AS AssetStreet,
       unitype.description AS Assetcategory,
       unitnature.description AS AssetNature,
       unitfloor.description AS AssetFloor,
       unitareatype.description AS AssetAreaType,
       inv.land_area AS AssetArea,
       inv.dimension AS Dimension,
       unitfeatures.description AS AssetFeatures,
       unitstaus.status AS AssetStatus,
       div.description AS Assetdivision
       
       
     FROM
       cod_inv_divisions div,
       INV_MATERIAL_MASTER inv,
       cod_inv_asset_area area,
       B_UNIT_BLOCKS block,
       STREET_SETUP street,
       B_UNIT_TYPES unitype,
       cod_inv_asset_type unitnature,
       cod_inv_loc_type unitfloor,
       cod_inv_land_area_type unitareatype,
       b_unit_category_master unitfeatures,
       cod_inv_status unitstaus
       
       
     WHERE  
            inv.PROJECT_ID ='$project_id' 
        AND 
            inv.COMPANY_ID='$company_id'
        AND 
            inv.status='$id'
        AND 
            inv.DELETE_FLG='0'
        AND  
            inv.diversion=div.id 
        AND
           inv.AREA_ID=area.AREA_ID
       AND 
           inv.block_id=block.block_id
       AND 
           inv.street_id=street.street_id
       AND 
           inv.asset_type_id=unitype.TYPE_ID
       AND 
           inv.asset_nature=unitnature.TYPE_ID
       AND 
           inv.location_id=unitfloor.loc_type_id
       AND 
           inv.land_area_type_id=unitareatype.type_id
       AND 
           inv.cat_id=unitfeatures.cat_id
       AND 
           inv.status=unitstaus.status_id";
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
         "message" => "id Required"
       );
   }
}
elseif(isset($_POST['action']) && $_POST['action'] == 'viewcategorytype'){
    if(isset($_POST['id']) && !(empty($_POST['id']))){
       $id = $_POST['id'];
       $query = "  SELECT
       inv.MATERIAL_CODE AS Assetcode,
       inv.short_name AS AssetName,
       area.Description AS AreaName,
       block.description AS AssetBlock,
       street.STREET_DESCRIPTION AS AssetStreet,
       unitype.description AS Assetcategory,
       unitnature.description AS AssetNature,
       unitfloor.description AS AssetFloor,
       unitareatype.description AS AssetAreaType,
       inv.land_area AS AssetArea,
       inv.dimension AS Dimension,
       unitfeatures.description AS AssetFeatures,
       unitstaus.status AS AssetStatus,
       div.description AS Assetdivision
       
       
     FROM
       cod_inv_divisions div,
       INV_MATERIAL_MASTER inv,
       cod_inv_asset_area area,
       B_UNIT_BLOCKS block,
       STREET_SETUP street,
       B_UNIT_TYPES unitype,
       cod_inv_asset_type unitnature,
       cod_inv_loc_type unitfloor,
       cod_inv_land_area_type unitareatype,
       b_unit_category_master unitfeatures,
       cod_inv_status unitstaus
       
       
     WHERE  
            inv.PROJECT_ID ='$project_id' 
        AND 
            inv.COMPANY_ID='$company_id'
        AND 
            inv.asset_type_id='$id'
        AND 
            inv.DELETE_FLG='0'
        AND  
            inv.diversion=div.id 
        AND
           inv.AREA_ID=area.AREA_ID
       AND 
           inv.block_id=block.block_id
       AND 
           inv.street_id=street.street_id
       AND 
           inv.asset_type_id=unitype.TYPE_ID
       AND 
           inv.asset_nature=unitnature.TYPE_ID
       AND 
           inv.location_id=unitfloor.loc_type_id
       AND 
           inv.land_area_type_id=unitareatype.type_id
       AND 
           inv.cat_id=unitfeatures.cat_id
       AND 
           inv.status=unitstaus.status_id";
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
         "message" => "id Required"
       );
   }
}elseif(isset($_POST['action']) && $_POST['action'] == 'multifilter'){
    

        $location_id = $_POST['location_id'];
        $block_id = $_POST['block_id'];
        $street_id = $_POST['street_id'];
        $type_id = $_POST['type_id'];
        
        $cat_id = $_POST['cat_id'];
        $feat_id = $_POST['feat_id'];
        $floor_id = $_POST['floor_id'];
        $sizetype_id = $_POST['sizetype_id'];

        $size = $_POST['size'];
        $Dimension = $_POST['Dimension'];
        $unit_status = $_POST['unit_status'];
        $unit_division = $_POST['unit_division'];

        $Postfix = $_POST['Postfix'];
    
       
        //end
        $query = "SELECT * FROM VIEW_GETALL_INV WHERE ASSETNAME = NVL('$Postfix',ASSETNAME)
        AND AREANAME = NVL('$location_id',AREANAME)
        AND ASSETBLOCK = NVL('$block_id',ASSETBLOCK)
        AND ASSETCATEGORY = NVL('$cat_id',ASSETCATEGORY)
        AND ASSETNATURE = NVL('$type_id',ASSETNATURE)
        AND ASSETFLOOR = NVL('$floor_id',ASSETFLOOR)
        AND ASSETAREATYPE = NVL('$sizetype_id',ASSETAREATYPE)
        AND ASSETAREA = NVL('$size',ASSETAREA)
        AND DIMENSION = NVL('$Dimension',DIMENSION)
        AND ASSETFEATURES = NVL('$feat_id',ASSETFEATURES)
        AND ASSETSTATUS = NVL('$unit_status',ASSETSTATUS)
        AND ASSETDIVISION = NVL('$unit_division',ASSETDIVISION)";
        
    $run = oci_parse($c, $query);
    
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
       $return_data[] = $row;
        
      
    }
 
    
    oci_free_statement($run);
    oci_close($c);

   
}
print(json_encode($return_data, JSON_PRETTY_PRINT));

?>