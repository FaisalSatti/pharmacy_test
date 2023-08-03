<?php
session_start();
include("../../auth/db.php");
header("Content-Type: application/json");
if(isset($_POST['action']) && $_POST['action'] == 'view'){
  // print_r("jfsksk");
    $query ="SELECT * FROM bill_mst_um";
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
    // PRINT_R($query);DIE();
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    $return_data = $show;
}elseif(isset($_POST['action']) && $_POST['action'] == 'company_name'){
    // print_r($_POST);die();
        $CO_CODE=$_POST['CO_CODE'];
   
  
      $query = "SELECT * FROM company WHERE co_code ='$CO_CODE'";
      // PRINT_R($query);DIE();
      $result = $conn->query($query);
    //   $count = mysqli_num_rows($result);
      $show = mysqli_fetch_assoc($result);
      $return_data = $show;
  }elseif(isset($_POST['action']) && $_POST['action'] == 'mst_data'){
    // print_r($_POST);die();
        $CO_CODE=$_POST['CO_CODE'];
        $DOC_NO=$_POST['DOC_NO'];
        $DOC_TYPE=$_POST['DOC_TYPE'];
        $DOC_DATE=$_POST['DOC_DATE'];
        $DOC_YEAR=$_POST['DOC_YEAR'];
        $PO_CATG=$_POST['PO_CATG'];
   
  
      $query = "SELECT a.* , b.dept_name AS DEPT1NAME, c.dept_name AS DEPT2NAME, d.dept_name AS DEPT3NAME,e.descr AS charge_name,f.descr AS frt_name,g.descr AS disc_name,h.*,i.co_name AS company_name
      FROM bill_mst_um a
      LEFT JOIN dept_store b
      ON a.CHARGE_DPT = b.dept_code
      LEFT JOIN dept_store c
      ON a.CHARGE_DPT = c.dept_code
      LEFT JOIN dept_store d
      ON a.CHARGE_DPT = d.dept_code
      LEFT JOIN act_chart e
      ON a.CHARGE_CODE = e.account_code
      LEFT JOIN act_chart f
      ON a.FRT_CODE = f.account_code
      LEFT JOIN act_chart g
      ON a.DISC_CODE = g.account_code
      LEFT JOIN supp h
      ON a.PARTY_CODE = h.supp_div
      LEFT JOIN company i
      ON a.CO_CODE = i.co_code
      WHERE a.CO_CODE ='$CO_CODE' AND a.DOC_NO ='$DOC_NO' AND a.DOC_TYPE ='$DOC_TYPE' AND a.DOC_YEAR='$DOC_YEAR' AND a.PO_CATG ='$PO_CATG' ";
      // print_r($query);die();
      $result = $conn->query($query);
      $show = mysqli_fetch_assoc($result);
      $return_data = $show;
  }else if(isset($_POST['action']) && $_POST['action'] == 'update'){
    // PRINT_R($_POST);die();
   $doc_no=$_POST['doc_no'];
    $voucher_date=$_POST['voucher_date'];
    $Year=$_POST['Year'];
    $DOC_YEAR=$_POST['Year'];
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
    $orderno =$_POST['orderno']==null?'':$_POST['orderno'];
    $grnno =$_POST['grnno'];
    $item_code =$_POST['item_code'];
    $item_name =$_POST['item_name'];
    $product =$_POST['product'];
    $item_dtl =$_POST['item_dtl'];
    $quantity =$_POST['quantity'];
    $rate =$_POST['rate'];
    $amt =$_POST['amt'];
    $billed =$_POST['billed'];
    $lot_code =$_POST['lot_code'];
    $lot_name =$_POST['lot_name'];
    $stax_rate1 =$_POST['stax_rate1'];
    $stax_amt1 =$_POST['stax_amt1'];
    $add_tax =$_POST['add_tax'];
    $add_tax_name =$_POST['add_tax_name'];
    $stax_rate2 =$_POST['stax_rate2'];
    $stax_amt2 =$_POST['stax_amt2'];
    $charge_code=$_POST['charge_code']==null?'':$_POST['charge_code'];
    // print_r($charge_code);
    $charge_name =$_POST['charge_name'];
    $dept1=$_POST['dept1']==null?'':$_POST['dept1'];
    $dept_amt1 =$_POST['dept_amt1'];
    $add1 =$_POST['add1'];
    $add1 = str_replace( ',', '', $add1 );
    $frt_code=$_POST['frt_code']==null?'':$_POST['frt_code'];
    $frt_name =$_POST['frt_name'];
    $dept2=$_POST['dept2']==null?'':$_POST['dept2'];
    $dept_amt2 =$_POST['dept_amt2'];
    $less1 =$_POST['less1'];
    $less1 = str_replace( ',', '', $less1 );
    $disc_code=$_POST['disc_code']==null?'':$_POST['disc_code'];
    $disc_name =$_POST['disc_name'];
    $dept3=$_POST['dept3']==null?'':$_POST['dept3'];
    $dept_amt3 =$_POST['dept_amt3'];
    $less2 =$_POST['less2'];
    $less2 = str_replace( ',', '', $less2 );
    $total2 =$_POST['total2'];
    $total2 = str_replace( ',', '', $total2 );
    $total =$_POST['total'];
    $total = str_replace( ',', '', $total );
    $BILL_KEY = $company_code . '-99-L-' . $doc_no;
    $upd_mst_q="UPDATE bill_mst_um SET CO_CODE='$company_code', DOC_NO='$doc_no' , DOC_TYPE='LB',
              DOC_YEAR='$Year',PO_CATG='L' ,DIV_CODE='99',BILL_KEY='$BILL_KEY',PO_NO='$po',DOC_DATE='$voucher_date',ORDER_REFNUM='$OrderRef',ORDER_PARTY_REF='$PartyRef',PARTY_CODE='$party',REMARKS='$narration',POST='N',STAX_CODE='$lot_code',STAX_RATE='$stax_rate1',STAX_AMT='$stax_amt1',ADDTAX_CODE='$add_tax',ADDTAX_RATE='$stax_rate2',ADDTAX_AMT='$stax_amt2',CHARGE_CODE='$charge_code',CHARGE_AMT='$add1',CHARGE_DPT='$dept1',FRT_CODE='$frt_code',FRT_DPT='$dept2',OTHER_CHRGS='$less1',DISC_CODE='$disc_code',DISC_DPT='$dept3',OTHER_DED='$less2',TOTAL_NET_AMT='$total2',PO_DATE='$po_date'
              WHERE CO_CODE = '$company_code' AND DOC_NO = '$doc_no' AND DOC_YEAR='$DOC_YEAR' AND BILL_KEY='$BILL_KEY'";
  // print_r($upd_mst_q);DIE();  
  $upd_mst_r = $conn->query($upd_mst_q);
  if($upd_mst_r){
    $del_dtl_q="DELETE FROM bill_dtl_um   WHERE CO_CODE = '$company_code' AND DOC_NO = '$doc_no' AND DOC_YEAR='$DOC_YEAR' AND BILL_KEY='$BILL_KEY'";
    $del_dtl_r = $conn->query($del_dtl_q);
    if($del_dtl_r){
      for($i=0;$i< count($_POST['orderno']); $i++){
        $orderno =$_POST['orderno'][$i];
        $grnno =$_POST['grnno'][$i];
        $item_code =$_POST['item_code'][$i];
        $item_name =$_POST['item_name'][$i];
        $product =$_POST['product'][$i];
        $item_dtl =$_POST['item_dtl'][$i];
        $quantity =$_POST['quantity'][$i];
        $rate =$_POST['rate'][$i];
        
    $rate = str_replace( ',', '', $rate );
    $amt =$_POST['amt'][$i];
    $amt = str_replace( ',', '', $amt );
        $billed =$_POST['billed'][$i];
        $total =$_POST['total'];
        $detail_q = "insert into bill_dtl_um(DIV_CODE,DOC_YEAR,DOC_TYPE,DOC_NO,DOC_DATE,CO_CODE,BILL_KEY,PO_NO,GRN_KEY,ITEM_CODE,PRODUCT_CODE,ITEM_DETAIL,QTY,RATE,AMT,
        BILLED,PO_CATG)value ('99','$DOC_YEAR','LB','$doc_no','$voucher_date','$company_code','$BILL_KEY','$orderno','$grnno','$item_code','$product','$item_dtl','$quantity','$rate','$amt','$billed','L')"; 
        // print_r($detail_q);
        $detail_r = $conn->query($detail_q);
        if($detail_r){
            $return_data = array(
                "status" => 1,
                // "voucher_no" => $voucher_no,
                "message" => "Bill has been updated having Doc No:".$doc_no 
            );
          }else{
            $return_data = array(
            "status" => 0,
            "message" => "Bill has not been updated"
            );
          }

      }

    }
    // 
  }else{
  $return_data = array(
  "status" => 0,
  "message" => "Bill has not been updated"
  );
}
  $upd_mst_r = $conn->query($upd_mst_q);
  // $master_q = "insert into bill_mst_um(DOC_TYPE,DOC_NO,DOC_DATE,DOC_YEAR,CO_CODE,PO_NO,PO_DATE,ORDER_REFNUM,ORDER_PARTY_REF,PARTY_CODE,REMARKS,STAX_CODE,STAX_RATE,STAX_AMT,ADDTAX_CODE,ADDTAX_RATE,ADDTAX_AMT,CHARGE_CODE,CHARGE_DPT,CHARGE_AMT,FRT_CODE,FRT_DPT,OTHER_CHRGS,DISC_CODE,DISC_DPT,OTHER_DED,TOTAL_NET_AMT,DIV_CODE,PO_CATG,BILL_KEY,POST)

}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
    // $doc_no=$_POST['doc_no'];
    
    // $doc_no=$_POST['doc_no']==null?'':$_POST['doc_no'];
    $voucher_date=$_POST['voucher_date'];
    $Year=$_POST['Year'];
    $DOC_YEAR=$_POST['Year'];
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
    $orderno =$_POST['orderno']==null?'':$_POST['orderno'];
    $grnno =$_POST['grnno'];
    $item_code =$_POST['item_code'];
    $item_name =$_POST['item_name'];
    $product =$_POST['product'];
    $item_dtl =$_POST['item_dtl'];
    $quantity =$_POST['quantity'];
    $rate =$_POST['rate'];
    $amt =$_POST['amt'];
    $billed =$_POST['billed'];
    $lot_code =$_POST['lot_code'];
    $lot_name =$_POST['lot_name'];
    $stax_rate1 =$_POST['stax_rate1'];
    $stax_amt1 =$_POST['stax_amt1'];
    $add_tax =$_POST['add_tax'];
    $add_tax_name =$_POST['add_tax_name'];
    $stax_rate2 =$_POST['stax_rate2'];
    $stax_amt2 =$_POST['stax_amt2'];
    $charge_code=$_POST['charge_code']==null?'':$_POST['charge_code'];
    
    
    // print_r($charge_code);
    $charge_name =$_POST['charge_name'];
    $dept1=$_POST['dept1']==null?'':$_POST['dept1'];
    $dept_amt1 =$_POST['dept_amt1'];
    $add1 =$_POST['add1'];
    $add1 = str_replace( ',', '', $add1 );
    $frt_code=$_POST['frt_code']==null?'':$_POST['frt_code'];
    $frt_name =$_POST['frt_name'];
    $dept2=$_POST['dept2']==null?'':$_POST['dept2'];
    $dept_amt2 =$_POST['dept_amt2'];
    $less1 =$_POST['less1'];
    $less1 = str_replace( ',', '', $less1 );
    $disc_code=$_POST['disc_code']==null?'':$_POST['disc_code'];
    $disc_name =$_POST['disc_name'];
    $dept3=$_POST['dept3']==null?'':$_POST['dept3'];
    $dept_amt3 =$_POST['dept_amt3'];
    $less2 =$_POST['less2'];
    $less2 = str_replace( ',', '', $less2 );
    $total2 =$_POST['total2'];
    $total2 = str_replace( ',', '', $total2 );
    $total =$_POST['total'];
    $total = str_replace( ',', '', $total );
    
    $select_q="SELECT (case when MAX(DOC_NO) is null then 1 else MAX(DOC_NO)+1 end) DOC_NO 
              FROM  bill_mst_um  WHERE CO_CODE = '$company_code' AND DOC_YEAR = '$Year' AND DOC_TYPE = 'LB'";
    // print_r($select_q);DIE();
  $select_r = $conn->query($select_q);
  $show = mysqli_fetch_assoc($select_r);
  $DOC_NO=$show['DOC_NO'];
  $BILL_KEY = $company_code . '-99-L-' . $DOC_NO;
  $master_q = "insert into bill_mst_um(DOC_TYPE,REFNUM,DOC_NO,DOC_DATE,DOC_YEAR,CO_CODE,PO_NO,PO_DATE,ORDER_REFNUM,ORDER_PARTY_REF,
  PARTY_CODE,REMARKS,STAX_CODE,STAX_RATE,STAX_AMT,ADDTAX_CODE,ADDTAX_RATE,ADDTAX_AMT,CHARGE_CODE,CHARGE_DPT,CHARGE_AMT,FRT_CODE,
  FRT_DPT,OTHER_CHRGS,DISC_CODE,DISC_DPT,OTHER_DED,TOTAL_NET_AMT,DIV_CODE,PO_CATG,BILL_KEY,POST)
   value ('LB','$v_no','$DOC_NO','$voucher_date','$DOC_YEAR','$company_code','$po','$po_date','$OrderRef','$PartyRef','$party',
   '$narration','$lot_code','$stax_rate1','$stax_amt1','$add_tax','$stax_rate2','$stax_amt2','$charge_code','$dept1','$add1',
   '$frt_code','$dept2','$less1','$disc_code','$dept3','$less2','$total2','99','L','$BILL_KEY','N')";
//  print_r($master_q);die();
  $master_r = $conn->query($master_q);
  if($master_r){
      for($i=0;$i< count($_POST['orderno']); $i++){
                $orderno =$_POST['orderno'][$i];
                $grnno =$_POST['grnno'][$i];
                $item_code =$_POST['item_code'][$i];
                $item_name =$_POST['item_name'][$i];
                $product =$_POST['product'][$i];
                $item_dtl =$_POST['item_dtl'][$i];
                $quantity =$_POST['quantity'][$i];
                $rate =$_POST['rate'][$i];
                $rate = str_replace( ',', '', $rate );
                $amt =$_POST['amt'][$i];
                $amt = str_replace( ',', '', $amt );
                $billed =$_POST['billed'][$i];
                $total =$_POST['total'];
                $detail_q = "insert into bill_dtl_um(DOC_YEAR,DIV_CODE,DOC_TYPE,DOC_NO,DOC_DATE,CO_CODE,BILL_KEY,PO_NO,GRN_KEY,ITEM_CODE,PRODUCT_CODE,
                ITEM_DETAIL,QTY,RATE,AMT,BILLED,PO_CATG)value ('$DOC_YEAR','99','LB','$DOC_NO','$voucher_date','$company_code','$BILL_KEY','$orderno',
                '$grnno','$item_code','$product','$item_dtl','$quantity','$rate','$amt','$billed','L')"; 
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
    }else{
      $return_data = array(
      "status" => 0,
      "message" => "Bill has not been Inserted"
      );
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'check_control_code'){
    
    $control_code=$_POST['control_code'];
    $company_code=$_POST['company_code'];

    $query = "SELECT control_code FROM act_chart WHERE control_code='$control_code' AND co_code = $company_code";
    // PRINT_R($ query);
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    // $co_code=$show['CO_CODE'];
    // print_r($co_code); die();
    if (empty($show['control_code'])) {
      $return_data = array(
        "status" => 1,
        "message" => "You Enter a new code"
      );
    }else{
        $return_data = array(
          "status" => 0,
          "message" => "This Code is already registered "
        );
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
}elseif(isset($_POST['action']) && $_POST['action'] == 'from_code'){
    $company_code=$_POST['company_code'];
    
      $query = "SELECT * FROM ACT_LC_VIEW2 WHERE co_code = '$company_code' AND sub_level1 <> '0000' AND sub_level2 <> '000' ORDER BY account_code ASC";
      // PRINT_R($query);
      $result = $conn->query($query);
      $count = mysqli_num_rows($result);
      $return_data=[];
        while($show = mysqli_fetch_assoc($result)){
            $return_data[] = $show;
        }
  }elseif(isset($_POST['action']) && $_POST['action'] == 'from_code1'){
    $company_code=$_POST['company_code'];
    $query = "SELECT * FROM ACT_LC_VIEW2 WHERE co_code = '$company_code' AND sub_level1 <> '0000' AND sub_level2 = '000' ORDER BY account_code ASC";
      // PRINT_R($query);
      $result = $conn->query($query);
      $count = mysqli_num_rows($result);
      $return_data=[];
        while($show = mysqli_fetch_assoc($result)){
            $return_data[] = $show;
        }
  }elseif(isset($_POST['action']) && $_POST['action'] == 'from_code2'){
    $company_code=$_POST['company_code'];
    
      $query = "SELECT * FROM ACT_LC_VIEW2 WHERE co_code = '$company_code' AND sub_level1 = '0000' AND sub_level2 = '000' ORDER BY account_code ASC";
      // PRINT_R($query);
      $result = $conn->query($query);
      $count = mysqli_num_rows($result);
      $return_data=[];
        while($show = mysqli_fetch_assoc($result)){
            $return_data[] = $show;
        }
  }elseif(isset($_POST['action']) && $_POST['action'] == 'po_code'){
    // print_r("jfsksk");
    $query = "SELECT  *
    FROM GRN_LOCAL_UM_VIEW 
    GROUP BY CO_CODE,DOC_NO,DOC_YEAR,PO_CATG
    ORDER BY PARTY_NAME";
      // PRINT_R($query);DIE();
      $result = $conn->query($query);
      // $count = mysqli_num_rows($result);
      $return_data=[];
        while($show = mysqli_fetch_assoc($result)){
            $return_data[] = $show;
        }
  }elseif(isset($_POST['action']) && $_POST['action'] == 'party_detail'){
    // print_r("jfsksk");
    $party_code = $_POST['party_code'];
    $query = "SELECT * from supp where supp_div = '$party_code'";
    // PRINT_R($query);die();
    $result = $conn->query($query);
    // $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    $return_data= $show;
  }elseif(isset($_POST['action']) && $_POST['action'] == 'party_name'){
      $party_code = $_POST['party_code'];
    //   print_r($party_code);
      $query = "SELECT * from party where party_code = '$party_code'";
    //   print_r($query);
    $result = $conn->query($query);
    // $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    $return_data= $show;
    // PRINT_R($return_data);die();
  }elseif(isset($_POST['action']) && $_POST['action'] == 'calculations1'){
    // print_r($_POST);DIE();
    $co_code = $_POST['co_code'];
    $doc_year = $_POST['doc_year'];
    $doc_type = $_POST['doc_type'];
    $doc_no = $_POST['doc_no'];
    $order_key = $_POST['order_key'];
  $query = "SELECT a.rate, b.*,c.item_descr FROM po_dtl_local_um a, strtran_dtl b ,items c where a.CO_CODE = b.CO_CODE and a.ORDER_KEY = b.PO_NO and a.ITEM_CODE = b.ITEM_CODE and b.do_key_ref = '$order_key' AND b.doc_type ='GRNL'  AND a.ITEM_CODE = c.item_div ";
      // PRINT_R($query);die();
      $result = $conn->query($query);
      // $count = mysqli_num_rows($result);
      while($show = mysqli_fetch_assoc($result)){
            $return_data[] = $show;
        }
       
      }elseif(isset($_POST['action']) && $_POST['action'] == 'calculations2'){
    // print_r($_POST);DIE();
    $company_code = $_POST['company_code'];
    $DOC_DATE = $_POST['DOC_DATE'];
    $DOC_YEAR = $_POST['DOC_YEAR'];
    $DOC_TYPE = $_POST['DOC_TYPE'];
    $DOC_NO = $_POST['DOC_NO'];
    $BILL_KEY = $_POST['BILL_KEY'];
    $query = "SELECT a.* , b.item_descr AS ITEM_DESCR 
    FROM bill_dtl_um a
    LEFT JOIN items b
    ON a.ITEM_CODE = b.item_div and a.CO_CODE=b.co_code
    WHERE  a.CO_CODE           = '$company_code'
    and    a.DOC_TYPE          = '$DOC_TYPE'
    and    a.DOC_YEAR          = '$DOC_YEAR'
    and    a.DOC_NO            = '$DOC_NO'
    and   a.BILL_KEY         = '$BILL_KEY'";
      // PRINT_R($query);die();
     $result = $conn->query($query);
      // $count = mysqli_num_rows($result);
     

      while($show = mysqli_fetch_assoc($result)){
            $return_data[] = $show;
        }
       
      }elseif(isset($_POST['action']) && $_POST['action'] == 'charge_code'){
        // print_r($_POST);DIE();
        $company_code = $_POST['company_code'];
        
        // PRINT_R($return_data);die(); 
    $query = "SELECT DESCR,ACCOUNT_CODE
    FROM ACT_CHART
    WHERE CO_CODE = '$company_code'
    AND SUBSTR(ACCOUNT_CODE,8,3) <> '000'
    ORDER BY DESCR;";
      // PRINT_R($query);die();
      $result = $conn->query($query);
      // $count = mysqli_num_rows($result);
      $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
        $return_data[] = $show;
    }
  }elseif(isset($_POST['action']) && $_POST['action'] == 'charge_code2'){
    // print_r($_POST);DIE();
    $CO_CODE = $_POST['CO_CODE'];
    
    // PRINT_R($return_data);die(); 
$query = "SELECT DESCR,ACCOUNT_CODE
FROM ACT_CHART
WHERE CO_CODE = '$CO_CODE'
AND SUBSTR(ACCOUNT_CODE,8,3) <> '000'
ORDER BY DESCR;";
  // PRINT_R($query);die();
  $result = $conn->query($query);
  // $count = mysqli_num_rows($result);
  $return_data=[];
  while($show = mysqli_fetch_assoc($result)){
    $return_data[] = $show;
}
}elseif(isset($_POST['action']) && $_POST['action'] == 'dept1'){
    // print_r($_POST);DIE();
    $charge_code = $_POST['charge_code'];
    
    $query = "SELECT dept_name,dept_code
    FROM dept_store
    WHERE SUBSTR(dept_code,1,3) =SUBSTR('$charge_code',1,3)
    ORDER BY dept_code;";
      // PRINT_R($query);die();

      $result = $conn->query($query);
      // $count = mysqli_num_rows($result);
     
      $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
        $return_data[] = $show;
    }
  }elseif(isset($_POST['action']) && $_POST['action'] == 'dept3'){
    // print_r($_POST);DIE();
    $disc_code = $_POST['disc_code'];
    
    $query = "SELECT dept_name,dept_code
    FROM dept_store
    WHERE SUBSTR(dept_code,1,3) =SUBSTR('$disc_code',1,3)
    ORDER BY dept_code;";
      // PRINT_R($query);die();
      $result = $conn->query($query);
      // $count = mysqli_num_rows($result);
     
      $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
        $return_data[] = $show;
    }
  }elseif(isset($_POST['action']) && $_POST['action'] == 'dept2'){
    // print_r($_POST);DIE();
    $frt_code = $_POST['frt_code'];
    
    $query = "SELECT dept_name,dept_code
    FROM dept_store
    WHERE SUBSTR(dept_code,1,3) =SUBSTR('$frt_code',1,3)
    ORDER BY dept_code;";
      // PRINT_R($query);die();
      $result = $conn->query($query);
      // $count = mysqli_num_rows($result);
     
    
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



