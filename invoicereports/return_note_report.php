<?php
session_start();
include("../api/auth/db.php");
require_once __DIR__  . '/vendor/autoload.php';
require_once __DIR__ . '/../helpers/helpers.php';
$barcode = new Helpers();
if (isset($_GET['action']) && $_GET['action'] == 'print') {
    if (isset($_GET['order_key']) && !empty($_GET['order_key'])) {
        // print_r($_GET);die();
        // $po_no = $_GET['po_no'];
        $co_code = $_GET['co_code'];
        $doc_no = $_GET['doc_no'];
        $doc_year = $_GET['doc_year'];
        $doc_type = "RT";

        $sql = "SELECT 
        C.co_name, R.*

        FROM RT_UM_VIEW_NEW R JOIN company C on C.co_code = R.co_code

        WHERE R.CO_CODE   = '$co_code'
        AND   R.DOC_NO     =  '$doc_no'
        AND   R.DOC_TYPE   = '$doc_type'
        AND   R.DOC_YEAR   = '$doc_year'

        ORDER BY R.DO_KEY,R.DOC_NO,R.ENTRY_NO";

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



                $co_name =  $return_data[0]['co_name'];
                $do_key_ref =  $return_data[0]['do_key'];
                $order_key =  $return_data[0]['do_key_ref'];
                $doc_date =  $return_data[0]['doc_date'];
                $total_amt  =  $return_data[0]['order_party_ref'];
                $other_chrgs =  $return_data[0]['order_party_ref'];





                $party_ref =  $return_data[0]['order_party_ref'];
                $refnum =  $return_data[0]['refnum'];
                // $refnum2 =  $return_data[0]['REFNUM2'];
                $order_refnum =  $return_data[0]['order_refnum'];
                $due_date = $return_data[0]['due_date'];
                $po_date = $return_data[0]['po_date'];
                $party_code = $return_data[0]['party_code'];
                $party_name = $return_data[0]['PARTY_NAME'];
                $address = $return_data[0]['address'];
                $contact_name = $return_data[0]['contact_name'];
                $phone_nos = $return_data[0]['phone_nos'];
                $gst = $return_data[0]['gst'];
                $ntn =  $return_data[0]['ntn'];
                $city_name = $return_data[0]['city_name'];
                $crdays = $return_data[0]['crdays'];
                $div_name = $return_data[0]['div_name'];
                $sman_name = $return_data[0]['sman_name'];
                $ship_mode =  $return_data[0]['ship_mode'];
                $ship_no = $return_data[0]['ship_no'];
                $stax_rate = $return_data[0]['stax_rate'];
                $stax_amt = $return_data[0]['stax_amt'];
                $other_charges = $return_data[0]['other_chrgs'];
                $other_ded =  $return_data[0]['other_ded'];
                $total_gross_amt = $return_data[0]['total_gross_amt'];
                $total_net_amt = $return_data[0]['total_net_amt'];
                $remarks = $return_data[0]['remarks'];
                $addtax_amt = $return_data[0]['addtax_amt'];
                $charge_amt =  $return_data[0]['charge_amt'];
                $addtax_rate = $return_data[0]['addtax_rate'];
                $loc_code = $return_data[0]['loc_code'];
                $entry_no = $return_data[0]['entry_no'];
                $item_code = $return_data[0]['item_code'];
                $item_name_sale =  $return_data[0]['ITEM_NAME_sale'];
                $type_name = $return_data[0]['TYPE_NAME'];
                $item_name_sale2 = $return_data[0]['ITEM_NAME_sale2'];
                $um_name = $return_data[0]['um_name'];
                $qty = $return_data[0]['qty'];
                $rate =  $return_data[0]['rate'];
                $amt = $return_data[0]['amt'];
                $disc_rate = $return_data[0]['disc_rate'];
                $disc_amt = $return_data[0]['disc_amt'];
                $frt_rate = $return_data[0]['FRT_RATE'];
                $frt_amt =  $return_data[0]['FRT_AMT'];
                $excl_rate = $return_data[0]['EXCL_RATE'];
                $excl_amt = $return_data[0]['excl_amt'];
                $stax_rate_dtl = $return_data[0]['STAX_RATE_DTL'];
                $stax_amt_dtl = $return_data[0]['STAX_AMT_DTL'];
                $add_rate =  $return_data[0]['ADD_RATE'];
                $add_amt = $return_data[0]['ADD_AMT'];
                $net_amt = $return_data[0]['net_amt'];
                $batch_no = $return_data[0]['batch_no'];
                $expiry_date = $return_data[0]['expiry_date'];
                // $item_hscode =  $return_data[0]['item_hscode'];
                // $loc_name = $return_data[0]['loc_name'];
                // $ledger_bal = $return_data[0]['ledger_bal'];
                $itax_amt = $return_data[0]['itax_amt'];
                // $itax_rate = $return_data[0]['ITAX_RATE'];
                $space='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                
            } 
            $i=1;
            $tot_frt_amt=0;
            $tot_excl_amt=0;
            $tot_stax_amt=0;
            $tot_add_amt=0;
            $tot_net_amt=0;
            foreach ($return_data as  $value) {

                // print_r($value); die();

                $item_name=empty($value['item_name_sale'])?'Nil':$value['item_name_sale'];
                $data_tr .='<tr style="padding-top:55px">
                                <td style="font-size:19px;text-align:center;border:1px solid black;width:8%">'.$i.'</td>
                                <td colspan="1" style=" font-size:19px; text-align:center;border:1px solid black;width:25%">' . $value['ITEM_NAME_sale'] . '</td>
                                <td colspan="1" style=" font-size:19px; text-align:center;border:1px solid black;width:17%; text-align:right">' . $value['qty'] . '</td>
                                <td colspan="1" style=" font-size:19px; text-align:center;border:1px solid black;width:18%; text-align:right">' . $value['rate'] . '</td>
                                <td colspan="1" style=" font-size:19px; text-align:center;border:1px solid black;width:17%; text-align:right">' . $value['disc_rate'] . ' </td>
                                <td colspan="1" style=" font-size:19px; text-align:center;border:1px solid black;width:17%; text-align:right">' . $value['FRT_RATE'] . ' </td>
                                <td colspan="1" style=" font-size:19px; text-align:center;border:1px solid black;width:17%; text-align:right">' . $value['EXCL_RATE'] . ' </td>
                                <td colspan="1" style=" font-size:19px; text-align:center;border:1px solid black;width:17%; text-align:right">' . $value['stax_rate'] . ' </td>
                                <td colspan="1" style=" font-size:19px; text-align:center;border:1px solid black;width:20%; text-align:right">' . $value['addtax_rate'] . ' </td>
                                <td colspan="1" style=" font-size:19px; text-align:center;border:0px solid black;width:10%">' . '</td>
                                <td colspan="1" style=" font-size:19px; text-align:center;border:1px solid black;width:20%">' . $value['batch_no'] . '</td>
                            </tr>
                            <tr style="padding-top:55px">
                                <td style="font-size:17px;text-align:center;border:px solid black;width:8%">&nbsp;</td>
                                <td colspan="1" style=" font-size:17px;text-align:center;border:1px solid black;width:25%"><span style="border: 0px solid black;">&nbsp; ' . $value['item_type'] . ' &nbsp; </span> <span style="border: 0px solid black;"> ' . $value['item_code'] . ' &nbsp; </span> <span style="border: 0px solid black;"> ' . $value['um_name'] . ' &nbsp; </span></td>
                                <td colspan="1" style=" font-size:17px;text-align:center;border:1px solid black;width:17%">' . $value['loc_code'] . '</td>
                                <td colspan="1" style=" font-size:17px;text-align:center;border:1px solid black;width:18%; text-align:right">' . $value['amt'] . '</td>
                                <td colspan="1" style=" font-size:17px;text-align:center;border:1px solid black;width:17%; text-align:right">' . $value['disc_amt'] . '</td>
                                <td colspan="1" style=" font-size:17px;text-align:center;border:1px solid black;width:17%; text-align:right">' . $value['FRT_AMT'] . '</td>
                                <td colspan="1" style=" font-size:17px;text-align:center;border:1px solid black;width:17%; text-align:right">' . $value['excl_amt'] . '</td>
                                <td colspan="1" style=" font-size:17px;text-align:center;border:1px solid black;width:17%; text-align:right">' . $value['STAX_AMT_DTL'] . '</td>
                                <td colspan="1" style=" font-size:17px;text-align:center;border:1px solid black;width:20%; text-align:right">' . $value['ADD_AMT'] . '</td>
                                <td colspan="1" style=" font-size:17px;text-align:center;border:1px solid black;width:20%; text-align:right">' . $value['net_amt'] . '</td>
                                <td colspan="1" style=" font-size:17px;text-align:center;border:1px solid black;width:20%">' . $value['expiry_date'] . '</td>
                            </tr>';
                            // $data_tr2 .='';
                            $tot_frt_amt=$tot_frt_amt+$value['FRT_AMT'];
                            $tot_excl_amt=$tot_excl_amt+$value['excl_amt'];
                            $tot_stax_amt=$tot_stax_amt+$value['STAX_AMT_DTL'];
                            $tot_add_amt=$tot_add_amt+$value['ADD_AMT'];
                            $tot_net_amt=$tot_net_amt+$value['net_amt'];
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
            
            $digits = array('', 'Hundred', 'Thousand', 'lac', 'Crore');
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
            // PRINT_R("SSF");DIE();
            $mpdf = new \Mpdf\Mpdf(['orientation' => 'P']);
            $stylesheet = file_get_contents('stax_invoice.css');
            //     // $mpdf->SetWatermarkText('PAID');
            //     // $mpdf->showWatermarkText = true;
            $mpdf->WriteHTML($stylesheet, 1);
            $mpdf->WriteHTML('<div class="row">
                <div class="main">
                    <div class="row">
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
                                    <td style="width:250px;font-size:20px;font-weight:bold;padding-bottom:10px">Return Note</td>
                                </tr>
                                <tr>
                                    <td style="width:250px;font-size:12px;"><span>Credit Note# &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>' . $do_key_ref . '</b> </span></td>
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
                               
                            </table>
                            <br><br>
                        </div>
                        <div class="" style="border:2px solid black;">
                            <table class="" style="font-family:arial;">
                                    <tr>
                                        <td style="background-color:gray;height:30px;width:100%;border:none; margin:0; padding:0;font-family:arial;"><b> &nbsp;  BILL TO </b></td>
                                        <td style="background-color:gray;height:30px;width:100%;border:none; margin:0; padding:0;font-family:arial;"><b> &nbsp;  DELIVER TO </b></td>
                                        <br>
                                    </tr>
                                    <tr>
                                        <td style="width:50%;padding-right:20px;text-transform:uppercase;font-size:11px;">PARTY NAME: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="font-size:12px;"> ' . $party_name . ' </b></td>
                                        <td style="width:50%;padding-right:20px;text-transform:uppercase;font-size:11px; border-left: 1px solid gray;">&nbsp;&nbsp;&nbsp;&nbsp;<b style="font-size:12px;"> ' . $party_name . ' </b></td>
                                    </tr>
                                    <tr>
                                        <td style="width:50%;padding-right:20px;text-transform:uppercase;">ADDRESS: &nbsp;&nbsp;&nbsp;&nbsp; <b>' . $address . '</b> ' . '</td>
                                        <td style="width:50%;padding-right:20px;text-transform:uppercase;font-size:11px; border-left: 1px solid gray;">&nbsp;&nbsp;&nbsp;&nbsp;<b style="font-size:12px;"> ' . $address . ' </b></td>
                                    </tr>
                                    <tr>
                                        <td style="width:50%;padding-right:20px;text-transform:uppercase;">CITY: &nbsp;&nbsp;&nbsp;&nbsp; <b>' . $city_name . '</b> ' . '</td>
                                        <td style="width:50%;padding-right:20px;text-transform:uppercase;font-size:11px; border-left: 1px solid gray;">&nbsp;&nbsp;&nbsp;&nbsp; CUSTOMER REF# &nbsp;&nbsp;&nbsp;&nbsp;<b style="font-size:12px;"> ' . $party_name . ' </b></td>
                                    </tr>
                                    <tr>
                                        <td style="width:50%;padding-right:280px;text-transform:uppercase;">PHONE#:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="font-size:12px;">' . $phone_nos . '</b></td>
                                        <td style="width:50%;padding-right:20px;text-transform:uppercase;font-size:11px; border-left: 1px solid gray;">&nbsp;&nbsp;&nbsp;&nbsp;<b style="font-size:12px;"> ' . ' </b></td>

                                    </tr>
                                    <tr>
                                        <td style="width:50%;padding-right:20px;text-transform:uppercase;">CONTACT:&nbsp;&nbsp;<b style="font-size:12px;">' . $contact_name . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> PARTY CODE : &nbsp;<b style="font-size:12px;"> ' . $party_code . ' </b></td>
                                        <td style="width:50%;padding-right:20px;text-transform:uppercase;font-size:11px; border-left: 1px solid gray;">&nbsp;&nbsp;&nbsp;&nbsp; PAYMENT TERMS &nbsp;&nbsp;&nbsp;&nbsp; DAYS &nbsp;&nbsp;&nbsp;&nbsp; DUE DT  <b style="font-size:12px;"> '  . ' </b></td>
                                    </tr>
                                    <tr>
                                        <td style="width:50%;padding-right:20px;text-transform:uppercase;"><span>GST#: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>' . $gst . '</b></span></td>
                                        <td style="width:50%;padding-right:20px;text-transform:uppercase;font-size:11px; border-left: 1px solid gray;">&nbsp;&nbsp;&nbsp;&nbsp; SHIP METHOD &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp; CN#  <b style="font-size:12px;"> '  . ' </b></td>
                                    </tr>
                                </table>
                            </div>
                <br><br>

                            <div class="invoice_detail" style="padding:5px;height: 300px;border:2px solid black">
                                <table class="table_head" style="border:2px solid black;display:inline-block;width:100%;height:1200px;font-family:arial;">
                                    <tr style="padding-top:55px">
                                        <td style="font-size:17px;text-align:center;border:1px solid black;width:8%"><b>S-No</b></td>
                                        <td colspan="1" style=" font-size:17px; text-align:center;border:1px solid black;width:25%"><b>Item Description</b></td>
                                        <td colspan="1" style=" font-size:17px; text-align:center;border:1px solid black;width:17%"><b>Qty</b></td>
                                        <td colspan="1" style=" font-size:17px; text-align:center;border:1px solid black;width:18%"><b>Rate</b></td>
                                        <td colspan="1" style=" font-size:17px; text-align:center;border:1px solid black;width:17%"><b>Disc Rate</b></td>
                                        <td colspan="1" style=" font-size:17px; text-align:center;border:1px solid black;width:17%"><b>Frt Rate</b></td>
                                        <td colspan="1" style=" font-size:17px; text-align:center;border:1px solid black;width:17%"><b>Excl Rate</b></td>
                                        <td colspan="1" style=" font-size:17px; text-align:center;border:1px solid black;width:17%"><b>Stax Rate</b></td>
                                        <td colspan="1" style=" font-size:17px; text-align:center;border:1px solid black;width:20%"><b>Add Rate</b></td>
                                        <td colspan="1" style=" font-size:17px; text-align:center;border:0px solid black;width:10%"><b>&nbsp;</b></td>
                                        <td colspan="1" style=" font-size:17px; text-align:center;border:1px solid black;width:20%"><b>Batch#</b></td>
                                    </tr>
                                    <tr style="padding-top:55px">
                                        <td style="font-size:15px;text-align:center;border:px solid black;width:8%"><b>&nbsp;</b></td>
                                        <td colspan="1" style=" font-size:15px;text-align:center;border:1px solid black;width:25%"><b><span style="border: 0px solid black;">&nbsp; Code &nbsp; </span> <span style="border: 0px solid black;"> Type &nbsp; </span> <span style="border: 0px solid black;"> UM &nbsp; </span></b></td>
                                        <td colspan="1" style=" font-size:15px;text-align:center;border:1px solid black;width:17%"><b>LOC</b></td>
                                        <td colspan="1" style=" font-size:15px;text-align:center;border:1px solid black;width:18%"><b>AMOUNT</b></td>
                                        <td colspan="1" style=" font-size:15px;text-align:center;border:1px solid black;width:17%"><b>AMOUNT</b></td>
                                        <td colspan="1" style=" font-size:15px;text-align:center;border:1px solid black;width:17%"><b>AMOUNT</b></td>
                                        <td colspan="1" style=" font-size:15px;text-align:center;border:1px solid black;width:17%"><b>AMOUNT</b></td>
                                        <td colspan="1" style=" font-size:15px;text-align:center;border:1px solid black;width:17%"><b>AMOUNT</b></td>
                                        <td colspan="1" style=" font-size:15px;text-align:center;border:1px solid black;width:20%"><b>AMOUNT</b></td>
                                        <td colspan="1" style=" font-size:15px;text-align:center;border:1px solid black;width:20%"><b>AMOUNT</b></td>
                                        <td colspan="1" style=" font-size:15px;text-align:center;border:1px solid black;width:20%"><b>EXPIRY</b></td>
                                    </tr>
                                </table>
                                <br>
                    <table class="table_head" style="border:px solid black;display:inline-block;width:100%;height:1200px;font-family:arial;">
                    ' . $data_tr . '
                    </table>
                            </div>

                            <div class="invoice_detail" style="padding:5px;border:2px solid black; border-top:none">
                                <table class="table_head" style="border:0px solid black;display:inline-block;width:100%;height:1200px;font-family:arial;">
                                    <tr style="padding-top:55px">
                                        <td style="font-size:17px;text-align:center;border:0px solid black;width:8%"><b>&nbsp;</b></td>
                                        <td colspan="1" style=" font-size:20px; text-align:center;border:1px solid black;width:25%"><b>Item Total</b></td>
                                        <td colspan="1" style=" font-size:17px; text-align:center;border:0px solid black;width:15%"><b>&nbsp;</b></td>
                                        <td colspan="1" style=" font-size:17px; text-align:center;border:0px solid black;width:15%"><b>&nbsp;</b></td>
                                        <td colspan="1" style=" font-size:17px; text-align:center;border:0px solid black;width:15%; text-align:right"><b>&nbsp;</b></td>
                                        <td colspan="1" style=" font-size:17px; text-align:center;border:1px solid black;width:21%; text-align:right"><b>'.number_format($tot_frt_amt,2).'</b></td>
                                        <td colspan="1" style=" font-size:17px; text-align:center;border:1px solid black;width:21%; text-align:right"><b>'.number_format($tot_excl_amt,2).'</b></td>
                                        <td colspan="1" style=" font-size:17px; text-align:center;border:1px solid black;width:21%; text-align:right"><b>'.number_format($tot_stax_amt,2).'</b></td>
                                        <td colspan="1" style=" font-size:17px; text-align:center;border:1px solid black;width:21%; text-align:right"><b>'.number_format($tot_add_amt,2).'</b></td>
                                        <td colspan="1" style=" font-size:17px; text-align:center;border:1px solid black;width:21%; text-align:right"><b>'.number_format($tot_net_amt,2).'</b></td>
                                        <td colspan="1" style=" font-size:17px; text-align:center;border:0px solid black;width:15%"><b>&nbsp;</b></td>
                                    </tr>
                                </table>
                            </div>

                            <div class="total_detail"  style="height:100px">
                                <table border = "2" class="secondlast" style="width:100%; border-collapse:collapse; margin-top:20px; font-family:arial;" >
                                    <tr>
                                        <td rowspan = "4" style="padding-left:5px;border: 0px solid grey;"><b style="font-size:12px;"><i>&nbsp; </i></b><br>
                                        </td>
                                        <td rowspan = "4" style = "width:20%; border:0px solid red"></td>
                                        <td style = "width:20%;text-align:left; font-weight:bold;font-size:11px;border: 1px solid gray;border-left:2px solid black; border-top:2px solid black; padding: 4px"> SUB TOTAL </td>
                                        <td style = "width:20%; text-align:right;font-weight:bold;font-size:11px;border: 1px solid gray; border-right:2px solid black; border-top:2px solid black; padding: 4px">'.number_format($tot_net_amt,2).'</td>
                                    </tr>
                                    <tr>
                                        <td style = "text-align:left;font-size:11px;border: 1px solid gray;border-left:2px solid black; padding: 3px"> Add : Others </td>
                                        <td style = "text-align:right;font-size:11px;border: 1px solid gray;border-right:2px solid black; padding: 3px">'.number_format($charge_amt,2).'</tr>
                                        <tr>
                                        <td style = "text-align:left;font-size:11px;border: 1px solid gray;border-left:2px solid black; padding: 3px">Add: Itax Amt</td>
                                        <td style = "text-align:right;font-size:11px;border: 1px solid gray;border-right:2px solid black; padding: 3px">'.number_format($itax_amt,2).'</tr>
                                        <tr>
                                        <td style = "text-align:left;font-size:11px;border: px solid gray;border-left:2px solid black; padding: 0px"></td>
                                        <td style = "text-align:right;font-size:11px;border: px solid gray;border-right:2px solid black; padding: 0px"></tr>
                                    <tr>
                                        <td rowspan = "4" style="padding-left:5px;border: 0px solid grey;"><b style="font-size:12px;"><i>&nbsp; </i></b><br>
                                        </td>
                                        <td rowspan = "4" style = "width:20%; border:0px solid red"></td>
                                    </tr>
                                    <tr>
                                        <td style = "text-align:left;font-size:11px;border: 1px solid gray;border-left:2px solid black; padding: 3px"> Less: Freight</td>
                                        <td style = "text-align:right;font-size:11px;border: 1px solid gray;border-right:2px solid black; padding: 3px">'.number_format($other_charges,2).'</tr>
                                        <tr>
                                        <td style = "text-align:left;font-size:11px;border: 1px solid gray;border-left:2px solid black; padding: 3px">Less: Further Disc</td>
                                        <td style = "text-align:right;font-size:11px;border: 1px solid gray;border-right:2px solid black; padding: 3px">'.number_format($other_ded,2).'</tr>
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
                                        <td style = "font-size:11px;width:90%; border:1px solid black;">&nbsp;('.$result.' Only)</td>
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
            }
        } else {
            echo "form no required";
        }
} else {
    echo "action not matched";
}




