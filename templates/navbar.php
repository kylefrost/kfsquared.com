<?php 
    $page = basename($_SERVER['REQUEST_URI']);
?>
<ul id="nav" class="topnav up">
    <li><a <?php echo ($page == "" ? "class=\"active\"" : "") ?> href="/">Kathryn &amp; Kyle</a></li>
    <li><a <?php echo ($page == "wedding" ? "class=\"active\"" : "") ?> href="/wedding">Wedding</a></li>
    <li><a <?php echo ($page == "accommodations" ? "class=\"active\"" : "") ?> href="/accommodations">Accommodations</a></li>
    <li><a <?php echo ($page == "registry" ? "class=\"active\"" : "") ?> href="/registry">Registry</a></li>
    <li class="right"><a <?php echo ($page == "contact" ? "class=\"active\"" : "") ?> href="/contact">Contact</a></li>
    <li class="right"><a <?php echo ($page == "rsvp" ? "class=\"active\"" : "") ?> href="/rsvp"><?php echo (!$_SESSION['loggedin']) ? "RSVP!" : "My RSVP"; ?></a></li>
</ul>
<div id="mobilebar">
    <span class="toptext">
    <?php
        switch ($page) {
            case "wedding":
                echo "Wedding";
                break;
            case "accommodations":
                echo "Accommodations";
                break;
            case "registry":
                echo "Registry";
                break;
            case "contact":
                echo "Contact";
                break;
            case "rsvp":
                echo (!$_SESSION['loggedin']) ? "RSVP!" : "My RSVP";
                break;
            default:
                echo "Kathryn &amp; Kyle";
        }
    ?>
    </span>
    <a id="mobileright" onclick="move()">
        <div id="hamburger" class="hamburger--spin">
            <div class="hamburger-box">
                <div class="hamburger-inner"></div>
            </div>
        </div>
    </a>
</div>
