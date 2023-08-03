<?php
session_start();
include("../../api/auth/db.php");
require_once __DIR__  . '/../vendor/autoload.php';
require_once __DIR__ . '/../../helpers/helpers.php';
// $barcode = new Helpers();
if (isset($_GET['action']) && $_GET['action'] == 'print') {
    if (isset($_GET['doc_no']) && !empty($_GET['doc_no'])) {
        // print_r($_GET);die();
        $order_key = $_GET['order_key'];
        $co_code = $_GET['co_code'];
        $doc_no = $_GET['doc_no'];
        $doc_year = $_GET['doc_year'];
        $sql = "SELECT 
        A.CO_CODE,A.DOC_YEAR,A.DOC_TYPE,A.DOC_NO,A.DOC_DATE,A.DO_KEY,A.ORDER_PARTY_REF,A.REFNUM,A.REFNUM2,A.ORDER_REFNUM,
        A.DUE_DATE,A.PO_NO,A.PO_DATE,
        A.PARTY_CODE,A.PARTY_NAME,A.ADDRESS,A.CONTACT_NAME,A.PHONE_NOS,A.GST,A.NTN,A.CITY_NAME,A.CRDAYS,
        A.DIV_NAME,A.SMAN_NAME,A.SHIP_MODE,A.SHIP_NO,
        A.STAX_RATE,A.STAX_AMT,A.OTHER_CHRGS,A.OTHER_DED,A.TOTAL_GROSS_AMT,A.TOTAL_NET_AMT,A.REMARKS,
        A.ADDTAX_AMT,A.CHARGE_AMT,A.ADDTAX_RATE,A.loc_code,
        A.ENTRY_NO,A.ITEM_CODE,A.ITEM_NAME_SALE,A.TYPE_NAME,A.ITEM_NAME_SALE2,A.UM_NAME,
        A.QTY,A.RATE,A.AMT,A.DISC_RATE,A.DISC_AMT,A.FRT_RATE,A.FRT_AMT,
        A.EXCL_RATE,A.EXCL_AMT,A.STAX_RATE_DTL,A.STAX_AMT_DTL,A.ADD_RATE,A.ADD_AMT,A.NET_AMT,
        A.BATCH_NO,A.EXPIRY_DATE,A.ITEM_HSCODE,A.LOC_NAME,A.LEDGER_BAL,A.ITAX_AMT,A.ITAX_RATE,B.co_name
        FROM DC_UM_VIEW_NEW A
        JOIN company B on A.co_code=B.co_code
        WHERE A.CO_CODE   = '$co_code'
        AND   A.DO_KEY     = '$order_key'
        AND   A.DOC_TYPE   = 'DC'
        AND   A.DOC_YEAR   = '$doc_year'
        ORDER BY A.DO_KEY,A.DOC_NO,A.ENTRY_NO";
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
                $do_key = $return_data[0]['do_key'];
                $order_party_ref = $return_data[0]['order_party_ref'];
                $refnum = $return_data[0]['refnum'];
                $REFNUM2 = $return_data[0]['REFNUM2'];
                $order_refnum = $return_data[0]['order_refnum'];
                $due_date = $return_data[0]['due_date'];
                $po_no = $return_data[0]['po_no'];
                $po_date = $return_data[0]['po_date'];
                $party_code =  $return_data[0]['party_code'];
                $PARTY_NAME = $return_data[0]['PARTY_NAME'];
                $address = $return_data[0]['address'];
                $contact_name = $return_data[0]['contact_name'];
                $phone_nos = $return_data[0]['phone_nos'];
                $gst =  $return_data[0]['gst'];
                $ntn = $return_data[0]['ntn'];
                $city_name = $return_data[0]['city_name'];
                $crdays = $return_data[0]['crdays'];
                $div_name = $return_data[0]['div_name'];
                $sman_name = $return_data[0]['sman_name'];
                $ship_mode = $return_data[0]['ship_mode'];
                $ship_no = $return_data[0]['ship_no'];
                $stax_rate = $return_data[0]['stax_rate'];
                $stax_amt = $return_data[0]['stax_amt'];
                $other_chrgs =  $return_data[0]['other_chrgs'];
                $other_ded = $return_data[0]['other_ded'];
                $total_gross_amt = $return_data[0]['total_gross_amt'];
                $total_net_amt = $return_data[0]['total_net_amt'];
                $remarks = $return_data[0]['remarks'];
                $addtax_amt =  $return_data[0]['addtax_amt'];
                $charge_amt = $return_data[0]['charge_amt'];
                $addtax_rate = $return_data[0]['addtax_rate'];
                $loc_code = $return_data[0]['loc_code'];
                $entry_no = $return_data[0]['entry_no'];
                $item_code =  $return_data[0]['item_code'];
                $ITEM_NAME_sale = $return_data[0]['ITEM_NAME_sale'];
                $TYPE_NAME = $return_data[0]['TYPE_NAME'];
                $ITEM_NAME_sale2 = $return_data[0]['ITEM_NAME_sale2'];
                $um_name = $return_data[0]['um_name'];
                $qty =  $return_data[0]['qty'];
                $rate = $return_data[0]['rate'];
                $amt = $return_data[0]['amt'];
                $disc_rate = $return_data[0]['disc_rate'];
                $disc_amt = $return_data[0]['disc_amt'];
                $FRT_RATE =  $return_data[0]['FRT_RATE'];
                $FRT_AMT = $return_data[0]['FRT_AMT'];
                $EXCL_RATE = $return_data[0]['EXCL_RATE'];
                $excl_amt = $return_data[0]['excl_amt'];
                $STAX_RATE_DTL = $return_data[0]['STAX_RATE_DTL'];
                $ADD_RATE =  $return_data[0]['ADD_RATE'];
                $ADD_AMT = $return_data[0]['ADD_AMT'];
                $net_amt = $return_data[0]['net_amt'];
                $expiry_date = $return_data[0]['expiry_date'];
                $ledger_bal = $return_data[0]['ledger_bal'];
                $ITAX_RATE = $return_data[0]['ITAX_RATE'];
                $ITAX_AMT = $return_data[0]['ITAX_AMT'];
                $REFNUM2 = $return_data[0]['REFNUM2'];
                $order_refnum = $return_data[0]['order_refnum'];
                $space='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                // 
                // print_r($space);die();
            } 
            $i=1;
            $total_excl_amt=0;
            $total_STAX_AMT_DTL=0;
            $total_ADD_AMT=0;
            $total1_net_amt=0;
            foreach ($return_data as  $value) {
                $item_name=empty($value['item_name_sale'])?'Nil':$value['item_name_sale'];
                $data_tr .=
                    '<tr style="border:1px solid black">
                        <td style="border:1px solid black;font-size:12px;width:7%;">'.$i.'</td>
                        <td  style="border:1px solid black;font-size:12px;width:29%;">'.$value['ITEM_NAME_sale'].'</td>
                        <td  style="border:1px solid black;width:10%;">'.$value['loc_code'].'</td>
                        <td style="border:1px solid black;font-size:12px;width:9%;">'.number_format($value['qty'],2).'</td>
                        <td style="border:1px solid black;font-size:12px;width:9%;">'.$value['batch_no'].'</td>
                        <td style="border:1px solid black;font-size:12px;width:9%;">'.number_format($value['EXCL_RATE'],2).'</td>
                        <td style="border:1px solid black;font-size:12px;width:9%;">'.number_format($value['STAX_RATE_DTL'],2).'</td>
                        <td style="border:1px solid black;width:9%;font-size:12px;">'.number_format($value['ADD_RATE'],2).'</td>
                        <td style="border:1px solid black;font-size:12px;">'.number_format($value['Inc'],2).'</td>
                    </tr>
                    <tr style="border:1px solid black">
                        <td  style="border:1px solid black;font-size:12px;width:7%;"></td>
                        <td style="border:1px solid black;text-align:left;font-size:12px;width:29%;">'.$value['item_code'].'&emsp;&emsp;'.$value['TYPE_NAME'].'&emsp;&emsp;'.$value['um_name'].'</td>
                        <td  style="border:1px solid black;width:10%;"></td>
                        <td  style="border:1px solid black;font-size:12px;width:9%;">'.$value['loc_code'].'</td>
                        <td style="border:1px solid black;!important;width:9%;font-size:12px;">'.$value['expiry_date'].'</td>
                        <td  style="border:1px solid black;text-align:left;font-size:12px;width:9%;">'.number_format($value['EXCL_AMT'],2).'</td>
                        <td style="border:1px solid black;!important;width:9%;font-size:12px;">'.number_format($value['STAX_AMT_DTL'],2).'</td>
                        <td style="border:1px solid black;!important;width:9%;font-size:12px;">'.number_format($value['ADD_AMT'],2).'</td>
                        <td style="border:1px solid black;!important;width:9%;font-size:12px;">'.number_format($value['net_amt'],2).'</td>
                    </tr>';
                    $total_excl_amt=$total_excl_amt+$value['excl_amt'];
                    $total_STAX_AMT_DTL=$total_STAX_AMT_DTL+$value['STAX_AMT_DTL'];
                    $total_ADD_AMT=$total_ADD_AMT+$value['ADD_AMT'];
                    $total1_net_amt=$total1_net_amt+$value['net_amt'];
                ++$i;
            }
            // print_r($total_net_amt);die();
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
            $mpdf = new \Mpdf\Mpdf(['orientation' => 'P']);
            $stylesheet = file_get_contents('stax_invoice.css');
            //     // $mpdf->SetWatermarkText('PAID');
            //     // $mpdf->showWatermarkText = true;
            $mpdf->WriteHTML($stylesheet, 1);
            $mpdf->WriteHTML('<div class="row" style="line-height:16px;">
            <div class="main-heading">
                <table border = "2" class="secondlast" style="width:100%; border-collapse:collapse;margin-top:20px;margin-right:700px;font-family:arial;" >
                    <tr>
                        <td style="width:210px;font-size:26px;font-weight:bold;">'.$co_name.'</td>
                    </tr>
                    <tr>
                        <td style="height:10px;"></td>
                    </tr>
                    <tr>
                        <td style="width:210px;font-size:14px;height:74px;padding-top:-35px;"><span>Plot No 12, Sector - 14, Korangi Industrial Area, Karachi 74900</span></td>
                    </tr>
                    <tr>
                        <td style="width:210px;font-size:14px;"><b>'.$PARTY_NAME.'</b></td>
                    </tr>
                    <tr>
                        <td style="width:210px;font-size:14px;"></td>
                    </tr>
                    <tr>
                        <td style="width:210px;font-size:14px;"></td>
                    </tr>
                    <tr>
                        <td style="width:210px;font-size:14px;"></td>
                    </tr>
                    <tr>
                        <td style="width:210px;font-size:12px;"></td>
                    </tr>
                </table>
                <table border = "2" class="secondlast" style="width:30%;border-collapse:collapse;margin-top:-80px;margin-left:160px;font-family:arial;" >
                    <tr>
                        <td style="font-size:10px;"><span><b>Voice</b> 92-213-5066552</span></td>
                    </tr>
                    <tr>
                        <td style="height:5px;"></td>
                    </tr>
                    <tr>
                        <td style="font-size:10px;"><span><b>Fax</b> 92-213-5066552</span></td>
                    </tr>
                    <tr>
                        <td style="height:5px;"></td>
                    </tr>
                    <tr>
                        <td style="font-size:10px;"><span><b>GST#</b> '.$gst.'</span></td>
                    </tr>
                    <tr>
                        <td style="height:5px;"></td>
                    </tr>
                    <tr>
                        <td style="font-size:10px;"><span><b>NTN#</b> '.$ntn.'</span></td>
                    </tr>
                    <tr>
                        <td style="font-size:12px;"></td>
                    </tr>
                    <tr>
                        <td style="font-size:12px;"></td>
                    </tr>
                </table>
            </div>
            <div class="main-heading">
                <table border = "2" class="secondlast" style="border-collapse:collapse;margin-top:-110px;margin-left:360px; " >
                    <tr>
                        <td style="width:170px;font-size:18px;font-family:arial;"><b>Sale Tax Invoice</b></td>                                   
                    </tr>
                    <tr>
                        <td style="width:170px;font-size:11px;"></td>                                   
                    </tr>
                    <tr>
                        <td style="width:170px;font-size:11px;"><span>Invoice No <b>'.$REFNUM2.'</b></span></td>                                   
                    </tr>
                    <tr>
                        <td style="width:170px;font-size:11px;height:8px;"></td>                                   
                    </tr>
                    <tr>
                        <td style="width:170px;font-size:11px;"><span>Transaction# <b>'.$do_key.'</b> </span></td>                                   
                    </tr>
                    <tr>
                        <td style="width:170px;height:8px;font-size:11px;"></td>                                   
                    </tr>
                    <tr>
                        <td style="width:170px;font-size:11px;"><span>Sales Order No# <b>'.$po_no.'</b></span></td>                                   
                    </tr>
                    <tr>
                        <td style="width:170px;height:8px;"></td>                                   
                    </tr>
                    <tr>
                        <td style="width:170px;font-size:11px;"><span></span></td>                                   
                    </tr>
                </table>
            </div>
            <div class="main-heading">
                <table border = "2" class="secondlast" style="border-collapse:collapse;margin-top:-98px;margin-left:650px; " >
                <tr>
                    <td style="width:170px;font-size:11px;"></td>                                   
                 </tr>
                    <tr>
                        <td style="width:170px;font-size:14px;"></td>                                   
                    </tr>
                    <tr>
                        <td style="width:170px;font-size:14px;"><span>Date <b>'.$doc_date.'</b></span></td>                                   
                    </tr>
                    <tr>
                        <td style="width:170px;font-size:14px;height:8px;"></td>                                   
                    </tr>
                    <tr>
                        <td style="width:170px;font-size:14px;"><span>Division <b>'.$div_name.'</b></span></td>                                   
                    </tr>
                    <tr>
                        <td style="width:170px;height:8px;font-size:14px;"></td>                                   
                    </tr>
                    <tr>
                        <td style="width:200px;font-size:14px;"><span>Order Date <b> '.$po_date.'</b></span></td>                                   
                    </tr>
                    <tr>
                        <td style="width:170px;height:8px;"></td>                                   
                    </tr>
                    <tr>
                        <td style="width:200px;font-size:14px;"><span>Order Ref#<b>'.$order_refnum.'</b></span></td>                                   
                    </tr>
                    <tr>
                        <td style="width:170px;font-size:14px;"></td>                                   
                    </tr>
                    <tr>
                        <td style="width:170px;height:35px;font-size:14px;"></td>                                   
                    </tr>
                    
                </table>
            </div>
            <div class="" style="border:1px solid black;width:100%;">
                <table class="">
                    <tr>
                        <td style="background-color:gray;height:50px;border-right:2px solid black;width:50%;padding-left:20px;font-size:12px;" >BILL TO</td>
                        <td style="background-color:gray;width:50%;height:50px;width:350px;padding-left:20px;font-size:12px;">DELIVER TO</td>
                    </tr>
                    <tr>
                        <td style="width:50%;padding-left:20px;text-transform:uppercase;border-right:2px solid black;font-size:11px;">PARTY NAME : <b> '.$PARTY_NAME.'</b></td>
                        <td style="width:50%;padding-left:20px;text-transform:uppercase;font-size:11px;"><b>'.$address.'</b></td>
                    </tr>
                    <tr>
                        <td style="width:50%;padding-left:20px;text-transform:uppercase;border-right:2px solid black;font-size:11px;">ADDRESS : <b> '.$address.'</b> </td>
                        <td style="width:50%;padding-left:20px;text-transform:uppercase"></td>
                    </tr>
                    <tr>
                        <td style="width:50%;padding-left:20px;text-transform:uppercase;border-right:2px solid black;font-size:11px;">CITY : <b> '.$city_name.'</b></td>
                        <td style="width:50%;padding-left:20px;text-transform:uppercase;font-size:11px;">CUSTOMER REF# : <b> '.$order_party_ref.'</b></td>
                    </tr>
                    <tr>
                        <td style="width:50%;padding-left:20px;text-transform:uppercase;border-right:2px solid black;font-size:11px;">PHONE# : <b> '.$phone_nos.'</b> </td>
                        <td style="width:20px;padding-left:20px;text-transform:uppercase;font-size:11px;">PAYMENT TERMS# : <b> '.$crdays.'</b>&emsp;&emsp;&emsp;&emsp;<span><b>DAYS:</b>&emsp;&emsp;&emsp;&emsp;</span><span><b>DUE DT:</b></span></td>
                    
                    </tr>
                    <tr>
                        <td style="width:50%;padding-left:20px;text-transform:uppercase;border-right:2px solid black;font-size:11px;">CONTACT# :<span><b> '.$contact_name.'</b>&nbsp;&emsp;PARTY# : <b> '.$party_code.'</b></span> </td>
                        <td style="width:50%;padding-left:20px;text-transform:uppercase;font-size:11px;"><span>SHIP&nbsp;METHOD:<b>'.$ship_mode.'</b></span>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<span><b>CN#:</b>'.$ship_no.'&emsp;&emsp;&emsp;</span></td>
                    </tr>
                    <tr>
                    <td style="width:50%;padding-left:20px;text-transform:uppercase;border-right:2px solid black;font-size:11px;"><span>GST# : <b> '.$gst.'</b>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;NTN/CNIC# : <b> '.$ntn.'</b></span></td>
                    <td style="width:50%;padding-left:20px;text-transform:uppercase;font-size:11px;"><span>SALESMAN : <b> '.$sman_name.'</b></span></td>
                    </tr>
                </table>
            </div>
            <div class="invoice_detail"  style="padding-top:10px;height: 350px;">
                <table class="table_head" style="border:1px solid black;display:inline-block;width:100%;height:1200px;">
                    <tr style="padding-top:55px">
                        <td style="border:2px solid black;font-size:13px;"><b>S-No</b><td>
                        <td colspan="4" style="border:2px solid black;font-size:13px;width:200px"><b>Item Description</b></td>
                        <td  style="border:2px solid black;font-size:13px;width:67px"><b>HSCode</b></td>
                        <td style="border:2px solid black;font-size:13px;width:60px"><b>Qty</b></td>
                        <td style="border:2px solid black;font-size:13px;width:65px"><b>Batch#</b></td>
                        <td style="border:2px solid black;font-size:13px;"><b>Excl Rate</b></td>
                        <td style="border:2px solid black;font-size:13px;"><b>GST %</b></td>
                        <td style="border:2px solid black;font-size:13px;"><b>GST Add %</b></td>
                        <td style="border:2px solid black;font-size:13px;"><b>Inc. Rate</b></td>
                    </tr>

                    <tr style="padding-top:55px">
                        <td colspan="1"><td>
                        <td  style="border:2px solid black;font-size:13px;"><b>Code</b></td>
                        <td colspan="1" style="border:2px solid black;font-size:13px;"><b>Type</b></td>
                        <td colspan="1" style="border:2px solid black;font-size:13px;"><b>UM</b></td>
                        <td colspan="2"></td>
                        <td style="border:2px solid black;width:60px;font-size:13px;"><b>Loc</b></td>
                        <td style="border:2px solid black;font-size:13px;width:45px;"><b>Expiry</b></td>
                        <td style="border:2px solid black;font-size:13px;"><b>Amount</b></td>
                        <td style="border:2px solid black;font-size:13px;"><b>Amount</b></td>
                        <td style="border:2px solid black;font-size:13px;"><b>Amount</b></td>
                        <td style="border:2px solid black;font-size:13px;"><b>Amount</b></td>
                    </tr>
                </table>
                <table class="data1" style="border:1px solid black;display:inline-block;height:1200px;padding-bottom:150px;width:100%;table-layout:fixed;">
                    '.$data_tr.'
                </table>
            </div>
            <div class="total_detail"  style="border:1px solid black;">
                <table class="item_head" style="display:inline-block;width:100%;padding-left:20px;">
                <tr style="border:1px solid black">
                    <td style="font-size:12px;width:13%;"><b>ITEM TOTAL</b></td>
                    <td  style="font-size:12px;width:24%;"></td>
                    <td style="font-size:12px;width:9%;"></td>
                    <td style="font-size:12px;width:9%;"></td>
                    <td style="border:2px solid black;font-size:12px;width:12%;">'.number_format($total_excl_amt,2).'</td>
                    <td style="border:2px solid black;font-size:12px;width:10%;">'.number_format($total_STAX_AMT_DTL,2).'</td>
                    <td style="border:2px solid black;font-size:12px;width:13%;">'.number_format($total_ADD_AMT,2).'</td>
                    <td style="border:2px solid black;font-size:12px;width:10%;">'.number_format($total1_net_amt,2).'</td>
                </tr>
                </table>
                <table class="secondlast" style="border:1px solid black;display:inline-block;width:100%;" >
                    <tr style="">
                        <td rowspan="6" style="padding-bottom:110px"><img width="100%" height="25%" src="../../uploads/um_part2.jpg"></td>
                            <td style="width:168px;font-size:16px;padding-left:40px"><b>Sub Total</b></td>
                            <td style="width:55px;padding-bottom:30px" ></td>
                            <td style="width:120px;" ><p style="border:2px solid black;font-size:18px">'.number_format($total1_net_amt,2).'</p></td>
                    </tr>
                    <tr>
                        <td style="width:168px;font-size:16px;padding-left:40px"><b>Add: Itax Amt</b></td>
                        <td  style="width:55px;padding-bottom:0px;"><p style="border:2px solid black;width:55px;padding-bottom:20px;font-size:18px;">'.number_format($ITAX_RATE,2).'&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;</p></td>
                        <td style="width:120px;padding-bottom:0px" ><p style="border:2px solid black;font-size:18px;">'.number_format($ITAX_AMT,2).'</p></td>
                    </tr>
                    <tr>
                        <td style="width:168px;font-size:16px;padding-left:40px"><b>Add: Others</b></td>
                            <td style="width:55px;padding-bottom:0px" ></td>
                        <td style="width:120px;padding-bottom:0px" ><p style="border:2px solid black;font-size:18px;">'.number_format($charge_amt,2).'</p></td>
                    </tr>
                    <tr>
                        <td style="width:168px;font-size:16px;padding-left:40px"><b>Less: Freight</b></td>
                            <td style="width:55px;padding-bottom:0px" ></td>
                        <td style="width:120px;padding-bottom:0px"><p style="border:2px solid black;font-size:18px;">'.number_format($other_chrgs,2).'</p></td>
                    </tr>
                    <tr>
                        <td style="width:168px;font-size:16px;padding-left:40px"><b>Less: Further Disc</b></td>
                            <td style="width:55px;padding-bottom:0px" ></td>
                        <td style="width:120px;padding-bottom:0px" ><p style="border:2px solid black;font-size:18px;">'.number_format($other_ded,2).'</p></td>
                    </tr>
                    <tr>
                        <td style="font-size:16px;padding-left:40px;padding-bottom:40px"><b>Net Amount</b></td>
                        <td  style="width:55px;padding-bottom:0px;"></td>
                        <td style="width:120px;padding-bottom:30px" ><p style="border:2px solid black;font-size:18px;">'.number_format($total_net_amt,2).'</p></td>
                    </tr> 
                    
                </table>
                <table  class="" style="width:100%; border-collapse:collapse;font-family:arial; " >
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
                    
                </table>
                <div>
                    <img width="100%" height="15%" src="../../uploads/um_part1.jpg">
                </div>
            </div>', 2);
            $mpdf->Output();
        }
    } else {
        echo "<body style=background:black;><h1><center style=color:white;padding-top:20%;font-family:calibri;animation:3s infinite alternate slidein;>No Data Found</center></h1></body>";
    }
} else {
    echo "<body style=background:black;><h1><center style=color:white;padding-top:20%;font-family:calibri;animation:3s infinite alternate slidein;>No Data Found</center></h1></body>";
}




