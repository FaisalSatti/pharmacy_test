<?php
session_start();
?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1>Sales Report</h1>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                    <li class="breadcrumb-item active"><button class="btn btn-sm" id="sr_breadcrumb">Sales Report</button></li>
                </ol>
                </div>   
            </div>
            </div><!-- /.container-fluid -->
        </section>

         <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card-body button">
                            <div class="row 702a1">
                                <div class="col-sm-12">
                                    <div class="card  card-primary">
                                        <div class="card-header ">
                                            <h3 class="card-title"> Stock Position</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div style  = "display:none;" class="col-sm-3 no-padding 702a1a 302a show1">
                                                    <button class="btn" id="by_company"> <i class="fas fa-landmark"></i> By Company</button>
                                                </div>
                                                <div style  = "display:none;" class="col-sm-3 no-padding 702a1b 302b show1">
                                                    <button class="btn" id="by_loc_item"> <i class="fas fa-coins"></i> By Loc/Item</button>
                                                </div>
                                                <!-- <div class="col-sm-3 no-padding 702a1b">
                                                    <button class="btn" id="mis_sale_report"> <i class="fas fa-analytics"></i> MIS Reports Sale</button>
                                                </div> -->
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="card  card-primary">
                                        <div class="card-header ">
                                            <h3 class="card-title">MIS REPORTS SALES</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div style  = "display:none;" class="col-sm-3 no-padding 702a1a 302c show1">
                                                    <button class="btn" id="net_sale_report"> <i class="fas fa-landmark"></i> Net Sales Report</button>
                                                </div>
                                                <div style  = "display:none;" class="col-sm-3 no-padding 702a1a 302d show1">
                                                    <button class="btn" id="net_sale_report_by_item"> <i class="fas fa-landmark"></i> Net Sales Report By Item</button>
                                                </div>
                                                <div style  = "display:none;" class="col-sm-3 no-padding 702a1a 302e show1">
                                                    <button class="btn" id="net_sale_report_by_party"> <i class="fas fa-landmark"></i> Net Sales Report By Party</button>
                                                </div>

                                                <div style  = "display:none;" class="col-sm-3 no-padding 702a1a 302f show1">
                                                    <button class="btn" id="daily_sales_collection"> <i class="fas fa-landmark"></i> Daily Sales / Collection</button>
                                                </div>
                                                
                                                <div style  = "display:none;" class="col-sm-3 no-padding 702a1a 302g show1">
                                                    <button class="btn" id="pending_order"> <i class="fas fa-landmark"></i> Pending Order</button>
                                                </div>

                                                <div style  = "display:none;" class="col-sm-3 no-padding 702a1a 302h show1">
                                                    <button class="btn" id="debtor_summary"> <i class="fas fa-landmark"></i> Debtor Summary</button>
                                                </div>
                                                
                                                
                                                <!-- <div class="col-sm-3 no-padding 702a1b">
                                                    <button class="btn" id="mis_sale_report"> <i class="fas fa-analytics"></i> MIS Reports Sale</button>
                                                </div> -->
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="card  card-primary">
                                        <div class="card-header ">
                                            <h3 class="card-title"> Stock Ledger</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div style = "display:none;" class="col-sm-3 no-padding 702a1a 302i show1">
                                                    <button class="btn" id="ledger_by_company"> <i class="fas fa-landmark"></i> By Company</button>
                                                </div>
                                                <div style = "display:none;" class="col-sm-3 no-padding 702a1b 302j show1">
                                                    <button class="btn" id="ledger_by_loc_item"> <i class="fas fa-coins"></i> By Loc/Item</button>
                                                </div>
                                                <div style = "display:none;" class="col-sm-3 no-padding 702a1b 302k show1">
                                                    <button class="btn" id="ledger_by_batch_no"> <i class="fas fa-coins"></i> By Batch No</button>
                                                </div>
                                                <!-- <div class="col-sm-3 no-padding 702a1b">
                                                    <button class="btn" id="mis_sale_report"> <i class="fas fa-analytics"></i> MIS Reports Sale</button>
                                                </div> -->
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                                
                            </div> 
                            <!-- /.row -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <?php

include '../../includes/security.php';
?>

<script>
// Function for control module
$(document).ready(function() {
    $("#reports").css('pointer-events','');
    $("#reports").find($(".far")).removeClass('fa-spin fa-refresh').addClass('fa-file');
    $('#by_company').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fas")).removeClass('fa-landmark').addClass('fa-spin fa-refresh');
        $.get('sales_module/reports/stock_position_company.php',function(data,status){
            $('#content').html(data);
        });
    });

    $('#by_loc_item').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-coins').addClass('fa-spin fa-refresh');
        $.get('sales_module/reports/stock_position_item.php',function(data,status){
            $('#content').html(data);
        });
    });

    $('#net_sale_report').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-coins').addClass('fa-spin fa-refresh');
        $.get('sales_module/reports/net_sale.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#net_sale_report_by_item').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-coins').addClass('fa-spin fa-refresh');
        $.get('sales_module/reports/netsale_byitem.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#net_sale_report_by_party').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-coins').addClass('fa-spin fa-refresh');
        $.get('sales_module/reports/netsale_byparty.php',function(data,status){
            $('#content').html(data);
        });
    });



    $('#daily_sales_collection').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fas")).removeClass('fa-landmark').addClass('fa-spin fa-refresh');
        $.get('sales_module/reports/daily_sales_collection.php',function(data,status){
            $('#content').html(data);
        });
    });

    $('#pending_order').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fas")).removeClass('fa-landmark').addClass('fa-spin fa-refresh');
        $.get('sales_module/reports/pending_sale_order.php',function(data,status){
            $('#content').html(data);
        });
    });

    $('#debtor_summary').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fas")).removeClass('fa-landmark').addClass('fa-spin fa-refresh');
        $.get('sales_module/reports/debtor_summary_form.php',function(data,status){
            $('#content').html(data);
        });
    });






    $('#mis_sale_report').click(function(){
        // $(this).css('pointer-events','none');
        // $(this).find($(".fa")).removeClass('fa-receipt').addClass('fa-spin fa-refresh');
        // $.get('sales_module/transaction_files/invoice_list.php',function(data,status){
        //     $('#content').html(data);
        // });
    });

    $('#ledger_by_company').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fas")).removeClass('fa-landmark').addClass('fa-spin fa-refresh');
        $.get('sales_module/reports/stock_ledger_company.php',function(data,status){
            $('#content').html(data);
        });
    });

    $('#ledger_by_loc_item').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fas")).removeClass('fa-landmark').addClass('fa-spin fa-refresh');
        $.get('sales_module/reports/stock_ledger_item.php',function(data,status){
            $('#content').html(data);
        });
    });

    $('#ledger_by_batch_no').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fas")).removeClass('fa-landmark').addClass('fa-spin fa-refresh');
        $.get('sales_module/reports/stock_ledger_batchno.php',function(data,status){
            $('#content').html(data);
        });
    });

    // breadcrumbs
    $('#dashboard_breadcrumb').click(function(){
        $.get('dashboard_main/dashboard_main.php',function(data,status){
            $('#content').html(data);
        });
    });
    $("#sr_breadcrumb").on("click", function () {
        $.get('sales_module/reports/reports.php', function(data,status){
            $("#content").html(data);
        });
    });
});
</script>