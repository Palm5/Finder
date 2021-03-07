<?php
$dir = scandir($path);
foreach($dir as $token)
{
    if(($token != ".") && ($token != ".."))
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
    echo "<a href = tema2.php?cale=$newpath> [ $folder ] </a>" . "<br>";
}
foreach($files as $file)
{
    $newpath = $path.'/'.$file;
    echo "<a href = file:///$newpath> $file </a>" . "<br>";
}
?>