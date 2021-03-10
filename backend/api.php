<?php
function checkLogin($cid, $user, $pwd){
    $query = "SELECT user, pwd
        FROM login";
    $res = $cid->query($query)
        Or die("<p>Check fallito. Codice errore: ".$cid->error);
    $row = $res->fetch_assoc();
    if($row["user"]==$user && password_verify($pwd, $row["pwd"])){
        return true;
    }
    return false;
}

?>