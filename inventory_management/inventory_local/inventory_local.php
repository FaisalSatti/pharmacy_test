<?php
session_start();
?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1>Inventory Local</h1>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                    <li class="breadcrumb-item active"><button class="btn btn-sm" id="inv_local_breadcrumb">Inventory Local</button></li>
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
                                    <div class="col-sm-6" >
                                        <div class="card  card-primary">
                                            <div class="card-header ">
                                                <h3 class="card-title">LOCAL INVENTORY</h3>
                                            </div>
                                            <div class="card-body h-auto" style="" >
                                                <div class="row">
                                                    <!-- <div class="col-sm-3 no-padding 702a1a">
                                                        <button class="btn" id="po_local_list"> <i class="fas fa-box-open"></i> PO Local</button>
                                                    </div> -->
                                                    <div style  = "display:none;" class="col-sm-6 no-padding 702a1a 401a show1">
                                                        <button class="btn" id="po_local_list_v2"> <i class="fas fa-box-open"></i> PO Local</button>
                                                    </div>
                                                    <div style  = "display:none;" class="col-sm-6 no-padding 702a1a 401b show1">
                                                        <button class="btn" id="grn_local_list"> <i class="fas fa-box"></i> GRN Local</button>
                                                    </div>
                                                    <div style  = "display:none;" class="col-sm-6 401c show1">
                                                        <button class="btn" id="test"> <i class="fas fa-money-check-alt"></i>BILL - LOCAL</button>
                                                    </div>
                                                
                                                    <div style  = "display:none;" class="col-sm-6 no-padding 702a1a 401d show1">
                                                        <button class="btn" id="purchase_return"> <i class="fas fa-receipt"></i> Purchase Return</button>
                                                    </div>
                                                    <div style  = "display:none;" class="col-sm-6 no-padding 702a1c 401e show1">
                                                        <button class="btn" id="service_voucher"> <i class="fas fa-list"></i> Service Voucher</button>
                                                    </div>
                                                    <div style  = "display:none;" class="col-sm-6 no-padding 702a1c 401f show1">
                                                        <button class="btn" id="debit_voucher"> <i class="fas fa-list"></i> Debit Voucher</button>
                                                    </div>
                                                    
                                                
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="card  card-primary">
                                            <div class="card-header ">
                                                <h3 class="card-title">ISSUES</h3>
                                            </div>
                                            <div class="card-body" style="height:153px;">
                                                    <!-- <div class="col-sm-3 no-padding 702a1a">
                                                        <button class="btn" id="po_local_list"> <i class="fas fa-box-open"></i> PO Local</button>
                                                    </div> -->
                                                    <div class="row">
                                                        <div style  = "display:none;" class="col-sm-6 no-padding 702a1c 401g show1">
                                                            <button class="btn" id="issue_requisition"> <i class="fas fa-list"></i> Issue Requisition</button>
                                                        </div>
                                                        <div style  = "display:none;" class="col-sm-6 no-padding 702a1c 401h show1">
                                                            <button class="btn" id="gin"> <i class="fas fa-list"></i> Good Issue Notes</button>
                                                        </div>
                                                    </div>
                                                    
                                                
                                                
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="card  card-primary">
                                            <div class="card-header ">
                                                <h3 class="card-title">LOANS</h3>
                                            </div>
                                            <div class="card-body" style="height:150px;">
                                                <div class="row">
                                                    <div style  = "display:none;" class="col-sm-6 no-padding 702a1a 401i show1">
                                                        <button class="btn" id="issues_loan_to_party"> <i class="fas fa-coin"></i> Issue Loan [to Party]</button>
                                                    </div>
                                                    <div style  = "display:none;" class="col-sm-6 no-padding 702a1a 401j show1">
                                                        <button class="btn" id="issues_return"> <i class="fas fa-coin"></i> Issues Return [From Party]</button>
                                                    </div>
                                                </div>
                                                
                                                
                                                    
                                                
                                                
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="card  card-primary">
                                            <div class="card-header ">
                                                <h3 class="card-title">TRANSFER & PRODUCTION</h3>
                                            </div>
                                            <div class="card-body" style="height:150px;">
                                                <div class="row">
                                                        <div style  = "display:none;" class="col-sm-6 401k show1">
                                                            <button class="btn" id="transfer"> <i class="fas fa-list"></i>Transfer</button>
                                                        </div>
                                                        <div style  = "display:none;" class="col-sm-6 401l show1">
                                                            <button class="btn" id="transferbd"> <i class="fas fa-list"></i>Transfer By Division</button>
                                                        </div>
                                                        <div style  = "display:none;" class="col-sm-6 401m show1">
                                                            <button class="btn" id="production"> <i class="fas fa-list"></i>Production</button>
                                                        </div>
                                                </div>
                                                    
                                                
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
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
    $('#po_local_list').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fas")).removeClass('fa-box-open').addClass('fa-spin fa-refresh');
        $.get('inventory_management/inventory_local/po_local_list.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#test').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fas")).removeClass('fa-box-open').addClass('fa-spin fa-refresh');
        $.get('inventory_management/inventory_local/bill_local.php',function(data,status){
            $('#content').html(data);
    });
        });
    $('#gin').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fas")).removeClass('fa-box-open').addClass('fa-spin fa-refresh');
        $.get('inventory_management/inventory_local/gin.php',function(data,status){
            $('#content').html(data);
    });
        });
   
    $('#transfer').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fas")).removeClass('fa-box-open').addClass('fa-spin fa-refresh');
        $.get('inventory_management/inventory_local/transfer_list.php',function(data,status){
            $('#content').html(data);
    });
        });
    $('#transferbd').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fas")).removeClass('fa-box-open').addClass('fa-spin fa-refresh');
        $.get('inventory_management/inventory_local/tr_bd_list.php',function(data,status){
            $('#content').html(data);
    });
        });
   
    $('#production').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fas")).removeClass('fa-box-open').addClass('fa-spin fa-refresh');
        $.get('inventory_management/inventory_local/production_list.php',function(data,status){
            $('#content').html(data);
    });
        });
   

    $('#po_local_list_v2').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fas")).removeClass('fa-box-open').addClass('fa-spin fa-refresh');
        $.get('inventory_management/inventory_local/po_local_list_v2.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#service_voucher').click(function(){
            $(this).css('pointer-events','none');
            $(this).find($(".fa")).removeClass('fa-list').addClass('fa-spin fa-refresh');
            $.get('inventory_management/inventory_local/service_voucher.php',function(data,status){
                $('#content').html(data);
        });
    });
        $('#debit_voucher').click(function(){
            $(this).css('pointer-events','none');
            $(this).find($(".fa")).removeClass('fa-list').addClass('fa-spin fa-refresh');
            $.get('inventory_management/inventory_local/debit_voucher.php',function(data,status){
                $('#content').html(data);
        });
    });
    $('#issue_requisition').click(function(){
            $(this).css('pointer-events','none');
            $(this).find($(".fa")).removeClass('fa-list').addClass('fa-spin fa-refresh');
            $.get('inventory_management/inventory_local/issue_requisition.php',function(data,status){
                $('#content').html(data);
        });
    });

    $('#grn_local_list').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fas")).removeClass('fa-box').addClass('fa-spin fa-refresh');
        $.get('inventory_management/inventory_local/grn_local_list.php',function(data,status){
            $('#content').html(data);
        });
    });

    $('#purchase_return').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fas")).removeClass('fa-box').addClass('fa-spin fa-refresh');
        $.get('inventory_management/inventory_local/purchase_return.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#issues_return').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fas")).removeClass('fa-box').addClass('fa-spin fa-refresh');
        $.get('inventory_management/inventory_local/issues_return_p_to_loan_list.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#issues_loan_to_party').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fas")).removeClass('fa-box').addClass('fa-spin fa-refresh');
        $.get('inventory_management/inventory_local/issues_loan_to_party.php',function(data,status){
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
   
    // breadcrumbs
    $('#dashboard_breadcrumb').click(function(){
        $.get('dashboard_main/dashboard_main.php',function(data,status){
            $('#content').html(data);
        });
    });
    $("#inv_local_breadcrumb").on("click", function () {
        $.get('inventory_management/inventory_local/inventory_local.php', function(data,status){
            $("#content").html(data);
        });
    });
});
</script>