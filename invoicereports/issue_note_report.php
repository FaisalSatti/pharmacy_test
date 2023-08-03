<?php
session_start();
include "../api/auth/db.php";
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/../helpers/helpers.php';
if (isset($_GET['action']) && $_GET['action'] == 'print') {
    if (isset($_GET['do_key']) && !empty($_GET['do_key'])) {
        $do_key = $_GET['do_key'];
        $co_code = $_GET['co_code'];
        $doc_no = $_GET['doc_no'];
        $doc_year = $_GET['doc_year'];
        $doc_type = 'GIN';
        $sql = "SELECT A.CO_CODE, A.DOC_YEAR, A.DOC_TYPE, A.DOC_NO, A.DOC_DATE, A.DO_KEY, A.REFNUM, A.order_refnum, A.remarks, A.dept_code, A.dept_name,
        A.ENTRY_NO,A.ITEM_CODE, A.ITEM_NAME_SALE, A.UM_NAME, A.QTY, A.BATCH_NO, A.EXPIRY_DATE, A.loc_code, A.loc_name, B.co_name
        FROM GIN_UM_VIEW A 
        JOIN company B ON A.CO_CODE = B.co_code
        WHERE A.CO_CODE = '$co_code' AND A.DO_KEY = '$do_key' AND A.DOC_TYPE = '$doc_type' AND A.DOC_YEAR = '$doc_year'
        ORDER BY A.DOC_NO, A.ENTRY_NO";
        // print_r($sql); die();
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            $return_data = [];
            while ($show = mysqli_fetch_assoc($result)) {
                $return_data[] = $show;
                // print_r($return_data); die();
                $data_tr = '';
                $data_tr2 = '';
                $co_code = $return_data[0]['co_code'];
                $doc_year = $return_data[0]['doc_year'];
                $doc_type = $return_data[0]['doc_type'];
                $doc_no = $return_data[0]['doc_no'];
                $doc_date = $return_data[0]['doc_date'];
                $do_key = $return_data[0]['do_key'];
                $refnum = $return_data[0]['refnum'];
                $order_refnum = $return_data[0]['order_refnum'];
                $dept_code = $return_data[0]['dept_code'];
                $dept_name = $return_data[0]['dept_name'];
                $remarks = $return_data[0]['remarks'];
                $entry_no = $return_data[0]['entry_no'];
                $item_code = $return_data[0]['item_code'];
                $ITEM_NAME_SALE = $return_data[0]['ITEM_NAME_sale'];
                $um_name = $return_data[0]['um_name'];
                $qty = $return_data[0]['qty'];
                $batch_no = $return_data[0]['batch_no'];
                $expiry_date = $return_data[0]['expiry_date'];
                $loc_code = $return_data[0]['loc_code'];
                $loc_name = $return_data[0]['loc_name'];        
                $co_name = $return_data[0]['co_name'];        
                // $rate = $return_data[0]['rate'];
                // $amt = $return_data[0]['amt'];
                // $net_amt = $return_data[0]['net_amt'];
            }
            $i = 1;
            $total_qty=0;
            foreach ($return_data as  $value) {

                $data_tr .= '
                    <tr style="padding-top:55px">
                        <td style="border:1px solid black;width:8%">'.$i.'</td>
                        <td colspan="1" style="border:1px solid black;width:12%">'.$value['co_code'].'</td>
                        <td colspan="1" style="border:1px solid black;width:29%;">'.$value['ITEM_NAME_sale'].'</td>
                        <td colspan="1" style="border:1px solid black;width:8%">'.$value['um_name'].'</td>
                        <td colspan="1" style="border:1px solid black;width:14%; text-align:right">'.number_format($value['qty'],2).'</td>
                        <td colspan="1" style="border:1px solid black;width:10%">'.$value['loc_name'].'</td>
                        <td colspan="1" style="border:1px solid black;width:14%">'.$value['batch_no'].'</td>
                        <td colspan="1" style="border:1px solid black;width:14%">'.$value['expiry_date'].'</td>
                    </tr>';
                $total_qty= $total_qty+$value['qty'];
                // $total_rej= $total_rej+$value['QTY_REJ'];
                // $total_ok= $total_ok+$value['QTY_OK'];
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


                    $space = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                    $mpdf = new \Mpdf\Mpdf(['orientation' => 'P']);
                    $stylesheet = file_get_contents('po_invoice.css');
                    // $mpdf->SetWatermarkText('SUFYAN');
                    $mpdf->showWatermarkText = true;
                    $mpdf->WriteHTML($stylesheet, 1);
                    $mpdf->WriteHTML('<div class="row" style="line-height:16px;font-family:arial;">
                    <div class="main-heading">
                    <table border = "2" class="secondlast" style="width:100%; border-collapse:collapse;margin-top:20px;margin-right:700px;font-family:arial;" >
                        <tr>
                            <td style="width:210px;font-size:26px;font-weight:bold;">'.$co_name.'</td>
                        </tr>
                        <tr>
                            <td style="height:10px;"></td>
                        </tr>
                        <tr>
                            <td style="width:210px;font-size:14px;height:100px;padding-top:-60px;;"><span>Plot No 12, Sector - 14, Korangi Industrial Area, Karachi 74900</span></td>
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
                        <tr>
                            <td style="width:210px;font-size:12px;"></td>
                        </tr>

                    </table>
                    <table border = "2" class="secondlast" style="width:30%;border-collapse:collapse;margin-top:-85px;margin-left:160px;font-family:arial;" >
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
                            <td style="font-size:10px;"><span><b>GST#</b> 12-00-3000-495-28</span></td>
                        </tr>
                        <tr>
                            <td style="height:5px;"></td>
                        </tr>
                        <tr>
                            <td style="font-size:10px;"><span><b>NTN#</b> 1211852-4</span></td>
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
                    <table border = "2" class="secondlast" style="width:110%; border-collapse:collapse;margin-top:-110px;margin-left:400px;font-family:arial;" >
                        <tr>
                            <td style="width:250px;font-size:20px;font-weight:bold;">Goods Received Note</td>
                        </tr>
                        <tr>
                            <td style="height:10px;"></td>
                         </tr>
                        <tr>
                            <td style="width:250px;font-size:10px;"><span>GIN NO. &nbsp;<b style="font-size:11px;">'.$refnum.'Testing</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b></b> </span></td>
                        </tr>
                        <tr>
                            <td style="height:10px;"></td>
                         </tr>
                        <tr>
                            <td style="width:250px;font-size:10px;"><span>TRANSACTION# &nbsp;<b style="font-size:11px;">'.$do_key.'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
                        </tr>
                        <tr>
                            <td style="height:10px;"></td>
                        </tr>
                        <tr>
                            <td style="width:250px;font-size:10px;"><span>DATE &nbsp;<b style="font-size:11px;">'.$doc_date.'</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
                        </tr>
                        <tr>
                            <td style="height:10px;"></td>
                        </tr>
                        <tr>
                            <td style="width:250px;font-size:10px;"><span>Order# &nbsp;<b style="font-size:11px;">'.$order_refnum.'</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
                        </tr>
                       
                    </table>
                    <br>
                </div>
                <div class="" style="border:2px solid black;">
                    <table class="" style="font-family:arial;margin-right:515px;width:100%">
                        <tr>
                            <td style="font-size:20px;width:200px">To Department</td>
                            <td style="font-size:22px;width:500px"><b>'.$dept_name.'</b></td>
                            <br>
                        </tr>
                    </table>
                </div>

                <br><br>
                
                <div class="invoice_detail" style="padding:5px;height: 350px;border:3px solid black">
                    <table class="table_head" style="border:2px solid black;display:inline-block;width:100%;height:1200px;font-family:arial;">
                        <tr style="padding-top:55px">
                            <td style="border:1px solid black;width:8%"><b>S-No</b></td>
                            <td colspan="1" style="border:1px solid black;width:12%"><b>Code</b></td>
                            <td colspan="1" style="border:1px solid black;width:30%"><b>Item Description</b></td>
                            <td colspan="1" style="border:1px solid black;width:8%"><b>UM</b></td>
                            <td colspan="1" style="border:1px solid black;width:14%"><b>Qty</b></td>
                            <td colspan="1" style="border:1px solid black;width:10%"><b>Loc</b></td>
                            <td colspan="1" style="border:1px solid black;width:14%"><b>Batch</b></td>
                            <td colspan="1" style="border:1px solid black;width:14%"><b>Expiry</b></td>
                        </tr>

                    </table>
                    <br>

                    <table class="table_head" style="border:px solid black;display:inline-block;width:100%;height:1200px;font-family:arial;">
                        
                    '.$data_tr.'

                    </table>

            
                </div>
            <div class="total_detail"  style="height:100px">

            <div class="invoice_detail" style="padding-top:20px;height: 0px;">
                <table class="table_head" style="border:2px solid black;display:inline-block;width:100%;height:1200px;font-family:arial;">
                    <tr style="padding-top:55px">
                        <td style="border:0px solid black;width:8%">&nbsp;</td>
                        <td colspan="1" style="border:0px solid black;width:2%">&nbsp;</td>
                    
                        <td colspan="1" style="border:1px solid black;width:20%"><b>TOTALS</b></td>
                        <td colspan="1" style="border:1px solid black;width:1%; text-align:right"><b>'.number_format($total_qty,2).'</b></td>
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
                <td style = "font-size:11px;width:90%; border:1px solid black;"> ' .$remarks.'</td>
                </tr>

                <tr>
                <td style = "font-size:11px;width:10%;"> <b>&nbsp;</b></td>
                </tr>
                
                <tr>
                <td style = "font-size:11px;width:10%;"> <b>IN Words :</b></td>
                <td style = "font-size:11px;width:90%; border:1px solid black;">( '.$result.' Only)</td>
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

        }else {
            echo "<body style=background:black;><h1><center style=color:white;padding-top:20%;font-family:calibri;animation:3s infinite alternate slidein;>No data Found</center></h1></body>";
        }
    } else {
        echo "<body style=background:black;><h1><center style=color:white;padding-top:20%;font-family:calibri;animation:3s infinite alternate slidein;>No data Found</center></h1></body>";
    }
}