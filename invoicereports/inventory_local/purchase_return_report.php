<?php
session_start();
include "../../api/auth/db.php";
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../../helpers/helpers.php';
$barcode = new Helpers();
if (isset($_GET['action']) && $_GET['action'] == 'print') {
    if (isset($_GET['order_key']) && !empty($_GET['order_key'])) {
        $order_key = $_GET['order_key'];
        $co_code = $_GET['co_code'];
        $doc_no = $_GET['doc_no'];
        $doc_year = $_GET['doc_year'];
        $doc_type = "GRNL";
        $sql = "SELECT DISTINCT c.co_name, m.ORDER_PARTY_REF,m.REFNUM2, d.ISLN_REF,
        U.CO_CODE,U.DOC_YEAR,U.DOC_TYPE,U.DOC_NO,U.DOC_DATE,U.DO_KEY,U.DIV_NAME,U.REFNUM,U.PARTY_REF,U.PARTY_CODE,U.PARTY_NAME,U.ADDRESS,U.CONTACT_NAME,U.PHONE_NOS,U.GST,U.NTN,U.ENTRY_NO,U.ITEM_CODE,U.ITEM_NAME_SALE,U.TYPE_NAME,U.UM_NAME,U.BATCH_NO,U.EXPIRY_DATE,U.QTY,U.RATE,U.AMT,U.NET_AMT,U.STAX_RATE,U.STAX_AMT,U.OTHER_CHRGS,U.OTHER_DED,U.TOTAL_GROSS_AMT,U.TOTAL_NET_AMT,U.REMARKS,U.ADDTAX_AMT,U.CHARGE_AMT,U.ADDTAX_RATE,U.loc_name,U.do_key_ref,U.REFNUM2
            FROM UM_GRRT_VIEW U
            JOIN company c on c.co_code = U.co_code
            JOIN strtran_mst m on U.co_code = m.CO_CODE and U.do_key = m.DO_KEY
            JOIN strtran_dtl d on U.co_code = d.CO_CODE and U.do_key_ref = d.DO_KEY_REF and U.item_code = d.item_code and U.doc_date = d.DOC_DATE
            WHERE U.CO_CODE    = '$co_code'
            AND   U.DO_KEY     =  '$order_key'
            GROUP BY U.item_code";
            // print_r($sql);die();
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
                $co_code = $return_data[0]['co_code'];
                $co_name = $return_data[0]['co_name'];
                $div_name = $return_data[0]['div_name'];
                $do_key_ref = $return_data[0]['do_key_ref'];
                $party_ref = $return_data[0]['party_ref'];
                $party_code = $return_data[0]['party_code'];
                $remarks = $return_data[0]['remarks'];
                $item_code = $return_data[0]['item_code'];
                $rate = $return_data[0]['rate'];
                $amt = $return_data[0]['amt'];
                $um_name = $return_data[0]['um_name'];
                $stax_rate = $return_data[0]['stax_rate'];
                $stax_amt = $return_data[0]['stax_amt'];
                $addtax_rate = $return_data[0]['addtax_rate'];
                $addtax_amt = $return_data[0]['addtax_amt'];
                $net_amt = $return_data[0]['net_amt'];
                $address = $return_data[0]['address'];
                $gst = $return_data[0]['gst'];
                $ntn = $return_data[0]['ntn'];
                $date = date('m/d/Y');
                $party_name = $return_data[0]['PARTY_NAME'];
                $contact_name = $return_data[0]['contact_name'];
                $phone_nos = $return_data[0]['phone_nos'];
                $gst = $return_data[0]['gst'];
                $item_name_sale = $return_data[0]['item_name_sale'];
                $type_name = $return_data[0]['TYPE_NAME'];
                $qty = $return_data[0]['qty'];
                $rate = $return_data[0]['rate'];
                $amt = $return_data[0]['amt'];
                $isln_ref = $return_data[0]['ISLN_REF'];
                $batch_no = $return_data[0]['batch_no'];
                $expiry_date = $return_data[0]['expiry_date'];
                $loc_name = $return_data[0]['loc_name'];
                $charge_amt = $return_data[0]['charge_amt'];
                $other_chrgs = $return_data[0]['other_chrgs'];
                $other_ded = $return_data[0]['other_ded'];
                $total_net_amt = $return_data[0]['total_net_amt'];
            }
            $i = 1;
            foreach ($return_data as $value) {
                $data_tr .= '<tr style="padding-top:55px">
                    <td style="text-align:center;border:1px solid black;width:8%">' . $i . '</td>
                    <td colspan="1" style="text-align:center;border:1px solid black;width:28%;">' . $value['item_code'] . ' / ' . $value['item_name_sale'] . '</td>
                    <td colspan="1" style="text-align:center;border:1px solid black;width:11%">' . $value['um_name'] . ' / ' . $value['TYPE_NAME'] . '</td>
                    <td colspan="1" style="text-align:center;border:1px solid black;width:18%; ">' . $value['batch_no'] . ' / ' . $value['expiry_date'] . '</td>
                    <td colspan="1" style="text-align:center;border:1px solid black;width:12%;">' . $value['ISLN_REF'] . '</td>
                    <td colspan="1" style="border:1px solid black;width:12%; text-align:right"> ' . number_format($value['qty'], 2) . '</td>
                    <td colspan="1" style="border:1px solid black;width:12%; text-align:right"> ' . number_format($value['rate'], 2) . ' </td>
                    <td colspan="1" style="border:1px solid black;width:12%; text-align:right"> ' . number_format($value['amt'], 2) . ' </td>
                    <td colspan="1" style="text-align:center;border:1px solid black;width:20%">' . $value['loc_name'] . '</td>
                </tr>';
                $total_qty = $total_qty + $value['qty'];
                $total_rate = $total_rate + $value['rate'];
                $total_amt = $total_amt + $value['amt'];
                ++$i;
            }
            $number1 = $total_net_amt;
            $no = floor($total_net_amt);
            $hundred = null;
            $digits_1 = strlen($no);
            $i = 0;
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
                '80' => 'Eighty', '90' => 'Ninety',
            );
            $digits = array('', 'Hundred', 'Thousand', 'lac', 'Crore');
            while ($i < $digits_1) {
                $divider = ($i == 2) ? 10 : 100;
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
                } else {
                    $str[] = null;
                }
            }
                $str = array_reverse($str);
                $result = implode('', $str);
                $space = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                $mpdf = new \Mpdf\Mpdf(['orientation' => 'P']);
                $mpdf->setFooter('{PAGENO}');
                $stylesheet = file_get_contents('po_invoice.css');
                $mpdf->showWatermarkText = true;
                $mpdf->WriteHTML($stylesheet, 1);
                $mpdf->WriteHTML('<div class="row" style="line-height:16px; font-family:arial;">
                <div class="main-heading">
                    <table border = "2" class="secondlast" style="width:100%; border-collapse:collapse;margin-top:20px;margin-right:700px;font-family:arial;" >
                        <tr>
                            <td style="width:250px;font-size:26px;font-weight:bold;">' . $co_name . '</td>
                        </tr>
                        <tr>
                            <td style="width:250px;font-size:15px;height:60px;"><span>Plot No 12, Sector - 15, Korangi Industrial Area, Karachi 74900</span></td>
                        </tr>
                        <tr>
                            <td style="width:250px;font-size:15px;"><span>Voice &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 92-213-5050074-77</span></td>
                        </tr>
                        <tr>
                            <td style="width:250px;font-size:15px;"><span>Fax &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;92-213-5066552</span></td>
                        </tr>
                        <tr>
                            <td style="width:250px;font-size:15px;"><span>GST No. &nbsp;&nbsp;12-00-3000-495-28</span></td>
                        </tr>
                        <tr>
                            <td style="width:250px;font-size:15px;"><span>NTN No. &nbsp;&nbsp;1211852-4</span></td>
                        </tr>
                        <tr>
                            <td style="width:250px;font-size:12px;"></td>
                        </tr>
                        <tr>
                            <td style="width:250px;font-size:12px;"></td>
                        </tr>
                    </table>
                </div>
                <div class="main-heading" style="font-family:arial;">
                    <table border = "2" class="secondlast" style="width:110%; border-collapse:collapse;margin-top:-140px;margin-left:400px;font-family:arial;" >
                        <tr>
                            <td style="width:250px;font-size:20px;font-weight:bold;padding-bottom:10px">Purchase Return Local</td>
                        </tr>
                        <tr>
                            <td style="width:250px;font-size:12px;"><span>Pur Ret# &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>' . $do_key_ref . '</b> </span></td>
                        </tr>
                        <tr>
                            <td style="width:250px;font-size:12px;"><span>TRANSACTION# &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>' . $order_key . '</b> </span></td>
                        </tr>
                        <tr>
                            <td style="width:250px;font-size:12px;"><span>DATE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>' . $doc_date . '</b> </span></td>
                        </tr>
                        <tr>
                            <td style="width:250px;font-size:12px;"><span>DIVISION  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>' . $div_name . '</b> </span></td>
                        </tr>
                        <tr>
                            <td style="width:250px;font-size:12px;"><span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></td>
                        </tr>
                        <tr>
                            <td style="width:250px;font-size:12px;"><span>Party Ref Nbr &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>' . $party_ref . '</b> </span></td>
                        </tr>
                    </table>
                    <br><br>
                </div>
                <div class="" style="border:2px solid black;">
                    <table class="" style="font-family:arial;">
                        <tr>
                            <td style="background-color:gray;height:30px;width:100%;border:none; margin:0; padding:0;font-family:arial;"><b>TO ,</b></td>
                            <td style="background-color:gray;height:30px;width:100%;border:none; margin:0; padding:0;"></td>
                            <br>
                        </tr>
                        <tr>
                            <td style="width:50%;padding-right:20px;text-transform:uppercase;font-size:11px;">PARTY NAME: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="font-size:12px;"> ' . $party_name . ' </b></td>
                            <td style="width:50%;padding-left:20px;text-transform:uppercase;font-size:11px;">PARTY CODE : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="font-size:12px;"> ' . $party_code . ' </b></td>
                        </tr>
                        <tr>
                            <td style="width:50%;padding-right:20px;text-transform:uppercase;">ADDRESS: &nbsp;&nbsp;&nbsp;&nbsp; <b>' . $address . '</b> ' . '</td>
                            <td style="width:50%;padding-left:20px;text-transform:uppercase">' . '</td>
                        </tr>
                        <tr>
                            <td style="width:50%;padding-right:280px;text-transform:uppercase;">PHONE#:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="font-size:12px;">' . $phone_nos . '</b></td>
                            <td style="width:50%;padding-left:20px;text-transform:uppercase;">CONTACT:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="font-size:12px;">' . $contact_name . '</b></td>
                        </tr>
                        <tr>
                            <td style="width:50%;padding-right:20px;text-transform:uppercase;"><span>GST#: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>' . $gst . '</b></span></td>
                            <td style="width:50%;padding-left:20px;text-transform:uppercase;"><span>NTN#: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>' . $ntn . '</b></span></td>
                        </tr>
                    </table>
                </div>
                <br><br>
                <div class="invoice_detail" style="padding:5px;height: 350px;border:2px solid black">
                    <table class="table_head" style="border:2px solid black;display:inline-block;width:100%;height:1200px;font-family:arial;">
                        <tr style="padding-top:55px">
                            <td style="text-align:center;border:1px solid black;width:8%"><b>S-No</b></td>
                            <td colspan="1" style="text-align:center;border:1px solid black;width:28%"><b>Item Code / Name</b></td>
                            <td colspan="1" style="text-align:center;border:1px solid black;width:11%"><b>TYPE / UM</b></td>
                            <td colspan="1" style="text-align:center;border:1px solid black;width:18%"><b>Batch# / Expiry</b></td>
                            <td colspan="1" style="text-align:center;border:1px solid black;width:12%"><b>Inv Ref</b></td>
                            <td colspan="1" style="text-align:center;border:1px solid black;width:12%"><b>Qty</b></td>
                            <td colspan="1" style="text-align:center;border:1px solid black;width:12%"><b>Rate</b></td>
                            <td colspan="1" style="text-align:center;border:1px solid black;width:12%"><b>Amount</b></td>
                            <td colspan="1" style="text-align:center;border:1px solid black;width:20%"><b>Loc Name</b></td>
                        </tr>
                    </table>
                    <br>
                    <table class="table_head" style="border:px solid black;display:inline-block;width:100%;height:1200px;font-family:arial;">
                    ' . $data_tr . '
                    </table>
                </div>
                <div class="total_detail"  style="height:100px">
                        <table border = "2" class="secondlast" style="width:100%; border-collapse:collapse; margin-top:20px; font-family:arial;" >
                            <tr>
                                <td rowspan = "4" style="padding-left:5px;border: 0px solid grey;"><b style="font-size:12px;"><i>&nbsp; </i></b><br>
                                </td>
                                <td rowspan = "4" style = "width:20%; border:0px solid red"></td>
                                <td style = "width:20%;text-align:left; font-weight:bold;font-size:11px;border: 1px solid gray;border-left:2px solid black; border-top:2px solid black; padding: 4px"> SUB TOTAL </td>
                                <td style = "width:20%; text-align:right;font-weight:bold;font-size:11px;border: 1px solid gray; border-right:2px solid black; border-top:2px solid black; padding: 4px">' . number_format($total_amt, 2) . '</td>
                            </tr>
                            <tr>
                                <td style = "text-align:left;font-size:11px;border: 1px solid gray;border-left:2px solid black; padding: 3px"> Add : Sales Tax </td>
                                <td style = "text-align:right;font-size:11px;border: 1px solid gray;border-right:2px solid black; padding: 3px">' . number_format(0, 2) . '</tr>
                                <tr>
                                <td style = "text-align:left;font-size:11px;border: 1px solid gray;border-left:2px solid black; padding: 3px">Add: ADD Stax</td>
                                <td style = "text-align:right;font-size:11px;border: 1px solid gray;border-right:2px solid black; padding: 3px">' . number_format(0, 2) . '</tr>
                                <tr>
                                <td style = "text-align:left;font-size:11px;border: 1px solid gray;border-left:2px solid black; padding: 3px">Add: Others</td>
                                <td style = "text-align:right;font-size:11px;border: 1px solid gray;border-right:2px solid black; padding: 3px">' . number_format($charge_amt, 2) .
                            '</tr>
                            <tr>
                                <td rowspan = "4" style="padding-left:5px;border: 0px solid grey;"><b style="font-size:12px;"><i>&nbsp; </i></b><br>
                                </td>
                                <td rowspan = "4" style = "width:20%; border:0px solid red"></td>
                            </tr>
                            <tr>
                                <td style = "text-align:left;font-size:11px;border: 1px solid gray;border-top:0px;border-left:2px solid black; padding: 3px"> Less: Freight</td>
                                <td style = "text-align:right;font-size:11px;border: 1px solid gray;border-top:0px;border-right:2px solid black; padding: 3px">' . number_format($other_chrgs, 2) .
                            '</tr>
                                <tr>
                                <td style = "text-align:left;font-size:11px;border: 1px solid gray;border-left:2px solid black; padding: 3px">Less: Disc</td>
                                <td style = "text-align:right;font-size:11px;border: 1px solid gray;border-right:2px solid black; padding: 3px">' . number_format($other_ded, 2) . '</tr>
                                <tr>
                                <td style = "text-align:left;font-weight:bold;font-size:11px;border: 1px solid gray;border-left:2px solid black; border-bottom:2px solid black; padding: 3px">NET AMOUNT</td>
                                <td style = " text-align:right;font-weight:bold;font-size:11px;border: 1px solid gray;border-right:2px solid black; border-bottom:2px solid black; padding: 3px"> ' . number_format($total_net_amt, 2) .
                            '</tr>
                        </table>
                    <table  class="secondlast" style="width:100%; border-collapse:collapse; margin-top:20px; font-family:arial;" >
                        <tr>
                            <td style = "font-size:11px;width:10%;"> <b>Remarks</b></td>
                            <td style = "font-size:11px;width:90%; border:1px solid black;">&nbsp;' . $remarks . '</td>
                        </tr>
                        <tr>
                            <td style = "font-size:11px;width:10%;"> <b>&nbsp;</b></td>
                        </tr>
                        <tr>
                            <td style = "font-size:11px;width:10%;"> <b>IN Words :</b></td>
                            <td style = "font-size:11px;width:90%; border:1px solid black;">&nbsp;(' . $result . ' Only)</td>
                        </tr>
                    </table>
                    <br>
                    <div style = "margin-top:70px;">
                        <span>&emsp;&emsp;</span>
                        <span style = "font-weight: bold;border-top:2px solid black;width:20%">&emsp; Prepared By &emsp;&emsp;</span>
                        <span>&emsp;&emsp;&emsp;&emsp;&emsp;</span>
                        <span style = "font-weight: bold;border-top:2px solid black;"> &emsp;&emsp; Checked By &emsp;&emsp;</span>
                        <span>&emsp;&emsp;&emsp;&emsp;&emsp;</span>
                        <span style = "font-weight: bold;border-top:2px solid black;"> &emsp; Authorised By &emsp;&emsp;</span>
                        <span>&emsp;&emsp;</span>
                    </div>
                </div>
            </div>
            </div>
                </div>', 2);
            $mpdf->Output();
        } else {
            echo "<body style=background:black;><h1><center style=color:white;padding-top:20%;font-family:calibri;animation:3s infinite alternate slidein;>No data Found</center></h1></body>";

        }
    } else {
        echo "<body style=background:black;><h1><center style=color:white;padding-top:20%;font-family:calibri;animation:3s infinite alternate slidein;>No data Found</center></h1></body>";

    }
}
