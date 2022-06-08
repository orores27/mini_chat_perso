<?php
require_once('db.php');

$bacasable= 'INSERT INTO bacasable(name, message ) values(:name, :message)';
$statement=$db->prepare($bacasable);
$statement->execute([
    'name' => strip_tags($_POST['name']),
    'message' => strip_tags($_POST['message'])  
]);
$_SESSION['name']= strip_tags($_POST['name']);
header("Location: /");

