<?php


namespace App\DTO;

class verificationResultDTO
{
    public string $userId;
    public string $fileType;
    public string $verificationResult;


    public function __construct( $userId, $fileType, $verificationResult)
    {
        $this->userId = $userId;
        $this->fileType = $fileType;
        $this->verificationResult = $verificationResult;
    }
}
