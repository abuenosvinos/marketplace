<?php

namespace App\MarketPlace\Application\AddVoucher;

use App\Event\Domain\Bus\Command\Command;

class AddVoucherCommand extends Command
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
