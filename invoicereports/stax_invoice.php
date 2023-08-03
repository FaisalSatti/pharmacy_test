<?php
session_start();
include("../api/auth/db.php");
require_once __DIR__  . '/vendor/autoload.php';
require_once __DIR__ . '/../helpers/helpers.php';
// $barcode = new Helpers();
if (isset($_GET['action']) && $_GET['action'] == 'print') {
    // print_r($_GET);die();
    if (isset($_GET['order_key']) && !empty($_GET['order_key'])) {
        // print_r($_GET);die();
        $po_no = $_GET['order_key'];
        $co_code = $_GET['co_code'];
        $doc_no = $_GET['doc_no'];
        $doc_year = $_GET['doc_year'];
        // $doc_type = $_GET['doc_type'];

        // $sql = "SELECT a.*,b.co_name FROM DC_UM_VIEW_NEW a left join company b on a.co_code=b.co_code 
        // WHERE a.co_code   = '$co_code' AND   a.do_key     = '$po_no' AND   a.doc_type   = 'DC'
        //         AND   a.doc_year   = '$doc_year' AND a.doc_no='$doc_no' ORDER BY a.do_key,a.doc_no ";
        $sql = "SELECT C.co_name, A.* FROM DC_UM_VIEW_NEW A JOIN company C on C.co_code = A.co_code
        
        WHERE A.CO_CODE   = '$co_code'
        AND   A.DO_KEY     = '$po_no'
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
                $co_name =  $return_data[0]['co_name'];
                $party_ref =  $return_data[0]['order_party_ref'];
                $refnum =  $return_data[0]['refnum'];
                $refnum2 =  $return_data[0]['REFNUM2'];
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
                $addtax_amt = $return_data[0]['ITAX_AMT'];
                $charge_amt =  $return_data[0]['charge_amt'];
                $addtax_rate = $return_data[0]['ITAX_RATE'];
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
                $item_hscode =  $return_data[0]['item_hscode'];
                $hscode =  $return_data[0]['hscode'];
                $loc_name = $return_data[0]['loc_name'];
                $ledger_bal = $return_data[0]['ledger_bal'];
                $itax_amt = $return_data[0]['ITAX_AMT'];
                $itax_rate = $return_data[0]['ITAX_RATE'];

                
                $doc_date = $return_data[0]['doc_date'];
                $do_key_ref = $return_data[0]['do_key_ref'];
                $space='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                
            } 
            $i=1;
            foreach ($return_data as  $value) {
                $data_tr .='
                
                            
                            <tr style="border:1px solid black;">
                                <td  style="border:1px solid black;width:40px;">'.$i.'</td>
                                <td style="border:1px solid black;width:210px">'.$value['ITEM_NAME_sale'].'</td>
                                <td  style="border:1px solid black;width:70px">'.$value['hscode'].'</td>
                                <td  style="border:1px solid black;width:60px;text-align:right;">'.number_format($value['qty'],2).'</td>
                                <td    style="border:1px solid black;width:63px">'.$value['batch_no'].'</td>
                                <td style="border:1px solid black;width:57px; text-align:right;">'.number_format($value['EXCL_RATE'],2).'</td>
                                <td style="border:1px solid black;width:57px">'.$value['gst'].'</td>
                                <td style="border:1px solid black;width:57px; text-align:right;">'.number_format($value['ADD_RATE'],2).'</td>
                                <td style="border:1px solid black;width:60px;text-align:right;">'.number_format($value['rate'],2).'</td>
                            </tr>
                            <tr style="border:1px solid black">
                                <td  style="border:px solid black;width:40px"></td>
                                <td  style="border:1px solid black;text-align:left;width:210px">'.$value['item_code'].'&emsp; '.$value['TYPE_NAME'].'  &emsp;&emsp; &emsp;  '.$value['um_name'].'</td>
                                <td  style="border:0px solid black;width:70px"></td>
                                <td style="border:1px solid black;width:60px !important">'.$value['loc_code'].'</td>
                                <td  style="border:1px solid black;text-align:center;width:63px">'.$value['expiry_date'].'</td>
                                <td style="border:1px solid black;width:57px !import;text-align:right;">'.number_format($value['disc_amt'],2).'</td>
                                <td style="border:1px solid black;width:57px !import;text-align:right;">'.number_format($value['frt_amt'],2).'</td>
                                <td style="border:1px solid black;width:57px !import;text-align:right;">'.number_format($value['excl_amt'],2).'</td>
                                <td style="border:1px solid black;width:60px !import;text-align:right;">'.number_format($value['amt'],2).'</td>
                            </tr>
                            
                            


                            ';

                            $total_amt = $total_amt + $value['amt'];
                            // $data_tr2 .='';
                            
                                 ++$i;
            }
            // PRINT_R("SSF");DIE();
            $mpdf = new \Mpdf\Mpdf(['orientation' => 'P']);
            $stylesheet = file_get_contents('stax_invoice.css');
            //     // $mpdf->SetWatermarkText('PAID');
            //     // $mpdf->showWatermarkText = true;
            $mpdf->WriteHTML($stylesheet, 1);
            $mpdf->WriteHTML('<div class="row">
                <div class="main"> 
                    <div class="row">
                            <div class="head">
                                <span class="c_name" style="">'.$co_name.'</span>'.$space.'
                                <span class="main_heading" style= ""><u>Sales Tax Invoice</u> </span>
                            </div>
                            <table style="padding-top:20px; font-family:arial;" class="table1" >
                        
                                <tr class="tr1">
                                    <td style="">'.$address.'</td>
                                    <td style="font-size:13px"><b>Voice:</b>&nbsp;&nbsp; '.$phone_nos.'</td>
                                    <td style="font-size:13px"><b>Invoice No#:</b>&nbsp;&nbsp;&nbsp;&nbsp; '.$doc_no.'</td>
                                    <td style="font-size:13px"><b>Date:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$doc_date.'</td>
                                </tr>
                                <tr class="tr2" >
                                    <td>&nbsp;</td>
                                    <td style="font-size:13px"><b>Fax:</b>&nbsp;&nbsp;</td>
                                    <td style="font-size:13px"><b>Transaction#:</b>&nbsp;&nbsp; '.$po_no.'</td>
                                    <td style="font-size:13px"><b>Division#:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$div_name.'</td>
                                </tr>
                                <tr  class="tr3">
                                    <td>&nbsp;</td>
                                    <td style="font-size:13px"><b>GST#:</b>&nbsp;&nbsp; &nbsp;'.$gst.'</td>
                                    <td style="font-size:13px"><b>Sales Order#:</b>&nbsp;&nbsp; '.$do_key_ref.'</td>
                                    <td style="font-size:13px"><b>Order Date:</b> &nbsp;&nbsp;&nbsp;'.$po_date.'</td>
                                </tr>
                                <tr class="tr4">
                                    <td></td>
                                    <td style="font-size:13px"><b>NTN#:</b>&nbsp;&nbsp; '.$ntn.'</td>
                                    <td style="font-size:13px"></td>
                                    <td style="font-size:13px"><b>Order Ref#:</b> &nbsp;&nbsp;&nbsp;'.$party_ref.'</td>
                                </tr>
                            
                            </table><br>
                            <div class="party" style="border:3px solid black;width:100%;">
                                <table class="mast" style="font-family:arial;">
                                    <tr>
                                        <td style="background-color:gray;height:30px;border-right:2px solid black;width:50%;padding-left:20px;" ><b>BILL TO</b></td>
                                        <td style="background-color:gray;height:30px;padding-left:20px"><b>DELIVER TO</b></td>
                                    </tr>
                                    <tr>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase;border-right:2px solid black;"><b>PARTY NAME: </b>&nbsp;&nbsp;'.$party_name.'</td>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase;">'.$party_name.'</td>
                                    </tr>
                                    <tr>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase;border-right:2px solid black;"><b>ADDRESS:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$address.'</td>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase">'.$address.'</td>
                                    </tr>
                                    <tr>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase;border-right:2px solid black;"><b>CITY:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$city_name.'</td>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase;"><b>CUSTOMER REF#:</b>&nbsp;&nbsp;&nbsp;&nbsp;'.$party_ref.'</td>
                                    </tr>
                                    <tr>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase;border-right:2px solid black;"><b>PHONE#:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$phone_nos.'</td>
                                        <td style="width:20px;padding-left:20px;text-transform:uppercase;"><b>PAYMENT TERMS#:</b>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<span><b>DAYS:</b>&emsp;&emsp;&emsp;&emsp;</span><span><b>DUE DT:</b></span></td>
                                    
                                    </tr>
                                    <tr>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase;border-right:2px solid black;"><b>CONTACT#:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$phone_nos.'</td>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase;"><b>PARTY#:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$party_code.'&emsp;&emsp; <span><b>SHIP METHOD:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$ship_mode.'</span>&nbsp;&emsp;&emsp;&emsp;<span><b>CN#:</b>'.$ship_no.'</span></td>
                                    </tr>
                                    <tr>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase;border-right:2px solid black;"><span><b>GST#:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$gst.'</span></td>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase;"><b>NTN/CNIC#:</b>&nbsp;&nbsp;&nbsp;&nbsp; '.$ntn.'&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<span><b>SALESMAN:</b>'.$sman_name.'</span></td>
                                    </tr>
                                </table>
                            </div>
                            <br>
                            <br>
                            <div class="invoice_detail"  style="padding:5px;height: 350px;border:3px solid black">
                                <table class="table_head" style="border:2px solid black;display:inline-block;width:100%;height:1200px;font-family:arial;">
                                    <tr style="padding-top:55px">
                                        <td style="border:2px solid black;"><b>S-No</b><td>
                                        <td colspan="4" style="border:2px solid black;width:200px"><b>Item Description</b></td>
                                        <td  style="border:2px solid black;width:67px"><b>HS Code</b></td>
                                        <td style="border:2px solid black;width:60px"><b>Qty</b></td>
                                        <td style="border:2px solid black;width:65px"><b>Batch#</b></td>
                                        <td style="border:2px solid black;"><b>Excl Rate</b></td>
                                        <td style="border:2px solid black;"><b>GST %</b></td>
                                        <td style="border:2px solid black;"><b>GST Add %</b></td>
                                        <td style="border:2px solid black;"><b>Inc. Rate</b></td>
                                    </tr>
                                    <tr style="padding-top:55px">
                                        <td colspan="1"><td>
                                        <td  style="border:2px solid black;"><b>Code</b></td>
                                        <td colspan="1" style="border:2px solid black;"><b>Type</b></td>
                                        <td colspan="1" style="border:2px solid black;"><b>UM</b></td>
                                        <td colspan="2"><b></b></td>
                                        <td style="border:2px solid black;width:60px"><b>Loc</b></td>
                                        <td style="border:2px solid black;width:45px"><b>Expiry</b></td>
                                        <td style="border:2px solid black;"><b>Amount</b></td>
                                        <td style="border:2px solid black;"><b>Amount</b></td>
                                        <td style="border:2px solid black;"><b>Amount</b></td>
                                        <td style="border:2px solid black;"><b>Amount</b></td>
                                    </tr>
                                </table>
            <br>
                                <table class="data1" style="border:2px solid black;display:inline-block;width:100%;padding-top:0px;font-family:arial;">
                                    '.$data_tr.'
                                </table>
                            </div>
                            <br>
                            <br>
                            
                                <br>
                            
                            <table class="secondlast" style="border:3px solid black;display:inline-block;width:100%;font-family:arial;" >
                                <tr style="">
                                    <td rowspan="6" style="padding-bottom:0px;"><img width="100%" height="170px" src="../uploads/um_part1.jpg"></td>
                                    <td style="width:168px;font-size:13px;padding-left:40px"><b>Sub Total </b></td>
                                    <td style="width:55px;padding-bottom:0px"></td>
                                    <td style="width:100px;padding-bottom:0px;border:2px solid black;text-align:right;height:10px"><p style="font-size:12px;">'.number_format($total_amt,2).'</p></td>
                                </tr>
                                <tr>
                                    <td style="width:168px;font-size:13px;padding-left:40px"><b>Add: Itax Amt</b></td>
                                    <td  style="width:55px;padding-bottom:0px;"><p style="border:0px solid black;width:55px;padding-bottom:20px">&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;</p></td>    
                                    <td style="width:100px;padding-bottom:0px;border:2px solid black;text-align:right;height:10px"><p style="font-size:12px;">'.number_format($itax_rate,2).'</p></td>
                                </tr>
                                
                                <tr>
                                    <td style="width:168px;font-size:13px;padding-left:40px"><b>Add: Others</b></td>
                                        <td style="width:55px;padding-bottom:0px" ></td>
                                        <td style="width:100px;padding-bottom:0px;border:2px solid black;text-align:right;height:10px"><p style="font-size:12px;">'.number_format($charge_amt,2).'</p></td>
                                        </tr>
                                <tr>
                                    <td style="width:168px;font-size:13px;padding-left:40px"><b>Less: Freight</b></td>
                                        <td style="width:55px;padding-bottom:0px" ></td>
                                    <td style="width:100px;padding-bottom:0px;border:2px solid black;text-align:right;height:10px"><p style="font-size:12px;">'.number_format($other_charges,2).'</p></td>
                                </tr>
                                <tr>
                                    <td style="width:168px;font-size:13px;padding-left:40px"><b>Less: Fur Disc</b></td>
                                        <td style="width:55px;padding-bottom:0px" ></td>
                                    <td style="width:100px;padding-bottom:0px;border:2px solid black;text-align:right;height:10px"><p style="font-size:12px;">'.number_format($other_ded,2).'</p></td>
                                </tr>

                                <tr>
                                    <td style="width:168px;font-size:13px;padding-left:40px"><b>Net Amount</b></td>
                                        <td style="width:55px;padding-bottom:0px" ></td>
                                    <td style="width:100px;padding-bottom:0px;border:2px solid black;text-align:right;height:10px"><p style="font-size:13px;font-weight:bold;">'.number_format($total_net_amt,2).'</p></td>
                                </tr>
                                    

                                </table>
                        
                            
                    </div>
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




