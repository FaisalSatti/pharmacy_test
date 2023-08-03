<?php
session_start();
include("../api/auth/db.php");
require_once __DIR__  . '/vendor/autoload.php';
require_once __DIR__ . '/../helpers/helpers.php';
$barcode = new Helpers();
// print_r($_POST);
// die();
if (isset($_GET['action']) && $_GET['action'] == 'print') {
    if (isset($_GET['do_key']) && !empty($_GET['do_key'])) {
        // print_r($_GET);die();
        $do_key = $_GET['do_key'];
        $co_code = $_GET['co_code'];
        $co_name = $_GET['co_name'];
        $doc_no = $_GET['doc_no'];
        $doc_year = $_GET['doc_year'];
        $sql = "SELECT CO_CODE,DOC_YEAR,DOC_TYPE,DOC_NO,DOC_DATE,DO_KEY,REFNUM,
        ENTRY_NO,ITEM_CODE,ITEM_NAME_SALE ITEM_NAME,ITEM_CODE2,ITEM_NAME_SALE2,
        UM_NAME,QTY,BATCH_NO,EXPIRY_DATE,remarks,from_loc,to_loc
        FROM TR_UM_VIEW_DIV
        WHERE CO_CODE     ='$co_code'
        AND   DO_KEY      = '$do_key'
        AND   DOC_TYPE    = 'TRDIV'
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
                $DO_KEY = $return_data[0]['do_key'];
                $REFNUM = $return_data[0]['refnum'];
                $WH_CODE = $return_data[0]['wh_code'];
                $FROM_LOC = $return_data[0]['FROM_LOC'];
                $WH_CODE2 = $return_data[0]['wh_code2'];
                $TO_LOC = $return_data[0]['TO_LOC'];
                $ENTRY_NO = $return_data[0]['entry_no'];
                $ITEM_CODE = $return_data[0]['item_code'];
                $ITEM_CODE2 = $return_data[0]['ITEM_CODE2'];
                $ITEM_NAME = $return_data[0]['ITEM_NAME'];
                $ITEM_NAME2 = $return_data[0]['item_name_sale2'];
                $UM_NAME = $return_data[0]['um_name'];
                $QTY = $return_data[0]['qty'];
                $BATCH_NO = $return_data[0]['batch_no'];
                $EXPIRY_DATE = $return_data[0]['expiry_date'];
                $REMARKS = $return_data[0]['remarks'];
                // $CRDAYS = $return_data[0]['crdays'];
                // $DIV_CODE = $return_data[0]['div_code'];
                // $PO_CATG = $return_data[0]['po_catg'];
                // $TOTAL_GROSS_AMT = $return_data[0]['total_gross_amt'];
                // $STAX_RATE = $return_data[0]['stax_rate']; 
                // $STAX_AMT = $return_data[0]['stax_amt'];
                // $ADDTAX_RATE = $return_data[0]['addtax_rate'];
                // $ADDTAX_AMT = $return_data[0]['addtax_amt'];
                // $CHARGE_AMT = $return_data[0]['charge_amt'];
                // $OTHER_CHRGS = $return_data[0]['other_chrgs'];
                // $OTHER_DED = $return_data[0]['other_ded'];
                // $TOTAL_NET_AMT = $return_data[0]['total_net_amt'];
                // $ENTRY_NO = $return_data[0]['entry_no'];
                // $PO_NO_DTL = $return_data[0]['po_no_dtl'];
                // $GRN_KEY_DTL = $return_data[0]['grn_key_dtl'];
                // $ITEM_CODE = $return_data[0]['item_code'];
                // $ITEM_NAME = $return_data[0]['item_name'];
                // $UM_NAME = $return_data[0]['um_name'];
                // $ITEM_TYPE = $return_data[0]['item_type'];
                // $ITEM_DETAIL = $return_data[0]['item_detail'];
                // $QTY = $return_data[0]['qty'];
                // $RATE = $return_data[0]['rate'];
                // $AMT = $return_data[0]['amt'];
                $space = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
            }
            

            $i = 1;
            $total=0;
            foreach ($return_data as  $value) {
                
                $data_tr .= '<tr style="border:1px solid black">
                                <td style="border:2px solid black;width:10%;font-size:14px;">' . $i . '</td>
                                <td style="border:2px solid black;width:30%;font-size:14px;">' . $value['ITEM_NAME'] . '</td>
                                <td style="border:2px solid black;width:30%;font-size:14px;">' . $value['item_name_sale2'] . '</td>
                                <td style="border:2px solid black;width:10%;font-size:14px;">' . number_format($value['qty'],2) . '</td>
                                <td style="border:2px solid black;width:10%;font-size:14px;">' . $value['batch_no'] . '</td>
                                <td style="border:2px solid black;width:10%;font-size:14px;">' . $value['expiry_date'] . '</td>        
                            </tr>
                            <tr style="border:1px solid black">
                                    <td style="border:2px solid black;width:10%;font-size:14px;"></td>
                                    
                                    <td  style="border:2px solid black;text-align:left;width:210px">'.$ITEM_CODE.'&emsp; '.$type_name.'  &emsp;&emsp; &emsp;  '.$FROM_LOC.'</td>
                                    <td  style="border:2px solid black;text-align:left;width:210px;max-width: 210px;">'.$ITEM_CODE2.'&emsp; '.$type_name.'  &emsp;&emsp; &emsp; '.$TO_LOC.'</td>
                                    <td style="border:2px solid black;width:10%;font-size:14px;"></td>
                                    <td style="border:2px solid black;width:10%;font-size:14px;"></td>
                                    <td style="border:2px solid black;width:10%;font-size:14px;"></td>   
                                    
                            </tr>
                            
                            
                            
                            
                            ';
                            $total= $total+$value['qty'];
                            // print_r($total);die();
                        ++$i;
            }
            $number1 = $total;
            $no = floor($total);
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
                                <td style="width:250px;font-size:26px;font-weight:bold;">'. $co_name   .'</td>                                   
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
                                <td style="width:250px;font-size:26px;font-weight:bold;">TRANSFER REPORT BY DIVISION</td>                                   
                            </tr>
                            <tr>
                                <td style="width:250px;font-size:15px;"><span>TR No :<b>'. $REFNUM   .' </b></span></td>                                   
                            </tr>
                            <tr>
                                <td style="width:250px;font-size:15px;"><span>TRANSACTION#  <b>'. $DO_KEY   .' </b></span></td>                                   
                            </tr>
                            <tr>
                                <td style="width:250px;font-size:15px;"><span>DATE <b>'. $DOC_DATE   .'</b></span></td>                                   
                            </tr>
                            
                        </table>
                    </div>
                    <div class="" style="border:1px solid black;margin-top:20px">
                        <table class="">
                            <tr>
                            <td style = "font-size:11px;width:20%"> from location</td>
                                <td style="background-color:gray;height:30px;width:600px"><b>'. $FROM_LOC   .'</b></td>
                                
                                <br>
                            </tr>
                            <tr>
                            <td style = "font-size:11px;width:20%"> to location</td>
                                <td style="background-color:gray;height:30px;width:600px"><b>'. $TO_LOC   .'</b></td>
                                
                                <br>
                            </tr>
                            
                        </table>
                    </div>
                    <div class="invoice_detail" style="padding-top:20px;">
                        <table class="table_head" style="border:1px solid black;display:inline-block;height:1200px;width:100%;">
                            <tr style="padding-top:55px">
                                <td style="border:2px solid black;width:10%"><b>S-No</b></td>
                                <td colspan="1" style="border:2px solid black;width:30%;"><b>ITEM TRANSFER FROM</b></td>
                                <td colspan="4" style="border:2px solid black;width:30%;"><b>ITEM TRANSFER TO</b></td>
                                <td colspan="2" style="border:2px solid black;width:10%;"><b>Qty</b></td>
                                <td colspan="2" style="border:2px solid black;width:10%;"><b>batch no</b></td>
                                <td colspan="2" style="border:2px solid black;width:10%"><b>expiry</b></td>
                            </tr>
                        </table>
                        <table class="data1" style="border:1px solid black;display:inline-block;width:100%;height:1200px;padding-bottom:150px">
                        
                        '. $data_tr   .'
                        </table>
                    </div>
                    
                        <table  class="secondlast" style="width:100%; border-collapse:collapse; margin-top:20px; " >
                            <tr>
                                <td style = "font-size:11px;width:20%"> Remarks
                                </td>
                                <td style = "font-size:11px; border:2px solid grey;">'. $REMARKS   .'</td>   
                            </tr>
                            <tr>
                            <td style = "font-size:11px;width:20%"> In Words
                            </td>
                            <td style = "font-size:11px; border:2px solid grey;">'. $result   .' Only</td>   
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
        echo "<body style=background:black;><h1><center style=color:white;padding-top:20%;font-family:calibri;animation:3s infinite alternate slidein;>No data Found</center></h1></body>";
    }
} else {
    echo "<body style=background:black;><h1><center style=color:white;padding-top:20%;font-family:calibri;animation:3s infinite alternate slidein;>No data Found</center></h1></body>";
}
