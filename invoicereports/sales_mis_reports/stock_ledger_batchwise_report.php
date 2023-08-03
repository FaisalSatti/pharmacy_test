<?php
use Mpdf\Mpdf;
use Mpdf\Tag\PageBreak;
session_start();
include("../../api/auth/db.php");
require_once __DIR__  . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../helpers/helpers.php';
$company_code = $_GET['company_code'];
$item_code = $_GET['item_code'];
$location_code = $_GET['location_code'];
$location_name = $_GET['location_name'];
$batch_no = $_GET['batch_no'];
$exp_date = $_GET['exp_date'];
$from_date = $_GET['from_date'];
$to_date = $_GET['to_date'];
$query = "Select * from company where co_code = '$company_code' ";
$results = $conn->query($query);
$shows = $results->fetch_assoc();
$companyName = $shows['co_name'];
$query = "SELECT CO_CODE,ITEM_CODE, LOC_CODE, BATCH_NO, EXPIRY_DATE, IFNULL(OPEN_STOCK,0) +  IFNULL(ADJ_QTY,0) open_stock FROM   ITEM_BATCH_NO 
    WHERE  CO_CODE    = '$company_code' AND    ITEM_CODE  = '$item_code'  AND    LOC_CODE   = '$location_code' AND    BATCH_NO   = '$batch_no' AND    EXPIRY_DATE = '$exp_date' ORDER  BY CO_CODE,ITEM_CODE";
$result = $conn->query($query);
$count = mysqli_num_rows($result);
if ($count > 0) {
        $return_data = [];
        while ($show = mysqli_fetch_assoc($result)) {
            $return_data[] = $show;
            $data_tr = '';
            $data_tr1 = '';
            $date = date('F d,Y');
        }
        $i = 1;
        $j = 1;
        $total_receipt = 0;
        $total_issue = 0;
        foreach ($return_data as $value) {
            $open_stock = $value['open_stock'];
            $wh_code = $value['LOC_CODE'];
            $item_code = $value['ITEM_CODE'];
            if ($j != 1) {
                $data_tr .= '<table style="border-top: 4px solid black;width:100%;font-family: arial;"><tr><td></td></tr></table>';
            }
            $detail_query = "SELECT
            CO_CODE,
            DOC_YEAR,       
            DOC_TYPE,      
            DOC_NO,      
            DOC_DATE,       
            DO_KEY,      
            NULL NARATION,       
            ITEM_CODE,      
            LOC_CODE,
            BATCH_NO,
            EXPIRY_DATE,
            DIV_CODE,
            RECEIPT_QTY,    
            ISSUE_QTY      
            FROM  MASTER_VIEW_ITEM_BATCH
            WHERE CO_CODE     = '$company_code'
            AND   ITEM_CODE   = '$item_code'
            AND   LOC_CODE    = '$location_code'
            AND    BATCH_NO   = '$batch_no'
            AND    EXPIRY_DATE = '$exp_date'   
            AND   DOC_DATE BETWEEN  '$from_date' AND '$to_date'
            AND (IFNULL(RECEIPT_QTY,0) > 0 OR IFNULL(ISSUE_QTY,0) > 0)
            ORDER  BY ITEM_CODE,DOC_DATE,DOC_TYPE,DOC_NO";
            $det_results = $conn->query($detail_query);
            $count2 = mysqli_num_rows($det_results);
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
                    $WH_CODE = $det_shows['LOC_CODE'];
                    $DIV_CODE = $det_shows['DIV_CODE'];
                    if ($j == 1) {
                        $item_query = "Select a.item_name_sale,b.div_name,c.unit_name from ITEMS a join division b on a.div_code=b.div_code 
                    join unit c on a.um_code=c.unit_code 
                    where a.item_div = '$item_code' AND a.CO_CODE='$company_code' and a.div_code='$DIV_CODE'  ";
                        $results = $conn->query($item_query);
                        $shows = $results->fetch_assoc();
                        $itemName = $shows['item_name_sale'];
                        $div_name = $shows['div_name'];
                        $unit_name = $shows['unit_name'];
                        $cal_bal = ($open_stock ?? 0) + ($RECEIPT_QTY ?? 0) - ($ISSUE_QTY ?? 0);
                        $data_tr .= '
                        <table style="border: 4px solid rgba(0, 0, 0, 0.829); border-left: none; border-right: none; padding:5px;width:100%;">
                            <tr style="border: 2px solid black ;">
                                <th style = " font-size:13px;border: 2px solid black ;width:10%;text-align:center">Date</th>
                                <th style = " font-size:13px;text-align:center;border: 2px solid black ;width:10%">Type</th>
                                <th style = " font-size:13px;text-align:center;border: 2px solid black ;width:10%">Comp#</th>
                                <th style = " font-size:13px;text-align:center;border: 2px solid black ;width:17%">Ref Num</th>
                                <th style = " font-size:13px;text-align:center;border: 2px solid black ;width:20%">Remarks</th>
                                <th style = " font-size:13px;text-align:center;border: 2px solid black ;width:11%">Receipt</th>
                                <th style = " font-size:13px;text-align:center;border: 2px solid black ;width:11%">Issues</th>
                                <th style = " font-size:13px;text-align:center;border: 2px solid black ;width:11%">Balance</th>
                            </tr>
                        </table>
                        <br>
                        <table style="padding:5px;width:100%;margin-top:5px;font-family: arial;">
                            <tr>
                                <td style = "font-size:18px ;line-height:10px;width:19%; text-align:left;"><b>' . $item_code . '</b></td>
                                <td style = "font-size:18px ;line-height:10px; text-align: center;"><b>' . $itemName . ' &nbsp; - &nbsp; ' . $div_name . ' &nbsp; - &nbsp; ' . $unit_name . '</b></td>
                                <td style = "font-size:12px ;text-align:center;line-height:10px;width:10%; text-align:right"></td>
                                <td style = "font-size:12px ;text-align:center;line-height:10px;width:11%; text-align:right"><b>Opening :</b></td>
                                <td style = "font-size:12px ;text-align:center;line-height:10px;width:10%; text-align:right"><b>' . number_format($value['open_stock'], 2) . '</b></td>
                            </tr>
                        </table>
                        <br>
                        <table style="border: 2px solid black; padding:5px;width:100%;font-family: arial;">   ';
                    } else {
                        $cal_bal = ($cal_bal ?? 0) + ($RECEIPT_QTY ?? 0) - ($ISSUE_QTY ?? 0);
                    }
                    $j++;
                    $total_receipt = ($RECEIPT_QTY ?? 0) + $total_receipt;
                    $total_issue = ($ISSUE_QTY ?? 0) + $total_issue;
                    $data_tr .= '    
                            <tr style="padding:30px;">
                                <td style = " font-size:13px;border: 1px solid rgb(59, 59, 59) ;width:10%;text-align:center;">' . $DOC_DATE . '</td>
                                <td style = " font-size:13px;text-align:center;border: 1px solid rgb(59, 59, 59) ;width:10%">' . $DOC_TYPE . '</td>
                                <td style = " font-size:13px;text-align:center;border: 1px solid rgb(59, 59, 59) ;width:10%">' . $DO_KEY . '</td>
                                <td style = " font-size:13px;text-align:center;border: 1px solid rgb(59, 59, 59) ;width:17%">' . $DO_KEY . '</td>
                                <td style = " font-size:13px;text-align:center;border: 1px solid rgb(59, 59, 59) ;width:20%">' . $NARATION . '</td>
                                <td style = " font-size:13px;text-align:right;border: 1px solid rgb(59, 59, 59) ;width:11%">' . number_format($RECEIPT_QTY, 2) . '</td>
                                <td style = " font-size:13px;text-align:right;border: 1px solid rgb(59, 59, 59) ;width:11%">' . number_format($ISSUE_QTY, 2) . '</td>
                                <td style = " font-size:13px;text-align:right;border: 1px solid rgb(59, 59, 59) ;width:11%">' . number_format($cal_bal, 2) . '</td>
                            </tr>';
                }
            } else {
                $data_tr .= '<table style="margin-top:10px;width:100%;border-collapse:collapse;font-family: arial;">';
            }
            $j = 1;
            $data_tr .= '</table>
                        <table style="margin-top:10px;width:100%;border-collapse:collapse;font-family: arial;">       
                            <tr style="padding:30px;">
                                <th style = " font-size:13px;border: 0px solid red ;width:20%;text-align:center;"></th>
                                <th style = " font-size:14px;text-align:center;border: 0px solid red ;"></th>
                                <th style = " font-size:14px;text-align:center;border: 0px solid red ;width:10%"></th>
                                <th style = " font-size:14px;text-align:center;border: 0px solid red ;width:28%"></th>
                                <th style = " font-size:14px;text-align:center;border: 4px solid black ;border-right:none;border-left:none;width:8%">Total : </th>
                                <th style = " font-size:14px;text-align:right;border: 4px solid black;border-right:none;border-left:none;width:11%">' . number_format($total_receipt, 2) . '</th>
                                <th style = " font-size:14px;text-align:right;border: 4px solid black;border-right:none;border-left:none;width:11%">' . number_format($total_issue, 2) . '</th>
                                <th style = " font-size:14px;text-align:center;border: 4px solid black;border-right:none;border-left:none;width:12%"></th>
                            </tr>
                        </table>
                        <br><br><br><br><br><br>
                            ';
            $total_receipt = 0;
            $total_issue = 0;
        }
        ++$i;
        $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
        $mpdf->setFooter('{PAGENO}');
        $mpdf->setFooter('{PAGENO}');
        $stylesheet = file_get_contents('../account_subsidary.css');
        $mpdf->WriteHTML($stylesheet, 1);
        // $mpdf -> WriteHTML('<title> fjkdf</title>');
        date_default_timezone_set("Asia/Karachi");
        $today = date("l F j G:i:s ");
        $mpdf->WriteHTML('
            <div class="row" style="line-height:16px;font-family:arial;">
                <div class="main-heading">
                </div>
                <table style="border-bottom: 7px solid black; padding:5px;width:100%;font-family: arial;">
                    <tr>
                        <td style = "font-size:20px;width:19%; text-align:left;font-weight:bold;">' . $companyName . '</td>
                        <td style = "font-size:12px ;text-align:right;line-height:20px;"></td>
                        <td style = "font-size:12px ;text-align:center;line-height:20px; text-align:right"></td>
                        <td style = "font-size:15px ;text-align:center;line-height:20px;font-weight:bold; width:12%;">Stock Ledger</td>
                        <td style = "font-size:13px ;text-align:center;line-height:20px;border: 1px solid black ;width:10%;">' . date('d/m/Y',strtotime($from_date)) . '</td>
                        <td style = "font-size:13px ;text-align:center;line-height:20px;width:9%;border: 1px solid black ;">' . date('d/m/Y',strtotime($to_date)) . '</td>
                        <td style = "font-size:15px ;text-align:center;line-height:20px;width:4%; text-align:right"></td>
                        <td style = "font-size:11px ;text-align:center;line-height:20px;width:5%;font-weight:bold;"></td>
                        <td style = "font-size:13px ;text-align:center;line-height:20px;width:20%;font-weight:bold;">' . $date . '</td>
                    </tr>
                </table>
                <br>
                <table style="border-bottom: 0px solid rgba(0, 0, 0, 0.844); padding:10px 0px 30px 0px;width:100%;font-family: arial;">
                    <tr>
                    <td style = "font-size:25px ;line-height:20px;width:20%; text-align:center"><b>Stock Ledger</b></td>
                    <td style = "font-size:16px ;text-align:center;line-height:20px;width:10%; text-align:center; border: 1px solid gray;">BY BATCH</td>
                    <td style = "font-size:12px ;text-align:center;line-height:20px;width:10%; text-align:right"></td>
                    <td style = "font-size:15px ;line-height:20px;width:11%; text-align:center">Location = </td>
                    <td style = "font-size:16px ;text-align:center;line-height:20px;width:15%; text-align:center; border: 1px solid gray;"><b>' . $location_name . '</b></td>
                    <td style = "font-size:16px ;line-height:20px;width:5%; text-align:center"><b></b></td>
                    <td style = "font-size:15px ;text-align:center;line-height:20px;width:18%">Batch#  &nbsp;&nbsp;<b style="border: 1px solid gray;">&nbsp;' . $batch_no . '&nbsp;</b></td>
                    <td style = "font-size:12px ;text-align:center;line-height:20px;width:10%; text-align:right"></td>
                    <td style = "font-size:14px ;text-align:center;line-height:20px;width:22%; text-align:right">Expiry = </td>
                    <td style = "font-size:13px ;text-align:center;line-height:20px;width:10%; text-align:center;border: 1px solid gray;"><b>' . $exp_date . '</b></td>
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
