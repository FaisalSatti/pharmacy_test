<?php
session_start();
include "../api/auth/db.php";
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/../helpers/helpers.php';
$barcode = new Helpers();
if (isset($_GET['action']) && $_GET['action'] == 'print') {
    if (isset($_GET['order_key']) && !empty($_GET['order_key'])) {
// print_r($_GET);die();
$order_key = $_GET['order_key'];
$co_code = $_GET['co_code'];
$doc_no = $_GET['doc_no'];
$doc_year = $_GET['doc_year'];
$co_name = $_GET['company_name'];
$doc_type = "DC";
$sql = "SELECT 
        CO_CODE,DOC_YEAR,DOC_TYPE,DOC_NO,DOC_DATE,DO_KEY,ORDER_PARTY_REF,REFNUM,REFNUM2,ORDER_REFNUM,
        DUE_DATE,PO_NO,PO_DATE,
        PARTY_CODE,PARTY_NAME,ADDRESS,CONTACT_NAME,PHONE_NOS,GST,NTN,CITY_NAME,CRDAYS,
        DIV_NAME,SMAN_NAME,SHIP_MODE,SHIP_NO,
        STAX_RATE,STAX_AMT,OTHER_CHRGS,OTHER_DED,TOTAL_GROSS_AMT,TOTAL_NET_AMT,REMARKS,
        ADDTAX_AMT,CHARGE_AMT,ADDTAX_RATE,loc_code,
        ENTRY_NO,ITEM_CODE,ITEM_NAME_SALE,TYPE_NAME,ITEM_NAME_SALE2,UM_NAME,
        QTY,RATE,AMT,DISC_RATE,DISC_AMT,FRT_RATE,FRT_AMT,
        EXCL_RATE,EXCL_AMT,STAX_RATE_DTL,STAX_AMT_DTL,ADD_RATE,ADD_AMT,NET_AMT,
        BATCH_NO,EXPIRY_DATE,LOC_NAME
        FROM DL_UM_VIEW_NEW

        WHERE CO_CODE   =  '$co_code'
        AND   DO_KEY_REF     =  '$order_key' 
        AND   DOC_TYPE   =  '$doc_type'
        AND   DOC_YEAR   =  '$doc_year'
        ORDER BY DO_KEY,DOC_NO";

// SELECT CO_CODE,DOC_YEAR,DOC_TYPE,DOC_NO,DOC_DATE,DO_KEY,PO_NO,CO_REF,VOUCHER_NO,
// PARTY_CODE,PARTY_NAME,ADDRESS,GST,NTN,CRDAYS,DIV_CODE,PO_CATG,PHONE_NOS,CONTACT_NAME,
// ENTRY_NO,ITEM_CODE,ITEM_NAME,UM_NAME,ITEM_TYPE,ITEM_DETAIL,
// QTY_RCVD,QTY_REJ,QTY_OK,LOC_CODE,BATCH_NO,EXPIRY_DATE,REMARKS

// FROM GRN_LOCAL_UM_VIEW2

// WHERE CO_CODE = '$co_code'
// AND   DO_KEY               = '$order_key'
// AND   DOC_NO          = '$doc_no'
// AND   DOC_YEAR          = '$doc_year'
// ORDER BY DOC_NO

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
        $do_key = $return_data[0]['do_key'];
        $co_code = $return_data[0]['co_code'];
        // $co_name = $return_data[0]['co_name'];
        // $co_ref = $return_data[0]['co_ref'];
        // $party_ref = $return_data[0]['party_ref'];
        // $dlvry_date = $return_data[0]['dlvry_date'];
        // $po_close = $return_data[0]['item_type'];
        // $voucher_no = $return_data[0]['voucher_no'];
        $party_code = $return_data[0]['party_code'];
        $party_name = $return_data[0]['PARTY_NAME'];
        // $crdays = $return_data[0]['crdays'];
        $remarks = $return_data[0]['remarks'];
        $item_code = $return_data[0]['item_code'];
        $item_name = $return_data[0]['ITEM_NAME'];
        // $product_code = $return_data[0]['product_code'];
        // $product_name = $return_data[0]['product_name'];
        // $item_detail = $return_data[0]['item_detail'];
        $qty = $return_data[0]['qty'];
        $po_no = $return_data[0]['po_no'];
        // $rate = $return_data[0]['rate'];
        // $amt = $return_data[0]['amt'];
        $um_name = $return_data[0]['um_name'];
        // $stax_code = $return_data[0]['stax_code'];
        // $addtax_code = $return_data[0]['addtax_code'];
        // $stax_rate = $return_data[0]['stax_rate'];
        // $stax_amt = $return_data[0]['stax_amt'];
        // $addtax_rate = $return_data[0]['addtax_rate'];
        // $addtax_amt = $return_data[0]['addtax_amt'];
        // $net_amt = $return_data[0]['net_amt'];
        $address = $return_data[0]['address'];
        $gst = $return_data[0]['gst'];
        $ntn = $return_data[0]['ntn'];
        $order_party_ref = $return_data[0]['order_party_ref'];
        $date = date('m/d/Y');
        // // $co_name =  $return_data[0]['company_name'];
        // $party_ref =  $return_data[0]['party_ref'];
        // $refnum =  $return_data[0]['refnum'];
        $refnum2 =  $return_data[0]['REFNUM2'];
        // $order_refnum =  $return_data[0]['order_refnum'];
        // $due_date = $return_data[0]['due_date'];
        $po_date = $return_data[0]['po_date'];
        // $party_code = $return_data[0]['party_code'];
        // $party_name = $return_data[0]['PARTY_NAME'];
        // $address = $return_data[0]['address'];
        $contact_name = $return_data[0]['contact_name'];
        $phone_nos = $return_data[0]['phone_nos'];
        // $gst = $return_data[0]['gst'];
        // $ntn =  $return_data[0]['ntn'];
        $city_name = $return_data[0]['city_name'];
        // $crdays = $return_data[0]['crdays'];
        $div_name = $return_data[0]['div_name'];
        $sman_name = $return_data[0]['sman_name'];
        $ship_mode =  $return_data[0]['ship_mode'];
        $ship_no = $return_data[0]['ship_no'];
        // $stax_rate = $return_data[0]['stax_rate'];
        // $stax_amt = $return_data[0]['stax_amt'];
        // $other_charges = $return_data[0]['other_chrgs'];
        // $other_ded =  $return_data[0]['other_ded'];
        // $total_gross_amt = $return_data[0]['total_gross_amt'];
        // $total_net_amt = $return_data[0]['total_net_amt'];
        // $remarks = $return_data[0]['remarks'];
        // $addtax_amt = $return_data[0]['addtax_amt'];
        // $charge_amt =  $return_data[0]['charge_amt'];
        // $addtax_rate = $return_data[0]['addtax_rate'];
        // $loc_code = $return_data[0]['loc_code'];
        // $entry_no = $return_data[0]['entry_no'];
        $item_code = $return_data[0]['item_code'];
        // $item_name_sale =  $return_data[0]['ITEM_NAME_sale'];
        // $type_name = $return_data[0]['TYPE_NAME'];
        // $item_name_sale2 = $return_data[0]['ITEM_NAME_sale2'];
        // $um_name = $return_data[0]['um_name'];
        // $qty = $return_data[0]['qty'];
        // $rate =  $return_data[0]['rate'];
        // $amt = $return_data[0]['amt'];
        // $disc_rate = $return_data[0]['disc_rate'];
        // $disc_amt = $return_data[0]['disc_amt'];
        // $frt_rate = $return_data[0]['FRT_RATE'];
        // $frt_amt =  $return_data[0]['FRT_AMT'];
        // $excl_rate = $return_data[0]['EXCL_RATE'];
        // $excl_amt = $return_data[0]['excl_amt'];
        // $stax_rate_dtl = $return_data[0]['STAX_RATE_DTL'];
        // $stax_amt_dtl = $return_data[0]['STAX_AMT_DTL'];
        // $add_rate =  $return_data[0]['ADD_RATE'];
        // $add_amt = $return_data[0]['ADD_AMT'];
        // $net_amt = $return_data[0]['net_amt'];
        $batch_no = $return_data[0]['batch_no'];
        $expiry_date = $return_data[0]['expiry_date'];
        // $item_hscode =  $return_data[0]['item_hscode'];
        $loc_name = $return_data[0]['loc_name'];
        // $ledger_bal = $return_data[0]['ledger_bal'];
        // $itax_amt = $return_data[0]['ITAX_AMT'];
        // $itax_rate = $return_data[0]['ITAX_RATE'];
    }

    $i = 1;
    foreach ($return_data as  $value) {

        $data_tr .= '<tr style="padding-top:55px">
                    <td style="text-align:center ;border:1px solid black;width:8%">'.$i.'</td>
                    <td colspan="1" style="text-align:center ;border:1px solid black;width:12%">'.$value['item_code'].'</td>
                    <td colspan="1" style="text-align:center ;border:1px solid black;width:29%;"> '.$value['ITEM_NAME_sale'].' </td>
                    <td colspan="1" style="text-align:center ;border:1px solid black;width:12%">'.$value['TYPE_NAME'].'</td>
                    <td colspan="1" style="text-align:center ;border:1px solid black;width:12%">'.$value['um_name'].'</td>
                    <td colspan="1" style="text-align:center ;border:1px solid black;width:12%; text-align:right">'.number_format($value['qty'],2).'</td>
                    <td colspan="1" style="text-align:center ;border:1px solid black;width:14%">'.$value['batch_no'].'</td>
                    <td colspan="1" style="text-align:center ;border:1px solid black;width:14%">'.$value['expiry_date'].'</td>
                    <td colspan="1" style="text-align:center ;border:1px solid black;width:20%">'.$value['loc_name'].'</td>
                </tr>';
                $total_qty = $total_qty + $value['qty'];

                    ++$i;
    }

    $number1 = $total_qty;
            $no = floor($total_qty);
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
                '18' => 'Eighteen', '19' => 'Nineteen', '20' => 'Twenty',
                '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
                '60' => 'Sixty', '70' => 'Seventy',
                '80' => 'Eighty', '90' => 'Ninety');

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
                } else {
                    $str[] = null;
                }

            }

            $str = array_reverse($str);
            $result = implode('', $str);
    // print_r($return_data); die();

$space = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
$mpdf = new \Mpdf\Mpdf(['orientation' => 'P']);
$mpdf->setFooter('{PAGENO}');
$stylesheet = file_get_contents('po_invoice.css');
// $mpdf->SetWatermarkText('SUFYAN');
$mpdf->showWatermarkText = true;
$mpdf->WriteHTML($stylesheet, 1);
$mpdf->WriteHTML('<div class="row" style="line-height:16px;font-family:arial;">
            <div class="main-heading">
            <table border = "2" class="secondlast" style="width:100%; border-collapse:collapse;margin-top:20px;margin-right:700px;font-family:arial;" >
                <tr>
                    <td style="width:250px;font-size:26px;font-weight:bold;">'.$co_name.'</td>
                </tr>
                <tr>
                    <td style="width:250px;font-size:15px;height:60px;"><span>Plot No 12, Sector - 15, Korangi Industrial Area, Karachi 74900</span></td>
                </tr>
                <tr>
                    <td style="width:250px;font-size:15px;"><span>Voice &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 92-213-5050074-77</span></td>
                </tr>
                <tr>
                    <td style="width:250px;font-size:15px;"><span>Fax &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 92-213-5066552</span></td>
                </tr>
                <tr>
                    <td style="width:250px;font-size:15px;"><span>GST No. &nbsp;&nbsp; 12-00-3000-495-28</span></td>
                </tr>
                <tr>
                    <td style="width:250px;font-size:15px;"><span>NTN No. &nbsp;&nbsp; 1211852-4</span></td>
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
                    <td style="width:250px;font-size:20px;font-weight:bold;">DELIVERY CHALLAN</td>
                </tr>

                <tr>
                    <td style="width:250px;font-size:12px;"><span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
                </tr>
                
                <tr>
                    <td style="width:250px;font-size:12px;"><span>DC#. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>'.$refnum2.'</b> </span></td>
                </tr>

                <tr>
                    <td style="width:250px;font-size:12px;"><span>TRANSACTION# &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>'.$order_key.'</b></span></td>
                </tr>

                <tr>
                    <td style="width:250px;font-size:12px;"><span>SALES ORDER NO &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>'.$po_no.'</b></span></td>
                </tr>

                <tr>
                    <td style="width:250px;font-size:12px;"><span>DATE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>'.$doc_date.'</b> </span></td>
                </tr>

                <tr>
                    <td style="width:250px;font-size:12px;"><span>DIVISION &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>'.$div_name.'</b></span></td>
                </tr>
                
                <tr>
                    <td style="width:250px;font-size:12px;"><span>ORDER DATE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>'.$po_date.'</b> </span></td>
                </tr>
                
                


            </table>

            <br><br>
        </div>
        <div class="" style="border:2px solid black;">
            

            


        
        <div class="" style="border:1px solid black;width:100%;">
                                <table class="secondlast" style="font-family:arial; width:100%">
                                    <tr>
                                        <td style="background-color:gray;height:30px;border-right:2px solid black;width:50%;padding-left:20px;" ><b>BILL TO</b></td>
                                        <td style="background-color:gray;height:30px;padding-left:20px"><b>DELIVER TO</b></td>
                                    </tr>
                                    <tr>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase;font-size:10px;border-right:2px solid black;"><b>PARTY NAME: &nbsp;</b> '.$party_name.'</td>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase;font-size:10px;">'.$party_name.'</td>
                                    </tr>
                                    <tr>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase;font-size:10px;border-right:2px solid black;"><b>ADDRESS:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> '.$address.' </td>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase"font-size:10px;>'.$address.'</td>
                                    </tr>
                                    <tr>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase;font-size:10px;border-right:2px solid black;"><b>CITY: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>'.$city_name.'</td>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase;font-size:10px;"><b>CUSTOMER REF#:</b> &nbsp;&nbsp;&nbsp;&nbsp;'.$order_party_ref.'</td>
                                    </tr>
                                    <tr>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase;font-size:10px;border-right:2px solid black;"><b>PHONE#:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$phone_nos.'</td>
                                        <td style="width:20px;padding-left:20px;text-transform:uppercase;font-size:10px;"><b>PAYMENT TERMS#:</b>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<span><b>DAYS:</b>&emsp;&emsp;&emsp;&emsp;</span><span><b>DUE DT:</b></span></td>
                                    
                                    </tr>
                                    <tr>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase;font-size:10px;border-right:2px solid black;"><b>CONTACT#: </b>&nbsp;&nbsp;&nbsp;&nbsp; '.$contact_name.' &emsp;&emsp;&emsp;&emsp;  <b>PARTY#:</b>&nbsp;&nbsp;&nbsp;&nbsp;'.$party_code.'</td>
                                        <td style="width:20px;padding-left:20px;text-transform:uppercase;font-size:10px;"><b></b></span><span><b>ship method:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$ship_mode.' &emsp;&emsp;&emsp;&emsp;&emsp; <b>CN#</b> &nbsp;&nbsp;'.$ship_no.'</span></td>
                                    </tr>
                                    <tr>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase;font-size:10px;border-right:2px solid black;"><span><b>GST#:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$gst.' &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp; <b>NTN/CNIC#: </b>&nbsp;'.$ntn.'</span></td>
                                        <td style="width:20px;padding-left:20px;text-transform:uppercase;font-size:10px;"><b></b></span><span><b>SAlesman:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$sman_name.'&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; </span></td>
                                    </tr>
                                </table>
                            </div>
                            </div>

                            <br>
                            <br>

        
        <div class="invoice_detail" style="padding:5px;height: 350px;border:2px solid black">
            <table class="table_head" style="border:2px solid black;display:inline-block;width:100%;height:1200px;font-family:arial;">
                <tr style="padding-top:55px">
                    <td style="text-align:center;border:1px solid black;width:8%"><b>S-No</b></td>
                    <td colspan="1" style="text-align:center;border:1px solid black;width:12%"><b>Code</b></td>
                    <td colspan="1" style="text-align:center;border:1px solid black;width:30%"><b>Item Description</b></td>
                    <td colspan="1" style="text-align:center;border:1px solid black;width:12%"><b>TYPE</b></td>
                    <td colspan="1" style="text-align:center;border:1px solid black;width:12%"><b>UM</b></td>
                    <td colspan="1" style="text-align:center;border:1px solid black;width:12%"><b>Qty</b></td>
                    <td colspan="1" style="text-align:center;border:1px solid black;width:14%"><b>Batch</b></td>
                    <td colspan="1" style="text-align:center;border:1px solid black;width:14%"><b>Expiry</b></td>
                    <td colspan="1" style="text-align:center;border:1px solid black;width:20%"><b>Loc Name</b></td>
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
                    <td colspan="1" style="border:1px solid black;width:20%; text-align:right;"><b>TOTALS</b></td>
                    <td colspan="1" style="border:1px solid black;width:5%; text-align:right;"><b> '.number_format($total_qty, 2).' </b></td>
                    <td colspan="1" style="border:0px solid black;width:10%">&nbsp;</td>
                    <td colspan="1" style="border:0px solid black;width:10%">&nbsp;</td>
                    <td colspan="1" style="border:0px solid black;width:14%">&nbsp;</td>
                </tr>

            </table>
            <table class="data1" style="border:1px solid black;display:inline-block;width:100%;height:1200px;padding-bottom:150px; font-family:arial;">

                
            </table>
        </div>



        <table  class="secondlast" style="width:100%; border-collapse:collapse; margin-top:20px; font-family:arial;" >
        <tr>
        <td style = "font-size:11px;width:10%;"> <b>Remarks</b></td>
          <td style = "font-size:11px;width:90%; border:1px solid black;">&nbsp;'.$remarks.'</td>
        </tr>

        <tr>
        <td style = "font-size:11px;width:10%;"> <b>&nbsp;</b></td>
        </tr>
        
        <tr>
        <td style = "font-size:11px;width:10%;"> <b>IN Words :</b></td>
          <td style = "font-size:11px;width:90%; border:1px solid black;">&nbsp;('. $result . 'Only)</td>
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
    
    </div>




        </div>



</div>
</div>


            </div>', 2);
$mpdf->Output();

    } else {
        echo "Document No. is required";
    }
} else {
    echo "action not matched";
}
}