<?php
namespace App;
class MotADeviner
{
    private array $mots;
    private string $mot;
    private array $motCache;

    public function __construct() {
        $this->mots = ["JAMBON", "TORTUE", "ORDINATEUR", "CHAISE", "TOUR"];

        $this->mot = $this->mots[array_rand($this->mots)];

        $this->motCache = array_fill(0, strlen($this->mot), "_");
    }

    public function getMot(): string {
        return $this->mot;
    }
    public function getMotCache(): array {
        return $this->motCache;
    }
    public function updateMotCache(string $lettre): void {
        for ($i = 0; $i < strlen($this->mot); $i++) {
            if ($this->mot[$i] === $lettre) {
                $this->motCache[$i] = $lettre;
            }
        }
    }
    public function isComplete(): bool {
        return array_search($this->mot, $this->motCache);
    }
}