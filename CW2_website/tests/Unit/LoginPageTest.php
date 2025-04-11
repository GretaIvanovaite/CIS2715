<?php

namespace Tests\Unit;

use Codeception\Test\Unit;

class LoginPageTest extends Unit
{

    public function testNamedRouteExists()
    {
        $routeCollection = app('router')->getRoutes();
        $this->assertNotNull($routeCollection->getByName('login'));
    }

    public function testPageTitleIsLogin()
    {
        $view = view('login')->render();
        $this->assertStringContainsString('<title>Login</title>', $view);
    }

    public function testPageHasNoForm()
    {
        $view = view('login')->render();
        $this->assertStringContainsString('<form', $view);
    }
}
