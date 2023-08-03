<?php
session_start();
include("../api/auth/db.php");
require_once __DIR__  . '/vendor/autoload.php';
require_once __DIR__ . '/../helpers/helpers.php';
// $barcode = new Helpers();
    $company_code = $_GET['company_code1'];
// print_r($company_code);die();

        $fromaccount = $_GET['from_code1'];
        $toaccount = $_GET['to_code1'];
        $query = "Select * from company where co_code = '$company_code' ";
        $results = $conn->query($query);
        $shows=$results->fetch_assoc();
        $companyName = $shows['co_name'];
        // print_r($accountCode);die();
        $data_tr='';
        // print_r("hfdhfj");
        $query = "Select * from ACT_LC_VIEW2 where co_code ='$company_code' AND ACCOUNT_CODE between'$fromaccount' AND'$toaccount' AND SUB_LEVEL1 = '0000' AND SUB_LEVEL2 = '000' ORDER BY CONTROL_CODE ASC";
        // print_r($query);die();
            $result = $conn->query($query);
            while($show=$result->fetch_assoc()){
              $data_tr .=' <tr><td style = "border:none;"></td></tr>
                <tr>
                    <td class="" style = "font-size: 16;border:none;font-weight: bold;">'.$show["CONTROL_CODE"].'</td>
                    <td  class="ctrl_desc" style = "font-size: 16;border:none;font-weight: bold;">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<b>'.$show['DESCR'].'</b></td>
                </tr>';
              $data_tr .= ' <tr><td style = "border:none; padding: 8px 18px;"></td></tr>';
            }
        
      
      
                  
      
        $mpdf = new \Mpdf\Mpdf(['orientation' => 'P']);
        $stylesheet = file_get_contents('account_subsidary.css');
        //     // $mpdf->SetWatermarkText('PAID');
        //     // $mpdf->showWatermarkText = true;
        $mpdf->WriteHTML($stylesheet, 1);
        date_default_timezone_set("Asia/Karachi"); 
        $today = date("l F j G:i:s ");
        $mpdf = new \Mpdf\Mpdf(['orientation' => 'P']);
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
                                <span class = "">'.$companyName.'</span>
                            </div>
                            <div class="report_section2 col-lg-6 col-md-6 col-sm-12">
                                <span class = "">'.date("l j F Y h:i:s A").'</span>
                            </div>
                            </div>
                        </div>
                        </br>
                        <table class="text-center" style="background-color:grey;width:100%;border-bottom:2px solid black;">
                            <thead>
                                <tr class = "sticky">
                                <th style = "width:20%" class="code">Account Code</th>
                                <th style="text-align:left" class="des">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Description</th>
                                </tr>
                            </thead>
                        </table>
                        </br>
                            
                            
                       
                        <div>
                           
                            
                               <table>
                                '.$data_tr.'
                                </table>
                        </div>
                        
                    </div>

            </div>
        </div>', 2);
        $mpdf->Output();






                                
    





