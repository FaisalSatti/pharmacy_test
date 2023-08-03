<?php
session_start();
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>MIS Inventory Local</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                        <li class="breadcrumb-item active"><button class="btn btn-sm" id="mis_inv_local_breadcrumb">MIS Inventory Local</button></li>
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
                            <div class="col-sm-12" >
                                <div class="card  card-primary">
                                    <div class="card-header ">
                                        <h3 class="card-title">LOCAL INVENTORY REPORT</h3>
                                    </div>
                                    <div class="card-body h-auto"  >
                                        <div class="row">
                                            <div style  = "display:none;" class="col-sm-3 no-padding 702a1c 403a show1">
                                                <button class="btn" id="purchasebyitem"> <i class="fas fa-books"></i> Purchase Activity By Item</button>
                                            </div>
                                            <div style  = "display:none;" class="col-sm-3 no-padding 702a1c 403b show1">
                                                <button class="btn" id="purchasebyparty"> <i class="fas fa-street-view"></i> Purchase Activity By Party</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->         
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
    $('#purchasebyparty').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fas")).removeClass('fa-books').addClass('fa-spin fa-refresh');
        $.get('inventory_management/mis_report/purchase_activity_party.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#purchasebyitem').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fas")).removeClass('fa-street-view').addClass('fa-spin fa-refresh');
        $.get('inventory_management/mis_report/purchase_activity_item.php',function(data,status){
            $('#content').html(data);
        });
    });
});

// breadcrumbs
$('#dashboard_breadcrumb').click(function(){
    $.get('dashboard_main/dashboard_main.php',function(data,status){
        $('#content').html(data);
    });
});

$('#mis_inv_local_breadcrumb').click(function(){
    $.get('inventory_management/mis_report/inventory_mis.php',function(data,status){
        $('#content').html(data);
    });
});
</script>
