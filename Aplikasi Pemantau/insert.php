<?php
include('config.php');

$id = $_GET['id'];

$query = mysql_query("INSERT INTO tb_manula(id) VALUES($id) ") or die(mysql_error());

if ($query){
    echo "sukses";
}
?>