<?php
namespace App;
class MotADeviner
{
    private array $listeMots = [];
    private string $mot ;

    public function __construct(array $listeMots){
        $this->listeMots = $listeMots;
        $this->mot = $listeMots[array_rand($listeMots, 1)];
    }

    public function getMot(): string {
        return $this->mot;
    }
}