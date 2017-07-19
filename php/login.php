<?php

    function login_using_passphrase($passphrase_in) {
        session_start();
        $error = false;

        if (empty($passphrase_in)) {
            $error = true;
        } else {
            include("credentials.php");
            $passphrase_conn = mysql_connect($DBSERV, $DBUSER, $DBPASS);
            $db = mysql_select_db($DBDATA, $passphrase_conn);

            $passphrase_in = stripslashes($passphrase_in);

            $passphrase_sql = "select * from passphrases where passphrase='$passphrase_in'";
            $query = mysql_query($passphrase_sql, $passphrase_conn);
            $row = mysql_fetch_assoc($query);
            $rows = mysql_num_rows($query);

            if ($rows == 1) {
                $_SESSION['passphrase'] = $passphrase_in;
                $pass_login_session = $row['passphrase'];
                $_SESSION['rsvp'] = $pass_login_session;
                $_SESSION['loggedin'] = true;
                $_SESSION['family_id'] = $row['family_id'];
            } else {
                $error = true;
            }

            mysql_close($passphrase_conn);
        }

        return $error;
    }
?>
