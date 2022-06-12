<?php

declare(strict_types=1);

namespace App\MarketPlace\Infrastructure\Repository\Symfony;

use App\MarketPlace\Domain\Entity\Basket;
use App\MarketPlace\Domain\Exception\ThereIsNoBasketException;
use App\MarketPlace\Domain\Repository\BasketRepository;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class SessionBasketRepository implements BasketRepository
{
    private const DATABASE_NAME = 'baskets';
    private SessionInterface $session;

    public function __construct(private RequestStack $requestStack)
    {
        $this->session = $this->requestStack->getSession();
    }

    public function save(Basket $basket): void
    {
        $newList = [];
        $found = false;

        $baskets = $this->all();
        /** @var Basket $basketItem */
        foreach ($baskets as $basketItem) {
            if ($basketItem->getIdentifier() === $basket->getIdentifier()) {
                $newList[] = $basket;
                $found = true;
            } else {
                $newList[] = $basketItem;
            }
        }

        if (!$found) {
            $newList[] = $basket;
        }

        $this->store($newList);
    }

    public function remove(Basket $basket): void
    {
        $newList = [];

        $baskets = $this->all();
        /** @var Basket $basket */
        foreach ($baskets as $basketItem) {
            if ($basketItem->getIdentifier() !== $basket->getIdentifier()) {
                $newList[] = $basketItem;
            }
        }

        $this->store($newList);
    }

    public function findByIdentifier(string $identifier): Basket
    {
        $baskets = $this->all();
        /** @var Basket $basket */
        foreach ($baskets as $basketItem) {
            if ($basketItem->getIdentifier() == $identifier) {
                return $basketItem;
            }
        }

        return throw new ThereIsNoBasketException($identifier);
    }

    private function store(array $baskets): void
    {
        $this->session->set(self::DATABASE_NAME, $baskets);
        $this->session->save();
    }

    private function all(): array
    {
        return $this->session->get(self::DATABASE_NAME, []);
    }
}
