<?php
session_start();
?>
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Supplier Setup</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="setup_breadcrumb">Setup</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="party_setup_breadcrumb">Supplier Setup</button></li>
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
                      <th>Party Code</th>
                      <th>Party Name</th>
                      <th>Account Code</th>
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
        url: 'api/setup/supplier_api.php',
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
            btn_edit = '<button class="btn btn-sm btn-select 702a1b_2" data-id="'+data[i].PARTY_CODE+'" data-company="'+data[i].CO_CODE+'"><i class="far fa-edit text-info fa-fw"></i></button>';
            // btn_dlt = '<button class="btn btn-sm btn-delete" data-id="'+data[i].ID+'"><i class="far fa-trash-alt text-danger fa-fw"></i></button>';
            btn = btn_edit; 
            table.row.add([sno,data[i].CO_CODE,data[i].PARTY_CODE,data[i].PARTY_NAME,data[i].GL_CODE,btn]);
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
    $.get('setup_files/add_supplier.php', function(data,status){
        $("#content").html(data);
    });
});
//edit
$("#example1").on('click','.btn-select',function(){
    var company_code = $(this).attr("data-company");
    var party_code = $(this).attr("data-id");
    $.get('setup_files/edit_supplier.php?company_code='+company_code+'&party_code='+party_code, function(data,status){
        $("#content").html(data);
    });
    
      //update
      $("#EditForm").on('click','#update_data',function(){
        if ($("#EditForm").valid())
        { 
          var company_name = $('#company_name').val();
          var company_code = $('#company_code').val();
          var ntn_no = $('#ntn_number').val();
          var st_reg = $('#stregno').val();
          var company_abr = $('#company_abr_e').val();
          var input_add = $('#address').val();
          $.ajax({
                  url: 'api/setup/supplier_setup_api.php',
                  type:'POST',
                  data :  {action:'update',company_name:company_name,company_code:company_code, ntn_no:ntn_no,st_reg:st_reg, company_abr:company_abr,input_add:input_add},
                  success: function(response)
                  {
                    var message = response.message
                    var status = response.status
                    $.ajax({
                        url: "api/message_session/message_session.php",
                        type: 'POST',
                        data: {message:message,status:status},
                        success: function (response) {
                           if(status == 0){
                            $("#msg").html(message);
                           }else{
                            $.get('setup_files/supplier_setup.php',function(data,status){
                              $('#content').html(data);
                              $('#EditFormModel').modal('hide');
                              $('#EditFormModel input').trigger("reset");
                              $(".modal-backdrop").remove();
                              $('body').removeClass('modal-open');
                          });
                           }
                        },
                        error: function(e) 
                        {
                          console.log(e);
                          alert("Contact IT Department");
                        }
                    });
                  },
                  error: function(e) 
                  {
                    console.log(e);
                    alert("Contact IT Department");
                  }
        
          });
        }
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