<?php
session_start();
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Debtor Summary Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                        <li class="breadcrumb-item active"><button class="btn btn-sm" id="report_breadcrumb"> Reports</button></li>
                        <li class="breadcrumb-item"><button class="btn btn-sm" id="debtor_summary_breadcrumb">Debtor Summary Form</button></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content" style="margin-top:30px;width:100%;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="border:1px solid gray;padding:20px;border-radius:5px;box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.2), 0 20px 20px 0 rgba(0, 0, 0, 0.19);">
                        <div class="card-body">
                            <div class="container">
                                <form method="post" id="ledger_form">
                                    <?php include '../../display_message/display_message.php' ?>
                                    <div class="row" style="margin-top:-14px;border-radius:4px;border  :2px solid #1e293b; padding-top:8px;box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
                                        <div class="col-lg-2 col-md-2 col-sm-12 form-group">
                                            <label for="">Company:<span style="color:red">*</span></label>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                                </div>
                                                <select class="form-control form-control-sm js-example-basic-single" id="company_code" name="company_code">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input style="background-color:#ccd4e1;font-weight:bold;" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="company_name" id="company_name" class="form-control form-control-sm" placeholder="Company Name" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-12 form-group">
                                            <label for="">Division :<span style="color:red">*</span></label>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                                </div>
                                                <select class="form-control form-control-sm js-example-basic-single" id="div_code" name="div_code">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input style="background-color:#ccd4e1;font-weight:bold;" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="div_name" id="div_name" class="form-control form-control-sm" placeholder="Division Name" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-12 form-group">
                                            <label for="">Zone :<span style="color:red">*</span></label>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                                </div>
                                                <select class="form-control form-control-sm js-example-basic-single" id="zone_code" name="zone_code">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input style="background-color:#ccd4e1;font-weight:bold;" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="zone_name" id="zone_name" class="form-control form-control-sm" placeholder="Zone Name" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-12 form-group">
                                            <label for="">Account Code :<span style="color:red">*</span></label>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                                </div>
                                                <select class="form-control form-control-sm js-example-basic-single" id="acc_code" name="acc_code">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input style="background-color:#ccd4e1;font-weight:bold;" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="acc_name" id="acc_name" class="form-control form-control-sm" placeholder="Account Name" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-12 form-group">
                                            <label for="">From Date :</label><span style="color:red;">*</span>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input type="date" name="from_date" id="from_date" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-12 form-group">
                                            <label for="">To Date :</label><span style="color:red;">*</span>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input type="date" name="to_date" id="to_date" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                        <div class="container mt-3">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <button type="button" id="ledger" class="btn btn-primary w-100 mb-2">Report - CO WISE</button>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <!-- <button type="button" id="ledger" class="btn btn-primary w-100">Online Ledger</button> -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->
<style>
    body {
        zoom: 90%;
    }
    select {
        width: 82% !important;
    }
    .input-group-prepend {
    }
    input:focus,
    select:focus,
    textarea:focus,
    .select2-selection:focus {
        -moz-box-shadow: 0 0 8px rgba(82, 168, 236, .6);
        box-shadow: 0 0 8px orangered !important;
    }
    .form-control:focus {
        -moz-box-shadow: 0 0 8px rgba(82, 168, 236, .6);
        box-shadow: 0 0 8px orangered !important;
    }
    .select2-selection {
        background-color: #ccd4e1 !important
    }
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none !important;
        margin: 0 !important;
    }
    input[type=number] {
        -moz-appearance: textfield !important;
    }
    .select2-container {
        width: 80% !important;
    }
    @media only screen and (min-width: 250px) and (max-width: 350px) {
        .select2-container {
            width: 78% !important;
        }
    }
    @media only screen and (min-width: 351px) and (max-width: 499px) {
        .select2-container {
            width: 84% !important;
        }
    }
    @media only screen and (min-width: 500px) and (max-width: 767px) {
        .select2-container {
            width: 90% !important;
        }
    }
    @media screen and (min-width: 768px) and (max-width:994px) {
        .select2-container {
            width: 82% !important;
        }
    }
    @media screen and (min-width: 995px) and (max-width:1024px) {
        .select2-container {
            width: 83% !important;
        }
    }
    @media screen and (min-width: 1025px) and (max-width:1440px) {
        .select2-container {
            width: 83% !important;
        }
    }
    .select2-container *:focus {
        outline: none !important;
        border: 2px solid black !important
    }
    .select2-selection--single {
        background: #b7edea !important;
    }
</style>
<?php

include '../../includes/security.php';
?>

<script>
    $(document).ready(function() {
        $('#online_ledger').css('pointer-events', '');
        $('#online_ledger').find($(".far")).removeClass('fa-spin fa-refresh').addClass('fa-circle');
        $('.js-example-basic-single').select2();
    });
    $(function() {
        $.validator.setDefaults({
            submitHandler: function() {
            }
        });
        $('#ledger_form').validate({
            rules: {
                company_code: {
                    required: true,
                },
                item_code: {
                    required: true,
                },
                from_date: {
                    required: true,
                },
                to_date: {
                    required: true,
                }
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
    $('#example1').ready(function() {
        $.ajax({
            url: 'api/setup/chart_of_account/control_account_api.php',
            type: 'POST',
            data: {
                action: 'company_code'
            },
            dataType: "json",
            success: function(response) {
                $('#company_code').html('');
                $('#company_code').append('<option value="" selected disabled>Select Company</option>');
                $.each(response, function(key, value) {
                    $('#company_code').append('<option data-name="' + value["co_name"] + '"  data-code=' + value["co_code"] + ' value=' + value["co_code"] + '>' + value["co_code"] + ' - ' + value["co_name"] + '</option>');
                });
            },
            error: function(error) {
                console.log(error);
                alert("Contact IT Department");
            }
        });
        $("#ledger_form").on('change', '#company_code', function() {
            var company_name = $('#company_code').find(':selected').attr("data-name");
            var company_code = $('#company_code').find(':selected').attr("data-code");
            $('#select2-company_code-container').html(company_code);
            $('#company_name').val(company_name);
            $company_code = $('#company_code').val();
            $.ajax({
                url: 'api/financial_management/MIS/online_ledger_api.php',
                type: 'POST',
                data: {
                    action: 'account',
                    company_code: company_code
                },
                dataType: "json",
                success: function(response) {
                    $('#acc_code').html('');
                    $('#acc_code').append('<option value="" selected disabled>Select Account</option>');
                    $.each(response, function(key, value) {
                        $('#acc_code').append('<option data-name="' + value["DESCR"] + '"  data-code=' + value["ACCOUNT_CODE"] + ' value=' + value["ACCOUNT_CODE"] + '>' + value["ACCOUNT_CODE"] + ' - ' + value["DESCR"] + '</option>');
                    });
                },
                error: function(error) {
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
            $("#ledger_form").on('change', '#acc_code', function() {
                var acc_name = $('#acc_code').find(':selected').attr("data-name");
                var acc_code = $('#acc_code').find(':selected').attr("data-code");
                $('#select2-acc_code-container').html(acc_code);
                $('#acc_name').val(acc_name);
            });
        });
        $.ajax({
            url: 'api/financial_management/MIS/online_ledger_api.php',
            type: 'POST',
            data: {
                action: 'division'
            },
            dataType: "json",
            success: function(response) {
                $('#div_code').html('');
                $('#div_code').append('<option value="" selected disabled>Select Division</option>');
                $.each(response, function(key, value) {
                    $('#div_code').append('<option data-name="' + value["div_name"] + '"  data-code=' + value["div_code"] + ' value=' + value["div_code"] + '>' + value["div_code"] + ' - ' + value["div_name"] + '</option>');
                });
            },
            error: function(error) {
                console.log(error);
                alert("Contact IT Department");
            }
        });
        $("#ledger_form").on('change', '#div_code', function() {
            var div_name = $('#div_code').find(':selected').attr("data-name");
            var div_code = $('#div_code').find(':selected').attr("data-code");
            $('#select2-div_code-container').html(div_code);
            $('#div_name').val(div_name);
        });
        $.ajax({
            url: 'api/financial_management/MIS/online_ledger_api.php',
            type: 'POST',
            data: {
                action: 'zone'
            },
            dataType: "json",
            success: function(response) {
                console.log(response);
                $('#zone_code').html('');
                $('#zone_code').append('<option value="" selected disabled>Select Zone</option>');
                $.each(response, function(key, value) {
                    $('#zone_code').append('<option data-name="' + value["zone_name"] + '"  data-code=' + value["zone_code"] + ' value=' + value["zone_code"] + '>' + value["zone_code"] + ' - ' + value["zone_name"] + '</option>');
                });
            },
            error: function(error) {
                console.log(error);
                alert("Contact IT Department");
            }
        });
        $("#ledger_form").on('change', '#zone_code', function() {
            var zone_name = $('#zone_code').find(':selected').attr("data-name");
            var zone_code = $('#zone_code').find(':selected').attr("data-code");
            $('#select2-zone_code-container').html(zone_code);
            $('#zone_name').val(zone_name);
        });
    });
    $("#ledger").on("click", function(e) {
        if ($("#ledger_form").valid()) {
            var company_code = $('#company_code').val();
            var div_code = $('#div_code').val();
            var zone_code = $('#zone_code').val();
            var acc_code = $('#acc_code').val();
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            let invoice_url = "invoicereports/debtor_report_co_wise.php?action=print&company_code=" + company_code + "&div_code=" + div_code + "&zone_code=" + zone_code + "&acc_code=" + acc_code + "&from_date=" + from_date + "&to_date=" + to_date;
            window.open(invoice_url, '_blank');
        }
    });
    $('#dashboard_breadcrumb').click(function() {
        $.get('dashboard_main/dashboard_main.php', function(data, status) {
            $('#content').html(data);
        });
    });
    $("#report_breadcrumb").on("click", function() {
        $.get('sales_module/reports/reports.php', function(data, status) {
            $("#content").html(data);
        });
    });
    $("#debtor_summary_breadcrumb").on("click", function() {
        $.get('sales_module/reports/debtor_summary_form.php', function(data, status) {
            $("#content").html(data);
        });
    });
</script>
<?php include '../../includes/loader.php' ?>