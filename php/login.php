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


            $did_use_web_conn = mysql_connect($DBSERV, $DBUSER, $DBPASS);
            $did_use_web_db = mysql_select_db($DBDATA, $did_use_web_conn);

            if (isset($_SESSION['family_id'])) {
                $did_use_web_famid = $_SESSION['family_id'];
                $did_use_web_sql = "update invites set web=1 where family_id=$did_use_web_famid";

                $did_use_web_query = mysql_query($did_use_web_sql, $did_use_web_conn);

                mysql_close($did_use_web_conn);

                if (mysql_errno()) {
                    $error = true;
                }
            }
        }

        return $error;
    }
?>
