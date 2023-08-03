<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Colleagues</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a class="btn btn-sm"  href = "web-api/logout/logout.php">LOGOUT</a></li> -->
              <li class="breadcrumb-item active"><button class="btn btn-sm" id="colleagues_breadcrumb">Colleagues</button></li>
              <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fa fa-tachometer-alt"></i></button></li>
            </ol>
          </div>   
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <div class="row">
              <div class="col-md-12">
                <!-- USERS LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Department Members</h3>

                    <!-- <div class="card-tools">
                      <span class="badge badge-danger">8 New Members</span>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div> -->
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="users-list clearfix">
                    </ul>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body -->
                </div>
                <!--/.card -->
              </div>
              <!-- /.col -->
            </div>
        </div>
    </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<script>
$(document).ready(function(){
    $("#ajax-loader").show();
    // All Department Colleagues
    $.ajax({
        url: 'api/Chat/DepartmentsColleagues/ActionsHandler.php',
        type: 'POST',
        data: {action: 'index'},
        dataType: "json",
        success: function(response){
            $("#ajax-loader").hide();
            $(".users-list li").remove();
            $.each(response.data, function(key,value) {
                if (value['ID'] == value['FRIEND_ID']) {
                      $(".users-list").append('<li><img src="dist/img/user1-128x128.jpg" alt="User Image"><span class="users-list-name">'+value['NAMENAME']+'</span><span class="users-list-date">'+value['NAME']+'</span><a class="remove_friend_id" data-id="'+value['ID']+'" href="#">UNFOLLOW</a></li>');
                }else{
                      $(".users-list").append('<li><img src="dist/img/user1-128x128.jpg" alt="User Image"><span class="users-list-name">'+value['NAMENAME']+'</span><span class="users-list-date">'+value['NAME']+'</span><a class="friend_id" data-id="'+value['ID']+'" href="#">FOLLOW</a></li>');
                }
            });
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
    $("#colleagues").css('pointer-events','');
    $("#colleagues").find($(".far")).removeClass('fa-spin fa-refresh').addClass('fa-user');
});
// Add Follower
$('.users-list').on('click','.friend_id',function() {
    let colleague_id = $(this).attr('data-id');
    $.ajax({
        url: 'api/Chat/DepartmentsColleagues/ActionsHandler.php',
        type: 'POST',
        data: {action: 'store', colleague_id : colleague_id},
        dataType: "json",
        success: function(response){
          $('.friend_id[data-id='+colleague_id+']').html('UNFOLLOW');
          $('.friend_id[data-id='+colleague_id+']').addClass('remove_friend_id').removeClass('friend_id');
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
});

// Remove Follower
$('.users-list').on('click','.remove_friend_id',function() {
    let colleague_id = $(this).attr('data-id');
    $.ajax({
        url: 'api/Chat/DepartmentsColleagues/ActionsHandler.php',
        type: 'POST',
        data: {action: 'delete', colleague_id : colleague_id},
        dataType: "json",
        success: function(response){
          $('.remove_friend_id[data-id='+colleague_id+']').html('FOLLOW');
          $('.remove_friend_id[data-id='+colleague_id+']').addClass('friend_id').removeClass('remove_friend_id');
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
});

// breadcrumbs
$('#dashboard_breadcrumb').click(function(){
    $.get('dashboard_main/dashboard_main.php',function(data,status){
        $('#content').html(data);
    });
});
$('#colleagues_breadcrumb').click(function(){
    $.get('Chat/ColleaguesList.php',function(data,status){
        $('#content').html(data);
    });
});
</script>
<?php include '../includes/loader.php'?>