<?php
    include("credentials.php");

    $connection = mysql_connect($DBSERV, $DBUSER, $DBPASS);

    $db = mysql_select_db($DBDATA, $connection);

    session_start();
    
    $passcode_check = $_SESSION['passcode'];
    $ses_sql = mysql_query("select * from admins where passcode='$passcode_check'", $connection);
    $row = mysql_fetch_assoc($ses_sql);


    $login_session = $row['passcode'];
    $name = $row['name'];

    if (!isset($login_session)) {
        mysql_close($connection);
        header('Location: /');
    }
?>
