<?php
    $file = realpath(urldecode($_GET['file']));
    $name = explode('/', $file);
    $tmp = explode('.',$file);
    $file_extention = end($tmp);
    header('content-type:application/'.$file_extention);
    header("Content-Disposition: attachment; filename=" .$name[count($name)-1]); //to set download filename
    exit(file_get_contents($file));
?>