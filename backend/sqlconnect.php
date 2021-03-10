<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = 'lollo98';
    $db = 'finder';
    $cid = new mysqli($hostname, $username, $password, $db);
    if ($cid ->connect_errno) {
        die ("Errore connessione al database(". $cid->connect_errno. ")". $cid->connect_error);
    }
?>