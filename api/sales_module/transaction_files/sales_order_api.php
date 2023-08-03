<?php
session_start();
header("Content-Type: application/json");
include '../../auth/db.php';
if(isset($_POST['action']) && $_POST['action'] == 'view'){
  // print_r("jfsksk");
    $query = "SELECT * FROM order_mst ORDER BY doc_date desc,doc_no desc";
    // PRINT_R($query);
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
    // print_r($_POST); die();
    $company_code=$_POST['company_code'];
    $division=$_POST['division'];
    $party=$_POST['party'];
    $purchase_mode=$_POST['purchase_mode'];
    $salesman=$_POST['salesman'];
    $sale_code=$_POST['sale_code'];
    $doc_no=$_POST['doc_no'];
    $doc_date=$_POST['voucher_date'];
    $year=date('Y', strtotime($doc_date));
    $company_ref=$_POST['company_ref'];
    $party_ref=$_POST['party_ref'];
    $v_no=$_POST['v_no'];
    $cr_days=$_POST['cr_days'];
    $narration=$_POST['narration'];
    $master_q = "insert into order_mst(order_key,co_code,doc_year,doc_no,doc_date,po_catg,div_code,refnum,party_ref,refnum2,party_code,sman_code,remarks,crdays,doc_type,post)value ('$sale_code','$company_code','$year','$doc_no','$doc_date','$purchase_mode','$division','$company_ref','$party_ref','$v_no','$party','$salesman','$narration','$cr_days','OF','N')";
    
    $master_r = $conn->query($master_q);
    if($master_r){
        $entry_no=1;
        for($i=0;$i< count($_POST['acc_desc']); $i++){
            $acc_desc = $_POST['acc_desc'][$i];
            $detail = $_POST['detail'][$i];
            $type = $_POST['type'][$i]=='0'?'0':$_POST['type'][$i];
            $quantity = $_POST['quantity'][$i];
            $rate = $_POST['rate'][$i];
            $rates = str_replace( ',', '', $rate );
            if( is_numeric( $rates ) ) {
              $rate = $rates;
            }
            $amount = $_POST['amount'][$i];
            // $amount=intval(preg_replace('/[^\d.]/', '', $amount));
            $amounts = str_replace( ',', '', $amount );
            if( is_numeric( $amounts ) ) {
              $amount = $amounts;
            }
            $detail_q = "insert into order_dtl(entry_no,doc_type,refnum,po_catg,order_key,div_code,co_code,doc_year,doc_no,doc_date,item_code,item_type,qty,rate,amt,net_amt)value 
            ('$entry_no','OF','$company_ref','$purchase_mode','$sale_code','$division','$company_code','$year','$doc_no','$doc_date','$acc_desc','$type',
            '$quantity','$rate','$amount','$amount')"; 
            // print_r($detail_q);
            $entry_no++;
            $detail_r = $conn->query($detail_q);
            if($detail_r){
              $return_data = array(
                  "status" => 1,
                  // "doc_no" => $doc_no,
                  "message" => "Sale Order has been Inserted having doc No:".$doc_no 
              );
            }else{
              $return_data = array(
              "status" => 0,
              "message" => "Sale Order has not been Inserted"
              );
          }
        }
        // die();
      
    }
    
}elseif(isset($_POST['action']) && $_POST['action'] == 'update'){
  // print_r($_POST); die();
  $company_code=$_POST['company_code'];
  $division=$_POST['division'];
  $party=$_POST['party'];
  $purchase_mode=$_POST['purchase_mode'];
  $salesman=$_POST['salesman'];
  $sale_code=$_POST['sale_code'];
  $doc_no=$_POST['doc_no'];
  $doc_date=$_POST['voucher_date'];
  $year=date('Y', strtotime($doc_date));
  $company_ref=$_POST['company_ref'];
  $party_ref=$_POST['party_ref'];
  $v_no=$_POST['v_no'];
  $narration=$_POST['narration'];
  $cr_days=$_POST['cr_days'];
  $upd_mst_q="UPDATE order_mst SET doc_date='$doc_date', doc_year='$year' , refnum='$company_ref',
              remarks='$narration',party_ref='$party_ref' ,refnum2='$v_no', crdays='$cr_days'
              WHERE co_code = '$company_code' AND div_code = '$division' AND order_key='$sale_code'
              AND po_catg='$purchase_mode' AND doc_no='$doc_no'";
  // print_r($upd_mst_q); die();
  $upd_mst_r = $conn->query($upd_mst_q);
  if($upd_mst_r){
    $del_dtl_q="DELETE FROM order_dtl  WHERE co_code = '$company_code' AND div_code = '$division' 
                AND order_key='$sale_code'AND po_catg='$purchase_mode' AND doc_no='$doc_no'";
    // print_r($del_dtl_q); die();
    $del_dtl_r = $conn->query($del_dtl_q);
    if($del_dtl_r){
      $entry_no=1;
      for($i=0;$i< count($_POST['acc_desc']); $i++){
          $acc_desc = $_POST['acc_desc'][$i];
          $detail = $_POST['detail'][$i];
          $type = $_POST['type'][$i]=='0'?'0':$_POST['type'][$i];
          $quantity = $_POST['quantity'][$i];
          $rate = $_POST['rate'][$i];
          $rates = str_replace( ',', '', $rate );
          if( is_numeric( $rates ) ) {
            $rate = $rates;
          }
          $amount = $_POST['amount'][$i];
          // $amount=intval(preg_replace('/[^\d.]/', '', $amount));
          $amounts = str_replace( ',', '', $amount );
          if( is_numeric( $amounts ) ) {
            $amount = $amounts;
          }
          $detail_q = "insert into order_dtl(entry_no,doc_type,po_catg,order_key,div_code,co_code,doc_year,doc_no,doc_date,item_code,item_type,qty,rate,amt,refnum,net_amt)
          value ('$entry_no','OF','$purchase_mode','$sale_code','$division','$company_code','$year','$doc_no','$doc_date','$acc_desc','$type','$quantity','$rate',
          '$amount','$company_ref','$amount')"; 
          $entry_no++;
          // print_r($detail_q);
          $detail_r = $conn->query($detail_q);
          if($detail_r){
            $return_data = array(
                "status" => 1,
                // "doc_no" => $doc_no,
                "message" => "Sale Order has been Updated having doc No:".$doc_no 
            );
          }else{
            $return_data = array(
            "status" => 0,
            "message" => "Sale Order has not been Updated"
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
    $query = "SELECT A.*,B.co_name,C.div_name,D.party_name,E.sman_name FROM order_mst A
    LEFT JOIN company B ON A.co_code=B.co_code LEFT JOIN division C ON C.div_code=A.div_code
    LEFT JOIN party D ON A.party_code= D.party_code LEFT JOIN salesman E ON A.sman_code= E.sman_code 
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
    $query = "SELECT * FROM order_dtl WHERE co_code='$co_code' AND div_code='$div_code' 
    AND doc_no='$doc_no' AND po_catg='$po_catg' ";
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
    $query = "SELECT a.party_div,a.party_name,b.div_name,c.zone_name,d.city_name FROM party a
    INNER JOIN division b on a.div_code=b.div_code
    INNER JOIN zone c on a.zone_code =c.zone_code 
    INNER JOIN city d on a.city_code=d.city_code WHERE a.co_code='$company_code'";
    // print_r($query);die();
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
    // print_r($return_data); die();
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
}elseif(isset($_POST['action']) && $_POST['action'] == 'party_detail'){
  // print_r($_POST); die();
  $party_code=$_POST['party_code'];
  $query = "SELECT a.*,b.div_name,c.city_name,e.zone_name,f.sman_name from party a 
            inner join division b on a.div_code=b.div_code
            inner join city c on a.city_code=c.city_code  
            left join zone e on e.zone_code=a.zone_code
            left join salesman f on f.sman_code=a.salesman_code
            WHERE a.party_div = '$party_code'";
  // PRINT_R($query); die();
  $select_r = $conn->query($query);
  $show = mysqli_fetch_assoc($select_r);
  $return_data=$show;
}elseif(isset($_POST['action']) && $_POST['action'] == 'item_detail'){
  // print_r($_POST); die();
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
}elseif(isset($_POST['action']) && $_POST['action'] == 'item_code'){
  // print_r("jfsksk");
  $company_code=$_POST['company_code'];
  $query = "SELECT * FROM items  WHERE co_code='$company_code'";
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



