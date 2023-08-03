<?php
session_start();
?>
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Item Batchno List</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="setup_breadcrumb">Setup</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="ibn_list_breadcrumb">Item Batchno List</button></li>
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
              <div class="card">
                <div class="card-header">
                    <?php include '../display_message/display_message.php'?>
                  <div class="row">
                    <div class="col-sm-10">
                      <!-- <h3 class="card-title">Language Records</h3> -->
                    </div>
                    <div class="col-sm-2 text-right">
                            <button type="button" class="btn btn-info btn-sm mt-2 702a1b_1" id="add_button"><i class="fa fa-plus"></i></button>
                    </div>
                  </div> 
                  
                </div>
                <!-- /.card-header -->
                <div id="record-content"></div>
                <div class="card-body" >
                  <table id="example1" class=" table table-bordered table-striped table-responsive-lg ">
                    <thead>
                    <tr>
                      <th>SNO</th>
                      <th>Company Code</th>
                      <th>Item Code</th>
                      <th>Loc Code</th>
                      <th>Batch No</th>
                      <th>Expiry Date</th>
                      <th>Bal Stock</th>
                      <th>Actions</th>               
                    </tr>
                    </thead>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
<!-- ./wrapper -->

<?php

include '../includes/security.php';
?>

<script>



$(document).ready(function(){
    // $("#ajax-loader").show();
    let table = $('#example1').DataTable({
        dom: 'Bfrtip',
        orderCellsTop: true,
        fixedHeader: true,
        
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print',
        ]
    });
    // Setup - add a text input to each footer cell
    $('#example1 thead tr').clone(true).appendTo( '#example1 thead' );
    $('#example1 thead tr:eq(1) th').each( function (i) {
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
    
    $.ajax({
        url: 'api/setup/item_batchno_api.php',
        type:'POST',
        data: {action:'view'},
        success: function(data) {
          $("#ajax-loader").hide();
        // console.log(data);
        // Empty datatable previouse records
        table.clear().draw();
        // append data in datatable
        var sno='0';
        for (var i = 0; i < data.length; i++) {
            sno++;
            console.log(data);
            var bal_stock = data[i].BAL_STOCK
            var finalformat = new Intl.NumberFormat(
              'en-US', {
              style: 'currency',
              currency: 'USD',
              currencyDisplay: 'narrowSymbol'
              }).format(bal_stock);

          var bal_stock1 = finalformat.replace(/[$]/g, '');
            // var debits=data[i].open_debit;
            // var debit=new Intl.NumberFormat(
            // 'en-US', { style: 'currency', 
            //   currency: 'USD',
            // currencyDisplay: 'narrowSymbol'}).format(debits);
            // var debit=debit.replace(/[$]/g,'');
            // var credits=data[i].open_credit;
            // var credit=new Intl.NumberFormat(
            // 'en-US', { style: 'currency', 
            //   currency: 'USD',
            // currencyDisplay: 'narrowSymbol'}).format(credits);
            // var credit=credit.replace(/[$]/g,'');
            btn_edit = '<button class="btn btn-sm btn-select 702a1b_2" data-co_code="'+data[i].CO_CODE+'" data-item_code="'+data[i].ITEM_CODE+'" data-loc_code="'+data[i].LOC_CODE+'" data-batch_no="'+data[i].BATCH_NO+'" data-expiry="'+data[i].EXPIRY_DATE+'"   ><i class="far fa-edit text-info fa-fw"></i></button>';
            // btn_dlt = '<button class="btn btn-sm btn-delete" data-id="'+data[i].ID+'"><i class="far fa-trash-alt text-danger fa-fw"></i></button>';
            btn = btn_edit; 
            table.row.add([sno,data[i].CO_CODE,data[i].ITEM_CODE,data[i].LOC_CODE,data[i].BATCH_NO,
            data[i].EXPIRY_DATE,bal_stock1,btn]);
        }
        table.draw();
        },
        error: function(e){
            console.log(e);
            alert("Contact IT Department");
        }
    
    });
    
});

//function for insert open model
//add
$('#add_button').click(function(){
    $.get('setup_files/add_item_batchno.php', function(data,status){
        $("#content").html(data);
    });
});
//edit
$("#example1").on('click','.btn-select',function(){
    var company_code = $(this).attr("data-co_code");
    var item_code = $(this).attr("data-item_code");
    var loc_code = $(this).attr("data-loc_code");
    var batch_no = $(this).attr("data-batch_no");
    var expiry_date = $(this).attr("data-expiry");
    $.get('setup_files/edit_item_batchno.php?company_code='+company_code+'&item_code='+item_code+'&loc_code='+loc_code+'&batch_no='+batch_no+'&expiry_date='+expiry_date, function(data,status){
        $("#content").html(data);
    });
    
});
  

// breadcrumbs
$('#dashboard_breadcrumb').click(function(){
    $.get('dashboard_main/dashboard_main.php',function(data,status){
        $('#content').html(data);
    });
});
$("#setup_breadcrumb").on("click", function () {
    $.get('setup_files/setup_file.php', function(data,status){
        $("#content").html(data);
    });
});
$("#ibn_list_breadcrumb").on("click", function () {
    $.get('setup_files/item_batchno.php', function(data,status){
        $("#content").html(data);
    });
});

</script>
<?php include '../includes/loader.php'?>