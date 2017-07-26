<?php
    $passphrase_error = false;

    if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['passphrase'])) {
        $passphrase = $_POST['passphrase'];
        include('../php/login.php');
        $passphrase_error = login_using_passphrase($passphrase);
    }

    include("../php/session.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo (!$_SESSION['loggedin']) ? "RSVP!" : "My RSVP"; ?></title>
        <?php include('../templates/head.php'); ?>
    </head>
    <body>
        <?php include('../templates/google.php'); ?>
        <?php include('../templates/navbar.php'); ?>
        <?php
            if(!$_SESSION['loggedin']) {
                include('../templates/passcode.php');
            } else {
                include('../templates/rsvp.php');
            }
        ?>
        <script src="/js/main.js"></script>
    </body>
</html>
