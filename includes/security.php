<?php
$data = $_SESSION['data'];
$user_name = $data['user_name'];
$role =  $data['role'];


$permissions = " ";

if ($role != 'Admin') {
  $permissions = $_SESSION['permissions'];
}
?>
<script>

$(document).ready(function() {
            var role = "<?php echo $role;?>";
            // console.log(role);
            if (role != 'Admin') {
            var permissions = "<?php 
                echo $permissions; 
                ?>";
            var permissions1 = permissions.split(",");
                console.log(permissions1);
                if (permissions1 != '') {
                $.each(permissions1, function(key, value) {
                console.log(value);
            // document.getElementById(value).style.display = "";
                $('.'+value).css("display", "");
            });
            }

            }else{
                var rights = document.getElementsByClassName("show1");
                console.log(rights);
                $.each(rights, function(key, value) {
                $(value).css("display", "");

                });
            }
});
</script>