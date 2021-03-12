<?php


namespace App\Traits;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\ServerException;
use Illuminate\Support\Facades\Log;

trait NodeProcessing
{
    /**
     * make request to the authentication page
     * @throws GuzzleException
     */
    protected function getAccess()
    {
        $client = new Client();
        $res = $client->request('GET', $this->baseUri.'', [
            'auth' => ['user', 'pass']
        ]);
    }

    /**
     * ---------------------
     * set request options
     * ---------------------
     * @param array $data
     * @return array[]
     */
    private function setRequestOptions(array $data): array
    {
        return [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            $this->bodyType => $data, // either json or form_params
        ];
    }

    /**
     * ---------------------------------
     * process the request
     * @param string $requestUrl
     * @param array $data
     * @param string $method
     * @param bool $headers
     * @return string
     * ---------------------------------
     */
    public function processRequest(string $requestUrl, string $method = 'POST', $data = [], bool $headers = false)
    {
        try {
            // define the guzzle client
            $client = new Client([
                'base_uri' => $this->baseUri,
                'timeout' => 120, // 120 seconds
                'connect_timeout' => 60, // 60 seconds
                'protocols' => ['http', 'https']
            ]);

            // make the request
            if ($headers)
                $response = $client->request($method, $requestUrl, $this->setRequestOptions($data));
            else
                $response = $client->request($method, $requestUrl, $data);


            return ($response->getBody()->getContents());
        } catch (ClientException $clientException) {
            $exception = $clientException->getResponse()->getBody()->getContents();
            Log::critical('client-exception' . $clientException->getMessage());
            return $exception;
        } catch (ServerException $serverException) {
            $exception = $serverException->getResponse()->getBody()->getContents();
            Log::critical('server-exception' . $serverException->getMessage());
            return $exception;
        } catch (GuzzleException $guzzleException) {
            Log::critical('guzzle-exception' . $guzzleException->getMessage());
            return $guzzleException;
        }
    }
}
