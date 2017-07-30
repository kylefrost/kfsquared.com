<?php
    // If request on page is POST
    $is_set_rsvp_post = false;

    if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['rsvp_person_ids'])) {
        $is_set_rsvp_post = true;
        $rsvp_err = false;
        $person_ids = explode(',', $_POST['rsvp_person_ids']);
        $sql = 'UPDATE invites SET rsvp = CASE WHEN person_id IN ( ';

        $i = 0;
        foreach($person_ids as $person_id) {
            if (isset($_POST[$person_id])) {
                $sql = $sql . $person_id . ',';
            }
            $i = $i + 1;    
        }

        $sql = substr($sql, 0, -1);

        if (substr($sql, -1) == "(") {
            $sql = $sql . '1000000';
        }

        $sql = $sql . ') THEN 1 WHEN person_id IN ( ';

        $i = 0;
        foreach($person_ids as $person_id) {
            if (!isset($_POST[$person_id])) {
                $sql = $sql . $person_id . ',';
            }
            $i = $i + 1;
        }

        $sql = substr($sql, 0, -1);

        if (substr($sql, -1) == "(") {
            $sql = $sql . '1000000';
        }

        $sql = $sql . ') THEN 2 ELSE rsvp END;';

        
        $guest_sql = '';

        foreach($person_ids as $person_id) {
            $person_id_post_string = "guest$person_id";
            if (isset($_POST[$person_id_post_string])) {
                $guest_sql = $guest_sql . "UPDATE invites SET first_name = '$_POST[$person_id_post_string]' WHERE person_id = $person_id;";
            }
        }

        $update_conn = mysql_connect($DBSERV, $DBUSER, $DBPASS);

        $update_db =  mysql_select_db($DBDATA, $update_conn);
        
        $update_query = mysql_query($sql, $update_conn);

        if (!empty($guest_sql)) {
            $guest_query = mysql_query($guest_sql, $update_conn);
        }

        mysql_close($update_conn);

        if(mysql_errno()) {
            $rsvp_err = true;
        }
    }

    $family_id = $_SESSION['family_id'];

    $conn = mysql_connect($DBSERV, $DBUSER, $DBPASS);

    $rsvp_arr = array();

    $db_rsvp = mysql_select_db($DBDATA, $conn);
    $query_rsvp = mysql_query("select * from invites where family_id=$family_id", $conn);

    while ($rsvp_row = mysql_fetch_assoc($query_rsvp)) {
        array_push($rsvp_arr, $rsvp_row);
    }

    mysql_close($conn);
?>

<div class="background">
    <div id="rsvp_center">
        <div id="rsvp_title">Your Invites</div>
        <div id="registry-divider">&nbsp;</div><br />
        <?php if($is_set_rsvp_post) { if(!$rsvp_err) { echo "<br /><div id=\"success-message\">Thank you for your RSVP.</div><br />"; } } ?>
        <form name="rsvp-form" id="rsvp-form" method="POST">
            <center>
                <table id="rsvp-table">
                    <?php
                        foreach($rsvp_arr as $rsvp_row_) {
                            echo "<tr><td style=\"padding-right: 30px\">" . (empty($rsvp_row_['last_name']) ? "<input class=\"guest-textbox\" type=\"text\" value=\"" . $rsvp_row_['first_name'] . "\" name=\"guest" . $rsvp_row_['person_id'] . "\">" : $rsvp_row_['first_name']) . "</td><td class=\"rsvp-checkbox\"><input type=\"checkbox\" name=\"" . $rsvp_row_['person_id'] . "\" id=\"" . $rsvp_row_['person_id'] . "\" value=\"" . $rsvp_row_['person_id'] . "\" " . (($rsvp_row_['rsvp'] == '1') ? 'checked' : '') . "></td></tr>";
                        }
                    ?>
                    <tr><td colspan="2"><input id="submitRSVP" type="submit" value="RSVP"></td></tr>
                </table>
            </center>
            <input type="hidden" id="rsvp_person_ids" name="rsvp_person_ids" value="<?php $i = 0; foreach($rsvp_arr as $rsvp_row_) { echo $rsvp_row_['person_id'] . (($i < count($rsvp_arr) - 1) ? ',' : ''); $i = $i + 1; } ?>">
        </form>
    </div>
</div>
