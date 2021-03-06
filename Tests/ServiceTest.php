<?php

/*
 * This file is part of the gnugat/pomm-foundation-bundle package.
 *
 * (c) Loïc Faugeron <faugeron.loic+pomm-foundation-bundle@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gnugat\PommFoundationBundle\Tests;

use PHPUnit_Framework_TestCase;

class ServiceTest extends PHPUnit_Framework_TestCase
{
    private $container;

    protected function setUp()
    {
        $kernel = new \AppKernel('test', false);
        $kernel->boot();
        $this->container = $kernel->getContainer();
    }

    /**
     * @test
     */
    public function it_provides_a_query_manager()
    {
        self::assertInstanceOf(
            'PommProject\\Foundation\\QueryManager\\QueryManagerInterface',
            $this->container->get('gnugat_pomm_foundation.query_manager')
        );
    }
}
