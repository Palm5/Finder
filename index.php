<?php
require_once "backend/api.php";

$user_os        = getOS();
$user_browser   = getBrowser();
$os_family      = OSFamily($user_os);

$path="/";
if(isset($_GET["path"])){
    $path = urldecode($_GET["path"]);
}
if(is_dir($path)&&is_readable($path)){
    $dir = scandir($path);
} else {
    if(stristr($_SERVER['HTTP_REFERER'], "path=") and !stristr($_SERVER['HTTP_REFERER'], "error=")){
        header("Location: {$_SERVER['HTTP_REFERER']}&error=privilegi");
    }elseif(stristr($_SERVER['HTTP_REFERER'], "error=")){
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }
     else {
        header("Location: {$_SERVER['HTTP_REFERER']}?error=privilegi");
    }
}
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
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>
    <body>
        <?php
            if(isset($_GET["error"])&&$_GET["error"]=="privilegi"){
                echo "<p>Non hai i privilegi necessari per accedere alla cartella selezionata.</p>";
            }
            foreach($folders as $folder)
            {
                $newtmp = $path.'/'.$folder;
                $newpath = realpath(str_replace('//', '/', $newtmp));
                if($folder == ".."){
                    echo '<a href = "/Finder/index.php?path='.urlencode($newpath).'"> <-- </a>' . '</br>';
                } else {
                    echo '<a href = "/Finder/index.php?path='.urlencode($newpath).'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder" viewBox="0 0 16 16">
                        <path d="M.54 3.87L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z"/>
                    </svg> '.$folder.'</a>' . '</br>';
                }
            }
            if (isset($files)){
                foreach($files as $file)
                {
                    $newtmp = $path.'/'.$file;
                    $newpath = urlencode(realpath(str_replace('//','/', $newtmp)));
                
                    /*if(stristr($file, ".sys")){
                        continue;
                    }*/
                    echo '<a href = "backend/fileHandler.php?file='.$newpath.'">'.$file.'</a></br>';
                }
            }
        ?>
    </body>
</html>
