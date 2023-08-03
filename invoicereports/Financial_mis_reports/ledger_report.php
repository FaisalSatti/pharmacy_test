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
        $from_date = $_GET['from_date'];
        // print_r($from_date);die();
        $to_date = $_GET['to_date'];
        $query = "Select * from company where co_code = '$company_code' ";
        $results = $conn->query($query);
        $shows=$results->fetch_assoc();
        $companyName = $shows['co_name'];
        $query = "select distinct ACCOUNT_CODE from ACT_LC_VIEW2 where co_code = '$company_code' AND ACCOUNT_CODE between '$from_code' AND '$to_code' AND SUB_LEVEL1 != '0000' AND SUB_LEVEL2 != '000' ORDER BY ACCOUNT_CODE ASC";
        $result = $conn->query($query);
        while($row = mysqli_fetch_array($result)) {
          $accountCode[] = $row['ACCOUNT_CODE'];
        }
// print_r($query);
// DIE();
      //  $accountCode = array_unique($accountCode1);
        $data_tr=''; 
        $data_tr1='';
        foreach($accountCode as $fromaccount) {
          $data_tr.='
          <div class="header">
            <div class="row">
              <div class = "report_section1 col-lg-6 col-md-6 col-sm-12">
                  <span class = "">'.$companyName.'</span>
              </div>
              <div class="report_section2 col-lg-6 col-md-6 col-sm-12">
                  <span class = "">'.date("l j F Y h:i:s A").'</span>
              </div>
            </div>
          </div>';
            $data_tr .='<table  style="border-collapse: collapse; width:100%;">
              <thead>
                <tr>
                     <th style = "width:12%;">Date</th>
                    <th style = "width:11%">Voucher#</th>
                    <th style = "width:48%">Particulars</th>
                    <th style = "width:12%">Debit</th>
                    <th style = "width:12%">Credit</th>
                    <th style = "width:14%">Balance</th>
                </tr>
              </thead>
              <tbody>
                <tr >
                  <td style = "border:none !important ;"></td>
                </tr>';
          $query = "Select * from ACT_LC_VIEW2 where co_code = '$company_code' AND account_code = '$fromaccount'";
          // print_r($query);
          // die();
          $result = $conn->query($query);
          while($show=$result->fetch_assoc()){
            $description = $show['DESCR'];
            $openDebit = $show['OPEN_DEBIT'];
            $openCredit = $show['OPEN_CREDIT'];
          }
          $query = "SELECT SUM(receipt_qty) AS Totalreceiptqty, SUM(issue_qty) As totalissueqty , SUM(debit) As totaldebit, 
          SUM(credit) As totalcredit FROM MASTER_VIEW_LEDGER a 
          WHERE a.co_code = '$company_code' 
          AND a.account_code = '$fromaccount' 
          AND a.voucher_date < '$from_date'";
            
      
          
          // print_r($query);
          // die();
          $result = $conn->query($query);
          if($result){
            while($show=$result->fetch_assoc()){
              $totalDebit = $show['totaldebit'];
              $totalCredit = $show['totalcredit'];
            }
          }else{
     
              $totalDebit = 0;
              $totalCredit = 0;
          }
          $finaldebit = $openDebit + $totalDebit;
          $finalcredit = $openCredit + $totalCredit;
          $balance = $finaldebit-$finalcredit;
          $balance1 = $finaldebit-$finalcredit;
          $balance3 = $finaldebit-$finalcredit;
          $dr = " DR";
          $cr = " CR";
          if($balance >0){
            $balance= number_format($balance,2);
          }else{
            $balance='';
          }

          if($balance1 <0){
            $balance1= $balance1*-1; 
            $balance1=number_format($balance1,2);
          }else{
            $balance1='';
          }
          $balance_t=$balance3;
          $balance3=$balance3 >= 0 ? number_format($balance3,2). $dr:number_format(($balance3*-1),2).$cr;
          // print_r($balance3);die();
          $data_tr .=' <tr id = "toprow" style="border:2px solid black" >
                          <td style = "font-weight:bold;">'.$fromaccount.'</td>
                          <td style = "font-weight:bold;" colspan="2">'.$description . ': Openning Balance</td>
                      
                          <td style="text-align:right;">'.$balance.'</td>
                          <td style="text-align:right;">'.$balance1.'</td>
                          <td class = "total" style="text-align:right;">'.$balance3.'</td>
                      </tr>
                      <tr >
                          <td style = "border:none !important;"></td>
                      </tr>';

          $totalDebit1 = 0;
          $totalCredit1 = 0;
          $query = "Select * from MASTER_VIEW_LEDGER where co_code = '$company_code' AND account_code = '$fromaccount' AND voucher_date between '$from_date' AND '$to_date' ORDER BY voucher_date ASC";
          
          // print_r($balance_t);die();
  
          // $query = "Select * from MASTER_VIEW_LEDGER where co_code = '11' AND account_code = '7010001001' AND voucher_date between '2022-03-01' AND '2022-03-30'";
          $result = $conn->query($query);
          if($result){
            while($show=$result->fetch_assoc()){
              $balance_t = $balance_t + $show['debit']-$show['credit'];
              $debitString = " DR";
              $creditString = " CR";

              $totalDebit1 = $totalDebit1 + $show['debit'];
              $totalCredit1 = $totalCredit1 + $show['credit'];
              $data_tr .='<tr>
                      <td>'.date('d-m-Y', strtotime($show["voucher_date"])).'</td>
                      <td>'.$show["voucher_type"].'&nbsp; &nbsp; &nbsp;'.$show["voucher_no"].'</td>
                      <td>'.$show["naration"].'</td>
        
                      <td class = "debit" style="text-align:right;">'.number_format($show["debit"],2).'</td>
                      <td class = "credit" style="text-align:right;">'.number_format($show["credit"],2).'</td>
                      <td class = "total" style="text-align:right;">'.($balance_t >= 0 ? number_format($balance_t,2). $debitString:number_format(($balance_t*-1),2).$creditString).'</td>
              </tr>';
            }
          }
      
  
          $data_tr .='
          <tr><td colspan="6" style="background:black"></td></tr>
          <tr>
                          <td colspan="3">Total</td>
                        
                          <td style="text-align:right;">'.number_format($totalDebit1,2).'</td>
                          <td style="text-align:right;">'.number_format($totalCredit1,2).'</td>
                          <td style="text-align:right;"></td>
                      </tr>
                      <tr><td colspan="6" style="background:black"></td></tr>
                      </tbody>
                      </table><pagebreak>
                      ';
        
        }
                    



// print_r($data_tr);die();

        $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
         $mpdf->setFooter('{PAGENO}');
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
                        <div>
                            '.$data_tr.'
                        </div>
                            
                            
                           
                               
                        
                    </div>

            </div>
        </div>', 2);
        $mpdf->Output();






                                
    





