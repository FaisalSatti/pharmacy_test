<?php
session_start();
include("../api/auth/db.php");
// require_once __DIR__  . '/vendor/autoload.php';
require_once __DIR__ . '/../helpers/helpers.php';
$sid = $_GET['sid'];
// print_r($sid);die();
$sql = "SELECT p.*, c.city_name FROM `party` p, city c WHERE party_code=$sid and p.city_code = c.city_code";
$result = $conn->query($sql);
$count = mysqli_num_rows($result);
// if ($count > 1) 
// {
     $return_data = [];
     $i=1;
     while ($show = mysqli_fetch_assoc($result))
     {
         $return_data[] = $show;
        
     }
     foreach ($return_data as  $value)
         {
             $data_tr .= '
                        <table style="border:1px solid black;">
                            <tr>
                             <td style="width:120px; text-align:center">' . $i.'</td>
                             <td style="width:120px; text-align:center">' . $value['party_name'].'</td> 
                             <td style="width:120px; text-align:center">' . $value['city_name'].'</td> 
                             <td style="width:120px; text-align:center">' . $value['contact_name'].'</td> 
                             <td style="width:120px; text-align:center">' . $value['gst'] . '</td>
                            </tr>
                            <tr>
                             <td style="width:120px; text-align:center">' . $value['party_div'].'</td>
                             <td style="width:220px; text-align:center">' . $value['address'] .'</td>
                             <td style="width:120px; text-align:center">' . $value['nic_nbr'] .'</td>
                             <td style="width:120px; text-align:center">' . $value['phone_nos'] .'</td>
                             <td style="width:80px; text-align:center">' . $value['ntn'] .'</td>;
                            </tr>
                        </table>';
                        ++$i;
         }
     $space = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
     $date = date("l,F d Y");
     $mpdf = new Mpdf\Mpdf(['orientation' => 'P']);
     $mpdf->WriteHTML('
                             <h2>Party List &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="font-size:15px;">{Party Information}</span> <span style="font-size:10px;">' . $space . '' . $date . '</span></h2>
                             <h1 style="border-bottom:2px solid black;"></h1>
                             <table class="table1" >
                             <tr>
                             <th style="width:120px; text-align:center";><h5>SR#<span><br>Party Code</span></h5></th>
                             <th style="width:220px; text-align:center";><h5>Party Name<span><br>Address</span></h5></th>
                             <th style="width:120px; text-align:center";><h5>City Name<span><br>NIC Nbr</span></h5></th>
                             <th style="width:120px; text-align:center";><h5>Conatct Person<span><br>Phone#</span></h5></th>
                             <th style=" width:80px; text-align:center";><h5>GST Nbr<span><br>NTN Nbr</span></h5></th>
                             </tr>
                             </table>
                             <h1 style="border-bottom:2px solid black;"></h1>
                             ' . $data_tr . '

                             ', 2);
     $mpdf->Output();
// }
?>
  