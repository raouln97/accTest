<?php

namespace App\Services;

use Exception;
use App\Services\fetchService;

class verificationService
{
    public function verifyRecipient($data)
    {
        
        if (!array_key_exists('name', $data) || !array_key_exists('email', $data)){
            return false;
        }

        return true;
        
    }

    public function verifyIssuer($location, $walletAddress){

        $endPoint = (string) "https://dns.google/resolve?name={$location}&type=TXT";

        $dnsResponse = (new fetchService())->get($endPoint);

        $response = json_decode($dnsResponse, true);

        $addressExists = false;

        if (isset($response['Answer'])) {
            foreach ($response['Answer'] as $answer) {
                if (isset($answer['data'])) {
                    $data = explode(';', $answer['data']);
                    foreach ($data as $item) {
                        if (strpos($item, $walletAddress) !== false) {
                            $addressExists = true;
                            break;
                        }
                    }
                }
            }
        }

        return $addressExists;
    }

    public function verifySignature($data, $targetHash){

        $computedTargetHash = (string) self::computeTargetHash($data);

        if ($computedTargetHash !== $targetHash) {
            return false;
        }

        return true;
    }


    public function computeTargetHash($data)
    {
        $properties = $this->flattenData($data);

        $array = [];
        $propertiesArray = collect($array);
        
        foreach ($properties as $key => $value) {
            $hashed = hash('sha256', $value);
            $propertiesArray->push($hashed);
        }
        $targetHash = hash('sha256', json_encode($propertiesArray));

        return $targetHash;
    }

    public function flattenData($data, $path = '')
    {
        $properties = [];

        foreach ($data as $key => $value) {
            $newPath = empty($path) ? $key : $path . '.' . $key;

            if (is_array($value)) {
                $properties = array_merge($properties, $this->flattenData($value, $newPath));
            } else {
                $property = '"' . $newPath . '":' . json_encode($value, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
                $properties[] = $property;
            }
        }

        return $properties;
    }
}
