<?php
session_start();
?>
<?php
// header("Content-Type: application/json");
include "../../api/auth/db.php";

        // print_r($_GET);die();

  $company_Code = $_GET['company_code'];
  // $fromaccount = $_GET['from_code'];
  // $toaccount = $_GET['to_code'];


  $from_code_org = $_GET['from_code'];
  $to_code_org = $_GET['to_code'];
  $from_code1=mb_substr($from_code_org, 0, 9);
  $to_code1=mb_substr($to_code_org, 0, 9);
  if($to_code1 < $from_code1){
      $fromaccount=$to_code_org;
      $toaccount=$from_code_org;
  }else{
      $fromaccount=$from_code_org;
      $toaccount=$to_code_org;
  }
// die();
  $fromdate =  $_GET['from_date'];
  // print_r($fromdate);die();
  $todate =  $_GET['to_date'];
  
   $query = "select distinct ACCOUNT_CODE from ACT_LC_VIEW2 where co_code = '$company_Code' AND ACCOUNT_CODE between '$fromaccount' AND '$toaccount' AND SUB_LEVEL1 != '0000' AND SUB_LEVEL2 != '000' ORDER BY account_code ASC";
   $result = $conn->query($query);
  //  while($show=$result->fetch_assoc()){
  //      echo $show['account_code']."<br>";
  //  }
  while($row = mysqli_fetch_array($result)) {
      $accountCode[] = $row['ACCOUNT_CODE'];
      // echo var_dump($accountCode);
  }
  
  ini_set('max_execution_time', '0');
  
  $query1 = "Select CO_NAME from company where co_code = '$company_Code' ";
  $results = $conn->query($query1);
  $shows=$results->fetch_assoc();
  $companyName = $shows['CO_NAME'];
?>
<!-- Additional Css -->
<style>
    .dropdown-menu li {
      position: relative;
    }

    .dropdown-menu .dropdown-submenu {
      display: none;
      position: absolute;
      left: 100%;
      top: -7px;
    }
    .dropdown-menu .dropdown-submenu-left {
      right: 100%;
      left: auto;
    }

    .dropdown-menu>li:hover>.dropdown-submenu {
      display: block;
    }
    @media screen and (max-width: 768px) {
          .res {
            text-align:center;
          }
          .row{
              padding-left:13px !important;
          }
        .report_section1{
            border-bottom:3px solid grey !important;
            width: 96% !important;
            color: darkgray !important;
            font-size: larger !important;
            font-weight: 700 !important;
            padding-top:3px !important;
            /*padding-left:5px !important;*/
            text-align:center !important;
            border-collapse: separate !important;
            border-spacing:10px !important;
        }
        .report_section2{
            border-bottom:3px solid grey !important;
            width: 96% !important;
            color: darkgray !important;
            font-size: larger !important;
            font-weight: 700 !important;
            padding-top:3px !important;
            text-align:center !important;
            /*border-spacing:10px !important;*/
        }
    }
    @media screen and (min-width: 768px) {
      .res {
        text-align:right;
      }
      .row{
          padding-left:13px !important;
      }
        .report_section1{
            border-bottom:3px solid grey !important;
            width: 50% !important;
            color: darkgray !important;
            font-size: larger !important;
            font-weight: 700 !important;
            padding-top:3px !important;
            padding-left:5px !important;
            text-align:left !important;
            border-collapse: separate !important;
            border-spacing:10px !important;
        }
        .report_section2{
            border-bottom:3px solid grey !important;
            width: 49% !important;
            color: darkgray !important;
            font-size: larger !important;
            font-weight: 700 !important;
            padding-top:3px !important;
            text-align:right !important;
            /*border-spacing:10px !important;*/
        }
        .bread{
            text-align:center !important;
        }
        
    }
    
</style>

<style id = "table_style">
    
    /*.sticky {*/
     
      /* padding: 4px 3px; */
    /*  background-color: #d3d3d3;*/
    /*  border-top: 3px solid black;*/
    /*  border-bottom: 3px solid black;*/
    /*}*/
    .report{
        display:inline-block;
    /* padding-top:10px; */
        width:33%;
    }
    .report_section{
        border-bottom:3px solid grey;
        width: 100%;
    color: darkgray;
    font-size: larger;
    font-weight: 700;
    padding-top:3px;
    }
    .report:nth-child(3){
        text-align:right;
    }
    #toprow{
        border:2px solid black;
        /* /* border-top: 3px solid black; */
    }
    .fas:active{
        color:red;
        font-size:25px !important;
    }
    table { border-collapse: collapse; width: 100%; }
    th, td { background: #fff; padding: 8px 16px;border: 1px solid #dddddd !important; }
    th {
      border: 1px solid #dddddd !important;
      text-align: left;
      padding: 8px;
      background-color: #d3d3d3;
    }
    .tableFixHead{
      overflow: auto !important;
      height: 300px !important;
    }
    
    .tableFixHead thead th {
      position: sticky  !important;
      top: 0  !important;
    }
    @media print {
        body{
            zoom:.7;
        }
         .tableFixHead{
          height:100% !important;
          overflow:auto !important;
        }
    }
  </style>
   <!-- Additional Css -->

</head>
<body>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content-header" style="margin-bottom: -10px;">
          <div class="container-fluid">
              <div class="row mb-1">
                  <div class="col-sm-6">
                      <h3> Account Ledger </h3>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                          <li class="breadcrumb-item active"><button class="btn btn-sm" id="il_breadcrumb"> Financial Management </button></li>
                          <li class="breadcrumb-item"><button class="btn btn-sm" id="po_list_breadcrumb"> Online Ledger</button></li>
                          <!-- <li class="breadcrumb-item"><button class="btn btn-sm" id="add_po_local_breadcrumb"> Online Ledger</button></li> -->
                      </ol>
                  </div>
              </div>
          </div>
      </section>
    <!-- /.content-header -->
  
    <!-- <div class="row response" style="display:none">
      <div class="col-12">
        <div style="line-height:0.7rem" class="container p-2">
          <div class="">
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">&times;</button>
                <span class="vd_alert-icon"><i class="fas fa-check-circle vd_green"></i></span><strong>Success!</strong>
            </div>
          </div>
        </div>
      </div>    
    </div> -->
    <br>

    <section class="content">
          <div class="container-fluid">
              <div class="row" style="margin-top:-23px">
                  <div class="col-12">
                      <div class="card">
                          <div class="card-body" style="padding:7px">
                          <div class="row">

    <div class="col-md-7">
    </div>
    <div class="col-md-5 text-center">
        <button type="button" id="ledger_report" class="btn btn-primary bulk_inv_btn"><i class="fas fa-download"></i>&nbsp;Download/Print Ledger</button>
    </div>
  </div>

                              <div class="container">
                                <div style="height:40px; border: 0px solid red !important;" class="card-header">
                                  <div class="card-title">
                                    <h3>Ledger:</h3>
                                  </div>
                                </div>
                                <hr style="margin-bottom: -10px;border: 1px solid #A9A9A9;border-style: dashed;">
                                <div class="card-body">
                                  <div class="row">
                                    <div class = "report_section1 col-lg-6 col-md-6 col-sm-12">
                                      <span class = ""><?php echo $companyName; ?></span>
                                      <span class = "">
                                      </div>
                                      <div class="report_section2 col-lg-6 col-md-6 col-sm-12">
                                      </span>
                                      <span class = ""><?php echo date("l j F Y h:i:s A")?></span>
                                    </div>
                                  </div>
                                  <div class = "report_section" style = "width:100%;">
                                    <span>Detailed ledger from : <?php echo "$fromdate to $todate";?></span>
                                    <span style="cursor:pointer;float:right;" id = "forward"><i style='font-size:24px;' class='fas'>&#xf152;</i></span>
                                    <span id="counter" style ="float:right;">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                    <span style="cursor:pointer;float:right;" id = "backward"><i style='font-size:24px;' class='fas'>&#xf191;</i></span>
                                  </div>
                                  </br>
                                  <div id = "input">
                                  </div>
                                  <?php
                                    foreach($accountCode as $fromaccount) {
                                  ?>
                                    <div class = "change " style = "display:none">
                                      <div class="tableFixHead">
                                        <table>
                                          <thead>
                                            <tr class = "sticky">
                                                <th style = "width:10%;">Date</th>
                                                <th style = "width:8%">Voucher#</th>
                                                <th style = "width:46%">Particulars</th>
                                                <th style = "width:12%">Debit</th>
                                                <th style = "width:12%">Credit</th>
                                                <th style = "width:12%">Balance</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr >
                                              <td style = "border:none !important ;"></td>
                                            </tr>
                                            <?php 
                                              $query = "Select * from ACT_LC_VIEW2 where co_code = '$company_Code' AND account_code = '$fromaccount'";
                                              $result = $conn->query($query);
                                              // echo $query;
                                              // die();
                                              while($show=$result->fetch_assoc()){
                                                  //         echo ' <tr>
                                                  //         <td>'.$show["ACCOUNT_CODE"].'</td>
                                                  //         <td>'.$show["DESCR"].'</td>
                                                  //         <td>'.$show["ACCOUNT_CODE"].'</td>
                                                  //         <td>'.$show["ACCOUNT_CODE"].'</td>
                                                  //         <td>'.$show["ACCOUNT_CODE"].'</td>
                                                  //         <td>'.$show["ACCOUNT_CODE"].'</td>
                                                  //         <td>total</td>
                                                  // </tr>';
                                                  $description = $show['DESCR'];
                                                  $openDebit = $show['OPEN_DEBIT'];
                                                  $openCredit = $show['OPEN_CREDIT'];
                                                  // echo $openDebit;
                                          
                                              }
                                          
                                              $query = "SELECT SUM(receipt_qty) AS Totalreceiptqty, SUM(issue_qty) As totalissueqty , SUM(debit) As totaldebit, SUM(credit) As totalcredit FROM master_view_ledger WHERE co_code = '$company_Code' AND account_code = '$fromaccount' AND voucher_date < '$fromdate'";
                                              $result = $conn->query($query);
                                              if($result){
                                                while($show=$result->fetch_assoc()){
                                        
                                                  $totalDebit = $show['totaldebit'];
                                                  $totalCredit = $show['totalcredit'];
                                                }
                                              }else{
                                            
                                                  $totalDebit = 0;
                                                  $totalCredit = 0;
                                              }
                                              $finaldebit = $openDebit + $totalDebit;
                                              $finalcredit = $openCredit + $totalCredit;
                                              $balance = $finaldebit-$finalcredit;
                                              $dr = " DR";
                                              $cr = " CR";
                                            ?>
                                            <tr id = "toprow">
                                              <td style = "font-weight:bold;"><?php echo $fromaccount; ?></td>
                                              <td style = "font-weight:bold;" colspan = "2"><?php echo $description . " : Openning Balance"; ?></td>
                                    
                                              <td style="text-align:right;"><?php if($balance >0){echo number_format($balance,2);} ?></td>
                                              <td style="text-align:right;"><?php if($balance <0){$balance1 = $balance*-1; echo number_format($balance1,2);} ?></td>
                                              <td class = "total" style="text-align:right;"><?php echo($balance >= 0 ? number_format($balance,2). $dr:number_format(($balance*-1),2).$cr) ?></td>
                                            </tr>
                                            <tr >
                                              <td style = "border:none !important;"></td>
                                            </tr>
                                            <?php
                                      
                                              $totalDebit1 = 0;
                                              $totalCredit1 = 0;
                                              $query = "Select * from master_view_ledger where co_code = '$company_Code' AND account_code = '$fromaccount' AND voucher_date between '$fromdate' AND '$todate' ORDER BY voucher_date ASC";
                                              
                                              // $query = "Select * from MASTER_VIEW_LEDGER where co_code = '11' AND account_code = '7010001001' AND voucher_date between '2022-03-01' AND '2022-03-30'";
                                              $result = $conn->query($query);
                                              if($result){
                                                while($show=$result->fetch_assoc()){
                                                  $balance = $balance + $show['debit']-$show['credit'];
                                                  $debitString = " DR";
                                                  $creditString = " CR";
                            
                                                  $totalDebit1 = $totalDebit1 + $show['debit'];
                                                  $totalCredit1 = $totalCredit1 + $show['credit'];
                                                  echo '<tr>
                                                          <td>'.date('d-m-Y' , strtotime($show["voucher_date"])).'</td>
                                                          <td>'.$show["voucher_type"].'&nbsp; &nbsp; &nbsp;'.$show["voucher_no"].'</td>
                                                          <td>'.$show["naration"].'</td>
                                                          <td class = "debit" style="text-align:right;">'.number_format($show["debit"],2).'</td>
                                                          <td class = "credit" style="text-align:right;">'.number_format($show["credit"],2).'</td>
                                                          <td class = "total" style="text-align:right;">'.($balance >= 0 ? number_format($balance,2). $debitString:number_format(($balance*-1),2).$creditString).'</td>
                                                  </tr>';
                                                }
                                              }
                                              // $balancequantity = $totalReceiptQty1 - $totalIssueQty1 + ($totalReceiptQty - $totalIssueQty);
                                            ?>
                                            <tr>
                                                <td colspan = "3">Total</td>
                                      
                                                <td style="text-align:right;"><?php echo number_format($totalDebit1,2);?></td>
                                                <td style="text-align:right;"><?php echo number_format($totalCredit1,2);?></td>
                                                <td style="text-align:right;"></td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                  <?php } ?>
                                </div>
                              </div>



                          </div>
                      </div>
                  </div>
              </div>
          </div>
    </section>
  </div>
  




  <?php

include '../../includes/security.php';
?>


        
        
        
        
      
              
            
              
              
               
        

  <script>
      var i = 1;
        var count;
        function show(){
            count = document.querySelectorAll('.change').length;
            document.getElementById("counter").innerHTML = "&nbsp;&nbsp;"+i+" of "+count+"&nbsp;&nbsp;";
            var change = document.getElementsByClassName("change")[0].innerHTML;
            document.getElementById("input").innerHTML = change;
        }
        setTimeout(show, 1000);

        $("#forward").on("click",function(e){
            if (i<count) {
            i++;
            document.getElementById("counter").innerHTML = "&nbsp;&nbsp;"+i+" of "+count+"&nbsp;&nbsp;";
            var change = document.getElementsByClassName("change")[i-1].innerHTML;
            document.getElementById("input").innerHTML = change;

            }
        });

        $("#backward").on("click",function(e){ 
    if (i>1) {
    i--;
    
    document.getElementById("counter").innerHTML = "&nbsp;&nbsp;"+i+" of "+count+"&nbsp;&nbsp;";
    var change = document.getElementsByClassName("change")[i-1].innerHTML;
            document.getElementById("input").innerHTML = change;
    }
});


     
    $("#ledger_report").on("click",function (e) {
    // if ($("#ledger_form").valid()) {
        var company_code=<?php echo $_GET['company_code'] ?>;
        var From_code= <?php echo $_GET['from_code'] ?>;
        var To_code=<?php echo $_GET['to_code'] ?>;
        var from_date="<?php echo $_GET['from_date'] ?>";
        var to_date="<?php echo $_GET['to_date'] ?>";
        let invoice_url = "invoicereports/Financial_mis_reports/ledger_report.php?company_code="+company_code+"&from_code="+From_code+"&to_code="+To_code+"&from_date="+from_date+"&to_date="+to_date;
        window.open(invoice_url, '_blank');
       
      // }
    });

      // breadcrumbs
$('#dashboard_breadcrumb').click(function(){
    $.get('dashboard_main/dashboard_main.php',function(data,status){
        $('#content').html(data);
    });
});
// $("#il_breadcrumb").on("click", function () {
//     $.get('financial_management/MIS/online_ledger.php', function(data,status){
//         $("#content").html(data);
//     });
// });
$("#po_list_breadcrumb").on("click", function () {
    $.get('financial_management/MIS/online_ledger.php', function(data,status){
        $("#content").html(data);
    });
});
$("#add_po_local_breadcrumb").on("click", function () {
    $.get('financial_management/MIS/online_ledger_view.php', function(data,status){
        $("#content").html(data);
    });
});
  </script>
</body>
</html>