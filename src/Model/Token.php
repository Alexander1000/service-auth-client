<?php declare(strict_types = 1);

namespace Alexander1000\Clients\Auth\Model;

class Token
{
    /**
     * @var string
     */
    private $access;

    /**
     * @var string
     */
    private $refresh;

    public function __construct(string $access, string $refresh)
    {
        $this->access = $access;
        $this->refresh = $refresh;
    }

    /**
     * @return string
     */
    public function getAccess(): string
    {
        return $this->access;
    }

    /**
     * @return string
     */
    public function getRefresh(): string
    {
        return $this->refresh;
    }
}
