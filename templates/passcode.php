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
            <input type="password" name="passphrase" placeholder="Enter passphrase..." id="passphrase">
            <button type="submit" id="submit"><i class="lockbutton fa fa-lock"></i></button>
        </form>
    </div>
    <div id="modal" class="modal">
        <div id="modal-content" class="modal-content">
            <div class="modal-header">
                <span id="close" onclick="helpDown()">&times;</span>
                <h2>Help</h2>
            </div>
            <div class="modal-body">
                <p>Enter the passphrase you received with your invitation - it did <u>not</u> come with the save the date - preceded by your last name.</p>
                <p>For example, if my passphrase is 123456 and my name is Kyle Frost, I would type: <u>frost123456</u>.</p>
            </div>
        </div>
    </div>
    <div class="question">
        <i id="help" onclick="helpUp()" class="fa fa-question-circle"></i>
    </div>
</div>
<script>
    $("#passphraseForm").submit(function(e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "../php/login.php",
            data: $("#passphraseForm").serialize(),
            success: function(response) {
                console.log(response);
                if (response.auth) {
                    location.reload(true);
                }
            },
            error: function(response) {
                console.log(response);
            }
        });
    });
</script>
