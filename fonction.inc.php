<?php
//fonction pour se connecter a la base de donnée 
function connexion() {
  $dsn = 'mysql:host=localhost;dbname=m2l'; //contient le nom du serveur  
  $user = 'root';
  $password = '';

  try {
    $dbh = new PDO($dsn, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
  } catch (PDOException $ex) {
    die("Erreur lors de la connexion SQL : " . $ex->getMessage());
  }
}

function db_execute($dbh, $sql, $params=null)
{
  $rows = array();
  try {
    $sth = $dbh->prepare($sql);
    $sth->execute($params);
    $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
  }
  return $rows;
}

function db_insert($dbh, $sql, $params=null)
{
  $rows = array();
  try {
    $sth = $dbh->prepare($sql);
    $sth->execute($params);
  } catch (PDOException $e) {
      die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
  }
}

function db_exehash($dbh, $sql, $params=null)
{
  $rows = array();
  try {
    $sth = $dbh->prepare($sql);
    $sth->execute($params);
    $rows = $sth->fetch(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
  }
  return $rows;
}