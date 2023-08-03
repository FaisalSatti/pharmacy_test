<?php
session_start();
include("../api/auth/db.php");
require_once __DIR__  . '/vendor/autoload.php';
require_once __DIR__ . '/../helpers/helpers.php';
// $barcode = new Helpers();
if (isset($_GET['action']) && $_GET['action'] == 'print') {
    if (isset($_GET['voucher_no']) && !empty($_GET['voucher_no'])) {
        // print_r($_GET);die();
        // $voucher_type = $_GET['voucher_type'];
        $company_code = $_GET['company_code'];
        $voucher_no = $_GET['voucher_no'];
        $doc_year = $_GET['doc_year'];
        $sql = "SELECT CO_CODE,DOC_YEAR,VOUCHER_TYPE,VOUCHER_NO,VOUCHER_DATE,
        NARATION,PAYEE,
        ENTRY_NO,ACCOUNT_CODE,ACCOUNT_NAME,
        DEBIT,CREDIT,REMARKS
 FROM  ACCOUNT_VIEW_UM_JV
 WHERE  VOUCHER_NO     =   '$voucher_no'
 AND        VOUCHER_TYPE = 'JV'
 AND        CO_CODE       = '$company_code'
 AND        DOC_YEAR =     '$doc_year'
 ORDER BY CO_CODE,VOUCHER_TYPE,VOUCHER_NO,ENTRY_NO 
 ";
        // print_r($sql);die();
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);
        if ($count > 1) {
            $return_data = [];
            while ($show = mysqli_fetch_assoc($result)) {
                $return_data[] = $show;
                $data_tr = '';
                $data_tr2 = '';
                $VOUCHER_DATE = $show['VOUCHER_DATE'];
                $NARATION = $show['NARATION'];
                $PAYEE = $show['PAYEE'];
                $REF_NO = $show['REF_NO'];
                $ENTRY_NO = $show['ENTRY_NO'];
                $ACCOUNT_CODE = $show['ACCOUNT_CODE'];
                $ACCOUNT_NAME = $show['ACCOUNT_NAME'];
                $DEBIT = $show['DEBIT'];
                $CREDIT = $show['CREDIT'];
                $B = $show['B'];
                $space = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
            }
            $i = 1;
            $debit=0;
            $credit=0;
            foreach ($return_data as  $value) {
                
                $data_tr .= '<table style="border:1px solid black;width:100%;">
                                <tr style="border:1px solid black">
                                <td style="width:15%;font-size:14px;">'.$value['ACCOUNT_CODE'].'</td>
                                <td style="width:30%;font-size:14px;">'.$value['ACCOUNT_NAME'].'</td>
                                <td style="width:24%;font-size:14px;">'.$value['REMARKS'].'</td>
                                <td style="width:15%;font-size:14px;">'.number_format($value['DEBIT'],2).'</td>
                                <td style="width:15%;font-size:14px;">'.number_format($value['CREDIT'],2).'</td>
                            </tr>
                            </table>';
                            
                            $debit= $debit+$value['DEBIT'];
                            $credit= $credit+$value['CREDIT'];
                            // print_r($total);die();
                        ++$i;
            }
            $mpdf = new \Mpdf\Mpdf(['orientation' => 'P']);
            $stylesheet = file_get_contents('po_invoice.css');
                // $mpdf->SetWatermarkText('PAID');
                // $mpdf->showWatermarkText = true;
            $mpdf->WriteHTML($stylesheet, 1);
            $mpdf->WriteHTML(
                '<div class="row" style="line-height:16px;">
                    <div class="main-heading">
                        <table class="secondlast" style="width:100%;border-collapse:collapse;margin-top:20px;">
                            <tr>
                                <td style="width:250px;font-size:20px;font-family:arial;text-align:center;">UM Enterprises</td>                                   
                            </tr>
                            <tr>
                            <td style="border-bottom:3px solid black;padding-top:15px;"></td>                                   
                            </tr>
                            <tr>
                                <td style="width:250px;font-size:20px;text-align:center;font-weight:bold;padding-top:8px;">JOURNAL VOUCHER</td>                                   
                            </tr>
                            <tr>
                            <td style="border-bottom:3px solid black;padding-top:5px;"></td>                                   
                            </tr>
                        </table>
                    </div>
                    <div class="main-heading">
                        <table class="secondlast" style="width:100%;border-collapse:collapse;margin-top:20px;">
                            <tr colspan="4">
                                <td style="width:90px;font-size:12px;font-family:arial;font-weight:bold;">JV Nbr</td>                                   
                                <td style="width:130px;font-size:12px;font-family:arial;border:1px solid black;">&nbsp;'.$PAYEE.'</td>
                                <td style="width:30px;"></td>                
                                <td style="width:60px;font-size:12px;font-family:arial;font-weight:bold;">Date</td>                                   
                                <td style="width:110px;font-size:12px;font-family:arial;border:1px solid black;">&nbsp;'.$VOUCHER_DATE.'</td>
                                
                                


                                
                                <td style="width:80px;font-size:12px;font-family:arial;font-weight:bold;">Trans#</td>                                   
                                <td style="width:130px;font-size:12px;font-family:arial;border:1px solid black;">&nbsp;'.$voucher_no.'</td>                                   
                            </tr>  
                            <tr>
                                <td style="height:30px;"></td>
                            <tr>
                            <tr>
                                <td style="width:90px;font-size:12px;font-family:arial;font-weight:bold;">Narration</td>                                   
                                <td colspan="10" style="font-size:12px;font-family:arial;border:1px solid black;">&nbsp;'.$NARATION.'</td>
                                                                 
                            </tr>  
                        </table>
                    </div>
                    <div class="invoice_detail" style="padding-top:20px;height:100px;">
                        <table class="" style="display:inline-block;height:1200px;">
                            <tr>
                                <td colspan="19" style="border-bottom:3px solid black;"></td>
                            </tr>
                            <tr>
                                <td style="height:3px;"></td>
                            <tr>
                            <tr style="padding-top:55px;text-align:center;">
                                <td colspan="3" style="width:100%;font-size:13px;font-weight:bold;">Code</td>
                                <td colspan="6" style="width:100%;font-size:13px;font-weight:bold;">Account Description</td>
                                <td colspan="4" style="width:100%;font-size:13px;font-weight:bold;">Remarks</td>
                                <td colspan="3" style="width:100%;font-size:13px;font-weight:bold;">Debit</td>
                                <td colspan="3" style="width:100%;font-size:13px;font-weight:bold;">Credit</td>
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
                
                    <table class="secondlast" style="border-collapse:collapse;width:100%;margin-top:20px;"> 
                        <tr>
                            <td style="border-bottom:3px solid black;padding-top:15px;"></td>                                   
                        </tr>
                    </table>
                    <table class="secondlast" style="margin-top:3px;margin-left:520px;"> 
                        <tr>
                            <td style="width:120px;text-align:center;font-size:14px;font-weight:bold;">'.number_format($debit,2).'</td>
                            <td style="width:110px;text-align:center;font-size:14px;font-weight:bold;">'.number_format($credit,2).'</td>                                 
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
        echo "form no required";
    }
}else {
    echo "action not matched";
}
