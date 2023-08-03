<?php
session_start();
?>
<?php
include '../api/auth/db.php';
$company_Code=$_GET['company_code'];
$fromaccount=$_GET['from_code'];
$toaccount=$_GET['to_code'];
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
 
    @media screen and (max-width: 768px){
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
            width: 49% !important;
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
    @media print {
        body{
            zoom:.7;
        }
         .tableFixHead{
          height:100% !important;
          overflow:auto !important;
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



   <!-- Content Header (Page header) -->
   <div class="content-wrapper">
      <section class="content-header">
                <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    <h1>Setup Files</h1>
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
      <!-- /.content-header -->
      
      <div class="row response" style="display:none">
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
      </div>
      
      <div class="row">
        <div class="col-md-7">
        </div>
        <div class="col-md-5 text-center">
        <button type="button" id="control_report" class="btn btn-primary bulk_inv_btn"><i class="fas fa-download"></i>&nbsp;Download/Control List</button>
      </div>
      </div>
      <br>
      <div style="line-height:1.5rem"class="card container p-2">
        <div style="height:40px" class="card-header p-2">
          <div class="card-title">
            <h2>List Of Accounts - Control Accounts:</h2>
          </div>
        </div>

        <div class="card-body">
          <div id = "change">
              <div class="row">
              <div class = "report_section1 col-lg-6 col-md-6 col-sm-12">
                  <?php 
                      $query = "Select * from company where co_code = '$company_Code' ";

                      // console.log($company_code);
                      $result = $conn->query($query);
                      $show=$result->fetch_assoc();
                      $companyName = $show['co_name'];
            
                  ?>
                  <span class = ""><?php echo $companyName;?></span>
                </div>
                <div class="report_section2 col-lg-6 col-md-6 col-sm-12">
                
                  <span class = ""><?php echo date("l j F Y h:i:s A")?></span>
                </div>
                  </div>
            
              </div>
    <!-- <div class = "report_section" style = "width:100%;">
    <span class = "report">ABC Company</span>
    <span class = "report">

    </span>
    <span class = "report"><?php echo date("l j F Y h:i:s A")?></span>
    </div> -->


    </br>

          
    <div class="tableFixHead">
              <table>
            <thead>
              <tr class = "sticky">
                  <th style = "width:25%">Account Code</th>
                  <th>Description</th>
              </tr>
            </thead>

                    <tbody>
              <tr ><td style = "border:none;"></td></tr>
                <?php 
                $query = "Select * from act_lc_view2 where co_code = '$company_Code' AND ACCOUNT_CODE between '$fromaccount' AND '$toaccount' AND SUB_LEVEL1 = '0000' AND SUB_LEVEL2 = '000' ORDER BY CONTROL_CODE ASC";
                // print_r($query);
                $result = $conn->query($query);
                while($show=$result->fetch_assoc()){
                    echo ' <tr>
                    <td>'.$show["CONTROL_CODE"].'</td>
                    <td>'.$show["DESCR"].'</td>
                  
              </tr>';

                }

                ?>

              </tbody>

              </table>
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
              $(document).ready(function () {
                        var company_code =" <?php echo $_GET['company_code'] ?>";
                        var company_name =" <?php echo $_GET['company_name'] ?>";
                        var from_code =" <?php echo $_GET['from_code'] ?>";
                        var account_name =" <?php echo $_GET['account_name'] ?>";
                        var to_code =" <?php echo $_GET['to_code'] ?>";
                        var account_name1 =" <?php echo $_GET['account_name1'] ?>";
                      
                        
                 
              
          });

      //     $('#fm_control_list_breadcrumb').click(function(){
      //   $('#fm_control_list_breadcrumb').css('border-color','none');
      //     window.location.href = "/import/chart_of_accounts/list of accounts/subcontrol_report.php";
      // });
            


      


            //breadcumb 
          // $('#fm_create_company_breadcrumb').click(function(){
          //   $('#fm_create_company_breadcrumb').css('border-color','none');
          //   window.location.href='/import/ledgers_report.php';
          // });
    $("#control_report").on("click",function (e) {
        var company_code1="<?php echo $_GET['company_code'] ?>";
        // console.log(company_code1);
        // alert(company_code1);
        var from_code1="<?php echo $_GET['from_code'] ?>";
        var to_code1="<?php echo $_GET['to_code'] ?>";
      
        let invoice_url =  "invoicereports/account_control_report.php?company_code1="+company_code1+"&from_code1="+from_code1+"&to_code1="+to_code1;
        window.open(invoice_url, '_blank');
    }); 
    $("#print_buttondown").on("click",function (e) {
        var company_code1="<?php echo $_GET['company_code'] ?>";
        // console.log(company_code1);
        // alert(company_code1);
        var from_code1="<?php echo $_GET['from_code'] ?>";
        var to_code1="<?php echo $_GET['to_code'] ?>";
        let invoice_url =  "invoicereports/account_control_report.php?company_code1="+company_code1+"&from_code1="+from_code1+"&to_code1="+to_code1;
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
 
</body>
</html>