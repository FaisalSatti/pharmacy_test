<?php
session_start();
?>
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Credit Note List</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="transaction_files_main_breadcrumb">Transaction List</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="cv_breadcrumb">Credit Note List</button></li>
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
                    <?php include '../../display_message/display_message.php'?>
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
                      <th>Voucher Date</th>
                      <th>Voucher Year</th>
                      <th>Company Code</th>
                      <th>Voucher No</th>
                      <th>Voucher Type</th>
                      <th>Remarks</th>
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

include '../../includes/security.php';
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
        url: 'api/sales_module/transaction_files/credit_note_api.php',
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
          var narration=data[i].naration==''? '-':data[i].naration;
          console.log(narration);
            btn_edit = '<button class="btn btn-sm btn-select 702a1b_2"  voucher_date="'+data[i].voucher_date+'" narration="'+data[i].naration+'" co_code="'+data[i].co_code+'" voucher_year="'+data[i].doc_year+'" voucher_type="'+data[i].voucher_type+'" voucher_no="'+data[i].voucher_no+'" ><i class="far fa-edit text-info fa-fw"></i></button>';
          // btn_dlt = '<button class="btn btn-sm btn-delete" data-id="'+data[i].ID+'"><i class="far fa-trash-alt text-danger fa-fw"></i></button>';
          btn = btn_edit; 
          table.row.add([sno,data[i].voucher_date,data[i].doc_year,data[i].co_code,data[i].voucher_no,data[i].voucher_type,narration,btn]);
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
    $.get('sales_module/transaction_files/add_credit_note.php', function(data,status){
        $("#content").html(data);
    });
});
//edit
$("#example1").on('click','.btn-select',function(){
    var voucher_no = $(this).attr("voucher_no");
    var voucher_type = $(this).attr("voucher_type");
    var voucher_year = $(this).attr("voucher_year");
    var co_code = $(this).attr("co_code");
    voucher='';
    // console.log(voucher_type);
    $.get('sales_module/transaction_files/credit_note_edit.php?co_code='+co_code+'&voucher_no='+voucher_no+'&voucher_type='+voucher_type+'&voucher_year='+voucher_year, function(data,status){
        $("#content").html(data);
    });
    
});


// breadcrumbs
$('#dashboard_breadcrumb').click(function(){
    $.get('dashboard_main/dashboard_main.php',function(data,status){
        $('#content').html(data);
    });
});
$("#transaction_files_main_breadcrumb").on("click", function () {
    $.get('sales_module/transaction_files/transaction_files.php', function(data,status){
        $("#content").html(data);
    });
});
$("#cv_breadcrumb").on("click", function () {
    $.get('sales_module/transaction_files/credit_note_list.php', function(data,status){
        $("#content").html(data);
    });
});

</script>
<?php include '../../includes/loader.php'?>