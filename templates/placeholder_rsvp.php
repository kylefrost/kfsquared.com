<?php
    // Redirect past passphrase if already logged in

    /*
    include("../php/credentials.php");

    $connection = mysql_connect($DBSERV, $DBUSER, $DBPASS);
    $db = mysql_select_db($DBDATA, $connection);

    session_start();

    $passphrase_check = $_SESSION['passphrase'];
    $ses_sql = mysql_query("select passphrase from passphrases where passphrase='$passphrase_check'", $connection);
    $row = mysql_fetch_assoc($ses_sql);

    $login_session = $row['passphrase'];
     */
?>

<div class="background">
    <div class="center">
        <form id="passphraseForm">
            <div style="font-size:40px;color:white;">I'm not ready yet!</div>
        </form>
    </div>
    <div class="question">
        <i id="question" onclick="modal()" class="fa fa-question-circle"></i>
    </div>
</div>

<script src="../js/main.js"></script>
