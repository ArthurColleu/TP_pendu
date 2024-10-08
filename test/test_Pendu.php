<?php
require_once __DIR__. '/../vendor/autoload.php';
use App\jeuPendu;

// Démarrage du jeu
$jeu = new JeuPendu();
$jeu->jouer();
