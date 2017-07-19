<div class="background">
    <div class="center">
        <div class="wrong-passcode-text">Sorry, that passcode wasn't found.</div>
        <form name="passphraseForm" id="passphraseForm" method="POST">
            <input type="password" name="passphrase" placeholder="Enter code..." id="passphrase">
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
                <p>Enter the code you received with your invitation on the RSVP card - it did <u>not</u> come with the save the date.</p>
            </div>
        </div>
    </div>
    <div class="question">
        <i id="help" onclick="helpUp()" class="fa fa-question-circle"></i>
    </div>
</div>
<script>
/*
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
 */
</script>
