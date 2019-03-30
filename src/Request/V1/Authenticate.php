<?php declare(strict_types = 1);

namespace Alexander1000\Clients\Auth\Request\V1;

class Authenticate extends \NetworkTransport\Http\Request\Data
{
    public function __construct(\Alexander1000\Clients\Auth\Model\Credential $credential, string $password)
    {
        parent::__construct(
            '/v1/authenticate',
            'POST',
            [
                'Content-Type' => 'application/json',
            ],
            []
        );

        $this->data = [
            'credential' => $credential,
            'password' => $password,
        ];
    }
}
