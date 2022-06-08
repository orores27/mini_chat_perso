<?php 
session_start();

$db = new PDO(
    //  on donne le nom de l'hôte, de la base
    'mysql:host=localhost;dbname=bacasable;charset=utf8',
    'root',
    'root'
);