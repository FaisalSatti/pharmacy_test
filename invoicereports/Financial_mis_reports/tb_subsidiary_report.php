<?php
session_start();
include("../../api/auth/db.php");
require_once __DIR__  . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../helpers/helpers.php';
// $barcode = new Helpers();
        // print_r($_GET);die();
        $company_code = $_GET['company_code'];
        $from_code_org = $_GET['from_code'];
        $to_code_org = $_GET['to_code'];
        $from_code1=mb_substr($from_code_org, 0, 2);
        $to_code1=mb_substr($to_code_org, 0, 2);
        if($to_code1 < $from_code1){
            $from_code=$to_code_org;
            $to_code=$from_code_org;
        }else{
            $from_code=$from_code_org;
            $to_code=$to_code_org;
        }
        // print_r($from_code);
        // print_r($to_code);die();
        $from_date = $_GET['from_date'];
        $to_date = $_GET['to_date'];
        $query = "Select * from company where co_code = '$company_code' ";
        $results = $conn->query($query);
        $shows=$results->fetch_assoc();
        $companyName = $shows['co_name'];
        $query = "select distinct ACCOUNT_CODE from ACT_LC_VIEW2 
        where co_code = '$company_code' and ACCOUNT_CODE between '$from_code' AND '$to_code' 
        and SUB_LEVEL1 <> '0000' AND SUB_LEVEL2 <> '000' ORDER BY ACCOUNT_CODE ASC";
        // PRINT_R($query);DIE();
        $result = $conn->query($query);
        while($row = mysqli_fetch_array($result)) {
            $accountCode1[] = substr($row['ACCOUNT_CODE'],0,3);
            $accountCode2[] = $row['ACCOUNT_CODE'];
        }
        $accountCode = array_unique($accountCode1);
        //    print_r($accountCode);die();
        $data_tr='';
        $netDebitOpen=0;
        $netCreditOpen=0;
        $netDebitActivity =0;
        $netCreditActivity=0;
        $netDebitClosingBal=0;
        $netCreditClosingBal=0;
        foreach($accountCode as $fromaccount) {
          $query = "Select * from ACT_LC_VIEW2 where co_code = '$company_code' AND CONTROL_CODE = '$fromaccount' AND SUB_LEVEL1 = '0000' AND SUB_LEVEL2 = '000'";
        
          $result = $conn->query($query);
          $controlDebitOpen=0;
          $controlCreditOpen=0;
          $controlDebitActivity =0;
          $controlCreditActivity=0;
          $controlDebitClosingBal=0;
          $controlCreditClosingBal=0;
         
          while($show=$result->fetch_assoc()){
            $controlName = $show['DESCR'];
            $query1 = "Select * from ACT_LC_VIEW2 where co_code = '$company_code' AND CONTROL_CODE = '$fromaccount' AND SUB_LEVEL1 <> '0000' AND SUB_LEVEL2 = '000'";
            $result1 = $conn->query($query1);
            $debit = 0;
            $credit= 0;
            $activityDebit = 0;
            $activityCredit = 0;
            $debitClosingBal = 0;
            $creditClosingBal = 0;
            $totalSubDebit = 0;
            $totalSubCredit = 0;
            $totalSubActivityDebit = 0;
            $totalSubActivityCredit = 0;
            $subDebitClosingBalance = 0;
            $subCreditClosingBalance = 0;
            $test = 0;
            while($show1=$result1->fetch_assoc()){
                $subControlName = $show1['DESCR'];
                $sublevel1 = $show1['SUB_LEVEL1'];
                $query2 = "Select * from ACT_LC_VIEW2 where co_code = '$company_code' AND CONTROL_CODE = '$fromaccount' AND SUB_LEVEL1 = '$sublevel1' AND SUB_LEVEL2 <> '000'";
                
                // print_r($query2);die();
                $result2 = $conn->query($query2);
                while($show2=$result2->fetch_assoc()){
                    $subsdiaryCode = $show2['ACCOUNT_CODE'];
                    $subsidiaryName = $show2['DESCR'];
                    $openDebit = $show2['OPEN_DEBIT'];
                    $openCredit = $show2['OPEN_CREDIT'];
                    // echo $openDebit . "<br>";
                    // echo $openCredit . "<br>";
                
                    
                    foreach($accountCode2 as $acc_no) {
                        if($subsdiaryCode == $acc_no){
                            $test = 1;
                            break;
                        }else{
                            $test = 0;
                        }
                    
                    }
                    if($test == 1){
                    $query3 = "SELECT SUM(DEBIT) AS Totaldebit, SUM(CREDIT) As totalcredit  FROM MASTER_VIEW_LEDGER WHERE CO_CODE = '$company_code' AND ACCOUNT_CODE = '$subsdiaryCode' AND VOUCHER_DATE < '$from_date' GROUP BY
                    ACCOUNT_CODE";
                    $sumDebit = 0;
                    $sumCredit = 0;
                    $totalSubOpenDebit = 0;
                    $totalSubOpenCredit=0;
                    $netSubOpen = 0;
                    $result3 = $conn->query($query3);
                    while($show3=$result3->fetch_assoc()){
                        $sumDebit = $show3['Totaldebit'];
                        $sumCredit = $show3['totalcredit'];
                    }
                    $totalSubOpenDebit = $openDebit + $sumDebit;
                    $totalSubOpenCredit = $openCredit + $sumCredit;
                    $netSubOpen = $totalSubOpenDebit-$totalSubOpenCredit;
                    if($netSubOpen > 0){
                        $debit = $netSubOpen;
                        $totalSubDebit += $debit;
                    }else{
                        $credit = $netSubOpen;
                        $credit = $credit * -1;
                        $totalSubCredit += $credit;
                    }
                    $query4 = "SELECT SUM(DEBIT) AS Totaldebit, SUM(CREDIT) As totalcredit  FROM MASTER_VIEW_LEDGER WHERE CO_CODE = '$company_code' AND ACCOUNT_CODE = '$subsdiaryCode' AND VOUCHER_DATE between '$from_date' and '$to_date' GROUP BY 
                    ACCOUNT_CODE";
                    $result4 = $conn->query($query4);
                    $count = mysqli_num_rows($result4);
                    if($count > 0){
                        while($show4=$result4->fetch_assoc()){
                            $activityDebit = $show4['Totaldebit'];
                            $totalSubActivityDebit += $activityDebit;
                            $activityCredit = $show4['totalcredit'];
                            $totalSubActivityCredit += $activityCredit;
                        }
                    }
                    else{
                        $activityDebit = 0.00;
                        $activityCredit = 0.00;
                        
                    }
                    $closingBal = $netSubOpen + $activityDebit - $activityCredit;
                    if($closingBal > 0){
                        $debitClosingBal = $closingBal;
                        $subDebitClosingBalance += $debitClosingBal;
                    
                    }else{
                        $creditClosingBal = $closingBal;
                        $creditClosingBal  *=-1;
                        $subCreditClosingBalance += $creditClosingBal;
                    }
                    if(!(($debit=='' || $debit=='0' || $debit=='0.00') && ($credit=='' || $credit=='0' || $credit=='0.00')
                        && ($activityDebit=='' || $activityDebit=='0' || $activityDebit=='0.00') 
                        && ($activityCredit=='' || $activityCredit=='0' || $activityCredit=='0.00')
                        && ($debitClosingBal=='' || $debitClosingBal=='0' || $debitClosingBal=='0.00')
                        && ($creditClosingBal=='' || $creditClosingBal=='0' || $creditClosingBal=='0.00'))){
                            $data_tr .='
                            <tr>
                            <td>'.$subsdiaryCode.'</td>
                            <td style="text-align:left">'.$subsidiaryName.'</td>
                            <td style = "width:9%;text-align:right;">'.number_format($debit,2).'</td>
                            <td style = "width:10%;text-align:right">'.number_format($credit,2).'</td>
                            <td style = "width:10%;text-align:right">'.number_format($activityDebit,2).'</td>
                            <td style = "width:10%;text-align:right">'.number_format($activityCredit,2).'</td>
                            <td style = "width:10%;text-align:right">'.number_format($debitClosingBal,2).'</td>
                            <td style = "width:10%;text-align:right">'.number_format($creditClosingBal,2).'</td>
                            </tr>
                            ';
                            $debitClosingBal = 0;
                            $creditClosingBal = 0;

                    }
                }
            }
                    // if(($subDebitClosingBalance != 0) || ($subCreditClosingBalance != 0)){

                        if(!(($totalSubDebit=='' || $totalSubDebit=='0' || $totalSubDebit=='0.00') && ($totalSubCredit=='' || $totalSubCredit=='0' || $totalSubCredit=='0.00')
                        && ($totalSubActivityDebit=='' || $totalSubActivityDebit=='0' || $totalSubActivityDebit=='0.00') 
                        && ($totalSubActivityCredit=='' || $totalSubActivityCredit=='0' || $totalSubActivityCredit=='0.00')
                        && ($subDebitClosingBalance=='' || $subDebitClosingBalance=='0' || $subDebitClosingBalance=='0.00')
                        && ($subCreditClosingBalance=='' || $subCreditClosingBalance=='0' || $subCreditClosingBalance=='0.00'))){
            $data_tr .='
              <tr><td style = "border:none !important; padding:8px;"></td></tr> 
              <tr><td style="width:17%">Total sub</td>
              <td style="text-align:left;">'.$subControlName.'</td>
              <td style = "width:9%;text-align:right">'.number_format($totalSubDebit,2).'</td>
              <td style = "width:10%;text-align:right">'.number_format($totalSubCredit,2).'</td>
              <td style = "width:10%;text-align:right">'.number_format($totalSubActivityDebit,2).'</td>
              <td style = "width:10%;text-align:right">'.number_format($totalSubActivityCredit,2).'</td>
              <td style = "width:10%;text-align:right">'.number_format($subDebitClosingBalance,2).'</td>
              <td style = "width:10%;text-align:right">'.number_format($subCreditClosingBalance,2).'</td></tr>
              <tr><td style = "border:none !important; padding:8px;"></td></tr> ';
              // }
              $controlDebitOpen += $totalSubDebit;
              $controlCreditOpen += $totalSubCredit;
              $controlDebitActivity += $totalSubActivityDebit;
              $controlCreditActivity += $totalSubActivityCredit;
              $controlDebitClosingBal += $subDebitClosingBalance;
              $controlCreditClosingBal +=$subCreditClosingBalance;
              
              $totalSubDebit = 0;
              $totalSubCredit  = 0;
              $totalSubActivityDebit = 0;
              $totalSubActivityCredit = 0;
              $subDebitClosingBalance = 0;
              $subCreditClosingBalance = 0;
                        }
            }
            if(!(($controlDebitOpen=='' || $controlDebitOpen=='0' || $controlDebitOpen=='0.00') && ($controlCreditOpen=='' || $controlCreditOpen=='0' || $controlCreditOpen=='0.00')
                        && ($controlDebitActivity=='' || $controlDebitActivity=='0' || $controlDebitActivity=='0.00') 
                        && ($controlCreditActivity=='' || $controlCreditActivity=='0' || $controlCreditActivity=='0.00')
                        && ($controlDebitClosingBal=='' || $controlDebitClosingBal=='0' || $controlDebitClosingBal=='0.00')
                        && ($controlCreditClosingBal=='' || $controlCreditClosingBal=='0' || $controlCreditClosingBal=='0.00'))){
            // if(($controlDebitOpen != 0) || ($subCreditClosingBalance != 0)){
            $data_tr .='
            <tr style="background-color:#E8E8E8"><td style = "font-weight:bold;width:17%;">Total Control</td>
            <td style="text-align:left">'.$controlName.'</td>
            <td style = "width:9%;text-align:right">'.number_format($controlDebitOpen,2).'</td>
            <td style = "width:10%;text-align:right">'.number_format($controlCreditOpen,2).'</td>
            <td style = "width:10%;text-align:right">'.number_format($controlDebitActivity,2).'</td>
            <td style = "width:10%;text-align:right">'.number_format($controlCreditActivity,2).'</td>
            <td style = "width:10%;text-align:right">'.number_format($controlDebitClosingBal,2).'</td>
            <td style = "width:10%;text-align:right">'.number_format($controlCreditClosingBal,2).'</td></tr>
            <tr><td style = "border:none !important; padding:8px;"></td></tr> ';
              // }
            $netDebitOpen += $controlDebitOpen;
            $netCreditOpen += $controlCreditOpen;
            $netDebitActivity += $controlDebitActivity;
            $netCreditActivity += $controlCreditActivity;
            $netDebitClosingBal += $controlDebitClosingBal;
            $netCreditClosingBal += $controlCreditClosingBal;
                        }
          }
        }
        $data_tr .='
        <tr><td colspan="8" style="background:black"></td></tr>
        <tr style="background-color:#D3D3D3"><td colspan = "2"style = "font-weight:bold">Grand Total</td>
        <td style = "width:9%;text-align:right">'.number_format($netDebitOpen,2).'</td>
        <td style = "width:10%;text-align:right">'.number_format($netCreditOpen,2).'</td>
        <td style = "width:10%;text-align:right">'.number_format($netDebitActivity,2).'</td>
        <td style = "width:10%;text-align:right">'.number_format($netCreditActivity,2).'</td>
        <td style = "width:10%;text-align:right">'.number_format($netDebitClosingBal,2).'</td>
        <td style = "width:10%;text-align:right">'.number_format($netCreditClosingBal,2).'</td></tr>
        <tr><td colspan="8" style="background:black"></td></tr>';


        
        $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
        $mpdf->setFooter('{PAGENO}');
        $stylesheet = file_get_contents('account_subsidary.css');
        //     // $mpdf->SetWatermarkText('PAID');
        //     // $mpdf->showWatermarkText = true;
        $mpdf->WriteHTML($stylesheet, 1);
        date_default_timezone_set("Asia/Karachi"); 
        $today = date("l F j G:i:s ");
        $mpdf->WriteHTML('<div class="row">
            <div class="main">
                    <div class="row">
                        <div class="header">
                        <div class="row">
                            <div class = "report_section1 col-lg-6 col-md-6 col-sm-12">
                                <h2 style="text-transform:capitalize" class = ""><u>'.$companyName.'</u></h2>
                            </div>
                            <div class="report_section2 col-lg-6 col-md-6 col-sm-12">
                                <span class = "">'.date("l j F Y h:i:s A").'</span>
                            </div>
                            </div>
                        </div>
                        </br>
                        <table class="text-center" style="padding-top:17px:width:100%">
                            <thead>
                            <tr class = "sticky">
                                <th style = "width:10%">CODE</th>
                                <th >Account Description</th>
                                <th style = "width:9%">Debit Balance</th>
                                <th style = "width:10%">Credit Balance</th>
                                <th style = "width:10%">Debit Activity</th>
                                <th style = "width:10%">Credit Activity</th>
                                <th style = "width:10%">Debit Balance</th>
                                <th style = "width:10%">Credit Balance</th>
                            </tr>
                            </thead>
                        </table>
                        </br>
                            
                            
                        <hr style="color:black;height:2px;margin-top:-5px">
                        <div>
                           
                            <table style="width:100%">
                                '.$data_tr.'
                            </table>
                               
                        </div>
                        
                    </div>

            </div>
        </div>', 2);
        $mpdf->Output();
                  
            
                






        





                                
    





