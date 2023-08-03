<?php
session_start();
include("../api/auth/db.php");
require_once __DIR__  . '/vendor/autoload.php';
require_once __DIR__ . '/../helpers/helpers.php';
// $barcode = new Helpers();
if (isset($_GET['action']) && $_GET['action'] == 'print') {


        $sql = "SELECT * FROM `city` ";
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);


        

        if($count > 1){
            $return_data=[];
            while($show = mysqli_fetch_assoc($result)){
                $return_data[] = $show; 
                
                $space='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

                // $page = 'page 1 of 1';
                
                $date = date("l, ") . date("F d Y");
                
                
                
            } 
            $i=1;
            foreach ($return_data as  $value) {
                $data_tr .='<tr style="border: px solid black">
                                <td style="border:px solid black;width:55px">'.$value['city_code'].'</td>
                                <td style="border:px solid black;width:70px">'.$value['city_name'].'</td>
                                </tr>';
                                // $data_tr2 .='';
                                
                                ++$i;
            }
            $mpdf = new \Mpdf\Mpdf(['orientation' => 'P']);
            $stylesheet = file_get_contents('stax_invoice.css');
            //     // $mpdf->SetWatermarkText('PAID');
            //     // $mpdf->showWatermarkText = true;
            $mpdf->WriteHTML($stylesheet, 1);
            $mpdf->WriteHTML('<div class="row">
            <div class="main">
            <div class="row">
            <div class="head">
            
            <h2 style="border: 3px solid black; border-left:none;border-right:none;"><span class="c_name" style="font-size: 25px; font-weight: bold;">CITY LIST</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <span style="font-size:15px;"></span> <span style="font-size: 11px; font-weight: normal;">'. $space .$page.'<b>'. $date.'</b></span> </h2>
            </div>
            
            
                            <div class="invoice_detail"  style="padding-top:10px;height: ;">
                            <table class="table_head" style="border: 3px solid black; border-bottom: none;border-left:none;border-right:none;display:inline-block;width:100%;height:;">
                                    <tr style="padding-top:53px">
                                    <td colspan="4" style="border: 0px solid red; text-align:center; width:10px;"><b>CITY CODE</b></td>
                                    <td colspan="4" style="border: 0px solid red; text-align:center; width:200px;"><b>CITY NAME</b></td>
                                    <br>
                                    </tr>

                                </table>
                                <table class="data1" style="border: 3px solid black; border-left:none;border-right:none;border-bottom:none;display:inline-block;width:100%;height:;padding-bottom:150px; text-align:center">

                                    '.$data_tr.'
                                </table>
                            </div>
                         
                        
                            
                    </div>
                </div>
                            
        
            </div>', 2);
            $mpdf->Output();
        }


     else {
        echo "form no required";
    }
} else {
    echo "action not matched";
}




