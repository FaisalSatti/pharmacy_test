<?php
session_start();
?>
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Customer Setup</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="setup_breadcrumb">Setup</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="party_setup_breadcrumb">Customer Setup</button></li>
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
                      <th>Division Code</th>
                      <th>Party Code</th>
                      <th>Party Name</th>
                      <th>Zone</th>
                      <th>City</th>
                      <th>Salesman</th>
                      <th>Open Debit</th>
                      <th>Open Credit</th>
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
    $("#ajax-loader").show();
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
        url: 'api/setup/party_api.php',
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
            
            var debits=data[i].open_debit;
            var debit=new Intl.NumberFormat(
            'en-US', { style: 'currency', 
              currency: 'USD',
            currencyDisplay: 'narrowSymbol'}).format(debits);
            var debit=debit.replace(/[$]/g,'');
            var credits=data[i].open_credit;
            var credit=new Intl.NumberFormat(
            'en-US', { style: 'currency', 
              currency: 'USD',
            currencyDisplay: 'narrowSymbol'}).format(credits);
            var credit=credit.replace(/[$]/g,'');
            btn_edit = '<button class="btn btn-sm btn-select 702a1b_2" data-id="'+data[i].party_code+'" data-company="'+data[i].co_code+'" data-division="'+data[i].div_code+'" data-control="'+data[i].party_control+'" ><i class="far fa-edit text-info fa-fw"></i></button>';
            // btn_dlt = '<button class="btn btn-sm btn-delete" data-id="'+data[i].ID+'"><i class="far fa-trash-alt text-danger fa-fw"></i></button>';
            btn = btn_edit; 
            table.row.add([sno,data[i].co_code,data[i].div_code,data[i].party_code,data[i].party_name,
            data[i].zone_code,data[i].city_code,data[i].salesman_code,debit,credit,btn]);
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
    $.get('setup_files/add_party.php', function(data,status){
        $("#content").html(data);
    });
});
//edit
$("#example1").on('click','.btn-select',function(){
    var company_code = $(this).attr("data-company");
    var party_code = $(this).attr("data-id");
    var division_code = $(this).attr("data-division");
    var control_code = $(this).attr("data-control");
    $.get('setup_files/edit_party.php?company_code='+company_code+'&party_code='+party_code+'&division_code='+division_code+'&control_code='+control_code, function(data,status){
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
$("#party_setup_breadcrumb").on("click", function () {
    $.get('setup_files/party_setup.php', function(data,status){
        $("#content").html(data);
    });
});

</script>
<?php include '../includes/loader.php'?>