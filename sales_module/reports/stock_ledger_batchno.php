<?php
session_start();
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 >Stock Ledger Batch No</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                        <li class="breadcrumb-item active"><button class="btn btn-sm" id="report_breadcrumb"> Reports</button></li>
                        <li class="breadcrumb-item"><button class="btn btn-sm" id="stock_ledger_batchno_breadcrumb"> Stock Ledger Batch No</button></li>
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
                                <form method = "post" id = "ledger_form">
                                    <?php include '../../display_message/display_message.php'?>
                                    <div class="row"  style="margin-top:-14px;border-radius:4px;border  :2px solid #1e293b; padding-top:8px;box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
                                        <div class="col-lg-2 col-md-2 form-group">
                                            <label for="">Company:<span style="color:red">*</span></label>
                                        </div>
                                        <div class="col-lg-4 col-md-4 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                                </div>
                                                <input class="form-control form-control-sm" id="company_code" name="company_code" style="background-color:#b7edea;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;border:1px solid #61bdb6;border-radius:4px;" placeholder="Select Company" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input tabindex="-1" style="background-color:#ccd4e1;font-weight:bold;" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="company_name" id="company_name" class="form-control form-control-sm" placeholder="Company Name" readonly >
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-12 form-group">
                                            <label for="">Item :<span style="color:red">*</span></label>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                                </div>
                                                <input tabindex="-1" class="form-control form-control-sm" id="item_code" name="item_code" style="background-color: #ccd4e1;font-weight:bold;" placeholder="Item Code" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input tabindex="-1" style="background-color:#ccd4e1;font-weight:bold;" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="item_name" id="item_name" class="form-control form-control-sm" placeholder="Item Name" readonly >
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-md-2 col-sm-12 form-group">
                                            <label for="">Location :<span style="color:red">*</span></label>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                                </div>
                                                <input tabindex="-1" class="form-control form-control-sm" id="location_code" name="location_code" style="background-color: #ccd4e1;font-weight:bold;" placeholder="Loc Code" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input tabindex="-1" style="background-color:#ccd4e1;font-weight:bold;" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="location_name" id="location_name" class="form-control form-control-sm" placeholder="Location Name" readonly >
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-12 form-group">
                                            <label for="">Batch No :<span style="color:red">*</span></label>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                                </div>
                                                <input tabindex="-1" class="form-control form-control-sm" id="batch_no" name="batch_no" style="background-color: #ccd4e1;font-weight:bold;" placeholder="Batch No" readonly>
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-md-2 form-group">
                                            <label for="">Expiry Date :</label><span style="color:red;">*</span>
                                        </div>
                                        <div class="col-lg-4 col-md-4 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input tabindex="-1" type="date" name="exp_date" id="exp_date" class="form-control form-control-sm" style="background-color: #ccd4e1;font-weight:bold;" readonly>
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-md-2 form-group">
                                            <label for="">From Date :</label><span style="color:red;">*</span>
                                        </div>
                                        <div class="col-lg-4 col-md-4 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input type="date" name="from_date" id="from_date" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 form-group">
                                            <label for="">To Date :</label><span style="color:red;">*</span>
                                        </div>
                                        <div class="col-lg-4 col-md-4 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                            </div>
                                            <input type="date" name="to_date" id="to_date" class="form-control form-control-sm">
                                        </div>
                                        </div>
                                        <button type="button" id="ledger" class="btn btn-primary w-100">Run Report</button>
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
<!-- company  form -->
<div class="modal" id="CompanyFormModel" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Company</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table w-100 table-responsive-lg table-responsive-md table-responsive-sm" id="company_table">
                    <thead>
                        <tr>
                            <th>Sno</th>
                            <th>Company Code</th>
                            <th style="display:none;">Company Name</th>
                            <th>Item Code</th>
                            <th style="display:none;">Item Name</th>
                            <th>Location Code</th>
                            <th style="display:none;">Location Name</th>
                            <th>Batch No</th>
                            <th>Expiry Date</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- ./wrapper -->
<style>
    body{
    form:90%;
    }
    #company_table tr td:nth-child(3),td:nth-child(5),td:nth-child(7){
    display: none;
    }
    select{
    width:82% !important;
    }
    .input-group-prepend{
    /* border-right:2px solid black !important */
    }
    input:focus,select:focus,textarea:focus,.select2-selection:focus{
    -moz-box-shadow: 0 0 8px rgba(82,168,236,.6);
    box-shadow: 0 0 8px orangered !important;
    }
    .form-control:focus{
    -moz-box-shadow: 0 0 8px rgba(82,168,236,.6);
    box-shadow: 0 0 8px orangered !important;
    }
    .select2-selection{
    background-color: #ccd4e1 !important  
    }
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none !important;
    margin: 0!important;
    }
    /* Firefox */
    input[type=number] {
    -moz-appearance: textfield !important;
    }
    .select2-container{
    width:80% !important;
    /* border: 1px solid #d9dbde */
    }
    @media only screen and (min-width: 250px) and (max-width: 350px) {
    .select2-container{
    width:78% !important;
    }
    }
    @media only screen and (min-width: 350px) and (max-width: 754px) {
    .select2-container{
    width:85% !important;
    }
    }
    @media screen and (min-width: 766px) and (max-width:994px) {
    .select2-container{
    width:72% !important;
    } 
    }
    .select2-container *:focus {
    outline: none !important;
    border: 2px solid black !important
    }
    .select2-selection--single{
    background:#b7edea !important;
    }
    .hover-item,.even,.odd {
    background-color: #FFF;
    cursor:pointer;
    }
    .hover-item,.odd:hover {
    background-color: gray;
    color:white
    }
    .even:hover{
    background-color: gray;
    color:white
    }
</style>
<?php

include '../../includes/security.php';
?>

<script>
$(document).ready(function(){
    $('#online_ledger').css('pointer-events','');
    $('#online_ledger').find($(".far")).removeClass('fa-spin fa-refresh').addClass('fa-circle');
    $('.js-example-basic-single').select2();
    $('#company_code').focus();
        // setTimeout(function (){
        //     $('#CompanyFormModel').modal('show');
        // }, 1000);
});

//validation
$(function () {
    $.validator.setDefaults({
        submitHandler: function () {
            // alert( "Form successful submitted!" );
        }
    });
    $('#ledger_form').validate({
        rules: {
            company_code: {
            required: true,
            },
            From_code: {
            required: true,
            },
            To_code: {
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
    
$(document).ready(function(){
    $('#company_code').click(function(){
        console.log("AAA");
        $('#company_table').dataTable().fnDestroy();
        table = $('#company_table').DataTable({
            dom: 'Bfrtip',
            orderCellsTop: true,
            fixedHeader: true,
            
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print',
            ]
        });
        // Setup - add a text input to each footer cell
        // $('#company_table thead tr').clone(true).appendTo( '#company_table thead' );
        $('#company_table thead tr:eq(1) th').each( function (i) {
            var title = $(this).text();
            $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );
            $( 'input', this ).on( 'keyup change', function () {
                if ( table.column(i).search() !== this.value ) {
                    table
                        .column(i)
                        .search( this.value )
                        .draw();
                }
            });
        });
        
        // company code dropdown
        $.ajax({
            url: 'api/financial_management/MIS/online_ledger_api.php',
                type: 'POST',   
                data: {action:  'batch_no'},
                dataType: "json",
                async: false,
                success: function(response){
                    // console.log(response);
                    table.clear().draw();
                    // append data in datatable
                    var sno='0';
                    for (var i = 0; i < response.length; i++) {
                        sno++;
                        table.row.add([sno,response[i].co_code,response[i].co_name,response[i].item_code,response[i].item_descr,response[i].loc_code,response[i].loc_name,response[i].batch_no,response[i].expiry_date]);
                    }
                    table.draw();
                },
                error: function(error){
                    console.log(error);
                    alert("Contact IT Department");
                }
        });  
        $('#CompanyFormModel').modal('show');
        $('.modal-backdrop').remove();
        // $('#CompanyFormModel').show(function() {
        //     $(this).closest('tr').focus();
        // });


    });

    $('#company_table').on('click','.even',function(){
        var company_code=$(this).closest('tr').children('td:nth-child(2)').text();
        var company_name=$(this).closest('tr').children('td:nth-child(3)').text();
        var item_code=$(this).closest('tr').children('td:nth-child(4)').text();
        var item_name=$(this).closest('tr').children('td:nth-child(5)').text();
        var loc_code=$(this).closest('tr').children('td:nth-child(6)').text();
        var loc_name=$(this).closest('tr').children('td:nth-child(7)').text();
        var batch_no=$(this).closest('tr').children('td:nth-child(8)').text();
        var expiry_date=$(this).closest('tr').children('td:nth-child(9)').text();
        // console.log(company_code);
        $('#company_code').val(company_code);
        $('#company_name').val(company_name);
        $('#item_code').val(item_code);
        $('#item_name').val(item_name);
        $('#location_code').val(loc_code);
        $('#location_name').val(loc_name);
        $('#batch_no').val(batch_no);
        $('#exp_date').val(expiry_date);
       
        $('#CompanyFormModel').modal('hide');
        // $('#CompanyFormModel').modal('show');
    });
        
    $('#company_table').on('click','.odd',function(){
        var company_code=$(this).closest('tr').children('td:nth-child(2)').text();
        var company_name=$(this).closest('tr').children('td:nth-child(3)').text();
        var item_code=$(this).closest('tr').children('td:nth-child(4)').text();
        var item_name=$(this).closest('tr').children('td:nth-child(5)').text();
        var loc_code=$(this).closest('tr').children('td:nth-child(6)').text();
        var loc_name=$(this).closest('tr').children('td:nth-child(7)').text();
        var batch_no=$(this).closest('tr').children('td:nth-child(8)').text();
        var expiry_date=$(this).closest('tr').children('td:nth-child(9)').text();
        // console.log(company_code);
        $('#company_code').val(company_code);
        $('#company_name').val(company_name);
        $('#item_code').val(item_code);
        $('#item_name').val(item_name);
        $('#location_code').val(loc_code);
        $('#location_name').val(loc_name);
        $('#batch_no').val(batch_no);
        $('#exp_date').val(expiry_date);
       
        $('#CompanyFormModel').modal('hide');
    });
});
      
$("#ledger").on("click", function (e) {
    if ($("#ledger_form").valid()) {
        var company_code=$('#company_code').val();
        var item_code=$('#item_code').val();
        var location_code=$('#location_code').val();
        var location_name=$('#location_name').val();
        var batch_no=$('#batch_no').val();
        var exp_date=$('#exp_date').val();
        var from_date=$('#from_date').val();
        var to_date=$('#to_date').val();
        let invoice_url = "invoicereports/sales_mis_reports/stock_ledger_batchwise_report.php?company_code="+company_code+"&item_code="+item_code+"&location_code="+location_code+"&location_name="+location_name+"&batch_no="+batch_no+"&exp_date="+exp_date+"&from_date="+from_date+"&to_date="+to_date;
        window.open(invoice_url, '_blank');
    }
});




// breadcrumbs
$('#dashboard_breadcrumb').click(function(){
    $.get('dashboard_main/dashboard_main.php',function(data,status){
        $('#content').html(data);
    });
});
$("#report_breadcrumb").on("click", function () {
    $.get('sales_module/reports/reports.php', function(data,status){
        $("#content").html(data);
    });
});
$("#stock_ledger_batchno_breadcrumb").on("click", function () {
    $.get('sales_module/reports/stock_ledger_batchno.php', function(data,status){
        $("#content").html(data);
    });
});
</script>
<?php include '../../includes/loader.php'?>