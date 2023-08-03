<?php
session_start();
header("Content-Type: application/json");
include '../../auth/db.php';
if (isset($_POST['action']) && $_POST['action'] == 'view_old') {
  $query = "SELECT * FROM order_mst ORDER BY doc_date desc,doc_no desc";
  $result = $conn->query($query);
  $count = mysqli_num_rows($result);
  $return_data = [];
  while ($show = mysqli_fetch_assoc($result)) {
    $return_data[] = $show;
  }
} elseif (isset($_POST['action']) && $_POST['action'] == 'company_code') {
  $query = "SELECT * FROM company";
  $result = $conn->query($query);
  $return_data = [];
  while ($show = mysqli_fetch_assoc($result)) {
    $return_data[] = $show;
  }
} elseif (isset($_POST['action']) && $_POST['action'] == 'update_old') {
  $company_code = $_POST['company_code'];
  $division = $_POST['division'];
  $party = $_POST['party'];
  $purchase_mode = $_POST['purchase_mode'];
  $salesman = $_POST['salesman'];
  $sale_code = $_POST['sale_code'];
  $doc_no = $_POST['doc_no'];
  $doc_date = $_POST['voucher_date'];
  $year = date('Y', strtotime($doc_date));
  $company_ref = $_POST['company_ref'];
  $party_ref = $_POST['party_ref'];
  $v_no = $_POST['v_no'];
  $narration = $_POST['narration'];
  $upd_mst_q = "UPDATE order_mst SET doc_date='$doc_date', doc_year='$year' , refnum='$company_ref',
              remarks='$narration',party_ref='$party_ref' ,refnum2='$v_no'
              WHERE co_code = '$company_code' AND div_code = '$division' AND order_key='$sale_code'
              AND po_catg='$purchase_mode' AND doc_no='$doc_no'";
  $upd_mst_r = $conn->query($upd_mst_q);
  if ($upd_mst_r) {
    $del_dtl_q = "DELETE FROM order_dtl  WHERE co_code = '$company_code' AND div_code = '$division' 
                AND order_key='$sale_code'AND po_catg='$purchase_mode' AND doc_no='$doc_no'";
    $del_dtl_r = $conn->query($del_dtl_q);
    if ($del_dtl_r) {
      for ($i = 0; $i < count($_POST['acc_desc']); $i++) {
        $acc_desc = $_POST['acc_desc'][$i];
        $detail = $_POST['detail'][$i];
        $type = $_POST['type'][$i] == '0' ? '0' : $_POST['type'][$i];
        $quantity = $_POST['quantity'][$i];
        $rate = $_POST['rate'][$i];
        $rates = str_replace(',', '', $rate);
        if (is_numeric($rates)) {
          $rate = $rates;
        }
        $amount = $_POST['amount'][$i];
        $amounts = str_replace(',', '', $amount);
        if (is_numeric($amounts)) {
          $amount = $amounts;
        }
        $detail_q = "insert into order_dtl(po_catg,order_key,div_code,co_code,doc_year,doc_no,doc_date,item_code,item_type,qty,rate,amt,refnum)value ('$purchase_mode','$sale_code','$division','$company_code','$year','$doc_no','$doc_date','$acc_desc','$type','$quantity','$rate','$amount','$company_ref')";
        $detail_r = $conn->query($detail_q);
        if ($detail_r) {
          $return_data = array(
            "status" => 1,
            "message" => "Sale Order has been Updated having doc No:" . $doc_no
          );
        } else {
          $return_data = array(
            "status" => 0,
            "message" => "Sale Order has not been Updated"
          );
        }
      }
    }
  }
} elseif (isset($_POST['action']) && $_POST['action'] == 'edit_old') {
  $co_code = $_POST['co_code'];
  $party_code = $_POST['party_code'];
  $div_code = $_POST['div_code'];
  $salesman_code = $_POST['salesman_code'];
  $po_catg = $_POST['po_catg'];
  $doc_year = $_POST['doc_year'];
  $doc_no = $_POST['doc_no'];
  $query = "SELECT A.*,B.co_name,C.division_name,D.party_name,E.sman_name FROM order_mst A
    LEFT JOIN company B ON A.co_code=B.co_code LEFT JOIN division C ON C.division_code=A.div_code
    LEFT JOIN party D ON A.party_code= D.party_code LEFT JOIN salesman E ON A.sman_code= E.sman_code 
    WHERE A.co_code='$co_code' AND A.div_code='$div_code' 
    AND A.party_code='$party_code' AND A.sman_code='$salesman_code' AND A.doc_year='$doc_year' 
    AND A.doc_no='$doc_no' AND A.po_catg='$po_catg' ";
  $result = $conn->query($query);
  $count = mysqli_num_rows($result);
  $show = mysqli_fetch_assoc($result);
  $return_data = $show;
} elseif (isset($_POST['action']) && $_POST['action'] == 'edit_table_old') {
  $co_code = $_POST['co_code'];
  $div_code = $_POST['div_code'];
  $po_catg = $_POST['po_catg'];
  $doc_no = $_POST['doc_no'];
  $query = "SELECT * FROM order_dtl WHERE co_code='$co_code' AND div_code='$div_code' 
    AND doc_no='$doc_no' AND po_catg='$po_catg' ";
  $result = $conn->query($query);
  $count = mysqli_num_rows($result);
  $return_data = [];
  while ($show = mysqli_fetch_assoc($result)) {
    $return_data[] = $show;
  }
} elseif (isset($_POST['action']) && $_POST['action'] == 'party_code') {
  $company_code = $_POST['company_code'];
  $query = "SELECT a.ACCOUNT_CODE,a.DESCR FROM ACT_LC_VIEW2 a
     WHERE a.co_code='$company_code' AND A.SUB_LEVEL1 <>'0000' AND SUB_LEVEL2 <>'000' AND CONTROL_CODE IN ('315', '629')";
  $result = $conn->query($query);
  $count = mysqli_num_rows($result);
  $return_data = [];
  while ($show = mysqli_fetch_assoc($result)) {
    $return_data[] = $show;
  }
} elseif (isset($_POST['action']) && $_POST['action'] == 'document_no') {
  $company_code = $_POST['company_code'];
  $division_code = $_POST['division_code'];
  $purchase_mode = $_POST['purchase_mode'];
  $query = "SELECT (case when MAX(doc_no) is null then 1 else MAX(doc_no)+1 end) doc_no 
    FROM order_mst  WHERE co_code = '$company_code' AND div_code = '$division_code' AND po_catg = '$purchase_mode'";
  $select_r = $conn->query($query);
  $show = mysqli_fetch_assoc($select_r);
  $doc_no = $show['doc_no'];
  $return_data = array(
    "status" => 1,
    "doc_no" => $doc_no
  );
} elseif (isset($_POST['action']) && $_POST['action'] == 'party_detail') {
  $party_code = $_POST['party_code'];
  $query = "SELECT a.*,b.div_name,c.city_name,e.zone_name,f.sman_name from party a 
            inner join division b on a.div_code=b.div_code
            inner join city c on a.city_code=c.city_code  
            left join zone e on e.zone_code=a.zone_code
            left join salesman f on f.sman_code=a.salesman_code
            WHERE a.party_div = '$party_code'";
  $select_r = $conn->query($query);
  $show = mysqli_fetch_assoc($select_r);
  $return_data = $show;
} elseif (isset($_POST['action']) && $_POST['action'] == 'item_code') {
  $company_code = $_POST['company_code'];
  $query = "SELECT
            -- ITEM_NAME,div_name,gen_name,ITEM,CO_CODE,DIV_CODE
            *
            FROM ITEM_DETAIL_UM
            WHERE CO_CODE = '$company_code'
            ORDER BY ITEM_NAME";
  $result = $conn->query($query);
  $count = mysqli_num_rows($result);
  $return_data = [];
  while ($show = mysqli_fetch_assoc($result)) {
    $return_data[] = $show;
  }
} elseif (isset($_POST['action']) && $_POST['action'] == 'loc_code') {
  $company_code = $_POST['company_code'];
  $item_code = $_POST['item_code'];
  $query = "SELECT A.*, B.ITEM_NAME, C.loc_name
            FROM item_batch_no A 
            JOIN ITEM_DETAIL_UM B on A.CO_CODE = B.CO_CODE AND A.ITEM_CODE=B.ITEM
            JOIN location C on A.loc_code = C.loc_code
            WHERE A.CO_CODE = '$company_code'
            AND A.ITEM_CODE = '$item_code'
            -- GROUP BY A.CO_CODE, A.LOC_CODE, A.LOC_CODE
            ";
  $result = $conn->query($query);
  $count = mysqli_num_rows($result);
  $return_data = [];
  while ($show = mysqli_fetch_assoc($result)) {
    $return_data[] = $show;
  }
} elseif (isset($_POST['action']) && $_POST['action'] == 'discounts_code') {
  $company_code = $_POST['company_code'];
  $query = "SELECT DESCR,ACCOUNT_CODE
  FROM ACT_CHART
  WHERE CO_CODE = '$company_code'
  AND SUBSTR(ACCOUNT_CODE,8,3) <> '000'
  ORDER BY DESCR;";
  $result = $conn->query($query);
  $count = mysqli_num_rows($result);
  $return_data = [];
  while ($show = mysqli_fetch_assoc($result)) {
    $return_data[] = $show;
  }
} elseif (isset($_POST['action']) && $_POST['action'] == 'account_detail') {
  $account_code = $_POST['account_code'];
  $query = "SELECT DEPT_NAME,DEPT_CODE
            FROM DEPT_STORE
            WHERE SUBSTR(DEPT_CODE,1,3) = SUBSTR('$account_code',1,3)
            ORDER BY DEPT_NAME;";
  $result = $conn->query($query);
  $count = mysqli_num_rows($result);
  $return_data = [];
  while ($show = mysqli_fetch_assoc($result)) {
    $return_data[] = $show;
  }
} elseif (isset($_POST['action']) && $_POST['action'] == 'charge_code') {
  $company_code = $_POST['company_code'];
  $query = "SELECT DESCR,ACCOUNT_CODE
    FROM ACT_CHART
    WHERE CO_CODE = '$company_code'
    AND SUBSTR(ACCOUNT_CODE,8,3) <> '000'
    ORDER BY DESCR;";
  $result = $conn->query($query);
  $return_data = [];
  while ($show = mysqli_fetch_assoc($result)) {
    $return_data[] = $show;
  }
} elseif (isset($_POST['action']) && $_POST['action'] == 'charge_code2') {
  $CO_CODE = $_POST['CO_CODE'];
  $query = "SELECT DESCR,ACCOUNT_CODE
  FROM ACT_CHART
  WHERE CO_CODE = '$CO_CODE'
  AND SUBSTR(ACCOUNT_CODE,8,3) <> '000'
  ORDER BY DESCR;";
  $result = $conn->query($query);
  $return_data = [];
  while ($show = mysqli_fetch_assoc($result)) {
    $return_data[] = $show;
  }
} elseif (isset($_POST['action']) && $_POST['action'] == 'dept1') {
  $charge_code = $_POST['charge_code'];
  $query = "SELECT dept_name,dept_code
    FROM dept_store
    WHERE SUBSTR(dept_code,1,3) =SUBSTR('$charge_code',1,3)
    ORDER BY dept_code;";
  $result = $conn->query($query);
  $return_data = [];
  while ($show = mysqli_fetch_assoc($result)) {
    $return_data[] = $show;
  }
} elseif (isset($_POST['action']) && $_POST['action'] == 'dept3') {
  $disc_code = $_POST['disc_code'];
  $query = "SELECT dept_name,dept_code
    FROM dept_store
    WHERE SUBSTR(dept_code,1,3) =SUBSTR('$disc_code',1,3)
    ORDER BY dept_code;";
  $result = $conn->query($query);
  $return_data = [];
  while ($show = mysqli_fetch_assoc($result)) {
    $return_data[] = $show;
  }
} elseif (isset($_POST['action']) && $_POST['action'] == 'dept2') {
  $frt_code = $_POST['frt_code'];
  $query = "SELECT dept_name,dept_code
    FROM dept_store
    WHERE SUBSTR(dept_code,1,3) =SUBSTR('$frt_code',1,3)
    ORDER BY dept_code;";
  $result = $conn->query($query);
  $return_data = [];
  while ($show = mysqli_fetch_assoc($result)) {
    $return_data[] = $show;
  }
} elseif (isset($_POST['action']) && $_POST['action'] == 'item_detail_tr') {
  $order_key = $_POST['order_key'];
  $doc_date = $_POST['doc_date'];
  $query = "SELECT b.gen_name, c.unit_name,e.div_name,  z.BAL_STOCK
    from  strtran_dtl d, items a, gen_name b, unit	c,division e, item_batch_no Z
    where b.gen_code=a.gen_code
    and a.DIV_CODE=e.div_code
    and a.um_code=c.unit_code
    and d.item_code=a.item_div
    and d.DO_KEY_REF='$order_key'
    and d.doc_date='$doc_date'
    group by a.item_code";
  $result = $conn->query($query);
  $show = mysqli_fetch_assoc($result);
  $return_data = $show;
} else if (isset($_POST['action']) && $_POST['action'] == 'insert') {
  $doc_no = $_POST['doc_no'];
  $sale_code = $_POST['sale_code'];
  $voucher_date = $_POST['voucher_date'];
  $year = $_POST['year'];
  $company_code = $_POST['company_code'];
  $company_name = $_POST['company_name'];
  $company_ref = $_POST['company_ref'];
  $v_no = $_POST['v_no'];
  $party = $_POST['party'];
  $name_p = $_POST['name_p'];
  $party_ref = $_POST['party_ref'];
  $division = $_POST['division'];
  $narration = $_POST['narration'];
  $add_others_code = isset($_POST['add_others_code']) ? $_POST['add_others_code'] : '';
  $add_others_desc = isset($_POST['add_others_desc']) ? $_POST['add_others_desc'] : '';
  $dpt_1_code = isset($_POST['dpt_1_code']) ? $_POST['dpt_1_code'] : '';
  $dpt_1_desc = isset($_POST['dpt_1_desc']) ? $_POST['dpt_1_desc'] : '';
  $add_amount_calc = isset($_POST['add_amount_calc']) ? $_POST['add_amount_calc'] : '';
  $add_amount_calc = str_replace(',', '', $add_amount_calc);
  $add_freight_code = isset($_POST['add_freight_code']) ? $_POST['add_freight_code'] : '';
  $add_freight_desc = $_POST['add_freight_desc'];
  $dpt_2_code = isset($_POST['dpt_2_code']) ? $_POST['dpt_2_code'] : '';
  $dpt_2_desc = isset($_POST['dpt_2_desc']) ? $_POST['dpt_2_desc'] : '';
  $less_freight_calc = isset($_POST['less_freight_calc']) ? $_POST['less_freight_calc'] : '';
  $less_freight_calc = str_replace(',', '', $less_freight_calc);
  $add_disc_code = isset($_POST['add_disc_code']) ? $_POST['add_disc_code'] : '';
  $add_disc_desc = isset($_POST['add_disc_desc']) ? $_POST['add_disc_desc'] : '';
  $dpt_3_code = isset($_POST['dpt_3_code']) ? $_POST['dpt_3_code'] : '';
  $dpt_3_desc = isset($_POST['dpt_3_desc']) ? $_POST['dpt_3_desc'] : '';
  $less_disc_calc = isset($_POST['less_disc_calc']) ? $_POST['less_disc_calc'] : '';
  $less_disc_calc = str_replace(',', '', $less_disc_calc);
  $final_total_calc = isset($_POST['final_total_calc']) ? $_POST['final_total_calc'] : '';
  $final_total_calc = str_replace(',', '', $final_total_calc);
  $date = date('Y-m-d');
  $select_q = "SELECT (case when MAX(DOC_NO) is null then 1 else MAX(DOC_NO)+1 end) DOC_NO 
            FROM strtran_mst  WHERE co_code = '$company_code' AND doc_year = '$year' ";
  $select_r = $conn->query($select_q);
  $show = mysqli_fetch_assoc($select_r);
  $doc_no = $show['DOC_NO'];
  $master_q = "insert into strtran_mst(DOC_NO, DOC_TYPE, DOC_DATE,DOC_YEAR,CO_CODE,REFNUM,PARTY_CODE,PARTY_REF,DIV_CODE,REMARKS,ENTRY_USER,ENTRY_DATE,POST,PO_CATG, DO_KEY,
  CHARGE_CODE,
  CHARGE_DPT,
  CHARGE_AMT,
  FRT_CODE,
  FRT_DPT,
  OTHER_CHRGS,
  DISC_CODE,
  DISC_DPT,
  OTHER_DED,
  TOTAL_NET_AMT
  )
  value ('$doc_no','GRRT','$voucher_date','$year','$company_code','$company_ref','$party','$party_ref','99','$narration','Admin','$date','N' ,'L', '$company_code-99-L-$doc_no',
  '$add_others_code',
  '$dpt_1_code',
  '$add_amount_calc',
  '$add_freight_code',
  '$dpt_2_code',
  '$less_freight_calc',
  '$add_disc_code',
  '$dpt_3_code',
  '$less_disc_calc',
  '$final_total_calc'
  )";
  $master_r = $conn->query($master_q);
  if ($master_r) {
    $return_data = array(
      "status" => 1,
      "message" => "GRN has been Inserted having Document No:" . $doc_no
    );
  } else {
    $return_data = array(
      "status" => 0,
      "message" => "GRN has not been Inserted"
    );
  }
  if ($master_r) {
    $amounts = 0;
    for ($i = 0; $i < count($_POST['acc_desc']); $i++) {
      $acc_desc = $_POST['acc_desc'][$i];
      $detail = $_POST['detail'][$i];
      $type = $_POST['type'][$i];
      $loc = $_POST['loc_i'][$i];
      $grnref_i = $_POST['grnref_i'][$i];
      $batch_i = $_POST['batch_i'][$i];
      $expirydt_i = $_POST['expirydt_i'][$i];
      $quantity = $_POST['quantity'][$i];
      $rate = $_POST['rate'][$i];
      $amount = $_POST['amount'][$i];
      $quantity = intval(preg_replace('/[^\d.]/', '', $quantity));
      $quantitys = str_replace(',', '', $quantity);
      if (is_numeric($quantitys)) {
        $quantity = $quantitys;
      }
      $rate = intval(preg_replace('/[^\d.]/', '', $rate));
      $rates = str_replace(',', '', $rate);
      if (is_numeric($rates)) {
        $rate = $rates;
      }
      $amount = intval(preg_replace('/[^\d.]/', '', $amount));
      $amounts = str_replace(',', '', $amount);
      if (is_numeric($amounts)) {
        $amount = $amounts;
      }
      $detail_q = "insert into strtran_dtl(DOC_NO, DOC_TYPE, DOC_DATE,DOC_YEAR,CO_CODE,DIV_CODE,REMARKS,PO_CATG, DO_KEY_REF,ITEM_CODE,ITEM_TYPE, LOC_CODE,ISLN_REF,BATCH_NO,EXPIRY_DATE,QTY, RATE,AMT)
          value ('$doc_no','GRRT','$voucher_date','$year','$company_code','$division','$narration','L', '$company_code-99-L-$doc_no','$acc_desc','$type','$loc','$grnref_i','$batch_i','$expirydt_i','$quantity','$rate','$amount')";
      $detail_r = $conn->query($detail_q);
      if ($detail_r) {
        $select_batch_q = "SELECT BAL_STOCK,RCPT_STOCK FROM item_batch_no where CO_CODE='$company_code' AND ITEM_CODE='$acc_desc'
              AND LOC_CODE='$loc' AND BATCH_NO='$batch_i' AND EXPIRY_DATE='$expirydt_i'";
        $select_batch_r = $conn->query($select_batch_q);
        $show_batch = mysqli_fetch_assoc($select_batch_r);
        $count = mysqli_num_rows($select_batch_r);
        $batch_bal = $show_batch['BAL_STOCK'];
        $batch_rcpt = $show_batch['RCPT_STOCK'];
        $batch_final_rcpt_qty = $batch_rcpt - $quantity;
        $batch_final_qty = $batch_bal - $quantity;
        $update_batch_q = "UPDATE item_batch_no set RCPT_STOCK='$batch_final_rcpt_qty', BAL_STOCK='$batch_final_qty' WHERE CO_CODE='$company_code' AND ITEM_CODE='$acc_desc'
                AND LOC_CODE='$loc' AND BATCH_NO='$batch_i' AND EXPIRY_DATE='$expirydt_i'";
        $update_batch_r = $conn->query($update_batch_q);
        $return_data = array(
          "status" => 1,
          "message" => "Purchase Return - has been Inserted having Doc No:" . $doc_no
        );
      } else {
        $return_data = array(
          "status" => 0,
          "message" => "Purchase Return - has not been Inserted"
        );
      }
    }
  }
} else if (isset($_POST['action']) && $_POST['action'] == 'view') {
  $query = "SELECT * FROM strtran_mst where DOC_TYPE = 'GRRT' ORDER BY doc_date desc,doc_no desc";
  $result = $conn->query($query);
  $count = mysqli_num_rows($result);
  $return_data = [];
  while ($show = mysqli_fetch_assoc($result)) {
    $return_data[] = $show;
  }
} elseif (isset($_POST['action']) && $_POST['action'] == 'edit') {
  $doc_no = $_POST['doc_no'];
  $doc_type = $_POST['doc_type'];
  $doc_year = $_POST['doc_year'];
  $co_code = $_POST['co_code'];
  $do_key = $_POST['do_key'];
  $query = "SELECT A.*, B.co_name, Y.DESCR FROM strtran_mst A
    LEFT JOIN company B ON A.co_code = B.co_code 
      LEFT JOIN dept_store L
      ON A.CHARGE_DPT = L.dept_code
      LEFT JOIN dept_store M
      ON A.CHARGE_DPT = M.dept_code
      LEFT JOIN dept_store N
      ON A.CHARGE_DPT = N.dept_code
      LEFT JOIN act_chart O
      ON A.CHARGE_CODE = O.account_code
      LEFT JOIN act_chart P
      ON A.FRT_CODE = P.account_code
      LEFT JOIN act_chart X
      ON A.DISC_CODE = X.account_code
      LEFT JOIN ACT_LC_VIEW2 Y
      ON A.PARTY_CODE = Y.account_code
      -- LEFT JOIN supp D 
      -- ON D.PARTY_CODE = Y.account_code
      LEFT JOIN company Z
      ON A.CO_CODE = Z.co_code
     WHERE A.doc_no='$doc_no' and A.doc_type = '$doc_type' and A.doc_year='$doc_year' and A.co_code='$co_code' and A.do_key='$do_key'";
  $result = $conn->query($query);
  $count = mysqli_num_rows($result);
  $show = mysqli_fetch_assoc($result);
  $return_data = $show;
} elseif (isset($_POST['action']) && $_POST['action'] == 'edit_table') {
  $doc_no = $_POST['doc_no'];
  $doc_type = $_POST['doc_type'];
  $doc_year = $_POST['doc_year'];
  $co_code = $_POST['co_code'];
  $do_key_ref = $_POST['do_key_ref'];
  $query = "SELECT S.* , A.* FROM strtran_dtl S 
    left join items A
    on A.item_div = S.ITEM_CODE
    WHERE S.doc_no='$doc_no' 
    AND S.doc_type='$doc_type' 
    AND S.doc_year='$doc_year' 
    AND S.co_code='$co_code' 
    AND S.do_key_ref='$do_key_ref' 
    ";
  $result = $conn->query($query);
  $count = mysqli_num_rows($result);
  $return_data = [];
  while ($show = mysqli_fetch_assoc($result)) {
    $return_data[] = $show;
  }
} elseif (isset($_POST['action']) && $_POST['action'] == 'update') {
  $doc_no = $_POST['doc_no'];
  $sale_code = $_POST['sale_code'];
  $voucher_date = $_POST['voucher_date'];
  $year = $_POST['year'];
  $company_code = $_POST['company_code'];
  $company_name = $_POST['company_name'];
  $company_ref = $_POST['company_ref'];
  $v_no = $_POST['v_no'];
  $party = $_POST['party'];
  $name_p = $_POST['name_p'];
  $party_ref = $_POST['party_ref'];
  $division = $_POST['division'];
  $narration = $_POST['narration'];
  $date = date('Y-m-d');
  $add_others_code = isset($_POST['add_others_code']) ? $_POST['add_others_code'] : '';
  $add_others_desc = isset($_POST['add_others_desc']) ? $_POST['add_others_desc'] : '';
  $dpt_1_code = isset($_POST['dpt_1_code']) ? $_POST['dpt_1_code'] : '';
  $dpt_1_desc = isset($_POST['dpt_1_desc']) ? $_POST['dpt_1_desc'] : '';
  $add_amount_calc = isset($_POST['add_amount_calc']) ? $_POST['add_amount_calc'] : '';
  $add_amount_calc = str_replace(',', '', $add_amount_calc);
  $add_freight_code = isset($_POST['add_freight_code']) ? $_POST['add_freight_code'] : '';
  $add_freight_desc = isset($_POST['add_freight_desc']) ? $_POST['add_freight_desc'] : '';
  $dpt_2_code = isset($_POST['dpt_2_code']) ? $_POST['dpt_2_code'] : '';
  $dpt_2_desc = isset($_POST['dpt_2_desc']) ? $_POST['dpt_2_desc'] : '';
  $less_freight_calc = isset($_POST['less_freight_calc']) ? $_POST['less_freight_calc'] : '';
  $less_freight_calc = str_replace(',', '', $less_freight_calc);
  $add_disc_code = isset($_POST['add_disc_code']) ? $_POST['add_disc_code'] : '';
  $add_disc_desc = isset($_POST['add_disc_desc']) ? $_POST['add_disc_desc'] : '';
  $dpt_3_code = isset($_POST['dpt_3_code']) ? $_POST['dpt_3_code'] : '';
  $dpt_3_desc = isset($_POST['dpt_3_desc']) ? $_POST['dpt_3_desc'] : '';
  $less_disc_calc = isset($_POST['less_disc_calc']) ? $_POST['less_disc_calc'] : '';
  $less_disc_calc = str_replace(',', '', $less_disc_calc);
  $final_total_calc = isset($_POST['final_total_calc']) ? $_POST['final_total_calc'] : '';
  $final_total_calc = str_replace(',', '', $final_total_calc);
  $upd_mst_q = "UPDATE strtran_mst SET doc_date='$voucher_date', doc_year='$year' , remarks='$narration' , CHARGE_CODE='$add_others_code' , CHARGE_DPT = '$dpt_1_code' , CHARGE_AMT = '$add_amount_calc', FRT_CODE = '$add_freight_code' , FRT_DPT = '$dpt_2_code' , 
  OTHER_CHRGS = '$less_freight_calc' , DISC_CODE = '$add_disc_code' , DISC_DPT = '$dpt_3_code', OTHER_DED = '$less_disc_calc' , TOTAL_NET_AMT = '$final_total_calc' 
               WHERE doc_no='$doc_no' and doc_type = 'GRRT' and doc_year='$year' and co_code='$company_code' and do_key='$company_code-99-L-$doc_no' 
                 ";
  $upd_mst_r = $conn->query($upd_mst_q);
  if ($upd_mst_r) {
    $min_qty_detail = "SELECT qty from strtran_dtl where co_code = '$company_code' and doc_type = 'GRRT' and doc_year='$year' 
    and div_code='$division'  and do_key_ref='$company_code-99-L-$doc_no'";
    $min_qty_r = $conn->query($min_qty_detail);
    $return_datas = [];
    while ($show = mysqli_fetch_assoc($min_qty_r)) {
      $return_datas[] = $show;
    }
    $del_dtl_q = "DELETE FROM strtran_dtl  
    WHERE doc_no='$doc_no' and doc_type = 'GRRT' and doc_year='$year' and co_code='$company_code' and do_key_ref='$company_code-99-L-$doc_no'";
    $del_dtl_r = $conn->query($del_dtl_q);
    if ($del_dtl_r) {
      for ($i = 0; $i < count($_POST['acc_desc']); $i++) {
        $pre_qty = $return_datas[$i]['qty'];
        $acc_desc = $_POST['acc_desc'][$i];
        $detail = $_POST['detail'][$i];
        $type = $_POST['type'][$i];
        $loc = $_POST['loc_i'][$i];
        $grnref_i = $_POST['grnref_i'][$i];
        $batch_i = $_POST['batch_i'][$i];
        $expirydt_i = $_POST['expirydt_i'][$i];
        $quantity = $_POST['quantity'][$i];
        $rate = $_POST['rate'][$i];
        $amount = $_POST['amount'][$i];
        $quantity = intval(preg_replace('/[^\d.]/', '', $quantity));
        $quantitys = str_replace(',', '', $quantity);
        if (is_numeric($quantitys)) {
          $quantity = $quantitys;
        }
        $rate = intval(preg_replace('/[^\d.]/', '', $rate));
        $rates = str_replace(',', '', $rate);
        if (is_numeric($rates)) {
          $rate = $rates;
        }
        $amount = intval(preg_replace('/[^\d.]/', '', $amount));
        $amounts = str_replace(',', '', $amount);
        if (is_numeric($amounts)) {
          $amount = $amounts;
        }
        $detail_q = "insert into strtran_dtl(DOC_NO, DOC_TYPE, DOC_DATE,DOC_YEAR,CO_CODE,DIV_CODE,REMARKS,PO_CATG, DO_KEY_REF,ITEM_CODE,ITEM_TYPE, LOC_CODE,ISLN_REF,BATCH_NO,EXPIRY_DATE,QTY, RATE,AMT)
        value ('$doc_no','GRRT','$voucher_date','$year','$company_code','$division','$narration','L', '$company_code-99-L-$doc_no','$acc_desc','$type','$loc','$grnref_i','$batch_i','$expirydt_i','$quantity','$rate','$amount')";
        $detail_r = $conn->query($detail_q);
        if ($detail_r) {
          $select_batch_q = "SELECT BAL_STOCK,RCPT_STOCK FROM item_batch_no where CO_CODE='$company_code' AND ITEM_CODE='$acc_desc'
              AND LOC_CODE='$loc' AND BATCH_NO='$batch_i' AND EXPIRY_DATE='$expirydt_i'";
          $select_batch_r = $conn->query($select_batch_q);
          $show_batch = mysqli_fetch_assoc($select_batch_r);
          $count = mysqli_num_rows($select_batch_r);
          $batch_bal = $show_batch['BAL_STOCK'];
          $batch_rcpt = $show_batch['RCPT_STOCK'];
          $batch_final_rcpt_qty = $batch_rcpt + $pre_qty - $quantity;
          $batch_final_qty = $batch_bal + $pre_qty - $quantity;
          $update_batch_q = "UPDATE item_batch_no set RCPT_STOCK='$batch_final_rcpt_qty', BAL_STOCK='$batch_final_qty' WHERE CO_CODE='$company_code' AND ITEM_CODE='$acc_desc'
                AND LOC_CODE='$loc' AND BATCH_NO='$batch_i' AND EXPIRY_DATE='$expirydt_i'";
          $update_batch_r = $conn->query($update_batch_q);
          $return_data = array(
            "status" => 1,
            "message" => "Purchase Return - has been Updated having Doc No:" . $doc_no
          );
        } else {
          $return_data = array(
            "status" => 0,
            "message" => "Purchase Return - has not been Updated"
          );
        }
      }
    }
  }
} else {
  $return_data = array(
    "status" => 0,
    "message" => "Action Not Matched"
  );
}
print(json_encode($return_data, JSON_PRETTY_PRINT));
