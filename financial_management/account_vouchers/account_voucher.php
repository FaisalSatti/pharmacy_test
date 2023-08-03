<?php
session_start();
?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1>Account Vouchers</h1>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                    <li class="breadcrumb-item active"><button class="btn btn-sm" id="vouchers_breadcrumb">Account Vouchers</button></li>
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
                                            <h3 class="card-title">Account Vouchers</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div style = "display:none;"  class="col-sm-3 no-padding 702a1a 201a show1">
                                                    <button class="btn" id="c_receipt"> <i class="fas fa-receipt"></i> Cash Receipt</button>
                                                </div>
                                                <div style = "display:none;"  class="col-sm-3 no-padding 702a1b 201b show1">
                                                    <button class="btn" id="c_payment"> <i class="fas fa-coins"></i> Cash Payment</button>
                                                </div>
                                                <div style = "display:none;"  class="col-sm-3 no-padding 702a1b 201c show1">
                                                    <button class="btn" id="b_receipt"> <i class="fas fa-receipt"></i> Bank Receipt</button>
                                                </div>
                                                <div style = "display:none;"  class="col-sm-3 no-padding 702a1c 201d show1">
                                                    <button class="btn" id="b_payment"> <i class="fas fa-coins"></i> Bank Payment</button>
                                                </div>
                                                <div style = "display:none;"  class="col-sm-3 no-padding 702a1c 201e show1">
                                                    <button class="btn" id="j_voucher"> <i class="fas fa-money-check-alt"></i> Journal Voucher</button>
                                                </div>
                                                <div style = "display:none;"  class="col-sm-3 no-padding 702a1c 201f show1">
                                                    <button class="btn" id="voucher_l"> <i class="fas fa-list"></i> Voucher List</button>
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
    $('#c_receipt').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-receipt').addClass('fa-spin fa-refresh');
        $.get('financial_management/account_vouchers/cash_receipt.php',function(data,status){
            $('#content').html(data);
        });
    });

    $('#c_payment').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-coins').addClass('fa-spin fa-refresh');
        $.get('financial_management/account_vouchers/cash_payment.php',function(data,status){
            $('#content').html(data);
        });
    });

    $('#b_receipt').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-receipt').addClass('fa-spin fa-refresh');
        $.get('financial_management/account_vouchers/bank_receipt.php',function(data,status){
            $('#content').html(data);
        });
    });

    $('#b_payment').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-coins').addClass('fa-spin fa-refresh');
        $.get('financial_management/account_vouchers/bank_payment.php',function(data,status){
            $('#content').html(data);
        });
    });

    $('#j_voucher').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-money-check-alt').addClass('fa-spin fa-refresh');
        $.get('financial_management/account_vouchers/journal_voucher.php',function(data,status){
            $('#content').html(data);
        });
    });

    $('#voucher_l').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-list').addClass('fa-spin fa-refresh');
        $.get('financial_management/account_vouchers/account_voucher_list.php',function(data,status){
            $('#content').html(data);
        });
    });



    // breadcrumbs
    $('#dashboard_breadcrumb').click(function(){
        $.get('dashboard_main/dashboard_main.php',function(data,status){
            $('#content').html(data);
        });
    });
    $("#vouchers_breadcrumb").on("click", function () {
        $.get('financial_management/account_vouchers/account_voucher.php', function(data,status){
            $("#content").html(data);
        });
    });
});
</script>