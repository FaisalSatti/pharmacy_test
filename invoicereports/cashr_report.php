<?php
session_start();
include("../api/auth/db.php");
require_once __DIR__  . '/vendor/autoload.php';
require_once __DIR__ . '/../helpers/helpers.php';
$barcode = new Helpers();
if (isset($_GET['action']) && $_GET['action'] == 'print') {
    if (isset($_GET['voucher_no']) && !empty($_GET['voucher_no'])) {
        // print_r($_GET);die();
        $voucher_no = $_GET['voucher_no'];
        $doc_year = $_GET['doc_year'];
        $company_code = $_GET['company_code'];
        $company_name = $_GET['company_name'];



        $sql = "SELECT CO_CODE,DOC_YEAR,VOUCHER_TYPE,VOUCHER_NO,VOUCHER_DATE,
       CHQ_NO,CHQ_DATE,REF_NO,NARATION,PAYEE,
       BANK_CASH_CODE,CASHBANK_NAME,
       ENTRY_NO,ACCOUNT_CODE,ACCOUNT_NAME,
       DEBIT,CREDIT,REMARKS
FROM  ACCOUNT_VIEW_UM_CRBR
WHERE  VOUCHER_NO     ='$voucher_no'
AND        VOUCHER_TYPE = 'CR'
AND        CO_CODE              ='$company_code'
AND        DOC_YEAR = '$doc_year'
ORDER BY CO_CODE,VOUCHER_TYPE,VOUCHER_NO,ENTRY_NO";
        // print_r($sql);die();
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            $return_data = [];
            while ($show = mysqli_fetch_assoc($result)) {
                $return_data[] = $show;
                $data_tr = '';
                $data_tr2 = '';
                $VOUCHER_DATE = $show['VOUCHER_DATE'];
                $DOC_YEAR = $show['DOC_YEAR'];
                $VOUCHER_TYPE = $show['VOUCHER_TYPE'];
                $CHQ_NO = $show['CHQ_NO'];
                $CHQ_DATE = $show['CHQ_DATE'];
                $BANK_CASH_CODE = $show['BANK_CASH_CODE'];
                $CASHBANK_NAME = $show['CASHBANK_NAME'];
                $NARATION = $show['NARATION'];
                $PAYEE = $show['PAYEE'];
                $REF_NO = $show['REF_NO'];
                $ENTRY_NO = $show['ENTRY_NO'];
                $ACCOUNT_CODE = $show['ACCOUNT_CODE'];
                $ACCOUNT_NAME = $show['ACCOUNT_NAME'];
                $DEBIT = $show['DEBIT'];
                $CREDIT = $show['CREDIT'];
                // $B = $show['B'];
                $space = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
            }
            $i = 1;
            $debit=0;
            $TOTAL=0;
            foreach ($return_data as  $value) {
                
                $data_tr .= '<table style="border:1px solid black;width:100%;">
                                <tr style="border:1px solid black">
                                <td style="width:15%;font-size:12px;">'.$value['ACCOUNT_CODE'].'</td>
                                <td style="width:30%;font-size:12px;">'.$value['ACCOUNT_NAME'].'</td>
                                <td style="width:24%;font-size:12px;">'.$value['REMARKS'].'</td>
                                <td style="width:15%;font-size:12px;">'.number_format($value['CREDIT'],2).'</td>
                            </tr>
                            </table>';
                            
                           
                            $TOTAL= $TOTAL+$value['CREDIT'];
                            // print_r($total);die();
                        ++$i;
            }
            $number1 = $TOTAL;
            $no = floor($TOTAL);
            $hundred = null;
            $digits_1 = strlen($no); //to find lenght of the number
            $i = 0;
            // Numbers can stored in array format
            $str = array();
            
            $words = array('0' => '', '1' => 'One', '2' => 'Two',
            '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
            '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
            '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
            '13' => 'Thirteen', '14' => 'Fourteen',
            '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
            '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
            '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
            '60' => 'Sixty', '70' => 'Seventy',
            '80' => 'Eighty', '90' => 'Ninety');
            
            $digits = array('', 'Hundred', 'Thousand', 'lakh', 'Crore');
            //Extract last digit of number and print corresponding number in words till num becomes 0
            while ($i < $digits_1)
            {
                $divider = ($i == 2) ? 10 : 100;
                //Round numbers down to the nearest integer
                $number =floor($no % $divider);
                $no = floor($no / $divider);
                $i +=($divider == 10) ? 1 : 2;
                
                if ($number)
                {
                    $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                    $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                    $str [] = ($number < 21) ? $words[$number] . " " .
                    $digits[$counter] .
                    $plural . " " .
                    $hundred: $words[floor($number / 10) * 10]. " " .
                    $words[$number % 10] . " ".
                    $digits[$counter] . $plural . " " .
                    $hundred;
                }
                else $str[] = null;
            }
            
            $str = array_reverse($str);
            $result = implode('', $str);
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
                                <td style="width:250px;font-size:20px;font-family:arial;text-align:center;">'.$company_name.'</td>                                   
                            </tr>
                            <tr>
                            <td style="border-bottom:3px solid black;padding-top:15px;"></td>                                   
                            </tr>
                            <tr>
                                <td style="width:250px;font-size:20px;text-align:center;font-weight:bold;padding-top:8px;">CASH RECEIPT</td>                                   
                            </tr>
                            <tr>
                            <td style="border-bottom:3px solid black;padding-top:5px;"></td>                                   
                            </tr>
                        </table>
                    </div>
                    <div class="main-heading">
                        <table class="secondlast" style="width:100%;border-collapse:collapse;margin-top:20px;">
                            <tr colspan="4">
                                <td style="width:90px;font-size:17px;font-family:arial;font-weight:bold;">A/C CODE</td>                                   
                                <td style="width:130px;font-size:17px;font-family:arial;border:1px solid black;">&nbsp;'. $BANK_CASH_CODE    .'</td>
                                <td style="width:30px;"></td>                
                                <td style="width:60px;font-size:17px;font-family:arial;font-weight:bold;">Date</td>                                   
                                <td style="width:110px;font-size:17px;font-family:arial;border:1px solid black;">&nbsp;'. date('d/m/Y',strtotime($VOUCHER_DATE))    .'</td>
                                <td style="width:30px;"></td>                                   
                                    <td style="width:100px;font-size:17px;font-family:arial;font-weight:bold;">Voucher#</td>                                   
                                    <td style="width:130px;font-size:17px;font-family:arial;border:1px solid black;">&nbsp;'. $PAYEE    .'</td>
                                    <td style="width:30px;"></td>                                   
                                <td style="width:80px;font-size:17px;font-family:arial;font-weight:bold;">Trans#</td>                                   
                                <td style="width:130px;font-size:17px;font-family:arial;border:1px solid black;">&nbsp;'. $voucher_no    .'</td>                                   
                            </tr>  
                            <tr>
                            <td style="height:30px;"></td>
                        <tr>
                            <tr colspan="4">
                                <td style="width:90px;font-size:17px;font-family:arial;font-weight:bold;">title</td>                                   
                                <td style="width:230px;font-size:17px;font-family:arial;border:1px solid black;">&nbsp;'. $CASHBANK_NAME    .'</td>
                                <td style="width:30px;"></td>                
                                <td style="width:60px;font-size:17px;font-family:arial;font-weight:bold;">chq #</td>                                   
                                <td style="width:210px;font-size:17px;font-family:arial;border:1px solid black;">&nbsp;'. $CHQ_NO    .'</td>
                                <td style="width:30px;"></td>                                   
                                                                  
                            </tr>  
                            <tr>
                                <td style="height:30px;"></td>
                            <tr>
                            <tr>
                                <td style="width:90px;font-size:17px;font-family:arial;font-weight:bold;">Narration</td>                                   
                                <td colspan="10" style="font-size:17px;font-family:arial;border:1px solid black;">&nbsp;'. $NARATION    .'</td>
                                                                 
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
                                <td colspan="3" style="width:100%;font-size:13px;font-weight:bold;">Amount</td>
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
                        '.$data_tr.'
                    </div>
                
                    <table class="secondlast" style="border-collapse:collapse;width:100%;margin-top:20px;"> 
                        <tr>
                            <td style="border-bottom:3px solid black;padding-top:15px;"></td>                                   
                        </tr>
                    </table>
                    <table class="secondlast" style="margin-top:3px;margin-left:520px;"> 
                        <tr>
                            <td style="width:120px;text-align:center;font-size:14px;font-weight:bold;"></td>
                            <td style="width:110px;text-align:center;font-size:14px;font-weight:bold;"></td>                                 
                        </tr>
                    </table>
                <table class="secondlast" style="border-collapse:collapse;width:100%;"> 
                <tr>
                    <td colspan="3" style="border-bottom:3px solid black;padding-top:5px;"></td>                                   
                </tr>
            </table>
            <table  class="secondlast" style="width:100%; border-collapse:collapse; margin-top:20px; " >
            <tr>
                <td style = "font-size:11px;width:20%"> TOTAL
                </td>
                <td style = "font-size:11px; border:2px solid grey;">'.NUMBER_FORMAT($TOTAL,2) .'</td>   
            </tr>
            <tr>
            <td style = "font-size:11px;width:20%"> In Words
            </td>
            <td style = "font-size:11px; border:2px solid grey;">'.$result   .'Only</td>   
            </tr>
        </table><br><br>
            <div class=""  style="height:100px">
                <div style = "margin-top:70px;">
                    <span style = "font-weight: bold;border-top:2px solid black;">&emsp;&emsp; Prepared By &emsp;&emsp;</span>
                    
                    <span>&nbsp;</span>
                    <span style = "font-weight: bold;border-top:2px solid black;"> &emsp;&emsp; Checked By &emsp;&emsp;</span>
                    <span>&nbsp;</span>
                    <span style = "font-weight: bold;border-top:2px solid black;"> &emsp;&emsp; Authorized By &emsp;&emsp;</span>
                    <span>&nbsp;</span>
                    <span style = "font-weight: bold;border-top:2px solid black;"> &emsp;&emsp; Receiver &emsp;&emsp;</span>
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
