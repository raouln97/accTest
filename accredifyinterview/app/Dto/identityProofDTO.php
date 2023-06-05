<?php


namespace App\DTO;

class identityProofDTO
{
    public string $type;
    public string $key;
    public string $location;

    public function __construct($type, $key, $location)
    {
        $this->type = $type;
        $this->key = $key;
        $this->location = $location;
    }
}