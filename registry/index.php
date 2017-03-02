<?php
    include("../php/session.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registry</title>
        <?php include('../templates/head.php'); ?>
    </head>
    <body>
        <?php include('../templates/google.php'); ?>
        <?php include('../templates/navbar.php'); ?>
        <div class="section-ring min-full-height">
            <div id="registry-top-text">Registry<div id="registry-divider">&nbsp;</div></div>
            <div id="registry-text">
                <p class="move-right">Dearest friends and family,</p>
                <p>
                    Thank you for wanting to help us celebrate the beginning of our lives together. While gifts are greatly
                    appreciated, they are by no means necassary. What we want most is to have all of you there with us 
                    in Tallahassee for this momentous occasion. That said, if you wish to get us something, we have provided 
                    some options at the registry links below. If nothing there stands out, and you still wish to give
                    something, monetary gifts will also be graciously accepted.
                </p>
                <p class="registry-sign-off">Kathryn &amp; Kyle</p>
            </div>
            <div id="registry-links">
                <div class="registry-link">
                    <a href="https://www-secure.target.com/gift-registry/giftgiver?registryId=c3392ba134f545d88e32ce7e539f952a" target="_blank">
                        <?php echo file_get_contents("../img/target.svg"); ?>
                    </a>
                </div>
                <div class="registry-link">
                    <a href="https://www.bedbathandbeyond.com/store/giftregistry/view_registry_guest.jsp?pwsToken=&eventType=Wedding&inventoryCallEnabled=true&registryId=544134054&pwsurl=" target="_blank">
                        <?php echo file_get_contents("../img/bedbathbeyond.svg"); ?>
                    </a>
                </div>
            </div>
        </div>
        <script src="/js/main.js"></script>
    </body>
</html>
