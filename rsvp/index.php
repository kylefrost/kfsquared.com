<?php
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
                include('../templates/placeholder_rsvp.php');
            }
        ?>
        <script src="/js/main.js"></script>
    </body>
</html>
