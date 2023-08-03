<?php
session_start();
include("../api/auth/db.php");
require_once __DIR__  . '/vendor/autoload.php';
require_once __DIR__ . '/../helpers/helpers.php';


$barcode = new Helpers();
if (isset($_GET['action']) && $_GET['action'] == 'print') {
    //     // print_r($_GET);
//     // die(); 
    $item_code = $_GET['item_code'];
    $company_code = $_GET['company_code'];
    $company_name = $_GET['company_name'];
    $party_code = $_GET['party_code'];
    $catg = $_GET['catg'];
    $mode = $_GET['mode'];
    $from_date = $_GET['from_date'];
    $to_date = $_GET['to_date'];

    if($party_code == 'null' ){
        $merge_for_party = "";
    }
    else{
    $merge_for_party = " AND party_code  = '$party_code' ";
    }
    if($item_code == 'null' ){
        $merge_for_item = "";
    }
    else{
    $merge_for_item = " AND item_code = '$item_code' ";
    }

    if($catg == 'ALL' ){
        $merge_for_catg = "";
    }
    else{
    $merge_for_catg = " AND item_cat =  '$catg' ";
    }

    if($mode == 'ALL' ){
        $merge_for_mode = "";
    }
    else{
    $merge_for_mode = " AND pur_mode =  '$mode' ";
    }
//     $company_code = $_GET['company_code'];
    $sql = "SELECT DOC_TYPE,DOC_NO,DOC_DATE,DO_KEY,PARTY_CODE,PARTY_NAME,ITEM_CODE,ITEM_NAME,PUR_MODE,ITEM_CAT,
    UM_NAME,ITEM_TYPE,TYPE_NAME,SALE_QTY,RET_QTY,RATE,SALE_AMT,RET_AMT,DISC_RATE,LOC_CODE,GL_NAME
    FROM NET_SALE_VIEW
    where co_code = '$company_code'
    $merge_for_party
    $merge_for_item
    $merge_for_catg
    $merge_for_mode
    and doc_date between '$from_date' and '$to_date'
    order by party_code,item_code,doc_date";
    //     print_r($sql);
    // die();
    $result = $conn->query($sql);
    $return_data = []; 
    $data_tr='';
    $PARTY_CODE=0;
    $i=1;
    $checkparty=0;
    $partyqty = 0;
    $partytotal = 0;
    $NETPARTY=0;
    $RETtotal=0;
    $pqtytotal=0;
$pamttotal=0;
$reportqty =0;
$reportamt =0;
        while ($show = mysqli_fetch_assoc($result)) {
            $return_data = $show;

            // $i = 1;
            $DOC_TYPE = $show['DOC_TYPE'];
            $DOC_NO = $show['DOC_NO'];
            $DOC_DATE = $show['DOC_DATE'];
            $DO_KEY = $show['DO_KEY'];
            $PARTY_CODE = $show['PARTY_CODE'];
            $PARTY_NAME = $show['PARTY_NAME'];
            $PARTY_NAME = strtoupper($PARTY_NAME);
            $ITEM_CODE = $show['ITEM_CODE'];
            $ITEM_NAME = $show['ITEM_NAME'];
            $PUR_MODE = $show['PUR_MODE'];
            $ITEM_CAT= $show['ITEM_CAT'];
            $UM_NAME = $show['UM_NAME'];
            $ITEM_TYPE = $show['ITEM_TYPE'];
            $TYPE_NAME = $show['TYPE_NAME'];
            $SALE_QTY = $show['SALE_QTY'];
            $RET_QTY = $show['RET_QTY'];
            $RATE = $show['RATE'];
            $SALE_AMT = $show['SALE_AMT'];
            $RET_AMT = $show['RET_AMT'];
            $DISC_RATE = $show['DISC_RATE'];
            $LOC_CODE = $show['LOC_CODE'];
            $GL_NAME = $show['GL_NAME'];
            

                if (($checkparty != $show['ITEM_CODE'])) {
                    
                    if($i == 1){
                        $data_tr .= '  <br> <table style="width:100%;">
                             <tr>
                                 <td  style="width:30%;height:30px"><b>'.$ITEM_NAME.'</b></td>
                                 <td  style="width:10%;height:30px"> </td>
                                 <td   style="width:10%;height:30px"><b>'.$ITEM_CODE.'</b></td>
                                 <td   style="width:10%;height:30px"></td>
                                 <td   style="width:10%;height:30px"></td>
                                 <td   style="width:10%;height:30px"></td>
                                 <td   style="width:10%;height:30px"> </td>
                                 <td   style="width:10%;height:30px"> </td>
                             </tr></table>
                            
                         ';
                    

                    }else{
                        
                        $data_tr .= '  <br><table style="width:100%;border:2px solid black;">
                        <tr>
                    
                        <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b></td>
                        <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b></td>
                        <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b></td>
                        <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b></td>
                        <td  colspan="2" style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b>PARTY / ITEM TOTAL</b></td>
                        <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b>'.number_format($pqtytotal,2). '</b></td>
                        <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b>'.number_format($pamttotal,2). '</b></td>
                        <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b> </b></td>
                        <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b> </b></td>
                        </tr>
                        <tr>
                    
                        <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b></td>
                        <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b></td>
                        <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b></td>
                        <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b></td>
                        <td  colspan="2" style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b>NET SALES BY ITEM</b></td>
                        <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b></td>
                        <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b></td>
                        <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b> </b></td>
                        <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b>'.number_format($NETSALEITEM,2). '</b></td>
                        </tr>
                        
                        
                        
                        
                        </table>
                        

                        <br><br>
                        ';
                        $pqtytotal = 0;
                          $pamttotal = 0;
                          $RETtotal=0;
                          $NETSALEITEM = 0;
                          $data_tr .= '  <br> <table style="width:100%;">
                          <tr>
                              <td  style="width:30%;height:30px"><b>'.$ITEM_NAME.'</b></td>
                              <td  style="width:10%;height:30px"> </td>
                              <td   style="width:10%;height:30px"><b>'.$ITEM_CODE.'</b></td>
                              <td   style="width:10%;height:30px"></td>
                              <td   style="width:10%;height:30px"></td>
                              <td   style="width:10%;height:30px"></td>
                              <td   style="width:10%;height:30px"> </td>
                              <td   style="width:10%;height:30px"> </td>
                          </tr></table>
                         
                      ';
                        
                        

                    }   
                    // $i = $i + 1;
                    // $checkparty = $show['PARTY_CODE'];
                    $i = $i + 1;
                    $checkparty = $show['ITEM_CODE'];

                    






                    

                }   
                $data_tr .= '   <table style="width:100%;">
                            <tr>
                                <th  style="width:10%;border:2px solid black;height:30px">'.$DOC_TYPE.'</th>
                                <th  style="width:10%;border:2px solid black;height:30px">'.$DOC_DATE.' </th>
                                <th   style="width:10%;border:2px solid black;height:30px">'.$DOC_NO.'</th>
                                <th   style="width:10%;border:2px solid black;height:30px">'.$PUR_MODE.'</th>
                                <th   style="width:10%;border:2px solid black;height:30px">'.$ITEM_CAT.'</th>
                                <th   style="width:10%;border:2px solid black;height:30px">'.$ITEM_TYPE.'</th>
                                <th   style="width:10%;border:2px solid black;height:30px">'.number_format($RATE,2).' </th>
                                <th   style="width:10%;border:2px solid black;height:30px">'.number_format($SALE_QTY,2).' </th>
                                <th   style="width:10%;border:2px solid black;height:30px">'.number_format($DISC_RATE,2).' </th>
                                <th   style="width:10%;border:2px solid black;height:30px"> '.number_format($SALE_AMT,2).'</th>
                                <th   style="width:10%;border:2px solid black;height:30px">'.number_format($RET_QTY,2).' </th>
                                <th   style="width:10%;border:2px solid black;height:30px"> '.number_format($RET_AMT,2).'</th>
                            </tr>
                           
                    
                            </table>
                            
                        ';
                        $pqtytotal = $pqtytotal + $show['SALE_QTY'];
                        $pamttotal = $pamttotal + $show['SALE_AMT'];
                        $partyqty = $partyqty + $show['SALE_QTY'];
                        $partytotal = $partytotal + $show['SALE_AMT'];
                        
                        $RETtotal = $RETtotal + $show['RET_AMT'];
                        $NETSALEITEM = $pamttotal - $RETtotal;
                        // print_r($show['SALE_AMT']);   
                        
                        $reportqty = $reportqty + $show['SALE_QTY'];
                        $reportamt = $reportamt + $show['SALE_AMT'];
                    }
                    $NETPARTY = $NETPARTY + $NETSALEITEM;
                    // print_r($NETPARTY);print_r('SDA');
                    // DIE();
        $data_tr .= ' <table style="width:100%;border:2px solid black;">

        <tr>
        <td  style="width:10%;height:30px"></td>
        <td  style="width:10%;height:30px"></td>
        <td   style="width:10%;height:30px"></td>
        <td   style="width:10%;height:30px"></td>
        <td   style="width:12%;height:30px"> </td>
        <td   style="width:10%;height:30px;text-align:right"><b>PARTY/ITEM</b></td>
        <td   style="width:10%;height:30px;text-align:left"><b> TOTAL</b></td>
        <td   style="width:10%;height:30px;text-align:right"><b>'.number_format($partyqty,2). '</b></td>
        <td   style="width:10%;height:30px"> </td>
        <td   style="width:10%;height:30px;text-align:right"> <b>'.number_format($partytotal,2). '</b></td>
        <td   style="width:10%;height:30px"> </td>
        <td   style="width:10%;height:30px"></td>
    </tr>

        </table>

       
        ';
        $data_tr .= ' <table style="width:100%;border:2px solid black;">
        </tr>
        <tr>
        <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b></td>
        <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b></td>
        <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b></td>
        <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b></td>
        <td  colspan="2" style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b>NET SALES BY ITEM</b></td>
        <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b></td>
        <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b></td>
        <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b> </b></td>
        <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b>'.number_format($NETSALEITEM,2). '</b></td>
        
       
        </table>
        <br><br>
       
        ';
        $data_tr .= ' <table style="width:100%;border:2px solid black;">
        <tr>
        <td  style="width:10%;height:30px"></td>
        <td  style="width:10%;height:30px"></td>
        <td   style="width:10%;height:30px"></td>
        <td   style="width:10%;height:30px"></td>
        <td   style="width:12%;height:30px"> </td>
        <td   style="width:10%;height:30px;text-align:right"><b>PARTY</b></td>
        <td   style="width:10%;height:30px;text-align:left"><b> TOTAL</b></td>
        <td   style="width:10%;height:30px;text-align:right"><b>'.number_format($partyqty,2). '</b></td>
        <td   style="width:10%;height:30px"> </td>
        <td   style="width:10%;height:30px;text-align:right"> <b>'.number_format($partytotal,2). '</b></td>
        <td   style="width:10%;height:30px"> </td>
        <td   style="width:10%;height:30px"></td>
    </tr></table>
        

       
            
        ';
        $data_tr .= ' 
        <table style="width:100%;border:2px solid black;">
        </tr>
        <tr>
        <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b></td>
        <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b></td>
        <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b></td>
        <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b></td>
        <td  colspan="2" style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b>NET SALES BY PARTY</b></td>
        <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b></td>
        <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b></td>
        <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b> </b></td>
        <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b>'.number_format($NETPARTY,2). '</b></td>
        
       
       
        </table>
        <br><br>
       
        ';

            $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
            $mpdf->WriteHTML(
                '<div class="row" style="line-height:16px;">
                    <div class="main-heading">
                        <table class="secondlast" style="width:100%;border-collapse:collapse;margin-top:20px;">
                            <tr>
                                <td style="width:250px;font-size:20px;font-family:arial;text-align:center;"></td>                                   
                            </tr>
                           
                            <tr>
                            <td style="border-bottom:3px solid black;width:100px;font-size:15px;text-align:left;font-weight:bold;padding-top:8px;">'.$company_name.' &emsp; FROM DATE &emsp; '.date("d/m/Y", strtotime($from_date)).' &emsp; - &emsp; TO DATE &emsp;'.date("d/m/Y", strtotime($to_date)).' &emsp;&emsp;  &emsp;&emsp;&emsp;&emsp;  <b> </b></td>    
                          
                            </tr>
                           
                        </table>
                    </div>
                    
                    <div class="invoice_detail" style="padding-top:20px;height:100px;">
                        <table  style="width:100%;white-space: nowrap;">
                                
                            <tr>
                                <td style="height:3px;"></td>
                            </tr>
                            <tr style="padding-top:55px;text-align:center;">
                                <th  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:1px solid black;"><b>DERT</b></th>
                                <th  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:1px solid black;"><b>DATE</b></th>
                                <th  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:1px solid black;"><b>DOC#</b></th>
                                <th  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:1px solid black;"><b>MODE</b></th>
                                <th  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:1px solid black;"><b>CATG</b></th>
                                <th  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:1px solid black;"><b>LOC TYPE</b></th>
                                <th  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:1px solid black;"><b>RATE</b></th>
                                <th  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:1px solid black;"><b>SALE QTY</b></th>
                                <th  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:1px solid black;"><b>DISC%</b></th>
                                <th  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:1px solid black;"><b>SALE AMT</b></th>
                                <th  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:1px solid black;"><b>RET QTY</b></th>
                                <th  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:1px solid black;"><b>RET AMT</b></th>
                            </tr>
                           
                            <tr>
                                <td style="height:3px;"></td>
                            </tr>
                            <tr>
                                <td colspan="12" style="border-bottom:5px solid black;"></td>
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
//     // }
}else {
    echo "action not matched";
}
// // die();
// 
?>