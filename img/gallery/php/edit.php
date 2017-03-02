<?php
    $fileToRename = $_GET['filename'];
    $newFilename = $_GET['newname'];

    $fileDir = dirname(__DIR__) . "/files/resized/";

    if (rename($fileDir . $fileToRename, $fileDir . $newFilename)) {
        echo 0;
    } else {
        echo 1;
    }
?>
