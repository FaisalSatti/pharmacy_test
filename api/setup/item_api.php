<?php
session_start();
header("Content-Type: application/json");
include '../auth/db.php';
if(isset($_POST['action']) && $_POST['action'] == 'view'){
  // print_r("jfsksk");
    $query = "SELECT * FROM items";
    // PRINT_R($query);
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}elseif(isset($_POST['action']) && $_POST['action'] == 'insert_limited'){
  // print_r("jfsksk");
  // print_r($_POST); die();
  $company_code=$_POST['company_code'];
  $division=$_POST['division'];
  $product_code=$_POST['product_code'];
  $generic_code=$_POST['generic_code'];
  $um_code=$_POST['um_code'];
  $pur_gl_code=$_POST['pur_gl_code'];
  $sale_gl_code=$_POST['sale_gl_code'];
  $item_code=$_POST['item_code'];
  $item_name=$_POST['item_name'];
  $sale_name=$_POST['sale_name'];
  $sale_name2=$_POST['sale_name2'];
  $item_detail=$_POST['item_detail'];
  $item_codes=$_POST['item_codes'];
  $item_pur_code=$_POST['item_pur_code'];
  $item_sale_code=$_POST['item_sale_code'];
  // $generic_name=$_POST['generic_name'];
  // $product_name=$_POST['product_name'];
  // $um_name=$_POST['um_name'];
  $pur_gl_code=$_POST['pur_gl_code'];
  $sale_gl_code=$_POST['sale_gl_code'];
  $purchase_mode=$_POST['purchase_mode'];
  $item_category=$_POST['item_category'];
  $packing=$_POST['packing'];
  $brand=$_POST['brand'];
  $origin=$_POST['origin']==''?'0':$_POST['origin'];
  $hs_code=$_POST['hs_code'];
  $target_qty=$_POST['target_qty']==''?'0':$_POST['target_qty'];
  $trade_price=$_POST['trade_price']==''?'0':$_POST['trade_price'];
  $trade_price2=$_POST['trade_price2']==''?'0':$_POST['trade_price2'];
  $discount_rate=$_POST['discount_rate']==''?'0':$_POST['discount_rate'];
  $gst_rate=$_POST['gst_rate']==''?'0':$_POST['gst_rate'];
  $add_rate=$_POST['add_rate']==''?'0':$_POST['add_rate'];
  $min_level=$_POST['min_level']==''?'0':$_POST['min_level'];
  $max_level=$_POST['max_level']==''?'0':$_POST['max_level'];
  $quantity1=$_POST['quantity1']==''?'0':$_POST['quantity1'];
  $quantity2=$_POST['quantity2']==''?'0':$_POST['quantity2'];
  $quantity3=$_POST['quantity3']==''?'0':$_POST['quantity3'];
  $rate1=$_POST['rate1']==''?'0.00':$_POST['rate1'];
  $rate1s = str_replace( ',', '', $rate1 );
  if( is_numeric( $rate1s ) ) {
    $rate1 = $rate1s;
  }
  $rate2=$_POST['rate2']==''?'0.00':$_POST['rate2'];
  $rate2s = str_replace( ',', '', $rate2 );
  if( is_numeric( $rate2s ) ) {
    $rate2 = $rate2s;
  }
  $rate3=$_POST['rate3']==''?'0.00':$_POST['rate3'];
  $rates3 = str_replace( ',', '', $rate3 );
  if( is_numeric( $rates3 ) ) {
    $rate3 = $rates3;
  }
  $amount1=$_POST['amount1']==''?'0.00':$_POST['amount1'];
  $amounts1 = str_replace( ',', '', $amount1 );
  if( is_numeric( $amounts1 ) ) {
    $amount1 = $amounts1;
  }
  $amount2=$_POST['amount2']==''?'0.00':$_POST['amount2'];
  $amounts2 = str_replace( ',', '', $amount2 );
  if( is_numeric( $amounts2 ) ) {
    $amount2 = $amounts2;
  }
  $amount3=$_POST['amount3']==''?'0.00':$_POST['amount3'];
  $amounts3 = str_replace( ',', '', $amount3 );
  if( is_numeric( $amounts3 ) ) {
    $amount3 = $amounts3;
  }
  $total=$_POST['total']==''?'0.00':$_POST['total'];
  $totals3 = str_replace( ',', '', $total );
  if( is_numeric( $totals3 ) ) {
    $total = $totals3;
  }
  $last_pur_rate=$_POST['last_pur_rate']==''?'0.00':$_POST['last_pur_rate'];
  $last_pur_rates = str_replace( ',', '', $last_pur_rate );
  if( is_numeric( $last_pur_rates ) ) {
    $last_pur_rate = $last_pur_rates;
  }
  $query = "insert into items(co_code,division_code,item_code,item_name_pur,item_name_sale,item_name_sale2,
  item_descr,gen_code,um_code,pur_mode,gl_code,gl_code_sale,packing,brand,origin,hscode,target_qty,
  trade_price,tp_rate2,disc_slab,tax_rate,add_rate,
  min_level,max_level,open_qty,open_rate,open_val,close_qty,close_rate,close_val,pur_qty,pur_rate,pur_val,
  lp_rate,cost_sales,
  product_code,item_div,item_cat,item_pcode,item_scode) value 
  ('$company_code','$division','$item_code','$item_name','$sale_name','$sale_name2','$item_detail',
  '$generic_code','$um_code','$purchase_mode','$pur_gl_code','$sale_gl_code','$packing','$brand','$origin',
  '$hs_code','$target_qty','$trade_price','$trade_price2','$discount_rate','$gst_rate','$add_rate',
  '$min_level','$max_level','$quantity1','$rate1','$amount1','$quantity2','$rate2','$amount2','$quantity3',
  '$rate3','$amount3','$last_pur_rate','$total','$product_code','$item_codes','$item_category',
  '$item_pur_code','$item_sale_code')";
  // PRINT_R($query); die();
  $result = $conn->query($query);
  if($result){
    $return_data = array(
      "status" => 1,
      "message" => "Item Account has been Inserted"
  );
  }else{
      $return_data = array(
      "status" => 0,
      "message" => "Item Account has not been Inserted"
      );
  }
}else if(isset($_POST['action']) && $_POST['action'] == 'update'){
  // print_r($_POST);die();
  $company_code=$_POST['company_code'];
  $division=$_POST['division'];
  $product_code=$_POST['product_code'];
  $generic_code=$_POST['generic_code'];
  $um_code=$_POST['um_code'];
  $pur_gl_code=$_POST['pur_gl_code'];
  $sale_gl_code=$_POST['sale_gl_code'];
  $item_code=$_POST['item_code'];
  $item_name=$_POST['item_name'];
  $sale_name=$_POST['sale_name'];
  $sale_name2=$_POST['sale_name2'];
  $item_detail=$_POST['item_detail'];
  $item_codes=$_POST['item_codes'];
  $item_pur_code=$_POST['item_pur_code'];
  $item_sale_code=$_POST['item_sale_code'];
  $generic_name=$_POST['generic_name'];
  $product_name=$_POST['product_name'];
  $um_name=$_POST['um_name'];
  $pur_gl_code=$_POST['pur_gl_code'];
  $sale_gl_code=$_POST['sale_gl_code'];
  $purchase_mode=$_POST['purchase_mode'];
  $item_category=$_POST['item_category'];
  $packing=$_POST['packing'];
  $brand=$_POST['brand'];
  $origin=$_POST['origin']==''?'0':$_POST['origin'];
  $hs_code=$_POST['hs_code'];
  $target_qty=$_POST['target_qty']==''?'0':$_POST['target_qty'];
  $trade_price=$_POST['trade_price']==''?'0':$_POST['trade_price'];
  $trade_price2=$_POST['trade_price2']==''?'0':$_POST['trade_price2'];
  $discount_rate=$_POST['discount_rate']==''?'0':$_POST['discount_rate'];
  $gst_rate=$_POST['gst_rate']==''?'0':$_POST['gst_rate'];
  $add_rate=$_POST['add_rate']==''?'0':$_POST['add_rate'];
  $min_level=$_POST['min_level']==''?'0':$_POST['min_level'];
  $max_level=$_POST['max_level']==''?'0':$_POST['max_level'];
  $quantity1=$_POST['quantity1']==''?'0':$_POST['quantity1'];
  $quantity2=$_POST['quantity2']==''?'0':$_POST['quantity2'];
  $quantity3=$_POST['quantity3']==''?'0':$_POST['quantity3'];
  $rate1=$_POST['rate1']==''?'0.00':$_POST['rate1'];
  $rate1s = str_replace( ',', '', $rate1 );
  if( is_numeric( $rate1s ) ) {
    $rate1 = $rate1s;
  }
  $rate2=$_POST['rate2']==''?'0.00':$_POST['rate2'];
  $rate2s = str_replace( ',', '', $rate2 );
  if( is_numeric( $rate2s ) ) {
    $rate2 = $rate2s;
  }
  $rate3=$_POST['rate3']==''?'0.00':$_POST['rate3'];
  $rates3 = str_replace( ',', '', $rate3 );
  if( is_numeric( $rates3 ) ) {
    $rate3 = $rates3;
  }
  $amount1=$_POST['amount1']==''?'0.00':$_POST['amount1'];
  $amounts1 = str_replace( ',', '', $amount1 );
  if( is_numeric( $amounts1 ) ) {
    $amount1 = $amounts1;
  }
  $amount2=$_POST['amount2']==''?'0.00':$_POST['amount2'];
  $amounts2 = str_replace( ',', '', $amount2 );
  if( is_numeric( $amounts2 ) ) {
    $amount2 = $amounts2;
  }
  $amount3=$_POST['amount3']==''?'0.00':$_POST['amount3'];
  $amounts3 = str_replace( ',', '', $amount3 );
  if( is_numeric( $amounts3 ) ) {
    $amount3 = $amounts3;
  }
  $total=$_POST['total']==''?'0.00':$_POST['total'];
  $totals3 = str_replace( ',', '', $total );
  if( is_numeric( $totals3 ) ) {
    $total = $totals3;
  }
  $last_pur_rate=$_POST['last_pur_rate']==''?'0.00':$_POST['last_pur_rate'];
  $last_pur_rates = str_replace( ',', '', $last_pur_rate );
  if( is_numeric( $last_pur_rates ) ) {
    $last_pur_rate = $last_pur_rates;
  }
  $query="UPDATE items set  co_code = '$company_code' , DIV_CODE='$division' , item_code='$item_code',
          item_name_pur = '$item_name' , item_name_sale='$sale_name' , item_name_sale2='$sale_name2',
          item_descr = '$item_detail' , gen_code='$generic_code' , um_code='$um_code',
          pur_mode = '$purchase_mode' , gl_code='$pur_gl_code' , gl_code_sale='$sale_gl_code',
          packing = '$packing' , brand='$brand' , origin='$origin',
          hscode = '$hs_code' , target_qty='$target_qty' ,trade_price = '$trade_price' , 
          tp_rate2='$trade_price2' , disc_slab='$discount_rate',tax_rate = '$gst_rate' , add_rate='$add_rate' , 
          min_level='$min_level', max_level = '$max_level' , open_qty='$quantity1' , open_rate='$rate1',
          open_val = '$amount1' , close_qty='$quantity2' , close_rate='$rate2',
          close_val = '$amount2' , pur_qty='$quantity3' , pur_rate='$rate3',
          pur_val = '$amount3' , lp_rate='$last_pur_rate' , cost_sales='$total',
           product_code='$product_code' , item_div='$item_codes',
          item_cat = '$item_category' , item_pcode='$item_pur_code' , item_scode='$item_sale_code' 
          WHERE co_code='$company_code' and DIV_CODE='$division' AND item_code='$item_code' 
          AND product_code='$product_code'";   
                    //  print_r($query);die();
  $result = $conn->query($query);
  if($result){
      $return_data = array(
          "status" => 1,
          "message" => "Item has been updated"
      );
  }else{
      $return_data = array(
      "status" => 0,
      "message" => "Item has not been updated"
      );
  }
}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
    // print_r("jfsksk");
    // print_r($_POST); die();
    $company_code=$_POST['company_code'];
    $division=$_POST['division'];
    $product_code=$_POST['product_code'];
    $generic_code=$_POST['generic_code'];
    $um_code=$_POST['um_code'];
    $pur_gl_code=$_POST['pur_gl_code'];
    $sale_gl_code=$_POST['sale_gl_code'];
    $item_code=$_POST['item_code'];
    $item_name=$_POST['item_name'];
    $sale_name=$_POST['sale_name'];
    $sale_name2=$_POST['sale_name2'];
    $item_detail=$_POST['item_detail'];
    $item_codes=$_POST['item_codes'];
    $item_pur_code=$_POST['item_pur_code'];
    $item_sale_code=$_POST['item_sale_code'];
    $generic_name=$_POST['generic_name'];
    $product_name=$_POST['product_name'];
    $um_name=$_POST['um_name'];
    $pur_gl_code=$_POST['pur_gl_code'];
    $sale_gl_code=$_POST['sale_gl_code'];
    $purchase_mode=$_POST['purchase_mode'];
    $item_category=$_POST['item_category'];
    $packing=$_POST['packing'];
    $brand=$_POST['brand'];
    $origin=$_POST['origin']==''?'0':$_POST['origin'];
    $hs_code=$_POST['hs_code'];
    $target_qty=$_POST['target_qty']==''?'0':$_POST['target_qty'];
    $trade_price=$_POST['trade_price']==''?'0':$_POST['trade_price'];
    $trade_price2=$_POST['trade_price2']==''?'0':$_POST['trade_price2'];
    $discount_rate=$_POST['discount_rate']==''?'0':$_POST['discount_rate'];
    $gst_rate=$_POST['gst_rate']==''?'0':$_POST['gst_rate'];
    $add_rate=$_POST['add_rate']==''?'0':$_POST['add_rate'];
    $min_level=$_POST['min_level']==''?'0':$_POST['min_level'];
    $max_level=$_POST['max_level']==''?'0':$_POST['max_level'];
    $quantity1=$_POST['quantity1']==''?'0':$_POST['quantity1'];
    $quantity2=$_POST['quantity2']==''?'0':$_POST['quantity2'];
    $quantity3=$_POST['quantity3']==''?'0':$_POST['quantity3'];
    $rate1=$_POST['rate1']==''?'0.00':$_POST['rate1'];
    $rate1s = str_replace( ',', '', $rate1 );
    if( is_numeric( $rate1s ) ) {
      $rate1 = $rate1s;
    }
    $rate2=$_POST['rate2']==''?'0.00':$_POST['rate2'];
    $rate2s = str_replace( ',', '', $rate2 );
    if( is_numeric( $rate2s ) ) {
      $rate2 = $rate2s;
    }
    $rate3=$_POST['rate3']==''?'0.00':$_POST['rate3'];
    $rates3 = str_replace( ',', '', $rate3 );
    if( is_numeric( $rates3 ) ) {
      $rate3 = $rates3;
    }
    $amount1=$_POST['amount1']==''?'0.00':$_POST['amount1'];
    $amounts1 = str_replace( ',', '', $amount1 );
    if( is_numeric( $amounts1 ) ) {
      $amount1 = $amounts1;
    }
    $amount2=$_POST['amount2']==''?'0.00':$_POST['amount2'];
    $amounts2 = str_replace( ',', '', $amount2 );
    if( is_numeric( $amounts2 ) ) {
      $amount2 = $amounts2;
    }
    $amount3=$_POST['amount3']==''?'0.00':$_POST['amount3'];
    $amounts3 = str_replace( ',', '', $amount3 );
    if( is_numeric( $amounts3 ) ) {
      $amount3 = $amounts3;
    }
    $total=$_POST['total']==''?'0.00':$_POST['total'];
    $totals3 = str_replace( ',', '', $total );
    if( is_numeric( $totals3 ) ) {
      $total = $totals3;
    }
    $last_pur_rate=$_POST['last_pur_rate']==''?'0.00':$_POST['last_pur_rate'];
    $last_pur_rates = str_replace( ',', '', $last_pur_rate );
    if( is_numeric( $last_pur_rates ) ) {
      $last_pur_rate = $last_pur_rates;
    }
    $query = "insert into items(co_code,div_code,item_code,item_name_pur,item_name_sale,item_name_sale2,
    item_descr,gen_code,um_code,pur_mode,gl_code,gl_code_sale,packing,brand,origin,hscode,target_qty,
    trade_price,tp_rate2,disc_slab,tax_rate,add_rate,
    min_level,max_level,open_qty,open_rate,open_val,close_qty,close_rate,close_val,pur_qty,pur_rate,pur_val,
    lp_rate,cost_sales,
    product_code,item_div,item_cat,item_pcode,item_scode) value 
    ('$company_code','$division','$item_code','$item_name','$sale_name','$sale_name2','$item_detail',
    '$generic_code','$um_code','$purchase_mode','$pur_gl_code','$sale_gl_code','$packing','$brand','$origin',
    '$hs_code','$target_qty','$trade_price','$trade_price2','$discount_rate','$gst_rate','$add_rate',
    '$min_level','$max_level','$quantity1','$rate1','$amount1','$quantity2','$rate2','$amount2','$quantity3',
    '$rate3','$amount3','$last_pur_rate','$total','$product_code','$item_codes','$item_category',
    '$item_pur_code','$item_sale_code')";
    // PRINT_R($query); die();
    $result = $conn->query($query);
    if($result){
      $return_data = array(
        "status" => 1,
        "message" => "Item Account has been Inserted"
    );
    }else{
        $return_data = array(
        "status" => 0,
        "message" => "Item Account has not been Inserted"
        );
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'edit'){
  // print_r("jfsksk");
  $item_code=$_POST['item_code'];
  $product_code=$_POST['product_code'];
  $division_code=$_POST['division_code'];
  $company_code=$_POST['company_code'];



    $query = "SELECT I.*, c.co_name, D.div_name, P.product_name, G.gen_name, U.unit_name, GL.descr, GLS.descr
    
    FROM items I

    join company C on C.co_code = I.co_code
    join division D on D.div_code = I.div_code
    join product p on P.product_code = I.product_code
    JOIN gen_name G on G.gen_code = I.gen_code
    JOIN unit	U on U.unit_code = I.um_code
    join act_chart GL on GL.account_code = I.gl_code
    join act_chart GLS on GLS.account_code = I.gl_code_sale


    WHERE I.div_code='$division_code' AND I.co_code='$company_code' AND I.item_code='$item_code' AND I.product_code='$product_code'";


    // PRINT_R($query); die();




    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    $return_data = $show;
}elseif(isset($_POST['action']) && $_POST['action'] == 'check_item_code'){
    // print_r("jfsksk");
    $company_code=$_POST['company_code'];
    // $item_code=$_POST['item_code'];
    $division_code=$_POST['division_code'];

    $query = "SELECT (case when MAX(item_code) is null then 1 else MAX(item_code)+1 end) item_code FROM items WHERE co_code = '$company_code' 
    AND div_code='$division_code'";
    // PRINT_R($query); die();
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    // $co_code=$show['CO_CODE'];
    // print_r($co_code); die();
    // if (empty($show['item_code'])) {
      $return_data = $show['item_code'];
    //     "status" => 1,
    //     "message" => "You Enter a new code"
    //   );
    // }else{
    //     $return_data = array(
    //       "status" => 0,
    //       "message" => "This Code is already registered "
    //     );
    // }
}elseif(isset($_POST['action']) && $_POST['action'] == 'um_code'){
    //   print_r($_POST); die();
    $query = "SELECT * FROM unit";
    // PRINT_R($query);die();
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}elseif(isset($_POST['action']) && $_POST['action'] == 'generic_code'){
    //   print_r($_POST); die();
        $query = "SELECT * FROM gen_name";
        // PRINT_R($query);die();
        $result = $conn->query($query);
        $count = mysqli_num_rows($result);
        $return_data=[];
          while($show = mysqli_fetch_assoc($result)){
              $return_data[] = $show;
          }
}elseif(isset($_POST['action']) && $_POST['action'] == 'product_code'){
    //   print_r($_POST); die();
        $query = "SELECT * FROM product";
        // PRINT_R($query);die();
        $result = $conn->query($query);
        $count = mysqli_num_rows($result);
        $return_data=[];
          while($show = mysqli_fetch_assoc($result)){
              $return_data[] = $show;
          }
}elseif(isset($_POST['action']) && $_POST['action'] == 'pur_account_code'){
    //   print_r($_POST); die();
        $query = "SELECT * FROM act_chart where control_code between '861' AND '899' and sub_level2 !='000'";
        // PRINT_R($query);die();
        $result = $conn->query($query);
        $count = mysqli_num_rows($result);
        $return_data=[];
          while($show = mysqli_fetch_assoc($result)){
              $return_data[] = $show;
          }
}elseif(isset($_POST['action']) && $_POST['action'] == 'sale_account_code'){
  //   print_r($_POST); die();
      $query = "SELECT * FROM act_chart where control_code between '801' AND '849' and sub_level2 !='000'";
      // PRINT_R($query);die();
      $result = $conn->query($query);
      $count = mysqli_num_rows($result);
      $return_data=[];
        while($show = mysqli_fetch_assoc($result)){
            $return_data[] = $show;
        }
}else{
    $return_data = array(
        "status" => 0,
        "message" => "Action Not Matched"
);
}

print(json_encode($return_data, JSON_PRETTY_PRINT));   
?>



