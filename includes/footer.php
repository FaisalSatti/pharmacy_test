
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="http://www.datejs.com/build/date.js"></script>
<!-- jQuery UI 1.11.4 -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard3.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- ChartJS -->
<!-- <script src="plugins/chart.js/Chart.min.js"></script> -->
<!-- DataTables  & Plugins -->
<script href="https://code.jquery.com/jquery-3.5.1.js"></script>
<script href="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<!-- <script src="dist/js/adminlte.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<!-- bootstrap color picker -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- FLOT CHARTS -->
<script src="plugins/flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="plugins/flot/plugins/jquery.flot.resize.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="plugins/flot/plugins/jquery.flot.pie.js"></script>
<!-- overlayScrollbars
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> -->
<!-- jquery-validation -->
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>
<!--function for no refresh page-->
<!--functions for forms-->
<!-- Webcam Script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- <script src="plugins/chart.js/Chart.min.js"></script> -->

<script>
    


// Function for control module
  // for sidebar click sart
      //redirect to locations folder
    $(document).ready(function(){ 
        // dashboard include on load 
        $.get('dashboard_main/dashboard_main.php',function(data,status){
            $('#content').html(data);
        });

        //  Setup
        $('#setup_files').click(function(){
            $.get('setup_files/setup_file.php',function(data,status){
                $('#content').html(data);
            });
        });
        // Account Vouchers
        $('#vouchers').click(function(){
            $.get('financial_management/account_vouchers/account_voucher.php',function(data,status){
                $('#content').html(data);
            });
        });
        $('#process').click(function(){
            $.get('financial_management/account_vouchers/process.php',function(data,status){
                $('#content').html(data);
            });
        });
        // $('#process_inventory').click(function(){
        //     $.get('financial_management/account_vouchers/process_sale.php',function(data,status){
        //         $('#content').html(data);
        //     });
        // });
        $('#process_sale').click(function(){
            $.get('sales_module/process_sale.php',function(data,status){
                $('#content').html(data);
            });
        });

        $('#mis').click(function(){
            $.get('financial_management/account_vouchers/mis.php',function(data,status){
                $('#content').html(data);
            });
        });
        
        
        // Sale Module
        $('#transaction_files').click(function(){
            $.get('sales_module/transaction_files/transaction_files.php',function(data,status){
                $('#content').html(data);
            });
        });
        
        // trial balance view on click
        $('#reports').click(function(){
            $(this).css('pointer-events','none');
            $(this).find($(".far")).removeClass('fa-file').addClass('fa-spin fa-refresh');
            $.get('sales_module/reports/reports.php',function(data,status){
                $('#content').html(data);
            });
        });
        // dashboard use on click
        $('#dashboard_main').click(function(){
            // $(this).css('pointer-events','none');
            // $(this).find($(".far")).removeClass('fa-tachometer-alt').addClass('fa-spin fa-refresh');
            $.get('dashboard_main/dashboard_main.php',function(data,status){
                $('#content').html(data);
            });
        });

        // online_ledger view on click
        $('#online_ledger').click(function(){
            $(this).css('pointer-events','none');
            $(this).find($(".far")).removeClass('fa-circle').addClass('fa-spin fa-refresh');
            $.get('financial_management/MIS/online_ledger.php',function(data,status){
                $('#content').html(data);
            });
        });
        // trial balance view on click
        $('#trial_balance').click(function(){
            $(this).css('pointer-events','none');
            $(this).find($(".far")).removeClass('fa-circle').addClass('fa-spin fa-refresh');
            $.get('financial_management/trial_balance/trial_balance.php',function(data,status){
                $('#content').html(data);
            });
        });
        // sales page
        $('#inventory_local').click(function(){
            $.get('inventory_management/inventory_local/inventory_local.php',function(data,status){
                $('#content').html(data);
            });
        });

        $('#inventory_mis_report').click(function(){
            $.get('inventory_management/mis_report/inventory_mis.php',function(data,status){
                $('#content').html(data);
            });
        });

        $('#modern_dashboard_sale').click(function(){
            $.get('sale/dashboard.php',function(data,status){
                $('#content').html(data);
            });
        });




        // payroll view on click
        $('#payroll_sidebar').click(function(){
            $.get('finance/payroll.php',function(data,status){
                $('#content').html(data);
            });
        });

        // expired challan view on click
        $('#finance').click(function(){
            $.get('finance/finance.php',function(data,status){
                $('#content').html(data);
            });
        });
          //INVENTORY FUNCTION
        $('#Inventory').click(function(){
            $.get('Inventory/Inventory.php',function(data,status){
                $('#content').html(data);
            });
        });
        $('#inventory_dashbaord').click(function(){
            $(this).css('pointer-events','none');
            $(this).find($(".far")).removeClass('fa-circle').addClass('fa-spin fa-refresh');
            $.get('Inventory/inv_dashboard.php',function(data,status){
                $('#content').html(data);
            });
        });


        // Colleagues List
        $('#colleagues').click(function(){
            $(this).css('pointer-events','none');
            $(this).find($(".far")).removeClass('fa-user').addClass('fa-spin fa-refresh');
            $.get('Chat/ColleaguesList.php',function(data,status){
                $('#content').html(data);
            });
        });
        
        // sales dashboard
        $('#sale_dashbaord').click(function(){
            $(this).css('pointer-events','none');
            $(this).find($(".far")).removeClass('fa-circle').addClass('fa-spin fa-refresh');
            $.get('sale/sale_dashboard/sales_dashboard.php',function(data,status){
                $('#content').html(data);
            });
        });
        $('#recovery_inquiry').click(function(){
            $(this).css('pointer-events','none');
            $(this).find($(".far")).removeClass('fa-circle').addClass('fa-spin fa-refresh');
            $.get('sale/Recovery/recovery_inquiry.php',function(data,status){
                $('#content').html(data);
            });
        });
        
        $('#finance_recovery_inquiry').click(function(){
            $(this).css('pointer-events','none');
            $(this).find($(".far")).removeClass('fa-circle').addClass('fa-spin fa-refresh');
            $.get('finance/finance_recovery_inquiry.php',function(data,status){
                $('#content').html(data);
            });
        });
        
        // HRM
        $('#hrm').click(function(){
            $.get('Hrm/hrm.php',function(data,status){
                $('#content').html(data);
            });
        });
        $('#hrm_dashboard').click(function(){
            $(this).css('pointer-events','none');
            $(this).find($(".far")).removeClass('fa-circle').addClass('fa-spin fa-refresh');
            $.get('Hrm/hrm_dashboard.php',function(data,status){
                $('#content').html(data);
            });
        });
        //FIXEDASSETS
        $('#fixed_assets').click(function(){
            $.get('Fixedassets/fixedassets.php',function(data,status){
                $('#content').html(data);
            });
        });
        $('#fa_dashboard').click(function(){
            $(this).css('pointer-events','none');
            $(this).find($(".far")).removeClass('fa-circle').addClass('fa-spin fa-refresh');
            $.get('Fixedassets/fa_dashboard.php',function(data,status){
                $('#content').html(data);
            });
        });
        //record room
        $('#record_room').click(function(){
            $.get('sale/record_room/record_room.php',function(data,status){
                $('#content').html(data);
            });
        });
        
        $('#record_room_dashboard').click(function(){
            $(this).css('pointer-events','none');
            $(this).find($(".far")).removeClass('fa-circle').addClass('fa-spin fa-refresh');
            $.get('sale/record_room/record_room_dashboard.php',function(data,status){
                $('#content').html(data);
            });
        });
        //recovery 
        $('#recovery').click(function(){
            $.get('sale/Recovery/recovery.php',function(data,status){
                $('#content').html(data);
            });
        });
        
        $('#recovery_dashboard').click(function(){
            $(this).css('pointer-events','none');
            $(this).find($(".far")).removeClass('fa-circle').addClass('fa-spin fa-refresh');
            $.get('sale/Recovery/recovery_dashboard.php',function(data,status){
                $('#content').html(data);
            });
        });

        // setup view on click
        $('#setup_dashboard').click(function(){
            $(this).css('pointer-events','none');
            $(this).find($(".far")).removeClass('fa-circle').addClass('fa-spin fa-refresh');
            $.get('setup/setup_dashboard.php',function(data,status){
                $('#content').html(data);
            });
        });
        $('#setup').click(function(){
            $.get('setup/setup.php',function(data,status){
                $('#content').html(data);
            });
        });
        // hierarchy diagram
        $('#erp_hierarchy').click(function(){
            $("#ajax-loader").show();
            $.get('Hierarchy_Diagrams/ERP_Hierarchy.php',function(data,status){
                $('#content').html(data);
            });
        });
        $('#process_inventory').click(function(){
            // $("#ajax-loader").show();
            $.get('inventory_management/inventory_local/process.php',function(data,status){
                $('#content').html(data);
            });
        });

           //  user Setup
           $('#user_setup').click(function(){
            $.get('user_setup/user_setup.php',function(data,status){
                $('#content').html(data);
            });
        });
            
        $('#organo').click(function(){
            $("#ajax-loader").show();
            $.get('Hierarchy_Diagrams/Organo.php',function(data,status){
                $('#content').html(data);
            });
        });
    });
      
      // Function for active link on sidebar nav
    $(document).ready(function() {
        $('#ajax-loader').hide();
        $("ul.nav li a").click(function () {
            $("a").removeClass("active");
            // $(".tab").addClass("active"); // instead of this do the below 
            $(this).addClass("active");   
        });
    });
    



  // footer functions start

  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  // previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>
</body>
</html>

<?php include 'includes/loader.php'?>