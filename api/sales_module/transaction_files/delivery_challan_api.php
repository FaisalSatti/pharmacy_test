<?php
session_start();
header("Content-Type: application/json");
include '../../auth/db.php';
if(isset($_POST['action']) && $_POST['action'] == 'view'){
  // print_r("jfsksk");
    $query = "SELECT * FROM dc_mst";
    // PRINT_R($query);
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
    // print_r($_POST); die(); 

    $order_key=$_POST['order_key'];
    $company_code=$_POST['company_code'];
    $division=$_POST['division'];
    $party=$_POST['party'];
    $purchase_mode=$_POST['purchase_mode'];
    $ship_mode=$_POST['ship_mode'];
    $salesman=$_POST['salesman'];
    $po_date=$_POST['po_date'];
    $doc_date=$_POST['voucher_date'];
    $year=$_POST['year'];
    // $year=date('Y', strtotime($doc_date));
    // print_r($year);
    $order_ref=$_POST['order_ref'];
    $party_ref=$_POST['party_ref'];
    $v_no=$_POST['v_no'];
    $ship_no=$_POST['ship_no'];
    $narration=$_POST['narration'];
    $select_q="SELECT (case when MAX(doc_no) is null then 1 else MAX(doc_no)+1 end) doc_no 
              FROM dc_mst  WHERE co_code = '$company_code' AND doc_year = '$year' AND doc_type = 'DC'
              AND po_catg='$purchase_mode' and div_code='$division'";
              // PRINT_R($select_q);
              // die();
    $select_r = $conn->query($select_q);
    $show = mysqli_fetch_assoc($select_r);
    $doc_no=$show['doc_no'];

    $do_key=$company_code.'-'.$division.'-'.$purchase_mode.'-'.$doc_no;
    $master_q = "insert into dc_mst(doc_type,po_no,po_date,co_code,doc_year,doc_no,doc_date,po_catg,div_code,order_refnum,order_party_ref,refnum2,party_code,sman_code,ship_mode,ship_no,remarks,do_key)value 
    ('DC','$order_key','$po_date','$company_code','$year','$doc_no','$doc_date','$purchase_mode','$division','$order_ref','$party_ref','$v_no','$party','$salesman','$ship_mode','$ship_no','$narration','$do_key')";
    // print_r($master_q);die();
    $master_r = $conn->query($master_q);
    if($master_r){
        $entry_no=1;
        for($i=0;$i< count($_POST['acc_desc']); $i++){
            $acc_desc = $_POST['acc_desc'][$i];
            $detail = $_POST['detail'][$i];
            $type = $_POST['type'][$i]=='0'?'0':$_POST['type'][$i];
            $loc = $_POST['loc'][$i]=='0'?'0':$_POST['loc'][$i];
            $hs_code=$_POST['item_hscode'][$i];
            $batch_no=$_POST['batch_no'][$i];
            $opening_qty=$_POST['opening_qty'][$i];
            $order_qty=$_POST['order_qtys'][$i];
            $dc_qty=$_POST['dc_qtys'][$i];
            $bal_qty=$_POST['bal_qts'][$i];
            $gd_no=$_POST['gd_no'][$i];
            $gd_dt=$_POST['gd_dt'][$i];
            $expiry_dt=$_POST['expiry_dt'][$i];
            $tax_rate=$_POST['tax_rate'][$i];
            $quantity = $_POST['quantity'][$i];
            $quantitys = str_replace( ',', '', $quantity );
            if( is_numeric( $quantitys ) ) {
              $quantity = $quantitys;
            }
            $min_qty_detail="SELECT * from order_dtl where co_code = '$company_code' AND doc_year = '$year'
            AND order_key='$order_key' and item_code='$acc_desc'";
            // print_r($min_qty_detail);die();
            $update_order_r = $conn->query($min_qty_detail);
            $show_m = mysqli_fetch_assoc($update_order_r);
            $pre_rec_qty=$show_m['receipt_qty'];
            $pre_qty=$show_m['qty'];
            $pre_amt=$show_m['amt']/$pre_qty*$quantity;
            $order_rate=$show_m['rate'];
            $order_amount=$order_rate*$quantity;
            // print_r($pre_qty);
            $new_receipt=$pre_rec_qty+$quantity;
            $detail_q = "insert into dc_dtl(entry_no,rate,amt,net_amt,item_type,doc_type,div_code,co_code,doc_year,doc_no,doc_date,item_code,qty,
            remarks,po_catg,loc_code,po_no,do_key_ref,po_date,stax_rate,g_d,gd_date,item_hscode,expiry_date,batch_no)value 
            ('$entry_no','$order_rate','$order_amount','$pre_amt','$type','DC','$division','$company_code','$year','$doc_no','$doc_date','$acc_desc',
            '$quantity','$narration','$purchase_mode','$loc','$order_key','$do_key','$po_date','$tax_rate','$gd_no','$gd_dt','$hs_code',
            '$expiry_dt','$batch_no')"; 
            $entry_no++;
            // print_r($detail_q);
            $detail_r = $conn->query($detail_q);
            if($detail_r){
              $update_order_q="UPDATE order_dtl set receipt_qty='$new_receipt' WHERE co_code = '$company_code' AND doc_year = '$year'
              AND order_key='$order_key' and item_code='$acc_desc'";
              $update_order_r = $conn->query($update_order_q);
              $select_batch_q="SELECT BAL_STOCK,ISS_STOCK FROM item_batch_no where CO_CODE='$company_code' AND ITEM_CODE='$acc_desc'
              AND LOC_CODE='$loc' AND BATCH_NO='$batch_no' AND BAL_STOCK='$opening_qty'";
              $select_batch_r = $conn->query($select_batch_q);
              $show_batch = mysqli_fetch_assoc($select_batch_r);
              $batch_bal=$show_batch['BAL_STOCK'];
              $batch_issue=$show_batch['ISS_STOCK'];
              $batch_final_issue_qty=$batch_issue+$quantity;
              $batch_final_qty=$batch_bal-$quantity;
              $update_batch_q="UPDATE item_batch_no set ISS_STOCK='$batch_final_issue_qty', BAL_STOCK='$batch_final_qty' WHERE CO_CODE='$company_code' AND ITEM_CODE='$acc_desc'
              AND LOC_CODE='$loc' AND BATCH_NO='$batch_no' AND BAL_STOCK='$opening_qty'";
              $update_batch_r = $conn->query($update_batch_q);
              $return_data = array(
                  "status" => 1,
                  // "doc_no" => $doc_no,
                  "message" => "Delivery Order has been Inserted having doc No:".$doc_no 
              );
            }else{
              $return_data = array(
              "status" => 0,
              "message" => "Delivery Order has not been Inserted"
              );
          }
        }
        // die();
      
    }
    
}elseif(isset($_POST['action']) && $_POST['action'] == 'update'){
  // print_r($_POST); die();
  $doc_no=$_POST['doc_no'];
  $order_key=$_POST['order_key'];
  $company_code=$_POST['company_code'];
  $division=$_POST['division'];
  $party=$_POST['party'];
  $purchase_mode=$_POST['purchase_mode'];
  $ship_mode=$_POST['ship_mode'];
  $salesman=$_POST['salesman'];
  $po_date=$_POST['po_date'];
  $doc_date=$_POST['voucher_date'];
  $year=$_POST['year'];
  $dc_no=$_POST['dc_no'];
  // $year=date('Y', strtotime($doc_date));
  // print_r($year);
  $order_ref=$_POST['order_ref'];
  $party_ref=$_POST['party_ref'];
  $v_no=$_POST['v_no'];
  $ship_no=$_POST['ship_no'];
  $narration=$_POST['narration'];
  $upd_mst_q="UPDATE dc_mst SET doc_date='$doc_date', doc_year='$year' , order_refnum='$order_ref',
              remarks='$narration',order_party_ref='$party_ref' ,refnum2='$v_no', ship_mode='$ship_mode', ship_no='$ship_no'
              WHERE co_code = '$company_code' AND div_code = '$division' AND po_no='$order_key'
              AND po_catg='$purchase_mode' AND doc_no='$doc_no'";
  // print_r($upd_mst_q); die();
  $upd_mst_r = $conn->query($upd_mst_q);
  if($upd_mst_r){
    $min_qty_q="SELECT * from dc_dtl WHERE co_code = '$company_code' AND div_code = '$division' 
    AND po_no='$order_key'AND po_catg='$purchase_mode' AND  doc_year='$year' AND doc_no='$doc_no'";
    $min_qty_r = $conn->query($min_qty_q);
    // print_r($min_qty_q);die();
    // $show_row = mysqli_fetch_assoc($min_qty_r);
    // $r_qty_pre=$show_row['receipt_qty'];
    $return_datas=[];
    while($show = mysqli_fetch_assoc($min_qty_r)){
        $return_datas[] = $show;
    }
    // print_r($return_datas);
    // die();
    // print_r($return_data);die();
    $del_dtl_q="DELETE FROM dc_dtl  WHERE co_code = '$company_code' AND div_code = '$division' 
                AND po_no='$order_key'AND po_catg='$purchase_mode' AND doc_no='$doc_no' AND doc_type='DC'";
    // print_r($del_dtl_q); die();
    // print_r("sfdf");
    // print_r(count($_POST['acc_desc']));
    $del_dtl_r = $conn->query($del_dtl_q);
    if($del_dtl_r){
      $entry_no=1;
      for($i=0;$i< count($_POST['acc_desc']); $i++){
        $acc_desc = $_POST['acc_desc'][$i];
        $detail = $_POST['detail'][$i];
        $type = $_POST['type'][$i]=='0'?'0':$_POST['type'][$i];
        $loc = $_POST['loc'][$i]=='0'?'0':$_POST['loc'][$i];
        $dc = $_POST['dc_qtys'][$i]=='0'?'0':$_POST['dc_qtys'][$i];
        $quantity = $_POST['quantity'][$i];
        $quantitys = str_replace( ',', '', $quantity );
        if( is_numeric( $quantitys ) ) {
          $quantity = $quantitys;
        }
        $batch_no=$_POST['batch_no'][$i];
        $gd_no=$_POST['gd_no'][$i];
        $gd_dt=$_POST['gd_dt'][$i];
        $expiry_dt=$_POST['expiry_dt'][$i];
        $tax_rate=$_POST['tax_rate'][$i];
        $opening_qty=$_POST['opening_qty'][$i];
        $rq_per=$return_datas[$i]['qty'];
        // $per_rate=$return_datas[$i]['rate'];
        // $new_amt=$per_rate*$quantity;
        // print_r($rq_per);
        $batch_bal_qty=$opening_qty;
        $batch_new_bal_qty=$batch_bal_qty-$quantity;
        $get_data_q="SELECT a.* from items a 
        WHERE a.item_div = '$acc_desc' and a.co_code='$company_code'";
        $get_data_r = $conn->query($get_data_q);
        $dat = mysqli_fetch_assoc($get_data_r);
        $hs_code=$dat['hscode'];
        $tax_rate=$dat['tax_rate'];
        $bal_qty=$dat['bal_qty'];
        $pre_qty_q="SELECT * from order_dtl WHERE co_code = '$company_code' AND div_code = '$division' 
        AND order_key='$order_key'AND po_catg='$purchase_mode' AND  doc_date='$po_date' AND item_code='$acc_desc'";
        $pre_qty_r = $conn->query($pre_qty_q);
        // print_r($pre_qty_q);die();
        $show_row = mysqli_fetch_assoc($pre_qty_r);
        $pre_o_qty=$show_row['receipt_qty'];
        $pre_qty=$show_row['qty'];
        $pre_amt=$show_row['amt']/$pre_qty*$quantity;
        $order_rate=$show_row['rate'];
        $order_amount=$order_rate*$quantity;
        // $order_amt=$show_row['amt'];
        // print_r($dc);
        // print_r($rq_per);
        $qty_con=$dc+$rq_per;
        // print_r("hii");
        // print_r($qty_con);
        $rec_quantity=($qty_con-$rq_per)+$quantity;
        $detail_q = "insert into dc_dtl(entry_no,rate,amt,net_amt,item_type,doc_type,div_code,co_code,doc_year,doc_no,doc_date,item_code,qty,remarks,
        po_catg,loc_code,po_no,do_key_ref,po_date,stax_rate,g_d,gd_date,item_hscode,batch_no,expiry_date)value 
        ('$entry_no','$order_rate','$order_amount','$pre_amt','$type','DC','$division','$company_code','$year','$doc_no','$doc_date','$acc_desc',
        '$quantity','$narration','$purchase_mode','$loc','$order_key','$dc_no','$po_date','$tax_rate','$gd_no','$gd_dt','$hs_code','$batch_no','$expiry_dt')"; 
        $entry_no++;
        // print_r($detail_q);
        $detail_r = $conn->query($detail_q);
        if($detail_r){
          $update_order_q="UPDATE order_dtl set receipt_qty='$rec_quantity' WHERE co_code = '$company_code' AND doc_year = '$year'
          AND order_key='$order_key' and item_code='$acc_desc'";
          // print_r($update_order_q);die();
          $update_order_r = $conn->query($update_order_q);


          $select_batch_q="SELECT BAL_STOCK,ISS_STOCK FROM item_batch_no where CO_CODE='$company_code' AND ITEM_CODE='$acc_desc'
          AND LOC_CODE='$loc' AND BATCH_NO='$batch_no' AND BAL_STOCK='$batch_bal_qty'";
          // print_r($select_batch_q);die();
          $select_batch_r = $conn->query($select_batch_q);
          $show_batch = mysqli_fetch_assoc($select_batch_r);
          $batch_bal=$show_batch['BAL_STOCK'];
          $batch_issue=$show_batch['ISS_STOCK'];
          $batch_final_qty=$batch_bal+$rq_per;
          $batch_final_qty=$batch_final_qty-$quantity;
          
          $batch_issue_final_qty=$batch_issue-$rq_per;
          $batch_issue_final_qty=$batch_issue_final_qty+$quantity;
          $update_batch_q="UPDATE item_batch_no set ISS_STOCK='$batch_issue_final_qty', BAL_STOCK='$batch_final_qty' WHERE CO_CODE='$company_code' AND ITEM_CODE='$acc_desc'
          AND LOC_CODE='$loc' AND BATCH_NO='$batch_no' AND BAL_STOCK='$opening_qty'";
          $update_batch_r = $conn->query($update_batch_q);

          $return_data = array(
              "status" => 1,
              // "doc_no" => $doc_no,
              "message" => "Delivery Order has been Updated having doc No:".$doc_no 
          );
        }else{
          $return_data = array(
          "status" => 0,
          "message" => "Delivery Order has not been Updated"
          );
        }
      }
    }
  } 
}elseif(isset($_POST['action']) && $_POST['action'] == 'edit'){
  // print_r($_POST); die();
  $co_code=$_POST['co_code'];
  $party_code=$_POST['party_code'];
  $div_code=$_POST['div_code'];
  $salesman_code=$_POST['salesman_code'];
  $po_catg=$_POST['po_catg'];
  $doc_year=$_POST['doc_year'];
  $doc_no=$_POST['doc_no'];
    $query = "SELECT A.*,B.co_name,C.div_name,D.party_name,E.sman_name FROM dc_mst A
    LEFT JOIN company B ON A.co_code=B.co_code LEFT JOIN division C ON C.div_code=A.div_code
    INNER JOIN party D ON A.party_code= D.party_div and A.co_code=D.co_code
    LEFT JOIN salesman E ON A.sman_code= E.sman_code 
    WHERE A.co_code='$co_code' AND A.div_code='$div_code' 
    AND A.party_code='$party_code' AND A.sman_code='$salesman_code' AND A.doc_year='$doc_year' 
    AND A.doc_no='$doc_no' AND A.po_catg='$po_catg' ";
    // PRINT_R($query); die();
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    $return_data = $show;
}elseif(isset($_POST['action']) && $_POST['action'] == 'edit_table'){
    // print_r("jfsksk");
    $co_code=$_POST['co_code'];
    // $party_code=$_POST['party_code'];
    $div_code=$_POST['div_code'];
    $po_catg=$_POST['po_catg'];
    $doc_no=$_POST['doc_no'];
    $year=$_POST['doc_year'];
    $query = "SELECT a.*,b.loc_name,c.* FROM dc_dtl a 
    left join location b on a.loc_code=b.loc_code  
    left join item_batch_no c on a.item_code=c.item_code and a.co_code=c.co_code and a.loc_code=c.LOC_CODE and a.batch_no = c.batch_no and a.expiry_date = c.expiry_date
    -- LEFT JOIN order_dtl F ON a.do_key_ref=F.order_key and a.co_code=F.co_code and a.item_code=F.item_code
    WHERE a.co_code='$co_code' AND a.div_code='$div_code' 
    AND a.doc_no='$doc_no' AND a.po_catg='$po_catg' AND a.doc_year='$year' ";
    // PRINT_R($query); die();
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
    while($show = mysqli_fetch_assoc($result)){
        $return_data[] = $show;
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'party_code'){
    // print_r("jfsksk");
    $company_code=$_POST['company_code'];
    $query = "SELECT a.party_division,a.party_name,b.division_name,c.zone_name,d.city_name FROM party a
    INNER JOIN division b on a.division_code=b.division_code
    INNER JOIN zone c on a.zone_code =c.zone_code 
    INNER JOIN city d on a.city_code=d.city_code WHERE a.co_code='$company_code'";
    // PRINT_R($query); DIE();  
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
    while($show = mysqli_fetch_assoc($result)){
        $return_data[] = $show;
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'document_no'){
    // print_r($_POST); die();
    $company_code=$_POST['company_code'];
    $division_code=$_POST['division_code'];
    $purchase_mode=$_POST['purchase_mode'];
    $query = "SELECT (case when MAX(doc_no) is null then 1 else MAX(doc_no)+1 end) doc_no 
    FROM order_mst  WHERE co_code = '$company_code' AND div_code = '$division_code' AND po_catg = '$purchase_mode'";
    // PRINT_R($query); die();
    $select_r = $conn->query($query);
    $show = mysqli_fetch_assoc($select_r);
    $doc_no=$show['doc_no'];
      $return_data = array(
        "status" => 1,
        "doc_no" => $doc_no
      );
}elseif(isset($_POST['action']) && $_POST['action'] == 'order_code'){
  // print_r($_POST); die();
  $query = "SELECT DISTINCT a.*,b.party_name from order_dtl a 
            left join order_mst c on c.order_key=a.order_key 
            left join party b on c.party_code=b.party_div  and b.co_code=c.co_code
            ORDER BY a.doc_date desc,a.doc_no desc";
    // PRINT_R($query); die();
  $select_r = $conn->query($query);
  $count = mysqli_num_rows($select_r);
  $return_data=[];
  while($show = mysqli_fetch_assoc($select_r)){
      $return_data[] = $show;
  }
}elseif(isset($_POST['action']) && $_POST['action'] == 'get_detail'){
  // print_r($_POST); die();
  $doc_no=$_POST['doc_no'];
  $party_name=$_POST['party_name'];
  $ref_num=$_POST['ref_num']=='-'?'':$_POST['ref_num'];
  $doc_date=$_POST['doc_date'];
  $order_key=$_POST['order_key'];
  $total_net_amt=$_POST['total_net_amt'];
  $qty=$_POST['qty'];
  $receipt_qty=$_POST['receipt_qty'];
  $order_bal=$_POST['order_bal'];
  $div_code=$_POST['div_code'];
  $doc_year=$_POST['doc_year'];
  $query="SELECT a.*,b.sman_name,a.sman_code,a.refnum2 from order_mst a
  left join salesman b on a.sman_code=b.sman_code
   where a.doc_no='$doc_no' and a.order_key='$order_key' and a.refnum='$ref_num'
  and a.doc_date='$doc_date' and a.div_code='$div_code'";
  // print_r("fff");
  // print_r($query);die();
  $select = $conn->query($query);
  $show = mysqli_fetch_assoc($select);
  $party_code=$show['party_code'];
  $company_code=$show['co_code'];
  $sman_name=$show['sman_name'];
  $sman_code=$show['sman_code'];
  $party_ref=$show['party_ref'];
  $refnum2=$show['refnum2'];
  $crdays=$show['crdays'];
  $query_m="SELECT a.*,b.co_name,c.div_name from order_dtl a inner join company b on a.co_code=b.co_code 
  inner join division c on a.div_code=c.div_code
  where a.co_code='$company_code' and a.doc_no='$doc_no' and 
  a.order_key='$order_key' and a.refnum='$ref_num' and a.doc_date='$doc_date' and a.qty='$qty' and 
  a.receipt_qty='$receipt_qty' and a.amt='$total_net_amt' and a.div_code='$div_code' 
  and a.order_key='$order_key'";
  // print_r($query_m);die();
  $select_m = $conn->query($query_m);
  $show_m = mysqli_fetch_assoc($select_m);
  // var_dump($show);
  // $return_data[]=$show_m;
  // $show_m=$return_data;
  
  // PRINT_R($show_m); die();

  $return_data = array(
      "detail" => $show_m,
      "party_code" => $party_code,
      "sman_name" => $sman_name,
      "sman_code" => $sman_code,
      "party_ref" => $party_ref,
      "v_no"      => $refnum2,
      "crdayss"      => $crdays
  );
}elseif(isset($_POST['action']) && $_POST['action'] == 'location_code'){
  // print_r("jfsksk");
  $item_code=$_POST['item_code'];
  $query = "SELECT a.*,b.loc_name FROM item_wh_um a left join location b on a.loc_code=b.loc_code  WHERE a.item_code='$item_code'";
  // PRINT_R($query); DIE();  
  $result = $conn->query($query);
  $count = mysqli_num_rows($result);
  $return_data=[];
  while($show = mysqli_fetch_assoc($result)){
      $return_data[] = $show;
  }
}elseif(isset($_POST['action']) && $_POST['action'] == 'item_detail'){
  // print_r("djfjdf");
  // print_r($_POST); die();
  $order_key=$_POST['order_key'];
  $item_code=$_POST['item_code'];
  $query = "SELECT a.*,b.div_name,d.gen_name,e.qty as total_order_qty,e.receipt_qty as total_order_receipt_qty,g.loc_name,h.* from items a 
            inner join division b on a.div_code=b.div_code
            inner join gen_name d on a.gen_code=d.gen_code 
            left join order_dtl e on a.item_div=e.item_code and a.co_code=e.co_code
            left join item_wh_um f on a.item_div=f.item_code and a.co_code=f.co_code
            left join location g on f.loc_code=g.loc_code
            inner join item_batch_no h on h.co_code=a.co_code and h.loc_code=g.loc_code and a.item_div=h.item_code
            WHERE a.item_div = '$item_code' AND e.order_key='$order_key'";
  // PRINT_R($query); die();
  $select_r = $conn->query($query);
  $show = mysqli_fetch_assoc($select_r);
  $return_data=$show;
}elseif(isset($_POST['action']) && $_POST['action'] == 'item_detail_edit'){
  // print_r("djfjdf");
  // print_r($_POST); die();
  $order_key=$_POST['order_key'];
  $item_code=$_POST['item_code'];
  $doc_no=$_POST['doc_no'];
  // print_r();die();
  $query = "SELECT a.qty,b.qty as total_order_qty,b.receipt_qty as total_order_receipt_qty,e.gen_name,c.div_name,f.loc_name from dc_dtl a 
  inner join order_dtl b on a.po_no=b.order_key AND a.item_code=b.item_code AND a.co_code=b.co_code
  inner join items d on d.item_div=a.item_code 
  inner join division c on a.div_code=c.div_code
  inner join gen_name e on e.gen_code=d.gen_code
  inner join location f on f.loc_code=a.loc_code 
  where a.item_code='$item_code' and a.doc_no='$doc_no' and a.do_key_ref='$order_key'";
  // PRINT_R($query); die();
  $select_r = $conn->query($query);
  $show = mysqli_fetch_assoc($select_r);
  $return_data=$show;
}elseif(isset($_POST['action']) && $_POST['action'] == 'item_code'){
  // print_r("jfsksk");
  $company_code=$_POST['company_code'];
  $order_key=$_POST['order_key'];
  // $qty=$_POST['qty'];
  $query = "SELECT distinct a.* FROM items a inner join order_dtl b on a.item_div=b.item_code and a.co_code=b.co_code WHERE a.co_code='$company_code' AND b.order_key='$order_key'";
  // PRINT_R($query); DIE();  
  $result = $conn->query($query);
  $count = mysqli_num_rows($result);
  $return_data=[];
  while($show = mysqli_fetch_assoc($result)){
      $return_data[] = $show;
  }
}elseif(isset($_POST['action']) && $_POST['action'] == 'loc_detail'){
  // print_r("jfsksk");
  $company_code=$_POST['company_code'];
  $item_code=$_POST['item_code'];
  $loc_code=$_POST['loc_code'];
  $query = "SELECT a.* FROM item_batch_no a  WHERE a.CO_CODE='$company_code' AND a.ITEM_CODE='$item_code' AND a.LOC_CODE='$loc_code'";
  // PRINT_R($query); DIE();  
  $result = $conn->query($query);
  $count = mysqli_num_rows($result);
  $return_data=[];
  while($show = mysqli_fetch_assoc($result)){
      $return_data[] = $show;
  }
}elseif(isset($_POST['action']) && $_POST['action'] == 'locbatch_code'){
  // print_r("jfsksk");
  $company_code=$_POST['company_code'];
  $item_code=$_POST['item_code'];
  $query = "SELECT  a.*,b.item_descr,c.loc_name FROM item_batch_no a left join items b on b.item_div=a.item_code
            left join location c on c.loc_code=a.loc_code
            WHERE a.co_code='$company_code' AND a.item_code='$item_code'";
  // PRINT_R($query); DIE();  
  $result = $conn->query($query);
  $count = mysqli_num_rows($result);
  $return_data=[];
  while($show = mysqli_fetch_assoc($result)){
      $return_data[] = $show;
  }
}else{
    $return_data = array(
        "status" => 0,
        "message" => "Action Not Matched"
    );
}

print(json_encode($return_data, JSON_PRETTY_PRINT));

?>



