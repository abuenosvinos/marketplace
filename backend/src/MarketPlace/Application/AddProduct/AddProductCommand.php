<?php

namespace App\MarketPlace\Application\AddProduct;

use App\Event\Domain\Bus\Command\Command;

class AddProductCommand extends Command
{
    public function __construct(
        private string $identifier,
        private string $code
    ) {
        parent::__construct();
    }

    public function identifier(): string
    {
        return $this->identifier;
    }

    public function code(): string
    {
        return $this->code;
    }
}
