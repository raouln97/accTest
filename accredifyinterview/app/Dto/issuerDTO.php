<?php


namespace App\DTO;

use App\DTO\identityProofDTO;

class issuerDTO
{
    public string $name;
    public identityProofDTO $identityProof;

    public function __construct($name, $identityProof)
    {
        $this->name = $name;
        $this->identityProof = $identityProof;
    }
}