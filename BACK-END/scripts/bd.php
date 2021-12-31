<?php

class bd 
{
    public static function connexion() {
    if (!isset($_SESSION)) session_start();
    session_write_close();
    set_time_limit(0);
    ignore_user_abort ( true );
    // $link=  mysql_connect("localhost","root","Fidae201700++") or die ("Error Server");
    // $bd=  mysql_select_db('masterdb', $link) or die ("Error Data Base");
    $dbh = new PDO('mysql:host=localhost;dbname=test2', 'root', '');
    return $dbh;
}

public static function query($rq) {
    $link=bd::connexion();
    return $link->query($rq);
}
}
?>