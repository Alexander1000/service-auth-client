<?php declare(strict_types = 1);

namespace Alexander1000\Clients\Auth\Request\V1;

class Registration extends \NetworkTransport\Http\Request\Data
{
    public function __construct(int $userId, string $password, array $credentials)
    {
        parent::__construct(
            '/v1/registration',
            'POST',
            [
                'Content-Type' => 'application/json',
            ],
            []
        );

        $this->data = [
            'userId' => $userId,
            'password' => $password,
            'credentials' => $credentials,
        ];
    }
}
