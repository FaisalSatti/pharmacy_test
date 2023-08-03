<?php
session_start();
?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1>Trial Balance</h1>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                    <li class="breadcrumb-item"><button class="btn btn-sm" id="mis_breadcrumb"> MIS</button></li>
                    <li class="breadcrumb-item active"><button class="btn btn-sm" id="trial_bal_breadcrumb">Trial Balance</button></li>
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
                                            <h3 class="card-title">Trial Balance</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-3 no-padding 702a1a">
                                                    <button class="btn" id="control"> <i class="fas fa-list"></i> Control</button>
                                                </div>
                                                <div class="col-sm-3 no-padding 702a1b">
                                                    <button class="btn" id="sub_control"> <i class="fas fa-list-alt"></i> Sub Control</button>
                                                </div>
                                                <div class="col-sm-3 no-padding 702a1b">
                                                    <button class="btn" id="subsidiary"> <i class="fas fa-list-alt"></i> Subsidiary</button>
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
    
    $('#trial_balance').css('pointer-events','');
    $('#trial_balance').find($(".far")).removeClass('fa-spin fa-refresh').addClass('fa-circle');
    $('#control').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-list').addClass('fa-spin fa-refresh');
        $.get('financial_management/trial_balance/tb_control.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#sub_control').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-list').addClass('fa-spin fa-refresh');
        $.get('financial_management/trial_balance/tb_subcontrol.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#subsidiary').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-list').addClass('fa-spin fa-refresh');
        $.get('financial_management/trial_balance/tb_subsidiary.php',function(data,status){
            $('#content').html(data);
        });
    });



    // breadcrumbs
    $('#dashboard_breadcrumb').click(function(){
        $.get('dashboard_main/dashboard_main.php',function(data,status){
            $('#content').html(data);
        });
    });

    $("#mis_breadcrumb").on("click", function () {
    $.get('financial_management/account_vouchers/mis.php', function(data,status){
        $("#content").html(data);
    });
});

    $("#trial_bal_breadcrumb").on("click", function () {
        $.get('financial_management/trial_balance/trial_balance.php', function(data,status){
            $("#content").html(data);
        });
    });
});
</script>