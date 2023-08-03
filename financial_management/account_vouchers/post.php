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
                    <h1>Post</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        
                    <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                    <li class="breadcrumb-item active"><button class="btn btn-sm" id="vouchers_breadcrumb">Process</button></li>
                    <li class="breadcrumb-item active"><button class="btn btn-sm" id="posting">Post</button></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="modal fade" id="InsertFormModelsa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
        role="dialog">
        <div class="modal-dialog modal-lg" role="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                    <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form action="" id="myForm">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <select class="js-example-basic-single form-control" id="party_id" name="party_id">

                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="text" readonly class="form-control" name="party_name" tabindex="-1" id="party_name"
                                        placeholder="party Name">
                                </div>
                            </div>
                            <br>
                            <div class="d-grid">
                                <button type="button" id="submit" class="btn btn-primary btn-block">SUBMIT</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                                        <h3 class="card-title">Post</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3 no-padding 702a1a">
                                                <button class="btn" id="total"> <i class="fa fa-building"></i>
                                                Total</button>
                                            </div>
                                            <div class="col-sm-3 no-padding 702a1a">
                                                <button class="btn" id="type_datewise"> <i class="fa fa-building"></i>
                                                Type Date Wise</button>
                                            </div>
                                            <div class="col-sm-3 no-padding 702a1a">
                                                <button class="btn" id="datewise"> <i class="fa fa-building"></i>
                                                Date Wise</button>
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

include '../../includes/security.php';
?>


<script>
 $('#total').click(function () {
            $(this).css('pointer-events', 'none');
            $(this).find($(".fa")).removeClass('fa-dolly').addClass('fa-spin fa-refresh');
            $.get('financial_management/account_vouchers/total.php', function (data, status) {
                $('#content').html(data);
            });
    });
    $('#type_datewise').click(function () {
            $(this).css('pointer-events', 'none');
            $(this).find($(".fa")).removeClass('fa-dolly').addClass('fa-spin fa-refresh');
            $.get('financial_management/account_vouchers/type_datewise.php', function (data, status) {
                $('#content').html(data);
            });
    });
    $('#datewise').click(function () {
            $(this).css('pointer-events', 'none');
            $(this).find($(".fa")).removeClass('fa-dolly').addClass('fa-spin fa-refresh');
            $.get('financial_management/account_vouchers/datewise.php', function (data, status) {
                $('#content').html(data);
            });
    });

    $('#dashboard_breadcrumb').click(function(){
        $.get('dashboard_main/dashboard_main.php',function(data,status){
            $('#content').html(data);
        });
    });
    $("#vouchers_breadcrumb").on("click", function () {
        $.get('financial_management/account_vouchers/process.php', function(data,status){
            $("#content").html(data);
        });
    });
    $("#posting").on("click", function () {
        $.get('financial_management/account_vouchers/post.php', function(data,status){
            $("#content").html(data);
        });
    });
</script>