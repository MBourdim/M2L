<?php

/**
 * Nettoie une valeur insérée dans une page HTML
 * Doit être utilisée à chaque insertion de données dynamique dans une page HTML
 * Permet d'éviter les problèmes d'exécution de code indésirable (XSS)
 * @param string $valeur Valeur à nettoyer
 * @return string Valeur nettoyée
 */
function escape($valeur)
{
  // Convertit les caractères spéciaux en entités HTML
  return htmlspecialchars($valeur, ENT_QUOTES, 'UTF-8', false);
}

/**
 * Gère la connexion à la base de données
 * @return PDO Objet de connexion à la BD
 */
function getBdd() {
  return new PDO("mysql:host=localhost;dbname=m2l;charset=utf8","root","",
  array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
