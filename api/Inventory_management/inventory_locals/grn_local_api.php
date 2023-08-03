<?php
session_start();
include("../../auth/db.php");
header("Content-Type: application/json");
if(isset($_POST['action']) && $_POST['action'] == 'po_num'){
    $company_code=$_POST['company_code'];
    $query = "SELECT A.PARTY_NAME,A.REFNUM,A.DOC_DATE,A.ORDER_KEY,A.TOTAL_NET_AMT
    FROM PO_MST_LOCAL_UM_VIEW A, div_allow B
    WHERE A.div_code = B.DIV_CODE
    AND B.PERMISSION = 'Y'
    AND IFNULL(A.ORDER_BAL_QTY,0) > 0
    and A.CO_CODE = '$company_code'
    GROUP BY A.CO_CODE,A.DIV_CODE,A.DOC_YEAR,A.PO_CATG,A.DOC_NO
    ORDER BY A.PARTY_NAME";
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
    while($show = mysqli_fetch_assoc($result)){
        $return_data[] = $show;
    }
}
elseif(isset($_POST['action']) && $_POST['action'] == 'po_detail'){
    $po_no=$_POST['po_no'];
    $query = "SELECT A.PARTY_NAME,A.REFNUM,A.DOC_DATE,A.ORDER_KEY,A.TOTAL_NET_AMT,F.CRDAYS,F.PARTY_REF,C.supp_div,C.address 
    FROM PO_MST_LOCAL_UM_VIEW A ,PO_MST_LOCAL_UM F,DIV_ALLOW B, supp C 
    WHERE A.div_code = B.DIV_CODE AND B.PERMISSION = 'Y' AND IFNULL(A.ORDER_BAL_QTY,0) > 0
    and A.order_key = '$po_no'  AND A.order_key = F.ORDER_KEY and A.party_code = C.supp_div and c.co_code = f.co_code
    ORDER BY A.PARTY_NAME";
    $select_r = $conn->query($query);
    $show = mysqli_fetch_assoc($select_r);
    $return_data=$show;
  }
elseif(isset($_POST['action']) && $_POST['action'] == 'item_detail'){ 
    $order_key=$_POST['order_key'];
    $doc_date=$_POST['doc_date'];
    $query = "SELECT a.item_code,a.item_type,a.qty,a.rate,a.amt,a.disc_rate,a.disc_amt,a.net_amt,a.item_detail, a.order_bal_qty,a.product_code,a.div_code,b.gen_name, c.unit_name,e.div_name
    from   PO_MST_LOCAL_UM_VIEW a, gen_name b, unit	c,items d,division e
    where  order_key  = '$order_key'
    and    doc_date   = '$doc_date'
    and    IFNULL(order_bal_qty,0) > 0
    and b.gen_code=d.gen_code
    and d.DIV_CODE=e.div_code
  and d.um_code=c.unit_code
  and d.item_div=a.item_code and a.co_code=d.co_code
   -- group by a.item_code
    ";
    $result = $conn->query($query);
    $return_data=[];
    while($show = mysqli_fetch_assoc($result)){
        $return_data[] = $show; 
    }
}
elseif(isset($_POST['action']) && $_POST['action'] == 'item_detail_tr'){ 
  $item_code=$_POST['item_code'];
  $order_key=$_POST['order_key'];
  $doc_date=$_POST['doc_date'];
  $query = "SELECT b.gen_name, c.unit_name,e.div_name,d.order_bal_qty
  from  PO_MST_LOCAL_UM_VIEW d, items a, gen_name b, unit	c,division e
  where b.gen_code=a.gen_code
  and a.DIV_CODE=e.div_code
  and a.um_code=c.unit_code
  and d.item_code=a.item_div
  and d.order_key='$order_key'
  and d.doc_date='$doc_date'
  group by a.item_code";
  $result = $conn->query($query);
  $show = mysqli_fetch_assoc($result);
  $return_data = $show; 
}
elseif(isset($_POST['action']) && $_POST['action'] == 'lc'){ 
  $loc_code=$_POST['loc_code'];
  $query = "SELECT * from location where loc_code='$loc_code'
  -- group by a.item_code
  ";
  $result = $conn->query($query);
  $show = mysqli_fetch_assoc($result);
  $return_data = $show; 
}
elseif(isset($_POST['action']) && $_POST['action'] == 'location_detail'){
    $query="SELECT * FROM location";
    $result = $conn->query($query);
    $return_data=[];
    while($show = mysqli_fetch_assoc($result)){
        $return_data[] = $show;
    }
}
else if(isset($_POST['action']) && $_POST['action'] == 'insert'){
    $doc_no=$_POST['doc_no'];
    $voucher_date=$_POST['voucher_date'];
    $year=$_POST['year'];
    $company_code=$_POST['company_code'];
    $company_name=$_POST['company_name'];
    $po_name=$_POST['po_name'];
    $po_date=$_POST['po_date'];
    $select_party=$_POST['select_party'];
    $party_name=$_POST['party_name'];
    $address_p=$_POST['address_p'];
    $party_ref=$_POST['party_ref'];
    $dc_ref=$_POST['dc_ref'];
    $voucher=$_POST['voucher'];
    $order_ref=$_POST['order_ref'];
    $narration=$_POST['narration'];
    $date = date('Y-m-d');
    $crdays=$_POST['crdays'];
    $select_q="SELECT (case when MAX(DOC_NO) is null then 1 else MAX(DOC_NO)+1 end) DOC_NO 
              FROM strtran_mst  WHERE co_code = '$company_code' AND doc_year = '$year' ";
    $select_r = $conn->query($select_q);
    $show = mysqli_fetch_assoc($select_r);
    $doc_no = $show['DOC_NO'];
    $master_q = "insert into strtran_mst(DOC_NO, DOC_TYPE, DOC_DATE,DOC_YEAR,CO_CODE,PO_NO,PO_DATE,PARTY_CODE,PARTY_REF,ORDER_PARTY_REF, REFNUM2,ORDER_REFNUM,REMARKS,CRDAYS,ENTRY_USER,ENTRY_DATE,POST,PO_CATG,DIV_CODE,DO_KEY)
    value ('$doc_no','GRNL','$voucher_date','$year','$company_code','$po_name','$po_date','$select_party','$party_ref','$dc_ref','$voucher','$order_ref','$narration', '$crdays','Admin','$date', 'N' ,'L','99', '$company_code-99-L-$doc_no')";
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
            $product = $_POST['product'][$i];
            $item_detail = $_POST['item_detail'][$i];
            $quantity = $_POST['quantity'][$i];
            $rate = $_POST['rate'][$i];
            $ok_qty = $_POST['ok_qty'][$i];
            $loc = isset($_POST['loc'][$i])?$_POST['loc'][$i]:'';
            $gen_i = $_POST['gen_i'][$i];
            $um_i = $_POST['um_i'][$i];
            $batch_no=$gen_i;
            $expiry_dt=$um_i;
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
            $ok_qty=intval(preg_replace('/[^\d.]/', '', $ok_qty));
            $ok_qtys = str_replace( ',', '', $ok_qty );
            if( is_numeric( $ok_qtys ) ) {
              $ok_qty = $ok_qtys;
            }
            $detail_q = "insert into strtran_dtl(DOC_NO,DOC_TYPE,DOC_DATE,DOC_YEAR,CO_CODE,PO_NO,PO_DATE,REMARKS, PO_CATG, DIV_CODE   ,ITEM_CODE,ITEM_TYPE, PRODUCT_CODE,ITEM_DETAIL,QTY, REJ_QTY,OK_QTY,LOC_CODE,BATCH_NO,EXPIRY_DATE, DO_KEY_REF)
            value ('$doc_no','GRNL','$voucher_date','$year','$company_code','$po_name','$po_date','$narration','L','99'    ,'$acc_desc','N','$product','$item_detail','$quantity','$rate','$ok_qty','$loc','$gen_i','$um_i', '$company_code-99-L-$doc_no')"; 
            $detail_r = $conn->query($detail_q);
            if($detail_r){
              $upd_query="update po_dtl_local_um set receipt_qty=IFNULL(RECEIPT_QTY,0)+$ok_qty
              WHERE ORDER_KEY='$po_name' AND DOC_YEAR='$year' AND CO_CODE='$company_code' AND DOC_TYPE='PO' AND PO_CATG='L' and item_code='$acc_desc'";
              $upd_r = $conn->query($upd_query);
              $select_batch_q="SELECT BAL_STOCK,RCPT_STOCK,ISS_STOCK FROM item_batch_no where CO_CODE='$company_code' AND ITEM_CODE='$acc_desc'
              AND LOC_CODE='$loc' AND BATCH_NO='$batch_no' AND EXPIRY_DATE='$expiry_dt'";
              $select_batch_r = $conn->query($select_batch_q);
              $show_batch = mysqli_fetch_assoc($select_batch_r);
              $count = mysqli_num_rows($select_batch_r);
              if($count > 0){
                $batch_bal=$show_batch['BAL_STOCK'];
                $batch_issue=$show_batch['ISS_STOCK'];
                $batch_rcpt=$show_batch['RCPT_STOCK'];
                $batch_final_rcpt_qty=$batch_rcpt+$ok_qty;
                $batch_final_qty=$batch_bal+$ok_qty;
                $update_batch_q="UPDATE item_batch_no set RCPT_STOCK='$batch_final_rcpt_qty', BAL_STOCK='$batch_final_qty' WHERE CO_CODE='$company_code' AND ITEM_CODE='$acc_desc'
                AND LOC_CODE='$loc' AND BATCH_NO='$batch_no' AND EXPIRY_DATE='$expiry_dt'";
                $update_batch_r = $conn->query($update_batch_q);
              }else{
                $insert_batch_q="INSERT into item_batch_no(CO_CODE,LOC_CODE,ITEM_CODE,BATCH_NO,EXPIRY_DATE,RCPT_STOCK,BAL_STOCK)
                values('$company_code','$loc','$acc_desc','$batch_no','$expiry_dt','$ok_qty','$ok_qty')";
                $insert_batch_r = $conn->query($insert_batch_q);
              }
              $return_data = array(
                  "status" => 1,
                  "message" => "GRN - Local has been Inserted having Doc No:".$doc_no 
              );
            }else{
              $return_data = array(
              "status" => 0,
              "message" => "GRN - Local has not been Inserted"
              );
          }
        }
      }
}
else if(isset($_POST['action']) && $_POST['action'] == 'view'){
    $query = "SELECT * FROM strtran_mst WHERE DOC_TYPE= 'GRNL'";
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
    $query = "SELECT A.*, B.co_name, D.party_name, D.address FROM strtran_mst A
    LEFT JOIN company B ON A.co_code = B.co_code 
    LEFT JOIN supp D ON A.party_code = D.supp_div and A.co_code=D.co_code
     WHERE A.doc_no='$doc_no' and A.doc_type = '$doc_type' and A.doc_year='$doc_year' and A.co_code='$co_code' and A.do_key='$do_key'";
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    $return_data = $show;
}elseif(isset($_POST['action']) && $_POST['action'] == 'edit_table'){
  $doc_no=$_POST['doc_no'];
  $doc_type=$_POST['doc_type'];
  $doc_year=$_POST['doc_year'];
  $co_code=$_POST['co_code'];
  $do_key_ref=$_POST['do_key_ref'];
    $query = "SELECT S.* ,a.item_code,a.item_type,a.qty,a.rate,a.amt,a.disc_rate,a.disc_amt,a.net_amt,a.item_detail, a.order_bal_qty,a.product_code,a.div_code,b.gen_name, c.unit_name,e.div_name FROM strtran_dtl S , PO_MST_LOCAL_UM_VIEW a, gen_name b, unit	c,items d,division e
    WHERE S.doc_no='$doc_no' 
    AND S.doc_type='$doc_type' 
    AND S.doc_year='$doc_year' 
    AND S.co_code='$co_code' 
    AND S.do_key_ref='$do_key_ref' 
    AND S.po_no=a.order_key and a.co_code=S.co_code and a.item_code=S.ITEM_CODE
    and b.gen_code=d.gen_code
    and d.DIV_CODE=e.div_code
    and d.um_code=c.unit_code
    and d.item_div=a.item_code and a.co_code=d.co_code
    -- group by a.doc_no,a.po_catg,a.doc_year,a.co_code,a.item_code
    ";
    // PRINT_R($query);die();
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
    while($show = mysqli_fetch_assoc($result)){
        $return_data[] = $show;
    }
}
elseif(isset($_POST['action']) && $_POST['action'] == 'update'){
    $doc_no=$_POST['doc_no'];
    $voucher_date=$_POST['voucher_date'];
    $year=$_POST['year'];
    $company_code=$_POST['company_code'];
    $company_name=$_POST['company_name'];
    $po_name=$_POST['po_name'];
    $po_date=$_POST['po_date'];
    $select_party=$_POST['select_party'];
    $party_name=$_POST['party_name'];
    $address_p=$_POST['address_p'];
    $party_ref=$_POST['party_ref'];
    $dc_ref=$_POST['dc_ref'];
    $voucher=$_POST['voucher'];
    $order_ref=$_POST['order_ref'];
    $narration=$_POST['narration'];
    $date = date('Y-m-d');
    $crdays=$_POST['crdays'];
    $division=99;
    $purchase_mode='L';
  $upd_mst_q="UPDATE strtran_mst SET doc_date='$voucher_date', doc_year='$year' , remarks='$narration' , ORDER_PARTY_REF = '$dc_ref',REFNUM2 = '$voucher',ORDER_REFNUM = '$order_ref' 
               WHERE doc_no='$doc_no' and doc_type = 'GRNL' and doc_year='$year' and co_code='$company_code' and do_key='$company_code-99-L-$doc_no'";
  $upd_mst_r = $conn->query($upd_mst_q);
  if($upd_mst_r){
    $min_qty_detail="SELECT qty from strtran_dtl where co_code = '$company_code' and doc_type = 'GRNL' and doc_year='$year' 
    and div_code='$division'  and do_key_ref='$company_code-99-L-$doc_no'";
    $min_qty_r = $conn->query($min_qty_detail);
    $return_datas=[];
    while($show = mysqli_fetch_assoc($min_qty_r)){
        $return_datas[] = $show;
    }
    $del_dtl_q="DELETE FROM strtran_dtl  
    WHERE doc_no='$doc_no' and doc_type = 'GRNL' and doc_year='$year' and co_code='$company_code' and do_key_ref='$company_code-99-L-$doc_no'";
    $del_dtl_r = $conn->query($del_dtl_q);
    if($del_dtl_r){
      for($i=0;$i< count($_POST['acc_desc']); $i++){
        $acc_desc = $_POST['acc_desc'][$i];
        $detail = $_POST['detail'][$i];
        $product = $_POST['product'][$i];
        $item_detail = $_POST['item_detail'][$i];
        $quantity = $_POST['quantity'][$i];
        $rate = $_POST['rate'][$i];
        $ok_qty = $_POST['ok_qty'][$i];
        $loc = isset($_POST['loc'][$i])?$_POST['loc'][$i]:'';
        $gen_i = $_POST['gen_i'][$i];
        $um_i = $_POST['um_i'][$i];
        $batch_no=$gen_i;
        $expiry_dt=$um_i;
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
        $ok_qty=intval(preg_replace('/[^\d.]/', '', $ok_qty));
        $ok_qtys = str_replace( ',', '', $ok_qty );
        if( is_numeric( $ok_qtys ) ) {
          $ok_qty = $ok_qtys;
        }
        $pre_qty=$return_datas[$i]['qty'];
        $detail_q = "insert into strtran_dtl(DOC_NO,DOC_TYPE,DOC_DATE,DOC_YEAR,CO_CODE,PO_NO,PO_DATE,REMARKS,PO_CATG,DIV_CODE,ITEM_CODE,ITEM_TYPE,PRODUCT_CODE,ITEM_DETAIL,QTY, REJ_QTY,OK_QTY,LOC_CODE,BATCH_NO,EXPIRY_DATE,DO_KEY_REF)
          value ('$doc_no','GRNL','$voucher_date','$year','$company_code','$po_name','$po_date','$narration','L','99','$acc_desc','N','$product','$item_detail','$quantity','$rate','$ok_qty','$loc','$gen_i','$um_i', '$company_code-99-L-$doc_no')"; 
        $detail_r = $conn->query($detail_q);
        if($detail_r){
          $select_batch_q="SELECT BAL_STOCK,RCPT_STOCK,ISS_STOCK FROM item_batch_no where CO_CODE='$company_code' AND ITEM_CODE='$acc_desc'
          AND LOC_CODE='$loc' AND BATCH_NO='$batch_no' AND EXPIRY_DATE='$expiry_dt'";
          $select_batch_r = $conn->query($select_batch_q);
          $show_batch = mysqli_fetch_assoc($select_batch_r);
          $count = mysqli_num_rows($select_batch_r);
          if($count > 0){
            $batch_bal=$show_batch['BAL_STOCK'];
            $batch_issue=$show_batch['ISS_STOCK'];
            $batch_rcpt=$show_batch['RCPT_STOCK'];
            $batch_final_rcpt_qty=$batch_rcpt-$pre_qty+$ok_qty;
            $batch_final_qty=$batch_bal-$pre_qty+$ok_qty;
            $update_batch_q="UPDATE item_batch_no set RCPT_STOCK='$batch_final_rcpt_qty', BAL_STOCK='$batch_final_qty' WHERE CO_CODE='$company_code' AND ITEM_CODE='$acc_desc'
            AND LOC_CODE='$loc' AND BATCH_NO='$batch_no' AND EXPIRY_DATE='$expiry_dt'";
            $update_batch_r = $conn->query($update_batch_q);
          }else{
            $insert_batch_q="INSERT into item_batch_no(CO_CODE,LOC_CODE,ITEM_CODE,BATCH_NO,EXPIRY_DATE,RCPT_STOCK,BAL_STOCK)
            values('$company_code','$loc','$acc_desc','$batch_no','$expiry_dt','$ok_qty','$ok_qty')";
            $insert_batch_r = $conn->query($insert_batch_q);
          }
          $upd_query="update po_dtl_local_um set receipt_qty=IFNULL(RECEIPT_QTY,0)-$pre_qty+$ok_qty
          WHERE ORDER_KEY='$po_name' AND DOC_YEAR='$year' AND CO_CODE='$company_code' AND DOC_TYPE='PO' AND PO_CATG='L'";
          $upd_r = $conn->query($upd_query);
          $return_data = array(
              "status" => 1,
              "message" => "GRN - Local has been Updated having Doc No:".$doc_no 
          );
        }else{
          $return_data = array(
          "status" => 0,
          "message" => "GRN - Local has not been Updated"
          );
        }
      }
    }
  } 
}
else
{
  $return_data = array(
    "status" => 0,
    "message" => "Action Not Matched"
    );
}
print(json_encode($return_data, JSON_PRETTY_PRINT));
