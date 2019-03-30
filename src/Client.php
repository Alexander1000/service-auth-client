<?php declare(strict_types = 1);

namespace Alexander1000\Clients\Auth;

use NetworkTransport;

class Client
{
    /**
     * @var NetworkTransport\Http\Transport
     */
    private $transport;

    /**
     * @var NetworkTransport\Http\Request\Builder
     */
    private $requestBuilder;

    public function __construct(
        NetworkTransport\Http\Transport $transport,
        NetworkTransport\Http\Request\Builder $requestBuilder
    ) {
        $this->transport = $transport;
        $this->requestBuilder = $requestBuilder;
    }

    public function registration(Request\V1\Registration $request)
    {
        $response = $this->executeRequest($request);
    }

    /**
     * @param NetworkTransport\Http\Request\Data $requestData
     * @return Response
     * @throws \Alexander1000\Clients\Auth\Exception
     * @throws \NetworkTransport\Http\Exception\MethodNotAllowed
     */
    protected function executeRequest(NetworkTransport\Http\Request\Data $requestData): Response
    {
        $response = $this->transport->send(
            new NetworkTransport\Http\Request($this->requestBuilder, $requestData)
        );
        if ($response->isError()) {
            throw new Exception(
                $response->getErrorMessage() ?? '',
                $response->getErrorCode() ?? 500
            );
        }
        $data = json_decode($response->getResponse() ?? '', true);
        if (json_last_error()) {
            throw new Exception('cannot parse response', 501);
        }
        $errCode = null;
        $errMsg = null;
        if (isset($data['error'])) {
            $errCode = (int) $data['error']['code'];
            $errMsg = $data['error']['message'];
        }
        return new Response($data['result'] ?? null, $errCode, $errMsg);
    }
}
