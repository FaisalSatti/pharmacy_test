<?php
session_start();
include("../api/auth/db.php");
require_once __DIR__  . '/vendor/autoload.php';
require_once __DIR__ . '/../helpers/helpers.php';

$barcode = new Helpers();
if (isset($_GET['action']) && $_GET['action'] == 'print') {
    // print_r($_GET);
    // die(); 

    



    // Array ( [action] => print [company_code] => 100 [division_name] => [company_name] => ABC COMPANY [division_code] => null [catg] => ALL [mode] => ALL [from_date] => 2023-01-02 [to_date] => 2023-01-25 )
    $company_code = $_GET['company_code'];
    $company_name = $_GET['company_name'];
    $division_code = $_GET['division_code'];
    $division_name = $_GET['division_name'];
    $catg = $_GET['catg'];
    $mode = $_GET['mode'];
    $from_date = $_GET['from_date'];
    $to_date = $_GET['to_date'];
    $company_code = $_GET['company_code'];


    if($division_code == 'null' ){
        $merge_for_div = "";
    }
    else{
    $merge_for_div = " AND div_code =  '$division_code' ";
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




    $sql = "select div_code,div_name,item_cat,pur_mode,item,item_name,um_name,trade_price 
    from item_detail_um2
    where co_code     =   '$company_code' 
    $merge_for_div    
    $merge_for_catg        
    $merge_for_mode
    AND   ITEM NOT IN ('2-47', '2-48','2-224','2-134','2-213','2-223','2-214','2-43','2-127')
    order by div_code,div_name,item_cat,pur_mode,item";
  
    $result = $conn->query($sql);
    $totalqty=0;
    $totalamt =0;
    $data_tr ='';
    $return_data = [];
    
    while ($show = mysqli_fetch_assoc($result)) {
        $return_data = $show;
        $item = $show['item'];
        $item_name = $show['item_name'];
        $pur_mode = $show['pur_mode'];
        $um = $show['um_name'];
        $CP_AVG=0;
        $query2 = "SELECT SUM(IFNULL(QTY,0)) as cp_sale_qty, SUM(IFNULL(EXCL_AMT,0)) as cp_sale_amt
         FROM DC_UM_VIEW_NEW   
        WHERE ITEM_CODE = '$item'
        AND CO_CODE = '$company_code'
        AND DOC_DATE BETWEEN '$from_date' AND '$to_date' ";
          
        $showdc = $conn->query($query2);
        $FINALRESULTDC = mysqli_fetch_assoc($showdc);
        $cp_sale_qty = $FINALRESULTDC['cp_sale_qty'];
        $cp_sale_amt = $FINALRESULTDC['cp_sale_amt'];

        $efg = " SELECT SUM(IFNULL(QTY,0)) as cp_rt_qty, SUM(IFNULL(EXCL_AMT,0)) as cp_rt_amt
        
        FROM RT_UM_VIEW_NEW   
        WHERE ITEM_CODE = '$item'
        AND CO_CODE = '$company_code'
        AND DOC_DATE BETWEEN '$from_date' AND '$to_date' ";
        // print_r($efg);
        // die();
        $showrt = $conn->query($efg);
        $FINALRESULTRT = mysqli_fetch_assoc($showrt);
        $cp_rt_qty = $FINALRESULTRT['cp_rt_qty'];
        if($cp_rt_qty == NULL){
            $cp_rt_qty=0;
        }
        $cp_rt_amt = $FINALRESULTRT['cp_rt_amt'];
        if($cp_rt_amt == NULL){
            $$cp_rt_amt=0;
        }
        $CP_NETQTY  = $cp_sale_qty - $cp_rt_qty;
        $totalqty = $totalqty + $CP_NETQTY;
        $CP_NETAMT = $cp_sale_amt - $cp_rt_amt;
        $totalamt = $totalamt + $CP_NETAMT;
        if($CP_NETAMT == 0 && $CP_NETQTY == 0){

        }else{
        $CP_AVG = $CP_NETAMT / $CP_NETQTY;
        }
        //     print_r($CP_NETQTY);
        // die();




        
        $data_tr .= '<table style="white-space: nowrap;width:100%;border:2px solid black"> <tr style="padding-top:55px;text-align:center;border-bottom:2px solid black;">
                        <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b>'.$item.'</b></td>
                        <td  style="width:35%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b>'.$item_name.'</b></td>
                        <td  style="width:5%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b>'.$um.'</b></td>
                        <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b>'.$pur_mode.'</b></td>
                        <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b>'.number_format($CP_NETQTY,2).'</b></td>
                        <td  style="width:15%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b>'.number_format($CP_NETAMT,2).'</b></td>
                        <td  style="width:15%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b>'.number_format($CP_AVG,2).'</b></td>
                    </tr></table><br> ';
        
        



    }
     
    $data_tr .= '<table style="white-space: nowrap;width:100%;border:2px solid black"> <tr style="padding-top:55px;text-align:center;border-bottom:2px solid black;">
    <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b></td>
    <td  style="width:35%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b></td>
    <td colspan="2" style="width:5%;font-size:12px;font-weight:bold;text-align:center;height:35px;">CATEGORY TOTAL<b></b></td>
    <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b>'.number_format($totalqty,2).'</td>
    <td  style="width:15%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b>'.number_format($totalamt,2).'</td>
    <td  style="width:15%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b></td>
    </tr></table><br> ';
    $data_tr .= '<table style="white-space: nowrap;width:100%;border:2px solid black"> <tr style="padding-top:55px;text-align:center;border-bottom:2px solid black;">
    <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b></td>
    <td  style="width:35%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b></td>
    <td colspan="2" style="width:5%;font-size:12px;font-weight:bold;text-align:center;height:35px;">DIVISION TOTAL<b></b></td>
    <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b>'.number_format($totalqty,2).'</td>
    <td  style="width:15%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b>'.number_format($totalamt,2).'</td>
    <td  style="width:15%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b></td>
    </tr></table><br> ';
    $data_tr .= '<table style="white-space: nowrap;width:100%;border:2px solid black"> <tr style="padding-top:55px;text-align:center;border-bottom:2px solid black;">
    <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b></td>
    <td  style="width:35%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b></td>
    <td colspan="2" style="width:5%;font-size:12px;font-weight:bold;text-align:center;height:35px;">COMPANY TOTAL<b></b></td>
    <td  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b>'.number_format($totalqty,2).'</td>
    <td  style="width:15%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b>'.number_format($totalamt,2).'</td>
    <td  style="width:15%;font-size:12px;font-weight:bold;text-align:center;height:35px;"><b></b></td>
    </tr></table> ';
    // $show['co_code'];
            $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
            $mpdf->WriteHTML(
                '<div class="row" style="line-height:16px;">
                    <div class="main-heading">
                        <table class="secondlast" style="width:100%;border-collapse:collapse;margin-top:20px;">
                            <tr>
                                <td style="width:250px;font-size:20px;font-family:arial;text-align:center;"></td>                                   
                            </tr>
                            <tr>
                            <td style="border-bottom:3px solid black;width:100px;font-size:15px;text-align:left;font-weight:bold;padding-top:8px;">'.$company_name.' &emsp; FROM DATE &emsp;  '.$from_date.' &emsp; - &emsp; TO DATE &emsp; '.$to_date.' &emsp;&emsp; thursday,january 12 &emsp;&emsp;&emsp;&emsp;  <b> ('.$division_name.')</b></td>    
                          
                            </tr>
                           
                        </table>
                    </div>
                    
                    <div class="invoice_detail" style="padding-top:20px;height:100px;">
                        <table  style="width:100%;white-space: nowrap;">
                                
                            <tr>
                                <td style="height:3px;"></td>
                            </tr>
                            <tr style="padding-top:55px;text-align:center;">
                                <th  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:1px solid black;"><b>ITEM</b></th>
                                <th  style="width:35%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:1px solid black;"><b>ITEM DESCRIPTION</b></th>
                                <th  style="width:5%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:1px solid black;"><b>UM</b></th>
                                <th  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:1px solid black;"><b>MODE</b></th>
                                <th  style="width:10%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:1px solid black;"><b>NET QTY</b></th>
                                <th  style="width:15%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:1px solid black;"><b>NET AMT</b></th>
                                <th  style="width:15%;font-size:12px;font-weight:bold;text-align:center;height:35px;border:1px solid black;"><b>AVERAGE AMT</b></th>
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
//     // }
}else {
    echo "action not matched";
}
// // die();
// 
?>