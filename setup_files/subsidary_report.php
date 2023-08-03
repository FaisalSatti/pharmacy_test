<?php
session_start();
?>
<?php
include '../api/auth/db.php';
$company_Code=$_GET['company_code'];
$fromaccount=$_GET['from_code'];
$toaccount=$_GET['to_code'];
$from_code = $_GET['from_code'];
$to_code = $_GET['to_code'];
$query = "select distinct CONTROL_CODE from act_chart where co_code = '$company_Code' AND account_code between '$fromaccount' AND '$toaccount' ORDER BY account_code ASC";
  $result = $conn->query($query);
  //  while($show=$result->fetch_assoc()){
  //      echo $show['account_code']."<br>";
  //  }
  while($row = mysqli_fetch_array($result)) {
    $accountCode[] = $row['CONTROL_CODE'];
 }
?>
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
    @media screen and (max-width: 435px) and (min-width: 335px)  {
      .ctrl_code{
        font-size: 12px !important;
      }
      .ctrl_desc{
        font-size: 12px !important;
        width:70% !important
      }
      .code{
        width:15% !important;
        font-size:12px
      }
      .des{
        font-size:12px !important;
        text-align:left;
        padding-left:15px
      }
      .sub_level2{
        font-size: 10px !important;
        padding-left:7px !important;
        /* padding-bottom:23  px !important; */
      }
      .sub_desc2{
        font-size: 10px !important;
        width:20% !important;
        /* margin-left:60px !important */
      }
      .sub_lvl1{
        font-size: 12px !important;
        padding-left:10px !important;
      }
      .sub_desc1{
        font-size: 12px !important;
        width:20% !important;
      }
    } 
    @media screen and (max-width: 498px) and (min-width: 435px)  {
      .ctrl_code{
        font-size: 14px !important;
      }
      .ctrl_desc{
        font-size: 14px !important;
        width:70% !important
      }
      .sub_level2{
        font-size: 9px !important;
        padding-left:22px !important;
        /* padding-bottom:23  px !important; */
      }
      .sub_desc2{
        font-size: 9px !important;
        width:20% !important;
        /* margin-left:60px !important */
      }
      .sub_lvl1{
        font-size: 12px !important;
        padding-left:0px !important;
      }
      .sub_desc1{
        font-size: 12px !important;
        width:20% !important;
      }
    } 
    @media screen and (max-width: 499px) and (min-width: 300px)  {
      .sub_level2{
        font-size: 10px !important;
        padding-left:10px !important;
        /* padding-bottom:23  px !important; */
      }
      .sub_desc2{
        font-size: 10px !important;
        width:20% !important;
        /* margin-left:60px !important */
       }
      .ctrl_code{
        font-size: 11px !important;
      }
      .ctrl_desc{
        font-size: 11px !important;
        width:70% !important
      }
      .sub_lvl1{
        font-size: 8px !important;
        padding-left:10px !important;
      }
      .sub_desc1{
        font-size: 8px !important;
        width:20% !important;
      }
     } 
    @media screen and (max-width: 538px) and (min-width: 499px)  {
      .ctrl_code{
        font-size: 15px !important;
      }
      .ctrl_desc{
        font-size: 15px !important;
        width:70% !important
      }
      .sub_lvl1{
        font-size: 12px !important;
        padding-left:10px !important;
      }
      .sub_desc1{
        font-size: 12px !important;
        width:20% !important;
      }
      .sub_level2{
        font-size: 13px !important;
        padding-left:19px !important;
        /* padding-bottom:23  px !important; */
      }
      .sub_desc2{
        font-size: 13px !important;
        /* margin-left:60px !important */
       }
     } 
    @media screen and (max-width: 768px)and (min-width: 538px) {
      .ctrl_code{
        font-size: 18px !important;
      }
      .ctrl_desc{
        font-size: 18px !important;
        width:70% !important
      }
      .sub_lvl1{
        font-size: 15px !important;
      }
      .sub_desc1{
        font-size: 15px !important;
        width:30% !important
      }
      .sub_level2{
        font-size: 13px !important;
        padding-left:23px ;
        /* padding-bottom:23px !important; */
      }
      .sub_desc2{
        font-size: 13px !important;
        width:30% !important
        /* margin-left:60px !important */
      }
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
      .ctrl_desc{
        /* font-size: 18px !important; */
        width:70% !important
      }
      .sub_desc1{
        /* font-size: 15px !important; */
        width:30% !important
      }
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
    table {
      font-family: arial, sans-serif !important;
      border-collapse: collapse !important;
      width: 100% !important;
      table-layout: fixed !important;
    }


        table td {
            word-wrap: break-word !important;
            /* padding : 08px 18px !important; */
        }
        td,th {
      /* border: 1px solid #dddddd; */
      text-align: left !important;
      /* padding: 8px; */
    } 
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
    th { background: #fff; padding: 8px 16px;border: 1px solid #dddddd !important; }
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
 
    @media screen and (min-width: 768px) {
      .ctrl_desc{
        /* font-size: 18px !important; */
        width:70% !important
      }
      .sub_desc1{
        /* font-size: 15px !important; */
        width:30% !important
      }
      .res {
        text-align:right;
      }
      .row{
          padding-left:13px !important;
      }


    }
    @page {
      size: landscape;
    }
    @media print {
        body{
            zoom:.7;
        }
         .tableFixHead{
          height:100% !important;
          overflow:auto !important;
        }
        .ctrl_desc{
        /* font-size: 18px !important; */
        width:70% !important
      }
      .sub_desc1{
        /* font-size: 15px !important; */
        width:30% !important
      }
      .res {
        text-align:right;
      }
      .row{
          padding-left:13px !important;
      }
        .report_section1{
            border-bottom:3px solid grey !important;
            width: 100% !important;
            color: darkgray !important;
            font-size: larger !important;
            font-weight: 700 !important;
            padding-top:3px !important;
            padding-left:5px !important;
            text-align:center !important;
            border-collapse: separate !important;
            border-spacing:10px !important;
        }
        .report_section2{
            border-bottom:3px solid grey !important;
            width: 100% !important;
            color: darkgray !important;
            font-size: larger !important;
            font-weight: 700 !important;
            padding-top:3px !important;
            text-align:center !important;
            /*border-spacing:10px !important;*/
        }
        .bread{
            text-align:center !important;
        }
    }

  </style>
   <!-- Additional Css -->



   
<div class="content-wrapper">
    <section class="content-header">
                  <div class="container-fluid">
                  <div class="row mb-2">
                      <div class="col-sm-6">
                      <h1>List Of Subsidiary Accounts</h1>
                      </div>
                      <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                          <li class="breadcrumb-item active"><button class="btn btn-sm" id="setups_breadcrumb">Setups</button></li>
                      </ol>
                      </div>   
                  </div>
                  </div><!-- /.container-fluid -->
      </section>

  
    
 
  
  <div class="row">
    <div class="col-md-7">
    </div>
    <div class="col-md-5 text-center">
    <button type="button" id="control_report" class="btn btn-primary bulk_inv_btn"><i class="fas fa-download"></i>&nbsp;Download/Subsidiary List</button>
      </div>
  </div>
  <br>
  <div style="line-height:1.5rem"class="card container p-2">
    <div style="height:40px" class="card-header p-2">
      <div class="card-title">
        <h2>List Of Accounts - Subsidiary:</h2>
      </div>
    </div>

    <div class="card-body">
      <div id = "change">
        <!-- <div class="tableFixHead"> -->
          <div class="row">
            <div class = "report_section1 col-lg-6 col-md-6 col-sm-12">
              <?php 
                   $query = "Select * from company where co_code = '$company_Code' ";
                  //  print_r($query);
                   $result = $conn->query($query);
                   $show=$result->fetch_assoc();
                   $companyName = $show['co_name'];
         
              ?>
              <span class = ""><?php echo $companyName;?></span>
            </div>
            <div class="report_section2 col-lg-6 col-md-6 col-sm-12">
              <span class = ""><?php echo date("l j F Y h:i:s A");?></span>
            </div>
          </div>
        <!-- </div> -->
        <!-- <div class = "report_section" style = "width:100%;">
        <span class = "report">ABC Company</span>
        <span class = "report">

        </span>
        <span class = "report"><?php echo date("l j F Y h:i:s A")?></span>
        </div> -->
        </br>



       <!-- <div> -->
        <div class="tableFixHead">
          <table class="text-center">
              <thead>
                  <tr class = "sticky">
                     <th style = "width:15%" class="code">Account Code</th>
                    <th class="des">Description</th>
                  </tr>
              </thead>
          </table>
          </br>
            <!-- <tr><td style = padding:5px;></td> </tr> -->
           <!-- <tbody > -->
            <!-- <tr ><td style = "border:none;"></td></tr> -->
          <?php 

          foreach($accountCode as $fromaccount) {

            $query = "Select * from act_chart where co_code = '$company_Code' AND CONTROL_CODE = $fromaccount AND SUB_LEVEL1 = '0000' AND SUB_LEVEL2 = '000' ORDER BY CONTROL_CODE ASC";
            $result = $conn->query($query);
              while($show=$result->fetch_assoc()){

               echo ' <table>
                  <tr>
                    <td class="ctrl_code" style = "border:none;font-weight: bolder;font-size: 24px;width:15%">'.$show['control_code'].'</td>
                  <td class="ctrl_desc" style = "border:none;font-weight: bolder;font-size: 24px;width:15%">'.$show['descr'].'</td>
                     <td></td>
          
                    </tr></table>
                  ';
                  $abc = "Select * from act_chart WHERE co_code = '$company_Code' AND CONTROL_CODE = '$fromaccount' AND SUB_LEVEL1 <> '0000' AND SUB_LEVEL2 = '000'";
                    $report = $conn->query($abc);
                while($res=$report->fetch_assoc()){
                  $sublevel1 = $res['sub_level1'];
                  echo ' <table>
                  <tr>
                  <td class="sub_lvl1" style = "font-weight: bold;font-size: 20px;text-align:left;width:15%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  '.$res['sub_level1'].'</td>
                  <td class="sub_desc1" style = "font-weight: bold;font-size: 20px;text-align:left;width:15%">'.$res['descr'].'</td>
                  <td></td>
                   </tr></table>
                  ';

                  $xyz = "Select * from act_chart WHERE co_code = '$company_Code' AND CONTROL_CODE = '$fromaccount' AND SUB_LEVEL1  = '$sublevel1' AND SUB_LEVEL2 <> '000'";
                   $report1 = $conn->query($xyz);
                  while($res1=$report1->fetch_assoc()){

                     echo ' <table style="border-bottom:2px solid lightgrey">
                     <tr>
                      <td style="text-align:left;width:15%" class="sub_level2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$res1['sub_level2'].'</td>
                      <td style="text-align:left;width:15% " class="sub_desc2">'.$res1['descr'].'</td>
                      <td ></td>
            
                     </tr></table>
                     ';

                  }
                  echo '<br>';

                } 
              }
          }
          ?>
          <!-- </tbody> -->

          <!-- </table> -->
          </br>

        </div>
        <a class="btn btn-primary" style = "color:white; float:left;" id="print_buttondown">Print</a>
    </div>
    </div>
  </div>
</div>

<?php

include '../includes/security.php';
?>

<script>
  

    //breadcumb 
    $('#fm_subsidiary_list_breadcrumb').click(function(){
      $('#fm_subsidiary_list_breadcrumb').css('border-color','none');
        window.location.href = "/import/chart_of_accounts/list of accounts/subsidiary_report.php";
    });
    function myPrint() {
        //  var printdata = document.getElementById("input");
         newwin = window.open("");
         
         newwin.document.write('<html><head>');
         var table_style = document.getElementById("table_style").innerHTML;
         newwin.document.write('<style type = "text/css">');
         newwin.document.write(table_style);
         newwin.document.write('</style>');
         newwin.document.write('</head>');
         newwin.document.write('<body>');
         //  var divContents = document.getElementById("dvContents").innerHTML;
         var printdata = document.getElementById("change");
         newwin.document.write(printdata.outerHTML);
         newwin.document.write('</body>');
         
         newwin.document.write('</html>');
         newwin.print();
         newwin.close();
    }

      

         

    $("#control_report").on("click",function (e) {
        var company_code1="<?php echo $_GET['company_code'] ?>";
        // console.log(company_code1);
        // alert(company_code1);
        var from_code1="<?php echo $_GET['from_code'] ?>";
        var to_code1="<?php echo $_GET['to_code'] ?>";
        let invoice_url =  "invoicereports/account_subsidiary_report.php?company_code1="+company_code1+"&from_code1="+from_code1+"&to_code1="+to_code1;
        window.open(invoice_url, '_blank');
    }); 
       //breadcumb 
    // $('#fm_create_company_breadcrumb').click(function(){
    //   $('#fm_create_company_breadcrumb').css('border-color','none');
    //   window.location.href='/import/ledgers_report.php';
    // });
    $("#print_buttondown").on("click",function (e) {
        var company_code1="<?php echo $_GET['company_code'] ?>";
        // console.log(company_code1);
        // alert(company_code1);
        var from_code1="<?php echo $_GET['from_code'] ?>";
        var to_code1="<?php echo $_GET['to_code'] ?>";
        let invoice_url =  "invoicereports/account_subsidiary_report.php?company_code1="+company_code1+"&from_code1="+from_code1+"&to_code1="+to_code1;
        window.open(invoice_url, '_blank');
    }); 
    // breadcrumbs
    $('#dashboard_breadcrumb').click(function(){
        $.get('dashboard_main/dashboard_main.php',function(data,status){
            $('#content').html(data);
        });
    });
    $("#setups_breadcrumb").on("click", function () {
        $.get('setup_files/setup_file.php', function(data,status){
            $("#content").html(data);
        });
    });
  </script>
