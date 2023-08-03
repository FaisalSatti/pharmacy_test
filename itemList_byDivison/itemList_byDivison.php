<?php
session_start();
include("../api/auth/db.php");
require_once __DIR__  . '/vendor/autoload.php';
require_once __DIR__ . '/../helpers/helpers.php';
// $barcode = new Helpers();
// print_r($_GET);die();   
$sid = $_GET['sid'];
$did = $_GET['did'];
        // $sql = "SELECT * FROM party"; 

        // $sql = "SELECT a.* FROM `party` a inner join division b on a.div_code = b.div_code inner join city b on a.city_code = b.city_code where a.co_code = '$sid' and a.div_code = '$did'  ";

        // $sql = "SELECT a.*,b.div_name,c.city_name FROM `party` a inner join division b on a.div_code = b.div_code inner join city c on a.city_code = c.city_code where a.co_code = '$sid' and a.div_code = '$did';";

        $sql = "SELECT ITEM_NAME,ITEM,DIV_NAME,PRODUCT_NAME,GEN_NAME,UM_NAME,PUR_MODE,TRADE_PRICE,HSCODE FROM ITEM_DETAIL_UM WHERE DIV_CODE = '$did' AND CO_CODE = '$sid' ORDER BY CAST(DIV_CODE AS UNSIGNED),ITEM_NAME";

        
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);
        
        // print_r($sql); die();
        
        
        // if($count > 1){
            $return_data=[];
            while($show = mysqli_fetch_assoc($result)){
                $return_data[] = $show; 
                
                $space='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

                // $page = 'page 1 of 1';
                
                $date = date("l, ") . date("F d Y");
                
                
                
                // print_r($show);
            } 
            // print_r($return_data);die();
            // die();
            $i=1;
            foreach ($return_data as  $value) {
                $data_tr .=
                '<table  class="data1" style="border: 3px solid black; border-bottom:none; display:inline-block; width:100%;height:;padding-bottom:150px">
                <tr style="border: 2px solid red;">
                                <td style="width:95px;text-align:center;">'.$value['item_name'].'</td>
                                <td style="width:60px;text-align:center;">'.$value['hscode'].'</td>
                                <td style="width:30px;text-align:center;">'.$value['item'].'</td>
                                <td style="width:65px;text-align:center;">'.$value['div_name'].'</td>
                                <td style="width:80px;text-align:center;">'.$value['product_name'].'</td>
                                <td style="width:90px;text-align:center;">'.$value['gen_name'].'</td>
                                <td style="width:50px;text-align:center;">'.$value['um_name'].'</td>
                                <td style="width:100px;text-align:center;">'.$value['pur_mode'].'</td>
                                <td style="width;text-align:center;">'.$value['trade_price'].'</td>
                          
                                </tr>
                </table>
                                ';
                                
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
            
            <h5 style="border: 5px solid black; border-left:none;border-top:none;border-right:none; padding-bottom:10px"><span class="c_name" style="font-size: 11px; font-weight: bolder;">LIST OF ITEMS  = <span style="font-size: 20px; font-weight: bolder; font-family: arial;"></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="border: 3px solid black; font-size: 30px;">&nbsp;&nbsp;&nbsp; 1 &nbsp;&nbsp;&nbsp;</span> </span> <span style="font-size: 12px; font-weight: normal;">'. $space .$page. $date.'</span> </h5>


            
            <h6 style="border: 4px solid black; border-left:none;border-top:none;border-right:none; padding-bottom:10px;">
            
            <span> &nbsp;&nbsp;ITEM NAME &nbsp; &nbsp; &nbsp; </span>
            <span>HSCODE &nbsp;&nbsp;&nbsp;</span>
            <span>CODE &nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span>DIVISION &nbsp;&nbsp;&nbsp;</span>
            <span>PRODUCT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span>GEN NAME&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span>UM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span>MODE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; T.P.</span>

            </h6>
            </div>
            <br>
            
            
                            <div class="invoice_detail" style="border-bottom: 3px solid black;">
                            

                                '.$data_tr.'
                            </div>
                         
                        
                            
                    </div>
                </div>
                            
        
            </div>', 2);
            $mpdf->Output();
 




