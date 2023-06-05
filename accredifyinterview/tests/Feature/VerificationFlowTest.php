<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\VerificationMocks;

class VerificationFlowTest extends TestCase
{
    use RefreshDatabase;

    public function testFileVerificationSuccess()
    {
        $response = $this->post('/api/result', VerificationMocks::successfulVerificationMock());

        $response->assertStatus(200);

        $response->assertJson([
            'data' => [
                'issuer' => 'Accredify',
                'result' => 'verified'
            ]
        ]);
    }

    public function testFileVerificationFailure()
    {
        $response = $this->post('/api/result', VerificationMocks::unSuccessfulVerificationMock());

        
        $response->assertStatus(200);

        $response->assertJson([
            'data' => [
                'issuer' => 'Accredify',
                'result' => 'invalid_recipient'
            ]
        ]);
    }
}
