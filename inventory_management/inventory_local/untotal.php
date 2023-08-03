<?php
session_start();
?>
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>UnPost Vouchers (Inventory Management)</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                    <li class="breadcrumb-item active"><button class="btn btn-sm" id="vouchers_breadcrumb">Process</button></li>
                    <li class="breadcrumb-item active"><button class="btn btn-sm" id="posting">UnPost</button></li>
                    <li class="breadcrumb-item active"><button class="btn btn-sm" id="total">Table</button></li> 
              </ol>
            </div>   
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
  <section class="content">
  <?php include '../../display_message/display_message.php'?>
    <form id="posting_form">
        <div class="container-fluid">
        
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-sm-10">
                      <!-- <h3 class="card-title">Language Records</h3> -->
                    </div>
                    <div class="row p-1">
                      <div class="col-md-12 text-right">
                          <button type="submit" class="btn btn-primary bulk_inv_btn" ><i class="fas fa-print fa-fw"></i>UnPost Vouchers</button>
                      </div>
                    </div>
                  </div> 
                  <div class="row">
                      <div class="col-sm-12 form-group text-center">
                          <span id="error_msg" style="color: red;font-size: 13px;"></span>
                      </div>
                  </div>
                  
                </div>
                <!-- /.card-header -->
                <div id="record-content"></div>
                <div class="card-body" >
                  Count of Selected Records : <span id="dvcount"></span>
                </br></br><table id="example1"  class=" table table-bordered table-striped table-responsive-lg ">
                <thead>
                <tr>
                    <th>Sno</th>
                    <th>Voucher Date</th>
                    <th>Voucher Year</th>
                    <th>Comapny Code</th>
                    <th>Voucher No</th>
                    <th>Voucher Type</th>
                    <th>Remarks</th>
                    <th><input Type="checkbox" name="all_check" id="all_check" value="Y"> &nbsp;&nbsp; Check All/Reset All</th>             
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
    </form>
  </div>

  <?php

include '../../includes/security.php';
?>


<script>
      
  $("document").ready(function(){
    var company_code=<?php echo isset($_GET['company_code'])?$_GET['company_code']:'0' ?>;
    // console.log(company_code);
    var type="<?php echo isset($_GET['type'])?strtoupper($_GET['type']):'0' ?>";
    var from_date="<?php echo isset($_GET['from_date'])?$_GET['from_date']:'0' ?>";
    var to_date="<?php echo isset($_GET['to_date'])?$_GET['to_date']:'0' ?>";
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
      url: 'api/inventory_management/inventory_locals/unpost_api.php',
      type:'POST',
      data: {action:'view3',company_code:company_code,type:type,from_date:from_date,to_date:to_date},
      success: function(data) {
        // alert('acbsad');
        console.log(data);
        // Empty datatable previouse records
        table.clear().draw();
        // append data in datatable
        var sno='0';
        for (var i = 0; i < data.length; i++) {
          sno++;
          var checkboxes = '<input type="checkbox" class="bulkchecked" name="bulkchecked[]" co_code="'+data[i].CO_CODE+'" voucher_year="'+data[i].DOC_YEAR+'" voucher_type="'+data[i].DOC_TYPE+'" voucher_no="'+data[i].DOC_NO+'" value="'+data[i].CO_CODE+'-'+data[i].DOC_YEAR+'-'+data[i].DOC_TYPE+'-'+data[i].DOC_NO+'">';
          var narration=data[i].REMARKS=='' ?'-':data[i].REMARKS;
            //   console.log(data[i].NARATION);
              // btn_dlt = '<button class="btn btn-sm btn-delete" data-id="'+data[i].ID+'"><i class="far fa-trash-alt text-danger fa-fw"></i></button>';
          table.row.add([sno,data[i].DOC_DATE,data[i].DOC_YEAR,data[i].CO_CODE,data[i].DOC_NO,data[i].DOC_TYPE,narration,checkboxes+' <b style="color:#1f1f87">Posted</b>']);
        }
        table.draw();
      },
      error: function(e){
          console.log(e);
          alert("Contact IT Department");
        }
      });
      $("#all_check").click(function() {
          var rows = table.rows({ 'search': 'applied' }).nodes();
          
          // debugger;
          if($('input:checked', rows).length == rows.length){
            $('input[type="checkbox"]', rows).prop('checked', false);
          }
          else{
            $('input[type="checkbox"]', rows).prop('checked', true);
          }
          $('#dvcount').html($(rows).find("input:checked").length);
      });
      $("body").on("change","input",function() {
          var rows = table.rows({ 'search': 'applied' }).nodes();
          $('#dvcount').html($(rows).find("input:checked").length);
      });
            $('#posting_form').ready(function(e){
          $("#posting_form").on('submit',(function(e) {
              $("#error_msg").text("");
      
              
              e.preventDefault();
              var formData = new FormData(this);
              //get all checked values
              var matches = [];
              var table = $('#example1').dataTable();
              var checkedcollection = table.$(".bulkchecked:checked", { "page": "all" });
              console.log(checkedcollection);
              checkedcollection.each(function (index, elem) {
                  matches.push($(elem).val());
              });
            //   var bulkchecked = JSON.stringify(matches);
            //   console.log(matches);
            //   myString = bulkchecked.split(',');
              
              //get all checked values
              
              formData.append('bulkchecked',matches);
              formData.append('action','post3');
              
              var ck_box = $('#example1 input[type="checkbox"][class="bulkchecked"]:checked').length;
            //   console.log(ck_box);
              if(ck_box < 1){
                  $("#error_msg").text("please check at least one voucher");
              }else{
                //   $("#ajax-loader").show();
                  $.ajax({
                    url: 'api/inventory_management/inventory_locals/unpost_api.php',
                      type: 'POST',
                      data: formData,
                      contentType: false,
                      cache: false,
                      processData:false,
                      success: function(response){
                          console.log(response);
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
                                $.get('inventory_management/inventory_local/untotal.php',function(data,status){
                                  
                                  $('#content').html(data);
                                });
                            }
                            },
                            error: function(e) 
                            {
                            console.log(e);
                            alert("Contact IT Department");
                            }
                        });
                        var company_code=<?php echo isset($_GET['company_code'])?$_GET['company_code']:'0' ?>;
                        // console.log(company_code);
                        var type="<?php echo isset($_GET['type'])?strtoupper($_GET['type']):'0' ?>";
                        var from_date="<?php echo isset($_GET['from_date'])?$_GET['from_date']:'0' ?>";
                        var to_date="<?php echo isset($_GET['to_date'])?$_GET['to_date']:'0' ?>";
                        // $('#example1').dataTable().fnDestroy();$('#example1 tbody').empty();
                        $('#example1').dataTable().fnClearTable(); 
                        $.fn.dataTable.ext.errMode = 'none';
                        // $('#example1').DataTable().destroy();
                        // $('#example1 tbody').empty();
                        table = $('#example1').DataTable({
                        dom: 'Bfrtip',
                        orderCellsTop: true,
                        fixedHeader: true,
                        
                                buttons: [
                                    'copy', 'csv', 'excel', 'pdf', 'print',
                                ]
                        });
                
                    // function aaaa (){
                        $.ajax({
                          url: 'api/inventory_management/inventory_locals/unpost_api.php',
                          type:'POST',
                          data: {action:'view3',company_code:company_code,type:type,from_date:from_date,to_date:to_date},
                          success: function(data) {
                              console.log(data.length);
                              // Empty datatable previouse records
                              table.clear().draw();
                              // append data in datatable
                              var sno='0';
                              for (var i = 0; i < data.length; i++) {
                              sno++;
                              var checkboxes = '<input type="checkbox" class="bulkchecked" name="bulkchecked[]" co_code="'+data[i].CO_CODE+'" voucher_year="'+data[i].DOC_YEAR+'" voucher_type="'+data[i].VOUCHER_TYPE+'" voucher_no="'+data[i].VOUCHER_NO+'" value="'+data[i].CO_CODE+'-'+data[i].DOC_YEAR+'-'+data[i].VOUCHER_TYPE+'-'+data[i].VOUCHER_NO+'">';
                              var narration=data[i].NARATION=='' ?'-':data[i].NARATION;
                                    console.log(data[i].NARATION);
                                  btn_edit = '<button class="btn btn-sm btn-select 702a1b_2" co_code="'+data[i].CO_CODE+'" voucher_year="'+data[i].DOC_YEAR+'" voucher_type="'+data[i].VOUCHER_TYPE+'" voucher_no="'+data[i].VOUCHER_NO+'" ><i class="far fa-edit text-info fa-fw"></i></button>';
                              // btn_dlt = '<button class="btn btn-sm btn-delete" data-id="'+data[i].ID+'"><i class="far fa-trash-alt text-danger fa-fw"></i></button>';
                              btn = btn_edit; 
                              table.row.add([sno,data[i].VOUCHER_DATE,data[i].DOC_YEAR,data[i].CO_CODE,data[i].VOUCHER_NO,data[i].VOUCHER_TYPE,narration,checkboxes+' <b style="color:#1f1f87">Posted</b>']);
                              }
                              table.draw();
                          },
                          error: function(e){
                              console.log(e);
                              alert("Contact IT Department");
                          }
                        });
                      },
                      error: function(error){
                          console.log(error);
                          alert("Contact IT Department");
                      }
                  });
              }
          }));
      });
  });
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
        $.get('inventory_management/inventory_local/unpost.php', function(data,status){
            $("#content").html(data);
        });
    });
    $("#total").on("click", function () {
        $.get('inventory_management/inventory_local/untotal.php', function(data,status){
            $("#content").html(data);
        });
    });
      </script>