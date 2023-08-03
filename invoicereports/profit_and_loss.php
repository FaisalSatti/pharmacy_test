<?php
session_start();
include("../api/auth/db.php");
require_once __DIR__  . '/vendor/autoload.php';
require_once __DIR__ . '/../helpers/helpers.php';

$barcode = new Helpers();
if (isset($_GET['action']) && $_GET['action'] == 'print') {
    $company_code = $_GET['company_code'];
    $from_code = $_GET['from_code'];
    $to_code = $_GET['to_code'];
    $from_date = $_GET['from_date'];
    $to_date = $_GET['to_date'];
    $MAMT=0;

    $sql = "SELECT CO_CODE,ACCOUNT_CODE,DESCR,OPEN_DEBIT,OPEN_CREDIT
    FROM ACT_LC_VIEW2
    WHERE CO_CODE = '$company_code'
    AND ACCOUNT_CODE = '$from_code'";
    $result = $conn->query($sql);


    $CFSALESQUERY = "SELECT SUM(IFNULL(CREDIT,0)) - SUM(IFNULL(DEBIT,0)) AS MAMT
	FROM   MASTER_VIEW_LEDGER_GL
	WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('801', '802', '803', '804', '811')
	AND    CO_CODE = '$company_code'
	AND    VOUCHER_DATE BETWEEN '$from_date' AND '$to_date'";
// PRINT_R($CFSALESQUERY);DIE();
   $CFSALESRESULT = $conn->query($CFSALESQUERY);
   $show2 = mysqli_fetch_assoc($CFSALESRESULT);
    $MAMT=$show2['MAMT']??0;

    // -------------------------------------------------------

    $MOPENQUERY = "SELECT SUM(IFNULL(OPEN_VAL,0)) 
	AS MOPEN
	FROM   ITEMS
	WHERE  CO_CODE = '$company_code'";
   $MOPENRESULT = $conn->query($MOPENQUERY);
   $show3 = mysqli_fetch_assoc($MOPENRESULT);
   $MOPEN=$show3['MOPEN']??0;
//    print_r($MOPEN);
// die();
// print_r('A'); 
     // -------------------------------------------------------
     $MPURQUERY = "SELECT SUM(IFNULL(DEBIT,0)) - SUM(IFNULL(CREDIT,0)) 
     AS MPUR 
     FROM   MASTER_VIEW_LEDGER_GL
     WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('861', '862', '863', '864' , '865')
     AND    CO_CODE = '$company_code'
     AND    VOUCHER_DATE BETWEEN '$from_date' AND '$to_date'";
   
// PRINT_R($MPURQUERY);DIE();
    $MPURRESULT = $conn->query($MPURQUERY);
    $show4 = mysqli_fetch_assoc($MPURRESULT);
     $MPUR=$show4['MPUR']??0; 
        //   print_r($MPUR);
        //   print_r('B');
     // -------------------------------------------------------
     $MCLOSQUERY = "SELECT SUM(IFNULL(CLOSE_VAL,0)) 
     AS   MCLOS
     FROM   ITEMS
     WHERE  CO_CODE = '$company_code'";
   
    $MCLOSRESULT = $conn->query($MCLOSQUERY);
    $show5 = mysqli_fetch_assoc($MCLOSRESULT);
     $MCLOS=$show5['MCLOS']??0;
    //  print_r('C');
    //  print_r($MCLOS);
    // // die();
    // print_r('D');
     
    $COSTOFGOODSSOLD = $MOPEN + $MPUR - $MCLOS;
    // print_r($COSTOFGOODSSOLD);die();
    $GROSS= $MAMT - $COSTOFGOODSSOLD;
    $GROSSPER = $GROSS / $MAMT * 100;
    

  // -------------------------------------------------------
        $EXPADMINQUERY = "SELECT SUM(IFNULL(DEBIT,0)) - SUM(IFNULL(CREDIT,0)) AS ADMIN
        FROM   MASTER_VIEW_LEDGER_GL
        WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('901')
        AND    CO_CODE = '$company_code'
        AND    VOUCHER_DATE BETWEEN '$from_date' AND '$to_date'";
          
        $EXPADMINRESULT = $conn->query($EXPADMINQUERY);
        $show6 = mysqli_fetch_assoc($EXPADMINRESULT);
        $ADMIN=$show6['ADMIN']??0;

        
// -------------------------------------------------------


$EXPSALEQUERY = "SELECT SUM(NVL(DEBIT,0)) - SUM(NVL(CREDIT,0)) as SALE
FROM   MASTER_VIEW_LEDGER_GL
WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('902', '903', '904', '905', '906')
AND    CO_CODE = '$company_code'
AND    VOUCHER_DATE BETWEEN '$from_date' AND '$to_date'";
  
$EXPSALERESULT = $conn->query($EXPSALEQUERY);
$show7 = mysqli_fetch_assoc($EXPSALERESULT);
$SALE=$show7['SALE']??0;

  // -------------------------------------------------------

  $EXPFINQUERY = "SELECT SUM(IFNULL(DEBIT,0)) - SUM(IFNULL(CREDIT,0)) AS FINANCE
  FROM   MASTER_VIEW_LEDGER_GL
  WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('951')
  AND    CO_CODE = '$company_code'
AND    VOUCHER_DATE BETWEEN '$from_date' AND '$to_date'";
    
  $EXPFINRESULT = $conn->query($EXPFINQUERY);
  $show7 = mysqli_fetch_assoc($EXPFINRESULT);
  $FINANCE=$show8['FINANCE']??0;

//   print_r($FINANCE);
//   die();




// -------------------------------------------------------
$TOTALEXP = $ADMIN+$FINANCE+$SALE;

// -------------------------------------------------------
$TOTEXPPER = $TOTALEXP/ $MAMT * 100;
// -------------------------------------------------------


$OPERATINGPROFIT = $GROSS - $TOTALEXP;

// -------------------------------------------------------


$OTHERINCQUERY = "SELECT SUM(NVL(CREDIT,0)) - SUM(NVL(DEBIT,0)) AS OTHERINCOME
FROM   MASTER_VIEW_LEDGER_GL
WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('846')
AND    CO_CODE = '$company_code'
AND    VOUCHER_DATE BETWEEN '$from_date' AND '$to_date'";
  
$OTHERRESULT = $conn->query($OTHERINCQUERY);
$show8 = mysqli_fetch_assoc($OTHERRESULT);
$OTHERINCOME=$show8['OTHERINCOME']??0;

// -------------------------------------------------------

$NETPROFIT = $OPERATINGPROFIT + $OTHERINCOME;


// -------------------------------------------------------

$NETPROFITPER= $NETPROFIT/$MAMT * 100;










$mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
            $mpdf->WriteHTML(
                '<div class="row" style="line-height:16px;">
                    <div class="main-heading">
                        <table class="secondlast" style="width:100%;border-collapse:collapse;margin-top:20px;">
                            <tr>
                                <td style="width:250px;font-size:20px;font-family:arial;text-align:center;"></td>                                   
                            </tr>
                            <tr>
                            <td style="border-bottom:3px solid black;width:100%;font-size:15px;text-align:CENTER;font-weight:bold;padding-top:8px;"><b>PROFIT AND LOSS STATEMENT</b></td>    
                          
                            </tr>
                           
                        </table>
                    </div>
                    
                    <div class="invoice_detail" style="padding-top:20px;height:100px;">
                        <table  style="width:100%;white-space: nowrap;">
                                
                            <tr>
                                <td style="height:3px;"></td>
                            </tr>
                            <tr style="padding-top:55px;text-align:center;">
                                <td  style="width:50%;font-size:30px;font-weight:bold;text-align:left;height:35px;border:1px solid black;"><b>NET SALES</b></td>
                                <td  style="width:20%;font-size:30px;font-weight:bold;text-align:CENTER;height:35px;"><b>P&L 01</b></td>
                                <td  style="width:30%;font-size:20px;font-weight:bold;text-align:right;height:35px;border:1px solid black;"><b>'.NUMBER_FORMAT($MAMT,2).'</b></td>
                            </tr>
                            <tr style="padding-top:55px;text-align:center;">
                                <td  style="width:50%;font-size:30px;font-weight:bold;text-align:left;height:35px;border:1px solid black;"><b>COST OF GOODS SOLD</b></td>
                                <td  style="width:20%;font-size:30px;font-weight:bold;text-align:CENTER;height:35px;"><b>P&L 02</b></td>
                                <td  style="width:30%;font-size:20px;font-weight:bold;text-align:right;height:35px;border:1px solid black;"><b>'.NUMBER_FORMAT($COSTOFGOODSSOLD,2).'</b></td>
                            </tr>
                            <tr style="padding-top:55px;text-align:center;">
                                <td  style="width:70%;font-size:30px;font-weight:bold;text-align:left;height:35px;border:1px solid black;"><b>GROSS PROFIT</b></td>
                                <td></td>
                                <td  style="width:30%;font-size:20px;font-weight:bold;text-align:right;height:35px;border:1px solid black;"><b>'.NUMBER_FORMAT($GROSS,2).'</b></td>
                            </tr>
                            <tr style="padding-top:55px;text-align:center;">
                                <td  style="width:70%;font-size:30px;font-weight:bold;text-align:left;height:35px;"></td>
                                <td></td>
                                <td  style="width:30%;font-size:20px;font-weight:bold;text-align:right;height:35px;border:1px solid black;"><b>'.NUMBER_FORMAT($GROSSPER,2).'%</b></td>
                            </tr>
                            <tr style="padding-top:55px;text-align:center;">
                            <td  style="width:70%;font-size:30px;font-weight:bold;text-align:left;height:35px;border:1px solid black;"><b>LESS:OPERATING EXPENSES</b></td>
                            </tr>
                            <tr style="padding-top:55px;text-align:center;">
                                <td  style="width:70%;font-size:30px;font-weight:bold;text-align:left;height:35px;border:1px solid black;"><b>ADMINISTRATIVE & GENERAL EXP</b></td>
                                <td  style="width:20%;font-size:30px;font-weight:bold;text-align:CENTER;height:35px;"><b>P&L 03</b></td>
                                
                                <td  style="width:30%;font-size:20px;font-weight:bold;text-align:right;height:35px;border:1px solid black;"><b>'.NUMBER_FORMAT($ADMIN,2).'</b></td>
                            </tr>
                            <tr style="padding-top:55px;text-align:center;">
                                <td  style="width:70%;font-size:30px;font-weight:bold;text-align:left;height:35px;border:1px solid black;"><b>SELLING & DISTRIBUTION EXP</b></td>
                                <td  style="width:20%;font-size:30px;font-weight:bold;text-align:CENTER;height:35px;"><b>P&L 04</b></td>
                                
                                <td  style="width:30%;font-size:20px;font-weight:bold;text-align:right;height:35px;border:1px solid black;"><b>'.NUMBER_FORMAT($SALE,2).'</b></td>
                            </tr>
                            <tr style="padding-top:55px;text-align:center;">
                                <td  style="width:70%;font-size:30px;font-weight:bold;text-align:left;height:35px;border:1px solid black;"><b>FINANCIAL CHARGES</b></td>
                                <td  style="width:20%;font-size:30px;font-weight:bold;text-align:CENTER;height:35px;"><b>P&L 05</b></td>
                                
                                <td  style="width:30%;font-size:20px;font-weight:bold;text-align:right;height:35px;border:1px solid black;"><b>'.NUMBER_FORMAT($FINANCE,2).'</b></td>
                            </tr>
                            <tr style="padding-top:55px;text-align:center;">
                                <td  style="width:70%;font-size:30px;font-weight:bold;text-align:left;height:35px;border:1px solid black;"><b>TOTAL OPERATING EXPENSE</b></td>
                                <td></td>
                                <td  style="width:30%;font-size:20px;font-weight:bold;text-align:right;height:35px;border:1px solid black;"><b>'.NUMBER_FORMAT($TOTALEXP,2).'</b></td>
                            </tr>
                            <tr style="padding-top:55px;text-align:center;">
                                <td  style="width:70%;font-size:30px;font-weight:bold;text-align:left;height:35px;"></td>
                                <td></td>
                                <td  style="width:30%;font-size:20px;font-weight:bold;text-align:right;height:35px;border:1px solid black;"><b>'.NUMBER_FORMAT($TOTEXPPER,2).'%</b></td>
                            </tr>
                            <tr style="padding-top:55px;text-align:center;">
                                <td  style="width:100%;font-size:30px;font-weight:bold;text-align:left;height:35px;"></td>
                            </tr>
                            <tr style="padding-top:55px;text-align:center;">
                                <td  style="width:70%;font-size:30px;font-weight:bold;text-align:left;height:35px;border:1px solid black;"><b>OPERATING PROFIT</b></td>
                                <td></td>
                                <td  style="width:30%;font-size:20px;font-weight:bold;text-align:right;height:35px;border:1px solid black;"><b>'.NUMBER_FORMAT($OPERATINGPROFIT,2).'</b></td>
                            </tr>
                            <tr style="padding-top:55px;text-align:center;">
                                <td  style="width:70%;font-size:30px;font-weight:bold;text-align:left;height:35px;border:1px solid black;"><b>OTHER INCOME</b></td>
                                <td  style="width:20%;font-size:30px;font-weight:bold;text-align:CENTER;height:35px;"><b>P&L 06</b></td>
                                
                                <td  style="width:30%;font-size:20px;font-weight:bold;text-align:right;height:35px;border:1px solid black;"><b>'.NUMBER_FORMAT($OTHERINCOME,2).'</b></td>
                            </tr>
                            <tr style="padding-top:55px;text-align:center;">
                                <td  style="width:70%;font-size:30px;font-weight:bold;text-align:left;height:35px;border:1px solid black;"><b>NET PROFIT / LOSS</b></td>
                                <td></td>
                                
                                <td  style="width:30%;font-size:20px;font-weight:bold;text-align:right;height:35px;border:1px solid black;"><b>'.NUMBER_FORMAT($NETPROFIT,2).'</b></td>
                            </tr>
                            <tr style="padding-top:55px;text-align:center;">
                                <td  style="width:70%;font-size:30px;font-weight:bold;text-align:left;height:35px;"></td>
                                <td></td>
                                <td  style="width:30%;font-size:20px;font-weight:bold;text-align:right;height:35px;border:1px solid black;"><b>'.NUMBER_FORMAT($NETPROFITPER,2).'%</b></td>
                            </tr>
                           
                            
                           
                        </table>
                           
                      
                    
                       
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
// // // die();
// // 
 ?>