<?php
session_start();
include("../../api/auth/db.php");
require_once __DIR__  . '/../vendor/autoload.php';
require_once __DIR__ . '/../../helpers/helpers.php';
// $barcode = new Helpers();
if (isset($_GET['action']) && $_GET['action'] == 'print') {
    if (isset($_GET['voucher_no']) && !empty($_GET['voucher_no'])) {
        // print_r($_GET);die();
        $voucher_type = $_GET['voucher_type'];
        $co_code = $_GET['co_code'];
        $voucher_no = $_GET['voucher_no'];
        $doc_year = $_GET['doc_year'];
        $sql = "SELECT A.CO_CODE,A.DOC_YEAR,A.VOUCHER_TYPE,A.VOUCHER_NO,A.VOUCHER_DATE,A.NARATION,A.PAYEE,A.REF_NO,A.ENTRY_NO,A.ACCOUNT_CODE,A.ACCOUNT_NAME,A.DEBIT, 
        A.CREDIT,A.REMARKS,B.co_name FROM ACCOUNT_VIEW_UM_JV A JOIN company B ON A.co_code=B.co_code WHERE A.VOUCHER_NO='$voucher_no' AND A.VOUCHER_TYPE = 'OV' AND A.CO_CODE = '$co_code' AND A.DOC_YEAR = '$doc_year' ORDER BY A.CO_CODE, 
        A.VOUCHER_TYPE,A.VOUCHER_NO,A.ENTRY_NO;";
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            $return_data = [];
            while ($show = mysqli_fetch_assoc($result)) {
                $return_data[] = $show;
                $data_tr = '';
                $data_tr2 = '';
                $co_name = $return_data[0]['co_name'];
                $VOUCHER_DATE = $return_data[0]['VOUCHER_DATE'];
                $NARATION = $return_data[0]['NARATION'];
                $PAYEE = $return_data[0]['PAYEE'];
                $REF_NO = $return_data[0]['REF_NO'];
                $ENTRY_NO = $return_data[0]['ENTRY_NO'];
                $ACCOUNT_CODE = $return_data[0]['ACCOUNT_CODE'];
                $ACCOUNT_NAME = $return_data[0]['ACCOUNT_NAME'];
                $DEBIT = $return_data[0]['DEBIT'];
                $CREDIT = $return_data[0]['CREDIT'];
                $space = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
            }
            $i = 1;
            $debit=0;
            $credit=0;
            foreach ($return_data as  $value) {
                
                $data_tr .= '
                    <table style="border:1px solid black;width:100%;text-align:center;">
                        <tr style="border:1px solid black">
                            <td style="width:14%;font-size:14px;">'.$value['ACCOUNT_CODE'].'</td>
                            <td style="width:29%;font-size:14px;">'.$value['ACCOUNT_NAME'].'</td>
                            <td style="width:25%;font-size:14px;">'.$value['REMARKS'].'</td>
                            <td style="width:16%;font-size:14px;">'.number_format($value['DEBIT'],2).'</td>
                            <td style="width:16%;font-size:14px;">'.number_format($value['CREDIT'],2).'</td>
                        </tr>
                    </table>
                ';
                $debit= $debit+$value['DEBIT'];
                $credit= $credit+$value['CREDIT'];
                // print_r($total);die();
                ++$i;
            }
            $mpdf = new \Mpdf\Mpdf(['orientation' => 'P']);
            $stylesheet = file_get_contents('po_invoice.css');
            //     // $mpdf->SetWatermarkText('PAID');
            //     // $mpdf->showWatermarkText = true;
            $mpdf->WriteHTML($stylesheet, 1);
            $mpdf->WriteHTML(
                '<div class="row" style="line-height:16px;">
                    <div class="main-heading">
                        <table class="secondlast" style="width:100%;border-collapse:collapse;margin-top:20px;">
                            <tr>
                                <td style="width:250px;font-size:20px;font-family:arial;text-align:center;"><b>'.$co_name.'</b></td>                                   
                            </tr>
                            <tr>
                            <td style="border-bottom:3px solid black;padding-top:15px;"></td>                                   
                            </tr>
                            <tr>
                                <td style="width:250px;font-size:20px;text-align:center;font-weight:bold;padding-top:8px;">Debit Voucher</td>                                   
                            </tr>
                            <tr>
                            <td style="border-bottom:3px solid black;padding-top:5px;"></td>                                   
                            </tr>
                        </table>
                    </div>
                    <div class="main-heading">
                        <table class="secondlast" style="width:100%;border-collapse:collapse;margin-top:20px;">
                            <tr colspan="4">
                                <td style="width:90px;font-size:13px;font-family:arial;font-weight:bold;">JV#</td>                                   
                                <td style="width:130px;font-size:13px;font-family:arial;border:1px solid black;">&nbsp;'.$PAYEE.'</td>
                                <td style="width:40px;"></td>                
                                <td style="width:60px;font-size:13px;font-family:arial;font-weight:bold;">Date</td>                                   
                                <td style="width:110px;font-size:13px;font-family:arial;border:1px solid black;">&nbsp;'.$VOUCHER_DATE.'</td>
                                <td style="width:40px;"></td>                                                                     
                                <td style="width:80px;font-size:13px;font-family:arial;font-weight:bold;">Trans#</td>                                   
                                <td style="width:130px;font-size:13px;font-family:arial;border:1px solid black;">&nbsp;'.$voucher_no.'</td>                                   
                            </tr>  
                            <tr>
                                <td style="height:20px;"></td>
                            <tr>
                            <tr>
                                <td style="width:90px;font-size:12px;font-family:arial;font-weight:bold;">Narration</td>                                   
                                <td colspan="10" style="font-size:12px;font-family:arial;border:1px solid black;">&nbsp;'.$NARATION.'</td>
                                                                 
                            </tr>  
                        </table>
                    </div>
                    <div class="invoice_detail" style="padding-top:20px;height:100px;">
                        <table class="" style="display:inline-block;height:1200px;width:100%;text-align:center;">
                            <tr>
                                <td colspan="19" style="border-bottom:3px solid black;"></td>
                            </tr>
                            <tr>
                                <td style="height:3px;"></td>
                            <tr>
                            <tr style="padding-top:55px;">
                                <td style="width:14%;font-size:14px;font-weight:bold;">Code</td>
                                <td style="width:29%;font-size:14px;font-weight:bold;">Account Description</td>
                                <td style="width:25%;font-size:14px;font-weight:bold;">Remarks</td>
                                <td style="width:16%;font-size:14px;font-weight:bold;">Debit</td>
                                <td style="width:16%;font-size:14px;font-weight:bold;">Credit</td>
                            </tr>
                            <tr>
                                <td style="height:3px;"></td>
                            <tr>
                            <tr>
                                <td colspan="19" style="border-bottom:3px solid black;"></td>
                            </tr>
                            <tr>
                                <td style="height:5px;"></td>
                            <tr>
                        </table>
                        ' . $data_tr . '
                        
                    </div>
                
                    <table class="secondlast" style="border-collapse:collapse;width:100%;"> 
                        <tr>
                            <td style="border-bottom:3px solid black;padding-top:15px;"></td>                                   
                        </tr>
                    </table>
                    <table class="secondlast" style="margin-top:3px;width:100%;text-align:center;"> 
                        <tr>
                            <td style="width:14%;font-size:13px;font-weight:bold;"></td>
                            <td style="width:29%;font-size:13px;font-weight:bold;"></td>
                            <td style="width:25%;font-size:13px;font-weight:bold;"></td>
                            <td style="width:16%;font-size:13px;font-weight:bold;">'.number_format($debit,2).'</td>
                            <td style="width:16%;font-size:13px;font-weight:bold;">'.number_format($credit,2).'</td>  
                        </tr>
                    </table>
                    <table class="secondlast" style="border-collapse:collapse;width:100%;"> 
                        <tr>
                            <td colspan="3" style="border-bottom:3px solid black;padding-top:5px;"></td>                                   
                        </tr>
                    </table>
                 
                    <div class=""  style="height:100px">
                        <div style = "margin-top:70px;">
                            <span>&emsp;&emsp;</span>
                            <span style = "font-weight: bold;border-top:2px solid black;width:20%">&emsp;&emsp; Prepared By &emsp;&emsp;</span>
                            <span>&emsp;&emsp;&emsp;&emsp;&emsp;</span>
                            <span style = "font-weight: bold;border-top:2px solid black;"> &emsp;&emsp; Checked By &emsp;&emsp;</span>
                            <span>&emsp;&emsp;&emsp;&emsp;&emsp;</span>
                            <span style = "font-weight: bold;border-top:2px solid black;"> &emsp;&emsp; Authorized By &emsp;&emsp;</span>
                            <span>&emsp;&emsp;</span>
                        </div>
                    </div>
                </div>',2);
                $mpdf->Output();
        }
    }else {
        echo "<body style=background:black;><h1><center style=color:white;padding-top:20%;font-family:calibri;animation:3s infinite alternate slidein;>No data Found</center></h1></body>";
    }
}else {
    echo "<body style=background:black;><h1><center style=color:white;padding-top:20%;font-family:calibri;animation:3s infinite alternate slidein;>No data Found</center></h1></body>";
}
