<?php

declare(strict_types=1);

namespace Tests\Functional;
use Tests\Support\FunctionalTester;

final class LoginPageCest
{
    public function routeExists(FunctionalTester $I)
    {
        $I->amOnPage('/login');
        $I->seeResponseCodeIs(200);
    }

    public function correctViewLoaded(FunctionalTester $I)
    {
        $I->amOnPage('/login');
        $I->see('Login', 'h1');
    }

    public function containsExpectedKeywords(FunctionalTester $I)
    {
        $I->amOnPage('/login');
        $I->see('Please Login');
        $I->see('username');
        $I->see('username');
    }

    public function pageHasValidHtml(FunctionalTester $I)
    {
        $I->amOnPage('/login');
        $I->seeElement('html');
        $I->seeElement('nav');
        $I->seeElement('body');
        $I->seeElement('footer');
    }

    public function csrfTokenExists(FunctionalTester $I)
    {
        $I->amOnPage('/login');
        $I->seeInSource('csrf-token');
    }

    public function seeLoginForm(FunctionalTester $I)
    {
        $I->amOnPage('/login');
        $I->see('<form');
        $I->see('<button');
    }
}
