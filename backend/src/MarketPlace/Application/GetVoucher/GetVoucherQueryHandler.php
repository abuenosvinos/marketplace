<?php

namespace App\MarketPlace\Application\GetVoucher;

use App\Event\Domain\Bus\Query\QueryHandler;
use App\MarketPlace\Domain\Entity\Voucher;
use App\MarketPlace\Domain\Repository\VoucherRepository;

class GetVoucherQueryHandler implements QueryHandler
{
    public function __construct(private VoucherRepository $voucherRepository)
    {
    }

    public function __invoke(GetVoucherQuery $query): ?Voucher
    {
        return $this->voucherRepository->findByCode($query->code());
    }
}
