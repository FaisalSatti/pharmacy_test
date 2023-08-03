<?php
session_start();
?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1>Transaction Files</h1>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                    <li class="breadcrumb-item active"><button class="btn btn-sm" id="tf_breadcrumb">Transaction Files</button></li>
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
                                                <div style = "display:none;" class="col-sm-3 no-padding 702a1a 301a show1">
                                                    <button class="btn" id="sale_order"> <i class="fas fa-box-open"></i> Sale Order</button>
                                                </div>
                                                <div style = "display:none;" class="col-sm-3 no-padding 702a1b 301b show1">
                                                    <button class="btn" id="del_challan"> <i class="fas fa-coins"></i> Delivery Challan</button>
                                                </div>
                                                <div style = "display:none;" class="col-sm-3 no-padding 702a1b 301c show1">
                                                    <button class="btn" id="b_invoice"> <i class="fas fa-receipt"></i> Invoive STAX</button>
                                                </div>
                                                <div style = "display:none;" class="col-sm-3 no-padding 702a1c 301d show1">
                                                    <button class="btn" id="return_note"> <i class="fas fa-coins"></i> Return Note</button>
                                                </div>
                                                <div style = "display:none;" class="col-sm-3 no-padding 702a1c 301e show1">
                                                    <button class="btn" id="credit_notes"> <i class="fas fa-money-check-alt"></i> Credit Notes</button>
                                                </div>
                                                <div style = "display:none;" class="col-sm-3 no-padding 702a1c 301f show1">
                                                    <button class="btn" id="audit"> <i class="fas fa-list"></i> Audit List</button>
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
    $('#sale_order').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fas")).removeClass('fa-box-open').addClass('fa-spin fa-refresh');
        $.get('sales_module/transaction_files/sales_order_list.php',function(data,status){
            $('#content').html(data);
        });
    });

    $('#del_challan').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-coins').addClass('fa-spin fa-refresh');
        $.get('sales_module/transaction_files/delivery_challan_list.php',function(data,status){
            $('#content').html(data);
        });
    });

    $('#b_invoice').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-receipt').addClass('fa-spin fa-refresh');
        $.get('sales_module/transaction_files/invoice_list.php',function(data,status){
            $('#content').html(data);
        });
    });

    $('#return_note').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-coins').addClass('fa-spin fa-refresh');
        $.get('sales_module/transaction_files/return_note_list.php',function(data,status){
            $('#content').html(data);
        });
    });

    $('#credit_notes').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-money-check-alt').addClass('fa-spin fa-refresh');
        $.get('sales_module/transaction_files/credit_note_list.php',function(data,status){
            $('#content').html(data);
        });
    });

    $('#voucher_l').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-list').addClass('fa-spin fa-refresh');
        $.get('sales_module/transaction_files/account_voucher_list.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#audit').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-list').addClass('fa-spin fa-refresh');
        $.get('sales_module/transaction_files/audit.php',function(data,status){
            $('#content').html(data);
        });
    });



    // breadcrumbs
    $('#dashboard_breadcrumb').click(function(){
        $.get('dashboard_main/dashboard_main.php',function(data,status){
            $('#content').html(data);
        });
    });
    $("#tf_breadcrumb").on("click", function () {
        $.get('sales_module/transaction_files/transaction_files.php', function(data,status){
            $("#content").html(data);
        });
    });
});
</script>