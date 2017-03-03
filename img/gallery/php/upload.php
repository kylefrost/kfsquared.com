<?php
    function resize_image($old, $new, $width, $height) {
        $img_errors = array();

        try {
            $img = new Imagick();
        } catch(Exception $e) {
            $img_errors[] = 'Could not create Imagick object.';
        }

        try {
            $img->readImage($old);
            $size = $img->getImageGeometry();
            $iwidth = $size['width'];
            $iheight = $size['height'];
        } catch(Exception $e) {
            $img_errors[] = 'Could not read image:' . $old;
        }
        
        try {
            if ($iwidth > $iheight) {
                $height = $width / ($iwidth / $iheight);
            } elseif ($iheight > $iwidth) {
                $width = ($iwidth / $iheight) * $height;
            }

            $img->resizeImage($width, $height, Imagick::INTERPOLATE_BICUBIC, true);
        } catch(Exception $e) {
            $img_errors[] = 'Could not resize image.';
        }
        
        try {
            $img->writeImage($new);
        } catch(Exception $e) {
            $img_errors[] = 'Could not write image: ' . $new;
        }
        
        try {
            $img->clear();
        } catch(Exception $e) {
            $img_errors[] = 'Could not clear image.';
        }
        
        try {
            $img->destroy();
        } catch(Exception $e) {
            $img_errors[] = 'Could not destroy image.';
        }

        if (empty($img_errors)) {
            unlink($old);
        }

        return $img_errors;
    }

    function randomExtra($length = 5) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return "_" . $randomString;
    } 

    if (isset($_FILES['files'])) {
        $errors = array();

        foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name) {
            $file_name = $_FILES['files']['name'][$key];
            $file_size = $_FILES['files']['size'][$key];
            $file_tmp = $_FILES['files']['tmp_name'][$key];
            $file_type = $_FILES['files']['type'][$key];

            if ($file_size > 500000000) {
                $errors[] = 'File size must be less than 500 MB<br>';
            }

            $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
            $lower_file_extension = strtolower($file_extension);

            $desired_dir = dirname(__DIR__) . "/files/";
            // $file_name = "";

            if (empty($errors)) {
                if (!is_dir($desired_dir)) {
                    $errors[] = "Directory doesn't exist.<br>";
                    mkdir("$desired_dir"); 
                }

                if (!file_exists($desired_dir . $file_name)) {
                    $new_dir = $desired_dir . $file_name;
                    move_uploaded_file($file_tmp, $new_dir);
                } else {
                    $file_extension = "." . $file_extension;
                    $file_name = basename($file_name, $file_extension);
                    $file_name = $file_name . randomExtra() . $file_extension;
                    $new_dir = $desired_dir . $file_name;
                    rename($file_tmp, $new_dir);
                }

                if(!empty($img_err = resize_image($new_dir, $desired_dir . 'resized/' . $file_name, 900, 900))) {
                    $errors[] = $img_err;
                }

            } else {
                print_r($errors);
            }
        }

        if (empty($errors)) {
            echo 0;
        } else {
            print_r($errors);
        }
    }
?>
