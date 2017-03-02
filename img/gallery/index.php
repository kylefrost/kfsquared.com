<!DOCTYPE html>
<html>
    <head>
        <title>Upload Files</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400' rel='stylesheet' type='text/css'>
        <style>
            * {
                font-family: 'Open Sans', sans-serif;
            }

            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }

            th, td {
                padding: 3px;
                text-align: center;
                text-size: 10px;
            }
        </style>
    </head>
    <body>
        <center>
            <form id="uploadForm" method="POST" action="php/upload.php" enctype="multipart/form-data">
                <input id="uploadField" type="file" name="files[]" multiple />
                <br><br>
                <button id="uploadButton" type="submit">Upload</button>
            </form>
            <div>
                <h2><a href="/">KFSquared.com</a> Gallery Images</h2>
                <table>
                <?php
                    function get_current_url($strip = true) {
                        static $filter;
                        if ($filter == null) {
                            $filter = function($input) use($strip) {
                                $input = str_ireplace(array(
                                    "\0", '%00', "\x0a", '%0a', "\x1a", '%1a'), '', urldecode($input));
                                if ($strip) {
                                    $input = strip_tags($input);
                                }

                                $input = htmlspecialchars($input, ENT_QUOTES, 'utf-8'); 

                                return trim($input);
                            };
                        }

                        return 'http'. (($_SERVER['SERVER_PORT'] == '443') ? 's' : '')
                            .'://'. $_SERVER['SERVER_NAME'] . $filter($_SERVER['REQUEST_URI']);
                    }

                    $host = get_current_url(); 
                    $item_array = array();

                    $count = 0;

                    if ($handle = opendir(dirname(__FILE__) . "/files/resized/")) {
                        while (false !== ($entry = readdir($handle))) {
                            if ($entry != "." && $entry != ".." && $entry != ".htaccess") {
                                if (is_dir(dirname(__FILE__) . "/files/resized/" . $entry)) continue;
                                $item_array[$count] = $entry;
                                ++$count;
                            }
                        }
                        if ($count == 0) {
                            echo "No files found.";
                            //break;
                        }

                        closedir($handle);
                    }

                    if ($count != 0) {
                        natcasesort($item_array);

                        if ($host[0] == "1") {
                            $host = "10.0.1.5/" . basename(__DIR__);
                        }

                        echo "<tr><th>File Name</th><th>Rename</th><th>Delete</th></tr>";

                        foreach ($item_array as $item) {
                            echo "<tr><td><a href=\"$host/files/resized/$item\" download>$item</a></td><td><a href=\"#\" onclick=\"editName(this);\" name=\"$item\">Rename</a></td><td><a href=\"#\" onclick=\"deleteFile(this);\" name=\"$item\">Delete</a><br>";
                        }
                    }
                ?>
                </table>
            </div>
        </center>
    <script src="js/upload.js" type="text/javascript"></script>
    <script src="js/delete.js" type="text/javascript"></script>
    <script src="js/rename.js" type="text/javascript"></script>
    </body>
</html>
