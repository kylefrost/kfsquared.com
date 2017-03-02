<!DOCTYPE html>
<html>
    <head>
        <title>Kyle & Kathryn's Wedding</title>
        <link href="../css/style.css" rel="stylesheet">
        <link href="../vendor/fa/css/font-awesome.min.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    </head>
    <body>
        <form id="passcodeForm">
            <input type="password" name="passcode" placeholder="Enter passcode..." id="passcode">
            <button type="submit" id="submit"><i class="lockbutton fa fa-lock"></i></button>
        </form>

        <script>
            $("#passcodeForm").submit(function(e) {
                e.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "../php/login_admin.php",
                    data: $("#passcodeForm").serialize(),
                    success: function(response) {
                        if (response.auth) {
                            window.location = "/admin/home";
                        }
                    },
                    error: function(response) {
                        console.log(response);
                    }
                });
            });
        </script> 
    </body>
</html>
