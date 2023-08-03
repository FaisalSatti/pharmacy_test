<?php
session_start();
?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1>Chart Of Accounts</h1>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                    <li class="breadcrumb-item active"><button class="btn btn-sm" id="setups_breadcrumb">Setups</button></li>
                    <li class="breadcrumb-item active"><button class="btn btn-sm" id="chart_acc">Chart Of Accounts</button></li>
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
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Chart Of Accounts</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-3 no-padding 702a1a">
                                                    <button class="btn" id="control_account"> <i class="fa fa-building"></i>Control Accounts</button>
                                                </div>
                                                <div class="col-sm-3 no-padding 702a1b">
                                                    <button class="btn" id="sub_control_account"> <i class="fa fa-list-alt"></i> Sub Control Accounts</button>
                                                </div>
                                                <div class="col-sm-3 no-padding 702a1c">
                                                    <button class="btn" id="subsidiary_account"> <i class="fas fa-dolly"></i> Subsidiary Accounts</button>
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
    $('#control_account').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-building').addClass('fa-spin fa-refresh');
        $.get('setup_files/chart_of_account/control_account.php',function(data,status){
            $('#content').html(data);
        });
    });

    $('#sub_control_account').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-list-alt').addClass('fa-spin fa-refresh');
        $.get('setup_files/chart_of_account/sub_control_account.php',function(data,status){
            $('#content').html(data);
        });
    });

    $('#subsidiary_account').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-dolly').addClass('fa-spin fa-refresh');
        $.get('setup_files/chart_of_account/subsidiary_account.php',function(data,status){
            $('#content').html(data);
        });
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
    $("#chart_acc").on("click", function () {
        $.get('setup_files/chart_of_account/chart_of_account.php', function(data,status){
            $("#content").html(data);
        });
    });
});
</script>