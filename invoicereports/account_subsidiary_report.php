<?php
session_start();
include("../api/auth/db.php");
require_once __DIR__  . '/vendor/autoload.php';
require_once __DIR__ . '/../helpers/helpers.php';
// $barcode = new Helpers();
        // print_r($_GET);die();
        $company_code = $_GET['company_code1'];
        $from_code = $_GET['from_code1'];
        $to_code = $_GET['to_code1'];
        $query = "Select * from company where co_code = '$company_code' ";
        $results = $conn->query($query);
        $shows=$results->fetch_assoc();
        $companyName = $shows['co_name'];
        $query = "select distinct CONTROL_CODE from act_chart where co_code = '$company_code' AND account_code between '$from_code' AND '$to_code' ORDER BY account_code ASC";
        $result = $conn->query($query);
        while($row = mysqli_fetch_array($result)) {
          $accountCode[] = $row['CONTROL_CODE'];
        }
        $data_tr='';
        foreach($accountCode as $fromaccount) {
          
          $query = "Select * from act_chart where co_code = '$company_code' AND CONTROL_CODE = $fromaccount AND SUB_LEVEL1 = '0000' AND SUB_LEVEL2 = '000' ORDER BY CONTROL_CODE ASC";
          $result = $conn->query($query);
          while($show=$result->fetch_assoc()){
            
            $data_tr .= ' <table >
            <tr>
            <td class="ctrl_code" style = "border:none;font-weight: bolder;font-size: 24px;"><b>'.$show['control_code'].'</b></td>
            <td class="ctrl_desc" style = "border:none;font-weight: bolder;font-size: 20px;"><b>&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;'.$show['descr'].'</b></td>
            <td></td>
            
            </tr>
            </table>
            ';
            
            $abc = "Select * from act_chart WHERE co_code = '$company_code' AND CONTROL_CODE = '$fromaccount' AND SUB_LEVEL1 <> '0000' AND SUB_LEVEL2 = '000'";
            $report = $conn->query($abc);
            while($res=$report->fetch_assoc()){
              $sublevel1 = $res['sub_level1'];
              $data_tr .=' <table>
              <tr>
              <td class="sub_lvl1" style = "font-size: 20px;text-align:left;">&nbsp;&nbsp;&nbsp;  '.$res['sub_level1'].'</td>
              <td class="sub_desc1" style = "font-size: 14px;text-align:left;">&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;'.$res['descr'].'</td>
              <td></td>
              </tr></table>
              ';
              
              $xyz = "Select * from act_chart WHERE co_code = '$company_code' AND CONTROL_CODE = '$fromaccount' AND SUB_LEVEL1  = '$sublevel1' AND SUB_LEVEL2 <> '000'";
              // print_r($xyz);
              // die();
              $report1 = $conn->query($xyz);
                  while($res1=$report1->fetch_assoc()){

                    $data_tr .=' <table style="border-bottom:2px solid lightgrey">
                     <tr>
                      <td style="text-align:left;font-size: 15px;" class="sub_level2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$res1['sub_level2'].'</td>
                      <td style="text-align:left;font-size: 12px; " class="sub_desc2">&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;'.$res1['descr'].'</td>
                      <td ></td>
            
                     </tr></table>
                     ';

                  }
                  $data_tr .='<br>';

                } 
              }
        }
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
                        <table class="text-center"  style="background-color:grey;width:100%;border-bottom:2px solid black;">
                            <thead>
                                <tr class = "sticky">
                                <th style = "width:20%" class="code">Account Code</th>
                                <th style="text-align:left" class="des">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Description</th>
                                </tr>
                            </thead>
                        </table>
                        </br>
                            
                            
                        
                        <div>
                           
                            
                               
                                '.$data_tr.'
                        </div>
                        
                    </div>

            </div>
        </div>', 2);
        $mpdf->Output();






                                
    





