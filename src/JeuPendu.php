<?php

namespace App;


class JeuPendu
{
    private MotADeviner $motADeviner;
    private int $nbEssaisRestant;
    private array $listeLettreProposee;

    public function __construct(){
        $this->motADeviner = new MotADeviner();
        $this->nbEssaisRestant = 7;
        $this->listeLettreProposee = [];
    }

    public function afficherMotCache() :void {
        echo implode(" ", $this->motADeviner->getMotCache()) . "\n";
    }

    public function demanderLettre(): string {
        return $this->validerLettre(strtoupper(readline("Entrez votre lettre : ")));
    }
    public function validerLettre(string $lettre): bool{
        if (strlen($lettre) !==1 || !ctype_alpha($lettre)) {
            echo "Veuillez entrer une seul lettre \n";
            $this->demanderLettre();
            return false;
        }elseif(in_array($lettre, $this->listeLettreProposee)){
            echo "cette lettre a déjà été proposée\n";
            $this->demanderLettre();
            return false;
        }
        return true;
    }

    private function traiterLettre(string $lettre): void
    {
        $lettre = strtoupper($lettre);
        $this->listeLettreProposee[] = $lettre;
        if (str_contains($this->motADeviner->getMot(), $lettre)) {
            echo "Vous avez entré une bonne lettre\n";
            $this->motADeviner->updateMotCache($lettre);
        } else {
            echo "Vous avez entré une mauvaise lettre\n";
            $this->nbEssaisRestant--;
            echo "Il reste " . $this->nbEssaisRestant . " tentatives\n";
        }
    }
    public function jouer(): void
    {
        echo "Bienvenue dans le jeu du pendu\n";
        while ($this->nbEssaisRestant > 0 && !$this->motADeviner->isComplete()) {
            $this->afficherMotCache();
            $lettre = $this->demanderLettre();
            $this->traiterLettre($lettre);
        }
        if ($this->motADeviner->isComplete()) {
            echo "Félicitations, vous avez trouvé le mot : " . $this->motADeviner->getMot() . "\n";
        } else {
            echo "Dommage, vous avez perdu ! Le mot était : " . $this->motADeviner->getMot() . "\n";
        }
    }
}

