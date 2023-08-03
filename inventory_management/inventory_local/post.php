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
                    <h1>Post Inventory Local</h1>
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
                                        <h3 class="card-title">Post Inventory Local</h3>
                                    </div> 
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3 no-padding 702a1a">
                                                <button class="btn" id="total"> <i class="fa fa-building"></i>
                                                    Post Total</button>
                                            </div>
                                            <div class="col-sm-3 no-padding 702a1a">
                                                <button class="btn" id="type_dt"> <i class="fa fa-building"></i>
                                                    Post Type/Date-Wise</button>
                                            </div>
                                            <div class="col-sm-3 no-padding 702a1a">
                                                <button class="btn" id="dt"> <i class="fa fa-building"></i>
                                                    Date-Wise</button>
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

    <!-- sufyan -->
    <div class="modal fade" id="InsertFormModel" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New
                        Category</h5>
                    <button type="button" class="close" aria-label="Close"
                        data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="company_form">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="inputCompanyCode">Company Code
                                    :</label><span style="color:red;">*</span>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i
                                                class="fas fa-arrow-up"></i></span>
                                    </div>


                                    <select
                                        class="js-example-basic-single form-control"
                                        style="width:85%" id="company_id"
                                        name="company_id">

                                    </select>


                                </div>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="inputCompanyName">Company Name
                                    :</label><span style="color:red;">*</span>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i
                                                class="fas fa-pen"></i></span>
                                    </div>


                                    <input type="text" selected readonly
                                        class="form-control" name="company_name"
                                        id="company_name" tabindex="-1"
                                        placeholder="Company Name">


                                </div>
                            </div>
                        </div>
                        <div class="row" id="division_id_div">
                            <div class="col-md-6 form-group">
                                <label for="inputDivisionCode">Division Code
                                    :</label><span style="color:red;">*</span>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i
                                                class="fas fa-arrow-up"></i></span>
                                    </div>
                                    <select
                                        class="js-example-basic-single form-control"
                                        id="division_id" style="width:85%"
                                        name="division_id">

                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="inputDivisionName">Division Name
                                    :</label><span style="color:red;">*</span>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i
                                                class="fas fa-pen"></i></span>

                                    </div>
                                    <input type="text" selected readonly
                                        class="form-control"
                                        name="division_name" id="division_name" tabindex="-1"
                                        placeholder="Division Name">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 form-group text-center">
                                <span id="msg1"
                                    style="color: red;font-size: 13px;"></span>
                            </div>
                            <div class="col-sm-6 form-group text-center">
                                <span id="msg2"
                                    style="color: red;font-size: 13px;"></span>
                            </div>
                        </div>



                        <a type="submit" target="_blank"
                            id="submit_party_list_sufi"
                            class="btn btn-primary toastrDefaultSuccess">Submit</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="item_list_modal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New
                        Category</h5>
                    <button type="button" class="close" aria-label="Close"
                        data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="company_form_list">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="inputCompanyCode">Company Code
                                    :</label><span style="color:red;">*</span>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i
                                                class="fas fa-arrow-up"></i></span>
                                    </div>


                                    <select
                                        class="js-example-basic-single form-control"
                                        style="width:85%" id="company_id_list"
                                        name="company_id">

                                    </select>


                                </div>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="inputCompanyName">Company Name
                                    :</label><span style="color:red;">*</span>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i
                                                class="fas fa-pen"></i></span>
                                    </div>


                                    <input type="text" selected readonly
                                        class="form-control" name="company_name"
                                        id="company_name_list"
                                        placeholder="Company Name">


                                </div>
                            </div>
                        </div>
                        <div class="row" id="division_id_div_list">
                            <div class="col-md-6 form-group">
                                <label for="inputDivisionCode">Division Code
                                    :</label><span style="color:red;">*</span>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i
                                                class="fas fa-arrow-up"></i></span>
                                    </div>
                                    <select
                                        class="js-example-basic-single form-control"
                                        id="division_id_list" style="width:85%"
                                        name="division_id">

                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="inputDivisionName">Division Name
                                    :</label><span style="color:red;">*</span>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i
                                                class="fas fa-pen"></i></span>

                                    </div>
                                    <input type="text" selected readonly
                                        class="form-control"
                                        name="division_name"
                                        id="division_name_list"
                                        placeholder="Division Name">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 form-group text-center">
                                <span id="msg1"
                                    style="color: red;font-size: 13px;"></span>
                            </div>
                            <div class="col-sm-6 form-group text-center">
                                <span id="msg2"
                                    style="color: red;font-size: 13px;"></span>
                            </div>
                        </div>



                        <a type="submit" target="_blank" id="submit_list"
                            class="btn btn-primary toastrDefaultSuccess">Submit</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    



</div>
<?php

include '../../includes/security.php';
?>

<script>
    // Function for control module
    $(document).ready(function () {
        $('#company').click(function () {
            $(this).css('pointer-events', 'none');
            $(this).find($(".fa")).removeClass('fa-building').addClass('fa-spin fa-refresh');
            $.get('setup_files/company_setup.php', function (data, status) {
                $('#content').html(data);
            });
        });
        $(function () {
            $.validator.setDefaults({
                submitHandler: function () {
                    // alert( "Form successful submitted!" );
                }
            });
            $('#company_form').validate({
                rules:
                {
                    company_id: {
                        required: true,
                    },
                    company_name: {
                        required: true,
                    },
                    division_id: {
                        required: true,
                    },
                    division_name: {
                        required: true,
                    }
                },

                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });

            $('#company_form_list').validate
                ({
                    rules:
                    {
                        company_id: {
                            required: true,
                        },
                        company_name: {
                            required: true,
                        },
                        division_id: {
                            required: true,
                        },
                        division_name: {
                            required: true,
                        }
                    },

                    errorElement: 'span',
                    errorPlacement: function (error, element) {
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    highlight: function (element, errorClass, validClass) {
                        $(element).addClass('is-invalid');
                    },
                    unhighlight: function (element, errorClass, validClass) {
                        $(element).removeClass('is-invalid');
                    }
                });

            $('#myForm').validate
                ({
                    rules:
                    {
                        party_id: {
                            required: true,
                        },
                        party_name: {
                            required: true,
                        }
                    },

                    errorElement: 'span',
                    errorPlacement: function (error, element) {
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    highlight: function (element, errorClass, validClass) {
                        $(element).addClass('is-invalid');
                    },
                    unhighlight: function (element, errorClass, validClass) {
                        $(element).removeClass('is-invalid');
                    }
                });


        });
        $("#submit").click(function () {
            if ($("#myForm").valid()) {
                var party_id = $('#party_id').val();
                let report_url = 'partylist/partylist_code.php?sid=' + party_id;
                window.open(report_url, '_blank');

            }
        });

        $("#areasa").click(function () {
            let report_url = "invoicereports/setup/area.php?action=print";
            window.open(report_url, '_blank');
        });
        $("#partycode").click(function () {
            $('#InsertFormModelsa').modal('show');
            setTimeout(function (){
  $('#select2-party_id-container').focus();
  $('#party_id').focus();
$(document).on('focus', '.select2-selection.select2-selection--single', function (e) {
  $(this).closest(".select2-container").siblings('select:enabled').select2('open');
});
}, 500);

            $('.js-example-basic-single').select2();
            $.ajax({
                url: 'api/setup/company_setup_api.php',
                type: 'POST',
                data: {
                    action: 'party_code'
                },
                dataType: "json",
                success: function (response) {
                    $('#party_id').html('');
                    $('#party_id').append('<option value="" selected disabled>Select party</option>"');
                    $.each(response, function (key, value) {
                        $('#party_id').append('<option data-name="' + value["party_name"] + '"  data-code=' + value["party_code"] + ' value=' + value["party_code"] + '>' + value["party_code"] + ' - ' + value["party_name"] + '</option>');
                    });
                },
                error: function (error) {
                    alert("Contact IT Department");
                }
            });

            $("#myForm").on('change', '#party_id', function () {
                var party_name = $('#party_id').find(':selected').attr("data-name");
                var party_id = $('#party_id').find(':selected').attr("data-code");
                $('#select2-party_id-container').html(party_id);
                $('#party_name').val(party_name);
            });
        });

        $('#city_report').click(function () {
            let city_report_url = "cityreports/city_reports.php?action=print";
            window.open(city_report_url, '_blank');
        });

        $('#agent_report').click(function () {
            let city_report_url = "invoicereports/setup/agent_report.php?action=print";
            window.open(city_report_url, '_blank');
        });
        $("#partycode").click(function () {
            $('#InsertFormModelsa').modal('show');
            $('.js-example-basic-single').select2();
            $.ajax({
                url: 'api/setup/company_setup_api.php',
                type: 'POST',
                data: {
                    action: 'party_code'
                },
                dataType: "json",
                success: function (response) {
                    $('#party_id').html('');
                    $('#party_id').append('<option value="" selected disabled>Select party</option>"');
                    $.each(response, function (key, value) {
                        $('#party_id').append('<option data-name="' + value["party_name"] + '"  data-code=' + value["party_code"] + ' value=' + value["party_code"] + '>' + value["party_code"] + ' - ' + value["party_name"] + '</option>');
                    });
                },
                error: function (error) {
                    alert("Contact IT Department");
                }
            });

            $("#myForm").on('change', '#party_id', function () {
                var party_name = $('#party_id').find(':selected').attr("data-name");
                var party_id = $('#party_id').find(':selected').attr("data-code");
                $('#select2-party_id-container').html(party_id);
                $('#party_name').val(party_name);
            });
        });

        $('#party_list').click(function () {
            $('.js-example-basic-single').select2();

            $('#InsertFormModel').modal('show');
            setTimeout(function (){
  $('#select2-company_id-container').focus();
  $('#company_id').focus();
$(document).on('focus', '.select2-selection.select2-selection--single', function (e) {
  $(this).closest(".select2-container").siblings('select:enabled').select2('open');
});
}, 500);

            // For company 
            $.ajax({
                url: 'api/setup/company_setup_api.php',
                type: 'POST',
                data: {
                    action: 'company_id'
                },
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    $('#company_id').html('');
                    $('#company_id').append('<option value="" selected disabled>Select Company</option>');
                    $.each(response, function (key, value) {
                        $('#company_id').append('<option data-name="' + value["co_name"] + '"  data-code=' + value["co_code"] + ' value=' + value["co_code"] + '>' + value["co_code"] + ' - ' + value["co_name"] + '</option>');
                    });
                },
                error: function (error) {
                    console.log(error);
                    alert("Contact IT Department");
                }
            });

            // For Division 
            $.ajax({
                url: 'api/setup/company_setup_api.php',
                type: 'POST',
                data: {
                    action: 'division_id'
                },
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    $('#division_id').html('');
                    $('#division_id').append('<option value="" selected disabled>Select Division</option>');
                    $.each(response, function (key, value) {
                        $('#division_id').append('<option data-name="' + value["div_name"] + '"  data-code=' + value["div_code"] + ' value=' + value["div_code"] + '>' + value["div_code"] + ' - ' + value["div_name"] + '</option>');
                    });

                },
                error: function (error) {
                    console.log(error);
                    alert("Contact IT Department");
                }
            });


            $("#company_form").on('change', '#company_id', function () {

                var company_name = $('#company_id').find(':selected').attr("data-name");
                var company_id = $('#company_id').find(':selected').attr("data-code");
                $('#select2-company_id-container').html(company_id);
                $('#company_name').val(company_name);
            });

            $("#division_id_div").on('change', '#division_id', function () {

                var division_name = $('#division_id').find(':selected').attr("data-name");
                var division_id = $('#division_id').find(':selected').attr("data-code");
                $('#select2-division_id-container').html(division_id);
                $('#division_name').val(division_name);

            });

            $("#submit_party_list_sufi").click(function () {
                if ($("#company_form").valid()) {
                    var company_id = $('#company_id').val();
                    var division_id = $('#division_id').val();
                    let report_url = 'partyList_byDivison/partyList_byDivison.php?sid=' + company_id + '&did=' + division_id;
                    window.open(report_url, '_blank');
                }

            });


        });

        $('#item_list_button').click(function () {
            $('.js-example-basic-single').select2();

            $('#item_list_modal').modal('show');
            setTimeout(function (){
  $('#select2-company_id_list-container').focus();
  $('#company_id_list').focus();
$(document).on('focus', '.select2-selection.select2-selection--single', function (e) {
  $(this).closest(".select2-container").siblings('select:enabled').select2('open');
});
}, 500);

            // For company 
            $.ajax({
                url: 'api/setup/company_setup_api.php',
                type: 'POST',
                data: {
                    action: 'company_id'
                },
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    $('#company_id_list').html('');
                    $('#company_id_list').append('<option value="" selected disabled>Select Company</option>');
                    $.each(response, function (key, value) {
                        $('#company_id_list').append('<option data-name="' + value["co_name"] + '"  data-code=' + value["co_code"] + ' value=' + value["co_code"] + '>' + value["co_code"] + ' - ' + value["co_name"] + '</option>');
                    });
                },
                error: function (error) {
                    console.log(error);
                    alert("Contact IT Department");
                }
            });

            // For Division 
            $.ajax({
                url: 'api/setup/company_setup_api.php',
                type: 'POST',
                data: {
                    action: 'division_id'
                },
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    $('#division_id_list').html('');
                    $('#division_id_list').append('<option value="" selected disabled>Select Division</option>');
                    $.each(response, function (key, value) {
                        $('#division_id_list').append('<option data-name="' + value["div_name"] + '"  data-code=' + value["div_code"] + ' value=' + value["div_code"] + '>' + value["div_code"] + ' - ' + value["div_name"] + '</option>');
                    });

                },
                error: function (error) {
                    console.log(error);
                    alert("Contact IT Department");
                }
            });


            $("#company_form_list").on('change', '#company_id_list', function () {

                var company_name = $('#company_id_list').find(':selected').attr("data-name");
                var company_id = $('#company_id_list').find(':selected').attr("data-code");
                $('#select2-company_id_list-container').html(company_id);
                $('#company_name_list').val(company_name);
            });

            $("#division_id_div_list").on('change', '#division_id_list', function () {

                var division_name_list = $('#division_id_list').find(':selected').attr("data-name");
                var division_id_list = $('#division_id_list').find(':selected').attr("data-code");
                $('#select2-division_id_list-container').html(division_id_list);
                $('#division_name_list').val(division_name_list);

            });

            $("#submit_list").click(function () {
                if ($("#company_form_list").valid()) {
                    var company_id = $('#company_id_list').val();
                    var division_id = $('#division_id_list').val();
                    let report_url_list = 'invoicereports/setup/itemList_byDivision.php?sid=' + company_id + '&did=' + division_id;
                    window.open(report_url_list, '_blank');
                }

            });


        });





        $('#city').click(function () {
            $(this).css('pointer-events', 'none');
            $(this).find($(".fa")).removeClass('fa-list-alt').addClass('fa-spin fa-refresh');
            $.get('setup_files/city_setup.php', function (data, status) {
                $('#content').html(data);
            });
        });

        $('#chart_account').click(function () {
            $(this).css('pointer-events', 'none');
            $(this).find($(".fa")).removeClass('fa-dolly').addClass('fa-spin fa-refresh');
            $.get('setup_files/chart_of_account/chart_of_account.php', function (data, status) {
                $('#content').html(data);
            });
        });

        $('#Division').click(function () {
            $(this).css('pointer-events', 'none');
            $(this).find($(".fa")).removeClass('fa-dolly').addClass('fa-spin fa-refresh');
            $.get('setup_files/division_setup.php', function (data, status) {
                $('#content').html(data);
            });
        });

        $('#zone').click(function () {
            $(this).css('pointer-events', 'none');
            $(this).find($(".fa")).removeClass('fa-dolly').addClass('fa-spin fa-refresh');
            $.get('setup_files/zone_setup.php', function (data, status) {
                $('#content').html(data);
            });
        });

        $('#salesMan').click(function () {
            $(this).css('pointer-events', 'none');
            $(this).find($(".fa")).removeClass('fa-users').addClass('fa-spin fa-refresh');
            $.get('setup_files/salesman_setup.php', function (data, status) {
                $('#content').html(data);
            });
        });
        $('#party').click(function () {
            $(this).css('pointer-events', 'none');
            $(this).find($(".fa")).removeClass('fa-users').addClass('fa-spin fa-refresh');
            $.get('setup_files/party_setup.php', function (data, status) {
                $('#content').html(data);
            });
        });

        $('#supplier').click(function () {
            $(this).css('pointer-events', 'none');
            $(this).find($(".fa")).removeClass('fa-users').addClass('fa-spin fa-refresh');
            $.get('setup_files/supplier_setup.php', function (data, status) {
                $('#content').html(data);
            });

        });
        $('#item').click(function () {
            $(this).css('pointer-events', 'none');
            $(this).find($(".fa")).removeClass('fa-shopping-cart').addClass('fa-spin fa-refresh');
            $.get('setup_files/item_list.php', function (data, status) {
                $('#content').html(data);
            });
        });

        $('#area').click(function () {
            $(this).css('pointer-events', 'none');
            $(this).find($(".fa")).removeClass('fa-users').addClass('fa-spin fa-refresh');
            $.get('setup_files/area_setup.php', function (data, status) {
                $('#content').html(data);
            });
        });

        $('#unit').click(function () {
            $(this).css('pointer-events', 'none');
            $(this).find($(".fa")).removeClass('fa-users').addClass('fa-spin fa-refresh');
            $.get('setup_files/unit_setup.php', function (data, status) {
                $('#content').html(data);
            });
        });

        $('#vehicle').click(function () {
            $(this).css('pointer-events', 'none');
            $(this).find($(".fa")).removeClass('fa-users').addClass('fa-spin fa-refresh');
            $.get('setup_files/vehicle_setup.php', function (data, status) {
                $('#content').html(data);
            });
        });

        $('#gen').click(function () {
            $(this).css('pointer-events', 'none');
            $(this).find($(".fa")).removeClass('fa-users').addClass('fa-spin fa-refresh');
            $.get('setup_files/generic_setup.php', function (data, status) {
                $('#content').html(data);
            });
        });

        $('#product').click(function () {
            $(this).css('pointer-events', 'none');
            $(this).find($(".fa")).removeClass('fa-users').addClass('fa-spin fa-refresh');
            $.get('setup_files/product_setup.php', function (data, status) {
                $('#content').html(data);
            });
        });

        $('#department').click(function () {
            $(this).css('pointer-events', 'none');
            $(this).find($(".fa")).removeClass('fa-users').addClass('fa-spin fa-refresh');
            $.get('setup_files/department_setup.php', function (data, status) {
                $('#content').html(data);
            });
        });

        $('#location').click(function () {
            $(this).css('pointer-events', 'none');
            $(this).find($(".fa")).removeClass('fa-users').addClass('fa-spin fa-refresh');
            $.get('setup_files/location_setup.php', function (data, status) {
                $('#content').html(data);
            });
        });


        $('#item_location').click(function () {
            $(this).css('pointer-events', 'none');
            $(this).find($(".fa")).removeClass('fa-users').addClass('fa-spin fa-refresh');
            $.get('setup_files/item_location_setup.php', function (data, status) {
                $('#content').html(data);
            });
        });
        $('#item_batch').click(function () {
            $(this).css('pointer-events', 'none');
            $(this).find($(".fa")).removeClass('fa-users').addClass('fa-spin fa-refresh');
            $.get('setup_files/item_batchno.php', function (data, status) {
                $('#content').html(data);
            });
        });
        $('#chart_of_accounts').click(function(){
            $(this).css('pointer-events','none');
            $(this).find($(".fa")).removeClass('fa-users').addClass('fa-spin fa-refresh');
            $.get('setup_files/chart_of_acc.php',function(data,status){
                $('#content').html(data);
            });
        });
        $('#total').click(function(){
            $(this).css('pointer-events','none');
            $(this).find($(".fa")).removeClass('fa-users').addClass('fa-spin fa-refresh');
            $.get('inventory_management/inventory_local/total.php',function(data,status){
                $('#content').html(data);
            });
        });
        $('#type_dt').click(function(){
            $(this).css('pointer-events','none');
            $(this).find($(".fa")).removeClass('fa-users').addClass('fa-spin fa-refresh');
            $.get('inventory_management/inventory_local/type_dt.php',function(data,status){
                $('#content').html(data);
            });
        });
        $('#dt').click(function(){
            $(this).css('pointer-events','none');
            $(this).find($(".fa")).removeClass('fa-users').addClass('fa-spin fa-refresh');
            $.get('inventory_management/inventory_local/date.php',function(data,status){
                $('#content').html(data);
            });
        });
        // $('#type_dt').click(function(){
        //     $(this).css('pointer-events','none');
        //     $(this).find($(".fa")).removeClass('fa-users').addClass('fa-spin fa-refresh');
        //     $.get('inventory_management/inventory_local/total.php',function(data,status){
        //         $('#content').html(data);
        //     });
        // });
        // $('#post').click(function () {
        //     $(this).css('pointer-events', 'none');
        //     $(this).find($(".fa")).removeClass('fa-dolly').addClass('fa-spin fa-refresh');
        //     $.get('sales_module/post.php', function (data, status) {
        //         $('#content').html(data);
        //     });
        // });
        // $('#unpost').click(function () {
        //     $(this).css('pointer-events', 'none');
        //     $(this).find($(".fa")).removeClass('fa-dolly').addClass('fa-spin fa-refresh');
        //     $.get('sales_module/post.php', function (data, status) {
        //         $('#content').html(data);
        //     });
        // });


        // breadcrumbs
        $('#dashboard_breadcrumb').click(function(){
            $.get('dashboard_main/dashboard_main.php',function(data,status){
                $('#content').html(data);
            });
        });
        $("#vouchers_breadcrumb").on("click", function () {
            $.get('inventory_management/inventory_local/process.php', function(data,status){
                $("#content").html(data);
            });
        });
        $("#posting").on("click", function () {
            $.get('inventory_management/inventory_local/post.php', function(data,status){
                $("#content").html(data);
            });
        });
    });
</script>