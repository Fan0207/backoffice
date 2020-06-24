<?php

/**
 * Modéliser un jeu de carte.
 * 
 * Voici les classes à créer :
 * - Carte
 * - Joueur
 * - ArrayCartes
 */

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../src/Carte.php';

try {
    $asPique = new Carte(Carte::NOIR, Carte::PIQUE, 23);
} catch (Exception $e) {
    echo 'oups il y a eu une erreur<br>';
    echo $e->getMessage();
    exit();
}

dump($asPique);
echo $asPique;

<?php

use App\Carte;
use App\CartesArray;

/**
 * Modéliser un jeu de carte.
 * 
 * Voici les classes à créer :
 * - Carte
 * - Joueur
 * - CartesArray
 */

require __DIR__.'/../vendor/autoload.php';

$pioche = new CartesArray();

try {
    foreach (Carte::FIGURES as $codeFigure => $nomFigure) {
        for ($i = Carte::AS; $i <= Carte::ROI; $i++) {
            if ($codeFigure == 0 ||$codeFigure == 1) {
                $couleur = Carte::NOIR;
            } else {
                $couleur = Carte::ROUGE;
            }

            $carte = new Carte($couleur, $codeFigure, $i);

            $pioche->addCarte($carte);
        }
    }
} catch (Exception $e) {
    echo 'oups il y a eu une erreur<br>';
    echo $e->getMessage();
}

echo $asPique;

dump($pioche);

<?php

use App\Carte;
use App\CartesArray;

/**
 * Modéliser un jeu de carte.
 * 
 * Voici les classes à créer :
 * - Carte
 * - Joueur
 * - CartesArray
 */

require __DIR__.'/../vendor/autoload.php';

$cartes = [];

try {
    foreach (Carte::FIGURES as $codeFigure => $nomFigure) {
        for ($i = Carte::AS; $i <= Carte::ROI; $i++) {
            if ($codeFigure == 0 ||$codeFigure == 1) {
                $couleur = Carte::NOIR;
            } else {
                $couleur = Carte::ROUGE;
            }

            $carte = new Carte($couleur, $codeFigure, $i);
            $cartes[] = $carte;
        }
    }
} catch (Exception $e) {
    echo 'oups il y a eu une erreur<br>';
    echo $e->getMessage();
}

$pioche = new CartesArray($cartes);

dump($pioche);