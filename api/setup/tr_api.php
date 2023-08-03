<?php
session_start();
header("Content-Type: application/json");
include '../auth/db.php';
// print_r($_POST);die();
if(isset($_POST['action']) && $_POST['action'] == 'view'){
  // print_r("jfsksk");
    $query ="SELECT * 
    FROM strtran_mst
    where DOC_TYPE = 'TR'";
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
    $DOC_NO=$_POST['doc_no'];
    $DOC_YEAR=$_POST['year'];
    $year=$_POST['year'];
    $voucher_date=$_POST['voucher_date'];
    $company_code=$_POST['company_code'];
    $purchase_mode=$_POST['purchase_mode'];
    $division=$_POST['division'];
    $from_loc=$_POST['from_loc'];
    $to_loc=$_POST['to_loc'];
    $v_no=$_POST['v_no'];
    $narration=$_POST['narration'];
    $do_key=$_POST['do_key'];
    $po = $company_code.'-'. $division.'-'.$purchase_mode.'-'.$DOC_NO;
    $select_1="SELECT qty FROM strtran_dtl   WHERE CO_CODE = '$company_code' AND DOC_NO = '$DOC_NO' 
    AND DOC_YEAR='$DOC_YEAR' AND DOC_TYPE='TR' and DO_KEY_REF='$do_key' order by entry_no asc";
    $select_r_1 = $conn->query($select_1);
    $return_datas=[];
    while($show_1 = mysqli_fetch_assoc($select_r_1)){
        $return_datas[] = $show_1;
    }
    for($i=0;$i< count($_POST['order']); $i++){
      $order =$_POST['order'][$i];
      $quantity =$_POST['quantity'][$i];
     
      $batch_no =$_POST['batch_no'][$i];
      $expiry =$_POST['expiry'][$i];
      $pre_qty=$return_datas[$i]['qty'];
      $select_qs="SELECT *
      FROM  ITEM_BATCH_NO  WHERE CO_CODE = '$company_code'AND LOC_CODE = '$from_loc' AND ITEM_CODE = '$order' AND BATCH_NO = '$batch_no' AND EXPIRY_DATE = '$expiry'";
      $select_rs = $conn->query($select_qs);
      $shows = mysqli_fetch_assoc($select_rs);
      $iss_stock=$shows['ISS_STOCK'];
      $bal_stock=$shows['BAL_STOCK'];
      $new_iss_stock=$iss_stock-$pre_qty+$quantity;
      $new_bal_stock=$bal_stock+$pre_qty-$quantity;
      $detail_q = "UPDATE item_batch_no set ISS_STOCK=$new_iss_stock,BAL_STOCK='$new_bal_stock'
      WHERE CO_CODE = '$company_code'AND LOC_CODE = '$from_loc' AND ITEM_CODE = '$order' AND BATCH_NO = '$batch_no' AND EXPIRY_DATE = '$expiry' "; 
      $select_q = $conn->query($detail_q);
      // $pre_qty=0;
      $select_qs="SELECT *
      FROM  ITEM_BATCH_NO  WHERE CO_CODE = '$company_code'AND LOC_CODE = '$to_loc' AND ITEM_CODE = '$order' AND BATCH_NO = '$batch_no' AND EXPIRY_DATE = '$expiry'";
      $select_rs = $conn->query($select_qs);
      $shows = mysqli_fetch_assoc($select_rs);
      $count = mysqli_num_rows($select_rs);
      if($count > 0){
        $rcpt_stock=$shows['RCPT_STOCK'];
        $bal_stock=$shows['BAL_STOCK'];
        $new_rcpt_stock=$rcpt_stock-$pre_qty+$quantity;
        $new_bal_stock=$bal_stock-$pre_qty+$quantity;
        $detail_q = "UPDATE item_batch_no set RCPT_STOCK=$new_rcpt_stock,BAL_STOCK='$new_bal_stock'
        WHERE CO_CODE = '$company_code'AND LOC_CODE = '$to_loc' AND ITEM_CODE = '$order' AND BATCH_NO = '$batch_no' AND EXPIRY_DATE = '$expiry' "; 
        // print_r($detail_q);
        $detail_r2 = $conn->query($detail_q);
      }
    }
    if($detail_r2){
      $upd_mst_q="UPDATE strtran_mst SET REFNUM='$v_no', WH_CODE='$from_loc' ,WH_CODE2='$to_loc', REMARKS='$narration', DOC_DATE='$voucher_date'
      WHERE CO_CODE = '$company_code' AND DOC_NO = '$DOC_NO' AND DOC_YEAR='$DOC_YEAR' AND DOC_TYPE='TR'";
      $upd_mst_r = $conn->query($upd_mst_q);
      if($upd_mst_r){
        $del_dtl_q="DELETE FROM strtran_dtl   WHERE CO_CODE = '$company_code' AND DOC_NO = '$DOC_NO' AND DOC_YEAR='$DOC_YEAR' AND DOC_TYPE='TR'  and DO_KEY_REF='$do_key'";
      
        $del_dtl_r = $conn->query($del_dtl_q);
        if($del_dtl_r){
          $entry_no=1;
            for($i=0;$i< count($_POST['order']); $i++){
              $order =$_POST['order'][$i];
              $quantity =$_POST['quantity'][$i];
              $rate =$_POST['rate'][$i];
              $rate = str_replace( ',', '', $rate );
              $amount =$_POST['amount'][$i];
              $amount = str_replace( ',', '', $amount );
              $batch_no =$_POST['batch_no'][$i];
              $expiry =$_POST['expiry'][$i];
              
              
              $detail_q = "insert into strtran_dtl(ENTRY_NO,DIV_CODE,CO_CODE,DO_KEY_REF,DOC_NO,DOC_DATE,DOC_YEAR,DOC_TYPE,PO_CATG,ITEM_CODE,QTY,RATE,AMT,BATCH_NO,EXPIRY_DATE)value ('$entry_no','$division','$company_code','$po','$DOC_NO','$voucher_date','$year','TR','$purchase_mode','$order','$quantity','$rate','$amount','$batch_no','$expiry')"; 
        // print_r($detail_q);
                $detail_r = $conn->query($detail_q);
                if($detail_r){
                    $return_data = array(
                        "status" => 1,
                        // "voucher_no" => $voucher_no,
                        "message" => "TRANSFER has been UPDATED having Doc No:".$DOC_NO 
                    );
                }else{
                    $return_data = array(
                    "status" => 0,
                    "message" => "Bill has not been UPDATED"
                    );
                }
            
        
              
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
   
  
      $query = "SELECT a.* , b.co_name AS company_name,c.div_name AS division_name,d.loc_name AS from_loc,e.loc_name AS to_loc 
      FROM strtran_mst a
      LEFT JOIN company b
      ON a.CO_CODE = b.co_code
      LEFT JOIN division c
      ON a.DIV_CODE = c.div_code
      LEFT JOIN location d
      ON a.WH_CODE = d.loc_code
      LEFT JOIN location e
      ON a.WH_CODE2 = e.loc_code
      WHERE a.CO_CODE ='$CO_CODE' AND a.DOC_NO ='$DOC_NO' AND a.DOC_TYPE ='TR' AND a.DOC_YEAR='$DOC_YEAR' AND a.PO_CATG ='$PO_CATG' ";
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
    $query = "SELECT *
    FROM strtran_dtl 
     
    WHERE  CO_CODE           = '$company_code'
    and    DOC_TYPE          = 'TR'
    and   DOC_YEAR          = '$DOC_YEAR'
    and    DOC_NO            = '$DOC_NO'";
    //   PRINT_R($query);die();
    $result = $conn->query($query);
    // $count = mysqli_num_rows($result);
    while($show = mysqli_fetch_assoc($result)){
      $return_data[] = $show;
    }
    

            
}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
    // print_r($_POST);die();
    // print_r($_POST);DIE(); 
    $voucher_date=$_POST['voucher_date'];
    $year=$_POST['year'];
    $company_code=$_POST['company_code'];
    $purchase_mode=$_POST['purchase_mode'];
    $division=$_POST['division'];
    $from_loc=$_POST['from_loc'];
    $to_loc=$_POST['to_loc'];
    $v_no=$_POST['v_no'];
    $narration=$_POST['narration'];
   
    $select_q="SELECT (case when MAX(DOC_NO) is null then 1 else MAX(DOC_NO)+1 end) DOC_NO 
    FROM  strtran_mst  WHERE CO_CODE = '$company_code'AND PO_CATG = '$purchase_mode' AND DOC_TYPE = 'TR'AND DOC_YEAR = '$year' ";
    
    // print_r($select_q);die();
  $select_r = $conn->query($select_q);
  $show = mysqli_fetch_assoc($select_r);
  $DOC_NO=$show['DOC_NO'];
  
  $po = $company_code.'-'. $division.'-'.$purchase_mode.'-'.$DOC_NO;
  // print_r($po);die();
  
  for($i=0;$i< count($_POST['order']); $i++){
    $order =$_POST['order'][$i];
    $quantity =$_POST['quantity'][$i];
   
    $batch_no =$_POST['batch_no'][$i];
    $expiry =$_POST['expiry'][$i];
    $pre_qty=0;
    $select_qs="SELECT *
    FROM  ITEM_BATCH_NO  WHERE CO_CODE = '$company_code'AND LOC_CODE = '$from_loc' AND ITEM_CODE = '$order' AND BATCH_NO = '$batch_no' AND EXPIRY_DATE = '$expiry'";
    $select_rs = $conn->query($select_qs);
    $shows = mysqli_fetch_assoc($select_rs);
    $iss_stock=$shows['ISS_STOCK'];
    $bal_stock=$shows['BAL_STOCK'];
    $new_iss_stock=$iss_stock-$pre_qty+$quantity;
    $new_bal_stock=$bal_stock+$pre_qty-$quantity;
    $detail_q = "UPDATE item_batch_no set ISS_STOCK=$new_iss_stock,BAL_STOCK='$new_bal_stock'
    WHERE CO_CODE = '$company_code'AND LOC_CODE = '$from_loc' AND ITEM_CODE = '$order' AND BATCH_NO = '$batch_no' AND EXPIRY_DATE = '$expiry' "; 
    $select_q = $conn->query($detail_q);
    $pre_qty=0;
    $select_qs="SELECT *
    FROM  ITEM_BATCH_NO  WHERE CO_CODE = '$company_code'AND LOC_CODE = '$to_loc' AND ITEM_CODE = '$order' AND BATCH_NO = '$batch_no' AND EXPIRY_DATE = '$expiry'";
    $select_rs = $conn->query($select_qs);
    $shows = mysqli_fetch_assoc($select_rs);
    $count = mysqli_num_rows($select_rs);
    if($count > 0){
      $rcpt_stock=$shows['RCPT_STOCK'];
      $bal_stock=$shows['BAL_STOCK'];
      $new_rcpt_stock=$rcpt_stock-$pre_qty+$quantity;
      $new_bal_stock=$bal_stock-$pre_qty+$quantity;
      $detail_q = "UPDATE item_batch_no set RCPT_STOCK=$new_rcpt_stock,BAL_STOCK='$new_bal_stock'
      WHERE CO_CODE = '$company_code'AND LOC_CODE = '$to_loc' AND ITEM_CODE = '$order' AND BATCH_NO = '$batch_no' AND EXPIRY_DATE = '$expiry' "; 
      // print_r($detail_q);
      $detail_r2 = $conn->query($detail_q);
    }else{
      $detail_q2 = "insert into item_batch_no(CO_CODE,BATCH_NO,LOC_CODE,ITEM_CODE,EXPIRY_DATE,RCPT_STOCK,BAL_STOCK)value ('$company_code','$batch_no','$to_loc','$order','$expiry','$quantity','$quantity')"; 
      $detail_r2 = $conn->query($detail_q2);
    }
  }
  if($detail_r2){
    $master_q = "insert into strtran_mst(CO_CODE,DO_KEY,DOC_NO,DIV_CODE,REFNUM,DOC_DATE,DOC_YEAR,DOC_TYPE,PO_CATG,WH_CODE,WH_CODE2,REMARKS) value ('$company_code','$po','$DOC_NO','$division','$v_no','$voucher_date','$year','TR','$purchase_mode','$from_loc','$to_loc','$narration')";
    $master_r = $conn->query($master_q);
    if($master_r){
      $entry_no=1;
      for($i=0;$i< count($_POST['order']); $i++){
        // $acc_desc =$acc_desc[$i];
        // $quantity =$quantity[$i];
        // $rate =$rate[$i];
        // $rate = str_replace( ',', '', $rate );
        // $amount =$amount[$i];
        // 
        
        // $total = str_replace( ',', '', $total );
        $order =$_POST['order'][$i];
        $quantity =$_POST['quantity'][$i];
        $rate =$_POST['rate'][$i];
        $rate = str_replace( ',', '', $rate );
        $amount =$_POST['amount'][$i];
        $amount = str_replace( ',', '', $amount );
        $batch_no =$_POST['batch_no'][$i];
        $expiry =$_POST['expiry'][$i];
        $detail_q = "insert into strtran_dtl(DIV_CODE,CO_CODE,DO_KEY_REF,DOC_NO,DOC_DATE,DOC_YEAR,DOC_TYPE,PO_CATG,ITEM_CODE,QTY,RATE,AMT,BATCH_NO,EXPIRY_DATE,ENTRY_NO)value 
        ('$division','$company_code','$po','$DOC_NO','$voucher_date','$year','TR','$purchase_mode','$order','$quantity','$rate','$amount','$batch_no','$expiry','$entry_no')"; 
        // print_r($detail_q);
        $detail_r = $conn->query($detail_q);
        $entry_no++;
        if($detail_r){
          $return_data = array(
              "status" => 1,
              // "voucher_no" => $voucher_no,
              "message" => "production voucher has been Inserted having Doc No:".$DOC_NO 
          );
        }else{
          $return_data = array(
          "status" => 0,
          "message" => "production voucher has not been Inserted"
          );
        }
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
    $from_loc=$_POST['from_loc'];
    $query = "SELECT a.item_descr,b.ITEM_CODE,b.LOC_CODE,b.BATCH_NO,b.EXPIRY_DATE FROM items a right join item_batch_no b on a.item_div=b.item_code and a.co_code=b.co_code  WHERE a.co_code='$company_code' and b.loc_code='$from_loc'";
      // PRINT_R($query);die();
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
    // $order_key=$_POST['order_key'];
    // print_r($order_key);die();
    // $item_code=$_POST['item_code'];
        $query = "SELECT a.*
        FROM items a
        LEFT JOIN div_allow b
        on a.item_code = b.DIV_CODE and b.PERMISSION = 'Y' ";
        //   PRINT_R($query);die();
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
      
      
          
}elseif(isset($_POST['action']) && $_POST['action'] == 'item_values'){
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
}elseif(isset($_POST['action']) && $_POST['action'] == 'batch'){
  // print_r("jfsksk");
  $item_code=$_POST['item_code'];
  $query = "SELECT * from item_batch_no where ITEM_CODE = '$item_code'";
    // PRINT_R($query); die();
  $select_r = $conn->query($query);
  $show = mysqli_fetch_assoc($select_r);
  $return_data=$show;
  }elseif(isset($_POST['action']) && $_POST['action'] == 'itemdivgen'){
  // print_r("jfsksk");
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



