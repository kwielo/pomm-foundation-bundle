<?php

/*
 * This file is part of the gnugat/pomm-foundation-bundle package.
 *
 * (c) Loïc Faugeron <faugeron.loic+pomm-foundation-bundle@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gnugat\PommFoundationBundle\EventListener;

use Gnugat\PommFoundationBundle\Service\ConnectionQueryManager;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

class ClosingConnectionListener
{
    /**
     * @var ConnectionQueryManager
     */
    private $connectionQueryManager;

    /**
     * @param ConnectionQueryManager $connectionQueryManager
     */
    public function __construct(ConnectionQueryManager $connectionQueryManager)
    {
        $this->connectionQueryManager = $connectionQueryManager;
    }

    /**
     * @param FilterResponseEvent $event
     */
    public function onKernelResponse(FilterResponseEvent $event)
    {
        $this->connectionQueryManager->shutdown();
    }
}
