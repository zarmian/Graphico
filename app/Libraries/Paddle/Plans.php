<?php

namespace App\Libraries\Paddle;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class Plans
{
    const HTTP_OK = 200;
    const HTTP_BAD_REQUEST = 400;
    const HTTP_INTERNAL_SERVER_ERROR = 500;

    const CONTENT_TYPE = 'application/json';
    const DEFAULT_ERROR_MESSAGE = ["message" => "Whoops, Something went wrong!"];

    const CHECKOUT_URL = '/api/generatePayLink/';
    const RETURN_URL = 'http://localhost:8000/api/thanks';

    /** @var Client*/
    private $client;
    /** @var mixed*/
    private $paddleUrl;
    /** @var mixed*/
    private $paddleVendorId;
    /** @var mixed*/
    private $paddleVendorAuthToken;
    /** @var mixed*/
    private $paddleGeneratePayUrl;

    /**
     * Plans constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->paddleUrl = config("paddle.paddleUrls.planListings");
        $this->paddleVendorId = config("paddle.vendor.vendorId");
        $this->paddleVendorAuthToken = config("paddle.vendor.authToken");
        $this->paddleGeneratePayUrl = config("paddle.paddleUrls.generatePayUrl");
    }

    /**
     * @return array|string
     */
    public function getPlans()
    {
        $requestParams = [
            'form_params' => [
                'vendor_id' => $this->paddleVendorId,
                'vendor_auth_code'  => $this->paddleVendorAuthToken
            ]
        ];
        try {
            $request = $this->client->post($this->paddleUrl, $requestParams);
            $response = json_decode($request->getBody()->getContents(), true);
            if ($request->getStatusCode() === self::HTTP_OK && $this->isCorrectResponse($response)) {
                return $this->apiResponseMessage($this->transformPlansData($response['response']), self::HTTP_OK);
            }
            if ($this->isInCorrectResponse($response)) {
                return $this->apiResponseMessage(["message" => $response['error']['message']], self::HTTP_BAD_REQUEST);
            }
            return $this->apiResponseMessage();
        } catch (\Exception $exception) {
            Log::error('FailedGettingPlansData: ', [
                'message' => $exception->getMessage(),
                'url' => $this->paddleUrl,
                'requestParams' => $requestParams
            ]);
            return $this->apiResponseMessage();
        }
    }

    private function transformPlansData($requestedData)
    {
        $response = [];
        foreach ((array)$requestedData['products'] as $key => $singleItem) {
            $response[$key]['productId'] = $singleItem['id'];
            $response[$key]['productName'] = $singleItem['name'];
            $response[$key]['productPrice'] = $singleItem['base_price'];
            $response[$key]['productDescription'] = $singleItem['description'];
            $response[$key]['checkoutUrl'] = $this->checkoutUrl($singleItem['id']);
        }
        return $response;
    }

    private function checkoutUrl($productId)
    {
        return self::CHECKOUT_URL . $productId;
    }

    public function generatePayUrl($request)
    {
        if (!$this->guardAgainstEmptyUserId($request['userId'])) {
            return $this->apiResponseMessage(["message" => "userId Parameter Missing"], self::HTTP_BAD_REQUEST);
        }
        $requestParams = [
            'form_params' => [
                'vendor_id' => $this->paddleVendorId,
                'vendor_auth_code'  => $this->paddleVendorAuthToken,
                'product_id' => $request['productId'],
                'passthrough' => $request['userId'],
                'customer_email' => $request['userEmail'],
                'return_url' => self::RETURN_URL
            ]
        ];
        try {
            $request = $this->client->post($this->paddleGeneratePayUrl, $requestParams);
            $response = json_decode($request->getBody()->getContents(), true);
            if ($request->getStatusCode() === self::HTTP_OK && $this->isCorrectResponse($response)) {
                return redirect($response['response']['url']);
            }
            if ($this->isInCorrectResponse($response)) {
                return $this->apiResponseMessage(["message" => $response['error']['message']], self::HTTP_BAD_REQUEST);
            }
            return $this->apiResponseMessage();
        } catch (\Exception $exception) {
            Log::error('FailedGeneratingCheckoutUrl: ', [
                'message' => $exception->getMessage(),
                'url' => $this->paddleGeneratePayUrl,
                'requestParams' => $requestParams
            ]);
            return $this->apiResponseMessage();
        }
    }

    private function isCorrectResponse($response)
    {
        return ($response['success'] === true);
    }

    private function isInCorrectResponse($response)
    {
        return ($response['success'] === false);
    }

    private function guardAgainstEmptyUserId($id)
    {
        if (empty($id)) {
            return false;
        }
        return $id;
    }

    protected function apiResponseMessage(
        $content = self::DEFAULT_ERROR_MESSAGE,
        $status = self::HTTP_INTERNAL_SERVER_ERROR
    ) {
        return response($content, $status)->header('Content-Type', self::CONTENT_TYPE);
    }
}