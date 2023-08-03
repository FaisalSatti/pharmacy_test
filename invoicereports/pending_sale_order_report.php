<?php
session_start();
include("../api/auth/db.php");
require_once __DIR__  . '/vendor/autoload.php';
require_once __DIR__ . '/../helpers/helpers.php';
$barcode = new Helpers();
if (isset($_GET['action']) && $_GET['action'] == 'print') {
    // print_r($_GET);
    // die(); 
    $company_code = $_GET['company_code'];
    $from_date = $_GET['from_date'];
    $to_date = $_GET['to_date'];
    $sql = "SELECT
    A.CO_CODE,
    A.DOC_YEAR,
    A.DOC_DATE,
    A.DOC_TYPE,
    A.DOC_NO,
    A.ORDER_KEY,
    A.REFNUM,
    A.PARTY_CODE,
    A.PARTY_NAME,
    A.ITEM_CODE,
    A.ITEM_NAME_SALE,
    A.ITEM_TYPE,
    A.QTY,
    A.RECEIPT_QTY,
    A.ORDER_BAL_QTY,
    B.co_name
    FROM ORDER_UM_VIEW A
    JOIN company B ON A.CO_CODE=B.co_code
    WHERE A.CO_CODE = '$company_code'
    AND A.DOC_DATE BETWEEN '$from_date' AND '$to_date'
    AND ifnull(ORDER_BAL_QTY,0)  > 0
    ORDER BY A.CO_CODE,A.PARTY_NAME,A.DOC_DATE,A.ORDER_KEY";
    // print_r($sql);die();
    $result = $conn->query($sql);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        $return_data = [];
        while ($show = mysqli_fetch_assoc($result)) {
            $return_data[] = $show;
            $company_name = $return_data[0]['co_name'];
            $date=date("Y-m-d");
            $doc_date= $return_data[0]['doc_date'];
            $order_key= $return_data[0]['order_key'];
            $party_name= $return_data[0]['PARTY_NAME'];
            $party_code= $return_data[0]['party_code'];
            $item_name= $return_data[0]['ITEM_NAME_sale'];
            $item_code= $return_data[0]['item_code'];
            $item_type= $return_data[0]['item_type'];
            $qty= $return_data[0]['qty'];
            $order_bal_qty= $return_data[0]['order_bal_qty'];
            $receipt_qty= $return_data[0]['receipt_qty'];
            
    }
    $i = 1;
    $total=0;
    foreach ($return_data as  $value) {
        
        $data_tr .= '<table style="white-space: nowrap;width:100%;border:1px solid black;border-collapse:collapse;"> 
                        <tr style="padding-top:55px;text-align:center;border-bottom:2px solid black;">
                            <td  style="width:12%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b>'.$value['doc_date'].'</b></td>
                            <td  style="width:18%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b>'.$value['PARTY_NAME'].'</b></td>
                            <td  style="width:25%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b>'.$value['ITEM_NAME_sale'].'</b></td>
                            <td  style="width:15%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b>'.number_format($value['qty'],2).'</b></td>
                            <td  style="width:15%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b>'.number_format($value['receipt_qty'],2).'</b></td>
                            <td  style="width:15%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b>'.number_format($value['order_bal_qty'],2).'</b></td>
                        </tr>
                        <tr style="padding-top:55px;text-align:center;border-bottom:2px solid black;">
                            <td  style="width:12%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b>'.$value['order_key'].'</b></td>
                            <td  style="width:18%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b>'.$value['party_code'].'</b></td>
                            <td  style="width:25%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b>'.$value['item_code'].'&emsp;&emsp;&emsp;&emsp;'.$value['item_type'].'</b></td>
                            <td  style="width:15%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b></td>
                            <td  style="width:15%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b></td>
                            <td  style="width:15%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b></td>
                        </tr>
                    </table>';
                    
    $reportqty =$reportqty + $value['qty'];
    $reportrqty =$reportrqty + $value['receipt_qty'];
    $reportbqty =$reportbqty + $value['order_bal_qty'];
                   
                ++$i;
    };
    $data_tr .= '<br><br><table style="white-space: nowrap;width:100%;border:1px solid black;border-collapse:collapse;"> 
                        <tr style="padding-top:55px;text-align:center;border-bottom:2px solid black;">
                            <td  style="width:25%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b>PENDING SALES ORDER</b></td>
                            <td  style="width:18%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b></td>
                            <td  style="width:12%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b></td>
                            <td  style="width:15%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b>'.number_format($reportqty,2).'</b></td>
                            <td  style="width:15%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b>'.number_format($reportrqty,2).'</b></td>
                            <td  style="width:15%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b>'.number_format($reportbqty,2).'</b></td>
                        </tr>
                       
                    </table>';
        
        



    // }
     
            $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
            $mpdf->WriteHTML(
                '<div class="row" style="line-height:5px;">
                    <div class="main-heading">
                        <table class="secondlast" style="width:100%;margin-top:20px;border-bottom:3px solid black;">
                            <tr>
                                <td style="height:10px;"></td>
                            </tr>
                            <tr>
                                <td style="width:25%;font-size:15px;text-align:left;font-weight:bold;">'.$company_name.'</b></td>
                                <td style="width:15%;border:1px solid black;text-align:center;font-size:13px;font-weight:bold;">PENDING ORDER</td>    
                                <td style="width:15%;border:1px solid black;text-align:center;font-size:12px;">'.$from_date.'</td>    
                                <td style="width:15%;border:1px solid black;text-align:center;font-size:12px;">'.$to_date.'</td>    
                                <td style="width:15%;text-align:center;font-size:12px;">'.$date.'</td>    
                                <td style="width:15%;text-align:center;font-size:12px;">'.$date.'</td>    
                            </tr>
                        </table>
                    </div>
                    
                    <div class="invoice_detail" style="padding-top:5px;height:100px;">
                        <table  style="width:100%;white-space: nowrap;">
                            <tr>
                                <td style="height:3px;"></td>
                            </tr>
                            <tr style="padding-top:55px;text-align:center;">
                                <th  style="width:12%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b>DATE/REF#</b></th>
                                <th  style="width:18%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b>PARTY NAME</b></th>
                                <th  style="width:25%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b>ITEM NAME/UM/TYPE</b></th>
                                <th  style="width:15%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b>ORDER QTY</b></th>
                                <th  style="width:15%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b>DC QTY</b></th>
                                <th  style="width:15%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b>PENDING</b></th>
                            </tr>
                           
                            <tr>
                                <td style="height:3px;"></td>
                            </tr>

                            <tr>
                                <td colspan="10" style="border-bottom:3px solid black;"></td>
                            </tr>

                            <tr>
                                <td style="height:5px;"></td>
                            </tr>
                           
                        </table>
                        ' . $data_tr . '
                    </div>
                </div>',2);         
                $mpdf->Output();
}else {
        echo "form no required";
    }
}else {
    echo "action not matched";
}
?>