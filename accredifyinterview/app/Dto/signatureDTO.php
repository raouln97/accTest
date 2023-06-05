<?php


namespace App\DTO;

class signatureDTO
{
    public string $type;
    public string $targetHash;

    public function __construct(?string $type,?string $targetHash)
    {
        $this->type = $type;
        $this->targetHash = $targetHash;
    }
}