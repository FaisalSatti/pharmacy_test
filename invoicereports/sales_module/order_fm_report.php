<?php
session_start();
include("../../api/auth/db.php");
require_once __DIR__  . '/../vendor/autoload.php';
require_once __DIR__ . '/../../helpers/helpers.php';
// $barcode = new Helpers();
if (isset($_GET['action']) && $_GET['action'] == 'print') {
    if (isset($_GET['doc_no']) && !empty($_GET['doc_no'])) {
        // print_r($_GET);die();
        $co_code = $_GET['co_code'];
        $doc_no = $_GET['doc_no'];
        $doc_year = $_GET['doc_year'];
        $order_key = $_GET['order_key'];


        $sql = "SELECT A.CO_CODE,A.DOC_YEAR,A.DOC_TYPE,A.DOC_NO,A.DOC_DATE,A.ORDER_KEY,A.REFNUM,A.PARTY_REF,A.CRDAYS,A.PO_CATG,
        A.PARTY_CODE,A.PARTY_NAME,A.ADDRESS,A.CONTACT_NAME,A.PHONE_NOS,A.GST,A.NTN,A.CITY_NAME,A.DIV_CODE,A.DIV_NAME,A.SMAN_CODE,A.
        SMAN_NAME,A.TOTAL_GROSS_AMT,A.TOTAL_NET_AMT,A.REMARKS,A.ENTRY_NO,A.ITEM_CODE,A.ITEM_NAME_SALE,A.ITEM_TYPE,A.TYPE_NAME,A.
        UM_NAME,A.QTY,A.RATE,A.RECEIPT_QTY,A.RATE,A.AMT,A.DISC_RATE,A.DISC_AMT,A.FRT_RATE,A.FRT_AMT,A.EXCL_RATE,A.EXCL_AMT,A.STAX_RATE_DTL,
        A.STAX_AMT_DTL,A.ADD_RATE,A.ADD_AMT,A.NET_AMT,A.BATCH_NO,A.EXPIRY_DATE,B.co_name
        FROM ORDER_UM_VIEW A
        JOIN company B ON A.co_code=B.co_code
        WHERE A.CO_CODE   = ' $co_code'
        AND   A.ORDER_KEY = '$order_key'
        AND   A.DOC_YEAR = '$doc_year'
        order by A.Order_key,A.doc_date,A.doc_no,A.entry_no";
                // print_r($sql); die();
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);
        // print_r($count); die();
        if($count > 0){
            $return_data=[];
            while($show = mysqli_fetch_assoc($result)){
                $return_data[] = $show; 
                $data_tr='';
                $data_tr2='';
                $co_code =  $return_data[0]['co_code'];
                $co_name =  $return_data[0]['co_name'];
                $doc_year =  $return_data[0]['doc_year'];
                $doc_type =  $return_data[0]['doc_type'];
                $doc_no =  $return_data[0]['doc_no'];
                $doc_date =  $return_data[0]['doc_date'];
                $order_key = $return_data[0]['order_key'];
                $refnum = $return_data[0]['refnum'];
                $party_ref = $return_data[0]['party_ref'];
                $party_code = $return_data[0]['party_code'];
                $PARTY_NAME = $return_data[0]['PARTY_NAME'];
                $address = $return_data[0]['address'];
                $contact_name = $return_data[0]['contact_name'];
                $phone_nos =  $return_data[0]['phone_nos'];
                $gst = $return_data[0]['gst'];
                $ntn = $return_data[0]['ntn'];
                $city_name =  $return_data[0]['city_name'];
                $div_code = $return_data[0]['div_code'];
                $div_name = $return_data[0]['div_name'];
                $crdays = $return_data[0]['crdays'];
                $sman_code = $return_data[0]['sman_code'];
                $sman_name = $return_data[0]['sman_name'];
                $po_catg = $return_data[0]['po_catg'];
                $total_gross_amt = $return_data[0]['total_gross_amt'];
                $total_net_amt = $return_data[0]['total_net_amt'];
                $remarks = $return_data[0]['remarks'];
                $entry_no = $return_data[0]['entry_no'];
                $item_code = $return_data[0]['item_code'];
                $ITEM_NAME_sale =  $return_data[0]['ITEM_NAME_sale'];
                $um_name = $return_data[0]['um_name'];
                $item_type = $return_data[0]['item_type'];
                $TYPE_NAME = $return_data[0]['TYPE_NAME'];
                $qty = $return_data[0]['qty'];
                $receipt_qty =  $return_data[0]['receipt_qty'];
                $rate = $return_data[0]['rate'];
                $amt = $return_data[0]['amt'];
                $disc_rate = $return_data[0]['disc_rate'];
                $disc_amt =  $return_data[0]['disc_amt'];
                $net_amt = $return_data[0]['net_amt'];
                $STAX_RATE_DTL = $return_data[0]['STAX_RATE_DTL'];
                $STAX_AMT_DTL = $return_data[0]['STAX_AMT_DTL'];
                $FRT_RATE = $return_data[0]['FRT_RATE'];
                $FRT_AMT =  $return_data[0]['FRT_AMT'];
                $ADD_RATE = $return_data[0]['ADD_RATE'];
                $ADD_AMT = $return_data[0]['ADD_AMT'];
                $EXCL_RATE = $return_data[0]['EXCL_RATE'];
                $EXCL_AMT = $return_data[0]['EXCL_AMT'];

                $BATCH_NO = $return_data[0]['BATCH_NO'];
                $EXPIRY_DATE = $return_data[0]['EXPIRY_DATE'];
                $space='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

            } 
            $i=1;
            $total_EXCL_RATE=0;
            $total_STAX_RATE_DTL=0;
            $total_ADD_RATE=0;
            $total_net_amt=0;
            foreach ($return_data as  $value) {
                $item_name=empty($value['item_name_sale'])?'Nil':$value['item_name_sale'];
                
                $data_tr .='
                <table class="data1" style="border:1px solid black;border-collapse:collapse;width:100%;">
                <tr style="border:1px solid black">
                    <td colspan="1" style="border:1px solid black;text-align:center;font-size:12px;width:8%;">'.$i.'</td>
                    <td colspan="3" style="border:1px solid black;width:16%;text-align:center;font-size:12px;">'.$value[$item_name].'Amino Acid <br> -'.$value['item_code'].'-'.$value['TYPE_NAME'].'</td>
                    <td colspan="1" style="border:1px solid black;text-align:center;font-size:12px;width:9%;">'.$value['qty'].'</td>
                    <td colspan="1" style="border:1px solid black;text-align:center;font-size:12px;width:10%;">'.NUMBER_FORMAT($value['rate'],2).'</td>
                    <td colspan="1" style="border:1px solid black;text-align:center;font-size:12px;width:8%;">'.$value['disc_rate'].'</td>
                    <td colspan="1" style="border:1px solid black;text-align:center;font-size:12px;width:8%;">'.$value['FRT_RATE'].'</td>
                    <td colspan="1" style="border:1px solid black;text-align:center;font-size:12px;width:8%;">'.$value['EXCL_RATE'].'</td>
                    <td colspan="1" style="border:1px solid black;text-align:center;font-size:12px;width:8%;">'.$value['STAX_RATE_DTL'].'</td>
                    <td colspan="1" style="border:1px solid black;text-align:center;font-size:12px;width:8%;">'.$value['ADD_RATE'].'</td>
                    <td colspan="1" style="border:1px solid black;text-align:center;font-size:12px;width:9%;">'.number_format($value['net_amt'],2).'</td>
                    <td colspan="1" style="border:1px solid black;text-align:center;font-size:12px;width:8%;">'.$value['BATCH_NO'].'</td>
                </tr>
                            </table>';
                            $data_tr2 .='';
                            $total_EXCL_RATE=$total_EXCL_RATE+$value['EXCL_RATE'];
                            $total_STAX_RATE_DTL=$total_STAX_RATE_DTL+$value['STAX_RATE_DTL'];
                            $total_ADD_RATE=$total_ADD_RATE+$value['ADD_RATE'];
                            $total_net_amt=$total_net_amt+$value['net_amt'];
                                 ++$i;
            }
        
            $number1 = $total_net_amt;
            $no = floor($total_net_amt);
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
            $results = implode('', $str);
            // PRINT_R($return_data);DIE();
            $mpdf = new \Mpdf\Mpdf(['orientation' => 'P']);
            $stylesheet = file_get_contents('stax_invoice.css');
            //     // $mpdf->SetWatermarkText('PAID');
            //     // $mpdf->showWatermarkText = true;
            $mpdf->WriteHTML($stylesheet, 1);
            $mpdf->WriteHTML('<div class="row" style="line-height:16px;">
            <div class="main-heading">
                <table border = "2" class="secondlast" style="width:100%; border-collapse:collapse;margin-top:20px;margin-right:700px;font-family:arial;">
                    <tr>
                        <td style="width:210px;font-size:26px;font-weight:bold;">'.$co_name.'</td>                              
                    </tr>
                    <tr>
                        <td style="width:250px;font-size:15px;height:60px;"><span><b></b></span></td>                                   
                    </tr>
                    <tr>
                        <td style="width:250px;font-size:15px;"><span>Voice 92-213-5050074-77</span></td>                                   
                    </tr>
                    <tr>
                        <td style="width:250px;font-size:15px;"><span>Fax 92-213-5066552</span></td>                                   
                    </tr>
                    <tr>
                        <td style="width:250px;font-size:15px;"><span>GST No. <b> '.$gst.'</b></span></td>                                   
                    </tr>
                    <tr>
                        <td style="width:250px;font-size:15px;"><span>NTN No. <b>'.$ntn.'</b></span></td>                                   
                    </tr>
                    <tr>
                        <td style="width:250px;font-size:12px;"></td>                                   
                    </tr>
                    <tr>
                        <td style="width:250px;font-size:12px;"></td>                                   
                    </tr>
                    <tr>
                        <td style="width:250px;font-size:12px;"></td>                                   
                    </tr>
                
                </table>
            </div>
            <div class="main-heading">
                <table border = "2" class="secondlast" style="border-collapse:collapse;margin-top:-135px;margin-left:360px; " >
                    <tr>
                        <td style="width:170px;font-size:18px;font-weight:bold;">SALES ORDER</td>                                   
                    </tr>
                    <tr>
                        <td style="width:170px;font-size:11px;"></td>                                   
                    </tr>
                    <tr>
                        <td style="width:170px;font-size:11px;"><span>Sales Order# <b> '.$order_key.'</b></span></td>                                   
                    </tr>
                    <tr>
                        <td style="width:170px;font-size:11px;height:8px;"></td>                                   
                    </tr>
                    <tr>
                        <td style="width:170px;font-size:11px;"><span>Division <b> '.$div_name.'</b> </span></td>                                   
                    </tr>
                    <tr>
                        <td style="width:170px;height:8px;font-size:11px;"></td>                                   
                    </tr>
                    <tr>
                        <td style="width:170px;font-size:11px;"><span>Co Ref# <b> '.$refnum.'</b> </span></td>                                   
                    </tr>
                    <tr>
                        <td style="width:170px;height:8px;"></td>                                   
                    </tr>
                    <tr>
                        <td style="width:170px;font-size:11px;"><span>Salesman <b>'.$sman_name.'</b></span></td>                                   
                    </tr>
                    <tr>
                        <td style="width:170px;height:35px;font-size:11px;"></td>                                   
                    </tr>
                    
                </table>
            </div>
            <div class="main-heading">
                <table border = "2" class="secondlast" style="border-collapse:collapse;margin-top:-130px;margin-left:550px; " >
                <tr>
                    <td style="width:170px;font-size:11px;"></td>                                   
                 </tr>
                    <tr>
                        <td style="width:170px;font-size:12px;"></td>                                   
                    </tr>
                    <tr>
                        <td style="width:170px;font-size:12px;"><span>Date <b>' .$doc_date.'</b></span></td>                                   
                    </tr>
                    <tr>
                        <td style="width:170px;font-size:12px;height:8px;"></td>                                   
                    </tr>
                    <tr>
                        <td style="width:170px;font-size:12px;"><span>Customer Ref# <b>'.$party_ref.'</b></span></td>                                   
                    </tr>
                    <tr>
                        <td style="width:170px;height:8px;font-size:12px;"></td>                                   
                    </tr>
                    <tr>
                        <td style="width:200px;font-size:12px;"><span>Payment Terms&nbsp;&nbsp;<b>  '.$crdays.'</b>&nbsp;&nbsp;Days<b></b> </span></td>                                   
                    </tr>
                    <tr>
                        <td style="width:170px;height:8px;"></td>                                   
                    </tr>
                    <tr>
                        <td style="width:170px;font-size:12px;"></td>                                   
                    </tr>
                    <tr>
                        <td style="width:170px;height:35px;font-size:12px;"></td>                                   
                    </tr>
                    
                </table>
            </div>
                            <div class="party" style="border:1px solid black;width:100%;">
                                <table class="mast" style="width:100%;">
                                    <tr>
                                        <td style="background-color:gray;height:50px;border-right:2px solid black;text-align:center;font-size:13px;" >Bill To</td>
                                        <td style="background-color:gray;height:50px;padding-left:20px;font-size:13px;">Ship To</td>
                                    </tr>
                                    <tr>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase;border-right:2px solid black;font-size:11px;">PARTY NAME : <b> '.$PARTY_NAME.'</b></td>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase;font-size:11px;"><b>'.$PARTY_NAME.'</b></td>
                                    </tr>
                                    <tr>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase;border-right:2px solid black;font-size:11px;">ADDRESS : <b>'.$address.'</b> </td>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase;font-size:11px;"><b>'.$address.'</b></td>
                                    </tr>
                                    <tr>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase;border-right:2px solid black;font-size:11px;">CITY : <b>'.$city_name.'</b> </td>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase;height:20px;font-size:11px;">Party Code : <b> '.$party_code.'</b></td>
                                    </tr>
                                    <tr>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase;border-right:2px solid black;font-size:11px;">PHONE# : <b>'.$phone_nos.'</b> </td>
                                    
                                    </tr>
                                    <tr>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase;border-right:2px solid black;font-size:11px;">CONTACT# : <b> '.$contact_name.'</b> </td>
                                    </tr>
                                    <tr>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase;border-right:2px solid black;font-size:11px;"><span>GST# : <b> '.$gst.'</b> </span></td>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase;font-size:11px;"> NTN# : <b> '.$ntn.'</b> </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="invoice_detail"  style="padding-top:30px;height: 350px;">
                                <table class="" style="border-top:2px solid black;display:inline-block;width:100%;height:1200px">
                                    <tr style="padding-top:55px">
                                        <td colspan="1" style="text-align:center;font-size:12px;width:8%;"><b>S-NO</b></td>
                                        <td colspan="3" style="width:16%;text-align:center;font-size:12px;"><b>Item Name<br>Code-Type</b></td>
                                        <td colspan="1" style="text-align:center;font-size:12px;width:9%;"><b>Qty</b></td>
                                        <td colspan="1" style="text-align:center;font-size:12px;width:10%;"><b>Rate Amount</b></td>
                                        <td colspan="1" style="text-align:center;font-size:12px;width:8%;"><b>Disc Rate Amount</b></td>
                                        <td colspan="1" style="text-align:center;font-size:12px;width:8%;"><b>Frt Rate Amount</b></td>
                                        <td colspan="1" style="text-align:center;font-size:12px;width:8%;"><b>Excl Rate Amount</b></td>
                                        <td colspan="1" style="text-align:center;font-size:12px;width:8%;"><b>Stax Rate Amount</b></td>
                                        <td colspan="1" style="text-align:center;font-size:12px;width:8%;"><b>Add Rate Amount</b></td>
                                        <td colspan="1" style="text-align:center;font-size:12px;width:9%;"><b>Net Amount</b></td>
                                        <td colspan="1" style="text-align:center;font-size:12px;width:8%;"><b>Batch No</b></td>
                                    </tr>
                                </table>
                                '.$data_tr.'
                            </div>
                            <div class="" style="padding-top:20px;height: 0px;">
                            <table class="data1" style="border:1px solid black;border-collapse:collapse;width:100%;">
                                    <tr style="border:1px solid black">
                                        <td colspan="1" style="text-align:center;font-size:12px;width:8%;"></td>
                                        <td colspan="3" style="width:16%;text-align:center;font-size:12px;"><b>Total</b></td>
                                        <td colspan="1" style="text-align:center;font-size:12px;width:9%;"></td>
                                        <td colspan="1" style="text-align:center;font-size:12px;width:10%;"></td>
                                        <td colspan="1" style="text-align:center;font-size:12px;width:8%;"></td>
                                        <td colspan="1" style="text-align:center;font-size:12px;width:8%;"></td>
                                        <td colspan="1" style="text-align:center;font-size:12px;width:8%;">'.number_format($total_EXCL_RATE,2).'</td>
                                        <td colspan="1" style="text-align:center;font-size:12px;width:8%;">'.number_format($total_STAX_RATE_DTL,2).'</td>
                                        <td colspan="1" style="text-align:center;font-size:12px;width:8%;">'.number_format($total_ADD_RATE,2).'</td>
                                        <td colspan="1" style="text-align:center;font-size:12px;width:9%;">'.number_format($total_net_amt,2).'</td>
                                        <td colspan="1" style="text-align:center;font-size:12px;width:8%;"></td>
                                    </tr>
                                </table>
                                <table class="data1" style="border:1px solid black;display:inline-block;width:100%;height:1200px;padding-bottom:150px;font-family:arial;">


                                </table>
                                </div>
                                <table  class="secondlast" style="width:100%; border-collapse:collapse; margin-top:20px;font-family:arial; " >
                                <tr>
                                <td style = "font-size:11px;width:10%;text-align:center;"><b>Remarks</b></td>
                                <td style = "font-size:11px;width:90%;">&nbsp;'.$remarks.'</td>
                                </tr>

                                <tr>
                                <td style = "font-size:11px;width:10%;"> <b>&nbsp;</b></td>
                                </tr>

                                <tr>
                                <td style = "font-size:11px;width:10%;text-align:center;"> <b>In Words :</b></td>
                                <td style = "font-size:11px;width:90%;">&nbsp;('.$results.' Only)</td>
                                </tr>
                                <tr>
                                <td style="width:170px;height:35px;"></td>                                   
                            </tr>


                            </table>
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
                </div>
                            
        
            </div>', 2);
            $mpdf->Output();
        }
} else {
        echo "form no required";
    }
} 
else {
    echo "action not matched";
}




