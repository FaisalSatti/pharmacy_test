<?php
session_start();
header("Content-Type: application/json");
include '../auth/db.php';
// print_r($_POST);die();
if(isset($_POST['action']) && $_POST['action'] == 'view'){
  // print_r("jfsksk");
    $query ="SELECT * 
    FROM strtran_mst
    where DOC_TYPE = 'GIN'";
    // print_r($query);die();
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}elseif(isset($_POST['action']) && $_POST['action'] == 'edit'){
  // print_r($_POST);die();
  $control_code=$_POST['control_code'];
  $level1=$_POST['level1'];
  $level2=$_POST['level2'];
  $company_code=$_POST['company_code'];

    $query = "SELECT * FROM act_chart WHERE co_code ='$company_code' AND control_code='$control_code' AND sub_level1='0000' AND sub_level2='000'";
    // PRINT_R($query);
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    $voucher_date=$_POST['voucher_date'];
    $Year=$_POST['Year'];
    $company_code=$_POST['company_code'];
    $company_name=$_POST['company_name'];
    $po=$_POST['po'];
    $po_date=$_POST['po_date'];
    $OrderRef=$_POST['OrderRef'];
    $PartyRef=$_POST['PartyRef'];
    $v_no=$_POST['v_no'];
    $party =$_POST['party'];
    $name_p =$_POST['name_p'];
    $address_p =$_POST['address_p'];
    $narration =$_POST['narration'];
    $return_data = $show;
}elseif(isset($_POST['action']) && $_POST['action'] == 'update'){
    // print_r($_POST);die();
    $doc_no=$_POST['doc_no'];
    $DOC_YEAR=$_POST['year'];
    $voucher_date=$_POST['voucher_date'];
    $company_code=$_POST['company_code'];
    $po_no=$_POST['po_no'];
    $purchase_mode=$_POST['purchase_mode'];
    $div=$_POST['div'];
    $OrderRef=$_POST['OrderRef'];
    $PartyRef=$_POST['PartyRef'];
    $v_no=$_POST['v_no'];
    $name_p=$_POST['name_p'];
    $do_key=$_POST['do_key'];
    // $address_p=$_POST['address_p'];
    $narration=$_POST['narration'];
   $upd_mst_q="UPDATE strtran_mst SET PO_CATG='$purchase_mode', DOC_DATE='$voucher_date' ,DIV_CODE='$div', ORDER_REFNUM='$OrderRef', ORDER_PARTY_REF='$PartyRef', REMARKS='$narration'
    WHERE CO_CODE = '$company_code' AND DOC_NO = '$doc_no' AND DOC_YEAR='$DOC_YEAR' AND PO_NO='$po_no' AND DOC_TYPE='GIN'";
    

    $upd_mst_r = $conn->query($upd_mst_q);
    if($upd_mst_r){
      $min_qty_detail="SELECT qty from strtran_dtl where co_code = '$company_code' and doc_type = 'GIN' and doc_year='$DOC_YEAR' 
      and div_code='$div'  and do_key_ref='$do_key'";
      $min_qty_r = $conn->query($min_qty_detail);
      // print_r($min_qty_detail);die();
      $return_datas=[];
      while($show = mysqli_fetch_assoc($min_qty_r)){
          $return_datas[] = $show;
      }
        $del_dtl_q="DELETE FROM strtran_dtl   WHERE CO_CODE = '$company_code' AND DOC_NO = '$doc_no' AND DOC_YEAR='$DOC_YEAR' AND PO_NO='$po_no' AND DOC_TYPE='GIN'";
      
        $del_dtl_r = $conn->query($del_dtl_q);  
        if($del_dtl_r){
            for($i=0;$i< count($_POST['order']); $i++){
              $pre_qty=$return_datas[$i]['qty'];
              $order =$_POST['order'][$i];
              $item_name =$_POST['item_name'][$i];
              $loc =$_POST['loc'][$i];
              $quantity =$_POST['quantity'][$i];
              $rate =$_POST['rate'][$i];
              
                $rate = str_replace( ',', '', $rate );
              $amount =$_POST['amount'][$i];
              
                $amount = str_replace( ',', '', $amount );
              $batch_no =$_POST['batch_no'][$i];
              // print_r()
              $expiry =$_POST['expiry'][$i];
             
              
              $detail_q = "insert into strtran_dtl(CO_CODE,DOC_NO,DOC_DATE,DOC_YEAR,DOC_TYPE,PO_NO,PO_CATG,DIV_CODE,ITEM_CODE,LOC_CODE,QTY,RATE,AMT,BATCH_NO,EXPIRY_DATE)value
               ('$company_code','$doc_no','$voucher_date','$DOC_YEAR','GIN','$po_no','$purchase_mode','$div','$order','$loc','$quantity','$rate','$amount','$batch_no','$expiry')"; 
                $detail_r = $conn->query($detail_q);
                if($detail_r){
                  $select_batch_q="SELECT BAL_STOCK,RCPT_STOCK,ISS_STOCK FROM item_batch_no where CO_CODE='$company_code' AND ITEM_CODE='$order'
                  AND LOC_CODE='$loc' AND BATCH_NO='$batch_no' AND EXPIRY_DATE='$expiry'";
                  // print_r($select_batch_q);die();
                  $select_batch_r = $conn->query($select_batch_q);
                  $show_batch = mysqli_fetch_assoc($select_batch_r);
                  $count = mysqli_num_rows($select_batch_r);
                  // if($count > 0){
                    $batch_bal=$show_batch['BAL_STOCK'];
                    $batch_issue=$show_batch['ISS_STOCK']==null?0:$show_batch['ISS_STOCK'];
                    $batch_rcpt=$show_batch['RCPT_STOCK']==null?0:$show_batch['RCPT_STOCK'];
                    $batch_final_iss_qty=$batch_issue-$pre_qty+$quantity;
                    $batch_final_qty=$batch_bal+$pre_qty-$quantity;
                    $update_batch_q="UPDATE item_batch_no set ISS_STOCK='$batch_final_iss_qty', BAL_STOCK='$batch_final_qty' WHERE CO_CODE='$company_code' AND ITEM_CODE='$order'
                    AND LOC_CODE='$loc' AND BATCH_NO='$batch_no' AND EXPIRY_DATE='$expiry'";
                    $update_batch_r = $conn->query($update_batch_q);
                    $return_data = array(
                        "status" => 1,
                        // "voucher_no" => $voucher_no,
                        "message" => "Good Note has been Inserted having Doc No:".$doc_no 
                    );
                }else{
                    $return_data = array(
                    "status" => 0,
                    "message" => "Good Note has not been Inserted"
                    );
                }
            
        
              
          }
        }
    } 

  }elseif(isset($_POST['action']) && $_POST['action'] == 'mst_data'){
    // 
        $CO_CODE=$_POST['CO_CODE'];
        $DOC_NO=$_POST['DOC_NO'];
        $DOC_TYPE=$_POST['DOC_TYPE'];
        // $DOC_DATE=$_POST['DOC_DATE'];
        $DOC_YEAR=$_POST['DOC_YEAR'];
        $PO_CATG=$_POST['PO_CATG'];
   
  
      $query = "SELECT a.* , b.co_name AS company_name,c.dept_name AS dept_name, d.div_name
      FROM strtran_mst a
      LEFT JOIN company b
      ON a.CO_CODE = b.co_code
      LEFT JOIN dept_store c
      ON a.DEPT_CODE = c.dept_code
      LEFT JOIN division d
      ON a.DIV_CODE = d.div_code
      WHERE a.CO_CODE ='$CO_CODE' AND a.DOC_NO ='$DOC_NO' AND a.DOC_TYPE ='GIN' AND a.DOC_YEAR='$DOC_YEAR' AND a.PO_CATG ='$PO_CATG' ";
    // print_r($query);die();
      $result = $conn->query($query);
    //   $count = mysqli_num_rows($result);
      $show = mysqli_fetch_assoc($result);
      $return_data = $show;
  }elseif(isset($_POST['action']) && $_POST['action'] == 'calculations2'){
    // print_r($_POST);DIE();
    $company_code = $_POST['company_code'];
    $DOC_YEAR = $_POST['DOC_YEAR'];
    $DOC_TYPE = $_POST['DOC_TYPE'];
    $DOC_NO = $_POST['DOC_NO'];
    $query = "SELECT a.* , b.QTY as balstock
    FROM strtran_dtl a
    left join rq_dtl_um b
    ON a.ITEM_CODE = b.ITEM_CODE and a.PO_NO = b.ORDER_KEY
     
    WHERE  a.CO_CODE           = '$company_code'
    and    a.DOC_TYPE          = '$DOC_TYPE'
    and  a.DOC_YEAR          = '$DOC_YEAR'
    and    a.DOC_NO            = '$DOC_NO'";
      // PRINT_R($query);die();
     $result = $conn->query($query);
      // $count = mysqli_num_rows($result);
    //   $item_code=$_POST['item_code'];
    // $order_key=$_POST['order_key'];
    //     $query = "SELECT a.*,b.*
    //     FROM rq_dtl_um a
    //     left join item_batch_no b
    //     on b.ITEM_CODE = '$item_code'
    //     where a.ITEM_CODE = '$item_code' and a.ORDER_KEY ='$order_key'";
    //       // PRINT_R($query);die();
    //     $select_r = $conn->query($query);
    //     $show = mysqli_fetch_assoc($select_r);
    //     $return_data=$show;

      while($show = mysqli_fetch_assoc($result)){
            $return_data[] = $show;
        }
       
      }elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
    // print_r($_POST);die();
    // print_r($_POST);DIE(); 
    $voucher_date=$_POST['voucher_date'];
    $DOC_YEAR=$_POST['year'];
    $company_code=$_POST['company_code'];
    $po_no=$_POST['po_no'];
    $purchase_mode=$_POST['purchase_mode'];
    $div=$_POST['div'];
    $OrderRef=$_POST['OrderRef'];
    $PartyRef=$_POST['PartyRef'];
    $v_no=$_POST['v_no'];
    $name_p=$_POST['name_p'];
    // $address_p=$_POST['address_p'];
    $narration=$_POST['narration'];
   
//     $division_i=$_POST['division_i'];
//     $gen_i=$_POST['gen_i'];
//     $um_i=$_POST['um_i'];
//     $total=$_POST['total'];
//     $total = str_replace( ',', '', $total );
//     $narration=$_POST['narration'];
    $select_q="SELECT (case when MAX(DOC_NO) is null then 1 else MAX(DOC_NO)+1 end) DOC_NO 
    FROM  strtran_mst  WHERE co_code = '$company_code' AND PO_CATG = '$purchase_mode'AND DOC_TYPE = 'GIN' AND DOC_YEAR = '$DOC_YEAR'";
  // print_r($select_q);
  // die();
  $select_r = $conn->query($select_q);
  $show = mysqli_fetch_assoc($select_r);
  $DOC_NO=$show['DOC_NO'];
  $do_key = $company_code .'-'. $div .'-'. $purchase_mode .'-'. $DOC_NO;
//   $ORDER_KEY = $company_code .'-'. $div_code.'-'. $po_cat.'-' . $DOC_NO;
// //   print_r($BILL_KEY);
$master_q = "insert into strtran_mst(DO_KEY,CO_CODE,DOC_NO,DOC_DATE,DOC_YEAR,DOC_TYPE,PO_NO,PO_CATG,DIV_CODE,ORDER_REFNUM,ORDER_PARTY_REF,DEPT_CODE,REMARKS) value ('$do_key','$company_code','$DOC_NO','$voucher_date','$DOC_YEAR','GIN','$po_no','$purchase_mode','$div','$OrderRef','$PartyRef','$v_no','$narration')";
$master_r = $conn->query($master_q);
if($master_r){
      for($i=0;$i< count($_POST['order']); $i++){
              
                // $acc_desc =$acc_desc[$i];
                // $quantity =$quantity[$i];
                // $rate =$rate[$i];
                // $rate = str_replace( ',', '', $rate );
                // $amount =$amount[$i];
                // $amount = str_replace( ',', '', $amount );

                // $total = str_replace( ',', '', $total );
                $order =$_POST['order'][$i];
                $item_name =$_POST['item_name'][$i];
                $loc =$_POST['loc'][$i];
                $quantity =$_POST['quantity'][$i];
                $rate =$_POST['rate'][$i];
                $rate = str_replace( ',', '', $rate );
                $amount =$_POST['amount'][$i];
                $amount = str_replace( ',', '', $amount );
                // print_r($amount);
                // die();
                $batch_no =$_POST['batch_no'][$i];
                $expiry =$_POST['expiry'][$i];
               
                
                $detail_q = "insert into strtran_dtl(DO_KEY_REF,CO_CODE,DOC_NO,DOC_DATE,DOC_YEAR,DOC_TYPE,PO_NO,PO_CATG,DIV_CODE,ITEM_CODE,LOC_CODE,QTY,RATE,AMT,BATCH_NO,EXPIRY_DATE)value ('$do_key','$company_code','$DOC_NO','$voucher_date','$DOC_YEAR','GIN','$po_no','$purchase_mode','$div','$order','$loc','$quantity','$rate','$amount','$batch_no','$expiry')"; 
                // print_r($detail_q);
                $detail_r = $conn->query($detail_q);
                if($detail_r){
                  $select_batch_q="SELECT BAL_STOCK,RCPT_STOCK,ISS_STOCK FROM item_batch_no where CO_CODE='$company_code' AND ITEM_CODE='$order'
                    AND LOC_CODE='$loc' AND BATCH_NO='$batch_no' AND EXPIRY_DATE='$expiry'";
                    // print_r($select_batch_q);die();
                    $select_batch_r = $conn->query($select_batch_q);
                    $show_batch = mysqli_fetch_assoc($select_batch_r);
                    $count = mysqli_num_rows($select_batch_r);
                    // if($count > 0){
                      $batch_bal=$show_batch['BAL_STOCK'];
                      $batch_issue=$show_batch['ISS_STOCK']==null?0:$show_batch['ISS_STOCK'];
                      $batch_rcpt=$show_batch['RCPT_STOCK']==null?0:$show_batch['RCPT_STOCK'];
                      $batch_final_iss_qty=$batch_issue+$quantity;
                      $batch_final_qty=$batch_bal-$quantity;
                      $update_batch_q="UPDATE item_batch_no set ISS_STOCK='$batch_final_iss_qty', BAL_STOCK='$batch_final_qty' WHERE CO_CODE='$company_code' AND ITEM_CODE='$order'
                      AND LOC_CODE='$loc' AND BATCH_NO='$batch_no' AND EXPIRY_DATE='$expiry'";
                      $update_batch_r = $conn->query($update_batch_q);
                    $return_data = array(
                        "status" => 1,
                        // "voucher_no" => $voucher_no,
                        "message" => "GIN has been Inserted having Doc No:".$DOC_NO 
                    );
                  }else{
                    $return_data = array(
                    "status" => 0,
                    "message" => "GIN has not been Inserted"
                    );
                }
    
        }
    }

  }elseif(isset($_POST['action']) && $_POST['action'] == 'company_code'){
  // print_r("jfsksk");
    $query = "SELECT * FROM company";
    // PRINT_R($query);
    $result = $conn->query($query);
    // $count = mysqli_num_rows($result);
    $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}elseif(isset($_POST['action']) && $_POST['action'] == 'div_code'){
    // print_r("jfsksk");
    $query = "SELECT a.DIV_CODE AS DIV_CODE,b.div_name AS DIV_NAME
    from div_allow a, division b
    where a.div_code = b.DIV_CODE
    and a.permission = 'Y'
    -- and a.user_id = :block129.userid
    ORDER BY b.div_name ";
      // PRINT_R($query);
      $result = $conn->query($query);
      // $count = mysqli_num_rows($result);
      $return_data=[];
        while($show = mysqli_fetch_assoc($result)){
            $return_data[] = $show;
        }
}elseif(isset($_POST['action']) && $_POST['action'] == 'dept_code'){
    // print_r("jfsksk");
    $query = "SELECT DEPT_NAME,DEPT_CODE
    FROM DEPT_STORE
    ORDER BY DEPT_NAME";
      // PRINT_R($query);
      $result = $conn->query($query);
      // $count = mysqli_num_rows($result);
      $return_data=[];
        while($show = mysqli_fetch_assoc($result)){
            $return_data[] = $show;
        }
}elseif(isset($_POST['action']) && $_POST['action'] == 'item_code'){
    // print_r ("jfsksk");
    $company_code=$_POST['company_code'];
    $query = "SELECT * FROM items  WHERE co_code='$company_code'";
      // PRINT_R($query);
      $result = $conn->query($query);
      // $count = mysqli_num_rows($result);
      $return_data=[];
        while($show = mysqli_fetch_assoc($result)){
            $return_data[] = $show;
        }
}elseif(isset($_POST['action']) && $_POST['action'] == 'item_detail'){
    // print_r("jfsksk");
    $item_code=$_POST['item_code'];
  $query = "SELECT a.*,b.div_name,c.unit_name,d.gen_name from items a 
            inner join division b on a.div_code=b.div_code
            inner join unit	c on a.um_code=c.unit_code 
            inner join gen_name d on a.gen_code=d.gen_code
            WHERE a.item_div = '$item_code'";
  // PRINT_R($query); die();
  $select_r = $conn->query($query);
  $show = mysqli_fetch_assoc($select_r);
  $return_data=$show;
}elseif(isset($_POST['action']) && $_POST['action'] == 'po_table'){
    // print_r("jfsksk");
    // $item_code=$_POST['item_code'];
  $query = "SELECT a.* ,b.*
  FROM rq_mst_um a,dept_store b
  WHERE a.DEPT_CODE = b.dept_code
  ORDER BY DEPT_NAME";
//   PRINT_R($query);s die();
  $select_r = $conn->query($query);
  $return_data=[];
  while($show = mysqli_fetch_assoc($select_r)){
      $return_data[] = $show;
  }
}elseif(isset($_POST['action']) && $_POST['action'] == 'dept_code_for_po'){
    // print_r("jfsksk");
    $dept_name=$_POST['dept_name'];
    // $item_code=$_POST['item_code'];
  $query = "SELECT dept_code
  FROM dept_store
  WHERE dept_name = '$dept_name'";
//   PRINT_R($query);die();
  $select_r = $conn->query($query);
  $show = mysqli_fetch_assoc($select_r);
  $return_data=$show;
}elseif(isset($_POST['action']) && $_POST['action'] == 'order_key_data'){
  // print_r("jfsksk");
  $CO_CODE=$_POST['CO_CODE'];
    $order_key=$_POST['order_key'];
$query = "SELECT a.*,b.div_name AS DIV_NAME
FROM rq_mst_um a
left join division b
on a.DIV_CODE = b.div_code
WHERE CO_CODE = '$CO_CODE' AND ORDER_KEY = '$order_key'";
  // PRINT_R($query);die();
$select_r = $conn->query($query);
$show = mysqli_fetch_assoc($select_r);
$return_data=$show;
}elseif(isset($_POST['action']) && $_POST['action'] == 'divisioncode'){
    // print_r("jfsksk");
    // $dept_name=$_POST['dept_name'];
    // $item_code=$_POST['item_code'];
        $query = "SELECT div_name,div_code
        FROM division
        ORDER BY div_name";
        //   PRINT_R($query);die();
        $select_r = $conn->query($query);
        $return_data=[];
        while($show = mysqli_fetch_assoc($select_r)){
            $return_data[] = $show;
        }
        
        
            
}elseif(isset($_POST['action']) && $_POST['action'] == 'itemdetails'){
    // print_r("jfsksk");
    $order_key=$_POST['order_key'];
    // print_r($order_key);die();
    // $item_code=$_POST['item_code'];
        $query = "SELECT a.ITEM_CODE, b.item_descr
        FROM rq_dtl_um a
        LEFT JOIN items b
        on a.ITEM_CODE = b.item_div
        where ORDER_KEY = '$order_key'";
          // PRINT_R($query);die();
        $select_r = $conn->query($query);
        $return_data=[];
        while($show = mysqli_fetch_assoc($select_r)){
            $return_data[] = $show;
        }
        
        
            
}elseif(isset($_POST['action']) && $_POST['action'] == 'from_loc'){
  // print_r("jfsksk");
  // print_r($order_key);die();
  // $item_code=$_POST['item_code'];
      $query = "SELECT * from location";
      //   PRINT_R($query);die();
      $select_r = $conn->query($query);
      $return_data=[];
      while($show = mysqli_fetch_assoc($select_r)){
          $return_data[] = $show;
      }
      
      
          
}elseif(isset($_POST['action']) && $_POST['action'] == 'itemthings'){
    // print_r("jfsksk");
    $item_code=$_POST['item_code'];
    $order_key=$_POST['order_key'];
        $query = "SELECT a.*,b.*
        FROM rq_dtl_um a
        left join item_batch_no b
        on b.ITEM_CODE = '$item_code'
        where a.ITEM_CODE = '$item_code' and a.ORDER_KEY ='$order_key'";
          // PRINT_R($query);die();
        $select_r = $conn->query($query);
        $show = mysqli_fetch_assoc($select_r);
        $return_data=$show;
        
        
            
}elseif(isset($_POST['action']) && $_POST['action'] == 'itemdivgen'){
  // print_r("jfsksk");
  // print_r($_POST);
  $item_code=$_POST['item_code'];
      $query = "SELECT a.*,b.div_name,c.gen_name
      FROM items a
      left join division b
      on a.div_code = b.div_code
      left join gen_name c
      on a.gen_code = c.gen_code
      where a.item_div = '$item_code'";
        // PRINT_R($query);die();
      $select_r = $conn->query($query);
      $show = mysqli_fetch_assoc($select_r);
      $return_data=$show;
      
      
          
}else{
    $return_data = array(
        "status" => 0,
        "message" => "Action Not Matched"
    );
 }

print(json_encode($return_data, JSON_PRETTY_PRINT));

?>



