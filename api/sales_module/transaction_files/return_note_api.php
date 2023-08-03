<?php
session_start();
header("Content-Type: application/json");
include '../../auth/db.php';
if(isset($_POST['action']) && $_POST['action'] == 'view'){
  // print_r("jfsksk");
    $query = "SELECT * FROM rt_mst";
    // PRINT_R($query);
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
    // print_r($_POST); 
    // die();
    // $order_doc_no=$_POST['order_doc_no'];
    // $dc_doc_no=$_POST['dc_doc_no'];
    // $doc_no=$_POST['doc_no'];
    $doc_date=$_POST['voucher_date'];
    $year=$_POST['year'];
    $company_code=$_POST['company_code'];
    $purchase_mode=$_POST['purchase_mode'];
    $division=$_POST['division'];
    $rt_ref=$_POST['rt_ref'];
    $party=$_POST['party'];
    $salesman=$_POST['salesman'];
    $v_no=$_POST['v_no'];
    $narration=$_POST['narration'];
    $debit=$_POST['debit'];

    $i_tax_per=$_POST['i_tax_per'];
    $i_tax_amt=$_POST['i_tax_amt'];
    $i_tax_amts = str_replace( ',', '', $i_tax_amt );
    if( is_numeric( $i_tax_amts ) ) {
      $i_tax_amt = $i_tax_amts;
    }
    $add_others_code=isset($_POST['add_others_code'])?$_POST['add_others_code']:'';
    $add_freight_code=isset($_POST['add_freight_code'])?$_POST['add_freight_code']:'';
    $add_disc_code=isset($_POST['add_disc_code'])?$_POST['add_disc_code']:'';
    $dpt_1_code=isset($_POST['dpt_1_code'])?$_POST['dpt_1_code']:'';
    $dpt_2_code=isset($_POST['dpt_2_code'])?$_POST['dpt_2_code']:'';
    $dpt_3_code=isset($_POST['dpt_3_code'])?$_POST['dpt_3_code']:'';
    $add_amount_calc=$_POST['add_amount_calc']==''?0:$_POST['add_amount_calc'];
    $less_freight_calc=$_POST['less_freight_calc']==''?0:$_POST['less_freight_calc'];
    $less_disc_calc=$_POST['less_disc_calc']==''?0:$_POST['less_disc_calc'];
    $final_total_calc=$_POST['final_total_calc'];

    $add_amount_calcs = str_replace( ',', '', $add_amount_calc );
    if( is_numeric( $add_amount_calcs ) ) {
      $add_amount_calc = $add_amount_calcs;
    }
    $less_freight_calcs = str_replace( ',', '', $less_freight_calc );
    if( is_numeric( $less_freight_calcs ) ) {
      $less_freight_calc = $less_freight_calcs;
    }
    $less_disc_calcs = str_replace( ',', '', $less_disc_calc );
    if( is_numeric( $less_disc_calcs ) ) {
      $less_disc_calc = $less_disc_calcs;
    }
    $final_total_calcs = str_replace( ',', '', $final_total_calc );
    if( is_numeric( $final_total_calcs ) ) {
      $final_total_calc = $final_total_calcs;
    }


    $debits = str_replace( ',', '', $debit );
    if( is_numeric( $debits ) ) {
      $debit = $debits;
    }

    $select_q="SELECT (case when MAX(doc_no) is null then 1 else MAX(doc_no)+1 end) doc_no 
              FROM rt_mst  WHERE co_code = '$company_code' AND doc_year = '$year' AND doc_type = 'RT'
              AND po_catg='$purchase_mode' and div_code='$division'";
              // PRINT_R($select_q);
              // die();
    $select_r = $conn->query($select_q);
    $show = mysqli_fetch_assoc($select_r);
    $doc_no=$show['doc_no'];
    $rt_key=$company_code.'-'.$division.'-'.$purchase_mode.'-'.$doc_no;

    $master_q = "insert into rt_mst(doc_type,do_key,co_code,doc_year,doc_no,doc_date,po_catg,div_code,refnum,
    refnum2,party_code,sman_code,remarks,total_gross_amt,total_net_amt,post,
    charge_code,charge_amt,charge_dpt,frt_code,frt_dpt,other_chrgs,disc_code,disc_dpt,other_ded,itax_rate,itax_amt)value 
    ('RT','$rt_key','$company_code','$year','$doc_no','$doc_date','$purchase_mode','$division','$rt_ref',
    '$v_no','$party','$salesman','$narration','$debit','$final_total_calc','N',
    '$add_others_code','$add_amount_calcs','$dpt_1_code','$add_freight_code','$dpt_2_code','$less_freight_calcs',
    '$add_disc_code','$dpt_3_code','$less_disc_calcs','$i_tax_per','$i_tax_amt')";
    // print_r($master_q);die();
    $master_r = $conn->query($master_q);
    if($master_r){
      $entry_no=1;
      // $amounts=0;
        for($i=0;$i< count($_POST['acc_desc']); $i++){
          $dc_no = $_POST['dc_no'][$i];
          $po_no = $_POST['po_no'][$i];
          $dc_year = $_POST['dc_year'][$i];
          $acc_desc = $_POST['acc_desc'][$i];
          $detail = $_POST['detail'][$i];
          $quantity = $_POST['quantity'][$i];
          $quantitys = str_replace( ',', '', $quantity );
          if( is_numeric( $quantitys ) ) {
            $quantity = $quantitys;
          }
          $rate = $_POST['rate'][$i];
          $rates = str_replace( ',', '', $rate );
          if( is_numeric( $rates ) ) {
            $rate = $rates;
          }
          $amount = $_POST['amount'][$i];
          $amounts = str_replace( ',', '', $amount );
          if( is_numeric( $amounts ) ) {
            $amount = $amounts;
          }
          $disc = $_POST['disc'][$i];
          $discs = str_replace( ',', '', $disc );
          if( is_numeric( $discs ) ) {
            $disc = $discs;
          }
          $disc_e = $_POST['disc_e'][$i];
          $disc_es = str_replace( ',', '', $disc_e );
          if( is_numeric( $disc_es ) ) {
            $disc_e = $disc_es;
          }
          $frt = $_POST['frt'][$i];
          $frts = str_replace( ',', '', $frt );
          if( is_numeric( $frts ) ) {
            $frt = $frts;
          }
          $frt_e = $_POST['frt_e'][$i];
          $frt_es = str_replace( ',', '', $frt_e );
          if( is_numeric( $frt_es ) ) {
            $frt_e = $frt_es;
          }
          $excl = $_POST['excl'][$i];
          $excls = str_replace( ',', '', $excl );
          if( is_numeric( $excls ) ) {
            $excl = $excls;
          }
          $excl_e = $_POST['excl_e'][$i];
          $excl_es = str_replace( ',', '', $excl_e );
          if( is_numeric( $excl_es ) ) {
            $excl_e = $excl_es;
          }
          $stax_amt = $_POST['stax_amt'][$i];
          $stax_amts = str_replace( ',', '', $stax_amt );
          if( is_numeric( $stax_amts ) ) {
            $stax_amt = $stax_amts;
          }
          $stax_amt_e = $_POST['stax_amt_e'][$i];
          $stax_amt_es = str_replace( ',', '', $stax_amt_e );
          if( is_numeric( $stax_amt_es ) ) {
            $stax_amt_e = $stax_amt_es;
          }
          $add_amt = $_POST['add_amt'][$i];
          $add_amts = str_replace( ',', '', $add_amt );
          if( is_numeric( $add_amts ) ) {
            $add_amt = $add_amts;
          }
          $add_amt_e = $_POST['add_amt_e'][$i];
          $add_amt_es = str_replace( ',', '', $add_amt_e );
          if( is_numeric( $add_amt_es ) ) {
            $add_amt_e = $add_amt_es;
          }
          $opening_qty = $_POST['bal_stock'][$i]==''?0:$_POST['bal_stock'][$i];
          $net_amt = $_POST['net_amt'][$i];
          $net_amts = str_replace( ',', '', $net_amt );
          if( is_numeric( $net_amts ) ) {
            $net_amt = $net_amts;
          }
          $expiry_dt = $_POST['expiry_dt'][$i]==''?'0':$_POST['expiry_dt'][$i];
          $batch_no = $_POST['batch_no'][$i]==''?'0':$_POST['batch_no'][$i];
          $loc = $_POST['loc'][$i]==''?'':$_POST['loc'][$i];
          // $get_data_q="SELECT a.* from items a 
          // WHERE a.item_div = '$acc_desc'";
          // $get_data_r = $conn->query($get_data_q);
          // $dat = mysqli_fetch_assoc($get_data_r);
          // $hs_code=$dat['hscode'];
          // $tax_rate=$dat['tax_rate'];
          // $bal_qty=$dat['bal_qty'];
          $min_qty_detail="SELECT qty from dc_dtl where co_code = '$company_code' and doc_year='$dc_year'
          AND do_key_ref='$dc_no' and item_code='$acc_desc'";
          // print_r($min_qty_detail);die();
          $update_order_r = $conn->query($min_qty_detail);
          $show_m = mysqli_fetch_assoc($update_order_r);
          // print_r($show_m);die();
          $pre_qty=$show_m['qty']==''?0:$show_m['qty'];
          // $new_receipt=$pre_rec_qty+$quantity;
          $detail_q = "insert into rt_dtl(entry_no,do_qty,doc_type,div_code,co_code,doc_year,doc_no,doc_date,item_code,qty,remarks,po_catg,loc_code,do_key_ref,stax_rate,stax_amt,add_rate,add_amt,frt_rate,frt_amt,disc_rate,disc_amt,excl_rate,excl_amt,rate,amt,net_amt,g_d,gd_date,expiry_date,batch_no)value 
          ('$entry_no','$pre_qty','RT','$division','$company_code','$year','$doc_no','$doc_date','$acc_desc','$quantity','$narration','$purchase_mode','$loc','$rt_key','$stax_amt','$stax_amt_e','$add_amt','$add_amt_e','$frt','$frt_e','$disc','$disc_e','$excl','$excl_e','$rate','$amount','$net_amt','','','$expiry_dt','$batch_no')"; 
          $entry_no++;
          // print_r($detail_q);
          $detail_r = $conn->query($detail_q);
          if($detail_r){
            
            $select_batch_q="SELECT BAL_STOCK,RCPT_STOCK,ISS_STOCK FROM item_batch_no where CO_CODE='$company_code' AND ITEM_CODE='$acc_desc'
            AND LOC_CODE='$loc' AND BATCH_NO='$batch_no'";
            // print_r($select_batch_q);die();
            $select_batch_r = $conn->query($select_batch_q);
            $show_batch = mysqli_fetch_assoc($select_batch_r);
            $batch_bal=$show_batch['BAL_STOCK'];
            $batch_issue=$show_batch['ISS_STOCK'];
            $batch_rcpt=$show_batch['RCPT_STOCK'];
            $batch_final_rcpt_qty=$batch_rcpt+$quantity;
            $batch_final_qty=$batch_bal+$quantity;
            $update_batch_q="UPDATE item_batch_no set RCPT_STOCK='$batch_final_rcpt_qty', BAL_STOCK='$batch_final_qty' WHERE CO_CODE='$company_code' AND ITEM_CODE='$acc_desc'
            AND LOC_CODE='$loc' AND BATCH_NO='$batch_no' AND BAL_STOCK='$opening_qty'";
              // print_r($update_batch_q);die();
            $update_batch_r = $conn->query($update_batch_q);
            $return_data = array(
                "status" => 1,
                // "doc_no" => $doc_no,
                "message" => "RT has been Inserted having doc No:".$doc_no 
            );
          }else{
            $return_data = array(
            "status" => 0,
            "message" => "RT has not been Inserted"
            );
        }
      }
        // die();
      
    }
    
}elseif(isset($_POST['action']) && $_POST['action'] == 'update'){
  // print_r($_POST);die();
  $doc_no=$_POST['doc_no'];
  $rt_key=$_POST['rt_key'];
  $doc_date=$_POST['voucher_date'];
  $year=$_POST['year'];
  $company_code=$_POST['company_code'];
  $purchase_mode=$_POST['purchase_mode'];
  $division=$_POST['division'];
  $rt_ref=$_POST['rt_ref'];
  $party=$_POST['party'];
  $salesman=$_POST['salesman'];
  $v_no=$_POST['v_no'];
  $narration=$_POST['narration'];
  $debit=$_POST['debit'];

  $i_tax_per=$_POST['i_tax_per'];
  $i_tax_amt=$_POST['i_tax_amt'];
  $i_tax_amts = str_replace( ',', '', $i_tax_amt );
  if( is_numeric( $i_tax_amts ) ) {
    $i_tax_amt = $i_tax_amts;
  }
  $add_others_code=isset($_POST['add_others_code'])?$_POST['add_others_code']:'';
  $add_freight_code=isset($_POST['add_freight_code'])?$_POST['add_freight_code']:'';
  $add_disc_code=isset($_POST['add_disc_code'])?$_POST['add_disc_code']:'';
  $dpt_1_code=isset($_POST['dpt_1_code'])?$_POST['dpt_1_code']:'';
  $dpt_2_code=isset($_POST['dpt_2_code'])?$_POST['dpt_2_code']:'';
  $dpt_3_code=isset($_POST['dpt_3_code'])?$_POST['dpt_3_code']:'';
  $add_amount_calc=$_POST['add_amount_calc']==''?0:$_POST['add_amount_calc'];
  $less_freight_calc=$_POST['less_freight_calc']==''?0:$_POST['less_freight_calc'];
  $less_disc_calc=$_POST['less_disc_calc']==''?0:$_POST['less_disc_calc'];
  $final_total_calc=$_POST['final_total_calc'];

  $add_amount_calcs = str_replace( ',', '', $add_amount_calc );
  if( is_numeric( $add_amount_calcs ) ) {
    $add_amount_calc = $add_amount_calcs;
  }
  $less_freight_calcs = str_replace( ',', '', $less_freight_calc );
  if( is_numeric( $less_freight_calcs ) ) {
    $less_freight_calc = $less_freight_calcs;
  }
  $less_disc_calcs = str_replace( ',', '', $less_disc_calc );
  if( is_numeric( $less_disc_calcs ) ) {
    $less_disc_calc = $less_disc_calcs;
  }
  $final_total_calcs = str_replace( ',', '', $final_total_calc );
  if( is_numeric( $final_total_calcs ) ) {
    $final_total_calc = $final_total_calcs;
  }


  $debits = str_replace( ',', '', $debit );
  if( is_numeric( $debits ) ) {
    $debit = $debits;
  }
  $upd_mst_q="UPDATE rt_mst SET doc_date='$doc_date' , refnum='$rt_ref',refnum2='$v_no',sman_code='$salesman',
              remarks='$narration',total_gross_amt='$debit' ,total_net_amt='$final_total_calc', charge_code='$add_others_code',
              charge_amt='$add_amount_calcs', charge_dpt='$dpt_1_code', frt_code='$add_freight_code', frt_dpt='$dpt_2_code', other_chrgs='$less_freight_calcs',
               disc_code='$add_disc_code', disc_dpt='$dpt_3_code', other_ded='$less_disc_calcs', itax_rate='$i_tax_per', itax_amt='$i_tax_amt'
              WHERE co_code = '$company_code' AND div_code = '$division' AND do_key='$rt_key'
              AND po_catg='$purchase_mode' AND doc_no='$doc_no'";
  // print_r($upd_mst_q); die();
  $upd_mst_r = $conn->query($upd_mst_q);
  if($upd_mst_r){
    $min_qty_detail="SELECT qty from rt_dtl where co_code = '$company_code' and doc_year='$year' and div_code='$division' and po_catg='$purchase_mode'
    AND do_key_ref='$rt_key'";
    $min_qty_r = $conn->query($min_qty_detail);
    // print_r($min_qty_detail);die();
    $return_datas=[];
    while($show = mysqli_fetch_assoc($min_qty_r)){
        $return_datas[] = $show;
    }
    $del_dtl_q="DELETE FROM rt_dtl  WHERE co_code = '$company_code' AND div_code = '$division' 
                AND doc_year='$year'AND po_catg='$purchase_mode' AND doc_no='$doc_no' AND doc_type='RT'";
    // print_r($del_dtl_q); die();
    $del_dtl_r = $conn->query($del_dtl_q);
    if($del_dtl_r){
      // $amounts=0;
      
      $entry_no=1;
      for($i=0;$i< count($_POST['acc_desc']); $i++){
        $dc_no = $_POST['dc_no'][$i];
        $po_no = $_POST['po_no'][$i];
        $dc_year = $_POST['dc_year'][$i];
        $acc_desc = $_POST['acc_desc'][$i];
        $detail = $_POST['detail'][$i];
        $quantity = $_POST['quantity'][$i];
        $quantitys = str_replace( ',', '', $quantity );
        if( is_numeric( $quantitys ) ) {
          $quantity = $quantitys;
        }
        $rate = $_POST['rate'][$i];
        $rates = str_replace( ',', '', $rate );
        if( is_numeric( $rates ) ) {
          $rate = $rates;
        }
        $amount = $_POST['amount'][$i];
        $amounts = str_replace( ',', '', $amount );
        if( is_numeric( $amounts ) ) {
          $amount = $amounts;
        }
        $disc = $_POST['disc'][$i];
        $discs = str_replace( ',', '', $disc );
        if( is_numeric( $discs ) ) {
          $disc = $discs;
        }
        $disc_e = $_POST['disc_e'][$i];
        $disc_es = str_replace( ',', '', $disc_e );
        if( is_numeric( $disc_es ) ) {
          $disc_e = $disc_es;
        }
        $frt = $_POST['frt'][$i];
        $frts = str_replace( ',', '', $frt );
        if( is_numeric( $frts ) ) {
          $frt = $frts;
        }
        $frt_e = $_POST['frt_e'][$i];
        $frt_es = str_replace( ',', '', $frt_e );
        if( is_numeric( $frt_es ) ) {
          $frt_e = $frt_es;
        }
        $excl = $_POST['excl'][$i];
        $excls = str_replace( ',', '', $excl );
        if( is_numeric( $excls ) ) {
          $excl = $excls;
        }
        $excl_e = $_POST['excl_e'][$i];
        $excl_es = str_replace( ',', '', $excl_e );
        if( is_numeric( $excl_es ) ) {
          $excl_e = $excl_es;
        }
        $stax_amt = $_POST['stax_amt'][$i];
        $stax_amts = str_replace( ',', '', $stax_amt );
        if( is_numeric( $stax_amts ) ) {
          $stax_amt = $stax_amts;
        }
        $stax_amt_e = $_POST['stax_amt_e'][$i];
        $stax_amt_es = str_replace( ',', '', $stax_amt_e );
        if( is_numeric( $stax_amt_es ) ) {
          $stax_amt_e = $stax_amt_es;
        }
        $add_amt = $_POST['add_amt'][$i];
        $add_amts = str_replace( ',', '', $add_amt );
        if( is_numeric( $add_amts ) ) {
          $add_amt = $add_amts;
        }
        $add_amt_e = $_POST['add_amt_e'][$i];
        $add_amt_es = str_replace( ',', '', $add_amt_e );
        if( is_numeric( $add_amt_es ) ) {
          $add_amt_e = $add_amt_es;
        }
        $opening_qty = $_POST['bal_stock'][$i]==''?0:$_POST['bal_stock'][$i];
        $net_amt = $_POST['net_amt'][$i];
        $net_amts = str_replace( ',', '', $net_amt );
        if( is_numeric( $net_amts ) ) {
          $net_amt = $net_amts;
        }
        $expiry_dt = $_POST['expiry_dt'][$i]==''?'0':$_POST['expiry_dt'][$i];
        $batch_no = $_POST['batch_no'][$i]==''?'0':$_POST['batch_no'][$i];
        $loc = $_POST['loc'][$i]==''?'':$_POST['loc'][$i];
        $pre_qty=$return_datas[$i]['qty'];
        // $get_data_q="SELECT a.* from items a 
        // WHERE a.item_div = '$acc_desc'";
        // $get_data_r = $conn->query($get_data_q);
        // $dat = mysqli_fetch_assoc($get_data_r);
        // $hs_code=$dat['hscode'];
        // $tax_rate=$dat['tax_rate'];
        // $bal_qty=$dat['bal_qty'];
        // $new_receipt=$pre_rec_qty+$quantity;
        $detail_q = "insert into rt_dtl(entry_no,do_qty,doc_type,div_code,co_code,doc_year,doc_no,doc_date,item_code,qty,remarks,po_catg,loc_code,do_key_ref,stax_rate,stax_amt,add_rate,add_amt,frt_rate,frt_amt,disc_rate,disc_amt,excl_rate,excl_amt,rate,amt,net_amt,g_d,gd_date,expiry_date,batch_no)value 
        ('$entry_no','$pre_qty','RT','$division','$company_code','$year','$doc_no','$doc_date','$acc_desc','$quantity','$narration','$purchase_mode','$loc','$dc_no','$stax_amt','$stax_amt_e','$add_amt','$add_amt_e','$frt','$frt_e','$disc','$disc_e','$excl','$excl_e','$rate','$amount','$net_amt','','','$expiry_dt','$batch_no')"; 
        $entry_no++;
        // print_r($detail_q);
        $detail_r = $conn->query($detail_q);
        if($detail_r){
          
          $select_batch_q="SELECT BAL_STOCK,RCPT_STOCK,ISS_STOCK FROM item_batch_no where CO_CODE='$company_code' AND ITEM_CODE='$acc_desc'
          AND LOC_CODE='$loc' AND BATCH_NO='$batch_no' and expiry_date='$expiry_dt'";
          // print_r($select_batch_q);die();
          $select_batch_r = $conn->query($select_batch_q);
          $show_batch = mysqli_fetch_assoc($select_batch_r);
          $batch_bal=$show_batch['BAL_STOCK'];
          $batch_issue=$show_batch['ISS_STOCK'];
          $batch_rcpt=$show_batch['RCPT_STOCK'];
          $batch_final_rcpt_qty=$batch_rcpt-$pre_qty+$quantity;
          $batch_final_qty=$batch_bal-$pre_qty+$quantity;
          $update_batch_q="UPDATE item_batch_no set RCPT_STOCK='$batch_final_rcpt_qty', BAL_STOCK='$batch_final_qty' WHERE CO_CODE='$company_code' AND ITEM_CODE='$acc_desc'
          AND LOC_CODE='$loc' AND BATCH_NO='$batch_no' and expiry_date='$expiry_dt'";
          $update_batch_r = $conn->query($update_batch_q);
            // print_r($update_batch_q);die();
          $return_data = array(
              "status" => 1,
              // "doc_no" => $doc_no,
              "message" => "RT has been Updated having doc No:".$doc_no 
          );
        }else{
          $return_data = array(
          "status" => 0,
          "message" => "RT has not been Updated"
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
    $query = "SELECT A.*,B.co_name,C.div_name,D.party_name,E.sman_name FROM rt_mst A
    LEFT JOIN company B ON A.co_code=B.co_code LEFT JOIN division C ON C.div_code=A.div_code
    LEFT JOIN party D ON A.party_code= D.party_code and A.co_code=D.co_code LEFT JOIN salesman E ON A.sman_code= E.sman_code 
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
    $query = "SELECT a.* FROM rt_dtl a
    WHERE a.co_code='$co_code' AND a.div_code='$div_code' 
    AND a.doc_no='$doc_no' AND a.po_catg='$po_catg' AND a.doc_year='$year' ";
    // PRINT_R($query); die();
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
    while($show = mysqli_fetch_assoc($result)){
        $return_data[] = $show;
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'item_detail_edit'){
  // print_r("djfjdf");
  // print_r($_POST); die();
  $dc_key=$_POST['dc_key'];
  $item_code=$_POST['item_code'];
  $doc_no=$_POST['doc_no'];
  // print_r();die();
  $query = "SELECT a.*,b.qty as total_dc_qty,b.receipt_qty as total_dc_receipt_qty,e.gen_name,c.div_name,f.loc_name,b.qty as dc_qty from rt_dtl a 
  left join dc_dtl b on a.doc_year=b.doc_year AND a.item_code=b.item_code AND a.co_code=b.co_code and a.div_code=b.div_code and a.po_catg=b.po_catg
  left join items d on d.item_div=a.item_code and a.co_code=d.co_code
  left join division c on a.div_code=c.div_code
  left join gen_name e on e.gen_code=d.gen_code
  left join location f on f.loc_code=a.loc_code 
  where a.item_code='$item_code' and a.doc_no='$doc_no' and a.do_key_ref='$dc_key'";
  // PRINT_R($query); die();
  $select_r = $conn->query($query);
  $show = mysqli_fetch_assoc($select_r);
  $return_data=$show;
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
  $query = "SELECT distinct a.*,b.party_name,d.refnum,e.qty as od_qty,c.refnum as ref,c.doc_date as dates,e.doc_no as doc from dc_dtl a  
  left join order_mst c on c.order_key=a.po_no 
  inner join order_dtl e on e.doc_no=c.doc_no and e.order_key=c.order_key and c.doc_date=c.doc_date and c.co_code=c.co_code and c.div_code=c.div_code  
  left join dc_mst d on d.po_no=a.po_no 
  left join party b on c.party_code=b.party_division 
  group by a.co_code,a.doc_no,a.doc_date,a.po_no,a.qty
  order by doc_date desc";
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
  $order_doc=$_POST['order_doc'];
  //   $div_code=$_POST['div_code'];
  //   $doc_year=$_POST['doc_year'];
  $query="SELECT DISTINCT a.*,b.sman_name,a.sman_code,a.refnum2 from order_mst a
  inner join order_dtl c on a.doc_no=c.doc_no and a.order_key=c.order_key and a.doc_date=c.doc_date and a.co_code=c.co_code and a.div_code=c.div_code 
  left join salesman b on a.sman_code=b.sman_code
   where a.doc_no='$order_doc' and a.order_key='$order_key' and a.refnum='$ref_num'
  and a.doc_date='$doc_date'";
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
  $query_m="SELECT a.*,b.co_name,c.division_name from order_dtl a inner join company b on a.co_code=b.co_code 
  inner join division c on a.div_code=c.division_code
  where a.co_code='$company_code' and a.doc_no='$order_doc' and 
  a.order_key='$order_key' and a.refnum='$ref_num' and a.doc_date='$doc_date' and a.qty='$qty' 
  and a.order_key='$order_key'";

  // PRINT_R($query_m); die();
  $select_m = $conn->query($query_m);
  $show_m = mysqli_fetch_assoc($select_m);
  // print_r($show_m);die();
  $return_data=$show_m;
  $query3="SELECT ship_mode,ship_no from dc_mst where doc_no='$doc_no' and po_no='$order_key'";
  $select3= $conn->query($query3);
  $show3 = mysqli_fetch_assoc($select3);
  $ship_mode=$show3['ship_mode'];
  $ship_no=$show3['ship_no'];
  $select_q="SELECT (case when MAX(doc_no) is null then 1 else MAX(doc_no)+1 end) doc_no 
            FROM stktran_mst  WHERE co_code = '$company_code' AND po_no='$order_key' ";
            // PRINT_R($select_q);
            // die();
  $select_r = $conn->query($select_q);
  $show_r = mysqli_fetch_assoc($select_r);
  $doc_no=$show_r['doc_no'];
  $return_data = array(
      "detail" => $show_m,
      "party_code" => $party_code,
      "sman_name" => $sman_name,
      "sman_code" => $sman_code,
      "party_ref" => $party_ref,
      "v_no"      => $refnum2,
      "ship_mode" => $ship_mode,
      "ship_no"   => $ship_no,
      "doc_no"    => $doc_no
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
}elseif(isset($_POST['action']) && $_POST['action'] == 'dc_detail'){
    // print_r("jfsksk");
    $company_code=$_POST['company_code'];
    $party_code=$_POST['party_code'];
    $item_code=$_POST['item_code'];
    $query = "SELECT a.po_no,a.party_code,a.doc_no,a.ITEM_NAME_SALE,a.ITEM_CODE,a.PARTY_NAME,
    a.DOC_DATE,a.DO_KEY,a.QTY,a.RATE,a.AMT,a.BATCH_NO,a.ITEM_TYPE,
    a.G_D,a.GD_DATE,a.STAX_RATE,a.ITEM_HSCODE,a.EXPIRY_DATE,a.ITAX_RATE,a.doc_year,b.bal_stock
    FROM DC_UM_VIEW a
    inner join dc_dtl c on a.co_code=c.co_code and a.doc_year=c.doc_year and a.doc_type=c.doc_type and a.doc_no=c.doc_no and a.do_key=c.do_key_ref
    left join item_batch_no b on a.co_code=b.co_code and a.item_code=b.item_code and a.batch_no=b.batch_no and a.expiry_date=b.expiry_date and b.LOC_CODE=c.loc_code
    WHERE a.PARTY_CODE = '$party_code'
    AND   a.ITEM_CODE  = '$item_code'
    and   a.co_code    = '$company_code'
    ORDER BY a.ITEM_CODE";
    // PRINT_R($query); DIE();  
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
    while($show = mysqli_fetch_assoc($result)){
        $return_data[] = $show;
    }
  }elseif(isset($_POST['action']) && $_POST['action'] == 'invoice_detail'){
    // print_r("jfsksk");
    $company_code=$_POST['company_code'];
    $party_code=$_POST['party_code'];
    $doc_no=$_POST['doc_no'];
    $do_key=$_POST['do_key'];
    $item_code=$_POST['item_code'];
    $year=$_POST['year'];
    // $year=date('Y', strtotime($doc_date));
    $quantity=$_POST['quantity'];
    $rate=$_POST['rate'];
    $query = "SELECT a.* FROM stktran_dtl a WHERE a.co_code='$company_code' AND a.doc_no='$doc_no'  
    AND a.do_key_ref='$do_key' AND a.item_code='$item_code' AND a.doc_year='$year' AND a.qty='$quantity' AND a.rate='$rate'";
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
    $item_code=$_POST['item_code'];
    $query = "SELECT a.*,b.division_name,d.gen_name from items a 
            inner join division b on a.division_code=b.division_code
            inner join gen_name d on a.gen_code=d.gen_code 
            WHERE a.item_div = '$item_code'";
    // PRINT_R($query); die();
    $select_r = $conn->query($query);
    $show = mysqli_fetch_assoc($select_r);
    $return_data=$show;
}elseif(isset($_POST['action']) && $_POST['action'] == 'quantity_detail'){
  // print_r($_POST); die();
  $item_code=$_POST['item_code'];
  $company_code=$_POST['company_code'];
  $order_key=$_POST['order_key_no'];
  //   $dc_doc_no=$_POST['dc_doc_no'];
    $query = "SELECT a.receipt_qty,a.qty from dc_dtl a 
            WHERE a.item_code = '$item_code' AND a.do_key_ref='$order_key' AND a.co_code='$company_code'";
  // PRINT_R($query); die();
  $select_r = $conn->query($query);
  $show = mysqli_fetch_assoc($select_r);
  $return_data=$show;
}elseif(isset($_POST['action']) && $_POST['action'] == 'item_code'){
  $company_code=$_POST['company_code'];
  $division_code=$_POST['division_code'];
  $purchase_mode=$_POST['purchase_mode'];
  // $doc_year=$_POST['doc_year'];
  $query = "SELECT ITEM as item_code,
  ITEM_NAME,div_name,gen_name,ITEM,PUR_MODE
  FROM ITEM_DETAIL_UM
  WHERE CO_CODE = '$company_code'
  AND  div_code = '$division_code'
  AND  SUBSTR(PUR_MODE,1,1) =  '$purchase_mode'
  ORDER BY ITEM_NAME";
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




