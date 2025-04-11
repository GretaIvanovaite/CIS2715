<?php

namespace Tests\Unit;

use Codeception\Test\Unit;

class HomePageTestCest extends Unit
{
    /**
     * @var \Tests\Support\UnitTester
     */
    protected $tester;

    public function namedRouteExists()
    {
        $routeCollection = app('router')->getRoutes();
        $this->assertNotNull($routeCollection->getByName('home'));
    }
}
