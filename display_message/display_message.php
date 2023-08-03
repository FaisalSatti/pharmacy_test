<?php
if(!isset($_SESSION)){
    session_start();
    // print_r("hello");
}
if(isset($_SESSION['flash']['message'])){
    if ($_SESSION['flash']['success'] == 1) { ?>

                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <span class="vd_alert-icon"><i class="fa fa-check-circle vd_green"></i></span><strong>Success! </strong>
                    <?php echo  $_SESSION['flash']['message']; ?> 
                </div>

<?php } else if($_SESSION['flash']['success'] == 0){ ?>

                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Failure!</strong>
                    <?php echo $_SESSION['flash']['message']; ?> 
                </div>

<?php } else if($_SESSION['flash']['success'] == 2){ ?>

<div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <span class="vd_alert-icon"><i class="fa fa-exclamation-triangle vd_orange"></i></span><strong></strong>
    <?php echo $_SESSION['flash']['message']; ?> 
</div>                
<?php } 
unset($_SESSION['flash']);
} ?>