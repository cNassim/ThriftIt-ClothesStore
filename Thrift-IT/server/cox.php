<?php
require"env.php";
function cnx_pdo(){
// DSN: Data source name
$conn ="mysql:dbname=".DBNAME.";host=".DBHOST;
//------connexion--
try{$db = new PDO($conn,DBUSER,DBPASS);
// ---echange de données en utf8 --- $db->exec('SET NAMES utf8');
//echo "connexion établie";
return $db;
} catch(PDOException $e) {
    die($e->getMessage());
}}
?>