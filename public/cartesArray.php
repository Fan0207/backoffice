<?php

namespace App;

use App\Carte;

class CartesArray
{
    private $cartes = [];

    public function addCarte(Carte $carte)
    {
        $this->cartes[] = $carte;

        return $this;
    }
}