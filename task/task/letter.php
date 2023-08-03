<?php
session_start();
include("db.php");
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . './../helpers/helpers.php';
$barcode = new Helpers();

        $str = array_reverse($str);
        $result = implode('', $str);
        $points = ($point) ?
            "." . $words[$point / 10] . " " . 
                $words[$point = $point % 10] : '';
                if($points == 00)
                    {$nwords =  $result . "Rupees  Only.";}else{
        $nwords =  $result . "Rupees  " . $points . " Paise Only.";
        }
            // $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Legal']);
            // $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
            $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [210, 297]]);
            $stylesheet = file_get_contents('letter.css');
            $mpdf->SetWatermarkImage('../logo/ASF_PK_Logo.png',-0.2,'F',array(30,70));
            $mpdf->showWatermarkImage  = true;
            $mpdf->WriteHTML($stylesheet,1);
            $mpdf->WriteHTML('<div class="row">
                <div class="main"> 
                    <div class="firstrow">
                        <div class="Logo">
                            <img src="../logo/invoice.png">
                        </div>
                        <div class="bottomLogo">
                            <h2>ASF HOUSING SCHEME</h2>
                            <h2>KARACHI</h2>
                            <p>(A Project of ASF Foundation)</p>
                            <br><br><br><br><br><br><br><br>
                            <h2>ASF CITY KARACHI</h2>
                        </div>        
                    </div>
                    <div class="secondrow">
                        <div class="left">
                            <p>Registration No: <b><u>5001685</u><b></p>
                        </div>
                        <div class="right">
                            <p>Dated: <b>27 FEB 2021</b></p>
                        </div>
                    </div>
                            
                    <div class="detail">
                        <p>ASFF is pleased and honoured to have <b>IJAZ AHMAD</b> as member of the society. Registration No. <b>5001685</b> have been allocated with Residential <b>Plot No. 783(80
                        -Sqds), Block Quaid 2</b> against your booking in <b>ASF City Karachi</b>.</p>
                    </div>
                    <div class="note">
                        <p><b>Note:</b><br><b>Provisional allotment letter will be issued to you on completion of the <br> installments as per your payment plan.
                        </b></p>
                    </div>
                        <br><br><br><br>
                    <div class="signature">
                        <div class="signature_inner">
                            <h2 align="center" class="sigh">Director Sales & Marketing
                            ASF Foundation</h2>
                        </div>
                    </div>
                    <div class="footer">
                        <p align="center"><i class="fas fa-map-marker"></i>ASF Foundation Secretariat, HQ ASF, B-280, Old Area, Karachi - 75200 - Pakistan. </p>
                        <p align="center">03-111-333-225  (025) 111-273-555   www.asfhouingscheme.com</p>
                        <div class="row textbourder"></div> 
                        <br>
                        <div class="row textbourder2"></div>
                    </div>
                </div>
            </div>',2);
            $mpdf->Output();

?>