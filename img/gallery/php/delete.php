<?php
    $fileToDel = $_GET['filename'];

    $fileDir = dirname(__DIR__) . "/files/resized/";
    if (unlink($fileDir . $fileToDel)) {
        echo 0;
    } else {
        echo 1;
    }
?>
