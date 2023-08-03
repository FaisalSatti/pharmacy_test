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
        $from_code1=mb_substr($from_code_org, 0, 1);
        $to_code1=mb_substr($to_code_org, 0, 1);
        if($to_code1 < $from_code1){
            $from_code=$to_code_org;
            $to_code=$from_code_org;
        }else{
            $from_code=$from_code_org;
            $to_code=$to_code_org;
        }
        // print_r($from_code);
        // print_r($to_code);die();
        $division_code = $_GET['division_code'];
        $division_name = $_GET['division_name'];
        $item_code = $_GET['item_code'];
        $purchase_mode = $_GET['purchase_mode'];
        $product_code = $_GET['product_code'];
        $from_date = $_GET['from_date'];
        $to_date = $_GET['to_date'];
        $location_code = $_GET['location_code'];
        $query = "Select * from company where co_code = '$company_code' ";
        $results = $conn->query($query);
        $shows=$results->fetch_assoc();
        $companyName = $shows['co_name'];
        if($division_code !='null'){
            $merge_d=" AND div_code = '$division_code'";
        }else{
            $merge_d='';
        }
        if($to_code !='null' and $from_code !='null'){
            $merge_e=" AND gen_code between $from_code  and $to_code";
        }else{
            $merge_e='';
        }
        if($item_code !='null'){
            $merge_i=" AND item_code = IFNULL('$item_code',item_code)";
        }else{
            $merge_i='';
        }
        // if($purchase_mode !='null'){
        //     $merge_p=" AND pur_mode = IFNULL($purchase_mode,pur_mode)";
        // }else{
        //     $merge_p='';
        // }
        if($product_code !='null'){
            $merge_pro=" AND product_code = IFNULL('$product_code',product_code)";
        }else{
            $merge_pro='';
        }
        
        if($location_code !='null'){
            $merge_loc=" AND loc_code = IFNULL('$location_code',loc_code)";
        }else{
            $merge_loc='';
        }
        $query = "SELECT 
        div_code,div_name,gen_code,gen_name,product_code,product_name,
        item_code,item_name,pur_mode,loc_code,um_name,
        sum(IFNULL(open_stock,0)) + sum(IFNULL(adj_qty,0))  open_stock
        from item_wh_um_view_batch
        where co_code = '$company_code' AND pur_mode = IFNULL('$purchase_mode',pur_mode)
        $merge_d  $merge_e $merge_i  $merge_pro $merge_loc
        group by
        div_code,div_name,gen_code,gen_name,product_code,product_name,
        item_code,item_name,pur_mode,loc_code,um_name
        order by div_name,gen_code,gen_name,product_name,item_name,CAST(loc_code  AS SIGNED)";
        // PRINT_R($query);DIE();
        $result = $conn->query($query);
        $count = mysqli_num_rows($result);



      if ($count > 0) {
        $return_data = [];
        while ($show = mysqli_fetch_assoc($result)) {
            $return_data[] = $show;

            $data_tr=''; 
            $data_tr1='';
            // print_r($return_data); die();
            
            $div_code = $return_data[0]['div_code'];
            $div_name = $return_data[0]['div_name'];
            $gen_code = $return_data[0]['gen_code'];
            $gen_name = $return_data[0]['gen_name'];
            $product_code = $return_data[0]['product_code'];
            $product_name = $return_data[0]['product_name'];
            // $item_code = $return_data[0]['item_code'];
            // $item_name = $return_data[0]['item_name'];
            $pur_mode = $return_data[0]['pur_mode'];
            $um_name = $return_data[0]['um_name'];
            // $open_qty = $return_data[0]['open_qty'];
            
        }

        $i = 1;
        $tot_div_opening=0;
        $tot_div_purchase=0;
        $tot_div_production=0;
        $tot_div_trin=0;
        $tot_div_sale_rt=0;
        $tot_div_receipt=0;
        $tot_div_dc=0;
        $tot_tot_div_issues=0;
        $tot_div_trout=0;
        $tot_div_pur_ret=0;
        $tot_div_issues=0;
        $tot_div_balance=0;
        $gl_code_loop='';
        $div_code_pre='';
        $gen_code_pre='';
        $tot_div_opening=0;
        $total_opening=0;
        $total_purchase=0;
        $total_production=0;
        $total_tr_in=0;
        $total_sale_rt=0;
        $total_total_receipt=0;
        $total_dc=0;
        $total_issue=0;
        $total_tr_out=0;
        $total_pur_ret=0;
        $total_total_issue=0;
        $total_balance=0;
        foreach ($return_data as $value) {
          $open_qty = $value['open_stock'];
          $item_code = $value['item_code'];
            $query1="SELECT sum(IFNULL(RECEIPT_QTY,0)) AS pur_qty
            from   master_view_item_batch 
            where  co_code       = '$company_code'
            and    item_code     = '$item_code'
            and    doc_type      in ('GRNI', 'GRNL')
            and    loc_code      ='$location_code'
            and    doc_date      < '$from_date'";
            // PRINT_R($query1);DIE();
            $result1 = $conn->query($query1);
            $show1 = mysqli_fetch_assoc($result1);
            $pur_qty=$show1['pur_qty'];
           
            $query2="select sum(IFNULL(receipt_qty,0)) AS prod_qty
            from   master_view_item_batch 
                where  co_code       = '$company_code'
                and    item_code     = '$item_code'
                and    doc_type      in ('PR')
                and    loc_code      ='$location_code'
                and    doc_date      < '$from_date'";
                // print_r($query2);
            $result2 = $conn->query($query2);
            $show2 = mysqli_fetch_assoc($result2);
            $prod_qty=$show2['prod_qty'];
      
            $query3="select sum(IFNULL(receipt_qty,0)) AS trin_qty
            from   master_view_item_batch
                where  co_code       = '$company_code'
                and    item_code     = '$item_code'
                and    doc_type      in ('TT','TTDIV')
                and    loc_code      ='$location_code'
                and    doc_date      < '$from_date'";
            $result3 = $conn->query($query3);
            $show3 = mysqli_fetch_assoc($result3);
            $trin_qty=$show3['trin_qty'];
      
            $query4="select sum(IFNULL(receipt_qty,0))  AS rt_qty
            from   master_view_item_batch
                where  co_code       = '$company_code'
                and    item_code     = '$item_code'
                and    doc_type       in ('RT','IRLN')
                and    loc_code      ='$location_code'
                and    doc_date      < '$from_date'";
            $result4 = $conn->query($query4);
            $show4 = mysqli_fetch_assoc($result4);
            $rt_qty=$show4['rt_qty'];
      
            $query5="select sum(IFNULL(issue_qty,0)) AS dc_qty
            from   master_view_item_batch
                where  co_code       = '$company_code'
                and    item_code     = '$item_code'
                and    doc_type        in ('DC','ISLN')
                and    loc_code      ='$location_code'
                and    doc_date      < '$from_date'";
            $result5 = $conn->query($query5);
            $show5 = mysqli_fetch_assoc($result5);
            $dc_qty=$show5['dc_qty'];
      
            $query6="select sum(IFNULL(issue_qty,0)) AS iss_qty
            from   master_view_item_batch
                where  co_code       = '$company_code'
                and    item_code     = '$item_code'
                and    doc_type        in ('GIN')
                and    loc_code      ='$location_code'
                and    doc_date      < '$from_date'";
            $result6 = $conn->query($query6);
            $show6 = mysqli_fetch_assoc($result6);
            $iss_qty=$show6['iss_qty'];
      
            $query7="select sum(IFNULL(issue_qty,0)) AS trout_qty
            from   master_view_item_batch
                where  co_code       = '$company_code'
                and    item_code     = '$item_code'
                and    doc_type   in ('TR','TRDIV')
                and    loc_code      ='$location_code'
                and    doc_date      < '$from_date'";
            $result7 = $conn->query($query7);
            $show7 = mysqli_fetch_assoc($result7);
            $trout_qty=$show7['trout_qty'];
      
            $query8="select sum(IFNULL(issue_qty,0)) AS purret_qty
            from   master_view_item_batch
                where  co_code       = '$company_code'
                and    item_code     = '$item_code'
                and    doc_type   in ('GRRT', 'GRRI')
                and    loc_code      ='$location_code'
                and    doc_date      < '$from_date'";
            $result8 = $conn->query($query8);
            $show8 = mysqli_fetch_assoc($result8);
            $purret_qty=$show8['purret_qty'];
            // print_r($open_qty);die();
            $todateopen = ($open_qty??0 + $pur_qty??0 + $prod_qty??0  + $trin_qty??0 + $rt_qty??0) -
              ($dc_qty??0 + $iss_qty??0  + $trout_qty??0 + $purret_qty??0);
              // PRINT_R($todateopen);die();
            $query9="SELECT sum(IFNULL(receipt_qty,0)) AS mqty
            from   master_view_item_batch
                where  co_code       = '$company_code'
                and    item_code     = '$item_code'
                and    doc_type   in ('GRNI', 'GRNL')
                and    loc_code      ='$location_code'
                and    doc_date  BETWEEN '$from_date' AND '$to_date'";
            $result9 = $conn->query($query9);
            $show9 = mysqli_fetch_assoc($result9);
            $purchase=$show9['mqty'];
  
            $query10="SELECT sum(IFNULL(receipt_qty,0)) AS mqty
            from   master_view_item_batch
                where  co_code       = '$company_code'
                and    item_code     = '$item_code'
                and   doc_type      in ('PR')
                and    loc_code      ='$location_code'
                and    doc_date  BETWEEN '$from_date' and '$to_date'";
                // print_r($query10);
                // die();
            $result10 = $conn->query($query10);
            $show10 = mysqli_fetch_assoc($result10);
            $production=$show10['mqty'];
  
            $query11="SELECT sum(IFNULL(receipt_qty,0)) AS mqty
            from   master_view_item_batch
                where  co_code       = '$company_code'
                and    item_code     = '$item_code'
                and   doc_type   in ('TT', 'TTDIV')
                and    loc_code      ='$location_code'
                and    doc_date  BETWEEN '$from_date' AND '$to_date'";
            $result11 = $conn->query($query11);
            $show11 = mysqli_fetch_assoc($result11);
            $trin=$show11['mqty'];
            
            $query12="SELECT sum(IFNULL(receipt_qty,0)) AS mqty
            from   master_view_item_batch
                where  co_code       = '$company_code'
                and    item_code     = '$item_code'
                and   doc_type in ('RT', 'IRLN')
                and    loc_code      ='$location_code'
                and    doc_date  BETWEEN '$from_date' AND '$to_date'";
            $result12 = $conn->query($query12);
            $show12 = mysqli_fetch_assoc($result12);
            $sale_rt=$show12['mqty'];
            
            $query13="SELECT sum(IFNULL(issue_qty,0)) AS mqty
            from   master_view_item_batch
                where  co_code       = '$company_code'
                and    item_code     = '$item_code'
                and   doc_type in ('DC', 'ISLN')
                and    loc_code      ='$location_code'
                and    doc_date  BETWEEN '$from_date' AND '$to_date'";
            $result13 = $conn->query($query13);
            $show13 = mysqli_fetch_assoc($result13);
            $dc=$show13['mqty'];
  
            $query14="SELECT sum(IFNULL(issue_qty,0)) AS mqty
            from   master_view_item_batch
                where  co_code       = '$company_code'
                and    item_code     = '$item_code'
                and   doc_type   in ('GIN')
                and    loc_code      ='$location_code'
                and    doc_date  BETWEEN '$from_date' AND '$to_date'";
            // print_r($query14);die();
            $result14 = $conn->query($query14);
            $show14 = mysqli_fetch_assoc($result14);
            $issue=$show14['mqty'];
            $query15="SELECT sum(IFNULL(issue_qty,0)) AS mqty
            from   master_view_item_batch
                where  co_code       = '$company_code'
                and    item_code     = '$item_code'
                and   doc_type in ('TR', 'TRDIV')
                and    loc_code      ='$location_code'
                and    doc_date  BETWEEN '$from_date' AND '$to_date'";
            $result15 = $conn->query($query15);
            $show15 = mysqli_fetch_assoc($result15);
            $trout=$show15['mqty'];
            $query16="SELECT sum(IFNULL(issue_qty,0)) AS mqty
            from   master_view_item_batch
                where  co_code       = '$company_code'
                and    item_code     = '$item_code'
                and   doc_type in ('GRRT', 'GRRI')
                and    loc_code      ='$location_code'
                and    doc_date  BETWEEN '$from_date' AND '$to_date'";
            print_r($query16);
            $result16 = $conn->query($query16);
            $show16 = mysqli_fetch_assoc($result16);
            $pur_ret=$show16['mqty'];
            $tot_out=($dc??0) + ($issue??0) +($trout??0) +($pur_ret??0);
            $total_receipt=($todateopen??0) + ($purchase??0) +($production??0) +($trin??0) +($sale_rt);
  
            $bal=($total_receipt??0) - ($tot_out??0);
            // print_r($total_receipt);die();
            // $gl_account = $value['gl_code'];
            // if($i==1){
            
  
  
  
  
  
  
              // if($gl_account != $gl_code_loop){
                $div_code_new = $value['div_code'];
                $gen_code_new = $value['gen_code'];
                // PRINT_R($gen_code_new);
                // PRINT_R("NEW");
                // PRINT_R($gen_code_pre);
                // PRINT_R("PRE");
                
                $product_name = $value['product_name'];
                $item_name = $value['item_name'];
                $item_code = $value['item_code'];
                $um_name = $value['um_name'];
                $pur_mode = $value['pur_mode'];
                $product_name = $value['product_name'];
                // if($i !=1){
                //   $data_tr .='
                //   <tr style="border:4px solid black;">
                //     <th style = " font-size:16px;width:23%;text-align:center"></th>
                //     <th style = " font-size:16px;text-align:right;width:13%">Generic</th>
                //     <th style = " font-size:16px;text-align:left;width:15%">Total</th>
                //     <th style = " font-size:16px;text-align:right;width:15%">500</th>
                //     <th style = " font-size:16px;text-align:right;width:15%">5,250</th>
                //     <th style = " font-size:16px;text-align:right;width:16%">1,275</th>
                //     <th style = " font-size:16px;text-align:right;width:16%">3,850</th>
                //     <th style = " font-size:16px;text-align:right;width:16%">6,300</th>
                //     <th style = " font-size:16px;text-align:right;width:16%">48,000</th>
                //     <th style = " font-size:16px;text-align:right;width:16%">3,150</th>
                //     <th style = " font-size:16px;text-align:right;width:16%">3,000</th>
                //     <th style = " font-size:16px;text-align:right;width:16%">700</th>
                //     <th style = " font-size:16px;text-align:right;width:16%">700</th>
                //     <th style = " font-size:16px;text-align:right;width:16%">4,375</th>
                //     <th style = " font-size:16px;text-align:right;width:16%">175</th>
                //   </tr>
                //   </table>
                //   <table style="border-left:4px solid black;border-right:4px solid black;border-collapse:collapse;">';
                // }
              if($div_code_pre != $div_code_new){
                
                if($i !=1){
                  $data_tr .='
                  <tr style="border:4px solid black;">
                    <th style = " font-size:16px;width:23%;text-align:center"></th>
                    <th style = " font-size:16px;text-align:right;width:13%">Generic</th>
                    <th style = " font-size:16px;text-align:left;width:15%">Total</th>
                    <th style = " font-size:16px;text-align:right;width:15%">'.number_format($total_opening,2).'</th>
                    <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_purchase,2).'</th>
                    <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_production,2).'</th>
                    <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_tr_in,2).'</th>
                    <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_sale_rt,2).'</th>
                    <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_total_receipt,2).'</th>
                    <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_dc,2).'</th>
                    <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_issue,2).'</th>
                    <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_tr_out,2).'</th>
                    <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_pur_ret,2).'</th>
                    <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_total_issue,2).'</th>
                    <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_balance,2).'</th>
                  </tr>
                  <tr style="border:4px solid black;">
                    <th style = " font-size:16px;width:23%;text-align:center"></th>
                    <th style = " font-size:16px;text-align:right;width:13%">Division</th>
                    <th style = " font-size:16px;text-align:left;width:15%">Total</th>
                    <th style = " font-size:16px;text-align:right;width:15%">'.number_format($tot_div_opening,2).'</th>
                    <th style = " font-size:16px;text-align:right;width:16%">'.number_format($tot_div_purchase,2).'</th>
                    <th style = " font-size:16px;text-align:right;width:16%">'.number_format($tot_div_production,2).'</th>
                    <th style = " font-size:16px;text-align:right;width:16%">'.number_format($tot_div_trin,2).'</th>
                    <th style = " font-size:16px;text-align:right;width:16%">'.number_format($tot_div_sale_rt,2).'</th>
                    <th style = " font-size:16px;text-align:right;width:16%">'.number_format($tot_div_receipt,2).'</th>
                    <th style = " font-size:16px;text-align:right;width:16%">'.number_format($tot_div_dc,2).'</th>
                    <th style = " font-size:16px;text-align:right;width:16%">'.number_format($tot_tot_div_issues,2).'</th>
                    <th style = " font-size:16px;text-align:right;width:16%">'.number_format($tot_div_trout,2).'</th>
                    <th style = " font-size:16px;text-align:right;width:16%">'.number_format($tot_div_pur_ret,2).'</th>
                    <th style = " font-size:16px;text-align:right;width:16%">'.number_format($tot_div_issues,2).'</th>
                    <th style = " font-size:16px;text-align:right;width:16%">'.number_format($tot_div_balance,2).'</th>
                  </tr>
                  </table>';
                  
                }
                
                $total_opening=0;
                $total_purchase=0;
                $total_production=0;
                $total_tr_in=0;
                $total_sale_rt=0;
                $total_total_receipt=0;
                $total_dc=0;
                $total_issue=0;
                $total_tr_out=0;
                $total_pur_ret=0;
                $total_total_issue=0;
                $total_balance=0;
                $data_tr .='
                    <div class = "col-lg-6 col-md-6 col-sm-12" style="margin-top:20px;">
                        <span class = "" style="font-weight:bold;font-size:20px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  '.$value['div_name'].'</span>  
                        <span class = "" style="font-weight:bold;font-size:18px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  '.$value['div_code'].'</span>  
                    </div>
                    <br>
                    <div class = " col-lg-6 col-md-6 col-sm-12" style="margin-top:2px;">
                        <span class = "" style="font-weight:bold;font-size:15px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   '.$value['gen_name'].'</span>  
                        <span class = "" style="font-weight:bold;font-size:15px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$value['gen_code'].'</span>  
                    </div>
  
                    <br>
                    
                    <div class = " col-lg-6 col-md-6 col-sm-12" style="margin-top:2px;">
                        <span class = "" style="font-weight:bold;font-size:10px">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;   </span>  
                        <span class = "" style="font-weight:bold;font-size:10px">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;****************************  Receipts  **************************** </span>  
                        <span class = "" style="font-weight:bold;font-size:10px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;***************************  Issues  ***************************  </span>
                    </div>
                    <table style="border: 4px solid black; padding:10px;white-space: nowrap;">
                      <tr style="border: 2px solid black ;">
                          <th style = " font-size:16px;border: 2px solid black ;width:23%;text-align:left"> Product / Item Name</th>
                          <th style = " font-size:16px;text-align:center;border: 2px solid black ;width:13%">Item# / UM</th>
                          <th style = " font-size:16px;text-align:center;border: 2px solid black ;width:15%">Loc/Mode</th>
                          <th style = " font-size:16px;text-align:center;border: 2px solid black ;width:15%">Opening</th>
                          <th style = " font-size:16px;text-align:center;border: 2px solid black ;width:15%">Purchase</th>
                          <th style = " font-size:16px;text-align:center;border: 2px solid black ;width:16%">Prod</th>
                          <th style = " font-size:16px;text-align:center;border: 2px solid black ;width:16%">TR In</th>
                          <th style = " font-size:16px;text-align:center;border: 2px solid black ;width:16%">Sale Rt</th>
                          <th style = " font-size:16px;text-align:center;border: 2px solid black ;width:16%">Tot Rcpts</th>
                          <th style = " font-size:16px;text-align:center;border: 2px solid black ;width:16%">DC</th>
                          <th style = " font-size:16px;text-align:center;border: 2px solid black ;width:16%">Issues</th>
                          <th style = " font-size:16px;text-align:center;border: 2px solid black ;width:16%">TR Out</th>
                          <th style = " font-size:16px;text-align:center;border: 2px solid black ;width:16%">Pur Ret</th>
                          <th style = " font-size:16px;text-align:center;border: 2px solid black ;width:16%">Tot Iss</th>
                          <th style = " font-size:16px;text-align:center;border: 2px solid black ;width:16%">Balance</th>
                      </tr>
  
                      <tr>
                        <th style = " font-size:16px;line-height:10px;border: 0px solid red ;width:25%;text-align:left"> &nbsp; </th>
                        <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:13%"> </th>
                        <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:15%"> </th>
                        <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:12%"></th>
                        <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:12%"></th>
                        <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:14%"></th>
                        <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:14%"></th>
                        <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:14%"> </th>
                        <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:14%"></th>
                        <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:14%"> </th>
                        <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:14%"></th>
                        <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:14%"></th>
                        <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:14%"> </th>
                        <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:14%"></th>
                        <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:14%"> </th>
                      </tr>
                    </table>
                    
                    <table style="border-left:4px solid black;border-right:4px solid black;border-collapse:collapse;white-space: nowrap;">
                ';
              }elseif($gen_code_pre != $gen_code_new){
                if($i !=1){
                  $data_tr .='
                  <tr style="border:4px solid black;">
                    <th style = " font-size:16px;width:23%;text-align:center"></th>
                    <th style = " font-size:16px;text-align:right;width:13%">Generic</th>
                    <th style = " font-size:16px;text-align:left;width:15%">Total</th>
                    <th style = " font-size:16px;text-align:right;width:15%">'.number_format($total_opening,2).'</th>
                    <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_purchase,2).'</th>
                    <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_production,2).'</th>
                    <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_tr_in,2).'</th>
                    <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_sale_rt,2).'</th>
                    <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_total_receipt,2).'</th>
                    <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_dc,2).'</th>
                    <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_issue,2).'</th>
                    <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_tr_out,2).'</th>
                    <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_pur_ret,2).'</th>
                    <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_total_issue,2).'</th>
                    <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_balance,2).'</th>
                  </tr>
                  </table>';
                }
                
                $total_opening=0;
                $total_purchase=0;
                $total_production=0;
                $total_tr_in=0;
                $total_sale_rt=0;
                $total_total_receipt=0;
                $total_dc=0;
                $total_issue=0;
                $total_tr_out=0;
                $total_pur_ret=0;
                $total_total_issue=0;
                $total_balance=0;
                $data_tr .='
                <br>
                <div class = " col-lg-6 col-md-6 col-sm-12" style="margin-top:2px;">
                    <span class = "" style="font-weight:bold;font-size:15px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   '.$value['gen_name'].'</span>  
                    <span class = "" style="font-weight:bold;font-size:15px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$value['gen_code'].'</span>  
                </div>
  
                <br>
                
                <div class = " col-lg-6 col-md-6 col-sm-12" style="margin-top:2px;">
                    <span class = "" style="font-weight:bold;font-size:10px">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;   </span>  
                    <span class = "" style="font-weight:bold;font-size:10px">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;****************************  Receipts  **************************** </span>  
                    <span class = "" style="font-weight:bold;font-size:10px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;***************************  Issues  ***************************  </span>
                </div>
                
                <table style="border: 4px solid black; padding:10px;white-space: nowrap;">
                <tr style="border: 2px solid black ;">
                    <th style = " font-size:16px;border: 2px solid black ;width:23%;text-align:left"> Product / Item Name</th>
                    <th style = " font-size:16px;text-align:center;border: 2px solid black ;width:13%">Item# / UM</th>
                    <th style = " font-size:16px;text-align:center;border: 2px solid black ;width:15%">Loc/Mode</th>
                    <th style = " font-size:16px;text-align:center;border: 2px solid black ;width:15%">Opening</th>
                    <th style = " font-size:16px;text-align:center;border: 2px solid black ;width:15%">Purchase</th>
                    <th style = " font-size:16px;text-align:center;border: 2px solid black ;width:16%">Prod</th>
                    <th style = " font-size:16px;text-align:center;border: 2px solid black ;width:16%">TR In</th>
                    <th style = " font-size:16px;text-align:center;border: 2px solid black ;width:16%">Sale Rt</th>
                    <th style = " font-size:16px;text-align:center;border: 2px solid black ;width:16%">Tot Rcpts</th>
                    <th style = " font-size:16px;text-align:center;border: 2px solid black ;width:16%">DC</th>
                    <th style = " font-size:16px;text-align:center;border: 2px solid black ;width:16%">Issues</th>
                    <th style = " font-size:16px;text-align:center;border: 2px solid black ;width:16%">TR Out</th>
                    <th style = " font-size:16px;text-align:center;border: 2px solid black ;width:16%">Pur Ret</th>
                    <th style = " font-size:16px;text-align:center;border: 2px solid black ;width:16%">Tot Iss</th>
                    <th style = " font-size:16px;text-align:center;border: 2px solid black ;width:16%">Balance</th>
                </tr>
  
                <tr>
                  <th style = " font-size:16px;line-height:10px;border: 0px solid red ;width:25%;text-align:left"> &nbsp; </th>
                  <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:13%"> </th>
                  <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:15%"> </th>
                  <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:12%"></th>
                  <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:12%"></th>
                  <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:14%"></th>
                  <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:14%"></th>
                  <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:14%"> </th>
                  <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:14%"></th>
                  <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:14%"> </th>
                  <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:14%"></th>
                  <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:14%"></th>
                  <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:14%"> </th>
                  <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:14%"></th>
                  <th style = " font-size:16px;line-height:10px;text-align:center;border: 0px solid red ;width:14%"> </th>
                </tr>
                </table>
                <table style="border-left:4px solid black;border-right:4px solid black;border-collapse:collapse;white-space: nowrap;">
                  ';
              }
              $data_tr .='
                          <tr>
                              <td style = " font-size:16px;width:23%;text-align:center">OTHERS</td>
                              <td style = " font-size:16px;text-align:center;width:13%">'.$value['item_code'].'</td>
                              <td style = " font-size:16px;text-align:center;width:15%">'.$value['loc_code'].'</td>
                              <td style = " font-size:16px;text-align:right;width:15%">'.number_format($todateopen,2).'</td>
                              <td style = " font-size:16px;text-align:right;width:15%">'.number_format($purchase,2).'</td>
                              <td style = " font-size:16px;text-align:right;width:16%">'.number_format($production,2).'</td>
                              <td style = " font-size:16px;text-align:right;width:16%">'.number_format($trin,2).'</td>
                              <td style = " font-size:16px;text-align:right;width:16%">'.number_format($sale_rt,2).'</td>
                              <td style = " font-size:16px;text-align:right;width:16%">'.number_format($total_receipt,2).'</td>
                              <td style = " font-size:16px;text-align:right;width:16%">'.number_format($dc,2).'</td>
                              <td style = " font-size:16px;text-align:right;width:16%">'.number_format($issue,2).'</td>
                              <td style = " font-size:16px;text-align:right;width:16%">'.number_format($trout,2).'</td>
                              <td style = " font-size:16px;text-align:right;width:16%">'.number_format($pur_ret,2).'</td>
                              <td style = " font-size:16px;text-align:right;width:16%">'.number_format($tot_out,2).'</td>
                              <td style = " font-size:16px;text-align:right;width:16%">'.number_format($bal,2).'</td>
                          </tr>
                          <tr>
                              <td style = " font-size:16px;width:23%;text-align:center">'.$value['item_name'].'</td>
                              <td style = " font-size:16px;text-align:center;width:13%">'.$value['um_name'].'</td>
                              <td style = " font-size:16px;text-align:center;width:15%">'.$value['pur_mode'].'</td>
                              <td style = " font-size:16px;text-align:right;width:15%"></td>
                              <td style = " font-size:16px;text-align:right;width:15%"></td>
                              <td style = " font-size:16px;text-align:right;width:16%"></td>
                              <td style = " font-size:16px;text-align:right;width:16%"></td>
                              <td style = " font-size:16px;text-align:right;width:16%"></td>
                              <td style = " font-size:16px;text-align:right;width:16%"></td>
                              <td style = " font-size:16px;text-align:right;width:16%"></td>
                              <td style = " font-size:16px;text-align:right;width:16%"></td>
                              <td style = " font-size:16px;text-align:right;width:16%"></td>
                              <td style = " font-size:16px;text-align:right;width:16%"></td>
                              <td style = " font-size:16px;text-align:right;width:16%"></td>
                              <td style = " font-size:16px;text-align:right;width:16%"></td>
                          </tr>
                          <tr ><td colspan="15"  style="border-bottom:2px solid black"></td></tr>
              ';
              $div_code_pre=$div_code_new;
              $gen_code_pre=$gen_code_new;
              $tot_div_opening=$tot_div_opening+$todateopen;
              $total_opening=$total_opening+$todateopen;
              $tot_div_purchase=$total_purchase+$purchase;
              $total_purchase=$total_purchase+$purchase;
              $tot_div_production=$tot_div_production+$production;
              $total_production=$total_production+$production;
              $tot_div_trin=$tot_div_trin+$trin;
              $total_tr_in=$total_tr_in+$trin;
              $tot_div_sale_rt=$tot_div_sale_rt+$sale_rt;
              $total_sale_rt=$total_sale_rt+$sale_rt;
              $tot_div_receipt=$tot_div_receipt+$total_receipt;
              $total_total_receipt=$total_total_receipt+$total_receipt;
              $tot_div_dc=$tot_div_dc+$dc;
              $total_dc=$total_dc+$dc;
              $tot_tot_div_issues=$tot_tot_div_issues+$issue;
              $total_issue=$total_issue+$issue;
              $tot_div_trout=$tot_div_trout+$trout;
              $total_tr_out=$total_tr_out+$trout;
              $tot_div_pur_ret=$tot_div_pur_ret+$pur_ret;
              $total_pur_ret=$total_pur_ret+$pur_ret;
              $tot_div_issues=$tot_div_issues+$tot_out;
              $total_total_issue=$total_total_issue+$tot_out;
              $tot_div_balance=$tot_div_balance+$bal;
              $total_balance=$total_balance+$bal;
              $i++;
            
        }
        // die();
            








                        
            $data_tr .='
            <tr style="border:4px solid black;">
              <th style = " font-size:16px;width:23%;text-align:center"></th>
              <th style = " font-size:16px;text-align:right;width:13%">Generic</th>
              <th style = " font-size:16px;text-align:left;width:15%">Total</th>
              <th style = " font-size:16px;text-align:right;width:15%">'.number_format($total_opening,2).'</th>
              <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_purchase,2).'</th>
              <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_production,2).'</th>
              <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_tr_in,2).'</th>
              <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_sale_rt,2).'</th>
              <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_total_receipt,2).'</th>
              <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_dc,2).'</th>
              <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_issue,2).'</th>
              <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_tr_out,2).'</th>
              <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_pur_ret,2).'</th>
              <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_total_issue,2).'</th>
              <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_balance,2).'</th>
            </tr>
                <tr style="border:4px solid black;">
                  <th style = " font-size:16px;width:23%;text-align:center"></th>
                  <th style = " font-size:16px;text-align:right;width:13%">Division</th>
                  <th style = " font-size:16px;text-align:left;width:15%">Total</th>
                  <th style = " font-size:16px;text-align:right;width:15%">'.number_format($total_opening,2).'</th>
                  <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_purchase,2).'</th>
                  <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_production,2).'</th>
                  <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_tr_in,2).'</th>
                  <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_sale_rt,2).'</th>
                  <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_total_receipt,2).'</th>
                  <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_dc,2).'</th>
                  <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_issue,2).'</th>
                  <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_tr_out,2).'</th>
                  <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_pur_ret,2).'</th>
                  <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_total_issue,2).'</th>
                  <th style = " font-size:16px;text-align:right;width:16%">'.number_format($total_balance,2).'</th>
                </tr>
                </table>';
            // DIE();
          // }

        //   $data_tr .='
        //                 <tr id = "" style="border:2px solid black;" >

        //                 <td style = "font-size:15px ;line-height:20px;border: 1px solid black ;width:25%; text-align:left">'.$value['party_name'].'</td>
        //                 <td style = "font-size:15px ;text-align:center;line-height:20px;border: 1px solid black ;width:13%">'.$value['party_code'].'</td>
        //                 <td style = "font-size:15px ;text-align:center;line-height:20px;border: 1px solid black ;width:15%">'.$value['city_name'].' </td>
        //                 <td style = "font-size:15px ;text-align:center;line-height:20px;border: 1px solid black ;width:12%; text-align:right">&nbsp;</td>
        //                 <td style = "font-size:15px ;text-align:center;line-height:20px;border: 1px solid black ;width:12%; text-align:right">.&nbsp;</td>
        //                 <td style = "font-size:15px ;text-align:center;line-height:20px;border: 1px solid black ;width:14%; text-align:right">&nbsp;</td>
        //                 <td style = "font-size:15px ;text-align:center;line-height:20px;border: 1px solid black ;width:14%; text-align:right">&nbsp;</td>
        //                 <td style = "font-size:15px ;text-align:center;line-height:20px;border: 1px solid black ;width:14%; text-align:right">&nbsp;</td>
        //                 <td style = "font-size:15px ;text-align:center;line-height:20px;border: 1px solid black ;width:14%; text-align:right">'.number_format($value['open_credit'], 2).'</td>
        //                 <td style = "font-size:15px ;text-align:center;line-height:20px;border: 1px solid black ;width:14%; text-align:right">'.number_format($value['open_debit'], 2).'</td>

        //               </tr>

                      
                      
        //               <tr >
        //                   <td style = "border:none !important;"></td>
        //               </tr>            
                   
        //   ';
        //               // $total_rcvd = $total_rcvd + $value['QTY_RCVD'];
        //               // $total_rej = $total_rej + $value['QTY_REJ'];
        //               // $total_ok = $total_ok + $value['QTY_OK'];

        //               $gl_code_loop = $gl_account;

        //               ++$i;
        // }
           
        // $data_tr .='</table>';




        $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
         $mpdf->setFooter('{PAGENO}');
        //  $mpdf->setFooter('{PAGENO}');
        // $stylesheet = file_get_contents('account_subsidary.css');
        //     // $mpdf->SetWatermarkText('PAID');
        //     // $mpdf->showWatermarkText = true;
        // $mpdf->WriteHTML($stylesheet, 1);
        date_default_timezone_set("Asia/Karachi"); 
        $today = date("l F j G:i:s ");
        $mpdf->WriteHTML('

        <div class="row" style="line-height:16px;font-family:arial;">
          <div class="main-heading">
          </div>
          <div class="main-heading">
            <div class = " col-lg-6 col-md-6 col-sm-12"  style="border-bottom: 4px solid black;">
                <span class = "" style="font-size:20px; font-weight:bold">'.$companyName.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <span class = "" style="font-size:20px;COLOR:GRAY;border:1px solid black; font-weight:bold;padding:200px">&nbsp;&nbsp;&nbsp;BATCH&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class = "" style="font-size:12px;">'.date("l j F Y h:i:s A").'</span> 
                
            </div>
            <div class = " col-lg-6 col-md-6 col-sm-12" style="border-bottom: 4px solid black;margin-top:10px; padding-bottom:5px">
              <span class = "" style="font-size:18px; font-weight:bold">Stock Report - By Item/Location</span>  
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
              
              <span class = "" style="font-size:15px; border:2px solid gray">&nbsp; '.date("d/m/Y", strtotime($to_date)).' &nbsp;</span>  
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;
              <span class = "" style="font-size:15px; border:2px solid gray">&nbsp; '.date("d/m/Y", strtotime($from_date)).' &nbsp;</span>
            </div>
          </div>
          <div class="invoice_detail" >
         
              ' . $data_tr . '
          
              </div>
        </div>
                  
        
        ', 2);
        $mpdf->Output();

        
      } else {
        echo "<body style=background:black;><h1><center style=color:white;padding-top:20%;font-family:calibri;animation:3s infinite alternate slidein;>No data Found</center></h1></body>";
    }


                                
    





