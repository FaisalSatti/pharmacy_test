<?php
session_start();
include("../../api/auth/db.php");
require_once __DIR__ . '/../../helpers/helpers.php';
$sid = $_GET['sid'];
$did = $_GET['did'];
$sql = "SELECT a.*,b.div_name,c.product_name,d.gen_name,e.unit_name,f.co_name FROM items a 
inner join division b on a.div_code=b.div_code 
inner join product c on a.product_code=c.product_code 
inner join gen_name d on a.gen_code=d.gen_code
inner join unit e on a.um_code=e.unit_code
inner join company f on a.co_code=f.co_code
where a.co_code = '$sid' and a.div_code = '$did'";
// print_r($sql);die();
$result = $conn->query($sql);
$count = mysqli_num_rows($result);
if($count >0){
    $return_data=[];
    while($show = mysqli_fetch_assoc($result)){
        $return_data[] = $show; 
        $co_code = $show['co_code'];
        $co_name = $show['co_name'];
        $date = date("l, ") . date("F d Y");
        $space='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
    }
    $i=1;
    foreach ($return_data as  $value) {
        $data_tr.= '
        <table class="table_head" style="border:3px solid black;display:inline-block;width:100%;height:1200px;font-family:arial;margin-top:10px">
        <tr style="padding-top:55px;">
                <td style="text-align:center; width:15%">'.$value['item_name_pur'].'</td>
                <td colspan="1" style="text-align:center; width:15%">'.$value['hscode'].'</td>
                <td colspan="1" style="text-align:center; width:15%">'.$value['item_div'].'</td>
                <td colspan="1" style="text-align:center; width:15%">'.$value['div_name'].'</td>
                <td colspan="1" style="text-align:center; width:15%">'.$value['product_name'].'</td>
                <td colspan="1" style="text-align:center; width:15%">'.$value['gen_name'].'</td>
                <td colspan="1" style="text-align:center; width:15%">'.$value['unit_name'].'</td>
                <td colspan="1" style="text-align:center; width:15%">'.$value['pur_mode'].'</td>
                <td colspan="1" style="text-align:center; width:15%">'.NUMBER_FORMAT($value['trade_price'],2).'</td>
            </tr>
        </table>';
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
                <h5 style="border: 3px solid black; border-left:none;border-top:none;border-right:none; padding-bottom:10px"><span class="c_name" style="font-size: 11px; font-weight: bold;"><span style="font-size:16px;">'.$co_name.'</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LIST OF ITEM&nbsp;&nbsp;&nbsp;<span style="font-size: 19px; font-weight: bold; font-family: arial;">'.$co_code.'</span> </span> <span style="font-size: 12px; font-weight: normal;">'. $space.$space.$space.$page. $date.'</span> </h5>
                <h6 style="border: 0px solid black; border-left:none;border-top:none;border-right:none; padding-bottom:10px;">
                <div class="invoice_detail" style="padding:5px;height: 350px;border:px solid black">
                <table class="table_head" style="border:4px solid black;display:inline-block;width:100%;height:1200px;font-family:arial;border-left:none;border-right:none">
                    <tr style="padding-top:55px">
                        <td style="text-align:center; width:15%"><b>ITEM <br> NAME</b></td>
                        <td colspan="1" style="text-align:center; width:15%"><b>HSCODE</b></td>
                        <td colspan="1" style="text-align:center; width:15%"><b>CODE</b></td>
                        <td colspan="1" style="text-align:center; width:15%"><b>DIVISION</b></td>
                        <td colspan="1" style="text-align:center; width:15%"><b>PRODUCT</b></td>
                        <td colspan="1" style="text-align:center; width:15%"><b>GEN. <br> NAME</b></td>
                        <td colspan="1" style="text-align:center; width:15%"><b>UM</b></td>
                        <td colspan="1" style="text-align:center; width:15%"><b>MODE</b></td>
                        <td colspan="1" style="text-align:center; width:15%"><b>T.P</b></td>
                    </tr>

                </table>
                <br>

                <div class="invoice_detail" style="border-bottom: 0px solid black;">
                '.$data_tr.'
            </div>

                
            </div>
                </h6>
            </div>
        </div>
    </div>', 2);
    $mpdf->Output();
}else{
    echo "<body style=background:black;padding-top:18%><h3 style=color:red;text-align:center;>NO DATA FOUND</h3></body>";
}
        




