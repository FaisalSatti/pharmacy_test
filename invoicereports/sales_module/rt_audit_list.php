<?php
session_start();
include("../../api/auth/db.php");
require_once __DIR__  . '/../vendor/autoload.php';
require_once __DIR__ . '/../../helpers/helpers.php';

// $barcode = new Helpers();
if (isset($_GET['action']) && $_GET['action'] == 'print') {
    // print_r($_GET);
    // die(); 
$co_code = $_GET['co_code'];
$division_code = $_GET['division_code'];
$purchase_mode = $_GET['po_catg'];
$from_date = $_GET['voucher_date'];
$to_date = $_GET['voucher_date'];
// empty division code
if($division_code == 'null' ){
  $merge_for_div = "";
}
else{
  $merge_for_div = " AND R.DIV_CODE =  '$division_code' ";
}

if($purchase_mode == 'null' ){
    $merge_for_po_cat = "";
}
else{
    $merge_for_po_cat = " AND R.PO_CATG =  '$purchase_mode' ";
}
            $sql = "SELECT 
                    R.CO_CODE,
                    R.DOC_YEAR,
                    R.DOC_TYPE,
                    R.DOC_NO,
                    R.DOC_DATE,
                    R.CRDAYS,
                    R.DUE_DATE,
                    R.DO_KEY,
                    R.REFNUM2,
                    R.DIV_CODE,
                    R.DIV_NAME,
                    R.PO_CATG,
                    R.PO_NO,
                    R.PO_DATE,
                    R.PARTY_CODE,
                    R.PARTY_NAME,
                    R.STAX_RATE,
                    R.STAX_AMT,
                    R.ADDTAX_RATE,
                    R.ADDTAX_AMT,
                    R.OTHER_CHRGS,
                    R.OTHER_DED,
                    R.CHARGE_AMT,
                    R.TOTAL_GROSS_AMT,
                    R.TOTAL_NET_AMT,
                    R.ENTRY_NO,
                    R.ITEM_CODE,
                    R.ITEM_NAME_SALE,
                    R.TYPE_NAME,
                    R.ITEM_NAME_SALE2,
                    R.UM_NAME,
                    R.QTY,
                    R.RATE,
                    R.AMT,
                    R.DISC_RATE,
                    R.DISC_AMT,
                    R.FRT_RATE,
                    R.FRT_AMT,
                    R.EXCL_RATE,
                    R.EXCL_AMT,
                    R.STAX_RATE_DTL,
                    R.STAX_AMT_DTL,
                    R.ADD_RATE,
                    R.ADD_AMT,
                    R.NET_AMT,
                    R.BATCH_NO,
                    R.EXPIRY_DATE,
                    R.loc_code,
                    R.LOC_NAME,
                    c.co_name
            FROM RT_UM_VIEW_NEW R INNER JOIN company c on c.co_code=R.co_code
            WHERE R.DOC_DATE BETWEEN '$from_date' AND '$to_date'
            AND R.CO_CODE   = '$co_code'
            $merge_for_po_cat
            $merge_for_div
            ORDER BY R.CO_CODE,R.DOC_YEAR,R.DOC_NO,R.ENTRY_NO";
            $result = $conn->query($sql);
            // print_r($sql);
            // die();
            $return_data = [];
            $do_key_pre = 0;
            $data_tr='';
            $data_tr2='';
            $data_tr3='';
            $i=1;
            $QTYTOTAL = 0;
            $qtyreport=0;
            $AMTTOTAL = 0;
            $amtreport=0;
            $DISCAMTTOTAL = 0;
            $discreport=0;
            $NETAMTTOTAL =  0;
            $netreport=0;




            $a=1;
            while ($show = mysqli_fetch_assoc($result)) {
                $return_data[] = $show;
        
            }
            foreach($return_data as $value){
                // $i = 1;
                // print_r($return_data);
                $CO_CODE = $value['co_code'];
                $company_name = $value['co_name'];
                $DOC_YEAR = $value['doc_year'];
                $DOC_TYPE = $value['doc_type'];
                $DOC_NO = $value['doc_no'];
                $DOC_DATE = $value['doc_date'];
                $CRDAYS = $value['crdays'];
                $DUE_DATE = $value['due_date'];
                $DO_KEY = $value['do_key'];
                $REFNUM2 = $value['refnum2'];
                $DIV_CODE = $value['div_code'];
                $DIV_NAME = $value['div_name'];
                $PO_CATG = $value['po_catg'];
                $PO_NO = $value['po_no'];
                $PO_DATE = $value['po_date'];
                $PARTY_CODE = $value['party_code'];
                $PARTY_NAME = $value['PARTY_NAME'];
                $STAX_RATE = $value['stax_rate'];
                $STAX_AMT = $value['stax_amt'];
                $ADDTAX_RATE = $value['addtax_rate'];
                $ADDTAX_AMT = $value['addtax_amt'];
                $CHARGE_AMT = $value['charge_amt'];
                $TOTAL_GROSS_AMT = $value['total_gross_amt'];
                $TOTAL_NET_AMT = $value['total_net_amt'];
                $OTHER_CHRGS = $value['other_chrgs'];
                $OTHER_DED = $value['other_ded'];
                $ENTRY_NO = $value['entry_no'];
                $ITEM_CODE = $value['item_code'];
                $ITEM_NAME_SALE = $value['ITEM_NAME_sale'];
                $TYPE_NAME = $value['TYPE_NAME'];
                $ITEM_NAME_SALE2 = $value['ITEM_NAME_sale2'];
                $UM_NAME = $value['um_name'];
                $QTY = $value['qty'];
                $RATE = $value['rate'];
                $AMT = $value['amt'];
                $DISC_RATE = $value['disc_rate'];
                $DISC_AMT = $value['disc_amt'];
                $FRT_RATE = $value['FRT_RATE'];
                $FRT_AMT = $value['FRT_AMT'];
                
                $EXCL_RATE = $value['EXCL_RATE'];
                $EXCL_AMT = $value['excl_amt'];
                $STAX_RATE_DTL = $value['STAX_RATE_DTL'];
                $STAX_AMT_DTL = $value['STAX_AMT_DTL'];
                $ADD_RATE = $value['ADD_RATE'];
                $ADD_AMT = $value['add_amt'];
                $NET_AMT = $value['net_amt'];
                $BATCH_NO = $value['batch_no'];
                $EXPIRY_DATE = $value['expiry_date'];
                $loc_code = $value['loc_code'];
                $LOC_NAME = $value['loc_name'];

                if (($do_key_pre != $DO_KEY)) {
                    if ($i != 1){
                        $data_tr .= '
                                        <tr style="border:2px solid black;border:2px solid black">
                                    
                                                <th  style="width:10%;height:30px;font-weight:normal;font-size:17px"></th>
                                                <th  style="width:30%;height:30px;font-weight:normal;font-size:17px;text-align:center"><b>DOC TOTAL</b></th>
                                                <th  style="width:13%;height:30px;font-weight:normal;text-align:right;font-size:17px;">'.number_format($QTYTOTAL,2).'</th>
                                                <th  style="width:10%;height:30px;font-weight:normal;text-align:right;font-size:17px;">'.number_format($AMTTOTAL,2).'</th>
                                                <th  style="width:10%;height:30px;font-weight:normal;text-align:right;font-size:17px;">'.number_format($DISCAMTTOTAL,2).'</th>
                                                <th  style="width:12%;height:30px;font-weight:normal;text-align:left;font-size:17px;"><b> </b></th>
                                                <th  style="width:10%;height:30px;font-weight:normal;text-align:right;font-size:17px;"></th>
                                                <th  style="width:10%;height:30px;font-weight:normal;text-align:right;font-size:17px;"></th>
                                                <th  style="width:10%;height:30px;font-weight:normal;text-align:right;font-size:17px;"></th>
                                                <th  style="width:10%;height:30px;font-weight:normal;text-align:right;font-size:17px;">'.number_format($NETAMTTOTAL,2).'</th>
                                                <th  style="width:10%;height:30px;font-weight:normal;text-align:center;font-size:17px;"></th>
                                                <th  style="width:12%;height:30px;font-weight:normal;font-size:17px"></th>
                                        </tr>
                                    </table><br><br>
                        ';
                        $QTYTOTAL = 0;
                        $AMTTOTAL = 0;
                        $DISCAMTTOTAL =0;
                        $NETAMTTOTAL = 0;
        
                    }   
                    $i = $i + 1;
                    $do_key_pre = $DO_KEY;
                    $data_tr .= '<br>
                            <table style="width:100%;">
                                <tr>
                                    <td style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;">'.date('d-m-Y',strtotime($DOC_DATE)) .'</td>
                                    <td style="width:30%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;">'.$REFNUM2 .'</td>
                                    <td style="width:15%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;">'.$PO_CATG .'</td>
                                    <td style="width:13%;font-size:12px;font-weight:bold;text-align:right;height:35px;border:2px solid black;">'.number_format($TOTAL_GROSS_AMT,2) .'</td>
                                    <td style="width:10%;font-size:12px;font-weight:bold;text-align:right;height:35px;border:2px solid black;">'.number_format($CHARGE_AMT,2) .'</td>
                                    <td style="width:10%;font-size:12px;font-weight:bold;text-align:right;height:35px;border:2px solid black;">'.number_format($OTHER_CHRGS,2) .'</td>
                                    <td style="width:13%;font-size:12px;font-weight:bold;text-align:right;height:35px;border:2px solid black;">'.number_format($TOTAL_NET_AMT,2) .'</td>
                                </tr>
                                <tr>
                                    <td style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;">'.$DO_KEY .'</td>
                                    <td style="width:30%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;">'.$PARTY_NAME .'</td>
                                    <td style="width:15%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;">'.$DIV_NAME .'</td>
                                    <td style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;"></td>
                                    <td style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;"></td>
                                    <td style="width:10%;font-size:12px;font-weight:bold;text-align:right;height:35px;border:2px solid black;">'.$OTHER_DED .'</td>
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
                    $data_tr .= '  <table style="white-space: nowrap;width:100%;border-collapse:collapse;">
                                        <tr>
                                            <th  style="width:10%;border:2px solid black;height:30px">S#</th>
                                            <th  style="width:30%;border:2px solid black;height:30px">Item Name/CD-Typ-UM</th>
                                            <th   style="width:13%;border:2px solid black;height:30px">Qty/Rate</th>
                                            <th   style="width:10%;border:2px solid black;height:30px">Amount</th>
                                            <th   style="width:10%;border:2px solid black;height:30px">Disc RT/Amt</th>
                                            <th   style="width:12%;border:2px solid black;height:30px">Frt RT/Amt</th>
                                            <th   style="width:10%;border:2px solid black;height:30px">Excl RT/Amt</th>
                                            <th   style="width:10%;border:2px solid black;height:30px">Stax RT/Amt</th>
                                            <th   style="width:10%;border:2px solid black;height:30px">Add RT/Amt</th>
                                            <th   style="width:10%;border:2px solid black;height:30px">Net Amt</th>
                                            <th   style="width:10%;border:2px solid black;height:30px">Batch#/Expiry</th>
                                            <th   style="width:12%;border:2px solid black;height:30px">Location</th>
                                        </tr>
                                        <tr style="width:100%;"></tr>
                                        <tr style="width:100%;"></tr>
                                        <tr style="width:100%;"></tr>
                                        <tr style="width:100%;"></tr>
                                        <tr style="width:100%;"></tr>
                                        <tr style="width:100%;"></tr>
                    ';
                }
                    $data_tr .= '
                                    <tr>
                                        <th  style="width:10%;border:2px solid black;height:30px;font-weight:normal;font-size:17px">'.$a .'</th>
                                        <th  style="width:30%;border:2px solid black;height:30px;font-weight:normal;font-size:17px"><span style="text-align:left;">'.$ITEM_NAME_SALE .'</th>
                                        <th  style="width:13%;border:2px solid black;height:30px;font-weight:normal;text-align:right;font-size:17px;">'.number_format($QTY,2) .'</th>
                                        <th  style="width:15%;border:2px solid black;height:30px;font-weight:normal;text-align:right;font-size:17px;">'.number_format($AMT,2) .'</th>
                                        <th  style="width:10%;border:2px solid black;height:30px;font-weight:normal;text-align:right;font-size:17px;">'.number_format($DISC_RATE,2) .'</th>
                                        <th  style="width:12%;border:2px solid black;height:30px;font-weight:normal;text-align:right;font-size:17px;">'.number_format($FRT_RATE,2) .'</th>
                                        <th  style="width:10%;border:2px solid black;height:30px;font-weight:normal;text-align:right;font-size:17px;">'.number_format($EXCL_RATE,2) .'</th>
                                        <th  style="width:10%;border:2px solid black;height:30px;font-weight:normal;text-align:right;font-size:17px;">'.number_format($STAX_RATE,2) .'</th>
                                        <th  style="width:10%;border:2px solid black;height:30px;font-weight:normal;text-align:right;font-size:17px;">'.number_format($ADD_RATE,2) .'</th>
                                        <th  style="width:10%;border:2px solid black;height:30px;font-weight:normal;text-align:right;font-size:17px;">'.number_format($NET_AMT,2) .'</th>
                                        <th  style="width:10%;border:2px solid black;height:30px;font-weight:normal;text-align:center;font-size:17px;">'.$BATCH_NO .'</th>
                                        <th  style="width:12%;border:2px solid black;height:30px;font-weight:normal;font-size:17px">'.$LOC_NAME .'</th>
                                    </tr>
                                    <tr>
                                        <th  style="width:10%;border:2px solid black;height:30px;font-weight:normal;font-size:17px"></th>
                                        <th  style="width:30%;border:2px solid black;height:30px;font-weight:normal;font-size:17px"><span style="text-align:left;width:50%">'.$ITEM_CODE .'</span>     -     <span style="width:50%">'.$UM_NAME.'</span></th>
                                        <th  style="width:13%;border:2px solid black;height:30px;font-weight:normal;text-align:right;font-size:17px;">'.number_format($RATE,2) .'</th>
                                        <th  style="width:15%;border:2px solid black;height:30px;font-weight:normal;text-align:right;font-size:17px;"></th>
                                        <th  style="width:10%;border:2px solid black;height:30px;font-weight:normal;text-align:right;font-size:17px;">'.number_format($DISC_AMT,2) .'</th>
                                        <th  style="width:12%;border:2px solid black;height:30px;font-weight:normal;text-align:right;font-size:17px;">'.number_format($FRT_AMT,2) .'</th>
                                        <th  style="width:10%;border:2px solid black;height:30px;font-weight:normal;text-align:right;font-size:17px;">'.number_format($EXCL_AMT,2) .'</th>
                                        <th  style="width:10%;border:2px solid black;height:30px;font-weight:normal;text-align:right;font-size:17px;">'.number_format($STAX_AMT,2) .'</th>
                                        <th  style="width:10%;border:2px solid black;height:30px;font-weight:normal;text-align:right;font-size:17px;">'.number_format($ADD_AMT,2).'</th>
                                        <th  style="width:10%;border:2px solid black;height:30px;font-weight:normal;text-align:right;font-size:17px;"></th>
                                        <th  style="width:10%;border:2px solid black;height:30px;font-weight:normal;text-align:center;font-size:17px;">'.date('d-m-Y', strtotime($EXPIRY_DATE)) .'</th>
                                        <th  style="width:12%;border:2px solid black;height:30px;font-weight:normal;font-size:17px"></th>
                                    </tr>
                                    <tr style="width:100%;"></tr>
                                    <tr style="width:100%;"></tr>
                                    <tr style="width:100%;"></tr>
                                    <tr style="width:100%;"></tr>
                                    <tr style="width:100%;"></tr>
                                    <tr style="width:100%;"></tr>
            
                       
                    ';
                    
                    $do_key_pre = $DO_KEY;
                    $QTYTOTAL = $QTYTOTAL + $QTY;
                    $qtyreport = $qtyreport + $QTY;
                    $RATETOTAL = $RATETOTAL + $RATE;
                    $ratereport = $ratereport + $RATE;
                    $AMTTOTAL = $AMTTOTAL + $AMT;
                    $amtreport = $amtreport + $AMT;
                    $DISCAMTTOTAL = $DISCAMTTOTAL + $DISC_AMT;
                    $discreport = $discreport + $DISC_AMT;
                    $NETAMTTOTAL = $NETAMTTOTAL + $NET_AMT;
                    $netreport = $netreport + $NET_AMT;

                   
            }
            

            $data_tr .= '
            <tr style="border:2px solid black;border:2px solid black">
        
                    <th  style="width:10%;height:30px;font-weight:normal;font-size:17px"></th>
                    <th  style="width:30%;height:30px;font-weight:normal;font-size:17px;text-align:center"><b>DOC TOTAL</b></th>
                    <th  style="width:13%;height:30px;font-weight:normal;text-align:right;font-size:17px;">'.number_format($QTYTOTAL,2).'</th>
                    <th  style="width:10%;height:30px;font-weight:normal;text-align:right;font-size:17px;">'.number_format($AMTTOTAL,2).'</th>
                    <th  style="width:10%;height:30px;font-weight:normal;text-align:right;font-size:17px;">'.number_format($DISCAMTTOTAL,2).'</th>
                    <th  style="width:12%;height:30px;font-weight:normal;text-align:left;font-size:17px;"><b> </b></th>
                    <th  style="width:10%;height:30px;font-weight:normal;text-align:right;font-size:17px;"></th>
                    <th  style="width:10%;height:30px;font-weight:normal;text-align:right;font-size:17px;"></th>
                    <th  style="width:10%;height:30px;font-weight:normal;text-align:right;font-size:17px;"></th>
                    <th  style="width:10%;height:30px;font-weight:normal;text-align:right;font-size:17px;">'.number_format($NETAMTTOTAL,2).'</th>
                    <th  style="width:10%;height:30px;font-weight:normal;text-align:center;font-size:17px;"></th>
                    <th  style="width:12%;height:30px;font-weight:normal;font-size:17px"></th>
            </tr>
            <tr style="border:2px solid black;border:2px solid black">
        
                    <th  style="width:10%;height:30px;font-weight:normal;font-size:17px"></th>
                    <th  style="width:30%;height:30px;font-weight:normal;font-size:17px;text-align:center"><b>REPORT TOTAL</b></th>
                    <th  style="width:13%;height:30px;font-weight:normal;text-align:right;font-size:17px;">'.number_format($qtyreport,2).'</th>
                    <th  style="width:10%;height:30px;font-weight:normal;text-align:right;font-size:17px;">'.number_format($amtreport,2).'</th>
                    <th  style="width:10%;height:30px;font-weight:normal;text-align:right;font-size:17px;">'.number_format($discreport,2).'</th>
                    <th  style="width:12%;height:30px;font-weight:normal;text-align:left;font-size:17px;"><b> </b></th>
                    <th  style="width:10%;height:30px;font-weight:normal;text-align:right;font-size:17px;"></th>
                    <th  style="width:10%;height:30px;font-weight:normal;text-align:right;font-size:17px;"></th>
                    <th  style="width:10%;height:30px;font-weight:normal;text-align:right;font-size:17px;"></th>
                    <th  style="width:10%;height:30px;font-weight:normal;text-align:right;font-size:17px;">'.number_format($netreport,2).'</th>
                    <th  style="width:10%;height:30px;font-weight:normal;text-align:center;font-size:17px;"></th>
                    <th  style="width:12%;height:30px;font-weight:normal;font-size:17px"></th>
            </tr>
            </table>';
    
    








             
          








        //  die();
        
        // die();
    
    // print_r($data_tr);
    // die();



   




    // $data_tr .= ' <table style="width:100%;border:2px solid black;">
    // <tr>
  
    //         <td  style="width:10%;height:30px;"></td>
    //         <td  style="width:30%;height:30px"><b>DOCUMENT TOTAL</b></td>
    //         <td  style="width:15%;height:30px"></td>
    //         <td  style="width:10%;height:30px"></td>
    //         <td  style="width:10%;height:30px">'.$QTYTOTAL.'</td>
    //         <td  style="width:10%;height:30px">'.$AMTTOTAL.'</td>
    //         <td  style="width:10%;height:30px"></td>
    //         <td  style="width:12%;height:30px">'.$DISCAMTTOTAL.'</td>
    //         <td  style="width:10%;height:30px">'.$NETAMTTOTAL.'</td>
    //         <td  style="width:12%;height:30px"></td>
    // </tr>

    
    
    
    
    
    // </table><br><br>
    //   ';
    //   $data_tr .= ' <table style="width:100%;border:2px solid black;">
    //   <tr>
    
    //           <td  style="width:10%;height:30px;"></td>
    //           <td  style="width:30%;height:30px"><b>REPORT TOTAL</b></td>
    //           <td  style="width:15%;height:30px"></td>
    //           <td  style="width:10%;height:30px"></td>
    //           <td  style="width:10%;height:30px">'.$qtyreport.'</td>
    //           <td  style="width:10%;height:30px">'.$amtreport.'</td>
    //           <td  style="width:10%;height:30px"></td>
    //           <td  style="width:12%;height:30px">'.$discreport.'</td>
    //           <td  style="width:10%;height:30px">'.$netreport.'</td>
    //           <td  style="width:12%;height:30px"></td>
    //   </tr>

    
      
      
      
      
    //   </table>
    //     ';
            $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
            date_default_timezone_set("Asia/Karachi"); 
            $today = date("j F, Y");
            $mpdf->WriteHTML(
                '<div class="row" style="line-height:16px;">
                    <div class="main-heading">
                        <table style="border-bottom: 4px solid black; padding:5px;width:100%;">
                            <tr>
                                <td style = "font-size:20px;width:41%; text-align:left;font-weight:bold;">'.$company_name.'</td>
                                <td style = "font-size:12px ;text-align:right;line-height:20px;"></td>
                                <td style = "font-size:12px ;text-align:center;line-height:20px; text-align:right;"></td>
                                <td style = "font-size:15px ;text-align:center;line-height:20px;border: 1px solid black ;width:8%;"><b>RTs</b></td>
                                <td style = "font-size:15px ;text-align:center;line-height:20px;border: 1px solid black ;width:10%;"><b>AUDIT LIST</b></td>
                                <td style = "font-size:11px ;text-align:center;line-height:20px;width:8%;font-weight:bold;"></td>
                                <td style = "font-size:15px ;text-align:center;line-height:20px;width:10%;border: 1px solid black ;font-weight:bold;">'.date('d-m-Y', strtotime($from_date)).'</td>
                                <td style = "font-size:15px ;text-align:center;line-height:20px;font-weight:bold; width:10%;border: 1px solid black ;">'.date('d-m-Y', strtotime($to_date)).'</td>
                                <td style = "font-size:12px ;text-align:center;line-height:20px;width:9%; text-align:right;"></td>
                                <td style = "font-size:13px ;text-align:center;line-height:20px;width:17%;font-weight:bold;">'.$today.'</td>
                            </tr>
                        </table>
                    </div>
                    <div class="invoice_detail" style="padding-top:20px;height:100px;">
                        <table  style="width:100%;white-space: nowrap;">
                                
                            <tr>
                                <td style="height:3px;"></td>
                            </tr>
                            <tr style="padding-top:55px;text-align:center;">
                                <th  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;"><b>Date</b></th>
                                <th  style="width:30%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;"><b>Voucher No</b></th>
                                <th  style="width:15%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;"><b>Catg</b></th>
                                <th  style="width:13%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;"><b>Gross Amt</b></th>
                                <th  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;"><b>Other Charges</b></th>
                                <th  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;"><b>Freight</b></th>
                                <th  style="width:13%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;"><b>Net Amt</b></th>
                            </tr>
                            <tr style="padding-top:55px;text-align:center;">
                                <th  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;">Computer#</th>
                                <th  style="width:30%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;">Party</th>
                                <th  style="width:15%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;">Division</th>
                                <th  style="width:13%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;"></th>
                                <th  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;"></th>
                                <th  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;">Discount</th>
                                <th  style="width:13%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:2px solid black;"></th>
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
                    </div>
                    '.$data_tr.'
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

