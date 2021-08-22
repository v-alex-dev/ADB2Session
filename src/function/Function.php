<?php
    // Je crée ma fonction grain de sel qui va générer une chaine aléatoire que l'on rajoutera
    // au hash du mot de passe pour compléxifier sa décryption par un éventuel hackeur.
    function grainDeSel($x){
        // Je crée une variable qui contiendra les caractères qui peuvent composer un hash md5
        $chars = "0123456789abcdef";
        $string = "";
        // Je crée une boucle qui va choisir une série de x caractère
        // le x étant le paramètre de ma fonction qui sera lui aussi généré aléatoirement
        for ($i=0; $i < $x; $i++) { 
            $string .= $chars[rand(0,strlen($chars)-1)];
        }
        return $string;
    }

?>