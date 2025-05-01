<?php

declare(strict_types=1);


namespace Tests\Acceptance;
use Tests\Support\AcceptanceTester;
use App\Models\Questionnaire;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

final class SelectQuestionnaireCest
{

    public function seeAvailableQuestionnaires(AcceptanceTester $I){

        $I->haveInDatabase('users', [
            'id' => 30,
            'name' => 'Test User',
            'email' => 'testuser@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $I->haveInDatabase('questionnaires', [
            'title' => 'Test Questionnaire',
            'description' => 'Example Questionnaire Description',
            'status' => 'Live',
            'user_id' => 30,
        ]);


        $I->amOnPage('/index');
        $I->see('Available questionnaires', 'h2');
        $I->see('Test Questionnaire', 'h3');
        $I->see('Example Questionnaire Description', 'p');
    }

    public function selectQuestionnaire(AcceptanceTester $I){
        $I->amOnPage('/index');
        $I->click('questionnaire');
        $I->amOnPage('/questionnaires?1');
    }
}
