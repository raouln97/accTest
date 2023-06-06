<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\verificationResult;
use App\Services\verificationService;
use App\DTO\verifiableFileDTO;
use App\DTO\recipientDTO;
use App\DTO\issuerDTO;
use App\DTO\identityProofDTO;
use App\DTO\signatureDTO;
use App\DTO\verificationResultDTO;
use App\Models\VerificationResults;
use Illuminate\Support\Str;

class verifyDoc extends Controller
{
    public function index(Request $request)
    {
        $data = $request->data;
        $recipient = $data["recipient"];
        $issuer = $data["issuer"];
        $signature = $request["signature"];
        $identityProof = $issuer["identityProof"];
        $name = isset($recipientData['name']) ? $recipientData['name'] : null; 
        $email = isset($recipientData['email']) ? $recipientData['email'] : null; 


        try{
        $recipientDTO = new recipientDTO(
            $name,
            $email
        );

        $identityProofDTO = new identityProofDTO(
            $identityProof['type'],
            $identityProof['key'],
            $identityProof['location']
        );

        $signatureDTO = new signatureDTO(
            $signature['type'],
            $signature['targetHash']
        );


        $issuerDTO = new issuerDTO(
            $issuer['name'],
            $identityProofDTO
        );

        $verifiableFileDTO = new verifiableFileDTO(
            $data['id'],
            $data['name'],
            $recipientDTO,
            $issuerDTO,
            $data['issued']    
        );
    }catch(\Exception $e){
        throw new \Exception('JSON input has invalid fields');
    }

        $location = $identityProofDTO->location;
        $walletAddress = $identityProofDTO->key;
        $targetHash = $signatureDTO->targetHash;

        $isRecipientValid = (bool) (new verificationService())->verifyRecipient($recipient);

        $isIssuerValid = (bool) (new verificationService())->verifyIssuer($location, $walletAddress);

        $isSignatureValid = (bool) (new verificationService())->verifySignature($data, $targetHash);

        if (!$isRecipientValid){
            $verificationStatus = 'invalid_recipient';
        }else if(!$isIssuerValid){
            $verificationStatus = 'invalid_issuer';
        }else if(!$isSignatureValid){
            $verificationStatus = 'invalid_signature';
        }else{
            $verificationStatus = 'verified';
        }

        $resultDTO = new verificationResultDTO(
            Str::uuid()->toString(),
            "JSON",
            $verificationStatus
        );

        $resultArray = (array) [
            'user_id' => $resultDTO->userId,
            'file_type' => $resultDTO->fileType,
            'verification_result' => $resultDTO->verificationResult
        ];

        VerificationResults::create($resultArray);

        $responseData = [
            'issuer' => $issuerDTO->name,
            'result' => $verificationStatus
        ];

        $response = [
            'data' => $responseData
        ];
        
        return response()->json($response);
        
    }
}
