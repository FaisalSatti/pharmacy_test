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
                                            <h3 class="card-title">Transaction Files</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-3 no-padding 702a1a">
                                                    <button class="btn" id="stock_position"> <i class="fas fa-boxes"></i> Stock Position</button>
                                                </div>
                                                <div class="col-sm-3 no-padding 702a1b">
                                                    <button class="btn" id="stock_ledger"> <i class="fas fa-coins"></i> Stock Ledgers</button>
                                                </div>
                                                <div class="col-sm-3 no-padding 702a1b">
                                                    <button class="btn" id="mis_sale_report"> <i class="fas fa-analytics"></i> MIS Reports Sale</button>
                                                </div>
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
    $('#stock_position').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fas")).removeClass('fa-boxes').addClass('fa-spin fa-refresh');
        $.get('sales_module/reports/stock_position.php',function(data,status){
            $('#content').html(data);
        });
    });

    $('#stock_ledger').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-coins').addClass('fa-spin fa-refresh');
        $.get('sales_module/transaction_files/delivery_challan_list.php',function(data,status){
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



    // breadcrumbs
    $('#dashboard_breadcrumb').click(function(){
        $.get('dashboard_main/dashboard_main.php',function(data,status){
            $('#content').html(data);
        });
    });
    $("#sr_breadcrumb").on("click", function () {
        $.get('sales_module/reports/reports.php.php', function(data,status){
            $("#content").html(data);
        });
    });
});
</script>