<!DOCTYPE html>
<html>
    <head>
        <title>Kathryn &amp; Kyle</title>
        <?php include('templates/head.php'); ?>
    </head>
    <body>
        <?php include('templates/google.php'); ?>
        <?php include('templates/navbar.php'); ?>
        <div class="section-black section-hero">
            <div id="top_text">Kathryn &amp; Kyle</div>
            <div id="countdown">
                <span class="container">
                    <months>00</months>
                    <label id="monthLabel">MONTHS</label>
                </span>
                <span class="container">
                    <weeks>00</weeks>
                    <label id="weekLabel">WEEKS</label>
                </span>
                <span class="container">
                    <days>00</days>
                    <label id="dayLabel">DAYS</label>
                </span>
                <span class="container">
                    <hours>00</hours>
                    <label id="hourLabel">HOURS</label>
                </span>
                <span class="container">
                    <minutes>00</minutes>
                    <label id="minuteLabel">MINUTES</label>
                </span>
                <span class="container">
                    <seconds>00</seconds>
                    <label id="secondLabel">SECONDS</label>
                </span>
            </div>
        </div>
        <div class="section-ring story_main">
            <div id="story_left"></div>
            <div id="story_right">
                <div id="story_title">Our Story</div>
                <div id="story_text"><?php include('templates/our_story.html'); ?></div>
            </div>
        </div>
        <div class="carousel">
            <?php
                $dir = "/img/gallery/files/resized/";
                $idir = realpath(dirname(__FILE__) . '/..') . $dir;

                if ($handle = opendir($idir)) {
                    while (false !== ($entry = readdir($handle))) {
                        if ($entry != "." && $entry != ".." && $entry != ".htaccess") {
                            if (is_dir($idir . $entry)) continue;
                            $item_array[$count] = $entry;
                            ++$count;
                        }
                    }

                    closedir($handle);
                }

                if ($count != 0) {
                    foreach ($item_array as $item) {
                        $img_dir = $dir . $item;
                        echo "<img src=\"$img_dir\">";
                    }
                } else {
                    echo "No images found in: " . $idir;
                }

            ?>
        </div>
        <script src="/js/main.js"></script>
        <script src="/js/cd.js"></script>
    </body>
</html>
