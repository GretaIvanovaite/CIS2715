<?php

declare(strict_types=1);


namespace Tests\Functional;
use Tests\Support\FunctionalTester;
use App\Models\Questionnaire;
use App\Models\User;

final class UserDashboardCest
{
    public function routeExists(FunctionalTester $I)
    {
        $I->amOnPage('/user/dashboard');
        $I->seeResponseCodeIs(200);
    }

    public function correctViewLoaded(FunctionalTester $I)
    {
        $I->amOnPage('/user/dashboard');
        $I->see('Dashboard', 'h1');
    }

    public function testPageTitleIsDashboard(FunctionalTester $I)
    {
        $I->amOnPage('/user/dashboard');
        $I->seeInSource('<title>Questionnaire website - User Dashboard</title>');
    }

    public function containsExpectedKeywords(FunctionalTester $I)
    {
        $I->amOnPage('/user/dashboard');
        $I->see('Your questionnaires');
        $I->see('New questionnaire');
    }

    public function pageHasValidHtml(FunctionalTester $I)
    {
        $I->amOnPage('/user/dashboard');
        $I->seeElement('html');
        $I->seeElement('nav');
        $I->seeElement('body');
        $I->seeElement('footer');
    }

    public function csrfTokenExists(FunctionalTester $I)
    {
        $I->amOnPage('/user/dashboard');
        $I->seeInSource('csrf-token');
    }

    public function seeQuestionnairesSection(FunctionalTester $I)
    {
        User::factory()->create([
            'id' => 30,
        ]);
        Questionnaire::factory()->create([
            'title' => 'Test Questionnaire',
            'description' => 'Example Questionnaire Description',
            'status' => 'In development',
            'id' => 30,
        ]);

        $I->amOnPage('/user/dashboard');
        $I->see('Your questionnaires', 'h2');
        $I->see('Test Questionnaire', 'h3');
        $I->see('Example Questionnaire Description', 'p');
        $I->see('In development', 'p');
    }

    public function seeNoQuestionnairesMessage(FunctionalTester $I)
    {
        $I->amOnPage('/user/dashboard');
        $I->see('Your questionnaires', 'h2');
        $I->see('You have no questionnaires at this time. Please use the button above to make a questionnaire', 'p');
    }
}
