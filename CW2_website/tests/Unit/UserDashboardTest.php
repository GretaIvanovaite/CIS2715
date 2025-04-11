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

    public function testPageTitleIsDashboard()
    {
        $view = view('user.dashboard')->render();
        $this->assertStringContainsString('<title>Dashboard</title>', $view);
    }

    public function testPageHasNoForm()
    {
        $view = view('user.dashboard')->render();
        $this->assertStringNotContainsString('<form', $view);
    }
}
