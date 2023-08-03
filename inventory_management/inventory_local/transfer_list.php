<?php
session_start();
?>
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>TRANSFER</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                        <li class="breadcrumb-item active"><button class="btn btn-sm" id="il_breadcrumb"> Inventory Local</button></li>
                        <li class="breadcrumb-item"><button class="btn btn-sm" id="po_list_breadcrumb"> Transfer List</button></li>
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
                      <th>DOC NO</th>
                      <th>COMPANY CODE</th>
                      <th>DOC TYPE</th>
                      <th>DOC DATE</th>
                      <th>DOC YEAR</th>
                      <th>PO CATEGORY</th>
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
            url: 'api/setup/tr_api.php',
              type:'POST',
              data: {action:'view'},
              success: function(data) {
                var sno='0';
                for (var i = 0; i < data.length; i++) {
                        sno++;
                       
                        btn_edit = '<button class="btn btn-sm btn-select 702a1b_2" data-CO_CODE="'+data[i].CO_CODE+'" data-DOC_TYPE="'+data[i].DOC_TYPE+'" data-DOC_DATE="'+data[i].DOC_DATE+'"data-DOC_YEAR="'+data[i].DOC_YEAR+'" data-PO_CATG="'+data[i].PO_CATG+'" data-DOC_NO="'+data[i].DOC_NO+'"><i class="far fa-edit text-info fa-fw"></i></button>';
                        // btn_dlt = '<button class="btn btn-sm btn-delete" data-id="'+data[i].ID+'"><i class="far fa-trash-alt text-danger fa-fw"></i></button>';
                        btn = btn_edit; 
                        table.row.add([sno,data[i].DOC_NO,data[i].CO_CODE,data[i].DOC_TYPE,data[i].DOC_DATE,data[i].DOC_YEAR,data[i].PO_CATG,btn]);
                    }
                table.draw();
              },
              error: function(e){
                  console.log(e);
                  alert("Contact IT Department");
              }
          });
});
$("#example1").on('click','.btn-select',function(){
    var DOC_NO = $(this).attr("data-DOC_NO");
    var CO_CODE = $(this).attr("data-CO_CODE");
    var DOC_TYPE = $(this).attr("data-DOC_TYPE");
    var DOC_DATE = $(this).attr("data-DOC_DATE");
    var DOC_YEAR = $(this).attr("data-DOC_YEAR");
    var PO_CATG = $(this).attr("data-PO_CATG");
    
//    console.log(DOC_NO);
    $.get('inventory_management/inventory_local/transfer_edit.php/?DOC_NO='+DOC_NO+'&CO_CODE='+CO_CODE+'&DOC_TYPE='+DOC_TYPE+'&DOC_DATE='+DOC_DATE+'&DOC_YEAR='+DOC_YEAR+'&PO_CATG='+PO_CATG, function(data,status){
        $("#content").html(data);
    });
    
});
$('#add_button').click(function(){
    $.get('inventory_management/inventory_local/transfer.php', function(data,status){
        $("#content").html(data);
    });
});
$('#dashboard_breadcrumb').click(function(){
    $.get('dashboard_main/dashboard_main.php',function(data,status){
        $('#content').html(data);
    });
});
$("#il_breadcrumb").on("click", function () {
    $.get('inventory_management/inventory_local/inventory_local.php', function(data,status){
        $("#content").html(data);
    });
});
$("#po_list_breadcrumb").on("click", function () {
    $.get('inventory_management/inventory_local/transfer_list.php', function(data,status){
        $("#content").html(data);
    });
});

//function for insert open model
//add


</script>