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
        $I->see('Welcome');
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

    public function seeQuestionnairesSection(FunctionalTester $I)
    {
        User::factory()->create([
            'id' => 1,
        ]);
        Questionnaire::factory()->create([
            'title' => 'Test Questionnaire',
            'description' => 'Example Questionnaire Description',
            'status' => 'In development',
            'user_id' => 1,
        ]);

        $I->amOnPage('/index');
        $I->see('Available questionnaires', 'h2');
        $I->see('Test Questionnaire', 'h3');
        $I->see('Example Questionnaire Description', 'p');
        $I->see('In development', 'p');
    }

    public function seeNoQuestionnairesMessage(FunctionalTester $I)
    {
        $I->amOnPage('/index');
        $I->see('Available questionnaires', 'h2');
        $I->see('No questionnaires available at this time', 'p');
    }
}
