<?php
    include("credentials.php");

    session_start();
    $error = '';
    $auth = false;

    if (empty($_POST['passcode'])) {
        $error = "No passcode given.";
    } else {
        $passcode = $_POST['passcode'];

        $connection = mysql_connect($DBSERV, $DBUSER, $DBPASS);

        $passcode = stripslashes($passcode);
        $passcode = mysql_real_escape_string($passcode);

        $db = mysql_select_db($DBDATA, $connection);
        $query = mysql_query("select * from admins where passcode='$passcode'", $connection);
        $rows = mysql_num_rows($query);

        if ($rows == 1) {
            $_SESSION['passcode'] = $passcode;
            $auth = true;
        } else {
            $error = "Passcode is invalid.";
        }

        mysql_close($connection);
    }

    header('Content-Type: application/json');
    echo json_encode(array('error' => $error, 'auth' => $auth));
?>
