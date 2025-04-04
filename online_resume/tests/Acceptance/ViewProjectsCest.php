<?php

declare(strict_types=1);


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

final class ViewProjectsCest
{
    public function _before(AcceptanceTester $I): void
    {
        // Code here will be executed before each test.
    }

    // Write your tests here. All `public` methods will be executed as tests.
    public function seeProjectsSection(AcceptanceTester $I)
    {
        $I->amOnPage('/projects');
        $I->see('Software Projects', 'h1');
        $I->see('Project Title 1');
        $I->see('Description:');
        $I->see('Technologies:');
    }

    public function seeNoProjectsMessage(AcceptanceTester $I)
    {
        $I->amOnPage('/projects');
        $I->see('Software Projects', 'h1');
        $I->see('No projects available at this time');
    }
}
