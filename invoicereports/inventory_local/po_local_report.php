<?php
session_start();
include("../../api/auth/db.php");
require_once __DIR__  . '/../vendor/autoload.php';
require_once __DIR__ . '/../../helpers/helpers.php';
// $barcode = new Helpers();
if (isset($_GET['action']) && $_GET['action'] == 'print') {
    if (isset($_GET['order_key']) && !empty($_GET['order_key'])) {
        // print_r($_GET);die();
        $order_key = $_GET['order_key'];
        $co_code = $_GET['co_code'];
        $doc_no = $_GET['doc_no'];
        $doc_year = $_GET['doc_year'];
        $sql = "SELECT co_code,doc_year,doc_type,doc_no,doc_date,order_key,
        co_ref,party_ref,DLVRY_DATE,PARTY_CODE,PARTY_NAME,ADDRESS,CRDAYS,
        CONTACT_NAME,PHONE_NOS,GST,NTN,REMARKS,
        DIV_CODE,PO_CATG,TOTAL_GROSS_AMT,STAX_CODE,ADDTAX_CODE,STAX_RATE,STAX_AMT,ADDTAX_RATE,
        ADDTAX_AMT,OTHER_CHRGS,OTHER_DED,TOTAL_NET_AMT,
        ENTRY_NO,ITEM_CODE,ITEM_NAME,UM_NAME,ITEM_TYPE,PRODUCT_CODE,PRODUCT_NAME,
        ITEM_DETAIL,QTY,RECEIPT_QTY,ORDER_BAL_QTY,RATE,AMT,DISC_RATE,DISC_AMT,NET_AMT
        FROM PO_UM_LOCAL_VIEW
        WHERE co_code = '$co_code' AND order_key='$order_key' AND doc_year= '$doc_year' AND doc_no = '$doc_no'
        ORDER BY doc_no";
        // print_r($sql); die();
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            $return_data = [];
            while ($show = mysqli_fetch_assoc($result)) {
                $return_data[] = $show;
                $data_tr = '';
                $data_tr2 = '';
                $doc_no = $return_data[0]['doc_no'];
                $doc_date = $return_data[0]['doc_date'];
                $doc_year = $return_data[0]['doc_year'];
                $order_key = $return_data[0]['order_key'];
                $co_code = $return_data[0]['co_code'];
                // $co_name = $return_data[0]['co_name'];
                $co_ref = $return_data[0]['co_ref'];
                $party_ref = $return_data[0]['party_ref'];
                $dlvry_date = $return_data[0]['dlvry_date'];
                $po_close = $return_data[0]['item_type'];
                // $voucher_no = $return_data[0]['voucher_no'];
                $party_code = $return_data[0]['party_code'];
                $party_name = $return_data[0]['party_name'];
                $crdays = $return_data[0]['crdays'];
                $remarks = $return_data[0]['remarks'];
                $item_code = $return_data[0]['item_code'];
                $item_name = $return_data[0]['item_name'];
                $product_code = $return_data[0]['product_code'];
                $product_name = $return_data[0]['product_name'];
                $item_detail = $return_data[0]['item_detail'];
                $qty = $return_data[0]['qty'];
                $rate = $return_data[0]['rate'];
                $amt = $return_data[0]['amt'];
                $um_name = $return_data[0]['um_name'];
                $stax_code = $return_data[0]['stax_code'];
                $addtax_code = $return_data[0]['addtax_code'];
                $stax_rate = $return_data[0]['stax_rate'];
                $stax_amt = $return_data[0]['stax_amt'];
                $addtax_rate = $return_data[0]['addtax_rate'];
                $addtax_amt = $return_data[0]['addtax_amt'];
                $net_amt = $return_data[0]['net_amt'];
                $address = $return_data[0]['address'];
                $gst = $return_data[0]['gst'];
                $ntn = $return_data[0]['ntn'];
                $contact_name = $return_data[0]['contact_name'];
                $phone_nos = $return_data[0]['phone_nos'];
                $date = date('m/d/Y');
                $amt = $return_data[0]['amt'];
                $space = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
            }
            $number1 = $net_amt;
            $no = floor($net_amt);
            $hundred = null;
            $digits_1 = strlen($no); //to find lenght of the number
            $i = 0;
            // Numbers can stored in array format
            $str = array();

            $words = array(
                '0' => '', '1' => 'One', '2' => 'Two',
                '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
                '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
                '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
                '13' => 'Thirteen', '14' => 'Fourteen',
                '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
                '18' => 'Eighteen', '19' => 'Nineteen', '20' => 'Twenty',
                '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
                '60' => 'Sixty', '70' => 'Seventy',
                '80' => 'Eighty', '90' => 'Ninety'
            );

            $digits = array('', 'Hundred', 'Thousand', 'lac', 'Crore');
            //Extract last digit of number and print corresponding number in words till num becomes 0
            while ($i < $digits_1) {
                $divider = ($i == 2) ? 10 : 100;
                //Round numbers down to the nearest integer
                $number = floor($no % $divider);
                $no = floor($no / $divider);
                $i += ($divider == 10) ? 1 : 2;

                if ($number) {
                    $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                    $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                    $str[] = ($number < 21) ? $words[$number] . " " .
                        $digits[$counter] .
                        $plural . " " .
                        $hundred : $words[floor($number / 10) * 10] . " " .
                        $words[$number % 10] . " " .
                        $digits[$counter] . $plural . " " .
                        $hundred;
                } else $str[] = null;
            }

            $str = array_reverse($str);
            $result = implode('', $str);

            $i = 1;
            $total = 0;
            foreach ($return_data as  $value) {

                $data_tr .= '<tr style="border:1px solid black">
                                <td style="border:1px solid black;width:8%;font-size:12px;">' . $i . '</td>
                                <td style="border:1px solid black;width:14%;font-size:12px;">' . $value['item_code'] . '</td>
                                <td style="border:1px solid black;width:28%;font-size:12px;">' . $value['item_detail'] . '</td>
                                <td style="border:1px solid black;width:10%;font-size:12px;">' . $value['um_name'] . '</td>
                                <td style="border:1px solid black;width:12%;font-size:12px;">' . number_format($value['qty'], 2) . '</td>
                                <td style="border:1px solid black;width:12%;font-size:12px;">' . number_format($value['rate'], 2) . '</td>
                                <td style="border:1px solid black;width:16%;font-size:12px;">' . number_format($value['amt'], 2) . '</td>
                            </tr>';
                $total = $total + $value['amt'];
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
                        <table border = "2" class="secondlast" style="width:100%; border-collapse:collapse;margin-top:20px;margin-right:700px;">
                            <tr>
                                <td style="width:250px;font-size:26px;font-weight:bold;">UM Enterprise</td>                                   
                            </tr>
                            <tr>
                                <td style="width:250px;font-size:15px;height:60px;"><span><b>' . $address . '</b></span></td>                                   
                            </tr>
                            <tr>
                                <td style="width:250px;font-size:15px;"><span>Voice 92-213-5050074-77</span></td>                                   
                            </tr>
                            <tr>
                                <td style="width:250px;font-size:15px;"><span>Fax 92-213-5066552</span></td>                                   
                            </tr>
                            <tr>
                                <td style="width:250px;font-size:15px;"><span>GST No.<b>' . $gst . '</b></span></td>                                   
                            </tr>
                            <tr>
                                <td style="width:250px;font-size:15px;"><span>NTN No. <b>' . $ntn . '</b></span></td>                                   
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
                        <table border = "2" class="secondlast" style="border-collapse:collapse;margin-top:-210px;margin-left:700px; " >
                            <tr>
                                <td style="width:250px;font-size:30px;font-weight:bold;">Purchase Order</td>                                   
                            </tr>
                            <tr>
                                <td style="width:250px;font-size:16px;"><span>Order No :<b>'.$co_ref.'</b></span></td>                                   
                            </tr>
                            <tr>
                                <td style="width:250px;font-size:16px;"><span>TRANSACTION# <b>'.$order_key.'</b></span></td>                                   
                            </tr>
                            <tr>
                                <td style="width:250px;font-size:16px;"><span>DATE <b>' . $date . '</b> </span></td>                                   
                            </tr>
                            <tr>
                                <td style="width:250px;font-size:16px;"><span>CUSTOMER REF#</span></td>                                   
                            </tr>
                            <tr>
                                <td style="width:250px;font-size:16px;"><span>CO REF# <b></b></span></td>                                   
                            </tr>
                            <tr>
                                <td style="width:80px;font-size:16px;">PAYMENT TERMS</td>                                   
                                <td style="width:120px;font-size:16px;">DAY</td>                                   
                            </tr>
                            <tr>
                                <td style="width:250px;font-size:16px;">DLVRY DATE <b>' . $dlvry_date . '</b></td>                                   
                            </tr>
                            <tr>
                                <td style="width:250px;font-size:12px;"></td>                                   
                            </tr>
                        </table>
                    </div>
                    <div>
                        <table>
                            <tr>
                                <td style="width:250px;font-size:12px;"></td>                                   
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
                                <td style="width:50%;padding-right:20px;text-transform:uppercase;font-size:12px;">PARTY NAME: &nbsp;&nbsp;<b style="font-size:12px;">' . $party_name . '</b></td>
                                <td style="width:50%;padding-left:20px;text-transform:uppercase;font-size:12px;">PARTYCODE : <b style="font-size:12px;">' . $party_code . '</b></td>

                            </tr>
                            <tr>
                                <td style="width:50%;padding-right:20px;text-transform:uppercase;">ADDRESS: &nbsp;&nbsp;<b>' . $address . '</b> '  . '</td>
                                <td style="width:50%;padding-left:20px;text-transform:uppercase">' . '</td>
                            </tr>
                         
                            <tr>
                                <td style="width:50%;padding-right:280px;text-transform:uppercase;">PHONE#:&nbsp;<b style="font-size:12px;">' . $phone_nos . '</b></td>
                                <td style="width:50%;padding-left:20px;text-transform:uppercase;">CONTACT#:&nbsp;<b style="font-size:12px;">' . $contact_name . '</b></td>

                            </tr>
                            
                            <tr>
                                <td style="width:50%;padding-right:20px;text-transform:uppercase;"><span>GST#: <b>' . $gst . '</b></span></td>
                                <td style="width:50%;padding-left:20px;text-transform:uppercase;"><span>NTN#: <b>' . $ntn . '</b></span></td>
                            </tr>
                        </table>
                    </div>
                    <div class="invoice_detail" style="padding-top:20px;height: 350px;">
                        <table class="table_head" style="border:1px solid black;display:inline-block;width:100%;height:1200px;">
                            <tr style="border:1px solid black">
                                <td style="border:2px solid black;width:8%;font-size:13px;"><b>S-No</b></td>
                                <td style="border:2px solid black;width:14%;font-size:13px;"><b>Code</b></td>
                                <td style="border:2px solid black;width:28%;font-size:13px;"><b>Item Description</b></td>
                                <td style="border:2px solid black;width:10%;font-size:13px;"><b>UM</b></td>
                                <td style="border:2px solid black;width:12%;font-size:13px;"><b>Qty</b></td>
                                <td style="border:2px solid black;width:12%;font-size:13px;"><b>Rate</b></td>
                                <td style="border:2px solid black;width:16%;font-size:13px;"><b>Amount</b></td>
                            </tr>
                        </table>    
                        <table class="data1" style="border:1px solid black;display:inline-block;width:100%;height:1200px;padding-bottom:150px;width:100%;table-layout">

                            ' . $data_tr . '
                        </table>
                    </div>
                    <div class="total_detail"  style="height:100px">
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
                                <td style = "width:14%; text-align:right;font-weight:bold;font-size:11px;border: 2px solid grey;">' . number_format($total, 2) . '</td>      
                                
                            </tr>
                            <tr>
                            <td style = "text-align:left;font-size:11px;border: 2px solid grey;"> Add : Sales Tax </td>
                            <td style = "text-align:right;font-size:11px;border: 2px solid grey;">' . number_format($stax_amt, 2) . '</tr>
                            <tr>
                            <td style = "text-align:left;font-size:11px;border: 2px solid grey;">Add : Others</td>
                            <td style = "text-align:right;font-size:11px;border: 2px solid grey;">' . number_format($addtax_amt, 2) . '</tr>
                            <tr>
                            <td style = "text-align:left;font-weight:bold;font-size:11px;border: 2px solid grey;">Net Amount</td>
                            <td style = " text-align:right;font-weight:bold;font-size:11px;border: 2px solid grey;">' . number_format($net_amt, 2) . '</tr>
                        </table>
                        <table  class="secondlast" style="width:100%; border-collapse:collapse; margin-top:20px; " >
                            <tr>
                                <td style = "font-size:11px;width:20%"> Remarks
                                </td>
                                <td style = "font-size:11px; border:2px solid grey;">' . $remarks . '</td>   
                            </tr>
                            <tr>
                            <td style = "font-size:11px;width:20%"> In Words
                            </td>
                            <td style = "font-size:11px; border:2px solid grey;">' . $result . ' Only</td>   
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
                </div>',
                2
            );
            $mpdf->Output();
        }
    } else {
        echo "Order Key required";
    }
} else {
    echo "action not matched";
}
