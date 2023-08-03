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
$location_code = $_GET['location_code'];
$location_name = $_GET['location_name'];
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

$query = "SELECT co_code,item_code,loc_code wh_code,SUM(IFNULL(open_stock,0))  + SUM(IFNULL(adj_qty,0)) open_stock FROM item_batch_no
WHERE  co_code = '$company_code' $merge_for_item AND loc_code = '$location_code' GROUP BY co_code,item_code,loc_code
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
        // print_r($return_data); die();
        $co_code = $return_data[0]['co_code'];
        $item_code = $return_data[0]['item_code'];
        $wh_code = $return_data[0]['wh_code'];
        $open_stock = $return_data[0]['open_stock'];
        $date=date('F d,Y');
    }
    $i = 1;
    $j=1;
    $total_receipt = 0;
    $total_issue = 0;
    $gl_code_loop='';

    foreach ($return_data as $value) {
        $open_stock=$value['open_stock'];
        $wh_code=$value['wh_code'];
        $item_code=$value['item_code']; 
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
        AND   LOC_CODE    = '$location_code'
        AND   DOC_DATE BETWEEN  '$from_date' AND '$to_date'
        AND (IFNULL(RECEIPT_QTY,0) > 0 OR IFNULL(ISSUE_QTY,0) > 0)
        ORDER  BY ITEM_CODE,DOC_DATE,DOC_TYPE,DOC_NO ";
            // print_r($detail_query);
        $det_results = $conn->query($detail_query);
        $count2 = mysqli_num_rows($det_results);
        // print_r($count2);die();
        // print_r("a");
        if ($count2 > 0) {
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
                            <td style = "font-size:12px ;text-align:center;line-height:20px;width:10%; text-align:right"><b>'.number_format($value['open_stock'],2).'</b></td>
                        </tr>
                    </table>
                    <br>
                    <table style="border: 4px solid black; padding:10px;width:100%;">';
                }else{
                    $cal_bal=($cal_bal??0)+($RECEIPT_QTY??0)-($ISSUE_QTY??0);
                }
                $j++;
                $total_receipt=($RECEIPT_QTY??0)+$total_receipt;
                $total_issue=($ISSUE_QTY??0)+$total_issue;
                // print_r($total_receipt);
                // print_r("a");
                // print_r($total_issue);
                // print_r("b");
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
        </table><br><br><br><br><br><br>'; 
        }else{
            // $data_tr .='<table style="margin-top:10px;width:100%;border-collapse:collapse;">';
        }  
        $j=1; 
            $total_receipt =0;
            $total_issue =0;
            ++$i;
    }
    // die();
    
        
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
            <div class="main-heading">
            </div>
            <table style="border-bottom: 4px solid black; padding:5   px;width:100%;">
                <tr>
                    <td style = "font-size:20px;width:19%; text-align:left;font-weight:bold;">'.$companyName.'</td>
                    <td style = "font-size:12px ;text-align:right;line-height:20px;"></td>
                    <td style = "font-size:12px ;text-align:center;line-height:20px; text-align:right"></td>
                    <td style = "font-size:15px ;text-align:center;line-height:20px;width:9%; text-align:right"></td>
                    <td style = "font-size:15px ;text-align:center;line-height:20px;font-weight:bold; width:12%;">Stock Ledger</td>
                    <td style = "font-size:15px ;text-align:center;line-height:20px;border: 1px solid black ;width:10%;">BATCH</td>
                    <td style = "font-size:12px ;text-align:center;line-height:20px;width:9%; text-align:right"></td>
                    <td style = "font-size:11px ;text-align:center;line-height:20px;width:11%;font-weight:bold;"></td>
                    <td style = "font-size:13px ;text-align:center;line-height:20px;width:12%;font-weight:bold;">'.$date.'</td>
                </tr>
            </table>
            <table style="border-bottom: 4px solid black; padding:5px;width:100%;">
                <tr>
                    <td style = "font-size:13px ;line-height:20px;width:8%; text-align:center"><b>Period</b></td>
                    <td style = "font-size:12px ;text-align:center;line-height:20px;width:10%"><b>'.$from_date.'</b></td>
                    <td style = "font-size:12px ;line-height:20px;width:9%; text-align:center"><b>'.$to_date.'</b></td>
                    <td style = "font-size:12px ;text-align:center;line-height:20px;width:9%; text-align:right"></td>
                    <td style = "font-size:15px ;line-height:20px;width:11%; text-align:center"><b>Location = </b></td>
                    <td style = "font-size:16px ;text-align:center;line-height:20px;width:15%; text-align:center"><b>'.$location_name.'</b></td>
                    <td style = "font-size:12px ;text-align:center;line-height:20px;width:6%; text-align:right"></td>
                    <td style = "font-size:12px ;text-align:center;line-height:20px;width:22%; text-align:right"></td>
                    <td style = "font-size:12px ;text-align:center;line-height:20px;width:10%; text-align:right"></td>
                </tr>    
            </table>


            <div class="invoice_detail" >
               
                ' . $data_tr . '
            </div>
        </div> ', 2);
    $mpdf->Output();
} else {
  echo "form no required";
}
