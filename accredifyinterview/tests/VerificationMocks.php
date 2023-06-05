<?php

namespace Tests;

class VerificationMocks {

    public static function successfulVerificationMock(){

      return [
        "data" => [
          "id" => "63c79bd9303530645d1cca00",
          "name" => "Certificate of Completion",
          "recipient" => [
              "name" => "Marty McFly",
              "email" => "marty.mcfly@gmail.com"
          ],
          "issuer" => [
              "name" => "Accredify",
              "identityProof" => [
                  "type" => "DNS-DID",
                  "key" => "did:ethr:0x05b642ff12a4ae545357d82ba4f786f3aed84214#controller",
                  "location" => "ropstore.accredify.io"
              ]
          ],
          "issued" => "2022-12-23T00:00:00+08:00",
        ],
        "signature" => [
            "type" => "SHA3MerkleProof",
            "targetHash" => "b2562437f09560fe7e6d8f93971e612aaa3fbac51976b116002d57b25f9f7018"
        ]
    ];
    }

    public static function unSuccessfulVerificationMock(){
      return [
        "data" => [
          "id" => "63c79bd9303530645d1cca00",
          "name" => "Certificate of Completion",
          "recipient" => [
              "email" => "marty.mcfly@gmail.com"
          ],
          "issuer" => [
              "name" => "Accredify",
              "identityProof" => [
                  "type" => "DNS-DID",
                  "key" => "did:ethr:0x05b642ff12a4ae545357d82ba4f786f3aed84214#controller",
                  "location" => "ropstore.accredify.io"
              ]
          ],
          "issued" => "2022-12-23T00:00:00+08:00",
        ],
        "signature" => [
            "type" => "SHA3MerkleProof",
            "targetHash" => "b2562437f09560fe7e6d8f93971e612aaa3fbac51976b116002d57b25f9f7018"
        ]
    ];

    }
}