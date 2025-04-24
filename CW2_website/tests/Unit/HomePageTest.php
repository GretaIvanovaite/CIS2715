<?php

namespace Tests\Unit;

use Codeception\Test\Unit;

class HomePageTest extends Unit
{

    public function testNamedRouteExists()
    {
        $routeCollection = app('router')->getRoutes();
        $this->assertNotNull($routeCollection->getByName('home'));
    }
}
