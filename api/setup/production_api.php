<?php
session_start();
header("Content-Type: application/json");
include '../auth/db.php';
// print_r($_POST);die();
if(isset($_POST['action']) && $_POST['action'] == 'view'){
// print_r("jfsksk");
$query ="SELECT * 
FROM strtran_mst
where DOC_TYPE = 'PR'";
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
  $voucher_date=$_POST['voucher_date'];
  $company_code=$_POST['company_code'];
  $purchase_mode=$_POST['purchase_mode'];
  // $division=$_POST['division'];
  $do_key=$_POST['do_key'];

  $year=$_POST['year'];
  $from_loc=$_POST['from_loc'];
  $to_loc=$_POST['to_loc'];
  $v_no=$_POST['v_no'];
  $narration=$_POST['narration'];
  $po = $company_code.'-1-'. $purchase_mode.'-'.$DOC_NO;
  $DIV_CODES = '1';

  $select_1="SELECT qty FROM strtran_dtl   WHERE CO_CODE = '$company_code' AND DOC_NO = '$DOC_NO' 
  AND DOC_YEAR='$year' AND DOC_TYPE='PR' and DO_KEY_REF='$do_key' order by entry_no asc";
  // print_r($select_1);die();
  $select_r_1 = $conn->query($select_1);
  $return_datas=[];
  while($show_1 = mysqli_fetch_assoc($select_r_1)){
      $return_datas[] = $show_1;
  }
  for($i=0;$i< count($_POST['order']); $i++){
    $pre_qty=$return_datas[$i]['qty'];
    $order =$_POST['order'][$i];
    $quantity =$_POST['quantity'][$i];
  
    $batch_no =$_POST['batch_no'][$i];
    $expiry =$_POST['expiry'][$i];
    $from_loc =$_POST['from_loc'][$i];
    $to_loc =$_POST['to_loc'][$i];
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
    $upd_mst_q="UPDATE strtran_mst SET REFNUM='$v_no', PO_CATG='$purchase_mode' ,DEPT_CODE='$from_loc', WH_CODE='$to_loc', REMARKS='$narration',DOC_DATE='$voucher_date' WHERE CO_CODE = '$company_code' AND DOC_NO = '$DOC_NO' AND DOC_YEAR='$year' AND DOC_TYPE='PR'";
    // print_r()

    $upd_mst_r = $conn->query($upd_mst_q);
    if($upd_mst_r){
      $del_dtl_q="DELETE FROM strtran_dtl   WHERE CO_CODE = '$company_code' AND DOC_NO = '$DOC_NO' AND DOC_YEAR='$year' AND DOC_TYPE='PR'";

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
            
            
            $detail_q = "insert into strtran_dtl(ENTRY_NO,DO_KEY_REF,DIV_CODE,CO_CODE,PO_NO,DOC_NO,DOC_DATE,DOC_YEAR,DOC_TYPE,PO_CATG,ITEM_CODE,QTY,RATE,AMT,BATCH_NO,EXPIRY_DATE)value ('$entry_no','$po','$DIV_CODES','$company_code','$po','$DOC_NO','$voucher_date','$year','PR','$purchase_mode','$order','$quantity','$rate','$amount','$batch_no','$expiry')"; 
            $entry_no++;
            // print_r($detail_q);
              $detail_r = $conn->query($detail_q);
              if($detail_r){
                  $return_data = array(
                      "status" => 1,
                      // "voucher_no" => $voucher_no,
                      "message" => "PRODUCTION has been UPDATED having Doc No:".$DOC_NO 
                  );
              }else{
                  $return_data = array(
                  "status" => 0,
                  "message" => "PRODUCTION has not been UPDATED"
                  );
              }
          
      
            
        }
      }
    } 
  }

}elseif(isset($_POST['action']) && $_POST['action'] == 'mst_data'){
  $CO_CODE=$_POST['CO_CODE'];
  $DOC_NO=$_POST['DOC_NO'];
  $DOC_TYPE=$_POST['DOC_TYPE'];
  // $DOC_DATE=$_POST['DOC_DATE'];
  $DOC_YEAR=$_POST['DOC_YEAR'];
  $PO_CATG=$_POST['PO_CATG'];
    // print_r($DOC_TYPE);
    // die();
  $query = "SELECT a.* , b.co_name AS company_name,c.dept_name AS dept_name,d.loc_name AS location_name
  FROM strtran_mst a
  LEFT JOIN company b
  ON a.CO_CODE = b.co_code
  LEFT JOIN dept_store c
  ON a.DEPT_CODE = c.dept_code
  LEFT JOIN location d
  ON a.WH_CODE = d.loc_code
  WHERE a.CO_CODE ='$CO_CODE' AND a.DOC_NO ='$DOC_NO' AND a.DOC_TYPE ='PR' AND a.DOC_YEAR='$DOC_YEAR' AND a.PO_CATG ='$PO_CATG' ";
  // print_r($query);die();
  $result = $conn->query($query);
  //   $count = mysqli_num_rows($result);
  $show = mysqli_fetch_assoc($result);
  $return_data = $show;

}elseif(isset($_POST['action']) && $_POST['action'] == 'calculations2'){
  // print_r($_POST);DIE();
  $company_code = $_POST['company_code'];
  // $DOC_DATE = $_POST['DOC_DATE'];
  $DOC_YEAR = $_POST['DOC_YEAR'];
  $DOC_TYPE = $_POST['DOC_TYPE'];
  $DOC_NO = $_POST['DOC_NO'];
  $query = "SELECT *
  FROM strtran_dtl 
  
  WHERE  CO_CODE           = '$company_code'
  and    DOC_TYPE          = 'PR'
  and   DOC_YEAR          = '$DOC_YEAR'
  and    DOC_NO            = '$DOC_NO'";
    // PRINT_R($query);die();
  $result = $conn->query($query);
  // $count = mysqli_num_rows($result);
  
  
  while($show = mysqli_fetch_assoc($result)){
  $return_data[] = $show;
  }
  
}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
  // print_r($_POST);die();
  // print_r($_POST);DIE(); 
  $voucher_date=$_POST['voucher_date'];
  $company_code=$_POST['company_code'];
  $purchase_mode=$_POST['purchase_mode'];
  $year=$_POST['year'];
  $from_loc=$_POST['from_loc'];
  // print_r("fdfd");
  // print_r($from_loc);die();
  $to_loc=$_POST['to_loc'];
  $v_no=$_POST['v_no'];
  $narration=$_POST['narration'];
    $DIV_CODES = '1';
  
  //     $division_i=$_POST['division_i'];
  //     $gen_i=$_POST['gen_i'];
  //     $um_i=$_POST['um_i'];
  //     $total=$_POST['total'];
  //     $total = str_replace( ',', '', $total );
  //     $narration=$_POST['narration'];
  $select_q="SELECT (case when MAX(DOC_NO) is null then 1 else MAX(DOC_NO)+1 end) DOC_NO 
  FROM  strtran_mst  WHERE CO_CODE = '$company_code'AND PO_CATG = '$purchase_mode' AND DOC_TYPE = 'PR' AND DOC_YEAR='$year' ";
  
  // print_r($select_q);die();
  $select_r = $conn->query($select_q);
  $show = mysqli_fetch_assoc($select_r);
  $DOC_NO=$show['DOC_NO'];
  $po = $company_code.'-1-'. $purchase_mode.'-'.$DOC_NO;
    // print_r($po);die();
  
    for($i=0;$i< count($_POST['order']); $i++){
      $order =$_POST['order'][$i];
      $quantity =$_POST['quantity'][$i];
     
      $batch_no =$_POST['batch_no'][$i];
      $expiry =$_POST['expiry'][$i];
      // $from_loc =$_POST['from_loc'][$i];
      // $to_loc =$_POST['to_loc'][$i];
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
      // print_r($DOC_NO);die();
      //   $ORDER_KEY = $company_code .'-'. $div_code.'-'. $po_cat.'-' . $DOC_NO;
      // //   print_r($BILL_KEY);
      $master_q = "insert into strtran_mst(DO_KEY,DIV_CODE,CO_CODE,PO_NO,DOC_NO,REFNUM,DOC_DATE,DOC_YEAR,DOC_TYPE,PO_CATG,DEPT_CODE,WH_CODE,REMARKS) value ('$po','$DIV_CODES','$company_code','$po','$DOC_NO','$v_no','$voucher_date','$year','PR','$purchase_mode','$from_loc','$to_loc','$narration')";
      $master_r = $conn->query($master_q);
      if($master_r){
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
          
          
          $detail_q = "insert into strtran_dtl(ENTRY_NO,DO_KEY_REF,DIV_CODE,CO_CODE,PO_NO,DOC_NO,DOC_DATE,DOC_YEAR,DOC_TYPE,PO_CATG,ITEM_CODE,QTY,RATE,AMT,BATCH_NO,EXPIRY_DATE,LOC_CODE)
          value
           ('$entry_no','$po','$DIV_CODES','$company_code','$po','$DOC_NO','$voucher_date','$year','PR','$purchase_mode','$order','$quantity','$rate','$amount','$batch_no','$expiry','$to_loc')"; 
          $entry_no++;
          // print_r($detail_q);
          $detail_r = $conn->query($detail_q);
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



}elseif(isset($_POST['action']) && $_POST['action'] == 'dept'){
// print_r("jfsksk");
// print_r($order_key);die();
// $item_code=$_POST['item_code'];
$query = "SELECT * from dept_store";
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
//   PRINT_R($query); die();
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



