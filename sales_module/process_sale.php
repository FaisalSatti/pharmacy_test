<?php
session_start();
?>
<style>
    input:focus,select:focus,textarea:focus,.select2-selection:focus, .add:focus, #submit:focus, .remove:focus{
-moz-box-shadow: 0 0 8px rgba(82,168,236,.6);
box-shadow: 0 0 8px #398ad7 !important;
border: 3px solid black;}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Post / UnPost</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                    <li class="breadcrumb-item active"><button class="btn btn-sm" id="vouchers_breadcrumb">Process</button></li>
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
                                        <h3 class="card-title">Post / UnPost</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div style = "display:none;" class="col-sm-3 no-padding 702a1a 303a show1">
                                                <button class="btn" id="post"> <i class="fa fa-building"></i>
                                                    Post</button>
                                            </div>
                                            <div style = "display:none;" class="col-sm-3 no-padding 702a1a 303b show1">
                                                <button class="btn" id="unpost"> <i class="fa fa-building"></i>
                                                    Unpost</button>
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

   
    <!-- Made by Sufyan -->


    




</div>
<?php

include '../includes/security.php';
?>
<script
>
    
        $('#post').click(function () {
            $(this).css('pointer-events', 'none');
            $(this).find($(".fa")).removeClass('fa-dolly').addClass('fa-spin fa-refresh');
            $.get('sales_module/post.php', function (data, status) {
                $('#content').html(data);
            });
        });
        $('#unpost').click(function () {
            $(this).css('pointer-events', 'none');
            $(this).find($(".fa")).removeClass('fa-dolly').addClass('fa-spin fa-refresh');
            $.get('sales_module/unpost.php', function (data, status) {
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
        $.get('sales_module/process_sale.php', function(data,status){
            $("#content").html(data);
        });
    });
   
</script>