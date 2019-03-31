<?php declare(strict_types = 1);

namespace Alexander1000\Clients\Auth\Request\V1;

class Logout extends \NetworkTransport\Http\Request\Data
{
    public function __construct(string $token)
    {
        parent::__construct(
            '/v1/logout',
            'POST',
            [
                'Content-Type' => 'application/json'
            ],
            []
        );

        $this->data['token'] = $token;
    }
}
