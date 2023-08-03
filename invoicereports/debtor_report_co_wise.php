<?php
session_start();
include("../api/auth/db.php");
require_once __DIR__  . '/../vendor/autoload.php';
require_once __DIR__ . '/../helpers/helpers.php';
$company_code = $_GET['company_code'];
$div_code = $_GET['div_code'];
$zone_code = $_GET['zone_code'];
$acc_code = $_GET['acc_code'];
$from_date = $_GET['from_date'];
$to_date = $_GET['to_date'];

  $query = "Select * from company where co_code = '$company_code' ";
  $results = $conn->query($query);
  $shows=$results->fetch_assoc();
  $companyName = $shows['co_name'];
  // empty division code
  if($div_code == 'null' ){
    $merge_for_div = "";
  }
  else{
    $merge_for_div = " AND DIV_CODE =  '$div_code' ";
  }
          
  // empty zone code
  if($zone_code == 'null'){
    $merge_for_zone = "";
  }
  else{
    $merge_for_zone = " AND ZONE_CODE =  $zone_code ";
  }
          
  // empty account code
  if($acc_code == 'null'){
    $merge_for_account_code = "";
  }
  else{
    $merge_for_account_code = " AND GL_CODE =  $acc_code ";
  }

  $query = "SELECT distinct *
  FROM PARTY_UM_VIEW
  WHERE CO_CODE = '$company_code'
  $merge_for_div
  $merge_for_zone
  $merge_for_account_code
  ORDER BY div_code,zone_code";
  // print_r($query);die();
  $result = $conn->query($query);
$count = mysqli_num_rows($result);

if ($count > 0) {
  $return_data = [];
  while ($show = mysqli_fetch_assoc($result)) {
    $return_data[] = $show;

    $data_tr=''; 
    $data_tr1='';
    // print_r($return_data); die();
    
    $party_code = $return_data[0]['party_code'];
    $party_name = $return_data[0]['party_name'];
    $city_name = $return_data[0]['city_name'];
    $open_debit = $return_data[0]['open_debit'];
    $open_credit = $return_data[0]['open_credit'];
      
  }
  $i = 1;

  $total_balance_open = 0;
  $total_invoice_amt = 0;
  $total_return_amt = 0;
  $total_adjustments = 0;
  $total_total_rcvables = 0;
  $total_paymnt_rcvd = 0;
  $total_chq_return = 0;
  $total_net_rcvd = 0;

  

  $grand_total_balance_open = 0;
  $grand_total_invoice_amt = 0;
  $grand_total_return_amt = 0;
  $grand_total_adjustments = 0;
  $grand_total_total_rcvables = 0;
  $grand_total_paymnt_rcvd = 0;
  $grand_total_chq_return = 0;
  $grand_total_net_rcvd = 0;

  $final_sum_balance_open = 0;
  $final_sum_invoice_amt = 0;
  $final_sum_return_amt = 0;
  $final_sum_adjustments = 0;
  $final_sum_total_rcvables = 0;
  $final_sum_paymnt_rcvd = 0;
  $final_sum_chq_return = 0;
  $final_sum_net_rcvd = 0;
  
  

  $net_cal_open_bal = 0;
  $net_cal_invoice_amt = 0;
  $net_cal_return_amt = 0;
  $net_cal_adjustments = 0;
  $net_cal_total_rcvables = 0;
  $net_cal_paymnt_rcvd = 0;
  $net_cal_chq_return = 0;
  $net_cal_net_rcvd = 0;

  
  $total_rcvd = 0;
  $total_rej = 0;
  $total_ok = 0;

// loop edit

  $gl_code_loop='';

  $division_code_previous_loop = '';
  $zone_code_previous_loop = '';
  
  foreach ($return_data as $value) {
    // print_r($value);die();
    $gl_account = $value['gl_code'];

    $zone_code_new = $value['zone_code'];
    $division_code_new = $value['div_code'];

    $party_code_s = $value['party_code'];
    // first report query for opening
    $act_open_query="select sum(IFNULL(open_debit,0)) - sum(IFNULL(open_credit,0) ) as actopen
    from   party
    where  party_div = '$party_code_s'
    and co_code = '$company_code'";
    //  print_r($act_open_query);die();
    $select_r = $conn->query($act_open_query);
    $show = mysqli_fetch_assoc($select_r);

    $actopen_w = ($show['actopen'])??0;

    $trs_open_query="select sum(IFNULL(debit,0)) - sum(IFNULL(credit,0) ) as trsopen
    from   PARTY_LEDGER_UM
    where  ACCOUNT_CODE = '$party_code_s'
    and    CO_CODE = '$company_code'
    and    VOUCHER_DATE < $from_date;";
    $select_r = $conn->query($trs_open_query);
    $show = mysqli_fetch_assoc($select_r);
    $trsopen = $show['trsopen'] ? $trsopen : '0';

    $todateopen = ($trsopen) + ($actopen_w);

    // end first report query for opening
    // qeuries for data calcuation values
    // invoice amount query (second)
    $invoice_amt_query = "select sum(IFNULL(DEBIT,0)) - sum(IFNULL(CREDIT,0)) AS mamt
    from   PARTY_LEDGER_UM
    where  ACCOUNT_CODE = '$party_code_s'
    and    CO_CODE = '$company_code'
    and    VOUCHER_TYPE = 'DC'
    and    VOUCHER_DATE between '$from_date' and '$to_date';";
    // $show = mysqli_fetch_assoc('');
    // print_r($invoice_amt_query); 
    $select_r = $conn->query($invoice_amt_query);
    $show = mysqli_fetch_assoc($select_r);
    $mamt = $show['mamt'] ??0;
    // end invoice amount query (second)
    
    // return amount query (third)
    $return_amt_query="select sum(IFNULL(CREDIT,0)) - sum(IFNULL(DEBIT,0))
    AS   ramt
    from   PARTY_LEDGER_UM
    where  ACCOUNT_CODE = '$party_code_s'
    and    CO_CODE = '$company_code'
    and    VOUCHER_TYPE = 'RT'
    and    VOUCHER_DATE between '$from_date' and '$to_date'";
    // print_r($return_amt_query);die();
    $select_r = $conn->query($return_amt_query);
    $show = mysqli_fetch_assoc($select_r);
    $ramt = $show['ramt'] ??0;
    // end return amount query (third)

    
    // adjust amount query (FOURTH)
    $adjustment_query="select sum(IFNULL(CREDIT,0)) - sum(IFNULL(debit,0))
    as   adj
    from   PARTY_LEDGER_UM
    where  ACCOUNT_CODE = '$party_code_s'
    and    CO_CODE = '$company_code'
    and    VOUCHER_TYPE IN ('CV','JV','OV','RV')
    and    VOUCHER_DATE between '$from_date' and '$to_date';";
    $select_r = $conn->query($adjustment_query);
    $show = mysqli_fetch_assoc($select_r);
    $adj = $show['adj'] ??0;
    // end adjust amount query (FOURTH)

    // total receivable amount query (fifth)
    $total_rvcdable = $todateopen + ($mamt) - ($ramt) - ($adj);
    // end total receivable amount query (fifth)


    // total payment received amount query (sixth)
    $payment_rcvd_query="select sum(IFNULL(CREDIT,0)) - sum(IFNULL(DEBIT,0))
    as   payrcvd
    from   PARTY_LEDGER_UM
    where  ACCOUNT_CODE = '$party_code_s'
    and    CO_CODE = '$company_code'
    and    VOUCHER_TYPE in ('CR', 'BR','PD') 
    and    VOUCHER_DATE between '$from_date' and  '$to_date';";
    $select_r = $conn->query($payment_rcvd_query);
    $show = mysqli_fetch_assoc($select_r);
    $payrcvd = $show['payrcvd'] ??0;
    // end total payment received amount query (sixth)


    // cheque return query (sixth)
    $chq_returm_query = "select sum(IFNULL(debit,0)) - sum(IFNULL(credit,0)) 
    AS   mamt5
    from   PARTY_LEDGER_UM
    where  ACCOUNT_CODE = '$party_code_s'
    and    CO_CODE = '$company_code'
    and    VOUCHER_TYPE in ('CP', 'BP')
    and   VOUCHER_DATE between '$from_date' and '$to_date' ";
    $select_r = $conn->query($chq_returm_query);
    $show = mysqli_fetch_assoc($select_r);
    $mamt5 = $show['mamt5'] ??0;

    // end cheque return query (sixth)

    // net received amount query (seventh)
    $net_amount = ($payrcvd)-($mamt5);
    // end received amount query (seventh)

    $net_receivable=($total_rvcdable??0)-($net_amount??0);
    


    // division code
    if($division_code_new != $division_code_previous_loop){
     
      //  last Area [A/c Code] Total row
      if($i != 1){
        $data_tr .='</table>
      
        <table style="border: 3px solid black; padding:5px 8px; border:2px solid black; border-top: none;width:100%;background-color: rgba(182, 179, 179, 0.44);font-family:arial;">
          <tr style="border: 0px solid rgb(255, 0, 0) !important ; border-collapse: collapse;">

              <td style = "font-size:14px ;line-height:20px; font-weight: bold;border: 1px solid black ;width:19%; text-align:left"><b>Area [A/c Code] Total</b></td>
              <td style = "font-size:12px ;text-align:right;line-height:20px; font-weight: bold;border: 1px solid black ;width:10%">'.number_format($total_balance_open,2).'</td>
              <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:9%; text-align:right">'.number_format($total_invoice_amt,2).'</td>
              <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:9%; text-align:right">'.number_format($total_return_amt,2).'</td>
              <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:11%; text-align:right">'.number_format($total_adjustments,2).'</td>
              <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:10%; text-align:right">'.number_format($total_total_rcvables,2).'</td>
              <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:11%; text-align:right">'.number_format($total_paymnt_rcvd,2).'</td>
              <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:11%; text-align:right">'.number_format($total_chq_return,2).'</td>
              <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:10%; text-align:right">'.number_format($total_net_rcvd,2).'</td>

          </tr>    
                    
          <tr >
              <td style = "border:none !important;"></td>
          </tr>    
        </table>
        
        <table style="border: 3px solid black; padding:5px 8px; border:2px solid black;width:100%;background-color: rgba(127, 127, 127, 0.692);margin-top: 5px;font-family:arial;">
          <tr style="border: 0px solid rgb(255, 0, 0) !important ; border-collapse: collapse;">
                      <td style = "font-size:14px ;line-height:20px; font-weight: bold;border: 1px solid black ;width:19%; text-align:left"><b>Zone Total</b></td>
                      <td style = "font-size:12px ;text-align:right;line-height:20px; font-weight: bold;border: 1px solid black ;width:10%">'.number_format($total_balance_open,2).'</td>
                      <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:9%; text-align:right">'.number_format($total_invoice_amt,2).'</td>
                      <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:9%; text-align:right">'.number_format($total_return_amt,2).'</td>
                      <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:11%; text-align:right">'.number_format($total_adjustments,2).'</td>
                      <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:10%; text-align:right">'.number_format($total_total_rcvables,2).'</td>
                      <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:11%; text-align:right">'.number_format($total_paymnt_rcvd,2).'</td>
                      <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:11%; text-align:right">'.number_format($total_chq_return,2).'</td>
                      <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:10%; text-align:right">'.number_format($total_net_rcvd,2).'</td>
                    </tr>
                               
                  </table>
                  
                  <table style="border: 3px solid black; padding:5px 5px; border:8px double black;width:100%;background-color: rgba(121, 121, 121, 0.726);margin-top: 5px;font-family:arial;">
                    <tr style="border: 0px solid rgb(255, 0, 0) !important ; border-collapse: collapse;">
                    <td style = "font-size:14px ;line-height:20px; font-weight: bold;border: 1px solid black ;width:19%; text-align:left"><b>Division Total</b></td>
                    <td style = "font-size:12px ;text-align:right;line-height:20px; font-weight: bold;border: 1px solid black ;width:10%">'.number_format($grand_total_balance_open,2).'</td>
                      <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:9%; text-align:right">'.number_format($grand_total_invoice_amt,2).'</td>
                      <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:9%; text-align:right">'.number_format($grand_total_return_amt,2).'</td>
                      <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:11%; text-align:right">'.number_format($grand_total_adjustments,2).'</td>
                      <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:10%; text-align:right">'.number_format($grand_total_total_rcvables,2).'</td>
                      <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:11%; text-align:right">'.number_format($grand_total_paymnt_rcvd,2).'</td>
                      <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:11%; text-align:right">'.number_format($grand_total_chq_return,2).'</td>
                      <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:10%; text-align:right">'.number_format($grand_total_net_rcvd,2).'</td>
                  </tr>
                  <tr>
                  


        ';

          $total_balance_open = 0;
          $total_invoice_amt = 0;
          $total_return_amt = 0;
          $total_adjustments = 0;
          $total_total_rcvables = 0;
          $total_paymnt_rcvd = 0;
          $total_chq_return = 0;
          $total_net_rcvd = 0;

          $grand_total_balance_open = 0;
          $grand_total_invoice_amt = 0;
          $grand_total_return_amt = 0;
          $grand_total_adjustments = 0;
          $grand_total_total_rcvables = 0;
          $grand_total_paymnt_rcvd = 0;
          $grand_total_chq_return = 0;
          $grand_total_net_rcvd = 0;
      
      }

      // heading and names of divisions zones accounts respectively
      
      if($i != 1)
      {
        $data_tr .='</table>

        <pagebreak>
        
            <div class="col-lg-6 col-md-6 col-sm-12" style="margin-top:20px; padding: 3px 0px; background-color: rgb(154, 154, 154); border: 1px solid rgba(128, 128, 128, 0.651); width: 35%;border-radius: 4px;">
                <span class= "" style="font-size:12px">&nbsp; Division Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>'.$value['div_name'].'</b></span>  
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12" style="margin-top:2px; padding: 3px 0px; background-color: rgb(154, 154, 154); border: 1px solid rgba(128, 128, 128, 0.651); width: 35%;border-radius: 4px;">
                <span class = "" style="font-size:12px">&nbsp; Zone Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>'.$value['zone_name'].'</b></span>  
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12" style="margin-top:2px; padding: 3px 0px; background-color: rgb(154, 154, 154); border: 1px solid rgba(128, 128, 128, 0.651); width: 35%;border-radius: 4px;">
                <span class = "" style="font-size:12px">&nbsp; Account Name:&nbsp;&nbsp;&nbsp;&nbsp; <b>'.$value['gl_name'].'</b></span>  
            </div>

            <br>

            <table style="border: 3px solid black; padding:10px;width:100%;font-family:arial;">
                <tr style="border: 2px solid black ;">
                    <th style = " font-size:17px;border: 2px solid black ;width:12%;text-align:left"> Party Name</th>
                    <th style = " font-size:17px;text-align:center;border: 2px solid black ;width:11%">Opening Bal</th>
                    <th style = " font-size:17px;text-align:center;border: 2px solid black ;width:11%">Invoice Amt</th>
                    <th style = " font-size:17px;text-align:center;border: 2px solid black ;width:11%">Return Amt</th>
                    <th style = " font-size:17px;text-align:center;border: 2px solid black ;width:11%">Adjustments</th>
                    <th style = " font-size:17px;text-align:center;border: 2px solid black ;width:11%">Tot Rcvabl</th>
                    <th style = " font-size:17px;text-align:center;border: 2px solid black ;width:11%">Pymnt Rcvd</th>
                    <th style = " font-size:17px;text-align:center;border: 2px solid black ;width:11%">Chq Return</th>
                    <th style = " font-size:17px;text-align:center;border: 2px solid black ;width:11%">Net Rcvd</th>
                </tr>

                <tr>
                    <th style = " font-size:16px;line-height:10px;border: 0px solid red ;width:25%;text-align:left"> &nbsp; </th>
                    <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:13%"> </th>
                    <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:12%"></th>
                    <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:12%"></th>
                    <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:14%"></th>
                    <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:14%"></th>
                    <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:14%"> </th>
                    <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:14%"></th>
                    <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:14%"> </th>
                </tr>
                
      ';
      }
      else{
        $data_tr .='</table>

            <div class="col-lg-6 col-md-6 col-sm-12" style="margin-top:20px; padding: 3px 0px; background-color: rgb(154, 154, 154); border: 1px solid rgba(128, 128, 128, 0.651); width: 35%;border-radius: 4px;">
                <span class= "" style="font-size:12px">&nbsp; Division Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>'.$value['div_name'].'</b></span>  
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12" style="margin-top:2px; padding: 3px 0px; background-color: rgb(154, 154, 154); border: 1px solid rgba(128, 128, 128, 0.651); width: 35%;border-radius: 4px;">
                <span class = "" style="font-size:12px">&nbsp; Zone Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>'.$value['zone_name'].'</b></span>  
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12" style="margin-top:2px; padding: 3px 0px; background-color: rgb(154, 154, 154); border: 1px solid rgba(128, 128, 128, 0.651); width: 35%;border-radius: 4px;">
                <span class = "" style="font-size:12px">&nbsp; Account Name:&nbsp;&nbsp;&nbsp;&nbsp; <b>'.$value['gl_name'].'</b></span>  
            </div>

            <br>

            <table style="border: 3px solid black; padding:10px;width:100%;font-family:arial;">
                <tr style="border: 2px solid black ;">
                    <th style = " font-size:17px;border: 2px solid black ;width:12%;text-align:left"> Party Name</th>
                    <th style = " font-size:17px;text-align:center;border: 2px solid black ;width:11%">Opening Bal</th>
                    <th style = " font-size:17px;text-align:center;border: 2px solid black ;width:11%">Invoice Amt</th>
                    <th style = " font-size:17px;text-align:center;border: 2px solid black ;width:11%">Return Amt</th>
                    <th style = " font-size:17px;text-align:center;border: 2px solid black ;width:11%">Adjustments</th>
                    <th style = " font-size:17px;text-align:center;border: 2px solid black ;width:11%">Tot Rcvabl</th>
                    <th style = " font-size:17px;text-align:center;border: 2px solid black ;width:11%">Pymnt Rcvd</th>
                    <th style = " font-size:17px;text-align:center;border: 2px solid black ;width:11%">Chq Return</th>
                    <th style = " font-size:17px;text-align:center;border: 2px solid black ;width:11%">Net Rcvd</th>
                </tr>

                <tr>
                    <th style = " font-size:16px;line-height:10px;border: 0px solid red ;width:25%;text-align:left"> &nbsp; </th>
                    <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:13%"> </th>
                    <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:12%"></th>
                    <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:12%"></th>
                    <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:14%"></th>
                    <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:14%"></th>
                    <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:14%"> </th>
                    <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:14%"></th>
                    <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:14%"> </th>
                </tr>
                
      ';
      }
      
    }


    // zone code
    else if($zone_code_new != $zone_code_previous_loop){
      //  last Area [A/c Code] Total row
      if($i != 1){
        $data_tr .='</table>
      
        <table style="border: 3px solid black; padding:5px 8px; border:2px solid rgb(0, 0, 0); border-top: none;width:100%;background-color: rgba(182, 179, 179, 0.44);font-family:arial;">
          <tr style="border: 0px solid rgb(255, 0, 0) !important ; border-collapse: collapse;">

              <td style = "font-size:14px ;line-height:20px; font-weight: bold;border: 1px solid black ;width:19%; text-align:left"><b>Area [A/c Code] Total</b></td>
              <td style = "font-size:12px ;text-align:right;line-height:20px; font-weight: bold;border: 1px solid black ;width:10%">'.number_format($total_balance_open,2).'</td>
              <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:9%; text-align:right">'.number_format($total_invoice_amt,2).'</td>
              <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:9%; text-align:right">'.number_format($total_return_amt,2).'</td>
              <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:11%; text-align:right">'.number_format($total_adjustments,2).'</td>
              <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:10%; text-align:right">'.number_format($total_total_rcvables,2).'</td>
              <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:11%; text-align:right">'.number_format($total_paymnt_rcvd,2).'</td>
              <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:11%; text-align:right">'.number_format($total_chq_return,2).'</td>
              <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:10%; text-align:right">'.number_format($total_net_rcvd,2).'</td>

          </tr>    
                 
          
          </table>
        
          <table style="border: 3px solid black; padding:5px 8px; border:2px solid black;width:100%;background-color: rgba(127, 127, 127, 0.692);margin-top: 5px;font-family:arial;">
                      <tr style="border: 0px solid rgb(255, 0, 0) !important ; border-collapse: collapse;">
                        <td style = "font-size:14px ;line-height:20px; font-weight: bold;border: 1px solid black ;width:19%; text-align:left"><b>Zone Total</b></td>
                        <td style = "font-size:12px ;text-align:right;line-height:20px; font-weight: bold;border: 1px solid black ;width:10%">'.number_format($total_balance_open,2).'</td>
                        <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:9%; text-align:right">'.number_format($total_invoice_amt,2).'</td>
                        <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:9%; text-align:right">'.number_format($total_return_amt,2).'</td>
                        <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:11%; text-align:right">'.number_format($total_adjustments,2).'</td>
                        <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:10%; text-align:right">'.number_format($total_total_rcvables,2).'</td>
                        <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:11%; text-align:right">'.number_format($total_paymnt_rcvd,2).'</td>
                        <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:11%; text-align:right">'.number_format($total_chq_return,2).'</td>
                        <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:10%; text-align:right">'.number_format($total_net_rcvd,2).'</td>
                      </tr>
                                  
  
           
        ';

        // php code for the table

        
          $total_balance_open = 0;
          $total_invoice_amt = 0;
          $total_return_amt = 0;
          $total_adjustments = 0;
          $total_total_rcvables = 0;
          $total_paymnt_rcvd = 0;
          $total_chq_return = 0;
          $total_net_rcvd = 0;
      
      }

      // heading and names of divisions zones accounts respectively
      $data_tr .='</table>

            
            <br>
            <br>
            <div class="col-lg-6 col-md-6 col-sm-12" style="margin-top:2px; padding: 3px 0px;">
                <span class = "" style="font-size:12px">&nbsp; Zone Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>'.$value['zone_name'].'</b></span>  
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12" style="margin-top:2px; padding: 3px 0px;">
                <span class = "" style="font-size:12px">&nbsp; Account Name:&nbsp;&nbsp;&nbsp;&nbsp; <b>'.$value['gl_name'].'</b></span>  
            </div>

            <br>

            <table style="border: 3px solid black; padding:10px;width:100%;font-family:arial;">
                <tr style="border: 2px solid black ;">
                    <th style = " font-size:17px;border: 2px solid black ;width:12%;text-align:left"> Party Name</th>
                    <th style = " font-size:17px;text-align:center;border: 2px solid black ;width:11%">Opening Bal</th>
                    <th style = " font-size:17px;text-align:center;border: 2px solid black ;width:11%">Invoice Amt</th>
                    <th style = " font-size:17px;text-align:center;border: 2px solid black ;width:11%">Return Amt</th>
                    <th style = " font-size:17px;text-align:center;border: 2px solid black ;width:11%">Adjustments</th>
                    <th style = " font-size:17px;text-align:center;border: 2px solid black ;width:11%">Tot Rcvabl</th>
                    <th style = " font-size:17px;text-align:center;border: 2px solid black ;width:11%">Pymnt Rcvd</th>
                    <th style = " font-size:17px;text-align:center;border: 2px solid black ;width:11%">Chq Return</th>
                    <th style = " font-size:17px;text-align:center;border: 2px solid black ;width:11%">Net Rcvd</th>
                </tr>

                <tr>
                    <th style = " font-size:16px;line-height:10px;border: 0px solid red ;width:25%;text-align:left"> &nbsp; </th>
                    <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:13%"> </th>
                    <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:12%"></th>
                    <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:12%"></th>
                    <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:14%"></th>
                    <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:14%"></th>
                    <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:14%"> </th>
                    <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:14%"></th>
                    <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:14%"> </th>
                </tr>

                
      ';
    }
      
    
    
      // account code
    else if($gl_account != $gl_code_loop){
        
      
      
      //  last Area [A/c Code] Total row
        if($i != 1){
          $data_tr .='</table>
        
          <table style="border: 3px solid black; padding:5px 8px; border:2px solid black; border-top: none;width:100%;background-color: rgba(182, 179, 179, 0.44);font-family:arial;">
            <tr style="border: 0px solid rgb(255, 0, 0) !important ; border-collapse: collapse;">

                <td style = "font-size:14px ;line-height:20px; font-weight: bold;border: 1px solid black ;width:19%; text-align:left"><b>Area [A/c Code] Total</b></td>
                <td style = "font-size:12px ;text-align:right;line-height:20px; font-weight: bold;border: 1px solid black ;width:10%">'.number_format($total_balance_open,2).'</td>
                <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:9%; text-align:right">'.number_format($total_invoice_amt,2).'</td>
                <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:9%; text-align:right">'.number_format($total_return_amt,2).'</td>
                <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:11%; text-align:right">'.number_format($total_adjustments,2).'</td>
                <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:10%; text-align:right">'.number_format($total_total_rcvables,2).'</td>
                <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:11%; text-align:right">'.number_format($total_paymnt_rcvd,2).'</td>
                <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:11%; text-align:right">'.number_format($total_chq_return,2).'</td>
                <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:10%; text-align:right">'.number_format($total_net_rcvd,2).'</td>

            </tr>    
                      
            <tr >
                <td style = "border:none !important;"></td>
            </tr>    
                              
          ';

            $total_balance_open = 0;
            $total_invoice_amt = 0;
            $total_return_amt = 0;
            $total_adjustments = 0;
            $total_total_rcvables = 0;
            $total_paymnt_rcvd = 0;
            $total_chq_return = 0;
            $total_net_rcvd = 0;
        
        }

        // heading and names of divisions zones accounts respectively
        $data_tr .='</table> 

            <div class="col-lg-6 col-md-6 col-sm-12" style="margin-top:20px; padding: 3px 0px; background-color: rgb(154, 154, 154); border: 1px solid rgba(128, 128, 128, 0.651); width: 35%;border-radius: 4px;">
                  <span class= "" style="font-weight:bold;font-size:12px">&nbsp; Division Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$value['div_name'].'</span>  
              </div>

            <div class="col-lg-6 col-md-6 col-sm-12" style="margin-top:2px; padding: 3px 0px; background-color: rgb(154, 154, 154); border: 1px solid rgba(128, 128, 128, 0.651); width: 35%;border-radius: 4px;">
                  <span class = "" style="font-weight:bold;font-size:12px">&nbsp; Zone Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$value['zone_name'].'</span>  
              </div>

            <div class="col-lg-6 col-md-6 col-sm-12" style="margin-top:2px; padding: 3px 0px; background-color: rgb(154, 154, 154); border: 1px solid rgba(128, 128, 128, 0.651); width: 35%;border-radius: 4px;">
                  <span class = "" style="font-weight:bold;font-size:12px">&nbsp; Account Name:&nbsp;&nbsp;&nbsp;&nbsp; '.$value['gl_name'].'</span>  
              </div>

              <br>

              <table style="border: 3px solid black; padding:10px;width:100%;font-family:arial;">
                  <tr style="border: 2px solid black ;">
                      <th style = " font-size:17px;border: 2px solid black ;width:12%;text-align:left"> Party Name</th>
                      <th style = " font-size:17px;text-align:center;border: 2px solid black ;width:11%">Opening Bal</th>
                      <th style = " font-size:17px;text-align:center;border: 2px solid black ;width:11%">Invoice Amt</th>
                      <th style = " font-size:17px;text-align:center;border: 2px solid black ;width:11%">Return Amt</th>
                      <th style = " font-size:17px;text-align:center;border: 2px solid black ;width:11%">Adjustments</th>
                      <th style = " font-size:17px;text-align:center;border: 2px solid black ;width:11%">Tot Rcvabl</th>
                      <th style = " font-size:17px;text-align:center;border: 2px solid black ;width:11%">Pymnt Rcvd</th>
                      <th style = " font-size:17px;text-align:center;border: 2px solid black ;width:11%">Chq Return</th>
                      <th style = " font-size:17px;text-align:center;border: 2px solid black ;width:11%">Net Rcvd</th>
                  </tr>

                  <tr>
                      <th style = " font-size:16px;line-height:10px;border: 0px solid red ;width:25%;text-align:left"> &nbsp; </th>
                      <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:13%"> </th>
                      <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:12%"></th>
                      <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:12%"></th>
                      <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:14%"></th>
                      <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:14%"></th>
                      <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:14%"> </th>
                      <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:14%"></th>
                      <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:14%"> </th>
                  </tr>
        ';
    }


    // $todateopen = 100;
    // $mamt = 200;
    // $ramt = 300;
    // $adj = 4000;
    // $total_rvcdable = 500;
    // $payrcvd = 600;
    // $mamt5 = 700;
    // $net_amount = 800;
    
    $data_tr .='
    
              <tr id = "" style="border:2px solid black;" >
                  <td style = "font-size:16px ;line-height:20px;border: 1px solid black ;width:12%; text-align:left">'.$value['party_name'].'</td>
                  <td style = "font-size:16px ;text-align:right;line-height:20px;border: 1px solid black ;width:11%">'.number_format($todateopen,2).'</td>
                  <td style = "font-size:16px ;text-align:center;line-height:20px;border: 1px solid black ;width:11%; text-align:right">'.number_format($mamt,2).'</td>
                  <td style = "font-size:16px ;text-align:center;line-height:20px;border: 1px solid black ;width:11%; text-align:right">'.number_format($ramt,2).'</td>
                  <td style = "font-size:16px ;text-align:center;line-height:20px;border: 1px solid black ;width:11%; text-align:right">'.number_format($adj,2).'</td>
                  <td style = "font-size:16px ;text-align:center;line-height:20px;border: 1px solid black ;width:11%; text-align:right">'.number_format($total_rvcdable,2).'</td>
                  <td style = "font-size:16px ;text-align:center;line-height:20px;border: 1px solid black ;width:11%; text-align:right">'.number_format($payrcvd,2).'</td>
                  <td style = "font-size:16px ;text-align:center;line-height:20px;border: 1px solid black ;width:11%; text-align:right">'.number_format($mamt5, 2).'</td>
                  <td style = "font-size:16px ;text-align:center;line-height:20px;border: 1px solid black ;width:11%; text-align:right">'.number_format($net_amount, 2).'</td>
              </tr>

              <tr>
                  <td style = "border:none !important;"></td>
              </tr>            
    ';
     
   
    
    $gl_code_loop = $gl_account;
    $zone_code_previous_loop = $zone_code_new;
    $division_code_previous_loop = $division_code_new;


    $total_balance_open = $total_balance_open + $todateopen;
    $total_invoice_amt = $total_invoice_amt + $mamt;
    $total_return_amt = $total_return_amt + $ramt;
    $total_adjustments = $total_adjustments + $adj;
    $total_total_rcvables = $total_total_rcvables + $total_rvcdable;
    $total_paymnt_rcvd = $total_paymnt_rcvd + $payrcvd;
    $total_chq_return = $total_chq_return + $mamt5;
    $total_net_rcvd = $total_net_rcvd + $net_amount;

    $grand_total_balance_open = $grand_total_balance_open + $todateopen;
    $grand_total_invoice_amt = $grand_total_invoice_amt + $mamt;
    $grand_total_return_amt = $grand_total_return_amt + $ramt;
    $grand_total_adjustments = $grand_total_adjustments + $adj;
    $grand_total_total_rcvables = $grand_total_total_rcvables + $total_rvcdable;
    $grand_total_paymnt_rcvd = $grand_total_paymnt_rcvd + $payrcvd;
    $grand_total_chq_return = $grand_total_chq_return + $mamt5;
    $grand_total_net_rcvd = $grand_total_net_rcvd + $net_amount;


    $net_cal_open_bal = $net_cal_open_bal + $todateopen;
    $net_cal_invoice_amt = $net_cal_invoice_amt + $mamt;
    $net_cal_return_amt = $net_cal_return_amt + $ramt;
    $net_cal_adjustments = $net_cal_adjustments + $adj;
    $net_cal_total_rcvables = $net_cal_total_rcvables + $total_rvcdable;
    $net_cal_paymnt_rcvd = $net_cal_paymnt_rcvd + $payrcvd;
    $net_cal_chq_return = $net_cal_chq_return + $mamt5;
    $net_cal_net_rcvd = $net_cal_net_rcvd + $net_amount;

    ++$i;
   
  }

  $data_tr .='</table>';


      $data_tr .='
              <table style="border: 3px solid black; padding:5px 8px; border:2px solid black; border-top: none;width:100%;background-color: rgba(182, 179, 179, 0.44);font-family:arial;">
                  <tr style="border: 0px solid rgb(255, 0, 0) !important ; border-collapse: collapse;">
                      <td style = "font-size:14px ;line-height:20px; font-weight: bold;border: 1px solid black ;width:19%; text-align:left"><b>Area [A/c Code] Total</b></td>
                      <td style = "font-size:12px ;text-align:right;line-height:20px; font-weight: bold;border: 1px solid black ;width:10%">'.number_format($total_balance_open,2).'</td>
                      <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:9%; text-align:right">'.number_format($total_invoice_amt,2).'</td>
                      <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:9%; text-align:right">'.number_format($total_return_amt,2).'</td>
                      <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:11%; text-align:right">'.number_format($total_adjustments,2).'</td>
                      <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:10%; text-align:right">'.number_format($total_total_rcvables,2).'</td>
                      <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:11%; text-align:right">'.number_format($total_paymnt_rcvd,2).'</td>
                      <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:11%; text-align:right">'.number_format($total_chq_return,2).'</td>
                      <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:10%; text-align:right">'.number_format($total_net_rcvd,2).'</td>

                </tr>
                      
                <tr >
                  <td style = "border:none !important;"></td>
                </tr>            
                   
            </table>'
      ;
      

  $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
  $mpdf->setFooter('{PAGENO}');
  $mpdf->setFooter('{PAGENO}');
  $stylesheet = file_get_contents('account_subsidary.css');
      // $mpdf->SetWatermarkText('Sufyan Accountant');
      // $mpdf->showWatermarkText = true;
  $mpdf->WriteHTML($stylesheet, 1);
  date_default_timezone_set("Asia/Karachi"); 
  $today = date("l F j G:i:s ");
  $mpdf->WriteHTML('
    <div class="row" style="line-height:16px;font-family:arial;">
      <div class="main-heading">
      </div>
        
      <div class="main-heading">
        <div class = " col-lg-6 col-md-6 col-sm-12" style="border-bottom: 4px solid black;margin-top:10px; padding-bottom:5px">
          <span class = "" style="font-size:18px; font-weight:500"></span>  
          <span class = "" style="font-size:20px; font-weight:bold">Debtor Summary Report</span>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <span class = "" style="font-size:15px; border:2px solid gray">&nbsp; '.$to_date.' &nbsp;</span>  
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;
          <span class = "" style="font-size:15px; border:2px solid gray">&nbsp; '.$from_date.' &nbsp;</span>
        </div>
        
      </div>

      <div class="invoice_detail" >
        <table>
          ' . $data_tr . '<br>
       
          <table style="border: 3px solid black; padding:5px 8px; border:2px solid black;width:100%;background-color: rgba(127, 127, 127, 0.692);margin-top: 5px;font-family:arial;">
            <tr style="border: 0px solid rgb(255, 0, 0) !important ; border-collapse: collapse;">
                      <td style = "font-size:14px ;line-height:20px; font-weight: bold;border: 1px solid black ;width:19%; text-align:left"><b>Zone Total</b></td>
                      <td style = "font-size:12px ;text-align:right;line-height:20px; font-weight: bold;border: 1px solid black ;width:10%">'.number_format($grand_total_balance_open,2).'</td>
                      <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:9%; text-align:right">'.number_format($grand_total_invoice_amt,2).'</td>
                      <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:9%; text-align:right">'.number_format($grand_total_return_amt,2).'</td>
                      <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:11%; text-align:right">'.number_format($grand_total_adjustments,2).'</td>
                      <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:10%; text-align:right">'.number_format($grand_total_total_rcvables,2).'</td>
                      <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:11%; text-align:right">'.number_format($grand_total_paymnt_rcvd,2).'</td>
                      <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:11%; text-align:right">'.number_format($grand_total_chq_return,2).'</td>
                      <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 1px solid black ;width:10%; text-align:right">'.number_format($grand_total_net_rcvd,2).'</td>
                    </tr>
                           
                  </table>
                  
                  <table style="border: 3px solid black; padding:5px 8px; border:8px double black;width:100%;background-color: rgba(121, 121, 121, 0.756);margin-top: 5px;font-family:arial;">
                    <tr style="border: 0px solid rgb(255, 0, 0) !important ; border-collapse: collapse;">
                    <td style = "font-size:14px ;line-height:20px;font-weight: bold;border: 1px solid black ;width:19%; text-align:left"><b>Division Total</b></td>
                    <td style = "font-size:12px ;text-align:right;line-height:20px;font-weight: bold;border: 1px solid black ;width:10%">'.number_format($grand_total_balance_open,2).'</td>
                      <td style = "font-size:12px ;text-align:center;line-height:20px;font-weight: bold;border: 1px solid black ;width:9%; text-align:right">'.number_format($grand_total_invoice_amt,2).'</td>
                      <td style = "font-size:12px ;text-align:center;line-height:20px;font-weight: bold;border: 1px solid black ;width:9%; text-align:right">'.number_format($grand_total_return_amt,2).'</td>
                      <td style = "font-size:12px ;text-align:center;line-height:20px;font-weight: bold;border: 1px solid black ;width:11%; text-align:right">'.number_format($grand_total_adjustments,2).'</td>
                      <td style = "font-size:12px ;text-align:center;line-height:20px;font-weight: bold;border: 1px solid black ;width:10%; text-align:right">'.number_format($grand_total_total_rcvables,2).'</td>
                      <td style = "font-size:12px ;text-align:center;line-height:20px;font-weight: bold;border: 1px solid black ;width:11%; text-align:right">'.number_format($grand_total_paymnt_rcvd,2).'</td>
                      <td style = "font-size:12px ;text-align:center;line-height:20px;font-weight: bold;border: 1px solid black ;width:11%; text-align:right">'.number_format($grand_total_chq_return,2).'</td>
                      <td style = "font-size:12px ;text-align:center;line-height:20px;font-weight: bold;border: 1px solid black ;width:10%; text-align:right">'.number_format($grand_total_net_rcvd,2).'</td>
                  </tr>
                  <tr>
                  
                  </table>



                  <hr>

                  <table style="border: 3px solid black; padding:6px; border: 6px solid black; width:100%;background-color: rgba(69, 69, 69, 0.638);font-family:arial;">
                    <tr style="border: 0px solid rgb(255, 0, 0) !important ; border-collapse: collapse;">
                        <td style = "font-size:14px ;line-height:20px; font-weight: bold;border: 3px solid black ;width:19%; text-align:left"><b>Report Total</b></td>
                        <td style = "font-size:12px ;text-align:right;line-height:20px; font-weight: bold;border: 3px solid black ;width:10%">'.number_format($net_cal_open_bal,2).'</td>
                        <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 3px solid black ;width:9%; text-align:right">'.number_format($net_cal_invoice_amt,2).'</td>
                        <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 3px solid black ;width:9%; text-align:right">'.number_format($net_cal_return_amt,2).'</td>
                        <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 3px solid black ;width:11%; text-align:right">'.number_format($net_cal_adjustments,2).'</td>
                        <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 3px solid black ;width:10%; text-align:right">'.number_format($net_cal_total_rcvables,2).'</td>
                        <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 3px solid black ;width:11%; text-align:right">'.number_format($net_cal_paymnt_rcvd,2).'</td>
                        <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 3px solid black ;width:11%; text-align:right">'.number_format($net_cal_chq_return,2).'</td>
                        <td style = "font-size:12px ;text-align:center;line-height:20px; font-weight: bold;border: 3px solid black ;width:10%; text-align:right">'.number_format($net_cal_net_rcvd,2).'</td>
                    </tr>
                    <tr>
                      
                </table>

      </div>
    </div>
    </div>
     </div>
    ', 2);
    $mpdf->Output();
} else {
  echo "form no required";
}