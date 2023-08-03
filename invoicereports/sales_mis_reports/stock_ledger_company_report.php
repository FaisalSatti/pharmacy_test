<?php

use Mpdf\Mpdf;
use Mpdf\Tag\PageBreak;
session_start();
include("../../api/auth/db.php");
require_once __DIR__  . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../helpers/helpers.php';
$company_code = $_GET['company_code'];
$item_code = $_GET['item_code'];
// $item_code = $_GET['item_name'];
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

$query = "SELECT 
CO_CODE,ITEM_CODE,
sum(IFNULL(open_stock,0)) +  sum(IFNULL(adj_qty,0)) open_qty
FROM   ITEM_BATCH_NO
WHERE  co_code = '$company_code' $merge_for_item  GROUP BY co_code,item_code
ORDER  BY co_code,item_code";
// print_r($query);die();
$result = $conn->query($query);
$count = mysqli_num_rows($result);

if ($count > 0) {
    $return_data = [];
    while ($show = mysqli_fetch_assoc($result)) {
        $return_data[] = $show;
        $data_tr=''; 
        $data_tr1='';
        $date=date('F d,Y');
    }
    $j = 1;
    $i = 1;
    $total_receipt = 0;
    $total_issue = 0;
    foreach ($return_data as $value) {
        $item_code=$value['ITEM_CODE']; 
        $open_stock=$value['open_qty'];
        // $wh_code=$value['wh_code'];
        $item_query = "Select * from items where item_div = '$item_code' ";
        $results = $conn->query($item_query);
        $shows=$results->fetch_assoc();
        $itemName = $shows['item_descr'];

        if($i !=1){
            $data_tr .='<table style="border-top: 4px solid black;width:100%;"><tr><td></td></tr></table>';
        }
        $detail_query = "SELECT 
        CO_CODE,
        DOC_YEAR,       
        DOC_TYPE,      
        DOC_NO,      
        DOC_DATE,       
        DO_KEY,      
        NARATION,       
        ITEM_CODE,      
        RECEIPT_QTY,    
        ISSUE_QTY,      
        LOC_CODE WH_CODE,     
        REFNUM2        
        FROM  MASTER_VIEW_ITEM_BATCH
        WHERE CO_CODE     = '$company_code'
        AND   ITEM_CODE   = '$item_code'
        AND   DOC_DATE BETWEEN  '$from_date' AND '$to_date'
        AND (IFNULL(RECEIPT_QTY,0) > 0 OR IFNULL(ISSUE_QTY,0) > 0)
        ORDER  BY ITEM_CODE,DOC_DATE,DOC_NO ";
            // print_r($detail_query);die();
        $det_results = $conn->query($detail_query);
        $count2 = mysqli_num_rows($det_results);
        if($count2 >0){
            while ($det_shows = mysqli_fetch_assoc($det_results)) {
                $CO_CODE = $det_shows['CO_CODE'];
                $DOC_YEAR = $det_shows['DOC_YEAR'];
                $DOC_TYPE = $det_shows['DOC_TYPE'];
                $DOC_NO = $det_shows['DOC_NO'];
                $DOC_DATE = $det_shows['DOC_DATE'];
                $DO_KEY = $det_shows['DO_KEY'];
                $NARATION = $det_shows['NARATION'];
                $ITEM_CODE = $det_shows['ITEM_CODE'];
                $RECEIPT_QTY = $det_shows['RECEIPT_QTY'];
                $ISSUE_QTY = $det_shows['ISSUE_QTY'];
                $WH_CODE = $det_shows['WH_CODE'];
                $REFNUM2 = $det_shows['REFNUM2'];
                    if($j==1){
                        $cal_bal=($open_stock??0)+($RECEIPT_QTY??0)-($ISSUE_QTY??0);
                        $data_tr .='
                        <table style="border-bottom: 4px solid black; padding:5px;width:100%;">
                            <tr style="border: 2px solid black ;">
                                <th style = " font-size:15px;border: 2px solid black ;width:10%;text-align:center">Date</th>
                                <th style = " font-size:15px;text-align:center;border: 2px solid black ;width:10%">Type</th>
                                <th style = " font-size:15px;text-align:center;border: 2px solid black ;width:10%">Comp#</th>
                                <th style = " font-size:15px;text-align:center;border: 2px solid black ;width:17%">Ref Num</th>
                                <th style = " font-size:15px;text-align:center;border: 2px solid black ;width:20%">Remarks</th>
                                <th style = " font-size:15px;text-align:center;border: 2px solid black ;width:11%">Receipt</th>
                                <th style = " font-size:15px;text-align:center;border: 2px solid black ;width:11%">Issues</th>
                                <th style = " font-size:15px;text-align:center;border: 2px solid black ;width:11%">Balance</th>
                            </tr>
                        </table>
                        <table style="padding:5px;width:100%;margin-top:10px;">
                            <tr>
                                <td style = "font-size:13px ;line-height:20px;width:19%; text-align:left;"><b>'.$item_code.'</b></td>
                                <td style = "font-size:13px ;line-height:20px;width:37%"><b>'.$itemName.'</b></td>
                                <td style = "font-size:12px ;text-align:center;line-height:20px; text-align:right"></td>
                                <td style = "font-size:12px ;text-align:center;line-height:20px; text-align:right"></td>
                                <td style = "font-size:12px ;text-align:center;line-height:20px; text-align:right"></td>
                                <td style = "font-size:12px ;text-align:center;line-height:20px;width:10%; text-align:right"></td>
                                <td style = "font-size:12px ;text-align:center;line-height:20px;width:11%; text-align:right"></td>
                                <td style = "font-size:12px ;text-align:center;line-height:20px;width:11%; text-align:right"><b>Opening :</b></td>
                                <td style = "font-size:12px ;text-align:center;line-height:20px;width:10%; text-align:right"><b>'.number_format($value['open_qty'],2).'</b></td>
                            </tr>
                        </table>
                        <br>
                        <table style="border: 4px solid black; padding:10px;width:100%;">   ';
                    }else{
                        $cal_bal=($cal_bal??0)+($RECEIPT_QTY??0)-($ISSUE_QTY??0);
                    }
                $j++;
                $total_receipt=($RECEIPT_QTY??0)+$total_receipt;
                $total_issue=($ISSUE_QTY??0)+$total_issue;
                $data_tr .='    
                <tr style="padding:30px;">
                    <th style = " font-size:14px;border: 1px solid dark-gray ;width:10%;text-align:center;">'.$DOC_DATE.'</th>
                    <th style = " font-size:14px;text-align:center;border: 1px solid dark-gray ;width:10%">'.$DOC_TYPE.'</th>
                    <th style = " font-size:14px;text-align:center;border: 1px solid dark-gray ;width:10%">'.$DO_KEY.'</th>
                    <th style = " font-size:14px;text-align:center;border: 1px solid dark-gray ;width:17%">'.$REFNUM2.'</th>
                    <th style = " font-size:14px;text-align:center;border: 1px solid dark-gray ;width:20%">'.$NARATION.'</th>
                    <th style = " font-size:14px;text-align:right;border: 1px solid dark-gray ;width:11%">'.number_format($RECEIPT_QTY,2).'</th>
                    <th style = " font-size:14px;text-align:right;border: 1px solid dark-gray ;width:11%">'.number_format($ISSUE_QTY,2).'</th>
                    <th style = " font-size:14px;text-align:right;border: 1px solid dark-gray ;width:11%">'.number_format($cal_bal,2).'</th>
                </tr>';
            }
        }else{
            $data_tr .='<table style="margin-top:10px;width:100%;border-collapse:collapse;">';
        }
        $j=1;  
        $data_tr .='</table>
        <table style="margin-top:10px;width:100%;border-collapse:collapse;">       
            <tr style="padding:30px;">
                <th style = " font-size:13px;border: 0px solid red ;width:20%;text-align:center;"></th>
                <th style = " font-size:14px;text-align:center;border: 0px solid red ;"></th>
                <th style = " font-size:14px;text-align:center;border: 0px solid red ;width:10%"></th>
                <th style = " font-size:14px;text-align:center;border: 0px solid red ;width:28%"></th>
                <th style = " font-size:14px;text-align:center;border: 2px solid black ;border-right:none;border-left:none;width:8%">Total : </th>
                <th style = " font-size:14px;text-align:right;border: 2px solid black;border-right:none;border-left:none;width:11%">'.number_format($total_receipt,2).'</th>
                <th style = " font-size:14px;text-align:right;border: 2px solid black;border-right:none;border-left:none;width:11%">'.number_format($total_issue,2).'</th>
                <th style = " font-size:14px;text-align:center;border: 2px solid black;border-right:none;border-left:none;width:12%"></th>
            </tr>
        </table><br><br><br><br><br><br>
                ';  
                $total_receipt =0;
                $total_issue =0;

                ++$i;
    }
    
        
    $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
    $mpdf->setFooter('{PAGENO}');
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
                    <td style = "font-size:15px ;text-align:center;line-height:20px;border: 1px solid black ;width:12%;">BATCH</td>
                    <td style = "font-size:15px ;text-align:center;line-height:20px;width:5%; text-align:right;"></td>
                    <td style = "font-size:15px ;text-align:center;line-height:20px;font-weight:bold; width:10%;"></td>
                    <td style = "font-size:12px ;text-align:center;line-height:20px;width:9%; text-align:right;"></td>
                    <td style = "font-size:11px ;text-align:center;line-height:20px;width:11%;font-weight:bold;"></td>
                    <td style = "font-size:13px ;text-align:center;line-height:20px;width:12%;font-weight:bold;">'.$date.'</td>
                </tr>
            </table>
            <table style="border-bottom: 4px solid black; padding:5px;width:100%;">
                <tr>
                    <td style = "font-size:15px ;line-height:20px;width:18%; text-align:center;"><b>Stock Ledger</b></td>
                    <td style = "font-size:14px ;text-align:center;line-height:20px;width:10%;">BY CO</td>
                    <td style = "font-size:12px ;line-height:20px;width:9%; text-align:center;"><b></b></td>
                    <td style = "font-size:13px ;text-align:center;line-height:20px;width:11%;"><b>'.date('d/m/Y',strtotime($from_date)).'</b></td>
                    <td style = "font-size:13px ;line-height:20px;width:11%; text-align:center;"><b>'.date('d/m/Y',strtotime($to_date)).'</b></td>
                    <td style = "font-size:16px ;text-align:center;line-height:20px;width:13%; text-align:center;"><b></b></td>
                    <td style = "font-size:12px ;text-align:center;line-height:20px;width:6%; text-align:right;"></td>
                    <td style = "font-size:12px ;text-align:center;line-height:20px;width:12%; text-align:right;"></td>
                    <td style = "font-size:12px ;text-align:center;line-height:20px;width:10%; text-align:right;"></td>
                </tr>    
            </table>

            <div class="invoice_detail" >
                    '. $data_tr.'
                
            </div>
        </div> ', 2);
                    $mpdf->Output();
} else {
  echo "form no required";
}
