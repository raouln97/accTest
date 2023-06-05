<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;

class fetchService
{
    public function get($endpoint)
    {
        
        try {
            $response = Http::get($endpoint);
          } catch (\Exception $e) {
            throw new \Exception('Cannot retrieve DNS');
          }

        return $response;
    }
}
