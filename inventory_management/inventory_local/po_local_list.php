<?php
session_start();
?>
<style>
  table .dataTable{
    width:100% !important
  }
</style>
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Purchase Order List - Local</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="inv_l_main_breadcrumb">Inventory Local</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="po_locl_list_breadcrumb">Purchase Order List</button></li>
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
                  <table id="example1" class="table table-bordered table-striped table-responsive">
                    <thead>
                    <tr>
                      <th>SNO</th>
                      <th>Doc No</th>
                      <th>Doc Date</th>
                      <th>Doc Year</th>
                      <th>Company Code</th>
                      <th>Division Code</th>
                      <th>Party Code</th>
                      <th>Salesman Code</th>
                      <th>PO Catg</th>
                      <th>Sale Code</th>
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
        url: 'api/sales_module/transaction_files/sales_order_api.php',
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
          var narration=data[i].remarks==''? '-':data[i].remarks;
        //   console.log(narration);
            btn_edit = '<button class="btn btn-sm btn-select 702a1b_2" div_code="'+data[i].div_code+'" party_code="'+data[i].party_code+'" salesman="'+data[i].sman_code+'"  po_catg="'+data[i].po_catg+'"  doc_date="'+data[i].doc_date+'" narration="'+data[i].naration+'" co_code="'+data[i].co_code+'" doc_year="'+data[i].doc_year+'" doc_type="'+data[i].doc_type+'" doc_no="'+data[i].doc_no+'" ><i class="far fa-edit text-info fa-fw"></i></button>';
          // btn_dlt = '<button class="btn btn-sm btn-delete" data-id="'+data[i].ID+'"><i class="far fa-trash-alt text-danger fa-fw"></i></button>';
          btn = btn_edit; 
          table.row.add([sno,data[i].doc_no,data[i].doc_date,data[i].doc_year,data[i].co_code,data[i].div_code,data[i].party_code,data[i].sman_code,data[i].po_catg,data[i].order_key,narration,btn]);
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
    $.get('inventory_management/inventory_local/add_po_local.php', function(data,status){
        $("#content").html(data);
    });
});
//edit
$("#example1").on('click','.btn-select',function(){
    var doc_no = $(this).attr("doc_no");
    var doc_year = $(this).attr("doc_year");
    var co_code = $(this).attr("co_code");
    var div_code = $(this).attr("div_code");
    var party_code = $(this).attr("party_code");
    var salesman_code = $(this).attr("salesman");
    var po_catg = $(this).attr("po_catg");  
    // console.log(voucher_type);
    $.get('sales_module/transaction_files/sales_order_edit.php?co_code='+co_code+'&doc_no='+doc_no+'&po_catg='+po_catg+'&doc_year='+doc_year+'&party_code='+party_code+'&div_code='+div_code+'&salesman_code='+salesman_code, function(data,status){
        $("#content").html(data);
    });
});
  

// breadcrumbs
$('#dashboard_breadcrumb').click(function(){
    $.get('dashboard_main/dashboard_main.php',function(data,status){
        $('#content').html(data);
    });
});
$("#inv_l_main_breadcrumb").on("click", function () {
    $.get('inventory_management/inventory_local/inventory_local.php', function(data,status){
        $("#content").html(data);
    });
});
$("#po_locl_list_breadcrumb").on("click", function () {
    $.get('inventory_management/inventory_local/po_local_list.php', function(data,status){
        $("#content").html(data);
    });
});

</script>
<?php include '../../includes/loader.php'?>