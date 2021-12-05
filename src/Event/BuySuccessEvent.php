<?php

declare(strict_types=1);

/*
 * This file is part of the Bitcoin-DCA package.
 *
 * (c) Jorijn Schrijvershof <jorijn@jorijn.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Jorijn\Bitcoin\Dca\Event;

use Jorijn\Bitcoin\Dca\Model\CompletedBuyOrder;
use Symfony\Contracts\EventDispatcher\Event;

class BuySuccessEvent extends Event
{
    public function __construct(protected CompletedBuyOrder $completedBuyOrder, protected ?string $tag = null)
    {
    }

    public function getTag(): ?string
    {
        return $this->tag;
    }

    public function getBuyOrder(): CompletedBuyOrder
    {
        return $this->completedBuyOrder;
    }
}
