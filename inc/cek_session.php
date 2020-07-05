<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
if(!isset($_SESSION['username'])){
    die("Anda Belum Login");
}
//cek level user
if($_SESSION['level']!="admin"){
    die("Anda Bukan Admin");
}
?>