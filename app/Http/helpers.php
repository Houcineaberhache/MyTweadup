<?php

function calculePaiement($prix_total,$somme){
 $reste_paiement = $prix_total - $somme;
    return $reste_paiement;
}

