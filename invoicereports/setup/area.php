<?php
session_start();
include("../../api/auth/db.php");
require_once __DIR__  . '/vendor/autoload.php';
require_once __DIR__ . '/../../helpers/helpers.php';
// $barcode = new Helpers();
// print_r($_GET);die();
if (isset($_GET['action']) && $_GET['action'] == 'print') {
    
        // print_r($_GET);die();
        $sql = "SELECT * FROM `area`";
                // print_r($sql); die();
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);
        // if($count > 1){
            $return_data=[];
            while($show = mysqli_fetch_assoc($result)){
                $return_data[] = $show; 
                // print_r($return_data);die();
                
            } 
        
                // print_r($return_data);die();
            foreach ($return_data as  $value) {
                // print_r($value);die();
                $data_tr .='<tr style="border:1px solid black">
                                <td style="width:20%; text-align:left">'.$value['area_code'].'</td>.
                                <td style="width:50%; text-align:left">'.$value['area_name'].'</td>
                                
                            </tr>';
            }
            $space='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
            $date= date("l,F d Y");
            $mpdf = new Mpdf\Mpdf(['orientation' => 'P']);
            //     // $mpdf->SetWatermarkText('PAID');
            //     // $mpdf->showWatermarkText = true;
            $mpdf->WriteHTML('
                    <h1>Area List<span style="font-size:15px;">'.$space.''.$date.'</span></h1>
                   <p style="border:1px solid black;">
                            <table style="padding-top:20px" class="table1" >
                            <tr>
                            <th style="width:70px; text-align:left";><h3>Area Code</h3></th>
                            <th style="width:auto;text-align:left";><h3>Area Name</h3></th>
                            </tr>
                            '.$data_tr.'
                            </table><br>
                            
                        
                            
                    </div>
                </div>
                            
        
            </div>', 2);
            $mpdf->Output();
        // }
} else {
    echo "action not matched";
}
?>




