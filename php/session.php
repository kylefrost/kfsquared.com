<?php
    include("credentials.php");

    $connection = mysql_connect($DBSERV, $DBUSER, $DBPASS);

    $db = mysql_select_db($DBDATA, $connection);

    session_start();
    
    $passphrase_check = $_SESSION['passphrase'];
    $ses_sql = mysql_query("select passphrase from passphrases where passphrase='$passphrase_check'", $connection);
    $row = mysql_fetch_assoc($ses_sql);

    $login_session = $row['passphrase'];

    $_SESSION['rsvp'] = $login_session;

    if (!isset($_SESSION['rsvp'])) {
        mysql_close($connection);
    }
?>
