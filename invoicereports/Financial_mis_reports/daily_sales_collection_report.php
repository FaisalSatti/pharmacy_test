<?php
session_start();
include("../../api/auth/db.php");
require_once __DIR__  . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../helpers/helpers.php';
$company_code = $_GET['company_code'];
$company_name = $_GET['company_name'];
$division_code = $_GET['division_code'];
$division_name = $_GET['division_name'];
$zone_code = $_GET['zone_code'];
$zone_name = $_GET['zone_name'];
$account_code = $_GET['account_code'];
$account_name = $_GET['account_name'];
$from_date = $_GET['from_date'];
$to_date = $_GET['to_date'];
$query = "Select * from company where co_code = '$company_code' ";
$results = $conn->query($query);
$shows = $results->fetch_assoc();
$companyName = $shows['co_name'];
if ($division_code == 'null') {
  $merge_for_div = "";
} else {
  $merge_for_div = " AND DIV_CODE =  '$division_code' ";
}
if ($zone_code == 'null') {
  $merge_for_zone = "";
} else {
  $merge_for_zone = " AND ZONE_CODE =  $zone_code ";
}
if ($account_code == 'null') {
  $merge_for_account_code = "";
} else {
  $merge_for_account_code = " AND GL_CODE =  $account_code ";
}
$query = "SELECT distinct *
        FROM PARTY_UM_VIEW
        WHERE CO_CODE = '$company_code'
        $merge_for_div
        $merge_for_zone
        $merge_for_account_code
        ORDER BY GL_CODE
        ";
$result = $conn->query($query);
$count = mysqli_num_rows($result);
if ($count > 0) {
  $return_data = [];
  while ($show = mysqli_fetch_assoc($result)) {
    $return_data[] = $show;
    $data_tr = '';
    $data_tr1 = '';
    $party_code = $return_data[0]['party_code'];
    $party_name = $return_data[0]['party_name'];
    $city_name = $return_data[0]['city_name'];
    $open_debit = $return_data[0]['open_debit'];
    $open_credit = $return_data[0]['open_credit'];
  }
  $i = 1;
  $total_invoice_amt = 0;
  $total_return_amt = 0;
  $total_adjustments = 0;
  $total_total_rcvables = 0;
  $total_paymnt_rcvd = 0;
  $total_chq_return = 0;
  $total_net_rcvd = 0;
  $grand_total_invoice_amt = 0;
  $grand_total_return_amt = 0;
  $grand_total_adjustments = 0;
  $grand_total_total_rcvables = 0;
  $grand_total_paymnt_rcvd = 0;
  $grand_total_chq_return = 0;
  $grand_total_net_rcvd = 0;
  $total_rej = 0;
  $total_ok = 0;
  $gl_code_loop = '';
  foreach ($return_data as $value) {
    $gl_account = $value['gl_code'];
    if ($gl_account != $gl_code_loop) {
      $invoice_amt_query = "select sum(IFNULL(debit,0)) - sum(IFNULL(credit,0)) AS mamt
              from   party_ledger_um
              where  account_code = '$party_code'
              and    co_code = '$company_code'
              and    voucher_type = 'DC'
              and    voucher_date between '$from_date' and '$to_date' ";
      $select_r = $conn->query($invoice_amt_query);
      $show = mysqli_fetch_assoc($select_r);
      $mamt = $show['mamt'] ? $mamt : '0';
      $return_amt_query = "select sum(IFNULL(credit,0)) - sum(IFNULL(debit,0)) AS mamt2
              from   party_ledger_um
              where  account_code = '$party_code'
              and    co_code = '$company_code'
              and    voucher_type = 'RT'
              and    voucher_date between '$from_date' and '$to_date' ";
      $select_r = $conn->query($return_amt_query);
      $show = mysqli_fetch_assoc($select_r);
      $mamt2 = $show['mamt2'] ? $mamt2 : '0';
      $adjustment_query = "select sum(IFNULL(credit,0)) - sum(IFNULL(debit,0))
              AS   mamt3
              from   party_ledger_um
              where  account_code = '$party_code'
              and    co_code = '$company_code'
              and    voucher_type IN ('CV','JV','OV','RV')
              and    voucher_date between '$from_date' and '$to_date' ";
      $select_r = $conn->query($adjustment_query);
      $show = mysqli_fetch_assoc($select_r);
      $mamt3 = $show['mamt3'] ? $mamt3 : '0';
      $total_rcvable = ($mamt) - ($mamt2) - ($mamt3);
      $pymnt_rcvd_query = "select sum(IFNULL(credit,0)) - sum(IFNULL(debit,0))
              as   mamt4
              from   party_ledger_um
              where  account_code = '$party_code'
              and    co_code = '$company_code'
              and    voucher_type in ('CR', 'BR') 
              and    voucher_date between '$from_date' and '$to_date' ";
      $select_r = $conn->query($pymnt_rcvd_query);
      $show = mysqli_fetch_assoc($select_r);
      $mamt4 = $show['mamt4'] ? $mamt4 : '0';
      $chq_returm_query = "select sum(IFNULL(debit,0)) - sum(IFNULL(credit,0)) 
              AS   mamt5
              from   party_ledger_um
              where  account_code = '$party_code'
              and    co_code = '$company_code'
              and    voucher_type in ('CP', 'BP')
              and   voucher_date between '$from_date' and '$to_date' ";
      $select_r = $conn->query($chq_returm_query);
      $show = mysqli_fetch_assoc($select_r);
      $mamt5 = $show['mamt5'] ? $mamt5 : '0';
      $net_amount = ($mamt4) - ($mamt5);
      if ($i != 1) {
        $data_tr .= '</table>
                  <table style="border: 3px solid black; padding:10px; border-top: none;font-family:arial;">
                  <tr style="border: 0px solid rgb(255, 0, 0) !important ; border-collapse: collapse;">
                      <th colspan="2" style = " font-size:14px;border: 2px solid black ;width:45%;text-align:center">  Area [A/c Code] Total</th>
                      <!-- <th style = " font-size:14px;text-align:center;border: 2px solid black ;width:13%"> Calculations</th> -->
                      <th style = " font-size:12px;text-align:center;border: 0px solid black ; text-align: right;width:15%"> &nbsp;</th>
                      <th style = " font-size:12px;text-align:center;border: 2px solid black ; text-align: right;width:15%"> ' . number_format($total_invoice_amt, 2) . '</th>
                      <th style = " font-size:12px;text-align:center;border: 2px solid black ; text-align: right;width:15%"> ' . number_format($total_return_amt, 2) . '</th>
                      <th style = " font-size:12px;text-align:center;border: 2px solid black ; text-align: right;width:16%"> ' . number_format($total_adjustments, 2) . '</th>
                      <th style = " font-size:12px;text-align:center;border: 2px solid black ; text-align: right;width:16%"> ' . number_format($total_total_rcvables, 2) . '</th>
                      <th style = " font-size:12px;text-align:center;border: 2px solid black ; text-align: right;width:16%"> ' . number_format($total_paymnt_rcvd, 2) . '</th>
                      <th style = " font-size:12px;text-align:center;border: 2px solid black ; text-align: right;width:16%"> ' . number_format($total_chq_return, 2) . '</th>
                      <th style = " font-size:12px;text-align:center;border: 2px solid black ; text-align: right;width:16%"> ' . number_format($total_net_rcvd, 2) . '</th>
                  </tr>
                    <tr >
                        <td style = "border:none !important;"></td>
                    </tr>  ';
        $total_invoice_amt = 0;
        $total_return_amt = 0;
        $total_adjustments = 0;
        $total_total_rcvables = 0;
        $total_paymnt_rcvd = 0;
        $total_chq_return = 0;
        $total_net_rcvd = 0;
      }
      $data_tr .= '</table>
                        <div class = " col-lg-6 col-md-6 col-sm-12" style="margin-top:20px;">
                            <span class = "" style="font-size:13px">&nbsp; Division Code:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <span style="font-weight: bold;">' . $value['div_name'] . '</span></span>  
                        </div>
                        <div class = " col-lg-6 col-md-6 col-sm-12" style="margin-top:2px;">
                            <span class = "" style="font-size:13px">&nbsp; Zone Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="font-weight: bold;">' . $value['zone_name'] . '</span></span>  
                        </div>
                        <div class = " col-lg-6 col-md-6 col-sm-12" style="margin-top:2px;">
                            <span class = "" style="font-size:13px">&nbsp; Account Name:&nbsp;&nbsp;&nbsp;&nbsp; <span style="font-weight: bold;">' . $value['gl_name'] . '</span></span>  
                        </div>
                        <br>
                        <br>
                        <table style="border: 3px solid black; padding:10px; font-family:arial;">
                                 <tr style="border: 2px solid black ;">
                                   <th style = " font-size:16px;border: 2px solid black ;width:23%;text-align:left"> Party Name</th>
                                   <th style = " font-size:16px;text-align:center;border: 2px solid black ;width:13%">Party Code</th>
                                   <th style = " font-size:16px;text-align:center;border: 2px solid black ;width:15%">City Name</th>
                                   <th style = " font-size:16px;text-align:center;border: 2px solid black ;width:15%">Invoice Amt</th>
                                   <th style = " font-size:16px;text-align:center;border: 2px solid black ;width:15%">Return Amt</th>
                                   <th style = " font-size:16px;text-align:center;border: 2px solid black ;width:16%">Adjustments</th>
                                   <th style = " font-size:16px;text-align:center;border: 2px solid black ;width:16%">Tot Rcvabl</th>
                                   <th style = " font-size:16px;text-align:center;border: 2px solid black ;width:16%">Pymnt Rcvd</th>
                                   <th style = " font-size:16px;text-align:center;border: 2px solid black ;width:16%">Chq Return</th>
                                   <th style = " font-size:16px;text-align:center;border: 2px solid black ;width:16%">Net Rcvd</th>
                               </tr>
                               <tr>
                        <th style = " font-size:16px;line-height:10px;border: 0px solid red ;width:25%;text-align:left"> &nbsp; </th>
                        <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:13%"> </th>
                        <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:15%"> </th>
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
    $data_tr .= '
                        <tr id = "" style="border:2px solid black;" >
                        <td style = "font-size:15px ;line-height:20px;border: 1px solid black ;width:25%; text-align:left">' . $value['party_name'] . '</td>
                        <td style = "font-size:15px ;text-align:center;line-height:20px;border: 1px solid black ;width:13%">' . $value['party_code'] . '</td>
                        <td style = "font-size:15px ;text-align:center;line-height:20px;border: 1px solid black ;width:15%">' . $value['city_name'] . ' </td>
                        <td style = "font-size:15px ;text-align:center;line-height:20px;border: 1px solid black ;width:12%; text-align:right">' . number_format($mamt, 2) . '</td>
                        <td style = "font-size:15px ;text-align:center;line-height:20px;border: 1px solid black ;width:12%; text-align:right">' . number_format($mamt2, 2) . '</td>
                        <td style = "font-size:15px ;text-align:center;line-height:20px;border: 1px solid black ;width:14%; text-align:right">' . number_format($mamt3, 2) . '</td>
                        <td style = "font-size:15px ;text-align:center;line-height:20px;border: 1px solid black ;width:14%; text-align:right">' . number_format($total_rcvable, 2) . '</td>
                        <td style = "font-size:15px ;text-align:center;line-height:20px;border: 1px solid black ;width:14%; text-align:right">' . number_format($mamt4, 2) . '</td>
                        <td style = "font-size:15px ;text-align:center;line-height:20px;border: 1px solid black ;width:14%; text-align:right">' . number_format($mamt5, 2) . '</td>
                        <td style = "font-size:15px ;text-align:center;line-height:20px;border: 1px solid black ;width:14%; text-align:right">' . number_format($net_amount, 2) . '</td>
                      </tr>
                      <tr >
                          <td style = "border:none !important;"></td>
                      </tr>            
          ';
    $gl_code_loop = $gl_account;
    $total_invoice_amt = $total_invoice_amt + $mamt;
    $total_return_amt = $total_return_amt + $mamt2;
    $total_adjustments = $total_adjustments + $mamt3;
    $total_total_rcvables = $total_total_rcvables + $total_rcvable;
    $total_paymnt_rcvd = $total_paymnt_rcvd + $mamt4;
    $total_chq_return = $total_chq_return + $mamt5;
    $total_net_rcvd = $total_net_rcvd + $net_amount;
    $grand_total_invoice_amt = $grand_total_invoice_amt + $mamt;
    $grand_total_return_amt = $grand_total_return_amt + $mamt2;
    $grand_total_adjustments = $grand_total_adjustments + $mamt3;
    $grand_total_total_rcvables = $grand_total_total_rcvables + $total_rcvable;
    $grand_total_paymnt_rcvd = $grand_total_paymnt_rcvd + $mamt4;
    $grand_total_chq_return = $grand_total_chq_return + $mamt5;
    $grand_total_net_rcvd = $grand_total_net_rcvd + $net_amount;
    ++$i;
  }
  $data_tr .= '</table>';
  $data_tr .= '
                  <table style="border: 3px solid black; padding:10px; border-top: none; font-family:arial;">
                    <tr style="border: 0px solid rgb(255, 0, 0) !important ; border-collapse: collapse;">
                        <th colspan="2" style = " font-size:14px;border: 2px solid black ;width:45%;text-align:center">  Area [A/c Code] Total</th>
                        <!-- <th style = " font-size:14px;text-align:center;border: 2px solid black ;width:13%"> Calculations</th> -->
                        <th style = " font-size:12px;text-align:center;border: 0px solid black ; text-align: right;width:15%"> &nbsp;</th>
                        <th style = " font-size:12px;text-align:center;border: 2px solid black ; text-align: right;width:15%"> ' . number_format($total_invoice_amt, 2) . '</th>
                        <th style = " font-size:12px;text-align:center;border: 2px solid black ; text-align: right;width:15%"> ' . number_format($total_return_amt, 2) . '</th>
                        <th style = " font-size:12px;text-align:center;border: 2px solid black ; text-align: right;width:16%"> ' . number_format($total_adjustments, 2) . '</th>
                        <th style = " font-size:12px;text-align:center;border: 2px solid black ; text-align: right;width:16%"> ' . number_format($total_total_rcvables, 2) . '</th>
                        <th style = " font-size:12px;text-align:center;border: 2px solid black ; text-align: right;width:16%"> ' . number_format($total_paymnt_rcvd, 2) . '</th>
                        <th style = " font-size:12px;text-align:center;border: 2px solid black ; text-align: right;width:16%"> ' . number_format($total_chq_return, 2) . '</th>
                        <th style = " font-size:12px;text-align:center;border: 2px solid black ; text-align: right;width:16%"> ' . number_format($total_net_rcvd, 2) . '</th>
                    </tr>
                    <tr >
                        <td style = "border:none !important;"></td>
                    </tr>            
  ';
  $data_tr .= '</table>';
  $data_tr .= ' <br><br><br>
              <table style="border: 9px double black; padding:10px 5px 10px 5px;margin-top: 20px; width:100%;font-family:arial;">
                    <tr style="border: 0px solid rgb(255, 0, 0) !important; ">
                        <th colspan="2" style = " font-size:14px;border: 2px solid black ;width:9%;text-align:center;">  Report Total </th>
                        <th style = " font-size:12px;text-align:center;border: 0px solid black ; text-align: right;width:10%"> &nbsp;</th>
                        <th style = " font-size:12px;text-align:center;border: 2px solid black ; text-align: right;width:10%"> ' . number_format($grand_total_invoice_amt, 2) . '</th>
                        <th style = " font-size:12px;text-align:center;border: 2px solid black ; text-align: right;width:10%"> ' . number_format($grand_total_return_amt, 2) . '</th>
                        <th style = " font-size:12px;text-align:center;border: 2px solid black ; text-align: right;width:10%"> ' . number_format($grand_total_adjustments, 2) . '</th>
                        <th style = " font-size:12px;text-align:center;border: 2px solid black ; text-align: right;width:10%"> ' . number_format($grand_total_total_rcvables, 2) . '</th>
                        <th style = " font-size:12px;text-align:center;border: 2px solid black ; text-align: right;width:10%"> ' . number_format($grand_total_paymnt_rcvd, 2) . '</th>
                        <th style = " font-size:12px;text-align:center;border: 2px solid black ; text-align: right;width:10%"> ' . number_format($grand_total_chq_return, 2) . '</th>
                        <th style = " font-size:12px;text-align:center;border: 2px solid black ; text-align: right;width:10%"> ' . number_format($grand_total_net_rcvd, 2) . '</th>
                    </tr>
                    <tr >
                        <td style = "border:none !important;"></td>
                    </tr>            
  ';
  $data_tr .= '</table>';
  $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
  $mpdf->setFooter('{PAGENO}');
  $mpdf->setFooter('{PAGENO}');
  $stylesheet = file_get_contents('account_subsidary.css');
  $mpdf->WriteHTML($stylesheet, 1);
  date_default_timezone_set("Asia/Karachi");
  $today = date("l F j G:i:s ");
  $mpdf->WriteHTML('
        <div class="row" style="line-height:16px;font-family:arial;">
        <div class="main-heading">
        </div>
        <div class="main-heading">
              <div class = " col-lg-6 col-md-6 col-sm-12"  style="border-bottom: 4px solid black;">
                  <span class = "" style="font-size:20px; font-weight:bold">' . $companyName . '</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class = "" style="font-size:12px;">' . date("l j F Y h:i:s A") . '</span> 
              </div>
                <div class = " col-lg-6 col-md-6 col-sm-12" style="border-bottom: 4px solid black;margin-top:10px; padding-bottom:5px">
                    <span class = "" style="font-size:18px; font-weight:500">Daily Sales / Collection Report</span>  
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                    <span class = "" style="font-size:15px; border:2px solid gray">&nbsp; ' . $to_date . ' &nbsp;</span>  
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;
                    <span class = "" style="font-size:15px; border:2px solid gray">&nbsp; ' . $from_date . ' &nbsp;</span>
                </div>
        </div>
        <div class="invoice_detail" >
        <table style="font-family:arial;">
              ' . $data_tr . '
        </div>
        </div>
        </div>
        </div>
  ', 2);
  $mpdf->Output();
} else {
  echo "form no required";
}
