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
$company_code = $_GET['company_code'];
            $sql = "SELECT a.CO_CODE,a.DOC_YEAR,a.DOC_TYPE,a.DOC_NO,a.DOC_DATE,a.DO_KEY,a.REFNUM2,a.PARTY_CODE,a.PARTY_NAME,a.TOTAL_GROSS_AMT,
            a.STAX_AMT,a.ADDTAX_AMT,a.CHARGE_AMT,a.OTHER_CHRGS,a.OTHER_DED,a.TOTAL_NET_AMT,
            a.ITEM_CODE,a.ITEM_NAME_SALE,a.TYPE_NAME,a.QTY,RATE,a.AMT,a.DISC_RATE,a.DISC_AMT,a.AUDIT_NET_AMT,a.NET_AMT,
            a.DIV_NAME,a.LOC_NAME,a.PO_CATG,a.ENTRY_NO,a.sman_code,a.sman_name,a.itax_amt,a.itax_rate,a.CRDAYS,a.GL_code,b.co_name
            FROM DC_UM_VIEW_NEW a inner join company b on a.co_code=b.co_code
            WHERE a.DOC_DATE BETWEEN '$from_date' AND '$to_date'
            AND a.CO_CODE   = '$company_code'
            AND a.PO_CATG   = '$type'
            AND a.DIV_CODE  = '$division_code'
            ORDER BY a.CO_CODE,a.DOC_YEAR,a.DOC_NO,a.ENTRY_NO";
            $result = $conn->query($sql);

            
    // print_r($sql);
    // die();
    
    









    $return_data = [];
    $do_key = 0;
    $data_tr='';
    $data_tr2='';
    $data_tr3='';
    $i=1;
    $QTYTOTAL = 0;
    $AMTTOTAL = 0;
    $DISCAMTTOTAL = 0;
    $NETAMTTOTAL =  0;
    while ($show = mysqli_fetch_assoc($result)) {
        $return_data = $show;

        // $i = 1;
        $co_name = $show['co_name'];
        $CO_CODE = $show['co_code'];
    $DOC_YEAR = $show['doc_year'];
    $DOC_TYPE = $show['doc_type'];
    $DOC_NO = $show['doc_no'];
    $DOC_DATE = $show['doc_date'];
    $DO_KEY = $show['do_key'];
    $REFNUM2 = $show['REFNUM2'];
    $PARTY_CODE = $show['party_code'];
    $PARTY_NAME = $show['PARTY_NAME'];
    $TOTAL_GROSS_AMT = $show['total_gross_amt'];
    $STAX_AMT = $show['stax_amt'];
    $ADDTAX_AMT = $show['addtax_amt'];
    $CHARGE_AMT = $show['charge_amt'];
    $OTHER_CHRGS = $show['other_chrgs'];
    $OTHER_DED = $show['other_ded'];
    $TOTAL_NET_AMT = $show['total_net_amt'];
    $ITEM_CODE = $show['item_code'];
    $ITEM_NAME_SALE = $show['ITEM_NAME_sale'];
    $TYPE_NAME = $show['TYPE_NAME'];
    $QTY = $show['qty'];
    $RATE = $show['rate'];
    $AMT = $show['amt'];
    $DISC_RATE = $show['disc_rate'];
    $DISC_AMT = $show['disc_amt'];
    $AUDIT_NET_AMT = $show['audit_net_amt'];
    $NET_AMT = $show['net_amt'];
    $DIV_NAME = $show['div_name'];
    $LOC_NAME = $show['loc_name'];
    $PO_CATG = $show['po_catg'];
    $SMAN_CODE = $show['sman_code'];
    $SMAN_NAME = $show['sman_name'];
    $ITAX_AMT = $show['itax_amt'];
    $ITAX_RATE = $show['itax_rate'];
    $CRDAYS = $show['crdays'];
    $GL_CODE = $show['GL_CODE'];

        // print_r($i);
        // $i++;
        // print_r($show['do_key']);


        if (($do_key != $show['do_key'])) {
            if ($i == 1) {

            } else {
                $data_tr .= ' <table style="width:100%;border:2px solid black;">
                <tr>
              
                        <td  style="width:10%;height:30px;"></td>
                        <td  style="width:30%;height:30px"><b>DOCUMENT TOTAL</b></td>
                        <td  style="width:15%;height:30px"></td>
                        <td  style="width:10%;height:30px"></td>
                        <td  style="width:10%;height:30px">'.NUMBER_FORMAT($QTYTOTAL,2).'</td>
                        <td  style="width:10%;height:30px">'.NUMBER_FORMAT($AMTTOTAL,2).'</td>
                        <td  style="width:10%;height:30px"></td>
                        <td  style="width:12%;height:30px">'.NUMBER_FORMAT($DISCAMTTOTAL,2).'</td>
                        <td  style="width:10%;height:30px">'.NUMBER_FORMAT($NETAMTTOTAL,2).'</td>
                        <td  style="width:12%;height:30px"></td>
                </tr>

                
                
                
                
                
                </table><br><br>
                  ';
                $QTYTOTAL = 0;
                  $AMTTOTAL = 0;
                  $DISCAMTTOTAL =0;
                  $NETAMTTOTAL = 0;

            }   
    
            $i = $i + 1;
            $do_key = $show['do_key'];




            $data_tr .= '<br><table style="width:100%;"> <tr>
                        <td style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;">'.$DOC_DATE .'</td>
                        <td style="width:30%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;">'.$REFNUM2 .'</td>
                        <td style="width:15%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;">'.$PO_CATG .'</td>
                        <td style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;">'.NUMBER_FORMAT($TOTAL_GROSS_AMT,2) .'</td>
                        <td style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;">'.NUMBER_FORMAT($STAX_AMT,2) .'</td>
                        <td style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;">'.NUMBER_FORMAT($CHARGE_AMT,2) .'</td>
                        <td style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;">'.NUMBER_FORMAT($OTHER_CHRGS,2) .'</td>
                        <td style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;">'.NUMBER_FORMAT($TOTAL_NET_AMT,2) .'</td>
                        </tr>
                        <tr>
                        <td style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;">'.$DO_KEY .'</td>
                        <td style="width:30%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;">'.$PARTY_NAME .'</td>
                        <td style="width:15%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;">'.$DIV_NAME .'</td>
                        <td style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;"></td>
                        <td style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;">'.NUMBER_FORMAT($ADDTAX_AMT,2) .'</td>
                        <td style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;"></td>
                        <td style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;">'.NUMBER_FORMAT($OTHER_DED,2) .'</td>
                        <td style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;"></td>
                        </tr>
                        <tr style="width:100%;"></tr>
                        <tr style="width:100%;"></tr>
                        <tr style="width:100%;"></tr>
                        <tr style="width:100%;"></tr>
                        <tr style="width:100%;"></tr>
                        <tr style="width:100%;"></tr>
                        </table>
                        ';
            $data_tr .= '  <table style="white-space: nowrap;width:100%;">
                            <tr>
                                <th  style="width:10%;border:2px solid black;height:30px">Code</th>
                                <th  style="width:30%;border:2px solid black;height:30px">Item description</th>
                                <th   style="width:15%;border:2px solid black;height:30px">Type</th>
                                <th   style="width:10%;border:2px solid black;height:30px">Qty</th>
                                <th   style="width:10%;border:2px solid black;height:30px">Rate</th>
                                <th   style="width:10%;border:2px solid black;height:30px">Amt</th>
                                <th   style="width:10%;border:2px solid black;height:30px">Disc%</th>
                                <th   style="width:12%;border:2px solid black;height:30px">Disc Amt</th>
                                <th   style="width:10%;border:2px solid black;height:30px">Net Amt</th>
                                <th   style="width:12%;border:2px solid black;height:30px">Loc Name</th>
                            </tr>
                            <tr style="width:100%;"></tr>
                        <tr style="width:100%;"></tr>
                        <tr style="width:100%;"></tr>
                        <tr style="width:100%;"></tr>
                        <tr style="width:100%;"></tr>
                        <tr style="width:100%;"></tr>
                           </table>
                          ';
           



            

        }     
           
        $data_tr .= ' <table style="white-space: nowrap;width:100%;">
        <tr>
        <td  style="width:10%;border:2px solid black;height:30px">'.$ITEM_CODE .'</td>
        <td  style="width:30%;border:2px solid black;height:30px">'.$ITEM_NAME_SALE .'</td>
        <td  style="width:15%;border:2px solid black;height:30px">'.$TYPE_NAME .'</td>
        <td  style="width:10%;border:2px solid black;height:30px;text-align:right">'.NUMBER_FORMAT($QTY,2) .'</td>
        <td  style="width:10%;border:2px solid black;height:30px;text-align:right">'.NUMBER_FORMAT($RATE,2) .'</td>
        <td  style="width:10%;border:2px solid black;height:30px;text-align:right">'.NUMBER_FORMAT($AMT,2) .'</td>
        <td  style="width:10%;border:2px solid black;height:30px;text-align:right">'.NUMBER_FORMAT($DISC_RATE,2) .'</td>
        <td  style="width:12%;border:2px solid black;height:30px;text-align:right">'.NUMBER_FORMAT($DISC_AMT,2) .'</td>
        <td  style="width:10%;border:2px solid black;height:30px;text-align:right">'.NUMBER_FORMAT($NET_AMT,2) .'</td>
        <td  style="width:12%;border:2px solid black;height:30px">'.$LOC_NAME .'</td>
    </tr>
    <tr style="width:100%;"></tr>
                        <tr style="width:100%;"></tr>
                        <tr style="width:100%;"></tr>
                        <tr style="width:100%;"></tr>
                        <tr style="width:100%;"></tr>
                        <tr style="width:100%;"></tr>
    </table>

           
          ';
          
    $QTYTOTAL = $QTYTOTAL + $show['rate'];
    $qtyreport = $qtyreport + $show['rate'];
    $AMTTOTAL = $AMTTOTAL + $show['amt'];
    $amtreport = $amtreport + $show['amt'];
    $DISCAMTTOTAL = $DISCAMTTOTAL + $show['disc_amt'];
    $discreport = $discreport + $show['disc_amt'];
    $NETAMTTOTAL = $NETAMTTOTAL + $show['net_amt'];
    $netreport = $netreport + $show['net_amt'];
         
         // die();
        
        // die();
    }
    // print_r($data_tr);
    // die();



   
    $data_tr .= ' <table style="width:100%;border:2px solid black;">
    <tr>
  
            <td  style="width:10%;height:30px;"></td>
            <td  style="width:30%;height:30px"><b>DOCUMENT TOTAL</b></td>
            <td  style="width:15%;height:30px"></td>
            <td  style="width:10%;height:30px"></td>
            <td  style="width:10%;height:30px;text-align:right">'.NUMBER_FORMAT($QTYTOTAL,2).'</td>
            <td  style="width:10%;height:30px;text-align:right">'.NUMBER_FORMAT($AMTTOTAL,2).'</td>
            <td  style="width:10%;height:30px"></td>
            <td  style="width:12%;height:30px;text-align:right">'.NUMBER_FORMAT($DISCAMTTOTAL,2).'</td>
            <td  style="width:10%;height:30px;text-align:right">'.NUMBER_FORMAT($NETAMTTOTAL,2).'</td>
            <td  style="width:12%;height:30px"></td>
    </tr>

    
    
    
    
    
    </table><br><br>
      ';
      $data_tr .= ' <table style="width:100%;border:2px solid black;">
      <tr>
    
              <td  style="width:10%;height:30px;"></td>
              <td  style="width:30%;height:30px"><b>REPORT TOTAL</b></td>
              <td  style="width:15%;height:30px"></td>
              <td  style="width:10%;height:30px"></td>
              <td  style="width:10%;height:30px;text-align:right">'.NUMBER_FORMAT($qtyreport,2).'</td>
              <td  style="width:10%;height:30px;text-align:right">'.NUMBER_FORMAT($amtreport,2).'</td>
              <td  style="width:10%;height:30px"></td>
              <td  style="width:12%;height:30px;text-align:right">'.NUMBER_FORMAT($discreport,2).'</td>
              <td  style="width:10%;height:30px;text-align:right">'.NUMBER_FORMAT($netreport,2).'</td>
              <td  style="width:12%;height:30px"></td>
      </tr>

    
      
      
      
      
      </table>
        ';
            $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
            date_default_timezone_set("Asia/Karachi"); 
            $today = date("l j F, Y");
            $mpdf->WriteHTML(
                '<div class="row" style="line-height:16px;">
                    <div class="main-heading">
                        <table class="secondlast" style="width:100%;border-collapse:collapse;margin-top:20px;">
                            <tr>
                                <td style="width:250px;font-size:20px;font-family:arial;text-align:center;"></td>                                   
                            </tr>
                            <tr>
                            <td style="border-bottom:3px solid black;width:100px;font-size:15px;text-align:left;font-weight:bold;padding-top:8px;">'.$co_name.' &emsp; Period &emsp;'.date('d-m-Y', strtotime($from_date)).' - '.date('d-m-Y', strtotime($to_date)).' &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; '.$today.'</td>    
                          
                            </tr>
                           
                        </table>
                    </div>
                    
                    <div class="invoice_detail" style="padding-top:20px;height:100px;">
                        <table  style="width:100%;white-space: nowrap;">
                                
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
                            
                        </table>
                           
                            '.$data_tr.'
                    
                       
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

