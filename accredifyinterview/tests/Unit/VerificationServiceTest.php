<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\verificationService;
use Mockery;
use App\Services\fetchService;
use Tests\VerificationMocks;

class VerificationServiceTest extends TestCase
{
    public function testVerifyRecipientWithValidData(): void
    {
        $verificationService = new verificationService();
        $data = [
            'name' => 'Marty McFly',
            'email' => 'marty.mcfly@gmail.com',
        ];

        $result = $verificationService->verifyRecipient($data);

        $this->assertTrue($result);
    }

    public function testVerifyRecipientWithInValidData(): void
    {
        $verificationService = new verificationService();
        $data = [
            'name' => 'Marty McFly'
        ];

        $result = $verificationService->verifyRecipient($data);

        $this->assertFalse($result);
    }

    public function testVerifyIssuerWithValidData(): void
    {
        $verificationService = new verificationService();
        $locationMock = "ropstore.accredify.io";
        $walletAddressMock = "did:ethr:0x05b642ff12a4ae545357d82ba4f786f3aed84214#controller";

        $result = $verificationService->verifyIssuer($locationMock, $walletAddressMock);

        $this->assertTrue($result);
    }

    public function testVerifyIssuerWithInValidData(): void
    {
        $verificationService = new verificationService();
        $locationMock = "ropstore.accredify.io";
        $walletAddressMock = "did:ethr:0x12334ABC";

        $result = $verificationService->verifyIssuer($locationMock, $walletAddressMock);

        $this->assertFalse($result);
    }

    public function testVerifySignatureWithValidData(): void
    {
        $verificationService = new verificationService();
        $validVerificationMock = VerificationMocks::successfulVerificationMock();
        $data = $validVerificationMock["data"];
        $targetHash = $validVerificationMock["signature"]["targetHash"];

        $result = $verificationService->verifySignature($data, $targetHash);

        $this->assertTrue($result);
    }

    public function testVerifySignatureWithInValidData(): void
    {
        $verificationService = new verificationService();
        $validVerificationMock = VerificationMocks::unSuccessfulVerificationMock();
        $data = $validVerificationMock["data"];
        $targetHash = $validVerificationMock["signature"]["targetHash"];

        $result = $verificationService->verifySignature($data, $targetHash);

        $this->assertFalse($result);
    }
}
