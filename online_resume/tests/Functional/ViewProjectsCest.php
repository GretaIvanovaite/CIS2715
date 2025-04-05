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

    public function seeProjectsSection(AcceptanceTester $I)
    {
        $project = $I->haveInDatabase('projects', [
            'title' => 'Test Skill',
            'description' => "Example Project Description",
            'technologies' => 'Laravel, Eloquent, Blade, HTML, CSS',
        ]);

        $I->seeInDatabase('projects', ['id' => $project]);

        $I->amOnPage('/projects');
        $I->see('Software Projects', 'h1');
        $I->see('Test Skill', 'h2');
        $I->see('Example Project Description', 'p');
        $I->see('Laravel, Eloquent, Blade, HTML, CSS', 'p');
    }

    public function seeNoProjectsMessage(AcceptanceTester $I)
    {
        $I->amOnPage('/projects');
        $I->see('Software Projects', 'h1');
        $I->see('No projects available at this time', 'p');
    }
}
