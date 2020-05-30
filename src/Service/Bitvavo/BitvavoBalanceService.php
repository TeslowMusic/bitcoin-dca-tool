<?php

declare(strict_types=1);

namespace Jorijn\Bitcoin\Dca\Service\Bitvavo;

use Jorijn\Bitcoin\Dca\Client\BitvavoClient;
use Jorijn\Bitcoin\Dca\Service\BalanceServiceInterface;

class BitvavoBalanceService implements BalanceServiceInterface
{
    /** @var BitvavoClient */
    protected BitvavoClient $client;

    public function __construct(BitvavoClient $client)
    {
        $this->client = $client;
    }

    public function supportsExchange(string $exchange): bool
    {
        return 'bitvavo' === $exchange;
    }

    public function getBalances(): array
    {
        $response = $this->client->apiCall('balance');
        $rows = [];

        foreach ($response as ['symbol' => $symbol, 'available' => $available, 'inOrder' => $inOrder]) {
            $rows[] = [$symbol, $available.' '.$symbol, ($available - $inOrder).' '.$symbol];
        }

        return $rows;
    }
}
