<?php

declare(strict_types=1);

namespace Tests\Functional;
use Tests\Support\FunctionalTester;
use App\Models\Questionnaire;
use App\Models\User;

final class HomePageCest
{
    public function routeExists(FunctionalTester $I)
    {
        $I->amOnPage('/index');
        $I->seeResponseCodeIs(200);
    }

    public function correctViewLoaded(FunctionalTester $I)
    {
        $I->amOnPage('/index');
        $I->see('Home', 'h1');
    }

    public function containsExpectedKeywords(FunctionalTester $I)
    {
        $I->amOnPage('/index');
        $I->see('Home');
        $I->see('questionnaires');
    }

    public function pageHasValidHtml(FunctionalTester $I)
    {
        $I->amOnPage('/index');
        $I->seeElement('html');
        $I->seeElement('nav');
        $I->seeElement('body');
        $I->seeElement('footer');
    }

    public function csrfTokenExists(FunctionalTester $I)
    {
        $I->amOnPage('/index');
        $I->seeInSource('csrf-token');
    }

    public function testPageTitleIsHome(FunctionalTester $I)
    {
        $I->amOnPage('/index');
        $I->seeInSource('<title>Questionnaire website - Home</title>');
    }

    public function testStaticHeadingExistsInView(FunctionalTester $I)
    {
        $I->amOnPage('/index');
        $I->see('Available questionnaires');
    }

    public function seeQuestionnairesSection(FunctionalTester $I)
    {
        User::factory()->create([
            'id' => 30,
        ]);
        Questionnaire::factory()->create([
            'title' => 'Test Questionnaire',
            'description' => 'Example Questionnaire Description',
            'id' => 30,
        ]);

        $I->amOnPage('/index');
        $I->see('Available questionnaires', 'h2');
        $I->see('Test Questionnaire', 'h3');
        $I->see('Example Questionnaire Description', 'p');
        $I->see('Live', 'p');
    }

    public function seeNoQuestionnairesMessage(FunctionalTester $I)
    {
        $I->amOnPage('/index');
        $I->see('Available questionnaires', 'h2');
        $I->see('No questionnaires available at this time', 'p');
    }
}
