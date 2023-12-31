<?php
include("../api/auth/db.php");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <title>Select 2 Form</title>
</head>

<body>
    <div class="container">
        <form action="" id="myForm" class="form-control">
            <div class="row">
                <div class="col-md-6">
                    <select class="js-example-basic-single form-control" id="party_id" name="party_id">

                    </select>
                </div>
                <div class="col-md-6">
                    <input type="text" selected readonly class="form-control" name="party_name" id="party_name" placeholder="party Name">
                </div>
            </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
            $.ajax({
                url: 'api.php',
                type: 'POST',
                data: {
                    action: 'party_id'
                },
                dataType: "json",
                success: function(response) {
                    $('#party_id').html('');
                    $('#party_id').append('<option value="" selected disabled>Select party</option>"');
                    $.each(response, function(key, value) {
                        $('#party_id').append('<option data-name="' + value["party_name"] + '"  data-code=' + value["party_code"] + ' value=' + value["party_code"] + '>' + value["party_code"] + ' - ' + value["party_name"] + '</option>');
                    });
                },
                error: function(error) {
                    alert("Contact IT Department");
                }
            });

            $("#myForm").on('change', '#party_id', function() {
                var party_name = $('#party_id').find(':selected').attr("data-name");
                var party_id = $('#party_id').find(':selected').attr("data-code");
                $('#select2-party_id-container').html(party_id);
                $('#party_name').val(party_name);
            });
        });
    </script>
</body>

</html>