<?php
session_start();
header("Content-Type: application/json");
include '../auth/db.php';
if(isset($_POST['action']) && $_POST['action'] == 'view'){
  // print_r("jfsksk");
    $query ="SELECT * FROM rq_mst_um";
  //   PRINT_R($query);
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
    $order_key=$_POST['order_key'];
    $voucher_date=$_POST['voucher_date'];
    $voucher_year=$_POST['voucher_year'];
    $company_code=$_POST['company_code'];
    $po_cat=$_POST['po_cat'];
    $dept_ref=$_POST['dept_ref'];
    $dept_code=$_POST['dept_code'];
    $div_code=$_POST['div_code'];
    $narration =$_POST['narration'];
   $upd_mst_q="UPDATE rq_mst_um SET REMARKS='$narration', REFNUM='$dept_ref' , PO_CATG='$po_cat', DOC_DATE='$voucher_date'
    WHERE CO_CODE = '$company_code' AND DOC_NO = '$doc_no' AND DOC_YEAR='$voucher_year' AND ORDER_KEY='$order_key'";
    $upd_mst_r = $conn->query($upd_mst_q);
    if($upd_mst_r){
        $del_dtl_q="DELETE FROM rq_dtl_um   WHERE CO_CODE = '$company_code' AND DOC_NO = '$doc_no' AND DOC_YEAR='$voucher_year' AND ORDER_KEY='$order_key'";
      
        $del_dtl_r = $conn->query($del_dtl_q);
        if($del_dtl_r){
            for($i=0;$i< count($_POST['acc_desc']); $i++){
                $acc_desc =$_POST['acc_desc'][$i];
                $quantity =$_POST['quantity'][$i];
                $rate =$_POST['rate'][$i];
                $rate = str_replace( ',', '', $rate );
                $amount =$_POST['amount'][$i];
                $amount = str_replace( ',', '', $amount );
               
                
                $detail_q = "insert into rq_dtl_um(CO_CODE,DOC_NO,DOC_DATE,DOC_YEAR,DOC_TYPE,ITEM_CODE,QTY,RATE,AMT,ORDER_KEY)value ('$company_code','$doc_no','$voucher_date','$voucher_year','RQ','$acc_desc','$quantity','$rate','$amount','$order_key')"; 
                $detail_r = $conn->query($detail_q);
                if($detail_r){
                    $return_data = array(
                        "status" => 1,
                        // "voucher_no" => $voucher_no,
                        "message" => "Bill has been Inserted having Doc No:".$doc_no 
                    );
                }else{
                    $return_data = array(
                    "status" => 0,
                    "message" => "Bill has not been Inserted"
                    );
                }
            
        
              
            }
        }
    } 

  }elseif(isset($_POST['action']) && $_POST['action'] == 'mst_data'){
    // print_r($_POST);die();
        $CO_CODE=$_POST['CO_CODE'];
        $DOC_NO=$_POST['DOC_NO'];
        $DOC_TYPE=$_POST['DOC_TYPE'];
        $DOC_DATE=$_POST['DOC_DATE'];
        $DOC_YEAR=$_POST['DOC_YEAR'];
        $PO_CATG=$_POST['PO_CATG'];
   
  
      $query = "SELECT a.* , b.co_name AS company_name,c.dept_name AS dept_name,d.div_name AS division
      FROM rq_mst_um a
      LEFT JOIN company b
      ON a.CO_CODE = b.co_code
      LEFT JOIN dept_store c
      ON a.DEPT_CODE = c.dept_code
      LEFT JOIN division d
      ON a.DIV_CODE = d.div_code
        WHERE a.CO_CODE ='$CO_CODE' AND a.DOC_NO ='$DOC_NO' AND a.DOC_TYPE ='$DOC_TYPE' AND a.DOC_YEAR='$DOC_YEAR' AND a.PO_CATG ='$PO_CATG' ";
      // PRINT_R($query);DIE();
    // "SELECT a.* , b.* ,c.*
    // FROM strtran_dtl a
    // INNER JOIN strtran_mst b
    // ON a.CO_CODE           = b.CO_CODE
    // and    a.DOC_TYPE          = b.DOC_TYPE
    // and    a.DOC_YEAR          = b.DOC_YEAR
    // and    a.DOC_NO            = b.DOC_NO
    // and    a.PO_NO         = b.PO_NO
    // inner join items c
    // on a.ITEM_CODE  = c.item_code
    // where a.CO_CODE = '$co_code'
    // and    a.DOC_YEAR = '$doc_year'
    // and    a.DOC_TYPE = '$doc_type'
    // and    a.DOC_NO = '$doc_no'";
      $result = $conn->query($query);
    //   $count = mysqli_num_rows($result);
      $show = mysqli_fetch_assoc($result);
      $return_data = $show;
  }elseif(isset($_POST['action']) && $_POST['action'] == 'calculations2'){
    // print_r($_POST);DIE();
    $company_code = $_POST['company_code'];
    $DOC_DATE = $_POST['DOC_DATE'];
    $DOC_YEAR = $_POST['DOC_YEAR'];
    $DOC_TYPE = $_POST['DOC_TYPE'];
    $DOC_NO = $_POST['DOC_NO'];
    $ORDER_KEY = $_POST['ORDER_KEY'];
    $query = "SELECT a.* , b.item_descr AS ITEM_DESCR , c.div_name AS div_name , d.gen_name AS gen_name , e.unit_name AS unit_name 
    FROM rq_dtl_um a
    LEFT JOIN items b
    ON a.ITEM_CODE = b.item_div and a.CO_CODE=b.co_code
    LEFT JOIN division c
    ON b.div_code = c.div_code 
    LEFT JOIN gen_name d
    ON b.gen_code = d.gen_code
    LEFT JOIN unit	e
    ON b.um_code = e.unit_code 
    WHERE  a.CO_CODE           = '$company_code'
    and    a.DOC_TYPE          = '$DOC_TYPE'
    and    a.DOC_YEAR          = '$DOC_YEAR'
    and    a.DOC_NO            = '$DOC_NO'
    and   a.ORDER_KEY         = '$ORDER_KEY'";
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
    $voucher_year=$_POST['voucher_year'];
    $company_code=$_POST['company_code'];
    $po_cat=$_POST['po_cat'];
    $dept_ref=$_POST['dept_ref'];
    $dept_code=$_POST['dept_code'];
    $div_code=$_POST['div_code'];
    $narration=$_POST['narration'];
    $acc_desc=$_POST['acc_desc'];
    $detail=$_POST['detail'];
    $quantity=$_POST['quantity'];
    $quantity = str_replace( ',', '', $quantity );
    $rate=$_POST['rate'];
    $rate = str_replace( ',', '', $rate );
    $amount=$_POST['amount'];
    $amount = str_replace( ',', '', $amount );
   
    $division_i=$_POST['division_i'];
    $gen_i=$_POST['gen_i'];
    $um_i=$_POST['um_i'];
    $total=$_POST['total'];
    $total = str_replace( ',', '', $total );
    $narration=$_POST['narration'];
    $select_q="SELECT (case when MAX(DOC_NO) is null then 1 else MAX(DOC_NO)+1 end) DOC_NO 
    FROM  rq_mst_um  WHERE CO_CODE = '$company_code' AND DOC_YEAR = '$voucher_year' AND PO_CATG = '$po_cat'";
    
  $select_r = $conn->query($select_q);
  $show = mysqli_fetch_assoc($select_r);
  $DOC_NO=$show['DOC_NO'];
  $ORDER_KEY = $company_code .'-'. $div_code.'-'. $po_cat.'-' . $DOC_NO;
//   print_r($BILL_KEY);
$master_q = "insert into rq_mst_um(CO_CODE,DOC_NO,DOC_DATE,DOC_YEAR,DOC_TYPE,PO_CATG,DIV_CODE,DEPT_CODE,REFNUM,REMARKS,POST,ORDER_KEY) value ('$company_code','$DOC_NO','$voucher_date','$voucher_year','RQ','$po_cat','$div_code','$dept_code','$dept_ref','$narration','N','$ORDER_KEY')";
$master_r = $conn->query($master_q);
if($master_r){
      for($i=0;$i< count($_POST['acc_desc']); $i++){
              
                // $acc_desc =$acc_desc[$i];
                // $quantity =$quantity[$i];
                // $rate =$rate[$i];
                // $rate = str_replace( ',', '', $rate );
                // $amount =$amount[$i];
                // $amount = str_replace( ',', '', $amount );

                // $total = str_replace( ',', '', $total );
                $acc_desc =$_POST['acc_desc'][$i];
                $quantity =$_POST['quantity'][$i];
                $rate =$_POST['rate'][$i];
                $rate = str_replace( ',', '', $rate );
                $amount =$_POST['amount'][$i];
                $amount = str_replace( ',', '', $amount );
               
                
                $detail_q = "insert into rq_dtl_um(CO_CODE,DOC_NO,DOC_DATE,DOC_YEAR,DOC_TYPE,ITEM_CODE,QTY,RATE,AMT,ORDER_KEY)value ('$company_code','$DOC_NO','$voucher_date','$voucher_year','RQ','$acc_desc','$quantity','$rate','$amount','$ORDER_KEY')"; 
                // print_r($detail_q);
                $detail_r = $conn->query($detail_q);
                if($detail_r){
                    $return_data = array(
                        "status" => 1,
                        // "voucher_no" => $voucher_no,
                        "message" => "Bill has been Inserted having Doc No:".$DOC_NO 
                    );
                  }else{
                    $return_data = array(
                    "status" => 0,
                    "message" => "Bill has not been Inserted"
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
    // $item_code=$_POST['item_code'];
        $query = "SELECT a.ITEM_CODE, b.item_descr
        FROM rq_dtl_um a
        LEFT JOIN items b
        on a.ITEM_CODE = b.item_div
        where ORDER_KEY = '$order_key'";
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



