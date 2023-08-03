<?php

use Mpdf\Mpdf;
use Mpdf\Tag\PageBreak;
session_start();
include("../../api/auth/db.php");
require_once __DIR__  . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../helpers/helpers.php';
$company_code = $_GET['company_code'];
$item_code = $_GET['item_code'];
$party_code = $_GET['party_code'];
$from_date = $_GET['from_date'];
$to_date = $_GET['to_date'];

$query = "Select * from company where co_code = '$company_code' ";
$results = $conn->query($query);
$shows=$results->fetch_assoc();
$companyName = $shows['co_name'];

// empty division code
if($item_code == 'null' ){
  $merge_for_item = "";
}
else{
  $merge_for_item = " AND item_code =  '$item_code' ";
}

if($party_code == 'null' ){
    $merge_for_party = "";
}
else{
    $merge_for_party = "PARTY_CODE = '$party_code' AND ";
}

$query = "SELECT DOC_TYPE,DOC_NO,DOC_DATE,DO_KEY,PUR_MODE,ITEM_CAT,
        ITEM_CODE,ITEM_NAME,UM_NAME,PARTY_CODE,PARTY_NAME,
        PUR_QTY,PUR_RATE,PUR_AMT,RET_QTY,RET_RATE,RET_AMT
        FROM NET_PURCHASE_VIEW
        WHERE $merge_for_party
        CO_CODE = '$company_code'
        $merge_for_item
        AND DOC_DATE BETWEEN '$from_date' AND '$to_date'
        ORDER BY PARTY_CODE,ITEM_CODE";

// print_   r($query);die();
$result = $conn->query($query);
$count = mysqli_num_rows($result);
// print_r($count);die();  
if ($count > 0) {
    $return_data = [];
    while ($show = mysqli_fetch_assoc($result)) {
        $return_data[] = $show;
        $data_tr=''; 
        $data_tr1='';
        $date=date('F d,Y');
    }
    $i=1;
    $pur_qty_total=0;
    $pur_amt_total=0;
    $ret_qty_total=0;
    $ret_amt_total=0;
    $item_code_pre='';
    $pur_qty_party_total=0;
    $pur_amt_party_total=0;
    $ret_qty_party_total=0;
    $ret_amt_party_total=0;
    $pur_qty_report_total=0;
    $pur_amt_report_total=0;
    $ret_qty_report_total=0;
    $ret_amt_report_total=0;
    foreach ($return_data as $value) {
        $item_code_new=$value['ITEM_CODE'];
        if($item_code_pre != $item_code_new){
            if($i !=1){
                $data_tr .='</table>
                <table style="border:3px solid black;padding:10px;width:100%;margin-top:10px;background:lightgrey">
                    <tr style="border: 0px solid rgb(255, 0, 0) !important ; border-collapse: collapse;">
                        <td style = "font-size:15px;line-height:20px;width:11%;text-align:center"><b></b></td>
                        <td style = "font-size:15px ;line-height:20px;width:15%;text-align:center"><b></b></td>
                        <td style = "font-size:15px ;line-height:20px;width:9%;text-align:center"><b>Item Total</b></td>
                        <td style = "font-size:15px ;line-height:20px;border: 1px solid black ;width:9%;text-align:center"><b>'.number_format($pur_qty_total,2).'</b></td>
                        <td style = "font-size:15px ;line-height:20px;border: 1px solid black ;width:11%;text-align:center"><b></b></td>
                        <td style = "font-size:15px ;line-height:20px;border: 1px solid black ;width:10%;text-align:center"><b>'.number_format($pur_amt_total,2).'</b></td>
                        <td style = "font-size:15px ;line-height:20px;border: 1px solid black ;width:11%;text-align:center"><b>'.number_format($ret_qty_total,2).'</b></td>
                        <td style = "font-size:15px ;line-height:20px;border: 1px solid black ;width:11%;text-align:center"><b></b></td>
                        <td style = "font-size:15px ;line-height:20px;border: 1px solid black ;width:1%;text-align:center"><b>'.number_format($ret_amt_total,2).'</b></td>
                    </tr></table>';
                    $pur_qty_total=0;
                    $pur_amt_total=0;
                    $ret_qty_total=0;
                    $ret_amt_total=0;
            }
                $data_tr.='
                    <table style="border:3px solid darkgray;padding:10px;width:100%;margin-top:10px;">
                        <tr style="border: 0px solid rgb(255, 0, 0) !important ; border-collapse: collapse;">
                            <td style = "font-size:15px ;line-height:20px;width:11%; text-align:center"><b>'.$value['ITEM_CODE'].'</b></td>
                            <td style = "font-size:15px ;text-align:center;line-height:20px;width:15%"><b>'.$value['ITEM_NAME'].'</b></td>
                            <td style = "font-size:15px ;text-align:center;line-height:20px;width:9%; text-align:center"><b>'.$value['UM_NAME'].'</b></td>
                            <td style = "font-size:15px ;text-align:center;line-height:20px;width:9%; text-align:center"><b>'.$value['PUR_MODE'].'</b></td>
                            <td style = "font-size:12px ;text-align:center;line-height:20px;width:11%; text-align:right"></td>
                            <td style = "font-size:12px ;text-align:center;line-height:20px;width:10%; text-align:right"></td>
                            <td style = "font-size:12px ;text-align:center;line-height:20px;width:11%; text-align:right"></td>
                            <td style = "font-size:12px ;text-align:center;line-height:20px;width:11%; text-align:right"></td>
                            <td style = "font-size:12px ;text-align:center;line-height:20px;width:1%; text-align:right"></td>
                        </tr>
                    </table>
                    <table style="border:3px solid black;padding:10px;width:100%;margin-top:10px;">
                        <tr style="border: 0px solid rgb(255, 0, 0) !important ; border-collapse: collapse;">
                            <td style = "font-size:15px;line-height:20px;border: 1px solid black;width:11%;text-align:center"><b>Type</b></td>
                            <td style = "font-size:15px ;line-height:20px;border: 1px solid black ;width:15%;text-align:center"><b>Date</b></td>
                            <td style = "font-size:15px ;line-height:20px;border:1px solid black;width:9%;text-align:center"><b>Doc No</b></td>
                            <td style = "font-size:15px ;line-height:20px;border: 1px solid black ;width:9%;text-align:center"><b>Pur Qty</b></td>
                            <td style = "font-size:15px ;line-height:20px;border: 1px solid black ;width:11%;text-align:center"><b>Rate</b></td>
                            <td style = "font-size:15px ;line-height:20px;border: 1px solid black ;width:10%;text-align:center"><b>Pur Amt</b></td>
                            <td style = "font-size:15px ;line-height:20px;border: 1px solid black ;width:11%;text-align:center"><b>Ret Qty</b></td>
                            <td style = "font-size:15px ;line-height:20px;border: 1px solid black ;width:11%;text-align:center"><b>Rate</b></td>
                            <td style = "font-size:15px ;line-height:20px;border: 1px solid black ;width:1%;text-align:center"><b>Ret Amt</b></td>
                        </tr>';
            // }
        }
        $data_tr.='
                <tr style="border: 0px solid rgb(255, 0, 0) !important ; border-collapse: collapse;">
                    <td style = "font-size:15px;line-height:20px;border: 1px solid black;width:11%;text-align:center"><b>'.$value['DOC_TYPE'].'</b></td>
                    <td style = "font-size:15px ;line-height:20px;border: 1px solid black ;width:15%;text-align:center"><b>'.$value['DOC_DATE'].'</b></td>
                    <td style = "font-size:15px ;line-height:20px;border:1px solid black;width:9%;text-align:center"><b>'.$value['DO_KEY'].'</b></td>
                    <td style = "font-size:15px ;line-height:20px;border: 1px solid black ;width:9%;text-align:center"><b>'.$value['PUR_QTY'].'</b></td>
                    <td style = "font-size:15px ;line-height:20px;border: 1px solid black ;width:11%;text-align:center"><b>'.$value['PUR_RATE'].'</b></td>
                    <td style = "font-size:15px ;line-height:20px;border: 1px solid black ;width:10%;text-align:center"><b>'.$value['PUR_AMT'].'</b></td>
                    <td style = "font-size:15px ;line-height:20px;border: 1px solid black ;width:11%;text-align:center"><b>'.number_format($value['RET_QTY'],2).'</b></td>
                    <td style = "font-size:15px ;line-height:20px;border: 1px solid black ;width:11%;text-align:center"><b>'.number_format($value['RET_RATE'],2).'</b></td>
                    <td style = "font-size:15px ;line-height:20px;border: 1px solid black ;width:1%;text-align:center"><b>'.number_format($value['RET_AMT'],2).'</b></td>
                </tr>
        ';
        // $data_tr.='
        // ';
        
        $pur_qty_total=$pur_qty_total+$value['PUR_QTY'];
        $pur_amt_total=$pur_amt_total+$value['PUR_AMT'];
        $ret_qty_total=$ret_qty_total+$value['RET_QTY'];
        $ret_amt_total=$ret_amt_total+$value['RET_AMT'];
        $item_code_pre=$item_code_new;
        $pur_qty_party_total=$pur_qty_party_total+$value['PUR_QTY'];
        $pur_amt_party_total=$pur_amt_party_total+$value['PUR_AMT'];
        $ret_qty_party_total=$ret_qty_party_total+$value['RET_QTY'];
        $ret_amt_party_total=$ret_amt_party_total+$value['RET_AMT'];
        $pur_qty_report_total=$pur_qty_report_total+$value['PUR_QTY'];
        $pur_amt_report_total=$pur_amt_report_total+$value['PUR_AMT'];
        $ret_qty_report_total=$ret_qty_report_total+$value['RET_QTY'];
        $ret_amt_report_total=$ret_amt_report_total+$value['RET_AMT'];
        ++$i;
        // $data_tr.='</table>
        // ';
    }
    
    
    $data_tr .='</table>
    <table style="border:3px solid black;padding:10px;width:100%;margin-top:10px;background:lightgrey">
        <tr style="border: 0px solid rgb(255, 0, 0) !important ; border-collapse: collapse;">
            <td style = "font-size:15px;line-height:15px;width:11%;text-align:center"><b></b></td>
            <td style = "font-size:15px ;line-height:15px;width:15%;text-align:center"><b></b></td>
            <td style = "font-size:15px ;line-height:15px;width:9%;text-align:center"><b>Item Total</b></td>
            <td style = "font-size:15px ;line-height:15px;border: 1px solid black ;width:9%;text-align:center"><b>'.number_format($pur_qty_total,2).'</b></td>
            <td style = "font-size:15px ;line-height:15px;border: 1px solid black ;width:11%;text-align:center"><b></b></td>
            <td style = "font-size:15px ;line-height:15px;border: 1px solid black ;width:10%;text-align:center"><b>'.number_format($pur_amt_total,2).'</b></td>
            <td style = "font-size:15px ;line-height:15px;border: 1px solid black ;width:11%;text-align:center"><b>'.number_format($ret_qty_total,2).'</b></td>
            <td style = "font-size:15px ;line-height:15px;border: 1px solid black ;width:11%;text-align:center"><b></b></td>
            <td style = "font-size:15px ;line-height:15px;border: 1px solid black ;width:1%;text-align:center"><b>'.number_format($ret_amt_total,2).'</b></td>
        </tr></table>';

        
    $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
    $mpdf->setFooter('{PAGENO}');
    $stylesheet = file_get_contents('../account_subsidary.css');
    // $mpdf->SetWatermarkText('PAID');
    // $mpdf->showWatermarkText = true;
    $mpdf->WriteHTML($stylesheet, 1);
    date_default_timezone_set("Asia/Karachi"); 
    $today = date("l F j G:i:s ");
    $mpdf->WriteHTML('
        <div class="row" style="line-height:16px;font-family:arial;">
            <table style="border-bottom: 4px solid black; padding:5px;width:100%;">
                <tr>
                    <td style = "font-size:20px;width:41%; text-align:left;font-weight:bold;">'.$companyName.'</td>
                    <td style = "font-size:12px ;text-align:right;line-height:20px;"></td>
                    <td style = "font-size:12px ;text-align:center;line-height:20px; text-align:right;"></td>
                    <td style = "font-size:15px ;text-align:center;line-height:20px;border: 0px solid black ;width:12%;"></td>
                    <td style = "font-size:15px ;text-align:center;line-height:20px;width:5%; text-align:right;"></td>
                    <td style = "font-size:15px ;text-align:center;line-height:20px;font-weight:bold; width:10%;"></td>
                    <td style = "font-size:12px ;text-align:center;line-height:20px;width:9%; text-align:right;"></td>
                    <td style = "font-size:11px ;text-align:center;line-height:20px;width:11%;font-weight:bold;"></td>
                    <td style = "font-size:13px ;text-align:center;line-height:20px;width:12%;font-weight:bold;">'.$date.'</td>
                </tr>
            </table>
            <table style="border-bottom: 4px solid black; padding:5px;width:100%;">
                <tr>
                    <td style = "font-size:15px ;line-height:20px;width:28%; text-align:center;">Partywise Purchase/Return Report : </td>
                    <td style = "font-size:13px ;text-align:center;line-height:20px;width:11%;"><b>'.date("d-m-Y", strtotime($from_date)).'</b></td>
                    <td style = "font-size:13px ;line-height:20px;width:11%; text-align:center;"><b>'.date("d-m-Y", strtotime($to_date)).'</b></td>
                    <td style = "font-size:14px ;text-align:center;line-height:20px;width:2%;"></td>
                    <td style = "font-size:12px ;line-height:20px;width:7%; text-align:center;"><b></b></td>
                    <td style = "font-size:16px ;text-align:center;line-height:20px;width:13%; text-align:center;"><b></b></td>
                    <td style = "font-size:12px ;text-align:center;line-height:20px;width:6%; text-align:right;"></td>
                    <td style = "font-size:12px ;text-align:center;line-height:20px;width:12%; text-align:right;"></td>
                    <td style = "font-size:12px ;text-align:center;line-height:20px;width:10%; text-align:right;"></td>
                </tr>    
            </table>

            <div class="invoice_detail" >
                <table style="border:3px solid black;padding:10px;width:100%;margin-top:10px;">
                    <tr style="border: 0px solid rgb(255, 0, 0) !important ; border-collapse: collapse;">
                        <td style = "font-size:15px ;line-height:15px;width:11%; text-align:center"><b>'.$value['PARTY_CODE'].'</b></td>
                        <td style = "font-size:15px ;text-align:center;line-height:15px;width:15%"><b>'.$value['PARTY_NAME'].'</b></td>
                        <td style = "font-size:12px ;text-align:center;line-height:15px;width:9%; text-align:right"></td>
                        <td style = "font-size:12px ;text-align:center;line-height:15px;width:9%; text-align:right"></td>
                        <td style = "font-size:12px ;text-align:center;line-height:15px;width:11%; text-align:right"></td>
                        <td style = "font-size:12px ;text-align:center;line-height:15px;width:10%; text-align:right"></td>
                        <td style = "font-size:12px ;text-align:center;line-height:15px;width:11%; text-align:right"></td>
                        <td style = "font-size:12px ;text-align:center;line-height:15px;width:11%; text-align:right"></td>
                        <td style = "font-size:12px ;text-align:center;line-height:15px;width:1%; text-align:right"></td>
                    </tr>
                </table>
                    '. $data_tr.'
                <table style="border: 3px solid black; padding:10px; border:3px solid black;width:100%;margin-top:10px;background:lightgrey">
                <tr style="border: 0px solid rgb(255, 0, 0) !important ; border-collapse: collapse;">
                    <td style = "font-size:15px;line-height:15px;width:10%;text-align:center"><b></b></td>
                    <td style = "font-size:15px ;line-height:15px;width:15%;text-align:center"><b></b></td>
                    <td style = "font-size:15px ;line-height:15px;width:10%;text-align:center"><b>Party Total</b></td>
                    <td style = "font-size:15px ;line-height:15px;border: 1px solid black ;width:9%;text-align:center"><b>'.number_format($pur_qty_party_total,2).'</b></td>
                    <td style = "font-size:15px ;line-height:15px;border: 1px solid black ;width:11%;text-align:center"><b></b></td>
                    <td style = "font-size:15px ;line-height:15px;border: 1px solid black ;width:10%;text-align:center"><b>'.number_format($pur_amt_party_total,2).'</b></td>
                    <td style = "font-size:15px ;line-height:15px;border: 1px solid black ;width:11%;text-align:center"><b>'.number_format($ret_qty_party_total,2).'</b></td>
                    <td style = "font-size:15px ;line-height:15px;border: 1px solid black ;width:11%;text-align:center"><b></b></td>
                    <td style = "font-size:15px ;line-height:15px;border: 1px solid black ;width:1%;text-align:center"><b>'.number_format($ret_amt_party_total,2).'</b></td>
                </tr>
                    <tr>
                        <td style = "border:none !important;"></td>
                    </tr>
                    
                </table>

                <table style="border: 3px solid black; padding:10px; border:3px solid black;width:100%;margin-top:10px;background:lightgrey">
                <tr style="border: 0px solid rgb(255, 0, 0) !important ; border-collapse: collapse;">
                    <td style = "font-size:15px;line-height:20px;width:9%;text-align:center"><b></b></td>
                    <td style = "font-size:15px ;line-height:20px;width:15%;text-align:center"><b></b></td>
                    <td style = "font-size:15px ;line-height:20px;width:11%;text-align:center"><b>Report Total</b></td>
                    <td style = "font-size:15px ;line-height:20px;border: 1px solid black ;width:9%;text-align:center"><b>'.number_format($pur_qty_report_total,2).'</b></td>
                    <td style = "font-size:15px ;line-height:20px;border: 1px solid black ;width:11%;text-align:center"><b></b></td>
                    <td style = "font-size:15px ;line-height:20px;border: 1px solid black ;width:10%;text-align:center"><b>'.number_format($pur_amt_report_total,2).'</b></td>
                    <td style = "font-size:15px ;line-height:20px;border: 1px solid black ;width:11%;text-align:center"><b>'.number_format($ret_qty_report_total,2).'</b></td>
                    <td style = "font-size:15px ;line-height:20px;border: 1px solid black ;width:11%;text-align:center"><b></b></td>
                    <td style = "font-size:15px ;line-height:20px;border: 1px solid black ;width:1%;text-align:center"><b>'.number_format($ret_amt_report_total,2).'</b></td>
                </tr>
                    <tr>
                        <td style = "border:none !important;"></td>
                    </tr>
                    
                </table>
            </div>
        </div> ', 2);
                    $mpdf->Output();
// } else {
//   echo "form no required";
}

