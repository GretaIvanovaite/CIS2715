<?php

declare(strict_types=1);


namespace Tests\Acceptance;
use Tests\Support\AcceptanceTester;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

final class LoginCest
{
    
    public function _before(AcceptanceTester $I): void
    {
        $I->haveInDatabase('users', [
            'name' => 'Test User',
            'email' => 'testuser@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }

    public function tryToLogin(AcceptanceTester $I)
    {
        $I->amOnPage('/login');
        $I->see('<form');
        $I->submitForm('#login_form', array(
            'user' => array(
            'email' => 'testuser@gmail.com',
            'password' => Hash::make('password'),
        )), 'submitButton');
        $I->amOnPage('/user/dashboard');
    }

    public function incorrectPassword(AcceptanceTester $I)
    {
        $I->amOnPage('/login');
        $I->see('<form');
        $I->submitForm('#login_form', array(
            'user' => array(
            'email' => 'testuser@gmail.com',
            'password' => Hash::make('passwor'),
        )), 'submitButton');
        $I->see('Incorrect details');
    }
}
