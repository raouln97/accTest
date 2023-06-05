<?php


namespace App\DTO;

use App\DTO\recipientDTO;
use App\DTO\issuerDTO;

class verifiableFileDTO
{
    public string $id;
    public string $name;
    public recepientDTO $recipient;
    public issuerDTO $issuer;
    public string $issued;

    public function __construct( $id, $name, $recepient, $issuer, $issued)
    {
        $this->id = $id;
        $this->name = $name;
        $this->recepient = $recepient;
        $this->issuer = $issuer;
        $this->issued = $issued;
    }
}
