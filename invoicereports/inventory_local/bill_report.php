<?php
session_start();
include("../../api/auth/db.php");
require_once __DIR__  . '/../vendor/autoload.php';
require_once __DIR__ . '/../../helpers/helpers.php';
$barcode = new Helpers();
if (isset($_GET['action']) && $_GET['action'] == 'print') {
    if (isset($_GET['order_key']) && !empty($_GET['order_key'])) {
        // print_r($_GET);die();
        $order_key = $_GET['order_key'];
        $co_code = $_GET['co_code'];
        $co_name = $_GET['co_name'];
        $doc_no = $_GET['doc_no'];
        $doc_year = $_GET['doc_year'];
        $sql = "SELECT CO_CODE,DOC_YEAR,DOC_TYPE,DOC_NO,DOC_DATE,BILL_KEY,PO_NO,CO_REF,VOUCHER_NO,
        SUPP_BILL,PARTY_REF,REMARKS,PARTY_CODE,PARTY_NAME,ADDRESS,GST,NTN,PHONE_NOS,CONTACT_NAME,
        CRDAYS,DIV_CODE,PO_CATG,
        TOTAL_GROSS_AMT,STAX_RATE,STAX_AMT,ADDTAX_RATE,ADDTAX_AMT,CHARGE_AMT,OTHER_CHRGS,OTHER_DED,TOTAL_NET_AMT,
        ENTRY_NO,PO_NO_DTL,GRN_KEY_DTL,ITEM_CODE,ITEM_NAME,UM_NAME,ITEM_TYPE,ITEM_DETAIL,
        QTY,RATE,AMT
        FROM BILL_UM_LOCAL_VIEW2
        WHERE CO_CODE     = '$co_code'
        AND   BILL_KEY    = '$order_key'
        AND   DOC_TYPE    = 'LB'
        AND   DOC_YEAR    = '$doc_year'
        ORDER BY DOC_NO,ENTRY_NO";
        // print_r($sql); die(); 
        $result = $conn->query($sql);
        // print_r($result);
        // die();
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            $return_data = [];
            while ($show = mysqli_fetch_assoc($result)) {
                $return_data[] = $show;
                $data_tr = '';
                $data_tr2 = '';
                $CO_CODE = $return_data[0]['co_code'];
                $DOC_YEAR = $return_data[0]['doc_year'];
                $DOC_TYPE = $return_data[0]['doc_type'];
                $DOC_NO = $return_data[0]['doc_no'];
                $DOC_DATE = $return_data[0]['doc_date'];
                $BILL_KEY = $return_data[0]['bill_key'];
                $PO_NO = $return_data[0]['po_no'];
                $CO_REF = $return_data[0]['co_ref'];
                $VOUCHER_NO = $return_data[0]['voucher_no'];
                $SUPP_BILL = $return_data[0]['supp_bill'];
                $PARTY_REF = $return_data[0]['party_ref'];
                $REMARKS = $return_data[0]['remarks'];
                $PARTY_CODE = $return_data[0]['party_code'];
                $PARTY_NAME = $return_data[0]['party_name'];
                $ADDRESS = $return_data[0]['address'];
                $GST = $return_data[0]['gst'];
                $NTN = $return_data[0]['ntn'];
                $PHONE_NOS = $return_data[0]['phone_nos'];
                $CONTACT_NAME = $return_data[0]['contact_name'];
                $CRDAYS = $return_data[0]['crdays'];
                $DIV_CODE = $return_data[0]['div_code'];
                $PO_CATG = $return_data[0]['po_catg'];
                $TOTAL_GROSS_AMT = $return_data[0]['total_gross_amt'];
                $STAX_RATE = $return_data[0]['stax_rate'];
                $STAX_AMT = $return_data[0]['stax_amt'];
                $ADDTAX_RATE = $return_data[0]['addtax_rate'];
                $ADDTAX_AMT = $return_data[0]['addtax_amt'];
                $CHARGE_AMT = $return_data[0]['charge_amt'];
                $OTHER_CHRGS = $return_data[0]['other_chrgs'];
                $OTHER_DED = $return_data[0]['other_ded'];
                $TOTAL_NET_AMT = $return_data[0]['total_net_amt'];
                $ENTRY_NO = $return_data[0]['entry_no'];
                $PO_NO_DTL = $return_data[0]['po_no_dtl'];
                $GRN_KEY_DTL = $return_data[0]['grn_key_dtl'];
                $ITEM_CODE = $return_data[0]['item_code'];
                $ITEM_NAME = $return_data[0]['item_name'];
                $UM_NAME = $return_data[0]['um_name'];
                $ITEM_TYPE = $return_data[0]['item_type'];
                $ITEM_DETAIL = $return_data[0]['item_detail'];
                $QTY = $return_data[0]['qty'];
                $RATE = $return_data[0]['rate'];
                $AMT = $return_data[0]['amt'];
                $space = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
            }
            

            $i = 1;
            $total=0;
            foreach ($return_data as  $value) {
                
                $data_tr .= '<tr style="border:1px solid black">
                                <td style="border:2px solid black;width:8%;font-size:14px;">' . $i . '</td>
                                <td style="border:2px solid black;width:10%;font-size:14px;">' . $value['item_code'] . '</td>
                                <td style="border:2px solid black;width:22%;font-size:14px;">' . $value['item_detail'] . '</td>
                                <td style="border:2px solid black;width:10%;font-size:14px;">' . $value['po_no_dtl'] . '</td>
                                <td style="border:2px solid black;width:10%;font-size:14px;">' . $value['grn_key_dtl'] . '</td>
                                <td style="border:2px solid black;width:10%;font-size:14px;">' . $value['um_name']. '</td>
                                <td style="border:2px solid black;width:10%;font-size:14px;">' . number_format($value['qty'],2) . '</td>
                                <td style="border:2px solid black;width:10%;font-size:14px;">' .  number_format($value['rate'],2) . '</td>
                                <td style="border:2px solid black;width:10%;font-size:14px;">' . number_format($value['amt'],2) . '</td>
                            </tr>';
                            $total= $total+$value['amt'];
                            // print_r($total);die();
                        ++$i;
            }
            $number1 = $TOTAL_NET_AMT;
            $no = floor($TOTAL_NET_AMT);
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
            $stylesheet = file_get_contents('bill_invoice.css');
            //     // $mpdf->SetWatermarkText('PAID');
            //     // $mpdf->showWatermarkText = true;
            $mpdf->WriteHTML($stylesheet, 1);
            $mpdf->WriteHTML(
                '<div class="row" style="line-height:16px;">
                    <div class="main-heading">
                        <table border = "2" class="secondlast" style="width:100%; border-collapse:collapse;margin-top:20px;margin-right:700px; " >
                            <tr>
                                <td style="width:250px;font-size:26px;font-weight:bold;">'.$co_name .' </td>                                   
                            </tr>
                            <tr>
                                <td style="width:250px;font-size:15px;height:60px;"><span><b>Plot No 12, Sector - 15,
                                Korangi Industrial Area,
                                Karachi 74900</b></span></td>                                   
                            </tr>
                            <tr>
                                <td style="width:250px;font-size:15px;"><span>Voice <b>92-213-5050074-77</b></span></td>                                   
                            </tr>
                            <tr>
                                <td style="width:250px;font-size:15px;"><span>Fax <b>92-213-5066552</b></span></td>                                   
                            </tr>
                            <tr>
                                <td style="width:250px;font-size:15px;"><span>GST No.<b>6464564364</b></span></td>                                   
                            </tr>
                            <tr>
                                <td style="width:250px;font-size:15px;"><span>NTN No. <b>92-213-5066552</b></span></td>                                   
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
                        <table border = "2" class="secondlast" style="width:100%; border-collapse:collapse;margin-top:-180px;margin-left:700px; " >
                            <tr>
                                <td style="width:250px;font-size:26px;font-weight:bold;">Purchase BILL</td>                                   
                            </tr>
                            <tr>
                                <td style="width:250px;font-size:15px;"><span>P.B No :<b>'.$VOUCHER_NO  . '</b></span></td>                                   
                            </tr>
                            <tr>
                                <td style="width:250px;font-size:15px;"><span>TRANSACTION#  <b>  '.$BILL_KEY  . '</b></span></td>                                   
                            </tr>
                            <tr>
                                <td style="width:250px;font-size:15px;"><span>DATE <b>    '.$DOC_DATE  . '</b> </span></td>                                   
                            </tr>
                            <tr>
                                <td style="width:250px;font-size:15px;"><span>SUPP BILL <b>'.$SUPP_BILL  . '</b></span></td>                                   
                            </tr>
                            <tr>
                                <td style="width:250px;font-size:15px;"><span>CO REF# <b>'.$CO_REF  . '</b></span></td>                                   
                            </tr>
                            <tr>
                                <td style="width:220px;font-size:15px;">PARTY REF# <b>'.$PARTY_REF  . '</b></td>                                        
                            </tr>
                            <tr>
                                <td style="width:250px;font-size:15px;">DLVRY DATE <b>'.$CRDAYS  . '</b></td>                                   
                            </tr>
                        </table>
                    </div>
                    <div class="" style="border:1px solid black;">
                        <table class="">
                            <tr>
                                <td style="background-color:gray;height:30px;width:100%;"><b>TO ,</b></td>
                                <td style="background-color:gray;height:30px;width:100%;"></td>
                                <br>
                            </tr>
                            <tr>
                                <td style="width:50%;padding-right:20px;text-transform:uppercase;font-size:12px;">PARTY NAME: &nbsp;&nbsp;<b style="font-size:12px;">'.$PARTY_NAME  . '</b></td>
                                <td style="width:50%;padding-left:20px;text-transform:uppercase;font-size:12px;">PARTYCODE : <b style="font-size:12px;">'.$PARTY_CODE  . '</b></td>

                            </tr>
                            <tr>
                                <td style="width:50%;padding-right:20px;text-transform:uppercase;">ADDRESS: &nbsp;&nbsp;<b>'.$ADDRESS  . '</b></td>
                                <td style="width:50%;padding-left:20px;text-transform:uppercase"></td>
                            </tr>
                         
                            <tr>
                                <td style="width:50%;padding-right:280px;text-transform:uppercase;">PHONE#:&nbsp;<b style="font-size:12px;">'.$PHONE_NOS  . '</b></td>
                                <td style="width:50%;padding-left:20px;text-transform:uppercase;">CONTACT#:&nbsp;<b style="font-size:12px;">'.$CONTACT_NAME  . '</b></td>

                            </tr>
                            
                            <tr>
                                <td style="width:50%;padding-right:20px;text-transform:uppercase;"><span>GST#: <b>'.$GST  . '</b></span></td>
                                <td style="width:50%;padding-left:20px;text-transform:uppercase;"><span>NTN#: <b>'.$NTN  . '</b></span></td>
                            </tr>
                        </table>
                    </div>
                    <div class="invoice_detail" style="padding-top:20px;">
                        <table class="table_head" style="border:1px solid black;display:inline-block;height:1200px;">
                            <tr style="padding-top:55px">
                                <td style="border:2px solid black;width:8%"><b>S-No</b></td>
                                <td colspan="1" style="border:2px solid black;width:10%;"><b>Code</b></td>
                                <td colspan="4" style="border:2px solid black;width:22%;"><b>Item Description</b></td>
                                <td colspan="1" style="border:2px solid black;width:10%;"><b>Po No</b></td>
                                <td colspan="1" style="border:2px solid black;width:10%;"><b>GRN#</b></td>
                                <td colspan="2" style="border:2px solid black;width:10%;"><b>UM</b></td>
                                <td colspan="2" style="border:2px solid black;width:10%;"><b>Qty</b></td>
                                <td colspan="2" style="border:2px solid black;width:10%;"><b>Rate</b></td>
                                <td colspan="2" style="border:2px solid black;width:10%"><b>Amount</b></td>
                            </tr>
                        </table>
                        <table class="data1" style="border:1px solid black;display:inline-block;width:100%;height:1200px;padding-bottom:150px">

                        ' . $data_tr . '
                        </table>
                    </div>
                    <div class="total_detail" height="100px">
                        <table border = "2" class="secondlast" style="width:100%; border-collapse:collapse; margin-top:20px; " >
                            <tr>
                                <td rowspan = "4" style="padding-left:5px;border: 2px solid grey;"><b style="font-size:12px;"><i>Note : </i></b><br>
                                        <i style="font-size:11px;">1)&nbsp;TERMS&nbsp;&&nbsp;CONDITION&nbsp;APP&nbsp;LIED&nbsp;AS&nbsp;GOVERNMENT&nbsp;LAWS</i><br>
                                        <i style="font-size:11px;">2)&nbsp;APPROVED&nbsp;P.O&nbsp;MUST&nbsp;BE&nbsp;SEND&nbsp;TO&nbsp;VENDOR&nbsp;IMMEDIATELY</i><br>
                                        <i style="font-size:11px;">3)&nbsp;INVOICES&nbsp;SHOULD&nbsp;BE&nbsp;DRAW&nbsp;ACCORDING&nbsp;TO&nbsp;LAW&nbsp;OF&nbsp;ALL &nbsp;&nbsp;&nbsp;RELATED&nbsp;REGULATORIES.I.E,I.TAX&nbsp;SALES&nbsp;TAX.FED..,ETC</i><br>
                                        <i style="font-size:11px;">4)&nbsp;GOODS&nbsp;SHOULD&nbsp;BE&nbsp;SUPPLIED&nbsp;WITH&nbsp;UM&nbsp;P.O.&nbsp;&&nbsp;SUPPLIER&nbsp;D.C</i><br>
                                </td>
                                <td rowspan = "4" style = "width:20%"></td>
                                <td style = "width:13%;text-align:left; font-weight:bold;font-size:11px;border: 2px solid grey;"> Sub Total </td>
                                <td style = "width:14%; text-align:right;font-weight:bold;font-size:11px;border: 2px solid grey;">'.number_format($total,2).'</td>      
                                
                            </tr>
                            <tr>
                            <td style = "text-align:left;font-size:11px;border: 2px solid grey;"> Add : Sales Tax </td>
                            <td style = "text-align:right;font-size:11px;border: 2px solid grey;">'.number_format($STAX_AMT,2).'</td>
                            </tr>
                            <tr>
                            <td style = "text-align:left;font-size:11px;border: 2px solid grey;">Add : STAX</td>
                            <td style = "text-align:right;font-size:11px;border: 2px solid grey;">'.number_format($ADDTAX_AMT,2).'</td>
                            </tr>
                            <tr>
                            <td style = "text-align:left;font-size:11px;border: 2px solid grey;">OTHERS </td>
                            <td style = "text-align:right;font-size:11px;border: 2px solid grey;">'.number_format($CHARGE_AMT,2).'</td>
                            </tr>
                            
                            <tr>
                            
                            <td colspan="2" ></td>
                            <td style = "text-align:left;font-size:11px;border: 2px solid grey;">FREIGHT</td>
                            <td style = "text-align:right;font-size:11px;border: 2px solid grey;">'.number_format($OTHER_CHRGS,2).'</td>
                           
                            </tr>
                            <tr>
                            
                            <td colspan="2" ></td>
                            <td style = "text-align:left;font-size:11px;border: 2px solid grey;">DISCOUNT/ADJ</td>
                            <td style = "text-align:right;font-size:11px;border: 2px solid grey;">'.number_format($OTHER_DED,2).'</td>
                           
                            </tr>
                           

                            <tr>
                            <td colspan="2" ></td>
                            <td style = "text-align:left;font-weight:bold;font-size:11px;border: 2px solid grey;">Net Amount</td>
                            <td style = " text-align:right;font-weight:bold;font-size:11px;border: 2px solid grey;">'.number_format($TOTAL_NET_AMT,2).'</td></tr>
                        </table>
                        </div>
                        <table  class="secondlast" style="width:100%; border-collapse:collapse; margin-top:20px; " >
                            <tr>
                                <td style = "font-size:11px;width:20%"> Remarks
                                </td>
                                <td style = "font-size:11px; border:2px solid grey;">'. $REMARKS .'</td>   
                            </tr>
                            <tr>
                            <td style = "font-size:11px;width:20%"> In Words
                            </td>
                            <td style = "font-size:11px; border:2px solid grey;">'.$result   .' Only</td>   
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
                </div>',2);
            $mpdf->Output();
        }
    } else {
        echo "form no required";
    }
} else {
    echo "action not matched";
}
