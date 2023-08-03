<?php
session_start();
include("../api/auth/db.php");
require_once __DIR__  . '/vendor/autoload.php';
require_once __DIR__ . '/../helpers/helpers.php';

// $barcode = new Helpers();
if (isset($_GET['action']) && $_GET['action'] == 'print') {
    // print_r($_GET);
    // die(); 
$division_code = $_GET['division_code'];
$from_date = $_GET['from_date'];
$to_date = $_GET['to_date'];
$type = $_GET['type'];
$type = strtoupper($type);
$company_code = $_GET['company_code'];
            $sql = "SELECT CO_CODE,DOC_YEAR,DOC_TYPE,DOC_NO,DOC_DATE,DO_KEY,REFNUM2,PARTY_CODE,PARTY_NAME,TOTAL_GROSS_AMT,
            STAX_AMT,ADDTAX_AMT,CHARGE_AMT,OTHER_CHRGS,OTHER_DED,TOTAL_NET_AMT,
            ITEM_CODE,ITEM_NAME_SALE,TYPE_NAME,QTY,RATE,AMT,DISC_RATE,DISC_AMT,AUDIT_NET_AMT NET_AMT,
            DIV_NAME,LOC_NAME,PO_CATG,ENTRY_NO,sman_code,sman_name,itax_amt,itax_rate,CRDAYS,GL_code
            FROM DC_UM_VIEW_NEW
            WHERE DOC_DATE BETWEEN '$from_date' AND '$to_date'
            AND CO_CODE   = '$company_code'
            AND PO_CATG   = '$type'
            AND DIV_CODE  = '$division_code'
            ORDER BY CO_CODE,DOC_YEAR,DOC_NO,ENTRY_NO";
            $result = $conn->query($sql);
    // print_r($sql);
    // die();
    $return_data = [];
    $do_key = 0;
    $data_tr='';
    $data_tr2='';
    $data_tr3='';
    $data_tr4='';
    $i=1;
    while ($show = mysqli_fetch_assoc($result)) {
        $return_data = $show;
        // $i = 1;
        // print_r($i);
        // $i++;
        // print_r($show['do_key']);


        if (($do_key != $show['do_key'])) {
            if ($i == 1) {

            } else {
                $data_tr .= ' 
                <tr>
                        <td  style="width:10%;;height:30px"></td>
                        <td  style="width:30%;height:30px;font-size:14px"><b>DOCUMENT TOTAL</b></td>
                        <td  style="width:15%;height:30px"></td>
                        <td  style="width:10%;height:30px;font-size:14px;">145654651354</td>
                        <td  style="width:10%;height:30px"></td>
                        <td  style="width:10%;height:30px;font-size:14px;">464</td>
                        <td  style="width:10%;height:30px"></td>
                        <td  style="width:12%;height:30px;font-size:14px;">54654</td>
                        <td  style="width:10%;height:30px;font-size:14px;">654</td>
                        <td  style="width:12%;height:30px"></td>
                </tr>
                  ';
            }   
    
            $i = $i + 1;
            $do_key = $show['do_key'];




            $data_tr2 .= ' <tr>
                        <td style="border:2px solid black;height:35px">1313</td>
                        <td style="border:2px solid black;height:35px">131423232323232323232323233</td>
                        <td style="border:2px solid black;height:35px">1313</td>
                        <td style="border:2px solid black;height:35px">1313</td>
                        <td style="border:2px solid black;height:35px">1313</td>
                        <td style="border:2px solid black;height:35px">1313</td>
                        <td style="border:2px solid black;height:35px">1313</td>
                        <td style="border:2px solid black;height:35px">1313</td>
                        </tr>
                        <tr>
                        <td style="border:2px solid black;height:35px">1313</td>
                        <td style="border:2px solid black;height:35px">131423232323232323232323233</td>
                        <td style="border:2px solid black;height:35px">1313</td>
                        <td style="height:35px"></td>
                        <td style="border:2px solid black;height:35px">1313</td>
                        <td style="border:2px solid black;height:35px">1313</td>
                        <td style="border:2px solid black;height:35px">1313</td>
                        <td style="height:35px"></td>
                        </tr>
                        ';
            $data_tr3 .= '  
                                <tr style="padding-top:55px;text-align:center;">
                                <th  style="width:10%;font-size:14px;font-weight:bold;text-align:center;height:50px">Code</th>
                                <th  style="width:30%;font-size:14px;font-weight:bold;text-align:center;height:50px">Item description</th>
                                <th  style="width:15%;font-size:14px;font-weight:bold;text-align:center;height:50px">Type</th>
                                <th  style="width:10%;font-size:14px;font-weight:bold;text-align:center;height:50px">Qty</th>
                                <th  style="width:10%;font-size:14px;font-weight:bold;text-align:center;height:50px">Rate</th>
                                <th  style="width:10%;font-size:14px;font-weight:bold;text-align:center;height:50px">Amt</th>
                                <th  style="width:10%;font-size:14px;font-weight:bold;text-align:center;height:50px">Disc%</th>
                                <th  style="width:12%;font-size:14px;font-weight:bold;text-align:center;height:50px">Disc Amt</th>
                                <th  style="width:10%;font-size:14px;font-weight:bold;text-align:center;height:50px">Net Amt</th>
                                <th  style="width:12%;font-size:14px;font-weight:bold;text-align:center;height:50px">Loc Name</th>
                            </tr>
                           
                          ';
           



            

        }     
           
        $data_tr4 .= ' 
        <tr>
        <td  style="width:10%;border:2px solid black;height:30px">abcd ceck</td>
        <td  style="width:30%;border:2px solid black;height:30px">abcd ceck</td>
        <td  style="width:15%;border:2px solid black;height:30px">abcd ceck</td>
        <td  style="width:10%;border:2px solid black;height:30px">abcd ceck</td>
        <td  style="width:10%;border:2px solid black;height:30px">abcd ceck</td>
        <td  style="width:10%;border:2px solid black;height:30px">abcd ceck</td>
        <td  style="width:10%;border:2px solid black;height:30px">abcd ceck</td>
        <td  style="width:12%;border:2px solid black;height:30px">abcd ceck</td>
        <td  style="width:10%;border:2px solid black;height:30px">abcd ceck</td>
        <td  style="width:12%;border:2px solid black;height:30px">abcd ceck</td>
    </tr>
           
          ';
         
         // die();
        
        // die();
    }



   
    $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
    $stylesheet = file_get_contents('bill_invoice.css');
    $mpdf->WriteHTML($stylesheet, 1);
            $mpdf->WriteHTML(
                '<div class="row" style="line-height:16px;">
                    <div class="main-heading">
                        <table class="secondlast" style="width:100%;border-collapse:collapse;margin-top:20px;">
                            <tr>
                                <td style="width:250px;font-size:20px;font-family:arial;text-align:center;"></td>                                   
                            </tr>
                            <tr>
                            <td style="border-bottom:3px solid black;width:100px;font-size:15px;text-align:left;font-weight:bold;padding-top:8px;">SYNTHETIC FIBER PVT LIMITED &emsp; Period &emsp;  19/78/2023 &emsp;&emsp;&emsp;&emsp; thursday,january 12</td>    
                          
                            </tr>
                           
                        </table>
                    </div>
                    
                    <div class="invoice_detail" style="padding-top:20px;height:100px;">
                        <table class="abcd" style="display:inline-block;height:1200px;white-space:nowrap;width:100%;">
                                
                            <tr>
                                <td style="height:3px;"></td>
                            </tr>
                            <tr style="padding-top:55px;text-align:center;">
                                <th  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;"><b>date</b></th>
                                <th  style="width:30%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;"><b>voucher no</b></th>
                                <th  style="width:15%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;"><b>catg</b></th>
                                <th  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;"><b>gross amt</b></th>
                                <th  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;"><b>saletax amt</b></th>
                                <th  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;"><b>other charges</b></th>
                                <th  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;"><b>freight amt</b></th>
                                <th  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;"><b>net amt</b></th>
                            </tr>
                            <tr style="padding-top:55px;text-align:center;">
                                <th  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;">Computer#</th>
                                <th  style="width:30%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;">party name</th>
                                <th  style="width:15%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;">div name</th>
                                <th  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;"></th>
                                <th  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;">add stax amt</th>
                                <th  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;"></th>
                                <th  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;">discount</th>
                                <th  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;"></th>
                            </tr>
                            <tr>
                            <td style="height:3px;"></td>
                        </tr>
                        <tr>
                            <td colspan="10" style="border-bottom:5px solid black;"></td>
                        </tr>
                        <tr>
                            <td style="height:5px;"></td>
                        </tr>
                       
                            
                            '.$data_tr2.'
                            
                            
                       
                         
                        </table>
                        <table style="width:100%">
                        '.$data_tr3.'
                        '.$data_tr4.'

                        '.$data_tr.'
                        </table>

                       
                        <table style="white-space:nowrap;width:100%;">
                            
                            
                            </table>
                        <table>
                            
                       
                            
                            </table>
                       
                    </div>
                
                    
                    
                   
            
        
            <div class=""  style="height:100px">
                <div style = "margin-top:70px;">
                    <span style = "font-weight: bold;border-top:2px solid black;">&emsp;&emsp; Prepared By &emsp;&emsp;</span>
                    
                    <span>&nbsp;</span>
                    <span style = "font-weight: bold;border-top:2px solid black;"> &emsp;&emsp; Checked By &emsp;&emsp;</span>
                    <span>&nbsp;</span>
                    <span style = "font-weight: bold;border-top:2px solid black;"> &emsp;&emsp; Authorized By &emsp;&emsp;</span>
                    <span>&nbsp;</span>
                    <span style = "font-weight: bold;border-top:2px solid black;"> &emsp;&emsp; Receiver &emsp;&emsp;</span>
                </div>
            </div>
        </div>',2);         
        $mpdf->Output();
// }
// //         }
    // }else {
    //     echo "form no required";
    // }
}else {
    echo "action not matched";
}
// die();
?>

