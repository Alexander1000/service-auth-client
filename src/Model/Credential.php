<?php declare(strict_types = 1);

namespace Alexander1000\Clients\Auth\Model;

class Credential
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $type;

    public function __construct(int $id, string $type)
    {
        $this->id = $id;
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}
