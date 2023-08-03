<?php
session_start();
header("Content-Type: application/json");
include '../../auth/db.php';
if (isset($_POST['action']) && $_POST['action'] == 'item_detail') {
    // print_r("jfsksk");
    $company_code = $_POST['company_code'];
    $query = "SELECT a.item_descr,a.pur_mode,a.item_div,a.co_code,a.div_code,b.div_name,c.gen_name,d.unit_name from items a 
    left join division b on a.div_code=b.div_code
    left join gen_name c on a.gen_code=c.gen_code
    left join unit	d on a.um_code=d.unit_code
    WHERE a.co_code='$company_code'";
    // PRINT_R($query); DIE();  
    $result = $conn->query($query);
    $return_data = [];
    while ($show = mysqli_fetch_assoc($result)) {
        $return_data[] = $show;
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'supp_code'){
    // print_r("jfsksk");
    $company_code=$_POST['company_code'];
    $query = "SELECT PARTY_NAME,ADDRESS,SUPP_DIV,CRDAYS
    FROM SUPP
    WHERE CO_CODE = '$company_code'
    ORDER BY PARTY_NAME";
    // print_r($query);die();
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
    // print_r($return_data); die();
    while($show = mysqli_fetch_assoc($result)){
        $return_data[] = $show;
    }
} elseif (isset($_POST['action']) && $_POST['action'] == 'sale_tax') {
    // $product_code=$_POST['product_code'];
    $company_code = $_POST['company_code'];
    $query = "SELECT DESCR,ACCOUNT_CODE FROM act_chart WHERE CO_CODE = '$company_code' AND SUBSTR(ACCOUNT_CODE,8,3) <> '000' ORDER BY DESCR";
    // PRINT_R($query);DIE();
    $result = $conn->query($query);
    $return_data = [];
    while ($show = mysqli_fetch_assoc($result)) {
        $return_data[] = $show;
    }
} elseif (isset($_POST['action']) && $_POST['action'] == 'add_tax') {
    // $product_code=$_POST['product_code'];
    $company_code = $_POST['company_code'];
    $query = "SELECT DESCR,ACCOUNT_CODE FROM act_chart WHERE CO_CODE = '$company_code' AND SUBSTR(ACCOUNT_CODE,8,3) <> '000' ORDER BY DESCR";
    // PRINT_R($query);DIE();
    $result = $conn->query($query);
    $return_data = [];
    while ($show = mysqli_fetch_assoc($result)) {
        $return_data[] = $show;
    }
} elseif (isset($_POST['action']) && $_POST['action'] == 'product_detail') {
    // $product_code=$_POST['product_code'];
    $query = "SELECT * FROM product";
    // PRINT_R($query);DIE();
    $result = $conn->query($query);
    $return_data = [];
    while ($show = mysqli_fetch_assoc($result)) {
        $return_data[] = $show;
    }
} elseif (isset($_POST['action']) && $_POST['action'] == 'insert') {
    // print_r($_POST); die();
    $doc_date = $_POST['doc_date'];
    $doc_year = $_POST['doc_year'];
    $company_code = $_POST['company_code'];
    $company_ref = $_POST['company_ref'];
    $party_ref = $_POST['party_ref'];
    $dlvry_date = $_POST['dlvry_date'];
    $po_close = $_POST['po_close'];
    $v_no = $_POST['v_no'];
    $party = $_POST['party'];
    $cr_days = $_POST['cr_days'];
    $narration = $_POST['narration'];
    $saletax_amount = $_POST['saletax_amount'];
    $addtax_amount = $_POST['addtax_amount'];
    $saletax_code = $_POST['saletax_code'] == null ? '' : $_POST['saletax_code'];
    $addtax_code = $_POST['addtax_code'] == null ? '' : $_POST['addtax_code'];
    $saletax_value = $_POST['saletax_value'] == null ? '' : $_POST['saletax_value'];
    $addtax_value = $_POST['addtax_value'] == null ? '' : $_POST['addtax_value'];
    $debit = $_POST['debit'];
    $net_amount = $_POST['net_amount'];
    $date = date('Y-m-d');
    $net_amounts = str_replace(',', '', $net_amount);
    if (is_numeric($net_amounts)) {
        $net_amount = $net_amounts;
    }
    $saletax_amounts = str_replace(',', '', $saletax_amount);
    if (is_numeric($saletax_amounts)) {
        $saletax_amount = $saletax_amounts;
    }
    $addtax_amounts = str_replace(',', '', $addtax_amount);
    if (is_numeric($addtax_amounts)) {
        $addtax_amount = $addtax_amounts;
    }
    $debits = str_replace(',', '', $debit);
    if (is_numeric($debits)) {
        $debit = $debits;
    }
    if($net_amount==null){
        $net_amount=$debit;
    }
    $select_q = "SELECT (case when MAX(DOC_NO) is null then 1 else MAX(DOC_NO)+1 end) DOC_NO 
              FROM po_mst_local_um  WHERE CO_CODE = '$company_code' ";
    // print_r($select_q);die();
    $select_r = $conn->query($select_q);
    $show = mysqli_fetch_assoc($select_r);
    $doc_no = $show['DOC_NO'];
    $master_q = "INSERT INTO `po_mst_local_um`(`DOC_NO`,`DOC_DATE`,`DOC_TYPE`,`DOC_YEAR`,`CO_CODE`,`DIV_CODE`,`PO_CATG`,`ORDER_KEY`,`PARTY_REF`,`DLVRY_DATE`,`PO_CLOSE`,`PARTY_CODE`, `CRDAYS`,`REMARKS`,`STAX_CODE`,`ADDTAX_CODE`,`STAX_RATE`,`STAX_AMT`,`ADDTAX_RATE`,`ADDTAX_AMT`,`TOTAL_NET_AMT`,`ENTRY_USER`,`ENTRY_DATE`,`REFNUM`,`REFNUM2`,POST)value ('$doc_no','$doc_date','PO','$doc_year','$company_code','99','L','$company_code-99-L-$doc_no','$party_ref','$dlvry_date','$po_close','$party','$cr_days','$narration','$saletax_code','$addtax_code','$saletax_value',' $saletax_amount',' $addtax_value','$addtax_amount','$net_amount','ADMIN','$date','$v_no','$company_ref','N')";
    // print_r($master_q);die;
    $master_r = $conn->query($master_q);
    if ($master_r) {
        $amounts = 0;
        for ($i = 0; $i < count($_POST['acc_desc']); $i++) {
            $acc_desc = $_POST['acc_desc'][$i] == '' ? '' : $_POST['acc_desc'][$i];
            $product = isset($_POST['acc_descr'][$i])?$_POST['acc_descr'][$i]:'';
            $item_detail = $_POST['item_detail'][$i];
            // $depart_desc = $_POST['depart_desc'][$i]=='0'?'':$_POST['depart_desc'][$i];
            // $vehicle_code = $_POST['vehicle_code'][$i]=='0'?'':$_POST['vehicle_code'][$i];
            $quantity = $_POST['quantity'][$i];
            $rate = $_POST['rate'][$i];
            $amount = $_POST['amount'][$i];
            // $amount=intval(preg_replace('/[^\d.]/', '', $amount));
            $quantitys = str_replace(',', '', $quantity);
            $rates = str_replace(',', '', $rate);
            $amounts = str_replace(',', '', $amount);
            if (is_numeric($quantitys) && is_numeric($rates) && is_numeric($amounts)) {
                $quantity = $quantitys;
                $rate = $rates;
                $amount = $amounts;
            }
            // $memo_desc = $_POST['memo'][$i];
            $detail_q = "INSERT INTO `po_dtl_local_um`(`DOC_NO`,`DOC_DATE`,`DOC_TYPE`,`DOC_YEAR`,`CO_CODE`,`DIV_CODE`,`PO_CATG`,`ORDER_KEY`,`ITEM_CODE`,`PRODUCT_CODE`,`ITEM_DETAIL`,`ITEM_TYPE`,`QTY`,`RATE`,`AMT`,`NET_AMT`) value ('$doc_no','$doc_date','PO','$doc_year','$company_code','99','L','$company_code-99-L-$doc_no','$acc_desc','$product','$item_detail','N','$quantity','$rate','$amount','$net_amount')";
            // print_r($detail_q);die();
            $detail_r = $conn->query($detail_q);
            if ($detail_r) {
                $return_data = array(
                    "status" => 1,
                    // "voucher_no" => $voucher_no,
                    "message" => "Purchase Order has been Inserted having Doc# No:" . $doc_no
                );
            } else {
                $return_data = array(
                    "status" => 0,
                    "message" => "Purchase Order has not been Inserted"
                );
            }
        }
    } else {
        $return_data = array(
            "status" => 0,
            "message" => "Cash Payment has not been Inserted"
        );
    }
} elseif (isset($_POST['action']) && $_POST['action'] == 'view') {
    // print_r("jfsksk");
    $query = "SELECT * FROM po_mst_local_um ORDER BY doc_date desc,doc_no desc";
    // PRINT_R($query);
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data = [];
    while ($show = mysqli_fetch_assoc($result)) {
        $return_data[] = $show;
    }
} elseif (isset($_POST['action']) && $_POST['action'] == 'edit') {
    // print_r($_POST); die();
    $co_code = $_POST['co_code'];
    $order_key = $_POST['order_key'];
    $doc_year = $_POST['doc_year'];
    $doc_no = $_POST['doc_no'];
    $doc_type=$_POST['doc_type'];
    // $query = "SELECT A.*,B.co_name,C.party_nameFROM po_mst_local_um A
    //  LEFT JOIN company B ON A.CO_CODE=B.co_code 
    // LEFT JOIN division C ON C.division_code=A.div_code
    // //  LEFT JOIN party D ON A.party_code= D.party_code 
    // //   WHERE A.co_code='$co_code' AND A.div_code='$div_code' 
    // //   AND A.party_code='$party_code' AND A.sman_code='$salesman_code' AND A.doc_year='$doc_year' 
    // //   AND A.doc_no='$doc_no' AND A.po_catg='$po_catg' ";
    // PRINT_R($query); die();
    $query="SELECT A.*,B.co_name,C.party_name FROM po_mst_local_um A 
    LEFT JOIN company B ON A.CO_CODE=B.co_code 
    LEFT JOIN supp C ON A.PARTY_CODE= C.supp_div
    WHERE A.DOC_NO='$doc_no' AND A.DOC_TYPE='$doc_type' AND A.DOC_YEAR='$doc_year' AND A.CO_CODE='$co_code' AND A.ORDER_KEY='$order_key'";
    // print_r($query);die();
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    $return_data = $show;
} elseif (isset($_POST['action']) && $_POST['action'] == 'edit_table') {
    // print_r($_POST);die();
    $co_code = $_POST['co_code'];
    $order_key = $_POST['order_key'];
    $doc_year = $_POST['doc_year'];
    $doc_no = $_POST['doc_no'];
    $doc_type = $_POST['doc_type'];
    $query = "SELECT DISTINCT A.*,B.item_descr,C.gen_name,D.div_name,E.unit_name,F.product_name FROM po_dtl_local_um A LEFT JOIN items B ON A.ITEM_CODE=B.item_div 
    LEFT JOIN gen_name C ON B.gen_code=C.gen_code 
    LEFT JOIN division D ON B.div_code=D.div_code 
    LEFT JOIN unit	E ON B.um_code=E.unit_code 
    LEFT JOIN product F ON A.PRODUCT_CODE=F.product_code
    WHERE A.DOC_NO='$doc_no' AND A.DOC_TYPE='$doc_type' AND A.DOC_YEAR='$doc_year' AND A.CO_CODE='$co_code' AND A.ORDER_KEY='$order_key'";
    // print_r($query);die();
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data = [];
    while ($show = mysqli_fetch_assoc($result)) {
        $return_data[] = $show;
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'update'){
    // print_r($_POST); die();
    $doc_no = $_POST['doc_no'];
    $doc_date = $_POST['doc_date'];
    $doc_year = $_POST['doc_year'];
    $order_key = $_POST['order_key'];
    $company_code = $_POST['company_code'];
    $company_name = $_POST['company_name'];
    $company_ref = $_POST['company_ref'];
    $party_ref = $_POST['party_ref'];
    $dlvry_date = $_POST['dlvry_date'];
    $po_close = $_POST['po_close'];
    $v_no = $_POST['v_no'];
    $party = $_POST['party'];
    $cr_days = $_POST['cr_days'];
    $narration = $_POST['narration'];
    $net_amount=$_POST['net_amount'];
    $saletax_amount = $_POST['saletax_amount'];
    $addtax_amount = $_POST['addtax_amount'];
    $saletax_code = $_POST['saletax_code'] == null ? '' : $_POST['saletax_code'];
    $addtax_code = $_POST['addtax_code'] == null ? '' : $_POST['addtax_code'];
    $saletax_value = $_POST['saletax_value'] == null ? '' : $_POST['saletax_value'];
    $addtax_value = $_POST['addtax_value'] == null ? '' : $_POST['addtax_value'];
    $net_amounts = str_replace(',', '', $net_amount);
    if (is_numeric($net_amounts)) {
        $net_amount = $net_amounts;
    }
    $saletax_amounts = str_replace(',', '', $saletax_amount);
    if (is_numeric($saletax_amounts)) {
        $saletax_amount = $saletax_amounts;
    }
    $addtax_amounts = str_replace(',', '', $addtax_amount);
    if (is_numeric($addtax_amounts)) {
        $addtax_amount = $addtax_amounts;
    }
  
    $upd_mst_q="UPDATE po_mst_local_um SET DOC_DATE='$doc_date', DOC_YEAR='$doc_year' ,PARTY_REF='$party_ref',DLVRY_DATE='$dlvry_date',PO_CLOSE='$po_close',PARTY_CODE='$party',CRDAYS='$cr_days',REMARKS='$narration',STAX_RATE='$saletax_value',STAX_AMT='$saletax_amount',ADDTAX_RATE='$addtax_value',ADDTAX_AMT='$addtax_amount',TOTAL_NET_AMT='$net_amount',STAX_CODE='$saletax_code',ADDTAX_CODE='$addtax_code' WHERE DOC_NO='$doc_no' and DOC_TYPE = 'PO' and DOC_YEAR='$doc_year' and CO_CODE='$company_code' and ORDER_KEY='$company_code-99-L-$doc_no'";
    $upd_mst_r = $conn->query($upd_mst_q);
    if($upd_mst_r){
      $del_dtl_q="DELETE FROM po_dtl_local_um WHERE DOC_NO='$doc_no' and DOC_TYPE = 'PO' and DOC_YEAR='$doc_year' and CO_CODE='$company_code' and ORDER_KEY='$company_code-99-L-$doc_no'";
      $del_dtl_r = $conn->query($del_dtl_q);
      if($del_dtl_r){
        for ($i = 0; $i < count($_POST['acc_desc']); $i++) {
            $acc_desc = $_POST['acc_desc'][$i] == '' ? '' : $_POST['acc_desc'][$i];
            $product = isset($_POST['acc_descr'][$i])?$_POST['acc_descr'][$i]:'';
            $item_detail = $_POST['item_detail'][$i];
            // $depart_desc = $_POST['depart_desc'][$i]=='0'?'':$_POST['depart_desc'][$i];
            // $vehicle_code = $_POST['vehicle_code'][$i]=='0'?'':$_POST['vehicle_code'][$i];
            $quantity = $_POST['quantity'][$i];
            $rate = $_POST['rate'][$i];
            $amount = $_POST['amount'][$i];
            // $amount=intval(preg_replace('/[^\d.]/', '', $amount));
            $quantitys = str_replace(',', '', $quantity);
            $rates = str_replace(',', '', $rate);
            $amounts = str_replace(',', '', $amount);
            if (is_numeric($quantitys) && is_numeric($rates) && is_numeric($amounts)) {
                $quantity = $quantitys;
                $rate = $rates;
                $amount = $amounts;
            }
            // $memo_desc = $_POST['memo'][$i];
            $detail_q = "INSERT INTO `po_dtl_local_um`(`DOC_NO`,`DOC_DATE`,`DOC_TYPE`,`DOC_YEAR`,`CO_CODE`,`DIV_CODE`,`PO_CATG`,`ORDER_KEY`,`ITEM_CODE`,`PRODUCT_CODE`,`ITEM_DETAIL`,`ITEM_TYPE`,`QTY`,`RATE`,`AMT`,`NET_AMT`) value ('$doc_no','$doc_date','PO','$doc_year','$company_code','99','L','$company_code-99-L-$doc_no','$acc_desc','$product','$item_detail','N','$quantity','$rate','$amount','$net_amount')";
            // print_r($detail_q);die();
            $detail_r = $conn->query($detail_q);
            if ($detail_r) {
                $return_data = array(
                    "status" => 1,
                    // "voucher_no" => $voucher_no,
                    "message" => "Purchase Order has been Inserted having Doc# No:" . $doc_no
                );
            } else {
                $return_data = array(
                    "status" => 0,
                    "message" => "Purchase Order has not been Inserted"
                );
            }
        }
      }
    } 
}elseif(isset($_POST['action']) && $_POST['action'] == 'item_detail_tr'){ 
    $product_code = $_POST['product_code'];
    $item_code = $_POST['item_code'];
    if ($product_code=='0') {
        $merge=" ";
        $product='';
        $product_name='';
    }
    else {
        $merge=" AND f.product_code='$product_code'";
        $product=",product f";
        $product_name=",f.product_name";
    }
    $query = "SELECT b.gen_name, c.unit_name,e.div_name $product_name
    from   items a, gen_name b, unit	c,division e $product
    where b.gen_code=a.gen_code
    and a.DIV_CODE=e.div_code
    and a.um_code=c.unit_code
    and a.item_div='$item_code'
    $merge
    ";
    // PRINT_R($query); DIE();  
    $result = $conn->query($query);
    $show = mysqli_fetch_assoc($result);
    $return_data = $show; 
}else {
    $return_data = array(
        "status" => 0,
        "message" => "Action Not Matched"
    );
}
print(json_encode($return_data, JSON_PRETTY_PRINT));
