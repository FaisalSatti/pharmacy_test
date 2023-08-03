<?php
session_start();
include("../api/auth/db.php");
// require_once __DIR__  . '/vendor/autoload.php';
require_once __DIR__ . '/../helpers/helpers.php';
// $barcode = new Helpers();
// print_r($_GET);die();   
$sid = $_GET['sid'];
$did = $_GET['did'];
        // $sql = "SELECT * FROM party"; 

        // $sql = "SELECT a.* FROM `party` a inner join division b on a.div_code = b.div_code inner join city b on a.city_code = b.city_code where a.co_code = '$sid' and a.div_code = '$did'  ";

        $sql = "SELECT a.*,b.div_name,c.city_name FROM `party` a inner join division b on a.div_code = b.div_code inner join city c on a.city_code = c.city_code where a.co_code = '$sid' and a.div_code = '$did';";

        
        // print_r($sql); die();
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);
        
         
        
        // if($count > 1){
            $return_data=[];
            while($show = mysqli_fetch_assoc($result)){
                $return_data[] = $show; 
                
                $space='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

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
                                <td style="text-align:center;">'.$i.'</td>
                                <td style="text-align:center;">'.$value['bill_name'].'</td>
                                <td style="text-align:center;">'.$value['city_name'].'</td>
                                <td style="text-align:center;">'.$value['contact_name'].'</td>
                                <td style="text-align:center;">'.$value['gst'].'</td>
                                </tr>

                                <tr>
                                <td style="text-align:center;">'.$value['gl_code'].'</td>
                                <td style="text-align:center;">'.$value['gl_name'].'</td>
                                <td style="text-align:center;">'.$value['nic_nbr'].'</td>
                                <td style="text-align:center;">'.$value['phone_nos'].'</td>
                                <td style="text-align:center;">'.$value['ntn'].'</td>
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
            
            <h5 style="border: 5px solid black; border-left:none;border-top:none;border-right:none; padding-bottom:10px"><span class="c_name" style="font-size: 11px; font-weight: bold;">LIST OF ITEM<span style="font-size: 20px; font-weight: bolder; font-family: arial;">'.$value['party_div'].'</span> </span> <span style="font-size: 12px; font-weight: normal;">'. $space.$space .$page. $date.'</span> </h5>


            
            <h6 style="border: 4px solid black; border-left:none;border-top:none;border-right:none; padding-bottom:10px;">
            
            <span> &nbsp;&nbsp;&nbsp;&nbsp;ITEM NAME &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span>HSCODE &nbsp;&nbsp;</span>
            <span>CODE &nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span>DIVISION &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span>PRODUCT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span>GEN NAME&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span>UM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span>MODE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span>T.P.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>

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
 




