<?php

namespace Tests\Unit;

use Codeception\Test\Unit;

class UserDashboardTest extends Unit
{

    public function testNamedRouteExists()
    {
        $routeCollection = app('router')->getRoutes();
        $this->assertNotNull($routeCollection->getByName('user.dashboard'));
    }
}
