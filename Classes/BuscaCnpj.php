<?php

namespace Classes;

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class BuscaCnpj
{
    public function busca($cnpj)
    {
        // Create a client with a base URI
        $client = new Client(['base_uri' => 'https://www.receitaws.com.br/v1/cnpj/']);
        // Send a request to base URI
        try {
            $request = $client->request('GET', $cnpj);
        } 
        catch (RequestException $e) {
            return false;
        }
        $response = $request->getBody()->getContents();
        
        return $response; 
    }
}
