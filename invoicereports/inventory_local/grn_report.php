<?php
session_start();
include "../../api/auth/db.php";
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../../helpers/helpers.php';
if (isset($_GET['action']) && $_GET['action'] == 'print') {
    if (isset($_GET['order_key']) && !empty($_GET['order_key'])) {
        $order_key = $_GET['order_key'];
        $co_code = $_GET['co_code'];
        $doc_no = $_GET['doc_no'];
        $doc_year = $_GET['doc_year'];
        $doc_type = "GRNL";
        $sql = "SELECT DISTINCT c.co_name, m.ORDER_PARTY_REF,m.REFNUM2,
            g.CO_CODE,g.DOC_YEAR,g.DOC_TYPE,g.DOC_NO,g.DOC_DATE,g.DO_KEY,g.PO_NO,g.CO_REF,g.VOUCHER_NO,g.PARTY_CODE,g.PARTY_NAME,g.ADDRESS,g.GST,g.NTN,g.CRDAYS,g.DIV_CODE,g.PO_CATG,g.PHONE_NOS,g.CONTACT_NAME,g.ENTRY_NO,g.ITEM_CODE,g.ITEM_NAME,g.UM_NAME,g.ITEM_TYPE,g.ITEM_DETAIL,g.QTY_RCVD,g.QTY_REJ,g.QTY_OK,g.LOC_CODE,g.BATCH_NO,g.EXPIRY_DATE,g.REMARKS
            FROM GRN_LOCAL_UM_VIEW2 g
            JOIN company c on c.co_code = g.co_code 
            JOIN strtran_mst m on g.co_code = m.CO_CODE and g.po_no = m.PO_NO and g.do_key = m.DO_KEY
            WHERE g.CO_CODE = '$co_code'
            AND   g.DO_KEY               = '$order_key'
            AND   g.DOC_TYPE          = '$doc_type'
            AND   g.DOC_YEAR          = '$doc_year'
            AND   g.DOC_NO          = '$doc_no'
            ORDER BY DOC_NO";
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
                $order_key = $return_data[0]['do_key'];
                $co_code = $return_data[0]['co_code'];
                $co_name = $return_data[0]['co_name'];
                $refnum2 = $return_data[0]['REFNUM2'];
                $order_party_ref = $return_data[0]['ORDER_PARTY_REF'];
                $po_no = $return_data[0]['po_no'];
                $do_key = $return_data[0]['do_key'];
                $co_ref = $return_data[0]['CO_REF'];
                $po_close = $return_data[0]['item_type'];
                $party_code = $return_data[0]['party_code'];
                $party_name = $return_data[0]['party_name'];
                $address = $return_data[0]['address'];
                $contact_name = $return_data[0]['contact_name'];
                $gst = $return_data[0]['gst'];
                $ntn = $return_data[0]['ntn'];
                $loc_code = $return_data[0]['loc_code'];
                $batch_no = $return_data[0]['batch_no'];
                $expiry_date = $return_data[0]['expiry_date'];
                $phone_nos = $return_data[0]['phone_nos'];
                $crdays = $return_data[0]['crdays'];
                $remarks = $return_data[0]['remarks'];
                $item_code = $return_data[0]['item_code'];
                $item_name = $return_data[0]['item_name'];
                $item_detail = $return_data[0]['item_detail'];
                $qty_rcvd = $return_data[0]['QTY_RCVD'];
                $qty_rej = $return_data[0]['QTY_REJ'];
                $qty_ok = $return_data[0]['QTY_OK'];
                $um_name = $return_data[0]['um_name'];
                $address = $return_data[0]['address'];
                $gst = $return_data[0]['gst'];
                $ntn = $return_data[0]['ntn'];
                $contact_name = $return_data[0]['contact_name'];
                $phone_nos = $return_data[0]['phone_nos'];
                $date = date('m/d/Y');
            }
            $i = 1;
            $total_rcvd = 0;
            $total_rej = 0;
            $total_ok = 0;
            foreach ($return_data as $value) {
                $data_tr .= '<tr style="padding-top:55px">
                <td style="text-align:center; border:1px solid black;width:8%">' . $i . '</td>
                <td colspan="1" style="text-align:center; border:1px solid black;width:12%">' . $value['item_code'] . '</td>
                <td colspan="1" style="text-align:center; border:1px solid black;width:29%;">' . $value['item_name'] . '</td>
                <td colspan="1" style="text-align:center; border:1px solid black;width:8%">' . $value['um_name'] . '</td>
                <td colspan="1" style="border:1px solid black;width:13%; text-align:right">' . number_format($value['QTY_RCVD'], 2) . '</td>
                <td colspan="1" style="border:1px solid black;width:13%; text-align:right">' . number_format($value['QTY_REJ'], 2) . ' </td>
                <td colspan="1" style="border:1px solid black;width:12%; text-align:right">' . number_format($value['QTY_OK'], 2) . '</td>
                <td colspan="1" style="text-align:center; border:1px solid black;width:10%">' . $value['loc_code'] . '</td>
                <td colspan="1" style="text-align:center; border:1px solid black;width:14%">' . $value['batch_no'] . '</td>
                <td colspan="1" style="text-align:center; border:1px solid black;width:14%">' . $value['expiry_date'] . '</td>
                </tr>';
                $total_rcvd = $total_rcvd + $value['QTY_RCVD'];
                $total_rej = $total_rej + $value['QTY_REJ'];
                $total_ok = $total_ok + $value['QTY_OK'];
                ++$i;
            }
            $number1 = $total_ok;
            $no = floor($total_ok);
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
                '80' => 'Eighty', '90' => 'Ninety'
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
            $mpdf->WriteHTML('<div class="row" style="line-height:16px;font-family:arial;">
                <div class="main-heading">
                    <table border = "2" class="secondlast" style="width:100%; border-collapse:collapse;margin-top:20px;margin-right:700px;font-family:arial;" >
                        <tr>
                            <td style="width:250px;font-size:26px;font-weight:bold;">' . $co_name . '</td>
                        </tr>
                        <tr>
                            <td style="width:250px;font-size:15px;height:60px;"><span>Plot No 12, Sector - 15, Korangi Industrial Area, Karachi 74900</span></td>
                        </tr>
                        <tr>
                            <td style="width:250px;font-size:15px;"><span>Voice 92-213-5050074-77</span></td>
                        </tr>
                        <tr>
                            <td style="width:250px;font-size:15px;"><span>Fax 92-213-5066552</span></td>
                        </tr>
                        <tr>
                            <td style="width:250px;font-size:15px;"><span>GST No. 12-00-3000-495-28</span></td>
                        </tr>
                        <tr>
                            <td style="width:250px;font-size:15px;"><span>NTN No. 1211852-4</span></td>
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
                    <table border = "2" class="secondlast" style="width:110%; border-collapse:collapse;margin-top:-140px;margin-left:400px;font-family:arial;" >
                        <tr>
                            <td style="width:250px;font-size:20px;font-weight:bold;">Goods Received Note</td>
                        </tr>
                        <tr>
                            <td style="width:250px;font-size:12px;"><span>GRN NO. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>' . $refnum2 . '</b> </span></td>
                        </tr>
                        <tr>
                            <td style="width:250px;font-size:12px;"><span>TRANSACTION# &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>' . $do_key . '</b> </span></td>
                        </tr>
                        <tr>
                            <td style="width:250px;font-size:12px;"><span>DATE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>' . $date . '</b></span></td>
                        </tr>
                        <tr>
                            <td style="width:250px;font-size:12px;"><span>PO REF#  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>' . $refnum2 . '</b></span></td>
                        </tr>
                        <tr>
                            <td style="width:250px;font-size:12px;"><span>DC REF#  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>' . $order_party_ref . '</b> </span></td>
                        </tr>
                    </table>
                    <br><br>
                </div>
                <div class="" style="border:2px solid black;">
                    <table class="" style="font-family:arial;">
                        <tr>
                            <td style="background-color:gray;height:30px;width:100%;border:none; margin:0; padding:0;"><b>TO ,</b></td>
                            <td style="background-color:gray;height:30px;width:100%;border:none; margin:0; padding:0;"></td>
                            <br>
                        </tr>
                        <tr>
                            <td style="width:50%;padding-right:20px;text-transform:uppercase;font-size:11px;">PARTY NAME: &nbsp;<b style="font-size:12px;">' . $party_name . '</b></td>
                            <td style="width:50%;padding-left:20px;text-transform:uppercase;font-size:11px;">PARTY CODE : <b style="font-size:12px;">&nbsp;&nbsp;' . $party_code . '</b></td>
                        </tr>
                        <tr>
                            <td style="width:50%;padding-right:20px;text-transform:uppercase;">ADDRESS: &nbsp;&nbsp;&nbsp; <b>' . $address . '</b> ' . '</td>
                            <td style="width:50%;padding-left:20px;text-transform:uppercase">' . '</td>
                        </tr>
                        <tr>
                            <td style="width:50%;padding-right:280px;text-transform:uppercase;">PHONE#:&nbsp;<b style="font-size:12px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $phone_nos . '</b></td>
                            <td style="width:50%;padding-left:20px;text-transform:uppercase;">CONTACT:&nbsp;<b style="font-size:12px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $contact_name . '</b></td>
                        </tr>
                        <tr>
                            <td style="width:50%;padding-right:20px;text-transform:uppercase;"><span>GST#: <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $gst . '</b></span></td>
                            <td style="width:50%;padding-left:20px;text-transform:uppercase;"><span>NTN#: <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $ntn . '</b></span></td>
                        </tr>
                    </table>
                </div>
                <br><br>
                <div class="invoice_detail" style="padding:5px;height: 350px;border:3px solid black">
                    <table class="table_head" style="border:2px solid black;display:inline-block;width:100%;height:1200px;font-family:arial;">
                        <tr style="padding-top:55px">
                            <td style="text-align:center;border:1px solid black;width:8%"><b>S-No</b></td>
                            <td colspan="1" style="text-align:center;border:1px solid black;width:12%"><b>Code</b></td>
                            <td colspan="1" style="text-align:center;border:1px solid black;width:30%"><b>Item Description</b></td>
                            <td colspan="1" style="text-align:center;border:1px solid black;width:8%"><b>UM</b></td>
                            <td colspan="1" style="text-align:center;border:1px solid black;width:14%"><b>Qty Rcvd</b></td>
                            <td colspan="1" style="text-align:center;border:1px solid black;width:14%"><b>Qty_Rej</b></td>
                            <td colspan="1" style="text-align:center;border:1px solid black;width:12%"><b>Qty_OK</b></td>
                            <td colspan="1" style="text-align:center;border:1px solid black;width:10%"><b>Loc</b></td>
                            <td colspan="1" style="text-align:center;border:1px solid black;width:14%"><b>Batch</b></td>
                            <td colspan="1" style="text-align:center;border:1px solid black;width:14%"><b>Expiry</b></td>
                        </tr>
                    </table>
                    <br>
                    <table class="table_head" style="border:px solid black;display:inline-block;width:100%;height:1200px;font-family:arial;">
                    ' . $data_tr . '
                    </table>
                </div>
                <div class="total_detail"  style="height:100px">
                <div class="invoice_detail" style="padding-top:20px;height: 0px;">
                        <table class="table_head" style="border:2px solid black;display:inline-block;width:100%;height:1200px;font-family:arial;">
                            <tr style="padding-top:55px">
                                <td style="border:0px solid black;width:8%">&nbsp;</td>
                                <td colspan="1" style="font-size:12px;border:1px solid black;width:20%;text-align:right;"><b>TOTALS</b></td>
                                <td colspan="1" style="border:0px solid black;width:2%">&nbsp;</td>
                                <td colspan="1" style="font-size:12px;border:1px solid black;width:5%; text-align:right"><b>' . number_format($total_rcvd, 2) . '</b></td>
                                <td colspan="1" style="font-size:12px;border:1px solid black;width:5%; text-align:right"><b>' . number_format($total_rej, 2) . '</b></td>
                                <td colspan="1" style="font-size:12px;border:1px solid black;width:5%; text-align:right"><b>' . number_format($total_ok, 2) . '</b></td>
                                <td colspan="1" style="border:0px solid black;width:1%">&nbsp;</td>
                                <td colspan="1" style="border:0px solid black;width:10%">&nbsp;</td>
                                <td colspan="1" style="border:0px solid black;width:14%">&nbsp;</td>
                            </tr>
                        </table>
                        <table class="data1" style="border:1px solid black;display:inline-block;width:100%;height:1200px;padding-bottom:150px;font-family:arial;">
                        </table>
                    </div>
                    <table  class="secondlast" style="width:100%; border-collapse:collapse; margin-top:20px;font-family:arial; " >
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
                <br>
                    <div style = "margin-top:70px;">
                    <span>&emsp;&emsp;</span>
                    <span style = "font-weight: bold;border-top:2px solid black;width:20%">&emsp; PREPARED BY &emsp;&emsp;</span>
                    <span>&emsp;&emsp;&emsp;&emsp;</span>
                    <span style = "font-weight: bold;border-top:2px solid black;"> &emsp;&emsp; CHECKED BY &emsp;&emsp;</span>
                    <span>&emsp;&emsp;&emsp;&emsp;</span>
                    <span style = "font-weight: bold;border-top:2px solid black;"> &emsp; AUTHORISED BY &emsp;&emsp;</span>
                    <span>&emsp;&emsp;</span>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div style = "margin-top:30px;">
                    <span>&emsp;&emsp;</span>
                    <span style = "font-weight: bold;border-top:2px solid black;"> &emsp;&emsp;&emsp; Q.A. &emsp;&emsp;&emsp;&emsp;&emsp;</span>
                    <span>&emsp;&emsp;&emsp;&emsp;&emsp;</span>
                    <span style = "font-weight: bold;border-top:2px solid black;"> &emsp;&emsp; RECEIVED BY &emsp;&emsp;</span>
                    <span>&emsp;&emsp;</span>
                    </div>
                        </div>
                </div>
                </div>
                </div>', 2);
            $mpdf->Output();
        } else {
            echo "form no required";
        }
    } else {
        echo "action not matched";
    }
}
