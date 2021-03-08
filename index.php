<?php
require_once "backend/api.php";

$user_os        = getOS();
$user_browser   = getBrowser();
$os_family      = OSFamily($user_os);

if($os_family = "Windows"){
    $path="C:/";
} else {
    $path="/";
}
if(isset($_GET["path"])){
    $path = urldecode($_GET["path"]);
}
$dir = scandir($path);
foreach($dir as $token)
{
    if($token != ".")
    {
        if(is_dir($path.'/'.$token))
        {
            $folders[] = $token;
        }
        else
        {
            $files[] = $token;
        }
    }
}
foreach($folders as $folder)
{
    $newpath = $path.'/'.$folder;
    echo '<a href = "/Finder/index.php?path='.urlencode($newpath).'"> [ '.$folder.' ] </a>' . '</br>';
}
foreach($files as $file)
{
    $newpath = $path.'/'.$file;
    echo '<a href = "backend/fileHandler.php?file='.$file.'">'.$file.'</a></br>';
}