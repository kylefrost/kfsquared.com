<?php
    include("credentials.php");

    session_start();
    $error = '';
    $auth = false;

    if (empty($_POST['passphrase'])) {
        $error = "No passphrase given.";
    } else {
        $passphrase = $_POST['passphrase'];

        $connection = mysql_connect($DBSERV, $DBUSER, $DBPASS);

        $passphrase = stripslashes($passphrase);
        $passphrase = mysql_real_escape_string($passphrase);

        $db = mysql_select_db($DBDATA, $connection);
        $query = mysql_query("select * from passphrases where passphrase='$passphrase'", $connection);
        $row = mysql_fetch_assoc($query);
        $rows = mysql_num_rows($query);

        if ($rows == 1) {
            $_SESSION['passphrase'] = $passphrase;
            $login_session = $row['passphrase'];
            $_SESSION['rsvp'] = $login_session;
            $_SESSION['loggedin'] = true;
            $auth = true;
        } else {
            $error = "Passphrase is invalid.";
        }

        mysql_close($connection);
    }

    header('Content-Type: application/json');
    echo json_encode(array('error' => $error, 'auth' => $auth));
?>
