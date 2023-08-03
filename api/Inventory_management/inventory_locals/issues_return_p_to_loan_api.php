<?php
session_start();
header("Content-Type: application/json");
include '../../auth/db.php';
if(isset($_POST['action']) && $_POST['action'] == 'view_old'){
    $query = "SELECT * FROM order_mst ORDER BY doc_date desc,doc_no desc";
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}
elseif(isset($_POST['action']) && $_POST['action'] == 'company_code'){
      $query = "SELECT * FROM company";
      $result = $conn->query($query);
      $return_data=[];
        while($show = mysqli_fetch_assoc($result)){
            $return_data[] = $show;
        }
  }
  elseif(isset($_POST['action']) && $_POST['action'] == 'item_detail_tr'){ 
    $order_key=$_POST['order_key'];
    $doc_date=$_POST['doc_date'];
    $query = "SELECT b.gen_name, c.unit_name,e.div_name,  z.BAL_STOCK, L.loc_name
    from  strtran_dtl d, items a, gen_name b, unit	c,division e, item_batch_no Z, location L
    where b.gen_code=a.gen_code
    and a.DIV_CODE=e.div_code
    and a.um_code=c.unit_code
    and d.item_code=a.item_div and d.CO_CODE = a.CO_CODE
    and d.ITEM_CODE = Z.ITEM_CODE and d.CO_CODE=Z.CO_CODE and d.BATCH_NO=Z.BATCH_NO and d.EXPIRY_DATE=Z.EXPIRY_DATE AND d.LOC_CODE=Z.LOC_CODE
    and L.loc_code=Z.LOC_CODE
    and d.DO_KEY_REF='$order_key'
    and d.doc_date='$doc_date'
    -- group by a.item_code
    ";
    $result = $conn->query($query);
    $show = mysqli_fetch_assoc($result);
    $return_data = $show; 
  }
elseif(isset($_POST['action']) && $_POST['action'] == 'party_code'){
    $company_code=$_POST['company_code'];
    $query = "SELECT a.party_div,a.party_name,b.div_name,c.zone_name,d.city_name FROM party a
    INNER JOIN division b on a.div_code=b.div_code
    INNER JOIN zone c on a.zone_code =c.zone_code 
    INNER JOIN city d on a.city_code=d.city_code WHERE a.co_code='$company_code'";
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
    while($show = mysqli_fetch_assoc($result)){
        $return_data[] = $show;
    }
}
elseif(isset($_POST['action']) && $_POST['action'] == 'division_code'){
  $company_code=$_POST['company_code'];
  $query = "SELECT * from division";
  $result = $conn->query($query);
  $count = mysqli_num_rows($result);
  $return_data=[];
  while($show = mysqli_fetch_assoc($result)){
      $return_data[] = $show;
  }
}
elseif(isset($_POST['action']) && $_POST['action'] == 'party_detail'){
  $party_code=$_POST['party_code'];
  $query = "SELECT a.*,b.div_name,c.city_name,e.zone_name,f.sman_name from party a 
            inner join division b on a.div_code=b.div_code
            inner join city c on a.city_code=c.city_code  
            left join zone e on e.zone_code=a.zone_code
            left join salesman f on f.sman_code=a.salesman_code
            WHERE a.party_div = '$party_code'";
  $select_r = $conn->query($query);
  $show = mysqli_fetch_assoc($select_r);
  $return_data=$show;
}
elseif(isset($_POST['action']) && $_POST['action'] == 'item_code'){
  $company_code=$_POST['company_code'];
  $query = "SELECT
            -- ITEM_NAME,div_name,gen_name,ITEM,CO_CODE,DIV_CODE
            *
            FROM ITEM_DETAIL_UM
            WHERE CO_CODE = '$company_code'
            ORDER BY ITEM_NAME";
  $result = $conn->query($query);
  $count = mysqli_num_rows($result);
  $return_data=[];
  while($show = mysqli_fetch_assoc($result)){
      $return_data[] = $show;
  }
}
elseif(isset($_POST['action']) && $_POST['action'] == 'item_code_edit'){
  $company_code=$_POST['company_code'];
  $query = "SELECT
            -- ITEM_NAME,div_name,gen_name,ITEM,CO_CODE,DIV_CODE
            a.*
            FROM ITEM_DETAIL_UM a inner join strtran_dtl b on a.item=b.item_code and a.co_code=b.co_code
            WHERE a.CO_CODE = '$company_code' and b.doc_type='IRLN'
            ORDER BY a.ITEM_NAME";
  $result = $conn->query($query);
  $count = mysqli_num_rows($result);
  $return_data=[];
  while($show = mysqli_fetch_assoc($result)){
      $return_data[] = $show;
  }
}
elseif(isset($_POST['action']) && $_POST['action'] == 'loc_code'){
  $company_code=$_POST['company_code'];
  $item_code=$_POST['item_code'];
  $query = "SELECT A.*, B.ITEM_NAME, C.loc_name
            FROM item_batch_no A 
            JOIN ITEM_DETAIL_UM B on A.CO_CODE = B.CO_CODE
            JOIN location C on A.loc_code = C.loc_code
            WHERE A.CO_CODE = '$company_code'
            AND A.ITEM_CODE = '$item_code'";
  $result = $conn->query($query);
  $count = mysqli_num_rows($result);
  $return_data=[];
  while($show = mysqli_fetch_assoc($result)){
      $return_data[] = $show;
  }
}
elseif(isset($_POST['action']) && $_POST['action'] == 'location_detail'){
  $company_code=$_POST['company_code'];
  $item_code=$_POST['item_code'];
  $query = "SELECT A.*, B.ITEM_NAME, C.loc_name
            FROM item_batch_no A 
            JOIN ITEM_DETAIL_UM B on A.CO_CODE = B.CO_CODE
            JOIN location C on A.loc_code = C.loc_code
            WHERE A.CO_CODE = '$company_code'
            AND A.ITEM_CODE = '$item_code'
            GROUP BY A.CO_CODE, A.LOC_CODE, A.LOC_CODE";
  $result = $conn->query($query);
  $count = mysqli_num_rows($result);
  $return_data=[];
  while($show = mysqli_fetch_assoc($result)){
      $return_data[] = $show;
  }
}
elseif(isset($_POST['action']) && $_POST['action'] == 'discounts_code'){
  $company_code=$_POST['company_code'];
  $query = "SELECT DESCR,ACCOUNT_CODE
  FROM ACT_CHART
  WHERE CO_CODE = '$company_code'
  AND SUBSTR(ACCOUNT_CODE,8,3) <> '000'
  ORDER BY DESCR;";
  $result = $conn->query($query);
  $count = mysqli_num_rows($result);
  $return_data=[];
  while($show = mysqli_fetch_assoc($result)){
      $return_data[] = $show;
  }
}
elseif(isset($_POST['action']) && $_POST['action'] == 'item_detail'){ 
            $company_code=$_POST['company_code'];
            $item_code=$_POST['item_code'];
            $query = "SELECT
              *
              FROM ITEM_DETAIL_UM
              WHERE CO_CODE = '$company_code'
              ORDER BY ITEM_NAME";
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
    while($show = mysqli_fetch_assoc($result)){
        $return_data[] = $show;
    }
}
elseif(isset($_POST['action']) && $_POST['action'] == 'account_detail'){
  $account_code=$_POST['account_code'];
  $query = "SELECT DEPT_NAME,DEPT_CODE
            FROM DEPT_STORE
            WHERE SUBSTR(DEPT_CODE,1,3) = SUBSTR('$account_code',1,3)
            ORDER BY DEPT_NAME;";
  $result = $conn->query($query);
  $count = mysqli_num_rows($result);
  $return_data=[];
  while($show = mysqli_fetch_assoc($result)){
      $return_data[] = $show;
  }
}
else if(isset($_POST['action']) && $_POST['action'] == 'insert'){
  $doc_no=$_POST['doc_no'];
  $sale_code=$_POST['sale_code'];
  $voucher_date=$_POST['voucher_date'];
  $year=$_POST['year'];
  $company_code=$_POST['company_code'];
  $company_name=$_POST['company_name'];
  $company_ref=$_POST['company_ref'];
  $v_no=$_POST['v_no'];
  $party=$_POST['party'];
  $name_p=$_POST['name_p'];
  $purchase_mode=$_POST['purchase_mode'];
  $party_ref=$_POST['party_ref'];
  $division=$_POST['division'];
  $division_name=$_POST['division_name'];
  $narration=$_POST['narration'];
  $date = date('Y-m-d');
  $select_q="SELECT (case when MAX(DOC_NO) is null then 1 else MAX(DOC_NO)+1 end) DOC_NO 
            FROM strtran_mst  WHERE co_code = '$company_code' AND doc_year = '$year' ";
  $select_r = $conn->query($select_q);
  $show = mysqli_fetch_assoc($select_r);
  $doc_no = $show['DOC_NO'];
  $master_q = "insert into strtran_mst(DOC_NO, DOC_TYPE, DOC_DATE,DOC_YEAR,CO_CODE,REFNUM,PARTY_CODE,PARTY_REF,DIV_CODE,REMARKS,ENTRY_USER,ENTRY_DATE,POST,PO_CATG, DO_KEY)
  value ('$doc_no','IRLN','$voucher_date','$year','$company_code','$company_ref','$party','$party_ref','$division','$narration','Admin','$date','N' ,'L', '$company_code-99-L-$doc_no')";
  $master_r = $conn->query($master_q);
  if($master_r){
      $return_data = array(
          "status" => 1,
          "message" => "GRN has been Inserted having Document No:".$doc_no 
      );
    }else{
      $return_data = array(
      "status" => 0,
      "message" => "GRN has not been Inserted"
      );
  }
  if($master_r){
      $amounts=0;
      for($i=0;$i< count($_POST['acc_desc']); $i++){
          $acc_desc = $_POST['acc_desc'][$i];
          $detail = $_POST['detail'][$i];
          $loc = $_POST['loc_i'][$i];
          $batch_i = $_POST['batch_i'][$i];
          $expirydt_i = $_POST['expirydt_i'][$i];
          $quantity = $_POST['quantity'][$i];
          $rate = $_POST['rate'][$i];
          $amount = $_POST['amount'][$i];
          $quantity=intval(preg_replace('/[^\d.]/', '', $quantity));
          $quantitys = str_replace( ',', '', $quantity );
          if( is_numeric( $quantitys ) ) {
            $quantity = $quantitys;
          }
          $rate=intval(preg_replace('/[^\d.]/', '', $rate));
          $rates = str_replace( ',', '', $rate );
          if( is_numeric( $rates ) ) {
            $rate = $rates;
          }
          $amount = str_replace( ',', '', $amount );
          $detail_q = "insert into strtran_dtl(DOC_NO, DOC_TYPE, DOC_DATE,DOC_YEAR,CO_CODE,DIV_CODE,REMARKS,PO_CATG, DO_KEY_REF,ITEM_CODE, LOC_CODE,BATCH_NO,EXPIRY_DATE,QTY, RATE,AMT )
          value ('$doc_no','IRLN','$voucher_date','$year','$company_code','$division','$narration','L', '$company_code-99-L-$doc_no','$acc_desc','$loc','$batch_i','$expirydt_i','$quantity','$rate','$amount' )"; 
          $detail_r = $conn->query($detail_q);
          if($detail_r){
            $select_batch_q="SELECT BAL_STOCK,RCPT_STOCK,ISS_STOCK FROM item_batch_no where CO_CODE='$company_code' AND ITEM_CODE='$acc_desc'
            AND LOC_CODE='$loc' AND BATCH_NO='$batch_i' AND EXPIRY_DATE='$expirydt_i'";
            $select_batch_r = $conn->query($select_batch_q);
            $show_batch = mysqli_fetch_assoc($select_batch_r);
            $count = mysqli_num_rows($select_batch_r);
              $batch_bal=$show_batch['BAL_STOCK'];
              $batch_issue=$show_batch['ISS_STOCK']==null?0:$show_batch['ISS_STOCK'];
              $batch_rcpt=$show_batch['RCPT_STOCK']==null?0:$show_batch['RCPT_STOCK'];
              $batch_final_rec_qty=$batch_rcpt+$quantity;
              $batch_final_qty=$batch_bal+$quantity;
              $update_batch_q="UPDATE item_batch_no set RCPT_STOCK='$batch_final_rec_qty', BAL_STOCK='$batch_final_qty' WHERE CO_CODE='$company_code' AND ITEM_CODE='$acc_desc'
              AND LOC_CODE='$loc' AND BATCH_NO='$batch_i' AND EXPIRY_DATE='$expirydt_i'";
              $update_batch_r = $conn->query($update_batch_q);
            $return_data = array(
                "status" => 1,
                "message" => "Issues Return[P To Loan] - has been Inserted having Doc No:".$doc_no 
            );
          }else{
            $return_data = array(
            "status" => 0,
            "message" => "Issues Return[P To Loan] - has not been Inserted"
            );
        }
      }
    }
}
else if(isset($_POST['action']) && $_POST['action'] == 'view'){
    $query = "SELECT * FROM strtran_mst where DOC_TYPE = 'IRLN' ORDER BY doc_date desc,doc_no desc";
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}
elseif(isset($_POST['action']) && $_POST['action'] == 'edit'){
  $doc_no=$_POST['doc_no'];
  $doc_type=$_POST['doc_type'];
  $doc_year=$_POST['doc_year'];
  $co_code=$_POST['co_code'];
  $do_key=$_POST['do_key'];
    $query = "SELECT A.*, B.co_name, D.party_name, D.address, V.div_name FROM strtran_mst A
    LEFT JOIN company B ON A.co_code = B.co_code 
    LEFT JOIN party D ON A.party_code = D.party_div
    LEFT JOIN division V ON A.DIV_CODE = V.div_code
     WHERE A.doc_no='$doc_no' and A.doc_type = '$doc_type' and A.doc_year='$doc_year' and A.co_code='$co_code' and A.do_key='$do_key'";
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    $return_data = $show;  
}
elseif(isset($_POST['action']) && $_POST['action'] == 'edit_table'){
  $doc_no=$_POST['doc_no'];
  $doc_type=$_POST['doc_type'];
  $doc_year=$_POST['doc_year'];
  $co_code=$_POST['co_code'];
  $do_key_ref=$_POST['do_key_ref'];
    $query = "SELECT S.*,I.* FROM strtran_dtl S 
    left JOIN  items I
    on I.item_div = S.ITEM_CODE
    WHERE S.doc_no='$doc_no' 
    AND S.doc_type='$doc_type' 
    AND S.doc_year='$doc_year' 
    AND S.co_code='$co_code' 
    AND S.do_key_ref='$do_key_ref' ";
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
    while($show = mysqli_fetch_assoc($result)){
        $return_data[] = $show;
    }
}
elseif(isset($_POST['action']) && $_POST['action'] == 'update'){
  $doc_no=$_POST['doc_no'];
  $sale_code=$_POST['sale_code'];
  $voucher_date=$_POST['voucher_date'];
  $year=$_POST['year'];
  $company_code=$_POST['company_code'];
  $company_name=$_POST['company_name'];
  $company_ref=$_POST['company_ref'];
  $v_no=$_POST['v_no'];
  $party=$_POST['party'];
  $name_p=$_POST['name_p'];
  $purchase_mode=$_POST['purchase_mode'];
  $party_ref=$_POST['party_ref'];
  $division=$_POST['division'];
  $division_name=$_POST['division_name'];
  $narration=$_POST['narration'];
  $date = date('Y-m-d');
  $upd_mst_q="UPDATE strtran_mst SET doc_date='$voucher_date', doc_year='$year' , remarks='$narration'
               WHERE doc_no='$doc_no' and doc_type = 'IRLN' and doc_year='$year' and co_code='$company_code' and do_key='$company_code-99-L-$doc_no'";
  $upd_mst_r = $conn->query($upd_mst_q);
  if($upd_mst_r){
    $min_qty_detail="SELECT qty from strtran_dtl where co_code = '$company_code' and doc_type = 'IRLN' and doc_year='$year' 
    and div_code='$division'  and do_key_ref='$company_code-99-L-$doc_no'";
    $min_qty_r = $conn->query($min_qty_detail);
    $return_datas=[];
    while($show = mysqli_fetch_assoc($min_qty_r)){
        $return_datas[] = $show;
    }
    $del_dtl_q="DELETE FROM strtran_dtl  
    WHERE doc_no='$doc_no' and doc_type = 'IRLN' and doc_year='$year' and co_code='$company_code' and do_key_ref='$company_code-99-L-$doc_no'";
    $del_dtl_r = $conn->query($del_dtl_q);
    if($del_dtl_r){
      for($i=0;$i< count($_POST['acc_desc']); $i++){
        $pre_qty=$return_datas[$i]['qty'];
        $acc_desc = $_POST['acc_desc'][$i];
          $detail = $_POST['detail'][$i];
          $loc = $_POST['loc_i'][$i];
          $batch_i = $_POST['batch_i'][$i];
          $expirydt_i = $_POST['expirydt_i'][$i];
          $quantity = $_POST['quantity'][$i];
          $rate = $_POST['rate'][$i];
          $amount = $_POST['amount'][$i];
        $quantity=intval(preg_replace('/[^\d.]/', '', $quantity));
        $quantitys = str_replace( ',', '', $quantity );
        if( is_numeric( $quantitys ) ) {
          $quantity = $quantitys;
        }
        $rate=intval(preg_replace('/[^\d.]/', '', $rate));
        $rates = str_replace( ',', '', $rate );
        if( is_numeric( $rates ) ) {
          $rate = $rates;
        }
        $amount=intval(preg_replace('/[^\d.]/', '', $amount));
        $amounts = str_replace( ',', '', $amount );
        if( is_numeric( $amounts ) ) {
          $amount = $amounts;
        }
        $detail_q = "insert into strtran_dtl(DOC_NO, DOC_TYPE, DOC_DATE,DOC_YEAR,CO_CODE,DIV_CODE,REMARKS,PO_CATG, DO_KEY_REF,ITEM_CODE, LOC_CODE,BATCH_NO,EXPIRY_DATE,QTY, RATE,AMT )
        value ('$doc_no','IRLN','$voucher_date','$year','$company_code','$division','$narration','L', '$company_code-99-L-$doc_no','$acc_desc','$loc','$batch_i','$expirydt_i','$quantity','$rate','$amount' )"; 
            $detail_r = $conn->query($detail_q);
            if($detail_r){
              $select_batch_q="SELECT BAL_STOCK,RCPT_STOCK,ISS_STOCK FROM item_batch_no where CO_CODE='$company_code' AND ITEM_CODE='$acc_desc'
              AND LOC_CODE='$loc' AND BATCH_NO='$batch_i' AND EXPIRY_DATE='$expirydt_i'";
              $select_batch_r = $conn->query($select_batch_q);
              $show_batch = mysqli_fetch_assoc($select_batch_r);
              $count = mysqli_num_rows($select_batch_r);
                $batch_bal=$show_batch['BAL_STOCK'];
                $batch_issue=$show_batch['ISS_STOCK']==null?0:$show_batch['ISS_STOCK'];
                $batch_rcpt=$show_batch['RCPT_STOCK']==null?0:$show_batch['RCPT_STOCK'];
                $batch_final_rec_qty=$batch_rcpt-$pre_qty+$quantity;
                $batch_final_qty=$batch_bal-$pre_qty+$quantity;
                $update_batch_q="UPDATE item_batch_no set RCPT_STOCK='$batch_final_rec_qty', BAL_STOCK='$batch_final_qty' WHERE CO_CODE='$company_code' AND ITEM_CODE='$acc_desc'
                AND LOC_CODE='$loc' AND BATCH_NO='$batch_i' AND EXPIRY_DATE='$expirydt_i'";
                $update_batch_r = $conn->query($update_batch_q);
              $return_data = array(
                  "status" => 1,
                  "message" => "Issues [Party To Loan] - has been Updated having Doc No:".$doc_no 
              );
            }else{
              $return_data = array(
              "status" => 0,
              "message" => "Issues [Party To Loan] - has not been Updated"
              );
          }
      }
    }
  } 
}
else{
    $return_data = array(
        "status" => 0,
        "message" => "Action Not Matched"
    );
}
print(json_encode($return_data, JSON_PRETTY_PRINT));
