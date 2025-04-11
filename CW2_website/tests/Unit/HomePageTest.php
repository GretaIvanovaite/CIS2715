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

    public function testStaticHeadingExistsInView()
    {
        $view = view('home')->render();
        $this->assertStringContainsString("Welcome to Greta's questionnaire website!", $view);
    }

        public function testPageTitleIsHome()
    {
        $view = view('home')->render();
        $this->assertStringContainsString('<title>Home</title>', $view);
    }

    public function testPageHasNoForm()
    {
        $view = view('home')->render();
        $this->assertStringNotContainsString('<form', $view);
    }
}
